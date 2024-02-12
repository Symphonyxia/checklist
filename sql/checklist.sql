-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 03:19 AM
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
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checklist`
--

INSERT INTO `checklist` (`checklist_id`, `year`) VALUES
(1, '2024 - Assessment Checklist on Local Disaster Coordinating Councils (LDCCs) Basic Disaster Risk Management Capability'),
(2, '2024 - Assessment Checklist on Local Disaster Coordinating Councils (LDCCs) Basic Disaster Risk Management Capability');

-- --------------------------------------------------------

--
-- Table structure for table `checklist_result`
--

CREATE TABLE `checklist_result` (
  `checklist_id` int(11) NOT NULL,
  `questions_id` int(11) NOT NULL,
  `result_yes` varchar(255) NOT NULL,
  `result_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checklist_result`
--

INSERT INTO `checklist_result` (`checklist_id`, `questions_id`, `result_yes`, `result_no`) VALUES
(1, 1, '', ''),
(1, 2, '', ''),
(1, 3, '', ''),
(1, 4, '', ''),
(1, 5, '', ''),
(1, 6, '', ''),
(1, 7, '', ''),
(1, 8, '', ''),
(1, 9, '', ''),
(1, 10, '', ''),
(1, 11, '', ''),
(1, 12, '', ''),
(1, 13, '', ''),
(1, 14, '', ''),
(1, 15, '', ''),
(1, 16, '', ''),
(1, 17, '', ''),
(1, 18, '', ''),
(1, 19, '', ''),
(1, 20, '', ''),
(1, 21, '', ''),
(1, 22, '', ''),
(1, 23, '', ''),
(1, 24, '', ''),
(1, 25, '', ''),
(1, 26, '', ''),
(1, 27, '', ''),
(1, 28, '', ''),
(1, 29, '', ''),
(1, 30, '', ''),
(1, 31, '', ''),
(1, 32, '', ''),
(1, 33, '', ''),
(1, 34, '', ''),
(1, 35, '', ''),
(1, 36, '', ''),
(1, 37, '', ''),
(1, 38, '', ''),
(1, 39, '', ''),
(1, 40, '', ''),
(1, 41, '', ''),
(1, 42, '', ''),
(1, 43, '', ''),
(1, 44, '', ''),
(1, 45, '', ''),
(1, 46, '', ''),
(1, 47, '', ''),
(1, 48, '', ''),
(1, 49, '', ''),
(1, 50, '', ''),
(1, 51, '', ''),
(1, 52, '', ''),
(1, 53, '', ''),
(1, 54, '', ''),
(1, 55, '', ''),
(1, 56, '', ''),
(1, 57, '', ''),
(1, 58, '', ''),
(1, 59, '', ''),
(1, 60, '', ''),
(1, 61, '', ''),
(1, 62, '', ''),
(1, 63, '', ''),
(1, 64, '', ''),
(1, 65, '', ''),
(1, 66, '', ''),
(1, 67, '', ''),
(1, 68, '', ''),
(1, 69, '', ''),
(1, 70, '', ''),
(1, 71, '', ''),
(1, 72, '', ''),
(1, 73, '', ''),
(1, 74, '', ''),
(1, 75, '', ''),
(1, 76, '', ''),
(1, 77, '', ''),
(1, 78, '', ''),
(1, 79, '', ''),
(1, 80, '', ''),
(1, 81, '', ''),
(1, 82, '', ''),
(1, 83, '', ''),
(1, 84, '', ''),
(1, 85, '', ''),
(1, 86, '', ''),
(1, 87, '', ''),
(1, 88, '', ''),
(1, 89, '', ''),
(1, 90, '', ''),
(1, 91, '', ''),
(1, 92, '', ''),
(1, 93, '', ''),
(1, 94, '', ''),
(1, 95, '', ''),
(1, 96, '', ''),
(1, 97, '', ''),
(1, 98, '', ''),
(1, 99, '', ''),
(1, 100, '', ''),
(1, 101, '', ''),
(1, 102, '', ''),
(1, 103, '', ''),
(1, 104, '', ''),
(1, 105, '', ''),
(1, 106, '', ''),
(1, 107, '', ''),
(1, 108, '', ''),
(1, 109, '', ''),
(1, 110, '', ''),
(1, 111, '', ''),
(1, 112, '', ''),
(1, 113, '', ''),
(1, 114, '', ''),
(1, 115, '', ''),
(1, 116, '', ''),
(1, 117, '', ''),
(1, 118, '', ''),
(1, 119, '', ''),
(1, 120, '', ''),
(1, 121, '', ''),
(1, 122, '', ''),
(1, 123, '', ''),
(1, 124, '', ''),
(1, 125, '', ''),
(1, 126, '', ''),
(1, 127, '', ''),
(1, 128, '', ''),
(1, 129, '', ''),
(1, 130, '', ''),
(1, 131, '', ''),
(1, 132, '', ''),
(1, 133, '', ''),
(1, 134, '', ''),
(1, 135, '', ''),
(1, 136, '', ''),
(1, 137, '', ''),
(1, 138, '', ''),
(1, 139, '', ''),
(1, 140, '', ''),
(1, 141, '', ''),
(1, 142, '', ''),
(2, 1, '', ''),
(2, 2, '', ''),
(2, 3, '', ''),
(2, 4, '', ''),
(2, 5, '', ''),
(2, 6, '', ''),
(2, 7, '', ''),
(2, 8, '', ''),
(2, 9, '', ''),
(2, 10, '', ''),
(2, 11, '', ''),
(2, 12, '', ''),
(2, 13, '', ''),
(2, 14, '', ''),
(2, 15, '', ''),
(2, 16, '', ''),
(2, 17, '', ''),
(2, 18, '', ''),
(2, 19, '', ''),
(2, 20, '', ''),
(2, 21, '', ''),
(2, 22, '', ''),
(2, 23, '', ''),
(2, 24, '', ''),
(2, 25, '', ''),
(2, 26, '', ''),
(2, 27, '', ''),
(2, 28, '', ''),
(2, 29, '', ''),
(2, 30, '', ''),
(2, 31, '', ''),
(2, 32, '', ''),
(2, 33, '', ''),
(2, 34, '', ''),
(2, 35, '', ''),
(2, 36, '', ''),
(2, 37, '', ''),
(2, 38, '', ''),
(2, 39, '', ''),
(2, 40, '', ''),
(2, 41, '', ''),
(2, 42, '', ''),
(2, 43, '', ''),
(2, 44, '', ''),
(2, 45, '', ''),
(2, 46, '', ''),
(2, 47, '', ''),
(2, 48, '', ''),
(2, 49, '', ''),
(2, 50, '', ''),
(2, 51, '', ''),
(2, 52, '', ''),
(2, 53, '', ''),
(2, 54, '', ''),
(2, 55, '', ''),
(2, 56, '', ''),
(2, 57, '', ''),
(2, 58, '', ''),
(2, 59, '', ''),
(2, 60, '', ''),
(2, 61, '', ''),
(2, 62, '', ''),
(2, 63, '', ''),
(2, 64, '', ''),
(2, 65, '', ''),
(2, 66, '', ''),
(2, 67, '', ''),
(2, 68, '', ''),
(2, 69, '', ''),
(2, 70, '', ''),
(2, 71, '', ''),
(2, 72, '', ''),
(2, 73, '', ''),
(2, 74, '', ''),
(2, 75, '', ''),
(2, 76, '', ''),
(2, 77, '', ''),
(2, 78, '', ''),
(2, 79, '', ''),
(2, 80, '', ''),
(2, 81, '', ''),
(2, 82, '', ''),
(2, 83, '', ''),
(2, 84, '', ''),
(2, 85, '', ''),
(2, 86, '', ''),
(2, 87, '', ''),
(2, 88, '', ''),
(2, 89, '', ''),
(2, 90, '', ''),
(2, 91, '', ''),
(2, 92, '', ''),
(2, 93, '', ''),
(2, 94, '', ''),
(2, 95, '', ''),
(2, 96, '', ''),
(2, 97, '', ''),
(2, 98, '', ''),
(2, 99, '', ''),
(2, 100, '', ''),
(2, 101, '', ''),
(2, 102, '', ''),
(2, 103, '', ''),
(2, 104, '', ''),
(2, 105, '', ''),
(2, 106, '', ''),
(2, 107, '', ''),
(2, 108, '', ''),
(2, 109, '', ''),
(2, 110, '', ''),
(2, 111, '', ''),
(2, 112, '', ''),
(2, 113, '', ''),
(2, 114, '', ''),
(2, 115, '', ''),
(2, 116, '', ''),
(2, 117, '', ''),
(2, 118, '', ''),
(2, 119, '', ''),
(2, 120, '', ''),
(2, 121, '', ''),
(2, 122, '', ''),
(2, 123, '', ''),
(2, 124, '', ''),
(2, 125, '', ''),
(2, 126, '', ''),
(2, 127, '', ''),
(2, 128, '', ''),
(2, 129, '', ''),
(2, 130, '', ''),
(2, 131, '', ''),
(2, 132, '', ''),
(2, 133, '', ''),
(2, 134, '', ''),
(2, 135, '', ''),
(2, 136, '', ''),
(2, 137, '', ''),
(2, 138, '', ''),
(2, 139, '', ''),
(2, 140, '', ''),
(2, 141, '', ''),
(2, 142, '', '');

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
(1, 'MITIGATION (28 PTS)', '1. Are there maps available? (5pts)', 0),
(2, 'MITIGATION (28 PTS)', 'Hazard Map', 2),
(3, 'MITIGATION (28 PTS)', 'Vulnerability Map', 1),
(4, 'MITIGATION (28 PTS)', 'Capacity/Resource Map', 1),
(5, 'MITIGATION (28 PTS)', 'Risk Map', 2),
(6, 'MITIGATION (28 PTS)', '2. Is there a database on vulnerable groups and/or identified elements at risks?', 4),
(7, 'MITIGATION (28 PTS)', '3. Are there facilities and equipment covered by insurance?', 4),
(8, 'MITIGATION (28 PTS)', '4. Are the following involved in mitigation projects/activities of the DCC? (3pts) ', 0),
(9, 'MITIGATION (28 PTS)', 'Non-government Organization', 1),
(10, 'MITIGATION (28 PTS)', 'Peoples Organization', 1),
(11, 'MITIGATION (28 PTS)', 'Women', 1),
(12, 'MITIGATION (28 PTS)', 'Youth', 1),
(13, 'MITIGATION (28 PTS)', 'Others (Religious, Business and Basic Sectors)', 1),
(14, 'MITIGATION (28 PTS)', '5. Are there updated zoning ordinances and/or safety regulations?', 3),
(15, 'MITIGATION (28 PTS)', '6. Do cooperatives, micro-finance institutions, etc., extend calamity loans to the DCC?', 2),
(16, 'MITIGATION (28 PTS)', '7. Are disaster mitigation measures integrated/mainstreamed in local development plans?', 3),
(17, 'MITIGATION (28 PTS)', '8. Are there funds appropriate for mitigation measures?', 3),
(18, 'PREPAREDNESS (44 PTS)', 'A. DCC Organization (10pts)', 1),
(19, 'PREPAREDNESS (44 PTS)', '1. Is there an executive order/resolution/ordinances passed organizing the DCC?', 1),
(20, 'PREPAREDNESS (44 PTS)', '2. Is there an organization chart of the DCC?', 1),
(21, 'PREPAREDNESS (44 PTS)', '3. Are the following represented in the DCC: (3pts)', 0),
(22, 'PREPAREDNESS (44 PTS)', 'Non-government Organization', 1),
(23, 'PREPAREDNESS (44 PTS)', 'Peoples Organization', 1),
(24, 'PREPAREDNESS (44 PTS)', 'Women', 1),
(25, 'PREPAREDNESS (44 PTS)', 'Youth', 1),
(26, 'PREPAREDNESS (44 PTS)', 'Others (Religious, Business and Basic Sectors)', 1),
(27, 'PREPAREDNESS (44 PTS)', '4. Is the DCC meeting regularly?', 0),
(28, 'PREPAREDNESS (44 PTS)', 'monthly', 2),
(29, 'PREPAREDNESS (44 PTS)', 'quarterly', 1),
(30, 'PREPAREDNESS (44 PTS)', '5. Are DCC meetings attended by the majority of members?', 1),
(31, 'PREPAREDNESS (44 PTS)', '6. Do the task units/committees hold meetings regularly?', 0),
(32, 'PREPAREDNESS (44 PTS)', 'monthly', 2),
(33, 'PREPAREDNESS (44 PTS)', 'quarterly', 1),
(34, 'PREPAREDNESS (44 PTS)', 'B. Disaster Preparedness/Contingency Plan (8 pts)', 0),
(35, 'PREPAREDNESS (44 PTS)', '1. Is there a Disaster Preparedness/Contingency Plan?', 1),
(36, 'PREPAREDNESS (44 PTS)', '2. Does it provide for component services such as emergency medical services, evacuation, rescue, etc.?', 1),
(37, 'PREPAREDNESS (44 PTS)', '3. Does the plan prepare for worst case scenario?', 1),
(38, 'PREPAREDNESS (44 PTS)', '4. Was the community involved in the formulation of the plan?', 1),
(39, 'PREPAREDNESS (44 PTS)', '5. Does the community take part in the implementation and monitoring of the plan?', 1),
(40, 'PREPAREDNESS (44 PTS)', '6. Were the DCC members oriented on the basics of Disaster Preparedness?', 1),
(41, 'PREPAREDNESS (44 PTS)', '7. Was the disaster preparedness/contingency plan disseminated through public assemblies or tri-media?', 1),
(42, 'PREPAREDNESS (44 PTS)', 'Were the simulation exercises or drills conducted to test the plan?', 1),
(43, 'PREPAREDNESS (44 PTS)', 'C. Disaster Management Office/Operations Center (10pts)', 0),
(44, 'PREPAREDNESS (44 PTS)', '1. Is there an established Disaster Management Office?', 1),
(45, 'PREPAREDNESS (44 PTS)', '2. Does the office have permanent staff?', 1),
(46, 'PREPAREDNESS (44 PTS)', '3. Is there a Disaster Management Operations Center?', 1),
(47, 'PREPAREDNESS (44 PTS)', '4. Is the Operations Center manned on a 24hr basis?', 1),
(48, 'PREPAREDNESS (44 PTS)', '5. Are these personnel knowledgeable in the preparation of a basic disaster situation report?', 1),
(49, 'PREPAREDNESS (44 PTS)', '6. Are there personnel capable of disaster assessment and needs analysis?', 1),
(50, 'PREPAREDNESS (44 PTS)', '7. Is the Office/Center provided with basic equipment?', 1),
(51, 'PREPAREDNESS (44 PTS)', '8. Does it have search and rescue and/or medical equipemnt?', 1),
(52, 'PREPAREDNESS (44 PTS)', '9. Does it have sufficient funding?', 1),
(53, 'PREPAREDNESS (44 PTS)', '10. Does it have prepositioned stockpiles of relief goods?', 1),
(54, 'PREPAREDNESS (44 PTS)', 'D. Disaster Risk Management Training (17pts)', 0),
(55, 'PREPAREDNESS (44 PTS)', '1. Has there been trainings conducted on:', 0),
(56, 'PREPAREDNESS (44 PTS)', 'Disaster Risk/Emergency Management', 1),
(57, 'PREPAREDNESS (44 PTS)', 'Community-based Disaster Risk Management', 1),
(58, 'PREPAREDNESS (44 PTS)', 'Damage Assessment and Needs Analysis', 1),
(59, 'PREPAREDNESS (44 PTS)', 'Search and Rescue (Water/Collapsed Structure/Urban)', 1),
(60, 'PREPAREDNESS (44 PTS)', 'Fire Suppression', 1),
(61, 'PREPAREDNESS (44 PTS)', 'Medical Services (Basic Life Support, First Aid)', 1),
(62, 'PREPAREDNESS (44 PTS)', '2. How many training courses were conducted? (3 pts)', 0),
(63, 'PREPAREDNESS (44 PTS)', 'Less 10 trainings', 1),
(64, 'PREPAREDNESS (44 PTS)', '11-20 trainings', 1),
(65, 'PREPAREDNESS (44 PTS)', '21 or more trainings', 1),
(66, 'PREPAREDNESS (44 PTS)', '3. How many DCC members were trained? (2 pts)', 0),
(67, 'PREPAREDNESS (44 PTS)', 'Less than 30', 1),
(68, 'PREPAREDNESS (44 PTS)', '31 or more', 1),
(69, 'PREPAREDNESS (44 PTS)', '4. Were there trainings which directly targeted communities?', 1),
(70, 'PREPAREDNESS (44 PTS)', '5. What level/s of training was/were conducted? (2 pts)', 0),
(71, 'PREPAREDNESS (44 PTS)', 'Orientation/Basic', 1),
(72, 'PREPAREDNESS (44 PTS)', 'Advanced', 1),
(73, 'PREPAREDNESS (44 PTS)', '6. Is/Are there equipment and/or facility/ies designated for training purpose?', 1),
(74, 'PREPAREDNESS (44 PTS)', '7. Is/Are there NGO/s supporting training activities?', 1),
(75, 'RESPONSE (16PTS)', 'A. Early Warning and Communications (3pts)', 0),
(76, 'RESPONSE (16PTS)', '1. Is there an organized task unit/ committee on early warning?', 1),
(77, 'RESPONSE (16PTS)', '2. Are the following represented in the task unit/committee:  (1 pts)', 0),
(78, 'RESPONSE (16PTS)', 'Non-government Organization', 1),
(79, 'RESPONSE (16PTS)', 'Peoples Organization ', 1),
(80, 'RESPONSE (16PTS)', 'Women', 1),
(81, 'RESPONSE (16PTS)', 'Youth', 1),
(82, 'RESPONSE (16PTS)', 'Others (Religious, Business and Basic Sectors)', 1),
(83, 'RESPONSE (16PTS)', '3. Is there a real time/near real time reporting system?', 1),
(84, 'RESPONSE (16PTS)', 'B. Damage Assessment and Needs Analysis (DANA) (3pts)', 0),
(85, 'RESPONSE (16PTS)', '1. Is there an organized task unit/committee on DANA?', 1),
(86, 'RESPONSE (16PTS)', '2. Are the following represented in the task unit/committee: (1 pts)', 0),
(87, 'RESPONSE (16PTS)', 'Non-government Organization', 1),
(88, 'RESPONSE (16PTS)', 'Peoples Organization ', 1),
(89, 'RESPONSE (16PTS)', 'Women', 1),
(90, 'RESPONSE (16PTS)', 'Youth', 1),
(91, 'RESPONSE (16PTS)', 'Others (Religious, Business and Basic Sectors)', 1),
(92, 'RESPONSE (16PTS)', '3. Was there evidence that the DANA unit/committee conducted disaster assessment within 24hrs after the occurrence of the disaster?', 1),
(93, 'RESPONSE (16PTS)', 'C. Search and Rescue (2pts)', 0),
(94, 'RESPONSE (16PTS)', '1. Is there an organized unit/committee that will provide local search and rescue operations during disasters?', 1),
(95, 'RESPONSE (16PTS)', '2. Are the following represented in the task unit/committee: (1 pts)', 0),
(96, 'RESPONSE (16PTS)', 'Non-government Organization', 1),
(97, 'RESPONSE (16PTS)', 'Peoples Organization ', 1),
(98, 'RESPONSE (16PTS)', 'Women', 1),
(99, 'RESPONSE (16PTS)', 'Youth', 1),
(100, 'RESPONSE (16PTS)', 'Others (Religious, Business and Basic Sectors)', 1),
(101, 'RESPONSE (16PTS)', 'D. Fire Suppression (2pts) ', 0),
(102, 'RESPONSE (16PTS)', '1. Is there an organized unit/committee  that will conduct fire during disasters?', 1),
(103, 'RESPONSE (16PTS)', '2. Are the following represented in the task unit/committee:  (1 pts)', 0),
(104, 'RESPONSE (16PTS)', 'Non-government Organization', 1),
(105, 'RESPONSE (16PTS)', 'Peoples Organization', 1),
(106, 'RESPONSE (16PTS)', 'Women', 1),
(107, 'RESPONSE (16PTS)', 'Youth ', 1),
(108, 'RESPONSE (16PTS)', 'Others (Religious, Business and Basic Sectors)', 1),
(109, 'RESPONSE (16PTS)', 'E. Emergency Medical Services (2pts)', 0),
(110, 'RESPONSE (16PTS)', '1. Is there an organized unit/committee that will provide emergency medical services during disasters? ', 1),
(111, 'RESPONSE (16PTS)', '2. Are the following represented in the task unit/committee: (1 pts)', 0),
(112, 'RESPONSE (16PTS)', 'Non-government Organization', 1),
(113, 'RESPONSE (16PTS)', 'Peoples Organization', 1),
(114, 'RESPONSE (16PTS)', 'Women', 1),
(115, 'RESPONSE (16PTS)', 'Youth', 1),
(116, 'RESPONSE (16PTS)', 'Others (Religious, Business and Basic Sectors)', 1),
(117, 'RESPONSE (16PTS)', 'F. Evacuation and Relief (2pts)', 0),
(118, 'RESPONSE (16PTS)', '1. Is there an organized unit/committee that will provide evacuation and relief services during disasters?', 1),
(119, 'RESPONSE (16PTS)', '2. Are the following represented in the task unit/committee:  (1 pts)', 0),
(120, 'RESPONSE (16PTS)', 'Non-government Organization', 1),
(121, 'RESPONSE (16PTS)', 'Peoples Organization', 1),
(122, 'RESPONSE (16PTS)', 'Women', 1),
(123, 'RESPONSE (16PTS)', 'Youth', 1),
(124, 'RESPONSE (16PTS)', 'Others (Religious, Business and Basic Sectors)', 1),
(125, 'RESPONSE (16PTS)', 'G. Utilization of Local Calamity Fund (LCF) (2pts)', 0),
(126, 'RESPONSE (16PTS)', '1. Was there evidence that the DCC utilized the LCF for disaster response?', 1),
(127, 'RESPONSE (16PTS)', '2. Is there an organized unit/committee that monitors the utilization of the LCF?', 1),
(128, 'REHABILITATION (12PTS)', '1. Is there an organized group that shall provide rehabilitation service in the aftermath of the disaster?', 1),
(129, 'REHABILITATION (12PTS)', '2. Are the following represented in the rehabilitation committee: (3 pts)', 0),
(130, 'REHABILITATION (12PTS)', 'Non-government Organization', 1),
(131, 'REHABILITATION (12PTS)', 'Peoples Organization', 1),
(132, 'REHABILITATION (12PTS)', 'Women', 1),
(133, 'REHABILITATION (12PTS)', 'Youth', 1),
(134, 'REHABILITATION (12PTS)', 'Others (Religious, Business and Basic Sectors)', 1),
(135, 'REHABILITATION (12PTS)', '3. Have any of the following organizations extended funding/technical assistance on rehabilitation? (4 pts)', 0),
(136, 'REHABILITATION (12PTS)', 'National Government ', 1),
(137, 'REHABILITATION (12PTS)', 'Non-government Organization', 1),
(138, 'REHABILITATION (12PTS)', 'Private/Business Sector', 1),
(139, 'REHABILITATION (12PTS)', 'Foreign Donors/Aid Organizations', 0),
(140, 'REHABILITATION (12PTS)', '4. Is/Are communities tapped for \"food-for-work\" and volunteer rehabilitation works?', 2),
(141, 'REHABILITATION (12PTS)', '5. Was there evidence that the DCC utilize the LCF for rehabilitation purpose?', 1),
(142, 'REHABILITATION (12PTS)', '6. Is there an organized unit/committee that monitors the utilization of the LCF that was spent for rehabilitation?', 1);

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
(1, 'Juan', 'Dela Cruz', 'juan@gmail.com', '$2y$10$JVcoWF6hv3Dz92oDgJxine8yBCxqL.5EKbABRuXpIWHSY/2lEgqrG', '2024-01-31 02:18:10'),
(2, 'hope', 'test', 'test@gmail.com', '$2y$10$DdXIVU9ZZ1a91VvEFvYCkuyW802kBjt5E6X617sOsY4WXHyV9LOpO', '2024-02-12 02:17:06');

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `checklist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
