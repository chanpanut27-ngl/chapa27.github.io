-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Feb 2026 pada 11.03
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
-- Struktur dari tabel `master_parameter`
--

CREATE TABLE `master_parameter` (
  `id` int(5) UNSIGNED NOT NULL,
  `id_jenis_sampel` int(5) UNSIGNED NOT NULL,
  `parameter` varchar(150) NOT NULL,
  `metode` varchar(150) NOT NULL,
  `harga_per_titik` decimal(10,0) NOT NULL,
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
-- Dumping data untuk tabel `master_parameter`
--

INSERT INTO `master_parameter` (`id`, `id_jenis_sampel`, `parameter`, `metode`, `harga_per_titik`, `is_active`, `deleted`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 2, 'Kekeruhan', 'SNI-06-6989.25-2005', 10000, 1, 0, '2026-02-16 16:15:55', '2026-02-16 16:15:55', 'prola', '', '2026-02-16 16:15:55', ''),
(2, 2, 'Warna', 'SNI-06-6989.24-2005', 7000, 1, 0, '2026-02-16 16:15:55', '2026-02-16 16:15:55', 'prola', '', '2026-02-16 16:15:55', ''),
(3, 2, 'Zat Padat terlarut (TDS)', ' SNI-6989.27-2019', 9000, 1, 0, '2026-02-16 16:15:55', '2026-02-16 16:15:55', 'prola', '', '2026-02-16 16:15:55', ''),
(4, 2, 'Suhu', ' SNI-06-6989.23-2005', 2000, 1, 0, '2026-02-16 16:15:55', '2026-02-16 16:15:55', 'prola', '', '2026-02-16 16:15:55', ''),
(5, 2, 'Bau', 'Organoleptik', 2000, 1, 0, '2026-02-16 16:15:55', '2026-02-16 16:15:55', 'prola', '', '2026-02-16 16:15:55', ''),
(6, 2, 'pH', ' SNI-6989.11-2019', 10000, 1, 0, '2026-02-16 16:15:55', '2026-02-16 16:15:55', 'prola', '', '2026-02-16 16:15:55', ''),
(7, 2, 'Fe', 'SNI-6989.84-2019', 50000, 1, 0, '2026-02-16 16:15:55', '2026-02-16 16:15:55', 'prola', '', '2026-02-16 16:15:55', ''),
(8, 2, 'Mn', 'SNI-6989.84-2019', 50000, 1, 0, '2026-02-16 16:15:55', '2026-02-16 16:15:55', 'prola', '', '2026-02-16 16:15:55', ''),
(9, 2, 'Nitrat', 'SNI-06-2480-1991', 9000, 1, 0, '2026-02-16 16:15:55', '2026-02-16 16:15:55', 'prola', '', '2026-02-16 16:15:55', ''),
(10, 2, 'Nitrit', 'SNI-06-6989.9-2004', 9000, 1, 0, '2026-02-16 16:15:55', '2026-02-16 16:15:55', 'prola', '', '2026-02-16 16:15:55', ''),
(11, 2, 'Kromium, val 6', 'APHA 3500-Cr-B,2017', 20000, 1, 0, '2026-02-16 16:16:58', '2026-02-16 16:16:58', 'prola', '', '2026-02-16 16:16:58', ''),
(12, 13, 'Total Coliform', 'APHA Edisi 23 Tahun 2017 : 9221 B dan J', 77000, 1, 0, '2026-02-16 16:35:15', '2026-02-16 16:35:15', 'prola', '', '2026-02-16 16:35:15', ''),
(13, 13, 'E.coli', 'APHA Edisi 23 Tahun 2017 : 9221 B dan J', 88000, 1, 0, '2026-02-16 16:35:15', '2026-02-16 16:35:15', 'prola', '', '2026-02-16 16:35:15', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `master_parameter`
--
ALTER TABLE `master_parameter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `master_parameter_id_jenis_sampel_foreign` (`id_jenis_sampel`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `master_parameter`
--
ALTER TABLE `master_parameter`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `master_parameter`
--
ALTER TABLE `master_parameter`
  ADD CONSTRAINT `master_parameter_id_jenis_sampel_foreign` FOREIGN KEY (`id_jenis_sampel`) REFERENCES `master_jenis_sampel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
