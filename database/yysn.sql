-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 12, 2021 at 12:46 PM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 5.6.40-12+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yysn`
--

-- --------------------------------------------------------

--
-- Table structure for table `kontrak`
--

CREATE TABLE `kontrak` (
  `kd_kontrak` int(11) NOT NULL,
  `kd_pembantu` int(11) NOT NULL,
  `kd_majikan` int(11) NOT NULL,
  `biaya_admin` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tanggal_kontrak` date NOT NULL,
  `tanggal_pembayaran_kontrak` datetime NOT NULL,
  `status_kontrak` enum('Belum Dibayar','Diverifikasi','Batal') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontrak`
--

INSERT INTO `kontrak` (`kd_kontrak`, `kd_pembantu`, `kd_majikan`, `biaya_admin`, `total`, `tanggal_kontrak`, `tanggal_pembayaran_kontrak`, `status_kontrak`) VALUES
(1, 1, 1, 500000, 3300000, '2020-09-07', '2020-09-07 14:24:08', 'Belum Dibayar'),
(7, 3, 1, 500000, 3500000, '2020-09-08', '2020-09-08 01:31:00', 'Diverifikasi'),
(8, 1, 1, 500000, 3300000, '2020-09-08', '2020-09-08 04:12:20', 'Batal'),
(9, 1, 1, 500000, 3300000, '2020-09-09', '2020-09-09 15:14:08', 'Batal'),
(10, 1, 4, 500000, 3300000, '0000-00-00', '0000-00-00 00:00:00', 'Belum Dibayar'),
(11, 3, 5, 500000, 3500000, '0000-00-00', '0000-00-00 00:00:00', 'Belum Dibayar'),
(12, 3, 5, 500000, 3500000, '0000-00-00', '0000-00-00 00:00:00', 'Belum Dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `majikan`
--

CREATE TABLE `majikan` (
  `kd_majikan` int(11) NOT NULL,
  `kd_user` int(11) DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama_majikan` varchar(128) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `email_majikan` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `alamat_majikan` text,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `telepon` varchar(16) DEFAULT NULL,
  `foto_majikan` varchar(50) DEFAULT NULL,
  `foto_ktp` varchar(128) DEFAULT NULL,
  `foto_kk` varchar(128) DEFAULT NULL,
  `status` enum('Terverifikasi','Belum Terverifikasi') DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `majikan`
--

INSERT INTO `majikan` (`kd_majikan`, `kd_user`, `nik`, `nama_majikan`, `username`, `email_majikan`, `password`, `alamat_majikan`, `jenis_kelamin`, `telepon`, `foto_majikan`, `foto_ktp`, `foto_kk`, `status`, `tanggal_daftar`) VALUES
(1, 12, '3275060807900011', 'Dimas Aldi Patria', 'dimasaldi', 'dimaspatria21@gmail.com', '$2y$10$UirND8tCKvum.GFt9qzQ1OHDFeYz62CkMOMhU1hNY0iYhryS5LbLu', 'Jl. prof. Dr. Hamka No. 2 Larangan Selatan, Tangerang, Banten', 'Laki-Laki', '0895803278324', 'majikan.jpg', 'ktp.jpg', 'kk.jpg', 'Terverifikasi', '2020-09-06 16:27:04'),
(4, 12, '1671145809910002', 'Wahyu Eko Saputro', 'wahyuekoy', 'wahyuekoy2019@gmail.com', '$2y$10$UirND8tCKvum.GFt9qzQ1OHDFeYz62CkMOMhU1hNY0iYhryS5LbLu', 'Kreo, Larangan Selatan, Tangerang', 'Laki-Laki', '08871884526', 'foto_majikan_.jpg', 'ktp.jpeg', 'kk1.jpeg', 'Terverifikasi', '2020-09-10 02:04:18'),
(5, 13, '1111111111111111', 'hades', 'hades', 'hades@yopmail.com', '$2y$10$cmXx1H89qB.E2j3N9SzyHO4GF5dbQMY6/qBeOxLoHXSy3vBHcwZKm', 'tesa', 'Laki-Laki', '08118782332', 'foto_majikan_.jpg', 'ktp.jpeg', 'kk1.jpeg', 'Terverifikasi', '2021-03-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `negosiasi`
--

CREATE TABLE `negosiasi` (
  `kd_negosiasi` int(11) NOT NULL,
  `kd_pembantu` int(11) NOT NULL,
  `kd_majikan` int(11) NOT NULL,
  `biaya_admin` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status_negosiasi` enum('Diproses','Diterima','Ditolak') DEFAULT NULL,
  `tanggal_negosiasi` date DEFAULT NULL,
  `update_tanggal_negosiasi` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembantu`
--

CREATE TABLE `pembantu` (
  `kd_pembantu` int(11) NOT NULL,
  `kd_user` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `username_pembantu` varchar(50) DEFAULT NULL,
  `nama_pembantu` varchar(128) DEFAULT NULL,
  `email_pembantu` varchar(50) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `alamat_pembantu` text,
  `foto_pembantu` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `agama` enum('Islam','Kristen','Protestan','Hindu','Budha') DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `tinggi` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `menginap` enum('Ya','Tidak') DEFAULT NULL,
  `pendidikan` enum('SD','SMP','SMA','SMK') DEFAULT NULL,
  `status` enum('Belum Menikah','Menikah','Janda/Duda') DEFAULT NULL,
  `pengalaman` varchar(20) DEFAULT NULL,
  `foto_ktp` varchar(50) DEFAULT NULL,
  `surat_polisi` varchar(50) DEFAULT NULL,
  `surat_dokter` varchar(50) DEFAULT NULL,
  `keterampilan` text,
  `gaji` int(11) DEFAULT NULL,
  `nama_bank` enum('BNI','BRI','MANDIRI','BCA') NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `status_pembantu` enum('Terverifikasi','Belum Terverifikasi') DEFAULT NULL,
  `kategori` enum('Tersedia','Tidak Tersedia') DEFAULT NULL,
  `banyak_dilihat` int(11) DEFAULT NULL,
  `tanggal_ditambahkan` datetime DEFAULT CURRENT_TIMESTAMP,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembantu`
--

INSERT INTO `pembantu` (`kd_pembantu`, `kd_user`, `nik`, `username_pembantu`, `nama_pembantu`, `email_pembantu`, `telepon`, `password`, `alamat_pembantu`, `foto_pembantu`, `jenis_kelamin`, `agama`, `umur`, `tinggi`, `berat`, `menginap`, `pendidikan`, `status`, `pengalaman`, `foto_ktp`, `surat_polisi`, `surat_dokter`, `keterampilan`, `gaji`, `nama_bank`, `no_rekening`, `status_pembantu`, `kategori`, `banyak_dilihat`, `tanggal_ditambahkan`, `deskripsi`) VALUES
(1, 12, '6787638262819267', 'yasminusminah', 'Yasmin Usmainah', 'yusmin2@gmail.com', '08871884526', '$2y$10$UirND8tCKvum.GFt9qzQ1OHDFeYz62CkMOMhU1hNY0iYhryS5LbLu', 'Jl. H. Radi. No.7 RT.04/09, Kreo, Larangan, Tangerang, Banten', 'yusmin.jpg', 'Perempuan', 'Islam', 43, 169, 55, 'Ya', 'SD', 'Menikah', '4 Tahun', 'ktp.jpeg', 'skck.jpg', 'dokter.jpg', 'Memasak, Mencuci, Menggosok', 2800000, 'BRI', '16161616', 'Terverifikasi', 'Tidak Tersedia', 84, '2020-09-06 01:10:22', 'Pengalaman kerja 4 tahun sebagai prt serabutan bersikap sopan santun baik dan jujur dan mampu bekerja serabutan di dalam bidang rumah tangga siap kerja hari ini'),
(2, 12, '3271046504930002', 'indahratna', 'Indah Ratna Furi', 'indahfuri2@gmail.com', '0895803278324', '$2y$10$mZeo4wBWhvcRmSikbTFf.ueUqAiSmK44H1LpEggZ9wPMy50GXYGeq', 'Tangerang', 'indah.jpg', 'Perempuan', 'Islam', 24, 150, 50, 'Ya', 'SMP', 'Belum Menikah', '1 Tahun', 'ktp1.jpeg', 'skck1.jpg', 'dokter1.jpg', 'Memasak, Mencuci', 2800000, 'BNI', '13131313', 'Terverifikasi', 'Tersedia', 11, '2020-09-06 13:07:31', 'Saya merupakan orang yang sangat cekatan.'),
(3, 12, '3276046501920003', 'dodizakaria', 'Dodi Zakari', 'dodi2@gmail.com', '088718845283', '$2y$10$IxnRSCVMjIEjWxXt/iRLhOJveDjuUhjt.ICqUDg0WYDnp.rEQq6KO', 'Jl. Ciledug RAYA, No.1', 'images.jpg', 'Laki-laki', 'Islam', 24, 145, 45, 'Ya', 'SMK', 'Menikah', '24 Tahun', 'scan_Ktp.jpg', 'scan_SKCK.jpg', 'Surat_Keterangan_Sehat.jpg', 'Menyapu', 3000000, 'BNI', '13414151', 'Terverifikasi', 'Tidak Tersedia', 13, '2020-09-07 16:07:54', 'Saya adalah orang yang rajin dan cekatan'),
(5, 12, '3275060807900011', 'debbyanggraini', 'Debby Anggraini', 'debbyanggraini@gmail.com', '08891884526', '$2y$10$l1zSvL9ny640zawUEtwfH.uv7wn7OCHbr4VRtPrGvMFCeaqfq7bIi', 'Kreo, Tangerang', 'Debby.jpg', 'Perempuan', 'Kristen', 45, 165, 45, 'Ya', 'SMA', 'Belum Menikah', '1 Tahun', 'KTP_Debby.JPG', 'SKCK_Debby.jpg', 'Surat_Dokter_Debby.jpeg', 'Mencuci', 2500000, 'BNI', '12121212', 'Terverifikasi', 'Tersedia', NULL, '2020-09-11 02:27:07', 'Saya adalah wanita yang rajin dan cekatan'),
(6, 13, '4412312312412314', 'sinyo', 'sinyo', 'sinyo@yopmail.com', '09120391239', '$2y$10$cmXx1H89qB.E2j3N9SzyHO4GF5dbQMY6/qBeOxLoHXSy3vBHcwZKm', 'afasd', 'images.jpg', 'Laki-laki', 'Islam', 22, 22, 22, 'Ya', 'SMK', 'Belum Menikah', '23', 'ktp.jpeg', 'skck.jpg', 'dokter.jpg', 'asd', 90000, 'BNI', '34232323423432', 'Terverifikasi', 'Tersedia', 23, '2021-03-31 00:00:00', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kd_pembayaran` int(11) NOT NULL,
  `kd_kontrak` int(11) NOT NULL,
  `kd_pembantu` int(11) NOT NULL,
  `kd_majikan` int(11) NOT NULL,
  `bukti_pembayaran` varchar(100) DEFAULT NULL,
  `diverifikasi` int(11) DEFAULT NULL,
  `jumlah_pembayaran` int(11) DEFAULT NULL,
  `status_pembayaran` enum('Menunggu Verifikasi','Diverifikasi','Ditolak') DEFAULT NULL,
  `tanggal_pembayaran` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`kd_pembayaran`, `kd_kontrak`, `kd_pembantu`, `kd_majikan`, `bukti_pembayaran`, `diverifikasi`, `jumlah_pembayaran`, `status_pembayaran`, `tanggal_pembayaran`) VALUES
(1, 1, 1, 1, 'bukti.jpg', 1, 3300000, 'Diverifikasi', '2020-09-07 14:56:37'),
(3, 9, 1, 1, 'bukti_.jpg', 0, 2800000, 'Ditolak', '2020-09-09 18:19:19'),
(4, 9, 3, 1, 'bukti_1.jpg', 0, 3500000, 'Menunggu Verifikasi', '2020-09-09 18:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `kd_pesan` int(11) NOT NULL,
  `kd_majikan` int(11) DEFAULT NULL,
  `subjek` varchar(100) NOT NULL,
  `pesan` text,
  `tanggal_pesan` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`kd_pesan`, `kd_majikan`, `subjek`, `pesan`, `tanggal_pesan`) VALUES
(8, 1, 'ada', 'ada', '2020-09-08 12:26:05'),
(9, 4, 'Hallo', 'Bagaimana cara pesan pembantu ya min ?', '2020-09-13 17:11:19'),
(10, 4, 'dodi', 'dodi', '2020-09-13 19:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE `statistik` (
  `kd_statistik` int(11) NOT NULL,
  `kd_majikan` int(11) DEFAULT NULL,
  `pengunjung_ip` varchar(20) DEFAULT NULL,
  `pengunjung_perangkat` varchar(100) DEFAULT NULL,
  `pengunjung_tanggal` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`kd_statistik`, `kd_majikan`, `pengunjung_ip`, `pengunjung_perangkat`, `pengunjung_tanggal`) VALUES
(1, 4, '::1', 'Chrome', '2020-09-13 19:58:21'),
(2, 5, '::1', 'Chrome', '2021-03-13 22:35:50'),
(3, 5, '::1', 'Chrome', '2021-03-14 00:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kd_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(128) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `alamat_lengkap` text,
  `gambar` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `tanggal_dibuat` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kd_user`, `username`, `nama_lengkap`, `email`, `jenis_kelamin`, `telepon`, `alamat_lengkap`, `gambar`, `password`, `status`, `tanggal_dibuat`) VALUES
(12, 'Admin', 'Administrator', 'admin@gmail.com', 'Laki-Laki', '08811884526', 'Tangerang', 'user_.jpg', '$2y$10$UirND8tCKvum.GFt9qzQ1OHDFeYz62CkMOMhU1hNY0iYhryS5LbLu', 'Aktif', '2020-05-23 15:09:08'),
(13, 'Admin 2', 'Administrator 2', 'admin@yopmail.com', 'Laki-Laki', '09828289123', 'tasd', 'user_.jpg', '$2y$10$cmXx1H89qB.E2j3N9SzyHO4GF5dbQMY6/qBeOxLoHXSy3vBHcwZKm', 'Aktif', '2021-03-24 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kontrak`
--
ALTER TABLE `kontrak`
  ADD PRIMARY KEY (`kd_kontrak`),
  ADD KEY `kd_pembantu` (`kd_pembantu`),
  ADD KEY `kd_majikan` (`kd_majikan`);

--
-- Indexes for table `majikan`
--
ALTER TABLE `majikan`
  ADD PRIMARY KEY (`kd_majikan`),
  ADD KEY `kd_user` (`kd_user`);

--
-- Indexes for table `negosiasi`
--
ALTER TABLE `negosiasi`
  ADD PRIMARY KEY (`kd_negosiasi`),
  ADD KEY `kd_pembantu` (`kd_pembantu`),
  ADD KEY `kd_majikan` (`kd_majikan`);

--
-- Indexes for table `pembantu`
--
ALTER TABLE `pembantu`
  ADD PRIMARY KEY (`kd_pembantu`),
  ADD KEY `kd_user` (`kd_user`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kd_pembayaran`),
  ADD KEY `kd_kontrak` (`kd_kontrak`),
  ADD KEY `kd_pembantu` (`kd_pembantu`),
  ADD KEY `kd_majikan` (`kd_majikan`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`kd_pesan`),
  ADD KEY `kd_majikan` (`kd_majikan`);

--
-- Indexes for table `statistik`
--
ALTER TABLE `statistik`
  ADD PRIMARY KEY (`kd_statistik`),
  ADD KEY `kd_majikan` (`kd_majikan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kd_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kontrak`
--
ALTER TABLE `kontrak`
  MODIFY `kd_kontrak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `majikan`
--
ALTER TABLE `majikan`
  MODIFY `kd_majikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `negosiasi`
--
ALTER TABLE `negosiasi`
  MODIFY `kd_negosiasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembantu`
--
ALTER TABLE `pembantu`
  MODIFY `kd_pembantu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `kd_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `kd_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `statistik`
--
ALTER TABLE `statistik`
  MODIFY `kd_statistik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `kd_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kontrak`
--
ALTER TABLE `kontrak`
  ADD CONSTRAINT `kontrak_ibfk_1` FOREIGN KEY (`kd_pembantu`) REFERENCES `pembantu` (`kd_pembantu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kontrak_ibfk_2` FOREIGN KEY (`kd_majikan`) REFERENCES `majikan` (`kd_majikan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `majikan`
--
ALTER TABLE `majikan`
  ADD CONSTRAINT `majikan_ibfk_1` FOREIGN KEY (`kd_user`) REFERENCES `user` (`kd_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `negosiasi`
--
ALTER TABLE `negosiasi`
  ADD CONSTRAINT `negosiasi_ibfk_1` FOREIGN KEY (`kd_majikan`) REFERENCES `majikan` (`kd_majikan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `negosiasi_ibfk_2` FOREIGN KEY (`kd_pembantu`) REFERENCES `pembantu` (`kd_pembantu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembantu`
--
ALTER TABLE `pembantu`
  ADD CONSTRAINT `pembantu_ibfk_1` FOREIGN KEY (`kd_user`) REFERENCES `user` (`kd_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`kd_majikan`) REFERENCES `majikan` (`kd_majikan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`kd_pembantu`) REFERENCES `pembantu` (`kd_pembantu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`kd_kontrak`) REFERENCES `kontrak` (`kd_kontrak`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`kd_majikan`) REFERENCES `majikan` (`kd_majikan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `statistik`
--
ALTER TABLE `statistik`
  ADD CONSTRAINT `statistik_ibfk_1` FOREIGN KEY (`kd_majikan`) REFERENCES `majikan` (`kd_majikan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
