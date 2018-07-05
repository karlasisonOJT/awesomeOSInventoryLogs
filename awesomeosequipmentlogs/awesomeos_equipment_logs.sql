-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2018 at 12:54 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipmentID`, `serialNumber`, `officeTag`, `equipmentName`, `equipmentBrand`, `active`) VALUES
(1, 'LEN243001', 'PT-18', 'Printer', 'Brother MFC L88CDW', 1),
(2, 'NXMXQSP011621034593400', 'LT-190000', 'Laptop', 'Acer Aspire E-5473', 1),
(3, '1537L04148', 'CG- 100', 'Charger', 'Nilobo', 1),
(4, '480010221040', 'M-4500', 'Mouse', 'Genius 1234', 1),
(6, 'NXMXQSP011621034593400', 'LT-190001', 'Acer', 'Acer Aspire E-5473', 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_logs`
--

CREATE TABLE IF NOT EXISTS `equipment_logs` (
  `logNumber` int(10) NOT NULL AUTO_INCREMENT,
  `serialNumber` varchar(100) NOT NULL,
  `officeTag` varchar(100) NOT NULL,
  `borrowerFirstName` varchar(50) NOT NULL,
  `borrowerLastName` varchar(50) NOT NULL,
  `logdate` date NOT NULL,
  `logtime` time NOT NULL,
  `site` varchar(150) NOT NULL,
  `quantity` int(5) NOT NULL,
  `status` varchar(10) NOT NULL,
  `verifierID` int(3) NOT NULL,
  PRIMARY KEY (`logNumber`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `equipment_logs`
--

INSERT INTO `equipment_logs` (`logNumber`, `serialNumber`, `officeTag`, `borrowerFirstName`, `borrowerLastName`, `logdate`, `logtime`, `site`, `quantity`, `status`, `verifierID`) VALUES
(1, 'LEN243001', 'PT-18', 'Tina', 'Moran', '2018-07-05', '20:14:22', 'Landco', 1, 'Deployed', 1),
(2, 'NXMXQSP011621034593400', 'LT-190000', 'Gina', 'Cole', '2018-07-05', '20:14:50', 'Tavera 3F', 1, 'Deployed', 1),
(3, '1537L04148', 'CG- 100', 'Gina', 'Cole', '2018-07-05', '20:19:03', 'Tavera 3F', 1, 'Deployed', 2),
(4, 'NXMXQSP011621034593400', 'LT-190000', 'Jack', 'Cole', '2018-07-06', '00:18:16', 'Landco', 1, 'Pulled Out', 2),
(5, '1537L04148', 'CG- 100', 'Jack', 'Cole', '2018-07-06', '00:18:16', 'Landco', 1, 'Pulled Out', 2),
(6, '480010221040', 'M-4500', 'Bobby', 'Bibobu', '2018-07-06', '00:20:23', 'Landco', 1, 'Deployed', 2);

-- --------------------------------------------------------

--
-- Table structure for table `scanned_equipments`
--

CREATE TABLE IF NOT EXISTS `scanned_equipments` (
  `equipmentID` int(5) NOT NULL AUTO_INCREMENT,
  `vUsername` varchar(50) NOT NULL,
  `serialNumber` varchar(100) NOT NULL,
  `officeTag` varchar(100) NOT NULL,
  `equipmentName` varchar(50) NOT NULL,
  `equipmentBrand` varchar(100) NOT NULL,
  `quantity` int(5) NOT NULL,
  PRIMARY KEY (`equipmentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

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
  `active` int(1) NOT NULL,
  PRIMARY KEY (`verifierID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `verifier`
--

INSERT INTO `verifier` (`verifierID`, `vUsername`, `vPassword`, `vFirstName`, `vLastName`, `active`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'AwesomeOS', 'Admin', 1),
(2, 'karlasison2', 'b52de6a0eff290bb85e471e71ec90a0b', 'Karla', 'Sison', 1),
(3, 'nicholesison3', '996cf3f594f1219cda3e4524854ea48c', 'Nichole', 'Sison', 1),
(4, 'camillesanico4', '0ca54c9b19517c919299ad68c27c537b', 'Camille', 'Sanico', 1),
(5, 'aljohnbajao5', '60ec5050008b2a01b237bbf1c2914084', 'Aljohn', 'Bajao', 1),
(6, 'iacamelleperalta6', 'b1d71b314220a16de05eb5b84ce900c4', 'IaCamelle', 'Peralta', 1),
(7, 'aracorsiga7', '2d11ac433cc6ee14669e0cac71026a5c', 'Ara', 'Corsiga', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
