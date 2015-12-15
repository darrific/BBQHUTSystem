-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2015 at 11:15 PM
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

UPDATE `combos` SET `comboID` = 1,`name` = '1/4 Chicken',`details` = '1/4 Portion of Chicken with Fries and Green Salad',`price` = 45,`image` = 'images/bbq5.jpg' WHERE `combos`.`comboID` = 1;
UPDATE `combos` SET `comboID` = 2,`name` = '1/2 Chicken',`details` = '1/2 Portion of Chicken with Fries and Green Salad',`price` = 55,`image` = 'images/bbq5.jpg' WHERE `combos`.`comboID` = 2;
UPDATE `combos` SET `comboID` = 3,`name` = 'Lamb',`details` = 'Lamb Chops with Fries and Green Salad',`price` = 55,`image` = 'images/bbq5.jpg' WHERE `combos`.`comboID` = 3;
UPDATE `combos` SET `comboID` = 4,`name` = 'Beef',`details` = 'Beef Steak with Fries and Green Salad',`price` = 55,`image` = 'images/bbq5.jpg' WHERE `combos`.`comboID` = 4;
UPDATE `combos` SET `comboID` = 5,`name` = 'Fish',`details` = 'Kingfish with Fries and Green Salad',`price` = 55,`image` = 'images/bbq5.jpg' WHERE `combos`.`comboID` = 5;
UPDATE `combos` SET `comboID` = 6,`name` = 'Shrimp',`details` = 'Shrimp with Fries and Green Salad',`price` = 75,`image` = 'images/bbq5.jpg' WHERE `combos`.`comboID` = 6;

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

UPDATE `sides` SET `sideID` = 1,`name` = 'Fries',`details` = NULL,`price` = 15 WHERE `sides`.`sideID` = 1;
UPDATE `sides` SET `sideID` = 2,`name` = 'Garlic Bread',`details` = NULL,`price` = 4 WHERE `sides`.`sideID` = 2;
UPDATE `sides` SET `sideID` = 3,`name` = 'Green Salad',`details` = NULL,`price` = 10 WHERE `sides`.`sideID` = 3;
UPDATE `sides` SET `sideID` = 4,`name` = 'Wedges',`details` = NULL,`price` = 25 WHERE `sides`.`sideID` = 4;
UPDATE `sides` SET `sideID` = 5,`name` = 'Cole slaw',`details` = NULL,`price` = 10 WHERE `sides`.`sideID` = 5;
UPDATE `sides` SET `sideID` = 6,`name` = 'Baked Potatoes',`details` = NULL,`price` = 10 WHERE `sides`.`sideID` = 6;
UPDATE `sides` SET `sideID` = 7,`name` = 'Wedges Combo',`details` = 'Wedges, garlic bread and green salad.',`price` = 35 WHERE `sides`.`sideID` = 7;
UPDATE `sides` SET `sideID` = 8,`name` = 'Fries Combo',`details` = 'Fries, garlic bread and green salad.',`price` = 25 WHERE `sides`.`sideID` = 8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
