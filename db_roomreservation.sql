-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 15, 2021 at 12:44 PM
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
-- Table structure for table `tbl_catergory`
--

DROP TABLE IF EXISTS `tbl_catergory`;
CREATE TABLE IF NOT EXISTS `tbl_catergory` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(50) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_catergory`
--

INSERT INTO `tbl_catergory` (`CategoryID`, `Description`) VALUES
(1, 'Table Tennis'),
(2, 'Basketball'),
(3, 'VolleyBall'),
(4, 'School Items');

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
-- Table structure for table `tbl_equipment`
--

DROP TABLE IF EXISTS `tbl_equipment`;
CREATE TABLE IF NOT EXISTS `tbl_equipment` (
  `EquipmentID` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(50) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  PRIMARY KEY (`EquipmentID`),
  KEY `CategoryID` (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_equipment`
--

INSERT INTO `tbl_equipment` (`EquipmentID`, `Description`, `CategoryID`) VALUES
(1, 'Table', 1),
(2, 'PingpongBall', 1),
(3, 'Basketball', 2),
(4, 'VolleyBall', 3),
(5, 'Net', 1),
(6, 'Net', 3),
(7, 'Projector', 4),
(8, 'Extension', 4),
(9, 'Electric Fan', 1),
(10, 'Speaker', 4);

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
('2017-00001-BN-F', 'zxc@gmail.com', 'Kindred', 'Page', 'Lopez', '1988-06-08', 'qwert');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

DROP TABLE IF EXISTS `tbl_reservation`;
CREATE TABLE IF NOT EXISTS `tbl_reservation` (
  `ReservationID` int(10) NOT NULL AUTO_INCREMENT,
  `RoomID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `EquipmentID` int(11) DEFAULT NULL,
  `FacultyID` varchar(20) NOT NULL,
  `StudentID` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Date` date NOT NULL,
  `TimeIn` time NOT NULL,
  `TimeOut` time NOT NULL,
  `SubjectID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CourseID` varchar(10) NOT NULL,
  `YearID` varchar(10) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `DateofApproval` date DEFAULT NULL,
  PRIMARY KEY (`ReservationID`),
  KEY `SubjectID` (`SubjectID`),
  KEY `RoomID` (`RoomID`),
  KEY `CourseID` (`CourseID`),
  KEY `RoomID_2` (`RoomID`),
  KEY `FacultyID` (`FacultyID`),
  KEY `YearID` (`YearID`),
  KEY `StatusID` (`StatusID`),
  KEY `EquipmentID` (`EquipmentID`),
  KEY `StudentID` (`StudentID`)
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`ReservationID`, `RoomID`, `EquipmentID`, `FacultyID`, `StudentID`, `Date`, `TimeIn`, `TimeOut`, `SubjectID`, `CourseID`, `YearID`, `StatusID`, `DateofApproval`) VALUES
(193, 'RMAVR', NULL, '2017-00001-BN-F', '2018-00111-BN-0', '2021-02-14', '10:37:00', '10:40:00', 'INTE004', 'CIDOO1', 'YR001', 2, NULL),
(194, 'RMAVR', NULL, '2017-00001-BN-F', '2018-00111-BN-0', '2021-02-14', '07:42:00', '10:38:00', 'INTE004', 'CIDOO1', 'YR001', 1, NULL),
(195, NULL, 1, '2017-00001-BN-F', '2018-00111-BN-0', '2021-02-14', '08:42:00', '10:42:00', NULL, 'CIDOO1', 'YR001', 2, NULL),
(196, NULL, 1, '2017-00001-BN-F', '2018-00111-BN-0', '2021-02-15', '20:42:00', '20:46:00', NULL, 'CIDOO1', 'YR001', 2, NULL),
(197, 'RMAVR', NULL, '2017-00001-BN-F', '2018-00111-BN-0', '2021-02-15', '20:42:00', '21:00:00', 'INTE004', 'CIDOO1', 'YR001', 2, NULL);

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
('RMAVR', 'AVR'),
('RMChemistr', 'Chemistry '),
('RMCOMPLAB1', 'COMP LAB1'),
('RMCOMPLAB2', 'COMP LAB2'),
('RMDRAFTING', 'Drafting R');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

DROP TABLE IF EXISTS `tbl_status`;
CREATE TABLE IF NOT EXISTS `tbl_status` (
  `StatusID` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(50) NOT NULL,
  PRIMARY KEY (`StatusID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`StatusID`, `Description`) VALUES
(1, 'APPROVED'),
(2, 'IN PROGRESS'),
(3, 'DISAPPROVED');

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

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`StudentID`, `EmailAddress`, `FirstName`, `MiddleName`, `LastName`, `CourseID`, `YearID`, `Birthday`, `Password`) VALUES
('2018-00111-BN-0', 'sdfsd', 'Gerald', 'Lerio', 'Orzal', 'CIDOO1', 'YR001', '2021-02-04', 'qwert');

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
-- Constraints for table `tbl_equipment`
--
ALTER TABLE `tbl_equipment`
  ADD CONSTRAINT `tbl_equipment_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `tbl_catergory` (`CategoryID`);

--
-- Constraints for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD CONSTRAINT `tbl_reservation_ibfk_1` FOREIGN KEY (`RoomID`) REFERENCES `tbl_room` (`RoomID`),
  ADD CONSTRAINT `tbl_reservation_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `tbl_course` (`CourseID`),
  ADD CONSTRAINT `tbl_reservation_ibfk_3` FOREIGN KEY (`SubjectID`) REFERENCES `tbl_subject` (`SubjectID`),
  ADD CONSTRAINT `tbl_reservation_ibfk_4` FOREIGN KEY (`FacultyID`) REFERENCES `tbl_faculty` (`FacultyID`),
  ADD CONSTRAINT `tbl_reservation_ibfk_5` FOREIGN KEY (`YearID`) REFERENCES `tbl_year` (`YearID`),
  ADD CONSTRAINT `tbl_reservation_ibfk_6` FOREIGN KEY (`StatusID`) REFERENCES `tbl_status` (`StatusID`),
  ADD CONSTRAINT `tbl_reservation_ibfk_7` FOREIGN KEY (`EquipmentID`) REFERENCES `tbl_equipment` (`EquipmentID`),
  ADD CONSTRAINT `tbl_reservation_ibfk_8` FOREIGN KEY (`StudentID`) REFERENCES `tbl_student` (`StudentID`);

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
