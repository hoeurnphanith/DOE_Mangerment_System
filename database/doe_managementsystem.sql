-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 14, 2024 at 12:48 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doe_managementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `end_test_result`
--

DROP TABLE IF EXISTS `end_test_result`;
CREATE TABLE IF NOT EXISTS `end_test_result` (
  `result_sem_ID` int(11) NOT NULL AUTO_INCREMENT,
  `School_ID` int(50) NOT NULL,
  `child_ID` int(11) DEFAULT NULL,
  `Classroom_ID` int(11) DEFAULT NULL,
  `Result_Pass` int(11) DEFAULT NULL,
  `Result_Pass_F` int(11) DEFAULT NULL,
  `Result_Failed` int(11) DEFAULT NULL,
  `Result_Failed_F` int(11) DEFAULT NULL,
  `Result_poor` int(11) DEFAULT NULL,
  `Result_poor_F` int(11) DEFAULT NULL,
  `None_Result` int(11) DEFAULT NULL,
  `None_Result_F` int(11) DEFAULT NULL,
  `CatResult_ID` int(11) DEFAULT NULL,
  `Year_Study` year(4) DEFAULT NULL,
  PRIMARY KEY (`result_sem_ID`),
  KEY `School_ID` (`School_ID`,`child_ID`,`Classroom_ID`,`CatResult_ID`),
  KEY `CatResult_ID` (`CatResult_ID`),
  KEY `Classroom_ID` (`Classroom_ID`),
  KEY `child_ID` (`child_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `name`) VALUES
(33, '2023-2024');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attandance`
--

DROP TABLE IF EXISTS `tbl_attandance`;
CREATE TABLE IF NOT EXISTS `tbl_attandance` (
  `Attandance_ID` int(11) NOT NULL AUTO_INCREMENT,
  `School_ID` int(100) NOT NULL,
  `Teacher_ID` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Event_Time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Attendent` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_work` time(6) DEFAULT NULL,
  `End_work` time(6) DEFAULT NULL,
  `Referent` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`Attandance_ID`),
  KEY `School_ID` (`Teacher_ID`),
  KEY `School_ID_2` (`School_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_attandance`
--

INSERT INTO `tbl_attandance` (`Attandance_ID`, `School_ID`, `Teacher_ID`, `Event_Time`, `Attendent`, `start_work`, `End_work`, `Referent`, `date`) VALUES
(32, 2110407012, '123', 'áž–áŸ’ážšáž¹áž€', 'áž¢ážœážáŸ’ážŠáž˜áž¶áž“', '22:05:00.000000', '01:05:00.000000', '---', '2021-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attandance_stu`
--

DROP TABLE IF EXISTS `tbl_attandance_stu`;
CREATE TABLE IF NOT EXISTS `tbl_attandance_stu` (
  `Attandance_ID` int(50) NOT NULL AUTO_INCREMENT,
  `Student_ID` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Event_Time` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Attendent` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Referent` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `attendance_date` date NOT NULL,
  PRIMARY KEY (`Attandance_ID`),
  KEY `Student_ID` (`Student_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books`
--

DROP TABLE IF EXISTS `tbl_books`;
CREATE TABLE IF NOT EXISTS `tbl_books` (
  `Book_ID` int(11) NOT NULL AUTO_INCREMENT,
  `School_ID` int(50) NOT NULL,
  `Book_Name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Class_ID` int(11) DEFAULT NULL,
  `Barcode` int(11) DEFAULT NULL,
  `type_year` int(11) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `Book_Status` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Book_ID`),
  KEY `School_ID` (`School_ID`,`Class_ID`),
  KEY `Class_ID` (`Class_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_books`
--

INSERT INTO `tbl_books` (`Book_ID`, `School_ID`, `Book_Name`, `Class_ID`, `Barcode`, `type_year`, `Qty`, `Book_Status`) VALUES
(9, 2110407012, 'áž‚ážŽáž·ážážœáž·áž‘áŸ’áž™áž¶', 1, 15156561, 2012, 50, 'ážáŸ’áž˜áž¸'),
(10, 2110407012, 'ážŸáž·áž€áŸ’ážŸáž¶ážŸáž„áŸ’áž‚áž˜', 1, 151, 2012, 50, 'áž…áž¶ážŸáŸ‹');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catresult`
--

DROP TABLE IF EXISTS `tbl_catresult`;
CREATE TABLE IF NOT EXISTS `tbl_catresult` (
  `CatResult_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type_Result` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`CatResult_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_child_profile`
--

DROP TABLE IF EXISTS `tbl_child_profile`;
CREATE TABLE IF NOT EXISTS `tbl_child_profile` (
  `child_ID` int(250) NOT NULL AUTO_INCREMENT,
  `chile_Profile` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`child_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_child_profile`
--

INSERT INTO `tbl_child_profile` (`child_ID`, `chile_Profile`, `other`) VALUES
(1, 'áž€áž¶áž™ážŸáž˜áž”áŸ’áž”áž‘áž¶', ''),
(2, 'áž”áž‰áŸ’áž‰áž¶ážŸáŸ’áž˜áž¶ážšážáž¸', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classroom`
--

DROP TABLE IF EXISTS `tbl_classroom`;
CREATE TABLE IF NOT EXISTS `tbl_classroom` (
  `Classroom_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Grade_ID` int(50) NOT NULL,
  `School_ID` int(100) NOT NULL,
  `Classroom_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Years_Study` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Classroom_ID`),
  KEY `Grade_Id` (`Grade_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_classroom`
--

INSERT INTO `tbl_classroom` (`Classroom_ID`, `Grade_ID`, `School_ID`, `Classroom_Name`, `Years_Study`) VALUES
(79, 11, 2110407012, 'áž€', '2020 - 2021'),
(80, 11, 2110407012, 'áž', '2020 - 2021');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classroom_student`
--

DROP TABLE IF EXISTS `tbl_classroom_student`;
CREATE TABLE IF NOT EXISTS `tbl_classroom_student` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Classroom_ID` int(11) NOT NULL,
  `Student_ID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Classroom_ID`,`Student_ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `Classroom_ID` (`Classroom_ID`),
  KEY `Student_ID` (`Student_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_classroom_student`
--

INSERT INTO `tbl_classroom_student` (`ID`, `Classroom_ID`, `Student_ID`) VALUES
(50, 80, '100'),
(51, 80, '102'),
(52, 80, '109'),
(53, 80, '201'),
(54, 80, '202'),
(55, 80, '3545');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_commune`
--

DROP TABLE IF EXISTS `tbl_commune`;
CREATE TABLE IF NOT EXISTS `tbl_commune` (
  `Commune_ID` int(250) NOT NULL AUTO_INCREMENT,
  `district_ID` int(250) NOT NULL,
  `Commune_Name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Postcode` int(250) NOT NULL,
  `Description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Commune_ID`),
  KEY `district_ID` (`district_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_commune`
--

INSERT INTO `tbl_commune` (`Commune_ID`, `district_ID`, `Commune_Name`, `Postcode`, `Description`) VALUES
(1, 1, 'ážáž¶ážŸáž¶áž‰', 3001, NULL),
(2, 3, 'áž”áž¶áž™ážŠáŸ†ážšáž¶áŸ†', 3002, NULL),
(3, 2, 'áž¢áž¼ážáž¶ážœáŸ‰áž¶ážœ', 3003, NULL),
(4, 4, 'áž”ážšáž™áž¸ážáž¶', 3004, NULL),
(5, 4, 'ážŸáŸŠáž»áž„', 6565757, NULL),
(6, 2, 'áž¢áž¼ážšáž¢ážŽáŸ’ážŠáž¼áž„', 4657657, NULL),
(7, 1, 'áž‘áŸ’ážšáž¼áž„ážáŸ’áž›áž¶', 4645657, NULL),
(8, 3, 'áž€áž“áŸ’áž‘ážºáŸ¡', 65757, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

DROP TABLE IF EXISTS `tbl_district`;
CREATE TABLE IF NOT EXISTS `tbl_district` (
  `district_ID` int(250) NOT NULL AUTO_INCREMENT,
  `province_ID` int(250) NOT NULL,
  `District_Name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Postcode` int(250) NOT NULL,
  `Description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`district_ID`),
  KEY `district_ID` (`district_ID`),
  KEY `province_ID` (`province_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_ID`, `province_ID`, `District_Name`, `Postcode`, `Description`) VALUES
(1, 1, 'ážŸáŸ†áž¡áž¼áž', 2001, NULL),
(2, 2, 'ážŸáž¶áž›áž¶áž€áŸ’ážšáŸ…', 2002, NULL),
(3, 1, 'áž”áž¶ážŽáž“áŸ‹', 2003, NULL),
(4, 2, 'ážŸáŸ’ážšáž»áž€ážáŸ’áž‰áž»áŸ†', 2004, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doe`
--

DROP TABLE IF EXISTS `tbl_doe`;
CREATE TABLE IF NOT EXISTS `tbl_doe` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `DOE_ID` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Full_Name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EN_Fullname` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Gender` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Dob` date DEFAULT NULL,
  `Pob_Address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Date_of_startwork` date DEFAULT NULL,
  `Date_of_certi` date DEFAULT NULL,
  `type_of_framework` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Lastdate_of_certi` date DEFAULT NULL,
  `Level_of_framework` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Unit` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Edu_Level` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Vocational_Level` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Position` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `family_status` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Current_Address` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Tel` int(250) NOT NULL,
  `Role` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Date_Created` date DEFAULT NULL,
  `remark` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`,`DOE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_doe`
--

INSERT INTO `tbl_doe` (`ID`, `DOE_ID`, `Full_Name`, `EN_Fullname`, `Gender`, `Dob`, `Pob_Address`, `Date_of_startwork`, `Date_of_certi`, `type_of_framework`, `Lastdate_of_certi`, `Level_of_framework`, `Unit`, `Edu_Level`, `Vocational_Level`, `Position`, `family_status`, `Current_Address`, `Email`, `Password`, `Tel`, `Role`, `Date_Created`, `remark`) VALUES
(12, '4444', 'áž¡áž»áž€ ážŸáž¶áž˜ážŒáž¸', 'Lok Samady', 'áž”áŸ’ážšáž»ážŸ', '1998-08-12', 'ážážážŠáž„ážŠáž„', '2021-09-02', '2021-09-02', 'áž‚áŸ’ážšáž¼áž”áž„áŸ’ážšáŸ€áž“áž€áž˜áŸ’ážšáž·ážáž§ážáŸ’ážáž˜', '2021-09-02', 'áž‚áŸ¡áŸ ', 'ážážŠážážŠážážŠáž„ážŠáž„', 'áž¢áž“áž»áž”ážŽáŸ’ážŒáž·áž', 'áž‚áŸ’ážšáž¼áž”áž„áŸ’ážšáŸ€áž“áž€áž˜áŸ’ážšáž·ážáž”áž‹áž˜', 'áž”áž»áž‚áŸ’áž‚áž›áž·áž€áž€áž¶ážšáž·áž™áž¶áž›áŸáž™', 'áž“áŸ…áž›áž¸ážœ', 'áž„ážŠáž„ážŠáž„ážŠáž„', 'loksamady168@gmail.com', 'dbc4d84bfcfe2284ba11beffb853a8c4', 515165156, 'admin', '2021-09-06', NULL),
(15, '3333', 'Lok Samady', 'Lok Samady', 'áž”áŸ’ážšáž»ážŸ', '2011-02-09', 'áž—áž¼áž˜áž· áž¢áž„áŸ’áž‚, ážŸáž„áŸ’áž€áž¶ážáŸ‹áž¢áž¼ážšáž…áž¶ážš, ážŸáŸ’ážšáž»áž€áž”áž¶ážáŸ‹ážŠáŸ†áž”áž„, ážáŸážáŸ’ážŠáž”áž¶ážáŸ‹ážŠáŸ†áž”áž„', '2021-09-07', '2021-09-07', 'áž‚áŸ’ážšáž¼áž”áž„áŸ’ážšáŸ€áž“áž€áž˜áŸ’ážšáž·ážáž˜áž’áŸ’áž™áž˜', '2021-09-07', 'áž‚áŸ¡áŸ ', 'BBU', 'áž”ážŽáŸ’ážŒáž·áž', 'áž‚áŸ’ážšáž¼áž”áž„áŸ’ážšáŸ€áž“áž€áž˜áŸ’ážšáž·ážáž”áž‹áž˜', 'áž”áž»áž‚áŸ’áž‚áž›áž·áž€áž€áž¶ážšáž·áž™áž¶áž›áŸáž™', 'áž“áŸ…áž›áž¸ážœ', 'áž—áž¼áž˜áž· áž¢áž„áŸ’áž‚, ážŸáž„áŸ’áž€áž¶ážáŸ‹áž¢áž¼ážšáž…áž¶ážš, ážŸáŸ’ážšáž»áž€áž”áž¶ážáŸ‹ážŠáŸ†áž”áž„, ážáŸážáŸ’ážŠáž”áž¶ážáŸ‹ážŠáŸ†áž”áž„', 'loksamady168@gmail.com', '2be9bd7a3434f7038ca27d1918de58bd', 965607878, 'admin', '2021-09-07', NULL),
(16, '2222', '123', 'Lok Samady', 'áž”áŸ’ážšáž»ážŸ', '2021-09-08', 'áž—áž¼áž˜áž· áž¢áž„áŸ’áž‚, ážŸáž„áŸ’áž€áž¶ážáŸ‹áž¢áž¼ážšáž…áž¶ážš, ážŸáŸ’ážšáž»áž€áž”áž¶ážáŸ‹ážŠáŸ†áž”áž„, ážáŸážáŸ’ážŠáž”áž¶ážáŸ‹ážŠáŸ†áž”áž„', '2021-09-08', '2021-09-08', 'áž‚áŸ’ážšáž¼áž”áž„áŸ’ážšáŸ€áž“áž€áž˜áŸ’ážšáž·ážáž”áž‹áž˜', '2021-09-08', 'áž‚áŸ¡áŸ ', 'BBU', 'áž”ážšáž·áž‰áŸ’áž‰áž¶áž”ážáŸ’ážš', 'áž‚áŸ’ážšáž¼áž”áž„áŸ’ážšáŸ€áž“áž€áž˜áŸ’ážšáž·ážáž”áž‹áž˜', 'áž›áŸážáž¶', 'áž“áŸ…áž›áž¸ážœ', 'áž—áž¼áž˜áž· áž¢áž„áŸ’áž‚, ážŸáž„áŸ’áž€áž¶ážáŸ‹áž¢áž¼ážšáž…áž¶ážš, ážŸáŸ’ážšáž»áž€áž”áž¶ážáŸ‹ážŠáŸ†áž”áž„, ážáŸážáŸ’ážŠáž”áž¶ážáŸ‹ážŠáŸ†áž”áž„', 'loksamady168@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 965607378, 'Admin', '2021-09-08', NULL),
(17, '12345', 'fdgfds', 'fdasfdsaf', 'sdasfd', '2022-09-14', 'dafdasf', '2022-09-01', '2022-09-08', 'safda', '2022-09-30', 'dsafdasf', 'dsaf', 'safdaf', 'dsafdasf', 'dsafdsfa', 'dsaf', 'dasfd', 'samoun.pttc@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 12355788, 'admin', '2022-09-24', 'dsafdaf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade`
--

DROP TABLE IF EXISTS `tbl_grade`;
CREATE TABLE IF NOT EXISTS `tbl_grade` (
  `Grade_ID` int(50) NOT NULL AUTO_INCREMENT,
  `Grade_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Decription` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Grade_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_grade`
--

INSERT INTO `tbl_grade` (`Grade_ID`, `Grade_Name`, `Decription`) VALUES
(4, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¤', ''),
(5, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¥', ''),
(6, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¦', ''),
(11, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¢', NULL),
(12, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ£', NULL),
(15, 'áž˜ážáŸ’ážáŸáž™áŸ’áž™', NULL),
(16, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_occupation`
--

DROP TABLE IF EXISTS `tbl_occupation`;
CREATE TABLE IF NOT EXISTS `tbl_occupation` (
  `Occupation_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Occupation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `other` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Occupation_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_occupation`
--

INSERT INTO `tbl_occupation` (`Occupation_ID`, `Occupation`, `other`) VALUES
(2, 'áž€ážŸáž·áž€ážš', ''),
(3, 'áž‚áŸ’ážšáž¼áž”áž„áŸ’ážšáŸ€áž“', ''),
(4, 'áž¢áž¶áž‡áž¸ážœáž€ážš', ''),
(5, 'áž–áŸáž‘áŸ’áž™', ''),
(6, 'áž”áŸ‰áž¼áž›áž·ážŸ', ''),
(7, 'áž‘áž¶áž áž¶áž“', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parent`
--

DROP TABLE IF EXISTS `tbl_parent`;
CREATE TABLE IF NOT EXISTS `tbl_parent` (
  `Parent_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Student_ID` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Mother_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Dependent` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_Number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `occupation` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Parent_ID`),
  KEY `Student_ID` (`Student_ID`),
  KEY `Student_ID_2` (`Student_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parent_school`
--

DROP TABLE IF EXISTS `tbl_parent_school`;
CREATE TABLE IF NOT EXISTS `tbl_parent_school` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_point`
--

DROP TABLE IF EXISTS `tbl_point`;
CREATE TABLE IF NOT EXISTS `tbl_point` (
  `Point_ID` int(11) NOT NULL AUTO_INCREMENT,
  `School_ID` int(11) DEFAULT NULL,
  `Classroom_ID` int(11) DEFAULT NULL,
  `Subject_ID` int(11) DEFAULT NULL,
  `Gender` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Point_0` int(11) DEFAULT NULL,
  `Point_1` int(11) DEFAULT NULL,
  `Point_2` int(11) DEFAULT NULL,
  `Point_3` int(11) DEFAULT NULL,
  `Point_4` int(11) DEFAULT NULL,
  `Point_5` int(11) DEFAULT NULL,
  `Point_6` int(11) DEFAULT NULL,
  `Point_7` int(11) DEFAULT NULL,
  `Point_8` int(11) DEFAULT NULL,
  `Point_9` int(11) DEFAULT NULL,
  `Point_10` int(11) DEFAULT NULL,
  `Year_Study` year(4) DEFAULT NULL,
  PRIMARY KEY (`Point_ID`),
  KEY `School_ID` (`School_ID`,`Classroom_ID`,`Subject_ID`),
  KEY `Subject_ID` (`Subject_ID`),
  KEY `Classroom_ID` (`Classroom_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_province`
--

DROP TABLE IF EXISTS `tbl_province`;
CREATE TABLE IF NOT EXISTS `tbl_province` (
  `province_ID` int(200) NOT NULL AUTO_INCREMENT,
  `province_Name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Postcode` int(250) NOT NULL,
  PRIMARY KEY (`province_ID`),
  KEY `province_ID` (`province_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_province`
--

INSERT INTO `tbl_province` (`province_ID`, `province_Name`, `description`, `Postcode`) VALUES
(1, 'áž”áž¶ážáŸ‹ážŠáŸ†áž”áž„', NULL, 1001),
(2, 'áž”áŸ‰áŸƒáž›áž·áž“', NULL, 1002),
(8, 'áž–áŸ„áž’áž·áŸážŸáž¶ážáŸ‹', NULL, 1003);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school`
--

DROP TABLE IF EXISTS `tbl_school`;
CREATE TABLE IF NOT EXISTS `tbl_school` (
  `ID_School` int(100) NOT NULL AUTO_INCREMENT,
  `School_ID` int(200) NOT NULL,
  `School_NameKH` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `School_NameEN` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_school` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_type` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `School_Province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `School_District` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `School_Commune` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `School_Village` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Decription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`School_ID`),
  UNIQUE KEY `ID_School` (`ID_School`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_school`
--

INSERT INTO `tbl_school` (`ID_School`, `School_ID`, `School_NameKH`, `School_NameEN`, `parent_school`, `school_type`, `School_Province`, `School_District`, `School_Commune`, `School_Village`, `Decription`) VALUES
(3, 1111, 'ážœáž¶áž›áž’áŸ’áž˜áž¶ážš', 'VEAL THMEA', NULL, NULL, '2', '4', '4', '4', NULL),
(14, 3333, 'áž”áž‹áž˜ážŸáž·áž€áŸ’ážŸáž¶áž‘áŸ’ážšáž»áž„ážáŸ’áž›áž¶', 'Trung Kla', NULL, NULL, '1', '1', '1', '1', NULL),
(15, 12345, 'áž”áž‹áž˜ážŸáž·áž€áŸ’ážŸáž¶ážŸáŸ’áž–áž„áŸ‹áž‡áŸ’ážšáŸ…áž€áŸ’ážšáŸ„áž˜', 'Spong Chrove krom', NULL, NULL, '1', '1', '1', '1', NULL),
(12, 2110407012, 'ážŸáž¶áž›áž¶áž”áž‹áž˜ážŸáž·áž€áŸ’ážŸáž¶ ážŸáŸ’áž‘áž¹áž„ážáž¼áž…', 'Steang Toch Primary School', NULL, NULL, '1', '1', '1', '7', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sex`
--

DROP TABLE IF EXISTS `tbl_sex`;
CREATE TABLE IF NOT EXISTS `tbl_sex` (
  `Sex_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Sex` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Sex_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

DROP TABLE IF EXISTS `tbl_student`;
CREATE TABLE IF NOT EXISTS `tbl_student` (
  `ID_Student` int(250) NOT NULL AUTO_INCREMENT,
  `Student_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `School_ID` int(255) DEFAULT NULL,
  `studentname_kh` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `studentname_en` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `Province_ID` int(250) DEFAULT NULL,
  `district_ID` int(250) DEFAULT NULL,
  `commune_ID` int(250) DEFAULT NULL,
  `village_ID` int(250) DEFAULT NULL,
  `dob_province_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob_district_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob_commune_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob_village_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `family_status` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `child_ID` int(250) DEFAULT NULL,
  `grade` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` longblob,
  PRIMARY KEY (`Student_ID`),
  UNIQUE KEY `ID_Student` (`ID_Student`),
  KEY `School_ID` (`School_ID`,`Province_ID`,`district_ID`,`commune_ID`,`child_ID`),
  KEY `Province_ID` (`Province_ID`),
  KEY `district_ID` (`district_ID`),
  KEY `commune_ID` (`commune_ID`),
  KEY `village_ID` (`village_ID`),
  KEY `child_ID` (`child_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`ID_Student`, `Student_ID`, `School_ID`, `studentname_kh`, `studentname_en`, `sex`, `dob`, `Province_ID`, `district_ID`, `commune_ID`, `village_ID`, `dob_province_name`, `dob_district_name`, `dob_commune_name`, `dob_village_name`, `family_status`, `child_ID`, `grade`, `photo`) VALUES
(47, '100', 2110407012, 'áž€', 'gdgesg', 'ážŸáŸ’ážšáž¸', '2021-09-16', 2, 4, 4, 4, '1', 'efsf', 'sfsf', 'sfsf', 'áž›áŸ†áž”áž¶áž€', 1, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¢', 0x3131393839363836335f323437363735323232353738333339315f383732323031353635303438303935323437355f6e2e706e67),
(21, '1002', 1111, 'áž¡áž»áž€ ážŸáž¶áž˜ážŒáž¸', 'Lok Samady', 'áž”áŸ’ážšáž»ážŸ', '2000-08-12', 1, 1, 1, 1, '2', 'áž”áŸ‰áŸƒáž›áž·áž“', 'ážŸáž½áž“áž¢áŸ†áž–áŸ…', 'ážŸáž½áž“áž¢áŸ†áž–áŸ…áž›áž·áž…', 'áž›áŸ†áž”áž¶áž€', 1, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¢', 0x70686f746f5f323032312d30372d32395f30392d34342d32332e6a7067),
(23, '1003', 1111, 'áž‡áž½áž“ ážŸáŸ†áž¢áž»áž“', 'oun', 'áž”áŸ’ážšáž»ážŸ', '2008-09-04', 2, 4, 4, 4, '1', 'áž”áŸ‰áŸƒáž›áž·áž“', 'ážŸáž½áž“áž¢áŸ†áž–áŸ…', 'áž¢áž„áŸ’áž‚', 'áž›áŸ†áž”áž¶áž€', 1, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¢', 0x622e6a7067),
(24, '1004', 1111, 'áž¡áŸƒ ážŸáŸáž„', 'dgg', 'ážŸáŸ’ážšáž¸', '2007-08-25', 1, 3, 8, 13, '1', 'ážáŸ’áž˜áž‚áŸ„áž›', 'ážŸáž„áŸ’áž€áŸ‚', 'ážŸáž½áž“áž¢áŸ†áž–áŸ…áž›áž·áž…', 'áž›áŸ†áž”áž¶áž€', 1, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¢', 0x646f776e6c6f61642e706e67),
(25, '1005', 1111, 'áž›áž¸â€‹ áž áŸ€áž„', 'Ly Heang', 'áž”áŸ’ážšáž»ážŸ', '2009-05-12', 2, 4, 4, 4, '1', 'ážáŸ’áž˜áž‚áŸ„áž›', 'ážŸáž„áŸ’áž€áŸ‚', 'ážŸáž½áž“áž¢áŸ†áž–áŸ…áž›áž·áž…', 'áž›áŸ†áž”áž¶áž€', 1, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¢', ''),
(26, '1006', 1111, 'ážŸáž»áž—áŸáž€áŸ’ážš', 'Sopheak', 'áž”áŸ’ážšáž»ážŸ', '2005-02-24', 1, 1, 1, 1, '2', 'áž”áŸ‰áŸƒáž›áž·áž“', 'ážŸáž½áž“áž¢áŸ†áž–áŸ…', 'ážŸáž½áž“áž¢áŸ†áž–áŸ…áž›áž·áž…', 'áž›áŸ†áž”áž¶áž€', 1, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¢', 0x706e676567672e706e67),
(48, '102', 2110407012, 'áž', 'egeg', 'ážŸáŸ’ážšáž¸', '2021-09-07', 2, 4, 4, 4, '2', 'ážáŸ’áž˜áž‚áŸ„áž›', 'dgdg', 'ážŸáž½áž“áž¢áŸ†áž–áŸ…áž›áž·áž…', 'ffsddv', 1, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¢', 0x33393232333234375f3634323637393637393434383536325f3231303933323438383232303936363931325f6e2e6a7067),
(49, '105', 2110407012, 'ážƒ', 'ojegeg', 'áž”áŸ’ážšáž»ážŸ', '2021-09-01', 1, 3, 8, 13, '1', 'egeg', 'egeg', 'dgdg', 'áž›áŸ†áž”áž¶áž€', 1, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¢', 0x70686f746f5f323032312d30332d33305f32312d35302d35322e6a7067),
(50, '106', 2110407012, 'áž„', 'joijgrg', 'áž”áŸ’ážšáž»ážŸ', '2021-09-02', 1, 3, 8, 13, '1', 'svsv', 'dvdb', 'bfb', 'áž›áŸ†áž”áž¶áž€', 1, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¢', 0x70686f746f5f323031392d31302d30345f31352d33352d35322e6a7067),
(51, '108', 2110407012, 'áž…', 'josdgdg', 'ážŸáŸ’ážšáž¸', '2021-09-16', 1, 3, 8, 13, '1', 'ddbd', 'fbfb', 'fbfn', 'fhfh', 2, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¢', 0x70686f746f5f323032312d30322d31385f32302d31312d32342e6a7067),
(52, '109', 2110407012, 'áž¡áž»áž€ ážŸáž¶áž˜ážŒáž¸', 'Lok Samady', 'áž”áŸ’ážšáž»ážŸ', '2021-09-09', 2, 4, 4, 4, '1', 'rgeg', 'dgdg', 'dgdg', 'gdg', 1, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¢', 0x70686f746f5f323032312d30372d32395f30392d34342d32332e6a7067),
(55, '11117', 2110407012, 'áž‡áž½áž“ ážŸáŸ†áž¢áž»áž“', 'choun smaoun', 'áž”áŸ’ážšáž»ážŸ', '2024-09-08', 2, 4, 4, 4, 'dsafd', 'dafd', 'áž¢áž¼ážšážŸáŸ†ážšáž·áž›', 'áž…áž˜áŸ’áž›áž„ážšáž˜áž¶áŸ†áž„áž›áž¾', 'áž˜áž’áŸ’áž™áž˜', 1, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¤', ''),
(53, '201', 2110407012, 'áž†', 'gdgg', 'áž”áŸ’ážšáž»ážŸ', '2021-08-31', 2, 4, 4, 4, '1', 'vdv', 'dvdv', 'dvdv', 'áž›áŸ†áž”áž¶áž€', 1, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¢', 0x706e676567672e706e67),
(54, '202', 2110407012, 'áž‡', 'ojoigeg', 'áž”áŸ’ážšáž»ážŸ', '2021-09-13', 2, 4, 4, 4, '1', 'fhhbf', 'fhhf', 'fhfhf', 'áž›áŸ†áž”áž¶áž€', 1, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¢', 0x3134313638343530365f313336373037323233333633333739395f323636383639353835353636353033313539345f6e2e6a7067),
(27, '3001', 1111, 'áž”áž¼áž•áž¶', 'Bopha', 'áž”áŸ’ážšáž»ážŸ', '2012-02-06', 2, 4, 4, 4, '1', 'ážáŸ’áž˜áž‚áŸ„áž›', 'ážŸáž„áŸ’áž€áŸ‚', 'ážŸáž½áž“áž¢áŸ†áž–áŸ…áž›áž·áž…', 'áž›áŸ†áž”áž¶áž€', 1, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ£', 0x632e6a7067),
(39, '3545', 2110407012, 'áž‘áž·ážáŸ’áž™ ážŠáŸ‚áž“', 'Tit Den', 'áž”áŸ’ážšáž»ážŸ', '2015-09-10', 2, 4, 4, 4, 'rrhrh', 'rhrth', 'fhfh', 'fhfh', 'áž›áŸ†áž”áž¶áž€', 1, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¢', 0x64656e2e6a7067),
(36, '4646', 1111, 'ážáž¶ážšáž¶', 'Dara', 'áž”áŸ’ážšáž»ážŸ', '2015-06-10', 1, 3, 8, 13, 'rwe', 'egerg', 'rhrfh', 'fhfh', 'áž›áŸ†áž”áž¶áž€', 2, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¤', 0x3134313638343530365f313336373037323233333633333739395f323636383639353835353636353033313539345f6e2e6a7067),
(34, '544', 1111, 'áž¡áŸƒ ážŸáŸáž„', 'Lay Seng', 'áž”áŸ’ážšáž»ážŸ', '2018-08-01', 2, 4, 4, 4, 'egdgdg', 'dfxgfcxhb', 'fhngfnjg', 'xfdbgcfxb', 'áž›áŸ†áž”áž¶áž€', 1, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ£', ''),
(35, '5443536', 1111, 'ážšáž…áž“áž¶', 'drgrhr', 'ážŸáŸ’ážšáž¸', '2016-07-08', 2, 4, 4, 4, 'efg', 'dgdg', 'dgdg', 'dgdg', 'áž›áŸ†áž”áž¶áž€', 1, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¤', 0x3132343333303030395f3131333136393833303630343033345f313035363331313839373837383534333031375f6e2e6a7067),
(43, '544646', 2110407012, 'áž‡áž½áž“ ážŸáŸ†áž¢áž»áž“', 'oun', 'ážŸáŸ’ážšáž¸', '2014-06-05', 1, 3, 8, 13, 'áž€áŸ†áž–áž„áŸ‹áž…áž¶áž˜', 'ážáŸ’áž˜áž‚áŸ„áž›', 'ážŸáž„áŸ’áž€áŸ‚', 'ážŸáž½áž“áž¢áŸ†áž–áŸ…áž›áž·áž…', 'áž›áŸ†áž”áž¶áž€', 1, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¢', 0x646f776e6c6f61642e706e67),
(44, '54646', 2110407012, 'áž”áž¼áž•áž¶', 'Bopha', 'ážŸáŸ’ážšáž¸', '2017-05-04', 1, 3, 8, 13, 'áž€áŸ†áž–áž„áŸ‹áž…áž¶áž˜', 'ážáŸ’áž˜áž‚áŸ„áž›', 'ážŸáž„áŸ’áž€áŸ‚', 'ážŸáž½áž“áž¢áŸ†áž–áŸ…áž›áž·áž…', 'áž›áŸ†áž”áž¶áž€', 1, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¢', 0x632e6a7067),
(30, '68687697', 1111, 'áž‘áž·ážáŸ’áž™ ážŠáŸ‚áž“', 'Tit Den', 'áž”áŸ’ážšáž»ážŸ', '2021-09-11', 2, 4, 4, 4, '1', 'ážáŸ’áž˜áž‚áŸ„áž›', 'ážŸáž„áŸ’áž€áŸ‚', 'ážŸáž½áž“áž¢áŸ†áž–áŸ…áž›áž·áž…', 'áž›áŸ†áž”áž¶áž€', 1, 'ážáŸ’áž“áž¶áž€áŸ‹áž‘áž¸áŸ¢', 0x64656e2e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_score`
--

DROP TABLE IF EXISTS `tbl_student_score`;
CREATE TABLE IF NOT EXISTS `tbl_student_score` (
  `Student_Score_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Classroom_ID` int(11) DEFAULT NULL,
  `Subject_ID` int(11) DEFAULT NULL,
  `Score_Semester1` float DEFAULT NULL,
  `Score_Semester2` float DEFAULT NULL,
  `Score_Month_per_year` float NOT NULL,
  `other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Student_Score_ID`),
  KEY `School_ID` (`Classroom_ID`,`Subject_ID`),
  KEY `Subject_ID` (`Subject_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

DROP TABLE IF EXISTS `tbl_subject`;
CREATE TABLE IF NOT EXISTS `tbl_subject` (
  `Subject_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Subject` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Subject_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`Subject_ID`, `Subject`) VALUES
(1, 'áž‚ážŽáž·ážážœáž·áž‘áŸ’áž™áž¶'),
(2, 'ážŸáž·áž€áŸ’ážŸáž¶ážŸáž„áŸ’áž‚áž˜'),
(3, 'áž—áž¶ážŸáž¶ážáŸ’áž˜áŸ‚ážš'),
(4, 'ážœáž·áž‘áŸ’áž™áž¶ážŸáž¶ážŸáŸ’ážšáŸ’ážŠ'),
(6, 'áž¢áž„áŸ‹áž‚áŸ’áž›áŸážŸ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

DROP TABLE IF EXISTS `tbl_teacher`;
CREATE TABLE IF NOT EXISTS `tbl_teacher` (
  `ID_Teacher` int(254) NOT NULL AUTO_INCREMENT,
  `Teacher_ID` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `School_ID` int(200) DEFAULT NULL,
  `Teacher_NameKH` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Teacher_NameEN` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Sex` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Start_Date_Work` date DEFAULT NULL,
  `Date_Certi` date DEFAULT NULL,
  `Teacher_Framework` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Teacher_Position` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Lavel_Type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Subject1` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Subject2` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_Certivicate` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Province_ID` int(50) DEFAULT NULL,
  `District_ID` int(50) DEFAULT NULL,
  `Commune_ID` int(50) DEFAULT NULL,
  `Village_ID` int(50) DEFAULT NULL,
  `POB_Province` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `POB_District` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `POB_Commune` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `POB_Village` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Relationship` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photos` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_Teacher`,`Teacher_ID`),
  UNIQUE KEY `ID_Teacher` (`ID_Teacher`),
  KEY `School_ID` (`School_ID`,`Province_ID`,`District_ID`,`Commune_ID`,`Village_ID`),
  KEY `Province_ID` (`Province_ID`),
  KEY `District_ID` (`District_ID`),
  KEY `Commune_ID` (`Commune_ID`),
  KEY `Village_ID` (`Village_ID`),
  KEY `Teacher_ID` (`Teacher_ID`),
  KEY `Subject1` (`Subject1`,`Subject2`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`ID_Teacher`, `Teacher_ID`, `School_ID`, `Teacher_NameKH`, `Teacher_NameEN`, `Sex`, `DOB`, `Start_Date_Work`, `Date_Certi`, `Teacher_Framework`, `Teacher_Position`, `Lavel_Type`, `Subject1`, `Subject2`, `phone`, `last_Certivicate`, `Province_ID`, `District_ID`, `Commune_ID`, `Village_ID`, `POB_Province`, `POB_District`, `POB_Commune`, `POB_Village`, `Relationship`, `photos`) VALUES
(40, 'xnxx1321351554', 1111, 'áž”áŸ’ážšáž»ážŸ ážŠáŸ‚áž“', 'Tit Den', 'áž”áŸ’ážšáž»ážŸ', '2021-09-12', '2021-09-12', '2021-09-12', 'áž§ážáŸ’ážáž˜', 'áž“áž¶áž™áž€', 'áž€.áŸ¡.áŸ¡', 'áž—áž¶ážŸáž¶ážáŸ’áž˜áŸ‚ážš', 'áž—áž¶ážŸáž¶ážáŸ’áž˜áŸ‚ážš', '', 'áž˜áž‘áž—', 2, 4, 4, 4, '1', 'egterg', 'rhrh', 'fhfh', 'áž“áŸ…áž›áž¸ážœ', NULL),
(43, '123', 1111, 'áž”áŸ’ážšáž»ážŸâ€‹ ážŠáŸ‚áž“', 'Bros Den', 'áž”áŸ’ážšáž»ážŸ', '2021-09-02', '2021-09-02', '2021-09-01', 'áž§ážáŸ’ážáž˜', 'áž“áž¶áž™áž€', 'áž€.áŸ¡.áŸ¡', 'áž—áž¶ážŸáž¶ážáŸ’áž˜áŸ‚ážš', 'áž—áž¶ážŸáž¶ážáŸ’áž˜áŸ‚ážš', '', 'áž”ážšáž·áž‰áŸ’áž‰áž¶áž”ážáŸ’ážš', 1, 3, 8, 13, 'segdg', 'hrhth', 'fhfh', 'fhfhfh', 'áž“áŸ…áž›áž¸ážœ', NULL),
(44, '123', 2110407012, 'áž”áŸ’ážšáž»ážŸ ážŠáŸ‚áž“', 'Lok Samady', 'áž”áŸ’ážšáž»ážŸ', '2021-09-17', '2021-09-15', '2021-09-22', 'áž§ážáŸ’ážáž˜', 'áž“áž¶áž™áž€', 'áž€.áŸ¡.áŸ¡', 'áž‚ážŽáž·ážážœáž·áž‘áŸ’áž™áž¶', 'áž‚ážŽáž·ážážœáž·áž‘áŸ’áž™áž¶', '0965607378', 'áž˜áž’áŸ’áž™áž˜ážŸáž·áž€áŸ’ážŸáž¶áž”áž‹áž˜áž—áž¼áž˜áž·', 1, 3, 8, 13, 'ážážŸážážŸáž', 'áŸážážŠáž', 'dgdg', 'ážŸážážŸáž', 'áž“áŸ…áž›áž¸ážœ', NULL),
(45, '12345678', 2110407012, 'áž¡áž»áž€â€‹ ážŸáž¶áž˜ážŒáž¸', 'Lok Samady', 'áž”áŸ’ážšáž»ážŸ', '2021-09-08', '2021-09-16', '2021-09-16', 'áž§ážáŸ’ážáž˜', 'áž“áž¶áž™áž€', 'áž€.áŸ¡.áŸ¡', 'áž‚ážŽáž·ážážœáž·áž‘áŸ’áž™áž¶', 'áž‚ážŽáž·ážážœáž·áž‘áŸ’áž™áž¶', '0965607378', 'áž˜áž’áŸ’áž™áž˜ážŸáž·áž€áŸ’ážŸáž¶áž”áž‹áž˜áž—áž¼áž˜áž·', 2, 4, 4, 4, 'ážážŸážážŸáž', 'dgdg', 'dgdg', 'dgdg', 'áž“áŸ…áž›áž¸ážœ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_classroom`
--

DROP TABLE IF EXISTS `tbl_teacher_classroom`;
CREATE TABLE IF NOT EXISTS `tbl_teacher_classroom` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Classroom_ID` int(11) NOT NULL,
  `Teacher_ID` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `Classroom_ID` (`Classroom_ID`),
  KEY `Teacher_ID` (`Teacher_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_teacher_classroom`
--

INSERT INTO `tbl_teacher_classroom` (`ID`, `Classroom_ID`, `Teacher_ID`) VALUES
(16, 79, '123'),
(17, 80, '12345678'),
(18, 80, '123'),
(19, 79, '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `User_ID` int(100) NOT NULL AUTO_INCREMENT,
  `User_Name` int(200) NOT NULL,
  `School_Name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `User_Type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Created` date NOT NULL,
  `Email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(200) NOT NULL,
  `OTP` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`User_ID`),
  KEY `Type_ID` (`User_Type`),
  KEY `School_ID` (`User_Name`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`User_ID`, `User_Name`, `School_Name`, `pwd`, `User_Type`, `Created`, `Email`, `phone`, `OTP`) VALUES
(31, 1111, '1111', 'admin', 'admin', '2021-09-02', 'loksamady168@gmail.com', 965607378, NULL),
(36, 2110407012, '2110407012', 'P62Y13', 'School', '2021-09-07', 'loksamady168@gmail.com', 965607378, NULL),
(37, 12345, 'áž”áž‹áž˜ážŸáž·áž€áŸ’ážŸáž¶ážŸáŸ’áž–áž„áŸ‹áž‡áŸ’ážšáŸ…áž€áŸ’ážšáŸ„áž˜', '123456', 'School', '2024-09-09', 'samchoun@yandex.com', 92812650, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_village`
--

DROP TABLE IF EXISTS `tbl_village`;
CREATE TABLE IF NOT EXISTS `tbl_village` (
  `Village_ID` int(250) NOT NULL AUTO_INCREMENT,
  `Commune_ID` int(250) NOT NULL,
  `Village_Name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Postcode` int(250) NOT NULL,
  `Decription` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Village_ID`),
  KEY `Commune_ID` (`Commune_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_village`
--

INSERT INTO `tbl_village` (`Village_ID`, `Commune_ID`, `Village_Name`, `Postcode`, `Decription`) VALUES
(1, 1, 'áž€', 4001, NULL),
(2, 2, 'áž', 4002, NULL),
(3, 3, 'áž‚', 4003, NULL),
(4, 4, 'ážƒ', 4004, NULL),
(5, 4, 'áž„', 4005, NULL),
(6, 3, 'áž…', 4006, NULL),
(7, 1, 'áž‡', 4007, NULL),
(13, 8, 'áž‡', 65757, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `end_test_result`
--
ALTER TABLE `end_test_result`
  ADD CONSTRAINT `end_test_result_ibfk_1` FOREIGN KEY (`School_ID`) REFERENCES `tbl_school` (`School_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `end_test_result_ibfk_2` FOREIGN KEY (`CatResult_ID`) REFERENCES `tbl_catresult` (`CatResult_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `end_test_result_ibfk_4` FOREIGN KEY (`child_ID`) REFERENCES `tbl_child_profile` (`child_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `end_test_result_ibfk_5` FOREIGN KEY (`Classroom_ID`) REFERENCES `tbl_classroom` (`Classroom_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_attandance`
--
ALTER TABLE `tbl_attandance`
  ADD CONSTRAINT `tbl_attandance_ibfk_2` FOREIGN KEY (`School_ID`) REFERENCES `tbl_school` (`School_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_attandance_ibfk_3` FOREIGN KEY (`Teacher_ID`) REFERENCES `tbl_teacher` (`Teacher_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_attandance_stu`
--
ALTER TABLE `tbl_attandance_stu`
  ADD CONSTRAINT `tbl_attandance_stu_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `tbl_student` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_books`
--
ALTER TABLE `tbl_books`
  ADD CONSTRAINT `tbl_books_ibfk_1` FOREIGN KEY (`School_ID`) REFERENCES `tbl_school` (`School_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_classroom`
--
ALTER TABLE `tbl_classroom`
  ADD CONSTRAINT `tbl_classroom_ibfk_2` FOREIGN KEY (`Grade_ID`) REFERENCES `tbl_grade` (`Grade_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_classroom_student`
--
ALTER TABLE `tbl_classroom_student`
  ADD CONSTRAINT `tbl_classroom_student_ibfk_2` FOREIGN KEY (`Student_ID`) REFERENCES `tbl_student` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_classroom_student_ibfk_3` FOREIGN KEY (`Classroom_ID`) REFERENCES `tbl_classroom` (`Classroom_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_commune`
--
ALTER TABLE `tbl_commune`
  ADD CONSTRAINT `tbl_commune_ibfk_1` FOREIGN KEY (`district_ID`) REFERENCES `tbl_district` (`district_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD CONSTRAINT `tbl_district_ibfk_1` FOREIGN KEY (`province_ID`) REFERENCES `tbl_province` (`province_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_point`
--
ALTER TABLE `tbl_point`
  ADD CONSTRAINT `tbl_point_ibfk_1` FOREIGN KEY (`School_ID`) REFERENCES `tbl_school` (`School_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_point_ibfk_2` FOREIGN KEY (`Subject_ID`) REFERENCES `tbl_subject` (`Subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_point_ibfk_3` FOREIGN KEY (`Classroom_ID`) REFERENCES `tbl_classroom` (`Classroom_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `tbl_student_ibfk_1` FOREIGN KEY (`School_ID`) REFERENCES `tbl_school` (`School_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_student_ibfk_10` FOREIGN KEY (`village_ID`) REFERENCES `tbl_village` (`Village_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_student_ibfk_2` FOREIGN KEY (`Province_ID`) REFERENCES `tbl_province` (`province_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_student_ibfk_7` FOREIGN KEY (`child_ID`) REFERENCES `tbl_child_profile` (`child_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_student_ibfk_8` FOREIGN KEY (`district_ID`) REFERENCES `tbl_district` (`district_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_student_ibfk_9` FOREIGN KEY (`commune_ID`) REFERENCES `tbl_commune` (`Commune_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_student_score`
--
ALTER TABLE `tbl_student_score`
  ADD CONSTRAINT `tbl_student_score_ibfk_2` FOREIGN KEY (`Subject_ID`) REFERENCES `tbl_subject` (`Subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_student_score_ibfk_3` FOREIGN KEY (`Classroom_ID`) REFERENCES `tbl_classroom_student` (`Classroom_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD CONSTRAINT `tbl_teacher_ibfk_1` FOREIGN KEY (`School_ID`) REFERENCES `tbl_school` (`School_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_teacher_ibfk_2` FOREIGN KEY (`Province_ID`) REFERENCES `tbl_province` (`province_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_teacher_ibfk_3` FOREIGN KEY (`District_ID`) REFERENCES `tbl_district` (`district_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_teacher_ibfk_4` FOREIGN KEY (`Commune_ID`) REFERENCES `tbl_commune` (`Commune_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_teacher_ibfk_5` FOREIGN KEY (`Village_ID`) REFERENCES `tbl_village` (`Village_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_teacher_classroom`
--
ALTER TABLE `tbl_teacher_classroom`
  ADD CONSTRAINT `tbl_teacher_classroom_ibfk_1` FOREIGN KEY (`Classroom_ID`) REFERENCES `tbl_classroom` (`Classroom_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_teacher_classroom_ibfk_2` FOREIGN KEY (`Teacher_ID`) REFERENCES `tbl_teacher` (`Teacher_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`User_Name`) REFERENCES `tbl_school` (`School_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_village`
--
ALTER TABLE `tbl_village`
  ADD CONSTRAINT `tbl_village_ibfk_1` FOREIGN KEY (`Commune_ID`) REFERENCES `tbl_commune` (`Commune_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
