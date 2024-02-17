use senate_activity;
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2023 at 03:58 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alohababes`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `name`, `type`) VALUES
(2, 'admin', '6ce37c5ba1f4a8ecedea6b8b1fc7b8c5', 'Code Camp BD', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `emp_attendance`
--

CREATE TABLE `senate_attendance` (
  `attendance_id` int NOT NULL,
  `senator_id` varchar(100) NOT NULL,
  `senator_name` varchar(100) NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance_timein` time NOT NULL,
  `attendance_timeout` time NOT NULL,
  `attendance_hour` int NOT NULL, 
  `schedule` varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_attendance`


-- --------------------------------------------------------

--
-- Table structure for table `emp_list`
--

CREATE TABLE `senate_list` (
  `senate_id` int NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `senator_fname` varchar(100) NOT NULL,
  `senator_lname` varchar(100) NOT NULL,
  `senator_position` int NOT NULL,
  `senator_address` varchar(100) NOT NULL,
  `senator_contact` varchar(100) NOT NULL,
  `senator_gender` varchar(100) NOT NULL,
  `senator_DOB` date NOT NULL,
  `senator_timeout` time NOT NULL,
  `sched_id` int NOT NULL,
  `senator_regdate` date NOT NULL,
  `senator_photo` varchar(100) NOT NULL,
  `senator_program` varchar(200) Not Null,
  `password` varchar(200) not null
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_list`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_position`
--

CREATE TABLE `senate_position` (
  `pos_id` int NOT NULL,
  `position_title` varchar(100) NOT NULL,
  `position_rate` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_position`
--



-- --------------------------------------------------------

--
-- Table structure for table `senate_sched`
--

CREATE TABLE `senate_sched` (
  `sched_id` int NOT NULL,
  `sched_in` time NOT NULL,
  `sched_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


create table `sched_minutes`(
`minutes_id` int not null primary key auto_increment,
`file` LONGBLOB,
`desciption` varchar(255)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Indexes for table `senate_attendance`
--
ALTER TABLE `senate_attendance`
  ADD PRIMARY KEY (`senate_attendance_id`);

--
-- Indexes for table `senate_list`
--
ALTER TABLE `senate_list`
  ADD PRIMARY KEY (`senate_id`);

--
-- Indexes for table `senate_position`
--
ALTER TABLE `senate_position`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `senate_sched`
--
ALTER TABLE `senate_sched`
  ADD PRIMARY KEY (`sched_id`);

--
--
--

--
--

--
-- AUTO_INCREMENT for table `senate_attendance`
--
ALTER TABLE `senate_attendance`
  MODIFY `attendance_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `senate_list`
--
ALTER TABLE `senate_list`
  MODIFY `senate_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `senate_position`
--
ALTER TABLE `senate_position`
  MODIFY `pos_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `senate_sched`
--
ALTER TABLE `senate_sched`
  MODIFY `sched_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
