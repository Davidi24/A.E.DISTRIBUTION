-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 03:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aedistribution`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_info`
--

CREATE TABLE `business_info` (
  `business_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `address` varchar(80) NOT NULL,
  `phone` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `website` varchar(80) NOT NULL,
  `License` varchar(80) NOT NULL,
  `tax_number` int(80) NOT NULL,
  `bank_accaunt` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_info`
--

INSERT INTO `business_info` (`business_id`, `name`, `address`, `phone`, `email`, `website`, `License`, `tax_number`, `bank_accaunt`) VALUES
(48, 'A.E.Destribution', 'Rruga 12345', '0677564436', 'kecidavid22@gmail.com', 'www.webside.com', '', 1234, '1111'),
(49, 'Biznesii1', 'Rruga 123456', '0677564436', 'kecidavid22@gmail.com', 'www.webside.com', '', 1235, '1112'),
(50, 'Biznesii2', 'Rruga 12346', '0677564436', 'kecidavid22@gmail.com', 'www.webside.com', '', 1235, '1111');

-- --------------------------------------------------------

--
-- Table structure for table `klienti`
--

CREATE TABLE `klienti` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `company_name` varchar(80) NOT NULL,
  `date` date NOT NULL,
  `client_id` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klienti`
--

INSERT INTO `klienti` (`id`, `name`, `email`, `phone`, `company_name`, `date`, `client_id`) VALUES
(2054, 'David Keci', 'kecidavid22@gmail.com', '0677564436', 'A.E.Destribution', '2023-07-09', '1111'),
(2055, 'Name1 Surname1', 'kecidavid23@gmail.com', '0677564436', 'Kompania1', '2023-07-09', '1112'),
(2056, 'Name2 Surname2', 'kecidavid24@gmail.com', '0677564436', 'Kompania3', '2023-07-09', '1113'),
(2057, 'Name4 Surname4', 'kecidavid25@gmail.com', '0677564436', 'Kompania4', '2023-07-09', '1114'),
(2058, 'Name6 Surname6', 'kecidavid26@gmail.com', '0677564436', 'Kompania6', '2023-07-09', '1115');

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `product_id` int(11) NOT NULL,
  `businesss_id` int(11) NOT NULL,
  `artikulli` varchar(80) NOT NULL,
  `emertimi` varchar(80) NOT NULL,
  `saisa` int(30) NOT NULL,
  `njesia_matse` varchar(10) NOT NULL,
  `cmimi` int(30) NOT NULL,
  `total` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`product_id`, `businesss_id`, `artikulli`, `emertimi`, `saisa`, `njesia_matse`, `cmimi`, `total`) VALUES
(57, 48, 'Artikulli1', 'Emerimi1', 10, 'kg', 120, 1200),
(58, 48, 'Artikulli2', 'Emerimi2', 20, 'g', 220, 4400),
(59, 49, 'Artikulli1', 'Emerimi1', 10, 'kg', 120, 1200),
(60, 50, 'Artikulli1', 'Emerimi1', 30, 'kg', 420, 12600);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(61, 'David', 'dkeci21@epoka.edu.al', '$2y$10$np1S/GolhuB4kbzt.yESj.Ft65/Lj6vHtaWvB/.VWRuMT5eg4egBS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_info`
--
ALTER TABLE `business_info`
  ADD PRIMARY KEY (`business_id`);

--
-- Indexes for table `klienti`
--
ALTER TABLE `klienti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_info_ibfk_1` (`businesss_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_info`
--
ALTER TABLE `business_info`
  MODIFY `business_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `klienti`
--
ALTER TABLE `klienti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2059;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_info`
--
ALTER TABLE `product_info`
  ADD CONSTRAINT `product_info_ibfk_1` FOREIGN KEY (`businesss_id`) REFERENCES `business_info` (`business_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
