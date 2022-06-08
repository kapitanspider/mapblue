-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 08 Cze 2022, 09:40
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

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID`, `ADMIN`, `LOGIN`, `PASSWORD`, `IMIE`, `NAZWISKO`, `EMAIL`, `NR_OKREGU`, `FUNKCJA`, `SPECJALIZACJA`, `TELEFON`, `IS_ACTIVE`, `Profilowe`) VALUES
(2, 2, 'Seba', '932f3c1b56257ce8539ac269d7aab42550dacf8818d075f0bdf1990562aae3ef', 'Sebastian', 'Nowak', 'seba@seba.pl', 2, 'Poseł', 'Brak', '+48 123123123', 1, 'profiles/Seba.jpg'),
(14, 0, 'User_testowy', '932f3c1b56257ce8539ac269d7aab42550dacf8818d075f0bdf1990562aae3ef', 'User', 'Testowy', 'usertestowy@op.pl', 40, 'Poseł', 'polityka społeczna, międzynarodowa, edukacja', '+48 500000000', 0, 'profiles/User_testowy.png'),
(18, 1, 'Marek', 'cbfad02f9ed2a8d1e08d8f74f5303e9eb93637d47f82ab6f1c15871cf8dd0481', 'Marek', 'Zabrzycki', 'marekkowalski@02.pl', 36, 'Poseł', 'Medycyna', '+48 501050150', 1, 'profiles/Marek.jpg'),
(21, 0, 'jrutnicki', '054e3b308708370ea029dc2ebd1646c498d59d7203c9e1a44cf0484df98e581a', 'Jakub', 'Rutnicki', 'j.rutnicki@gmail.com', 38, 'Poseł', 'Sport', '+48 512303512', 1, 'profiles/jrutnicki.jpeg'),
(22, 0, 'mjaros', '054e3b308708370ea029dc2ebd1646c498d59d7203c9e1a44cf0484df98e581a', 'Michał', 'Jaros', 'mjaros@op.pl', 3, 'Poseł', 'sport,zdrowie', '+48 500000000', 1, 'profiles/mjaros.jpeg'),
(23, 1, 'emilia', '5a933b00915e75dc937f74eb522a6027a521d38a5b75deaba20f92b64383df4e', 'Emila', 'Was', 'emilaw@op.pl', 0, 'Moderacja', 'Moderacja', '+48 725200714', 1, 'profiles/emilaw.png'),
(24, 0, 'mkrawczyk', '5a933b00915e75dc937f74eb522a6027a521d38a5b75deaba20f92b64383df4e', 'Michał', 'Krawczyk', 'krawczykm@op.pl', 6, 'Nowe technologie', 'sport, technologia', '+48 500000000', 1, 'profiles/krawczykm.jpeg'),
(25, 0, 'mokladrewnowicz', '5a933b00915e75dc937f74eb522a6027a521d38a5b75deaba20f92b64383df4e', 'Marzena', 'Okła-Drewnowicz', 'mod@op.pl', 33, 'posłanka', 'zdrowie, polityka społeczna', '+48 500000000', 1, 'profiles/okladrewnowiczm.jpeg'),
(26, 0, 'wkrol', '5a933b00915e75dc937f74eb522a6027a521d38a5b75deaba20f92b64383df4e', 'Wojciech', 'Krol', 'wkrol@op.pl', 31, 'poseł', 'media, polityka regionalna', '+48 500000000', 1, 'profiles/krolw.jpeg'),
(27, 0, 'mlosko', '5a933b00915e75dc937f74eb522a6027a521d38a5b75deaba20f92b64383df4e', 'Magdalena', 'Łośko', 'loskom@op.pl', 4, 'posłanka', 'edukacja, kultura', '+48 500000000', 1, 'profiles/loskom.jpeg'),
(28, 0, 'mrzasa', '5a933b00915e75dc937f74eb522a6027a521d38a5b75deaba20f92b64383df4e', 'Marek', 'Rząsa', 'mrzasa@op.pl', 22, 'poseł', 'sport, polityka zagraniczna', '+48 500000000', 1, 'profiles/mrzasa.jpeg'),
(29, 0, 'mwielichowska', '5a933b00915e75dc937f74eb522a6027a521d38a5b75deaba20f92b64383df4e', 'Monika', 'Wielichowska', 'mwieli@o2.pl', 2, 'posłanka', 'ekonomia, kultura, media', '+48 500000000', 1, 'profiles/mwielichowska.jpeg'),
(30, 0, 'jfrydrych', '5a933b00915e75dc937f74eb522a6027a521d38a5b75deaba20f92b64383df4e', 'Joanna', 'Frydrych', 'jfrydrych@op.pl', 22, 'posłanka', 'polityka społeczna, senioralna, edukacyjna', '+48 500000000', 1, 'profiles/jfrydrych.jpeg'),
(31, 0, 'agajewska', '5a933b00915e75dc937f74eb522a6027a521d38a5b75deaba20f92b64383df4e', 'Aleksandra', 'Gajewska', 'agajewska@op.pl', 19, 'posłanka', 'polityka społeczna, infrastruktura, środowisko', '+48 500000000', 1, 'profiles/kgajewska.jpeg'),
(32, 0, 'tpnowak', '5a933b00915e75dc937f74eb522a6027a521d38a5b75deaba20f92b64383df4e', 'Tomasz Piotr', 'Nowak', 'tpnowak@op.pl', 37, 'poseł', 'Unia Europejska, energetyka', '+48 500000000', 1, 'profiles/tpnowak.jpeg'),
(33, 0, 'mwcislo', '5a933b00915e75dc937f74eb522a6027a521d38a5b75deaba20f92b64383df4e', 'Marta', 'Wcislo', 'mwcislo@op.pl', 6, 'posłanka', 'edukacja, polityka społeczna, gospodarka', '+48 500000000', 1, 'profiles/mwcislo.jpeg'),
(34, 0, 'amiszalski', '5a933b00915e75dc937f74eb522a6027a521d38a5b75deaba20f92b64383df4e', 'Aleksander', 'Miszalski', 'amiszalski@op.pl', 13, 'poseł', 'turystyka, gospodarka, środowisko', '+48 601900088', 1, 'profiles/amiszalski.jpeg'),
(35, 0, 'bklich', '5a933b00915e75dc937f74eb522a6027a521d38a5b75deaba20f92b64383df4e', 'Bogdan', 'Klich', 'biuro@klich.pl', 13, 'senator', 'polityka zagraniczna, gospodarka, ustawodawstwo', '+48 667511225', 1, 'profiles/bklich.jpeg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
