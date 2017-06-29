-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2017 at 11:13 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `rg`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_sent`
--

CREATE TABLE IF NOT EXISTS `email_sent` (
  `email_sent_id` int(11) NOT NULL AUTO_INCREMENT,
  `sent_to` varchar(255) NOT NULL,
  `sent_date` date NOT NULL DEFAULT '0000-00-00',
  `status` enum('Success','Failed') NOT NULL,
  PRIMARY KEY (`email_sent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emergency_info`
--

CREATE TABLE IF NOT EXISTS `emergency_info` (
  `emergency_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(255) NOT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `contact_address` varchar(255) DEFAULT NULL,
  `relation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`emergency_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emergency_info`
--

INSERT INTO `emergency_info` (`emergency_id`, `unique_id`, `contact_name`, `contact_number`, `contact_address`, `relation`) VALUES
(1, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Marissa Alindayu', '09233338943', '#9 mangga rd z-1 north signal village taguig city', 'Mother');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(10) NOT NULL AUTO_INCREMENT,
  `unqiue_id` varchar(255) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `image_status` enum('Active','Inactive') DEFAULT 'Active',
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `information_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(255) NOT NULL,
  `vest_no` varchar(255) NOT NULL,
  `aspirant` varchar(255) DEFAULT NULL,
  `batch` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `bloodtype` varchar(255) NOT NULL,
  `st_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `sector` int(11) NOT NULL,
  `contact_numberinf` varchar(255) NOT NULL,
  `date_added` date DEFAULT '0000-00-00',
  `usertype` enum('aspirant','rg','ban') NOT NULL DEFAULT 'aspirant',
  PRIMARY KEY (`information_id`),
  UNIQUE KEY `vest_no` (`vest_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`information_id`, `unique_id`, `vest_no`, `aspirant`, `batch`, `firstname`, `lastname`, `middlename`, `birthday`, `bloodtype`, `st_address`, `city`, `sector`, `contact_numberinf`, `date_added`, `usertype`) VALUES
(2, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', '3618', '394', 23, 'Alex', 'Alindayu', '', '1995-02-11', 'A-positive', '#9 mangga rd z-1 north signal village', 'taguig', 3, '09396154921', '2017-06-28', 'rg');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `logs_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`logs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logs_id`, `unique_id`, `message`, `date_created`) VALUES
(1, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'The User 6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9 Is logout', '2017-06-29 17:00:13'),
(2, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-06-29 17:10:15'),
(3, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is logout', '2017-06-29 17:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `motor_info`
--

CREATE TABLE IF NOT EXISTS `motor_info` (
  `motor_id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(255) NOT NULL,
  `owners_name` varchar(255) NOT NULL,
  `owner_address` varchar(255) NOT NULL,
  `plate_no` varchar(255) NOT NULL,
  `engine_no` varchar(255) NOT NULL,
  `chassis_no` varchar(255) NOT NULL,
  `year_model` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `series_type` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`motor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE IF NOT EXISTS `sectors` (
  `sector_id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_name` varchar(255) NOT NULL,
  PRIMARY KEY (`sector_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`sector_id`, `sector_name`) VALUES
(1, 'RGEN NCR NORTH (Caloocan / Malabon / Navotas / \nValenzuela)'),
(2, 'RGEN NCR SOUTH  (Las Pinas / Paranaque / Muntinlupa /\nPasay / Makati)'),
(3, 'RGEN NCR EAST (Marikina / Pasig / Taguig / Pateros)'),
(4, 'RGEN NCR WEST (Manila)'),
(5, 'RGEN NCR CENTRAL (San Juan / Mandaluyong / Quezon City)'),
(6, 'RGEN REGION 1 (Ilocos Norte / Ilocos Sur / La Union / \nPangasinan)'),
(7, 'RGEN REGION 2 (Batanes / Cagayan / Isabela / \nNueva Vizcaya / Quirino)'),
(8, 'RGEN CAR ( Abra / Apayao / Benguet / Ifugao / Kalinga\nMountain Province)'),
(9, 'RGEN REGION 3 (Bulacan / Pampanga / Tarlac / Nueva Ecija \nBataan / Zambales)'),
(10, 'RGEN REGION 4A (Cavite / Laguna / Batangas / Rizal /\nQuezon)'),
(11, 'RGEN REGION 4B (Mindoro / Marinduque / Romblon /\nPalawan)'),
(12, 'RGEN REGION 5 (Masbate / Catanduanes / Sorsogon \nAlbay / Camarines Sur / Camarines Norte)');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `forgot_password` varchar(255) DEFAULT NULL,
  `usertype` enum('1','2','3','0') DEFAULT '3',
  `status` enum('Active','Pending','Ban') DEFAULT NULL,
  `is_login` enum('yes','no') DEFAULT NULL,
  `dt_login` varchar(50) DEFAULT NULL,
  `date_registered` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `unique_id`, `username`, `password`, `forgot_password`, `usertype`, `status`, `is_login`, `dt_login`, `date_registered`) VALUES
(1, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', '3618', '48fe1e3200f132e00c2c41f87c921b33e733eab5789beed0242b2769eb2d2d1000c42ba001c8270c445074da0aeef6c200da30037896aaaa4017fc23cf831170', NULL, '0', 'Active', 'no', '1498727579', '2017-06-29 14:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `userdata_session`
--

CREATE TABLE IF NOT EXISTS `userdata_session` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(255) NOT NULL DEFAULT '0',
  `user_agent` varchar(255) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata_session`
--

INSERT INTO `userdata_session` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('819080b13d00a4972027ff1490347e26', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 1498727579, ''),
('b2952d1fabe7283e57f94b6b68fbe99d', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 1498727580, '');
