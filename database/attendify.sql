-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2024 at 04:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendify`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_id` varchar(100) NOT NULL,
  `datetime_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `datetime_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `admin_id`, `datetime_created`, `datetime_updated`) VALUES
(1, 'admin1', '$2y$10$.l0Iu0SubKMIaoEbAthpseoZAWMxozbLF35orfeTb1AhA2K2ZvJjm', 'ADMIN-001', '2024-07-19 15:01:15', '2024-08-31 03:48:07'),
(2, 'admin2', 'password456', 'ADMIN-002', '2024-07-19 15:01:15', '2024-07-19 15:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `class_no` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `attendance_id` varchar(100) NOT NULL,
  `student_no` varchar(100) NOT NULL,
  `datetime_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `datetime_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `class_no`, `date`, `status`, `attendance_id`, `student_no`, `datetime_created`, `datetime_updated`) VALUES
(3, 'DIT2-1', '2024-07-01', 'Present', 'A001', '2022-001-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(4, 'DIT2-1', '2024-07-01', 'Absent', 'A002', '2022-001-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(5, 'DIT2-1', '2024-07-01', 'Present', 'A003', '2022-001-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(6, 'DIT2-1', '2024-07-01', 'Present', 'A004', '2022-001-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(7, 'DIT2-1', '2024-07-01', 'Late', 'A005', '2022-001-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(8, 'DIT2-1', '2024-07-01', 'Present', 'A006', '2022-001-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(9, 'DIT2-1', '2024-07-01', 'Absent', 'A007', '2022-001-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(10, 'DIT2-1', '2024-07-01', 'Present', 'A008', '2022-001-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(11, 'DIT2-1', '2024-07-01', 'Present', 'A009', '2022-001-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(12, 'DIT2-1', '2024-07-01', 'Present', 'A010', '2022-001-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(13, 'BSIT2-1', '2024-07-02', 'Present', 'A011', '2022-016-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(14, 'BSIT2-1', '2024-07-01', 'Present', 'A012', '2022-016-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(15, 'BSIT2-1', '2024-07-01', 'Absent', 'A013', '2022-016-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(16, 'BSIT2-1', '2024-07-01', 'Present', 'A014', '2022-016-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(17, 'BSIT2-1', '2024-07-01', 'Late', 'A015', '2022-016-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(18, 'BSIT2-1', '2024-07-01', 'Present', 'A016', '2022-016-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(19, 'BSIT2-1', '2024-07-01', 'Absent', 'A017', '2022-016-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(20, 'BSIT2-1', '2024-07-01', 'Present', 'A018', '2022-016-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(21, 'BSIT2-1', '2024-07-01', 'Present', 'A019', '2022-016-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(22, 'BSIT2-1', '2024-07-01', 'Present', 'A020', '2022-016-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(23, 'BSIT2-1', '2024-07-01', 'Present', 'A021', '2022-016-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(24, 'BSIT2-1', '2024-07-01', 'Present', 'A022', '2022-016-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(25, 'BSIT2-1', '2024-07-01', 'Absent', 'A023', '2022-016-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(26, 'BSIT2-1', '2024-07-01', 'Present', 'A024', '2022-016-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(27, 'BSIT2-1', '2024-07-01', 'Present', 'A025', '2022-016-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(28, 'BSIT2-1', '2024-07-01', 'Present', 'A026', '2022-016-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(29, 'BSIT2-1', '2024-07-01', 'Present', 'A027', '2022-016-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57'),
(30, 'BSIT2-1', '2024-07-01', 'Absent', 'A028', '2022-016-TG-0', '2024-07-20 01:38:53', '2024-09-01 15:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `class_no` varchar(100) NOT NULL,
  `student_no` varchar(100) NOT NULL,
  `courses_id` varchar(100) NOT NULL,
  `prof_id` varchar(100) NOT NULL,
  `datetime_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `datetime_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_no`, `student_no`, `courses_id`, `prof_id`, `datetime_created`, `datetime_updated`) VALUES
(1, 'DIT2-1', '2022-001-TG-0', 'C001', 'P0001', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(2, 'DIT2-1', '2022-002-TG-0', 'C001', 'P0001', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(3, 'DIT2-1', '2022-003-TG-0', 'C001', 'P0001', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(4, 'DIT2-1', '2022-004-TG-0', 'C001', 'P0001', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(5, 'DIT2-1', '2022-005-TG-0', 'C001', 'P0001', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(6, 'DIT2-1', '2022-006-TG-0', 'C001', 'P0001', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(7, 'DIT2-1', '2022-007-TG-0', 'C001', 'P0001', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(8, 'DIT2-1', '2022-008-TG-0', 'C001', 'P0001', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(9, 'DIT2-1', '2022-009-TG-0', 'C001', 'P0001', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(10, 'DIT2-1', '2022-010-TG-0', 'C001', 'P0001', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(11, 'BSIT2-1', '2022-016-TG-0', 'C002', 'P0002', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(12, 'BSIT2-1', '2022-017-TG-0', 'C002', 'P0002', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(13, 'BSIT2-1', '2022-018-TG-0', 'C002', 'P0002', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(14, 'BSIT2-1', '2022-019-TG-0', 'C002', 'P0002', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(15, 'BSIT2-1', '2022-020-TG-0', 'C002', 'P0002', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(16, 'BSIT2-1', '2022-021-TG-0', 'C002', 'P0002', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(17, 'BSIT2-1', '2022-022-TG-0', 'C002', 'P0002', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(18, 'BSIT2-1', '2022-023-TG-0', 'C002', 'P0002', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(19, 'BSIT2-1', '2022-024-TG-0', 'C002', 'P0002', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(20, 'BSIT2-1', '2022-025-TG-0', 'C002', 'P0002', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(21, 'BSIT2-1', '2022-026-TG-0', 'C002', 'P0002', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(22, 'BSIT2-1', '2022-027-TG-0', 'C002', 'P0002', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(23, 'BSIT2-1', '2022-028-TG-0', 'C002', 'P0002', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(24, 'BSIT2-1', '2022-029-TG-0', 'C002', 'P0002', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(25, 'BSIT2-1', '2022-030-TG-0', 'C002', 'P0002', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(26, 'BSIT2-1', '2022-031-TG-0', 'C002', 'P0002', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(27, 'BSIT2-1', '2022-032-TG-0', 'C002', 'P0002', '2024-07-20 01:30:26', '2024-08-31 04:27:37'),
(28, 'BSIT2-1', '2022-033-TG-0', 'C002', 'P0002', '2024-07-20 01:30:26', '2024-08-31 04:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `courses_id` varchar(100) NOT NULL,
  `course_def` varchar(100) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `datetime_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `datetime_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `courses_id`, `course_def`, `course_code`, `datetime_created`, `datetime_updated`) VALUES
(1, 'C001', 'Web Development', 'WEBDEV', '2024-07-20 01:32:08', '2024-07-20 01:32:08'),
(2, 'C002', 'Object-Oriented Programming', 'OOP', '2024-07-20 01:32:08', '2024-07-20 01:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `course` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `prof_id` varchar(100) NOT NULL,
  `datetime_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `datetime_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`id`, `firstname`, `middlename`, `lastname`, `birthday`, `age`, `gender`, `address`, `email`, `phone`, `course`, `status`, `password`, `prof_id`, `datetime_created`, `datetime_updated`) VALUES
(1, 'Steven', 'N/A', 'Villarosa', 'N/A', 0, '29', 'N/A', 'stevenvillarosa@gmail.com', 0, 'WebDev', 'Full Time', '1234567890', 'P0001', '2024-07-20 01:34:01', '2024-09-02 14:47:11'),
(2, 'Francis', 'N/A', 'Franco', 'N/A', 0, '30', 'N/A', 'francisfranco@gmail.com', 0, 'OOP', 'Part time', '1234567890', 'P0002', '2024-07-20 01:34:01', '2024-07-21 11:35:47'),
(3, 'John', 'ru', 'reyes', '1990-07-19', 0, '', '', 'zling@choso.tech', 0, 'webdev', 'full-time', '1234567890', 'P00003', '2024-08-30 16:46:05', '2024-09-02 14:47:17'),
(4, 'John', 'ru', 'reyes', '1999-02-17', 0, '', '', 'sadsad@gmail.com', 0, 'oop', 'part-time', '$2y$10$JcErujC.dOXtH3CM6dXAp.smy5ob21J/rp60M8K9JZVlxGKF/FPKe', 'P00004', '2024-08-30 16:50:40', '2024-08-30 16:50:40'),
(5, 'asdasd', 'asda', 'dsadas', '2009-07-24', 0, '', '', 'asdas@gmail.com', 0, 'webdev', 'full-time', '$2y$10$YfpegV4PVgqnV57WgaKQ.evFDMXkPbzFa1DTYnMeJJkWIBxwwRWtW', 'P00005', '2024-08-30 17:04:19', '2024-08-30 17:04:19'),
(6, 'dddd', 'aaa', 'ss', '2004-11-18', 0, '', '', 'ddsd@gmail.com', 0, 'webdev', 'full-time', '$2y$10$/CjhyahC3uIee9kaCG/hMex48jmN8lUi.9MVKzw.WSdHoG8QkYHTK', 'P00006', '2024-08-30 17:23:26', '2024-08-30 17:23:26'),
(7, 'sad', 'sadsa', 'asdsa', '1996-02-07', 0, '', '', 'zling@choso.tech', 0, 'webdev', 'full-time', '1234567890', 'P00007', '2024-09-02 14:38:19', '2024-09-02 14:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datetime_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `datetime_updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `student_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstname`, `middlename`, `lastname`, `birthday`, `age`, `gender`, `address`, `email`, `phone`, `password`, `datetime_created`, `datetime_updated`, `student_number`) VALUES
(1, 'Jheferson Zambra', 'N/A', 'Añonuevo', 'N/A', 0, 'Male', 'N/A', 'jhefersonzanonuevo@gmail.com', 9499594451, 'password', '2024-07-20 01:29:14', '2024-07-20 01:29:14', '2022-001-TG-0'),
(2, 'Mark Louie Calzado', 'N/A', 'Cahigan', 'N/A', 0, 'Male', 'N/A', 'markcahigan54@gmail.com', 9204535357, 'password', '2024-07-20 01:29:14', '2024-07-20 01:29:14', '2022-002-TG-0'),
(3, 'Elidia', 'N/A', 'Dacuag', 'N/A', 0, 'Female', 'N/A', 'elidia.dacuag@gmail.com', 9207305342, 'password', '2024-07-20 01:29:14', '2024-07-20 01:29:14', '2022-003-TG-0'),
(4, 'John Deniel Libutan', 'N/A', 'Escuro', 'N/A', 0, 'Male', 'N/A', 'johndenielescuro@gmail.com', 9760466958, '$2y$10$co8tTdfW.JYyBTkKLeFsRuKjUvSk2GHs0gemf2c65s1VLKIJ4NRky', '2024-07-20 01:29:14', '2024-07-20 01:29:14', '2022-004-TG-0'),
(5, 'Marc Oliver Lood', 'N/A', 'Gasta', 'N/A', 0, 'Male', 'N/A', 'marcolivergastagonzales@gmail.com', 9488642607, 'password', '2024-07-20 01:29:14', '2024-07-20 01:29:14', '2022-005-TG-0'),
(6, 'Andrei Jireh Morales', 'N/A', 'Ilagan', 'N/A', 0, 'Male', 'N/A', 'ilaganandreijireh@gmail.com', 9087235282, 'password', '2024-07-20 01:29:14', '2024-07-20 01:29:14', '2022-006-TG-0'),
(7, 'Walter', 'N/A', 'Japitana', 'N/A', 0, 'Male', 'N/A', 'walter.japitana@gmail.com', 9458900525, '$2y$10$UTkotIdkyZ0n01eANeNtB.8qSZ/UYVVDr08xJzDrosoWBJr2kMnhC', '2024-07-20 01:29:14', '2024-07-20 01:29:14', '2022-007-TG-0'),
(8, 'Abdul Jabbar', 'N/A', 'Mira-ato', 'N/A', 0, 'Male', 'N/A', 'ajmiraato95@gmail.com', 9164490815, 'password', '2024-07-20 01:29:14', '2024-07-20 01:29:14', '2022-008-TG-0'),
(9, 'Melchor James', 'N/A', 'Malapad', 'N/A', 0, 'Male', 'N/A', 'melchorjamesmalapad22@gmail.com', 9760466958, 'password', '2024-07-20 01:29:14', '2024-07-20 01:29:14', '2022-009-TG-0'),
(10, 'Von Ryan Caminoy', 'N/A', 'Nogadas', 'N/A', 0, 'Male', 'N/A', 'vonnogadas251@gmail.com', 9690295523, 'password', '2024-07-20 01:29:14', '2024-07-20 01:29:14', '2022-010-TG-0'),
(11, 'Alona Jane Navarro', 'N/A', 'Pepito', 'N/A', 0, 'Female', 'N/A', 'pepitoalona231@gmail.com', 9392732727, 'password', '2024-07-20 01:29:29', '2024-07-20 01:29:29', '2022-011-TG-0'),
(12, 'Maui Jane Sabelita', 'N/A', 'Roche', 'N/A', 0, 'Female', 'N/A', 'rochemaui165@gmail.com', 9429362911, 'password', '2024-07-20 01:29:29', '2024-07-20 01:29:29', '2022-012-TG-0'),
(13, 'Angelica Guibao', 'N/A', 'Rosario', 'N/A', 0, 'Female', 'N/A', 'angelicalykarosario@gmail.com', 9691300512, 'password', '2024-07-20 01:29:29', '2024-07-20 01:29:29', '2022-013-TG-0'),
(14, 'Akisha Gelsey Lopena', 'N/A', 'Santos', 'N/A', 0, 'Female', 'N/A', 'akishagelsey00@gmail.com', 9267950299, 'password', '2024-07-20 01:29:29', '2024-07-20 01:29:29', '2022-014-TG-0'),
(15, 'Mikaella Antonette Villanueva', 'N/A', 'Tayoto', 'N/A', 0, 'Female', 'N/A', 'mikaellatayoto04@gmail.com', 9667422317, 'password', '2024-07-20 01:29:29', '2024-07-20 01:29:29', '2022-015-TG-0'),
(16, 'Dinnes Bilan', 'N/A', 'Aldave', 'N/A', 0, 'Male', 'N/A', 'dinnesaldav3@gmail.com', 9451589313, 'password', '2024-07-20 01:29:29', '2024-07-20 01:29:29', '2022-016-TG-0'),
(17, 'Alec Godwin Caaya', 'N/A', 'Almirañez', 'N/A', 0, 'Male', 'N/A', 'almiranezalec8@gmail.com', 9478171950, 'password', '2024-07-20 01:29:29', '2024-07-20 01:29:29', '2022-017-TG-0'),
(18, 'Lea Sace', 'N/A', 'Arca', 'N/A', 0, 'Female', 'N/A', 'arcalea8@gmail.com', 9091547277, 'password', '2024-07-20 01:29:29', '2024-07-20 01:29:29', '2022-018-TG-0'),
(19, 'Martin Alba', 'N/A', 'Avendaño', 'N/A', 0, 'Male', 'N/A', 'martinavendano205@gmail.com', 9393209000, 'password', '2024-07-20 01:29:29', '2024-07-20 01:29:29', '2022-019-TG-0'),
(20, 'Johnas Jr. Jimenez', 'N/A', 'Bautista', 'N/A', 0, 'Male', 'N/A', 'johnasbautistajr03@gmail.com', 9694526920, 'password', '2024-07-20 01:29:29', '2024-07-20 01:29:29', '2022-020-TG-0'),
(21, 'Tyron Panti', 'N/A', 'Bechayda', 'N/A', 0, 'Male', 'N/A', 'tyronbechayda1112@gmail.com', 9205662597, 'password', '2024-07-20 01:29:29', '2024-07-20 01:29:29', '2022-021-TG-0'),
(22, 'Marius Augustus Maik', 'N/A', 'Bernabe', 'N/A', 0, 'Male', 'N/A', 'bernabezeus16@gmail.com', 9222667247, 'password', '2024-07-20 01:29:29', '2024-07-20 01:29:29', '2022-022-TG-0'),
(23, 'Joshua Jerico Capalaran', 'N/A', 'Bilog', 'N/A', 0, 'Male', 'N/A', 'jbilog021@gmail.com', 9696102333, 'password', '2024-07-20 01:29:29', '2024-07-20 01:29:29', '2022-023-TG-0'),
(24, 'Kamilah Joie', 'N/A', 'Cabra', 'N/A', 0, 'Female', 'N/A', 'kjcabra@gmail.com', 9287525165, 'password', '2024-07-20 01:29:29', '2024-07-20 01:29:29', '2022-024-TG-0'),
(25, 'Noel Provido', 'N/A', 'Cairo', 'N/A', 0, 'Male', 'N/A', 'ncairojr@gmail.com', 9982900087, 'password', '2024-07-20 01:29:29', '2024-07-20 01:29:29', '2022-025-TG-0'),
(26, 'Rhea Mae Tangub', 'N/A', 'Rosalia', 'N/A', 0, 'Female', 'N/A', 'rheamaetangub@gmail.com', 9605878801, 'password', '2024-07-20 01:29:57', '2024-07-20 01:29:57', '2022-026-TG-0'),
(27, 'Vaneric Galang', 'N/A', 'San Pascual', 'N/A', 0, 'Female', 'N/A', 'vanericsanpascual@gmail.com', 9159532593, 'password', '2024-07-20 01:29:57', '2024-07-20 01:29:57', '2022-027-TG-0'),
(28, 'Ma. Ellyza Rufino', 'N/A', 'Teniero', 'N/A', 0, 'Female', 'N/A', 'ellyza.teniero@gmail.com', 9663882225, 'password', '2024-07-20 01:29:57', '2024-07-20 01:29:57', '2022-028-TG-0'),
(29, 'Aliza Balde', 'N/A', 'Tobongbanua', 'N/A', 0, 'Female', 'N/A', 'alizabalde@gmail.com', 9391549763, 'password', '2024-07-20 01:29:57', '2024-07-20 01:29:57', '2022-029-TG-0'),
(30, 'Danzig Lawrence Villamena', 'N/A', 'Uy', 'N/A', 0, 'Male', 'N/A', 'danzigvillamena@gmail.com', 9274576469, 'password', '2024-07-20 01:29:57', '2024-07-20 01:29:57', '2022-030-TG-0'),
(31, 'Jhay Dominique Parongao', 'N/A', 'Velasco', 'N/A', 0, 'Male', 'N/A', 'jhayvelasco@gmail.com', 9953544649, 'password', '2024-07-20 01:29:57', '2024-07-20 01:29:57', '2022-031-TG-0'),
(32, 'Joshua Florante', 'N/A', 'Vidal', 'N/A', 0, 'Male', 'N/A', 'joshua.vidal@gmail.com', 9617029780, 'password', '2024-07-20 01:29:57', '2024-07-20 01:29:57', '2022-032-TG-0'),
(33, 'Mary Rose Ann Lagare', 'N/A', 'Virtudazo', 'N/A', 0, 'Female', 'N/A', 'maryroseann@gmail.com', 9618006620, 'password', '2024-07-20 01:29:57', '2024-07-20 01:29:57', '2022-033-TG-0'),
(38, 'sadsa', 'sada', 'dsad', '2002-02-05', 0, '', '', 'rerrere@gmail.com', 0, '$2y$10$IFcGt6pFeSkEtePhKKBIA.p975mbDQ.oRXQBF/X94.YpDBO1zRRkS', '2024-08-31 02:40:37', '2024-08-31 02:40:37', '2022-034-TG-0'),
(39, 'haha', 'hhee', 'hihi', '2024-04-26', 0, '', '', 'reasdsadsada@gmail.com', 0, 'password', '2024-08-31 03:49:25', '2024-08-31 03:49:25', '2022-035-TG-0'),
(40, 'asdsad', 'asdsad', 'asdsad', '2005-02-08', 0, '', '', 'erereaf@gmail.com', 0, '$2y$10$ZyMnMe6k2sljIWRmL8n6BuOMsos.rPwzsblm87pF3v/LfmSvLiIZS', '2024-09-02 11:59:06', '2024-09-02 11:59:06', '2022-036-TG-0'),
(42, 'Testing', 'Testing', 'Testing', '2007-07-13', 0, '', '', 'asdss@gmail.com', 0, 'password', '2024-09-02 14:36:46', '2024-09-02 14:36:46', '2022-038-TG-0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
