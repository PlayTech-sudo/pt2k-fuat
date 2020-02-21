-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 25, 2019 at 09:41 AM
-- Server version: 5.7.23
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petro`
--

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

CREATE TABLE `entry` (
  `id` int(11) NOT NULL,
  `edate` varchar(100) NOT NULL,
  `etime` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `vno` varchar(100) NOT NULL DEFAULT '',
  `gtype` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`id`, `edate`, `etime`, `user`, `vno`, `gtype`, `qty`, `price`, `total`, `note`) VALUES
(1, '2019-02-25', '08:31 AM', 'Omkar', 'UAX 3340', 'Petrol', '50', '', '', '2nd time in this week'),
(2, '2019-02-25', '08:31 AM', 'Omkar', 'UAX 3340', 'Petrol', '50', '3340', '', '2nd time in this week'),
(3, '2019-02-25', '08:31 AM', 'Omkar', 'UAX 3340', 'Petrol', '50', '3340', '167000', '2nd time in this week'),
(4, '2019-02-25', '08:33 AM', 'XYZ', 'UCS 2211', 'Diesel', '12', '1000', '12000', 'Nothing'),
(5, '2019-02-25', '08:33 AM', 'XYZ', 'UCS 2211', 'Diesel', '12', '1000', '12000', 'Nothing'),
(6, '2019-02-25', '08:39 AM', 'test', '123', 'Petrol', '12', '3340', '40080', 'nothing'),
(7, '2019-02-25', '08:41 AM', 'xyz', '1234', 'Diesel', '2', '3340', '6680', ''),
(8, '2019-02-25', '09:27 AM', 'GMD', 'UGS 1234', 'Petrol', '50', '3340', '167000', 'Kaliro Truck');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) NOT NULL,
  `rname` varchar(30) NOT NULL,
  `rdesc` varchar(100) NOT NULL,
  `acc_code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `rname`, `rdesc`, `acc_code`) VALUES
(8, 'Full Access', 'Full Access', 'INDEX;A01;A02;A03;'),
(9, 'User', 'User', 'INDEX;A01;A03;');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `gas` varchar(20) NOT NULL,
  `stock` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `gas`, `stock`) VALUES
(1, 'Petrol', '4950'),
(2, 'Diesel', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `edate` varchar(100) NOT NULL,
  `etime` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `gtype` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `note` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `edate`, `etime`, `qty`, `gtype`, `price`, `note`) VALUES
(5, '2019-02-23', '12:02 PM', '12', 'Diesel', '120000', NULL),
(6, '2019-02-23', '12:02 PM', '12', 'Petrol', '1212221', NULL),
(7, '2019-02-23', '12:02 PM', '12', 'Petrol', '1212221', NULL),
(8, '2019-02-23', '12:02 PM', '12', 'Petrol', '1212221', NULL),
(9, '2019-02-23', '12:02 PM', '30', 'Diesel', '123123', NULL),
(10, '2019-02-23', '12:02 PM', '122', 'Petrol', '12312', NULL),
(11, '2019-02-23', '12:02 PM', '123', 'Diesel', '123', NULL),
(12, '2019-02-25', '09:26 AM', '5000', 'Petrol', '14000000', 'Invoice No:1234'),
(13, '2019-02-25', '09:28 AM', '3000', 'Diesel', '14000000', 'Invoice No: 12345');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `role` int(10) NOT NULL,
  `active` int(2) NOT NULL,
  `llogin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fname`, `pass`, `role`, `active`, `llogin`) VALUES
(2, 'admin', 'Administrator', 'cf964d16eba49f7347608b6b9fac21af70a8a9a8', 8, 1, '18/10/2018 09:10 AM'),
(3, 'user', 'Mr. Peter', '7c4a8d09ca3762af61e59520943dc26494f8941b', 9, 1, '25/02/2019 07:02 AM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entry`
--
ALTER TABLE `entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rname` (`rname`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
