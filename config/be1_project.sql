-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 27, 2023 at 03:02 PM
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
CREATE DATABASE IF NOT EXISTS `be1_project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `be1_project`;

-- --------------------------------------------------------

--
-- Table structure for table `cart_products`
--

DROP TABLE IF EXISTS `cart_products`;
CREATE TABLE IF NOT EXISTS `cart_products` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_products`
--

INSERT INTO `cart_products` (`cart_id`, `user_id`, `product_id`, `quantity`) VALUES
(10, 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Accessories'),
(2, 'Cell Phones'),
(3, 'Computers'),
(4, 'Games & Videos'),
(5, 'Home Smart'),
(6, 'Phone Cases'),
(7, 'SmartPhones'),
(8, 'TV/Audio'),
(9, 'Watches'),
(10, 'Dien thoai'),
(12, 'Dien thoai moi');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

DROP TABLE IF EXISTS `category_product`;
CREATE TABLE IF NOT EXISTS `category_product` (
  `category_id` int NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`category_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`category_id`, `product_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(4, 16),
(4, 17),
(4, 18),
(4, 19),
(4, 20),
(5, 21),
(5, 22),
(5, 23),
(6, 24),
(7, 25),
(7, 27),
(7, 28),
(7, 29),
(8, 30),
(8, 31),
(8, 32),
(9, 33),
(9, 34),
(9, 35),
(12, 44),
(12, 49),
(12, 51),
(12, 52);

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

DROP TABLE IF EXISTS `discounts`;
CREATE TABLE IF NOT EXISTS `discounts` (
  `discount_id` int NOT NULL AUTO_INCREMENT,
  `discount_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_amount` int NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`discount_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`discount_id`, `discount_code`, `discount_amount`, `is_active`, `start_date`, `end_date`) VALUES
(1, 'SN2023', 10, 1, '2023-12-05', '2023-12-07'),
(2, 'SDNOEN2023', 20, 1, '2023-12-21', '2023-12-26'),
(4, '1111', 1111, 1, '2023-12-23', '2023-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `discount_product`
--

DROP TABLE IF EXISTS `discount_product`;
CREATE TABLE IF NOT EXISTS `discount_product` (
  `discount_id` int NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`discount_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `discount_product`
--

INSERT INTO `discount_product` (`discount_id`, `product_id`) VALUES
(1, 2),
(1, 3),
(1, 44);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `image` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int NOT NULL,
  `main` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`image`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image`, `product_id`, `main`) VALUES
('093de613fb32bae669242da33f4fea9e.jpg', 49, 1),
('bb23861ea099af2d8c5de3b3fea4da20_product3.jpg', 1, 1),
('658c316e3b400.png', 52, 0),
('adae90e6acc8b85756d3b9c40b79608c_Product-6-600x600.jpg', 2, 1),
('f2459a9c656c56b533d7443fd7992597_product5.jpg', 3, 1),
('a6aac8b4457d0dad82c67ea2c4bd87f7_product2.jpg', 4, 1),
('10489545d606278990e8399d61ad1d87_product5.jpg', 4, 0),
('d2356d997b116f8b0bf8c5c939f9deaf_product7.jpg', 5, 1),
('df273044d189fd1b16606771a9d93ce2.jpg', 6, 1),
('e8f92e9728e5e187620ad011e8323849.jpg', 44, 1),
('658c316e3a33d.png', 52, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `product_id` int NOT NULL,
  `date_add` date NOT NULL,
  `input_quantity` int NOT NULL,
  PRIMARY KEY (`product_id`,`date_add`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`product_id`, `date_add`, `input_quantity`) VALUES
(1, '2023-12-28', 5),
(1, '2023-12-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode_zip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`email`,`phone`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `firstname`, `lastname`, `email`, `phone`, `address`, `postcode_zip`, `password`, `role`) VALUES
(4, 'Van', 'Hoang', 'hoang@gmail.com', '0825060778', 'HoChiMinhCity', '046443', '$2y$10$L6b.ecaCev2raUzGIV1eROadpJfF.PU46mxtBpmP7wbL1ks8t.Lgi', 1),
(14, 'Hoang', 'Nguyen', 'hoang@gmail.com', '012345', 'Linh chieu, Thu duc', '12345', '', 0),
(16, 'Khang', 'Do', 'dokhang09@gmail.com', '0397744202', 'Linh chieu, Thu ducCity, HoChiMinhCity', '12345', '$2y$10$zWIobAWKqjnVpLhJQHGi0udZj4.jlLPK2bD4FxEzmdcEDDfAXBugy', 0),
(17, 'Chien', 'Doo', 'chienthietcho@gmail.com', '0763324922', 'HoChiMinhCity', '12345', '$2y$10$DUmOaVDg86I7xgpxY/HCm.WkGtjXfedW9O82SZi03xWaNl3ey6d4a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `order_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_status`, `order_date`) VALUES
(24, 4, '', '2023-12-26 03:01:32'),
(25, 4, '', '2023-12-27 02:03:53'),
(26, 4, '', '2023-12-27 02:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `order_detail_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price_per_unit` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `order_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`order_detail_id`,`order_code`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_id`, `product_id`, `quantity`, `price_per_unit`, `subtotal`, `order_code`) VALUES
(19, 24, 1, 1, '200.00', '200.00', 'ORD-26122023030132-024'),
(20, 25, 1, 3, '200.00', '600.00', 'ORD-27122023020353-025'),
(21, 25, 2, 3, '150.00', '450.00', 'ORD-27122023020353-025'),
(22, 26, 1, 1, '200.00', '200.00', 'ORD-27122023024906-026');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount_id` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_quantity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `discount_id`, `description`, `current_quantity`) VALUES
(1, 'A9 Gold with Apple M1', '200.00', 1, '<div itemprop=\"description\" class=\"description\"><ul><li>11.9 x 11.9 x 1.6 inches</li><li>Portable electronics</li><li>Wi-Fi, Bluetooth</li></ul></div>', 5),
(2, 'Charger 10840 White', '150.00', 0, '<ul><li>11.9 x 6.8 x 1.6 inches</li><li>Maintains compatibility with Qi charging</li><li>Compatible with iPhone 12 Pro</li></ul>', 0),
(3, 'Apple 11 iPad Pro 128GB', '100.00', 0, '<ul><li>Screen Size 11 in</li><li>Operating SystemApple iOS</li><li>RAM Memory 8 GB</li></ul>', 0),
(4, 'Apple AirPods Pro 2021', '100.00', 0, '<ul><li>Adaptive EQ Technology</li><li>Active Noise Cancellation ANC</li><li>Crosstalk Technology</li></ul>', 0),
(5, 'IPad Gen 4 Wi-Fi 256GB', '200.00', 0, '<ul><li>Screen Size 10.9 in</li><li>Operating System Apple iOS</li><li>Product Length 9.74 in</li></ul>', 0),
(6, 'MUSIGO Powerbeat', '180.00', 0, '<ul><li>In-Ear Headphones</li><li>True Wireless</li><li>Style – In-Ear</li></ul>', 0),
(44, 'Hoang', '999.00', 0, '<p>This iss my hone</p>', 0),
(7, '24‑Mac with Apple M1 chip', '200.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Operating System Apple OS.16</li><li>1TB Storage + 64GB RAM</li><li>M1 15700 CPU</li></ul></div>', 0),
(8, 'Air Cooler With A-RGB', '150.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>6.1-inch (15.5 cm diagonal)</li><li>Rate Monitor</li><li>System Cooling</li></ul></div>', 0),
(9, 'Apple iPad Pro 256GB', '200.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Operating System Apple OS.16</li><li>1TB Storage + 64GB RAM</li><li>M1 15700 CPU</li></ul></div>', 0),
(10, 'Fan led GRB Collomon', '200.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>6.1-inch (15.5 cm diagonal)</li><li>Rate Monitor</li><li>Operating system</li></ul></div>', 0),
(11, 'Intel Gen Processors', '200.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>MSI GeForce RTX 3000</li><li>Intel Core i7</li><li>Up to 4.7 GHz Max Boost</li></ul></div>', 0),
(12, 'Ipad Modern 3D', '250.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Intel i9-13700 G1 CPU</li><li>32GB RAM</li><li>RTX 3080 Ti Master 12GB</li></ul></div>', 0),
(13, 'Mac Gen 9 Wi-Fi 1TB', '100.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Operating System Apple OS.16</li><li>1TB Storage + 64GB RAM</li><li>M1 15700 CPU</li></ul></div>', 0),
(14, 'Mac mini M2 2023', '350.00', 0, '<div itemprop=\"description\" class=\"description\"><div id=\"tw-target-text-container\" class=\"tw-ta-container F0azHf tw-nfl\" tabindex=\"0\"><ul><li id=\"tw-target-text\" class=\"tw-data-text tw-text-large tw-ta\" dir=\"ltr\" data-placeholder=\"Bản dịch\"><span class=\"Y2IQFc\" lang=\"en\">MacOS Ventura</span></li><li dir=\"ltr\" data-placeholder=\"Bản dịch\">SSD 256GB</li><li dir=\"ltr\" data-placeholder=\"Bản dịch\">16 Cores Neural Engine</li></ul></div></div>', 0),
(15, 'Multi-Touch Surface', '90.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Fully Unlocked</li><li>USB-C to Lightning Cable</li><li>Multi-Touch</li></ul></div>', 0),
(16, '24‑Mac with Apple M1 chip', '200.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Operating System Apple OS.16</li><li>1TB Storage + 64GB RAM</li><li>M1 15700 CPU</li></ul></div>', 0),
(17, 'Apple iPad Pro 256GB', '250.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Operating System Apple OS.16</li><li>1TB Storage + 64GB RAM</li><li>M1 15700 CPU</li></ul></div>', 0),
(18, 'Desk Clock Bluetooth Speaker', '100.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>5.0 inch HD Screen</li><li>Android 4.4 KitKat OS</li><li>1.4 GHz Quad Core™ Processor</li></ul></div>', 0),
(19, 'OS5 Game console 2.0', '180.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Enhanced analog sticks</li><li>integrated light bar</li><li>comfort with intuitive</li></ul></div>', 0),
(20, 'Watch Series 6 GPS', '30.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Aluminum Case</li><li>GPS and a barometric altimeter</li><li>Heart Rate Monitor</li></ul></div>', 0),
(21, 'Apple Ultrasharp Os.20', '150.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>3.53 Inches (H) x 3.94 Inches (W)</li><li>Wi-Fi, Bluetooth</li><li>Alexa Built-in</li></ul></div>', 0),
(22, 'Case for Iphone 11 Hulk', '25.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>6.1-inch (15.5 cm diagonal)</li><li>Rate Monitor</li><li>Operating system</li></ul></div>', 0),
(23, 'Mac Gen 8 Wi-Fi 1TB', '150.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>128GB SSD</li><li>8 GB Memory</li><li>2560×1600 Display</li></ul></div>', 0),
(24, 'Marshall Major (III) 3', '110.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>True Wireless</li><li>Portable electronics</li><li>Style – In-Ear</li></ul></div>', 0),
(25, 'Apple iPad Pro 256GB', '200.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Operating System Apple OS.16</li><li>1TB Storage + 64GB RAM</li><li>M1 15700 CPU</li></ul></div>', 0),
(26, 'Case for Iphone 11 Hulk', '25.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>6.1-inch (15.5 cm diagonal)</li><li>Rate Monitor</li><li>Operating system</li></ul></div>', 0),
(27, 'Intel Gen Processors\r\n', '200.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>MSI GeForce RTX 3000</li><li>Intel Core i7</li><li>Up to 4.7 GHz Max Boost</li></ul></div>', 0),
(28, 'Iphone 14 Pro Max 1TB', '300.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Fully Unlocked</li><li>6.9-inch (15.5 cm diagonal)</li><li>120Hz Fluid Display</li></ul></div>', 0),
(29, 'Iphone XR 64G', '280.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Fully Unlocked</li><li>6.9-inch (15.5 cm diagonal)</li><li>120Hz Fluid Display</li></ul></div>', 0),
(30, '24‑Mac with Apple M1 chip', '200.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Operating System Apple OS.16</li><li>1TB Storage + 64GB RAM</li><li>M1 15700 CPU</li></ul></div>', 0),
(31, 'A9 Gold with Apple M1', '200.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>11.9 x 11.9 x 1.6 inches</li><li>Portable electronics</li><li>Wi-Fi, Bluetooth</li></ul></div>', 0),
(32, '\r\nApple Ultrasharp Os.20', '150.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>3.53 Inches (H) x 3.94 Inches (W)</li><li>Wi-Fi, Bluetooth</li><li>Alexa Built-in</li></ul></div>', 0),
(33, 'A9 Gold Series 8 GPS', '250.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>With Bluetooth and Full Touch</li><li>Heart Rate Monitor</li><li>Calorie Counting</li></ul></div>', 0),
(34, 'Desk Clock Bluetooth Speaker', '100.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>5.0 inch HD Screen</li><li>Android 4.4 KitKat OS</li><li>1.4 GHz Quad Core™ Processor</li></ul></div>', 0),
(35, 'Watch Series 6 GPS', '30.00', 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Aluminum Case</li><li>GPS and a barometric altimeter</li><li>Heart Rate Monitor</li></ul></div>', 0),
(52, 'Daisy', '999.00', 0, '<p>ll</p>', 0);

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
(23, 3, '123456789', 0, '<h2><span style=\"color:hsl(0, 75%, 60%);\"><i><strong>San pham chat luong, lan sau se quay lai.</strong></i></span></h2>', '2023-12-27 05:24:46'),
(22, 2, '0763324922', 5, '<p><i>San pham chat luong</i></p>', '2023-12-27 05:06:40'),
(21, 1, '0763324922', 4, '<p><i>Hay qua</i></p>', '2023-12-27 04:47:51'),
(19, 1, '0763324922', 3, '<p>Hay&nbsp;</p>', '2023-12-27 04:46:35'),
(24, 4, '0763324922', 4, '<h2>san pham tot</h2>', '2023-12-27 05:53:58'),
(29, 5, '0763324922', 4, '<p><span style=\"color:hsl(0, 75%, 60%);\">san pham tot</span></p>', '2023-12-27 07:29:43'),
(33, 5, '0763324922', 2, '<p>that vong&nbsp;</p><p>mong store cải thiện chất lượng hơn nữa</p>', '2023-12-27 07:33:32');

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `token_auth_tb`
--

INSERT INTO `token_auth_tb` (`id`, `phone`, `password_hash`, `selector_hash`, `is_expired`, `expiry_date`) VALUES
(1, '0763324922', '$2y$10$mizpowTeYUhr509yN/6z/uaxwEc/tLsJddqSCJ1oLA5VadIUtS6jC', '$2y$10$Pw3UOmFWvfumVxY/R4IUTO0lnphjwjenozsz.neZqqN5PicWeInoq', 1, '2023-12-26 02:09:45'),
(2, '0763324922', '$2y$10$B0xmKHOhKhYU6PHSlIdj.u3i.7MzrA9pijrcJRt6kWtR5h6yXhLFC', '$2y$10$XiNZxarSUvqwLukt0cY7O..jvZGlfIrSoMQpV7QgT/8xMCRbzE/.u', 1, '2023-12-26 02:11:12'),
(3, '0763324922', '$2y$10$bbY7D1emMyQQclskUJ9aGuDbOpMOsYLeBMmZsVuBMV1eRyvBKKqnW', '$2y$10$B5eXBHRe0pxJtfrQ9bBrHeNFQK3.nPNpopBljP7AiLCKENol.ybh2', 1, '2023-12-26 02:15:46'),
(4, '0763324922', '$2y$10$sCfpvVAVyyvmEncZ2wGsGeDUP.ECmHUCQ5k/c1jluW6xjN9CeyS7q', '$2y$10$w/UOFEdA5Bp5z1VtPGI1yuTOr62BPfxef5vl8VUryEetjPLmOJoVO', 1, '2023-12-26 02:15:50'),
(5, '0763324922', '$2y$10$2.v./R1As.L/62rup.rEse36D2V213r6g.rYnrHPE6kmcpt4UHja2', '$2y$10$er2lIHXpiQ37nUSCEA33J.4wslBxyFZJnXoAv5RYG.wEgYyaVNQJe', 1, '2023-12-26 02:15:55'),
(6, '0763324922', '$2y$10$KYfnNxfGtrLew.ApETAxkeF31rnRZ4GVNqXzhwSBcmT8yY4rimLuC', '$2y$10$WP7gjjHFtKlHUr2Y.6zXHeIfK0H6JOPN75QC2DbWh2ZParTTH2xYK', 1, '2023-12-26 02:19:37'),
(7, '0763324922', '$2y$10$U8.1Frb5X1o4zrhRH7v4UuNiClGIHWUBlKom.eMdhpBquE6sVOXIO', '$2y$10$47wzjrBNzuZ5lWZK9PtLCO1wAneDn6jB7sqKswqI4/izFeiYxiatq', 1, '2023-12-26 02:22:16'),
(8, '0763324922', '$2y$10$tt7ToEpm79QyC8K7xwzMJen.m3KLUwFEV6/w3tWsREAeJis47kMxi', '$2y$10$QfG8PibC9lJ5k2.dlNo0neQ6LMRqZAAMPApX565f.JVspqaVEs462', 1, '2023-12-26 02:24:55'),
(9, '0763324922', '$2y$10$5pMIUAsMyu5yi9mqj.yHMuc5GWqKcXi/AV.9.skCmF0ljXmtQgkCe', '$2y$10$6dmtjaVtM1ER0Dxn6FNUR.C.SCp.xiAqON2YP2Xx60ay0RkCQUr3i', 1, '2023-12-26 02:26:37'),
(10, '0763324922', '$2y$10$LCvViAbmMhE3YlSsdgUSseUr7sNJCOHK6yEsMcgFVrcHnWYWPgWdS', '$2y$10$/ZJEMwvBiR0QG3SHz8Qv9eK1TmQYGWwOfnxYSsMK2IYR7dIKABWrS', 1, '2023-12-26 02:29:07'),
(11, '0763324922', '$2y$10$nkmiuz6BWYXo1oEL5hVRjuLtdTBowTUYHoyYpqPRRKlUSsdFCYFfe', '$2y$10$K4.MdjIRPXHB8czDFTxHm.UJpVO4V0bAYIoAmZNjzPO3hGS.EtVli', 1, '2023-12-26 02:32:09'),
(12, '0763324922', '$2y$10$v4siyJ0.HW/qDcUg.C3GMu1TxqllbY5oXXJLyuRMcYPN9a19qR.2a', '$2y$10$yc8GYO8.UZrySb3TjbPpEeYdw.hDoJvMGsrnsGYLQsT.pDxT/oQ5m', 0, '2023-12-26 02:37:00'),
(13, '0825060778', '$2y$10$PsBhhegp/xfRVkqvuFr1k.YrrKRaIOzp/Z6Ls3H87aARjhOq88cta', '$2y$10$Acf5xXspIWB4i68Fz6U7feBT7vkVkVOz.49gMw15V.P3dBqtH/vKu', 1, '2023-12-26 09:59:52'),
(14, '0825060778', '$2y$10$GEMk80qTbmr/LeebM9xb0uM.FI1MHRRbntbDcyopcObmVXhQTwIH2', '$2y$10$DUehiFN8LWNaQZLNsHje1uFw/XBH4jRJtzpGWWm1v5d5u9gSI.LQy', 1, '2023-12-26 10:04:18'),
(15, '0825060778', '$2y$10$H94teHFlQjZjWfLclbor7ezN3iIXC.QfcSCMNW.6alpCnb4krTCpe', '$2y$10$ySnOjEssnjdpQePoExBQWuMJZ.isk85N9gx/ON5N0k45KZ8Il0aqW', 1, '2023-12-26 10:19:29'),
(16, '0825060778', '$2y$10$1E.K1eL9m6q7WdOx0mYFy.FniD66fptaNYLPQdUKXsNqbySoN8MHC', '$2y$10$WNaePLRIb/zpxlS/AQr9Qu8FaS1a6msZZrrHvUCGzUljAz2k7U0XS', 1, '2023-12-26 10:25:10'),
(17, '0825060778', '$2y$10$3f/cB5qZdDgjjtKQUbDA8OGpSDxoPxY0HPRm.XlVRdN8CnbWK0Muq', '$2y$10$sfScDjvU3oEWRncjVLaSMe6J.7/3Xb7uPZspm3Am82GoF5JgX5waS', 0, '2023-12-28 00:50:02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
