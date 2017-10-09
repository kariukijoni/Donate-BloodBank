-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2017 at 09:11 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bloodBank`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
`contact_id` int(15) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` text NOT NULL,
  `textArea` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unread',
  `once_read` int(2) NOT NULL DEFAULT '0',
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`contact_id`, `fullName`, `email`, `phone`, `textArea`, `status`, `once_read`, `date`) VALUES
(1, 'kariuki John', 'kariukijoni@mail.com', '+254725885693', 'Hello, when are you holding a blood donation at Limuru', 'read', 1, '2017-06-28'),
(2, 'Cyrus Mutwol', 'cyrusmutwol@mail.com', '+254717978086', 'Hello, am Cyrus I am active blood donor with kenya Redcross', 'read', 1, '2017-06-28'),
(3, 'Julius karogo', 'juliuskarogo@gmail.com', '+254123456668', 'When are you back at Nakuru for blood donation drive', 'read', 1, '2017-06-28'),
(4, 'Ann wairimu', 'annwairimu@gmail.com', '+254717978086', 'Hello am glad to have you', 'read', 1, '2017-06-28'),
(5, 'Stella Mwangi', 'stella@yahoo.com', '+254723698552', 'Am stella mwangi', 'unread', 0, '2017-06-29'),
(6, 'Beth Kaimuri', 'kaimuri@gmail.com', '+254715427738', 'Hello, how can i meet you?', 'read', 1, '2017-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donation`
--

CREATE TABLE IF NOT EXISTS `tbl_donation` (
`did` int(11) NOT NULL,
  `userid` int(8) NOT NULL,
  `amount_donated_cc` decimal(5,2) NOT NULL,
  `donation_type` text NOT NULL,
  `nextSafeDonation` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_donation`
--

INSERT INTO `tbl_donation` (`did`, `userid`, `amount_donated_cc`, `donation_type`, `nextSafeDonation`) VALUES
(1, 52, '300.00', 'Platelets', '2017-07-05'),
(2, 57, '350.00', 'Blood', '2017-08-23'),
(3, 59, '530.00', 'Power Red', '2017-10-18'),
(4, 56, '350.00', 'Plasma', '2017-07-26'),
(5, 60, '500.00', 'Blood', '2017-08-23'),
(6, 63, '300.00', 'Blood', '2017-08-23'),
(7, 68, '300.00', 'Platelets', '2017-07-06'),
(8, 53, '999.99', 'Blood', '2017-10-19'),
(9, 62, '999.99', 'Platelets', '2017-09-26'),
(10, 69, '999.99', 'Blood', '2017-11-14'),
(11, 67, '999.99', 'Plasma', '2017-10-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donation_records`
--

CREATE TABLE IF NOT EXISTS `tbl_donation_records` (
`did` int(11) NOT NULL,
  `donation_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_donation_records`
--

INSERT INTO `tbl_donation_records` (`did`, `donation_date`) VALUES
(1, '2017-06-28'),
(2, '2017-06-28'),
(3, '2017-06-28'),
(4, '2017-06-28'),
(5, '2017-06-28'),
(6, '2017-06-28'),
(7, '2017-06-29'),
(8, '2017-08-24'),
(9, '2017-09-19'),
(10, '2017-09-19'),
(11, '2017-09-19');

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
('Power Red', 112);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donors_preexam`
--

CREATE TABLE IF NOT EXISTS `tbl_donors_preexam` (
`userid` int(11) NOT NULL,
  `blood_type` char(3) NOT NULL,
  `weightLBS` int(11) NOT NULL DEFAULT '0',
  `temperature` decimal(5,2) NOT NULL DEFAULT '0.00',
  `blood_pressure` char(8) NOT NULL DEFAULT '0',
  `gender` enum('male','female') DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_donors_preexam`
--

INSERT INTO `tbl_donors_preexam` (`userid`, `blood_type`, `weightLBS`, `temperature`, `blood_pressure`, `gender`, `dateOfBirth`) VALUES
(50, 'AB+', 63, '37.00', '45', 'female', '1990-05-02'),
(51, 'O+', 67, '40.00', '80', 'female', '1995-03-01'),
(52, 'B+', 65, '37.00', '59', 'male', '1965-03-02'),
(53, 'A+', 71, '54.00', '54', 'female', '1965-03-09'),
(54, 'B+', 56, '41.00', '62', 'female', '1971-03-09'),
(55, 'AB-', 56, '36.00', '56', 'male', '1990-02-07'),
(56, 'AB-', 53, '52.00', '56', 'male', '1994-07-05'),
(57, 'O-', 54, '54.00', '54', 'male', '1990-03-08'),
(58, 'A-', 54, '45.00', '54', 'male', '1995-02-08'),
(59, 'O+', 58, '38.00', '45', 'male', '1994-06-08'),
(60, 'A+', 56, '35.00', '45', 'male', '1990-06-13'),
(61, 'B+', 63, '40.00', '40', 'male', '1999-06-09'),
(62, 'B-', 50, '36.00', '45', 'male', '1990-02-06'),
(63, 'A+', 68, '36.00', '56', 'female', '1999-02-03'),
(64, 'B-', 56, '38.00', '45', 'female', '1990-02-14'),
(65, 'B+', 82, '42.00', '52', 'male', '1999-02-10'),
(66, 'O-', 82, '36.00', '36', 'male', '1999-02-10'),
(67, 'A+', 53, '37.00', '55', 'male', '1999-02-10'),
(68, 'B+', 63, '36.00', '56', 'female', '1999-02-03'),
(69, 'B+', 54, '54.00', '45', 'male', '1999-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hospitals`
--

CREATE TABLE IF NOT EXISTS `tbl_hospitals` (
`hos_id` int(11) NOT NULL,
  `hos_name` varchar(30) NOT NULL,
  `hos_location` varchar(30) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hospitals`
--

INSERT INTO `tbl_hospitals` (`hos_id`, `hos_name`, `hos_location`, `createdAt`) VALUES
(1, 'Egerton', 'Nakuru', '2017-06-28 05:52:26'),
(2, 'St Pauls Hospital', 'Limuru', '2017-06-28 05:53:04'),
(3, 'St Jude Clinic', 'Limuru', '2017-06-28 05:53:29'),
(4, 'Tigoni District Hospital', 'Kiambu', '2017-06-28 20:35:08'),
(5, 'Ngecha Dispensary', 'Kabuku', '2017-06-28 20:37:16');

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
-- Table structure for table `tbl_notifications`
--

CREATE TABLE IF NOT EXISTS `tbl_notifications` (
`not_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` varchar(8) NOT NULL DEFAULT 'unread',
  `rqid` int(11) NOT NULL,
  `date_sent` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notifications`
--

INSERT INTO `tbl_notifications` (`not_id`, `userid`, `status`, `rqid`, `date_sent`) VALUES
(1, 51, 'read', 1, '2017-06-28 06:05:06'),
(2, 59, 'unread', 2, '2017-06-28 06:05:06'),
(3, 51, 'unread', 3, '2017-06-28 06:20:54'),
(4, 59, 'unread', 4, '2017-06-28 06:20:54'),
(5, 53, 'unread', 5, '2017-06-28 06:24:02'),
(6, 53, 'unread', 6, '2017-06-28 06:24:25'),
(7, 53, 'unread', 7, '2017-06-28 06:24:48'),
(8, 58, 'unread', 8, '2017-06-28 06:53:02'),
(9, 52, 'unread', 9, '2017-06-29 12:02:31'),
(10, 54, 'unread', 10, '2017-06-29 12:02:31'),
(11, 61, 'unread', 11, '2017-06-29 12:02:31'),
(12, 65, 'unread', 12, '2017-06-29 12:02:31'),
(13, 68, 'unread', 13, '2017-06-29 12:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requests`
--

CREATE TABLE IF NOT EXISTS `tbl_requests` (
`rqid` int(8) NOT NULL,
  `blood_type` char(3) NOT NULL,
  `blood_type_requested` text NOT NULL,
  `date_requested` datetime NOT NULL,
  `quantity_requested` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_requests`
--

INSERT INTO `tbl_requests` (`rqid`, `blood_type`, `blood_type_requested`, `date_requested`, `quantity_requested`) VALUES
(8, 'A-', 'Platelets', '2017-06-28 06:53:00', 500),
(13, 'B+', 'Blood', '2017-06-29 12:02:00', 566);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_response`
--

CREATE TABLE IF NOT EXISTS `tbl_response` (
`resp_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `textArea` text NOT NULL,
  `responseDate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_response`
--

INSERT INTO `tbl_response` (`resp_id`, `userid`, `textArea`, `responseDate`) VALUES
(1, 51, 'I will be available on 30/06/2017', '2017-06-28 06:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE IF NOT EXISTS `tbl_roles` (
`roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'Administrator'),
(2, 'Manager'),
(3, 'Donor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE IF NOT EXISTS `tbl_transaction` (
`trans_id` int(11) NOT NULL,
  `hos_name` varchar(50) NOT NULL,
  `donation_type` varchar(50) NOT NULL,
  `blood_type` varchar(50) NOT NULL,
  `amount_donated` int(50) NOT NULL,
  `transact_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`trans_id`, `hos_name`, `donation_type`, `blood_type`, `amount_donated`, `transact_date`) VALUES
(1, 'Egerton', 'Platelets', 'B+', 200, '2017-06-28'),
(2, 'Egerton', 'Power Red', 'O+', 400, '2017-06-28'),
(3, 'St Pauls Hospital', 'Blood', 'A+', 300, '2017-06-28'),
(4, 'Egerton', 'Platelets', 'B+', 400, '2017-07-22'),
(5, 'Egerton', 'Platelets', 'B+', 0, '2017-08-24'),
(6, 'Egerton', 'Platelets', 'B+', 56435, '2017-08-24');

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
  `updatedDtm` datetime DEFAULT NULL,
  `don_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`, `don_status`) VALUES
(1, 'kariukijoni@gmail.com', '$2y$10$4KB5fzRHkow3ttnYDWBr9.PFhzKMpDPCfbVYZV/Y4DAoU8aCWJpoW', 'Kariukye John', '+254989009895', 1, 0, 0, '2015-07-01 18:56:49', 1, '2017-06-28 12:00:22', 1),
(63, 'keziahnjoki@gmail.com', '$2y$10$6J9aGPV8HMPT9DRwYFsvUeUAICLJBECXcRmciuIXRpiSfcQ4VTutG', 'Keziahn Njoki', '+254725996332', 3, 0, 1, '2017-06-28 11:09:00', NULL, NULL, 0),
(62, 'nephatmuhia@yahoo.com', '$2y$10$jfg/gjLeJeq/WexJdF4r5uPRrJZWFdWTfACV4jYDNOi.fTRzSIgbm', 'Nephat Muhia', '+254725855558', 3, 0, 1, '2017-06-28 11:07:08', NULL, NULL, 0),
(61, 'kiirimoses@gmail.com', '$2y$10$npkv3tHnO5BAC1uRQAm6qOjGJT1uZY9k2Vh2OWq254DI4bBI.xqHi', 'Moses Kiiru', '+254725866312', 3, 0, 1, '2017-06-28 11:04:59', NULL, NULL, 1),
(60, 'kariukimaina@mail.com', '$2y$10$e63nIY.PyPITZYsGw1YESOWxnt9/Vo1mz5tmcRjXiIkZZ1QrFpfVu', 'John Kariuki', '+254717978086', 3, 0, 1, '2017-06-28 11:03:47', NULL, NULL, 0),
(59, 'rayomondi@gmail.com', '$2y$10$S9EsMcQcbrk6Os7roglQ4.xdhl.XMGAFUWG0R9RCPV34eW./LLUmS', 'Ray Omondi', '+254725963525', 3, 0, 1, '2017-06-28 05:41:08', NULL, NULL, 0),
(58, 'crescentmusyoki@gmail.com', '$2y$10$WM3eCgphtAzXdLZzB6k.UeWrCVUnVUBMTiazGfMRIC6XqVywztYH6', 'Crescent Musyoki', '+254758225666', 3, 0, 1, '2017-06-28 05:39:46', NULL, NULL, 1),
(57, 'simonken@gmail.com', '$2y$10$uv.c9VXthfnhLVsF9B3IQuLbSF/IydJWB34zMXOvura/LsOBjP6tW', 'Simon Ken', '+254742225223', 3, 0, 1, '2017-06-28 05:38:27', NULL, NULL, 0),
(56, 'mwenda@yahoo.com', '$2y$10$//pImKWKFC6.3taLStK5iOxMbjoIN0z82VDm1YcoJLVfx2GRa59uO', 'Evans Mwenda', '+254788888888', 3, 0, 1, '2017-06-28 05:36:27', NULL, NULL, 0),
(55, 'evansNdegwa@gmail.com', '$2y$10$3nXXQdFnBaoiE8VrSQnhQe5YVMGp8IT3tJrx7MrqVYtXIBym1M39O', 'Evans Ndegwa', '+254726226233', 3, 0, 1, '2017-06-28 05:35:24', NULL, NULL, 1),
(54, 'alicewambui@mail.com', '$2y$10$ZmrBTmaSmHtNlYzOfzfowuExLBp7Ki5V0kzm92tEQ5oWzgJc2zKPK', 'Alice Wambui', '+254720252787', 3, 0, 1, '2017-06-28 05:34:01', NULL, NULL, 1),
(53, 'jecintaWangari@gmail.com', '$2y$10$Ne2LvOApDQgIdOeKDMSgmuUHuA7tAH7QNl8RNWQc8zAhG/Lb7iNL2', 'Jacinta Wangari', '+254719510067', 3, 0, 1, '2017-06-28 05:32:37', NULL, NULL, 0),
(52, 'samuelmwangi@gmail.com', '$2y$10$9WWIuJouK8yNrLC1giSvDuJl7VeGSS1BVZF5N1q0rDEdGzS/f4iuC', 'Samuel Mwangi', '+254717978086', 3, 0, 1, '2017-06-28 05:30:38', NULL, NULL, 0),
(51, 'carolw@gmail.com', '$2y$10$tu.RMAVGFX5w.6etzw6QaetUFM6FxvvYpCioJ4PfqEpsL5m3p5pOC', 'Carol Wairimu', '+254258663552', 2, 0, 1, '2017-06-28 05:28:38', 51, '2017-06-28 06:15:09', 1),
(50, 'Wanjiruloise@yahoo.com', '$2y$10$wsZyq1JkYPNSLQnD3YfmaOvdhtfZ3PAnDZnQcmnBCWibn.ZVly.My', 'Loise Wanjiru', '+254155266987', 2, 0, 1, '2017-06-28 05:26:34', NULL, NULL, 1),
(64, 'mitchelwanjiru@gmail.com', '$2y$10$Y1Ku8qi.2vhfspXi7HNOWOLChGNhH0uS.oqPWuWOtzfj6mivoJg3m', 'Mitchel Wanjiru', '+254788512336', 3, 0, 1, '2017-06-28 11:16:10', NULL, NULL, 1),
(65, 'munenepaul@gmail.com', '$2y$10$GaugiIKZ8yPYIQhT0xzoOexR82XvkpDLdNxK0PYknMwsYRPM2Fmki', 'Paul Munene', '+257475236912', 3, 0, 1, '2017-06-28 15:45:59', NULL, NULL, 1),
(66, 'njengajames@gmail.com', '$2y$10$rHiAK9r6zgbTNJyroLM1VexFcmhLFaSoAiq4sexx.fKR37T081bgW', 'James Njenga', '+254785523699', 3, 0, 1, '2017-06-29 08:36:00', NULL, NULL, 1),
(67, 'stephen@gmail.com', '$2y$10$5adLgtFEBg3Q0cZXJRjtp.CMrnAh3NQgYWi/9LxAzpFONXm2DrjfS', 'Stephen Oyoo', '+254745236985', 3, 0, 1, '2017-06-29 08:51:46', NULL, NULL, 0),
(68, 'faithinyele@gmail.com', '$2y$10$JPcs7KkYrU1cJ/2MLhio6etwZ6rS.NKeCNBoQIB4NVLvbNx25ptk2', 'Faith Inyele', '+254721813793', 3, 0, 1, '2017-06-29 11:56:26', NULL, NULL, 0),
(69, 'georgeodongo@gmail.com', '$2y$10$IBMnkmvTNUGm65iYnnsWaeV5S.lsz.45gJ28Y0JWmaN1HiVmMejh2', 'George Odongo', '+254899456255', 3, 0, 1, '2017-07-20 06:16:22', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
 ADD PRIMARY KEY (`contact_id`);

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
-- Indexes for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
 ADD PRIMARY KEY (`lid`), ADD UNIQUE KEY `lid` (`lid`);

--
-- Indexes for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
 ADD PRIMARY KEY (`not_id`);

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
-- Indexes for table `tbl_response`
--
ALTER TABLE `tbl_response`
 ADD PRIMARY KEY (`resp_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
 ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
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
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
MODIFY `contact_id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_donation`
--
ALTER TABLE `tbl_donation`
MODIFY `did` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_donation_records`
--
ALTER TABLE `tbl_donation_records`
MODIFY `did` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_donors_preexam`
--
ALTER TABLE `tbl_donors_preexam`
MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `tbl_hospitals`
--
ALTER TABLE `tbl_hospitals`
MODIFY `hos_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
MODIFY `rqid` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_response`
--
ALTER TABLE `tbl_response`
MODIFY `resp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
