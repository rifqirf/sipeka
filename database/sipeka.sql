-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2019 at 05:41 AM
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
-- Table structure for table `ekstra`
--

CREATE TABLE `ekstra` (
  `id_ekstra` int(11) NOT NULL,
  `nama_ekstra` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(18) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_jabatan` varchar(5) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `password`, `nama`, `id_jabatan`, `telp`) VALUES
('ADMIN', '73acd9a5972130b75066c82595a1fae3', 'Administrator 1', 'ADMIN', '+628'),
('PG001', '0328ed3c962cca75d7cce5b5e2f0fc74', 'R  Erli Harliah,S.Pd', 'KPSEK', '+628'),
('PG002', '1a5873c46c1b94a4646a7b1ca605474c', 'Enar Sunarti, S.Pd', 'WLKLS', '+628'),
('PG003', '1e133d40f89eb5b70a08fda748c12e20', 'Etin Kartini, S.Pd.I', 'WLKLS', '+628'),
('PG004', '9dcf6cdeb70e754e06d88d691fefe227', 'Een Surtini, S.Pd.I', 'WLKLS', '+628'),
('PG005', 'ab76bd7b9557a27f7be0ded6ff1797ff', 'Ehat Sutihat', 'STFTU', '+6282');

-- --------------------------------------------------------

--
-- Table structure for table `indikator`
--

CREATE TABLE `indikator` (
  `id_indikator` int(11) NOT NULL,
  `indikator` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indikator`
--

INSERT INTO `indikator` (`id_indikator`, `indikator`) VALUES
(3, 'AKHLAKUL KARIMAH, SOSIAL, EMOSIONAL DAN KEMANDIRIAN (ASK)'),
(5, 'PENDIDIKAN AGAMA ISLAM (PAI)'),
(6, 'BAHASA (B)'),
(7, 'KOGNITIF (K)'),
(8, 'FISIK (F)');

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
('ADMIN', 'Administrator'),
('KPSEK', 'Kepala Sekolah'),
('STFIT', 'STAFF IT'),
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
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(100) NOT NULL,
  `id_subindikator` int(11) NOT NULL,
  `id_kelompok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `id_subindikator`, `id_kelompok`) VALUES
(1, 'Terbiasa membaca Do\'a sebelum kegiatan', 1, 1),
(2, 'Mendengarkan Orang tua/teman berbicara', 3, 1),
(3, 'Terbiasa membaca Do\'a sesudah kegiatan', 1, 1),
(4, 'Berlatih Khusyu dalam berdo\'a', 1, 1),
(5, 'Adab mendengar adzan dan iqomah', 1, 1),
(6, 'Mau Mengalah', 1, 1),
(7, 'Terbiasa Mengucapkan Salam', 1, 1),
(8, 'Terbiasa menjawab Salam', 1, 1),
(9, 'Terbiasa mengucapkan Terima kasih', 1, 1),
(10, 'Terbiasa Membaca do\'a sebelum kegiatan', 1, 2),
(11, 'Terbiasa Membaca do\'a setelah kegiatan', 1, 2),
(12, 'Adab mendengat adzan dan iqomah', 1, 2),
(13, 'Terbiasa menjawab Adzan', 1, 2),
(14, 'Menunjukkan Perbuatan yang benar dan yang salah', 1, 2),
(15, 'Menyebutkan perbuatan-perbuatan yang baik dan yang buruk', 1, 2),
(16, 'Berlatih Hormat kepada orang tua, guru, teman atau orang dewasa lainnya', 1, 2),
(17, 'Selalu Bersikap jujur', 1, 2),
(18, 'Membedakan mana yang benar dan salah pada suatu persoalan', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nilai` varchar(3) NOT NULL,
  `keterangan` varchar(25) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nilai`, `keterangan`, `bobot`) VALUES
('BB', 'Belum Berkembang', 1),
('BSB', 'Berkembang Sangat Baik', 4),
('BSH', 'Berkembang Sesuai Harapan', 3),
('MB', 'Mulai Berkembang', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_raport`
--

CREATE TABLE `nilai_raport` (
  `id_raport` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_raport`
--

INSERT INTO `nilai_raport` (`id_raport`, `id_kriteria`, `nilai`) VALUES
(2, 2, 'BB'),
(3, 1, 'BB'),
(3, 2, 'BB'),
(4, 2, 'BB'),
(3, 3, 'BSB'),
(3, 4, 'BSB'),
(3, 6, 'BSB'),
(4, 18, 'BSB'),
(3, 5, 'BSH'),
(3, 7, 'BSH'),
(3, 8, 'BSH');

-- --------------------------------------------------------

--
-- Table structure for table `raport`
--

CREATE TABLE `raport` (
  `id_raport` int(11) NOT NULL,
  `no_induk` varchar(10) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `tahun_ajaran` int(11) NOT NULL,
  `berat` double NOT NULL DEFAULT '0',
  `tinggi` double NOT NULL DEFAULT '0',
  `nasihat` text,
  `tempat_raport` varchar(30) DEFAULT NULL,
  `tgl_raport` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raport`
--

INSERT INTO `raport` (`id_raport`, `no_induk`, `id_kelompok`, `semester`, `tahun_ajaran`, `berat`, `tinggi`, `nasihat`, `tempat_raport`, `tgl_raport`) VALUES
(1, '1920-A-002', 1, 1, 2019, 0, 0, NULL, NULL, NULL),
(2, '1920-A-001', 2, 1, 2019, 0, 0, NULL, NULL, NULL),
(3, '1213-A-002', 1, 1, 2019, 0, 0, NULL, NULL, NULL),
(4, '1314-A-006', 1, 1, 2019, 0, 0, NULL, NULL, NULL);

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
('101232070006', 'Al - Fadliliyah Awwaliyah', 'Jl. Imbanagara Raya no. 15', 'Ciamis', 'Ciamis', 'Jawa Barat', 'PG001');

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
  `lulus` tinyint(1) NOT NULL DEFAULT '0',
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`no_induk`, `password`, `nama_lengkap`, `nama_panggilan`, `tempat_lahir`, `tgl_lahir`, `jk`, `agama`, `anak_ke`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat_jalan`, `alamat_desa`, `alamat_kec`, `alamat_kab`, `alamat_prov`, `nama_wali`, `pekerjaan_wali`, `wali_jalan`, `wali_desa`, `wali_kec`, `wali_kab`, `wali_prov`, `tgl_diterima`, `id_kelas`, `lulus`, `foto`) VALUES
('1213-A-002', '0328ed3c962cca75d7cce5b5e2f0fc74', 'Rijal Ajji Jatnika', 'Ajji', 'Ciamis', '1996-05-04', 'LAKI-LAKI', 'ISLAM', 2, 'TEUING', 'TEUING', 'Teuing', 'Teuing', 'Icakan', 'Icakan', 'Ciamis', 'Ciamis', 'Jawa Barat', '-', '-', '-', '-', '-', '-', '-', '2012-06-06', 1, 0, ''),
('1314-A-001', '0328ed3c962cca75d7cce5b5e2f0fc74', 'Rifqi Restu Fauzi', 'Rifqi', 'Bandung', '1997-07-09', 'LAKI-LAKI', 'ISLAM', 1, 'WAWAN', 'AAM AMINAH', 'Wiraswasta', 'Guru Non-PNS', 'Ottista no. 152 RT01/RW02', 'Panyingkiran', 'Ciamis', 'Ciamis', 'Jawa Barat', '-', '-', '-', '-', '-', '-', '-', '2013-06-06', 1, 0, ''),
('1314-A-006', '80a173a6a2f2e324e2026f2d0743c0b2', 'FIBRAN BRILIANDA SAPUTRA', 'RAJA', 'TASIKMALAYA', '2008-02-04', 'LAKI-LAKI', 'ISLAM', 1, 'R. GUNGUN SAPUTRA EFENDI', 'HERYANTI', 'WIRASWASTA', 'IBU RUMAH TANGGA', 'WARUN WETAN RT 08/ RW 04', 'IMBANAGARA', 'CIAMIS', 'CIAMIS', 'JAWA BARAT', '-', '-', '-', '-', '-', '-', '-', '2013-06-06', 1, 0, ''),
('1920-A-001', 'edeecb3841b34ebc647d967a11c24938', 'Anak Orang 2', 'Anak 1', 'Ciamis', '2012-02-01', 'LAKI-LAKI', 'ISLAM', 1, 'Ayah 1', 'Ibu 1', 'Kerja Ayah 1', 'Kerja Ibu 1', 'Jl. Imbanagara Rayaa', 'Imbanagara', 'Ciamis', 'Ciamis', 'Jabar', '-', '-', '-', '-', '-', '-', '-', '2019-02-02', 2, 0, ''),
('1920-A-002', '565073c1f2b431ab5288c0ffe9d9e9c6', 'Anak Orang 1', 'Anak 1', 'Ciamis', '2012-12-12', 'LAKI-LAKI', 'ISLAM', 1, 'Ayah 1', 'Ibu 1', 'Kerja Ayah 1', 'Kerja Ibu 1', 'Jl. Imbanagara Rayaa', 'Imbanagara', 'Ciamis', 'Ciamis', 'Jabar', '-', '-', '-', '-', '-', '-', '-', '2019-12-21', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `subindikator`
--

CREATE TABLE `subindikator` (
  `id_subindikator` int(11) NOT NULL,
  `subindikator` varchar(100) NOT NULL,
  `id_indikator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subindikator`
--

INSERT INTO `subindikator` (`id_subindikator`, `subindikator`, `id_indikator`) VALUES
(1, '(null) ASK', 3),
(3, 'Menerima Bahasa', 6),
(4, 'Mengungkapkan Bahasa', 6),
(5, '(null) PAI', 5),
(6, '(null) K', 7),
(7, '(null) B', 6),
(8, '(null) F', 8),
(9, 'Keaksaraan', 6),
(10, 'Pengetahuan Umum dan Sains', 7),
(11, 'Konsep Bentuk, Warna, Ukuran, dan Pola', 7),
(12, 'Konsep Bilangan, Lambang Bilangan dan Huruf', 6),
(13, 'Motorik Kasar', 3),
(14, 'Motorik Halus', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ekstra`
--
ALTER TABLE `ekstra`
  ADD PRIMARY KEY (`id_ekstra`);

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
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `id_subindikator` (`id_subindikator`),
  ADD KEY `kriteria_ibfk_2` (`id_kelompok`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nilai`);

--
-- Indexes for table `nilai_raport`
--
ALTER TABLE `nilai_raport`
  ADD PRIMARY KEY (`id_raport`,`id_kriteria`),
  ADD KEY `nilai_raport_ibfk_2` (`nilai`),
  ADD KEY `nilai_raport_ibfk_3` (`id_kriteria`);

--
-- Indexes for table `raport`
--
ALTER TABLE `raport`
  ADD PRIMARY KEY (`id_raport`),
  ADD KEY `no_induk` (`no_induk`),
  ADD KEY `id_kelompok` (`id_kelompok`);

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
  ADD PRIMARY KEY (`id_subindikator`),
  ADD KEY `id_indikator` (`id_indikator`);

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
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `raport`
--
ALTER TABLE `raport`
  MODIFY `id_raport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subindikator`
--
ALTER TABLE `subindikator`
  MODIFY `id_subindikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- Constraints for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `kriteria_ibfk_1` FOREIGN KEY (`id_subindikator`) REFERENCES `subindikator` (`id_subindikator`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kriteria_ibfk_2` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok` (`id_kelompok`) ON UPDATE CASCADE;

--
-- Constraints for table `nilai_raport`
--
ALTER TABLE `nilai_raport`
  ADD CONSTRAINT `nilai_raport_ibfk_1` FOREIGN KEY (`id_raport`) REFERENCES `raport` (`id_raport`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_raport_ibfk_2` FOREIGN KEY (`nilai`) REFERENCES `nilai` (`nilai`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_raport_ibfk_3` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON UPDATE CASCADE;

--
-- Constraints for table `raport`
--
ALTER TABLE `raport`
  ADD CONSTRAINT `raport_ibfk_1` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok` (`id_kelompok`),
  ADD CONSTRAINT `raport_ibfk_3` FOREIGN KEY (`no_induk`) REFERENCES `siswa` (`no_induk`);

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
  ADD CONSTRAINT `subindikator_ibfk_1` FOREIGN KEY (`id_indikator`) REFERENCES `indikator` (`id_indikator`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
