-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 16, 2022 at 06:22 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

DROP TABLE IF EXISTS `achievements`;
CREATE TABLE IF NOT EXISTS `achievements` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `achievements_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `title`, `slug`, `link`, `status`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Final Comparative Report For Covid1-9 Response Items', 'final-comparative-report-for-covid1-9-response-items', NULL, 1, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.</p><p>And a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><ul><li>Nullam at erat quis eros finibus aliquam.</li><li>Cras nec risus lobortis, auctor ipsum quis, vulputate purus.</li><li>Morbi id tellus non arcu pulvinar gravida.</li><li>Nulla bibendum odio non felis pulvinar interdum.</li><li>Aliquam condimentum mauris et velit tempus dictum.</li><li>Curabitur non libero eu lectus facilisis aliquet ac maximus justo.</li></ul><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', NULL, '2022-08-09 08:00:01', '2022-08-09 08:03:46'),
(2, 'Final comparative report for covid19 response items', 'final-comparative-report-for-covid19-response-items', NULL, 1, '<p>Final comparative report for covid19 response items</p>', NULL, '2022-08-09 08:01:26', '2022-08-09 08:01:26'),
(3, 'Final Comparative Report For Covid1-9 Response Items', 'final-comparative-report-for-covid1-9-response-items-2', NULL, 1, '<p>Final Comparative Report For Covid1-9 Response Items</p>', NULL, '2022-08-09 08:01:56', '2022-08-09 08:01:56'),
(4, 'test', 'test', NULL, 0, '<p>dfasd</p>', '2022-08-12 08:51:01', '2022-08-12 08:50:56', '2022-08-12 08:51:01');

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

DROP TABLE IF EXISTS `alerts`;
CREATE TABLE IF NOT EXISTS `alerts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`id`, `title`, `link`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(1, 'not working', NULL, '2022-08-12 09:49:22', '2022-07-26 05:59:38', '2022-08-12 09:49:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `type`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Tenders', 'news', '<p>Tenders</p>', 1, NULL, '2022-08-05 00:36:49', '2022-08-05 00:36:49', ''),
(2, 'News', 'news', '<p>News</p>', 1, NULL, '2022-08-05 00:52:02', '2022-08-05 00:52:02', ''),
(3, 'Announcements', 'news', '<p>Announcements</p>', 1, NULL, '2022-08-05 01:01:17', '2022-08-05 01:01:17', ''),
(4, 'Teaching Hospitals', 'hospital', '<p>Teaching Hospitals 09</p>', 1, NULL, '2022-08-10 02:26:33', '2022-08-10 10:22:23', 'Teaching-Hospitals'),
(5, 'Category D Hospitals', 'hospital', '<p>63</p>', 1, NULL, '2022-08-10 02:26:48', '2022-08-10 02:26:48', 'Category-D-Hospitals'),
(6, 'Category B Hospitals', 'hospital', '<p>12</p>', 1, NULL, '2022-08-10 02:27:09', '2022-08-10 02:27:09', 'Category-B-Hospitals'),
(7, 'Category C Hospitals', 'hospital', '<p>67</p>', 1, NULL, '2022-08-10 02:27:25', '2022-08-10 02:27:25', 'Category-C-Hospitals'),
(8, 'ACTS', 'download', '<p>ACTS</p>', 1, NULL, '2022-08-11 01:32:58', '2022-08-11 01:32:58', 'acts'),
(9, 'LAWS', 'download', '<p>Laws</p>', 1, NULL, '2022-08-11 01:33:34', '2022-08-11 01:33:34', 'laws'),
(10, 'POLICIES', 'download', '<p>POLICIES</p>', 1, NULL, '2022-08-11 01:36:44', '2022-08-11 01:36:44', 'policies');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `subject`, `message`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Test', '23232', 'Test', 'Test', NULL, NULL, '2022-08-14 05:48:19', '2022-08-14 05:48:19'),
(2, 'Test', '34323243', 'imranemi143@gmail.com', 'test', '<p>adsfasdfdsa</p>', NULL, '2022-08-14 05:48:49', '2022-08-14 05:50:26');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `district_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `disable_enable_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`district_id`, `district_name`, `created_at`, `updated_at`, `disable_enable_status`) VALUES
(1, 'Mardan', '2022-07-13 10:31:07', '2022-07-13 10:31:07', 1),
(2, 'Peshawar', '2022-07-13 10:31:07', '2022-07-13 10:31:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

DROP TABLE IF EXISTS `downloads`;
CREATE TABLE IF NOT EXISTS `downloads` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `downloads_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id`, `title`, `status`, `description`, `deleted_at`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'test', 0, '<p>fadfs</p>', '2022-07-20 00:43:43', '2022-07-19 22:14:50', '2022-07-20 00:43:43', NULL),
(2, 'test', 0, '<p>fadfs</p>', '2022-07-19 22:15:18', '2022-07-19 22:15:11', '2022-07-19 22:15:18', NULL),
(3, NULL, 1, '<p>imran ali	</p>', '2022-07-20 00:43:46', '2022-07-20 00:42:47', '2022-07-20 00:43:46', NULL),
(4, 'Transfer Letter', 1, '<p>Transfer Letter</p>', NULL, '2022-08-11 04:57:01', '2022-08-11 04:57:01', 8);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallaries`
--

DROP TABLE IF EXISTS `gallaries`;
CREATE TABLE IF NOT EXISTS `gallaries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallaries`
--

INSERT INTO `gallaries` (`id`, `title`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'dfsaasd', '<p>dsafads</p>', 0, '2022-07-27 03:01:18', NULL, NULL),
(2, 'test', '<p>test</p>', 0, '2022-08-11 21:44:57', NULL, '2022-08-11 21:44:57'),
(3, 'Gallery', '<p>Gallery</p>', 1, NULL, '2022-08-11 21:40:23', '2022-08-11 21:45:29'),
(4, 'sddsa', NULL, 0, '2022-08-12 08:56:42', '2022-08-12 08:56:39', '2022-08-12 08:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

DROP TABLE IF EXISTS `hospitals`;
CREATE TABLE IF NOT EXISTS `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_hospital` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hospitals_category_id_foreign` (`category_id`),
  KEY `hospitals_district_id_foreign` (`district_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `category`, `number_of_hospital`, `link`, `deleted_at`, `created_at`, `updated_at`, `status`, `category_id`, `name`, `lat`, `lng`, `slug`, `phone`, `email`, `address`, `district_id`) VALUES
(7, NULL, NULL, NULL, NULL, '2022-08-10 02:51:53', '2022-08-10 23:53:08', 1, 4, 'Kth Hospital', '33.9973067941825', '71.48588283863845', 'kth-hospital', '0919224400', 'kth@kth.com', 'University Rd, Rahat Abad, Peshawar, Khyber', 2);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `title`, `category_id`, `type`, `link`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Home', NULL, 'quick', NULL, 1, NULL, '2022-08-10 22:16:39', '2022-08-10 22:18:20'),
(2, 'Team', NULL, 'quick', NULL, 1, NULL, '2022-08-10 22:20:02', '2022-08-10 22:20:02'),
(3, 'News', NULL, 'quick', NULL, 1, NULL, '2022-08-10 22:20:19', '2022-08-10 22:20:19'),
(4, 'Downloads', NULL, 'quick', NULL, 1, NULL, '2022-08-10 22:20:40', '2022-08-10 22:20:40'),
(5, 'About', NULL, 'quick', NULL, 1, NULL, '2022-08-10 22:20:52', '2022-08-10 22:20:52'),
(6, 'Home', NULL, 'important', NULL, 1, NULL, '2022-08-10 22:21:07', '2022-08-10 22:21:20'),
(7, 'Why Choose', NULL, 'important', NULL, 1, NULL, '2022-08-10 22:21:29', '2022-08-10 22:21:29'),
(8, 'Why Us?', NULL, 'important', NULL, 1, NULL, '2022-08-10 22:21:42', '2022-08-10 22:21:42'),
(9, 'Clients', NULL, 'important', NULL, 1, NULL, '2022-08-10 22:21:53', '2022-08-10 22:21:53'),
(10, 'Home', NULL, 'footer', NULL, 1, NULL, '2022-08-11 00:10:17', '2022-08-11 00:10:17'),
(11, 'About', NULL, 'footer', NULL, 1, NULL, '2022-08-11 00:10:30', '2022-08-11 00:10:30'),
(12, 'News', NULL, 'footer', NULL, 1, NULL, '2022-08-11 00:10:45', '2022-08-11 00:10:45'),
(13, 'Downloads', NULL, 'footer', NULL, 1, NULL, '2022-08-11 00:11:03', '2022-08-11 00:11:03'),
(14, NULL, NULL, 'quick', NULL, 0, '2022-08-12 08:48:58', '2022-08-12 08:48:53', '2022-08-12 08:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `model_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=MyISAM AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(5, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 5, '32f93ed8-2ec1-47eb-ad21-a92d99980f13', 'logo', 'medA067', '1658131119.png', 'image/png', 'media', 'media', 31788, '[]', '{\"type\": \"image\", \"ratio\": \"4.196\", \"width\": 428, \"height\": 102, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 3, '2022-07-18 02:58:40', '2022-07-18 02:58:44'),
(2, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 2, '858e8805-8a08-470f-8180-ba0ef90ffb2f', 'logo', 'med3969', '1658127095.png', 'image/png', 'media', 'media', 386659, '[]', '{\"type\": \"image\", \"ratio\": \"1\", \"width\": 800, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 2, '2022-07-18 01:51:35', '2022-07-18 01:51:40'),
(16, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 16, '37c79aaa-dea8-4505-bd75-2e21da093f25', 'slide', 'med269C', '1658292569.png', 'image/png', 'media', 'media', 1367709, '[]', '{\"type\": \"image\", \"ratio\": \"0.75\", \"width\": 900, \"height\": 1200, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 8, '2022-07-19 23:49:29', '2022-07-19 23:49:32'),
(13, 'App\\Models\\Download', 1, '86b65b61-0430-4487-a48c-261f4c64f92c', 'download', 'med3478', '1658286871.png', 'image/png', 'media', 'media', 386659, '[]', '{\"type\": \"image\", \"ratio\": \"1\", \"width\": 800, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 6, '2022-07-19 22:14:31', '2022-07-19 22:14:50'),
(9, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 9, '6ddac074-f419-4ce3-b1a7-730fdfbc11a7', 'slide', 'medE324', '1658205979.png', 'image/png', 'media', 'media', 1367709, '[]', '{\"type\": \"image\", \"ratio\": \"0.75\", \"width\": 900, \"height\": 1200, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 4, '2022-07-18 23:46:19', '2022-07-18 23:46:23'),
(12, 'App\\Models\\Download', 1, 'db42ffa7-e015-4ed9-9726-6b0aeb2f1bf8', 'download', 'med24B4', '1658286867.png', 'image/png', 'media', 'media', 808010, '[]', '{\"type\": \"image\", \"ratio\": \"1\", \"width\": 800, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 5, '2022-07-19 22:14:27', '2022-07-19 22:14:50'),
(15, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 15, '47d88d5c-0c1e-404b-86de-3d920c116e02', 'download', 'Link', 'link.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'media', 'media', 55762, '[]', '{\"type\": \"document\", \"status\": \"processing\", \"progress\": 100}', '[]', '[]', 7, '2022-07-19 22:17:56', '2022-07-19 22:17:56'),
(22, 'App\\Models\\Download', 3, '6e9f37e7-2637-4836-90d4-b81af53de4ec', 'team', 'medD712', '1658295760.png', 'image/png', 'media', 'media', 1367709, '[]', '{\"type\": \"image\", \"ratio\": \"0.75\", \"width\": 900, \"height\": 1200, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 9, '2022-07-20 00:42:40', '2022-07-20 00:42:47'),
(23, 'App\\Models\\Team', 1, '72238d2d-6b41-4d0d-8a2d-7551a75e5cc7', 'team', 'med696F', '1658295863.png', 'image/png', 'media', 'media', 1367709, '[]', '{\"type\": \"image\", \"ratio\": \"0.75\", \"width\": 900, \"height\": 1200, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 10, '2022-07-20 00:44:23', '2022-07-20 00:44:27'),
(25, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 25, '2533e4ca-77d8-457c-8f18-6ab065b309bf', 'download', '26-06-2022 pre medical', '26-06-2022-pre-medica.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'media', 'media', 2082583, '[]', '{\"type\": \"document\", \"status\": \"processing\", \"progress\": 100}', '[]', '[]', 11, '2022-07-20 02:30:30', '2022-07-20 02:30:30'),
(31, 'App\\Models\\Slide', 7, 'b8c5da59-e842-4f9b-8a88-a310eda4ab75', 'slide', 'medE883', '1658716964.png', 'image/png', 'media', 'media', 835589, '[]', '{\"type\": \"image\", \"ratio\": \"1.304\", \"width\": 1038, \"height\": 796, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-24 21:42:44', '2022-07-24 21:44:19'),
(32, 'App\\Models\\Team', 2, 'c8267b0b-5bc2-4fb5-ae95-11124c24b116', 'team', 'medA37A', '1658717536.png', 'image/png', 'media', 'media', 61135, '[]', '{\"type\": \"image\", \"ratio\": \"0.946\", \"width\": 192, \"height\": 203, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-24 21:52:16', '2022-07-24 21:52:24'),
(33, 'App\\Models\\Team', 3, 'c12f2ea7-88de-4c5b-8976-1f409564b2c8', 'team', 'med1007', '1658726739.png', 'image/png', 'media', 'media', 56055, '[]', '{\"type\": \"image\", \"ratio\": \"0.946\", \"width\": 192, \"height\": 203, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-25 00:25:40', '2022-07-25 00:25:46'),
(34, 'App\\Models\\Team', 4, '185d645d-d903-4741-8ae7-8771de33c78f', 'team', 'medF8CF', '1658727323.png', 'image/png', 'media', 'media', 74360, '[]', '{\"type\": \"image\", \"ratio\": \"0.946\", \"width\": 192, \"height\": 203, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-25 00:35:23', '2022-07-25 00:35:29'),
(35, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 35, '0fcc827a-2130-4115-8340-acb33fc14b84', 'hospital', 'medC2E2', '1658824490.png', 'image/png', 'media', 'media', 240074, '[]', '{\"type\": \"image\", \"ratio\": \"2.048\", \"width\": 1024, \"height\": 500, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-26 03:34:52', '2022-07-26 03:35:03'),
(36, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 36, '0b73de56-cfca-45ca-9b4b-4d8cab078976', 'hospital', 'med3A73', '1658824586.png', 'image/png', 'media', 'media', 149171, '[]', '{\"type\": \"image\", \"ratio\": \"0.473\", \"width\": 568, \"height\": 1200, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-26 03:36:26', '2022-07-26 03:36:29'),
(37, 'App\\Models\\Hospital', 1, '5198f119-7528-4530-ac41-133f1ec42421', 'hospital', 'med1AC8', '1658829362.png', 'image/png', 'media', 'media', 75211, '[]', '{\"type\": \"image\", \"ratio\": \"1\", \"width\": 240, \"height\": 240, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-26 04:56:02', '2022-07-26 04:59:06'),
(38, 'App\\Models\\Hospital', 2, 'dbafb885-a225-4d53-9ba2-3e0a783f25fc', 'hospital', 'medBEA9', '1658830125.png', 'image/png', 'media', 'media', 75211, '[]', '{\"type\": \"image\", \"ratio\": \"1\", \"width\": 240, \"height\": 240, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-26 05:08:45', '2022-07-26 05:08:49'),
(39, 'App\\Models\\Team', 5, 'b41b44d5-8294-4026-97ea-649e9f9ab039', 'project', 'med4DD7', '1658831341.png', 'image/png', 'media', 'media', 48313, '[]', '{\"type\": \"image\", \"ratio\": \"1.182\", \"width\": 800, \"height\": 677, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-26 05:29:01', '2022-07-26 05:29:06'),
(40, 'App\\Models\\Project', 1, '7cc5eda7-6531-4835-b746-e678fd7121f9', 'project', 'medF5E5', '1658831581.png', 'image/png', 'media', 'media', 48313, '[]', '{\"type\": \"image\", \"ratio\": \"1.182\", \"width\": 800, \"height\": 677, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-26 05:33:01', '2022-07-26 05:33:54'),
(41, 'App\\Models\\News', 1, 'f51248c3-2a51-452c-a8b3-08496bef11ee', 'news', 'med6210', '1658906450.png', 'image/png', 'media', 'media', 933874, '[]', '{\"type\": \"image\", \"ratio\": \"0.8\", \"width\": 640, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-27 02:20:50', '2022-07-27 02:20:57'),
(42, 'App\\Models\\Gallary', 1, '19e370e7-d520-42b0-b38a-8059e33b8bda', 'gallary', 'medF586', '1658908716.png', 'image/png', 'media', 'media', 933874, '[]', '{\"type\": \"image\", \"ratio\": \"0.8\", \"width\": 640, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true, \"gallary\": true}', '[]', 1, '2022-07-27 02:58:36', '2022-07-27 02:58:41'),
(96, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 96, '552f9fe4-5566-482a-a12c-76b47ddbdd8e', 'gallary', 'med58A8', '1660271277.png', 'image/png', 'media', 'media', 560893, '[]', '{\"type\": \"image\", \"ratio\": \"1.501\", \"width\": 800, \"height\": 533, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 21:27:58', '2022-08-11 21:28:01'),
(44, 'App\\Models\\Slide', 8, 'fd382b50-7af9-4a5b-8dcf-e83e3e25ef40', 'slide', 'med3CC8', '1659330727.png', 'image/png', 'media', 'media', 149325, '[]', '{\"type\": \"image\", \"ratio\": \"2.028\", \"width\": 937, \"height\": 462, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-01 00:12:07', '2022-08-01 00:12:12'),
(45, 'App\\Models\\Slide', 1, 'bfc3f07a-ecbd-4e60-895a-09e530a7ab21', 'slide', 'medF40', '1659335303.png', 'image/png', 'media', 'media', 835589, '[]', '{\"type\": \"image\", \"ratio\": \"1.304\", \"width\": 1038, \"height\": 796, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-01 01:28:23', '2022-08-01 01:28:28'),
(46, 'App\\Models\\Slide', 2, 'c0f9e36f-f3f3-4e1b-bf38-0ef449c952e7', 'slide', 'medD7AA', '1659408034.png', 'image/png', 'media', 'media', 1307362, '[]', '{\"type\": \"image\", \"ratio\": \"1.78\", \"width\": 1200, \"height\": 674, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-01 21:40:34', '2022-08-01 21:44:11'),
(47, 'App\\Models\\Slide', 3, '9a58c618-4b94-428f-9c82-ffe05cbda702', 'slide', 'medABE1', '1659408809.png', 'image/png', 'media', 'media', 1443436, '[]', '{\"type\": \"image\", \"ratio\": \"1.6\", \"width\": 1200, \"height\": 750, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-01 21:53:29', '2022-08-01 21:54:08'),
(48, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 48, '2003a709-f1a9-4243-99e6-c11d51ecb65d', 'icon', 'medCF7B', '1659410981.png', 'image/png', 'media', 'media', 1303, '[]', '{\"type\": \"image\", \"ratio\": \"0.909\", \"width\": 30, \"height\": 33, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-01 22:29:41', '2022-08-01 22:29:43'),
(49, 'App\\Models\\News', 3, 'ccfea442-ebac-4b54-8053-92c93d8eab26', 'news', 'med20D', '1659438579.png', 'image/png', 'media', 'media', 165127, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-02 06:09:40', '2022-08-02 06:09:45'),
(50, 'App\\Models\\News', 4, 'be2eb105-3baa-4def-b4ef-71452b7a876e', 'news', 'medC542', '1659438629.png', 'image/png', 'media', 'media', 437493, '[]', '{\"type\": \"image\", \"ratio\": \"0.846\", \"width\": 427, \"height\": 505, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-02 06:10:29', '2022-08-02 06:10:33'),
(51, 'App\\Models\\News', 5, 'ffb4e658-8139-4360-97c9-cda168929878', 'news', 'med9B54', '1659438684.png', 'image/png', 'media', 'media', 153734, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-02 06:11:24', '2022-08-02 06:11:30'),
(56, 'App\\Models\\Setting', 1, '2515d7e0-8408-4acf-ac6e-d35c0cf44cd2', 'header_logo', 'med1CEB', '1659515394.png', 'image/png', 'media', 'media', 37335, '[]', '{\"type\": \"image\", \"ratio\": \"3.806\", \"width\": 685, \"height\": 180, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true, \"resize\": true}', '[]', 1, '2022-08-03 03:29:54', '2022-08-03 03:30:03'),
(57, 'App\\Models\\Setting', 1, '5e084514-6149-4466-ae8b-9377f250457f', 'footer_logo', 'med37C3', '1659515532.png', 'image/png', 'media', 'media', 26060, '[]', '{\"type\": \"image\", \"ratio\": \"0.975\", \"width\": 154, \"height\": 158, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true, \"resize\": true}', '[]', 1, '2022-08-03 03:32:12', '2022-08-03 03:32:19'),
(54, 'App\\Models\\Setting', 1, '6a5fa32e-81f9-4236-b58d-9d93682b2a0f', 'logo', 'med54FC', '1659509707.png', 'image/png', 'media', 'media', 26060, '[]', '{\"type\": \"image\", \"ratio\": \"0.975\", \"width\": 154, \"height\": 158, \"status\": \"processing\", \"progress\": 100}', '{\"30x23\": true, \"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-03 01:55:07', '2022-08-03 01:55:18'),
(60, 'App\\Models\\Page', 1, 'ecdcc731-89ae-41ef-b13e-b25b66700ff9', 'banner', 'med4346', '1659595071.png', 'image/png', 'media', 'media', 437493, '[]', '{\"type\": \"image\", \"ratio\": \"0.846\", \"width\": 427, \"height\": 505, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-04 01:37:52', '2022-08-04 01:40:12'),
(59, 'App\\Models\\Team', 6, '3fb7fb4d-44cb-4e1f-974d-53f9b0569370', 'team', 'med1055', '1659523423.png', 'image/png', 'media', 'media', 57188, '[]', '{\"type\": \"image\", \"ratio\": \"0.834\", \"width\": 171, \"height\": 205, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-03 05:43:43', '2022-08-03 05:43:47'),
(64, 'App\\Models\\Page', 2, 'ea9bffce-1526-4641-8b25-338b74a529aa', 'banner', 'med5486', '1659606151.png', 'image/png', 'media', 'media', 1443436, '[]', '{\"type\": \"image\", \"ratio\": \"1.6\", \"width\": 1200, \"height\": 750, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-04 04:42:32', '2022-08-04 04:43:45'),
(63, 'App\\Models\\Setting', 1, '0fa6cd16-da1e-4369-8a4b-996378131565', 'inner_page_logo', 'med98F6', '1659599419.png', 'image/png', 'media', 'media', 57634, '[]', '{\"type\": \"image\", \"ratio\": \"3.806\", \"width\": 685, \"height\": 180, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true, \"resize\": true}', '[]', 1, '2022-08-04 02:50:19', '2022-08-04 02:50:26'),
(65, 'App\\Models\\Page', 3, '2f542e13-1bdd-461c-b893-2bf6d1502f04', 'banner', 'medD53D', '1659679519.png', 'image/png', 'media', 'media', 1229376, '[]', '{\"type\": \"image\", \"ratio\": \"1.5\", \"width\": 1200, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-05 01:05:19', '2022-08-05 01:05:23'),
(66, 'App\\Models\\Page', 2, 'febe2e71-7eb9-4df6-a089-ea1201291ebf', 'page', 'medD697', '1659695510.png', 'image/png', 'media', 'media', 308403, '[]', '{\"type\": \"image\", \"ratio\": \"0.902\", \"width\": 396, \"height\": 439, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-05 05:31:50', '2022-08-05 05:31:55'),
(67, 'App\\Models\\Project', 4, 'bfd4bedd-68e3-4f51-8772-abe319a652bd', 'project', 'med6DA2', '1659695680.png', 'image/png', 'media', 'media', 335764, '[]', '{\"type\": \"image\", \"ratio\": \"0.666\", \"width\": 533, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-05 05:34:40', '2022-08-05 05:35:20'),
(68, 'App\\Models\\Project', 4, 'd2b001a0-5b8d-408d-ab4e-7949dba7d04e', 'icon', 'medF9F9', '1659695716.png', 'image/png', 'media', 'media', 1303, '[]', '{\"type\": \"image\", \"ratio\": \"0.909\", \"width\": 30, \"height\": 33, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-05 05:35:16', '2022-08-05 05:35:20'),
(72, 'App\\Models\\Page', 4, '6f2bc65f-5a97-4a82-845e-5d844619073a', 'banner', 'med5FCA', '1660037185.png', 'image/png', 'media', 'media', 1269203, '[]', '{\"type\": \"image\", \"ratio\": \"1.504\", \"width\": 1200, \"height\": 798, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-09 04:26:25', '2022-08-09 04:26:30'),
(71, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 71, 'b4c21467-23fa-44c7-8800-865edaeca66c', 'banner', 'medA7FE', '1660037138.png', 'image/png', 'media', 'media', 1269203, '[]', '{\"type\": \"image\", \"ratio\": \"1.504\", \"width\": 1200, \"height\": 798, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-09 04:25:38', '2022-08-09 04:25:40'),
(73, 'App\\Models\\Project', 2, 'a1145a1d-27f4-49df-8b16-ad438992ed1d', 'project', 'med2BD6', '1660046281.png', 'image/png', 'media', 'media', 335764, '[]', '{\"type\": \"image\", \"ratio\": \"0.666\", \"width\": 533, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-09 06:58:02', '2022-08-09 06:58:10'),
(74, 'App\\Models\\Project', 3, '25411e0a-98ea-49cf-aafd-a292591ca9dd', 'project', 'med95EF', '1660046308.png', 'image/png', 'media', 'media', 335764, '[]', '{\"type\": \"image\", \"ratio\": \"0.666\", \"width\": 533, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-09 06:58:28', '2022-08-09 06:58:34'),
(75, 'App\\Models\\Project', 5, '9218baa4-63cd-4946-bb45-13c5bd41097c', 'project', 'medDFFD', '1660046327.png', 'image/png', 'media', 'media', 335764, '[]', '{\"type\": \"image\", \"ratio\": \"0.666\", \"width\": 533, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-09 06:58:47', '2022-08-09 06:58:51'),
(108, 'App\\Models\\Project', 6, '1f0a40b6-c564-4c5b-a813-83019e174f0b', 'project', 'med3CC5', '1660271860.png', 'image/png', 'media', 'media', 308403, '[]', '{\"type\": \"image\", \"ratio\": \"0.902\", \"width\": 396, \"height\": 439, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 21:37:40', '2022-08-11 21:37:44'),
(77, 'App\\Models\\Project', 7, '3b111e51-ec3d-431b-81af-a71251c727c3', 'project', 'medD880', '1660046391.png', 'image/png', 'media', 'media', 335764, '[]', '{\"type\": \"image\", \"ratio\": \"0.666\", \"width\": 533, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-09 06:59:51', '2022-08-09 07:00:01'),
(78, 'App\\Models\\Achievement', 1, '087e248e-c273-416e-b601-f3cbd22df265', 'achievement', 'medDA01', '1660049995.png', 'image/png', 'media', 'media', 153734, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-09 07:59:55', '2022-08-09 08:00:01'),
(79, 'App\\Models\\Achievement', 2, '7479e5d9-f087-42c0-882c-ccd0852f6bb8', 'achievement', 'med2717', '1660050081.png', 'image/png', 'media', 'media', 437493, '[]', '{\"type\": \"image\", \"ratio\": \"0.846\", \"width\": 427, \"height\": 505, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-09 08:01:21', '2022-08-09 08:01:26'),
(80, 'App\\Models\\Achievement', 3, '94570e24-6f72-47ac-8311-bfe50dff6aa9', 'achievement', 'medA083', '1660050112.png', 'image/png', 'media', 'media', 308403, '[]', '{\"type\": \"image\", \"ratio\": \"0.902\", \"width\": 396, \"height\": 439, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-09 08:01:52', '2022-08-09 08:01:56'),
(82, 'App\\Models\\Page', 5, '9096ac6d-c9a8-4cd6-8468-7d2687874f08', 'banner', 'medAAF6', '1660113684.png', 'image/png', 'media', 'media', 308403, '[]', '{\"type\": \"image\", \"ratio\": \"0.902\", \"width\": 396, \"height\": 439, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-10 01:41:24', '2022-08-10 01:41:32'),
(83, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 83, 'abdfaa10-1a15-4a71-aaf2-7cf14b79d4ec', 'banner', 'med2A17', '1660115749.png', 'image/png', 'media', 'media', 1269203, '[]', '{\"type\": \"image\", \"ratio\": \"1.504\", \"width\": 1200, \"height\": 798, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-10 02:15:49', '2022-08-10 02:15:51'),
(84, 'App\\Models\\Page', 6, 'e100d503-edd9-48a2-83ba-b6ba41229025', 'banner', 'med80D8', '1660115967.png', 'image/png', 'media', 'media', 1269203, '[]', '{\"type\": \"image\", \"ratio\": \"1.504\", \"width\": 1200, \"height\": 798, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-10 02:19:27', '2022-08-10 02:21:00'),
(85, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 85, 'ec72a440-1b63-405c-b320-6f1422eecff3', 'hospital', 'med71D6', '1660117733.png', 'image/png', 'media', 'media', 206019, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-10 02:48:53', '2022-08-10 02:48:55'),
(86, 'App\\Models\\Hospital', 7, '45bca256-7874-47fc-8575-c5b22b2cd180', 'hospital', 'med9373', '1660117873.png', 'image/png', 'media', 'media', 206019, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-10 02:51:13', '2022-08-10 02:51:53'),
(87, 'App\\Models\\Page', 7, '00edff6f-422e-4af9-bf09-652b2b571c7b', 'banner', 'med672D', '1660145190.png', 'image/png', 'media', 'media', 1307362, '[]', '{\"type\": \"image\", \"ratio\": \"1.78\", \"width\": 1200, \"height\": 674, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-10 10:26:30', '2022-08-10 10:26:37'),
(88, 'App\\Models\\Page', 8, '1928aff7-fc38-433c-a260-a361a0ecc05d', 'banner', 'med631F', '1660194865.png', 'image/png', 'media', 'media', 1122076, '[]', '{\"type\": \"image\", \"ratio\": \"1.5\", \"width\": 1200, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 00:14:25', '2022-08-11 00:14:29'),
(89, 'App\\Models\\Page', 9, 'a73d00ff-5c0a-485c-af1d-a97fa9ef3ea4', 'banner', 'med3505', '1660196295.png', 'image/png', 'media', 'media', 1443436, '[]', '{\"type\": \"image\", \"ratio\": \"1.6\", \"width\": 1200, \"height\": 750, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 00:38:15', '2022-08-11 00:38:19'),
(90, 'App\\Models\\Page', 10, 'fc8f0cee-e1b5-4e6d-aa54-55ead91acca7', 'banner', 'medB3EF', '1660196524.png', 'image/png', 'media', 'media', 1443436, '[]', '{\"type\": \"image\", \"ratio\": \"1.6\", \"width\": 1200, \"height\": 750, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 00:42:04', '2022-08-11 00:42:11'),
(91, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 91, '81d01f6d-2bae-4917-873a-155d13fa9ffd', 'banner', 'med30B7', '1660198260.png', 'image/png', 'media', 'media', 1443436, '[]', '{\"type\": \"image\", \"ratio\": \"1.6\", \"width\": 1200, \"height\": 750, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 01:11:00', '2022-08-11 01:11:03'),
(92, 'App\\Models\\Page', 11, '9fdbc85f-85f9-4613-b857-51eb27ea5e25', 'banner', 'medD729', '1660198368.png', 'image/png', 'media', 'media', 1443436, '[]', '{\"type\": \"image\", \"ratio\": \"1.6\", \"width\": 1200, \"height\": 750, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 01:12:48', '2022-08-11 01:12:52'),
(93, 'App\\Models\\Download', 4, '9b6d9e7b-82a9-47da-ae50-d73db9fdd5f3', 'download', 'Try file', 'try-file.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'media', 'media', 30041, '[]', '{\"type\": \"document\", \"status\": \"processing\", \"progress\": 100}', '[]', '[]', 1, '2022-08-11 04:56:58', '2022-08-11 04:57:01'),
(94, 'App\\Models\\Page', 12, '63567e33-103a-4975-a22f-c1ee40eb6156', 'banner', 'medA20', '1660212340.png', 'image/png', 'media', 'media', 165127, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 05:05:40', '2022-08-11 05:05:45'),
(95, 'App\\Models\\Page', 13, '9380f24e-6946-4825-8bdf-3c3c5d30ade4', 'banner', 'medB3DF', '1660216316.png', 'image/png', 'media', 'media', 1229376, '[]', '{\"type\": \"image\", \"ratio\": \"1.5\", \"width\": 1200, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 06:11:56', '2022-08-11 06:12:00'),
(97, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 97, '67913d99-2b8e-42fc-8f2f-bc5fa9f6945c', 'gallary', 'med6DAC', '1660271283.png', 'image/png', 'media', 'media', 165127, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 21:28:03', '2022-08-11 21:28:05'),
(98, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 98, '44b8761d-0bef-43d3-a478-c924d1a170f5', 'gallary', 'med7BBB', '1660271286.png', 'image/png', 'media', 'media', 153734, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 21:28:06', '2022-08-11 21:28:09'),
(99, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 99, '5f2232f1-0f76-4b0f-9bfa-0e299c6ede40', 'gallary', 'med898B', '1660271290.png', 'image/png', 'media', 'media', 616992, '[]', '{\"type\": \"image\", \"ratio\": \"1.501\", \"width\": 800, \"height\": 533, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 21:28:10', '2022-08-11 21:28:12'),
(100, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 100, '28745907-0de0-4813-8c9d-37542bc72126', 'gallary', 'med9817', '1660271294.png', 'image/png', 'media', 'media', 679069, '[]', '{\"type\": \"image\", \"ratio\": \"1.6\", \"width\": 800, \"height\": 500, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 21:28:14', '2022-08-11 21:28:16'),
(101, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 101, 'be301165-cab8-4415-862d-601514dbba17', 'gallary', 'med4832', '1660271339.png', 'image/png', 'media', 'media', 616992, '[]', '{\"type\": \"image\", \"ratio\": \"1.501\", \"width\": 800, \"height\": 533, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 21:28:59', '2022-08-11 21:29:01'),
(102, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 102, '9728aef2-e95d-4352-84e8-b12a9cef250e', 'gallary', 'med7994', '1660271613.png', 'image/png', 'media', 'media', 165127, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 21:33:33', '2022-08-11 21:33:36'),
(103, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 103, '896bc475-55ae-4662-9af4-806679b964f2', 'gallary', 'med8745', '1660271617.png', 'image/png', 'media', 'media', 153734, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 21:33:37', '2022-08-11 21:33:39'),
(104, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 104, 'a8f364a1-2e7f-48c9-be8a-f28261686780', 'gallary', 'med9564', '1660271621.png', 'image/png', 'media', 'media', 616992, '[]', '{\"type\": \"image\", \"ratio\": \"1.501\", \"width\": 800, \"height\": 533, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 21:33:41', '2022-08-11 21:33:43'),
(105, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 105, '3da6bd1a-6343-401d-bdf3-7cb3ecc00003', 'gallary', 'medA40F', '1660271624.png', 'image/png', 'media', 'media', 679069, '[]', '{\"type\": \"image\", \"ratio\": \"1.6\", \"width\": 800, \"height\": 500, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 21:33:44', '2022-08-11 21:33:47'),
(106, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 106, '42ab9d22-b9ae-4dc5-80fa-53765a23abee', 'gallary', 'medDBA5', '1660271770.png', 'image/png', 'media', 'media', 616992, '[]', '{\"type\": \"image\", \"ratio\": \"1.501\", \"width\": 800, \"height\": 533, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 21:36:10', '2022-08-11 21:36:12'),
(107, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 107, 'da7c2870-9f15-4027-bfe3-e06934660999', 'gallary', 'med875B', '1660271814.png', 'image/png', 'media', 'media', 643529, '[]', '{\"type\": \"image\", \"ratio\": \"1.782\", \"width\": 800, \"height\": 449, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 21:36:54', '2022-08-11 21:36:56'),
(109, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 109, '86d4cd5e-a85a-40cd-95c1-363a6de64e5b', 'gallary', 'med8A6', '1660271912.png', 'image/png', 'media', 'media', 55444, '[]', '{\"type\": \"image\", \"ratio\": \"0.829\", \"width\": 170, \"height\": 205, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 21:38:32', '2022-08-11 21:38:34'),
(113, 'App\\Models\\Gallary', 3, '3bd90830-48e3-4293-8660-b84b00cc0bb4', 'gallary', 'med1EC7', '1660272311.png', 'image/png', 'media', 'media', 165127, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true, \"gallary\": true}', '[]', 1, '2022-08-11 21:45:11', '2022-08-11 21:45:30'),
(111, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 111, '7e52d203-dcf6-4489-8a02-0533aa46cc16', 'gallary', 'medC2D', '1660272110.png', 'image/png', 'media', 'media', 643529, '[]', '{\"type\": \"image\", \"ratio\": \"1.782\", \"width\": 800, \"height\": 449, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 21:41:50', '2022-08-11 21:41:52'),
(114, 'App\\Models\\Gallary', 3, '7f463638-8d5b-4060-bd70-27d104e82159', 'gallary', 'med2C88', '1660272315.png', 'image/png', 'media', 'media', 206019, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true, \"gallary\": true}', '[]', 1, '2022-08-11 21:45:15', '2022-08-11 21:45:30'),
(115, 'App\\Models\\Gallary', 3, '0423adb3-404a-4cdb-a7dc-63ef78a1eb55', 'gallary', 'med3AD5', '1660272318.png', 'image/png', 'media', 'media', 153734, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true, \"gallary\": true}', '[]', 1, '2022-08-11 21:45:18', '2022-08-11 21:45:30'),
(116, 'App\\Models\\Gallary', 3, '737bac2c-f63f-4ab4-8f4a-2d45ddd4f93b', 'gallary', 'med4B55', '1660272322.png', 'image/png', 'media', 'media', 679069, '[]', '{\"type\": \"image\", \"ratio\": \"1.6\", \"width\": 800, \"height\": 500, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true, \"gallary\": true}', '[]', 1, '2022-08-11 21:45:22', '2022-08-11 21:45:31'),
(117, 'App\\Models\\Page', 14, 'b81a412e-0811-49db-bf60-7c3bb7251dc8', 'banner', 'medCE3A', '1660272356.png', 'image/png', 'media', 'media', 1229376, '[]', '{\"type\": \"image\", \"ratio\": \"1.5\", \"width\": 1200, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 21:45:56', '2022-08-11 21:46:00'),
(118, 'App\\Models\\Page', 15, '87d475f5-9551-4dca-98ad-a592a9688c27', 'banner', 'medFAAC', '1660288686.png', 'image/png', 'media', 'media', 1229376, '[]', '{\"type\": \"image\", \"ratio\": \"1.5\", \"width\": 1200, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-12 07:18:06', '2022-08-12 07:18:13'),
(123, 'App\\Models\\Team', 7, '7789540b-c9d4-498a-8c03-761f5b7a5ed8', 'team', 'med2928', '1660453684.png', 'image/png', 'media', 'media', 80028, '[]', '{\"type\": \"image\", \"ratio\": \"0.831\", \"width\": 182, \"height\": 219, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true, \"resize\": true}', '[]', 1, '2022-08-14 05:08:04', '2022-08-14 05:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'user', '2022-07-06 20:56:31', '2022-07-06 20:56:31'),
(2, 'role', '2022-07-06 20:56:31', '2022-07-06 20:56:31'),
(3, 'setting', '2022-07-06 20:56:31', '2022-07-06 20:56:31'),
(4, 'slide', '2022-07-06 20:56:31', '2022-07-06 20:56:31'),
(5, 'Notification', '2022-07-06 20:56:31', '2022-07-06 20:56:31'),
(6, 'Download', '2022-07-06 20:56:31', '2022-07-06 20:56:31'),
(7, 'Team', '2022-07-06 20:56:31', '2022-07-06 20:56:31'),
(8, 'Project', '2022-07-06 20:56:31', '2022-07-06 20:56:31'),
(9, 'Alert', '2022-07-06 20:56:31', '2022-07-06 20:56:31'),
(10, 'Hospital', '2022-07-06 20:56:31', '2022-07-06 20:56:31'),
(11, 'news', '2022-07-27 01:51:08', '2022-07-27 01:51:08'),
(12, 'gallary', '2022-07-27 02:45:35', '2022-07-27 02:45:35'),
(13, 'link', '2022-08-03 00:50:44', '2022-08-03 00:50:44'),
(14, 'page', '2022-08-04 00:50:02', '2022-08-04 00:50:02'),
(15, 'category', '2022-08-04 23:58:48', '2022-08-04 23:58:48'),
(16, 'achievement', '2022-08-09 07:11:32', '2022-08-09 07:11:32'),
(17, 'Contact-Us-Form', '2022-08-14 05:29:47', '2022-08-14 05:29:47');

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
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_07_06_045742_create_permission_tables', 2),
(5, '2022_01_17_121437_create_menus_table', 3),
(6, '2022_01_17_122356_add_menu_id_to_users_table', 4),
(7, '2022_07_13_030105_create_settings_table', 5),
(11, '2022_07_18_060348_create_media_table', 8),
(9, '2022_07_13_060304_add_status_to_settings', 6),
(10, '2022_07_14_043913_add_contentsidebar_class_to_settings', 7),
(12, '2020_06_03_131044_create_temporary_files_table', 9),
(15, '2022_07_19_054509_create_notifications_table', 11),
(16, '2022_07_20_024916_create_downloads_table', 12),
(17, '2022_07_20_025014_create_teams_table', 13),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 14),
(19, '2022_07_25_084735_create_alerts_table', 14),
(20, '2022_07_25_090807_create_hospitals_table', 14),
(21, '2022_07_25_091149_create_projects_table', 14),
(22, '2022_07_26_101537_add_status_to_projects', 15),
(23, '2022_07_26_101629_add_status_to_hospitals', 15),
(24, '2022_07_26_110225_add_status_to_alerts', 16),
(25, '2022_07_27_064820_create_news_table', 17),
(26, '2022_07_25_073541_create_gallaries_table', 18),
(31, '2022_08_01_044703_add_ur_title_to_slides', 19),
(30, '2022_07_18_084437_create_slides_table', 19),
(32, '2022_08_02_002639_add_status_to_slides', 20),
(48, '2022_08_03_052044_create_links_table', 29),
(34, '2022_08_03_053418_add_address_to_settings', 21),
(35, '2022_08_03_111542_add_slug_to_news', 19),
(36, '2022_08_03_111542_add_slug_to_news', 19),
(37, '2022_08_03_111647_add_slug_to_projects', 22),
(38, '2022_08_03_111737_create_newstypes_table', 22),
(39, '2022_08_03_111928_create_teamtypes_table', 22),
(40, '2022_08_04_054202_create_pages_table', 23),
(41, '2022_08_04_061822_add_loadwithlink_to_pages', 24),
(42, '2022_08_05_042609_create_categories_table', 25),
(43, '2022_08_05_055231_add_category_id_to_news', 26),
(45, '2022_08_05_064318_add_banner_title_to_pages', 27),
(46, '2022_08_09_120945_create_achievements_table', 28),
(47, '2022_08_10_073022_add_category_id_to_hospitals', 28),
(49, '2022_08_10_150529_add_slug_to_categories', 28),
(50, '2022_08_11_044153_add_districts_id_to_hospitals', 30),
(51, '2022_08_11_095047_add_category_id_to_downloads', 31),
(54, '2022_08_12_045840_create_weather_table', 32),
(55, '2022_08_12_122440_add_client_name_to_projects', 33),
(57, '2022_08_14_103715_create_contacts_table', 34);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `link`, `short_description`, `status`, `description`, `deleted_at`, `created_at`, `updated_at`, `slug`, `category_id`) VALUES
(3, 'Final Comparative Report For Covid1-9 Response Items', NULL, 'Final comparative report for covid19 response items', 1, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.</p><p>And a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><ul><li>Nullam at erat quis eros finibus aliquam.</li><li>Cras nec risus lobortis, auctor ipsum quis, vulputate purus.</li><li>Morbi id tellus non arcu pulvinar gravida.</li><li>Nulla bibendum odio non felis pulvinar interdum.</li><li>Aliquam condimentum mauris et velit tempus dictum.</li><li>Curabitur non libero eu lectus facilisis aliquet ac maximus justo.</li></ul><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', NULL, '2022-08-02 06:09:45', '2022-08-09 06:33:40', 'final-comparative-report-for-covid19-response-items2', 2),
(4, 'Final comparative report for covid19 response items', NULL, 'Final comparative report for covid19 response items', 1, '<p>&nbsp;Final comparative report for covid19 response items&nbsp;&nbsp;&nbsp;</p>', NULL, '2022-08-02 06:10:33', '2022-08-05 01:03:27', 'final-comparative-report-for-covid19-response-items', 2),
(5, 'Final Comparative Report For Covid1-9 Response Items', NULL, 'Final Comparative Report For Covid1-9 Response Items', 1, '<p>Final Comparative Report For Covid1-9 Response Items</p>', NULL, '2022-08-02 06:11:30', '2022-08-05 01:03:34', 'final-comparative-report-for-covid19-response-items3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `newstypes`
--

DROP TABLE IF EXISTS `newstypes`;
CREATE TABLE IF NOT EXISTS `newstypes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `status`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Test', 1, '<p>Test</p>', '2022-07-19 01:05:05', '2022-07-19 01:03:59', '2022-07-19 01:05:05'),
(2, 'Testing Notification', 1, '<p>Testing Notification</p>', NULL, '2022-07-19 01:09:12', '2022-07-19 01:09:12'),
(3, 'KPBIT UPDATE', 0, '<p>KPBIT UPDATE</p>', NULL, '2022-07-19 01:09:33', '2022-07-19 01:09:33'),
(4, NULL, 0, NULL, '2022-08-12 09:29:12', '2022-08-12 09:29:07', '2022-08-12 09:29:12'),
(5, NULL, 0, NULL, '2022-08-12 09:29:21', '2022-08-12 09:29:17', '2022-08-12 09:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `deletable` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `loadwithlink` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_caption` text COLLATE utf8mb4_unicode_ci,
  `banner_title` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`),
  UNIQUE KEY `pages_loadwithlink_unique` (`loadwithlink`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `deletable`, `deleted_at`, `created_at`, `updated_at`, `loadwithlink`, `slogan`, `image_caption`, `banner_title`) VALUES
(1, 'Health Department-KP is a public entity; guiding health policies.', 'health-department-kp-is-a-public-entity-guiding-health-policies', '<p class=\"ql-align-justify\"><span style=\"color: rgb(105, 107, 126);\">Health Department-KP is a public entity; guiding health policies, governing healthcare institutions and leading healthcare interventions in Khyber Pakhtunkhwa. Towards decentralization and digitalization, it aims to provide healthcare at your doorstep. Devolved into healthcare education and service provision, the department; ensure and realizes supply and demand equilibrium, channelizing healthcare knowledge attitudes and practices on modern scientific patterns, however, synchronising learned techniques with beliefs, local values and norms.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(105, 107, 126);\">Statistically prioritised interventions; concentrating epidemics, outbreaks, mutations and precautions; being learnt, advised, intervened, supervised and data-banked for future referrals.</span></p><p class=\"ql-align-justify\"><span style=\"color: rgb(105, 107, 126);\">Striving towards access, affordability and appraisal; synergic initiatives being initiated; complementing all the stakeholders, uplifting healthcare infrastructure, promoting public welfare.</span></p>', 0, NULL, '2022-08-04 01:40:12', '2022-08-04 23:21:46', 'index', 'Welcome to Health Department, Govt of KhyberPakhtunkhwa', 'Striving towards access, affordability and appraisal; synergic initiatives being initiated; complementing all the stakeholders, uplifting healthcare infrastructure, promoting public welfare.', NULL),
(2, 'To make sure citizens Receive the quality of life', 'to-make-sure-citizens-receive-the-quality-of-life', '<p>Health Department-KP is a public entity; guiding health policies, governing healthcare institutions and leading healthcare interventions in Khyber Pakhtunkhwa. Towards decentralization and digitalization, it aims to provide healthcare at your doorstep. Devolved into healthcare education and service provision, the department; ensure and realizes supply and demand equilibrium, channelizing healthcare knowledge attitudes and practices on modern scientific patterns, however, synchronizing learned techniques with beliefs, local values and norms.</p><p>Statistically prioritized interventions; concentrating epidemics, outbreaks, mutations and precautions; being learnt, advised, intervened, supervised and data-banked for future referrals.</p>', 0, NULL, '2022-08-04 02:18:27', '2022-08-05 05:31:55', 'projects', 'Health Department KP is continuously working with stakeholders', NULL, 'Projects'),
(3, 'News', 'news', NULL, 0, NULL, '2022-08-05 01:04:48', '2022-08-05 01:52:36', 'News', 'news', NULL, 'News'),
(4, 'newsDetails', 'newsdetails', NULL, 0, NULL, '2022-08-09 04:26:30', '2022-08-09 04:26:30', 'newsDetails', 'newsDetails', NULL, 'News'),
(5, 'ProjectDetails', 'projectdetails', NULL, 0, NULL, '2022-08-10 01:41:32', '2022-08-10 01:41:32', 'ProjectDetails', 'ProjectDetails', NULL, 'ProjectDetails'),
(6, 'Achievement', 'achievement', NULL, 0, NULL, '2022-08-10 02:21:00', '2022-08-10 02:21:00', 'Achievement', NULL, NULL, 'Achievement'),
(7, 'Hospitals', 'hospitals', NULL, 0, NULL, '2022-08-10 10:26:37', '2022-08-10 10:26:37', 'Hospitals', 'Hospitals', NULL, 'Hospitals'),
(8, 'About Us', 'about-us', '<p class=\"ql-align-justify\">The Department of Health will reorganize the Health Sector services in Khyber Pakhtunkhwa Province with clear distinction between regulation, monitoring and provision of health services in order to achieve the optimum benefit within the available resources for the people of Khyber Pakhtunkhwa Province. The government’s role as a guardian for the health of the citizens of Khyber Pakhtunkhwa Province is to regulate according to international standards the quality of health care services and health care providers and medical training institutions</p><p class=\"ql-align-justify\">&nbsp;</p><p class=\"ql-align-justify\">The mission of this Department is to protect and improve the health and environment for all people in kpk</p><p><br></p>', 0, NULL, '2022-08-11 00:14:29', '2022-08-11 00:14:29', 'ABOUT US', 'ABOUT US', NULL, 'About Us'),
(9, 'OUR VISION', 'our-vision', '<p><span style=\"color: rgb(49, 49, 49);\">The Department of Health will reorganize the Health Sector in Khyber Pakhtunkhwa Province with clear distinction among regulation, financing and provision of health services in order to achieve the optimum benefit within the available resources for the people of Khyber Pakhtunkhwa Province. The government’s role as a guardian for the health of the citizens of Khyber Pakhtunkhwa Province is to regulate the quality of health care services, health care providers and medical training institutions according to international standards.</span></p>', 0, NULL, '2022-08-11 00:36:25', '2022-08-11 00:38:19', 'OUR VISION', 'OUR VISION', NULL, 'Our Vision'),
(10, 'Our Mission', 'our-mission', '<p><span style=\"color: rgb(49, 49, 49);\">The mission of the Health Department, Government of Khyber Pakhtunkhwa is to protect the Health of all citizens in the Province</span></p>', 0, NULL, '2022-08-11 00:42:11', '2022-08-11 00:42:11', 'Our Mission', NULL, NULL, 'Our Mission'),
(11, 'LAWS & RULES', 'laws-rules', '<p><strong>What is a coronavirus?</strong></p><p><span style=\"color: rgb(60, 66, 69);\">Coronaviruses are a large family of viruses which may cause illness in animals or humans.&nbsp;In humans, several coronaviruses are known to cause respiratory infections ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS) and Severe Acute Respiratory Syndrome (SARS). The most recently discovered coronavirus causes coronavirus disease COVID-19.</span></p><p><br></p>', 0, NULL, '2022-08-11 01:12:52', '2022-08-11 01:16:17', 'LAWS & RULES', NULL, NULL, 'LAWS & RULES'),
(12, 'Download', 'download', NULL, 0, NULL, '2022-08-11 05:05:45', '2022-08-11 05:05:45', 'Download', NULL, NULL, 'Download'),
(13, 'Team', 'team', NULL, 0, NULL, '2022-08-11 06:12:00', '2022-08-11 06:12:00', 'Team', NULL, NULL, 'Team'),
(14, 'Gallery', 'gallery', NULL, 0, NULL, '2022-08-11 21:46:00', '2022-08-11 21:46:00', 'Gallery', NULL, NULL, 'Gallery'),
(15, 'Contact Us', 'contact-us', NULL, 0, NULL, '2022-08-12 07:18:13', '2022-08-12 07:19:00', 'contact Us', NULL, NULL, 'Contact Us'),
(16, 'test', 'test', NULL, 1, '2022-08-12 08:54:21', '2022-08-12 08:54:16', '2022-08-12 08:54:21', 'test', NULL, NULL, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`),
  KEY `permissions_menu_id_foreign` (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `menu_id`) VALUES
(1, 'role-list', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 2),
(2, 'role-create', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 2),
(3, 'role-edit', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 2),
(4, 'role-delete', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 2),
(5, 'user-list', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 1),
(6, 'user-create', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 1),
(7, 'user-edit', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 1),
(8, 'user-delete', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 1),
(9, 'setting-list', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 3),
(10, 'setting-create', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 3),
(11, 'setting-edit', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 3),
(12, 'setting-delete', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 3),
(13, 'slide-list', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 4),
(14, 'slide-create', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 4),
(15, 'slide-edit', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 4),
(16, 'slide-delete', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 4),
(17, 'notification-list', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 5),
(18, 'notification-create', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 5),
(19, 'notification-edit', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 5),
(20, 'notification-delete', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 5),
(21, 'download-list', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 6),
(22, 'download-create', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 6),
(23, 'download-edit', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 6),
(24, 'download-delete', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 6),
(25, 'team-list', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 7),
(26, 'team-create', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 7),
(27, 'team-edit', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 7),
(28, 'team-delete', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 7),
(29, 'project-list', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 8),
(30, 'project-create', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 8),
(31, 'project-edit', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 8),
(32, 'project-delete', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 8),
(33, 'alert-list', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 9),
(34, 'alert-create', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 9),
(35, 'alert-edit', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 9),
(36, 'alert-delete', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 9),
(37, 'hospital-list', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 10),
(38, 'hospital-create', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 10),
(39, 'hospital-edit', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 10),
(40, 'hospital-delete', 'web', '2022-07-06 20:45:39', '2022-07-06 20:45:39', 10),
(41, 'news-list', 'web', '2022-07-27 01:51:08', '2022-07-27 01:51:08', 11),
(42, 'news-create', 'web', '2022-07-27 01:51:08', '2022-07-27 01:51:08', 11),
(43, 'news-edit', 'web', '2022-07-27 01:51:08', '2022-07-27 01:51:08', 11),
(44, 'news-delete', 'web', '2022-07-27 01:51:08', '2022-07-27 01:51:08', 11),
(45, 'gallary-list', 'web', '2022-07-27 02:45:35', '2022-07-27 02:45:35', 12),
(46, 'gallary-create', 'web', '2022-07-27 02:45:35', '2022-07-27 02:45:35', 12),
(47, 'gallary-edit', 'web', '2022-07-27 02:45:35', '2022-07-27 02:45:35', 12),
(48, 'gallary-delete', 'web', '2022-07-27 02:45:35', '2022-07-27 02:45:35', 12),
(49, 'link-list', 'web', '2022-08-03 00:50:44', '2022-08-03 00:50:44', 13),
(50, 'link-create', 'web', '2022-08-03 00:50:44', '2022-08-03 00:50:44', 13),
(51, 'link-edit', 'web', '2022-08-03 00:50:44', '2022-08-03 00:50:44', 13),
(52, 'link-delete', 'web', '2022-08-03 00:50:44', '2022-08-03 00:50:44', 13),
(53, 'page-list', 'web', '2022-08-04 00:50:02', '2022-08-04 00:50:02', 14),
(54, 'page-create', 'web', '2022-08-04 00:50:03', '2022-08-04 00:50:03', 14),
(55, 'page-edit', 'web', '2022-08-04 00:50:03', '2022-08-04 00:50:03', 14),
(56, 'page-delete', 'web', '2022-08-04 00:50:03', '2022-08-04 00:50:03', 14),
(57, 'category-list', 'web', '2022-08-04 23:58:48', '2022-08-04 23:58:48', 15),
(58, 'category-create', 'web', '2022-08-04 23:58:48', '2022-08-04 23:58:48', 15),
(59, 'category-edit', 'web', '2022-08-04 23:58:48', '2022-08-04 23:58:48', 15),
(60, 'category-delete', 'web', '2022-08-04 23:58:48', '2022-08-04 23:58:48', 15),
(61, 'achievement-list', 'web', '2022-08-09 07:11:32', '2022-08-09 07:11:32', 16),
(62, 'achievement-create', 'web', '2022-08-09 07:11:32', '2022-08-09 07:11:32', 16),
(63, 'achievement-edit', 'web', '2022-08-09 07:11:32', '2022-08-09 07:11:32', 16),
(64, 'achievement-delete', 'web', '2022-08-09 07:11:32', '2022-08-09 07:11:32', 16),
(65, 'contact-list', 'web', '2022-08-14 05:29:47', '2022-08-14 05:29:47', 17),
(66, 'contact-create', 'web', '2022-08-14 05:29:47', '2022-08-14 05:29:47', 17),
(67, 'contact-edit', 'web', '2022-08-14 05:29:47', '2022-08-14 05:29:47', 17),
(68, 'contact-delete', 'web', '2022-08-14 05:29:47', '2022-08-14 05:29:47', 17);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_company_name` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `client_comment` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `projects_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `link`, `description`, `deleted_at`, `created_at`, `updated_at`, `status`, `slug`, `client_name`, `client_company_name`, `start_date`, `end_date`, `client_comment`) VALUES
(4, 'Strengthening of Rehabilitation Services for Physically Disabled', NULL, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.</p><p>And a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><ul><li>Nullam at erat quis eros finibus aliquam.</li><li>Cras nec risus lobortis, auctor ipsum quis, vulputate purus.</li><li>Morbi id tellus non arcu pulvinar gravida.</li><li>Nulla bibendum odio non felis pulvinar interdum.</li><li>Aliquam condimentum mauris et velit tempus dictum.</li><li>Curabitur non libero eu lectus facilisis aliquet ac maximus justo.</li></ul><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', NULL, '2022-08-03 06:46:25', '2022-08-12 09:11:23', 1, 'strengthening-of-rehabilitation-services-for-physically-disabled', 'Imran Khan', 'KPTIB', '2022-06-07', '2022-08-19', NULL),
(2, 'Extension of D-Talk and Insulin for Life Program', NULL, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.</p><p>And a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><ul><li>Nullam at erat quis eros finibus aliquam.</li><li>Cras nec risus lobortis, auctor ipsum quis, vulputate purus.</li><li>Morbi id tellus non arcu pulvinar gravida.</li><li>Nulla bibendum odio non felis pulvinar interdum.</li><li>Aliquam condimentum mauris et velit tempus dictum.</li><li>Curabitur non libero eu lectus facilisis aliquet ac maximus justo.</li></ul><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', NULL, '2022-08-03 06:44:45', '2022-08-10 01:27:47', 1, 'extension-of-d-talk-and-insulin-for-life-program', NULL, NULL, NULL, NULL, NULL),
(3, 'Expanded Program on immunization', NULL, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.</p><p>And a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><ul><li>Nullam at erat quis eros finibus aliquam.</li><li>Cras nec risus lobortis, auctor ipsum quis, vulputate purus.</li><li>Morbi id tellus non arcu pulvinar gravida.</li><li>Nulla bibendum odio non felis pulvinar interdum.</li><li>Aliquam condimentum mauris et velit tempus dictum.</li><li>Curabitur non libero eu lectus facilisis aliquet ac maximus justo.</li></ul><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', NULL, '2022-08-03 06:45:15', '2022-08-10 01:28:00', 1, 'expanded-program-on-immunization', NULL, NULL, NULL, NULL, NULL),
(5, 'Extension of D-Talk and Insulin for Life Program', NULL, '<p>Extension of D-Talk and Insulin for Life Program</p>', NULL, '2022-08-03 06:47:01', '2022-08-09 06:58:51', 1, 'extension-of-d-talk-and-insulin-for-life-program-2', NULL, NULL, NULL, NULL, NULL),
(6, 'Expanded Program on immunization', NULL, '<p>Expanded Program on immunization</p>', NULL, '2022-08-09 06:59:17', '2022-08-11 21:37:44', 1, 'expanded-program-on-immunization-2', NULL, NULL, NULL, NULL, NULL),
(7, 'Expanded Program on immunization', NULL, '<p>Expanded Program on immunization</p>', NULL, '2022-08-09 07:00:01', '2022-08-09 07:00:01', 1, 'expanded-program-on-immunization-3', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2022-08-14 05:20:10', '2022-08-14 05:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 3),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 2),
(8, 3),
(9, 1),
(9, 3),
(10, 1),
(10, 3),
(11, 1),
(11, 3),
(12, 1),
(12, 3),
(13, 1),
(13, 3),
(14, 1),
(14, 3),
(15, 1),
(15, 3),
(16, 1),
(16, 3),
(17, 1),
(17, 3),
(18, 1),
(18, 3),
(19, 1),
(19, 3),
(20, 1),
(20, 3),
(21, 1),
(21, 3),
(22, 1),
(22, 3),
(23, 1),
(23, 3),
(24, 1),
(24, 3),
(25, 1),
(25, 3),
(26, 1),
(26, 3),
(27, 1),
(27, 3),
(28, 1),
(28, 3),
(29, 1),
(29, 3),
(30, 1),
(30, 3),
(31, 1),
(31, 3),
(32, 1),
(32, 3),
(33, 1),
(33, 3),
(34, 1),
(34, 3),
(35, 1),
(35, 3),
(36, 1),
(36, 3),
(37, 1),
(37, 3),
(38, 1),
(38, 3),
(39, 1),
(39, 3),
(40, 1),
(40, 3),
(41, 1),
(41, 3),
(42, 1),
(42, 3),
(43, 1),
(43, 3),
(44, 1),
(44, 3),
(45, 1),
(45, 3),
(46, 1),
(46, 3),
(47, 1),
(47, 3),
(48, 1),
(48, 3),
(49, 1),
(49, 3),
(50, 1),
(50, 3),
(51, 1),
(51, 3),
(52, 1),
(52, 3),
(53, 1),
(53, 3),
(54, 1),
(54, 3),
(55, 1),
(55, 3),
(56, 1),
(56, 3),
(57, 1),
(57, 3),
(58, 1),
(58, 3),
(59, 1),
(59, 3),
(60, 1),
(60, 3),
(61, 1),
(61, 3),
(62, 1),
(62, 3),
(63, 1),
(63, 3),
(64, 1),
(64, 3),
(65, 1),
(66, 1),
(67, 1),
(68, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'KPITB',
  `footer` text COLLATE utf8mb4_unicode_ci,
  `mainLayoutType` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vertical',
  `theme` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'light',
  `sidebarCollapsed` tinyint(1) NOT NULL DEFAULT '0',
  `navbarColor` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bg-primary',
  `horizontalMenuType` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'floating',
  `verticalMenuNavbarType` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'floating',
  `footerType` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'static',
  `layoutWidth` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'boxed',
  `showMenu` tinyint(1) NOT NULL DEFAULT '1',
  `bodyClass` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `pageHeader` tinyint(1) NOT NULL DEFAULT '1',
  `contentLayout` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `defaultLanguage` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `blankPage` tinyint(1) NOT NULL DEFAULT '0',
  `direction` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ltr',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `contentsidebarClass` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'content-left-sidebar',
  `sidebarPositionClass` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'content-left-sidebar',
  `horizontalMenuClass` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'static',
  `websiteName` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `android_app_link` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `ios_app_link` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `footer_note` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `facebook` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `instagram` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `youtube` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `footer`, `mainLayoutType`, `theme`, `sidebarCollapsed`, `navbarColor`, `horizontalMenuType`, `verticalMenuNavbarType`, `footerType`, `layoutWidth`, `showMenu`, `bodyClass`, `pageHeader`, `contentLayout`, `defaultLanguage`, `blankPage`, `direction`, `created_at`, `updated_at`, `status`, `deleted_at`, `contentsidebarClass`, `sidebarPositionClass`, `horizontalMenuClass`, `websiteName`, `email`, `android_app_link`, `ios_app_link`, `footer_note`, `address`, `phone`, `twitter`, `facebook`, `instagram`, `youtube`) VALUES
(1, 'Main Theme', '<p class=\"clearfix mb-0\">\r\n    <span class=\"float-md-left d-block d-md-inline-block mt-25\">COPYRIGHT &copy; <script>document.write(new Date().getFullYear())</script><a class=\"ml-25\" href=\"https://www.kpitb.gov.pk/\" target=\"_blank\">KPITB</a>\r\n      <span class=\"d-none d-sm-inline-block\">, All rights Reserved</span>\r\n    </span>\r\n    <span class=\"float-md-right d-none d-md-block\">Hand-crafted & Made with<i data-feather=\"heart\"></i></span>\r\n  </p>', 'vertical', 'light', 0, 'bg-primary', 'floating', 'floating', 'static', 'boxed', 1, '', 1, 'default', 'en', 0, 'ltr', '2022-08-03 08:11:28', '2022-08-14 04:47:42', 1, NULL, 'default', 'content-right-sidebar', 'static', 'Health', 'info@healthkp.gov.pk', '#', '#', '<p><strong>Website last updated on: 27/06/2022 05:43 PM.</strong></p><p><em>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremq laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architect.</em></p>', 'Gate # 5 opposite PC Hotel, Khyber Road, Peshawar, \r\n Khyber Pakhtunkhwa', '+92 91 1234567', '#', '#', '#', '#');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
CREATE TABLE IF NOT EXISTS `slides` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `en_title` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_description` text COLLATE utf8mb4_unicode_ci,
  `ur_title` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ur_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `deleted_at`, `created_at`, `updated_at`, `en_title`, `en_description`, `ur_title`, `ur_description`, `status`) VALUES
(1, '2022-08-01 20:03:57', '2022-08-01 01:28:28', '2022-08-01 20:03:57', 'For the entire population of KHYBER PAKHTUNKHWA', '<p><strong>Free medical treatment facilities under Sehat Card Program</strong></p><p>Sehat Card Plus is a Micro-health Insurance Programme for all the citizens of Khyber Pakhtunkhwa. It is one of the flagship programmes of Government of Khyber Pakhtunkhwa</p>', 'خیبرپختونخوا کی پوری آبادی کے لیے', '<p><strong>صحت کارڈ پروگرام کے تحت مفت علاج کی سہولیات</strong></p><p>﻿صحت کارڈ پلس خیبرپختونخوا کے تمام شہریوں کے لیے ایک مائیکرو ہیلتھ انشورنس پروگرام ہے۔ یہ خیبرپختونخوا حکومت کے اہم پروگراموں میں سے ایک ہے۔</p>', 1),
(2, NULL, '2022-08-01 21:44:11', '2022-08-01 22:05:31', 'For the entire population of KHYBER PAKHTUNKHWA', '<h1><strong style=\"color: rgb(255, 255, 255);\">Free medical treatment facilities under Sehat Card Program</strong></h1><p><span class=\"ql-size-large\" style=\"color: rgb(255, 255, 255);\">﻿Sehat Card Plus is a Micro-health Insurance Programme for all the citizens of Khyber Pakhtunkhwa. It is one of the flagship programmes of Government of Khyber Pakhtunkhwa.</span></p>', 'خیبرپختونخوا کی پوری آبادی کے لیے', '<h1 class=\"ql-align-right\"><strong style=\"color: rgb(255, 255, 255);\">صحت کارڈ پروگرام کے تحت مفت علاج کی سہولیات</strong></h1><p class=\"ql-align-right\"><span class=\"ql-size-large\" style=\"color: rgb(255, 255, 255);\">﻿صحت کارڈ پلس خیبرپختونخوا کے تمام شہریوں کے لیے ایک مائیکرو ہیلتھ انشورنس پروگرام ہے۔ یہ خیبرپختونخوا حکومت کے اہم پروگراموں میں سے ایک ہے۔</span></p><p><br></p>', 1),
(3, NULL, '2022-08-01 21:54:08', '2022-08-01 22:06:34', 'For the entire population of KHYBER PAKHTUNKHWA 2', '<h1><strong style=\"color: rgb(255, 255, 255);\">Free medical treatment facilities under Sehat Card Program</strong></h1><p><span class=\"ql-size-large\" style=\"color: rgb(255, 255, 255);\">Sehat Card Plus is a Micro-health Insurance Programme for all the citizens of Khyber Pakhtunkhwa. It is one of the flagship programmes of Government of Khyber Pakhtunkhwa.</span></p>', 'خیبرپختونخوا کی پوری آبادی کے لیے 2', '<h1 class=\"ql-align-right\"><strong style=\"color: rgb(255, 255, 255);\">صحت کارڈ پروگرام کے تحت مفت علاج کی سہولیات</strong></h1><p class=\"ql-align-right\"><span class=\"ql-size-large\" style=\"color: rgb(255, 255, 255);\">صحت کارڈ پلس خیبرپختونخوا کے تمام شہریوں کے لیے ایک مائیکرو ہیلتھ انشورنس پروگرام ہے۔ یہ خیبرپختونخوا حکومت کے اہم پروگراموں میں سے ایک ہے۔</span></p><p><br></p>', 1),
(4, '2022-08-12 09:54:51', '2022-08-12 09:54:47', '2022-08-12 09:54:51', 'test', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `designation`, `facebook`, `twitter`, `phone`, `type`, `status`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'IMRAN ALI', NULL, 'https://www.twitter.com', 'https://www.twitter.com', '03133434571', 'team', 1, '<p>03133434571</p>', '2022-07-24 21:52:29', '2022-07-20 00:44:27', '2022-07-24 21:52:29'),
(2, 'MAHMOOD KHAN', 'Chief Minister KP', NULL, 'https://www.twitter.com', '(+92) 91 1234567', 'addministrator', 1, '<p class=\"ql-align-center\">Lorem Ipsum is simply dumIt was the of popularized in the 1960s with the and is release is text of the the printing and ty setting the industry.The and have Lorem in Ipsum has been the industry</p>', NULL, '2022-07-24 21:52:24', '2022-08-14 04:59:09'),
(3, 'Taimur Khan Jhagra', 'Health Minister', NULL, 'https://www.twitter.com', '(+92) 91 1234567', 'addministrator', 1, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>', NULL, '2022-07-25 00:25:46', '2022-08-11 06:17:26'),
(4, 'AMER SULTAN TAREEN', 'Secretary Health', NULL, 'https://www.twitter.com', '(+92) 91 1234567', 'addministrator', 1, '<p><span style=\"background-color: rgb(247, 247, 247); color: rgb(37, 38, 56);\">Lorem Ipsum is simply dumIt was the of popularized in the 1960s with the and is release is text of the the printing and ty setting the industry.The and have Lorem in Ipsum has been the industry</span></p>', NULL, '2022-07-25 00:35:29', '2022-08-11 06:17:33'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, 0, '<p>afdsadsfads</p><p><br></p><p><br></p><p><br></p><p><br></p>', '2022-07-27 01:47:07', '2022-07-26 05:29:06', '2022-07-27 01:47:07'),
(6, 'MAHMOOD KHAN', 'Chief Minister KP', NULL, 'https://www.twitter.com', '(+92) 91 1234567', 'addministrator', 1, '<p class=\"ql-align-center\"><span class=\"ql-size-small\">Lorem Ipsum is simply dumIt was the of popularized in the 1960s with the and is release is text of the the printing and ty setting the industry.The and have Lorem in Ipsum has been the industry</span></p>', '2022-08-14 04:59:01', '2022-07-24 21:52:24', '2022-08-14 04:59:01'),
(7, 'Taimur Khan Jhagra', 'Health Minister', NULL, 'https://www.twitter.com', NULL, 'addministrator', 1, '<p>Lorem Ipsum is simply dumIt was the of popularized in the 1960s with the and is release is text of the the printing and ty setting the industry.The and have Lorem in Ipsum has been the industry</p><p>         </p>', NULL, '2022-08-14 05:00:29', '2022-08-14 05:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `teamtypes`
--

DROP TABLE IF EXISTS `teamtypes`;
CREATE TABLE IF NOT EXISTS `teamtypes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temporary_files`
--

DROP TABLE IF EXISTS `temporary_files`;
CREATE TABLE IF NOT EXISTS `temporary_files` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `token` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collection` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temporary_files`
--

INSERT INTO `temporary_files` (`id`, `token`, `collection`, `created_at`, `updated_at`) VALUES
(2, 'tz3seGJoKMJ1tNmC06T3czYoPx0uu9wbWL363MWZPXFsXJ7eWIGYzMWH6fex', 'logo', '2022-07-18 01:51:35', '2022-07-18 01:51:35'),
(3, 'CXtioO4eYONl5eoJYOX5VAMsPeWi6Ho4oDWzOxhq7O4gdYzyJvQTW0Fmn7jZ', 'logo', '2022-07-18 01:57:59', '2022-07-18 01:57:59'),
(5, 'crwyZW45zt9mcD89s0DQEiquhUG9vaLD7h6Z82eJvOTWAIwBw5ZZJtBeVQr1', 'logo', '2022-07-18 02:58:39', '2022-07-18 02:58:39'),
(6, 'GRomVrhhqgy8zRnCjeXn5TWRIueqtWviJGBv6iUn2RtUCd6X4WOWMCWUBfmz', 'logo', '2022-07-18 03:42:24', '2022-07-18 03:42:24'),
(7, 'iCh7FCnipEXD92ttX39HAkvUV3qRZ260DIqRGTkwSsiHws8x1tWRHjsXMll1', 'logo', '2022-07-18 06:36:17', '2022-07-18 06:36:17'),
(8, 'LhQ27HFeFYgKjAotmY9ysQKApAJBC0lF3WEmaB1z0X3Agwo6GdhXd7WJ89nj', 'logo', '2022-07-18 06:36:39', '2022-07-18 06:36:39'),
(9, 'NxoPhgcltzICKjx5G4uFWe3MmdamcF1cSO2aD2zu5HPQdbzLDPXBwjL2yiJo', 'slide', '2022-07-18 23:46:19', '2022-07-18 23:46:19'),
(11, 'sMzoblyJ26cDveevW9JZdizBPIHc8A2VeKsDf0QQxqNQpgjoCpHCHr2XqdKP', 'slide', '2022-07-19 22:12:34', '2022-07-19 22:12:34'),
(17, 'mpl5v2SRUBrMMHtflhy1BrCF087XruTgmWzRGySNXVC2J50VRbyRx7UHyugm', 'team', '2022-07-20 00:10:38', '2022-07-20 00:10:38'),
(16, 'bzDKEjOA0PZxSLLCEB45BZ3igG8LtYAR9lH9AYDmWugH16rVo0zX12g6gdNM', 'slide', '2022-07-19 23:49:29', '2022-07-19 23:49:29'),
(15, 'WfxVzn7iMX3FASVycEjKZV6WZmWSoysuEtQydgleyxsLwM2yE4QGHQFZREfg', 'download', '2022-07-19 22:17:56', '2022-07-19 22:17:56'),
(18, 'BHdsBazCXCoCrKXHblKJEyQdUmrYEcF9zmZfTLgo8tXdrUMWwvmykqEzxADH', 'download', '2022-07-20 00:23:18', '2022-07-20 00:23:18'),
(19, 'eE1Q6fFCpUXlThfaulcbJXP2B6AUo2sEvRZp7U5copX9MWK57V0r27knXd6x', 'download', '2022-07-20 00:23:20', '2022-07-20 00:23:20'),
(20, 'SGkHTMTY42M9vDqt4iH4gSlMoRzj1scv4XLirNlzvqnGyGrA9BqrlI8QJI0y', 'download', '2022-07-20 00:23:23', '2022-07-20 00:23:23'),
(21, '3Ja4mjWI4zGfRkvoOTKhzHwGl7D4YADfux68AtHe9boFEhkEWWUoUz9MPyCl', 'download', '2022-07-20 00:23:27', '2022-07-20 00:23:27'),
(24, 'KFQ5ZuyhFoy9Bi4FSMayfQv4GbMecmCoOZl3qzI4cHXOroYSf5IoD1bQd93K', 'slide', '2022-07-20 02:29:09', '2022-07-20 02:29:09'),
(25, 'RRSZduLpW69CDg35yMpw62k7r7brIn1PXCTdjPmpUgfdZyLK90MX5gwvxslm', 'download', '2022-07-20 02:30:30', '2022-07-20 02:30:30'),
(26, 'h41p00sspK3ek9fxw9cWZO3p9FCYgj71MgFJxvQ3jKO3byQWEdBZDwv9hfTq', 'download', '2022-07-20 02:30:31', '2022-07-20 02:30:31'),
(36, 'ssGbh206TwKlfodTELCoyGPYaPB3szhNzSgK725LWy6ZKKiyRz9sCP0Cwy54', 'hospital', '2022-07-26 03:36:26', '2022-07-26 03:36:26'),
(35, 'nmPxpzESrvjuCLvYWNOGUPPjbiWHv106lzbYNxlvJW5VJZe3hBhUrffFQ8Zf', 'hospital', '2022-07-26 03:34:50', '2022-07-26 03:34:50'),
(48, '8jxxtFFqQz5ihk8OhPMlJsZCtA7hPWgFgPJ3DFHVMAwWpaMFUgd2gUdau3cZ', 'icon', '2022-08-01 22:29:41', '2022-08-01 22:29:41'),
(71, 'LhXbfesM90MYJmxHprZuSPmgzm6cbjRIOxseicZbjvoRRRkqGQ7pIMyzhMAE', 'banner', '2022-08-09 04:25:38', '2022-08-09 04:25:38'),
(70, 'PHQHZDC08qcdDb56hsJzaOSB76hPAfNqWJl90xj4FPNC7VO9P7BVtT6gSSrE', 'banner', '2022-08-09 04:25:02', '2022-08-09 04:25:02'),
(69, 'jpAsp6U9OhVCuSs5w1tIxRVFl7WPZkDIDNg8ZDIfyNH1QASy8ykk7jm8mWJq', 'banner', '2022-08-09 04:24:27', '2022-08-09 04:24:27'),
(85, '0GvaKGXZXmnio79VOgdUzvyu4sE8IpP0vJClD8uo93Nbp0GMUM6HHFxdVOz5', 'hospital', '2022-08-10 02:48:53', '2022-08-10 02:48:53'),
(83, 'SjK8HT3f0hfJ9Gx4YB24MKJqNm3jUSiyP19UUutmXjViuKQw08h7DgxDMGNm', 'banner', '2022-08-10 02:15:49', '2022-08-10 02:15:49'),
(91, 'jXzmXCLCFfQ63DlmmxjdFdY1qypZ0ZKPCp9Kq4B3Zx6XThI9iDL07OmRkCz8', 'banner', '2022-08-11 01:11:00', '2022-08-11 01:11:00'),
(96, '8T3oEg1x15NVSefUqvqZE1kCNSgKUz6Fk1HXThiY354ZEXsrSlRIHlkYxsih', 'gallary', '2022-08-11 21:27:57', '2022-08-11 21:27:57'),
(97, 'bCzO4RlXwXRvTLGqtU7FEQt37lR3yL07yMafst05f1DC1Qog1EUVlF8BxtOD', 'gallary', '2022-08-11 21:28:03', '2022-08-11 21:28:03'),
(98, '6sarnFHVzKCREOUFc8GDN6SZXS9kYyeeZZVwrUybVcNMCuecAJ9w0FhAn98j', 'gallary', '2022-08-11 21:28:06', '2022-08-11 21:28:06'),
(99, 'tQDVBFCadAAQzFflyYxhNBBzXKCek6dgTGBOcSK4gvFvdSGMq3o2q35HvRUe', 'gallary', '2022-08-11 21:28:10', '2022-08-11 21:28:10'),
(100, 'qQxawki4FhjrEmjCDnitmKebctywYDtBecexNlYBjBg2iqGeZhyVdzCGL5B2', 'gallary', '2022-08-11 21:28:14', '2022-08-11 21:28:14'),
(101, 'L0lTHeFYp02dAwHnayB42NrDA3XMn93SENONkWQ2oG4j6ypHrEKtUhZYySu2', 'gallary', '2022-08-11 21:28:59', '2022-08-11 21:28:59'),
(102, 'r9KyIlgIREakENdqBg16a0xlbAYI9dmdVsAwR2FpMahS4tReoapLMJuCnfig', 'gallary', '2022-08-11 21:33:33', '2022-08-11 21:33:33'),
(103, 'Zg5YlTo9UPgCN0LcNxvADSuL6Pjx99aHGgGYCCvJaiNydTPbxsIRYF5ql1tR', 'gallary', '2022-08-11 21:33:37', '2022-08-11 21:33:37'),
(104, 'T6S8WX4zq4du7CZfaHIFW6m63yLZlyfJgESUdqaaunrEgD0fgOARNtCDe9QP', 'gallary', '2022-08-11 21:33:41', '2022-08-11 21:33:41'),
(105, '5uCTtDuxTb5WdMF5SzN3FYayMXLm3U9TsZehGDkYkVILHFMmO15bgoG5YOET', 'gallary', '2022-08-11 21:33:44', '2022-08-11 21:33:44'),
(106, 'LjjNarmn6yV5J3qv0jM371sB8XcEbV5fzEMieZdN6R0LnQ6HLbko9QT1hCUE', 'gallary', '2022-08-11 21:36:10', '2022-08-11 21:36:10'),
(107, 'x4LbnLpLQGalsMlyw02RAQY9JQZlhmYNPM1TeIFBIepwgIlDLWLZ3dlbw0Sa', 'gallary', '2022-08-11 21:36:54', '2022-08-11 21:36:54'),
(109, '9Sh412PucOQ2EYaZU64IbOQZbbMRhw9n8YE6nVzSuGQJlgZOoUXjEUCgyrCh', 'gallary', '2022-08-11 21:38:32', '2022-08-11 21:38:32'),
(111, '5c4YtlLk5JGdQB2Tz38qIhRSjN5qgDjnYsWi24xreL7NvXA60x6q8F9oahQQ', 'gallary', '2022-08-11 21:41:50', '2022-08-11 21:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '2022-07-05 07:09:21', '$2y$10$Ar/wP1H7RUIo8pkD0NVqK.9RYR9DdClgwAzyJKIe6f8kXA5lVAz/G', NULL, '2022-07-05 02:07:37', '2022-08-14 05:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `weather`
--

DROP TABLE IF EXISTS `weather`;
CREATE TABLE IF NOT EXISTS `weather` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `response` text COLLATE utf8mb4_unicode_ci,
  `lat` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weather`
--

INSERT INTO `weather` (`id`, `response`, `lat`, `lng`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '{\"coord\":{\"lon\":71.5785,\"lat\":34.008},\"weather\":[{\"id\":721,\"main\":\"Haze\",\"description\":\"haze\",\"icon\":\"50d\"}],\"base\":\"stations\",\"main\":{\"temp\":27.08,\"feels_like\":29.72,\"temp_min\":27.08,\"temp_max\":27.08,\"pressure\":1008,\"humidity\":78},\"visibility\":6000,\"wind\":{\"speed\":5.14,\"deg\":310},\"clouds\":{\"all\":75},\"dt\":\"08\\/15\\/2022 04:37 PM\",\"sys\":{\"type\":1,\"id\":7590,\"country\":\"PK\",\"sunrise\":\"08\\/15\\/2022 10:35 AM\",\"sunset\":\"08\\/16\\/2022 12:01 AM\"},\"timezone\":18000,\"id\":1168197,\"name\":\"Peshawar\",\"cod\":200}', NULL, NULL, NULL, '2022-08-15 06:40:59', '2022-08-15 06:40:59');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
