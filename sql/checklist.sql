-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 08:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `checklist`
--

-- --------------------------------------------------------

--
-- Table structure for table `checklist`
--

CREATE TABLE `checklist` (
  `checklist_id` int(11) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checklist`
--

INSERT INTO `checklist` (`checklist_id`, `year`) VALUES
(1, '0000'),
(2, '0000'),
(3, '0000'),
(4, '0000'),
(5, '0000'),
(6, '0000'),
(7, '2024'),
(8, '2029'),
(9, '2029'),
(10, '2024'),
(11, '2024'),
(12, '2025'),
(13, '2025'),
(14, '2024'),
(15, '2024'),
(16, '2029'),
(17, '2029'),
(18, '2029'),
(19, '2029'),
(20, '2024'),
(21, '2024'),
(22, '2024'),
(23, '2029');

-- --------------------------------------------------------

--
-- Table structure for table `checklist_result`
--

CREATE TABLE `checklist_result` (
  `checklist_id` int(11) NOT NULL,
  `questions_id` int(11) NOT NULL,
  `result_yes` varchar(255) DEFAULT NULL,
  `result_no` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questions_id` int(11) NOT NULL,
  `group` varchar(255) NOT NULL,
  `display_text` varchar(255) NOT NULL,
  `max_points` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questions_id`, `group`, `display_text`, `max_points`) VALUES
(23, '', '', 0),
(24, '', '', 0),
(25, '', '', 0),
(26, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `registration_date`) VALUES
(1, 'Mary Hope', 'Tabunlupa', 'tabunlupamaryhope@gmail.com', '$2y$10$3Ymfz22r8My.I600ChjpiO0hndjFpoYZeoCgCJ/r4yS3FoLywEDIq', '2024-01-17 05:11:21'),
(2, 'Mary Hope', 'Tabunlupa', 'hola@gmail.com', '$2y$10$JIuzZTFUH1BFsCiQZCzZzu6cAkGAD1d37IxMtnH6G6R4Ie4U9e5sO', '2024-01-17 05:17:37'),
(3, 'Mary', 'Tabunlupa', 'maryhope.tabunlupa@wvsu.edu.ph', '$2y$10$7O6sYf.cIYEtEjiaNdGAyuYCWmrdQlbbs/6E2m2fW0ODO7TG7Y20u', '2024-01-17 05:18:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`checklist_id`);

--
-- Indexes for table `checklist_result`
--
ALTER TABLE `checklist_result`
  ADD PRIMARY KEY (`checklist_id`,`questions_id`),
  ADD KEY `questions_id` (`questions_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questions_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `checklist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checklist_result`
--
ALTER TABLE `checklist_result`
  ADD CONSTRAINT `checklist_result_ibfk_1` FOREIGN KEY (`checklist_id`) REFERENCES `checklist` (`checklist_id`),
  ADD CONSTRAINT `checklist_result_ibfk_2` FOREIGN KEY (`questions_id`) REFERENCES `questions` (`questions_id`),
  ADD CONSTRAINT `fk_checklist_result_checklist` FOREIGN KEY (`checklist_id`) REFERENCES `checklist` (`checklist_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
