-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Jul 2022 um 11:49
-- Server-Version: 10.4.24-MariaDB
-- PHP-Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `blog`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `comments`
--

INSERT INTO `comments` (`commentID`, `postID`, `userID`, `title`, `content`, `createdAt`) VALUES
(10, 18, 24, 'jushgauifgf', 'asfdiuhguüsojihg', '2022-07-28');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pictures`
--

CREATE TABLE `pictures` (
  `pictureID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `filename_original` varchar(255) NOT NULL,
  `filename_new` varchar(50) NOT NULL,
  `filesize` int(11) NOT NULL,
  `createdAt` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `pictures`
--

INSERT INTO `pictures` (`pictureID`, `userID`, `filename_original`, `filename_new`, `filesize`, `createdAt`) VALUES
(6, 20, '41-bVHzOVeL._SX355_.jpg', '33e673a5-fe9e-46c4-9785-b32b9c99acc0.jpg', 7595, 2147483647),
(7, 20, '51babrbwJ5L.jpg', 'aa51e44a-3033-4462-866d-e80d1b95a314.jpg', 45860, 2147483647),
(8, 21, '91pBFF64j-L._SL1400_.jpg', 'c57f72cf-c685-4346-8d12-7866aa3e3041.jpg', 587647, 2147483647),
(10, 21, '91pBFF64j-L._SL1400_.jpg', 'f0b49662-d39a-46eb-bca1-f1817aafa47d.jpg', 587647, 2147483647),
(11, 23, 'R-1909026-1414940915-6411.jpg', '8b26f3eb-2bc7-4ecd-906a-839f5e6ae400.jpg', 124073, 2147483647),
(12, 23, '51WFJHYKy4L._SX466_.jpg', '58767e50-cced-4227-b951-f3d5dfa108f8.jpg', 35452, 2147483647);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `posts`
--

CREATE TABLE `posts` (
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `posts`
--

INSERT INTO `posts` (`postID`, `userID`, `title`, `content`, `createdAt`) VALUES
(14, 20, 'Just a test!', 'Welcome to this Blog!', '2022-07-28'),
(15, 21, 'wh00p', 'Hallo', '2022-07-28'),
(16, 21, 'Lorem Ipsum', 'i like lorem ipsum', '2022-07-28'),
(17, 23, 'i like this blog', 'Hello Hello test test', '2022-07-28'),
(18, 24, 'Dies ist ein Titel!', 'sjdghfgds\r\ngs\r\ndhosgh\r\n\r\n\r\n\r\ngds\r\nplplj\r\nf\r\ndpfj\r\nh\r\njd', '2022-07-28');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `createdAt`) VALUES
(20, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '2022-07-28'),
(21, 'admin2', '81dc9bdb52d04dc20036dbd8313ed055', '2022-07-28'),
(22, 'admin3', '81dc9bdb52d04dc20036dbd8313ed055', '2022-07-28'),
(23, 'Thomas', '81dc9bdb52d04dc20036dbd8313ed055', '2022-07-28'),
(24, 'test', '81dc9bdb52d04dc20036dbd8313ed055', '2022-07-28');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `postID` (`postID`),
  ADD KEY `userID` (`userID`);

--
-- Indizes für die Tabelle `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`pictureID`),
  ADD KEY `userID` (`userID`);

--
-- Indizes für die Tabelle `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `userID` (`userID`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `pictures`
--
ALTER TABLE `pictures`
  MODIFY `pictureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
