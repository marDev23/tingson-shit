-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 18, 2018 at 06:43 PM
-- Server version: 10.1.30-MariaDB-0ubuntu0.17.10.1
-- PHP Version: 7.1.11-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codecourse_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `pincode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `fullname`, `state`, `city`, `country`, `user_id`, `pincode`, `payment_type`, `created_at`, `updated_at`) VALUES
(20, 'Test T Test', 'dsfsdf', 'dsffgsdaf', 'gffdsg', 9, '3452', NULL, '2018-02-19 00:48:02', '2018-02-19 00:48:02'),
(22, 'Marvin Shit', 'dsfdsf', 'fsdfsd', 'Zamboanga Del Sur', 13, '234', 'COD', '2018-02-19 02:29:36', '2018-02-19 02:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `alt_images`
--

CREATE TABLE `alt_images` (
  `id` int(11) NOT NULL,
  `proId` int(11) NOT NULL,
  `alt_img` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alt_images`
--

INSERT INTO `alt_images` (`id`, `proId`, `alt_img`, `status`) VALUES
(1, 19, '5.jpg', 0),
(2, 19, '4.jpg', 0),
(3, 19, '3.jpg', 0),
(4, 19, '1download.jpg', 0),
(5, 19, '14917953995.jpg', 0),
(6, 26, '14917954523.jpg', 0),
(7, 26, '14917954554.jpg', 0),
(8, 26, '14917954641download.jpg', 0),
(9, 26, '14917955093.jpg', 0),
(10, 26, '14917956711download.jpg', 0),
(11, 26, '14917956772.jpg', 0),
(12, 26, '14917956805.jpg', 0),
(13, 2, '1491907409EZ TC GOLD.png', 0),
(18, 1, '1518977288pexels-photo-276656.jpeg', 0),
(19, 1, '1518977356slide1.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `city_mun` varchar(255) NOT NULL,
  `baranggay` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `province_id`, `city_mun`, `baranggay`, `zip`) VALUES
(1, 1, 'Dipolog', 'Barra', 7100),
(2, 1, 'Dapitan', 'Aliguay', 7101),
(3, 2, 'Zamboanga City', 'Ayala', 7000),
(4, 2, 'Dumalinaw', 'Camalig', 7015),
(5, 3, 'Tungawan', 'Tigbanuang', 7018),
(6, 3, 'R.T Lim', 'Baybay', 7002);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reciept_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `total`, `reciept_img`, `created_at`, `updated_at`) VALUES
(14, 8, 'pending', '60.50', NULL, '2018-02-19 01:52:53', '2018-02-19 01:52:53'),
(15, 8, 'pending', '316.80', NULL, '2018-02-19 01:12:41', '2018-02-19 01:12:41'),
(16, 8, 'pending', '0.00', NULL, '2018-02-19 01:13:26', '2018-02-19 01:13:26'),
(17, 8, 'pending', '19.81', NULL, '2018-02-19 01:26:02', '2018-02-19 01:26:02'),
(18, 8, 'pending', '0.01', NULL, '2018-02-19 01:36:51', '2018-02-19 01:36:51'),
(19, 8, 'pending', '59.40', NULL, '2018-02-19 01:38:29', '2018-02-19 01:38:29'),
(20, 13, 'pending', '0.01', NULL, '2018-02-19 01:32:04', '2018-02-19 01:32:04'),
(21, 13, 'pending', '49.50', NULL, '2018-02-19 02:40:06', '2018-02-19 02:40:06'),
(22, 13, 'pending', '55.00', NULL, '2018-02-19 03:00:53', '2018-02-19 03:00:53'),
(23, 13, 'pending', '19.80', NULL, '2018-02-19 03:02:48', '2018-02-19 03:02:48'),
(24, 13, 'pending', '55.00', 'Screenshot from 2018-02-18 15-00-17.png', '2018-02-19 03:04:07', '2018-02-19 03:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL,
  `total` float NOT NULL,
  `products_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `tax` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `total`, `products_id`, `orders_id`, `tax`, `qty`) VALUES
(17, 50, 6, 14, '10.50', 1),
(18, 288, 4, 15, '28.80', 16),
(19, 0.01, 1, 17, '1.80', 1),
(20, 18, 4, 17, '1.80', 1),
(21, 0.01, 1, 18, '0.00', 1),
(22, 54, 22, 19, '5.40', 1),
(23, 0.01, 1, 20, '0.00', 1),
(24, 45, 5, 21, '4.50', 1),
(25, 50, 6, 22, '5.00', 1),
(26, 18, 4, 23, '1.80', 1),
(27, 50, 6, 24, '5.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `pro_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_info` text COLLATE utf8_unicode_ci NOT NULL,
  `pro_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new_arrival` tinyint(1) DEFAULT NULL,
  `spl_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pro_name`, `pro_code`, `pro_price`, `pro_info`, `pro_img`, `stock`, `new_arrival`, `spl_price`, `cat_id`, `created_at`, `updated_at`) VALUES
(1, 'Ziemann, Littel and Mraz', 'Hahn-Armstrong', '0.01', 'Ipsam aliquam sit reprehenderit rerum sed hic. Unde at earum cum ut aliquid. Est et est neque sunt.', '1518990847.data.jpg', '7', NULL, '', 2, NULL, NULL),
(2, 'Wyman-Cronin', 'Hoppe-Hilll', '96', 'Enim dolores rem vero iure. Rerum aspernatur possimus minus harum velit at veritatis. Fuga pariatur minus distinctio explicabo harum quis. Accusantium aut hic aliquam et.', '1518980306.SB-315.jpg', '7', 1, '88', 4, NULL, NULL),
(3, 'Senger and Sons', 'Corwin Ltd', '11', 'Reprehenderit tempora consequatur et blanditiis ut unde perferendis. Voluptas animi cupiditate laudantium quod. Nemo debitis aut eos. Ut tempore dolorem repudiandae sint.', '1518985521.pexels-photo-271743.jpeg', '7', 1, '59', 3, NULL, NULL),
(4, 'Weissnat, Price and Mante', 'Botsford Ltd', '18', 'Molestias aut cum qui eum ut quae quasi et. Architecto et repudiandae doloribus beatae veritatis ut odio est. Repudiandae veniam beatae laborum doloremque. Amet quo dolores vel.', '1518985534.pexels-photo-276769 (1).jpeg', '7', 1, '12', 2, NULL, NULL),
(5, 'Marvin-Cummings', 'Schmeler LLC', '45', 'Libero quod tempore impedit eaque sunt. Eum cumque saepe voluptatibus alias quia non porro. Sint ut aut ut perferendis excepturi.', '1518985548.slide3.jpeg', '7', 1, '58', 2, NULL, NULL),
(6, 'Conn, Bartoletti and Hagenes', 'O\'Kon-Padberg', '50', 'Qui et quibusdam quia repellat. Vitae maxime ut tenetur nostrum incidunt aperiam. Tempore doloremque optio provident non.', '1518985560.slide2.jpeg', '7', 1, '35', 2, NULL, NULL),
(21, 'gdsf', 'hgf', '546', 'ghdfg', '1518979288.window-3069893__340.jpg', NULL, NULL, '456', 6, '2018-02-18 23:36:31', '2018-02-18 23:36:31'),
(22, 'ghffg', 'fdgdfg', '54', 'gffdg', '1518979302.pexels-photo-271724.jpeg', '1', NULL, '45', 18, NULL, NULL),
(23, 'Holly', 'sdjlk', '345', 'hgjgfhgf', 'window-3069893__340.jpg', NULL, NULL, '', 6, '2018-02-19 01:07:47', '2018-02-19 01:07:47'),
(24, 'test 2', 'fsdfdsa', '34', 'fdgdfgdf', '1518983430.banner123.jpeg', NULL, NULL, '', 6, '2018-02-19 00:49:08', '2018-02-19 00:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `products_properties`
--

CREATE TABLE `products_properties` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_properties`
--

INSERT INTO `products_properties` (`id`, `pro_id`, `size`, `color`, `p_price`, `updated_at`, `created_at`) VALUES
(1, 3, 'L', 'blue', '78976', '2018-02-18 18:28:25', '2018-02-18 18:28:25'),
(2, 21, 'L', 'matt finished', '432', '2018-02-18 23:32:29', '2018-02-18 23:54:02'),
(3, 1, 'XXL', 'blue', '890', '2018-02-19 03:39:39', '2018-02-19 03:39:39'),
(4, 21, 'L', 'blue', '32432', '2018-02-19 04:31:40', '2018-02-19 04:31:40'),
(5, 6, 'L', 'blue', '790', '2018-02-19 01:20:17', '2018-02-19 01:20:17'),
(6, 1, 'L', 'green', '90', '2018-02-19 02:56:36', '2018-02-19 02:56:36'),
(7, 1, 'L', 'black', '45', '2018-02-18 21:57:28', '2018-02-19 02:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`) VALUES
(1, 'Zamboanga Del Norte'),
(2, 'Zamboanga Del Sur'),
(3, 'Zamboanga Sibugay');

-- --------------------------------------------------------

--
-- Table structure for table `pro_cat`
--

CREATE TABLE `pro_cat` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pro_cat`
--

INSERT INTO `pro_cat` (`id`, `name`, `p_id`, `created_at`, `updated_at`, `status`) VALUES
(2, 'automobiles', 1, NULL, NULL, 0),
(3, 'movies', NULL, NULL, NULL, 0),
(4, 'books', NULL, NULL, NULL, 0),
(6, 'Bedroom', NULL, '2018-02-18 23:58:55', '2018-02-18 23:58:55', 0),
(15, 'bad', NULL, '2018-02-19 01:32:33', NULL, 0),
(16, 'reputation', NULL, '2018-02-19 01:33:17', '2018-02-19 01:33:17', 0),
(18, 'hey', 3, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `recommends`
--

CREATE TABLE `recommends` (
  `id` int(10) UNSIGNED NOT NULL,
  `pro_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recommends`
--

INSERT INTO `recommends` (`id`, `pro_id`, `uid`, `created_at`, `updated_at`) VALUES
(1, 5, 2, '2017-03-13 11:40:50', '2017-03-13 11:40:50'),
(2, 2, 2, '2017-03-13 11:41:07', '2017-03-13 11:41:07'),
(3, 3, 2, '2017-03-13 11:41:08', '2017-03-13 11:41:08'),
(4, 7, 2, '2017-03-13 11:41:09', '2017-03-13 11:41:09'),
(5, 5, 1, '2017-03-13 11:41:39', '2017-03-13 11:41:39'),
(6, 4, 1, '2017-03-13 11:41:41', '2017-03-13 11:41:41'),
(7, 2, 1, '2017-03-13 11:41:48', '2017-03-13 11:41:48'),
(8, 8, 1, '2017-03-13 11:41:58', '2017-03-13 11:41:58'),
(9, 33, 1, '2017-03-13 11:42:01', '2017-03-13 11:42:01'),
(10, 5, 3, '2017-03-13 11:42:31', '2017-03-13 11:42:31'),
(11, 4, 3, '2017-03-13 11:42:32', '2017-03-13 11:42:32'),
(12, 6, 3, '2017-03-13 11:42:37', '2017-03-13 11:42:37'),
(13, 3, 3, '2017-03-13 11:42:48', '2017-03-13 11:42:48'),
(14, 2, 3, '2017-03-13 11:42:49', '2017-03-13 11:42:49'),
(15, 33, 3, '2017-03-13 11:44:17', '2017-03-13 11:44:17'),
(16, 33, 3, '2017-03-13 11:44:24', '2017-03-13 11:44:24'),
(17, 33, 3, '2017-03-13 11:45:08', '2017-03-13 11:45:08'),
(18, 13, 3, '2017-03-13 11:46:22', '2017-03-13 11:46:22'),
(19, 13, 3, '2017-03-13 11:46:29', '2017-03-13 11:46:29'),
(20, 33, 3, '2017-03-13 12:06:00', '2017-03-13 12:06:00'),
(21, 5, 4, '2017-04-08 00:19:44', '2017-04-08 00:19:44'),
(22, 1, 2, '2017-04-25 08:59:20', '2017-04-25 08:59:20'),
(23, 1, 2, '2017-04-25 08:59:26', '2017-04-25 08:59:26'),
(24, 1, 2, '2017-04-25 09:06:07', '2017-04-25 09:06:07'),
(25, 1, 2, '2017-04-25 09:06:11', '2017-04-25 09:06:11'),
(26, 6, 2, '2017-04-25 09:20:15', '2017-04-25 09:20:15'),
(27, 1, 2, '2017-04-25 09:20:19', '2017-04-25 09:20:19'),
(28, 1, 2, '2017-04-25 09:20:23', '2017-04-25 09:20:23'),
(29, 1, 2, '2017-04-25 09:20:27', '2017-04-25 09:20:27'),
(30, 8, 2, '2017-05-08 21:33:46', '2017-05-08 21:33:46'),
(31, 6, 2, '2017-05-09 04:28:55', '2017-05-09 04:28:55'),
(32, 6, 2, '2017-05-09 04:28:59', '2017-05-09 04:28:59'),
(33, 22, 8, '2018-02-19 00:46:43', '2018-02-19 00:46:43'),
(34, 22, 8, '2018-02-19 00:48:41', '2018-02-19 00:48:41'),
(35, 22, 8, '2018-02-19 00:48:55', '2018-02-19 00:48:55'),
(36, 6, 8, '2018-02-19 00:53:06', '2018-02-19 00:53:06'),
(37, 1, 8, '2018-02-19 01:01:53', '2018-02-19 01:01:53'),
(38, 1, 8, '2018-02-19 01:15:05', '2018-02-19 01:15:05'),
(39, 6, 8, '2018-02-19 01:27:09', '2018-02-19 01:27:09'),
(40, 4, 8, '2018-02-19 02:18:30', '2018-02-19 02:18:30'),
(41, 5, 8, '2018-02-19 02:18:43', '2018-02-19 02:18:43'),
(42, 4, 8, '2018-02-19 02:18:48', '2018-02-19 02:18:48'),
(43, 1, 8, '2018-02-19 02:20:00', '2018-02-19 02:20:00'),
(44, 4, 8, '2018-02-19 02:20:45', '2018-02-19 02:20:45'),
(45, 4, 8, '2018-02-19 02:20:52', '2018-02-19 02:20:52'),
(46, 4, 8, '2018-02-19 02:20:56', '2018-02-19 02:20:56'),
(47, 1, 8, '2018-02-19 02:23:50', '2018-02-19 02:23:50'),
(48, 1, 8, '2018-02-19 03:39:46', '2018-02-19 03:39:46'),
(49, 1, 8, '2018-02-19 03:40:05', '2018-02-19 03:40:05'),
(50, 1, 8, '2018-02-19 03:48:08', '2018-02-19 03:48:08'),
(51, 6, 8, '2018-02-19 03:48:14', '2018-02-19 03:48:14'),
(52, 6, 8, '2018-02-19 03:52:07', '2018-02-19 03:52:07'),
(53, 1, 8, '2018-02-19 04:19:13', '2018-02-19 04:19:13'),
(54, 6, 8, '2018-02-19 04:19:17', '2018-02-19 04:19:17'),
(55, 22, 8, '2018-02-19 04:19:29', '2018-02-19 04:19:29'),
(56, 6, 8, '2018-02-19 04:21:43', '2018-02-19 04:21:43'),
(57, 1, 8, '2018-02-19 04:28:58', '2018-02-19 04:28:58'),
(58, 1, 8, '2018-02-19 04:29:16', '2018-02-19 04:29:16'),
(59, 1, 8, '2018-02-19 04:29:22', '2018-02-19 04:29:22'),
(60, 1, 8, '2018-02-19 04:29:31', '2018-02-19 04:29:31'),
(61, 1, 8, '2018-02-19 04:29:34', '2018-02-19 04:29:34'),
(62, 1, 8, '2018-02-19 04:29:53', '2018-02-19 04:29:53'),
(63, 1, 8, '2018-02-19 01:35:50', '2018-02-19 01:35:50'),
(64, 1, 8, '2018-02-19 01:37:54', '2018-02-19 01:37:54'),
(65, 1, 8, '2018-02-19 01:40:58', '2018-02-19 01:40:58'),
(66, 1, 8, '2018-02-19 01:41:02', '2018-02-19 01:41:02'),
(67, 1, 8, '2018-02-19 01:41:05', '2018-02-19 01:41:05'),
(68, 24, 8, '2018-02-19 00:50:51', '2018-02-19 00:50:51'),
(69, 24, 8, '2018-02-19 00:51:04', '2018-02-19 00:51:04'),
(70, 24, 8, '2018-02-19 01:06:05', '2018-02-19 01:06:05'),
(71, 24, 8, '2018-02-19 01:06:43', '2018-02-19 01:06:43'),
(72, 24, 8, '2018-02-19 01:07:20', '2018-02-19 01:07:20'),
(73, 24, 8, '2018-02-19 01:07:58', '2018-02-19 01:07:58'),
(74, 24, 8, '2018-02-19 01:08:24', '2018-02-19 01:08:24'),
(75, 24, 8, '2018-02-19 01:09:01', '2018-02-19 01:09:01'),
(76, 24, 8, '2018-02-19 01:09:54', '2018-02-19 01:09:54'),
(77, 24, 8, '2018-02-19 01:09:56', '2018-02-19 01:09:56'),
(78, 23, 8, '2018-02-19 01:10:14', '2018-02-19 01:10:14'),
(79, 4, 8, '2018-02-19 02:07:39', '2018-02-19 02:07:39'),
(80, 4, 8, '2018-02-19 00:48:58', '2018-02-19 00:48:58'),
(81, 4, 8, '2018-02-19 00:49:02', '2018-02-19 00:49:02'),
(82, 4, 8, '2018-02-19 00:49:11', '2018-02-19 00:49:11'),
(83, 5, 8, '2018-02-19 00:58:04', '2018-02-19 00:58:04'),
(84, 5, 8, '2018-02-19 00:58:42', '2018-02-19 00:58:42'),
(85, 5, 8, '2018-02-19 00:58:46', '2018-02-19 00:58:46'),
(86, 5, 8, '2018-02-19 00:58:49', '2018-02-19 00:58:49'),
(87, 5, 8, '2018-02-19 02:24:03', '2018-02-19 02:24:03'),
(88, 5, 8, '2018-02-19 02:24:19', '2018-02-19 02:24:19'),
(89, 1, 8, '2018-02-19 01:20:58', '2018-02-19 01:20:58'),
(90, 1, 8, '2018-02-19 01:22:21', '2018-02-19 01:22:21'),
(91, 1, 8, '2018-02-19 02:55:08', '2018-02-19 02:55:08'),
(92, 1, 8, '2018-02-19 02:57:33', '2018-02-19 02:57:33'),
(93, 1, 8, '2018-02-19 02:57:39', '2018-02-19 02:57:39'),
(94, 1, 8, '2018-02-19 03:03:17', '2018-02-19 03:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `person_name` varchar(255) NOT NULL,
  `person_email` varchar(255) NOT NULL,
  `review_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `created_at`, `updated_at`, `person_name`, `person_email`, `review_content`) VALUES
(1, '2017-05-08 21:33:21', '2017-05-08 21:33:21', 'fvefv', 'efve@ec3fr.fvfv.com', 'efvff ee ef');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) DEFAULT '0',
  `isBan` tinyint(1) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`, `isBan`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'anita', 'anita@yahoo.com', '$2y$10$SKj2V9WsGGGHzYyn3L8dfudhpE9CL7PBjeA35LRWKrbXlK3SzUToG', 0, 0, 'MgxytSUDD0eYdrsUpKDLPUQf2opQ6SUNTVS7HTygC4BAFZO2Ghg3mX1zGRl8', '2016-11-15 08:45:26', '2017-03-13 11:42:05'),
(3, 'Sonam Gupta', 'sonam@yahoo.com', '$2y$10$SKj2V9WsGGGHzYyn3L8dfudhpE9CL7PBjeA35LRWKrbXlK3SzUToG', 0, 0, 'm1vwikSzRke7KoBKjHMPgYq4ZdfLCKfo7h7xwLNu0MMjod78aVdYnwxj0R2y', '2016-11-15 08:45:26', '2017-02-03 17:35:28'),
(4, 'alex', 'ejemplo1@gmail.com', '$2y$10$t3jIIrGV2FZrAkI/c7uJmuMJI5IeY6XlhHnvhLcvu6rqKxTmaLOgy', 0, 0, NULL, '2017-04-07 23:36:37', '2017-04-07 23:36:37'),
(5, 'tsedee', 'tseegii_9512@yahoo.com', '$2y$10$u5oK/KZzCksPaB4NQk6jU.SYcVOP0NGfu4jcDbwQVMPMBPVDHm06W', 0, 0, 'XGJfbFcnEes7OmPfsVOmWvDruhihEdxL2BU17EzwGEcSfmZq9anumYoVXAz5', '2017-04-21 07:43:03', '2017-04-21 09:11:06'),
(6, 'Imran', 'imran@gmail.com', '$2y$10$z3UnOuHHmCt7cag5uU2zxepGYY3jWNN/95VByi0LHM9RuwM/U9CbO', 0, 0, NULL, '2017-04-28 13:19:11', '2017-04-28 13:19:11'),
(7, 'Joshe Razier', 'nanographic.bermudez@gmail.com', '$2y$10$Wfi6wMHA9ujbK6RktBsvx.jan8RW/owfeeV1FmNk2Ay1Wc3xz72ri', 0, 0, NULL, '2017-05-03 17:19:00', '2017-05-03 17:19:00'),
(9, 'Test', 'test@test.com', '$2y$10$0hs1XzXtaW1r/1dGlfE/SezH8arBtYpee8MVaf.9TwZwmoSdlZsqS', 0, 0, 'wrxcu3dewoWYHsD8j5vc1RNEcRL0TbeNlf5A2inGbbDoKXPH6nXMRtpkIni6', '2018-02-19 05:21:44', '2018-02-19 00:51:12'),
(11, 'Marvin Marzon', 'marvinmarzon@gmail.com', '$2y$10$ePlIodFe.O0LB6CpjZo/d.B2wyB27GC9NgCNby44hvqrxEUyxK36.', 1, 0, 'oLowC4KGDPzLAxmYojmucRmu9OzSfjakE6lNwBatj63s4HTtQj8xo79DkJDR', '2018-02-19 00:44:02', '2018-02-19 01:18:12'),
(12, 'Johny Deep', 'johndoe@test.com', '$2y$10$Gl.h2Eh99No1CvbVX.OwIu/JP7zu/fu6buooHlEHlPxW7jyz68kVO', 0, 0, 'CXXyTVfAti2P8XMu5GmjkulEULg6qT5mi3gmDolIOuUxvJGhG34WSSacdfN6', '2018-02-19 01:21:26', '2018-02-19 01:21:28'),
(13, 'Marster John', 'shitload@test.com', '$2y$10$2y06BIEkB5Ds3xubud3GSOXCF7PcOCc16MxuM2rMqAhZeUt8f/LtW', 1, 0, 'dhpHYF7hYIR3Bp0aV252RFBNRhd6aKuULkDoqoeFn09cq8NlAn3TXsja2hRv', '2018-02-19 01:22:49', '2018-02-19 01:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alt_images`
--
ALTER TABLE `alt_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_properties`
--
ALTER TABLE `products_properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_cat`
--
ALTER TABLE `pro_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommends`
--
ALTER TABLE `recommends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `alt_images`
--
ALTER TABLE `alt_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `products_properties`
--
ALTER TABLE `products_properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pro_cat`
--
ALTER TABLE `pro_cat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `recommends`
--
ALTER TABLE `recommends`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
