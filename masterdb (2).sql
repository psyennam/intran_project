-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2021 at 12:08 PM
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
(1, 'bodybsf10', 'Mahalaxmi', 5400),
(2, 'bodybsf10', 'audi Thane', 5300),
(3, 'cy1234', 'Atlas', 15200),
(4, 'cy1234', 'hero', 15300);

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
(1, 'Mv863a', 'kuKq7t', '1JMkYO', 'IrgTAienWP', NULL, 'Surat', '2021-05-06 12:47:09', '::1', '0'),
(2, 'Mv863a', 'kuKq7t', 'Wt7Vhv', 'IrgTAienWP', NULL, 'Vapi', '2021-05-06 12:47:22', '::1', '0'),
(3, 'Mv863a', 'dHvzbW', 'J2yPBH', 'IrgTAienWP', NULL, 'Udaipur', '2021-05-06 12:47:53', '::1', '0'),
(4, 'Mv863a', 'kuKq7t', 'MH4OPm', 'IrgTAienWP', NULL, 'Jaislmaer', '2021-05-06 12:48:13', '::1', '0'),
(5, 'Mv863a', 'a4F2Kx', '4ZXg0K', 'IrgTAienWP', NULL, 'Patiala ', '2021-05-06 12:48:37', '::1', '0'),
(6, 'Mv863a', 'Bh1UX4', 'sdmVRh', 'IrgTAienWP', NULL, 'gangtok', '2021-05-06 12:49:17', '::1', '0');

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
  `zip_code` varchar(10) NOT NULL,
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
(2, 'navin', 'J9jQ', 'IrgTAienWP', 'navin@gmail.com', '2021-05-19', '202-Adajan', 7777981058, '', '1JMkYO', '395486', '', 'sDcEWZ', '2021-05-06 14:46:02', '::1', 0),
(3, 'sahil', 'Mi1G', 'IrgTAienWP', 'sahil096@gmail.com', '2021-05-12', 'navsari', 7777981058, '', '1JMkYO', '40095', '', 'sDcEWZ', '2021-05-08 12:35:34', '::1', 0),
(4, 'kaka', 'oq5Z', 'IrgTAienWP', 'kka@gmail.com', '2021-05-04', 'munjala', 9898391884, '', '4ZXg0K', '789654', '', '52VJpx', '2021-05-08 12:37:21', '::1', 0),
(5, 'sunil', 'Ha4c', 'IrgTAienWP', 'sunil@gmail.com', '2021-05-08', 'vurdavan park', 7777981058, '', '1JMkYO', '395010', '', 'sDcEWZ', '2021-05-08 12:58:15', '::1', 0);

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
(1, 'oOkVMj', 'Dent Master', 'IrgTAienWP', NULL, '2021-05-06 14:29:44', '::1', '0'),
(2, 'Wrjmav', 'Equip Master', 'IrgTAienWP', NULL, '2021-05-06 14:30:01', '::1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `id` int(11) NOT NULL,
  `complaint_code` varchar(10) NOT NULL,
  `customer_code` varchar(10) NOT NULL,
  `invoice_number` varchar(10) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `org_code` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` bigint(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `branch_code` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-05-12 12:41:09',
  `ip_address` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`id`, `complaint_code`, `customer_code`, `invoice_number`, `product_code`, `org_code`, `email`, `mobile_no`, `subject`, `description`, `branch_code`, `created_at`, `ip_address`, `status`) VALUES
(1, 'duqF1r', 'tKiDFa', '5eFTOr', 'cy1234', 'IrgTAienWP', 'dhruvilp096@gmail.com', 9876541372, 'shipping', 'packing is not proper', NULL, '2021-05-12 12:41:09', '::1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint_tracking`
--

CREATE TABLE `tbl_complaint_tracking` (
  `id` int(11) NOT NULL,
  `complaint_code` varchar(11) NOT NULL,
  `employee_code` varchar(10) NOT NULL,
  `assigned_by` varchar(15) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-05-12 12:41:10',
  `ip_address` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_complaint_tracking`
--

INSERT INTO `tbl_complaint_tracking` (`id`, `complaint_code`, `employee_code`, `assigned_by`, `remark`, `created_at`, `ip_address`, `status`) VALUES
(4, 'duqF1r', 'DiKHcQsNlm', 'RQ96vjiUA1', 'packing is not proper', '2021-05-12 12:41:10', '::1', '1'),
(13, 'duqF1r', 'DiKHcQsNlm', 'RQ96vjiUA1', 'ratan bhai is on fire', '2021-05-12 12:41:10', '::1', '2');

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
(1, 'Mv863a', 'India', 'IrgTAienWP', NULL, '2021-05-06 12:45:33', '::1', '0');

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
(1, 'Sales', 'xMeoO4869K', 'IrgTAienWP', '', '::1', 0, '2021-05-06 12:51:35'),
(2, 'Service', 'ltgO8j0fFJ', 'IrgTAienWP', '', '::1', 0, '2021-05-06 12:51:44');

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
(1, 'TL', 'WrzsZAcyKw', 'IrgTAienWP', 'xMeoO4869K', '2021-05-06 13:02:28', '::1', 0, ''),
(2, 'Sales Manager', 'D5zxXjmFwr', 'IrgTAienWP', 'xMeoO4869K', '2021-05-06 13:04:17', '::1', 0, ''),
(3, 'Chief Technician ', 'eorwShQHM3', 'IrgTAienWP', 'ltgO8j0fFJ', '2021-05-06 13:04:45', '::1', 0, ''),
(4, 'Service Technician', 'kYcvM0wZIP', 'IrgTAienWP', 'ltgO8j0fFJ', '2021-05-06 13:05:07', '::1', 0, ''),
(5, 'Manager', 'IlM0ESKjQX', 'IrgTAienWP', 'ltgO8j0fFJ', '2021-05-12 13:07:06', '::1', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discussion_with_customer`
--

CREATE TABLE `tbl_discussion_with_customer` (
  `id` int(11) NOT NULL,
  `lead_code` varchar(10) NOT NULL,
  `customer_available` varchar(20) NOT NULL,
  `concerned_person` varchar(10) NOT NULL,
  `contact_person` varchar(20) DEFAULT NULL,
  `quotation_require` varchar(10) NOT NULL,
  `visit_type` int(10) NOT NULL,
  `additional_remark` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-05-01 20:01:08'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_discussion_with_customer`
--

INSERT INTO `tbl_discussion_with_customer` (`id`, `lead_code`, `customer_available`, `concerned_person`, `contact_person`, `quotation_require`, `visit_type`, `additional_remark`, `created_at`) VALUES
(1, 'tKiDFa', 'Customer Availabel', 'Yes', NULL, 'Yes', 1, 'person is same and good', '2021-05-01 20:01:08'),
(2, 'tKiDFa', 'Customer Availabel', 'Yes', NULL, 'Yes', 1, 'person is same and good', '2021-05-01 20:01:08'),
(3, 'tKiDFa', 'Customer Availabel', 'Yes', NULL, 'Yes', 1, 'okk', '2021-05-01 20:01:08'),
(4, 'YWCbU4', 'Customer Availabel', 'Yes', NULL, 'Yes', 2, 'nice', '2021-05-01 20:01:08'),
(5, 'YWCbU4', 'Customer Availabel', 'Yes', 'manan', 'Yes', 1, 'hows the joshhh', '2021-05-01 20:01:08'),
(6, 'tKiDFa', 'Customer Availabel', 'Yes', 'dhruvil', 'Yes', 1, 'hey', '2021-05-01 20:01:08'),
(7, 'tKiDFa', 'Customer Availabel', 'Yes', 'vishal', 'Yes', 1, 'hey', '2021-05-01 20:01:08');

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
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `privileges` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `employee`, `employee_code`, `org_code`, `email`, `dob`, `Address`, `contact`, `branch_code`, `created_at`, `ip_address`, `status`, `privileges`) VALUES
(1, 'Ramesh', '4T0XbNrulP', 'IrgTAienWP', 'ramesh@gmail.com', '2021-05-06', '201,priyanka soc. ', 9898391884, '', '2021-05-06 13:13:55', '::1', 0, 'C,R,U'),
(2, 'Somprakash', 'OmEnVZ4pPo', 'IrgTAienWP', 'som@gmail.com', '2021-05-06', 'pandesara', 1234567891, '', '2021-05-06 13:14:44', '::1', 0, ''),
(3, 'saurav', 'OGblp5Ua8Y', 'IrgTAienWP', 'saurav@gmail.com', '2021-05-07', 'pandesara', 1234569754, '', '2021-05-06 13:15:26', '::1', 0, ''),
(4, 'praveen', '8OvW1X2ibI', 'IrgTAienWP', 'praveenkumar@gmail.c', '2021-05-19', 'aspas', 3214569872, '', '2021-05-06 13:16:22', '::1', 0, ''),
(5, 'kirtan', 'FDzdJPsCHY', 'IrgTAienWP', 'kirtan@gmail.com', '2021-05-10', 'tulsi appartment', 8523697412, '', '2021-05-06 14:11:51', '::1', 0, ''),
(6, 'mona', 'G3TgBntqeZ', 'IrgTAienWP', 'mona@gmail.com', '2021-04-30', 'pal adajan', 1236548521, '', '2021-05-08 08:53:46', '::1', 0, ''),
(7, 'sonalika', '72lCBE3FVs', 'IrgTAienWP', 'sonu@gmail.com', '2021-05-19', 'mumbai', 14789632584, '', '2021-05-08 08:58:00', '::1', 0, ''),
(8, 'taher', '4lLjJeDysQ', 'IrgTAienWP', 'taher@gmail.com', '2021-05-12', 'begampura', 3698521475, '', '2021-05-11 10:38:24', '::1', 0, ''),
(9, 'monika', 'RQ96vjiUA1', 'IrgTAienWP', 'm@gmail.com', '2021-04-27', 'parvat patiya', 1593578622, '', '2021-05-12 13:08:08', '::1', 0, ''),
(10, 'krimal', 'P8n7HtDmpA', 'IrgTAienWP', 'krimal@gmail.com', '2021-05-13', 'tulsi', 789256314, '', '2021-05-12 15:10:42', '::1', 0, ''),
(11, 'kartik', 'DiKHcQsNlm', 'IrgTAienWP', 'kartik@gmail.com', '2021-05-14', 'tulsi', 1598523642, '', '2021-05-12 15:11:23', '::1', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense`
--

CREATE TABLE `tbl_expense` (
  `id` int(11) NOT NULL,
  `employee_code` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT '2021-05-01 20:01:08',
  `type` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `amount` int(20) NOT NULL,
  `expense_for` varchar(30) NOT NULL,
  `expense_image` varchar(500) NOT NULL,
  `org_code` varchar(10) NOT NULL,
  `branch_code` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-05-01 20:01:08',
  `ip_address` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_followup`
--

CREATE TABLE `tbl_followup` (
  `id` int(11) NOT NULL,
  `visit_type` int(10) NOT NULL,
  `customer_available` varchar(20) NOT NULL,
  `lead_code` varchar(10) NOT NULL,
  `concerned_person` varchar(10) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `contact_person` varchar(20) DEFAULT NULL,
  `quotation_require` varchar(10) NOT NULL,
  `additional_remark` varchar(100) DEFAULT NULL,
  `branch_code` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-05-01 20:01:07',
  `ip_address` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_followup`
--

INSERT INTO `tbl_followup` (`id`, `visit_type`, `customer_available`, `lead_code`, `concerned_person`, `location`, `contact_person`, `quotation_require`, `additional_remark`, `branch_code`, `created_at`, `ip_address`, `status`) VALUES
(1, 1, 'Customer Availabel', 'tKiDFa', 'Yes', NULL, NULL, 'Yes', 'person is same and good', NULL, '2021-05-01 20:01:07', '::1', '0'),
(2, 1, 'Customer Availabel', 'tKiDFa', 'Yes', NULL, NULL, 'Yes', 'person is same and good', NULL, '2021-05-01 20:01:07', '::1', '0'),
(3, 1, 'Customer Availabel', 'tKiDFa', 'Yes', NULL, NULL, 'Yes', 'okk', NULL, '2021-05-01 20:01:07', '::1', '0'),
(4, 2, 'Customer Availabel', 'YWCbU4', 'Yes', NULL, NULL, 'Yes', 'nice', NULL, '2021-05-01 20:01:07', '::1', '0'),
(5, 1, 'Customer Availabel', 'YWCbU4', 'Yes', NULL, 'manan', 'Yes', 'hows the joshhh', NULL, '2021-05-01 20:01:07', '::1', '0'),
(6, 1, 'Customer Availabel', 'tKiDFa', 'Yes', NULL, 'dhruvil', 'Yes', 'hey', NULL, '2021-05-01 20:01:07', '::1', '0'),
(7, 1, 'Customer Availabel', 'tKiDFa', 'Yes', NULL, 'vishal', 'Yes', 'hey', NULL, '2021-05-01 20:01:07', '::1', '0');

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
  `supplier_code` varchar(30) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `city_code` varchar(10) NOT NULL,
  `zip_code` int(10) NOT NULL,
  `company_name` varchar(30) NOT NULL,
  `gst` int(11) NOT NULL,
  `address` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-04-23 19:01:30',
  `ip_address` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_lead`
--

INSERT INTO `tbl_lead` (`id`, `lead_code`, `org_code`, `zone_code`, `supplier_code`, `brand`, `city_code`, `zip_code`, `company_name`, `gst`, `address`, `created_at`, `ip_address`, `status`) VALUES
(1, 'tKiDFa', 'IrgTAienWP', 'sDcEWZ', 'J9jQ', '1', '1JMkYO', 395486, 'navin&mavin', 18, '201,Adajan', '2021-05-06 14:53:58', '::1', '0'),
(2, 'YWCbU4', 'IrgTAienWP', 'sDcEWZ', 'J9jQ', '1', '1JMkYO', 395486, 'mohan', 10, '502,Priyanka', '2021-05-07 13:01:24', '::1', '0');

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
('1JMkYO', 'kuKq7t', 'Mv863a'),
('Wt7Vhv', 'kuKq7t', 'Mv863a'),
('J2yPBH', 'dHvzbW', 'Mv863a'),
('MH4OPm', 'kuKq7t', 'Mv863a'),
('4ZXg0K', 'a4F2Kx', 'Mv863a'),
('sdmVRh', 'Bh1UX4', 'Mv863a');

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
('4T0XbNrulP', 'xLzyqGojsn', 'xMeoO4869K', 'WrzsZAcyKw'),
('OmEnVZ4pPo', 'xLzyqGojsn', 'ltgO8j0fFJ', 'WrzsZAcyKw'),
('OGblp5Ua8Y', 'xLzyqGojsn', 'ltgO8j0fFJ', 'eorwShQHM3'),
('8OvW1X2ibI', 'xLzyqGojsn', 'xMeoO4869K', 'D5zxXjmFwr'),
('FDzdJPsCHY', 'xLzyqGojsn', 'xMeoO4869K', 'D5zxXjmFwr'),
('G3TgBntqeZ', 'xLzyqGojsn', 'ltgO8j0fFJ', 'D5zxXjmFwr'),
('72lCBE3FVs', 'xLzyqGojsn', 'xMeoO4869K', 'D5zxXjmFwr'),
('4lLjJeDysQ', 'xLzyqGojsn', 'ltgO8j0fFJ', 'eorwShQHM3'),
('RQ96vjiUA1', 'xLzyqGojsn', 'ltgO8j0fFJ', 'IlM0ESKjQX'),
('P8n7HtDmpA', 'xLzyqGojsn', 'ltgO8j0fFJ', 'kYcvM0wZIP'),
('DiKHcQsNlm', 'xLzyqGojsn', 'ltgO8j0fFJ', 'kYcvM0wZIP');

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
('tKiDFa', 'vishal', 'manager', 9876541230, 'vishal@gmail.com'),
('tKiDFa', 'dhruvil', 'sales', 9876541232, 'dhruvil@gmail.com'),
('tKiDFa', '', '', 0, ''),
('tKiDFa', '', '', 0, ''),
('tKiDFa', '', '', 0, ''),
('YWCbU4', 'manan', 'employee', 7896321452, 'manan@gmail.com'),
('YWCbU4', '', '', 0, ''),
('YWCbU4', '', '', 0, ''),
('tKiDFa', '', '', 0, ''),
('tKiDFa', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapping_quotation`
--

CREATE TABLE `tbl_mapping_quotation` (
  `id` int(11) NOT NULL,
  `lead_code` varchar(10) NOT NULL,
  `quotation_code` varchar(10) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `approved_price` varchar(10) NOT NULL,
  `rate` int(11) NOT NULL,
  `discount_type` varchar(10) NOT NULL,
  `discount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `quotation_status` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_mapping_quotation`
--

INSERT INTO `tbl_mapping_quotation` (`id`, `lead_code`, `quotation_code`, `product_code`, `quantity`, `price`, `approved_price`, `rate`, `discount_type`, `discount`, `total`, `quotation_status`) VALUES
(10, 'tKiDFa', 'K9cbI', 'cy1234', 8, 15000, '15200', 15200, 'amount', 1000, 120600, '1'),
(11, 'tKiDFa', 'K9cbI', 'bodybsf10', 3, 5200, '5400', 5400, 'percent', 3, 15714, '1');

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
(20210511180956);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organization`
--

CREATE TABLE `tbl_organization` (
  `id` int(11) NOT NULL,
  `org_code` varchar(10) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
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
(1, 'IrgTAienWP', 'Reputable technology ', 'Unit No. 05, 1st Floor SALASAR COMMERCIAL CENTER, Fatak Rd, Bhayandar East, Mumbai', 'Santosh ', 'santosh@gmail.com', 9898391885, 9898391882, 2, 'Active', '::1', '2021-05-06', '2021-05-20', 'http://localhost/intran_project/uploads/9-Best-Technology-Logos-and-How-to-Make-Your-Own-for-Free-image24.jpg', 'www.reputable.com', '2021-03-26 17:34:02');

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
(3, '395010', 'Parvat Patiya', '1JMkYO', 'IrgTAienWP', NULL, '2021-05-06 14:00:23', '::1', '0'),
(4, '395011', 'Dumbhal', '1JMkYO', 'IrgTAienWP', NULL, '2021-05-06 14:00:23', '::1', '0');

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
(1, 'bodybsf10', '1', 'Sport Wilder', 'oOkVMj', 'It is a sport Wilder Machine ', 5200, 5500, 8457, 10, 18, 'It Is a best Machine Part', 'http://localhost/intran_project/uploads/jpeg/06f4c14532b6670a9a0aa9052d7c684a.jpg', 'http://localhost/intran_project/uploads/pdf/19d2e4d0d03e05304822f59ebd09d859.pdf', 'IrgTAienWP', NULL, '2021-05-06 14:36:00', '::1', '0'),
(2, 'cy1234', '1', 'cycle', 'oOkVMj', 'it is fast ', 15000, 15500, 753951, 20, 28, 'black color', 'http://localhost/intran_project/uploads/jpeg/e738152d3420d639d2e63ee5c78d363b.jpg', 'http://localhost/intran_project/uploads/pdf/25c67934df5ddd58dce993af93413bbc.pdf', 'IrgTAienWP', NULL, '2021-05-06 15:04:56', '::1', '0');

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
(1, 'oOkVMj', 'Machinery Part', 'IrgTAienWP', NULL, '2021-05-06 14:30:31', '::1', '0'),
(2, 'oOkVMj', 'Spare Part', 'IrgTAienWP', NULL, '2021-05-06 14:30:53', '::1', '0'),
(3, 'Wrjmav', 'Machinery Part', 'IrgTAienWP', NULL, '2021-05-06 14:31:01', '::1', '0'),
(4, 'Wrjmav', 'Spare Part', 'IrgTAienWP', NULL, '2021-05-06 14:31:06', '::1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation`
--

CREATE TABLE `tbl_quotation` (
  `id` int(11) NOT NULL,
  `quotation_code` varchar(10) NOT NULL,
  `lead_code` varchar(10) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-05-01 20:01:08',
  `ip_address` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '0',
  `invoice_number` varchar(10) NOT NULL,
  `quotation_close_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_quotation`
--

INSERT INTO `tbl_quotation` (`id`, `quotation_code`, `lead_code`, `total`, `created_at`, `ip_address`, `status`, `invoice_number`, `quotation_close_date`) VALUES
(7, 'K9cbI', 'tKiDFa', 136314, '2021-05-01 20:01:08', '::1', '2', '5eFTOr', '2021-05-11 11:32:47');

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
(7, 'Admin', '8RTYm5yEpl', 'IrgTAienWP', '2021-05-06 13:11:07', '::1', 0, ''),
(8, 'Employee', 'xLzyqGojsn', 'IrgTAienWP', '2021-05-06 13:11:25', '::1', 0, ''),
(9, 'Customer', '8kNRhWAyoX', 'IrgTAienWP', '2021-05-08 17:55:56', '::1', 0, ''),
(10, 'staff', 'pg13N4iGtc', 'IrgTAienWP', '2021-05-08 17:56:03', '::1', 0, '');

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
(1, 'Mv863a', 'kuKq7t', 'IrgTAienWP', NULL, 'Gujarat', '2021-05-06 12:45:51', '::1', '0'),
(2, 'Mv863a', 'a4F2Kx', 'IrgTAienWP', NULL, 'Punjab', '2021-05-06 12:46:12', '::1', '0'),
(3, 'Mv863a', 'dHvzbW', 'IrgTAienWP', NULL, 'Rajasthan', '2021-05-06 12:46:24', '::1', '0'),
(4, 'Mv863a', 'Bh1UX4', 'IrgTAienWP', NULL, 'Sikkim', '2021-05-06 12:46:39', '::1', '0');

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
(1, 'IrgTAienWP', '', 'Admin', 'IrgTAienWP', 'kaka', '::1', '2021-03-27 11:04:24', 0, 1),
(2, 'IrgTAienWP', '', 'xLzyqGojsn', '4T0XbNrulP', 'kaka', '::1', '2021-05-06 13:13:55', 0, 1),
(3, 'IrgTAienWP', '', 'xLzyqGojsn', 'OmEnVZ4pPo', 'kaka', '::1', '2021-05-06 13:14:44', 0, 1),
(4, 'IrgTAienWP', '', 'xLzyqGojsn', 'OGblp5Ua8Y', 'kaka', '::1', '2021-05-06 13:15:26', 0, 1),
(5, 'IrgTAienWP', '', 'xLzyqGojsn', '8OvW1X2ibI', 'kaka', '::1', '2021-05-06 13:16:22', 0, 1),
(6, 'IrgTAienWP', '', 'xLzyqGojsn', 'FDzdJPsCHY', 'kaka', '::1', '2021-05-06 14:11:51', 0, 1),
(7, 'IrgTAienWP', '', 'xLzyqGojsn', 'G3TgBntqeZ', 'kaka', '::1', '2021-05-08 08:53:46', 0, 1),
(8, 'IrgTAienWP', '', 'xLzyqGojsn', '72lCBE3FVs', 'sonu', '::1', '2021-05-08 08:58:00', 0, 1),
(9, 'IrgTAienWP', '', 'xLzyqGojsn', '4lLjJeDysQ', 'taher', '::1', '2021-05-11 10:38:24', 0, 1),
(10, 'IrgTAienWP', '', 'xLzyqGojsn', 'RQ96vjiUA1', 'monika', '::1', '2021-05-12 13:08:08', 0, 1),
(11, 'IrgTAienWP', '', 'xLzyqGojsn', 'P8n7HtDmpA', 'P8n7HtDmpA', '::1', '2021-05-12 15:10:42', 0, 0),
(12, 'IrgTAienWP', '', 'xLzyqGojsn', 'DiKHcQsNlm', 'kartik', '::1', '2021-05-12 15:11:23', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visit_type`
--

CREATE TABLE `tbl_visit_type` (
  `id` int(11) NOT NULL,
  `visit_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_visit_type`
--

INSERT INTO `tbl_visit_type` (`id`, `visit_type`) VALUES
(1, 'Customer Called'),
(2, 'Made a Cold Call Visit'),
(3, 'Phone call');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warranty`
--

CREATE TABLE `tbl_warranty` (
  `id` int(11) NOT NULL,
  `warranty_code` varchar(10) NOT NULL,
  `supplier_code` varchar(10) NOT NULL,
  `org_code` varchar(10) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `invoice_number` varchar(10) DEFAULT NULL,
  `start_at` datetime NOT NULL DEFAULT '2021-05-11 10:48:54',
  `number_of_visit` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `sr_no` varchar(10) NOT NULL,
  `warranty_type` varchar(10) DEFAULT NULL,
  `branch_code` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '2021-05-11 10:48:54',
  `ip_address` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_warranty`
--

INSERT INTO `tbl_warranty` (`id`, `warranty_code`, `supplier_code`, `org_code`, `product_code`, `invoice_number`, `start_at`, `number_of_visit`, `quantity`, `sr_no`, `warranty_type`, `branch_code`, `created_at`, `ip_address`, `status`) VALUES
(5, '6lp8Zx', 'J9jQ', 'IrgTAienWP', 'cy1234', '5eFTOr', '2021-05-11 11:32:47', 0, 8, 'u31WhV', 'sWX1zO', NULL, '2021-05-11 11:32:47', '::1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warranty_type`
--

CREATE TABLE `tbl_warranty_type` (
  `id` int(11) NOT NULL,
  `warranty_type_code` varchar(6) NOT NULL,
  `title` varchar(20) NOT NULL,
  `org_code` varchar(10) NOT NULL,
  `parent` int(10) DEFAULT NULL,
  `maintenance` varchar(30) DEFAULT NULL,
  `duration` varchar(5) DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT '2021-05-11 10:48:55',
  `ip_address` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_warranty_type`
--

INSERT INTO `tbl_warranty_type` (`id`, `warranty_type_code`, `title`, `org_code`, `parent`, `maintenance`, `duration`, `created_at`, `ip_address`, `status`) VALUES
(1, 'ESZ60X', 'Gold Pack', 'IrgTAienWP', NULL, NULL, '1', '2021-05-11 10:55:03', '::1', '0'),
(2, 'sWX1zO', 'Silver Pack', 'IrgTAienWP', NULL, NULL, '1', '2021-05-11 10:55:15', '::1', '0'),
(3, 'ye4JwX', 'Brownz Pack', 'IrgTAienWP', NULL, NULL, '1', '2021-05-11 10:57:28', '::1', '0');

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
(1, 'T1VrNz', 'North Zone', NULL, 'FDzdJPsCHY', NULL, 'IrgTAienWP', NULL, '2021-05-06 14:18:01', '::1', '0'),
(2, '3kKPFl', 'South Zone', NULL, '8OvW1X2ibI', NULL, 'IrgTAienWP', NULL, '2021-05-06 14:18:12', '::1', '0'),
(3, 'sDcEWZ', 'SV Zone', '1JMkYO,Wt7Vhv', 'FDzdJPsCHY', 'T1VrNz', 'IrgTAienWP', NULL, '2021-05-06 14:21:01', '::1', '0'),
(4, '52VJpx', 'P Zone', '4ZXg0K', '8OvW1X2ibI', '3kKPFl', 'IrgTAienWP', NULL, '2021-05-06 14:26:10', '::1', '0');

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
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `complaint_code` (`complaint_code`);

--
-- Indexes for table `tbl_complaint_tracking`
--
ALTER TABLE `tbl_complaint_tracking`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_mapping_quotation`
--
ALTER TABLE `tbl_mapping_quotation`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_warranty`
--
ALTER TABLE `tbl_warranty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `warranty_code` (`warranty_code`);

--
-- Indexes for table `tbl_warranty_type`
--
ALTER TABLE `tbl_warranty_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `warranty_type_code` (`warranty_type_code`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_complaint_tracking`
--
ALTER TABLE `tbl_complaint_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_discussion_with_customer`
--
ALTER TABLE `tbl_discussion_with_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_followup`
--
ALTER TABLE `tbl_followup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_language`
--
ALTER TABLE `tbl_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `tbl_lead`
--
ALTER TABLE `tbl_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_mapping_quotation`
--
ALTER TABLE `tbl_mapping_quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_organization`
--
ALTER TABLE `tbl_organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pincode`
--
ALTER TABLE `tbl_pincode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product_type`
--
ALTER TABLE `tbl_product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_quotation`
--
ALTER TABLE `tbl_quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_visit_type`
--
ALTER TABLE `tbl_visit_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_warranty`
--
ALTER TABLE `tbl_warranty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_warranty_type`
--
ALTER TABLE `tbl_warranty_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_zone`
--
ALTER TABLE `tbl_zone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
