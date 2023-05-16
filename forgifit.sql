-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 17, 2022 at 01:51 PM
-- Server version: 8.0.24
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forgifit`
--

-- --------------------------------------------------------

--
-- Table structure for table `jilert32dwd_account`
--

CREATE TABLE `jilert32dwd_account` (
  `id` int UNSIGNED NOT NULL,
  `verif_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nickname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_creation` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `jilert32dwd_bloop`
--

CREATE TABLE `jilert32dwd_bloop` (
  `id` int UNSIGNED NOT NULL,
  `verif_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name_article` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `text_article` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `reply` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tags` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `category` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `visible` int NOT NULL,
  `popular` int NOT NULL,
  `count_commentary` int NOT NULL,
  `date` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `jilert32dwd_commentary`
--

CREATE TABLE `jilert32dwd_commentary` (
  `id` int UNSIGNED NOT NULL,
  `id_article` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `levels` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nesting` int NOT NULL,
  `code` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_creation` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `jilert32dwd_history`
--

CREATE TABLE `jilert32dwd_history` (
  `id` int UNSIGNED NOT NULL,
  `id_user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `history` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `jilert32dwd_scheme`
--

CREATE TABLE `jilert32dwd_scheme` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `link` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `scheme` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `setting_a` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `setting_b` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `setting_c` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `setting_d` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `setting_e` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `setting_f` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `setting_g` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `setting_h` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `setting_o` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `setting_t` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date_creation` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `jilert32dwd_user`
--

CREATE TABLE `jilert32dwd_user` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `access_user` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `code_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `code` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jilert32dwd_bloop`
--
ALTER TABLE `jilert32dwd_bloop`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jilert32dwd_commentary`
--
ALTER TABLE `jilert32dwd_commentary`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jilert32dwd_history`
--
ALTER TABLE `jilert32dwd_history`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jilert32dwd_scheme`
--
ALTER TABLE `jilert32dwd_scheme`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jilert32dwd_user`
--
ALTER TABLE `jilert32dwd_user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
