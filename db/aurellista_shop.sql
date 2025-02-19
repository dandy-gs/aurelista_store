-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Feb 2025 pada 04.00
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
-- Database: `aurellista_shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `baju_rajut`
--

CREATE TABLE `baju_rajut` (
  `id` int(4) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `lama_buat` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `baju_rajut`
--

INSERT INTO `baju_rajut` (`id`, `nama`, `jenis`, `harga`, `foto`, `lama_buat`) VALUES
(4, 'Raju Bayi Merah Muda', 'Baju', 100000, '059878a197ff8ad50ac7864010da3bccbajubayi-pink.png', 2),
(5, 'Rajut Bayi Putih Merah', 'Baju', 100000, 'd111935a62df31424b55d6493b14317abajubayi-white.png', 2),
(6, 'Raju Bayi Merah Oranye', 'Baju', 100000, '44c05ac60fd918356f8e3026875d4a6ebajubayi-red.png', 2),
(7, 'Rajut Bayi Merah Muda', 'Baju', 100000, '786bfdcc1a0cc86f61cbe95f5d822db3bajubaju-bayi1.png', 2),
(8, 'Raju Bayi Biru', 'Baju', 100000, '0ec2c27980fae455aaef1d026936b937bajubayi-blue.png', 2),
(9, 'Rajut Bayi Kuning', 'Baju', 100000, 'a5ff21528393475107ad269a1e5c6bb9bajubaju_kuning.png', 2),
(10, 'Rajut Bayi Merah Bata', 'Baju', 100000, '7afc668b356322e1ff269c11f9b58ef3bajubaju_orenbata.png', 2),
(11, 'Rajut Bayi Putih ', 'Baju', 100000, 'd3977c534f3b4ad4d49d80b98a115cefbajubaju_putih.png', 2),
(12, 'Rajut Bayi Merah Muda', 'Baju', 100000, '45e3eb31cb341800b91be75a6dddf866bajubaju-bata.png', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli`
--

CREATE TABLE `beli` (
  `id` int(255) NOT NULL,
  `order_id` int(100) NOT NULL,
  `nama_beli` varchar(255) NOT NULL,
  `foto_beli` text NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `harga_beli` int(255) NOT NULL,
  `jumlah_beli` int(255) NOT NULL,
  `nama_pembeli` varchar(200) NOT NULL,
  `users_email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kode_pos` int(100) NOT NULL,
  `ongkos_kirim` int(100) NOT NULL,
  `status_pesanan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `beli`
--

INSERT INTO `beli` (`id`, `order_id`, `nama_beli`, `foto_beli`, `jenis_barang`, `harga_beli`, `jumlah_beli`, `nama_pembeli`, `users_email`, `alamat`, `kota`, `provinsi`, `kode_pos`, `ongkos_kirim`, `status_pesanan`) VALUES
(14, 1437507286, 'Raju Bayi Merah Oranye', '44c05ac60fd918356f8e3026875d4a6ebajubayi-red.png', 'BAJU', 165000, 3, 'dandy', 'dandygilangsaputra@gmail.com', 'JL. Janti Selatan VIII No. 45 Kota Malang', 'Kota Malang', 'Jawa Timur', 65148, 0, ''),
(15, 0, 'Raju Bayi Merah Oranye', '44c05ac60fd918356f8e3026875d4a6ebajubayi-red.png', 'BAJU', 165000, 3, 'dandy', 'dandygilangsaputra@gmail.com', 'JL. Janti Selatan VIII No. 45 Kota Malang', 'Kota Malang', 'Jawa Timur', 65148, 0, ''),
(16, 16, 'Raju Bayi Merah Oranye', '44c05ac60fd918356f8e3026875d4a6ebajubayi-red.png', 'BAJU', 165000, 3, 'dandy', 'dandygilangsaputra@gmail.com', 'JL. Janti Selatan VIII No. 45 Kota Malang', 'Kota Malang', 'Jawa Timur', 65148, 0, ''),
(17, 979522163, 'Raju Bayi Merah Oranye', '44c05ac60fd918356f8e3026875d4a6ebajubayi-red.png', 'BAJU', 165000, 3, 'dandy', 'dandygilangsaputra@gmail.com', 'JL. Janti Selatan VIII No. 45 Kota Malang', 'Kota Malang', 'Jawa Timur', 65148, 0, ''),
(18, 697713670, 'Raju Bayi Merah Oranye', '44c05ac60fd918356f8e3026875d4a6ebajubayi-red.png', 'BAJU', 165000, 3, 'dandy', 'dandygilangsaputra@gmail.com', 'JL. Janti Selatan VIII No. 45 Kota Malang', 'Kota Malang', 'Jawa Timur', 65148, 0, ''),
(19, 2121617796, 'Raju Bayi Merah Oranye', '44c05ac60fd918356f8e3026875d4a6ebajubayi-red.png', 'BAJU', 165000, 3, 'dandy', 'dandygilangsaputra@gmail.com', 'JL. Janti Selatan VIII No. 45 Kota Malang', 'Kota Malang', 'Jawa Timur', 65148, 0, ''),
(20, 32809347, 'Raju Bayi Merah Oranye', '44c05ac60fd918356f8e3026875d4a6ebajubayi-red.png', 'BAJU', 165000, 3, 'dandy', 'dandygilangsaputra@gmail.com', 'JL. Janti Selatan VIII No. 45 Kota Malang', 'Kota Malang', 'Jawa Timur', 65148, 0, ''),
(21, 1263312861, 'Raju Bayi Merah Oranye', '44c05ac60fd918356f8e3026875d4a6ebajubayi-red.png', 'BAJU', 165000, 3, 'dandy', 'dandygilangsaputra@gmail.com', 'JL. Janti Selatan VIII No. 45 Kota Malang', 'Kota Malang', 'Jawa Timur', 65148, 0, ''),
(22, 1316371124, 'Raju Bayi Merah Oranye', '44c05ac60fd918356f8e3026875d4a6ebajubayi-red.png', 'BAJU', 165000, 3, 'dandy', 'dandygilangsaputra@gmail.com', 'JL. Janti Selatan VIII No. 45 Kota Malang', 'Kota Malang', 'Jawa Timur', 65148, 0, ''),
(23, 222395411, 'Raju Bayi Merah Oranye', '44c05ac60fd918356f8e3026875d4a6ebajubayi-red.png', 'BAJU', 165000, 3, 'dandy', 'dandygilangsaputra@gmail.com', 'JL. Janti Selatan VIII No. 45 Kota Malang', 'Kota Malang', 'Jawa Timur', 65148, 0, ''),
(24, 441304099, 'Raju Bayi Merah Oranye', '44c05ac60fd918356f8e3026875d4a6ebajubayi-red.png', 'BAJU', 165000, 3, 'dandy', 'dandygilangsaputra@gmail.com', 'JL. Janti Selatan VIII No. 45 Kota Malang', 'Kota Malang', 'Jawa Timur', 65148, 0, ''),
(25, 807925783, 'Raju Bayi Merah Oranye', '44c05ac60fd918356f8e3026875d4a6ebajubayi-red.png', 'BAJU', 165000, 3, 'dandy', 'dandygilangsaputra@gmail.com', 'JL. Janti Selatan VIII No. 45 Kota Malang', 'Kota Malang', 'Jawa Timur', 65148, 0, ''),
(26, 1664728400, 'Rajut Bayi Putih Merah', 'd111935a62df31424b55d6493b14317abajubayi-white.png', 'BAJU', 55000, 1, 'dandy', 'dandygilangsaputra@gmail.com', 'JL. Janti Selatan VIII No. 45 Kota Malang', 'Kota Malang', 'Jawa Timur', 65148, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(255) NOT NULL,
  `nama_keranjang` varchar(255) NOT NULL,
  `foto_keranjang` text NOT NULL,
  `jumlah_beli` int(20) NOT NULL,
  `harga_keranjang` int(255) NOT NULL,
  `total_harga` int(255) NOT NULL,
  `jenis_barang` text NOT NULL,
  `users_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id`, `nama_keranjang`, `foto_keranjang`, `jumlah_beli`, `harga_keranjang`, `total_harga`, `jenis_barang`, `users_email`) VALUES
(16, 'Raju Bayi Merah Oranye', '44c05ac60fd918356f8e3026875d4a6ebajubayi-red.png', 3, 55000, 165000, 'BAJU', 'dandygilangsaputra@gmail.com'),
(17, 'Raju Bayi Merah Oranye', '44c05ac60fd918356f8e3026875d4a6ebajubayi-red.png', 1, 55000, 55000, 'BAJU', 'dandy.saputra@student.unmer.ac.id'),
(18, 'Rajut Bayi Putih Merah', 'd111935a62df31424b55d6493b14317abajubayi-white.png', 1, 55000, 55000, 'BAJU', 'dandygilangsaputra@gmail.com'),
(19, 'Tas Rajut Hitam', '7b596b9d49778b9a0a6c33241a122424tastas-item.png', 1, 90000, 90000, 'TAS', 'dandygilangsaputra@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sepatu`
--

CREATE TABLE `sepatu` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `lama_buat` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sepatu`
--

INSERT INTO `sepatu` (`id`, `nama`, `jenis`, `harga`, `foto`, `lama_buat`) VALUES
(1, 'Sepatu Rajut Bayi Biru', 'Sepatu', 135000, '89661429cf89b7453596296bf77b83d4sepatusepatu-biru.png', 2),
(2, 'Sepatu Rajut Bayi Hijau', 'Sepatu', 135000, '80f74722cf441643a0612cf06532d5e3sepatusepatu-hijau.png', 2),
(3, 'Sepatu Rajut Bayi Kuning', 'Sepatu', 135000, 'd1f8ae296b0fb9ed383844553e8f799dsepatusepatu-kuning.png', 2),
(4, 'Sepatu Rajut Bayi Bata', 'Sepatu', 135000, '686144509ebd1448b22d91ee1f1d0742sepatusepatu-merahbata.png', 2),
(5, 'Sepatu Rajut Bayi Pink', 'Sepatu', 135000, '7ea5e4c01aae987ea998996000c3f0c8sepatusepatu-pink.png', 2),
(6, 'Sepatu Sandal Rajut Bayi Putih ', 'Sepatu', 135000, '0006a75f9719c518a2843474c42234edsepatusepatu-putihbiru.png', 2),
(7, 'Sepatu Rajut Bayi Ungu', 'Sepatu', 135000, '4d16a854d4cffe54dc5c388bb6ba2d32sepatusepatu-ungu.png', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tas_rajut`
--

CREATE TABLE `tas_rajut` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `lama_buat` int(4) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tas_rajut`
--

INSERT INTO `tas_rajut` (`id`, `nama`, `jenis_barang`, `harga`, `lama_buat`, `foto`) VALUES
(3, 'Tas Rajut Motif Persegi', 'Tas', 90000, 2, '2df227fd1ef9f5117baec26850a2428ftastas_kotak.png'),
(4, 'Tas Rajut Hitam', 'Tas', 90000, 2, '7b596b9d49778b9a0a6c33241a122424tastas-item.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `negara` varchar(255) NOT NULL,
  `kode_pos` int(100) NOT NULL,
  `sandi` varchar(255) NOT NULL,
  `kode` text NOT NULL,
  `status_keranjang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `alamat`, `kota`, `negara`, `kode_pos`, `sandi`, `kode`, `status_keranjang`) VALUES
(4, 'dandy', 'dandygilangsaputra@gmail.com', '', '', '', 0, '5b25b686cdb35a9d944d703d79578348', '', ''),
(5, 'Dandy Gilang Saputra', 'dandy.saputra@student.unmer.ac.id', '', '', '', 0, '5b25b686cdb35a9d944d703d79578348', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `baju_rajut`
--
ALTER TABLE `baju_rajut`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sepatu`
--
ALTER TABLE `sepatu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tas_rajut`
--
ALTER TABLE `tas_rajut`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `baju_rajut`
--
ALTER TABLE `baju_rajut`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `beli`
--
ALTER TABLE `beli`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `sepatu`
--
ALTER TABLE `sepatu`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tas_rajut`
--
ALTER TABLE `tas_rajut`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
