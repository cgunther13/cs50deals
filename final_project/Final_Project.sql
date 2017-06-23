-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2015 at 06:22 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

//the actual values in the SQL code here 

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Final Project`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` varchar(10) NOT NULL,
  `preferences` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Username` (`username`,`number`),
  UNIQUE KEY `number` (`number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `number`, `preferences`) VALUES
(23, 'willvf13', '$2y$10$YPfRbzY6dCIh.ZliGpx0NedJCu6FZ99jhSiFzFhxIIZbG89S2Y4WG', '8564706847', '1'),
(27, 'cgunther13', '$2y$10$FYvJ3lrhCAW5Ap4jskSOqeheT2BA0W/uYxihJMyWh8WsFVfCnyiZK', '4153423525', '2'),
(28, 'alex', '$2y$10$lYWZdA71xLGTuVeir8933.TpdZzKFha4XgIaNEN.5zPHx3H2scBN.', '3059792137', '1');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE IF NOT EXISTS `vendors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deal` varchar(255) NOT NULL,
  `deal_type` varchar(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `username`, `password`, `deal`, `deal_type`) VALUES
(6, 'Ashley''s', 'Ashley''s', '$2y$10$bf.2VqGUCqyA.K86HQCMTu1f0OAii4G5kZ6UXFq4jso2mfTSsdgvS', '', '1'),
(7, 'anaya', 'anaya', '$2y$10$uAMZPdJ6YzSKUYcqg0tcVe8pMHEjaUzaoTrwkCbZ/XLaiHPRzaPhW', '', '1'),
(8, 'union league', 'ulcafe', '$2y$10$pdXLfsnQsKrza7Gr6Yw84.JSZZEEh./HI0oEVUvp/v6F8CtZAr.w6', '', '2'),
(9, 'Tea House', 'Tea House', '$2y$10$Pl36VmuduZXcVaVsUXuIpuu1cxHHxEijsfgFaRYRU5SlDdy9q/5cG', '', '2');

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`cmg65`@`localhost` EVENT `remove` ON SCHEDULE EVERY 24 HOUR STARTS '2015-12-09 00:00:00' ENDS '2016-02-29 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE vendors SET deal = ''$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
