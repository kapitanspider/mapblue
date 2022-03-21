-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Mar 2022, 14:05
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `mapblue`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `aktywnosci`
--

CREATE TABLE `aktywnosci` (
  `ID` int(11) NOT NULL,
  `ID_Organizatora` int(11) NOT NULL,
  `wojewodztwo` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `powiat` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `gmina` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `nazwa` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `data` date NOT NULL,
  `uczestnicy` int(11) NOT NULL,
  `potwierdzenie` varchar(1000) COLLATE utf8_polish_ci NOT NULL,
  `notatka` varchar(1000) COLLATE utf8_polish_ci NOT NULL,
  `data_dodania` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `aktywnosci`
--

INSERT INTO `aktywnosci` (`ID`, `ID_Organizatora`, `wojewodztwo`, `powiat`, `gmina`, `nazwa`, `data`, `uczestnicy`, `potwierdzenie`, `notatka`, `data_dodania`) VALUES
(11, 1, 'wielkopolskie', 'pow1', 'gm1', 'Test', '2022-03-11', 2, 'fb.link.xd', 'Notateczka', '2022-03-21 13:58:40'),
(12, 1, 'wielkopolskie', 'pow1', 'gm1', 'Test', '2022-03-02', 4, 'brak', '', '2022-03-21 13:59:16'),
(13, 1, 'wielkopolskie', 'pow1', 'gm1', 'Test', '2022-03-04', 2, 'fb.link.xd', '', '2022-03-21 14:00:02'),
(14, 1, 'wielkopolskie', 'pow1', 'gm2', 'Test', '2022-03-03', 5, 'xddd', '', '2022-03-21 14:03:08'),
(15, 1, 'wielkopolskie', 'pow1', 'gm1', 'Test', '2022-03-03', 3, 'xddd', '', '2022-03-21 14:03:45'),
(16, 1, 'wielkopolskie', 'pow1', 'gm2', 'Test', '2022-03-02', 4, 'fb.link.xd', '', '2022-03-21 14:04:22');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `LOGIN` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `PASSWORD` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `NAME` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `SURNAME` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID`, `LOGIN`, `PASSWORD`, `NAME`, `SURNAME`) VALUES
(1, 'Jan', '123123123', 'Jan', 'Kowalski');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `aktywnosci`
--
ALTER TABLE `aktywnosci`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `aktywnosci`
--
ALTER TABLE `aktywnosci`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
