-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 03:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsasdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `civilservice`
--

CREATE TABLE `civilservice` (
  `cs_id` int(11) NOT NULL,
  `career_service` varchar(50) NOT NULL,
  `ra1080` varchar(50) NOT NULL,
  `usl` varchar(50) NOT NULL,
  `ces` varchar(50) NOT NULL,
  `csee` varchar(50) NOT NULL,
  `brgy_eli` varchar(50) NOT NULL,
  `driver_lisc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `educback`
--

CREATE TABLE `educback` (
  `educback_id` int(11) NOT NULL,
  `name of school` varchar(30) NOT NULL,
  `level` varchar(15) NOT NULL,
  `period` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sched`
--

CREATE TABLE `sched` (
  `sched_id` int(10) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `section` varchar(20) NOT NULL,
  `daysched` varchar(10) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `year` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `Teacher` int(255) NOT NULL,
  `schedNo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sched`
--

INSERT INTO `sched` (`sched_id`, `subject`, `section`, `daysched`, `sem`, `year`, `department`, `start_time`, `end_time`, `Teacher`, `schedNo`) VALUES
(12, 'Accounting Principles', 'A', 'Monday', '1st Semest', '1st Year', 'IT', '07:00:00', '08:00:00', 1, 1),
(14, 'Accounting Principles', 'A', 'Tuesday', '1st Semest', '1st Year', 'IT', '10:00:00', '12:00:00', 1, 2),
(15, 'Accounting Principles', 'A', 'Monday', '1st Semest', '1st Year', 'IT', '11:00:00', '16:29:00', 4, 1),
(16, 'Accounting Principles', 'C', 'Monday', '1st Semest', '3rd Year', 'Educ', '07:30:00', '10:30:00', 2, 1),
(17, 'Accounting Principles', 'A', 'Friday', '1st Semest', '1st Year', 'IT', '06:43:00', '18:43:00', 3, 1),
(18, 'Accounting Principles', 'A', 'Thursday', '1st Semest', '1st Year', 'IT', '06:46:00', '09:30:00', 3, 2),
(19, 'Accounting Principles', 'A', 'Wednesday', '1st Semest', '1st Year', 'IT', '08:27:00', '14:00:00', 2, 1),
(20, 'Accounting Principles', 'A', 'Wednesday', '1st Semest', '1st Year', 'IT', '14:28:00', '19:28:00', 1, 3),
(21, 'Accounting Principles', 'A', 'Monday', '1st Semest', '1st Year', 'IT', '11:03:00', '12:05:00', 2, 3),
(22, 'Accounting Principles', 'A', 'Monday', '1st Semest', '1st Year', 'IT', '11:03:00', '12:05:00', 2, 4),
(23, 'Accounting Principles', 'A', 'Monday', '1st Semest', '1st Year', 'IT', '08:24:00', '10:26:00', 1, 4),
(24, 'Accounting Principles', 'A', 'Monday', '1st Semest', '1st Year', 'IT', '08:24:00', '10:26:00', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(20) DEFAULT NULL,
  `UserName` varchar(20) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `OTP` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `OTP`) VALUES
(2, 'admin lala', 'admin', 224343433, 'visayaanne@gmail.com', '1234', 363472),
(3, 'admin lala', 'admin', 224343433, 'visayaanne@gmail.com', '123', 363472);

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `ID` int(10) NOT NULL,
  `BranchName` varchar(30) DEFAULT NULL,
  `CourseName` varchar(10) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`ID`, `BranchName`, `CourseName`, `CreationDate`) VALUES
(1, 'Information Technology', 'BSIT', '2024-06-04 22:15:55'),
(10, 'Enteprenuership', 'BSENT', '2024-06-04 21:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbllevel`
--

CREATE TABLE `tbllevel` (
  `levelID` int(11) NOT NULL,
  `level_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbllevel`
--

INSERT INTO `tbllevel` (`levelID`, `level_name`) VALUES
(1, '1st Year'),
(2, '2nd Year'),
(3, '3rd Year'),
(4, '4th Year');

-- --------------------------------------------------------

--
-- Table structure for table `tblsem`
--

CREATE TABLE `tblsem` (
  `sem_ID` int(11) NOT NULL,
  `semname` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsem`
--

INSERT INTO `tblsem` (`sem_ID`, `semname`) VALUES
(1, '1st Semester'),
(2, '2nd Semester');

-- --------------------------------------------------------

--
-- Table structure for table `tblsuballocation`
--

CREATE TABLE `tblsuballocation` (
  `ID` int(5) NOT NULL,
  `CourseID` int(5) DEFAULT NULL,
  `Teacherempid` varchar(100) DEFAULT NULL,
  `Subid` int(5) DEFAULT NULL,
  `AllocationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsuballocation`
--

INSERT INTO `tblsuballocation` (`ID`, `CourseID`, `Teacherempid`, `Subid`, `AllocationDate`) VALUES
(1, 1, 'EMP12345', 3, '2023-05-24 06:02:24'),
(2, 2, 'Emp102', 2, '2023-05-24 06:02:50'),
(3, 2, 'Emp102', 8, '2023-05-24 06:03:05'),
(4, 1, 'Emp101', 3, '2023-05-24 06:03:49'),
(5, 3, 'Emp103', 5, '2023-05-24 06:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE `tblsubject` (
  `ID` int(5) NOT NULL,
  `sem_ID` int(11) NOT NULL,
  `levelID` int(11) NOT NULL,
  `course_code` varchar(10) DEFAULT NULL,
  `course_title` varchar(40) DEFAULT NULL,
  `Lec` float DEFAULT NULL,
  `Lab` float NOT NULL,
  `unit` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`ID`, `sem_ID`, `levelID`, `course_code`, `course_title`, `Lec`, `Lab`, `unit`) VALUES
(1, 1, 1, 'ACCO 20213', 'Accounting Principles', 3, 3, 3),
(2, 1, 1, 'COMP 20023', 'Operating System', 4, 0, 4),
(3, 1, 0, 'NSTP 10013', 'CWTS/ROTC', 0, 0, 3),
(4, 1, 0, 'GEED 10103', 'Filipinolohiya at Pambansang Kaunlaran', 0, 0, 4),
(5, 1, 0, 'MATH 05BC', 'General Calculus', 0, 4, 3),
(6, 1, 0, 'COMP 20013', 'Introduction to Computing', 0, 0, 0),
(7, 0, 0, 'GEED 10053', 'Mathematics in the Modern World', 0, 0, 0),
(8, 0, 0, 'PHED 01', 'Physical Education 1', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblteacher`
--

CREATE TABLE `tblteacher` (
  `ID` int(10) NOT NULL,
  `EmpID` varchar(50) DEFAULT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Gender` varchar(200) DEFAULT NULL,
  `Dob` varchar(200) DEFAULT NULL,
  `CourseID` int(5) DEFAULT NULL,
  `Religion` varchar(200) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `ProfilePic` varchar(200) DEFAULT NULL,
  `JoiningDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblteacher`
--

INSERT INTO `tblteacher` (`ID`, `EmpID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Gender`, `Dob`, `CourseID`, `Religion`, `Address`, `Password`, `ProfilePic`, `JoiningDate`) VALUES
(1, 'Emp101', 'Test', 'Sample', 8956231478, 'kaushal@gmail.com', 'Male', '1984-01-05', 1, 'Hindu', 'J-125, Mohan Road Jakirpur Merrut', '202cb962ac59075b964b07152d234b70', '1335bbfed45ae23153ca58b93aa4f8801725295514.jpg', '2024-09-02 16:45:14'),
(2, 'Emp102', 'Sarita', 'Pandey', 4564877987, 'sar@gmail.com', 'Female', '1990-01-09', 2, 'Hindu', 'K-980', '202cb962ac59075b964b07152d234b70', 'e76de47f621d84adbab3266e3239baee1594385101.png', '2023-05-13 05:22:14'),
(3, 'Emp103', 'Test', 'Sample', 6544654654, 'test@gmail.com', 'Male', '1990-07-05', 3, 'Hindu', 'B-234 Nehru Nagar New Delhi', '202cb962ac59075b964b07152d234b70', '779b7513263ef185b6d094af290ef5401595247971.png', '2023-05-20 12:26:11'),
(4, 'EMP12345', 'Anuj', 'Kumar', 1234567890, 'ak@gmail.com', 'Male', '2019-04-02', 1, 'Indian', 'New Delhi India 110101', 'f925916e2754e5e03f75dd58a5733251', '497549c31ec120a18878ca5b2a69d5481718355404.jpg', '2024-06-14 08:56:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `civilservice`
--
ALTER TABLE `civilservice`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `educback`
--
ALTER TABLE `educback`
  ADD PRIMARY KEY (`educback_id`);

--
-- Indexes for table `sched`
--
ALTER TABLE `sched`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbllevel`
--
ALTER TABLE `tbllevel`
  ADD PRIMARY KEY (`levelID`);

--
-- Indexes for table `tblsem`
--
ALTER TABLE `tblsem`
  ADD PRIMARY KEY (`sem_ID`);

--
-- Indexes for table `tblsuballocation`
--
ALTER TABLE `tblsuballocation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblteacher`
--
ALTER TABLE `tblteacher`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `civilservice`
--
ALTER TABLE `civilservice`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `educback`
--
ALTER TABLE `educback`
  MODIFY `educback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sched`
--
ALTER TABLE `sched`
  MODIFY `sched_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbllevel`
--
ALTER TABLE `tbllevel`
  MODIFY `levelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblsem`
--
ALTER TABLE `tblsem`
  MODIFY `sem_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblsuballocation`
--
ALTER TABLE `tblsuballocation`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblsubject`
--
ALTER TABLE `tblsubject`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblteacher`
--
ALTER TABLE `tblteacher`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
