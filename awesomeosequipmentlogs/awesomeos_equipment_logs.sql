-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 26, 2018 at 06:00 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `awesomeos_equipment_logs`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `equipmentID` int(5) NOT NULL AUTO_INCREMENT,
  `serialNumber` varchar(100) NOT NULL,
  `officeTag` varchar(100) NOT NULL,
  `equipmentName` varchar(50) NOT NULL,
  `equipmentBrand` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`equipmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipmentID`, `serialNumber`, `officeTag`, `equipmentName`, `equipmentBrand`, `active`) VALUES
(1, 'NXMXPSP003543043773400 ', 'adfsg', 'Laptop', 'Acer Aspire E5-473-37XV', 1),
(2, 'NXMXQSP011621034593400', 'fsssssssssas', 'Laptop', 'djdsjd', 1),
(3, 'NXMXQSP011621034593444', 'lekwRE', 'Laptop', 'lkaedas', 1),
(4, '54301727134', 'aa', 'ww', 'ee', 1),
(5, '480010221040', 'ghiepoqee', 'just another paper', 'paper', 1),
(9, '480010221049', 'ewrew', 'just another paper', 'paper', 1),
(11, '480010221040', 'ghiepoqeo', 'kasks', 'kjskfd', 1),
(12, 'TX1217000348', 'PS-0001', 'Power Supply', 'Intertek', 1),
(13, 'R032030H00020', 'PWC-0001', 'Power Cord', 'Ganeric', 1),
(14, '2029103129959', 'SCNR-1000', 'Barcode Scanner', 'FuzzyScan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_logs`
--

DROP TABLE IF EXISTS `equipment_logs`;
CREATE TABLE IF NOT EXISTS `equipment_logs` (
  `logNumber` int(10) NOT NULL AUTO_INCREMENT,
  `serialNumber` varchar(100) NOT NULL,
  `officeTag` varchar(100) NOT NULL,
  `borrowerFirstName` varchar(50) NOT NULL,
  `borrowerLastName` varchar(50) NOT NULL,
  `logdate` varchar(20) NOT NULL,
  `logtime` varchar(10) NOT NULL,
  `site` varchar(150) NOT NULL,
  `quantity` int(5) NOT NULL,
  `status` varchar(10) NOT NULL,
  `verifierID` int(3) NOT NULL,
  PRIMARY KEY (`logNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment_logs`
--

INSERT INTO `equipment_logs` (`logNumber`, `serialNumber`, `officeTag`, `borrowerFirstName`, `borrowerLastName`, `logdate`, `logtime`, `site`, `quantity`, `status`, `verifierID`) VALUES
(1, 'NXMXPSP003543043773400 ', 'adfsg', 'lilili', 'jsadkajs', 'July 2, 2018', '9:17 PM', 'Landco', 1, '2', 2),
(2, 'NXMXQSP011621034593400', 'fsssssssssas', 'lilili', 'jsadkajs', 'July 2, 2018', '9:17 PM', 'Landco', 1, '2', 2),
(3, 'NXMXQSP011621034593400', 'fsssssssssas', 'lilili', 'jsadkajs', 'July 2, 2018', '9:17 PM', 'Landco', 1, '2', 2),
(4, 'NXMXQSP011621034593400', 'fsssssssssas', 'lilili', 'jsadkajs', 'July 2, 2018', '9:17 PM', 'Landco', 10, '2', 2),
(5, '54301727134', 'aa', 'tina', 'moran', 'July 2, 2018', '9:20 PM', 'Araullo', 1, '1', 4),
(6, '54301727134', 'aa', 'tina', 'moran', 'July 2, 2018', '9:20 PM', 'Araullo', 1, '1', 4),
(7, '54301727134', 'aa', 'tina', 'moran', 'July 2, 2018', '9:21 PM', 'Araullo', 1, '1', 4),
(8, '54301727134', 'aa', 'tina', 'moran', 'July 2, 2018', '9:21 PM', 'Araullo', 1, '1', 4),
(9, 'NXMXQSP011621034593400', 'fsssssssssas', 'bob', 'uy', 'July 2, 2018', '9:22 PM', 'Landco', 1, '2', 2),
(10, 'NXMXQSP011621034593444', 'lekwRE', 'bob', 'uy', 'July 2, 2018', '9:22 PM', 'Landco', 2, '2', 2),
(11, '480010221040', 'ghiepoqee', 'Jack', 'Cole', 'July 3, 2018', '8:19 PM', 'MTS 4', 2, '1', 1),
(12, '480010221040', 'ghiepoqee', 'Jack', 'Cole', 'July 3, 2018', '8:19 PM', 'MTS 4', 2, '1', 1),
(13, 'NXMXQSP011621034593444', 'lekwRE', 'Jack', 'Cole', 'July 3, 2018', '8:19 PM', 'MTS 4', 1, '1', 1),
(14, '480010221040', 'ghiepoqeo', 'Amore', 'eroma', '2018-07-13', '18:32:22', 'MTS 4', 1, 'Pulled Out', 1),
(15, '480010221040', 'ghiepoqee', 'Amore', 'eroma', '2018-07-13', '18:32:22', 'MTS 4', 1, 'Pulled Out', 1),
(16, 'NXMXQSP011621034593400', 'fsssssssssas', 'Amore', 'eroma', '2018-07-13', '18:32:22', 'MTS 4', 2, 'Pulled Out', 1),
(17, 'NXMXPSP003543043773400 ', 'adfsg', 'Amore', 'eroma', '2018-07-13', '18:32:22', 'MTS 4', 5, 'Pulled Out', 1),
(18, '480010221040', 'ghiepoqee', 'Camille', 'Sanico', '2018-07-16', '6:36:54', 'Hai 3F', 1, 'Deployed', 1),
(19, '480010221040', 'ghiepoqeo', 'Camille', 'Sanico', '2018-07-16', '6:36:54', 'Hai 3F', 1, 'Deployed', 1),
(20, '480010221040', 'ghiepoqee', 'Amore', 'Sanico', '2018-07-16', '22:13:28', 'Araullo', 4, 'Deployed', 1),
(21, 'NXMXQSP011621034593400', 'fsssssssssas', 'Amore', 'Sanico', '2018-07-16', '22:13:28', 'Araullo', 10, 'Deployed', 1),
(22, 'NXMXPSP003543043773400 ', 'adfsg', 'Marjune', 'Soyosa', '2018-07-17', '2:46:48', 'MTS 4', 1, 'Pulled Out', 1),
(23, '480010221040', 'ghiepoqeo', 'Marjune', 'Soyosa', '2018-07-17', '2:50:07', 'MTS 4', 1, 'Pulled Out', 1),
(24, '480010221040', 'ghiepoqee', 'Marjune', 'Soyosa', '2018-07-17', '2:50:16', 'MTS 4', 1, 'Pulled Out', 1),
(25, 'NXMXQSP011621034593400', 'fsssssssssas', 'Marjune', 'Soyosa', '2018-07-17', '2:50:23', 'MTS 4', 1, 'Pulled Out', 1),
(26, '480010221040', 'ghiepoqee', 'mae-ann', 'mama', '2018-07-23', '13:13:00', 'Araullo', 1, 'Pulled Out', 1),
(27, 'NXMXPSP003543043773400 ', 'adfsg', 'Marionne Andrew', 'Bengullo', '2018-07-24', '8:51:30', 'Tavera 6F', 1, 'Pulled Out', 1),
(28, '480010221040', 'ghiepoqeo', 'Marionne Andrew', 'Bengullo', '2018-07-24', '8:51:30', 'Tavera 6F', 1, 'Pulled Out', 1),
(29, '480010221040', 'ghiepoqeo', 'Tang', 'Inamo', '2018-07-25', '14:59:23', 'Hai 2F', 1, 'Deployed', 1),
(30, 'NXMXQSP011621034593400', 'fsssssssssas', 'Tang', 'Inamo', '2018-07-25', '14:59:23', 'Hai 2F', 1, 'Deployed', 1),
(31, 'NXMXPSP003543043773400 ', 'adfsg', 'Tang', 'Inamo', '2018-07-25', '14:59:23', 'Hai 2F', 1, 'Deployed', 1),
(32, 'TX1217000348', 'PS-0001', 'Tang', 'Inamo', '2018-07-25', '14:59:23', 'Hai 2F', 1, 'Deployed', 1),
(33, 'R032030H00020', 'PWC-0001', 'Tang', 'Inamo', '2018-07-25', '14:59:23', 'Hai 2F', 1, 'Deployed', 1),
(34, 'NXMXQSP011621034593444', 'lekwRE', 'Tang', 'Inamo', '2018-07-25', '14:59:23', 'Hai 2F', 1, 'Deployed', 1),
(35, '480010221040', 'ghiepoqee', 'Tang', 'Inamo', '2018-07-25', '15:01:02', 'Hai 2F', 1, 'Deployed', 1),
(36, '480010221040', 'ghiepoqee', 'Tang', 'Inamo', '2018-07-25', '15:01:10', 'Hai 2F', 1, 'Deployed', 1),
(37, '480010221040', 'ghiepoqee', 'Tang', 'Inamo', '2018-07-25', '15:01:16', 'Hai 2F', 1, 'Deployed', 1),
(38, '480010221040', 'ghiepoqee', 'Tang', 'Inamo', '2018-07-25', '15:01:25', 'Hai 2F', 1, 'Deployed', 1),
(39, '480010221040', 'ghiepoqee', 'athena', 'leonard', '2018-07-25', '15:06:50', 'Araullo', 1, 'Deployed', 1),
(40, 'NXMXQSP011621034593400', 'fsssssssssas', 'athena', 'leonard', '2018-07-25', '15:06:50', 'Araullo', 1, 'Deployed', 1),
(41, '480010221040', 'ghiepoqee', 'athena', 'leonard', '2018-07-25', '15:06:54', 'Araullo', 1, 'Deployed', 1),
(42, '480010221040', 'ghiepoqee', 'athena', 'leonard', '2018-07-25', '15:06:59', 'Araullo', 1, 'Deployed', 1),
(43, '480010221040', 'ghiepoqee', 'athena', 'leonard', '2018-07-25', '15:09:39', 'Araullo', 1, 'Deployed', 1),
(44, '480010221040', 'ghiepoqee', 'athena', 'leonard', '2018-07-25', '15:10:37', 'Araullo', 1, 'Deployed', 1),
(45, '480010221040', 'ghiepoqee', 'Camille', 'Ben', '2018-07-25', '15:13:43', 'Landco', 1, 'Deployed', 1),
(46, 'NXMXQSP011621034593400', 'fsssssssssas', 'Camille', 'Ben', '2018-07-25', '15:13:43', 'Landco', 1, 'Deployed', 1),
(47, 'TX1217000348', 'PS-0001', 'Camille', 'Ben', '2018-07-25', '15:13:43', 'Landco', 1, 'Deployed', 1),
(48, '480010221040', 'ghiepoqeo', 'Camille', 'Ben', '2018-07-25', '15:13:43', 'Landco', 1, 'Deployed', 1),
(49, 'NXMXPSP003543043773400 ', 'adfsg', 'Camille', 'Ben', '2018-07-25', '15:13:43', 'Landco', 1, 'Deployed', 1),
(50, '480010221040', 'ghiepoqee', 'Camille', 'Ben', '2018-07-25', '15:13:50', 'Landco', 1, 'Deployed', 1),
(51, '480010221040', 'ghiepoqee', 'fides', 'bengullo', '2018-07-25', '15:16:35', 'Landco', 1, 'Deployed', 1),
(52, '480010221040', 'ghiepoqeo', 'fides', 'bengullo', '2018-07-25', '15:16:35', 'Landco', 1, 'Deployed', 1),
(53, '480010221040', 'ghiepoqee', 'aning', 'aning', '2018-07-25', '15:18:43', 'Landco', 1, 'Deployed', 1),
(54, '480010221040', 'ghiepoqee', 'gai', 'gai', '2018-07-25', '15:21:25', 'Araullo', 1, 'Deployed', 1),
(55, '480010221040', 'ghiepoqee', 'gai', 'gai', '2018-07-25', '15:21:35', 'Araullo', 1, 'Deployed', 1),
(56, '480010221040', 'ghiepoqee', 'gai', 'gai', '2018-07-25', '15:24:36', 'Araullo', 1, 'Deployed', 1),
(57, '480010221040', 'ghiepoqee', 'gai', 'gai', '2018-07-25', '15:26:38', 'Araullo', 1, 'Deployed', 1),
(58, '480010221040', 'ghiepoqee', 'gai', 'gai', '2018-07-25', '15:30:09', 'Araullo', 1, 'Deployed', 1),
(59, '480010221040', 'ghiepoqee', 'h', 'h', '2018-07-25', '15:32:49', 'Araullo', 1, 'Deployed', 1),
(60, '480010221040', 'ghiepoqee', 'Marjune', '1', '2018-07-25', '15:39:45', 'Araullo', 1, 'Pulled Out', 1),
(61, 'NXMXQSP011621034593400', 'fsssssssssas', '1', '1', '2018-07-25', '15:43:22', 'Araullo', 1, 'Deployed', 1),
(62, '480010221040', 'ghiepoqee', '1', '1', '2018-07-25', '15:43:22', 'Araullo', 1, 'Deployed', 1),
(63, '480010221040', 'ghiepoqeo', '1', '1', '2018-07-25', '15:43:22', 'Araullo', 1, 'Deployed', 1),
(64, 'TX1217000348', 'PS-0001', '1', '1', '2018-07-25', '15:43:22', 'Araullo', 1, 'Deployed', 1),
(65, 'NXMXPSP003543043773400 ', 'adfsg', 'Amore', 'q', '2018-07-25', '16:22:55', 'Landco', 1, 'Deployed', 1),
(66, 'NXMXQSP011621034593400', 'fsssssssssas', 'Amore', 'q', '2018-07-25', '16:22:55', 'Landco', 1, 'Deployed', 1),
(67, 'NXMXPSP003543043773400 ', 'adfsg', 'aa', '33', '2018-07-25', '17:11:39', 'Tavera 3F', 1, 'Pulled Out', 1),
(68, '480010221040', 'ghiepoqee', 'aa', '33', '2018-07-25', '17:11:39', 'Tavera 3F', 1, 'Pulled Out', 1),
(69, 'NXMXQSP011621034593444', 'lekwRE', 'aa', '33', '2018-07-25', '17:11:39', 'Tavera 3F', 1, 'Pulled Out', 1),
(70, 'TX1217000348', 'PS-0001', 'aa', '33', '2018-07-25', '17:11:39', 'Tavera 3F', 1, 'Pulled Out', 1),
(71, 'R032030H00020', 'PWC-0001', 'Marjune', '1', '2018-07-25', '17:24:39', 'Araullo', 1, 'Pulled Out', 1),
(72, 'NXMXQSP011621034593400', 'fsssssssssas', 'Marjune', '1', '2018-07-25', '17:24:39', 'Araullo', 1, 'Pulled Out', 1),
(73, '480010221040', 'ghiepoqee', 'Marjune', '1', '2018-07-25', '17:24:39', 'Araullo', 1, 'Pulled Out', 1),
(74, 'NXMXQSP011621034593444', 'lekwRE', 'Marjune', '1', '2018-07-25', '17:24:39', 'Araullo', 1, 'Pulled Out', 1),
(75, '2029103129959', 'SCNR-1000', 'Karla', 'Siosn', '2018-07-26', '16:26:18', 'Araullo', 1, 'Deployed', 1),
(76, '2029103129959', 'SCNR-1000', 'Amore', 'sss', '2018-07-26', '17:47:19', 'Landco', 1, 'Pulled Out', 2);

-- --------------------------------------------------------

--
-- Table structure for table `scanned_equipments`
--

DROP TABLE IF EXISTS `scanned_equipments`;
CREATE TABLE IF NOT EXISTS `scanned_equipments` (
  `equipmentID` int(5) NOT NULL AUTO_INCREMENT,
  `vUsername` varchar(50) NOT NULL,
  `serialNumber` varchar(100) NOT NULL,
  `officeTag` varchar(100) NOT NULL,
  `equipmentName` varchar(50) NOT NULL,
  `equipmentBrand` varchar(100) NOT NULL,
  `quantity` int(5) NOT NULL,
  PRIMARY KEY (`equipmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `verifier`
--

DROP TABLE IF EXISTS `verifier`;
CREATE TABLE IF NOT EXISTS `verifier` (
  `verifierID` int(3) NOT NULL AUTO_INCREMENT,
  `vUsername` varchar(50) NOT NULL,
  `vPassword` varchar(150) NOT NULL,
  `vFirstName` varchar(50) NOT NULL,
  `vLastName` varchar(50) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`verifierID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verifier`
--

INSERT INTO `verifier` (`verifierID`, `vUsername`, `vPassword`, `vFirstName`, `vLastName`, `active`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'AwesomeOS', 'Admin', 1),
(2, 'karlasison2', 'dba1d50381db809d0b755fab5e3ce89f', 'Karla', 'Sison', 1),
(3, 'nicholesison3', '996cf3f594f1219cda3e4524854ea48c', 'Nichole', 'Sison', 1),
(4, 'camillesanico4', '0ca54c9b19517c919299ad68c27c537b', 'Camille', 'Sanico', 1),
(5, 'aljohnbajao5', '60ec5050008b2a01b237bbf1c2914084', 'Aljohn', 'Bajao', 1),
(6, 'iacamelleperalta6', 'b1d71b314220a16de05eb5b84ce900c4', 'IaCamelle', 'Peralta', 1),
(7, 'aracorsiga7', 'f7cb220555e699e70f0cd4430182d041', 'Ara', 'Corsiga', 2),
(8, 'admin sarrahgellecancia8', '26eadfdeb789f452864bf762d0122098', 'Admin Sarrah', 'Gellecancia', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
