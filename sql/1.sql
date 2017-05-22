-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.2.3-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for admedia2
CREATE DATABASE IF NOT EXISTS `admedia2` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `admedia2`;

-- Dumping structure for table admedia2.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `project_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `project_ref` (`project_id`),
  CONSTRAINT `project_ref` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admedia2.images: ~7 rows (approximately)
DELETE FROM `images`;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `name`, `project_id`) VALUES
	(27, '68e5b2ab6c50803f29ddea5a5bb4ea2c.jpg', 1),
	(28, 'f5caccc740834f5626d116b35ffbfc38.jpg', 1),
	(29, 'f0ab6951613e71e693ec20ae5947fbcc.jpeg', 1),
	(30, '3abc21f6682de27805112407c1f59b7b.jpg', 1),
	(38, '545fb6210d36d8fa28317d5afca98704.jpg', 2),
	(39, '166d16051b152782a181b1047526800e.jpg', 2),
	(40, '4a2916c141b90895cf8cbd5c2e3b43aa.jpg', 2);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping structure for table admedia2.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `assunto` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `message` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admedia2.messages: ~0 rows (approximately)
DELETE FROM `messages`;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

-- Dumping structure for table admedia2.projects
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `sum` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mainimage` varchar(250) COLLATE utf8_unicode_ci DEFAULT 'noimg.png',
  `type` int(11) DEFAULT NULL,
  `image` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_projetos_types` (`type`),
  CONSTRAINT `FK_projetos_types` FOREIGN KEY (`type`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admedia2.projects: ~4 rows (approximately)
DELETE FROM `projects`;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` (`id`, `title`, `desc`, `sum`, `mainimage`, `type`, `image`) VALUES
	(1, 'dsgsdgsdf', 'descricao', 'Sumário', 'noimg.png', 2, NULL),
	(2, 'projecto 2', 'descricao projecto 2 wetgjeroijgeroigjerogjeoijgeorjgoeijgoerijg', 'Sumário projeto 2 wewegergergergeriwugoiwrthuoritjr', '30f56dc3818460a3b3eebcdfaa1d6d35.jpg', 3, NULL),
	(3, 'dsgsdgsdf', 'descricao', 'Sumário', 'noimg.png', 2, NULL),
	(4, 'dsgsdgsdf', 'descricao', 'Sumário', '5bb761be8629356765a849d243bfef65.jpg', 2, NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;

-- Dumping structure for table admedia2.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  `imagem` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  `type` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK1` (`type`),
  CONSTRAINT `FK1` FOREIGN KEY (`type`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admedia2.services: ~2 rows (approximately)
DELETE FROM `services`;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` (`id`, `name`, `imagem`, `type`) VALUES
	(1, 'name', 'imagem', 1),
	(2, 'name1', 'imagem1', 1);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;

-- Dumping structure for table admedia2.types
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admedia2.types: ~4 rows (approximately)
DELETE FROM `types`;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` (`id`, `name`) VALUES
	(1, 'web design'),
	(2, 'consulturia'),
	(3, 'gestao de redes sociais'),
	(4, 'software');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;

-- Dumping structure for table admedia2.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admedia2.users: ~1 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `password`) VALUES
	(1, 'admedia@admedia.com', '$2y$10$V.lQjRgKslD3ZsmrRHxjsOHuvg8Qcg/ceS/lOad7uneS4hGIjuVDi');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
