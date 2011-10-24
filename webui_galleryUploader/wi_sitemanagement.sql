-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 24, 2011 at 04:17 AM
-- Server version: 5.5.13
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kris1`
--

-- --------------------------------------------------------

--
-- Table structure for table `wi_sitemanagement`
--

CREATE TABLE IF NOT EXISTS `wi_sitemanagement` (
  `pagecase` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `include` varchar(255) NOT NULL,
  PRIMARY KEY (`pagecase`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wi_sitemanagement`
--

INSERT INTO `wi_sitemanagement` (`pagecase`, `type`, `include`) VALUES
('admingallery', 'Admin', 'upload.php');

