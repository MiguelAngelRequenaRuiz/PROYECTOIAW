
-- BD DE LOS USUARIOS DE LA APP.


CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `phone` text COLLATE utf8_unicode_ci,
  `birthday` date COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;


--INSERTANDO LOS DATOS EN LA BD.

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `phone`) VALUES
(1, 'demo', '4d186321c1a7f0f354b297e8914ab240', 'demo@demo.com', 'Demo', NULL);
