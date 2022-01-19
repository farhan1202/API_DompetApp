-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jan 2022 pada 18.39
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dompet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dompet`
--

CREATE TABLE `dompet` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `referensi` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dompet`
--

INSERT INTO `dompet` (`id`, `nama`, `referensi`, `deskripsi`, `status_id`) VALUES
(2, 'Dompet Utama', '72727137', 'Bacnk BCA', 1),
(3, 'Dompet Tambahan', '72727138', 'Bank Nagari', 1),
(4, 'Dompet Cadangan', '72727138', 'Bank Permata ', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dompet_status`
--

CREATE TABLE `dompet_status` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dompet_status`
--

INSERT INTO `dompet_status` (`id`, `nama`, `deskripsi`) VALUES
(1, 'Aktif', 'Status Barang yang AKTIF'),
(2, 'Tidak Aktif', 'Status Barang yang TIDAK AKTIF');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `deskripsi`, `status_id`) VALUES
(1, 'Pemasukan', 'kategori untuk pemasukan uang', 1),
(2, 'Pengeluaran', 'kategori untuk pengeluaran uang', 1),
(3, 'Lain lain', 'kategori Lain lain', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_status`
--

CREATE TABLE `kategori_status` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_status`
--

INSERT INTO `kategori_status` (`id`, `nama`, `deskripsi`) VALUES
(1, 'Aktif', 'Status dari data AKTIF'),
(2, 'Tidak Aktif', 'Status dari data Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `nilai` int(11) NOT NULL,
  `dompet_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode`, `deskripsi`, `tanggal`, `nilai`, `dompet_id`, `kategori_id`, `transaksi_id`, `status_id`) VALUES
(30, 'WIN000001', 'Gaji Bulanan', '2022-01-19', 2500000, 2, 1, 1, 1),
(31, 'WIN000002', 'Bonus', '2022-01-19', 500000, 3, 1, 1, 1),
(32, 'WOUT000001', 'Berobat', '2022-01-19', 100000, 2, 2, 2, 1),
(33, 'WOUT000002', 'bensin', '2022-01-19', 20000, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_stat`
--

CREATE TABLE `transaksi_stat` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_stat`
--

INSERT INTO `transaksi_stat` (`id`, `nama`, `deskripsi`) VALUES
(1, 'Aktif', 'Status Barang yang AKTIF'),
(2, 'Tidak Aktif', 'Status Barang yang TIDAK AKTIF');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_status`
--

CREATE TABLE `transaksi_status` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_status`
--

INSERT INTO `transaksi_status` (`id`, `nama`, `deskripsi`) VALUES
(1, 'Masuk', 'Mencatat Modul Dompet Masuk'),
(2, 'Keluar', 'Mencatat Modul Dompet Keluar');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dompet`
--
ALTER TABLE `dompet`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dompet_status`
--
ALTER TABLE `dompet_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_status`
--
ALTER TABLE `kategori_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_stat`
--
ALTER TABLE `transaksi_stat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_status`
--
ALTER TABLE `transaksi_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dompet`
--
ALTER TABLE `dompet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori_status`
--
ALTER TABLE `kategori_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `transaksi_stat`
--
ALTER TABLE `transaksi_stat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi_status`
--
ALTER TABLE `transaksi_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
