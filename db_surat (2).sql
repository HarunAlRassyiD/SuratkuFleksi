-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2021 at 04:36 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username_admin`, `password`, `gambar`) VALUES
(1, 'SEKRETARIS JCM3', 'nata', '8cb2237d0679ca88db6464eac60da96345513964', 'nata.png'),
(2, 'Gadis Rizki', 'GadisR', '8cb2237d0679ca88db6464eac60da96345513964', 'GadisR.png'),
(5, 'harunar', 'harun', '8cb2237d0679ca88db6464eac60da96345513964', 'harun.png'),
(10, 'nidya', 'nidya21', '8cb2237d0679ca88db6464eac60da96345513964', 'nidya21.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bagian`
--

CREATE TABLE `tb_bagian` (
  `id_bagian` int(11) NOT NULL,
  `nama_bagian` varchar(120) NOT NULL,
  `username_admin_bagian` varchar(50) NOT NULL,
  `password_bagian` varchar(50) NOT NULL,
  `nama_lengkap` varchar(70) NOT NULL,
  `tanggal_lahir_bagian` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp_bagian` varchar(12) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bagian`
--

INSERT INTO `tb_bagian` (`id_bagian`, `nama_bagian`, `username_admin_bagian`, `password_bagian`, `nama_lengkap`, `tanggal_lahir_bagian`, `alamat`, `no_hp_bagian`, `gambar`) VALUES
(25, 'JCM2 Fleksi', 'Belinda', '8cb2237d0679ca88db6464eac60da96345513964', 'Belinda', '2021-10-01', 'Gedeong BNI', '081212121212', 'Belinda.png'),
(26, 'General Manager', 'dawan', '8cb2237d0679ca88db6464eac60da96345513964', 'Irwan AR', '2021-10-01', 'Gedoeng BNI', '081313131313', 'dawan.png'),
(27, 'Administrasi', 'nata', '8cb2237d0679ca88db6464eac60da96345513964', 'Natasya', '2021-10-01', 'Gedoeng BNI', '081414141414', 'nata.png'),
(28, 'Bu Belinda', 'bubel', '8cb2237d0679ca88db6464eac60da96345513964', 'Belinda N', '2021-10-12', '--', '081212121212', 'bubel.png'),
(29, 'Bu Gadis', 'gadis', '8cb2237d0679ca88db6464eac60da96345513964', 'Gadis Rizki', '2021-10-12', '--', '081313131514', 'gadis.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratkeluar`
--

CREATE TABLE `tb_suratkeluar` (
  `id_suratkeluar` int(11) NOT NULL,
  `tanggalkeluar_suratkeluar` datetime NOT NULL,
  `kode_suratkeluar` varchar(10) NOT NULL,
  `nomor_suratkeluar` varchar(45) NOT NULL,
  `tanggalsurat_suratkeluar` date NOT NULL,
  `kepada_suratkeluar` varchar(255) NOT NULL,
  `perihal_suratkeluar` text NOT NULL,
  `file_suratkeluar` varchar(255) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `nomorurut_suratkeluar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_suratkeluar`
--

INSERT INTO `tb_suratkeluar` (`id_suratkeluar`, `tanggalkeluar_suratkeluar`, `kode_suratkeluar`, `nomor_suratkeluar`, `tanggalsurat_suratkeluar`, `kepada_suratkeluar`, `perihal_suratkeluar`, `file_suratkeluar`, `operator`, `nomorurut_suratkeluar`) VALUES
(104, '2021-10-17 11:00:00', 'SURAT', 'CLN/11.2/6254', '2021-10-01', 'BNI SURABAYA', 'SURAT BALASAN USULAN HAPUS BUKU PINJAMAN BNI FLEKSI GOLONGAN NPL MLG', '2021-SURAT BALASAN USULAN HAPUS BUKU PINJAMAN BNI FLEKSI GOLONGAN NPL MLG.pdf', 'SEKRETARIS JCM3', '0001'),
(105, '2021-08-17 11:00:00', 'NOTIN', 'CLN/11.2/6288', '2021-10-18', 'WILAYAH 3', 'UANG GANTI RUGI BULAN JANUARI', '2021-UANG GANTI RUGI BULAN JANUARI.pdf', 'SEKRETARIS JCM3', '0002'),
(106, '2021-07-17 11:00:00', 'MEMO', 'CLN/11.2/6255', '2021-10-17', 'BNI MALANG', 'BUKU', '2021-BUKU.pdf', 'SEKRETARIS JCM3', '0003'),
(107, '2020-10-21 12:42:00', 'SURAT', 'CLN/11.2/6253', '2021-10-07', 'BNI SURABAY3', 'CORE DATA', '2021-CORE DATA.pdf', 'SEKRETARIS JCM3', '0004'),
(108, '2021-05-06 12:44:00', 'SURAT', 'CLN/11.2/6433', '2021-10-11', 'BNI SURABAYA', 'ADA', '2021-ADA.pdf', 'SEKRETARIS JCM3', '0005');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratmasuk`
--

CREATE TABLE `tb_suratmasuk` (
  `id_suratmasuk` int(11) NOT NULL,
  `kode_suratmasuk` varchar(10) NOT NULL,
  `nomorurut_suratmasuk` varchar(7) NOT NULL,
  `nomor_suratmasuk` varchar(25) NOT NULL,
  `tanggalsurat_suratmasuk` date NOT NULL,
  `perihal_suratmasuk` text NOT NULL,
  `file_suratmasuk` varchar(255) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `tanggal_entry` datetime NOT NULL DEFAULT current_timestamp(),
  `disposisi1` varchar(50) NOT NULL,
  `tanggal_disposisi1` datetime NOT NULL DEFAULT current_timestamp(),
  `disposisi2` varchar(50) NOT NULL,
  `tanggal_disposisi2` varchar(25) NOT NULL,
  `disposisi3` varchar(50) NOT NULL,
  `tanggal_disposisi3` datetime NOT NULL DEFAULT current_timestamp(),
  `nomor_suratbalasan` varchar(25) NOT NULL,
  `perihal_suratbalasan` text NOT NULL,
  `tanggalsurat_suratbalasan` date DEFAULT NULL,
  `disp_lanjut` varchar(50) NOT NULL,
  `status_suratmasuk` varchar(50) NOT NULL,
  `pengiriman_suratbalasan` varchar(50) NOT NULL,
  `nama_penerima_suratbalasan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_suratmasuk`
--

INSERT INTO `tb_suratmasuk` (`id_suratmasuk`, `kode_suratmasuk`, `nomorurut_suratmasuk`, `nomor_suratmasuk`, `tanggalsurat_suratmasuk`, `perihal_suratmasuk`, `file_suratmasuk`, `operator`, `tanggal_entry`, `disposisi1`, `tanggal_disposisi1`, `disposisi2`, `tanggal_disposisi2`, `disposisi3`, `tanggal_disposisi3`, `nomor_suratbalasan`, `perihal_suratbalasan`, `tanggalsurat_suratbalasan`, `disp_lanjut`, `status_suratmasuk`, `pengiriman_suratbalasan`, `nama_penerima_suratbalasan`) VALUES
(45, 'SURAT', '0001', 'CLN/11.2/5923', '2021-10-14', 'USULAN HAPUS BUKU DEBITUR BNI FLEKSI LNC MALANG', '2021 USULAN HAPUS BUKU DEBITUR BNI FLEKSI LNC MALANG.pdf', 'SEKRETARIS JCM3', '2021-10-14 13:58:44', ' ', '1970-01-01 07:00:00', '', '1970-01-01 07:00:00 ', ' ', '1970-01-01 07:00:00', '', '', '2021-10-14', '', '', '', ''),
(46, 'SURAT', '0002', 'SMG/5.1/2809/PMC/2021', '2021-10-04', 'USULAN HAPUS BUKU BNI FLEKSI OKTOBER 2021 KANTOR CABANG SEMARANG', '2021 USULAN HAPUS BUKU BNI FLEKSI OKTOBER 2021 KANTOR CABANG SEMARANG.pdf', 'SEKRETARIS JCM3', '2021-10-14 14:03:13', 'Bu Belinda ', '2021-10-14 14:02:00', '', '1970-01-01 07:00:00', ' ', '1970-01-01 07:00:00', 'CLN/11.2/6132', 'SURAT BALASAN USULAN HAPUS BUKU BNI FLEKSI OKTOBER 2021 KANTOR CABANG SEMARANG', '2021-11-10', 'BU GADIS & MBA NISA', 'DONE', 'Email', '-'),
(56, 'SURAT', '0003', 'RMA/05/1926', '2021-10-05', 'PERMOHONAN PENGAJUAN KLAIM ASURANSI DASAR', '2021 PERMOHONAN PENGAJUAN KLAIM ASURANSI DASAR.pdf', 'SEKRETARIS JCM3', '2021-10-19 09:23:42', ' ', '1970-01-01 07:00:00', '', '1970-01-01 07:00:00', ' ', '1970-01-01 07:00:00', 'CLN/11.2/7409', 'SURAT BALASAN USULAN HAPUS BUKU DEBITUR MACET KONSUMER CABANG KUNINGAN', '1970-01-01', 'BU GADIS', 'DONE', 'Email', 'BNI CABANG BATAM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username_admin` (`username_admin`);

--
-- Indexes for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  ADD PRIMARY KEY (`id_bagian`),
  ADD UNIQUE KEY `username_admin_bagian` (`username_admin_bagian`);

--
-- Indexes for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  ADD PRIMARY KEY (`id_suratkeluar`),
  ADD UNIQUE KEY `nomor_suratkeluar` (`nomor_suratkeluar`);

--
-- Indexes for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  ADD PRIMARY KEY (`id_suratmasuk`),
  ADD UNIQUE KEY `nomorurut_suratmasuk` (`nomorurut_suratmasuk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  MODIFY `id_suratkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  MODIFY `id_suratmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
