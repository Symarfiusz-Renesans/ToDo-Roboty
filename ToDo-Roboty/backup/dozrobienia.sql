-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Mar 2023, 22:11
-- Wersja serwera: 10.4.19-MariaDB
-- Wersja PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `dozrobienia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `etapyzadan`
--

CREATE TABLE `etapyzadan` (
  `idEtapu` int(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `etapyzadan`
--

INSERT INTO `etapyzadan` (`idEtapu`, `nazwa`) VALUES
(1, 'Do zrobienia'),
(2, 'W trakcie'),
(3, 'Do sprawdzenia'),
(4, 'Gotowe');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `listazadan`
--

CREATE TABLE `listazadan` (
  `idZadania` int(11) NOT NULL,
  `tytul` varchar(50) NOT NULL,
  `tresc` text NOT NULL,
  `dataPowst` date NOT NULL,
  `dataZakon` date NOT NULL,
  `poziomWazno` int(11) NOT NULL,
  `etapZadania` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `listazadan`
--

INSERT INTO `listazadan` (`idZadania`, `tytul`, `tresc`, `dataPowst`, `dataZakon`, `poziomWazno`, `etapZadania`) VALUES
(4, 'Dokończ projekt', 'Dodaj AJAX i funkcję edytowania', '2023-03-13', '0000-00-00', 4, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `waznosczadan`
--

CREATE TABLE `waznosczadan` (
  `idPoziomu` int(11) NOT NULL,
  `poziomWaznosci` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `waznosczadan`
--

INSERT INTO `waznosczadan` (`idPoziomu`, `poziomWaznosci`) VALUES
(1, 'Raczkowanie'),
(2, 'Spacer'),
(3, 'Trucht'),
(4, 'Sprint'),
(5, 'Dodatek');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `etapyzadan`
--
ALTER TABLE `etapyzadan`
  ADD PRIMARY KEY (`idEtapu`);

--
-- Indeksy dla tabeli `listazadan`
--
ALTER TABLE `listazadan`
  ADD PRIMARY KEY (`idZadania`),
  ADD KEY `etapZadania` (`etapZadania`);

--
-- Indeksy dla tabeli `waznosczadan`
--
ALTER TABLE `waznosczadan`
  ADD PRIMARY KEY (`idPoziomu`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `etapyzadan`
--
ALTER TABLE `etapyzadan`
  MODIFY `idEtapu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `listazadan`
--
ALTER TABLE `listazadan`
  MODIFY `idZadania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `waznosczadan`
--
ALTER TABLE `waznosczadan`
  MODIFY `idPoziomu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `listazadan`
--
ALTER TABLE `listazadan`
  ADD CONSTRAINT `listazadan_ibfk_1` FOREIGN KEY (`etapZadania`) REFERENCES `etapyzadan` (`idEtapu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
