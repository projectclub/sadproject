-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2017 at 01:42 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence_table`
--

CREATE TABLE `attendence_table` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `periodcode` enum('m9','m10','m11','m12','e1','e2','e3') NOT NULL,
  `attendence` enum('Present','Absent') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` enum('leq','lab','tut') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `department` enum('comp','etc','it','mech','mining','ene','civil') NOT NULL,
  `year` year(4) NOT NULL,
  `sem` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `lab` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `roll` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `sem` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `batch_of` year(4) NOT NULL,
  `email` varchar(70) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `batch` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` int(60) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `email` varchar(70) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `department` enum('comp','etc','it','mining','ene','mech','civil') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_course`
--

CREATE TABLE `teacher_course` (
  `teacher_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `sem` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `batch` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `periodcode` enum('m9','m10','m11','m12','e1','e2','e3') NOT NULL,
  `year` year(4) NOT NULL,
  `sem` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `day` enum('mon','tue','wed','thu','fri','sat','sun') NOT NULL,
  `department` enum('comp','etc','it','mech','mining','ene','civil') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendence_table`
--
ALTER TABLE `attendence_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`,`year`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_course`
--
ALTER TABLE `teacher_course`
  ADD PRIMARY KEY (`teacher_id`,`course_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
