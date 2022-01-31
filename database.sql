-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 05:41 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin'),
('swathika','swathi'),
('krithiika','krithi');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`) VALUES
(2, 'mobile app development'),
(6, 'Numerical Analysis'),
(7, 'Object Oriented Programming'),
(8, 'operating system'),
(9, 'theory of automata'),
(10, 'Web Programming');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `assessment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table 'quiz`
--

INSERT INTO `quiz` (`id`, `assessment`) VALUES
(2, 'Assignment 1'),
(3, 'Assignment 2'),
(4, 'Assignment 3'),
(5, 'Assignment 4');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `f_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `name`, `designation`, `password`) VALUES
(111, 'Neha', 'Lecturer', 'neha'),
(112, 'Xyz', 'Lecturer', 'xyz'),
(113, 'Sham', 'Lecturer', 'sham');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_course`
--

CREATE TABLE `faculty_course` (
  `id` int(11) NOT NULL,
  `course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_course`
--

INSERT INTO `faculty_course` (`id`, `course`) VALUES
(111, ' theory of automata'),
(112, 'Web Programming');

-- --------------------------------------------------------



-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `fname`, `lname`, `password`, `contact`, `dob`) VALUES
('1001', 'Chaithra', 'p', 'chai', '9090898787', '2021-07-06'),
('100','abc','de','ab','1234323233','2021-09-01'),
('1002', 'Aishwarya', 'k', 'aish', '8787659809', '2021-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `sid` varchar(200) NOT NULL,
  `course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`sid`, `course`) VALUES
('8623', ' Object Oriented Programming'),
('8649', ' mobile app development'),
('8649', ' Object Oriented Programming'),
('8649', 'Web Programming');

-- --------------------------------------------------------

--
-- Table structure for table `student_result`
--

CREATE TABLE `student_result` (
  `sid` varchar(50) NOT NULL,
  `assessment` varchar(200) NOT NULL,
  `course` varchar(100) NOT NULL,
  `totalmarks` varchar(200) NOT NULL,
  `gainmarks` varchar(200) NOT NULL,
  `percentage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_result`
--

INSERT INTO `student_result` (`sid`, `assessment`, `course`, `totalmarks`, `gainmarks`, `percentage`) VALUES
('100', 'Assignment 1', 'Object Oriented Programming', '20', '15', '75');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `faculty_course`
--
ALTER TABLE `faculty_course`
  ADD KEY `id` (`id`);



--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD KEY `sid` (`sid`);


--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


--
-- Constraints for dumped tables
--

--
-- Constraints for table `faculty_course`
--
ALTER TABLE `faculty_course`
  ADD CONSTRAINT `faculty_course_ibfk_1` FOREIGN KEY (`id`) REFERENCES `faculty` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE;

