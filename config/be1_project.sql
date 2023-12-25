-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 24, 2023 at 08:29 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_products`
--

INSERT INTO `cart_products` (`cart_id`, `user_id`, `product_id`, `quantity`) VALUES
(1, 0, 0, 3),
(2, 4, 1, 2),
(3, 4, 0, 1);

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
(1, 38),
(1, 39),
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
(3, 39),
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
(12, 40),
(12, 41),
(12, 42);

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
(1, 1),
(1, 2),
(1, 3),
(1, 40),
(1, 41),
(2, 42);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `image` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`image`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image`, `product_id`) VALUES
('6488e34455d69f844e8276acc683a94c_product6.jpg', 42),
('0db6a0784fec10ef11dab6dbee0f42a2_product7.jpg', 42);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `product_id` int NOT NULL,
  `date_add` date NOT NULL,
  `current_quantity` int NOT NULL,
  `input_quantity` int NOT NULL,
  PRIMARY KEY (`product_id`,`date_add`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`product_id`, `date_add`, `current_quantity`, `input_quantity`) VALUES
(1, '2023-12-23', 8, 10),
(2, '2023-12-23', 0, 15);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `firstname`, `lastname`, `username`, `gender`, `email`, `phone`, `address`, `password`, `role`) VALUES
(1, '', '', 'admin', 0, 'zxczxc@gmail.com', '', 'zzzzzzzzzzzz', 'admin', 1),
(2, '', '', 'hoang', 0, 'hoang@gmail.com', '', 'abc', '12345', 0),
(4, 'Van', 'Hoang', 'vanhoang', 1, 'hoang@gmail.com', '0825060778', 'HoChiMinhCity', '$2y$10$L6b.ecaCev2raUzGIV1eROadpJfF.PU46mxtBpmP7wbL1ks8t.Lgi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `order_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  PRIMARY KEY (`order_detail_id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `discount_id` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `discount_id`, `description`, `image`) VALUES
(1, 'A9 Gold with Apple M1', 200, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>11.9 x 11.9 x 1.6 inches</li><li>Portable electronics</li><li>Wi-Fi, Bluetooth</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2020/12/Product-8-600x600.jpg'),
(2, 'Charger 10840 White', 150, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>11.9 x 6.8 x 1.6 inches</li><li>Maintains compatibility with Qi charging</li><li>Compatible with iPhone 12 Pro</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2020/12/Product-6-600x600.jpg'),
(3, 'Apple 11 iPad Pro 128GB', 100, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Screen Size 11 in</li><li>Operating SystemApple iOS</li><li>RAM Memory 8 GB</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2020/12/Product-5-600x600.jpg'),
(4, 'Apple AirPods Pro 2021', 100, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Adaptive EQ Technology</li><li>Active Noise Cancellation ANC</li><li>Crosstalk Technology</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2023/06/Rectangle-1-600x600.jpg'),
(5, 'IPad Gen 4 Wi-Fi 256GB', 200, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Screen Size 10.9 in</li><li>Operating System Apple iOS</li><li>Product Length 9.74 in</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2020/12/Product-14-600x600.jpg'),
(6, 'MUSIGO Powerbeat', 180, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>In-Ear Headphones</li><li>True Wireless</li><li>Style – In-Ear</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2022/08/Product-12-600x600.jpg'),
(7, '24‑Mac with Apple M1 chip', 200, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Operating System Apple OS.16</li><li>1TB Storage + 64GB RAM</li><li>M1 15700 CPU</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2020/12/Product-3-600x600.jpg'),
(8, 'Air Cooler With A-RGB', 150, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>6.1-inch (15.5 cm diagonal)</li><li>Rate Monitor</li><li>System Cooling</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2018/05/Product-23-600x600.jpg'),
(9, 'Apple iPad Pro 256GB', 200, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Operating System Apple OS.16</li><li>1TB Storage + 64GB RAM</li><li>M1 15700 CPU</li></ul></div>', 'src=\"https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2020/12/Product-28-600x600.jpg\"'),
(10, 'Fan led GRB Collomon', 200, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>6.1-inch (15.5 cm diagonal)</li><li>Rate Monitor</li><li>Operating system</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2020/04/Product-21-600x600.jpg'),
(11, 'Intel Gen Processors', 200, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>MSI GeForce RTX 3000</li><li>Intel Core i7</li><li>Up to 4.7 GHz Max Boost</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2020/04/Product-25-600x600.jpg'),
(12, 'Ipad Modern 3D', 250, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Intel i9-13700 G1 CPU</li><li>32GB RAM</li><li>RTX 3080 Ti Master 12GB</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2018/10/products-1-600x600.jpg'),
(13, 'Mac Gen 9 Wi-Fi 1TB', 100, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Operating System Apple OS.16</li><li>1TB Storage + 64GB RAM</li><li>M1 15700 CPU</li></ul></div>', ''),
(14, 'Mac mini M2 2023', 350, 0, '<div itemprop=\"description\" class=\"description\"><div id=\"tw-target-text-container\" class=\"tw-ta-container F0azHf tw-nfl\" tabindex=\"0\"><ul><li id=\"tw-target-text\" class=\"tw-data-text tw-text-large tw-ta\" dir=\"ltr\" data-placeholder=\"Bản dịch\"><span class=\"Y2IQFc\" lang=\"en\">MacOS Ventura</span></li><li dir=\"ltr\" data-placeholder=\"Bản dịch\">SSD 256GB</li><li dir=\"ltr\" data-placeholder=\"Bản dịch\">16 Cores Neural Engine</li></ul></div></div>', ''),
(15, 'Multi-Touch Surface', 90, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Fully Unlocked</li><li>USB-C to Lightning Cable</li><li>Multi-Touch</li></ul></div>', ''),
(16, '24‑Mac with Apple M1 chip', 200, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Operating System Apple OS.16</li><li>1TB Storage + 64GB RAM</li><li>M1 15700 CPU</li></ul></div>', ''),
(17, 'Apple iPad Pro 256GB', 250, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Operating System Apple OS.16</li><li>1TB Storage + 64GB RAM</li><li>M1 15700 CPU</li></ul></div>', ''),
(18, 'Desk Clock Bluetooth Speaker', 100, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>5.0 inch HD Screen</li><li>Android 4.4 KitKat OS</li><li>1.4 GHz Quad Core™ Processor</li></ul></div>', ''),
(19, 'OS5 Game console 2.0', 180, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Enhanced analog sticks</li><li>integrated light bar</li><li>comfort with intuitive</li></ul></div>', ''),
(20, 'Watch Series 6 GPS', 30, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Aluminum Case</li><li>GPS and a barometric altimeter</li><li>Heart Rate Monitor</li></ul></div>', ''),
(21, 'Apple Ultrasharp Os.20', 150, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>3.53 Inches (H) x 3.94 Inches (W)</li><li>Wi-Fi, Bluetooth</li><li>Alexa Built-in</li></ul></div>', ''),
(22, 'Case for Iphone 11 Hulk', 25, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>6.1-inch (15.5 cm diagonal)</li><li>Rate Monitor</li><li>Operating system</li></ul></div>', ''),
(23, 'Mac Gen 8 Wi-Fi 1TB', 150, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>128GB SSD</li><li>8 GB Memory</li><li>2560×1600 Display</li></ul></div>', ''),
(24, 'Marshall Major (III) 3', 110, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>True Wireless</li><li>Portable electronics</li><li>Style – In-Ear</li></ul></div>', ''),
(25, 'Apple iPad Pro 256GB', 200, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Operating System Apple OS.16</li><li>1TB Storage + 64GB RAM</li><li>M1 15700 CPU</li></ul></div>', ''),
(26, 'Case for Iphone 11 Hulk', 25, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>6.1-inch (15.5 cm diagonal)</li><li>Rate Monitor</li><li>Operating system</li></ul></div>', ''),
(27, 'Intel Gen Processors\r\n', 200, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>MSI GeForce RTX 3000</li><li>Intel Core i7</li><li>Up to 4.7 GHz Max Boost</li></ul></div>', ''),
(28, 'Iphone 14 Pro Max 1TB', 300, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Fully Unlocked</li><li>6.9-inch (15.5 cm diagonal)</li><li>120Hz Fluid Display</li></ul></div>', ''),
(29, 'Iphone XR 64G', 280, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Fully Unlocked</li><li>6.9-inch (15.5 cm diagonal)</li><li>120Hz Fluid Display</li></ul></div>', ''),
(30, '24‑Mac with Apple M1 chip', 200, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Operating System Apple OS.16</li><li>1TB Storage + 64GB RAM</li><li>M1 15700 CPU</li></ul></div>', ''),
(31, 'A9 Gold with Apple M1', 200, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>11.9 x 11.9 x 1.6 inches</li><li>Portable electronics</li><li>Wi-Fi, Bluetooth</li></ul></div>', ''),
(32, '\r\nApple Ultrasharp Os.20', 150, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>3.53 Inches (H) x 3.94 Inches (W)</li><li>Wi-Fi, Bluetooth</li><li>Alexa Built-in</li></ul></div>', ''),
(33, 'A9 Gold Series 8 GPS', 250, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>With Bluetooth and Full Touch</li><li>Heart Rate Monitor</li><li>Calorie Counting</li></ul></div>', ''),
(34, 'Desk Clock Bluetooth Speaker', 100, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>5.0 inch HD Screen</li><li>Android 4.4 KitKat OS</li><li>1.4 GHz Quad Core™ Processor</li></ul></div>', ''),
(35, 'Watch Series 6 GPS', 30, 0, '<div itemprop=\"description\" class=\"description\"><ul><li>Aluminum Case</li><li>GPS and a barometric altimeter</li><li>Heart Rate Monitor</li></ul></div>', ''),
(38, 'Iphone', 222, 0, 'Rose', 'hinh3.png'),
(39, 'Iphone', 22, 0, 'mota', '3'),
(40, 'Iphone15', 123, 0, '2222', 'hinh3.png'),
(41, 'Iphone', 222, 0, '2222', ''),
(42, 'Iphone17', 999, 0, 'Rose', '');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `review_id` int NOT NULL AUTO_INCREMENT,
  `product_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_date` datetime NOT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
