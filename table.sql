-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        5.5.62 - MySQL Community Server (GPL)
-- 服务器OS:                        Win64
-- HeidiSQL 版本:                  10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for patpet
CREATE DATABASE IF NOT EXISTS `patpet` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `patpet`;

-- Dumping structure for table patpet.articles
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `pic` int(11) NOT NULL DEFAULT '2',
  `content` text,
  `author` int(11) DEFAULT NULL,
  `tag` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table patpet.articles: 13 rows
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`id`, `title`, `pic`, `content`, `author`, `tag`, `created_at`, `updated_at`) VALUES
	(1, '21121', 2, '1212121', 1, 0, '2021-03-07 12:51:49', NULL),
	(2, 'xxxx', 2, '1211212121', 2, 0, '2021-03-05 20:14:16', '2021-03-05 20:14:16'),
	(3, '1212122222', 2, '1211212121', 3, 0, '2021-03-05 20:22:34', '2021-03-05 20:22:34'),
	(4, 'Test', 2, '1211', 1, 0, '2021-03-07 12:51:42', NULL),
	(5, 'wqeq', 2, '2121', 2, 0, '2021-03-07 12:51:42', NULL),
	(6, 'eee', 2, 'eeeee', 3, 0, '2021-03-07 12:51:43', NULL),
	(7, 'rrrr', 2, 'rrrrr', 1, 0, '2021-03-07 12:51:43', NULL),
	(8, 'ttt', 2, 'tttt', 2, 0, '2021-03-07 12:51:44', NULL),
	(9, 'qqqq', 2, 'qqq', 3, 0, '2021-03-07 12:51:45', NULL),
	(10, 'fff', 2, 'fff', 1, 0, '2021-03-07 12:51:46', NULL),
	(11, 'ggg', 2, 'ggg', 2, 0, '2021-03-07 12:51:46', NULL),
	(12, 'hhh', 2, 'hhh', 3, 0, '2021-03-07 12:51:47', NULL),
	(13, 'ddd', 2, 'fff', 1, 0, '2021-03-07 12:51:48', NULL);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;

-- Dumping structure for table patpet.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` int(11) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `comment` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table patpet.comments: 2 rows
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `article`, `author`, `comment`, `created_at`, `updated_at`) VALUES
	(1, NULL, NULL, NULL, '2021-03-05 21:12:51', '2021-03-05 21:12:51'),
	(2, 2, 1, 1211212121, '2021-03-05 21:15:13', '2021-03-05 21:15:13');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table patpet.imgs
CREATE TABLE IF NOT EXISTS `imgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table patpet.imgs: 3 rows
/*!40000 ALTER TABLE `imgs` DISABLE KEYS */;
INSERT INTO `imgs` (`id`, `path`, `created_at`, `updated_at`) VALUES
	(1, 'storage/STRONG/avatar.png', '2021-03-05 11:16:40', '2021-03-05 11:16:42'),
	(2, 'storage/STRONG/default.jpg', '2021-03-05 20:22:34', '2021-03-05 20:22:34'),
	(3, 'storage/Rxx8E22Y9URONkaEZyDFLw1LP5wq22SYuifAiyrK.png', '2021-03-05 20:23:58', '2021-03-05 20:23:58');
/*!40000 ALTER TABLE `imgs` ENABLE KEYS */;

-- Dumping structure for table patpet.likes
CREATE TABLE IF NOT EXISTS `likes` (
  `article` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table patpet.likes: 2 rows
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` (`article`, `user`, `created_at`, `updated_at`) VALUES
	(1, 1, '2021-03-05 13:26:11', '2021-03-05 13:26:11'),
	(2, 1, '2021-03-05 13:26:28', '2021-03-05 13:26:28');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;

-- Dumping structure for table patpet.relations
CREATE TABLE IF NOT EXISTS `relations` (
  `follower` int(11) NOT NULL COMMENT '关注者ID',
  `followed` int(11) NOT NULL COMMENT '被关注者ID',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table patpet.relations: 2 rows
/*!40000 ALTER TABLE `relations` DISABLE KEYS */;
INSERT INTO `relations` (`follower`, `followed`, `created_at`, `updated_at`) VALUES
	(1, 2, '2021-03-05 13:31:21', '2021-03-05 13:31:21'),
	(1, 3, '2021-03-05 13:31:25', '2021-03-05 13:31:25');
/*!40000 ALTER TABLE `relations` ENABLE KEYS */;

-- Dumping structure for table patpet.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table patpet.tags: 2 rows
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`id`, `name`) VALUES
	(0, 'No Tag'),
	(1, 'Test Tag');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;

-- Dumping structure for table patpet.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `avatar` int(11) NOT NULL DEFAULT '1',
  `email` varchar(50) DEFAULT NULL,
  `introduction` text,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table patpet.users: 3 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `avatar`, `email`, `introduction`, `name`, `password`, `created_at`, `updated_at`) VALUES
	(1, 1, 'sss@www.com', NULL, '12121', '$2y$10$sZGfT4EftOEiWX5dS.dpCOTXyyt8Wp971dwbv8gzPopac/dTtu8aO', '2021-03-07 13:22:02', '2021-03-07 13:22:02'),
	(2, 1, 'Varsion13@outlook.com', NULL, '充鸭', '$2y$10$o/aw3V7Ql6ptwCqbOrm6ougoqAsrm2nPbTyEvPvSwEiBy88jAgXUC', '2021-03-07 13:56:29', '2021-03-07 13:56:29'),
	(3, 1, '18380220107@stu.nsu.edu.cn', NULL, '梁鉴华', '$2y$10$LFsOfToJJBmu8xGsSV0Ze.R8dHujm14r5Zyc2fpDDalO6XSzwZzLe', '2021-03-07 13:56:53', '2021-03-07 13:56:53');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
