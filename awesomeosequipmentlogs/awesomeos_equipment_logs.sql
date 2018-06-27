-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2018 at 01:19 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `awesomeos_equipment_logs`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `equipmentID` int(5) NOT NULL AUTO_INCREMENT,
  `serialNumber` varchar(100) NOT NULL,
  `officeTag` varchar(100) NOT NULL,
  `equipmentName` varchar(50) NOT NULL,
  `equipmentBrand` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`equipmentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipmentID`, `serialNumber`, `officeTag`, `equipmentName`, `equipmentBrand`, `active`) VALUES
(1, 'NXMXPSP003543043773400 ', 'adfsg', 'Laptop', 'Acer Aspire E5-473-37XV', 1),
(2, 'NXMXQSP011621034593400', 'fsssssssssas', 'Laptop', 'djdsjd', 1),
(3, 'NXMXQSP011621034593444', 'lekwRE', 'Laptop', 'lkaedas', 1),
(4, '54301727134', 'aa', 'ww', 'ee', 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_logs`
--

CREATE TABLE IF NOT EXISTS `equipment_logs` (
  `logNumber` int(10) NOT NULL AUTO_INCREMENT,
  `serialNumber` varchar(100) NOT NULL,
  `borrowerFirstName` varchar(50) NOT NULL,
  `borrowerLastName` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `site` varchar(150) NOT NULL,
  `quantity` int(5) NOT NULL,
  `status` varchar(10) NOT NULL,
  `verifierID` int(3) NOT NULL,
  PRIMARY KEY (`logNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `verifier`
--

CREATE TABLE IF NOT EXISTS `verifier` (
  `verifierID` int(3) NOT NULL AUTO_INCREMENT,
  `vUsername` varchar(50) NOT NULL,
  `vPassword` varchar(150) NOT NULL,
  `vFirstName` varchar(50) NOT NULL,
  `vLastName` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`verifierID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `verifier`
--

INSERT INTO `verifier` (`verifierID`, `vUsername`, `vPassword`, `vFirstName`, `vLastName`, `active`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'AwesomeOS', 'Admin', 1),
(2, 'karlasison2', 'dba1d50381db809d0b755fab5e3ce89f', 'karla', 'sison', 1),
(3, 'aprilmayjune3', 'de79e08e9c726e89768f38d139c0523c', 'April', 'Mayjune', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
