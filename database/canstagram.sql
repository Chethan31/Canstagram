-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2021 at 06:07 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canstagram`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(255) NOT NULL,
  `postid` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `comment_content` varchar(10000) NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `postid`, `user_id`, `comment_content`, `comment_time`) VALUES
(64, 42, 3, 'hello', '2021-01-18 17:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `feedbacks` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `feedbacks`) VALUES
(8, 3, 'blaa');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `fid` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `frd_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`fid`, `user_id`, `frd_id`) VALUES
(43, 5, 3),
(44, 3, 5),
(45, 3, 8),
(46, 8, 3),
(47, 7, 8),
(48, 8, 7),
(49, 4, 7),
(50, 7, 4),
(55, 5, 6),
(56, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int(255) NOT NULL,
  `postid` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `postid`, `user_id`) VALUES
(90, 42, 5),
(91, 41, 5),
(92, 40, 5),
(93, 39, 5),
(94, 38, 5),
(95, 36, 5);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postid` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `postdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `count` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `user_id`, `photo`, `postdate`, `count`) VALUES
(36, 3, 'Uploads/IMG-5ffd1c948e51a9.68266386.jpg', '2021-01-12 03:50:44', 1),
(38, 4, 'Uploads/IMG-5ffd1f4a0ed7f7.81416223.jpg', '2021-01-12 04:02:18', 1),
(39, 7, 'Uploads/IMG-5ffd1f6d5b0603.47428538.jpg', '2021-01-12 04:02:53', 1),
(40, 7, 'Uploads/IMG-5ffd1f78199972.92093006.jpg', '2021-01-12 04:03:04', 1),
(41, 8, 'Uploads/IMG-5ffd59d261d2b6.45536369.jpg', '2021-01-12 08:12:02', 1),
(42, 3, 'Uploads/IMG-5ffee68482cfb8.81450028.jpg', '2021-01-13 12:24:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `req_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `frd_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`req_id`, `user_id`, `frd_id`) VALUES
(68, 6, 8),
(69, 6, 7),
(71, 5, 8),
(72, 5, 7),
(74, 3, 7),
(77, 4, 3),
(78, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `usn` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `position` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL DEFAULT 'n/a',
  `branch` varchar(255) NOT NULL DEFAULT 'n/a',
  `sem` varchar(255) NOT NULL DEFAULT 'n/a',
  `hobbies` varchar(255) NOT NULL DEFAULT 'n/a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `usn`, `fullname`, `dob`, `gender`, `position`, `email`, `phone`, `password`, `image`, `year`, `branch`, `sem`, `hobbies`) VALUES
(3, 'che@2001', '4CB18CS016', 'Chethan R', '2001-01-03', 'Male', 'Student', 'chethanrgowda38@gmail.com', '8762770474', '827ccb0eea8a706c4c34a16891f84e7b', 'profilepic/183172.jpg', 'III Year', 'Computer Science', 'V Sem', 'Reading'),
(4, 'ashwin@2000', '4CB18CS011', 'Ashwin Rao', '2021-01-07', 'Male', 'Student', 'ashwinrao@gmail.com', '334234', '827ccb0eea8a706c4c34a16891f84e7b', 'profilepic/628647.jpg', 'n/a', 'n/a', 'n/a', 'n/a'),
(5, 'chinmay@2000', '4CB18CS017', 'Chinmay Pai', '2021-01-01', 'Male', 'Student', 'chinmay2000@gmail.com', '42323', '827ccb0eea8a706c4c34a16891f84e7b', 'profilepic/546807.jpg', 'n/a', 'n/a', 'n/a', 'n/a'),
(6, 'darshan@2000', '4CB18CS018', 'Darshan Shenoy', '2021-01-20', 'Male', 'Student', 'darshan2000@gmail.com', '472399', '827ccb0eea8a706c4c34a16891f84e7b', 'profilepic/24812.jpg', 'n/a', 'n/a', 'n/a', 'n/a'),
(7, 'chandra@2000', '4CB18CS015', 'Chandrashekhar', '2021-01-05', 'Male', 'Staff', 'chandra2000@gmail.com', '536126386', '827ccb0eea8a706c4c34a16891f84e7b', 'profilepic/wp3802978-iron-man-and-spider-man-wallpapers.jpg', 'n/a', 'n/a', 'n/a', 'n/a'),
(8, 'jeraldfernandes', '4CB18CS028', 'Jerald jonson', '2000-03-02', 'Male', 'Student', 'jeraldfernandes7406@gmail.com', '8095711530', 'fb210f74ea902234c693f94fec4353cf', 'profilepic/24812.jpg', 'n/a', 'n/a', 'n/a', 'n/a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `test7` (`user_id`),
  ADD KEY `test8` (`postid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test6` (`user_id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `test5` (`user_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `test3` (`postid`),
  ADD KEY `test4` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`),
  ADD KEY `test` (`user_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `test1` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `fid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `req_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `test7` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test8` FOREIGN KEY (`postid`) REFERENCES `posts` (`postid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `test6` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `test5` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `test3` FOREIGN KEY (`postid`) REFERENCES `posts` (`postid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test4` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `test` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `test1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
