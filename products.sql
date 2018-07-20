-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2018 at 10:07 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `addproduct`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `title` varchar(30) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` float(6,2) NOT NULL,
  `shipper` varchar(15) DEFAULT NULL,
  `weight` float(6,2) DEFAULT NULL,
  `recyclable` varchar(5) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`title`, `description`, `price`, `shipper`, `weight`, `recyclable`, `id`, `type`) VALUES
('product Test', 'Testing Testing', 500.00, NULL, NULL, NULL, 22, 'product'),
('Tool Test', 'recycle should be null', 500.00, 'fedex', 500.00, NULL, 23, 'tool'),
('Electronic Test', '2 Nulls', 500.00, NULL, NULL, 'no', 24, 'electronic'),
('Electronic Test', '2 Nulls', 500.00, NULL, NULL, 'no', 25, 'electronic'),
('product test', '3 null', 500.00, NULL, NULL, NULL, 26, 'product'),
('tool test', '1 null', 500.00, 'fedex', 500.00, NULL, 27, 'tool'),
('Electronic Test', '2 null', 500.00, NULL, NULL, 'yes', 28, 'electronic'),
('Electronic Test', '2 null', 500.00, NULL, NULL, 'yes', 29, 'electronic'),
('Electronic Test', '2 null', 500.00, NULL, NULL, 'yes', 30, 'electronic'),
('Electronic Test', '2 null', 500.00, NULL, NULL, 'yes', 31, 'electronic'),
('Electronic Test', '2 null', 500.00, NULL, NULL, 'yes', 32, 'electronic'),
('Test', 'test test test test test test test test test test test test test test test test test test test test ', 500.00, NULL, NULL, NULL, 33, 'product'),
('Test', 'test test test test test test test test test test test test test test test test test test test test ', 500.00, NULL, NULL, NULL, 34, 'product'),
('Chad ', 'Test', 500.00, 'fedex', 1000.00, NULL, 35, 'tool');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
