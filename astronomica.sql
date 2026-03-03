-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2026 at 01:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `astronomica`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `tour_name` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `guest_count` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `tour_name`, `full_name`, `email`, `guest_count`, `booking_date`, `booking_time`, `payment_method`, `created_at`, `details`) VALUES
(1, 'Rocketry exhibit', 'John Doe', 'Jane@gmail.com', 19, '2026-02-23', '16:00:00', 'Credit Card', '2026-02-19 09:36:02', ''),
(3, 'Rocketry exhibit', 'jane Doe', 'jane@gmail.com', 20, '2026-02-02', '13:00:00', 'At Entrance', '2026-02-20 14:56:49', '');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_bookings`
--

CREATE TABLE `ticket_bookings` (
  `id` int(11) NOT NULL,
  `ticket_tier` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mission_date` date NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `account_info` varchar(255) DEFAULT 'Card Transaction',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_bookings`
--

INSERT INTO `ticket_bookings` (`id`, `ticket_tier`, `email`, `mission_date`, `payment_method`, `account_info`, `created_at`) VALUES
(1, 'Basic Rover', 'nexinartrandom2@gmail.com', '2026-02-23', 'wallet', '@gndjkhdis', '2026-02-19 10:22:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_bookings`
--
ALTER TABLE `ticket_bookings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket_bookings`
--
ALTER TABLE `ticket_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
