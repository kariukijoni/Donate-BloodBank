-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2017 at 08:13 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bloodbags`
--

CREATE TABLE IF NOT EXISTS `tbl_bloodbags` (
  `bbid` char(10) NOT NULL,
  `donation_type` text NOT NULL,
  `quantity_CC` decimal(5,2) NOT NULL,
  `blood_type` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donation`
--

CREATE TABLE IF NOT EXISTS `tbl_donation` (
`did` int(11) NOT NULL,
  `userid` char(8) NOT NULL,
  `amount_donated_cc` decimal(5,2) NOT NULL,
  `donation_type` text NOT NULL,
  `nextSafeDonation` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tbl_donation`
--

INSERT INTO `tbl_donation` (`did`, `userid`, `amount_donated_cc`, `donation_type`, `nextSafeDonation`) VALUES
(27, '30', '10.00', 'Blood', '2017-07-20'),
(28, '33', '999.99', 'Blood', '2017-07-20'),
(29, '29', '54.00', 'Plasma', '2017-06-22'),
(30, '31', '24.00', 'Platelets', '2017-06-01'),
(31, '31', '444.00', 'Plasma', '2017-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donation_records`
--

CREATE TABLE IF NOT EXISTS `tbl_donation_records` (
`did` int(11) NOT NULL,
  `donation_date` date NOT NULL,
  `bbid` char(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `tbl_donation_records`
--

INSERT INTO `tbl_donation_records` (`did`, `donation_date`, `bbid`) VALUES
(14, '2017-05-16', '0'),
(15, '2017-05-16', '0'),
(16, '2017-05-16', '0'),
(17, '2017-05-18', '0'),
(18, '2017-05-18', '0'),
(19, '2017-05-18', '0'),
(20, '2017-05-18', '0'),
(21, '2017-05-20', '0'),
(22, '2017-05-23', '0'),
(23, '2017-05-23', '0'),
(24, '2017-05-23', '0'),
(25, '2017-05-24', '0'),
(26, '2017-05-25', '0'),
(27, '2017-05-25', '0'),
(28, '2017-05-25', '0'),
(29, '2017-05-25', '0'),
(30, '2017-05-25', '0'),
(31, '2017-05-25', '0'),
(32, '2017-05-25', '0'),
(33, '2017-05-25', '0'),
(34, '2017-05-25', '0'),
(35, '2017-05-25', '0'),
(36, '2017-05-25', '0'),
(37, '2017-05-25', '0'),
(38, '2017-05-25', '0'),
(39, '2017-05-25', '0'),
(40, '2017-05-25', '0'),
(41, '2017-05-25', '0'),
(42, '2017-05-25', '0'),
(43, '2017-05-25', '0'),
(44, '2017-05-25', '0'),
(45, '2017-05-25', '0'),
(46, '2017-05-25', '0'),
(47, '2017-05-25', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donation_types`
--

CREATE TABLE IF NOT EXISTS `tbl_donation_types` (
  `type` varchar(30) NOT NULL DEFAULT '',
  `frequency_days` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_donation_types`
--

INSERT INTO `tbl_donation_types` (`type`, `frequency_days`) VALUES
('Blood', 56),
('Plasma', 28),
('Platelets', 7),
('Power red', 112);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donors_preexam`
--

CREATE TABLE IF NOT EXISTS `tbl_donors_preexam` (
`userid` int(11) NOT NULL,
  `blood_type` char(3) NOT NULL,
  `weightLBS` int(11) NOT NULL,
  `temperature` decimal(5,2) NOT NULL,
  `blood_pressure` char(8) NOT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tbl_donors_preexam`
--

INSERT INTO `tbl_donors_preexam` (`userid`, `blood_type`, `weightLBS`, `temperature`, `blood_pressure`, `gender`, `dateOfBirth`) VALUES
(29, 'B+', 4, '55.00', '55', 'male', '2017-05-31'),
(30, 'B+', 45, '85.00', '54', 'male', '2017-06-09'),
(31, 'A+', 54, '999.99', '6523', 'female', '2017-05-31'),
(32, 'A+', 754, '754.00', '865', 'male', '2017-05-30'),
(33, 'B+', 84651, '999.99', '546312', 'female', '2017-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hospitals`
--

CREATE TABLE IF NOT EXISTS `tbl_hospitals` (
`hos_id` int(11) NOT NULL,
  `hos_name` varchar(30) NOT NULL,
  `hos_location` varchar(30) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_hospitals`
--

INSERT INTO `tbl_hospitals` (`hos_id`, `hos_name`, `hos_location`, `createdAt`) VALUES
(17, 'Egerton', 'Nakuru-Egerton', '2017-05-16 11:43:16'),
(18, 'test', 'test', '2017-05-16 15:57:45'),
(21, 'Trial', 'trial', '2017-05-16 19:17:34'),
(22, 'Ajax', 'Aja', '2017-05-16 21:55:38'),
(23, 'meru', 'meru', '2017-05-17 16:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE IF NOT EXISTS `tbl_items` (
`itemId` int(11) NOT NULL,
  `itemHeader` varchar(512) NOT NULL COMMENT 'Heading',
  `itemSub` varchar(1021) NOT NULL COMMENT 'sub heading',
  `itemDesc` text COMMENT 'content or description',
  `itemImage` varchar(80) DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`itemId`, `itemHeader`, `itemSub`, `itemDesc`, `itemImage`, `isDeleted`, `createdBy`, `createdDtm`, `updatedDtm`, `updatedBy`) VALUES
(1, 'jquery.validation.js', 'Contribution towards jquery.validation.js', 'jquery.validation.js is the client side javascript validation library authored by Jörn Zaefferer hosted on github for us and we are trying to contribute to it. Working on localization now', 'validation.png', 0, 1, '2015-09-02 00:00:00', NULL, NULL),
(2, 'CodeIgniter User Management', 'Demo for user management system', 'This the demo of User Management System (Admin Panel) using CodeIgniter PHP MVC Framework and AdminLTE bootstrap theme. You can download the code from the repository or forked it to contribute. Usage and installation instructions are provided in ReadMe.MD', 'cias.png', 0, 1, '2015-09-02 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locations`
--

CREATE TABLE IF NOT EXISTS `tbl_locations` (
  `lid` char(6) NOT NULL,
  `name` text NOT NULL,
  `city` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requests`
--

CREATE TABLE IF NOT EXISTS `tbl_requests` (
`rqid` int(8) NOT NULL,
  `userid` int(11) NOT NULL,
  `blood_type` char(3) NOT NULL,
  `blood_type_requested` text NOT NULL,
  `date_requested` date NOT NULL,
  `quantity_requested` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=136 ;

--
-- Dumping data for table `tbl_requests`
--

INSERT INTO `tbl_requests` (`rqid`, `userid`, `blood_type`, `blood_type_requested`, `date_requested`, `quantity_requested`) VALUES
(134, 0, 'A+', 'Plasma', '2017-05-25', 4),
(135, 0, 'AB+', 'Platelets', '2017-05-25', 52);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reset_password`
--

CREATE TABLE IF NOT EXISTS `tbl_reset_password` (
`id` bigint(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` bigint(20) NOT NULL DEFAULT '1',
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_reset_password`
--

INSERT INTO `tbl_reset_password` (`id`, `email`, `activation_id`, `agent`, `client_ip`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(22, 'kariuki@gmail.com', 'WUWtdDXuoDI1iIQ', 'Firefox 54.0', '0.0.0.0', 0, 1, '2017-05-01 19:21:45', NULL, NULL),
(23, 'admin@g.com', 'yj1Awvmgrt0D4A3', 'Firefox 54.0', '0.0.0.0', 0, 1, '2017-05-11 11:21:33', NULL, NULL),
(24, 'admin@g.com', 'kKDCtEzOkcbGdXr', 'Firefox 54.0', '0.0.0.0', 0, 1, '2017-05-23 22:53:21', NULL, NULL),
(25, 'admin@g.com', 'lnRQoSkCzPm0Fct', 'Firefox 54.0', '0.0.0.0', 0, 1, '2017-05-23 22:53:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE IF NOT EXISTS `tbl_roles` (
`roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'Administrator'),
(2, 'Manager'),
(3, 'Donor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transact`
--

CREATE TABLE IF NOT EXISTS `tbl_transact` (
`trans_id` int(8) NOT NULL,
  `hos_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `donation_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_donated_cc` int(10) NOT NULL,
  `transact_date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tbl_transact`
--

INSERT INTO `tbl_transact` (`trans_id`, `hos_name`, `donation_type`, `blood_type`, `amount_donated_cc`, `transact_date`) VALUES
(26, 'Egerton', 'B+', 'plasma', 101, '0000-00-00'),
(27, 'Egerton', 'B+', 'plasma', 50, '2017-05-10'),
(29, 'Egerton', '                                    B+                                ', '                                    Plasma                                ', 20, '2017-05-24'),
(31, 'Egerton', '                                    A+                                ', '                                    Platelets                                ', 1577, '2017-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
`userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'admin@g.com', '$2y$10$l.YrI66GRVRhNrZyFnWiKuT.XBjmXbBj5MEjzfkMHfauL5.afG3Sa', 'Administrator', '9890098900', 1, 0, 0, '2015-07-01 18:56:49', 1, '2017-05-01 18:47:49'),
(23, 'm@g.com', '$2y$10$FN5mKxfbVV19Md0nbPj9g.Qe7zfFNfNzpJEjOQdGb51N/Y/NzSOiO', 'Manager', '8852852052', 2, 0, 1, '2017-05-11 18:36:17', NULL, NULL),
(30, 'Mwenda@g.com', '$2y$10$U0bfObeh1Kq70Wc2MyaiR.j18R9xJYZiTOxdYjfM6cgBKwsKToz.C', 'Evans Mwenda', '8465129846', 3, 0, 1, '2017-05-18 21:25:00', NULL, NULL),
(31, 'm@y.com', '$2y$10$ztLFTXBy1g6zUfQZAtAaw.gmHWMfls275rWDTy1frS33LfsbJ3Fq2', 'Makam', '8465312864', 3, 0, 1, '2017-05-20 19:03:12', NULL, NULL),
(32, 't@g.com', '$2y$10$aR0bcImk9pcbZ3WPINImwuLOOIpYSsxkoAdZqJsI5Bh/9k/yyQGb2', 'Tets', '6851230865', 3, 1, 1, '2017-05-23 18:06:14', 1, '2017-05-23 19:36:00'),
(33, 'd@gm.com', '$2y$10$XpofmrLrR4Kv/qi7hxs/W.GAcbhqUcLL8LTncNM59juTc2ujA8x3y', 'Date', '8465132084', 3, 1, 1, '2017-05-24 20:19:03', 1, '2017-05-25 22:41:22'),
(29, 'trial@g.com', '$2y$10$ma0XehFcdzyQYtub5DnaK.lfSIEXrJ.6SV05bjhoLnNNVhHK500Eq', 'Trial', '8465328652', 3, 0, 1, '2017-05-18 21:17:34', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bloodbags`
--
ALTER TABLE `tbl_bloodbags`
 ADD PRIMARY KEY (`bbid`), ADD UNIQUE KEY `bbid` (`bbid`);

--
-- Indexes for table `tbl_donation`
--
ALTER TABLE `tbl_donation`
 ADD PRIMARY KEY (`did`);

--
-- Indexes for table `tbl_donation_records`
--
ALTER TABLE `tbl_donation_records`
 ADD PRIMARY KEY (`did`);

--
-- Indexes for table `tbl_donation_types`
--
ALTER TABLE `tbl_donation_types`
 ADD PRIMARY KEY (`type`), ADD UNIQUE KEY `type` (`type`);

--
-- Indexes for table `tbl_donors_preexam`
--
ALTER TABLE `tbl_donors_preexam`
 ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `tbl_hospitals`
--
ALTER TABLE `tbl_hospitals`
 ADD PRIMARY KEY (`hos_id`);

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
 ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
 ADD PRIMARY KEY (`lid`), ADD UNIQUE KEY `lid` (`lid`);

--
-- Indexes for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
 ADD PRIMARY KEY (`rqid`), ADD UNIQUE KEY `rqid` (`rqid`);

--
-- Indexes for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
 ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tbl_transact`
--
ALTER TABLE `tbl_transact`
 ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
 ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_donation`
--
ALTER TABLE `tbl_donation`
MODIFY `did` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_donation_records`
--
ALTER TABLE `tbl_donation_records`
MODIFY `did` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `tbl_donors_preexam`
--
ALTER TABLE `tbl_donors_preexam`
MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tbl_hospitals`
--
ALTER TABLE `tbl_hospitals`
MODIFY `hos_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
MODIFY `rqid` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_transact`
--
ALTER TABLE `tbl_transact`
MODIFY `trans_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
