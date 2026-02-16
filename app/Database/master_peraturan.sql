-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Feb 2026 pada 11.01
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
-- Database: `dbs_bblkm_jkt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_peraturan`
--

CREATE TABLE `master_peraturan` (
  `id` int(5) UNSIGNED NOT NULL,
  `peraturan` varchar(225) NOT NULL,
  `keterangan` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `deleted_at` datetime DEFAULT current_timestamp(),
  `deleted_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `master_peraturan`
--

INSERT INTO `master_peraturan` (`id`, `peraturan`, `keterangan`, `is_active`, `deleted`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'PerMenKes No.02 Tahun 2023', 'Air Minum', 1, 0, '2026-02-16 14:19:42', '2026-02-16 14:44:37', 'prola', 'prola', '2026-02-16 14:19:42', ''),
(2, 'PerMenKes No.02 Tahun 2023', 'Air Bersih', 1, 0, '2026-02-16 14:46:03', '2026-02-16 14:46:16', 'prola', 'prola', '2026-02-16 14:46:03', ''),
(3, 'Standar AAMI Tahun 2019', 'Pengujian Air Hemodialisa', 1, 0, '2026-02-16 14:20:08', '2026-02-16 15:35:12', 'prola', 'prola', '2026-02-16 14:20:08', ''),
(4, 'PermenLHK No.P.68/MenLHK/SetJen/KUM.1/8/2016', 'Pengujian Air Limbah Domestik', 1, 0, '2026-02-16 14:20:42', '2026-02-16 14:51:06', 'prola', 'prola', '2026-02-16 14:20:42', ''),
(5, 'PerMenLHK No.11 Tahun 2025', 'Lampiran 1 A.1 Air Limbah Kakus yang diolah pada Instalasi Pengolahan Lumpur Tinja (IPLT) Terpadu dan dibuang ke media air', 1, 0, '2026-02-16 14:22:55', '2026-02-16 14:32:25', 'prola', 'prola', '2026-02-16 14:22:55', ''),
(6, 'PerMenLHK No.11 Tahun 2025', 'Lampiran 1 A.2 Air Limbah Non-Kakus atau gabungan air limbah Kakus dengan air limbah Non-Kakus dan dibuang ke media air (FASYANKES)', 1, 0, '2026-02-16 14:25:55', '2026-02-16 14:32:16', 'prola', 'prola', '2026-02-16 14:25:55', ''),
(7, 'PerMenLHK No.11 Tahun 2025', 'Lampiran 1 A.2 Air Limbah Non-Kakus, atau gabungan air limbah Kakus dengan air limbah Non-Kakus dan dibuang ke media air', 1, 0, '2026-02-16 14:26:49', '2026-02-16 14:30:38', 'prola', 'prola', '2026-02-16 14:26:49', ''),
(8, 'PerMenLHK No.11 Tahun 2025', 'Lampiran 1 A.3 Air Limbah Non-Kakus, atau gabungan air limbah Kakus dengan air limbah Non-Kakus dan dibuang ke drainase atau irigasi (FASYANKES)', 1, 0, '2026-02-16 14:29:03', '2026-02-16 14:32:05', 'prola', 'prola', '2026-02-16 14:29:03', ''),
(9, 'PerMenLHK No.11 Tahun 2025', 'Lampiran 1 A.3 Air Limbah Non-Kakus, atau gabungan air limbah Kakus dengan air limbah Non-Kakus dan dibuang ke drainase atau irigasi', 1, 0, '2026-02-16 14:33:39', '2026-02-16 14:35:04', 'prola', 'prola', '2026-02-16 14:33:39', ''),
(10, 'PerMenLHK No.11 Tahun 2025', 'Lampiran 1 B.1 Air Limbah Domestik untuk pemanfaatan air limbah penyiraman dan atau pencucian', 1, 0, '2026-02-16 14:34:54', '2026-02-16 14:35:12', 'prola', 'prola', '2026-02-16 14:34:54', ''),
(11, 'PerMenLHK No.11 Tahun 2025', 'Lampiran 1 B.2 Air Limbah Domestik untuk pemanfaatan air limbah penyiraman dan atau pencucian dari usaha dan atau kegiatan pelayanan kesehatan', 1, 0, '2026-02-16 14:36:17', '2026-02-16 14:38:17', 'prola', 'prola', '2026-02-16 14:36:17', ''),
(12, 'PP No.22 Tahun 2021', 'Pengujian Air Sungai/Kali/Danau', 1, 0, '2026-02-16 14:37:48', '2026-02-16 14:37:48', 'prola', '', '2026-02-16 14:37:48', ''),
(13, 'PerMenKes 1096 Tahun 2011', 'Makanan, Usap Alat Makan/Medis', 1, 0, '2026-02-16 14:39:31', '2026-02-16 14:39:31', 'prola', '', '2026-02-16 14:39:31', ''),
(14, 'PerMenKes 07 Tahun 2019', 'Usap Lantai/Dinding/Linen', 1, 0, '2026-02-16 14:40:10', '2026-02-16 14:40:10', 'prola', '', '2026-02-16 14:40:10', ''),
(15, 'PerMenKes 07 Tahun 2019', 'Usap Alat Medis', 1, 0, '2026-02-16 14:40:37', '2026-02-16 14:40:54', 'prola', 'prola', '2026-02-16 14:40:37', ''),
(16, 'PerMenKes No.02 Tahun 2023', 'Udara Ruang', 1, 0, '2026-02-16 14:52:10', '2026-02-16 14:52:10', 'prola', '', '2026-02-16 14:52:10', ''),
(17, 'PP No.22 Tahun 2021', 'Udara Bebas / Ambient', 1, 0, '2026-02-16 14:53:52', '2026-02-16 14:53:52', 'prola', '', '2026-02-16 14:53:52', ''),
(18, 'PerMenKes No.02 Tahun 2023', 'Udara Ruang Sesaat', 1, 0, '2026-02-16 14:54:25', '2026-02-16 14:54:25', 'prola', '', '2026-02-16 14:54:25', ''),
(19, 'PerMenKes No.02 Tahun 2023', 'Udara Ruang 24 Jam', 1, 0, '2026-02-16 14:55:00', '2026-02-16 14:55:00', 'prola', '', '2026-02-16 14:55:00', ''),
(20, 'MenLH No.13 Tahun 1995', 'Udara Emisi Cerobong', 1, 0, '2026-02-16 14:56:09', '2026-02-16 14:56:09', 'prola', '', '2026-02-16 14:56:09', ''),
(21, 'Men LH No.11 Tahun 2021', 'Udara Emisi Genset', 1, 0, '2026-02-16 14:57:11', '2026-02-16 14:57:11', 'prola', '', '2026-02-16 14:57:11', ''),
(22, 'Men LH No.11 Tahun 2021', 'Pemeriksaan Fisika', 1, 0, '2026-02-16 14:57:36', '2026-02-16 14:57:36', 'prola', '', '2026-02-16 14:57:36', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `master_peraturan`
--
ALTER TABLE `master_peraturan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `master_peraturan`
--
ALTER TABLE `master_peraturan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
