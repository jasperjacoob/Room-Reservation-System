-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 04, 2021 at 01:16 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_roomreservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

DROP TABLE IF EXISTS `tbl_course`;
CREATE TABLE IF NOT EXISTS `tbl_course` (
  `CourseID` varchar(10) NOT NULL,
  `Description` varchar(20) NOT NULL,
  PRIMARY KEY (`CourseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`CourseID`, `Description`) VALUES
('CIDOO1', 'BSIT'),
('CIDOO2', 'BSED'),
('CIDOO3', 'BSIE'),
('CIDOO4', 'BSCE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

DROP TABLE IF EXISTS `tbl_faculty`;
CREATE TABLE IF NOT EXISTS `tbl_faculty` (
  `FacultyID` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `EmailAddress` varchar(30) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `MiddleName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Birthday` date NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`FacultyID`),
  UNIQUE KEY `EmailAddress` (`EmailAddress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`FacultyID`, `EmailAddress`, `FirstName`, `MiddleName`, `LastName`, `Birthday`, `Password`) VALUES
('F-0001-BN-1', 'uninanymousprof@gmail.com', 'I', 'aint', 'tisoy', '1988-05-03', '123456'),
('F-0002-BN-1', 'uninanymousprof1@gmail.com', 'I', 'am', 'pinoy', '1988-05-10', '123456'),
('F-0003-BN-1', 'uninanymousprof2@gmail.com', 'ss', 'aint', 'tisoy', '1988-05-12', '123456'),
('F-0004-BN-1', 'uninanymousprof3@gmail.com', 'I', 'aint', 'tisoy', '1988-05-16', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

DROP TABLE IF EXISTS `tbl_reservation`;
CREATE TABLE IF NOT EXISTS `tbl_reservation` (
  `ReservationID` int(10) NOT NULL AUTO_INCREMENT,
  `RoomID` varchar(10) NOT NULL,
  `FacultyID` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `TimeIn` time NOT NULL,
  `TimeOut` time NOT NULL,
  `SubjectID` varchar(10) NOT NULL,
  `CourseID` varchar(10) NOT NULL,
  `YearID` varchar(10) NOT NULL,
  PRIMARY KEY (`ReservationID`),
  KEY `SubjectID` (`SubjectID`),
  KEY `RoomID` (`RoomID`),
  KEY `CourseID` (`CourseID`),
  KEY `RoomID_2` (`RoomID`),
  KEY `FacultyID` (`FacultyID`),
  KEY `YearID` (`YearID`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`ReservationID`, `RoomID`, `FacultyID`, `Date`, `TimeIn`, `TimeOut`, `SubjectID`, `CourseID`, `YearID`) VALUES
(118, 'RM001', 'F-0003-BN-1', '2021-02-04', '09:14:00', '10:59:00', 'INTE004', 'CIDOO1', 'YR003'),
(119, 'RM001', 'F-0001-BN-1', '2021-02-04', '11:07:00', '01:54:00', 'INTE004', 'CIDOO1', 'YR001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

DROP TABLE IF EXISTS `tbl_room`;
CREATE TABLE IF NOT EXISTS `tbl_room` (
  `RoomID` varchar(10) NOT NULL,
  `Description` varchar(10) NOT NULL,
  PRIMARY KEY (`RoomID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`RoomID`, `Description`) VALUES
('RM001', '504'),
('RM002', '503'),
('RM003', '502'),
('RM004', '501'),
('RM005', '404'),
('RM006', '403'),
('RM007', '402'),
('RM008', '401'),
('RM009', '304'),
('RM010', '303'),
('RM011', '302'),
('RM012', '301'),
('RM013', '204'),
('RM014', '203'),
('RM015', '202'),
('RM016', '201');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

DROP TABLE IF EXISTS `tbl_student`;
CREATE TABLE IF NOT EXISTS `tbl_student` (
  `StudentID` varchar(20) NOT NULL,
  `EmailAddress` varchar(30) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `MiddleName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `CourseID` varchar(10) NOT NULL,
  `YearID` varchar(10) NOT NULL,
  `Birthday` date NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`StudentID`),
  UNIQUE KEY `EmailAddress` (`EmailAddress`),
  KEY `CourseID` (`CourseID`),
  KEY `YearID` (`YearID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

DROP TABLE IF EXISTS `tbl_subject`;
CREATE TABLE IF NOT EXISTS `tbl_subject` (
  `SubjectID` varchar(10) NOT NULL,
  `Description` varchar(20) NOT NULL,
  PRIMARY KEY (`SubjectID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`SubjectID`, `Description`) VALUES
('INTE004', 'ORALCOM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year`
--

DROP TABLE IF EXISTS `tbl_year`;
CREATE TABLE IF NOT EXISTS `tbl_year` (
  `YearID` varchar(10) NOT NULL,
  `Description` int(11) NOT NULL,
  PRIMARY KEY (`YearID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_year`
--

INSERT INTO `tbl_year` (`YearID`, `Description`) VALUES
('YR001', 1),
('YR002', 2),
('YR003', 3),
('YR004', 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD CONSTRAINT `tbl_reservation_ibfk_1` FOREIGN KEY (`RoomID`) REFERENCES `tbl_room` (`RoomID`),
  ADD CONSTRAINT `tbl_reservation_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `tbl_course` (`CourseID`),
  ADD CONSTRAINT `tbl_reservation_ibfk_3` FOREIGN KEY (`SubjectID`) REFERENCES `tbl_subject` (`SubjectID`),
  ADD CONSTRAINT `tbl_reservation_ibfk_4` FOREIGN KEY (`FacultyID`) REFERENCES `tbl_faculty` (`FacultyID`),
  ADD CONSTRAINT `tbl_reservation_ibfk_5` FOREIGN KEY (`YearID`) REFERENCES `tbl_year` (`YearID`);

--
-- Constraints for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `tbl_student_ibfk_1` FOREIGN KEY (`YearID`) REFERENCES `tbl_year` (`YearID`),
  ADD CONSTRAINT `tbl_student_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `tbl_course` (`CourseID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
