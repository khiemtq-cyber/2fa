CREATE TABLE `lhc_2fa_user` ( `id` bigint(20) NOT NULL AUTO_INCREMENT, `user_id` bigint(20) NOT NULL, `lsend` int(11) NOT NULL,`method` varchar(100) NOT NULL DEFAULT '',`attr` text NOT NULL, `enabled` tinyint(1) NOT NULL,`default` tinyint(1) NOT NULL,PRIMARY KEY (`id`), KEY `user_id` (`user_id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE `lhc_2fa_session` (`id` bigint(20) NOT NULL AUTO_INCREMENT,`user_id` bigint(20) NOT NULL,`ctime` int(11) NOT NULL,`hash` varchar(40) NOT NULL, `attr` text NOT NULL, `valid` tinyint(1) NOT NULL, `retries` int(11) NOT NULL,`remember` tinyint(1) NOT NULL, PRIMARY KEY (`id`),KEY `user_id` (`user_id`), KEY `hash` (`hash`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;