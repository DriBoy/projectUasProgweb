-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2025 at 06:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nik` char(7) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nik`, `nama`) VALUES
('D000001', 'Dr. Andi Pratama'),
('D000002', 'Prof. Budi Santoso'),
('D000003', 'Dr. Citra Maharani'),
('D000004', 'Dr. Dian Kurniawan'),
('D000005', 'Ir. Eka Pramudya, M.Eng'),
('D000006', 'Dr. Farah Aulia'),
('D000007', 'M. Fajar Widodo, M.Kom'),
('D000008', 'Dr. Gita Nurhidayah'),
('D000009', 'H. Hartono, M.Si'),
('D000010', 'Dr. Indra Kurniawan');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat') NOT NULL,
  `waktu` enum('07.30 - 10.20','10.30 - 13.20','13.30 - 16.20','16.30 - 19.20') NOT NULL,
  `kode_mk` char(6) NOT NULL,
  `nik` char(7) NOT NULL,
  `kode_ruang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `hari`, `waktu`, `kode_mk`, `nik`, `kode_ruang`) VALUES
(10, 'Senin', '07.30 - 10.20', 'MK005', 'D000001', 101),
(13, 'Rabu', '07.30 - 10.20', 'MK003', 'D000003', 103),
(16, 'Senin', '07.30 - 10.20', 'MK006', 'D000006', 106),
(18, 'Rabu', '10.30 - 13.20', 'MK008', 'D000008', 108),
(19, 'Kamis', '07.30 - 10.20', 'MK009', 'D000009', 109),
(35, 'Senin', '10.30 - 13.20', 'MK002', 'D000001', 101),
(37, 'Senin', '10.30 - 13.20', 'MK001', 'D000001', 101),
(38, 'Jumat', '07.30 - 10.20', 'MK001', 'D000001', 105),
(39, 'Senin', '07.30 - 10.20', 'MK001', 'D000002', 101);

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id_krs` int(11) NOT NULL,
  `no_reg` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nilai` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id_krs`, `no_reg`, `id_jadwal`, `nilai`) VALUES
(113, 3, 13, 'A'),
(116, 6, 16, 'B'),
(118, 8, 18, 'B'),
(119, 9, 19, 'A'),
(125, 1, 35, ''),
(136, 1, 19, ''),
(137, 1, 39, ''),
(138, 1, 13, ''),
(140, 3, 18, '');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `password`) VALUES
('72240703', 'Efraim Yavin K.Dana', 'ebb98268b497d9c3e56d2bc9640df514'),
('72250121', 'Andi Pratama', '03339dc0dff443f15c254baccde9bece'),
('72250122', 'Budi Santoso', '9c5fa085ce256c7c598f6710584ab25d'),
('72250124', 'Dewi Anggraini', 'dewi123'),
('72250125', 'Eko Saputra', 'eko123'),
('72250126', 'Fajar Hidayat', 'fajar123'),
('72250127', 'Gita Permata', 'gita123'),
('72250128', 'Hadi Kurniawan', 'hadi123'),
('72250129', 'Intan Maharani', 'intan123'),
('72250130', 'Joko Susilo', 'joko123');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `kode_mk` char(16) NOT NULL,
  `nama_mk` varchar(15) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`kode_mk`, `nama_mk`, `sks`) VALUES
('MK001', 'Pemrograman Das', 3),
('MK002', 'Basis Data', 3),
('MK003', 'Jaringan Komput', 3),
('MK004', 'Sistem Operasi', 3),
('MK005', 'Struktur Data', 3),
('MK006', 'Analisis Algori', 3),
('MK007', 'Pemrograman Web', 3),
('MK008', 'Kecerdasan Buat', 3),
('MK009', 'Rekayasa Perang', 3),
('MK010', 'Keamanan Inform', 3);

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `no_reg` int(11) NOT NULL,
  `nim` char(8) NOT NULL,
  `tgl_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`no_reg`, `nim`, `tgl_reg`) VALUES
(1, '72250121', '2025-12-13'),
(2, '72250122', '2025-12-13'),
(3, '72240703', '2025-12-13'),
(4, '72250124', '2025-12-13'),
(5, '72250125', '2025-12-13'),
(6, '72250126', '2025-12-13'),
(7, '72250127', '2025-12-13'),
(8, '72250128', '2025-12-13'),
(9, '72250129', '2025-12-13'),
(10, '72250130', '2025-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `kode_ruang` int(7) NOT NULL,
  `nama_ruang` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`kode_ruang`, `nama_ruang`) VALUES
(101, 'Ruang A1'),
(102, 'Ruang A2'),
(103, 'Ruang B1'),
(104, 'Ruang B2'),
(105, 'Ruang C1'),
(106, 'Ruang C2'),
(107, 'Ruang D1'),
(108, 'Ruang D2'),
(109, 'Ruang E1'),
(110, 'Ruang E2');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_jadwal`
-- (See below for the actual view)
--
CREATE TABLE `view_jadwal` (
`id_jadwal` int(11)
,`hari` enum('Senin','Selasa','Rabu','Kamis','Jumat')
,`waktu` enum('07.30 - 10.20','10.30 - 13.20','13.30 - 16.20','16.30 - 19.20')
,`kode_mk` char(16)
,`nama_mk` varchar(15)
,`sks` int(11)
,`kode_ruang` int(7)
,`nama_ruang` varchar(15)
,`nik` char(7)
,`nama` varchar(30)
);

-- --------------------------------------------------------

--
-- Structure for view `view_jadwal`
--
DROP TABLE IF EXISTS `view_jadwal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jadwal`  AS SELECT `j`.`id_jadwal` AS `id_jadwal`, `j`.`hari` AS `hari`, `j`.`waktu` AS `waktu`, `mk`.`kode_mk` AS `kode_mk`, `mk`.`nama_mk` AS `nama_mk`, `mk`.`sks` AS `sks`, `r`.`kode_ruang` AS `kode_ruang`, `r`.`nama_ruang` AS `nama_ruang`, `d`.`nik` AS `nik`, `d`.`nama` AS `nama` FROM (((`jadwal` `j` join `mata_kuliah` `mk` on(`j`.`kode_mk` = `mk`.`kode_mk`)) join `ruang` `r` on(`j`.`kode_ruang` = `r`.`kode_ruang`)) join `dosen` `d` on(`j`.`nik` = `d`.`nik`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `kode_mk` (`kode_mk`),
  ADD KEY `nik` (`nik`),
  ADD KEY `kode_ruang` (`kode_ruang`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`),
  ADD KEY `no_reg` (`no_reg`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`no_reg`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`kode_ruang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `no_reg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kode_mk`) REFERENCES `mata_kuliah` (`kode_mk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `dosen` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`kode_ruang`) REFERENCES `ruang` (`kode_ruang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_ibfk_1` FOREIGN KEY (`no_reg`) REFERENCES `registrasi` (`no_reg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `krs_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD CONSTRAINT `registrasi_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
