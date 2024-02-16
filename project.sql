-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 12:37 PM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `donordata`
--

CREATE TABLE `donordata` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `fathername` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `bg` varchar(100) NOT NULL,
  `images` varchar(100) NOT NULL DEFAULT 'anonymous',
  `location` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donordata`
--

INSERT INTO `donordata` (`id`, `name`, `email`, `age`, `fathername`, `phone`, `bg`, `images`, `location`, `address`) VALUES
(29, 'Muhammad Junaid', 'junaidsindhu345@gmail.com', 19, 'Muhmmad Ghayas', '3171064281', 'AB+', 'img/noidentity.png', 'Hyderabad', 'Block C ,  Unit No: 6, Latifabad'),
(30, 'Muhammad Ibrahim', 'Ibrahim@gmail.com', 19, 'Muhammad Ishaque', '3121452141', 'O+', 'img/360_F_224869519_aRaeLneqALfPNBzg0xxMZXghtvBXkfIA.jpg', 'Hyderabad', 'Block B, Unit No 6, Latifabad'),
(31, 'bilal', 'junaidsindhu345@gmail.com', 18, 'Server', '352461514', 'AB+', 'img/360_F_326985142_1aaKcEjMQW6ULp6oI9MYuv8lN9f8sFmj.jpg', 'Mirpurkhas', 'GOR Colony');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `password`) VALUES
(14, 'junaidsindhu345@gmail.com', '12345678'),
(15, 'ibrahim@gmail.com', '456789'),
(16, 'humaria@gmail.com', 'junaid'),
(18, 'ibrahim786@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donordata`
--
ALTER TABLE `donordata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donordata`
--
ALTER TABLE `donordata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;