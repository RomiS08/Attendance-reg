-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 08:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attandee`
--

CREATE TABLE `attandee` (
  `attendee_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `dateofbirth` date NOT NULL,
  `emailaddress` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `specialty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attandee`
--

INSERT INTO `attandee` (`attendee_id`, `firstname`, `lastname`, `dateofbirth`, `emailaddress`, `telephone`, `specialty_id`) VALUES
(101, '   Linking', '   Park', '1970-10-20', 'Linkingpark@gmail.com', ' +1485271458623', 2),
(121, 'Albert', 'Einstein', '1950-03-28', 'Albert165Einstein@gmail.com', '+97541207899312', 1),
(124, 'Jones', 'Clear', '1990-05-15', 'noobmaster@gmail.com', '+94706147178', 4),
(125, 'noob', 'master', '2002-05-20', 'noobmaster@gmail.com', '964706147178', 1),
(131, 'Walter', 'Brien', '1994-12-29', 'walterbrien12@gmail.com', '964706147178', 4),
(135, 'wait', 'master', '2001-05-29', 'waitcoolbhbhbhb@gmail.com', '3265465415564', 2);

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `specialty_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`specialty_id`, `name`) VALUES
(1, 'Database Administrator'),
(2, 'Software Engineer'),
(3, 'Web Administrator'),
(4, 'DevOps Engineer'),
(5, 'Other');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attandee`
--
ALTER TABLE `attandee`
  ADD PRIMARY KEY (`attendee_id`),
  ADD KEY `fk_attendee_specialties` (`specialty_id`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`specialty_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attandee`
--
ALTER TABLE `attandee`
  MODIFY `attendee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `specialty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attandee`
--
ALTER TABLE `attandee`
  ADD CONSTRAINT `fk_attendee_specialties` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`specialty_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
