-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 03:41 PM
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
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `subject`, `marks`) VALUES
(5, 'Theda Tomadoni', 'Granite Surfaces', 100),
(6, 'Delilah Schulz', 'Waterproofing & Caulking', 51),
(7, 'Kaycee Boom', 'HVAC', 16),
(8, 'Joycelin Rivelin', 'Elevator', 61),
(9, 'Aurel Quilleash', 'Roofing (Asphalt)', 81),
(10, 'Kurt Mordon', 'Temp Fencing, Decorative Fencing and Gates', 43),
(11, 'Aidan Tante', 'Electrical', 28),
(12, 'Adela Bizzey', 'Epoxy Flooring', 92),
(13, 'Aprilette Suff', 'Waterproofing & Caulking', 86),
(14, 'Sky Pawlata', 'Prefabricated Aluminum Metal Canopies', 51),
(15, 'Marchall Bothram', 'Elevator', 96),
(16, 'Phillipp Marquez', 'Structural and Misc Steel (Fabrication)', 88),
(17, 'Nike Pettit', 'Asphalt Paving', 81),
(18, 'Lula MacCahey', 'Drywall & Acoustical (MOB)', 3),
(19, 'Dilly Gantzer', 'Site Furnishings', 0),
(20, 'Vevay Bampton', 'Drywall & Acoustical (MOB)', 61),
(21, 'Suellen Kiera', 'Roofing (Metal)', 7),
(22, 'Henrieta Vasic', 'Asphalt Paving', 29),
(23, 'Jan Boyat', 'Electrical', 76),
(24, 'Rodolfo Wanell', 'Roofing (Metal)', 55),
(25, 'Desmund Summerscales', 'EIFS', 73),
(26, 'Rosco Lensch', 'Temp Fencing, Decorative Fencing and Gates', 8),
(27, 'Andromache Papaminas', 'Construction Clean and Final Clean', 51),
(28, 'Benedikta Amburgy', 'Drywall & Acoustical (MOB)', 47),
(29, 'Vaughan Duggon', 'Elevator', 65),
(30, 'Ambros Kahan', 'Roofing (Metal)', 73),
(31, 'Ram', 'Ready for use', 20),
(32, 'Mouse', 'Account Profile Update', 30),
(33, 'Sejal Shaw', 'Payment Failed', 200);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `username`, `password`) VALUES
(1, 'Admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
