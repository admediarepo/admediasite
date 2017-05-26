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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admedia2.answers: ~3 rows (approximately)
DELETE FROM `answers`;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` (`id`, `subject`, `message`, `message_id`, `date`) VALUES
	(3, 'wefowefj', 'ihfeiwhwie', 6, '0'),
	(4, 'RE: Empresa - AdMedia', 'sdlfjçsldjfsçmjwergfkwefklweºfkewºfkewlfkweçlfkew', 6, '23-05-2017 16:04:08'),
	(5, 'RE: Empresa - AdMedia', 'sdlfjçsldjfsçmjwergfkwefklweºfkewºfkewlfkweçlfkew', 6, '23-05-2017 16:04:31'),
	(6, 'RE: Empresa - AdMedia', 'efwefwefewewfefwefwfew', 6, '26-05-2017 14:24:23'),
	(7, 'RE: Empresa - AdMedia', 'wefweoefwokewpfkfew+pewkef+pkew', 6, '26-05-2017 14:25:05');
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;

-- Dumping structure for table admedia2.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `project_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `project_ref` (`project_id`),
  CONSTRAINT `project_ref` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admedia2.images: ~15 rows (approximately)
DELETE FROM `images`;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `name`, `project_id`) VALUES
	(38, '545fb6210d36d8fa28317d5afca98704.jpg', 2),
	(39, '166d16051b152782a181b1047526800e.jpg', 2),
	(40, '4a2916c141b90895cf8cbd5c2e3b43aa.jpg', 2),
	(41, 'a8af843011a85637c676c62869d4a704.jpg', 1),
	(42, '266a17cb7d36afd3197f8b2eb6e1f1fb.jpg', 1),
	(43, '2073e3ce6e674d7550974213a269278b.jpeg', 1),
	(44, '162015f0ae2e1f5758c862173fe265d0.jpeg', 1),
	(45, 'f640280ac19b7bde2b2a819add80e73c.jpeg', 6),
	(46, 'b59ff6c32ab080ec898f653bc8a0cdaa.jpg', 6),
	(47, '48deb2636feb5ab9cdda95583585eb6b.jpg', 6),
	(48, '866438c9fa7ec023286cfbc210c4ae57.jpg', 3),
	(49, '828173160c808e9c141d1f0da2749f35.jpeg', 3),
	(50, '4bad56081ed6e3c5629d4ec6c7ff87e5.jpeg', 3),
	(51, 'af510029fa9ffca50187b439ad6b7ae3.jpg', 3),
	(52, '293802ce23945ec04ff48b21a6b56c76.jpeg', 4);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping structure for table admedia2.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `subject` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `message` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `data` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `see` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admedia2.messages: ~0 rows (approximately)
DELETE FROM `messages`;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `name`, `mail`, `subject`, `message`, `data`, `see`) VALUES
	(6, 'jose pedro', '123@123.com', 'Empresa', 'Olá tudobem ??', '23-05-2017 15:52:31', b'0');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

-- Dumping structure for table admedia2.projects
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `sum` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `mainimage` varchar(250) COLLATE utf8_unicode_ci DEFAULT 'noimg.png',
  `type` int(11) DEFAULT NULL,
  `image` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_projetos_types` (`type`),
  CONSTRAINT `FK_projetos_types` FOREIGN KEY (`type`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admedia2.projects: ~5 rows (approximately)
DELETE FROM `projects`;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` (`id`, `title`, `desc`, `sum`, `mainimage`, `type`, `image`) VALUES
	(1, 'Ut in faucibus neque. Maecenas eget posuere eros.', 'Aenean facilisis non urna ut rutrum. Sed eleifend nibh sed nisi pulvinar, eget tristique ligula gravida. Nulla quis scelerisque magna. Integer varius mi non mi viverra, at commodo turpis dapibus. Nulla rutrum est nisl, ut feugiat nisi semper et. Etiam sit amet dictum neque, vulputate ullamcorper eros. Nullam a tincidunt elit, ac semper orci. Nulla facilisi. In tincidunt porta aliquam. In sem quam, laoreet pharetra dolor a, luctus lobortis justo.\r\n\r\nInteger sed velit at elit ullamcorper aliquam non a velit. Aenean at commodo ligula. Suspendisse potenti. Morbi fringilla, ex eu suscipit rutrum, lectus felis congue nibh, sed ultrices erat metus sit amet erat. Praesent in sagittis nisi. Nunc pretium dolor vitae purus mollis bibendum. Donec id tellus felis. In hac habitasse platea dictumst.', 'Aliquam erat volutpat. Integer fringilla magna ut dolor ornare, a feugiat ex suscipit. Praesent eros lacus, varius quis orci nec, lobortis volutpat lorem. Vivamus sagittis dolor vitae diam posuere, quis viverra arcu cursus. Curabitur euismod lorem lectus, eu hendrerit metus fringilla ac. Ut sit amet egestas est, vitae viverra ex. Cras ac volutpat sapien, ac tristique quam. Vestibulum maximus leo in odio blandit vestibulum.', '785cc181e72e7075020759d6672f1092.jpg', 2, NULL),
	(2, 'Integer sed velit at elit ullamcorper aliquam non a velit. ', 'Ut in faucibus neque. Maecenas eget posuere eros. Aliquam erat volutpat. Integer fringilla magna ut dolor ornare, a feugiat ex suscipit. Praesent eros lacus, varius quis orci nec, lobortis volutpat lorem. Vivamus sagittis dolor vitae diam posuere, quis viverra arcu cursus. Curabitur euismod lorem lectus, eu hendrerit metus fringilla ac. Ut sit amet egestas est, vitae viverra ex. Cras ac volutpat sapien, ac tristique quam. Vestibulum maximus leo in odio blandit vestibulum. Integer consequat pulvinar ante in tristique. Ut accumsan metus id hendrerit blandit. Etiam eleifend venenatis efficitur. Pellentesque non fringilla odio. In at quam et eros vehicula consequat. Praesent dapibus metus neque.', 'Aenean at commodo ligula. Suspendisse potenti. Morbi fringilla, ex eu suscipit rutrum, lectus felis congue nibh, sed ultrices erat metus sit amet erat. Praesent in sagittis nisi. Nunc pretium dolor vitae purus mollis bibendum. Donec id tellus felis. In hac habitasse platea dictumst.', '30f56dc3818460a3b3eebcdfaa1d6d35.jpg', 3, NULL),
	(3, 'Suspendisse sollicitudin blandit condimentum. ', 'Ut in faucibus neque. Maecenas eget posuere eros. Aliquam erat volutpat. Integer fringilla magna ut dolor ornare, a feugiat ex suscipit. Praesent eros lacus, varius quis orci nec, lobortis volutpat lorem. Vivamus sagittis dolor vitae diam posuere, quis viverra arcu cursus. Curabitur euismod lorem lectus, eu hendrerit metus fringilla ac. Ut sit amet egestas est, vitae viverra ex. Cras ac volutpat sapien, ac tristique quam. Vestibulum maximus leo in odio blandit vestibulum. Integer consequat pulvinar ante in tristique. Ut accumsan metus id hendrerit blandit. Etiam eleifend venenatis efficitur. Pellentesque non fringilla odio. In at quam et eros vehicula consequat. Praesent dapibus metus neque.', ' Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi interdum lacus et lorem mollis, sit amet efficitur metus faucibus. Aenean at pretium turpis. Aliquam orci tellus, ultrices consectetur nisi ac, tincidunt vehicula arcu.', 'noimg.png', 2, NULL),
	(4, 'Aenean facilisis non urna ut rutrum. ', 'Ut in faucibus neque. Maecenas eget posuere eros. Aliquam erat volutpat. Integer fringilla magna ut dolor ornare, a feugiat ex suscipit. Praesent eros lacus, varius quis orci nec, lobortis volutpat lorem. Vivamus sagittis dolor vitae diam posuere, quis viverra arcu cursus. Curabitur euismod lorem lectus, eu hendrerit metus fringilla ac. Ut sit amet egestas est, vitae viverra ex. Cras ac volutpat sapien, ac tristique quam. Vestibulum maximus leo in odio blandit vestibulum. Integer consequat pulvinar ante in tristique. Ut accumsan metus id hendrerit blandit. Etiam eleifend venenatis efficitur. Pellentesque non fringilla odio. In at quam et eros vehicula consequat. Praesent dapibus metus neque.', 'Aenean facilisis non urna ut rutrum. Sed eleifend nibh sed nisi pulvinar, eget tristique ligula gravida. Nulla quis scelerisque magna. Integer varius mi non mi viverra, at commodo turpis dapibus. Nulla rutrum est nisl, ut feugiat nisi semper et. Etiam sit amet dictum neque, vulputate ullamcorper eros. Nullam a tincidunt elit, ac semper orci. Nulla facilisi. In tincidunt porta aliquam. In sem quam, laoreet pharetra dolor a, luctus lobortis justo.', '2b7a0bb03f76c339deb52afbdcf17a18.jpeg', 2, NULL),
	(5, 'wegjkowegnjoiweprjgejorgj', 'wgopergpoerigçeld,vpr34u9tjpoerfdsmçl-c8&#039;65gtkcvx,m-. eor+tkerkteprt', 'pojewfpojwepofjwpoejfpweojfpwoe', 'noimg.png', 1, NULL),
	(6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Praesent ut viverra diam, id hendrerit leo. Aenean tincidunt at ipsum ac pharetra. Fusce iaculis vel risus et sagittis. Aenean at nisi tempor, vehicula leo non, vehicula neque. Maecenas arcu mi, condimentum non purus sed, posuere posuere orci. Mauris ultrices nec purus et iaculis. Aliquam cursus hendrerit laoreet. Suspendisse sollicitudin blandit condimentum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi interdum lacus et lorem mollis, sit amet efficitur metus faucibus. Aenean at pretium turpis. Aliquam orci tellus, ultrices consectetur nisi ac, tincidunt vehicula arcu.', ' Curabitur rhoncus libero malesuada ante aliquet lobortis. Nulla varius imperdiet risus, vitae pharetra metus. Maecenas elementum risus nec mattis gravida. Vestibulum gravida, purus vitae commodo faucibus, nibh lacus dignissim massa, ut pulvinar augue ligula ut risus. Aenean in lorem dolor. Donec lobortis luctus diam, ut rhoncus tortor mollis non. Duis porttitor odio sit amet urna molestie facilisis non sed enim.', 'd816f096bfb5f9431145f349b7056f41.jpg', 1, NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;

-- Dumping structure for table admedia2.recaptcha
CREATE TABLE IF NOT EXISTS `recaptcha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `public` tinytext COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `secret` tinytext COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admedia2.recaptcha: ~0 rows (approximately)
DELETE FROM `recaptcha`;
/*!40000 ALTER TABLE `recaptcha` DISABLE KEYS */;
INSERT INTO `recaptcha` (`id`, `public`, `secret`) VALUES
	(4, '6Lf5hCIUAAAAAMwzUP83wzZQy4VpCNFqvw2MN_Jv', '6Lf5hCIUAAAAAI4SI-6XIDAyu9l1GTfctubBrAEv');
/*!40000 ALTER TABLE `recaptcha` ENABLE KEYS */;

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
	(2, 'consultoria'),
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table admedia2.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `password`) VALUES
	(1, 'admedia@admedia.com', '$2y$10$V.lQjRgKslD3ZsmrRHxjsOHuvg8Qcg/ceS/lOad7uneS4hGIjuVDi');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
