-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Feb 2026 pada 05.32
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
-- Struktur dari tabel `master_biaya_akomodasi`
--

CREATE TABLE `master_biaya_akomodasi` (
  `id` int(5) UNSIGNED NOT NULL,
  `uraian` varchar(150) NOT NULL,
  `transport` varchar(255) NOT NULL,
  `uang_harian` decimal(10,0) NOT NULL,
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
-- Dumping data untuk tabel `master_biaya_akomodasi`
--

INSERT INTO `master_biaya_akomodasi` (`id`, `uraian`, `transport`, `uang_harian`, `is_active`, `deleted`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Pengambilan sampel < 8 jam (DKI Jakarta)', 'Kuitansi at cost atau antar Jemput oleh Konsumen', 0, 1, 0, '2026-02-16 11:19:41', '2026-02-16 11:25:57', 'prola', 'prola', '2026-02-16 11:19:41', ''),
(2, 'Pengambilan sampel > 8 jam  (DKI Jakarta)', 'Kuitansi at cost atau antar Jemput oleh Konsumen', 210000, 1, 0, '2026-02-16 11:20:23', '2026-02-16 11:27:50', 'prola', 'prola', '2026-02-16 11:20:23', ''),
(3, 'Pengambilan sampel 24 jam (dihitung 2 hari) (DKI Jakarta)', 'Kuitansi at cost atau antar Jemput oleh Konsumen', 420000, 1, 0, '2026-02-16 11:25:30', '2026-02-16 11:28:15', 'prola', 'prola', '2026-02-16 11:25:30', ''),
(4, 'Jarak 0-60 KM (PP) (Jawa Barat)', 'at cost', 285000, 1, 0, '2026-02-16 11:28:59', '2026-02-16 11:28:59', 'prola', '', '2026-02-16 11:28:59', ''),
(5, 'Jarak 61-120 KM (PP) (Jawa Barat)', 'at cost', 345000, 1, 0, '2026-02-16 11:29:32', '2026-02-16 11:29:32', 'prola', '', '2026-02-16 11:29:32', ''),
(6, 'Jarak > 120 KM (PP) (Jawa Barat)', 'at cost', 430000, 1, 0, '2026-02-16 11:30:10', '2026-02-16 11:30:38', 'prola', 'prola', '2026-02-16 11:30:10', ''),
(7, 'Banten', 'at cost', 370000, 1, 0, '2026-02-16 11:30:57', '2026-02-16 11:30:57', 'prola', '', '2026-02-16 11:30:57', ''),
(8, 'Kalimantan Barat', 'at cost', 380000, 1, 0, '2026-02-16 11:31:23', '2026-02-16 11:31:23', 'prola', '', '2026-02-16 11:31:23', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `master_biaya_akomodasi`
--
ALTER TABLE `master_biaya_akomodasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `master_biaya_akomodasi`
--
ALTER TABLE `master_biaya_akomodasi`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
