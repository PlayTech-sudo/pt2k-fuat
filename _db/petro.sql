-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2020 at 10:55 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `addcustomer`
--

CREATE TABLE `addcustomer` (
  `id` int(11) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `ctype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `addtransaction`
--

CREATE TABLE `addtransaction` (
  `id` int(11) NOT NULL,
  `edate` varchar(50) NOT NULL,
  `etime` varchar(50) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `gtype` varchar(50) NOT NULL,
  `quantity` float NOT NULL,
  `price` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(0, '', '', '', '', '', '', '', '', ''),
(1, '2019-02-25', '08:31 AM', 'Omkar', 'UAX 3340', 'Petrol', '50', '', '', '2nd time in this week'),
(2, '2019-02-25', '08:31 AM', 'Omkar', 'UAX 3340', 'Petrol', '50', '3340', '', '2nd time in this week'),
(3, '2019-02-25', '08:31 AM', 'Omkar', 'UAX 3340', 'Petrol', '50', '3340', '167000', '2nd time in this week'),
(4, '2019-02-25', '08:33 AM', 'XYZ', 'UCS 2211', 'Diesel', '12', '1000', '12000', 'Nothing'),
(5, '2019-02-25', '08:33 AM', 'XYZ', 'UCS 2211', 'Diesel', '12', '1000', '12000', 'Nothing'),
(6, '2019-02-25', '08:39 AM', 'test', '123', 'Petrol', '12', '3340', '40080', 'nothing'),
(7, '2019-02-25', '08:41 AM', 'xyz', '1234', 'Diesel', '2', '3340', '6680', ''),
(8, '2019-02-25', '09:27 AM', 'GMD', 'UGS 1234', 'Petrol', '50', '3340', '167000', 'Kaliro Truck'),
(9, '2019-05-08', '12:16 PM', 'om', '123456', 'Petrol', '10', '80', '800', '');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `expense_date` date NOT NULL,
  `reason` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `employee_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE `fuel` (
  `id` int(11) NOT NULL,
  `fdate` date NOT NULL,
  `ftime` time NOT NULL,
  `type` varchar(50) NOT NULL,
  `stock` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `des` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuel`
--

INSERT INTO `fuel` (`id`, `fdate`, `ftime`, `type`, `stock`, `price`, `des`) VALUES
(1, '2020-02-15', '08:44:00', 'petrol', 5000, 70, 'petrol'),
(2, '2020-02-15', '08:46:00', 'diesel', 3000, 30, 'diesel'),
(3, '2020-02-21', '12:04:00', 'oil', 5000, 70, 'oil');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `fuel_type` varchar(100) NOT NULL,
  `qty` int(50) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `fuel_type`, `qty`, `price`) VALUES
(1, 'petrol', 5000, 70),
(2, 'diesel', 3000, 30),
(3, 'oil', 5000, 70);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `pdate` date NOT NULL,
  `ptime` time NOT NULL,
  `purchase_type` varchar(50) NOT NULL,
  `per_unit` float NOT NULL,
  `quantity` float NOT NULL,
  `purchase_amount` int(20) NOT NULL,
  `purchase_description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `pdate`, `ptime`, `purchase_type`, `per_unit`, `quantity`, `purchase_amount`, `purchase_description`) VALUES
(1, '2020-02-08', '12:23:00', 'Petrol', 70, 60, 4200, '1st one'),
(2, '2020-02-16', '02:53:00', 'Diesel', 7, 9, 63, 'ki'),
(3, '2020-02-18', '10:51:00', 'petrol', 2, 36, 72, 'petrol');

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
(8, 'Full Access', 'Full Access', 'INDEX;A01;A02;A03;A04;A05;A06;A07;A08;A09;'),
(10, 'Half Access', 'access half', 'INDEX;A02;A03;'),
(11, 'new role', 'test', 'INDEX;A01;A02;A04;');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `sdate` date NOT NULL,
  `stime` time NOT NULL,
  `customer_id` int(15) NOT NULL,
  `sales_type` varchar(50) NOT NULL,
  `machine_code` varchar(50) NOT NULL,
  `starting_reading` float NOT NULL,
  `ending_reading` float NOT NULL,
  `sales_amount` int(20) NOT NULL,
  `sales_description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'petrol', '2500'),
(2, 'diesel', '3000'),
(3, 'oil', '5000');

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
(1, '2020-02-15', '07:48 PM', '20', 'petrol', '30', 'petrol'),
(2, '2020-02-15', '07:52 PM', '5000', 'petrol', '30', 'petrol'),
(3, '2020-02-15', '08:11 PM', '2500', 'petrol', '70', 'petrol'),
(4, '2020-02-15', '08:28 PM', '3000', 'petrol', '70', 'petrol'),
(5, '2020-02-15', '08:30 PM', '1300', 'petrol', '30', 'petrol');

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
(1, 'admin', 'administration', 'd033e22ae348aeb5660fc2140aec35850c4da997', 8, 1, '21/02/2020 10:02 AM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcustomer`
--
ALTER TABLE `addcustomer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addtransaction`
--
ALTER TABLE `addtransaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entry`
--
ALTER TABLE `entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rname` (`rname`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
