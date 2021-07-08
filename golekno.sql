-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 09:54 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `golekno`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `idakun` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaakun` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenisakun` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`idakun`, `email`, `namaakun`, `password`, `jenisakun`) VALUES
(1, 'admin@argon.com', 'Admin Admin', '$2y$10$rIyqJSQ431FfxoZvYY6C..zmTA5mRmI65vmkBWYuYoF6Mu8X0upAG', 1),
(2, 'user@user.com', 'User', '$2y$10$pwoJsm7fnTIwyEoVonmq9.xmkLnXJl/RRk3tloZu.r3k76GPW2PSq', 0);

-- --------------------------------------------------------

--
-- Table structure for table `arsippos`
--

CREATE TABLE `arsippos` (
  `idarsip` bigint(20) UNSIGNED NOT NULL,
  `idpos` bigint(20) UNSIGNED NOT NULL,
  `idakun` bigint(20) UNSIGNED NOT NULL,
  `flagcounter` int(11) NOT NULL,
  `tipepos` tinyint(1) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) NOT NULL,
  `umur` int(11) NOT NULL,
  `tinggibadan` int(11) NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `tempat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statuspos` tinyint(4) NOT NULL,
  `tanggalselesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookmarkpos`
--

CREATE TABLE `bookmarkpos` (
  `idpos` bigint(20) UNSIGNED NOT NULL,
  `idakun` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flagpos`
--

CREATE TABLE `flagpos` (
  `idflag` bigint(20) UNSIGNED NOT NULL,
  `idpos` bigint(20) UNSIGNED NOT NULL,
  `idakun` bigint(20) UNSIGNED NOT NULL,
  `alasan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporhilang`
--

CREATE TABLE `laporhilang` (
  `idlapor` bigint(20) UNSIGNED NOT NULL,
  `idpos` bigint(20) UNSIGNED NOT NULL,
  `idakun` bigint(20) UNSIGNED NOT NULL,
  `kontak` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatpenemuan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsipenemuan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_05_28_145250_create_akun_table', 1),
(2, '2021_05_28_150055_create_pos_table', 1),
(3, '2021_05_28_151926_create_laporhilang_table', 1),
(4, '2021_05_28_152337_create_flagpos_table', 1),
(5, '2021_05_28_152655_create_bookmarkpos_table', 1),
(6, '2021_06_06_101145_create_arsippos_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `idpos` bigint(20) UNSIGNED NOT NULL,
  `idakun` bigint(20) UNSIGNED NOT NULL,
  `flagcounter` int(11) NOT NULL,
  `tipepos` tinyint(1) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) NOT NULL,
  `umur` int(11) NOT NULL,
  `tinggibadan` int(11) NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `tempat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statuspos` tinyint(4) NOT NULL,
  `tanggalselesai` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos`
--

INSERT INTO `pos` (`idpos`, `idakun`, `flagcounter`, `tipepos`, `foto`, `gender`, `umur`, `tinggibadan`, `deskripsi`, `kontak`, `nama`, `tanggal`, `tempat`, `statuspos`, `tanggalselesai`, `created_at`, `updated_at`) VALUES
(1, 2, 0, 1, '1625730661_693707.png', 1, 12, 123, 'komunita orang sepi', '12345667', 'komunita', '2021-08-07', 'discord', 0, NULL, '2021-07-08 00:51:01', '2021-07-08 00:51:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`idakun`),
  ADD UNIQUE KEY `akun_email_unique` (`email`);

--
-- Indexes for table `arsippos`
--
ALTER TABLE `arsippos`
  ADD PRIMARY KEY (`idarsip`),
  ADD KEY `arsippos_idpos_foreign` (`idpos`),
  ADD KEY `arsippos_idakun_foreign` (`idakun`);

--
-- Indexes for table `bookmarkpos`
--
ALTER TABLE `bookmarkpos`
  ADD KEY `bookmarkpos_idpos_foreign` (`idpos`),
  ADD KEY `bookmarkpos_idakun_foreign` (`idakun`);

--
-- Indexes for table `flagpos`
--
ALTER TABLE `flagpos`
  ADD PRIMARY KEY (`idflag`),
  ADD KEY `flagpos_idpos_foreign` (`idpos`),
  ADD KEY `flagpos_idakun_foreign` (`idakun`);

--
-- Indexes for table `laporhilang`
--
ALTER TABLE `laporhilang`
  ADD PRIMARY KEY (`idlapor`),
  ADD KEY `laporhilang_idpos_foreign` (`idpos`),
  ADD KEY `laporhilang_idakun_foreign` (`idakun`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`idpos`),
  ADD KEY `pos_idakun_foreign` (`idakun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `idakun` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `arsippos`
--
ALTER TABLE `arsippos`
  MODIFY `idarsip` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flagpos`
--
ALTER TABLE `flagpos`
  MODIFY `idflag` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporhilang`
--
ALTER TABLE `laporhilang`
  MODIFY `idlapor` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `idpos` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arsippos`
--
ALTER TABLE `arsippos`
  ADD CONSTRAINT `arsippos_idakun_foreign` FOREIGN KEY (`idakun`) REFERENCES `akun` (`idakun`),
  ADD CONSTRAINT `arsippos_idpos_foreign` FOREIGN KEY (`idpos`) REFERENCES `pos` (`idpos`);

--
-- Constraints for table `bookmarkpos`
--
ALTER TABLE `bookmarkpos`
  ADD CONSTRAINT `bookmarkpos_idakun_foreign` FOREIGN KEY (`idakun`) REFERENCES `akun` (`idakun`),
  ADD CONSTRAINT `bookmarkpos_idpos_foreign` FOREIGN KEY (`idpos`) REFERENCES `pos` (`idpos`);

--
-- Constraints for table `flagpos`
--
ALTER TABLE `flagpos`
  ADD CONSTRAINT `flagpos_idakun_foreign` FOREIGN KEY (`idakun`) REFERENCES `akun` (`idakun`),
  ADD CONSTRAINT `flagpos_idpos_foreign` FOREIGN KEY (`idpos`) REFERENCES `pos` (`idpos`);

--
-- Constraints for table `laporhilang`
--
ALTER TABLE `laporhilang`
  ADD CONSTRAINT `laporhilang_idakun_foreign` FOREIGN KEY (`idakun`) REFERENCES `akun` (`idakun`),
  ADD CONSTRAINT `laporhilang_idpos_foreign` FOREIGN KEY (`idpos`) REFERENCES `pos` (`idpos`);

--
-- Constraints for table `pos`
--
ALTER TABLE `pos`
  ADD CONSTRAINT `pos_idakun_foreign` FOREIGN KEY (`idakun`) REFERENCES `akun` (`idakun`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
