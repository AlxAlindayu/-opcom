-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2017 at 01:25 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `emergency_info`
--

INSERT INTO `emergency_info` (`emergency_id`, `unique_id`, `contact_name`, `contact_number`, `contact_address`, `relation`) VALUES
(1, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'qweqweqwe', 's545645', 'qweqweasdad', 'asdzczxc'),
(2, '412547c17b21fcb80df556f92f2b32a6673778b95bee814c7240d86ddf2fda4e6c2465381f36a2900ae3327157fe4c66f3af29ae4cfff1289ad953f64fa9efbc', 'qweqweqwe', 's545645', 'qweqweasdad', 'asdzczxc');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`information_id`, `unique_id`, `vest_no`, `aspirant`, `batch`, `firstname`, `lastname`, `middlename`, `birthday`, `bloodtype`, `st_address`, `city`, `sector`, `contact_numberinf`, `date_added`, `usertype`) VALUES
(2, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', '3618', '394', 23, 'Alex', 'Alindayu', '', '1995-02-11', 'A-positive', '#9 mangga rd z-1 north signal village', 'taguig', 3, '09396154921', '2017-06-28', 'rg'),
(3, '412547c17b21fcb80df556f92f2b32a6673778b95bee814c7240d86ddf2fda4e6c2465381f36a2900ae3327157fe4c66f3af29ae4cfff1289ad953f64fa9efbc', '1111', NULL, 11, 'Testing', 'Testing', '', '2017-07-29', 'NA', '0000000000', 'Tarzana', 8, '00000000000', '2017-07-04', 'rg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logs_id`, `unique_id`, `message`, `date_created`) VALUES
(1, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'The User 6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9 Is logout', '2017-06-29 17:00:13'),
(2, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-06-29 17:10:15'),
(3, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is logout', '2017-06-29 17:12:59'),
(4, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-06-30 12:22:07'),
(5, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-06-30 16:11:43'),
(6, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 11:15:47'),
(7, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 15:39:29'),
(8, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 16:45:47'),
(9, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 16:51:13'),
(10, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 16:56:27'),
(11, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 17:01:55'),
(12, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 17:07:35'),
(13, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 17:14:11'),
(14, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 17:19:18'),
(15, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 17:25:07'),
(16, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 17:30:14'),
(17, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 17:35:33'),
(18, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 17:36:22'),
(19, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Pending <br />\r\n            with usertype :0 \r\n             ', '2017-07-04 18:19:28'),
(20, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Pending <br />\r\n            with usertype :0 \r\n             ', '2017-07-04 18:20:31'),
(21, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Active <br />\r\n             with usertype :0 \r\n             ', '2017-07-04 18:26:26'),
(22, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Pending <br />\r\n            with usertype :0 \r\n             ', '2017-07-04 18:26:45'),
(23, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Active <br />\r\n             with usertype :0 \r\n             ', '2017-07-04 18:26:48'),
(24, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 18:29:53'),
(25, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Pending <br />\r\n            with usertype :0 \r\n             ', '2017-07-04 18:30:02'),
(26, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Register Vest No. : 1111 Firstname : Testing Lastname : Testing', '2017-07-04 18:31:27'),
(27, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Pending <br />\r\n            with usertype :0 \r\n             ', '2017-07-04 18:33:44'),
(28, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Active <br />\r\n             with usertype :0 \r\n             ', '2017-07-04 18:34:07'),
(29, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Modify Vest No. : 1111 With Unique ID :412547c17b21fcb80df556f92f2b32a6673778b95bee814c7240d86ddf2fda4e6c2465381f36a2900ae3327157fe4c66f3af29ae4cfff1289ad953f64fa9efbc', '2017-07-04 18:34:36'),
(30, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Modify Vest No. : 1111 With Unique ID :412547c17b21fcb80df556f92f2b32a6673778b95bee814c7240d86ddf2fda4e6c2465381f36a2900ae3327157fe4c66f3af29ae4cfff1289ad953f64fa9efbc', '2017-07-04 18:35:29'),
(31, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 18:36:47'),
(32, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Pending <br />\r\n            with usertype :0 \r\n             ', '2017-07-04 18:37:01'),
(33, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Active <br />\r\n             with usertype :0 \r\n             ', '2017-07-04 18:41:21'),
(34, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 18:46:50'),
(35, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Pending <br />\r\n            with usertype :0 \r\n             ', '2017-07-04 18:47:05'),
(36, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Active <br />\r\n             with usertype :0 \r\n             ', '2017-07-04 18:47:32'),
(37, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Ban <br />\r\n            with usertype :0 \r\n             ', '2017-07-04 18:48:08'),
(38, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Pending <br />\r\n            with usertype :0 \r\n             ', '2017-07-04 18:49:09'),
(39, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 18:50:13'),
(40, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Ban <br />\r\n            with usertype :0 \r\n             ', '2017-07-04 18:51:16'),
(41, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Active <br />\r\n             with usertype :0 \r\n             ', '2017-07-04 18:51:38'),
(42, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 18:52:45'),
(43, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 18:53:03'),
(44, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Pending <br />\r\n            with usertype :0 \r\n             ', '2017-07-04 18:53:18'),
(45, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Active <br />\r\n             with usertype :0 \r\n             ', '2017-07-04 18:53:23'),
(46, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 18:55:03'),
(47, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is logout', '2017-07-04 19:00:40'),
(48, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 19:01:46'),
(49, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is logout', '2017-07-04 19:02:09'),
(50, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-04 19:02:52'),
(51, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Pending <br />\r\n            with usertype :0 \r\n             ', '2017-07-04 19:03:00'),
(52, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Active <br />\r\n             with usertype :0 \r\n             ', '2017-07-04 19:03:03'),
(53, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Pending <br />\r\n            with usertype :0 \r\n             ', '2017-07-04 19:04:08'),
(54, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'User modify unique_id :  <br />\r\n            Status. : Active <br />\r\n             with usertype :0 \r\n             ', '2017-07-04 19:04:15'),
(55, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-05 17:42:12'),
(56, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Message Sent to  : 6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9 ', '2017-07-05 18:28:32'),
(57, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Is login', '2017-07-05 18:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `rgfrom` varchar(255) NOT NULL,
  `rgto` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_sent` datetime NOT NULL,
  `is_read` enum('0','1') DEFAULT '0',
  `is_delete` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `rgfrom`, `rgto`, `message`, `date_sent`, `is_read`, `is_delete`) VALUES
(1, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', 'Alex Hello World', '2017-07-05 18:28:32', '0', '0');

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
(1, '6683e1c81c6e3061083e766cea35886824f26c6ca8c38c53bdad6877f0989675be584bb48cfb4ac2944dc247f398e3d27be2b29700aabff94d1f4e68c4361ef9', '3618', '48fe1e3200f132e00c2c41f87c921b33e733eab5789beed0242b2769eb2d2d1000c42ba001c8270c445074da0aeef6c200da30037896aaaa4017fc23cf831170', NULL, '0', 'Active', 'yes', '1499251458', '2017-06-29 14:04:40');

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
