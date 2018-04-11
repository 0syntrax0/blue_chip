-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 11, 2018 at 12:05 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blue_chip_marketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `message`, `email`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Carlos Saavedra', 'Post 1', 'carlos@gmail.com', '2018-04-11 04:01:04', '2018-04-11 04:01:04', 0),
(2, 'Monica', 'Post 2', 'test@xim5.com', '2018-04-11 04:08:41', '2018-04-11 04:08:41', 0),
(3, 'Polo', 'Post 3', 'polo@x.com', '2018-04-11 04:09:00', '2018-04-11 04:09:00', 0),
(4, 'Rocio', 'Post 4', 'rocio@xim5.com', '2018-04-11 04:17:47', '2018-04-11 04:17:47', 2),
(5, 'Beata', 'Post 5', 'beata@xim5.com', '2018-04-11 04:19:28', '2018-04-11 04:19:28', 2),
(6, 'John', 'Post 6 - Edited', 'john@xim5.com', '2018-04-11 04:19:33', '2018-04-11 04:36:54', 2),
(7, 'Jarod', 'Post 7', 'jarod@xim5.com', '2018-04-11 04:21:20', '2018-04-11 04:21:20', 0),
(8, 'Sergio', 'Post 8', 'sergio@xim5.com', '2018-04-11 04:21:43', '2018-04-11 04:21:43', 0),
(9, 'Kevin', 'Post 9', 'kevin@xim5.com', '2018-04-11 04:22:45', '2018-04-11 04:22:45', 0),
(10, 'Miguel', 'Post 10', 'miguel@gmail.com', '2018-04-11 04:23:11', '2018-04-11 04:23:11', 0),
(11, 'Bill', 'Post 11', 'bill@yahoo.com', '2018-04-11 04:23:31', '2018-04-11 04:23:31', 0),
(12, 'Sarah', 'Post 12', 'sarah@gmail.com', '2018-04-11 04:25:14', '2018-04-11 04:25:14', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
