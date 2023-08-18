-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2023 at 02:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_akun` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id_akun`, `username`, `password`, `role`) VALUES
(1, 'admin', '123', '1'),
(2, 'dosen', '123', '2'),
(3, 'kaprodi', '123', '3'),
(5, '111', '123', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(20) NOT NULL,
  `hari` enum('senin','selasa','rabu','kamis','jumat') NOT NULL,
  `slotwaktu` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `id_ruangan` int(20) NOT NULL,
  `id_pengampumk` int(20) NOT NULL,
  `id_kelas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `hari`, `slotwaktu`, `id_ruangan`, `id_pengampumk`, `id_kelas`) VALUES
(7, 'senin', '1', 2, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(20) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `kelas`) VALUES
(1, '6B'),
(2, '6A'),
(4, '2B'),
(5, '4A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelasmahasiswa`
--

CREATE TABLE `tbl_kelasmahasiswa` (
  `id_km` int(20) NOT NULL,
  `id_ts` int(20) NOT NULL,
  `id_kelas` int(20) NOT NULL,
  `id_mahasiswa` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kelasmahasiswa`
--

INSERT INTO `tbl_kelasmahasiswa` (`id_km`, `id_ts`, `id_kelas`, `id_mahasiswa`) VALUES
(106, 1, 5, 11),
(107, 1, 5, 12),
(108, 1, 5, 13),
(109, 1, 5, 14),
(110, 1, 5, 15),
(111, 1, 5, 16),
(112, 1, 5, 17),
(113, 1, 5, 18),
(114, 1, 5, 19),
(115, 1, 5, 20),
(116, 1, 4, 11),
(117, 1, 4, 12),
(118, 1, 4, 13),
(119, 1, 4, 14),
(120, 1, 4, 15),
(121, 1, 4, 16),
(122, 1, 4, 17),
(123, 1, 4, 18),
(124, 1, 4, 19),
(125, 1, 4, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurikulum`
--

CREATE TABLE `tbl_kurikulum` (
  `id_kurikulum` int(20) NOT NULL,
  `tahun_kurikulum` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kurikulum`
--

INSERT INTO `tbl_kurikulum` (`id_kurikulum`, `tahun_kurikulum`) VALUES
(1, '2018');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id_mahasiswa` int(20) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `tahun_masuk` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id_mahasiswa`, `nim`, `nama_mahasiswa`, `gender`, `tahun_masuk`) VALUES
(11, '3202016001', 'ana', 'P', 2022),
(12, '3202016002', 'andi', 'L', 2022),
(13, '3202016003', 'budi', 'P', 2022),
(14, '3202016004', 'lal', 'P', 2022),
(15, '3202016005', 'dina', 'P', 2022),
(16, '3202016006', 'ayu', 'P', 2022),
(17, '3202016007', 'lia', 'P', 2022),
(18, '3202016008', 'rian', 'P', 2022),
(19, '3202016009', 'agus', 'P', 2022),
(20, '3202016010', 'nia', 'P', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matakuliah`
--

CREATE TABLE `tbl_matakuliah` (
  `id_mk` int(20) NOT NULL,
  `kode_mk` varchar(50) NOT NULL,
  `mk` varchar(50) NOT NULL,
  `smt` int(2) NOT NULL,
  `sks` int(50) NOT NULL,
  `id_kurikulum` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_matakuliah`
--

INSERT INTO `tbl_matakuliah` (`id_mk`, `kode_mk`, `mk`, `smt`, `sks`, `id_kurikulum`) VALUES
(5, '001', 'animasi komputer', 6, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(20) NOT NULL,
  `no_pegawai` int(50) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `id_akun` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `no_pegawai`, `nama_pegawai`, `id_akun`) VALUES
(14, 1111, 'dosen2', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengampumk`
--

CREATE TABLE `tbl_pengampumk` (
  `id_pengampumk` int(20) NOT NULL,
  `id_mk` int(20) NOT NULL,
  `id_kelas` int(20) NOT NULL,
  `id_pegawai` int(20) NOT NULL,
  `id_ts` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengampumk`
--

INSERT INTO `tbl_pengampumk` (`id_pengampumk`, `id_mk`, `id_kelas`, `id_pegawai`, `id_ts`) VALUES
(4, 5, 2, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_presensi`
--

CREATE TABLE `tbl_presensi` (
  `id_presensi` int(20) NOT NULL,
  `id_kelasmahasiswa` int(20) NOT NULL,
  `id_jadwal` int(20) NOT NULL,
  `pertemuan` enum('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20') NOT NULL,
  `status` enum('h','s','i','a') NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `id_ruangan` int(20) NOT NULL,
  `ruangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`id_ruangan`, `ruangan`) VALUES
(1, 'a1'),
(2, 'a2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tahunsemester`
--

CREATE TABLE `tbl_tahunsemester` (
  `id_ts` int(20) NOT NULL,
  `tahun_semester` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tahunsemester`
--

INSERT INTO `tbl_tahunsemester` (`id_ts`, `tahun_semester`, `keterangan`) VALUES
(1, '2020/2021', 'ganjil'),
(2, '2020/2021', 'Genap');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `tbl_jadwal_ibfk_1` (`id_pengampumk`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_kelasmahasiswa`
--
ALTER TABLE `tbl_kelasmahasiswa`
  ADD PRIMARY KEY (`id_km`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_ts` (`id_ts`);

--
-- Indexes for table `tbl_kurikulum`
--
ALTER TABLE `tbl_kurikulum`
  ADD PRIMARY KEY (`id_kurikulum`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  ADD PRIMARY KEY (`id_mk`),
  ADD KEY `id_kurikulum` (`id_kurikulum`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `tbl_pegawai_idakun` (`id_akun`);

--
-- Indexes for table `tbl_pengampumk`
--
ALTER TABLE `tbl_pengampumk`
  ADD PRIMARY KEY (`id_pengampumk`),
  ADD KEY `id_mk` (`id_mk`,`id_kelas`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `tbl_pengampumk_ibfk_1` (`id_pegawai`),
  ADD KEY `id_ts` (`id_ts`);

--
-- Indexes for table `tbl_presensi`
--
ALTER TABLE `tbl_presensi`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_kelasmahasiswa` (`id_kelasmahasiswa`);

--
-- Indexes for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `tbl_tahunsemester`
--
ALTER TABLE `tbl_tahunsemester`
  ADD PRIMARY KEY (`id_ts`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id_akun` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kelasmahasiswa`
--
ALTER TABLE `tbl_kelasmahasiswa`
  MODIFY `id_km` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `tbl_kurikulum`
--
ALTER TABLE `tbl_kurikulum`
  MODIFY `id_kurikulum` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id_mahasiswa` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  MODIFY `id_mk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_pengampumk`
--
ALTER TABLE `tbl_pengampumk`
  MODIFY `id_pengampumk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_presensi`
--
ALTER TABLE `tbl_presensi`
  MODIFY `id_presensi` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id_ruangan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_tahunsemester`
--
ALTER TABLE `tbl_tahunsemester`
  MODIFY `id_ts` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD CONSTRAINT `tbl_jadwal_ibfk_1` FOREIGN KEY (`id_pengampumk`) REFERENCES `tbl_pengampumk` (`id_pengampumk`),
  ADD CONSTRAINT `tbl_jadwal_ibfk_3` FOREIGN KEY (`id_ruangan`) REFERENCES `tbl_ruangan` (`id_ruangan`);

--
-- Constraints for table `tbl_kelasmahasiswa`
--
ALTER TABLE `tbl_kelasmahasiswa`
  ADD CONSTRAINT `tbl_kelasmahasiswa_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tbl_mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `tbl_kelasmahasiswa_ibfk_4` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`),
  ADD CONSTRAINT `tbl_kelasmahasiswa_ibfk_5` FOREIGN KEY (`id_ts`) REFERENCES `tbl_tahunsemester` (`id_ts`);

--
-- Constraints for table `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  ADD CONSTRAINT `tbl_matakuliah_ibfk_1` FOREIGN KEY (`id_kurikulum`) REFERENCES `tbl_kurikulum` (`id_kurikulum`);

--
-- Constraints for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD CONSTRAINT `tbl_pegawai_idakun` FOREIGN KEY (`id_akun`) REFERENCES `tbl_akun` (`id_akun`);

--
-- Constraints for table `tbl_pengampumk`
--
ALTER TABLE `tbl_pengampumk`
  ADD CONSTRAINT `tbl_pengampumk_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_pegawai` (`id_pegawai`),
  ADD CONSTRAINT `tbl_pengampumk_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`),
  ADD CONSTRAINT `tbl_pengampumk_ibfk_3` FOREIGN KEY (`id_mk`) REFERENCES `tbl_matakuliah` (`id_mk`),
  ADD CONSTRAINT `tbl_pengampumk_ibfk_4` FOREIGN KEY (`id_ts`) REFERENCES `tbl_tahunsemester` (`id_ts`);

--
-- Constraints for table `tbl_presensi`
--
ALTER TABLE `tbl_presensi`
  ADD CONSTRAINT `tbl_presensi_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `tbl_jadwal` (`id_jadwal`),
  ADD CONSTRAINT `tbl_presensi_ibfk_3` FOREIGN KEY (`id_kelasmahasiswa`) REFERENCES `tbl_kelasmahasiswa` (`id_km`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
