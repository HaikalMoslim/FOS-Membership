-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 24, 2024 at 04:17 PM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u148354001_fos_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

-- CREATE TABLE `ads` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `outlet_id` bigint(20) NOT NULL,
--   `name` varchar(191) NOT NULL,
--   `description` longtext NOT NULL,
--   `image` varchar(191) NOT NULL,
--   `start_date` date NOT NULL,
--   `end_date` date NOT NULL,
--   `status` tinyint(4) NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `outlet_id`, `name`, `description`, `image`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Super Lucky', 'Chinese New Year', '1707849288.jpg', '2024-02-11', '2024-02-21', 1, '2024-02-13 18:34:48', '2024-02-13 18:34:48'),
(2, 8, 'Super Lucky', 'Chinese New Year', '1707849319.jpg', '2024-02-13', '2024-02-24', 1, '2024-02-13 18:35:19', '2024-02-13 18:35:19'),
(3, 12, 'Angpao Lucky', 'Chinese New Year', '1707849360.jpg', '2024-02-13', '2024-02-22', 1, '2024-02-13 18:36:00', '2024-02-13 18:36:00'),
(4, 10, 'Paper Bag', 'Chinese New Year', '1707849398.png', '2024-02-13', '2024-02-22', 1, '2024-02-13 18:36:38', '2024-02-13 18:36:38'),
(5, 5, 'Plus Size', 'All sizes', '1707849440.jpg', '2024-02-13', '2024-03-30', 1, '2024-02-13 18:37:20', '2024-02-13 18:37:20'),
(6, 2, 'Feel The Difference', 'Latest', '1707849479.png', '2024-02-13', '2024-02-28', 1, '2024-02-13 18:37:59', '2024-02-13 18:37:59'),
(7, 7, 'New Arrival', 'Latest', '1707849505.png', '2024-02-14', '2024-02-29', 1, '2024-02-13 18:38:25', '2024-02-13 18:38:25'),
(8, 12, 'Best Award', 'Best Choice', '1707849540.jpg', '2024-02-14', '2024-02-21', 1, '2024-02-13 18:39:00', '2024-02-13 18:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

-- CREATE TABLE `carts` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `user_id` varchar(191) NOT NULL,
--   `prod_id` varchar(191) NOT NULL,
--   `prod_quantity` varchar(191) NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_quantity`, `created_at`, `updated_at`) VALUES
(6, '29', '31', '1', '2024-02-14 04:30:28', '2024-02-14 04:30:28'),
(11, '1', '14', '1', '2024-02-18 06:36:49', '2024-02-18 06:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

-- CREATE TABLE `categories` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `name` varchar(191) NOT NULL,
--   `slug` varchar(191) NOT NULL,
--   `description` longtext NOT NULL,
--   `status` tinyint(4) NOT NULL DEFAULT 0,
--   `popular` tinyint(4) NOT NULL DEFAULT 0,
--   `image` varchar(191) DEFAULT NULL,
--   `meta_title` varchar(191) NOT NULL,
--   `meta_description` varchar(191) NOT NULL,
--   `meta_keywords` varchar(191) NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Women', 'Women', 'Women Category', 1, 1, '1707842791.jpg', 'Women', 'Women', 'Women', '2024-02-13 16:46:31', '2024-02-13 16:46:31'),
(2, 'Girls', 'Girls', 'Girls category', 1, 1, '1707842864.jpg', 'Girls', 'Girls', 'Girls', '2024-02-13 16:47:44', '2024-02-13 16:47:44'),
(3, 'Men', 'Men', 'Men category', 1, 1, '1707842898.jpg', 'Men', 'Men', 'Men', '2024-02-13 16:48:18', '2024-02-13 16:48:18'),
(4, 'Boys', 'Boys', 'Boys category', 1, 1, '1707842946.jpg', 'Boys', 'Boys', 'Boys', '2024-02-13 16:49:06', '2024-02-13 16:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `customers_table`
--

-- CREATE TABLE `customers_table` (
--   `customer_id` int(11) NOT NULL,
--   `customer_name` varchar(100) NOT NULL,
--   `customer_email` varchar(100) NOT NULL,
--   `customer_password` text NOT NULL,
--   `customer_ic` varchar(100) NOT NULL,
--   `customer_nationality` varchar(100) NOT NULL,
--   `customer_address` varchar(100) NOT NULL,
--   `customer_phonenumber` varchar(100) NOT NULL,
--   `customer_marital` enum('Single','Married') NOT NULL,
--   `customer_income` varchar(100) NOT NULL,
--   `customer_points` int(11) NOT NULL,
--   `customer_memberstatus` tinyint(1) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers_table`
--

INSERT INTO `customers_table` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_ic`, `customer_nationality`, `customer_address`, `customer_phonenumber`, `customer_marital`, `customer_income`, `customer_points`, `customer_memberstatus`) VALUES
(1, 'kal', 'kal@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', 'Single', '', 0, 0),
(2, 'ali', 'ali@gmail.com', '984d8144fa08bfc637d2825463e184fa', '', '', '', '', 'Single', '', 0, 0),
(3, 'adi', 'adi@gmail.com', '7360409d967a24b667afc33a8384ec9e', '', '', '', '', 'Single', '', 0, 0),
(4, 'haikal', 'haikal@gmail.com', 'e6622d8b1b53d157a432861ad739a9da', '', '', '', '', 'Single', '', 0, 0),
(5, 'zaim', 'zaim@gmail.com', '537e9e43e1656ac23c51ad05fa43efd9', '', '', '', '', 'Single', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

-- CREATE TABLE `failed_jobs` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `uuid` varchar(191) NOT NULL,
--   `connection` text NOT NULL,
--   `queue` text NOT NULL,
--   `payload` longtext NOT NULL,
--   `exception` longtext NOT NULL,
--   `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

-- CREATE TABLE `locations` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `name` varchar(191) NOT NULL,
--   `address` varchar(191) NOT NULL,
--   `image` varchar(191) NOT NULL,
--   `latitude` varchar(191) NOT NULL,
--   `longitude` varchar(191) NOT NULL,
--   `telno` varchar(191) NOT NULL,
--   `mobileno` varchar(191) NOT NULL,
--   `email` varchar(191) NOT NULL,
--   `operation` varchar(191) NOT NULL,
--   `active` tinyint(1) NOT NULL DEFAULT 0,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `address`, `image`, `latitude`, `longitude`, `telno`, `mobileno`, `email`, `operation`, `active`, `created_at`, `updated_at`) VALUES
(1, 'BATU PAHAT MALL', 'Lot G48a, Batu Pahat Mall\r\nJalan Kluang, Kampung Beroleh,\r\n83000 Batu Pahat,\r\nJohor Darul Takzim', '1700639445.jpg', '1.8685183312163778', '102.96868535156253', '012- 293 0352', '012- 293 0352', 'support@fos.com.my', 'Monday - Sunday 1000 - 2200', 1, '2023-11-21 23:50:45', '2023-11-27 20:47:22'),
(2, 'KSL CITY MALL', 'G.10 & 11, Ksl City Mall, No.33, Jalan Seladang,\r\nTaman Abad, Johor Bahru,\r\n80250 Johor', '1700639483.jpg', '1.5088729409369386', '103.77343388671878', '012 - 298 1297', '012 - 298 1297', 'support@fos.com.my', 'Monday - Sunday 1000 - 2200', 1, '2023-11-21 23:51:23', '2023-11-21 23:51:23'),
(4, 'AEON BUKIT INDAH SHOPPING CENTER (NAVY & NAVY)', 'G-70 Ground Floor Aeon Bukit Indah Shopping Center No: 08, Jalan Indah 15/02 Taman Bukit Indah, 81200 Johor Bahru.', '1707848554.jpg', '1.4824460956791121', '103.65567418212893', '012 - 262 5291', '012 - 262 5291', 'support@fos.com.my', 'Monday - Sunday 1000 - 2200', 1, '2024-02-13 18:22:34', '2024-02-13 18:22:34'),
(5, 'AEON BUKIT INDAH SHOPPING CENTRE', 'Lot F02, 1st Floor, Aeon Bukit Indah Shopping Centre, No.8, Jalan Indah 15/2, Bukit Indah, Taman Bukit Indah, 81200 Johor Bahru, Johor', '1707848633.jpg', '1.4813735709097495', '103.65584584350589', '012 - 718 8098', '012 - 718 8098', 'support@fos.com.my', 'Monday - Sunday 1000 - 2200', 1, '2024-02-13 18:23:53', '2024-02-13 18:23:53'),
(6, 'AEON MALL KULAI JAYA', 'Lot F07, 1st Floor, Aeon Mall Kulaijaya,\r\nPtd 106273, Persiaran Indahpura Utama,Bandar Indahpura,Kulaijaya\r\n81000 Johor.', '1707848706.jpg', '1.6403998116239178', '103.61738336256197', '012 - 718 8117', '012 - 718 8117', 'support@fos.com.my', 'Monday - Sunday 1000 - 2200', 1, '2024-02-13 18:25:06', '2024-02-13 18:25:06'),
(7, 'AEON MALL TEBRAU CITY', 'Lot F48 & F49, Aeon Mall Tebrau City, No. 1, Jalan Desa Tebrau, Taman Desa Tebrau, 81100 Johor.', '1707848778.jpeg', '1.5485189326707252', '103.79483699798584', '012 - 353 1885', '012 - 353 1885', 'support@fos.com.my', 'Monday - Sunday 1000 - 2200', 1, '2024-02-13 18:26:18', '2024-02-13 18:26:18'),
(8, 'JOHOR CASTLE WALK', 'Lot 52-2-1, 52-3-1, 52-4-1 Ground Floor, Jalan Sulaiman, 84000 Muar, Johor Darul Takzim', '1707848936.jpg', '2.0441954044140265', '102.565690153311', '019 - 238 7803', '019 - 238 7803', 'support@fos.com.my', 'Monday - Sunday 1000 - 2200', 1, '2024-02-13 18:28:56', '2024-02-13 18:28:56'),
(9, 'JOHOR CITY SQUARE', 'Johor Bahru City Square\r\nLot J3-10, J3-11, J3-12, Level 3,\r\nJohor Bahru City Square,\r\nNo: 106-108, Jalan Wong Ah Fook,\r\n80000 Johor Bahru, Johor', '1707849023.jpg', '1.4624819274942849', '103.76320838928223', '019-358 1589', '019-358 1589', 'support@fos.com.my', 'Monday - Sunday 1000 - 2200', 1, '2024-02-13 18:30:23', '2024-02-13 18:30:23'),
(10, 'MENARA KOMTAR JOHOR', 'Lot 227,228,229 & 230,Second Floor,Menara Komtar, Johor Bahru City Centre,Johor Bahru,\r\n80000 Johor', '1707849102.jpeg', '1.4626007128700604', '103.7637632373191', '012 - 379 9061', '012 - 379 9061', 'support@fos.com.my', 'Monday - Sunday 1000 - 2200', 1, '2024-02-13 18:31:42', '2024-02-13 18:31:42'),
(11, 'PARADIGM MALL JOHOR BAHRU', 'Lot 1f-52 First Floor, Paradigm Mall Johor Bahru,\r\nJalan Skudai,Johor Bahru Skudai, 81200 Johor.', '1707849161.jpg', '1.515764782148484', '103.68570327758789', '012 - 379 6118', '012 - 379 6118', 'support@fos.com.my', 'Monday - Sunday 1000 - 2200', 1, '2024-02-13 18:32:41', '2024-02-13 18:32:41'),
(12, 'THE MALL MID VALLEY SOUTHKEY', 'Lg-038, Lower Ground, The Mall Mid Valley Southkey,\r\nNo.1 Persiaran Southkey 1, Southkey,\r\n80150 Johor Bahru\r\nJohor.', '1707849218.jpg', '1.501350224281002', '103.77737045288086', '012 - 421 7402', '012 - 421 7402', 'support@fos.com.my', 'Monday - Sunday 1000 - 2200', 1, '2024-02-13 18:33:38', '2024-02-13 18:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

-- CREATE TABLE `migrations` (
--   `id` int(10) UNSIGNED NOT NULL,
--   `migration` varchar(191) NOT NULL,
--   `batch` int(11) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_18_033949_create_categories_table', 2),
(6, '2023_10_18_115355_create_products_table', 3),
(7, '2023_10_18_120510_create_products_table', 4),
(8, '2023_10_31_062303_create_carts_table', 5),
(9, '2023_11_04_063542_create_orders_table', 6),
(10, '2023_11_04_064122_create_order_items_table', 6),
(11, '2023_11_07_125118_create_wishlists_table', 7),
(12, '2023_11_08_051002_create_ratings_table', 8),
(14, '2023_11_13_060303_create_reviews_table', 9),
(15, '2023_11_20_101256_create_locations_table', 10),
(16, '2023_11_22_065929_create_product_outlets_table', 11),
(17, '2023_12_12_151938_create_ads_table', 12),
(19, '2023_12_24_050919_create_colors_table', 13),
(20, '2024_01_04_064828_create_rewards_table', 14),
(21, '2024_01_04_092608_create_voucher_table', 15),
(22, '2024_01_27_082943_create_vouchers_table', 16),
(23, '2024_01_27_161756_add_is_used_to_vouchers_table', 17),
(24, '2024_01_28_073240_add_order_id_to_vouchers_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

-- CREATE TABLE `orders` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `user_id` varchar(191) NOT NULL,
--   `total_price` varchar(191) NOT NULL,
--   `fname` varchar(191) NOT NULL,
--   `lname` varchar(191) NOT NULL,
--   `email` varchar(191) NOT NULL,
--   `phone` varchar(191) NOT NULL,
--   `address1` varchar(191) NOT NULL,
--   `address2` varchar(191) NOT NULL,
--   `city` varchar(191) NOT NULL,
--   `state` varchar(191) NOT NULL,
--   `country` varchar(191) NOT NULL,
--   `postalcode` varchar(191) NOT NULL,
--   `status` tinyint(4) NOT NULL DEFAULT 0,
--   `message` varchar(191) DEFAULT NULL,
--   `payment_mode` varchar(191) DEFAULT NULL,
--   `payment_id` varchar(191) DEFAULT NULL,
--   `tracking_no` varchar(191) NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `fname`, `lname`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `postalcode`, `status`, `message`, `payment_mode`, `payment_id`, `tracking_no`, `created_at`, `updated_at`) VALUES
(1, '1', '23', 'Haikal', 'Moslim', 'haikal@gmail.com', '0123456789', 'No 7, Jalan Sri Wangsa 6', 'Taman Sri Wangsa', 'Batu Pahat', 'Johor', 'Malaysia', '83000', 1, NULL, 'COD', NULL, 'fos2752', '2024-02-14 02:51:39', '2024-02-14 02:58:13'),
(2, '1', '39', 'Haikal', 'Moslim', 'haikal@gmail.com', '0123456789', 'No 7, Jalan Sri Wangsa 6', 'Taman Sri Wangsa', 'Batu Pahat', 'Johor', 'Malaysia', '83000', 0, NULL, 'COD', NULL, 'fos6362', '2024-02-14 02:57:37', '2024-02-14 02:57:37'),
(3, '28', '25', 'Abu', 'Moslim', 'abu@gmail.com', '0123456789', 'No 7, Jalan Sri Wangsa 6', 'Taman Sri Wangsa', 'Batu Pahat', 'Johor', 'Malaysia', '83000', 0, NULL, 'COD', NULL, 'fos1885', '2024-02-14 07:49:51', '2024-02-14 07:49:51'),
(4, '28', '23', 'Abu', 'Moslim', 'abu@gmail.com', '0123456789', 'No 7, Jalan Sri Wangsa 6', 'Taman Sri Wangsa', 'Batu Pahat', 'Johor', 'Malaysia', '83000', 0, NULL, 'COD', NULL, 'fos8238', '2024-02-14 08:03:10', '2024-02-14 08:03:10'),
(5, '1', '23', 'Haikal', 'Moslim', 'haikal@gmail.com', '0123456789', 'No 7, Jalan Sri Wangsa 6', 'Taman Sri Wangsa', 'Batu Pahat', 'Johor', 'Malaysia', '83000', 0, NULL, 'COD', NULL, 'fos7528', '2024-02-14 08:21:48', '2024-02-14 08:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

-- CREATE TABLE `order_items` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `order_id` varchar(191) NOT NULL,
--   `prod_id` varchar(191) NOT NULL,
--   `quantity` varchar(191) NOT NULL,
--   `price` varchar(191) NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, '1', '16', '1', '23', '2024-02-14 02:51:39', '2024-02-14 02:51:39'),
(2, '2', '10', '1', '49', '2024-02-14 02:57:37', '2024-02-14 02:57:37'),
(3, '3', '4', '1', '25', '2024-02-14 07:49:51', '2024-02-14 07:49:51'),
(4, '4', '30', '1', '23', '2024-02-14 08:03:10', '2024-02-14 08:03:10'),
(5, '5', '15', '1', '23', '2024-02-14 08:21:48', '2024-02-14 08:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

-- CREATE TABLE `password_resets` (
--   `email` varchar(191) NOT NULL,
--   `token` varchar(191) NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

-- CREATE TABLE `personal_access_tokens` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `tokenable_type` varchar(191) NOT NULL,
--   `tokenable_id` bigint(20) UNSIGNED NOT NULL,
--   `name` varchar(191) NOT NULL,
--   `token` varchar(64) NOT NULL,
--   `abilities` text DEFAULT NULL,
--   `last_used_at` timestamp NULL DEFAULT NULL,
--   `expires_at` timestamp NULL DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

-- CREATE TABLE `products` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `cate_id` bigint(20) NOT NULL,
--   `name` varchar(191) NOT NULL,
--   `slug` varchar(191) NOT NULL,
--   `small_description` mediumtext NOT NULL,
--   `description` longtext NOT NULL,
--   `original_price` varchar(191) NOT NULL,
--   `selling_price` varchar(191) NOT NULL,
--   `image` varchar(191) NOT NULL,
--   `quantity` varchar(191) NOT NULL,
--   `tax` varchar(191) NOT NULL,
--   `status` tinyint(4) NOT NULL,
--   `trending` tinyint(4) NOT NULL,
--   `style` varchar(191) NOT NULL,
--   `color` varchar(191) NOT NULL,
--   `fit_type` varchar(191) NOT NULL,
--   `pattern` varchar(191) NOT NULL,
--   `clothing_type` varchar(191) DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cate_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `quantity`, `tax`, `status`, `trending`, `style`, `color`, `fit_type`, `pattern`, `clothing_type`, `created_at`, `updated_at`) VALUES
(1, 1, 'FOS x Navy & Navy Women’s | Basic Short Sleeve Tee with Pocket Embroidery (BLK)', 'Black T-shirt 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nSize	\r\nS, M, L, XL', 'Hassle-free purchase with F.O.S by just shopping online. Our products are definitely 100% authentic. Affordable & fashionable, embellish your daily styling & catch up with the latest trend.All clothings are modernly design and fresh looking.\r\n\r\nConstant quality control & reasonable price – ensure the upmost satisfactions of our customers.A huge variety of options, surely there’s one will catches your eye!', '25', '25', '1707844500.jpg', '100', '0', 1, 0, 'Casual', 'Black', 'Regular', 'Solid', 'Top', '2024-02-13 17:15:00', '2024-02-14 02:03:09'),
(2, 1, 'FOS x Navy & Navy Women’s | Basic Short Sleeve Tee with Pocket Embroidery (TEA)', 'Green T-shirt 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nSize	\r\nS, M, L, XL', 'Hassle-free purchase with F.O.S by just shopping online. Our products are definitely 100% authentic. Affordable & fashionable, embellish your daily styling & catch up with the latest trend.All clothings are modernly design and fresh looking.\r\n\r\nConstant quality control & reasonable price – ensure the upmost satisfactions of our customers.A huge variety of options, surely there’s one will catches your eye!', '25', '25', '1707844597.jpg', '100', '0', 1, 0, 'Casual', 'Green', 'Regular', 'Solid', 'Top', '2024-02-13 17:16:37', '2024-02-14 02:03:20'),
(3, 1, 'FOS x Navy & Navy Women’s | Basic Short Sleeve Tee with Pocket Embroidery (DPK)', 'Pink T-Shirt 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nSize	\r\nS, M, L, XL', 'Hassle-free purchase with F.O.S by just shopping online. Our products are definitely 100% authentic. Affordable & fashionable, embellish your daily styling & catch up with the latest trend.All clothings are modernly design and fresh looking.\r\n\r\nConstant quality control & reasonable price – ensure the upmost satisfactions of our customers.A huge variety of options, surely there’s one will catches your eye!', '25', '25', '1707844669.jpg', '100', '0', 1, 0, 'Casual', 'Pink', 'Regular', 'Solid', 'Top', '2024-02-13 17:17:49', '2024-02-13 17:17:49'),
(4, 1, 'FOS x Navy & Navy Women’s | Basic Short Sleeve Tee with Pocket Embroidery (LMC)', 'Yellow T-shirt 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nSize	\r\nS, M, L, XL', 'Hassle-free purchase with F.O.S by just shopping online. Our products are definitely 100% authentic. Affordable & fashionable, embellish your daily styling & catch up with the latest trend.All clothings are modernly design and fresh looking.\r\n\r\nConstant quality control & reasonable price – ensure the upmost satisfactions of our customers.A huge variety of options, surely there’s one will catches your eye!', '25', '25', '1707844762.jpg', '99', '0', 1, 1, 'Casual', 'Yellow', 'Regular', 'Solid', 'Top', '2024-02-13 17:19:22', '2024-02-14 07:49:51'),
(5, 1, 'FOS x Navy & Navy Women’s | Collar Blouse', 'Blouse Orange 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nSize	\r\nS, M, L, XL, 2XL', 'Purchase any of our products in a hassle-free manner. All products listed here are 100% authentic. Affordable and fashionable, dress up with style to show off your own unique flair.\r\n\r\nEvery piece of Navy & Navy clothing is modernly design and look fresh while being priced competitively to deliver the best value for consumers’ wallets.\r\n\r\nWith a wide range of choices, they’ll be one which eventually catches your eye!', '49', '49', '1707844867.jpg', '100', '0', 1, 0, 'Vintage', 'Orange', 'Loose', 'Solid', 'Top', '2024-02-13 17:21:07', '2024-02-13 17:21:07'),
(6, 1, 'FOS x Navy & Navy Women’s | Collar Blouse', 'Blouse Red 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nSize	\r\nS, M, L, XL, 2XL', 'Purchase any of our products in a hassle-free manner. All products listed here are 100% authentic. Affordable and fashionable, dress up with style to show off your own unique flair.\r\n\r\nEvery piece of Navy & Navy clothing is modernly design and look fresh while being priced competitively to deliver the best value for consumers’ wallets.\r\n\r\nWith a wide range of choices, they’ll be one which eventually catches your eye!', '49', '49', '1707844936.jpg', '100', '0', 1, 1, 'Vintage', 'Red', 'Loose', 'Solid', 'Top', '2024-02-13 17:22:16', '2024-02-13 18:57:16'),
(7, 1, 'Blu Sand Women’s | Twist Neck Long Sleeve Blouse with Zip', 'Blouse Black 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nColour	\r\nBLK, LYW\r\n\r\nSize	\r\nS, M, L, XL, XXL', 'Purchase any of our products in a hassle-free manner. All products listed here are 100% authentic. Affordable and fashionable, dress up with style to show off your own unique flair.\r\n\r\n \r\n\r\nWith a wide range of choices, they’ll be one which eventually catches your eye!', '49', '49', '1707845070.jpg', '100', '0', 1, 0, 'Bohemian', 'Black', 'Regular', 'Floral', 'Top', '2024-02-13 17:24:30', '2024-02-13 17:24:30'),
(8, 1, 'FOS x Blu Sand Women’s | Notch Neck Peplum Floral Blouse', 'Blouse Yellow 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nSize	\r\nS, M, L, XL, 2XL', 'Flowery & silky blouse, perfect fit for any occasion.\r\n\r\nProduct details:\r\n– Notched Neck\r\n‐ 2 Layer Peplum Long Sleeve\r\n‐ Regular fit\r\n‐ 2 Prints available: BLK & OFW\r\n\r\nHassle-free purchase with F.O.S by just shopping online. Authentic, affordable & fashionable, embellish your daily styling & catch up with the latest trend.\r\n\r\nAll clothing is modernly designed and fresh-looking.Constant quality control & reasonable prices – ensure the utmost satisfaction of our customers. A huge variety of options, surely there\'s one that will catches your eye!', '49', '49', '1707845204.jpg', '100', '0', 1, 0, 'Casual', 'Yellow', 'Regular', 'Floral', 'Top', '2024-02-13 17:26:44', '2024-02-13 17:26:44'),
(9, 1, 'FOS x Navy & Navy Women’s | Oversized Fleece Baseball Jacket', 'Jacket Grey 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nSize	 0', 'Get ready with F.O.S for CNY 2024 with our festive and fashionable outfit. Celebrate the new year in style and elegance, definitely you can stand out from the crowd!\r\n\r\nWalk in any of our outlets in Malaysia and purchase these outfits. Hassle-free purchase with F.O.S by just shopping online. Authentic, affordable & fashionable, embellish your daily styling & catch up with the latest trend.\r\n\r\nAll clothings are modernly design and fresh looking. Constant quality control & reasonable price – ensure the upmost satisfactions of our customers. A huge variety of options, surely there\'s one will catches your eye!', '79', '79', '1707845300.jpg', '100', '0', 1, 0, 'Sporty', 'Grey', 'Regular', 'Solid', 'Top', '2024-02-13 17:28:20', '2024-02-13 17:28:20'),
(10, 1, 'FOS x Navy & Navy Women’s | Long Sleeve Stripe Sweater', 'Long Sleeve Red 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nColour	\r\nDTP, NVY, OFW\r\n\r\nSize	\r\nS, M, L, XL', 'Hassle-free purchase with F.O.S by just shopping online. Our products are definitely 100% authentic. Affordable & fashionable, embellish your daily styling & catch up with the latest trend. All clothings are modernly design and fresh looking.\r\n\r\nConstant quality control & reasonable price – ensure the upmost satisfactions of our customers. A huge variety of options, surely there’s one will catches your eye!', '49', '49', '1707845364.jpg', '99', '0', 1, 1, 'Casual', 'Red, Black', 'Regular', 'Stripes', 'Top', '2024-02-13 17:29:24', '2024-02-14 02:57:37'),
(11, 1, 'FOS x Blu Sand Women’s Wide Leg Trousers With Front Knot', 'Trouser Brown', 'Weight	0.2 kg\r\nDimensions	1 × 1 × 1 cm\r\nSize	\r\nS, M, L, XL\r\n\r\nColour	\r\nDTR, BLK', 'Get ready with F.O.S for CNY 2024 with our festive and fashionable outfit. Celebrate the new year in style and elegance, definitely you can stand out from the crowd!\r\n\r\nWalk in any of our outlets in Malaysia and purchase these outfits. Hassle-free purchase with F.O.S by just shopping online. Authentic, affordable & fashionable, embellish your daily styling & catch up with the latest trend.\r\n\r\nAll clothings are modernly design and fresh looking. Constant quality control & reasonable price – ensure the upmost satisfactions of our customers. A huge variety of options, surely there\'s one will catches your eye!', '59', '59', '1707845469.jpg', '100', '0', 1, 1, 'Vintage', 'Brown', 'Loose', 'Solid', 'Bottom', '2024-02-13 17:31:09', '2024-02-13 18:57:55'),
(12, 1, 'FOS x Navy & Navy Women’s | 5 pockets Skinny Jeans', 'Jeans Black 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nColour	\r\nBLK, DBL, LBL, MNB\r\n\r\nSize	\r\nS, M, L, XL', 'Mid Rise, Ankle Length Skinny Jeans, best bottom for your daily wear. Purchase any of our products with just one click away. All products listed here are 100% authentic. Affordable and fashionable, dress up with style to show off your own unique flair.\r\n\r\nEvery piece of Navy & Navy clothing is modernly design and look fresh while being priced competitively to deliver the best value for consumers’ wallets. With a wide range of choices, they’ll be one which eventually catches your eye!', '59', '59', '1707845525.jpg', '100', '0', 1, 0, 'Casual', 'Black', 'Slim', 'Solid', 'Bottom', '2024-02-13 17:32:05', '2024-02-13 17:32:05'),
(13, 1, 'FOS x Blu Sand Women’s | Maxi Floral Chiffon Skirt with Side Pockets', 'Skirt Yellow 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nColour	\r\nCRM, BLK\r\n\r\nSize	\r\nS, M, L, XL', 'Hassle-free purchase with F.O.S by just shopping online. Our products are definitely 100% authentic. Affordable & fashionable, embellish your daily styling & catch up with the latest trend. All clothings are modernly design and fresh looking.\r\n\r\nConstant quality control & reasonable price – ensure the upmost satisfactions of our customers. A huge variety of options, surely there’s one will catches your eye!', '49', '49', '1707845608.jpg', '100', '0', 1, 0, 'Bohemian', 'White', 'Loose', 'Floral', 'Bottom', '2024-02-13 17:33:28', '2024-02-13 17:33:28'),
(14, 3, 'FOS x Navy & Navy Men’s | Oversized Raglan Sleeve Tee', 'Grey T-shirt 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nColour	\r\nMEL, TQS, BLK, BLU, NVY, KHA, MRN\r\n\r\nSize	\r\nS, M, L, XL', 'Purchase any of our products in a hassle-free manner. All products listed here are 100% authentic. Affordable and fashionable, dress up with style to show off your own unique flair.\r\n\r\nEvery piece of Navy & Navy clothing is modernly design and look fresh while being priced competitively to deliver the best value for consumers’ wallets.\r\n\r\nWith a wide range of choices, they’ll be one which eventually catches your eye!', '29', '29', '1707845987.jpg', '100', '0', 1, 0, 'Casual', 'Grey', 'Loose', 'Solid', 'Top', '2024-02-13 17:39:47', '2024-02-13 17:39:47'),
(15, 3, 'FOS x Navy & Navy Men’s | Round Neck Basic T-shirt', 'Red T-shirt 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nColour	\r\nAZB, BER, BGD, BLK, DGR, GRY, LKH, NVY\r\n\r\nSize	\r\nS, M, L, XL', 'Hassle-free purchase with F.O.S by just shopping online. Authentic, affordable & fashionable, embellish your daily styling & catch up with the latest trend.\r\n\r\nAll clothing is modernly designed and fresh-looking. Constant quality control & reasonable prices – ensure the utmost satisfaction of our customers. A huge variety of options, surely there’s one that will catches your eye!', '23', '23', '1707846244.jpg', '99', '0', 1, 1, 'Casual', 'Red', 'Regular', 'Solid', 'Top', '2024-02-13 17:44:04', '2024-02-14 08:21:48'),
(16, 3, 'Navy & Navy Men’s | Basic Round Neck Tee', 'Black T-shirt 2', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nColour	\r\nDBU, BLK, DNV, WHT, DRE, LBL, GBY, MEL, TQS\r\n\r\nSize	\r\nS, M, L, XL', 'Purchase any of our products in a hassle-free manner. All products listed here are 100% authentic. Affordable and fashionable, dress up with style to show off your own unique flair.\r\n\r\nWith a wide range of choices, they’ll be one which eventually catches your eye!', '23', '23', '1707846312.jpg', '99', '0', 1, 0, 'Casual', 'Black', 'Regular', 'Solid', 'Top', '2024-02-13 17:45:12', '2024-02-14 02:51:39'),
(17, 3, 'FOS x Navy & Navy Men’s | All-Over Print T-shirt (MRN)', 'Red T-shirt 2', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nSize	\r\nS, M, L, XL', 'Hassle-free purchase with F.O.S by just shopping online. Our products are definitely 100% authentic. Affordable & fashionable, embellish your daily styling & catch up with the latest trend.\r\n\r\nAll clothings are modernly design and fresh looking. Constant quality control & reasonable price – ensure the upmost satisfactions of our customers.A huge variety of options, surely there’s one will catches your eye!', '29', '29', '1707846393.jpg', '100', '0', 1, 1, 'Casual', 'Red', 'Regular', 'Floral', 'Top', '2024-02-13 17:46:33', '2024-02-13 18:58:48'),
(18, 3, 'FOS x Northern Rock Men’s | CNY Fashion Polo Tee with Embroidery (NVY)', 'Polo Blue 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nSize	\r\nS, M, L, XL, 2XL', 'Chinese New Year best outfit definitely matches with our Northern Rock Fashion Polo with Embroidery. Four different designs for you to choose. Perfect for any occasion, comfy and durable.\r\n\r\nHassle-free purchase with F.O.S by just shopping online. Authentic, affordable & fashionable, embellish your daily styling & catch up with the latest trend. All clothing is modernly designed and fresh-looking. Constant quality control & reasonable prices – ensure the utmost satisfaction of our customers.\r\n\r\nA huge variety of options, surely there’s one that will catch your eye! A huge variety of options, surely there’s one that will catches your eye!', '59', '59', '1707846501.jpg', '100', '0', 1, 0, 'Business Casual', 'Blue', 'Regular', 'Solid', 'Top', '2024-02-13 17:48:21', '2024-02-13 17:48:21'),
(19, 3, 'FOS x Northern Rock Men’s | CNY Fashion Polo Tee with Embroidery (MUS)', 'Polo Yellow 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nSize	\r\nS, M, L, XL, 2XL', 'Chinese New Year best outfit definitely matches with our Northern Rock Fashion Polo with Embroidery. Four different designs for you to choose. Perfect for any occasion, comfy and durable.\r\n\r\nHassle-free purchase with F.O.S by just shopping online. Authentic, affordable & fashionable, embellish your daily styling & catch up with the latest trend. All clothing is modernly designed and fresh-looking. Constant quality control & reasonable prices – ensure the utmost satisfaction of our customers.\r\n\r\nA huge variety of options, surely there’s one that will catch your eye! A huge variety of options, surely there’s one that will catches your eye!', '59', '59', '1707846677.jpg', '100', '0', 1, 1, 'Business Casual', 'Yellow', 'Regular', 'Solid', 'Top', '2024-02-13 17:51:17', '2024-02-13 18:59:05'),
(20, 3, 'FOS x Northern Rock Men’s | CNY Fashion Polo Tee with Embroidery (RED)', 'Polo Red 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nSize	\r\nS, M, L, XL, 2XL', 'Chinese New Year best outfit definitely matches with our Northern Rock Fashion Polo with Embroidery. Four different designs for you to choose. Perfect for any occasion, comfy and durable.\r\n\r\nHassle-free purchase with F.O.S by just shopping online. Authentic, affordable & fashionable, embellish your daily styling & catch up with the latest trend. All clothing is modernly designed and fresh-looking. Constant quality control & reasonable prices – ensure the utmost satisfaction of our customers.\r\n\r\nA huge variety of options, surely there’s one that will catch your eye! A huge variety of options, surely there’s one that will catches your eye!', '59', '59', '1707846750.jpg', '100', '0', 1, 1, 'Business Casual', 'Red', 'Regular', 'Solid', 'Top', '2024-02-13 17:52:30', '2024-02-13 18:59:16'),
(21, 3, 'FOS x Republic Men’s | Baby Terry Baseball Jacket', 'Jacket Grey 2', 'Weight	0.00 kg\r\nDimensions	0.00 × 0.00 × 0.00 cm\r\nSize	\r\nS', 'Chinese New Year best outfit definitely matches with our baseball jacket. Perfect for any occasion, comfy and durable. \r\n\r\nWalk in any of our outlets in Malaysia and purchase these outfits. Hassle-free purchase with F.O.S by just shopping online. Authentic, affordable & fashionable, embellish your daily styling & catch up with the latest trend.\r\n\r\nAll clothings are modernly design and fresh looking. Constant quality control & reasonable price – ensure the upmost satisfactions of our customers. A huge variety of options, surely there\'s one will catches your eye!', '119', '119', '1707846818.jpg', '100', '0', 1, 0, 'Sporty', 'Grey', 'Regular', 'Solid', 'Top', '2024-02-13 17:53:38', '2024-02-13 17:53:38'),
(23, 3, 'FOS x Navy & Navy Men’s | Oversized NASA Pullover Hoodie', 'Hoodie Red 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nColour	\r\nMRN, NVY\r\n\r\nSize	\r\nS, M, L, XL', 'Hassle-free purchase with F.O.S by just shopping online. Authentic, affordable & fashionable, embellish your daily styling & catch up with the latest trend.All clothing is modernly designed and fresh-looking.\r\n\r\nConstant quality control & reasonable prices – ensure the utmost satisfaction of our customers. A huge variety of options, surely there’s one that will catches your eye!', '69', '69', '1707846993.jpg', '100', '0', 1, 1, 'Casual', 'Red', 'Regular', 'Solid', 'Top', '2024-02-13 17:56:33', '2024-02-13 18:59:36'),
(24, 3, 'FOS x Navy & Navy Men’s | Basic Denim Long Slim Fit Pants', 'Denim Grey 1', 'Weight	0.00 kg\r\nDimensions	0.00 × 0.00 × 0.00 cm\r\nsize	\r\n0', 'Chinese New Year best outfit definitely matches with our Basic Chino Slim Fit Pants. Perfect for any occasion, comfy and durable. \r\n\r\nWalk in any of our outlets in Malaysia and purchase these outfits. Hassle-free purchase with F.O.S by just shopping online. Authentic, affordable & fashionable, embellish your daily styling & catch up with the latest trend.\r\n\r\nAll clothings are modernly design and fresh looking. Constant quality control & reasonable price – ensure the upmost satisfactions of our customers. A huge variety of options, surely there\'s one will catches your eye!', '69', '69', '1707847070.jpg', '100', '0', 1, 0, 'Casual', 'Grey', 'Slim', 'Solid', 'Bottom', '2024-02-13 17:57:50', '2024-02-13 17:57:50'),
(25, 3, 'FOS x Navy & Navy Men’s | Chino Bermuda Short Pants', 'Short Red 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nColour	\r\nDRE, DKH, GRN, SAN, OBR, NVY, SLB, TEA, BLU, CHR\r\n\r\nSize	\r\n28, 30, 32, 34, 36, 38, 40', 'Welcome to F.O.S Official e-Shop where we strive to provide our customers with an array of apparel products that satisfies the demand for quality, efficiency, comfort, and style at affordable prices. Buy any of our products from this F.O.S Official e-Shop in a hassle-free manner as all the products listed here are 100% authentic. So, start shopping for what you or/and your family need today and experience the excitement at F.O.S.\r\n\r\n \r\n\r\nNavy & Navy brand offers both Quality and Comfort wear that never go out of style in any occasion. Product functionality and design formed the core of our product innovation. Every piece of Navy & Navy Men’s clothing is modernly design and look fresh while being priced competitively to deliver the best value for consumers’ wallets. Our garment design and cutting are skewed towards Slim & Regular fit in order for you to look and feel good from top to bottom as you go through your daily lives.\r\n\r\n \r\n\r\n– The quality and comfortable wear for everyone\r\n\r\n– Practical and perfected as a culmination of any style for any occasion\r\n\r\n– Care for details and breathable fabric selection\r\n\r\n– Solid shade cotton bermuda shorts\r\n\r\n– Mid rise\r\n\r\n– Regular fit\r\n\r\n– Front zip and button fastening\r\n\r\n– Two side pockets\r\n\r\n– Two back welt pockets', '49', '49', '1707847148.jpg', '100', '0', 1, 1, 'Casual', 'Red', 'Regular', 'Solid', 'Bottom', '2024-02-13 17:59:08', '2024-02-13 18:59:56'),
(26, 3, 'FOS x Navy & Navy Men’s | Basic Chino Bermuda Shorts', 'Short Blue 1', 'Weight	0.00 kg\r\nDimensions	0.00 × 0.00 × 0.00 cm\r\nSize	\r\nS', 'Chinese New Year best outfit definitely matches with our shorts. Perfect for any occasion, comfy and durable. \r\n\r\nWalk in any of our outlets in Malaysia and purchase these outfits. Hassle-free purchase with F.O.S by just shopping online. Authentic, affordable & fashionable, embellish your daily styling & catch up with the latest trend.\r\n\r\nAll clothings are modernly design and fresh looking. Constant quality control & reasonable price – ensure the upmost satisfactions of our customers. A huge variety of options, surely there\'s one will catches your eye!', '49', '49', '1707847234.jpg', '100', '0', 1, 0, 'Casual', 'Blue', 'Regular', 'Solid', 'Bottom', '2024-02-13 18:00:34', '2024-02-13 18:00:34'),
(27, 3, 'FOS x Navy & Navy Men’s | Oxford Regular Round Collar Shirt', 'Oxford White', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nsize	\r\nS, M, L, XL\r\n\r\nRELATED PRODUCTS', 'Purchase any of our products in a hassle-free manner. All products listed here are 100% authentic. Affordable and fashionable, dress up with style to show off your own unique flair.\r\n\r\nEvery piece of Navy & Navy clothing is modernly design and look fresh while being priced competitively to deliver the best value for consumers’ wallets.\r\n\r\nWith a wide range of choices, they’ll be one which eventually catches your eye!', '49', '49', '1707847365.jpg', '100', '0', 1, 0, 'Casual', 'White', 'Regular', 'Stripes', 'Top', '2024-02-13 18:02:45', '2024-02-13 18:02:45'),
(28, 3, 'Navy & Navy Men’s | Short Sleeve Printed Slim Fit Shirt', 'Short Sleeve White 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nSize	\r\nS, M, L, XL', 'Purchase any of our products in a hassle-free manner. All products listed here are 100% authentic. Affordable and fashionable, dress up with style to show off your own unique flair.\r\n\r\n \r\n\r\nWith a wide range of choices, they’ll be one which eventually catches your eye!', '49', '49', '1707847475.jpg', '100', '0', 1, 0, 'Formal', 'White', 'Regular', 'Geometric', 'Top', '2024-02-13 18:04:35', '2024-02-13 18:04:35'),
(29, 3, 'FOS x Navy & Navy Men’s | Oxford Regular Round Collar Shirt (KHA)', 'Oxford Beige 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nSize	\r\nS, M, L, XL', 'Purchase any of our products in a hassle-free manner. All products listed here are 100% authentic. Affordable and fashionable, dress up with style to show off your own unique flair.\r\n\r\nEvery piece of Navy & Navy clothing is modernly design and look fresh while being priced competitively to deliver the best value for consumers’ wallets.With a wide range of choices, they’ll be one which eventually catches your eye!', '59', '59', '1707847572.jpg', '100', '0', 1, 0, 'Casual', 'Beige', 'Regular', 'Solid', 'Top', '2024-02-13 18:06:12', '2024-02-13 18:06:12'),
(30, 2, 'FOS x Pebbles Girls Graphic Tee | Cat Series (RED)', 'Tee Red 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nSize	\r\n3/4, 5/6, 7/8, 9/10', 'Cute lil cat graphic tee for your girls. Hassle-free purchase with F.O.S by just shopping online. Our products are definitely 100% authentic. Affordable & fashionable, embellish your daily styling & catch up with the latest trend.\r\n\r\nAll clothings are modernly design and fresh looking. Constant quality control & reasonable price – ensure the upmost satisfactions of our customers. A huge variety of options, surely there’s one will catches your eye!', '23', '23', '1707847645.jpg', '99', '0', 1, 1, 'Casual', 'Red', 'Regular', 'Solid', 'Top', '2024-02-13 18:07:25', '2024-02-14 08:03:10'),
(31, 2, 'FOS x Pebbles Girls Graphic Tee | Cat Series (CRB)', 'Tee Pink 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nSize	\r\n3/4, 5/6, 7/8, 9/10', 'Cute lil cat graphic tee for your girls. Hassle-free purchase with F.O.S by just shopping online. Our products are definitely 100% authentic. Affordable & fashionable, embellish your daily styling & catch up with the latest trend.\r\n\r\nAll clothings are modernly design and fresh looking. Constant quality control & reasonable price – ensure the upmost satisfactions of our customers. A huge variety of options, surely there’s one will catches your eye!', '23', '23', '1707847704.jpg', '100', '0', 1, 1, 'Casual', 'Pink', 'Regular', 'Solid', 'Top', '2024-02-13 18:08:24', '2024-02-13 19:00:56'),
(32, 2, 'FOS x Pebbles Girl’s Graphic Tee | Happy Day Series', 'Tee Purple 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nSize	\r\n3/4, 5/6, 7/8, 9/10', 'Hassle-free purchase with F.O.S by just shopping online. Our products are definitely 100% authentic. Affordable & fashionable, embellish your daily styling & catch up with the latest trend.\r\nAll clothings are modernly design and fresh looking. Constant quality control & reasonable price – ensure the upmost satisfactions of our customers.\r\n\r\nA huge variety of options, surely there’s one will catches your eye!', '23', '23', '1707847774.jpg', '100', '0', 1, 0, 'Casual', 'Purple', 'Regular', 'Solid', 'Top', '2024-02-13 18:09:34', '2024-02-13 18:09:34'),
(33, 2, 'FOS x Pebbles Girl’s Graphic Tee | Happy Day Series', 'Tee Blue 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nSize	\r\n3/4, 5/6, 7/8, 9/10', 'Purchase any of our products in a hassle-free manner. All products listed here are 100% authentic. Affordable and fashionable, dress up with style to show off your own unique flair.\r\n\r\nEvery piece of Pebbles clothing is fun and easy to mix and match from top to bottom while being priced competitively to deliver the best value offerings for consumers’ wallets.\r\n\r\nWith a wide range of choices, they’ll be one which eventually catches your eye!', '23', '23', '1707847847.jpg', '100', '0', 1, 0, 'Casual', 'Blue', 'Regular', 'Solid', 'Top', '2024-02-13 18:10:47', '2024-02-13 18:10:47'),
(34, 2, 'FOS x Pebbles Girl’s | Long JoggerFOS x Pebbles Girl’s | Long Jogger', 'Jogger Blue 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nColour	\r\nMEL, DRE, DTP, DNV\r\n\r\nSize (yrs)	\r\n3/4, 5/6, 7/8, 9/10', 'Purchase any of our products in a hassle-free manner. All products listed here are 100% authentic. Affordable and fashionable, dress up with style to show off your own unique flair.\r\n\r\nWith a wide range of choices, they’ll be one which eventually catches your eye!', '29', '29', '1707847939.jpg', '100', '0', 1, 0, 'Sporty', 'Blue', 'Regular', 'Solid', 'Bottom', '2024-02-13 18:12:19', '2024-02-13 18:12:19'),
(35, 2, 'FOS x Pebbles Girl’s | Skirt Leggings', 'Legging Purple 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nColour	\r\nBEJ, BLK, DME, DPU\r\n\r\nSize (yrs)	\r\n3/4, 5/6, 7/8, 9/10', 'Purchase any of our products in a hassle-free manner. All products listed here are 100% authentic. Affordable and fashionable, dress up with style to show off your own unique flair.\r\n\r\nWith a wide range of choices, they’ll be one which eventually catches your eye!', '29', '29', '1707847991.jpg', '100', '0', 1, 0, 'Sporty', 'Purple', 'Regular', 'Solid', 'Bottom', '2024-02-13 18:13:11', '2024-02-13 18:13:11'),
(36, 4, 'FOS x CNY oldskool Family Graphic Tee | CNY ‘24 Dragon Family Series (Red)', 'Tee Red 2', 'Weight	0.00 kg\r\nDimensions	0.00 × 0.00 × 0.00 cm\r\nCategory	\r\nMen, Women, Kids', 'Truly a great start for the dragon year with F.O.S Dragon series graphic tee. More fun when you can match it with your loved ones or send these lovely fortunes to them. Comes with two colours: green and red, lucky shirt for CNY 2024! Don\'t missed out any of our CNY series and shop now with F.O.S\r\n\r\nHassle-free purchase with F.O.S by just shopping online. Authentic, affordable & fashionable, embellish your daily styling & catch up with the latest trend.\r\n\r\nAll clothing are modernly design and fresh looking. Constant quality control & reasonable price – ensure the upmost satisfactions of our customers.', '23', '23', '1707848096.jpg', '100', '0', 1, 1, 'Casual', 'Red', 'Regular', 'Solid', 'Top', '2024-02-13 18:14:56', '2024-02-13 19:01:38'),
(37, 4, 'FOS x CNY oldskool Family Graphic Tee | CNY ‘24 Dragon Family Series', 'Tee Green 1', 'Weight	0.00 kg\r\nDimensions	0.00 × 0.00 × 0.00 cm\r\nCategory	\r\nMen, Women, Kids', 'Truly a great start for the dragon year with F.O.S Dragon series graphic tee. More fun when you can match it with your loved ones or send these lovely fortunes to them. Comes with two colours: green and red, lucky shirt for CNY 2024! Don\'t missed out any of our CNY series and shop now with F.O.S\r\n\r\nHassle-free purchase with F.O.S by just shopping online. Authentic, affordable & fashionable, embellish your daily styling & catch up with the latest trend.\r\n\r\nAll clothing are modernly design and fresh looking. Constant quality control & reasonable price – ensure the upmost satisfactions of our customers.', '23', '23', '1707848165.jpg', '100', '0', 1, 0, 'Casual', 'Green', 'Regular', 'Solid', 'Top', '2024-02-13 18:16:05', '2024-02-13 18:16:05'),
(38, 4, 'FOS x CNY oldskool Family Graphic Tee | CNY ‘24 Huat Family Series', 'Tee Orange 1', 'Weight	0.00 kg\r\nDimensions	0.00 × 0.00 × 0.00 cm\r\nCategory	\r\nMen, Women, Kids', 'Huat for a better year! Be the center of attention by wearing F.O.S bright orange Huat series CNY graphic tee with a cool dragon design! Best 2023A CNY outfit for couples and even family\r\n\r\nHassle-free purchase with F.O.S by just shopping online. Authentic, affordable & fashionable, embellish your daily styling & catch up with the latest trend.\r\n\r\nAll clothing are modernly design and fresh looking. Constant quality control & reasonable price – ensure the upmost satisfactions of our customers.', '23', '23', '1707848222.jpg', '100', '0', 1, 1, 'Casual', 'Orange', 'Regular', 'Solid', 'Top', '2024-02-13 18:17:02', '2024-02-13 19:01:55'),
(39, 4, 'FOS x Pebbles Boy’s Terry Jogger', 'Jogger Green 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nSize	\r\n3/4, 5/6, 7/8, 9/10', 'Purchase any of our products in a hassle-free manner. All products listed here are 100% authentic. Affordable and fashionable, dress up with style to show off your own unique flair.\r\n\r\nEvery piece of Pebbles clothing is fun and easy to mix and match from top to bottom while being priced competitively to deliver the best value offerings for consumers’ wallets.\r\n\r\nWith a wide range of choices, they’ll be one which eventually catches your eye!', '29', '29', '1707848328.png', '100', '0', 1, 0, 'Sporty', 'Green', 'Regular', 'Solid', 'Bottom', '2024-02-13 18:18:48', '2024-02-13 18:18:48'),
(40, 4, 'FOS x Pebbles Boy’s Terry Jogger', 'Jogger Black 1', 'Weight	0.20 kg\r\nDimensions	1.00 × 1.00 × 1.00 cm\r\nSize	\r\n3/4, 5/6, 7/8, 9/10', 'Purchase any of our products in a hassle-free manner. All products listed here are 100% authentic. Affordable and fashionable, dress up with style to show off your own unique flair.\r\n\r\nEvery piece of Pebbles clothing is fun and easy to mix and match from top to bottom while being priced competitively to deliver the best value offerings for consumers’ wallets.\r\n\r\nWith a wide range of choices, they’ll be one which eventually catches your eye!', '29', '29', '1707848418.jpg', '100', '0', 1, 0, 'Sporty', 'Black', 'Regular', 'Solid', 'Bottom', '2024-02-13 18:20:18', '2024-02-13 18:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_outlets`
--

-- CREATE TABLE `product_outlets` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `outlet_id` bigint(20) NOT NULL,
--   `name` varchar(191) NOT NULL,
--   `slug` varchar(191) NOT NULL,
--   `original_price` varchar(191) NOT NULL,
--   `selling_price` varchar(191) NOT NULL,
--   `image` varchar(191) NOT NULL,
--   `quantity` varchar(191) NOT NULL,
--   `tax` varchar(191) NOT NULL,
--   `status` tinyint(4) NOT NULL,
--   `trending` tinyint(4) NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_outlets`
--

INSERT INTO `product_outlets` (`id`, `outlet_id`, `name`, `slug`, `original_price`, `selling_price`, `image`, `quantity`, `tax`, `status`, `trending`, `created_at`, `updated_at`) VALUES
(1, 1, 'FOS x Northern Rock Men’s | CNY Fashion Polo Tee with Embroidery (RED)', 'Polo Red 1', '59', '59', '1707849604.jpg', '100', '0', 1, 1, '2024-02-13 18:40:04', '2024-02-13 18:40:04'),
(2, 12, 'FOS x Northern Rock Men’s | CNY Fashion Polo Tee with Embroidery (RED)', 'Polo Red 2', '59', '59', '1707849641.jpg', '100', '0', 1, 1, '2024-02-13 18:40:41', '2024-02-13 18:40:41'),
(3, 2, 'FOS x Navy & Navy Women’s | Basic Short Sleeve Tee with Pocket Embroidery (LMC)', 'Yellow T-shirt 1', '25', '25', '1707849733.jpg', '100', '0', 1, 1, '2024-02-13 18:42:13', '2024-02-13 18:42:13'),
(4, 5, 'FOS x Navy & Navy Women’s | Long Sleeve Stripe Sweater', 'Long Sleeve Red 1', '49', '49', '1707849778.jpg', '100', '0', 1, 1, '2024-02-13 18:42:58', '2024-02-13 18:42:58'),
(5, 4, 'FOS x Pebbles Boy’s Terry Jogger', 'Jogger Green 1', '29', '29', '1707849827.png', '100', '0', 1, 1, '2024-02-13 18:43:47', '2024-02-13 18:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

-- CREATE TABLE `ratings` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `user_id` varchar(191) NOT NULL,
--   `prod_id` varchar(191) NOT NULL,
--   `stars_rated` varchar(191) NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

-- CREATE TABLE `reviews` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `user_id` varchar(191) NOT NULL,
--   `prod_id` varchar(191) NOT NULL,
--   `user_review` mediumtext NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

-- CREATE TABLE `users` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `name` varchar(191) NOT NULL,
--   `email` varchar(191) NOT NULL,
--   `email_verified_at` timestamp NULL DEFAULT NULL,
--   `password` varchar(191) NOT NULL,
--   `lname` varchar(191) DEFAULT NULL,
--   `phone` varchar(191) DEFAULT NULL,
--   `address1` varchar(191) DEFAULT NULL,
--   `address2` varchar(191) DEFAULT NULL,
--   `city` varchar(191) DEFAULT NULL,
--   `state` varchar(191) DEFAULT NULL,
--   `country` varchar(191) DEFAULT NULL,
--   `postalcode` varchar(191) DEFAULT NULL,
--   `role_as` tinyint(4) NOT NULL DEFAULT 0,
--   `color_preference` varchar(191) DEFAULT NULL,
--   `style_preference` varchar(191) DEFAULT NULL,
--   `fit_preference` varchar(191) DEFAULT NULL,
--   `pattern_preference` varchar(191) DEFAULT NULL,
--   `gender` varchar(191) DEFAULT NULL,
--   `clothing_type` varchar(191) DEFAULT NULL,
--   `points` bigint(20) NOT NULL,
--   `remember_token` varchar(100) DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `lname`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `postalcode`, `role_as`, `color_preference`, `style_preference`, `fit_preference`, `pattern_preference`, `gender`, `clothing_type`, `points`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Haikal', 'haikal@gmail.com', NULL, '$2y$10$TjEISv.l.PKICL/22r8bvumAlpVyTbcuhAhI/Y8LeqQ1VJbo.54ui', 'Moslim', '0123456789', 'No 7, Jalan Sri Wangsa 6', 'Taman Sri Wangsa', 'Batu Pahat', 'Johor', 'Malaysia', '83000', 1, '', '', '', '', '', NULL, 23, NULL, '2023-10-17 06:05:25', '2024-02-14 08:21:48'),
(11, 'Aqilah', 'aqilah@gmail.com', NULL, '$2y$10$YMxqkMTtg0OSCXcXSiV.ROrc1U9eBOcJjZzUdnXxav1zAa0ueH1m.', 'Moslim', '0123456789', 'No 7, Jalan Sri Wangsa 6', 'Taman Sri Wangsa', 'Batu Pahat', 'Johor', 'Malaysia', '83000', 0, '', '', '', '', '', NULL, 103, NULL, '2023-12-12 00:19:59', '2023-12-12 01:37:49'),
(15, 'Adi', 'adi@gmail.com', NULL, '$2y$10$291V7MGiqHniEiD/Yr4zTucw1nhyyNviwfJFahI7hMphe4UHFo5S6', 'Irman', '0123456789', 'Taman U', 'Parit Raja', 'Batu Pahat', 'Johor', 'Malaysia', '83000', 0, '', '', '', '', '', NULL, 42, NULL, '2024-01-04 00:24:36', '2024-02-11 08:54:47'),
(16, 'Aida', 'aida@gmail.com', NULL, '$2y$10$jSYTbkQMz/qF62jqPeg1eelUxGDcHBDVL7gfyf1uW09aL68ITCxoO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', '', '', '', '', NULL, 10, NULL, '2024-01-10 19:37:24', '2024-01-10 19:37:24'),
(18, 'Astrini', 'ast@gmail.com', NULL, '$2y$10$HPv9xO3a5KW/zB/Rt.dMK.G6g1rpNQasqDBMhJkcoaYM0zf1SWO.u', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'red', 'casual', 'slim', 'stripes', 'men', 'top,bottom', 10, NULL, '2024-01-16 19:20:49', '2024-01-16 19:20:49'),
(20, 'Zaim', 'zaim@gmail.com', NULL, '$2y$10$fvpNKIr8cXytBnh1SnKe3.pxVbAD8I6YSPqxQ.7FY5I5gRa0Sd8d2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'red', 'casual', 'slim', 'stripes,solid', 'men', 'top,bottom', 10, NULL, '2024-01-16 19:58:08', '2024-01-16 19:58:08'),
(21, 'Maisarah', 'mai@gmail.com', NULL, '$2y$10$011FBc4/WXfduMpIvZEqgOsUSC0ULKgDeGO28CIv1SYpqzMHhAO2a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'red,blue', 'casual,formal', 'slim,loose', 'stripes,solid', 'men', 'top,bottom', 10, NULL, '2024-01-16 20:04:41', '2024-01-16 20:04:41'),
(22, 'Khairul Ashraf', 'acap.gamers717@gmail.com', NULL, '$2y$10$198qf7MJ1kcBVPDIm5LuTONFzD/A4PF6Z62htImrezHmn9dlBRcya', 'john', '1234567', '123,jalan congkak', 'taman detroit 90', 'detroit', 'jitra', 'kedah', '534536343766', 0, 'white', 'business', 'regular', 'solid', 'men', 'top,bottom', 0, NULL, '2024-01-29 18:02:35', '2024-01-29 18:05:13'),
(23, 'Admin', 'admin@gmail.com', NULL, '$2y$10$GuxLm.SguFdRUL08ykzTr.A8TPI4VBjMa.EK1jciaQzs8j5EqtH3y', 'admin', '01234567', 'Kampung Semunjok', 'Seri Mendapat', 'Jasin', 'Melaka', 'Malaysia', '773190', 1, 'red,blue,orange,grey,beige', 'casual', 'slim,regular', 'stripes,checks,floral,solid', 'men', 'top,bottom', 24, NULL, '2024-01-31 08:00:47', '2024-02-01 03:07:48'),
(24, 'Ros', 'rosazrina@gmail.com', NULL, '$2y$10$V9whRCoXeq4pn4kUoyuGkeYxuVz76YiSbkVc/2X4HAOHTClByBG1W', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'red', 'casual', 'slim', 'stripes', 'men', 'top,bottom', 10, NULL, '2024-02-07 01:49:42', '2024-02-07 01:49:42'),
(25, 'Fatin Najwa', 'fatinkhr@gmail.com', NULL, '$2y$10$HLnsCJzzeyItJU5xlXaLUeQF7z1/Bmo7YbzQ9TDSU5uWOwKRBADye', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'green,purple,black,grey', 'casual,vintage', 'loose', 'floral,solid', 'women', 'top,bottom', 10, NULL, '2024-02-14 01:37:37', '2024-02-14 01:37:37'),
(28, 'Abu', 'abu@gmail.com', NULL, '$2y$10$WXLs.zDVBa0jQyozcNEE1.k0bza.Cmdw/gku67oZne1vNxLRf5QkO', 'Moslim', '0123456789', 'No 7, Jalan Sri Wangsa 6', 'Taman Sri Wangsa', 'Batu Pahat', 'Johor', 'Malaysia', '83000', 0, 'red,orange,yellow', 'casual,formal', 'slim,regular,loose', 'stripes,solid', 'men', 'top,bottom', 58, NULL, '2024-02-14 03:25:07', '2024-02-14 08:03:10'),
(29, 'Ast Comey', 'astriniakashah16@gmail.com', NULL, '$2y$10$Pnt25oW5dQuEcQ5o37r17Omsl.ObNpVCp0BkvybrSSv7Vp1rLyASi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'yellow,green,purple,white,black', 'casual,formal', 'loose', 'checks,solid', 'women', 'top,bottom', 10, NULL, '2024-02-14 04:27:32', '2024-02-14 04:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

-- CREATE TABLE `vouchers` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `user_id` varchar(191) NOT NULL,
--   `amount` varchar(191) NOT NULL,
--   `vcode` varchar(191) NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   `is_used` tinyint(1) NOT NULL DEFAULT 0,
--   `order_id` bigint(20) UNSIGNED DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `user_id`, `amount`, `vcode`, `created_at`, `updated_at`, `is_used`, `order_id`) VALUES
(1, '1', '10', 'RM10 OFF', '2024-02-14 02:57:37', '2024-02-14 02:57:37', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

-- CREATE TABLE `wishlists` (
--   `id` bigint(20) UNSIGNED NOT NULL,
--   `user_id` varchar(191) NOT NULL,
--   `prod_id` varchar(191) NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `prod_id`, `created_at`, `updated_at`) VALUES
(1, '1', '17', '2024-02-14 02:51:59', '2024-02-14 02:51:59'),
(2, '29', '31', '2024-02-14 04:29:20', '2024-02-14 04:29:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
-- ALTER TABLE `ads`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- Indexes for table `carts`
-- --
-- ALTER TABLE `carts`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- Indexes for table `categories`
-- --
-- ALTER TABLE `categories`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- Indexes for table `customers_table`
-- --
-- ALTER TABLE `customers_table`
--   ADD PRIMARY KEY (`customer_id`);

-- --
-- -- Indexes for table `failed_jobs`
-- --
-- ALTER TABLE `failed_jobs`
--   ADD PRIMARY KEY (`id`),
--   ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

-- --
-- -- Indexes for table `locations`
-- --
-- ALTER TABLE `locations`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- Indexes for table `migrations`
-- --
-- ALTER TABLE `migrations`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- Indexes for table `orders`
-- --
-- ALTER TABLE `orders`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- Indexes for table `order_items`
-- --
-- ALTER TABLE `order_items`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- Indexes for table `password_resets`
-- --
-- ALTER TABLE `password_resets`
--   ADD KEY `password_resets_email_index` (`email`);

-- --
-- -- Indexes for table `personal_access_tokens`
-- --
-- ALTER TABLE `personal_access_tokens`
--   ADD PRIMARY KEY (`id`),
--   ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
--   ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

-- --
-- -- Indexes for table `products`
-- --
-- ALTER TABLE `products`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- Indexes for table `product_outlets`
-- --
-- ALTER TABLE `product_outlets`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- Indexes for table `ratings`
-- --
-- ALTER TABLE `ratings`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- Indexes for table `reviews`
-- --
-- ALTER TABLE `reviews`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- Indexes for table `users`
-- --
-- ALTER TABLE `users`
--   ADD PRIMARY KEY (`id`),
--   ADD UNIQUE KEY `users_email_unique` (`email`);

-- --
-- -- Indexes for table `vouchers`
-- --
-- ALTER TABLE `vouchers`
--   ADD PRIMARY KEY (`id`),
--   ADD KEY `vouchers_order_id_foreign` (`order_id`);

-- --
-- -- Indexes for table `wishlists`
-- --
-- ALTER TABLE `wishlists`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- AUTO_INCREMENT for dumped tables
-- --

-- --
-- -- AUTO_INCREMENT for table `ads`
-- --
-- ALTER TABLE `ads`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

-- --
-- -- AUTO_INCREMENT for table `carts`
-- --
-- ALTER TABLE `carts`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

-- --
-- -- AUTO_INCREMENT for table `categories`
-- --
-- ALTER TABLE `categories`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

-- --
-- -- AUTO_INCREMENT for table `customers_table`
-- --
-- ALTER TABLE `customers_table`
--   MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

-- --
-- -- AUTO_INCREMENT for table `failed_jobs`
-- --
-- ALTER TABLE `failed_jobs`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

-- --
-- -- AUTO_INCREMENT for table `locations`
-- --
-- ALTER TABLE `locations`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

-- --
-- -- AUTO_INCREMENT for table `migrations`
-- --
-- ALTER TABLE `migrations`
--   MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

-- --
-- -- AUTO_INCREMENT for table `orders`
-- --
-- ALTER TABLE `orders`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

-- --
-- -- AUTO_INCREMENT for table `order_items`
-- --
-- ALTER TABLE `order_items`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

-- --
-- -- AUTO_INCREMENT for table `personal_access_tokens`
-- --
-- ALTER TABLE `personal_access_tokens`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

-- --
-- -- AUTO_INCREMENT for table `products`
-- --
-- ALTER TABLE `products`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

-- --
-- -- AUTO_INCREMENT for table `product_outlets`
-- --
-- ALTER TABLE `product_outlets`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

-- --
-- -- AUTO_INCREMENT for table `ratings`
-- --
-- ALTER TABLE `ratings`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

-- --
-- -- AUTO_INCREMENT for table `reviews`
-- --
-- ALTER TABLE `reviews`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

-- --
-- -- AUTO_INCREMENT for table `users`
-- --
-- ALTER TABLE `users`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

-- --
-- -- AUTO_INCREMENT for table `vouchers`
-- --
-- ALTER TABLE `vouchers`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- --
-- -- AUTO_INCREMENT for table `wishlists`
-- --
-- ALTER TABLE `wishlists`
--   MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- --
-- -- Constraints for dumped tables
-- --

-- --
-- -- Constraints for table `vouchers`
-- --
-- ALTER TABLE `vouchers`
--   ADD CONSTRAINT `vouchers_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
-- COMMIT;

-- /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
-- /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
