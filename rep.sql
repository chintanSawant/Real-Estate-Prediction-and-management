-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 03:55 PM
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
-- Database: `rep`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`id`, `email`, `password`) VALUES
(2, 'prabhakar@gmail.com', 'pb1234');

-- --------------------------------------------------------

--
-- Table structure for table `flats`
--

CREATE TABLE `flats` (
  `flat_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `builders_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `rooms` int(11) NOT NULL,
  `ammenities` varchar(100) NOT NULL,
  `address` varchar(50) NOT NULL,
  `location` varchar(20) NOT NULL,
  `contact_builder` varchar(20) NOT NULL,
  `flat_image` text NOT NULL,
  `more_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flats`
--

INSERT INTO `flats` (`flat_id`, `name`, `builders_name`, `price`, `rooms`, `ammenities`, `address`, `location`, `contact_builder`, `flat_image`, `more_image`) VALUES
(8, 'Aneeket', 'Hayden', 10000000, 3, 'Kachro,GMC,Goa University\r\n', 'Talegao', 'flat_images/', '7410258963', 'flat_images/MCN 5q.png', ''),
(13, 'ewffewewfe', 'efewfewffewfe', 200000, 3, 'wefefewsszswqwqwswqq', 'wefewfefeweef', 'flat_images/', '7894561230', 'flat_images/bittint admin1.png', 'Website6.png Website7.png Website8.png ');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fullname`, `email`, `password`, `phone`, `gender`) VALUES
(1, 'prabhakar', 'prabhakar@gmail.com', 'pb1234', '8600577138', 'male'),
(2, 'PRABHAKAR BUDKULEY', 'pb@gmail.com', 'pb12345', '7410852963', 'male'),
(3, 'prabhakar budkuley', 'pb12@gmail.com', '$2y$10$c2jew0D7Wq7QcN6zVexJXeJMYdsqCY/AV.MuoAwUrNJ', '8600577138', 'male'),
(4, 'prabhakar budkuley', 'prabhakarb@gmail.com', '$2y$10$gbPdWJbSLKEZh01zaNH/juWUwYqicLtGa6cyvMGMWPf', '8600577138', 'male'),
(6, 'prabhakar', 'pb1234@gmail.com', '$2y$10$0tUWImGA47PF7zyvuH/u0OLK9zyi8rUGQmvn46bhy2o', '7410258963', 'male'),
(7, 'PRABHAKAR', 'prabhakar12@gmail.com', 'bbf659f29d99807fb2627bac14f288c1', '7410258936', 'male'),
(9, 'pb', 'pb123@gmail.com', '5aa1c2f33f106c1966af371fc7a31d69', '7410236598', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `rents`
--

CREATE TABLE `rents` (
  `rent_id` int(11) NOT NULL,
  `owner_name` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `rent_price` int(11) NOT NULL,
  `rooms` int(11) NOT NULL,
  `security_deposit` int(11) NOT NULL,
  `water_available` varchar(20) NOT NULL,
  `ammenities` varchar(100) NOT NULL,
  `contact_owner` varchar(20) NOT NULL,
  `rent_image` text NOT NULL,
  `more_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rents`
--

INSERT INTO `rents` (`rent_id`, `owner_name`, `address`, `location`, `rent_price`, `rooms`, `security_deposit`, `water_available`, `ammenities`, `contact_owner`, `rent_image`, `more_image`) VALUES
(1, 'seffsefsef', 'fefeggg', 'esggeasgagea', 0, 0, 0, 'eggesggesgeege', '', 'geesgeggg', 'rent_images/', ''),
(4, 'safdawfdqwf', 'frgfeefeeegfefe', 'ffafaaw', 2000000, 0, 30000, 'ffwafawfqwqq', 'wafbbahbfhbafbhj', '8652121213', 'rent_images/MCN 5b.png', ''),
(5, 'hjawvgdhg', 'asddasfbasbf', 'ffmskfnjsbkjgv', 20000, 3, 10000, 'yrsu', 'fkmsnefbsfjsnfjjaslfjkjsdnljkjhlkjjfhkjjflkkjfkjhfkjlknkjdbvckjlknkjdbkjnkjbdbvbdjvgbnjvbjbvhjvhjvbj', '5456465465', 'rent_images/MCN 5b.png', ''),
(6, 'hjawvgdhg', 'asddasfbasbf', 'ffmskfnjsbkjgv', 20000, 3, 10000, 'yrsu', 'fkmsnefbsfjsnfjjaslfjkjsdnljkjhlkjjfhkjjflkkjfkjhfkjlknkjdbvckjlknkjdbkjnkjbdbvbdjvgbnjvbjbvhjvhjvbj', '5456465465', 'rent_images/MCN 5b.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `villa`
--

CREATE TABLE `villa` (
  `villa_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `agent` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `ammenities` varchar(100) NOT NULL,
  `furnished_status` varchar(10) NOT NULL,
  `contact_agent` varchar(20) NOT NULL,
  `villa_image` text NOT NULL,
  `more_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `villa`
--

INSERT INTO `villa` (`villa_id`, `name`, `agent`, `address`, `location`, `price`, `ammenities`, `furnished_status`, `contact_agent`, `villa_image`, `more_image`) VALUES
(2, 'fwafafawf', 'fafawfawwaf', 'sefefasa', 'villa_images/', 123121231, 'fsefsefbsjfbkjebfijbjg', 'fsefsefsef', 'fsefsefsef', 'villa_images/', ' ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flats`
--
ALTER TABLE `flats`
  ADD PRIMARY KEY (`flat_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rents`
--
ALTER TABLE `rents`
  ADD PRIMARY KEY (`rent_id`);

--
-- Indexes for table `villa`
--
ALTER TABLE `villa`
  ADD PRIMARY KEY (`villa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `flats`
--
ALTER TABLE `flats`
  MODIFY `flat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rents`
--
ALTER TABLE `rents`
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `villa`
--
ALTER TABLE `villa`
  MODIFY `villa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
