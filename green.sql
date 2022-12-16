-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2022 at 02:05 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `green`
--

-- --------------------------------------------------------

--
-- Table structure for table `apparaten`
--

CREATE TABLE `apparaten` (
  `ID` int NOT NULL,
  `naam` varchar(40) NOT NULL,
  `omschijving` varchar(200) NOT NULL,
  `vergoeding` float NOT NULL,
  `gewichtgram` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `innameapparaat`
--

CREATE TABLE `innameapparaat` (
  `ID` int NOT NULL,
  `innnameid` int NOT NULL,
  `apparaatid` int NOT NULL,
  `ontleed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `innames`
--

CREATE TABLE `innames` (
  `ID` int NOT NULL,
  `medewerkerid` int NOT NULL,
  `tijdstip` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medewerkers`
--

CREATE TABLE `medewerkers` (
  `ID` int NOT NULL,
  `rolid` int NOT NULL,
  `naam` varchar(40) NOT NULL,
  `wachtwoord` varchar(40) NOT NULL,
  `emailadres` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `medewerkers`
--

INSERT INTO `medewerkers` (`ID`, `rolid`, `naam`, `wachtwoord`, `emailadres`) VALUES
(1, 1, 'h', 'h', 'h');

-- --------------------------------------------------------

--
-- Table structure for table `onderdeelapparaat`
--

CREATE TABLE `onderdeelapparaat` (
  `ID` int NOT NULL,
  `onderdeelid` int NOT NULL,
  `apparaatid` int NOT NULL,
  `percentage` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `onderdelen`
--

CREATE TABLE `onderdelen` (
  `ID` int NOT NULL,
  `naam` varchar(40) NOT NULL,
  `omschijving` int NOT NULL,
  `prijsperkg` float NOT NULL,
  `voorraadkg` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `ID` int NOT NULL,
  `naam` varchar(20) NOT NULL,
  `omschijving` varchar(200) NOT NULL,
  `waarde` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uitgiftes`
--

CREATE TABLE `uitgiftes` (
  `ID` int NOT NULL,
  `medewerkerid` int NOT NULL,
  `onderdeelid` int NOT NULL,
  `tijdstip` datetime NOT NULL,
  `gewichtkg` int NOT NULL,
  `prijs` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apparaten`
--
ALTER TABLE `apparaten`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `innames`
--
ALTER TABLE `innames`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `medewerkers`
--
ALTER TABLE `medewerkers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `onderdeelapparaat`
--
ALTER TABLE `onderdeelapparaat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `onderdelen`
--
ALTER TABLE `onderdelen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `uitgiftes`
--
ALTER TABLE `uitgiftes`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apparaten`
--
ALTER TABLE `apparaten`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `innames`
--
ALTER TABLE `innames`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medewerkers`
--
ALTER TABLE `medewerkers`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `onderdeelapparaat`
--
ALTER TABLE `onderdeelapparaat`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `onderdelen`
--
ALTER TABLE `onderdelen`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uitgiftes`
--
ALTER TABLE `uitgiftes`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
