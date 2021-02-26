-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2021 at 11:33 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tesit`
--

-- --------------------------------------------------------

--
-- Table structure for table `bmutasis`
--

CREATE TABLE IF NOT EXISTS `bmutasis` (
`id` int(10) unsigned NOT NULL,
  `kode_id` int(10) unsigned NOT NULL,
  `tgl` date NOT NULL,
  `nobukti` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `indikator` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bmutasis`
--

INSERT INTO `bmutasis` (`id`, `kode_id`, `tgl`, `nobukti`, `indikator`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 1, '2021-02-25', '123456', 'OUT', '2', '2021-02-25 02:08:14', '2021-02-25 02:08:14'),
(3, 1, '2021-02-25', '12345678', 'IN', '3', '2021-02-25 02:08:57', '2021-02-25 02:08:57'),
(4, 2, '2021-02-25', '2345', 'IN', '4', '2021-02-25 02:10:09', '2021-02-25 02:10:09'),
(5, 1, '2021-02-27', '5678', 'OUT', '5', '2021-02-25 06:18:31', '2021-02-25 06:18:31'),
(10, 2, '2021-02-19', '5555', 'OUT', '4', '2021-02-26 02:23:31', '2021-02-26 02:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `datas`
--

CREATE TABLE IF NOT EXISTS `datas` (
`id` int(10) unsigned NOT NULL,
  `kode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `namabarang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `datas`
--

INSERT INTO `datas` (`id`, `kode`, `namabarang`, `created_at`, `updated_at`) VALUES
(1, '001', 'mejas', '2021-02-24 09:13:48', '2021-02-26 03:25:03'),
(2, '002', 'kursi', '2021-02-25 02:09:48', '2021-02-25 02:09:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2021_02_21_104900_create_mutasi_table', 1),
('2021_02_21_112038_create_datas_table', 2),
('2021_02_21_120428_create_bmutasis_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bmutasis`
--
ALTER TABLE `bmutasis`
 ADD PRIMARY KEY (`id`), ADD KEY `bmutasis_kode_id_foreign` (`kode_id`);

--
-- Indexes for table `datas`
--
ALTER TABLE `datas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bmutasis`
--
ALTER TABLE `bmutasis`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `datas`
--
ALTER TABLE `datas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bmutasis`
--
ALTER TABLE `bmutasis`
ADD CONSTRAINT `bmutasis_kode_id_foreign` FOREIGN KEY (`kode_id`) REFERENCES `datas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
