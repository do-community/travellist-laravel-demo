DROP TABLE IF EXISTS `places`;

CREATE TABLE `places` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visited` tinyint(1) NOT NULL DEFAULT '0',
  `lat` float(9,6) NOT NULL DEFAULT '0.00',
  `lng` float(9,6) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `places` (name, visited, lat, lng) VALUES ('Berlin',1,52.52,13.405),('Budapest',1,47.4979,19.0402),('Cincinnati',0,39.1031,-84.512),('Denver',0,39.7392,-104.99),('Helsinki',1,60.1699,24.9384),('Lisbon',1,38.7223,-9.13934),('Moscow',0,55.7558,37.6173),('Nairobi',0,-1.29207,36.8219),('Oslo',1,59.9139,10.7522),('Rio',1,-22.9068,-43.1729),('Tokyo',0,35.6895,139.692);
