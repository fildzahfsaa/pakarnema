-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2022 at 07:03 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pakarnema`
--

-- --------------------------------------------------------

--
-- Table structure for table `basiskasus`
--

CREATE TABLE `basiskasus` (
  `id_bkasus` int(11) NOT NULL,
  `kode_penyakit` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basiskasus`
--

INSERT INTO `basiskasus` (`id_bkasus`, `kode_penyakit`) VALUES
(2, 'K001'),
(3, 'K002'),
(4, 'K003');

-- --------------------------------------------------------

--
-- Table structure for table `detail_basiskasus`
--

CREATE TABLE `detail_basiskasus` (
  `id_dbkasus` int(11) NOT NULL,
  `id_bkasus` int(11) NOT NULL,
  `kode_gejala` varchar(55) NOT NULL,
  `bobot_pakar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_basiskasus`
--

INSERT INTO `detail_basiskasus` (`id_dbkasus`, `id_bkasus`, `kode_gejala`, `bobot_pakar`) VALUES
(1, 2, 'G002 ', 0.7),
(5, 4, 'G003', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_konsultasi`
--

CREATE TABLE `detail_konsultasi` (
  `id_dkonsultasi` int(11) NOT NULL,
  `id_konsultasi` int(11) NOT NULL,
  `kode_gejala` varchar(55) NOT NULL,
  `bobot_user` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kode_gejala` varchar(55) NOT NULL,
  `nama_gejala` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kode_gejala`, `nama_gejala`) VALUES
('G001', 'Lubang pada tanah'),
('G002 ', 'Akar busuk'),
('G003', 'Akar rusak');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `kode_penyakit` varchar(55) NOT NULL,
  `tgl_konsultasi` date NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kemiripan` varchar(5) NOT NULL,
  `kepastian` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kode_penyakit` varchar(55) NOT NULL,
  `nama_penyakit` varchar(200) NOT NULL,
  `penanganan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kode_penyakit`, `nama_penyakit`, `penanganan`) VALUES
('K001', 'Kutu Putih', 'Mengoleskan cairan alcohol dengan tisu, menyemprotkan pembasmi serangga / insektisida, dan menggunakan minyak nimba.'),
('K002', 'Kutu Sisik', 'Mengoleskan minyak hortikultura / sabun insektisida.'),
('K003', 'Kutu Daun', 'Mengoleskan alkohol, Menyemprotkan air jika aglaonema berada di dalam ruangan, Diberikan sabun insektisida.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(32) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`) VALUES
(1, 'Admin', 'admin', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basiskasus`
--
ALTER TABLE `basiskasus`
  ADD PRIMARY KEY (`id_bkasus`),
  ADD KEY `kode_penyakit` (`kode_penyakit`);

--
-- Indexes for table `detail_basiskasus`
--
ALTER TABLE `detail_basiskasus`
  ADD PRIMARY KEY (`id_dbkasus`),
  ADD KEY `id_bkasus` (`id_bkasus`),
  ADD KEY `kode_gejala` (`kode_gejala`);

--
-- Indexes for table `detail_konsultasi`
--
ALTER TABLE `detail_konsultasi`
  ADD PRIMARY KEY (`id_dkonsultasi`),
  ADD KEY `id_konsultasi` (`id_konsultasi`),
  ADD KEY `kode_gejala` (`kode_gejala`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`),
  ADD KEY `kode_penyakit` (`kode_penyakit`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basiskasus`
--
ALTER TABLE `basiskasus`
  MODIFY `id_bkasus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_basiskasus`
--
ALTER TABLE `detail_basiskasus`
  MODIFY `id_dbkasus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_konsultasi`
--
ALTER TABLE `detail_konsultasi`
  MODIFY `id_dkonsultasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basiskasus`
--
ALTER TABLE `basiskasus`
  ADD CONSTRAINT `basiskasus_ibfk_1` FOREIGN KEY (`kode_penyakit`) REFERENCES `penyakit` (`kode_penyakit`);

--
-- Constraints for table `detail_basiskasus`
--
ALTER TABLE `detail_basiskasus`
  ADD CONSTRAINT `detail_basiskasus_ibfk_1` FOREIGN KEY (`id_bkasus`) REFERENCES `basiskasus` (`id_bkasus`),
  ADD CONSTRAINT `detail_basiskasus_ibfk_2` FOREIGN KEY (`kode_gejala`) REFERENCES `gejala` (`kode_gejala`);

--
-- Constraints for table `detail_konsultasi`
--
ALTER TABLE `detail_konsultasi`
  ADD CONSTRAINT `detail_konsultasi_ibfk_1` FOREIGN KEY (`id_konsultasi`) REFERENCES `konsultasi` (`id_konsultasi`),
  ADD CONSTRAINT `detail_konsultasi_ibfk_2` FOREIGN KEY (`kode_gejala`) REFERENCES `gejala` (`kode_gejala`);

--
-- Constraints for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD CONSTRAINT `konsultasi_ibfk_1` FOREIGN KEY (`kode_penyakit`) REFERENCES `penyakit` (`kode_penyakit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
