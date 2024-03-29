-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 06:07 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `secret` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `ranks` varchar(255) NOT NULL,
  `token` text NOT NULL,
  `ip` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `secret`, `fullname`, `ranks`, `token`, `ip`, `time`) VALUES
(5, 'duogxaolin@gmail.com', 'SRJZRDHGGVYGBI2I', 'Admin', '1', 'efe476eca4b8a5623fc1d38556f53dc2', '::1', '1711684098');

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
  `ArtistImage` varchar(255) DEFAULT NULL,
  `ArtistNote` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`ArtistID`, `ArtistName`, `ArtistSlug`, `Country`, `BirthYear`, `ArtistImage`, `ArtistNote`) VALUES
(1, 'Sơn Tùng MTP', 'son-tung-m-tp', 'VietNam', 1994, '/assets/img/sontung.png', 'Nguyễn Thanh Tùng, thường được biết đến với nghệ danh Sơn Tùng M-TP, là một nam ca sĩ kiêm sáng tác nhạc, rapper và diễn viên người Việt Nam. Sinh ra ở thành phố Thái Bình, thời thơ ấu, Sơn Tùng thường đi hát ở Cung văn hoá thiếu nhi tỉnh Thái Bình và học chơi đàn organ.'),
(2, 'Taylor Swift', 'taylor-swift', 'America', 1989, '/assets/img/TaylorSwift.png', 'Taylor Alison Swift là một nữ ca sĩ kiêm nhạc sĩ sáng tác bài hát người Mỹ. Cô nhận được nhiều sự quan tâm rộng rãi đến từ truyền thông và công chúng cũng như được nhiều ấn phẩm vinh danh là một trong những gương mặt tiêu biểu trong các danh sách hàng đầu.'),
(3, 'Jack', 'j97', 'Vietnam', 1997, '/assets/img/j97.png', 'Trịnh Trần Phương Tuấn, thường được biết đến với nghệ danh Jack – J97 aka 5 củ, thằng bỏ con, là một nam ca sĩ kiêm sáng tác nhạc, rapper, diễn viên người Việt Nam. Jack - J97 bắt đầu được biết đến khi hoạt động trong nhóm nhạc G5R và phát hành bài hát \"Hồng nhan\". '),
(5, 'Dương xạo lìn', 'duong-xao-lin', 'VietNam', 2003, '/assets/images/duong-xao-lin_13988174.png', 'Hi there, I\'m a software developer with extensive experience in coding and software development. I\'m passionate about creating innovative solutions, and I\'m dedicated to my craft. With my creativity, technical skills, and attention to detail, I\'m confident I can help you find the best software solution for your needs.');

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
(1, 'Nguyễn Thái Dương', 'duogxaolin@gmail.com', '19008198', NULL, '382765f49fe60f3c151a200f211c3fa4');

-- --------------------------------------------------------

--
-- Table structure for table `playcount`
--

CREATE TABLE `playcount` (
  `PlayCountID` int(11) NOT NULL,
  `ListenerID` int(11) DEFAULT NULL,
  `SongID` int(11) DEFAULT NULL,
  `ArtistID` int(11) NOT NULL,
  `ListenDateTime` varchar(255) DEFAULT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playcount`
--

INSERT INTO `playcount` (`PlayCountID`, `ListenerID`, `SongID`, `ArtistID`, `ListenDateTime`, `token`) VALUES
(2, NULL, 1, 1, '1711387399', '6601b2481ed72'),
(8, NULL, 1, 1, '1711388195', '6601b2481ed72'),
(9, NULL, 1, 1, '1711387683', '6601b2481ed72'),
(10, NULL, 1, 1, '1711387704', '6601b2481ed72'),
(11, NULL, 1, 1, '1711388007', '6601b2481ed72'),
(12, NULL, 1, 1, '1711388018', '6601b2481ed72'),
(13, NULL, 1, 1, '1711388024', '6601b2481ed72'),
(17, NULL, 2, 1, '1711388397', '6601b2481ed72'),
(18, NULL, 3, 1, '1711390612', '6601b2481ed72'),
(19, NULL, 4, 3, '1711390842', '6601b2481ed72'),
(20, NULL, 3, 2, '1711390851', '6601b2481ed72'),
(21, NULL, 1, 1, '1711616843', '6601b2481ed72'),
(22, NULL, 1, 1, '1711648657', '6601b2481ed72'),
(23, 1, 1, 1, '1711649342', '382765f49fe60f3c151a200f211c3fa4'),
(24, NULL, 1, 1, '1711685887', '660640ff35b6c'),
(25, NULL, 1, 1, '1711686852', '660640ff35b6c');

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
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `create_date` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `email`, `create_date`, `ip`) VALUES
(4, 'duogxaolin@gmail.com', '1711610158', '::1');

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
(2, 'Chúng Ta Của Hiện Tại', 'chung-ta-cua-hien-tai', '/assets/img/ctqht.png', 1, NULL, '20/12/2020', '/assets/music/chung-ta-cua-hien-tai.mp3'),
(3, 'Blank Space', 'blank-space', '/assets/img/bank-space.png', 2, NULL, '10/11/2014', '/assets/music/BlankSpace-TaylorSwift-12613798.mp3'),
(4, 'Thiên Lý Ơi', 'thien-ly-oi', '/assets/img/tlo.png', 3, NULL, '22/2/2024', '/assets/music/ThienLyOi-JackJ97-13829746.mp3'),
(5, 'Hãy trao cho anh', 'hay-trao-cho-anh', '/assets/images/hay-trao-cho-anh_74148827.png', 1, NULL, '29/03/2024', '/assets/music/hay-trao-cho-anh.mp3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`) USING BTREE;

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
  ADD KEY `SongID` (`SongID`),
  ADD KEY `ArtistID` (`ArtistID`);

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
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `AlbumID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `ArtistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `PlayCountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `SongID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
