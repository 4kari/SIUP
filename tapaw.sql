-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2019 at 11:54 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tapaw`
--

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE `izin` (
  `id_izin` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `tglmulai` varchar(20) NOT NULL,
  `tglkembali` varchar(20) NOT NULL,
  `ket_izin` varchar(50) NOT NULL,
  `id_musahil` int(11) DEFAULT NULL,
  `id_pengurus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jk`
--

CREATE TABLE `jk` (
  `id_jk` int(11) NOT NULL,
  `jk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jk`
--

INSERT INTO `jk` (`id_jk`, `jk`) VALUES
(1, 'laki-laki'),
(2, 'perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `musahil`
--

CREATE TABLE `musahil` (
  `id_musahil` int(11) NOT NULL,
  `nama_musahil` varchar(50) NOT NULL,
  `kamar_musahil` int(11) NOT NULL,
  `gedung_musahil` varchar(11) NOT NULL,
  `nowa_musahil` varchar(30) NOT NULL,
  `user_musahil` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `musahil`
--

INSERT INTO `musahil` (`id_musahil`, `nama_musahil`, `kamar_musahil`, `gedung_musahil`, `nowa_musahil`, `user_musahil`) VALUES
(3, 'nur', 2, 'r', '2334', 'musahil');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `id_pengurus` int(11) DEFAULT NULL,
  `tgl_bayar` varchar(20) NOT NULL,
  `jml_bayar` varchar(30) NOT NULL,
  `ket_bayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_daftar` int(11) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `nim` varchar(30) NOT NULL,
  `prodi` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `id_jk` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `file_ktm` varchar(40) NOT NULL,
  `id_pengurus` int(11) DEFAULT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `nowa` varchar(25) NOT NULL,
  `bukti_bayar` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_daftar`, `namalengkap`, `nim`, `prodi`, `alamat`, `id_jk`, `foto`, `file_ktm`, `id_pengurus`, `tgl_lahir`, `nowa`, `bukti_bayar`, `keterangan`) VALUES
(27, 'Ahmad Khairi Ramadan', '170411100099', 'Teknik Informatika', 'Sampang', 1, 'coba.jpg', '1.jpg', NULL, '19/09/1999', '089763234567', 'key.jpg', 'menunggu validasi'),
(28, 'YUNIA PUSPITA', '170411100035', 'Teknik Informatika', 'BOJONEGORO', 1, 'fotoku.jpg', 'key2.jpg', NULL, '12/06/1999', '082322889883', 'key21.jpg', 'Sudah di verivikasi silahkan buat akun'),
(29, 'Suci Lestari', '170411100013', 'Sistem Informasi', 'Lamongan', 2, 'profil.jpg', 'ktm.jpg', NULL, '13/07/1997', '098765432123', 'key.jpg', 'menunggu validasi'),
(30, 'Avi Eviana', '170411100011', 'Manajemen', 'Nganjuk', 2, 'profil.jpg', 'ktm.jpg', NULL, '20/01/1998', '086765345678', 'key.jpg', 'menunggu validasi'),
(31, 'ASRI LESTARI', '170411100071', 'Teknik Industri', 'Tuban', 2, 'profil.jpg', 'key.jpg', NULL, '10/12/1998', '085234567890', 'key1.jpg', 'menunggu validasi'),
(32, 'Deddy Corbuser', '180311100034', 'Teknik Mesin', 'Jakarta', 1, 'bisnis.png', 'key.jpg', NULL, '23/04/1997', '089765345123', NULL, 'tidak ada bukti pembayaran'),
(33, 'Ricky Harun', '170322200017', 'Pendidikan Ipa', 'Bandung', 1, 'profil.jpg', 'key.jpg', NULL, '17/09/1998', '087654123456', NULL, 'tidak ada bukti pembayaran'),
(34, 'Maia Estianty', '170211110038', 'Agribisnis', 'Surabaya', 2, 'profil.jpg', 'ktm.jpg', NULL, '17/08/1998', '087987987654', NULL, 'tidak ada bukti pembayaran'),
(35, 'Rizky Febian', '160300211398', 'Agroteknologi', 'Jakarta', 1, 'profil.jpg', 'ktm.jpg', NULL, '20/09/1997', '087987098009', NULL, 'tidak ada bukti pembayaran'),
(36, 'Nikita Willy', '170400011198', 'Teknik Industri', 'SURABAYA', 2, 'profil.jpg', 'ktm.jpg', NULL, '09/09/2000', '098765345321', NULL, 'tidak ada bukti pembayaran'),
(37, 'Luna Maya', '180911100034', 'Manajemen', 'Kalimantan', 2, 'profil.jpg', 'ktm.jpg', NULL, '12/08/2000', '086789234123', NULL, 'tidak ada bukti pembayaran'),
(38, 'Gilang Dirga', '170411100019', 'Agribisnis', 'Jombang', 1, 'profil.jpg', 'ktm.jpg', NULL, '13/09/1998', '089889887667', 'key.jpg', 'menunggu validasi'),
(39, 'Ruben Onsu', '18021130003', 'Pendidikan Informatika', 'Gresik', 1, 'profil.jpg', 'ktm.jpg', NULL, '10/09/2000', '081234567890', NULL, 'tidak ada bukti pembayaran'),
(40, 'Sania Marta D', '180911100023', 'Teknik Mesin', 'Malang', 2, 'profil.jpg', 'ktm.jpg', NULL, '23/08/1998', '081234456443', NULL, 'tidak ada bukti pembayaran'),
(41, 'Nisa Sabyan', '18091110001', 'Sosiologi', 'Nganjuk', 2, 'profil.jpg', 'ktm.jpg', NULL, '19/07/2000', '089889887667', NULL, 'tidak ada bukti pembayaran'),
(42, 'Sule Sule', '12081123003', 'Pendidikan Bahasa Indonesia', 'Bangkalan', 1, 'profil.jpg', 'ktm.jpg', NULL, '09/08/2000', '087654123123', NULL, 'tidak ada bukti pembayaran'),
(43, 'Yusep Pendika', '180211100039', 'Keislaman', 'Pamekasan ', 1, 'profil.jpg', 'ktm.jpg', NULL, '14/09/1998', '087654234567', NULL, 'tidak ada bukti pembayaran'),
(44, 'Rudi Widodo', '190811100009', 'Pendidikan Informatika', 'Jakarta', 1, 'profil.jpg', 'ktm.jpg', NULL, '25/09/1998', '098765345123', NULL, 'tidak ada bukti pembayaran'),
(45, 'Heru Setiawan ', '19081100045', 'Sistem Informasi', 'Surabaya', 1, 'profil.jpg', 'ktm.jpg', NULL, '16/06/2000', '098765432112', NULL, 'tidak ada bukti pembayaran'),
(46, 'Raffi Ahmad', '13091100023', 'Teknik Informatika', 'Jombang', 1, 'profil.jpg', 'ktm.jpg', NULL, '16/06/2000', '089767890987', NULL, 'tidak ada bukti pembayaran'),
(47, 'Citra Kirana', '170411100096', 'Teknik Informatika', 'Jakarta', 2, 'profil.jpg', 'ktm.jpg', NULL, '12/08/2000', '081235678234', NULL, 'tidak ada bukti pembayaran'),
(48, 'Syahrini', '180411100012', 'Agroteknologi', 'Bandung', 2, 'profil.jpg', 'ktm.jpg', NULL, '08/05/2000', '062345636242', NULL, 'tidak ada bukti pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` int(11) NOT NULL,
  `user_pengurus` varchar(50) NOT NULL,
  `nama_pengurus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `user_pengurus`, `nama_pengurus`) VALUES
(1, 'pengurus', 'yuuu');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`) VALUES
('musahil', 'd8ab3904af3c02efcc0ffcfa80c2f68c7261c84c79d6b5c6ae33a673ab029ee2', 2),
('pengurus', '36142a6978c1d7f3063996e964a1a644d280eaf4c55d44c2056fab086742e495', 1),
('pita', '69530ff425efb5d214edcf7535dd19f8d0610289765c4471da14d18b8117a944', 3),
('test', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 3),
('warga', 'c85baf447fd328b85bb8eecd0604f714fec635b5663334cba9bdae13b05f57f4', 3);

-- --------------------------------------------------------

--
-- Table structure for table `wargaasrama`
--

CREATE TABLE `wargaasrama` (
  `id_warga` int(11) NOT NULL,
  `id_musahil` int(20) DEFAULT NULL,
  `nama_warga` varchar(50) NOT NULL,
  `nim_warga` varchar(20) NOT NULL,
  `prodi_warga` varchar(50) NOT NULL,
  `id_jk` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tgllahir` varchar(30) NOT NULL,
  `kamar` varchar(10) DEFAULT NULL,
  `gedung` varchar(10) DEFAULT NULL,
  `user_warga` varchar(30) NOT NULL,
  `nowa_warga` varchar(20) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wargaasrama`
--

INSERT INTO `wargaasrama` (`id_warga`, `id_musahil`, `nama_warga`, `nim_warga`, `prodi_warga`, `id_jk`, `alamat`, `tgllahir`, `kamar`, `gedung`, `user_warga`, `nowa_warga`, `foto`) VALUES
(5, 3, 'test', 'test', 'test', 1, 'test', '2019-11-12', 'test', 'test', 'warga', 'test', ''),
(8, NULL, 'Ahmad Khairi Ramadan', '170411100099', 'T. Informatika', 1, 'Trunojoyo', '18121998', NULL, NULL, 'test', '085203580638', 'coba.jpg'),
(9, NULL, 'YUNIA PUSPITA', '170411100035', 'Teknik Informatika', 1, 'BOJONEGORO', '12/06/1999', NULL, NULL, 'pita', '082322889883', 'fotoku.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jk`
--
ALTER TABLE `jk`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indexes for table `musahil`
--
ALTER TABLE `musahil`
  ADD PRIMARY KEY (`id_musahil`),
  ADD KEY `user_musahil` (`user_musahil`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `warga` (`id_warga`),
  ADD KEY `pengur` (`id_pengurus`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `peng` (`id_pengurus`),
  ADD KEY `jkk` (`id_jk`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`),
  ADD KEY `user_pengurus` (`user_pengurus`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `wargaasrama`
--
ALTER TABLE `wargaasrama`
  ADD PRIMARY KEY (`id_warga`),
  ADD KEY `idmusahil` (`id_musahil`),
  ADD KEY `jk` (`id_jk`),
  ADD KEY `user_warga` (`user_warga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jk`
--
ALTER TABLE `jk`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `musahil`
--
ALTER TABLE `musahil`
  MODIFY `id_musahil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wargaasrama`
--
ALTER TABLE `wargaasrama`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `musahil`
--
ALTER TABLE `musahil`
  ADD CONSTRAINT `user_musahil` FOREIGN KEY (`user_musahil`) REFERENCES `user` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pengur` FOREIGN KEY (`id_pengurus`) REFERENCES `pengurus` (`id_pengurus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `warga` FOREIGN KEY (`id_warga`) REFERENCES `wargaasrama` (`id_warga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `jkk` FOREIGN KEY (`id_jk`) REFERENCES `jk` (`id_jk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peng` FOREIGN KEY (`id_pengurus`) REFERENCES `pengurus` (`id_pengurus`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD CONSTRAINT `user_pengurus` FOREIGN KEY (`user_pengurus`) REFERENCES `user` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `wargaasrama`
--
ALTER TABLE `wargaasrama`
  ADD CONSTRAINT `idmusahil` FOREIGN KEY (`id_musahil`) REFERENCES `musahil` (`id_musahil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jk` FOREIGN KEY (`id_jk`) REFERENCES `jk` (`id_jk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wargaasrama_ibfk_1` FOREIGN KEY (`user_warga`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
