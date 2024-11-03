-- phpMyAdmin SQL Dump
-- version 5.2.0

--
-- Host: 127.0.0.1:3306
-- Generation Time: 30 أكتوبر 2024 الساعة 17:28
-- إصدار الخادم: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admin_config`
--

DROP TABLE IF EXISTS `admin_config`;
CREATE TABLE IF NOT EXISTS `admin_config` (
  `id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Admin login configurations';

--
-- إرجاع أو استيراد بيانات الجدول `admin_config`
--

INSERT INTO `admin_config` (`id`, `admin_name`, `admin_password`) VALUES
(1, 'admin', '$2y$10$j3B6oMBxlNIfaFkZDQHxfO/Pr7Ml7CaydhoL3g9LAOtW93XtkwsS2');

-- --------------------------------------------------------

--
-- بنية الجدول `cashier_infor`
--

DROP TABLE IF EXISTS `cashier_infor`;
CREATE TABLE IF NOT EXISTS `cashier_infor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `cashier_id` varchar(100) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='cashier''s information';

--
-- إرجاع أو استيراد بيانات الجدول `cashier_infor`
--

INSERT INTO `cashier_infor` (`id`, `name`, `gender`, `cashier_id`, `timestamp`) VALUES
(6, 'عثمان', 'm', '123', '2024-10-28 14:39:54.431483'),
(7, 'احمد', 'f', '1234', '2024-10-29 14:13:56.254053'),
(8, 'الطيب حسن', 'm', '111', '2024-10-29 18:18:26.069456');

-- --------------------------------------------------------

--
-- بنية الجدول `distributors`
--

DROP TABLE IF EXISTS `distributors`;
CREATE TABLE IF NOT EXISTS `distributors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `distributor_name` varchar(100) NOT NULL,
  `reg_no` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='distributors ';

-- --------------------------------------------------------

--
-- بنية الجدول `expiry_config`
--

DROP TABLE IF EXISTS `expiry_config`;
CREATE TABLE IF NOT EXISTS `expiry_config` (
  `id` int NOT NULL AUTO_INCREMENT,
  `expiry_range` varchar(100) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='time specified for product to rech expiry';

-- --------------------------------------------------------

--
-- بنية الجدول `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `notification_on` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=228 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='product detail notificatioon';

-- --------------------------------------------------------

--
-- بنية الجدول `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `sales_price` bigint NOT NULL,
  `sale_percent` int NOT NULL,
  `purchace_price` bigint NOT NULL,
  `bar_code` varchar(255) NOT NULL,
  `tax` int NOT NULL,
  `quantity` int NOT NULL,
  `expiry_year` year NOT NULL,
  `expiry_month` int NOT NULL,
  `expiry_day` int NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='products added to the system';

--
-- إرجاع أو استيراد بيانات الجدول `products`
--

INSERT INTO `products` (`id`, `product_name`, `sales_price`, `sale_percent`, `purchace_price`, `bar_code`, `tax`, `quantity`, `expiry_year`, `expiry_month`, `expiry_day`, `timestamp`) VALUES
(85, 'المنتح الاول', 16, 15, 15, '1', 0, 11, 2024, 1, 1, '2024-10-30 11:33:48.000000'),
(86, 'المنتح الثاني', 123124, 123, 123123, '2', 0, 121, 2024, 1, 1, '2024-10-30 10:28:45.000000'),
(87, 'asd', 225, 12, 213, 'asd', 0, 0, 2024, 11, 1, '2024-10-30 16:43:14.721358');

-- --------------------------------------------------------

--
-- بنية الجدول `quantity_config`
--

DROP TABLE IF EXISTS `quantity_config`;
CREATE TABLE IF NOT EXISTS `quantity_config` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quantity` int NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='product quantity to alert for restocking';

--
-- إرجاع أو استيراد بيانات الجدول `quantity_config`
--

INSERT INTO `quantity_config` (`id`, `quantity`, `timestamp`) VALUES
(1, 12, '2024-04-05 13:04:09.000000');

-- --------------------------------------------------------

--
-- بنية الجدول `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_infor` varchar(9000) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `total_naira` bigint NOT NULL,
  `trans_id` bigint NOT NULL,
  `total_profit` int NOT NULL,
  `change_element` bigint NOT NULL,
  `change_reminant` int NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `year` year NOT NULL,
  `month` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='all sales made';

--
-- إرجاع أو استيراد بيانات الجدول `sales`
--

INSERT INTO `sales` (`id`, `product_infor`, `total_naira`, `trans_id`, `total_profit`, `change_element`, `change_reminant`, `payment_mode`, `ip_address`, `cashier`, `year`, `month`, `day`) VALUES
(184, 'المنتح الاول (Quantity: 1, Price: 1,500, Total: 1,500), المنتح الثاني (Quantity: 3, Price: 1,000, Total: 3,000)', 4500, 88649569, 800, 0, 0, 'نقدي', '', 'عثمان', 2024, '9', '30'),
(185, 'المنتح الاول (Quantity: 3, Price: 1,500, Total: 4,500), المنتح الثاني (Quantity: 3, Price: 1,000, Total: 3,000)', 7500, 79589648, 1800, 0, 0, 'بنكك', '', 'عثمان', 2024, '9', '30'),
(186, 'المنتح الاول (Quantity: 1, Price: 1,500, Total: 1,500), المنتح الثاني (Quantity: 1, Price: 1,000, Total: 1,000)', 2500, 68794737, 600, 0, 0, 'نقدي', '', 'عثمان', 2024, '10', '20'),
(187, 'المنتح الثاني (Quantity: 1, Price: 1,000, Total: 1,000), المنتح الاول (Quantity: 1, Price: 1,500, Total: 1,500)', 2500, 29888862, 600, 0, 0, 'بنكك', '', 'عثمان', 2024, '10', '20'),
(188, 'المنتح الاول (Quantity: 1, Price: 1,500, Total: 1,500), المنتح الثاني (Quantity: 1, Price: 1,000, Total: 1,000)', 2500, 15700769, 600, 0, 0, 'بنكك', '', 'عثمان', 2024, '10', '30'),
(189, 'المنتح الاول (Quantity: 10, Price: 1,500, Total: 15,000)', 15000, 75630441, 5000, 0, 0, 'بنكك', '', 'عثمان', 2024, '10', '30'),
(190, 'المنتح الاول (Quantity: 1, Price: 1,001, Total: 1,001), المنتح الثاني (Quantity: 1, Price: 10,001, Total: 10,001)', 11002, 46273872, 3000, 0, 0, 'بنكك', '', 'عثمان', 2024, '10', '30'),
(191, 'المنتح الاول (Quantity: 1, Price: 16, Total: 16)', 16, 42380331, 15, 0, 0, 'نقدي', '', 'عثمان', 2024, '10', '30'),
(192, 'المنتح الثاني (Quantity: 1, Price: 123,124, Total: 123,124)', 123124, 40815585, 123, 0, 0, 'نقدي', '', 'عثمان', 2024, '10', '30'),
(193, 'المنتح الاول (Quantity: 1, Price: 16, Total: 16)', 16, 11419645, 15, 0, 0, 'بنكك', '', 'عثمان', 2024, '10', '30'),
(194, 'المنتح الاول (Quantity: 1, Price: 16, Total: 16)', 16, 41881833, 15, 0, 0, 'نقدي', '', 'عثمان', 2024, '10', '30'),
(195, 'المنتح الاول (Quantity: 1, Price: 16, Total: 16)', 16, 95960898, 15, 0, 0, 'نقدي', '', 'عثمان', 2024, '10', '30');

-- --------------------------------------------------------

--
-- بنية الجدول `udo_list`
--

DROP TABLE IF EXISTS `udo_list`;
CREATE TABLE IF NOT EXISTS `udo_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` bigint NOT NULL,
  `quantity` bigint NOT NULL,
  `action` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='UDO list | unsold,destroyed or other |';

--
-- إرجاع أو استيراد بيانات الجدول `udo_list`
--

INSERT INTO `udo_list` (`id`, `product_id`, `quantity`, `action`) VALUES
(1, 40, 2, 'unsold'),
(2, 40, 1, 'unsold'),
(3, 40, 1, 'unsold'),
(4, 71, 2, 'other'),
(5, 70, 8, 'destroyed'),
(6, 70, 8, 'destroyed'),
(7, 74, 1000, 'other');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
