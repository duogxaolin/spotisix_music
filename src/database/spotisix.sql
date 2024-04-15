-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 15, 2024 lúc 05:59 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `spotisix`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
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
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `email`, `secret`, `fullname`, `ranks`, `token`, `ip`, `time`) VALUES
(5, 'duogxaolin@gmail.com', 'SRJZRDHGGVYGBI2I', 'Admin', '1', '9e18efbd7b020743946ae01687ff77a1', '::1', '1711695317');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `albums`
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
-- Cấu trúc bảng cho bảng `artists`
--

CREATE TABLE `artists` (
  `ArtistID` int(11) NOT NULL,
  `ArtistName` varchar(255) NOT NULL,
  `ArtistSlug` varchar(255) NOT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `BirthYear` int(11) DEFAULT NULL,
  `ArtistImage` varchar(255) DEFAULT NULL,
  `ArtistNote` text NOT NULL,
  `ArtistType` varchar(255) DEFAULT 'Ca Sĩ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `artists`
--

INSERT INTO `artists` (`ArtistID`, `ArtistName`, `ArtistSlug`, `Country`, `BirthYear`, `ArtistImage`, `ArtistNote`, `ArtistType`) VALUES
(1, 'Sơn Tùng MTP', 'son-tung-m-tp', 'VietNam', 1994, '/assets/img/sontung.png', 'Nguyễn Thanh Tùng, thường được biết đến với nghệ danh Sơn Tùng M-TP, là một nam ca sĩ kiêm sáng tác nhạc, rapper và diễn viên người Việt Nam. Sinh ra ở thành phố Thái Bình, thời thơ ấu, Sơn Tùng thường đi hát ở Cung văn hoá thiếu nhi tỉnh Thái Bình và học chơi đàn organ.', NULL),
(2, 'Taylor Swift', 'taylor-swift', 'America', 1989, '/assets/img/TaylorSwift.png', 'Taylor Alison Swift là một nữ ca sĩ kiêm nhạc sĩ sáng tác bài hát người Mỹ. Cô nhận được nhiều sự quan tâm rộng rãi đến từ truyền thông và công chúng cũng như được nhiều ấn phẩm vinh danh là một trong những gương mặt tiêu biểu trong các danh sách hàng đầu.', NULL),
(3, 'Jack', 'j97', 'Vietnam', 1997, '/assets/img/j97.png', 'Trịnh Trần Phương Tuấn, thường được biết đến với nghệ danh Jack – J97 aka 5 củ, thằng bỏ con, là một nam ca sĩ kiêm sáng tác nhạc, rapper, diễn viên người Việt Nam. Jack - J97 bắt đầu được biết đến khi hoạt động trong nhóm nhạc G5R và phát hành bài hát \"Hồng nhan\". ', NULL),
(5, 'Dương xạo lìn', 'duong-xao-lin', 'VietNam', 2003, '/assets/images/duong-xao-lin_13988174.png', 'Hi there, I\'m a software developer with extensive experience in coding and software development. I\'m passionate about creating innovative solutions, and I\'m dedicated to my craft. With my creativity, technical skills, and attention to detail, I\'m confident I can help you find the best software solution for your needs.', NULL),
(8, 'Nguyễn Thái Dương', '', 'Việt Nam', 2003, '/assets/images/_25712771.png', '<p>Nguyễn Thái Dương<br></p>', 'Nhạc sĩ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `GenreID` int(11) NOT NULL,
  `GenreName` varchar(255) NOT NULL,
  `GenreLogo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `listeners`
--

CREATE TABLE `listeners` (
  `ListenerID` int(11) NOT NULL,
  `ArtistID` int(11) DEFAULT NULL,
  `ListenerName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `listeners`
--

INSERT INTO `listeners` (`ListenerID`, `ArtistID`, `ListenerName`, `Email`, `Password`, `Address`, `token`) VALUES
(1, 1, 'Nguyễn Thái Dương', 'duogxaolin@gmail.com', '12345678', NULL, 'c11c8354b4b2e048aee1a9c13019e476');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `playcount`
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
-- Đang đổ dữ liệu cho bảng `playcount`
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
(25, NULL, 1, 1, '1711686852', '660640ff35b6c'),
(26, NULL, 5, 1, '1711688916', '6602e69eb88e9'),
(27, NULL, 1, 1, '1711694590', '660662fe1febb'),
(28, NULL, 6, 5, '1711695548', '660666bc44d79'),
(29, NULL, 1, 1, '1712412408', '661156f842f26'),
(30, 1, 1, 1, '1712853939', '898500b8c6823ee8be14a559e9b80d5e'),
(31, 1, 2, 1, '1712913429', '79ef63e013e6684a8a095e76b69ecd52'),
(32, 1, 1, 1, '1712920089', 'c11c8354b4b2e048aee1a9c13019e476'),
(33, 1, 2, 1, '1712920106', 'c11c8354b4b2e048aee1a9c13019e476'),
(34, 1, 3, 2, '1712920125', 'c11c8354b4b2e048aee1a9c13019e476'),
(35, 1, 4, 3, '1712920136', 'c11c8354b4b2e048aee1a9c13019e476'),
(36, 1, 1, 1, '1712935490', 'c11c8354b4b2e048aee1a9c13019e476'),
(37, 1, 6, 5, '1713101730', 'c11c8354b4b2e048aee1a9c13019e476'),
(38, 1, 1, 1, '1713112995', 'c11c8354b4b2e048aee1a9c13019e476'),
(39, 1, 1, 1, '1713145519', 'c11c8354b4b2e048aee1a9c13019e476'),
(41, 1, 5, 1, '1713152507', 'c11c8354b4b2e048aee1a9c13019e476'),
(42, 1, 5, 1, '1713152625', 'c11c8354b4b2e048aee1a9c13019e476'),
(43, NULL, 8, 1, '1713153398', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `playlistdetails`
--

CREATE TABLE `playlistdetails` (
  `DetailID` int(11) NOT NULL,
  `PlaylistID` int(11) DEFAULT NULL,
  `SongID` int(11) DEFAULT NULL,
  `SongOrder` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `playlists`
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
-- Cấu trúc bảng cho bảng `ratings`
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
-- Cấu trúc bảng cho bảng `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `create_date` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `registration`
--

INSERT INTO `registration` (`id`, `email`, `create_date`, `ip`) VALUES
(4, 'duogxaolin@gmail.com', '1711610158', '::1'),
(5, 'duog013@gmail.com', '1711696177', '2401:d800:bcd1:271:7379:d15e:92f1:e83c');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `songgenres`
--

CREATE TABLE `songgenres` (
  `SongID` int(11) NOT NULL,
  `GenreID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `songs`
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
-- Đang đổ dữ liệu cho bảng `songs`
--

INSERT INTO `songs` (`SongID`, `SongName`, `SongSlug`, `SongLogo`, `ArtistID`, `AlbumID`, `Duration`, `FilePath`) VALUES
(1, 'Chúng Ta Của Tương Lai', 'chung-ta-cua-tuong-lai', '/assets/img/ctqtl.png', 1, NULL, '08/03/2024', '/assets/music/chung-ta-cua-tuong-lai.mp3'),
(2, 'Chúng Ta Của Hiện Tại', 'chung-ta-cua-hien-tai', '/assets/img/ctqht.png', 1, NULL, '20/12/2020', '/assets/music/chung-ta-cua-hien-tai.mp3'),
(3, 'Blank Space', 'blank-space', '/assets/img/bank-space.png', 2, NULL, '10/11/2014', '/assets/music/BlankSpace-TaylorSwift-12613798.mp3'),
(4, 'Thiên Lý Ơi', 'thien-ly-oi', '/assets/img/tlo.png', 3, NULL, '22/2/2024', '/assets/music/ThienLyOi-JackJ97-13829746.mp3'),
(5, 'Hãy trao cho anh', 'hay-trao-cho-anh', '/assets/images/hay-trao-cho-anh_85141179.png', 1, NULL, '30/03/2024', '/assets/music/hay-trao-cho-anh_28762713.mp3'),
(6, 'Nâng chén tiêu sầu', 'nang-chen-tieu-sau', '/assets/images/nang-chen-tieu-sau_20621651.png', 5, NULL, '29/03/2024', '/assets/music/nang-chen-tieu-sau.mp3'),
(8, 'Muộn Rồi Mà Sao Còn', 'muon-roi-ma-sao-con', '/assets/images/muon-roi-ma-sao-con_37115313.png', 1, NULL, '24/09/2023', '/assets/music/muon-roi-ma-sao-con_29235191.mp3');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`AlbumID`),
  ADD KEY `ArtistID` (`ArtistID`),
  ADD KEY `idx_album_name` (`AlbumName`);

--
-- Chỉ mục cho bảng `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`ArtistID`),
  ADD KEY `idx_artist_name` (`ArtistName`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`GenreID`),
  ADD KEY `idx_genre_name` (`GenreName`);

--
-- Chỉ mục cho bảng `listeners`
--
ALTER TABLE `listeners`
  ADD PRIMARY KEY (`ListenerID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `idx_listener_name` (`ListenerName`);

--
-- Chỉ mục cho bảng `playcount`
--
ALTER TABLE `playcount`
  ADD PRIMARY KEY (`PlayCountID`),
  ADD KEY `ListenerID` (`ListenerID`),
  ADD KEY `SongID` (`SongID`),
  ADD KEY `ArtistID` (`ArtistID`);

--
-- Chỉ mục cho bảng `playlistdetails`
--
ALTER TABLE `playlistdetails`
  ADD PRIMARY KEY (`DetailID`),
  ADD UNIQUE KEY `PlaylistID` (`PlaylistID`,`SongOrder`),
  ADD KEY `SongID` (`SongID`);

--
-- Chỉ mục cho bảng `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`PlaylistID`),
  ADD KEY `CreatorID` (`CreatorID`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`RatingID`),
  ADD KEY `ListenerID` (`ListenerID`),
  ADD KEY `SongID` (`SongID`);

--
-- Chỉ mục cho bảng `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `songgenres`
--
ALTER TABLE `songgenres`
  ADD PRIMARY KEY (`SongID`,`GenreID`),
  ADD KEY `GenreID` (`GenreID`);

--
-- Chỉ mục cho bảng `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`SongID`),
  ADD KEY `ArtistID` (`ArtistID`),
  ADD KEY `AlbumID` (`AlbumID`),
  ADD KEY `idx_song_name` (`SongName`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `albums`
--
ALTER TABLE `albums`
  MODIFY `AlbumID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `artists`
--
ALTER TABLE `artists`
  MODIFY `ArtistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `GenreID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `listeners`
--
ALTER TABLE `listeners`
  MODIFY `ListenerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `playcount`
--
ALTER TABLE `playcount`
  MODIFY `PlayCountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `playlistdetails`
--
ALTER TABLE `playlistdetails`
  MODIFY `DetailID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `playlists`
--
ALTER TABLE `playlists`
  MODIFY `PlaylistID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `songs`
--
ALTER TABLE `songs`
  MODIFY `SongID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`ArtistID`) REFERENCES `artists` (`ArtistID`);

--
-- Các ràng buộc cho bảng `playcount`
--
ALTER TABLE `playcount`
  ADD CONSTRAINT `playcount_ibfk_1` FOREIGN KEY (`ListenerID`) REFERENCES `listeners` (`ListenerID`),
  ADD CONSTRAINT `playcount_ibfk_2` FOREIGN KEY (`SongID`) REFERENCES `songs` (`SongID`);

--
-- Các ràng buộc cho bảng `playlistdetails`
--
ALTER TABLE `playlistdetails`
  ADD CONSTRAINT `playlistdetails_ibfk_1` FOREIGN KEY (`PlaylistID`) REFERENCES `playlists` (`PlaylistID`),
  ADD CONSTRAINT `playlistdetails_ibfk_2` FOREIGN KEY (`SongID`) REFERENCES `songs` (`SongID`);

--
-- Các ràng buộc cho bảng `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_1` FOREIGN KEY (`CreatorID`) REFERENCES `listeners` (`ListenerID`);

--
-- Các ràng buộc cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`ListenerID`) REFERENCES `listeners` (`ListenerID`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`SongID`) REFERENCES `songs` (`SongID`);

--
-- Các ràng buộc cho bảng `songgenres`
--
ALTER TABLE `songgenres`
  ADD CONSTRAINT `songgenres_ibfk_1` FOREIGN KEY (`SongID`) REFERENCES `songs` (`SongID`),
  ADD CONSTRAINT `songgenres_ibfk_2` FOREIGN KEY (`GenreID`) REFERENCES `genres` (`GenreID`);

--
-- Các ràng buộc cho bảng `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`ArtistID`) REFERENCES `artists` (`ArtistID`),
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`AlbumID`) REFERENCES `albums` (`AlbumID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
