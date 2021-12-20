-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 16, 2021 at 08:13 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cics-port`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `name`, `date`, `description`, `pic`) VALUES
(9, 'HOW CAN I PROTECT MYSELF FROM COVID-19?', '2021-11-22', 'Wear face mask and face shield, Sanitize your hands, Practice one-meter physical distancing and limit physical interaction, and Ensure good indoor ventilation and air flow', 'vi211122050741.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `class_schedule`
--

CREATE TABLE `class_schedule` (
  `id` int(11) NOT NULL,
  `id_course` int(10) UNSIGNED NOT NULL,
  `year` varchar(2) NOT NULL,
  `id_section` int(10) UNSIGNED NOT NULL,
  `id_class_adviser` int(10) UNSIGNED NOT NULL,
  `id_sy` int(10) UNSIGNED NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `del_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `class_schedule`
--

INSERT INTO `class_schedule` (`id`, `id_course`, `year`, `id_section`, `id_class_adviser`, `id_sy`, `dt`, `del_status`) VALUES
(6, 1, 'I', 1, 46, 6, '2021-12-12 21:18:20', 1),
(7, 1, 'IV', 3, 46, 8, '2021-12-12 21:25:59', 1),
(8, 2, 'II', 3, 40, 8, '2021-12-12 21:35:52', 1),
(9, 4, 'II', 1, 50, 8, '2021-12-14 00:29:22', 1),
(10, 4, '3', 2, 52, 8, '2021-12-14 01:22:28', 1),
(11, 4, '2', 2, 54, 8, '2021-12-14 01:39:14', 1),
(12, 4, '3', 1, 52, 7, '2021-12-14 07:32:13', 1),
(13, 4, '3', 3, 56, 7, '2021-12-14 08:46:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_schedule_details`
--

CREATE TABLE `class_schedule_details` (
  `id` int(11) NOT NULL,
  `id_class` int(10) UNSIGNED NOT NULL,
  `course_nos` varchar(100) NOT NULL,
  `id_subject` tinyint(3) UNSIGNED NOT NULL,
  `course_title` varchar(150) NOT NULL,
  `unit` tinyint(3) UNSIGNED NOT NULL,
  `day` varchar(25) NOT NULL,
  `time` varchar(25) NOT NULL,
  `id_instructor` tinyint(3) UNSIGNED NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `del_status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `class_schedule_details`
--

INSERT INTO `class_schedule_details` (`id`, `id_class`, `course_nos`, `id_subject`, `course_title`, `unit`, `day`, `time`, `id_instructor`, `dt`, `del_status`) VALUES
(10, 6, '', 1, '', 3, 'Monday', '8:00AM - 09:00AM', 46, '2021-12-12 21:18:57', 1),
(11, 7, '', 1, '', 45, 'Wednesday', '8:00AM - 9:00AM', 46, '2021-12-12 21:26:56', 1),
(12, 9, '', 11, '', 3, 'Tuesday', '1:00-6:00 pm', 50, '2021-12-14 00:52:05', 1),
(13, 10, '', 12, '', 3, 'Tuesday', '1:00-6:00 pm', 52, '2021-12-14 01:47:29', 1),
(14, 12, '', 11, '', 3, 'Tuesday', '1:00-6:00pm', 52, '2021-12-14 07:33:54', 1),
(15, 13, '', 11, '', 3, 'Tuesday', '1:00-6:00pm', 56, '2021-12-14 08:48:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(100) NOT NULL,
  `course` varchar(255) NOT NULL,
  `dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `del_status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `code`, `course`, `dt`, `del_status`) VALUES
(4, 'BSIT', 'Bachelor of Science in Information Technology ', '2021-12-14 07:20:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gpa_grade_scale`
--

CREATE TABLE `gpa_grade_scale` (
  `id` int(10) UNSIGNED NOT NULL,
  `gpa` decimal(18,4) NOT NULL,
  `range_from` decimal(18,4) NOT NULL,
  `range_to` decimal(18,4) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `del_status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_student` int(10) UNSIGNED NOT NULL,
  `semester` varchar(50) NOT NULL,
  `id_subject` int(10) UNSIGNED NOT NULL,
  `midterm` varchar(5) NOT NULL,
  `final` varchar(10) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `del_status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `id_student`, `semester`, `id_subject`, `midterm`, `final`, `remarks`, `dt`, `del_status`) VALUES
(8, 17, 'first_semester', 1, '4', '3', '', '2021-12-12 21:19:57', 1),
(9, 19, 'second_semester', 11, '1.0', '1.0', '', '2021-12-14 00:53:41', 1),
(10, 20, 'second_semester', 10, '1.0', '1.0', '', '2021-12-14 01:42:31', 1),
(11, 20, 'first_semester', 11, '1.0', '1.0', '', '2021-12-14 02:02:26', 1),
(12, 23, 'first_semester', 11, '2.0', '2.0', '', '2021-12-14 08:49:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grade_level`
--

CREATE TABLE `grade_level` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` varchar(50) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `del_status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `grade_level`
--

INSERT INTO `grade_level` (`id`, `level`, `dt`, `del_status`) VALUES
(15, 'College', '2021-07-22 19:21:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_settings`
--

CREATE TABLE `school_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `president_logo` varchar(150) NOT NULL,
  `presiden_name` varchar(150) NOT NULL,
  `mission` text NOT NULL,
  `vision` text NOT NULL,
  `core_values` text NOT NULL,
  `goals` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `school_settings`
--

INSERT INTO `school_settings` (`id`, `president_logo`, `presiden_name`, `mission`, `vision`, `core_values`, `goals`) VALUES
(1, 'vi211214123700.png', 'Dr. Nelson Cabral', ' Provide effective  and efficient services through advanced technological studies and researches for the empowerment of the nation\'s human resources.', '    ZPPSU as the leading provider Globaly-competitive Human Resources.', ' Love of Country\r\n                        Social Responsibility\r\n                        Commitment/Dedication to Service\r\n                        Accountability', ' Quality and Excellence\r\n                        Relevance and Responsiveness\r\n                        Access and Equity\r\n                        Efficiency and Effectiveness\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `section` varchar(150) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `del_status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section`, `dt`, `del_status`) VALUES
(1, 'A', '2021-08-06 03:12:35', 1),
(2, 'C', '2021-08-06 03:12:39', 1),
(3, 'B', '2021-08-06 03:12:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_class` int(10) UNSIGNED NOT NULL,
  `id_student` int(10) UNSIGNED NOT NULL,
  `id_grade` int(10) UNSIGNED NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `del_status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `id_class`, `id_student`, `id_grade`, `dt`, `del_status`) VALUES
(12, 1, 45, 0, '2021-12-08 11:40:23', 1),
(14, 2, 45, 0, '2021-12-11 15:41:23', 1),
(15, 2, 42, 0, '2021-12-12 17:53:00', 1),
(16, 3, 42, 0, '2021-12-12 18:51:33', 1),
(17, 6, 42, 0, '2021-12-12 21:19:15', 1),
(18, 7, 42, 0, '2021-12-12 21:26:16', 1),
(19, 9, 51, 0, '2021-12-14 00:53:21', 1),
(20, 10, 53, 0, '2021-12-14 01:40:35', 1),
(21, 10, 51, 0, '2021-12-14 01:46:34', 1),
(22, 12, 51, 0, '2021-12-14 07:50:57', 1),
(23, 13, 55, 0, '2021-12-14 08:49:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(70) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `del_status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `code`, `subject`, `dt`, `del_status`) VALUES
(9, 'ITFE 111', 'System Integration and Architecture 1', '2021-12-14 00:43:11', 1),
(10, 'ITCC 106', 'Web Programming and Development', '2021-12-14 00:44:55', 1),
(11, 'ITPC 104', 'System Analysis and Design', '2021-12-14 00:45:40', 1),
(12, 'ITCC 105', 'Advance Database Systems', '2021-12-14 00:46:12', 1),
(13, 'NET 2', 'Networking 2', '2021-12-14 00:46:36', 1),
(14, 'DCOM', 'Digital Communication and Electronics', '2021-12-14 00:48:10', 1),
(15, 'Lit 2', 'World Literature', '2021-12-14 00:50:09', 1),
(16, 'Math 211', 'Probability and Statistics', '2021-12-14 00:50:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sy`
--

CREATE TABLE `sy` (
  `id` int(10) UNSIGNED NOT NULL,
  `year_from` varchar(4) NOT NULL,
  `year_to` varchar(4) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `del_status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sy`
--

INSERT INTO `sy` (`id`, `year_from`, `year_to`, `semester`, `status`, `dt`, `del_status`) VALUES
(6, '2021', '2022', 'First Semester', 0, '2021-07-22 18:16:25', 1),
(7, '2021', '2022', 'Second Semester', 1, '2021-07-22 18:21:49', 1),
(8, '2022', '2023', 'First Semester', 0, '2021-07-22 18:22:14', 1),
(10, '2022', '2023', 'Second Semester', 0, '2021-08-06 00:52:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`name`) VALUES
('x');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user_role` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_status` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `del_status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_user_role`, `id_user`, `username`, `password`, `account_status`, `dt`, `del_status`) VALUES
(3, 1, 1, 'admin', '9151bb033cedc48a740365ee44f93585', 1, '2021-07-14 05:22:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `lrn` varchar(60) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `first_name` varchar(70) NOT NULL,
  `middle_name` varchar(70) NOT NULL,
  `last_name` varchar(70) NOT NULL,
  `birthday` varchar(15) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `nationality` varchar(150) NOT NULL,
  `civil_status` varchar(40) NOT NULL,
  `religion` varchar(65) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `del_status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `lrn`, `picture`, `first_name`, `middle_name`, `last_name`, `birthday`, `gender`, `nationality`, `civil_status`, `religion`, `email`, `contact`, `address`, `dt`, `del_status`) VALUES
(1, '', 'vi211214122518.jpg', 'Zinnia', 'Tolorio', 'Abella', '2021-07-06', 'Female', 'Filipino', 'Single', 'c', 'abellazinnia@gmail.com', '09287035796', 'Zamboanga City', '2021-07-13 20:49:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(25) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `del_status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`, `dt`, `del_status`) VALUES
(1, 'admin', '2021-07-22 16:54:20', 1),
(2, 'staffs', '2021-07-22 16:54:20', 1),
(3, 'teachers', '2021-07-22 16:54:20', 1),
(4, 'students', '2021-07-22 16:54:20', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_schedule`
--
ALTER TABLE `class_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_schedule_details`
--
ALTER TABLE `class_schedule_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gpa_grade_scale`
--
ALTER TABLE `gpa_grade_scale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_level`
--
ALTER TABLE `grade_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_settings`
--
ALTER TABLE `school_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sy`
--
ALTER TABLE `sy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `class_schedule`
--
ALTER TABLE `class_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `class_schedule_details`
--
ALTER TABLE `class_schedule_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gpa_grade_scale`
--
ALTER TABLE `gpa_grade_scale`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `grade_level`
--
ALTER TABLE `grade_level`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `school_settings`
--
ALTER TABLE `school_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sy`
--
ALTER TABLE `sy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
