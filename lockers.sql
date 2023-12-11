-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 12:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lockers`
--

-- --------------------------------------------------------

--
-- Table structure for table `build`
--

CREATE TABLE `build` (
  `Id` int(4) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `No` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `build`
--

INSERT INTO `build` (`Id`, `Name`, `No`) VALUES
(1, 'E10', 'E10'),
(2, 'E2', 'E20');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Ajay', 'ajay@gmail.com', 'qdeeas', 'dsgffhgjhmhjm'),
(2, 'bassam alazab', 'bssam09azab@gmail.com', 'asdd', 'dasda'),
(3, 'dsdf', 'dsfdfsd@gmail.com', 'dsf', 'dsf');

-- --------------------------------------------------------

--
-- Table structure for table `drawer`
--

CREATE TABLE `drawer` (
  `id` int(10) NOT NULL,
  `No` varchar(15) DEFAULT NULL,
  `name` varchar(15) DEFAULT NULL,
  `Build_Id` int(11) DEFAULT NULL,
  `Floor_id` int(4) DEFAULT NULL,
  `state` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drawer`
--

INSERT INTO `drawer` (`id`, `No`, `name`, `Build_Id`, `Floor_id`, `state`) VALUES
(1, 'ddd', NULL, 1, 1, 0),
(2, 'df', NULL, 1, 2, 0),
(3, 'dfy', NULL, 2, 1, 0),
(4, 'dfhy', NULL, 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE `floor` (
  `id` int(4) NOT NULL,
  `No` int(10) NOT NULL,
  `build_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`id`, `No`, `build_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2),
(4, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `locker`
--

CREATE TABLE `locker` (
  `id` int(4) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `floor` int(2) DEFAULT NULL,
  `drawer` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locker`
--

INSERT INTO `locker` (`id`, `name`, `floor`, `drawer`) VALUES
(1, 'b1', 2, 12),
(3, 'b2', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `Id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `build` int(4) DEFAULT NULL,
  `floor` int(4) DEFAULT NULL,
  `drawer` varchar(50) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `state` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`Id`, `name`, `user_id`, `build`, `floor`, `drawer`, `type`, `state`) VALUES
(1, 'ee', 15, 2, 4, '2', 'ترم', 1),
(2, 'zc', 12, 1, 12, 'edd', 'sem', 1),
(3, 'xcvxsf', 12, 3, 2, 'ews', 'df', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `otpcode` int(10) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `admin`, `otpcode`, `active`) VALUES
(1, 'Ajay Kumar', 'ajay@gmail.com', '12345', 0, NULL, 0),
(2, 'Amit', 'amit@gmail.com', '1234', 0, NULL, 0),
(3, 'Keerti Panwar', 'keerti@gmail.com', '$2y$10$g.xv9BS7DZbZ0KT/.fkGouuD8duIUWY2lDntZ7ZXDDUW6h09ZDiqe', 0, NULL, 0),
(4, 'Ankita', 'ankita@gmail.com', '$2y$10$ZuWPf98dGPFogVM8MoKGxOVZ4v1mXD.WrJQ7rwfvdYLWMpyEyRhtK', 0, NULL, 0),
(5, 'Keerti Panwar', 'keerti1234@gmail.com', '$2y$10$PL6oQH71xCh3F3BALBuVYu6SLn2AVQ41o.i5vi2LosRIWEh1H.0Zi', 0, NULL, 0),
(6, 'root', 'bssam009azab@gmail.com', '$2y$10$3ou3FjCxVBNKs9rjmnhs8uXE68FFU0m2lrLN7/l/CoJx/a8VR7NnO', 1, NULL, 0),
(7, 'bassam', 'bassam@gmail.com', '$2y$10$gSroe/elM0XNtGIogjUG8ulsu4ZO6.Sv3ZxDTx8B4UEb.T6otNpre', 0, NULL, 0),
(9, 'sd', 'belalghazy3@gmail.com', '$2y$10$Jt/t5mTRr4jnl5flAKDdp.gCozwtZldZlUvMABfUEGEP2Oh/PlhxK', 0, 4365, 0),
(10, 'sd', 'belaclghazy3@gmail.com', '$2y$10$/TkUlQQzEddbdiHVIOcRAu3uxw1I2vb8Fzi/bQBkENSnJFJXhpltO', 0, 0, 0),
(11, 'fdfdg', 'belalghwazy3@gmail.com', '$2y$10$hOoRVw0UTT5hp4lAxbplRuTT2fyc0oOQIIikqGIvzmne7/pyDG5ui', 0, 3268, 0),
(12, 'we', 'belalwghwazy3@gmail.com', '$2y$10$LYUNvIpKYTPyq5SvA.dZRenI3/GjrWpgphhDZKkXbm4blDDkh8zn2', 0, 6015, 0),
(13, 'sam', 'ldecaprrio@gmail.com', '$2y$10$oYtixtfJf/U3TwezKhdP9.AOnPAfDrZYeGh.4sI9FtPTBkGwB8ERq', 0, 2690, 0),
(15, 'sam', 'bssam09azab@gmail.com', '$2y$10$kIGfXUeq2WFCEHl64/i9CuCIUIRlEPhYr3UbTtiVV51GOrZgjCwfW', 0, 3912, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `build`
--
ALTER TABLE `build`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drawer`
--
ALTER TABLE `drawer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Drawer_floor_Pk` (`Floor_id`);

--
-- Indexes for table `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `build_floor_No` (`build_id`);

--
-- Indexes for table `locker`
--
ALTER TABLE `locker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `reserve_user_fk` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `build`
--
ALTER TABLE `build`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `drawer`
--
ALTER TABLE `drawer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `floor`
--
ALTER TABLE `floor`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drawer`
--
ALTER TABLE `drawer`
  ADD CONSTRAINT `Drawer_floor_Pk` FOREIGN KEY (`Floor_id`) REFERENCES `floor` (`id`);

--
-- Constraints for table `floor`
--
ALTER TABLE `floor`
  ADD CONSTRAINT `build_floor_No` FOREIGN KEY (`build_id`) REFERENCES `build` (`Id`);

--
-- Constraints for table `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `reserve_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
