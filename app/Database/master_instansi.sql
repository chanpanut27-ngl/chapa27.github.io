-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Feb 2026 pada 10.27
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
-- Struktur dari tabel `master_instansi`
--

CREATE TABLE `master_instansi` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama_instansi` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` char(20) NOT NULL,
  `wilayah` varchar(150) NOT NULL,
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
-- Dumping data untuk tabel `master_instansi`
--

INSERT INTO `master_instansi` (`id`, `nama_instansi`, `alamat`, `no_telp`, `wilayah`, `is_active`, `deleted`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'BBKK Soekarno Hatta', 'Jl. P1, RT.001/RW.010, Pajang, Kec. Benda, Kota Tangerang, Banten 15126', '(021) 5507989', 'Kota Tangerang, Banten', 1, 0, '2026-01-31 06:54:03', '2026-01-31 10:08:17', 'prola', 'prola', '0000-00-00 00:00:00', ''),
(2, 'PKM Pademangan', 'Jl. Pademangan II Gang 22 No. 2, RT. 002 RW. 002', '(021) 64710433', 'Jakarta Utara', 1, 0, '2026-01-31 06:55:36', '2026-01-31 10:08:04', 'prola', 'prola', '0000-00-00 00:00:00', ''),
(3, 'PKM Duren Sawit', 'Jl. Haji Dogol No.15A, Jakarta Timur', '0896-3603-4567', 'Jakarta Timur', 1, 0, '2026-01-31 06:56:59', '2026-01-31 06:56:59', 'prola', '', '0000-00-00 00:00:00', ''),
(4, 'Puskesmas Keramat Jati', 'Jl. Kerja Bakti No.1, RT.2/RW.10, Kramat Jati, Kec. Kramat jati, Kota Jakarta Timur, DKI Jakarta 13510', '(021) 8004381', 'Jakarta Timur', 1, 0, '2026-01-31 06:59:06', '2026-01-31 10:08:29', 'prola', 'prola', '0000-00-00 00:00:00', ''),
(5, 'PKM Kebayoran Lama', 'Jl. Ciputat Raya Keb. Lama Rt 005/01, Kelurahan Kebayoran Lama Selatan, Jakarta Selatan 12240', '0811-8909-224', 'Jakarta Selatan', 1, 0, '2026-01-31 07:41:00', '2026-01-31 07:41:00', 'prola', '', NULL, ''),
(6, 'PKM Cengkareng', 'Jl. Rw. Bengkel Blok B No.1, RT.4/RW.7, Cengkareng Bar., Cengkareng, Kota Jakarta Barat, DKI Jakarta 11730', '(021) 54398366', 'Jakarta Barat', 1, 0, '2026-01-31 07:42:25', '2026-01-31 10:08:44', 'prola', 'prola', NULL, ''),
(7, 'PKM Cilincing', 'Jl. Rw. Bengkel Blok B No.1, RT.4/RW.7, Cengkareng Bar., Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11730', '(021) 21484022', 'Jakarta Barat', 1, 0, '2026-01-31 07:43:38', '2026-01-31 07:43:38', 'prola', '', NULL, ''),
(8, 'RSUD Koja', 'Jl. Deli No 4 Kel. Koja Kec. Koja Jakarta Utara, 14220', '0813-1791-919', 'Jakarta Utara', 1, 0, '2026-01-31 07:45:28', '2026-01-31 07:45:28', 'prola', '', NULL, ''),
(9, 'UPTD Labkesda Kota Cilegon', 'Jl. Pesut No.50, RT.8/RW.3, Masigit, Kec. Jombang, Kota Cilegon, Banten 42441', '(0254) 787443961', 'Banten', 1, 0, '2026-01-31 07:46:23', '2026-01-31 07:51:03', 'prola', 'prola', NULL, ''),
(10, 'DINKES Kota Tangerang', 'Jl. Daan Mogot No.69, RT.001/RW.001, Sukaasih, Kec. Tangerang, Kota Tangerang, Banten 15111', '(021) 5523676', 'Banten', 1, 0, '2026-01-31 07:52:48', '2026-01-31 07:52:48', 'prola', '', NULL, ''),
(11, 'PKM Kebayoran Baru', 'Jl. Iskandarsyah Raya No.105 5, RT.5/RW.5, Melawai, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12160', ' (021) 7264856', 'Jakarta Selatan', 1, 0, '2026-01-31 11:53:03', '2026-01-31 11:53:03', 'prola', '', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `master_instansi`
--
ALTER TABLE `master_instansi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `master_instansi`
--
ALTER TABLE `master_instansi`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
