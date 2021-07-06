-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 04:17 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'mahamudul@gmail.com', '$2y$10$ZJhfZmAlQk9RkdezRdkGNuNe2n2Yz4cYk.IB0uW.8OL2..usZ3OIm', '2021-04-04 11:48:35', '2021-04-04 11:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '1619947021.jpg', 1, '2021-05-02 03:17:01', '2021-05-02 03:17:25'),
(2, '1619947033.jpg', 1, '2021-05-02 03:17:13', '2021-05-02 03:17:13'),
(3, '1619947041.jpg', 1, '2021-05-02 03:17:21', '2021-05-02 03:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `is_show_home` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `status`, `is_show_home`, `created_at`, `updated_at`) VALUES
(3, 'jQuery', '1619862927.png', 1, 1, NULL, NULL),
(4, 'Java', '1619862957.png', 1, 1, NULL, NULL),
(5, 'Html', '1619862974.png', 1, 1, NULL, NULL),
(6, 'CSS', '1619862996.png', 1, 1, NULL, NULL),
(7, 'Joomla', '1619863457.png', 1, 1, NULL, NULL),
(8, 'Wordpress', '1619863481.png', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` enum('reg','not-reg') NOT NULL,
  `qty` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_attr_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `user_type`, `qty`, `product_id`, `product_attr_id`, `added_on`) VALUES
(7, 520148935, 'not-reg', 1, 7, 12, '2021-05-30 11:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_category_id` int(11) NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_show_home` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `parent_category_id`, `category_image`, `is_show_home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Man', 'man', 0, '1619687529.jpg', 1, 1, NULL, NULL),
(2, 'Sports', 'sports', 0, '1619687795.jpg', 1, 1, NULL, NULL),
(3, 'Women', 'women', 0, '1619687562.jpg', 1, 1, NULL, NULL),
(9, 'Shoes', 'shoes', 1, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Blue', '1', '2021-04-10 10:18:23', '2021-04-10 10:18:23'),
(3, 'Green', '1', '2021-04-13 03:56:01', '2021-04-13 03:56:01'),
(4, 'Orange', '1', '2021-04-13 03:56:18', '2021-04-13 03:56:18'),
(5, 'burnt-brick', '1', '2021-05-09 03:06:27', '2021-05-09 06:22:14'),
(6, 'dark-truffle', '1', '2021-05-09 03:06:53', '2021-05-09 06:23:17'),
(7, 'pebblestone-heather', '1', '2021-05-09 03:08:16', '2021-05-09 06:23:03'),
(8, 'pink', '1', '2021-05-24 02:45:06', '2021-05-24 02:45:06'),
(9, 'purple', '1', '2021-05-24 02:45:15', '2021-05-24 02:45:15'),
(10, 'gray', '1', '2021-05-24 02:45:28', '2021-05-24 02:45:28'),
(11, 'cyan', '1', '2021-05-24 02:45:36', '2021-05-24 02:45:36'),
(12, 'olive', '1', '2021-05-24 02:45:43', '2021-05-24 02:45:43'),
(13, 'orchid', '1', '2021-05-24 02:45:54', '2021-05-24 02:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Value','Per') COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_order_amt` int(11) NOT NULL,
  `is_onetime` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `title`, `coupon_slug`, `value`, `type`, `min_order_amt`, `is_onetime`, `status`, `created_at`, `updated_at`) VALUES
(2, 'January', 'friday', '10', 'Per', 120, 1, '1', NULL, NULL),
(3, 'February 2021', 'Fast50', '50', 'Value', 0, 0, '0', NULL, NULL),
(4, 'New', 'new', '15', 'Per', 350, 0, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `address`, `city`, `mobile`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mahamudul', 'mahamudul@gmail.com', 'eyJpdiI6IkgwQ0NwZDVUTTE4R3EzVUQzOTlDM2c9PSIsInZhbHVlIjoiRDhpQjQ0TGkwMUhJam5vK2k5MnEvZz09IiwibWFjIjoiNmZiZmRhZjhkZGI1NTFiYzdhMmU3ZTQ3OTBjYjVmNTExNDIyN2JjYTI1Y2I2NGEyNDc1OTQ5NGU4Yzc3M2Y4NSJ9', NULL, NULL, '01921547430', 1, '2021-05-27 03:46:06', '2021-05-27 03:46:06');

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
(1, '2021_04_04_101234_create_admins_table', 1),
(2, '2021_04_05_121759_create_categories_table', 2),
(3, '2021_04_08_113318_create_coupons_table', 3),
(4, '2021_04_10_154954_create_colors_table', 4),
(5, '2021_04_10_163340_create_sizes_table', 5),
(6, '2021_04_11_075952_create_products_table', 6),
(7, '2021_04_20_084236_create_brands_table', 7),
(8, '2021_04_26_083114_create_customers_table', 8),
(9, '2021_05_02_083208_create_banners_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `coupon_code` varchar(25) DEFAULT NULL,
  `coupon_value` varchar(25) DEFAULT NULL,
  `order_status` int(11) NOT NULL,
  `payment_type` enum('COD','Gateway') NOT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `payment_id` varchar(20) DEFAULT NULL,
  `total_amt` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customers_id`, `name`, `email`, `mobile`, `city`, `address`, `coupon_code`, `coupon_value`, `order_status`, `payment_type`, `payment_status`, `payment_id`, `total_amt`, `added_on`) VALUES
(1, 1, 'Mahamudul', 'mahamudul@gmail.com', '01921547430', 'Dhaka', '51/1,SCC ROAD', '', '', 1, 'COD', '', '', '1920', '2021-06-17 10:43:52'),
(2, 1, 'Mahamudul', 'mahamudul@gmail.com', '01921547430', 'sss', 'sss', 'New', '217', 1, 'COD', 'Pending', '', '1233', '2021-06-18 09:34:55'),
(3, 1, 'Mahamudul', 'mahamudul@gmail.com', '01921547430', 'Dhaka', '51/1,SCC ROAD', 'New', '150', 1, 'COD', 'Pending', '', '850', '2021-06-18 02:00:27'),
(4, 1, 'Mahamudul', 'mahamudul@gmail.com', '01921547430', 'ddd', 'dddd', NULL, '0', 1, 'COD', 'Pending', '', '120', '2021-06-18 02:12:34'),
(5, 1, 'Mahamudul', 'mahamudul@gmail.com', '01921547430', 'ff', 'ff', NULL, '0', 1, 'COD', 'Pending', '', '1450', '2021-06-18 02:13:30'),
(6, 1, 'Mahamudul', 'mahamudul@gmail.com', '01921547430', 'hhh', 'hhh', NULL, '0', 1, 'COD', 'Pending', '', '500', '2021-06-18 02:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_attr_id` int(11) NOT NULL,
  `price` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_attr_id`, `price`, `qty`) VALUES
(1, 1, 7, 12, '1450', 1),
(2, 1, 4, 7, '370', 1),
(3, 1, 2, 4, '100', 1),
(4, 2, 7, 12, '1450', 1),
(5, 3, 4, 8, '350', 2),
(6, 3, 2, 4, '100', 3),
(7, 4, 2, 5, '120', 1),
(8, 5, 7, 12, '1450', 1),
(9, 6, 2, 4, '100', 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `status`) VALUES
(1, 'Order placed'),
(2, 'On the way'),
(3, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(255) NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `technical_specification` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uses` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warrenty` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `lead_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_promo` int(11) NOT NULL,
  `is_featured` int(11) NOT NULL,
  `is_discounted` int(11) NOT NULL,
  `is_tranding` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `image`, `brand_id`, `model`, `short_desc`, `desc`, `keywords`, `technical_specification`, `uses`, `warrenty`, `lead_time`, `is_promo`, `is_featured`, `is_discounted`, `is_tranding`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'T-shirt', 't-shirt', '1619688832.png', 4, 'Polo_T', '<p>Polo_T</p>', '<p>Polo_T</p>', 'Polo_T', NULL, 'Comfort Summer Deal', 'None', '2-3 days', 1, 1, 0, 1, 1, '2021-04-29 03:33:52', '2021-05-08 03:41:30'),
(4, 1, 'Hanes Men\'s Long Sleeve Beefy Henley Shirt', 'Shirts', '1620551648.jpg', 6, 'Beefy Henley', '<h1>Hanes Men&#39;s Long Sleeve Beefy Henley Shirt</h1>', '<ul>\r\n	<li>100% Cotton; Heather: 75% Cotton/25% Polyester</li>\r\n	<li>Imported</li>\r\n	<li>Button closure</li>\r\n	<li>Machine Wash</li>\r\n	<li>Contrast color three-button placket</li>\r\n	<li>Raglan sleeves for a sporty look</li>\r\n	<li>Famously durable beefy-t fabric</li>\r\n	<li>All the comfort of Hanes with our famous tag less neckline</li>\r\n</ul>', 'Beefy Henley', '<ul>\r\n	<li>100% Cotton; Heather: 75% Cotton/25% Polyester</li>\r\n</ul>', 'Regular dress', '3 days', NULL, 1, 1, 0, 1, 1, '2021-05-09 03:08:21', '2021-05-22 03:54:12'),
(7, 1, 'Shoes', 'shoes', '1621931752.jpg', 3, 'ssd5', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, bu</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'sdsd', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.&nbsp;</p>', 'test', 'None', 'None', 1, 0, 1, 0, 1, '2021-05-25 02:35:53', '2021-05-25 02:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `product_attr`
--

CREATE TABLE `product_attr` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `mrp` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `attr_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_attr`
--

INSERT INTO `product_attr` (`id`, `product_id`, `color_id`, `size_id`, `tag`, `mrp`, `price`, `qty`, `attr_image`) VALUES
(1, 1, 2, 1, 'test', '120', '110', 2, '376460594.jpg'),
(4, 2, 2, 1, '1', '120', '100', 1, '591356634.png'),
(5, 2, 4, 3, '2', '130', '120', 1, '346599093.png'),
(6, 3, 3, 4, '65', '650', '600', 5, '434214302.png'),
(7, 4, 5, 1, '111', '399', '370', 1, '350492748.jpg'),
(8, 4, 3, 3, '112', '360', '350', 1, '199578545.jpg'),
(9, 4, 7, 4, '113', '370', '360', 1, '778144513.jpg'),
(10, 4, 6, 1, '114', '360', '370', 1, '480864488.jpg'),
(12, 7, 2, 4, '1212', '1500', '1450', 5, '183105163.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `images`) VALUES
(1, 1, '681356610.jpg'),
(4, 4, '753317709.jpg'),
(5, 6, '734758340.png'),
(6, 6, '981599150.png'),
(7, 7, '831525035.png'),
(8, 7, '476726883.png');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `status`, `created_at`, `updated_at`) VALUES
(1, 'XXL', 1, '2021-04-10 11:00:51', '2021-04-10 11:00:51'),
(3, 'XL', 1, '2021-04-13 03:55:26', '2021-04-13 03:55:26'),
(4, 'Medium', 1, '2021-04-13 03:55:41', '2021-04-13 03:55:41'),
(5, 'Small', 1, '2021-04-13 03:55:49', '2021-04-13 03:55:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
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
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attr`
--
ALTER TABLE `product_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_attr`
--
ALTER TABLE `product_attr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
