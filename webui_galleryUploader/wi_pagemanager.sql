-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 24, 2011 at 04:11 AM
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
-- Table structure for table `wi_pagemanager`
--

CREATE TABLE IF NOT EXISTS `wi_pagemanager` (
  `id` varchar(255) NOT NULL,
  `rank` float NOT NULL,
  `active` varchar(30) NOT NULL,
  `url` text NOT NULL,
  `target` varchar(255) NOT NULL,
  `display` varchar(255) NOT NULL,
  `parent` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wi_pagemanager`
--

INSERT INTO `wi_pagemanager` (`id`, `rank`, `active`, `url`, `target`, `display`, `parent`) VALUES
('webui_menu_item_admingallery', 2.7, '1', 'index.php?page=admingallery', '_self', '3', 'webui_menu_item_adminhome');
