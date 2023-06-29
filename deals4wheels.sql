-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2023 at 07:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deals4wheels`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `brands` varchar(255) DEFAULT NULL,
  `car_type` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `car_engine` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `car_fuel` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `car_yom` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `car_km` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `sales_price` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `imagepath` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `imagepath2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `imagepath3` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `astatus` enum('Active','inactive','Deleted') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'Active',
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `user_id`, `brands`, `car_type`, `car_engine`, `car_fuel`, `car_yom`, `car_km`, `description`, `sales_price`, `imagepath`, `imagepath2`, `imagepath3`, `astatus`, `created`) VALUES
(7, 1, 'Maruti Suzuki Wagnor VXI', 'Hetchback', '1200', 'Petrol', '2008', '31000', 'With minor scraches at the back', '75000', 'uploads//f2022083313.jpg', 'uploads//f2022083313.jpg', 'uploads//f2022083313.jpg', 'Active', '2022-04-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(10) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone_no` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `message` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `adding_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone_no`, `subject`, `message`, `adding_date`) VALUES
(3, 'jjgiji', 'njnsjnnkll@gmail.com', '46778', 'hjgfkdngkkw', 'kmkem', '2022-12-25 09:48:47'),
(5, 'chfjkkhn', 'njnsjnnkll@gmail.com', '46778', 'jhywgffbvjf', 'jhbjy', '2022-12-27 08:30:56'),
(6, 'Annu Balhara', 'annubalhara1224@gmail.com', '9588736559', 'hjgfkdngkkw', 'KJ', '2023-01-22 01:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(10) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `phone_no` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `gender` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `dob` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `city` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pin_no` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `imgpath` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_type` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'user',
  `adding_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone_no`, `gender`, `dob`, `city`, `state`, `address`, `country`, `pin_no`, `imgpath`, `user_type`, `adding_date`) VALUES
(1, 'Annu', 'abalhara@gmail.com', '12345', '9588736559', 'female', '2001-03-16', 'delhi', 'delhi', 'keshav puram', 'India', '110035', NULL, 'user', '2022-03-20 07:06:24'),
(2, 'Deals 4 Wheels', 'dealsforwheels99@gmail.com', 'admin', '9711778932', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2022-03-20 07:11:02'),
(4, 'Annu Balhara', 'annubalhara1224@gmail.com', '12345', '9588736559', 'female', '0677-08-05', 'South West Delhi', 'Delhi', 'H.no 282A/1 P3 Block Gali No19\r\nNew Roshanpura Extn. Najafgarh South West Delhi', 'India', '', NULL, 'user', '2022-12-25 09:55:33'),
(5, 'xxyyyyy', 'njnsjnnkll@gmail.com', '12345', '46778', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user', '2022-12-26 05:44:44'),
(6, 'hvjhhu', 'hhbhasbc@c.com', '12345', '576789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user', '2022-12-26 05:51:19'),
(7, 'fghjk', 'ghxvhhb@gmail.com', '123456', '67687', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'user', '2022-12-27 08:52:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
