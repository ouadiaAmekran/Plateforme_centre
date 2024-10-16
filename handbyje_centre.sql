-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 28, 2024 at 02:03 PM
-- Server version: 8.0.39-cll-lve
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `handbyje_centre`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int NOT NULL,
  `nomprenom` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `nomprenom`, `email`, `username`, `password`) VALUES
(7, 'CHAYMAE', 'elfahssichaymae27@gmail.com', 'Admin', '$2y$10$zWODN87ao3zG0g7iN84dMuIPnblHP.kp/ODUjJchYzxlXSkl/73Ju');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `expires_at`, `created_at`) VALUES
(35, 'elfahssichaymae27@gmail.com', '0bfb8e21c28b0546040004d66e7bdce4145efaf049f89c09045f41fec1cc886d59a866a7c604cc75432313bd040330892356', '2024-07-28 00:21:31', '2024-07-27 23:21:31'),
(36, 'elfahssichaymae27@gmail.com', 'c1ef12241a7dfd4b0488709b0506f2dd7a764d71604770838f95c9ebb5231f818da3ed6289de879d44a407a3d5c37f237a9c', '2024-07-28 00:21:40', '2024-07-27 23:21:40'),
(37, 'elfahssichaymae27@gmail.com', '2d57924fc6ceaef9b26e3f2f0a5a365860a851a29bf28a9140964c01d2797d3c19da7822749c6a60d9c6e38614d60bcd7706', '2024-07-28 00:23:42', '2024-07-27 23:23:42'),
(38, 'elfahssichaymae27@gmail.com', '3c2a7f23321bb208359b5fd4e35517842552be741ed8fda8ee537965a326fbabc8206cf9c0cd728194c2078f89e726145efc', '2024-07-28 00:23:53', '2024-07-27 23:23:53'),
(39, 'elfahssichaymae27@gmail.com', '53d49c3728108e22763ec2cc2769829bec10409fe69d1017bee878f5f78c591dad713e0ce7b1927e1bc7ac9d17f4a9d35a6b', '2024-07-28 00:24:16', '2024-07-27 23:24:16'),
(40, 'elfahssichaymae27@gmail.com', '21d7643ef1601cbc87c031540081a6448b12b85afa9188fcf1501f575a9ab72b11f0586dbfebc2ff4f24b6e13180bc4e85e4', '2024-07-28 00:25:40', '2024-07-27 23:25:40'),
(41, 'elfahssichaymae27@gmail.com', '8c8ae133cae18ed09bc39e73f8b071c9ecae170736a1ce7168a30fee8a5e547950d69245b9d80e0d8d5d50f6581508d41851', '2024-07-28 00:31:10', '2024-07-27 23:31:10'),
(42, 'elfahssichaymae27@gmail.com', '09531ba06aa7d662ffa14acb10ffe217290ea4d1684e571710656f01f47f08d64aed179dab6e139b4021e7b9a1757ab445d0', '2024-07-28 00:35:10', '2024-07-27 23:35:10'),
(43, 'elfahssichaymae27@gmail.com', 'a59ab65f0a99d33b9be2d02f10c93de043c527c6172ecc7588196c933de2118b0767c2c4e14cbf6955b958f1e400e44a156c', '2024-07-28 00:35:16', '2024-07-27 23:35:16'),
(44, 'elfahssichaymae27@gmail.com', '360752d934682f1376f7045264132ecb7f8ffc255aa039d26b4d6fbc529d3fae8db10e6ef450e9723b94a921eb6d260d50ca', '2024-07-28 00:36:54', '2024-07-27 23:36:54'),
(45, 'elfahssichaymae27@gmail.com', '1e5b355de31406ed2cf0bb60e102eda0d97dbecb95ae20ec5a083ad523a1d7d2b632bbab136cdd065b604c736c89a6073398', '2024-07-28 00:39:17', '2024-07-27 23:39:17'),
(46, 'elfahssichaymae27@gmail.com', '950e8275ac8107e806369b90a754209db5fd88ee42ecbdeba9a05a784849af7dafeb0bcecdb22b4f4286f282f4a13c58ab68', '2024-07-28 13:06:01', '2024-07-28 12:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `nemuro_certificate` int(5) UNSIGNED ZEROFILL NOT NULL,
  `nomprenom` varchar(80) DEFAULT NULL,
  `numero_etud` int NOT NULL,
  `formation` varchar(50) NOT NULL,
  `date_naissance` datetime DEFAULT NULL,
  `date_obtention` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`nemuro_certificate`, `nomprenom`, `numero_etud`, `formation`, `date_naissance`, `date_obtention`) VALUES
(91864, 'ili', 6476, 'jhdfjkhjj', '2024-07-07 00:00:00', '2024-07-19 00:00:00'),
(91862, 'sara', 4444, 'analuze', '2024-07-14 00:00:00', '2024-08-05 00:00:00'),
(91865, 'Ahmed', 934, 'Développement Web', '2001-03-12 00:00:00', '2023-12-12 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`nemuro_certificate`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `nemuro_certificate` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91867;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
