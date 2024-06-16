-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2023 at 12:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skyline_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(12) NOT NULL,
  `retailer_id` int(100) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `ship_to` varchar(255) NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_time_slot` varchar(255) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `date_updated` date NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 0,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `retailer_id`, `product_type`, `ship_to`, `delivery_date`, `delivery_time_slot`, `vehicle_type`, `date_created`, `date_updated`, `Status`, `delete_flag`) VALUES
(1, 2, 'WeatherPlus', 'Athwa', '2023-09-27', '04:00 PM - 05:00 PM', 'Tempo', '2023-09-16', '2023-09-16', 0, 0),
(2, 1, 'PPC', 'Piplod', '2024-09-16', '04:00 PM - 05:00 PM', 'Tempo', '2023-09-16', '2023-09-16', 1, 0),
(3, 3, 'OPC-53', 'Udhna', '2023-11-14', '10:00 AM - 11:00 AM', 'Self', '2023-09-16', '2023-09-16', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `retailers`
--

CREATE TABLE `retailers` (
  `retailer_id` int(12) NOT NULL,
  `trade_No` int(100) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `active_influencers` int(11) NOT NULL,
  `sales(this month)` int(11) NOT NULL,
  `sales(YTD)` int(11) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `retailers`
--

INSERT INTO `retailers` (`retailer_id`, `trade_No`, `company_logo`, `company_name`, `address`, `contact_no`, `active_influencers`, `sales(this month)`, `sales(YTD)`, `delete_flag`) VALUES
(1, 1001, 'BCD.png', 'Bhavani Cement Depot', 'SURAT CITY', 90909090, 32, 28, 709, 0),
(2, 1002, 'gopi.jpg', 'Gopi Enterprises', 'SACHIN', 1234567890, 0, 20, 344, 0),
(3, 1003, 'SK.png', 'Shree krishna Enterprise', 'SURAT', 901671866, 12, 26, 600, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `experience` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `phonenumber`, `pass`, `gender`, `filename`, `designation`, `experience`) VALUES

(1, 'saloni', 'saloni12', 'saloni@gmail.com', '9009090909', '54', 'Female', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `retailers`
--
ALTER TABLE `retailers`
  ADD PRIMARY KEY (`retailer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fullname` (`fullname`,`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `retailers`
--
ALTER TABLE `retailers`
  MODIFY `retailer_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
