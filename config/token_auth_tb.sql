-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 26, 2023 at 04:45 PM
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
-- Table structure for table `token_auth_tb`
--

DROP TABLE IF EXISTS `token_auth_tb`;
CREATE TABLE IF NOT EXISTS `token_auth_tb` (
  `id` int NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `selector_hash` varchar(255) NOT NULL,
  `is_expired` int NOT NULL DEFAULT '0',
  `expiry_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `token_auth_tb`
--

INSERT INTO `token_auth_tb` (`id`, `phone`, `password_hash`, `selector_hash`, `is_expired`, `expiry_date`) VALUES
(1, '0763324922', '$2y$10$mizpowTeYUhr509yN/6z/uaxwEc/tLsJddqSCJ1oLA5VadIUtS6jC', '$2y$10$Pw3UOmFWvfumVxY/R4IUTO0lnphjwjenozsz.neZqqN5PicWeInoq', 1, '2023-12-26 09:09:45'),
(2, '0763324922', '$2y$10$B0xmKHOhKhYU6PHSlIdj.u3i.7MzrA9pijrcJRt6kWtR5h6yXhLFC', '$2y$10$XiNZxarSUvqwLukt0cY7O..jvZGlfIrSoMQpV7QgT/8xMCRbzE/.u', 1, '2023-12-26 09:11:12'),
(3, '0763324922', '$2y$10$bbY7D1emMyQQclskUJ9aGuDbOpMOsYLeBMmZsVuBMV1eRyvBKKqnW', '$2y$10$B5eXBHRe0pxJtfrQ9bBrHeNFQK3.nPNpopBljP7AiLCKENol.ybh2', 1, '2023-12-26 09:15:46'),
(4, '0763324922', '$2y$10$sCfpvVAVyyvmEncZ2wGsGeDUP.ECmHUCQ5k/c1jluW6xjN9CeyS7q', '$2y$10$w/UOFEdA5Bp5z1VtPGI1yuTOr62BPfxef5vl8VUryEetjPLmOJoVO', 1, '2023-12-26 09:15:50'),
(5, '0763324922', '$2y$10$2.v./R1As.L/62rup.rEse36D2V213r6g.rYnrHPE6kmcpt4UHja2', '$2y$10$er2lIHXpiQ37nUSCEA33J.4wslBxyFZJnXoAv5RYG.wEgYyaVNQJe', 1, '2023-12-26 09:15:55'),
(6, '0763324922', '$2y$10$KYfnNxfGtrLew.ApETAxkeF31rnRZ4GVNqXzhwSBcmT8yY4rimLuC', '$2y$10$WP7gjjHFtKlHUr2Y.6zXHeIfK0H6JOPN75QC2DbWh2ZParTTH2xYK', 1, '2023-12-26 09:19:37'),
(7, '0763324922', '$2y$10$U8.1Frb5X1o4zrhRH7v4UuNiClGIHWUBlKom.eMdhpBquE6sVOXIO', '$2y$10$47wzjrBNzuZ5lWZK9PtLCO1wAneDn6jB7sqKswqI4/izFeiYxiatq', 1, '2023-12-26 09:22:16'),
(8, '0763324922', '$2y$10$tt7ToEpm79QyC8K7xwzMJen.m3KLUwFEV6/w3tWsREAeJis47kMxi', '$2y$10$QfG8PibC9lJ5k2.dlNo0neQ6LMRqZAAMPApX565f.JVspqaVEs462', 1, '2023-12-26 09:24:55'),
(9, '0763324922', '$2y$10$5pMIUAsMyu5yi9mqj.yHMuc5GWqKcXi/AV.9.skCmF0ljXmtQgkCe', '$2y$10$6dmtjaVtM1ER0Dxn6FNUR.C.SCp.xiAqON2YP2Xx60ay0RkCQUr3i', 1, '2023-12-26 09:26:37'),
(10, '0763324922', '$2y$10$LCvViAbmMhE3YlSsdgUSseUr7sNJCOHK6yEsMcgFVrcHnWYWPgWdS', '$2y$10$/ZJEMwvBiR0QG3SHz8Qv9eK1TmQYGWwOfnxYSsMK2IYR7dIKABWrS', 1, '2023-12-26 09:29:07'),
(11, '0763324922', '$2y$10$nkmiuz6BWYXo1oEL5hVRjuLtdTBowTUYHoyYpqPRRKlUSsdFCYFfe', '$2y$10$K4.MdjIRPXHB8czDFTxHm.UJpVO4V0bAYIoAmZNjzPO3hGS.EtVli', 1, '2023-12-26 09:32:09'),
(12, '0763324922', '$2y$10$v4siyJ0.HW/qDcUg.C3GMu1TxqllbY5oXXJLyuRMcYPN9a19qR.2a', '$2y$10$yc8GYO8.UZrySb3TjbPpEeYdw.hDoJvMGsrnsGYLQsT.pDxT/oQ5m', 0, '2023-12-26 09:37:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
