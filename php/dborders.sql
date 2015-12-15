-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2015 at 11:19 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dborders`
--
CREATE DATABASE IF NOT EXISTS `dborders` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dborders`;

-- --------------------------------------------------------

--
-- Table structure for table `combos`
--
-- Creation: Dec 15, 2015 at 02:08 AM
--

DROP TABLE IF EXISTS `combos`;
CREATE TABLE IF NOT EXISTS `combos` (
  `comboID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `details` varchar(65) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(45) NOT NULL,
  PRIMARY KEY (`comboID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `combos`
--

INSERT INTO `combos` (`comboID`, `name`, `details`, `price`, `image`) VALUES
(1, '1/4 Chicken', '1/4 Portion of Chicken with Fries and Green Salad', 45, 'images/bbq5.jpg'),
(2, '1/2 Chicken', '1/2 Portion of Chicken with Fries and Green Salad', 55, 'images/bbq5.jpg'),
(3, 'Lamb', 'Lamb Chops with Fries and Green Salad', 55, 'images/bbq5.jpg'),
(4, 'Beef', 'Beef Steak with Fries and Green Salad', 55, 'images/bbq5.jpg'),
(5, 'Fish', 'Kingfish with Fries and Green Salad', 55, 'images/bbq5.jpg'),
(6, 'Shrimp', 'Shrimp with Fries and Green Salad', 75, 'images/bbq5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--
-- Creation: Dec 16, 2015 at 12:52 AM
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `combos` varchar(45) DEFAULT NULL,
  `sides` varchar(45) DEFAULT NULL,
  `pickup` bigint(20) unsigned NOT NULL,
  `consumerName` varchar(65) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `status` enum('Pending','Completed','Overdue','Removed') NOT NULL DEFAULT 'Pending' COMMENT '''waiting'',''completed'' or ''overdue''',
  PRIMARY KEY (`orderID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `sides`
--
-- Creation: Dec 14, 2015 at 09:16 PM
--

DROP TABLE IF EXISTS `sides`;
CREATE TABLE IF NOT EXISTS `sides` (
  `sideID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `details` varchar(45) DEFAULT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`sideID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sides`
--

INSERT INTO `sides` (`sideID`, `name`, `details`, `price`) VALUES
(1, 'Fries', NULL, 15),
(2, 'Garlic Bread', NULL, 4),
(3, 'Green Salad', NULL, 10),
(4, 'Wedges', NULL, 25),
(5, 'Cole slaw', NULL, 10),
(6, 'Baked Potatoes', NULL, 10),
(7, 'Wedges Combo', 'Wedges, garlic bread and green salad.', 35),
(8, 'Fries Combo', 'Fries, garlic bread and green salad.', 25);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
