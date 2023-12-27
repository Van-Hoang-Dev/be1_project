-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 27, 2023 at 02:43 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be1_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `review_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`review_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `product_id`, `user_phone`, `rating`, `comment`, `review_date`) VALUES
(23, 3, '123456789', 0, '<h2><span style=\"color:hsl(0, 75%, 60%);\"><i><strong>San pham chat luong, lan sau se quay lai.</strong></i></span></h2>', '2023-12-27 12:24:46'),
(22, 2, '0763324922', 5, '<p><i>San pham chat luong</i></p>', '2023-12-27 12:06:40'),
(21, 1, '0763324922', 4, '<p><i>Hay qua</i></p>', '2023-12-27 11:47:51'),
(19, 1, '0763324922', 3, '<p>Hay&nbsp;</p>', '2023-12-27 11:46:35'),
(24, 4, '0763324922', 4, '<h2>san pham tot</h2>', '2023-12-27 12:53:58'),
(29, 5, '0763324922', 4, '<p><span style=\"color:hsl(0, 75%, 60%);\">san pham tot</span></p>', '2023-12-27 14:29:43'),
(33, 5, '0763324922', 2, '<p>that vong&nbsp;</p><p>mong store cải thiện chất lượng hơn nữa</p>', '2023-12-27 14:33:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
