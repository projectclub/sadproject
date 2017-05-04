-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2017 at 09:32 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`) VALUES
(0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendence_table`
--

CREATE TABLE `attendence_table` (
  `id` int(11) DEFAULT NULL,
  `roll` int(11) NOT NULL,
  `date` date NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `periodcode` enum('m9','m10','m11','m12','e1','e2','e3') NOT NULL,
  `attendence` enum('Present','Absent') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `class_type` enum('leq','lab','tut') NOT NULL DEFAULT 'leq',
  `sem` enum('1','2','3','4','5','6','7','8') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendence_table`
--

INSERT INTO `attendence_table` (`id`, `roll`, `date`, `course_id`, `teacher_id`, `periodcode`, `attendence`, `timestamp`, `class_type`, `sem`) VALUES
(NULL, 111051, '2017-05-11', 103, 111, 'm9', 'Present', '2017-05-04 16:41:16', 'lab', '4'),
(NULL, 111051, '2017-05-16', 103, 111, 'm10', 'Present', '2017-05-04 17:37:40', 'tut', '4'),
(NULL, 111051, '2017-05-17', 103, 111, 'm9', 'Present', '2017-05-04 15:51:54', 'tut', '4'),
(NULL, 111051, '2017-05-17', 103, 111, 'm10', 'Present', '2017-05-04 17:39:08', 'lab', '4'),
(NULL, 111051, '2017-05-18', 103, 111, 'm9', 'Present', '2017-05-04 16:13:23', 'lab', '4'),
(NULL, 111051, '2017-05-18', 103, 111, 'm10', 'Present', '2017-05-04 17:38:44', 'tut', '4'),
(NULL, 111051, '2017-05-23', 103, 111, 'm9', 'Present', '2017-05-04 16:13:04', 'leq', '4'),
(NULL, 111051, '2017-05-24', 103, 111, 'm9', 'Present', '2017-05-04 16:16:03', 'lab', '4'),
(NULL, 111051, '2017-05-25', 103, 111, 'm10', 'Present', '2017-05-04 17:35:44', 'lab', '4'),
(NULL, 111051, '2017-05-26', 103, 111, 'm9', 'Present', '2017-05-04 16:46:42', 'lab', '4'),
(NULL, 111052, '2017-05-11', 103, 111, 'm9', 'Present', '2017-05-04 16:41:16', 'lab', '4'),
(NULL, 111052, '2017-05-16', 103, 111, 'm10', 'Present', '2017-05-04 17:37:40', 'tut', '4'),
(NULL, 111052, '2017-05-17', 103, 111, 'm9', 'Present', '2017-05-04 15:51:54', 'tut', '4'),
(NULL, 111052, '2017-05-17', 103, 111, 'm10', 'Present', '2017-05-04 17:39:08', 'lab', '4'),
(NULL, 111052, '2017-05-18', 103, 111, 'm9', 'Present', '2017-05-04 16:13:23', 'lab', '4'),
(NULL, 111052, '2017-05-18', 103, 111, 'm10', 'Present', '2017-05-04 17:38:44', 'tut', '4'),
(NULL, 111052, '2017-05-23', 103, 111, 'm9', 'Present', '2017-05-04 16:13:04', 'leq', '4'),
(NULL, 111052, '2017-05-24', 103, 111, 'm9', 'Present', '2017-05-04 16:16:03', 'lab', '4'),
(NULL, 111052, '2017-05-25', 103, 111, 'm10', 'Present', '2017-05-04 17:35:44', 'lab', '4'),
(NULL, 111052, '2017-05-26', 103, 111, 'm9', 'Absent', '2017-05-04 16:46:42', 'lab', '4'),
(NULL, 111053, '2017-05-11', 103, 111, 'm9', 'Present', '2017-05-04 16:41:16', 'lab', '4'),
(NULL, 111053, '2017-05-16', 103, 111, 'm10', 'Present', '2017-05-04 17:37:40', 'tut', '4'),
(NULL, 111053, '2017-05-17', 103, 111, 'm9', 'Present', '2017-05-04 15:51:54', 'tut', '4'),
(NULL, 111053, '2017-05-17', 103, 111, 'm10', 'Present', '2017-05-04 17:39:08', 'lab', '4'),
(NULL, 111053, '2017-05-18', 103, 111, 'm9', 'Present', '2017-05-04 16:13:23', 'lab', '4'),
(NULL, 111053, '2017-05-18', 103, 111, 'm10', 'Present', '2017-05-04 17:38:44', 'tut', '4'),
(NULL, 111053, '2017-05-23', 103, 111, 'm9', 'Present', '2017-05-04 16:13:04', 'leq', '4'),
(NULL, 111053, '2017-05-24', 103, 111, 'm9', 'Present', '2017-05-04 16:16:03', 'lab', '4'),
(NULL, 111053, '2017-05-25', 103, 111, 'm10', 'Present', '2017-05-04 17:35:44', 'lab', '4'),
(NULL, 111053, '2017-05-26', 103, 111, 'm9', 'Present', '2017-05-04 16:46:42', 'lab', '4'),
(NULL, 111054, '2017-05-11', 103, 111, 'm9', 'Present', '2017-05-04 16:41:16', 'lab', '4'),
(NULL, 111054, '2017-05-16', 103, 111, 'm10', 'Present', '2017-05-04 17:37:40', 'tut', '4'),
(NULL, 111054, '2017-05-17', 103, 111, 'm9', 'Present', '2017-05-04 15:51:54', 'tut', '4'),
(NULL, 111054, '2017-05-17', 103, 111, 'm10', 'Present', '2017-05-04 17:39:08', 'lab', '4'),
(NULL, 111054, '2017-05-18', 103, 111, 'm9', 'Present', '2017-05-04 16:13:23', 'lab', '4'),
(NULL, 111054, '2017-05-18', 103, 111, 'm10', 'Present', '2017-05-04 17:38:44', 'tut', '4'),
(NULL, 111054, '2017-05-23', 103, 111, 'm9', 'Present', '2017-05-04 16:13:04', 'leq', '4'),
(NULL, 111054, '2017-05-24', 103, 111, 'm9', 'Present', '2017-05-04 16:16:03', 'lab', '4'),
(NULL, 111054, '2017-05-25', 103, 111, 'm10', 'Present', '2017-05-04 17:35:44', 'lab', '4'),
(NULL, 111054, '2017-05-26', 103, 111, 'm9', 'Present', '2017-05-04 16:46:42', 'lab', '4'),
(NULL, 111055, '2017-05-11', 103, 111, 'm9', 'Present', '2017-05-04 16:41:16', 'lab', '4'),
(NULL, 111055, '2017-05-16', 103, 111, 'm10', 'Present', '2017-05-04 17:37:40', 'tut', '4'),
(NULL, 111055, '2017-05-17', 103, 111, 'm9', 'Present', '2017-05-04 15:51:54', 'tut', '4'),
(NULL, 111055, '2017-05-17', 103, 111, 'm10', 'Present', '2017-05-04 17:39:08', 'lab', '4'),
(NULL, 111055, '2017-05-18', 103, 111, 'm9', 'Present', '2017-05-04 16:13:23', 'lab', '4'),
(NULL, 111055, '2017-05-18', 103, 111, 'm10', 'Present', '2017-05-04 17:38:44', 'tut', '4'),
(NULL, 111055, '2017-05-23', 103, 111, 'm9', 'Present', '2017-05-04 16:13:04', 'leq', '4'),
(NULL, 111055, '2017-05-24', 103, 111, 'm9', 'Present', '2017-05-04 16:16:03', 'lab', '4'),
(NULL, 111055, '2017-05-25', 103, 111, 'm10', 'Present', '2017-05-04 17:35:44', 'lab', '4'),
(NULL, 111055, '2017-05-26', 103, 111, 'm9', 'Present', '2017-05-04 16:46:42', 'lab', '4'),
(NULL, 111056, '2017-05-11', 103, 111, 'm9', 'Present', '2017-05-04 16:41:16', 'lab', '4'),
(NULL, 111056, '2017-05-16', 103, 111, 'm10', 'Present', '2017-05-04 17:37:40', 'tut', '4'),
(NULL, 111056, '2017-05-17', 103, 111, 'm9', 'Present', '2017-05-04 15:51:54', 'tut', '4'),
(NULL, 111056, '2017-05-17', 103, 111, 'm10', 'Present', '2017-05-04 17:39:08', 'lab', '4'),
(NULL, 111056, '2017-05-18', 103, 111, 'm9', 'Present', '2017-05-04 16:13:23', 'lab', '4'),
(NULL, 111056, '2017-05-18', 103, 111, 'm10', 'Present', '2017-05-04 17:38:44', 'tut', '4'),
(NULL, 111056, '2017-05-23', 103, 111, 'm9', 'Present', '2017-05-04 16:13:04', 'leq', '4'),
(NULL, 111056, '2017-05-24', 103, 111, 'm9', 'Present', '2017-05-04 16:16:03', 'lab', '4'),
(NULL, 111056, '2017-05-25', 103, 111, 'm10', 'Present', '2017-05-04 17:35:44', 'lab', '4'),
(NULL, 111056, '2017-05-26', 103, 111, 'm9', 'Present', '2017-05-04 16:46:42', 'lab', '4'),
(NULL, 111057, '2017-05-11', 103, 111, 'm9', 'Present', '2017-05-04 16:41:16', 'lab', '4'),
(NULL, 111057, '2017-05-16', 103, 111, 'm10', 'Present', '2017-05-04 17:37:40', 'tut', '4'),
(NULL, 111057, '2017-05-17', 103, 111, 'm9', 'Present', '2017-05-04 15:51:54', 'tut', '4'),
(NULL, 111057, '2017-05-17', 103, 111, 'm10', 'Present', '2017-05-04 17:39:08', 'lab', '4'),
(NULL, 111057, '2017-05-18', 103, 111, 'm9', 'Present', '2017-05-04 16:13:23', 'lab', '4'),
(NULL, 111057, '2017-05-18', 103, 111, 'm10', 'Present', '2017-05-04 17:38:44', 'tut', '4'),
(NULL, 111057, '2017-05-23', 103, 111, 'm9', 'Present', '2017-05-04 16:13:04', 'leq', '4'),
(NULL, 111057, '2017-05-24', 103, 111, 'm9', 'Present', '2017-05-04 16:16:03', 'lab', '4'),
(NULL, 111057, '2017-05-25', 103, 111, 'm10', 'Present', '2017-05-04 17:35:44', 'lab', '4'),
(NULL, 111057, '2017-05-26', 103, 111, 'm9', 'Present', '2017-05-04 16:46:42', 'lab', '4'),
(NULL, 111058, '2017-05-11', 103, 111, 'm9', 'Present', '2017-05-04 16:41:16', 'lab', '4'),
(NULL, 111058, '2017-05-16', 103, 111, 'm10', 'Present', '2017-05-04 17:37:40', 'tut', '4'),
(NULL, 111058, '2017-05-17', 103, 111, 'm9', 'Present', '2017-05-04 15:51:54', 'tut', '4'),
(NULL, 111058, '2017-05-17', 103, 111, 'm10', 'Present', '2017-05-04 17:39:08', 'lab', '4'),
(NULL, 111058, '2017-05-18', 103, 111, 'm9', 'Present', '2017-05-04 16:13:23', 'lab', '4'),
(NULL, 111058, '2017-05-18', 103, 111, 'm10', 'Present', '2017-05-04 17:38:44', 'tut', '4'),
(NULL, 111058, '2017-05-23', 103, 111, 'm9', 'Present', '2017-05-04 16:13:04', 'leq', '4'),
(NULL, 111058, '2017-05-24', 103, 111, 'm9', 'Present', '2017-05-04 16:16:03', 'lab', '4'),
(NULL, 111058, '2017-05-25', 103, 111, 'm9', 'Absent', '2017-05-04 16:12:54', 'leq', '4'),
(NULL, 111058, '2017-05-25', 103, 111, 'm10', 'Present', '2017-05-04 17:35:44', 'lab', '4'),
(NULL, 111058, '2017-05-26', 103, 111, 'm9', 'Present', '2017-05-04 16:46:42', 'lab', '4'),
(NULL, 111059, '2017-05-11', 103, 111, 'm9', 'Present', '2017-05-04 16:41:16', 'lab', '4'),
(NULL, 111059, '2017-05-16', 103, 111, 'm10', 'Present', '2017-05-04 17:37:40', 'tut', '4'),
(NULL, 111059, '2017-05-17', 103, 111, 'm9', 'Present', '2017-05-04 15:51:54', 'tut', '4'),
(NULL, 111059, '2017-05-17', 103, 111, 'm10', 'Present', '2017-05-04 17:39:08', 'lab', '4'),
(NULL, 111059, '2017-05-18', 103, 111, 'm9', 'Present', '2017-05-04 16:13:23', 'lab', '4'),
(NULL, 111059, '2017-05-18', 103, 111, 'm10', 'Present', '2017-05-04 17:38:44', 'tut', '4'),
(NULL, 111059, '2017-05-23', 103, 111, 'm9', 'Present', '2017-05-04 16:13:04', 'leq', '4'),
(NULL, 111059, '2017-05-24', 103, 111, 'm9', 'Present', '2017-05-04 16:16:03', 'lab', '4'),
(NULL, 111059, '2017-05-25', 103, 111, 'm10', 'Present', '2017-05-04 17:35:44', 'lab', '4'),
(NULL, 111059, '2017-05-26', 103, 111, 'm9', 'Present', '2017-05-04 16:46:42', 'lab', '4');

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
  `class_types` set('leq','lab','tut') NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `department`, `year`, `sem`, `class_types`, `teacher_id`) VALUES
(101, 'oopd', 'comp', 2017, '4', 'leq', 111),
(102, 'maths', 'comp', 2017, '4', '', 112),
(103, 'em', 'comp', 2017, '4', '', 111);

-- --------------------------------------------------------

--
-- Stand-in structure for view `login`
-- (See below for the actual view)
--
CREATE TABLE `login` (
`id` int(11)
,`pass` varchar(40)
,`account_type` varchar(7)
);

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
  `batch` char(1) NOT NULL,
  `department` enum('comp','etc','it','mining','ene','mech','civil') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`roll`, `first_name`, `last_name`, `sem`, `dob`, `gender`, `batch_of`, `email`, `phone`, `batch`, `department`) VALUES
(111051, 'shivam', 'kurtarkar', '4', '1997-04-24', 'Male', 2015, 'asf@gmail.com', 123456789, 'b', 'comp'),
(111052, 'Anoop', 'Kinlekar', '4', '2017-04-27', 'Male', 2015, NULL, NULL, 'a', 'comp'),
(111053, 'Anand', 'kandalekar', '4', '2017-04-08', 'Male', 2015, NULL, NULL, 'b', 'comp'),
(111054, 'rushikesh', 'prabhudessai', '4', '2017-03-02', 'Male', 2015, NULL, NULL, 'd', 'comp'),
(111055, 'raksha', 'maushi', '4', '2017-04-05', 'Female', 2015, NULL, NULL, 'd', 'comp'),
(111056, 'nikita', 'salkar', '4', '2017-04-02', 'Female', 2015, NULL, NULL, 'c', 'comp'),
(111057, 'rajiv', 'puranik', '4', '2016-04-09', 'Male', 2015, NULL, NULL, 'd', 'comp'),
(111058, 'shivani', 'kulkarni', '4', '2016-04-01', 'Female', 2015, NULL, NULL, 'a', 'comp'),
(111059, 'shivani', 'nadkarni', '4', '2017-04-05', 'Female', 2015, NULL, NULL, 'c', 'comp');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `email` varchar(70) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `department` enum('comp','etc','it','mining','ene','mech','civil') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `first_name`, `last_name`, `dob`, `gender`, `email`, `phone`, `department`) VALUES
(111, 'kavita', 'patel', '2017-04-10', 'Female', NULL, NULL, 'comp'),
(112, 'amit', 'jain', '2017-04-30', 'Male', NULL, NULL, 'comp');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_course`
--

CREATE TABLE `teacher_course` (
  `teacher_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `sem` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `batch` set('a','b','c','d') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_course`
--

INSERT INTO `teacher_course` (`teacher_id`, `course_id`, `year`, `sem`, `batch`) VALUES
(111, 103, 2017, '4', 'a,b,c,d'),
(112, 102, 2017, '4', 'a,b,c,d');

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
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`course_id`, `teacher_id`, `periodcode`, `year`, `sem`, `day`, `department`) VALUES
(102, 112, 'm9', 2017, '4', 'mon', 'comp'),
(103, 111, 'm10', 2017, '4', 'mon', 'comp'),
(103, 111, 'm11', 2017, '4', 'mon', 'comp');

-- --------------------------------------------------------

--
-- Structure for view `login`
--
DROP TABLE IF EXISTS `login`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `login`  AS  select `student`.`roll` AS `id`,`student`.`first_name` AS `pass`,'student' AS `account_type` from `student` union select `teacher`.`id` AS `id`,`teacher`.`first_name` AS `pass`,'teacher' AS `account_type` from `teacher` union select `admin`.`id` AS `id`,`admin`.`name` AS `pass`,'admin' AS `account_type` from `admin` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendence_table`
--
ALTER TABLE `attendence_table`
  ADD PRIMARY KEY (`roll`,`date`,`periodcode`);

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

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`periodcode`,`year`,`day`,`department`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
