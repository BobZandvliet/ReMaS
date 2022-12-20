-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 20, 2022 at 11:45 PM
-- Server version: 10.6.11-MariaDB-0ubuntu0.22.10.1
-- PHP Version: 8.1.7-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Remas`
--

-- --------------------------------------------------------

--
-- Table structure for table `apparaten`
--

CREATE TABLE `apparaten` (
  `ID` int(11) NOT NULL,
  `naam` varchar(40) NOT NULL,
  `omschijving` varchar(200) NOT NULL,
  `vergoeding` float NOT NULL,
  `gewichtgram` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apparaten`
--

INSERT INTO `apparaten` (`ID`, `naam`, `omschijving`, `vergoeding`, `gewichtgram`) VALUES
(1, 'Wasmachine', 'metaal, glass, koper', 10, 25000),
(2, 'Desktop PC', 'metaal, koper', 5, 2000),
(3, 'Koffiezetapparaat', 'metaal , koper, plastic', 2, 500),
(4, 'Laptop', 'metaal, plastic', 5, 300),
(5, 'Toetsenbord', 'plastic , metaal', 1, 100),
(6, 'Elektromotor', 'Elektromotor', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `innameapparaat`
--

CREATE TABLE `innameapparaat` (
  `ID` int(11) NOT NULL,
  `innameID` int(11) NOT NULL,
  `apparaatID` int(11) NOT NULL,
  `ontleed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `innameapparaat`
--

INSERT INTO `innameapparaat` (`ID`, `innameID`, `apparaatID`, `ontleed`) VALUES
(1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `innames`
--

CREATE TABLE `innames` (
  `ID` int(11) NOT NULL,
  `medewerkerID` int(11) NOT NULL,
  `tijdstip` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `innames`
--

INSERT INTO `innames` (`ID`, `medewerkerID`, `tijdstip`) VALUES
(1, 23, '2022-12-20 18:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `medewerkers`
--

CREATE TABLE `medewerkers` (
  `ID` int(11) NOT NULL,
  `rolID` int(11) NOT NULL,
  `naam` varchar(40) NOT NULL,
  `wachtwoord` varchar(200) NOT NULL,
  `emailadres` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medewerkers`
--

INSERT INTO `medewerkers` (`ID`, `rolID`, `naam`, `wachtwoord`, `emailadres`) VALUES
(22, 1, 'test1', '$2y$10$PGAXdhPfJJU/s5hf4EXSwONTTZW3MBqHB1uUV/2rjVRBOIuTEDixC', 'test'),
(23, 2, 'test2', '$2y$10$zAlCCnhJpP/BNLw4cHFcB.IzX/2KDVILXV7bKuRYUNfSyii30SJ4S', 'test'),
(27, 3, 'test3', '$2y$10$OB7qn3k3QcmsAPI7X/SM5.HOI693UBnEuJEIMp06ZHx31tPxJ6Pu2', 'test'),
(28, 4, 'test4', '$2y$10$Snc8S0R6bw1r99sdLLSAlOznhuAlVSRqxpQIK.lceQlBeN4J57beC', 'test'),
(29, 5, 'test5', '$2y$10$pxu5s6CTWD2mpjBqQcIEd.SPdtUCxsn7QH5A3H4Ya2e.Ggn8BWRSq', 'test'),
(30, 6, 'test6', '$2y$10$xXBwOaTccPw4vs.rfs4rG.vMntK8j6y4aOqRbOw8xs4rH.uJKgG22', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `onderdeelapparaat`
--

CREATE TABLE `onderdeelapparaat` (
  `ID` int(11) NOT NULL,
  `onderdeelID` int(11) NOT NULL,
  `apparaatID` int(11) NOT NULL,
  `percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `onderdeelapparaat`
--

INSERT INTO `onderdeelapparaat` (`ID`, `onderdeelID`, `apparaatID`, `percentage`) VALUES
(1, 2, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `onderdelen`
--

CREATE TABLE `onderdelen` (
  `ID` int(11) NOT NULL,
  `naam` varchar(40) NOT NULL,
  `omschijving` varchar(200) NOT NULL,
  `voorraadkg` int(11) NOT NULL,
  `prijsperkg` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `onderdelen`
--

INSERT INTO `onderdelen` (`ID`, `naam`, `omschijving`, `voorraadkg`, `prijsperkg`) VALUES
(1, 'glas', 'glas', 1, 1),
(2, 'metaal', 'metaal en ijzer', 1, 1),
(3, 'koper', 'koper bedrading en los koper', 5, 10),
(4, 'plastic', 'plastic behuizingen', 1, 0.1),
(7, 'hout', 'hout', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rollen`
--

CREATE TABLE `rollen` (
  `ID` int(11) NOT NULL,
  `naam` varchar(20) NOT NULL,
  `omschijving` varchar(200) NOT NULL,
  `waarde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rollen`
--

INSERT INTO `rollen` (`ID`, `naam`, `omschijving`, `waarde`) VALUES
(1, 'AlgemeneMedewerker', 'Zijdelings betrokken bij het geautomatiseerde proces, mag (alleen) de diverse rapportages inzien', 1),
(2, 'MedewerkerInname', 'Is verantwoordelijk voor het innemen van de apparaten', 2),
(3, 'MedewerkerVerwerking', 'Demonteert de apparaten en verwerkt de onderdelen', 3),
(4, 'MedewerkerUitgifte', 'Verzorgt de afvoer van onderdelen', 4),
(5, 'Applicatiebeheerder', 'Kan apparaten en onderdelen benoemen en koppelen', 5),
(6, 'Administrator', 'Is verantwoordelijk voor het aanmaken van gebruikers en de correcte verdeling van rollen en rechten (Gebruikersbeheer).', 6);

-- --------------------------------------------------------

--
-- Table structure for table `uitgiftes`
--

CREATE TABLE `uitgiftes` (
  `ID` int(11) NOT NULL,
  `medewerkerID` int(11) NOT NULL,
  `onderdeelID` int(11) NOT NULL,
  `tijdstip` datetime NOT NULL,
  `gewichtkg` int(11) NOT NULL,
  `prijs` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apparaten`
--
ALTER TABLE `apparaten`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `innameapparaat`
--
ALTER TABLE `innameapparaat`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `innameID` (`innameID`),
  ADD KEY `apparaatID` (`apparaatID`);

--
-- Indexes for table `innames`
--
ALTER TABLE `innames`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `medewerkerID` (`medewerkerID`),
  ADD KEY `medewerkerID_2` (`medewerkerID`);

--
-- Indexes for table `medewerkers`
--
ALTER TABLE `medewerkers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `rolID` (`rolID`);

--
-- Indexes for table `onderdeelapparaat`
--
ALTER TABLE `onderdeelapparaat`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `onderdeelID` (`onderdeelID`),
  ADD KEY `apparaatID` (`apparaatID`);

--
-- Indexes for table `onderdelen`
--
ALTER TABLE `onderdelen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rollen`
--
ALTER TABLE `rollen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `uitgiftes`
--
ALTER TABLE `uitgiftes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `medewerkerID` (`medewerkerID`),
  ADD KEY `onderdeelID` (`onderdeelID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apparaten`
--
ALTER TABLE `apparaten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `innameapparaat`
--
ALTER TABLE `innameapparaat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `innames`
--
ALTER TABLE `innames`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medewerkers`
--
ALTER TABLE `medewerkers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `onderdeelapparaat`
--
ALTER TABLE `onderdeelapparaat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `onderdelen`
--
ALTER TABLE `onderdelen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rollen`
--
ALTER TABLE `rollen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uitgiftes`
--
ALTER TABLE `uitgiftes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `innameapparaat`
--
ALTER TABLE `innameapparaat`
  ADD CONSTRAINT `innameapparaat_ibfk_1` FOREIGN KEY (`apparaatID`) REFERENCES `apparaten` (`ID`),
  ADD CONSTRAINT `innameapparaat_ibfk_2` FOREIGN KEY (`innameID`) REFERENCES `innames` (`ID`);

--
-- Constraints for table `innames`
--
ALTER TABLE `innames`
  ADD CONSTRAINT `innames_ibfk_1` FOREIGN KEY (`medewerkerID`) REFERENCES `medewerkers` (`ID`);

--
-- Constraints for table `medewerkers`
--
ALTER TABLE `medewerkers`
  ADD CONSTRAINT `medewerkers_ibfk_1` FOREIGN KEY (`rolID`) REFERENCES `rollen` (`ID`);

--
-- Constraints for table `onderdeelapparaat`
--
ALTER TABLE `onderdeelapparaat`
  ADD CONSTRAINT `onderdeelapparaat_ibfk_1` FOREIGN KEY (`onderdeelID`) REFERENCES `onderdelen` (`ID`),
  ADD CONSTRAINT `onderdeelapparaat_ibfk_2` FOREIGN KEY (`apparaatID`) REFERENCES `apparaten` (`ID`);

--
-- Constraints for table `uitgiftes`
--
ALTER TABLE `uitgiftes`
  ADD CONSTRAINT `uitgiftes_ibfk_1` FOREIGN KEY (`onderdeelID`) REFERENCES `onderdelen` (`ID`),
  ADD CONSTRAINT `uitgiftes_ibfk_2` FOREIGN KEY (`medewerkerID`) REFERENCES `medewerkers` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
