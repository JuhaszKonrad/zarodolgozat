-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Jan 30. 16:46
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `étel-rendelés`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `teljesnév` varchar(100) NOT NULL,
  `felhasználónév` varchar(100) NOT NULL,
  `jelszó` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `admin`
--

INSERT INTO `admin` (`id`, `teljesnév`, `felhasználónév`, `jelszó`) VALUES
(33, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(34, 'asd', 'asd', '7815696ecbf1c96e6894b779456d330e');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategória`
--

CREATE TABLE `kategória` (
  `id` int(10) UNSIGNED NOT NULL,
  `cím` varchar(100) NOT NULL,
  `kép_név` varchar(255) NOT NULL,
  `kiemelt` varchar(10) NOT NULL,
  `aktív` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kategória`
--

INSERT INTO `kategória` (`id`, `cím`, `kép_név`, `kiemelt`, `aktív`) VALUES
(30, 'asd', 'Kategória_847.jpg', 'Nem', 'Nem'),
(31, 'asd', 'Kategória_299.jpg', 'Nem', 'Nem'),
(32, 'asd', '', 'Nem', 'Nem');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendelés`
--

CREATE TABLE `rendelés` (
  `id` int(10) UNSIGNED NOT NULL,
  `étel` varchar(150) NOT NULL,
  `ár` int(100) NOT NULL,
  `db` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `rend_dátum` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `rend_név` varchar(150) NOT NULL,
  `rend_elérhetőség` varchar(20) NOT NULL,
  `rend_email` varchar(150) NOT NULL,
  `rend_cím` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `étel`
--

CREATE TABLE `étel` (
  `id` int(11) UNSIGNED NOT NULL,
  `cím` varchar(150) NOT NULL,
  `leírás` varchar(255) NOT NULL,
  `ár` int(100) NOT NULL,
  `kép_név` varchar(255) NOT NULL,
  `kategória_id` int(10) UNSIGNED NOT NULL,
  `kiemelt` varchar(10) NOT NULL,
  `aktív` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kategória`
--
ALTER TABLE `kategória`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `rendelés`
--
ALTER TABLE `rendelés`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `étel`
--
ALTER TABLE `étel`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT a táblához `kategória`
--
ALTER TABLE `kategória`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT a táblához `rendelés`
--
ALTER TABLE `rendelés`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `étel`
--
ALTER TABLE `étel`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
