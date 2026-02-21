-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Feb 2026 pada 08.12
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
-- Database: `dbs_bblkm_jkt_copy`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_penyakit`
--

CREATE TABLE `master_penyakit` (
  `id` int(5) UNSIGNED NOT NULL,
  `penyakit` varchar(150) NOT NULL,
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
-- Dumping data untuk tabel `master_penyakit`
--

INSERT INTO `master_penyakit` (`id`, `penyakit`, `keterangan`, `is_active`, `deleted`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'JE', 'Penyakit radang otak serius yang disebabkan oleh virus Japanese Encephalitis, ditularkan melalui gigitan nyamuk Culex yang terinfeksi', 1, 0, '2026-01-31 11:03:10', '2026-01-31 11:15:41', 'prola', '', NULL, ''),
(2, 'Campak/Rubella', 'Penyakit infeksi saluran pernapasan yang menular', 1, 0, '2026-01-31 11:05:58', '2026-01-31 11:07:17', 'prola', '', NULL, ''),
(3, 'Difteri', 'penyakit infeksi bakteri serius yang disebabkan oleh Corynebacterium diphtheriae, menyerang selaput lendir hidung, tenggorokan, dan terkadang kulit.', 1, 0, '2026-01-31 11:08:26', '2026-01-31 11:08:26', 'prola', '', NULL, ''),
(4, 'ILI/SARI', 'Infeksi saluran pernapasan yang menunjukkan gejala serupa dengan penyakit influenza.', 1, 0, '2026-01-31 11:09:28', '2026-01-31 11:09:28', 'prola', '', NULL, ''),
(5, 'MPOX', 'Penyakit infeksi menular akibat virus monkeypox (\\(MPXV\\)) yang menyebar melalui kontak langsung dengan lesi kulit, cairan tubuh, droplet, atau benda terkontaminasi', 1, 0, '2026-01-31 11:09:42', '2026-01-31 11:12:22', 'prola', '', NULL, ''),
(6, 'Arbovirosis', 'Kelompok penyakit menular yang disebabkan oleh arbovirus (singkatan dari arthropod-borne virus) dan disebarkan ke manusia melalui gigitan vektor arthropoda yang terinfeksi', 1, 0, '2026-01-31 11:09:50', '2026-01-31 11:12:52', 'prola', '', NULL, ''),
(7, 'Laptospirosis', 'Genus bakteri dalam filum Spirochaete yang mencakup sejumlah spesies patogenik dan saprofitik.', 1, 0, '2026-01-31 11:09:57', '2026-01-31 11:14:02', 'prola', '', NULL, ''),
(8, 'HCV', 'Virus penyebab peradangan hati (hepatitis C) yang ditularkan melalui darah yang terinfeksi', 1, 0, '2026-01-31 11:10:17', '2026-01-31 11:13:15', 'prola', '', NULL, ''),
(9, 'Feses', 'Produk limbah padat atau semi-padat hasil akhir sistem pencernaan manusia dan hewan yang dikeluarkan melalui anus', 1, 0, '2026-01-31 11:10:24', '2026-01-31 11:14:30', 'prola', '', NULL, ''),
(10, 'Legionella', 'Sejenis bakteri gram-negatif batang yang hidup subur di lingkungan air tawar, seperti sistem pipa, menara pendingin (AC), bak mandi air panas, dan air mancur', 1, 0, '2026-01-31 11:10:40', '2026-01-31 11:11:47', 'prola', '', NULL, ''),
(11, 'Cikungunya', 'Penyakit infeksi virus yang ditularkan ke manusia melalui gigitan nyamuk Aedes aegypti atau Aedes albopictus yang terinfeksi', 1, 0, '2026-01-31 11:10:50', '2026-01-31 11:11:59', 'prola', '', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `master_penyakit`
--
ALTER TABLE `master_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `master_penyakit`
--
ALTER TABLE `master_penyakit`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
