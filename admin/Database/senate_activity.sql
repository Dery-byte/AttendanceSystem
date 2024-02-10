-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2020 at 04:23 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6
create schema senate_activity;
use senate_activity;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `name`, `type`) VALUES
(1, 'admin', 'password', 'Human Resource', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `emp_attendance`
--

CREATE TABLE `senate_attendance` (
  `attendance_id` int(11) NOT NULL,
  `senator_id` varchar(100) NOT NULL,
  `senator_name` varchar(100) NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance_timein` time NOT NULL,
  `attendance_timeout` time NOT NULL,
  `attendance_hour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_list`
--

CREATE TABLE `senate_list` (
  `senate_id` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `senator_fname` varchar(100) NOT NULL,
  `senator_lname` varchar(100) NOT NULL,
  `senator_position` int(11) NOT NULL,
  `senator_address` varchar(100) NOT NULL,
  `senator_contact` varchar(100) NOT NULL,
  `senator_gender` varchar(100) NOT NULL,
  `senator_regdate` date NOT NULL,
  `senator_photo` varchar(100) NOT NULL,
  `password` varchar(100) Null,
  `type` varchar(70) null
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_position`
--

CREATE TABLE `senate_position` (
  `pos_id` int(11) NOT NULL,
  `position_title` varchar(100) NOT NULL,
  `position_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_sched`
--

CREATE TABLE `senate_sched` (
  `sched_id` int(11) NOT NULL,
  `sched_in` time NOT NULL,
  `sched_out` time NOT NULL,
  `meeting_name` varchar(225) not null
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salary_deduct`
--

CREATE TABLE `salary_deduct` (
  `deduct_id` int(11) NOT NULL,
  `deduct_desc` varchar(100) NOT NULL,
  `deduct_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_attendance`
--
ALTER TABLE `senate_attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `emp_list`
--
ALTER TABLE `senate_list`
  ADD PRIMARY KEY (`senate_id`);

--
-- Indexes for table `emp_position`
--
ALTER TABLE `senate_position`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `emp_sched`
--
ALTER TABLE `senate_sched`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `salary_deduct`
--
ALTER TABLE `salary_deduct`
  ADD PRIMARY KEY (`deduct_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emp_attendance`
--
ALTER TABLE `senate_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_list`
--
ALTER TABLE `senate_list`
  MODIFY `senate_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_position`
--
ALTER TABLE `senate_position`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_sched`
--
ALTER TABLE `senate_sched`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_deduct`
--
ALTER TABLE `salary_deduct`
  MODIFY `deduct_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
