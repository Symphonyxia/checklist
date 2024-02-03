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
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checklist`
--


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
-----------------------

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
(2, 'MITIGATION (28 PTS)', 'Hazard Map', 1),
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
(18, 'PREPAREDNESS (44 PTS)', 'A. DCC Organization (10pts)', -1),
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
(83, 'RESPONSE (16PTS)', '3. Is there a real-time/near real-time reporting system?', 1),
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
  MODIFY `questions_id` int(11) NOT NULL AUTO_INCREMENT;

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
