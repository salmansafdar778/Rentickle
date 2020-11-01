-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 01, 2020 at 06:29 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoom`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_per_month` int(11) NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `tenure` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `price_per_month`, `currency`, `user_id`, `product_id`, `tenure`, `created_at`, `updated_at`) VALUES
(1, '', 799, '$', 1, 1, 'This is test', '2020-11-01 00:30:24', '2020-11-01 00:30:24'),
(2, '', 799, '$', 2, 1, 'This is test', '2020-11-01 00:30:43', '2020-11-01 00:30:43'),
(3, '', 799, '$', 3, 1, 'This is test', '2020-11-01 00:30:49', '2020-11-01 00:30:49'),
(4, '', 850, '$', 3, 2, 'This is test', '2020-11-01 00:31:03', '2020-11-01 00:31:03'),
(6, '', 850, '$', 2, 4, 'This is test', '2020-11-01 00:31:16', '2020-11-01 00:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Bed Room', 'https://3.imimg.com/data3/IK/EV/MY-3306470/1486797_603689049738302_6642958849060908258_n-500x500.jpg', '2020-10-31 05:52:06', '2020-10-31 05:52:06'),
(3, 'Living Room', 'https://3.imimg.com/data3/VE/RW/MY-3306470/11140339_491773827661834_7043748747920351792_n-500x500.jpg', '2020-10-31 05:52:07', '2020-10-31 05:52:07'),
(4, 'DSLR Camera', 'https://3.imimg.com/data3/BL/MG/MY-3306470/11178322_491773847661832_6025968662441639271_n-500x500.jpg', '2020-10-31 05:52:07', '2020-10-31 05:52:07'),
(5, 'Appliances', 'https://3.imimg.com/data3/IK/EV/MY-3306470/1486797_603689049738302_6642958849060908258_n-500x500.jpg', '2020-10-31 05:52:07', '2020-10-31 05:52:07'),
(6, 'Storages', 'https://3.imimg.com/data3/VE/RW/MY-3306470/11140339_491773827661834_7043748747920351792_n-500x500.jpg', '2020-10-31 05:52:07', '2020-10-31 05:52:07'),
(7, 'Packages', 'https://3.imimg.com/data3/BL/MG/MY-3306470/11178322_491773847661832_6025968662441639271_n-500x500.jpg', '2020-10-31 05:52:07', '2020-10-31 05:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `challans`
--

DROP TABLE IF EXISTS `challans`;
CREATE TABLE IF NOT EXISTS `challans` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` int(11) NOT NULL,
  `concession` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challans`
--

INSERT INTO `challans` (`id`, `name`, `fee`, `concession`, `priority`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Monthly Fee', 800, NULL, NULL, 1, '2020-05-30 04:35:31', '2020-05-30 04:35:31'),
(2, 'Adminssion Fee', 500, NULL, NULL, 1, '2020-05-30 04:39:03', '2020-05-30 04:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `consessions`
--

DROP TABLE IF EXISTS `consessions`;
CREATE TABLE IF NOT EXISTS `consessions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `priority` int(11) NOT NULL,
  `concession` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `challan_id` bigint(20) UNSIGNED NOT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consessions`
--

INSERT INTO `consessions` (`id`, `priority`, `concession`, `user_id`, `challan_id`, `isActive`, `created_at`, `updated_at`) VALUES
(2, 1, 20, 1, 1, 0, '2020-05-30 05:31:03', '2020-06-01 22:53:20'),
(3, 1, 20, 1, 2, 1, '2020-06-01 08:05:34', '2020-06-01 08:05:34'),
(11, 2, 25, 1, 2, 1, '2020-06-01 08:40:47', '2020-06-01 08:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `generate_challans`
--

DROP TABLE IF EXISTS `generate_challans`;
CREATE TABLE IF NOT EXISTS `generate_challans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concession` text,
  `isActive` int(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generate_challans`
--

INSERT INTO `generate_challans` (`id`, `concession`, `isActive`, `created_at`, `updated_at`) VALUES
(1, '{\"challans\":[{\"id\":2,\"name\":\"Adminssion Fee\",\"fee\":500,\"cid\":2,\"priority\":2,\"concession\":25,\"challan_id\":2},{\"id\":1,\"name\":\"Monthly Fee\",\"fee\":800,\"cid\":1,\"priority\":null,\"concession\":null,\"challan_id\":null}],\"total\":1175}', 1, '2020-06-02 02:50:55', '2020-06-02 02:50:55'),
(2, '{\"challans\":[{\"id\":2,\"name\":\"Adminssion Fee\",\"fee\":500,\"cid\":2,\"priority\":2,\"concession\":25,\"challan_id\":2},{\"id\":1,\"name\":\"Monthly Fee\",\"fee\":800,\"cid\":1,\"priority\":null,\"concession\":null,\"challan_id\":null}],\"total\":1175}', 1, '2020-06-02 02:52:39', '2020-06-02 02:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_05_30_062213_create_challans_table', 1),
(2, '2020_05_30_062629_create_consessions_table', 1),
(3, '2014_10_12_000000_create_users_table', 2),
(4, '2020_10_31_094650_create_categories_table', 3),
(5, '2020_10_31_095211_create_products_table', 3),
(6, '2020_10_31_095701_create_product_sizes_table', 3),
(7, '2020_10_31_095942_create_product_reviews_table', 3),
(8, '2020_10_31_100235_create_bookings_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_per_month` int(11) NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_36_month` int(11) NOT NULL,
  `refundable_deposit` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price_per_month`, `currency`, `price_36_month`, `refundable_deposit`, `category_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Sofa Baleria', 799, '$', 5039, 1899, 1, 'https://image.shutterstock.com/image-illustration/gray-3d-interior-composition-600w-72041347.jpg', '2020-10-31 05:52:30', '2020-10-31 05:52:30'),
(2, 'Dinning Table', 599, '$', 5039, 1299, 1, 'https://image.shutterstock.com/image-illustration/gray-3d-interior-composition-600w-72041347.jpg', '2020-10-31 05:52:30', '2020-10-31 05:52:30'),
(3, 'Fabric Sofa', 699, '$', 5039, 1899, 1, 'https://image.shutterstock.com/image-illustration/gray-3d-interior-composition-600w-72041347.jpg', '2020-10-31 05:52:30', '2020-10-31 05:52:30'),
(4, 'Bed Sofa', 999, '$', 5049, 1889, 1, 'https://image.shutterstock.com/image-illustration/gray-3d-interior-composition-600w-72041347.jpg', '2020-10-31 05:52:30', '2020-10-31 05:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

DROP TABLE IF EXISTS `product_reviews`;
CREATE TABLE IF NOT EXISTS `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rating` double NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `rating`, `review`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 4, 'this is test', 1, '2020-10-31 05:59:22', '2020-10-31 05:59:22'),
(2, 5, 'this is test', 1, '2020-10-31 05:59:22', '2020-10-31 05:59:22'),
(3, 4.5, 'this is test', 1, '2020-10-31 05:59:22', '2020-10-31 05:59:22'),
(4, 5, 'this is test', 1, '2020-10-31 05:59:22', '2020-10-31 05:59:22'),
(5, 4.2, 'this is test', 1, '2020-10-31 05:59:22', '2020-10-31 05:59:22'),
(6, 4.5, 'this is test', 3, '2020-10-31 05:59:22', '2020-10-31 05:59:22'),
(7, 5, 'this is test', 3, '2020-10-31 05:59:22', '2020-10-31 05:59:22'),
(8, 4.2, 'this is test', 2, '2020-10-31 05:59:23', '2020-10-31 05:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

DROP TABLE IF EXISTS `product_sizes`;
CREATE TABLE IF NOT EXISTS `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `name`, `size`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '6x3', '6x3', 1, '2020-10-31 05:52:53', '2020-10-31 05:52:53'),
(2, '6x4', '6x4', 1, '2020-10-31 05:52:53', '2020-10-31 05:52:53'),
(3, '6x5', '6x5', 1, '2020-10-31 05:52:53', '2020-10-31 05:52:53'),
(4, '6x6', '6x6', 1, '2020-10-31 05:52:53', '2020-10-31 05:52:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@test.com', NULL, '$2y$10$MX6Bx6dAK2XCH6z75RNugewYzymUnHzl9J/jNm2zpXP4/OuEdCcMu', NULL, '2020-05-30 01:46:54', '2020-05-30 01:46:54');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
