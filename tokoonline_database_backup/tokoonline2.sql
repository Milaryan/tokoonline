-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2022 at 09:59 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoonline2`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(10) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `stok` int(5) NOT NULL,
  `harga` int(15) NOT NULL,
  `kategori_id` varchar(20) NOT NULL,
  `image` varchar(500) NOT NULL,
  `detail` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `stok`, `harga`, `kategori_id`, `image`, `detail`) VALUES
(30, 'Pocophone X3 NFC', 88, 4000000, '2', '61f7543fcaa7b.png', 'ditawarkan oleh prosesor baru. Prosesor Qualcomm® Snapdragon™ 732G menawarkan kapasitas pemrosesan grafis yang kuat dan kemampuan komputasi AI yang canggih. Teknologi proses 8nm dan chip octa-core yang membantu mencapai kecepatan jam 2,3GHz.'),
(31, 'Mi Band 5', 78, 400000, '9', '61f78aa6876ef.png', 'Baterai 500 mAh, tahan air. Bisa tahan 10 hari pemakaian normal. Tersedia berbagai warna'),
(32, 'Canon', 67, 3500000, '7', '61f78c64beb65.png', 'Sensor APS-C CMOS 24,1 megapiksel+ perekaman video 4K 45 titik AF semua tipe silang (jendela bidik) dan Dual Pixel CMOS AF (Live View)'),
(34, 'Lenovo Legion 5', 53, 19000000, '3', '61fa1ee09b2fa.png', 'Engineered to deliver devastation in and out of the arena, the Legion 5 Pro deploys AMD Ryzen™ processing and NVIDIA® GeForce RTX™ graphics to dish out high-resolution gaming. The world’s first 16&amp;quot; QHD gaming laptop with up to 165Hz refresh sets up a “winning zone” that gives you an extra e'),
(35, 'Pop It', 129, 20000, '6', '61fccbe0b0ec4.png', 'Ini adalah mainan yang viral pada masanya'),
(36, 'Televisi Panasonic', 55, 3500000, '3', '61fcead9bd166.png', 'Mulai dari gambar yang semarak hingga gambar yang jernih - Anda akan menikmati detail dan tekstur yang halus, bahkan dalam area gambar yang datar. Clear Resolution Enhancer menskala gambar resolusi rendah hingga resolusi Full HD tanpa memperkenalkan noise gambar tambahan. Melakukannya dengan mengura'),
(37, 'Panci Annons', 91, 99900, '10', '61fdeb89a87ef.png', 'Panci dengan penutup, kaca/baja tahan karat, 2.8 l');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `id_produk`, `qty`) VALUES
(11, 6, 30, 1),
(12, 6, 31, 2),
(13, 6, 36, 16),
(14, 6, 35, 1),
(15, 6, 37, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(15) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `name`) VALUES
(2, 'Gadget'),
(3, 'Elektronik'),
(4, 'Pakaian'),
(6, 'Mainan'),
(7, 'Kamera'),
(9, 'Aksesoris'),
(10, 'Alat Dapur');

-- --------------------------------------------------------

--
-- Table structure for table `sold`
--

CREATE TABLE `sold` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `stok_sebelum` int(11) NOT NULL,
  `stok_sesudah` int(11) NOT NULL,
  `stok_ditambahkan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id`, `stok_sebelum`, `stok_sesudah`, `stok_ditambahkan`, `id_barang`, `tanggal`) VALUES
(8, 26, 30, 4, 8, '2022-01-26'),
(9, 26, 46, 20, 10, '2022-01-28'),
(10, 67, 123, 56, 22, '2022-01-28'),
(11, 8, 17, 9, 25, '2022-01-29'),
(12, 12, 37, 25, 29, '2022-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`) VALUES
(5, 'mdwiastika', 'marceldwias@gmail.com', '$2y$10$vbHCBs9.1u8TIEX1cRRGBeQPTr770//cw513dq5VPR5wQs6aGnCS6', 'admin'),
(6, 'singiki', 'singiki18@gmail.com', '$2y$10$r.tk.2Fw/kl46AA5gjuL2eRjHDRD04.xhUf0HJ4UZlMQ9aACxqubC', 'user'),
(7, 'hai', 'hai', '$2y$10$JMrgOdl2mDpCXhpdFUZ1x.H3YMviZWjDDrDveuGu2texI.pYr/7eS', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sold`
--
ALTER TABLE `sold`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sold`
--
ALTER TABLE `sold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
