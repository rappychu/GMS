-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2023 at 12:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `crs_id` int(11) NOT NULL,
  `crs_name` varchar(50) NOT NULL,
  `crs_code` varchar(50) NOT NULL,
  `crs_description` varchar(200) NOT NULL,
  `prog_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`crs_id`, `crs_name`, `crs_code`, `crs_description`, `prog_name`) VALUES
(8, 'Discrete Mathematics', 'MS121', '', 'Bachelor of Science in Information Technology'),
(9, 'Information Management', 'IT211', '', 'Bachelor of Science in Information Technology'),
(10, 'Web System and Development', 'ITELEC 2', '', 'Bachelor of Science in Information Technology'),
(11, 'Object Oriented Programming', 'ITELEC 3', '', 'Bachelor of Science in Information Technology'),
(13, 'Physical Education', 'PE3 PATH FIT3', '', 'Bachelor of Science in Information Technology'),
(14, 'The Contemporary World', 'SS113', '', 'Bachelor of Science in Information Technology'),
(15, 'People and Earth Ecosystem', 'GELECT1', '', 'Bachelor of Science in Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dep_code` int(11) NOT NULL,
  `dep_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_code`, `dep_name`) VALUES
(1, 'Institute of Computing');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_fname` varchar(50) NOT NULL,
  `faculty_lname` varchar(50) NOT NULL,
  `faculty_mname` varchar(50) NOT NULL,
  `faculty_username` varchar(50) NOT NULL,
  `faculty_password` varchar(50) NOT NULL,
  `dep_name` varchar(60) NOT NULL,
  `prog_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_fname`, `faculty_lname`, `faculty_mname`, `faculty_username`, `faculty_password`, `dep_name`, `prog_name`) VALUES
(2, 'Jovanne', 'Alejandrino', '', 'jovanne', 'jovanne123', 'Institute of Computing', 'Bachelor of Science in Information Technology'),
(3, 'Cristopher', 'Anana', '', 'cristopher', 'cris123', 'Institute of Computing', 'Bachelor of Science in Information Technology'),
(4, 'Mercedita', 'Floro', '', 'mercedita', '123', 'Institute of Computing', 'Bachelor of Science in Information Technology'),
(5, 'April', 'Lalicon', '', 'april', '123', 'Institute of Computing', 'Bachelor of Science in Information Technology'),
(6, 'Mary Nova', 'Verano', '', 'mary', '123', 'Institute of Computing', 'Bachelor of Science in Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `final_term`
--

CREATE TABLE `final_term` (
  `fnl_id` int(11) NOT NULL,
  `fnl_written` float NOT NULL,
  `fnl_ptask` float NOT NULL,
  `fnl_grade` float NOT NULL,
  `fnl_exam` float NOT NULL,
  `fnl_equiv` float NOT NULL,
  `fnl_stat` varchar(20) NOT NULL,
  `stud_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `midterm`
--

CREATE TABLE `midterm` (
  `mid_id` int(11) NOT NULL,
  `mid_written` float NOT NULL,
  `mid_ptask` float NOT NULL,
  `mid_exam` float NOT NULL,
  `mid_grade` float NOT NULL,
  `mid_equiv` float NOT NULL,
  `mid_stat` varchar(50) NOT NULL,
  `stud_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `midterm`
--

INSERT INTO `midterm` (`mid_id`, `mid_written`, `mid_ptask`, `mid_exam`, `mid_grade`, `mid_equiv`, `mid_stat`, `stud_id`) VALUES
(2, 90, 99, 89, 92.2, 1.5, 'Passed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `prog_code` int(11) NOT NULL,
  `prog_name` varchar(50) NOT NULL,
  `dep_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`prog_code`, `prog_name`, `dep_name`) VALUES
(7, 'Bachelor of Science in Information Technology', 'Institute of Computing'),
(8, 'Bachelor of Science in Information System', 'Institute of Computing');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sec_num` int(11) NOT NULL,
  `sec_name` varchar(50) NOT NULL,
  `crs_name` varchar(50) NOT NULL,
  `sem_year` varchar(20) NOT NULL,
  `sem_term` varchar(20) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sec_num`, `sec_name`, `crs_name`, `sem_year`, `sem_term`, `faculty_id`, `stud_id`) VALUES
(12, 'A', 'Discrete Mathematics', '2023-2024', 'First Term', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `semgrade`
--

CREATE TABLE `semgrade` (
  `stud_id` float NOT NULL,
  `mid_grade` float NOT NULL,
  `fnl_grade` float NOT NULL,
  `sem_grade` float NOT NULL,
  `grade_equiv` float NOT NULL,
  `grade_stat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semgrade`
--

INSERT INTO `semgrade` (`stud_id`, `mid_grade`, `fnl_grade`, `sem_grade`, `grade_equiv`, `grade_stat`) VALUES
(5, 86.7, 90.8, 89.2, 1.75, 'Passed'),
(1, 92.2, 78.8, 84.2, 2.25, 'Passed');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` int(11) NOT NULL,
  `stud_fname` varchar(50) NOT NULL,
  `stud_lname` varchar(50) NOT NULL,
  `stud_mname` varchar(50) NOT NULL,
  `stud_username` varchar(50) NOT NULL,
  `stud_password` varchar(50) NOT NULL,
  `dep_name` varchar(30) NOT NULL,
  `prog_name` varchar(60) NOT NULL,
  `sec_name` varchar(50) NOT NULL,
  `mid_equiv` float NOT NULL,
  `fnl_equiv` float NOT NULL,
  `sem_grade` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `stud_fname`, `stud_lname`, `stud_mname`, `stud_username`, `stud_password`, `dep_name`, `prog_name`, `sec_name`, `mid_equiv`, `fnl_equiv`, `sem_grade`) VALUES
(1, 'Mikaela', 'Agang', '', 'psjkei', 'thisiskei', 'Institute of Computing', 'Bachelor of Science in Information Technology', 'A', 1.5, 2.75, 2.25),
(2, 'Mae Pauline', 'Alibo', '', 'paupew', 'pau12', 'Institute of Computing', 'Bachelor of Science in Information Technology', '', 0, 0, 0),
(3, 'Realyn', 'Guille', 'Langitan', 'realyn', 'lynchu', 'Institute of Computing', 'Bachelor of Science in Information Technology', '', 0, 0, 0),
(4, 'Ralph', 'Montajes', 'Abing', 'ppychu', 'ralph', 'Institute of Computing', 'Bachelor of Science in Information Technology', '', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`crs_id`) USING BTREE,
  ADD KEY `prog_name` (`prog_name`) USING BTREE,
  ADD KEY `crs_code` (`crs_code`),
  ADD KEY `crs_name` (`crs_name`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_code`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD UNIQUE KEY `faculty_username` (`faculty_username`),
  ADD KEY `dep_name` (`dep_name`),
  ADD KEY `prog_name` (`prog_name`),
  ADD KEY `faculty_lname` (`faculty_lname`);

--
-- Indexes for table `final_term`
--
ALTER TABLE `final_term`
  ADD PRIMARY KEY (`fnl_id`),
  ADD KEY `stud_id` (`stud_id`),
  ADD KEY `fnl_grade` (`fnl_grade`),
  ADD KEY `fnl_equiv` (`fnl_equiv`);

--
-- Indexes for table `midterm`
--
ALTER TABLE `midterm`
  ADD PRIMARY KEY (`mid_id`),
  ADD KEY `mid_grade` (`mid_grade`),
  ADD KEY `mid_equiv` (`mid_equiv`),
  ADD KEY `stud_id` (`stud_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`prog_code`),
  ADD KEY `dep_name` (`dep_name`) USING BTREE;

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sec_num`),
  ADD KEY `crs_name` (`crs_name`),
  ADD KEY `faculty_id` (`faculty_id`) USING BTREE,
  ADD KEY `stud_id` (`stud_id`),
  ADD KEY `sec_name` (`sec_name`),
  ADD KEY `sem_id` (`sem_year`) USING BTREE;

--
-- Indexes for table `semgrade`
--
ALTER TABLE `semgrade`
  ADD KEY `mid_grade` (`mid_grade`),
  ADD KEY `fnl_grade` (`fnl_grade`),
  ADD KEY `stud_id` (`stud_id`) USING BTREE;

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`),
  ADD KEY `mid_id` (`mid_equiv`),
  ADD KEY `dep_name` (`dep_name`) USING BTREE,
  ADD KEY `prog_name` (`prog_name`),
  ADD KEY `mid_equiv` (`mid_equiv`),
  ADD KEY `fnl_equiv` (`fnl_equiv`),
  ADD KEY `sec_name` (`sec_name`) USING BTREE,
  ADD KEY `sem_grade` (`sem_grade`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `crs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dep_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `final_term`
--
ALTER TABLE `final_term`
  MODIFY `fnl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `midterm`
--
ALTER TABLE `midterm`
  MODIFY `mid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `prog_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sec_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `semgrade`
--
ALTER TABLE `semgrade`
  MODIFY `stud_id` float NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
