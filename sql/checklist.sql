-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 02:38 AM
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
(24, '2024'),
(29, '2025');

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

--
-- Dumping data for table `checklist_result`
--

INSERT INTO `checklist_result` (`checklist_id`, `questions_id`, `result_yes`, `result_no`) VALUES
(24, 27, NULL, NULL),
(24, 28, '1', NULL),
(24, 29, NULL, NULL),
(24, 30, NULL, NULL),
(24, 31, NULL, NULL),
(24, 32, NULL, NULL),
(24, 33, NULL, NULL),
(24, 34, NULL, NULL),
(24, 35, NULL, NULL),
(24, 36, NULL, NULL),
(24, 37, NULL, NULL),
(24, 38, NULL, NULL),
(24, 39, NULL, NULL),
(24, 40, NULL, NULL),
(24, 41, NULL, NULL),
(24, 42, NULL, NULL),
(24, 43, NULL, NULL),
(24, 44, NULL, NULL),
(24, 45, NULL, NULL),
(24, 46, NULL, NULL),
(24, 47, NULL, NULL),
(24, 48, NULL, NULL),
(24, 49, NULL, NULL),
(24, 50, NULL, NULL),
(24, 51, NULL, NULL),
(24, 52, NULL, NULL),
(24, 53, NULL, NULL),
(24, 54, NULL, NULL),
(24, 55, NULL, NULL),
(24, 56, NULL, NULL),
(24, 57, NULL, NULL),
(24, 58, NULL, NULL),
(24, 59, NULL, NULL),
(24, 60, NULL, NULL),
(24, 61, NULL, NULL),
(24, 62, NULL, NULL),
(24, 63, NULL, NULL),
(24, 64, NULL, NULL),
(24, 65, NULL, NULL),
(24, 66, NULL, NULL),
(24, 67, NULL, NULL),
(24, 68, NULL, NULL),
(24, 69, NULL, NULL),
(24, 70, NULL, NULL),
(24, 71, NULL, NULL),
(24, 72, NULL, NULL),
(24, 73, NULL, NULL),
(24, 74, NULL, NULL),
(24, 75, NULL, NULL),
(24, 76, NULL, NULL),
(24, 77, NULL, NULL),
(24, 78, NULL, NULL),
(24, 79, NULL, NULL),
(24, 80, NULL, NULL),
(24, 81, NULL, NULL),
(24, 82, NULL, NULL),
(24, 83, NULL, NULL),
(24, 84, NULL, NULL),
(24, 85, NULL, NULL),
(24, 86, NULL, NULL),
(24, 87, NULL, NULL),
(24, 88, NULL, NULL),
(24, 89, NULL, NULL),
(24, 90, NULL, NULL),
(24, 91, NULL, NULL),
(24, 92, NULL, NULL),
(24, 93, NULL, NULL),
(24, 94, NULL, NULL),
(24, 95, NULL, NULL),
(24, 96, NULL, NULL),
(24, 97, NULL, NULL),
(24, 98, NULL, NULL),
(24, 99, NULL, NULL),
(24, 100, NULL, NULL),
(24, 101, NULL, NULL),
(24, 102, NULL, NULL),
(24, 103, NULL, NULL),
(24, 104, NULL, NULL),
(24, 105, NULL, NULL),
(24, 106, NULL, NULL),
(24, 107, NULL, NULL),
(24, 108, NULL, NULL),
(24, 109, NULL, NULL),
(24, 110, NULL, NULL),
(24, 111, NULL, NULL),
(24, 112, NULL, NULL),
(24, 113, NULL, NULL),
(24, 114, NULL, NULL),
(24, 115, NULL, NULL),
(24, 116, NULL, NULL),
(24, 117, NULL, NULL),
(24, 118, NULL, NULL),
(24, 119, NULL, NULL),
(24, 120, NULL, NULL),
(24, 121, NULL, NULL),
(24, 122, NULL, NULL),
(24, 123, NULL, NULL),
(24, 124, NULL, NULL),
(24, 125, NULL, NULL),
(24, 126, NULL, NULL),
(24, 127, NULL, NULL),
(24, 128, NULL, NULL),
(24, 129, NULL, NULL),
(24, 130, NULL, NULL),
(24, 131, NULL, NULL),
(24, 132, NULL, NULL),
(24, 133, NULL, NULL),
(24, 134, NULL, NULL),
(24, 135, NULL, NULL),
(24, 136, NULL, NULL),
(24, 137, NULL, NULL),
(24, 138, NULL, NULL),
(24, 139, NULL, NULL),
(24, 140, NULL, NULL),
(24, 141, NULL, NULL),
(24, 142, NULL, NULL),
(24, 143, NULL, NULL),
(24, 144, NULL, NULL),
(24, 150, NULL, NULL),
(29, 151, NULL, NULL);

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
(27, 'Mitigation13', 'Are there maps available?', 0),
(28, '', 'Hazard Map', 1),
(29, '', 'Vulnerability Map', 1),
(30, '', 'Capacity/Resources Map', 1),
(31, '', 'Risk Map', 2),
(32, '', 'Is there a database on vulnerable groups and/or identified elements at risks?', 4),
(33, 'Are the following involved in mitigation projects/activities of the DCC?', 'Non-government Organization', 0),
(34, 'Are the following involved in mitigation projects/activities of the DCC?', 'People\'s Organization', 1),
(35, 'Are the following involved in mitigation projects/activities of the DCC?', 'Women', 1),
(36, 'Are the following involved in mitigation projects/activities of the DCC?', 'Youth', 1),
(37, 'Are the following involved in mitigation projects/activities of the DCC?', 'Others (Religious, Business and Basic Sectors)', 1),
(38, 'Are the following involved in mitigation projects/activities of the DCC?', 'Are there updated zoning ordinances and/or safety regulations?', 3),
(39, 'Are the following involved in mitigation projects/activities of the DCC?', 'Do cooperatives, micro-finance institutions, etc., extend calamity loans to the DCC?', 3),
(40, 'Are the following involved in mitigation projects/activities of the DCC?', 'Are disaster mitigation measures integrated/mainstreamed in local development plans?', 3),
(41, 'Are the following involved in mitigation projects/activities of the DCC?', 'Are there funds appropriated for mitigation measures?', 3),
(42, 'Preparedness', ' A. DCC Organization', 0),
(43, '', 'Is there an executive order/resolutions/ordinance passed organizing the DCC?', 10),
(44, '', 'Is there an organizational chart of DCC?', 1),
(45, '', 'Are the following represented in the DCC:', 1),
(46, '', 'Non-government Organization', 3),
(47, '', 'People\'s Organization', 1),
(48, '', 'Women', 1),
(49, '', 'Youth', 1),
(50, '', 'Others (Religious, Business and Basic Sectors)', 1),
(51, 'Is the DCC meeting regularly? ', 'monthly?', 2),
(52, 'Is the DCC meeting regularly? ', 'quarterly', 1),
(53, 'Is the DCC meeting regularly? ', 'Are DCC meetings attended by the majority of members?', 1),
(54, 'Do the task units/committees hold meetings regularly?', 'monthly?', 2),
(55, 'Do the task units/committees hold meetings regularly?', 'quarterly?', 1),
(56, 'B. Disaster Preparedness/ Contingency Plan', 'Is there Disaster Preparedness/Contingency Plan?', 1),
(57, 'B. Disaster Preparedness/ Contingency Plan', 'Does it provide for component services such as emergency medical services, evacuation, rescue, etc.?', 1),
(58, 'B. Disaster Preparedness/ Contingency Plan', 'Does the plan prepare for worst case scenario?', 1),
(59, 'B. Disaster Preparedness/ Contingency Plan', 'Was the community involved in the formulation of the plan?', 1),
(60, 'B. Disaster Preparedness/ Contingency Plan', 'Does the community take part in the implementation and monitoring of the plan? ', 1),
(61, 'B. Disaster Preparedness/ Contingency Plan', 'Where the DCC members oriented on the basics of Disaster Preparedness?', 1),
(62, 'B. Disaster Preparedness/ Contingency Plan', 'Was the disaster preparedness/contingency plan disseminated through public assembles or tri-media?', 1),
(63, 'B. Disaster Preparedness/ Contingency Plan', 'Were there simulations exercises or drills conducted to test the plan?', 1),
(64, 'C. Disaster Management Office/Operations Center', 'Is there an established Disaster Management Office?', 1),
(65, 'C. Disaster Management Office/Operations Center', 'Does the office have permanent staff?', 1),
(66, 'C. Disaster Management Office/Operations Center', 'Is there a Disaster Management Operation Center?', 1),
(67, 'C. Disaster Management Office/Operations Center', 'Is the Operation Center manned on a 24hr basis?', 1),
(68, 'C. Disaster Management Office/Operations Center', 'Are these personnel knowledgeable in the preparation of a basic  disaster situation report?', 1),
(69, 'C. Disaster Management Office/Operations Center', 'Are these personnel capable of disaster assessment and needs analysis?', 1),
(70, 'C. Disaster Management Office/Operations Center', 'Is the Office/Center provided with basic equipment?', 1),
(71, 'C. Disaster Management Office/Operations Center', 'Does it have search and rescue and/or medical equipment?', 1),
(72, 'C. Disaster Management Office/Operations Center', 'Does it have sufficient funding? ', 1),
(73, 'C. Disaster Management Office/Operations Center', 'Does it have prepositioned stockpile of relief goods?', 1),
(74, 'D. Disaster Risk Management Training ', '', 0),
(75, 'Has there been trainings conducted on:', 'Disaster Risk/Emergency Management', 1),
(76, 'Has there been trainings conducted on:', 'Community-based Disaster Risk Management ', 1),
(77, 'Has there been trainings conducted on:', 'Damage Assessment and Need Analysis ', 1),
(78, 'Has there been trainings conducted on:', 'Search and Rescue (Water/Collapsed Structure/Urban)', 1),
(79, 'Has there been trainings conducted on:', 'Fire Suppression', 1),
(80, 'Has there been trainings conducted on:', 'Medical Services (Basic Life Support, First Aid)', 1),
(81, 'How many training course were conducted?', 'Less than 10 trainings', 3),
(82, 'How many training course were conducted?', '11-20 trainings', 3),
(83, 'How many training course were conducted?', '21 or more trainings ', 3),
(84, 'How many DCC members were trained?', 'Less than 30', 2),
(85, 'How many DCC members were trained?', '31 or more ', 2),
(86, '', 'Were there trainings which directly targeted communities?', -1),
(87, 'What level/s of training was/were conducted?', 'Orientation/Basic', 2),
(88, 'What level/s of training was/were conducted?', 'Advanced', 2),
(89, '', 'Is/Are there equipment and/or facility/ies designated for training purposes?', 1),
(90, '', 'Is/Are there NGO\'s supporting training activities?', 1),
(91, 'Response ', '', 0),
(92, 'A. Early Warning and Communications', 'Is there an organized task unit/committee on early warning?', 1),
(93, 'Are the following represented in the task unit/committee:', 'Non-government Organization', 1),
(94, 'Are the following represented in the task unit/committee:', 'People\'s Organization', 1),
(95, 'Are the following represented in the task unit/committee:', 'Women', 1),
(96, 'Are the following represented in the task unit/committee:', 'Youth', 1),
(97, 'Are the following represented in the task unit/committee:', 'Others (Religious, Business and Basic Sectors)', 1),
(98, 'Are the following represented in the task unit/committee:', 'Is there a real time/ near real time reporting system?', 1),
(99, 'B. Damage Assessment and Needs Analysis (DANA)', 'Is there an organized task/unit committee on DANA?', 1),
(100, 'Are the following represented in the task unit/committee:', 'Non-government Organization', 1),
(101, 'Are the following represented in the task unit/committee:', 'People\'s Organization', 1),
(102, 'Are the following represented in the task unit/committee:', 'Women', 1),
(103, 'Are the following represented in the task unit/committee:', 'Youth', 1),
(104, 'Are the following represented in the task unit/committee:', 'Others (Religious, Business and Basic Sectors)', 1),
(105, 'Are the following represented in the task unit/committee:', 'Was there evidence that the DANA unit/committee conducted disaster assessment within 24hrs after the occurrence of the disaster?', 1),
(106, 'C. Search and Rescue', 'Is there an organized unit/committee that will provide local search and rescue operations during disasters?', 1),
(107, 'Are the following represented in the task/unit committee:', 'Non-government Organization', 1),
(108, 'Are the following represented in the task/unit committee:', 'People\'s Organization', 1),
(109, 'Are the following represented in the task/unit committee:', 'Women', 1),
(110, 'Are the following represented in the task/unit committee:', 'Youth', 1),
(111, 'Are the following represented in the task/unit committee:', 'Others (Religious, Business and Basic Sectors)', 1),
(112, 'D. Fire Suppression', 'Is there an organized unit/committee that will conduct fire during disasters?', 1),
(113, 'Are the following represented in the task/unit committee:', 'Non-government Organization', 1),
(114, 'Are the following represented in the task/unit committee:', 'People\'s Organization', 1),
(115, 'Are the following represented in the task/unit committee:', 'Women', 1),
(116, 'Are the following represented in the task/unit committee:', 'Youth', 1),
(117, 'Are the following represented in the task/unit committee:', 'Others (Religious, Business and Basic Sectors)', 1),
(118, 'E. Emergency Medical Services', 'Is there an organized unit/committee that will provide emergency medical services during disasters?', 1),
(119, 'Are the following represented in the task/unit committee:', 'Non-government Organization', 1),
(120, 'Are the following represented in the task/unit committee:', 'People\'s Organization', 1),
(121, 'Are the following represented in the task/unit committee:', 'Women', 1),
(122, 'Are the following represented in the task/unit committee:', 'Youth', 1),
(123, 'Are the following represented in the task/unit committee:', 'Others (Religious, Business and Basic Sectors)', 1),
(124, 'F. Evacuation and Relief', 'Is there an organized unit/committee that will provide evacuation and relief services during disasters?', 1),
(125, 'Are the following represented in the task/unit committee:', 'Non-government Organization', 1),
(126, 'Are the following represented in the task/unit committee:', 'People\'s Organization', 1),
(127, 'Are the following represented in the task/unit committee:', 'Women', 1),
(128, 'Are the following represented in the task/unit committee:', 'Youth', 1),
(129, 'Are the following represented in the task/unit committee:', 'Others (Religious, Business and Basic Sectors)', 1),
(130, 'G. Utilization of Local Calamity Fund (LCF)', 'Was there evidence that the DCC utilized the LCF for disaster response?', 1),
(131, 'G. Utilization of Local Calamity Fund (LCF)', 'Is there an organized unit/committee that monitors the utilization of the LCF?', 1),
(132, 'Rehabilitation', 'Is there an organized group that shall provide rehabilitation service in the aftermath of the disaster?', 1),
(133, 'Are the following represented in the task/unit committee:', 'Non-government Organization', 1),
(134, 'Are the following represented in the task/unit committee:', 'People\'s Organization', 1),
(135, 'Are the following represented in the task/unit committee:', 'Women', 1),
(136, 'Are the following represented in the task/unit committee:', 'Youth', 1),
(137, 'Are the following represented in the task/unit committee:', 'Others (Religious, Business and Basic Sectors)', 1),
(138, 'Have any of the following organizations extended funding/technical assistance on rehabilitation?', 'National Government', 1),
(139, 'Have any of the following organizations extended funding/technical assistance on rehabilitation?', 'Non-government Organization', 1),
(140, 'Have any of the following organizations extended funding/technical assistance on rehabilitation?', 'Private/Business Sector', 1),
(141, 'Have any of the following organizations extended funding/technical assistance on rehabilitation?', 'Foreign Donors/Aid Organization', 1),
(142, '', 'Is/Are communities tapped for \"food-for-work\" and volunteer rehabilitation works?', 2),
(143, '', 'Was there evidence that the DCC utilized the LCF for rehabilitation purpose?', 1),
(144, '', 'Is there an organization unit/committee that monitors the utilization of the LCF that was spent for rehabilitation?', 1),
(150, 'test123', 'test', 1),
(151, 'test', 'test', 1);

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
(4, 'Mary Hope', 'Tabunlupa', 'tabunlupamaryhope@gmail.com', '$2y$10$OiBYSZBTiGGf5EgNF5FzueJkIfPZSRZEVLGqx036Fr..6cIjCgGgm', '2024-01-22 05:07:18'),
(5, 'Richard', 'Paredes', 'hola@gmail.com', '$2y$10$cOqWf6W9Vj3iYGbBXHSME.8WTfJCYrqP1uB8YZl/sRKnEC/cB2oLO', '2024-01-24 01:19:56');

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
  MODIFY `checklist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
