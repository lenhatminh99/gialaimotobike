-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 11, 2022 at 06:01 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(35, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(36, '2022_05_14_095844_create_tbl_admin_table', 4),
(37, '2022_05_17_140501_create_tbl_category_products', 4),
(38, '2022_05_20_134451_create_tbl_products', 4),
(39, '2022_06_30_120804_tbl_shipping', 4),
(40, '2022_06_30_145831_tbl_payment', 4),
(41, '2022_06_30_150115_tbl_order', 4),
(42, '2022_06_30_150229_tbl_order_details', 4),
(43, '2022_07_09_154358_tbl_comments', 4),
(12, '2022_11_14_222759_add_google_id_column', 3),
(44, '2022_07_12_165830_tbl_sendmessage', 4),
(45, '2022_10_05_133110_create_tbl_customer', 4),
(46, '2022_12_04_203339_create_tbl_tragop', 5),
(47, '2022_12_08_162933_create_tbl_contact', 6);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category_products`
--

INSERT INTO `tbl_category_products` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Honda', 'xe may', 1, NULL, NULL),
(2, 'Yamaha', 'xe may', 1, NULL, NULL),
(3, 'Kawasaki', 'xe may', 1, NULL, NULL),
(4, 'Suzuki', 'xe may', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

DROP TABLE IF EXISTS `tbl_comments`;
CREATE TABLE IF NOT EXISTS `tbl_comments` (
  `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL,
  `comment_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `comment_date` datetime NOT NULL,
  `comment_product_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`comment_id`, `comment`, `comment_name`, `comment_date`, `comment_product_id`) VALUES
(1, 'test cmt', 'minh le', '2022-12-02 03:10:16', 6),
(2, 'kok eoeawekadas', 'hung cho dien', '2022-12-02 09:42:25', 6),
(3, 'dep trai qua', 'minh le 2', '2022-12-02 11:08:34', 6),
(4, 'dep trai qua troi', 'minh le 3', '2022-12-02 11:10:00', 6),
(5, 'dep trai qua troi', 'minh le 4', '2022-12-02 11:11:12', 6),
(6, 'xe xau qua, lua dao', 'lua dao', '2022-12-02 11:14:39', 5),
(7, 'xe xau qua, lua dao', 'lua dao2', '2022-12-02 11:15:34', 5),
(8, 'xe xau qua, lua dao', 'lua dao3', '2022-12-02 11:16:19', 5),
(9, 'xe xau qua, lua dao', 'lua dao3', '2022-12-02 11:17:24', 5),
(10, 'xe ciu', 'lua dao 4', '2022-12-02 11:17:34', 5),
(11, 'lua tao ha may', 'lua dao', '2022-12-02 11:18:18', 7),
(12, 'aa', 'aa', '2022-12-02 11:20:40', 6),
(13, 'lo', 'lo', '2022-12-02 11:22:35', 6),
(14, 'lo', 'lo2', '2022-12-02 11:24:20', 6),
(15, 'xe dep qua, ko co tien mua', 'ho van quang', '2022-12-02 11:26:48', 1),
(16, 'aaa', 'a', '2022-12-02 11:28:05', 1),
(17, 'đâ', 'đá', '2022-12-02 11:28:51', 1),
(18, '1313213', '31233', '2022-12-02 11:33:14', 1),
(19, '4234242', '422', '2022-12-02 11:33:27', 1),
(20, '231', '321', '2022-12-02 11:34:49', 1),
(21, '123', 'ok', '2022-12-02 11:35:36', 1),
(22, 'dsadadad', 'ao', '2022-12-02 11:38:19', 1),
(23, '21', '312', '2022-12-02 11:38:58', 1),
(24, 'aaaa', 'ok', '2022-12-02 11:39:40', 8),
(25, 'asdsa', 'a', '2022-12-02 11:40:28', 8),
(26, '2313', '13', '2022-12-02 11:44:08', 8),
(27, '1331', '3123', '2022-12-02 11:46:26', 8),
(28, 'kkkk', 'p', '2022-12-02 13:15:20', 8),
(29, 'xe dep qua', 'minh le', '2022-12-03 17:37:27', 2),
(30, 'xe xấu mà mắc vậy khen đẹp?', 'hùng phạm', '2022-12-03 17:56:53', 2),
(31, 'ủa mỗi người một quan điểm ý kiến cái gì? thích thì ra ngoài nói chuyện nè', 'minh le', '2022-12-03 17:57:19', 2),
(32, 'oke xe dep', 'phuc pham', '2022-12-04 09:12:40', 2),
(33, 'toi mua 2 chiec', 'phuc pham', '2022-12-04 09:13:03', 2),
(34, 'okokok', 'ok ok', '2022-12-04 09:13:48', 2),
(35, 'aaaaaaaaaaaaaaaaaa', 'aaaaaaa', '2022-12-04 09:14:57', 2),
(36, 'aaaaaaaaaaaaaaaaaa2', 'aaaaaaaaaaaaaaaaaa2', '2022-12-04 09:15:59', 2),
(37, 'dsad', 'adad', '2022-12-04 11:02:13', 2),
(38, 'vdsffsf', 'aaa', '2022-12-04 11:02:30', 3),
(39, 'xe dep qua moi nguoi vo mua di', 'minh dep trai', '2022-12-05 20:46:43', 7),
(40, 'ok', 'ok', '2022-12-08 16:40:03', 7),
(41, 'dad', 'dsa', '2022-12-08 17:26:04', 3),
(42, 'ko biet comment cai gi day', 'nminh le', '2022-12-08 17:27:38', 4),
(43, 'kdsajkkaak', 'okeokawoeao', '2022-12-08 20:28:23', 7),
(44, 'lan nay chac chan dc', 'minhle', '2022-12-08 20:40:28', 6),
(45, 'thu lai lan ko sd query', 'minhle', '2022-12-08 20:41:45', 6),
(46, 'xe nay co chay duoc khong', 'minhle3', '2022-12-08 20:45:00', 5),
(47, 'aaaaaaaaaaa', 'minhle3', '2022-12-08 21:21:34', 5),
(48, 'sfsdfdsfdsf', 'fsdfdsf', '2022-12-11 17:24:10', 7),
(49, 'ok', 'minhle3', '2022-12-11 17:26:27', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

DROP TABLE IF EXISTS `tbl_contact`;
CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `message_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`message_id`, `email_contact`, `username_contact`, `address_contact`, `content_contact`, `created_at`, `updated_at`) VALUES
(1, 'oke@gmail.com', 'le nhat minh', 'ko biet', 'test', NULL, NULL),
(2, 'ok2@gmail.com', 'ko biet', 'ko biet', 'ko biet', NULL, NULL),
(3, 'nhincaigi@gmail.com', 'kobiet', 'aloalo', 'kdsakdasd', NULL, NULL),
(4, 'alo@gmail.com', 'test', '123', 'kdsa', NULL, NULL),
(5, 'kobietskfksa@gmail.co', 'msdnfnj', 'kfjdskfskfskfdskfs', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', NULL, NULL),
(6, 'aaaaaaaaaaaaaaaaaaaa@gmail.com', 'kosakfsddsfsdkfdsfsdjfks', 'fjdsfsdskfdskjfsjdfjsdfjksfjdsfkjsdfhkj', 'jkfhdskfdhsfhsjkfhsjkfhdsfhdsjfdhsfksdfhjsfhsdjks', NULL, NULL),
(7, 'test2@gmail.com', 'test 2', 'test 2', 'oke oek', NULL, NULL),
(8, 'minhle2@gmail.com', 'minhle2', 'test ok ko', 'chac chan lan nay dc', NULL, NULL),
(9, 'minhle@gmail.com', 'minhle', '5646', '6646464', NULL, NULL),
(10, 'minhle3@gmail.com', 'minhle3', 'aaaaaaaaaaaaaa', 'aaaaaaaaaaaaa', NULL, NULL),
(11, 'minhle@gmail.com', 'minhle', 'ok nha', 'ok', NULL, NULL),
(12, 'minhle3@gmail.com', 'minhle3', 'ko biet', 'ko biet', NULL, NULL),
(13, 'minhle3@gmail.com', 'minhle3', 'ko biet o dau', 'ko biet noi gi', NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `created_at`, `updated_at`) VALUES
(1, 'minhle', 'minhle@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0909472846', NULL, NULL),
(2, 'minhle2', 'minhle2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '99483294294', NULL, NULL),
(3, 'minhle3', 'minhle3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '943240242', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=195 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(3, 1, 2, 4, '7150000', 'Đã duyệt đơn hàng', NULL, NULL),
(4, 1, 3, 5, '6600000', 'Từ chối đơn hàng', NULL, NULL),
(5, 1, 4, 6, '11000000', 'Đang chờ xử lý', NULL, NULL),
(6, 1, 4, 7, '11000000', 'Đã duyệt đơn hàng', NULL, NULL),
(7, 1, 4, 8, '11000000', 'Đang chờ xử lý', NULL, NULL),
(8, 1, 4, 9, '11000000', 'Đang chờ xử lý', NULL, NULL),
(9, 1, 4, 10, '11000000', 'Đang chờ xử lý', NULL, NULL),
(10, 1, 4, 11, '11000000', 'Đang chờ xử lý', NULL, NULL),
(11, 1, 4, 12, '11000000', 'Đang chờ xử lý', NULL, NULL),
(12, 1, 4, 13, '11000000', 'Đang chờ xử lý', NULL, NULL),
(13, 1, 4, 14, '11000000', 'Đang chờ xử lý', NULL, NULL),
(14, 1, 5, 15, '7700000', 'Đang chờ xử lý', NULL, NULL),
(15, 1, 5, 16, '7700000', 'Đang chờ xử lý', NULL, NULL),
(16, 1, 5, 17, '7700000', 'Đang chờ xử lý', NULL, NULL),
(17, 1, 5, 18, '7700000', 'Đang chờ xử lý', NULL, NULL),
(18, 1, 5, 19, '7700000', 'Đang chờ xử lý', NULL, NULL),
(19, 1, 5, 20, '7700000', 'Đang chờ xử lý', NULL, NULL),
(20, 1, 5, 21, '7700000', 'Đang chờ xử lý', NULL, NULL),
(21, 1, 5, 22, '7700000', 'Đang chờ xử lý', NULL, NULL),
(22, 1, 5, 23, '7700000', 'Đang chờ xử lý', NULL, NULL),
(23, 1, 5, 24, '7700000', 'Đang chờ xử lý', NULL, NULL),
(24, 1, 5, 25, '7700000', 'Đang chờ xử lý', NULL, NULL),
(25, 1, 5, 26, '7700000', 'Đang chờ xử lý', NULL, NULL),
(26, 1, 5, 27, '7700000', 'Đang chờ xử lý', NULL, NULL),
(27, 1, 5, 28, '7700000', 'Đang chờ xử lý', NULL, NULL),
(28, 1, 5, 29, '7700000', 'Đang chờ xử lý', NULL, NULL),
(29, 1, 5, 30, '7700000', 'Đang chờ xử lý', NULL, NULL),
(30, 1, 5, 31, '7700000', 'Đang chờ xử lý', NULL, NULL),
(31, 1, 5, 32, '7700000', 'Đang chờ xử lý', NULL, NULL),
(32, 1, 5, 33, '7700000', 'Đang chờ xử lý', NULL, NULL),
(33, 1, 5, 34, '7700000', 'Đang chờ xử lý', NULL, NULL),
(34, 1, 5, 35, '7700000', 'Đang chờ xử lý', NULL, NULL),
(35, 1, 5, 36, '7700000', 'Đang chờ xử lý', NULL, NULL),
(36, 1, 5, 37, '7700000', 'Đang chờ xử lý', NULL, NULL),
(37, 1, 5, 38, '7700000', 'Đang chờ xử lý', NULL, NULL),
(38, 1, 5, 39, '7700000', 'Đang chờ xử lý', NULL, NULL),
(39, 1, 5, 40, '7700000', 'Đang chờ xử lý', NULL, NULL),
(40, 1, 5, 41, '7700000', 'Đang chờ xử lý', NULL, NULL),
(41, 1, 5, 42, '7700000', 'Đang chờ xử lý', NULL, NULL),
(42, 1, 5, 43, '7700000', 'Đang chờ xử lý', NULL, NULL),
(43, 1, 5, 44, '7700000', 'Đang chờ xử lý', NULL, NULL),
(44, 1, 5, 45, '7700000', 'Đang chờ xử lý', NULL, NULL),
(45, 1, 5, 46, '7700000', 'Đang chờ xử lý', NULL, NULL),
(46, 1, 5, 47, '7700000', 'Đang chờ xử lý', NULL, NULL),
(47, 1, 5, 48, '7700000', 'Đang chờ xử lý', NULL, NULL),
(48, 1, 5, 49, '7700000', 'Đang chờ xử lý', NULL, NULL),
(49, 1, 5, 50, '7700000', 'Đang chờ xử lý', NULL, NULL),
(50, 1, 5, 51, '7700000', 'Đang chờ xử lý', NULL, NULL),
(51, 1, 5, 52, '7700000', 'Đang chờ xử lý', NULL, NULL),
(52, 1, 5, 53, '7700000', 'Đang chờ xử lý', NULL, NULL),
(53, 1, 5, 54, '7700000', 'Đang chờ xử lý', NULL, NULL),
(54, 1, 5, 55, '7700000', 'Đang chờ xử lý', NULL, NULL),
(55, 1, 5, 56, '7700000', 'Đang chờ xử lý', NULL, NULL),
(56, 1, 5, 57, '7700000', 'Đang chờ xử lý', NULL, NULL),
(57, 1, 5, 58, '7700000', 'Đang chờ xử lý', NULL, NULL),
(58, 1, 5, 59, '7700000', 'Đang chờ xử lý', NULL, NULL),
(59, 1, 5, 60, '7700000', 'Đang chờ xử lý', NULL, NULL),
(60, 1, 5, 61, '7700000', 'Đang chờ xử lý', NULL, NULL),
(61, 1, 5, 62, '7700000', 'Đang chờ xử lý', NULL, NULL),
(62, 1, 5, 63, '7700000', 'Đang chờ xử lý', NULL, NULL),
(63, 1, 5, 64, '7700000', 'Đang chờ xử lý', NULL, NULL),
(64, 1, 5, 65, '7700000', 'Đang chờ xử lý', NULL, NULL),
(65, 1, 5, 66, '7700000', 'Đang chờ xử lý', NULL, NULL),
(66, 1, 5, 67, '7700000', 'Đang chờ xử lý', NULL, NULL),
(67, 1, 5, 68, '7700000', 'Đang chờ xử lý', NULL, NULL),
(68, 1, 5, 69, '7700000', 'Đang chờ xử lý', NULL, NULL),
(69, 1, 5, 70, '7700000', 'Đang chờ xử lý', NULL, NULL),
(70, 1, 5, 71, '7700000', 'Đang chờ xử lý', NULL, NULL),
(71, 1, 5, 72, '7700000', 'Đang chờ xử lý', NULL, NULL),
(72, 1, 5, 73, '7700000', 'Đang chờ xử lý', NULL, NULL),
(73, 1, 5, 74, '7700000', 'Đang chờ xử lý', NULL, NULL),
(74, 1, 5, 75, '7700000', 'Đang chờ xử lý', NULL, NULL),
(75, 1, 5, 76, '7700000', 'Đang chờ xử lý', NULL, NULL),
(76, 1, 5, 77, '7700000', 'Đang chờ xử lý', NULL, NULL),
(77, 1, 5, 78, '7700000', 'Đang chờ xử lý', NULL, NULL),
(78, 1, 5, 79, '7700000', 'Đang chờ xử lý', NULL, NULL),
(79, 1, 5, 80, '7700000', 'Đang chờ xử lý', NULL, NULL),
(80, 1, 5, 81, '7700000', 'Đang chờ xử lý', NULL, NULL),
(81, 1, 5, 82, '7700000', 'Đang chờ xử lý', NULL, NULL),
(82, 1, 6, 83, '4400000', 'Đang chờ xử lý', NULL, NULL),
(83, 1, 6, 84, '4400000', 'Đang chờ xử lý', NULL, NULL),
(84, 1, 6, 85, '4400000', 'Đang chờ xử lý', NULL, NULL),
(85, 1, 6, 86, '4400000', 'Đang chờ xử lý', NULL, NULL),
(86, 1, 6, 87, '4400000', 'Đang chờ xử lý', NULL, NULL),
(87, 1, 6, 88, '4400000', 'Đang chờ xử lý', NULL, NULL),
(88, 1, 6, 89, '4400000', 'Đang chờ xử lý', NULL, NULL),
(89, 1, 6, 90, '4400000', 'Đang chờ xử lý', NULL, NULL),
(90, 1, 6, 91, '4400000', 'Đang chờ xử lý', NULL, NULL),
(91, 1, 6, 92, '4400000', 'Đang chờ xử lý', NULL, NULL),
(92, 1, 6, 93, '4400000', 'Đang chờ xử lý', NULL, NULL),
(93, 1, 6, 94, '4400000', 'Đang chờ xử lý', NULL, NULL),
(94, 1, 6, 95, '4400000', 'Đang chờ xử lý', NULL, NULL),
(95, 1, 6, 96, '4400000', 'Đang chờ xử lý', NULL, NULL),
(96, 1, 6, 97, '4400000', 'Đang chờ xử lý', NULL, NULL),
(97, 1, 6, 98, '4400000', 'Đang chờ xử lý', NULL, NULL),
(98, 1, 6, 99, '4400000', 'Đang chờ xử lý', NULL, NULL),
(99, 1, 6, 100, '4400000', 'Đang chờ xử lý', NULL, NULL),
(100, 1, 6, 101, '4400000', 'Đang chờ xử lý', NULL, NULL),
(101, 1, 6, 102, '4400000', 'Đang chờ xử lý', NULL, NULL),
(102, 1, 6, 103, '4400000', 'Đang chờ xử lý', NULL, NULL),
(103, 1, 6, 104, '4400000', 'Đang chờ xử lý', NULL, NULL),
(104, 1, 6, 105, '4400000', 'Đang chờ xử lý', NULL, NULL),
(105, 1, 6, 106, '4400000', 'Đang chờ xử lý', NULL, NULL),
(106, 1, 6, 107, '4400000', 'Đang chờ xử lý', NULL, NULL),
(107, 1, 6, 108, '4400000', 'Đang chờ xử lý', NULL, NULL),
(108, 1, 6, 109, '4400000', 'Đang chờ xử lý', NULL, NULL),
(109, 1, 6, 110, '4400000', 'Đang chờ xử lý', NULL, NULL),
(110, 1, 6, 111, '4400000', 'Đang chờ xử lý', NULL, NULL),
(111, 1, 6, 112, '4400000', 'Đang chờ xử lý', NULL, NULL),
(112, 1, 6, 113, '4400000', 'Đang chờ xử lý', NULL, NULL),
(113, 1, 6, 114, '4400000', 'Đang chờ xử lý', NULL, NULL),
(114, 1, 7, 115, '550000', 'Đang chờ xử lý', NULL, NULL),
(115, 1, 8, 116, '13750000', 'Đang chờ xử lý', NULL, NULL),
(116, 1, 9, 117, '15400000', 'Đã duyệt đơn hàng', NULL, NULL),
(117, 1, 9, 118, '15400000', 'Đang chờ xử lý', NULL, NULL),
(118, 1, 9, 119, '15400000', 'Đang chờ xử lý', NULL, NULL),
(119, 1, 9, 120, '15400000', 'Đang chờ xử lý', NULL, NULL),
(120, 1, 9, 121, '15400000', 'Đang chờ xử lý', NULL, NULL),
(121, 1, 9, 122, '15400000', 'Đang chờ xử lý', NULL, NULL),
(122, 1, 9, 123, '15400000', 'Đang chờ xử lý', NULL, NULL),
(123, 1, 10, 124, '8800000', 'Đang chờ xử lý', NULL, NULL),
(124, 1, 10, 125, '8800000', 'Đang chờ xử lý', NULL, NULL),
(125, 1, 10, 126, '8800000', 'Đang chờ xử lý', NULL, NULL),
(126, 1, 10, 127, '8800000', 'Đang chờ xử lý', NULL, NULL),
(127, 1, 10, 128, '8800000', 'Đang chờ xử lý', NULL, NULL),
(128, 1, 10, 129, '8800000', 'Đang chờ xử lý', NULL, NULL),
(129, 1, 10, 130, '8800000', 'Đang chờ xử lý', NULL, NULL),
(130, 1, 10, 131, '8800000', 'Đang chờ xử lý', NULL, NULL),
(131, 1, 10, 132, '8800000', 'Đang chờ xử lý', NULL, NULL),
(132, 1, 10, 133, '8800000', 'Đang chờ xử lý', NULL, NULL),
(133, 1, 10, 134, '8800000', 'Đang chờ xử lý', NULL, NULL),
(134, 1, 10, 135, '8800000', 'Đang chờ xử lý', NULL, NULL),
(135, 1, 10, 136, '8800000', 'Đang chờ xử lý', NULL, NULL),
(136, 1, 10, 137, '8800000', 'Đang chờ xử lý', NULL, NULL),
(137, 1, 11, 138, '19800000', 'Đang chờ xử lý', NULL, NULL),
(138, 1, 11, 139, '19800000', 'Đang chờ xử lý', NULL, NULL),
(139, 1, 11, 140, '19800000', 'Đang chờ xử lý', NULL, NULL),
(140, 1, 11, 141, '19800000', 'Đang chờ xử lý', NULL, NULL),
(141, 1, 11, 142, '19800000', 'Đang chờ xử lý', NULL, NULL),
(142, 1, 11, 143, '19800000', 'Đang chờ xử lý', NULL, NULL),
(143, 1, 11, 144, '19800000', 'Đang chờ xử lý', NULL, NULL),
(144, 1, 11, 145, '19800000', 'Đang chờ xử lý', NULL, NULL),
(145, 1, 12, 146, '2750000', 'Đang chờ xử lý', NULL, NULL),
(146, 1, 12, 147, '2750000', 'Đang chờ xử lý', NULL, NULL),
(147, 1, 12, 148, '2750000', 'Đang chờ xử lý', NULL, NULL),
(148, 1, 12, 149, '2750000', 'Đang chờ xử lý', NULL, NULL),
(149, 1, 12, 150, '2750000', 'Đang chờ xử lý', NULL, NULL),
(150, 1, 13, 151, '11000000', 'Đang chờ xử lý', NULL, NULL),
(151, 1, 13, 152, '11000000', 'Đang chờ xử lý', NULL, NULL),
(152, 1, 14, 153, '550000', 'Đang chờ xử lý', NULL, NULL),
(153, 1, 14, 154, '3300000', 'Đang chờ xử lý', NULL, NULL),
(154, 1, 14, 155, '3300000', 'Đã duyệt đơn hàng', NULL, NULL),
(155, 1, 15, 156, '11000000', 'Đang chờ xử lý', NULL, NULL),
(156, 1, 16, 157, '7700000', 'Đang chờ xử lý', NULL, NULL),
(157, 1, 16, 158, '7700000', 'Đang chờ xử lý', NULL, NULL),
(158, 1, 16, 159, '7700000', 'Đang chờ xử lý', NULL, NULL),
(159, 1, 16, 160, '7700000', 'Đang chờ xử lý', NULL, NULL),
(160, 1, 16, 161, '7700000', 'Đang chờ xử lý', NULL, NULL),
(161, 1, 16, 162, '7700000', 'Đang chờ xử lý', NULL, NULL),
(162, 1, 16, 163, '7700000', 'Đang chờ xử lý', NULL, NULL),
(163, 1, 16, 164, '7700000', 'Đang chờ xử lý', NULL, NULL),
(164, 1, 16, 165, '7700000', 'Đang chờ xử lý', NULL, NULL),
(165, 1, 16, 166, '7700000', 'Đang chờ xử lý', NULL, NULL),
(166, 1, 16, 167, '7700000', 'Đang chờ xử lý', NULL, NULL),
(167, 1, 16, 168, '7700000', 'Đang chờ xử lý', NULL, NULL),
(168, 1, 16, 169, '7700000', 'Đang chờ xử lý', NULL, NULL),
(169, 1, 16, 170, '7700000', 'Đang chờ xử lý', NULL, NULL),
(170, 1, 16, 171, '7700000', 'Đang chờ xử lý', NULL, NULL),
(171, 1, 16, 172, '7700000', 'Đang chờ xử lý', NULL, NULL),
(172, 1, 16, 173, '7700000', 'Đang chờ xử lý', NULL, NULL),
(173, 1, 16, 174, '7700000', 'Đang chờ xử lý', NULL, NULL),
(174, 1, 16, 175, '7700000', 'Đang chờ xử lý', NULL, NULL),
(175, 1, 16, 176, '7700000', 'Đang chờ xử lý', NULL, NULL),
(176, 1, 17, 177, '6600000', 'Đang chờ xử lý', NULL, NULL),
(177, 1, 17, 178, '6600000', 'Đang chờ xử lý', NULL, NULL),
(178, 3, 18, 179, '8800000', 'Đang chờ xử lý', NULL, NULL),
(179, 3, 18, 180, '8800000', 'Đang chờ xử lý', NULL, NULL),
(180, 3, 19, 181, '6600000', 'Đang chờ xử lý', NULL, NULL),
(181, 3, 19, 182, '6600000', 'Đang chờ xử lý', NULL, NULL),
(182, 3, 20, 183, '7700000', 'Đang chờ xử lý', NULL, NULL),
(183, 3, 21, 184, '550000', 'Đang chờ xử lý', NULL, NULL),
(184, 3, 22, 185, '11000000', 'Đang chờ xử lý', NULL, NULL),
(185, 1, 23, 186, '35200000', 'Đang chờ xử lý', NULL, NULL),
(186, 1, 23, 187, '35200000', 'Đang chờ xử lý', NULL, NULL),
(187, 1, 24, 188, '11000000', 'Đang chờ xử lý', NULL, NULL),
(188, 1, 24, 189, '11000000', 'Đang chờ xử lý', NULL, NULL),
(189, 1, 25, 190, '8800000', 'Đang chờ xử lý', NULL, NULL),
(190, 1, 26, 191, '7150000', 'Đã duyệt đơn hàng', NULL, NULL),
(191, 1, 26, 192, '7150000', 'Từ chối đơn hàng', NULL, NULL),
(192, 1, 27, 193, '4400000', 'Từ chối đơn hàng', NULL, NULL),
(193, 1, 27, 194, '4400000', 'Đã duyệt đơn hàng', NULL, NULL),
(194, 1, 28, 195, '10450000', 'Đang chờ xử lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

DROP TABLE IF EXISTS `tbl_order_details`;
CREATE TABLE IF NOT EXISTS `tbl_order_details` (
  `order_details_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_details_id`)
) ENGINE=MyISAM AUTO_INCREMENT=208 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(3, 3, 6, 'kawve', '6000000', 1, NULL, NULL),
(4, 3, 1, 'ab125', '500000', 1, NULL, NULL),
(5, 4, 6, 'kawve', '6000000', 1, NULL, NULL),
(6, 5, 2, 'sh150', '10000000', 1, NULL, NULL),
(7, 6, 2, 'sh150', '10000000', 1, NULL, NULL),
(8, 7, 2, 'sh150', '10000000', 1, NULL, NULL),
(9, 8, 2, 'sh150', '10000000', 1, NULL, NULL),
(10, 9, 2, 'sh150', '10000000', 1, NULL, NULL),
(11, 10, 2, 'sh150', '10000000', 1, NULL, NULL),
(12, 11, 2, 'sh150', '10000000', 1, NULL, NULL),
(13, 12, 2, 'sh150', '10000000', 1, NULL, NULL),
(14, 13, 2, 'sh150', '10000000', 1, NULL, NULL),
(15, 14, 7, 'triump', '7000000', 1, NULL, NULL),
(16, 15, 7, 'triump', '7000000', 1, NULL, NULL),
(17, 16, 7, 'triump', '7000000', 1, NULL, NULL),
(18, 17, 7, 'triump', '7000000', 1, NULL, NULL),
(19, 18, 7, 'triump', '7000000', 1, NULL, NULL),
(20, 19, 7, 'triump', '7000000', 1, NULL, NULL),
(21, 20, 7, 'triump', '7000000', 1, NULL, NULL),
(22, 21, 7, 'triump', '7000000', 1, NULL, NULL),
(23, 22, 7, 'triump', '7000000', 1, NULL, NULL),
(24, 23, 7, 'triump', '7000000', 1, NULL, NULL),
(25, 24, 7, 'triump', '7000000', 1, NULL, NULL),
(26, 25, 7, 'triump', '7000000', 1, NULL, NULL),
(27, 26, 7, 'triump', '7000000', 1, NULL, NULL),
(28, 27, 7, 'triump', '7000000', 1, NULL, NULL),
(29, 28, 7, 'triump', '7000000', 1, NULL, NULL),
(30, 29, 7, 'triump', '7000000', 1, NULL, NULL),
(31, 30, 7, 'triump', '7000000', 1, NULL, NULL),
(32, 31, 7, 'triump', '7000000', 1, NULL, NULL),
(33, 32, 7, 'triump', '7000000', 1, NULL, NULL),
(34, 33, 7, 'triump', '7000000', 1, NULL, NULL),
(35, 34, 7, 'triump', '7000000', 1, NULL, NULL),
(36, 35, 7, 'triump', '7000000', 1, NULL, NULL),
(37, 36, 7, 'triump', '7000000', 1, NULL, NULL),
(38, 37, 7, 'triump', '7000000', 1, NULL, NULL),
(39, 38, 7, 'triump', '7000000', 1, NULL, NULL),
(40, 39, 7, 'triump', '7000000', 1, NULL, NULL),
(41, 40, 7, 'triump', '7000000', 1, NULL, NULL),
(42, 41, 7, 'triump', '7000000', 1, NULL, NULL),
(43, 42, 7, 'triump', '7000000', 1, NULL, NULL),
(44, 43, 7, 'triump', '7000000', 1, NULL, NULL),
(45, 44, 7, 'triump', '7000000', 1, NULL, NULL),
(46, 45, 7, 'triump', '7000000', 1, NULL, NULL),
(47, 46, 7, 'triump', '7000000', 1, NULL, NULL),
(48, 47, 7, 'triump', '7000000', 1, NULL, NULL),
(49, 48, 7, 'triump', '7000000', 1, NULL, NULL),
(50, 49, 7, 'triump', '7000000', 1, NULL, NULL),
(51, 50, 7, 'triump', '7000000', 1, NULL, NULL),
(52, 51, 7, 'triump', '7000000', 1, NULL, NULL),
(53, 52, 7, 'triump', '7000000', 1, NULL, NULL),
(54, 53, 7, 'triump', '7000000', 1, NULL, NULL),
(55, 54, 7, 'triump', '7000000', 1, NULL, NULL),
(56, 55, 7, 'triump', '7000000', 1, NULL, NULL),
(57, 56, 7, 'triump', '7000000', 1, NULL, NULL),
(58, 57, 7, 'triump', '7000000', 1, NULL, NULL),
(59, 58, 7, 'triump', '7000000', 1, NULL, NULL),
(60, 59, 7, 'triump', '7000000', 1, NULL, NULL),
(61, 60, 7, 'triump', '7000000', 1, NULL, NULL),
(62, 61, 7, 'triump', '7000000', 1, NULL, NULL),
(63, 62, 7, 'triump', '7000000', 1, NULL, NULL),
(64, 63, 7, 'triump', '7000000', 1, NULL, NULL),
(65, 64, 7, 'triump', '7000000', 1, NULL, NULL),
(66, 65, 7, 'triump', '7000000', 1, NULL, NULL),
(67, 66, 7, 'triump', '7000000', 1, NULL, NULL),
(68, 67, 7, 'triump', '7000000', 1, NULL, NULL),
(69, 68, 7, 'triump', '7000000', 1, NULL, NULL),
(70, 69, 7, 'triump', '7000000', 1, NULL, NULL),
(71, 70, 7, 'triump', '7000000', 1, NULL, NULL),
(72, 71, 7, 'triump', '7000000', 1, NULL, NULL),
(73, 72, 7, 'triump', '7000000', 1, NULL, NULL),
(74, 73, 7, 'triump', '7000000', 1, NULL, NULL),
(75, 74, 7, 'triump', '7000000', 1, NULL, NULL),
(76, 75, 7, 'triump', '7000000', 1, NULL, NULL),
(77, 76, 7, 'triump', '7000000', 1, NULL, NULL),
(78, 77, 7, 'triump', '7000000', 1, NULL, NULL),
(79, 78, 7, 'triump', '7000000', 1, NULL, NULL),
(80, 79, 7, 'triump', '7000000', 1, NULL, NULL),
(81, 80, 7, 'triump', '7000000', 1, NULL, NULL),
(82, 81, 7, 'triump', '7000000', 1, NULL, NULL),
(83, 82, 4, 'winner x', '4000000', 1, NULL, NULL),
(84, 83, 4, 'winner x', '4000000', 1, NULL, NULL),
(85, 84, 4, 'winner x', '4000000', 1, NULL, NULL),
(86, 85, 4, 'winner x', '4000000', 1, NULL, NULL),
(87, 86, 4, 'winner x', '4000000', 1, NULL, NULL),
(88, 87, 4, 'winner x', '4000000', 1, NULL, NULL),
(89, 88, 4, 'winner x', '4000000', 1, NULL, NULL),
(90, 89, 4, 'winner x', '4000000', 1, NULL, NULL),
(91, 90, 4, 'winner x', '4000000', 1, NULL, NULL),
(92, 91, 4, 'winner x', '4000000', 1, NULL, NULL),
(93, 92, 4, 'winner x', '4000000', 1, NULL, NULL),
(94, 93, 4, 'winner x', '4000000', 1, NULL, NULL),
(95, 94, 4, 'winner x', '4000000', 1, NULL, NULL),
(96, 95, 4, 'winner x', '4000000', 1, NULL, NULL),
(97, 96, 4, 'winner x', '4000000', 1, NULL, NULL),
(98, 97, 4, 'winner x', '4000000', 1, NULL, NULL),
(99, 98, 4, 'winner x', '4000000', 1, NULL, NULL),
(100, 99, 4, 'winner x', '4000000', 1, NULL, NULL),
(101, 100, 4, 'winner x', '4000000', 1, NULL, NULL),
(102, 101, 4, 'winner x', '4000000', 1, NULL, NULL),
(103, 102, 4, 'winner x', '4000000', 1, NULL, NULL),
(104, 103, 4, 'winner x', '4000000', 1, NULL, NULL),
(105, 104, 4, 'winner x', '4000000', 1, NULL, NULL),
(106, 105, 4, 'winner x', '4000000', 1, NULL, NULL),
(107, 106, 4, 'winner x', '4000000', 1, NULL, NULL),
(108, 107, 4, 'winner x', '4000000', 1, NULL, NULL),
(109, 108, 4, 'winner x', '4000000', 1, NULL, NULL),
(110, 109, 4, 'winner x', '4000000', 1, NULL, NULL),
(111, 110, 4, 'winner x', '4000000', 1, NULL, NULL),
(112, 111, 4, 'winner x', '4000000', 1, NULL, NULL),
(113, 112, 4, 'winner x', '4000000', 1, NULL, NULL),
(114, 113, 4, 'winner x', '4000000', 1, NULL, NULL),
(115, 114, 1, 'ab125', '500000', 1, NULL, NULL),
(116, 115, 5, 'wave 110', '2500000', 5, NULL, NULL),
(117, 116, 7, 'triump', '7000000', 2, NULL, NULL),
(118, 117, 7, 'triump', '7000000', 2, NULL, NULL),
(119, 118, 7, 'triump', '7000000', 2, NULL, NULL),
(120, 119, 7, 'triump', '7000000', 2, NULL, NULL),
(121, 120, 7, 'triump', '7000000', 2, NULL, NULL),
(122, 121, 7, 'triump', '7000000', 2, NULL, NULL),
(123, 122, 7, 'triump', '7000000', 2, NULL, NULL),
(124, 123, 8, 'nsr500', '8000000', 1, NULL, NULL),
(125, 124, 8, 'nsr500', '8000000', 1, NULL, NULL),
(126, 125, 8, 'nsr500', '8000000', 1, NULL, NULL),
(127, 126, 8, 'nsr500', '8000000', 1, NULL, NULL),
(128, 127, 8, 'nsr500', '8000000', 1, NULL, NULL),
(129, 128, 8, 'nsr500', '8000000', 1, NULL, NULL),
(130, 129, 8, 'nsr500', '8000000', 1, NULL, NULL),
(131, 130, 8, 'nsr500', '8000000', 1, NULL, NULL),
(132, 131, 8, 'nsr500', '8000000', 1, NULL, NULL),
(133, 132, 8, 'nsr500', '8000000', 1, NULL, NULL),
(134, 133, 8, 'nsr500', '8000000', 1, NULL, NULL),
(135, 134, 8, 'nsr500', '8000000', 1, NULL, NULL),
(136, 135, 8, 'nsr500', '8000000', 1, NULL, NULL),
(137, 136, 8, 'nsr500', '8000000', 1, NULL, NULL),
(138, 137, 3, 'sh mode', '8000000', 1, NULL, NULL),
(139, 137, 2, 'sh150', '10000000', 1, NULL, NULL),
(140, 138, 3, 'sh mode', '8000000', 1, NULL, NULL),
(141, 138, 2, 'sh150', '10000000', 1, NULL, NULL),
(142, 139, 3, 'sh mode', '8000000', 1, NULL, NULL),
(143, 139, 2, 'sh150', '10000000', 1, NULL, NULL),
(144, 140, 3, 'sh mode', '8000000', 1, NULL, NULL),
(145, 140, 2, 'sh150', '10000000', 1, NULL, NULL),
(146, 141, 3, 'sh mode', '8000000', 1, NULL, NULL),
(147, 141, 2, 'sh150', '10000000', 1, NULL, NULL),
(148, 142, 3, 'sh mode', '8000000', 1, NULL, NULL),
(149, 142, 2, 'sh150', '10000000', 1, NULL, NULL),
(150, 143, 3, 'sh mode', '8000000', 1, NULL, NULL),
(151, 143, 2, 'sh150', '10000000', 1, NULL, NULL),
(152, 144, 3, 'sh mode', '8000000', 1, NULL, NULL),
(153, 144, 2, 'sh150', '10000000', 1, NULL, NULL),
(154, 145, 5, 'wave 110', '2500000', 1, NULL, NULL),
(155, 146, 5, 'wave 110', '2500000', 1, NULL, NULL),
(156, 148, 5, 'wave 110', '2500000', 1, NULL, NULL),
(157, 149, 5, 'wave 110', '2500000', 1, NULL, NULL),
(158, 150, 2, 'sh150', '10000000', 1, NULL, NULL),
(159, 151, 2, 'sh150', '10000000', 1, NULL, NULL),
(160, 152, 1, 'ab125', '500000', 1, NULL, NULL),
(161, 153, 1, 'ab125', '500000', 1, NULL, NULL),
(162, 153, 5, 'wave 110', '2500000', 1, NULL, NULL),
(163, 154, 1, 'ab125', '500000', 1, NULL, NULL),
(164, 154, 5, 'wave 110', '2500000', 1, NULL, NULL),
(165, 155, 2, 'sh150', '10000000', 1, NULL, NULL),
(166, 156, 7, 'triump', '7000000', 1, NULL, NULL),
(167, 157, 7, 'triump', '7000000', 1, NULL, NULL),
(168, 158, 7, 'triump', '7000000', 1, NULL, NULL),
(169, 159, 7, 'triump', '7000000', 1, NULL, NULL),
(170, 160, 7, 'triump', '7000000', 1, NULL, NULL),
(171, 161, 7, 'triump', '7000000', 1, NULL, NULL),
(172, 162, 7, 'triump', '7000000', 1, NULL, NULL),
(173, 163, 7, 'triump', '7000000', 1, NULL, NULL),
(174, 164, 7, 'triump', '7000000', 1, NULL, NULL),
(175, 165, 7, 'triump', '7000000', 1, NULL, NULL),
(176, 166, 7, 'triump', '7000000', 1, NULL, NULL),
(177, 167, 7, 'triump', '7000000', 1, NULL, NULL),
(178, 168, 7, 'triump', '7000000', 1, NULL, NULL),
(179, 169, 7, 'triump', '7000000', 1, NULL, NULL),
(180, 170, 7, 'triump', '7000000', 1, NULL, NULL),
(181, 171, 7, 'triump', '7000000', 1, NULL, NULL),
(182, 172, 7, 'triump', '7000000', 1, NULL, NULL),
(183, 173, 7, 'triump', '7000000', 1, NULL, NULL),
(184, 174, 7, 'triump', '7000000', 1, NULL, NULL),
(185, 175, 7, 'triump', '7000000', 1, NULL, NULL),
(186, 176, 6, 'kawve', '6000000', 1, NULL, NULL),
(187, 177, 6, 'kawve', '6000000', 1, NULL, NULL),
(188, 178, 3, 'sh mode', '8000000', 1, NULL, NULL),
(189, 179, 3, 'sh mode', '8000000', 1, NULL, NULL),
(190, 180, 6, 'kawve', '6000000', 1, NULL, NULL),
(191, 181, 6, 'kawve', '6000000', 1, NULL, NULL),
(192, 182, 7, 'triump', '7000000', 1, NULL, NULL),
(193, 183, 1, 'ab125', '500000', 1, NULL, NULL),
(194, 184, 2, 'sh150', '10000000', 1, NULL, NULL),
(195, 185, 3, 'sh mode', '8000000', 4, NULL, NULL),
(196, 186, 3, 'sh mode', '8000000', 4, NULL, NULL),
(197, 187, 2, 'sh150', '10000000', 1, NULL, NULL),
(198, 188, 2, 'sh150', '10000000', 1, NULL, NULL),
(199, 189, 8, 'nsr500', '8000000', 1, NULL, NULL),
(200, 190, 1, 'ab125', '500000', 1, NULL, NULL),
(201, 190, 6, 'kawve', '6000000', 1, NULL, NULL),
(202, 191, 1, 'ab125', '500000', 1, NULL, NULL),
(203, 191, 6, 'kawve', '6000000', 1, NULL, NULL),
(204, 192, 4, 'winner x', '4000000', 1, NULL, NULL),
(205, 193, 4, 'winner x', '4000000', 1, NULL, NULL),
(206, 194, 5, 'wave 110', '2500000', 1, NULL, NULL),
(207, 194, 7, 'triump', '7000000', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

DROP TABLE IF EXISTS `tbl_payment`;
CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `payment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=196 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, '2', 'Đang chờ xử lý', NULL, NULL),
(2, '2', 'Đang chờ xử lý', NULL, NULL),
(3, '2', 'Chấp nhận thanh toán', NULL, NULL),
(4, '2', 'Từ chối thanh toán', NULL, NULL),
(5, '2', 'Đang chờ xử lý', NULL, NULL),
(6, '2', 'Chấp nhận thanh toán', NULL, NULL),
(7, '2', 'Đang chờ xử lý', NULL, NULL),
(8, '2', 'Đang chờ xử lý', NULL, NULL),
(9, '2', 'Đang chờ xử lý', NULL, NULL),
(10, '2', 'Đang chờ xử lý', NULL, NULL),
(11, '2', 'Đang chờ xử lý', NULL, NULL),
(12, '2', 'Đang chờ xử lý', NULL, NULL),
(13, '2', 'Đang chờ xử lý', NULL, NULL),
(14, '2', 'Đang chờ xử lý', NULL, NULL),
(15, '4', 'Đang chờ xử lý', NULL, NULL),
(16, '4', 'Đang chờ xử lý', NULL, NULL),
(17, '4', 'Đang chờ xử lý', NULL, NULL),
(18, '4', 'Đang chờ xử lý', NULL, NULL),
(19, '4', 'Đang chờ xử lý', NULL, NULL),
(20, '4', 'Đang chờ xử lý', NULL, NULL),
(21, '4', 'Đang chờ xử lý', NULL, NULL),
(22, '4', 'Đang chờ xử lý', NULL, NULL),
(23, '4', 'Đang chờ xử lý', NULL, NULL),
(24, '4', 'Đang chờ xử lý', NULL, NULL),
(25, '4', 'Đang chờ xử lý', NULL, NULL),
(26, '4', 'Đang chờ xử lý', NULL, NULL),
(27, '4', 'Đang chờ xử lý', NULL, NULL),
(28, '4', 'Đang chờ xử lý', NULL, NULL),
(29, '4', 'Đang chờ xử lý', NULL, NULL),
(30, '4', 'Đang chờ xử lý', NULL, NULL),
(31, '4', 'Đang chờ xử lý', NULL, NULL),
(32, '4', 'Đang chờ xử lý', NULL, NULL),
(33, '4', 'Đang chờ xử lý', NULL, NULL),
(34, '4', 'Đang chờ xử lý', NULL, NULL),
(35, '4', 'Đang chờ xử lý', NULL, NULL),
(36, '4', 'Đang chờ xử lý', NULL, NULL),
(37, '4', 'Đang chờ xử lý', NULL, NULL),
(38, '4', 'Đang chờ xử lý', NULL, NULL),
(39, '4', 'Đang chờ xử lý', NULL, NULL),
(40, '4', 'Đang chờ xử lý', NULL, NULL),
(41, '4', 'Đang chờ xử lý', NULL, NULL),
(42, '4', 'Đang chờ xử lý', NULL, NULL),
(43, '4', 'Đang chờ xử lý', NULL, NULL),
(44, '4', 'Đang chờ xử lý', NULL, NULL),
(45, '4', 'Đang chờ xử lý', NULL, NULL),
(46, '4', 'Đang chờ xử lý', NULL, NULL),
(47, '4', 'Đang chờ xử lý', NULL, NULL),
(48, '4', 'Đang chờ xử lý', NULL, NULL),
(49, '4', 'Đang chờ xử lý', NULL, NULL),
(50, '4', 'Đang chờ xử lý', NULL, NULL),
(51, '4', 'Đang chờ xử lý', NULL, NULL),
(52, '4', 'Đang chờ xử lý', NULL, NULL),
(53, '4', 'Đang chờ xử lý', NULL, NULL),
(54, '4', 'Đang chờ xử lý', NULL, NULL),
(55, '4', 'Đang chờ xử lý', NULL, NULL),
(56, '4', 'Đang chờ xử lý', NULL, NULL),
(57, '4', 'Đang chờ xử lý', NULL, NULL),
(58, '4', 'Đang chờ xử lý', NULL, NULL),
(59, '4', 'Đang chờ xử lý', NULL, NULL),
(60, '4', 'Đang chờ xử lý', NULL, NULL),
(61, '4', 'Đang chờ xử lý', NULL, NULL),
(62, '4', 'Đang chờ xử lý', NULL, NULL),
(63, '4', 'Đang chờ xử lý', NULL, NULL),
(64, '4', 'Đang chờ xử lý', NULL, NULL),
(65, '4', 'Đang chờ xử lý', NULL, NULL),
(66, '4', 'Đang chờ xử lý', NULL, NULL),
(67, '4', 'Đang chờ xử lý', NULL, NULL),
(68, '4', 'Đang chờ xử lý', NULL, NULL),
(69, '4', 'Đang chờ xử lý', NULL, NULL),
(70, '4', 'Đang chờ xử lý', NULL, NULL),
(71, '4', 'Đang chờ xử lý', NULL, NULL),
(72, '4', 'Đang chờ xử lý', NULL, NULL),
(73, '4', 'Đang chờ xử lý', NULL, NULL),
(74, '4', 'Đang chờ xử lý', NULL, NULL),
(75, '4', 'Đang chờ xử lý', NULL, NULL),
(76, '4', 'Đang chờ xử lý', NULL, NULL),
(77, '4', 'Đang chờ xử lý', NULL, NULL),
(78, '4', 'Đang chờ xử lý', NULL, NULL),
(79, '4', 'Đang chờ xử lý', NULL, NULL),
(80, '4', 'Đang chờ xử lý', NULL, NULL),
(81, '4', 'Đang chờ xử lý', NULL, NULL),
(82, '4', 'Đang chờ xử lý', NULL, NULL),
(83, '4', 'Đang chờ xử lý', NULL, NULL),
(84, '4', 'Đang chờ xử lý', NULL, NULL),
(85, '4', 'Đang chờ xử lý', NULL, NULL),
(86, '4', 'Đang chờ xử lý', NULL, NULL),
(87, '4', 'Đang chờ xử lý', NULL, NULL),
(88, '4', 'Đang chờ xử lý', NULL, NULL),
(89, '4', 'Đang chờ xử lý', NULL, NULL),
(90, '4', 'Đang chờ xử lý', NULL, NULL),
(91, '4', 'Đang chờ xử lý', NULL, NULL),
(92, '4', 'Đang chờ xử lý', NULL, NULL),
(93, '4', 'Đang chờ xử lý', NULL, NULL),
(94, '4', 'Đang chờ xử lý', NULL, NULL),
(95, '4', 'Đang chờ xử lý', NULL, NULL),
(96, '4', 'Đang chờ xử lý', NULL, NULL),
(97, '4', 'Đang chờ xử lý', NULL, NULL),
(98, '4', 'Đang chờ xử lý', NULL, NULL),
(99, '4', 'Đang chờ xử lý', NULL, NULL),
(100, '4', 'Đang chờ xử lý', NULL, NULL),
(101, '4', 'Đang chờ xử lý', NULL, NULL),
(102, '4', 'Đang chờ xử lý', NULL, NULL),
(103, '4', 'Đang chờ xử lý', NULL, NULL),
(104, '4', 'Đang chờ xử lý', NULL, NULL),
(105, '4', 'Đang chờ xử lý', NULL, NULL),
(106, '4', 'Đang chờ xử lý', NULL, NULL),
(107, '4', 'Đang chờ xử lý', NULL, NULL),
(108, '4', 'Đang chờ xử lý', NULL, NULL),
(109, '4', 'Đang chờ xử lý', NULL, NULL),
(110, '4', 'Đang chờ xử lý', NULL, NULL),
(111, '4', 'Đang chờ xử lý', NULL, NULL),
(112, '4', 'Đang chờ xử lý', NULL, NULL),
(113, '4', 'Đang chờ xử lý', NULL, NULL),
(114, '2', 'Đang chờ xử lý', NULL, NULL),
(115, '2', 'Đang chờ xử lý', NULL, NULL),
(116, '2', 'Chấp nhận thanh toán', NULL, NULL),
(117, '4', 'Đang chờ xử lý', NULL, NULL),
(118, '4', 'Đang chờ xử lý', NULL, NULL),
(119, '4', 'Đang chờ xử lý', NULL, NULL),
(120, '4', 'Đang chờ xử lý', NULL, NULL),
(121, '4', 'Đang chờ xử lý', NULL, NULL),
(122, '4', 'Đang chờ xử lý', NULL, NULL),
(123, '3', 'Đang chờ xử lý', NULL, NULL),
(124, '4', 'Đang chờ xử lý', NULL, NULL),
(125, '4', 'Đang chờ xử lý', NULL, NULL),
(126, '4', 'Đang chờ xử lý', NULL, NULL),
(127, '4', 'Đang chờ xử lý', NULL, NULL),
(128, '1', 'Đang chờ xử lý', NULL, NULL),
(129, '1', 'Đang chờ xử lý', NULL, NULL),
(130, '1', 'Đang chờ xử lý', NULL, NULL),
(131, '1', 'Đang chờ xử lý', NULL, NULL),
(132, '4', 'Đang chờ xử lý', NULL, NULL),
(133, '4', 'Đang chờ xử lý', NULL, NULL),
(134, '4', 'Đang chờ xử lý', NULL, NULL),
(135, '4', 'Đang chờ xử lý', NULL, NULL),
(136, '4', 'Đang chờ xử lý', NULL, NULL),
(137, '4', 'Đang chờ xử lý', NULL, NULL),
(138, '4', 'Đang chờ xử lý', NULL, NULL),
(139, '4', 'Đang chờ xử lý', NULL, NULL),
(140, '4', 'Đang chờ xử lý', NULL, NULL),
(141, '4', 'Đang chờ xử lý', NULL, NULL),
(142, '4', 'Đang chờ xử lý', NULL, NULL),
(143, '4', 'Đang chờ xử lý', NULL, NULL),
(144, '4', 'Đang chờ xử lý', NULL, NULL),
(145, '1', 'Đang chờ xử lý', NULL, NULL),
(146, '4', 'Đang chờ xử lý', NULL, NULL),
(147, '4', 'Đang chờ xử lý', NULL, NULL),
(148, '4', 'Đang chờ xử lý', NULL, NULL),
(149, '4', 'Đang chờ xử lý', NULL, NULL),
(150, '4', 'Đang chờ xử lý', NULL, NULL),
(151, '4', 'Đang chờ xử lý', NULL, NULL),
(152, '4', 'Đang chờ xử lý', NULL, NULL),
(153, '4', 'Đang chờ xử lý', NULL, NULL),
(154, '4', 'Chấp nhận thanh toán', NULL, NULL),
(155, '4', 'Đang chờ xử lý', NULL, NULL),
(156, '2', 'Đang chờ xử lý', NULL, NULL),
(157, '4', 'Đang chờ xử lý', NULL, NULL),
(158, '4', 'Đang chờ xử lý', NULL, NULL),
(159, '4', 'Đang chờ xử lý', NULL, NULL),
(160, '4', 'Đang chờ xử lý', NULL, NULL),
(161, '4', 'Đang chờ xử lý', NULL, NULL),
(162, '4', 'Đang chờ xử lý', NULL, NULL),
(163, '4', 'Đang chờ xử lý', NULL, NULL),
(164, '4', 'Đang chờ xử lý', NULL, NULL),
(165, '4', 'Đang chờ xử lý', NULL, NULL),
(166, '4', 'Đang chờ xử lý', NULL, NULL),
(167, '4', 'Đang chờ xử lý', NULL, NULL),
(168, '4', 'Đang chờ xử lý', NULL, NULL),
(169, '4', 'Đang chờ xử lý', NULL, NULL),
(170, '4', 'Đang chờ xử lý', NULL, NULL),
(171, '4', 'Đang chờ xử lý', NULL, NULL),
(172, '4', 'Đang chờ xử lý', NULL, NULL),
(173, '4', 'Đang chờ xử lý', NULL, NULL),
(174, '4', 'Đang chờ xử lý', NULL, NULL),
(175, '4', 'Đang chờ xử lý', NULL, NULL),
(176, '4', 'Đang chờ xử lý', NULL, NULL),
(177, '4', 'Đang chờ xử lý', NULL, NULL),
(178, '4', 'Đang chờ xử lý', NULL, NULL),
(179, '4', 'Đang chờ xử lý', NULL, NULL),
(180, '4', 'Đang chờ xử lý', NULL, NULL),
(181, '4', 'Đang chờ xử lý', NULL, NULL),
(182, '4', 'Đang chờ xử lý', NULL, NULL),
(183, '4', 'Đang chờ xử lý', NULL, NULL),
(184, '4', 'Đang chờ xử lý', NULL, NULL),
(185, '4', 'Đang chờ xử lý', NULL, NULL),
(186, '4', 'Đang chờ xử lý', NULL, NULL),
(187, '4', 'Đang chờ xử lý', NULL, NULL),
(188, '4', 'Đang chờ xử lý', NULL, NULL),
(189, '4', 'Đang chờ xử lý', NULL, NULL),
(190, '4', 'Chấp nhận thanh toán', NULL, NULL),
(191, '4', 'Từ chối thanh toán', NULL, NULL),
(192, '4', 'Từ chối thanh toán', NULL, NULL),
(193, '4', 'Chấp nhận thanh toán', NULL, NULL),
(194, '4', 'Đang chờ xử lý', NULL, NULL),
(195, '4', 'Đang chờ xử lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

DROP TABLE IF EXISTS `tbl_products`;
CREATE TABLE IF NOT EXISTS `tbl_products` (
  `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `category_id`, `product_name`, `product_desc`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ab125', 'xe', '500000', '118.png', 1, NULL, NULL),
(2, 2, 'sh150', 'xe', '10000000', '409.png', 1, NULL, NULL),
(3, 4, 'sh mode', 'ok', '8000000', '439.png', 1, NULL, NULL),
(4, 3, 'winner x', 'ok', '4000000', '948.jpg', 1, NULL, NULL),
(5, 2, 'wave 110', 'ok', '2500000', '354.jpg', 1, NULL, NULL),
(6, 4, 'kawve', 'ok', '6000000', '496.jpg', 1, NULL, NULL),
(7, 3, 'triump', 'pl', '7000000', '233.jpg', 1, NULL, NULL),
(8, 4, 'nsr500', 'ok', '8000000', '645.png', 1, NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_address`, `shipping_phone`, `shipping_email`, `shipping_notes`, `created_at`, `updated_at`) VALUES
(1, 'bo me minh', 'ko biet', '0932183918', 'minhle@gmail.com', 'kfkfjsdkfjksdfks', NULL, NULL),
(2, 'ko biet', 'ko bite', '09483248239', 'kobiet@gmail.com', 'ifdsjkfjsklfjsdklfjsl', NULL, NULL),
(3, 'le nhat minh', 'chu se', '0909472846', 'minhle@gmail.com', '4324243242', NULL, NULL),
(4, 'ko biet', 'o bie', '09 bietsaodko', 'leminh@gmail.com', 'dsadasdasd', NULL, NULL),
(5, 'ko ten', 'ko nha', 'ko so dt', 'ola@gmail.com', 'ko chi chu', NULL, NULL),
(6, 'leminh', 'ko biet', 'ko biet', 'kobiet@gmail.com', '004329423', NULL, NULL),
(7, 'ko biet ai', 'ko biet ko biet', 'ko biet', 'kobietai@gmail.com', 'ko biet', NULL, NULL),
(8, 'ao â', 'ko ca', 'ídjafd9234', 'test@gmail.com', 'dsffsff', NULL, NULL),
(9, 'lua dao', 'lua dao', 'lua dao', 'kobiet@gmail.com', 'ko biet', NULL, NULL),
(10, 'met', 'met', 'met', '2@gmail.com', 'met', NULL, NULL),
(11, 'hahaha', 'ko', 'ok', 'kobit@gmail.com', 'dkslkflsd', NULL, NULL),
(12, 'ok', 'ok', 'oko', 'ok@gmail.com', '123131', NULL, NULL),
(13, 'kobiet', 'kobirg', 'kobio', 'kobiet@gmail.com', 'i90r54kldf', NULL, NULL),
(14, 'ko biet', 'ko biet', '039242', 'gko@gmail.com', 'jfkdlsfs', NULL, NULL),
(15, 'kjsdk', 'kijdsk', 'kdjskj', 'adpasd@gmai.com', 'knkfds', NULL, NULL),
(16, 'kjdskfsk', 'kfdks', 'kkfdsk', 'kids@gmail.com', 'kfds', NULL, NULL),
(17, 'dadad', 'aksdđá', 'kmdskl', 'dá@gmsdada', 'dsadadasda', NULL, NULL),
(18, 'komaia', 'lsdla', 'ldlsdl', 'mina@gmail.com', 'dlsakldad', NULL, NULL),
(19, 'kjdns', 'kdksdj', 'kldksankd', 'dsada@gmail.com', 'kdsak', NULL, NULL),
(20, 'kjdsk', 'dksak', 'dksajdkadk', 'asdsa@gmail.com', 'kddskfdsfs', NULL, NULL),
(21, 'tet', 'sadkd', 'dsa', 'asdad@gmail.com', 'kdsaakdak', NULL, NULL),
(22, 'kjfd', 'kdms', 'kdsk', 'aaaaa@gmail.com', 'kfkdsf', NULL, NULL),
(23, 'fksf', 'kfdsk', 'kfkds', 'adsa@gmail.com', 'kfdskfsf', NULL, NULL),
(24, 'kjds', 'kfds', 'kfdsk', 'ads@gmail.com', 'kfkdsfs', NULL, NULL),
(25, '213', '23', '432', '1231@gmail.com', '423', NULL, NULL),
(26, '1321', '42144324', '2424', '53243@gmail.com', '42', NULL, NULL),
(27, 'dsa', 'dsa', 'gfdv', 'dsad2gm@ggmail.com', 'dsfgs', NULL, NULL),
(28, 'fjnd', 'okkfjd', 'kjkdf', 'fdslf@gmail.com', 'jkgkfdk', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tragop`
--

DROP TABLE IF EXISTS `tbl_tragop`;
CREATE TABLE IF NOT EXISTS `tbl_tragop` (
  `tragop_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_total` int(255) NOT NULL,
  `monthly_pay` int(11) NOT NULL,
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline_pay` date NOT NULL,
  PRIMARY KEY (`tragop_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_tragop`
--

INSERT INTO `tbl_tragop` (`tragop_id`, `order_id`, `customer_id`, `shipping_id`, `order_total`, `monthly_pay`, `order_status`, `deadline_pay`) VALUES
(1, 116, 1, 9, 15400000, 0, 'Đang chờ xử lý', '2022-12-09'),
(2, 119, 1, 9, 15400000, 0, 'Đang chờ xử lý', '2022-12-09'),
(3, 120, 1, 9, 15400000, 0, 'Đang chờ xử lý', '2022-12-09'),
(4, 136, 1, 10, 8800000, 3, 'Đang chờ xử lý', '2022-12-09'),
(5, 149, 1, 12, 2750000, 3, 'Đang chờ xử lý', '2022-12-09'),
(6, 151, 1, 13, 11000000, 21, 'Đang chờ xử lý', '2022-12-09'),
(7, 154, 1, 14, 3300000, 27, 'Đang chờ xử lý', '2022-12-09'),
(8, 175, 1, 16, 7700000, 3, 'Đang chờ xử lý', '2022-12-09'),
(9, 177, 1, 17, 6600000, 30, 'Đang chờ xử lý', '2022-12-09'),
(10, 179, 3, 18, 8800000, 9, 'Đang chờ xử lý', '2022-12-09'),
(11, 181, 3, 19, 6600000, 27, 'Đang chờ xử lý', '2022-12-09'),
(12, 182, 3, 20, 7700000, 12, 'Đang chờ xử lý', '2022-12-09'),
(13, 183, 3, 21, 550000, 3, 'Đang chờ xử lý', '2022-12-09'),
(14, 186, 1, 23, 35200000, 12, 'Đang chờ xử lý', '2022-12-09'),
(15, 188, 1, 24, 11000000, 27, 'Đang chờ xử lý', '2022-12-09'),
(16, 189, 1, 25, 8800000, 18, 'Đang chờ xử lý', '2022-12-09'),
(17, 191, 1, 26, 7150000, 3, 'Đang chờ xử lý', '2022-12-08'),
(18, 193, 1, 27, 4400000, 12, 'Đang chờ xử lý', '2022-12-08'),
(19, 194, 1, 28, 10450000, 3, 'Đang chờ xử lý', '2022-12-09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
