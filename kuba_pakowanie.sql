-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Lis 2018, 03:43
-- Wersja serwera: 10.1.36-MariaDB
-- Wersja PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `Pakowanie`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kuba_pakowanie`
--

CREATE TABLE `kuba_pakowanie` (
  `ID` int(11) NOT NULL,
  `numer` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `przewoznik` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `asortyment` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `data_etykiety` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `data_skanowania` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kuba_pakowanie`
--
ALTER TABLE `kuba_pakowanie`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `numer` (`numer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kuba_pakowanie`
--
ALTER TABLE `kuba_pakowanie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
