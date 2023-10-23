-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Okt 18. 15:35
-- Kiszolgáló verziója: 10.4.18-MariaDB
-- PHP verzió: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `versenydb`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `f_id` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(99) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`f_id`, `name`, `email`, `password`, `phone`, `age`, `gender`) VALUES
(1, 'Horváth Milán', 'h.milan0713@gmail.com', 'milanpassword', '+36205035102', 22, 'f'),
(2, 'Versenyzo 1', 'versenyzo1@gmail.com', 'versenyzo1', '+36201234567', 24, 'f'),
(3, 'Versenyzo 2', 'versenyzo2@example.com', 'versenyzo2', '+36202222222', 22, 'f'),
(4, 'Versenyzo 3', 'versenyzo3@example.com', 'versenyzo3', '+36203333333', 23, 'f');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `fordulok`
--

CREATE TABLE `fordulok` (
  `fordulo_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `v_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `fordulok`
--

INSERT INTO `fordulok` (`fordulo_id`, `name`, `date`, `v_id`) VALUES
(6, '100 m sprint - férfi', '2023-10-18', 9),
(7, '200m sprint - férfi', '2023-10-19', 9),
(8, '110 m gát - férfi', '2023-10-19', 9),
(9, '4 × 400 m váltó', '2023-10-20', 9),
(10, 'Egyesült Államok Nagydíja, Austin', '2023-10-22', 10),
(11, 'Mexikói Nagydíj, Mexikóváros', '2023-10-29', 10),
(12, 'Brazil Nagydíj, Sao Paulo', '2023-11-05', 10),
(13, 'Las Vegas-i Nagydíj, Las Vegas', '2023-11-18', 10),
(14, 'Abu-Dzabi Nagydíj, Abu-Dzabi', '2023-11-26', 10);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `versenyek`
--

CREATE TABLE `versenyek` (
  `v_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `country` varchar(99) NOT NULL,
  `sport` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `versenyek`
--

INSERT INTO `versenyek` (`v_id`, `name`, `year`, `description`, `country`, `sport`) VALUES
(9, 'Mintaverseny 001', 2023, 'Ez az első létrehozott verseny.', 'Magyarország', 'Atlétika'),
(10, 'Formula1', 2023, 'A Formula–1-es világbajnokság. Nyitott karosszériájú, együléses versenyautók vehetnek részt.', 'Globális', 'autóversenyzés');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `versenyzok`
--

CREATE TABLE `versenyzok` (
  `versenyzo_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `fordulo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `versenyzok`
--

INSERT INTO `versenyzok` (`versenyzo_id`, `f_id`, `fordulo_id`) VALUES
(18, 2, 6),
(21, 1, 7),
(22, 2, 7),
(23, 4, 10);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`f_id`),
  ADD UNIQUE KEY `name` (`name`,`email`);

--
-- A tábla indexei `fordulok`
--
ALTER TABLE `fordulok`
  ADD PRIMARY KEY (`fordulo_id`),
  ADD KEY `v_id` (`v_id`);

--
-- A tábla indexei `versenyek`
--
ALTER TABLE `versenyek`
  ADD PRIMARY KEY (`v_id`),
  ADD UNIQUE KEY `name` (`name`,`year`);

--
-- A tábla indexei `versenyzok`
--
ALTER TABLE `versenyzok`
  ADD PRIMARY KEY (`versenyzo_id`),
  ADD KEY `f_id` (`f_id`),
  ADD KEY `fordulo_id` (`fordulo_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `fordulok`
--
ALTER TABLE `fordulok`
  MODIFY `fordulo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT a táblához `versenyek`
--
ALTER TABLE `versenyek`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `versenyzok`
--
ALTER TABLE `versenyzok`
  MODIFY `versenyzo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `fordulok`
--
ALTER TABLE `fordulok`
  ADD CONSTRAINT `fordulok_ibfk_1` FOREIGN KEY (`v_id`) REFERENCES `versenyek` (`v_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `versenyzok`
--
ALTER TABLE `versenyzok`
  ADD CONSTRAINT `versenyzok_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `felhasznalok` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `versenyzok_ibfk_2` FOREIGN KEY (`fordulo_id`) REFERENCES `fordulok` (`fordulo_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
