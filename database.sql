-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Aug 04, 2024 at 01:42 AM
-- Server version: 11.4.2-MariaDB-ubu2404
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serverside`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(20) NOT NULL,
  `UserID` int(11) NOT NULL DEFAULT 1,
  `title` varchar(50) NOT NULL,
  `content` text DEFAULT NULL,
  `time_stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `UserID`, `title`, `content`, `time_stamp`) VALUES
(4, 1, 'vhhg', 'vfhguj', '2024-07-22 22:45:59'),
(6, 1, 'kildonan park', 'beautiful place to visit\r\n', '2024-07-23 19:41:24'),
(7, 1, 'Enderton Park', 'A park is a designated open space within urban or rural areas designed for recreational and leisure activities. Parks offer a respite from the bustle of city life, providing green areas where people can enjoy nature, engage in physical exercise, and socialize. Typically, parks feature various amenities such as walking trails, playgrounds, picnic areas, sports facilities, and landscaped gardens. These spaces contribute significantly to the quality of life by offering a safe and accessible environment for people of all ages to relax and interact.\r\n\r\nParks play a crucial role in environmental conservation, helping to improve air quality, manage stormwater, and support local wildlife. They also serve as communal hubs, fostering a sense of community and promoting social well-being. By integrating natural landscapes into urban settings, parks help mitigate the effects of urbanization and offer a sanctuary for both residents and visitors.\r\n\r\nIn addition to their recreational benefits, parks often host community events, cultural activities, and educational programs, enhancing the vibrancy of a community.\r\nIn addition to their recreational benefits, parks often host community events, cultural activities, and educational programs, enhancing the vibrancy of a community.', '2024-07-29 01:59:10'),
(8, 1, '', 'hgducavkbdcnz h gvsfbdmc78v hy aey vbievhinejvdc  hbavcujlk.vds ', '2024-07-29 02:41:25'),
(9, 1, 'Hello World', 'iir6ue5as rdtyu dfgtyui ', '2024-08-04 01:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
