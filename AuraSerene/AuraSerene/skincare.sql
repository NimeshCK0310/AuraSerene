-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2024 at 05:31 PM
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
-- Database: `skincare`
--

-- --------------------------------------------------------

--
-- Table structure for table `clensers`
--

CREATE TABLE `clensers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clensers`
--

INSERT INTO `clensers` (`id`, `name`, `price`, `image`) VALUES
(9, 'Garnier Micellar Cleansing Water 100ml', 1430.00, '5.webp'),
(10, 'CeraVe SA Smoothing Cleanser For Dry,Rough,Bumpy Skin 236ml', 1320.00, '6.webp'),
(11, 'CeraVe Hydrating Facial Cleanser 355ml', 1540.00, '7.webp'),
(12, 'Neutrogena Clear & Soothe Oil FreeMousse Cleanser 150ml', 1960.00, '8.webp');

-- --------------------------------------------------------

--
-- Table structure for table `diffusers`
--

CREATE TABLE `diffusers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diffusers`
--

INSERT INTO `diffusers` (`id`, `name`, `price`, `image`) VALUES
(1, 'Amber & Vetiver Reed Diffuser', 1150.00, '13.JPG'),
(2, 'White Rose & Lily Reed Diffuser', 1250.00, '14.JPG'),
(3, 'Rain Water Reed Diffuser', 1450.00, '15.JPG'),
(4, 'Antique Sandalwood Reed Diffuser', 1600.00, '16.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `scented`
--

CREATE TABLE `scented` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scented`
--

INSERT INTO `scented` (`id`, `name`, `price`, `image`) VALUES
(1, 'Lavender Luxe Candle', 1560.00, '9.JPG'),
(2, 'Honey and Vanilla Luxe Candle', 1450.00, '10.JPG'),
(3, 'Lavender Mini Candle', 1360.00, '11.JPG'),
(4, 'Rose and Patchouli Mini Candle', 1600.00, '12.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `serums`
--

CREATE TABLE `serums` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `serums`
--

INSERT INTO `serums` (`id`, `name`, `price`, `image`) VALUES
(1, 'Dr. Rashel Vitamin C Brightening And Anti-Aging Eye Serum 30ml', 1890.00, '1.webp'),
(2, 'Olay Serum Vitamin C + Peptide 24 Brightening Serum 40ml', 1880.00, '2.webp'),
(3, 'Olay Serums Niacinamide + Peptide 24 Max Anti - Wrinkle Serum 40ml', 1660.00, '3.webp'),
(5, 'Roushun Vitamin C serum 30ml', 1590.00, '4.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `reg_date`) VALUES
(6, 'admin', 'admin@gmail.com', '$2y$10$63v6MaxcSb.mRwts2nUjCupKk47.nCzW2YtKD4IuT0X5Bqkkhra0y', '2024-07-08 08:43:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clensers`
--
ALTER TABLE `clensers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diffusers`
--
ALTER TABLE `diffusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scented`
--
ALTER TABLE `scented`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serums`
--
ALTER TABLE `serums`
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
-- AUTO_INCREMENT for table `clensers`
--
ALTER TABLE `clensers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `diffusers`
--
ALTER TABLE `diffusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `scented`
--
ALTER TABLE `scented`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `serums`
--
ALTER TABLE `serums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
