-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2017 at 06:07 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rg`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_sent`
--

CREATE TABLE IF NOT EXISTS `email_sent` (
`email_sent_id` int(11) NOT NULL,
  `sent_to` varchar(255) NOT NULL,
  `sent_date` date NOT NULL DEFAULT '0000-00-00',
  `status` enum('Success','Failed') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emergency_info`
--

CREATE TABLE IF NOT EXISTS `emergency_info` (
`emergency_id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `contact_address` varchar(255) DEFAULT NULL,
  `relation` varchar(255) DEFAULT NULL
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
`image_id` int(10) NOT NULL,
  `unqiue_id` varchar(255) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `image_status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
`information_id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `vest_no` varchar(255) NOT NULL,
  `aspirant` varchar(255) DEFAULT NULL,
  `batch` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `st_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `contact_numberinf` varchar(255) NOT NULL,
  `date_added` date DEFAULT '0000-00-00',
  `usertype` enum('aspirant','rg','ban') NOT NULL DEFAULT 'aspirant'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`information_id`, `unique_id`, `vest_no`, `aspirant`, `batch`, `firstname`, `lastname`, `middlename`, `birthday`, `st_address`, `city`, `contact_numberinf`, `date_added`, `usertype`) VALUES
(2, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', '3618', '394', 23, 'Alex', 'Alindayu', '', '1995-02-11', '#9 mangga rd z-1 north signal village', 'taguig', '09396154921', '2017-06-03', 'aspirant');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(10) unsigned NOT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `forgot_password` varchar(255) DEFAULT NULL,
  `usertype` enum('1','2','3') DEFAULT '3',
  `status` enum('Active','Pending','Ban') DEFAULT NULL,
  `is_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `userdata_session`
--

CREATE TABLE IF NOT EXISTS `userdata_session` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(255) NOT NULL DEFAULT '0',
  `user_agent` varchar(255) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata_session`
--

INSERT INTO `userdata_session` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('389b57039bb4995bc73be987298acd2c', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 1496419332, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_sent`
--
ALTER TABLE `email_sent`
 ADD PRIMARY KEY (`email_sent_id`);

--
-- Indexes for table `emergency_info`
--
ALTER TABLE `emergency_info`
 ADD PRIMARY KEY (`emergency_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
 ADD PRIMARY KEY (`information_id`), ADD UNIQUE KEY `vest_no` (`vest_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `userdata_session`
--
ALTER TABLE `userdata_session`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_sent`
--
ALTER TABLE `email_sent`
MODIFY `email_sent_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emergency_info`
--
ALTER TABLE `emergency_info`
MODIFY `emergency_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `image_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
MODIFY `information_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
