-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2018 at 01:56 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop`
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
(1, 'HP'),
(2, 'DELL'),
(3, 'Nokia'),
(4, 'Sony'),
(5, 'Samsung'),
(7, 'Nikon'),
(8, 'ASUS'),
(9, 'LetV');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` int(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(9, 43231, 0),
(12, 27123, 0);

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
(1, 'Tablets'),
(2, 'Laptops'),
(3, 'Cameras'),
(4, 'Mobiles'),
(5, 'Computers'),
(8, 'Selfie Stick');

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
  `customer_image` text NOT NULL,
  `customer_ip` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(6, 'Garima Pandey', 'pgarima148@gmail.com', 'gammu', 'India', 'New Dehli', 2147483647, 'B-1/43 Kiran Garden , Nawada , Uttam Nagar', 'IMG_20170214_115327060.jpg', 0),
(7, 'shikha', 'kskavitaarti@gmail.com', '78634@123', 'India', 'delhi', 2147483647, '46/2a,east azad nagar', 'Earth.jpg', 27123),
(8, 'garima pandey', 'pgarima148@gmail.com', 'gammu', 'India', 'new delhi', 2147483647, 'b-1/43 kiran garden', '9 - Copy.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `total_products`, `order_date`, `order_status`) VALUES
(27, 6, 500, 1993985099, 1, '2017-06-10 09:04:18', 'Complete'),
(28, 6, 200, 2016208660, 1, '2017-06-10 09:13:25', 'Complete'),
(29, 6, 200, 2091399150, 1, '2017-06-10 08:57:01', 'Complete'),
(30, 6, 200, 1279792937, 1, '2017-06-11 07:44:03', 'pending'),
(31, 6, 200, 324159246, 1, '2017-06-11 08:53:27', 'pending'),
(32, 6, 700, 467037020, 2, '2017-06-11 09:00:11', 'pending'),
(33, 6, 700, 802990640, 2, '2017-06-11 09:01:09', 'pending'),
(34, 6, 500, 384862373, 1, '2017-06-11 14:22:04', 'pending'),
(35, 6, 0, 1664817942, 0, '2018-01-14 15:13:18', 'pending'),
(36, 6, 0, 580056961, 0, '2018-01-20 12:52:06', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(2, 19630842, 350, 'Bank Transfer', 24354564, 23456435, '04-06-2017'),
(3, 19630842, 350, 'Easypaisa/UBL Omni', 213456, 213456, '04-06-2017'),
(4, 500855995, 500, 'Easypaisa/UBL Omni', 500855995, 500855995, '04-06-2017'),
(5, 813117842, 1600, 'Easypaisa/UBL Omni', 312587557, 968216838, '04-06-2017'),
(6, 2091399150, 200, 'Bank Transfer', 500855995, 57789, '10-06-2017'),
(7, 1993985099, 500, 'Bank Transfer', 7865, 97865, '10-06-2017'),
(8, 2016208660, 200, 'Easypaisa/UBL Omni', 98675, 98765, '10-06-2017');

-- --------------------------------------------------------

--
-- Table structure for table `paypal_payments`
--

CREATE TABLE `paypal_payments` (
  `payment_id` int(10) NOT NULL,
  `transaction_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `currency` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paypal_payments`
--

INSERT INTO `paypal_payments` (`payment_id`, `transaction_no`, `amount`, `currency`, `customer_id`, `product_id`, `qty`) VALUES
(1, 0, 0, 0, 0, 0, 0);

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
(31, 6, 1279792937, 12, 1, 'pending'),
(32, 6, 324159246, 12, 1, 'pending'),
(33, 6, 467037020, 12, 1, 'pending'),
(34, 6, 802990640, 12, 1, 'pending'),
(35, 6, 384862373, 9, 1, 'pending'),
(36, 6, 1664817942, 0, 1, 'pending'),
(37, 6, 580056961, 0, 1, 'pending');

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
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`, `status`) VALUES
(9, 2, 2, '2017-06-09 15:14:03', 'Dell Laptop 123', 'Dell-blue-Laptop.jpg', '', '', 500, 'Nice..', 'Dell Laptop', 'status'),
(12, 8, 4, '2017-03-23 14:29:34', 'Selfie Stick', 'phone stick.jpg', '', '', 200, 'Great Stick...', 'Selfie Stick', 'status');

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
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

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
-- Indexes for table `paypal_payments`
--
ALTER TABLE `paypal_payments`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `paypal_payments`
--
ALTER TABLE `paypal_payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
