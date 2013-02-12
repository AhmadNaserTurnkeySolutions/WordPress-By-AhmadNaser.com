-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 04, 2012 at 05:01 PM
-- Server version: 5.1.37
-- PHP Version: 5.2.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tpa`
--

-- --------------------------------------------------------

--
-- Table structure for table `planets`
--

CREATE TABLE `planets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `planetName` varchar(50) NOT NULL,
  `planetFromSun` varchar(50) NOT NULL,
  `planetMoons` int(11) NOT NULL,
  `planetOrbit` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `planets`
--

INSERT INTO `planets` VALUES(1, 'Mercury', '57,909,227 km', 0, '0.2408467');
INSERT INTO `planets` VALUES(2, 'Venus', '108,209,475 km', 1, '0');
INSERT INTO `planets` VALUES(3, 'Earth', '149,598,262 km', 1, '1.0000174');
INSERT INTO `planets` VALUES(4, 'Mars', '227,943,824 km', 2, '1.8808476');
INSERT INTO `planets` VALUES(5, 'Jupiter', '778,340,821 km', 64, '47,002');
INSERT INTO `planets` VALUES(6, 'Saturn', '1,426,666,422 km', 62, '29.447498');
INSERT INTO `planets` VALUES(7, 'Uranus', '2,870,658,186 km', 27, '84.016846');
INSERT INTO `planets` VALUES(8, 'Neptune', '4,498,396,441 km', 13, '164.79132');
