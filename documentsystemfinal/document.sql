-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: May 16, 2023 at 05:26 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `document`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`name`, `email`, `password`) VALUES
('asd', '', '$2y$10$hKlK9vN6gdOqdQFf7oKPZOUIMM.wXH2ya2IJYCsXsAI6V9pWhtSAa'),
('23', '3@gmail.com', '$2y$10$Jh5RbxH1EJ2pm0oYGcFMg.5nmoFd6zv2F58TmP2H7EqT/FmjVXZdW'),
('Kaycee Bulante', '1@gmail.com', '$2y$10$Qs4XdN0/mSeoB.nWnhDUa.qmaJXvXIEaM2HwoA1zvytb00sOh.crm'),
('Kaycee Bulante', '12@gmail.com2', '$2y$10$tzkC6Hq2A2j4DzSnozUzLeUnFIv3V1rBMshTEqJq75MaHUgy6DUYa'),
('Kaycee Bulante', 'kateescotido@gmail.com', '$2y$10$ExkskBBX2RFQYVPWyjByRuTmcpw5b8x8m68M1UjTMcJiSXokgHpG.'),
('Kaycee Bulante', 'kayceeb@gmail.com', '$2y$10$vbX5qqC9cw96.y6OXUtDhu./AVntLqFTpU6ZedztFc1KTdVatsGBm');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `dept_id`) VALUES
(1, 'Bachelor in Graphics Technology Mechanical Drafting Technology', 1),
(2, 'Bachelor in Graphics Technology Industrial Design', 1),
(3, 'Bachelor in Graphics Technology Architecture Technology', 1),
(4, 'Bachelor of Fine Arts', 1),
(9, 'Bachelor of Science in Civil Engineering', 3),
(10, 'Bachelor of Science in Civil Engineering (Non-STEM)', 3),
(11, 'Bachelor of Science in Electrical Engineering', 3),
(12, 'Bachelor of Science in Electrical Engineering (Non-STEM)', 3),
(13, 'Bachelor of Science in Electronics Engineering', 3),
(14, 'Bachelor of Science in Electronics Engineering (Non-Stem)', 3),
(15, 'Bachelor of Science in Mechanical Engineering', 3),
(16, 'Bachelor of Science in Mechanical Engineering (Non-STEM)', 3),
(25, 'Bachelor of Science in Industrial Education\r\nInformation and Communication Technology', 4),
(26, 'Bachelor of Science in Industrial Education Home Economics', 4),
(29, 'Bachelor of Technical-Vocational Teacher Education\r\nElectrical Technology', 4),
(30, 'Bachelor of Technical-Vocational Teacher Education\r\nElectrical Technology', 4),
(31, 'Bachelor of Technical-Vocational Teacher Education Computer Programming', 4),
(32, 'Bachelor of Technical-Vocational Teacher Education Animation', 4),
(33, 'Bachelor of Engineering Technology Mechanical Technology ', 5),
(34, 'Bachelor of Engineering Technology Railway Technology', 5),
(35, 'Bachelor of Engineering Technology Mechanical Technology option in Automotive Engineering Technology', 5),
(36, 'Bachelor of Engineering Technology Mechanical Technology option in Heating, Ventilation and Air Conditioning/Refrigeration', 5),
(37, 'Bachelor of Engineering Technology Mechanical Technology option in Power Plant Engineering Technology (Non-Stem)', 5),
(38, 'Bachelor of Arts in Management (Laderized Program) Industrial Management', 6),
(39, 'Bachelor of Arts in Management major in Industrial Management', 6),
(40, 'Bachelor of Science in Entrepreneurship (ABM) ', 6),
(41, 'Bachelor of Science in Entrepreneurship (Non ABM)', 6),
(49, 'Bachelor of Applied Science in Laboratory Technology', 7),
(50, 'Bachelor of Applied Science in Laboratory Technology (Non-STEM)', 7),
(51, 'Bachelor of Science in Computer Science', 7),
(52, 'Bachelor of Science in Computer Science (Non-STEM) ', 7),
(53, 'Bachelor of Science in Environmental Science', 7),
(54, 'Bachelor of Science in Environmental Science (Non- STEM)', 7),
(55, 'Bachelor of Science in Information System', 7),
(56, 'Bachelor of Science in Information System (Non-STEM) ', 7),
(57, 'Bachelor of Science in Information Technology ', 7),
(58, 'Bachelor of Science in Information Technology (Non- STEM)', 7);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `department_name`) VALUES
(1, 'COLLEGE OF ARCHITECTURE AND FINE ARTS'),
(3, 'COLLEGE OF ENGINEERING'),
(4, 'COLLEGE OF INDUSTRIAL EDUCATION'),
(5, 'COLLEGE OF INDUSTRIAL TECHNOLOGY'),
(6, 'COLLEGE OF LIBERAL ARTS'),
(7, 'COLLEGE OF SCIENCE');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `school_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `dept_id` varchar(255) NOT NULL,
  `number` bigint(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `tracking_id` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `school_id`, `name`, `course_id`, `dept_id`, `number`, `email`, `document`, `purpose`, `quantity`, `tracking_id`, `amount`, `status`) VALUES
(4, 'asdf', 'asdf', ' asd', 'asdf', 900909, 'asdf@gmail.com', ' asdf', 'asdf', 41, 'sss', 4100, 'Approved'),
(5, 'asdf', 'ads', ' af', 'a', 900909, 'asdf@gmail.com', ' sfg', 'sfg', 2, 'asd', 200, 'Pending'),
(6, 'asdf', 'ads', ' af', 'a', 900909, 'asdf@gmail.com', ' sfg', 'sfg', 2, 'document-76947', 0, ''),
(7, 'asdf', 'asdf', ' asdf', 'asdf', 900909, 'asdf@gmail.com', ' asdf', 'asdf', 4, 'document-43821', 400, ''),
(8, 'qwer', 'qwer', ' qwr', 'qwr', 777777, 'asdf@gmail.com', ' asdf', 'sweew', 5, 'document-35044', 500, 'pending'),
(9, 'qwer', 'qwer', '  qwr', 'qwr', 777777, 'asdf@gmail.com', '  asdf', 'sweew', 5, 'document-35044', 500, 'pending'),
(11, 'cb', 'ads', ' dsbn', 'ds', 900909, 'asdf@gmail.com', ' sdfg', 'sdfg', 324, 'document-41440', 32400, 'Approved'),
(12, 'asdfds', '23', ' Bachelor in Graphics Technology Industrial Design', 'COE', 7077, '3@gmail.com', ' Form 138', 'sdgdfgd', 10, 'document62350', 1000, 'pending'),
(13, 'TUPM-20-2020', 'Kaycee Bulante', ' Bachelor of Science in Architecture', 'COE', 9090909, '1@gmail.com', ' Transcript of Records', 'ADFSDF', 4, 'document80500', 400, 'Approved'),
(14, 'adfsgdsf', 'Bulante, Kaycee D.', ' Bachelor in Graphics Technology Architecture Technology', 'COE', 0, 'kaycee.bulante@tup.edu.ph', ' Certificate of Graduation', 'dfghdfdsf', 2, 'document50804', 200, 'pending'),
(15, '', '', ' ', '', 0, 'jamielsumeracruz@gmail.com1', ' Transcript of Records', '', 2, 'document10064', 200, 'Pending'),
(16, '', '', ' ', '', 0, 'jamielsumeracruz@gmail.com1', ' Transcript of Records', '', 1, 'document42020', 100, 'Pending'),
(22, 'TUPM-20-2021', 'Jamiel SumeracruzZ', '', '3', 9123456789, 'jamielsumesdfracruz@gmail.com1111', '', 'sdfsdfsd1', 1, 'document10342', 100, 'Pending'),
(23, 'TUPM-20-2022', 'asdf1', ' 10', '', 2147483647, 'kayceeb1@gmail.com', ' Transcript of Records', 'sdfsdfsd', 2, 'document73604', 200, 'Pending'),
(24, 'TUPM-20-2022', 'asdf1', ' ', '3', 9123456789, 'kayceeb1@gmail.com', ' Transcript of Records', 'sdfsdfsd', 2, 'document66088', 200, 'Pending'),
(25, 'TUPM-20-2021', 'Kaycee Bulante', ' ', '7', 9123456789, 'kateescotido1@gmail.com', ' Transcript of Records', 'dfsdaf', 1, 'document81960', 100, 'Pending'),
(27, 'TUPM-20-2021', 'asdf', ' ', '', 9123456789, 'kateescotido1@gmail.com', ' Certificate of Graduation', 'asdf', 2, 'document67497', 200, 'Pending'),
(29, 'TUPM-20-2021', 'Kaycee Bulante', '2', '1', 9123456789, 'kaycee.bulante@tup.edu.ph', ' Transcript of Records', 'sdfsdfsd1', 3, 'document94662', 300, 'Approved'),
(30, 'TUPM-20-2021', 'Kate Escotido', '29', '4', 9123456789, 'kate@gmail.com', ' Form 137', 'scholarship', 3, 'document70526', 300, 'Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
