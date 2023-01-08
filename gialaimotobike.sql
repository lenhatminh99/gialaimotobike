-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 05, 2023 at 08:56 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gialaimotobike`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_05_14_095844_create_tbl_admin_table', 1),
(3, '2022_05_17_140501_create_tbl_category_products', 1),
(4, '2022_05_20_134451_create_tbl_products', 1),
(5, '2022_06_30_120804_tbl_shipping', 1),
(6, '2022_06_30_145831_tbl_payment', 1),
(7, '2022_06_30_150115_tbl_order', 1),
(8, '2022_06_30_150229_tbl_order_details', 1),
(9, '2022_10_05_133110_create_tbl_customer', 1),
(10, '2022_12_04_203339_create_tbl_tragop', 1),
(11, '2022_12_08_162933_create_tbl_contact', 1),
(12, '2023_01_03_160947_tbl_comments', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_mail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_mail`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@gialaimotobike.com', 'e10adc3949ba59abbe56e057f20f883e', 'Minh Le', '0909472846', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_products`
--

DROP TABLE IF EXISTS `tbl_category_products`;
CREATE TABLE IF NOT EXISTS `tbl_category_products` (
  `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category_products`
--

INSERT INTO `tbl_category_products` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Yamaha', 'xe may yamaha', 1, NULL, NULL),
(2, 'Honda', 'Xe may honda', 1, NULL, NULL),
(3, 'Kawasaki', 'xe may kawasaki', 1, NULL, NULL),
(4, 'Suzuki', 'xe may suzuki', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

DROP TABLE IF EXISTS `tbl_comments`;
CREATE TABLE IF NOT EXISTS `tbl_comments` (
  `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`comment_id`, `product_id`, `comment`, `comment_name`, `comment_date`) VALUES
(1, 5, 'xe rat dep', 'minhle', '2023-01-04 18:21:54'),
(2, 7, 'Tôi đã mua xe này rồi, rất ưng ý.', 'minhle', '2023-01-04 18:22:09'),
(3, 10, 'Xe rat dep minh rat thich', 'minhle', '2023-01-04 20:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

DROP TABLE IF EXISTS `tbl_contact`;
CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `message_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `email_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`message_id`, `customer_id`, `email_contact`, `username_contact`, `address_contact`, `content_contact`, `created_at`, `updated_at`) VALUES
(5, 0, 'gialai@gmail.com', 'le nhat minh', '102 hoang van thu', 'khong co', NULL, NULL),
(6, 2, 'hungpham@gmail.com', 'hungpham', '150 duong wuu', 'Xe rat dep', NULL, NULL),
(7, 1, 'leminh@gmail.com', 'minhle', '15 pham hung', 'toi rat thich xe o day', NULL, NULL),
(8, 0, 'ductrung@gmail.com', 'nguyen duc trung', '54 vo van tan', 'toi muon mua xe yamana exciter', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

DROP TABLE IF EXISTS `tbl_customers`;
CREATE TABLE IF NOT EXISTS `tbl_customers` (
  `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `created_at`, `updated_at`) VALUES
(0, 'guest', 'guest@gmail.com', '4e3ecaf30c12e1c4384e8652cf26b6df', 'null', NULL, NULL),
(1, 'minhle', 'leminh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0987112223', NULL, NULL),
(2, 'hungpham', 'hungpham@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0988334234', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `order_total` int(191) NOT NULL,
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `customer_id` (`customer_id`),
  KEY `shipping_id` (`shipping_id`),
  KEY `payment_id` (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(4, 2, 1, 4, 198000000, 'Đã duyệt đơn hàng', NULL, NULL),
(5, 2, 2, 5, 66000000, 'Từ chối đơn hàng', NULL, NULL),
(6, 1, 3, 6, 108900000, 'Từ chối đơn hàng', NULL, NULL),
(7, 1, 4, 7, 158400000, 'Đang chờ xử lý', NULL, NULL),
(8, 1, 5, 8, 27500000, 'Đang chờ xử lý', NULL, NULL),
(9, 1, 6, 9, 55000000, 'Đang chờ xử lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

DROP TABLE IF EXISTS `tbl_order_details`;
CREATE TABLE IF NOT EXISTS `tbl_order_details` (
  `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(191) NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_details_id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(4, 4, 7, 'winner x', 45000000, 4, NULL, NULL),
(5, 5, 4, 'air blade 150', 60000000, 1, NULL, NULL),
(6, 6, 1, 'sh 150', 99000000, 1, NULL, NULL),
(7, 7, 8, 'satria 150', 65000000, 1, NULL, NULL),
(8, 7, 2, 'sh 125i', 79000000, 1, NULL, NULL),
(9, 8, 5, 'wave 110', 25000000, 1, NULL, NULL),
(10, 9, 11, 'impulse 110', 50000000, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

DROP TABLE IF EXISTS `tbl_payment`;
CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(4, '4', 'Chấp nhận thanh toán', NULL, NULL),
(5, '3', 'Từ chối thanh toán', NULL, NULL),
(6, '4', 'Từ chối thanh toán', NULL, NULL),
(7, '4', 'Đang chờ xử lý', NULL, NULL),
(8, '4', 'Đang chờ xử lý', NULL, NULL),
(9, '4', 'Đang chờ xử lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

DROP TABLE IF EXISTS `tbl_products`;
CREATE TABLE IF NOT EXISTS `tbl_products` (
  `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(191) NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `category_id`, `product_name`, `product_desc`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 2, 'sh 150', 'xe may honda sh 150', 99000000, '715.png', 1, NULL, NULL),
(2, 2, 'sh 125i', 'xe may sh 125', 79000000, '606.png', 1, NULL, NULL),
(3, 3, 'Triump 500', 'xe may', 160000000, '126.jpg', 1, NULL, NULL),
(4, 2, 'air blade 150', 'xe may', 60000000, '689.png', 1, NULL, NULL),
(5, 2, 'wave 110', 'xe wave', 25000000, '379.jpg', 1, NULL, NULL),
(6, 2, 'lead 150', 'xe may lead', 60000000, '905.jpg', 1, NULL, NULL),
(7, 2, 'winner x', 'xe may winner x 150', 45000000, '93.jpg', 1, NULL, NULL),
(8, 4, 'satria 150', 'xe may satria', 65000000, '588.png', 1, NULL, NULL),
(9, 4, 'gz 150', 'xe may', 60000000, '881.jpg', 1, NULL, NULL),
(10, 2, 'future 125', 'xe may', 30000000, '736.png', 1, NULL, NULL),
(11, 3, 'impulse 110', 'xe may', 50000000, '731.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

DROP TABLE IF EXISTS `tbl_shipping`;
CREATE TABLE IF NOT EXISTS `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shipping_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`shipping_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_address`, `shipping_phone`, `shipping_email`, `shipping_notes`, `created_at`, `updated_at`) VALUES
(1, 'le nhat minh', '125 phan dinh phung chu se gia lai', '0909472846', 'leminh@gmail.com', 'khong co', NULL, NULL),
(2, 'hung le', '666 ta quang buu', '0909444555', 'hungle@gmail.com', 'khong co', NULL, NULL),
(3, 'le nhat minh', '125/159 nguyen thi tan', '0909444888', 'minhle@gmail.com', 'khong co', NULL, NULL),
(4, 'le nhat minh', '641 cao lo p4 q8', '0909666432', 'minhdeptrai@gmail.com', 'ko', NULL, NULL),
(5, 'tung bt', '774 cao lo', '091285422', 'tungbt@gmail.com', 'kdefndcdfdffs', NULL, NULL),
(6, 'le van luong', '76 hung nguyen', '0122236336', 't55es66t@gmail.com', 'ko', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tragop`
--

DROP TABLE IF EXISTS `tbl_tragop`;
CREATE TABLE IF NOT EXISTS `tbl_tragop` (
  `tragop_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `shipping_id` int(10) NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `order_total` int(191) NOT NULL,
  `monthly_pay` int(10) NOT NULL,
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_first_period` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_last_period` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tragop_id`),
  KEY `payment_id` (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_tragop`
--

INSERT INTO `tbl_tragop` (`tragop_id`, `order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `monthly_pay`, `order_status`, `contract_first_period`, `contract_last_period`, `created_at`, `updated_at`) VALUES
(3, 4, 2, 1, 4, 198000000, 3, 'Đang chờ xử lý', '05-01-2023', '05-04-2023', NULL, NULL),
(4, 6, 1, 3, 6, 108900000, 3, 'Đang chờ xử lý', '05-01-2023', '05-04-2023', NULL, NULL),
(5, 7, 1, 4, 7, 158400000, 3, 'Đang chờ xử lý', '05-01-2023', '05-04-2023', NULL, NULL),
(6, 8, 1, 5, 8, 27500000, 12, 'Đang chờ xử lý', '05-01-2023', '05-01-2024', NULL, NULL),
(7, 9, 1, 6, 9, 55000000, 27, 'Đang chờ xử lý', '05-01-2023', '05-04-2025', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD CONSTRAINT `tbl_comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`product_id`);

--
-- Constraints for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD CONSTRAINT `tbl_contact_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customers` (`customer_id`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customers` (`customer_id`),
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`shipping_id`) REFERENCES `tbl_shipping` (`shipping_id`),
  ADD CONSTRAINT `tbl_order_ibfk_3` FOREIGN KEY (`payment_id`) REFERENCES `tbl_payment` (`payment_id`);

--
-- Constraints for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `tbl_order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`),
  ADD CONSTRAINT `tbl_order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`product_id`);

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category_products` (`category_id`);

--
-- Constraints for table `tbl_tragop`
--
ALTER TABLE `tbl_tragop`
  ADD CONSTRAINT `tbl_tragop_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `tbl_payment` (`payment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
