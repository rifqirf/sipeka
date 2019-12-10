-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2019 at 02:45 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipeka`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(18) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_jabatan` varchar(5) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `pass`, `nama`, `id_jabatan`, `telp`) VALUES
('PG001', '81dc9bdb52d04dc20036dbd8313ed055', 'R  Erli Harliah,S.Pd', 'KPSEK', '+628'),
('PG002', '81dc9bdb52d04dc20036dbd8313ed055', 'Enar Sunarti, S.Pd', 'WLKLS', '+628'),
('PG003', '81dc9bdb52d04dc20036dbd8313ed055', 'Etin Kartini, S.Pd.I', 'WLKLS', '+628'),
('PG004', '81dc9bdb52d04dc20036dbd8313ed055', 'Een Surtini, S.Pd.I', 'WLKLS', '+628'),
('PG005', '81dc9bdb52d04dc20036dbd8313ed055', 'Ehat Sutihat', 'STFTU', '+6282');

-- --------------------------------------------------------

--
-- Table structure for table `indikator`
--

CREATE TABLE `indikator` (
  `id_indikator` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indikator`
--

INSERT INTO `indikator` (`id_indikator`, `deskripsi`) VALUES
(1, 'AKHLAKUL KARIMAH, SOSIAL, EMOSIONAL DAN KEMANDIRIAN. (ASK)'),
(2, 'PENDIDIKAN AGAMA ISLAM (PAI)'),
(3, 'BAHASA - Menerima Bahasa'),
(4, 'BAHASA - Mengungkapkan Bahasa'),
(5, 'BAHASA - Keaksaraan'),
(6, 'KOGNITIF - Pengetahuan Umum dan Sains'),
(7, 'KOGNITIF - Konsep Bentuk, Warna, Ukuran dan Pola'),
(8, 'KOGNITIF - Konsep Bilangan Lambang Bilangan & Huruf');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(5) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
('KPSEK', 'Kepala Sekolah'),
('STFTU', 'Staff Tata Usaha'),
('WLKLS', 'Wali Kelas');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `id_kelompok` int(11) NOT NULL,
  `nama_kelompok` varchar(15) NOT NULL,
  `nip_wlkls` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`id_kelompok`, `nama_kelompok`, `nip_wlkls`) VALUES
(1, 'A', 'PG004'),
(2, 'B', 'PG003');

-- --------------------------------------------------------

--
-- Table structure for table `kode`
--

CREATE TABLE `kode` (
  `nilai` int(11) NOT NULL,
  `kode` varchar(3) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_raport` int(11) NOT NULL,
  `no_induk` varchar(10) NOT NULL,
  `no_subindikator` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `raport`
--

CREATE TABLE `raport` (
  `id_raport` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `tgl_raport` date NOT NULL,
  `nip` varchar(18) NOT NULL,
  `sah` tinyint(1) NOT NULL DEFAULT '0',
  `tgl_sah` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_roles` int(11) NOT NULL,
  `nama_role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_roles`, `nama_role`) VALUES
(1, 'admin'),
(2, 'wali kelas'),
(3, 'kepala sekolah'),
(4, 'staff tu'),
(5, 'orang tua');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `nsra` varchar(12) NOT NULL,
  `nama_ra` varchar(50) NOT NULL,
  `alamat_jalan` varchar(100) NOT NULL,
  `alamat_kec` varchar(35) NOT NULL,
  `alamat_kab` varchar(35) NOT NULL,
  `alamat_prov` varchar(35) NOT NULL,
  `nip_kepsek` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`nsra`, `nama_ra`, `alamat_jalan`, `alamat_kec`, `alamat_kab`, `alamat_prov`, `nip_kepsek`) VALUES
('101232070006', 'Al - Fadliliyah', 'Jl. Imbanagara Raya no. 15', 'Ciamis', 'Ciamis', 'Jawa Barat', 'PG001');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `no_induk` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nama_panggilan` varchar(15) NOT NULL,
  `tempat_lahir` varchar(35) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(9) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `anak_ke` int(11) NOT NULL,
  `nama_ayah` varchar(35) NOT NULL,
  `nama_ibu` varchar(35) NOT NULL,
  `pekerjaan_ayah` varchar(30) NOT NULL,
  `pekerjaan_ibu` varchar(30) NOT NULL,
  `alamat_jalan` varchar(50) NOT NULL,
  `alamat_desa` varchar(25) NOT NULL,
  `alamat_kec` varchar(25) NOT NULL,
  `alamat_kab` varchar(25) NOT NULL,
  `alamat_prov` varchar(25) NOT NULL,
  `nama_wali` varchar(35) NOT NULL,
  `pekerjaan_wali` varchar(30) NOT NULL,
  `wali_jalan` varchar(50) NOT NULL,
  `wali_desa` varchar(25) NOT NULL,
  `wali_kec` varchar(25) NOT NULL,
  `wali_kab` varchar(25) NOT NULL,
  `wali_prov` varchar(25) NOT NULL,
  `tgl_diterima` date NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `lulus` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`no_induk`, `password`, `nama_lengkap`, `nama_panggilan`, `tempat_lahir`, `tgl_lahir`, `jk`, `agama`, `anak_ke`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat_jalan`, `alamat_desa`, `alamat_kec`, `alamat_kab`, `alamat_prov`, `nama_wali`, `pekerjaan_wali`, `wali_jalan`, `wali_desa`, `wali_kec`, `wali_kab`, `wali_prov`, `tgl_diterima`, `id_kelas`, `lulus`) VALUES
('1213-A-002', '0328ed3c962cca75d7cce5b5e2f0fc74', 'Rijal Ajji Jatnika', 'Ajji', 'Ciamis', '1996-05-04', 'LAKI-LAKI', 'ISLAM', 2, 'TEUING', 'TEUING', 'Teuing', 'Teuing', 'Icakan', 'Icakan', 'Ciamis', 'Ciamis', 'Jawa Barat', '-', '-', '-', '-', '-', '-', '-', '2012-06-06', 1, 0),
('1314-A-001', '0328ed3c962cca75d7cce5b5e2f0fc74', 'Rifqi Restu Fauzi', 'Rifqi', 'Bandung', '1997-07-09', 'LAKI-LAKI', 'ISLAM', 1, 'WAWAN', 'AAM AMINAH', 'Wiraswasta', 'Guru Non-PNS', 'Ottista no. 152 RT01/RW02', 'Panyingkiran', 'Ciamis', 'Ciamis', 'Jawa Barat', '-', '-', '-', '-', '-', '-', '-', '2013-06-06', 1, 0),
('1314-A-006', '0328ed3c962cca75d7cce5b5e2f0fc74', 'FIBRAN BRILIANDA SAPUTRA', 'RAJA', 'TASIKMALAYA', '2008-02-04', 'LAKI-LAKI', 'ISLAM', 1, 'R. GUNGUN SAPUTRA EFENDI', 'HERYANTI', 'WIRASWASTA', 'IBU RUMAH TANGGA', 'WARUN WETAN RT 08/ RW 04', 'IMBANAGARA', 'CIAMIS', 'CIAMIS', 'JAWA BARAT', '-', '-', '-', '-', '-', '-', '-', '2013-06-06', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subindikator`
--

CREATE TABLE `subindikator` (
  `no_subindikator` int(11) NOT NULL,
  `sub_deskripsi` text NOT NULL,
  `id_indikator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subindikator`
--

INSERT INTO `subindikator` (`no_subindikator`, `sub_deskripsi`, `id_indikator`) VALUES
(1, 'Terbiasa Membaca Do\'a sebelum Kegiatan', 1),
(2, 'Terbiasa Membaca do\'a sesudah kegiatan', 1),
(3, 'Mau Mengalah', 1),
(4, 'Menunjukkan Perbuatan-perbuatan yang benar dan salah pada suatu persoalan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_roles` int(11) NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `id_roles`, `activated`) VALUES
('1314A006', '1d18b95c673de30359f8ddbacad1f152', 5, 1),
('admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
('PG001', '0328ed3c962cca75d7cce5b5e2f0fc74', 3, 1),
('PG002', '1a5873c46c1b94a4646a7b1ca605474c', 2, 1),
('PG003', '1e133d40f89eb5b70a08fda748c12e20', 2, 1),
('PG004', '9dcf6cdeb70e754e06d88d691fefe227', 2, 1),
('PG005', 'ab76bd7b9557a27f7be0ded6ff1797ff', 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `guru_ibfk_1` (`id_jabatan`);

--
-- Indexes for table `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`id_indikator`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id_kelompok`),
  ADD KEY `id_nip` (`nip_wlkls`);

--
-- Indexes for table `kode`
--
ALTER TABLE `kode`
  ADD PRIMARY KEY (`nilai`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD KEY `id_raport` (`id_raport`),
  ADD KEY `no_subindikator` (`no_subindikator`),
  ADD KEY `nilai` (`nilai`),
  ADD KEY `no_induk` (`no_induk`);

--
-- Indexes for table `raport`
--
ALTER TABLE `raport`
  ADD PRIMARY KEY (`id_raport`),
  ADD KEY `id_kelompok` (`id_kelompok`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`nsra`),
  ADD KEY `nip_kepsek` (`nip_kepsek`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`no_induk`),
  ADD KEY `id_kelas_awal` (`id_kelas`);

--
-- Indexes for table `subindikator`
--
ALTER TABLE `subindikator`
  ADD PRIMARY KEY (`no_subindikator`),
  ADD KEY `id_indikator` (`id_indikator`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `user_ibfk_1` (`id_roles`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `indikator`
--
ALTER TABLE `indikator`
  MODIFY `id_indikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `raport`
--
ALTER TABLE `raport`
  MODIFY `id_raport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subindikator`
--
ALTER TABLE `subindikator`
  MODIFY `no_subindikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON UPDATE CASCADE;

--
-- Constraints for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD CONSTRAINT `kelompok_ibfk_1` FOREIGN KEY (`nip_wlkls`) REFERENCES `guru` (`nip`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_raport`) REFERENCES `raport` (`id_raport`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`no_subindikator`) REFERENCES `subindikator` (`no_subindikator`),
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`nilai`) REFERENCES `kode` (`nilai`),
  ADD CONSTRAINT `nilai_ibfk_4` FOREIGN KEY (`no_induk`) REFERENCES `siswa` (`no_induk`);

--
-- Constraints for table `raport`
--
ALTER TABLE `raport`
  ADD CONSTRAINT `raport_ibfk_1` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok` (`id_kelompok`),
  ADD CONSTRAINT `raport_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`);

--
-- Constraints for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD CONSTRAINT `sekolah_ibfk_1` FOREIGN KEY (`nip_kepsek`) REFERENCES `guru` (`nip`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelompok` (`id_kelompok`);

--
-- Constraints for table `subindikator`
--
ALTER TABLE `subindikator`
  ADD CONSTRAINT `subindikator_ibfk_1` FOREIGN KEY (`id_indikator`) REFERENCES `indikator` (`id_indikator`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id_roles`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
