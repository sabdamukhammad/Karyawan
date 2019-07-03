-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 02 Jul 2019 pada 06.42
-- Versi server: 5.7.24
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar_laravel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog_tbl`
--

DROP TABLE IF EXISTS `blog_tbl`;
CREATE TABLE IF NOT EXISTS `blog_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isiberita` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `blog_tbl`
--

INSERT INTO `blog_tbl` (`id`, `judul`, `isiberita`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Turun di Stasiun MRT ASEAN', 'Jakarta - Di dekat stasiun MRT ASEAN, banyak restoran kekinian yang menawarkan berbagai makanan dan ada beberapa restoran enak yang wajib dicoba.\r\n1. Roti Bakar Eddy\r\n2. Yoisho Ramen', 'foto/20190628145709.png', '2019-06-27 10:00:00', '2019-06-28 00:57:09'),
(9, 'KAmpret kalah', 'awkwkwkwkwk', 'foto/20190702064022.png', '2019-07-01 23:40:22', '2019-07-01 23:40:22'),
(8, 'ini judul berita', 'ini isi berita', 'foto/20190702044809.jpg', '2019-07-01 21:48:09', '2019-07-01 21:48:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawans`
--

DROP TABLE IF EXISTS `karyawans`;
CREATE TABLE IF NOT EXISTS `karyawans` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_birth` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `karyawans_id_unique` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `karyawans`
--

INSERT INTO `karyawans` (`id`, `name`, `gender`, `position`, `place_of_birth`, `date_of_birth`, `address`, `filename`, `created_at`, `updated_at`) VALUES
(3, 'dbandsb', 'Male', 'sadbnasb', 'nsndn', '1998-01-01', 'tegal', '1562049424.png', '2019-07-01 23:36:39', '2019-07-01 23:37:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_28_110021_create_blogs_table', 1),
(4, '2019_06_28_110040_create_karyawans_table', 1),
(5, '2019_06_29_015637_add_column_username_on_table_users', 2),
(6, '2019_06_29_015833_add_unique_username_on_table_users', 3),
(7, '2019_07_02_041225_create_table_blog', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` text COLLATE utf8mb4_unicode_ci,
  `level` enum('admin','operator') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_id_unique` (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `filename`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'usersss', 'user', 'user@mail.com', NULL, '$2y$10$jjvPNzGLxOgh4IjhGKQxFeb/aKrhDcPL1z07poYksYxBiwdAWXtLG', '1561774386.png', 'admin', NULL, NULL, '2019-06-28 19:13:06'),
(9, 'helfanza nanda alfara', 'helfanza', 'users@mail.com', NULL, '$2y$10$4pbrYr4ItIH/deuXSnwQ1.YXdEOlF5oy.oyRfZHQT6r6Jp/D/xq8e', '1561774175.png', 'admin', '$2y$10$wiC7nFhoRUaxZGD8R8Kzt.NfnRLfb2hqeqeumRb8kxAZFukoEhfbi', '2019-06-28 19:09:35', '2019-06-28 19:29:39'),
(10, 'elon musk', 'elonmusk', 'musk@email.com', NULL, '$2y$10$PD9V/iTMTbCw3q9iqM7WHO3IwolllrxntB/2JPDNJy3.DuKsHl5sW', '1562048978.png', 'admin', '$2y$10$VMUCNILs64uS6EHt1Wj4LOZo90jAcC3Bo1JuntrmpHjvgYFIYqjoi', '2019-07-01 23:29:38', '2019-07-01 23:29:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
