-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2021 at 02:33 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pgportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `USN` varchar(20) NOT NULL,
  `total_amount` double NOT NULL,
  `balance_amount` double NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`USN`, `total_amount`, `balance_amount`, `status`) VALUES
('21CS107', 84000, 70000, 0),
('21CS91', 84000, 4000, 0),
('21IS74', 84000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `USN` varchar(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Father_name` varchar(50) NOT NULL,
  `Mother_name` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Age` int(10) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Adhar_number` bigint(30) NOT NULL,
  `Religion` varchar(20) NOT NULL,
  `Caste` varchar(20) NOT NULL,
  `branch` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`USN`, `Name`, `Father_name`, `Mother_name`, `DOB`, `Age`, `Gender`, `Adhar_number`, `Religion`, `Caste`, `branch`) VALUES
('21CS107', 'Darshan S Bharadwaj', 'Sudhi', 'Usha', '2021-04-23', 23, 'm', 123456789011, 'Hindu', 'xyz', 'CSE'),
('21CS91', 'Chandan Bharadwaj', 'Xyz', 'abc', '2000-06-18', 18, 'm', 123456789011, 'Hindu', 'xyz', 'CSE'),
('21IS74', 'Abc s D', 'xyz', 'abc', '0001-06-18', 21, 'm', 123456789011, 'Hindu', 'xyz', 'ISE');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trans_id` int(10) NOT NULL,
  `USN` varchar(20) NOT NULL,
  `trans_date` datetime NOT NULL DEFAULT current_timestamp(),
  `amount_paid` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `USN`, `trans_date`, `amount_paid`) VALUES
(8, '21CS107', '2021-04-23 17:16:32', 7000),
(9, '21CS107', '2021-04-23 17:35:29', 7000),
(10, '21CS91', '2021-04-23 18:01:59', 80000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`USN`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`USN`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `USNT` (`USN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trans_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fee`
--
ALTER TABLE `fee`
  ADD CONSTRAINT `USN` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `USNT` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
