-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2021 at 05:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `cvddetails`
--

CREATE TABLE `cvddetails` (
  `id` int(10) NOT NULL,
  `cvdstatus` varchar(5) NOT NULL,
  `cvddate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cvddetails`
--

INSERT INTO `cvddetails` (`id`, `cvdstatus`, `cvddate`) VALUES
(1, 'No', 'Not affected'),
(2, 'No', 'Not affected'),
(3, 'Yes', '2020-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `username` varchar(220) NOT NULL,
  `password` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `reg_no` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` varchar(225) NOT NULL,
  `date` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `reg_no`, `name`, `message`, `date`, `email`) VALUES
(4, 1234, 'Krishnanand A', 'asd', '25-12-2021', 'krishnanand654@gmail.com'),
(5, 123, 'Krishnanand A', 'asd', '25-12-2021', 'krishnanand654@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `no` bigint(15) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `reg_num` int(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `no`, `dept`, `course`, `reg_num`, `email`) VALUES
(1, 'Krishnanand A', 1234, 'CS', 'BCA', 1234, 'krishnanand654@gmail.com'),
(2, 'as', 234, 'asd', 'asd', 12, 'ksfdkbjdsfhbasdhigaid@gmail.com'),
(3, 'Krishnanand A', 123, 'ads', 'ads', 123, 'krishnanand654@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `vacdetails`
--

CREATE TABLE `vacdetails` (
  `id` int(10) NOT NULL,
  `vacstatus` varchar(3) NOT NULL,
  `vacdate` varchar(20) DEFAULT '0',
  `dos` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacdetails`
--

INSERT INTO `vacdetails` (`id`, `vacstatus`, `vacdate`, `dos`) VALUES
(1, 'No', 'Not taken', 0),
(2, 'No', 'Not taken', 0),
(3, 'Yes', '2021-10-20', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cvddetails`
--
ALTER TABLE `cvddetails`
  ADD KEY `id` (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reg_num` (`reg_num`);

--
-- Indexes for table `vacdetails`
--
ALTER TABLE `vacdetails`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cvddetails`
--
ALTER TABLE `cvddetails`
  ADD CONSTRAINT `cvddetails_ibfk_1` FOREIGN KEY (`id`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `cvddetails_ibfk_2` FOREIGN KEY (`id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vacdetails`
--
ALTER TABLE `vacdetails`
  ADD CONSTRAINT `vacdetails_ibfk_1` FOREIGN KEY (`id`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `vacdetails_ibfk_2` FOREIGN KEY (`id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
