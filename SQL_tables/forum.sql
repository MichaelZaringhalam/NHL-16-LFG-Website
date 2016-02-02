-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2015 at 01:00 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `rowid` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `tag` varchar(16) NOT NULL,
  `lfg` varchar(17) NOT NULL,
  `console` varchar(8) NOT NULL,
  `mic` tinyint(1) NOT NULL,
  `level` int(11) NOT NULL,
  `position` varchar(2) NOT NULL,
  `description` varchar(150) NOT NULL,
  `time` timestamp NOT NULL,
  PRIMARY KEY (`rowid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`rowid`, `user`, `tag`, `lfg`, `console`, `mic`, `level`, `position`, `description`, `time`) VALUES
(27, 'dannyp', 'marvilon', 'Looking For Group', 'PS4', 1, 22, 'RW', 'blah blah blah', '2015-11-24 21:49:56'),
(28, 'Guest', 'fffds', 'Looking For Group', 'PS4', 1, 33, 'C', '...........SDVDFAFSCADSFScdsgfdsgds', '2015-11-24 21:53:20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
