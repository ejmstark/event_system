-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 07:08 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `cardId` int(11) NOT NULL,
  `cardCode` varchar(10) NOT NULL,
  `cardAmount` int(11) NOT NULL,
  `cardCreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cardStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`cardId`, `cardCode`, `cardAmount`, `cardCreatedOn`, `cardStatus`) VALUES
(55, 'yx1cwudi3g', 100, '2017-11-21 06:40:39', 1),
(56, 'u05j784mwx', 200, '2017-11-22 06:00:06', 0),
(57, 'nwxejwwmrj', 500, '2017-11-21 06:40:39', 1),
(58, '96v4br6akb', 1000, '2017-11-21 06:40:39', 1),
(59, 'hd3meiugmg', 100, '2017-11-21 06:45:49', 1);

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
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `color` varchar(7) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_info`
--

INSERT INTO `event_info` (`event_id`, `event_date_start`, `event_date_end`, `no_tickets_total`, `event_status`, `event_name`, `event_details`, `event_category`, `event_venue`, `date_created`, `color`, `user_id`) VALUES
(1, '2017-10-03 00:00:00', '2017-10-19 00:00:00', 500, 'Approved', 'Event', 'Details', 'Other', 'Venue\r\n', '2017-10-02 11:48:13', 'red', 1),
(5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 100, 'Approved', 'USC Wariors Night', 'USC Warioirs Night is a event oraganized by USC Supreme Student council that aims to ignite the Carolinian Spirit and foster comrandery amongst the Carlonian ', 'Concert', 'USC TC', '2017-10-02 15:29:08', NULL, 1),
(10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 70, 'Approved', 'Software Engineering Presentation', 'Presentation of the whole system.', 'Meeting', 'USC TC', '2017-10-02 16:13:44', NULL, 1),
(11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 43, 'Approved', 'IAFT Open House', 'Tour on the school and film short classes.', '', 'IAFT, Lapu Lapu', '2017-10-02 16:19:02', NULL, 2),
(12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 50, 'Rejected', 'SRM Reportin', 'SRM Reporting will be held at USC TC at BUnzel building room 461.', 'Conference', 'USC TC', '2017-10-03 03:31:09', NULL, 1),
(13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 50, 'Approved', 'Ethics Reporting', 'REporting sa Tethics sa LB 446 ', 'Party', 'USC TC', '2017-10-03 04:45:10', NULL, 1);

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

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `date_sold`, `user_id`, `ticket_type_id`) VALUES
(1, '2017-10-02 05:47:58', 1, 1),
(2, '2017-10-02 05:47:58', 1, 1),
(3, '2017-10-02 05:47:58', 1, 1),
(4, '2017-10-02 14:26:32', 2, 12),
(5, '2017-10-02 14:26:32', 2, 12),
(6, '2017-10-02 14:26:32', 2, 12),
(7, '2017-10-02 14:26:32', 2, 12),
(8, '2017-10-02 14:26:32', 2, 12),
(9, '2017-10-02 15:24:34', 1, 1);

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

--
-- Dumping data for table `ticket_type`
--

INSERT INTO `ticket_type` (`ticket_type_id`, `ticket_name`, `price`, `ticket_count`, `event_id`) VALUES
(1, 'Premium', 100, 10, 1),
(2, 'Premium', 150, 50, 5),
(3, 'Silver', 100, 30, 5),
(4, 'Gold', 50, 20, 5),
(8, 'Premium', 500, 10, 10),
(9, 'Silver', 500, 10, 10),
(10, 'Gold', 600, 50, 10),
(11, 'Premium', 100, 10, 11),
(12, 'Gold', 350, 3, 11),
(13, 'Silver', 50, 30, 11),
(14, 'Premium', 200, 50, 12),
(15, 'Premium', 100, 50, 13);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `account_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` enum('Regular','Admin','Superadmin','') NOT NULL,
  `user_status` enum('Active','Banned') NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_initial` char(1) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `contact_no` varchar(16) DEFAULT NULL,
  `load_amt` float NOT NULL DEFAULT '0',
  `date_account_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`account_id`, `user_name`, `password`, `user_type`, `user_status`, `first_name`, `last_name`, `middle_initial`, `email`, `birthdate`, `gender`, `contact_no`, `load_amt`, `date_account_created`) VALUES
(1, 'user', 'user', 'Admin', 'Active', 'user', 'user', 'u', 'user@gmail.com', '1998-08-17', 'Male', '09254815798', 500, '2017-08-16 00:00:00'),
(2, 'test', '123qweasd', 'Regular', 'Active', 'testq', 'test', 't', 'jen@gmail.com', '0000-00-00', 'Female', '0999999999', 0, '2017-10-02 01:21:21'),
(3, 'sep', 'sep', 'Regular', 'Active', 'Joseph', 'Entoma', 'A', 'seppjooo@gmail.com', '2017-10-17', 'Other', '09323770455', 2300, '2017-10-02 14:36:56'),
(4, 'bis', 'bis', 'Regular', 'Active', 'Yves', 'Libunao', 'O', 'yves@gmail.com', '2017-10-02', 'Female', '0923585454', 0, '2017-10-02 15:02:09'),
(5, '', '', 'Regular', 'Active', '', '', '', '', '0000-00-00', 'Male', '', 0, '2017-10-03 15:04:44'),
(6, 'test', 'test', 'Admin', 'Active', 'test', 'test', 't', 'test@gmail.com', '0000-00-00', 'Female', '03265885', 0, '2017-10-03 17:50:25');

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
-- Dumping data for table `user_event_preference`
--

INSERT INTO `user_event_preference` (`user_event_preference_id`, `preference_date`, `user_id`, `event_id`) VALUES
(1, '2017-10-02 05:13:22', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`cardId`);

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
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `cardId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `event_info`
--
ALTER TABLE `event_info`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ticket_type`
--
ALTER TABLE `ticket_type`
  MODIFY `ticket_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_event_preference`
--
ALTER TABLE `user_event_preference`
  MODIFY `user_event_preference_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
