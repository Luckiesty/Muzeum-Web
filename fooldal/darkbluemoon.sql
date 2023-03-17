-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 12:51 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `darkbluemoon`
--

-- --------------------------------------------------------

--
-- Table structure for table `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `neve` varchar(255) NOT NULL,
  `jelszava` varchar(255) NOT NULL,
  `profilkep` varchar(255) NOT NULL DEFAULT 'kepek/alapkep.jpg',
  `statusz` varchar(255) NOT NULL DEFAULT 'felhasznalo',
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `neve`, `jelszava`, `profilkep`, `statusz`, `email`) VALUES
(35, 'asd', '7815696ecbf1c96e6894b779456d330e', 'kepek/alapkep.jpg', 'admin', 'toth5845@gmail.com'),
(40, 'asd2', '7815696ecbf1c96e6894b779456d330e', 'kepek/alapkep.jpg', 'admin', 'toth5845@gmail.com'),
(41, 'asd3', '7815696ecbf1c96e6894b779456d330e', 'kepek/alapkep.jpg', 'felhasznalo', 'toth5845@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `jegytipus`
--

CREATE TABLE `jegytipus` (
  `jegy_id` int(11) NOT NULL,
  `nev` varchar(255) NOT NULL,
  `tipus` varchar(255) NOT NULL,
  `ar` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jegytipus`
--

INSERT INTO `jegytipus` (`jegy_id`, `nev`, `tipus`, `ar`) VALUES
(52, '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jegytipus`
--
ALTER TABLE `jegytipus`
  ADD PRIMARY KEY (`jegy_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `jegytipus`
--
ALTER TABLE `jegytipus`
  MODIFY `jegy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
