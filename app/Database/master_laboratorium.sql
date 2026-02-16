-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Feb 2026 pada 05.07
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
-- Struktur dari tabel `master_laboratorium`
--

CREATE TABLE `master_laboratorium` (
  `id` int(5) UNSIGNED NOT NULL,
  `kode_lab` char(10) NOT NULL,
  `nama_lab` varchar(150) NOT NULL,
  `lantai` int(5) NOT NULL,
  `id_kat_lab` int(5) UNSIGNED NOT NULL,
  `kode_instalasi` char(10) NOT NULL,
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
-- Dumping data untuk tabel `master_laboratorium`
--

INSERT INTO `master_laboratorium` (`id`, `kode_lab`, `nama_lab`, `lantai`, `id_kat_lab`, `kode_instalasi`, `is_active`, `deleted`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'K', 'Laboratorium Fisika Kimia Zat Cair', 2, 1, 'KI.01', 1, 0, '2026-02-16 10:51:20', '2026-02-16 10:51:20', 'prola', '', '2026-02-16 10:51:20', ''),
(2, 'KP', 'Laboratorium Fisika Kimia Zat Padat dan B3', 4, 1, 'KI.01', 1, 0, '2026-02-16 10:54:48', '2026-02-16 10:54:48', 'prola', '', '2026-02-16 10:54:48', ''),
(3, 'U', 'Laboratorium Fisika Kimia Udara dan Radiasi', 4, 1, 'KI.01', 1, 0, '2026-02-16 10:56:41', '2026-02-16 10:56:41', 'prola', '', '2026-02-16 10:56:41', ''),
(4, 'B', 'Laboratorium Biologi Lingkungan', 4, 1, 'KI.01', 1, 0, '2026-02-16 10:57:59', '2026-02-16 10:57:59', 'prola', '', '2026-02-16 10:57:59', ''),
(5, 'EN', 'Laboratorium VBPP', 2, 1, 'KI.01', 1, 0, '2026-02-16 11:03:42', '2026-02-16 11:03:42', 'prola', '', '2026-02-16 11:03:42', ''),
(6, 'MB', 'Laboratorium Mikrobiologi & Biomolekuler (PCR)', 3, 1, 'KI.01', 1, 0, '2026-02-16 11:04:39', '2026-02-16 11:04:39', 'prola', '', '2026-02-16 11:04:39', ''),
(7, 'PK', 'Laboratorium Patologi Klinik & Imunologi', 3, 2, 'KI.03', 0, 0, '2026-02-16 11:05:15', '2026-02-16 11:06:45', 'prola', 'prola', '2026-02-16 11:05:15', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `master_laboratorium`
--
ALTER TABLE `master_laboratorium`
  ADD PRIMARY KEY (`id`),
  ADD KEY `master_laboratorium_id_kat_lab_foreign` (`id_kat_lab`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `master_laboratorium`
--
ALTER TABLE `master_laboratorium`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `master_laboratorium`
--
ALTER TABLE `master_laboratorium`
  ADD CONSTRAINT `master_laboratorium_id_kat_lab_foreign` FOREIGN KEY (`id_kat_lab`) REFERENCES `master_kategori_lab` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
