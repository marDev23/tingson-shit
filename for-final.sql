-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 18, 2018 at 11:00 PM
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
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` tinyint(11) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `parent_category`
--

CREATE TABLE `parent_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent_category`
--

INSERT INTO `parent_category` (`id`, `name`) VALUES
(1, 'Home Furniture'),
(2, 'Office Furniture'),
(3, 'Decor');

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
(94, 1, 8, '2018-02-19 03:03:17', '2018-02-19 03:03:17'),
(95, 26, 19, '2018-02-19 04:00:07', '2018-02-19 04:00:07');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) DEFAULT '0',
  `isBan` tinyint(1) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Indexes for table `parent_category`
--
ALTER TABLE `parent_category`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `parent_category`
--
ALTER TABLE `parent_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
