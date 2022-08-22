-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2021 at 06:00 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_pannel`
--

CREATE TABLE `admin_pannel` (
  `id` int(11) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_pannel`
--

INSERT INTO `admin_pannel` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `admin_regis`
--

CREATE TABLE `admin_regis` (
  `id` int(11) NOT NULL,
  `fullname` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_regis`
--

INSERT INTO `admin_regis` (`id`, `fullname`, `email`, `phone`, `password`) VALUES
(0, 'Ramesh Neupane', 'rameshneupane258@gmail.com', '9843063427', 'c2ff57020e1befec8bbd339e0efebf56'),
(1, 'admin3', 'admin3@gmail.com', '9846597072', '898c4bad6dcb2aaa73f1903ede7d7af5'),
(2, 'admin2', 'admin2@gmail.com', '', 'admin2'),
(3, 'Rajesh Pandey', 'rajeshpandey@gmail.com', '453453453', '770481f04be680eda61c2849cad9d092'),
(4, 'admin77', 'admin77@gmail.com', '666666666', '@Admin77'),
(5, 'admin8', 'admin8@gmail.com', '5656465656', '@Admin8'),
(6, 'hahaha', 'hahaha@gmail.com', '432423432', '@Haha1234'),
(7, 'testadmin', 'testadmin@gmail.com', '35435345345', 'Testadmin@123'),
(8, 'hahahaha', 'hahahaha@gmail.com', '12344321', '793de9809ca97ede4476cbcb26fc18a1'),
(9, 'testadmin2', 'testadmin2@gmail.com', '1234', 'ba4e8c9bfec82f56cac09460f9ecab77');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cid` int(11) NOT NULL,
  `customer_name` varchar(200) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `phone` varchar(122) DEFAULT NULL,
  `parent` varchar(200) DEFAULT NULL,
  `citizenship_no` varchar(200) DEFAULT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cid`, `customer_name`, `address`, `email`, `phone`, `parent`, `citizenship_no`, `profile`) VALUES
(7, 'Dipesh Tamang', 'Kathmandu Nepal', 'admin@gmail.com', '55555', 'Victor', '1020020', '22917c03caa26a5e8f25bad87b9f9870.jpg'),
(8, 'Ganesh Neupane', 'Bhaktapur', 'gn@gmail.com', '1122222', 'Neupane ', '20121223', '8d191794ab864f839fca46f771fa1f60.png'),
(9, 'Abhisek Paudel', 'Kalanki, kathmandu', 'abhp@gmail.com', '3254345345', 'fdsfsd', 'dsd', '15ff0b00583ec186d7a1b35d99697a34.png'),
(10, 'Ramesh Neupane', 'Tinkune, Kathmandu', 'agh@gmail.com', '9843063427', 'hahahahah', '1234567', '8a577986a7c2144eaa0a68aa86605d9c.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer_login`
--

CREATE TABLE `customer_login` (
  `rid` int(11) NOT NULL,
  `room_holder` int(11) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_login`
--

INSERT INTO `customer_login` (`rid`, `room_holder`, `password`) VALUES
(4, 7, '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 8, '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 9, '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `issue_rent`
--

CREATE TABLE `issue_rent` (
  `issue_id` int(11) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `month` varchar(10) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_rent`
--

INSERT INTO `issue_rent` (`issue_id`, `year`, `month`, `amount`) VALUES
(6, 2021, '01', '12000'),
(7, 2021, '02', '12000'),
(8, 2021, '03', '12000'),
(9, 2021, '04', '12000'),
(10, 2021, '05', '12000');

-- --------------------------------------------------------

--
-- Table structure for table `rent_status`
--

CREATE TABLE `rent_status` (
  `rent_id` int(11) NOT NULL,
  `customer` int(11) DEFAULT NULL,
  `rent` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent_status`
--

INSERT INTO `rent_status` (`rent_id`, `customer`, `rent`, `status`) VALUES
(15, 7, 9, 1),
(16, 7, 10, 1),
(19, 8, 7, 1),
(22, 9, 11, 1),
(23, 7, 11, 1),
(24, 7, 7, 1),
(25, 8, 6, 1),
(26, 8, 8, 1),
(27, 7, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roominfo`
--

CREATE TABLE `roominfo` (
  `id` int(11) NOT NULL,
  `room_no` int(11) DEFAULT NULL,
  `room_owner` int(11) DEFAULT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roominfo`
--

INSERT INTO `roominfo` (`id`, `room_no`, `room_owner`, `msg`) VALUES
(9, 112, 8, 'thank you for paying'),
(10, 105, 9, 'Good.. Keep going like this'),
(11, 500, 7, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_pannel`
--
ALTER TABLE `admin_pannel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_regis`
--
ALTER TABLE `admin_regis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `citizenship_no` (`citizenship_no`);

--
-- Indexes for table `customer_login`
--
ALTER TABLE `customer_login`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `customer_login_ibfk_1` (`room_holder`);

--
-- Indexes for table `issue_rent`
--
ALTER TABLE `issue_rent`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `rent_status`
--
ALTER TABLE `rent_status`
  ADD PRIMARY KEY (`rent_id`),
  ADD KEY `rent` (`rent`),
  ADD KEY `customer` (`customer`);

--
-- Indexes for table `roominfo`
--
ALTER TABLE `roominfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_owner` (`room_owner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_pannel`
--
ALTER TABLE `admin_pannel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_login`
--
ALTER TABLE `customer_login`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `issue_rent`
--
ALTER TABLE `issue_rent`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rent_status`
--
ALTER TABLE `rent_status`
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `roominfo`
--
ALTER TABLE `roominfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_login`
--
ALTER TABLE `customer_login`
  ADD CONSTRAINT `customer_login_ibfk_1` FOREIGN KEY (`room_holder`) REFERENCES `customers` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rent_status`
--
ALTER TABLE `rent_status`
  ADD CONSTRAINT `rent_status_ibfk_1` FOREIGN KEY (`rent`) REFERENCES `issue_rent` (`issue_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rent_status_ibfk_2` FOREIGN KEY (`customer`) REFERENCES `customers` (`cid`) ON UPDATE CASCADE;

--
-- Constraints for table `roominfo`
--
ALTER TABLE `roominfo`
  ADD CONSTRAINT `roominfo_ibfk_1` FOREIGN KEY (`room_owner`) REFERENCES `customers` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
