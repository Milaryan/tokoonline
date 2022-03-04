-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Mar 2022 pada 09.30
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoonline`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(10) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `stok` int(5) NOT NULL,
  `harga` int(15) NOT NULL,
  `berat` varchar(12) NOT NULL,
  `kategori_id` varchar(20) NOT NULL,
  `image` varchar(500) NOT NULL,
  `detail` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama`, `stok`, `harga`, `berat`, `kategori_id`, `image`, `detail`) VALUES
(43, 'Mobil Tua', 38, 50000000, '50000', '2', '6218570aa24c6.png', 'Mobil OK Minus Gores Dikit Bisa Dinego'),
(44, 'Motor Butut', 92, 1000000, '6000', '3', '62185774828ed.png', 'Kondisi OK Minus Mesin Hancur Berantakan Velg Bengkok Dikit'),
(45, 'Stella', 973, 15000, '100', '4', '621857a198be7.png', 'Menyegarkan Hari Harimu'),
(46, 'Nmax thn 2018', 140, 15000000, '8000', '3', '621857e6c0fd3.png', 'Kondisi Mulus No Minus Cuma Yang Punya Agak Minus'),
(47, 'Velg RCB', 122, 500000, '1000', '6', '62185a2ce8f5c.png', 'Siap Pakai Tinggal Pasang Jleb Ahhh'),
(48, 'Gantungan Mobil', 142, 20000, '250', '4', '622191e592c6d.png', 'Mengalihkan pandangan dari jalanan dan mengindahkan harimu :)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `id_produk`, `qty`) VALUES
(80, 17, 47, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(15) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `name`) VALUES
(2, 'Mobil'),
(3, 'Motor'),
(4, 'Aksesoris'),
(6, 'Sparepart');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sold`
--

CREATE TABLE `sold` (
  `id` int(11) NOT NULL,
  `id_trans` varchar(25) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `produk` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `tgl` varchar(12) NOT NULL,
  `jasa` varchar(25) NOT NULL,
  `ongkir` varchar(12) NOT NULL,
  `berat` varchar(12) NOT NULL,
  `est` varchar(6) NOT NULL,
  `total` varchar(12) NOT NULL,
  `totala` varchar(12) NOT NULL,
  `proses` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sold`
--

INSERT INTO `sold` (`id`, `id_trans`, `user_id`, `nama`, `produk`, `stok`, `harga`, `tgl`, `jasa`, `ongkir`, `berat`, `est`, `total`, `totala`, `proses`) VALUES
(51, '040322101616', 16, 'Ismail Mail', 'Gantungan Mobil', 4, '80000', '04-03-2022', 'pos', '648000', '9000', '9 HARI', '15080000', '15728000', 'proses'),
(52, '040322101616', 16, 'Ismail Mail', 'Nmax thn 2018', 1, '15000000', '', 'pos', '648000', '9000', '9 HARI', '15080000', '15728000', 'proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `stok_sebelum` int(11) NOT NULL,
  `stok_sesudah` int(11) NOT NULL,
  `stok_ditambahkan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`) VALUES
(8, 'admin', 'admin', '$2y$10$gRHUhvXbp8p6rwraakEkOur3GT3PjMNnHG/Cs9f2URbHiqRfI1Qca', 'admin'),
(10, 'wendy', 'wendy@gmail.com', '$2y$10$faylHxfTrQBN77nZcxHDy.XLoQ7PaePrpbn98SfEUyFncv5sQbRT6', 'user'),
(16, 'vian', 'vian@gmail.com', '$2y$10$0yOhcxP7feP2kl/eFbXPtePxUxSADo3ykLJ7E6rbHUXWCqg4sNxja', 'user'),
(17, 'mail', 'mail@gmail.com', '$2y$10$6/So5G1Zn4Fgl8epZxXCGekLeW.X.2N4xQ2wDKU7GqnrZraBGbJwy', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sold`
--
ALTER TABLE `sold`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `sold`
--
ALTER TABLE `sold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
