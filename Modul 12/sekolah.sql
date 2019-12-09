-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 11:19 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` int(11) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `alamat_guru` varchar(100) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `alamat_guru`, `kode_mapel`) VALUES
(13579, 'Hastyana Rihardneswara', 'Karanganyar', 'a1');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `password`, `nip`) VALUES
(1, 'Hastyana', 'has12', 13579),
(2, 'Fiko', 'fik456', 24680);

-- --------------------------------------------------------

--
-- Table structure for table `pengajaran`
--

CREATE TABLE `pengajaran` (
  `id_mapel` int(11) NOT NULL,
  `kode_mapel` varchar(20) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  `nip` int(11) NOT NULL,
  `kriteria_pengajaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajaran`
--

INSERT INTO `pengajaran` (`id_mapel`, `kode_mapel`, `nama_mapel`, `nip`, `kriteria_pengajaran`) VALUES
(1, 'a1', 'Matematika', 13579, 'Sangat Baik');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `alamat_siswa` varchar(100) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `tahun_masuk` varchar(15) NOT NULL,
  `tahun_keluar` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `alamat_siswa`, `keterangan`, `tahun_masuk`, `tahun_keluar`) VALUES
(9876, 'Nugroho', 'Gonilan', 'Belum Lulus(S1)', '2017', '2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajaran`
--
ALTER TABLE `pengajaran`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengajaran`
--
ALTER TABLE `pengajaran`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
