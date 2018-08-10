-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 Agu 2018 pada 15.05
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsip_renmin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `nomor` varchar(10) NOT NULL,
  `tgl_surat` date NOT NULL,
  `asal_surat` varchar(25) NOT NULL,
  `tgl_terima` date NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `giat` varchar(100) NOT NULL,
  `tgl_giat` date NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `pakaian` varchar(50) NOT NULL,
  `uploader` varchar(30) NOT NULL,
  `file_agenda` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`id`, `nomor`, `tgl_surat`, `asal_surat`, `tgl_terima`, `perihal`, `giat`, `tgl_giat`, `tempat`, `pakaian`, `uploader`, `file_agenda`) VALUES
(19, '32', '2018-07-11', 'testing', '2018-07-18', 'Undangan', 'makan-makan', '2018-07-10', 'Caffe cofe', 'bebas', '', ''),
(21, '23', '2018-07-12', 'dsfsd', '2018-07-18', 'Undangan', 'sdfsd', '2018-07-05', 'adas', 'sdfsdf', '', ''),
(22, '433', '2018-07-04', 'miss u', '2018-07-19', 'Undangan', 'adsd', '2018-07-17', 'ssdfd', 'dssf', '', ''),
(23, '21', '2018-07-16', 'asda', '2018-07-12', 'sdsa', 'asd', '2018-07-12', 'sdas', 'sdsa', '', ''),
(24, '122', '2018-07-04', 'dsfs', '2018-07-05', 'xczxc', 'sdsaad', '2018-07-18', 'xzXc', 'dsfsd', '', ''),
(25, '23', '2018-07-10', 'csd', '2018-07-04', 'cscsd', 'xczx', '2018-07-04', 'xcxczas', 'vdefdsv', '', ''),
(26, '2311', '2018-07-18', 'fsdfd', '2018-07-13', 'cvcxv', 'fdsgd', '2018-07-17', 'dfsd', 'dvdffdsd', '', ''),
(27, '435', '2000-03-03', 'dfvdf', '2008-05-06', 'Undangan', 'ffd', '3009-05-05', 'dfgf', 'dgdfg', '', ''),
(28, '2323', '3009-03-03', 'bdfb', '3009-07-08', 'Undangan', 'hjdfb', '2009-07-08', 'dhbfhjd', 'DFFB', '', ''),
(29, '1', '2009-06-03', 'CHJD', '0008-02-01', 'Undangan', 'DSFBJ', '2008-06-07', 'DHH', '2998', '', ''),
(30, '3423', '2018-07-02', 'vdf', '2009-04-04', 'Undangan', 'ffdf', '2008-05-06', 'dfds', 'dfsd', '', ''),
(31, '1', '2009-04-04', 'ffgd', '2009-07-07', 'Undangan', 'ddfsd', '2009-06-06', 'fg', 'dfsd', '', ''),
(32, '2', '1009-06-09', 'fgdf', '2009-06-06', 'Undangan', 'fdg', '2009-06-06', 'bgb', 'gbgg', '', ''),
(33, '3', '2007-06-07', 'dfdsf', '2008-06-06', 'Undangan', 'ddf', '2008-06-07', 'fd', 'dfsd', '', ''),
(34, '34', '2009-04-03', 'fhbjw', '2009-06-06', 'Undangan', 'fhfh', '2009-07-07', 'bfh', 'frrfbh', '', ''),
(35, '342', '2009-05-05', 'fjdfj', '2009-07-06', 'Undangan', 'fbu', '2009-07-08', 'jhdfb', 'dwhjfjs', '', ''),
(36, '10', '2009-07-08', 'hey', '2009-07-09', 'Undangan', 'hey', '2009-07-08', 'hey', 'hey', '', '5b5d52b90c1c0.'),
(37, '20', '2009-07-09', 'hik', '2009-07-08', 'Undangan', 'hik', '2008-07-09', 'hey', 'me', '', '5b5d5307b1c93.'),
(38, '11', '2009-03-03', 'taku', '2009-07-09', 'Undangan', 'hey', '2009-07-08', 'hdh1', 'chse', '', '5b5d53e27ddfb.'),
(39, '66', '0000-00-00', 'ndj', '9999-06-07', 'Undangan', 'dgfy', '3000-06-07', 'FVG', 'YFY', '', '5b5d55a2a0219.'),
(40, '23', '2018-05-05', 'HDHQ', '2019-07-08', 'Undangan', 'BHF', '2009-07-08', 'HS', 'YDF', '', '5b5d56a0c8732.'),
(41, '65', '0007-05-06', 'JBDB', '0099-07-02', 'Undangan', 'BJDB', '2099-07-07', 'JHBSFBJ', 'HBD', '', '5b5d582df25e3.'),
(42, '67', '0009-07-08', 'ghd4', '0008-05-06', 'Undangan', 'hj', '0009-07-07', 'gh', 'ghf', '', '5b5d59838128c.'),
(43, '77', '0002-06-07', 'rr', '0007-04-05', 'Undangan', 'dd', '0007-05-06', 'f', 'fjaja', '', '5b5d5a962351e.'),
(44, '1', '2018-06-07', 'polri', '2018-06-07', 'Undangan', 'Jalan-jalan', '2018-06-07', 'hatimu', 'testing', '', '5b61141851fa7.'),
(45, '65', '0007-07-07', 'ghgf', '0006-07-06', 'Undangan', 'hey', '0006-06-06', 'ghhg', 'hgf', '', '5b642e2970c49.'),
(46, '99', '2018-08-04', 'FOO', '2018-08-10', 'Undangan', 'kakkakak', '2018-08-04', 'foo', 'hitam', '', '5b6560b768760.'),
(47, '3555', '2000-03-09', 'jfdslk', '0000-00-00', 'Undangan', 'hai sayang', '2018-08-16', 'hai yulia', 'hai', '', '5b65610e413a4.'),
(48, '66', '2018-05-06', 'vnb', '2018-03-31', 'Undangan', 'dsbnd', '2009-06-06', 'hbs', 'gdhs', 'urtu', '5b65652cad5b3.'),
(49, '77', '2018-06-07', 'BSHJ', '2018-02-06', 'Undangan', 'bh', '2019-06-07', 'bcb', 'hdhc', 'urtu', '5b65659b9a583.'),
(50, '443', '0008-06-07', 'nbcmd', '0020-07-08', 'Undangan', 'ndsnb', '0001-07-08', 'jdsj', 'jdjfd', 'urtu', '5b65af4486d3a.'),
(51, '1', '2019-06-07', 'ME', '2019-07-08', 'Undangan', 'HEI', '2019-09-10', 'BDH', 'HEB', 'urtu', '5b6911e742fa2.'),
(52, '53', '2000-05-06', 'coba dlu yess', '2019-07-08', 'Undangan', 'testing', '2019-06-07', 'mau nyoba aja', 'test yaa', 'SuperAdmin', '5b6c3efeefccb.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dispss`
--

CREATE TABLE `dispss` (
  `id_dspss` int(11) NOT NULL,
  `isi_disposisi` text NOT NULL,
  `batas_waktu` date NOT NULL,
  `cttn` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dispss`
--

INSERT INTO `dispss` (`id_dspss`, `isi_disposisi`, `batas_waktu`, `cttn`) VALUES
(17, 'coba', '2019-07-07', 'hello'),
(18, 'FGDH', '2019-06-07', 'mau nyobaa yaa'),
(19, 'mau nyoba dulu', '2910-05-06', 'hai'),
(20, 'sdcdc', '0006-06-06', 'coba'),
(21, 'mau coba (lagi) yah', '2009-05-06', 'mau nyobaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `read_n` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `read_n`) VALUES
(1, 'dfdsf', 0),
(2, 'Surat Keluar', 0),
(3, 'Surat Keluar', 0),
(4, 'Agenda', 0),
(5, 'Surat Keluar', 0),
(6, 'Surat Masuk', 0),
(7, 'Surat Masuk', 0),
(8, 'Surat Masuk', 0),
(9, 'Surat Masuk', 0),
(10, 'Surat Keluar', 0),
(11, 'Agenda', 0),
(12, 'Agenda', 0),
(13, 'Agenda', 0),
(14, 'Agenda', 0),
(15, 'Agenda', 0),
(16, 'Surat Masuk', 0),
(17, 'Surat Keluar', 0),
(18, 'Surat Masuk', 0),
(19, 'Surat Masuk', 0),
(20, 'Surat Masuk', 0),
(21, 'Agenda', 0),
(22, 'Surat Keluar', 0),
(23, 'Surat Masuk', 0),
(24, 'Surat Masuk', 0),
(25, 'Agenda', 0),
(26, 'Surat Masuk', 1),
(27, 'Surat Keluar', 1),
(28, 'Surat Keluar', 1),
(29, 'Surat Keluar', 1),
(30, 'Surat Keluar', 1),
(31, 'Surat Keluar', 1),
(32, 'Surat Keluar', 1),
(33, 'Surat Keluar', 1),
(34, 'Surat Keluar', 1),
(35, 'Surat Keluar', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `share_dspss`
--

CREATE TABLE `share_dspss` (
  `id_disposisi` int(11) NOT NULL,
  `kpd_yth` int(11) NOT NULL,
  `kpd_yth2` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `sttus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `share_dspss`
--

INSERT INTO `share_dspss` (`id_disposisi`, `kpd_yth`, `kpd_yth2`, `id_surat`, `sttus`) VALUES
(17, 7, 4, 16, 1),
(18, 7, 4, 15, 1),
(19, 7, 4, 16, 2),
(20, 7, 4, 8, 1),
(21, 7, 4, 9, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(5) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `isi_surat` varchar(100) NOT NULL,
  `jenis_surat` varchar(10) NOT NULL,
  `no_agenda` varchar(5) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `uploader` varchar(30) NOT NULL,
  `file_surat_keluar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `no_surat`, `tgl_surat`, `tujuan`, `isi_surat`, `jenis_surat`, `no_agenda`, `keterangan`, `uploader`, `file_surat_keluar`) VALUES
(8, '432', '2099-02-02', '0', '   DVJ   ', 'Nota Dinas', '66', 'sdvsv', '', ''),
(9, '34', '2018-07-14', 'fg', 'fgfd', 'Nota Dinas', '443', 'fgf', '', ''),
(10, 'rert', '2018-07-13', 'fbf', 'fgf', 'Nota Dinas', '43', 'vbfggbg', '', ''),
(11, 'fsdfs', '2018-07-28', 'dffd', 'fdfgdf', 'Nota Dinas', '32', 'dfdfgdfgfg', '', ''),
(12, '534', '0002-04-04', 'rgdfg', 'dfgdf', 'Nota Dinas', '43', 'gfdf', '', '5b5d5edd80cc2.'),
(13, 'fdf', '0004-04-04', 'df', 'fg', 'Nota Dinas', '42', 'fgd', '', '5b5d5ef3df5a4.'),
(14, '32', '0008-06-07', 'bbnsdsb', 'vnbn', 'Nota Dinas', '3', 'dfs', '', '5b63e0a9d752d.'),
(15, '678', '2009-02-06', 'cc', 'hh', 'Nota Dinas', '77', 'bnv', '', '5b63e9e67cc5f.'),
(16, '656', '2009-05-05', 'rejt', 'fnk', 'Nota Dinas', '532', 'kwkr', '', '5b63ea2532ace.'),
(17, '43', '2009-05-05', 'ere', 'rfd', 'Nota Dinas', '534', 'fd', '', '5b642ba9f0993.'),
(18, '65', '0006-06-06', 'gfg', 'gff', 'Nota Dinas', '65', 'nvb', '', '5b642c062bc17.'),
(19, 'yrt', '0006-06-06', 'hg', 'hjh', 'Nota Dinas', '66', 'hhgj', '', '5b642e4a33d71.'),
(20, '33', '0003-03-31', 'ere', 'ere', 'Nota Dinas', '32', 'dfsd', '', '5b6446011d524.'),
(21, '367', '0006-06-06', 'vgdh', 'hgdg', 'Nota Dinas', '6227', 'vhdcs', 'urtu', '5b65b0245bc39.'),
(22, '1', '2019-06-06', 'ME', 'HELO', 'Nota Dinas', '7', 'GEGE', 'urtu', '5b6912b8df1ca.'),
(23, '6776', '2019-06-07', 'HJH', 'GCH', 'Nota Dinas', '56', 'VB', 'urtu', '5b6d7799eb194.'),
(24, '267', '2019-06-07', 'BHF', 'JCSJ', 'Nota Dinas', '78', 'JSDFS', 'urtu', '5b6d7a65a5970.'),
(25, '23', '2019-06-07', 'dd', 'jcb', 'Nota Dinas', '89', 'testing', 'urtu', '5b6d7b3fbc789.'),
(26, 'ewqd', '2019-07-08', 'bhc', 'HBC', 'Nota Dinas', '78', 'BD', 'urtu', '5b6d800e7a495.'),
(27, '67', '2019-06-07', 'HHJD', 'FG', 'Nota Dinas', '89', 'BBCS', 'urtu', ''),
(28, 'DSJ', '2019-06-07', 'VJ', 'HVJH', 'Nota Dinas', '78', 'HJS', 'urtu', ''),
(29, '7w8', '2019-07-09', 'jcbjh', 'bjczhj', 'Nota Dinas', '767', 'heii', 'urtu', ''),
(30, '77', '2019-06-07', 'hjhj', 'hhjjh', 'Nota Dinas', '67', 'bjvhjh', 'urtu', ''),
(31, 'yuy1', '2019-05-06', 'ggh', 'g', 'Nota Dinas', '67', 'vbnb', 'urtu', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(5) NOT NULL,
  `tgl_surat` date NOT NULL,
  `asal_surat` varchar(25) NOT NULL,
  `tgl_terima` date NOT NULL,
  `isi_surat` varchar(100) NOT NULL,
  `jenis_surat` varchar(10) NOT NULL,
  `no_agenda` varchar(5) NOT NULL,
  `disposisi` varchar(20) NOT NULL,
  `tgl_ekspedisi` date NOT NULL,
  `uploader` varchar(30) NOT NULL,
  `file_surat_masuk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `no_surat`, `tgl_surat`, `asal_surat`, `tgl_terima`, `isi_surat`, `jenis_surat`, `no_agenda`, `disposisi`, `tgl_ekspedisi`, `uploader`, `file_surat_masuk`) VALUES
(3, '43', '2008-05-06', 'ds', '2009-05-06', 'fvdf', 'Nota Dinas', '44', 'dfd', '2009-05-05', '', ''),
(4, '32', '0020-05-05', 'jf', '0001-07-08', 'bhd', 'Nota Dinas', '72', 'hb', '0001-07-08', '', ''),
(5, '42', '0003-06-04', 'fs', '0003-04-04', 'fgdsg', 'Nota Dinas', '44', 'rge', '0003-06-06', '', '5b5d5e3249245.'),
(6, '64', '0006-06-06', 'vdf', '0007-07-07', 'hgfhj', 'Nota Dinas', '67', 'hjj', '0007-07-07', '', '5b642d50d7ae7.'),
(7, '45', '0005-05-05', 'gfg', '0006-06-06', 'coba disposisi', 'Nota Dinas', '55', 'gh', '0555-05-05', '', '5b642feee77aa.'),
(8, '4544', '0004-04-04', 'fg', '0005-05-05', 'fgfd', 'Nota Dinas', '22', 'ddd', '0005-05-05', '', '5b64301100c51.'),
(9, 'fgef', '0005-05-05', 'ggfd', '0004-04-04', 'fdsf', 'Nota Dinas', '43', 'vfd', '0005-05-05', '', '5b643021473d6.'),
(10, 'dffsd', '0004-04-04', 'vd', '0003-04-04', 'cvd', 'Nota Dinas', '4332', 'fdf', '0003-02-22', '', '5b643033010b6.'),
(11, '366', '0022-06-27', 'jcbxjh', '0020-06-07', 'bvvch', 'Nota Dinas', '777', 'vhhd', '0009-07-08', 'urtu', '5b65afe54fb39.'),
(12, '1', '2018-04-04', 'disini', '2019-06-07', 'hei', 'Nota Dinas', '44', 'helllo', '2018-05-05', 'urtu', '5b690ec992aca.'),
(13, '44', '2019-06-07', 'hello', '2019-07-08', 'me', 'Nota Dinas', '89', 'me', '2019-07-08', 'urtu', '5b690ee92ca24.'),
(14, '2', '3028-06-06', 'HFH', '2019-07-08', 'MIS', 'Nota Dinas', '89', 'Kapolda', '2019-07-08', 'urtu', '5b69108610150.'),
(15, '1', '2019-06-07', 'HE', '0201-07-08', 'HE', 'Nota Dinas', '78', 'YUEYE', '2019-05-06', 'urtu', '5b6912e24452a.'),
(16, '3', '2019-07-08', 'ME', '2019-07-08', 'HE', 'Nota Dinas', '89', 'HEH', '2019-07-08', 'urtu', '5b691334d0e45.'),
(17, '627', '2019-06-06', 'bchc', '2019-07-08', 'hd', 'Nota Dinas', '777', 'HSDB', '2009-07-08', 'urtu', '5b6d762a7c6d1.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` tinyint(5) NOT NULL,
  `nipnrp` varchar(40) NOT NULL,
  `pangkat` varchar(40) NOT NULL,
  `jabatan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `status`, `nipnrp`, `pangkat`, `jabatan`) VALUES
(2, 'Urtu', '1234', 'Pitra Setiawan', 1, '683', 'gjhhj', 'hh'),
(4, 'Staffmin', '1234', 'HENDRI GUNAWAN, A.Md.', 3, '6727', 'Penda', 'KaurMin'),
(5, 'Kabid TI', '1234', 'KARSIMAN, S.I.K., M.M.', 4, '71040692', 'AKBP', 'Kabid TI POL'),
(7, 'kasubagmin', '1234', 'Roza Milasari S.Kom,. M.SI', 2, '6778', 'Kasubbag Renmin', 'Kompol'),
(8, 'yulia', '1234', 'Yulia Oktaviani', 0, '051097', 'Anak Magang', 'CUMA MAGANG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispss`
--
ALTER TABLE `dispss`
  ADD PRIMARY KEY (`id_dspss`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `share_dspss`
--
ALTER TABLE `share_dspss`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `dispss`
--
ALTER TABLE `dispss`
  MODIFY `id_dspss` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `share_dspss`
--
ALTER TABLE `share_dspss`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
