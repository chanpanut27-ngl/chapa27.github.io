-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Feb 2026 pada 11.02
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
-- Struktur dari tabel `master_jenis_sampel`
--

CREATE TABLE `master_jenis_sampel` (
  `id` int(5) UNSIGNED NOT NULL,
  `kode_sampel` char(20) NOT NULL,
  `jenis_sampel` varchar(255) NOT NULL,
  `id_peraturan` int(5) UNSIGNED NOT NULL,
  `pnbp` decimal(10,0) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `id_lab` int(5) UNSIGNED NOT NULL,
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
-- Dumping data untuk tabel `master_jenis_sampel`
--

INSERT INTO `master_jenis_sampel` (`id`, `kode_sampel`, `jenis_sampel`, `id_peraturan`, `pnbp`, `keterangan`, `id_lab`, `is_active`, `deleted`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'K', 'Air Minum', 1, 582000, '', 1, 1, 0, '2026-02-16 15:00:04', '2026-02-16 15:00:04', 'prola', '', '2026-02-16 15:00:04', ''),
(2, 'K', 'Air Bersih', 2, 343000, '', 1, 1, 0, '2026-02-16 15:01:41', '2026-02-16 15:02:39', 'prola', 'prola', '2026-02-16 15:01:41', ''),
(3, 'K', 'Air Hemodialisa', 3, 637000, '', 1, 1, 0, '2026-02-16 15:03:22', '2026-02-16 15:03:22', 'prola', '', '2026-02-16 15:03:22', ''),
(4, 'K', 'Air Limbah Domestik', 4, 201000, '', 1, 1, 0, '2026-02-16 15:04:32', '2026-02-16 15:36:21', 'prola', 'prola', '2026-02-16 15:04:32', ''),
(5, 'K', 'Air Limbah Domestik', 5, 172000, 'Lampiran 1 A.1 (IPLT)', 1, 1, 0, '2026-02-16 15:05:58', '2026-02-16 15:42:56', 'prola', 'prola', '2026-02-16 15:05:58', ''),
(6, 'K', 'Air Limbah Domestik', 6, 403000, 'Lampiran 1 A.2 (FASYANKES)', 1, 1, 0, '2026-02-16 15:07:50', '2026-02-16 15:42:30', 'prola', 'prola', '2026-02-16 15:07:50', ''),
(7, 'K', 'Air Limbah Domestik', 7, 235000, 'Lampiran 1 A.2', 1, 1, 0, '2026-02-16 15:41:31', '2026-02-16 15:45:38', 'prola', 'prola', '2026-02-16 15:41:31', ''),
(8, 'K', 'Air Limbah', 9, 341000, 'Lampiran 1 A.3 (FASYANKES)', 1, 1, 0, '2026-02-16 15:44:49', '2026-02-16 15:44:49', 'prola', '', '2026-02-16 15:44:49', ''),
(9, 'K', 'Air Limbah Domestik', 9, 173000, 'Lampiran 1 A.3', 1, 1, 0, '2026-02-16 15:46:59', '2026-02-16 15:46:59', 'prola', '', '2026-02-16 15:46:59', ''),
(10, 'K', 'Air Limbah Domestik', 10, 173000, 'Lampiran 1 B.1', 1, 1, 0, '2026-02-16 15:48:06', '2026-02-16 15:48:06', 'prola', '', '2026-02-16 15:48:06', ''),
(11, 'K', 'Air Limbah Domestik', 11, 341000, 'Lampiran 1 B.2', 1, 1, 0, '2026-02-16 15:49:03', '2026-02-16 15:49:03', 'prola', '', '2026-02-16 15:49:03', ''),
(12, 'K', 'Air Permukaan', 12, 991000, '', 1, 1, 0, '2026-02-16 15:49:40', '2026-02-16 15:49:40', 'prola', '', '2026-02-16 15:49:40', ''),
(13, 'B', 'Air Bersih', 2, 165000, '', 4, 1, 0, '2026-02-16 16:34:03', '2026-02-16 16:34:03', 'prola', '', '2026-02-16 16:34:03', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `master_jenis_sampel`
--
ALTER TABLE `master_jenis_sampel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `master_jenis_sampel_id_lab_foreign` (`id_lab`),
  ADD KEY `master_jenis_sampel_id_peraturan_foreign` (`id_peraturan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `master_jenis_sampel`
--
ALTER TABLE `master_jenis_sampel`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `master_jenis_sampel`
--
ALTER TABLE `master_jenis_sampel`
  ADD CONSTRAINT `master_jenis_sampel_id_lab_foreign` FOREIGN KEY (`id_lab`) REFERENCES `master_laboratorium` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `master_jenis_sampel_id_peraturan_foreign` FOREIGN KEY (`id_peraturan`) REFERENCES `master_peraturan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
