-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 11:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spotisix`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `AlbumID` int(11) NOT NULL,
  `AlbumName` varchar(255) NOT NULL,
  `AlbumSlug` varchar(255) NOT NULL,
  `ArtistID` int(11) DEFAULT NULL,
  `ReleaseYear` int(11) DEFAULT NULL,
  `AlbumImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `ArtistID` int(11) NOT NULL,
  `ArtistName` varchar(255) NOT NULL,
  `ArtistSlug` varchar(255) NOT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `BirthYear` int(11) DEFAULT NULL,
  `ArtistImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`ArtistID`, `ArtistName`, `ArtistSlug`, `Country`, `BirthYear`, `ArtistImage`) VALUES
(1, 'Sơn Tùng M-TP', 'son-tung-m-tp', 'VietNam', 1994, '/assets/img/sontung.png'),
(2, 'Taylor Swift', 'taylor-swift', 'America', 1989, '/assets/img/TaylorSwift.png'),
(3, 'Jack', 'j97', 'Vietnam', 1997, '/assets/img/j97.png');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `GenreID` int(11) NOT NULL,
  `GenreName` varchar(255) NOT NULL,
  `GenreLogo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listeners`
--

CREATE TABLE `listeners` (
  `ListenerID` int(11) NOT NULL,
  `ListenerName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `listeners`
--

INSERT INTO `listeners` (`ListenerID`, `ListenerName`, `Email`, `Password`, `Address`, `token`) VALUES
(1, 'Nguyễn Thái Dương', 'duogxaolin@gmail.com', '19008198', NULL, 'a14e2f41d10b6248a97b742cf1423e77');

-- --------------------------------------------------------

--
-- Table structure for table `playcount`
--

CREATE TABLE `playcount` (
  `PlayCountID` int(11) NOT NULL,
  `ListenerID` int(11) DEFAULT NULL,
  `SongID` int(11) DEFAULT NULL,
  `ListenDateTime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlistdetails`
--

CREATE TABLE `playlistdetails` (
  `DetailID` int(11) NOT NULL,
  `PlaylistID` int(11) DEFAULT NULL,
  `SongID` int(11) DEFAULT NULL,
  `SongOrder` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `PlaylistID` int(11) NOT NULL,
  `PlaylistName` varchar(255) NOT NULL,
  `CreatorID` int(11) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `RatingID` int(11) NOT NULL,
  `ListenerID` int(11) DEFAULT NULL,
  `SongID` int(11) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Comment` text DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `songgenres`
--

CREATE TABLE `songgenres` (
  `SongID` int(11) NOT NULL,
  `GenreID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `SongID` int(11) NOT NULL,
  `SongName` varchar(255) NOT NULL,
  `SongSlug` varchar(255) NOT NULL,
  `SongLogo` varchar(255) NOT NULL,
  `ArtistID` int(11) DEFAULT NULL,
  `AlbumID` int(11) DEFAULT NULL,
  `Duration` varchar(255) DEFAULT NULL,
  `FilePath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`SongID`, `SongName`, `SongSlug`, `SongLogo`, `ArtistID`, `AlbumID`, `Duration`, `FilePath`) VALUES
(1, 'Chúng Ta Của Tương Lai', 'chung-ta-cua-tuong-lai', '/assets/img/ctqtl.png', 1, NULL, '08/03/2024', '/assets/music/chung-ta-cua-tuong-lai.mp3'),
(2, 'Chúng Ta Của Hiện Tại', 'chung-ta-cua-hien-tai', '/assets/img/ctqht.png', 1, NULL, '20/12/2020', '/assets/music/chung-ta-cua-hien-tai.mp3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`AlbumID`),
  ADD KEY `ArtistID` (`ArtistID`),
  ADD KEY `idx_album_name` (`AlbumName`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`ArtistID`),
  ADD KEY `idx_artist_name` (`ArtistName`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`GenreID`),
  ADD KEY `idx_genre_name` (`GenreName`);

--
-- Indexes for table `listeners`
--
ALTER TABLE `listeners`
  ADD PRIMARY KEY (`ListenerID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `idx_listener_name` (`ListenerName`);

--
-- Indexes for table `playcount`
--
ALTER TABLE `playcount`
  ADD PRIMARY KEY (`PlayCountID`),
  ADD KEY `ListenerID` (`ListenerID`),
  ADD KEY `SongID` (`SongID`);

--
-- Indexes for table `playlistdetails`
--
ALTER TABLE `playlistdetails`
  ADD PRIMARY KEY (`DetailID`),
  ADD UNIQUE KEY `PlaylistID` (`PlaylistID`,`SongOrder`),
  ADD KEY `SongID` (`SongID`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`PlaylistID`),
  ADD KEY `CreatorID` (`CreatorID`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`RatingID`),
  ADD KEY `ListenerID` (`ListenerID`),
  ADD KEY `SongID` (`SongID`);

--
-- Indexes for table `songgenres`
--
ALTER TABLE `songgenres`
  ADD PRIMARY KEY (`SongID`,`GenreID`),
  ADD KEY `GenreID` (`GenreID`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`SongID`),
  ADD KEY `ArtistID` (`ArtistID`),
  ADD KEY `AlbumID` (`AlbumID`),
  ADD KEY `idx_song_name` (`SongName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `AlbumID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `ArtistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `GenreID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listeners`
--
ALTER TABLE `listeners`
  MODIFY `ListenerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `playcount`
--
ALTER TABLE `playcount`
  MODIFY `PlayCountID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playlistdetails`
--
ALTER TABLE `playlistdetails`
  MODIFY `DetailID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `PlaylistID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `SongID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`ArtistID`) REFERENCES `artists` (`ArtistID`);

--
-- Constraints for table `playcount`
--
ALTER TABLE `playcount`
  ADD CONSTRAINT `playcount_ibfk_1` FOREIGN KEY (`ListenerID`) REFERENCES `listeners` (`ListenerID`),
  ADD CONSTRAINT `playcount_ibfk_2` FOREIGN KEY (`SongID`) REFERENCES `songs` (`SongID`);

--
-- Constraints for table `playlistdetails`
--
ALTER TABLE `playlistdetails`
  ADD CONSTRAINT `playlistdetails_ibfk_1` FOREIGN KEY (`PlaylistID`) REFERENCES `playlists` (`PlaylistID`),
  ADD CONSTRAINT `playlistdetails_ibfk_2` FOREIGN KEY (`SongID`) REFERENCES `songs` (`SongID`);

--
-- Constraints for table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_1` FOREIGN KEY (`CreatorID`) REFERENCES `listeners` (`ListenerID`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`ListenerID`) REFERENCES `listeners` (`ListenerID`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`SongID`) REFERENCES `songs` (`SongID`);

--
-- Constraints for table `songgenres`
--
ALTER TABLE `songgenres`
  ADD CONSTRAINT `songgenres_ibfk_1` FOREIGN KEY (`SongID`) REFERENCES `songs` (`SongID`),
  ADD CONSTRAINT `songgenres_ibfk_2` FOREIGN KEY (`GenreID`) REFERENCES `genres` (`GenreID`);

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`ArtistID`) REFERENCES `artists` (`ArtistID`),
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`AlbumID`) REFERENCES `albums` (`AlbumID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
