-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2022 at 08:05 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `applications_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `application_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `application_q1` text NOT NULL,
  `application_q2` text NOT NULL,
  `application_q3` text NOT NULL,
  `application_q4` text NOT NULL,
  `first_choice_school` varchar(250) DEFAULT NULL,
  `first_choice_address` varchar(250) DEFAULT NULL,
  `first_choice_program` varchar(250) DEFAULT NULL,
  `first_choice_date` varchar(250) DEFAULT NULL,
  `second_choice_school` varchar(250) DEFAULT NULL,
  `second_choice_address` varchar(250) DEFAULT NULL,
  `second_choice_program` varchar(250) DEFAULT NULL,
  `second_choice_date` varchar(250) DEFAULT NULL,
  `third_choice_school` varchar(250) DEFAULT NULL,
  `third_choice_address` varchar(250) DEFAULT NULL,
  `third_choice_program` varchar(250) DEFAULT NULL,
  `third_choice_date` varchar(250) DEFAULT NULL,
  `with_disability` text NOT NULL,
  `yes_disability` varchar(250) NOT NULL,
  `is_vaccinated` text NOT NULL,
  `first_emergency_contact_name` varchar(250) DEFAULT NULL,
  `first_emergency_contact_relationship` varchar(250) DEFAULT NULL,
  `first_emergency_contact_number` varchar(250) DEFAULT NULL,
  `second_emergency_contact_name` varchar(250) DEFAULT NULL,
  `second_emergency_contact_relationship` varchar(250) DEFAULT NULL,
  `second_emergency_contact_number` varchar(250) DEFAULT NULL,
  `application_package` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`application_id`, `user_id`, `status`, `application_q1`, `application_q2`, `application_q3`, `application_q4`, `first_choice_school`, `first_choice_address`, `first_choice_program`, `first_choice_date`, `second_choice_school`, `second_choice_address`, `second_choice_program`, `second_choice_date`, `third_choice_school`, `third_choice_address`, `third_choice_program`, `third_choice_date`, `with_disability`, `yes_disability`, `is_vaccinated`, `first_emergency_contact_name`, `first_emergency_contact_relationship`, `first_emergency_contact_number`, `second_emergency_contact_name`, `second_emergency_contact_relationship`, `second_emergency_contact_number`, `application_package`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'PENDING', 'No', 'Yes', 'Yes', 'Yes', 'asd', 'asd', 'qwe', '2022-07-29', 'zxc', 'zxc', 'zxc', '2022-07-26', '', '', '', '', 'Yes', 'Sample lang', 'Yes', 'Egie Boy Santos', 'Self', '09056708476', 'Bianca', 'GF', '09056708476', NULL, '2022-07-28 16:09:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 0, '', '', '', '', '', 'asd', 'asd', 'asd', '2022-07-29', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-28 22:33:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 0, '', '', '', '', '', 'asd', 'asd', 'asd', '2022-07-29', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-28 22:33:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `application_overseas_country`
--

CREATE TABLE `application_overseas_country` (
  `aoc_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `aoc_country` varchar(50) NOT NULL,
  `aoc_purpose_of_travel` varchar(250) NOT NULL,
  `aoc_date` varchar(50) NOT NULL,
  `aoc_reason` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_overseas_country`
--

INSERT INTO `application_overseas_country` (`aoc_id`, `application_id`, `aoc_country`, `aoc_purpose_of_travel`, `aoc_date`, `aoc_reason`) VALUES
(1, 1, 'Saudi', 'Work', 'November 2019', 'Riot');

-- --------------------------------------------------------

--
-- Table structure for table `application_packages`
--

CREATE TABLE `application_packages` (
  `ap_id` int(11) NOT NULL,
  `ap_code` varchar(50) NOT NULL,
  `ap_description` varchar(250) NOT NULL,
  `ap_price` varchar(10) NOT NULL,
  `ap_straight_payment` varchar(250) NOT NULL,
  `ap_installment` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_packages`
--

INSERT INTO `application_packages` (`ap_id`, `ap_code`, `ap_description`, `ap_price`, `ap_straight_payment`, `ap_installment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SVS', 'Student Visa Starter', '4995.00', 'Php 4,995', '	n/a', '2022-07-28 23:12:40', NULL, NULL),
(2, 'VPC', 'Visa Package Classic', '52990.00', '10% Discount', 'Up to 3 months to pay', '2022-07-28 23:12:40', NULL, NULL),
(3, 'VPP', 'Visa Package Plus', '62990.00', '10% Discount', 'Up to 5 months to pay', '2022-07-28 23:12:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `application_refused_country`
--

CREATE TABLE `application_refused_country` (
  `arc_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `arc_country` varchar(50) NOT NULL,
  `arc_purpose_of_travel` varchar(250) NOT NULL,
  `arc_date` varchar(200) NOT NULL,
  `arc_reason` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_refused_country`
--

INSERT INTO `application_refused_country` (`arc_id`, `application_id`, `arc_country`, `arc_purpose_of_travel`, `arc_date`, `arc_reason`) VALUES
(1, 1, 'Canada', 'Vacation', 'January 2022', 'Sample');

-- --------------------------------------------------------

--
-- Table structure for table `application_relatives`
--

CREATE TABLE `application_relatives` (
  `ar_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `ar_name` varchar(50) NOT NULL,
  `ar_relationship` varchar(20) NOT NULL,
  `ar_address` varchar(250) NOT NULL,
  `ar_residence` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_relatives`
--

INSERT INTO `application_relatives` (`ar_id`, `application_id`, `ar_name`, `ar_relationship`, `ar_address`, `ar_residence`) VALUES
(1, 1, 'Jayson Santos', 'Brother', 'VDF', 'Permanent');

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'test2', 2, '2022-05-27 04:43:22', 0),
(2, '::1', 'test2@test.com', 2, '2022-05-27 04:43:48', 1),
(3, '::1', 'test2@test.com', 2, '2022-05-27 04:51:17', 1),
(4, '::1', 'test2@test.com', 2, '2022-05-27 04:54:18', 1),
(5, '::1', 'test2@test.com', 2, '2022-05-28 09:57:25', 1),
(6, '::1', 'test5', NULL, '2022-05-28 10:01:53', 0),
(7, '::1', 'test5@test.com', 5, '2022-05-28 10:02:00', 1),
(8, '::1', 'test2@test.com', 2, '2022-05-28 10:46:10', 1),
(9, '::1', 'test2@test.com', 2, '2022-05-28 11:16:02', 1),
(10, '::1', 'test2@test.com', 2, '2022-05-28 12:04:59', 1),
(11, '::1', 'test2', NULL, '2022-05-28 12:06:39', 0),
(12, '::1', 'test2@test.com', 2, '2022-05-28 12:07:44', 1),
(13, '::1', 'test2', NULL, '2022-05-28 12:07:57', 0),
(14, '::1', 'test', NULL, '2022-05-28 12:09:22', 0),
(15, '::1', 'egie.admin', NULL, '2022-05-28 12:09:33', 0),
(16, '::1', 'test2@test.com', 2, '2022-05-28 12:09:42', 1),
(17, '::1', 'test2@test.com', 2, '2022-05-28 13:02:31', 1),
(18, '::1', 'test2@test.com', 2, '2022-05-30 01:49:28', 1),
(19, '::1', 'test3', 3, '2022-06-21 02:20:51', 0),
(20, '::1', 'test1', NULL, '2022-06-21 02:21:11', 0),
(21, '::1', 'test3', 3, '2022-06-21 02:45:27', 0),
(22, '::1', 'test@test.com', 1, '2022-06-21 02:45:48', 1),
(23, '::1', 'test@test.com', 1, '2022-06-22 01:08:15', 1),
(24, '::1', 'test@test.com', 1, '2022-06-22 08:54:30', 1),
(25, '::1', 'test@test.com', 1, '2022-06-22 09:53:18', 1),
(26, '::1', 'test', NULL, '2022-06-22 12:10:37', 0),
(27, '::1', 'admin', NULL, '2022-06-22 12:13:18', 0),
(28, '::1', 'asdasd', NULL, '2022-06-22 12:15:46', 0),
(29, '::1', 'asdsd', NULL, '2022-06-22 12:16:11', 0),
(30, '::1', 'asdsd', NULL, '2022-06-22 12:18:28', 0),
(31, '::1', 'asd', NULL, '2022-06-22 12:18:42', 0),
(32, '::1', 'sdsd', NULL, '2022-06-22 12:19:13', 0),
(33, '::1', 'ssd', NULL, '2022-06-22 12:19:24', 0),
(34, '::1', 'sdsd', NULL, '2022-06-22 12:20:27', 0),
(35, '::1', 'sdsd', NULL, '2022-06-22 12:20:39', 0),
(36, '::1', 'asdsd', NULL, '2022-06-22 12:20:49', 0),
(37, '::1', 'asdsd', NULL, '2022-06-22 12:21:08', 0),
(38, '::1', 'test', NULL, '2022-06-22 12:21:15', 0),
(39, '::1', 'test', NULL, '2022-06-22 12:22:09', 0),
(40, '::1', 'test@test.com', 1, '2022-06-23 00:32:47', 1),
(41, '::1', 'admin@baliwag.gov.ph', 6, '2022-06-23 01:22:40', 1),
(42, '::1', 'admin@baliwag.gov.ph', 6, '2022-06-23 01:45:35', 1),
(43, '::1', 'admin@baliwag.gov.ph', 6, '2022-06-27 01:33:51', 1),
(44, '::1', 'admin@baliwag.gov.ph', 6, '2022-06-28 22:57:23', 1),
(45, '::1', 'admin@baliwag.gov.ph', 6, '2022-06-29 04:42:04', 1),
(46, '::1', 'admin@baliwag.gov.ph', 6, '2022-06-30 04:50:41', 1),
(47, '::1', 'admin@baliwag.gov.ph', 6, '2022-06-30 11:25:31', 1),
(48, '::1', 'admin@baliwag.gov.ph', 6, '2022-07-01 01:05:23', 1),
(49, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-01 01:32:51', 1),
(50, '::1', 'admin', NULL, '2022-07-01 02:13:04', 0),
(51, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-01 02:13:41', 1),
(52, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-03 20:41:58', 1),
(53, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-03 20:56:49', 1),
(54, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-04 02:11:36', 1),
(55, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-04 02:57:20', 1),
(56, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-04 02:58:57', 1),
(57, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-05 00:27:30', 1),
(58, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-06 00:39:46', 1),
(59, '::1', 'admin.egie', NULL, '2022-07-06 00:39:58', 0),
(60, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-06 00:40:09', 1),
(61, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-07 22:43:25', 1),
(62, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-07 22:50:09', 1),
(63, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-07 22:55:19', 1),
(64, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-08 03:41:52', 1),
(65, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-08 04:23:47', 1),
(66, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-08 04:32:36', 1),
(67, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-08 04:33:51', 1),
(68, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-08 04:35:07', 1),
(69, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-08 04:36:43', 1),
(70, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-09 00:38:52', 1),
(71, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-09 00:44:01', 1),
(72, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-09 00:46:42', 1),
(73, '::1', 'egie.santos@baliwag.gov.ph', 1, '2022-07-09 00:46:59', 1),
(74, '::1', 'admin', NULL, '2022-07-09 01:39:23', 0),
(75, '::1', 'egiesantos.dev@gmail.com', 1, '2022-07-09 01:41:13', 1),
(76, '::1', 'egiesantos.dev@gmail.com', 1, '2022-07-09 02:39:51', 1),
(77, '::1', 'client@movenstudy.com', 2, '2022-07-09 02:47:22', 1),
(78, '::1', 'admin', NULL, '2022-07-10 21:46:20', 0),
(79, '::1', 'egiesantos.dev@gmail.com', 1, '2022-07-10 21:46:41', 1),
(80, '::1', 'egiesantos.dev@gmail.com', 1, '2022-07-11 00:29:45', 1),
(81, '::1', 'egiesantos.dev@gmail.com', 1, '2022-07-11 23:35:08', 1),
(82, '::1', 'egiesantos.dev@gmail.com', 1, '2022-07-12 22:21:40', 1),
(83, '::1', 'egiesantos.dev@gmail.com', 1, '2022-07-13 02:23:40', 1),
(84, '::1', 'egiesantos.dev@gmail.com', 1, '2022-07-14 03:23:28', 1),
(85, '::1', 'client', NULL, '2022-07-14 03:41:38', 0),
(86, '::1', 'client@movenstudy.com', 2, '2022-07-14 03:41:48', 1),
(87, '::1', 'client@movenstudy.com', 2, '2022-07-14 09:54:38', 1),
(88, '::1', 'admin', NULL, '2022-07-15 01:00:46', 0),
(89, '::1', 'client@movenstudy.com', 2, '2022-07-15 01:00:57', 1),
(90, '::1', 'client@movenstudy.com', 2, '2022-07-15 03:52:25', 1),
(91, '::1', 'client@movenstudy.com', 2, '2022-07-15 10:57:15', 1),
(92, '::1', 'client@movenstudy.com', 2, '2022-07-16 01:28:51', 1),
(93, '::1', 'client@movenstudy.com', 2, '2022-07-16 03:35:39', 1),
(94, '::1', 'client@movenstudy.com', 2, '2022-07-18 01:23:03', 1),
(95, '::1', 'client@movenstudy.com', 2, '2022-07-18 21:24:12', 1),
(96, '::1', 'client', NULL, '2022-07-19 00:24:07', 0),
(97, '::1', 'client@movenstudy.com', 2, '2022-07-19 00:24:14', 1),
(98, '::1', 'client@movenstudy.com', 2, '2022-07-19 22:11:32', 1),
(99, '::1', 'client@movenstudy.com', 2, '2022-07-20 01:13:54', 1),
(100, '::1', 'client@movenstudy.com', 2, '2022-07-25 01:53:25', 1),
(101, '::1', 'client@movenstudy.com', 2, '2022-07-26 00:31:42', 1),
(102, '::1', 'client@movenstudy.com', 2, '2022-07-26 23:49:10', 1),
(103, '::1', 'client@movenstudy.com', 2, '2022-07-27 23:48:49', 1),
(104, '::1', 'client@movenstudy.com', 2, '2022-07-28 08:50:00', 1),
(105, '::1', 'client@movenstudy.com', 2, '2022-08-02 01:44:28', 1),
(106, '::1', 'client@movenstudy.com', 2, '2022-08-02 01:51:57', 1),
(107, '::1', 'client@movenstudy.com', 2, '2022-08-03 20:34:40', 1),
(108, '::1', 'client@movenstudy.com', 2, '2022-08-08 00:06:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client_career`
--

CREATE TABLE `client_career` (
  `career_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recent_job_position` varchar(200) NOT NULL,
  `recent_company_name` varchar(150) NOT NULL,
  `recent_company_address` varchar(150) NOT NULL,
  `recent_job_tenure` varchar(150) NOT NULL,
  `most_job_position` varchar(200) NOT NULL,
  `most_company_name` varchar(150) NOT NULL,
  `most_company_address` varchar(150) NOT NULL,
  `most_job_tenure` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_career`
--

INSERT INTO `client_career` (`career_id`, `user_id`, `recent_job_position`, `recent_company_name`, `recent_company_address`, `recent_job_tenure`, `most_job_position`, `most_company_name`, `most_company_address`, `most_job_tenure`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'qwe', 'qwe', 'qwe', 'qwe', 'asd', 'asd', 'asd', 'asd', '2022-07-16 00:48:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_child`
--

CREATE TABLE `client_child` (
  `child_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `child_name` varchar(200) NOT NULL,
  `child_status` text NOT NULL,
  `child_birthdate` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_child`
--

INSERT INTO `client_child` (`child_id`, `user_id`, `child_name`, `child_status`, `child_birthdate`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Kidlat Santos', 'student', '2022-07-12', '2022-07-15 00:44:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'Sample Santos', 'student', '1996-01-28', '2022-07-15 01:06:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `client_education`
--

CREATE TABLE `client_education` (
  `education_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `highest_education` int(11) NOT NULL,
  `name_of_school` varchar(150) NOT NULL,
  `school_address` varchar(150) NOT NULL,
  `course` varchar(50) NOT NULL,
  `school_year` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_education`
--

INSERT INTO `client_education` (`education_id`, `user_id`, `highest_education`, `name_of_school`, `school_address`, `course`, `school_year`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 'Baliwag Polytechnic College', 'Baliwag, Bulacan', 'Bachelor of Science in information technology', '2017', '2022-07-16 00:15:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_travel`
--

CREATE TABLE `client_travel` (
  `travel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `travel_purpose` varchar(250) NOT NULL,
  `month_year` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_travel`
--

INSERT INTO `client_travel` (`travel_id`, `user_id`, `country`, `travel_purpose`, `month_year`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'PH', 'asd', 'January 2022', '2022-07-16 01:13:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` int(11) NOT NULL,
  `dept_alias` varchar(10) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_alias`, `department_name`, `created`, `created_by`, `modified`, `modified_by`, `is_deleted`) VALUES
(4, 'PIO', 'Public Information Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(5, 'MICTO', 'Municipal Information & Communication Technology Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(6, 'GSO', 'General Services Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(7, 'ACCOUNTING', 'Municipal Accounting Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(8, 'LCR', 'Local Civil Registrar Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(9, 'RHU I', 'Rural Health Unit I', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(10, 'RHU II', 'Rural Health Unit II', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(11, 'RHU III', 'Rural Health Unit III', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(12, 'RHU IV', 'Rural Health Unit IV', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(13, 'MAYORS', 'Mayors Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(14, 'S.B', 'Sangguniang Bayan', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(15, 'MLO', 'Municipal Legal Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(16, 'HRMO', 'Human Resources Management Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(17, 'POPCOM/NUT', 'Population Commission Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(18, 'CAO', 'Community Affairs Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(19, 'BUDGET', 'Municipal Budget Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(20, 'ENGINEERIN', 'Municipal Engineering Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(21, 'ASSESOR', 'Municipal Assesor Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(22, 'MPDC', 'Municipal Planning & Development Council', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(23, 'TREASURY', 'Municipal Treasurer Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(24, 'BPLO', 'Bussiness Permits & Licensing Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(25, 'MSWDO', 'Municipal Social Welfare & Development Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(26, 'MEEM', 'Municipal Economic Enterprise Management', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(27, 'MHO', 'Municipal Health Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(28, 'AGRI - MAO', 'Municipal Agriculture Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(29, 'LIBRARY', 'Municipal Library Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(30, 'TOURISM', 'Municipal Tourism Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(31, 'BTECH', 'Baliwag Polytechnic College', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(32, 'PESO', 'Public Employment Services Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(33, 'SPORTS', 'Sports Development Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(34, 'BTMO', 'Baliwag Traffic Management Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(35, 'MARKET', 'Market Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(36, 'MALASAKIT ', 'Senior Citizens/Baliwag Malasakit Center', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(37, 'SANITATION', 'Sanitation Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(38, 'OSCA', 'Office Of The Senior Citizen Affairs', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(39, 'PNP', 'Philippine National Police', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(40, 'DILG', 'Department Of Interior And Local Government', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(41, 'BFP', 'Bureau Of Fire Protection', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(42, 'BJMP', 'Baliwag Jail Management And Penology', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(43, 'COMELEC', 'Commision On Election', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(44, 'MDRRMO', 'Mun. Disaster Risk Reduction Mgt. Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(45, 'MENRO', 'Mun. Enviromental & Natural Resources Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(46, 'ANNEX1ST', 'Annex Lobby', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(47, 'CONFERENCE', 'Conference Room', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(48, 'COA', 'Commission On Audit', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(49, 'TOURISM', 'TOURISM OFFICE', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(50, 'CEMETERY', 'CEMETERY', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(51, 'IPU', 'Investment Promotion Units', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(53, 'SOME', 'Some', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(54, 'SOME2', 'Some2', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(56, 'MDRRMO', 'Mun. Disaster Risk Reduction Mgt. Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(60, 'POL', 'POL', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0),
(62, 'PDAO', 'Persons With Disability Affairs Office', '2019-11-29 13:56:56', 0, '2019-11-29 13:56:56', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `educational_attainment`
--

CREATE TABLE `educational_attainment` (
  `ea_id` int(11) NOT NULL,
  `ea_description` varchar(150) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educational_attainment`
--

INSERT INTO `educational_attainment` (`ea_id`, `ea_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Elementary Graduate', '2022-07-12 13:11:50', NULL, NULL),
(2, 'High School Graduate', '2022-07-12 13:11:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1653643689, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_description` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', '2022-07-01 00:47:02', NULL, NULL),
(2, 'Admin', '2022-07-01 00:47:02', NULL, NULL),
(3, 'Client', '2022-07-05 13:37:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'egiesantoss.dev@gmail.com', 'admin', '$2y$10$sxpcHJLv6y3HJTY6vEqZC.v71U4gU8SGFMrfbly9QUeL.pe84E2qa', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-07-09 01:39:58', '2022-07-09 01:39:58', NULL),
(2, 'client@movenstudy.com', 'client', '$2y$10$edsQS9MooSoR1Uxt7/98peSr5z4iFYhsapFjoqS/OS6eskH8rUixu', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `ui_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `street` varchar(500) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `marital_status` text NOT NULL,
  `gender` text NOT NULL,
  `passport_no` varchar(100) NOT NULL,
  `issued_date` date NOT NULL,
  `expiration_date` date NOT NULL,
  `issuing_authority` varchar(150) NOT NULL,
  `spouse_name` varchar(100) DEFAULT NULL,
  `spouse_email` varchar(50) DEFAULT NULL,
  `spouse_contact_no` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`ui_id`, `user_id`, `firstname`, `middlename`, `lastname`, `birthdate`, `role`, `street`, `province`, `city`, `contact_no`, `marital_status`, `gender`, `passport_no`, `issued_date`, `expiration_date`, `issuing_authority`, `spouse_name`, `spouse_email`, `spouse_contact_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Egie', 'Tuazon', 'Santos', '1996-01-28', 1, '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', NULL, NULL, NULL, '2022-07-09 14:41:06', NULL, NULL),
(2, 2, 'Client', 'Client', 'Client', '2022-07-15', 3, 'Bagong Nayon', 'Bulacan', 'Baliwag', '09056708476', 'Single', 'male', '123456', '2022-07-09', '2022-07-13', 'Baliwag', 'Bianca Leyva', 'bianca@movenstudy.com', '09056708476', '2022-07-09 15:47:05', NULL, NULL),
(3, 0, 'Egie Boy', 'Tuazon', 'Santos', '2022-07-13', 0, 'Bagong Nayon', 'Manila', 'Baliwag', '09056708476', 'Single', 'male', '123456', '2022-07-19', '2022-07-22', 'Baliwag', NULL, NULL, NULL, '2022-07-14 16:39:29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visa_addons`
--

CREATE TABLE `visa_addons` (
  `addon_id` int(11) NOT NULL,
  `addon_description` varchar(500) NOT NULL,
  `addon_code` varchar(10) NOT NULL,
  `addon_price` varchar(10) NOT NULL,
  `addon_remarks` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visa_addons`
--

INSERT INTO `visa_addons` (`addon_id`, `addon_description`, `addon_code`, `addon_price`, `addon_remarks`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Urgent Tourist and Business Visa', 'ADD001', '3500.00', 'Defined as an emergency and all complete documents should be submitted within 30 calendar days', '2022-08-04 14:43:23', NULL, NULL),
(2, 'Dummy Ticket/Hotel', 'ADD002', '1000.00', '', '2022-08-04 14:44:41', NULL, NULL),
(3, 'Travel Insurance Assistance', 'ADD003', '1000.00', '', '2022-08-04 14:46:09', NULL, NULL),
(4, 'Other Services (SOP, GTE)', 'ADD004', '8990.00', 'Defined as if the applicant will not avail the Visa Package', '2022-08-04 14:46:09', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visa_list`
--

CREATE TABLE `visa_list` (
  `visa_id` int(11) NOT NULL,
  `visa_code` varchar(15) NOT NULL,
  `visa_description` varchar(50) NOT NULL,
  `addons` longtext,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visa_list`
--

INSERT INTO `visa_list` (`visa_id`, `visa_code`, `visa_description`, `addons`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'TV', 'Tourist Visa', '1,2,3', '2022-08-04 10:06:56', NULL, NULL),
(2, 'BV', 'Business Visa', '1, 2, 3', '2022-08-04 10:06:56', NULL, NULL),
(3, 'SV', 'Student Visa', '4', '2022-08-04 10:07:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visa_prices`
--

CREATE TABLE `visa_prices` (
  `vp_id` int(11) NOT NULL,
  `visa_id` int(11) NOT NULL,
  `vp_code` varchar(15) NOT NULL,
  `vp_price` varchar(10) NOT NULL,
  `remarks` varchar(1500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` int(11) NOT NULL,
  `deleted_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visa_prices`
--

INSERT INTO `visa_prices` (`vp_id`, `visa_id`, `vp_code`, `vp_price`, `remarks`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'TV001', '12000.86', 'Asia and the Pacific, All electronic visa', '2022-08-04 10:24:25', 0, 0),
(2, 1, 'TV002', '16000.00', 'Canada, Australia, New Zealand, Middle East, Japan', '2022-08-04 10:25:01', 0, 0),
(3, 1, 'TV003', '18000.00', 'Europe, The Americas and Africa, Latin American countries', '2022-08-04 10:47:25', 0, 0),
(6, 2, 'BV001', '14000.00', 'Asia and the Pacific, All electronic visa', '2022-08-04 13:58:19', 0, 0),
(7, 2, 'BV002', '18000.00', 'Canada, Australia, New Zealand, Middle East,\r\nJapan', '2022-08-04 13:58:19', 0, 0),
(8, 2, 'BV003', '20000.00', 'Europe, The Americas and Africa, Latin American countries', '2022-08-04 13:58:57', 0, 0),
(9, 3, 'SV001', '4995.00', 'Student Visa Starter', '2022-08-04 14:01:59', 0, 0),
(10, 3, 'SV002', '72990.00', 'Visa Package Classic', '2022-08-04 14:01:59', 0, 0),
(11, 3, 'SV003', '92990.00', 'Visa Package Plus', '2022-08-04 14:02:23', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `application_overseas_country`
--
ALTER TABLE `application_overseas_country`
  ADD PRIMARY KEY (`aoc_id`);

--
-- Indexes for table `application_packages`
--
ALTER TABLE `application_packages`
  ADD PRIMARY KEY (`ap_id`),
  ADD UNIQUE KEY `ap_code` (`ap_code`);

--
-- Indexes for table `application_refused_country`
--
ALTER TABLE `application_refused_country`
  ADD PRIMARY KEY (`arc_id`);

--
-- Indexes for table `application_relatives`
--
ALTER TABLE `application_relatives`
  ADD PRIMARY KEY (`ar_id`);

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `client_career`
--
ALTER TABLE `client_career`
  ADD PRIMARY KEY (`career_id`);

--
-- Indexes for table `client_child`
--
ALTER TABLE `client_child`
  ADD PRIMARY KEY (`child_id`);

--
-- Indexes for table `client_education`
--
ALTER TABLE `client_education`
  ADD PRIMARY KEY (`education_id`);

--
-- Indexes for table `client_travel`
--
ALTER TABLE `client_travel`
  ADD PRIMARY KEY (`travel_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `educational_attainment`
--
ALTER TABLE `educational_attainment`
  ADD PRIMARY KEY (`ea_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`ui_id`);

--
-- Indexes for table `visa_addons`
--
ALTER TABLE `visa_addons`
  ADD PRIMARY KEY (`addon_id`),
  ADD UNIQUE KEY `addon_id` (`addon_id`,`addon_code`);

--
-- Indexes for table `visa_list`
--
ALTER TABLE `visa_list`
  ADD PRIMARY KEY (`visa_id`),
  ADD UNIQUE KEY `visa_code` (`visa_code`);

--
-- Indexes for table `visa_prices`
--
ALTER TABLE `visa_prices`
  ADD PRIMARY KEY (`vp_id`),
  ADD UNIQUE KEY `vp_code` (`vp_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `application_overseas_country`
--
ALTER TABLE `application_overseas_country`
  MODIFY `aoc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application_packages`
--
ALTER TABLE `application_packages`
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `application_refused_country`
--
ALTER TABLE `application_refused_country`
  MODIFY `arc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application_relatives`
--
ALTER TABLE `application_relatives`
  MODIFY `ar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_career`
--
ALTER TABLE `client_career`
  MODIFY `career_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_child`
--
ALTER TABLE `client_child`
  MODIFY `child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client_education`
--
ALTER TABLE `client_education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_travel`
--
ALTER TABLE `client_travel`
  MODIFY `travel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `educational_attainment`
--
ALTER TABLE `educational_attainment`
  MODIFY `ea_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `ui_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visa_addons`
--
ALTER TABLE `visa_addons`
  MODIFY `addon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visa_list`
--
ALTER TABLE `visa_list`
  MODIFY `visa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visa_prices`
--
ALTER TABLE `visa_prices`
  MODIFY `vp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
