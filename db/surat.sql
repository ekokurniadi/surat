-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2021 at 06:50 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `surat_domisili`
--

CREATE TABLE `surat_domisili` (
  `id` int(11) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `kewarganegaraan` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `rt_pengantar` varchar(255) NOT NULL,
  `nomor_surat_pengantar` varchar(255) NOT NULL,
  `tanggal_surat_pengantar` date NOT NULL,
  `keperluan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_domisili`
--

INSERT INTO `surat_domisili` (`id`, `nomor_surat`, `tanggal_surat`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `kewarganegaraan`, `pekerjaan`, `alamat`, `rt_pengantar`, `nomor_surat_pengantar`, `tanggal_surat_pengantar`, `keperluan`) VALUES
(1, '470/  /SLJ/2021', '2021-04-20', '1571020202950041', 'EKO KURNIADI', 'JAMBI', '2021-04-20', 'Laki-Laki', 'Islam', 'INDONESIA', 'KARYAWAN SWASTA', 'JAMBI', '38', '470/  /SLJ/2021', '2021-04-20', 'TES AJA');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_belum_memiliki_rumah`
--

CREATE TABLE `surat_keterangan_belum_memiliki_rumah` (
  `id` int(11) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nik` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `kewarganegaraan` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `rt_pengantar` varchar(255) NOT NULL,
  `nomor_surat_pengantar` varchar(255) NOT NULL,
  `tanggal_surat_pengantar` date NOT NULL,
  `keperluan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keterangan_belum_memiliki_rumah`
--

INSERT INTO `surat_keterangan_belum_memiliki_rumah` (`id`, `nomor_surat`, `tanggal_surat`, `nama`, `tempat_lahir`, `tanggal_lahir`, `nik`, `agama`, `jenis_kelamin`, `kewarganegaraan`, `pekerjaan`, `alamat`, `rt_pengantar`, `nomor_surat_pengantar`, `tanggal_surat_pengantar`, `keperluan`) VALUES
(1, '470/  /SLJ/2021', '0000-00-00', 'tess', 'JAMBI', '2021-04-20', '123', 'Islam', 'Laki-Laki', '', 'KARYAWAN SWASTA', 'jaambi', '12', '470/   /SLJ/2021', '2021-04-20', 'keperluan melengkapi Administrasi Pengambilan Kredit Rumah');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_belum_pernah_menikah`
--

CREATE TABLE `surat_keterangan_belum_pernah_menikah` (
  `id` int(11) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nik` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `kewarganegaraan` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `status_perkawinan` varchar(255) NOT NULL,
  `golongan_darah` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `rt_pengantar` varchar(255) NOT NULL,
  `nomor_surat_pengantar` varchar(255) NOT NULL,
  `tanggal_surat_pengantar` date NOT NULL,
  `keperluan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keterangan_belum_pernah_menikah`
--

INSERT INTO `surat_keterangan_belum_pernah_menikah` (`id`, `nomor_surat`, `tanggal_surat`, `nama`, `tempat_lahir`, `tanggal_lahir`, `nik`, `agama`, `jenis_kelamin`, `kewarganegaraan`, `pekerjaan`, `status_perkawinan`, `golongan_darah`, `alamat`, `rt_pengantar`, `nomor_surat_pengantar`, `tanggal_surat_pengantar`, `keperluan`) VALUES
(1, '472.2/  /SLJ/2021', '2021-04-20', 'TES', 'JAMBI', '2021-04-20', '1571020202950041', 'Islam', 'Laki-Laki', 'INDONESIA', 'KARYAWAN SWASTA', 'Kawin', 'A', 'JAMBI', '15', '472.2/    /SLJ/2021', '2021-04-20', 'dak lah');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_tidak_mampu`
--

CREATE TABLE `surat_keterangan_tidak_mampu` (
  `id` int(11) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nik` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `rt_pengantar` varchar(255) NOT NULL,
  `nomor_surat_pengantar` varchar(255) NOT NULL,
  `tanggal_surat_pengantar` date NOT NULL,
  `keperluan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keterangan_tidak_mampu`
--

INSERT INTO `surat_keterangan_tidak_mampu` (`id`, `nomor_surat`, `nama`, `tempat_lahir`, `tanggal_lahir`, `nik`, `agama`, `jenis_kelamin`, `pekerjaan`, `alamat`, `rt_pengantar`, `nomor_surat_pengantar`, `tanggal_surat_pengantar`, `keperluan`) VALUES
(1, '470/    /SLJ/2021', 'tes', 'JAMBI', '2021-04-20', '123', 'Islam', 'Laki-Laki', 'SWASTA', 'JAMBI', '12', '470/    /SLJ/2021', '2021-04-20', 'Syarat pengusulan DTKS');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_usaha`
--

CREATE TABLE `surat_keterangan_usaha` (
  `id` int(11) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `kewarganegaraan` varchar(255) NOT NULL,
  `golongan_darah` varchar(255) NOT NULL,
  `status_perkawinan` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `rt` varchar(255) NOT NULL,
  `alamat_tempat_tinggal` text NOT NULL,
  `rt_pengantar` varchar(255) NOT NULL,
  `nomor_surat_pengantar` varchar(255) NOT NULL,
  `tanggal_surat_pengantar` date NOT NULL,
  `keperluan` text NOT NULL,
  `usaha` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keterangan_usaha`
--

INSERT INTO `surat_keterangan_usaha` (`id`, `nomor_surat`, `tanggal_surat`, `nama`, `nik`, `tempat`, `tgl_lahir`, `jenis_kelamin`, `pekerjaan`, `kewarganegaraan`, `golongan_darah`, `status_perkawinan`, `agama`, `rt`, `alamat_tempat_tinggal`, `rt_pengantar`, `nomor_surat_pengantar`, `tanggal_surat_pengantar`, `keperluan`, `usaha`) VALUES
(1, '470/    /SLJ/2021', '2021-04-20', 'DANIEL PARDAMEAN', '123456789', 'SELINCAH', '2021-04-20', 'Perempuan', 'SWASTA', 'INDONESIA', 'A', 'Kawin', 'Islam', '15', 'SELINCAH', '15', '470/   /SLJ/2021', '2021-04-20', 'MENDAPATKAN BANTUAN USAHA MIKRO KECIL MENENGAH (UMKM).', 'Jualan Gorengan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', '12345', 'Admin'),
(2, 'operator', 'operator', '123', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat_domisili`
--
ALTER TABLE `surat_domisili`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_keterangan_belum_memiliki_rumah`
--
ALTER TABLE `surat_keterangan_belum_memiliki_rumah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_keterangan_belum_pernah_menikah`
--
ALTER TABLE `surat_keterangan_belum_pernah_menikah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_keterangan_tidak_mampu`
--
ALTER TABLE `surat_keterangan_tidak_mampu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_keterangan_usaha`
--
ALTER TABLE `surat_keterangan_usaha`
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
-- AUTO_INCREMENT for table `surat_domisili`
--
ALTER TABLE `surat_domisili`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_keterangan_belum_memiliki_rumah`
--
ALTER TABLE `surat_keterangan_belum_memiliki_rumah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_keterangan_belum_pernah_menikah`
--
ALTER TABLE `surat_keterangan_belum_pernah_menikah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_keterangan_tidak_mampu`
--
ALTER TABLE `surat_keterangan_tidak_mampu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_keterangan_usaha`
--
ALTER TABLE `surat_keterangan_usaha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
