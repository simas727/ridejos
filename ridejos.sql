-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019 m. Vas 22 d. 10:48
-- Server version: 5.7.25-0ubuntu0.16.04.2
-- PHP Version: 7.0.33-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samp`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `post` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `about`
--

INSERT INTO `about` (`id`, `post`) VALUES
(1, 'stilius | interjerai | baldai/n /n Rolanda *** /n Esu baigusi Kauno Technologijų Universiteto Dizaino ir technologijų fakultetą. Turiu inžinieriaus technologo kvalifikacija. /n Vienerius metus gyvenau ir mokiausi Prancūzijoje. Daugelį metų dirbu dizaino ir mados srityje./n /n\r\n/npuslapis yra sukurtas SDweb http://www.sdweb.lt ');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `badip`
--

CREATE TABLE `badip` (
  `id` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `badip`
--
 
-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `contactother`
--

 
-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `forum_cat`
--

CREATE TABLE `forum_cat` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `forum_cat`
--

INSERT INTO `forum_cat` (`cat_id`, `cat_name`, `cat_desc`) VALUES
(1, 'pagrindinis', 'visi reikalai'),
(2, 'serveris', 'variable\r\n');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `forum_posts`
--

CREATE TABLE `forum_posts` (
  `post_id` int(11) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` varchar(100) NOT NULL,
  `post_topic` int(20) NOT NULL,
  `post_by` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `forum_posts`
--

INSERT INTO `forum_posts` (`post_id`, `post_content`, `post_date`, `post_topic`, `post_by`) VALUES
(1, 'dvigubas aš tai kai turiu patirties bet neturiu laiko', '2018', 1, 2);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `forum_reply`
--

CREATE TABLE `forum_reply` (
  `reply_id` int(11) NOT NULL,
  `reply_content` text NOT NULL,
  `reply_date` varchar(100) NOT NULL,
  `reply_topic` int(20) NOT NULL,
  `reply_by` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `forum_topic`
--

CREATE TABLE `forum_topic` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(100) NOT NULL,
  `topic_date` varchar(110) NOT NULL,
  `topic_cat` int(100) NOT NULL,
  `topic_by` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `forum_topic`
--

INSERT INTO `forum_topic` (`topic_id`, `topic_name`, `topic_date`, `topic_cat`, `topic_by`) VALUES
(1, 'dvigubas aš', '2018', 1, 2),
(2, 'testas', '2019', 1, 2);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `galerija`
--

CREATE TABLE `galerija` (
  `id` int(11) NOT NULL,
  `image` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `galerija`
--

INSERT INTO `galerija` (`id`, `image`) VALUES
(5, 'img/a1.jpg'),
(6, 'img/a2.jpg'),
(7, 'img/cmr.jpg'),
(8, 'img/acr.jpg'),
(9, 'img/014.jpg'),
(10, 'img/G002.jpg');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `style` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `menu`
--

INSERT INTO `menu` (`id`, `title`, `link`, `style`) VALUES
(1, 'apie', '/', ''),
(2, 'Galerija', '/galerija', ''),
(3, 'kontaktai', '/susisiekti', '');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `post` varchar(1000) NOT NULL,
  `udate` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `news`
--
 
-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `link` varchar(200) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `notes`
--

INSERT INTO `notes` (`id`, `link`, `desc`) VALUES
(1, 'https://www.w3schools.com/howto/howto_css_modals.asp', 'model popupas tinkamas reklamoms video galerijai ir panašiai'),
(2, 'http://markitup.jaysalvat.com/examples/bbcode/', 'bbcode ');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `pollanswers`
--

CREATE TABLE `pollanswers` (
  `id` int(11) NOT NULL,
  `an1` varchar(5) NOT NULL,
  `an2` varchar(5) NOT NULL,
  `an3` varchar(5) NOT NULL,
  `an4` varchar(5) NOT NULL,
  `an5` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `pollanswers`
--

INSERT INTO `pollanswers` (`id`, `an1`, `an2`, `an3`, `an4`, `an5`) VALUES
(1, '25', '19', '9', '', '');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `pollquestions`
--

CREATE TABLE `pollquestions` (
  `id` int(11) NOT NULL,
  `pollid` int(5) NOT NULL,
  `question` varchar(100) NOT NULL,
  `an1` varchar(50) NOT NULL,
  `an2` varchar(50) NOT NULL,
  `an3` varchar(50) NOT NULL,
  `an4` varchar(50) NOT NULL,
  `an5` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `pollquestions`
--

 
-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `remejai`
--

 
-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `reportadmin`
--

 
-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `reportcheater`
--

 
-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `rules`
--

 
--
-- Sukurta duomenų kopija lentelei `rules`
--
 
-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `server`
--

CREATE TABLE `server` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `off` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `server`
--

INSERT INTO `server` (`id`, `title`, `off`) VALUES
(2, 'R idėjos', 0);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `spaudimas`
--

 
--
-- Sukurta duomenų kopija lentelei `spaudimas`
--

 
-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(3000) NOT NULL,
  `admin` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `admin`) VALUES
(2, 'simas', 'ff8fac974df8c7c971ccd4a5a555bf9d', 1),
(4, 'SpiCy', 'f6a2ca968d3463b9b611f497e8d21d32', 1),
(5, 'Ridejos', 'f5cecb2ceb19f91588382ac1f1c694a5', 1),
(6, 'Ridejos', 'f5cecb2ceb19f91588382ac1f1c694a5', 1),
(7, 'Ridejos', 'f5cecb2ceb19f91588382ac1f1c694a5', 1),
(8, 'Ridejos', 'f5cecb2ceb19f91588382ac1f1c694a5', 1);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `link` text NOT NULL,
  `file` varchar(200) NOT NULL,
  `isfile` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `videos`
--
 
-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `votedip`
--

 
--
-- Sukurta duomenų kopija lentelei `votedip`
--

INSERT INTO `votedip` (`id`, `ip`, `forv`) VALUES
(1, '212.52.34.136', 3),
(2, '84.240.4.33', 3),
(3, '5.20.78.179', 1),
(4, '78.63.195.120', 2),
(5, '86.38.207.43', 2),
(6, '85.206.184.67', 2),
(7, '212.52.36.150', 1),
(8, '5.20.86.225', 2),
(9, '188.69.196.148', 2),
(10, '90.131.34.112', 2),
(11, '90.140.244.118', 2),
(12, '90.131.33.126', 3),
(13, '77.90.72.19', 1),
(14, '78.61.101.239', 1),
(15, '78.61.123.28', 2),
(16, '78.56.214.71', 1),
(17, '78.57.131.150', 2),
(18, '62.198.158.9', 1),
(19, '217.77.24.131', 1),
(20, '212.7.218.176', 1),
(21, '168.1.53.196', 1),
(22, '185.216.33.98', 1),
(23, '159.148.186.223', 1),
(24, '90.140.173.157', 2),
(25, '78.62.6.184', 3),
(26, '78.56.96.74', 1),
(27, '90.131.43.249', 2),
(28, '84.15.182.38', 2),
(29, '90.131.34.28', 2),
(30, '90.131.40.150', 2),
(31, '88.223.63.27', 3),
(32, '88.119.43.116', 3),
(33, '83.90.146.72', 2),
(34, '213.190.53.150', 1),
(35, '188.207.87.136', 1),
(36, '90.131.42.92', 1),
(37, '92.69.46.97', 1),
(38, '90.131.44.64', 2),
(39, '90.131.34.159', 1),
(40, '84.15.183.33', 1),
(41, '78.60.229.150', 2),
(42, '10.144.50.229', 1),
(43, '88.119.61.15', 1),
(44, '89.190.117.137', 2),
(45, '46.249.171.35', 1),
(46, '81.7.66.184', 2),
(47, '90.131.36.20', 3),
(48, '91.216.163.163', 3),
(49, '188.69.212.140', 1),
(50, '78.62.188.29', 1),
(51, '91.187.183.195', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `badip`
--
ALTER TABLE `badip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_cat`
--
ALTER TABLE `forum_cat`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Indexes for table `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `forum_reply`
--
ALTER TABLE `forum_reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `forum_topic`
--
ALTER TABLE `forum_topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `galerija`
--
ALTER TABLE `galerija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pollanswers`
--
ALTER TABLE `pollanswers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pollquestions`
--
ALTER TABLE `pollquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remejai`
--
ALTER TABLE `remejai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reportadmin`
--
ALTER TABLE `reportadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reportcheater`
--
ALTER TABLE `reportcheater`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `server`
--
ALTER TABLE `server`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spaudimas`
--
ALTER TABLE `spaudimas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votedip`
--
ALTER TABLE `votedip`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `badip`
--
ALTER TABLE `badip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `forum_cat`
--
ALTER TABLE `forum_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forum_reply`
--
ALTER TABLE `forum_reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_topic`
--
ALTER TABLE `forum_topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `galerija`
--
ALTER TABLE `galerija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pollanswers`
--
ALTER TABLE `pollanswers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pollquestions`
--
ALTER TABLE `pollquestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `remejai`
--
ALTER TABLE `remejai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reportadmin`
--
ALTER TABLE `reportadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reportcheater`
--
ALTER TABLE `reportcheater`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `server`
--
ALTER TABLE `server`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spaudimas`
--
ALTER TABLE `spaudimas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `votedip`
--
ALTER TABLE `votedip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
