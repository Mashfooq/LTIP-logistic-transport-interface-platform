-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2023 at 06:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `casadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `driverdetail`
--

CREATE TABLE `driverdetail` (
  `driverID` int(11) NOT NULL,
  `driverName` varchar(255) NOT NULL,
  `driverEmail` varchar(50) NOT NULL,
  `driverPhone` int(13) NOT NULL,
  `driverAddress` text NOT NULL,
  `driverStatusID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driverdetail`
--

INSERT INTO `driverdetail` (`driverID`, `driverName`, `driverEmail`, `driverPhone`, `driverAddress`, `driverStatusID`) VALUES
(6, 'dravid@gmail.com', 'dravid@gmail.com', 2147483647, 'mangalore', 1),
(7, 'nasir@gmail.com', 'nasir@gmail.com', 2147483647, 'Ullal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `driverstatus`
--

CREATE TABLE `driverstatus` (
  `driverStatusID` int(11) NOT NULL,
  `driverStatusName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driverstatus`
--

INSERT INTO `driverstatus` (`driverStatusID`, `driverStatusName`) VALUES
(1, 'Inactive'),
(2, 'Active'),
(3, 'Order Received'),
(4, 'In Order');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderDetailID` int(11) NOT NULL,
  `orderRequestID` int(20) NOT NULL,
  `orderDriverID` int(20) NOT NULL,
  `orderStatusID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`orderDetailID`, `orderRequestID`, `orderDriverID`, `orderStatusID`) VALUES
(1, 1, 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `orderStatusID` int(11) NOT NULL,
  `orderStatusName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`orderStatusID`, `orderStatusName`) VALUES
(1, 'Pending'),
(2, 'Assigned'),
(3, 'Accepted'),
(4, 'Declined'),
(5, 'Pick Up '),
(6, 'Picked'),
(7, 'Drop'),
(8, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `requestID` int(11) NOT NULL,
  `requestUserID` int(10) NOT NULL,
  `requestName` varchar(100) NOT NULL,
  `requestPhone` varchar(13) NOT NULL,
  `requestDate` varchar(20) NOT NULL,
  `requestTime` varchar(20) NOT NULL,
  `requestDestination` text NOT NULL,
  `requestStatusID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`requestID`, `requestUserID`, `requestName`, `requestPhone`, `requestDate`, `requestTime`, `requestDestination`, `requestStatusID`) VALUES
(1, 17, 'UN Traders', '9876543211', '2023-03-21', '01:20', 'mangalore', 6);

-- --------------------------------------------------------

--
-- Table structure for table `requeststatus`
--

CREATE TABLE `requeststatus` (
  `requestStatusID` int(11) NOT NULL,
  `requestStatusTitle` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requeststatus`
--

INSERT INTO `requeststatus` (`requestStatusID`, `requestStatusTitle`) VALUES
(1, 'Pending'),
(2, 'Accepted'),
(3, 'Declined'),
(4, 'Cancelled'),
(6, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `shopdetail`
--

CREATE TABLE `shopdetail` (
  `shopID` int(11) NOT NULL,
  `shopName` text NOT NULL,
  `shopEmail` varchar(255) NOT NULL,
  `shopPhone` int(13) NOT NULL,
  `shopAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopdetail`
--

INSERT INTO `shopdetail` (`shopID`, `shopName`, `shopEmail`, `shopPhone`, `shopAddress`) VALUES
(6, 'Casa Milano', 'casamilano@gmail.com', 2147483647, 'HOUSE OMBATHUKERE ULLAL MANGALORE');

-- --------------------------------------------------------

--
-- Table structure for table `truckdetail`
--

CREATE TABLE `truckdetail` (
  `truckID` int(11) NOT NULL,
  `truckName` varchar(255) NOT NULL,
  `truckRegNumber` varchar(15) NOT NULL,
  `truckDriverID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `truckdetail`
--

INSERT INTO `truckdetail` (`truckID`, `truckName`, `truckRegNumber`, `truckDriverID`) VALUES
(6, 'LTIP', 'KA-19-EZ-2100', 6),
(7, 'LTIP', 'KA-19-EZ-2101', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(30) NOT NULL,
  `userPassword` varchar(30) NOT NULL,
  `userGroup` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `userEmail`, `userPassword`, `userGroup`) VALUES
(10, 'shop admin', 'shopadmin@gmail.com', 'c2hvcGFkbWluQGdtYWlsLmNvbQ==', '1'),
(17, 'Casa Milano', 'casamilano@gmail.com', 'Y2FzYW1pbGFub0BnbWFpbC5jb20=', '2'),
(24, 'dravid@gmail.com', 'dravid@gmail.com', 'ZHJhdmlkQGdtYWlsLmNvbQ==', '3'),
(25, 'nasir@gmail.com', 'nasir@gmail.com', 'bmFzaXJAZ21haWwuY29t', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driverdetail`
--
ALTER TABLE `driverdetail`
  ADD PRIMARY KEY (`driverID`),
  ADD KEY `driverStatus` (`driverStatusID`);

--
-- Indexes for table `driverstatus`
--
ALTER TABLE `driverstatus`
  ADD PRIMARY KEY (`driverStatusID`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderDetailID`),
  ADD KEY `orderStatus` (`orderStatusID`),
  ADD KEY `orderDriver` (`orderDriverID`),
  ADD KEY `orderRequest` (`orderRequestID`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`orderStatusID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`requestID`),
  ADD KEY `user` (`requestUserID`),
  ADD KEY `requestStatusID` (`requestStatusID`);

--
-- Indexes for table `requeststatus`
--
ALTER TABLE `requeststatus`
  ADD PRIMARY KEY (`requestStatusID`);

--
-- Indexes for table `shopdetail`
--
ALTER TABLE `shopdetail`
  ADD PRIMARY KEY (`shopID`);

--
-- Indexes for table `truckdetail`
--
ALTER TABLE `truckdetail`
  ADD PRIMARY KEY (`truckID`),
  ADD KEY `driver` (`truckDriverID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driverdetail`
--
ALTER TABLE `driverdetail`
  MODIFY `driverID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `driverstatus`
--
ALTER TABLE `driverstatus`
  MODIFY `driverStatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `orderDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `orderStatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `requestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requeststatus`
--
ALTER TABLE `requeststatus`
  MODIFY `requestStatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shopdetail`
--
ALTER TABLE `shopdetail`
  MODIFY `shopID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `truckdetail`
--
ALTER TABLE `truckdetail`
  MODIFY `truckID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `driverdetail`
--
ALTER TABLE `driverdetail`
  ADD CONSTRAINT `driverdetail_ibfk_1` FOREIGN KEY (`driverStatusID`) REFERENCES `driverstatus` (`driverStatusID`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderDriver` FOREIGN KEY (`orderDriverID`) REFERENCES `driverdetail` (`driverID`),
  ADD CONSTRAINT `orderRequest` FOREIGN KEY (`orderRequestID`) REFERENCES `request` (`requestID`),
  ADD CONSTRAINT `orderStatus` FOREIGN KEY (`orderStatusID`) REFERENCES `orderstatus` (`orderStatusID`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`requestStatusID`) REFERENCES `requeststatus` (`requestStatusID`),
  ADD CONSTRAINT `user` FOREIGN KEY (`requestUserId`) REFERENCES `users` (`userID`);

--
-- Constraints for table `truckdetail`
--
ALTER TABLE `truckdetail`
  ADD CONSTRAINT `driver` FOREIGN KEY (`truckDriverID`) REFERENCES `driverdetail` (`driverID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
