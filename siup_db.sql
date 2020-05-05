-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2020 at 08:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siup_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` varchar(4) NOT NULL,
  `nama_barang` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`) VALUES
('P100', 'Kertas A4 70gr'),
('P110', 'Kertas A4 80gr'),
('P120', 'Kertas Bufallo A4'),
('P200', 'Kertas F4 70gr'),
('P210', 'Kertas F4 80gr'),
('P220', 'Kertas Bufallo F4');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level_user` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level_user`) VALUES
(1, 'admin'),
(2, 'owner'),
(3, 'karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` varchar(64) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `harga`, `keterangan`, `tanggal`) VALUES
(1, 5000, 'print hitam putih 20lbr', '2020-05-06'),
(2, 7500, 'print full warna 7lbr dan hitam putih', '2020-05-06'),
(3, 6250, 'print hitam putih 25lbr', '2020-05-06'),
(4, 9000, 'print full warna 9lbr', '2020-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(64) NOT NULL,
  `password` varchar(512) NOT NULL,
  `nama_user` varchar(64) NOT NULL,
  `level` int(11) NOT NULL,
  `gambar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama_user`, `level`, `gambar`) VALUES
('admin', '$2y$10$cZTYej7/GObdxjIw4HX0neQPMsHDSCvp1QbLRRZZwTcSjLIBXh/EK', 'test admin', 1, 'test.jpg'),
('owner', '$2y$10$AgYHO6QtqCZ3cD5C8mY7XOTt6VaFNgWpLk6xMve6RXTajK4pNtJ.m', 'Yusron Angga', 2, 'test.jpg'),
('test', '$2y$10$gTLcqV1X4mvi3g5J99gjxetKB4ukbOy459U9It3EfN5u/HnSSsQOe', '1', 3, 'test.jpg'),
('test2', '$2y$10$kh9Ye7MT9lfwKeDUEWUcnuhGXuCoKUc.LcaquKUtPj39tlO63QMWa', 'Valerie Luna', 3, 'test.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `level` FOREIGN KEY (`level`) REFERENCES `level` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
