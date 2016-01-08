-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2016 at 10:33 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dev_cpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `ID` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `kode_type` varchar(3) NOT NULL COMMENT 'mengambil di log_type',
  `id_user` int(11) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `user_agent` varchar(200) NOT NULL,
  `status` int(3) NOT NULL COMMENT '100:error;111:sukses',
  `keterangan` tinytext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`ID`, `time`, `kode_type`, `id_user`, `ip_address`, `user_agent`, `status`, `keterangan`) VALUES
(1, '2015-09-24 08:22:00', '200', 2, '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.125 Safari/537.36', 111, 'Sukses Login'),
(2, '2015-09-24 02:50:14', '200', 2, '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.125 Safari/537.36', 111, 'Sukses Login'),
(3, '2015-09-24 03:16:20', '200', 2, '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.125 Safari/537.36', 100, 'Gagal Login'),
(4, '2015-09-24 03:20:47', '200', 2, '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.125 Safari/537.36', 111, 'Sukses Login'),
(5, '2015-09-24 03:43:13', '200', 2, '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.125 Safari/537.36', 100, 'Gagal Login'),
(6, '2015-09-24 03:43:24', '200', 2, '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.125 Safari/537.36', 111, 'Sukses Login'),
(7, '2015-09-25 01:35:24', '200', 2, '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.125 Safari/537.36', 111, 'Sukses Login'),
(8, '2015-09-26 12:05:21', '200', 2, '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.125 Safari/537.36', 111, 'Sukses Login'),
(9, '2015-09-26 11:49:48', '200', 2, '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.125 Safari/537.36', 111, 'Sukses Login'),
(10, '2015-12-18 02:57:55', '200', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36', 100, 'Gagal Login'),
(11, '2015-12-18 02:58:35', '200', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36', 111, 'Sukses Login'),
(12, '2015-12-29 02:43:17', '200', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36', 111, 'Sukses Login');

-- --------------------------------------------------------

--
-- Table structure for table `log_type`
--

CREATE TABLE IF NOT EXISTS `log_type` (
  `ID` int(11) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `nama_type` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_type`
--

INSERT INTO `log_type` (`ID`, `kode`, `nama_type`) VALUES
(1, '100', 'aktivitas'),
(2, '200', 'login');

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE IF NOT EXISTS `metas` (
  `ID` int(11) NOT NULL,
  `meta_name` varchar(50) NOT NULL,
  `meta_tag` varchar(100) NOT NULL,
  `meta_description` varchar(160) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metas`
--

INSERT INTO `metas` (`ID`, `meta_name`, `meta_tag`, `meta_description`) VALUES
(1, 'hello', 'woyy', 'oke');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_code` char(10) NOT NULL,
  `nama` char(30) NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `price_beli` int(11) NOT NULL,
  `price_jual` int(11) NOT NULL,
  `discount` tinyint(4) NOT NULL,
  `description` text NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE IF NOT EXISTS `product_categories` (
  `ID` int(11) NOT NULL,
  `name` char(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE IF NOT EXISTS `product_images` (
  `ID` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image1` tinytext NOT NULL,
  `image2` tinytext NOT NULL,
  `image3` tinytext NOT NULL,
  `image4` tinytext NOT NULL,
  `image5` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_info`
--

CREATE TABLE IF NOT EXISTS `service_info` (
  `ID` int(11) NOT NULL,
  `no_telp_1` varchar(14) NOT NULL,
  `no_telp_2` varchar(14) NOT NULL,
  `bbm_1` varchar(8) NOT NULL,
  `bbm_2` varchar(8) NOT NULL,
  `whatsapp_1` varchar(14) NOT NULL,
  `whatsapp_2` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `other_services` text NOT NULL COMMENT 'json file'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_info`
--

INSERT INTO `service_info` (`ID`, `no_telp_1`, `no_telp_2`, `bbm_1`, `bbm_2`, `whatsapp_1`, `whatsapp_2`, `email`, `other_services`) VALUES
(1, '089111111', '089222222', 'GH44RS', 'T4321ES', '089444444', '089433333', 'admin@adm.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE IF NOT EXISTS `social_media` (
  `ID` int(11) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `googleplus` varchar(200) NOT NULL,
  `tumblr` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`ID`, `facebook`, `twitter`, `googleplus`, `tumblr`) VALUES
(1, 'facebook.com/rohmanahmad', 'twitter.com/rohmanahmad', 'gplus.com/rohmanahmad', 'tumblr.com/rohmanahmad'),
(2, 'facebook.com/admin', 'twitter.com/admin', 'gplus.com/admn', 'tumblr.com/admin');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE IF NOT EXISTS `stores` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'satu store satu akun',
  `store_cat_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `sosmed_id` int(11) NOT NULL,
  `meta_id` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '100' COMMENT '100:nonaktif;111:aktif'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`ID`, `user_id`, `store_cat_id`, `service_id`, `sosmed_id`, `meta_id`, `status`) VALUES
(1, 2, 2, 1, 2, 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `store_categories`
--

CREATE TABLE IF NOT EXISTS `store_categories` (
  `ID` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_categories`
--

INSERT INTO `store_categories` (`ID`, `category_name`, `status`) VALUES
(1, 'Electronics', 1),
(2, 'Computers & Accesorries', 1);

-- --------------------------------------------------------

--
-- Table structure for table `store_preferences`
--

CREATE TABLE IF NOT EXISTS `store_preferences` (
  `ID` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `store_name` varchar(30) NOT NULL,
  `store_tag_title` varchar(100) NOT NULL,
  `store_address` varchar(200) NOT NULL,
  `store_description` tinytext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_preferences`
--

INSERT INTO `store_preferences` (`ID`, `store_id`, `store_name`, `store_tag_title`, `store_address`, `store_description`) VALUES
(1, 1, 'toko admin', 'ini tag saya', 'jalan ikan gurami perum litle kyoto', 'ini description');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL COMMENT '* tidak boleh ada yang sama',
  `user_pass` varchar(200) NOT NULL,
  `user_level` varchar(3) NOT NULL DEFAULT '10' COMMENT '00:admin;01:developer;03:staf-editor;10:user;',
  `user_registered_date` date NOT NULL,
  `user_activation_key` varchar(200) NOT NULL COMMENT 'bentuk MD5',
  `user_status` tinyint(1) NOT NULL COMMENT '0:nonaktif;1:aktif;2:banned'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `user_email`, `user_pass`, `user_level`, `user_registered_date`, `user_activation_key`, `user_status`) VALUES
(1, 'admin@rezstore.com', '', '10', '0000-00-00', 'bf45dbf2ac4b62cd1a045ac6db867846', 0),
(2, 'admin@adm.com', '21232f297a57a5a743894a0e4a801fc3', '10', '2015-09-22', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE IF NOT EXISTS `user_detail` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ktp_id` varchar(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(1) NOT NULL COMMENT 'L/P',
  `phonenumber` varchar(14) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`ID`, `user_id`, `ktp_id`, `fullname`, `address`, `gender`, `phonenumber`) VALUES
(1, 1, '', 'rohmanahmad', 'jalan simpang sulfat utara', '', '0896887888'),
(2, 2, '88888888888888888888', 'admin', 'jalan simpang sulfat utara', '1', '089776554330');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `log_type`
--
ALTER TABLE `log_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `kode_product` (`product_code`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `service_info`
--
ALTER TABLE `service_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `store_categories`
--
ALTER TABLE `store_categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `store_preferences`
--
ALTER TABLE `store_preferences`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `user_id` (`user_id`,`ktp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `log_type`
--
ALTER TABLE `log_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service_info`
--
ALTER TABLE `service_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `store_categories`
--
ALTER TABLE `store_categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `store_preferences`
--
ALTER TABLE `store_preferences`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
