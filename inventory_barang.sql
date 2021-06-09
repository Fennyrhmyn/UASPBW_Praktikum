-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 03:28 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `br_keluar`
--

CREATE TABLE `br_keluar` (
  `id_keluar` varchar(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `br_keluar`
--

INSERT INTO `br_keluar` (`id_keluar`, `id_barang`, `tanggal`, `keterangan`) VALUES
('1', 1, '2021-06-09', 'Ke Toko Belakang'),
('2', 2, '2021-06-09', 'Ke Toko Depan'),
('3', 3, '2021-06-09', 'Di pake tetangga');

-- --------------------------------------------------------

--
-- Table structure for table `br_masuk`
--

CREATE TABLE `br_masuk` (
  `id_masuk` varchar(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `penerima` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `br_masuk`
--

INSERT INTO `br_masuk` (`id_masuk`, `id_barang`, `tanggal`, `penerima`) VALUES
('1', 1, '2021-06-09', 'Barang dari Toko Sebelah'),
('2', 2, '2021-09-06', 'Barang dari Toko Sebelahnya'),
('3', 2, '2021-06-09', 'Barang dari Toko Depan'),
('4', 3, '2021-06-09', 'Bapak toko depan nitip'),
('5', 4, '2021-06-09', 'Nitip dulu, nanti diambil lagi'),
('6', 5, '2021-06-09', 'Gudang penuh, nitip juga');

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`id_user`, `nama`, `email`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin123@7corp.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin'),
(2, 'Satu', 'karyawan1@7corp.com', 'karyawan', '87c78b8da768468c4f3826791496385536c11dad', 'karyawan'),
(3, 'Herman', 'h3rman@gmail.com', 'herman', 'c3d7983e47b19501211b1b6328c7f9744af9d0ad', 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id_barang`, `nama_barang`, `deskripsi`, `unit`) VALUES
(1, 'Mie Abang Haji', 'Tahun Produksi = 2018, Tanngal Kadaluarsa = 2022', 675),
(2, 'Kopi Kapal Api', 'Kopi Sachet 500 gr, total 20 Kg', 200),
(3, 'Bolu Pandan Wangi', 'Bolu pandan wangi dengan warna hijau', 34),
(4, 'Gantungan Baju', 'Gantungan Baju Stainless Steel', 400),
(5, 'Paku Beton', 'Paku Beton Ukuran Sedang', 5000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `br_keluar`
--
ALTER TABLE `br_keluar`
  ADD PRIMARY KEY (`id_keluar`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `br_masuk`
--
ALTER TABLE `br_masuk`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `br_keluar`
--
ALTER TABLE `br_keluar`
  ADD CONSTRAINT `br_keluar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `stock` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `br_masuk`
--
ALTER TABLE `br_masuk`
  ADD CONSTRAINT `br_masuk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `stock` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
