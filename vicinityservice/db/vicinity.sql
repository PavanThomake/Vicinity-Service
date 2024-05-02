-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 15, 2020 at 08:48 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vicinity`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

DROP TABLE IF EXISTS `adminlogin`;
CREATE TABLE IF NOT EXISTS `adminlogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `comment_table`
--

DROP TABLE IF EXISTS `comment_table`;
CREATE TABLE IF NOT EXISTS `comment_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(200) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `cur_date` varchar(200) NOT NULL,
  `useremail` varchar(200) NOT NULL,
  `feedback` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_table`
--

INSERT INTO `comment_table` (`id`, `f_name`, `l_name`, `contact`, `occupation`, `cur_date`, `useremail`, `feedback`) VALUES
();

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `ename` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `etype` varchar(20) NOT NULL,
  `file1` varchar(100) NOT NULL,
  `file2` varchar(100) NOT NULL,
  `file3` varchar(100) NOT NULL,
  `edate` date NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`ename`, `location`, `contact`, `etype`, `file1`, `file2`, `file3`, `edate`, `id`) VALUES
();

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

DROP TABLE IF EXISTS `event_type`;
CREATE TABLE IF NOT EXISTS `event_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_type`
--

INSERT INTO `event_type` (`id`, `type`) VALUES
(4, 'Cultural events'),
(5, 'Commercial '),
(6, 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `intrestedevents`
--

DROP TABLE IF EXISTS `intrestedevents`;
CREATE TABLE IF NOT EXISTS `intrestedevents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eventname` varchar(200) NOT NULL,
  `organiser_contact_num` varchar(200) NOT NULL,
  `place` varchar(200) NOT NULL,
  `eventtype` varchar(200) NOT NULL,
  `eventdate` varchar(200) NOT NULL,
  `personname` varchar(200) NOT NULL,
  `personcontact` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intrestedevents`
--

INSERT INTO `intrestedevents` (`id`, `eventname`, `organiser_contact_num`, `place`, `eventtype`, `eventdate`, `personname`, `personcontact`) VALUES
( );

-- --------------------------------------------------------

--
-- Table structure for table `otptable`
--

DROP TABLE IF EXISTS `otptable`;
CREATE TABLE IF NOT EXISTS `otptable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contactnum` varchar(200) NOT NULL,
  `otp` varchar(200) NOT NULL,
  `expired` int(11) NOT NULL,
  `otptimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otptable`
--

INSERT INTO `otptable` (`id`, `contactnum`, `otp`, `expired`, `otptimestamp`) VALUES
();

-- --------------------------------------------------------

--
-- Table structure for table `ratingtable`
--

DROP TABLE IF EXISTS `ratingtable`;
CREATE TABLE IF NOT EXISTS `ratingtable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `useremail` varchar(200) NOT NULL,
  `usercontactinfo` varchar(200) NOT NULL,
  `rating` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `feedback` varchar(200) NOT NULL,
  `service` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratingtable`
--

INSERT INTO `ratingtable` (`id`, `fname`, `lname`, `contact`, `email`, `username`, `useremail`, `usercontactinfo`, `rating`, `timestamp`, `feedback`, `service`, `location`) VALUES
();

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `service`) VALUES
(3, 'Common User'),
(4, 'Electrician'),
(5, 'Plumber'),
(6, 'Painter');

-- --------------------------------------------------------

--
-- Table structure for table `servicestable`
--

DROP TABLE IF EXISTS `servicestable`;
CREATE TABLE IF NOT EXISTS `servicestable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `service` varchar(200) NOT NULL,
  `profilepic` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicestable`
--

INSERT INTO `servicestable` (`id`, `fname`, `lname`, `contact`, `email`, `location`, `service`, `profilepic`) VALUES
();

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

DROP TABLE IF EXISTS `userdetails`;
CREATE TABLE IF NOT EXISTS `userdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `place` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `zipcode` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `service` varchar(200) NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `fname`, `lname`, `email`, `contact`, `password`, `place`, `state`, `zipcode`, `gender`, `service`, `file`) VALUES
();
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
