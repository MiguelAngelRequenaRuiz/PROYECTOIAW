--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `phone` text COLLATE utf8_unicode_ci,
  `birthday` date COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` enum('male','female') COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `site_language` bigint(20) unsigned DEFAULT '1',
  `avatar` varchar(225) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `private_profile` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'Este perfil es privado?',
  `verified` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'Este perfil esta verificado?',
  `banned` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'Este perfil esta baneado?',
  `signup_date` datetime COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime COLLATE utf8_unicode_ci DEFAULT NULL,
  `signup_ip` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_ip` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `phone`, `birthday`, `sex`, `bio`, `site_language`, `private_profile`, `verified`, `banned`, `signup_date`, `last_login`) VALUES
(1, 'demo', '4d186321c1a7f0f354b297e8914ab240', 'demo@demo.com', 'Demo', NULL, NULL, NULL, NULL, 1, '0', '0', '0', now(), now());
