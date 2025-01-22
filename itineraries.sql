-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2025 at 02:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tedhenat`
--

-- --------------------------------------------------------

--
-- Table structure for table `itineraries`
--

CREATE TABLE `itineraries` (
  `Id` int(11) NOT NULL,
  `Fotoja` longblob DEFAULT NULL,
  `Titulli` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `itineraries`
--

INSERT INTO `itineraries` (`Id`, `Fotoja`, `Titulli`, `Description`) VALUES
(1, NULL, '3 Days in Florence', 'City of the Renaissance!'),
(2, NULL, 'Weekend in New York', 'Visit the City that never sleeps!'),
(3, NULL, '6 Days in London', 'Relax in the largest metropolis in the United Kingdom!'),
(4, NULL, 'Day trip in Paris', 'Spend 24h in the city of light!'),
(5, NULL, 'A week in Barcelona', 'Spain’s Catalonia region!'),
(6, NULL, 'Day trip in Sydney', 'Spend a day in the Emerald City!'),
(7, NULL, 'A week in Berlin', 'The Grey City'),
(8, NULL, 'A week in Berlin', 'The Grey City'),
(9, NULL, '2 weeks in Tokyo', 'The Eastern Capital'),
(10, NULL, 'A weekend in Lisbon', 'The City of Seven Hills'),
(11, NULL, '4 days in Bangkok', 'The Big Mango');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `itineraries`
--
ALTER TABLE `itineraries`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `itineraries`
--
ALTER TABLE `itineraries`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
