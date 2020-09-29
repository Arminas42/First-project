-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2020 m. Rgs 29 d. 12:14
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nuoma`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `priekabos`
--

CREATE TABLE `priekabos` (
  `id` int(11) NOT NULL,
  `priekabosData` date NOT NULL,
  `pavadinimas` varchar(255) NOT NULL,
  `ilgis` int(16) NOT NULL,
  `plotis` int(16) NOT NULL,
  `aukstis` int(16) NOT NULL,
  `numeris` varchar(255) NOT NULL,
  `lokacija` varchar(255) NOT NULL,
  `busena` bit(4) DEFAULT b'1',
  `svoris` double NOT NULL,
  `tnumeris` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sukurta duomenų kopija lentelei `priekabos`
--

INSERT INTO `priekabos` (`id`, `priekabosData`, `pavadinimas`, `ilgis`, `plotis`, `aukstis`, `numeris`, `lokacija`, `busena`, `svoris`, `tnumeris`) VALUES
(2, '2020-05-23', 'sdfg', 3, 3, 4, 'sdfgdsfg', 'Kedainiai', b'0001', 3.2, 1222),
(3, '2021-01-01', 'zx', 20, 20, 20, 'hgg', 'Panevezys', b'0001', 10, 1354),
(4, '2020-09-10', 'dfg', 20, 20, 20, '2222', 'Panevezys', b'0001', 200.2, 12222);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `priekabos`
--
ALTER TABLE `priekabos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `priekabos`
--
ALTER TABLE `priekabos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
