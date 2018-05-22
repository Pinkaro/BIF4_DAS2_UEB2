-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2018 at 05:20 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bif4_das2_ueb2_db`
--
CREATE DATABASE IF NOT EXISTS `bif4_das2_ueb2_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `bif4_das2_ueb2_db`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `Email` varchar(255) COLLATE utf8_bin NOT NULL,
  `Password` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `GoogleToken` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `DigestHash` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Email`, `Password`, `GoogleToken`, `DigestHash`) VALUES
('myemail@guest.at', '$2y$10$cvoL38nREoH5AA7A4x3UkOLQvMAIQOtADpUklPzBhaFSI.pN6m0y6', NULL, '563f118adeb80dd6dcf9c8bde609ccb4');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Privileges for `Servah`@`%`

GRANT USAGE ON *.* TO 'Servah'@'%' IDENTIFIED BY PASSWORD '*EF4F55A55DE1798E32129E315B2F7F6A82E602A0';

GRANT SELECT, INSERT, UPDATE, DELETE ON `bif4_das2_ueb2_db`.* TO 'Servah'@'%';


-- Privileges for `Servah`@`localhost`

GRANT USAGE ON *.* TO 'Servah'@'localhost' IDENTIFIED BY PASSWORD '*EF4F55A55DE1798E32129E315B2F7F6A82E602A0';

GRANT SELECT, INSERT, UPDATE, DELETE ON `bif4_das2_ueb2_db`.* TO 'Servah'@'localhost';