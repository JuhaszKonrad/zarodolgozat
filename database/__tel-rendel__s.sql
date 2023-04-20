-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Ápr 03. 08:04
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.0.25

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
-- Tábla szerkezet ehhez a táblához `kapcsolat`
--

CREATE TABLE `kapcsolat` (
  `id` int(11) NOT NULL,
  `kapcs_név` varchar(100) NOT NULL,
  `kapcs_elérhetőség` varchar(255) NOT NULL,
  `kapcs_email` varchar(255) NOT NULL,
  `üzenet` varchar(2558) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kapcsolat`
--

INSERT INTO `kapcsolat` (`id`, `kapcs_név`, `kapcs_elérhetőség`, `kapcs_email`, `üzenet`) VALUES
(1, 'asd', '+36201234567', 'pelda@gmail.com', 'asdasfhaijasocka aosjf iasnf'),
(2, 'proba', '+36201234567', 'pelda@gmail.com', 'ez egy üzenet\r\n');

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
(1, 'Pizza', 'Kategória_230.jpg', 'Igen', 'Igen'),
(2, 'Burger', 'Kategória_678.jpg', 'Igen', 'Igen'),
(3, 'Tészta', 'Kategória_122.jpg', 'Igen', 'Igen');

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

--
-- A tábla adatainak kiíratása `rendelés`
--

INSERT INTO `rendelés` (`id`, `étel`, `ár`, `db`, `total`, `rend_dátum`, `status`, `rend_név`, `rend_elérhetőség`, `rend_email`, `rend_cím`) VALUES
(1, 'Sajtburger', 950, 13013, 12362350, '2023-03-13', 'szállítva', 'asdasdasdasd', '+36201234567', 'peldaasdasdasdaaasd@gmail.com', ''),
(2, 'Songoku Pizza', 1700, 860, 1462000, '2023-03-20', 'megrendelve', 'Audrey Banks', '+1 (646) 779-7325', 'sadi@mailinator.com', 'Qui qui itaque totam'),
(3, 'Songoku Pizza', 1700, 667, 1133900, '2023-03-21', 'megrendelve', 'Lavinia Nixon', '+1 (848) 277-4389', 'gejic@mailinator.com', 'Voluptatibus magnam '),
(4, 'Sajtburger', 950, 1, 950, '2023-03-27', 'megrendelve', 'k', '+36201234567', 'pelda@gmail.com', 'kaosmdasd'),
(5, 'Sajtburger', 950, 100, 95000, '2023-04-03', 'megrendelve', 'Teljes Név', '+36201234567', 'pelda@gmail.com', 'Sajat cim utca 2\r\n');

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
-- A tábla adatainak kiíratása `étel`
--

INSERT INTO `étel` (`id`, `cím`, `leírás`, `ár`, `kép_név`, `kategória_id`, `kiemelt`, `aktív`) VALUES
(1, 'Sajtburger', 'Mustár, Ketchup, Hagyma, Uborka, Sajt, Marhahús', 950, 'Food-695.jpg', 2, 'Igen', 'Igen'),
(2, 'Songoku Pizza', 'Paradicsomos alap, Sonka, Gomba, Kukorica, Sajt', 1700, 'Food-12.jpg', 1, 'Igen', 'Igen'),
(3, 'Bolognai spagetti', 'Darált hús, parmezán sajt', 1000, 'Food-902.jpg', 3, 'Igen', 'Igen');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kapcsolat`
--
ALTER TABLE `kapcsolat`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategória_id` (`kategória_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT a táblához `kapcsolat`
--
ALTER TABLE `kapcsolat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `kategória`
--
ALTER TABLE `kategória`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `rendelés`
--
ALTER TABLE `rendelés`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `étel`
--
ALTER TABLE `étel`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `étel`
--
ALTER TABLE `étel`
  ADD CONSTRAINT `étel_ibfk_1` FOREIGN KEY (`kategória_id`) REFERENCES `kategória` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
