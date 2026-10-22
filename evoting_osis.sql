-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Okt 2026 pada 03.32
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evoting_osis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dpts`
--

CREATE TABLE `dpts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status_pilih` tinyint(1) NOT NULL DEFAULT 0,
  `waktu_memilih` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dpts`
--

INSERT INTO `dpts` (`id`, `nisn`, `nama`, `kelas`, `username`, `token`, `status_pilih`, `waktu_memilih`, `created_at`, `updated_at`) VALUES
(1, '9283544524', 'Saul Trantow DDS', 'XI IPS 2', 'vkautzer', 'GWK6MB', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(2, '4936502110', 'Celine Robel', 'XII RPL 1', 'bayer.zella', 'NYVMZL', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(3, '1101487011', 'Lelah Medhurst', 'XI IPS 2', 'brain40', 'IBVHCO', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(4, '4825865743', 'Jerrod Goyette', 'XI IPS 2', 'tina.littel', 'YFEJJS', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(5, '3852165277', 'Kaitlin White', 'XII RPL 1', 'shyann26', 'BDJFTH', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(6, '9186731611', 'Jayne Klein', 'XII RPL 1', 'emerald.gorczany', '8NDF0Z', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(7, '9705125447', 'Dr. Terrill Zieme V', 'X MIPA 1', 'yschowalter', '11XQNJ', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(8, '6431110061', 'Braulio Moore', 'XI IPS 2', 'cole.christiansen', 'IJ66EC', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(9, '9708667193', 'Prof. Dariana Lowe', 'XI IPS 2', 'schulist.tremayne', 'AUNS4Y', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(10, '5017210814', 'Raven Hand', 'X MIPA 1', 'burnice96', 'TMFTLG', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(11, '8912607091', 'Cortez Doyle', 'XII RPL 1', 'bernhard.chandler', 'ZHQ4SX', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(12, '4195862771', 'Judson Schulist DDS', 'XII RPL 1', 'tkautzer', 'K6XFWG', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(13, '4537894193', 'Casimer Jast', 'XII RPL 1', 'rudolph68', 'FWL4WD', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(14, '9887293650', 'Ms. Celia Hessel I', 'X MIPA 1', 'aurelio84', 'YVNQF4', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(15, '0512168750', 'Else Baumbach', 'XII RPL 1', 'danielle.corwin', '0UMCU6', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(16, '2257839490', 'Robyn Altenwerth', 'X MIPA 1', 'lafayette.lebsack', 'FCJJJ7', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(17, '9976162438', 'Zoie Nader', 'XI IPS 2', 'sortiz', 'STWJMW', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(18, '9251053197', 'Iva Hane III', 'XII RPL 1', 'chelsie.erdman', 'CQRW8M', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(19, '2052882415', 'Avis Smitham', 'XI IPS 2', 'ila.labadie', 'KTQJMC', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(20, '8720932076', 'Mr. Elvis Ziemann PhD', 'XI IPS 2', 'carli.hackett', 'AJYNCJ', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(21, '0804251004', 'Dr. Kari Schmeler', 'XII RPL 1', 'gkunde', '1QUS7A', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(22, '5755238940', 'Miss Catharine Bernhard', 'XI IPS 2', 'victor07', 'I9GVTS', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(23, '6468940531', 'Jason Mosciski', 'X MIPA 1', 'shyanne.runolfsdottir', 'AKVFGJ', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(24, '2036412221', 'Mr. Easter Gaylord DVM', 'XII RPL 1', 'dante.lowe', 'K5JUUC', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(25, '5126627018', 'Johan Zulauf', 'XI IPS 2', 'kuphal.marcelle', 'LXSY0F', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(26, '3235376600', 'Moriah Donnelly', 'X MIPA 1', 'zrath', 'KQUFSI', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(27, '9550493905', 'Hollis Purdy', 'XI IPS 2', 'bgrimes', 'M1XV2I', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(28, '9632501673', 'Ruthie Gibson IV', 'XI IPS 2', 'josue62', 'DMM3U1', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(29, '6073363506', 'Kyler Jacobson II', 'XII RPL 1', 'vanessa.ankunding', 'ORRDJV', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(30, '2688206365', 'Belle Shields', 'XI IPS 2', 'mrussel', 'JQ6GUF', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(31, '2459879322', 'Mr. Ole Sauer V', 'XI IPS 2', 'annette.doyle', 'BAOEWP', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(32, '2488808932', 'Ismael Braun', 'XII RPL 1', 'dimitri.koelpin', 'CAH1JM', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(33, '5563556872', 'Hoyt Hickle', 'XI IPS 2', 'andre.nader', 'NVX94S', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(34, '8533400379', 'Prof. Blanca Prosacco DDS', 'X MIPA 1', 'fcronin', 'SP6LMC', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(35, '4080165826', 'Dorothea Krajcik V', 'X MIPA 1', 'abbie80', 'G0WOLY', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(36, '3419742015', 'Eino Roob', 'XI IPS 2', 'maureen67', 'HIK9XW', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(37, '2974204999', 'Jorge Gutkowski', 'X MIPA 1', 'koch.royce', 'OJKP58', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(38, '6616150593', 'Jeremie Hill', 'X MIPA 1', 'kade.jast', '8OGVJA', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(39, '4927933640', 'Holden Sanford', 'XII RPL 1', 'hbalistreri', 'CPVNMM', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(40, '8628578485', 'Justice Ratke DVM', 'X MIPA 1', 'uwintheiser', 'PZD1IN', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(41, '0650677565', 'Prof. Carole Kreiger', 'XII RPL 1', 'gokeefe', 'DVADEP', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(42, '8537226567', 'Rolando Ledner', 'XI IPS 2', 'broderick54', 'IHMQZA', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(43, '3696247620', 'Carson Lindgren Jr.', 'XII RPL 1', 'oruecker', 'OG6C6M', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(44, '7406412525', 'Selina Spencer', 'XI IPS 2', 'isom.fahey', '7MFJA7', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(45, '1612113334', 'Susanna Harris', 'XI IPS 2', 'federico.huel', 'ZEW58O', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(46, '8912574647', 'Berta Herman DDS', 'XII RPL 1', 'glubowitz', 'PO6DJ2', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(47, '5372530280', 'Miss Alva Jaskolski Jr.', 'XII RPL 1', 'alysa.kunde', 'F9OOP6', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(48, '8382782951', 'Deron Terry', 'XII RPL 1', 'renner.natasha', 'NRAVC3', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(49, '9534191390', 'Dedric Fahey', 'XII RPL 1', 'ryley.parker', 'OWYY5T', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(50, '2414900548', 'Jackeline Wisozk', 'X MIPA 1', 'blanda.malvina', 'TNTKX3', 0, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_09_24_035401_create_paslons_table', 1),
(5, '2026_09_24_035645_create_dpts_table', 1),
(6, '2026_09_24_040012_create_votes_table', 1),
(7, '2026_09_24_053545_add_menu_access_to_users_table', 1),
(8, '2026_09_24_063535_create_settings_table', 1),
(9, '2026_09_24_085010_add_landing_content_to_settings_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paslons`
--

CREATE TABLE `paslons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_urut` int(11) NOT NULL,
  `nama_ketua` varchar(255) NOT NULL,
  `nama_wakil` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `paslons`
--

INSERT INTO `paslons` (`id`, `nomor_urut`, `nama_ketua`, `nama_wakil`, `foto`, `visi`, `misi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ahmad Fikri', 'Siti Aminah', NULL, 'Mewujudkan OSIS yang Kreatif dan Inovatif.', '1. Mengadakan pensi rutin. 2. Mendukung e-sport sekolah.', '2026-09-24 02:04:12', '2026-09-24 02:04:12'),
(2, 2, 'Budi Santoso', 'Rina Melati', NULL, 'OSIS sebagai wadah aspirasi siswa yang berakhlak mulia.', '1. Program jumat bersih. 2. Lomba cerdas cermat antar kelas.', '2026-09-24 02:04:12', '2026-09-24 02:04:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('JOhwO4ieClSzU4NYmZqGPcPDK9TjRP3bHfsKshKj', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUUNDclpocEpURTlpZVBMN1VFSm9SU29GTTNPMlQ1NTJVOGhMdExlSyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc5MDMwMzY0MDt9fQ==', 1790304308);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `nama_kepsek` varchar(255) DEFAULT NULL,
  `nip_kepsek` varchar(255) DEFAULT NULL,
  `nama_pembina` varchar(255) DEFAULT NULL,
  `nip_pembina` varchar(255) DEFAULT NULL,
  `nama_ketua` varchar(255) DEFAULT NULL,
  `nisn_ketua` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sambutan_judul` text DEFAULT NULL,
  `sambutan_deskripsi` text DEFAULT NULL,
  `tata_cara` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `nama_sekolah`, `alamat`, `kontak`, `nama_kepsek`, `nip_kepsek`, `nama_pembina`, `nip_pembina`, `nama_ketua`, `nisn_ketua`, `created_at`, `updated_at`, `sambutan_judul`, `sambutan_deskripsi`, `tata_cara`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-09-24 02:04:35', '2026-09-24 02:04:35', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('superadmin','operator') NOT NULL DEFAULT 'operator',
  `menu_access` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`menu_access`)),
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `menu_access`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', '$2y$12$VrsKMqlMk6bJggTWmRaGCOSZAtbCf97Z0sfg4FzallxLqJSRo3hUa', 'superadmin', NULL, NULL, '2026-09-24 02:04:11', '2026-09-24 19:34:51'),
(2, 'Panitia Meja 1', 'panitia1', '$2y$12$G1EZcaqALXeMj7AfUL8hA.wj6Mnl5nfZdu8OJ9EE1kXZx2ScLnEKy', 'operator', NULL, NULL, '2026-09-24 02:04:12', '2026-09-24 02:04:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `votes`
--

CREATE TABLE `votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paslon_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `dpts`
--
ALTER TABLE `dpts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dpts_nisn_unique` (`nisn`),
  ADD UNIQUE KEY `dpts_username_unique` (`username`),
  ADD UNIQUE KEY `dpts_token_unique` (`token`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paslons`
--
ALTER TABLE `paslons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `paslons_nomor_urut_unique` (`nomor_urut`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indeks untuk tabel `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `votes_paslon_id_foreign` (`paslon_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dpts`
--
ALTER TABLE `dpts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `paslons`
--
ALTER TABLE `paslons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `votes`
--
ALTER TABLE `votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_paslon_id_foreign` FOREIGN KEY (`paslon_id`) REFERENCES `paslons` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
