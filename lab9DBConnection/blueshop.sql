-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2015 at 06:52 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blueshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `ord_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`tid`, `ord_id`, `pid`, `quantity`) VALUES
(1, 1, 2, 2),
(2, 1, 3, 5),
(3, 1, 4, 1),
(4, 2, 1, 2),
(5, 2, 3, 4),
(6, 2, 4, 3),
(7, 3, 2, 3),
(8, 3, 4, 5),
(9, 4, 1, 5),
(10, 4, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`username`, `password`, `name`, `address`, `mobile`, `email`) VALUES
('somsak', '1899', 'สมศักดิ์ สุรเสถียร', '174 ถ.มิตรภาพ จ.ขอนแก่น', '', 'somsak@gmail.com'),
('baramee', 'aafff1', 'บารมี บุญหลาย', '123 ถ.วิภาวดีรังสิต กรุงเทพฯ', '08-9446-9955', 'baramee@gmail.com'),
('metasit', 'm345', 'เมธาสิทธิ์ สอนสั่ง', '98/9 ถ.ศรีจันทร์ จ.ขอนแก่น', '08-4456-9877', 'metasit@outlook.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `ord_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `ord_date` datetime NOT NULL,
  `status` enum('wait','pay','send','cancel') NOT NULL,
  PRIMARY KEY (`ord_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `username`, `ord_date`, `status`) VALUES
(1, 'baramee', '2013-07-16 23:25:14', 'wait'),
(2, 'metasit', '2013-02-12 23:25:40', 'pay'),
(3, 'baramee', '2013-12-27 23:26:44', 'send'),
(4, 'metasit', '2013-12-11 23:27:11', 'pay');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `pid` int(13) NOT NULL AUTO_INCREMENT,
  `pname` varchar(255) NOT NULL,
  `pdetail` text NOT NULL,
  `price` int(4) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `pdetail`, `price`) VALUES
(1, 'Centrum', 'วิตามินรวมจาก A ถึง Zinc', 350),
(2, 'Caltrate', 'บำรุงกระดูก เสริมวิตามินดี', 760),
(3, 'Ester-C', 'วิตามินซี 500 mg ไม่กัดกระเพาะ', 500),
(4, 'Glucosamine', 'บำรุงข้อต่อ ป้องกันข้อเสื่อม', 1200);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
