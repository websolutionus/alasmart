-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 03:06 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alasmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desgination` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `header1`, `header2`, `header3`, `about_us`, `banner_image`, `image`, `signature`, `name`, `desgination`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to the Alasmart marketplace', 'We’re Confident', 'You’d', 'Business Success.', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or a randomised woirds which don\'t look even.</p>\r\n<p>going to use a passage of Lorem Ipsum, you need to be sure there isn\'t a nything embarrassing hidden in the middle of text</p>', 'uploads/website-images/about-us-2023-07-18-04-33-30-2608.png', 'uploads/website-images/about-us-2023-07-18-04-44-23-6217.png', 'uploads/website-images/about-us-2023-07-18-04-26-26-1714.png', 'Shivang Preet', 'CEO & Founder', '2022-01-30 12:30:23', '2023-07-27 08:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `additional_services`
--

CREATE TABLE `additional_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `additional_services`
--

INSERT INTO `additional_services` (`id`, `service_id`, `service_name`, `image`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 'Home Move', 'uploads/custom-images/service-add-2022-10-03-03-12-56-9482.jpg', 1, 10, '2022-10-03 09:12:56', '2022-10-03 09:12:56'),
(2, 2, 'Pc Repair', 'uploads/custom-images/service-add-2022-10-03-03-12-56-9074.jpg', 1, 5, '2022-10-03 09:12:56', '2022-10-03 09:12:56'),
(3, 3, 'Service One', 'uploads/custom-images/service-add-2022-10-03-03-17-30-6778.jpg', 1, 10, '2022-10-03 09:17:30', '2022-10-03 09:17:30'),
(4, 3, 'Service Two', 'uploads/custom-images/service-add-2022-10-03-03-17-30-2641.jpg', 1, 8, '2022-10-03 09:17:30', '2022-10-03 09:17:30'),
(5, 3, 'Service Three', 'uploads/custom-images/service-add-2022-10-03-03-17-30-1451.jpg', 1, 15, '2022-10-03 09:17:30', '2022-10-03 09:17:30'),
(6, 3, 'Service Four', 'uploads/custom-images/service-add-2022-10-03-03-17-30-5205.jpg', 1, 4, '2022-10-03 09:17:30', '2022-10-03 09:17:30'),
(7, 5, 'Extra Service One', 'uploads/custom-images/service-add-2022-10-03-03-28-39-1242.jpg', 1, 3, '2022-10-03 09:28:39', '2022-10-03 09:28:39'),
(8, 5, 'Extra Service Two', 'uploads/custom-images/service-add-2022-10-03-03-28-39-5634.jpg', 1, 5, '2022-10-03 09:28:39', '2022-10-03 09:28:39'),
(9, 5, 'Extra Service Three', 'uploads/custom-images/service-add-2022-10-03-03-28-39-3764.jpg', 1, 4, '2022-10-03 09:28:39', '2022-10-03 09:28:39'),
(10, 6, 'Extra service one', 'uploads/custom-images/service-add-2022-10-03-03-34-32-5974.png', 1, 7, '2022-10-03 09:34:33', '2022-10-03 09:34:33'),
(11, 6, 'Extra service two', 'uploads/custom-images/service-add-2022-10-03-03-34-33-8795.png', 1, 5, '2022-10-03 09:34:33', '2022-10-03 09:34:33'),
(12, 6, 'Extra service three', 'uploads/custom-images/service-add-2022-10-03-03-34-33-2395.png', 1, 6, '2022-10-03 09:34:33', '2022-10-03 09:34:33'),
(13, 7, 'Service One', 'uploads/custom-images/service-add-2022-10-03-03-43-20-1580.png', 1, 12, '2022-10-03 09:43:20', '2022-10-03 09:43:20'),
(14, 7, 'Service Two', 'uploads/custom-images/service-add-2022-10-03-03-43-20-3644.png', 1, 20, '2022-10-03 09:43:20', '2022-10-03 09:43:20'),
(15, 7, 'Service Three', 'uploads/custom-images/service-add-2022-10-03-03-43-20-4494.png', 1, 13, '2022-10-03 09:43:20', '2022-10-03 09:43:20'),
(16, 9, 'Service One', 'uploads/custom-images/service-add-2022-10-03-03-54-30-9396.png', 1, 20, '2022-10-03 09:54:31', '2022-10-03 09:54:31'),
(17, 9, 'Service Two', 'uploads/custom-images/service-add-2022-10-03-03-54-31-4918.png', 1, 13, '2022-10-03 09:54:31', '2022-10-03 09:54:31'),
(18, 9, 'Service Three', 'uploads/custom-images/service-add-2022-10-03-03-54-31-7614.png', 1, 8, '2022-10-03 09:54:31', '2022-10-03 09:54:31'),
(19, 10, 'Service One', 'uploads/custom-images/service-add-2022-10-03-04-03-43-1630.png', 1, 5, '2022-10-03 10:03:43', '2022-10-03 10:03:43'),
(20, 10, 'Service Two', 'uploads/custom-images/service-add-2022-10-03-04-03-43-9623.png', 1, 6, '2022-10-03 10:03:44', '2022-10-03 10:03:44'),
(21, 11, 'Service One', 'uploads/custom-images/service-add-2022-10-03-04-08-32-9378.png', 1, 10, '2022-10-03 10:08:32', '2022-10-03 10:08:32'),
(22, 11, 'Service Two', 'uploads/custom-images/service-add-2022-10-03-04-08-32-1195.png', 1, 12, '2022-10-03 10:08:33', '2022-10-03 10:08:33'),
(23, 12, 'Service one', 'uploads/custom-images/service-add-2022-10-03-04-11-58-9305.png', 1, 12, '2022-10-03 10:11:58', '2022-10-03 10:11:58'),
(24, 12, 'Service two', 'uploads/custom-images/service-add-2022-10-03-04-11-58-3485.png', 1, 16, '2022-10-03 10:11:58', '2022-10-03 10:11:58'),
(25, 12, 'Service three', 'uploads/custom-images/service-add-2022-10-03-04-11-58-2352.png', 1, 8, '2022-10-03 10:11:58', '2022-10-03 10:11:58'),
(26, 13, 'Service One', 'uploads/custom-images/service-add-2022-10-03-04-17-45-1400.png', 1, 12, '2022-10-03 10:17:45', '2022-10-03 10:17:45'),
(27, 13, 'Service Two', 'uploads/custom-images/service-add-2022-10-03-04-17-45-1239.png', 1, 9, '2022-10-03 10:17:46', '2022-10-03 10:17:46'),
(28, 13, 'Service Three', 'uploads/custom-images/service-add-2022-10-03-04-17-46-7925.png', 1, 3, '2022-10-03 10:17:46', '2022-10-03 10:17:46'),
(29, 21, 'Service One', 'uploads/custom-images/service-add-2023-01-14-10-35-47-1935.jpeg', 1, 5, '2023-01-14 04:35:47', '2023-01-14 04:35:47'),
(30, 21, 'Service Two', 'uploads/custom-images/service-add-2023-01-14-10-35-47-2424.jpeg', 1, 7, '2023-01-14 04:35:48', '2023-01-14 04:35:48'),
(31, 20, 'Service One', 'uploads/custom-images/service-add-2023-01-14-10-38-21-7962.jpeg', 1, 10, '2023-01-14 04:38:21', '2023-01-14 04:38:21'),
(32, 20, 'Service Two', 'uploads/custom-images/service-add-2023-01-14-10-38-22-1651.jpeg', 1, 8, '2023-01-14 04:38:22', '2023-01-14 04:38:22'),
(33, 20, 'Service Three', 'uploads/custom-images/service-add-2023-01-14-10-38-22-2896.jpeg', 1, 14, '2023-01-14 04:38:23', '2023-01-14 04:38:23'),
(34, 19, 'Service One', 'uploads/custom-images/service-add-2023-01-14-10-40-07-6132.jpeg', 1, 12, '2023-01-14 04:40:07', '2023-01-14 04:40:07'),
(35, 19, 'Service Two', 'uploads/custom-images/service-add-2023-01-14-10-40-07-6399.jpeg', 1, 14, '2023-01-14 04:40:08', '2023-01-14 04:40:08'),
(36, 19, 'Service Three', 'uploads/custom-images/service-add-2023-01-14-10-40-08-8105.jpeg', 1, 5, '2023-01-14 04:40:08', '2023-01-14 04:40:08'),
(37, 18, 'Service One', 'uploads/custom-images/service-add-2023-01-14-10-41-22-2543.jpeg', 1, 3, '2023-01-14 04:41:22', '2023-01-14 04:41:22'),
(38, 18, 'Service Two', 'uploads/custom-images/service-add-2023-01-14-10-41-22-8164.jpeg', 1, 2, '2023-01-14 04:41:23', '2023-01-14 04:41:23'),
(39, 18, 'Service Three', 'uploads/custom-images/service-add-2023-01-14-10-41-23-2513.jpeg', 1, 5, '2023-01-14 04:41:23', '2023-01-14 04:41:23'),
(40, 17, 'Service One', 'uploads/custom-images/service-add-2023-01-14-10-42-45-2192.jpeg', 1, 10, '2023-01-14 04:42:45', '2023-01-14 04:42:45'),
(41, 17, 'Service Two', 'uploads/custom-images/service-add-2023-01-14-10-42-45-7669.jpeg', 1, 5, '2023-01-14 04:42:46', '2023-01-14 04:42:46'),
(42, 17, 'Service Three', 'uploads/custom-images/service-add-2023-01-14-10-42-46-4320.jpeg', 1, 6, '2023-01-14 04:42:46', '2023-01-14 04:42:46'),
(43, 16, 'Service One', 'uploads/custom-images/service-add-2023-01-14-10-43-40-3193.jpeg', 1, 2, '2023-01-14 04:43:41', '2023-01-14 04:43:41'),
(44, 16, 'Service Two', 'uploads/custom-images/service-add-2023-01-14-10-43-41-8190.jpeg', 1, 3, '2023-01-14 04:43:41', '2023-01-14 04:43:41'),
(45, 16, 'Service Three', 'uploads/custom-images/service-add-2023-01-14-10-43-41-7647.jpeg', 1, 8, '2023-01-14 04:43:42', '2023-01-14 04:43:42'),
(46, 15, 'Service One', 'uploads/custom-images/service-add-2023-01-14-10-44-31-5768.jpeg', 1, 10, '2023-01-14 04:44:31', '2023-01-14 04:44:31'),
(47, 15, 'Service Two', 'uploads/custom-images/service-add-2023-01-14-10-44-31-2276.jpeg', 1, 5, '2023-01-14 04:44:31', '2023-01-14 04:44:31'),
(48, 15, 'Service Three', 'uploads/custom-images/service-add-2023-01-14-10-44-31-3957.jpeg', 1, 6, '2023-01-14 04:44:32', '2023-01-14 04:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_type` int(10) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  `forget_password_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_type`, `name`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `status`, `forget_password_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'John Doe', 'admin@gmail.com', 'uploads/website-images/john-doe-2022-12-25-04-13-32-5577.jpg', NULL, '$2y$10$E9vUQogef2us1sas54MD6e3Z5yBoTSerndPBBtC7438PIy2M3dhoO', 'wv4FkE6y4zw2BLePihI9BUvtL113JsDNrDRL95dZorOn7kbD5hWFn8JXNzxT', 1, NULL, NULL, '2023-01-14 10:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `image`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'uploads/website-images/ad--2023-08-03-02-14-16-6983.jpg', 'https://codecanyon.net/user/websolutionus', 1, '2023-05-24 07:33:19', '2023-08-03 08:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `bank_payments`
--

CREATE TABLE `bank_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `account_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_payments`
--

INSERT INTO `bank_payments` (`id`, `status`, `account_info`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bank Name: Your bank name\r\nAccount Number:  Your bank account number\r\nRouting Number: Your bank routing number\r\nBranch: Your bank branch name', 'uploads/website-images/bank-2022-09-25-10-06-03-8346.jpg', NULL, '2022-09-25 04:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `banner_images`
--

CREATE TABLE `banner_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `header` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_images`
--

INSERT INTO `banner_images` (`id`, `title`, `description`, `link`, `image`, `button_text`, `banner_location`, `status`, `header`, `created_at`, `updated_at`) VALUES
(1, 'Up To - 35% Off', 'Hot Deals', 'product', 'uploads/website-images/Mega-menu-2022-02-13-07-53-14-1062.png', 'Shop Now', 'Mega Menu Banner', 1, NULL, NULL, '2022-02-13 13:53:14'),
(2, 'Up To -20% Off', 'Hot Deals', 'product', 'uploads/website-images/banner--2022-02-10-10-24-47-2663.jpg', 'Shop Now', 'Home Page One Column Banner', 1, NULL, NULL, '2022-02-13 13:45:52'),
(3, 'Up To -35% Off', 'Hot Deals', 'product', 'uploads/website-images/banner-2022-02-06-03-42-16-1335.png', 'Shop Now', 'Home Page First Two Column Banner One', 1, NULL, NULL, '2022-02-13 13:46:01'),
(4, 'Up To -40% Off', 'Hot Deals', 'product', 'uploads/website-images/banner-2022-02-06-03-42-16-1434.png', 'Shop Now', 'Home Page First Two Column Banner Two', 1, NULL, NULL, '2022-02-13 13:46:01'),
(5, 'Up To -28% Off', 'Hot Deals', 'product', 'uploads/website-images/banner-2022-02-06-04-18-01-2862.jpg', 'Shop Now', 'Home Page Second Two Column Banner one', 1, NULL, NULL, '2022-02-13 13:46:15'),
(6, 'Up To -22% Off', 'Hot Deals', 'product', 'uploads/website-images/banner-2022-02-06-04-18-01-6995.jpg', 'Shop Now', 'Home Page Second Two Column Banner two', 1, NULL, NULL, '2022-02-13 13:46:15'),
(7, 'Up To -35% Off', 'Hot Deals', 'product', 'uploads/website-images/banner-2022-02-13-04-57-46-4114.jpg', 'Shop Now', 'Home Page Third Two Column Banner one', 1, NULL, NULL, '2022-02-13 13:46:27'),
(8, 'Up To -15% Off', 'Hot Deals', 'product', 'uploads/website-images/banner-2022-02-13-04-58-43-7437.jpg', 'Shop Now', 'Home Page Third Two Column Banner Two', 1, NULL, NULL, '2022-02-13 13:46:27'),
(9, 'This is Tittle', 'This is Description', 'product', 'uploads/website-images/banner-2022-02-06-04-24-44-6895.jpg', 'dd', 'Shopping cart bottom', 1, '', NULL, '2022-02-13 13:47:23'),
(10, 'This is Title', 'This is Description', 'product', 'uploads/website-images/banner-2022-02-06-04-25-59-9719.jpg', NULL, 'Shopping cart bottom', 0, NULL, NULL, '2022-02-13 13:47:23'),
(11, 'This is Tittle', 'This is Description', 'product', 'uploads/website-images/banner-2022-02-06-04-26-46-8505.jpg', 'dd', 'Campaign page', 1, '', NULL, '2022-02-13 13:47:31'),
(12, 'This is Tittle', 'This is Description', 'product', 'uploads/website-images/banner-2022-01-30-06-21-06-4562.png', 'dd', 'Campaign page', 0, '', NULL, '2022-02-13 13:47:31'),
(13, 'This is Tittle', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Shop Now', 'uploads/website-images/banner-2022-02-07-10-48-37-9226.jpg', 'dd', 'Login page', 0, 'Our Achievement', NULL, '2022-02-07 04:48:39'),
(14, 'Black Friday Sale', 'Up To -70% Off', 'product', 'uploads/website-images/banner-2022-02-06-04-24-02-9777.jpg', NULL, 'Product Detail', 1, NULL, NULL, '2022-02-13 13:46:54'),
(15, 'Default Profile Image', NULL, NULL, 'uploads/website-images/default-avatar-2022-02-07-10-10-46-1477.jpg', NULL, 'Default Profile Image', 0, NULL, NULL, '2022-02-07 04:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `become_authors`
--

CREATE TABLE `become_authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desgination` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `become_authors`
--

INSERT INTO `become_authors` (`id`, `title`, `header1`, `header2`, `header3`, `description`, `bg_image`, `image1`, `image2`, `image`, `signature`, `name`, `desgination`, `item1`, `icon1`, `item2`, `icon2`, `item3`, `icon3`, `item4`, `icon4`, `created_at`, `updated_at`) VALUES
(1, 'Sell your Products with Our Digital Marketplace', 'Welcome to the Alasmart marketplace', 'We’re Confident You’d Feel Business Success.', 'We’re Confident You’d Feel Business Success.', '<p>What if you had access to an advisor who can provide specialist advice to help your hospitality business grow? An expert accountant you don&rsquo;t just see once a year at tax time.</p>\r\n<p>How about a team of book keepers that are always on hand to support your business and understand the need for ongoing support not just offer window of availability each week?</p>', 'uploads/website-images/become_author-2023-07-22-06-08-38-5742.jpg', 'uploads/website-images/become_author-2023-07-18-05-59-27-9178.png', 'uploads/website-images/become_author-2023-07-18-05-59-27-8651.png', 'uploads/website-images/become_author-2023-07-18-05-59-27-6087.png', 'uploads/website-images/become_author-2023-07-18-05-59-27-1169.png', 'Shivang Preet', 'CEO & Founder', '3 Million Members', 'uploads/website-images/become_author-2023-01-22-03-37-43-9440.png', 'Easy Approved System', 'uploads/website-images/become_author-2023-01-22-03-39-27-7149.png', 'All Payout System', 'uploads/website-images/become_author-2023-01-22-03-41-18-3485.png', 'Community Support', 'uploads/website-images/become_author-2023-01-22-03-41-28-6209.png', NULL, '2023-07-29 04:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_category_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `show_homepage` int(11) NOT NULL DEFAULT 0,
  `show_featured` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `admin_id`, `title`, `slug`, `tag`, `blog_category_id`, `image`, `short_description`, `description`, `views`, `seo_title`, `seo_description`, `status`, `show_homepage`, `show_featured`, `created_at`, `updated_at`) VALUES
(1, 1, 'The Best Delicious Coffee Shop In Bangkok China', 'the-best-delicious-coffee-shop-in-bangkok-china', 'Delicious, Coffee, Bangkok China, Shop, ', 3, 'uploads/custom-images/blog--2023-06-26-02-01-53-4338.png', 'Lorem ipsum dolor sit amet, porro discere ex sea. Ius at mazim soluta scripta, cum ne quot aeque nobis,', '<p>Lorem ipsum dolor sit amet, porro discere ex sea. Ius at mazim soluta scripta, cum ne quot aeque nobis,</p>\r\n<p>Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur. Aliquip persius has cu, oportere adversarium mei an, justo fabulas in vix.</p>\r\n<p>Nec in rebum primis causae. Affert iisque ex pri, vis utinam vivendo definitionem ad, nostrum omnesque per et. Omnium antiopam cotidieque cu sit. Id pri placerat voluptatum, vero dicunt dissentiunt eum et, adhuc iisque vis no. Eu suavitate contentiones definitionem mel, ex vide insolens ocurreret eam. Et dico blandit mea. Sea tollit vidisse mandamus te, qui movet efficiendi ex.</p>\r\n<p>Doming aliquid te pro. Mei et quodsi ornatus praesent, summo debet vis eu, dolor soleat nostrud sea eu. Cu altera possim sanctus est. Ea iriure repudiandae per, no eam legendos consectetuer. Mel at justo doming voluptatum. Mel mentitum fabellas deserunt no, et duo amet unum appetere.</p>\r\n<p>Lorem ipsum dolor sit amet, nibh saperet te pri, at nam diceret disputationi. Quo an consul impedit, usu possim evertitur dissentiet ei, ridens minimum nominavi et vix. An per mutat adipisci. Ut pericula dissentias sed, est ea modus gloriatur. Aliquip persius has cu, oportere adversarium mei an, justo fabulas in vix.</p>\r\n<p>Nec in rebum primis causae. Affert iisque ex pri, vis utinam vivendo definitionem ad, nostrum omnesque per et. Omnium antiopam cotidieque cu sit. Id pri placerat voluptatum, vero dicunt dissentiunt eum et, adhuc iisque vis no. Eu suavitate contentiones definitionem mel, ex vide insolens ocurreret eam. Et dico blandit mea. Sea tollit vidisse mandamus te, qui movet efficiendi ex.</p>\r\n<p>Doming aliquid te pro. Mei et quodsi ornatus praesent, summo debet vis eu, dolor soleat nostrud sea eu. Cu altera possim sanctus est. Ea iriure repudiandae per, no eam legendos consectetuer. Mel at justo doming voluptatum. Mel mentitum fabellas deserunt no, et duo amet unum appetere.</p>', 0, 'The Best Delicious Coffee Shop In Bangkok China', 'The Best Delicious Coffee Shop In Bangkok China', 1, 0, 0, '2023-06-26 03:26:19', '2023-07-29 06:43:18'),
(2, 1, 'America National Parks With Denver', 'america-national-parks-with-denver', 'America, National Parks, Web design, Web Development, ', 5, 'uploads/custom-images/blog--2023-06-26-02-02-13-5647.png', 'Nec in rebum primis causae. Affert iisque ex pri, vis utinam vivendo definitionem ad, nostrum omnesque per et.', '<p>Nec in rebum primis causae. Affert iisque ex pri, vis utinam vivendo definitionem ad, nostrum omnesque per et. Omnium antiopam cotidieque cu sit. Id pri placerat voluptatum, vero dicunt dissentiunt eum et, adhuc iisque vis no. Eu suavitate contentiones definitionem mel, ex vide</p>\r\n<p>Doming aliquid te pro. Mei et quodsi ornatus praesent, summo debet vis eu, dolor soleat nostrud sea eu. Cu altera possim sanctus est. Ea iriure repudiandae per, no eam legendos consectetuer. Mel at justo doming voluptatum. Mel mentitum fabellas deserunt no, et duo amet unum appetere.</p>\r\n<p>Quo id nemore dignissim persequeris, unum melius option ei vix, oratio vidisse eam ei. Altera neglegentur cum te. Latine probatus cum cu. Vim dicta sonet intellegebat ne, ei mazim decore eleifend nam, no malis soleat usu. Est ei tale praesent, ad nibh iudicabit has.</p>\r\n<p>Consetetur definitionem cu mea, usu legere minimum ne. Pro epicurei constituam ne, atqui lucilius indoctum nam id. Eu timeam volumus vel, eos te movet complectitur, te causae saperet eam. Minimum probatus vim te, eu eum ancillae mentitum comprehensam. Tantas decore adipisci vix no.</p>\r\n<p>Doming aliquid te pro. Mei et quodsi ornatus praesent, summo debet vis eu, dolor soleat nostrud sea eu. Cu altera possim sanctus est. Ea iriure repudiandae per, no eam legendos consectetuer. Mel at justo doming voluptatum. Mel mentitum fabellas deserunt no, et duo amet unum appetere.</p>\r\n<p>Quo id nemore dignissim persequeris, unum melius option ei vix, oratio vidisse eam ei. Altera neglegentur cum te. Latine probatus cum cu. Vim dicta sonet intellegebat ne, ei mazim decore eleifend nam, no malis soleat usu. Est ei tale praesent, ad nibh iudicabit has.</p>\r\n<p>Consetetur definitionem cu mea, usu legere minimum ne. Pro epicurei constituam ne, atqui lucilius indoctum nam id. Eu timeam volumus vel, eos te movet complectitur, te causae saperet eam. Minimum probatus vim te, eu eum ancillae mentitum comprehensam. Tantas decore adipisci vix no.</p>', 0, 'America National Parks With Denver', 'America National Parks With Denver', 1, 0, 0, '2023-06-26 03:42:54', '2023-07-29 06:43:18'),
(3, 1, 'A Seaside Reset In Zim Dolor Laguna Beach', 'a-seaside-reset-in-zim-dolor-laguna-beach', 'Seaside, Laguna Beach, Artificial Intelligence, ', 6, 'uploads/custom-images/blog--2023-06-26-09-47-26-6167.png', 'Ut qui eligendi urbanitas. Assum periculis te mel, libris quidam te sit. Qui nisl nemore eleifend id, in illud ullum sea.', '<p>Ut qui eligendi urbanitas. Assum periculis te mel, libris quidam te sit. Qui nisl nemore eleifend id, in illud ullum sea. Ut nusquam sapientem comprehensam ius. His molestie complectitur ex.</p>\r\n<p>Ei usu malis aeque efficiantur. Mazim dolor denique duo ad, augue ornatus sententiae vel at, duo id sumo vulputate. His legimus assueverit ut, commune maluisset deterruisset id mel. Oblique volumus eos ut, quo autem posidonium definitiones cu. Cu usu lorem consul concludaturque, pro ea fuisset consectetuer. Ex aeterno forensibus has, dicta propriae est ei, ex alterum apeirian quo.</p>\r\n<p>Pri tempor appareat no, eruditi repudiandae vix at. Eos at brute omnesque voluptaria, facer putent intellegam eu pri. Mei debitis ullamcorper eu, at quo idque mundi. Vis in suas porro consequat, nec ad dolor adversarium, ut praesent cotidieque sit. Veniam civibus omittantur duo ut, te his alterum complectitur. Mea omnis oratio impedit ne.</p>\r\n<p>Quo id nemore dignissim persequeris, unum melius option ei vix, oratio vidisse eam ei. Altera neglegentur cum te. Latine probatus cum cu. Vim dicta sonet intellegebat ne, ei mazim decore eleifend nam, no malis soleat usu. Est ei tale praesent, ad nibh iudicabit has.</p>\r\n<p>Consetetur definitionem cu mea, usu legere minimum ne. Pro epicurei constituam ne, atqui lucilius indoctum nam id. Eu timeam volumus vel, eos te movet complectitur, te causae saperet eam. Minimum probatus vim te, eu eum ancillae mentitum comprehensam. Tantas decore adipisci vix no.</p>', 0, 'A Seaside Reset In Zim Dolor Laguna Beach', 'A Seaside Reset In Zim Dolor Laguna Beach', 1, 0, 0, '2023-06-26 03:47:26', '2023-07-29 06:43:18'),
(4, 1, 'Lorem Ipsum Is Simply Dummy Text Of The Printing', 'lorem-ipsum-is-simply-dummy-text-of-the-printing', 'Printing, Web design, Web development, ', 7, 'uploads/custom-images/blog--2023-06-26-09-50-59-8956.png', 'Pri tempor appareat no, eruditi repudiandae vix at.', '<p>Pri tempor appareat no, eruditi repudiandae vix at. Eos at brute omnesque voluptaria, facer putent intellegam eu pri. Mei debitis ullamcorper eu, at quo idque mundi. Vis in suas porro consequat, nec ad dolor adversarium, ut praesent cotidieque sit. Veniam civibus omittantur duo ut, te his alterum complectitur. Mea omnis oratio impedit ne.</p>\r\n<p>In vim natum soleat nostro, pri in eloquentiam contentiones. Eu sit sapientem reprehendunt, omnis aliquid eu eos. No quot illum veniam est, ne pro iudico saperet mnesarchum. Ea pri nostro disputando contentiones, eu nec menandri qualisque, vis ex equidem invidunt. Et accusam detracto splendide per, congue meliore id sea. Has eu aeterno patrioque expetendis, mel ei dissentiet reformidans.</p>\r\n<p>Meliore inimicus duo ut, tation veritus elaboraret eam cu. Cum in alii agam aliquip, aperiam salutandi et per. Ex vis summo probatus ocurreret, ex assum sententiae pri, blandit sensibus moderatius ei eos. Vix nobis phaedrum neglegentur et.</p>\r\n<p>Id est maiorum volutpat, ad nominavi suscipit suscipiantur vix. Ut ius veri aperiam reprehendunt. Ut per unum sapientem consequuntur, usu ut quot scripta. Sea te nisl expetenda, ad quo congue argumentum, sit quis simul accusam cu. Usu ei perfecto repudiare tincidunt, ut quas malis erant vim. An mel vidit iudicabit.</p>', 0, 'Lorem Ipsum Is Simply Dummy Text Of The Printing', 'Lorem Ipsum Is Simply Dummy Text Of The Printing', 1, 0, 0, '2023-06-26 03:50:59', '2023-07-29 06:43:18'),
(5, 1, 'List Of Benifits And Impressive Listeo Services', 'list-of-benifits-and-impressive-listeo-services', 'Benifits, Impressive, Services, ', 1, 'uploads/custom-images/blog--2023-06-26-09-56-51-9713.png', 'Quo id nemore dignissim persequeris, unum melius option ei vix, oratio vidisse eam ei.', '<p>Quo id nemore dignissim persequeris, unum melius option ei vix, oratio vidisse eam ei. Altera neglegentur cum te. Latine probatus cum cu. Vim dicta sonet intellegebat ne, ei mazim decore eleifend nam, no malis soleat usu. Est ei tale praesent, ad nibh iudicabit has.</p>\r\n<p>Consetetur definitionem cu mea, usu legere minimum ne. Pro epicurei constituam ne, atqui lucilius indoctum nam id. Eu timeam volumus vel, eos te movet complectitur, te causae saperet eam. Minimum probatus vim te, eu eum ancillae mentitum comprehensam. Tantas decore adipisci vix no.</p>\r\n<p>Ut qui eligendi urbanitas. Assum periculis te mel, libris quidam te sit. Qui nisl nemore eleifend id, in illud ullum sea. Ut nusquam sapientem comprehensam ius. His molestie complectitur ex.</p>\r\n<p>Ei usu malis aeque efficiantur. Mazim dolor denique duo ad, augue ornatus sententiae vel at, duo id sumo vulputate. His legimus assueverit ut, commune maluisset deterruisset id mel. Oblique volumus eos ut, quo autem posidonium definitiones cu. Cu usu lorem consul concludaturque, pro ea fuisset consectetuer. Ex aeterno forensibus has, dicta propriae est ei, ex alterum apeirian quo.</p>\r\n<p>Pri tempor appareat no, eruditi repudiandae vix at. Eos at brute omnesque voluptaria, facer putent intellegam eu pri. Mei debitis ullamcorper eu, at quo idque mundi. Vis in suas porro consequat, nec ad dolor adversarium, ut praesent cotidieque sit. Veniam civibus omittantur duo ut, te his alterum complectitur. Mea omnis oratio impedit ne.</p>', 0, 'List Of Benifits And Impressive Listeo Services', 'List Of Benifits And Impressive Listeo Services', 1, 1, 0, '2023-06-26 03:56:51', '2023-07-29 06:43:18'),
(6, 1, '10 Reasons To Start Your Own, Profitable Website!', '10-reasons-to-start-your-own-profitable-website', 'Blockchain Technology, Website, ', 2, 'uploads/custom-images/blog--2023-06-26-10-00-28-3509.png', 'Consetetur definitionem cu mea, usu legere minimum ne. Pro epicurei constituam ne, atqui lucilius indoctum nam id.', '<p>Consetetur definitionem cu mea, usu legere minimum ne. Pro epicurei constituam ne, atqui lucilius indoctum nam id. Eu timeam volumus vel, eos te movet complectitur, te causae saperet eam. Minimum probatus vim te, eu eum ancillae mentitum comprehensam. Tantas decore adipisci vix no.</p>\r\n<p>Ut qui eligendi urbanitas. Assum periculis te mel, libris quidam te sit. Qui nisl nemore eleifend id, in illud ullum sea. Ut nusquam sapientem comprehensam ius. His molestie complectitur ex.</p>\r\n<p>Ei usu malis aeque efficiantur. Mazim dolor denique duo ad, augue ornatus sententiae vel at, duo id sumo vulputate. His legimus assueverit ut, commune maluisset deterruisset id mel. Oblique volumus eos ut, quo autem posidonium definitiones cu. Cu usu lorem consul concludaturque, pro ea fuisset consectetuer. Ex aeterno forensibus has, dicta propriae est ei, ex alterum apeirian quo.</p>\r\n<p>Pri tempor appareat no, eruditi repudiandae vix at. Eos at brute omnesque voluptaria, facer putent intellegam eu pri. Mei debitis ullamcorper eu, at quo idque mundi. Vis in suas porro consequat, nec ad dolor adversarium, ut praesent cotidieque sit. Veniam civibus omittantur duo ut, te his alterum complectitur. Mea omnis oratio impedit ne.</p>\r\n<p>Meliore inimicus duo ut, tation veritus elaboraret eam cu. Cum in alii agam aliquip, aperiam salutandi et per. Ex vis summo probatus ocurreret, ex assum sententiae pri, blandit sensibus moderatius ei eos. Vix nobis phaedrum neglegentur et.</p>', 0, '10 Reasons To Start Your Own, Profitable Website!', '10 Reasons To Start Your Own, Profitable Website!', 1, 0, 0, '2023-06-26 04:00:28', '2023-07-29 06:43:18'),
(7, 1, '9 Things I Love About Shaving My Head During Quarantine', '9-things-i-love-about-shaving-my-head-during-quarantine', 'Things, Shaving, Machine Learning, ', 3, 'uploads/custom-images/blog--2023-06-26-10-09-27-7726.png', 'Appetere fabellas ius te. Nonumes splendide deseruisse ea vis, alii velit vel eu.', '<p>Appetere fabellas ius te. Nonumes splendide deseruisse ea vis, alii velit vel eu. Eos ut scaevola platonem rationibus. Vis natum vivendo sententiae in, ea aperiam apeirian pri, in partem eleifend quo. Pro ex nobis utinam, nam et vidit numquam fastidii, ne per munere adolescens.</p>\r\n<p>Ipsum volumus pertinax mea ut, eu erat tacimates nam. Tibique copiosae verterem mea no, eam ex melius option, soluta timeam et his. Sit simul gubergren reformidans id, amet minimum nominavi eos ea. Et augue dicta vix. Mea ne utamur referrentur.</p>\r\n<p>Per ex vero nonumy. Ius eu doming nominavi mediocrem, aliquid efficiantur no vim, sanctus admodum mnesarchum ad pro. No sea invidunt partiendo. No postea numquam ocurreret duo, unum abhorreant cu nam, fugit fastidii percipitur nam id.</p>\r\n<p>Sit vivendum eleifend adipiscing ea. Modus legere suscipiantur an vel, melius patrioque est cu, eum at audire probatus repudiandae. Ei tempor definitiones eam, sea dico omnium ne. Eam ad ubique tincidunt elaboraret, malis aperiri sit et. Ut quo vero inimicus. Sed at munere fuisset noluisse, eleifend senserit an vix.</p>\r\n<p>Te soleat legendos molestiae cum. Tale sanctus invidunt cu per, quo at modo recteque elaboraret. Ex mazim homero per. Eu nec exerci doctus, cu mei oblique copiosae. Consul diceret usu ne.</p>', 0, '9 Things I Love About Shaving My Head During Quarantine', '9 Things I Love About Shaving My Head During Quarantine', 1, 0, 0, '2023-06-26 04:09:27', '2023-07-29 06:43:18'),
(8, 1, '10 Strategies to Supercharge Your Efficiency', '10-strategies-to-supercharge-your-efficiency', 'Strategies, Supercharge, Apps Development, ', 4, 'uploads/custom-images/blog--2023-06-26-10-20-59-7142.png', 'In today\'s fast-paced world, where time is a valuable asset, it\'s essential to maximize our efficiency and productivity.', '<p>In today\'s fast-paced world, where time is a valuable asset, it\'s essential to maximize our efficiency and productivity. Whether you\'re a busy professional, an entrepreneur, or a student juggling multiple responsibilities, implementing effective strategies can supercharge your efficiency levels. This blog post presents ten proven strategies that can help you optimize your time management, streamline your workflow, and accomplish more with less effort. By incorporating these techniques into your daily routine, you\'ll be able to achieve your goals more effectively and make the most of your precious time.</p>\r\n<p>The first strategy we\'ll explore is the power of prioritization. Many tasks compete for our attention, but not all of them are equally important or urgent. By identifying and focusing on high-priority tasks, you can ensure that you\'re directing your efforts towards the activities that will yield the greatest impact. We\'ll delve into techniques for setting priorities, such as using Eisenhower\'s Urgent/Important Matrix and leveraging productivity tools to stay organized.</p>\r\n<p>Next, we\'ll delve into the art of effective planning. Having a well-structured plan can significantly enhance your efficiency. We\'ll discuss the benefits of creating daily, weekly, and monthly schedules, and how to allocate specific time blocks for different activities. Additionally, we\'ll explore the benefits of setting SMART goals (Specific, Measurable, Achievable, Relevant, Time-bound) and breaking them down into smaller, manageable tasks to increase motivation and clarity.</p>\r\n<p>Another key aspect of supercharging your efficiency is optimizing your workspace and minimizing distractions. We\'ll provide practical tips for creating an organized and clutter-free environment that fosters focus and productivity. Moreover, we\'ll discuss techniques for managing digital distractions, such as implementing designated work hours, utilizing website blockers, and adopting the Pomodoro Technique to maintain concentration.</p>', 0, '10 Strategies to Supercharge Your Efficiency', '10 Strategies to Supercharge Your Efficiency', 1, 1, 0, '2023-06-26 04:20:59', '2023-07-29 06:43:18'),
(9, 1, 'Exploring the Transformative Potential of VR Technology', 'exploring-the-transformative-potential-of-vr-technology', 'Exploring, Transformative, Potential, Technology, ', 1, 'uploads/custom-images/blog--2023-06-26-10-31-02-4474.png', 'Virtual Reality (VR) technology has emerged as a groundbreaking innovation, offering immersive experiences that blur the line between the real and virtual worlds.', '<p>Virtual Reality (VR) technology has emerged as a groundbreaking innovation, offering immersive experiences that blur the line between the real and virtual worlds. This transformative technology has the potential to revolutionize various industries, from gaming and entertainment to education and healthcare. In this blog, we will delve into the transformative potential of VR and explore how it is reshaping our perceptions, interactions, and experiences.</p>\r\n<p>One of the most obvious applications of VR technology is in the gaming and entertainment industry. VR headsets transport users to captivating virtual environments, enabling them to engage in thrilling adventures, explore fantastical realms, and interact with virtual characters. This immersive experience has redefined the way we play games and consume entertainment, providing a level of engagement and realism never before seen. From virtual roller coasters to multiplayer experiences, VR technology is revolutionizing the gaming and entertainment landscape.</p>\r\n<p>VR technology has also made significant strides in the realm of education and training. Traditional learning methods are often limited by textbooks, lectures, and static visuals, but with VR, students can engage in interactive and dynamic educational experiences. Imagine exploring ancient civilizations, diving into the depths of the ocean, or even dissecting virtual organisms&mdash;all from the comfort of a classroom. VR technology has the power to enhance learning by providing a hands-on and immersive approach that caters to diverse learning styles.</p>\r\n<p>In healthcare, VR has demonstrated its potential in transforming patient care and therapy. From pain management to mental health treatment, VR technology offers a non-invasive and immersive solution. For example, VR simulations can help patients overcome phobias, manage chronic pain, or even provide virtual physical therapy sessions. By creating realistic and controlled environments, VR enables healthcare professionals to improve treatment outcomes and enhance patient well-being.</p>', 0, 'Exploring the Transformative Potential of VR Technology', 'Exploring the Transformative Potential of VR Technology', 1, 1, 0, '2023-06-26 04:31:02', '2023-07-29 06:43:18'),
(10, 1, 'How to Turn Your Passion into a Successful Side Business', 'how-to-turn-your-passion-into-a-successful-side-business', 'Passion, Business, transforming, ', 4, 'uploads/custom-images/blog--2023-06-26-10-35-05-5687.png', 'Are you tired of your 9-to-5 job and yearning to pursue your passion? Imagine transforming your hobbies or interests into a profitable side business.', '<p>Are you tired of your 9-to-5 job and yearning to pursue your passion? Imagine transforming your hobbies or interests into a profitable side business. In this blog post, we\'ll explore the step-by-step process to help you turn your passion into a successful venture, allowing you to do what you love while earning extra income.</p>\r\n<p>The first crucial step is to identify your passion. Take some time to reflect on your interests, skills, and talents. What activities make you lose track of time? Once you\'ve discovered your true passion, we\'ll guide you through the process of brainstorming potential business ideas that align with your strengths and goals.</p>\r\n<p>Next, we\'ll delve into market research. It\'s essential to identify your target audience, evaluate the competition, and assess the demand for your product or service. By understanding your potential customers\' needs and preferences, you can tailor your offerings to meet their requirements and stand out in the market.</p>\r\n<p>Now that you have a business idea and a target audience, it\'s time to create a solid business plan. We\'ll discuss the key components of a business plan, including defining your unique value proposition, setting realistic goals, outlining your marketing strategy, and planning your finances. A well-structured business plan will serve as a roadmap for your success.</p>\r\n<p>Building your brand and establishing an online presence are critical for any business. We\'ll provide you with practical tips on creating a memorable brand identity, designing a professional website, utilizing social media platforms to reach your audience, and leveraging online marketing techniques to promote your side business effectively.</p>', 0, 'How to Turn Your Passion into a Successful Side Business', 'How to Turn Your Passion into a Successful Side Business', 1, 0, 1, '2023-06-26 04:35:05', '2023-07-29 06:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Wordpress Development', 'wordpress-development', 1, '2023-06-26 03:16:27', '2023-06-26 04:44:43'),
(2, 'Blockchain Technology', 'blockchain-technology', 1, '2023-06-26 03:16:42', '2023-06-26 04:43:35'),
(3, 'Machine Learning', 'machine-learning', 1, '2023-06-26 03:16:58', '2023-06-26 04:42:50'),
(4, 'Apps Development', 'apps-development', 1, '2023-06-26 03:17:14', '2023-06-26 04:41:57'),
(5, 'Web Design', 'web-design', 1, '2023-06-26 03:17:33', '2023-06-26 04:41:25'),
(6, 'Artificial Intelligence', 'artificial-intelligence', 1, '2023-06-26 03:17:57', '2023-06-26 04:38:49'),
(7, 'Web Development', 'web-development', 1, '2023-06-26 03:18:12', '2023-06-26 04:37:22');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blog_id`, `name`, `email`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 'Jason Mcneil', 'jasonmcneil@gmail.com', 'This blog captures the essence of beauty in its purest form, painting a vivid picture with words that transports readers to a world of mesmerizing landscapes and breathtaking sunsets.', 1, '2023-06-26 05:27:48', '2023-06-26 05:28:02'),
(2, 10, 'Amaya Hendrix', 'amayahendrix@gmail.com', 'The writer&#039;s eloquent prose in this blog dances gracefully across the page, evoking a sense of wonder and enchantment, leaving readers craving for more.', 1, '2023-06-26 05:29:09', '2023-06-26 05:34:50'),
(3, 9, 'Harding Rosa', 'hardingrosa@gmail.com', 'Each sentence in this blog is like a brushstroke on a canvas, carefully crafted to reveal the hidden beauty in the ordinary, transforming it into something extraordinary.', 1, '2023-06-26 05:31:14', '2023-06-26 05:34:49'),
(4, 9, 'John Doe', 'johndoe@gmail.com', 'As I read this blog, I find myself immersed in a symphony of words, harmoniously arranged to create a captivating melody that resonates with the soul.', 1, '2023-06-26 05:32:11', '2023-06-26 05:34:48'),
(5, 8, 'Xaviera Barnes', 'xaviera@gmail.com', 'The imagery in this blog is like a kaleidoscope of colors, painting a tapestry of vivid emotions and stirring the senses with its sheer beauty.', 1, '2023-06-26 05:33:27', '2023-06-26 05:34:46'),
(6, 7, 'Nasim Horne', 'nasimhorne@gmai.com', 'This blog is a sanctuary for the beauty-seeker, a sanctuary where words come alive, allowing readers to explore the depths of their imagination and discover the extraordinary in the ordinary.', 1, '2023-06-26 05:34:35', '2023-06-26 05:34:45'),
(7, 9, 'Ripon', 'riponchandra667@gmail.com', 'Helow', 1, '2023-07-30 05:02:19', '2023-07-30 05:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_gallery` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `product_gallery`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Image', 'image', 'uploads/custom-images/category-2023-06-24-05-24-41-9222.png', 0, 1, '2023-06-24 11:24:41', '2023-07-24 06:09:06'),
(2, 'Video', 'video', 'uploads/custom-images/category-2023-06-24-05-25-14-1896.png', 1, 1, '2023-06-24 11:25:14', '2023-07-24 04:40:42'),
(3, 'PHP Script', 'php-script', 'uploads/custom-images/category-2023-06-24-05-25-57-2341.png', 1, 1, '2023-06-24 11:25:57', '2023-07-24 04:40:51'),
(4, 'Audio', 'audio', 'uploads/custom-images/category-2023-06-26-03-33-01-8817.png', 1, 1, '2023-06-24 11:26:37', '2023-07-24 06:06:39'),
(5, 'Wordpress', 'wordpress', 'uploads/custom-images/category-2023-06-24-05-27-12-3101.png', 1, 1, '2023-06-24 11:27:12', '2023-07-24 04:41:09'),
(6, 'Shopify', 'shopify', 'uploads/custom-images/category-2023-07-24-10-16-10-9317.png', 0, 1, '2023-07-24 04:16:11', '2023-07-24 06:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_state_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_state_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Florida City', 'florida-city', 1, '2022-01-30 09:29:19', '2022-02-06 04:18:33'),
(2, 1, 'Los Angeles', 'los-angeles', 1, '2022-01-30 09:29:29', '2022-02-06 04:20:30'),
(4, 2, 'Tallahassee', 'tallahassee', 1, '2022-02-06 04:18:49', '2022-02-06 04:18:49'),
(5, 2, 'Weston', 'weston', 1, '2022-02-06 04:19:56', '2022-02-06 04:19:56'),
(6, 1, 'San Jose', 'san-jose', 1, '2022-02-06 04:21:08', '2022-02-06 04:21:08'),
(7, 1, 'San Diego', 'san-diego', 1, '2022-02-06 04:21:26', '2022-02-06 04:21:26'),
(8, 4, 'Gandhinagar', 'gandhinagar', 1, '2022-02-06 04:22:21', '2022-02-06 04:22:21'),
(9, 5, 'Chandigarh', 'chandigarh', 1, '2022-02-06 04:22:44', '2022-02-06 04:22:44'),
(10, 7, 'London', 'london', 1, '2022-02-06 04:23:12', '2022-02-06 04:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `complete_requests`
--

CREATE TABLE `complete_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `resone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complete_requests`
--

INSERT INTO `complete_requests` (`id`, `provider_id`, `order_id`, `resone`, `created_at`, `updated_at`) VALUES
(1, 2, 6, 'this is test resone', '2022-11-10 05:38:11', '2022-11-10 05:38:11'),
(2, 2, 9, 'this is test resone', '2022-11-10 05:44:49', '2022-11-10 05:44:49'),
(3, 2, 10, 'Please complete the booking.', '2022-12-21 03:48:10', '2022-12-21 03:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Ripon Chandra', 'riponchandra667@gmail.com', '01745738766', 'Example', 'ssfsfsfsfsf', '2023-07-30 07:34:11', '2023-07-30 07:34:11'),
(2, 'Ripon Chandra', 'riponchandra667@gmail.com', '01745738766', 'Example', 'Helow', '2023-07-30 07:35:00', '2023-07-30 07:35:00'),
(3, 'Ripon Chandra', 'riponchandra667@gmail.com', '01745738766', 'Example', 'Helow', '2023-07-30 09:50:06', '2023-07-30 09:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `contact_pages`
--

CREATE TABLE `contact_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supporter_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `off_day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_pages`
--

INSERT INTO `contact_pages` (`id`, `supporter_image`, `title1`, `title2`, `icon`, `time`, `off_day`, `image`, `description`, `email`, `address`, `phone`, `map`, `created_at`, `updated_at`) VALUES
(1, 'uploads/website-images/supporter--2022-08-28-02-04-43-1575.jpg', 'Feel Free to Get in Touch', 'Support Time', 'far fa-headset', '09.00am to 10.00pm', 'Friday Off', 'uploads/website-images/contact_us-2023-07-19-11-43-12-3755.jpg', 'Fill the form below or write us .We will try our to help you as soon as possible.', 'websolutionus1@gmail.com\r\nwebsolutionus@gmail.com', '7232 Broadway Suite 308, Jackson Heights, 11372, NY, United States', '+1347-430-9510\r\n+4247-100-9510', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.681138843672!2d-73.89482218459395!3d40.747041279328165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25f01328248b3%3A0x62300784dd275f96!2s7232%20Broadway%20%23%20308%2C%20Flushing%2C%20NY%2011372%2C%20USA!5e0!3m2!1sen!2sbd!4v1652467683397!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2022-01-30 12:31:58', '2023-07-30 07:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `cookie_consents`
--

CREATE TABLE `cookie_consents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `border` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corners` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `border_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_bg_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_text_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cookie_consents`
--

INSERT INTO `cookie_consents` (`id`, `status`, `border`, `corners`, `background_color`, `text_color`, `border_color`, `btn_bg_color`, `btn_text_color`, `message`, `link_text`, `btn_text`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, 'thin', 'normal', '#184dec', '#fafafa', '#0a58d6', '#fffceb', '#222758', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the when an unknown printer took.', 'More Info', 'Yes', NULL, NULL, '2022-02-13 08:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'United State', 'united-state', 1, '2022-01-30 09:28:28', '2022-02-06 04:11:42'),
(2, 'India', 'india', 1, '2022-01-30 09:28:39', '2022-08-30 06:18:46'),
(4, 'United Kindom', 'united-kindom', 1, '2022-02-06 04:11:51', '2022-02-06 04:11:51'),
(5, 'Australia', 'australia', 1, '2022-02-06 04:12:36', '2022-02-06 04:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `country_states`
--

CREATE TABLE `country_states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_states`
--

INSERT INTO `country_states` (`id`, `country_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'California', 'california', 1, '2022-01-30 09:29:00', '2022-02-06 04:14:28'),
(2, 1, 'Florida', 'florida', 1, '2022-01-30 09:29:07', '2022-02-06 04:14:42'),
(3, 1, 'Alaska', 'alaska', 1, '2022-02-05 07:49:14', '2022-02-06 04:15:09'),
(4, 2, 'Gujarat', 'gujarat', 1, '2022-02-06 04:16:27', '2022-02-06 04:16:27'),
(5, 2, 'Punjab', 'punjab', 1, '2022-02-06 04:16:39', '2022-02-06 04:16:39'),
(6, 2, 'Rajasthan', 'rajasthan', 1, '2022-02-06 04:16:48', '2022-02-06 04:16:48'),
(7, 4, 'England', 'england', 1, '2022-02-06 04:17:35', '2022-02-06 04:17:35'),
(8, 4, 'Scotland', 'scotland', 1, '2022-02-06 04:17:44', '2022-02-06 04:17:44'),
(9, 4, 'Wales', 'wales', 1, '2022-02-06 04:17:53', '2022-02-06 04:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `coupon_validity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount`, `coupon_validity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'EID SPASIAL', 10, '2023-08-08', 1, '2023-08-06 05:51:38', '2023-08-06 05:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `code` varchar(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'AFA', 'Afghan Afghani', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'ALL', 'Albanian Lek', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'DZD', 'Algerian Dinar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'AOA', 'Angolan Kwanza', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'ARS', 'Argentine Peso', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'AMD', 'Armenian Dram', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'AWG', 'Aruban Florin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'AUD', 'Australian Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'AZN', 'Azerbaijani Manat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'BSD', 'Bahamian Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'BHD', 'Bahraini Dinar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'BDT', 'Bangladeshi Taka', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'BBD', 'Barbadian Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'BYR', 'Belarusian Ruble', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'BEF', 'Belgian Franc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'BZD', 'Belize Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'BMD', 'Bermudan Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'BTN', 'Bhutanese Ngultrum', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'BTC', 'Bitcoin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'BOB', 'Bolivian Boliviano', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'BAM', 'Bosnia-Herzegovina Convertible Mark', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'BWP', 'Botswanan Pula', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'BRL', 'Brazilian Real', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'GBP', 'British Pound Sterling', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'BND', 'Brunei Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'BGN', 'Bulgarian Lev', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'BIF', 'Burundian Franc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'KHR', 'Cambodian Riel', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'CAD', 'Canadian Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'CVE', 'Cape Verdean Escudo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'KYD', 'Cayman Islands Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'XOF', 'CFA Franc BCEAO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'XAF', 'CFA Franc BEAC', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'XPF', 'CFP Franc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'CLP', 'Chilean Peso', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'CNY', 'Chinese Yuan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'COP', 'Colombian Peso', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'KMF', 'Comorian Franc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'CDF', 'Congolese Franc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'CRC', 'Costa Rican ColÃ³n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'HRK', 'Croatian Kuna', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'CUC', 'Cuban Convertible Peso', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'CZK', 'Czech Republic Koruna', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'DKK', 'Danish Krone', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'DJF', 'Djiboutian Franc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'DOP', 'Dominican Peso', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'XCD', 'East Caribbean Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'EGP', 'Egyptian Pound', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'ERN', 'Eritrean Nakfa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'EEK', 'Estonian Kroon', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'ETB', 'Ethiopian Birr', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'EUR', 'Euro', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'FKP', 'Falkland Islands Pound', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'FJD', 'Fijian Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'GMD', 'Gambian Dalasi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'GEL', 'Georgian Lari', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'DEM', 'German Mark', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'GHS', 'Ghanaian Cedi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'GIP', 'Gibraltar Pound', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'GRD', 'Greek Drachma', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'GTQ', 'Guatemalan Quetzal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'GNF', 'Guinean Franc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'GYD', 'Guyanaese Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'HTG', 'Haitian Gourde', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'HNL', 'Honduran Lempira', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'HKD', 'Hong Kong Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'HUF', 'Hungarian Forint', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'ISK', 'Icelandic KrÃ³na', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'INR', 'Indian Rupee', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'IDR', 'Indonesian Rupiah', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'IRR', 'Iranian Rial', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'IQD', 'Iraqi Dinar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'ILS', 'Israeli New Sheqel', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'ITL', 'Italian Lira', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'JMD', 'Jamaican Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'JPY', 'Japanese Yen', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'JOD', 'Jordanian Dinar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'KZT', 'Kazakhstani Tenge', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'KES', 'Kenyan Shilling', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'KWD', 'Kuwaiti Dinar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'KGS', 'Kyrgystani Som', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'LAK', 'Laotian Kip', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'LVL', 'Latvian Lats', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'LBP', 'Lebanese Pound', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'LSL', 'Lesotho Loti', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'LRD', 'Liberian Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'LYD', 'Libyan Dinar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'LTL', 'Lithuanian Litas', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'MOP', 'Macanese Pataca', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'MKD', 'Macedonian Denar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'MGA', 'Malagasy Ariary', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'MWK', 'Malawian Kwacha', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'MYR', 'Malaysian Ringgit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'MVR', 'Maldivian Rufiyaa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'MRO', 'Mauritanian Ouguiya', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'MUR', 'Mauritian Rupee', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'MXN', 'Mexican Peso', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'MDL', 'Moldovan Leu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'MNT', 'Mongolian Tugrik', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'MAD', 'Moroccan Dirham', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'MZM', 'Mozambican Metical', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'MMK', 'Myanmar Kyat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'NAD', 'Namibian Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'NPR', 'Nepalese Rupee', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'ANG', 'Netherlands Antillean Guilder', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'TWD', 'New Taiwan Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'NZD', 'New Zealand Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'NIO', 'Nicaraguan CÃ³rdoba', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'NGN', 'Nigerian Naira', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'KPW', 'North Korean Won', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'NOK', 'Norwegian Krone', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'OMR', 'Omani Rial', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'PKR', 'Pakistani Rupee', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'PAB', 'Panamanian Balboa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'PGK', 'Papua New Guinean Kina', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'PYG', 'Paraguayan Guarani', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'PEN', 'Peruvian Nuevo Sol', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'PHP', 'Philippine Peso', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'PLN', 'Polish Zloty', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'QAR', 'Qatari Rial', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'RON', 'Romanian Leu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 'RUB', 'Russian Ruble', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'RWF', 'Rwandan Franc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'SVC', 'Salvadoran ColÃ³n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'WST', 'Samoan Tala', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 'SAR', 'Saudi Riyal', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'RSD', 'Serbian Dinar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'SCR', 'Seychellois Rupee', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'SLL', 'Sierra Leonean Leone', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 'SGD', 'Singapore Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 'SKK', 'Slovak Koruna', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'SBD', 'Solomon Islands Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'SOS', 'Somali Shilling', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'ZAR', 'South African Rand', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 'KRW', 'South Korean Won', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'XDR', 'Special Drawing Rights', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'LKR', 'Sri Lankan Rupee', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'SHP', 'St. Helena Pound', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'SDG', 'Sudanese Pound', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'SRD', 'Surinamese Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'SZL', 'Swazi Lilangeni', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'SEK', 'Swedish Krona', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'CHF', 'Swiss Franc', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'SYP', 'Syrian Pound', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'STD', 'São Tomé and Príncipe Dobra', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'TJS', 'Tajikistani Somoni', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'TZS', 'Tanzanian Shilling', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'THB', 'Thai Baht', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'TOP', 'Tongan pa\'anga', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'TTD', 'Trinidad & Tobago Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'TND', 'Tunisian Dinar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'TRY', 'Turkish Lira', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 'TMT', 'Turkmenistani Manat', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 'UGX', 'Ugandan Shilling', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 'UAH', 'Ukrainian Hryvnia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 'AED', 'United Arab Emirates Dirham', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 'UYU', 'Uruguayan Peso', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 'USD', 'US Dollar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 'UZS', 'Uzbekistan Som', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 'VUV', 'Vanuatu Vatu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 'VEF', 'Venezuelan BolÃ­var', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 'VND', 'Vietnamese Dong', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 'YER', 'Yemeni Rial', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 'ZMK', 'Zambian Kwacha', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `currency_countries`
--

CREATE TABLE `currency_countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `code` varchar(2) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `currency_countries`
--

INSERT INTO `currency_countries` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Andorra', 'AD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Afghanistan', 'AF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Åland Islands', 'AX', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Albania', 'AL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Algeria', 'DZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'American Samoa', 'AS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Angola', 'AO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Anguilla', 'AI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Antarctica', 'AQ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Antigua and Barbuda', 'AG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Argentina', 'AR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Armenia', 'AM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Aruba', 'AW', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Australia', 'AU', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Austria', 'AT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Azerbaijan', 'AZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Bahamas', 'BS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Bahrain', 'BH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Bangladesh', 'BD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Barbados', 'BB', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Belarus', 'BY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Belgium', 'BE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Belize', 'BZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Benin', 'BJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Bermuda', 'BM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Bhutan', 'BT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Bolivia (Plurinational State of)', 'BO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Bonaire, Sint Eustatius and Saba', 'BQ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Bosnia and Herzegovina', 'BA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Botswana', 'BW', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Bouvet Island', 'BV', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Brazil', 'BR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'British Indian Ocean Territory', 'IO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Brunei Darussalam', 'BN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Bulgaria', 'BG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Burkina Faso', 'BF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Burundi', 'BI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Cabo Verde', 'CV', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'Cambodia', 'KH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'Cameroon', 'CM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'Canada', 'CA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'Cayman Islands', 'KY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'Central African Republic', 'CF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'Chad', 'TD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'Chile', 'CL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'China', 'CN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'Christmas Island', 'CX', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'Cocos (Keeling) Islands', 'CC', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'Colombia', 'CO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'Comoros', 'KM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'Congo', 'CG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'Congo (Democratic Republic of the)', 'CD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'Cook Islands', 'CK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'Costa Rica', 'CR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'Côte d\'Ivoire', 'CI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'Croatia', 'HR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'Cuba', 'CU', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'Curaçao', 'CW', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'Cyprus', 'CY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'Czech Republic', 'CZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'Denmark', 'DK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'Djibouti', 'DJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'Dominica', 'DM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'Dominican Republic', 'DO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'Ecuador', 'EC', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'Egypt', 'EG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'El Salvador', 'SV', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'Equatorial Guinea', 'GQ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'Eritrea', 'ER', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'Estonia', 'EE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'Ethiopia', 'ET', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'Falkland Islands (Malvinas)', 'FK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'Faroe Islands', 'FO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'Fiji', 'FJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'Finland', 'FI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'France', 'FR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'French Guiana', 'GF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'French Polynesia', 'PF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'French Southern Territories', 'TF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'Gabon', 'GA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'Gambia', 'GM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'Georgia', 'GE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'Germany', 'DE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'Ghana', 'GH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'Gibraltar', 'GI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'Greece', 'GR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'Greenland', 'GL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'Grenada', 'GD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'Guadeloupe', 'GP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'Guam', 'GU', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'Guatemala', 'GT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'Guernsey', 'GG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'Guinea', 'GN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'Guinea-Bissau', 'GW', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'Guyana', 'GY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'Haiti', 'HT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'Heard Island and McDonald Islands', 'HM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'Holy See', 'VA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'Honduras', 'HN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'Hong Kong', 'HK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'Hungary', 'HU', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'Iceland', 'IS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'India', 'IN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'Indonesia', 'ID', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'Iran (Islamic Republic of)', 'IR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'Iraq', 'IQ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'Ireland', 'IE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'Isle of Man', 'IM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'Israel', 'IL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'Italy', 'IT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'Jamaica', 'JM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'Japan', 'JP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'Jersey', 'JE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'Jordan', 'JO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'Kazakhstan', 'KZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'Kenya', 'KE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'Kiribati', 'KI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'Korea (Democratic People\'s Republic of)', 'KP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'Korea (Republic of)', 'KR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'Kuwait', 'KW', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'Kyrgyzstan', 'KG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 'Lao People\'s Democratic Republic', 'LA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'Latvia', 'LV', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'Lebanon', 'LB', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'Lesotho', 'LS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 'Liberia', 'LR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'Libya', 'LY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'Liechtenstein', 'LI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'Lithuania', 'LT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 'Luxembourg', 'LU', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 'Macao', 'MO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'Macedonia (the former Yugoslav Republic of)', 'MK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'Madagascar', 'MG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'Malawi', 'MW', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 'Malaysia', 'MY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'Maldives', 'MV', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'Mali', 'ML', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'Malta', 'MT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'Marshall Islands', 'MH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'Martinique', 'MQ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'Mauritania', 'MR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'Mauritius', 'MU', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'Mayotte', 'YT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'Mexico', 'MX', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'Micronesia (Federated States of)', 'FM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'Moldova (Republic of)', 'MD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'Monaco', 'MC', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'Mongolia', 'MN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'Montenegro', 'ME', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'Montserrat', 'MS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'Morocco', 'MA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'Mozambique', 'MZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 'Myanmar', 'MM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 'Namibia', 'NA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 'Nauru', 'NR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 'Nepal', 'NP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 'Netherlands', 'NL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 'New Caledonia', 'NC', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 'New Zealand', 'NZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 'Nicaragua', 'NI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 'Niger', 'NE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 'Nigeria', 'NG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 'Niue', 'NU', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 'Norfolk Island', 'NF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 'Northern Mariana Islands', 'MP', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 'Norway', 'NO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 'Oman', 'OM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 'Pakistan', 'PK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 'Palau', 'PW', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 'Palestine, State of', 'PS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 'Panama', 'PA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 'Papua New Guinea', 'PG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 'Paraguay', 'PY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 'Peru', 'PE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 'Philippines', 'PH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 'Pitcairn', 'PN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 'Poland', 'PL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 'Portugal', 'PT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 'Puerto Rico', 'PR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 'Qatar', 'QA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 'Réunion', 'RE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 'Romania', 'RO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 'Russian Federation', 'RU', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 'Rwanda', 'RW', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 'Saint Barthélemy', 'BL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 'Saint Helena, Ascension and Tristan da Cunha', 'SH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 'Saint Kitts and Nevis', 'KN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 'Saint Lucia', 'LC', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 'Saint Martin (French part)', 'MF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 'Saint Pierre and Miquelon', 'PM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 'Saint Vincent and the Grenadines', 'VC', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 'Samoa', 'WS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 'San Marino', 'SM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 'Sao Tome and Principe', 'ST', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 'Saudi Arabia', 'SA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 'Senegal', 'SN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 'Serbia', 'RS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 'Seychelles', 'SC', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 'Sierra Leone', 'SL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 'Singapore', 'SG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 'Sint Maarten (Dutch part)', 'SX', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 'Slovakia', 'SK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 'Slovenia', 'SI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 'Solomon Islands', 'SB', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 'Somalia', 'SO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 'South Africa', 'ZA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 'South Georgia and the South Sandwich Islands', 'GS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 'South Sudan', 'SS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 'Spain', 'ES', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 'Sri Lanka', 'LK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 'Sudan', 'SD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 'Suriname', 'SR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 'Svalbard and Jan Mayen', 'SJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 'Swaziland', 'SZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 'Sweden', 'SE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 'Switzerland', 'CH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 'Syrian Arab Republic', 'SY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 'Taiwan, Province of China', 'TW', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 'Tajikistan', 'TJ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 'Tanzania, United Republic of', 'TZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 'Thailand', 'TH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 'Timor-Leste', 'TL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 'Togo', 'TG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 'Tokelau', 'TK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 'Tonga', 'TO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 'Trinidad and Tobago', 'TT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 'Tunisia', 'TN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 'Turkey', 'TR', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 'Turkmenistan', 'TM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 'Turks and Caicos Islands', 'TC', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 'Tuvalu', 'TV', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 'Uganda', 'UG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 'Ukraine', 'UA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 'United Arab Emirates', 'AE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 'United Kingdom of Great Britain and Northern Ireland', 'GB', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 'United States Minor Outlying Islands', 'UM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 'United States of America', 'US', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 'Uruguay', 'UY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 'Uzbekistan', 'UZ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 'Vanuatu', 'VU', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 'Venezuela (Bolivarian Republic of)', 'VE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 'Viet Nam', 'VN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 'Virgin Islands (British)', 'VG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 'Virgin Islands (U.S.)', 'VI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 'Wallis and Futuna', 'WF', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 'Western Sahara', 'EH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 'Yemen', 'YE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 'Zambia', 'ZM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 'Zimbabwe', 'ZW', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `custom_pages`
--

CREATE TABLE `custom_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_pages`
--

INSERT INTO `custom_pages` (`id`, `page_name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Custom Page One', 'custom-page-one', '<p><strong>1. What is custom page?</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriefss asbut also the on leap into a electironc typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andeiss more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>2. How does work custom page</strong></p>\r\n<p>While it&rsquo;s not legally required for ecommerce websites to have a terms and conditions agreement, adding one will help protect your as sonline business.As terms and conditions are legally enforceable rules, they allow you to set standards for how users interact with your site. Here are some of the major abenefits of including terms and conditions on your ecommerce site:</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the obb1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop.</p>\r\n<p><strong>Features :</strong></p>\r\n<ul>\r\n<li>Slim body with metal cover</li>\r\n<li>Latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</li>\r\n</ul>\r\n<p><strong>3. Protect Your Property</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>4. What to Include in Terms and Conditions for Online Stores</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas&nbsp; Ipsum to make a type specimen book.</p>\r\n<p><strong>05.Pricing and Payment Terms</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>', 1, '2022-09-29 04:30:53', '2023-06-26 08:00:28'),
(2, 'Custom Page Two', 'custom-page-two', '<p><strong>1. What is custom page?</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriefss asbut also the on leap into a electironc typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andeiss more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>2. How does work custom page</strong></p>\r\n<p>While it&rsquo;s not legally required for ecommerce websites to have a terms and conditions agreement, adding one will help protect your as sonline business.As terms and conditions are legally enforceable rules, they allow you to set standards for how users interact with your site. Here are some of the major abenefits of including terms and conditions on your ecommerce site:</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the obb1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop.</p>\r\n<p><strong>Features :</strong></p>\r\n<ul>\r\n<li>Slim body with metal cover</li>\r\n<li>Latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</li>\r\n</ul>\r\n<p><strong>3. Protect Your Property</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>4. What to Include in Terms and Conditions for Online Stores</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas&nbsp; Ipsum to make a type specimen book.</p>\r\n<p><strong>05.Pricing and Payment Terms</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>', 1, '2022-09-29 06:17:38', '2023-06-26 08:00:29');

-- --------------------------------------------------------

--
-- Table structure for table `custom_paginations`
--

CREATE TABLE `custom_paginations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_paginations`
--

INSERT INTO `custom_paginations` (`id`, `page_name`, `qty`, `created_at`, `updated_at`) VALUES
(1, 'Blog Page', 8, NULL, '2023-07-29 08:08:21'),
(4, 'Blog Comment', 4, NULL, '2022-09-15 03:06:58'),
(6, 'Product Page', 6, NULL, '2023-06-12 05:12:35'),
(7, 'Product Comment', 10, '2023-06-12 09:44:44', '2023-08-05 05:23:28'),
(8, 'Product Review', 10, '2023-06-12 09:44:44', '2023-08-05 05:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `email_configurations`
--

CREATE TABLE `email_configurations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_type` tinyint(4) DEFAULT NULL,
  `mail_host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_encryption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_configurations`
--

INSERT INTO `email_configurations` (`id`, `mail_type`, `mail_host`, `mail_port`, `email`, `email_password`, `smtp_username`, `smtp_password`, `mail_encryption`, `created_at`, `updated_at`) VALUES
(1, 2, 'sandbox.smtp.mailtrap.io', '587', 'riponchandra667@gmail.com', 'mary+pass@', '0a637ee7f5df06', 'f145f6825f44f1', 'tls', NULL, '2023-04-05 04:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `subject`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Password Reset', 'Password Reset', '<h4>Dear <b>{{name}}</b>,</h4>\r\n    <p>Do you want to reset your password? Please Click the following link and Reset Your Password.</p>', NULL, '2021-12-09 10:06:57'),
(2, 'Contact Email', 'Contact Email', '<p>Name: <b>{{name}}</b></p><p>\r\n\r\nEmail: <b>{{email}}</b></p><p>\r\n\r\nPhone: <b>{{phone}}</b></p><p><span style=\"background-color: transparent;\">Subject: <b>{{subject}}</b></span></p><p>\r\n\r\nMessage: <b>{{message}}</b></p>', NULL, '2021-12-10 23:44:34'),
(3, 'Subscribe Notification', 'Subscribe Notification', '<h2><b>Hi there</b>,</h2><p>\r\nCongratulations! Your Subscription has been created successfully. Please Click the following link and Verified Your Subscription. If you won\'t approve this link, after 24hourse your subscription will be denay</p>', NULL, '2021-12-10 23:44:53'),
(4, 'User Verification', 'User Verification', '<p>Dear <b>{{user_name}}</b>,\r\n</p><p>Congratulations! Your Account has been created successfully. Please Click the following link and Active your Account.</p>', NULL, '2021-12-10 23:45:25'),
(5, 'Seller Withdraw', 'Seller Withdraw Approval', '<p>Hi <strong>{{seller_name}}</strong>,</p>\r\n<p>Your withdraw Request Approval successfully. Please check your account.</p>\r\n<p>Withdraw method : <strong>{{withdraw_method}}</strong>,</p>\r\n<p>Total Amount :<strong> {{total_amount}}</strong>,</p>\r\n<p>Withdraw charge : <strong>{{withdraw_charge}}</strong>,</p>\r\n<p>Withdraw&nbsp; Amount : <strong>{{withdraw_amount}}</strong>,</p>\r\n<p>Approval Date :<strong> {{approval_date}}</strong></p>', NULL, '2023-06-11 03:54:26'),
(6, 'Order Successfully', 'Order Successfully', '<p>Hi {{user_name}},</p><p> \r\nThanks for your new order. Your order id has been submited .</p><p>Total Amount : {{total_amount}},</p><p>Payment Method : {{payment_method}},</p><p>Payment Status : {{payment_status}},</p><p>Order Status : {{order_status}},</p><p>Order Date: {{order_date}},</p><p>Order Detail: {{order_detail}}</p>', NULL, '2022-01-10 21:37:03'),
(8, 'New Order Mail to Client', 'New Order Mail to Client', '<p>Hi&nbsp;{{name}}, Thanks for your new order. Your order has been placed.</p>\r\n<p>Order Id : {{order_id}}</p>\r\n<p>Amount : {{amount}}</p>', NULL, '2023-06-05 11:49:52'),
(9, 'New Order Mail to Provider', 'New Order Mail to Provider', '<p>Hi&nbsp;{{name}}, A new order has been placed to you .</p>\r\n<p>Order Id : {{order_id}}</p>\r\n<p>Amount : {{amount}}</p>', NULL, '2023-06-05 11:51:00'),
(10, 'User Verification For OTP', 'User Verification', '<p>Dear <b>{{user_name}}</b>,\r\n</p><p>Congratulations! Your Account has been created successfully. Please Copy the code and verify your account</p>', NULL, '2021-12-10 23:45:25'),
(11, 'Password Reset For OTP', 'Password Reset', '<h4>Dear <b>{{name}}</b>,</h4>\n    <p>Do you want to reset your password? Please copy and past the code</p>', NULL, '2021-12-09 10:06:57'),
(12, 'Contact Author', 'Contact Author', '<h4>Dear Sir,</h4>\r\n<p>A new message for you from the user</p>\r\n<h4><strong>{{message}}</strong></h4>', '2023-06-06 04:48:36', '2023-06-06 05:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `error_pages`
--

CREATE TABLE `error_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `error_pages`
--

INSERT INTO `error_pages` (`id`, `image`, `title`, `button_text`, `created_at`, `updated_at`) VALUES
(1, 'uploads/website-images/error-page--2023-07-30-12-02-17-2691.png', 'Sorry, Page Not Found', 'Back To Home', NULL, '2023-07-30 06:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `facebook_comments`
--

CREATE TABLE `facebook_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment_type` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facebook_comments`
--

INSERT INTO `facebook_comments` (`id`, `app_id`, `comment_type`, `created_at`, `updated_at`) VALUES
(1, '882238482112522', 1, NULL, '2022-10-08 07:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `facebook_pixels`
--

CREATE TABLE `facebook_pixels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facebook_pixels`
--

INSERT INTO `facebook_pixels` (`id`, `status`, `app_id`, `created_at`, `updated_at`) VALUES
(1, 1, '972911606915059', NULL, '2021-12-13 22:38:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'How long will I get the service support?', '<p>At the end of the service session, are you puzzled? Okay, you may pay a little amount to renew support at any moment. In the vast majority of circumstances, it is not necessary. We like assisting our customers.</p>', 1, '2023-06-26 07:03:52', '2023-06-26 07:03:52'),
(2, 'What is the refund policy detail?', '<p>Because you are using the best digital product and service, most of the time &nbsp; refunds will not be necessary, and because no returns will be given for digital items unless the product you bought is probably unnecessary, and you submitted a support request but had no response within one business day, and the product\'s primary statement was completely false. For additional information, please see our Refund Policy.</p>', 1, '2023-06-26 07:05:08', '2023-06-26 07:05:08'),
(3, 'Can I avail the maintenance support for my clients?', '<p>Yes, you may design websites for your clients using our services, including scripting and themes. We like providing attractive and practical design ideas for clients.</p>', 1, '2023-06-26 07:05:56', '2023-06-26 07:05:56'),
(4, 'What do we assist?', '<p>WebSolutionUS is a group of talented application developers that create products for marketplaces like Codecanyon and Themeforest. WebSolutionUS also creates customized websites, software, and applications for a variety of clients and businesses all around the world. WebSolutionUS offers exceptional assistance to ensure a successful business platform. We are envato marketplace approved and provide direct sales also.</p>', 1, '2023-06-26 07:06:29', '2023-06-26 07:06:29'),
(5, 'Can I test your product before purchase?', '<p>We currently do not offer this service, but soon we will start this service.</p>', 1, '2023-06-26 07:07:13', '2023-06-26 07:07:13'),
(6, 'Do you provide customization service?', '<p>Yes, we provide the customization service for a small amount of fee. But it depends. If we become busy with projects, we do not take any custom orders.&nbsp;</p>', 1, '2023-06-26 07:07:48', '2023-06-26 07:07:48'),
(7, 'Will I get the complete source code?', '<p>Yes, our source codes are open. If you purchase our product, you will get the complete source code.&nbsp;</p>', 1, '2023-06-26 07:08:52', '2023-06-26 07:08:52'),
(8, 'Do you have an affiliate program?', '<p>We are currently working on our affiliate program setup. Soon it will be released to the public.&nbsp;</p>', 1, '2023-06-26 07:09:37', '2023-06-26 07:09:37'),
(9, 'What does WebSolutionUs do?', '<p>WebSolutionUs provides the best web solutions (web design, web development, search engine optimization, etc.) for international clients.</p>', 1, '2023-06-26 07:10:18', '2023-06-26 07:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `flutterwaves`
--

CREATE TABLE `flutterwaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `public_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_rate` double NOT NULL DEFAULT 1,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flutterwaves`
--

INSERT INTO `flutterwaves` (`id`, `public_key`, `secret_key`, `currency_rate`, `country_code`, `currency_code`, `title`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'FLWPUBK_TEST-5760e3ff9888aa1ab5e5cd1ec3f99cb1-X', 'FLWSECK_TEST-81cb5da016d0a51f7329d4a8057e766d-X', 417.35, 'NG', 'NGN', 'Ecommerce', 'uploads/website-images/flutterwave-2023-05-11-05-34-35-1898.png', 1, NULL, '2023-05-11 11:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_column` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_column` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `third_column` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `community` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `community_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `first_column`, `second_column`, `third_column`, `copyright`, `payment_image`, `community`, `community_link`, `created_at`, `updated_at`) VALUES
(1, 'Support', 'Quick Link', 'Important Link', '©2023 Quomodosoft All rights reserved', 'uploads/website-images/payment-card-2023-08-08-06-01-42-2963.png', 'Check Community here', 'https://websolutionus.com/', NULL, '2023-08-08 12:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `footer_links`
--

CREATE TABLE `footer_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `column` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_social_links`
--

CREATE TABLE `footer_social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_social_links`
--

INSERT INTO `footer_social_links` (`id`, `link`, `text`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'https://web.facebook.com/', 'Facebook', 'fab fa-facebook-square', '2023-06-26 09:49:55', '2023-06-26 09:49:55'),
(2, 'https://twitter.com/', 'Twitter', 'fab fa-twitter-square', '2023-06-26 09:52:09', '2023-06-26 09:56:14'),
(3, 'https://www.linkedin.com/', 'Linkdin', 'fab fa-linkedin', '2023-06-26 09:52:45', '2023-06-26 09:57:40'),
(4, 'https://pinterest.com/', 'Pinterest', 'fab fa-pinterest', '2023-06-26 09:53:51', '2023-06-26 09:56:53'),
(5, 'https://www.behance.net/', 'Behance', 'fab fa-behance', '2023-08-08 11:39:12', '2023-08-08 11:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `google_analytics`
--

CREATE TABLE `google_analytics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `analytic_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `google_analytics`
--

INSERT INTO `google_analytics` (`id`, `analytic_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'UA-84213520-6', 1, NULL, '2021-12-10 22:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `google_recaptchas`
--

CREATE TABLE `google_recaptchas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `google_recaptchas`
--

INSERT INTO `google_recaptchas` (`id`, `site_key`, `secret_key`, `status`, `created_at`, `updated_at`) VALUES
(1, '6LcVO6cbAAAAAOzIEwPlU66nL1rxD4VAS38tjpBX', '6LcVO6cbAAAAALVNrpZfNRfd0Gy_9a_fJRLiMVUI', 1, NULL, '2022-09-25 11:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `homepages`
--

CREATE TABLE `homepages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `why_choose_title1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_title2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_item1_icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_item2_icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_item3_icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_item1_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_item2_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_item3_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_home2_background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_home3_item1_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_home3_item2_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_home3_item3_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_home3_item1_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_home3_item2_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_home3_item3_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_home3_item1_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_home3_item2_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `why_choose_home3_item3_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_title1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_title2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_home3_background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_home3_item1_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_home3_item1_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_home3_item1_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_home3_item2_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_home3_item2_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_home3_item2_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_offer_title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_offer_title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_offer_title3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_offer_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_offer_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trending_offer_title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trending_offer_title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trending_offer_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trending_offer_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter1_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter2_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter3_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter4_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter1_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter2_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter3_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter4_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter1_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter2_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter3_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_item1_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_item1_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_item1_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_item1_icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_item2_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_item2_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_item2_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_item2_icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_icon1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_icon2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_icon3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_icon4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_icon5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_icon6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_icon7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_icon8` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_home1_background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_home2_background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_home2_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_home2_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_title1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_title2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_title3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_home3_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_home3_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_play_store_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_apple_store_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_home1_foreground` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_home2_foreground` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_home3_foreground` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_home3_background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_home1_background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_home2_background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepages`
--

INSERT INTO `homepages` (`id`, `why_choose_title1`, `why_choose_title2`, `why_choose_item1_icon`, `why_choose_item2_icon`, `why_choose_item3_icon`, `why_choose_item1_title`, `why_choose_item2_title`, `why_choose_item3_title`, `why_choose_home2_background`, `why_choose_home3_item1_title`, `why_choose_home3_item2_desc`, `why_choose_home3_item3_title`, `why_choose_home3_item1_desc`, `why_choose_home3_item2_title`, `why_choose_home3_item3_desc`, `why_choose_home3_item1_icon`, `why_choose_home3_item2_icon`, `why_choose_home3_item3_icon`, `offer_title1`, `offer_title2`, `offer_home3_background`, `offer_link`, `offer_home3_item1_title`, `offer_home3_item1_description`, `offer_home3_item1_link`, `offer_home3_item2_title`, `offer_home3_item2_description`, `offer_home3_item2_link`, `about_offer_title1`, `about_offer_title2`, `about_offer_title3`, `about_offer_link`, `about_offer_background`, `trending_offer_title1`, `trending_offer_title2`, `trending_offer_link`, `trending_offer_image`, `counter1_value`, `counter2_value`, `counter3_value`, `counter4_value`, `counter1_title`, `counter2_title`, `counter3_title`, `counter4_title`, `counter1_description`, `counter2_description`, `counter3_description`, `counter_item1_title`, `counter_item1_description`, `counter_item1_link`, `counter_item1_icon`, `counter_item2_title`, `counter_item2_description`, `counter_item2_link`, `counter_item2_icon`, `counter_icon1`, `counter_icon2`, `counter_icon3`, `counter_icon4`, `counter_icon5`, `counter_icon6`, `counter_icon7`, `counter_icon8`, `counter_home1_background`, `counter_home2_background`, `app_home2_title`, `app_home2_desc`, `app_title1`, `app_title2`, `app_title3`, `app_description`, `app_home3_title`, `app_home3_desc`, `app_play_store_link`, `app_apple_store_link`, `app_home1_foreground`, `app_home2_foreground`, `app_home3_foreground`, `app_home3_background`, `app_home1_background`, `app_home2_background`, `created_at`, `updated_at`) VALUES
(1, 'Save time with pre-installed software.', 'Why Choose Alasmart', 'why-choose-us-2023-07-19-04-21-43-5814.png', 'why-choose-us-2023-07-19-04-21-43-3037.png', 'why-choose-us-2023-07-19-04-21-43-7385.png', '15 days Money Back guarantee', '24/7 live Support & Forum Share', 'Outstanding Simplicity', 'why-choose-us-2023-07-26-04-32-19-2706.jpg', '15 days Money Back', 'There are many variationts of passages Lorem Ipsum available, but the majorit have If you as going to use a passage of Lorem', 'Outstanding Simplicity', 'There are many variationts of passages Lorem Ipsum available, but the majorit have If you as going to use a passage of Lorem', 'Expert Team Member', 'There are many variationts of passages Lorem Ipsum available, but the majorit have If you as going to use a passage of Lorem', 'why-choose-us-2023-07-20-10-43-34-5099.png', 'why-choose-us-2023-07-20-10-43-34-6129.png', 'why-choose-us-2023-07-20-10-43-34-3738.png', 'Check our software', 'Megapack worth $565 for Only $39.', 'uploads/website-images/offer--2023-07-20-04-45-39-9609.jpg', 'https://websolutionus.com/', 'Speed up Business', 'Purchase one of our digital products from the biggest as software directory and boot strap find to the into in a your business our spending just bugs.', 'https://websolutionus.com/', 'Sell Your Goods Here', 'Purchase one of our digital products from the biggest as software directory and boot strap find to the into in a your business our spending just bugs.', 'https://websolutionus.com/', 'Get all products for only', '$59!', 'Lifetime update and 6 months support.', 'https://codecanyon.net/user/websolutionus', 'uploads/website-images/offer--2023-07-23-01-03-02-9914.jpg', 'Lifetime update support.', 'Get All Element For Only $59!', 'https://codecanyon.net/user/websolutionus', 'uploads/website-images/offer--2023-07-20-05-38-11-9548.jpg', '1252', '9892', '1520', '854', 'Total Items', 'Total Sale', 'Total Clients', 'Ratings', 'It is a long established fact that reader late by the reada.', 'It is a long established fact that reader late by the reada.', 'It is a long established fact that reader late by the reada.', 'Speed up Business', 'Purchase one of our digital products from the biggest software directory and boot strap find to the into in a your business spending just bugs.', 'fdsds', 'uploads/website-images/counter--2023-01-22-12-20-12-8534.png', 'Sell Your Goods Here', 'Our long history of ownership has provided find to ahe best inleiment evert to make it best quliss financial reassure,It has also firm continuity.', 'Item_one_link', 'uploads/website-images/counter--2023-01-22-12-24-21-4272.png', 'uploads/website-images/counter--2023-07-24-12-48-23-8902.png', 'uploads/website-images/counter--2023-07-24-12-48-23-4122.png', 'uploads/website-images/counter--2023-07-24-12-48-23-3592.png', 'uploads/website-images/counter--2023-07-24-12-48-23-3942.png', 'uploads/website-images/counter--2023-07-24-12-48-23-4428.jpg', 'uploads/website-images/counter--2023-07-24-12-48-23-4711.jpg', 'uploads/website-images/counter--2023-07-24-12-48-23-5806.jpg', 'uploads/website-images/counter--2023-07-24-12-48-23-3718.jpg', 'uploads/website-images/counter--2023-07-26-01-52-08-8577.jpg', 'uploads/website-images/counter--2023-07-26-01-55-40-1059.jpg', 'Get Our Mobile App It’s Make easy for your life !', 'Save time with preconfigured environments that alreadyinto into theon the find to find all the prerequisites installed for the news and as you make removes.', 'Get Our', 'Mobile App', 'It’s Make easy for your life !', 'Save time with preconfigured environments that alreadyinto into theon the find to find all the prerequisites installed for the news and as you make removes.', 'Get Our Mobile App It’s Make easy for your life !', 'Save time with preconfigured environments that alreadyinto into theon the find to find all the prerequisites installed for the news and as you make removes.', 'https://play.google.com/store/apps/?pli=1', 'https://www.apple.com/app-store/', 'uploads/website-images/mobile-app-bg--2023-07-24-04-46-30-9156.png', 'uploads/website-images/mobile-app-bg--2023-07-26-05-46-02-1426.png', 'uploads/website-images/mobile-app-bg--2023-07-20-11-09-21-2474.png', 'uploads/website-images/mobile-app-bg--2023-07-20-11-09-21-7133.jpg', 'uploads/website-images/mobile-app-bg--2023-07-19-04-31-29-5954.jpg', 'uploads/website-images/mobile-app-bg--2023-07-26-05-46-01-1323.jpg', NULL, '2023-07-27 10:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `instamojo_payments`
--

CREATE TABLE `instamojo_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `api_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `account_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Sandbox',
  `status` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instamojo_payments`
--

INSERT INTO `instamojo_payments` (`id`, `api_key`, `auth_token`, `currency_rate`, `account_mode`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'test_5f4a2c9a58ef216f8a1a688910f', 'test_994252ada69ce7b3d282b9941c2', '74.66', 'Sandbox', 1, 'uploads/website-images/instamojo-2023-05-11-05-36-17-4376.png', NULL, '2023-05-11 11:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `maintainance_texts`
--

CREATE TABLE `maintainance_texts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintainance_texts`
--

INSERT INTO `maintainance_texts` (`id`, `status`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 'uploads/website-images/maintainance-mode-2022-08-31-09-12-11-5142.png', 'We are upgrading our site.  We will come back soon.  \r\nPlease stay with us. \r\nThank you.', NULL, '2023-01-14 06:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_read_msg` int(11) NOT NULL DEFAULT 0,
  `seller_read_msg` int(11) NOT NULL,
  `send_customer` int(11) NOT NULL DEFAULT 0,
  `send_seller` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_documents`
--

CREATE TABLE `message_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_message_id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_30_035230_create_admins_table', 2),
(6, '2021_11_30_065435_create_email_configurations_table', 3),
(7, '2021_11_30_065508_create_email_templates_table', 3),
(8, '2021_12_01_035206_create_categories_table', 4),
(19, '2021_12_06_054423_create_about_us_table', 10),
(20, '2021_12_06_055028_create_custom_pages_table', 10),
(21, '2021_12_07_030532_create_terms_and_conditions_table', 11),
(22, '2021_12_07_035810_create_blog_categories_table', 12),
(23, '2021_12_07_035822_create_blogs_table', 12),
(24, '2021_12_07_040749_create_popular_posts_table', 12),
(25, '2021_12_07_061613_create_blog_comments_table', 13),
(30, '2021_12_09_095158_create_contact_messages_table', 16),
(31, '2021_12_09_095220_create_subscribers_table', 16),
(32, '2021_12_09_124226_create_settings_table', 17),
(33, '2021_12_11_022207_create_cookie_consents_table', 18),
(34, '2021_12_11_025358_create_google_recaptchas_table', 19),
(35, '2021_12_11_025449_create_facebook_comments_table', 19),
(37, '2021_12_11_025618_create_google_analytics_table', 19),
(38, '2021_12_11_025712_create_custom_paginations_table', 19),
(39, '2021_12_11_083503_create_faqs_table', 20),
(40, '2021_12_11_094707_create_currencies_table', 21),
(43, '2021_12_13_101056_create_error_pages_table', 23),
(44, '2021_12_13_102725_create_maintainance_texts_table', 24),
(45, '2021_12_13_110144_create_subscribe_modals_table', 25),
(47, '2021_12_13_132626_create_countries_table', 27),
(48, '2021_12_13_132909_create_country_states_table', 27),
(49, '2021_12_13_132935_create_cities_table', 27),
(50, '2021_12_14_032937_create_social_login_information_table', 28),
(51, '2021_12_14_042928_create_facebook_pixels_table', 29),
(52, '2021_12_14_054908_create_paypal_payments_table', 30),
(53, '2021_12_14_054922_create_stripe_payments_table', 30),
(54, '2021_12_14_054939_create_razorpay_payments_table', 30),
(55, '2021_12_14_055252_create_bank_payments_table', 30),
(62, '2021_12_22_034106_create_banner_images_table', 35),
(63, '2021_12_22_044839_create_sliders_table', 36),
(67, '2021_12_23_065722_create_paystack_and_mollies_table', 40),
(68, '2021_12_23_085225_create_withdraw_methods_table', 41),
(71, '2021_12_25_172918_create_seller_withdraws_table', 42),
(81, '2021_12_26_054841_create_orders_table', 45),
(88, '2021_12_28_192057_create_contact_pages_table', 47),
(89, '2021_12_28_200846_create_breadcrumb_images_table', 48),
(90, '2021_12_30_032959_create_flutterwaves_table', 49),
(91, '2021_12_30_034716_create_footers_table', 50),
(92, '2021_12_30_035201_create_footer_links_table', 50),
(93, '2021_12_30_035247_create_footer_social_links_table', 50),
(99, '2022_01_12_080218_create_seo_settings_table', 54),
(101, '2022_01_17_122016_create_instamojo_payments_table', 56),
(102, '2022_01_29_055523_create_messages_table', 57),
(103, '2022_01_29_122621_create_pusher_credentails_table', 58),
(104, '2022_08_28_070755_create_how_it_works_table', 59),
(105, '2022_08_29_072358_create_testimonials_table', 60),
(108, '2022_08_31_093322_create_additional_services_table', 62),
(113, '2022_09_05_111413_create_refund_requests_table', 64),
(114, '2022_09_06_054021_create_complete_requests_table', 65),
(115, '2022_09_06_064506_create_provider_client_reports_table', 66),
(118, '2022_09_06_101227_create_message_documents_table', 68),
(119, '2022_09_26_070233_create_section_contents_table', 69),
(120, '2022_09_26_083106_create_section_controls_table', 70),
(121, '2022_09_29_044208_create_provider_client_reports_table', 71),
(123, '2023_01_22_032814_create_homepages_table', 73),
(125, '2023_01_22_083735_create_our_teams_table', 74),
(126, '2023_01_22_090537_create_become_authors_table', 75),
(127, '2023_01_24_085621_create_products_table', 76),
(128, '2023_01_28_101709_create_product_variants_table', 77),
(129, '2023_04_06_041600_create_popular_tags_table', 78),
(130, '2023_04_13_101940_create_coupons_table', 79),
(131, '2023_04_16_050758_create_order_items_table', 80),
(134, '2023_04_26_092807_create_product_comments_table', 81),
(135, '2023_05_08_082722_create_wishlishes_table', 82),
(137, '2023_05_08_090834_create_wishlists_table', 83),
(138, '2023_05_11_100656_create_sslcommerz_payments_table', 84),
(139, '2023_05_24_065207_create_ads_table', 85),
(140, '2023_06_06_064500_create_script_contents_table', 86),
(141, '2023_06_11_053201_create_product_type_pages_table', 87),
(142, '2023_06_11_061315_create_product_items_table', 88),
(143, '2021_12_11_025556_create_tawk_chats_table', 89),
(146, '2023_07_05_101606_create_product_discounts_table', 90),
(147, '2023_07_20_070218_create_templates_table', 91);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` double NOT NULL DEFAULT 0,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transection_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_rate` double DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_approval_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_qty` int(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `name`, `email`, `phone`, `total_amount`, `payment_method`, `payment_status`, `transection_id`, `currency_icon`, `country_code`, `currency_code`, `currency_rate`, `order_status`, `order_approval_date`, `order_date`, `order_month`, `order_year`, `cart_qty`, `created_at`, `updated_at`) VALUES
(1, 624492, 1, 'John doe', 'user@gmail.com', '22-402-666', 494, 'Stripe', 'success', 'txn_3NN8JqBsmz7k2BTD23d7lnYY', NULL, 'US', 'usd', 1, '1', NULL, '2023-06-26', '06', '2023', 6, '2023-06-26 05:50:41', '2023-06-26 05:50:41'),
(2, 747778, 2, 'Amaya Hendrix', 'user2@gmail.com', '123-874-8948', 788, 'Stripe', 'success', 'txn_3NN8bxBsmz7k2BTD3zTlb6Or', NULL, 'US', 'usd', 1, '1', NULL, '2023-06-26', '06', '2023', 7, '2023-06-26 06:09:18', '2023-06-26 06:09:18'),
(3, 182227, 3, 'Harding Rosa', 'user3@gmail.com', '123-874-8922', 463, 'Stripe', 'success', 'txn_3NN8oTBsmz7k2BTD38MZjfr7', NULL, 'US', 'usd', 1, '1', NULL, '2023-06-26', '06', '2023', 6, '2023-06-26 06:22:14', '2023-06-26 06:22:14'),
(4, 772686, 1, 'John doe', 'user@gmail.com', '22-402-666', 110, 'sslcommerz', 'pending', '64cf40bb0b21b', '$', 'US', 'USD', 1, '0', NULL, '0', '0', '0', 2, NULL, NULL),
(5, 677609, 1, 'John doe', 'user@gmail.com', '22-402-666', 110, 'sslcommerz', 'pending', '64cf4aa11bfe8', '$', 'US', 'USD', 1, '0', NULL, '0', '0', '0', 2, NULL, NULL),
(6, 464041, 1, 'John doe', 'user@gmail.com', '22-402-666', 110, 'sslcommerz', 'pending', '64cf4b639c62a', '$', 'US', 'USD', 1, '0', NULL, '0', '0', '0', 2, NULL, NULL),
(7, 898548, 1, 'John doe', 'user@gmail.com', '22-402-666', 39, 'sslcommerz', 'success', '64cf4c55afc71', '$', 'US', 'USD', 1, '1', NULL, '0', '0', '0', 1, NULL, NULL),
(8, 641317, 1, 'John doe', 'user@gmail.com', '22-402-666', 39, 'Stripe', 'success', 'txn_3Nc1TYBsmz7k2BTD14RtWyRx', NULL, 'US', 'usd', 1, '1', NULL, '2023-08-06', '08', '2023', 1, '2023-08-06 07:34:10', '2023-08-06 07:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `author_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variant_id` int(100) DEFAULT NULL,
  `variant_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `author_id`, `user_id`, `product_type`, `price_type`, `variant_id`, `variant_name`, `price`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 16, 2, 1, 'video', NULL, 41, 'MP4 - 720p', 61, '1', '2023-06-26 05:50:41', '2023-06-26 05:50:41'),
(2, 1, 14, 2, 1, 'image', NULL, 37, 'Large : 1920x2540', 100, '1', '2023-06-26 05:50:41', '2023-06-26 05:50:41'),
(3, 1, 12, 2, 1, 'script', 'extend price', NULL, NULL, 100, '1', '2023-06-26 05:50:41', '2023-06-26 05:50:41'),
(4, 1, 11, 2, 1, 'script', 'extend price', NULL, NULL, 80, '1', '2023-06-26 05:50:41', '2023-06-26 05:50:41'),
(5, 1, 6, 3, 1, 'video', NULL, 14, 'Resulation: 1080p', 60, '1', '2023-06-26 05:50:41', '2023-06-26 05:50:41'),
(6, 1, 2, 3, 1, 'script', 'extend price', NULL, NULL, 93, '1', '2023-06-26 05:50:41', '2023-06-26 05:50:41'),
(7, 2, 24, 1, 2, 'script', 'extend price', NULL, NULL, 177, '1', '2023-06-26 06:09:18', '2023-06-26 06:09:18'),
(8, 2, 18, 1, 2, 'audio', NULL, 45, '30 Audio Song', 30, '1', '2023-06-26 06:09:18', '2023-06-26 06:09:18'),
(9, 2, 23, 1, 2, 'script', 'extend price', NULL, NULL, 90, '1', '2023-06-26 06:09:18', '2023-06-26 06:09:18'),
(10, 2, 21, 1, 2, 'script', 'extend price', NULL, NULL, 171, '1', '2023-06-26 06:09:18', '2023-06-26 06:09:18'),
(11, 2, 20, 1, 2, 'script', 'regular price', NULL, NULL, 100, '1', '2023-06-26 06:09:18', '2023-06-26 06:09:18'),
(12, 2, 19, 1, 2, 'script', 'extend price', NULL, NULL, 120, '1', '2023-06-26 06:09:18', '2023-06-26 06:09:18'),
(13, 2, 22, 1, 2, 'script', 'extend price', NULL, NULL, 100, '1', '2023-06-26 06:09:18', '2023-06-26 06:09:18'),
(14, 3, 18, 1, 3, 'audio', NULL, 45, '30 Audio Song', 30, '1', '2023-06-26 06:22:14', '2023-06-26 06:22:14'),
(15, 3, 24, 1, 3, 'script', 'extend price', NULL, NULL, 177, '1', '2023-06-26 06:22:14', '2023-06-26 06:22:14'),
(16, 3, 23, 1, 3, 'script', 'extend price', NULL, NULL, 90, '1', '2023-06-26 06:22:14', '2023-06-26 06:22:14'),
(17, 3, 22, 1, 3, 'script', 'regular price', NULL, NULL, 70, '1', '2023-06-26 06:22:14', '2023-06-26 06:22:14'),
(18, 3, 16, 2, 3, 'video', NULL, 41, 'MP4 - 720p', 61, '1', '2023-06-26 06:22:14', '2023-06-26 06:22:14'),
(19, 3, 15, 2, 3, 'video', NULL, 39, 'MP4 - 720p', 35, '1', '2023-06-26 06:22:14', '2023-06-26 06:22:14'),
(20, 8, 5, 3, 1, 'video', NULL, 28, 'Resolution MP4 - 360p', 39, '1', '2023-08-06 07:34:10', '2023-08-06 07:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `our_teams`
--

CREATE TABLE `our_teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_teams`
--

INSERT INTO `our_teams` (`id`, `name`, `designation`, `image`, `facebook`, `twitter`, `linkedin`, `instagram`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Abdur Rohman', 'CEO & Founder', 'uploads/custom-images/cameron-williamson20230719052807.jpg', 'https://web.facebook.com', 'https://twitter.com', 'https://linkedin.com', 'https://instagram.com', 1, '2023-06-26 10:31:54', '2023-07-19 11:31:00'),
(2, 'Shinzing Pang', 'Web Developer', 'uploads/custom-images/kristin-watson20230719052823.jpg', 'https://web.facebook.com', 'https://twitter.com', 'https://linkedin.com', 'https://instagram.com', 1, '2023-06-26 10:33:52', '2023-07-19 11:31:24'),
(3, 'Abu Siddik AK', 'UIUX Designer', 'uploads/custom-images/abu-siddik-ak20230719052922.jpg', 'https://web.facebook.com', 'https://twitter.com', 'https://linkedin.com', 'https://instagram.com', 1, '2023-06-26 10:36:05', '2023-07-19 11:29:22'),
(4, 'Ragantan Jhon', 'Wp Developer', 'uploads/custom-images/ragantan-jhon20230719053019.jpg', 'https://facebook.com', 'https://twitter.com', 'https://linkedin.com', 'https://instagram.com', 1, '2023-06-26 11:00:34', '2023-07-19 11:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `link`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'https://codecanyon.net/user/websolutionus', 'uploads/custom-images/-2023-07-26-09-28-37-8387.png', 1, '2023-06-26 10:24:11', '2023-07-26 03:28:38'),
(2, 'https://codecanyon.net/user/websolutionus', 'uploads/custom-images/-2023-07-26-09-28-51-6677.png', 1, '2023-06-26 10:24:25', '2023-07-26 03:28:51'),
(3, 'https://codecanyon.net/user/websolutionus', 'uploads/custom-images/-2023-07-26-09-29-04-8524.png', 1, '2023-06-26 10:24:59', '2023-07-26 03:29:04'),
(4, 'https://codecanyon.net/user/websolutionus', 'uploads/custom-images/-2023-07-26-09-29-17-1972.png', 1, '2023-06-26 10:25:13', '2023-07-26 03:29:17'),
(5, 'https://codecanyon.net/user/websolutionus', 'uploads/custom-images/-2023-07-26-09-29-31-3547.png', 1, '2023-06-26 10:25:27', '2023-07-26 03:29:31'),
(6, 'https://codecanyon.net/user/websolutionus', 'uploads/custom-images/-2023-07-26-09-29-43-3843.png', 1, '2023-06-26 10:25:44', '2023-07-26 03:29:43'),
(7, 'https://codecanyon.net/user/websolutionus', 'uploads/custom-images/-2023-07-26-09-29-56-3495.png', 1, '2023-06-26 10:25:59', '2023-07-26 03:29:56'),
(8, 'https://codecanyon.net/user/websolutionus', 'uploads/custom-images/our-partner-2023-07-26-09-30-14-3221.png', 1, '2023-07-26 03:30:14', '2023-07-26 03:30:14'),
(9, 'https://codecanyon.net/user/websolutionus', 'uploads/custom-images/our-partner-2023-07-26-09-32-00-1670.png', 1, '2023-07-26 03:32:00', '2023-07-26 03:32:00'),
(10, 'https://codecanyon.net/user/websolutionus', 'uploads/custom-images/our-partner-2023-07-26-09-32-16-9002.png', 1, '2023-07-26 03:32:16', '2023-07-26 03:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paypal_payments`
--

CREATE TABLE `paypal_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `account_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_rate` double NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paypal_payments`
--

INSERT INTO `paypal_payments` (`id`, `status`, `account_mode`, `client_id`, `secret_id`, `country_code`, `currency_code`, `currency_rate`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'sandbox', 'AWlV5x8Lhj9BRF8-TnawXtbNs-zt69mMVXME1BGJUIoDdrAYz8QIeeTBQp0sc2nIL9E529KJZys32Ipy', 'EEvn1J_oIC6alxb-FoF4t8buKwy4uEWHJ4_Jd_wolaSPRMzFHe6GrMrliZAtawDDuE-WKkCKpWGiz0Yn', 'US', 'USD', 1, 'uploads/website-images/paypal-2023-05-11-05-35-31-8176.png', NULL, '2023-05-11 11:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `paystack_and_mollies`
--

CREATE TABLE `paystack_and_mollies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mollie_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mollie_status` int(11) NOT NULL DEFAULT 0,
  `mollie_currency_rate` double NOT NULL DEFAULT 1,
  `paystack_public_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paystack_secret_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paystack_currency_rate` double NOT NULL DEFAULT 1,
  `paystack_status` int(11) NOT NULL DEFAULT 0,
  `mollie_country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mollie_currency_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paystack_country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paystack_currency_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mollie_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paystack_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paystack_and_mollies`
--

INSERT INTO `paystack_and_mollies` (`id`, `mollie_key`, `mollie_status`, `mollie_currency_rate`, `paystack_public_key`, `paystack_secret_key`, `paystack_currency_rate`, `paystack_status`, `mollie_country_code`, `mollie_currency_code`, `paystack_country_code`, `paystack_currency_code`, `mollie_image`, `paystack_image`, `created_at`, `updated_at`) VALUES
(1, 'test_4VDJypzqbsjjHpCJyx3vwjVuurqj3R', 1, 1.27, 'pk_test_057dfe5dee14eaf9c3b4573df1e3760c02c06e38', 'sk_test_77cb93329abbdc18104466e694c9f720a7d69c97', 417.35, 1, 'AS', 'CAD', 'NG', 'NGN', 'uploads/website-images/mollie-2023-05-11-05-36-00-2447.png', 'uploads/website-images/paystact-2023-05-11-05-36-37-1884.png', NULL, '2023-05-11 11:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `popular_posts`
--

CREATE TABLE `popular_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `popular_posts`
--

INSERT INTO `popular_posts` (`id`, `blog_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 1, '2023-06-26 04:48:30', '2023-06-26 04:48:30'),
(4, 2, 1, '2023-06-26 04:48:39', '2023-06-26 04:48:39'),
(5, 3, 1, '2023-06-26 04:48:49', '2023-06-26 04:48:49'),
(6, 9, 1, '2023-06-26 04:48:57', '2023-06-26 04:48:57');

-- --------------------------------------------------------

--
-- Table structure for table `popular_tags`
--

CREATE TABLE `popular_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `popular_tags`
--

INSERT INTO `popular_tags` (`id`, `tag_name`, `created_at`, `updated_at`) VALUES
(1, 'Web Development', '2023-06-26 05:00:34', '2023-06-26 05:00:34'),
(2, 'Web Design', '2023-06-26 05:00:44', '2023-06-26 05:00:44'),
(3, 'Artificial Intelligence', '2023-06-26 05:06:51', '2023-06-26 05:06:51'),
(4, 'Apps Development', '2023-06-26 05:07:09', '2023-06-26 05:07:09'),
(5, 'Blockchain Technology', '2023-06-26 05:07:22', '2023-06-26 05:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` double DEFAULT NULL,
  `extend_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preview_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_file_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `release_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_update_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `used_technology` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `high_resolution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cross_browser` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documentation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `layout` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `approve_by_admin` int(1) NOT NULL DEFAULT 0,
  `popular_item` int(1) NOT NULL DEFAULT 0,
  `trending_item` int(1) NOT NULL DEFAULT 0,
  `featured_item` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `author_id`, `category_id`, `product_type`, `name`, `slug`, `regular_price`, `extend_price`, `preview_link`, `thumbnail_image`, `download_file`, `product_icon`, `download_file_type`, `download_link`, `description`, `release_date`, `last_update_date`, `used_technology`, `file_type`, `high_resolution`, `cross_browser`, `documentation`, `layout`, `file_size`, `tags`, `seo_title`, `seo_description`, `status`, `approve_by_admin`, `popular_item`, `trending_item`, `featured_item`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 'script', 'Digital Marketing Theme PHP-Laravel', 'digital-marketing-theme-phplaravel-', 20, '60', 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-40-15-4378.png', 'Script-2023-06-24-06-02-28-7871.zip', 'uploads/custom-images/product_icon-2023-06-25-06-40-15-7582.png', NULL, NULL, '<h3>Items Description Details</h3>\r\n<p>This is one of the best WordPress Theme. It is clean, user friendly, fully responsive, pixel perfect, modern design with latest WordPress Technologies. This WordPress theme is perfect for any kind of website. This WordPress Theme has the powerful theme control panel with lots of useful Addons and tools to manage the site: Elementor Page Builder, Custom Slider, Custom Icon Font, etc. With Lots of variation and demos I am sure you gonna love it and use it for your next Project.</p>\r\n<h3>Features:</h3>\r\n<p>This is one of the best WordPress Theme. It is clean, user friendly, fully responsive, pixel perfect, modern design with latest WordPress Technologies.</p>\r\n<ul>\r\n<li>Fully Responsive Bootstrap Based (3.x) Latest</li>\r\n<li>Clean, Modern &amp; Beautiful Design</li>\r\n<li>4 Unique Header Style</li>\r\n<li>Elementor Page Builder</li>\r\n<li>4 Footer Copyright Style</li>\r\n<li>100% Valid Code</li>\r\n<li>3000+ Font Icon</li>\r\n<li>One Click Demo Import</li>\r\n<li>Cookie Consent option</li>\r\n<li>Google Recaptcha option</li>\r\n<li>Google Analytic option</li>\r\n<li>Preloader on/off option</li>\r\n<li>Tawk Live Chat option</li>\r\n<li>Eye-catching design</li>\r\n<li>RTL support</li>\r\n<li>Language change option</li>\r\n<li>Strong security of codes</li>\r\n</ul>\r\n<h3>File Included: &nbsp;</h3>\r\n<p>This is one of the best WordPress Theme. It is clean, user friendly, fully responsive, pixel perfect, modern design with latest WordPress Technologies.</p>\r\n<p>&nbsp;</p>', NULL, NULL, NULL, NULL, '0', '1', '1', '1', NULL, 'Digital,Marketing,Laravel,PHP Script', 'Digital Marketing Theme PHP-Laravel', 'Digital Marketing Theme PHP-Laravel', 1, 0, 1, 1, 0, '2023-06-24 12:02:28', '2023-06-26 05:44:53'),
(2, 3, 3, 'script', 'EcoShop - Multivendor eCommerce Flutter Seller App', 'ecoshop-multivendor-ecommerce-flutter-seller-app', 19, '93', 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-39-24-2327.png', 'Script-2023-06-24-06-36-17-1946.zip', 'uploads/custom-images/product_icon-2023-06-25-06-39-24-2715.png', NULL, NULL, '<h3>EcoShop &ndash; Multivendor eCommerce Flutter Seller App</h3>\r\n<p>EcoShop &ndash; Multivendor eCommerce Flutter Seller App new Flutter-based multi vendor app for our eCommerce platform! Designed specifically for sellers, this app offers a streamlined and user-friendly interface that makes it easy for vendors to manage their online store on the go. With this app, sellers can add and manage products, track orders, view analytics and insights, and communicate with customers directly from their mobile devices.</p>\r\n<p>EcoShop &ndash; Multivendor eCommerce Flutter Seller App is designed to simplify the process of managing a store, with features like real-time order tracking, inventory management, and a user-friendly dashboard that lets vendors keep track of their sales and revenue. With this app, sellers can easily manage their online store, respond to customer inquiries, and track their performance in real-time, all from the convenience of their mobile device. Whether you&rsquo;re a new seller just starting out or an experienced vendor looking to streamline your operations, our multivendor app is the perfect solution for managing your online store on the go.</p>\r\n<h3>EcoShop &ndash; Multivendor eCommerce Flutter Seller App Features:</h3>\r\n<ul>\r\n<li>35+ High Quality Screens</li>\r\n<li>Modern Design</li>\r\n<li>Completely Customizable</li>\r\n<li>Clean Code and a well-structured project</li>\r\n<li>Cross Platform Compatible</li>\r\n<li>For Android and IOS</li>\r\n<li>60 FPS Support for both Android &amp; iOS</li>\r\n<li>Fully responsive UI</li>\r\n<li>Smooth Transition</li>\r\n<li>&nbsp;Easy to integrate into your project</li>\r\n<li>Well Documented</li>\r\n<li>Dedicated Support</li>\r\n</ul>\r\n<h3>EcoShop &ndash; Laravel Multivendor eCommerce System SELLER FEATURES:</h3>\r\n<ul>\r\n<li>Manage shop profile and user profile</li>\r\n<li>Change password option</li>\r\n<li>Order log</li>\r\n<li>Product management</li>\r\n<li>Product variant management</li>\r\n<li>Product report log</li>\r\n<li>Product review log</li>\r\n<li>Manage withdraw request</li>\r\n<li>Withdraw log</li>\r\n<li>Real time chat system with customers</li>\r\n</ul>', NULL, NULL, NULL, NULL, '0', '1', '1', '1', NULL, 'EcoShop,Seller App,Multivendor eCommerce,Flutter,PHP,Laravel', 'EcoShop - Multivendor eCommerce Flutter Seller App', 'EcoShop - Multivendor eCommerce Flutter Seller App', 1, 0, 1, 1, 0, '2023-06-24 12:36:17', '2023-06-26 05:44:31'),
(3, 3, 1, 'image', 'Aabcserv - Multivendor On-Demand Service & Handyman Marketplace Flutter Seller App', 'aabcserv-multivendor-ondemand-service-handyman-marketplace-flutter-seller-app', 39, NULL, 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-38-48-5934.png', NULL, 'uploads/custom-images/product_icon-2023-06-25-06-38-48-4223.png', NULL, NULL, '<p>Aabcserv &ndash; Multivendor On-Demand Service &amp; Handyman Marketplace Flutter Seller App is the ultimate solution for sellers who want to take their on-demand service and handyman marketplace to the next level. This Flutter app is a powerful and user-friendly tool designed specifically for sellers who want to easily manage their business on the go. With Aabcserv &ndash; Multivendor On-Demand Service &amp; Handyman Marketplace Flutter Seller App, sellers can quickly and easily add new services, update existing ones, and manage their orders all from one convenient location. This powerful seller app is fully customizable, so you can easily tailor it to fit your specific needs.</p>\r\n<p>Aabcserv &ndash; Multivendor On-Demand Service &amp; Handyman Marketplace Flutter Seller App is built on the Flutter framework, which means it&rsquo;s fast, reliable, and easy to use. It features a modern and intuitive user interface that&rsquo;s designed to make managing your service marketplace as easy and straightforward as possible. Aabcserv &ndash; Multivendor On-Demand Service &amp; Handyman Marketplace Flutter Seller App is a multivendor app, which means that you can easily onboard multiple sellers onto your platform. This makes it the perfect solution for anyone who wants to create a thriving service marketplace with multiple vendors.</p>\r\n<h3>App Features:</h3>\r\n<ul>\r\n<li>35+ High Quality Screens</li>\r\n<li>Modern Design</li>\r\n<li>Completely Customizable</li>\r\n<li>Clean Code and a well-structured project</li>\r\n<li>Cross Platform Compatible</li>\r\n<li>Easy to integrate into your project</li>\r\n<li>Well Documented</li>\r\n<li>Dedicated Support</li>\r\n</ul>\r\n<h3>Aabcserv &ndash; Multivendor On-Demand Service &amp; Handyman Marketplace Flutter Seller App FEATURES:</h3>\r\n<ul>\r\n<li>Manage shop profile and user profile</li>\r\n<li>Change password option</li>\r\n<li>Order log</li>\r\n<li>Product management</li>\r\n<li>Product variant management</li>\r\n<li>Product report log</li>\r\n<li>Product review log</li>\r\n<li>Manage withdraw request</li>\r\n<li>Withdraw log</li>\r\n<li>Real time chat system with customers</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '0', '1', '0', NULL, 'Aabcserv,Service,Flutter,PHP,Laravel', 'Aabcserv - Multivendor On-Demand Service & Handyman Marketplace Flutter Seller App', 'Aabcserv - Multivendor On-Demand Service & Handyman Marketplace Flutter Seller App', 1, 0, 1, 1, 0, '2023-06-24 12:49:41', '2023-06-26 05:44:08'),
(4, 3, 1, 'image', 'FindEstate - Laravel Real Estate Listing CMS with SaaS', 'findestate-laravel-real-estate-listing-cms-with-saas', 69, NULL, 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-24-07-12-08-6308.png', NULL, 'uploads/custom-images/product_icon-2023-06-24-07-12-08-9807.png', NULL, NULL, '<p>FindEstate is a real estate management Laravel script. Here users or agents can publish their real estate listing based on some pricing plans and visitors can easily contact with the real estate agent to buy or sell properties.</p>\r\n<p>This is mainly a listing website to build connection between buyers and sellers; and you will get the SaaS version completely free in regular license.</p>\r\n<h3>Key Features</h3>\r\n<ul>\r\n<li>Laravel 8 is used as language</li>\r\n<li>Bootstrap 5.x is used in design</li>\r\n<li>User friendly codes and easy to navigate</li>\r\n<li>Eye-catching design</li>\r\n<li>Strong security of codes</li>\r\n<li>Search by expert name and category in the home page</li>\r\n<li>Service provider withdraw system</li>\r\n<li>RTL Support</li>\r\n<li>Language change option</li>\r\n</ul>\r\n<h3>Admin Features</h3>\r\n<ul>\r\n<li>SEO Settings for all pages</li>\r\n<li>Payment setting for PayPal and Stripe</li>\r\n<li>Email template setting</li>\r\n<li>Facebook or manual comment setup option for blog</li>\r\n<li>Cookie Consent option</li>\r\n<li>Google Recaptcha option</li>\r\n<li>Google Analytic option</li>\r\n<li>Preloader on/off option</li>\r\n<li>Tawk Live Chat option</li>\r\n</ul>\r\n<h3>Agent Features</h3>\r\n<ul>\r\n<li>Login, forget and reset password option</li>\r\n<li>Profile information, photo, password change option</li>\r\n<li>Create Listing , edit and delete</li>\r\n<li>Agent Dashboard</li>\r\n<li>Create and mange own listing</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '0', '1', '0', NULL, 'FindEstate,Real Estate,CMS,PHP,Laravel', 'FindEstate - Laravel Real Estate Listing CMS with SaaS', 'FindEstate - Laravel Real Estate Listing CMS with SaaS', 1, 0, 1, 1, 0, '2023-06-24 13:12:08', '2023-06-26 05:43:50'),
(5, 3, 2, 'video', 'DocPoint - Doctor Appointment System', 'docpoint-doctor-appointment-system', 39, NULL, 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-36-29-6439.png', NULL, 'uploads/custom-images/product_icon-2023-06-25-06-36-29-5946.png', NULL, NULL, '<p>DocPoint is a SAAS based doctor, chamber, staff, appointment, prescription and patient management system. In this system, a patient can free register and login and make an appointment. Admin can make unlimited subscription plan. After purchase any subscription plan, doctor can create his chamber, staff, schedule, appointment and prescription.</p>\r\n<p>This system was made using the popular Laravel php framework. Strong security was maintained during the development and there is no sql injection, xss attack, csrf attack possible.</p>\r\n<p>Key Features</p>\r\n<ul>\r\n<li>Laravel 8 is used as language</li>\r\n<li>Bootstrap 4.5 is used in design</li>\r\n<li>User friendly codes and easy to navigate</li>\r\n<li>Eye-catching and fully responsive design</li>\r\n<li>Strong security of codes</li>\r\n<li>Search doctor by location, department and doctor name</li>\r\n<li>Subscription verify with email</li>\r\n<li>Google analytics</li>\r\n<li>Facebook pixel</li>\r\n<li>Google reCaptcha</li>\r\n<li>Message system between doctor and patient</li>\r\n</ul>\r\n<h3>PAYMENT METHODS</h3>\r\n<ul>\r\n<li>Paypal</li>\r\n<li>Stripe</li>\r\n<li>Razorpay</li>\r\n<li>Flutterwave</li>\r\n<li>Mollie</li>\r\n<li>Paystack</li>\r\n<li>Instamojo</li>\r\n<li>Hand Cash</li>\r\n<li>Bank Payment</li>\r\n</ul>\r\n<h3>ADMIN FEATURES</h3>\r\n<ul>\r\n<li>100% secure admin panel</li>\r\n<li>Manage pricing package</li>\r\n<li>Manage order</li>\r\n<li>Manage Weekdays</li>\r\n<li>Manage Appointment</li>\r\n<li>Manage Medicine</li>\r\n<li>Manage Department</li>\r\n<li>Manage Location</li>\r\n<li>Payment method setup</li>\r\n<li>Manage Doctor, staff, chamber and review</li>\r\n<li>Manage Patient</li>\r\n<li>Admin management</li>\r\n</ul>\r\n<h3>Requirements:</h3>\r\n<ul>\r\n<li>PHP = 7.3.0</li>\r\n<li>BCMath PHP Extension</li>\r\n<li>Ctype PHP Extension</li>\r\n<li>Fileinfo PHP extension</li>\r\n<li>JSON PHP Extension</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '0', '1', '0', NULL, 'Docpoint,Doctor,Appointment System,Video,PHP', 'DocPoint - Doctor Appointment System', 'DocPoint - Doctor Appointment System', 1, 0, 1, 1, 0, '2023-06-24 13:26:26', '2023-06-26 05:43:30'),
(6, 3, 2, 'video', 'Full Stack Web Development With PHP-Laravel', 'full-stack-web-development-with-phplaravel', 40, NULL, 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-35-52-1254.png', NULL, 'uploads/custom-images/product_icon-2023-06-25-06-35-52-6369.png', NULL, NULL, '<p>Full stack web development with PHP-Laravel involves building dynamic and robust web applications that encompass both the front-end and back-end components. It leverages the PHP programming language and the Laravel framework to create scalable, secure, and feature-rich web solutions.&nbsp;</p>\r\n<p>The front-end development in PHP-Laravel typically involves utilizing HTML, CSS, and JavaScript to design and develop the user interface (UI) and user experience (UX) of the application. This includes creating responsive layouts, implementing interactive elements, and ensuring a visually appealing design. Laravel integrates seamlessly with front-end frameworks like Bootstrap and Vue.js, allowing for efficient development and enhanced UI capabilities.</p>\r\n<p>On the back-end, PHP is used as the primary programming language. Laravel, a powerful and widely adopted PHP framework, provides a comprehensive set of tools and features that simplify the development process. It follows the MVC (Model-View-Controller) architectural pattern, facilitating separation of concerns and maintaining code organization. Laravel offers features such as routing, database migration, authentication, and caching, which streamline development and enhance application performance.</p>\r\n<p>The full stack developer proficient in PHP-Laravel should be skilled in various technologies and concepts. This includes proficiency in PHP programming and object-oriented programming (OOP) principles. They should have a strong understanding of Laravel\'s architecture, routing, templating engine (Blade), and ORM (Object-Relational Mapping) capabilities using Eloquent.</p>\r\n<p>In addition, the developer should have experience in working with databases, particularly MySQL or PostgreSQL, as Laravel provides excellent support for these database management systems. They should be familiar with creating and optimizing database queries, designing schemas, and implementing data models.</p>\r\n<p>A full stack web developer using PHP-Laravel should also possess knowledge of front-end technologies such as HTML, CSS, and JavaScript. They should be adept at creating responsive and accessible user interfaces, leveraging CSS frameworks, and implementing client-side scripting for dynamic behavior.</p>\r\n<p>Furthermore, understanding version control systems like Git, deployment processes, and familiarity with Linux command line tools are essential for seamless collaboration and deployment of web applications.</p>\r\n<p>In summary, full stack web development with PHP-Laravel entails building end-to-end web solutions, involving front-end design and development using HTML, CSS, and JavaScript, and back-end implementation using PHP, Laravel framework, and database management. The developer should possess a comprehensive skill set to handle both front-end and back-end tasks effectively, ensuring the creation of robust and high-performing web applications.</p>\r\n<ul>\r\n<li>45+ High-Quality Screens</li>\r\n<li>Modern Design</li>\r\n<li>Completely Customizable</li>\r\n<li>Clean Code and a well-structured project</li>\r\n<li>Cross Platform Compatible</li>\r\n<li>For Android and IOS</li>\r\n<li>60 FPS Support for both Android &amp; iOS</li>\r\n<li>Fully responsive UI</li>\r\n<li>Smooth Transition</li>\r\n<li>Easy to integrate into your project</li>\r\n<li>Well Documented</li>\r\n<li>Dedicated Support</li>\r\n<li>Schedule wise booking system</li>\r\n<li>Booking Confirm Request to Admin</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, 'PHP-Video,Laravel,HTML,CSS,Javascript', 'Full Stack Web Development With PHP-Laravel', 'Full Stack Web Development With PHP-Laravel', 1, 0, 1, 1, 0, '2023-06-25 04:46:21', '2023-06-26 05:43:01'),
(7, 3, 4, 'audio', 'Audio playlist of beautiful songs', 'audio-playlist-of-beautiful-songs', 30, NULL, 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-35-12-2098.png', NULL, 'uploads/custom-images/product_icon-2023-06-25-06-35-12-1942.png', NULL, NULL, '<p>Embark on a mesmerizing audio adventure with our carefully curated playlist, \"Melodic Echoes.\" Immerse yourself in a captivating blend of musical genres, handpicked to evoke emotions, spark imagination, and transport you to new dimensions of auditory delight.</p>\r\n<p>From soul-stirring ballads to upbeat anthems, this playlist showcases a diverse selection of tracks that span genres such as pop, rock, R&amp;B, electronic, and more. Each song has been thoughtfully chosen to create a harmonious and seamless listening experience.</p>\r\n<p>Discover hidden gems from emerging artists and relish in the melodies of established favorites. Let the enchanting rhythms and captivating lyrics take you on a sonic journey, where every note resonates with your innermost emotions.</p>\r\n<p>Whether you\'re seeking inspiration during work or study sessions, setting the mood for a cozy evening, or simply looking to escape into a world of sound, \"Melodic Echoes\" is your perfect companion. It\'s a digital masterpiece that promises to elevate your audio experience and leave you craving for more.</p>\r\n<p>Experience the power of music with \"Melodic Echoes\" and let its captivating tunes become the soundtrack of your life. Immerse yourself in the beauty of sound and get ready to embark on an extraordinary musical voyage.</p>\r\n<p>Note: This product description can be adapted and customized based on the specific theme or genre of the audio playlist</p>\r\n<h3>An example of a 30-song audio playlist:</h3>\r\n<ul>\r\n<li>\"Shape of You\" by Ed Sheeran</li>\r\n<li>\"Bohemian Rhapsody\" by Queen</li>\r\n<li>\"Someone Like You\" by Adele</li>\r\n<li>\"Billie Jean\" by Michael Jackson</li>\r\n<li>\"Hotel California\" by Eagles</li>\r\n<li>\"Rolling in the Deep\" by Adele</li>\r\n<li>\"Imagine\" by John Lennon</li>\r\n<li>\"Sweet Child o\' Mine\" by Guns N\' Roses</li>\r\n<li>\"Uptown Funk\" by Mark Ronson ft. Bruno Mars</li>\r\n<li>\"Hey Jude\" by The Beatles</li>\r\n<li>\"Radioactive\" by Imagine Dragons</li>\r\n<li>\"Smells Like Teen Spirit\" by Nirvana</li>\r\n<li>\"Don\'t Stop Believin\'\" by Journey</li>\r\n<li>\"I Will Always Love You\" by Whitney Houston</li>\r\n<li>\"Hallelujah\" by Leonard Cohen</li>\r\n<li>\"Take on Me\" by a-ha</li>\r\n<li>\"Piano Man\" by Billy Joel</li>\r\n<li>\"Wannabe\" by Spice Girls</li>\r\n<li>\"Wonderwall\" by Oasis</li>\r\n<li>\"The Sound of Silence\" by Simon &amp; Garfunkel</li>\r\n<li>\"Crazy in Love\" by Beyonc&eacute; ft. Jay-Z</li>\r\n<li>\"Livin\' on a Prayer\" by Bon Jovi</li>\r\n<li>\"Dancing Queen\" by ABBA</li>\r\n<li>\"Hotline Bling\" by Drake</li>\r\n<li>\"Thriller\" by Michael Jackson</li>\r\n<li>\"All Star\" by Smash Mouth</li>\r\n<li>\"I Want to Hold Your Hand\" by The Beatles</li>\r\n<li>\"Shake It Off\" by Taylor Swift</li>\r\n<li>\"Don\'t Stop Me Now\" by Queen</li>\r\n<li>\"Sweet Home Alabama\" by Lynyrd Skynyrd</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '1', '1', '0', NULL, 'Audio,English Song,Song,beautiful songs', 'Audio playlist of beautiful songs', 'Audio playlist of beautiful songs', 1, 0, 1, 1, 0, '2023-06-25 05:14:12', '2023-06-26 05:42:40'),
(8, 3, 4, 'audio', 'Best English song - Michael Jackson', 'best-english-song-michael-jackson', 20, NULL, 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-34-37-6558.png', NULL, 'uploads/custom-images/product_icon-2023-06-25-06-34-37-9904.png', NULL, NULL, '<p>Embark on a mesmerizing audio adventure with our carefully curated playlist, \"Melodic Echoes.\" Immerse yourself in a captivating blend of musical genres, handpicked to evoke emotions, spark imagination, and transport you to new dimensions of auditory delight.</p>\r\n<p>From soul-stirring ballads to upbeat anthems, this playlist showcases a diverse selection of tracks that span genres such as pop, rock, R&amp;B, electronic, and more. Each song has been thoughtfully chosen to create a harmonious and seamless listening experience.</p>\r\n<p>Discover hidden gems from emerging artists and relish in the melodies of established favorites. Let the enchanting rhythms and captivating lyrics take you on a sonic journey, where every note resonates with your innermost emotions.</p>\r\n<p>Whether you\'re seeking inspiration during work or study sessions, setting the mood for a cozy evening, or simply looking to escape into a world of sound, \"Melodic Echoes\" is your perfect companion. It\'s a digital masterpiece that promises to elevate your audio experience and leave you craving for more.</p>\r\n<h3>An example of a 30-song audio playlist:</h3>\r\n<ul>\r\n<li>Thriller</li>\r\n<li>Billie Jean</li>\r\n<li>Beat It</li>\r\n<li>Smooth Criminal</li>\r\n<li>Black or White</li>\r\n<li>Bad</li>\r\n<li>Man in the Mirror</li>\r\n<li>The Way You Make Me Feel</li>\r\n<li>Dirty Diana</li>\r\n<li>Wanna Be Startin\' Somethin\'</li>\r\n<li>Rock with You</li>\r\n<li>Don\'t Stop \'Til You Get Enough</li>\r\n<li>Earth Song</li>\r\n<li>Remember the Time</li>\r\n<li>Human Nature</li>\r\n<li>P.Y.T. (Pretty Young Thing)</li>\r\n<li>They Don\'t Care About Us</li>\r\n<li>Heal the World</li>\r\n<li>Love Never Felt So Good (with Justin Timberlake)</li>\r\n<li>You Are Not Alone</li>\r\n<li>Dangerous</li>\r\n<li>Scream (with Janet Jackson)</li>\r\n<li>Off the Wall</li>\r\n<li>Give In to Me</li>\r\n<li>Leave Me Alone</li>\r\n<li>She\'s Out of My Life</li>\r\n<li>Blood on the Dance Floor</li>\r\n<li>The Girl Is Mine (with Paul McCartney)</li>\r\n<li>Liberian Girl</li>\r\n<li>Will You Be There</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '1', '1', '0', NULL, 'Michael Jackson,Best English song,Audio,Music,Playlist', 'Best English song - Michael Jackson', 'Best English song - Michael Jackson', 1, 0, 1, 1, 0, '2023-06-25 05:30:43', '2023-06-26 05:42:19'),
(9, 2, 3, 'script', 'UniFood - Single Restaurant Food Ordering System', 'unifood-single-restaurant-food-ordering-system', 29, '42', 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-34-08-7918.png', 'Script-2023-06-25-12-08-29-6073.zip', 'uploads/custom-images/product_icon-2023-06-25-06-34-08-1056.png', NULL, NULL, '<p>UniFood &ndash; Single Restaurant Food Ordering System for your restaurant business. Users can create account, order from their favorite food, track orders and pay with a single click. The UniFood team believes that a great user experience is a key to success and they are focused on building the best possible eCommerce solution for restaurant owners.</p>\r\n<p>This system was made using the popular Laravel PHP framework. Strong security was maintained during the development and there is no SQL injection, XSS attack, CSRF attack possible.</p>\r\n<h3>KEY FEATURES</h3>\r\n<ul>\r\n<li>Laravel 9 is used as PHP framework</li>\r\n<li>Bootstrap 5 is used in design</li>\r\n<li>User friendly codes and easy to navigate</li>\r\n<li>Eye-catching and fully responsive design</li>\r\n<li>Strong security of codes</li>\r\n<li>Product Management</li>\r\n<li>Variant wise price management</li>\r\n<li>Product Add-on system available</li>\r\n<li>Advance order management</li>\r\n<li>Delivery charge setup option</li>\r\n<li>Discount and coupon option</li>\r\n</ul>\r\n<h3>PAYMENT METHODS</h3>\r\n<ul>\r\n<li>PayPal</li>\r\n<li>Stripe</li>\r\n<li>Razorpay</li>\r\n<li>Flutterwave</li>\r\n<li>Mollie</li>\r\n<li>Paystack</li>\r\n<li>SslCommerz</li>\r\n<li>Hand Cash</li>\r\n<li>Bank Payment</li>\r\n<li>Hand Cash</li>\r\n</ul>\r\n<h3>ADMIN FEATURES</h3>\r\n<ul>\r\n<li>100% secure admin panel</li>\r\n<li>Order Management</li>\r\n<li>Product Management</li>\r\n<li>Variant wise price setup</li>\r\n<li>Product Add-on option</li>\r\n<li>Product category management</li>\r\n<li>Product review management</li>\r\n<li>Restaurant management</li>\r\n<li>Reservation management</li>\r\n</ul>\r\n<h3>USER FEATURES</h3>\r\n<ul>\r\n<li>100% responsive design</li>\r\n<li>Regular Login system</li>\r\n<li>User registration system with email verification</li>\r\n<li>User Login, forget and reset password option</li>\r\n<li>Profile information, photo, password change option</li>\r\n<li>Shopping cart management</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, 'UniFood,Single Restaurant , Food Ordering System,PHP,Laravel,HTML,CSS,Js', 'UniFood - Single Restaurant Food Ordering System', 'UniFood - Single Restaurant Food Ordering System', 1, 0, 1, 1, 0, '2023-06-25 06:08:29', '2023-06-26 05:41:23'),
(10, 2, 3, 'script', 'AI-Techy - AI Content Generator Tool with SAAS Module', 'aitechy-ai-content-generator-tool-with-saas-module', 20, '60', 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-33-35-9040.png', 'Script-2023-06-25-12-26-52-7482.zip', 'uploads/custom-images/product_icon-2023-06-25-06-33-35-7368.png', NULL, NULL, '<p>AI Techy &ndash; AI Content Generator Tool with SAAS Module, a platform that uses artificial intelligence to automatically generate written content. It is designed to help users save time and increase their productivity by generating high-quality, unique content in a matter of seconds. The AI engine is trained on a large corpus of text and uses machine learning algorithms to generate content that is coherent, grammatically correct, and semantically meaningful. One of the key features of AI TECHY is its writing assistant capabilities. AI TECHY is a powerful tool for businesses, content creators, and marketers who need to generate large amounts of written content quickly and efficiently. With its ability to generate articles, blog posts, product descriptions, and other types of content, AI TECHY can help users save time and resources, while still delivering high-quality, engaging content that their audience will love. Overall, AI TECHY is an innovative and effective solution for anyone looking to streamline their content creation process and produce high-quality written content with ease. It&rsquo;s compatible with Desktop, laptop, mobile and also compatible with major browsers.</p>\r\n<h3>AI TECHY &ndash; AI CONTENT GENERATOR TOOL WITH SAAS MODULE KEY FEATURES</h3>\r\n<ul>\r\n<li>Laravel 9 is used as PHP framework</li>\r\n<li>Bootstrap 5 is used in design</li>\r\n<li>User friendly codes and easy to navigate</li>\r\n<li>Eye-catching and fully responsive design</li>\r\n<li>Strong security of codes</li>\r\n<li>Blog Social Media share option</li>\r\n<li>Subscription verify with email</li>\r\n<li>Google analytics</li>\r\n<li>Facebook pixel</li>\r\n<li>Google reCaptcha</li>\r\n<li>Maintenance module</li>\r\n<li>Tawk live chat</li>\r\n</ul>\r\n<h3>PAYMENT METHODS</h3>\r\n<ul>\r\n<li>PayPal</li>\r\n<li>Stripe</li>\r\n<li>Razorpay</li>\r\n<li>Flutterwave</li>\r\n<li>Mollie</li>\r\n<li>Paystack</li>\r\n<li>Instamojo</li>\r\n<li>Bank Payment</li>\r\n</ul>\r\n<h3>ADMIN FEATURES</h3>\r\n<ul>\r\n<li>100% secure admin panel</li>\r\n<li>Use Case Management</li>\r\n<li>Pricing Plan</li>\r\n<li>Payment method management</li>\r\n<li>Admin management</li>\r\n<li>SEO Settings</li>\r\n<li>Home page management</li>\r\n<li>Maintenance mode management</li>\r\n<li>Dynamic website footer</li>\r\n<li>SMTP server mail</li>\r\n<li>Email configuration and template setting</li>\r\n</ul>\r\n<h3>USER FEATURES</h3>\r\n<ul>\r\n<li>100% responsive design</li>\r\n<li>Regular Login system</li>\r\n<li>Login with facebook and google</li>\r\n<li>User registration system with email verification</li>\r\n<li>User Login, forget and reset password option</li>\r\n<li>Profile information, photo, password change option</li>\r\n<li>Pricing Plan purchase option(Subscription Module)</li>\r\n<li>14+ Use Case</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, 'AI-Techy,AI Content Generator,Javascript,PHP,Laravel,HTML,CSS', 'AI-Techy - AI Content Generator Tool with SAAS Module', 'AI-Techy - AI Content Generator Tool with SAAS Module', 1, 0, 1, 1, 0, '2023-06-25 06:26:52', '2023-06-26 05:41:05'),
(11, 2, 5, 'script', 'EcoShop - Multivendor Food, Grocery, Ecommerce Flutter App with Admin Panel & Website', 'ecoshop-multivendor-food-grocery-ecommerce-flutter-app-with-admin-panel-website', 46, '80', 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-32-47-6896.png', 'Script-2023-06-25-12-43-02-2900.zip', 'uploads/custom-images/product_icon-2023-06-25-06-32-47-8684.png', NULL, NULL, '<h3>EcoShop &ndash; Multivendor Food, Grocery, Ecommerce Flutter App &amp; Admin Panel​</h3>\r\n<p>EcoShop &ndash; Multivendor Food, Grocery, Ecommerce Flutter App &amp; Admin Panel is crafted with care and love with latest flutter app technology and Design Trends. This EcoShop &ndash; Multivendor Food, Grocery, Ecommerce Flutter App &amp; Admin Panel is perfect for any business who is dealing with eCommerce, eCommerce business, Electronics Business, Grocery Business or anything which can be sale in online.</p>\r\n<p>EcoShop &ndash; Multivendor Food, Grocery, Ecommerce Flutter App &amp; Admin Panel comes up with lots of features. With vast functionalities and opportunities this is going to be one of the best ecommerce app in the industries. EcoShop &ndash; Multivendor Food, Grocery, Ecommerce Flutter App &amp; Admin Panel is exclusively made for food, grocery shop &amp; eCommerce industries. It has a modern, clean, and very detailed UI design for iOS and Android apps. You can easily customize the screens, allowing for great flexibility and ease of use when it comes to putting the finishing touch on your project</p>\r\n<h3>EcoShop &ndash; Multivendor Food, Grocery, Ecommerce Flutter App Features:</h3>\r\n<ul>\r\n<li>45+ High Quality Screens</li>\r\n<li>Modern Design</li>\r\n<li>Completely Customizable</li>\r\n<li>Clean Code and a well-structured project</li>\r\n<li>Cross Platform Compatible</li>\r\n<li>For Android and IOS</li>\r\n<li>60 FPS Support for both Android &amp; iOS</li>\r\n<li>Fully responsive UI</li>\r\n<li>Smooth Transition</li>\r\n<li>Easy to integrate into your project</li>\r\n<li>Well Documented</li>\r\n<li>Dedicated Support</li>\r\n</ul>\r\n<h3>ADMIN FEATURES:</h3>\r\n<ul>\r\n<li>100% secure admin panel</li>\r\n<li>Category, Sub-Category, Child-Category management</li>\r\n<li>Brand management</li>\r\n<li>Product management</li>\r\n<li>Seller Product management</li>\r\n<li>Product variant management</li>\r\n<li>Flash deal product management</li>\r\n<li>Product reviews management</li>\r\n<li>Product report management</li>\r\n<li>Country, state and city management</li>\r\n</ul>\r\n<h3>USER FEATURES:</h3>\r\n<ul>\r\n<li>User registration system with email verification</li>\r\n<li>User Login, forget and reset password option</li>\r\n<li>Profile information, photo, password change option</li>\r\n<li>See orders and details.</li>\r\n<li>Order Tracking</li>\r\n<li>Dashboard management</li>\r\n<li>Product review management</li>\r\n<li>Wishlist management</li>\r\n<li>Address Book Management</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, 'EcoShop,Multivendor Food,Grocery,Flutter App ,PHP,Laravel,Javascript', 'EcoShop - Multivendor Food, Grocery, Ecommerce Flutter App with Admin Panel & Website', 'EcoShop - Multivendor Food, Grocery, Ecommerce Flutter App with Admin Panel & Website', 1, 0, 1, 1, 0, '2023-06-25 06:43:02', '2023-06-26 05:40:38'),
(12, 2, 5, 'script', 'Aabcserv - Multivendor On-Demand Service & Handyman Marketplace Platform', 'aabcserv-multivendor-ondemand-service-handyman-marketplace-platform', 19, '100', 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-32-11-5655.png', 'Script-2023-06-25-01-02-39-8014.zip', 'uploads/custom-images/product_icon-2023-06-25-06-32-12-4049.png', NULL, NULL, '<p>Aabcserv &ndash; Multivendor On-Demand Service &amp; Handyman Marketplace Platform is complete Solution for ondemand service selling and finding business. With its well crafted design and Development in Aabcserv &ndash; Multivendor On-Demand Service &amp; Handyman Marketplace Platform will serve you with maximum features in the market. Aabcserv &ndash; Multivendor On-Demand Service &amp; Handyman Marketplace Platform is suitable for any business or service seller who is dealing with AC repair, Car repair, Plumber, Home cleaner, home cleaning, cleaning service, or any other service that is available int he market based on demand.</p>\r\n<p>Aabcserv &ndash; Multivendor On-Demand Service &amp; Handyman Marketplace Platform is made using the popular Laravel PHP framework. Strong security was maintained during the development and there is no SQL injection, XSS attack, CSRF attack possible. There are lot more features available in this platform considering users or sellers requirements.</p>\r\n<h3>Admin Features</h3>\r\n<ul>\r\n<li>Multi admin creation possible</li>\r\n<li>All Banner images change option</li>\r\n<li>Clear database option to start the website as fresh installation</li>\r\n<li>Manage Theme Color</li>\r\n<li>FAQ create, edit and delete option</li>\r\n<li>About Page management</li>\r\n<li>Terms and Conditions, Privacy Policy Page management</li>\r\n<li>Custom dynamic pages create, edit and delete option</li>\r\n<li>Language change option for front end and back end with RTL Support</li>\r\n<li>Subscriber manage with email to subscribers option</li>\r\n<li>Forget and reset password option</li>\r\n<li>Blog Category create, edit and delete option</li>\r\n<li>Blog create, edit and delete option</li>\r\n<li>Manage Blog Comments</li>\r\n<li>Contact message management</li>\r\n</ul>\r\n<h3>User Features</h3>\r\n<ul>\r\n<li>100% responsive design</li>\r\n<li>Nornaml Login system</li>\r\n<li>Login with facebook and google</li>\r\n<li>User registration system with email verification</li>\r\n<li>User Login, forget and reset password option</li>\r\n<li>Profile information, photo, password change option</li>\r\n<li>Schedule wise booking system</li>\r\n<li>See Booking and details.</li>\r\n<li>Booking Declined and Refund</li>\r\n<li>Dashboard management</li>\r\n<li>Review management</li>\r\n<li>Support Ticket</li>\r\n<li>Live chat</li>\r\n</ul>\r\n<h3>Requirements:</h3>\r\n<ul>\r\n<li>PHP = 8.0</li>\r\n<li>BCMath PHP Extension</li>\r\n<li>Ctype PHP Extension</li>\r\n<li>Fileinfo PHP extension</li>\r\n<li>JSON PHP Extension</li>\r\n<li>Mbstring PHP Extension</li>\r\n<li>OpenSSL PHP Extension</li>\r\n<li>PDO PHP Extension</li>\r\n<li>Tokenizer PHP Extension</li>\r\n<li>XML PHP Extension</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, 'Aabcserv,Multivendor,On-Demand Service,Marketplace,Handyman,PHP,Wordpress', 'Aabcserv - Multivendor On-Demand Service & Handyman Marketplace Platform', 'Aabcserv - Multivendor On-Demand Service & Handyman Marketplace Platform', 1, 0, 1, 1, 0, '2023-06-25 07:02:39', '2023-06-26 05:40:20'),
(13, 2, 1, 'image', 'Beautiful weather Picture - HD', 'beautiful-weather-picture-hd', 20, NULL, 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-31-24-2732.png', NULL, 'uploads/custom-images/product_icon-2023-06-25-06-31-24-4916.png', NULL, NULL, '<p>As the golden rays of the sun gently dance across the canvas of the sky, a breathtaking weather spectacle unfolds before our eyes, captured in a stunning photograph. This masterpiece of nature\'s artistry showcases a mesmerizing scene that epitomizes the epitome of a perfect weather day.</p>\r\n<p>In the foreground, a serene meadow stretches as far as the eye can see, its lush greenery swaying gently in the refreshing breeze. The vibrant blades of grass glisten with dewdrops, reflecting the radiant sunlight like a thousand tiny diamonds scattered across the landscape. Delicate wildflowers burst forth, adding vibrant pops of color to the idyllic tableau, their petals reaching towards the heavens in a joyous celebration of life.</p>\r\n<p>Above, a boundless expanse of azure sky unfolds, showcasing nature\'s brushstrokes in a masterpiece of cerulean hues. Wispy, cotton-like clouds drift lazily across the heavens, their fluffy forms adding a sense of whimsy and tranquility to the atmosphere. These celestial formations cast fleeting shadows upon the Earth below, creating a captivating interplay of light and shade that adds depth and dimension to the scene.</p>\r\n<p>The weather picture depicts a day of pure perfection. The sun, a resplendent ball of warmth and radiance, takes center stage, casting its benevolent glow upon everything it touches. Its golden beams bathe the landscape in a soft, ethereal light, imbuing every element with a touch of enchantment. A sense of tranquility permeates the air, as if the entire world has paused to bask in the beauty of this extraordinary moment.</p>\r\n<p>In the distance, majestic mountains rise majestically, their peaks adorned with a dusting of snow, a testament to the harmonious coexistence of different seasons. The mountains, with their stoic presence, provide a sense of grandeur and stability to the composition, grounding the viewer in the magnificence of the natural world.</p>\r\n<p>As we gaze upon this breathtaking weather picture, our senses come alive with the sounds and scents of this idyllic setting. The faint rustling of leaves, the sweet fragrance of blossoms, and the gentle whisper of the wind create a symphony of sensory delights, transporting us to a place of serene serenity and inner peace.</p>\r\n<p>This extraordinary weather picture encapsulates the epitome of a perfect day, where nature\'s elements harmonize in flawless unison. It is a visual poem, a snapshot of a fleeting moment of perfection that reminds us of the profound beauty that surrounds us every day. It serves as a poignant reminder to pause, to immerse ourselves in the wonders of the natural world, and to appreciate the magnificence of the weather\'s embrace.</p>\r\n<h3>Picture Quality:</h3>\r\n<ul>\r\n<li>SD</li>\r\n<li>HD</li>\r\n<li>Full HD</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, 'Picture,Images,Weather,HD,Lovely Weather Image', 'Beautiful weather Picture - HD', 'Beautiful weather Picture - HD', 1, 0, 1, 1, 0, '2023-06-25 07:21:01', '2023-06-26 05:39:53'),
(14, 2, 1, 'image', 'TopCommerce - Multivendor eCommerce Flutter App', 'topcommerce-multivendor-ecommerce-flutter-app', 69, NULL, 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-30-22-2734.png', NULL, 'uploads/custom-images/product_icon-2023-06-25-06-30-22-5826.png', NULL, NULL, '<p>TopCommerce &ndash; Multivendor eCommerce Flutter App is a powerful Flutter app kit. TopCommerce &ndash; Multivendor eCommerce Flutter App comes with modern App Design and keep the thoughts of User Experience in mind. This is best suite for the business who are dealing with eCoomerce, grocery, electronics shop, online shop, online delivery, order, multivendor, single vendor online businesses.</p>\r\n<p>TopCommerce &ndash; Multivendor eCommerce Flutter App is exclusively made for food, grocery shop &amp; eCommerce industries. It has a modern, clean, and very detailed UI design for iOS and Android apps. You can easily customize the screens, allowing for great flexibility and ease of use when it comes to putting the finishing touch on your project.</p>\r\n<h3>TopCommerce &ndash; Multivendor eCommerce Flutter App:</h3>\r\n<ul>\r\n<li>45+ High Quality Screens</li>\r\n<li>Modern Design</li>\r\n<li>Completely Customizable</li>\r\n<li>Clean Code and a well-structured project</li>\r\n<li>Cross Platform Compatible</li>\r\n<li>For Android and IOS</li>\r\n<li>60 FPS Support for both Android &amp; iOS</li>\r\n<li>Fully responsive UI</li>\r\n<li>Smooth Transition</li>\r\n<li>Easy to integrate into your project</li>\r\n<li>Well Documented</li>\r\n<li>Dedicated Support</li>\r\n</ul>\r\n<h3>TopCommerce &ndash; Multivendor eCommerce Flutter App Screen Details / Included List:</h3>\r\n<ul>\r\n<li>Onboarding 01</li>\r\n<li>Onboarding 02</li>\r\n<li>Onboarding 03</li>\r\n<li>login</li>\r\n<li>Creat account 01</li>\r\n<li>Creat account 02</li>\r\n<li>Email Verify</li>\r\n<li>Location 01</li>\r\n<li>Location 02</li>\r\n<li>Location confirmation 03</li>\r\n<li>Forget password 01</li>\r\n<li>Forget password 02</li>\r\n<li>Forget password 03</li>\r\n<li>Home</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, 'TopCommerce,eCommerce,Flutter App,Laravel,PHP,JS', 'TopCommerce - Multivendor eCommerce Flutter App', 'TopCommerce - Multivendor eCommerce Flutter App', 1, 0, 1, 1, 0, '2023-06-25 07:43:31', '2023-06-26 05:39:20'),
(15, 2, 2, 'video', 'Consilt - Multi Purpose Business and Consulting Website CMS', 'consilt-multi-purpose-business-and-consulting-website-cms', 26, NULL, 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-29-30-4905.png', NULL, 'uploads/custom-images/product_icon-2023-06-25-06-29-30-9182.png', NULL, NULL, '<p>Consilt is complete Content Management System to easily start your online business. If you have planned to build a E-commerce / Blog / Portfolio. You can choose Consilt, It is the most suitable platform for Agency / E-commerce / Blog / Portfolio / CMS. It has fully functional attribute management system. You can use it as multi purpose website.</p>\r\n<p>This system was made using the popular Laravel php framework. Strong security was maintained during the development and there is no sql injection, xss attack, csrf attack possible.</p>\r\n<h3>Key Features</h3>\r\n<ul>\r\n<li>Laravel 8 is used as language</li>\r\n<li>Bootstrap 5 is used in design</li>\r\n<li>User friendly codes and easy to navigate</li>\r\n<li>Eye-catching and fully responsive design</li>\r\n<li>Strong security of codes</li>\r\n<li>Blog system</li>\r\n<li>Personal Online Shop</li>\r\n<li>Portfolio</li>\r\n<li>Fully dynamic</li>\r\n</ul>\r\n<h3>ADMIN FEATURES</h3>\r\n<ul>\r\n<li>100% secure admin panel</li>\r\n<li>Blog management</li>\r\n<li>Product management</li>\r\n<li>Product reviews management</li>\r\n<li>Product reviews management</li>\r\n<li>Product reviews management</li>\r\n<li>Country, state and city management</li>\r\n<li>Tax management</li>\r\n<li>Shipping management</li>\r\n<li>Payment method management</li>\r\n<li>SEO Settings for all pages</li>\r\n<li>Slider management</li>\r\n<li>Dynamic Menu Builder</li>\r\n<li>Dynamic Page Builder</li>\r\n</ul>\r\n<h3>User Features</h3>\r\n<ul>\r\n<li>100% responsive design</li>\r\n<li>User can buy product</li>\r\n<li>User can make appointment</li>\r\n<li>User registration system with email verification</li>\r\n<li>User Login, forget and reset password option</li>\r\n<li>Profile information, photo, password change option</li>\r\n<li>Social Media share option for blog post and coupon</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '1', '1', '0', NULL, 'Consilt,Business,Consulting,CMS,PHP,Laravel,JS', 'Consilt - Multi Purpose Business and Consulting Website CMS', 'Consilt - Multi Purpose Business and Consulting Website CMS', 1, 0, 1, 1, 0, '2023-06-25 08:04:28', '2023-06-26 05:38:31'),
(16, 2, 2, 'video', 'LuckyCoupon - Laravel Coupon CMS', 'luckycoupon-laravel-coupon-cms', 36, NULL, 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-28-37-4154.png', NULL, 'uploads/custom-images/product_icon-2023-06-25-06-28-37-9526.png', NULL, NULL, '<p>LuckyCoupon cms is a powerfull php script with modern design, smart functionalities. It&rsquo;s a perfect for peapole who want to start new coupon website. No need to programming and technical skills requred. Just setup a luckycoupon theme and live it. You can run your business worldwide or own country.</p>\r\n<p>This system was made using the popular Laravel php framework. Strong security was maintained during the development and there is no sql injection, xss attack, csrf attack possible.</p>\r\n<h3>Features:</h3>\r\n<ul>\r\n<li>45+ High Quality Screens</li>\r\n<li>Modern Design</li>\r\n<li>Completely Customizable</li>\r\n<li>Clean Code and a well-structured project</li>\r\n<li>Cross Platform Compatible</li>\r\n<li>For Android and IOS</li>\r\n<li>60 FPS Support for both Android &amp; iOS</li>\r\n<li>Fully responsive UI</li>\r\n<li>Smooth Transition</li>\r\n<li>Easy to integrate into your project</li>\r\n<li>Well Documented</li>\r\n<li>Dedicated Support</li>\r\n</ul>\r\n<h3>Admin Features</h3>\r\n<ul>\r\n<li>Multi admin creation possible</li>\r\n<li>All Banner images change option</li>\r\n<li>Clear database option to start the website as fresh installation</li>\r\n<li>Manage Theme Color</li>\r\n<li>FAQ create, edit and delete option</li>\r\n<li>About Page management</li>\r\n<li>Terms and Conditions, Privacy Policy Page management</li>\r\n<li>Custom dynamic pages create, edit and delete option</li>\r\n<li>Language change option for front end and back end with RTL Support</li>\r\n<li>Subscriber manage with email to subscribers option</li>\r\n<li>Forget and reset password option</li>\r\n<li>Blog Category create, edit and delete option</li>\r\n<li>Blog create, edit and delete option</li>\r\n<li>Manage Blog Comments</li>\r\n<li>Contact message management</li>\r\n</ul>\r\n<h3>USER FEATURES</h3>\r\n<ul>\r\n<li>100% responsive design</li>\r\n<li>Regular Login system</li>\r\n<li>User registration system with email verification</li>\r\n<li>User Login, forget and reset password option</li>\r\n<li>Profile information, photo, password change option</li>\r\n<li>Shopping cart management</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, 'LuckyCoupon,Laravel Coupon,CMS,Js,Laravel,PHP', 'LuckyCoupon - Laravel Coupon CMS', 'LuckyCoupon - Laravel Coupon CMS', 1, 0, 1, 1, 0, '2023-06-25 08:22:37', '2023-06-26 05:38:03'),
(17, 1, 4, 'audio', 'TopLand - Laravel real estate agency portal with saas', 'topland-laravel-real-estate-agency-portal-with-saas', 41, NULL, 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-27-36-1074.png', NULL, 'uploads/custom-images/product_icon-2023-06-25-06-27-36-2703.png', NULL, NULL, '<p>TopLand is a real estate management laravel script. Here users or agents can publish their real estate listing based on some pricing plans and visitors can easily contact with the real estate agent to buy or sell properties.</p>\r\n<p>This is mainly a listing website to build connection between buyers and sellers; and you will get the SaaS version completely free in regular license.</p>\r\n<h3>Key Features</h3>\r\n<ul>\r\n<li>Bootstrap 5.1.3 is used in design</li>\r\n<li>User friendly codes and easy to navigate</li>\r\n<li>Eye-catching design</li>\r\n<li>Strong security of codes</li>\r\n<li>Search by location, category, property type, number of room, price range, property id and custom text in the home page and property pages</li>\r\n<li>Subscription verify with email</li>\r\n<li>Language change option</li>\r\n<li>RTL Supported</li>\r\n<li>Social Login</li>\r\n<li>Tawk Live Chat</li>\r\n</ul>\r\n<h3>Admin Features</h3>\r\n<ul>\r\n<li>SEO Settings for all pages</li>\r\n<li>SMTP server mail</li>\r\n<li>Payment setting for PayPal, Stripe, Razorpay, Flutterwave, Mollie, Paystack, Instamojo, Mercadopago and Bank</li>\r\n<li>Email configuration and template setting</li>\r\n<li>Facebook or manual comment setup option for blog</li>\r\n<li>Social Media Login</li>\r\n<li>Facebook Pixel</li>\r\n<li>Cookie Consent option</li>\r\n<li>Google Recaptcha option</li>\r\n<li>Google Analytic option</li>\r\n<li>Tawk Live Chat option</li>\r\n<li>Custom Pagination option</li>\r\n</ul>\r\n<h3>Requirements</h3>\r\n<ul>\r\n<li>PHP = 8.0.2</li>\r\n<li>BCMath PHP Extension</li>\r\n<li>Ctype PHP Extension</li>\r\n<li>Fileinfo PHP extension</li>\r\n<li>JSON PHP Extension</li>\r\n<li>Mbstring PHP Extension</li>\r\n<li>OpenSSL PHP Extension</li>\r\n<li>PDO PHP Extension</li>\r\n<li>Tokenizer PHP Extension</li>\r\n<li>XML PHP Extension</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, 'TopLand,agency,portal,real estate,Laravel,PHP,Js', 'TopLand - Laravel real estate agency portal with saas', 'TopLand - Laravel real estate agency portal with saas', 1, 0, 1, 1, 0, '2023-06-25 08:38:42', '2023-06-25 12:27:47');
INSERT INTO `products` (`id`, `author_id`, `category_id`, `product_type`, `name`, `slug`, `regular_price`, `extend_price`, `preview_link`, `thumbnail_image`, `download_file`, `product_icon`, `download_file_type`, `download_link`, `description`, `release_date`, `last_update_date`, `used_technology`, `file_type`, `high_resolution`, `cross_browser`, `documentation`, `layout`, `file_size`, `tags`, `seo_title`, `seo_description`, `status`, `approve_by_admin`, `popular_item`, `trending_item`, `featured_item`, `created_at`, `updated_at`) VALUES
(18, 1, 4, 'audio', 'TopCommerce - Laravel Multi Vendor eCommerce', 'topcommerce-laravel-multi-vendor-ecommerce', 23, NULL, 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-37-23-3873.png', NULL, 'uploads/custom-images/product_icon-2023-06-25-06-37-23-8922.png', NULL, NULL, '<p>Are you looking for a complete Multivendor Shopping Ecommerce solution system for your business, then you are in the right place. TopCommerce &ndash; is a Multi Vendor eCommerce Shopping Platform. You can choose TopCommerce script as the most suitable platform for multi-vendor eCommerce.</p>\r\n<p>You can use it for : Toys &amp; Kids Shop, Beauty &amp; Health Shop, Watch &amp; Jewelry Shop, Man &amp; Women Fashion Shop, Electronics &amp; Computers Shop, Food &amp; Grocery Shop, Tools &amp; Parts Shop, Home &amp; Furniture Shop, Sports &amp; Outdoors Shop, etc.</p>\r\n<p>eCommerce platforms are gaining more and more popularity nowadays and we keep maintaining all the demands of our users. The script has unlimited category, brands, products, attributes. coupons, orders, category create options. It comes with 9 payment gateways, full content management system, SEO, order tracking system, and more</p>\r\n<h3>KEY FEATURES</h3>\r\n<ul>\r\n<li>Laravel 8 is used as language</li>\r\n<li>Bootstrap 4.5 is used in design</li>\r\n<li>User friendly codes and easy to navigate</li>\r\n<li>Eye-catching and fully responsive design</li>\r\n<li>Strong security of codes</li>\r\n<li>Search product by category, sub-category, child-category, brand, product variant or custom name</li>\r\n<li>Ajax product load</li>\r\n<li>Subscription verify with email</li>\r\n<li>Product variant option</li>\r\n<li>Variant wise product price</li>\r\n<li>Google analytics</li>\r\n<li>Facebook pixel</li>\r\n</ul>\r\n<h3>ADMIN FEATURES</h3>\r\n<ul>\r\n<li>100% secure admin panel</li>\r\n<li>Category, Sub-Category, Child-Category management</li>\r\n<li>Brand management</li>\r\n<li>Product management</li>\r\n<li>Seller Product management</li>\r\n<li>Product variant management</li>\r\n<li>Campaign product management</li>\r\n<li>Flash deal product management</li>\r\n<li>Product reviews management</li>\r\n<li>Product report management</li>\r\n<li>Country, state and city management</li>\r\n<li>Coupon management</li>\r\n</ul>\r\n<h3>USER FEATURES</h3>\r\n<ul>\r\n<li>100% responsive design</li>\r\n<li>Login with facebook and google</li>\r\n<li>User registration system with email verification</li>\r\n<li>User Login, forget and reset password option</li>\r\n<li>Profile information, photo, password change option</li>\r\n<li>See orders and details.</li>\r\n<li>Dashboard management</li>\r\n<li>Product review management</li>\r\n<li>Wishlist management</li>\r\n<li>Real time chat system with sellers</li>\r\n<li>Shipping and billing address management</li>\r\n<li>Become a seller option</li>\r\n<li>Social Media share option for blog post and product</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '1', '1', '0', NULL, 'TopCommerce,eCommerce,Multi Vendor,Laravel,JS,PHP,CMS', 'TopCommerce - Laravel Multi Vendor eCommerce', 'TopCommerce - Laravel Multi Vendor eCommerce', 1, 0, 1, 1, 0, '2023-06-25 09:01:30', '2023-06-25 12:37:23'),
(19, 1, 3, 'script', 'ProfileTop - Multi User vCard, Resume and Portfolio Builder', 'profiletop-multi-user-vcard-resume-and-portfolio-builder', 50, '120', 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-26-20-3899.png', 'Script-2023-06-25-03-40-03-2380.zip', 'uploads/custom-images/product_icon-2023-06-25-06-26-20-6293.png', NULL, NULL, '<p>Profile Top is a SaaS Based Portfolio Builder CMS. You can make a package Free or Premium. In this software, users can do free registration, buy or enroll package and add their own portfolio. They will also have advanced QR code builder to build customized QR Code. Admin or the website owner can earn money easily creating packages for the users.</p>\r\n<p>This system was made using the popular Laravel php framework. Strong security was maintained during the development and there is no sql injection, xss attack, csrf attack possible.</p>\r\n<h3>Key Features</h3>\r\n<ul>\r\n<li>Laravel 8 is used as language</li>\r\n<li>Bootstrap 4.5 is used in design</li>\r\n<li>User friendly codes and easy to navigate</li>\r\n<li>Eye-catching and fully responsive design</li>\r\n<li>Strong security of codes</li>\r\n<li>Search user by designation, skill or custom name</li>\r\n<li>Subscription verify with email</li>\r\n<li>Membership system</li>\r\n<li>RTL Supported</li>\r\n</ul>\r\n<h3>Admin Features</h3>\r\n<ul>\r\n<li>SEO Settings for all pages</li>\r\n<li>SMTP server mail</li>\r\n<li>Payment setting for PayPal, Stripe, Razorpay, Flutterwave, Mollie, Paystack, Instamojo and Bank</li>\r\n<li>Email configuration and template setting</li>\r\n<li>Cookie Consent option</li>\r\n<li>Google Recaptcha option</li>\r\n<li>Google Analytic option</li>\r\n<li>Tawk Live Chat option</li>\r\n<li>Manage HTTP request Error Page</li>\r\n<li>Dynamic Pagination option</li>\r\n<li>Multi admin creation possible</li>\r\n<li>All Banner images change option</li>\r\n</ul>\r\n<h3>User Features</h3>\r\n<ul>\r\n<li>Login with facebook and google</li>\r\n<li>User registration system with email verification</li>\r\n<li>User Login, forget and reset password option</li>\r\n<li>Profile information, photo, password change option</li>\r\n<li>Purchase Package and payment with stripe, paypal and bank</li>\r\n<li>See orders and details.</li>\r\n<li>Advanced QR Code Builder</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, 'ProfileTop,vCard,Builder,Portfolio Builder,Resume Builder,PHP,Laravel,Js', 'ProfileTop - Multi User vCard, Resume and Portfolio Builder', 'ProfileTop - Multi User vCard, Resume and Portfolio Builder', 1, 0, 1, 1, 1, '2023-06-25 09:40:03', '2023-07-24 08:05:59'),
(20, 1, 3, 'script', 'DirList - Complete Business Directory and Listing Script', 'dirlist-complete-business-directory-and-listing-script', 100, '160', 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-25-52-2945.png', 'Script-2023-06-25-03-54-10-6404.zip', 'uploads/custom-images/product_icon-2023-06-25-06-25-52-5115.png', NULL, NULL, '<p>DirList is a SaaS Based Listing Directory CMS. In this software, users can do free registration, buy or enroll package and add their own listing. This web application is suitable for any listing, real estate, hotel, booking, restaurant, travel, cars etc. that has listing features. Admin or the website owner can earn money easily creating packages for the users.</p>\r\n<p>This system was made using the popular Laravel php framework. Strong security was maintained during the development and there is no sql injection, xss attack, csrf attack possible.</p>\r\n<h3>Key Features</h3>\r\n<ul>\r\n<li>Laravel 8 is used as language</li>\r\n<li>Bootstrap 5 is used in design</li>\r\n<li>User friendly codes and easy to navigate</li>\r\n<li>Eye-catching design</li>\r\n<li>RTL support</li>\r\n<li>Language change option</li>\r\n<li>Strong security of codes</li>\r\n</ul>\r\n<h3>Admin Features</h3>\r\n<ul>\r\n<li>SEO Settings for all pages</li>\r\n<li>SMTP server mail</li>\r\n<li>Email configuration and template setting</li>\r\n<li>Facebook or manual comment setup option for blog</li>\r\n<li>Cookie Consent option</li>\r\n<li>Google Recaptcha option</li>\r\n<li>Google Analytic option</li>\r\n<li>Preloader on/off option</li>\r\n<li>Tawk Live Chat option</li>\r\n<li>Pagination option</li>\r\n<li>Multi admin creation possible</li>\r\n<li>Multi Staff creation possible</li>\r\n<li>All Banner images change option</li>\r\n</ul>\r\n<h3>User Features</h3>\r\n<ul>\r\n<li>User registration system with email verification</li>\r\n<li>User Login, forget and reset password option</li>\r\n<li>Profile information, photo, password change option</li>\r\n<li>Purchase Package and payment with stripe, paypal, razorpay and bank</li>\r\n<li>Listing create, edit and delete option</li>\r\n<li>Listing Schedule create, edit and delete option</li>\r\n<li>Manage Multiple Listing Image and Video</li>\r\n<li>Manage Reviews</li>\r\n<li>Manage Wishlists</li>\r\n<li>See orders and details.</li>\r\n<li>Claim submit option under the listing</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, 'DirList,Business,Directory,Script,PHP,Laravel,JS', 'DirList - Complete Business Directory and Listing Script', 'DirList - Complete Business Directory and Listing Script', 1, 0, 1, 1, 0, '2023-06-25 09:54:10', '2023-06-25 12:25:52'),
(21, 1, 5, 'script', 'ServiceTop - Professional Service Selling Marketplace', 'servicetop-professional-service-selling-marketplace', 80, '171', 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-25-14-1811.png', 'Script-2023-06-25-04-15-59-7589.zip', 'uploads/custom-images/product_icon-2023-06-25-06-25-14-4100.png', NULL, NULL, '<p>ServiceTop is a professional service selling marketplace where service providers and users/customers can create free account. Service providers can add their services for free and users/customers can hire them. Admin will earn through commisions from service providers when they will be hired by customers for a particular service.</p>\r\n<p>This system was made using the popular Laravel php framework. Strong security was maintained during the development and there is no sql injection, xss attack, csrf attack possible.</p>\r\n<h3>Key Features</h3>\r\n<ul>\r\n<li>Laravel 8 is used as language</li>\r\n<li>Bootstrap 4.5 is used in design</li>\r\n<li>User friendly codes and easy to navigate</li>\r\n<li>Eye-catching design</li>\r\n<li>Strong security of codes</li>\r\n<li>Search by expert name and category in the home page</li>\r\n<li>Service Provider makes their own service under some category</li>\r\n<li>Easily navigate bookings and payments for user</li>\r\n<li>Messaging between user and service provider</li>\r\n<li>Service provider withdraw system</li>\r\n</ul>\r\n<h3>Admin Features</h3>\r\n<ul>\r\n<li>SEO Settings for all pages</li>\r\n<li>Payment setting for PayPal, Stripe and Bank</li>\r\n<li>Email template setting</li>\r\n<li>Facebook or manual comment setup option for blog</li>\r\n<li>Cookie Consent option</li>\r\n<li>Google Recaptcha option</li>\r\n<li>Google Analytic option</li>\r\n<li>Preloader on/off option</li>\r\n<li>Tawk Live Chat option</li>\r\n<li>Theme color change option</li>\r\n</ul>\r\n<h3>Requirements</h3>\r\n<ul>\r\n<li>PHP = 7.3</li>\r\n<li>BCMath PHP Extension</li>\r\n<li>Ctype PHP Extension</li>\r\n<li>Fileinfo PHP extension</li>\r\n<li>JSON PHP Extension</li>\r\n<li>Mbstring PHP Extension</li>\r\n<li>OpenSSL PHP Extension</li>\r\n<li>PDO PHP Extension</li>\r\n<li>Tokenizer PHP Extension</li>\r\n<li>XML PHP Extension</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, 'ServiceTop,Selling Marketplace,Service,JS,PHP,Laravel', 'ServiceTop - Professional Service Selling Marketplace', 'ServiceTop - Professional Service Selling Marketplace', 1, 0, 1, 1, 0, '2023-06-25 10:15:59', '2023-06-25 12:25:14'),
(22, 1, 5, 'script', 'Listkhoj - SaaS Based Business Directory CMS', 'listkhoj-saas-based-business-directory-cms', 70, '100', 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-24-48-5391.png', 'Script-2023-06-25-04-27-45-9675.zip', 'uploads/custom-images/product_icon-2023-06-25-06-24-48-1525.png', NULL, NULL, '<p>ListKhoj is a SaaS Based Listing Directory CMS. In this software, users can do free registration, buy or enroll package and add their own listing. This web application is suitable for any listing, real estate, hotel, booking, restaurant, travel, cars etc. that has listing features. Admin or the website owner can earn money easily creating packages for the users.</p>\r\n<p>This system was made using the popular Laravel php framework. Strong security was maintained during the development and there is no sql injection, xss attack, csrf attack possible</p>\r\n<h3>Admin Features:</h3>\r\n<ul>\r\n<li>SEO Settings for all pages</li>\r\n<li>SMTP server mail</li>\r\n<li>Payment setting for PayPal, Stripe, Razorpay, Flutterwave, Paystack, Mollie, Instamojo and Bank</li>\r\n<li>Email configuration and template setting</li>\r\n<li>Facebook or manual comment setup option for blog</li>\r\n<li>Cookie Consent option</li>\r\n<li>Google Recaptcha option</li>\r\n<li>Google Analytic option</li>\r\n<li>Preloader on/off option</li>\r\n<li>Tawk Live Chat option</li>\r\n</ul>\r\n<h3>Key Features</h3>\r\n<ul>\r\n<li>Laravel 8 is used as language</li>\r\n<li>Bootstrap 4.5 is used in design</li>\r\n<li>User friendly codes and easy to navigate</li>\r\n<li>Eye-catching design</li>\r\n<li>RTL support</li>\r\n<li>Language change option</li>\r\n<li>Strong security of codes</li>\r\n<li>Search by name, location and category in the home page</li>\r\n<li>Quick Add listing button on the menu</li>\r\n<li>Easily navigate to patient login and registration pages.</li>\r\n<li>Subscription verify with email</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, 'Listkhoj,Business,Directory,CMS,PHP,Wordpress,Laravel,Js', 'Listkhoj - SaaS Based Business Directory CMS', 'Listkhoj - SaaS Based Business Directory CMS', 1, 0, 1, 1, 0, '2023-06-25 10:27:45', '2023-06-25 12:24:48'),
(23, 1, 3, 'script', 'DocMent - SaaS Based Multi Doctor Appointment System', 'docment-saas-based-multi-doctor-appointment-system', 29, '90', 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-24-21-1136.png', 'Script-2023-06-25-04-58-14-4636.zip', 'uploads/custom-images/product_icon-2023-06-25-06-24-21-8034.png', NULL, NULL, '<p>DocMent is a SaaS Based Multi Doctor Appointment System. In this system, a patient can free register and login and make an appointment with his/her desired doctor. Patient can search doctor based on location or chamber department wise and appoint quickly. Doctor can also login and create treatment and prescription for his patients.</p>\r\n<p>This system was made using the popular Laravel php framework. Strong security was maintained during the development and there is no sql injection, xss attack, csrf attack possible.</p>\r\n<h3>Key Features</h3>\r\n<ul>\r\n<li>Laravel 8 is used as language</li>\r\n<li>Bootstrap 4.5 is used in design</li>\r\n<li>User friendly codes and easy to navigate</li>\r\n<li>Eye-catching design</li>\r\n<li>Strong security of codes</li>\r\n<li>Search by location, doctor and department in the home page and doctor pages</li>\r\n<li>Quick Appointment button on the menu</li>\r\n<li>Easily navigate to patient login and registration pages.</li>\r\n<li>Real time messaging between doctors and patients</li>\r\n<li>Subscription verify with email</li>\r\n<li>RTL support</li>\r\n<li>Language change optio</li>\r\n</ul>\r\n<h3>Admin Features</h3>\r\n<ul>\r\n<li>SEO Settings for all pages</li>\r\n<li>Payment setting for PayPal, Stripe and Bank</li>\r\n<li>Email template setting</li>\r\n<li>Facebook or manual comment setup option for blog</li>\r\n<li>Cookie Consent option</li>\r\n<li>Google Re-captcha option</li>\r\n<li>Google Analytic option</li>\r\n<li>Preloader on/off option</li>\r\n<li>Tawk Live Chat option</li>\r\n<li>Theme color change option</li>\r\n<li>Multi admin creation possible</li>\r\n<li>All Banner images change option</li>\r\n</ul>\r\n<h3>Requirements</h3>\r\n<ul>\r\n<li>PHP = 7.2.5</li>\r\n<li>BCMath PHP Extension</li>\r\n<li>Ctype PHP Extension</li>\r\n<li>Fileinfo PHP extension</li>\r\n<li>JSON PHP Extension</li>\r\n<li>Mbstring PHP Extension</li>\r\n<li>OpenSSL PHP Extension</li>\r\n<li>PDO PHP Extension</li>\r\n<li>Tokenizer PHP Extension</li>\r\n<li>XML PHP Extension</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, 'DocMent,Doctor,Appointment System,Laravel,PHP,JS', 'DocMent - SaaS Based Multi Doctor Appointment System', 'DocMent - SaaS Based Multi Doctor Appointment System', 1, 0, 1, 1, 1, '2023-06-25 10:58:14', '2023-07-24 08:05:48'),
(24, 1, 5, 'script', 'Aabcserv - Multivendor On-Demand Service & Handyman Marketplace Flutter User App', 'aabcserv-multivendor-ondemand-service-handyman-marketplace-flutter-user-app', 99, '177', 'https://websolutionus.com/', 'uploads/custom-images/thumb_image-2023-06-25-06-23-36-3067.png', 'Script-2023-06-25-05-09-48-3165.zip', 'uploads/custom-images/product_icon-2023-06-25-06-23-36-4916.png', NULL, NULL, '<p>Aabcserv &ndash; Multivendor On-Demand Service &amp; Handyman Marketplace Flutter User App is a comprehensive solution for selling and finding on-demand services. It boasts a well-crafted design and development that offers maximum features in the market. This platform is suitable for any business or service seller dealing with services such as AC repair, car repair, plumbing, home cleaning, cleaning services, or any other service available in the market based on demand.</p>\r\n<p>Aabcserv &ndash; Multivendor On-Demand Service &amp; Handyman Marketplace Flutter App is built using the latest Flutter technology, ensuring top-notch security with no possibility of SQL injection, XSS attacks, or CSRF attacks. Additionally, the platform offers an extensive range of features tailored to meet the unique requirements of users or sellers.</p>\r\n<h3>Key Features:</h3>\r\n<ul>\r\n<li>45+ High Quality Screens</li>\r\n<li>Modern Design</li>\r\n<li>Completely Customizable</li>\r\n<li>Clean Code and a well-structured project</li>\r\n<li>Cross Platform Compatible</li>\r\n<li>For Android and IOS</li>\r\n<li>60 FPS Support for both Android &amp; iOS</li>\r\n<li>Fully responsive UI</li>\r\n<li>Smooth Transition</li>\r\n<li>Easy to integrate into your project</li>\r\n<li>Well Documented</li>\r\n<li>Schedule wise booking system</li>\r\n<li>Booking Confirm Request to Admin</li>\r\n<li>Blog Social Media share option</li>\r\n<li>Search service by category, location or custom text</li>\r\n<li>Subscription verification with email</li>\r\n<li>Facebook pixel</li>\r\n<li>Maintainance module</li>\r\n<li>Dynamic language option</li>\r\n<li>Dynamic Color change option</li>\r\n<li>ERROR Page(400,500,505) customize</li>\r\n</ul>', NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, 'Aabcserv,Multivendor,On-Demand Service,Handyman Marketplace,App,PHP,JS,Wordpress', 'Aabcserv - Multivendor On-Demand Service & Handyman Marketplace Flutter User App', 'Aabcserv - Multivendor On-Demand Service & Handyman Marketplace Flutter User App', 1, 0, 1, 1, 1, '2023-06-25 11:09:48', '2023-07-22 14:41:34'),
(27, 1, 1, 'image', 'Demo prodict', 'demo-prodict', 2001, NULL, 'http://localhost/alasmart/script_content/main_files/product-create?product_type=image', 'uploads/custom-images/thumb_image-2023-08-07-03-23-29-3316.png', NULL, 'uploads/custom-images/product_icon-2023-08-07-03-23-30-7193.png', NULL, NULL, '&lt;p&gt;sdfsdfsdf&lt;/p&gt;', NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, 'dsf,sdf,test', 'Easyiest Way Built Your Website With Top Notch Templates', 'Easyiest Way Built Your Website With Top Notch Templates', 0, 0, 0, 0, 0, '2023-08-07 09:23:30', '2023-08-07 10:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE `product_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `user_id`, `name`, `email`, `phone`, `address`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 24, 3, 'Harding Rosa', 'user3@gmail.com', '123-874-8922', 'San Jose, California, United State', 'I am absolutely mesmerized by the exquisite craftsmanship of this product - every intricate detail is a testament to the skill and dedication of the artisans involved.', 1, '2023-06-26 06:31:09', '2023-06-26 06:43:17'),
(2, 23, 3, 'Harding Rosa', 'user3@gmail.com', '123-874-8922', 'San Jose, California, United State', 'This product is a true masterpiece, seamlessly blending elegance and functionality. Its sleek design effortlessly enhances any space it graces.', 1, '2023-06-26 06:31:45', '2023-06-26 06:43:15'),
(3, 22, 3, 'Harding Rosa', 'user3@gmail.com', '123-874-8922', 'San Jose, California, United State', 'I can&#039;t help but fall in love with the vibrant colors and rich textures of this product. It&#039;s like owning a piece of art that brings joy to my everyday life.', 1, '2023-06-26 06:32:31', '2023-06-26 06:43:14'),
(4, 21, 3, 'Harding Rosa', 'user3@gmail.com', '123-874-8922', 'San Jose, California, United State', 'From the moment I held this product in my hands, I knew it was something special. The weight, balance, and smooth finish all contribute to an unparalleled tactile experience.', 1, '2023-06-26 06:33:39', '2023-06-26 06:43:13'),
(5, 20, 3, 'Harding Rosa', 'user3@gmail.com', '123-874-8922', 'San Jose, California, United State', 'The attention to detail in this product is simply astounding. It&#039;s the little things that make a big difference, and this item is a testament to the creator&#039;s commitment to excellence.', 1, '2023-06-26 06:34:13', '2023-06-26 06:43:08'),
(6, 19, 3, 'Harding Rosa', 'user3@gmail.com', '123-874-8922', 'San Jose, California, United State', 'This product is a true embodiment of luxury and sophistication. Its timeless design and high-quality materials make it a worthy investment that will be cherished for years to come.', 1, '2023-06-26 06:35:13', '2023-06-26 06:43:07'),
(7, 24, 2, 'Amaya Hendrix', 'user2@gmail.com', '123-874-8948', 'San Diego, California, United State.', 'The moment I opened the packaging, I was greeted by an enchanting scent that perfectly complemented the luxurious essence of this product.', 1, '2023-06-26 06:45:43', '2023-06-26 06:50:25'),
(8, 23, 2, 'Amaya Hendrix', 'user2@gmail.com', '123-874-8948', 'San Diego, California, United State.', 'The graceful curves and graceful lines of this product exude a sense of elegance and grace, elevating the aesthetic appeal of any space it adorns.', 1, '2023-06-26 06:46:41', '2023-06-26 06:50:36'),
(9, 22, 2, 'Amaya Hendrix', 'user2@gmail.com', '123-874-8948', 'San Diego, California, United State.', 'Every time I use this product, I am reminded of the impeccable attention to detail that went into its creation. It&#039;s like owning a work of art that enhances my daily routine.', 1, '2023-06-26 06:47:16', '2023-06-26 06:50:32'),
(10, 21, 2, 'Amaya Hendrix', 'user2@gmail.com', '123-874-8948', 'San Diego, California, United State.', 'The rich, velvety texture of this product is a delight to touch. Its smoothness adds an extra layer of indulgence, creating a truly sensorial experience.', 1, '2023-06-26 06:47:54', '2023-06-26 06:50:30'),
(11, 20, 2, 'Amaya Hendrix', 'user2@gmail.com', '123-874-8948', 'San Diego, California, United State.', 'This product embodies a harmonious fusion of modern design and timeless charm. It effortlessly balances contemporary aesthetics with a classic touch.', 1, '2023-06-26 06:49:04', '2023-06-26 06:50:29'),
(12, 19, 2, 'Amaya Hendrix', 'user2@gmail.com', '123-874-8948', 'San Diego, California, United State.', 'From its flawless functionality to its striking aesthetics, this product is a testament to the seamless union of form and purpose. It&#039;s a joy to use and behold.', 0, '2023-06-26 06:50:10', '2023-06-26 06:50:10'),
(13, 24, 1, 'John doe', 'user@gmail.com', '22-402-666', 'California, Los Angeles', 'Test message', 1, '2023-08-05 04:53:57', '2023-08-05 04:54:16'),
(14, 19, 1, 'John doe', 'user@gmail.com', '22-402-666', 'California, Los Angeles', 'fgsfsdfsdf', 0, '2023-08-05 05:46:45', '2023-08-05 05:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `product_discounts`
--

CREATE TABLE `product_discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer` int(11) NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_discounts`
--

INSERT INTO `product_discounts` (`id`, `title`, `offer`, `link`, `end_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Get Big Discount For a Limited time', 40, 'http://localhost/alasmart/script_content/main_files/product/docment-saas-based-multi-doctor-appointment-system', '2023-07-28 05:00:00', 1, '2023-07-05 10:27:52', '2023-08-08 12:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_items`
--

CREATE TABLE `product_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `script_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `script_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `script_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_items`
--

INSERT INTO `product_items` (`id`, `script_title`, `script_description`, `script_image`, `image_title`, `image_description`, `image_image`, `video_title`, `video_description`, `video_image`, `audio_title`, `audio_description`, `audio_image`, `created_at`, `updated_at`) VALUES
(1, 'Create Script Product', 'What is script product ? If you interest submit php, wordpress, mobile app, html design or any other web related script then you can choose it', 'uploads/website-images/script-product-image--2023-06-11-01-34-44-9572.png', 'Create Image Product', 'What is image product ? If you interest jpg, jpeg, pnj or any other image related file then you can choose it', 'uploads/website-images/image-product-image--2023-06-11-01-22-46-3718.png', 'Create Video Product', 'What is video product ? If you interest animation, video design, video related file then you can choose it', 'uploads/website-images/video-product-image--2023-06-11-01-22-46-2309.png', 'Create Audio Product', 'What is audio product ? If you interest animation, video design, video related file then you can choose it', 'uploads/website-images/audio-product-image--2023-06-11-01-22-46-4333.png', '2023-06-11 06:36:13', '2023-06-11 07:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_type_pages`
--

CREATE TABLE `product_type_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_type_pages`
--

INSERT INTO `product_type_pages` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Need help selecting a category?', 'A great way to start is by browsing through our categories to see what other authors are selling.', 'uploads/website-images/product-type-page--2023-08-07-11-21-06-4701.png', '2023-06-11 05:46:03', '2023-08-07 05:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `variant_name`, `price`, `file_name`, `created_at`, `updated_at`) VALUES
(11, 6, 'Resulation: 700p', '40', 'Script-2023-06-25-10-51-06-4514.zip', '2023-01-28 11:07:50', '2023-06-25 04:51:06'),
(12, 9, 'Size : 540px - 1024px', '20', 'Script-2023-06-06-05-13-11-6321.zip', '2023-01-30 04:53:27', '2023-06-06 11:13:11'),
(13, 9, 'Size : 1200px - 2024px', '10', 'Script-2023-06-06-05-13-21-7635.zip', '2023-01-30 04:53:43', '2023-06-06 11:13:21'),
(14, 6, 'Resulation: 1080p', '60', 'Script-2023-06-25-10-52-23-3102.zip', '2023-04-10 04:43:31', '2023-06-25 04:52:23'),
(15, 14, 'Small : 640x853', '69', 'Script-2023-06-25-01-47-45-7983.zip', '2023-04-29 06:14:41', '2023-06-25 07:48:22'),
(16, 8, '15 Best Audio Song', '20', 'Script-2023-06-25-11-31-42-4684.zip', '2023-05-22 11:22:45', '2023-06-25 05:32:26'),
(24, 3, 'Size : 545px - 1029px', '39', 'Script-2023-06-24-06-50-19-6781.zip', '2023-06-24 12:50:19', '2023-06-24 12:50:19'),
(25, 3, 'Size : 547px - 1040px', '46', 'Script-2023-06-24-06-50-59-5387.zip', '2023-06-24 12:50:59', '2023-06-24 12:50:59'),
(26, 4, 'Size : 517px - 1010px', '69', 'Script-2023-06-24-07-13-07-9467.zip', '2023-06-24 13:13:07', '2023-06-24 13:13:07'),
(27, 4, 'Size: 745px - 1027px', '70', 'Script-2023-06-24-07-13-55-5201.zip', '2023-06-24 13:13:55', '2023-06-24 13:14:25'),
(28, 5, 'Resolution MP4 - 360p', '39', 'Script-2023-06-24-07-31-14-4531.zip', '2023-06-24 13:31:14', '2023-06-25 11:58:05'),
(29, 5, 'Resolution MP4- 720p', '61', 'Script-2023-06-24-07-32-26-5332.zip', '2023-06-24 13:32:26', '2023-06-25 11:58:29'),
(30, 7, '20 Audio Song', '30', 'Script-2023-06-25-11-15-02-5718.zip', '2023-06-25 05:15:02', '2023-06-25 05:15:49'),
(31, 7, '30 Audio Song', '40', 'Script-2023-06-25-11-15-38-9045.zip', '2023-06-25 05:15:38', '2023-06-25 05:15:38'),
(32, 8, '30 Best Audio Song', '30', 'Script-2023-06-25-11-32-13-1833.zip', '2023-06-25 05:32:13', '2023-06-25 05:32:13'),
(33, 13, 'SD : 260 X 600', '20', 'Script-2023-06-25-01-23-07-1387.zip', '2023-06-25 07:23:07', '2023-06-25 07:23:37'),
(34, 13, 'SD : 640 X 960', '30', 'Script-2023-06-25-01-24-38-1438.zip', '2023-06-25 07:24:38', '2023-06-25 07:24:38'),
(35, 13, 'Full HD : 720 X 1280', '50', 'Script-2023-06-25-01-25-49-1643.zip', '2023-06-25 07:25:49', '2023-06-25 07:26:55'),
(36, 14, 'Medium : 1280x1708', '90', 'Script-2023-06-25-01-48-47-3807.zip', '2023-06-25 07:48:47', '2023-06-25 07:50:07'),
(37, 14, 'Large : 1920x2540', '100', 'Script-2023-06-25-01-49-24-3917.zip', '2023-06-25 07:49:24', '2023-06-25 07:49:24'),
(38, 15, 'MP4 - 360p', '26', 'Script-2023-06-25-02-06-59-5885.zip', '2023-06-25 08:06:59', '2023-06-25 08:06:59'),
(39, 15, 'MP4 - 720p', '35', 'Script-2023-06-25-02-08-16-1962.zip', '2023-06-25 08:08:16', '2023-06-25 08:08:16'),
(40, 16, 'MP4 - 360p', '36', 'Script-2023-06-25-02-24-01-2795.zip', '2023-06-25 08:23:26', '2023-06-25 08:24:27'),
(41, 16, 'MP4 - 720p', '61', 'Script-2023-06-25-02-24-48-2187.zip', '2023-06-25 08:24:48', '2023-06-25 08:24:48'),
(42, 17, '30 Audio song', '41', 'Script-2023-06-25-02-42-22-9938.zip', '2023-06-25 08:42:22', '2023-06-25 08:42:22'),
(43, 17, '40 Audio Song', '50', 'Script-2023-06-25-02-43-03-1056.zip', '2023-06-25 08:43:03', '2023-06-25 08:43:03'),
(44, 18, '26 Audio song', '23', 'Script-2023-06-25-03-03-56-1227.zip', '2023-06-25 09:03:56', '2023-06-25 09:03:56'),
(45, 18, '30 Audio Song', '30', 'Script-2023-06-25-03-04-38-8309.zip', '2023-06-25 09:04:38', '2023-06-25 09:04:47'),
(46, 27, '545px - 1029px', '1000', 'Script-2023-08-07-04-07-41-6498.zip', '2023-08-07 10:07:41', '2023-08-07 11:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `provider_client_reports`
--

CREATE TABLE `provider_client_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `report_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provider_withdraws`
--

CREATE TABLE `provider_withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` double NOT NULL,
  `withdraw_amount` double NOT NULL,
  `withdraw_charge` double NOT NULL,
  `account_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `approved_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provider_withdraws`
--

INSERT INTO `provider_withdraws` (`id`, `user_id`, `method`, `total_amount`, `withdraw_amount`, `withdraw_charge`, `account_info`, `status`, `approved_date`, `created_at`, `updated_at`) VALUES
(3, 1, 'Bank Payment', 60, 54, 10, '01XXXXXXXXXXX', 0, NULL, '2023-06-26 07:30:47', '2023-06-26 07:30:47'),
(4, 1, 'Bank Payment', 90, 81, 10, '01XXXXXXXXXX', 1, '2023-06-26', '2023-06-26 07:31:04', '2023-06-26 07:32:22'),
(5, 1, 'Bank Payment', 100, 90, 10, '01XXXXXXXXXXXX', 1, '2023-06-26', '2023-06-26 07:31:34', '2023-06-26 07:32:04'),
(6, 1, 'Bank Payment', 100, 90, 10, '0365XXXXXXX', 1, '2023-08-07', '2023-08-07 04:45:49', '2023-08-07 04:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `pusher_credentails`
--

CREATE TABLE `pusher_credentails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_secret` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_cluster` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pusher_credentails`
--

INSERT INTO `pusher_credentails` (`id`, `app_id`, `app_key`, `app_secret`, `app_cluster`, `created_at`, `updated_at`) VALUES
(1, '1338069', 'e013174602072a186b1d', '46de951521010c14b205', 'mt1', NULL, '2022-01-29 12:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `razorpay_payments`
--

CREATE TABLE `razorpay_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_rate` double NOT NULL DEFAULT 1,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `razorpay_payments`
--

INSERT INTO `razorpay_payments` (`id`, `status`, `name`, `currency_rate`, `country_code`, `currency_code`, `description`, `image`, `color`, `key`, `secret_key`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ecommerce', 74.66, 'IN', 'INR', 'This is description', 'uploads/website-images/razorpay-2023-05-11-05-37-00-6286.png', '#2d15e5', 'rzp_test_K7CipNQYyyMPiS', 'zSBmNMorJrirOrnDrbOd1ALO', NULL, '2023-05-11 11:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `refund_requests`
--

CREATE TABLE `refund_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `account_information` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'awaiting_for_admin_approval',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `refund_requests`
--

INSERT INTO `refund_requests` (`id`, `client_id`, `order_id`, `account_information`, `resone`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'IBBL AAA Branch\r\nAccount Number : 32145221112', 'this is test resone', 'awaiting_for_admin_approval', '2022-10-04 09:54:02', '2022-10-04 09:54:02'),
(2, 1, 5, 'this is my bank account number.', 'this is test resone', 'awaiting_for_admin_approval', '2022-10-04 10:17:51', '2022-10-04 10:17:51'),
(3, 1, 6, 'this is my bank information.', 'this is test resone', 'awaiting_for_admin_approval', '2022-11-09 05:49:24', '2022-11-09 05:49:24'),
(4, 1, 10, 'this is my account information\r\nIBBL USA, Account : 9485998434.....9895453', 'This is test resone', 'awaiting_for_admin_approval', '2022-12-21 03:47:22', '2022-12-21 03:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `author_id` int(10) NOT NULL DEFAULT 0,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `order_id`, `variant_id`, `user_id`, `author_id`, `review`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 16, 1, 41, 1, 2, 'I am absolutely in love with this stunning, handcrafted wooden watch. Its intricate detailing and rich mahogany finish make it a true work of art.', 5, 1, '2023-06-26 05:57:09', '2023-06-26 05:58:45'),
(2, 14, 1, 37, 1, 2, 'The vibrant colors and silky-smooth texture of this high-quality silk scarf instantly elevate any outfit. It&#039;s a versatile accessory that adds a touch of elegance to my wardrobe.', 5, 1, '2023-06-26 05:57:39', '2023-06-26 05:58:44'),
(3, 12, 1, NULL, 1, 2, 'I can&#039;t stop admiring the exquisite design of this crystal chandelier. The sparkling crystals and delicate curves create a captivating centerpiece in my living room.', 5, 1, '2023-06-26 05:58:29', '2023-06-26 05:58:43'),
(4, 24, 2, NULL, 2, 1, 'This sleek and compact espresso machine not only delivers a perfect cup of coffee every time, but its modern stainless steel finish adds a touch of sophistication to my kitchen countertop.', 5, 1, '2023-06-26 06:13:12', '2023-06-26 06:14:59'),
(5, 18, 2, 45, 2, 1, 'The scent of this luxurious, hand-poured soy candle fills my home with an enchanting aroma. Its long-lasting burn time and elegant glass jar make it a must-have for creating a cozy ambiance.', 5, 1, '2023-06-26 06:13:29', '2023-06-26 06:14:57'),
(6, 23, 2, NULL, 2, 1, 'I am amazed by the exceptional sound quality and stylish design of these wireless earbuds. The ergonomic fit ensures a comfortable listening experience, while the sleek metallic accents add a touch of sophistication', 5, 1, '2023-06-26 06:13:50', '2023-06-26 06:14:56'),
(7, 21, 2, NULL, 2, 1, 'I cannot express how much I adore this beautifully crafted leather handbag. The attention to detail, premium materials, and timeless design make it a true statement piece that I receive compliments on everywhere I go.', 5, 1, '2023-06-26 06:14:42', '2023-06-26 06:14:54'),
(8, 24, 3, NULL, 3, 1, 'I cannot express how much I adore this beautifully crafted leather handbag. The attention to detail, premium materials, and timeless design make it a true statement piece that I receive compliments on everywhere I go.', 5, 1, '2023-06-26 06:24:01', '2023-06-26 06:25:07'),
(9, 23, 3, NULL, 3, 1, 'I am blown away by the performance of this high-definition 4K smart TV. The stunning visuals, vibrant colors, and immersive sound transport me to another world every time I watch my favorite movies and shows.', 5, 1, '2023-06-26 06:24:21', '2023-06-26 06:25:06'),
(10, 22, 3, NULL, 3, 1, 'This ergonomic office chair has completely transformed my work-from-home experience.', 3, 1, '2023-06-26 06:24:52', '2023-06-26 06:25:05'),
(15, 5, 8, 28, 1, 3, 'Test review', 4, 1, '2023-08-06 12:21:07', '2023-08-06 12:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `script_contents`
--

CREATE TABLE `script_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `regular_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extend_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `script_contents`
--

INSERT INTO `script_contents` (`id`, `regular_content`, `extend_content`, `status`, `created_at`, `updated_at`) VALUES
(1, '<ul class=\"feature\">\r\n<li style=\"text-align: left;\">All time Future updates</li>\r\n<li style=\"text-align: left;\">Quality checked by DigMark</li>\r\n<li style=\"text-align: left;\">6 months support from author</li>\r\n</ul>', '<ul class=\"feature\">\r\n<li style=\"text-align: left;\">All time Future updates</li>\r\n<li style=\"text-align: left;\">Quality checked by DigMark</li>\r\n<li style=\"text-align: left;\">12 months support from author</li>\r\n</ul>', 0, '2023-06-06 07:09:26', '2023-06-25 11:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `section_contents`
--

CREATE TABLE `section_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_contents`
--

INSERT INTO `section_contents` (`id`, `section_name`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Category', 'Save time with pre-installed software.', 'Browse Best Categories', NULL, '2023-01-15 04:23:04'),
(2, 'Product', 'Save time with pre-installed software.', 'Themes and Templates for every Budget & every Project.', NULL, '2022-11-06 07:11:42'),
(3, 'Recent Approved', 'Save time with pre-installed software.', 'Recent Approved Products\n', NULL, '2022-11-06 07:11:48'),
(4, 'Testimonial', 'Save time with pre-installed software.', 'Our Customer feedback', NULL, '2023-06-22 11:53:52'),
(5, 'Latest News', 'Latest News', 'Latest from Blog', NULL, '2023-07-26 12:02:42'),
(6, 'Featured Product', 'Save time with pre-installed software.', 'Featured Items Alasmart.', NULL, '2023-07-19 10:14:24'),
(7, 'Trending Product', 'Save time with pre-installed software.', 'Trending Themes', NULL, '2023-07-19 11:14:21'),
(8, 'New Product', 'Save time with pre-installed software.', 'New Products', NULL, '2023-07-19 11:15:18'),
(9, 'Our Teem', 'Our Expert Team', 'Expert Team Member', NULL, '2023-07-19 11:32:17'),
(10, 'Template ', 'From multipurpose themes to niche templates', 'The only one Template you need', NULL, '2023-07-20 06:39:35'),
(11, 'Partner', 'Save time with pre-installed software.', 'Some of Our Customers', NULL, '2023-07-20 12:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `section_controls`
--

CREATE TABLE `section_controls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_controls`
--

INSERT INTO `section_controls` (`id`, `page_name`, `section_name`, `status`, `qty`, `created_at`, `updated_at`) VALUES
(1, 'home1', 'Intro(Home1, Home2, Home3)', 1, 0, NULL, '2022-09-27 07:34:04'),
(2, 'home1', 'Category (Home1, Home2, Home3, Become an author)', 1, 9, NULL, '2023-06-26 08:11:55'),
(3, 'home1', 'Product (Home1, Home2, Home3)', 1, 9, NULL, '2023-07-24 06:08:55'),
(4, 'home1', 'Countdown (Home2, Home3)', 1, 0, NULL, '2022-09-29 06:42:30'),
(5, 'home1', 'Special Offer Banner(Home1, Home2, Home3)', 1, 0, NULL, '2022-10-03 10:21:35'),
(6, 'home1', 'Recent Product(Home1, Home2, Home3)', 1, 24, NULL, '2023-06-25 11:15:37'),
(7, 'home1', 'Mobile app (Home1, Home2, Home3)', 1, 0, NULL, '2022-09-27 08:11:30'),
(8, 'home1', 'Testimonial (Home1, Home3)', 1, 6, NULL, '2022-09-29 06:47:03'),
(9, 'home1', 'Blog (Home1)', 1, 2, NULL, '2023-07-26 04:10:22'),
(10, 'home1', 'Why Choose Us (Home1, Home2, Home3)', 1, 0, NULL, NULL),
(22, 'home1', 'Our Partner(Home1)', 1, 20, NULL, '2022-09-29 06:56:54'),
(35, 'about', 'Our Team(About, Become an author)', 1, 10, NULL, '2022-09-27 09:19:53'),
(36, 'about', 'Why Choose Us (About)', 1, 0, NULL, '2022-09-27 09:19:53'),
(37, 'about', 'Testimonial (About)', 1, 4, NULL, '2022-09-29 06:42:30'),
(38, 'about', 'Mobile App (About)', 1, 0, NULL, '2022-09-27 09:25:25'),
(39, 'about', 'Our Partner (About)', 0, 10, NULL, '2022-09-27 09:30:26'),
(40, 'about', 'Testimonial (About)', 1, 6, NULL, '2022-09-29 06:47:04'),
(41, 'service', 'Blog (About)', 1, 20, NULL, '2022-09-29 06:56:54'),
(42, 'featured', 'Featured Items(Home1, Home2, Home3)', 1, 3, NULL, '2023-07-22 14:44:13'),
(43, 'home2', 'Blog(Home2)', 1, 3, NULL, '2023-07-26 12:09:53'),
(44, 'home3', 'Blog(Home3)', 1, 3, NULL, '2023-07-22 14:54:06'),
(45, 'template', 'Template ', 1, 0, NULL, '2023-07-24 09:06:45'),
(46, 'trending', 'Trending items', 1, 30, NULL, '2023-07-26 04:35:01'),
(47, 'new product', 'New product(Home3)', 1, 9, NULL, '2023-07-27 04:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `seo_settings`
--

CREATE TABLE `seo_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo_settings`
--

INSERT INTO `seo_settings` (`id`, `page_name`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(1, 'Home Page', 'Home page - Service', 'Home Page', NULL, '2022-09-27 10:11:58'),
(2, 'About Us', 'About Us - Service', 'About Us', NULL, '2022-09-27 10:12:02'),
(3, 'Contact Us', 'Contact Us - Service', 'Contact Us', NULL, '2022-09-27 10:12:07'),
(5, 'Products', 'Our Product - Product', 'Our Service', NULL, '2022-09-27 10:19:48'),
(6, 'Blog', 'Blog - Service', 'Blog', NULL, '2022-09-27 10:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maintenance_mode` int(11) NOT NULL DEFAULT 0,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable_subscription_notify` int(11) NOT NULL DEFAULT 1,
  `enable_save_contact_message` int(11) NOT NULL DEFAULT 1,
  `text_direction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'LTR',
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_lg_header` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_sm_header` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topbar_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topbar_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_rate` double NOT NULL DEFAULT 1,
  `theme_one` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscriber_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscriber_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscriber_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_bg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_subscription_bg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home3_subscription_bg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_page_subscription_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_contact_foreground` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_contact_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_contact_call_as` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_contact_available` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_contact_form_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_contact_form_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_it_work_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_it_work_foreground` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_it_work_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_it_work_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_it_work_items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selected_theme` int(1) NOT NULL DEFAULT 0,
  `blog_left_right` int(11) DEFAULT 0,
  `theme_one_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_two_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_three_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `maintenance_mode`, `logo`, `logo_two`, `logo_three`, `favicon`, `contact_email`, `enable_subscription_notify`, `enable_save_contact_message`, `text_direction`, `timezone`, `sidebar_lg_header`, `sidebar_sm_header`, `topbar_phone`, `topbar_email`, `opening_time`, `currency_name`, `currency_icon`, `currency_rate`, `theme_one`, `subscriber_image`, `subscriber_title`, `subscriber_description`, `subscription_bg`, `home2_subscription_bg`, `home3_subscription_bg`, `blog_page_subscription_image`, `default_avatar`, `home2_contact_foreground`, `home2_contact_background`, `home2_contact_call_as`, `home2_contact_phone`, `home2_contact_available`, `home2_contact_form_title`, `home2_contact_form_description`, `how_it_work_background`, `how_it_work_foreground`, `how_it_work_title`, `how_it_work_description`, `how_it_work_items`, `selected_theme`, `blog_left_right`, `theme_one_color`, `theme_two_color`, `theme_three_color`, `login_image`, `footer_logo`, `footer_logo_two`, `footer_logo_three`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/website-images/logo-2023-08-08-04-45-31-7094.png', 'uploads/website-images/logo-2023-06-07-10-40-32-7697.png', 'uploads/website-images/logo-2023-06-07-10-40-33-9507.png', 'uploads/website-images/favicon-2023-08-08-05-14-26-7280.png', 'contact@gmail.com', 1, 1, 'ltr', 'Asia/Dhaka', 'ALASMAET', 'DM', '+1347-430-9510', 'websolutionus1@gmail.com', '10.00 AM-7.00PM', 'USD', '$', 85.76, '#009bc2', 'uploads/website-images/sub-foreground--2023-01-22-01-32-17-2063.png', 'Subscribe Now', 'Get the updates, offers, tips and enhance your page building experience', 'uploads/website-images/sub-background-2023-07-23-01-53-07-3476.jpg', 'uploads/website-images/sub-background-2023-07-23-09-52-07-5275.jpg', 'uploads/website-images/sub-background-2023-07-23-01-53-00-3548.jpg', 'uploads/website-images/blog-sub-background-2023-07-19-04-43-08-8818.png', 'uploads/website-images/default-avatar-2023-06-06-06-05-18-9960.png', 'uploads/website-images/home2-contact-foreground--2022-12-03-06-08-24-3082.png', 'uploads/website-images/home2-contact-background-2022-09-22-12-08-16-6090.jpg', 'Call as now', '+90 456 789 251', 'We are available 24/7', 'Do you have any question ?', 'Fill the form now & Request an Estimate', 'uploads/website-images/home3-hiw-background-2022-09-22-12-52-40-5965.jpg', 'uploads/website-images/home3-hiw-foreground--2022-09-29-01-06-00-1394.jpg', 'Enjoy Services', 'If you are going to use a passage of you need to be sure there isn\'t anything emc barrassing hidden in the middle', '[{\"title\":\"Select The Service\",\"description\":\"There are many variations of passages of Lorem Ipsum available, but the majority have\"},{\"title\":\"Pick Your Schedule\",\"description\":\"There are many variations of passages of Lorem Ipsum available, but the majority have\"},{\"title\":\"Place Your Booking & Relax\",\"description\":\"There are many variations of passages of Lorem Ipsum available, but the majority have\"}]', 0, 1, '#378fff', '#00bf8c', '#2251f2', 'uploads/website-images/login-page-2022-11-06-04-12-11-6638.png', 'uploads/website-images/logo-2023-08-08-05-12-32-2674.png', 'uploads/website-images/logo-2023-06-07-11-04-54-2918.png', 'uploads/website-images/logo-2023-06-07-11-04-54-6908.png', NULL, '2023-08-08 11:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `home1_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home1_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home3_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home3_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_sold` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home1_bg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home2_bg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home3_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home3_bg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `home1_title`, `home2_title`, `home1_description`, `home2_description`, `home3_title`, `home3_description`, `total_product`, `total_sold`, `total_user`, `home2_image`, `home1_bg`, `home2_bg`, `home3_image`, `home3_bg`, `created_at`, `updated_at`) VALUES
(1, 'The world’s largest Website Digital Marketplace', 'Digital Marketplace sell Products', 'Save time with preconfigured environments that alreadyinto theon the find to find all the prerequisites installed which removes.', 'Save time with preconfigured environments that alreadyinto theon the find to find all the prerequisites installed which removes.', 'Best place to buy and sell digital products.', 'Website, Graphics, and Plugins Marketplace', '34', '2', '243', 'uploads/website-images/slider-2023-07-26-12-56-49-1064.png', 'uploads/website-images/slider-2023-07-24-09-44-11-1729.jpg', 'uploads/website-images/slider-2023-07-26-12-56-49-5186.jpg', 'uploads/website-images/slider-2023-07-19-03-54-26-8823.png', 'uploads/website-images/slider-2023-07-19-03-54-26-5203.jpg', '2022-01-30 10:25:59', '2023-07-27 03:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `social_login_information`
--

CREATE TABLE `social_login_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_gmail` int(11) NOT NULL DEFAULT 0,
  `gmail_client_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmail_secret_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmail_redirect_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_login_information`
--

INSERT INTO `social_login_information` (`id`, `is_gmail`, `gmail_client_id`, `gmail_secret_id`, `gmail_redirect_url`, `created_at`, `updated_at`) VALUES
(1, 1, '323323272597-gtl9kuearctqrjk9plp9vs7uouj2uujp.apps.googleusercontent.com', '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', 'http://localhost/degmark_digital_market_place/script_content/main_files/callback/google/', NULL, '2023-06-14 10:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `sslcommerz_payments`
--

CREATE TABLE `sslcommerz_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `store_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_password` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_rate` double(8,2) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sslcommerz_payments`
--

INSERT INTO `sslcommerz_payments` (`id`, `status`, `store_id`, `store_password`, `country_code`, `currency_code`, `currency_rate`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'degma645b10929dcac', 'degma645b10929dcac@ssl', 'US', 'USD', 1.00, 'uploads/website-images/sslcommerz-2023-05-11-05-11-25-6099.png', '2023-05-11 10:42:00', '2023-05-11 11:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `stripe_payments`
--

CREATE TABLE `stripe_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `stripe_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_rate` double NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stripe_payments`
--

INSERT INTO `stripe_payments` (`id`, `status`, `stripe_key`, `stripe_secret`, `created_at`, `updated_at`, `country_code`, `currency_code`, `currency_rate`, `image`) VALUES
(1, 1, 'pk_test_51LBgDoBsmz7k2BTD4eYrzmvswQIIm6nNmYTCMNSaMXTGde9ay60iJBP2iZhY2Fg6FM1hjk9BE1fudSWSxe6vxojG00gQN55ihb', 'sk_test_51LBgDoBsmz7k2BTDEu7pmlecAU84RwZhOx869Bz0ujoP4hDpyxePhOsepBYANVNey5W9OmUQ6112dZqzcdq4xRmX00l6OEWd8b', NULL, '2023-05-11 11:35:11', 'US', 'USD', 1, 'uploads/website-images/stripe-2023-05-11-05-35-11-6150.png');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `verified_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `status`, `verified_token`, `is_verified`, `created_at`, `updated_at`) VALUES
(1, 'user@gmail.com', 0, NULL, 1, '2023-06-26 11:04:48', '2023-06-26 11:06:24'),
(2, 'user2@gmail.com', 0, NULL, 1, '2023-06-26 11:05:11', '2023-06-26 11:06:33'),
(3, 'degmark@gmail.com', 0, NULL, 1, '2023-06-26 11:05:41', '2023-06-26 11:06:40'),
(4, 'johndoe@gmail.com', 0, NULL, 1, '2023-06-26 11:05:57', '2023-06-26 11:06:47'),
(5, 'ffsff', 0, 'Cqkuzy2zNBStg4NmeKreoKK0I', 0, '2023-07-29 09:50:09', '2023-07-29 09:50:09'),
(6, 'sfsdfdsfsf', 0, 'rgx8Ut3jjo9RsEKI4ZI7y0Y3l', 0, '2023-07-29 09:50:13', '2023-07-29 09:50:13'),
(7, 'riponchandra667@gmail.com', 0, 'chdlneIbAyggY0jH1nficNQVr', 0, '2023-07-29 09:56:34', '2023-07-29 09:56:34'),
(8, 'manik@gmail.com', 0, 'sPW4TsRf0fhgoFkDVbllLisrH', 0, '2023-07-30 05:32:35', '2023-07-30 05:32:35'),
(9, 'rahim@gmail.com', 0, '0OMAAAhBte2kcGBrmBldyQytT', 0, '2023-08-08 12:28:53', '2023-08-08 12:28:53');

-- --------------------------------------------------------

--
-- Table structure for table `tawk_chats`
--

CREATE TABLE `tawk_chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tawk_chats`
--

INSERT INTO `tawk_chats` (`id`, `chat_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'https://embed.tawk.to/5a7c31ded7591465c7077c48/default', 1, '2023-06-24 08:37:29', '2023-06-24 09:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `image`, `title`, `description`, `link`, `status`, `created_at`, `updated_at`) VALUES
(3, 'uploads/custom-images/template--2023-07-20-02-13-49-2659.png', 'Flexible Prices no Surprises', 'There are many variationts of passages Lorem Ipsum available, but the majorit have suffered alteration', 'https://codecanyon.net/user/websolutionus', 1, '2023-07-20 08:13:49', '2023-07-20 08:13:49'),
(4, 'uploads/custom-images/template--2023-07-20-02-15-08-2658.png', 'Friendly Our Support', 'There are many variationts of passages Lorem Ipsum available, but the majorit have suffered alteration', 'https://codecanyon.net/user/websolutionus', 1, '2023-07-20 08:15:08', '2023-07-20 08:15:08'),
(5, 'uploads/custom-images/template--2023-07-24-03-27-03-9681.png', 'Flexible Prices no Surprises', 'There are many variationts of passages Lorem Ipsum available, but the majorit have suffered alteration', 'https://codecanyon.net/user/websolutionus', 1, '2023-07-20 08:15:44', '2023-07-24 09:27:03'),
(6, 'uploads/custom-images/template--2023-07-24-03-24-43-3741.png', 'Graphic Design Services', 'There are many variationts of passages Lorem Ipsum available, but the majorit have suffered alteration', 'https://codecanyon.net/user/websolutionus', 1, '2023-07-24 09:24:43', '2023-07-24 09:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions`
--

CREATE TABLE `terms_and_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `terms_and_condition` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy_policy` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_and_conditions`
--

INSERT INTO `terms_and_conditions` (`id`, `terms_and_condition`, `privacy_policy`, `created_at`, `updated_at`) VALUES
(1, '<p><strong>1. What Are Terms and Conditions?</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriefss asbut also the on leap into a electironc typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andeiss more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>2. Does My Online Service Need Terms and Conditions?</strong></p>\r\n<p>While it&rsquo;s not legally required for ecommerce websites to have a terms and conditions agreement, adding one will help protect your as sonline business.As terms and conditions are legally enforceable rules, they allow you to set standards for how users interact with your site. Here are some of the major abenefits of including terms and conditions on your ecommerce site.&nbsp;</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the obb1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop.</p>\r\n<p><strong>Features :</strong></p>\r\n<ul>\r\n<li>Lim body with metal cover</li>\r\n<li>Latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</li>\r\n</ul>\r\n<p><strong>3. Protect Your Property</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>4. What to Include in Terms and Conditions for Online Stores</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas&nbsp; Ipsum to make a type specimen book.</p>\r\n<p><strong>05.Pricing and Payment Terms</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>', '<p><strong>1. What Are Privacy Policy?</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriefss asbut also the on leap into a electironc typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andeiss more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>2. Ecommerce Terms and Conditions Examples</strong></p>\r\n<p>While it&rsquo;s not legally required for ecommerce websites to have a terms and conditions agreement, adding one will help protect your as sonline business.As terms and conditions are legally enforceable rules, they allow you to set standards for how users interact with your site. Here are some of the major abenefits of including terms and conditions on your ecommerce site:</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the obb1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop.</p>\r\n<p><strong>Features :</strong></p>\r\n<ul>\r\n<li>Slim body with metal cover</li>\r\n<li>Latest Intel Core i5-1135G7 processor (4 cores / 8 threads)</li>\r\n<li>8GB DDR4 RAM and fast 512GB PCIe SSD</li>\r\n<li>NVIDIA GeForce MX350 2GB GDDR5 graphics card backlit keyboard, touchpad with gesture support</li>\r\n</ul>\r\n<p><strong>3. Protect Your Property</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuriezcs but also the on leap into as eylectronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraszvxet sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book. five centuries but also a the on leap into electronic typesetting, remaining essentially unchanged. It aswasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop our aspublishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p><strong>4. What to Include in Terms and Conditions for Online Stores</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also the on leap into as electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of as Leitraset sheets containing Loriem Ipsum passages, our andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Loriem Ipsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets as containing Lorem Ipsum passages, andei more recently with a desktop publishing software like Aldus PageMaker including versions of Loremas&nbsp; Ipsum to make a type specimen book.</p>\r\n<p><strong>05.Pricing and Payment Terms</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five as centuries but also as the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release as of Letraset sheets containing Lorem Ipsum our spassages, andei more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>\r\n<p>Five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing software like Aldus PageMaker our as including versions of Lorem aIpsum to make a type specimen book. It wasn&rsquo;t popularised in the 1960s with the release of Letraset sheetsasd containing Lorem Ipsum passages, andei more recentlysl with desktop publishing software like Aldus PageMaker including versions of Loremadfsfds Ipsum to make a type specimen book.</p>\r\n<p>It has survived not only five centuries but also the on leap into electronic typesetting, remaining essentially unchanged. It wasn&rsquo;t popularised in the our 1960s with the release of Letraset sheets containing Lorem Ipsum passages, andei more recently with desktop publishing asou software like Aldus PageMaker including versions of Lorem Ipsum to make a type specimen book.</p>', '2022-01-30 12:34:53', '2023-06-26 07:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `image`, `designation`, `comment`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'uploads/custom-images/john-doe20230626012334.png', 'MBBS, FCPS, FRCS', 'There are mainy variatons of passages of abut the majority have suffereds alteration in humour, or randomisejd words which rando generators on the Internet tend', '4', 1, '2023-06-26 07:21:06', '2023-07-26 11:13:45'),
(2, 'David Richard', 'uploads/custom-images/david-richard-20230626012201.png', 'Web Developer', 'There are mainy variatons of passages of abut the majority have suffereds alteration in humour, or randomisejd words which rando generators on the Internet tend', '5', 1, '2023-06-26 07:22:01', '2023-06-26 07:22:01'),
(3, 'David Simmons', 'uploads/custom-images/david-simmons-20230626012312.png', 'Graphic Designer', 'There are mainy variatons of passages of abut the majority have suffereds alteration in humour, or randomisejd words which rando generators on the Internet tend', '5', 1, '2023-06-26 07:23:12', '2023-06-26 07:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forget_password_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forget_password_otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_provider` int(10) NOT NULL DEFAULT 0,
  `verify_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_mail_verify_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified` int(1) NOT NULL DEFAULT 0,
  `agree_policy` int(1) DEFAULT 0,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedIn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dribbble` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `my_skill` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `email_verified_at`, `password`, `remember_token`, `forget_password_token`, `forget_password_otp`, `status`, `provider_id`, `provider`, `provider_avatar`, `image`, `phone`, `country`, `state`, `city`, `zip_code`, `address`, `is_provider`, `verify_token`, `otp_mail_verify_token`, `email_verified`, `agree_policy`, `designation`, `about_me`, `facebook`, `pinterest`, `linkedIn`, `dribbble`, `twitter`, `my_skill`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'john_doe_319375', 'user@gmail.com', NULL, '$2y$10$zRAZPe87kZ1Y5f9uKYI60evJ2/ssTHcglsRL7VswiNq5dSlez4Tci', NULL, NULL, NULL, 1, NULL, NULL, NULL, 'uploads/custom-images/john-doe-2023-08-08-10-55-30-6632.png', '22-402-666', 'United State', '22-402-666', 'Los Angeles', NULL, 'California, Los Angeles', 0, NULL, NULL, 1, 0, 'PHP, HTML5, CSS3, jQuery, Web Design, UI - UX Design.', '&lt;p&gt;Hello, I&amp;rsquo;m John Doe.&lt;/p&gt;\r\n&lt;p&gt;UI, UX, Frontend Development, Backend Development and much more...&lt;/p&gt;\r\n&lt;p&gt;PHP, HTML5, CSS3, jQuery, Web Design, UI - UX Design.&lt;/p&gt;\r\n&lt;p&gt;I have been working as a freelancer for more than 10 years. And I have experience at this level as well. If you have special requests, you can contact me by e-mail. I can do what you want in a short time and deliver it in a very clean way.&lt;/p&gt;\r\n&lt;p&gt;Mail: Demoemail@mail.com&lt;/p&gt;\r\n&lt;p&gt;You can contact me faster on Instagram. If you follow and send a message, I will respond to messages within 30 minutes. If you don&#039;t follow me, I won&#039;t see the message because it goes to your other folder.&lt;/p&gt;\r\n&lt;p&gt;Contact me on Instagram!&lt;/p&gt;\r\n&lt;p&gt;Thank you.&lt;/p&gt;', 'https://facebook.com', 'https://pinterest.com', 'https://linkedin.com', 'https://dribble.com', 'https://twitter.com', '&lt;p&gt;This is one of the best WordPress Theme. It is clean, user friendly, fully responsive, pixel perfect, modern design with latest WordPress Technologies&lt;/p&gt;\r\n&lt;p&gt;Fully Responsive Bootstrap Based (3.x) Latest&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Clean, Modern &amp;amp; Beautiful Design&lt;/li&gt;\r\n&lt;li&gt;4 Unique Header Style&lt;/li&gt;\r\n&lt;li&gt;Elementor Page Builder&lt;/li&gt;\r\n&lt;li&gt;4 Footer Copyright Style&lt;/li&gt;\r\n&lt;li&gt;100% Valid Code&lt;/li&gt;\r\n&lt;li&gt;3000+ Font Icon&lt;/li&gt;\r\n&lt;li&gt;One Click Demo Import&lt;/li&gt;\r\n&lt;li&gt;Powerful Options Panel&lt;/li&gt;\r\n&lt;/ul&gt;', '2023-06-24 11:29:11', '2023-08-08 05:46:17'),
(2, 'Amaya Hendrix', 'amaya_hendrix_139005', 'user2@gmail.com', NULL, '$2y$10$KiohMACMHKcMtu7vCQ.15.vedrv.jiHla1mjXQTnrL4CYjPdT//VG', NULL, NULL, NULL, 1, NULL, NULL, NULL, 'uploads/custom-images/amaya-hendrix-2023-06-26-08-54-09-5323.jpg', '123-874-8948', '1', '1', '7', NULL, 'San Diego, California, United State.', 0, NULL, NULL, 1, 0, 'PHP, Laravel, React, CSS3, jQuery, Backend Developer', '&lt;p&gt;Hello, I&amp;rsquo;m Amaya Hendrix.&lt;/p&gt;\r\n&lt;p&gt;PHP, Laravel, Backend Development, Backend Development and much more...&lt;/p&gt;\r\n&lt;p&gt;PHP, HTML5, CSS3, jQuery, React Web Development.&lt;/p&gt;\r\n&lt;p&gt;I have been working as a freelancer for more than 10 years. And I have experience at this level as well. If you have special requests, you can contact me by e-mail. I can do what you want in a short time and deliver it in a very clean way.&lt;/p&gt;\r\n&lt;p&gt;Mail: demoemail@mail.com&lt;/p&gt;\r\n&lt;p&gt;You can contact me faster on Instagram. If you follow and send a message, I will respond to messages within 30 minutes. If you don&#039;t follow me, I won&#039;t see the message because it goes to your other folder.&lt;/p&gt;\r\n&lt;p&gt;Contact me on Instagram!&lt;/p&gt;\r\n&lt;p&gt;Thank you.&lt;/p&gt;', 'https://facebook.com', 'https://pinterest.com', 'https://linkedin.com', 'https://dribble.com', 'https://twitter.com', '&lt;p&gt;Hello! I am an experienced PHP Laravel Developer with a strong passion for creating robust and scalable web applications. With a solid background in PHP programming and expertise in the Laravel framework, I am confident in my ability to develop efficient and high-quality solutions.&lt;/p&gt;\r\n&lt;h3&gt;working experiences:&lt;/h3&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;Laravel Development: I have a deep understanding of the Laravel framework and its ecosystem. I can effectively utilize Laravel&#039;s features, such as routing, migrations, caching, and ORM, to develop secure and efficient web applications.&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;PHP Programming: I possess extensive knowledge of PHP programming and am proficient in writing clean, well-documented, and maintainable code. I am familiar with PHP frameworks and libraries, allowing me to leverage existing tools to streamline development processes.&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;', '2023-06-26 02:25:32', '2023-06-26 02:54:09'),
(3, 'Harding Rosa', 'harding_rosa_402855', 'user3@gmail.com', NULL, '$2y$10$tSa2PjFBchwYyPKJeA2mgOKkM/ebzepTOYukzHZTr/P.oorCjihQm', NULL, NULL, NULL, 1, NULL, NULL, NULL, 'uploads/custom-images/harding-rosa-2023-06-26-09-01-06-6172.png', '123-874-8922', '1', '1', '6', NULL, 'San Jose, California, United State', 0, NULL, NULL, 1, 0, 'PHP, HTML5, CSS3, jQuery, Web Design, and Profetional Wordpress Developer.', '&lt;p&gt;Hello, I&amp;rsquo;m John Doe.&lt;/p&gt;\r\n&lt;p&gt;UI, UX, Frontend Development, Backend Development and much more...&lt;/p&gt;\r\n&lt;p&gt;PHP, HTML5, CSS3, jQuery, Web Design, and Profetional Wordpress Developer.&lt;/p&gt;\r\n&lt;p&gt;I have been working as a freelancer for more than 10 years. And I have experience at this level as well. If you have special requests, you can contact me by e-mail. I can do what you want in a short time and deliver it in a very clean way.&lt;/p&gt;\r\n&lt;p&gt;Mail: demoemail@mail.com&lt;/p&gt;\r\n&lt;p&gt;You can contact me faster on Instagram. If you follow and send a message, I will respond to messages within 30 minutes. If you don&#039;t follow me, I won&#039;t see the message because it goes to your other folder.&lt;/p&gt;\r\n&lt;p&gt;Contact me on Instagram!&lt;/p&gt;\r\n&lt;p&gt;Thank you.&lt;/p&gt;', 'https://facebook.com', 'https://pinterest.com', 'https://linkedin.com', 'https://dribble.com', 'https://twitter.com', '&lt;p&gt;This is one of the best WordPress Theme. It is clean, user friendly, fully responsive, pixel perfect, modern design with latest WordPress Technologies&lt;/p&gt;\r\n&lt;p&gt;Fully Responsive Bootstrap Based (3.x) Latest&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Clean, Modern &amp;amp; Beautiful Design&lt;/li&gt;\r\n&lt;li&gt;4 Unique Header Style&lt;/li&gt;\r\n&lt;li&gt;Elementor Page Builder&lt;/li&gt;\r\n&lt;li&gt;4 Footer Copyright Style&lt;/li&gt;\r\n&lt;li&gt;100% Valid Code&lt;/li&gt;\r\n&lt;li&gt;3000+ Font Icon&lt;/li&gt;\r\n&lt;li&gt;One Click Demo Import&lt;/li&gt;\r\n&lt;li&gt;Powerful Options Panel&lt;/li&gt;\r\n&lt;/ul&gt;', '2023-06-26 02:26:10', '2023-06-26 06:52:26'),
(4, 'Nasim Horne', 'nasim_horne_160396', 'user4@gmail.com', NULL, '$2y$10$IMxaIBMqXSM.9aBW5xoxm.q/6lwAfgdFuBXnI4t8oTJZCf0L3lPoG', NULL, NULL, NULL, 1, NULL, NULL, NULL, 'uploads/custom-images/nasim-horne-2023-06-26-09-05-07-8082.png', '123-874-8143', '1', '2', '5', NULL, 'Weston, Florida, United State', 0, NULL, NULL, 1, 0, 'PHP, Laravel, React, CSS3, jQuery, Backend Developer', '&lt;p&gt;Hello, I&amp;rsquo;m Amaya Hendrix.&lt;/p&gt;\r\n&lt;p&gt;PHP, Laravel, Backend Development, Backend Development and much more...&lt;/p&gt;\r\n&lt;p&gt;PHP, HTML5, CSS3, jQuery, React Web Development.&lt;/p&gt;\r\n&lt;p&gt;I have been working as a freelancer for more than 10 years. And I have experience at this level as well. If you have special requests, you can contact me by e-mail. I can do what you want in a short time and deliver it in a very clean way.&lt;/p&gt;\r\n&lt;p&gt;Mail: demoemail@mail.com&lt;/p&gt;\r\n&lt;p&gt;You can contact me faster on Instagram. If you follow and send a message, I will respond to messages within 30 minutes. If you don&#039;t follow me, I won&#039;t see the message because it goes to your other folder.&lt;/p&gt;\r\n&lt;p&gt;Contact me on Instagram!&lt;/p&gt;\r\n&lt;p&gt;Thank you.&lt;/p&gt;', 'https://facebook.com', 'https://pinterest.com', 'https://linkedin.com', 'https://dribble.com', 'https://twitter.com', '&lt;p&gt;Hello! I am an experienced PHP Laravel Developer with a strong passion for creating robust and scalable web applications. With a solid background in PHP programming and expertise in the Laravel framework, I am confident in my ability to develop efficient and high-quality solutions.&lt;/p&gt;\r\n&lt;h3&gt;working experiences:&lt;/h3&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;Laravel Development: I have a deep understanding of the Laravel framework and its ecosystem. I can effectively utilize Laravel&#039;s features, such as routing, migrations, caching, and ORM, to develop secure and efficient web applications.&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;li&gt;\r\n&lt;p&gt;PHP Programming: I possess extensive knowledge of PHP programming and am proficient in writing clean, well-documented, and maintainable code. I am familiar with PHP frameworks and libraries, allowing me to leverage existing tools to streamline development processes.&lt;/p&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;', '2023-06-26 02:26:46', '2023-06-26 03:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `author_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 16, '2023-06-26 05:46:48', '2023-06-26 05:46:48'),
(2, 1, 2, 12, '2023-06-26 05:48:00', '2023-06-26 05:48:00'),
(3, 1, 2, 11, '2023-06-26 05:48:16', '2023-06-26 05:48:16'),
(4, 1, 3, 6, '2023-06-26 05:49:03', '2023-06-26 05:49:03'),
(5, 1, 3, 3, '2023-06-26 05:51:30', '2023-06-26 05:51:30'),
(7, 2, 1, 24, '2023-06-26 06:03:25', '2023-06-26 06:03:25'),
(8, 2, 1, 18, '2023-06-26 06:04:15', '2023-06-26 06:04:15'),
(9, 2, 1, 23, '2023-06-26 06:04:41', '2023-06-26 06:04:41'),
(10, 2, 2, 9, '2023-06-26 06:16:34', '2023-06-26 06:16:34'),
(11, 2, 2, 10, '2023-06-26 06:16:43', '2023-06-26 06:16:43'),
(12, 2, 2, 12, '2023-06-26 06:17:02', '2023-06-26 06:17:02'),
(13, 3, 1, 24, '2023-06-26 06:19:39', '2023-06-26 06:19:39'),
(14, 3, 1, 23, '2023-06-26 06:20:02', '2023-06-26 06:20:02'),
(15, 3, 2, 16, '2023-06-26 06:20:47', '2023-06-26 06:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_methods`
--

CREATE TABLE `withdraw_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_amount` double NOT NULL DEFAULT 0,
  `max_amount` double NOT NULL DEFAULT 0,
  `withdraw_charge` double NOT NULL DEFAULT 0,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw_methods`
--

INSERT INTO `withdraw_methods` (`id`, `name`, `min_amount`, `max_amount`, `withdraw_charge`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bank Payment', 10, 100, 10, '<p>Bank Name: Your bank name</p>\r\n<p><span style=\"background-color: transparent;\">Account Number:&nbsp; Your bank account number</span></p>\r\n<p>Routing Number: Your bank routing number</p>\r\n<p>Branch: Your bank branch name</p>', 1, '2023-06-26 07:25:58', '2023-06-26 07:30:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `additional_services`
--
ALTER TABLE `additional_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_payments`
--
ALTER TABLE `bank_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_images`
--
ALTER TABLE `banner_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `become_authors`
--
ALTER TABLE `become_authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complete_requests`
--
ALTER TABLE `complete_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_pages`
--
ALTER TABLE `contact_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cookie_consents`
--
ALTER TABLE `cookie_consents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_states`
--
ALTER TABLE `country_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_countries`
--
ALTER TABLE `currency_countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `custom_pages`
--
ALTER TABLE `custom_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_paginations`
--
ALTER TABLE `custom_paginations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_configurations`
--
ALTER TABLE `email_configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `error_pages`
--
ALTER TABLE `error_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facebook_comments`
--
ALTER TABLE `facebook_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facebook_pixels`
--
ALTER TABLE `facebook_pixels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flutterwaves`
--
ALTER TABLE `flutterwaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_links`
--
ALTER TABLE `footer_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_social_links`
--
ALTER TABLE `footer_social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_analytics`
--
ALTER TABLE `google_analytics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_recaptchas`
--
ALTER TABLE `google_recaptchas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepages`
--
ALTER TABLE `homepages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instamojo_payments`
--
ALTER TABLE `instamojo_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintainance_texts`
--
ALTER TABLE `maintainance_texts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_documents`
--
ALTER TABLE `message_documents`
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
-- Indexes for table `our_teams`
--
ALTER TABLE `our_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paypal_payments`
--
ALTER TABLE `paypal_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paystack_and_mollies`
--
ALTER TABLE `paystack_and_mollies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `popular_posts`
--
ALTER TABLE `popular_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popular_tags`
--
ALTER TABLE `popular_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_discounts`
--
ALTER TABLE `product_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_items`
--
ALTER TABLE `product_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_type_pages`
--
ALTER TABLE `product_type_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider_client_reports`
--
ALTER TABLE `provider_client_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider_withdraws`
--
ALTER TABLE `provider_withdraws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pusher_credentails`
--
ALTER TABLE `pusher_credentails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `razorpay_payments`
--
ALTER TABLE `razorpay_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refund_requests`
--
ALTER TABLE `refund_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `script_contents`
--
ALTER TABLE `script_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_contents`
--
ALTER TABLE `section_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_controls`
--
ALTER TABLE `section_controls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_settings`
--
ALTER TABLE `seo_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_login_information`
--
ALTER TABLE `social_login_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sslcommerz_payments`
--
ALTER TABLE `sslcommerz_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stripe_payments`
--
ALTER TABLE `stripe_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tawk_chats`
--
ALTER TABLE `tawk_chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `additional_services`
--
ALTER TABLE `additional_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_payments`
--
ALTER TABLE `bank_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner_images`
--
ALTER TABLE `banner_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `become_authors`
--
ALTER TABLE `become_authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `complete_requests`
--
ALTER TABLE `complete_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_pages`
--
ALTER TABLE `contact_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cookie_consents`
--
ALTER TABLE `cookie_consents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `country_states`
--
ALTER TABLE `country_states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `currency_countries`
--
ALTER TABLE `currency_countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `custom_pages`
--
ALTER TABLE `custom_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `custom_paginations`
--
ALTER TABLE `custom_paginations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `email_configurations`
--
ALTER TABLE `email_configurations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `error_pages`
--
ALTER TABLE `error_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `facebook_comments`
--
ALTER TABLE `facebook_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facebook_pixels`
--
ALTER TABLE `facebook_pixels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `flutterwaves`
--
ALTER TABLE `flutterwaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer_links`
--
ALTER TABLE `footer_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_social_links`
--
ALTER TABLE `footer_social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `google_analytics`
--
ALTER TABLE `google_analytics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `google_recaptchas`
--
ALTER TABLE `google_recaptchas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homepages`
--
ALTER TABLE `homepages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `instamojo_payments`
--
ALTER TABLE `instamojo_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `maintainance_texts`
--
ALTER TABLE `maintainance_texts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_documents`
--
ALTER TABLE `message_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `our_teams`
--
ALTER TABLE `our_teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `paypal_payments`
--
ALTER TABLE `paypal_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paystack_and_mollies`
--
ALTER TABLE `paystack_and_mollies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `popular_posts`
--
ALTER TABLE `popular_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `popular_tags`
--
ALTER TABLE `popular_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_discounts`
--
ALTER TABLE `product_discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_items`
--
ALTER TABLE `product_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_type_pages`
--
ALTER TABLE `product_type_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `provider_client_reports`
--
ALTER TABLE `provider_client_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provider_withdraws`
--
ALTER TABLE `provider_withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pusher_credentails`
--
ALTER TABLE `pusher_credentails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `razorpay_payments`
--
ALTER TABLE `razorpay_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `refund_requests`
--
ALTER TABLE `refund_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `script_contents`
--
ALTER TABLE `script_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `section_contents`
--
ALTER TABLE `section_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `section_controls`
--
ALTER TABLE `section_controls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `seo_settings`
--
ALTER TABLE `seo_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_login_information`
--
ALTER TABLE `social_login_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sslcommerz_payments`
--
ALTER TABLE `sslcommerz_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stripe_payments`
--
ALTER TABLE `stripe_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tawk_chats`
--
ALTER TABLE `tawk_chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
