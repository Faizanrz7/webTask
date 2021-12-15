-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 02:16 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(100) NOT NULL,
  `cname` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `uid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `cname`, `uid`) VALUES
(1, '20BCS15', 1),
(2, '20BCS19', 1),
(12, 'LPUCLass', 26);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `question` varchar(1000) COLLATE utf8mb4_bin NOT NULL,
  `option1` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `option2` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `option3` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `option4` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `canswer` char(4) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `tid`, `question`, `option1`, `option2`, `option3`, `option4`, `canswer`) VALUES
(1, 2, 'qq', '11', '22', '33', '44', 'B'),
(2, 2, 'qq2', 'A', 'B', 'C', 'D', 'B'),
(3, 2, 'What is the full form of DBMS?\n', 'Data of Binary Management System', 'Database Management System', 'Database Management Service', 'Data Backup Management System', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `password`, `cid`) VALUES
(1, 'Faizan', 'faizananwar344@gmail.com', '$2y$10$BN0p0WPGXS6yUOKF0sqc9.gLsJYGagHZjHcJOtJMqfIezEW1vNUoW', 0),
(2, 'Faizan', '20BCS3028@cuchd.in', '$2y$10$GEGd1wiUm6VduHX9KYLPNeoGtNq1Z2SJgPi2BMOs38LOIoQDxsSPu', 1),
(3, 'Faizan', 'sdsaf#32dsfas@dfas', '$2y$10$XbyvL9.LgVBMMzcxbPPaVuJ.SV/HS4zRkRG6e3siyyYiVFZ6AI7PO', 5),
(4, 'Faizan', 'dsfafds@dfas', '$2y$10$iz.x8wizfRw3r6gC3hXnuepZ5dBLrWbacOSpHfVJtC41r8LYtBdZe', 5),
(5, 'Faizan', 'student-00-589ff3095dcd@qwiklabs.net', '$2y$10$OQSRQwQP8Usq.hO3kLQVpuMpRo4nXnEC4/SmOH1hiwY0meIUW6ZJ2', 0),
(6, 'Faizansa', 'student-00-825332636bf8@qwiklabs.net', '$2y$10$LnGCUgN445.fbywmVASoYufJtQCOmPRSNF4pEm22yaBDzClg.Df0m', 0),
(7, 'Faizansa', 'dsscfdsdsf', '$2y$10$4BvOGiCHej2aSHs6nhFi9eODVyERVcvAiklrd3xw8yd46/XHzor1u', 0),
(9, 'cxvcx', 'SDFA@vDSAF', '$2y$10$KSepyPdfmDixx8/ehpo/YeS2ZCwlvbvDvU..oAwAxY3UUakKr5xAe', 1),
(10, 'CVXV', 'VCAq@SDFDAF', '$2y$10$YtfO8ugCPXs8T.rpa0aC1OXAOOzGXk46UIRP6ea5HJMaVVLs2PZka', 1),
(11, 'VXCZX', 'sfasdf@sdfa', '$2y$10$.j4SOk2JULgiyJkvUWOvFeTWD/kXqa0JNO.VC0nyoPhg2AzpDqj0C', 1),
(13, 'cxvzv z', 'cvzxcxvWds@dfdasdf', '$2y$10$0QtYN8UqT346UXbCtgVvju1BHGiUnB5kZWl2EoN0dAX.EJf0L4Rqq', 1),
(14, 'dfavf', 'cxvczx zx@vsdfas', '$2y$10$kT9ePXJS3zzFeWGWTPLTSOxExlVxhBMlQOEL4LMnLkX3rPswVR.X2', 0),
(15, 'czc', 'zczC@dsfasdf', '$2y$10$5pcWwKAJMEPIN/7if5APmuRuHJRV6T.WdxHsmywiMURd9GG8bYW/S', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(100) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `uid` int(11) NOT NULL,
  `cid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `password`, `uid`, `cid`) VALUES
(22, 'Faizan', 'faizananwar344@gmail.com', '$2y$10$JJJNBXsC6o0J/HAkg9Tjeeb813wd9neM39qUNvMI8l56aGllgPrFO', 1, 1),
(23, 'Ramanuj', 'ramanuj@gmail.com', '$2y$10$7QbhOrnewqkzd02mHZOzGuF/o.PNtI1bHcBYOiT.iYYGHRZi6EzyG', 26, 12);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `duration` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `numberOfQuestions` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `date`, `duration`, `marks`, `numberOfQuestions`, `cid`) VALUES
(1, 'Faizan', '2021-12-10', 0, 0, 0, 0),
(2, 'Cse-mid', '2021-12-10', 0, 0, 0, 1),
(5, 'dghfj', '2021-12-10', 0, 0, 0, 5),
(9, 'sdsvfvsdcv', '2021-12-17', 120, 20, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `uid` int(11) NOT NULL,
  `uname` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`uid`, `uname`) VALUES
(1, 'Chandigarh University'),
(26, 'LPU');

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE `users_details` (
  `uid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `users_details`
--

INSERT INTO `users_details` (`uid`, `name`, `email`, `roles`, `password`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', '$2y$10$rJ6FF4DahQAp2ylUwRyfB.0Pb2eiPSm9NwBdCUHAUuo24Vr6RVKFO'),
(2, 'Shalin', 'Shalin@teacher.com', 'Teacher', '$2y$10$LTsiAvNebBr39ICH2a5GYulOax4ULSXMKbP3Mez7r9r4fsPsdtdcK'),
(3, 'Saleheen', 'Saleheen@teacher.com', 'Teacher', '$2y$10$KK9TlCYqt0YT8dSt6KIxVupqiIqePjnOHWBc8EKuDNQ7htnHGNpwS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `users_details`
--
ALTER TABLE `users_details`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users_details`
--
ALTER TABLE `users_details`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
