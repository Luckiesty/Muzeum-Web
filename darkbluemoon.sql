-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Ápr 12. 11:18
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `darkbluemoon`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `events`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `neve` varchar(255) NOT NULL,
  `jelszava` varchar(255) NOT NULL,
  `profilkep` varchar(255) NOT NULL DEFAULT 'kepek/alapkep.jpg',
  `statusz` varchar(255) NOT NULL DEFAULT 'felhasznalo',
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `neve`, `jelszava`, `profilkep`, `statusz`, `email`) VALUES
(40, 'asd3', '7815696ecbf1c96e6894b779456d330e', 'kepek/alapkep.jpg', 'admin', 'toh23@gmail.com'),
(52, 'asd', '7815696ecbf1c96e6894b779456d330e', 'kepek/alapkep.jpg', 'felhasznalo', 'toth5845@gmail.com'),
(55, '', 'd41d8cd98f00b204e9800998ecf8427e', 'kepek/alapkep.jpg', 'felhasznalo', ''),
(57, 'asd4', '7815696ecbf1c96e6894b779456d330e', 'kepek/alapkep.jpg', 'felhasznalo', 'toth5845@gmail.com'),
(58, 'asd5', '7815696ecbf1c96e6894b779456d330e', 'kepek/alapkep.jpg', 'felhasznalo', 'toth5845@gmail.com'),
(59, 'asd6', '7815696ecbf1c96e6894b779456d330e', 'kepek/alapkep.jpg', 'felhasznalo', 'toth5845@gmail.com'),
(60, 'asd7', '7815696ecbf1c96e6894b779456d330e', 'kepek/alapkep.jpg', 'felhasznalo', 'toth5845@gmail.com'),
(61, 'asd8', '7815696ecbf1c96e6894b779456d330e', 'kepek/alapkep.jpg', 'felhasznalo', 'toth5845@gmail.com'),
(62, 'admin', 'b7d8607bed91d27de174c25a64cce4a4', 'profilkepek/patrick.jpg', 'felhasznalo', 'rusaimarky@gmail.com'),
(63, 'asd23', '7815696ecbf1c96e6894b779456d330e', 'profilkepek/patrick.jpg', 'felhasznalo', 'toth5845@mail.com');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `foglalas`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jegytipus`
--

CREATE TABLE `jegytipus` (
  `jegy_id` int(11) NOT NULL,
  `nev` varchar(255) NOT NULL,
  `tipus` varchar(255) NOT NULL,
  `ar` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `jegytipus`
--

INSERT INTO `jegytipus` (`jegy_id`, `nev`, `tipus`, `ar`) VALUES
(90, '432', '342', 243),
(91, 'wer', 'ewrq', 0),
(92, 'felnőtjegy', 'felnötjegy', 3000);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'A5_notesz', '761cgh1', 'termek-kepek/A5_notesz.jpg', 3500.00),
(2, 'varrott_fuzet', 'HE176f', 'termek-kepek/varrott_fuzet.jpg', 1000.00),
(3, 'we_go_to_the_galery', 'AGsz668', 'termek-kepek/we_go_to_the_galery.jpg', 2750.00);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `foglalas`
--
ALTER TABLE `foglalas`
  ADD PRIMARY KEY (`foglalas_id`);

--
-- A tábla indexei `jegytipus`
--
ALTER TABLE `jegytipus`
  ADD PRIMARY KEY (`jegy_id`);

--
-- A tábla indexei `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `events`
--
ALTER TABLE `events`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT a táblához `foglalas`
--
ALTER TABLE `foglalas`
  MODIFY `foglalas_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `jegytipus`
--
ALTER TABLE `jegytipus`
  MODIFY `jegy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT a táblához `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
