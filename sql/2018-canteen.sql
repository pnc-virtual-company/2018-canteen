-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
<<<<<<< HEAD
-- Generation Time: May 16, 2018 at 12:54 PM
=======
-- Generation Time: May 16, 2018 at 01:01 PM
>>>>>>> 3f27524eb721f1077c51a1817db5b051387a0f9b
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dishes`
--

INSERT INTO `tbl_dishes` (`dish_id`, `dish_name`, `dish_image`, `description`, `dish_active`, `meal_time_id`, `menu_created_date`, `menu_description`, `interest`, `current_interest`) VALUES
(10, 'Borbor', 'Borbor.png', 'Borbor is popular food for PN in the evening.', 1, 1, '2018-05-15', 'This is the food for today.', NULL, NULL),
(11, 'Amok-Carry', 'Amok-Carry.png', 'Amok-Carry is the best food for all student to get power.', 1, 2, '2018-05-24', 'fghjkl', NULL, NULL),
(12, 'Brohok', 'Brohok.png', 'Brohok is also have a lot of student favorite it.', 1, 1, '2018-05-15', 'This is the food for today.', NULL, NULL),
(13, 'Fried-sea-snails', 'Fried-sea-snails.png', 'Fried-sea-snails is special food for all students and staff at PNC.', 1, 1, '2018-05-15', 'Food for breakfast for student in PNC canteen.', NULL, NULL),
(14, 'Massam-carry', 'Massam-carry.png', 'Massam-carry very good food for health in PNC.', 1, 1, '2018-05-11', 'Book now nice', NULL, NULL),
(15, 'Mchu_trokon', 'Mchu_trokon.png', 'Mchu_trokon is kind of food have a lot of vitamin for health.', 1, 3, '2018-05-03', 'jk', NULL, NULL),
(16, 'Mecha', 'Mecha.png', 'Mecha is a kind of food that very popular in PNC at the evening. ', 1, 1, '2018-05-12', 'menu description for today.', NULL, NULL),
(17, 'Nom', 'Nom.png', 'Nom is also popular for the all party in PNC.', 0, 3, NULL, NULL, NULL, NULL),
(18, 'Nom-Banh-Chok', 'Nom-Banh-Chok.png', 'Nom-Banh-Chok is good and delicious. ', 1, 1, '2018-05-15', 'Delicious food', NULL, NULL),
(19, 'Noudle_sup', 'Noudle_sup.png', 'Noudle_sup is very good food for student in the morning. ', 1, 2, '2018-05-11', 'mlkj', NULL, NULL),
(20, 'Phat_Thai', 'Phat_Thai.png', 'Phat_Thai is new food for PNC\'s canteen.', 1, 2, '2018-05-11', 'fgdd', NULL, NULL),
(21, 'SourSoup', 'SourSoup.png', 'SourSoup is more good sup for students and staffs. ', 0, 1, NULL, NULL, NULL, NULL),
(22, 'Thai-red-curry', 'Thai-red-curry.png', 'Thai-red-curry is very good sup for all students for lunch. ', 1, 1, '2018-05-12', 'menu description for today.', NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dish_user`
--

INSERT INTO `tbl_dish_user` (`dish_user_id`, `dish_id`, `user_id`, `order_id`) VALUES
(1, 10, 2, 4),
(2, 14, 1, 2),
(3, 11, 3, 1),
(4, 11, 5, 3),
(5, 14, 4, 1),
(6, 14, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

DROP TABLE IF EXISTS `tbl_events`;
CREATE TABLE IF NOT EXISTS `tbl_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(7) NOT NULL DEFAULT '#3a87ad',
  `dinner_events` varchar(100) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`id`, `title`, `description`, `color`, `dinner_events`, `start`, `end`) VALUES
(3, 'Holiday Celemoneysdsd', 'sdsdsd', '#a31cc4', 'Weekly Dinner', '2018-04-25 00:00:00', '2018-04-25 09:00:00'),
(18, 'Holiday Celemoney', 'Create a database named (for example) skeleton with the collatin', '#917a4c', 'Monthly Dinner', '2018-05-17 00:00:00', '2018-05-18 00:00:00'),
(19, 'Holiday Celemoney', 'xoption utf8_general_ci Create a database named (for example) skeleton with the collating Import the schema by using the SQL script provided into the SQL folder.', '#bfaa5e', '', '2018-05-01 00:00:00', '2018-05-02 00:00:00'),
(20, 'SA Meeting', 'I would like to inform you to join Homey Meeting for tomorrow.', '#28782b', '', '2018-05-07 01:00:00', '2018-05-07 03:30:00'),
(24, 'Client Demonstrative Project', 'Demo to client about project.', '#3fe8bf', '', '2018-05-04 00:00:00', '2018-05-05 00:00:00'),
(25, 'Team Meeting', 'Divide the tasks.', '#9590d1', 'Monthly Dinner', '2018-04-29 00:00:00', '2018-04-30 00:00:00'),
(26, 'Khai Birthday', 'Pay for eating soup at the pagoda.', '#8f7109', 'Monthly Dinner', '2018-05-06 00:00:00', '2018-05-06 05:30:00'),
(27, 'Chantha Birthday', 'Chantha will pay team for eating ice-cream at Royal Palace.', '#3a87ad', 'Weekly Dinner', '2018-04-29 00:00:00', '2018-04-30 00:00:00'),
(29, 'Demo to client about project.', 'Demo to client about project.', '#ba2929', 'Monthly Dinner', '2018-05-02 00:00:00', '2018-05-03 00:00:00'),
(30, 'Team Discussion', 'I would like to inform you to join Homey Meeting for tomorrow.', '#ba2929', 'Monthly Dinner', '2018-05-02 00:00:00', '2018-05-03 00:00:00'),
(31, 'Sun Birthday', 'I would like to inform you to join Homey Meeting for tomorrow.', '#6d93bf', 'Monthly Dinner', '2018-05-16 00:00:00', '2018-05-17 00:00:00'),
(34, 'Demo Client', 'Demo to client about project.', '#b82bc4', 'Weekly Dinner', '2018-05-14 00:00:00', '2018-05-15 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `quantity`, `meal_time`, `date`) VALUES
(1, 2, 'Break fast', '2018-05-11'),
(2, 2, 'Lunch', '2018-05-15'),
(3, 3, 'Breakfast', '2018-05-16'),
(4, 2, 'Dinner', '2018-05-16'),
(5, 1, 'Lunch', '2018-05-17'),
(6, 4, 'Breakfast', '2018-05-17');

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
(3, 'Staff'),
(8, 'Super Admin');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `firstname`, `lastname`, `login`, `email`, `image`, `password`, `active`, `card_id`, `gender`, `class_name`, `role`) VALUES
(1, 'kimsoeng', 'kao', 'admin', 'kimseong.kao@gmail.com', 'admin.png', '$2a$08$cnX6al6aTkoyh/N/tKZ11e8ec9J/sldA6R4NdP.2qhhDi0OD3ek1G', 1, 'PNC2018-029', 'Female', 'WEP-2018', 1),
(2, 'rady', 'y', 'rady.y', 'rady@gmail.com', 'rady.png', '$2a$08$cnX6al6aTkoyh/N/tKZ11e8ec9J/sldA6R4NdP.2qhhDi0OD3ek1G', 1, 'staff_251', 'Male', 'Training', 2),
(3, 'chandaravotey', 'soriya', 'daravotey', 'daravotey@gmail.com', 'image.png', '$2a$08$cnX6al6aTkoyh/N/tKZ11e8ec9J/sldA6R4NdP.2qhhDi0OD3ek1G', 1, 'PNC2020-012', 'Female', '2020-A', 2),
(4, 'sovankesey', 'mohareach', 'sovankesey', 'sovankesey@gmail.com', 'image.png', '$2a$08$cnX6al6aTkoyh/N/tKZ11e8ec9J/sldA6R4NdP.2qhhDi0OD3ek1G', 1, 'PNC2020 - 039', 'Female', '2020 - B', 2),
(5, 'Sim', 'Hul', 'sim.hul', 'sim.hul@gmail.com', 'image.jpg', '$2a$08$cnX6al6aTkoyh/N/tKZ11e8ec9J/sldA6R4NdP.2qhhDi0OD3ek1G', 1, 'Staff_200', 'Male', 'Education Team', 2),
(6, 'chantha', 'roeurn', 'khai', 'sun.meas@gmail.com', 'profile3.png', '$2a$08$fjV9P5/4WMXT64iMHgWj9uWePWyjjmo36fm8wcC3JFZV3i2ckNo7e', 1, 'PNC2018-028', 'Female', 'WEP-2018', 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_dishes`
--
ALTER TABLE `tbl_dishes`
  ADD CONSTRAINT `fk_tbl_dish_tbl_meal_time1` FOREIGN KEY (`meal_time_id`) REFERENCES `tbl_meal_time` (`time_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_dish_user`
--
ALTER TABLE `tbl_dish_user`
  ADD CONSTRAINT `fk_dish_user_tbl_order1` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_dish_has_tbl_users_tbl_dish1` FOREIGN KEY (`dish_id`) REFERENCES `tbl_dishes` (`dish_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_dish_has_tbl_users_tbl_users1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
