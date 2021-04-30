-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2021 at 07:23 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masterdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_approved_price`
--

CREATE TABLE `tbl_approved_price` (
  `id` int(11) NOT NULL,
  `product_id` varchar(11) NOT NULL,
  `company_code` varchar(10) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_approved_price`
--

INSERT INTO `tbl_approved_price` (`id`, `product_id`, `company_code`, `price`) VALUES
(3, 'rptlcpu', 'balaji', 4000),
(4, 'rptlcpu', 'school', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `id` int(11) NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `state_code` varchar(10) NOT NULL,
  `city_code` varchar(10) NOT NULL,
  `org_code` varchar(10) NOT NULL,
  `branch_code` varchar(10) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-04-03 16:24:43',
  `ip_address` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `country_code`, `state_code`, `city_code`, `org_code`, `branch_code`, `city`, `created_at`, `ip_address`, `status`) VALUES
(1, 'uLgQAq', 'ikLOPQ', 'rKHwf4', 'zCO9DjR1kM', NULL, 'SURAT', '2021-04-03 17:36:50', '::1', '0'),
(2, 'uLgQAq', '1pqtCu', 'RJYf24', 'zCO9DjR1kM', NULL, 'JODHPUR', '2021-04-03 17:37:01', '::1', '0'),
(3, 'uLgQAq', 'ikLOPQ', '0dM9DK', 'zCO9DjR1kM', NULL, 'Rajkot', '2021-04-07 12:24:50', '::1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `id` int(11) NOT NULL,
  `client` varchar(20) NOT NULL,
  `client_code` varchar(10) NOT NULL,
  `org_code` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `Address` varchar(20) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `state_code` varchar(10) NOT NULL,
  `city_code` varchar(10) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `branch_code` varchar(10) NOT NULL,
  `zone_code` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-04-08 16:05:00',
  `ip_address` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`id`, `client`, `client_code`, `org_code`, `email`, `dob`, `Address`, `contact`, `state_code`, `city_code`, `zip_code`, `branch_code`, `zone_code`, `created_at`, `ip_address`, `status`) VALUES
(3, 'navin', 'tBQC', 'zCO9DjR1kM', 'navin@gmail.com', '2021-04-01', 'jadeja home', 9898391884, 'ikLOPQ', 'rKHwf4', 395010, '', '7ULwkV', '2021-04-12 18:27:34', '::1', 0),
(4, 'Darshan', 'wdbR', 'zCO9DjR1kM', 'darshan@gmail.com', '2021-04-14', 'tulsi appartment', 7777981057, 'ikLOPQ', 'rKHwf4', 395011, '', 'eYArsv', '2021-04-13 10:31:45', '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `id` int(11) NOT NULL,
  `company_code` varchar(10) NOT NULL,
  `company` varchar(20) NOT NULL,
  `org_code` varchar(10) NOT NULL,
  `branch_code` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-04-16 08:20:44',
  `ip_address` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`id`, `company_code`, `company`, `org_code`, `branch_code`, `created_at`, `ip_address`, `status`) VALUES
(1, 'chmSej', 'RPTL', 'zCO9DjR1kM', NULL, '2021-04-16 12:17:19', '::1', '0'),
(2, 'T58ns2', 'GTPL', 'zCO9DjR1kM', NULL, '2021-04-16 12:17:36', '::1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `id` int(11) NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `country` varchar(20) NOT NULL,
  `org_code` varchar(10) NOT NULL,
  `branch_code` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-04-03 16:24:44',
  `ip_address` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`id`, `country_code`, `country`, `org_code`, `branch_code`, `created_at`, `ip_address`, `status`) VALUES
(1, 'uLgQAq', 'India', 'zCO9DjR1kM', NULL, '2021-04-03 16:30:15', '::1', '0'),
(2, 'REmL7p', 'Bhutan', 'zCO9DjR1kM', NULL, '2021-04-06 14:15:49', '::1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `id` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `department_code` varchar(10) NOT NULL,
  `org_code` varchar(10) NOT NULL,
  `branch_code` varchar(10) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT '2021-03-26 17:34:02'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `department`, `department_code`, `org_code`, `branch_code`, `ip_address`, `status`, `created_at`) VALUES
(2, 'IT', 'GSbCl9u3Ao', 'zCO9DjR1kM', '', '::1', 0, '2021-03-27 12:19:08'),
(3, 'Sales', 'qPbRnszeWY', 'zCO9DjR1kM', '', '::1', 0, '2021-03-30 10:53:03'),
(4, 'Service', 'wZ2lRDcfgU', 'zCO9DjR1kM', '', '::1', 0, '2021-03-30 10:53:13'),
(5, 'finance', 'p9UzckMgDY', 'zCO9DjR1kM', '', '::1', 0, '2021-04-06 15:57:36'),
(6, 'HR', 'ekDSTqOHpR', 'zCO9DjR1kM', '', '::1', 0, '2021-04-06 16:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE `tbl_designation` (
  `id` int(11) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `designation_code` varchar(10) NOT NULL,
  `org_code` varchar(10) NOT NULL,
  `department_code` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-03-26 17:34:02',
  `ip_address` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `branch_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`id`, `designation`, `designation_code`, `org_code`, `department_code`, `created_at`, `ip_address`, `status`, `branch_code`) VALUES
(3, 'TL', '4VS6lI7auA', 'zCO9DjR1kM', 'GSbCl9u3Ao', '2021-03-27 12:19:33', '::1', 0, ''),
(4, 'SALES EXECUTIVE ', 'ZYvopzg4Ch', 'zCO9DjR1kM', 'qPbRnszeWY', '2021-03-30 10:56:07', '::1', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discussion_with_customer`
--

CREATE TABLE `tbl_discussion_with_customer` (
  `id` int(11) NOT NULL,
  `lead_code` varchar(10) NOT NULL,
  `concerned_person` varchar(10) NOT NULL,
  `quotation_require` varchar(10) NOT NULL,
  `visit_type` varchar(10) NOT NULL,
  `additional_remark` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-04-26 13:27:48'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_discussion_with_customer`
--

INSERT INTO `tbl_discussion_with_customer` (`id`, `lead_code`, `concerned_person`, `quotation_require`, `visit_type`, `additional_remark`, `created_at`) VALUES
(1, '624obv', 'Yes', 'Yes', '1', 'nothing', '2021-04-26 13:27:48'),
(2, '624obv', 'Yes', 'Yes', '1', 'Nothing', '2021-04-26 13:27:48'),
(3, '624obv', 'Yes', 'Yes', '1', 'adsjkg', '2021-04-26 13:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `employee` varchar(20) NOT NULL,
  `employee_code` varchar(10) NOT NULL,
  `org_code` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `Address` varchar(20) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `branch_code` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-03-27 11:04:24',
  `ip_address` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `employee`, `employee_code`, `org_code`, `email`, `dob`, `Address`, `contact`, `branch_code`, `created_at`, `ip_address`, `status`) VALUES
(4, 'vishal', '1iaXnotcFN', 'zCO9DjR1kM', 'vishal@gmail.com', '2021-03-09', 'capital', 9898391884, '', '2021-03-27 12:29:43', '::1', 0),
(5, 'dhruvil', 'L3xmaeDdSf', 'zCO9DjR1kM', 'dhruvil@gmail.com', '2021-03-28', 'parvat patiya', 8980135572, '', '2021-03-30 10:56:56', '::1', 0),
(6, 'praveen', 'qyA5zadmnb', 'zCO9DjR1kM', 'praveenkumar@gmail.c', '2021-04-15', 'dumbhal', 8523697412, '', '2021-04-07 19:25:43', '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense`
--

CREATE TABLE `tbl_expense` (
  `id` int(11) NOT NULL,
  `employee_code` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT '2021-04-26 20:07:31',
  `type` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `amount` int(20) NOT NULL,
  `expense_for` varchar(30) NOT NULL,
  `expense_image` varchar(500) NOT NULL,
  `org_code` varchar(10) NOT NULL,
  `branch_code` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-04-26 20:07:31',
  `ip_address` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_expense`
--

INSERT INTO `tbl_expense` (`id`, `employee_code`, `date`, `type`, `description`, `amount`, `expense_for`, `expense_image`, `org_code`, `branch_code`, `created_at`, `ip_address`, `status`) VALUES
(4, 'L3xmaeDdSf', '2021-04-30 00:00:00', 'Out Of City', 'Travel Charges', 500, 'Bus', 'http://localhost/intran_project/uploads/png/8dc2356417d8dc5a9b584257679bab86.png', 'zCO9DjR1kM', NULL, '2021-04-26 20:07:31', '::1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_followup`
--

CREATE TABLE `tbl_followup` (
  `id` int(11) NOT NULL,
  `lead_code` varchar(10) NOT NULL,
  `quotation_require` varchar(10) NOT NULL,
  `branch_code` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-04-26 13:26:20',
  `ip_address` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_followup`
--

INSERT INTO `tbl_followup` (`id`, `lead_code`, `quotation_require`, `branch_code`, `created_at`, `ip_address`, `status`) VALUES
(1, '624obv', 'Yes', NULL, '2021-04-26 13:26:20', '::1', '0'),
(2, '624obv', 'Yes', NULL, '2021-04-26 13:26:20', '::1', '0'),
(3, '624obv', 'Yes', NULL, '2021-04-26 13:26:20', '::1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_language`
--

CREATE TABLE `tbl_language` (
  `id` int(11) NOT NULL,
  `__key` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_language`
--

INSERT INTO `tbl_language` (`id`, `__key`) VALUES
(18, 'Add'),
(97, 'Add Pincode'),
(61, 'Address'),
(2, 'admin'),
(74, 'Approved Price'),
(99, 'Area'),
(85, 'City'),
(95, 'City Code'),
(96, 'City Data'),
(94, 'City Name'),
(131, 'City Update Form'),
(13, 'Client'),
(105, 'Client Data'),
(80, 'Client Id'),
(15, 'Company'),
(111, 'Company Data'),
(76, 'Company Name'),
(83, 'Country'),
(89, 'Country Code'),
(88, 'Country Data'),
(90, 'Country Name'),
(129, 'Country Update Form'),
(50, 'CreateDate'),
(5, 'Dashboard'),
(43, 'Data'),
(58, 'Date of Birth'),
(106, 'Dealer List'),
(24, 'Delete'),
(8, 'Department'),
(54, 'Department Code'),
(52, 'Department Data'),
(53, 'Department Name'),
(126, 'Department Update Form'),
(81, 'Description'),
(10, 'Designation'),
(77, 'Designation Code'),
(78, 'Designation Data'),
(79, 'Designation Name'),
(127, 'Designation Update Form'),
(67, 'Distributor Price'),
(59, 'Email'),
(9, 'Employee'),
(57, 'Employee Code'),
(60, 'Employee Contact'),
(55, 'Employee Data'),
(56, 'Employee Name'),
(128, 'Employee Update Form'),
(110, 'Expense List'),
(70, 'GST'),
(68, 'HSNCode'),
(1, 'I forgot my password'),
(19, 'ID'),
(71, 'Information'),
(47, 'MAIN NAVIGATION'),
(11, 'Management'),
(6, 'Master'),
(12, 'Menu'),
(48, 'Name'),
(75, 'Option'),
(62, 'Organization Code'),
(46, 'Password'),
(109, 'Pending Quotation List'),
(86, 'Pincode'),
(98, 'Pincode Data'),
(82, 'Price'),
(66, 'Product Code'),
(73, 'Product Document'),
(72, 'Product Image'),
(63, 'Product Information'),
(14, 'Product management'),
(123, 'Product Name'),
(65, 'Product Type'),
(122, 'Product Type Data'),
(124, 'Product Type Name'),
(16, 'ProductType'),
(108, 'Quotation Close List'),
(107, 'Quotation List'),
(3, 'Remember Me'),
(51, 'Role'),
(49, 'Role Code'),
(25, 'Role Data'),
(7, 'Role Name'),
(125, 'Role Update Form'),
(64, 'Select Company'),
(104, 'Select State'),
(44, 'Sign In'),
(4, 'Sign in to start your session'),
(17, 'Sign out'),
(84, 'State'),
(92, 'State Code'),
(91, 'State Data'),
(93, 'State Name'),
(130, 'State Update Form'),
(20, 'Status'),
(101, 'Sub Zone'),
(103, 'Sub-Zone Data Table'),
(42, 'Submit'),
(23, 'Update'),
(45, 'Username'),
(69, 'Weight'),
(87, 'Zone'),
(100, 'Zone Data'),
(102, 'Zone Name');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lead`
--

CREATE TABLE `tbl_lead` (
  `id` int(11) NOT NULL,
  `lead_code` varchar(10) NOT NULL,
  `org_code` varchar(10) NOT NULL,
  `zone_code` varchar(10) NOT NULL,
  `city_code` varchar(10) NOT NULL,
  `zip_code` int(10) NOT NULL,
  `supplier_code` varchar(30) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `company_name` varchar(30) NOT NULL,
  `gst` int(11) NOT NULL,
  `address` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-04-24 08:00:25',
  `ip_address` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_lead`
--

INSERT INTO `tbl_lead` (`id`, `lead_code`, `org_code`, `zone_code`, `city_code`, `zip_code`, `supplier_code`, `brand`, `company_name`, `gst`, `address`, `created_at`, `ip_address`, `status`) VALUES
(1, '624obv', 'zCO9DjR1kM', '7ULwkV', 'rKHwf4', 395010, 'tBQC', '1', 'Som', 10, 'United State of Pandesara', '2021-04-26 13:36:58', '::1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapping_city`
--

CREATE TABLE `tbl_mapping_city` (
  `city_code` varchar(10) NOT NULL,
  `state_code` varchar(10) NOT NULL,
  `country_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_mapping_city`
--

INSERT INTO `tbl_mapping_city` (`city_code`, `state_code`, `country_code`) VALUES
('rKHwf4', 'ikLOPQ', 'uLgQAq'),
('RJYf24', '1pqtCu', 'uLgQAq'),
('0dM9DK', 'ikLOPQ', 'uLgQAq');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapping_employee`
--

CREATE TABLE `tbl_mapping_employee` (
  `employee_code` varchar(10) NOT NULL,
  `role_code` varchar(10) NOT NULL,
  `department_code` varchar(10) NOT NULL,
  `designation_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_mapping_employee`
--

INSERT INTO `tbl_mapping_employee` (`employee_code`, `role_code`, `department_code`, `designation_code`) VALUES
('1iaXnotcFN', 'MTW9fv1N83', 'GSbCl9u3Ao', '4VS6lI7auA'),
('L3xmaeDdSf', 'MTW9fv1N83', 'qPbRnszeWY', 'ZYvopzg4Ch'),
('qyA5zadmnb', 'dgVhBOWZT7', 'ekDSTqOHpR', '4VS6lI7auA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapping_language`
--

CREATE TABLE `tbl_mapping_language` (
  `id` int(11) NOT NULL,
  `__value` varchar(100) DEFAULT NULL,
  `__lang` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_mapping_language`
--

INSERT INTO `tbl_mapping_language` (`id`, `__value`, `__lang`) VALUES
(18, 'Add', 'en'),
(2, 'Admin', 'en'),
(13, 'Client', 'en'),
(15, 'Company', 'en'),
(5, 'Dashboard', 'en'),
(8, 'Department', 'en'),
(10, 'Designation', 'en'),
(9, 'Employee', 'en'),
(1, 'I forgot my password', 'en'),
(19, 'ID', 'en'),
(11, 'Management', 'en'),
(6, 'Master', 'en'),
(12, 'Menu', 'en'),
(14, 'Product management', 'en'),
(16, 'ProductType', 'en'),
(3, 'Remember Me', 'en'),
(7, 'Role Name', 'en'),
(4, 'Sign in to start your session', 'en'),
(17, 'Sign out', 'en'),
(20, 'Status', 'en'),
(4, 'अपना सत्र शुरू करने के लिए साइन इन करें', 'hin'),
(16, 'उत्पाद प्रकार', 'hin'),
(14, 'उत्पाद प्रबंधन', 'hin'),
(15, 'कंपनी', 'hin'),
(9, 'कर्मचारी', 'hin'),
(6, 'गुरुजी', 'hin'),
(13, 'ग्राहक', 'hin'),
(5, 'डैशबोर्ड', 'hin'),
(10, 'पद', 'hin'),
(11, 'प्रबंध', 'hin'),
(17, 'प्रस्थान करें', 'hin'),
(7, 'रोल नेम', 'hin'),
(3, 'मुझे याद रखें', 'hin'),
(12, 'मेन्यू', 'hin'),
(1, 'मैं अपना पासवर्ड भूल गया', 'hin'),
(8, 'डिपार्टमेंट', 'hin'),
(2, 'व्यवस्थापक', 'hin'),
(23, 'Update', 'en'),
(24, 'Delete', 'en'),
(42, 'Submit', 'en'),
(43, 'Data', 'en'),
(18, 'जोड़ना', 'hin'),
(19, 'आईडी', 'hin'),
(20, 'स्थिति', 'hin'),
(23, 'अपडेट करें', 'hin'),
(24, 'हटाना', 'hin'),
(42, 'प्रस्तुत', 'hin'),
(43, 'डेटा', 'hin'),
(44, 'Sign In', 'en'),
(44, 'साइन इन करें', 'hin'),
(45, 'Username', 'en'),
(45, 'यूजरनेम ', 'hin'),
(46, 'Password', 'en'),
(46, 'पासवर्ड', 'hin'),
(47, 'MAIN NAVIGATION', 'en'),
(47, 'मैन नेविगेशन ', 'hin'),
(48, 'Name', 'en'),
(48, 'नेम', 'hin'),
(49, 'Role Code', 'en'),
(49, 'रोल कोड', 'hin'),
(50, 'CreateDate', 'en'),
(50, 'क्रिएट डेट', 'hin'),
(25, 'Role Data', 'en'),
(25, 'रोल डेटा', 'hin'),
(51, 'Role', 'en'),
(51, 'रोल', 'hin'),
(52, 'Department Data', 'en'),
(52, 'डिपार्टमेंट डेटा', 'hin'),
(53, 'Department Name', 'en'),
(54, 'Department Code', 'en'),
(53, 'डिपार्टमेंट नेम', 'hin'),
(54, 'डिपार्टमेंट कोड', 'hin'),
(55, 'Employee Data', 'en'),
(56, 'Employee Name', 'en'),
(55, 'कर्मचारी डेटा', 'hin'),
(56, 'कर्मचारी नेम', 'hin'),
(57, 'Employee Code', 'en'),
(57, 'कर्मचारी कोड', 'hin'),
(58, 'Date of Birth', 'en'),
(59, 'Email', 'en'),
(60, 'Employee Contact', 'en'),
(61, 'Address', 'en'),
(62, 'Organization Code', 'en'),
(58, 'जन्म की तारीख', 'hin'),
(59, 'ईमेल', 'hin'),
(60, 'कर्मचारी संपर्क', 'hin'),
(61, 'पता', 'hin'),
(62, 'संगठन कोड', 'hin'),
(63, 'Product Information', 'en'),
(64, 'Select Company', 'en'),
(65, 'Product Type', 'en'),
(66, 'Product Code', 'en'),
(67, 'Distributor Price', 'en'),
(68, 'HSNCode', 'en'),
(69, 'Weight', 'en'),
(70, 'GST', 'en'),
(71, 'Information', 'en'),
(72, 'Product Image', 'en'),
(73, 'Product Document', 'en'),
(74, 'Approved Price', 'en'),
(75, 'Option', 'en'),
(76, 'Company Name', 'en'),
(71, 'जानकारी', 'hin'),
(72, 'प्रोडक्ट इमेज', 'hin'),
(73, 'प्रोडक्ट डॉक्यूमेंट', 'hin'),
(74, 'मंजूर कीमत', 'hin'),
(75, 'विकल्प', 'hin'),
(76, 'कंपनी का नाम', 'hin'),
(63, 'उत्पाद की जानकारी', 'hin'),
(64, 'कंपनी का चयन करें', 'hin'),
(66, 'उत्पाद कोड', 'hin'),
(67, 'वितरक मूल्य', 'hin'),
(68, 'एच एस एन कोड', 'hin'),
(69, 'वजन', 'hin'),
(70, 'जीएसटी', 'hin'),
(65, 'उत्पादप्रकार', 'hin'),
(77, 'Designation Code', 'en'),
(77, 'पद का कोड', 'hin'),
(78, 'Designation Data', 'en'),
(78, 'पद डेटा', 'hin'),
(79, 'Designation Name', 'en'),
(79, 'पद नाम', 'hin'),
(80, 'Client Id', 'en'),
(80, 'ग्राहक आईडी', 'hin'),
(81, 'Description', 'en'),
(81, 'विवरण', 'hin'),
(82, 'Price', 'en'),
(82, 'कीमत', 'hin'),
(83, 'Country', 'en'),
(84, 'State', 'en'),
(85, 'City', 'en'),
(86, 'Pincode', 'en'),
(87, 'Zone', 'en'),
(83, 'देश', 'hin'),
(84, 'राज्य', 'hin'),
(85, 'सीटी', 'hin'),
(86, 'पिनकोड', 'hin'),
(87, 'जोन', 'hin'),
(88, 'Country Data', 'en'),
(89, 'Country Code', 'en'),
(90, 'Country Name', 'en'),
(88, 'देश डेटा', 'hin'),
(89, 'देश का नाम', 'hin'),
(90, 'देश कोड', 'hin'),
(91, 'State Data', 'en'),
(91, 'राज्य डेटा', 'hin'),
(92, 'State Code', 'en'),
(92, 'राज्य कोड', 'hin'),
(93, 'State Name', 'en'),
(93, 'राज्य का नाम', 'hin'),
(94, 'City Name', 'en'),
(95, 'City Code', 'en'),
(96, 'City Data', 'en'),
(97, 'Add Pincode', 'en'),
(94, 'शहर का नाम', 'hin'),
(95, 'शहर का कोड', 'hin'),
(96, 'शहर का डेटा', 'hin'),
(97, 'पिनकोड जोड़ें', 'hin'),
(98, 'Pincode Data', 'en'),
(99, 'Area', 'en'),
(98, 'पिनकोड डेटा', 'hin'),
(99, 'क्षेत्र', 'hin'),
(100, 'Zone Data', 'en'),
(101, 'Sub Zone', 'en'),
(100, 'जोन डेटा', 'hin'),
(101, 'उप क्षेत्र', 'hin'),
(102, 'Zone Name', 'en'),
(103, 'Sub-Zone Data Table', 'en'),
(102, 'क्षेत्र का नाम', 'hin'),
(103, 'सब-जोन डाटा टेबल', 'hin'),
(104, 'Select State', 'en'),
(104, 'राज्य चुनें', 'hin'),
(105, 'Client Data', 'en'),
(106, 'Dealer List', 'en'),
(107, 'Quotation List', 'en'),
(108, 'Quotation Close List', 'en'),
(109, 'Pending Quotation List', 'en'),
(110, 'Expense List', 'en'),
(111, 'Company Data', 'en'),
(111, 'कंपनी डेटा', 'hin'),
(122, 'Product Type Data', 'en'),
(122, '\r\nउत्पाद प्रकार डेटा', 'hin'),
(123, 'Product Name', 'en'),
(123, 'उत्पाद का नाम\r\n', 'hin'),
(124, 'Product Type Name', 'en'),
(124, 'उत्पाद प्रकार का नाम\r\n', 'hin'),
(125, 'Role Update Form', 'en'),
(125, 'रोल अपडेट फॉर्म\r\n', 'hin'),
(126, 'Department Update Form', 'en'),
(126, 'विभाग अद्यतन प्रपत्र\r\n', 'hin'),
(127, 'Designation Update Form', 'en'),
(127, 'पदनाम अद्यतन प्रपत्र\r\n', 'hin'),
(128, 'Employee Update Form', 'en'),
(128, 'कर्मचारी अद्यतन प्रपत्र\r\n', 'hin'),
(129, 'Country Update Form', 'en'),
(129, 'देश अद्यतन प्रपत्र\r\n', 'hin'),
(130, 'State Update Form', 'en'),
(130, 'स्टेट अपडेट फॉर्म\r\n', 'hin'),
(131, 'City Update Form', 'en'),
(131, 'सिटी अपडेट फॉर्म\r\n', 'hin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapping_lead`
--

CREATE TABLE `tbl_mapping_lead` (
  `lead_code` varchar(10) NOT NULL,
  `person_name` varchar(30) NOT NULL,
  `designation` varchar(10) NOT NULL,
  `mobile_no` bigint(10) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_mapping_lead`
--

INSERT INTO `tbl_mapping_lead` (`lead_code`, `person_name`, `designation`, `mobile_no`, `email`) VALUES
('624obv', 'Sourav', 'Manager', 123456789, 'sourav@gmail.com'),
('624obv', 'Vishal', 'SalesManag', 123456789, 'vishal@gmail.com'),
('624obv', '', '', 0, ''),
('624obv', '', '', 0, ''),
('624obv', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migrations`
--

CREATE TABLE `tbl_migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_migrations`
--

INSERT INTO `tbl_migrations` (`version`) VALUES
(20210426200043);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organization`
--

CREATE TABLE `tbl_organization` (
  `id` int(11) NOT NULL,
  `org_code` varchar(10) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_email` varchar(50) NOT NULL,
  `client_mobileno` bigint(10) NOT NULL,
  `emergency_contact` bigint(10) NOT NULL,
  `no_branch` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Panding',
  `ip_address` varchar(20) NOT NULL,
  `regdate` date NOT NULL DEFAULT '2021-03-26',
  `validity` date NOT NULL,
  `logo` varchar(300) NOT NULL,
  `url` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-03-26 17:34:02'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_organization`
--

INSERT INTO `tbl_organization` (`id`, `org_code`, `org_name`, `address`, `client_name`, `client_email`, `client_mobileno`, `emergency_contact`, `no_branch`, `status`, `ip_address`, `regdate`, `validity`, `logo`, `url`, `created_at`) VALUES
(3, 'zCO9DjR1kM', 'reputable', 'jfghjdsfjsf', 'dhruvil', 'dhruvil@gmail.com', 9924987162, 9924987162, 2, 'Active', '::1', '2021-03-20', '2021-03-29', 'http://[::1]/intran_project/uploads/Screenshot_2020-11-28_1137172.png', 'www.google.com', '2021-03-26 17:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pincode`
--

CREATE TABLE `tbl_pincode` (
  `id` int(11) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `area` varchar(50) NOT NULL,
  `city_code` varchar(10) NOT NULL,
  `org_code` varchar(10) NOT NULL,
  `branch_code` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-04-03 16:24:44',
  `ip_address` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pincode`
--

INSERT INTO `tbl_pincode` (`id`, `zip_code`, `area`, `city_code`, `org_code`, `branch_code`, `created_at`, `ip_address`, `status`) VALUES
(1, '395010', 'parvat patiya', 'rKHwf4', 'zCO9DjR1kM', NULL, '2021-04-03 19:06:26', '::1', '0'),
(8, '395010', 'Dumbhal', '1', 'zCO9DjR1kM', NULL, '2021-04-07 18:27:59', '::1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `product_type` varchar(20) NOT NULL,
  `product` varchar(20) NOT NULL,
  `company` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `distributor_price` int(10) NOT NULL,
  `HSN_code` int(10) NOT NULL,
  `weight` int(10) NOT NULL,
  `GST` int(10) NOT NULL,
  `information` varchar(50) NOT NULL,
  `product_image` text NOT NULL,
  `product_document` text DEFAULT NULL,
  `org_code` varchar(10) NOT NULL,
  `branch_code` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-04-16 08:20:43',
  `ip_address` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `product_code`, `product_type`, `product`, `company`, `description`, `price`, `distributor_price`, `HSN_code`, `weight`, `GST`, `information`, `product_image`, `product_document`, `org_code`, `branch_code`, `created_at`, `ip_address`, `status`) VALUES
(23, '5464sd', '2', 'vishal', 'chmSej', 'jhgh', 5200, 4200, 85247, 50, 5863217, 'gyugujhb', '', NULL, 'zCO9DjR1kM', NULL, '2021-04-16 16:23:50', '::1', '0'),
(24, 'vs5465', '2', 'test2', 'chmSej', 'nfkjnkgf', 515, 555, 554541, 56, 13135151, 'skgfnjdngijg', 'http://localhost/intran_project/uploads/Screenshot_2020-11-28_1137173.png', NULL, 'zCO9DjR1kM', NULL, '2021-04-16 16:40:51', '::1', '0'),
(25, '454654', '2', 'smfkfg m', 'chmSej', 'dflksngdfnb', 1565, 5132, 5121551, 45, 65452, 'lkfdjkdfgkf;lv,s', 'http://localhost/intran_project/uploads/', NULL, 'zCO9DjR1kM', NULL, '2021-04-17 12:08:03', '::1', '0'),
(26, 'gtpltv', '1', 'TV', 'T58ns2', 'mast he lelo', 50000, 400000, 123456, 2, 18, 'colorful tv', '<p>The filetype you are attempting to upload is not allowed.</p>', NULL, 'zCO9DjR1kM', NULL, '2021-04-25 09:09:29', '::1', '0'),
(27, 'rptlcpu', '2', 'cpu', 'chmSej', 'mast he', 4000, 2000, 569721, 2, 18, 'mast he bhai', 'http://localhost/intran_project/uploads/png/e64317086183fa6e3c5648e87c20310c.png', 'http://localhost/intran_project/uploads/png/db00b28433ba8b2189ebf5dda033cd8e.png', 'zCO9DjR1kM', NULL, '2021-04-25 09:13:27', '::1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_type`
--

CREATE TABLE `tbl_product_type` (
  `id` int(11) NOT NULL,
  `company_code` varchar(20) NOT NULL,
  `product_type` varchar(20) NOT NULL,
  `org_code` varchar(10) NOT NULL,
  `branch_code` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-04-16 08:20:45',
  `ip_address` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product_type`
--

INSERT INTO `tbl_product_type` (`id`, `company_code`, `product_type`, `org_code`, `branch_code`, `created_at`, `ip_address`, `status`) VALUES
(1, 'T58ns2', 'machinary', 'zCO9DjR1kM', NULL, '2021-04-16 12:17:53', '::1', '0'),
(2, 'chmSej', 'spair parts', 'zCO9DjR1kM', NULL, '2021-04-16 12:18:03', '::1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation`
--

CREATE TABLE `tbl_quotation` (
  `id` int(11) NOT NULL,
  `lead_code` varchar(10) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `approved_price` varchar(10) NOT NULL,
  `rate` int(11) NOT NULL,
  `discount_type` varchar(10) NOT NULL,
  `discount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-04-26 13:28:02',
  `quotation_close_date` datetime DEFAULT NULL,
  `ip_address` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '0',
  `quotation_status` varchar(15) DEFAULT NULL,
  `invoice_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_quotation`
--

INSERT INTO `tbl_quotation` (`id`, `lead_code`, `product_code`, `quantity`, `price`, `approved_price`, `rate`, `discount_type`, `discount`, `total`, `created_at`, `quotation_close_date`, `ip_address`, `status`, `quotation_status`, `invoice_number`) VALUES
(1, '624obv', 'rptlcpu', 3, 4000, '4000', 4000, 'amount', 600, 11400, '2021-04-26 13:28:02', '2021-04-30 18:36:13', '', '1', '1', ''),
(3, '624obv', 'rptlcpu', 2, 4000, '5000', 5000, 'amount', 600, 9400, '2021-04-26 13:28:02', '2021-04-30 18:36:13', '::1', '1', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `role_code` varchar(10) NOT NULL,
  `org_code` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-03-26 11:43:14',
  `ip_address` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `branch_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `role`, `role_code`, `org_code`, `created_at`, `ip_address`, `status`, `branch_code`) VALUES
(3, 'employee', 'MTW9fv1N83', 'zCO9DjR1kM', '2021-03-27 12:18:39', '::1', 0, ''),
(4, 'Admin', 'bHmMqGiOQf', 'zCO9DjR1kM', '2021-03-30 10:51:43', '::1', 0, ''),
(5, 'manager', 'dgVhBOWZT7', 'zCO9DjR1kM', '2021-04-06 16:31:27', '::1', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `id` int(11) NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `state_code` varchar(10) NOT NULL,
  `org_code` varchar(10) NOT NULL,
  `branch_code` varchar(10) DEFAULT NULL,
  `state` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-04-03 16:24:43',
  `ip_address` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`id`, `country_code`, `state_code`, `org_code`, `branch_code`, `state`, `created_at`, `ip_address`, `status`) VALUES
(1, 'uLgQAq', 'ikLOPQ', 'zCO9DjR1kM', NULL, 'GUJARAT', '2021-04-03 17:36:02', '::1', '0'),
(2, 'uLgQAq', '1pqtCu', 'zCO9DjR1kM', NULL, 'RAJASTHAN', '2021-04-03 17:36:30', '::1', '0'),
(3, 'REmL7p', 'eogsdP', 'zCO9DjR1kM', NULL, 'bhut', '2021-04-06 16:05:13', '::1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `org_code` varchar(10) NOT NULL,
  `branch_code` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'Admin',
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-03-27 11:04:24',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `password_flag` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `org_code`, `branch_code`, `role`, `username`, `password`, `ip_address`, `created_at`, `status`, `password_flag`) VALUES
(1, 'zCO9DjR1kM', '', 'Admin', 'zCO9DjR1kM', 'praveen', '::1', '2021-03-27 11:04:24', 0, 1),
(3, 'zCO9DjR1kM', '', 'MTW9fv1N83', '1iaXnotcFN', 'praveen', '::1', '2021-03-27 12:29:43', 0, 1),
(4, 'zCO9DjR1kM', '', 'MTW9fv1N83', 'L3xmaeDdSf', 'praveen', '::1', '2021-03-30 10:56:56', 0, 1),
(5, 'zCO9DjR1kM', '', 'dgVhBOWZT7', 'qyA5zadmnb', 'praveen', '::1', '2021-04-07 19:25:43', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visit_type`
--

CREATE TABLE `tbl_visit_type` (
  `id` int(11) NOT NULL,
  `visit_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_zone`
--

CREATE TABLE `tbl_zone` (
  `id` int(11) NOT NULL,
  `zone_code` varchar(10) NOT NULL,
  `zone` varchar(20) NOT NULL,
  `state_code` varchar(50) DEFAULT NULL,
  `employee` varchar(20) NOT NULL,
  `parent` varchar(20) DEFAULT NULL,
  `org_code` varchar(10) NOT NULL,
  `branch_code` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-04-07 18:11:34',
  `ip_address` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_zone`
--

INSERT INTO `tbl_zone` (`id`, `zone_code`, `zone`, `state_code`, `employee`, `parent`, `org_code`, `branch_code`, `created_at`, `ip_address`, `status`) VALUES
(3, '5akf1b', 'Gujarat', '', 'qyA5zadmnb', NULL, 'zCO9DjR1kM', NULL, '2021-04-08 20:16:19', '::1', '0'),
(7, 'eaEdkf', 'vapi zone', 'rKHwf4', 'qyA5zadmnb', '5akf1b', 'zCO9DjR1kM', NULL, '2021-04-09 11:39:17', '::1', '0'),
(8, '7ULwkV', 'rajkot', 'rKHwf4', 'qyA5zadmnb', '5akf1b', 'zCO9DjR1kM', NULL, '2021-04-09 12:05:05', '::1', '0'),
(9, 'klemVi', 'maharastra', NULL, 'qyA5zadmnb', NULL, 'zCO9DjR1kM', NULL, '2021-04-09 12:09:25', '::1', '0'),
(10, 'eYArsv', 'kaka', 'rKHwf4,0dM9DK', 'qyA5zadmnb', '5akf1b', 'zCO9DjR1kM', NULL, '2021-04-09 13:01:25', '::1', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_approved_price`
--
ALTER TABLE `tbl_approved_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `city_code` (`city_code`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `client_code` (`client_code`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_code` (`company_code`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country_code` (`country_code`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department_code` (`department_code`);

--
-- Indexes for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designation_code` (`designation_code`);

--
-- Indexes for table `tbl_discussion_with_customer`
--
ALTER TABLE `tbl_discussion_with_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_code` (`employee_code`);

--
-- Indexes for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_followup`
--
ALTER TABLE `tbl_followup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_language`
--
ALTER TABLE `tbl_language`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `__key` (`__key`);

--
-- Indexes for table `tbl_lead`
--
ALTER TABLE `tbl_lead`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lead_code` (`lead_code`);

--
-- Indexes for table `tbl_mapping_language`
--
ALTER TABLE `tbl_mapping_language`
  ADD UNIQUE KEY `__value` (`__value`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tbl_organization`
--
ALTER TABLE `tbl_organization`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `org_code` (`org_code`);

--
-- Indexes for table `tbl_pincode`
--
ALTER TABLE `tbl_pincode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indexes for table `tbl_product_type`
--
ALTER TABLE `tbl_product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_quotation`
--
ALTER TABLE `tbl_quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_code` (`role_code`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `state_code` (`state_code`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_visit_type`
--
ALTER TABLE `tbl_visit_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_zone`
--
ALTER TABLE `tbl_zone`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `zone_code` (`zone_code`),
  ADD UNIQUE KEY `zone` (`zone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_approved_price`
--
ALTER TABLE `tbl_approved_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_discussion_with_customer`
--
ALTER TABLE `tbl_discussion_with_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_followup`
--
ALTER TABLE `tbl_followup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_language`
--
ALTER TABLE `tbl_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `tbl_lead`
--
ALTER TABLE `tbl_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_organization`
--
ALTER TABLE `tbl_organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pincode`
--
ALTER TABLE `tbl_pincode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_product_type`
--
ALTER TABLE `tbl_product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_quotation`
--
ALTER TABLE `tbl_quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_visit_type`
--
ALTER TABLE `tbl_visit_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_zone`
--
ALTER TABLE `tbl_zone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
