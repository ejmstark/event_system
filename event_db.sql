-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2017 at 11:59 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3635174_event_db`
--

--
-- Dumping data for table `card_load`
--

INSERT INTO `card_load` (`card_id`, `card_code`, `card_amount`, `card_active`, `account_id`) VALUES
(1, '123', 100, 0x01, 1),
(2, '2525', 250, 0x01, 1);

--
-- Dumping data for table `event_info`
--

INSERT INTO `event_info` (`event_id`, `event_date_start`, `event_date_end`, `no_tickets_total`, `event_status`, `event_name`, `event_details`, `event_category`, `event_venue`, `date_created`, `color`, `user_id`) VALUES
(1, '2017-10-03 00:00:00', '2017-10-19 00:00:00', 500, 'Approved', 'Event', 'Details', 'Other', 'Venue\r\n', '2017-10-02 11:48:13', 'red', 1),
(5, '2017-10-10 04:03:06', '2017-10-18 00:00:00', 100, 'Pending', 'USC Wariors Night', 'USC Warioirs Night is a event oraganized by USC Supreme Student council that aims to ignite the Carolinian Spirit and foster comrandery amongst the Carlonian ', 'Concert', 'USC TC', '2017-10-02 15:29:08', NULL, 1),
(10, '2017-10-05 00:00:00', '2017-10-08 00:00:00', 70, 'Approved', 'Software Engineering Presentation', 'Presentation of the whole system.', 'Meeting', 'USC TC', '2017-10-02 16:13:44', NULL, 1),
(11, '2017-10-15 00:00:00', '2017-10-19 00:00:00', 43, 'Approved', 'IAFT Open House', 'Tour on the school and film short classes.', '', 'IAFT, Lapu Lapu', '2017-10-02 16:19:02', NULL, 2),
(12, '2017-10-18 00:00:00', '2017-10-20 00:00:00', 20, 'Pending', 'Event Name', 'Description', 'Conference', 'USC TC', '2017-10-03 16:07:35', NULL, 1),
(13, '2017-10-29 12:00:00', '2017-10-31 12:00:00', 3, 'Pending', 'Software Engineering Integration', 'Integration of the Daily Events System.', '', 'Mabolo, Cebu City', '2017-10-03 19:05:29', NULL, 3);

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
(9, '2017-10-03 14:57:41', 1, 12),
(10, '2017-10-03 17:13:22', 3, 1);

--
-- Dumping data for table `ticket_type`
--

INSERT INTO `ticket_type` (`ticket_type_id`, `ticket_name`, `price`, `ticket_count`, `event_id`) VALUES
(1, 'Premium', 100, 0, 1),
(2, 'Premium', 150, 50, 5),
(3, 'Silver', 100, 30, 5),
(4, 'Gold', 50, 20, 5),
(8, 'Premium', 500, 10, 10),
(9, 'Silver', 500, 10, 10),
(10, 'Gold', 600, 50, 10),
(11, 'Premium', 100, 10, 11),
(12, 'Gold', 350, 3, 11),
(13, 'Silver', 50, 30, 11),
(14, 'Type', 600, 20, 12),
(15, 'VIP', 1000, 3, 13);

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`account_id`, `user_name`, `password`, `user_type`, `user_status`, `first_name`, `last_name`, `middle_initial`, `email`, `birthdate`, `gender`, `contact_no`, `load_amt`, `date_account_created`) VALUES
(1, 'user', 'user', 'Admin', 'Active', 'user', 'user', 'u', 'user@gmail.com', '1998-08-17', 'Male', '09254815798', 650, '2017-08-16 00:00:00'),
(2, 'test', '123qweasd', 'Regular', 'Banned', 'testq', 'test', 't', 'jen@gmail.com', '0000-00-00', 'Female', '0999999999', 0, '2017-10-02 01:21:21'),
(3, 'sep', 'sep', 'Regular', 'Active', 'Joseph', 'Entoma', 'A', 'seppjooo@gmail.com', '2017-10-17', 'Other', '09323770455', 0, '2017-10-02 14:36:56'),
(4, 'bis', 'bis', 'Regular', 'Active', 'Yves', 'Libunao', 'O', 'yves@gmail.com', '2017-10-02', 'Female', '0923585454', 0, '2017-10-02 15:02:09');

--
-- Dumping data for table `user_event_preference`
--

INSERT INTO `user_event_preference` (`user_event_preference_id`, `preference_date`, `user_id`, `event_id`) VALUES
(1, '2017-10-02 05:13:22', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
