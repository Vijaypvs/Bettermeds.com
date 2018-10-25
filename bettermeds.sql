-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2018 at 09:11 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bettermeds`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `Name` varchar(50) DEFAULT NULL,
  `Company_name` varchar(50) DEFAULT NULL,
  `Batch_No` int(11) NOT NULL,
  `Price` int(11) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `Direction_of_use` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Benefits` varchar(255) DEFAULT NULL,
  `Exp_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`Name`, `Company_name`, `Batch_No`, `Price`, `Category`, `Direction_of_use`, `Description`, `Benefits`, `Exp_date`) VALUES
('Crocin Advance', 'Glaxosmithkline Pharma', 1234, 17, 'Tablet', 'After food', 'Crocin Advance Tablet is used to temporarily relieve fever and mild to moderate pain such as muscle ache, headache, toothache, arthritis, and backache. This medicine should be used with caution in patients with liver diseases due to the increased risk of ', 'Fever', '2020-05-20'),
('Clindasure', 'Clindamycin', 124, 135, 'Capsule', 'Before or After food', ' It is used in the treatment for severe bacterial infections', ' Enhance blood circulation of the skin', '2019-05-10'),
('AL Syrup 30ml', 'FDC LTD', 78, 35, 'Syrup', 'To be taken orally', ' Reduces allergetic rashes', ' Overcomes allergy', '2021-04-14'),
('LA Syrup 90ml', 'FDC LTD', 789, 37, 'Syrup', 'To be taken orally', ' Reduces allergetic rashes', ' Overcomes allergy', '2021-04-14'),
('LA Capsule', 'FDA LTD', 7891, 41, 'Capsule', 'To be taken orally', ' Reduces allergetic rashes', ' Overcomes allergy', '2020-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(11) NOT NULL,
  `Mobile_no` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_ID`, `Mobile_no`) VALUES
(1685, 123456789),
(1969, 123456789),
(7999, 123456789),
(8936, 123456789);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Mobile` bigint(20) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Address_Line1` varchar(50) DEFAULT NULL,
  `Address_Line2` varchar(50) DEFAULT NULL,
  `Address_Line3` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Name`, `Email`, `Mobile`, `DOB`, `Address_Line1`, `Address_Line2`, `Address_Line3`, `password`) VALUES
('Bhavuk', 'buu706@gmail.com', 123456789, '1995-06-17', 'nerul', 'navi mumbai', 'mumbai 974554', '$2y$10$oHXc9CAnbTc6eIHkhU8IE.5oeOWK1XMBN5RcA9EDJSz5gTeBSUyNq'),
('Mohit Turakhia', 'mohitturakhia@com.com', 4565789812, '1998-06-18', 'somewhere', 'kandivali', 'city-789456', 'umair123'),
('Mohit Turakhia', 'mohitturakhia123@gmail.com', 7666304531, '1998-07-25', 'A/402,Turakhia Park', 'Mg Road', 'Mumbai 400067', '$2y$10$QvT1PZ6CP9exhWyoS.lM4u4dAp9/4sAHciibYMEWqA0NnmNXBQW1a'),
('Vijay Pratap Singh', 'yaitsfunny123@gmail.com', 7865127865, '1999-05-16', 'Nowhere', 'somewhere', 'city-pincode', '$2y$10$c34ID2n61qVeWcvafR/sx.OHC4Jhhe0xoPi0g7bmHNBJ55PXrIpUq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8937;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
