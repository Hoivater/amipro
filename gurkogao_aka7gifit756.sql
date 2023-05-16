-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 10.0.0.149:3306
-- Generation Time: Dec 19, 2022 at 05:48 AM
-- Server version: 10.2.36-MariaDB-log
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gurkogao_aka7gifit756`
--

-- --------------------------------------------------------

--
-- Table structure for table `jilert32dwd_account`
--

CREATE TABLE `jilert32dwd_account` (
  `id` int(10) UNSIGNED NOT NULL,
  `verif_id` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_creation` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jilert32dwd_account`
--

INSERT INTO `jilert32dwd_account` (`id`, `verif_id`, `nickname`, `password`, `date_creation`) VALUES
(1, '1271331905', 'gurkogao', 'b59c67bf196a4758191e42f76670ceba', 1671274488),
(2, '1955548311', 'belka', 'b59c67bf196a4758191e42f76670ceba', 1671286112);

-- --------------------------------------------------------

--
-- Table structure for table `jilert32dwd_bloop`
--

CREATE TABLE `jilert32dwd_bloop` (
  `id` int(10) UNSIGNED NOT NULL,
  `verif_id` varchar(255) NOT NULL,
  `name_article` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `text_article` text NOT NULL,
  `reply` text NOT NULL,
  `tags` text NOT NULL,
  `category` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `visible` int(11) NOT NULL,
  `popular` int(11) NOT NULL,
  `count_commentary` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jilert32dwd_bloop`
--

INSERT INTO `jilert32dwd_bloop` (`id`, `verif_id`, `name_article`, `link`, `description`, `text_article`, `reply`, `tags`, `category`, `foto`, `visible`, `popular`, `count_commentary`, `date`) VALUES
(1, '1271331905', 'Заметка важная', '1671274511_dbzqlkji5cmpuhy1g3vtaox4n', 'Заметка важная', 'Заметка важная', '', '', 'noname', 'nofoto', 0, 0, 0, 1671274511),
(2, '1271331905', 'Без имени', '1671274533_q5pbhd2njke4cfzasrlu1iwyg', 'Без имени', 'Без имени', '', '', 'noname', '1271331905_1671274533file_0.jpg', 0, 0, 0, 1671274533);

-- --------------------------------------------------------

--
-- Table structure for table `jilert32dwd_commentary`
--

CREATE TABLE `jilert32dwd_commentary` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_article` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `levels` text NOT NULL,
  `nesting` int(11) NOT NULL,
  `code` text NOT NULL,
  `date_creation` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jilert32dwd_history`
--

CREATE TABLE `jilert32dwd_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `history` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jilert32dwd_scheme`
--

CREATE TABLE `jilert32dwd_scheme` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `link` varchar(250) NOT NULL,
  `scheme` text NOT NULL,
  `setting_a` varchar(250) NOT NULL,
  `setting_b` varchar(250) NOT NULL,
  `setting_c` varchar(250) NOT NULL,
  `setting_d` varchar(250) NOT NULL,
  `setting_e` varchar(250) NOT NULL,
  `setting_f` varchar(250) NOT NULL,
  `setting_g` varchar(250) NOT NULL,
  `setting_h` varchar(250) NOT NULL,
  `setting_o` varchar(250) NOT NULL,
  `setting_t` varchar(250) NOT NULL,
  `date_creation` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jilert32dwd_scheme`
--

INSERT INTO `jilert32dwd_scheme` (`id`, `user_id`, `name`, `link`, `scheme`, `setting_a`, `setting_b`, `setting_c`, `setting_d`, `setting_e`, `setting_f`, `setting_g`, `setting_h`, `setting_o`, `setting_t`, `date_creation`) VALUES
(1, 1271331905, 'Голова', 'golova1671283761', '2ряд)  ( 5сбн 1пр ) x 1раз [ 7 ]\n3ряд) ( 1сбн 1пр ) x 3раз 1сбн [ 10 ]\n4ряд)  ( 1сбн 1пр ) x 5раз [ 15 ]\n', '', '', '', '', '', '', '', '', '', '', 1671283761),
(2, 1271331905, 'Головище', 'golovishhe1671284718', '2ряд)  (  1пр ) x 6раз [ 12 ]\n3ряд)  ( 1сбн 1пр ) x 6раз [ 18 ]\n4ряд)  (  1пр ) x 14раз 4сбн [ 32 ]\n5ряд)  ( 2сбн  1пр ) x 5раз 1сбн ( 2сбн  1пр ) x 5раз 1сбн  [42]\n6ряд)  (  1пр ) x 38раз 4сбн [ 80 ]\n7ряд) ( 10сбн 1пр ) x 7раз 3сбн [ 87 ]\n8ряд) ( 1уб ) x 35раз 17сбн [ 52 ]\n', '', '', '', '', '', '', '', '', '', '', 1671284718),
(3, 1271331905, 'Голова снеговика', 'golova_snegovika1671285519', '1ряд) ... [ 6 ] \n2ряд)  (  1пр ) x 6раз [ 12 ]\n3ряд)  (  1пр ) x 11раз 1сбн [ 23 ]\n', '', '', '', '', '', '', '', '', '', '', 1671285519),
(4, 1955548311, 'Головище', 'golovishhe1671286408', '1ряд) ... [ 6 ] \n2ряд)  (  1пр ) x 6раз [ 12 ]\n3ряд)  (  1пр ) x 12раз [ 24 ]\n4ряд)  ( 3сбн 1пр ) x 6раз [ 30 ]\n', '', '', '', '', '', '', '', '', '', '', 1671286408),
(5, 1955548311, 'Туловище', 'tulovishhe1671286466', '1ряд) ... [ 6 ] \n2ряд)  (  1пр ) x 6раз [ 12 ]\n3ряд)  (  1пр ) x 12раз [ 24 ]\n4ряд)  ( 3сбн 1пр ) x 6раз [ 30 ]\n', '', '', '', '', '', '', '', '', '', '', 1671286466),
(6, 1271331905, 'Ноги', 'nogi1671373813', '1ряд) ... [ 6 ] \n2ряд)  (  1пр ) x 6раз [ 12 ]\n3ряд)  ( 3сбн 1пр ) x 3раз [ 15 ]\n4ряд)  ( 4сбн 1пр ) x 3раз [ 18 ]\n5ряд)  (  1пр ) x 18раз [ 36 ]\n', '', '', '', '', '', '', '', '', '', '', 1671373813),
(7, 1271331905, 'ухо', 'uho1671394892', '1ряд) ... [ 6 ] \n2ряд)  (  1пр ) x 6раз [ 12 ]\n3ряд)  (  1пр ) x 12раз [ 24 ]\n4ряд)  (  1пр ) x 24раз [ 48 ]\n5ряд)  ( 0сбн  1пр ) x 7раз 1сбн ( 0сбн  1пр ) x 7раз 1сбн ( 0сбн  1пр ) x 7раз 1сбн ( 0сбн  1пр ) x 7раз 1сбн ( 0сбн  1пр ) x 7раз 1сбн ( 0сбн  1пр ) x 7раз 1сбн  [90]\n6ряд)  (  1пр ) x 90раз [ 180 ]\n7ряд)  ( 0сбн  1пр ) x 35раз 1сбн ( 0сбн  1пр ) x 35раз 1сбн ( 0сбн  1пр ) x 35раз 1сбн ( 0сбн  1пр ) x 35раз 1сбн ( 0сбн  1пр ) x 35раз 1сбн  [355]\n', '', '', '', '', '', '', '', '', '', '', 1671394892),
(8, 1271331905, 'Олененок', 'olenenok1671400458', '1ряд) ... [ 6 ] \n2ряд)  (  1пр ) x 6раз [ 12 ]\n3ряд)  ( 1сбн 1пр ) x 6раз [ 18 ]\n4ряд)  ( 2сбн 1пр ) x 6раз [ 24 ]\n5ряд)  ( 3сбн 1пр ) x 6раз [ 30 ]\n6ряд)  ( 4сбн 1пр ) x 6раз [ 36 ]\n7ряд) ( 4сбн 1уб ) x 6раз [ 30 ]\n8ряд) ( 3сбн 1уб ) x 6раз [ 24 ]\n9ряд) ( 2сбн 1уб ) x 6раз [ 18 ]\n10ряд) ( 1сбн 1уб ) x 6раз [ 12 ]\n11ряд) ( 1уб ) x 6раз [ 6 ]\n', '6,12,18,24,30,36,30,24,18,12,6', '', '', '', '', '', '', '', '', '', 1671400458),
(9, 1955548311, 'Рот', 'rot1671403372', '1ряд) ... [ 6 ] \n2ряд)  (  2пр ) x 3раз [ 12 ]\n3ряд)  (  2пр ) x 6раз [ 24 ]\n4ряд)  ( 6ссн 2пр ) x 3раз [ 30 ]\n5ряд)  ( 8ссн 2пр ) x 3раз [ 36 ]\n', '6, 12, 24, 30, 36', '', '', '', '', '', '', '', '', '', 1671403372);

-- --------------------------------------------------------

--
-- Table structure for table `jilert32dwd_user`
--

CREATE TABLE `jilert32dwd_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `access_user` varchar(50) NOT NULL,
  `code_email` varchar(50) NOT NULL,
  `code` varchar(100) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jilert32dwd_user`
--

INSERT INTO `jilert32dwd_user` (`id`, `name`, `email`, `password`, `access_user`, `code_email`, `code`, `date`) VALUES
(1, 'gurkogao', 'gurkogao@yandex.ru', 'b59c67bf196a4758191e42f76670ceba', 'user', 'no', '', 1671274488),
(2, 'belka', 'belka@iwrite.run', 'b59c67bf196a4758191e42f76670ceba', 'user', 'no', '', 1671286112);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jilert32dwd_account`
--
ALTER TABLE `jilert32dwd_account`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `jilert32dwd_bloop`
--
ALTER TABLE `jilert32dwd_bloop`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `jilert32dwd_commentary`
--
ALTER TABLE `jilert32dwd_commentary`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `jilert32dwd_history`
--
ALTER TABLE `jilert32dwd_history`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `jilert32dwd_scheme`
--
ALTER TABLE `jilert32dwd_scheme`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `jilert32dwd_user`
--
ALTER TABLE `jilert32dwd_user`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jilert32dwd_account`
--
ALTER TABLE `jilert32dwd_account`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jilert32dwd_bloop`
--
ALTER TABLE `jilert32dwd_bloop`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jilert32dwd_commentary`
--
ALTER TABLE `jilert32dwd_commentary`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jilert32dwd_history`
--
ALTER TABLE `jilert32dwd_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `jilert32dwd_scheme`
--
ALTER TABLE `jilert32dwd_scheme`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jilert32dwd_user`
--
ALTER TABLE `jilert32dwd_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
