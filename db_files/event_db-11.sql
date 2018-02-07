-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2018 at 03:25 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcementID` int(11) NOT NULL,
  `announcementDetails` varchar(500) NOT NULL,
  `announcementStatus` enum('OnGoing','Finished') NOT NULL,
  `addedBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `addedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcementID`, `announcementDetails`, `announcementStatus`, `addedBy`, `updatedBy`, `addedAt`, `updatedAt`) VALUES
(1, 'asfasfagsgasasgasg', 'Finished', 1, 0, '2017-12-20 12:56:32', '2017-12-20 21:05:28'),
(3, 'agdagdgadgad', 'OnGoing', 1, 0, '2017-12-20 12:56:51', '2017-12-20 20:57:09'),
(4, 'agdagdgadgad', 'OnGoing', 1, 0, '2017-12-20 12:57:16', '2017-12-20 20:57:16'),
(14, 'agddagd', 'OnGoing', 1, 0, '2017-12-20 13:03:50', '2017-12-20 21:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `cardId` int(11) NOT NULL,
  `cardCode` varchar(10) NOT NULL,
  `cardAmount` int(11) NOT NULL,
  `cardStatus` tinyint(1) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `addedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`cardId`, `cardCode`, `cardAmount`, `cardStatus`, `addedBy`, `updatedBy`, `addedAt`, `updatedAt`) VALUES
(0, 'asdasd', 500, 0, 1, 1, '2017-12-20 21:09:42', '2017-12-20 21:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `event_info`
--

CREATE TABLE `event_info` (
  `event_id` int(11) NOT NULL,
  `event_date_start` datetime NOT NULL,
  `event_date_end` datetime NOT NULL,
  `no_tickets_total` int(11) NOT NULL,
  `total_no_addedTickets` int(11) NOT NULL,
  `total_tickets_amtSold` int(11) NOT NULL,
  `event_status` enum('Pending','Approved','Rejected') DEFAULT NULL,
  `event_name` varchar(50) NOT NULL,
  `event_details` text,
  `event_category` enum('Appearance','Attraction','Retreat','Training','Concert','Conference','Convention','Gala','Festival','Competition','Meeting','Party','Rally','Screening','Seminar','Tour','Other') NOT NULL,
  `event_venue` text NOT NULL,
  `event_isActive` tinyint(1) NOT NULL DEFAULT '1',
  `event_picture` text NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `addedBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `addedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_info`
--

INSERT INTO `event_info` (`event_id`, `event_date_start`, `event_date_end`, `no_tickets_total`, `total_no_addedTickets`, `total_tickets_amtSold`, `event_status`, `event_name`, `event_details`, `event_category`, `event_venue`, `event_isActive`, `event_picture`, `color`, `user_id`, `addedBy`, `updatedBy`, `addedAt`, `updatedAt`) VALUES
(1, '2018-01-10 00:12:00', '2018-01-10 00:00:00', 12, 0, 0, 'Approved', 'fas', 'sad', 'Attraction', 'asf', 1, 'images/events/6_wp.jpg', NULL, 3, 0, 0, '2018-01-10 13:46:19', '2018-01-10 21:00:59'),
(2, '2018-01-10 00:00:00', '2018-01-10 00:00:00', 123, 0, 0, 'Approved', 'afs', 'afs', 'Attraction', 'asf', 1, 'images/events/2_wa.jpg', NULL, 3, 0, 0, '2018-01-10 13:47:24', '2018-01-10 21:01:00'),
(3, '2018-01-10 00:00:00', '2018-01-10 00:00:00', 123, 0, 0, 'Pending', 'sad', 'asd', 'Attraction', 'ads', 1, 'images/events/events1.jpg', NULL, 3, 0, 0, '2018-01-10 14:46:58', '2018-01-10 21:46:59'),
(4, '2018-01-10 00:00:00', '2018-01-10 00:00:00', 124, 0, 0, 'Pending', 'sag', 'gsa', 'Attraction', 'ag', 1, 'images/events/events1.jpg', NULL, 3, 0, 0, '2018-01-10 14:47:25', '2018-01-10 21:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `date_sold` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ticket_type_id` int(11) DEFAULT NULL,
  `addedBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `addedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_type`
--

CREATE TABLE `ticket_type` (
  `ticket_type_id` int(11) NOT NULL,
  `ticket_name` varchar(50) DEFAULT NULL,
  `price` float NOT NULL,
  `ticket_count` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `addedBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `addedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_type`
--

INSERT INTO `ticket_type` (`ticket_type_id`, `ticket_name`, `price`, `ticket_count`, `event_id`, `addedBy`, `updatedBy`, `addedAt`, `updatedAt`) VALUES
(1, 'as', 122, 123, 1, 0, 0, '2017-12-20 20:50:26', '2017-12-20 20:50:26'),
(2, 'asf', 124, 124, 2, 0, 0, '2017-12-20 21:14:04', '2017-12-20 21:14:04'),
(3, 'sad', 123, 123, 3, 0, 0, '2018-01-06 01:59:50', '2018-01-06 01:59:50'),
(4, 'fsa', 12, 12, 4, 0, 0, '2018-01-06 02:01:11', '2018-01-06 02:01:11'),
(5, 'asd', 1, 12, 5, 0, 0, '2018-01-10 10:48:01', '2018-01-10 10:48:01'),
(6, 'asd', 132, 123, 6, 0, 0, '2018-01-10 13:04:01', '2018-01-10 13:04:01'),
(7, 'as', 12, 2, 7, 0, 0, '2018-01-10 13:04:48', '2018-01-10 13:04:48'),
(22, 'das', 121, 12, 9, 0, 0, '2018-01-10 19:48:06', '2018-01-10 19:48:06'),
(23, 'as', 123, 123, 14, 0, 0, '2018-01-10 19:52:26', '2018-01-10 19:52:26'),
(24, 'ads', 123, 12123, 15, 0, 0, '2018-01-10 19:55:09', '2018-01-10 19:55:09'),
(25, 'asd', 123, 12, 24, 0, 0, '2018-01-10 20:21:46', '2018-01-10 20:21:46'),
(26, 'das', 123, 12, 25, 0, 0, '2018-01-10 20:22:12', '2018-01-10 20:22:12'),
(27, 'afs', 123, 213, 38, 0, 0, '2018-01-10 20:33:13', '2018-01-10 20:33:13'),
(28, 'sfa', 123, 125, 39, 0, 0, '2018-01-10 20:33:57', '2018-01-10 20:33:57'),
(29, 'saf', 123, 123, 63, 0, 0, '2018-01-10 20:44:30', '2018-01-10 20:44:30'),
(30, 'asd', 123, 12, 1, 0, 0, '2018-01-10 20:46:19', '2018-01-10 20:46:19'),
(31, 'afs', 124, 123, 2, 0, 0, '2018-01-10 20:47:24', '2018-01-10 20:47:24'),
(32, 'das', 124, 123, 3, 0, 0, '2018-01-10 21:46:59', '2018-01-10 21:46:59'),
(33, 'gsa', 12, 124, 4, 0, 0, '2018-01-10 21:47:25', '2018-01-10 21:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `account_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('Regular','Admin','Superadmin','') NOT NULL,
  `upgradedBy` int(11) NOT NULL,
  `user_status` enum('Active','Banned','Deleted') NOT NULL DEFAULT 'Active',
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_initial` char(1) DEFAULT NULL,
  `user_imgpath` varchar(260) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `contact_no` varchar(16) DEFAULT NULL,
  `load_amt` float NOT NULL DEFAULT '0',
  `addedBy` int(11) DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `addedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`account_id`, `user_name`, `password`, `user_type`, `upgradedBy`, `user_status`, `first_name`, `last_name`, `middle_initial`, `user_imgpath`, `email`, `birthdate`, `gender`, `contact_no`, `load_amt`, `addedBy`, `updatedBy`, `addedAt`, `updatedAt`) VALUES
(1, 'timoteo', '7D6ECC2E16DC040356AE49CFCBE3A36D428E0C64D66C44E95D753EA1CAEF44347A1D4C59AB9942D5531BC60638B429984C0AF27144AF0E9B49446338807CE399', 'Superadmin', 0, 'Active', 'asd', 'asd', 'd', '', '', '2017-12-12', 'Male', '09237366898', 0, 1, 1, '2017-12-20 20:44:06', '2017-12-21 20:23:27'),
(3, 'crystal', '9BC35193EE927E4047CE28012E893ED2366852ADEDE6F7699F6D92B4496DEAA5FDE1B90143ACA4BBEE8416D522FB88468E570514BE07139F07F94A8C39A335C1', 'Regular', 1, 'Active', 'asd', 'asd', NULL, '', 'asd@gmail.com', '2017-12-04', 'Male', '09239056565', 128, 1, 1, '2017-12-20 20:44:56', '2017-12-21 20:20:30'),
(8, 'harvey', '93E3545BCC181B039B5B3AD091A6C30139CE6A85C1615A2ABB9D450491CF8A0DECF7C4D2C9FDFD62FD76EFAE01583A3F6EBF521BC9A02E64BAF663487EC751DA', 'Admin', 0, 'Active', 'harvey', 'harvs', NULL, '', 'harvey@gmail.com', '2017-05-24', 'Male', '09235478989', 0, 1, 1, '2017-12-21 20:23:01', '2017-12-21 20:23:40'),
(9, 'afsfasfsa', 'c8bc30e5ccddb6d2573dbbeafa0961de2bad4447fce60003ff291f0ea5f3016bc388f1ce1ecd88264bf1f366a5ba683275d7514da194f85de4c69db313c39188', 'Regular', 0, 'Active', 'fsa', 'fas', 'f', '', 'saf@gmail.com', '0095-09-05', 'Male', '09237390450', 0, NULL, NULL, '2018-01-10 05:38:28', '2018-01-10 13:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_event_preference`
--

CREATE TABLE `user_event_preference` (
  `user_event_preference_id` int(11) NOT NULL,
  `preference_date` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `addedBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `addedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcementID`),
  ADD KEY `addedBy` (`addedBy`);

--
-- Indexes for table `event_info`
--
ALTER TABLE `event_info`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `event_info_fk` (`user_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `ticket_fk1` (`user_id`),
  ADD KEY `ticket_fk2` (`ticket_type_id`);

--
-- Indexes for table `ticket_type`
--
ALTER TABLE `ticket_type`
  ADD PRIMARY KEY (`ticket_type_id`),
  ADD KEY `ticket_type_fk1` (`event_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_event_preference`
--
ALTER TABLE `user_event_preference`
  ADD PRIMARY KEY (`user_event_preference_id`),
  ADD KEY `user_event_preference_fk1` (`user_id`),
  ADD KEY `user_event_preference_fk2` (`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `event_info`
--
ALTER TABLE `event_info`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket_type`
--
ALTER TABLE `ticket_type`
  MODIFY `ticket_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_event_preference`
--
ALTER TABLE `user_event_preference`
  MODIFY `user_event_preference_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`addedBy`) REFERENCES `user_account` (`account_id`);

--
-- Constraints for table `event_info`
--
ALTER TABLE `event_info`
  ADD CONSTRAINT `event_info_fk` FOREIGN KEY (`user_id`) REFERENCES `user_account` (`account_id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_fk1` FOREIGN KEY (`user_id`) REFERENCES `user_account` (`account_id`),
  ADD CONSTRAINT `ticket_fk2` FOREIGN KEY (`ticket_type_id`) REFERENCES `ticket_type` (`ticket_type_id`);

--
-- Constraints for table `ticket_type`
--
ALTER TABLE `ticket_type`
  ADD CONSTRAINT `ticket_type_fk1` FOREIGN KEY (`event_id`) REFERENCES `event_info` (`event_id`);

--
-- Constraints for table `user_event_preference`
--
ALTER TABLE `user_event_preference`
  ADD CONSTRAINT `user_event_preference_fk1` FOREIGN KEY (`user_id`) REFERENCES `user_account` (`account_id`),
  ADD CONSTRAINT `user_event_preference_fk2` FOREIGN KEY (`event_id`) REFERENCES `event_info` (`event_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
