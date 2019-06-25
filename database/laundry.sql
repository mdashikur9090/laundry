-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 29, 2018 at 06:40 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email_id` varchar(75) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ip_add` varchar(100) NOT NULL,
  `role` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `mobile`, `email_id`, `username`, `password`, `ip_add`, `role`) VALUES
(1, 'Laundry Administrator', '9897979897', 'admin@laundry.com', 'admin', 'admin', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cloths`
--

CREATE TABLE `cloths` (
  `id` int(11) NOT NULL,
  `cloth_type` varchar(100) NOT NULL,
  `cloth_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cloths`
--

INSERT INTO `cloths` (`id`, `cloth_type`, `cloth_code`) VALUES
(1, 'Shirt', 'SHRT'),
(2, 'Pant', 'PNT'),
(3, 'T-Shirt', 'TST');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `join_date` varchar(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `join_date`, `first_name`, `last_name`, `address`, `email_id`, `mobile`, `status`, `password`, `role`) VALUES
(1, '01-01-2018', 'Alamin', 'Hossain', 'Dhaka 1200', 'alamin@gmail.com', '01627064798', 'disable', '123', 2),
(2, '01-01-2018', 'Ismail', 'Hossain', '13548349565', 'ismail@gmail.com', '13548349565', 'disable', '123', 2),
(3, '09-01-2018', 'Ashik', 'Mridha', 'madrasha road', 'ashikmridha@gmail.com', '1776704107', 'enable', '123', 2),
(4, '01-01-2018', 'AB', 'CD', 'Dhaka1200', 'abcd@gmail.com', '01234567891', 'enable', '123', 2),
(5, '01/01/2018', 'ab', '12', 'Dhaka1210', 'ab12@gmail.com', '01751487231', 'enable', '123', 2),
(6, '01-01-2018', 'Sumaiya', 'Surovi', 'Dhaka 1200', 'surovi@gmail.com', '01624875055', 'enable', '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `join_date` varchar(15) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `birth_date` varchar(15) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `status` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `leave_date` varchar(15) NOT NULL,
  `salary` int(11) NOT NULL,
  `role` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `join_date`, `first_name`, `last_name`, `mobile`, `email_id`, `address`, `birth_date`, `gender`, `status`, `password`, `leave_date`, `salary`, `role`) VALUES
(1, '2018-01-10', 'Muztafizur', 'Rahman', '546546', 'mustafizur@gmail.com', '435435', '11-07-2017', 'Male', 'enable', '123', '', 10000, 1),
(2, '2018-01-17', 'Sakib All', 'Hasan', '017785664842', 'sakib@gmail.com', 'Dhaka', '1990-02-11', 'Male', 'enable', '123', '', 20000, 1),
(3, '2018-01-10', 'Tamin', 'Iqbal', '156479814352', 'tamim@gmail.com', 'Dhaka', '2018-01-15', 'Female', 'enable', '123', '', 50000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `exp_id` int(11) NOT NULL,
  `exps_date` varchar(15) NOT NULL,
  `exp_type` int(11) DEFAULT NULL,
  `pay_to` varchar(50) NOT NULL,
  `exp_amt` float(8,2) NOT NULL,
  `exp_paidby` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`exp_id`, `exps_date`, `exp_type`, `pay_to`, `exp_amt`, `exp_paidby`) VALUES
(1, '2018-01-22', 1, 'Arif', 10000.00, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `expense_type`
--

CREATE TABLE `expense_type` (
  `exps_id` int(11) NOT NULL,
  `exps_type` varchar(100) NOT NULL,
  `exps_code` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_type`
--

INSERT INTO `expense_type` (`exps_id`, `exps_type`, `exps_code`) VALUES
(1, 'Salary', 'SL'),
(2, 'Buy', 'BY');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `invoice_no` varchar(20) NOT NULL,
  `order_date` date NOT NULL,
  `customer_id` int(10) NOT NULL,
  `discount` int(3) DEFAULT NULL,
  `total_vat` float(8,2) NOT NULL,
  `grand_total` float(8,2) NOT NULL,
  `delivery_date` varchar(15) DEFAULT NULL,
  `order_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`invoice_no`, `order_date`, `customer_id`, `discount`, `total_vat`, `grand_total`, `delivery_date`, `order_status`) VALUES
('5a677a6e80140', '2018-01-23', 1, 0, 10.00, 110.00, '2018-01-25', 'Delivered'),
('5a6798715705a', '2018-01-23', 1, 0, 120.00, 920.00, '2018-01-30', 'Delivered'),
('5a6b7041a453e', '2018-01-26', 1, 0, 24.00, 184.00, NULL, 'Pending'),
('5a6d97c87e35e', '2018-01-28', 1, 13, 38.25, 435.75, NULL, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE `orders_items` (
  `id` int(15) NOT NULL,
  `invoice_no` varchar(20) DEFAULT NULL,
  `service_id` int(10) DEFAULT NULL,
  `cloth_type` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_items`
--

INSERT INTO `orders_items` (`id`, `invoice_no`, `service_id`, `cloth_type`, `qty`) VALUES
(1, '5a677a6e80140', 1, 1, 2),
(2, '5a6798715705a', 2, 2, 10),
(3, '5a6b7041a453e', 2, 2, 2),
(6, '5a6d97c87e35e', 2, 2, 2),
(7, '5a6d97c87e35e', 3, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `id` int(20) NOT NULL,
  `short_code` varchar(10) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `cloth_id` int(11) DEFAULT NULL,
  `vat` decimal(10,0) NOT NULL,
  `price` float NOT NULL,
  `discount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`id`, `short_code`, `service_id`, `cloth_id`, `vat`, `price`, `discount`) VALUES
(1, 'IT', 3, 3, '6', 50, '5'),
(2, 'CP', 2, 3, '10', 30, '0'),
(4, 'WP', 1, 2, '10', 70, '20'),
(5, 'WT', 1, 3, '10', 50, '0'),
(6, 'CS', 2, 1, '15', 100, '10'),
(7, 'CP', 2, 2, '15', 80, '0'),
(8, 'IS', 3, 1, '10', 30, '0'),
(10, 'SW', 1, 1, '10', 60, '15'),
(13, 'IR', 3, 2, '0', 50, '0');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `service_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_code`) VALUES
(1, 'Washing', 'WSH'),
(2, 'Cleaning', 'CL'),
(3, 'Iron', 'IR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cloths`
--
ALTER TABLE `cloths`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cloth_type` (`cloth_type`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_id` (`email_id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`exp_id`),
  ADD KEY `exp_type` (`exp_type`);

--
-- Indexes for table `expense_type`
--
ALTER TABLE `expense_type`
  ADD PRIMARY KEY (`exps_id`),
  ADD UNIQUE KEY `exps_type` (`exps_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_no` (`invoice_no`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `cloth_type` (`cloth_type`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `cloth_id` (`cloth_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_name` (`service_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cloths`
--
ALTER TABLE `cloths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `expense_type`
--
ALTER TABLE `expense_type`
  MODIFY `exps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`exp_type`) REFERENCES `expense_type` (`exps_id`);

--
-- Constraints for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD CONSTRAINT `orders_items_ibfk_1` FOREIGN KEY (`invoice_no`) REFERENCES `orders` (`invoice_no`),
  ADD CONSTRAINT `orders_items_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `orders_items_ibfk_3` FOREIGN KEY (`cloth_type`) REFERENCES `cloths` (`id`);

--
-- Constraints for table `pricing`
--
ALTER TABLE `pricing`
  ADD CONSTRAINT `pricing_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `pricing_ibfk_2` FOREIGN KEY (`cloth_id`) REFERENCES `cloths` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
