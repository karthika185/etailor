-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 24, 2021 at 05:51 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etailor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(2) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`) VALUES
(1, 'ADMIN', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_btqreg`
--

DROP TABLE IF EXISTS `tbl_btqreg`;
CREATE TABLE IF NOT EXISTS `tbl_btqreg` (
  `btq_id` int(2) NOT NULL AUTO_INCREMENT,
  `btq_name` varchar(30) NOT NULL,
  `btq_owner` varchar(30) NOT NULL,
  `btq_address` varchar(100) NOT NULL,
  `btq_email` varchar(50) NOT NULL,
  `btq_phone` varchar(10) NOT NULL,
  `btq_lic` varchar(5) NOT NULL,
  `btq_status` varchar(2) NOT NULL,
  PRIMARY KEY (`btq_id`),
  UNIQUE KEY `btq_email` (`btq_email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_btqreg`
--

INSERT INTO `tbl_btqreg` (`btq_id`, `btq_name`, `btq_owner`, `btq_address`, `btq_email`, `btq_phone`, `btq_lic`, `btq_status`) VALUES
(20, 'YAMI', 'YAMIKA', 'YAMIS VILLA,\r\nERNAKULAM', 'karthikasuresh185@gmail.com', '9685412547', 'B001', 'A'),
(22, 'mmm', 'dvjhfkfhv', 'Ammikattu House,\r\nKanjiramattom,\r\nThodupuzha', 'karthikasureshbabu@mca.ajce.in', '9654875236', 'B888', 'A'),
(23, 'MARIYA', 'JESWIN', 'EKM', 'jeswinantony@mca.ajce.in', '9632547852', 'B765', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` int(2) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(10) NOT NULL,
  `cat_status` varchar(10) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_name` (`cat_name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_status`) VALUES
(1, 'Salwar', 'A'),
(2, 'Saree', 'A'),
(3, 'Top', 'A'),
(6, 'Pant', 'A'),
(7, 'Tops', 'A'),
(8, 'Blouse', 'A'),
(12, 'Skirt', 'A'),
(13, 'blouses', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

DROP TABLE IF EXISTS `tbl_color`;
CREATE TABLE IF NOT EXISTS `tbl_color` (
  `col_id` int(5) NOT NULL AUTO_INCREMENT,
  `col_name` varchar(50) NOT NULL,
  `col_code` char(7) NOT NULL,
  `col_status` varchar(2) NOT NULL,
  PRIMARY KEY (`col_id`),
  UNIQUE KEY `col_name` (`col_name`),
  UNIQUE KEY `col_code` (`col_code`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`col_id`, `col_name`, `col_code`, `col_status`) VALUES
(1, 'RED', '#FF0000', 'A'),
(2, 'BLUE', '#0000FF', ''),
(3, 'ORANGE', '#FF6600', 'A'),
(4, 'BLACK', '#000000', 'A'),
(5, 'WHITE', '#FFFFFF', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custreg`
--

DROP TABLE IF EXISTS `tbl_custreg`;
CREATE TABLE IF NOT EXISTS `tbl_custreg` (
  `cust_id` int(2) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(20) NOT NULL,
  `cust_phone` char(10) NOT NULL,
  `cust_email` varchar(30) NOT NULL,
  `cust_address` varchar(100) NOT NULL,
  `cust_status` varchar(2) NOT NULL,
  PRIMARY KEY (`cust_id`),
  UNIQUE KEY `cust_email` (`cust_email`),
  UNIQUE KEY `cust_phone` (`cust_phone`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_custreg`
--

INSERT INTO `tbl_custreg` (`cust_id`, `cust_name`, `cust_phone`, `cust_email`, `cust_address`, `cust_status`) VALUES
(1, 'ROSS', '9857452632', 'ross@gmail.com', 'ROSS\r\nERNAKULAM', 'A'),
(2, 'ANN', '9541235687', 'ann@gmail.com', 'ANN\r\nLondon', 'A'),
(3, 'Christy', '9654785231', 'christy@gmail.com', 'Jozvilla\r\nAlappuzha', 'A'),
(4, 'Preetha', '9061619885', 'preetha@gmail.com', 'Ammikattu House/Kanjiramattom/Thodupuzha\r\nThodupuzha East P O', 'A'),
(5, 'Haripriya', '9452451365', 'hari@gmail.com', 'Ammikattu House/Kanjiramattom/Thodupuzha\r\nThodupuzha East P O', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guest`
--

DROP TABLE IF EXISTS `tbl_guest`;
CREATE TABLE IF NOT EXISTS `tbl_guest` (
  `guest_id` int(2) NOT NULL AUTO_INCREMENT,
  `guest_name` varchar(20) NOT NULL,
  `guest_email` varchar(30) NOT NULL,
  `guest_subject` varchar(20) NOT NULL,
  `guest_message` varchar(500) NOT NULL,
  PRIMARY KEY (`guest_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_guest`
--

INSERT INTO `tbl_guest` (`guest_id`, `guest_name`, `guest_email`, `guest_subject`, `guest_message`) VALUES
(1, 'Karthika', 'karthika@gmail.com', 'Enquiry', 'qwertyuioplkjhgfdsazxcvbnm'),
(2, 'ASHLEY SHAJI', 'ashleyshaji1998@gmail.com', 'Enquiry', 'KAMNJDHHDDIFIF'),
(3, 'ALEX', 'alex@gmail.com', 'Enquiry', 'fghjklyuiopvbn'),
(4, 'ALEX', 'alex@gmail.com', 'Enquiry', 'fghjklyuiopvbn'),
(5, 'DONA', 'dona@gmail.com', 'Offer', 'is there any combo offer'),
(6, 'ANJALI', 'anjali@gmail.com', 'COLOR', 'OLIVE COLOR AVAILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE IF NOT EXISTS `tbl_login` (
  `login_id` int(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` varchar(2) NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`login_id`, `username`, `password`, `usertype`) VALUES
(26, 'admin@gmail.com', 'admin@123', 'A'),
(27, 'karthikasuresh185@gmail.com', '977088', 'B'),
(28, 'karthikasureshbabu@mca.ajce.in', '931002', 'B'),
(29, 'jeswinantony@mca.ajce.in', '718585', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material`
--

DROP TABLE IF EXISTS `tbl_material`;
CREATE TABLE IF NOT EXISTS `tbl_material` (
  `mat_id` int(2) NOT NULL AUTO_INCREMENT,
  `btq_id` int(2) NOT NULL,
  `mat_name` varchar(20) NOT NULL,
  `mat_price` char(10) NOT NULL,
  `mat_color` varchar(50) NOT NULL,
  `mat_status` varchar(2) NOT NULL,
  `mat_pic` varchar(40) NOT NULL,
  PRIMARY KEY (`mat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_material`
--

INSERT INTO `tbl_material` (`mat_id`, `btq_id`, `mat_name`, `mat_price`, `mat_color`, `mat_status`, `mat_pic`) VALUES
(1, 0, 'Devika', '58', '#FF6600,#000000', 'A', 'b124d35de8d1689d646e21ad4e4a6bda.jpg'),
(2, 9, 'rose silk', '12', '#0000FF,#FF6600', 'A', '042e8b1415f48f0fe32dbe18beed844d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

DROP TABLE IF EXISTS `tbl_subcategory`;
CREATE TABLE IF NOT EXISTS `tbl_subcategory` (
  `subcat_id` int(2) NOT NULL AUTO_INCREMENT,
  `cat_id` int(2) NOT NULL,
  `subcat_name` varchar(20) NOT NULL,
  `subcat_pic` varchar(40) NOT NULL,
  `subcat_status` varchar(2) NOT NULL,
  PRIMARY KEY (`subcat_id`),
  UNIQUE KEY `subcat_name` (`subcat_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcat_id`, `cat_id`, `subcat_name`, `subcat_pic`, `subcat_status`) VALUES
(1, 1, 'anarkali125', 'anarkali125.jpg', 'A'),
(2, 6, 'Palazo', 'Palazo.jpg', 'A'),
(3, 7, 'Crop top', 'Crop top.jpg', 'A'),
(4, 1, 'Aline', 'Aline.jpg', 'A');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
