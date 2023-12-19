-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 18, 2023 at 05:05 PM
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
-- Database: `be1`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_products`
--

DROP TABLE IF EXISTS `cart_products`;
CREATE TABLE IF NOT EXISTS `cart_products` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `product_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`cart_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(9, 35);

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
  `phone` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`phone`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `firstname`, `lastname`, `username`, `gender`, `email`, `phone`, `address`, `password`, `role`) VALUES
(18, 'Trần Trung', 'Chiến', 'chien', 1, 'chientt.00@gmail.com', '0763324922', 'TP. Hồ Chí Minh', '$2y$10$eHwov5ikNSzll7QZ/uKS0eMTaBZ7edGOs4RXTqm62mcHg3wDN9lmG', 0),
(20, 'Trần', 'Thư', '123', 2, 'trungchienhz77@gmail.com', '0123', 'hcm', '$2y$10$b4TfPVy/elnqO620RklG4uOpy56wllfzWJjjNypuULfsaiHtXcev6', 0),
(19, 'Nguyễn Hữu', 'Vinh', 'admin', 1, 'huuvinh123@gmail.com', '0123456789', 'HCM', '$2y$10$.O5FDTfzbEhqr1PHCvvFbO6arvuOicH9E6zic7hf/W3OqrVme4Zei', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `order_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`order_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
CREATE TABLE IF NOT EXISTS `order_product` (
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`order_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'A9 Gold with Apple M1', 200, '<div itemprop=\"description\" class=\"description\"><ul><li>11.9 x 11.9 x 1.6 inches</li><li>Portable electronics</li><li>Wi-Fi, Bluetooth</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2020/12/Product-8-600x600.jpg'),
(2, 'Charger 10840 White', 150, '<div itemprop=\"description\" class=\"description\"><ul><li>11.9 x 6.8 x 1.6 inches</li><li>Maintains compatibility with Qi charging</li><li>Compatible with iPhone 12 Pro</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2020/12/Product-6-600x600.jpg'),
(3, 'Apple 11 iPad Pro 128GB', 100, '<div itemprop=\"description\" class=\"description\"><ul><li>Screen Size 11 in</li><li>Operating SystemApple iOS</li><li>RAM Memory 8 GB</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2020/12/Product-5-600x600.jpg'),
(4, 'Apple AirPods Pro 2021', 100, '<div itemprop=\"description\" class=\"description\"><ul><li>Adaptive EQ Technology</li><li>Active Noise Cancellation ANC</li><li>Crosstalk Technology</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2023/06/Rectangle-1-600x600.jpg'),
(5, 'IPad Gen 4 Wi-Fi 256GB', 200, '<div itemprop=\"description\" class=\"description\"><ul><li>Screen Size 10.9 in</li><li>Operating System Apple iOS</li><li>Product Length 9.74 in</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2020/12/Product-14-600x600.jpg'),
(6, 'MUSIGO Powerbeat', 180, '<div itemprop=\"description\" class=\"description\"><ul><li>In-Ear Headphones</li><li>True Wireless</li><li>Style – In-Ear</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2022/08/Product-12-600x600.jpg'),
(7, '24‑Mac with Apple M1 chip', 200, '<div itemprop=\"description\" class=\"description\"><ul><li>Operating System Apple OS.16</li><li>1TB Storage + 64GB RAM</li><li>M1 15700 CPU</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2020/12/Product-3-600x600.jpg'),
(8, 'Air Cooler With A-RGB', 150, '<div itemprop=\"description\" class=\"description\"><ul><li>6.1-inch (15.5 cm diagonal)</li><li>Rate Monitor</li><li>System Cooling</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2018/05/Product-23-600x600.jpg'),
(9, 'Apple iPad Pro 256GB', 200, '<div itemprop=\"description\" class=\"description\"><ul><li>Operating System Apple OS.16</li><li>1TB Storage + 64GB RAM</li><li>M1 15700 CPU</li></ul></div>', 'src=\"https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2020/12/Product-28-600x600.jpg\"'),
(10, 'Fan led GRB Collomon', 200, '<div itemprop=\"description\" class=\"description\"><ul><li>6.1-inch (15.5 cm diagonal)</li><li>Rate Monitor</li><li>Operating system</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2020/04/Product-21-600x600.jpg'),
(11, 'Intel Gen Processors', 200, '<div itemprop=\"description\" class=\"description\"><ul><li>MSI GeForce RTX 3000</li><li>Intel Core i7</li><li>Up to 4.7 GHz Max Boost</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2020/04/Product-25-600x600.jpg'),
(12, 'Ipad Modern 3D', 250, '<div itemprop=\"description\" class=\"description\"><ul><li>Intel i9-13700 G1 CPU</li><li>32GB RAM</li><li>RTX 3080 Ti Master 12GB</li></ul></div>', 'https://wpbingosite.com/wordpress/arostore/wp-content/uploads/2018/10/products-1-600x600.jpg'),
(13, 'Mac Gen 9 Wi-Fi 1TB', 100, '<div itemprop=\"description\" class=\"description\"><ul><li>Operating System Apple OS.16</li><li>1TB Storage + 64GB RAM</li><li>M1 15700 CPU</li></ul></div>', ''),
(14, 'Mac mini M2 2023', 350, '<div itemprop=\"description\" class=\"description\"><div id=\"tw-target-text-container\" class=\"tw-ta-container F0azHf tw-nfl\" tabindex=\"0\"><ul><li id=\"tw-target-text\" class=\"tw-data-text tw-text-large tw-ta\" dir=\"ltr\" data-placeholder=\"Bản dịch\"><span class=\"Y2IQFc\" lang=\"en\">MacOS Ventura</span></li><li dir=\"ltr\" data-placeholder=\"Bản dịch\">SSD 256GB</li><li dir=\"ltr\" data-placeholder=\"Bản dịch\">16 Cores Neural Engine</li></ul></div></div>', ''),
(15, 'Multi-Touch Surface', 90, '<div itemprop=\"description\" class=\"description\"><ul><li>Fully Unlocked</li><li>USB-C to Lightning Cable</li><li>Multi-Touch</li></ul></div>', ''),
(16, '24‑Mac with Apple M1 chip', 200, '<div itemprop=\"description\" class=\"description\"><ul><li>Operating System Apple OS.16</li><li>1TB Storage + 64GB RAM</li><li>M1 15700 CPU</li></ul></div>', ''),
(17, 'Apple iPad Pro 256GB', 250, '<div itemprop=\"description\" class=\"description\"><ul><li>Operating System Apple OS.16</li><li>1TB Storage + 64GB RAM</li><li>M1 15700 CPU</li></ul></div>', ''),
(18, 'Desk Clock Bluetooth Speaker', 100, '<div itemprop=\"description\" class=\"description\"><ul><li>5.0 inch HD Screen</li><li>Android 4.4 KitKat OS</li><li>1.4 GHz Quad Core™ Processor</li></ul></div>', ''),
(19, 'OS5 Game console 2.0', 180, '<div itemprop=\"description\" class=\"description\"><ul><li>Enhanced analog sticks</li><li>integrated light bar</li><li>comfort with intuitive</li></ul></div>', ''),
(20, 'Watch Series 6 GPS', 30, '<div itemprop=\"description\" class=\"description\"><ul><li>Aluminum Case</li><li>GPS and a barometric altimeter</li><li>Heart Rate Monitor</li></ul></div>', ''),
(21, 'Apple Ultrasharp Os.20', 150, '<div itemprop=\"description\" class=\"description\"><ul><li>3.53 Inches (H) x 3.94 Inches (W)</li><li>Wi-Fi, Bluetooth</li><li>Alexa Built-in</li></ul></div>', ''),
(22, 'Case for Iphone 11 Hulk', 25, '<div itemprop=\"description\" class=\"description\"><ul><li>6.1-inch (15.5 cm diagonal)</li><li>Rate Monitor</li><li>Operating system</li></ul></div>', ''),
(23, 'Mac Gen 8 Wi-Fi 1TB', 150, '<div itemprop=\"description\" class=\"description\"><ul><li>128GB SSD</li><li>8 GB Memory</li><li>2560×1600 Display</li></ul></div>', ''),
(24, 'Marshall Major (III) 3', 110, '<div itemprop=\"description\" class=\"description\"><ul><li>True Wireless</li><li>Portable electronics</li><li>Style – In-Ear</li></ul></div>', ''),
(25, 'Apple iPad Pro 256GB', 200, '<div itemprop=\"description\" class=\"description\"><ul><li>Operating System Apple OS.16</li><li>1TB Storage + 64GB RAM</li><li>M1 15700 CPU</li></ul></div>', ''),
(26, 'Case for Iphone 11 Hulk', 25, '<div itemprop=\"description\" class=\"description\"><ul><li>6.1-inch (15.5 cm diagonal)</li><li>Rate Monitor</li><li>Operating system</li></ul></div>', ''),
(27, 'Intel Gen Processors\r\n', 200, '<div itemprop=\"description\" class=\"description\"><ul><li>MSI GeForce RTX 3000</li><li>Intel Core i7</li><li>Up to 4.7 GHz Max Boost</li></ul></div>', ''),
(28, 'Iphone 14 Pro Max 1TB', 300, '<div itemprop=\"description\" class=\"description\"><ul><li>Fully Unlocked</li><li>6.9-inch (15.5 cm diagonal)</li><li>120Hz Fluid Display</li></ul></div>', ''),
(29, 'Iphone XR 64G', 280, '<div itemprop=\"description\" class=\"description\"><ul><li>Fully Unlocked</li><li>6.9-inch (15.5 cm diagonal)</li><li>120Hz Fluid Display</li></ul></div>', ''),
(30, '24‑Mac with Apple M1 chip', 200, '<div itemprop=\"description\" class=\"description\"><ul><li>Operating System Apple OS.16</li><li>1TB Storage + 64GB RAM</li><li>M1 15700 CPU</li></ul></div>', ''),
(31, 'A9 Gold with Apple M1', 200, '<div itemprop=\"description\" class=\"description\"><ul><li>11.9 x 11.9 x 1.6 inches</li><li>Portable electronics</li><li>Wi-Fi, Bluetooth</li></ul></div>', ''),
(32, '\r\nApple Ultrasharp Os.20', 150, '<div itemprop=\"description\" class=\"description\"><ul><li>3.53 Inches (H) x 3.94 Inches (W)</li><li>Wi-Fi, Bluetooth</li><li>Alexa Built-in</li></ul></div>', ''),
(33, 'A9 Gold Series 8 GPS', 250, '<div itemprop=\"description\" class=\"description\"><ul><li>With Bluetooth and Full Touch</li><li>Heart Rate Monitor</li><li>Calorie Counting</li></ul></div>', ''),
(34, 'Desk Clock Bluetooth Speaker', 100, '<div itemprop=\"description\" class=\"description\"><ul><li>5.0 inch HD Screen</li><li>Android 4.4 KitKat OS</li><li>1.4 GHz Quad Core™ Processor</li></ul></div>', ''),
(35, 'Watch Series 6 GPS', 30, '<div itemprop=\"description\" class=\"description\"><ul><li>Aluminum Case</li><li>GPS and a barometric altimeter</li><li>Heart Rate Monitor</li></ul></div>', ''),
(38, 'Iphone', 222, 'Rose', 'hinh3.png'),
(39, 'Iphone', 22, 'mota', '3');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `promotion_id` int NOT NULL AUTO_INCREMENT,
  `promo_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_percentage` int NOT NULL,
  `limit` int NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`promotion_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotion_product`
--

DROP TABLE IF EXISTS `promotion_product`;
CREATE TABLE IF NOT EXISTS `promotion_product` (
  `promotion_id` int NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`promotion_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

DROP TABLE IF EXISTS `shopping_cart`;
CREATE TABLE IF NOT EXISTS `shopping_cart` (
  `cart_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`) VALUES
(5, 'chientt', '$2y$10$MgeVqHPXdjD9p0zHjU0Q1.6TdwBnzWVPT5Iiu8awPZ0dao2Xacjxm', 1),
(3, 'admin', '$2y$10$2clcMy3Mn3mK.mP4mu0JZe21gs/x5Y/6ehz1UElTosRBu7wjbThha', 1),
(4, 'admin2', '$2y$10$tdJBrDDTq1/FWOpLZFvAz.hOgs7UDn/z0TfnxsdtpAd6ay.xUpzwO', 1),
(6, 'helo', '$2y$10$IYMCwJ/EIkcp86y5C/GcqO0kJ99pZ6n6GwOB2DBwouBbEjEZFYuZK', 1),
(7, '123', '$2y$10$0bMDRDMqPO9yn/HaWn9jo.A7A9yiQefdF56AtGc.sInCU8OT0lUfy', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
