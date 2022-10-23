-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 09, 2018 at 07:53 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mdsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'Admin', 'c5b2cebf15b205503560c4e8e6d1ea78');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(65) NOT NULL DEFAULT '',
  `credit` int(11) NOT NULL,
  `instructor` varchar(65) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `credit`, `instructor`) VALUES
(1, 'IT Systems', 7, 'Noel'),
(2, 'Education', 4, 'Noel'),
(3, 'Computer Science', 2, 'Noel'),
(4, 'Law', 4, 'Noel');

-- --------------------------------------------------------

--
-- Table structure for table `regis`
--

DROP TABLE IF EXISTS `regis`;
CREATE TABLE IF NOT EXISTS `regis` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `studentname` varchar(65) NOT NULL DEFAULT '',
  `unitname` varchar(65) NOT NULL DEFAULT '',
  `coursename` varchar(65) NOT NULL DEFAULT '',
  `query_status` varchar(65) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regis`
--

INSERT INTO `regis` (`id`, `studentname`, `unitname`, `coursename`, `query_status`) VALUES
(5, 'Andi', 'Data structures', 'Computer Science', 'Yes'),
(6, 'Andi', 'Artificial Intel', 'Computer Science', 'Yes'),
(7, 'Andi', 'Programming', 'Computer Science', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  `course` varchar(65) NOT NULL DEFAULT '',
  `year` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `username`, `password`, `course`, `year`) VALUES
(1, 'Noel', 'c5b2cebf15b205503560c4e8e6d1ea78', 'Computer Science', 2),
(2, 'Andi', 'c5b2cebf15b205503560c4e8e6d1ea78', 'Computer Science', 1);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `compulsory` varchar(65) NOT NULL DEFAULT '',
  `unitname` varchar(65) NOT NULL DEFAULT '',
  `coursename` varchar(65) NOT NULL DEFAULT '',
  `year` int(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `compulsory`, `unitname`, `coursename`, `year`) VALUES
(1, 'Yes', 'Linear Algebra', 'Computer Science', 1),
(2, 'Yes', 'Calculas', 'Computer Science', 2),
(3, 'No', 'Data structures', 'Computer Science', 1),
(4, 'Yes', 'Programming', 'Computer Science', 1),
(5, 'No', 'Artificial Intel', 'Computer Science', 1),
(6, 'No', 'BS Math', 'Computer Science', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
