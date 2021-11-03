<?php

header ( 'content-type: application/json; charset=utf-8' );

try {
    $g = new \Google\Authenticator\GoogleAuthenticator();

    $ext = erLhcoreClassModule::getExtensionInstance('erLhcoreClassExtension2fa');

    $userData = erLhcoreClassModelUser::fetch($Params['user_parameters']['user_id']);

    if ($userData->id != erLhcoreClassUser::instance()->getUserID() && !erLhcoreClassUser::instance()->hasAccessTo('lhuser', 'edituser')) {
        throw new Exception('You do not have permission to regenerate QR Code for this user!');
    }

    $instance = erLhcoreClassModel2FAUser::getInstance($userData->id, 'ga');

    $secret = $g->generateSecret();
    
    $instance->setAttribute('secret',$secret);

    $link = \Sonata\GoogleAuthenticator\GoogleQrUrl::generate($userData->id, $secret, $ext->settings['ga_title']);
    
    $srcLoading = 'data:image/gif;base64,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';

    echo json_encode(array('error' => false, 'src' => $link, 'src_loading' => $srcLoading));

} catch (Exception $e) {
    echo json_encode(array('error' => true,'msg' => $e->getMessage()));
}
exit;



