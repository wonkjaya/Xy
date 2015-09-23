-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2015 at 06:03 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `own_dev_cpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL COMMENT '* tidak boleh ada yang sama',
  `user_pass` varchar(200) NOT NULL,
  `user_level` varchar(3) NOT NULL DEFAULT '10' COMMENT '00:admin;01:developer;03:staf-editor;10:user;',
  `user_registered_date` date NOT NULL,
  `user_activation_key` varchar(200) NOT NULL COMMENT 'bentuk MD5',
  `user_status` tinyint(1) NOT NULL COMMENT '0:nonaktif;1:aktif;2:banned',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `user_email`, `user_pass`, `user_level`, `user_registered_date`, `user_activation_key`, `user_status`) VALUES
(1, 'silviaputri@rezstore.com', '', '10', '2015-09-11', '9cd694074f4dfe5f6d1a6d2dea5c7d91', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE IF NOT EXISTS `user_detail` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ktp_id` varchar(20) NOT NULL,
  `display_name` varchar(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `ktp_address` varchar(100) NOT NULL,
  `domicili_address` varchar(100) NOT NULL,
  `gender` varchar(1) NOT NULL COMMENT 'L/P',
  `private_phonenumber` varchar(14) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `user_id` (`user_id`,`ktp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`ID`, `user_id`, `ktp_id`, `display_name`, `fullname`, `ktp_address`, `domicili_address`, `gender`, `private_phonenumber`) VALUES
(1, 1, '', '', 'rohman ahmad', '', 'jalan ikan piranha', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
