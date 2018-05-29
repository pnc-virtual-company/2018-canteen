-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 28, 2018 at 01:25 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2018vc2ge_canteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

DROP TABLE IF EXISTS `tbl_comment`;
CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_name` varchar(255) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dinner_events`
--

DROP TABLE IF EXISTS `tbl_dinner_events`;
CREATE TABLE IF NOT EXISTS `tbl_dinner_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(7) NOT NULL DEFAULT '#3a87ad',
  `dinner_events` varchar(100) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dinner_events`
--

INSERT INTO `tbl_dinner_events` (`id`, `title`, `description`, `color`, `dinner_events`, `start`, `end`) VALUES
(52, 'Student Dinner', 'Join all together at PNC', '#eb49a0', '', '2018-05-02 00:00:00', '2018-05-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dishes`
--

DROP TABLE IF EXISTS `tbl_dishes`;
CREATE TABLE IF NOT EXISTS `tbl_dishes` (
  `dish_id` int(11) NOT NULL AUTO_INCREMENT,
  `dish_name` varchar(45) DEFAULT NULL,
  `dish_image` varchar(70) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `dish_active` int(11) DEFAULT NULL,
  `meal_time_id` int(11) NOT NULL,
  `menu_created_date` date DEFAULT NULL,
  `menu_description` varchar(255) DEFAULT NULL,
  `interest` int(11) DEFAULT NULL,
  `current_interest` int(11) DEFAULT NULL,
  PRIMARY KEY (`dish_id`),
  KEY `fk_tbl_dish_tbl_meal_time1_idx` (`meal_time_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dishes`
--

INSERT INTO `tbl_dishes` (`dish_id`, `dish_name`, `dish_image`, `description`, `dish_active`, `meal_time_id`, `menu_created_date`, `menu_description`, `interest`, `current_interest`) VALUES
(33, 'Amok-Carry', 'Amok-Carry1.png', 'Amok-Carry is very popular for PNC student.', 1, 1, NULL, 'This is the food for Today.', 10, NULL),
(34, 'Borbor', 'Borbor7.png', 'Borbor is the best food in the morning. ', 1, 1, '2018-06-08', 'This is the food for Today.', 10, 7),
(35, 'Khmer Carry', 'Massam-carry2.png', 'Very Delicious for the breakfast and most of student and staff really enjoy to have this food.', 1, 1, NULL, 'This is the food for Today.', 30, NULL),
(36, 'Brohok', 'Brohok1.png', 'Brohok is very delicious for all student and staff. ', 1, 1, NULL, 'This is the food for Today.', 20, NULL),
(37, 'Fried-sea-snails', 'Fried-sea-snails1.png', 'This is the interesting food for the student and staff to have during lunch time meal.', 1, 1, '2018-06-08', 'This is the food for Today.', 12, NULL),
(38, 'Mchu_trokon', 'Mchu_trokon2.png', 'Mchu-Trokun look sample, but it still get more interesting from student and it is more interesting if we add with cheery.', 1, 2, '2018-05-29', 'The food for lunch ', 20, NULL),
(39, 'Mecha', 'Mecha2.png', 'Mecha is a very nice food for dinner.', 0, 3, NULL, NULL, 26, NULL),
(40, 'Thai-red-curry', 'Thai-red-curry2.png', 'Thai-red-curry is very popular food for lunch.', 0, 2, NULL, NULL, 34, NULL),
(41, 'Noudle_sup', 'Noudle_sup2.png', 'Noudle_sup is the best food for PNC lunch.', 0, 2, NULL, NULL, 18, NULL),
(42, 'Nom', 'Nom1.png', 'Nom is second popular food in PNC canteen.', 0, 3, NULL, NULL, 28, NULL),
(43, 'Nom-Banh-Chok', 'Nom-Banh-Chok2.png', 'Nom-Banh-Chok is nice food in canteen of PNC.', 1, 1, '2018-05-28', 'This is the food for Today.', 41, 2),
(44, 'Massam-carry', 'Massam-carry3.png', 'Massam-carry is the best food in canteen manager also create in PNC.', 1, 1, '2018-05-28', 'This is the food for Today.', 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dish_user`
--

DROP TABLE IF EXISTS `tbl_dish_user`;
CREATE TABLE IF NOT EXISTS `tbl_dish_user` (
  `dish_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `dish_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`dish_user_id`),
  KEY `fk_tbl_dish_has_tbl_users_tbl_users1_idx` (`user_id`),
  KEY `fk_tbl_dish_has_tbl_users_tbl_dish1_idx` (`dish_id`),
  KEY `fk_dish_user_tbl_order1_idx` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dish_user`
--

INSERT INTO `tbl_dish_user` (`dish_user_id`, `dish_id`, `user_id`, `order_id`) VALUES
(1, 10, 2, 4),
(2, 14, 1, 2),
(3, 11, 3, 1),
(4, 11, 5, 3),
(5, 14, 4, 1),
(6, 14, 4, 5),
(7, 10, 1, 7),
(8, 13, 1, 8),
(9, 19, 1, 9),
(10, 10, 1, 10),
(11, 13, 7, 11),
(12, 11, 1, 12),
(13, 11, 7, 13),
(14, 11, 7, 14),
(15, 13, 1, 15),
(19, 10, 1, 19),
(20, 16, 1, 20),
(21, 16, 1, 21),
(22, 28, 1, 21),
(23, 28, 1, 22),
(24, 28, 11, 23),
(25, 28, 11, 24),
(26, 28, 1, 25),
(27, 31, 11, 26),
(28, 29, 11, 27),
(29, 30, 11, 28),
(30, 28, 3, 29),
(31, 32, 1, 30),
(32, 33, 1, 31),
(33, 33, 1, 32),
(34, 33, 1, 33),
(35, 28, 1, 34),
(36, 29, 11, 35),
(37, 28, 11, 36),
(38, 33, 11, 37),
(39, 30, 11, 38),
(40, 32, 11, 39),
(41, 31, 1, 40),
(42, 28, 1, 41),
(43, 28, 1, 42),
(44, 29, 1, 43),
(45, 32, 1, 44),
(46, 33, 1, 45),
(47, 30, 1, 46),
(48, 31, 11, 47),
(49, 29, 11, 48),
(50, 30, 11, 49),
(51, 30, 7, 50),
(52, 31, 7, 51),
(53, 31, 11, 52),
(54, 31, 13, 53),
(55, 30, 1, 54),
(56, 32, 1, 55),
(57, 32, 11, 56),
(58, 34, 11, 57),
(59, 43, 1, 58),
(60, 43, 11, 59);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_join_events`
--

DROP TABLE IF EXISTS `tbl_join_events`;
CREATE TABLE IF NOT EXISTS `tbl_join_events` (
  `join_event_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `dinner_event_id` int(11) NOT NULL,
  PRIMARY KEY (`join_event_id`),
  KEY `user_id` (`user_id`),
  KEY `dinner_event_id` (`dinner_event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_join_events`
--

INSERT INTO `tbl_join_events` (`join_event_id`, `user_id`, `dinner_event_id`) VALUES
(24, 11, 52),
(31, 11, 52);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lunch_events`
--

DROP TABLE IF EXISTS `tbl_lunch_events`;
CREATE TABLE IF NOT EXISTS `tbl_lunch_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(7) NOT NULL DEFAULT '#3a87ad',
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_lunch_events`
--

INSERT INTO `tbl_lunch_events` (`id`, `title`, `description`, `color`, `start`, `end`) VALUES
(3, 'Holiday Celemoneysdsd', 'sdsdsd', '#a31cc4', '2018-04-25 00:00:00', '2018-04-25 09:00:00'),
(19, 'Holiday Celemony party', 'at school party around 6:00pm', '#bfaa5e', '2018-05-21 00:00:00', '2018-05-22 00:00:00'),
(46, 'Solidarity Staff Lunch', 'I would like to invite all of you to participate the staff lunch at 11:30 AM on Wednesday. I hope all of you will satify and enjoy the lunch. The event will be happy if have a nice participation. Thank you in advance.', '#de1414', '2018-05-25 00:00:00', '2018-05-26 00:00:00'),
(72, 'Staff solidarity lunch', 'I would like to invite all of you to participate the staff lunch at 11:30 AM on Wednesday. I hope all of you will satify and enjoy the lunch. The event will be happy if have a nice participation. Thank you in advance.', '#8a0dd6', '2018-05-02 00:00:00', '2018-05-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meal_time`
--

DROP TABLE IF EXISTS `tbl_meal_time`;
CREATE TABLE IF NOT EXISTS `tbl_meal_time` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_meal_time`
--

INSERT INTO `tbl_meal_time` (`time_id`, `name`) VALUES
(1, 'BreakFast'),
(2, 'Lunch'),
(3, 'Dinner');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(45) DEFAULT NULL,
  `meal_time` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `quantity`, `meal_time`, `date`) VALUES
(1, 2, 'Break fast', '2018-05-11'),
(2, 2, 'Lunch', '2018-05-15'),
(3, 3, 'Breakfast', '2018-05-16'),
(4, 2, 'Dinner', '2018-05-16'),
(5, 1, 'Lunch', '2018-05-17'),
(6, 4, 'Breakfast', '2018-05-17'),
(7, 1, '1', '2018-05-17'),
(8, 3, '1', '2018-05-17'),
(9, 8, '1', '2018-05-17'),
(10, 10, '1', '2018-05-17'),
(11, 9, '1', '2018-05-17'),
(12, 10, '2', '2018-05-19'),
(13, 10, '2', '2018-05-19'),
(14, 6, '2', '2018-05-19'),
(15, 1, '2', '2018-05-20'),
(19, 1, '1', '2018-05-23'),
(20, 9, '1', '2018-05-23'),
(21, 10, '1', '2018-05-24'),
(22, 8, '1', '2018-05-24'),
(23, 1, '1', '2018-05-24'),
(24, 1, '1', '2018-05-24'),
(25, 10, '1', '2018-05-25'),
(26, 10, '1', '2018-05-25'),
(27, 2, '3', '2018-05-25'),
(28, 3, '3', '2018-05-25'),
(29, 1, '1', '2018-05-25'),
(30, 4, '2', '2018-05-25'),
(31, 10, '1', '2018-05-25'),
(32, 10, '1', '2018-05-25'),
(33, 10, '1', '2018-05-25'),
(34, 10, '2', '2018-05-25'),
(35, 5, '1', '2018-05-25'),
(36, 10, '2', '2018-05-25'),
(37, 3, '1', '2018-05-25'),
(38, 8, '1', '2018-05-25'),
(39, 10, '2', '2018-05-25'),
(40, 5, '1', '2018-05-26'),
(41, 10, '2', '2018-05-26'),
(42, 10, '3', '2018-05-26'),
(43, 1, '3', '2018-05-26'),
(44, 6, '1', '2018-05-26'),
(45, 1, '1', '2018-05-26'),
(46, 1, '3', '2018-05-26'),
(47, 3, '2', '2018-05-26'),
(48, 4, '3', '2018-05-26'),
(49, 1, '1', '2018-05-27'),
(50, 2, '1', '2018-05-27'),
(51, 2, '1', '2018-05-27'),
(52, 1, '1', '2018-05-27'),
(53, 1, '1', '2018-05-27'),
(54, 9, '1', '2018-05-27'),
(55, 5, '1', '2018-05-27'),
(56, 1, '1', '2018-05-27'),
(57, 1, '1', '2018-05-28'),
(58, 10, '1', '2018-05-28'),
(59, 9, '1', '2018-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rates`
--

DROP TABLE IF EXISTS `tbl_rates`;
CREATE TABLE IF NOT EXISTS `tbl_rates` (
  `rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_rate` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`rate_id`),
  KEY `dish_id` (`dish_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rates`
--

INSERT INTO `tbl_rates` (`rate_id`, `store_rate`, `dish_id`, `user_id`) VALUES
(1, 1, 34, 11),
(2, 1, 34, 11),
(3, 1, 34, 11),
(4, 1, 34, 11),
(5, 1, 34, 11),
(6, 1, 34, 11),
(7, 1, 34, 11),
(11, 1, 44, 1),
(15, 1, 43, 1),
(16, 1, 44, 11),
(18, 1, 43, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

DROP TABLE IF EXISTS `tbl_roles`;
CREATE TABLE IF NOT EXISTS `tbl_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User'),
(4, 'Staff'),
(8, 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_participation`
--

DROP TABLE IF EXISTS `tbl_staff_participation`;
CREATE TABLE IF NOT EXISTS `tbl_staff_participation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `lunch_event_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `reminded` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `lunch_event_id` (`lunch_event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_staff_participation`
--

INSERT INTO `tbl_staff_participation` (`id`, `user_id`, `lunch_event_id`, `status`, `reminded`) VALUES
(22, 11, 46, 0, 1),
(23, 14, 72, 0, 0),
(24, 16, 72, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `active` int(32) DEFAULT NULL,
  `card_id` varchar(20) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `class_name` varchar(20) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `firstname`, `lastname`, `login`, `email`, `image`, `password`, `active`, `card_id`, `gender`, `class_name`, `role`) VALUES
(1, 'Canteen', 'Manager', 'admin', 'kimseong.kao@gmail.com', 'admin.png', '$2a$08$cnX6al6aTkoyh/N/tKZ11e8ec9J/sldA6R4NdP.2qhhDi0OD3ek1G', 1, 'PNC2018-029', 'Female', 'WEP-2018', 1),
(7, 'sun', 'meas', 'sun.meas', 'sun.meas@student.passerellesnuemriques.org', 'profile32.png', '$2a$08$psRAWInAIwJRT1v8fDBAbu3ELtdMg41Oz0BnYds7owL0qVO.46aUu', 1, 'PNC-2018-0014', 'Male', 'WEP-2018', 2),
(11, 'Admin', 'Finance', 'super', 'kimsoeng.kao@gmial.com', 'super.png', '$2a$08$cnX6al6aTkoyh/N/tKZ11e8ec9J/sldA6R4NdP.2qhhDi0OD3ek1G', 1, 'PNC2018-029', 'Female', 'Training Department', 8),
(13, 'khai', 'hok', 'khai.hok', 'khai.hok.cambodia@gmail.com', 'profile41.png', '$2a$08$hQSLwJxEmMQoBHIhd2.Ffe3lp5HYOp0qpb/DzhJMdWNLyqLNu/iR6', 1, 'PNC2018_029', 'Male', 'WEP-2018', 2),
(14, 'Sokhom', 'Hean', 'sokhom.hean', 'sokhom.hean@passerellesnumeriques.org', 'profile81.png', '$2a$08$c924gwfDxaoiRJxaoQ05T.RVk55KabIW7rdBGfqSjwRyxzoAvy1qm', 1, 'ST0012', 'Male', 'English Trainer', 4),
(15, 'Benjamin', 'Balet', 'benjamin.balet', 'benjamin.balet@passerellesnumeriques.org', 'profile31.png', '$2a$08$fMSTCIvBNDannL7wHfZa6.SXPDkuP8nAOl/4i6paFjgFIJ//sGPs.', 1, 'ST0012', 'Male', 'WEP-Trainer', 4),
(16, 'Rady', 'Y', 'rady.y', 'rady.y@passerellesnumeriques.org', 'profile61.png', '$2a$08$PLP7DW5SjOqgtNgQG0VvpuFIcDJCyFqIuRahthCqYMEfb51DBJU6y', 1, 'PNC033-WEB', 'Male', 'WEP-Trainer', 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_dishes`
--
ALTER TABLE `tbl_dishes`
  ADD CONSTRAINT `fk_tbl_dish_tbl_meal_time1` FOREIGN KEY (`meal_time_id`) REFERENCES `tbl_meal_time` (`time_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_join_events`
--
ALTER TABLE `tbl_join_events`
  ADD CONSTRAINT `tbl_join_events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`),
  ADD CONSTRAINT `tbl_join_events_ibfk_2` FOREIGN KEY (`dinner_event_id`) REFERENCES `tbl_dinner_events` (`id`);

--
-- Constraints for table `tbl_staff_participation`
--
ALTER TABLE `tbl_staff_participation`
  ADD CONSTRAINT `lunch_event_id` FOREIGN KEY (`lunch_event_id`) REFERENCES `tbl_lunch_events` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
