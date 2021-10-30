-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2021 at 05:29 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `number` varchar(20) NOT NULL,
  `field` varchar(20) NOT NULL,
  `hospital_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `email`, `password`, `number`, `field`, `hospital_name`) VALUES
(1, 'MANOJ PANDEY', 'drmanojr@gmail.com', '12', '999999999', 'PSYCHIATRIST', 'PJ HOSP');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `age` int(10) NOT NULL,
  `relatives_name` varchar(30) NOT NULL,
  `relatives_email` varchar(30) NOT NULL,
  `relatives_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `full_name`, `email`, `password`, `mobile_number`, `gender`, `age`, `relatives_name`, `relatives_email`, `relatives_number`) VALUES
(1, 'ANITA SHARMA', 'anita_sharma@gmail.com', '123456', '999999999', 'F', 70, 'RAHUL SHARMA', 'rs@gmail.com', '999999999');

-- --------------------------------------------------------

--
-- Table structure for table `medical_store`
--

CREATE TABLE `medical_store` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `ms_name` varchar(30) NOT NULL,
  `number` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_store`
--

INSERT INTO `medical_store` (`id`, `name`, `ms_name`, `number`, `email`, `password`) VALUES
(1, 'Pushpak Singh', 'PUSHPAK MEDICAL', '9999999999', 'pushpakmedic@gmail.com', 123);

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `problem_id` int(10) NOT NULL,
  `patient_points` int(10) NOT NULL,
  `patient_problems` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `patient_id`, `problem_id`, `patient_points`, `patient_problems`) VALUES
(22, 1, 3, 73, 'sour taste,runny nose,'),
(23, 1, 2, 62, 'gas problem,weight loss,pain in upper abdomen,'),
(24, 1, 1, 17, 'dont have any hobbies,eating problem,anti social,sleep problem,');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `id` int(10) NOT NULL,
  `problem_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`id`, `problem_name`) VALUES
(1, 'DEPRESSION'),
(2, 'INDIGESTION'),
(3, 'COUGH');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) NOT NULL,
  `que_key` varchar(20) NOT NULL,
  `question` varchar(400) NOT NULL,
  `que_problem` varchar(30) NOT NULL,
  `que_points` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `que_key`, `question`, `que_problem`, `que_points`) VALUES
(1, '1', 'Do you get sound sleep?', 'sleep problem', 1),
(2, '1', 'Do you like talking to most of the people?', 'anti social', 1),
(3, '1', 'Are you eating less than you normally do?', 'eating problem', 2),
(4, '1', 'Do you like to watch serials, listening songs or any other hobbies ?', 'dont have any hobbies', 1),
(5, '1', 'Are you alone?', 'alone', 1),
(6, '2', 'Discomfort in the upper abdomen.', 'pain in upper abdomen', 1),
(7, '2', 'Nausea(You feel as if you want to vomit).', 'nausea', 2),
(8, '2', 'Unintentional weight loss or loss of appetite', 'weight loss', 3),
(9, '2', 'Trouble swallowing that gets progressively worse', 'trouble swallowing', 3),
(10, '2', 'Chest pain on exertion or with stress', 'chest pain', 3),
(11, '2', 'Belching and gas?', 'gas problem', 1),
(12, '3', 'A runny or stuffy nose', 'runny nose', 1),
(13, '3', 'Heartburn or a sour taste in your mouth', 'sour taste', 2),
(14, '3', 'Wheezing and shortness of breath', 'shortness of breath', 3),
(15, '3', 'loss of taste', 'no taste', 2),
(16, '3', 'coughing up blood', 'blood in cough', 3);

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `id` int(10) NOT NULL,
  `doc_id` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `ms_id` int(10) NOT NULL,
  `medicines` varchar(400) NOT NULL,
  `doc_advice` varchar(400) NOT NULL,
  `medicines_got` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`id`, `doc_id`, `patient_id`, `ms_id`, `medicines`, `doc_advice`, `medicines_got`) VALUES
(13, 0, 1, 0, '   paracetamol   ', '   take this medicine for two days   ', 0),
(14, 0, 1, 0, '   crocin', '  take this medicine today only', 0),
(15, 0, 1, 0, '   vicks', '  take this for 3 days ', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_store`
--
ALTER TABLE `medical_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medical_store`
--
ALTER TABLE `medical_store`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
