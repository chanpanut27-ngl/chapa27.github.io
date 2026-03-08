-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 08 Mar 2026 pada 19.12
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs_bblkmjkt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_instalasi`
--

CREATE TABLE `master_instalasi` (
  `id` int(5) UNSIGNED NOT NULL,
  `kode_instalasi` char(20) NOT NULL,
  `nama_instalasi` varchar(255) NOT NULL,
  `id_kat_lab` int(5) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` varchar(150) NOT NULL,
  `updated_by` varchar(150) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `master_instalasi`
--

INSERT INTO `master_instalasi` (`id`, `kode_instalasi`, `nama_instalasi`, `id_kat_lab`, `is_active`, `deleted`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'KI.01', 'Instalasi Laboratorium Kesehatan Lingkungan, Vektor dan Binatang Pembawa Penyakit', 1, 1, 0, '2026-03-07 22:50:42', '2026-03-07 22:50:57', 'prola', 'prola', NULL, ''),
(2, 'KI.02', 'Instalasi Laboratorium Mikrobiologi dan Biomolekuler', 1, 1, 0, '2026-03-07 22:51:30', '2026-03-07 22:51:30', 'prola', '', NULL, ''),
(3, 'KI.03', 'Instalasi Laboratorium Patologi Klinik dan Imunologi', 2, 1, 0, '2026-03-07 22:51:52', '2026-03-07 22:54:39', 'prola', 'prola', NULL, ''),
(4, 'KI.04', 'Instalasi Laboratorium TeknologiTepat Guna, Kalibrasi dan Sarana Prasarana', 3, 0, 0, '2026-03-07 22:52:22', '2026-03-07 22:55:25', 'prola', 'prola', NULL, ''),
(5, 'KI.05', 'Instalasi Sampling dan Media Reagensia', 3, 0, 0, '2026-03-07 22:52:36', '2026-03-07 22:55:56', 'prola', 'prola', NULL, ''),
(6, 'KI.06', 'Instalasi K3, Limbah dan Biorepository', 3, 0, 0, '2026-03-07 22:53:05', '2026-03-07 22:56:03', 'prola', 'prola', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `master_instalasi`
--
ALTER TABLE `master_instalasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `master_instalasi`
--
ALTER TABLE `master_instalasi`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
