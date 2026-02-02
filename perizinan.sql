-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2026 at 02:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perizinan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE `izin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_santri` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `alamat_tujuan` varchar(255) NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `nama_penjemput` varchar(255) NOT NULL,
  `status_penjemput` varchar(255) NOT NULL,
  `status` enum('pending','diterima','ditolak','selesai') NOT NULL DEFAULT 'pending',
  `alasan_penolakan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keterangan_keterlambatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `izin`
--

INSERT INTO `izin` (`id`, `user_id`, `nama_santri`, `kelas`, `alamat_tujuan`, `alasan`, `tanggal_mulai`, `tanggal_selesai`, `nama_penjemput`, `status_penjemput`, `status`, `alasan_penolakan`, `created_at`, `updated_at`, `keterangan_keterlambatan`) VALUES
(1, 6, 'anton sanggggg', '10A/XA', 'kudang', 'sakit', '2025-10-10', '2025-10-25', 'asep', 'Orang Tua', 'selesai', NULL, '2025-10-26 22:41:55', '2025-10-26 22:42:54', 'Terlambat kembali ke pesantren 2 hari'),
(2, 6, 'anton san', '10A/XA', 'kudang', 'liburan', '2025-10-24', '2025-10-27', 'asep', 'Wali', 'selesai', NULL, '2025-10-26 22:42:29', '2025-10-26 22:42:58', 'Terlambat kembali ke pesantren 0 hari'),
(3, 6, 'anton san', '10A/XA', 'fvdfvf', 'fdvdvdf', '2025-10-24', '2025-10-27', 'asep', 'Orang Tua', 'selesai', NULL, '2025-10-26 22:54:09', '2025-10-26 22:55:05', 'Tepat waktu kembali ke pesantren'),
(4, 6, 'anton san', '10A/XA', 'tbt', 'btbtyht', '2025-10-24', '2025-10-26', 'asep', 'Orang Tua', 'selesai', NULL, '2025-10-26 22:54:36', '2025-10-26 22:55:10', 'Terlambat kembali ke pesantren -1 hari'),
(5, 6, 'anton san', '10A/XA', 'dscs', 'fsrferer', '2025-10-24', '2025-10-28', 'asep', 'Orang Tua', 'selesai', NULL, '2025-10-26 23:10:55', '2025-10-26 23:12:21', 'Tepat waktu kembali ke pesantren'),
(6, 6, 'anton san', '10A/XA', 'efsf', 'efefefefefefefefefefefefefefefefefs', '2025-10-24', '2025-10-28', 'asep', 'Orang Tua', 'ditolak', 'izin 2 x', '2025-10-26 23:11:15', '2025-10-26 23:11:43', NULL),
(7, 6, 'retno', '1A', 'berobat', 'berobat', '2025-12-08', '2025-12-08', 'asep', 'Orang Tua', 'selesai', NULL, '2025-12-08 05:59:30', '2025-12-08 06:08:14', 'Tepat waktu kembali ke pesantren'),
(8, 6, 'anton san', '10A/XA', 'kdang', 'sakit', '2026-01-20', '2026-01-21', 'asep', 'Orang Tua', 'selesai', NULL, '2026-01-21 05:18:03', '2026-01-21 06:05:57', 'Tepat waktu kembali ke pesantren'),
(9, 6, 'Faisal', 'XI A', 'Kudang', 'Sakit', '2026-01-22', '2026-01-23', 'Galuh putri', 'Orang Tua', 'diterima', NULL, '2026-01-21 06:05:28', '2026-01-21 06:06:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_18_054004_create_izin_table', 1),
(5, '2025_09_18_115946_add_two_factor_columns_to_users_table', 1),
(6, '2025_10_14_072737_add_penjemput_to_izin_table', 2),
(7, '2025_10_15_044812_add_alasan_penolakan_to_izin_table', 3),
(8, '2025_10_27_042913_alter_status_add_selesai_on_izin_table', 4),
(9, '2025_10_27_043712_add_keterangan_keterlambatan_to_izin_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DGl5f6q5oTJdKSJr7IbgehlppISffCyvn77r5ZO3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieTBWMWVuaWdydnhlZGVkQWtLM2NMT3laRWdYUVFPbG9rZW50bW1VVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1769000471),
('nvngnRMsoOAyd1PJYusNEZoNF90AFYSV8o84dgV9', NULL, '192.168.1.2', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWmhFNWhWRUxIN2ZnNzB0T1puaGNDME1Ja1MzSWcyUG90VHpWWTF0bCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xOTIuMTY4LjEuMjg6ODAwMC9sb2dpbiI7fX0=', 1769000981),
('nyyljPgXsYqh12OaLZPGk0Dnkr6SOKCsRgLiUVKZ', NULL, '192.168.1.28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibHNPREZLVkNKZlZsZlF3YVRha01sWTdMb1J1NEQzemROak92bzRDciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xOTIuMTY4LjEuMjg6ODAwMC9sb2dpbiI7fX0=', 1769000834);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `role` enum('orangtua','admin') NOT NULL DEFAULT 'orangtua',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'anisa hestiawati', 'anisya@gmail.com', NULL, '$2y$12$nM1oTnAhx8FHR.ehoPJih.awHpi.24FaVdn99FQ/cLj/VANmysVoK', NULL, NULL, NULL, 'orangtua', 'jix9yOwWEoLg58HunY2jTRNJHFg0llbvnBnYNSf5J9vwWtbxChTrJueSlbeL', '2025-10-06 20:34:13', '2025-10-06 20:34:13'),
(2, 'faisal egi', 'isalclown@gmail.com', NULL, '$2y$12$GDYfrijNBi3veh04vZD66uCPYsdmncODsN68GwhqfCe0m1s1WmRfG', NULL, NULL, NULL, 'orangtua', NULL, '2025-10-06 21:17:43', '2025-10-06 21:17:43'),
(5, 'Admin', 'admin@gmail.com', NULL, '$2y$12$AdJacw.s5fvTkxeSvZ74XeoxECPd7xV4imV6BXlrEqGSsKILjyUDm', NULL, NULL, NULL, 'admin', NULL, '2025-10-06 22:22:22', '2025-10-06 22:22:22'),
(6, 'Galuh putri', 'galuh@gmail.com', NULL, '$2y$12$eLQBpzuXTK/F0rLT4rw2ruLcCzdKMvBqnbCJ2vIYP8Ng60GXtAbiK', NULL, NULL, NULL, 'orangtua', NULL, '2025-10-14 01:53:05', '2025-10-14 01:53:05'),
(7, 'dadang darmawan', 'dadang@gmail.com', NULL, '$2y$12$HuQJ8V40qTPaRF06Pry2leNy8Kl0Vn0jdyDNA4pWn3CUvKY83n/f6', NULL, NULL, NULL, 'orangtua', NULL, '2025-10-26 20:34:43', '2025-10-26 20:34:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `izin_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `izin`
--
ALTER TABLE `izin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `izin`
--
ALTER TABLE `izin`
  ADD CONSTRAINT `izin_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
