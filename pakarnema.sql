-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2022 at 04:35 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(32) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Admin', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `basiskasus`
--

CREATE TABLE `basiskasus` (
  `id_bkasus` int(11) NOT NULL,
  `kode_penyakit` varchar(55) NOT NULL,
  `kode_gejala` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basiskasus`
--

INSERT INTO `basiskasus` (`id_bkasus`, `kode_penyakit`, `kode_gejala`) VALUES
(6, 'K001', 'G001'),
(7, 'K001', 'G011'),
(8, 'K001', 'G013'),
(9, 'K001', 'G026'),
(10, 'K001', 'G019'),
(11, 'K002', 'G024'),
(12, 'K002', 'G019'),
(13, 'K002', 'G023'),
(14, 'K002', 'G016'),
(15, 'K002', 'G027'),
(16, 'K003', 'G013'),
(17, 'K003', 'G019'),
(18, 'K003', 'G005'),
(19, 'K003', 'G028'),
(20, 'K004', 'G022'),
(21, 'K004', 'G019'),
(22, 'K004', 'G025'),
(23, 'K005', 'G034'),
(24, 'K005', 'G014'),
(25, 'K005', 'G015'),
(26, 'K006', 'G033'),
(27, 'K006', 'G014'),
(28, 'K006', 'G015'),
(29, 'K007', 'G019'),
(30, 'K007', 'G017'),
(31, 'K007', 'G002'),
(32, 'K008', 'G003'),
(33, 'K008', 'G018'),
(34, 'K008', 'G023'),
(35, 'K009', 'G031'),
(36, 'K009', 'G017'),
(37, 'K009', 'G022'),
(38, 'K009', 'G019'),
(39, 'K009', 'G023'),
(40, 'K009', 'G010'),
(41, 'K010', 'G016'),
(42, 'K010', 'G019'),
(43, 'K010', 'G026'),
(44, 'K010', 'G030'),
(45, 'K010', 'G029'),
(46, 'K011', 'G035'),
(47, 'K011', 'G013'),
(48, 'K011', 'G023'),
(49, 'K011', 'G036'),
(50, 'K012', 'G032'),
(51, 'K012', 'G012'),
(52, 'K012', 'G008'),
(53, 'K012', 'G009'),
(54, 'K012', 'G019'),
(55, 'K013', 'G038'),
(56, 'K013', 'G037'),
(57, 'K013', 'G018'),
(58, 'K014', 'G020'),
(59, 'K014', 'G021'),
(60, 'K014', 'G007'),
(61, 'K014', 'G006'),
(62, 'K014', 'G004'),
(63, 'K015', 'G024'),
(64, 'K015', 'G021'),
(65, 'K015', 'G018');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kode_gejala` varchar(55) NOT NULL,
  `nama_gejala` varchar(200) NOT NULL,
  `bobot_pakar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kode_gejala`, `nama_gejala`, `bobot_pakar`) VALUES
('G001', 'Lubang Pada Tanah', 0.6),
('G002', 'Akar Busuk', 0.8),
('G003', 'Akar Rusak', 0.6),
('G004', 'Akar Berwarna Coklat Kehitaman', 0.8),
('G005', 'Batang Lunak', 0.6),
('G006', 'Batang Layu', 0.4),
('G007', 'Batang Berlubang', 0.4),
('G008', 'Batang Menghitam', 0.6),
('G009', 'Batang Membusuk Tapi Tidak Berbau', 0.8),
('G010', 'Tanaman Gagal Membentuk Tunas Baru', 0.8),
('G011', 'Tunas Berlubang', 0.4),
('G012', 'Tulang Daun Pucat Menjadi Coklat Keabuan', 0.8),
('G013', 'Daun Berlubang', 0.8),
('G014', 'Daun Keropos', 0.8),
('G015', 'Daun Menggulung', 1),
('G016', 'Daun Mengerut', 0.8),
('G017', 'Daun Mengecil', 0.4),
('G018', 'Daun Berubah Warna', 1),
('G019', 'Daun Menguning', 1),
('G020', 'Daun Pucat', 0.6),
('G021', 'Daun Membusuk', 0.8),
('G022', 'Daun Layu', 1),
('G023', 'Daun Gugur', 0.6),
('G024', 'Bintik Pada Daun', 0.8),
('G025', 'Bintik Kuning Pada Dasar Daun', 0.4),
('G026', 'Bintik Hitam Pada Daun', 0.6),
('G027', 'Terlihat Kutu di Permukaan Daun', 1),
('G028', 'Terlihat Kutu di Bagian Bawah Daun', 1),
('G029', 'Hama Ditemukan di Bagian Dalam Daun / Lipatan Batang', 0.8),
('G030', 'Hama Berwarna Hitam / Coklat', 1),
('G031', 'Tanaman Menjadi Kurus', 0.4),
('G032', 'Tanaman Terlihat Layu', 0.8),
('G033', 'Terdapat Belalang', 1),
('G034', 'Terdapa Ulat', 1),
('G035', 'Terdapat Siput', 1),
('G036', 'Siput Bertelur Akan Muncul Saat Hujan', 0.4),
('G037', 'Bau Tidak Sedap', 0.6),
('G038', 'Keluar Lendir', 0.8);

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `nama_kondisi` varchar(55) NOT NULL,
  `cf_kondisi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id_kondisi`, `nama_kondisi`, `cf_kondisi`) VALUES
(1, 'Sangat Yakin', 1),
(2, 'Kemungkinan Besar', 0.8),
(3, 'Kemungkinan', 0.6),
(4, 'Kemungkinan Kecil', 0.4);

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `kode_penyakit` varchar(55) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `gejala` text NOT NULL,
  `kemiripan` float NOT NULL,
  `kepastian` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `kode_penyakit`, `nama`, `gejala`, `kemiripan`, `kepastian`) VALUES
(2, 'K001', 'Hazmi', '{\"G001\":\"1\",\"G002\":\"3\",\"G003\":\"1\"}', 36.3636, 60),
(6, 'K002', 'Fildzah', '{\"G016\":\"3\",\"G019\":\"2\",\"G023\":\"3\",\"G027\":\"1\"}', 80.9524, 100),
(12, 'K014', 'Poerbo', '{\"G004\":\"3\",\"G006\":\"1\",\"G007\":\"2\",\"G020\":\"1\",\"G021\":\"4\"}', 100, 94.23);

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
('K001', 'Kutu Putih', 'Mengoleskan cairan alcohol dengan tisu, Menyemprotkan pembasmi serangga / insektisida, Menggunakan minyak nimba.'),
('K002', 'Kutu Sisik', 'Mengoleskan minyak hortikultura / sabun insektisida.'),
('K003', 'Kutu Daun', 'Mengoleskan alkohol, Menyemprotkan air jika aglaonema berada di dalam ruangan, Diberikan sabun insektisida.\r\n'),
('K004', 'Tungau Laba-Laba', 'Mengoleskan minyak hortikultura.'),
('K005', 'Ulat', 'Mengambil ulat secara mekanis, Menyemprotkan insektisida.\r\n'),
('K006', 'Belalang', 'Menangkap belalang secara manual, Menyemprotkan insektisida.'),
('K007', 'Spot Merah', 'Mengoleskan betadine dan pasta fungisida.'),
('K008', 'Nematoda', 'Mengisolasi bagian tanah setinggi 12 inci.'),
('K009', 'Root Mealy Bugs', 'Mengganti media tanam, Menyemprotkan insektisida sistematik confidor 200 SL, Menyemprotkan supracide 25 WP.'),
('K010', 'Thrips', 'Kerik hama dengan kuku / alat lain seperti cotton bud, Menyemprotkan insektisida sistematik berbahan aktif imidakloporid.\r\n'),
('K011', 'Siput Tanpa Cangkang', 'Mengambil siput, Menyemprotkan insektisida mesurol 50 WP, Menaburkan siputox, Menggunakan kulit pisan / kulit buah lainnya.'),
('K012', 'Layu Fusarium', 'Menyemprotkan fungisida seperti manzate, daconil, dan orthocide.'),
('K013', 'Bacterial Stem Root', 'Menyemprotkan agrept 20 WP yang berisi streptomycin yang mengandung tetracylin, Tanaman dicabut dan memotong batang yang terserang.\r\n'),
('K014', 'Busuk Akar', 'Membersihkan seluruh media tanam yang menempel pada akar dan batang secara perlahan dan memberikan obat antiseptik. Lalu menanam kembali dengan media tanam baru.'),
('K015', 'Bercak Daun', 'Membutuhkan fungisida tembaga cair.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `basiskasus`
--
ALTER TABLE `basiskasus`
  ADD PRIMARY KEY (`id_bkasus`),
  ADD KEY `kode_penyakit` (`kode_penyakit`),
  ADD KEY `kode_gejala` (`kode_gejala`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `basiskasus`
--
ALTER TABLE `basiskasus`
  MODIFY `id_bkasus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basiskasus`
--
ALTER TABLE `basiskasus`
  ADD CONSTRAINT `basiskasus_ibfk_1` FOREIGN KEY (`kode_penyakit`) REFERENCES `penyakit` (`kode_penyakit`),
  ADD CONSTRAINT `basiskasus_ibfk_2` FOREIGN KEY (`kode_gejala`) REFERENCES `gejala` (`kode_gejala`);

--
-- Constraints for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD CONSTRAINT `konsultasi_ibfk_1` FOREIGN KEY (`kode_penyakit`) REFERENCES `penyakit` (`kode_penyakit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
