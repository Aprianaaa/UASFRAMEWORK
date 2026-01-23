-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2026 at 02:27 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uasfix`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `is_box` tinyint(1) NOT NULL DEFAULT '0',
  `box_qty` int NOT NULL DEFAULT '0',
  `price` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `session_id`, `product_id`, `quantity`, `is_box`, `box_qty`, `price`, `created_at`, `updated_at`) VALUES
(16, '8KUEDFTendwIOtiPsm82sQHVqXulXaTWqLCbwQFW', 1, 1, 1, 5, 3500, '2026-01-12 21:49:37', '2026-01-12 21:49:37'),
(20, '8KUEDFTendwIOtiPsm82sQHVqXulXaTWqLCbwQFW', 13, 1, 1, 1, 17000, '2026-01-12 22:18:59', '2026-01-12 22:18:59'),
(21, '8KUEDFTendwIOtiPsm82sQHVqXulXaTWqLCbwQFW', 7, 1, 0, 0, 85000, '2026-01-12 22:19:18', '2026-01-12 22:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint NOT NULL,
  `cart_id` bigint DEFAULT NULL,
  `product_id` bigint DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `is_box` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `box_qty` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mie', '2026-01-12 15:30:18', '2026-01-12 15:30:18'),
(2, 'Beras', '2026-01-12 15:30:18', '2026-01-12 15:30:18'),
(3, 'Minyak', '2026-01-12 15:30:18', '2026-01-12 15:30:18'),
(4, 'Telur', '2026-01-12 15:30:18', '2026-01-12 15:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_12_134823_add_username_role_to_users_table', 1),
(5, '2026_01_14_043205_add_is_confirmed_to_orders_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint NOT NULL,
  `user_id` bigint DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` text,
  `phone` varchar(20) DEFAULT NULL,
  `payment_method` enum('cod','transfer','qris') DEFAULT NULL,
  `proof` varchar(255) DEFAULT NULL,
  `total` bigint DEFAULT '0',
  `status` enum('pending','paid','process','done','cancel') DEFAULT 'pending',
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `address`, `phone`, `payment_method`, `proof`, `total`, `status`, `is_confirmed`, `created_at`, `updated_at`) VALUES
(1, 1, 'aaa appp', 'Jln. Pratu Made Rambug, Br. Sasih, Gang. Cempaka 1 NO 24', '09999999973', 'cod', NULL, 180000, 'cancel', 0, '2026-01-13 03:11:00', '2026-01-13 03:29:11'),
(2, 1, 'aaa appp', 'batubulan', '09999999973', 'cod', NULL, 65000, 'cancel', 0, '2026-01-13 03:12:40', '2026-01-13 03:23:47'),
(4, 1, 'aaa appp', 'Jln. Pratu Made Rambug, Br. Sasih, Gang. Cempaka 1 NO 24', '09999999973', 'cod', NULL, 81000, 'cancel', 0, '2026-01-13 03:27:40', '2026-01-13 03:29:18'),
(5, 1, 'aaa appp', 'Jln. Pratu Made Rambug, Br. Sasih, Gang. Cempaka 1 NO 24', '09999999973', 'cod', NULL, 510000, 'process', 0, '2026-01-13 03:29:45', '2026-01-13 03:29:45'),
(6, 1, 'IMADE APRIANA', 'Jln. Pratu Made Rambug, Br. Sasih, Gang. Cempaka 1 NO 24', '09999999973', 'cod', NULL, 3500, 'cancel', 0, '2026-01-13 03:30:38', '2026-01-13 03:33:40'),
(7, 1, 'admin', 'batubulan', '09999999973', 'cod', NULL, 65000, 'cancel', 0, '2026-01-13 03:32:10', '2026-01-13 03:33:38'),
(8, 1, 'aaa appp', 'Jln. Pratu Made Rambug, Br. Sasih, Gang. Cempaka 1 NO 24', '09999999973', 'cod', NULL, 3500, 'cancel', 0, '2026-01-13 03:32:51', '2026-01-13 03:33:36'),
(9, 1, 'aaa appp', 'Jln. Pratu Made Rambug, Br. Sasih, Gang. Cempaka 1 NO 24', '09999999973', 'cod', NULL, 3500, 'cancel', 0, '2026-01-13 03:33:23', '2026-01-13 03:33:34'),
(10, 1, NULL, NULL, NULL, 'transfer', NULL, 150000, 'done', 0, '2026-01-12 12:02:28', NULL),
(11, 1, NULL, NULL, NULL, 'transfer', NULL, 230000, 'done', 0, '2026-01-11 12:02:28', NULL),
(12, 1, NULL, NULL, NULL, 'qris', NULL, 90000, 'done', 0, '2026-01-10 12:02:28', NULL),
(13, 1, NULL, NULL, NULL, 'cod', NULL, 180000, 'done', 0, '2026-01-09 12:02:28', NULL),
(14, 1, NULL, NULL, NULL, 'cod', NULL, 120000, 'done', 0, '2026-01-08 12:02:28', NULL),
(15, 1, 'IMADE APRIANA', 'Jln. Pratu Made Rambug, Br. Sasih, Gang. Cempaka 1 NO 24', '09999999973', 'cod', NULL, 3500, 'cancel', 0, '2026-01-13 04:30:45', '2026-01-13 04:51:58'),
(16, 2, 'aaa appp', 'Jln. Pratu Made Rambug, Br. Sasih, Gang. Cempaka 1 NO 24', '09999999973', 'cod', NULL, 1078000, 'done', 0, '2026-01-13 04:40:42', '2026-01-13 20:34:36'),
(17, 1, 'IMADE APRIANA', 'Jln. Pratu Made Rambug, Br. Sasih, Gang. Cempaka 1 NO 24', '09999999973', 'cod', NULL, 750000, 'done', 0, '2026-01-13 04:41:31', '2026-01-13 04:41:31'),
(18, 1, 'IMADE APRIANA', 'Jln. Pratu Made Rambug, Br. Sasih, Gang. Cempaka 1 NO 24', '09999999973', 'cod', NULL, 450000, 'done', 0, '2026-01-13 04:48:51', '2026-01-13 04:48:51'),
(19, 1, 'admin', 'batubulan', '09999999973', 'transfer', 'proofs/NHTCE79HgFKfXS8pE31hCTjL4Lysjox5nWdRKDFt.jpg', 65000, 'process', 0, '2026-01-13 04:51:41', '2026-01-13 20:32:48'),
(20, 1, 'Argayana', 'Ubud', '09999999973', 'transfer', 'proofs/o3XqzReTPthxXu7OsIgMCWDwSsljQJlERv6jDZQh.jpg', 1720000, 'done', 0, '2026-01-13 20:35:49', '2026-01-13 20:37:13'),
(21, 1, 'Argaya', 'gianyar', '09999999973', 'qris', 'proofs/UlciWiHmHwEGyhgTi39ujj1PvTsbuXXMZbVYZ8V0.jpg', 1650000, 'done', 0, '2026-01-13 20:39:24', '2026-01-13 20:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint NOT NULL,
  `order_id` bigint DEFAULT NULL,
  `product_id` bigint DEFAULT NULL,
  `quantity` int DEFAULT '1',
  `is_box` tinyint(1) DEFAULT '0',
  `box_qty` int DEFAULT '0',
  `price` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `is_box`, `box_qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 2, 90000, '2026-01-13 03:11:00', '2026-01-13 03:11:00'),
(2, 2, 2, 1, 0, 0, 65000, '2026-01-13 03:12:40', '2026-01-13 03:12:40'),
(6, 4, 2, 1, 0, 0, 65000, '2026-01-13 03:27:40', '2026-01-13 03:27:40'),
(7, 4, 3, 1, 0, 0, 16000, '2026-01-13 03:27:40', '2026-01-13 03:27:40'),
(8, 5, 1, 1, 1, 4, 90000, '2026-01-13 03:29:45', '2026-01-13 03:29:45'),
(9, 5, 3, 1, 1, 1, 150000, '2026-01-13 03:29:45', '2026-01-13 03:29:45'),
(10, 6, 1, 1, 0, 0, 3500, '2026-01-13 03:30:38', '2026-01-13 03:30:38'),
(11, 7, 2, 1, 0, 0, 65000, '2026-01-13 03:32:10', '2026-01-13 03:32:10'),
(12, 8, 1, 1, 0, 0, 3500, '2026-01-13 03:32:51', '2026-01-13 03:32:51'),
(13, 9, 1, 1, 0, 0, 3500, '2026-01-13 03:33:23', '2026-01-13 03:33:23'),
(14, 15, 1, 1, 0, 0, 3500, '2026-01-13 04:30:45', '2026-01-13 04:30:45'),
(15, 16, 4, 1, 0, 0, 28000, '2026-01-13 04:40:42', '2026-01-13 04:40:42'),
(16, 16, 3, 1, 1, 7, 150000, '2026-01-13 04:40:42', '2026-01-13 04:40:42'),
(17, 17, 3, 1, 1, 5, 150000, '2026-01-13 04:41:31', '2026-01-13 04:41:31'),
(18, 18, 16, 1, 1, 5, 90000, '2026-01-13 04:48:51', '2026-01-13 04:48:51'),
(19, 19, 2, 1, 0, 0, 65000, '2026-01-13 04:51:41', '2026-01-13 04:51:41'),
(20, 20, 6, 1, 0, 0, 70000, '2026-01-13 20:35:49', '2026-01-13 20:35:49'),
(21, 20, 3, 1, 1, 5, 150000, '2026-01-13 20:35:49', '2026-01-13 20:35:49'),
(22, 20, 1, 1, 1, 5, 90000, '2026-01-13 20:35:49', '2026-01-13 20:35:49'),
(23, 20, 1, 1, 1, 5, 90000, '2026-01-13 20:35:49', '2026-01-13 20:35:49'),
(24, 21, 16, 1, 1, 5, 90000, '2026-01-13 20:39:24', '2026-01-13 20:39:24'),
(25, 21, 15, 1, 1, 5, 90000, '2026-01-13 20:39:24', '2026-01-13 20:39:24'),
(26, 21, 3, 1, 1, 5, 150000, '2026-01-13 20:39:24', '2026-01-13 20:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint NOT NULL,
  `category_id` bigint DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `price_box` bigint NOT NULL DEFAULT '0',
  `is_boxable` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `is_best_seller` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `name`, `price`, `price_box`, `is_boxable`, `image`, `is_best_seller`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mie Goreng', 3500, 90000, 1, 'mie-goreng.jpeg', 1, '2026-01-12 14:52:18', '2026-01-12 14:52:18'),
(2, 2, 'Beras', 65000, 120000, 0, 'beras_kepala_super.jpeg', 1, '2026-01-12 14:52:18', '2026-01-12 14:52:18'),
(3, 3, 'Minyak Bimoli', 16000, 150000, 1, 'minyak_bimoli.jpeg', 1, '2026-01-12 14:52:18', '2026-01-12 14:52:18'),
(4, 4, 'Telur', 28000, 0, 0, 'telor_ayam.webp', 1, '2026-01-12 14:52:18', '2026-01-12 14:52:18'),
(6, 2, 'Berass Maknyus 5 Kg', 70000, 120000, 0, 'beras maknyus 5 kg.jpeg', 0, '2026-01-12 15:47:17', '2026-01-13 05:56:17'),
(7, 2, 'Beras Pandan Wangi 5 Kg', 85000, 120000, 0, 'beras pandan wangi 5kg.jpeg', 0, '2026-01-12 15:47:17', '2026-01-12 15:47:17'),
(8, 2, 'Beras Ramos 5 Kg', 72000, 120000, 0, 'beras ramos 5kg.jpg', 0, '2026-01-12 15:47:17', '2026-01-12 15:47:17'),
(9, 2, 'Beras Sania 5 Kg', 78000, 120000, 0, 'beras sania 5 kg.webp', 0, '2026-01-12 15:47:17', '2026-01-12 15:47:17'),
(10, 2, 'Beras Super Boy', 70000, 120000, 0, 'beras super boy.jpeg', 0, '2026-01-12 15:47:17', '2026-01-12 15:47:17'),
(11, 2, 'Beras Kepala Super', 90000, 120000, 0, 'beras_kepala_super.jpeg', 0, '2026-01-12 15:47:17', '2026-01-12 15:47:17'),
(12, 5, 'Gula Merah', 18000, 120000, 1, 'gula_merah.jpg', 0, '2026-01-12 15:47:17', '2026-01-12 15:47:17'),
(13, 5, 'Rosebrand Gula', 17000, 120000, 1, 'rosebrand.jpg', 0, '2026-01-12 15:47:17', '2026-01-12 15:47:17'),
(14, 1, 'Mie Kuah Bawang', 3500, 90000, 1, 'mie_kuah_bawang.jpeg', 0, '2026-01-12 15:47:17', '2026-01-12 15:47:17'),
(15, 1, 'Mie Kuah Kari Ayam', 3500, 90000, 1, 'mie_kuah_kariayam.jpeg', 0, '2026-01-12 15:47:17', '2026-01-12 15:47:17'),
(16, 1, 'Mie Kuah Seblak', 4000, 90000, 1, 'mie_kuah_seblak.jpeg', 0, '2026-01-12 15:47:17', '2026-01-12 15:47:17'),
(17, 1, 'Mie Kuah Soto', 3500, 90000, 1, 'mie_kuah_soto.jpeg', 0, '2026-01-12 15:47:17', '2026-01-12 15:47:17'),
(18, 1, 'Mie Sedap Goreng', 3500, 90000, 1, 'mie_sedap_goreng.jpeg', 0, '2026-01-12 15:47:17', '2026-01-12 15:47:17'),
(19, 1, 'Mie Goreng', 3000, 90000, 1, 'mie-goreng.jpeg', 0, '2026-01-12 15:47:17', '2026-01-12 15:47:17'),
(20, 3, 'Minyak Filma 1 Liter', 16000, 150000, 1, 'minyak_filma_1_lt.jpeg', 0, '2026-01-12 15:47:17', '2026-01-12 15:47:17'),
(21, 3, 'Minyak Fortune 1 Liter', 16500, 150000, 1, 'minyak fortuner 1 lt.jpeg', 0, '2026-01-12 15:47:17', '2026-01-12 15:47:17'),
(22, 3, 'Minyak Sania 2 Liter', 32000, 150000, 1, 'minyak sania 2 lt.jpeg', 0, '2026-01-12 15:47:17', '2026-01-12 15:47:17'),
(23, 3, 'Minyak Tropical 1 Liter', 17000, 150000, 1, 'minyak tropical 1 lt.png', 0, '2026-01-12 15:47:17', '2026-01-12 15:47:17'),
(25, 4, 'Telur Ayam Kampung', 3000, 0, 0, 'telor ayam kampung.jpeg', 0, '2026-01-12 15:47:17', '2026-01-12 15:47:17'),
(26, 4, 'Telur Omega', 2800, 0, 0, 'telor_omega.jpg', 0, '2026-01-12 15:47:17', '2026-01-12 15:47:17'),
(27, 4, 'Telur Puyuh', 1500, 0, 0, 'telor puyuh.jpeg', 0, '2026-01-12 15:47:17', '2026-01-12 15:47:17'),
(28, 4, 'Telur Ayam', 2600, 0, 0, 'telor_ayam.webp', 0, '2026-01-12 15:47:17', '2026-01-12 15:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('GuVSBKOz9pRhq5DCMgG9JXiU8JYNbCDUhOtPTrth', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYkdTQURpOTZjc28zZ08wUWlHVVpLNWdlRjRoRFR4N1JDUjBYcDgzZSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1768368817);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('user','admin','superadmin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'User Biasa', 'user', 'user@gmail.com', NULL, '$2y$12$NW6vDI6xNA8XvUxtmOmsg.60ZvWjExSSgo6xchNCGB3JTyR0D4Hju', NULL, '2026-01-12 06:00:14', '2026-01-12 06:00:14', 'user'),
(2, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$12$QqJCnOQ0W8w7LfFI9kQkT.1QVNT1mFQ4v5HF1WBBX371gD/qfoe2y', NULL, '2026-01-12 06:00:14', '2026-01-12 06:00:14', 'admin'),
(3, 'Super Admin', 'superadmin', 'superadmin@gmail.com', NULL, '$2y$12$eRECjtBOPiMSXsYUax6lJeCyBEWCOkn80vSyYowh8NZfPo.phWpV.', NULL, '2026-01-12 06:00:14', '2026-01-12 06:00:14', 'superadmin'),
(5, 'Argayana', 'Arga', 'arga@gmail.com', NULL, '$2y$12$Y.ZP0ibjDkzotpYHkm2V/essNFJtTwOI5Rz72TcqgOqXYX.9MreYu', NULL, '2026-01-13 05:04:19', '2026-01-13 05:04:19', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
