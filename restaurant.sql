-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2017 at 04:58 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_id` int(11) NOT NULL,
  `F_name` char(50) NOT NULL,
  `L_name` char(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone_number` varchar(10) NOT NULL,
  `Email` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_id`, `F_name`, `L_name`, `Address`, `Phone_number`, `Email`) VALUES
(1, 'Mikee', 'Alderson', '6969 Grand Blvd, St. Louis, MO, 63103', '3146967000', 'mikee.alderson@slu.edu'),
(2, 'Joel', 'O\'Donnell', '4200 Pennsylvania Road, St. Louis, MO, 63118', '2347685500', 'mountain.views@views.com'),
(3, 'George', 'Jungle', '2107 Tree Lane, Jungle, Ohio, 45667', '4503334444', 'jungle.ge@forest.org'),
(4, 'Sophia', 'Choo', '7 Sparks Rd, St. Louis, MO, 63101', '3145678110', 'sophia.choo@gmail.com'),
(5, 'Joseph', 'Lee', '4110 Baker St, St. Louis, MO, 63101', '3146602000', 'joelee@yahoo.com'),
(6, 'Dawei', 'Philiphose', '3670 Woods Rd, St. Louis, MO, 63109', '6364508112', 'dawphil@slu.edu');

-- --------------------------------------------------------

--
-- Table structure for table `employee_delivery`
--

CREATE TABLE `employee_delivery` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `hourly_wage` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_delivery`
--

INSERT INTO `employee_delivery` (`employee_id`, `employee_name`, `restaurant_id`, `hourly_wage`) VALUES
(1, 'James Gordon', 27, 8.75),
(2, 'Reggie Watts', 28, 9),
(3, 'Ed Lannister', 27, 9),
(5, 'Ellie Goulding', 31, 8.5),
(6, 'Homer Simpson', 30, 10),
(7, 'Hellen O\'Troy', 29, 11),
(9, 'Stanly Ylnats', 30, 9);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `Item_id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Price` double NOT NULL,
  `Food_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table of item names, descriptions, and price';

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Item_id`, `Name`, `Description`, `Price`, `Food_type`) VALUES
(1, 'Burger', 'Non-GMO and Gluten Free', 7.95, 'FOOD'),
(2, 'Fries', 'Crinkle Cut', 3.75, 'FOOD'),
(3, 'Chicken Alfredo', 'Chicken, alfredo sauce', 8.75, 'FOOD'),
(4, 'Sprite Can', 'CocaCola Product', 1.05, 'DRINK'),
(5, 'Coffee', 'Folger\'s', 2.25, 'DRINK'),
(6, 'Medium Pizza', 'Freshly baked', 10.45, 'FOOD'),
(7, 'Large Pizza', 'Freshly baked', 14.45, 'FOOD'),
(8, 'Sweet Tea', 'Lipton', 2.45, 'DRINK'),
(9, 'White Rice', 'Jasmine, small bowl', 3, 'FOOD'),
(10, 'Red Wine', '1964', 12, 'DRINK'),
(11, '2L CocaCola', 'CocaCola', 2.15, 'DRINK'),
(12, 'Salad', 'Lettuce', 5.5, 'FOOD');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `Order_id` int(11) NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `Payment_id` int(11) NOT NULL,
  `Restaurant_id` int(11) NOT NULL,
  `Special_instruction` varchar(255) DEFAULT NULL,
  `Delivery_date` date NOT NULL,
  `Delivery_time` time NOT NULL,
  `Employee_id` int(11) NOT NULL,
  `Total_cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`Order_id`, `Customer_id`, `Payment_id`, `Restaurant_id`, `Special_instruction`, `Delivery_date`, `Delivery_time`, `Employee_id`, `Total_cost`) VALUES
(1, 1, 2, 27, 'Ring on the side', '2017-12-09', '18:00:00', 1, 4.8),
(2, 2, 3, 27, '', '2017-12-09', '19:45:00', 3, 7.95),
(3, 3, 1, 28, '', '2017-12-10', '11:30:00', 2, 14.7),
(4, 4, 5, 29, 'Knock on door', '2017-12-10', '13:35:00', 7, 12),
(5, 5, 6, 30, '', '2017-12-11', '15:00:00', 9, 28.9),
(6, 6, 4, 31, '', '2017-12-11', '20:10:00', 5, 19.2);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `Order_id` int(11) NOT NULL,
  `Item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`Order_id`, `Item_id`) VALUES
(1, 2),
(1, 4),
(2, 12),
(2, 8),
(3, 1),
(3, 2),
(3, 9),
(4, 10),
(5, 7),
(5, 7),
(6, 6),
(6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `payment_info`
--

CREATE TABLE `payment_info` (
  `Payment_id` int(11) NOT NULL,
  `Method` varchar(50) NOT NULL COMMENT 'Cash/Credit',
  `Company` varchar(50) NOT NULL,
  `Cardholder_name` varchar(100) NOT NULL,
  `Card_no` varchar(100) NOT NULL,
  `Expiration` varchar(50) NOT NULL,
  `Security_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_info`
--

INSERT INTO `payment_info` (`Payment_id`, `Method`, `Company`, `Cardholder_name`, `Card_no`, `Expiration`, `Security_code`) VALUES
(1, 'CARD', 'VS', 'GEORGE JUNGLE', '5555 1000 2000 3000', '8/18', 100),
(2, 'CASH', '', '', '', '', 0),
(3, 'CARD', 'MC', 'JOEL O\'DONNELL', '4321 1234 1234 1234', '12/19', 300),
(4, 'CASH', '', '', '', '', 0),
(5, 'CARD', 'VS', 'SOPHIA CHOO', '4567 0987 1111 2222', '3/21', 543),
(6, 'CARD', 'MC', 'JOSEPH LEE', '5678 2200 8888 0000', '6/22', 111);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_branch`
--

CREATE TABLE `restaurant_branch` (
  `Restaurant_id` int(11) NOT NULL,
  `Restaurant_address` varchar(255) NOT NULL,
  `pickup_time_start` time NOT NULL,
  `pickup_time_end` time NOT NULL,
  `delivery_time_start` time NOT NULL,
  `delivery_time_end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_branch`
--

INSERT INTO `restaurant_branch` (`Restaurant_id`, `Restaurant_address`, `pickup_time_start`, `pickup_time_end`, `delivery_time_start`, `delivery_time_end`) VALUES
(27, '1200 Virginia Rd, St. Louis, MO, 63101', '10:00:00', '20:00:00', '10:00:00', '23:00:00'),
(28, '450 Maine Street, St. Louis, MO, 63103', '10:00:00', '20:00:00', '10:00:00', '22:00:00'),
(29, '346 Spring Street, St. Louis, MO, 63116', '09:00:00', '21:00:00', '09:00:00', '21:00:00'),
(30, '9102 Ohio Blvd, St. Louis, MO, 63111', '09:00:00', '21:30:00', '09:30:00', '22:00:00'),
(31, '87 Maple Avenue, St. Louis, MO, 63116', '08:00:00', '21:00:00', '09:00:00', '21:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `employee_delivery`
--
ALTER TABLE `employee_delivery`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Item_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`Order_id`),
  ADD UNIQUE KEY `Order_id` (`Order_id`);

--
-- Indexes for table `payment_info`
--
ALTER TABLE `payment_info`
  ADD PRIMARY KEY (`Payment_id`);

--
-- Indexes for table `restaurant_branch`
--
ALTER TABLE `restaurant_branch`
  ADD PRIMARY KEY (`Restaurant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee_delivery`
--
ALTER TABLE `employee_delivery`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `Item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_info`
--
ALTER TABLE `payment_info`
  MODIFY `Payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `restaurant_branch`
--
ALTER TABLE `restaurant_branch`
  MODIFY `Restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
