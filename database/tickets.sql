-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 14, 2023 at 05:33 AM
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
-- Database: `laravel_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` int NOT NULL,
  `user_id` int NOT NULL,
  `paymentno` bigint NOT NULL,
  `txn_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `event_price` int NOT NULL,
  `payment_amount` bigint NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `event_id`, `user_id`, `paymentno`, `txn_id`, `quantity`, `event_price`, `payment_amount`, `payment_method`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 501079, 'Stripe ID', 8, 100, 800, 'Card', 'Success', '2023-06-13 00:19:00', '2023-06-13 00:19:00'),
(2, 1, 2, 723865, 'Stripe ID', 4, 200, 800, 'Card', 'Success', '2023-06-13 00:19:56', '2023-06-13 00:19:56'),
(3, 4, 2, 763422, 'Stripe ID', 2, 150, 300, 'Card', 'Success', '2023-06-13 00:20:27', '2023-06-13 00:20:27'),
(4, 3, 2, 738502, 'Stripe ID', 5, 500, 2500, 'Card', 'Success', '2023-06-13 00:21:00', '2023-06-13 00:21:00'),
(5, 2, 3, 427683, 'Stripe ID', 6, 250, 1500, 'Card', 'Success', '2023-06-13 00:21:49', '2023-06-13 00:21:49'),
(6, 4, 3, 935609, 'Stripe ID', 3, 150, 450, 'Card', 'Success', '2023-06-13 00:22:17', '2023-06-13 00:22:17'),
(7, 5, 3, 154570, 'Stripe ID', 6, 100, 600, 'Card', 'Success', '2023-06-13 00:22:49', '2023-06-13 00:22:49'),
(8, 1, 1, 353164, 'Stripe ID', 2, 200, 400, 'Card', 'Success', '2023-06-13 06:15:59', '2023-06-13 06:15:59'),
(9, 3, 1, 821051, 'txn_3NIVyJCKX69Ptaqz1DeBhdMX', 2, 500, 1000, 'card', 'succeeded', '2023-06-13 06:35:17', '2023-06-13 06:35:17'),
(10, 4, 3, 434104, 'txn_3NIW12CKX69Ptaqz1umdfPGs', 4, 150, 600, 'card', 'succeeded', '2023-06-13 06:38:06', '2023-06-13 06:38:06'),
(11, 2, 2, 926424, 'txn_3NIW3QCKX69Ptaqz0akqWUzp', 4, 250, 1000, 'card', 'succeeded', '2023-06-13 06:40:34', '2023-06-13 06:40:34'),
(12, 5, 1, 933000, 'txn_3NIlmzCKX69Ptaqz0QIdrpeM', 4, 100, 400, 'card', 'succeeded', '2023-06-13 23:28:40', '2023-06-13 23:28:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
