-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 11:02 PM
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
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(30) NOT NULL,
  `event` text NOT NULL,
  `leiras` text NOT NULL,
  `mikor` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `ferohely` int(30) NOT NULL DEFAULT 0,
  `statusz` varchar(255) NOT NULL DEFAULT 'privat',
  `kep` varchar(255) NOT NULL DEFAULT 'kep/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event`, `leiras`, `mikor`, `type`, `ferohely`, `statusz`, `kep`) VALUES
(156, 'Az elmúlt év fotói ', 'Kerülj közel a csillagokhoz. Látogassa meg az Év Csillagászati ​​Fotósa című kiállítást a Nemzeti Tengerészeti Múzeumban, és tekintse meg a 13. évfolyamon a pályázat nyertes és előválogatott képeit. Tekintse meg a több mint 100 fényképet, amelyeken a művészek megörökítették a helyi égboltot és azon túl is, távoli csillagok és aurórák képeivel. A bemutatott fényképek a világ minden tájáról származnak.', '2024-01-19', 'családijegy', 35, 'publikus', 'kep/image.jpg'),
(157, 'Egy pillantás az égre', 'Tegyen egy interaktív utazást a Naprendszerben, és tekintse meg közelebbről a távoli bolygókat; A teleszkópok azt mutatják, hogy az általunk látott csillagok körülbelül fele nem csupán fényfoltok, hanem valójában csillagcsoportok, amelyeket a gravitáció tart össze. Működtessen távcsövet, kísérletezzen objektívekkel, hogy megértse, hogyan hoznak létre képeket a teleszkópok távoli tárgyakról.', '2024-02-12', 'Mindenkinek', 150, 'publikus', 'kep/resize.jpg'),
(158, 'Csillagászati ​​Kiállítás', 'űrkutatás, az univerzum, a csillagászat és a csillagászati eszközök témaköreit mutatjuk be. A kiállítások általában interaktív és látványos módon mutatják be azokat az elméleteket, felfedezéseket és technológiákat, amelyeket a csillagászok és űrkutatók használnak az univerzum felfedezéséhez.', '2024-10-26T13:55', 'felnőtjegy', 50, 'publikus', 'kep/acsillagászat.jpg'),
(159, 'Élet a földön kívül exhibit', '\r\nA Maryland Tudományos Központban megrendezett Life Beyond Earth kiállítás STEM-tartalma csillagászatot és földtudományt foglal magában, és kapcsolódik a NASA-hoz azáltal, hogy „az univerzum életének természetével és a Földön túl létező élettel” foglalkozik. izgalmas, bátorító és ápoló fiatal elméket” és a NASA Education Outcomes számára a STEM formális és informális oktatási szolgáltatói közötti partnerségek kiépítésével, az egész életen át tartó tanulás előmozdításával és a NASA küldetéseinek tudatosításával, valamint az informális környezetben történő tanulás ösztönzésével.', '2023-10-12', 'diákjegy', 100, 'privat', 'kep/MSC_Exhibit_Hall.jpg');

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
(40, 'admin', '7815696ecbf1c96e6894b779456d330e', 'kepek/alapkep.jpg', 'admin', 'toth5845@gmail.com'),
(77, 'Syeda Avdotya', '7815696ecbf1c96e6894b779456d330e', 'profilkepek/alapkep.jpg', 'felhasznalo', 'unkan101@niko313.com'),
(78, 'Ali Rini', '202cb962ac59075b964b07152d234b70', 'profilkepek/8cd65049bcdb0a71615dd57d4c75f362.jpg', 'felhasznalo', 'tonitonic@packiu.com'),
(79, 'Voldemaras Wardell', '202cb962ac59075b964b07152d234b70', 'profilkepek/47878.png', 'felhasznalo', 'carnage123@pusatinfokita.com'),
(80, 'Vilhjálmur Charlie', 'd95e4410070c4817c026259e6d1d86dc', 'profilkepek/alapkep.jpg', 'felhasznalo', 'eduarg190@gasss.net'),
(81, 'Amator Euthymius', '7815696ecbf1c96e6894b779456d330e', 'profilkepek/alapkep.jpg', 'felhasznalo', 'akrij@greendike.com'),
(82, 'Tarquinius Surya', 'ea7d201d1cdd240f3798b2dc51d6adcb', 'profilkepek/alapkep.jpg', 'felhasznalo', 'elenaseriogina@naverly.com'),
(83, 'Sanyi Pisti', '38d7355701b6f3760ee49852904319c1', 'profilkepek/alapkep.jpg', 'felhasznalo', 'brianscott1@kumpulanmedia.com'),
(84, 'Donát Sámuel', '146b65fd2004858b1c615bc8cf8b8a5b', 'profilkepek/patrick.jpg', 'felhasznalo', 'damnorman@niko313.com'),
(85, 'Kincső Lúcia', '912ec803b2ce49e4a541068d495ab570', 'profilkepek/Kayle_2.jpg', 'felhasznalo', 'fenriz666@dexamail.com'),
(86, 'Zita Kamilla', 'cf5c5662f49f76f9bbd776d77935b422', 'profilkepek/images.jpg', 'felhasznalo', 'topazlk@friendsack.com');

-- --------------------------------------------------------

--
-- Table structure for table `foglalas`
--

CREATE TABLE `foglalas` (
  `foglalas_id` int(11) NOT NULL,
  `felhasznalo_id` int(255) NOT NULL,
  `esemeny_id` int(255) NOT NULL,
  `nev` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `elerhetoseg` varchar(255) NOT NULL,
  `mennyiseg` int(255) NOT NULL,
  `statusz` varchar(255) NOT NULL DEFAULT 'kerelem',
  `code` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foglalas`
--

INSERT INTO `foglalas` (`foglalas_id`, `felhasznalo_id`, `esemeny_id`, `nev`, `email`, `elerhetoseg`, `mennyiseg`, `statusz`, `code`) VALUES
(40, 0, 156, 'Rusai Márk ', 'rusai@gmail.com', 'Madách Imre út 5. fszt. Budapest magyar 1075 ', 35, 'elfogadva', 237514),
(41, 0, 157, 'tóth oliver', 'toth5845@gmail.com', 'rév köz 6 szigetszentmiklós magyar 2310', 10, 'kerelem', 0),
(161, 0, 158, '', '', '', 0, 'kerelem', 0),
(166, 0, 157, 'Kiss Péter', 'peter5845@gmail.com', 'Bokréta u Budapest magyar 1094', 14, 'kerelem', 0);

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
(100, 'felnőtjegy', 'felnőtjegy', 1500),
(101, 'családijegy', 'családijegy', 5000),
(102, 'gyerekjegy', 'gyerekjegy', 1000),
(103, 'diákjegy', 'diákjegy', 1100),
(104, 'Mindenkinek', 'Mindenkinek', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'A5_notesz', '761cgh1', 'termek-kepek/A5_notesz.jpg', 3500.00),
(2, 'varrott_fuzet', 'HE176f', 'termek-kepek/varrott_fuzet.jpg', 1000.00),
(3, 'we_go_to_the_galery', 'AGsz668', 'termek-kepek/we_go_to_the_galery.jpg', 2750.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foglalas`
--
ALTER TABLE `foglalas`
  ADD PRIMARY KEY (`foglalas_id`);

--
-- Indexes for table `jegytipus`
--
ALTER TABLE `jegytipus`
  ADD PRIMARY KEY (`jegy_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `foglalas`
--
ALTER TABLE `foglalas`
  MODIFY `foglalas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `jegytipus`
--
ALTER TABLE `jegytipus`
  MODIFY `jegy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
