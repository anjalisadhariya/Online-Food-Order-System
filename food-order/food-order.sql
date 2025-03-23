-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 10:41 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(2, 'sadhariya anjali', 'anjali', '872f4efa9f7985a25eb96b0b35132ec9'),
(3, 'dalsaniya hiral', 'hiral', '0a56b39937f3d89758480b192f6f94f2'),
(4, 'admin', 'admin', 'e6e061838856bf47e1de730719fb2609');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(1, 'Food', 'Food_Category_708.jpg', 'Yes', 'Yes'),
(2, 'Drinks', 'Food_Category_87.jpg', 'Yes', 'Yes'),
(3, 'Dessert', 'Food_Category_683.png', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(1, 'Pizza', 'Pizza is made of bread,tomato sauce,cheese,and various toppings.', '1000.00', 'Food-Name-733.jpg', 1, 'Yes', 'Yes'),
(2, 'Pasta', 'Pasta is a collective name for a category of food made from wheat flour and water', '600.00', 'Food-Name-889.jpg', 1, 'Yes', 'Yes'),
(3, 'Mazza', 'Maaza has a distinct pulpy taste as compared to Frooti.', '75.00', 'Food-Name-919.jpg', 2, 'Yes', 'Yes'),
(4, 'Thumbs Up', ' It has a strong cola and caramel taste, with a light floral-rose flavor', '40.00', 'Food-Name-179.jpg', 2, 'Yes', 'Yes'),
(5, 'Sizzling Brownie', 'a chocolate brownie with a scoop of ice cream on top served.', '160.00', 'Food-Name-349.jpg', 3, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Pasta', '600.00', 1, '600.00', '2023-09-19 03:54:27', 'Delivered', 'vishva', '9865327445', 'vishva@gmail.com', 'kamdar colony,jamnagar'),
(2, 'Pasta', '600.00', 1, '600.00', '2023-09-19 03:57:14', 'Delivered', 'vishva', '9865327445', 'vishva@gmail.com', 'kamdar,jamnagar'),
(3, 'Mazza', '75.00', 2, '150.00', '2023-09-19 04:23:35', 'Cancelled', 'pal', '8585456321', 'pal@gmail.com', 'rudra,dhrol'),
(4, 'Thumbs Up', '40.00', 1, '40.00', '2023-09-19 04:25:39', 'On Delivery', 'hil', '6345627364', 'hil@gmail.com', 'shanti park,dhrol'),
(5, 'Pizza', '1000.00', 1, '1000.00', '2023-09-19 04:36:23', 'Ordered', 'krisha', '6547898745', 'krisha@gmail.com', 'g.m patel,dhrol'),
(6, 'Sizzling Brownie', '160.00', 1, '160.00', '2023-09-19 04:49:55', 'Ordered', 'nil', '8754986547', 'nil@gmail.com', 'rudra,dhrol'),
(7, 'Sizzling Brownie', '160.00', 1, '160.00', '2023-09-21 07:32:53', 'ordered', 'rishi', '9856748745', 'rishi@gmail.com', 'om park,rajkot'),
(8, 'Mazza', '75.00', 1, '75.00', '2023-09-21 07:34:41', 'ordered', 'ruhi', '9854726458', 'ruhi@gmail.com', 'gokul,dhrol'),
(9, 'Pasta', '600.00', 1, '600.00', '2023-09-21 08:20:38', 'Cancelled', 'sani', '6547898745', 'sani@123', 'rajkot'),
(10, 'Thumbs Up', '40.00', 2, '80.00', '2023-09-21 08:25:17', 'Delivered', 'suzy', '8745965874', 'suzy@gmail.com', 'Jamnagar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `fname`, `username`, `password`) VALUES
(1, 'hiral', 'hiral', '$2y$10$aG0o3y8rNRLEfuTxas/4H.bGD9ADwIMjXfYdy3LnUeHeYa2u1AWrG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
