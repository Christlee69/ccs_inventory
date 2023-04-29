-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 02:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+08:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccs_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `productID` int(11) NOT NULL,
  `itemNumber` varchar(255) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `itemlocation` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `unitPrice` float NOT NULL DEFAULT 0,
  `imageURL` varchar(255) NOT NULL DEFAULT 'imageNotAvailable.jpg',
  `category` varchar(255) NOT NULL DEFAULT 'Active',
  `description` text NOT NULL,
  `itemdate` datetime NOT NULL DEFAULT current_timestamp(),
  `suggestions` varchar(255) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`productID`, `itemNumber`, `itemName`, `itemlocation`, `stock`, `unitPrice`, `imageURL`, `category`, `description`, `itemdate`, `suggestions`, `itemage`, `currentdate`, `datediff`) VALUES
(71, '6', 'Core i5 10th gen', '', 11, 25000, 'imageNotAvailable.jpg', 'Computer', 'PC set', '2023-01-09', '', '0', '2023-02-27', NULL),
(72, '1', 'System Unit', '', 50, 20000, 'imageNotAvailable.jpg', 'Computer', 'Ryzen 5 5600g\n16GB ram\n512 gb ssd\n', '2023-01-09', '', '0', '2023-02-27', NULL),
(74, '4', 'test', '', 1, 11, 'imageNotAvailable.jpg', 'Computer', 'test', '2023-01-10', '', '0', '2023-02-27', NULL),
(75, '5', 'test2', '', 1, 11111, 'imageNotAvailable.jpg', 'Computer', 'test2', '2023-01-01', '', '0', '2023-02-27', NULL),
(76, '12', 'tetst3', '', 1, 1000, 'imageNotAvailable.jpg', 'Computer', 'testing123', '2023-01-01', '', '0', '2023-02-27', NULL),
(87, '136', 'paint', '', 3, 500, 'imageNotAvailable.jpg', 'Computer', 'grey', '2023-02-25', '', NULL, '2023-02-27', NULL),
(88, '3', 'mouse', '', 1, 200, 'imageNotAvailable.jpg', 'Computer', 'a4tech', '2023-03-15', '', NULL, '2023-03-15', NULL),
(89, '7', 'test', '', 1, 1222, 'imageNotAvailable.jpg', 'Computer', 'last', '0000-00-00', '', NULL, '2023-03-15', NULL),
(90, '10', 'tesstt', '', 10, 2000, 'imageNotAvailable.jpg', 'Computer', 'teessttt', '2023-03-15', '', NULL, '2023-03-15', NULL),
(91, '11', 'tessttt', '', 1, 1222, 'imageNotAvailable.jpg', 'Computer', 'testt', '0000-00-00', '', NULL, '2023-03-15', NULL),
(93, '2', 'Thermal paste', 'Linux Laboratory', 2, 1000, 'imageNotAvailable.jpg', 'Tool', 'MX-4', '2023-03-15', '', NULL, '2023-03-15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseID` int(11) NOT NULL,
  `itemNumber` varchar(255) NOT NULL,
  `purchaseDate` date NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `unitPrice` float NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `vendorName` varchar(255) NOT NULL DEFAULT 'Test Vendor',
  `vendorID` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fullName`, `username`, `password`, `status`) VALUES
(5, 'Guest', 'guest', '81dc9bdb52d04dc20036dbd8313ed055', 'Active'),
(6, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'Active'),
(7, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendorID` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` int(11) NOT NULL,
  `phone2` int(11) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `district` varchar(30) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendorID`, `fullname`, `email`, `mobile`, `phone2`, `address`, `address2`, `city`, `district`, `status`, `createdOn`) VALUES
(1, 'Algorithm', 'algorithmdumaguete@gmail.com', 1111, NULL, 'Daro', NULL, 'Dumaguete', 'Negros Oriental', 'Active', '2022-09-30 12:49:35'),
(2, 'Ace Logic', 'acelogic@gmail.com', 2222, NULL, 'San juan st', NULL, 'Dumaguete', 'Negros Oriental', 'Active', '2022-09-30 12:52:22'),
(3, 'Octagon', 'octagon@gmail.com', 3333, NULL, 'Perdices St', NULL, 'Dumaguete', 'Negros Oriental', 'Active', '2022-09-30 12:52:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
