-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: docker-yml_db_1:3306
-- Waktu pembuatan: 05 Jul 2022 pada 00.18
-- Versi server: 10.6.5-MariaDB-1:10.6.5+maria~focal
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_tahfiz`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_level_id` int(11) NOT NULL,
  `admin_status` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `admin_foto` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kelas_kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_tingkat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas_kode`, `kelas_nama`, `kelas_tingkat`, `created_at`, `updated_at`) VALUES
(1, 'WHDA', 'Wahid A', 1, '2022-06-20 11:42:03', '2022-06-23 06:23:59'),
(2, 'WHDB', 'Wahid B', 1, '2022-06-20 11:42:17', '2022-06-20 11:42:22'),
(3, 'WHDC', 'Wahid C', 1, '2022-06-20 11:42:27', '2022-06-20 11:42:30'),
(4, 'SNIA', 'Sani A', 2, '2022-06-20 11:42:32', '2022-06-20 11:42:35'),
(5, 'SNIB', 'Sani B', 2, '2022-06-20 11:42:37', '2022-06-20 11:42:40'),
(6, 'SNIC', 'Sani C', 2, '2022-06-20 11:42:44', '2022-06-20 11:42:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_06_13_134201_create_user_level', 2),
(4, '2022_06_13_134715_create_tahun_ajaran', 2),
(5, '2022_06_13_134742_create_santri', 2),
(6, '2022_06_13_135009_create_kelas', 2),
(7, '2022_06_13_135515_create_program_tahfidz', 2),
(8, '2022_06_13_135840_create_admin', 2),
(9, '2022_06_13_142725_create_set_kelas', 2),
(10, '2022_06_13_145400_add_admin_nama_to_admin_table', 3),
(11, '2022_06_13_145531_add_admin_nama_to_admin_table', 3),
(12, '2022_06_13_152953_alter_users', 4),
(13, '2022_06_19_121745_create_presensi', 5),
(14, '2022_06_20_154320_create_pengajar', 6),
(15, '2022_06_18_151623_create_tahfid', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajar`
--

CREATE TABLE `pengajar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'laki-laki',
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_lengkap` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengajar`
--

INSERT INTO `pengajar` (`id`, `user_id`, `kelas_id`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `tempat_lahir`, `alamat_lengkap`, `created_at`, `updated_at`) VALUES
(1, 23, 1, 'Ustad harun', 'laki-laki', '2022-06-08', 'Jogjakarta', 'jogjakarta', NULL, NULL),
(3, 27, 3, 'Ustad Badrudin', 'laki-laki', '2022-06-08', 'tasikmalaya', 'Tasikmalaya, pangcategah', '2022-06-30 15:36:23', '2022-06-30 15:36:23'),
(4, 34, 2, 'danu', 'laki-laki', '2022-07-04', 'tasikmalaya', 'adasd', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `pengajar_id` int(11) DEFAULT NULL,
  `kehadiran` enum('Hadir','Alpha','Izin','Sakit') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id`, `tanggal`, `pengajar_id`, `kehadiran`, `keterangan`, `created_at`, `updated_at`) VALUES
(17, '2022-06-07 00:00:00', 1, 'Alpha', 'asd', NULL, NULL),
(18, '2022-06-22 00:00:00', 2, 'Izin', NULL, NULL, NULL),
(19, '2022-07-06 00:00:00', 1, 'Izin', 'asdsad', '2022-07-03 05:16:46', '2022-07-03 05:16:46'),
(20, '2022-07-14 00:00:00', 2, 'Izin', 'asdasd', '2022-07-03 05:17:04', '2022-07-03 05:17:04'),
(21, '2022-07-14 00:00:00', NULL, 'Izin', 'asdasd', '2022-07-03 05:21:24', '2022-07-03 05:21:24'),
(22, '2022-07-12 00:00:00', 3, 'Izin', 'asd', NULL, NULL),
(23, '2022-07-20 00:00:00', 3, 'Alpha', 'asdad', NULL, NULL),
(24, '2022-07-12 00:00:00', 3, 'Hadir', 'asd', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_tahfidz`
--

CREATE TABLE `program_tahfidz` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_durasi` int(11) NOT NULL,
  `program_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `program_tahfidz`
--

INSERT INTO `program_tahfidz` (`id`, `program_nama`, `program_kode`, `program_durasi`, `program_satuan`, `created_at`, `updated_at`) VALUES
(1, 'Program 1 Tahun', '123', 1, 'Y', '2022-06-20 23:57:36', '2022-06-20 23:57:36'),
(2, 'Program 1,5 Tahun', '123', 18, 'M', '2022-06-21 00:00:00', '2022-06-21 00:00:03'),
(3, 'Program 3 Tahun', '1234', 3, 'Y', '2022-06-20 23:59:16', '2022-06-20 23:59:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `santri`
--

CREATE TABLE `santri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'laki-laki',
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_lengkap` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenjang_sekolah` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp_ayah` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profil_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_daftar` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `santri`
--

INSERT INTO `santri` (`id`, `user_id`, `kelas_id`, `nama_lengkap`, `program_id`, `jenis_kelamin`, `tanggal_lahir`, `tempat_lahir`, `alamat_lengkap`, `jenjang_sekolah`, `nama_ibu`, `nama_ayah`, `no_telp_ayah`, `status`, `profil_img`, `tanggal_daftar`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 'Ado Setiawan', 3, 'laki-laki', '2022-06-21', 'Tasikmalaya', 'Jl. Raya Panggang Wonosari No.Km 22, RW.05, Kepek, Sapto Sari, Gunung Kidul Regency, Special Region of Yogyakarta 55871\r\nJl. Raya Panggang Wonosari No.Km 22, RW.05, Kepek, Sapto Sari, Gunung Kidul Regency, Special Region of Yogyakarta 55871', 'MA', 'Ibu', 'Bapa', '85320059821', 'Aktif', NULL, '2022-07-03', NULL, NULL),
(5, 12, 2, 'Rohmat', 2, 'laki-laki', '2022-06-21', 'Jogjakarta', 'Jl. Raya Panggang Wonosari No.Km 22, RW.05, Kepek, Sapto Sari, Gunung Kidul Regency, Special Region of Yogyakarta 55871\r\nJl. Raya Panggang Wonosari No.Km 22, RW.05, Kepek, Sapto Sari, Gunung Kidul Regency, Special Region of Yogyakarta 55871', 'MTS', 'Thilal Ghanim', 'Thilal Ghanim', '082138249068', 'Aktif', NULL, '2022-07-04', NULL, NULL),
(6, 23, 2, 'Farhan', 2, 'laki-laki', '2022-06-27', 'jogjakarta', 'Jogjakarta', 'MTS', 'Ibu', 'Ayah', '85320059821', 'Aktif', NULL, '2022-07-04', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_kelas`
--

CREATE TABLE `set_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `set_kelas_id` int(11) NOT NULL,
  `set_user_id` int(11) NOT NULL,
  `set_tahun_id` int(11) NOT NULL,
  `set_smester` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahfid`
--

CREATE TABLE `tahfid` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `santri_id` int(255) DEFAULT NULL,
  `kehadiran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jml_halaman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skor_hafalan` int(11) DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tahfid`
--

INSERT INTO `tahfid` (`id`, `santri_id`, `kehadiran`, `kategori`, `jml_halaman`, `skor_hafalan`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 3, 'Hadir', 'Setoran', '1', 1, '2022-06-21 07:30:51', '2022-06-20 23:54:01', '2022-06-20 23:54:01'),
(2, 5, 'Hadir', 'Setoran', '3', 3, '2022-06-21 07:30:54', '2022-06-21 07:27:17', NULL),
(3, 5, 'Hadir', 'Setoran', '1', 1, '2022-06-21 07:30:57', '2022-06-21 07:27:20', NULL),
(7, 5, 'Izin', 'Mengulang', '1', 1, '2022-06-21 07:31:00', '2022-06-21 07:27:23', NULL),
(9, 5, 'Alpha', 'Setoran', '1', 1, '2022-06-21 07:31:03', '2022-06-20 17:48:14', '2022-06-20 17:48:14'),
(11, 3, 'Hadir', 'Setoran', '2', 2, '2022-06-21 14:25:55', '2022-06-21 14:25:55', '2022-06-21 14:25:55'),
(12, 3, 'Hadir', 'Setoran', '1', 1, '2022-06-23 06:32:41', '2022-06-23 06:32:41', '2022-06-23 06:32:41'),
(14, 3, 'Hadir', 'Mengulang', '3', 3, '2022-06-26 23:36:53', '2022-06-26 23:36:53', '2022-06-26 23:36:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` year(4) NOT NULL,
  `status` int(11) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `level`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ado', '$2y$10$hgw0UoYGHOcZYpKruvsZxOvgqBA0YGUw2lNX3UY6i62ypkh2JXuhi', 'asdasdasd@gmail.ox', 'admin', NULL, NULL, NULL, '2022-06-26 07:42:04'),
(12, 'ipul', '$2y$10$PfD7SjKNpwYK6LjThhoEaO/r/sDvZWz/8cz9u2bnrvZoi5sqGiB1a', 'ipul@gmail.com', 'santri', NULL, NULL, NULL, NULL),
(23, 'farhan', '$2y$10$S3vFgZpTf838jkozEeebkOLyJn.KkB7whwi0rhZj0eXF1qi13jy82', 'farhan@gmail.com', 'santri', NULL, NULL, NULL, NULL),
(24, 'vani', '$2y$10$tUsp.hcQxliQKNhc.cW7U./iwPDes27PzbHN6tMQ54Y.Qo5wgz7zG', 'vani@gmail.com', NULL, NULL, NULL, '2022-06-28 14:55:18', '2022-06-28 14:55:18'),
(27, 'badrudin', '$2y$10$/6o3QzqoyQUo5zZDS8UCB.GYTn59wMr5q/n.faTD6aSsS3ilCpjIK', 'badrudin@gmal.com', 'pengajar', NULL, NULL, NULL, NULL),
(28, 'rima', '$2y$10$hgw0UoYGHOcZYpKruvsZxOvgqBA0YGUw2lNX3UY6i62ypkh2JXuhi', 'rima', 'pengajar', NULL, NULL, '2022-07-04 06:46:44', '2022-07-04 06:46:44'),
(29, 'ado', '$2y$10$mUiUCnH.C8tStLHO3HBB9u4Cs87e07E1Pyu86ycpxuZ1lFS3ARRSu', '22@gmail.com', 'pengajar', NULL, NULL, NULL, NULL),
(34, 'danu', '$2y$10$lXDpbMFn6cnHxWM.2do19uAYnYFSzmWWbMiIzEyoCL5WCLBsP47/q', 'danu@gmail.com', 'pengajar', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_admin_email_unique` (`admin_email`),
  ADD UNIQUE KEY `admin_admin_telepon_unique` (`admin_telepon`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `program_tahfidz`
--
ALTER TABLE `program_tahfidz`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `set_kelas`
--
ALTER TABLE `set_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tahfid`
--
ALTER TABLE `tahfid`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `program_tahfidz`
--
ALTER TABLE `program_tahfidz`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `santri`
--
ALTER TABLE `santri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `set_kelas`
--
ALTER TABLE `set_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tahfid`
--
ALTER TABLE `tahfid`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
