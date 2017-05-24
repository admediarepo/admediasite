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

-- Dumping structure for table admedia2.answers
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `message` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `message_id` int(11) NOT NULL DEFAULT 0,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `message_ref` (`message_id`),
  CONSTRAINT `message_ref` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admedia2.answers: ~1 rows (approximately)
DELETE FROM `answers`;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` (`id`, `subject`, `message`, `message_id`, `date`) VALUES
	(3, 'wefowefj', 'ihfeiwhwie', 6, '0'),
	(4, 'RE: Empresa - AdMedia', 'sdlfjçsldjfsçmjwergfkwefklweºfkewºfkewlfkweçlfkew', 6, '23-05-2017 16:04:08'),
	(5, 'RE: Empresa - AdMedia', 'sdlfjçsldjfsçmjwergfkwefklweºfkewºfkewlfkweçlfkew', 6, '23-05-2017 16:04:31');
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;

-- Dumping structure for table admedia2.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `project_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `project_ref` (`project_id`),
  CONSTRAINT `project_ref` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admedia2.images: ~5 rows (approximately)
DELETE FROM `images`;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `name`, `project_id`) VALUES
	(38, '545fb6210d36d8fa28317d5afca98704.jpg', 2),
	(39, '166d16051b152782a181b1047526800e.jpg', 2),
	(40, '4a2916c141b90895cf8cbd5c2e3b43aa.jpg', 2),
	(41, 'a8af843011a85637c676c62869d4a704.jpg', 1),
	(42, '266a17cb7d36afd3197f8b2eb6e1f1fb.jpg', 1),
	(43, '2073e3ce6e674d7550974213a269278b.jpeg', 1),
	(44, '162015f0ae2e1f5758c862173fe265d0.jpeg', 1);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping structure for table admedia2.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `subject` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `message` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `data` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `see` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admedia2.messages: ~1 rows (approximately)
DELETE FROM `messages`;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `name`, `mail`, `subject`, `message`, `data`, `see`) VALUES
	(6, 'jose pedro', '123@123.com', 'Empresa', 'Olá tudobem ??', '23-05-2017 15:52:31', b'0');
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
	(1, 'dsgsdgsdf', 'descricao', 'Sumário', '785cc181e72e7075020759d6672f1092.jpg', 2, NULL),
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

-- Dumping data for table admedia2.services: ~0 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admedia2.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `password`) VALUES
	(1, 'admedia@admedia.com', '$2y$10$V.lQjRgKslD3ZsmrRHxjsOHuvg8Qcg/ceS/lOad7uneS4hGIjuVDi');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for trigger admedia2.data
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `data` BEFORE INSERT ON `messages` FOR EACH ROW SET NEW.data = DATE_FORMAT(NOW(), '%d-%m-%Y %H:%i:%s')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
