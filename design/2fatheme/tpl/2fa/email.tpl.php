<h1><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('2fa/admin','E-Mail')?></h1>

<div class="row">
    <div class="col-xs-6">

        <?php if (isset($errors)) : ?>
            <?php include(erLhcoreClassDesign::designtpl('lhkernel/validation_error.tpl.php'));?>
        <?php endif;?>

        <?php if (isset($emailsend)) : ?>
            <?php $msg = erTranslationClassLhTranslation::getInstance()->getTranslation('2fa/admin','Test email was sent'); ?>
            <?php include(erLhcoreClassDesign::designtpl('lhkernel/alert_success.tpl.php'));?>
        <?php endif;?>

        <?php if (isset($settingsupdated)) : ?>
            <?php $msg = erTranslationClassLhTranslation::getInstance()->getTranslation('2fa/admin','Settings updated'); ?>
            <?php include(erLhcoreClassDesign::designtpl('lhkernel/alert_success.tpl.php'));?>
        <?php endif;?>

        <form action="" method="post">
            <h4><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('2fa/admin','Global settings')?></h4>
                <label><input value="on" type="checkbox" <?php if (isset($tfaoptions['email_enabled']) && $tfaoptions['email_enabled'] == true) : ?>checked="checked"<?php endif;?>  name="email_enabled" /><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('2fa/admin','Enabled for users to choose in personal settings')?></label>
            <h4><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('2fa/admin','Personal settings')?></h4>
            

            <?php include(erLhcoreClassDesign::designtpl('2fa/email/user_settings.tpl.php'));?>

            <div class="form-group">
                <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('2fa/admin','E-Mail')?></label>
                <p><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('2fa/admin','Your account e-mail will be used')?></p>
            </div>

            <h4><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('2fa/admin','E-Mail settings')?></h4>
            <div class="row">
                <div class="col-xs-6">
                    <div class="form-group">
                        <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('2fa/admin','Subject')?></label>
                        <input type="text" class="form-control" name="email_subject" value="<?php (isset($tfaoptions['email_subject']) && $tfaoptions['email_subject'] != '') ? print htmlspecialchars($tfaoptions['email_subject']) : print erTranslationClassLhTranslation::getInstance()->getTranslation('2fa/admin','Your code')?>" />
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('2fa/admin','From name')?></label>
                        <input type="text" class="form-control" name="email_from" value="<?php (isset($tfaoptions['email_from']) && $tfaoptions['email_from'] != '') ? print htmlspecialchars($tfaoptions['email_from']) : print erTranslationClassLhTranslation::getInstance()->getTranslation('2fa/admin','2FA Verification')?>" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Message body</label>
                <textarea class="form-control" placeholder="Your verification code: {code}" name="email_body"><?php (isset($tfaoptions['email_body'])) ? print htmlspecialchars($tfaoptions['email_body']) : print erTranslationClassLhTranslation::getInstance()->getTranslation('2fa/admin','Verification code: {code}')?></textarea>
            </div>

            <div class="btn-group" role="group" aria-label="...">
                <input type="submit" name="save2fa" class="btn btn-default" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('2fa/admin','Save settings')?>">
                <input type="submit" name="sendTestSMS" class="btn btn-default" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('2fa/admin','Send test E-Mail')?>">
            </div>
        </form>
    </div>
    <div class="col-xs-6">
        <form action="" method="post">

            <?php if (isset($codevalid) && $codevalid === false) : ?>
                <?php $errors = array(erTranslationClassLhTranslation::getInstance()->getTranslation('2fa/admin','Code invalid')); ?>
                <?php include(erLhcoreClassDesign::designtpl('lhkernel/validation_error.tpl.php'));?>
            <?php elseif (isset($codevalid) && $codevalid === true) : ?>
                <?php $msg = erTranslationClassLhTranslation::getInstance()->getTranslation('2fa/admin','Code valid!'); ?>
                <?php include(erLhcoreClassDesign::designtpl('lhkernel/alert_success.tpl.php'));?>
            <?php endif; ?>

            <div class="form-group">
                <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('2fa/admin','Enter code to test')?></label>
                <input class="form-control" type="text" name="code" value="">
            </div>

            <input type="submit" name="testsms" class="btn btn-default" value="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('2fa/admin','Verify code')?>">
        </form>
    </div>
</div>

