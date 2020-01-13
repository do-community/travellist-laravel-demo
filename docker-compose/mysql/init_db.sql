DROP TABLE IF EXISTS `places`;

CREATE TABLE `places` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visited` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `places` VALUES (1,'Berlin',0),(2,'Budapest',0),(3,'Cincinati',1),(4,'Denver',0),(5,'Helsinki',0),(6,'Lisbon',0),(7,'Moscow',1),(8,'Nairobi',0),(9,'Oslo',1),(10,'Rio',0),(11,'Tokyo',0);
