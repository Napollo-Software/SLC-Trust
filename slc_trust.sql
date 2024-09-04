-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 04, 2024 at 03:50 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slc_trust`
--

-- --------------------------------------------------------

--
-- Table structure for table `archives`
--

CREATE TABLE `archives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matter` text DEFAULT NULL,
  `payee` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `account` text DEFAULT NULL,
  `split_account` text DEFAULT NULL,
  `deposit` float DEFAULT NULL,
  `payment` float DEFAULT NULL,
  `balance` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_staus` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_staus`, `created_at`, `updated_at`) VALUES
(20, 'Internet', 'Published', '2022-10-04 00:03:33', '2022-10-04 00:03:33'),
(21, 'Phone', 'Published', '2022-10-04 00:03:43', '2022-10-04 00:03:43'),
(22, 'Electricity', 'Published', '2022-10-04 00:03:53', '2022-10-04 00:03:53'),
(23, 'Utilities', 'Published', '2022-10-04 00:04:00', '2022-10-04 00:04:00'),
(24, 'Food', 'Published', '2022-10-04 00:04:13', '2022-10-04 00:04:13'),
(25, 'Other', 'Published', '2022-10-04 00:04:18', '2022-10-04 00:04:18'),
(29, 'Universal 13', 'Published', '2023-02-21 19:50:09', '2023-05-19 14:26:19'),
(30, 'Assisted Living', 'Published', '2023-02-21 20:03:11', '2023-02-21 20:03:21'),
(31, 'Rent', 'Published', '2023-02-21 20:09:28', '2023-02-21 20:09:28'),
(32, 'Insurance', 'Published', '2023-02-22 19:01:57', '2023-02-22 19:01:57'),
(33, 'Mortgage', 'Published', '2023-02-22 19:02:04', '2023-02-22 19:02:04'),
(34, 'Reimbursement', 'Published', '2023-02-22 19:34:40', '2023-02-22 19:34:40'),
(35, 'Auto', 'Published', '2023-02-23 17:42:28', '2023-02-23 17:42:28'),
(36, 'Medical', 'Published', '2023-02-23 17:51:03', '2023-02-23 17:51:03'),
(37, 'Flexcard', 'Published', '2023-06-06 13:45:32', '2024-04-01 15:29:11'),
(38, 'Melody', 'Published', '2023-11-29 10:17:10', '2023-11-29 10:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `check_lists`
--

CREATE TABLE `check_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `referral_id` int(11) NOT NULL,
  `doh` varchar(255) DEFAULT NULL,
  `hipaa_state` varchar(255) DEFAULT NULL,
  `disability` varchar(255) DEFAULT NULL,
  `hipaa` varchar(255) DEFAULT NULL,
  `joinder` varchar(255) DEFAULT NULL,
  `map` varchar(255) DEFAULT NULL,
  `home` varchar(255) DEFAULT NULL,
  `mltc` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `tform` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city_name` varchar(225) NOT NULL,
  `state` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `state`) VALUES
(1, 'New York', 'New York'),
(2, 'Los Angeles', 'California'),
(3, 'Chicago', 'Illinois'),
(4, 'Houston', 'Texas'),
(5, 'Philadelphia', 'Pennsylvania'),
(6, 'Phoenix', 'Arizona'),
(7, 'San Antonio', 'Texas'),
(8, 'San Diego', 'California'),
(9, 'Dallas', 'Texas'),
(10, 'San Jose', 'California'),
(11, 'Austin', 'Texas'),
(12, 'Jacksonville', 'Florida'),
(13, 'Indianapolis', 'Indiana'),
(14, 'San Francisco', 'California'),
(15, 'Columbus', 'Ohio'),
(16, 'Fort Worth', 'Texas'),
(17, 'Charlotte', 'North Carolina'),
(18, 'Detroit', 'Michigan'),
(19, 'El Paso', 'Texas'),
(20, 'Memphis', 'Tennessee'),
(21, 'Boston', 'Massachusetts'),
(22, 'Seattle', 'Washington'),
(23, 'Denver', 'Colorado'),
(24, 'Washington', 'District of Columbia'),
(25, 'Nashville', 'Tennessee'),
(26, 'Baltimore', 'Maryland'),
(27, 'Louisville', 'Kentucky'),
(28, 'Portland', 'Oregon'),
(29, 'Oklahoma City', 'Oklahoma'),
(30, 'Milwaukee', 'Wisconsin'),
(31, 'Las Vegas', 'Nevada'),
(32, 'Albuquerque', 'New Mexico'),
(33, 'Tucson', 'Arizona'),
(34, 'Fresno', 'California'),
(35, 'Sacramento', 'California'),
(36, 'Long Beach', 'California'),
(37, 'Kansas City', 'Missouri'),
(38, 'Mesa', 'Arizona'),
(39, 'Virginia Beach', 'Virginia'),
(40, 'Atlanta', 'Georgia'),
(41, 'Colorado Springs', 'Colorado'),
(42, 'Raleigh', 'North Carolina'),
(43, 'Omaha', 'Nebraska'),
(44, 'Miami', 'Florida'),
(45, 'Oakland', 'California'),
(46, 'Tulsa', 'Oklahoma'),
(47, 'Minneapolis', 'Minnesota'),
(48, 'Cleveland', 'Ohio'),
(49, 'Wichita', 'Kansas'),
(50, 'Arlington', 'Texas'),
(51, 'New Orleans', 'Louisiana'),
(52, 'Bakersfield', 'California'),
(53, 'Tampa', 'Florida'),
(54, 'Honolulu', 'Hawai\'i'),
(55, 'Anaheim', 'California'),
(56, 'Aurora', 'Colorado'),
(57, 'Santa Ana', 'California'),
(58, 'St. Louis', 'Missouri'),
(59, 'Riverside', 'California'),
(60, 'Corpus Christi', 'Texas'),
(61, 'Pittsburgh', 'Pennsylvania'),
(62, 'Lexington', 'Kentucky'),
(63, 'Anchorage', 'Alaska'),
(64, 'Stockton', 'California'),
(65, 'Cincinnati', 'Ohio'),
(66, 'Saint Paul', 'Minnesota'),
(67, 'Toledo', 'Ohio'),
(68, 'Newark', 'New Jersey'),
(69, 'Greensboro', 'North Carolina'),
(70, 'Plano', 'Texas'),
(71, 'Henderson', 'Nevada'),
(72, 'Lincoln', 'Nebraska'),
(73, 'Buffalo', 'New York'),
(74, 'Fort Wayne', 'Indiana'),
(75, 'Jersey City', 'New Jersey'),
(76, 'Chula Vista', 'California'),
(77, 'Orlando', 'Florida'),
(78, 'St. Petersburg', 'Florida'),
(79, 'Norfolk', 'Virginia'),
(80, 'Chandler', 'Arizona'),
(81, 'Laredo', 'Texas'),
(82, 'Madison', 'Wisconsin'),
(83, 'Durham', 'North Carolina'),
(84, 'Lubbock', 'Texas'),
(85, 'Winston-Salem', 'North Carolina'),
(86, 'Garland', 'Texas'),
(87, 'Glendale', 'Arizona'),
(88, 'Hialeah', 'Florida'),
(89, 'Reno', 'Nevada'),
(90, 'Baton Rouge', 'Louisiana'),
(91, 'Irvine', 'California'),
(92, 'Chesapeake', 'Virginia'),
(93, 'Irving', 'Texas'),
(94, 'Scottsdale', 'Arizona'),
(95, 'North Las Vegas', 'Nevada'),
(96, 'Fremont', 'California'),
(97, 'Gilbert', 'Arizona'),
(98, 'San Bernardino', 'California'),
(99, 'Boise', 'Idaho'),
(100, 'Birmingham', 'Alabama'),
(101, 'Rochester', 'New York'),
(102, 'Richmond', 'Virginia'),
(103, 'Spokane', 'Washington'),
(104, 'Des Moines', 'Iowa'),
(105, 'Montgomery', 'Alabama'),
(106, 'Modesto', 'California'),
(107, 'Fayetteville', 'North Carolina'),
(108, 'Tacoma', 'Washington'),
(109, 'Shreveport', 'Louisiana'),
(110, 'Fontana', 'California'),
(111, 'Oxnard', 'California'),
(112, 'Aurora', 'Illinois'),
(113, 'Moreno Valley', 'California'),
(114, 'Akron', 'Ohio'),
(115, 'Yonkers', 'New York'),
(116, 'Columbus', 'Georgia'),
(117, 'Augusta', 'Georgia'),
(118, 'Little Rock', 'Arkansas'),
(119, 'Amarillo', 'Texas'),
(120, 'Mobile', 'Alabama'),
(121, 'Huntington Beach', 'California'),
(122, 'Glendale', 'California'),
(123, 'Grand Rapids', 'Michigan'),
(124, 'Salt Lake City', 'Utah'),
(125, 'Tallahassee', 'Florida'),
(126, 'Huntsville', 'Alabama'),
(127, 'Worcester', 'Massachusetts'),
(128, 'Knoxville', 'Tennessee'),
(129, 'Grand Prairie', 'Texas'),
(130, 'Newport News', 'Virginia'),
(131, 'Brownsville', 'Texas'),
(132, 'Santa Clarita', 'California'),
(133, 'Overland Park', 'Kansas'),
(134, 'Providence', 'Rhode Island'),
(135, 'Jackson', 'Mississippi'),
(136, 'Garden Grove', 'California'),
(137, 'Oceanside', 'California'),
(138, 'Chattanooga', 'Tennessee'),
(139, 'Fort Lauderdale', 'Florida'),
(140, 'Rancho Cucamonga', 'California'),
(141, 'Santa Rosa', 'California'),
(142, 'Port St. Lucie', 'Florida'),
(143, 'Ontario', 'California'),
(144, 'Tempe', 'Arizona'),
(145, 'Vancouver', 'Washington'),
(146, 'Springfield', 'Missouri'),
(147, 'Cape Coral', 'Florida'),
(148, 'Pembroke Pines', 'Florida'),
(149, 'Sioux Falls', 'South Dakota'),
(150, 'Peoria', 'Arizona'),
(151, 'Lancaster', 'California'),
(152, 'Elk Grove', 'California'),
(153, 'Corona', 'California'),
(154, 'Eugene', 'Oregon'),
(155, 'Salem', 'Oregon'),
(156, 'Palmdale', 'California'),
(157, 'Salinas', 'California'),
(158, 'Springfield', 'Massachusetts'),
(159, 'Pasadena', 'Texas'),
(160, 'Rockford', 'Illinois'),
(161, 'Pomona', 'California'),
(162, 'Hayward', 'California'),
(163, 'Fort Collins', 'Colorado'),
(164, 'Joliet', 'Illinois'),
(165, 'Escondido', 'California'),
(166, 'Kansas City', 'Kansas'),
(167, 'Torrance', 'California'),
(168, 'Bridgeport', 'Connecticut'),
(169, 'Alexandria', 'Virginia'),
(170, 'Sunnyvale', 'California'),
(171, 'Cary', 'North Carolina'),
(172, 'Lakewood', 'Colorado'),
(173, 'Hollywood', 'Florida'),
(174, 'Paterson', 'New Jersey'),
(175, 'Syracuse', 'New York'),
(176, 'Naperville', 'Illinois'),
(177, 'McKinney', 'Texas'),
(178, 'Mesquite', 'Texas'),
(179, 'Clarksville', 'Tennessee'),
(180, 'Savannah', 'Georgia'),
(181, 'Dayton', 'Ohio'),
(182, 'Orange', 'California'),
(183, 'Fullerton', 'California'),
(184, 'Pasadena', 'California'),
(185, 'Hampton', 'Virginia'),
(186, 'McAllen', 'Texas'),
(187, 'Killeen', 'Texas'),
(188, 'Warren', 'Michigan'),
(189, 'West Valley City', 'Utah'),
(190, 'Columbia', 'South Carolina'),
(191, 'New Haven', 'Connecticut'),
(192, 'Sterling Heights', 'Michigan'),
(193, 'Olathe', 'Kansas'),
(194, 'Miramar', 'Florida'),
(195, 'Thousand Oaks', 'California'),
(196, 'Frisco', 'Texas'),
(197, 'Cedar Rapids', 'Iowa'),
(198, 'Topeka', 'Kansas'),
(199, 'Visalia', 'California'),
(200, 'Waco', 'Texas'),
(201, 'Elizabeth', 'New Jersey'),
(202, 'Bellevue', 'Washington'),
(203, 'Gainesville', 'Florida'),
(204, 'Simi Valley', 'California'),
(205, 'Charleston', 'South Carolina'),
(206, 'Carrollton', 'Texas'),
(207, 'Coral Springs', 'Florida'),
(208, 'Stamford', 'Connecticut'),
(209, 'Hartford', 'Connecticut'),
(210, 'Concord', 'California'),
(211, 'Roseville', 'California'),
(212, 'Thornton', 'Colorado'),
(213, 'Kent', 'Washington'),
(214, 'Lafayette', 'Louisiana'),
(215, 'Surprise', 'Arizona'),
(216, 'Denton', 'Texas'),
(217, 'Victorville', 'California'),
(218, 'Evansville', 'Indiana'),
(219, 'Midland', 'Texas'),
(220, 'Santa Clara', 'California'),
(221, 'Athens', 'Georgia'),
(222, 'Allentown', 'Pennsylvania'),
(223, 'Abilene', 'Texas'),
(224, 'Beaumont', 'Texas'),
(225, 'Vallejo', 'California'),
(226, 'Independence', 'Missouri'),
(227, 'Springfield', 'Illinois'),
(228, 'Ann Arbor', 'Michigan'),
(229, 'Provo', 'Utah'),
(230, 'Peoria', 'Illinois'),
(231, 'Norman', 'Oklahoma'),
(232, 'Berkeley', 'California'),
(233, 'El Monte', 'California'),
(234, 'Murfreesboro', 'Tennessee'),
(235, 'Lansing', 'Michigan'),
(236, 'Columbia', 'Missouri'),
(237, 'Downey', 'California'),
(238, 'Costa Mesa', 'California'),
(239, 'Inglewood', 'California'),
(240, 'Miami Gardens', 'Florida'),
(241, 'Manchester', 'New Hampshire'),
(242, 'Elgin', 'Illinois'),
(243, 'Wilmington', 'North Carolina'),
(244, 'Waterbury', 'Connecticut'),
(245, 'Fargo', 'North Dakota'),
(246, 'Arvada', 'Colorado'),
(247, 'Carlsbad', 'California'),
(248, 'Westminster', 'Colorado'),
(249, 'Rochester', 'Minnesota'),
(250, 'Gresham', 'Oregon'),
(251, 'Clearwater', 'Florida'),
(252, 'Lowell', 'Massachusetts'),
(253, 'West Jordan', 'Utah'),
(254, 'Pueblo', 'Colorado'),
(255, 'San Buenaventura (Ventura)', 'California'),
(256, 'Fairfield', 'California'),
(257, 'West Covina', 'California'),
(258, 'Billings', 'Montana'),
(259, 'Murrieta', 'California'),
(260, 'High Point', 'North Carolina'),
(261, 'Round Rock', 'Texas'),
(262, 'Richmond', 'California'),
(263, 'Cambridge', 'Massachusetts'),
(264, 'Norwalk', 'California'),
(265, 'Odessa', 'Texas'),
(266, 'Antioch', 'California'),
(267, 'Temecula', 'California'),
(268, 'Green Bay', 'Wisconsin'),
(269, 'Everett', 'Washington'),
(270, 'Wichita Falls', 'Texas'),
(271, 'Burbank', 'California'),
(272, 'Palm Bay', 'Florida'),
(273, 'Centennial', 'Colorado'),
(274, 'Daly City', 'California'),
(275, 'Richardson', 'Texas'),
(276, 'Pompano Beach', 'Florida'),
(277, 'Broken Arrow', 'Oklahoma'),
(278, 'North Charleston', 'South Carolina'),
(279, 'West Palm Beach', 'Florida'),
(280, 'Boulder', 'Colorado'),
(281, 'Rialto', 'California'),
(282, 'Santa Maria', 'California'),
(283, 'El Cajon', 'California'),
(284, 'Davenport', 'Iowa'),
(285, 'Erie', 'Pennsylvania'),
(287, 'South Bend', 'Indiana'),
(288, 'Flint', 'Michigan'),
(289, 'Kenosha', 'Wisconsin');

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `claim_title` varchar(255) DEFAULT NULL,
  `expense_date` timestamp NULL DEFAULT NULL,
  `claim_description` varchar(255) DEFAULT NULL,
  `claim_category` varchar(255) NOT NULL,
  `claim_amount` float NOT NULL,
  `partial_amount` varchar(255) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `claim_bill_attachment` varchar(255) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `claim_status` varchar(255) NOT NULL,
  `claim_user` text DEFAULT NULL,
  `refusal_reason` varchar(255) DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `recurring_day` int(11) DEFAULT NULL,
  `payee_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `archived` int(1) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `recurring_bill` varchar(255) DEFAULT NULL,
  `recurred` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `claims_status`
--

CREATE TABLE `claims_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `closing_balances`
--

CREATE TABLE `closing_balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month_year` varchar(255) NOT NULL,
  `closing_balance` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `name_of_practice` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `ext_number` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `designation` varchar(255) NOT NULL,
  `vendor_id` varchar(255) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `referral_id` int(11) NOT NULL,
  `approved_by` varchar(255) DEFAULT NULL,
  `actual_url` varchar(255) NOT NULL,
  `uploaded_url` varchar(255) DEFAULT NULL,
  `actual_document` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name`, `slug`, `status`, `referral_id`, `approved_by`, `actual_url`, `uploaded_url`, `actual_document`, `created_at`, `updated_at`) VALUES
(1, '1-Joinder Agreement.pdf', '1-JoinderAgreement.pdf', 'pending', 6, NULL, '/documents/1-Joinder Agreement.pdf', NULL, '1', '2024-07-31 15:02:12', '2024-07-31 15:02:12'),
(2, '2-DOH-960 Hipaa.pdf', '2-DOH-960Hipaa.pdf', 'pending', 6, NULL, '/documents/2-DOH-960 Hipaa.pdf', NULL, '1', '2024-07-31 15:02:12', '2024-07-31 15:02:12'),
(3, '3-MAP-751e - Authorization to Release Medical Information.pdf', '3-MAP-751e-AuthorizationtoReleaseMedicalInformation.pdf', 'pending', 6, NULL, '/documents/3-MAP-751e - Authorization to Release Medical Information.pdf', NULL, '1', '2024-07-31 15:02:12', '2024-07-31 15:02:12'),
(4, '4-DOH 5173-Hipaa State.pdf', '4-DOH5173-HipaaState.pdf', 'pending', 6, NULL, '/documents/4-DOH 5173-Hipaa State.pdf', NULL, '1', '2024-07-31 15:02:12', '2024-07-31 15:02:12'),
(5, '5- DOH -5139 Disability FILLABLE Questionnaire.pdf', '5-DOH-5139DisabilityFILLABLEQuestionnaire.pdf', 'pending', 6, NULL, '/documents/5- DOH -5139 Disability FILLABLE Questionnaire.pdf', NULL, '1', '2024-07-31 15:02:12', '2024-07-31 15:02:12'),
(6, '6-DOH-5143.pdf', '6-DOH-5143.pdf', 'pending', 6, NULL, '/documents/6-DOH-5143.pdf', NULL, '1', '2024-07-31 15:02:12', '2024-07-31 15:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `document_e_signs`
--

CREATE TABLE `document_e_signs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `approved` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drop_boxes`
--

CREATE TABLE `drop_boxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contacts`
--

CREATE TABLE `emergency_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `referral_id` int(11) NOT NULL,
  `emergency_first_name` varchar(255) NOT NULL,
  `emergency_last_name` varchar(255) NOT NULL,
  `emergency_relationship` varchar(255) NOT NULL,
  `emergency_phone_number` varchar(255) NOT NULL,
  `emergency_ext_number` int(11) NOT NULL,
  `emergency_email` varchar(255) NOT NULL,
  `email_status` varchar(255) DEFAULT NULL,
  `emergency_city` varchar(255) NOT NULL,
  `emergency_state` varchar(255) NOT NULL,
  `emergency_address` varchar(255) NOT NULL,
  `emergency_zip_code` int(11) NOT NULL,
  `emegergency_apt_suite` varchar(255) DEFAULT NULL,
  `have_keys` tinyint(1) NOT NULL,
  `live_with_parents` tinyint(1) NOT NULL,
  `emergency_apt_suite` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `followups`
--

CREATE TABLE `followups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(255) NOT NULL,
  `leadId` varchar(255) DEFAULT NULL,
  `to` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"4d227843-a770-4c72-b9ca-a53742ba640b\",\"displayName\":\"App\\\\Jobs\\\\sendEmailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\sendEmailJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\sendEmailJob\\\":15:{s:7:\\\"subject\\\";s:14:\\\"Bill Submitted\\\";s:4:\\\"name\\\";s:10:\\\"Usama Fiaz\\\";s:13:\\\"email_message\\\";s:103:\\\"Your bill#2 has been added on 09-04-2024. Please use the button below to find the details of your bill:\\\";s:4:\\\"urls\\\";s:9:\\\"\\/claims\\/2\\\";s:12:\\\"\\u0000*\\u0000send_mail\\\";s:22:\\\"usama.fiaz@napollo.net\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1725456129, 1725456129),
(2, 'default', '{\"uuid\":\"2079a62b-7051-4596-a406-1878fb8259f1\",\"displayName\":\"App\\\\Jobs\\\\sendEmailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\sendEmailJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\sendEmailJob\\\":15:{s:7:\\\"subject\\\";s:14:\\\"Bill Submitted\\\";s:4:\\\"name\\\";s:9:\\\"SLC Trust\\\";s:13:\\\"email_message\\\";s:132:\\\"Usama Fiaz has submitted bill#2 on 09-04-2024 and waiting for approval. Please use the button below to find the details of the bill:\\\";s:4:\\\"urls\\\";s:9:\\\"\\/claims\\/2\\\";s:12:\\\"\\u0000*\\u0000send_mail\\\";s:19:\\\"admin@newsystem.com\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1725456129, 1725456129),
(3, 'default', '{\"uuid\":\"52db3afb-c5c0-4e0f-9c16-18eab49e1e67\",\"displayName\":\"App\\\\Jobs\\\\sendEmailJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\sendEmailJob\",\"command\":\"O:21:\\\"App\\\\Jobs\\\\sendEmailJob\\\":15:{s:7:\\\"subject\\\";s:9:\\\"New user!\\\";s:4:\\\"name\\\";s:9:\\\"SLC Trust\\\";s:13:\\\"email_message\\\";s:126:\\\"ludehory Zimmerman has registered with Intrustpit and waiting for approval. Please preview the profile in order to approve it:\\\";s:4:\\\"urls\\\";s:15:\\\"\\/show_user\\/1533\\\";s:12:\\\"\\u0000*\\u0000send_mail\\\";s:19:\\\"admin@newsystem.com\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1725456191, 1725456191);

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_first_name` varchar(255) NOT NULL,
  `contact_last_name` varchar(255) NOT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `relation_to_patient` varchar(255) DEFAULT NULL,
  `patient_first_name` varchar(255) DEFAULT NULL,
  `patient_last_name` varchar(255) DEFAULT NULL,
  `patient_phone` varchar(255) DEFAULT NULL,
  `patient_email` varchar(255) DEFAULT NULL,
  `interested_in` varchar(255) DEFAULT NULL,
  `sub_status` varchar(255) DEFAULT NULL,
  `vendor_id` varchar(255) NOT NULL,
  `case_type` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `case_type_id` int(11) DEFAULT NULL,
  `source_type` varchar(255) DEFAULT NULL,
  `source_id` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `language` text DEFAULT NULL,
  `converted_to_referral` varchar(255) DEFAULT NULL,
  `follow_up_date` date DEFAULT NULL,
  `follow_up_time` time DEFAULT NULL,
  `follow_up_note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` text NOT NULL,
  `from` text NOT NULL,
  `to` text DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicaids`
--

CREATE TABLE `medicaids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicaid_number` varchar(255) NOT NULL,
  `referral_name` varchar(255) DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `active_medicaid` varchar(255) NOT NULL,
  `medicaid_plan` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_06_06_085046_create_users_table', 1),
(5, '2022_06_16_172555_create_transactions_table', 2),
(6, '2022_06_16_182235_create_employees_table', 3),
(8, '2022_06_20_125146_create_categories_table', 5),
(11, '2022_06_17_110943_create_claims_table', 6),
(13, '2022_09_08_115933_add_token_to_users_table', 7),
(14, '2022_09_09_132228_add_columns_to_users_table', 8),
(16, '2022_09_09_195557_create_notifcations_table', 9),
(17, '2022_09_12_110521_add_columns_to_claims_table', 10),
(18, '2022_09_15_191031_create_transactions_table', 11),
(19, '2022_11_09_121142_create_jobs_table', 12),
(20, '2023_02_06_121619_create_archives_table', 13),
(21, '2023_02_06_122530_create_logs_table', 14),
(22, '2023_02_14_183849_create_drop_boxes_table', 15),
(23, '2023_05_31_140350_create_permission_tables', 16),
(24, '2023_06_07_145015_create_contacts_table', 16),
(25, '2023_06_07_180317_create_types_table', 16),
(26, '2023_06_09_175348_create_leads_table', 17),
(27, '2023_06_13_133205_create_followups_table', 18),
(28, '2023_06_19_111823_create_referrals_table', 18),
(29, '2023_06_19_112254_create_emergency_contacts_table', 18),
(30, '2023_06_22_120701_create_physicians_table', 18),
(31, '2023_06_22_121959_create_medicaids_table', 18),
(32, '2023_06_23_173408_create_document_e_signs_table', 18),
(33, '2023_08_16_123919_checklist', 18),
(34, '2023_08_21_080141_create_tasks_table', 18),
(35, '2023_09_06_125902_create_closing_balances_table', 18),
(36, '2023_09_21_095113_create_documents_table', 18),
(37, '2023_10_02_150013_create_reports_table', 18),
(38, '2023_10_26_094524_create_release_notes_table', 18),
(39, '2023_11_17_074150_create_sms_chats_table', 18),
(40, '2024_08_27_151653_create_sessions_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 7),
(1, 'App\\Models\\User', 526),
(1, 'App\\Models\\User', 527),
(1, 'App\\Models\\User', 528),
(1, 'App\\Models\\User', 529),
(1, 'App\\Models\\User', 691),
(1, 'App\\Models\\User', 807),
(1, 'App\\Models\\User', 832),
(2, 'App\\Models\\User', 698),
(2, 'App\\Models\\User', 789),
(2, 'App\\Models\\User', 988),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 12),
(3, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 15),
(3, 'App\\Models\\User', 16),
(3, 'App\\Models\\User', 17),
(3, 'App\\Models\\User', 18),
(3, 'App\\Models\\User', 19),
(3, 'App\\Models\\User', 20),
(3, 'App\\Models\\User', 21),
(3, 'App\\Models\\User', 22),
(3, 'App\\Models\\User', 23),
(3, 'App\\Models\\User', 24),
(3, 'App\\Models\\User', 25),
(3, 'App\\Models\\User', 26),
(3, 'App\\Models\\User', 27),
(3, 'App\\Models\\User', 28),
(3, 'App\\Models\\User', 29),
(3, 'App\\Models\\User', 30),
(3, 'App\\Models\\User', 31),
(3, 'App\\Models\\User', 32),
(3, 'App\\Models\\User', 33),
(3, 'App\\Models\\User', 34),
(3, 'App\\Models\\User', 35),
(3, 'App\\Models\\User', 36),
(3, 'App\\Models\\User', 37),
(3, 'App\\Models\\User', 38),
(3, 'App\\Models\\User', 39),
(3, 'App\\Models\\User', 40),
(3, 'App\\Models\\User', 41),
(3, 'App\\Models\\User', 42),
(3, 'App\\Models\\User', 43),
(3, 'App\\Models\\User', 44),
(3, 'App\\Models\\User', 45),
(3, 'App\\Models\\User', 46),
(3, 'App\\Models\\User', 47),
(3, 'App\\Models\\User', 48),
(3, 'App\\Models\\User', 49),
(3, 'App\\Models\\User', 50),
(3, 'App\\Models\\User', 51),
(3, 'App\\Models\\User', 52),
(3, 'App\\Models\\User', 53),
(3, 'App\\Models\\User', 54),
(3, 'App\\Models\\User', 55),
(3, 'App\\Models\\User', 56),
(3, 'App\\Models\\User', 57),
(3, 'App\\Models\\User', 58),
(3, 'App\\Models\\User', 59),
(3, 'App\\Models\\User', 60),
(3, 'App\\Models\\User', 61),
(3, 'App\\Models\\User', 62),
(3, 'App\\Models\\User', 63),
(3, 'App\\Models\\User', 64),
(3, 'App\\Models\\User', 65),
(3, 'App\\Models\\User', 66),
(3, 'App\\Models\\User', 67),
(3, 'App\\Models\\User', 68),
(3, 'App\\Models\\User', 69),
(3, 'App\\Models\\User', 70),
(3, 'App\\Models\\User', 71),
(3, 'App\\Models\\User', 72),
(3, 'App\\Models\\User', 73),
(3, 'App\\Models\\User', 74),
(3, 'App\\Models\\User', 75),
(3, 'App\\Models\\User', 76),
(3, 'App\\Models\\User', 77),
(3, 'App\\Models\\User', 78),
(3, 'App\\Models\\User', 79),
(3, 'App\\Models\\User', 80),
(3, 'App\\Models\\User', 81),
(3, 'App\\Models\\User', 82),
(3, 'App\\Models\\User', 83),
(3, 'App\\Models\\User', 84),
(3, 'App\\Models\\User', 85),
(3, 'App\\Models\\User', 86),
(3, 'App\\Models\\User', 87),
(3, 'App\\Models\\User', 88),
(3, 'App\\Models\\User', 89),
(3, 'App\\Models\\User', 90),
(3, 'App\\Models\\User', 91),
(3, 'App\\Models\\User', 92),
(3, 'App\\Models\\User', 93),
(3, 'App\\Models\\User', 94),
(3, 'App\\Models\\User', 95),
(3, 'App\\Models\\User', 96),
(3, 'App\\Models\\User', 97),
(3, 'App\\Models\\User', 98),
(3, 'App\\Models\\User', 99),
(3, 'App\\Models\\User', 100),
(3, 'App\\Models\\User', 101),
(3, 'App\\Models\\User', 102),
(3, 'App\\Models\\User', 103),
(3, 'App\\Models\\User', 104),
(3, 'App\\Models\\User', 105),
(3, 'App\\Models\\User', 106),
(3, 'App\\Models\\User', 107),
(3, 'App\\Models\\User', 108),
(3, 'App\\Models\\User', 109),
(3, 'App\\Models\\User', 110),
(3, 'App\\Models\\User', 111),
(3, 'App\\Models\\User', 112),
(3, 'App\\Models\\User', 113),
(3, 'App\\Models\\User', 114),
(3, 'App\\Models\\User', 115),
(3, 'App\\Models\\User', 116),
(3, 'App\\Models\\User', 117),
(3, 'App\\Models\\User', 118),
(3, 'App\\Models\\User', 119),
(3, 'App\\Models\\User', 120),
(3, 'App\\Models\\User', 121),
(3, 'App\\Models\\User', 122),
(3, 'App\\Models\\User', 123),
(3, 'App\\Models\\User', 124),
(3, 'App\\Models\\User', 125),
(3, 'App\\Models\\User', 126),
(3, 'App\\Models\\User', 127),
(3, 'App\\Models\\User', 128),
(3, 'App\\Models\\User', 129),
(3, 'App\\Models\\User', 130),
(3, 'App\\Models\\User', 131),
(3, 'App\\Models\\User', 132),
(3, 'App\\Models\\User', 133),
(3, 'App\\Models\\User', 134),
(3, 'App\\Models\\User', 135),
(3, 'App\\Models\\User', 136),
(3, 'App\\Models\\User', 137),
(3, 'App\\Models\\User', 138),
(3, 'App\\Models\\User', 139),
(3, 'App\\Models\\User', 140),
(3, 'App\\Models\\User', 141),
(3, 'App\\Models\\User', 142),
(3, 'App\\Models\\User', 143),
(3, 'App\\Models\\User', 144),
(3, 'App\\Models\\User', 145),
(3, 'App\\Models\\User', 146),
(3, 'App\\Models\\User', 147),
(3, 'App\\Models\\User', 148),
(3, 'App\\Models\\User', 149),
(3, 'App\\Models\\User', 150),
(3, 'App\\Models\\User', 151),
(3, 'App\\Models\\User', 152),
(3, 'App\\Models\\User', 153),
(3, 'App\\Models\\User', 154),
(3, 'App\\Models\\User', 155),
(3, 'App\\Models\\User', 156),
(3, 'App\\Models\\User', 157),
(3, 'App\\Models\\User', 158),
(3, 'App\\Models\\User', 159),
(3, 'App\\Models\\User', 160),
(3, 'App\\Models\\User', 161),
(3, 'App\\Models\\User', 162),
(3, 'App\\Models\\User', 163),
(3, 'App\\Models\\User', 164),
(3, 'App\\Models\\User', 165),
(3, 'App\\Models\\User', 166),
(3, 'App\\Models\\User', 167),
(3, 'App\\Models\\User', 168),
(3, 'App\\Models\\User', 169),
(3, 'App\\Models\\User', 170),
(3, 'App\\Models\\User', 171),
(3, 'App\\Models\\User', 172),
(3, 'App\\Models\\User', 173),
(3, 'App\\Models\\User', 174),
(3, 'App\\Models\\User', 175),
(3, 'App\\Models\\User', 176),
(3, 'App\\Models\\User', 177),
(3, 'App\\Models\\User', 178),
(3, 'App\\Models\\User', 179),
(3, 'App\\Models\\User', 180),
(3, 'App\\Models\\User', 181),
(3, 'App\\Models\\User', 182),
(3, 'App\\Models\\User', 183),
(3, 'App\\Models\\User', 184),
(3, 'App\\Models\\User', 185),
(3, 'App\\Models\\User', 186),
(3, 'App\\Models\\User', 187),
(3, 'App\\Models\\User', 188),
(3, 'App\\Models\\User', 189),
(3, 'App\\Models\\User', 190),
(3, 'App\\Models\\User', 191),
(3, 'App\\Models\\User', 192),
(3, 'App\\Models\\User', 193),
(3, 'App\\Models\\User', 194),
(3, 'App\\Models\\User', 195),
(3, 'App\\Models\\User', 196),
(3, 'App\\Models\\User', 197),
(3, 'App\\Models\\User', 198),
(3, 'App\\Models\\User', 199),
(3, 'App\\Models\\User', 200),
(3, 'App\\Models\\User', 201),
(3, 'App\\Models\\User', 202),
(3, 'App\\Models\\User', 203),
(3, 'App\\Models\\User', 204),
(3, 'App\\Models\\User', 205),
(3, 'App\\Models\\User', 206),
(3, 'App\\Models\\User', 207),
(3, 'App\\Models\\User', 208),
(3, 'App\\Models\\User', 209),
(3, 'App\\Models\\User', 210),
(3, 'App\\Models\\User', 211),
(3, 'App\\Models\\User', 212),
(3, 'App\\Models\\User', 213),
(3, 'App\\Models\\User', 214),
(3, 'App\\Models\\User', 215),
(3, 'App\\Models\\User', 216),
(3, 'App\\Models\\User', 217),
(3, 'App\\Models\\User', 218),
(3, 'App\\Models\\User', 219),
(3, 'App\\Models\\User', 220),
(3, 'App\\Models\\User', 221),
(3, 'App\\Models\\User', 222),
(3, 'App\\Models\\User', 223),
(3, 'App\\Models\\User', 224),
(3, 'App\\Models\\User', 225),
(3, 'App\\Models\\User', 226),
(3, 'App\\Models\\User', 227),
(3, 'App\\Models\\User', 228),
(3, 'App\\Models\\User', 229),
(3, 'App\\Models\\User', 230),
(3, 'App\\Models\\User', 231),
(3, 'App\\Models\\User', 232),
(3, 'App\\Models\\User', 233),
(3, 'App\\Models\\User', 234),
(3, 'App\\Models\\User', 235),
(3, 'App\\Models\\User', 236),
(3, 'App\\Models\\User', 237),
(3, 'App\\Models\\User', 238),
(3, 'App\\Models\\User', 239),
(3, 'App\\Models\\User', 240),
(3, 'App\\Models\\User', 241),
(3, 'App\\Models\\User', 242),
(3, 'App\\Models\\User', 243),
(3, 'App\\Models\\User', 244),
(3, 'App\\Models\\User', 245),
(3, 'App\\Models\\User', 246),
(3, 'App\\Models\\User', 247),
(3, 'App\\Models\\User', 248),
(3, 'App\\Models\\User', 249),
(3, 'App\\Models\\User', 250),
(3, 'App\\Models\\User', 251),
(3, 'App\\Models\\User', 252),
(3, 'App\\Models\\User', 253),
(3, 'App\\Models\\User', 254),
(3, 'App\\Models\\User', 255),
(3, 'App\\Models\\User', 256),
(3, 'App\\Models\\User', 257),
(3, 'App\\Models\\User', 258),
(3, 'App\\Models\\User', 259),
(3, 'App\\Models\\User', 260),
(3, 'App\\Models\\User', 261),
(3, 'App\\Models\\User', 262),
(3, 'App\\Models\\User', 263),
(3, 'App\\Models\\User', 264),
(3, 'App\\Models\\User', 265),
(3, 'App\\Models\\User', 266),
(3, 'App\\Models\\User', 267),
(3, 'App\\Models\\User', 268),
(3, 'App\\Models\\User', 269),
(3, 'App\\Models\\User', 270),
(3, 'App\\Models\\User', 271),
(3, 'App\\Models\\User', 272),
(3, 'App\\Models\\User', 273),
(3, 'App\\Models\\User', 274),
(3, 'App\\Models\\User', 275),
(3, 'App\\Models\\User', 276),
(3, 'App\\Models\\User', 277),
(3, 'App\\Models\\User', 278),
(3, 'App\\Models\\User', 279),
(3, 'App\\Models\\User', 280),
(3, 'App\\Models\\User', 281),
(3, 'App\\Models\\User', 282),
(3, 'App\\Models\\User', 283),
(3, 'App\\Models\\User', 284),
(3, 'App\\Models\\User', 285),
(3, 'App\\Models\\User', 286),
(3, 'App\\Models\\User', 287),
(3, 'App\\Models\\User', 288),
(3, 'App\\Models\\User', 289),
(3, 'App\\Models\\User', 290),
(3, 'App\\Models\\User', 291),
(3, 'App\\Models\\User', 292),
(3, 'App\\Models\\User', 293),
(3, 'App\\Models\\User', 294),
(3, 'App\\Models\\User', 295),
(3, 'App\\Models\\User', 296),
(3, 'App\\Models\\User', 297),
(3, 'App\\Models\\User', 298),
(3, 'App\\Models\\User', 299),
(3, 'App\\Models\\User', 300),
(3, 'App\\Models\\User', 301),
(3, 'App\\Models\\User', 302),
(3, 'App\\Models\\User', 303),
(3, 'App\\Models\\User', 304),
(3, 'App\\Models\\User', 305),
(3, 'App\\Models\\User', 306),
(3, 'App\\Models\\User', 307),
(3, 'App\\Models\\User', 308),
(3, 'App\\Models\\User', 309),
(3, 'App\\Models\\User', 310),
(3, 'App\\Models\\User', 311),
(3, 'App\\Models\\User', 312),
(3, 'App\\Models\\User', 313),
(3, 'App\\Models\\User', 314),
(3, 'App\\Models\\User', 315),
(3, 'App\\Models\\User', 316),
(3, 'App\\Models\\User', 317),
(3, 'App\\Models\\User', 318),
(3, 'App\\Models\\User', 319),
(3, 'App\\Models\\User', 320),
(3, 'App\\Models\\User', 321),
(3, 'App\\Models\\User', 322),
(3, 'App\\Models\\User', 323),
(3, 'App\\Models\\User', 324),
(3, 'App\\Models\\User', 325),
(3, 'App\\Models\\User', 326),
(3, 'App\\Models\\User', 327),
(3, 'App\\Models\\User', 328),
(3, 'App\\Models\\User', 329),
(3, 'App\\Models\\User', 330),
(3, 'App\\Models\\User', 331),
(3, 'App\\Models\\User', 332),
(3, 'App\\Models\\User', 333),
(3, 'App\\Models\\User', 334),
(3, 'App\\Models\\User', 335),
(3, 'App\\Models\\User', 336),
(3, 'App\\Models\\User', 337),
(3, 'App\\Models\\User', 338),
(3, 'App\\Models\\User', 339),
(3, 'App\\Models\\User', 340),
(3, 'App\\Models\\User', 341),
(3, 'App\\Models\\User', 342),
(3, 'App\\Models\\User', 343),
(3, 'App\\Models\\User', 344),
(3, 'App\\Models\\User', 345),
(3, 'App\\Models\\User', 346),
(3, 'App\\Models\\User', 347),
(3, 'App\\Models\\User', 348),
(3, 'App\\Models\\User', 349),
(3, 'App\\Models\\User', 350),
(3, 'App\\Models\\User', 351),
(3, 'App\\Models\\User', 352),
(3, 'App\\Models\\User', 353),
(3, 'App\\Models\\User', 354),
(3, 'App\\Models\\User', 355),
(3, 'App\\Models\\User', 356),
(3, 'App\\Models\\User', 357),
(3, 'App\\Models\\User', 358),
(3, 'App\\Models\\User', 359),
(3, 'App\\Models\\User', 360),
(3, 'App\\Models\\User', 361),
(3, 'App\\Models\\User', 362),
(3, 'App\\Models\\User', 363),
(3, 'App\\Models\\User', 364),
(3, 'App\\Models\\User', 365),
(3, 'App\\Models\\User', 366),
(3, 'App\\Models\\User', 367),
(3, 'App\\Models\\User', 368),
(3, 'App\\Models\\User', 369),
(3, 'App\\Models\\User', 370),
(3, 'App\\Models\\User', 371),
(3, 'App\\Models\\User', 372),
(3, 'App\\Models\\User', 373),
(3, 'App\\Models\\User', 374),
(3, 'App\\Models\\User', 375),
(3, 'App\\Models\\User', 376),
(3, 'App\\Models\\User', 377),
(3, 'App\\Models\\User', 378),
(3, 'App\\Models\\User', 379),
(3, 'App\\Models\\User', 380),
(3, 'App\\Models\\User', 381),
(3, 'App\\Models\\User', 382),
(3, 'App\\Models\\User', 383),
(3, 'App\\Models\\User', 384),
(3, 'App\\Models\\User', 385),
(3, 'App\\Models\\User', 386),
(3, 'App\\Models\\User', 387),
(3, 'App\\Models\\User', 388),
(3, 'App\\Models\\User', 389),
(3, 'App\\Models\\User', 390),
(3, 'App\\Models\\User', 391),
(3, 'App\\Models\\User', 392),
(3, 'App\\Models\\User', 393),
(3, 'App\\Models\\User', 394),
(3, 'App\\Models\\User', 395),
(3, 'App\\Models\\User', 396),
(3, 'App\\Models\\User', 397),
(3, 'App\\Models\\User', 398),
(3, 'App\\Models\\User', 399),
(3, 'App\\Models\\User', 400),
(3, 'App\\Models\\User', 401),
(3, 'App\\Models\\User', 402),
(3, 'App\\Models\\User', 403),
(3, 'App\\Models\\User', 404),
(3, 'App\\Models\\User', 405),
(3, 'App\\Models\\User', 406),
(3, 'App\\Models\\User', 407),
(3, 'App\\Models\\User', 408),
(3, 'App\\Models\\User', 409),
(3, 'App\\Models\\User', 410),
(3, 'App\\Models\\User', 411),
(3, 'App\\Models\\User', 412),
(3, 'App\\Models\\User', 413),
(3, 'App\\Models\\User', 414),
(3, 'App\\Models\\User', 415),
(3, 'App\\Models\\User', 416),
(3, 'App\\Models\\User', 417),
(3, 'App\\Models\\User', 418),
(3, 'App\\Models\\User', 419),
(3, 'App\\Models\\User', 420),
(3, 'App\\Models\\User', 421),
(3, 'App\\Models\\User', 422),
(3, 'App\\Models\\User', 423),
(3, 'App\\Models\\User', 424),
(3, 'App\\Models\\User', 425),
(3, 'App\\Models\\User', 426),
(3, 'App\\Models\\User', 427),
(3, 'App\\Models\\User', 428),
(3, 'App\\Models\\User', 429),
(3, 'App\\Models\\User', 430),
(3, 'App\\Models\\User', 431),
(3, 'App\\Models\\User', 432),
(3, 'App\\Models\\User', 433),
(3, 'App\\Models\\User', 434),
(3, 'App\\Models\\User', 435),
(3, 'App\\Models\\User', 436),
(3, 'App\\Models\\User', 437),
(3, 'App\\Models\\User', 438),
(3, 'App\\Models\\User', 439),
(3, 'App\\Models\\User', 440),
(3, 'App\\Models\\User', 441),
(3, 'App\\Models\\User', 442),
(3, 'App\\Models\\User', 443),
(3, 'App\\Models\\User', 444),
(3, 'App\\Models\\User', 445),
(3, 'App\\Models\\User', 446),
(3, 'App\\Models\\User', 447),
(3, 'App\\Models\\User', 448),
(3, 'App\\Models\\User', 449),
(3, 'App\\Models\\User', 450),
(3, 'App\\Models\\User', 451),
(3, 'App\\Models\\User', 452),
(3, 'App\\Models\\User', 453),
(3, 'App\\Models\\User', 454),
(3, 'App\\Models\\User', 455),
(3, 'App\\Models\\User', 456),
(3, 'App\\Models\\User', 457),
(3, 'App\\Models\\User', 458),
(3, 'App\\Models\\User', 459),
(3, 'App\\Models\\User', 460),
(3, 'App\\Models\\User', 461),
(3, 'App\\Models\\User', 462),
(3, 'App\\Models\\User', 463),
(3, 'App\\Models\\User', 464),
(3, 'App\\Models\\User', 465),
(3, 'App\\Models\\User', 466),
(3, 'App\\Models\\User', 467),
(3, 'App\\Models\\User', 468),
(3, 'App\\Models\\User', 469),
(3, 'App\\Models\\User', 470),
(3, 'App\\Models\\User', 471),
(3, 'App\\Models\\User', 472),
(3, 'App\\Models\\User', 473),
(3, 'App\\Models\\User', 474),
(3, 'App\\Models\\User', 475),
(3, 'App\\Models\\User', 476),
(3, 'App\\Models\\User', 477),
(3, 'App\\Models\\User', 478),
(3, 'App\\Models\\User', 479),
(3, 'App\\Models\\User', 480),
(3, 'App\\Models\\User', 481),
(3, 'App\\Models\\User', 482),
(3, 'App\\Models\\User', 483),
(3, 'App\\Models\\User', 484),
(3, 'App\\Models\\User', 485),
(3, 'App\\Models\\User', 486),
(3, 'App\\Models\\User', 487),
(3, 'App\\Models\\User', 488),
(3, 'App\\Models\\User', 489),
(3, 'App\\Models\\User', 490),
(3, 'App\\Models\\User', 491),
(3, 'App\\Models\\User', 492),
(3, 'App\\Models\\User', 493),
(3, 'App\\Models\\User', 494),
(3, 'App\\Models\\User', 495),
(3, 'App\\Models\\User', 496),
(3, 'App\\Models\\User', 497),
(3, 'App\\Models\\User', 498),
(3, 'App\\Models\\User', 499),
(3, 'App\\Models\\User', 500),
(3, 'App\\Models\\User', 501),
(3, 'App\\Models\\User', 502),
(3, 'App\\Models\\User', 503),
(3, 'App\\Models\\User', 504),
(3, 'App\\Models\\User', 505),
(3, 'App\\Models\\User', 506),
(3, 'App\\Models\\User', 507),
(3, 'App\\Models\\User', 513),
(3, 'App\\Models\\User', 514),
(3, 'App\\Models\\User', 515),
(3, 'App\\Models\\User', 516),
(3, 'App\\Models\\User', 517),
(3, 'App\\Models\\User', 518),
(3, 'App\\Models\\User', 519),
(3, 'App\\Models\\User', 520),
(3, 'App\\Models\\User', 521),
(3, 'App\\Models\\User', 522),
(3, 'App\\Models\\User', 523),
(3, 'App\\Models\\User', 524),
(3, 'App\\Models\\User', 525),
(3, 'App\\Models\\User', 531),
(3, 'App\\Models\\User', 532),
(3, 'App\\Models\\User', 533),
(3, 'App\\Models\\User', 534),
(3, 'App\\Models\\User', 535),
(3, 'App\\Models\\User', 536),
(3, 'App\\Models\\User', 537),
(3, 'App\\Models\\User', 538),
(3, 'App\\Models\\User', 539),
(3, 'App\\Models\\User', 540),
(3, 'App\\Models\\User', 541),
(3, 'App\\Models\\User', 542),
(3, 'App\\Models\\User', 543),
(3, 'App\\Models\\User', 544),
(3, 'App\\Models\\User', 545),
(3, 'App\\Models\\User', 546),
(3, 'App\\Models\\User', 547),
(3, 'App\\Models\\User', 548),
(3, 'App\\Models\\User', 549),
(3, 'App\\Models\\User', 550),
(3, 'App\\Models\\User', 551),
(3, 'App\\Models\\User', 552),
(3, 'App\\Models\\User', 553),
(3, 'App\\Models\\User', 554),
(3, 'App\\Models\\User', 555),
(3, 'App\\Models\\User', 556),
(3, 'App\\Models\\User', 557),
(3, 'App\\Models\\User', 558),
(3, 'App\\Models\\User', 559),
(3, 'App\\Models\\User', 560),
(3, 'App\\Models\\User', 561),
(3, 'App\\Models\\User', 562),
(3, 'App\\Models\\User', 563),
(3, 'App\\Models\\User', 564),
(3, 'App\\Models\\User', 565),
(3, 'App\\Models\\User', 566),
(3, 'App\\Models\\User', 567),
(3, 'App\\Models\\User', 568),
(3, 'App\\Models\\User', 570),
(3, 'App\\Models\\User', 571),
(3, 'App\\Models\\User', 572),
(3, 'App\\Models\\User', 573),
(3, 'App\\Models\\User', 574),
(3, 'App\\Models\\User', 575),
(3, 'App\\Models\\User', 576),
(3, 'App\\Models\\User', 577),
(3, 'App\\Models\\User', 578),
(3, 'App\\Models\\User', 579),
(3, 'App\\Models\\User', 580),
(3, 'App\\Models\\User', 582),
(3, 'App\\Models\\User', 584),
(3, 'App\\Models\\User', 586),
(3, 'App\\Models\\User', 587),
(3, 'App\\Models\\User', 589),
(3, 'App\\Models\\User', 593),
(3, 'App\\Models\\User', 594),
(3, 'App\\Models\\User', 595),
(3, 'App\\Models\\User', 596),
(3, 'App\\Models\\User', 599),
(3, 'App\\Models\\User', 600),
(3, 'App\\Models\\User', 601),
(3, 'App\\Models\\User', 602),
(3, 'App\\Models\\User', 603),
(3, 'App\\Models\\User', 604),
(3, 'App\\Models\\User', 605),
(3, 'App\\Models\\User', 610),
(3, 'App\\Models\\User', 611),
(3, 'App\\Models\\User', 612),
(3, 'App\\Models\\User', 613),
(3, 'App\\Models\\User', 614),
(3, 'App\\Models\\User', 615),
(3, 'App\\Models\\User', 616),
(3, 'App\\Models\\User', 618),
(3, 'App\\Models\\User', 619),
(3, 'App\\Models\\User', 620),
(3, 'App\\Models\\User', 621),
(3, 'App\\Models\\User', 622),
(3, 'App\\Models\\User', 623),
(3, 'App\\Models\\User', 624),
(3, 'App\\Models\\User', 625),
(3, 'App\\Models\\User', 626),
(3, 'App\\Models\\User', 627),
(3, 'App\\Models\\User', 628),
(3, 'App\\Models\\User', 630),
(3, 'App\\Models\\User', 631),
(3, 'App\\Models\\User', 632),
(3, 'App\\Models\\User', 633),
(3, 'App\\Models\\User', 634),
(3, 'App\\Models\\User', 635),
(3, 'App\\Models\\User', 636),
(3, 'App\\Models\\User', 637),
(3, 'App\\Models\\User', 638),
(3, 'App\\Models\\User', 639),
(3, 'App\\Models\\User', 640),
(3, 'App\\Models\\User', 641),
(3, 'App\\Models\\User', 643),
(3, 'App\\Models\\User', 644),
(3, 'App\\Models\\User', 645),
(3, 'App\\Models\\User', 646),
(3, 'App\\Models\\User', 647),
(3, 'App\\Models\\User', 648),
(3, 'App\\Models\\User', 649),
(3, 'App\\Models\\User', 650),
(3, 'App\\Models\\User', 651),
(3, 'App\\Models\\User', 652),
(3, 'App\\Models\\User', 653),
(3, 'App\\Models\\User', 654),
(3, 'App\\Models\\User', 655),
(3, 'App\\Models\\User', 656),
(3, 'App\\Models\\User', 657),
(3, 'App\\Models\\User', 658),
(3, 'App\\Models\\User', 659),
(3, 'App\\Models\\User', 660),
(3, 'App\\Models\\User', 661),
(3, 'App\\Models\\User', 662),
(3, 'App\\Models\\User', 663),
(3, 'App\\Models\\User', 664),
(3, 'App\\Models\\User', 665),
(3, 'App\\Models\\User', 666),
(3, 'App\\Models\\User', 667),
(3, 'App\\Models\\User', 668),
(3, 'App\\Models\\User', 669),
(3, 'App\\Models\\User', 670),
(3, 'App\\Models\\User', 671),
(3, 'App\\Models\\User', 672),
(3, 'App\\Models\\User', 673),
(3, 'App\\Models\\User', 674),
(3, 'App\\Models\\User', 675),
(3, 'App\\Models\\User', 676),
(3, 'App\\Models\\User', 677),
(3, 'App\\Models\\User', 678),
(3, 'App\\Models\\User', 679),
(3, 'App\\Models\\User', 680),
(3, 'App\\Models\\User', 681),
(3, 'App\\Models\\User', 682),
(3, 'App\\Models\\User', 683),
(3, 'App\\Models\\User', 684),
(3, 'App\\Models\\User', 685),
(3, 'App\\Models\\User', 686),
(3, 'App\\Models\\User', 687),
(3, 'App\\Models\\User', 688),
(3, 'App\\Models\\User', 689),
(3, 'App\\Models\\User', 692),
(3, 'App\\Models\\User', 701),
(3, 'App\\Models\\User', 702),
(3, 'App\\Models\\User', 705),
(3, 'App\\Models\\User', 707),
(3, 'App\\Models\\User', 708),
(3, 'App\\Models\\User', 709),
(3, 'App\\Models\\User', 713),
(3, 'App\\Models\\User', 714),
(3, 'App\\Models\\User', 715),
(3, 'App\\Models\\User', 716),
(3, 'App\\Models\\User', 717),
(3, 'App\\Models\\User', 718),
(3, 'App\\Models\\User', 719),
(3, 'App\\Models\\User', 720),
(3, 'App\\Models\\User', 721),
(3, 'App\\Models\\User', 722),
(3, 'App\\Models\\User', 723),
(3, 'App\\Models\\User', 724),
(3, 'App\\Models\\User', 725),
(3, 'App\\Models\\User', 726),
(3, 'App\\Models\\User', 727),
(3, 'App\\Models\\User', 728),
(3, 'App\\Models\\User', 729),
(3, 'App\\Models\\User', 730),
(3, 'App\\Models\\User', 731),
(3, 'App\\Models\\User', 732),
(3, 'App\\Models\\User', 733),
(3, 'App\\Models\\User', 734),
(3, 'App\\Models\\User', 735),
(3, 'App\\Models\\User', 736),
(3, 'App\\Models\\User', 737),
(3, 'App\\Models\\User', 738),
(3, 'App\\Models\\User', 739),
(3, 'App\\Models\\User', 740),
(3, 'App\\Models\\User', 741),
(3, 'App\\Models\\User', 742),
(3, 'App\\Models\\User', 743),
(3, 'App\\Models\\User', 744),
(3, 'App\\Models\\User', 745),
(3, 'App\\Models\\User', 746),
(3, 'App\\Models\\User', 747),
(3, 'App\\Models\\User', 748),
(3, 'App\\Models\\User', 749),
(3, 'App\\Models\\User', 750),
(3, 'App\\Models\\User', 751),
(3, 'App\\Models\\User', 752),
(3, 'App\\Models\\User', 753),
(3, 'App\\Models\\User', 754),
(3, 'App\\Models\\User', 755),
(3, 'App\\Models\\User', 756),
(3, 'App\\Models\\User', 757),
(3, 'App\\Models\\User', 758),
(3, 'App\\Models\\User', 759),
(3, 'App\\Models\\User', 760),
(3, 'App\\Models\\User', 761),
(3, 'App\\Models\\User', 762),
(3, 'App\\Models\\User', 763),
(3, 'App\\Models\\User', 764),
(3, 'App\\Models\\User', 765),
(3, 'App\\Models\\User', 766),
(3, 'App\\Models\\User', 767),
(3, 'App\\Models\\User', 768),
(3, 'App\\Models\\User', 769),
(3, 'App\\Models\\User', 770),
(3, 'App\\Models\\User', 771),
(3, 'App\\Models\\User', 772),
(3, 'App\\Models\\User', 773),
(3, 'App\\Models\\User', 774),
(3, 'App\\Models\\User', 775),
(3, 'App\\Models\\User', 776),
(3, 'App\\Models\\User', 777),
(3, 'App\\Models\\User', 778),
(3, 'App\\Models\\User', 779),
(3, 'App\\Models\\User', 780),
(3, 'App\\Models\\User', 781),
(3, 'App\\Models\\User', 782),
(3, 'App\\Models\\User', 783),
(3, 'App\\Models\\User', 784),
(3, 'App\\Models\\User', 785),
(3, 'App\\Models\\User', 786),
(3, 'App\\Models\\User', 788),
(3, 'App\\Models\\User', 790),
(3, 'App\\Models\\User', 791),
(3, 'App\\Models\\User', 792),
(3, 'App\\Models\\User', 793),
(3, 'App\\Models\\User', 794),
(3, 'App\\Models\\User', 795),
(3, 'App\\Models\\User', 796),
(3, 'App\\Models\\User', 797),
(3, 'App\\Models\\User', 798),
(3, 'App\\Models\\User', 799),
(3, 'App\\Models\\User', 800),
(3, 'App\\Models\\User', 801),
(3, 'App\\Models\\User', 802),
(3, 'App\\Models\\User', 803),
(3, 'App\\Models\\User', 804),
(3, 'App\\Models\\User', 805),
(3, 'App\\Models\\User', 806),
(3, 'App\\Models\\User', 808),
(3, 'App\\Models\\User', 809),
(3, 'App\\Models\\User', 810),
(3, 'App\\Models\\User', 811),
(3, 'App\\Models\\User', 812),
(3, 'App\\Models\\User', 813),
(3, 'App\\Models\\User', 814),
(3, 'App\\Models\\User', 815),
(3, 'App\\Models\\User', 816),
(3, 'App\\Models\\User', 817),
(3, 'App\\Models\\User', 818),
(3, 'App\\Models\\User', 819),
(3, 'App\\Models\\User', 820),
(3, 'App\\Models\\User', 821),
(3, 'App\\Models\\User', 822),
(3, 'App\\Models\\User', 823),
(3, 'App\\Models\\User', 824),
(3, 'App\\Models\\User', 825),
(3, 'App\\Models\\User', 826),
(3, 'App\\Models\\User', 827),
(3, 'App\\Models\\User', 828),
(3, 'App\\Models\\User', 829),
(3, 'App\\Models\\User', 830),
(3, 'App\\Models\\User', 831),
(3, 'App\\Models\\User', 833),
(3, 'App\\Models\\User', 834),
(3, 'App\\Models\\User', 835),
(3, 'App\\Models\\User', 836),
(3, 'App\\Models\\User', 837),
(3, 'App\\Models\\User', 838),
(3, 'App\\Models\\User', 839),
(3, 'App\\Models\\User', 840),
(3, 'App\\Models\\User', 841),
(3, 'App\\Models\\User', 842),
(3, 'App\\Models\\User', 843),
(3, 'App\\Models\\User', 844),
(3, 'App\\Models\\User', 845),
(3, 'App\\Models\\User', 846),
(3, 'App\\Models\\User', 847),
(3, 'App\\Models\\User', 848),
(3, 'App\\Models\\User', 849),
(3, 'App\\Models\\User', 850),
(3, 'App\\Models\\User', 851),
(3, 'App\\Models\\User', 852),
(3, 'App\\Models\\User', 853),
(3, 'App\\Models\\User', 854),
(3, 'App\\Models\\User', 855),
(3, 'App\\Models\\User', 856),
(3, 'App\\Models\\User', 857),
(3, 'App\\Models\\User', 858),
(3, 'App\\Models\\User', 859),
(3, 'App\\Models\\User', 860),
(3, 'App\\Models\\User', 861),
(3, 'App\\Models\\User', 862),
(3, 'App\\Models\\User', 863),
(3, 'App\\Models\\User', 864),
(3, 'App\\Models\\User', 865),
(3, 'App\\Models\\User', 866),
(3, 'App\\Models\\User', 867),
(3, 'App\\Models\\User', 868),
(3, 'App\\Models\\User', 869),
(3, 'App\\Models\\User', 870),
(3, 'App\\Models\\User', 871),
(3, 'App\\Models\\User', 872),
(3, 'App\\Models\\User', 873),
(3, 'App\\Models\\User', 874),
(3, 'App\\Models\\User', 875),
(3, 'App\\Models\\User', 876),
(3, 'App\\Models\\User', 877),
(3, 'App\\Models\\User', 878),
(3, 'App\\Models\\User', 879),
(3, 'App\\Models\\User', 880),
(3, 'App\\Models\\User', 881),
(3, 'App\\Models\\User', 882),
(3, 'App\\Models\\User', 883),
(3, 'App\\Models\\User', 884),
(3, 'App\\Models\\User', 885),
(3, 'App\\Models\\User', 886),
(3, 'App\\Models\\User', 887),
(3, 'App\\Models\\User', 888),
(3, 'App\\Models\\User', 889),
(3, 'App\\Models\\User', 890),
(3, 'App\\Models\\User', 891),
(3, 'App\\Models\\User', 892),
(3, 'App\\Models\\User', 893),
(3, 'App\\Models\\User', 894),
(3, 'App\\Models\\User', 895),
(3, 'App\\Models\\User', 896),
(3, 'App\\Models\\User', 897),
(3, 'App\\Models\\User', 898),
(3, 'App\\Models\\User', 899),
(3, 'App\\Models\\User', 900),
(3, 'App\\Models\\User', 901),
(3, 'App\\Models\\User', 902),
(3, 'App\\Models\\User', 903),
(3, 'App\\Models\\User', 904),
(3, 'App\\Models\\User', 905),
(3, 'App\\Models\\User', 906),
(3, 'App\\Models\\User', 907),
(3, 'App\\Models\\User', 908),
(3, 'App\\Models\\User', 909),
(3, 'App\\Models\\User', 910),
(3, 'App\\Models\\User', 911),
(3, 'App\\Models\\User', 912),
(3, 'App\\Models\\User', 913),
(3, 'App\\Models\\User', 914),
(3, 'App\\Models\\User', 915),
(3, 'App\\Models\\User', 916),
(3, 'App\\Models\\User', 917),
(3, 'App\\Models\\User', 918),
(3, 'App\\Models\\User', 919),
(3, 'App\\Models\\User', 920),
(3, 'App\\Models\\User', 921),
(3, 'App\\Models\\User', 922),
(3, 'App\\Models\\User', 923),
(3, 'App\\Models\\User', 924),
(3, 'App\\Models\\User', 925),
(3, 'App\\Models\\User', 926),
(3, 'App\\Models\\User', 927),
(3, 'App\\Models\\User', 928),
(3, 'App\\Models\\User', 929),
(3, 'App\\Models\\User', 930),
(3, 'App\\Models\\User', 931),
(3, 'App\\Models\\User', 932),
(3, 'App\\Models\\User', 933),
(3, 'App\\Models\\User', 934),
(3, 'App\\Models\\User', 935),
(3, 'App\\Models\\User', 936),
(3, 'App\\Models\\User', 937),
(3, 'App\\Models\\User', 938),
(3, 'App\\Models\\User', 939),
(3, 'App\\Models\\User', 940),
(3, 'App\\Models\\User', 941),
(3, 'App\\Models\\User', 942),
(3, 'App\\Models\\User', 943),
(3, 'App\\Models\\User', 944),
(3, 'App\\Models\\User', 945),
(3, 'App\\Models\\User', 946),
(3, 'App\\Models\\User', 947),
(3, 'App\\Models\\User', 948),
(3, 'App\\Models\\User', 949),
(3, 'App\\Models\\User', 950),
(3, 'App\\Models\\User', 951),
(3, 'App\\Models\\User', 952),
(3, 'App\\Models\\User', 953),
(3, 'App\\Models\\User', 954),
(3, 'App\\Models\\User', 955),
(3, 'App\\Models\\User', 956),
(3, 'App\\Models\\User', 957),
(3, 'App\\Models\\User', 958),
(3, 'App\\Models\\User', 959),
(3, 'App\\Models\\User', 960),
(3, 'App\\Models\\User', 961),
(3, 'App\\Models\\User', 962),
(3, 'App\\Models\\User', 963),
(3, 'App\\Models\\User', 964),
(3, 'App\\Models\\User', 965),
(3, 'App\\Models\\User', 966),
(3, 'App\\Models\\User', 967),
(3, 'App\\Models\\User', 968),
(3, 'App\\Models\\User', 969),
(3, 'App\\Models\\User', 970),
(3, 'App\\Models\\User', 971),
(3, 'App\\Models\\User', 972),
(3, 'App\\Models\\User', 973),
(3, 'App\\Models\\User', 974),
(3, 'App\\Models\\User', 975),
(3, 'App\\Models\\User', 976),
(3, 'App\\Models\\User', 977),
(3, 'App\\Models\\User', 978),
(3, 'App\\Models\\User', 979),
(3, 'App\\Models\\User', 980),
(3, 'App\\Models\\User', 981),
(3, 'App\\Models\\User', 982),
(3, 'App\\Models\\User', 983),
(3, 'App\\Models\\User', 984),
(3, 'App\\Models\\User', 985),
(3, 'App\\Models\\User', 986),
(3, 'App\\Models\\User', 987),
(3, 'App\\Models\\User', 989),
(3, 'App\\Models\\User', 990),
(3, 'App\\Models\\User', 991),
(3, 'App\\Models\\User', 992),
(3, 'App\\Models\\User', 993),
(3, 'App\\Models\\User', 994),
(3, 'App\\Models\\User', 995),
(3, 'App\\Models\\User', 996),
(3, 'App\\Models\\User', 997),
(3, 'App\\Models\\User', 998),
(3, 'App\\Models\\User', 999),
(3, 'App\\Models\\User', 1000),
(3, 'App\\Models\\User', 1001),
(3, 'App\\Models\\User', 1002),
(3, 'App\\Models\\User', 1003),
(3, 'App\\Models\\User', 1004),
(3, 'App\\Models\\User', 1005),
(3, 'App\\Models\\User', 1006),
(3, 'App\\Models\\User', 1007),
(3, 'App\\Models\\User', 1008),
(3, 'App\\Models\\User', 1009),
(3, 'App\\Models\\User', 1010),
(3, 'App\\Models\\User', 1011),
(3, 'App\\Models\\User', 1012),
(3, 'App\\Models\\User', 1013),
(3, 'App\\Models\\User', 1014),
(3, 'App\\Models\\User', 1015),
(3, 'App\\Models\\User', 1016),
(3, 'App\\Models\\User', 1017),
(3, 'App\\Models\\User', 1018),
(3, 'App\\Models\\User', 1019),
(3, 'App\\Models\\User', 1020),
(3, 'App\\Models\\User', 1021),
(3, 'App\\Models\\User', 1022),
(3, 'App\\Models\\User', 1023),
(3, 'App\\Models\\User', 1024),
(3, 'App\\Models\\User', 1025),
(3, 'App\\Models\\User', 1026),
(3, 'App\\Models\\User', 1027),
(3, 'App\\Models\\User', 1028),
(3, 'App\\Models\\User', 1029),
(3, 'App\\Models\\User', 1030),
(3, 'App\\Models\\User', 1031),
(3, 'App\\Models\\User', 1032),
(3, 'App\\Models\\User', 1033),
(3, 'App\\Models\\User', 1034),
(3, 'App\\Models\\User', 1035),
(3, 'App\\Models\\User', 1036),
(3, 'App\\Models\\User', 1037),
(3, 'App\\Models\\User', 1038),
(3, 'App\\Models\\User', 1039),
(3, 'App\\Models\\User', 1040),
(3, 'App\\Models\\User', 1041),
(3, 'App\\Models\\User', 1042),
(3, 'App\\Models\\User', 1043),
(3, 'App\\Models\\User', 1044),
(3, 'App\\Models\\User', 1045),
(3, 'App\\Models\\User', 1046),
(3, 'App\\Models\\User', 1047),
(3, 'App\\Models\\User', 1048),
(3, 'App\\Models\\User', 1049),
(3, 'App\\Models\\User', 1050),
(3, 'App\\Models\\User', 1051),
(3, 'App\\Models\\User', 1052),
(3, 'App\\Models\\User', 1053),
(3, 'App\\Models\\User', 1054),
(3, 'App\\Models\\User', 1055),
(3, 'App\\Models\\User', 1056),
(3, 'App\\Models\\User', 1057),
(3, 'App\\Models\\User', 1058),
(3, 'App\\Models\\User', 1059),
(3, 'App\\Models\\User', 1060),
(3, 'App\\Models\\User', 1061),
(3, 'App\\Models\\User', 1062),
(3, 'App\\Models\\User', 1063),
(3, 'App\\Models\\User', 1064),
(3, 'App\\Models\\User', 1065),
(3, 'App\\Models\\User', 1066),
(3, 'App\\Models\\User', 1067),
(3, 'App\\Models\\User', 1068),
(3, 'App\\Models\\User', 1069),
(3, 'App\\Models\\User', 1070),
(3, 'App\\Models\\User', 1071),
(3, 'App\\Models\\User', 1072),
(3, 'App\\Models\\User', 1073),
(3, 'App\\Models\\User', 1074),
(3, 'App\\Models\\User', 1075),
(3, 'App\\Models\\User', 1076),
(3, 'App\\Models\\User', 1077),
(3, 'App\\Models\\User', 1078),
(3, 'App\\Models\\User', 1079),
(3, 'App\\Models\\User', 1080),
(3, 'App\\Models\\User', 1081),
(3, 'App\\Models\\User', 1082),
(3, 'App\\Models\\User', 1083),
(3, 'App\\Models\\User', 1084),
(3, 'App\\Models\\User', 1085),
(3, 'App\\Models\\User', 1086),
(3, 'App\\Models\\User', 1087),
(3, 'App\\Models\\User', 1088),
(3, 'App\\Models\\User', 1089),
(3, 'App\\Models\\User', 1090),
(3, 'App\\Models\\User', 1091),
(3, 'App\\Models\\User', 1092),
(3, 'App\\Models\\User', 1093),
(3, 'App\\Models\\User', 1094),
(3, 'App\\Models\\User', 1095),
(3, 'App\\Models\\User', 1096),
(3, 'App\\Models\\User', 1097),
(3, 'App\\Models\\User', 1098),
(3, 'App\\Models\\User', 1099),
(3, 'App\\Models\\User', 1100),
(3, 'App\\Models\\User', 1101),
(3, 'App\\Models\\User', 1102),
(3, 'App\\Models\\User', 1103),
(3, 'App\\Models\\User', 1104),
(3, 'App\\Models\\User', 1105),
(3, 'App\\Models\\User', 1106),
(3, 'App\\Models\\User', 1107),
(3, 'App\\Models\\User', 1108),
(3, 'App\\Models\\User', 1109),
(3, 'App\\Models\\User', 1110),
(3, 'App\\Models\\User', 1111),
(3, 'App\\Models\\User', 1112),
(3, 'App\\Models\\User', 1113),
(3, 'App\\Models\\User', 1114),
(3, 'App\\Models\\User', 1115),
(3, 'App\\Models\\User', 1116),
(3, 'App\\Models\\User', 1117),
(3, 'App\\Models\\User', 1118),
(3, 'App\\Models\\User', 1119),
(3, 'App\\Models\\User', 1120),
(3, 'App\\Models\\User', 1121),
(3, 'App\\Models\\User', 1122),
(3, 'App\\Models\\User', 1123),
(3, 'App\\Models\\User', 1124),
(3, 'App\\Models\\User', 1125),
(3, 'App\\Models\\User', 1126),
(3, 'App\\Models\\User', 1127),
(3, 'App\\Models\\User', 1128),
(3, 'App\\Models\\User', 1129),
(3, 'App\\Models\\User', 1130),
(3, 'App\\Models\\User', 1131),
(3, 'App\\Models\\User', 1132),
(3, 'App\\Models\\User', 1133),
(3, 'App\\Models\\User', 1134),
(3, 'App\\Models\\User', 1135),
(3, 'App\\Models\\User', 1136),
(3, 'App\\Models\\User', 1137),
(3, 'App\\Models\\User', 1138),
(3, 'App\\Models\\User', 1139),
(3, 'App\\Models\\User', 1140),
(3, 'App\\Models\\User', 1141),
(3, 'App\\Models\\User', 1142),
(3, 'App\\Models\\User', 1143),
(3, 'App\\Models\\User', 1144),
(3, 'App\\Models\\User', 1145),
(3, 'App\\Models\\User', 1146),
(3, 'App\\Models\\User', 1147),
(3, 'App\\Models\\User', 1148),
(3, 'App\\Models\\User', 1149),
(3, 'App\\Models\\User', 1150),
(3, 'App\\Models\\User', 1151),
(3, 'App\\Models\\User', 1152),
(3, 'App\\Models\\User', 1153),
(3, 'App\\Models\\User', 1154),
(3, 'App\\Models\\User', 1155),
(3, 'App\\Models\\User', 1156),
(3, 'App\\Models\\User', 1157),
(3, 'App\\Models\\User', 1158),
(3, 'App\\Models\\User', 1159),
(3, 'App\\Models\\User', 1160),
(3, 'App\\Models\\User', 1161),
(3, 'App\\Models\\User', 1162),
(3, 'App\\Models\\User', 1163),
(3, 'App\\Models\\User', 1164),
(3, 'App\\Models\\User', 1165),
(3, 'App\\Models\\User', 1166),
(3, 'App\\Models\\User', 1167),
(3, 'App\\Models\\User', 1168),
(3, 'App\\Models\\User', 1169),
(3, 'App\\Models\\User', 1170),
(3, 'App\\Models\\User', 1171),
(3, 'App\\Models\\User', 1172),
(3, 'App\\Models\\User', 1173),
(3, 'App\\Models\\User', 1174),
(3, 'App\\Models\\User', 1175),
(3, 'App\\Models\\User', 1176),
(3, 'App\\Models\\User', 1177),
(3, 'App\\Models\\User', 1178),
(3, 'App\\Models\\User', 1179),
(3, 'App\\Models\\User', 1180),
(3, 'App\\Models\\User', 1181),
(3, 'App\\Models\\User', 1182),
(3, 'App\\Models\\User', 1183),
(3, 'App\\Models\\User', 1184),
(3, 'App\\Models\\User', 1185),
(3, 'App\\Models\\User', 1186),
(3, 'App\\Models\\User', 1187),
(3, 'App\\Models\\User', 1188),
(3, 'App\\Models\\User', 1189),
(3, 'App\\Models\\User', 1190),
(3, 'App\\Models\\User', 1191),
(3, 'App\\Models\\User', 1192),
(3, 'App\\Models\\User', 1193),
(3, 'App\\Models\\User', 1194),
(3, 'App\\Models\\User', 1195),
(3, 'App\\Models\\User', 1196),
(3, 'App\\Models\\User', 1197),
(3, 'App\\Models\\User', 1198),
(3, 'App\\Models\\User', 1199),
(3, 'App\\Models\\User', 1200),
(3, 'App\\Models\\User', 1201),
(3, 'App\\Models\\User', 1202),
(3, 'App\\Models\\User', 1203),
(3, 'App\\Models\\User', 1204),
(3, 'App\\Models\\User', 1205),
(3, 'App\\Models\\User', 1206),
(3, 'App\\Models\\User', 1207),
(3, 'App\\Models\\User', 1208),
(3, 'App\\Models\\User', 1209),
(3, 'App\\Models\\User', 1210),
(3, 'App\\Models\\User', 1211),
(3, 'App\\Models\\User', 1212),
(3, 'App\\Models\\User', 1213),
(3, 'App\\Models\\User', 1214),
(3, 'App\\Models\\User', 1215),
(3, 'App\\Models\\User', 1216),
(3, 'App\\Models\\User', 1217),
(3, 'App\\Models\\User', 1218),
(3, 'App\\Models\\User', 1219),
(3, 'App\\Models\\User', 1220),
(3, 'App\\Models\\User', 1221),
(3, 'App\\Models\\User', 1222),
(3, 'App\\Models\\User', 1223),
(3, 'App\\Models\\User', 1224),
(3, 'App\\Models\\User', 1225),
(3, 'App\\Models\\User', 1226),
(3, 'App\\Models\\User', 1227),
(3, 'App\\Models\\User', 1228),
(3, 'App\\Models\\User', 1229),
(3, 'App\\Models\\User', 1230),
(3, 'App\\Models\\User', 1231),
(3, 'App\\Models\\User', 1232),
(3, 'App\\Models\\User', 1233),
(3, 'App\\Models\\User', 1234),
(3, 'App\\Models\\User', 1235),
(3, 'App\\Models\\User', 1236),
(3, 'App\\Models\\User', 1237),
(3, 'App\\Models\\User', 1238),
(3, 'App\\Models\\User', 1239),
(3, 'App\\Models\\User', 1240),
(3, 'App\\Models\\User', 1241),
(3, 'App\\Models\\User', 1242),
(3, 'App\\Models\\User', 1243),
(3, 'App\\Models\\User', 1244),
(3, 'App\\Models\\User', 1245),
(3, 'App\\Models\\User', 1246),
(3, 'App\\Models\\User', 1247),
(3, 'App\\Models\\User', 1248),
(3, 'App\\Models\\User', 1249),
(3, 'App\\Models\\User', 1250),
(3, 'App\\Models\\User', 1251),
(3, 'App\\Models\\User', 1252),
(3, 'App\\Models\\User', 1253),
(3, 'App\\Models\\User', 1254),
(3, 'App\\Models\\User', 1255),
(3, 'App\\Models\\User', 1256),
(3, 'App\\Models\\User', 1257),
(3, 'App\\Models\\User', 1258),
(3, 'App\\Models\\User', 1259),
(3, 'App\\Models\\User', 1260),
(3, 'App\\Models\\User', 1261),
(3, 'App\\Models\\User', 1262),
(3, 'App\\Models\\User', 1263),
(3, 'App\\Models\\User', 1264),
(3, 'App\\Models\\User', 1265),
(3, 'App\\Models\\User', 1266),
(3, 'App\\Models\\User', 1267),
(3, 'App\\Models\\User', 1268),
(3, 'App\\Models\\User', 1269),
(3, 'App\\Models\\User', 1270),
(3, 'App\\Models\\User', 1271),
(3, 'App\\Models\\User', 1272),
(3, 'App\\Models\\User', 1273),
(3, 'App\\Models\\User', 1274),
(3, 'App\\Models\\User', 1275),
(3, 'App\\Models\\User', 1276),
(3, 'App\\Models\\User', 1277),
(3, 'App\\Models\\User', 1278),
(3, 'App\\Models\\User', 1279),
(3, 'App\\Models\\User', 1280),
(3, 'App\\Models\\User', 1281),
(3, 'App\\Models\\User', 1282),
(3, 'App\\Models\\User', 1283),
(3, 'App\\Models\\User', 1284),
(3, 'App\\Models\\User', 1285),
(3, 'App\\Models\\User', 1286),
(3, 'App\\Models\\User', 1287),
(3, 'App\\Models\\User', 1288),
(3, 'App\\Models\\User', 1289),
(3, 'App\\Models\\User', 1290),
(3, 'App\\Models\\User', 1291),
(3, 'App\\Models\\User', 1292),
(3, 'App\\Models\\User', 1293),
(3, 'App\\Models\\User', 1294),
(3, 'App\\Models\\User', 1295),
(3, 'App\\Models\\User', 1296),
(3, 'App\\Models\\User', 1297),
(3, 'App\\Models\\User', 1298),
(3, 'App\\Models\\User', 1299),
(3, 'App\\Models\\User', 1300),
(3, 'App\\Models\\User', 1301),
(3, 'App\\Models\\User', 1302),
(3, 'App\\Models\\User', 1303),
(3, 'App\\Models\\User', 1304),
(3, 'App\\Models\\User', 1305),
(3, 'App\\Models\\User', 1306),
(3, 'App\\Models\\User', 1307),
(3, 'App\\Models\\User', 1308),
(3, 'App\\Models\\User', 1309),
(3, 'App\\Models\\User', 1310),
(3, 'App\\Models\\User', 1311),
(3, 'App\\Models\\User', 1312),
(3, 'App\\Models\\User', 1313),
(3, 'App\\Models\\User', 1314),
(3, 'App\\Models\\User', 1315),
(3, 'App\\Models\\User', 1316),
(3, 'App\\Models\\User', 1317),
(3, 'App\\Models\\User', 1318),
(3, 'App\\Models\\User', 1319),
(3, 'App\\Models\\User', 1320),
(3, 'App\\Models\\User', 1321),
(3, 'App\\Models\\User', 1322),
(3, 'App\\Models\\User', 1323),
(3, 'App\\Models\\User', 1324),
(3, 'App\\Models\\User', 1325),
(3, 'App\\Models\\User', 1326),
(3, 'App\\Models\\User', 1327),
(3, 'App\\Models\\User', 1328),
(3, 'App\\Models\\User', 1329),
(3, 'App\\Models\\User', 1330),
(3, 'App\\Models\\User', 1331),
(3, 'App\\Models\\User', 1332),
(3, 'App\\Models\\User', 1333),
(3, 'App\\Models\\User', 1334),
(3, 'App\\Models\\User', 1335),
(3, 'App\\Models\\User', 1336),
(3, 'App\\Models\\User', 1337),
(3, 'App\\Models\\User', 1338),
(3, 'App\\Models\\User', 1339),
(3, 'App\\Models\\User', 1340),
(3, 'App\\Models\\User', 1341),
(3, 'App\\Models\\User', 1342),
(3, 'App\\Models\\User', 1343),
(3, 'App\\Models\\User', 1344),
(3, 'App\\Models\\User', 1345),
(3, 'App\\Models\\User', 1346),
(3, 'App\\Models\\User', 1347),
(3, 'App\\Models\\User', 1348),
(3, 'App\\Models\\User', 1349),
(3, 'App\\Models\\User', 1353),
(3, 'App\\Models\\User', 1354),
(3, 'App\\Models\\User', 1355),
(3, 'App\\Models\\User', 1356),
(3, 'App\\Models\\User', 1357),
(3, 'App\\Models\\User', 1358),
(3, 'App\\Models\\User', 1359),
(3, 'App\\Models\\User', 1360),
(3, 'App\\Models\\User', 1361),
(3, 'App\\Models\\User', 1362),
(3, 'App\\Models\\User', 1363),
(3, 'App\\Models\\User', 1366),
(3, 'App\\Models\\User', 1367),
(3, 'App\\Models\\User', 1369),
(3, 'App\\Models\\User', 1370),
(3, 'App\\Models\\User', 1371),
(3, 'App\\Models\\User', 1372),
(3, 'App\\Models\\User', 1373),
(3, 'App\\Models\\User', 1374),
(3, 'App\\Models\\User', 1375),
(3, 'App\\Models\\User', 1376),
(3, 'App\\Models\\User', 1377),
(3, 'App\\Models\\User', 1378),
(3, 'App\\Models\\User', 1379),
(3, 'App\\Models\\User', 1380),
(3, 'App\\Models\\User', 1381),
(3, 'App\\Models\\User', 1382),
(3, 'App\\Models\\User', 1383),
(3, 'App\\Models\\User', 1384),
(3, 'App\\Models\\User', 1385),
(3, 'App\\Models\\User', 1386),
(3, 'App\\Models\\User', 1387),
(3, 'App\\Models\\User', 1388),
(3, 'App\\Models\\User', 1389),
(3, 'App\\Models\\User', 1390),
(3, 'App\\Models\\User', 1391),
(3, 'App\\Models\\User', 1392),
(3, 'App\\Models\\User', 1393),
(3, 'App\\Models\\User', 1394),
(3, 'App\\Models\\User', 1395),
(3, 'App\\Models\\User', 1396),
(3, 'App\\Models\\User', 1397),
(3, 'App\\Models\\User', 1398),
(3, 'App\\Models\\User', 1399),
(3, 'App\\Models\\User', 1400),
(3, 'App\\Models\\User', 1401),
(3, 'App\\Models\\User', 1402),
(3, 'App\\Models\\User', 1403),
(3, 'App\\Models\\User', 1404),
(3, 'App\\Models\\User', 1405),
(3, 'App\\Models\\User', 1406),
(3, 'App\\Models\\User', 1407),
(3, 'App\\Models\\User', 1408),
(3, 'App\\Models\\User', 1409),
(3, 'App\\Models\\User', 1410),
(3, 'App\\Models\\User', 1411),
(3, 'App\\Models\\User', 1412),
(3, 'App\\Models\\User', 1413),
(3, 'App\\Models\\User', 1414),
(3, 'App\\Models\\User', 1415),
(3, 'App\\Models\\User', 1416),
(3, 'App\\Models\\User', 1417),
(3, 'App\\Models\\User', 1418),
(3, 'App\\Models\\User', 1419),
(3, 'App\\Models\\User', 1420),
(3, 'App\\Models\\User', 1421),
(3, 'App\\Models\\User', 1422),
(3, 'App\\Models\\User', 1423),
(3, 'App\\Models\\User', 1424),
(3, 'App\\Models\\User', 1425),
(3, 'App\\Models\\User', 1426),
(3, 'App\\Models\\User', 1427),
(3, 'App\\Models\\User', 1428),
(3, 'App\\Models\\User', 1429),
(3, 'App\\Models\\User', 1430),
(3, 'App\\Models\\User', 1431),
(3, 'App\\Models\\User', 1432),
(3, 'App\\Models\\User', 1433),
(3, 'App\\Models\\User', 1434),
(3, 'App\\Models\\User', 1435),
(3, 'App\\Models\\User', 1436),
(3, 'App\\Models\\User', 1437),
(3, 'App\\Models\\User', 1438),
(3, 'App\\Models\\User', 1439),
(3, 'App\\Models\\User', 1440),
(3, 'App\\Models\\User', 1441),
(3, 'App\\Models\\User', 1442),
(3, 'App\\Models\\User', 1443),
(3, 'App\\Models\\User', 1444),
(3, 'App\\Models\\User', 1445),
(3, 'App\\Models\\User', 1446),
(3, 'App\\Models\\User', 1447),
(3, 'App\\Models\\User', 1448),
(3, 'App\\Models\\User', 1449),
(3, 'App\\Models\\User', 1450),
(3, 'App\\Models\\User', 1451),
(3, 'App\\Models\\User', 1452),
(3, 'App\\Models\\User', 1453),
(3, 'App\\Models\\User', 1454),
(3, 'App\\Models\\User', 1455),
(3, 'App\\Models\\User', 1456),
(3, 'App\\Models\\User', 1457),
(3, 'App\\Models\\User', 1458),
(3, 'App\\Models\\User', 1459),
(3, 'App\\Models\\User', 1460),
(3, 'App\\Models\\User', 1461),
(3, 'App\\Models\\User', 1462),
(3, 'App\\Models\\User', 1463),
(3, 'App\\Models\\User', 1464),
(3, 'App\\Models\\User', 1465),
(3, 'App\\Models\\User', 1466),
(3, 'App\\Models\\User', 1467),
(3, 'App\\Models\\User', 1468),
(3, 'App\\Models\\User', 1469),
(3, 'App\\Models\\User', 1470),
(3, 'App\\Models\\User', 1471),
(3, 'App\\Models\\User', 1472),
(3, 'App\\Models\\User', 1473),
(3, 'App\\Models\\User', 1474),
(3, 'App\\Models\\User', 1475),
(3, 'App\\Models\\User', 1476),
(3, 'App\\Models\\User', 1477),
(3, 'App\\Models\\User', 1478),
(3, 'App\\Models\\User', 1479),
(3, 'App\\Models\\User', 1480),
(3, 'App\\Models\\User', 1481),
(3, 'App\\Models\\User', 1482),
(3, 'App\\Models\\User', 1483),
(3, 'App\\Models\\User', 1484),
(3, 'App\\Models\\User', 1485),
(3, 'App\\Models\\User', 1486),
(3, 'App\\Models\\User', 1487),
(3, 'App\\Models\\User', 1488),
(3, 'App\\Models\\User', 1489),
(3, 'App\\Models\\User', 1490),
(3, 'App\\Models\\User', 1491),
(3, 'App\\Models\\User', 1492),
(3, 'App\\Models\\User', 1493),
(3, 'App\\Models\\User', 1494),
(3, 'App\\Models\\User', 1495),
(3, 'App\\Models\\User', 1496),
(3, 'App\\Models\\User', 1497),
(3, 'App\\Models\\User', 1498),
(3, 'App\\Models\\User', 1499),
(3, 'App\\Models\\User', 1500),
(3, 'App\\Models\\User', 1501),
(3, 'App\\Models\\User', 1502),
(3, 'App\\Models\\User', 1503),
(3, 'App\\Models\\User', 1504),
(3, 'App\\Models\\User', 1505),
(3, 'App\\Models\\User', 1506),
(3, 'App\\Models\\User', 1507),
(3, 'App\\Models\\User', 1508),
(3, 'App\\Models\\User', 1509),
(3, 'App\\Models\\User', 1510),
(3, 'App\\Models\\User', 1511),
(3, 'App\\Models\\User', 1512),
(3, 'App\\Models\\User', 1513),
(3, 'App\\Models\\User', 1514),
(3, 'App\\Models\\User', 1515),
(3, 'App\\Models\\User', 1516),
(3, 'App\\Models\\User', 1517),
(3, 'App\\Models\\User', 1518),
(3, 'App\\Models\\User', 1519),
(3, 'App\\Models\\User', 1520),
(3, 'App\\Models\\User', 1521),
(3, 'App\\Models\\User', 1522),
(3, 'App\\Models\\User', 1523),
(3, 'App\\Models\\User', 1524),
(3, 'App\\Models\\User', 1525),
(3, 'App\\Models\\User', 1526),
(3, 'App\\Models\\User', 1527),
(3, 'App\\Models\\User', 1528),
(3, 'App\\Models\\User', 1531),
(3, 'App\\Models\\User', 1532),
(3, 'App\\Models\\User', 1533),
(4, 'App\\Models\\User', 1529),
(4, 'App\\Models\\User', 1530);

-- --------------------------------------------------------

--
-- Table structure for table `notifcations`
--

CREATE TABLE `notifcations` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `bill_id` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `url_of` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifcations`
--

INSERT INTO `notifcations` (`id`, `user_id`, `title`, `description`, `status`, `name`, `bill_id`, `date`, `url`, `url_of`, `created_at`, `updated_at`) VALUES
(1, '1532', 'Balance Added', 'Your intrustpit account has been topped up successfully with amount $1100.', 1, 'Usama Fiaz', NULL, NULL, NULL, NULL, '2024-09-04 04:19:39', '2024-09-04 04:30:56'),
(2, '1532', 'Bill Approved', 'Your Bill # 1 with $926 amount has been added on 09/04/2024 by Laravel.', 0, 'Usama', '1', NULL, NULL, NULL, '2024-09-04 04:20:38', '2024-09-04 04:32:09'),
(3, '7', 'Bill Added', 'Bill # 2 with $3 amount has been added by Usama on 09/04/2024.', 0, 'Usama', '2', NULL, NULL, NULL, '2024-09-04 04:22:09', '2024-09-04 04:22:09'),
(4, '1532', 'Bill Added', 'Your Bill # 2 with $3 amount has been added on 09/04/2024.', 0, 'Usama', '2', NULL, NULL, NULL, '2024-09-04 04:22:09', '2024-09-04 04:32:03'),
(5, '7', 'New User', 'ludehory Zimmerman has registered with Intrustpit.', 0, 'ludehory', NULL, NULL, NULL, NULL, '2024-09-04 04:23:11', '2024-09-04 04:23:11'),
(6, '1532', 'Balance Added', 'Your intrustpit account has been topped up successfully with amount $73.', 0, 'Charles Spence Stephens', NULL, NULL, NULL, NULL, '2024-09-04 04:33:08', '2024-09-04 04:33:08'),
(7, '1532', 'Partically approved', 'Your Bill # 2 with $3 amount added on 09/04/2024 has been partically approved with amount $1.', 0, 'Charles Spence', '2', NULL, NULL, NULL, '2024-09-04 04:41:44', '2024-09-04 04:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payee_list`
--

CREATE TABLE `payee_list` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payee_list`
--

INSERT INTO `payee_list` (`id`, `name`, `address1`, `address2`, `city`, `state`, `zip_code`, `created_at`, `updated_at`) VALUES
(1, 'Con Edison', 'P.O Box 1702', NULL, 'New York', 'NY', '10116-1702', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(2, 'Trusted Surplus', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(3, 'Lakeview Loan Servicing, LLC', 'PO Box 37628', NULL, 'Philadelphia', 'PA', '19101-0628', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(4, 'Anthony Arce', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(5, 'Cardmember Service', 'PO BOX 1423 CHARLOTTE NC 28201-1423\"', NULL, 'Charlotte', 'NC', '28201-1423', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(6, 'SEFCU', '655 Patroon Creek', NULL, 'Albany', 'NY', '12206', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(7, 'NYC Water Board', 'PO Box 11863', NULL, 'Newark', 'NJ', '07101-8163', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(8, 'ADT Security Servcies', 'PO Box 650485', NULL, 'Dallas', 'TX', '75265-0485', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(9, 'Citi Card', 'PO BOX 70166', NULL, 'Philadelphia', 'PA', '19176-0166', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(10, 'Verizon', 'PO Box 15124', NULL, 'Albany', 'NY', '12212-5124', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(11, 'T-Mobile', 'PO Box 742596', NULL, 'Cincinnati', 'OH', '45274-2596', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(12, 'AT&T Mobility', 'PO Box 537104 Atlanta GA 30353-7104\"', NULL, 'Atlanta', 'GA', '30353-7104', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(13, 'Nancy Rowe', '125 East Broadway Apt 407', NULL, 'Long Beach', 'NY', '11561', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(14, 'Discover', 'P.O. Box 70176', NULL, 'Philadelphia', 'PA', '19176-0176', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(15, 'Bank of America', 'PO BOX 17232 Wilmigton DE 19850-7232\"', NULL, 'Wilmington', 'DE', '19850-7232', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(16, 'Spectrum', 'PO Box 7186', NULL, 'Pasadena', 'CA', '91109-7186', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(17, 'NYSEG', 'P.O Box 847812', NULL, 'Boston', 'MA', '02284-7812', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(18, 'Capital One', 'PO BOX 6492 Carol Stream IL 60197-6492\"', NULL, 'Carol Stream', 'IL', '60197-6492', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(19, 'Macy\'s - American Express Account', 'PO Box 71361', NULL, 'Philadelphia', 'PA', '19176-7361', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(20, 'Home Depot Credit Services', 'PO Box 70600', NULL, 'Philadelphia ', 'PA', '19176-0600', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(21, 'New York City Housing Authority', 'P.O. Box 70169', NULL, 'Philadelphia', 'PA', '19176-0169', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(22, 'NYC Department of Finance', 'P.O. Box 680', NULL, 'Newark ', 'NJ', '07101-0680', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(23, 'Narragansett Bay Insurance Company', 'Dept # 3051', 'PO Box 11407', 'Birmingham', 'AL', '35246-3051', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(24, 'Maura Basile', '436 Madison Avenue', NULL, 'West Hempstead', 'NY', '11552', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(25, 'Optimum', 'PO Box 70340', NULL, 'Philadelphia', 'PA', '19176', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(26, '1485 E. 16 Street Company LLC', '5318 New Utrecht Ave', NULL, 'Brooklyn', 'NY', '11219', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(27, 'Universal 13 Group LLC', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(28, 'Dawn Townley', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(29, 'Consumer Cellular', 'P.O. Box 371890', NULL, 'Pittsburgh', 'PA', '15250-7890', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(30, 'Lydia Vazquez', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(31, 'AARP Life Insurance Program', 'PO Box 30711', NULL, 'Tampa', 'FL', '33630-3711', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(32, 'KINGS BAY HOUSING CO.INC.', 'GPO BOX 5651', NULL, 'New York', 'NY', '10087-5651', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(33, 'K.P. Realty, LLC', 'C/O Metropolitan Property Services', '141-50 85th Road', 'Briarwood', 'NY', '11435', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(34, 'Allstate Insurance Company', 'P.O. Box 4310 Carol Stream IL 60197-4310\"', NULL, 'Carol Stream', 'IL', '60197-4310', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(35, 'Wells Fargo - CA', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(36, 'RCN', 'PO Box 11816', NULL, 'Newark', 'NY', '07101-8116', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(37, 'PSEG Long Island', 'PO Box 9050', NULL, 'Hicksville', 'NY', '11802-9050', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(38, 'Mount Sinai Marathon Medical', 'Attn #24353N', 'PO Box 14000', 'Belfast', 'ME', '04915-4033', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(39, 'Town & Country Energy Corp', '439 Rutledgedale Road', NULL, 'Equinunk', 'PA', '18417-3010', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(40, 'Globe Life Insurance Company of New York', 'PO Box 653029', NULL, 'Dallas', 'TX', '75265-3029', '2023-03-31 12:56:39', '2023-03-31 12:56:39'),
(41, 'Hebrew Home Housing Development', 'PO Box 415709 Boston MA 02241-5709\"', NULL, 'Boston', 'MA', '02241-5709', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(42, 'Jenkins Portfolio Companies LLC', 'ATTN: Property Management Office', '2574 Adam Clayton Powell Jr. Blvd', 'New York', 'NY', '10039', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(43, 'Ahi Ezer Kings Highway Housing Dev', '1879 East 3rd Street', NULL, 'Brooklyn', 'NY', '11223', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(44, '853 Empire Blvd Associates', '104 S. Central Ave Suite 10', NULL, 'Valley Stream', 'NY', '11580', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(45, 'Nelly Rudman', '601-B Surf Avenue, Apt 22K', NULL, 'Brooklyn', 'NY', '11224', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(46, 'Bryant Huczko', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(47, 'Mayflower Terrace', 'P.O. Box 318', NULL, 'Emerson', 'NY', '7630', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(48, 'SilverBills', '1333A North Avenue Suite 332', NULL, 'New Rochelle', 'NY', '10804', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(49, 'Navesink', '34 Main Street', NULL, 'Holmdel', 'NJ', '07733-2105', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(50, 'Eugene Dozortsev', '65 Oriental Blvd Apt 11F', NULL, 'Brooklyn', 'NY', '11235', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(51, 'Paul Stack', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(52, 'Daily News', 'PO Box 9001093', NULL, 'Louiseville', 'KY', '40290-1093', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(53, 'Renaissance Equity LLC', 'PO Box 6282', NULL, 'Hicksville', 'NY', '11802-6282', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(54, 'Mr Cooper', 'P.O. Box 60516', NULL, 'City of Industry', 'CA', '91716-0516', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(55, 'Comenity-My BJ\'s Perks Mastercard', 'PO BOX 650113', NULL, 'Dallas', 'TX', '75265-0113', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(56, 'The New York Times', 'PO BOX 371456', NULL, 'Pittsburgh', 'PA', '15250-7456', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(57, 'L.L. Bean Mastercard', 'PO BOX 70603', NULL, 'Philadelphia', 'PA', '19176-0603', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(58, 'Richard Hare', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(59, 'Chammattie Dyal', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(60, '23-50 Waters Edge LLC', '141-50 85th Road', NULL, 'Briarwood', 'NY', '11435', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(61, 'Visa', 'PO Box 37603', NULL, 'Philadelphia', 'PA', '19101-0603', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(62, 'AT&T Mobility - IL', 'PO BOX 6416 Carol Stream IL 60197-6416\"', NULL, 'Carol Stream', 'IL', '60197-6416', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(63, 'PN Fire & Burglar Alarm Company', '31 North Street', NULL, 'Monticello', 'NY', '12701', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(64, '2121 Paulding LLC', 'c/o GJONAJ Management LLC PO BOX 09', NULL, 'Yonkers', 'NY', '10704', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(65, 'TWC AMA Crestwood Sec. Three', '90 Beaumont Circle', NULL, 'Yonkers', 'NY', '10710', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(66, 'Trump Village Section 4 Inc', '2928 West 5th Street', NULL, 'Brooklyn', 'NY', '11224', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(67, 'Albert Flores', '16 Caro Street', NULL, 'Staten Island', 'NY', '10314', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(68, 'Skaggs-Walsh', '119-02 23 Avenue', NULL, 'College Point', 'NY', '11356', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(69, 'Riva Barash', '734 Montgomery Street', NULL, 'Brooklyn', 'NY', '11213', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(70, 'Signature', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(71, 'Elder Healthcare', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(72, 'Mary Sampson', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(73, 'Mary Sampson', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(74, 'PSEG - 9050', 'PO Box 9050', NULL, 'Hicksville', 'NY', '11802-9050', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(75, 'Travelers Personal Insurance', 'P.O. BOX 660307', NULL, 'Dallas', 'TX', '75266-0307', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(76, 'NYU Grossman School of Medicine', 'Faculty Group Practice ', 'PO BOX 415662', 'Boston', 'MA', '2241', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(77, 'Brightwater Towers Condominium', 'PO Box 335', NULL, 'Emerson', 'NY', '7630', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(78, 'Brittany Mitchel', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(79, 'Jessica Stephens', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(80, 'Honda Financial Services', 'P.O. Box 7829', NULL, 'Philadelphia', 'PA', '19101-7829', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(81, 'The Bristal at North Hills', '99 South Service Road', NULL, 'North Hills', 'NY', '11040', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(82, 'PrePlan', 'P.O. Box 12456', NULL, 'Albany', 'NY', '12212', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(83, 'Monika Kundra', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(84, 'Avi Tempelman', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(85, 'L&M Lawn Care And Maintenance Inc', 'P.O. Box 140638', NULL, 'Staten Island', 'NY', '10314', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(86, 'Orange & Rockland', 'P.O. Box 1005', NULL, 'Spring Valley', 'NY', '10977', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(87, 'Town N Harbor Owners Corp - NY', '538 Broad Hollow Road, 3rd Fl', NULL, 'Melville', 'NY', '11747', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(88, 'Matthew Sullivan', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(89, 'Traci Miranda', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(90, 'The Hartford', 'PO Box 660912', NULL, 'Dallas', 'TX', '75266-0912', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(91, 'North Shore University Hospital', 'P.O. Box 4324', NULL, 'Plainview', 'NY', '11030', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(92, 'MTG Designs Group. INC', '50 Washington Ave.', NULL, 'Garden City', 'NY', '11530', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(93, 'Sundale Building Co', '1261 39th Street, 3rd Fl', NULL, 'Brooklyn', 'NY', '11218', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(94, 'American Express', 'PO Box 1270 ', NULL, 'Newark', 'NJ', '07101-1270', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(95, 'Arlene Kluck', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(96, 'Caliber Home Loans', 'P.O. Box 650856', NULL, 'Dallas', 'TX', '75265-0856', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(97, 'Aveonis Condominium', 'PO BOX 306', NULL, 'Red Hook', 'NY', '12571', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(98, 'M&T Bank', 'PO BOX 62182', NULL, 'Baltimore', 'MD', '21264-2182', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(99, 'Carnegie East House', 'c/o Christeena Baksh', '1844 Second Ave', 'New York', 'NY', '10128', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(100, 'Verizon', 'PO Box 489', NULL, 'Newark', 'NJ', '07101-0489', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(101, 'S&R Management', 'P. O . B   313 Parkville St', NULL, 'Brooklyn', 'NY', '11204', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(102, 'Bank of America', 'PO Box 15019', NULL, 'Wilmington', 'DE', '19886-5019', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(103, 'Town N Harbor Owners Corp', 'PO Box 30338', NULL, 'Tampa', 'FL', '33630', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(104, 'Bankers Conseco Life', 'PO BOX 371854', NULL, 'Pittsburgh', 'PA', '15250-7854', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(105, 'Amber Court of Smithtown', '130 Lake Ave South ', NULL, 'Nesconset', 'NY', '11767', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(106, 'Clervil Buissereth', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(107, 'Joseph & Jenn McVey', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(108, 'Orfanos Irrvcble Trust', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(109, 'Harborview', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(110, 'Paul Nacimento', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(111, 'Universal', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(112, 'Universal 13 Group', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(113, 'Zofia Janczewski', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(114, 'First National Bank of Omaha', 'PO Box 2557', NULL, 'Omaha', 'NE', '68103-2557', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(115, 'Elbee Gardens Housing LP', 'P.O BOX 30361', NULL, 'Tampa', 'FL', '33630', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(116, 'Self Portfolio Servicing Inc.', 'P.O.BOX 65250', NULL, 'Salt Lake City', 'UT', '84165-0250', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(117, 'Columbian Financial Group', 'P.O BOX 1381', NULL, 'Birmingham', 'NY', '13902-1381', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(118, 'Harbor View Senior', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(119, 'Universal 13', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(120, 'Discover', 'PO Box 6103', NULL, 'Carol Stream', 'IL', '60197-6103', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(121, 'Natanya Duncan', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(122, 'Verizon', 'PO Box 408', NULL, 'Newark', 'NJ', '07101-0408', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(123, 'Future Pharmacy', '2480 65th Street', NULL, 'Brooklyn', 'NY', '11204-4150', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(124, 'Nationwide', 'PO BOX 13958', NULL, 'Philadelphia', 'PA', '19101-3958', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(125, 'Eric Brooks', '57 Shepherd Street', NULL, 'Rockville Centre', 'NY', '11570', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(126, 'Harbor View Senior Res', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(127, 'Stanley Avenue Preservation LLC', 'P.O. Box 25098', NULL, 'Tampa', 'FL', '33622', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(128, 'Hyundai Motor Finance', 'PO Box 660891', NULL, 'Dallas', 'TX', '75266-0891', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(129, 'Jeanine C. Driscoll Receiver of Taxes', 'PO Box 9000', NULL, 'Hempstead', 'NY', '11551-9000', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(130, 'Chase', 'PO BOX 78420', NULL, 'Phoenix', 'AZ', '85062-8420', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(131, 'Annemarys Dominguez', '64b East 11th St', NULL, 'Clifton', 'NJ', '7011', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(132, 'Wells Fargo', 'PO Box 105632', NULL, 'Atlanta', 'GA', '30348', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(133, 'Nissan Motor Acceptance Corporation', 'PO Box 740596', NULL, 'Cincinnati', 'OH', '45274-0596', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(134, 'Congregation Kneseth Israel', '728 Empire Ave', NULL, 'Far Rockaway', 'NY', '11691', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(135, 'Marshall Oil Co., Inc.', '130 Salem Road', NULL, 'Pound Ridge', 'NY', '10576-1529', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(136, 'Chase Home Lending', 'PO Box 78420', NULL, 'Phoenix', 'AZ', '85062-8420', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(137, 'ADT Security Services', 'PO Box 371878', NULL, 'Pittsburgh', 'PA', '15250', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(138, 'State Farm Insurance Company', 'PO Box 588002', NULL, 'North Metro', 'GA', '30029-8002', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(139, '156 Broadway Associates LLC', 'PO BOX 97', NULL, 'Emerson', 'NJ', '7630', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(140, 'Ephraim Tempelman', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(141, 'Estella Jackson Bernar', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(142, 'T.F.I.G.T.', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(143, 'Lindsay Park Housing Corp.', '202 Union Ave., Ste H', NULL, 'Brooklyn', 'NY', '11211-7467', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(144, 'The Sentinel at Rockland', '200 Rella Blvd.', NULL, 'Montebello', 'NY', '10901', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(145, 'City of Yonkers', 'Dept #116021', 'PO Box 5211', 'Binhamton', 'NY', '13902-5211', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(146, 'Town of Bedford Water Districts', '425 Cherry Street', NULL, 'Bedford Hills', 'NY', '10507', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(147, 'TD Bank', 'PO Box 100290', NULL, 'Columbia', 'SC', '29202-3290', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(148, 'Trusted surplus', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(149, 'Optimum', 'PO Box 70340', NULL, 'Philadelphia', 'PA', '19176-0340', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(150, 'PSEG', 'PO Box 888', NULL, 'Hicksville', 'NY', '11802-0888', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(151, 'Djo Srour', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(152, 'The Bristal at Westbury', '117 Post Avenue', NULL, 'Westbury', 'NY', '11590', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(153, 'Amber Court Assisted', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(154, 'Mona Gooding', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(155, 'Rambeer Sankar', '97-08 222nd Street', NULL, 'Queens Village', 'NY', '11429', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(156, 'PNC Bank', 'PO Box 771021', NULL, 'Chicago', 'IL', '60677-1021', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(157, 'Madison York', '61-80 Woodhaven Blvd.', NULL, 'Rego Park', 'NY', '11374-2742', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(158, 'Desiree Peterson', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(159, 'Orlin & Cohen Specialists Group', 'PO Box 28372', NULL, 'New York', 'NY', '10087-8372', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(160, 'Premium Services', 'PO Box 2759', NULL, 'Omaha', 'NE', '68103-2759', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(161, 'Merrick Bank', 'PO Box 660702', NULL, 'Dallas', 'TX', '75266-0702', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(162, 'Nationwide', '2697 N. Jerusalem Road', NULL, 'East Meadow', 'NY', '11554', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(163, 'West Farms Square LLC', '1 West Farms Square Plaza', NULL, 'Bronx', 'NY', '10460', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(164, 'Castle RVP INC.', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(165, 'Joanne Resvito', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(166, 'Michele Agazzi', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(167, 'Carlanne DeFedele', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(168, 'Comcast', 'PO Box 70219', NULL, 'Philadelphia', 'PA', '19176-0219', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(169, 'Geico', 'PO Box 70776', NULL, 'Philadelphia', 'PA', '19176-0776', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(170, 'Josephine Denicola', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(171, 'Mr. Cooper', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(172, 'New Montefiore Cemetery', 'PO Box 130', NULL, 'Farmingdale', 'NY', '11735-0130', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(173, 'Amber Court Assisted Living', '3400 Brush Hollow Road', NULL, 'Westbury', 'NY', '11590', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(174, 'Mr. Cooper', 'PO Box 650783', NULL, 'Dallas', 'TX', '75265-0783', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(175, 'Eagle 1666 Holdings, LLC', '1670 Old Country Road, Suite 227', NULL, 'Plainview', 'NY', '11803', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(176, 'M&M Management', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(177, 'National Grid - ACH', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(178, 'Marcus Garvey Preservation', 'PO Box 25098', NULL, 'Tampa', 'FL', '33622', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(179, 'Atria Hertlin Place', 'PO Box 827643', NULL, 'Philadelphia', 'PA', '19182-7643', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(180, 'Shirley & Noel Schall', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(181, 'Amalgamated Warbasse Houses Inc.', '2800 West 5th Street', NULL, 'Brooklyn', 'NY', '11224', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(182, 'Internal Revenue Service', 'PO Box 931100', NULL, 'Louisville', 'KY', '40293-1000', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(183, 'Good Medical Care', '672 Dogwood Avenue, Ste 398', NULL, 'Franklin Square', 'NY', '11010-3247', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(184, 'Elm York Home', '100-30 Ditmars Blvd', NULL, 'East Elmhurst', 'NY', '11369-1333', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(185, 'Capital One', 'PO Box 4069', NULL, 'Carol Stream', 'IL', '60197-4069', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(186, 'Harbor Hill Apartments', '5613 2nd Avenue', NULL, 'Brooklyn', 'NY', '11220', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(187, 'HarborView', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(188, 'Lynne Cassouto', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(189, 'Marine Park Condominium Association', '4123 Ave V', NULL, 'Brooklyn', 'NY', '11234', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(190, 'Kathleen Hearn Giasi', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(191, 'Queens Fresh Meadows', 'PO Box 6040', NULL, 'Hicksville', 'NY', '11802-6040', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(192, 'City of Long Beach Water Fund', 'PO Box 719', NULL, 'Long Beach', 'NY', '11561', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(193, 'Sylvia Weiderman', 'c/o Blaivas', '40 Stevens Place', 'Lawrence', 'NY', '11559', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(194, '1893 Andrews LLC', 'PO Box 605', NULL, 'Pomona', 'NY', '10970', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(195, 'Kirso Properties', 'PO Box 445', 'St. George Station', 'Staten Island', 'NY', '10301', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(196, 'Seward Park Housing Corp.', 'c/o Charles H Greenthal Mgmt', 'PO Box 348', 'Emerson', 'NJ', '7630', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(197, 'Juana Nunez', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(198, 'Samuel Tropper', '1725 East 3rd Street', NULL, 'Brooklyn', 'NY', '11223', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(199, 'Joseph Lichtenstein', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(200, 'Tu Tu Cares', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(201, 'US Bank', 'PO Box 790117', NULL, 'St. Louis', 'MO', '63179-0117', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(202, 'Maria Diaz', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(203, 'Five Star - Yonkers', 'Attn: Business Office', '537 Riverdale Ave', 'Yonkers', 'NY', '10705', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(204, 'Bujar Huseinoski', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(205, 'Victor Mendieta', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(206, 'Faigy Lowinger', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(207, 'Lively', 'PO Box 660688', NULL, 'Dallas', 'TX', '75266-0688', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(208, 'Arverne Limited - Profit Housing Corp', 'PO Box 319', NULL, 'Emerson', 'NJ', '7630', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(209, 'David Baumel', '1766 54th Street', NULL, 'Brooklyn', 'NY', '11204', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(210, 'Lincoln Coop Apts, Inc.', 'PO Box 352', NULL, 'Emerson', 'NJ', '7630', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(211, 'Cigna', 'PO Box 747102', NULL, 'Pittsburgh', 'PA', '15274-7102', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(212, 'Mr. Drezdner', '1814 53rd St', NULL, 'Brooklyn', 'NY', '11204', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(213, 'The Waterford on the Bay', '2900 Bragg St', NULL, 'Brooklyn', 'NY', '11235', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(214, 'Sue Harper', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(215, 'Signature Senior Living', '631 Foster Avenue', NULL, 'Brooklyn', 'NY', '11230', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(216, 'Elm York', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(217, 'Michael Perez', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(218, 'The Palm Gardens Center for Nursing and Rehab', 'ATTN: Akiva Gonter', '615 Ave C', 'Brooklyn', 'NY', '11218-4101', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(219, 'Elizabeth Giglia', '123 Clubhouse Drive', NULL, 'Copaigne', 'NY', '11726', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(220, 'Kenilworth Equities, LTD', 'PO Box 12532', NULL, 'Newark', 'NJ', '7101', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(221, 'Rosa Stella', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(222, 'AKAM Associates', 'PO Box 355', NULL, 'Emerson', 'NY', '7630', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(223, 'Newsday', 'PO Box 371870', NULL, 'Pittsburgh', 'PA', '15250-7870', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(224, 'Rosario Concepcion', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(225, 'Cal Automotive', 'PO Box 824929', NULL, 'Philadelphia', 'PA', '19182-4929', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(226, '80 Woodruff Ave LLC', '1065 Avenue of the Americas, 31st Floor', NULL, 'New York', 'NY', '10018', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(227, 'Eliahu Tornheim', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(228, 'Waterview Towers, Inc.', 'Management Office', '2630 Cropsey Ave.', 'Brooklyn', 'NY', '11214', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(229, 'Mountain Valley Indemnity Company', 'PO Box 94572', NULL, 'Cleveland', 'OH', '44101-4572', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(230, 'Waterview Hills Rehab and Nursing Center', 'PO Box 257', NULL, 'Purdys', 'NY', '10578-0257', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(231, 'Town of Killington', 'PO Box 429', NULL, 'Killington', 'VT', '5751', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(232, 'Sol Klapholtz', '1166 Brunswick Ave', NULL, 'Far Rockaway', 'NY', '11691', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(233, 'Keyser Energy', 'PO Box 400', NULL, 'Rutland', 'VT', '5702', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(234, 'Uniondale W.D.', 'Department of Water, Town of Hempstead', '1995 Prospect Ave', 'East Meadow', 'NY', '11554-3100', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(235, 'United Healthcare', 'PO Box 371337', NULL, 'Pittsburgh', 'PA', '15250-7337', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(236, 'Peru Leasing', 'Lefrak City', 'PO Box 30423', 'Tampa', 'FL', '33630-3423', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(237, 'Josephine DeChicchio', '37 Oregon Road', NULL, 'Staten Island', 'NY', '10305', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(238, 'Amber Court', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(239, 'Francis S. Bruno', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(240, 'Sidney Levine', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(241, 'Midland Manor Condominium', '1304 Midland Ave, Suite #1A', NULL, 'Yonkers', 'NY', '10704', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(242, 'MHC Realty Associates, LLC', '2360 Route 9, Suite 3-#309', NULL, 'Toms River', 'NJ', '08755-1933', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(243, 'Hillary Licorish', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(244, 'The Glen At Maple Pointe', '260 Maple Ave.', NULL, 'Rockville Centre', 'NY', '11570', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(245, 'Uptown Realty UNLTD', '2207 Coney Island Ave', NULL, 'Brooklyn', 'NY', '11223', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(246, 'Preferred Gold', '2357 60th St', NULL, 'Brooklyn', 'NY', '11204', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(247, 'North Shore Towers Apartments, Inc.', '27240 Grand Central Parkway', NULL, 'Floral Park', 'NY', '11005', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(248, 'Citi Card - PA', 'PO Box 70272', NULL, 'Philadelphia', 'PA', '19176-0272', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(249, 'Mary Donnelly', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(250, 'Wyckoff Heights', 'Patient Bill Processing Centre', 'PO Box 5257', 'New York', 'NY', '10008-5257', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(251, 'Senior Care, LLC', 'Attn: Menachem', '2636 Nostrand Ave.', 'Brooklyn', 'NY', '11210', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(252, '8718 Ridge Blvd, LLC ', 'C/o Jalen Management Company', 'PO Box 361', 'Emerson', 'NJ', '7630', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(253, 'Maimonides Medical Center', 'PO Box 412909', NULL, 'Boston', 'MA', '02241-2909', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(254, 'Gregory Panagopoulos', '92 Constitution Way', NULL, 'Morristown', 'NJ', '7960', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(255, 'Richard Shapiro', '132 Cables Ave.', NULL, 'Waterbury', 'CT', '6710', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(256, 'Jacques Barthelemy', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(257, 'Georgetown Village Condominium', '1980 Bergen Ave.', NULL, 'Brooklyn', 'NY', '11234', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(258, 'Atria South Setauket', 'PO Box 827643', NULL, 'Philadelphia', 'PA', '19182-7643', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(259, 'Synchonry Bank/Amazon', 'PO Box 960013', NULL, 'Orlando', 'FL', '32896-0013', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(260, 'Le Harve Owners Corp.', 'Metro Management', '1981 Marcus Ave., Suite C-131', 'Lake Success', 'NY', '11042', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(261, 'Woodruff 79, LLC', '26 Court St., Suite 2304', NULL, 'Brooklyn', 'NY', '11242', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(262, 'Citi Cards', 'PO Box 9001037', NULL, 'Louisville', 'KY', '40290-1037', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(263, 'Theodore Williams', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(264, 'Long Island Jewish Med CTR', 'PO Box 29849', NULL, 'New York', 'NY', '10087-9849', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(265, 'Jaqueline Hunter', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(266, 'Rochel Rosenberg', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(267, 'Jerome Mckoy', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(268, 'Division Housing Corp,', 'AR Dept: Rentals', 'PO Box 22127', 'Tampa', 'FL', '33622', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(269, 'Synchrony Bank', 'PO Box 960061', NULL, 'Orlando', 'FL', '32896-0061', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(270, '315 East 72 Street Owners, Inc.', 'Brown Harris Stevens', '770 Lexington Ave.', 'New York', 'NY', '10065', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(271, 'Donna Lewin', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(272, '1320 51st Street LLC', '1846 50th St.', NULL, 'Brooklyn', 'NY', '11204', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(273, '2325-2525 University Ave., LLC', '560 W 180th St., Suite 306', NULL, 'New York', 'NY', '10033', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(274, 'Geraldine Fitzhugh', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(275, 'Norma Sam-Francis', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(276, 'Member Insurance Program', 'PO Box 8646', NULL, 'Carol Stream', 'IL', '60197-8646', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(277, 'AT&T Universal Card', 'PO Box 70166', NULL, 'Philadelphia', 'PA', '19176-0166', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(278, 'Lollie Singleton', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(279, 'Malka Felberbaum', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(280, 'Lorraine Terrace Condominium', 'PO Box 349', NULL, 'Emerson', 'NJ', '7630', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(281, 'Jack Mosseri', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(282, 'Rushmore Loan Management Services', 'PO Box 514707', NULL, 'Los Angeles', 'CA', '90051-4707', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(283, 'Hilda Drew', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(284, 'Martha Watson', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(285, '141 Joralemon Manager LLC', 'PO Box 4103', NULL, 'Clifton', 'NJ', '7012', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(286, 'James Smith', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(287, '184 Clarkson Realty LLC ', '170 E Sunrise Highway', NULL, 'Valley Stream', 'NY', '11581-1312', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(288, '7401 Shore Road Owners Corp.', 'C/O Narrows Management', 'PO Box 253', 'Emerson', 'NJ', '7630', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(289, '820 Ocean Parkway Housing Corp', 'P.O. Box 140250', NULL, 'Brooklyn', 'NY', '11214', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(290, 'Maria I Escobed Rodrig', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(291, 'Signature Senior', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(292, 'Signature Senior Livin', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(293, 'Lucius Allen', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(294, 'Margaret Gangi', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(295, 'Richland Management', 'Attn Tracey', '10 Welwyn Rd', 'Great Neck', 'NY', '11021', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(296, 'Nathan Duncan', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(297, 'Northside Gardens Inc.', '1981 Marcus Ave., Suite C-131', NULL, 'Lake Success', 'NY', '11042', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(298, 'Kensington Insurance Company', '6 West 18th St, 11th Fl', NULL, 'New York', 'NY', '10011', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(299, 'Ocpard Enterprises', 'PO Box 301111', NULL, 'Brooklyn', 'NY', '11230', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(300, 'Integrity Social Work Services', 'PO Box 141065', NULL, 'Staten Island', 'NY', '10314-1065', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(301, 'MD Gardens Corp.', '2262 Stillwell Ave.', NULL, 'Brooklyn', 'NY', '11223', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(302, 'Louise Mondry', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(303, 'Esmerelda Chambers', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(304, 'Harbor View Home', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(305, 'Senior Helpers', '115 Newbridge Road', NULL, 'Hicksville', 'NY', '11801', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(306, 'Midland Mortgage', 'PO Box 268888', NULL, 'Oklahoma City', 'OK', '73126-8888', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(307, 'BRG Management', '711 Stewart Avenue, Suite 100', NULL, 'Garden City', 'NY', '11530', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(308, 'Striper 1 LLC', 'PO Box 1402', NULL, 'Bronx', 'NY', '10471', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(309, 'Cynthia Borgese', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(310, 'Sandra Rubin', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(311, 'W.D. Housing & Holdings LLC', '504 N. George St.', NULL, 'Rome', 'NY', '13440', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(312, 'Drucilla Shepherd', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(313, 'Country Door', '1112 7th Ave', NULL, 'Monroe', 'WI', '53566-1364', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(314, 'Liston Hendricks', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(315, 'Mark Jandreau', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(316, 'Liberty Utilities NY', 'PO Box 75463', NULL, 'Chicago', 'IL', '60675-5463', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(317, 'Frank Granito', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(318, 'Lake Shore', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(319, 'Jamaica Hospital Medical Center', '8900 VanWyck Expy', NULL, 'Jamaica', 'NY', '11418-2897', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(320, 'Wolf Weissman CPA', '450 Seventh Ave., Ste 909', NULL, 'New York', 'NY', '10123', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(321, 'Link Homecare', '103-15 101st St', NULL, 'Ozone Park', 'NY', '11417', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(322, 'Roslie Diamond', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(323, 'Rachel Levinas', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(324, 'Mindy Mahlstedt', '3592 Tonopah Street', NULL, 'Seaford', 'NY', '11783', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(325, 'West 74th St. Residence', '300 Amsterdam Ave', NULL, 'New York', 'NY', '10023', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(326, 'Iris Stern', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(327, 'Terezina Bilus', '45-25 Utopia Pkwy', NULL, 'Flushing', 'NY', '11358', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(328, 'Harbor View', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(329, 'Susanne Geisweller', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(330, 'Roman Aminov', '147-17 Union Turnpike', NULL, 'Flushing', 'NY', '11367', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(331, '24/7 Homecare Agency of NY, INC.', '2414 Ralph Ave.', NULL, 'Brooklyn', 'NY', '11234', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(332, 'Calliccon Co-Operative Insurance Company', 'PO Box 675', '15 Chapel St.', 'Jeffersonville', 'NY', '12748', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(333, 'Shop Smart', '2640 Nostrand Ave.', NULL, 'Brooklyn', 'NY', '11210', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(334, 'Aurea Gonzalez', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(335, 'Catholic Cemeteries', '80-01 Metropolitan Ave.', 'PO Box 59', 'Middle Village', 'NY', '11379', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(336, 'Marie Magny', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(337, 'Mary Abbatiello', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(338, 'Cornell Apartments LLC', '122 East 55th St, 3rd Fl', NULL, 'New York', 'NY', '10022', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(339, 'MetLife', 'PO Box 71110', NULL, 'Charlotte', 'NC', '28272-1110', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(340, 'Sandra Lewis', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(341, 'Amalgamated Housing Corp', '98 Van Cortlandt Park South', NULL, 'Bronx', 'NY', '10463', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(342, 'Ditmas Management Corp.-770', 'PO Box 30405', NULL, 'Tampa', 'FL', '33630', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(343, 'Dagmar Auguste', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(344, 'HOME DEPOT CREDIT CARD SERVICES', 'P.O  BOX 9001010', NULL, 'Louisville', 'KY', '40290-1010', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(345, 'Mount Sinai SN Hospital Physicians', 'PO Box 67078', NULL, 'Newark', 'NJ', '07101-8083', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(346, 'Annalisa Gaudio  Panagiotakis ', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(347, 'Estela Ortiz', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(348, 'Receiver of Taxes, Linda Harahan', '99 Tower Dr., Building A', NULL, 'Middletown', 'NY', '10941', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(349, 'Helen Lee', '2176 East 22nd St', NULL, 'Brooklyn', 'NY', '11229', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(350, 'Dillon Bennett', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(351, 'Ditmas Management Corp', 'Attn: Sue', '3333 NEW HYDE PARK ROAD SUITE 411', 'New Hyde Park', 'NY', '11042', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(352, 'Grace Granito', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(353, 'Judith Gurwitz', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(354, 'Zelda Statfeld', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(355, 'Jeanette Demarco', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(356, 'Truist', 'PO Box 65093', NULL, 'Baltimore', 'MD', '21264-5093', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(357, 'Long Beach Assisted Living', '274 W Broadway', NULL, 'Long Beach', 'NY', '11561-3911', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(358, 'Treasurer - City of Long Beach', '1 West Chester St.', NULL, 'Long Beach', 'NY', '11561-2038', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(359, 'Margaret Bitton', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(360, 'Robert Kimsey', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(361, 'Town of Bethel, Tax Collector', 'PO Box 561', NULL, 'White Lake', 'NY', '12786', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(362, 'Communi Life Inc.', '462 7th Avenue 3rd Floor ', NULL, 'New York', 'NY', '10018', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(363, 'Bay 44th Corp', '216 Bay 44th St', NULL, 'Brooklyn', 'NY', '11214', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(364, 'Elder Care', '626 RXR Plaza W Tower 6th Fl', NULL, 'Uniondale', 'NY', '11556', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(365, 'Annalisa Gaudio Panagi', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(366, 'Brian Mondry', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(367, 'Nathaniel Fonfa', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(368, 'Janine Toomer', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(369, 'Elder HCS LLC', 'PO Box 297-050', NULL, 'Brooklyn', 'NY', '11229', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(370, 'AB Hearing', '1570 52nd St.', NULL, 'Brooklyn', 'NY', '11219', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(371, 'American Education Services', 'PO Box 65093', NULL, 'Baltimore', 'MD', '21264-5093', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(372, 'Robyn Capraro', '204 Chester Heights Drive', NULL, 'Chester', 'NY', '10918', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(373, '1333 Realty LLC', 'PO Box 180307 Kensington Station', NULL, 'Brooklyn', 'NY', '11218-0307', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(374, 'Dish', 'PO Box 7203', NULL, 'Pasadena', 'CA', '91109-7303', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(375, 'Waterford', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(376, 'NYCHA Management Office', 'ATTN: Vladek', '365 Madison ST', 'New York', 'NY', '10002', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(377, 'TJX Rewards/SYNCB', 'PO Box 669819', NULL, 'Dallas', 'TX', '75266-0773', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(378, 'Rochdale Village Inc.', 'PO Box 70269', NULL, 'Philadelphia', 'PA', '19176-0269', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(379, 'TJH Medical Services', 'Lockbox 9639', 'PO Box 70280', 'Philadelphia', 'PA', '19176-0280', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(380, 'Donato R Pennella', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(381, 'Jacqueline Carthen', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(382, 'Marilyn Clark', 'PO Box 372 ', NULL, 'Sagaponack', 'NY', '11962', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(383, 'Solomon Orlander', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(384, 'Oneida Housing Authority', 'Attention Jesse', '226 Farrier Ave', 'Oneida', 'NY', '13421', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(385, 'Esplanade Staten Island LLC', '1415 Richmond Ave.', NULL, 'Staten Island', 'NY', '10314', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(386, 'Noah Aronin', '18 Fairfield Place', NULL, 'Yonkers', 'NY', '10705', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(387, 'Madison York ALC', '112-14 Corona Ave', NULL, 'Corona', 'NY', '11368-4095', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(388, 'Capitol Funeral Service of New York', '723 Coney Island Avenue ', NULL, 'Brooklyn', 'NY', '11218', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(389, 'Wells Fargo Card Services', 'PO Box 10347', NULL, 'Des Moines', 'IA', '50306', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(390, 'Ada Smith', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(391, 'Seventh Avenue', '1112 7th Ave.', NULL, 'Monroe', 'WI', '53566-1364', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(392, 'Cambridge Hall Tenants Corp', 'Akam Associates, INC', 'PO Box 335', 'Emerson', 'NJ', '7630', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(393, 'Payment Processing Center', 'PO Box 11733', NULL, 'Newark ', 'NJ', '07101-4733', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(394, 'Pauline Colton', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(395, 'Geraldine Shanks', '352 7th Street Apt 3R', NULL, 'Brooklyn', 'NY', '11215', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(396, 'Rachel Gancfried', NULL, NULL, NULL, 'NY', NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(397, 'Hillside Auto Repair', '15212 State Rt. 30', NULL, 'Malone', 'NY', '12953', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(398, 'Comenity - Sony Visa', 'PO Box 650969', NULL, 'Dallas', 'TX', '75265-0969', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(399, '29th St. Associates, LLC', 'PO Box 1847', NULL, 'Paramus', 'NJ', '7653', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(400, 'Barclays', 'PO Box 13337', NULL, 'Philadelphia', 'PA', '19101-3337', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(401, 'Josephine Denicol', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(402, 'Rosalie Diamond', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(403, 'ReadyRefresh', 'PO Box 856192', NULL, 'Louisville', 'KY', '40285-6192', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(404, 'Dish - IL', 'PO Box 94063', NULL, 'Palatine', 'IL', '60094-4063', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(405, 'Linda Magnus', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(406, 'Adama Mohamed', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(407, 'Matt Johnston', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(408, 'Mindy Felsenburg', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(409, 'Liam Shanks', '352 Seventh St, 2R', NULL, 'Brooklyn', 'NY', '11215', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(410, 'Synchrony Bank/JCP', 'POB 71719', NULL, 'Philadelphia', 'PA', '19176-1719', '2023-03-31 12:56:40', '2023-03-31 12:56:40');
INSERT INTO `payee_list` (`id`, `name`, `address1`, `address2`, `city`, `state`, `zip_code`, `created_at`, `updated_at`) VALUES
(411, 'Approved Oil/Empire', '6717 4th Ave', NULL, 'Brooklyn', 'NY', '11220', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(412, 'Farmers', 'PO Box 41753', NULL, 'Philadelphia', 'PA', '19101-1753 ', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(413, 'Lapree Zimmerman', '40 Richman Plaza, Apt 1E', NULL, 'Bronx', 'NY', '10453', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(414, 'Christian Cullen', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(415, 'Ocean Harbor Casualty Insurance', 'c/o Complex Coverage, Inc', '7 High Street, Suite 408', 'Huntington', 'NY', '11743-2298', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(416, 'Mayflower Owners Corp,', '% Orsid Realty Corp', 'PO Box 30418', 'Tampa', 'FL', '33630', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(417, 'Comenity - Jessica London', 'PO Box 650972', NULL, 'Dallas', 'TX', '75265-0972', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(418, 'Carewell Medical Associates PC', 'Attn: #14069Y', 'PO Box 14000', 'Belfast', 'ME', '04915-4033', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(419, 'Louise Scida', 'o 238-05 Braddock Ave., Apt 2R', NULL, 'Bellerose', 'NY', '11426', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(420, 'Woodlands Condominium Association', 'PO Box 30338', NULL, 'Tampa', 'FL', '33630', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(421, 'Cannon Heights Inc.', 'PO Box 5651', NULL, 'New York', 'NY', '10087-5651', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(422, 'Maidenbaum Property Tax Reduction Group LLC', 'PO Box 55994', NULL, 'Boston', 'MA', '02205-9729', '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(423, 'Jennifer Polanco', NULL, NULL, NULL, NULL, NULL, '2023-03-31 12:56:40', '2023-03-31 12:56:40'),
(435, 'Patricia', 'Polemeni', NULL, 'Brooklyn', 'NY', NULL, '2023-04-17 14:01:28', '2023-04-17 14:01:28'),
(436, 'Argyle Realty Co', 'C/O Management Office', '11226-6755', 'Brooklyn', 'NY', NULL, '2023-04-17 14:07:39', '2023-04-17 14:07:39'),
(437, 'Petro Home Services', 'PO Box 70282', '19176-0282', 'Philadelphia', 'PA', NULL, '2023-04-17 14:09:59', '2023-04-17 14:09:59'),
(438, 'Target Card Services', 'PO Box 660170', '75266-0170', 'Dallas', 'TX', NULL, '2023-04-18 15:12:10', '2023-04-18 15:12:10'),
(439, 'Brookdale Hospital Medical Center', 'Attn #11676M', '04915-4033', 'Belfast', 'ME', NULL, '2023-04-19 14:44:26', '2023-04-19 14:44:26'),
(440, 'Masseys', 'NA', 'NA', 'NA', 'NA', NULL, '2023-04-19 14:46:53', '2023-04-19 14:46:53'),
(441, 'Comenity - Jessica London', 'PO Box 650972', '75265-0972', 'Dallas', 'TX', NULL, '2023-04-19 14:49:40', '2023-04-19 14:49:40'),
(442, 'Stellar Management', '44 West 28th street', '10001', 'New York', 'NY', NULL, '2023-04-19 15:56:47', '2023-04-19 15:56:47'),
(443, 'City Medical of Upper East Side, PLLC', 'ATTN # 27757M', '04915-2062', 'Belfast', 'ME', NULL, '2023-04-20 14:28:34', '2023-04-20 14:28:34'),
(444, 'Michael A Williams', '65 Holland Ave, Apt 6H', '10303', 'Staten Island', 'NY', NULL, '2023-04-20 14:39:02', '2023-04-20 14:39:02'),
(445, 'Michelle Sharlette', '323 N Lake Street', '13421', 'Oneida', 'NY', NULL, '2023-04-24 16:16:23', '2023-04-24 16:16:23'),
(446, 'Lisa Tolliver', '57 Lorraine Terrace, Suite 232', '10553', 'Mount Vernon', 'NY', NULL, '2023-04-26 15:01:50', '2023-04-26 15:01:50'),
(447, 'Water Authority of Great Neck North', '50 Watermill Lane', '11021-4235', 'Great Neck', 'NY', NULL, '2023-04-26 15:08:46', '2023-04-26 15:08:46'),
(448, 'Kinway LLC', '271 Madison Ave, 22nd Fl', '10016', 'NY', 'NY', NULL, '2023-04-26 16:51:49', '2023-04-26 16:51:49'),
(449, 'Diane Hernandez', 'na', 'na', 'na', 'na', NULL, '2023-04-27 15:51:11', '2023-04-27 15:51:11'),
(450, 'Pulmonary Medicine and Sleep Disorder Association', '50 Rose Place Suite A', '11040', 'New Hyde Park', 'NY', NULL, '2023-04-28 15:01:41', '2023-04-28 15:01:41'),
(451, 'Sandra Gangadeen', 'na', 'na', 'na', 'na', NULL, '2023-04-28 15:20:27', '2023-04-28 15:20:27'),
(452, 'Neurological Associates of LI, PC', '1991 Marcus Ave, Suite 110', '11042-2058', 'Lake Success', 'NY', NULL, '2023-04-28 15:24:16', '2023-04-28 15:24:16'),
(453, 'Yismach Yisroel Trust', '59 Washington Ave.', NULL, 'NY', '10977', NULL, '2023-05-01 16:14:44', '2023-05-01 16:14:44'),
(454, 'Marie Avvento', 'na', 'na', 'na', 'na', NULL, '2023-05-02 14:48:49', '2023-05-02 14:48:49'),
(455, 'Pro Dental Care of NY', '841 Route 52, Suite 5', '12524', 'Fishkill', 'NY', NULL, '2023-05-02 15:02:34', '2023-05-02 15:02:34'),
(456, 'Debra Allen', 'na', 'na', 'na', 'na', NULL, '2023-05-03 15:52:23', '2023-05-03 15:52:23'),
(457, 'Palm Beach', 'na', 'na', 'na', 'na', NULL, '2023-05-03 17:09:59', '2023-05-03 17:09:59'),
(458, 'Marjorie Stewart', 'na', 'na', 'na', 'na', NULL, '2023-05-04 14:55:02', '2023-05-04 14:55:02'),
(459, 'IRS Kew Gardens Article 28', 'na', 'na', 'na', 'na', NULL, '2023-05-04 15:52:22', '2023-05-04 15:52:22'),
(460, 'Clive Altshuler', 'na', 'na', 'na', 'nan', NULL, '2023-05-05 14:42:58', '2023-05-05 14:42:58'),
(461, 'Freij Hagobian', 'na', 'na', 'na', 'na', NULL, '2023-05-05 14:47:28', '2023-05-05 14:47:28'),
(462, 'Salem, Shor & Saperstein, LLC', 'na', 'na', 'na', 'na', NULL, '2023-05-05 14:51:13', '2023-05-05 14:51:13'),
(463, 'Citizens', 'na', 'na', 'na', 'na', NULL, '2023-05-05 14:52:21', '2023-05-05 14:52:21'),
(464, 'Teachers\' Retirement System of the City of NY', 'na', 'na', 'na', 'na', NULL, '2023-05-05 14:53:46', '2023-05-05 14:53:46'),
(465, 'Graham Construction LLC', 'na', 'na', 'na', 'na', NULL, '2023-05-08 16:45:09', '2023-05-08 16:45:09'),
(466, 'Santos C. Rivas', 'na', 'na', 'na', 'na', NULL, '2023-05-08 16:53:06', '2023-05-08 16:53:06'),
(467, 'Farmers', 'na', 'na', 'na', 'na', NULL, '2023-05-08 16:56:09', '2023-05-08 16:56:09'),
(468, 'Euclid Hall', 'Euclid Hall', 'na', 'na', 'na', NULL, '2023-05-08 18:32:54', '2023-05-08 18:32:54'),
(469, 'Hedgewood', 'na', 'na', 'na', 'na', NULL, '2023-05-09 12:14:25', '2023-05-09 12:14:25'),
(470, 'Fire Department of the City of New York', 'na', 'na', 'na', 'n', NULL, '2023-05-09 14:17:12', '2023-05-09 14:17:12'),
(471, 'Gary Lerman, CPA, PLLC', 'na', 'na', 'na', 'na', NULL, '2023-05-09 14:23:11', '2023-05-09 14:23:11'),
(472, 'Lawrence H. Woodward Home Inc.', 'na', 'na', 'na', 'na', NULL, '2023-05-10 15:33:42', '2023-05-10 15:33:42'),
(473, 'SBLI USA Life Insurance Company, Inc.', 'na', 'na', 'na', 'na', NULL, '2023-05-11 14:34:01', '2023-05-11 14:34:01'),
(474, 'Jerry Fuschetto', 'na', 'na', 'na', 'na', NULL, '2023-05-11 14:42:56', '2023-05-11 14:42:56'),
(475, 'YP Mechanical', 'na', 'na', 'na', 'na', NULL, '2023-05-11 14:44:03', '2023-05-11 14:44:03'),
(476, 'Theresa Ostroff', 'na', 'na', 'na', 'na', NULL, '2023-05-11 16:31:26', '2023-05-11 16:31:26'),
(477, 'MJZ 6-22 Trust', 'na', 'na', 'na', 'na', NULL, '2023-05-11 16:50:48', '2023-05-11 16:50:48'),
(478, 'State Payment Plan', 'na', 'na', 'na', 'na', NULL, '2023-05-12 14:37:53', '2023-05-12 14:37:53'),
(479, 'Amber Court of Pelham', 'na', 'na', 'na', 'na', NULL, '2023-05-15 14:01:19', '2023-05-15 14:01:19'),
(480, 'Amber Court of Lakeshore', 'na', 'na', 'na', 'na', NULL, '2023-05-15 14:01:34', '2023-05-15 14:01:34'),
(481, 'Amber Court of Westbury', 'na', 'na', 'na', 'na', NULL, '2023-05-15 14:01:45', '2023-05-15 14:01:45'),
(482, 'NYC Health + Hospitals/Mckinney', 'na', 'na', 'na', 'na', NULL, '2023-05-15 15:49:04', '2023-05-15 15:49:04'),
(483, 'Fidelio Rodriguez', 'na', 'na', 'na', 'na', NULL, '2023-05-15 16:00:59', '2023-05-15 16:00:59'),
(484, 'Whirlpool', '553 Benson Road', '49022', 'Benton Harbor', 'MI', NULL, '2023-05-16 14:34:00', '2023-05-16 14:34:00'),
(485, 'Wayfair Credit Card', 'na', 'na', 'na', 'na', NULL, '2023-05-17 14:57:31', '2023-05-17 14:57:31'),
(486, 'EZ Pass Customer Service Center', 'na', 'na', 'na', 'na', NULL, '2023-05-17 15:00:29', '2023-05-17 15:00:29'),
(487, 'Valley Stream Receiver of Taxes', 'na', 'na', 'na', 'na', NULL, '2023-05-18 14:34:49', '2023-05-18 14:34:49'),
(488, 'Roundpoint', 'na', 'na', 'na', 'na', NULL, '2023-05-18 14:37:37', '2023-05-18 14:37:37'),
(489, 'Eliyahu Barninka', 'na', 'na', 'na', 'na', NULL, '2023-05-19 14:15:12', '2023-05-19 14:15:12'),
(490, 'Costco Membership', 'na', 'na', 'na', 'na', NULL, '2023-05-22 15:53:29', '2023-05-22 15:53:29'),
(491, 'Stop & Stor', 'na', 'na', 'na', 'na', NULL, '2023-05-23 14:34:00', '2023-05-23 14:34:00'),
(492, 'Carol Ardizzone', 'na', 'na', 'na', 'na', NULL, '2023-05-23 16:50:12', '2023-05-23 16:50:12'),
(493, 'Joanne Savino', 'na', 'na', 'na', 'na', NULL, '2023-05-25 15:48:53', '2023-05-25 15:48:53'),
(494, 'The W Group at New Broadview LLC', 'na', 'na', 'na', 'na', NULL, '2023-05-30 17:21:43', '2023-05-30 17:21:43'),
(495, 'Hicksville Water District', 'na', 'na', 'na', 'na', NULL, '2023-06-01 14:54:14', '2023-06-01 14:54:14'),
(496, 'Milene Mansouri', 'na', 'na', 'na', 'na', NULL, '2023-06-02 13:53:41', '2023-06-02 13:53:41'),
(497, 'Meadows Senior Living', 'na', 'na', 'na', 'na', NULL, '2023-06-02 15:28:41', '2023-06-02 15:28:41'),
(498, 'Flexipay', 'na', 'na', 'na', 'na', NULL, '2023-06-06 13:45:47', '2023-06-06 13:45:47'),
(499, 'Leah Sobel', 'na', 'na', 'na', 'na', NULL, '2023-06-06 15:01:59', '2023-06-06 15:01:59'),
(500, 'Optum Medical Care PC', 'n a', 'na', 'na', 'na', NULL, '2023-06-08 15:07:13', '2023-06-08 15:07:13'),
(501, 'Flexcard', 'na', 'na', 'na', 'na', NULL, '2023-06-09 14:20:02', '2023-06-09 14:20:02'),
(502, 'Kornfeld & Kornfeld', 'na', 'na', 'na', 'na', NULL, '2023-06-13 17:23:53', '2023-06-13 17:23:53'),
(503, 'Eric Spring Allstate Agency', 'na', 'na', 'na', 'na', NULL, '2023-06-13 17:30:32', '2023-06-13 17:30:32'),
(504, 'Genesa Home Health Care & Companion Agency', 'na', 'na', 'na', 'na', NULL, '2023-06-15 15:41:25', '2023-06-15 15:41:25'),
(505, 'Erica Rice', 'na', 'na', 'na', 'na', NULL, '2023-06-19 15:23:00', '2023-06-19 15:23:00'),
(506, 'Arnold Fischer', 'na', 'na', 'na', 'na', NULL, '2023-06-21 16:41:03', '2023-06-21 16:41:03'),
(507, 'Thomas Licata', 'na', 'na', 'na', 'na', NULL, '2023-06-22 14:38:04', '2023-06-22 14:38:04'),
(508, 'Symphony at Lancaster', 'a', 'na', 'na', 'na', NULL, '2023-06-27 17:04:38', '2023-06-27 17:04:38'),
(509, 'Orzac LIJ', 'na', 'na', 'na', 'na', NULL, '2023-06-27 17:14:35', '2023-06-27 17:14:35'),
(510, 'Chubb Personal Risk Services', 'na', 'na', 'na', 'na', NULL, '2023-06-27 17:37:27', '2023-06-27 17:37:27'),
(511, '1564 East 14 St. LLC', 'na', 'na', 'na', 'na', NULL, '2023-06-28 16:37:01', '2023-06-28 16:37:01'),
(512, 'Allison Millian', 'na', 'na', 'na', 'nan', NULL, '2023-06-28 16:50:11', '2023-06-28 16:50:11'),
(513, 'Manhattan Mini Storage #1990', 'na', 'na', 'na', 'na', NULL, '2023-06-29 15:19:33', '2023-06-29 15:19:33'),
(514, 'Santander', 'na', 'na', 'na', 'na', NULL, '2023-06-29 15:25:13', '2023-06-29 15:25:13'),
(515, 'Margaret Capobianco', 'na', 'na', 'na', 'na', NULL, '2023-06-30 14:41:40', '2023-06-30 14:41:40'),
(516, 'Field Form Inc.', 'na', 'na', 'na', 'na', NULL, '2023-06-30 14:46:17', '2023-06-30 14:46:17'),
(517, 'Naftoli Neuburger MD PC', 'na', 'na', 'na', 'na', NULL, '2023-07-05 15:04:00', '2023-07-05 15:04:00'),
(518, 'Gianna Borell', 'na', 'na', 'na', 'na', NULL, '2023-07-05 15:13:29', '2023-07-05 15:13:29'),
(519, 'Ellis Medicine', 'na', 'na', 'na', 'na', NULL, '2023-07-05 15:17:53', '2023-07-05 15:17:53'),
(520, 'Adirondack Insurance Exchange', 'na', 'na', 'na', 'na', NULL, '2023-07-05 15:46:54', '2023-07-05 15:46:54'),
(521, 'Rachel Stern Family Trust', 'na', 'na', 'na', 'na', NULL, '2023-07-07 18:29:34', '2023-07-07 18:29:34'),
(522, 'The Prudential Insurance Company of America', 'na', 'na', 'na', 'na', NULL, '2023-07-07 18:52:55', '2023-07-07 18:52:55'),
(523, 'Alanna Defedele', 'na', 'na', 'na', 'na', NULL, '2023-07-07 18:59:09', '2023-07-07 18:59:09'),
(524, 'Bay Ridge Skin and Cancer Dermatology', 'na', 'na', 'na', 'na', NULL, '2023-07-10 14:45:03', '2023-07-10 14:45:03'),
(525, 'Property Tax Reduction Consultants', 'na', 'na', 'na', 'na', NULL, '2023-07-11 15:09:15', '2023-07-11 15:09:15'),
(526, 'CSA Preservation HTC LLC', 'na', 'na', 'na', 'na', NULL, '2023-07-11 15:18:40', '2023-07-11 15:18:40'),
(527, 'Corinne Montana-Stack', 'na', 'na', 'na', 'na', NULL, '2023-07-11 15:26:39', '2023-07-11 15:26:39'),
(528, 'Braemar Living', 'na', 'na', 'na', 'na', NULL, '2023-07-12 13:54:40', '2023-07-12 13:54:40'),
(529, 'Goldmont Realty Corp.-K', 'na', 'na', 'na', 'na', NULL, '2023-07-13 15:04:21', '2023-07-13 15:04:21'),
(530, 'Laurel Parkes', 'na', 'na', 'na', 'na', NULL, '2023-07-13 15:07:10', '2023-07-13 15:07:10'),
(531, 'Napoli Family Property Irrevocable Trust', 'na', 'na', 'na', 'na', NULL, '2023-07-14 10:41:45', '2023-07-14 10:41:45'),
(532, 'Stephen Bedosky', 'na', 'na', 'na', 'na', NULL, '2023-07-17 15:05:49', '2023-07-17 15:05:49'),
(533, 'Tax Correction Agency', 'na', 'na', 'na', 'na', NULL, '2023-07-17 15:14:16', '2023-07-17 15:14:16'),
(534, 'Erica Warren', 'na', 'na', 'na', 'na', NULL, '2023-07-19 14:38:34', '2023-07-19 14:38:34'),
(535, 'Richmond County Ambulance Service Inc', 'na', 'na', 'na', 'na', NULL, '2023-07-21 14:20:06', '2023-07-21 14:20:06'),
(536, '2 Grace Owners Inc.', 'na', 'na', 'na', 'na', NULL, '2023-07-24 14:34:39', '2023-07-24 14:34:39'),
(537, 'Enerbank USA', 'na', 'na', 'an', 'na', NULL, '2023-07-24 14:43:19', '2023-07-24 14:43:19'),
(538, 'New York Podiatry', 'na', 'na', 'an', 'na', NULL, '2023-07-25 15:12:42', '2023-07-25 15:12:42'),
(539, 'Arbern Boulevard Apartments LLC', 'na', 'na', 'na', 'na', NULL, '2023-07-26 14:22:48', '2023-07-26 14:22:48'),
(540, 'East Meadow Townehouse (211)', 'na', 'na', 'na', 'na', NULL, '2023-07-26 14:24:43', '2023-07-26 14:24:43'),
(541, 'Mutual of Omaha', 'na', 'na', 'na', 'na', NULL, '2023-07-26 16:12:45', '2023-07-26 16:12:45'),
(542, 'Ronny Morales', 'na', 'na', 'na', 'na', NULL, '2023-07-27 17:59:16', '2023-07-27 17:59:16'),
(543, 'Discover Personal Loans', 'na', 'na', 'na', 'na', NULL, '2023-07-27 18:04:10', '2023-07-27 18:04:10'),
(544, 'Susan Sobel', 'na', 'na', 'na', 'na', NULL, '2023-07-28 13:28:52', '2023-07-28 13:28:52'),
(545, 'CSRE Insurance Program', 'na', 'na', 'na', 'na', NULL, '2023-07-28 13:29:31', '2023-07-28 13:29:31'),
(546, 'South Farmingdale Water District', 'na', 'na', 'na', 'na', NULL, '2023-07-28 13:30:53', '2023-07-28 13:30:53'),
(547, '119-21 Metropolitan Holdings, LLC', 'na', 'na', 'na', 'na', NULL, '2023-08-01 15:22:12', '2023-08-01 15:22:12'),
(548, 'Marissa Tapper', 'na', 'na', 'na', 'na', NULL, '2023-08-14 13:10:35', '2023-08-14 13:10:35'),
(549, 'TruStage', 'na', 'na', 'na', 'na', NULL, '2023-08-14 13:19:00', '2023-08-14 13:19:00'),
(550, 'Credit Guard of America', 'na', 'na', 'na', 'na', NULL, '2023-08-14 13:21:11', '2023-08-14 13:21:11'),
(551, 'Roger Zacharoff', 'na', 'na', 'na', 'na', NULL, '2023-08-16 16:40:01', '2023-08-16 16:40:01'),
(552, 'Maureen Pantaleo', 'na', 'na', 'na', 'na', NULL, '2023-08-16 16:48:29', '2023-08-16 16:48:29'),
(553, 'Tolls by Mail Payment Processing Center', 'na', 'na', 'na', 'na', NULL, '2023-08-16 16:57:02', '2023-08-16 16:57:02'),
(554, 'Slomins', 'na', 'na', 'na', 'na', NULL, '2023-08-17 14:44:10', '2023-08-17 14:44:10'),
(555, 'Lexington Estates, Inc.', 'na', 'na', 'na', 'na', NULL, '2023-08-18 14:56:41', '2023-08-18 14:56:41'),
(556, 'NFIP Direct', 'na', 'na', 'na', 'na', NULL, '2023-08-18 15:01:44', '2023-08-18 15:01:44'),
(557, 'Gold Crest Care Center', 'na', 'na', 'na', 'na', NULL, '2023-08-21 17:03:01', '2023-08-21 17:03:01'),
(558, 'Radcliffe Gardens LLC', 'na', 'na', 'na', 'na', NULL, '2023-08-21 17:07:20', '2023-08-21 17:07:20'),
(559, 'Robert Grizzaffi', 'na', 'na', 'na', 'na', NULL, '2023-08-21 17:12:15', '2023-08-21 17:12:15'),
(560, 'Cheryl Cahill', 'na', 'na', 'na', 'na', NULL, '2023-08-22 17:59:29', '2023-08-22 17:59:29'),
(561, 'Aries Lawn Maintenance Corp', 'na', 'an', 'na', 'nan', NULL, '2023-08-22 18:04:46', '2023-08-22 18:04:46'),
(562, 'Central Loan Administration & Reporting', 'na', 'na', 'na', 'na', NULL, '2023-08-22 18:08:04', '2023-08-22 18:08:04'),
(563, 'Veronica Seminario', 'na', 'na', 'na', 'na', NULL, '2023-08-22 18:14:05', '2023-08-22 18:14:05'),
(564, 'Perillo Bros', 'na', 'a', 'na', 'nan', NULL, '2023-08-23 17:11:50', '2023-08-23 17:11:50'),
(565, 'Austin Apartments LLC', 'na', 'na', 'na', 'na', NULL, '2023-08-23 17:38:32', '2023-08-23 17:38:32'),
(566, 'Dorothy Kriegel', '20 Arden lane', '11738', 'Farmingville', 'NY', NULL, '2023-08-24 15:55:24', '2023-08-24 15:55:24'),
(567, 'Home care', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-08-25 13:27:38', '2023-08-25 13:27:38'),
(568, 'Annalisa Gaudio Panagiotakis', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-08-25 13:53:03', '2023-08-25 13:53:03'),
(569, 'Flushing bank', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-08-25 16:36:38', '2023-08-25 16:36:38'),
(570, '2 west 120 reality CO LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-08-28 13:21:11', '2023-08-28 13:21:11'),
(571, 'Weiner realtors', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-08-28 14:03:38', '2023-08-28 14:03:38'),
(572, 'Daniel Gabriel', '338 perry road', '12783', 'Swanlake', 'NY', NULL, '2023-08-28 14:55:30', '2023-08-28 14:55:30'),
(573, 'Angela Dennis', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-08-28 15:27:08', '2023-08-28 15:27:08'),
(574, 'Banana Republic', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-08-28 16:20:40', '2023-08-28 16:20:40'),
(575, 'Susan Luger', '1197 east 22nd street', '11210', 'Brooklyn', 'NY', NULL, '2023-08-28 17:04:10', '2023-08-28 17:04:10'),
(576, 'Cecilia Reid', '249-16 148 ave', '11422', 'Rosedale', 'NY', NULL, '2023-08-28 18:44:02', '2023-08-28 18:44:02'),
(577, 'Humana', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-08-28 19:04:04', '2023-08-28 19:04:04'),
(578, 'Jodi Rubin', 'na', 'na', 'na', 'na', NULL, '2023-08-29 15:32:57', '2023-08-29 15:32:57'),
(579, 'Zissel Reisman', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-08-29 18:51:35', '2023-08-29 18:51:35'),
(580, 'Zissel Reisman', '16 Ely place', '08817', 'Edison', 'NJ', NULL, '2023-08-29 19:06:42', '2023-08-29 19:06:42'),
(581, 'Carmine Casale', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-08-30 11:02:21', '2023-08-30 11:02:21'),
(582, 'MS Kahn Family Trust', 'na', 'na', 'na', 'na', NULL, '2023-08-30 11:20:04', '2023-08-30 11:20:04'),
(583, 'Chase freedom', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-08-30 11:30:40', '2023-08-30 11:30:40'),
(584, 'Felicia Rosenberg', '10 Harriet Drive', '1179', 'Syosset', 'NY', NULL, '2023-08-30 13:41:14', '2023-08-30 13:41:14'),
(585, 'M. Renee', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-08-30 14:10:31', '2023-08-30 14:10:31'),
(586, '1743-46th street, LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-08-30 15:08:33', '2023-08-30 15:08:33'),
(587, 'Navy green R3 LLC', '45 Clermont ave', '11205', 'Brooklyn', 'NY', NULL, '2023-08-30 16:25:55', '2023-08-30 16:25:55'),
(588, 'Baldwill Dental arts PLLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-08-31 11:01:47', '2023-08-31 11:01:47'),
(589, 'Mursel Kabasi LLC', '7912-16th ave', '11214', 'Brooklyn', 'NY', NULL, '2023-08-31 13:12:53', '2023-08-31 13:12:53'),
(590, 'Brenda  Beason', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-08-31 17:01:00', '2023-08-31 17:01:00'),
(591, 'Jet blue card plus', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-09-01 11:45:26', '2023-09-01 11:45:26'),
(592, 'Myron and Esther Robinson family trust', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-09-01 12:43:15', '2023-09-01 12:43:15'),
(593, 'Barney Bishop', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-09-01 13:32:51', '2023-09-01 13:32:51'),
(594, 'CLLI 7 LP', 'na', 'na', 'nan', 'na', NULL, '2023-09-04 12:54:05', '2023-09-04 12:54:05'),
(595, 'Oscar Reyes', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-09-05 09:40:39', '2023-09-05 09:40:39'),
(596, 'June Court Apartments', 'na', 'na', 'na', 'na', NULL, '2023-09-05 14:22:50', '2023-09-05 14:22:50'),
(597, 'New York Life Insurance and Annuity Corporation', 'na', 'na', 'na', 'na', NULL, '2023-09-07 10:19:33', '2023-09-07 10:19:33'),
(598, 'FOUNDATION FINANCE COMPANY', 'na', 'na', 'na', 'na', NULL, '2023-09-07 10:21:42', '2023-09-07 10:21:42'),
(599, 'Greensky', 'na', 'na', 'na', 'na', NULL, '2023-09-07 11:22:48', '2023-09-07 11:22:48'),
(600, 'Patricia OConnor', '225 N Rutherford Ave', '11758', 'N Massapequa', 'NY', NULL, '2023-09-07 14:32:58', '2023-09-07 14:32:58'),
(601, 'Pavilion nursing homes', '1 Fern place', '11740', 'Greenlawn', 'NY', NULL, '2023-09-07 16:57:23', '2023-09-07 16:57:23'),
(602, 'Lisa Singleton', 'na', 'na', 'na', 'na', NULL, '2023-09-08 14:07:27', '2023-09-08 14:07:27'),
(603, 'Northwell Health laboratories', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-09-12 13:17:28', '2023-09-12 13:17:28'),
(604, 'Medguard Alert', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-09-13 09:23:55', '2023-09-13 09:23:55'),
(605, 'Eli Reisman & Zissel Michelle Reisman', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-09-13 12:31:32', '2023-09-13 12:31:32'),
(606, 'C & C Apartment management', '1735 Park ave, Suite 300', '10035', 'New york', 'NY', NULL, '2023-09-14 13:48:16', '2023-09-14 13:48:16'),
(607, 'Exxon Mobil', 'P.O. Box 7065', '19176-0605', 'Philadelphia', 'P.A', NULL, '2023-09-14 14:26:42', '2023-09-14 14:26:42'),
(608, 'Anthony Michele', '213 92nd Street', '11209', 'Brooklyn', 'NY', NULL, '2023-09-18 16:50:58', '2023-09-18 16:50:58'),
(609, 'Lawrence vento', '237 92nd street', '11209', 'Brooklyn', 'NY', NULL, '2023-09-18 16:52:51', '2023-09-18 16:52:51'),
(610, 'Joseph Vento', '237 92nd street', '11209', 'Brooklyn', 'NY', NULL, '2023-09-18 16:59:38', '2023-09-18 16:59:38'),
(611, 'Elvira Duval', '1856 Lafayette ave Apt 3G', '10473', 'Bronx', 'NY', NULL, '2023-09-19 15:23:27', '2023-09-19 15:23:27'),
(612, 'Hedgewood ALP', '355  Fishkill Ave', '12508-2061', 'Beacon', 'NY', NULL, '2023-09-19 16:55:50', '2023-09-19 16:55:50'),
(613, 'Ateret Avoth, LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-09-20 14:34:30', '2023-09-20 14:34:30'),
(614, 'Bronxwood Home for the Aged Ink', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-09-20 15:55:49', '2023-09-20 15:55:49'),
(615, 'Town of Fishkill', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-09-21 12:29:05', '2023-09-21 12:29:05'),
(616, 'Joel Slotnik', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-09-22 09:44:38', '2023-09-22 09:44:38'),
(617, 'Chase/Amazon', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-09-22 12:29:36', '2023-09-22 12:29:36'),
(618, 'Dangelo Funeral home', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-09-27 09:30:42', '2023-09-27 09:30:42'),
(619, 'Rego park gardens owners corp', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-09-27 12:50:34', '2023-09-27 12:50:34'),
(620, 'Jefrey P. Pravato', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-02 11:24:39', '2023-10-02 11:24:39'),
(621, 'Cieatha Abrams', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-04 10:59:32', '2023-10-04 10:59:32'),
(622, 'Richard Jayson', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-05 09:18:32', '2023-10-05 09:18:32'),
(623, 'Seth Jayson', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-05 09:21:28', '2023-10-05 09:21:28'),
(624, 'Ditmas Park Care center', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-05 10:36:37', '2023-10-05 10:36:37'),
(625, 'Rockabye Help', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-05 10:59:10', '2023-10-05 10:59:10'),
(626, '601 Chestnut Street Owners', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-05 11:49:53', '2023-10-05 11:49:53'),
(627, 'JG Furnishing', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-09 09:23:54', '2023-10-09 09:23:54'),
(628, 'Mount Sinai Doctors Faculty Practice', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-09 11:37:29', '2023-10-09 11:37:29'),
(629, 'Berkeley Marbru Assoc', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-11 09:50:02', '2023-10-11 09:50:02'),
(630, 'Zell & Ettinger C.P.A.S', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-13 12:15:09', '2023-10-13 12:15:09'),
(631, 'Dayton Towers Corp', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-16 09:55:08', '2023-10-16 09:55:08'),
(632, 'EmbelemHealth', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-18 12:18:07', '2023-10-18 12:18:07'),
(633, 'VNA home care options', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-19 12:16:18', '2023-10-19 12:16:18'),
(634, 'The Bristol at Lynbrook', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-23 10:07:06', '2023-10-23 10:07:06'),
(635, 'Jewish Review', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-23 10:30:36', '2023-10-23 10:30:36'),
(636, 'Dime bank', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-23 17:09:57', '2023-10-23 17:09:57'),
(637, 'Nassau county Treasurers Office', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-24 09:32:20', '2023-10-24 09:32:20'),
(638, 'Dr. Eric Leibowitz', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-24 09:47:16', '2023-10-24 09:47:16'),
(639, 'Yedid & Zeitoune PLLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-24 15:25:04', '2023-10-24 15:25:04'),
(640, 'Dynasty Protection', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-25 10:08:08', '2023-10-25 10:08:08'),
(641, 'Panzarino Landscaping Masonry', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-25 11:19:16', '2023-10-25 11:19:16'),
(642, 'Freedom Mortgage', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-25 16:29:53', '2023-10-25 16:29:53'),
(643, 'Denise Whitehead', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-27 10:35:18', '2023-10-27 10:35:18'),
(644, 'Maid to Match', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-27 11:55:30', '2023-10-27 11:55:30'),
(645, 'M & J Landscaping', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-30 09:25:39', '2023-10-30 09:25:39'),
(646, 'St. Charles Condominium IV', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-30 09:47:52', '2023-10-30 09:47:52'),
(647, 'Jackie Reiss', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-31 09:40:28', '2023-10-31 09:40:28'),
(648, 'Erica Waren', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-10-31 10:13:29', '2023-10-31 10:13:29'),
(649, 'Boro Park Medical P.C', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-01 09:23:44', '2023-11-01 09:23:44'),
(650, 'Vinnys', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-01 10:16:55', '2023-11-01 10:16:55'),
(651, 'Aliza Schrier', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-01 13:27:38', '2023-11-01 13:27:38'),
(652, 'Nil Patel', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-01 15:19:39', '2023-11-01 15:19:39'),
(653, 'Seneca Chapels LTD.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-01 15:58:27', '2023-11-01 15:58:27'),
(654, 'Mandi Blittner', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-02 11:34:38', '2023-11-02 11:34:38'),
(655, 'Joshua Ostreicher', 'na', 'na', 'na', 'na', NULL, '2023-11-07 13:56:15', '2023-11-07 13:56:15'),
(656, 'New York- Presbyterian Hospital', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-08 10:57:58', '2023-11-08 10:57:58'),
(657, 'Jack Sherman, D.M.D', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-08 11:01:48', '2023-11-08 11:01:48'),
(658, 'Weill Cornell Medical College', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-08 11:04:22', '2023-11-08 11:04:22'),
(659, 'Landskind & Ricaforte Law Group', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-08 14:13:52', '2023-11-08 14:13:52'),
(660, 'Sean Collard', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-08 14:25:07', '2023-11-08 14:25:07'),
(661, 'Newrez Mortgage', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-08 16:57:13', '2023-11-08 16:57:13'),
(662, 'Newrez LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-09 09:25:19', '2023-11-09 09:25:19'),
(663, '78/79 York Associates LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-09 10:24:36', '2023-11-09 10:24:36'),
(664, '1425 LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-09 12:04:02', '2023-11-09 12:04:02'),
(665, 'Michael Watson', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-09 16:36:29', '2023-11-09 16:36:29'),
(666, 'Mount Sinai South Nassau', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-10 13:36:25', '2023-11-10 13:36:25'),
(667, 'Michael Smith', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-13 14:56:28', '2023-11-13 14:56:28'),
(668, 'Valon Mortgage', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-13 15:40:25', '2023-11-13 15:40:25'),
(669, 'Smithsonian NMAAHC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-14 09:23:14', '2023-11-14 09:23:14'),
(670, 'Bj\'s Wholesale Club, INC.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-14 09:32:53', '2023-11-14 09:32:53'),
(671, 'Panzarino Landscaping Masonry, Inc.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-14 12:47:58', '2023-11-14 12:47:58'),
(672, 'Amy Coelho', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-14 13:45:43', '2023-11-14 13:45:43'),
(673, 'John O\'hanlon, DPM', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-15 09:13:36', '2023-11-15 09:13:36'),
(674, 'Eagle Lawn Sprinklers, Inc.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-15 09:41:48', '2023-11-15 09:41:48'),
(675, 'Actors Equity Association', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-16 09:39:48', '2023-11-16 09:39:48'),
(676, 'Evleyn Ramos', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-16 12:41:55', '2023-11-16 12:41:55'),
(677, 'Evelyn Ramos', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-16 12:42:41', '2023-11-16 12:42:41'),
(678, 'Sandra Lantigua', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-16 14:56:19', '2023-11-16 14:56:19'),
(679, 'A. Drach', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-16 16:08:48', '2023-11-16 16:08:48'),
(680, 'Spivack Realty Co. Inc', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-17 09:37:57', '2023-11-17 09:37:57'),
(681, 'David McSwiggan', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-17 13:44:25', '2023-11-17 13:44:25'),
(682, 'Andrew Golub', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-20 10:30:06', '2023-11-20 10:30:06'),
(683, 'NSLIJ Medical PC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-21 09:28:13', '2023-11-21 09:28:13'),
(684, 'Benzion Goldstein', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-21 12:49:07', '2023-11-21 12:49:07'),
(685, 'Lori Lamont', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-22 12:28:29', '2023-11-22 12:28:29'),
(686, 'The Bristal at Garden City', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-22 17:01:28', '2023-11-22 17:01:28'),
(687, 'Municipal Credit Union', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-27 09:38:11', '2023-11-27 09:38:11'),
(688, 'John Cambitsis DDS', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-27 10:01:37', '2023-11-27 10:01:37'),
(689, 'Margaret Capossela', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-27 10:43:23', '2023-11-27 10:43:23'),
(690, 'Surrey Coop. Apartments, INC.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-27 14:40:51', '2023-11-27 14:40:51'),
(691, 'BLDG Management Co, INC.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-27 15:29:13', '2023-11-27 15:29:13'),
(692, 'Flushing Hospital Medical Center', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-28 14:09:43', '2023-11-28 14:09:43'),
(693, 'AMR- Hunter Ambulance', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-28 14:12:37', '2023-11-28 14:12:37'),
(694, 'Melody', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-29 10:21:53', '2023-11-29 10:21:53'),
(695, 'Makeba Petersen', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-29 11:06:09', '2023-11-29 11:06:09'),
(696, 'The Danbury Mint', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-11-29 15:30:21', '2023-11-29 15:30:21'),
(697, 'Southhampton Apts DEL LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-05 16:31:44', '2023-12-05 16:31:44'),
(698, 'Belair Care Center- SNF', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-06 09:59:49', '2023-12-06 09:59:49'),
(699, 'Tatiana Properties LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-06 14:10:50', '2023-12-06 14:10:50'),
(700, 'Northern Westchester Hospital Association', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-07 14:26:53', '2023-12-07 14:26:53'),
(701, 'The Chateau at Brooklyn Rehab and Nursing Center', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-07 15:24:46', '2023-12-07 15:24:46'),
(702, 'Crown Nursing and Rehabilitation Center', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-07 15:48:39', '2023-12-07 15:48:39'),
(703, 'Comenity- Zale', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-08 10:08:36', '2023-12-08 10:08:36'),
(704, 'Expedia Cruises', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-11 16:25:29', '2023-12-11 16:25:29'),
(705, 'Verizon Wireless', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-12 11:07:14', '2023-12-12 11:07:14'),
(706, 'OSI- Oil Services Inc.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-12 15:12:54', '2023-12-12 15:12:54'),
(707, 'Central Square Seniors, LP', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-13 11:53:24', '2023-12-13 11:53:24'),
(708, 'Idalia Almanzar', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-14 11:49:09', '2023-12-14 11:49:09'),
(709, 'The Hartford', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-14 12:11:50', '2023-12-14 12:11:50'),
(710, 'Bay Ridge Air Rights, Inc.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-15 12:08:17', '2023-12-15 12:08:17'),
(711, 'Jacob Fuhrer', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-18 10:26:10', '2023-12-18 10:26:10'),
(712, 'Merrimack Mutual Fire Insurance Company', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-18 10:43:33', '2023-12-18 10:43:33'),
(713, 'Elite Green Landscape & Design Inc.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-18 10:46:34', '2023-12-18 10:46:34'),
(714, 'Roger Allen', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-18 10:55:19', '2023-12-18 10:55:19'),
(715, 'Jim Cuccias &sons', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-18 14:15:00', '2023-12-18 14:15:00'),
(716, 'Women Within', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-19 11:51:12', '2023-12-19 11:51:12'),
(717, 'Nalim Inc.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-19 13:00:24', '2023-12-19 13:00:24'),
(718, 'Anthony Mottola', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-20 12:32:41', '2023-12-20 12:32:41'),
(719, 'Clarity Eye Care', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-20 15:36:24', '2023-12-20 15:36:24'),
(720, 'Doris Garcia', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-21 11:25:23', '2023-12-21 11:25:23'),
(721, 'Veolia Water New York Inc', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-21 12:35:52', '2023-12-21 12:35:52'),
(722, 'Consumer Reports', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-22 09:13:59', '2023-12-22 09:13:59'),
(723, 'Orrie Home Improvement', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-22 09:16:29', '2023-12-22 09:16:29'),
(724, 'Yehoshua Ausfresser', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-22 10:19:32', '2023-12-22 10:19:32'),
(725, 'Einsidler management Inc', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-26 13:49:47', '2023-12-26 13:49:47'),
(726, 'Michael Botwinick', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-27 11:07:00', '2023-12-27 11:07:00'),
(727, 'Panorama BK, LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-27 12:28:35', '2023-12-27 12:28:35'),
(728, 'Madison York Corona', 'na', 'na', 'na', 'na', NULL, '2023-12-28 08:27:31', '2023-12-28 08:27:31'),
(729, 'Madison York Corona', 'na', 'na', 'na', 'na', NULL, '2023-12-28 08:27:31', '2023-12-28 08:27:31'),
(730, 'AT & T', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-28 09:22:49', '2023-12-28 09:22:49'),
(731, 'Colts Neck neurology', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2023-12-29 10:08:18', '2023-12-29 10:08:18'),
(732, 'Crespi management Group LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-02 16:02:56', '2024-01-02 16:02:56'),
(733, 'Omnicare Inc.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-03 10:20:45', '2024-01-03 10:20:45'),
(734, 'USAA Credit card payments', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-03 10:24:30', '2024-01-03 10:24:30'),
(735, '09- Yacht Club Cove Condominium', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-04 11:05:30', '2024-01-04 11:05:30'),
(736, 'Angela De Jesus', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-04 12:26:30', '2024-01-04 12:26:30'),
(737, 'Nannys for Grannys', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-05 11:04:34', '2024-01-05 11:04:34'),
(738, 'Silvia Rodriguez', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-05 12:01:28', '2024-01-05 12:01:28'),
(739, 'Eliyshu Barninka', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-08 11:26:26', '2024-01-08 11:26:26'),
(740, 'Waiho Lum MD PLLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-10 09:20:13', '2024-01-10 09:20:13'),
(741, 'Laura Feola', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-10 09:26:32', '2024-01-10 09:26:32'),
(742, 'Linda McNally', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-10 09:28:42', '2024-01-10 09:28:42'),
(743, 'Woodhaven', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-15 10:20:24', '2024-01-15 10:20:24'),
(744, 'Denise Cuccias', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-15 11:32:16', '2024-01-15 11:32:16'),
(745, 'Susan & David Diamond', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-16 12:53:15', '2024-01-16 12:53:15'),
(746, 'Midnight Heating Services Inc', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-16 15:02:51', '2024-01-16 15:02:51'),
(747, 'PHH Mortgage Services', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-16 15:25:39', '2024-01-16 15:25:39'),
(748, 'Stand-up MRI of Great Neck', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-17 09:07:59', '2024-01-17 09:07:59'),
(749, 'Susan Weiner', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-17 15:18:29', '2024-01-17 15:18:29'),
(750, 'Bay Terrace Section 3', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-18 09:23:43', '2024-01-18 09:23:43'),
(751, 'USAA', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-18 10:25:28', '2024-01-18 10:25:28'),
(752, 'The Journal News Media group', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-18 10:44:33', '2024-01-18 10:44:33'),
(753, 'Vivint', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-18 10:44:49', '2024-01-18 10:44:49'),
(754, 'Susan McClean', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-18 10:48:02', '2024-01-18 10:48:02'),
(755, 'Marylin Antoime', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-18 10:48:26', '2024-01-18 10:48:26'),
(756, 'Arlene Bendoo', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-18 10:48:45', '2024-01-18 10:48:45'),
(757, 'Marilyn Antoine', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-18 10:50:24', '2024-01-18 10:50:24'),
(758, 'Arlene Bandoo', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-18 10:50:44', '2024-01-18 10:50:44'),
(759, 'Randy Ramsawak', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-19 12:05:49', '2024-01-19 12:05:49'),
(760, 'Massachusetts Property Insurance Underwriting Assoc.', 'ma', 'na', 'na', 'na', NULL, '2024-01-24 10:36:52', '2024-01-24 10:36:52'),
(761, 'Ronald Wanser', 'ma', 'na', 'na', 'na', NULL, '2024-01-24 10:41:34', '2024-01-24 10:41:34'),
(762, 'Lenox Hill Radiology & Medical Imaging', 'na', 'na', 'na', 'na', NULL, '2024-01-24 11:14:44', '2024-01-24 11:14:44'),
(763, 'Mount Sinai', 'na', 'na', 'na', 'na', NULL, '2024-01-24 11:20:35', '2024-01-24 11:20:35'),
(764, 'Bethpage Federal Credit Union', 'na', 'na', 'na', 'na', NULL, '2024-01-25 10:05:50', '2024-01-25 10:05:50'),
(765, 'ESCO', 'na', 'na', 'na', 'na', NULL, '2024-01-25 10:07:51', '2024-01-25 10:07:51'),
(766, 'Alpha Neurology', 'na', 'na', 'na', 'na', NULL, '2024-01-25 10:13:26', '2024-01-25 10:13:26'),
(767, 'Seasons @ E Meadow Condos II', 'na', 'na', 'na', 'na', NULL, '2024-01-29 12:08:17', '2024-01-29 12:08:17'),
(768, 'The Seasons at E Meadow HOA', 'na', 'na', 'na', 'na', NULL, '2024-01-29 12:09:36', '2024-01-29 12:09:36'),
(769, 'Florida Car Collection Inc.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-30 10:08:55', '2024-01-30 10:08:55'),
(770, 'Oaks at Broadlawn Redevelopment Co.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-30 10:51:47', '2024-01-30 10:51:47'),
(771, 'Norma Castro', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-30 13:50:25', '2024-01-30 13:50:25'),
(772, 'Wilmar Northampton LLCWilmar Northampton LLCWilmar Northampton LLCWilmar Northampton LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-30 13:56:04', '2024-01-30 13:56:04'),
(773, 'Wilmar Northampton LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-30 13:56:22', '2024-01-30 13:56:22'),
(774, 'Hirsch Fuels Inc.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-31 09:17:49', '2024-01-31 09:17:49'),
(775, '120 Owners Corp.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-31 09:59:41', '2024-01-31 09:59:41'),
(776, 'Emergency Ambulance Service Inc.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-31 14:45:44', '2024-01-31 14:45:44'),
(777, 'Foyaz Uddin', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-01-31 16:10:53', '2024-01-31 16:10:53'),
(778, 'Corinne Montana-Stack', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-01 09:18:44', '2024-02-01 09:18:44'),
(779, 'Jeffrey Gulino', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-01 16:17:34', '2024-02-01 16:17:34'),
(780, 'Apartment Equities Two LP', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-02 09:07:55', '2024-02-02 09:07:55'),
(781, 'Aging at home, LTD.', 'n/a', 'n/a', 'n/a', 'n', NULL, '2024-02-05 14:08:46', '2024-02-05 14:08:46'),
(782, 'Mildred Guadalupe Santos', 'n/a', 'n/a', 'n/a', 'na', NULL, '2024-02-06 15:48:27', '2024-02-06 15:48:27'),
(783, 'Joanne Akhavan', 'n/a', 'n/a', 'n/a', 'n', NULL, '2024-02-08 15:19:23', '2024-02-08 15:19:23'),
(784, 'Pinkas Lezer Insurance Brokerage', 'n/a', 'n/a', 'n/a', 'n', NULL, '2024-02-08 16:21:30', '2024-02-08 16:21:30'),
(785, 'Howard Fielstein', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-09 12:02:06', '2024-02-09 12:02:06'),
(786, 'Quest Diagnostics', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-09 13:08:14', '2024-02-09 13:08:14'),
(787, 'Theresa Allison', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-09 13:16:40', '2024-02-09 13:16:40'),
(788, 'Danielle Baskerville', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-13 13:39:20', '2024-02-13 13:39:20'),
(789, 'Rebecca Hobbs', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-15 10:52:49', '2024-02-15 10:52:49'),
(790, 'NYC American Mgmt. Inc.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-15 12:20:41', '2024-02-15 12:20:41'),
(791, 'Metropolitan Life Insurance Company', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-15 16:48:00', '2024-02-15 16:48:00'),
(792, 'Perry Verrone LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-16 09:09:40', '2024-02-16 09:09:40'),
(793, 'ARstrat, LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-16 10:17:51', '2024-02-16 10:17:51'),
(794, 'Hilton East Assisted Living', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-16 13:19:05', '2024-02-16 13:19:05'),
(795, 'George Dempsey, MD.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-19 15:44:56', '2024-02-19 15:44:56'),
(796, 'Bitahon Alarm', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-19 16:57:19', '2024-02-19 16:57:19'),
(797, 'Gmoc Investors LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-20 15:35:30', '2024-02-20 15:35:30'),
(798, 'Maple House', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-21 09:18:46', '2024-02-21 09:18:46'),
(799, 'Wells Fargo Home Mortgage', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-21 14:38:25', '2024-02-21 14:38:25'),
(800, 'Cathedral Condominiums of Rockville Centre', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-21 14:42:44', '2024-02-21 14:42:44'),
(801, 'MVP Housing', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-21 15:58:01', '2024-02-21 15:58:01'),
(802, 'Stand Up MRI of Lynbrook', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-21 16:34:58', '2024-02-21 16:34:58'),
(803, 'PDCN Emergency Ambulance', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-21 16:37:08', '2024-02-21 16:37:08'),
(804, 'Peter DeMarco', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-22 09:10:21', '2024-02-22 09:10:21'),
(805, 'US Coastal Insurance Company', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-26 12:46:13', '2024-02-26 12:46:13'),
(806, 'Harooni & Sheindlin, M.D.  P.C', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-27 10:28:17', '2024-02-27 10:28:17'),
(807, 'Terrace Gardens Plaza Inc', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-27 14:42:06', '2024-02-27 14:42:06'),
(808, 'Trump Village Sec 3, Inc', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-28 10:24:32', '2024-02-28 10:24:32'),
(809, '1021-27 Ave St. John HDFC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-28 11:18:58', '2024-02-28 11:18:58'),
(810, 'Abraham Gurwitz', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-28 13:10:12', '2024-02-28 13:10:12'),
(811, 'City Building Owners', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-02-29 09:45:18', '2024-02-29 09:45:18'),
(812, 'DBA SAM PRICEMAN', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-01 12:20:01', '2024-03-01 12:20:01'),
(813, 'G & C Horizon Corp', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-04 11:09:22', '2024-03-04 11:09:22'),
(814, 'Laura Romani', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-04 15:58:54', '2024-03-04 15:58:54'),
(815, 'FNBO', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-06 11:05:55', '2024-03-06 11:05:55'),
(816, 'Mitchell Gardens #3 COOP CORP.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-06 14:30:01', '2024-03-06 14:30:01'),
(817, 'Citi Bank NA', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-06 16:29:29', '2024-03-06 16:29:29'),
(818, 'Ocean Fruit', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-07 10:27:10', '2024-03-07 10:27:10'),
(819, 'Valley Stream Medical Associates', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-11 09:09:09', '2024-03-11 09:09:09'),
(820, 'Valmar Surgical Supplies, Inc.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-13 09:21:33', '2024-03-13 09:21:33'),
(821, 'Landauer Medstar', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-18 09:18:02', '2024-03-18 09:18:02'),
(822, 'Bioreference Laboratories Patient Pay', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-18 11:42:53', '2024-03-18 11:42:53'),
(823, 'Charles W. Schuler, CPA', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-18 12:16:03', '2024-03-18 12:16:03'),
(824, 'Laura Marino', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-19 16:19:18', '2024-03-19 16:19:18'),
(825, 'Jeremy Schiff', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-22 09:20:19', '2024-03-22 09:20:19'),
(826, 'Bagatta Associates, Inc.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-22 10:01:37', '2024-03-22 10:01:37'),
(827, 'Al-Zahir INC.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-25 10:36:34', '2024-03-25 10:36:34'),
(828, '215 Enterprises LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-25 12:20:04', '2024-03-25 12:20:04'),
(829, 'Arry Nalbantoglu', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-26 14:29:20', '2024-03-26 14:29:20'),
(830, 'Tasha Woodson', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-27 13:33:53', '2024-03-27 13:33:53'),
(831, '3215 Owners Ltd- 2707', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-27 14:01:41', '2024-03-27 14:01:41'),
(832, 'Bargold Storage Systems, LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-27 17:00:12', '2024-03-27 17:00:12'),
(833, 'Raymond & Sharon Shalom Family IRR Trust', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-28 09:37:46', '2024-03-28 09:37:46'),
(834, 'Gary Stern', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-28 13:06:08', '2024-03-28 13:06:08'),
(835, 'Federation of Organizations', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-29 09:31:06', '2024-03-29 09:31:06'),
(836, 'Marcus H. Loo, MD, LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-29 11:29:31', '2024-03-29 11:29:31'),
(837, 'Shamco Management Corp', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-03-29 11:49:47', '2024-03-29 11:49:47'),
(838, 'Lisa Clark', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-01 13:49:00', '2024-04-01 13:49:00'),
(839, 'Ron Targove', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-02 09:12:43', '2024-04-02 09:12:43'),
(840, 'Mark Porada', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-02 09:36:22', '2024-04-02 09:36:22'),
(841, 'Jean Porada', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-02 09:38:26', '2024-04-02 09:38:26'),
(842, 'The Point Condominium C/O Dawning Real Estate', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-02 13:11:17', '2024-04-02 13:11:17'),
(843, 'Benari Services LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-03 14:11:33', '2024-04-03 14:11:33'),
(844, 'Broadway 151 LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-03 16:25:05', '2024-04-03 16:25:05'),
(845, 'Northbrook Heights', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-04 10:23:20', '2024-04-04 10:23:20'),
(846, 'Pesach Supreme LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-04 12:24:51', '2024-04-04 12:24:51'),
(847, 'MARC ALHONTE, ESQ', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-04 13:11:27', '2024-04-04 13:11:27'),
(848, 'Integrated Medical Professionals', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-08 12:39:27', '2024-04-08 12:39:27'),
(849, 'West Hempstead Water District', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-08 14:31:58', '2024-04-08 14:31:58'),
(850, 'Aidan Bennardo DO', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-09 10:12:19', '2024-04-09 10:12:19'),
(851, 'Dr. Albert Ferrara', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-09 10:13:51', '2024-04-09 10:13:51'),
(852, 'Assompta Albertini', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-10 14:48:11', '2024-04-10 14:48:11'),
(853, 'Antonucci Company Inc', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-11 10:24:56', '2024-04-11 10:24:56'),
(854, 'Robert Pomposello', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-11 13:20:05', '2024-04-11 13:20:05'),
(855, 'Pomposello Irrevocable Trust', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-11 13:20:31', '2024-04-11 13:20:31'),
(856, 'Schultz, Maruna & Schultz CPA\'s PC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-12 10:30:40', '2024-04-12 10:30:40'),
(857, 'Island Assisted Living', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-12 12:25:16', '2024-04-12 12:25:16'),
(858, 'Cendy Fenelon', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-15 12:55:23', '2024-04-15 12:55:23'),
(859, 'Gutterman\'s, Inc.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-15 14:35:17', '2024-04-15 14:35:17'),
(860, 'Precision LTC Pharmacy', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-16 11:47:38', '2024-04-16 11:47:38'),
(861, 'Precision LTC Pharmacy', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-16 11:48:40', '2024-04-16 11:48:40'),
(862, 'Allstate- Lynbrook', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-16 12:12:00', '2024-04-16 12:12:00'),
(863, 'Swift Home Care', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-17 11:05:24', '2024-04-17 11:05:24'),
(864, 'TD Bank- ME', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-17 15:47:12', '2024-04-17 15:47:12'),
(865, 'Speech Language Hearing Clinic', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-18 15:10:39', '2024-04-18 15:10:39'),
(866, 'AAA Northeast', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-19 09:21:19', '2024-04-19 09:21:19'),
(867, 'Antoinette Aprile', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-19 12:42:22', '2024-04-19 12:42:22'),
(868, 'Fairfield Properties', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-25 13:03:42', '2024-04-25 13:03:42'),
(869, 'Ivan Pagoada', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-25 14:29:37', '2024-04-25 14:29:37'),
(870, 'Weinreb Management LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-04-25 16:12:57', '2024-04-25 16:12:57'),
(871, 'Daniel Davies, DPM', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-01 13:10:11', '2024-05-01 13:10:11'),
(872, 'Riverspring Licensed Home Care', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-02 10:50:55', '2024-05-02 10:50:55'),
(873, 'JEL 9-20 TR', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-02 11:29:43', '2024-05-02 11:29:43'),
(874, 'Kelmscott Apartments Corp', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-02 12:12:58', '2024-05-02 12:12:58');
INSERT INTO `payee_list` (`id`, `name`, `address1`, `address2`, `city`, `state`, `zip_code`, `created_at`, `updated_at`) VALUES
(875, 'Simonovsky Gennady DDS', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-02 14:44:27', '2024-05-02 14:44:27'),
(876, 'Riverbay Corporation', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-02 16:28:37', '2024-05-02 16:28:37'),
(877, 'The Veranda Assisted Living', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-03 09:17:59', '2024-05-03 09:17:59'),
(878, 'Parkchester South Condominium', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-03 10:24:46', '2024-05-03 10:24:46'),
(879, 'Nordstrom', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-03 11:21:54', '2024-05-03 11:21:54'),
(880, 'Thea Okin', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-06 09:52:03', '2024-05-06 09:52:03'),
(881, 'ES Miller Legacy Trust', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-06 10:34:28', '2024-05-06 10:34:28'),
(882, 'Patricia Polemeni', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-06 10:58:16', '2024-05-06 10:58:16'),
(883, 'Lowe\'s Home Centers, LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-06 12:21:32', '2024-05-06 12:21:32'),
(884, 'Simba Simbi LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-06 14:22:36', '2024-05-06 14:22:36'),
(885, 'Moshe Sinensky', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-06 14:39:47', '2024-05-06 14:39:47'),
(886, 'One Brooklyn Health', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-07 13:49:24', '2024-05-07 13:49:24'),
(887, 'One Brooklyn Health', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-07 13:50:03', '2024-05-07 13:50:03'),
(888, 'Executive Towers at Lido, LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-08 16:40:26', '2024-05-08 16:40:26'),
(889, 'Michele Karin', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-13 10:10:03', '2024-05-13 10:10:03'),
(890, 'AT&T', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-13 15:11:47', '2024-05-13 15:11:47'),
(891, 'Yasko Yoshida', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-13 15:21:26', '2024-05-13 15:21:26'),
(892, 'Magnel Cheryl John', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-14 10:34:33', '2024-05-14 10:34:33'),
(893, 'Maura Hubert', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-14 13:03:25', '2024-05-14 13:03:25'),
(894, '0116 Cubesmart NY Brooklyn McDonald', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-14 13:09:19', '2024-05-14 13:09:19'),
(895, 'Esty', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-14 15:21:24', '2024-05-14 15:21:24'),
(896, 'Bethpage Federal Credit Union- NE', 'na', 'na', 'na', 'na', NULL, '2024-05-15 14:00:06', '2024-05-15 14:00:06'),
(897, 'Andy Dominguez', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-16 10:02:43', '2024-05-16 10:02:43'),
(898, 'Levittown W.D', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-16 10:48:30', '2024-05-16 10:48:30'),
(899, 'Joshua A Falk Do PC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-16 10:51:37', '2024-05-16 10:51:37'),
(900, 'Professional Claims Bureau, LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-16 10:53:51', '2024-05-16 10:53:51'),
(901, 'Rosalie Castano, D.D.S', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-16 12:13:29', '2024-05-16 12:13:29'),
(902, 'Rocket Mortgage, LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-16 13:34:14', '2024-05-16 13:34:14'),
(903, 'Shannel Walker', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-20 11:10:33', '2024-05-20 11:10:33'),
(904, 'Braemar at Medford', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-20 15:14:19', '2024-05-20 15:14:19'),
(905, 'LIVRIERI AND GOLUB, INC.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-20 16:03:20', '2024-05-20 16:03:20'),
(906, 'Comenity-Woman Within', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-22 13:08:51', '2024-05-22 13:08:51'),
(907, 'KellyAnn Caravello', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-23 16:03:12', '2024-05-23 16:03:12'),
(908, 'Santander Bank', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-28 13:47:40', '2024-05-28 13:47:40'),
(909, 'The Grand Pavilion Rehab & Nursing Centre', 'n/a', 'na', 'n/a', 'n/a', NULL, '2024-05-29 11:14:25', '2024-05-29 11:14:25'),
(910, 'Highlawn Terrace Inc', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-29 13:29:26', '2024-05-29 13:29:26'),
(911, 'Joseph Guindi', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-30 09:17:38', '2024-05-30 09:17:38'),
(912, 'M&T Bank-NY', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-30 09:27:22', '2024-05-30 09:27:22'),
(913, 'Timothy Bristoll', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-31 11:16:37', '2024-05-31 11:16:37'),
(914, 'Toyota Financial Services', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-31 11:32:49', '2024-05-31 11:32:49'),
(915, 'Gloria Flores', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-05-31 13:13:23', '2024-05-31 13:13:23'),
(916, 'Fairfield Knolls at Deer Park Owner LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-03 10:05:01', '2024-06-03 10:05:01'),
(917, 'Verrazano Motorworks', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-03 14:36:20', '2024-06-03 14:36:20'),
(918, 'Mariners Residence', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-04 10:45:21', '2024-06-04 10:45:21'),
(919, 'Sun-Jack Holdings LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-04 14:38:30', '2024-06-04 14:38:30'),
(920, 'GM Financial', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-04 14:58:34', '2024-06-04 14:58:34'),
(921, 'Chase Dental Health, PLLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-04 15:17:16', '2024-06-04 15:17:16'),
(922, 'Phyllis Diecidue', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-04 16:12:02', '2024-06-04 16:12:02'),
(923, '21st Mortgage Corporation', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-05 16:27:13', '2024-06-05 16:27:13'),
(924, 'Eagle Crest', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-05 16:30:16', '2024-06-05 16:30:16'),
(925, 'Castle Senior Living', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-06 13:05:43', '2024-06-06 13:05:43'),
(926, 'Peter Amoruoso', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-07 09:08:19', '2024-06-07 09:08:19'),
(927, 'Monte Elgarten', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-07 09:29:18', '2024-06-07 09:29:18'),
(928, 'Comenity- Roamans', 'na', 'n/a', 'n/a', 'n/a', NULL, '2024-06-10 12:51:26', '2024-06-10 12:51:26'),
(929, 'The GreenSky® Program', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-10 13:01:16', '2024-06-10 13:01:16'),
(930, 'Martir R. Canales', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-10 16:47:55', '2024-06-10 16:47:55'),
(931, 'NYC Property Tax Collection', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-11 10:07:36', '2024-06-11 10:07:36'),
(932, 'The Bristal at North Woodmere', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-14 09:08:18', '2024-06-14 09:08:18'),
(933, 'Cardiovascular Associates of Staten Island', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-14 10:02:07', '2024-06-14 10:02:07'),
(934, 'Francine White', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-14 10:33:07', '2024-06-14 10:33:07'),
(935, 'Kelly Crosby', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-17 10:46:54', '2024-06-17 10:46:54'),
(936, 'Hudson Valley CU', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-17 14:45:43', '2024-06-17 14:45:43'),
(937, 'Golden Gate Rehab', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-17 15:24:18', '2024-06-17 15:24:18'),
(938, 'Letitia St. Hill', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-17 16:07:22', '2024-06-17 16:07:22'),
(939, 'Brenda Moore', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-18 15:07:14', '2024-06-18 15:07:14'),
(940, 'Vcorp Services, LLC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-21 10:29:26', '2024-06-21 10:29:26'),
(941, 'Incorporated Village of Cedarhurst', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-21 10:32:50', '2024-06-21 10:32:50'),
(942, 'Dr. Ziemba', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-21 11:14:04', '2024-06-21 11:14:04'),
(943, 'Rock Miller', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-25 11:24:16', '2024-06-25 11:24:16'),
(944, 'Sylvia Artis', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-27 09:38:44', '2024-06-27 09:38:44'),
(945, 'Shellpoint Mortgage Servicing', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-27 13:09:17', '2024-06-27 13:09:17'),
(946, 'HP Medical care, PC', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-06-28 09:12:53', '2024-06-28 09:12:53'),
(947, 'J & H Landscaping Inc.', 'n/a', 'n/a', 'n/a', 'n/a', NULL, '2024-07-01 10:14:01', '2024-07-01 10:14:01'),
(948, 'Concora Credit', 'n/a', 'n/a', 'n/a', 'na', NULL, '2024-07-01 11:31:17', '2024-07-01 11:31:17'),
(949, 'SBA', 'PO Box 3918', 'na', 'na', 'na', NULL, '2024-07-02 08:40:56', '2024-07-02 08:40:56'),
(950, 'David Machson', 'na', 'na', 'na', 'na', NULL, '2024-07-02 08:43:44', '2024-07-02 08:43:44'),
(951, 'Hudson Valley Oral Surgery', 'na', 'na', 'na', 'na', NULL, '2024-07-02 08:45:42', '2024-07-02 08:45:42'),
(952, 'Village Care Senior Services Corporation', 'Village Care Senior Services Corporation', 'na', 'na', 'na', NULL, '2024-07-04 03:35:38', '2024-07-04 03:35:38'),
(953, 'Eunice Clark', 'na', 'ma', 'na', 'na', NULL, '2024-07-04 03:39:26', '2024-07-04 03:39:26'),
(954, 'Tower Realty Associates', 'n/a', 'n/a', 'n/a', 'na', NULL, '2024-07-05 12:16:58', '2024-07-05 12:16:58'),
(955, 'Atul Sakaria', 'na', 'na', 'nan', 'an', NULL, '2024-07-09 03:28:01', '2024-07-09 03:28:01'),
(956, 'Janelle Holford', 'na', 'na', 'na', 'na', NULL, '2024-07-09 11:08:03', '2024-07-09 11:08:03'),
(957, 'Walton Avenue Senior H.D.F.C.', 'n', 'n', 'n', 'n', NULL, '2024-07-09 11:10:24', '2024-07-09 11:10:24'),
(958, '43 Charlton LLC', 'n/a', 'n/a', 'n/a', 'na', NULL, '2024-07-10 10:35:55', '2024-07-10 10:35:55'),
(959, 'Raymond and Hillary Friedmann', 'n/a', 'n/a', 'n/a', 'na', NULL, '2024-07-12 09:23:09', '2024-07-12 09:23:09'),
(960, 'Concourse Village INC. C/O Prestige Management, INC.', 'n/a', 'n/a', 'n/a', 'na', NULL, '2024-07-15 12:55:50', '2024-07-15 12:55:50'),
(961, 'Michael Curran Jr.', 'n/a', 'n/a', 'n/a', 'na', NULL, '2024-07-16 12:47:10', '2024-07-16 12:47:10'),
(962, 'Shalhevet Partners LLC', 'n/a', 'n/a', 'n/a', 'na', NULL, '2024-07-17 09:23:02', '2024-07-17 09:23:02'),
(963, 'HOP Energy', 'n/a', 'n/a', 'n/a', 'na', NULL, '2024-07-17 09:56:31', '2024-07-17 09:56:31'),
(964, 'Michael Calhoun', 'n/a', 'n/a', 'na', 'na', NULL, '2024-07-17 10:01:07', '2024-07-17 10:01:07'),
(965, 'Kittay House- Jewish Home Lifecare', 'n/a', 'n/a', 'n/a', 'na', NULL, '2024-07-17 11:50:46', '2024-07-17 11:50:46'),
(966, 'Garumuni Anura Desilva MD PC', 'n/a', 'n/a', 'n/a', 'na', NULL, '2024-07-19 10:04:51', '2024-07-19 10:04:51'),
(967, 'Fairfield Properties NY', 'n/a', 'n/a', 'n/a', 'na', NULL, '2024-07-22 12:49:43', '2024-07-22 12:49:43'),
(968, 'Patricia Esford', 'n/a', 'n/a', 'n/a', 'na', NULL, '2024-07-23 10:25:17', '2024-07-23 10:25:17'),
(969, 'Jason Hall', 'n/a', 'n/a', 'n/a', 'na', NULL, '2024-07-26 09:31:58', '2024-07-26 09:31:58'),
(970, 'Parkchester Preservation Management', 'n/a', 'n/a', 'n/a', 'na', NULL, '2024-07-29 12:38:45', '2024-07-29 12:38:45'),
(971, 'Parkchester Preservation Management', 'n/a', 'n/a', 'n/a', 'na', NULL, '2024-07-29 12:39:50', '2024-07-29 12:39:50'),
(972, 'Suffolk County Water Authority', 'n/a', 'n/a', 'n/a', 'na', NULL, '2024-07-29 15:57:22', '2024-07-29 15:57:22'),
(973, 'Paraco Gas', 'n/a', 'n/a', 'na', 'na', NULL, '2024-07-29 16:02:25', '2024-07-29 16:02:25'),
(974, 'Fay Servicing', 'n/a', 'n/a', 'n/a', 'na', NULL, '2024-07-30 09:33:36', '2024-07-30 09:33:36'),
(975, 'Jimmy Mercado', 'n/a', 'n/a', 'n/a', 'na', NULL, '2024-07-30 16:20:24', '2024-07-30 16:20:24'),
(976, 'New York Central Mutual', 'n/a', 'n/a', 'n/a', 'na', NULL, '2024-07-31 09:22:21', '2024-07-31 09:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `category`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Front Office', 'Dashboard', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(2, 'Back Office', 'Dashboard', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(3, 'Archives', 'Archive', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(4, 'Add Bill', 'Bill', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(5, 'View Bills', 'Bill', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(6, 'Update Bill Status', 'Bill', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(7, 'Recurring Bills', 'Bill', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(8, 'Recycle', 'Bill', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(9, 'Adjustments', 'Finance', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(10, 'Create Cheque', 'Finance', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(11, 'Bank Reconciliation', 'Finance', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(12, 'Monthly Statement', 'Finance', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(13, 'Transactions', 'Finance', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(14, 'Add User', 'User', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(15, 'View Users', 'User', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(16, 'Deposit', 'User', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(17, 'Add Account', 'Account', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(18, 'View Account', 'Account', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(19, 'Add Contact', 'Contact', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(20, 'View Contact', 'Contact', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(21, 'Edit Contact', 'Contact', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(22, 'Delete Contact', 'Contact', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(23, 'Add Lead', 'Lead', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(24, 'View Lead', 'Lead', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(25, 'Edit Lead', 'Lead', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(26, 'Delete Lead', 'Lead', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(27, 'Add Referral', 'Referral', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(28, 'View Referral', 'Referral', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(29, 'Edit Referral', 'Referral', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(30, 'Delete Referral', 'Referral', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(31, 'Add Report', 'Report', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(32, 'View Report', 'Report', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(33, 'Edit Report', 'Report', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(34, 'Delete Report', 'Report', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(35, 'Profile Setting', 'Settings', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(36, 'Roles&Permissions', 'Settings', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(37, 'Manage Categories', 'Settings', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(38, 'Manage Types', 'Settings', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(39, 'Payee List', 'Settings', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(40, 'Follow ups', 'Settings', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(41, 'Drop Box', 'Settings', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(42, 'Logs', 'Settings', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(43, 'Notification View', 'Notifications', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `physicians`
--

CREATE TABLE `physicians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `physician_name` varchar(255) NOT NULL,
  `practice_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `referral_name` varchar(255) NOT NULL,
  `ext` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `physician_address` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `npi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `apt_suite` varchar(255) NOT NULL,
  `patient_ssn` varchar(255) NOT NULL,
  `medicaid_number` varchar(255) NOT NULL,
  `medicaid_plan` varchar(255) NOT NULL,
  `medicare_number` varchar(255) NOT NULL,
  `email_status` varchar(255) DEFAULT NULL,
  `patient_language` varchar(255) DEFAULT NULL,
  `source_type` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `admission_date` varchar(255) DEFAULT NULL,
  `intake` varchar(255) DEFAULT NULL,
  `marketer` varchar(255) DEFAULT NULL,
  `case_type` varchar(255) DEFAULT NULL,
  `trustEsign` varchar(255) DEFAULT NULL,
  `trustFinance` varchar(255) DEFAULT NULL,
  `trustDocument` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `trustCheckList` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `release_notes`
--

CREATE TABLE `release_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `fileUrl` text NOT NULL,
  `object` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `uploaded_by` int(11) NOT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(2, 'moderator', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(3, 'user', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(4, 'vendor', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(5, 'Front office', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27'),
(6, 'Back office', 'web', '2024-07-31 14:41:27', '2024-07-31 14:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 5),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 6),
(3, 1),
(3, 6),
(4, 1),
(4, 3),
(4, 6),
(5, 1),
(5, 2),
(5, 3),
(5, 6),
(6, 1),
(6, 6),
(7, 1),
(7, 2),
(7, 6),
(8, 1),
(8, 6),
(9, 1),
(9, 6),
(10, 1),
(10, 6),
(11, 1),
(11, 6),
(12, 1),
(12, 6),
(13, 1),
(13, 6),
(14, 1),
(14, 6),
(15, 1),
(15, 2),
(15, 6),
(16, 1),
(16, 6),
(17, 1),
(17, 5),
(18, 1),
(18, 5),
(19, 1),
(19, 5),
(20, 1),
(20, 5),
(21, 1),
(21, 5),
(22, 1),
(22, 5),
(23, 1),
(23, 5),
(24, 1),
(24, 5),
(25, 1),
(25, 5),
(26, 1),
(26, 5),
(27, 1),
(27, 5),
(28, 1),
(28, 5),
(29, 1),
(29, 5),
(30, 1),
(30, 5),
(31, 1),
(31, 5),
(32, 1),
(32, 5),
(33, 1),
(33, 5),
(34, 1),
(34, 5),
(35, 1),
(35, 2),
(35, 3),
(35, 4),
(35, 5),
(35, 6),
(36, 1),
(37, 1),
(37, 6),
(38, 1),
(38, 5),
(39, 1),
(39, 6),
(40, 1),
(41, 1),
(41, 6),
(42, 1),
(42, 6),
(43, 1),
(43, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('a28gXcEVYHpUNLuOrNddtcMr1fLplGUbbmjFwUeD', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVGpRVDBDZ002S2FlN2ltdFFoVTFNUVUwUzhhVDQzSVE3NWdRRjllUSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tYWluIjt9czo1OiJhbGVydCI7YTowOnt9czo3OiJsb2dpbklkIjtpOjc7fQ==', 1725457839),
('Qgx9KVGnNx6stTQwd9f7BblLPzsD75sT0JeqbGKK', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRUxaSXpaemR1Y29iRkZteHlDNU5kR2V2cVNlN0ppS0VVU3ZpcU9ZQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NToiYWxlcnQiO2E6MDp7fX0=', 1725456738);

-- --------------------------------------------------------

--
-- Table structure for table `sms_chats`
--

CREATE TABLE `sms_chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `to` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_id` varchar(255) DEFAULT NULL,
  `credit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `debit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `type` varchar(255) DEFAULT NULL,
  `claim_id` int(11) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `deduction` varchar(255) DEFAULT NULL,
  `statusamount` varchar(255) DEFAULT NULL,
  `cbalance` varchar(255) DEFAULT NULL,
  `admin_user_name` varchar(255) DEFAULT NULL,
  `admin_last_name` varchar(255) DEFAULT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `bill_status` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_number` varchar(255) DEFAULT NULL,
  `transaction_type` varchar(255) DEFAULT NULL,
  `chart_of_account` int(11) DEFAULT NULL,
  `sum_of_credit` int(11) NOT NULL DEFAULT 0,
  `transaction_against_category` int(11) DEFAULT NULL,
  `iteration` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `full_ssn` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'User',
  `account_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `user_balance` varchar(5000) NOT NULL DEFAULT '0',
  `date_of_withdrawal` varchar(255) DEFAULT NULL,
  `docs` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `billing_method` varchar(255) DEFAULT 'manual',
  `billing_cycle` varchar(255) DEFAULT NULL,
  `notify_by` varchar(255) NOT NULL DEFAULT 'email',
  `notify_before` int(1) NOT NULL DEFAULT 1,
  `country` varchar(255) DEFAULT NULL,
  `address_2` text DEFAULT NULL,
  `vendor_type_name` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `vendor_type` varchar(255) DEFAULT NULL,
  `registration_fee` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `profile_pic`, `full_ssn`, `dob`, `address`, `state`, `city`, `zipcode`, `email`, `marital_status`, `gender`, `avatar`, `role`, `account_status`, `user_balance`, `date_of_withdrawal`, `docs`, `password`, `created_at`, `updated_at`, `token`, `remember_token`, `phone`, `billing_method`, `billing_cycle`, `notify_by`, `notify_before`, `country`, `address_2`, `vendor_type_name`, `website`, `vendor_type`, `registration_fee`) VALUES
(7, 'SLC', 'Trust', '', NULL, '2000-08-05', 'House #111 Street Jhon Parlor', 'New York', 'New York City', '333232', 'admin@newsystem.com', 'single', '', '93561655300919_avatar.png', 'Admin', 'Approved', '0', '', '[\"intrustpit-Logo.png\"]', '$2y$10$1B7N3C9tOvd81zvvQQbDce.iQl8VfWVu2kOcy0/ibge/0aVpHqkmG', '2022-06-06 18:41:07', '2024-09-04 03:45:54', 'DqnU7OcxhMmSoqDZkiuNzjwCwSPPPFMZlEigaUCb', NULL, '+1(111)111-1111', 'manual', NULL, 'email', 1, NULL, NULL, NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archives`
--
ALTER TABLE `archives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_lists`
--
ALTER TABLE `check_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claims_status`
--
ALTER TABLE `claims_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `closing_balances`
--
ALTER TABLE `closing_balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_e_signs`
--
ALTER TABLE `document_e_signs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drop_boxes`
--
ALTER TABLE `drop_boxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followups`
--
ALTER TABLE `followups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`(191));

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicaids`
--
ALTER TABLE `medicaids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifcations`
--
ALTER TABLE `notifcations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `payee_list`
--
ALTER TABLE `payee_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`(191),`tokenable_id`);

--
-- Indexes for table `physicians`
--
ALTER TABLE `physicians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `release_notes`
--
ALTER TABLE `release_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sms_chats`
--
ALTER TABLE `sms_chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archives`
--
ALTER TABLE `archives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `check_lists`
--
ALTER TABLE `check_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `claims_status`
--
ALTER TABLE `claims_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `closing_balances`
--
ALTER TABLE `closing_balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `document_e_signs`
--
ALTER TABLE `document_e_signs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drop_boxes`
--
ALTER TABLE `drop_boxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followups`
--
ALTER TABLE `followups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicaids`
--
ALTER TABLE `medicaids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `notifcations`
--
ALTER TABLE `notifcations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payee_list`
--
ALTER TABLE `payee_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=977;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `physicians`
--
ALTER TABLE `physicians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `release_notes`
--
ALTER TABLE `release_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sms_chats`
--
ALTER TABLE `sms_chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
