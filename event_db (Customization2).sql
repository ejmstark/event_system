-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2018 at 03:53 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

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
  `announcementTitle` varchar(255) NOT NULL,
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

INSERT INTO `announcement` (`announcementID`, `announcementTitle`, `announcementDetails`, `announcementStatus`, `addedBy`, `updatedBy`, `addedAt`, `updatedAt`) VALUES
(1, '', 'Announcement Users/Testers.. if i deactivate/seen ni ninyo na announcement ili ug lain para sa uban testers...', 'OnGoing', 8, 0, '2018-01-28 01:13:52', '2018-01-28 01:13:52'),
(2, '', 'sadggssaggd', 'OnGoing', 1, 0, '2018-02-04 00:14:30', '2018-02-04 00:14:30'),
(3, '', 'asDASFASFAsf\r\n', 'OnGoing', 8, 0, '2018-02-05 21:17:54', '2018-02-05 21:17:54'),
(4, '', 'agsagas\r\ndgsadgsdg\r\n\r\n\r\n\r\nasdgasdg\r\nsadgasdg\r\n\r\n\r\nadgasdgasdgasdg', 'Finished', 8, 0, '2018-02-05 21:38:46', '2018-02-05 21:40:43'),
(5, '', 'gasdgasdg\r\nasdg\r\nsadg\r\nsad\r\ng\r\nasdg\r\nas\r\ndgasdgasdgasdg\r\nads\r\ng\r\nasdg\r\nas\r\nddg', 'OnGoing', 8, 0, '2018-02-05 21:43:09', '2018-02-05 21:43:09'),
(6, '', 'gagsasggsasga\r\nasg\r\nasg\r\nags\r\nasg\r\nsag\r\nag\r\ns\r\ngsaasgasg\r\n\r\n\r\n\r\nasgasgags', 'OnGoing', 8, 0, '2018-02-05 21:51:31', '2018-02-05 21:51:31'),
(7, '', 'asdgasdgsadh', 'OnGoing', 8, 0, '2018-02-05 23:37:53', '2018-02-05 23:37:53'),
(8, 'Hoiii\r\nasdasd', 'DETAILS', 'OnGoing', 8, 1, '2018-02-06 09:35:07', '2018-02-06 09:35:07'),
(9, '', 'Announcement!\r\n\r\nHi all!\r\n\r\nGood Morning', 'OnGoing', 1, 0, '2018-02-06 09:36:06', '2018-02-06 09:36:06');

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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total _price` float NOT NULL,
  `account_id` int(11) NOT NULL,
  `status` enum('active','deleted','','') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `ticket_id`, `quantity`, `total _price`, `account_id`, `status`) VALUES
(5, 39, 11, 0, 3, 'active'),
(6, 38, 10, 0, 3, 'active'),
(7, 40, 71, 0, 3, 'active'),
(8, 41, 500, 0, 3, 'active');

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
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_info`
--

INSERT INTO `event_info` (`event_id`, `event_date_start`, `event_date_end`, `no_tickets_total`, `total_no_addedTickets`, `total_tickets_amtSold`, `event_status`, `event_name`, `event_details`, `event_category`, `event_venue`, `event_isActive`, `event_picture`, `color`, `user_id`, `addedBy`, `updatedBy`, `addedAt`, `updatedAt`, `location_id`) VALUES
(8, '2018-02-14 00:00:00', '2018-02-23 00:00:00', 110, 0, 0, 'Approved', 'Suntukan sa MIS', 'JEJEJEJE', 'Gala', '1st flr, Wanzu building', 1, 'images/events/3.jpg', NULL, 3, 0, 0, '2018-02-06 02:23:52', '2018-02-06 09:24:10', 19),
(9, '2018-02-25 00:00:00', '2018-03-10 00:00:00', 220, 0, 0, 'Approved', 'Rak rakan tamu', 'Attend my activity of sas OH yeah bou', 'Tour', '2nd st Dito', 1, 'images/events/01.jpg', NULL, 3, 0, 0, '2018-02-06 02:28:23', '2018-02-06 09:28:46', 14);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(50) NOT NULL,
  `region_code` enum('NCR','CAR','MIMAROPA','ARMM','Region I','Region II','Region III','Region IV-A','Region V','Region VI','Region VII','Region VIII','Region IX','Region X','Region XI','Region XII','Region XIII') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `region_code`) VALUES
(1, 'Caloocan', 'NCR'),
(2, 'Las Piñas', 'NCR'),
(3, 'Makati', 'NCR'),
(4, 'Malabon', 'NCR'),
(5, 'Mandaluyong', 'NCR'),
(6, 'Manila', 'NCR'),
(7, 'Marikina', 'NCR'),
(8, 'Muntinlupa', 'NCR'),
(9, 'Navotas', 'NCR'),
(10, 'Parañaque', 'NCR'),
(11, 'Pasay', 'NCR'),
(12, 'Pasig', 'NCR'),
(13, 'Pateros', 'NCR'),
(14, 'Quezon City', 'NCR'),
(15, 'San Juan', 'NCR'),
(16, 'Taguig', 'NCR'),
(17, 'Valenzuela', 'NCR'),
(18, 'Bohol', 'Region VII'),
(19, 'Cebu', 'Region VII'),
(20, 'Negros Oriental', 'Region VII'),
(21, 'Siquijor', 'Region VII');

-- --------------------------------------------------------

--
-- Table structure for table `notification_item`
--

CREATE TABLE `notification_item` (
  `user` int(11) NOT NULL,
  `announcement` int(11) NOT NULL,
  `isViewed` tinyint(1) NOT NULL DEFAULT '0',
  `notifID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_item`
--

INSERT INTO `notification_item` (`user`, `announcement`, `isViewed`, `notifID`) VALUES
(1, 1, 0, 1),
(3, 1, 1, 2),
(8, 1, 0, 3),
(9, 1, 0, 4),
(1, 2, 0, 5),
(3, 2, 1, 6),
(8, 2, 0, 7),
(9, 2, 0, 8),
(1, 3, 0, 9),
(3, 3, 1, 10),
(8, 3, 0, 11),
(9, 3, 0, 12),
(1, 4, 0, 13),
(3, 4, 0, 14),
(8, 4, 0, 15),
(9, 4, 0, 16),
(1, 5, 0, 17),
(3, 5, 1, 18),
(8, 5, 0, 19),
(9, 5, 0, 20),
(1, 6, 0, 21),
(3, 6, 1, 22),
(8, 6, 0, 23),
(9, 6, 0, 24),
(1, 7, 0, 25),
(3, 7, 1, 26),
(8, 7, 0, 27),
(9, 7, 0, 28),
(1, 9, 0, 29),
(3, 9, 0, 30),
(8, 9, 0, 31),
(9, 9, 0, 32);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `description` text NOT NULL,
  `ticket_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `rating`, `description`, `ticket_id`) VALUES
(1, 4, 'Nice', 2);

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

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `date_sold`, `user_id`, `ticket_type_id`, `addedBy`, `updatedBy`, `addedAt`, `updatedAt`) VALUES
(1, '2018-01-27 13:11:25', 3, 2, 0, 0, '2018-01-27 21:11:25', '2018-01-27 21:11:25'),
(2, '2018-02-22 21:49:42', 1, 38, 0, 0, '2018-02-22 21:49:42', '2018-02-22 21:49:42');

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
(33, 'gsa', 12, 124, 4, 0, 0, '2018-01-10 21:47:25', '2018-01-10 21:47:25'),
(34, 'asd', 123, 123, 5, 0, 0, '2018-01-12 22:33:10', '2018-01-12 22:33:10'),
(35, 'asg', 123, 123, 5, 0, 0, '2018-01-12 22:33:10', '2018-01-12 22:33:10'),
(36, 'asdasd', 500, 5, 6, 0, 0, '2018-02-05 22:19:27', '2018-02-05 22:19:27'),
(37, 'TIC1', 5000, 50, 7, 0, 0, '2018-02-06 00:54:31', '2018-02-06 00:54:31'),
(38, 'GOLD', 200, 10, 8, 0, 0, '2018-02-06 09:23:52', '2018-02-06 09:23:52'),
(39, 'Silver', 10, 100, 8, 0, 0, '2018-02-06 09:23:52', '2018-02-06 09:23:52'),
(40, 'Chryss', 12, 100, 9, 0, 0, '2018-02-06 09:28:23', '2018-02-06 09:28:23'),
(41, 'Rei', 1000, 120, 9, 0, 0, '2018-02-06 09:28:23', '2018-02-06 09:28:23');

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
(3, 'crystal', '9BC35193EE927E4047CE28012E893ED2366852ADEDE6F7699F6D92B4496DEAA5FDE1B90143ACA4BBEE8416D522FB88468E570514BE07139F07F94A8C39A335C1', 'Regular', 1, 'Active', 'asd', 'asd', NULL, '', 'asd@gmail.com', '2017-12-04', 'Male', '09239056565', 4, 1, 1, '2017-12-20 20:44:56', '2018-01-27 21:11:25'),
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
-- Dumping data for table `user_event_preference`
--

INSERT INTO `user_event_preference` (`user_event_preference_id`, `preference_date`, `user_id`, `event_id`, `addedBy`, `updatedBy`, `addedAt`, `updatedAt`) VALUES
(3, '2018-02-05 14:31:24', 3, 6, 0, 0, '2018-02-05 22:31:24', '2018-02-05 22:31:24'),
(4, '2018-02-06 01:29:49', 3, 9, 0, 0, '2018-02-06 09:29:49', '2018-02-06 09:29:49');

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
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `event_info`
--
ALTER TABLE `event_info`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `event_info_fk` (`user_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `notification_item`
--
ALTER TABLE `notification_item`
  ADD PRIMARY KEY (`notifID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `review_fk1` (`ticket_id`);

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
  MODIFY `announcementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `event_info`
--
ALTER TABLE `event_info`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `notification_item`
--
ALTER TABLE `notification_item`
  MODIFY `notifID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ticket_type`
--
ALTER TABLE `ticket_type`
  MODIFY `ticket_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_event_preference`
--
ALTER TABLE `user_event_preference`
  MODIFY `user_event_preference_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  ADD CONSTRAINT `event_info_fk` FOREIGN KEY (`user_id`) REFERENCES `user_account` (`account_id`),
  ADD CONSTRAINT `event_info_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_fk1` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`ticket_id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_fk1` FOREIGN KEY (`user_id`) REFERENCES `user_account` (`account_id`),
  ADD CONSTRAINT `ticket_fk2` FOREIGN KEY (`ticket_type_id`) REFERENCES `ticket_type` (`ticket_type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
