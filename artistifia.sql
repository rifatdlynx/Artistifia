-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2020 at 10:01 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artistifia`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `artist` int(11) NOT NULL,
  `release_date` date NOT NULL,
  `album_art_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `artist`, `release_date`, `album_art_path`) VALUES
(1, 'Thank U, Next', 1, '2019-02-08', 'Album_Art/Thank U, Next.png'),
(2, 'Lover', 2, '2019-08-23', 'Album_Art/Lover.png'),
(3, 'When We All Fall Asleep, Where Do We Go?', 4, '2019-03-29', 'Album_Art/When We All Fall Asleep, Where Do We Go.png'),
(4, 'Negatives', 8, '2016-07-29', 'Album_Art/Negatives.jpg'),
(5, 'Phases', 7, '2019-06-28', 'Album_Art/Phases.jpg'),
(6, 'Kid Krow', 3, '2020-03-20', 'Album_Art/Kid Krow.jpg'),
(7, 'Manic', 9, '2020-01-17', 'Album_Art/Manic.png'),
(8, 'Kill This Love', 5, '2019-04-05', 'Album_Art/Kill This Love.png'),
(9, 'Map of the Soul : 7', 6, '2020-02-21', 'Album_Art/Map of the Soul_7.png'),
(10, 'Hopeless Fountain Kingdom', 9, '2017-06-02', 'Album_Art/Hopeless Fountain Kingdom.png'),
(11, 'Youngblood', 10, '2018-06-22', 'Album_Art/Youngblood.png'),
(12, 'Awake', 11, '2017-09-21', 'Album_Art/Awake.jpg'),
(13, 'An Ode', 12, '2019-09-16', 'album_art/An Ode.png');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `image_path`) VALUES
(1, 'Ariana Grande', 'Artist_Profile/Ariana Grande.jpeg'),
(2, 'Taylor Swift', 'Artist_Profile/Taylor Swift.png'),
(3, 'Conan Gray', 'Artist_Profile/Conan Gray.jpg'),
(4, 'Billie Eilish', 'Artist_Profile/Billie Eilish.jpg'),
(5, 'BLACKPINK', 'Artist_Profile/BLACKPINK.jpg'),
(6, 'BTS', 'Artist_Profile/BTS.jpg'),
(7, 'Chase Atlantic', 'Artist_Profile/Chase Atlantic.jpg'),
(8, 'The Girl and The Dreamcatcher', 'Artist_Profile/The Girl and The Dreamcatcher.jpg'),
(9, 'Halsey', 'Artist_Profile/Halsey.jpg'),
(10, '5 Seconds Of Summer', 'Artist_Profile/5 Seconds Of Summer.jpg'),
(11, 'Illenium', 'Artist_Profile/Illenium.jpg'),
(12, 'SEVENTEEN', 'Artist_Profile/SEVENTEEN.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(2, 'Alternative/Indie'),
(5, 'Dance/Electronic'),
(6, 'Electropop'),
(3, 'K-Pop'),
(1, 'Pop'),
(4, 'Pop Rock');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `owner` int(11) DEFAULT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `name`, `owner`, `dateCreated`) VALUES
(1, 'Top Chart', NULL, '2020-09-18 23:18:50'),
(2, 'Liked Song', 1, '2020-09-28 19:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `playlist_songs`
--

CREATE TABLE `playlist_songs` (
  `pid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `inOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlist_songs`
--

INSERT INTO `playlist_songs` (`pid`, `sid`, `inOrder`) VALUES
(1, 1, 3),
(1, 9, 4),
(1, 22, 5),
(1, 31, 1),
(1, 61, 7),
(1, 64, 2),
(1, 72, 6),
(2, 11, 2),
(2, 76, 1);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `featuring_artist` varchar(255) DEFAULT NULL,
  `album` int(11) NOT NULL,
  `track_no` int(11) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `genre` int(11) NOT NULL,
  `streams` int(15) NOT NULL,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `featuring_artist`, `album`, `track_no`, `duration`, `genre`, `streams`, `file_path`) VALUES
(1, 'bad guy', NULL, 3, 2, '3:31', 1, 602, 'Music/Billie Eilish - bad guy.mp3'),
(2, 'Ashley', NULL, 7, 1, '3:06', 1, 101, 'Music/Halsey - Ashley.mp3'),
(3, 'bury a friend', NULL, 3, 10, '3:31', 1, 294, 'Music/Billie Eilish - bury a friend.mp3'),
(4, 'i love you', NULL, 3, 13, '4:51', 1, 110, 'Music/Billie Eilish - i love you.mp3'),
(5, 'wish you were gay', NULL, 3, 6, '3:43', 1, 150, 'Music/Billie Eilish - wish you were gay.mp3'),
(6, 'you should see me in a crown', NULL, 3, 4, '3:00', 1, 252, 'Music/Billie Eilish - you should see me in a crown.mp3'),
(7, 'I Forgot That You Existed', NULL, 2, 1, '2:52', 1, 33, 'Music/Taylor Swift - I Forgot That You Existed.mp3'),
(8, 'Cruel Summer', NULL, 2, 2, '2:58', 1, 100, 'Music/Taylor Swift - Cruel Summer.mp3'),
(9, 'Lover', NULL, 2, 3, '3:49', 1, 600, 'Music/Taylor Swift - Lover.mp3'),
(10, 'Still Learning', NULL, 7, 15, '3:33', 1, 101, 'Music/Halsey - Still Learning.mp3'),
(11, 'SUGA\'s Interlude', 'Suga of BTS', 7, 5, '2:19', 1, 201, 'Music/Halsey - SUGA\'s Interlude.mp3'),
(12, 'Miss Americana & The Heartbreak Prince', NULL, 2, 7, '3:50', 1, 231, 'Music/Taylor Swift - Miss Americana & The Heartbreak Prince.mp3'),
(13, 'HEAVEN AND BACK', NULL, 5, 7, '4:09', 2, 60, 'Music/Chase Atlantic - HEAVEN AND BACK.mp3'),
(14, 'Cornelia Street', NULL, 2, 9, '4:47', 1, 245, 'Music/Taylor Swift - Cornelia Street.mp3'),
(15, 'Death By A Thousand Cuts', NULL, 2, 10, '3:19', 1, 410, 'Music/Taylor Swift - Death By A Thousand Cuts.mp3'),
(16, 'HER', NULL, 5, 11, '2:48', 1, 50, 'Music/Chase Atlantic - HER.mp3'),
(17, 'False God', NULL, 2, 13, '3:18', 1, 30, 'Music/Taylor Swift - False God.mp3'),
(18, 'You Need To Calm Down', NULL, 2, 14, '2:57', 1, 25, 'Music/Taylor Swift - You Need To Calm Down.mp3'),
(19, 'Afterglow', NULL, 2, 15, '3:37', 1, 120, 'Music/Taylor Swift - Afterglow.mp3'),
(20, 'ME! (feat. Brendon Urie of Panic! At The Disco)', 'Brendon Urie', 2, 16, '3:14', 1, 400, 'Music/Taylor Swift - ME! (feat. Brendon Urie of Panic! At The Disco).mp3'),
(21, 'Daylight', NULL, 2, 18, '4:49', 1, 300, 'Music/Taylor Swift - Daylight.mp3'),
(22, 'Kill This Love', NULL, 8, 1, '3:11', 3, 630, 'Music/BLACKPINK - Kill This Love.mp3'),
(23, 'Don\'t Know What To Do', NULL, 8, 2, '3:24', 3, 200, 'Music/BLACKPINK - Don\'t Know What To Do.mp3'),
(24, 'Kick It', NULL, 8, 3, '3:14', 3, 131, 'Music/BLACKPINK - Kick It.mp3'),
(25, ' 아니길 Hope Not', NULL, 8, 4, '3:14', 3, 73, 'Music/BLACKPINK - Hope Not.mp3'),
(26, 'Make You Stay', NULL, 4, 1, '3:33', 1, 136, 'Music/The Girl and the Dreamcatcher - Make You Stay.mp3'),
(27, 'Glowing in the Dark', NULL, 4, 2, '3:56', 1, 200, 'Music/The Girl and the Dreamcatcher - Glowing in the Dark.mp3'),
(28, 'Gladiator', NULL, 4, 3, '3:06', 1, 95, 'Music/The Girl and the Dreamcatcher - Gladiator.mp3'),
(29, 'My Way', NULL, 4, 4, '3:15', 1, 113, 'Music/The Girl and the Dreamcatcher - My Way.mp3'),
(30, 'Monster', NULL, 4, 6, '3:43', 1, 151, 'Music/The Girl and the Dreamcatcher - Monster.mp3'),
(31, '7 rings', NULL, 1, 10, '2:59', 1, 801, 'Music/Ariana Grande - 7 rings.mp3'),
(32, 'bloodline', NULL, 1, 4, '3:37', 1, 150, 'Music/Ariana Grande - bloodline.mp3'),
(33, 'break up with your girlfriend, i\'m bored', NULL, 1, 12, '3:24', 1, 253, 'Music/Ariana Grande - break up with your girlfriend, i\'m bored.mp3'),
(34, 'ghostin', NULL, 1, 8, '4:32', 1, 50, 'Music/Ariana Grande - ghostin.mp3'),
(35, 'in my head', NULL, 1, 9, '3:43', 1, 40, 'Music/Ariana Grande - in my head.mp3'),
(36, 'NASA', NULL, 1, 3, '3:03', 1, 171, 'Music/Ariana Grande - NASA.mp3'),
(37, 'INTRO', NULL, 5, 1, '2:02', 2, 21, 'Music/Chase Atlantic - INTRO.mp3'),
(38, 'thank u, next', NULL, 1, 11, '3:27', 1, 550, 'Music/Ariana Grande - thank u, next.mp3'),
(39, 'Comfort Crowd', NULL, 6, 1, '2:55', 1, 93, 'Music/Conan Gray - Comfort Crowd.mp3'),
(40, 'If Walls Could Talk', NULL, 11, 7, '3:02', 4, 40, 'Music/5 Seconds Of Summer - If Walls Could Talk.mp3'),
(41, 'Lie To Me', NULL, 11, 3, '2:30', 4, 105, 'Music/5 Seconds Of Summer - Lie To Me.mp3'),
(42, 'Ghost Of You', NULL, 11, 4, '3:16', 4, 40, 'Music/5 Seconds Of Summer - Ghost Of You.mp3'),
(43, 'Want You Back', NULL, 11, 2, '2:54', 4, 72, 'Music/5 Seconds Of Summer - Want You Back.mp3'),
(44, 'Youngblood', NULL, 11, 1, '3:25', 4, 255, 'Music/5 Seconds Of Summer - Youngblood.mp3'),
(45, 'Feel Good (Feat. Daya)', 'Gryffin, Daya', 12, 11, '4:12', 5, 100, 'Music/Gryffin & Illenium ft. Daya - Feel Good.mp3'),
(46, 'Crawl Outta Love (feat. Annika Wells', 'Annika Wells', 12, 2, '4:01', 5, 75, 'Music/Illenium - Crawl Outta Love (feat. Annika Wells).mp3'),
(47, 'Fractures (feat. Nevve)', 'Nevve', 12, 6, '4:05', 5, 65, 'Music/Illenium - Fractures (feat. Nevve).mp3'),
(48, 'Sound Of Walking Away (feat. Kerli)', 'Kerli', 12, 9, '4:13', 5, 45, 'Music/Illenium & Kerli - Sound Of Walking Away.mp3'),
(49, 'Illenium - Where\'d U Go (feat. Said The Sky)', 'Said The Sky', 12, 5, '3:04', 5, 30, 'Music/Illenium x Said The Sky - Where\'d U Go.mp3'),
(50, 'I DON\'T LIKE DARKNESS', NULL, 5, 12, '3:41', 2, 95, 'Music/Chase Atlantic - I DON\'T LIKE DARKNESS.mp3'),
(51, 'LOVE IS (NOT) EASY', NULL, 5, 4, '3:09', 2, 50, 'Music/Chase Atlantic - Love is not Easy.mp3'),
(52, 'STUCKINMYBRAIN', NULL, 5, 12, '3:50', 2, 115, 'Music/Chase Atlantic - STUCKINMYBRAIN.mp3'),
(53, 'The Cut That Always Bleeds', NULL, 6, 6, '3:53', 2, 61, 'Music/Conan Gray - The Cut That Always Bleeds.mp3'),
(54, 'Strangers (feat. Lauren Jauregui)', 'Lauren Jauregui', 10, 13, '3:14', 6, 161, 'Music/Halsey - Strangers ft. Lauren Jauregui.mp3'),
(55, 'Now Or Never', NULL, 10, 6, '3:34', 6, 30, 'Music/Halsey - Now Or Never.mp3'),
(56, 'Lie (feat. Quavo)', 'Quavo', 10, 9, '2:29', 6, 20, 'Music/Halsey - Lie ft. Quavo.mp3'),
(57, 'Hopeless (feat. Cashmere Cat)', 'Cashmere Cat', 10, 16, '3:07', 6, 15, 'Music/Halsey - Hopeless ft. Cashmere Cat.mp3'),
(58, 'Eyes Closed', NULL, 10, 3, '3:22', 6, 90, 'Music/Halsey - Eyes Closed.mp3'),
(59, 'Devil In Me', NULL, 10, 15, '4:09', 6, 50, 'Music/Halsey - Devil In Me.mp3'),
(60, 'Bad At Love', NULL, 10, 11, '3:01', 6, 85, 'Music/Halsey - Bad At Love.mp3'),
(61, 'Without Me', NULL, 7, 9, '3:23', 1, 492, 'Music/Halsey - Without Me.mp3'),
(62, 'Valentine', NULL, 11, 4, '3:16', 4, 50, 'Music/5 Seconds Of Summer - Valentine.mp3'),
(63, 'Black Swan', NULL, 9, 7, '3:18', 3, 450, 'Music/BTS - Black Swan.mp3'),
(64, 'Boy With Luv (Feat. Halsey)', 'Halsey', 9, 2, '3:50', 3, 851, 'Music/BTS - Boy With Luv (Feat. Halsey).mp3'),
(65, 'Dionysus', NULL, 9, 5, '4:09', 3, 90, 'Music/BTS - Dionysus.mp3'),
(66, 'Filter', NULL, 9, 8, '3:00', 3, 30, 'Music/BTS - Filter.mp3'),
(67, 'Interlude : Shadow', NULL, 9, 6, '4:20', 3, 100, 'Music/BTS - Interlude_Shadow.mp3'),
(68, 'Intro : Persona', NULL, 9, 1, '2:51', 3, 90, 'Music/BTS - Intro_Persona.mp3'),
(69, '929', NULL, 7, 16, '2:56', 2, 40, 'Music/Halsey - 929.mp3'),
(70, 'Make It Right', NULL, 9, 3, '3:46', 3, 150, 'Music/BTS - Make It Right.mp3'),
(71, 'My Time', NULL, 9, 9, '3:54', 3, 94, 'Music/BTS - My Time.mp3'),
(72, 'ON', NULL, 9, 11, '4:06', 3, 450, 'Music/BTS - ON.mp3'),
(73, 'We are Bulletproof : the Eternal', NULL, 9, 18, '4:21', 3, 60, 'Music/BTS - We are Bulletproof _ the Eternal.mp3'),
(74, 'Heather', NULL, 6, 10, '3:18', 1, 60, 'Music/Conan Gray - Heather.mp3'),
(75, 'Maniac', NULL, 6, 3, '3:05', 1, 82, 'Music/Conan Gray - Maniac.mp3'),
(76, 'Fear (독)', NULL, 13, 3, '2:55', 3, 352, 'Music/SEVENTEEN - Fear.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `signUpDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `first_name`, `last_name`, `signUpDate`) VALUES
(1, 'ummehaniera@gmail.com', 'Hani', 'abcde', 'Umme', 'Hani', '2020-09-28 16:26:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `album_art_path` (`album_art_path`),
  ADD KEY `albums_artist_fk` (`artist`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `image_path` (`image_path`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playlist_user_fk` (`owner`);

--
-- Indexes for table `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD PRIMARY KEY (`pid`,`sid`),
  ADD KEY `songs_fk` (`sid`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `file_path` (`file_path`),
  ADD KEY `songs_genre_fk` (`genre`),
  ADD KEY `songs_album_fk` (`album`),
  ADD KEY `featuring_artist_fk` (`featuring_artist`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_artist_fk` FOREIGN KEY (`artist`) REFERENCES `artists` (`id`);

--
-- Constraints for table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `playlist_user_fk` FOREIGN KEY (`owner`) REFERENCES `users` (`id`);

--
-- Constraints for table `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD CONSTRAINT `playlist_fk` FOREIGN KEY (`pid`) REFERENCES `playlist` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `songs_fk` FOREIGN KEY (`sid`) REFERENCES `songs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_album_fk` FOREIGN KEY (`album`) REFERENCES `albums` (`id`),
  ADD CONSTRAINT `songs_genre_fk` FOREIGN KEY (`genre`) REFERENCES `genre` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
