-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 09 Lip 2022, 00:50
-- Wersja serwera: 5.7.33-36
-- Wersja PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `09390240_maptest`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `aktywnosci`
--

CREATE TABLE `aktywnosci` (
  `ID` int(11) NOT NULL,
  `ID_Organizatora` int(11) NOT NULL,
  `wojewodztwo` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `okreg` int(3) NOT NULL,
  `powiat` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `gmina` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `nazwa` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `rodzaj` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `data` date NOT NULL,
  `godzina` time NOT NULL,
  `uczestnicy` int(11) NOT NULL,
  `potwierdzenie` varchar(1000) COLLATE utf8mb4_bin NOT NULL,
  `notatka` varchar(1000) COLLATE utf8mb4_bin NOT NULL,
  `data_dodania` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ocena` tinyint(4) NOT NULL DEFAULT '0',
  `ID_Parent` int(10) NOT NULL DEFAULT '0',
  `uwagi` varchar(5000) COLLATE utf8mb4_bin NOT NULL DEFAULT '---'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bledne_logowania`
--

CREATE TABLE `bledne_logowania` (
  `id` int(11) NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gminy`
--

CREATE TABLE `gminy` (
  `id` int(11) NOT NULL,
  `wojewodztwo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `okreg` int(11) NOT NULL,
  `powiat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `gmina` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `powiadomienia`
--

CREATE TABLE `powiadomienia` (
  `id` int(11) NOT NULL,
  `id_wydarzenia` int(11) NOT NULL,
  `id_osoby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `powiaty`
--

CREATE TABLE `powiaty` (
  `id` int(11) NOT NULL,
  `wojewodztwo` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `powiat` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `okreg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `udostepnienia`
--

CREATE TABLE `udostepnienia` (
  `id_admina` int(11) NOT NULL,
  `id_usera` int(11) NOT NULL,
  `id_aktywnosci` int(11) NOT NULL,
  `data_udostepnienia` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `ADMIN` tinyint(1) NOT NULL,
  `LOGIN` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `PASSWORD` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `IMIE` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `NAZWISKO` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `EMAIL` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `NR_OKREGU` int(3) NOT NULL,
  `FUNKCJA` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `SPECJALIZACJA` varchar(65) COLLATE utf8_polish_ci NOT NULL,
  `TELEFON` varchar(13) COLLATE utf8_polish_ci NOT NULL,
  `IS_ACTIVE` tinyint(1) NOT NULL,
  `Profilowe` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wspoluczestnicy`
--

CREATE TABLE `wspoluczestnicy` (
  `id` int(11) NOT NULL,
  `id_aktywnosci` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wydarzenia_ogolnopolskie`
--

CREATE TABLE `wydarzenia_ogolnopolskie` (
  `ID` int(11) NOT NULL,
  `nazwa` varchar(1000) COLLATE utf8mb4_bin NOT NULL,
  `data` date NOT NULL,
  `godzina` time NOT NULL,
  `plik` varchar(1000) COLLATE utf8mb4_bin NOT NULL,
  `informacje` varchar(1000) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `aktywnosci`
--
ALTER TABLE `aktywnosci`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `bledne_logowania`
--
ALTER TABLE `bledne_logowania`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `gminy`
--
ALTER TABLE `gminy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `powiadomienia`
--
ALTER TABLE `powiadomienia`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `powiaty`
--
ALTER TABLE `powiaty`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `wspoluczestnicy`
--
ALTER TABLE `wspoluczestnicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wydarzenia_ogolnopolskie`
--
ALTER TABLE `wydarzenia_ogolnopolskie`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `aktywnosci`
--
ALTER TABLE `aktywnosci`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `bledne_logowania`
--
ALTER TABLE `bledne_logowania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `gminy`
--
ALTER TABLE `gminy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `powiadomienia`
--
ALTER TABLE `powiadomienia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `powiaty`
--
ALTER TABLE `powiaty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `wspoluczestnicy`
--
ALTER TABLE `wspoluczestnicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `wydarzenia_ogolnopolskie`
--
ALTER TABLE `wydarzenia_ogolnopolskie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
