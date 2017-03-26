-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2017 at 01:54 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `url`
--
CREATE DATABASE IF NOT EXISTS `url` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `url`;

-- --------------------------------------------------------

--
-- Table structure for table `clicks`
--

CREATE TABLE IF NOT EXISTS `clicks` (
  `id_url` int(11) NOT NULL DEFAULT '0',
  `url` varchar(250) DEFAULT NULL,
  `clicks` int(11) NOT NULL,
  `acortada` varchar(30) NOT NULL,
  `cookie` int(100) NOT NULL,
  UNIQUE KEY `id_url` (`id_url`),
  KEY `url` (`url`),
  KEY `id_url_2` (`id_url`),
  KEY `clicks_2` (`clicks`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE IF NOT EXISTS `url` (
  `id_url` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(250) NOT NULL DEFAULT '',
  `acortada` varchar(30) NOT NULL,
  `cookie` int(100) NOT NULL,
  UNIQUE KEY `id_url_2` (`id_url`),
  KEY `url` (`url`),
  KEY `id_url` (`id_url`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Triggers `url`
--
DROP TRIGGER IF EXISTS `url_clicks`;
DELIMITER //
CREATE TRIGGER `url_clicks` AFTER INSERT ON `url`
 FOR EACH ROW INSERT INTO clicks (id_url,url,acortada,cookie) values (NEW.id_url, NEW.url, NEW.acortada, NEW.cookie)
//
DELIMITER ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clicks`
--
ALTER TABLE `clicks`
  ADD CONSTRAINT `clicks_ibfk_1` FOREIGN KEY (`id_url`) REFERENCES `url` (`id_url`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
