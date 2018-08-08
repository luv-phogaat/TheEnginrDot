-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2018 at 02:57 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theenginrdot`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'gammu@gmail.com', 'gammu'),
(2, 'pgarima148@gmail.com', 'gar');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Armani exchange'),
(2, 'Polo Ralph Lauren'),
(3, 'Tommy Hilfiger'),
(4, 'Arrow'),
(5, 'Allen Solly'),
(7, 'H&M'),
(8, 'Levi\'s'),
(9, 'John Player\'s');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `sessionid` varchar(500) NOT NULL,
  `p_id` int(10) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `sessionid`, `p_id`, `emailid`, `qty`) VALUES
(19, 'b22pelu9j4lktolfh32jbn76gg', 12, 'luv.phogaat@gmail.com', 2),
(27, 'b22pelu9j4lktolfh32jbn76gg', 16, 'Guest', 1),
(28, 'b22pelu9j4lktolfh32jbn76gg', 17, 'Guest', 1),
(29, 'b22pelu9j4lktolfh32jbn76gg', 15, 'Guest', 1),
(30, 'b22pelu9j4lktolfh32jbn76gg', 14, 'Guest', 1),
(33, 'li5dmvhct3fnteekiog2qg2gld', 15, 'Guest', 1),
(36, 'e0s8k3h0jkt8cf3r4quq6i8932', 16, 'Guest', 1),
(37, 'n5a32beg9t561ssg143h2olmbl', 20, 'Guest', 1),
(38, 'e0s8k3h0jkt8cf3r4quq6i8932', 12, 'Guest', 1),
(39, 'e0s8k3h0jkt8cf3r4quq6i8932', 22, 'Guest', 1),
(40, 'e0s8k3h0jkt8cf3r4quq6i8932', 20, 'Guest', 1),
(41, 'e0s8k3h0jkt8cf3r4quq6i8932', 14, 'Guest', 1),
(42, 'e0s8k3h0jkt8cf3r4quq6i8932', 15, 'Guest', 1),
(43, 'e0s8k3h0jkt8cf3r4quq6i8932', 21, 'Guest', 1),
(44, 'hsv8ka40i3k78o9h62gbm8fu77', 22, 'Guest', 1),
(45, 'hsv8ka40i3k78o9h62gbm8fu77', 20, 'Guest', 1),
(46, 'drigl4p6rudcp55e7g9tgr9n2m', 12, 'Guest', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Mens'),
(2, 'Women');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `message`) VALUES
(1, 'Luv Phogaat', 'luv.phogaat@gmail.com', 'hello world'),
(2, 'Garima Pandey', 'pgarima148@gmail.com', 'Message...');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` int(100) NOT NULL,
  `customer_address` text NOT NULL,
  `pincode` int(11) NOT NULL,
  `token` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `pincode`, `token`) VALUES
(6, 'Luv', 'luv@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'India', 'New Dehli', 2147483647, 'B-1/43 Kiran Garden , Nawada , Uttam Nagar', 0, '0'),
(7, 'shikha', 'kskavitaarti@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'India', 'delhi', 2147483647, '46/2a,east azad nagar', 0, '27123'),
(8, 'garima pandey', 'pgarima148@gmail.com', 'cd5c909c6918293205d373e410631631', 'India', 'new delhi', 2147483647, 'b-1/43 kiran garden', 110059, ''),
(9, 'Luv Phogaat', 'luv.phogaat@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'India', 'New delhi', 789465123, '87/1, Krishna Nagar, Safdarjung Enclave, New delhi - 110029', 110029, ''),
(10, 'Vik', 'vik@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', 0, '', 0, '0'),
(11, 'garima pandey', 'pgarima148@gmail.com', 'cd5c909c6918293205d373e410631631', 'India', 'new delhi', 0, 'b-1/43 kiran garden', 110059, ''),
(12, 'garima pandey', 'pgarima148@gmail.com', 'cd5c909c6918293205d373e410631631', 'India', 'new delhi', 0, 'b-1/43 kiran garden', 110059, ''),
(13, '', 'rajat1580@gmail.com', '96fe818ee3f66e93099e5ceb59b39473', '', '', 0, '', 0, ''),
(14, '', 'dashingpankaj93@gmail.com', '8ae989b8d7ee1bc590457d21a1a61748', '', '', 0, '', 0, ''),
(15, '', 'dashingpankaj93@gmail.com', '8ae989b8d7ee1bc590457d21a1a61748', '', '', 0, '', 0, ''),
(16, '', 'greatpankajece011@gmail.com', '8ae989b8d7ee1bc590457d21a1a61748', '', '', 0, '', 0, '0410A6CEEE93079243A1A0A0BE3876225AC36AFCE3C83'),
(17, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` double(20,2) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `qty` int(20) NOT NULL,
  `product_id` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `product_id`, `order_date`, `order_status`) VALUES
(27, 6, 500.00, 'T8E5F8684F8D3789BFEF81027FA2DF33F5ABF9862774B2', 2, 1, '2018-03-31 16:45:29', 'Complete'),
(28, 6, 200.00, '2016208660', 1, 1, '2018-03-31 16:42:00', 'Complete'),
(29, 6, 200.00, '2091399150', 3, 1, '2018-03-31 16:42:07', 'Complete'),
(30, 6, 200.00, '1279792937', 1, 1, '2018-03-31 16:42:10', 'Pending'),
(31, 6, 200.00, '324159246', 1, 1, '2018-03-31 16:42:13', 'Pending'),
(32, 6, 700.00, '467037020', 1, 2, '2018-03-31 16:42:18', 'Pending'),
(33, 6, 700.00, '802990640', 1, 2, '2018-03-31 16:42:21', 'Pending'),
(34, 6, 500.00, '384862373', 2, 1, '2018-03-31 16:42:23', 'Complete'),
(35, 6, 0.00, '1664817942', 2, 0, '2018-03-31 16:42:26', 'Pending'),
(36, 6, 0.00, '580056961', 5, 0, '2018-03-31 16:42:29', 'Pending'),
(43, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 18, '2018-04-01 10:57:58', 'Pending'),
(44, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 17, '2018-04-01 10:57:58', 'Pending'),
(45, 9, 99.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 12, '2018-04-01 10:57:58', 'Pending'),
(46, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 18, '2018-04-01 12:22:52', 'Pending'),
(47, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 17, '2018-04-01 12:22:53', 'Pending'),
(48, 9, 99.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 12, '2018-04-01 12:22:53', 'Pending'),
(49, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 18, '2018-04-01 12:23:18', 'Pending'),
(50, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 17, '2018-04-01 12:23:18', 'Pending'),
(51, 9, 99.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 12, '2018-04-01 12:23:19', 'Pending'),
(52, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 18, '2018-04-01 12:23:46', 'Pending'),
(53, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 17, '2018-04-01 12:23:46', 'Pending'),
(54, 9, 99.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 12, '2018-04-01 12:23:46', 'Pending'),
(55, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 18, '2018-04-01 12:24:01', 'Pending'),
(56, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 17, '2018-04-01 12:24:01', 'Pending'),
(57, 9, 99.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 12, '2018-04-01 12:24:01', 'Pending'),
(58, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 18, '2018-04-01 12:24:25', 'Pending'),
(59, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 17, '2018-04-01 12:24:25', 'Pending'),
(60, 9, 99.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 12, '2018-04-01 12:24:25', 'Pending'),
(61, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 18, '2018-04-01 12:25:22', 'Pending'),
(62, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 17, '2018-04-01 12:25:22', 'Pending'),
(63, 9, 99.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 12, '2018-04-01 12:25:22', 'Pending'),
(64, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 18, '2018-04-01 12:25:48', 'Pending'),
(65, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 17, '2018-04-01 12:25:48', 'Pending'),
(66, 9, 99.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 12, '2018-04-01 12:25:48', 'Pending'),
(67, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 18, '2018-04-01 12:27:27', 'Pending'),
(68, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 17, '2018-04-01 12:27:27', 'Pending'),
(69, 9, 99.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 12, '2018-04-01 12:27:27', 'Pending'),
(70, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 18, '2018-04-01 12:28:58', 'Pending'),
(71, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 17, '2018-04-01 12:28:58', 'Pending'),
(72, 9, 99.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 12, '2018-04-01 12:28:59', 'Pending'),
(73, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 18, '2018-04-01 12:32:56', 'Pending'),
(74, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 17, '2018-04-01 12:32:56', 'Pending'),
(75, 9, 99.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 12, '2018-04-01 12:32:56', 'Pending'),
(76, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 18, '2018-04-01 12:38:56', 'Pending'),
(77, 9, 129.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 17, '2018-04-01 12:38:56', 'Pending'),
(78, 9, 99.99, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', 1, 12, '2018-04-01 12:38:56', 'Pending'),
(79, 9, 129.99, '80F36A558AB7295D37BC67FBB77379635AC0D3F953AB1', 1, 17, '2018-04-01 12:43:42', 'Pending'),
(80, 9, 45.99, '80F36A558AB7295D37BC67FBB77379635AC0D3F953AB1', 1, 22, '2018-04-01 12:43:42', 'Pending'),
(81, 9, 129.99, '2B543E31C62AE0F32CE7427FF2DB8E425AC0D4359CFDE', 1, 15, '2018-04-01 12:44:46', 'Pending'),
(82, 9, 45.99, '2B543E31C62AE0F32CE7427FF2DB8E425AC0D4359CFDE', 1, 21, '2018-04-01 12:44:46', 'Pending'),
(83, 9, 45.99, '2B543E31C62AE0F32CE7427FF2DB8E425AC0D4359CFDE', 1, 22, '2018-04-01 12:44:47', 'Pending'),
(84, 8, 79.99, '756F3D220F584170F0BD50B552FBB76B5AC105F5D35A7', 4, 14, '2018-04-01 16:17:31', 'Pending'),
(85, 8, 129.99, '836A1581A135E76C11E1BD87CD18DDE25AC1068D85828', 2, 17, '2018-04-01 16:19:37', 'Pending'),
(86, 8, 45.99, '456AB05764A41703CF60C15C8EBCD0165AC1071039016', 1, 21, '2018-04-01 16:21:46', 'Pending'),
(87, 8, 129.99, '24D6BB372AE4D00592EC2FA9CA753E9F5AC107AB5446C', 8, 16, '2018-04-01 16:24:19', 'Pending'),
(88, 8, 45.99, 'A9E804913D2F557CD43B77A29D592BA35AC1114A48217', 1, 20, '2018-04-01 17:05:33', 'Pending'),
(89, 8, 119.99, 'A9E804913D2F557CD43B77A29D592BA35AC1114A48217', 1, 13, '2018-04-01 17:05:33', 'Pending'),
(90, 8, 129.99, '8C8A58FA97C205FF222DE3685497742C5AC23D5F57B6C', 1, 15, '2018-04-02 14:25:46', 'Pending'),
(91, 8, 99.99, '8C8A58FA97C205FF222DE3685497742C5AC23D5F57B6C', 1, 12, '2018-04-02 14:25:46', 'Pending'),
(92, 8, 99.99, 'C0EAE791224B6A30B333BE1946B07C3B5AC25D6088160', 1, 12, '2018-04-02 16:43:50', 'Pending'),
(93, 8, 45.99, 'C0EAE791224B6A30B333BE1946B07C3B5AC25D6088160', 1, 20, '2018-04-02 16:43:50', 'Pending'),
(94, 8, 45.99, 'C0EAE791224B6A30B333BE1946B07C3B5AC25D6088160', 1, 21, '2018-04-02 16:43:51', 'Pending'),
(95, 8, 79.99, 'C0EAE791224B6A30B333BE1946B07C3B5AC25D6088160', 1, 14, '2018-04-02 16:43:51', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `payment_mode` varchar(500) NOT NULL DEFAULT 'COD',
  `payment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL DEFAULT 'Unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `payment_date`, `status`) VALUES
(2, 'T8E5F8684F8D3789BFEF81027FA2DF33F5ABF9862774B2', '350.00', 'COD', '2018-04-01 11:39:54', 'Paid'),
(3, '19630842', '350.00', 'Easypaisa/UBL Omni', '0000-00-00 00:00:00', 'Unpaid'),
(4, '500855995', '500.00', 'Easypaisa/UBL Omni', '0000-00-00 00:00:00', 'Unpaid'),
(5, '813117842', '1600.00', 'Easypaisa/UBL Omni', '0000-00-00 00:00:00', 'Unpaid'),
(6, '2091399150', '200.00', 'Bank Transfer', '0000-00-00 00:00:00', 'Unpaid'),
(7, '1993985099', '500.00', 'Bank Transfer', '0000-00-00 00:00:00', 'Unpaid'),
(8, '2016208660', '200.00', 'Easypaisa/UBL Omni', '0000-00-00 00:00:00', 'Unpaid'),
(9, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', '359.97', 'COD', '2018-04-01 12:28:59', 'Unpaid'),
(10, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', '359.97', 'COD', '2018-04-01 12:32:56', 'Unpaid'),
(11, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', '359.97', 'COD', '2018-04-01 12:38:56', 'Unpaid'),
(12, '194CF6C2DE8E00C05FCF16C498ADC7BF5AC0B7FBA74DD', '0.00', 'COD', '2018-04-01 12:39:14', 'Unpaid'),
(13, '80F36A558AB7295D37BC67FBB77379635AC0D3F953AB1', '175.98', 'COD', '2018-04-01 12:43:42', 'Unpaid'),
(14, '80F36A558AB7295D37BC67FBB77379635AC0D3F953AB1', '0.00', 'COD', '2018-04-01 12:44:02', 'Unpaid'),
(15, '2B543E31C62AE0F32CE7427FF2DB8E425AC0D4359CFDE', '221.97', 'COD', '2018-04-01 12:44:47', 'Unpaid'),
(16, '', '0.00', 'COD', '2018-04-01 15:50:26', 'Unpaid'),
(17, '756F3D220F584170F0BD50B552FBB76B5AC105F5D35A7', '79.99', 'COD', '2018-04-01 16:17:31', 'Unpaid'),
(18, '836A1581A135E76C11E1BD87CD18DDE25AC1068D85828', '129.99', 'COD', '2018-04-01 16:19:37', 'Unpaid'),
(19, '456AB05764A41703CF60C15C8EBCD0165AC1071039016', '45.99', 'COD', '2018-04-01 16:21:46', 'Unpaid'),
(20, '24D6BB372AE4D00592EC2FA9CA753E9F5AC107AB5446C', '129.99', 'COD', '2018-04-01 17:00:27', 'Paid'),
(21, 'A9E804913D2F557CD43B77A29D592BA35AC1114A48217', '165.98', 'COD', '2018-04-01 17:05:33', 'Unpaid'),
(22, '8C8A58FA97C205FF222DE3685497742C5AC23D5F57B6C', '229.98', 'COD', '2018-04-02 14:25:46', 'Unpaid'),
(23, 'C0EAE791224B6A30B333BE1946B07C3B5AC25D6088160', '271.96', 'COD', '2018-04-02 16:43:51', 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES
(29, 6, 2091399150, 12, 1, 'Complete'),
(30, 6, 1993985099, 9, 1, 'Complete'),
(31, 6, 1279792937, 12, 1, 'Complete'),
(32, 6, 324159246, 12, 1, 'Pending'),
(33, 6, 467037020, 12, 1, 'Pending'),
(34, 6, 802990640, 12, 1, 'Pending'),
(35, 6, 384862373, 9, 1, 'Pending'),
(36, 6, 1664817942, 0, 1, 'Pending'),
(37, 6, 580056961, 0, 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`, `status`) VALUES
(9, 2, 2, '2018-03-27 09:14:28', 'Air Tshirt Black', 'Air Tshirt Black.png', '', '', '46.99', 'Nice..', 'Air Tshirt Black', 'Available'),
(12, 1, 2, '2018-03-31 10:23:22', 'Next Blue Blazer', 'Next Blue Blazer.png', '', '', '99.99', '<p>Great Stick...</p>', 'Selfie Stick', 'Available'),
(13, 2, 1, '2018-03-27 09:14:38', 'Air Tshirt Black', 'Air Tshirt Black1.png', '', '', '119.99', '', '', 'Available'),
(14, 2, 2, '2018-03-27 09:14:42', 'Maroon Puma Tshirt', 'Maroon Puma Tshirt.png', '', '', '79.99', '', '', 'Available'),
(15, 2, 1, '2018-03-27 09:14:49', 'Multicoloured TShirts', 'Multicoloured TShirts.png', '', '', '129.99', '', '', 'Unavailable'),
(16, 2, 2, '2018-03-27 09:14:59', 'Air Tshirt Black', 'Air Tshirt Black3.png', '', '', '129.99', '', '', 'Unavailable'),
(17, 2, 1, '2018-03-27 09:15:01', 'Dresses', 'Dresses.png', '', '', '129.99', '', '', 'Available'),
(18, 1, 1, '2018-03-27 09:15:04', 'Wedding Blazers', 'Wedding Blazers.png', '', '', '129.99', '', '', 'Available'),
(19, 2, 2, '2018-03-27 09:15:06', 'Dresses', 'Dresses2.png', '', '', '45.99', '', '', 'Available'),
(20, 1, 2, '2018-03-31 10:07:45', 'Shirts', 'shirts.png', '', '', '45.99', '<p>Beautiful shirts designed for casual an party wears</p>', 'Mens Shirts Casual Wear', 'Available'),
(21, 1, 1, '2018-03-27 09:15:15', 'Shirts', 'Shirts2.png', '', '', '45.99', '', '', 'Available'),
(22, 1, 1, '2018-03-27 09:15:16', 'T shirts', 'T shirts.png', '', '', '45.99', '', '', 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
