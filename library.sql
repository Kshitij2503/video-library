-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2019 at 09:12 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `u_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `u_name`, `password`) VALUES
(1, 'kshitij', 'dtAÇ8T‰Œ¸±'),
(2, 'mukul', '´4&Û·^ä'),
(3, 'imran', '’Ü–nlÈ¤M÷');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `dob`, `address`, `phone_no`) VALUES
(1001, 'a', '1991-01-01', 'abc,ajmer', 999559966),
(1002, 'b', '1992-02-02', 'bond street,ajmer', 988776655),
(1003, 'Kshitij', '1997-03-05', 'ajmer', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `bill_no` int(15) NOT NULL,
  `v_id` int(15) NOT NULL,
  `c_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`bill_no`, `v_id`, `c_id`, `date`, `payment_mode`, `price`) VALUES
(3001, 5001, 1001, '2018-09-14', 'Cash', 500),
(3002, 5002, 1001, '2018-09-05', 'Cash', 600),
(3003, 5004, 1002, '2018-09-27', 'Debit Card', 900);

-- --------------------------------------------------------

--
-- Table structure for table `rented_videos`
--

CREATE TABLE `rented_videos` (
  `sno` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `r_price` int(11) NOT NULL,
  `date_of_purchase` date NOT NULL,
  `date_of_return` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rented_videos`
--

INSERT INTO `rented_videos` (`sno`, `v_id`, `c_id`, `r_price`, `date_of_purchase`, `date_of_return`) VALUES
(1, 5002, 1001, 600, '2018-09-10', '2018-09-17'),
(2, 5002, 1002, 650, '2018-09-11', '2018-09-25'),
(3, 5004, 1002, 900, '2018-09-17', '2018-09-27'),
(4, 5005, 1001, 750, '2018-09-14', '2018-09-21'),
(5, 5001, 1001, 150, '2018-09-03', '2018-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `v_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `year_released` int(11) NOT NULL,
  `b_price` int(11) NOT NULL,
  `r_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`v_id`, `title`, `year_released`, `b_price`, `r_price`) VALUES
(5001, 'video1', 2016, 500, 150),
(5002, 'video2', 2018, 600, 200),
(5003, 'video3', 2015, 550, 160),
(5004, 'video4', 2018, 900, 300),
(5005, 'video5', 2017, 750, 245),
(5006, 'video7', 2016, 700, 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`bill_no`),
  ADD KEY `v_id` (`v_id`);

--
-- Indexes for table `rented_videos`
--
ALTER TABLE `rented_videos`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `v_id` (`v_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `bill_no` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3004;

--
-- AUTO_INCREMENT for table `rented_videos`
--
ALTER TABLE `rented_videos`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5007;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`v_id`) REFERENCES `videos` (`v_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`v_id`) REFERENCES `videos` (`v_id`);

--
-- Constraints for table `rented_videos`
--
ALTER TABLE `rented_videos`
  ADD CONSTRAINT `rented_videos_ibfk_1` FOREIGN KEY (`v_id`) REFERENCES `videos` (`v_id`),
  ADD CONSTRAINT `rented_videos_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
