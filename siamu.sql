-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2025 pada 07.07
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nik` char(10) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nik`, `nama`) VALUES
('D001', 'Bertha Pangaribuan, S.T., M.S'),
('D002', 'Jong Jek Siang, Drs., M.Sc.'),
('D003', 'Wimmie Handiwidjojo, Drs., MIT'),
('D004', 'Argo Wibowo, S.T., M.T.'),
('D005', 'Yetli Oslan, S.Kom., M.T.'),
('D006', 'Andhika Galuh Prabawati, S.Kom'),
('D007', 'Budi Sutedjo Dharma Oetomo, S.'),
('D008', 'Umi Proboyekti, S.Kom., MLIS'),
('D009', 'Katon Wijana, S.Kom., M.T.'),
('D010', 'Erick Kurniawan, M.Kom.'),
('D011', 'Halim Budi Santoso, S.Kom., MT'),
('D012', 'Gabriel Indra Widi Tamtama, S.'),
('D013', 'Eko Verianto'),
('D014', 'Nina Kartika'),
('D015', 'Oscar Pradana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `hari` enum('senin','selasa','rabu','kamis','jumat') NOT NULL,
  `waktu` enum('07.30 - 10.20','10.30 - 13.20','13.30 - 16.20','16.20 - 19.20') NOT NULL,
  `kode_mk` char(6) NOT NULL,
  `nik` char(10) NOT NULL,
  `kode_ruang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `hari`, `waktu`, `kode_mk`, `nik`, `kode_ruang`) VALUES
(1, 'senin', '07.30 - 10.20', 'MK001', 'D001', 101),
(2, 'senin', '10.30 - 13.20', 'MK002', 'D002', 102),
(3, 'senin', '13.30 - 16.20', 'MK003', 'D003', 103),
(4, 'senin', '16.20 - 19.20', 'MK004', 'D004', 104),
(5, 'selasa', '07.30 - 10.20', 'MK005', 'D005', 105),
(6, 'selasa', '10.30 - 13.20', 'MK006', 'D006', 106),
(7, 'selasa', '13.30 - 16.20', 'MK007', 'D007', 107),
(8, 'selasa', '16.20 - 19.20', 'MK008', 'D008', 108),
(9, 'rabu', '07.30 - 10.20', 'MK009', 'D009', 109),
(10, 'rabu', '10.30 - 13.20', 'MK010', 'D010', 110),
(11, 'rabu', '13.30 - 16.20', 'MK011', 'D011', 111),
(12, 'rabu', '16.20 - 19.20', 'MK012', 'D012', 112),
(13, 'kamis', '07.30 - 10.20', 'MK013', 'D013', 113),
(14, 'kamis', '10.30 - 13.20', 'MK014', 'D014', 114),
(15, 'kamis', '13.30 - 16.20', 'MK015', 'D015', 115),
(16, 'kamis', '16.20 - 19.20', 'MK001', 'D001', 101),
(19, 'rabu', '', 'MK013', 'D001', 104),
(20, 'jumat', '', 'MK005', 'D005', 105);

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `id_krs` int(11) NOT NULL,
  `no_reg` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nilai` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `password`) VALUES
('72240673', 'Stefanus Adrian Kurniawan', '12345678'),
('72240681', 'Arya Putra Pratama', '12345678'),
('72240703', 'Efraim Yavin K. Dana', '12345678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `kode_mk` char(16) NOT NULL,
  `nama_mk` varchar(30) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`kode_mk`, `nama_mk`, `sks`) VALUES
('MK001', 'Algoritma dan Pemrograman', 3),
('MK002', 'Struktur Data', 3),
('MK003', 'Basis Data', 3),
('MK004', 'Jaringan Komputer', 3),
('MK005', 'Sistem Operasi', 3),
('MK006', 'Kecerdasan Buatan', 3),
('MK007', 'Pemrograman Web', 3),
('MK008', 'Rekayasa Perangkat Lunak', 3),
('MK009', 'Matematika Diskrit', 2),
('MK010', 'Etika Profesi', 2),
('MK011', 'Analisis Sistem', 3),
('MK012', 'Keamanan Informasi', 3),
('MK013', 'Pemrograman Mobile', 3),
('MK014', 'Manajemen Proyek IT', 2),
('MK015', 'Arsitektur Komputer', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrasi`
--

CREATE TABLE `registrasi` (
  `no_reg` int(11) NOT NULL,
  `nim` char(8) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `kode_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`kode_ruang`, `nama_ruang`) VALUES
(101, 'Ruang A1'),
(102, 'Ruang A2'),
(103, 'Ruang A3'),
(104, 'Ruang B1'),
(105, 'Ruang B2'),
(106, 'Ruang B3'),
(107, 'Ruang C1'),
(108, 'Ruang C2'),
(109, 'Ruang C3'),
(110, 'Lab Kom 1'),
(111, 'Lab Kom 2'),
(112, 'Lab Kom 3'),
(113, 'Ruang Seminar'),
(114, 'Ruang Sidang'),
(115, 'Ruang Studio');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_jadwal`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_jadwal` (
`id_jadwal` int(11)
,`hari` enum('senin','selasa','rabu','kamis','jumat')
,`waktu` enum('07.30 - 10.20','10.30 - 13.20','13.30 - 16.20','16.20 - 19.20')
,`kode_mk` char(16)
,`nama_mk` varchar(30)
,`sks` int(11)
,`kode_ruang` int(11)
,`nama_ruang` varchar(15)
,`nik` char(10)
,`nama` varchar(30)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_jadwal`
--
DROP TABLE IF EXISTS `view_jadwal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jadwal`  AS SELECT `j`.`id_jadwal` AS `id_jadwal`, `j`.`hari` AS `hari`, `j`.`waktu` AS `waktu`, `mk`.`kode_mk` AS `kode_mk`, `mk`.`nama_mk` AS `nama_mk`, `mk`.`sks` AS `sks`, `r`.`kode_ruang` AS `kode_ruang`, `r`.`nama_ruang` AS `nama_ruang`, `d`.`nik` AS `nik`, `d`.`nama` AS `nama` FROM (((`jadwal` `j` join `mata_kuliah` `mk` on(`j`.`kode_mk` = `mk`.`kode_mk`)) join `ruang` `r` on(`j`.`kode_ruang` = `r`.`kode_ruang`)) join `dosen` `d` on(`j`.`nik` = `d`.`nik`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `kode_mk` (`kode_mk`),
  ADD KEY `nik` (`nik`),
  ADD KEY `kode_ruang` (`kode_ruang`);

--
-- Indeks untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`),
  ADD KEY `no_reg` (`no_reg`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indeks untuk tabel `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`no_reg`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`kode_ruang`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kode_mk`) REFERENCES `mata_kuliah` (`kode_mk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `dosen` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`kode_ruang`) REFERENCES `ruang` (`kode_ruang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_ibfk_1` FOREIGN KEY (`no_reg`) REFERENCES `registrasi` (`no_reg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `krs_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `registrasi`
--
ALTER TABLE `registrasi`
  ADD CONSTRAINT `registrasi_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
