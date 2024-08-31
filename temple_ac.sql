-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2024 at 04:53 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temple_ac`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitys`
--

CREATE TABLE `activitys` (
  `id` int(10) NOT NULL,
  `ac_name` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `activitys`
--

INSERT INTO `activitys` (`id`, `ac_name`, `details`) VALUES
(1, 'บุญบั้งไฟ', 'Test1'),
(2, 'บุญข้าวพันก้อน', 'Test2');

-- --------------------------------------------------------

--
-- Table structure for table `ac_img`
--

CREATE TABLE `ac_img` (
  `id` int(10) NOT NULL,
  `ac_image` varchar(255) NOT NULL,
  `ac_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ac_img`
--

INSERT INTO `ac_img` (`id`, `ac_image`, `ac_id`) VALUES
(11, 'images/66caffbf04bfa_d78440dcbc1097667d239ab4f8ceec8e.jpg', 1),
(12, 'images/66caffbf06f29_ghost-band-s.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(5) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Userlevel` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`, `Firstname`, `Lastname`, `Userlevel`) VALUES
(1, 'patapee', '123', 'patapee', 'aaa', 'A'),
(2, 'bbb', '1234', 'bbbb', 'bbbb', 'M');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitys`
--
ALTER TABLE `activitys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ac_img`
--
ALTER TABLE `ac_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ac_id_foreign` (`ac_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitys`
--
ALTER TABLE `activitys`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ac_img`
--
ALTER TABLE `ac_img`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ac_img`
--
ALTER TABLE `ac_img`
  ADD CONSTRAINT `ac_id_foreign` FOREIGN KEY (`ac_id`) REFERENCES `activitys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
