-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 19, 2024 at 05:26 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp_edu_update`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

DROP TABLE IF EXISTS `achievements`;
CREATE TABLE IF NOT EXISTS `achievements` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `achievements_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `title`, `slug`, `link`, `status`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Final Comparative Report For Covid1-9 Response Items', 'final-comparative-report-for-covid1-9-response-items', NULL, 1, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.</p><p>And a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><ul><li>Nullam at erat quis eros finibus aliquam.</li><li>Cras nec risus lobortis, auctor ipsum quis, vulputate purus.</li><li>Morbi id tellus non arcu pulvinar gravida.</li><li>Nulla bibendum odio non felis pulvinar interdum.</li><li>Aliquam condimentum mauris et velit tempus dictum.</li><li>Curabitur non libero eu lectus facilisis aliquet ac maximus justo.</li></ul><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', NULL, '2022-08-09 03:00:01', '2022-08-09 03:03:46'),
(2, 'Final comparative report for covid19 response items', 'final-comparative-report-for-covid19-response-items', NULL, 1, '<p>Final comparative report for covid19 response items</p>', NULL, '2022-08-09 03:01:26', '2022-08-09 03:01:26'),
(3, 'Final Comparative Report For Covid1-9 Response Items', 'final-comparative-report-for-covid1-9-response-items-2', NULL, 1, '<p>Final Comparative Report For Covid1-9 Response Items</p>', NULL, '2022-08-09 03:01:56', '2022-08-09 03:01:56'),
(4, 'test', 'test', NULL, 0, '<p>dfasd</p>', '2022-08-12 03:51:01', '2022-08-12 03:50:56', '2022-08-12 03:51:01');

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

DROP TABLE IF EXISTS `alerts`;
CREATE TABLE IF NOT EXISTS `alerts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `link` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`id`, `title`, `link`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(1, 'not working', NULL, '2022-08-12 04:49:22', '2022-07-26 00:59:38', '2022-08-12 04:49:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_educations`
--

DROP TABLE IF EXISTS `applicant_educations`;
CREATE TABLE IF NOT EXISTS `applicant_educations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `level` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute_university_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passing_year` int DEFAULT NULL,
  `per_month_kpef` int DEFAULT NULL,
  `total_marks_cgpa` int DEFAULT NULL,
  `obtained_marks_cgpa` int DEFAULT NULL,
  `currently_studying` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `applicant_educations_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_financial_records`
--

DROP TABLE IF EXISTS `applicant_financial_records`;
CREATE TABLE IF NOT EXISTS `applicant_financial_records` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `expense_id` bigint UNSIGNED NOT NULL,
  `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `financially_supporting` tinyint(1) NOT NULL,
  `relationship` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gross_income` bigint UNSIGNED NOT NULL,
  `net_income` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `applicant_financial_records_user_id_foreign` (`user_id`),
  KEY `applicant_financial_records_expense_id_foreign` (`expense_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `participant_id` bigint UNSIGNED DEFAULT NULL,
  `district_id` bigint UNSIGNED DEFAULT NULL,
  `competition_category_id` bigint UNSIGNED DEFAULT NULL,
  `competition_sub_category_id` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `levels_or_stage_id` bigint UNSIGNED DEFAULT NULL,
  `stage` bigint UNSIGNED DEFAULT NULL,
  `rank` bigint UNSIGNED DEFAULT NULL,
  `event_type` bigint UNSIGNED NOT NULL DEFAULT '1' COMMENT '1 for normal, 2 for provicional level',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `applications_levels_or_stage_id_foreign` (`levels_or_stage_id`),
  KEY `applications_participant_id_foreign` (`participant_id`),
  KEY `applications_district_id_foreign` (`district_id`),
  KEY `applications_competition_category_id_foreign` (`competition_category_id`),
  KEY `applications_competition_sub_category_id_foreign` (`competition_sub_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `participant_id`, `district_id`, `competition_category_id`, `competition_sub_category_id`, `status`, `levels_or_stage_id`, `stage`, `rank`, `event_type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 1, 1, NULL, 17, 1, 11, NULL, NULL, 2, NULL, '2022-11-23 00:17:26', '2022-11-23 00:17:26'),
(4, 1, 1, 3, 11, 1, 5, NULL, NULL, 1, NULL, '2022-11-23 00:17:26', '2022-11-23 00:17:26'),
(5, 1, 1, 1, 9, 1, 14, NULL, NULL, 1, NULL, '2022-11-23 00:17:26', '2022-11-23 00:17:26'),
(6, 1, 1, 2, 10, 1, 2, NULL, NULL, 1, NULL, '2022-11-23 00:17:26', '2022-11-23 00:17:26'),
(7, 6, 2, 3, 10, 1, 2, NULL, NULL, 1, NULL, '2022-11-30 00:20:46', '2022-11-30 00:20:46'),
(8, 6, 2, 1, 9, 1, 14, NULL, NULL, 1, NULL, '2022-11-30 00:20:46', '2022-11-30 00:20:46'),
(9, 7, 1, NULL, 12, 1, 6, NULL, NULL, 2, NULL, '2022-11-30 02:25:29', '2022-11-30 02:25:29'),
(10, 7, 1, 3, 10, 1, 2, NULL, NULL, 1, NULL, '2022-11-30 02:25:29', '2022-11-30 02:25:29'),
(11, 7, 1, 1, 9, 1, 14, NULL, NULL, 1, NULL, '2022-11-30 02:25:30', '2022-11-30 02:25:30'),
(12, 8, 1, NULL, 12, 1, 6, NULL, NULL, 2, NULL, '2022-12-02 00:59:50', '2022-12-02 00:59:50'),
(13, 8, 1, 3, 10, 1, 2, NULL, NULL, 1, NULL, '2022-12-02 00:59:50', '2022-12-02 00:59:50'),
(14, 9, 2, 1, 9, 1, 14, NULL, NULL, 1, NULL, '2022-12-02 01:12:10', '2022-12-02 01:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category_id`, `name`, `is_deleted`, `created_at`, `updated_at`) VALUES
(5, 12, 'Islamic book', 1, '2022-08-25 12:29:17', '2022-08-25 12:37:02');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `type`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`, `slug`) VALUES
(2, 'News', 'news', '<p>News</p>', 1, NULL, '2022-08-04 19:52:02', '2022-08-04 19:52:02', 'news'),
(4, 'Teaching Hospitals', 'hospital', '<p>Teaching Hospitals 09</p>', 1, '2022-12-06 01:48:06', '2022-08-09 21:26:33', '2022-12-06 01:48:06', 'Teaching-Hospitals'),
(5, 'Category D Hospitals', 'hospital', '<p>63</p>', 1, '2022-12-06 01:48:22', '2022-08-09 21:26:48', '2022-12-06 01:48:22', 'Category-D-Hospitals'),
(6, 'Category B Hospitals', 'hospital', '<p>12</p>', 1, '2022-12-06 01:48:26', '2022-08-09 21:27:09', '2022-12-06 01:48:26', 'Category-B-Hospitals'),
(7, 'Category C Hospitals', 'hospital', '<p>67</p>', 1, '2022-12-06 01:48:29', '2022-08-09 21:27:25', '2022-12-06 01:48:29', 'Category-C-Hospitals'),
(8, 'ACTS', 'download', '<p>ACTS</p>', 1, '2022-08-27 01:46:51', '2022-08-10 20:32:58', '2022-08-27 01:46:51', 'acts'),
(9, 'LAWS', 'download', '<p>Laws</p>', 1, '2022-08-27 01:46:42', '2022-08-10 20:33:34', '2022-08-27 01:46:42', 'laws'),
(10, 'POLICIES', 'download', '<p>POLICIES</p>', 1, '2022-08-27 01:46:31', '2022-08-10 20:36:44', '2022-08-27 01:46:31', 'policies'),
(11, 'Islamic', 'book', NULL, 1, '2022-12-06 01:48:11', '2022-08-25 02:43:48', '2022-12-06 01:48:11', 'islamic'),
(12, 'Novel', 'book', NULL, 1, '2022-12-06 01:48:15', '2022-08-25 02:44:06', '2022-12-06 01:48:15', 'novel'),
(13, 'Medical', 'book', NULL, 1, '2022-12-06 01:48:19', '2022-08-25 02:44:24', '2022-12-06 01:48:19', 'medical'),
(14, 'Advertisements', 'download', NULL, 1, NULL, '2022-08-27 01:47:43', '2022-12-06 01:19:59', 'jobs'),
(15, 'Proposal Template', 'download', NULL, 1, NULL, '2022-08-27 01:48:02', '2022-12-07 03:57:24', 'internships'),
(16, 'Bidding Documents', 'download', NULL, 1, '2022-12-06 01:20:05', '2022-08-27 01:48:42', '2022-12-06 01:20:05', 'bidding-documents'),
(17, 'Tenders / Bidding Documents', 'download', NULL, 1, NULL, '2022-08-27 01:49:10', '2022-12-06 01:20:17', 'tenders'),
(18, 'KP Youth Policy', 'download', NULL, 1, '2022-12-06 01:19:43', '2022-08-27 01:50:25', '2022-12-06 01:19:43', 'kp-youth-policy'),
(20, 'Announcements', 'news', '<p>Announcements</p>', 1, NULL, '2022-11-11 01:40:04', '2022-11-25 04:11:07', 'announcements'),
(21, 'Service Rules / Acts', 'download', NULL, 1, NULL, '2022-12-06 05:15:50', '2022-12-06 05:15:50', 'service-rules-acts'),
(22, 'Sports Policy', 'download', NULL, 1, NULL, '2023-01-09 02:02:04', '2023-01-09 02:02:04', 'sports-policy');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

DROP TABLE IF EXISTS `colleges`;
CREATE TABLE IF NOT EXISTS `colleges` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `district_id` bigint UNSIGNED NOT NULL,
  `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `organized_by` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prospectus_path` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `colleges_name_unique` (`name`),
  UNIQUE KEY `colleges_phone_unique` (`phone`),
  KEY `colleges_district_id_foreign` (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `district_id`, `name`, `organized_by`, `address`, `phone`, `prospectus_path`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 2, 'Government College Mardan', 'Government', 'Peshawar', '091234322', 'xyz.pdf', 1, NULL, '2022-08-25 01:51:43'),
(4, 1, 'Islamia College Peshawar', 'Government', 'Peshawar', '091921270', 'xyz.pdf', 1, '2022-08-30 06:25:52', '2022-08-30 06:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `college_details`
--

DROP TABLE IF EXISTS `college_details`;
CREATE TABLE IF NOT EXISTS `college_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `college_id` bigint UNSIGNED NOT NULL,
  `course_offered` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `duration` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fee` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `college_details_college_id_foreign` (`college_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `college_details`
--

INSERT INTO `college_details` (`id`, `college_id`, `course_offered`, `duration`, `fee`, `created_at`, `updated_at`) VALUES
(10, 1, 'FA', '2 Years', 2000.00, '2022-08-28 06:18:52', '2022-08-30 05:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `scholarship_application_id` bigint UNSIGNED DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_scholarship_application_id_foreign` (`scholarship_application_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `competition_categories`
--

DROP TABLE IF EXISTS `competition_categories`;
CREATE TABLE IF NOT EXISTS `competition_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `competition_categories_title_unique` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `competition_categories`
--

INSERT INTO `competition_categories` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Naat/Qirat', 1, '2022-11-14 23:56:34', '2022-11-15 00:10:19'),
(2, 'Serious Speech', 1, '2022-11-15 00:09:20', '2022-11-15 00:09:20'),
(3, 'Humorous Speech', 1, '2022-11-15 00:10:08', '2022-11-15 00:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `competition_sub_categories`
--

DROP TABLE IF EXISTS `competition_sub_categories`;
CREATE TABLE IF NOT EXISTS `competition_sub_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `competition_category_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event_type` int DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `competition_sub_categories_competition_category_id_foreign` (`competition_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `competition_sub_categories`
--

INSERT INTO `competition_sub_categories` (`id`, `competition_category_id`, `title`, `status`, `created_at`, `updated_at`, `event_type`) VALUES
(9, 1, 'Test', 1, '2022-11-17 04:15:34', '2022-11-17 04:15:34', 1),
(10, 3, 'Test Speech', 0, '2022-11-17 04:18:05', '2022-11-30 00:02:58', 1),
(11, 3, 'test speech', 1, '2022-11-20 05:03:00', '2022-11-20 05:03:00', 1),
(12, NULL, 'test provincial', 1, '2022-11-20 05:03:25', '2022-11-20 05:03:25', 2),
(13, NULL, 'Open MIC', 1, '2022-11-21 01:32:44', '2022-11-21 01:39:00', 2),
(14, NULL, 'Mentalist', 1, '2022-11-21 01:39:24', '2022-11-21 01:39:24', 2),
(15, NULL, 'Skilled Labor', 1, '2022-11-21 01:39:42', '2022-11-21 01:39:42', 2),
(16, NULL, 'Fashion Expo', 1, '2022-11-21 01:40:17', '2022-11-21 01:40:17', 2),
(17, NULL, 'Market Place', 1, '2022-11-21 01:40:58', '2022-11-21 01:40:58', 2),
(18, NULL, 'Magic Tricks', 0, '2022-11-21 01:41:17', '2022-11-21 01:41:17', 2),
(19, NULL, 'Extraordinary Talent', 0, '2022-11-21 01:41:35', '2022-11-21 23:55:44', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subject` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'Test', 'Test', NULL, NULL, '2022-08-14 00:48:19', '2022-08-14 00:48:19'),
(2, 'Test', 'imranemi143@gmail.com', 'test', '<p>adsfasdfdsa</p>', NULL, '2022-08-14 00:48:49', '2022-08-14 00:50:26'),
(3, 'salman Qazi', 'salmannqqazi@gmail.com', 'Testing contact us form', 'This is just for testing', NULL, '2022-12-06 02:33:33', '2022-12-06 02:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `contact_books`
--

DROP TABLE IF EXISTS `contact_books`;
CREATE TABLE IF NOT EXISTS `contact_books` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `designation` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contact_books_name_unique` (`name`),
  UNIQUE KEY `contact_books_phone_unique` (`phone`),
  UNIQUE KEY `contact_books_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_books`
--

INSERT INTO `contact_books` (`id`, `name`, `designation`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(2, 'Adnan Khan', 'Developer', '03214567865', 'adnan@gmail.com', 'Town', '2022-08-28 00:29:21', '2022-08-28 00:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `degree_certificates`
--

DROP TABLE IF EXISTS `degree_certificates`;
CREATE TABLE IF NOT EXISTS `degree_certificates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `degree_certificates`
--

INSERT INTO `degree_certificates` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MSc', 1, NULL, '2022-09-06 12:31:05'),
(2, 'BS', 1, NULL, NULL),
(3, 'FSc', 1, NULL, NULL),
(4, 'FA', 1, NULL, NULL),
(6, 'DIT', 1, '2022-09-06 12:21:22', '2022-09-06 12:21:22'),
(7, 'SSC', 1, '2022-11-15 01:56:32', '2022-11-15 01:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `districts_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Peshawar', 0, NULL, '2022-09-06 11:54:11'),
(2, 'Abbotabad', 0, NULL, '2023-07-17 00:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

DROP TABLE IF EXISTS `downloads`;
CREATE TABLE IF NOT EXISTS `downloads` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `sponser_by` varchar(8000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `downloads_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id`, `title`, `status`, `description`, `sponser_by`, `email`, `phone`, `deadline`, `deleted_at`, `created_at`, `updated_at`, `category_id`) VALUES
(4, 'Transfer Letter', 1, '<p>Transfer Letter</p>', NULL, NULL, NULL, NULL, '2022-08-27 01:49:46', '2022-08-10 23:57:01', '2022-08-27 01:49:46', 8),
(5, 'Admissions Open in KPEFA Kohat.', 1, '<p>Admissions Open in KPEFA Kohat.</p>', NULL, NULL, NULL, NULL, NULL, '2022-12-07 04:57:52', '2023-07-03 06:43:18', 14),
(6, 'KPEF invites you to join the Language Program.', 1, '<p>KPEF invites you to join the Language Program.</p>', NULL, NULL, NULL, NULL, NULL, '2022-12-13 00:00:16', '2023-07-03 06:42:09', 14),
(7, 'Meeting of the Principals, Coordinators, Student Affair Officers and CEOs of the private sector Educational Institutions', 1, '<p>Meeting of the Principals, Coordinators, Student Affair Officers and CEOs of the private sector Educational Institutions</p>', NULL, NULL, NULL, '2022-09-10', NULL, '2022-08-27 02:28:01', '2023-07-03 06:45:39', 14),
(8, 'LANGUAGE COURSES-ADMISSIONS OPEN AT KPEF LANGUAGE CENTER ABBOTABAD, D.I.KHAN & PESHAWAR', 1, '<p>LANGUAGE COURSES-ADMISSIONS OPEN AT KPEF LANGUAGE CENTER ABBOTABAD, D.I.KHAN &amp; PESHAWAR</p>', NULL, NULL, NULL, '2022-09-08', NULL, '2022-08-28 05:29:49', '2023-07-03 06:44:27', 14),
(9, 'Admission Form', 1, '<p>Admission Form</p>', NULL, NULL, NULL, NULL, NULL, '2023-01-09 02:03:22', '2023-07-03 06:39:59', 14),
(10, 'KPEF has achieved another significant milestone with the introduction of a groundbreaking Android App called \"Jobs in\".', 1, '<p>KPEF has achieved another significant milestone with the introduction of a groundbreaking Android App called \"Jobs in\".</p><p><br></p>', NULL, NULL, NULL, NULL, NULL, '2023-01-09 02:14:16', '2023-07-03 06:32:07', 14),
(13, 'KPEF & DoST signed an MoU at the launch of KP Science Agenda', 1, '<p>KPEF &amp; DoST signed an MoU at the launch of KP Science Agenda</p>', NULL, NULL, NULL, '2023-06-29', NULL, '2023-07-03 07:25:25', '2023-07-03 07:25:25', 14),
(16, 'KPEF organized a 2-Day Training on \"Tech. Education\" & \"Women in STEM\"', 1, '<p>KPEF organized a 2-Day Training on \"Tech. Education\" &amp; \"Women in STEM\"</p>', NULL, NULL, NULL, '2023-06-30', NULL, '2023-07-03 07:26:32', '2023-07-03 07:26:32', 14);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designation` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `basic_pay_scale` int NOT NULL,
  `total_strength` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `designation`, `basic_pay_scale`, `total_strength`, `created_at`, `updated_at`) VALUES
(1, 'Director', 19, 3, '2023-02-17 01:42:00', '2023-02-17 01:47:39');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `district_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `venue` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `type` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `audience` bigint NOT NULL DEFAULT '0',
  `participants` bigint NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event_category` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'new',
  `social_links` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  KEY `events_district_id_foreign` (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `district_id`, `title`, `description`, `venue`, `start`, `end`, `type`, `audience`, `participants`, `is_deleted`, `created_at`, `updated_at`, `event_category`, `social_links`) VALUES
(30, 1, 'MEETING OF THE PRINCIPALS, STUDENT AFFAIR OFFICERS & CEOS OF THE E. INSTITUTIONS', '<p><span style=\"color: rgb(101, 101, 101);\">KPEF Academy Kohat organized a meeting of the Principals, Coordinators, Student Affair Officers and CEOs of the private sector educational institutions at Kohat on 15th December 2022. The objective of the meeting was to take onboard the stakeholders in planning the activities/initiatives from 2023 onwards. The Managing Director Khyber Pakhtunkhwa Education Foundation, Mr. Imad A. Lohani briefed the audience about the Academy\'s initiatives and the requirements of the market which needs skilled graduates. Director Planning KPEF and Director Academy Kohat, Ms.Henna Karamat shared the areas in which Academy will provide facilitation and trainings. Course Coordinator KPEFA Mr. Yosuf Bilal will be providing the action plan to the target audience through the Community of Practice under the supervision of the Director.</span></p>', 'Kohat', '2022-12-15', '2022-09-30', NULL, 0, 0, 0, '2022-09-28 02:12:25', '2023-06-26 05:36:46', 'sports', 'https://www.youtube.com,'),
(31, 1, 'TRAINING/WORKSHOP ON “TEACHING & ADMINISTRATIVE LEADERSHIP SKILLS IN 21ST CENTURY”', '<p><span style=\"color: rgb(101, 101, 101);\">The Management of KPEF Academy has conducted a one-day training program titled as “Training on Teaching &amp; Administrative Leadership Skills in the 21st Century” on (Tuesday) 24th of January 2023. The following areas were discussed in the training session of 30 participants from the private and public sector institutes: &gt; Professional growth/development &gt; Students’ management &gt; Modern pedagogical strategies &gt; Teamwork &amp; group study &gt; Counseling and Mental Health &gt; Communication &amp; organizational skills &gt; Project management skills &gt; Bookkeeping skills and time management Director KPEFA Ms. Henna Karamat, Master Trainer HEC Pakistan and Mr. Arif Shah Coordinator CPEC were the trainers of the intensive sessions. The successful participants were awarded with the certificates by the Director. The implementation plan was given to the participants which will be discussed in phase-II of the course.</span></p>', 'KPEF Academy', '2023-01-24', '2022-09-30', NULL, 0, 0, 0, '2022-09-28 02:18:22', '2023-06-26 05:05:30', 'youth-affairs', 'https://www.youtube.com\r\n\r\n,\r\n\r\n,\r\n,'),
(32, 1, 'KPEFA KOHAT INITIATED A PLANTATION DRIVE TO MARK THE BEGINNING OF SPRING', '<p><span style=\"color: rgb(101, 101, 101);\">Khyber Pakhtunkhwa Education Foundation Academy (KPEFA) Kohat initiated a plantation drive on March 01, 2023, to mark the beginning of spring and promote a \"Clean and Green Pakistan.\" The Director KPEFA, Ms. Henna Karamat, and her team led the initiative, which saw the participation of students from various institutions. The plantation drive was accompanied by an awareness session, aimed at educating the youth of Kohat on the importance of a healthy and green Pakistan in the face of adverse climate change. The session highlighted the role of trees in mitigating the effects of climate change, promoting biodiversity, and creating a healthy environment for all living beings. Speaking on the occasion, Ms. Henna Karamat emphasized the importance of such initiatives to create a sustainable future for Pakistan. She stated that KPEFA is committed to promoting environmental conservation and sustainable development in the province. She further added that KPEFA has been taking various initiatives to promote a clean and green Pakistan and engage the youth in environmental conservation activities. The plantation drive saw the planting of various species of trees, including fruit-bearing trees and ornamental plants. The students were actively involved in the planting process and were educated on the proper techniques of tree planting and care. Such initiatives are crucial in creating a healthy and green Pakistan in the era of adverse climate change. Trees play a vital role in mitigating the effects of climate change by absorbing carbon dioxide, reducing the effects of air pollution, and providing a habitat for biodiversity. A healthy and green environment is essential for human health, well-being, and sustainable development. KPEFA\'s plantation drive is an excellent example of how environmental conservation and sustainable development can be achieved through collective efforts. It is hoped that such initiatives will continue to promote a clean and green Pakistan and engage the youth in environmental conservation activities. For more information about KPEFA and its initiatives.</span></p>', 'Kohat', '2023-03-01', '2022-11-30', NULL, 0, 0, 0, '2022-09-28 02:19:30', '2023-06-26 05:01:05', 'youth-affairs', ',\r\n\r\n\r\n,\r\n\r\n,\r\n,'),
(34, 1, 'KPEFA IN COLLABORATION WITH KIPS, ORGANIZED A ONE-DAY SESSION ON CAREER COUNSELING FOR THE STUDENTS OF FSC', '<p><span style=\"color: rgb(101, 101, 101);\">Khyber Pakhtunkhwa Education Foundation Academy (KPEFA) Kohat, in collaboration with KIPS, organized a one-day session on career counseling for the students of FSc on March 13, 2023. The initiative was aimed at providing guidance and support to the students in making informed decisions about their future careers. Mr. Shahab Saqib Director Academics at Khyber Pakhtunkhwa Education Foundation (KPEF) organized the event and this will be done at different centers of KPEF in the region under his supervision. The career counseling session was conducted by experienced professionals who provided valuable insights into various career paths and opportunities available to the students. The session covered topics such as career planning, goal setting, and decision-making. The session was highly beneficial for the students of FSc, who are at a crucial stage in their academic and professional lives. It provided them with an opportunity to interact with professionals from different fields and gain insights into the various career options available to them.</span></p>', 'Kohat', '2023-03-13', NULL, NULL, 0, 0, 1, '2022-11-28 02:13:26', '2023-06-26 04:39:40', 'youth-affairs', 'https://www.youtube.com,\r\n\r\nhttps://www.instagram.com,\r\n\r\n,\r\n,'),
(39, 1, 'ONE-DAY SESSION ON BOOK READING, RESEARCH SKILLS, LIBRARY REGISTRATION AND OPERATIONS', '<p><span style=\"color: rgb(101, 101, 101);\">Khyber Pakhtunkhwa Education Foundation Academy (KPEFA) Kohat, Khyber Pakhtunkhwa organized a one-day session on book reading, research skills, library registration, and operations in (KPEFA) on March 01, 2023. Almost 60 students and faculty member of Al-Haram Model College Kohat attended the session and get trained. The initiative was aimed at promoting a reading culture, enhancing research skills, and familiarizing the students with the library registration and operations. The Director KPEFA and Resource Person (Master Trainer HEC-Pakistan), Ms. Henna Karamat, conducted the session and engaged the students in hands-on activities. The Course Coordinator Mr. Yousuf Bilal facilitated the registration process for the students and faculty. Speaking on the occasion, the Director KPEFA, Ms. Henna Karamat highlighted the importance of reading and research skills in the 21st century. She emphasized that students who possess good reading and research skills are more likely to succeed in their academic and professional careers. She further added that KPEFA has been taking various initiatives to promote literacy and education among the youth and teachers of Khyber Pakhtunkhwa. Ms. Henna Karamat, the Resource Person, shared her expertise on book reading and research skills. She encouraged the students to develop a habit of reading and explained how research skills are crucial for academic and professional success. The session concluded with the registration of the students in the KPEFA library. The Course Coordinator Mr. Yousuf Bilal provided all the necessary facilitation to the students and faculty. KPEFA is dedicated to promoting education in Khyber Pakhtunkhwa. It has been taking various initiatives to improve the quality of education and promote literacy among the youth and teachers. The Academy offers various programs and services, including scholarships, teacher training, and educational resources. The one-day session organized by KPEFA and Al-Haram Model College is a step towards achieving the organization\'s goal of promoting education and literacy in the province. The initiative will help the students develop their reading and research skills, which are essential for academic and professional success in the 21st century.</span></p>', 'Kohat', '2023-03-01', NULL, NULL, 0, 0, 0, '2022-12-08 00:15:06', '2023-06-26 04:34:56', 'youth-affairs', 'http://www.youtube.com,\r\n\r\nhttp://www.youtube.com,\r\n\r\nhttp://www.youtube.com,\r\n\r\n\r\n\r\n,\r\n\r\n\r\n,\r\n\r\n,\r\n,'),
(41, 2, 'SPEAKER\'S PROGRAM SERIES ON ACADEMIA & INDUSTRY LINKAGES FOR C. BUILDING', '<p><span style=\"color: rgb(101, 101, 101);\">Former President Rawalpindi Chamber of Commerce and Industry (RCCI) Ch Nadeem A. Rauf honored KP Education Foundation Academy Kohat in a \"Speaker\'s Program\" series on \"Academia and Industry Linkages\" for the Capacity Building of the faculty and students. His mentoring session highlighted opportunities for the skilled graduates who have the right mindset as per the needs of the industry/market. He shared his vast experience about the recent trends in the market that needs to be incorporated in curriculum and syllabus. He also stressed that collaboration between industry and academia promote innovation and growth in technology. Industry partnerships are instrumental in advancing research and creating a skilled workforce. Participants were guided and invited to join the different initiatives of the business community. Director KP Education Foundation Academy Kohat, Ms. Henna Karamat announced different initiatives of the Foundation and Academy to uplift the standard of education through such networking opportunities, trainings and awareness programs.</span></p>', 'Rawalpindi', '2023-06-22', NULL, NULL, 0, 0, 0, '2023-06-26 06:03:53', '2023-06-26 06:03:53', 'youth-affairs', ''),
(42, 1, 'SPEAKER’S PROGRAM FOR THE CAPACITY BUILDING OF THE FACULTY & STUDENTS', '<p><span style=\"color: rgb(101, 101, 101);\">Khyber Pakhtunkhwa Education Foundation (KPEF) was established as a corporate body in 1992 under the Act-III of Provincial Assembly. The KPEF is entrusted for arranging the activities of educational societies and arrangements of seminars, symposia workshops and other such activities in the region. Khyber Pakhtunkhwa Education Foundation Academy (KPEFA) at Kohat is working under the ambit of KPEF which is the pioneer institute for training of teaching faculty and youth in the country. Ms. Henna Karamat Director KP Education Foundation Academy Kohat has initiated the “Speaker’s Program” for the Capacity Building of the faculty, students and staff of educational institutions to uplift the standard of education in the region. Main objective of the series of these mentorship programs is to bridge the gap between academia and industry in order to make the substantive changes into the existing educational system according to the needs of the 21st century. There is a dire need to introduce skill based education that prepares youth for the challenging market needs. Seventy (70) faculty members, students and staff of the Peshawar Model Schools and College Swabi- KP attended the mentorship session under the supervision of the Academic Directros/Principal Peshawar Model Schools and Colleges Ms. Nighat Mumtaz on December 1st 2022. Ms. Henna Karamat, Director Academy (Master Trainer HEC Pakistan) was the Resource Person. The Principal Ms. Nighat Mumtaz thanked the Director Academy for her initiative and mentoring the staff and students for the future course of action. The Principal also requested the Director Academy to arrange more sessions in collaboration for helping the private sector to find the solutions to the challenges in education and training.</span></p>', 'Kohat', '2022-12-01', NULL, NULL, 0, 0, 0, '2023-06-26 06:10:12', '2023-06-26 06:10:12', 'sports', ''),
(43, 1, 'KPEF & DOST SIGNED AN MOU ON 11TH OCTOBER 2022 AT THE LAUNCH OF KP SCIENCE AGENDA', '<p><span style=\"color: rgb(101, 101, 101);\">Khyber Pakhtunkhwa Education Foundation and Directorate of Science and Technology (DoST) signed an MoU on 11th October 2022 at the launch of KP Science Agenda in the presence of Honourable Minister for Science and Technology Mr. Atif Khan, Secretary Higher Education Mr. Dawood Khan, Managing Director Mr. Imad A. Lohani and Director Planning KPEF Ms. Henna Karamat. This collaboration is for the promotion of Science Communication and outreach in educational institutes.</span></p>', 'Khyber Pakhtunkhwa', '2022-10-11', NULL, NULL, 0, 0, 0, '2023-06-26 06:15:08', '2023-06-26 06:15:08', 'sports', ''),
(44, 1, 'KHYBER PAKHTUNKHWA EDUCATION FOUNDATION (KPEF) ORGANIZED A 2-DAY TRAINING ON', '<p><span style=\"color: rgb(101, 101, 101);\">Khyber Pakhtunkhwa Education Foundation (KPEF) organized a 2-Day Training on \"TechEducation\" and \"Women in STEM\" at Shaheed Benazir Bhutto Women University Peshawar for the 40 faculty members of public and private sector institutions. Honorable Minister for Higher Education Mr. Kamran Bangash, Secretary Higher Education Mr. Dawood Khan, Managing Director Mr. Imad A. Lohani distributed shields and certificates to the participants after the successful completion of the modules. Director Planning KPEF Ms. Henna Karamat was the organizer of the training and seminar. Trainers and Keynote speakers from the tech companies and Academia trained the participants about the 21st century\'s skills and best practices in technology and STEM education.</span></p>', 'Khyber Pakhtunkhwa', '2022-10-10', NULL, NULL, 0, 0, 0, '2023-06-26 06:51:23', '2023-06-26 06:51:23', 'sports', ''),
(45, 1, '02 DAYS NATIONAL CONFERENCE ON FUTURE OF HE IN PAKISTAN-- VISION 2032 & BEYOND.', '<p><span style=\"color: rgb(101, 101, 101);\">At the beginning of the event, Managing Director KPEF Emad Ali Lohani welcomed all the guests at the beginning of the two-day conference. He said the conference is aimed at to utilize the experiences of all the participants and academic specialists to share their respective experiences and give recommendations for the promotion and priorities of education in the country. Addressing the participants, MD KPEF Emad Ali Lohani said that the conference was being organized as per the instructions of Provincial Minister for Higher Education Kamran Bangash. Member Provincial Assembly and Parliamentary Secretary for Higher Education Ayesha Bano said that acquiring modern education is the need of the hour to deal with the tough future challenge. She said this while addressing a two-day National Education Conference organized by Khyber Pakhtunkhwa Education Foundation. The two-day conference was formally inaugurated by MPA and Parliamentary Secretary for Higher Education Ayesha Banawar and MD Khyber Pakhtunkhwa Education Foundation Emad Ali Lohani. Rasheed Khan Payenda Khel (Special Secretary for Higher Education), Prof. Talat Khurshid (Former Advisor HEC), Director Khyber Pakhtunkhwa Education Foundation Academy Syed Arif Shah, Director Planning, Zahid Hussain Saduzai, Kashif Irshad (Director Academic), Deputy Director Admin Shahid Gul, Director Finance Syed Wajid Hussain, Database Admin. Junaid Ahmad, Faisal Admin. Officer Faisal Nazir Awan &amp; other KPEF support staff besides university professors, doctors and a large number of students also participated. Emad Ali Lohani said that it is difficult to deal with the challenges in the field of education without acquiring modern education. In her address to the participants of the conference, Parliamentary Secretary for Higher Education Ayesha Bano paid tribute to the efforts of Khyber Pakhtunkhwa Education Foundation in holding such a vital National Education Conference. She wondered what new steps should be taken in the field of education in our country for the future so that the students of our country would be ready to meet not only national but also international challenges while meeting the requirements of modern education. She said that she was awaiting the recommendations of the conference so that they could be incorporated in the education policy which would benefit our future students. On this occasion, Prof. Dr. Zabata Khan in his address to the conference said that how can we meet the challenges that we are facing at the international level. MPA Madiha Nisar was also present and attended various groups formed differently by discussing in detailed ways and means for the betterment of not only the students but also to prepare them to attain much needed modern-day education so that they could deal with tough future challenges in an appropriate way.</span></p>', 'Khyber Pakhtunkhwa', '2023-06-12', NULL, NULL, 0, 0, 0, '2023-06-26 06:57:32', '2023-06-26 06:57:32', 'youth-affairs', ''),
(46, 1, 'FIRST EVER CENSUS REPORT ON PRIVATE COLLEGES & HIGHER EDUCATION 2017-18', '<p><span style=\"color: rgb(101, 101, 101);\">In order to identify areas of malfunctioning in the education system, the Foundation under clause “13 (2) (e) (ii)” has conducted the first ever census study in 14 districts of Khyber Pakhtunkhwa and issued the “report on Private Colleges and Higher Education 2017-18,” in October 2018. The report provides baseline data on infrastructure (including Library, Laboratory, and Furniture &amp; Fixture), human resources and facilities available in private colleges and Higher Education institutions. The report also provides data on programs and courses offered enrollment, teachers and staff qualifications, gender wise distribution of students, status of teachers training, security measures and others. Report invites researchers to assess the quality of education being imparted at Private Sector Colleges and Higher Education Institutions of districts Peshawar, Mardan, Swabi, Charsadda, Nowshera, Mansehra, Abbottabad, Haripur, Kohat, D.I.Khan, Bannu, Dir, Swat and Chitral.</span></p>', 'peshawar', '2018-10-10', NULL, NULL, 0, 0, 0, '2023-06-26 07:03:06', '2023-06-26 07:03:06', 'youth-affairs', ''),
(47, 1, '02 DAYS WORKSHOP ON “HIGHER EDUCATION: ACCESS & QUALITY” AT PESHAWAR', '<p><span style=\"color: rgb(101, 101, 101);\">March 1-2, 2017 Peshawar; The 02 days Workshop on “Higher Education: Access &amp; Quality” was attended by officers and officials from Higher Education Sector from different cities of Pakistan, Educationists from Private Sector, Faculty Members of prominent Public and Private Sector Educational Institutes of Khyber Pakhtunkhwa, Members of the Board of Directors of Frontier Education Foundation and representation from different walks of life and members of Civil Society.</span></p>', 'peshawar', '2017-02-01', NULL, NULL, 0, 0, 0, '2023-06-26 07:08:17', '2023-06-26 07:08:17', 'sports', ''),
(48, 1, 'FEF SCHOLARSHIP DISTRIBUTION CEREMONY WAS HELD AT PESHAWAR', '<p><span style=\"color: rgb(101, 101, 101);\">Frontier Education Foundation Scholarship Distribution Ceremony was held at Peshawar Services Club. The Special Assistant to Chief Minister for Higher Education Khyber Pakhtunkhwa, Mr. Mushtaq Ahmed Ghani was the Chief Guest. Secretary Higher Education Khyber Pakhtunkhwa, Mrs. Farah Hamid Khan was also invited. The Managing Director FEF Mr. Abdullah Khan Mahsud in his welcome note highlighted various steps taken by the Foundation with regard to providing services to the people in the field of education. He informed that the Foundation has established 16 Degree Colleges for Girls in various parts of the province. In some areas, the FEF College is the sole provider for Girls access to higher education. He further informed that the Foundation has granted scholarships worth Rs. 82.59 million amongst 4181 students through public and private sector educational institutions. He stated that FEF merit-cum-inaffordability Scholarship Program is focused on providing opportunities of access to Higher Education to the students belonging to less privileged and deprived income groups, who despite possessing academic merit, are unable to pursue their education due to financial constraints. He further informed that the FEF Board of Directors has selected 111 educational institutions of good repute working in Private, Semi Government and Government sector for this scheme. He thanked the Provincial Govt under the leadership of Honorable Chief Minister Khyber Pakhtunkhwa, Mr. Parvez Khattak and Special Assistant to Chief Minister for Higher Education, Mr. Mushtaq Ahmed Ghani for their timely guidance and support. The Chief Guest in his address highlighted various steps taken by the present Government for the promotion of Higher Education in Khyber Pakhtunkhwa. He stated that the Govt has committed to provide all financial help, which is a unique achievement. The Chief Guest appreciated the performance of Frontier Education Foundation and assured that grant in aid will be provided to the expansion of FEF Scholarship Scheme and for its colleges. Moreover the Chief Guest while appreciating the results of FEF Colleges, announced cash prize to students who excelled in inter and degree level examinations. At the end the Chief Guest and Managing Director FEF distributed Cheques amongst Heads of education institutions participated in the ceremony.</span></p>', 'peshawar', '2023-06-21', NULL, NULL, 0, 0, 0, '2023-06-26 07:11:52', '2023-06-26 07:11:52', 'youth-affairs', ''),
(49, 1, 'FEF ORGANIZED FIRST NATIONAL MEETING OF EDUCATION FOUNDATIONS', '<p><span style=\"color: rgb(101, 101, 101);\">FEF Organized first National meeting/workshop of public sector Education Foundationsand was held at Peshawar Services Club on 17th and 18th April 2013. Managing Directors/Deputy Managing Directors of the following Education Foundations participated in the meeting /workshop. 1. Punjab Education Foundation 2. National Education Foundation 3. Elementary Education Foundation 4. FATA Education Foundation 5. Education Employees Foundation The Managing Director FEF Mr. Abdullah Khan Mehsud in his welcome note highlighted various steps taken by the Foundation with regard to providing services to the people in the field of education. He informed that the Foundation has established 16 Degree Colleges for Girls in various parts of the province. In some areas, the FEF College alone provides the local Girls accessto college education. One by one all the participants presenting their educational foundations brief the functions and role of their foundations. On the last day of meeting/workshop Managing Director presented shields to the participants.</span></p>', 'peshawar', '2023-06-08', NULL, NULL, 0, 0, 0, '2023-06-26 07:14:09', '2023-06-26 07:14:09', 'youth-affairs', '');

-- --------------------------------------------------------

--
-- Table structure for table `event_links`
--

DROP TABLE IF EXISTS `event_links`;
CREATE TABLE IF NOT EXISTS `event_links` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` bigint UNSIGNED NOT NULL,
  `link` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_links_event_id_foreign` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_links`
--

INSERT INTO `event_links` (`id`, `event_id`, `link`, `created_at`, `updated_at`) VALUES
(1, 34, 'www.youtube.com', '2022-11-28 02:13:27', '2022-11-28 02:13:27'),
(2, 34, 'www.instagram.com', '2022-11-28 02:13:27', '2022-11-28 02:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `event_results`
--

DROP TABLE IF EXISTS `event_results`;
CREATE TABLE IF NOT EXISTS `event_results` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `district_id` bigint UNSIGNED NOT NULL,
  `competition_sub_category_id` bigint UNSIGNED NOT NULL,
  `level_id` bigint UNSIGNED NOT NULL,
  `result_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_results_district_id_foreign` (`district_id`),
  KEY `event_results_competition_sub_category_id_foreign` (`competition_sub_category_id`),
  KEY `event_results_level_id_foreign` (`level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_results`
--

INSERT INTO `event_results` (`id`, `district_id`, `competition_sub_category_id`, `level_id`, `result_status`, `created_at`, `updated_at`) VALUES
(1, 2, 9, 14, 0, '2022-12-02 01:28:37', '2022-12-02 01:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `per_month_edu_expenditure` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_monthly_income` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `accommodation_type` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `house_structure` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `house_status` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_rooms` int DEFAULT NULL,
  `home_size` int DEFAULT NULL,
  `covered_area` int DEFAULT NULL,
  `num_air_conditioners` int DEFAULT NULL,
  `num_servants` int DEFAULT NULL,
  `monthly_rent` int DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `other_house_owned` tinyint(1) DEFAULT NULL,
  `other_house_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `average_telephone_bill_six_months` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `average_electricity_bill_six_months` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `average_gas_bill_six_months` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `average_water_bill_six_months` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `average_mobile_bill_six_months` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `average_educational_expenditure_siblings` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `average_educational_expenditure_applicant` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `average_kitchen_expenditure` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `average_medical_expenditure` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accommodation_expenditure_case_rent` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `average_family_misc_expenditure` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_own_transport` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_own_cattle` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_assets_lease` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_first_semester_charges` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `KPEF_merit_Needsbased_scholarships_program` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statement_purpose` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expenses_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

DROP TABLE IF EXISTS `facilities`;
CREATE TABLE IF NOT EXISTS `facilities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `district_id` bigint UNSIGNED DEFAULT NULL,
  `facility` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `latitude` double(8,2) NOT NULL DEFAULT '0.00',
  `longitude` double(8,2) NOT NULL DEFAULT '0.00',
  `address` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `facilities_facility_unique` (`facility`),
  UNIQUE KEY `facilities_phone_unique` (`phone`),
  KEY `facilities_district_id_foreign` (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `district_id`, `facility`, `latitude`, `longitude`, `address`, `phone`, `type`, `is_deleted`, `created_at`, `updated_at`, `description`) VALUES
(7, 2, 'hostel facility 3', 34.05, 71.52, 'Peshawar', '0317 16706579', 'jawan marakiz', 0, '2022-09-27 02:37:27', '2022-12-08 04:47:07', NULL),
(8, 1, 'Hostel Facility', 34.05, 71.52, 'University Campus Peshawar', '0317 1670659', 'Youth Hostels', 0, '2022-09-28 01:16:06', '2022-09-28 01:16:06', NULL),
(9, 1, 'Jawan Markaz Facility 2', 34.05, 71.52, 'Peshawar', '03171670655', 'Jawan Marakiz', 0, '2022-09-28 23:49:59', '2022-09-28 23:49:59', NULL),
(10, 1, 'Test Facility12', 34.05, 71.52, 'Canal Town, University Campus Peshawar', '03101670650', 'youth hostels', 1, '2022-10-25 01:34:39', '2022-12-08 00:54:54', NULL),
(11, 1, 'New Test Facility', 23.00, 23.00, 'Hayatabad', '03171670600', 'Jawan Marakiz', 0, '2022-12-08 23:26:29', '2022-12-08 23:26:29', '<p>Test facility</p>');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family_infos`
--

DROP TABLE IF EXISTS `family_infos`;
CREATE TABLE IF NOT EXISTS `family_infos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `father_status` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_cnic` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_profession` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_earning` tinyint(1) DEFAULT NULL,
  `father_guardian` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `father_guardian_designation` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `financial_support` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_ntn_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_status` tinyint(1) DEFAULT NULL,
  `mother_profession` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional_status` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_marriage_relationship` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_family_members` int DEFAULT NULL,
  `dependent_family_members` int DEFAULT NULL,
  `total_earning_members` int DEFAULT NULL,
  `family_members_studying` int DEFAULT NULL,
  `num_of_brothers` int DEFAULT NULL,
  `num_of_sisters` int DEFAULT NULL,
  `family_income` bigint UNSIGNED DEFAULT NULL,
  `income_from_other_sources` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `family_infos_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `feedback_user_id` bigint UNSIGNED NOT NULL,
  `subject` varchar(8000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feedback_feedback_user_id_foreign` (`feedback_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `feedback_user_id`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(5, 3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry, has been the industry\'s                         standard dummy text ever since the 1500s', 'It is a long established fact that a reader will be It is a long established fact that a reader will\r\n                        be distracted by the readable content of a page when looking at its layout. distracted by the and\r\n                        readable content of a page when looking at its layout. It is a long established fact that a reader\r\n                        will be distracted by the readable content of a page when looking at its layout. It is a long the\r\n                        established fact that a reader will be distracted by the readable content of a page when looking at\r\n                        its layout.', '2023-01-09 23:59:38', '2023-01-09 23:59:38'),
(6, 3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry, has been the industry\'s                         standard dummy text ever since the 1500s.', 'It is a long established fact that a reader will be It is a long established fact that a reader will\r\n                        be distracted by the readable content of a page when looking at its layout. distracted by the and\r\n                        readable content of a page when looking at its layout. It is a long established fact that a reader\r\n                        will be distracted by the readable content of a page when looking at its layout. It is a long the\r\n                        established fact that a reader will be distracted by the readable content of a page when looking at\r\n                        its layout.', '2023-01-10 00:00:16', '2023-01-10 00:00:16'),
(7, 3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry, has been the industry\'s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry, has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry, has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry, has been the industry\'s standard dummy text ever since the 1500s', '2023-01-11 05:42:27', '2023-01-11 05:42:27'),
(8, 3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry, has been the industry\'s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry, has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry, has been the industry\'s standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry, has been the industry\'s standard dummy text ever since the 1500s', '2023-01-11 05:46:05', '2023-01-11 05:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_users`
--

DROP TABLE IF EXISTS `feedback_users`;
CREATE TABLE IF NOT EXISTS `feedback_users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `feedback_users_name_unique` (`name`),
  UNIQUE KEY `feedback_users_mobile_no_unique` (`mobile_no`),
  UNIQUE KEY `feedback_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback_users`
--

INSERT INTO `feedback_users` (`id`, `name`, `gender`, `mobile_no`, `email`, `password`, `created_at`, `updated_at`) VALUES
(3, 'Salman', 'Male', '03171679765', 'admin@admin.com', '$2y$10$BlueNMC0a2j1soinSTijhOb1CFDvarAeg5MtY.ZvhzoN6TFRatQtS', '2023-01-03 23:57:03', '2023-01-03 23:57:03');

-- --------------------------------------------------------

--
-- Table structure for table `f_a_q_s`
--

DROP TABLE IF EXISTS `f_a_q_s`;
CREATE TABLE IF NOT EXISTS `f_a_q_s` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `f_a_q_s`
--

INSERT INTO `f_a_q_s` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout', '2023-02-14 01:41:17', '2023-02-14 01:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `gallaries`
--

DROP TABLE IF EXISTS `gallaries`;
CREATE TABLE IF NOT EXISTS `gallaries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallaries`
--

INSERT INTO `gallaries` (`id`, `title`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'dfsaasd', '<p>dsafads</p>', 0, '2022-07-26 22:01:18', NULL, NULL),
(2, 'test', '<p>test</p>', 0, '2022-08-11 16:44:57', NULL, '2022-08-11 16:44:57'),
(3, 'ONE-DAY SESSION ON BOOK READING, RESEARCH SKILLS, LIBRARY REGISTRATION AND OPERATIONS', '<p>Gallery</p>', 1, NULL, '2022-08-11 16:40:23', '2023-07-07 00:33:33'),
(5, 'test', '<p>test</p>', 1, '2023-07-07 00:27:39', '2023-06-12 16:44:45', '2023-07-07 00:27:39'),
(6, 'KPEFA IN COLLABORATION WITH KIPS, ORGANIZED A ONE-DAY SESSION ON CAREER COUNSELING FOR THE STUDENTS OF FSC', '<p>Gallery</p>', 1, NULL, '2023-07-07 00:38:15', '2023-07-07 00:38:15'),
(7, 'KPEFA KOHAT INITIATED A PLANTATION DRIVE TO MARK THE BEGINNING OF SPRING', '<p>Gallery</p>', 1, NULL, '2023-07-07 00:39:29', '2023-07-07 00:39:29'),
(8, 'TRAINING/WORKSHOP ON “TEACHING & ADMINISTRATIVE LEADERSHIP SKILLS IN 21ST CENTURY”', '<p>Gallery</p>', 1, NULL, '2023-07-07 00:42:23', '2023-07-07 00:42:23'),
(9, 'MEETING OF THE PRINCIPALS, STUDENT AFFAIR OFFICERS & CEOS OF THE E. INSTITUTIONS', '<p>Gallery</p>', 1, NULL, '2023-07-07 00:44:15', '2023-07-07 00:44:15'),
(10, 'MEETING OF THE PRINCIPALS, STUDENT AFFAIR OFFICERS & CEOS OF THE E. INSTITUTIONS', '<p>Gallery</p>', 1, NULL, '2023-07-07 00:44:15', '2023-07-07 00:44:15'),
(11, 'SPEAKER\'S PROGRAM SERIES ON ACADEMIA & INDUSTRY LINKAGES FOR C. BUILDING', '<p>Gallery</p>', 1, NULL, '2023-07-07 00:45:43', '2023-07-07 00:45:43'),
(12, 'SPEAKER’S PROGRAM FOR THE CAPACITY BUILDING OF THE FACULTY & STUDENTS', '<p>Gallery</p>', 1, NULL, '2023-07-07 00:47:54', '2023-07-07 00:47:54'),
(13, 'KPEF & DOST SIGNED AN MOU ON 11TH OCTOBER 2022 AT THE LAUNCH OF KP SCIENCE AGENDA', '<p>Gallery</p>', 1, NULL, '2023-07-07 00:49:17', '2023-07-07 00:49:17'),
(14, 'KHYBER PAKHTUNKHWA EDUCATION FOUNDATION (KPEF) ORGANIZED A 2-DAY TRAINING ON', '<p>Gallery</p>', 1, NULL, '2023-07-07 00:51:09', '2023-07-07 00:51:09'),
(15, '02 DAYS NATIONAL CONFERENCE ON FUTURE OF HE IN PAKISTAN-- VISION 2032 & BEYOND.', '<p>Gallery	</p>', 1, NULL, '2023-07-07 00:53:01', '2023-07-07 00:53:01'),
(16, 'FIRST EVER CENSUS REPORT ON PRIVATE COLLEGES & HIGHER EDUCATION 2017-18', '<p>Gallery</p>', 1, NULL, '2023-07-07 00:55:01', '2023-07-07 00:55:01'),
(17, '02 DAYS WORKSHOP ON “HIGHER EDUCATION: ACCESS & QUALITY” AT PESHAWAR', '<p>Gallery</p>', 1, NULL, '2023-07-07 00:56:36', '2023-07-07 00:56:36'),
(18, 'FEF ORGANIZED FIRST NATIONAL MEETING OF EDUCATION FOUNDATIONS', '<p>Gallery</p>', 1, NULL, '2023-07-07 00:57:56', '2023-07-07 00:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

DROP TABLE IF EXISTS `hospitals`;
CREATE TABLE IF NOT EXISTS `hospitals` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `number_of_hospital` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `link` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lat` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lng` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `district_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hospitals_category_id_foreign` (`category_id`),
  KEY `hospitals_district_id_foreign` (`district_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `category`, `number_of_hospital`, `link`, `deleted_at`, `created_at`, `updated_at`, `status`, `category_id`, `name`, `lat`, `lng`, `slug`, `phone`, `email`, `address`, `district_id`) VALUES
(7, NULL, NULL, NULL, NULL, '2022-08-09 21:51:53', '2022-08-10 18:53:08', 1, 4, 'Kth Hospital', '33.9973067941825', '71.48588283863845', 'kth-hospital', '0919224400', 'kth@kth.com', 'University Rd, Rahat Abad, Peshawar, Khyber', 2);

-- --------------------------------------------------------

--
-- Table structure for table `levels_or_stages`
--

DROP TABLE IF EXISTS `levels_or_stages`;
CREATE TABLE IF NOT EXISTS `levels_or_stages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `competition_sub_category_id` bigint UNSIGNED NOT NULL,
  `title` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `initial` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `levels_or_stages_competition_sub_category_id_foreign` (`competition_sub_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `levels_or_stages`
--

INSERT INTO `levels_or_stages` (`id`, `competition_sub_category_id`, `title`, `status`, `initial`, `created_at`, `updated_at`) VALUES
(2, 10, 'Initial', 1, 1, '2022-11-17 04:18:05', '2022-11-22 04:22:53'),
(3, 10, 'second level', 1, 2, '2022-11-17 23:44:06', '2022-11-17 23:44:06'),
(4, 10, 'Third', 1, 3, '2022-11-17 23:47:54', '2022-11-17 23:47:54'),
(5, 11, 'Initial', 1, 1, '2022-11-20 05:03:00', '2022-11-20 05:03:00'),
(6, 12, 'Initial', 1, 1, '2022-11-20 05:03:25', '2022-11-20 05:03:25'),
(7, 13, 'Initial', 1, 1, '2022-11-21 01:32:44', '2022-11-21 01:32:44'),
(8, 14, 'Initial', 1, 1, '2022-11-21 01:39:24', '2022-11-21 01:39:24'),
(9, 15, 'Initial', 1, 1, '2022-11-21 01:39:42', '2022-11-21 01:39:42'),
(10, 16, 'Initial', 1, 1, '2022-11-21 01:40:18', '2022-11-21 01:40:18'),
(11, 17, 'Initial', 0, 1, '2022-11-21 01:40:58', '2022-11-25 02:01:35'),
(12, 18, 'Initial', 1, 1, '2022-11-21 01:41:18', '2022-11-21 01:41:18'),
(13, 19, 'Initial', 1, 1, '2022-11-21 01:41:35', '2022-11-21 01:41:35'),
(14, 9, 'Test Level', 1, 1, '2022-11-21 04:59:43', '2022-11-21 04:59:43'),
(15, 17, 'New Test Level', 1, 2, '2022-11-25 01:41:27', '2022-11-25 01:41:27'),
(17, 9, '1', 1, 2, '2022-12-02 01:28:37', '2022-12-02 01:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category_id` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `link` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `title`, `category_id`, `type`, `link`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Home', NULL, 'quick', '/', 1, NULL, '2022-08-10 17:16:39', '2022-08-10 17:18:20'),
(2, 'Team', NULL, 'quick', 'teams', 1, NULL, '2022-08-10 17:20:02', '2022-08-10 17:20:02'),
(3, 'News', NULL, 'quick', 'news', 1, NULL, '2022-08-10 17:20:19', '2022-08-10 17:20:19'),
(5, 'About', NULL, 'quick', NULL, 1, NULL, '2022-08-10 17:20:52', '2022-08-10 17:20:52'),
(6, 'Home', NULL, 'important', NULL, 1, NULL, '2022-08-10 17:21:07', '2022-08-10 17:21:20'),
(7, 'Why Choose', NULL, 'important', NULL, 1, '2023-07-17 00:52:18', '2022-08-10 17:21:29', '2023-07-17 00:52:18'),
(8, 'Why Us?', NULL, 'important', NULL, 1, '2023-07-17 00:52:35', '2022-08-10 17:21:42', '2023-07-17 00:52:35'),
(9, 'Clients', NULL, 'important', NULL, 1, '2023-07-17 00:52:28', '2022-08-10 17:21:53', '2023-07-17 00:52:28'),
(10, 'Home', NULL, 'footer', NULL, 1, NULL, '2022-08-10 19:10:17', '2022-08-10 19:10:17'),
(11, 'About', NULL, 'footer', NULL, 1, NULL, '2022-08-10 19:10:30', '2022-08-10 19:10:30'),
(12, 'News', NULL, 'footer', NULL, 1, NULL, '2022-08-10 19:10:45', '2022-08-10 19:10:45'),
(13, 'Downloads', NULL, 'footer', NULL, 1, NULL, '2022-08-10 19:11:03', '2022-08-10 19:11:03'),
(14, NULL, NULL, 'quick', NULL, 0, '2022-08-12 03:48:58', '2022-08-12 03:48:53', '2022-08-12 03:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `model_type` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `collection_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `file_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mime_type` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `disk` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `conversions_disk` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=730 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(2, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 2, '858e8805-8a08-470f-8180-ba0ef90ffb2f', 'logo', 'med3969', '1658127095.png', 'image/png', 'media', 'media', 386659, '[]', '{\"type\": \"image\", \"ratio\": \"1\", \"width\": 800, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 2, '2022-07-17 20:51:35', '2022-07-17 20:51:40'),
(5, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 5, '32f93ed8-2ec1-47eb-ad21-a92d99980f13', 'logo', 'medA067', '1658131119.png', 'image/png', 'media', 'media', 31788, '[]', '{\"type\": \"image\", \"ratio\": \"4.196\", \"width\": 428, \"height\": 102, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 3, '2022-07-17 21:58:40', '2022-07-17 21:58:44'),
(9, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 9, '6ddac074-f419-4ce3-b1a7-730fdfbc11a7', 'slide', 'medE324', '1658205979.png', 'image/png', 'media', 'media', 1367709, '[]', '{\"type\": \"image\", \"ratio\": \"0.75\", \"width\": 900, \"height\": 1200, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 4, '2022-07-18 18:46:19', '2022-07-18 18:46:23'),
(12, 'App\\Models\\Download', 1, 'db42ffa7-e015-4ed9-9726-6b0aeb2f1bf8', 'download', 'med24B4', '1658286867.png', 'image/png', 'media', 'media', 808010, '[]', '{\"type\": \"image\", \"ratio\": \"1\", \"width\": 800, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 5, '2022-07-19 17:14:27', '2022-07-19 17:14:50'),
(13, 'App\\Models\\Download', 1, '86b65b61-0430-4487-a48c-261f4c64f92c', 'download', 'med3478', '1658286871.png', 'image/png', 'media', 'media', 386659, '[]', '{\"type\": \"image\", \"ratio\": \"1\", \"width\": 800, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 6, '2022-07-19 17:14:31', '2022-07-19 17:14:50'),
(15, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 15, '47d88d5c-0c1e-404b-86de-3d920c116e02', 'download', 'Link', 'link.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'media', 'media', 55762, '[]', '{\"type\": \"document\", \"status\": \"processing\", \"progress\": 100}', '[]', '[]', 7, '2022-07-19 17:17:56', '2022-07-19 17:17:56'),
(16, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 16, '37c79aaa-dea8-4505-bd75-2e21da093f25', 'slide', 'med269C', '1658292569.png', 'image/png', 'media', 'media', 1367709, '[]', '{\"type\": \"image\", \"ratio\": \"0.75\", \"width\": 900, \"height\": 1200, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 8, '2022-07-19 18:49:29', '2022-07-19 18:49:32'),
(22, 'App\\Models\\Download', 3, '6e9f37e7-2637-4836-90d4-b81af53de4ec', 'team', 'medD712', '1658295760.png', 'image/png', 'media', 'media', 1367709, '[]', '{\"type\": \"image\", \"ratio\": \"0.75\", \"width\": 900, \"height\": 1200, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 9, '2022-07-19 19:42:40', '2022-07-19 19:42:47'),
(23, 'App\\Models\\Team', 1, '72238d2d-6b41-4d0d-8a2d-7551a75e5cc7', 'team', 'med696F', '1658295863.png', 'image/png', 'media', 'media', 1367709, '[]', '{\"type\": \"image\", \"ratio\": \"0.75\", \"width\": 900, \"height\": 1200, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 10, '2022-07-19 19:44:23', '2022-07-19 19:44:27'),
(25, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 25, '2533e4ca-77d8-457c-8f18-6ab065b309bf', 'download', '26-06-2022 pre medical', '26-06-2022-pre-medica.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'media', 'media', 2082583, '[]', '{\"type\": \"document\", \"status\": \"processing\", \"progress\": 100}', '[]', '[]', 11, '2022-07-19 21:30:30', '2022-07-19 21:30:30'),
(31, 'App\\Models\\Slide', 7, 'b8c5da59-e842-4f9b-8a88-a310eda4ab75', 'slide', 'medE883', '1658716964.png', 'image/png', 'media', 'media', 835589, '[]', '{\"type\": \"image\", \"ratio\": \"1.304\", \"width\": 1038, \"height\": 796, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-24 16:42:44', '2022-07-24 16:44:19'),
(33, 'App\\Models\\Team', 3, 'c12f2ea7-88de-4c5b-8976-1f409564b2c8', 'team', 'med1007', '1658726739.png', 'image/png', 'media', 'media', 56055, '[]', '{\"type\": \"image\", \"ratio\": \"0.946\", \"width\": 192, \"height\": 203, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-24 19:25:40', '2022-07-24 19:25:46'),
(34, 'App\\Models\\Team', 4, '185d645d-d903-4741-8ae7-8771de33c78f', 'team', 'medF8CF', '1658727323.png', 'image/png', 'media', 'media', 74360, '[]', '{\"type\": \"image\", \"ratio\": \"0.946\", \"width\": 192, \"height\": 203, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-24 19:35:23', '2022-07-24 19:35:29'),
(35, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 35, '0fcc827a-2130-4115-8340-acb33fc14b84', 'hospital', 'medC2E2', '1658824490.png', 'image/png', 'media', 'media', 240074, '[]', '{\"type\": \"image\", \"ratio\": \"2.048\", \"width\": 1024, \"height\": 500, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-25 22:34:52', '2022-07-25 22:35:03'),
(36, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 36, '0b73de56-cfca-45ca-9b4b-4d8cab078976', 'hospital', 'med3A73', '1658824586.png', 'image/png', 'media', 'media', 149171, '[]', '{\"type\": \"image\", \"ratio\": \"0.473\", \"width\": 568, \"height\": 1200, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-25 22:36:26', '2022-07-25 22:36:29'),
(37, 'App\\Models\\Hospital', 1, '5198f119-7528-4530-ac41-133f1ec42421', 'hospital', 'med1AC8', '1658829362.png', 'image/png', 'media', 'media', 75211, '[]', '{\"type\": \"image\", \"ratio\": \"1\", \"width\": 240, \"height\": 240, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-25 23:56:02', '2022-07-25 23:59:06'),
(38, 'App\\Models\\Hospital', 2, 'dbafb885-a225-4d53-9ba2-3e0a783f25fc', 'hospital', 'medBEA9', '1658830125.png', 'image/png', 'media', 'media', 75211, '[]', '{\"type\": \"image\", \"ratio\": \"1\", \"width\": 240, \"height\": 240, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-26 00:08:45', '2022-07-26 00:08:49'),
(39, 'App\\Models\\Team', 5, 'b41b44d5-8294-4026-97ea-649e9f9ab039', 'project', 'med4DD7', '1658831341.png', 'image/png', 'media', 'media', 48313, '[]', '{\"type\": \"image\", \"ratio\": \"1.182\", \"width\": 800, \"height\": 677, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-26 00:29:01', '2022-07-26 00:29:06'),
(40, 'App\\Models\\Project', 1, '7cc5eda7-6531-4835-b746-e678fd7121f9', 'project', 'medF5E5', '1658831581.png', 'image/png', 'media', 'media', 48313, '[]', '{\"type\": \"image\", \"ratio\": \"1.182\", \"width\": 800, \"height\": 677, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-26 00:33:01', '2022-07-26 00:33:54'),
(41, 'App\\Models\\News', 1, 'f51248c3-2a51-452c-a8b3-08496bef11ee', 'news', 'med6210', '1658906450.png', 'image/png', 'media', 'media', 933874, '[]', '{\"type\": \"image\", \"ratio\": \"0.8\", \"width\": 640, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-26 21:20:50', '2022-07-26 21:20:57'),
(42, 'App\\Models\\Gallary', 1, '19e370e7-d520-42b0-b38a-8059e33b8bda', 'gallary', 'medF586', '1658908716.png', 'image/png', 'media', 'media', 933874, '[]', '{\"type\": \"image\", \"ratio\": \"0.8\", \"width\": 640, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true, \"gallary\": true}', '[]', 1, '2022-07-26 21:58:36', '2022-07-26 21:58:41'),
(44, 'App\\Models\\Slide', 8, 'fd382b50-7af9-4a5b-8dcf-e83e3e25ef40', 'slide', 'med3CC8', '1659330727.png', 'image/png', 'media', 'media', 149325, '[]', '{\"type\": \"image\", \"ratio\": \"2.028\", \"width\": 937, \"height\": 462, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-31 19:12:07', '2022-07-31 19:12:12'),
(45, 'App\\Models\\Slide', 1, 'bfc3f07a-ecbd-4e60-895a-09e530a7ab21', 'slide', 'medF40', '1659335303.png', 'image/png', 'media', 'media', 835589, '[]', '{\"type\": \"image\", \"ratio\": \"1.304\", \"width\": 1038, \"height\": 796, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-07-31 20:28:23', '2022-07-31 20:28:28'),
(46, 'App\\Models\\Slide', 2, 'c0f9e36f-f3f3-4e1b-bf38-0ef449c952e7', 'slide', 'medD7AA', '1659408034.png', 'image/png', 'media', 'media', 1307362, '[]', '{\"type\": \"image\", \"ratio\": \"1.78\", \"width\": 1200, \"height\": 674, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-01 16:40:34', '2022-08-01 16:44:11'),
(47, 'App\\Models\\Slide', 3, '9a58c618-4b94-428f-9c82-ffe05cbda702', 'slide', 'medABE1', '1659408809.png', 'image/png', 'media', 'media', 1443436, '[]', '{\"type\": \"image\", \"ratio\": \"1.6\", \"width\": 1200, \"height\": 750, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-01 16:53:29', '2022-08-01 16:54:08'),
(48, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 48, '2003a709-f1a9-4243-99e6-c11d51ecb65d', 'icon', 'medCF7B', '1659410981.png', 'image/png', 'media', 'media', 1303, '[]', '{\"type\": \"image\", \"ratio\": \"0.909\", \"width\": 30, \"height\": 33, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-01 17:29:41', '2022-08-01 17:29:43'),
(49, 'App\\Models\\News', 3, 'ccfea442-ebac-4b54-8053-92c93d8eab26', 'news', 'med20D', '1659438579.png', 'image/png', 'media', 'media', 165127, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-02 01:09:40', '2022-08-02 01:09:45'),
(50, 'App\\Models\\News', 4, 'be2eb105-3baa-4def-b4ef-71452b7a876e', 'news', 'medC542', '1659438629.png', 'image/png', 'media', 'media', 437493, '[]', '{\"type\": \"image\", \"ratio\": \"0.846\", \"width\": 427, \"height\": 505, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-02 01:10:29', '2022-08-02 01:10:33'),
(51, 'App\\Models\\News', 5, 'ffb4e658-8139-4360-97c9-cda168929878', 'news', 'med9B54', '1659438684.png', 'image/png', 'media', 'media', 153734, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-02 01:11:24', '2022-08-02 01:11:30'),
(59, 'App\\Models\\Team', 6, '3fb7fb4d-44cb-4e1f-974d-53f9b0569370', 'team', 'med1055', '1659523423.png', 'image/png', 'media', 'media', 57188, '[]', '{\"type\": \"image\", \"ratio\": \"0.834\", \"width\": 171, \"height\": 205, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-03 00:43:43', '2022-08-03 00:43:47'),
(67, 'App\\Models\\Project', 4, 'bfd4bedd-68e3-4f51-8772-abe319a652bd', 'project', 'med6DA2', '1659695680.png', 'image/png', 'media', 'media', 335764, '[]', '{\"type\": \"image\", \"ratio\": \"0.666\", \"width\": 533, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-05 00:34:40', '2022-08-05 00:35:20'),
(68, 'App\\Models\\Project', 4, 'd2b001a0-5b8d-408d-ab4e-7949dba7d04e', 'icon', 'medF9F9', '1659695716.png', 'image/png', 'media', 'media', 1303, '[]', '{\"type\": \"image\", \"ratio\": \"0.909\", \"width\": 30, \"height\": 33, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-05 00:35:16', '2022-08-05 00:35:20'),
(71, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 71, 'b4c21467-23fa-44c7-8800-865edaeca66c', 'banner', 'medA7FE', '1660037138.png', 'image/png', 'media', 'media', 1269203, '[]', '{\"type\": \"image\", \"ratio\": \"1.504\", \"width\": 1200, \"height\": 798, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-08 23:25:38', '2022-08-08 23:25:40'),
(73, 'App\\Models\\Project', 2, 'a1145a1d-27f4-49df-8b16-ad438992ed1d', 'project', 'med2BD6', '1660046281.png', 'image/png', 'media', 'media', 335764, '[]', '{\"type\": \"image\", \"ratio\": \"0.666\", \"width\": 533, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-09 01:58:02', '2022-08-09 01:58:10'),
(74, 'App\\Models\\Project', 3, '25411e0a-98ea-49cf-aafd-a292591ca9dd', 'project', 'med95EF', '1660046308.png', 'image/png', 'media', 'media', 335764, '[]', '{\"type\": \"image\", \"ratio\": \"0.666\", \"width\": 533, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-09 01:58:28', '2022-08-09 01:58:34'),
(75, 'App\\Models\\Project', 5, '9218baa4-63cd-4946-bb45-13c5bd41097c', 'project', 'medDFFD', '1660046327.png', 'image/png', 'media', 'media', 335764, '[]', '{\"type\": \"image\", \"ratio\": \"0.666\", \"width\": 533, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-09 01:58:47', '2022-08-09 01:58:51'),
(77, 'App\\Models\\Project', 7, '3b111e51-ec3d-431b-81af-a71251c727c3', 'project', 'medD880', '1660046391.png', 'image/png', 'media', 'media', 335764, '[]', '{\"type\": \"image\", \"ratio\": \"0.666\", \"width\": 533, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-09 01:59:51', '2022-08-09 02:00:01'),
(78, 'App\\Models\\Achievement', 1, '087e248e-c273-416e-b601-f3cbd22df265', 'achievement', 'medDA01', '1660049995.png', 'image/png', 'media', 'media', 153734, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-09 02:59:55', '2022-08-09 03:00:01'),
(79, 'App\\Models\\Achievement', 2, '7479e5d9-f087-42c0-882c-ccd0852f6bb8', 'achievement', 'med2717', '1660050081.png', 'image/png', 'media', 'media', 437493, '[]', '{\"type\": \"image\", \"ratio\": \"0.846\", \"width\": 427, \"height\": 505, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-09 03:01:21', '2022-08-09 03:01:26'),
(80, 'App\\Models\\Achievement', 3, '94570e24-6f72-47ac-8311-bfe50dff6aa9', 'achievement', 'medA083', '1660050112.png', 'image/png', 'media', 'media', 308403, '[]', '{\"type\": \"image\", \"ratio\": \"0.902\", \"width\": 396, \"height\": 439, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-09 03:01:52', '2022-08-09 03:01:56'),
(83, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 83, 'abdfaa10-1a15-4a71-aaf2-7cf14b79d4ec', 'banner', 'med2A17', '1660115749.png', 'image/png', 'media', 'media', 1269203, '[]', '{\"type\": \"image\", \"ratio\": \"1.504\", \"width\": 1200, \"height\": 798, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-09 21:15:49', '2022-08-09 21:15:51'),
(84, 'App\\Models\\Page', 6, 'e100d503-edd9-48a2-83ba-b6ba41229025', 'banner', 'med80D8', '1660115967.png', 'image/png', 'media', 'media', 1269203, '[]', '{\"type\": \"image\", \"ratio\": \"1.504\", \"width\": 1200, \"height\": 798, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-09 21:19:27', '2022-08-09 21:21:00'),
(85, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 85, 'ec72a440-1b63-405c-b320-6f1422eecff3', 'hospital', 'med71D6', '1660117733.png', 'image/png', 'media', 'media', 206019, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-09 21:48:53', '2022-08-09 21:48:55'),
(86, 'App\\Models\\Hospital', 7, '45bca256-7874-47fc-8575-c5b22b2cd180', 'hospital', 'med9373', '1660117873.png', 'image/png', 'media', 'media', 206019, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-09 21:51:13', '2022-08-09 21:51:53'),
(87, 'App\\Models\\Page', 7, '00edff6f-422e-4af9-bf09-652b2b571c7b', 'banner', 'med672D', '1660145190.png', 'image/png', 'media', 'media', 1307362, '[]', '{\"type\": \"image\", \"ratio\": \"1.78\", \"width\": 1200, \"height\": 674, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-10 05:26:30', '2022-08-10 05:26:37'),
(91, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 91, '81d01f6d-2bae-4917-873a-155d13fa9ffd', 'banner', 'med30B7', '1660198260.png', 'image/png', 'media', 'media', 1443436, '[]', '{\"type\": \"image\", \"ratio\": \"1.6\", \"width\": 1200, \"height\": 750, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-10 20:11:00', '2022-08-10 20:11:03'),
(92, 'App\\Models\\Page', 11, '9fdbc85f-85f9-4613-b857-51eb27ea5e25', 'banner', 'medD729', '1660198368.png', 'image/png', 'media', 'media', 1443436, '[]', '{\"type\": \"image\", \"ratio\": \"1.6\", \"width\": 1200, \"height\": 750, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-10 20:12:48', '2022-08-10 20:12:52'),
(93, 'App\\Models\\Download', 4, '9b6d9e7b-82a9-47da-ae50-d73db9fdd5f3', 'download', 'Try file', 'try-file.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'media', 'media', 30041, '[]', '{\"type\": \"document\", \"status\": \"processing\", \"progress\": 100}', '[]', '[]', 1, '2022-08-10 23:56:58', '2022-08-10 23:57:01'),
(96, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 96, '552f9fe4-5566-482a-a12c-76b47ddbdd8e', 'gallary', 'med58A8', '1660271277.png', 'image/png', 'media', 'media', 560893, '[]', '{\"type\": \"image\", \"ratio\": \"1.501\", \"width\": 800, \"height\": 533, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 16:27:58', '2022-08-11 16:28:01'),
(97, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 97, '67913d99-2b8e-42fc-8f2f-bc5fa9f6945c', 'gallary', 'med6DAC', '1660271283.png', 'image/png', 'media', 'media', 165127, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 16:28:03', '2022-08-11 16:28:05'),
(98, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 98, '44b8761d-0bef-43d3-a478-c924d1a170f5', 'gallary', 'med7BBB', '1660271286.png', 'image/png', 'media', 'media', 153734, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 16:28:06', '2022-08-11 16:28:09'),
(99, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 99, '5f2232f1-0f76-4b0f-9bfa-0e299c6ede40', 'gallary', 'med898B', '1660271290.png', 'image/png', 'media', 'media', 616992, '[]', '{\"type\": \"image\", \"ratio\": \"1.501\", \"width\": 800, \"height\": 533, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 16:28:10', '2022-08-11 16:28:12'),
(100, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 100, '28745907-0de0-4813-8c9d-37542bc72126', 'gallary', 'med9817', '1660271294.png', 'image/png', 'media', 'media', 679069, '[]', '{\"type\": \"image\", \"ratio\": \"1.6\", \"width\": 800, \"height\": 500, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 16:28:14', '2022-08-11 16:28:16'),
(101, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 101, 'be301165-cab8-4415-862d-601514dbba17', 'gallary', 'med4832', '1660271339.png', 'image/png', 'media', 'media', 616992, '[]', '{\"type\": \"image\", \"ratio\": \"1.501\", \"width\": 800, \"height\": 533, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 16:28:59', '2022-08-11 16:29:01'),
(102, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 102, '9728aef2-e95d-4352-84e8-b12a9cef250e', 'gallary', 'med7994', '1660271613.png', 'image/png', 'media', 'media', 165127, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 16:33:33', '2022-08-11 16:33:36'),
(103, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 103, '896bc475-55ae-4662-9af4-806679b964f2', 'gallary', 'med8745', '1660271617.png', 'image/png', 'media', 'media', 153734, '[]', '{\"type\": \"image\", \"ratio\": \"1.352\", \"width\": 365, \"height\": 270, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 16:33:37', '2022-08-11 16:33:39'),
(104, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 104, 'a8f364a1-2e7f-48c9-be8a-f28261686780', 'gallary', 'med9564', '1660271621.png', 'image/png', 'media', 'media', 616992, '[]', '{\"type\": \"image\", \"ratio\": \"1.501\", \"width\": 800, \"height\": 533, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 16:33:41', '2022-08-11 16:33:43'),
(105, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 105, '3da6bd1a-6343-401d-bdf3-7cb3ecc00003', 'gallary', 'medA40F', '1660271624.png', 'image/png', 'media', 'media', 679069, '[]', '{\"type\": \"image\", \"ratio\": \"1.6\", \"width\": 800, \"height\": 500, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 16:33:44', '2022-08-11 16:33:47'),
(106, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 106, '42ab9d22-b9ae-4dc5-80fa-53765a23abee', 'gallary', 'medDBA5', '1660271770.png', 'image/png', 'media', 'media', 616992, '[]', '{\"type\": \"image\", \"ratio\": \"1.501\", \"width\": 800, \"height\": 533, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 16:36:10', '2022-08-11 16:36:12'),
(107, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 107, 'da7c2870-9f15-4027-bfe3-e06934660999', 'gallary', 'med875B', '1660271814.png', 'image/png', 'media', 'media', 643529, '[]', '{\"type\": \"image\", \"ratio\": \"1.782\", \"width\": 800, \"height\": 449, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 16:36:54', '2022-08-11 16:36:56'),
(108, 'App\\Models\\Project', 6, '1f0a40b6-c564-4c5b-a813-83019e174f0b', 'project', 'med3CC5', '1660271860.png', 'image/png', 'media', 'media', 308403, '[]', '{\"type\": \"image\", \"ratio\": \"0.902\", \"width\": 396, \"height\": 439, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 16:37:40', '2022-08-11 16:37:44'),
(109, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 109, '86d4cd5e-a85a-40cd-95c1-363a6de64e5b', 'gallary', 'med8A6', '1660271912.png', 'image/png', 'media', 'media', 55444, '[]', '{\"type\": \"image\", \"ratio\": \"0.829\", \"width\": 170, \"height\": 205, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 16:38:32', '2022-08-11 16:38:34'),
(111, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 111, '7e52d203-dcf6-4489-8a02-0533aa46cc16', 'gallary', 'medC2D', '1660272110.png', 'image/png', 'media', 'media', 643529, '[]', '{\"type\": \"image\", \"ratio\": \"1.782\", \"width\": 800, \"height\": 449, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-11 16:41:50', '2022-08-11 16:41:52'),
(118, 'App\\Models\\Page', 15, '87d475f5-9551-4dca-98ad-a592a9688c27', 'banner', 'medFAAC', '1660288686.png', 'image/png', 'media', 'media', 1229376, '[]', '{\"type\": \"image\", \"ratio\": \"1.5\", \"width\": 1200, \"height\": 800, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true}', '[]', 1, '2022-08-12 02:18:06', '2022-08-12 02:18:13'),
(123, 'App\\Models\\Team', 7, '7789540b-c9d4-498a-8c03-761f5b7a5ed8', 'team', 'med2928', '1660453684.png', 'image/png', 'media', 'media', 80028, '[]', '{\"type\": \"image\", \"ratio\": \"0.831\", \"width\": 182, \"height\": 219, \"status\": \"processing\", \"progress\": 100}', '{\"large\": true, \"small\": true, \"thumb\": true, \"medium\": true, \"resize\": true}', '[]', 1, '2022-08-14 00:08:04', '2022-08-14 00:08:09'),
(124, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 124, 'c6db16e8-ceca-43e1-b80a-4c96cd49e952', 'slide', 'medA127', '1660904638.png', 'image/png', 'media', 'media', 1774178, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":900,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-19 05:24:02', '2022-08-19 05:24:10'),
(125, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 125, 'f2d2625e-80c2-4102-b901-0c312671dd6e', 'slide', 'medA653', '1660904771.png', 'image/png', 'media', 'media', 1774178, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":900,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-19 05:26:11', '2022-08-19 05:26:14'),
(126, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 126, 'd263bc2e-c967-4d51-a261-a88d304d5939', 'slide', 'med9074', '1660904896.png', 'image/png', 'media', 'media', 1774178, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":900,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-19 05:28:16', '2022-08-19 05:28:20'),
(129, 'App\\Models\\Slide', 7, '1ac1354d-6b08-4289-a183-ecce7bff0227', 'slide', 'med1EB6', '1660905195.png', 'image/png', 'media', 'media', 1774178, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":900,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-19 05:33:15', '2022-08-19 05:33:23'),
(130, 'App\\Models\\Slide', 8, 'ea203293-113b-4930-92a1-dc1143fadfbd', 'slide', 'medAB5B', '1660905231.png', 'image/png', 'media', 'media', 691023, '[]', '{\"type\":\"image\",\"width\":1032,\"height\":477,\"ratio\":\"2.164\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-19 05:33:51', '2022-08-19 05:33:59'),
(133, 'App\\Models\\Slide', 10, '80285de7-8099-4a53-a087-54ab9c6b4b39', 'slide', 'medD797', '1660905504.png', 'image/png', 'media', 'media', 1653569, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":799,\"ratio\":\"1.502\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-19 05:38:24', '2022-08-19 05:38:29'),
(134, 'App\\Models\\Slide', 11, 'c4240660-512b-4927-a5b9-e7b02a65f457', 'slide', 'med3E31', '1660905596.png', 'image/png', 'media', 'media', 1039769, '[]', '{\"type\":\"image\",\"width\":960,\"height\":640,\"ratio\":\"1.5\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-19 05:39:56', '2022-08-19 05:40:05'),
(140, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 140, '997495a1-90f7-40d2-80db-b8ec206386f1', 'news', 'med453F', '1660907236.png', 'image/png', 'media', 'media', 796692, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-19 06:07:16', '2022-08-19 06:07:18'),
(141, 'App\\Models\\News', 8, '1d22358d-cb45-4d3a-b37c-898e79a20b24', 'news', 'med55FF', '1660907437.png', 'image/png', 'media', 'media', 914274, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-19 06:10:37', '2022-08-19 06:10:44'),
(142, 'App\\Models\\News', 7, 'bb4c8288-0653-4637-822d-df7316e4d255', 'news', 'med514C', '1660907501.png', 'image/png', 'media', 'media', 1039769, '[]', '{\"type\":\"image\",\"width\":960,\"height\":640,\"ratio\":\"1.5\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-19 06:11:41', '2022-08-19 06:11:46'),
(144, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 144, '4569e562-a9b9-41d7-bf81-86f9cbf10cfe', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 04:38:17', '2022-08-23 04:38:17'),
(145, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 145, '57e36d09-910b-467d-b961-058c70941aa4', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 04:49:01', '2022-08-23 04:49:01'),
(146, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 146, '5ac46c27-e3d3-40f6-84b4-5a0b5130e076', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 04:53:53', '2022-08-23 04:53:53'),
(147, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 147, 'd1aa5a00-4ddf-47bd-9ad6-a568199469bc', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 04:55:41', '2022-08-23 04:55:41'),
(148, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 148, 'c7d86846-1999-439e-abb1-8e0218816099', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 04:58:44', '2022-08-23 04:58:44'),
(149, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 149, 'ffa61f79-426f-4746-9749-18eeeda2b65f', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 05:04:58', '2022-08-23 05:04:58'),
(150, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 150, 'a1c17522-2368-4428-becb-f1ae20c8475e', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 05:09:01', '2022-08-23 05:09:01'),
(151, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 151, '2c45a260-c350-4156-b69a-b586c4892ad7', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 05:10:34', '2022-08-23 05:10:34'),
(152, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 152, 'e76d85a5-f035-4f7e-a2c7-e91456d27f19', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 05:34:14', '2022-08-23 05:34:15'),
(153, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 153, '64c3009c-30ac-4152-aea2-364b6e3afb0f', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 05:36:05', '2022-08-23 05:36:05'),
(154, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 154, '34442fd0-0dcd-47ea-910c-620e689a611c', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 05:37:02', '2022-08-23 05:37:02'),
(155, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 155, 'b41dd3e0-b6b3-4bf2-a52f-f81dcfcdd11a', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 05:39:34', '2022-08-23 05:39:34'),
(156, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 156, '852079f8-bc47-4c55-a908-1ebe41088ff4', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 05:48:14', '2022-08-23 05:48:14'),
(157, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 157, 'a7b6b5bb-dfc9-4f69-9e6c-6007a341147b', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 05:50:21', '2022-08-23 05:50:21'),
(158, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 158, '9d8154d9-c9a7-41f7-b0f1-e55cc40e5a89', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 05:52:20', '2022-08-23 05:52:20'),
(159, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 159, '3ad4c509-18c8-4c9c-8855-da2c794554b4', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 05:54:32', '2022-08-23 05:54:32'),
(160, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 160, '736c13ae-5a09-41fc-b75d-a668be8b9c24', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 05:57:20', '2022-08-23 05:57:20'),
(161, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 161, '6d3bc37b-6137-4027-a6f0-8cba52587a3c', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 06:00:37', '2022-08-23 06:00:37'),
(162, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 162, 'cf93fbda-0a31-4678-84a0-3dace2db27ff', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 06:02:43', '2022-08-23 06:02:43'),
(163, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 163, 'df1666dd-3ff2-4e7a-b381-9efb68a771ae', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 06:04:16', '2022-08-23 06:04:16'),
(164, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 164, '5d247f1f-06b7-4a8b-80c0-739b340beb69', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 06:06:53', '2022-08-23 06:06:53'),
(165, 'App\\Models\\University', 5, '221c2100-fe8b-46c0-a7e7-611848748f5b', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-23 06:12:23', '2022-08-23 06:12:27'),
(166, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 166, '9928200c-f05e-40fe-86a2-1f6d6d31cd52', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-24 01:44:06', '2022-08-24 01:44:07'),
(167, 'App\\Models\\University', 7, '91d9be78-1db2-4e6d-884a-45bcb624fe23', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-24 01:44:45', '2022-08-24 01:44:47'),
(168, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 168, '5ea7f843-8aa1-42ba-96f6-dc436c59ba15', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-24 01:58:25', '2022-08-24 01:58:25'),
(169, 'App\\Models\\College', 2, '7a4b508b-b3d0-4087-8889-876771d29671', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-24 05:07:00', '2022-08-24 05:07:07'),
(170, 'App\\Models\\College', 3, 'e7647fc0-1ed0-417d-9cb3-1413ec2dafa5', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-25 00:34:16', '2022-08-25 00:34:28'),
(171, 'App\\Models\\College', 1, '221218d7-5964-4512-a94b-29dc727c84ae', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-25 00:51:36', '2022-08-25 00:51:39'),
(172, 'App\\Models\\University', 1, '424f6e47-fbb8-4aaf-893c-e4ef1f11ab45', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-25 00:53:56', '2022-08-25 00:53:59'),
(173, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 173, 'cc60d13b-e5b6-4a85-afd0-f767bd50c38b', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-25 02:47:04', '2022-08-25 02:47:04'),
(174, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 174, '8d19e91a-f371-447a-aa69-e4b7617409a6', 'book', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-25 05:16:09', '2022-08-25 05:16:09'),
(175, 'App\\Models\\Book', 3, '6e83c696-af41-4978-a507-ae4ae27ff00b', 'book', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-25 05:21:23', '2022-08-25 05:21:35'),
(176, 'App\\Models\\Book', 4, '7bdc9f89-f5f0-4313-82a2-1f5386aacc83', 'book', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-25 06:40:04', '2022-08-25 06:40:10'),
(177, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 177, 'd6ec0a70-7072-4a50-bfff-d302efa1a973', 'book', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-25 06:48:43', '2022-08-25 06:48:43'),
(178, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 178, 'bcaec5de-70c9-4c75-8a59-a0578168dd40', 'book', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-25 06:49:11', '2022-08-25 06:49:11'),
(179, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 179, '2086f7e3-35d6-41ac-bd96-a78c2e462292', 'book', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-25 06:52:48', '2022-08-25 06:52:48'),
(180, 'App\\Models\\Book', 5, '6e286d03-9c22-40b1-801a-95b49385ceed', 'book', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-25 12:29:11', '2022-08-25 12:29:17'),
(181, 'App\\Models\\Download', 5, '686fc04a-99ea-40fc-b4e8-eae420139212', 'download', '7 Ways to Look at the Values of Variables While Debugging in Visual Studio - Azure DevOps Blog', '7-ways-to-look-at-the-values-of-variables-while-debugging-in-visual-studio-azure-devops-blog.pdf', 'application/pdf', 'media', 'media', 1621282, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-27 02:11:59', '2022-08-27 02:12:09'),
(183, 'App\\Models\\Download', 7, 'f851363f-6617-4ab0-9f83-653e095822f3', 'download', '7 Ways to Look at the Values of Variables While Debugging in Visual Studio - Azure DevOps Blog', '7-ways-to-look-at-the-values-of-variables-while-debugging-in-visual-studio-azure-devops-blog.pdf', 'application/pdf', 'media', 'media', 1621282, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-28 05:25:22', '2022-08-28 05:25:26'),
(186, 'App\\Models\\Page', 18, 'b1ea4c10-fac5-436d-9f1a-eaf2302f6e9a', 'banner', 'med449B', '1661768209.png', 'image/png', 'media', 'media', 675412, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":632,\"ratio\":\"1.899\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-29 05:16:49', '2022-08-29 05:16:58'),
(187, 'App\\Models\\Page', 19, '9ab0618b-a301-4bc4-8cd7-b2a61ef0fc20', 'banner', 'medCC', '1661769765.png', 'image/png', 'media', 'media', 518292, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":800,\"ratio\":\"1.5\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-29 05:42:45', '2022-08-29 05:42:58'),
(188, 'App\\Models\\News', 9, 'fc62e1ec-8542-4495-ad63-f2278af29703', 'news', 'med4A73', '1661837613.png', 'image/png', 'media', 'media', 448060, '[]', '{\"type\":\"image\",\"width\":800,\"height\":437,\"ratio\":\"1.831\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-30 00:33:34', '2022-08-30 00:33:43'),
(189, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 189, '1b3045fb-0012-4a82-8ef8-dff3d2fad54e', 'icon', 'med55E1', '1661838272.png', 'image/png', 'media', 'media', 803631, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":655,\"ratio\":\"1.832\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-30 00:44:32', '2022-08-30 00:44:34'),
(190, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 190, '43bf6e01-99eb-4042-8ef5-2a9b0ff94899', 'icon', 'medF2A4', '1661838508.png', 'image/png', 'media', 'media', 803631, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":655,\"ratio\":\"1.832\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-30 00:48:28', '2022-08-30 00:48:31'),
(191, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 191, 'f3d7bee1-34db-4a1d-9e0e-6be99150d794', 'project', 'med17E5', '1661838518.png', 'image/png', 'media', 'media', 380184, '[]', '{\"type\":\"image\",\"width\":800,\"height\":471,\"ratio\":\"1.699\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-30 00:48:38', '2022-08-30 00:48:40'),
(197, 'App\\Models\\Page', 2, '17645f34-a925-44bf-8739-5b33cb8be085', 'page', 'med8B77', '1661841431.png', 'image/png', 'media', 'media', 518292, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":800,\"ratio\":\"1.5\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-30 01:37:11', '2022-08-30 01:37:17'),
(199, 'App\\Models\\Page', 2, '89efeb31-8918-4c59-baa9-ef671803f156', 'banner', 'medD747', '1661851805.png', 'image/png', 'media', 'media', 854706, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":675,\"ratio\":\"1.778\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-30 04:30:06', '2022-08-30 04:30:16'),
(200, 'App\\Models\\Page', 5, '988a7ead-d6ff-4405-8848-895138832be7', 'banner', 'med6AFC', '1661851908.png', 'image/png', 'media', 'media', 854706, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":675,\"ratio\":\"1.778\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-30 04:31:48', '2022-08-30 04:31:56');
INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(201, 'App\\Models\\Page', 12, 'd4fd9a78-d9cd-4c31-97fb-39504e09c118', 'banner', 'med1110', '1661852016.png', 'image/png', 'media', 'media', 790748, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":800,\"ratio\":\"1.5\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-30 04:33:37', '2022-08-30 04:33:42'),
(202, 'App\\Models\\Page', 20, '4ea71b8d-87f0-414f-8243-9f0c6ff799c3', 'banner', 'med2FFC', '1661852811.png', 'image/png', 'media', 'media', 758830, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":707,\"ratio\":\"1.697\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-30 04:46:51', '2022-08-30 04:46:57'),
(203, 'App\\Models\\Page', 21, '4a1002a3-f3ae-4a18-9c99-fac637c1882c', 'banner', 'med8B5D', '1661853096.png', 'image/png', 'media', 'media', 891054, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":800,\"ratio\":\"1.5\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-30 04:51:36', '2022-08-30 04:51:42'),
(204, 'App\\Models\\Page', 3, 'b64aa565-9c1d-4b86-892c-5955e3f94eb1', 'banner', 'med91D9', '1661853753.png', 'image/png', 'media', 'media', 970004, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":797,\"ratio\":\"1.506\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-30 05:02:33', '2022-08-30 05:02:38'),
(205, 'App\\Models\\Page', 4, '9fb3b460-ed6b-47f9-a97c-ce2a03fd30e9', 'banner', 'med43F', '1661853783.png', 'image/png', 'media', 'media', 970004, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":797,\"ratio\":\"1.506\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-30 05:03:03', '2022-08-30 05:03:08'),
(206, 'App\\Models\\College', 4, 'b7cf4b43-1a1c-42b6-a211-57f31a9552c9', 'prospectus', 'KP-Youth-Policy-2016 (1)', 'kp-youth-policy-2016-1.pdf', 'application/pdf', 'media', 'media', 7139534, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-08-30 06:25:46', '2022-08-30 06:25:53'),
(207, 'App\\Models\\Page', 22, 'b54c020b-eb1a-4283-9950-d58f02664544', 'banner', 'med641C', '1661945427.png', 'image/png', 'media', 'media', 675412, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":632,\"ratio\":\"1.899\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-31 06:30:29', '2022-08-31 06:30:39'),
(211, 'App\\Models\\Page', 26, '2a76ab20-58a2-47af-abb9-bbdbb968a684', 'banner', 'med42FF', '1661945811.png', 'image/png', 'media', 'media', 758830, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":707,\"ratio\":\"1.697\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-08-31 06:36:51', '2022-08-31 06:36:57'),
(217, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 218, 'e55bfc39-ef52-462f-87f0-cbf0354be4a5', 'icon', 'medFF7D', '1662012575.png', 'image/png', 'media', 'media', 854706, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":675,\"ratio\":\"1.778\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-01 01:09:35', '2022-09-01 01:09:39'),
(218, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 219, '9053d738-1993-416d-b04d-179bcc7039e4', 'project', 'med3E50', '1662012591.png', 'image/png', 'media', 'media', 418146, '[]', '{\"type\":\"image\",\"width\":800,\"height\":450,\"ratio\":\"1.778\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-01 01:09:51', '2022-09-01 01:09:54'),
(222, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 223, '09127b11-d710-4011-98a9-d891723b324a', 'icon', 'medDD2', '1662013168.png', 'image/png', 'media', 'media', 39803, '[]', '{\"type\":\"image\",\"width\":177,\"height\":118,\"ratio\":\"1.5\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-01 01:19:28', '2022-09-01 01:19:31'),
(223, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 224, 'd3942d5e-fc0a-4087-a70d-1b68d8579865', 'icon', 'med3B3C', '1662013246.png', 'image/png', 'media', 'media', 39803, '[]', '{\"type\":\"image\",\"width\":177,\"height\":118,\"ratio\":\"1.5\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-01 01:20:46', '2022-09-01 01:20:48'),
(224, 'App\\Models\\Project', 8, 'd7f51bc6-d846-44bb-89b7-c233322fb9a2', 'icon', 'med9301', '1662013334.png', 'image/png', 'media', 'media', 39803, '[]', '{\"type\":\"image\",\"width\":177,\"height\":118,\"ratio\":\"1.5\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-01 01:22:14', '2022-09-01 01:22:19'),
(225, 'App\\Models\\Project', 9, '6e1e48ce-da82-4f38-af5a-62876d26360a', 'icon', 'med8E63', '1662013529.png', 'image/png', 'media', 'media', 39803, '[]', '{\"type\":\"image\",\"width\":177,\"height\":118,\"ratio\":\"1.5\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-01 01:25:29', '2022-09-01 01:25:35'),
(226, 'App\\Models\\Project', 10, '720b648a-dee0-4352-8107-f170ee04d0a3', 'icon', 'med6CCD', '1662013651.png', 'image/png', 'media', 'media', 39803, '[]', '{\"type\":\"image\",\"width\":177,\"height\":118,\"ratio\":\"1.5\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-01 01:27:32', '2022-09-01 01:27:37'),
(227, 'App\\Models\\Team', 9, '3ed60210-b6d0-4481-9f30-20d808e1ca4a', 'team', 'medC0B0', '1662013870.png', 'image/png', 'media', 'media', 81354, '[]', '{\"type\":\"image\",\"width\":200,\"height\":200,\"ratio\":\"1\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"resize\":true}', '[]', 1, '2022-09-01 01:31:10', '2022-09-01 01:31:19'),
(228, 'App\\Models\\Project', 10, '5953fcf0-6459-4650-a431-9846d9122869', 'project', 'med8D9E', '1662014315.png', 'image/png', 'media', 'media', 39803, '[]', '{\"type\":\"image\",\"width\":177,\"height\":118,\"ratio\":\"1.5\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-01 01:38:35', '2022-09-01 01:38:41'),
(229, 'App\\Models\\Project', 9, 'df20d8a2-c360-42cd-b64a-30650e27f00e', 'project', 'med7208', '1662014374.png', 'image/png', 'media', 'media', 39803, '[]', '{\"type\":\"image\",\"width\":177,\"height\":118,\"ratio\":\"1.5\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-01 01:39:34', '2022-09-01 01:39:39'),
(230, 'App\\Models\\Project', 8, '461f0874-7359-465a-ac6e-ce86553547ff', 'project', 'medFD46', '1662014409.png', 'image/png', 'media', 'media', 39803, '[]', '{\"type\":\"image\",\"width\":177,\"height\":118,\"ratio\":\"1.5\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-01 01:40:09', '2022-09-01 01:40:14'),
(231, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 232, 'c1b8e210-8aa6-41b9-96d2-9aa3ab8fc493', 'profile', 'med6F04', '1662443700.png', 'image/png', 'media', 'media', 261874, '[]', '{\"type\":\"image\",\"width\":374,\"height\":496,\"ratio\":\"0.754\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-06 00:55:05', '2022-09-06 00:55:23'),
(232, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 233, '08941397-8813-43cc-a59f-cc5cf588a8ca', 'profile', 'med25F9', '1662524683.png', 'image/png', 'media', 'media', 261874, '[]', '{\"type\":\"image\",\"width\":374,\"height\":496,\"ratio\":\"0.754\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-06 23:24:44', '2022-09-06 23:24:49'),
(233, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 234, '36ad2347-eae6-4772-9ad9-332ee0826549', 'profile', 'med2D81', '1662527896.png', 'image/png', 'media', 'media', 2324077, '[]', '{\"type\":\"image\",\"width\":872,\"height\":1200,\"ratio\":\"0.727\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-07 00:18:16', '2022-09-07 00:18:20'),
(234, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 235, '3ba2f387-a752-4e8e-aad1-d69d461b6696', 'profile', 'medDB7A', '1662527941.png', 'image/png', 'media', 'media', 2324077, '[]', '{\"type\":\"image\",\"width\":872,\"height\":1200,\"ratio\":\"0.727\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-07 00:19:01', '2022-09-07 00:19:04'),
(235, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 236, 'ea77508e-8d5a-4af9-8f8c-a15e7da3334c', 'profile', 'medC974', '1662528067.png', 'image/png', 'media', 'media', 2324077, '[]', '{\"type\":\"image\",\"width\":872,\"height\":1200,\"ratio\":\"0.727\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-07 00:21:07', '2022-09-07 00:21:11'),
(246, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 247, '076c92e3-eed5-4ab6-b3c2-3458d1ecee32', 'gallary', 'computer systems engineer', 'computer-systems-engineer.pdf', 'application/pdf', 'media', 'media', 73355, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-09-27 01:46:32', '2022-09-27 01:46:33'),
(247, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 248, '80496964-92c4-41bf-a205-19c06684038b', 'gallary', 'computer systems engineer - Copy', 'computer-systems-engineer-copy.pdf', 'application/pdf', 'media', 'media', 73355, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-09-27 01:47:45', '2022-09-27 01:47:45'),
(249, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 250, '64ff5da4-8ed1-43de-a33c-04f83042a64d', 'facility', 'medE41D', '1664262044.png', 'image/png', 'media', 'media', 48768, '[]', '{\"type\":\"image\",\"width\":185,\"height\":123,\"ratio\":\"1.504\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-27 02:00:44', '2022-09-27 02:00:46'),
(250, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 251, 'afd3831a-713f-45dd-a327-c9f5eda271b9', 'facility', 'med1B20', '1664262058.png', 'image/png', 'media', 'media', 38102, '[]', '{\"type\":\"image\",\"width\":170,\"height\":122,\"ratio\":\"1.393\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-27 02:00:58', '2022-09-27 02:01:00'),
(251, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 252, 'e4cdcb3d-f919-4cf9-8ae8-e24cfa5cbdd0', 'facility', 'med88EF', '1664262348.png', 'image/png', 'media', 'media', 48768, '[]', '{\"type\":\"image\",\"width\":185,\"height\":123,\"ratio\":\"1.504\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-27 02:05:48', '2022-09-27 02:05:50'),
(252, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 253, '53fd9754-9cda-4d55-b139-6d250732a3ae', 'facility', 'medBDEE', '1664262362.png', 'image/png', 'media', 'media', 38102, '[]', '{\"type\":\"image\",\"width\":170,\"height\":122,\"ratio\":\"1.393\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-27 02:06:02', '2022-09-27 02:06:04'),
(253, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 254, '24c7b01d-725f-4be3-a03f-a78ed143e0d5', 'event', 'medCF12', '1664262694.png', 'image/png', 'media', 'media', 48768, '[]', '{\"type\":\"image\",\"width\":185,\"height\":123,\"ratio\":\"1.504\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-27 02:11:34', '2022-09-27 02:11:36'),
(254, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 255, 'b3e25336-e652-4021-b2c3-ec5fd657a0cd', 'event', 'med4716', '1664262724.png', 'image/png', 'media', 'media', 38102, '[]', '{\"type\":\"image\",\"width\":170,\"height\":122,\"ratio\":\"1.393\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-27 02:12:04', '2022-09-27 02:12:07'),
(255, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 256, '0a3816b0-7eb1-4b5d-adeb-4aeb04d3f592', 'event', 'med10D3', '1664262776.png', 'image/png', 'media', 'media', 48768, '[]', '{\"type\":\"image\",\"width\":185,\"height\":123,\"ratio\":\"1.504\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-27 02:12:56', '2022-09-27 02:12:58'),
(256, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 257, '9af64a92-7ff6-46a1-952a-b412b99b5af4', 'event', 'med3B24', '1664262787.png', 'image/png', 'media', 'media', 38102, '[]', '{\"type\":\"image\",\"width\":170,\"height\":122,\"ratio\":\"1.393\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-27 02:13:07', '2022-09-27 02:13:09'),
(257, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 258, 'bf038c50-b94e-4459-8998-311741d27070', 'facility', 'med9219', '1664263596.png', 'image/png', 'media', 'media', 48768, '[]', '{\"type\":\"image\",\"width\":185,\"height\":123,\"ratio\":\"1.504\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-27 02:26:36', '2022-09-27 02:26:38'),
(258, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 259, '5881eb74-a065-4649-a7be-4770cfa2dde1', 'facility', 'medCEF8', '1664263611.png', 'image/png', 'media', 'media', 38102, '[]', '{\"type\":\"image\",\"width\":170,\"height\":122,\"ratio\":\"1.393\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-27 02:26:51', '2022-09-27 02:26:53'),
(259, 'App\\Models\\Facility', 7, '43ef9e80-aefa-4712-87ff-1831de1e6d9c', 'facility', 'med2B2B', '1664264225.png', 'image/png', 'media', 'media', 48768, '[]', '{\"type\":\"image\",\"width\":185,\"height\":123,\"ratio\":\"1.504\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"facility\":true}', '[]', 1, '2022-09-27 02:37:05', '2022-09-27 02:37:29'),
(260, 'App\\Models\\Facility', 7, '3a550951-3bb6-4254-90ac-a4e412cd90f9', 'facility', 'med6E05', '1664264242.png', 'image/png', 'media', 'media', 38102, '[]', '{\"type\":\"image\",\"width\":170,\"height\":122,\"ratio\":\"1.393\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"facility\":true}', '[]', 1, '2022-09-27 02:37:22', '2022-09-27 02:37:29'),
(261, 'App\\Models\\Event', 28, '2e7af2ea-7203-47cd-8c9b-764e449590cb', 'event', 'med6D5D', '1664264504.png', 'image/png', 'media', 'media', 38102, '[]', '{\"type\":\"image\",\"width\":170,\"height\":122,\"ratio\":\"1.393\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2022-09-27 02:41:44', '2022-09-27 02:42:18'),
(262, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 263, 'd0cad1bf-8dba-4a8e-87b0-d951b5b9bf77', 'event', 'med87AD', '1664273882.png', 'image/png', 'media', 'media', 48768, '[]', '{\"type\":\"image\",\"width\":185,\"height\":123,\"ratio\":\"1.504\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-27 05:18:02', '2022-09-27 05:18:04'),
(263, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 264, 'e5f39044-a4f0-463f-ad98-219d6a52a78b', 'event', 'med5029', '1664342550.png', 'image/png', 'media', 'media', 48768, '[]', '{\"type\":\"image\",\"width\":185,\"height\":123,\"ratio\":\"1.504\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-28 00:22:32', '2022-09-28 00:22:37'),
(264, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 265, '77e1f7f0-3f86-4ddc-8924-7a1502dc2839', 'event', 'medEDE5', '1664342590.png', 'image/png', 'media', 'media', 48768, '[]', '{\"type\":\"image\",\"width\":185,\"height\":123,\"ratio\":\"1.504\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-28 00:23:10', '2022-09-28 00:23:12'),
(265, 'App\\Models\\Event', 29, '583a444e-00a5-419a-b806-5c5abf051c0c', 'event', 'medBCE8', '1664342774.png', 'image/png', 'media', 'media', 48768, '[]', '{\"type\":\"image\",\"width\":185,\"height\":123,\"ratio\":\"1.504\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2022-09-28 00:26:14', '2022-09-28 00:26:39'),
(266, 'App\\Models\\Event', 29, '28a9148f-175a-4247-86b0-943a4803b0a4', 'event', 'med1E5', '1664342792.png', 'image/png', 'media', 'media', 38102, '[]', '{\"type\":\"image\",\"width\":170,\"height\":122,\"ratio\":\"1.393\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2022-09-28 00:26:32', '2022-09-28 00:26:40'),
(267, 'App\\Models\\Event', 28, '7f0f3a3d-39a2-43cc-995d-52189d242fc4', 'event', 'med43C3', '1664342874.png', 'image/png', 'media', 'media', 48768, '[]', '{\"type\":\"image\",\"width\":185,\"height\":123,\"ratio\":\"1.504\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2022-09-28 00:27:54', '2022-09-28 00:29:20'),
(269, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 270, '39949e03-0d43-483a-94bb-4557fa62b30a', 'facility', 'med9B59', '1664345649.png', 'image/png', 'media', 'media', 48768, '[]', '{\"type\":\"image\",\"width\":185,\"height\":123,\"ratio\":\"1.504\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-28 01:14:09', '2022-09-28 01:14:11'),
(270, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 271, 'aecf0ee2-d143-4f89-a993-023beeb90f97', 'facility', 'med304B', '1664345687.png', 'image/png', 'media', 'media', 38102, '[]', '{\"type\":\"image\",\"width\":170,\"height\":122,\"ratio\":\"1.393\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-28 01:14:47', '2022-09-28 01:14:49'),
(271, 'App\\Models\\Facility', 8, 'e90a9837-4062-4b63-bfc0-20141a18441d', 'facility', 'med989', '1664345743.png', 'image/png', 'media', 'media', 38102, '[]', '{\"type\":\"image\",\"width\":170,\"height\":122,\"ratio\":\"1.393\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"facility\":true}', '[]', 1, '2022-09-28 01:15:43', '2022-09-28 01:16:06'),
(272, 'App\\Models\\Facility', 8, '09d15355-ac0d-47cc-8bb2-a0eed0d89705', 'facility', 'med4520', '1664345758.png', 'image/png', 'media', 'media', 48768, '[]', '{\"type\":\"image\",\"width\":185,\"height\":123,\"ratio\":\"1.504\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"facility\":true}', '[]', 1, '2022-09-28 01:15:58', '2022-09-28 01:16:07'),
(277, 'App\\Models\\Facility', 9, '0f4b3e55-bb77-4cdb-ab28-1f97b4b8fa41', 'facility', 'med15CB', '1664426880.png', 'image/png', 'media', 'media', 48768, '[]', '{\"type\":\"image\",\"width\":185,\"height\":123,\"ratio\":\"1.504\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"facility\":true}', '[]', 1, '2022-09-28 23:48:01', '2022-09-28 23:50:01'),
(278, 'App\\Models\\Facility', 9, '23213de3-9e12-4ad7-ad94-dc0a58bace28', 'facility', 'med97EC', '1664426978.png', 'image/png', 'media', 'media', 38102, '[]', '{\"type\":\"image\",\"width\":170,\"height\":122,\"ratio\":\"1.393\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"facility\":true}', '[]', 1, '2022-09-28 23:49:38', '2022-09-28 23:50:01'),
(279, 'App\\Models\\Slide', 12, 'd7a8c828-c13f-4b8d-ae59-708789562899', 'slide', 'medB4B1', '1664445598.png', 'image/png', 'media', 'media', 115644, '[]', '{\"type\":\"image\",\"width\":259,\"height\":195,\"ratio\":\"1.328\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-29 05:00:00', '2022-09-29 05:00:09'),
(280, 'App\\Models\\Download', 9, 'b3124b1d-b596-4d50-9397-780bae4184d0', 'download', 'medB345', '1664445729.png', 'image/png', 'media', 'media', 48768, '[]', '{\"type\":\"image\",\"width\":185,\"height\":123,\"ratio\":\"1.504\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-09-29 05:02:09', '2022-09-29 05:02:14'),
(281, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 282, 'a440a0e7-5d6d-4cb7-aed0-bb09d0b15969', 'profile', 'med5956', '1665943149.png', 'image/png', 'media', 'media', 261874, '[]', '{\"type\":\"image\",\"width\":374,\"height\":496,\"ratio\":\"0.754\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-10-16 12:59:11', '2022-10-16 12:59:19'),
(285, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 286, '46f21e29-26e6-4a26-9173-c7423fba2f92', 'profile', 'medEB7A', '1665947053.png', 'image/png', 'media', 'media', 261874, '[]', '{\"type\":\"image\",\"width\":374,\"height\":496,\"ratio\":\"0.754\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-10-16 14:04:13', '2022-10-16 14:04:16'),
(287, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 288, '6484ad92-b94e-4358-a503-6126e3687bb1', 'profile', 'med114B', '1666214283.png', 'image/png', 'media', 'media', 261874, '[]', '{\"type\":\"image\",\"width\":374,\"height\":496,\"ratio\":\"0.754\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-10-19 16:18:03', '2022-10-19 16:18:07'),
(291, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 292, 'e69cdb85-2991-43a4-a358-590058ca36fc', 'slide', 'medC832', '1666592253.png', 'image/png', 'media', 'media', 1413005, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":999,\"ratio\":\"1.201\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-10-24 01:17:33', '2022-10-24 01:17:40'),
(293, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 294, '367cafa6-e175-441e-b412-167aa05d618b', 'profile', 'medDB76', '1666677913.png', 'image/png', 'media', 'media', 117586, '[]', '{\"type\":\"image\",\"width\":451,\"height\":400,\"ratio\":\"1.128\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-10-25 01:05:16', '2022-10-25 01:05:23'),
(296, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 297, 'eb47cf46-ce58-4d6b-8d68-6dca46e92cf9', 'facility', 'med9848', '1666679338.png', 'image/png', 'media', 'media', 143627, '[]', '{\"type\":\"image\",\"width\":554,\"height\":554,\"ratio\":\"1\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-10-25 01:28:58', '2022-10-25 01:29:00'),
(297, 'App\\Models\\Facility', 10, '2a005cf8-b9be-4267-875b-591c6e9e6fc7', 'facility', 'medB4C6', '1666679673.png', 'image/png', 'media', 'media', 107211, '[]', '{\"type\":\"image\",\"width\":275,\"height\":183,\"ratio\":\"1.503\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"facility\":true}', '[]', 1, '2022-10-25 01:34:33', '2022-10-25 01:34:40'),
(298, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 299, '5ed3fbdd-05a5-4c1a-959b-945d86dda247', 'facility', 'med24E3', '1666681537.png', 'image/png', 'media', 'media', 117586, '[]', '{\"type\":\"image\",\"width\":451,\"height\":400,\"ratio\":\"1.128\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-10-25 02:05:39', '2022-10-25 02:05:49'),
(299, 'App\\Models\\User', 5, '8064a1e8-6559-4633-a9c0-f0be878b8590', 'profile', 'med3022', '1666762608.png', 'image/png', 'media', 'media', 261874, '[]', '{\"type\":\"image\",\"width\":374,\"height\":496,\"ratio\":\"0.754\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-10-26 00:36:51', '2022-10-26 00:37:02'),
(300, 'App\\Models\\News', 10, '88274120-6878-4cc9-b7cb-68934eda04db', 'news', 'med2C60', '1668147699.png', 'image/png', 'media', 'media', 107211, '[]', '{\"type\":\"image\",\"width\":275,\"height\":183,\"ratio\":\"1.503\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-11-11 01:21:41', '2022-11-11 01:21:56'),
(301, 'App\\Models\\News', 11, 'e39f0dad-14f7-4f4c-920b-2ffb8e833967', 'news', 'med25C6', '1668148877.png', 'image/png', 'media', 'media', 72857, '[]', '{\"type\":\"image\",\"width\":275,\"height\":183,\"ratio\":\"1.503\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-11-11 01:41:17', '2022-11-11 01:41:23'),
(302, 'App\\Models\\News', 12, 'dbce7026-109e-472e-b0e2-d9bd08a5a8fa', 'news', 'med2BD1', '1668148944.png', 'image/png', 'media', 'media', 107211, '[]', '{\"type\":\"image\",\"width\":275,\"height\":183,\"ratio\":\"1.503\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-11-11 01:42:24', '2022-11-11 01:42:30'),
(303, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 304, 'faf26d96-6cf7-49a7-a83b-d1c4beec06da', 'event', 'med5C59', '1668161933.png', 'image/png', 'media', 'media', 72857, '[]', '{\"type\":\"image\",\"width\":275,\"height\":183,\"ratio\":\"1.503\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-11-11 05:18:54', '2022-11-11 05:18:59'),
(304, 'App\\Models\\Event', 33, '8acf27e7-25c2-4d27-a7d4-71ca99340920', 'event', 'medDF1B', '1668161966.png', 'image/png', 'media', 'media', 72857, '[]', '{\"type\":\"image\",\"width\":275,\"height\":183,\"ratio\":\"1.503\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2022-11-11 05:19:26', '2022-11-11 05:19:49'),
(308, 'App\\Models\\Download', 10, '5d538a22-1017-4355-afb0-f1e681fb207f', 'download', 'med2B8C', '1668400995.png', 'image/png', 'media', 'media', 65537, '[]', '{\"type\":\"image\",\"width\":282,\"height\":178,\"ratio\":\"1.584\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-11-13 23:43:15', '2022-11-13 23:43:21'),
(316, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 317, '4f411cb8-9816-4da6-bd31-349d11d3e95b', 'result', 'Participant Form(Raheel)', 'participant-formraheel.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'media', 'media', 23886, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-11-22 01:39:16', '2022-11-22 01:39:20'),
(317, 'App\\Models\\LevelsOrStages', 13, '10a70d1b-b427-4392-89db-0ba63cd6b53d', 'result', 'Eloquent_ Relationships - Laravel - The PHP Framework For Web Artisans', 'eloquent-relationships-laravel-the-php-framework-for-web-artisans.pdf', 'application/pdf', 'media', 'media', 4343751, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-11-22 01:47:10', '2022-11-22 01:47:14'),
(318, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 319, '0b9be3d2-2b9e-4deb-8b39-696ca355c832', 'result', 'Eloquent_ Relationships - Laravel - The PHP Framework For Web Artisans', 'eloquent-relationships-laravel-the-php-framework-for-web-artisans.pdf', 'application/pdf', 'media', 'media', 4343751, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-11-22 04:17:08', '2022-11-22 04:17:09'),
(319, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 320, '3906eda1-ba93-48ed-bad6-9d648be2dc3a', 'result', 'Eloquent_ Relationships - Laravel - The PHP Framework For Web Artisans', 'eloquent-relationships-laravel-the-php-framework-for-web-artisans.pdf', 'application/pdf', 'media', 'media', 4343751, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-11-22 04:18:28', '2022-11-22 04:18:28'),
(320, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 321, '65bc5e31-561e-495f-9ba7-f88815235bec', 'result', 'Eloquent_ Relationships - Laravel - The PHP Framework For Web Artisans', 'eloquent-relationships-laravel-the-php-framework-for-web-artisans.pdf', 'application/pdf', 'media', 'media', 4343751, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-11-22 04:19:20', '2022-11-22 04:19:20'),
(321, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 322, 'e8114dc0-efe7-4172-9bb2-5039dc207ad8', 'result', 'Eloquent_ Relationships - Laravel - The PHP Framework For Web Artisans', 'eloquent-relationships-laravel-the-php-framework-for-web-artisans.pdf', 'application/pdf', 'media', 'media', 4343751, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-11-22 04:19:56', '2022-11-22 04:19:56'),
(322, 'App\\Models\\LevelsOrStages', 2, 'd177906f-86b4-4032-9e9d-efe5e0d01a0a', 'result', 'Eloquent_ Relationships - Laravel - The PHP Framework For Web Artisans', 'eloquent-relationships-laravel-the-php-framework-for-web-artisans.pdf', 'application/pdf', 'media', 'media', 4343751, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-11-22 04:21:03', '2022-11-22 04:21:05'),
(324, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 325, 'b42d5384-b59b-4cea-9bee-7d151afb2267', 'result', 'Eloquent_ Relationships - Laravel - The PHP Framework For Web Artisans', 'eloquent-relationships-laravel-the-php-framework-for-web-artisans.pdf', 'application/pdf', 'media', 'media', 4343751, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-11-25 00:40:48', '2022-11-25 00:40:49'),
(325, 'App\\Models\\LevelsOrStages', 11, '4c83b2e8-b57a-4265-bd92-1b9f71ddcf12', 'result', 'Eloquent_ Relationships - Laravel - The PHP Framework For Web Artisans', 'eloquent-relationships-laravel-the-php-framework-for-web-artisans.pdf', 'application/pdf', 'media', 'media', 4343751, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-11-25 01:35:35', '2022-11-25 01:41:25'),
(326, 'App\\Models\\Page', 33, '18c6b9da-094f-471e-a717-d4a7832c5f9a', 'banner', 'medC86E', '1669368247.png', 'image/png', 'media', 'media', 1450580, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":689,\"ratio\":\"1.742\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-11-25 04:24:08', '2022-11-25 04:24:20'),
(327, 'App\\Models\\Event', 33, '31e63ec4-ea7e-4835-8713-d3f439eb250f', 'event', 'medFDD6', '1669369834.png', 'image/png', 'media', 'media', 707285, '[]', '{\"type\":\"image\",\"width\":800,\"height\":459,\"ratio\":\"1.743\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2022-11-25 04:50:34', '2022-11-25 04:50:48'),
(328, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 329, '4056306d-e1b4-45b8-beda-30371958367a', 'event', 'med3899', '1669617968.png', 'image/png', 'media', 'media', 107211, '[]', '{\"type\":\"image\",\"width\":275,\"height\":183,\"ratio\":\"1.503\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-11-28 01:46:08', '2022-11-28 01:46:13'),
(330, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 331, '755a256f-27d0-4cc2-a644-2d42d5028960', 'result', 'Eloquent_ Relationships - Laravel - The PHP Framework For Web Artisans', 'eloquent-relationships-laravel-the-php-framework-for-web-artisans.pdf', 'application/pdf', 'media', 'media', 4343751, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-11-28 03:56:11', '2022-11-28 03:56:11'),
(331, 'App\\Models\\Event', 35, '80000941-83fe-40f8-b1d2-b1a3e53a2ab2', 'event', 'med2FDF', '1669628517.png', 'image/png', 'media', 'media', 65537, '[]', '{\"type\":\"image\",\"width\":282,\"height\":178,\"ratio\":\"1.584\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2022-11-28 04:41:57', '2022-11-28 04:44:11'),
(332, 'App\\Models\\Event', 36, 'a6fd4864-e4ab-4c04-bfb7-bc1ae2eb006e', 'event', 'med970A', '1669629133.png', 'image/png', 'media', 'media', 99548, '[]', '{\"type\":\"image\",\"width\":297,\"height\":170,\"ratio\":\"1.747\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2022-11-28 04:52:13', '2022-11-28 04:52:47'),
(333, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 334, 'f4fe9081-2695-4d14-aca2-b8971839b4ce', 'event', 'med6F31', '1669629516.png', 'image/png', 'media', 'media', 99548, '[]', '{\"type\":\"image\",\"width\":297,\"height\":170,\"ratio\":\"1.747\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-11-28 04:58:36', '2022-11-28 04:58:38'),
(336, 'App\\Models\\Event', 37, 'ecb8b0b2-4d8d-4cc2-8cbc-2a553d68994f', 'event', 'media-libraryJBMCPs', '1669720133.png', 'image/png', 'media', 'media', 107211, '[]', '{\"type\":\"image\",\"width\":275,\"height\":183,\"ratio\":\"1.503\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2022-11-29 06:08:53', '2022-11-29 06:09:13'),
(340, 'App\\Models\\Event', 38, 'f28b095c-2911-4574-9ba0-cf4b64c6968a', 'event', 'media-libraryPdq58g', '1669887546.png', 'image/png', 'media', 'media', 225534, '[]', '{\"type\":\"image\",\"width\":800,\"height\":357,\"ratio\":\"2.241\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2022-12-01 04:39:06', '2022-12-01 04:39:19'),
(341, 'App\\Models\\Event', 38, '0369d064-dc7e-4af8-bca1-9e05a42681af', 'event', 'media-libraryYdKCch', '1669887555.png', 'image/png', 'media', 'media', 60793, '[]', '{\"type\":\"image\",\"width\":360,\"height\":800,\"ratio\":\"0.45\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2022-12-01 04:39:15', '2022-12-01 04:39:19'),
(344, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 345, '545e1239-c384-450d-836f-1882b6f4b897', 'download', 'Templete for proposal', 'templete-for-proposal.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'media', 'media', 15688, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-12-07 04:10:22', '2022-12-07 04:10:22'),
(345, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 346, '75f73000-375c-4cd2-ba99-3b7a82d1aa07', 'download', 'Templete for proposal', 'templete-for-proposal.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'media', 'media', 15688, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-12-07 04:11:24', '2022-12-07 04:11:24'),
(346, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 347, 'dd5c8e88-a25e-4725-a5e6-fa3853896cad', 'download', 'Templete for proposal', 'templete-for-proposal.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'media', 'media', 15688, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-12-07 04:13:47', '2022-12-07 04:13:47'),
(347, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 348, 'ed3eacb1-cb74-426a-9163-d3de49ab71ec', 'download', 'Templete for proposal', 'templete-for-proposal.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'media', 'media', 15688, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2022-12-07 04:15:12', '2022-12-07 04:15:12'),
(349, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 350, '0439f7cf-5134-422e-aba1-0c8c426dc711', 'event', 'med58CA', '1670476414.png', 'image/png', 'media', 'media', 29889, '[]', '{\"type\":\"image\",\"width\":194,\"height\":121,\"ratio\":\"1.603\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-12-08 00:13:35', '2022-12-08 00:13:38'),
(350, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 351, 'bc239eef-0bf3-4877-9c8b-dc876f7ecbbf', 'event', 'med15F5', '1670476462.png', 'image/png', 'media', 'media', 29889, '[]', '{\"type\":\"image\",\"width\":194,\"height\":121,\"ratio\":\"1.603\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-12-08 00:14:22', '2022-12-08 00:14:25'),
(352, 'App\\Models\\Team', 12, '92e42842-4607-4671-a042-c03c4fe3b624', 'team', 'med1762', '1670493568.png', 'image/png', 'media', 'media', 1464050, '[]', '{\"type\":\"image\",\"width\":900,\"height\":1200,\"ratio\":\"0.75\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"resize\":true}', '[]', 1, '2022-12-08 04:59:29', '2022-12-08 04:59:37'),
(353, 'App\\Models\\Facility', 11, 'bee3390f-4ed4-4770-86ca-b95d02d4d452', 'facility', 'medF840', '1670559980.png', 'image/png', 'media', 'media', 614961, '[]', '{\"type\":\"image\",\"width\":601,\"height\":800,\"ratio\":\"0.751\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"facility\":true}', '[]', 1, '2022-12-08 23:26:21', '2022-12-08 23:26:30'),
(364, 'App\\Models\\Page', 14, '0a3fea71-e099-48c3-8a1e-ea47ae7bd641', 'banner', 'med9A0F', '1671445125.png', 'image/png', 'media', 'media', 584524, '[]', '{\"type\":\"image\",\"width\":900,\"height\":410,\"ratio\":\"2.195\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2022-12-19 05:18:45', '2022-12-19 05:18:49'),
(365, 'App\\Models\\Team', 8, '7d115010-82f1-474f-96b8-75b911c7b101', 'team', 'med353C', '1672299838.png', 'image/png', 'media', 'media', 1464050, '[]', '{\"type\":\"image\",\"width\":900,\"height\":1200,\"ratio\":\"0.75\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"resize\":true}', '[]', 1, '2022-12-29 02:43:59', '2022-12-29 02:44:09'),
(369, 'App\\Models\\Page', 34, 'c3a28eed-f42e-40ed-9a47-9eb6dfd7e431', 'banner', 'med5E10', '1672913991.png', 'image/png', 'media', 'media', 605486, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":219,\"ratio\":\"5.479\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-01-05 05:19:51', '2023-01-05 05:19:55'),
(370, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 371, '67ea8485-6216-4a06-bd56-8b325943f9e6', 'event', 'med74C2', '1672980714.png', 'image/png', 'media', 'media', 69847, '[]', '{\"type\":\"image\",\"width\":262,\"height\":192,\"ratio\":\"1.365\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-01-05 23:51:55', '2023-01-05 23:51:58'),
(376, 'App\\Models\\Team', 2, 'fde7b452-77f7-4723-837c-b7fbbf0c9116', 'team', 'med4C93', '1675059346.png', 'image/png', 'media', 'media', 45539, '[]', '{\"type\":\"image\",\"width\":225,\"height\":225,\"ratio\":\"1\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"resize\":true}', '[]', 1, '2023-01-30 01:15:46', '2023-01-30 01:15:51'),
(377, 'App\\Models\\Page', 35, '2ba84c46-5722-4cd2-9be1-3533ca946817', 'banner', 'med887F', '1675403953.png', 'image/png', 'media', 'media', 891054, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":800,\"ratio\":\"1.5\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-03 00:59:14', '2023-02-03 00:59:25'),
(381, 'App\\Models\\Page', 37, '743855c1-c2a9-4b29-8fdb-d0d667ecbff8', 'banner', 'med71AE', '1675917425.png', 'image/png', 'media', 'media', 605486, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":219,\"ratio\":\"5.479\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-08 23:37:06', '2023-02-08 23:37:13'),
(382, 'App\\Models\\Page', 32, '47a4e747-0337-45b6-b886-bb513e875482', 'banner', 'med2D43', '1675917473.png', 'image/png', 'media', 'media', 605486, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":219,\"ratio\":\"5.479\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-08 23:37:53', '2023-02-08 23:37:59'),
(386, 'App\\Models\\Page', 38, 'b3b2bb30-d378-4122-9daf-be81e4663411', 'banner', 'med82B2', '1676354884.png', 'image/png', 'media', 'media', 445506, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":219,\"ratio\":\"5.479\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-14 01:08:04', '2023-02-14 01:08:10'),
(389, 'App\\Models\\Page', 39, 'eb27c048-147e-447e-8bc1-0aedb07d7dfe', 'banner', 'med4624', '1677050219.png', 'image/png', 'media', 'media', 708444, '[]', '{\"type\":\"image\",\"width\":758,\"height\":505,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-22 02:16:59', '2023-02-22 02:17:03'),
(390, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 391, '2d2ab039-ce3a-48e5-93d6-7dfaf5bc1354', 'work-project', 'medF9EF', '1677051182.png', 'image/png', 'media', 'media', 47111, '[]', '{\"type\":\"image\",\"width\":170,\"height\":122,\"ratio\":\"1.393\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-22 02:33:02', '2023-02-22 02:33:05'),
(391, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 392, 'cbcec618-9e4f-48fc-a78f-b28b02b89ec8', 'work-project', 'medE629', '1677051243.png', 'image/png', 'media', 'media', 47111, '[]', '{\"type\":\"image\",\"width\":170,\"height\":122,\"ratio\":\"1.393\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-22 02:34:03', '2023-02-22 02:34:05'),
(392, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 393, '81d9ec44-4561-4f93-afb0-28b349f1725d', 'work-project', 'med4EDB', '1677051270.png', 'image/png', 'media', 'media', 47111, '[]', '{\"type\":\"image\",\"width\":170,\"height\":122,\"ratio\":\"1.393\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-22 02:34:30', '2023-02-22 02:34:32'),
(393, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 394, '9af9de0d-b02d-48e9-8565-014b7b33b6d3', 'work-project', 'medCF3B', '1677051303.png', 'image/png', 'media', 'media', 47111, '[]', '{\"type\":\"image\",\"width\":170,\"height\":122,\"ratio\":\"1.393\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-22 02:35:03', '2023-02-22 02:35:05'),
(394, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 395, 'f19ffd76-91ba-4c94-bcb4-c95f3204b4a3', 'work-project', 'medEE0E', '1677051376.png', 'image/png', 'media', 'media', 47111, '[]', '{\"type\":\"image\",\"width\":170,\"height\":122,\"ratio\":\"1.393\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-22 02:36:16', '2023-02-22 02:36:18'),
(395, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 396, 'b1f41a73-76f0-4644-af47-68192911617d', 'work-project', 'medDA48', '1677051436.png', 'image/png', 'media', 'media', 47111, '[]', '{\"type\":\"image\",\"width\":170,\"height\":122,\"ratio\":\"1.393\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-22 02:37:17', '2023-02-22 02:37:19'),
(400, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 401, 'f11814d6-a02a-4ae8-ba95-30a3ee3b8bdc', 'work-project', 'med8684', '1677060918.png', 'image/png', 'media', 'media', 413210, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-22 05:15:18', '2023-02-22 05:15:20'),
(401, 'App\\Models\\Project', 4, '70b6ad2c-f65b-4a46-8210-f1b56205f0de', 'work-project', 'medD219', '1677060937.png', 'image/png', 'media', 'media', 413210, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-22 05:15:37', '2023-02-22 05:16:33'),
(402, 'App\\Models\\Project', 3, '646b2cd7-759a-493e-ab5c-8b88c25ee370', 'work-project', 'med594B', '1677061037.png', 'image/png', 'media', 'media', 413210, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-22 05:17:17', '2023-02-22 05:17:24'),
(403, 'App\\Models\\Project', 2, 'b4c743a0-697e-4dcd-8608-2db168afecb9', 'work-project', 'medAF40', '1677061059.png', 'image/png', 'media', 'media', 413210, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-22 05:17:39', '2023-02-22 05:17:44'),
(404, 'App\\Models\\Project', 1, 'c048817f-fc09-49ba-862a-4094268afb47', 'work-project', 'medF064', '1677061076.png', 'image/png', 'media', 'media', 413210, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-22 05:17:56', '2023-02-22 05:18:00'),
(405, 'App\\Models\\Page', 40, '1941e90f-5f58-4089-861f-383bbbfcec82', 'banner', 'med5695', '1677062216.png', 'image/png', 'media', 'media', 326633, '[]', '{\"type\":\"image\",\"width\":396,\"height\":439,\"ratio\":\"0.902\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-22 05:36:56', '2023-02-22 05:37:59'),
(408, 'App\\Models\\Slide', 15, 'c9d68e0a-e144-441b-a30e-9f0bb89cc66d', 'slide', 'med7E60', '1677135234.png', 'image/png', 'media', 'media', 708444, '[]', '{\"type\":\"image\",\"width\":758,\"height\":505,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-23 01:53:54', '2023-02-23 01:54:01'),
(409, 'App\\Models\\Page', 36, '20652fff-8fb3-432d-84ce-b91e41f18f32', 'banner', 'med670C', '1677567376.png', 'image/png', 'media', 'media', 405627, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":219,\"ratio\":\"5.479\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-28 01:56:16', '2023-02-28 01:56:23');
INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(410, 'App\\Models\\Page', 31, '7d692efa-dec9-4756-9b6f-28aaf4e77c07', 'banner', 'med5C8D', '1677567438.png', 'image/png', 'media', 'media', 387833, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":219,\"ratio\":\"5.479\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-28 01:57:18', '2023-02-28 01:57:24'),
(411, 'App\\Models\\Page', 30, '054b1801-44a9-4390-bff0-ad52c5246dbc', 'banner', 'med6B81', '1677567508.png', 'image/png', 'media', 'media', 404933, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":219,\"ratio\":\"5.479\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-28 01:58:28', '2023-02-28 01:58:40'),
(412, 'App\\Models\\Page', 30, '247506e3-6b58-410e-a709-7ce612d7eb3a', 'page', 'med86FD', '1677567515.png', 'image/png', 'media', 'media', 404933, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":219,\"ratio\":\"5.479\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-28 01:58:35', '2023-02-28 01:58:40'),
(413, 'App\\Models\\Page', 29, '78de0ad3-661c-487c-9930-39505d33e7b4', 'banner', 'med328', '1677567547.png', 'image/png', 'media', 'media', 339876, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":219,\"ratio\":\"5.479\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-28 01:59:07', '2023-02-28 01:59:11'),
(414, 'App\\Models\\Page', 28, '753a3e99-5484-4ee2-b787-0d8627ed4016', 'banner', 'med5E2E', '1677567570.png', 'image/png', 'media', 'media', 504459, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":219,\"ratio\":\"5.479\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-28 01:59:30', '2023-02-28 01:59:34'),
(415, 'App\\Models\\Page', 27, '9283c82f-b635-4df1-b50b-1f7f33d54b54', 'banner', 'medC662', '1677567597.png', 'image/png', 'media', 'media', 404933, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":219,\"ratio\":\"5.479\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-28 01:59:57', '2023-02-28 02:00:09'),
(416, 'App\\Models\\Page', 27, '30835470-24eb-4e68-966a-0a8c59bc813e', 'page', 'medE1CF', '1677567604.png', 'image/png', 'media', 'media', 404933, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":219,\"ratio\":\"5.479\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-28 02:00:04', '2023-02-28 02:00:09'),
(417, 'App\\Models\\Page', 25, 'f7ff2926-c0b9-4217-9a00-a72547c1a6ac', 'banner', 'med4774', '1677567630.png', 'image/png', 'media', 'media', 356362, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":219,\"ratio\":\"5.479\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-28 02:00:30', '2023-02-28 02:00:34'),
(418, 'App\\Models\\Page', 24, '87ceeb30-598c-41b7-b95c-d0b016c28dda', 'banner', 'medA99E', '1677567655.png', 'image/png', 'media', 'media', 405627, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":219,\"ratio\":\"5.479\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-28 02:00:55', '2023-02-28 02:00:59'),
(419, 'App\\Models\\Page', 23, '4c81b83f-bb54-4185-a524-138bdf29b624', 'banner', 'medFB0E', '1677567676.png', 'image/png', 'media', 'media', 346121, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":219,\"ratio\":\"5.479\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-28 02:01:16', '2023-02-28 02:01:20'),
(420, 'App\\Models\\Page', 13, 'e842612e-a8ae-45a2-9577-3f88ccc7e3ee', 'banner', 'medB0D7', '1677567722.png', 'image/png', 'media', 'media', 294913, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":219,\"ratio\":\"5.479\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-28 02:02:02', '2023-02-28 02:02:06'),
(421, 'App\\Models\\Page', 10, '9de4fbf2-6136-4413-ac8c-03d152c313ba', 'banner', 'med1C96', '1677567750.png', 'image/png', 'media', 'media', 364673, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":219,\"ratio\":\"5.479\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-28 02:02:30', '2023-02-28 02:02:35'),
(422, 'App\\Models\\Page', 9, '9a43538a-4216-4c72-a06b-55ff2a1a7008', 'banner', 'med8B33', '1677567778.png', 'image/png', 'media', 'media', 371933, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":219,\"ratio\":\"5.479\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-28 02:02:58', '2023-02-28 02:03:02'),
(423, 'App\\Models\\Page', 8, '941e2c7f-192a-47b1-8149-022b97f1d593', 'banner', 'medEA8F', '1677567802.png', 'image/png', 'media', 'media', 532301, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":219,\"ratio\":\"5.479\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-02-28 02:03:22', '2023-02-28 02:03:28'),
(436, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 437, '53451d96-ff76-4dd6-bd6e-50629d836001', 'slide', 'medB7F5', '1686122858.png', 'image/png', 'media', 'media', 519568, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":541,\"ratio\":\"2.218\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-07 14:27:39', '2023-06-07 14:27:47'),
(437, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 438, 'd91d9083-21e0-423f-9e16-9c7e978d38e7', 'slide', 'med462C', '1686122960.png', 'image/png', 'media', 'media', 1008025, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":481,\"ratio\":\"2.495\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-07 14:29:20', '2023-06-07 14:29:23'),
(438, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 439, '6e00692a-cba8-4b3b-bf96-8acb87a80fd8', 'slide', 'med9DB7', '1686122982.png', 'image/png', 'media', 'media', 1948911, '[]', '{\"type\":\"image\",\"width\":1164,\"height\":1032,\"ratio\":\"1.128\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-07 14:29:42', '2023-06-07 14:29:46'),
(439, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 440, 'f93e0b45-de40-4a04-a36d-06c94b327b8a', 'slide', 'med52B4', '1686123028.png', 'image/png', 'media', 'media', 1948911, '[]', '{\"type\":\"image\",\"width\":1164,\"height\":1032,\"ratio\":\"1.128\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-07 14:30:28', '2023-06-07 14:30:32'),
(440, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 441, '007055ba-12b9-4c0a-9f50-1169efd242f6', 'slide', 'med6E1', '1686123140.png', 'image/png', 'media', 'media', 913231, '[]', '{\"type\":\"image\",\"width\":1010,\"height\":812,\"ratio\":\"1.244\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-07 14:32:20', '2023-06-07 14:32:23'),
(441, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 442, '9d7afd26-15f7-45d4-9efe-002c2dd5ae92', 'slide', 'medDE2D', '1686123392.png', 'image/png', 'media', 'media', 303659, '[]', '{\"type\":\"image\",\"width\":505,\"height\":406,\"ratio\":\"1.244\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-07 14:36:32', '2023-06-07 14:36:34'),
(442, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 443, 'fee583ca-7e0e-42ce-b423-3528620829be', 'slide', 'medBEFE', '1686123646.png', 'image/png', 'media', 'media', 303900, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":299,\"ratio\":\"4.013\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-07 14:40:46', '2023-06-07 14:40:49'),
(443, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 444, '89634234-de89-4c1b-9312-7e4b17150522', 'slide', 'med672A', '1686123689.png', 'image/png', 'media', 'media', 303659, '[]', '{\"type\":\"image\",\"width\":505,\"height\":406,\"ratio\":\"1.244\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-07 14:41:29', '2023-06-07 14:41:32'),
(444, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 445, '7c933878-f4a6-4748-a359-a472b9761627', 'slide', 'med425D', '1686123745.png', 'image/png', 'media', 'media', 303659, '[]', '{\"type\":\"image\",\"width\":505,\"height\":406,\"ratio\":\"1.244\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-07 14:42:25', '2023-06-07 14:42:28'),
(445, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 446, '004a64ef-b5e4-47fc-aa36-2a6f3a5fa8c4', 'slide', 'med6BF3', '1686124608.png', 'image/png', 'media', 'media', 303659, '[]', '{\"type\":\"image\",\"width\":505,\"height\":406,\"ratio\":\"1.244\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-07 14:56:48', '2023-06-07 14:56:53'),
(446, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 447, '5b0f53dd-2919-4f84-bb84-89c5faa8880a', 'slide', 'medE8CC', '1686129555.png', 'image/png', 'media', 'media', 112160, '[]', '{\"type\":\"image\",\"width\":1030,\"height\":510,\"ratio\":\"2.02\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-07 16:19:15', '2023-06-07 16:19:18'),
(448, 'App\\Models\\Slide', 14, 'fab9e3fe-d070-4af2-9ff5-520401ffa9e9', 'slide', 'med2AF6', '1686130358.png', 'image/png', 'media', 'media', 221119, '[]', '{\"type\":\"image\",\"width\":800,\"height\":361,\"ratio\":\"2.216\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-07 16:32:38', '2023-06-07 16:32:44'),
(449, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 450, 'dfca9556-791b-46b4-8e8a-e41e973db756', 'gallary', 'medD24E', '1686562940.png', 'image/png', 'media', 'media', 646392, '[]', '{\"type\":\"image\",\"width\":800,\"height\":381,\"ratio\":\"2.1\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-12 16:42:22', '2023-06-12 16:42:29'),
(450, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 451, 'b294dc8d-5ebd-4c58-8c7f-c3c0b0ffd9e6', 'gallary', 'med244B', '1686562961.png', 'image/png', 'media', 'media', 727407, '[]', '{\"type\":\"image\",\"width\":800,\"height\":641,\"ratio\":\"1.248\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-12 16:42:41', '2023-06-12 16:42:44'),
(451, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 452, 'c4aa2d31-023b-44df-90f3-36a96bdf2a4d', 'gallary', 'medADB4', '1686562996.png', 'image/png', 'media', 'media', 192615, '[]', '{\"type\":\"image\",\"width\":800,\"height\":320,\"ratio\":\"2.5\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-12 16:43:16', '2023-06-12 16:43:19'),
(452, 'App\\Models\\Gallary', 5, '449cba7a-fac6-4090-9de5-30ebf80e5216', 'gallary', 'med3C5C', '1686563033.png', 'image/png', 'media', 'media', 516894, '[]', '{\"type\":\"image\",\"width\":582,\"height\":516,\"ratio\":\"1.128\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-06-12 16:43:53', '2023-06-12 16:44:47'),
(453, 'App\\Models\\Gallary', 5, 'f3372b95-e81c-4e3f-a433-54f9acc264ed', 'gallary', 'med80AE', '1686563050.png', 'image/png', 'media', 'media', 443234, '[]', '{\"type\":\"image\",\"width\":582,\"height\":516,\"ratio\":\"1.128\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-06-12 16:44:10', '2023-06-12 16:44:48'),
(454, 'App\\Models\\Gallary', 5, '0d2de53d-a07a-4553-a8fa-87eeb2441ae9', 'gallary', 'medB5EC', '1686563064.png', 'image/png', 'media', 'media', 646392, '[]', '{\"type\":\"image\",\"width\":800,\"height\":381,\"ratio\":\"2.1\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-06-12 16:44:24', '2023-06-12 16:44:48'),
(455, 'App\\Models\\Gallary', 5, '4d357e19-4f84-48ea-9192-2178df6ecdb5', 'gallary', 'medF51D', '1686563080.png', 'image/png', 'media', 'media', 727407, '[]', '{\"type\":\"image\",\"width\":800,\"height\":641,\"ratio\":\"1.248\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-06-12 16:44:40', '2023-06-12 16:44:48'),
(461, 'App\\Models\\Gallary', 5, 'acb90536-fba2-4f46-8b1a-35c6cb6cd76d', 'gallary', 'medF389', '1686721081.png', 'image/png', 'media', 'media', 280693, '[]', '{\"type\":\"image\",\"width\":480,\"height\":385,\"ratio\":\"1.247\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-06-14 12:38:01', '2023-06-14 12:38:20'),
(462, 'App\\Models\\Gallary', 5, '9445887e-a2fb-444d-a430-9f1f8adbc812', 'gallary', 'med2889', '1686721095.png', 'image/png', 'media', 'media', 221119, '[]', '{\"type\":\"image\",\"width\":800,\"height\":361,\"ratio\":\"2.216\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-06-14 12:38:15', '2023-06-14 12:38:20'),
(463, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 464, 'b7ec7317-b6af-49fb-a910-61b92c3a4e64', 'header_logo', 'media-libraryWFLc1s', '1687159583.png', 'image/png', 'media', 'media', 75848, '[]', '[]', '[]', '[]', 1, '2023-06-19 02:26:23', '2023-06-19 02:26:23'),
(464, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 465, '72e317ba-cfce-40a4-8d97-87c56c6ee725', 'header_logo', 'media-libraryt3Do6s', '1687159620.png', 'image/png', 'media', 'media', 75848, '[]', '[]', '[]', '[]', 1, '2023-06-19 02:27:00', '2023-06-19 02:27:00'),
(465, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 466, 'bcb123ad-893c-4e1a-b2a7-6d157fbfa25f', 'header_logo', 'media-librarygzaTYk', '1687159752.png', 'image/png', 'media', 'media', 75848, '[]', '[]', '[]', '[]', 1, '2023-06-19 02:29:12', '2023-06-19 02:29:12'),
(466, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 467, 'cf129b6d-17d6-4ffa-a9fd-820fc4eb5276', 'work_logo', 'media-libraryUaotpK', '1687159774.png', 'image/png', 'media', 'media', 75848, '[]', '[]', '[]', '[]', 1, '2023-06-19 02:29:34', '2023-06-19 02:29:34'),
(467, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 468, 'c583f623-12c9-44cb-9ef7-cfdcb98128d7', 'work_logo', 'media-libraryHiBVNQ', '1687159785.png', 'image/png', 'media', 'media', 32050, '[]', '[]', '[]', '[]', 1, '2023-06-19 02:29:45', '2023-06-19 02:29:45'),
(468, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 469, '8f61dd94-2158-4237-82ea-a0b6223059fa', 'header_logo', 'media-libraryLmEtG4', '1687162529.png', 'image/png', 'media', 'media', 75848, '[]', '[]', '[]', '[]', 1, '2023-06-19 03:15:29', '2023-06-19 03:15:29'),
(473, 'App\\Models\\Setting', 1, '9f656472-6ac9-4c6f-a100-a5a1d718b24a', 'header_logo', 'media-libraryjzGEeA', '1687245317.png', 'image/png', 'media', 'media', 75848, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":306,\"ratio\":\"3.922\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-20 02:15:17', '2023-06-20 02:15:36'),
(474, 'App\\Models\\Setting', 1, '57b1d6a2-b9bd-4a82-8279-f8a187052f23', 'footer_logo', 'media-libraryBQ8mfV', '1687245321.png', 'image/png', 'media', 'media', 138640, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":306,\"ratio\":\"3.922\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"resize\":true}', '[]', 1, '2023-06-20 02:15:21', '2023-06-20 02:15:36'),
(475, 'App\\Models\\Setting', 1, '31b7e196-c24b-4228-8b4f-68cb4a09b770', 'inner_page_logo', 'media-libraryTFMgMJ', '1687245326.png', 'image/png', 'media', 'media', 75848, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":306,\"ratio\":\"3.922\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"resize\":true}', '[]', 1, '2023-06-20 02:15:26', '2023-06-20 02:15:36'),
(476, 'App\\Models\\Setting', 1, '23c3ab52-d0b5-4eb7-af72-309c1528e11d', 'logo', 'media-libraryV6B1Q4', '1687245331.png', 'image/png', 'media', 'media', 138640, '[]', '{\"type\":\"image\",\"width\":1200,\"height\":306,\"ratio\":\"3.922\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"resize\":true}', '[]', 1, '2023-06-20 02:15:31', '2023-06-20 02:15:36'),
(479, 'App\\Models\\Event', 39, '8a3c7156-1820-492f-b787-894fa3f2319a', 'event', 'media-library7GYMU0', '1687772057.png', 'image/png', 'media', 'media', 719258, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:34:17', '2023-06-26 04:34:56'),
(480, 'App\\Models\\Event', 39, 'e386990f-e5df-4525-9121-68d182d89889', 'event', 'media-libraryWMx42T', '1687772059.png', 'image/png', 'media', 'media', 484388, '[]', '{\"type\":\"image\",\"width\":600,\"height\":800,\"ratio\":\"0.75\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:34:19', '2023-06-26 04:34:57'),
(481, 'App\\Models\\Event', 39, 'aa943cc3-7da3-4882-9f3b-94329af8f928', 'event', 'media-libraryL0O8b1', '1687772061.png', 'image/png', 'media', 'media', 782048, '[]', '{\"type\":\"image\",\"width\":800,\"height\":496,\"ratio\":\"1.613\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:34:21', '2023-06-26 04:34:57'),
(482, 'App\\Models\\Event', 39, '8cc9e522-598b-47f4-97f5-ee9842d8861e', 'event', 'media-libraryk9Ywb5', '1687772063.png', 'image/png', 'media', 'media', 782048, '[]', '{\"type\":\"image\",\"width\":800,\"height\":496,\"ratio\":\"1.613\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:34:23', '2023-06-26 04:34:57'),
(483, 'App\\Models\\Event', 39, 'fb30841c-4d96-4b0f-a2f4-93dd336f6dc3', 'event', 'media-library7qoIJk', '1687772066.png', 'image/png', 'media', 'media', 897140, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:34:26', '2023-06-26 04:34:57'),
(484, 'App\\Models\\Event', 39, '22ba361f-c68c-4934-a4a6-a31b2059e9f9', 'event', 'media-librarymy7SrN', '1687772068.png', 'image/png', 'media', 'media', 885083, '[]', '{\"type\":\"image\",\"width\":600,\"height\":800,\"ratio\":\"0.75\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:34:28', '2023-06-26 04:34:57'),
(485, 'App\\Models\\Event', 39, '915ef122-69eb-4cc9-9c2d-afab9c50827d', 'event', 'media-library3ppqAS', '1687772071.png', 'image/png', 'media', 'media', 914328, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:34:31', '2023-06-26 04:34:57'),
(486, 'App\\Models\\Event', 39, '21702ef9-3174-4a86-a292-b2207ec243c3', 'event', 'media-libraryU99ghf', '1687772073.png', 'image/png', 'media', 'media', 914328, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:34:33', '2023-06-26 04:34:57'),
(487, 'App\\Models\\Event', 39, '55fae462-eb15-4134-b19d-a2e09bbdc4d1', 'event', 'media-library8twhTT', '1687772076.png', 'image/png', 'media', 'media', 913383, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:34:36', '2023-06-26 04:34:57'),
(488, 'App\\Models\\Event', 39, '917eee8f-4375-437a-b963-abc90a77d415', 'event', 'media-library98h3BX', '1687772079.png', 'image/png', 'media', 'media', 913383, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:34:39', '2023-06-26 04:34:57'),
(489, 'App\\Models\\Event', 39, 'c79370e9-7d09-47cc-bf32-fb2f1ca5e82e', 'event', 'media-library61dSoU', '1687772081.png', 'image/png', 'media', 'media', 842648, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:34:41', '2023-06-26 04:34:57'),
(490, 'App\\Models\\Event', 39, 'cffda198-6b6b-4f38-86b8-a6d0787872d2', 'event', 'media-libraryjkOoc0', '1687772083.png', 'image/png', 'media', 'media', 674542, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:34:43', '2023-06-26 04:34:57'),
(491, 'App\\Models\\Event', 39, '580f344b-448d-4822-8d7d-c695f9963761', 'event', 'media-libraryQBAAG7', '1687772085.png', 'image/png', 'media', 'media', 826969, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:34:45', '2023-06-26 04:34:57'),
(492, 'App\\Models\\Event', 34, '2e80b052-41ee-417e-a040-64a2eb6ea321', 'event', 'media-libraryuWf83C', '1687772364.png', 'image/png', 'media', 'media', 649140, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:39:24', '2023-06-26 04:39:40'),
(493, 'App\\Models\\Event', 34, '9330cd03-22d5-4cb1-88d7-fe23f5f605df', 'event', 'media-libraryV9M5Am', '1687772366.png', 'image/png', 'media', 'media', 757684, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:39:26', '2023-06-26 04:39:40'),
(494, 'App\\Models\\Event', 34, '4e209efc-c3b3-4913-80da-db2f5a87f916', 'event', 'media-library5o48Pf', '1687772368.png', 'image/png', 'media', 'media', 607395, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:39:28', '2023-06-26 04:39:40'),
(495, 'App\\Models\\Event', 34, '4a4e9c9c-4f1e-4f45-b57e-2cae13c1341a', 'event', 'media-librarywRAsH4', '1687772370.png', 'image/png', 'media', 'media', 799251, '[]', '{\"type\":\"image\",\"width\":800,\"height\":601,\"ratio\":\"1.331\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:39:30', '2023-06-26 04:39:40'),
(496, 'App\\Models\\Event', 32, 'fd68ee8e-bdfd-4af6-82ef-30581c7fefba', 'event', 'media-libraryzFZpb0', '1687772861.png', 'image/png', 'media', 'media', 751533, '[]', '{\"type\":\"image\",\"width\":800,\"height\":456,\"ratio\":\"1.754\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:47:41', '2023-06-26 04:48:55'),
(497, 'App\\Models\\Event', 32, '90d923b7-c631-4187-a042-f88b5d0af2e9', 'event', 'media-libraryLPzMNx', '1687772862.png', 'image/png', 'media', 'media', 570171, '[]', '{\"type\":\"image\",\"width\":800,\"height\":360,\"ratio\":\"2.222\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:47:42', '2023-06-26 04:48:55'),
(498, 'App\\Models\\Event', 32, '146ee660-c338-43c6-8fb3-8e77319538fd', 'event', 'media-libraryj1NPBk', '1687772865.png', 'image/png', 'media', 'media', 708319, '[]', '{\"type\":\"image\",\"width\":800,\"height\":427,\"ratio\":\"1.874\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:47:45', '2023-06-26 04:48:55'),
(499, 'App\\Models\\Event', 32, '5c9949c2-5643-4a84-a442-1f5f816061c6', 'event', 'media-libraryZYs2gz', '1687772867.png', 'image/png', 'media', 'media', 787993, '[]', '{\"type\":\"image\",\"width\":800,\"height\":480,\"ratio\":\"1.667\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:47:47', '2023-06-26 04:48:56'),
(500, 'App\\Models\\Event', 32, 'e0f67275-a785-4a82-b7e9-90c8ba1004f3', 'event', 'media-libraryUkV9sL', '1687772869.png', 'image/png', 'media', 'media', 776022, '[]', '{\"type\":\"image\",\"width\":800,\"height\":456,\"ratio\":\"1.754\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 04:47:49', '2023-06-26 04:48:56'),
(501, 'App\\Models\\Event', 31, '654bc461-733b-45ac-9123-bf1a91b4a63e', 'event', 'media-libraryECX8Pq', '1687773810.png', 'image/png', 'media', 'media', 854160, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 05:03:30', '2023-06-26 05:05:30'),
(502, 'App\\Models\\Event', 31, 'a44a2c3e-32ed-482f-b944-5c1c82dda96d', 'event', 'media-libraryrGdZMQ', '1687773812.png', 'image/png', 'media', 'media', 736116, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 05:03:32', '2023-06-26 05:05:30'),
(503, 'App\\Models\\Event', 31, '835aca9b-240b-4f09-84ce-b87e093df1a6', 'event', 'media-libraryIPTYhX', '1687773814.png', 'image/png', 'media', 'media', 722148, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 05:03:34', '2023-06-26 05:05:30'),
(504, 'App\\Models\\Event', 31, '57ef15f0-49f3-49d7-b7c4-431fbc209505', 'event', 'media-libraryqUIWk8', '1687773817.png', 'image/png', 'media', 'media', 793586, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 05:03:37', '2023-06-26 05:05:30'),
(505, 'App\\Models\\Event', 31, '9991ecf3-26ff-4bee-ab16-118d7b4fc4f1', 'event', 'media-libraryAEYy8d', '1687773820.png', 'image/png', 'media', 'media', 729260, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 05:03:40', '2023-06-26 05:05:30'),
(506, 'App\\Models\\Event', 31, '834767e9-74fd-44b5-9db6-7e9eacbbec98', 'event', 'media-library45xcTU', '1687773822.png', 'image/png', 'media', 'media', 657781, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 05:03:42', '2023-06-26 05:05:31'),
(507, 'App\\Models\\Event', 31, '77e028ae-3e99-41be-bf2e-14fea4353b61', 'event', 'media-library0CgSqQ', '1687773824.png', 'image/png', 'media', 'media', 664513, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 05:03:44', '2023-06-26 05:05:31'),
(508, 'App\\Models\\Event', 30, '7a071bca-dac1-4958-8f34-2fc86bb6d723', 'event', 'media-libraryYIei29', '1687775779.png', 'image/png', 'media', 'media', 626865, '[]', '{\"type\":\"image\",\"width\":600,\"height\":800,\"ratio\":\"0.75\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 05:36:19', '2023-06-26 05:36:47'),
(509, 'App\\Models\\Event', 30, 'd0fe01db-9c27-490f-952a-57c0d0de1a2f', 'event', 'media-libraryKaf3kd', '1687775782.png', 'image/png', 'media', 'media', 1001847, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 05:36:22', '2023-06-26 05:36:47'),
(510, 'App\\Models\\Event', 30, '0e9737aa-5972-459d-b5aa-f0c422a14c4a', 'event', 'media-librarySF7LsC', '1687775784.png', 'image/png', 'media', 'media', 697310, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 05:36:24', '2023-06-26 05:36:47'),
(511, 'App\\Models\\Event', 30, '68089a99-cb2e-4673-b915-ac83c1ead696', 'event', 'media-librarySHL9t0', '1687775787.png', 'image/png', 'media', 'media', 758987, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 05:36:27', '2023-06-26 05:36:47'),
(512, 'App\\Models\\Event', 30, '56e378df-0d55-405c-bce1-039ec870f68d', 'event', 'media-librarygZAI3z', '1687775789.png', 'image/png', 'media', 'media', 735527, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 05:36:29', '2023-06-26 05:36:47'),
(513, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 514, '1e680420-8efc-41a9-b5f8-977c0238c8ef', 'event', 'media-libraryT7EzUA', '1687776023.png', 'image/png', 'media', 'media', 781291, '[]', '{\"type\":\"image\",\"width\":800,\"height\":797,\"ratio\":\"1.004\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 05:40:23', '2023-06-26 05:40:23'),
(514, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 515, '8460d58b-e857-418e-8c8b-453a766a4242', 'event', 'media-library7q1VVr', '1687776026.png', 'image/png', 'media', 'media', 840285, '[]', '{\"type\":\"image\",\"width\":678,\"height\":800,\"ratio\":\"0.848\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 05:40:26', '2023-06-26 05:40:26'),
(515, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 516, '82b272b1-8a5b-4b18-83d5-42f337be31ec', 'event', 'media-library6ZGFKV', '1687776029.png', 'image/png', 'media', 'media', 985024, '[]', '{\"type\":\"image\",\"width\":800,\"height\":717,\"ratio\":\"1.116\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 05:40:29', '2023-06-26 05:40:29'),
(516, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 517, '31fab877-b916-4cbb-a250-82a19c6f6485', 'event', 'media-librarykz6uIU', '1687776032.png', 'image/png', 'media', 'media', 879263, '[]', '{\"type\":\"image\",\"width\":600,\"height\":800,\"ratio\":\"0.75\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 05:40:32', '2023-06-26 05:40:32'),
(517, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 518, '73f07c5e-6c35-432c-810b-65726f45e254', 'event', 'media-library56h6bz', '1687776034.png', 'image/png', 'media', 'media', 854295, '[]', '{\"type\":\"image\",\"width\":744,\"height\":800,\"ratio\":\"0.93\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 05:40:34', '2023-06-26 05:40:35'),
(518, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 519, '3f1617bd-6147-4c69-a2ca-c8b6a7b8c2fb', 'event', 'media-libraryEMlMUY', '1687776037.png', 'image/png', 'media', 'media', 783678, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 05:40:37', '2023-06-26 05:40:37'),
(519, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 520, '33945495-2e83-4c7e-a0d0-8ec55c1a830d', 'event', 'media-librarybrod3s', '1687776039.png', 'image/png', 'media', 'media', 517931, '[]', '{\"type\":\"image\",\"width\":800,\"height\":395,\"ratio\":\"2.025\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 05:40:39', '2023-06-26 05:40:40'),
(520, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 521, '3ac75e7e-24b4-48a7-be36-6c898afefefd', 'event', 'media-libraryipYxW1', '1687776042.png', 'image/png', 'media', 'media', 925448, '[]', '{\"type\":\"image\",\"width\":800,\"height\":520,\"ratio\":\"1.538\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 05:40:42', '2023-06-26 05:40:42'),
(521, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 522, 'a2364de3-d821-485b-b1d9-d7061f7c4f34', 'event', 'media-librarymdMfCx', '1687776265.png', 'image/png', 'media', 'media', 781291, '[]', '{\"type\":\"image\",\"width\":800,\"height\":797,\"ratio\":\"1.004\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 05:44:25', '2023-06-26 05:44:25'),
(522, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 523, 'fc0f486e-b746-427e-85ba-bd35580bcd94', 'event', 'media-libraryb4YiWO', '1687776267.png', 'image/png', 'media', 'media', 840285, '[]', '{\"type\":\"image\",\"width\":678,\"height\":800,\"ratio\":\"0.848\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 05:44:27', '2023-06-26 05:44:27'),
(523, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 524, '090bc144-dab1-4faa-8b5f-8935c322edc7', 'event', 'media-libraryb6HBfV', '1687776271.png', 'image/png', 'media', 'media', 985024, '[]', '{\"type\":\"image\",\"width\":800,\"height\":717,\"ratio\":\"1.116\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 05:44:31', '2023-06-26 05:44:31'),
(524, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 525, 'ddae0bd8-4f48-4bd0-a2a0-8777bb71e55a', 'event', 'media-library4x3qoE', '1687776273.png', 'image/png', 'media', 'media', 879263, '[]', '{\"type\":\"image\",\"width\":600,\"height\":800,\"ratio\":\"0.75\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 05:44:33', '2023-06-26 05:44:34'),
(525, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 526, '8c5aa57d-d6be-4290-a646-a18e2c0cbbdc', 'event', 'media-libraryTttM0Q', '1687776276.png', 'image/png', 'media', 'media', 854295, '[]', '{\"type\":\"image\",\"width\":744,\"height\":800,\"ratio\":\"0.93\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 05:44:36', '2023-06-26 05:44:37'),
(526, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 527, 'c4cc3b79-dff9-4417-8b38-37f74f1c1048', 'event', 'media-libraryrBvCGq', '1687776279.png', 'image/png', 'media', 'media', 783678, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 05:44:39', '2023-06-26 05:44:39'),
(527, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 528, '2681c804-1673-4af9-bd9e-9d7e2aaf8136', 'event', 'media-libraryOCEOXC', '1687776280.png', 'image/png', 'media', 'media', 517931, '[]', '{\"type\":\"image\",\"width\":800,\"height\":395,\"ratio\":\"2.025\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 05:44:40', '2023-06-26 05:44:41'),
(528, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 529, '893c67eb-44b1-4e09-b13e-c5c715385000', 'event', 'media-libraryCXiSqm', '1687776283.png', 'image/png', 'media', 'media', 925448, '[]', '{\"type\":\"image\",\"width\":800,\"height\":520,\"ratio\":\"1.538\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 05:44:43', '2023-06-26 05:44:43'),
(529, 'App\\Models\\Event', 40, '7ca9dd9e-7799-43ca-a175-9e9ef79cb4a3', 'event', 'media-library7gc8dH', '1687777182.png', 'image/png', 'media', 'media', 736138, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 05:59:42', '2023-06-26 05:59:45'),
(530, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 531, 'a4a81a6c-1324-4b38-a74c-30c019491375', 'event', 'media-library6nZuzK', '1687777304.png', 'image/png', 'media', 'media', 781291, '[]', '{\"type\":\"image\",\"width\":800,\"height\":797,\"ratio\":\"1.004\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 06:01:44', '2023-06-26 06:01:44'),
(531, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 532, '1f1c575f-8e4f-43a3-9a55-714c2f8a3579', 'event', 'media-librarypFJAa3', '1687777306.png', 'image/png', 'media', 'media', 840285, '[]', '{\"type\":\"image\",\"width\":678,\"height\":800,\"ratio\":\"0.848\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 06:01:46', '2023-06-26 06:01:47'),
(532, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 533, 'b99461c2-cea0-4260-b750-52cd8b6dcb42', 'event', 'media-libraryUBDJeX', '1687777309.png', 'image/png', 'media', 'media', 985024, '[]', '{\"type\":\"image\",\"width\":800,\"height\":717,\"ratio\":\"1.116\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 06:01:49', '2023-06-26 06:01:50'),
(533, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 534, '9ce84ffa-a06a-4172-a905-71a27370ea3e', 'event', 'media-libraryHMjtEW', '1687777312.png', 'image/png', 'media', 'media', 879263, '[]', '{\"type\":\"image\",\"width\":600,\"height\":800,\"ratio\":\"0.75\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 06:01:52', '2023-06-26 06:01:52'),
(534, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 535, '908fdf17-49b4-4d46-acd1-94d9a416a488', 'event', 'media-library3ScBQB', '1687777314.png', 'image/png', 'media', 'media', 854295, '[]', '{\"type\":\"image\",\"width\":744,\"height\":800,\"ratio\":\"0.93\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 06:01:54', '2023-06-26 06:01:55'),
(535, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 536, '9cc6379d-eb3c-4c37-bfd9-a3da50dceeb0', 'event', 'media-libraryelJWZ8', '1687777318.png', 'image/png', 'media', 'media', 783678, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 06:01:58', '2023-06-26 06:01:59'),
(536, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 537, 'a4c0b7c0-b3ea-4003-bb6e-bdb69f6acbb5', 'event', 'media-libraryc87TeT', '1687777321.png', 'image/png', 'media', 'media', 517931, '[]', '{\"type\":\"image\",\"width\":800,\"height\":395,\"ratio\":\"2.025\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 06:02:01', '2023-06-26 06:02:01'),
(537, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 538, 'c778a7b1-6e80-4525-9e78-e7210343a343', 'event', 'media-librarykHb5ng', '1687777324.png', 'image/png', 'media', 'media', 925448, '[]', '{\"type\":\"image\",\"width\":800,\"height\":520,\"ratio\":\"1.538\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-06-26 06:02:04', '2023-06-26 06:02:04'),
(538, 'App\\Models\\Event', 41, 'b323aea0-9800-4cf1-8920-1a3f09a42eb7', 'event', 'media-librarykuksES', '1687777394.png', 'image/png', 'media', 'media', 781291, '[]', '{\"type\":\"image\",\"width\":800,\"height\":797,\"ratio\":\"1.004\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:03:14', '2023-06-26 06:03:54'),
(539, 'App\\Models\\Event', 41, '771e87ac-ccd2-4813-a93c-b34fa816a501', 'event', 'media-libraryoRJ6Yo', '1687777397.png', 'image/png', 'media', 'media', 840285, '[]', '{\"type\":\"image\",\"width\":678,\"height\":800,\"ratio\":\"0.848\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:03:17', '2023-06-26 06:03:54'),
(540, 'App\\Models\\Event', 41, '138950c3-9802-4417-99e3-b2a98a4b8470', 'event', 'media-libraryn91BVt', '1687777400.png', 'image/png', 'media', 'media', 985024, '[]', '{\"type\":\"image\",\"width\":800,\"height\":717,\"ratio\":\"1.116\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:03:20', '2023-06-26 06:03:54'),
(541, 'App\\Models\\Event', 41, '4f6c78d7-754a-4743-ad7d-df4dcd676ce3', 'event', 'media-libraryWQ557U', '1687777403.png', 'image/png', 'media', 'media', 879263, '[]', '{\"type\":\"image\",\"width\":600,\"height\":800,\"ratio\":\"0.75\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:03:23', '2023-06-26 06:03:54'),
(542, 'App\\Models\\Event', 41, 'f918363e-ca33-4525-b878-ed0cec8c8f9c', 'event', 'media-librarytFJY0S', '1687777406.png', 'image/png', 'media', 'media', 854295, '[]', '{\"type\":\"image\",\"width\":744,\"height\":800,\"ratio\":\"0.93\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:03:26', '2023-06-26 06:03:54'),
(543, 'App\\Models\\Event', 41, '8ae0cd83-3c78-4c25-b7bb-ca52c42de9f3', 'event', 'media-library4n9UzG', '1687777409.png', 'image/png', 'media', 'media', 783678, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:03:29', '2023-06-26 06:03:54'),
(544, 'App\\Models\\Event', 41, '8c695ab8-3dc1-4bff-bb79-e44309a6caf1', 'event', 'media-libraryAKCItZ', '1687777411.png', 'image/png', 'media', 'media', 517931, '[]', '{\"type\":\"image\",\"width\":800,\"height\":395,\"ratio\":\"2.025\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:03:31', '2023-06-26 06:03:54'),
(545, 'App\\Models\\Event', 41, '481c85f9-d08e-4288-8ac1-dda7c33d506c', 'event', 'media-libraryINerTi', '1687777415.png', 'image/png', 'media', 'media', 925448, '[]', '{\"type\":\"image\",\"width\":800,\"height\":520,\"ratio\":\"1.538\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:03:35', '2023-06-26 06:03:54'),
(546, 'App\\Models\\Event', 42, '4ba672fd-ad30-4837-8b5c-7db07a94b752', 'event', 'media-librarygLN0SY', '1687777773.png', 'image/png', 'media', 'media', 797604, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:09:33', '2023-06-26 06:10:12'),
(547, 'App\\Models\\Event', 42, '6adaa255-ea4c-46da-aa43-c0e65e75ba43', 'event', 'media-librarybSUrcO', '1687777776.png', 'image/png', 'media', 'media', 811422, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:09:36', '2023-06-26 06:10:12'),
(548, 'App\\Models\\Event', 42, '9d11e613-87ac-4152-b077-198defee392b', 'event', 'media-libraryQ6HrHA', '1687777778.png', 'image/png', 'media', 'media', 823539, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:09:38', '2023-06-26 06:10:12'),
(549, 'App\\Models\\Event', 42, 'de2a8d21-7da1-489b-a7f6-0c996dbea60f', 'event', 'media-library34blzd', '1687777782.png', 'image/png', 'media', 'media', 738960, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:09:42', '2023-06-26 06:10:12'),
(550, 'App\\Models\\Event', 42, '2a815936-e020-4eff-a024-4f2295944af9', 'event', 'media-libraryvRycMh', '1687777785.png', 'image/png', 'media', 'media', 933753, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:09:45', '2023-06-26 06:10:12'),
(551, 'App\\Models\\Event', 42, 'd23fc75d-ae4a-470d-9588-5db316d472d9', 'event', 'media-libraryGoUWT9', '1687777788.png', 'image/png', 'media', 'media', 871041, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:09:48', '2023-06-26 06:10:12'),
(552, 'App\\Models\\Event', 43, 'adb2e9c1-80da-4bcc-86a1-ac3e4b9c5628', 'event', 'media-librarycvHR7I', '1687778035.png', 'image/png', 'media', 'media', 717445, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:13:55', '2023-06-26 06:15:09');
INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(553, 'App\\Models\\Event', 43, 'dd6ff39e-0fe9-4f80-bd5c-2c3bcc87dd86', 'event', 'media-library2Ul70B', '1687778040.png', 'image/png', 'media', 'media', 737186, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:14:00', '2023-06-26 06:15:09'),
(554, 'App\\Models\\Event', 43, 'ab17e694-cb27-4194-a5d7-d451b5dd7a2c', 'event', 'media-libraryY44RQA', '1687778044.png', 'image/png', 'media', 'media', 679146, '[]', '{\"type\":\"image\",\"width\":800,\"height\":483,\"ratio\":\"1.656\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:14:04', '2023-06-26 06:15:09'),
(555, 'App\\Models\\Event', 43, '151023d8-91c2-43ee-addd-c3467fa99e50', 'event', 'media-librarybnJjRB', '1687778047.png', 'image/png', 'media', 'media', 774855, '[]', '{\"type\":\"image\",\"width\":800,\"height\":515,\"ratio\":\"1.553\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:14:07', '2023-06-26 06:15:09'),
(556, 'App\\Models\\Event', 43, 'd5b68d4d-cd9e-44b9-8042-9143ef93c167', 'event', 'media-libraryw3s6yo', '1687778050.png', 'image/png', 'media', 'media', 736138, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:14:10', '2023-06-26 06:15:09'),
(557, 'App\\Models\\Event', 43, 'bcf98acb-3339-4437-910b-111ec8a2626f', 'event', 'media-libraryVCA2qJ', '1687778058.png', 'image/png', 'media', 'media', 831530, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:14:18', '2023-06-26 06:15:09'),
(558, 'App\\Models\\Event', 44, 'e3b7e576-14ea-441b-8989-14a4285ccc15', 'event', 'media-libraryQ2lwUk', '1687778416.png', 'image/png', 'media', 'media', 855753, '[]', '{\"type\":\"image\",\"width\":800,\"height\":534,\"ratio\":\"1.498\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:20:16', '2023-06-26 06:51:24'),
(559, 'App\\Models\\Event', 44, 'c16b1410-111f-4f00-b267-059993ebc146', 'event', 'media-libraryiHDluz', '1687778419.png', 'image/png', 'media', 'media', 857506, '[]', '{\"type\":\"image\",\"width\":800,\"height\":534,\"ratio\":\"1.498\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:20:19', '2023-06-26 06:51:24'),
(560, 'App\\Models\\Event', 44, '8d47c627-100c-4172-9752-cc3f32bccc12', 'event', 'media-libraryrSGGi8', '1687778423.png', 'image/png', 'media', 'media', 964463, '[]', '{\"type\":\"image\",\"width\":800,\"height\":534,\"ratio\":\"1.498\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:20:23', '2023-06-26 06:51:24'),
(561, 'App\\Models\\Event', 44, 'd48f7900-d15e-4a31-b713-e254475f301c', 'event', 'media-libraryvHo5ni', '1687778425.png', 'image/png', 'media', 'media', 512430, '[]', '{\"type\":\"image\",\"width\":800,\"height\":534,\"ratio\":\"1.498\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:20:25', '2023-06-26 06:51:24'),
(562, 'App\\Models\\Event', 44, 'fda41dcc-e272-4c3c-b398-e2d50219df73', 'event', 'media-libraryrSrXzR', '1687778427.png', 'image/png', 'media', 'media', 227608, '[]', '{\"type\":\"image\",\"width\":559,\"height\":800,\"ratio\":\"0.699\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:20:27', '2023-06-26 06:51:24'),
(563, 'App\\Models\\Event', 44, '9985b88a-6b9e-47c4-afaa-b45cb7a3b094', 'event', 'media-libraryGmKCD9', '1687778430.png', 'image/png', 'media', 'media', 910399, '[]', '{\"type\":\"image\",\"width\":800,\"height\":534,\"ratio\":\"1.498\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:20:30', '2023-06-26 06:51:24'),
(564, 'App\\Models\\Event', 44, 'caefe221-220a-42dc-aa2c-c096a2f7ee27', 'event', 'media-libraryT3HTaT', '1687778432.png', 'image/png', 'media', 'media', 790090, '[]', '{\"type\":\"image\",\"width\":800,\"height\":534,\"ratio\":\"1.498\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:20:32', '2023-06-26 06:51:24'),
(565, 'App\\Models\\Event', 44, '724fc44a-9e2d-4294-b0da-7416588ba051', 'event', 'media-libraryKjGmiQ', '1687778435.png', 'image/png', 'media', 'media', 841748, '[]', '{\"type\":\"image\",\"width\":800,\"height\":534,\"ratio\":\"1.498\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:20:35', '2023-06-26 06:51:24'),
(566, 'App\\Models\\Event', 44, '3383896f-dace-4e1a-b572-7cf6df5230a8', 'event', 'media-libraryzsKNJO', '1687778439.png', 'image/png', 'media', 'media', 876514, '[]', '{\"type\":\"image\",\"width\":800,\"height\":534,\"ratio\":\"1.498\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:20:39', '2023-06-26 06:51:24'),
(567, 'App\\Models\\Event', 44, '5f2bab0a-90ff-453c-9448-db9224f9943a', 'event', 'media-libraryDtVrAD', '1687778441.png', 'image/png', 'media', 'media', 483848, '[]', '{\"type\":\"image\",\"width\":800,\"height\":339,\"ratio\":\"2.36\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:20:41', '2023-06-26 06:51:24'),
(568, 'App\\Models\\Event', 45, '978d67b9-d48a-4de0-b2e1-6694f904c166', 'event', 'media-library0MNlnr', '1687780564.png', 'image/png', 'media', 'media', 895291, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:56:04', '2023-06-26 06:57:32'),
(569, 'App\\Models\\Event', 45, '10874643-935d-4869-bb73-8ba0ae35de0a', 'event', 'media-libraryBBP5RI', '1687780572.png', 'image/png', 'media', 'media', 755138, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:56:12', '2023-06-26 06:57:32'),
(570, 'App\\Models\\Event', 45, '5442f670-76b4-49cd-b9c1-f52617215897', 'event', 'media-library0H05gP', '1687780579.png', 'image/png', 'media', 'media', 774170, '[]', '{\"type\":\"image\",\"width\":800,\"height\":448,\"ratio\":\"1.786\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:56:19', '2023-06-26 06:57:32'),
(571, 'App\\Models\\Event', 45, '2afd4b90-6743-4a29-b1c0-988ff5344866', 'event', 'media-libraryazcms7', '1687780591.png', 'image/png', 'media', 'media', 733616, '[]', '{\"type\":\"image\",\"width\":800,\"height\":448,\"ratio\":\"1.786\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:56:31', '2023-06-26 06:57:32'),
(572, 'App\\Models\\Event', 45, 'bcae3d0f-7ed7-4118-a20c-753e0e60b2cf', 'event', 'media-libraryMCiq09', '1687780598.png', 'image/png', 'media', 'media', 678924, '[]', '{\"type\":\"image\",\"width\":800,\"height\":446,\"ratio\":\"1.794\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:56:38', '2023-06-26 06:57:32'),
(573, 'App\\Models\\Event', 45, 'a41185dd-7571-45c7-b5ef-208240aa7236', 'event', 'media-library4fZZgS', '1687780603.png', 'image/png', 'media', 'media', 710255, '[]', '{\"type\":\"image\",\"width\":800,\"height\":448,\"ratio\":\"1.786\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:56:43', '2023-06-26 06:57:33'),
(574, 'App\\Models\\Event', 45, '3b8f4525-9124-4dba-9851-80127fa0d485', 'event', 'media-libraryOsqJow', '1687780608.png', 'image/png', 'media', 'media', 666162, '[]', '{\"type\":\"image\",\"width\":800,\"height\":447,\"ratio\":\"1.79\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:56:48', '2023-06-26 06:57:33'),
(575, 'App\\Models\\Event', 45, 'a9114628-9925-4663-902f-b41d6e7a03c5', 'event', 'media-library0zewDI', '1687780619.png', 'image/png', 'media', 'media', 737487, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:56:59', '2023-06-26 06:57:33'),
(576, 'App\\Models\\Event', 45, '00024422-6e37-4aaf-b5fd-89aa8948fc3f', 'event', 'media-libraryOk5LNT', '1687780627.png', 'image/png', 'media', 'media', 730380, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:57:07', '2023-06-26 06:57:33'),
(577, 'App\\Models\\Event', 45, '3d086f11-17d8-4c3b-9984-c38932b81e4b', 'event', 'media-librarypocv5X', '1687780632.png', 'image/png', 'media', 'media', 750501, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 06:57:12', '2023-06-26 06:57:33'),
(578, 'App\\Models\\Event', 46, 'f227c4c6-891e-4c17-bdae-a9d0d315fb3a', 'event', 'media-libraryCS2uYv', '1687780896.png', 'image/png', 'media', 'media', 732193, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:01:36', '2023-06-26 07:03:07'),
(579, 'App\\Models\\Event', 46, '4aea5ade-ae6f-4f18-8f37-d2edc667ccea', 'event', 'media-libraryQV5Ldl', '1687780907.png', 'image/png', 'media', 'media', 767610, '[]', '{\"type\":\"image\",\"width\":533,\"height\":800,\"ratio\":\"0.666\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:01:47', '2023-06-26 07:03:07'),
(580, 'App\\Models\\Event', 46, 'b8f54764-33e4-44d8-a263-efd3bf1b685b', 'event', 'media-librarygZZxy9', '1687780921.png', 'image/png', 'media', 'media', 692989, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:02:01', '2023-06-26 07:03:07'),
(581, 'App\\Models\\Event', 46, '99db9785-d5f4-4258-88e7-b7137cb56f4a', 'event', 'media-libraryWSbmP3', '1687780933.png', 'image/png', 'media', 'media', 777672, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:02:13', '2023-06-26 07:03:07'),
(582, 'App\\Models\\Event', 46, '67d35c29-3c6d-40bc-aa89-87fda6754b08', 'event', 'media-libraryvKdKoK', '1687780939.png', 'image/png', 'media', 'media', 765750, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:02:19', '2023-06-26 07:03:07'),
(583, 'App\\Models\\Event', 46, '6bf148c7-7fb5-482e-bb9c-e268d78f3e49', 'event', 'media-libraryIQL9mW', '1687780950.png', 'image/png', 'media', 'media', 797239, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:02:30', '2023-06-26 07:03:07'),
(584, 'App\\Models\\Event', 47, 'ac1aa717-28e1-4795-9ded-91dc9dacf13d', 'event', 'media-libraryRXe7v5', '1687781229.png', 'image/png', 'media', 'media', 866704, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:07:09', '2023-06-26 07:08:17'),
(585, 'App\\Models\\Event', 47, '2178e6ac-7174-4649-a9ea-6e88d539f7d3', 'event', 'media-librarybIKr3N', '1687781239.png', 'image/png', 'media', 'media', 822206, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:07:19', '2023-06-26 07:08:17'),
(586, 'App\\Models\\Event', 47, 'a1da3d57-a9d5-40d4-9050-3df5516e23c7', 'event', 'media-libraryeUWM6A', '1687781252.png', 'image/png', 'media', 'media', 780129, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:07:32', '2023-06-26 07:08:17'),
(587, 'App\\Models\\Event', 47, '22e8e772-28c0-4e87-b96e-303a328e454b', 'event', 'media-libraryCGJXwk', '1687781257.png', 'image/png', 'media', 'media', 796727, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:07:37', '2023-06-26 07:08:17'),
(588, 'App\\Models\\Event', 47, '14c64034-5ac4-4bdd-a7b3-99aee7da60b0', 'event', 'media-libraryZptdDP', '1687781263.png', 'image/png', 'media', 'media', 848066, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:07:43', '2023-06-26 07:08:17'),
(589, 'App\\Models\\Event', 48, '696351c5-1d22-4ef2-8b13-fa5ef12a960a', 'event', 'media-libraryG1U6bh', '1687781456.png', 'image/png', 'media', 'media', 672781, '[]', '{\"type\":\"image\",\"width\":742,\"height\":556,\"ratio\":\"1.335\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:10:56', '2023-06-26 07:11:52'),
(590, 'App\\Models\\Event', 48, 'ce71e09f-386e-4f77-844f-1d6df22f0dde', 'event', 'media-librarykOrVWV', '1687781461.png', 'image/png', 'media', 'media', 720862, '[]', '{\"type\":\"image\",\"width\":778,\"height\":575,\"ratio\":\"1.353\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:11:01', '2023-06-26 07:11:52'),
(591, 'App\\Models\\Event', 48, 'efdc0243-543d-4189-bf96-c0404a1465c6', 'event', 'media-library6dnUYS', '1687781471.png', 'image/png', 'media', 'media', 802053, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:11:11', '2023-06-26 07:11:52'),
(592, 'App\\Models\\Event', 48, '1c94470f-18e2-4338-9923-9f730094a618', 'event', 'media-libraryhFeAmE', '1687781476.png', 'image/png', 'media', 'media', 784469, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:11:16', '2023-06-26 07:11:52'),
(593, 'App\\Models\\Event', 48, 'b7ade0c8-832b-4f29-a1fe-85c5f799e627', 'event', 'media-librarySvRBEf', '1687781479.png', 'image/png', 'media', 'media', 541051, '[]', '{\"type\":\"image\",\"width\":632,\"height\":514,\"ratio\":\"1.23\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:11:19', '2023-06-26 07:11:53'),
(594, 'App\\Models\\Event', 48, 'c389e16c-de31-41af-90d2-f099b0d2905a', 'event', 'media-libraryVkwilG', '1687781483.png', 'image/png', 'media', 'media', 800438, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:11:23', '2023-06-26 07:11:53'),
(595, 'App\\Models\\Event', 48, '9bf4889b-0da5-454d-9f31-a5c5fabd2ae9', 'event', 'media-library1addjs', '1687781488.png', 'image/png', 'media', 'media', 809141, '[]', '{\"type\":\"image\",\"width\":800,\"height\":599,\"ratio\":\"1.336\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:11:28', '2023-06-26 07:11:53'),
(596, 'App\\Models\\Event', 48, '726c895a-6bc4-4a56-adfe-198feae5d44b', 'event', 'media-libraryuSbZ4r', '1687781493.png', 'image/png', 'media', 'media', 780575, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:11:33', '2023-06-26 07:11:53'),
(597, 'App\\Models\\Event', 49, '40d5b8c4-8a7a-48a0-a204-4082dd0796e7', 'event', 'media-library7uSn9q', '1687781562.png', 'image/png', 'media', 'media', 835850, '[]', '{\"type\":\"image\",\"width\":800,\"height\":574,\"ratio\":\"1.394\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:12:42', '2023-06-26 07:14:09'),
(598, 'App\\Models\\Event', 49, 'f2fa4c2a-7b14-4a4a-8a7a-4ec738616070', 'event', 'media-libraryzHy20I', '1687781567.png', 'image/png', 'media', 'media', 656892, '[]', '{\"type\":\"image\",\"width\":800,\"height\":566,\"ratio\":\"1.413\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:12:47', '2023-06-26 07:14:09'),
(599, 'App\\Models\\Event', 49, '9186c7db-e65d-42b5-92eb-90398e0d227e', 'event', 'media-library0k0YNa', '1687781570.png', 'image/png', 'media', 'media', 651064, '[]', '{\"type\":\"image\",\"width\":800,\"height\":564,\"ratio\":\"1.418\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:12:50', '2023-06-26 07:14:09'),
(600, 'App\\Models\\Event', 49, '717b4284-2c32-45c6-9844-51e5430aeb3b', 'event', 'media-library4TCJkm', '1687781573.png', 'image/png', 'media', 'media', 479258, '[]', '{\"type\":\"image\",\"width\":428,\"height\":571,\"ratio\":\"0.75\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:12:53', '2023-06-26 07:14:10'),
(601, 'App\\Models\\Event', 49, '7da5245e-07e9-4f8a-be50-3c5be9cd73ff', 'event', 'media-library9p7bCV', '1687781578.png', 'image/png', 'media', 'media', 916623, '[]', '{\"type\":\"image\",\"width\":800,\"height\":570,\"ratio\":\"1.404\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"event\":true}', '[]', 1, '2023-06-26 07:12:58', '2023-06-26 07:14:10'),
(602, 'App\\Models\\Download', 14, '181197de-165a-4711-8b97-f95edd71a51c', 'download', '1686897079', '1686897079.pdf', 'application/pdf', 'media', 'media', 212883, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2023-07-03 06:32:05', '2023-07-03 06:32:07'),
(603, 'App\\Models\\News', 13, 'feb0fd3b-3f44-4323-90db-aa7ffed5b8d7', 'news', 'media-library63WnTQ', '1688384116.png', 'image/png', 'media', 'media', 49783, '[]', '{\"type\":\"image\",\"width\":193,\"height\":122,\"ratio\":\"1.582\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-03 06:35:16', '2023-07-03 06:35:21'),
(604, 'App\\Models\\News', 14, '5bf6f690-a150-478f-91c3-a35de30fe88c', 'news', 'media-librarybWZmS9', '1688384146.png', 'image/png', 'media', 'media', 41267, '[]', '{\"type\":\"image\",\"width\":178,\"height\":122,\"ratio\":\"1.459\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-03 06:35:46', '2023-07-03 06:35:47'),
(605, 'App\\Models\\News', 15, '869ed145-94c4-486f-9392-8c6a581f0d5d', 'news', 'media-libraryGCyuXh', '1688384170.png', 'image/png', 'media', 'media', 236625, '[]', '{\"type\":\"image\",\"width\":612,\"height\":457,\"ratio\":\"1.339\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-03 06:36:10', '2023-07-03 06:36:15'),
(606, 'App\\Models\\News', 16, '52a26af2-fffd-4c07-9348-eb5feae92786', 'news', 'media-libraryYQ1nKq', '1688384235.png', 'image/png', 'media', 'media', 32784, '[]', '{\"type\":\"image\",\"width\":183,\"height\":122,\"ratio\":\"1.5\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-03 06:37:15', '2023-07-03 06:37:18'),
(607, 'App\\Models\\Download', 13, '214d6134-5d8c-4520-a6dd-6b65245970fb', 'download', '1683183688', '1683183688.pdf', 'application/pdf', 'media', 'media', 765296, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2023-07-03 06:39:38', '2023-07-03 06:39:41'),
(608, 'App\\Models\\Download', 12, 'cba5eccd-4295-4f9d-bf70-3a91620fb37e', 'download', '1683021156', '1683021156.pdf', 'application/pdf', 'media', 'media', 987001, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2023-07-03 06:42:08', '2023-07-03 06:42:09'),
(609, 'App\\Models\\Download', 11, '8dcb6fbc-cdb9-4ca2-a5bb-1ea3da8cc5ce', 'download', '1681120533', '1681120533.pdf', 'application/pdf', 'media', 'media', 464987, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2023-07-03 06:43:15', '2023-07-03 06:43:18'),
(610, 'App\\Models\\Download', 8, '79841b3e-2a56-4148-87c0-a5f3d1e0af15', 'download', '1678176500', '1678176500.pdf', 'application/pdf', 'media', 'media', 506356, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2023-07-03 06:44:25', '2023-07-03 06:44:27'),
(611, 'App\\Models\\Download', 6, '7dfa90f1-15c1-4564-bc69-51fb6bfbceca', 'download', '1671268136', '1671268136.pdf', 'application/pdf', 'media', 'media', 573602, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2023-07-03 06:45:36', '2023-07-03 06:45:39'),
(612, 'App\\Models\\Download', 15, '4309c4ac-e56a-4730-8c03-7348168b70f7', 'download', '1669114180', '1669114180.pdf', 'application/pdf', 'media', 'media', 428972, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2023-07-03 07:25:18', '2023-07-03 07:25:25'),
(613, 'App\\Models\\Download', 16, 'fada2da8-1634-42e0-8dc7-7f6c755dc56b', 'download', '1669112659', '1669112659.pdf', 'application/pdf', 'media', 'media', 577375, '[]', '{\"type\":\"document\",\"status\":\"processing\",\"progress\":100}', '[]', '[]', 1, '2023-07-03 07:26:30', '2023-07-03 07:26:32'),
(615, 'App\\Models\\Gallary', 3, 'f7ffff29-5ae6-4881-aeb7-0d02a03c0aa6', 'gallary', 'media-libraryriA6NE', '1688707972.png', 'image/png', 'media', 'media', 484388, '[]', '{\"type\":\"image\",\"width\":600,\"height\":800,\"ratio\":\"0.75\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:32:52', '2023-07-07 00:33:33'),
(616, 'App\\Models\\Gallary', 3, '6c8902ae-830d-4114-aeb9-47271772f4ab', 'gallary', 'media-librarywqcIQ5', '1688707975.png', 'image/png', 'media', 'media', 782048, '[]', '{\"type\":\"image\",\"width\":800,\"height\":496,\"ratio\":\"1.613\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:32:55', '2023-07-07 00:33:33'),
(617, 'App\\Models\\Gallary', 3, '699736e1-9e8e-4afa-8261-dc4bbb537b2e', 'gallary', 'media-librarynX13uo', '1688707978.png', 'image/png', 'media', 'media', 897140, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:32:58', '2023-07-07 00:33:34'),
(618, 'App\\Models\\Gallary', 3, 'fcf1d484-2433-4884-aeca-8ebe4d8072ad', 'gallary', 'media-libraryjSufDx', '1688707980.png', 'image/png', 'media', 'media', 885083, '[]', '{\"type\":\"image\",\"width\":600,\"height\":800,\"ratio\":\"0.75\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:33:00', '2023-07-07 00:33:34'),
(619, 'App\\Models\\Gallary', 3, '9245ae7e-2c02-4c2f-98c9-08c9fcea4eaa', 'gallary', 'media-library08sGt2', '1688707983.png', 'image/png', 'media', 'media', 914328, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:33:03', '2023-07-07 00:33:34'),
(620, 'App\\Models\\Gallary', 3, '2b5d5c5c-c92c-4729-b56c-8c33b4bc4e76', 'gallary', 'media-libraryySRKHN', '1688707986.png', 'image/png', 'media', 'media', 913383, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:33:06', '2023-07-07 00:33:34'),
(621, 'App\\Models\\Gallary', 3, '0860f4a8-f073-4b16-9f43-d410e5b4b48b', 'gallary', 'media-libraryCpQFgy', '1688707988.png', 'image/png', 'media', 'media', 842648, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:33:08', '2023-07-07 00:33:34'),
(622, 'App\\Models\\Gallary', 3, 'a82733b0-fc92-48d8-bd3e-d4e3dcc3f353', 'gallary', 'media-libraryC5Cxjn', '1688707990.png', 'image/png', 'media', 'media', 674542, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:33:10', '2023-07-07 00:33:34'),
(623, 'App\\Models\\Gallary', 3, 'b906f538-fdb2-4135-9e94-123dfb921009', 'gallary', 'media-libraryqc0glD', '1688707992.png', 'image/png', 'media', 'media', 621707, '[]', '{\"type\":\"image\",\"width\":563,\"height\":800,\"ratio\":\"0.704\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:33:12', '2023-07-07 00:33:34'),
(624, 'App\\Models\\Gallary', 3, '01e51348-7669-4e91-a29e-823038a22027', 'gallary', 'media-libraryXJbet5', '1688707994.png', 'image/png', 'media', 'media', 826969, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:33:14', '2023-07-07 00:33:34'),
(625, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 626, '0ad4309d-53c6-42ee-aab3-5104760afec5', 'gallary', 'media-librarydnXopc', '1688708131.png', 'image/png', 'media', 'media', 649140, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-07 00:35:31', '2023-07-07 00:35:32'),
(626, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 627, 'f705a866-7476-4201-aeaa-e17a7837c5b5', 'gallary', 'media-libraryv963Sx', '1688708133.png', 'image/png', 'media', 'media', 607395, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-07 00:35:33', '2023-07-07 00:35:33'),
(627, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 628, '64c24e9d-ed8b-44a6-b7de-bf99a2d94b94', 'gallary', 'media-librarytFk43I', '1688708135.png', 'image/png', 'media', 'media', 799251, '[]', '{\"type\":\"image\",\"width\":800,\"height\":601,\"ratio\":\"1.331\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-07 00:35:35', '2023-07-07 00:35:36'),
(628, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 629, '86da3d35-2683-4767-9a26-b2d059db4e2b', 'gallary', 'media-libraryjsiB5j', '1688708137.png', 'image/png', 'media', 'media', 799251, '[]', '{\"type\":\"image\",\"width\":800,\"height\":601,\"ratio\":\"1.331\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-07 00:35:37', '2023-07-07 00:35:38'),
(629, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 630, 'a2208e0f-1828-469a-bfdd-2792d27738c4', 'gallary', 'media-library1oocrh', '1688708174.png', 'image/png', 'media', 'media', 649140, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-07 00:36:14', '2023-07-07 00:36:15'),
(630, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 631, '5ab02bed-7549-45e1-b43c-66c6948199db', 'gallary', 'media-libraryGkZKtO', '1688708176.png', 'image/png', 'media', 'media', 607395, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-07 00:36:16', '2023-07-07 00:36:16'),
(631, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 632, 'f499c463-b846-40ad-8b17-89e117f37958', 'gallary', 'media-libraryx4xm2t', '1688708178.png', 'image/png', 'media', 'media', 799251, '[]', '{\"type\":\"image\",\"width\":800,\"height\":601,\"ratio\":\"1.331\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-07 00:36:18', '2023-07-07 00:36:19'),
(632, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 633, '93e9cc45-c7e3-4cf7-a43f-f8a220c42386', 'gallary', 'media-librarya9eofr', '1688708181.png', 'image/png', 'media', 'media', 799251, '[]', '{\"type\":\"image\",\"width\":800,\"height\":601,\"ratio\":\"1.331\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-07 00:36:21', '2023-07-07 00:36:21'),
(633, 'App\\Models\\Gallary', 6, '1049a698-4f97-46dc-866c-cf08d9a5576b', 'gallary', 'media-libraryMWaIhN', '1688708273.png', 'image/png', 'media', 'media', 649140, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:37:53', '2023-07-07 00:38:16'),
(634, 'App\\Models\\Gallary', 6, '2d1b6ab3-cf88-447b-8567-a0a101235af0', 'gallary', 'media-librarygQ4VDV', '1688708277.png', 'image/png', 'media', 'media', 607395, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:37:57', '2023-07-07 00:38:16'),
(635, 'App\\Models\\Gallary', 6, '83b9acb4-71e5-44f8-ba5e-ea00fac157c6', 'gallary', 'media-library2AmhxL', '1688708280.png', 'image/png', 'media', 'media', 799251, '[]', '{\"type\":\"image\",\"width\":800,\"height\":601,\"ratio\":\"1.331\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:38:00', '2023-07-07 00:38:16'),
(636, 'App\\Models\\Gallary', 6, 'dd99238a-82e9-4668-8fc7-6a118e2d6b8a', 'gallary', 'media-libraryplsOOj', '1688708282.png', 'image/png', 'media', 'media', 799251, '[]', '{\"type\":\"image\",\"width\":800,\"height\":601,\"ratio\":\"1.331\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:38:02', '2023-07-07 00:38:16'),
(637, 'App\\Models\\Gallary', 7, 'b9423044-e8f1-46f7-8fd6-08963d05833d', 'gallary', 'media-libraryFhEQru', '1688708357.png', 'image/png', 'media', 'media', 751533, '[]', '{\"type\":\"image\",\"width\":800,\"height\":456,\"ratio\":\"1.754\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:39:17', '2023-07-07 00:39:29'),
(638, 'App\\Models\\Gallary', 7, '33b6af86-c677-4ddf-9c89-bf78d987eaf1', 'gallary', 'media-libraryxjD6Bc', '1688708359.png', 'image/png', 'media', 'media', 570171, '[]', '{\"type\":\"image\",\"width\":800,\"height\":360,\"ratio\":\"2.222\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:39:19', '2023-07-07 00:39:29'),
(639, 'App\\Models\\Gallary', 7, '5bd4e61e-edd4-484b-91b0-5e3d179dc1bd', 'gallary', 'media-library10plPA', '1688708360.png', 'image/png', 'media', 'media', 708319, '[]', '{\"type\":\"image\",\"width\":800,\"height\":427,\"ratio\":\"1.874\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:39:20', '2023-07-07 00:39:29'),
(640, 'App\\Models\\Gallary', 7, '7aebe9ce-7d70-4401-b117-912f0a5aa9eb', 'gallary', 'media-librarymCFgbC', '1688708363.png', 'image/png', 'media', 'media', 787993, '[]', '{\"type\":\"image\",\"width\":800,\"height\":480,\"ratio\":\"1.667\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:39:23', '2023-07-07 00:39:29'),
(641, 'App\\Models\\Gallary', 7, '56a08cc2-e8e6-46dc-a542-4f5e9df09fea', 'gallary', 'media-libraryJcKD4l', '1688708365.png', 'image/png', 'media', 'media', 776022, '[]', '{\"type\":\"image\",\"width\":800,\"height\":456,\"ratio\":\"1.754\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:39:25', '2023-07-07 00:39:29'),
(642, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 643, '4d8fb0ff-2196-454d-8118-afd79488ea62', 'gallary', 'media-library2tzOY7', '1688708482.png', 'image/png', 'media', 'media', 854160, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-07 00:41:22', '2023-07-07 00:41:22'),
(643, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 644, '1f4ec969-d48c-4a3a-bbf7-665a651d3c89', 'gallary', 'media-librarymKVtoL', '1688708484.png', 'image/png', 'media', 'media', 736116, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-07 00:41:24', '2023-07-07 00:41:25'),
(644, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 645, '674f6919-0072-4495-8d82-22393dc7ef04', 'gallary', 'media-library1QQqWS', '1688708487.png', 'image/png', 'media', 'media', 722148, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-07 00:41:27', '2023-07-07 00:41:28'),
(645, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 646, '960d4685-c301-4bfa-8d83-6b6a5c9ce010', 'gallary', 'media-libraryCzaVyP', '1688708490.png', 'image/png', 'media', 'media', 793586, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-07 00:41:30', '2023-07-07 00:41:30'),
(646, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 647, '63b91a24-ed3b-443d-8b59-bfbd4fd30ff4', 'gallary', 'media-librarym8rD3d', '1688708492.png', 'image/png', 'media', 'media', 729260, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-07 00:41:32', '2023-07-07 00:41:32'),
(647, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 648, '2d34f815-7fcd-4a09-bb59-14d69365537c', 'gallary', 'media-library5Q4yyc', '1688708493.png', 'image/png', 'media', 'media', 657781, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-07 00:41:33', '2023-07-07 00:41:34'),
(648, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 649, 'f70056f1-0eff-4f0e-92b0-3d49b8d430d2', 'gallary', 'media-libraryC9afbL', '1688708495.png', 'image/png', 'media', 'media', 664513, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-07 00:41:35', '2023-07-07 00:41:36'),
(649, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 650, 'ee820318-56c3-446e-a24a-6d1e4fef04af', 'gallary', 'media-libraryj3E74n', '1688708497.png', 'image/png', 'media', 'media', 664513, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-07 00:41:37', '2023-07-07 00:41:37'),
(650, 'App\\Models\\Gallary', 8, '23614809-7ed0-4763-94df-7c005796156d', 'gallary', 'media-librarylvxZHh', '1688708522.png', 'image/png', 'media', 'media', 854160, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:42:02', '2023-07-07 00:42:23'),
(651, 'App\\Models\\Gallary', 8, '50af772c-291a-4715-a2aa-12e9b25a8268', 'gallary', 'media-libraryuSCjYn', '1688708524.png', 'image/png', 'media', 'media', 736116, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:42:04', '2023-07-07 00:42:24'),
(652, 'App\\Models\\Gallary', 8, '1055e786-05a0-4068-9cab-a77d7d43b346', 'gallary', 'media-libraryXtBKPp', '1688708526.png', 'image/png', 'media', 'media', 722148, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:42:06', '2023-07-07 00:42:24'),
(653, 'App\\Models\\Gallary', 8, '8fe8cfe9-8837-4fea-a302-9ee0034fea25', 'gallary', 'media-librarydrXlvc', '1688708528.png', 'image/png', 'media', 'media', 793586, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:42:08', '2023-07-07 00:42:24'),
(654, 'App\\Models\\Gallary', 8, '87ee500f-c537-4c65-931e-3a3a2dae7129', 'gallary', 'media-library9gXzz6', '1688708531.png', 'image/png', 'media', 'media', 729260, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:42:11', '2023-07-07 00:42:24'),
(655, 'App\\Models\\Gallary', 8, 'cb321b2f-3dd1-4faf-8cd2-4716dd7df984', 'gallary', 'media-librarydJm6mC', '1688708533.png', 'image/png', 'media', 'media', 657781, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:42:13', '2023-07-07 00:42:24'),
(656, 'App\\Models\\Gallary', 8, 'f90147aa-5de3-4303-8f3c-b8196469b8e7', 'gallary', 'media-libraryy1Nhf3', '1688708534.png', 'image/png', 'media', 'media', 664513, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:42:14', '2023-07-07 00:42:24'),
(657, 'App\\Models\\Gallary', 8, '3f114c39-b6c5-421f-8fee-c0af6eee78de', 'gallary', 'media-librarydbPhAj', '1688708537.png', 'image/png', 'media', 'media', 664513, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:42:17', '2023-07-07 00:42:24'),
(658, 'App\\Models\\Gallary', 9, '8de9209b-9c8b-4a91-aa56-f9aa44ac8ae1', 'gallary', 'media-libraryZmSYNR', '1688708603.png', 'image/png', 'media', 'media', 626865, '[]', '{\"type\":\"image\",\"width\":600,\"height\":800,\"ratio\":\"0.75\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:43:23', '2023-07-07 00:44:15'),
(659, 'App\\Models\\Gallary', 9, 'b9bb2019-c1f4-4635-9b36-219e7ec6d174', 'gallary', 'media-libraryACVnn1', '1688708605.png', 'image/png', 'media', 'media', 1001847, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:43:25', '2023-07-07 00:44:15'),
(660, 'App\\Models\\Gallary', 9, '6f260413-3394-49e2-ade0-6a83e999fd25', 'gallary', 'media-libraryl5AkLl', '1688708608.png', 'image/png', 'media', 'media', 697310, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:43:28', '2023-07-07 00:44:15'),
(661, 'App\\Models\\Gallary', 10, 'ee7ae2a2-12b9-4525-924e-6748d20a2975', 'gallary', 'media-libraryg1rAZp', '1688708611.png', 'image/png', 'media', 'media', 758987, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:43:31', '2023-07-07 00:44:15'),
(662, 'App\\Models\\Gallary', 9, '4658e4e6-088c-4a05-b420-13beb57d6bb0', 'gallary', 'media-libraryiVdvDO', '1688708614.png', 'image/png', 'media', 'media', 735527, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:43:34', '2023-07-07 00:44:15'),
(663, 'App\\Models\\Gallary', 11, '40f45bc9-f255-4f0c-a54f-45b32baa0549', 'gallary', 'media-librarycgr2PF', '1688708721.png', 'image/png', 'media', 'media', 781291, '[]', '{\"type\":\"image\",\"width\":800,\"height\":797,\"ratio\":\"1.004\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:45:21', '2023-07-07 00:45:44'),
(664, 'App\\Models\\Gallary', 11, 'f6bb134f-0415-415d-93c0-98efbf3512b1', 'gallary', 'media-librarycKduS0', '1688708723.png', 'image/png', 'media', 'media', 840285, '[]', '{\"type\":\"image\",\"width\":678,\"height\":800,\"ratio\":\"0.848\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:45:23', '2023-07-07 00:45:44'),
(665, 'App\\Models\\Gallary', 11, '9ab38623-9f40-440d-98d4-d41cdedbad9a', 'gallary', 'media-library9opEcz', '1688708726.png', 'image/png', 'media', 'media', 985024, '[]', '{\"type\":\"image\",\"width\":800,\"height\":717,\"ratio\":\"1.116\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:45:26', '2023-07-07 00:45:44'),
(666, 'App\\Models\\Gallary', 11, 'b87c0f50-595d-4fca-88e2-47d0f0fc00d5', 'gallary', 'media-libraryoV7uA9', '1688708729.png', 'image/png', 'media', 'media', 879263, '[]', '{\"type\":\"image\",\"width\":600,\"height\":800,\"ratio\":\"0.75\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:45:29', '2023-07-07 00:45:44'),
(667, 'App\\Models\\Gallary', 11, '18d68bbc-c7e3-40a9-a64f-eedf2e73a200', 'gallary', 'media-librarydK4ulp', '1688708732.png', 'image/png', 'media', 'media', 854295, '[]', '{\"type\":\"image\",\"width\":744,\"height\":800,\"ratio\":\"0.93\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:45:32', '2023-07-07 00:45:44'),
(668, 'App\\Models\\Gallary', 11, '0fd22af7-0f31-45cf-be54-9ecf3729a28d', 'gallary', 'media-libraryL6qO7x', '1688708734.png', 'image/png', 'media', 'media', 783678, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:45:34', '2023-07-07 00:45:44'),
(669, 'App\\Models\\Gallary', 11, '43a4d337-b0b0-4e0c-a159-c9938b8d6006', 'gallary', 'media-library7tj0mC', '1688708736.png', 'image/png', 'media', 'media', 517931, '[]', '{\"type\":\"image\",\"width\":800,\"height\":395,\"ratio\":\"2.025\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:45:36', '2023-07-07 00:45:44'),
(670, 'App\\Models\\Gallary', 11, 'f0306446-1dd1-4de1-b7d6-09e6b2d63553', 'gallary', 'media-libraryCN9vFf', '1688708739.png', 'image/png', 'media', 'media', 925448, '[]', '{\"type\":\"image\",\"width\":800,\"height\":520,\"ratio\":\"1.538\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:45:39', '2023-07-07 00:45:44'),
(671, 'App\\Models\\Gallary', 12, '423d4a8e-e1fa-4111-ac1d-cd612a5cfc5c', 'gallary', 'media-libraryG1wrsA', '1688708833.png', 'image/png', 'media', 'media', 796775, '[]', '{\"type\":\"image\",\"width\":800,\"height\":571,\"ratio\":\"1.401\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:47:13', '2023-07-07 00:47:54'),
(672, 'App\\Models\\Gallary', 12, 'e6cbba89-9c69-4fe1-b449-272240b9937e', 'gallary', 'media-libraryv16CMC', '1688708836.png', 'image/png', 'media', 'media', 806192, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:47:16', '2023-07-07 00:47:54');
INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(673, 'App\\Models\\Gallary', 12, '323621c6-2af1-4871-8cd8-aeed4fe43a9b', 'gallary', 'media-libraryXM92pN', '1688708839.png', 'image/png', 'media', 'media', 787993, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:47:19', '2023-07-07 00:47:54'),
(674, 'App\\Models\\Gallary', 12, '86786ca3-ffcd-45d9-ad6c-f1c17607a3ff', 'gallary', 'media-libraryOGpB31', '1688708842.png', 'image/png', 'media', 'media', 797604, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:47:22', '2023-07-07 00:47:54'),
(675, 'App\\Models\\Gallary', 12, '5575e882-bce3-4dd9-ab37-922eda0b6980', 'gallary', 'media-library0OBojZ', '1688708844.png', 'image/png', 'media', 'media', 811422, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:47:24', '2023-07-07 00:47:54'),
(676, 'App\\Models\\Gallary', 12, '91777b49-59ac-4c74-a8ad-cfb2ef0751bf', 'gallary', 'media-libraryJNFJjU', '1688708848.png', 'image/png', 'media', 'media', 823539, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:47:28', '2023-07-07 00:47:54'),
(677, 'App\\Models\\Gallary', 12, '42076b69-d329-4bcd-b525-8624c28adcce', 'gallary', 'media-librarybPw6kp', '1688708850.png', 'image/png', 'media', 'media', 738960, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:47:30', '2023-07-07 00:47:55'),
(678, 'App\\Models\\Gallary', 12, '2b3d71e0-5484-445a-87c9-fcce9f1f62cc', 'gallary', 'media-libraryZAbCwz', '1688708854.png', 'image/png', 'media', 'media', 933753, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:47:34', '2023-07-07 00:47:55'),
(679, 'App\\Models\\Gallary', 12, '049a5144-5588-4ac3-a474-06d62e911ee4', 'gallary', 'media-libraryGvnhlx', '1688708857.png', 'image/png', 'media', 'media', 871041, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:47:37', '2023-07-07 00:47:55'),
(680, 'App\\Models\\Gallary', 13, '054858db-6720-45ab-b982-9c00dc9217e4', 'gallary', 'media-libraryYVubxG', '1688708942.png', 'image/png', 'media', 'media', 717445, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:49:02', '2023-07-07 00:49:17'),
(681, 'App\\Models\\Gallary', 13, 'bc5b5857-a2b0-47e3-a5b2-541255970dd6', 'gallary', 'media-libraryDcLK1I', '1688708945.png', 'image/png', 'media', 'media', 737186, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:49:05', '2023-07-07 00:49:17'),
(682, 'App\\Models\\Gallary', 13, '475ce912-cb61-4dc3-b486-31e211e0c94c', 'gallary', 'media-librarybssx2c', '1688708946.png', 'image/png', 'media', 'media', 679146, '[]', '{\"type\":\"image\",\"width\":800,\"height\":483,\"ratio\":\"1.656\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:49:06', '2023-07-07 00:49:17'),
(683, 'App\\Models\\Gallary', 13, '84baef76-f94a-4da6-9512-adccd70a98bc', 'gallary', 'media-library4nPHSL', '1688708949.png', 'image/png', 'media', 'media', 774855, '[]', '{\"type\":\"image\",\"width\":800,\"height\":515,\"ratio\":\"1.553\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:49:09', '2023-07-07 00:49:17'),
(684, 'App\\Models\\Gallary', 13, '301b5c52-385b-4049-a83d-87c771656ae4', 'gallary', 'media-librarylCOQv2', '1688708951.png', 'image/png', 'media', 'media', 736138, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:49:11', '2023-07-07 00:49:17'),
(685, 'App\\Models\\Gallary', 13, '15a82201-a345-4f68-b6a9-a78e80574e53', 'gallary', 'media-library2dyQGx', '1688708953.png', 'image/png', 'media', 'media', 831530, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:49:13', '2023-07-07 00:49:17'),
(686, 'App\\Models\\Gallary', 14, 'c7361993-da31-4f74-9b9f-e5669bfa8873', 'gallary', 'media-libraryimi10f', '1688709039.png', 'image/png', 'media', 'media', 855753, '[]', '{\"type\":\"image\",\"width\":800,\"height\":534,\"ratio\":\"1.498\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:50:39', '2023-07-07 00:51:09'),
(687, 'App\\Models\\Gallary', 14, '88f94bf2-2b9b-4a0d-9d9e-54ebd63c5a67', 'gallary', 'media-libraryUe6OEU', '1688709042.png', 'image/png', 'media', 'media', 857506, '[]', '{\"type\":\"image\",\"width\":800,\"height\":534,\"ratio\":\"1.498\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:50:42', '2023-07-07 00:51:10'),
(688, 'App\\Models\\Gallary', 14, '637d2bce-3001-436b-92a1-7e64d4397a3e', 'gallary', 'media-librarywxj7xh', '1688709044.png', 'image/png', 'media', 'media', 964463, '[]', '{\"type\":\"image\",\"width\":800,\"height\":534,\"ratio\":\"1.498\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:50:44', '2023-07-07 00:51:10'),
(689, 'App\\Models\\Gallary', 14, 'b8e63387-d2ae-467f-b13b-d1fadd23e4fd', 'gallary', 'media-libraryUd1bbW', '1688709046.png', 'image/png', 'media', 'media', 512430, '[]', '{\"type\":\"image\",\"width\":800,\"height\":534,\"ratio\":\"1.498\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:50:46', '2023-07-07 00:51:10'),
(690, 'App\\Models\\Gallary', 14, 'd59c0ca7-68cb-4cfb-9ede-1587f6ecf44b', 'gallary', 'media-librarynYZ03W', '1688709048.png', 'image/png', 'media', 'media', 227608, '[]', '{\"type\":\"image\",\"width\":559,\"height\":800,\"ratio\":\"0.699\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:50:48', '2023-07-07 00:51:10'),
(691, 'App\\Models\\Gallary', 14, 'b77646f8-2ab9-4407-89c5-b8c3c9f4834f', 'gallary', 'media-libraryjvOZjm', '1688709051.png', 'image/png', 'media', 'media', 910399, '[]', '{\"type\":\"image\",\"width\":800,\"height\":534,\"ratio\":\"1.498\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:50:51', '2023-07-07 00:51:10'),
(692, 'App\\Models\\Gallary', 14, '9beb3504-be94-46f4-80a6-be3c308a2bc3', 'gallary', 'media-libraryfDtpWt', '1688709053.png', 'image/png', 'media', 'media', 790090, '[]', '{\"type\":\"image\",\"width\":800,\"height\":534,\"ratio\":\"1.498\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:50:53', '2023-07-07 00:51:10'),
(693, 'App\\Models\\Gallary', 14, '4fdb0179-2cb3-457f-b742-5ddb724b0290', 'gallary', 'media-library2FTjCb', '1688709055.png', 'image/png', 'media', 'media', 841748, '[]', '{\"type\":\"image\",\"width\":800,\"height\":534,\"ratio\":\"1.498\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:50:55', '2023-07-07 00:51:10'),
(694, 'App\\Models\\Gallary', 14, '083e3d11-99df-47cf-a398-79826cd6b5e8', 'gallary', 'media-libraryR3rv62', '1688709058.png', 'image/png', 'media', 'media', 876514, '[]', '{\"type\":\"image\",\"width\":800,\"height\":534,\"ratio\":\"1.498\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:50:58', '2023-07-07 00:51:10'),
(695, 'App\\Models\\Gallary', 14, 'b919bbd2-6c72-4289-b3d3-4ff3660835b2', 'gallary', 'media-library9haoXY', '1688709060.png', 'image/png', 'media', 'media', 483848, '[]', '{\"type\":\"image\",\"width\":800,\"height\":339,\"ratio\":\"2.36\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:51:00', '2023-07-07 00:51:10'),
(696, 'App\\Models\\Gallary', 15, '0f2e20f1-9d25-46c5-b942-0731b8cf9521', 'gallary', 'media-libraryWlsenO', '1688709153.png', 'image/png', 'media', 'media', 895291, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:52:33', '2023-07-07 00:53:02'),
(697, 'App\\Models\\Gallary', 15, '1b51c0aa-0e03-43be-af7a-f3502cb6404c', 'gallary', 'media-libraryFW9EBg', '1688709155.png', 'image/png', 'media', 'media', 755138, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:52:35', '2023-07-07 00:53:02'),
(698, 'App\\Models\\Gallary', 15, '58dd46a5-ef11-4287-8356-0edc515fd582', 'gallary', 'media-libraryvDjevr', '1688709158.png', 'image/png', 'media', 'media', 774170, '[]', '{\"type\":\"image\",\"width\":800,\"height\":448,\"ratio\":\"1.786\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:52:38', '2023-07-07 00:53:02'),
(699, 'App\\Models\\Gallary', 15, '2bba727e-73b1-4e91-b3ff-101b3783119d', 'gallary', 'media-librarycZ3JQp', '1688709161.png', 'image/png', 'media', 'media', 733616, '[]', '{\"type\":\"image\",\"width\":800,\"height\":448,\"ratio\":\"1.786\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:52:41', '2023-07-07 00:53:02'),
(700, 'App\\Models\\Gallary', 15, '1f047745-4dd0-4c3d-a56b-0e000236446c', 'gallary', 'media-library5lBPpZ', '1688709163.png', 'image/png', 'media', 'media', 678924, '[]', '{\"type\":\"image\",\"width\":800,\"height\":446,\"ratio\":\"1.794\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:52:43', '2023-07-07 00:53:02'),
(701, 'App\\Models\\Gallary', 15, 'd4ce06c6-68d6-4c81-ad20-a51ccacbb16a', 'gallary', 'media-librarytjbqSf', '1688709165.png', 'image/png', 'media', 'media', 710255, '[]', '{\"type\":\"image\",\"width\":800,\"height\":448,\"ratio\":\"1.786\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:52:45', '2023-07-07 00:53:03'),
(702, 'App\\Models\\Gallary', 15, '7177af82-3977-44a9-afa6-e165b315e362', 'gallary', 'media-libraryIQl7D5', '1688709167.png', 'image/png', 'media', 'media', 666162, '[]', '{\"type\":\"image\",\"width\":800,\"height\":447,\"ratio\":\"1.79\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:52:47', '2023-07-07 00:53:03'),
(703, 'App\\Models\\Gallary', 15, '736a4a28-b3af-4f62-adda-ca096ba3889d', 'gallary', 'media-libraryec02NF', '1688709170.png', 'image/png', 'media', 'media', 737487, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:52:50', '2023-07-07 00:53:03'),
(704, 'App\\Models\\Gallary', 15, '7875f4d8-f3fe-4db9-9bdf-5221622215e9', 'gallary', 'media-libraryEmHMOB', '1688709172.png', 'image/png', 'media', 'media', 730380, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:52:52', '2023-07-07 00:53:03'),
(705, 'App\\Models\\Gallary', 15, 'c41a1fb2-d7a3-499c-a377-bdff0926082d', 'gallary', 'media-libraryZgBjYM', '1688709175.png', 'image/png', 'media', 'media', 750501, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:52:55', '2023-07-07 00:53:03'),
(706, 'App\\Models\\Gallary', 16, '3ddfe81e-a5d1-48f0-b08d-aeb2e45aa7bb', 'gallary', 'media-librarymU9PeY', '1688709287.png', 'image/png', 'media', 'media', 732193, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:54:47', '2023-07-07 00:55:01'),
(707, 'App\\Models\\Gallary', 16, 'd5b2a02d-52ec-4276-a855-c17e127a2ccb', 'gallary', 'media-libraryiA3Y6M', '1688709289.png', 'image/png', 'media', 'media', 767610, '[]', '{\"type\":\"image\",\"width\":533,\"height\":800,\"ratio\":\"0.666\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:54:49', '2023-07-07 00:55:01'),
(708, 'App\\Models\\Gallary', 16, '846ab5ee-5d8d-4ea6-9603-00aa21073d9d', 'gallary', 'media-libraryclS5NR', '1688709291.png', 'image/png', 'media', 'media', 692989, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:54:51', '2023-07-07 00:55:01'),
(709, 'App\\Models\\Gallary', 16, '0ef68605-025a-4a17-941c-c7c9a464550a', 'gallary', 'media-librarym1SrJM', '1688709294.png', 'image/png', 'media', 'media', 777672, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:54:54', '2023-07-07 00:55:01'),
(710, 'App\\Models\\Gallary', 16, '65d78d5b-96ad-41ff-8a33-02142a0dd05a', 'gallary', 'media-libraryATZElX', '1688709296.png', 'image/png', 'media', 'media', 765750, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:54:56', '2023-07-07 00:55:01'),
(711, 'App\\Models\\Gallary', 16, 'c7364f80-1d2d-47a4-a13b-0e981e5f363a', 'gallary', 'media-libraryoJUHZo', '1688709298.png', 'image/png', 'media', 'media', 797239, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:54:58', '2023-07-07 00:55:01'),
(712, 'App\\Models\\Gallary', 17, 'f22f475b-5a08-432f-aa52-71f74dec6698', 'gallary', 'media-libraryvVOZTx', '1688709367.png', 'image/png', 'media', 'media', 866704, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:56:07', '2023-07-07 00:56:36'),
(713, 'App\\Models\\Gallary', 17, '7e324736-0454-4a08-a557-64fc4936f552', 'gallary', 'media-library6ipiuY', '1688709369.png', 'image/png', 'media', 'media', 822206, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:56:09', '2023-07-07 00:56:36'),
(714, 'App\\Models\\Gallary', 17, 'be0e1548-cb1b-473b-b37b-3995fa6d07b2', 'gallary', 'media-library42tw0m', '1688709371.png', 'image/png', 'media', 'media', 780129, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:56:11', '2023-07-07 00:56:36'),
(715, 'App\\Models\\Gallary', 17, '1c02ddaa-8ee0-4a0e-97a6-97dd8a5c951f', 'gallary', 'media-libraryfyeL1A', '1688709374.png', 'image/png', 'media', 'media', 796727, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:56:14', '2023-07-07 00:56:36'),
(716, 'App\\Models\\Gallary', 17, '96895466-f67d-4510-8cb1-0cf078f1fb18', 'gallary', 'media-libraryJg0JJz', '1688709376.png', 'image/png', 'media', 'media', 848066, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:56:16', '2023-07-07 00:56:36'),
(717, 'App\\Models\\Gallary', 18, '83a4b74e-8a09-4ad0-a1cd-bcef57479b04', 'gallary', 'media-libraryOmczWa', '1688709460.png', 'image/png', 'media', 'media', 835850, '[]', '{\"type\":\"image\",\"width\":800,\"height\":574,\"ratio\":\"1.394\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:57:40', '2023-07-07 00:57:57'),
(718, 'App\\Models\\Gallary', 18, '466ef3b7-e377-473d-a9ec-a228495ab32b', 'gallary', 'media-libraryDQ2JNy', '1688709462.png', 'image/png', 'media', 'media', 656892, '[]', '{\"type\":\"image\",\"width\":800,\"height\":566,\"ratio\":\"1.413\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:57:42', '2023-07-07 00:57:57'),
(719, 'App\\Models\\Gallary', 18, 'fb14e50a-5d8c-47cb-b1b4-04dfad8501b7', 'gallary', 'media-librarypgyMWV', '1688709465.png', 'image/png', 'media', 'media', 651064, '[]', '{\"type\":\"image\",\"width\":800,\"height\":564,\"ratio\":\"1.418\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:57:45', '2023-07-07 00:57:57'),
(720, 'App\\Models\\Gallary', 18, 'fcd63d49-f47d-4268-8c55-11f9ea124ade', 'gallary', 'media-libraryacBkaG', '1688709469.png', 'image/png', 'media', 'media', 479258, '[]', '{\"type\":\"image\",\"width\":428,\"height\":571,\"ratio\":\"0.75\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:57:49', '2023-07-07 00:57:57'),
(721, 'App\\Models\\Gallary', 18, '1b9784d5-c268-4347-a053-1825e715174f', 'gallary', 'media-libraryFOBGs2', '1688709473.png', 'image/png', 'media', 'media', 916623, '[]', '{\"type\":\"image\",\"width\":800,\"height\":570,\"ratio\":\"1.404\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"gallary\":true}', '[]', 1, '2023-07-07 00:57:53', '2023-07-07 00:57:57'),
(723, 'App\\Models\\Slide', 5, 'e180f5c1-e624-40b2-9ee7-2d2bc53348b7', 'slide', 'media-librarycZFfDz', '1689571482.png', 'image/png', 'media', 'media', 763274, '[]', '{\"type\":\"image\",\"width\":800,\"height\":533,\"ratio\":\"1.501\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-17 00:24:42', '2023-07-17 00:24:47'),
(724, 'AhmedAliraqi\\LaravelMediaUploader\\Entities\\TemporaryFile', 725, 'bf953ea6-af42-46eb-a264-04590f43bec6', 'slide', 'media-libraryas088b', '1689571899.png', 'image/png', 'media', 'media', 774575, '[]', '{\"type\":\"image\",\"width\":800,\"height\":515,\"ratio\":\"1.553\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-17 00:31:39', '2023-07-17 00:31:39'),
(725, 'App\\Models\\Slide', 13, '248b4fbe-8a75-4b15-9be2-aaa9fd5abd22', 'slide', 'media-libraryJOULXi', '1689572119.png', 'image/png', 'media', 'media', 774575, '[]', '{\"type\":\"image\",\"width\":800,\"height\":515,\"ratio\":\"1.553\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-17 00:35:19', '2023-07-17 00:35:39'),
(726, 'App\\Models\\Slide', 9, '8382ab5b-048e-444a-9887-b1af69374ef0', 'slide', 'media-librarycozoLV', '1689572268.png', 'image/png', 'media', 'media', 678947, '[]', '{\"type\":\"image\",\"width\":800,\"height\":483,\"ratio\":\"1.656\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-17 00:37:48', '2023-07-17 00:38:17'),
(727, 'App\\Models\\Slide', 6, 'ddc455d6-472d-43a4-a069-d951bd857029', 'slide', 'media-libraryxTdeEq', '1689572323.png', 'image/png', 'media', 'media', 735527, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-17 00:38:43', '2023-07-17 00:39:47'),
(728, 'App\\Models\\Slide', 18, 'd533fe91-66d9-4653-a561-b1e7c0635f8a', 'slide', 'media-librarygpx20V', '1689572415.png', 'image/png', 'media', 'media', 758987, '[]', '{\"type\":\"image\",\"width\":800,\"height\":600,\"ratio\":\"1.333\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true}', '[]', 1, '2023-07-17 00:40:15', '2023-07-17 00:40:23'),
(729, 'App\\Models\\Team', 10, 'a0985058-cd2d-4734-9924-0074c0b5ba5a', 'team', 'media-library4KYLnW', '1690267009.png', 'image/png', 'media', 'media', 317595, '[]', '{\"type\":\"image\",\"width\":484,\"height\":516,\"ratio\":\"0.938\",\"status\":\"processing\",\"progress\":100}', '{\"thumb\":true,\"small\":true,\"medium\":true,\"large\":true,\"resize\":true}', '[]', 1, '2023-07-25 01:36:49', '2023-07-25 01:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `system_id` tinyint NOT NULL DEFAULT '1',
  `isGlobal` tinyint DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `created_at`, `updated_at`, `system_id`, `isGlobal`) VALUES
(1, 'user', '2022-07-06 15:56:31', '2022-07-06 15:56:31', 1, 1),
(2, 'role', '2022-07-06 15:56:31', '2022-07-06 15:56:31', 1, 1),
(3, 'setting', '2022-07-06 15:56:31', '2022-07-06 15:56:31', 1, 0),
(4, 'slide', '2022-07-06 15:56:31', '2022-07-06 15:56:31', 1, 0),
(5, 'Notification', '2022-07-06 15:56:31', '2022-07-06 15:56:31', 1, 0),
(6, 'Download', '2022-07-06 15:56:31', '2022-07-06 15:56:31', 1, 0),
(7, 'Team', '2022-07-06 15:56:31', '2022-07-06 15:56:31', 1, 0),
(8, 'Project', '2022-07-06 15:56:31', '2022-07-06 15:56:31', 1, 0),
(9, 'Alert', '2022-07-06 15:56:31', '2022-07-06 15:56:31', 1, 0),
(10, 'Hospital', '2022-07-06 15:56:31', '2022-07-06 15:56:31', 1, 0),
(11, 'news', '2022-07-26 20:51:08', '2022-07-26 20:51:08', 1, 0),
(12, 'gallary', '2022-07-26 21:45:35', '2022-07-26 21:45:35', 1, 0),
(13, 'link', '2022-08-02 19:50:44', '2022-08-02 19:50:44', 1, 0),
(14, 'page', '2022-08-03 19:50:02', '2022-08-03 19:50:02', 1, 0),
(15, 'category', '2022-08-04 18:58:48', '2022-08-04 18:58:48', 1, 0),
(16, 'achievement', '2022-08-09 02:11:32', '2022-08-09 02:11:32', 1, 0),
(17, 'Contact-Us-Form', '2022-08-14 00:29:47', '2022-08-14 00:29:47', 1, 0),
(18, 'University', '2022-08-30 06:05:20', '2022-08-30 06:05:20', 1, 0),
(19, 'College', '2022-08-30 06:05:20', '2022-08-30 06:05:20', 1, 0),
(20, 'Book', '2022-08-30 06:05:20', '2022-08-30 06:05:20', 1, 0),
(21, 'Facility', '2022-08-30 06:05:20', '2022-08-30 06:05:20', 1, 0),
(22, 'Event', '2022-08-30 06:05:20', '2022-08-30 06:05:20', 1, 0),
(23, 'Contact-Book', '2022-08-30 06:05:20', '2022-08-30 06:05:20', 1, 0),
(24, 'District', '2022-08-30 06:05:20', '2022-08-30 06:05:20', 1, 0),
(25, 'degree-certificate', '2022-09-14 00:14:00', '2022-09-14 00:14:00', 1, 0),
(26, 'competition-categories', '2022-11-16 00:18:28', '2022-11-16 00:18:28', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=140 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(88, '2014_10_12_000000_create_users_table', 49),
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
(57, '2022_08_14_103715_create_contacts_table', 34),
(63, '2022_08_23_102511_create_districts_table', 35),
(64, '2022_08_23_103159_create_universities_table', 35),
(65, '2022_08_23_105756_create_university_details_table', 36),
(66, '2022_08_24_121732_create_colleges_table', 37),
(67, '2022_08_24_122153_create_college_details_table', 37),
(75, '2022_08_26_092122_create_facilities_table', 43),
(99, '2022_08_27_095443_create_events_table', 56),
(72, '2022_08_28_094236_create_contact_books_table', 40),
(83, '2022_09_01_152627_create_youth_infos_table', 45),
(84, '2022_09_04_090548_create_degree_certificates_table', 46),
(96, '2022_09_04_091047_create_youth_experiences_table', 55),
(94, '2022_09_04_091800_create_youth_education_table', 54),
(91, '2022_09_05_135118_add_profile_completed_to_users', 52),
(100, '2022_10_24_155608_add_columns_to_users', 57),
(101, '2022_10_25_111722_add_description_to_facilities', 58),
(102, '2022_11_14_162139_create_competition_categories_table', 59),
(103, '2022_11_15_154141_create_system_table', 60),
(104, '2022_11_16_102720_create_competition_sub_categories_table', 61),
(106, '2022_11_17_124704_create_levels_or_stages_table', 62),
(107, '2022_11_17_120928_create_participants_table', 63),
(108, '2022_11_18_095202_create_applications_table', 64),
(109, '2022_11_20_112610_add_event_type_to_competition_sub_categories', 65),
(111, '2022_11_20_142229_add_event_type_to_competition_sub_categories', 66),
(112, '2022_11_18_112202_add_levels_or_stage_id_to_applications', 67),
(113, '2022_11_20_092813_add_event_type_to_applications', 68),
(114, '2022_11_22_162236_add_event_category_to_event', 69),
(115, '2022_11_28_094124_create_event_results_table', 70),
(116, '2022_11_28_113505_create_event_links_table', 71),
(117, '2022_11_28_143603_add_social_links_to_event', 72),
(118, '2022_11_28_145521_add_social_links_to_event', 73),
(119, '2023_01_03_152833_create_feedback_users_table', 74),
(120, '2023_01_04_112144_create_feedback_table', 75),
(121, '2023_01_04_112831_create_comments_table', 76),
(123, '2023_02_14_094351_create_f_a_q_s_table', 77),
(124, '2023_02_17_104057_create_employees_table', 78),
(125, '2023_02_17_105306_create_projects_table', 79),
(126, '2022_08_25_140611_create_books_table', 0),
(127, '2023_07_06_094407_create_scholarships_table', 80),
(128, '2023_07_10_094201_create_expenses_table', 80),
(129, '2023_07_10_102117_create_scholarship_assets_table', 80),
(130, '2023_07_10_113022_create_applicant_financial_records_table', 80),
(131, '2023_07_10_120231_create_applicant_educations_table', 80),
(132, '2023_07_10_123810_add_new_to_users_table', 80),
(133, '2023_07_10_132533_create_family_infos_table', 80),
(134, '2023_07_10_143546_add_new_to_users_table', 80),
(135, '2023_07_12_121053_add_user_id_to_family_infos_table', 80),
(136, '2023_07_13_161033_create_scholarship_documents_table', 80),
(137, '2023_07_14_162643_create_scholarship_applications_table', 80),
(138, '2023_07_24_123853_add_uni_id_to_scholarship_applications_table', 80),
(139, '2023_07_25_104620_comments', 81);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 17),
(2, 'App\\Models\\User', 19);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `link` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `short_description` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_category_id_foreign` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newstypes`
--

DROP TABLE IF EXISTS `newstypes`;
CREATE TABLE IF NOT EXISTS `newstypes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `status`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Test', 1, '<p>Test</p>', '2022-07-18 20:05:05', '2022-07-18 20:03:59', '2022-07-18 20:05:05'),
(2, 'Testing Notification', 1, '<p>Testing Notification</p>', NULL, '2022-07-18 20:09:12', '2022-07-18 20:09:12'),
(3, 'KPBIT UPDATE', 0, '<p>KPBIT UPDATE</p>', NULL, '2022-07-18 20:09:33', '2022-07-18 20:09:33'),
(4, NULL, 0, NULL, '2022-08-12 04:29:12', '2022-08-12 04:29:07', '2022-08-12 04:29:12'),
(5, NULL, 0, NULL, '2022-08-12 04:29:21', '2022-08-12 04:29:17', '2022-08-12 04:29:21'),
(6, 'Test Notification', 1, '<p>This is test notification.</p>', '2022-09-29 05:01:02', '2022-09-29 05:00:55', '2022-09-29 05:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `deletable` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `loadwithlink` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slogan` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image_caption` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `banner_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`),
  UNIQUE KEY `pages_loadwithlink_unique` (`loadwithlink`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `deletable`, `deleted_at`, `created_at`, `updated_at`, `loadwithlink`, `slogan`, `image_caption`, `banner_title`) VALUES
(1, 'AIM AND COMMITMENT', 'health-department-kp-is-a-public-entity-guiding-health-policies', '<p class=\"ql-indent-3\"><span style=\"color: black;\">Youth development through – Economic, Social and Political Empowerment To predict empowering strategies, institutional mechanisms and the action points for multiple public, private and social sector stakeholders which are working to develop youth in the province.</span></p><p class=\"ql-indent-3\"><span style=\"color: rgb(33, 37, 41);\">Working to create policies that reflect the needs and priorities of KP’s youth</span></p><p class=\"ql-indent-3\"><span style=\"color: rgb(33, 37, 41);\">Promoting the well-being and success of KP’s youth</span></p>', 0, NULL, '2022-08-03 20:40:12', '2023-06-09 17:44:59', 'index', 'Welcome to Education Foundation KhyberPakhtunkhwa', NULL, 'BOOKS ON WHEELS'),
(30, 'Project Details', 'project-details', NULL, 0, NULL, '2022-09-01 01:15:17', '2023-02-28 01:58:40', 'Project Details', NULL, NULL, 'Project Details'),
(31, 'Contact Us', 'contact-us', NULL, 0, NULL, '2022-09-12 00:57:10', '2023-02-28 01:57:23', 'Contact Us', NULL, NULL, 'Contact Us'),
(26, 'Contact Us', 'contact-book', NULL, 0, NULL, '2022-08-31 06:36:57', '2022-09-12 00:48:24', 'Contact Book', NULL, NULL, 'Contact Us'),
(27, 'Projects', 'projects', '<h4>Khyber Pakhtunkhwa Youth Policy is the central tool to systemically integrate, implement, and evaluate all youth development work in the province.</h4><p><br></p>', 0, NULL, '2022-08-31 06:37:48', '2023-02-28 02:00:09', 'Projects', NULL, NULL, 'Projects'),
(28, 'News', 'news', NULL, 0, NULL, '2022-08-31 06:42:22', '2023-02-28 01:59:34', 'News', NULL, NULL, 'News'),
(29, 'Organization Registration', 'organization-registration', NULL, 0, NULL, '2022-08-31 12:47:18', '2023-02-28 01:59:11', 'Organization Registration', NULL, NULL, 'Organization Registration'),
(25, 'Facilities', 'facilities', NULL, 0, NULL, '2022-08-31 06:35:48', '2023-02-28 02:00:34', 'Facilities', NULL, NULL, 'Facilities'),
(22, 'Education', 'education', NULL, 1, '2022-09-12 01:24:18', '2022-08-31 06:30:39', '2022-09-12 01:24:18', 'Education', NULL, NULL, 'Education'),
(24, 'Events', 'events', NULL, 0, NULL, '2022-08-31 06:34:13', '2023-02-28 02:00:59', 'Events', NULL, NULL, 'Events'),
(6, 'Achievement', 'achievement', NULL, 0, NULL, '2022-08-09 21:21:00', '2022-08-09 21:21:00', 'Achievement', NULL, NULL, 'Achievement'),
(7, 'Hospitals', 'hospitals', NULL, 0, NULL, '2022-08-10 05:26:37', '2022-08-10 05:26:37', 'Hospitals', 'Hospitals', NULL, 'Hospitals'),
(8, 'About Us', 'about-us', '<h3><strong>Youth Policy</strong></h3><p>Khyber Pakhtunkhwa Youth Policy is the central tool to systemically integrate, implement, and evaluate all youth development work in the province. The policy based on three pillars:</p><p>Youth development through Economic, Social and Political Empowerment To predict empowering strategies, institutional mechanisms and the action points for multiple public, private and social sector stakeholders which are working to develop youth in the province.</p><h3><strong>Why Youth Policy?</strong></h3><p>In Khyber Pakhtunkhwa population of active youth (15 – 29) is 35%. Presence of a huge youth population will mean more resources, jobs, food security; increased social vibrancy; and political participation. In the desired and best case scenario, this youth bulge may serve as a dividend for the nation and youth can become the vehicle for change. To use this HR resources effectively and efficiently According to need analysis of population if this HR resources didn’t manage properly then it will be a great disaster for the province (increase in unemployment &amp; threat to law and order situation)</p><h3><strong>Vision</strong></h3><p>The Directorate of Youth Affairs, Khyber Pakhtunkhwa was established as independent Directorate in the year 2017. The Khyber Purpose of the Directorate Establishement is to:-</p><p><strong>Youth Rights (Health, Decision Making, Political/Civic Participation, Marginalized &amp; Minorities youth etc.)</strong></p><p>Youth activism and volunteerism plays important role in engagement of youth in peace building and conflict transformation processes, inclusion of marginalized &amp; minorities youth in main streamline.</p><p><strong>Personality grooming, Community engagement &amp; development (Sports &amp; Extracurricular activities, Volunteerism, Entrepreneurship, Hassle Free Loan, Internship, On Campus Job &amp; Job Placement)</strong></p><ol><li>Sports/ Extracurricular activities (dedication and encouragement of youth) -- How?</li><li>Physical activities (Sports – all categories)</li><li>General (Soft activities i.e. Debate/Speech, drama, etc)</li></ol><p><br></p>', 0, NULL, '2022-08-10 19:14:29', '2023-02-28 02:03:28', 'ABOUT US', 'ABOUT US', NULL, 'About Us'),
(9, 'OUR VISION', 'our-vision', '<p><strong style=\"color: rgb(0, 0, 0);\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', 0, NULL, '2022-08-10 19:36:25', '2023-02-28 02:03:02', 'OUR VISION', NULL, NULL, 'Our Vision'),
(10, 'Our Mission', 'our-mission', '<p><strong style=\"color: rgb(0, 0, 0);\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', 0, NULL, '2022-08-10 19:42:11', '2023-02-28 02:02:35', 'Our Mission', NULL, NULL, 'Our Mission'),
(11, 'LAWS & RULES', 'laws-rules', '<p><strong>What is a coronavirus?</strong></p><p><span style=\"color: rgb(60, 66, 69);\">Coronaviruses are a large family of viruses which may cause illness in animals or humans.&nbsp;In humans, several coronaviruses are known to cause respiratory infections ranging from the common cold to more severe diseases such as Middle East Respiratory Syndrome (MERS) and Severe Acute Respiratory Syndrome (SARS). The most recently discovered coronavirus causes coronavirus disease COVID-19.</span></p><p><br></p>', 0, NULL, '2022-08-10 20:12:52', '2022-08-10 20:16:17', 'LAWS & RULES', NULL, NULL, 'LAWS & RULES'),
(23, 'Download', 'download', NULL, 0, NULL, '2022-08-31 06:32:02', '2023-02-28 02:01:20', 'Download', NULL, NULL, 'Download'),
(13, 'Team', 'team', NULL, 0, NULL, '2022-08-11 01:12:00', '2023-02-28 02:02:06', 'Team', NULL, NULL, 'Team'),
(14, 'Gallery', 'gallery', NULL, 0, NULL, '2022-08-11 16:46:00', '2022-12-19 05:18:49', 'Gallery', NULL, NULL, 'Gallery'),
(34, 'Feedback', 'feedback', NULL, 1, NULL, '2023-01-05 05:19:55', '2023-01-05 05:19:55', 'Feedback', NULL, NULL, 'Feedback'),
(38, 'FAQs', 'faqs', NULL, 0, NULL, '2023-02-14 01:08:10', '2023-02-14 01:08:10', 'FAQs', NULL, NULL, 'FAQs'),
(39, 'Directorate of Implementations and Work', 'directorate-of-implementations-and-work', '<p class=\"ql-align-justify\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p class=\"ql-align-justify\"><br></p>', 0, NULL, '2023-02-22 01:57:05', '2023-02-22 02:17:03', 'Directorate of Implementations and Work', NULL, NULL, 'Directorate of Implementations and Work'),
(40, 'Directorate of Implementations and Work Objectives', 'directorate-of-implementations-and-work-objectives', '<p class=\"ql-align-justify\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 0, NULL, '2023-02-22 05:37:59', '2023-02-22 05:37:59', 'Directorate of Implementations and Work Objectives', NULL, NULL, 'Directorate of Implementations and Work Objectives');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE IF NOT EXISTS `participants` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `father_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cnic_form_b` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_of_birth` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `age` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `current_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `permanent_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `contact_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emergency_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `qualification` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `occupation` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `institution` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `organization_near` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `district_id` bigint UNSIGNED NOT NULL,
  `domicile` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `participants_cnic_form_b_unique` (`cnic_form_b`),
  KEY `participants_district_id_foreign` (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `name`, `father_name`, `cnic_form_b`, `gender`, `date_of_birth`, `age`, `current_address`, `permanent_address`, `contact_number`, `emergency_number`, `email`, `qualification`, `occupation`, `institution`, `organization_near`, `district_id`, `domicile`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Salman Qazi', 'Mazhar Ali', '1234561234561', 'Male', '2022-11-01', '20', 'House # FB-09, Street # 2nd, University Campus Peshawar', 'House # FB-09, Street # 2nd, University Campus Peshawar', '03171670657', '03331231233', 'salmannqqazi@gmail.com', '2', NULL, 'UET Peshawar', NULL, 1, '1', 1, NULL, '2022-11-21 02:18:33', '2022-11-21 02:18:33'),
(2, 'Salman', 'Mazhar Ali', '0000123123123', 'Male', '2021-12-01', '20', 'House # FB-09, Street # 2nd, University Campus Peshawar', 'House # FB-09, Street # 2nd, University Campus Peshawar', '03171670657', '03331231233', 'salmannqqazi@gmail.com', '2', NULL, 'UET Peshawar', NULL, 1, '1', 1, NULL, '2022-11-21 02:50:15', '2022-11-21 02:50:15'),
(3, 'Test', 'test guardian', '0000000000000', 'Male', '1990-03-21', '33', 'House # FB-09, Street # 2nd, University Campus Peshawar', 'House # FB-09, Street # 2nd, University Campus Peshawar', '01231231231', '03211111111', 'salmannqqazi@gmail.com', '1', NULL, 'UET Peshawar', NULL, 1, '1', 1, NULL, '2022-11-21 04:07:07', '2022-11-21 04:07:07'),
(4, 'Test', 'Test Guardian', '1111111111111', 'Male', '1990-01-01', '23', 'House # FB-09, Street # 2nd, University Campus Peshawar', 'House # FB-09, Street # 2nd, University Campus Peshawar', '03171670657', '03211231231', 'salmannqqazi@gmail.com', '2', NULL, 'UET Peshawar', NULL, 1, '1', 1, NULL, '2022-11-21 04:54:49', '2022-11-21 04:54:49'),
(5, 'Taimur', 'riaz', '1710107498111', 'Male', '1990-01-10', '33', 'university campus peshawar', 'university campus peshawar', '032221212123', '03211212123', 'ali@gmail.com', '2', NULL, 'UET Peshawar', NULL, 1, '1', 1, NULL, '2022-11-22 02:22:14', '2022-11-22 02:22:14'),
(6, '123', '456', '123', 'Male', '2007-11-07', '15', 'gfhf', 'dgfdg', '123', '345', 'h@g', '1', NULL, 'dsds', NULL, 2, '2', 1, NULL, '2022-11-30 00:20:46', '2022-11-30 00:20:46'),
(7, 'Ali Imran', 'Riaz Khan', '0000111122223', 'Male', '2007-09-28', '15', 'House # FB-09, Street # 2nd, University Campus Peshawar', 'House # FB-09, Street # 2nd, University Campus Peshawar', '03171670657', '03171670657', 'salmannqqazi@gmail.com', '2', NULL, 'UET Peshawar', NULL, 1, '1', 1, NULL, '2022-11-30 02:25:29', '2022-11-30 02:25:29'),
(8, 'alina', 'khan', 'aza111111111111111111111', 'Female', '1999-11-11', '23', 'abc', 'dcf', '0332647222222222', '013111111111111111111', 'alina@j', '2', NULL, 'cgvh', NULL, 1, '1', 1, NULL, '2022-12-02 00:59:50', '2022-12-02 00:59:50'),
(9, 'Hafeez', 'khan', '1235673', 'Male', '2007-11-29', '15', 'gfgfgd', 'sds', '123', '123', 'h@gmail.com', '1', NULL, 'dsds', NULL, 2, '2', 1, NULL, '2022-12-02 01:12:10', '2022-12-02 01:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `participant_carnival`
--

DROP TABLE IF EXISTS `participant_carnival`;
CREATE TABLE IF NOT EXISTS `participant_carnival` (
  `participant_carnival_id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `father_name` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cnic_form_b` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `nationality` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `district` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `current_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `permanent_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_number` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emergency_number` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `qualification` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `occupation` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `organization` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `organization_near` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `categories` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`participant_carnival_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `guard_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `menu_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`),
  KEY `permissions_menu_id_foreign` (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `menu_id`) VALUES
(1, 'role-list', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 2),
(2, 'role-create', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 2),
(3, 'role-edit', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 2),
(4, 'role-delete', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 2),
(5, 'user-list', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 1),
(6, 'user-create', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 1),
(7, 'user-edit', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 1),
(8, 'user-delete', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 1),
(9, 'setting-list', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 3),
(10, 'setting-create', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 3),
(11, 'setting-edit', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 3),
(12, 'setting-delete', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 3),
(13, 'slide-list', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 4),
(14, 'slide-create', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 4),
(15, 'slide-edit', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 4),
(16, 'slide-delete', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 4),
(17, 'notification-list', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 5),
(18, 'notification-create', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 5),
(19, 'notification-edit', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 5),
(20, 'notification-delete', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 5),
(21, 'download-list', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 6),
(22, 'download-create', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 6),
(23, 'download-edit', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 6),
(24, 'download-delete', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 6),
(25, 'team-list', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 7),
(26, 'team-create', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 7),
(27, 'team-edit', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 7),
(28, 'team-delete', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 7),
(29, 'project-list', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 8),
(30, 'project-create', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 8),
(31, 'project-edit', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 8),
(32, 'project-delete', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 8),
(33, 'alert-list', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 9),
(34, 'alert-create', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 9),
(35, 'alert-edit', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 9),
(36, 'alert-delete', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 9),
(37, 'hospital-list', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 10),
(38, 'hospital-create', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 10),
(39, 'hospital-edit', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 10),
(40, 'hospital-delete', 'web', '2022-07-06 15:45:39', '2022-07-06 15:45:39', 10),
(41, 'news-list', 'web', '2022-07-26 20:51:08', '2022-07-26 20:51:08', 11),
(42, 'news-create', 'web', '2022-07-26 20:51:08', '2022-07-26 20:51:08', 11),
(43, 'news-edit', 'web', '2022-07-26 20:51:08', '2022-07-26 20:51:08', 11),
(44, 'news-delete', 'web', '2022-07-26 20:51:08', '2022-07-26 20:51:08', 11),
(45, 'gallary-list', 'web', '2022-07-26 21:45:35', '2022-07-26 21:45:35', 12),
(46, 'gallary-create', 'web', '2022-07-26 21:45:35', '2022-07-26 21:45:35', 12),
(47, 'gallary-edit', 'web', '2022-07-26 21:45:35', '2022-07-26 21:45:35', 12),
(48, 'gallary-delete', 'web', '2022-07-26 21:45:35', '2022-07-26 21:45:35', 12),
(49, 'link-list', 'web', '2022-08-02 19:50:44', '2022-08-02 19:50:44', 13),
(50, 'link-create', 'web', '2022-08-02 19:50:44', '2022-08-02 19:50:44', 13),
(51, 'link-edit', 'web', '2022-08-02 19:50:44', '2022-08-02 19:50:44', 13),
(52, 'link-delete', 'web', '2022-08-02 19:50:44', '2022-08-02 19:50:44', 13),
(53, 'page-list', 'web', '2022-08-03 19:50:02', '2022-08-03 19:50:02', 14),
(54, 'page-create', 'web', '2022-08-03 19:50:03', '2022-08-03 19:50:03', 14),
(55, 'page-edit', 'web', '2022-08-03 19:50:03', '2022-08-03 19:50:03', 14),
(56, 'page-delete', 'web', '2022-08-03 19:50:03', '2022-08-03 19:50:03', 14),
(57, 'category-list', 'web', '2022-08-04 18:58:48', '2022-08-04 18:58:48', 15),
(58, 'category-create', 'web', '2022-08-04 18:58:48', '2022-08-04 18:58:48', 15),
(59, 'category-edit', 'web', '2022-08-04 18:58:48', '2022-08-04 18:58:48', 15),
(60, 'category-delete', 'web', '2022-08-04 18:58:48', '2022-08-04 18:58:48', 15),
(61, 'achievement-list', 'web', '2022-08-09 02:11:32', '2022-08-09 02:11:32', 16),
(62, 'achievement-create', 'web', '2022-08-09 02:11:32', '2022-08-09 02:11:32', 16),
(63, 'achievement-edit', 'web', '2022-08-09 02:11:32', '2022-08-09 02:11:32', 16),
(64, 'achievement-delete', 'web', '2022-08-09 02:11:32', '2022-08-09 02:11:32', 16),
(65, 'contact-list', 'web', '2022-08-14 00:29:47', '2022-08-14 00:29:47', 17),
(66, 'contact-create', 'web', '2022-08-14 00:29:47', '2022-08-14 00:29:47', 17),
(67, 'contact-edit', 'web', '2022-08-14 00:29:47', '2022-08-14 00:29:47', 17),
(68, 'contact-delete', 'web', '2022-08-14 00:29:47', '2022-08-14 00:29:47', 17),
(69, 'university-list', 'web', '2022-08-30 06:05:20', '2022-08-30 06:05:20', 18),
(70, 'university-create', 'web', '2022-08-30 06:05:20', '2022-08-30 06:05:20', 18),
(71, 'university-edit', 'web', '2022-08-30 06:05:20', '2022-08-30 06:05:20', 18),
(72, 'university-delete', 'web', '2022-08-30 06:05:20', '2022-08-30 06:05:20', 18),
(73, 'college-list', 'web', '2022-08-30 06:05:20', '2022-08-30 06:05:20', 19),
(74, 'college-create', 'web', '2022-08-30 06:05:20', '2022-08-30 06:05:20', 19),
(75, 'college-edit', 'web', '2022-08-30 06:05:20', '2022-08-30 06:05:20', 19),
(111, 'degree-certificate-edit', 'web', '2022-09-14 00:14:00', '2022-09-14 00:14:00', 25),
(110, 'degree-certificate-create', 'web', '2022-09-14 00:14:00', '2022-09-14 00:14:00', 25),
(109, 'degree-certificate-list', 'web', '2022-09-14 00:14:00', '2022-09-14 00:14:00', 25),
(108, 'event-delete', 'web', '2022-09-14 00:14:00', '2022-09-14 00:14:00', 22),
(107, 'event-edit', 'web', '2022-09-14 00:14:00', '2022-09-14 00:14:00', 22),
(106, 'event-create', 'web', '2022-09-14 00:14:00', '2022-09-14 00:14:00', 22),
(105, 'event-list', 'web', '2022-09-14 00:14:00', '2022-09-14 00:14:00', 22),
(104, 'facility-delete', 'web', '2022-09-14 00:14:00', '2022-09-14 00:14:00', 21),
(103, 'facility-edit', 'web', '2022-09-14 00:14:00', '2022-09-14 00:14:00', 21),
(102, 'facility-create', 'web', '2022-09-14 00:14:00', '2022-09-14 00:14:00', 21),
(101, 'facility-list', 'web', '2022-09-14 00:14:00', '2022-09-14 00:14:00', 21),
(100, 'district-delete', 'web', '2022-09-14 00:14:00', '2022-09-14 00:14:00', 24),
(99, 'district-edit', 'web', '2022-09-14 00:14:00', '2022-09-14 00:14:00', 24),
(98, 'district-create', 'web', '2022-09-14 00:14:00', '2022-09-14 00:14:00', 24),
(97, 'district-list', 'web', '2022-09-14 00:14:00', '2022-09-14 00:14:00', 24),
(112, 'degree-certificate-delete', 'web', '2022-09-14 00:14:00', '2022-09-14 00:14:00', 25),
(113, 'competition-categories-list', 'web', '2022-11-16 00:18:28', '2022-11-16 00:18:28', 26),
(114, 'competition-categories-create', 'web', '2022-11-16 00:18:28', '2022-11-16 00:18:28', 26),
(115, 'competition-categories-edit', 'web', '2022-11-16 00:18:28', '2022-11-16 00:18:28', 26),
(116, 'competition-categories-delete', 'web', '2022-11-16 00:18:28', '2022-11-16 00:18:28', 26);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_pc1_cost` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `approved_pc1_cost`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Test Project 1', '100 M', 'Completed', '2023-02-22 05:09:09', '2023-02-22 05:18:00'),
(2, 'Test Project 2', '100 M', 'Pending', '2023-02-22 05:10:10', '2023-02-22 05:17:44'),
(3, 'Test Project 3', '10 M', 'In Progress', '2023-02-22 05:10:37', '2023-02-22 05:17:24'),
(4, 'UPGRADATION &REHABILITATION OF PARACHINAR SPORTS COMPLEX', '120 M', 'Completed', '2023-02-22 05:11:28', '2023-02-27 01:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `guard_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `system_id` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `system_id`) VALUES
(1, 'Super Admin', 'web', '2022-08-14 00:20:10', '2022-08-14 00:30:22', 1),
(2, 'Super Admin Carnival', 'web', '2022-08-14 00:20:10', '2022-08-14 00:30:22', 2);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(4, 2),
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
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 2),
(114, 2),
(115, 2),
(116, 2);

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

DROP TABLE IF EXISTS `scholarships`;
CREATE TABLE IF NOT EXISTS `scholarships` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_applications`
--

DROP TABLE IF EXISTS `scholarship_applications`;
CREATE TABLE IF NOT EXISTS `scholarship_applications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `family_info_id` bigint UNSIGNED NOT NULL,
  `expense_id` bigint UNSIGNED NOT NULL,
  `scholarship_document_id` bigint UNSIGNED NOT NULL,
  `scholarship_id` bigint UNSIGNED NOT NULL,
  `university_id` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `applied_year` int UNSIGNED NOT NULL DEFAULT '2023',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `scholarship_applications_user_id_foreign` (`user_id`),
  KEY `scholarship_applications_family_info_id_foreign` (`family_info_id`),
  KEY `scholarship_applications_expense_id_foreign` (`expense_id`),
  KEY `scholarship_applications_scholarship_document_id_foreign` (`scholarship_document_id`),
  KEY `scholarship_applications_scholarship_id_foreign` (`scholarship_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_assets`
--

DROP TABLE IF EXISTS `scholarship_assets`;
CREATE TABLE IF NOT EXISTS `scholarship_assets` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `expense_id` bigint UNSIGNED DEFAULT NULL,
  `type` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_market_value` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `scholarship_assets_expense_id_foreign` (`expense_id`),
  KEY `scholarship_assets_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_documents`
--

DROP TABLE IF EXISTS `scholarship_documents`;
CREATE TABLE IF NOT EXISTS `scholarship_documents` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `father_guardian_signature` date DEFAULT NULL,
  `applicant_signature` date DEFAULT NULL,
  `terms_conditions` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `scholarship_documents_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'KPITB',
  `footer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `mainLayoutType` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vertical',
  `theme` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'light',
  `sidebarCollapsed` tinyint(1) NOT NULL DEFAULT '0',
  `navbarColor` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'bg-primary',
  `horizontalMenuType` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'floating',
  `verticalMenuNavbarType` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'floating',
  `footerType` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'static',
  `layoutWidth` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'boxed',
  `showMenu` tinyint(1) NOT NULL DEFAULT '1',
  `bodyClass` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `pageHeader` tinyint(1) NOT NULL DEFAULT '1',
  `contentLayout` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'default',
  `defaultLanguage` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'en',
  `blankPage` tinyint(1) NOT NULL DEFAULT '0',
  `direction` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'ltr',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `contentsidebarClass` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'content-left-sidebar',
  `sidebarPositionClass` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'content-left-sidebar',
  `horizontalMenuClass` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'static',
  `websiteName` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `android_app_link` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '#',
  `ios_app_link` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '#',
  `footer_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `address` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `twitter` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '#',
  `facebook` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '#',
  `instagram` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '#',
  `youtube` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '#',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `footer`, `mainLayoutType`, `theme`, `sidebarCollapsed`, `navbarColor`, `horizontalMenuType`, `verticalMenuNavbarType`, `footerType`, `layoutWidth`, `showMenu`, `bodyClass`, `pageHeader`, `contentLayout`, `defaultLanguage`, `blankPage`, `direction`, `created_at`, `updated_at`, `status`, `deleted_at`, `contentsidebarClass`, `sidebarPositionClass`, `horizontalMenuClass`, `websiteName`, `email`, `android_app_link`, `ios_app_link`, `footer_note`, `address`, `phone`, `twitter`, `facebook`, `instagram`, `youtube`) VALUES
(1, 'Main Theme', '<p>Copy Right © Khyber Pakhtunkhwa Education Foundation</p><p><br></p>', 'vertical', 'light', 0, 'bg-primary', 'floating', 'floating', 'static', 'boxed', 1, '', 1, 'default', 'en', 0, 'ltr', '2022-08-02 22:11:28', '2023-06-19 21:15:36', 1, NULL, 'default', 'content-right-sidebar', 'static', 'Khyber Pakhtunkhwa Education Foundation', 'info@kpef.edu.pk', '#', '#', '<p><strong>Website last updated on: 06/06/2023 05:43 PM.</strong></p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,</p><p>molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum</p>', 'Khyber Pakhtunkhwa Education Foundation\r\n32-B Chinar Road University Town Peshawar', '091-9216290', 'https://twitter.com/esefkpk?lang=en', 'https://www.facebook.com/khyberpakhtunkhwa.fef.5', '#', 'https://www.youtube.com/@kpcmscu');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
CREATE TABLE IF NOT EXISTS `slides` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `en_title` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `ur_title` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ur_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `deleted_at`, `created_at`, `updated_at`, `en_title`, `en_description`, `ur_title`, `ur_description`, `status`) VALUES
(1, '2022-08-01 10:03:57', '2022-07-31 15:28:28', '2022-08-01 10:03:57', 'For the entire population of KHYBER PAKHTUNKHWA', '<p><strong>Free medical treatment facilities under Sehat Card Program</strong></p><p>Sehat Card Plus is a Micro-health Insurance Programme for all the citizens of Khyber Pakhtunkhwa. It is one of the flagship programmes of Government of Khyber Pakhtunkhwa</p>', 'خیبرپختونخوا کی پوری آبادی کے لیے', '<p><strong>صحت کارڈ پروگرام کے تحت مفت علاج کی سہولیات</strong></p><p>﻿صحت کارڈ پلس خیبرپختونخوا کے تمام شہریوں کے لیے ایک مائیکرو ہیلتھ انشورنس پروگرام ہے۔ یہ خیبرپختونخوا حکومت کے اہم پروگراموں میں سے ایک ہے۔</p>', 1),
(2, '2022-08-19 00:23:01', '2022-08-01 11:44:11', '2022-08-19 00:23:01', 'For the entire population of KHYBER PAKHTUNKHWA', '<h1><strong style=\"color: rgb(255, 255, 255);\">Free medical treatment facilities under Sehat Card Program</strong></h1><p><span class=\"ql-size-large\" style=\"color: rgb(255, 255, 255);\">﻿Sehat Card Plus is a Micro-health Insurance Programme for all the citizens of Khyber Pakhtunkhwa. It is one of the flagship programmes of Government of Khyber Pakhtunkhwa.</span></p>', 'خیبرپختونخوا کی پوری آبادی کے لیے', '<h1 class=\"ql-align-right\"><strong style=\"color: rgb(255, 255, 255);\">صحت کارڈ پروگرام کے تحت مفت علاج کی سہولیات</strong></h1><p class=\"ql-align-right\"><span class=\"ql-size-large\" style=\"color: rgb(255, 255, 255);\">﻿صحت کارڈ پلس خیبرپختونخوا کے تمام شہریوں کے لیے ایک مائیکرو ہیلتھ انشورنس پروگرام ہے۔ یہ خیبرپختونخوا حکومت کے اہم پروگراموں میں سے ایک ہے۔</span></p><p><br></p>', 1),
(3, '2022-08-19 00:23:06', '2022-08-01 11:54:08', '2022-08-19 00:23:06', 'For the entire population of KHYBER PAKHTUNKHWA 2', '<h1><strong style=\"color: rgb(255, 255, 255);\">Free medical treatment facilities under Sehat Card Program</strong></h1><p><span class=\"ql-size-large\" style=\"color: rgb(255, 255, 255);\">Sehat Card Plus is a Micro-health Insurance Programme for all the citizens of Khyber Pakhtunkhwa. It is one of the flagship programmes of Government of Khyber Pakhtunkhwa.</span></p>', 'خیبرپختونخوا کی پوری آبادی کے لیے 2', '<h1 class=\"ql-align-right\"><strong style=\"color: rgb(255, 255, 255);\">صحت کارڈ پروگرام کے تحت مفت علاج کی سہولیات</strong></h1><p class=\"ql-align-right\"><span class=\"ql-size-large\" style=\"color: rgb(255, 255, 255);\">صحت کارڈ پلس خیبرپختونخوا کے تمام شہریوں کے لیے ایک مائیکرو ہیلتھ انشورنس پروگرام ہے۔ یہ خیبرپختونخوا حکومت کے اہم پروگراموں میں سے ایک ہے۔</span></p><p><br></p>', 1),
(4, '2022-08-11 23:54:51', '2022-08-11 23:54:47', '2022-08-11 23:54:51', 'test', NULL, NULL, NULL, 0),
(5, NULL, '2022-08-19 00:30:34', '2023-07-16 19:59:59', '\"TechEducation\" and \"Women in STEM\"', '<p><strong style=\"color: rgb(187, 187, 187);\"> \"TechEducation\" and \"Women in STEM\"</strong></p>', '\"TechEducation\" and \"Women in STEM\"', '<p><br></p>', 1),
(6, NULL, '2022-08-19 00:32:44', '2023-07-16 19:39:47', 'Meeting of the Principals, Coordinators, Student Affair Officers and CEOs of the private sector Educational Institutions', '<p><strong style=\"color: rgb(187, 187, 187);\">Meeting of the Principals, Coordinators, Student Affair Officers and CEOs of the private sector Educational Institutions.</strong></p>', NULL, NULL, 1),
(7, '2022-08-19 00:33:33', '2022-08-19 00:33:23', '2022-08-19 00:33:33', NULL, NULL, NULL, NULL, 1),
(8, '2022-08-19 00:36:08', '2022-08-19 00:33:59', '2022-08-19 00:36:08', NULL, NULL, NULL, NULL, 0),
(9, NULL, '2022-08-19 00:38:00', '2023-07-16 19:59:06', 'MoU for the promotion of Science Communication and outreach in educational institutes.', '<p><strong style=\"color: rgb(187, 187, 187);\">KPEF &amp; Directorate of Science and Technology (DoST) signed an MoU for the promotion of Science Communication and outreach in educational institutes.</strong></p>', NULL, NULL, 1),
(10, '2023-06-25 23:23:59', '2022-08-19 00:38:29', '2023-06-25 23:23:59', NULL, NULL, NULL, NULL, 0),
(11, '2023-07-16 19:37:16', '2022-08-19 00:40:05', '2023-07-16 19:37:16', NULL, NULL, NULL, NULL, 1),
(12, '2022-09-29 00:00:22', '2022-09-29 00:00:09', '2022-09-29 00:00:22', 'Test Slide', '<p>This is test slide</p>', NULL, NULL, 1),
(13, NULL, '2023-02-22 20:12:54', '2023-07-16 19:44:05', 'MoU for the promotion of Science Communication and outreach in educational institutes', '<p><strong style=\"color: rgb(187, 187, 187);\">KPEF &amp; Directorate of Science and Technology (DoST) signed an MoU for the promotion of Science Communication and outreach in educational institutes.</strong></p>', NULL, '<p><strong style=\"color: rgb(187, 187, 187);\">KPEF &amp; Directorate of Science and Technology (DoST) signed an MoU for the promotion of Science Communication and outreach in educational institutes.</strong></p>', 1),
(14, '2023-07-16 19:56:41', '2023-02-22 20:13:24', '2023-07-16 19:56:41', 'Our vision', '<p><strong style=\"color: rgb(187, 187, 187);\">Our vision</strong></p>', 'Our vision', '<p><br></p>', 1),
(15, '2023-02-22 20:54:25', '2023-02-22 20:54:01', '2023-02-22 20:54:25', 'Directorate of Implementations and Works', NULL, NULL, NULL, 1),
(16, '2023-06-07 09:30:10', '2023-06-07 09:27:52', '2023-06-07 09:30:10', 'Our vision', '<p>Our vision is to bring a systematic digital transformation in Khyber-Pakthunkhwa by leveraging Information andCommunication Technologies for job creation, connectivity, empowerment and inclusive economic growth.</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', NULL, NULL, 1),
(17, '2023-07-16 19:42:44', '2023-06-07 09:30:35', '2023-07-16 19:42:44', 'Our vision', '<p>Our vision test </p>', 'Our vision', '<p>Our vision is to bring a systematic digital transformation in Khyber-Pakthunkhwa by leveraging Information andCommunication Technologies for job creation, connectivity, empowerment and inclusive economic growth.</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', 1),
(18, NULL, '2023-07-16 19:40:23', '2023-07-16 19:40:37', 'Meeting of the Principals, Coordinators, Student Affair Officers and CEOs of the private sector Educational Institutions', '<p><strong style=\"color: rgb(187, 187, 187);\">Meeting of the Principals, Coordinators, Student Affair Officers and CEOs of the private sector Educational Institutions</strong></p>', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

DROP TABLE IF EXISTS `system`;
CREATE TABLE IF NOT EXISTS `system` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `designation` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `facebook` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `twitter` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `designation`, `facebook`, `twitter`, `phone`, `type`, `status`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'IMRAN ALI', NULL, 'https://www.twitter.com', 'https://www.twitter.com', '03133434571', 'team', 1, '<p>03133434571</p>', '2022-07-24 16:52:29', '2022-07-19 19:44:27', '2022-07-24 16:52:29'),
(2, 'MAHMOOD KHAN', 'Chief Minister KP', NULL, 'https://www.twitter.com', '(+92) 91 1234567', 'addministrator', 1, '<p class=\"ql-align-justify\">I am tremendously pleased to welcome you to the Sports and Youth Affairs Department platform. This Department assures to accomplish its aim by empowering and strengthening our youth and working on all the possible opportunities including Sports. To bring up the ideas and shape it into Projects for the youth and to harness the potential and energy in the right direction. I am optimistic that we will work together to promote youth in terms of capacity building, empowerment and physical and mental fitness vis-à-vis their connections with the international horizon. Thank you!</p>', NULL, '2022-07-24 16:52:24', '2023-01-30 01:15:50'),
(3, 'Taimur Khan Jhagra', 'Health Minister', NULL, 'https://www.twitter.com', '(+92) 91 1234567', 'addministrator', 1, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>', '2022-08-19 06:14:10', '2022-07-24 19:25:46', '2022-08-19 06:14:10'),
(4, 'AMER SULTAN TAREEN', 'Secretary Health', NULL, 'https://www.twitter.com', '(+92) 91 1234567', 'addministrator', 1, '<p><span style=\"background-color: rgb(247, 247, 247); color: rgb(37, 38, 56);\">Lorem Ipsum is simply dumIt was the of popularized in the 1960s with the and is release is text of the the printing and ty setting the industry.The and have Lorem in Ipsum has been the industry</span></p>', '2022-08-19 06:14:06', '2022-07-24 19:35:29', '2022-08-19 06:14:06'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, 0, '<p>afdsadsfads</p><p><br></p><p><br></p><p><br></p><p><br></p>', '2022-07-26 20:47:07', '2022-07-26 00:29:06', '2022-07-26 20:47:07'),
(6, 'MAHMOOD KHAN', 'Chief Minister KP', NULL, 'https://www.twitter.com', '(+92) 91 1234567', 'addministrator', 1, '<p class=\"ql-align-center\"><span class=\"ql-size-small\">Lorem Ipsum is simply dumIt was the of popularized in the 1960s with the and is release is text of the the printing and ty setting the industry.The and have Lorem in Ipsum has been the industry</span></p>', '2022-08-13 23:59:01', '2022-07-24 16:52:24', '2022-08-13 23:59:01'),
(7, 'Taimur Khan Jhagra', 'Health Minister', NULL, 'https://www.twitter.com', NULL, 'addministrator', 1, '<p>Lorem Ipsum is simply dumIt was the of popularized in the 1960s with the and is release is text of the the printing and ty setting the industry.The and have Lorem in Ipsum has been the industry</p><p>         </p>', '2022-08-19 06:13:47', '2022-08-14 00:00:29', '2022-08-19 06:13:47'),
(8, 'Mohammad Atif Khan', 'Minister of Youth Affairs', NULL, 'https://www.twitter.com', '0912345654', 'addministrator', 1, '<p>Lorem Ipsum is simply dumIt was the of popularized in the 1960s with the and is release is text of the the printing and ty setting the industry.The and have Lorem in Ipsum has been the industryLorem Ipsum is simply dumIt was the of popularized in the 1960s with the and is release is text of the the printing and ty setting the industry.The and have Lorem in Ipsum has been the industryLorem Ipsum is simply dumIt was the of popularized in the 1960s with the and is release is text of the the printing and ty setting the industry.The and have Lorem in Ipsum has been the industry</p>', '2023-01-17 05:58:52', '2022-08-30 01:48:40', '2023-01-17 05:58:52'),
(9, 'Ikhlaq Ahmed', 'Additional Secretary at Sports,Tourism, Archaelogy,and Youth Affairs Department Government of KP', NULL, 'https://www.twitter.com', '0912345654', 'addministrator', 1, '<p><strong style=\"color: rgb(0, 0, 0);\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0);\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '2022-12-29 03:50:25', '2022-09-01 01:31:18', '2022-12-29 03:50:25'),
(10, 'Henna Karamat', 'Director Planning', 'https://www.facebook.com/kpefofficial', NULL, '091-9216290', 'team', 1, '<p><br></p>', NULL, '2022-09-13 23:40:05', '2023-07-25 01:37:54'),
(11, 'TEst', 'Developer', NULL, 'https://www.twitter.com', '03171670654', 'team', 1, NULL, '2022-09-29 05:03:03', '2022-09-29 05:02:58', '2022-09-29 05:03:03'),
(12, 'Saqib Habib Khan', 'Team Lead', NULL, 'https://www.twitter.com', '03171670653', 'team', 1, NULL, '2022-12-08 05:09:53', '2022-12-08 04:59:36', '2022-12-08 05:09:53'),
(13, 'Muhammad Atif Khan', 'Minister of Youth Affairs', NULL, 'https://www.twitter.com', NULL, 'addministrator', 1, '<p class=\"ql-align-justify\">Dear Youth, I am writing to you as the Minister for Youth Affairs and Sports to congratulate you on the significant role you play in our society. Youth empowerment is vital to the development of any nation, and I commend your dedication and efforts in making your community a better place. I am looking forward to your engagement in&nbsp;sports and other recreational pursuits. Such activities allow you to develop leadership skills, teamwork abilities, and a sense of civic responsibility – all essential traits for future success. We are working to bring opportunities for the empowerment and capacity building of Youth of Khyber Pakhtunkhwa. Sincerely, Minister for Youth Affairs and Sports.</p><p class=\"ql-align-justify\"><br></p>', NULL, '2023-01-17 06:00:11', '2023-05-03 01:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `teamtypes`
--

DROP TABLE IF EXISTS `teamtypes`;
CREATE TABLE IF NOT EXISTS `teamtypes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temporary_files`
--

DROP TABLE IF EXISTS `temporary_files`;
CREATE TABLE IF NOT EXISTS `temporary_files` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `token` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `collection` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'default',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=731 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temporary_files`
--

INSERT INTO `temporary_files` (`id`, `token`, `collection`, `created_at`, `updated_at`) VALUES
(2, 'tz3seGJoKMJ1tNmC06T3czYoPx0uu9wbWL363MWZPXFsXJ7eWIGYzMWH6fex', 'logo', '2022-07-17 20:51:35', '2022-07-17 20:51:35'),
(3, 'CXtioO4eYONl5eoJYOX5VAMsPeWi6Ho4oDWzOxhq7O4gdYzyJvQTW0Fmn7jZ', 'logo', '2022-07-17 20:57:59', '2022-07-17 20:57:59'),
(5, 'crwyZW45zt9mcD89s0DQEiquhUG9vaLD7h6Z82eJvOTWAIwBw5ZZJtBeVQr1', 'logo', '2022-07-17 21:58:39', '2022-07-17 21:58:39'),
(6, 'GRomVrhhqgy8zRnCjeXn5TWRIueqtWviJGBv6iUn2RtUCd6X4WOWMCWUBfmz', 'logo', '2022-07-17 22:42:24', '2022-07-17 22:42:24'),
(7, 'iCh7FCnipEXD92ttX39HAkvUV3qRZ260DIqRGTkwSsiHws8x1tWRHjsXMll1', 'logo', '2022-07-18 01:36:17', '2022-07-18 01:36:17'),
(8, 'LhQ27HFeFYgKjAotmY9ysQKApAJBC0lF3WEmaB1z0X3Agwo6GdhXd7WJ89nj', 'logo', '2022-07-18 01:36:39', '2022-07-18 01:36:39'),
(9, 'NxoPhgcltzICKjx5G4uFWe3MmdamcF1cSO2aD2zu5HPQdbzLDPXBwjL2yiJo', 'slide', '2022-07-18 18:46:19', '2022-07-18 18:46:19'),
(11, 'sMzoblyJ26cDveevW9JZdizBPIHc8A2VeKsDf0QQxqNQpgjoCpHCHr2XqdKP', 'slide', '2022-07-19 17:12:34', '2022-07-19 17:12:34'),
(17, 'mpl5v2SRUBrMMHtflhy1BrCF087XruTgmWzRGySNXVC2J50VRbyRx7UHyugm', 'team', '2022-07-19 19:10:38', '2022-07-19 19:10:38'),
(16, 'bzDKEjOA0PZxSLLCEB45BZ3igG8LtYAR9lH9AYDmWugH16rVo0zX12g6gdNM', 'slide', '2022-07-19 18:49:29', '2022-07-19 18:49:29'),
(15, 'WfxVzn7iMX3FASVycEjKZV6WZmWSoysuEtQydgleyxsLwM2yE4QGHQFZREfg', 'download', '2022-07-19 17:17:56', '2022-07-19 17:17:56'),
(18, 'BHdsBazCXCoCrKXHblKJEyQdUmrYEcF9zmZfTLgo8tXdrUMWwvmykqEzxADH', 'download', '2022-07-19 19:23:18', '2022-07-19 19:23:18'),
(19, 'eE1Q6fFCpUXlThfaulcbJXP2B6AUo2sEvRZp7U5copX9MWK57V0r27knXd6x', 'download', '2022-07-19 19:23:20', '2022-07-19 19:23:20'),
(20, 'SGkHTMTY42M9vDqt4iH4gSlMoRzj1scv4XLirNlzvqnGyGrA9BqrlI8QJI0y', 'download', '2022-07-19 19:23:23', '2022-07-19 19:23:23'),
(21, '3Ja4mjWI4zGfRkvoOTKhzHwGl7D4YADfux68AtHe9boFEhkEWWUoUz9MPyCl', 'download', '2022-07-19 19:23:27', '2022-07-19 19:23:27'),
(24, 'KFQ5ZuyhFoy9Bi4FSMayfQv4GbMecmCoOZl3qzI4cHXOroYSf5IoD1bQd93K', 'slide', '2022-07-19 21:29:09', '2022-07-19 21:29:09'),
(25, 'RRSZduLpW69CDg35yMpw62k7r7brIn1PXCTdjPmpUgfdZyLK90MX5gwvxslm', 'download', '2022-07-19 21:30:30', '2022-07-19 21:30:30'),
(26, 'h41p00sspK3ek9fxw9cWZO3p9FCYgj71MgFJxvQ3jKO3byQWEdBZDwv9hfTq', 'download', '2022-07-19 21:30:31', '2022-07-19 21:30:31'),
(36, 'ssGbh206TwKlfodTELCoyGPYaPB3szhNzSgK725LWy6ZKKiyRz9sCP0Cwy54', 'hospital', '2022-07-25 22:36:26', '2022-07-25 22:36:26'),
(35, 'nmPxpzESrvjuCLvYWNOGUPPjbiWHv106lzbYNxlvJW5VJZe3hBhUrffFQ8Zf', 'hospital', '2022-07-25 22:34:50', '2022-07-25 22:34:50'),
(48, '8jxxtFFqQz5ihk8OhPMlJsZCtA7hPWgFgPJ3DFHVMAwWpaMFUgd2gUdau3cZ', 'icon', '2022-08-01 17:29:41', '2022-08-01 17:29:41'),
(71, 'LhXbfesM90MYJmxHprZuSPmgzm6cbjRIOxseicZbjvoRRRkqGQ7pIMyzhMAE', 'banner', '2022-08-08 23:25:38', '2022-08-08 23:25:38'),
(70, 'PHQHZDC08qcdDb56hsJzaOSB76hPAfNqWJl90xj4FPNC7VO9P7BVtT6gSSrE', 'banner', '2022-08-08 23:25:02', '2022-08-08 23:25:02'),
(69, 'jpAsp6U9OhVCuSs5w1tIxRVFl7WPZkDIDNg8ZDIfyNH1QASy8ykk7jm8mWJq', 'banner', '2022-08-08 23:24:27', '2022-08-08 23:24:27'),
(85, '0GvaKGXZXmnio79VOgdUzvyu4sE8IpP0vJClD8uo93Nbp0GMUM6HHFxdVOz5', 'hospital', '2022-08-09 21:48:53', '2022-08-09 21:48:53'),
(83, 'SjK8HT3f0hfJ9Gx4YB24MKJqNm3jUSiyP19UUutmXjViuKQw08h7DgxDMGNm', 'banner', '2022-08-09 21:15:49', '2022-08-09 21:15:49'),
(91, 'jXzmXCLCFfQ63DlmmxjdFdY1qypZ0ZKPCp9Kq4B3Zx6XThI9iDL07OmRkCz8', 'banner', '2022-08-10 20:11:00', '2022-08-10 20:11:00'),
(96, '8T3oEg1x15NVSefUqvqZE1kCNSgKUz6Fk1HXThiY354ZEXsrSlRIHlkYxsih', 'gallary', '2022-08-11 16:27:57', '2022-08-11 16:27:57'),
(97, 'bCzO4RlXwXRvTLGqtU7FEQt37lR3yL07yMafst05f1DC1Qog1EUVlF8BxtOD', 'gallary', '2022-08-11 16:28:03', '2022-08-11 16:28:03'),
(98, '6sarnFHVzKCREOUFc8GDN6SZXS9kYyeeZZVwrUybVcNMCuecAJ9w0FhAn98j', 'gallary', '2022-08-11 16:28:06', '2022-08-11 16:28:06'),
(99, 'tQDVBFCadAAQzFflyYxhNBBzXKCek6dgTGBOcSK4gvFvdSGMq3o2q35HvRUe', 'gallary', '2022-08-11 16:28:10', '2022-08-11 16:28:10'),
(100, 'qQxawki4FhjrEmjCDnitmKebctywYDtBecexNlYBjBg2iqGeZhyVdzCGL5B2', 'gallary', '2022-08-11 16:28:14', '2022-08-11 16:28:14'),
(101, 'L0lTHeFYp02dAwHnayB42NrDA3XMn93SENONkWQ2oG4j6ypHrEKtUhZYySu2', 'gallary', '2022-08-11 16:28:59', '2022-08-11 16:28:59'),
(102, 'r9KyIlgIREakENdqBg16a0xlbAYI9dmdVsAwR2FpMahS4tReoapLMJuCnfig', 'gallary', '2022-08-11 16:33:33', '2022-08-11 16:33:33'),
(103, 'Zg5YlTo9UPgCN0LcNxvADSuL6Pjx99aHGgGYCCvJaiNydTPbxsIRYF5ql1tR', 'gallary', '2022-08-11 16:33:37', '2022-08-11 16:33:37'),
(104, 'T6S8WX4zq4du7CZfaHIFW6m63yLZlyfJgESUdqaaunrEgD0fgOARNtCDe9QP', 'gallary', '2022-08-11 16:33:41', '2022-08-11 16:33:41'),
(105, '5uCTtDuxTb5WdMF5SzN3FYayMXLm3U9TsZehGDkYkVILHFMmO15bgoG5YOET', 'gallary', '2022-08-11 16:33:44', '2022-08-11 16:33:44'),
(106, 'LjjNarmn6yV5J3qv0jM371sB8XcEbV5fzEMieZdN6R0LnQ6HLbko9QT1hCUE', 'gallary', '2022-08-11 16:36:10', '2022-08-11 16:36:10'),
(107, 'x4LbnLpLQGalsMlyw02RAQY9JQZlhmYNPM1TeIFBIepwgIlDLWLZ3dlbw0Sa', 'gallary', '2022-08-11 16:36:54', '2022-08-11 16:36:54'),
(109, '9Sh412PucOQ2EYaZU64IbOQZbbMRhw9n8YE6nVzSuGQJlgZOoUXjEUCgyrCh', 'gallary', '2022-08-11 16:38:32', '2022-08-11 16:38:32'),
(111, '5c4YtlLk5JGdQB2Tz38qIhRSjN5qgDjnYsWi24xreL7NvXA60x6q8F9oahQQ', 'gallary', '2022-08-11 16:41:50', '2022-08-11 16:41:50'),
(124, '7ycQVknwD05Penz2uSaiVi4bqFQDUFWh917q5XBLpZC0XvzHFk07R6bp1nIA', 'slide', '2022-08-19 05:23:58', '2022-08-19 05:23:58'),
(125, 'R7tM3WL68L2avTwSv86YQUO7uPlYvACmMPZMTb92Xd6liP1DB9MjvxBZ5wBk', 'slide', '2022-08-19 05:26:11', '2022-08-19 05:26:11'),
(126, '9pOVGBqg4Xp8oTsWvZ8APmb8mC5mt09ctw39FsDUV7sJHG4I292PM3aDHJqT', 'slide', '2022-08-19 05:28:16', '2022-08-19 05:28:16'),
(144, '7JkLdIDgmY9rUCI0Qce7uvU849ocRmsRvjCLy0kJ0TNNPvZZmtDy7mIMm3On', 'prospectus', '2022-08-23 04:38:17', '2022-08-23 04:38:17'),
(145, 'UdhjayQyk0SnsiqChB4f0uR8G9oCsGOD05lrOdgKmIlnT74U6wLBF6W44myQ', 'prospectus', '2022-08-23 04:49:01', '2022-08-23 04:49:01'),
(140, '4KfY8Gf2lLWbWt1OQpKe2gGMOLQ3nTNaNVbR40WilmFhI58ghwpyxCMIotl8', 'news', '2022-08-19 06:07:16', '2022-08-19 06:07:16'),
(143, 'SAaPzkqEZddlwZLMJTS1m8pxSyx7Ja7ROhXXlX6IqSnHg4eNO0lX8QSOJekn', 'prospectus', '2022-08-23 04:37:50', '2022-08-23 04:37:50'),
(146, 'aNQhUzaUBTsDOQmUyojakyS324oQGOvY9wrjN3FPg0w8jAERNE7RIwIFvIw6', 'prospectus', '2022-08-23 04:53:53', '2022-08-23 04:53:53'),
(147, 'rq7IfhkLOSumMnkXKafeKLisPwzDVKblKO9MCFrXZnygHKvEEeCv3c77Sbju', 'prospectus', '2022-08-23 04:55:41', '2022-08-23 04:55:41'),
(148, 'awyO81KOwTK2ckXF44SM7TpxbUNve6pNR3hCv1m7yxyZlu19spPQgUWlgAs2', 'prospectus', '2022-08-23 04:58:44', '2022-08-23 04:58:44'),
(149, 'VHQ6vzQjC1rz0t9QErl2LeZ7fehZJm3vJPPs6HtBfitNFNpUttjnry84dK95', 'prospectus', '2022-08-23 05:04:58', '2022-08-23 05:04:58'),
(150, 'kxz107VlKyRG0Jh3WC9auQ1AQRkpQsgGtLiHgZrqvpd4uE8DCJArJD2zJYBN', 'prospectus', '2022-08-23 05:09:01', '2022-08-23 05:09:01'),
(151, 'Q7Cf94LAofWEYTzYcrkqNdKZVES3fNd4hr5oB6BT1CYWBCmgccy1lxSsNvX6', 'prospectus', '2022-08-23 05:10:34', '2022-08-23 05:10:34'),
(152, 'oM5RiwEexGiu2Hl1T7PsozLMVe8Fn1ktIrHwnlClWawC4EpzmQAtnCe6sM3x', 'prospectus', '2022-08-23 05:34:14', '2022-08-23 05:34:14'),
(153, 'cJnRt1i2f6y7c0rbWvGHMt7zJKmFvNZ04maZg6nf65GaHmCAMITTpNhozWjq', 'prospectus', '2022-08-23 05:36:05', '2022-08-23 05:36:05'),
(154, 'tWof7zY2eH4XMsXMGRqBBNZyIwnXb4IDVjAqPC8wIo5F11spduaWVAvAXW8s', 'prospectus', '2022-08-23 05:37:02', '2022-08-23 05:37:02'),
(155, '9wh29FhBdyzUDt6sDzrQjEsjeY2TxPqQ2VhP7Qn4Ju4lY0olLeR9D3S9SHdB', 'prospectus', '2022-08-23 05:39:34', '2022-08-23 05:39:34'),
(156, 'nWt4scuXJrsvBy9S4oxAmOFiXZPXIAftACA7WQc2BW4ZfQOMB1B7k10wqwai', 'prospectus', '2022-08-23 05:48:14', '2022-08-23 05:48:14'),
(157, 'uExSY6iEZ2sLKGc9oYDtRHLqgJBJeHhMMTEt4jdxjF6ythIZc1VrYIRidVUk', 'prospectus', '2022-08-23 05:50:21', '2022-08-23 05:50:21'),
(158, 'OdFCFBJfTA5KBisGZaGFo9K3rXkHCj3NjaDlevAv4tCPp7IYco83ClKz9xA4', 'prospectus', '2022-08-23 05:52:20', '2022-08-23 05:52:20'),
(159, 'W2WSX9EQSOj9da3o4FEIOETfLbfmMyVz5wgaFXbiRAuyVJX8XLFC2fSGesXf', 'prospectus', '2022-08-23 05:54:32', '2022-08-23 05:54:32'),
(160, 'Uc5YdGLdPBWKMO89DaE5ReE80U0MxsooqJwDunO72u7n8REtCdOikTbV2D4A', 'prospectus', '2022-08-23 05:57:20', '2022-08-23 05:57:20'),
(161, 'OUFcYYpp4ExxQYHyGCW9q3X30RGVKr4JmqoihqDWaqMIhs7cbvbB6Y6PaUfh', 'prospectus', '2022-08-23 06:00:37', '2022-08-23 06:00:37'),
(162, 'YQLOGo9PN6SG1Ln3qakDiLfwXbicxMfD2lcDYbzemEodc8GPc80D0b32iixK', 'prospectus', '2022-08-23 06:02:43', '2022-08-23 06:02:43'),
(163, '8q3bTTCs9bh6xihXEaoETYOGQZ4xJiJh2UXAx1Yjut6HR2YzEwzGmtvts4NK', 'prospectus', '2022-08-23 06:04:16', '2022-08-23 06:04:16'),
(164, 'hM7O7BIn6TVPkoZz5nYkCPfN16SbqcucSWikCqYNjk3G1rHCTVbnHpi5n8IA', 'prospectus', '2022-08-23 06:06:53', '2022-08-23 06:06:53'),
(166, 'WsCjw5czfCjD36erxodY2oBDDYu3F1lmzP0CErRt62D5sLAEcel24JKdedlr', 'prospectus', '2022-08-24 01:44:03', '2022-08-24 01:44:03'),
(168, '1nu8EznnI89sZTWz8C4GTAMt3LFBLN3P6AGfvVWXSHNVhdboPNbU5FomLGx1', 'prospectus', '2022-08-24 01:58:25', '2022-08-24 01:58:25'),
(173, 'JzCs9enbJQfqvM8LhoZPnmRT37liC7I0q5i0RaonlNI3tlydj2djnI6srerA', 'prospectus', '2022-08-25 02:47:04', '2022-08-25 02:47:04'),
(174, 'EKH527VHeBUyBzbtJjXPVYAaBxPJTApy4yl3IRCW0xzDCqHRHRyjgu7Enbid', 'book', '2022-08-25 05:16:09', '2022-08-25 05:16:09'),
(177, 'gFaA1NS8qGOupVjJRNwZc0rIob2MwbewWE5ZKzxnjOe9WE8laFqDFL5FYJYq', 'book', '2022-08-25 06:48:43', '2022-08-25 06:48:43'),
(178, 'clWiCF6vslVBADdFI9sjTOYFl3mmWe3scSDAyRx42G9Dyw5JMFl7hmRgdQI8', 'book', '2022-08-25 06:49:11', '2022-08-25 06:49:11'),
(179, 'afwPQETSBrfgRHYWkHsNzjzvKdGqRF4P17kRnrHsgZgqeXH5ujsy1KuKjSIt', 'book', '2022-08-25 06:52:48', '2022-08-25 06:52:48'),
(189, 'bx1eK8LsIMdD0FJRuNEnEc0rREpPZVFKecYuVRdQubD3pWdzwsk9jAe1bxqs', 'icon', '2022-08-30 00:44:31', '2022-08-30 00:44:31'),
(190, 'zQsEbDgSfJCEMpOn8uPtubzTm0CLhQefBdj89DrlILb4iaKlgc84DdzxJ2Om', 'icon', '2022-08-30 00:48:28', '2022-08-30 00:48:28'),
(191, 'XVE9V4imMHWYk0j1gijkrSozuojKayVW4cH2WCmaNvQc3SGNaXh41f5jw9aA', 'project', '2022-08-30 00:48:38', '2022-08-30 00:48:38'),
(217, 'NMCk5YN0f0OIRHmnXGt4nX1dh6kThYDENo9X6Narobj6QHJ3CRDofv2e0dvj', 'banner', '2022-09-01 01:06:46', '2022-09-01 01:06:46'),
(218, 'RkT3UIvgbIuGk3COk0IpgXfSMvsHQf0e55m5NuKk3q6I6bXmjOwaz6R6aonN', 'icon', '2022-09-01 01:09:35', '2022-09-01 01:09:35'),
(219, '9qmLTim1w5xg2X1GulriTduGhCIpzn9Nr7MtGoCb1Pt8e4wPBwLAlSYINGig', 'project', '2022-09-01 01:09:51', '2022-09-01 01:09:51'),
(224, 'WMVGZ2VE9ny2ngHoxgH09i4etTOLWoTrsXjDG4nNAP9QQtC4gBHqHjfgVCx8', 'icon', '2022-09-01 01:20:45', '2022-09-01 01:20:45'),
(223, 'DMSwGIqrsB6HQYhvVmRiyg158dXqUxUeWsZRq5O3aQpVi38aKoz56Sh4G9Bh', 'icon', '2022-09-01 01:19:28', '2022-09-01 01:19:28'),
(232, 'YHQfskz9B7AfjYfllke7nEQ5PH0DN0f79fBRVGIg8yNQxgPACnqCf2tAhq2B', 'profile', '2022-09-06 00:54:59', '2022-09-06 00:54:59'),
(233, 'l80mT7zrtvLX40xuD3bdTsiltuoTVGF5AbgMneDuDnqN6jKAoWMf9RxpqcnQ', 'profile', '2022-09-06 23:24:43', '2022-09-06 23:24:43'),
(234, 'RnccCscIkS7zzdsNQ1PgubhOmTq3WtVWoC3D6CbTycgGj7q9tkoFkW3zUwRU', 'profile', '2022-09-07 00:18:16', '2022-09-07 00:18:16'),
(235, 'BNlkGoMpqVcmw4aUqU0y7s0vclRbCRaPBALunw29PVaIsy1WvLK2VqgQKyT1', 'profile', '2022-09-07 00:19:01', '2022-09-07 00:19:01'),
(236, 'YhaW4aDtFnXjepkeVbRJ3JJsGA3eNQPfEMweuPRaR0CErvMaPGhUmdIf967L', 'profile', '2022-09-07 00:21:07', '2022-09-07 00:21:07'),
(247, 'rerQw7rV1GoWhkYKk8LLHBckNP0j3GmHvzF5ZLhiIDhHAr3U1Uq6TekR0Bbc', 'gallary', '2022-09-27 01:46:30', '2022-09-27 01:46:30'),
(248, 'EH71UX5NU6QQ8rYE9oJLIzhvJc6nbJuTJBgF3N2gPWnmqN3BeQtTogkKYdye', 'gallary', '2022-09-27 01:47:45', '2022-09-27 01:47:45'),
(249, 'OYcl9SshpH7UeYWt87PCl1k4KaK9NDUdkd5txCPH6eGLYGkuku8khoSYPA7D', 'facility', '2022-09-27 01:58:44', '2022-09-27 01:58:44'),
(250, 'ohOEiilAzfQf0Q3yONxZ0fLlOAHzL31MNSU7vBS1AxaKiPm9D9chq5E2TPfQ', 'facility', '2022-09-27 02:00:44', '2022-09-27 02:00:44'),
(251, 'oeujck415Lldb1cuSErMBwUa5PUx8ur67rNvQ4Z26mT4h1lCF6wreaZWGWfS', 'facility', '2022-09-27 02:00:58', '2022-09-27 02:00:58'),
(252, 'wHWUXEwfvyJLQkaAbnlgaPf21vKe39I8BGVRkvuhi4sknbjd7WOj2T6AgZK3', 'facility', '2022-09-27 02:05:48', '2022-09-27 02:05:48'),
(253, 'ZpMuT1BQxJ8zWG4rW9nUKs1GG0Hp1ZH66Rvk7qWqJX8wfi7BmG6HQD1G15uM', 'facility', '2022-09-27 02:06:02', '2022-09-27 02:06:02'),
(254, 'AeBUsfmOtCVafwwNyZs5X172l3GfaiGSN4EXnZ2QFlw8ucDqBN0WbxffaqjC', 'event', '2022-09-27 02:11:34', '2022-09-27 02:11:34'),
(255, 'USkS9bC9yFDHpVIaegCzi6G4RJ4PSch2TMvSTr3jGc9BKArel1ogW9eUNhcU', 'event', '2022-09-27 02:12:04', '2022-09-27 02:12:04'),
(256, 'je4iBZQadb1hPOI5xLGXjcj9YOUTmbdCgca6o98TqW4HbW17UP7Q2EPNHJ6p', 'event', '2022-09-27 02:12:56', '2022-09-27 02:12:56'),
(257, 'HzjnW8epjp0bD3S7FQMNMek5To1oiGVGsMAt2VxnNXvXesr7LmhPdWPZTDO8', 'event', '2022-09-27 02:13:07', '2022-09-27 02:13:07'),
(258, 'gvzADrC4KunsJgDMZ5TbwyVvWV336q69uGW0TsUUGwwIjOEgcSSsZjzQntb2', 'facility', '2022-09-27 02:26:36', '2022-09-27 02:26:36'),
(259, 'QFpXigGnA6NXB6AQQfuOFxJx78DlN0gTxou6gUlPFq3StyvL3TRfamA7svXx', 'facility', '2022-09-27 02:26:51', '2022-09-27 02:26:51'),
(264, 'XJPXRYJbRJqmisTX8AlPcN2WY5bZzaQOaxVwNiOHvG4keUTNPi9A4VqSd69L', 'event', '2022-09-28 00:22:30', '2022-09-28 00:22:30'),
(263, 'kM7z2ilA3m52fCTl6TYrbud2unjmctYtrnI3tVvAHLMdHSJBbRoEuXtA0T10', 'event', '2022-09-27 05:18:02', '2022-09-27 05:18:02'),
(265, 'dVlQBYrxsjkNKJNgDk9Dq9L7eArRmqTFWzJL2PdKQ8UkNB2W04jTWvvNiF4L', 'event', '2022-09-28 00:23:10', '2022-09-28 00:23:10'),
(270, 'rcKOUe9lBHp380kC9KHvDFe5MLrQvmisfIM5imjsl9Ctv9o5fl1sUC917hSE', 'facility', '2022-09-28 01:14:09', '2022-09-28 01:14:09'),
(271, '8zHMKXt3lpRHoGyJe4Gw31ingRhLqBeuYKAHdY9Rv5zfHoADqBze9Bege3L2', 'facility', '2022-09-28 01:14:47', '2022-09-28 01:14:47'),
(282, 'y0IgiNdxI2RTNvTcKV4JkMMO34cOuL6lHztQM32ZdGoB3kLQT1bsXQjiX8Hh', 'profile', '2022-10-16 12:59:08', '2022-10-16 12:59:08'),
(286, '7Oi7L8LdfQA33OqZyA4m87nJO0HO4xWb6RRrFX8NSx877s7uBJKQLanWwAbk', 'profile', '2022-10-16 14:04:13', '2022-10-16 14:04:13'),
(288, 'IfGNb5fyvKcdllZj9xdVt7gkaTU0Ij1qWn4SFD80zXxZV3mKAf9wOgcWkDC4', 'profile', '2022-10-19 16:18:03', '2022-10-19 16:18:03'),
(289, 'NU6o7J6ksjsUZxh4vgB2WeDmOfC1lUzswzNJVn9iERuTzNrUgXiZlVnfx1w9', 'profile', '2022-10-21 05:42:55', '2022-10-21 05:42:55'),
(290, 'CNl3lcOyc3gwdcLJ2gINQtizoygRIWjhIvIAQEsLIAu6yeEsYVNWmSqFnx7D', 'profile', '2022-10-24 00:34:51', '2022-10-24 00:34:51'),
(291, 'k9Lwggm4g1FOm4C1ZxmxpzXIS2sqagqEfifJ3e8X2IyhOFVxrfwJT8B7WvkY', 'profile', '2022-10-24 00:41:33', '2022-10-24 00:41:33'),
(292, '3usM9lwODucDlObPBLcLn3VUBZPux3eyWvVYURpOKaJGB6wbc1cOIeJEoyGX', 'slide', '2022-10-24 01:17:32', '2022-10-24 01:17:32'),
(293, 'gSBEcQVkKoezvPawxyxUR4DZgemP12L0twACbBgjXu6NJ0Kf3MWivuefl5kb', 'slide', '2022-10-24 01:24:59', '2022-10-24 01:24:59'),
(294, 'sGliYCp4viHCWm06tnJKKwOHV2hMZnTK90w6PxfcuVi5DgJYDUp2tMXkfDIv', 'profile', '2022-10-25 01:05:13', '2022-10-25 01:05:13'),
(297, 'jUwLTKwMXHOzSc3T6ZPwPLuvrok7dGgVz7k61zHWfwS7CUDzpK9fUraHvmxl', 'facility', '2022-10-25 01:28:58', '2022-10-25 01:28:58'),
(299, 'K1ETlpO5AxZI1xsAp5au9w4dQR5lvlxwNLJZldVub3QsJQU02Oih58JirGU5', 'facility', '2022-10-25 02:05:36', '2022-10-25 02:05:36'),
(304, '1Bcwi0e0deWXO7ltIWRhvXdS6X8xrL1uD5kIHnPHvgaTU8BoRRKNoMkFlWca', 'event', '2022-11-11 05:18:52', '2022-11-11 05:18:52'),
(321, 'tq53xq3ntM9JjPokBml7lFbyjHoUHK1tPjIpPP241nzahnZl3qlFMs6C8sxf', 'result', '2022-11-22 04:19:20', '2022-11-22 04:19:20'),
(317, 'IRCQkuQHPtke21hKrW6RMTnRvNKgfJioWz7r761zUljX7sL8MBmeLEoLgZdi', 'result', '2022-11-22 01:39:12', '2022-11-22 01:39:12'),
(319, 'RlpCNJTUzKNTxHZ7QXIFPGcAnhYjvR5gCUDiHSqHFMKYHBMl8FIddKBLEKg3', 'result', '2022-11-22 04:17:08', '2022-11-22 04:17:08'),
(320, 'df2CQMqWwUZOQPwvRDcE7OJSsv2koSm6SjlgTLBrKZvunRwWTzcctskLwMmD', 'result', '2022-11-22 04:18:28', '2022-11-22 04:18:28'),
(322, 'bzfI69r78VwuUWWivaSpLli0BnpeCwfavAQBIywM41NygYBkuZqfew82QbqV', 'result', '2022-11-22 04:19:56', '2022-11-22 04:19:56'),
(325, 'hWV4ZtWDQdMIFx0x81D7TnyB7mcfIEwEOW8WCVsZhrkU3NoLc7fHSpUhcsts', 'result', '2022-11-25 00:40:47', '2022-11-25 00:40:47'),
(329, '0XVRKNOBqDncmPHhO2lDptYZjZ4Vcaohmw0yoXiAVeTJIFN8PZ5KWX4p756J', 'event', '2022-11-28 01:46:08', '2022-11-28 01:46:08'),
(331, '7fYkKK6mBm4AQPhgB2YWf2hpUlzTJiTdiULb7LHqszGq2RhtmOUnKVInuy58', 'result', '2022-11-28 03:56:11', '2022-11-28 03:56:11'),
(334, 'hdkG7YQEZIC9qfhm3npkJR0Ho0KG3hmDpbwKyhJss6LtxNKcLJar6DKMmcHo', 'event', '2022-11-28 04:58:36', '2022-11-28 04:58:36'),
(343, 'CJQn8ki0YgdG1CbW4OdcSRhFGvQYrzY5gr2fQYOgQ5cMWChYojxXDoN1gdxs', 'download', '2022-12-07 04:08:37', '2022-12-07 04:08:37'),
(344, 'EtubYJZN6dt9ahaacaclPLDaM5dh3fpR3UUi02m4xTq5KHXWVSITGYbknuFp', 'download', '2022-12-07 04:10:09', '2022-12-07 04:10:09'),
(345, 'Wunf0Ggj933Uc9jGpBYXOnLWWsiLzggzP4BN4CArV8EFGqbmCM67bYsFk4oz', 'download', '2022-12-07 04:10:22', '2022-12-07 04:10:22'),
(346, 'E34WXXqAK6415kNBquCVBKhCNdT4kaiCvR7hFZDxPUBADyQPIVJmbq6IBXW1', 'download', '2022-12-07 04:11:24', '2022-12-07 04:11:24'),
(347, 'qRVcC30EFDZGygp7e7W6yyyOpAUDBpAN2eQwc0WzjWkb3SAu3DatM14SSHsS', 'download', '2022-12-07 04:13:47', '2022-12-07 04:13:47'),
(348, 'gmD5YASjXMnI9g3If77BnVijcUOHe56bpICTvf9H0BOlbgGyMLTVvNeZmqmI', 'download', '2022-12-07 04:15:12', '2022-12-07 04:15:12'),
(350, 'Fcns54AYkVrlKSSWKGRJiYeyecia74etluY6wUUz1M06O5JsLiQgdl6IOgOA', 'event', '2022-12-08 00:13:34', '2022-12-08 00:13:34'),
(351, 'EtPgj6o50R24qsFWHPR4QWHmeCcm1exss9ynXkMGJ2bRt18GtkSXnYxhzgz2', 'event', '2022-12-08 00:14:22', '2022-12-08 00:14:22'),
(391, '143xT7fDR3UpLZ5F8W36phiQVGabfFf6qjaucYjOf5WZsIoYVfPKDsSvLEzc', 'work-project', '2023-02-22 02:33:02', '2023-02-22 02:33:02'),
(371, 'SeDTfs44kkrr6a1hiMNdGThFORblTcdUW5UPzH0xCMXnrgeModgflnYjie0y', 'event', '2023-01-05 23:51:54', '2023-01-05 23:51:54'),
(392, 'tvXhBRdkcf58qvEIeiNrFHhtqmhg49xq0ROzWqDeEpUZmBXs95t4TiFqFROf', 'work-project', '2023-02-22 02:34:03', '2023-02-22 02:34:03'),
(393, 'CnS6srHLp1geHJl4gSXZN7dbmGSPZNmC4jmz9N2MGlj32OSAyNOOeiYvFX22', 'work-project', '2023-02-22 02:34:30', '2023-02-22 02:34:30'),
(394, 'P0JHnNtGtQHu2UHJpuaQDb3hpUkBQAj56GwWfqHryYLlg3l0RgPgpcGknNli', 'work-project', '2023-02-22 02:35:03', '2023-02-22 02:35:03'),
(395, '3425orLY3MMTLyu3gN1n9mzFMihonxCDjsBCsuL9VLEFxssqs5D4IiPC0weJ', 'work-project', '2023-02-22 02:36:16', '2023-02-22 02:36:16'),
(396, 'ZB9pQSii7nTXXGH2yu11CTuOVJ8qW8H07g6MAqn7mljIayMtKnlMlCt5ziPt', 'work-project', '2023-02-22 02:37:16', '2023-02-22 02:37:16'),
(401, 'IjriV1taDDawx9xxkdgdmRYsJuBVVN4IoGc4qAI2sqsgeo1MU853f5z0squT', 'work-project', '2023-02-22 05:15:18', '2023-02-22 05:15:18'),
(437, '7KtuQNpIeGgCecgN5miTxidVwZ0Q5VyGGChVNnPIapGE3sxHkQhkt0zi4aul', 'slide', '2023-06-07 14:27:38', '2023-06-07 14:27:38'),
(438, 'SL6HdB03WdB1AXTdaHTDhs9Idv32r9Dp5YquVx1flv2H6heNZLPuKHMvMT0L', 'slide', '2023-06-07 14:29:20', '2023-06-07 14:29:20'),
(439, 'CY3YUc9ubrvcJmjxVJ68akZKlyed98BldgNTGtSyfTO5hTYxLOjjzDt5QQzd', 'slide', '2023-06-07 14:29:42', '2023-06-07 14:29:42'),
(440, '5V8fkOZphLmP0sTOzI6nUAxZNhmIZZwSA7af9XfdWBjeI2zU4DJRm9ReDzMM', 'slide', '2023-06-07 14:30:28', '2023-06-07 14:30:28'),
(441, 'svYL4e8Us5x4Csb8Vf58sPF8jWy4sHb7ghB1wLVoZOKoMZ6sHhYRTlaUP0M2', 'slide', '2023-06-07 14:32:20', '2023-06-07 14:32:20'),
(442, 'UiZl8Vuo0HQWNUTs2DfXpgZklDNt9AGsoR8xT3a1fU7GfiZBzZo6qCk18THf', 'slide', '2023-06-07 14:36:32', '2023-06-07 14:36:32'),
(443, 'ufG0Tc4QYr4gfuxRNFuNmLieZeIF58c0Qy29EUQZ0zGFxkCblWmpcf2GyDSb', 'slide', '2023-06-07 14:40:46', '2023-06-07 14:40:46'),
(444, 'BXJmATjatKHbab8JJ7O4PyVIrHsbn3CnR3IBbGnXYyQLPLn4jAOHXl1QdgCt', 'slide', '2023-06-07 14:41:29', '2023-06-07 14:41:29'),
(445, 'MHfNCR2RLPRdLmCngrmjBtr6aZ4hNvHhB6dBR8AzW5rpuywE3sjMvG0fLHz8', 'slide', '2023-06-07 14:42:25', '2023-06-07 14:42:25'),
(446, 'Ne5CYTXqOzTtznGiW5YuXUuk985jeBhZbeAuiUCgzQS0BiM7gps5R8lltjlp', 'slide', '2023-06-07 14:56:48', '2023-06-07 14:56:48'),
(447, 'KrYfoN4oDmRSPcrQzyRXwKRm98dmiI1X9aiNjTvpZmIBZm9zZ3PE3vIecA0i', 'slide', '2023-06-07 16:19:15', '2023-06-07 16:19:15'),
(450, 'hGecSFXbCt18HOr7RsPWrkQ0H0g0Vjc31YywGzbbttUjcJQEg4aVDm7aZN5a', 'gallary', '2023-06-12 16:42:20', '2023-06-12 16:42:20'),
(451, 'xdL8SH4fnTRz8TDzlLrgeapdR2QELsQifXXvDUstojbN0YdK3S18oyioxA6k', 'gallary', '2023-06-12 16:42:41', '2023-06-12 16:42:41'),
(452, '5g4Mgxpss9YP29f4b76GFkyv8XwC1JVfYuYPo9RSSCZpvJmaWmPlFgHWavac', 'gallary', '2023-06-12 16:43:16', '2023-06-12 16:43:16'),
(464, 'm6UDbrbsSCrjxVazKqZXBMEiFT1XQUAn8s00J6OsWbqQ5bzzyiNJ7mZKh8I3', 'header_logo', '2023-06-19 02:26:23', '2023-06-19 02:26:23'),
(465, 'iZPk52S8sM99yixUvbBrntzSNxLIQt8Dv6lh6oUIttbz7poOuwr2D9EpdH4j', 'header_logo', '2023-06-19 02:27:00', '2023-06-19 02:27:00'),
(466, 'gc4rYfWmNJQ2XKHODRoa7OGl4IAiEaCK2oXldkrwAAaCFiFl6lrZwMN5Hnta', 'header_logo', '2023-06-19 02:29:12', '2023-06-19 02:29:12'),
(467, 'nijuvy9Ed0ah1frMcQ2dGYJoVhJN1eIt3yuGyGG84TDjvs4wygcbukhbt7TA', 'work_logo', '2023-06-19 02:29:34', '2023-06-19 02:29:34'),
(468, 'piE7Fex4wd139SL2uXWlvu4NMYs7rAi4JpRq8EcUjEZfR3GCQcwyHm6thpHh', 'work_logo', '2023-06-19 02:29:45', '2023-06-19 02:29:45'),
(469, 'cInFD4K06I1s4c1GUGZ3RUy8a7HMTXv3kCxnuuLJcNxQj0NXrFlt2gOPNfs0', 'header_logo', '2023-06-19 03:15:29', '2023-06-19 03:15:29'),
(522, 'Y7ldDRBNYc89ueZTCkiWdGiBlWtN63V6LX3r3HJIErU6VZr6He0NQcI5FDPe', 'event', '2023-06-26 05:44:25', '2023-06-26 05:44:25'),
(523, 'MmrnqjO7yOS0a4RmmuNCO6qlspV6Wt9mBxKsUhmrYnoHOpK64mm7X7v0cl65', 'event', '2023-06-26 05:44:27', '2023-06-26 05:44:27'),
(524, 'l9ytbulEoRk5sS2Kn9Q3EyXfXJFmyWdWsEv0502Kjt2IjDwxbwIE3iHEutAJ', 'event', '2023-06-26 05:44:31', '2023-06-26 05:44:31'),
(521, 'MlTwibvijCsLXbpnoPtV76lwe5vpaUTrLZPUUdBZKZwBrqMQj08geVXY7W8M', 'event', '2023-06-26 05:40:42', '2023-06-26 05:40:42'),
(520, 'b3Xcfgbq1CZuDRNsNdfwDCyd5gKSnnIqfCFMrBfVqFgV1YdR7IlCH85mf7DX', 'event', '2023-06-26 05:40:39', '2023-06-26 05:40:39'),
(519, 'uof5X3hLfKaQBQT7zrLpz6kgSGUoyiAUFh9BoMZJ53s0fZ9c9zeXeHupGOzc', 'event', '2023-06-26 05:40:37', '2023-06-26 05:40:37'),
(518, 'FH3nSvRKW4SJ5rXFxlfSHzNtwBj4GNo08qAhCEbqN2pAP0RFNNldIAlicKx4', 'event', '2023-06-26 05:40:34', '2023-06-26 05:40:34'),
(517, 'aWykThpf7HP9IaYZR8T23Q85j8JRVK3oaV1aAD3sxiQxNcg0ZScUcF0JeXSb', 'event', '2023-06-26 05:40:32', '2023-06-26 05:40:32'),
(514, 'FQxNBTWYwQQsGxFBpFwk4dklIOJYMATN4nRfzyMmVWKRj0A4APwOE3tpdMfN', 'event', '2023-06-26 05:40:23', '2023-06-26 05:40:23'),
(515, 'ssDiUV0tH3i4yakz6zSk2BYLa4jaLXnv3ZezxoRTNhTWLsUgic0FMZLRc9aV', 'event', '2023-06-26 05:40:26', '2023-06-26 05:40:26'),
(516, 'wsNmTcSuE41uSgcxkMDuJk2Fgp1jUcKJcXZVbn4bY8EkRfHYem8fqxNvPXgh', 'event', '2023-06-26 05:40:29', '2023-06-26 05:40:29'),
(525, 'WqjoQ4VUES5XbHyIN6QIq0H5sB6ELQlc7M1fzhbkIjbuxDiM19RdguG9jHFm', 'event', '2023-06-26 05:44:33', '2023-06-26 05:44:33'),
(526, 'WwlrVei9P3NsuvJedjiNbh4TIyzbMWkYu3WqjWP6aphANhWG2gUtSPGbZ1Im', 'event', '2023-06-26 05:44:36', '2023-06-26 05:44:36'),
(527, 'SDh1ZvQANnrPuG2GHDZhEtLQCJblsOuX0Erwk4TpuHCEnXBxQDsGPtPGRyQj', 'event', '2023-06-26 05:44:39', '2023-06-26 05:44:39'),
(528, 'okqs3984sY4mPuMx2X0iW2U826pOuqyqLA33dMMlcu7zG9Gks1WnvYvWoppF', 'event', '2023-06-26 05:44:40', '2023-06-26 05:44:40'),
(529, 'sEyzfjOFK0ApGqewzEaDEBWw6JLfZedejPnMLkoreRBtmT82gBMyAXcoL4lj', 'event', '2023-06-26 05:44:43', '2023-06-26 05:44:43'),
(531, '2kMdsFJ0DYdRtK1KXxpHdrgymBAvVI7B5dLlGnCDLcFktIPzadxPTG6AaCj2', 'event', '2023-06-26 06:01:44', '2023-06-26 06:01:44'),
(532, 'crZlHpIn5gwVRjcxUOB2HUlMi7DECYHqYC8v2KvN8gS6ymTEP8LHkG5emk9K', 'event', '2023-06-26 06:01:46', '2023-06-26 06:01:46'),
(533, 'ir19Mg3YjFNmlhvaF46h0QspqCCNgdPdO8sfjToFuySWqurLFyopGCUhYPiF', 'event', '2023-06-26 06:01:49', '2023-06-26 06:01:49'),
(534, 'zycsHelGk7bQX0JGPYwcU3myKoBAvsiOIFZgFL0LVDEP1rRlgl3ZUsS5EL9M', 'event', '2023-06-26 06:01:52', '2023-06-26 06:01:52'),
(535, 'XiQYYcDnNPv5GO0n82RDcPeKCWSKbPCu13wWdWmSkmadQmz5ARSw90CwA34W', 'event', '2023-06-26 06:01:54', '2023-06-26 06:01:54'),
(536, 'JgAUat12b0aHqJxKuQomFs6wgcDKPtlmYOfzGkaOUJvNZgnMEJ9HioZcaTmW', 'event', '2023-06-26 06:01:58', '2023-06-26 06:01:58'),
(537, 'rIXdqxz1EbLYrmTiaf7XpqQvCqvKEAm9TuTlDeRxoxrgCKkENYbCgZdC0yYz', 'event', '2023-06-26 06:02:01', '2023-06-26 06:02:01'),
(538, '3ouvnZ2vcJHiUizNyIzTU2L6elVo09wxr5utqUovQnprF0d64r4ry9c4OiR8', 'event', '2023-06-26 06:02:04', '2023-06-26 06:02:04'),
(628, 'ZTEaFWBqeezMnpS66OiZwcEXlQKz3tgOrky9m3nntXccnxxuPwbfzIjqsto9', 'gallary', '2023-07-07 00:35:35', '2023-07-07 00:35:35'),
(629, 'p3djJbc7bHIddT1qz9n5ZH5UqQNGhMuhjDBULnDUHiplCHChQC5q7RYxhgaL', 'gallary', '2023-07-07 00:35:37', '2023-07-07 00:35:37'),
(630, 'elvXIbFLYU6NJyaoIOcEEJtLNu4xY2yUONcb1RQ4ZpzslibMjDaryv3r7tkl', 'gallary', '2023-07-07 00:36:14', '2023-07-07 00:36:14'),
(631, 'f8fHUblXk8hhJnV42wOrJhAncxMqzDCEARC1UPPkBYXYpJ6rYdesA02FufHQ', 'gallary', '2023-07-07 00:36:16', '2023-07-07 00:36:16'),
(632, 'DMT1MM5JwtF3eWrJcNeCZsdmQDnFeZhloEjQv4WFpn93ws43Nj6NiynG3222', 'gallary', '2023-07-07 00:36:18', '2023-07-07 00:36:18'),
(633, 'jjTzb2Tbhliptido2hIJ87t7fDFNWD42TOPTF2M05wceqY0K1FmlkPFiLEMh', 'gallary', '2023-07-07 00:36:21', '2023-07-07 00:36:21'),
(644, 'VKwOIkMfEUKqJwk7kSt9Fx7PTJMuEGD0awpUIbrKgYeOVU8BplKubzYXjGHM', 'gallary', '2023-07-07 00:41:24', '2023-07-07 00:41:24'),
(645, 'HJDNNartMoIHaVEcvrlawzBVeX4ltSFvSAT58p7sG1x8rqq5lA3Z9iWhWgcj', 'gallary', '2023-07-07 00:41:27', '2023-07-07 00:41:27'),
(646, 'vQ4phzdRdv8EXyM6yhqIIwNx3QHMboLLJjwxh5QC9QY4UpoQFGekNGmgI175', 'gallary', '2023-07-07 00:41:30', '2023-07-07 00:41:30'),
(647, 'onoNgBicfZnMlsBv05a3C7cMcbsOCtPax7OhtcqaNVpRCR3LYxnlAs2GfpBA', 'gallary', '2023-07-07 00:41:32', '2023-07-07 00:41:32'),
(627, 'ZnXm2MnAqJkjU1jZafQYwTl1GwBS6XMfxzwOLqtoeZAizgsGlSoAz4Ldufmq', 'gallary', '2023-07-07 00:35:33', '2023-07-07 00:35:33'),
(626, 'XITpE48SV1ukoPW0OjnqBSjIpLMuw0VnzByofLD8Re2yHEExvexTp3hZsHBt', 'gallary', '2023-07-07 00:35:31', '2023-07-07 00:35:31'),
(643, 'ydtgKF1L2MFfGzgVcFG4kM66MUK0lllftwBTbHuoF6BxhnQ34GJZESdbirfi', 'gallary', '2023-07-07 00:41:22', '2023-07-07 00:41:22'),
(648, 'XmfH4M472HAAIQuJAVLPGV4eTqA2tNVnBVLWN7iO2dWlhaKVQaXhUI2uRuiO', 'gallary', '2023-07-07 00:41:33', '2023-07-07 00:41:33'),
(649, 'Z2ec0LttQTJUUuyCxVpFpMIqBRgxnDCqNpRBXkq8YpfeCDkJks9ShLuN3uWV', 'gallary', '2023-07-07 00:41:35', '2023-07-07 00:41:35'),
(650, 'c9YrawrT1SU0zmosS88URVdEgrFy57fCDxlRiopO0JbcctWaZArL6T9FhGN9', 'gallary', '2023-07-07 00:41:37', '2023-07-07 00:41:37'),
(725, 'Xq9tngbIvJFrbH1kSuhHQV0G7JF4ldDgM395UjW7L4nCoOAflNM328qxGHZH', 'slide', '2023-07-17 00:31:39', '2023-07-17 00:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

DROP TABLE IF EXISTS `universities`;
CREATE TABLE IF NOT EXISTS `universities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `district_id` bigint UNSIGNED NOT NULL,
  `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `organized_by` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prospectus_path` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `universities_name_unique` (`name`),
  UNIQUE KEY `universities_phone_unique` (`phone`),
  KEY `universities_district_id_foreign` (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `district_id`, `name`, `organized_by`, `address`, `phone`, `prospectus_path`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 2, 'University of Engineering and Technology', 'Government', 'Peshawar', '0921234567', 'xyz.pdf', 1, NULL, '2022-08-25 00:53:59'),
(2, 1, 'University of Peshawar', 'Government', 'Peshawar', '03171670657', 'xyz.pdf', 1, '2022-08-23 05:05:05', '2022-08-23 05:05:05'),
(5, 1, 'Gomal University', 'Government', 'D.I.KHAN', '0911234', 'xyz.pdf', 1, '2022-08-23 06:12:27', '2022-08-23 06:12:27'),
(7, 1, 'Agriculture University Peshawar', 'Government', 'Peshawar', '0919212701', 'xyz.pdf', 1, '2022-08-24 01:44:47', '2022-08-24 01:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `university_details`
--

DROP TABLE IF EXISTS `university_details`;
CREATE TABLE IF NOT EXISTS `university_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `university_id` bigint UNSIGNED NOT NULL,
  `course_offered` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `duration` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fee` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `university_details_university_id_foreign` (`university_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `university_details`
--

INSERT INTO `university_details` (`id`, `university_id`, `course_offered`, `duration`, `fee`, `created_at`, `updated_at`) VALUES
(2, 1, 'Electrical Engineering', '4 Years', 50000.00, NULL, '2022-08-30 05:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `weather`
--

DROP TABLE IF EXISTS `weather`;
CREATE TABLE IF NOT EXISTS `weather` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `response` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `lat` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lng` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weather`
--

INSERT INTO `weather` (`id`, `response`, `lat`, `lng`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '{\"coord\":{\"lon\":71.5785,\"lat\":34.008},\"weather\":[{\"id\":721,\"main\":\"Haze\",\"description\":\"haze\",\"icon\":\"50d\"}],\"base\":\"stations\",\"main\":{\"temp\":27.08,\"feels_like\":27.49,\"temp_min\":27.08,\"temp_max\":27.08,\"pressure\":1007,\"humidity\":50},\"visibility\":6000,\"wind\":{\"speed\":3.09,\"deg\":50},\"clouds\":{\"all\":20},\"dt\":\"05\\/26\\/2023 02:43 PM\",\"sys\":{\"type\":1,\"id\":7590,\"country\":\"PK\",\"sunrise\":\"05\\/26\\/2023 10:06 AM\",\"sunset\":\"05\\/27\\/2023 12:15 AM\"},\"timezone\":18000,\"id\":1168197,\"name\":\"Peshawar\",\"cod\":200}', NULL, NULL, NULL, '2023-05-25 23:45:06', '2023-05-25 23:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `youth_education`
--

DROP TABLE IF EXISTS `youth_education`;
CREATE TABLE IF NOT EXISTS `youth_education` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `degree_certificate_id` bigint UNSIGNED NOT NULL,
  `university_board` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `obtained_marks` double(8,2) NOT NULL,
  `total_marks` double(8,2) NOT NULL,
  `percentage` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `youth_education_user_id_foreign` (`user_id`),
  KEY `youth_education_degree_certificate_id_foreign` (`degree_certificate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `youth_education`
--

INSERT INTO `youth_education` (`id`, `user_id`, `degree_certificate_id`, `university_board`, `obtained_marks`, `total_marks`, `percentage`, `created_at`, `updated_at`) VALUES
(25, 5, 2, 'UET Peshawar', 260.00, 400.00, 60, '2022-11-14 01:00:54', '2022-11-14 01:00:54'),
(26, 5, 1, 'UET Peshawar', 260.00, 400.00, 60, '2022-11-14 01:01:08', '2022-11-14 01:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `youth_experiences`
--

DROP TABLE IF EXISTS `youth_experiences`;
CREATE TABLE IF NOT EXISTS `youth_experiences` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `company` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `designation` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `starting_date` date NOT NULL,
  `ending_date` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `youth_experiences_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `youth_experiences`
--

INSERT INTO `youth_experiences` (`id`, `user_id`, `company`, `designation`, `description`, `starting_date`, `ending_date`, `created_at`, `updated_at`) VALUES
(25, 15, 'CISNR', 'Developer', NULL, '2022-11-01', NULL, '2022-11-03 00:14:48', '2022-11-03 00:14:48'),
(27, 5, 'CISNR', 'Developer', NULL, '2022-08-01', '2022-08-31', '2022-11-14 00:15:14', '2022-11-14 00:15:14'),
(34, 5, 'Smart Soft Systems', 'Admin', NULL, '2022-11-01', NULL, '2022-11-14 00:55:31', '2022-11-14 00:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `youth_infos`
--

DROP TABLE IF EXISTS `youth_infos`;
CREATE TABLE IF NOT EXISTS `youth_infos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nic` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `domicile_district_id` bigint UNSIGNED NOT NULL,
  `mobile_no` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_path` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user.jpg',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `youth_infos_nic_unique` (`nic`),
  UNIQUE KEY `youth_infos_mobile_no_unique` (`mobile_no`),
  UNIQUE KEY `youth_infos_email_unique` (`email`),
  KEY `youth_infos_domicile_district_id_foreign` (`domicile_district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `youth_infos`
--

INSERT INTO `youth_infos` (`id`, `name`, `gender`, `nic`, `domicile_district_id`, `mobile_no`, `email`, `password`, `image_path`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Salman Qazi', 'Male', '123458765437', 1, '03171670657', 'salmannqqazi@gmail.com', '$2y$10$XZFpzq7DRy2D7vn3JvzduO9SPt9h.DX/jaw/QcQRoZ/4mpWsXmFn.', 'user.jpg', NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `colleges`
--
ALTER TABLE `colleges`
  ADD CONSTRAINT `colleges_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Constraints for table `college_details`
--
ALTER TABLE `college_details`
  ADD CONSTRAINT `college_details_college_id_foreign` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`);

--
-- Constraints for table `competition_sub_categories`
--
ALTER TABLE `competition_sub_categories`
  ADD CONSTRAINT `competition_sub_categories_competition_category_id_foreign` FOREIGN KEY (`competition_category_id`) REFERENCES `competition_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Constraints for table `event_links`
--
ALTER TABLE `event_links`
  ADD CONSTRAINT `event_links_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `event_results`
--
ALTER TABLE `event_results`
  ADD CONSTRAINT `event_results_competition_sub_category_id_foreign` FOREIGN KEY (`competition_sub_category_id`) REFERENCES `competition_sub_categories` (`id`),
  ADD CONSTRAINT `event_results_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`),
  ADD CONSTRAINT `event_results_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels_or_stages` (`id`);

--
-- Constraints for table `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facilities_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_feedback_user_id_foreign` FOREIGN KEY (`feedback_user_id`) REFERENCES `feedback_users` (`id`);

--
-- Constraints for table `levels_or_stages`
--
ALTER TABLE `levels_or_stages`
  ADD CONSTRAINT `levels_or_stages_competition_sub_category_id_foreign` FOREIGN KEY (`competition_sub_category_id`) REFERENCES `competition_sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `universities`
--
ALTER TABLE `universities`
  ADD CONSTRAINT `universities_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Constraints for table `university_details`
--
ALTER TABLE `university_details`
  ADD CONSTRAINT `university_details_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
