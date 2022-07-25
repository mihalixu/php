-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 11:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `first_name`, `last_name`) VALUES
(1, 'Mario', 'Gigings'),
(2, 'Gerald', 'Kross'),
(3, 'Sebastin', 'Kainz'),
(4, 'Rudolf', 'Maier'),
(5, 'Muhamed', 'Algiri'),
(6, 'Froer', 'Calamrius');

-- --------------------------------------------------------

--
-- Table structure for table `gebuchte_termine`
--

CREATE TABLE `gebuchte_termine` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `termine_id` int(11) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `SVN` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gebuchte_termine`
--

INSERT INTO `gebuchte_termine` (`id`, `user_id`, `termine_id`, `DOB`, `SVN`) VALUES
(35, 25, 230, '1992-03-03', '6045 131234'),
(36, 6, 231, '1992-03-03', '6045 131234');

-- --------------------------------------------------------

--
-- Table structure for table `termine`
--

CREATE TABLE `termine` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) NOT NULL,
  `uhrzeit` varchar(16) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `termine`
--

INSERT INTO `termine` (`id`, `datum`, `uhrzeit`, `doctor_id`, `status`) VALUES
(230, '2022-06-30', '14:00-14:35', 4, 2),
(231, '2022-06-30', '08:00-08:30', 5, 2),
(232, '2022-06-22', '08:00-08:30', 4, 1),
(233, '2022-06-25', '08:00-08:30', 2, 1),
(234, '2022-06-30', '08:00-08:30', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(64) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `status`) VALUES
(6, 'Mihael', 'Subasic', 'miha', 'mihaelsubasic69@gmail.com', '123', 1),
(7, 'Mihael', 'Subasic', 'admin', 'mihael.subasic@bulme.at', 'admin', 2),
(8, 'nihad', 'tiko', 'tri ', 'niho@bulme.at', 'dva', 1),
(9, 'Mihael', 'Subasic', 'tika', 'mihaelsubasic69@gmail.com', 'taka', 1),
(10, 'Mihael', 'Subasic', 'kiler123', 'mihaelsubasic69@gmail.com', '12345', 1),
(11, 'Mihael', 'Subasic', 'kiko', 'mihaelsubasic69@gmail.com', '123', 1),
(12, 'Mihael', 'Subasic', 'tiko', 'mihaelsubasic69@gmail.com', 'liko', 1),
(13, 'Kristian', 'Golubovic', 'hakala', 'hakala@com.at', 'jaki', 1),
(14, 'Mihael', 'Subasic', 'mihambi', 'mihaelsubasic69@gmail.com', 'lepi', 1),
(15, 'Kristina', 'Skvorc', 'kikica', 'kristinaskvorc2@gmail.com', 'lilica', 1),
(16, 'Mihael', 'Subasic', 'nihad', 'mihaelsubasic69@gmail.com', 'treho', 1),
(17, 'Mihael', 'Subasic', 'tiki', 'mihaelsubasic69@gmail.com', 'liki', 1),
(18, 'Luka', 'Stapel', 'luka', 'ls@bulme.at', '123', 1),
(19, 'alvin', 'kazas', 'li', 'kz@bulme.at', '123', 1),
(20, 'Mihael', 'Subasic', 'mihael', 'mihaelsubasic69@gmail.com', '123', 1),
(21, 'Mihael', 'Subasic', 'haki', 'mihaelsubasic69@gmail.com', 'paki', 1),
(22, 'Mihael', 'Subasic', 'tiki', 'mihaelsubasic69@gmail.com', 'tiki', 1),
(23, 'Mihael', 'Subasic', 'a', 'mihaelsubasic69@gmail.com', 'a', 1),
(24, 'Mihael', 'Subasic', 'cobra', 'mihaelsubasic69@gmail.com', '123', 1),
(25, 'Kristina', 'Skvorc', 'cici', 'mihaelsubasic69@gmail.com', 'mici', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gebuchte_termine`
--
ALTER TABLE `gebuchte_termine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `termine_id` (`termine_id`);

--
-- Indexes for table `termine`
--
ALTER TABLE `termine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gebuchte_termine`
--
ALTER TABLE `gebuchte_termine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `termine`
--
ALTER TABLE `termine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gebuchte_termine`
--
ALTER TABLE `gebuchte_termine`
  ADD CONSTRAINT `gebuchte_termine_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `gebuchte_termine_ibfk_2` FOREIGN KEY (`termine_id`) REFERENCES `termine` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `termine`
--
ALTER TABLE `termine`
  ADD CONSTRAINT `termine_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
