-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2024 at 01:50 PM
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
-- Database: `easydo`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `nic` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel_num` int(10) NOT NULL,
  `password` varchar(40) NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `nic`, `email`, `tel_num`, `password`, `profile_photo`, `last_login`, `is_deleted`) VALUES
(1, 'Niamantha', 2147483647, 'nimaa@gmail.com', 753454287, 'pword1234', '', '2024-10-15 12:41:52', 0),
(2, 'Pramith', 2147483647, 'parmith@gmail.com', 773454287, 'pword1234', '', '2024-10-27 18:50:46', 0),
(3, 'Nimesha', 2147483647, 'nimehsa@gmail.com', 723454287, 'pword1234', '', '0000-00-00 00:00:00', 0),
(4, 'Pasindu', 2147483647, 'pacindu@gmail.com', 777454287, 'pword1234', '', '2024-10-28 00:53:22', 0),
(7, 'Sahan', 2147483647, 'sahan@gmail.com', 777454287, 'sahanpword', '', '2024-09-11 22:42:38', 0),
(9, 'Kasun', 1234567890, 'kasun@gmail.com', 773454287, 'pword1234', '', '0000-00-00 00:00:00', 0),
(10, 'Vishwa', 1234567890, 'vishwa@gmail.com', 773454287, 'pword1234', '', '2024-10-22 13:17:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` int(100) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `nic` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel_num` int(10) NOT NULL,
  `work_type` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `last_login` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `user_name`, `nic`, `email`, `tel_num`, `work_type`, `password`, `last_login`, `is_deleted`) VALUES
(1, 'Pramith Fernando', 1234567890, 'pramithfernand@gmail.com', 773454280, 'Carpentry', 'pword1234', '0000-00-00 00:00:00', 0),
(2, 'Nimantha Prageeth silva', 2000109020, 'nimanth@gmail.com', 776421200, 'Mechanical', 'pword1234', '0000-00-00 00:00:00', 0),
(8, 'Kasun chamara', 2000109021, 'kasun@gmail.com', 773454286, 'Carpentry', 'pword1234', '0000-00-00 00:00:00', 0),
(9, 'Pacindu Sandeepa', 1234567890, 'pacindu@gmail.com', 123456789, 'Construction', 'pword1234', '2024-10-28 16:15:19', 0),
(10, 'Nimesha Sewwandi', 2002101045, 'nimesha@gmail.com', 777568790, 'Plumbing', 'pword1234', '0000-00-00 00:00:00', 0),
(11, 'Vishwa', 2014789650, 'vishwa@gmail.com', 754894545, 'Electrical', 'pword1234', '0000-00-00 00:00:00', 0),
(12, 'Sahan', 2003478945, 'sahan@gmail.com', 745481212, 'Painting', 'pword1234', '2024-10-28 17:11:01', 0),
(13, 'Pramith Fernando', 1234567890, 'pramith9@gmail.com', 773454287, 'Construction', 'pword1234', '2024-10-29 16:37:37', 0),
(14, 'vishwa Saranga', 1234567890, 'vishva@gmail.com', 773454288, 'Mechanical', 'pword1234', '0000-00-00 00:00:00', 0),
(15, 'Chathura Umayanga', 1234567890, 'chathur@gmail.com', 773454520, 'Carpentry', 'pword1234', '0000-00-00 00:00:00', 0),
(16, 'Miran', 1234567890, 'miran@gmail.com', 773454287, 'Carpentry', 'pword1234', '0000-00-00 00:00:00', 0),
(17, 'Vidura', 1234567890, 'vinu@gmail.com', 773454287, 'Construction', 'pword1234', '0000-00-00 00:00:00', 0),
(18, 'Kamal Salgadu', 1234567890, 'kamal673@gmail.com', 773454252, 'Plumbing', 'pword1234', '0000-00-00 00:00:00', 0),
(19, 'Kamal Nishantha', 1234567890, 'kamal7@gmail.com', 773454287, 'Construction', 'PWORD1234', '0000-00-00 00:00:00', 0),
(20, 'Nimal', 1234567890, 'nimal@gmail.com', 773454287, 'Construction', 'pword1234', '0000-00-00 00:00:00', 0),
(21, 'Levidu Thathsara', 2000109020, 'levidu@gmail.com', 773454280, 'Carpentry', 'pword1234', '2024-10-28 22:18:01', 0),
(22, 'Supun sasanka', 2000109021, 'supun@gmail.com', 756421820, 'Mechanical', 'pword1234', '2024-10-28 22:20:03', 0),
(23, 'Navindu', 2000109021, 'navidu@gmail.com', 773454287, 'Carpentry', 'pword1234', '2024-10-28 22:54:02', 0),
(24, 'Levan thathsara', 2000109021, 'levan@gmail.com', 756421526, 'Mechanical', 'pword1234', '0000-00-00 00:00:00', 0),
(25, 'pramith', 1234567890, 'pramithferna673@gmail.com', 773454287, 'Mechanical', 'pword1234', '0000-00-00 00:00:00', 0),
(26, 'pramith', 2000109020, 'pramithfernando63@gmail.com', 773454287, 'Mechanical', 'pword1234', '2024-10-28 23:39:11', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
