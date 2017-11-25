-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2017 at 12:12 PM
-- Server version: 10.1.19-MariaDB
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
  `announcementDetails` varchar(500) NOT NULL,
  `announcementStatus` enum('OnGoing','Finished') NOT NULL,
  `postedBy` int(11) NOT NULL,
  `datePosted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `card_load`
--

CREATE TABLE `card_load` (
  `card_id` int(11) NOT NULL,
  `card_code` varchar(20) NOT NULL,
  `card_amount` float NOT NULL DEFAULT '0',
  `card_active` binary(1) NOT NULL,
  `date_claimed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `account_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_info`
--

CREATE TABLE `event_info` (
  `event_id` int(11) NOT NULL,
  `event_date_start` datetime NOT NULL,
  `event_date_end` datetime NOT NULL,
  `no_tickets_total` int(11) NOT NULL,
  `event_status` enum('Pending','Approved','Rejected') DEFAULT NULL,
  `event_name` varchar(50) NOT NULL,
  `event_details` text,
  `event_category` enum('Appearance','Attraction','Retreat','Training','Concert','Conference','Convention','Gala','Festival','Competition','Meeting','Party','Rally','Screening','Seminar','Tour','Other') NOT NULL,
  `event_venue` text NOT NULL,
  `event_isActive` tinyint(1) NOT NULL DEFAULT '1',
  `event_picture` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `color` varchar(7) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notif_id` int(11) NOT NULL,
  `user_fky` int(11) NOT NULL,
  `event_fky` int(11) NOT NULL,
  `notif_status` enum('Read','Unread') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `date_sold` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ticket_type_id` int(11) DEFAULT NULL
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
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `account_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
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
  `date_account_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_event_preference`
--

CREATE TABLE `user_event_preference` (
  `user_event_preference_id` int(11) NOT NULL,
  `preference_date` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcementID`);

--
-- Indexes for table `card_load`
--
ALTER TABLE `card_load`
  ADD PRIMARY KEY (`card_id`),
  ADD KEY `card_load_fk` (`account_id`);

--
-- Indexes for table `event_info`
--
ALTER TABLE `event_info`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `event_info_fk` (`user_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notif_id`),
  ADD KEY `user_fky` (`user_fky`),
  ADD KEY `event_fky` (`event_fky`);

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
  ADD PRIMARY KEY (`account_id`);

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
  MODIFY `announcementID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `card_load`
--
ALTER TABLE `card_load`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event_info`
--
ALTER TABLE `event_info`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket_type`
--
ALTER TABLE `ticket_type`
  MODIFY `ticket_type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;
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
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`announcementID`) REFERENCES `user_account` (`account_id`);

--
-- Constraints for table `card_load`
--
ALTER TABLE `card_load`
  ADD CONSTRAINT `card_load_fk` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`);

--
-- Constraints for table `event_info`
--
ALTER TABLE `event_info`
  ADD CONSTRAINT `event_info_fk` FOREIGN KEY (`user_id`) REFERENCES `user_account` (`account_id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `event_for` FOREIGN KEY (`event_fky`) REFERENCES `event_info` (`event_id`),
  ADD CONSTRAINT `user_for` FOREIGN KEY (`user_fky`) REFERENCES `user_account` (`account_id`);

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
