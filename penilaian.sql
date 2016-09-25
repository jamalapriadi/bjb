-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 25, 2016 at 10:42 PM
-- Server version: 5.7.15-0ubuntu0.16.04.1
-- PHP Version: 7.0.11-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penilaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

DROP TABLE IF EXISTS `cabang`;
CREATE TABLE `cabang` (
  `id_cabang` int(11) NOT NULL,
  `id_kanwil` int(11) DEFAULT NULL,
  `nama_cabang` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `id_kanwil`, `nama_cabang`) VALUES
(1, 1, 'KC Bandung Pelajar Pejuang'),
(2, 2, 'KC Tasikmalaya'),
(3, 3, 'KC Cirebon'),
(4, 4, 'KC Bogor'),
(5, 5, 'KC Serang'),
(6, 6, 'KC Bekasi'),
(7, 7, 'KC Bidakara'),
(8, 8, 'KC Bandung Braga');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_laporan`
--

DROP TABLE IF EXISTS `daftar_laporan`;
CREATE TABLE `daftar_laporan` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_laporan`
--

INSERT INTO `daftar_laporan` (`id`, `nama`, `start_date`, `end_date`) VALUES
(1, 'Kunjingan 1', '2016-09-21', '2016-09-30'),
(2, 'Kunjungan 2', '2016-10-01', '2016-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `detail_laporan`
--

DROP TABLE IF EXISTS `detail_laporan`;
CREATE TABLE `detail_laporan` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_laporan_staff` int(11) UNSIGNED NOT NULL,
  `id_paramater` int(11) UNSIGNED NOT NULL,
  `optional` enum('N/A','Ya','Tidak') NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_parameter`
--

DROP TABLE IF EXISTS `detail_parameter`;
CREATE TABLE `detail_parameter` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_paramater` int(11) UNSIGNED NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file_report_kcp`
--

DROP TABLE IF EXISTS `file_report_kcp`;
CREATE TABLE `file_report_kcp` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_report_kcp` int(11) UNSIGNED NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fisik`
--

DROP TABLE IF EXISTS `fisik`;
CREATE TABLE `fisik` (
  `id_fisik` int(11) UNSIGNED NOT NULL,
  `nama_fisik` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fisik`
--

INSERT INTO `fisik` (`id_fisik`, `nama_fisik`) VALUES
(1, 'ATM'),
(2, 'Banking Hall');

-- --------------------------------------------------------

--
-- Table structure for table `fisik_kcp`
--

DROP TABLE IF EXISTS `fisik_kcp`;
CREATE TABLE `fisik_kcp` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_fisik` int(11) UNSIGNED NOT NULL,
  `id_kcp` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
CREATE TABLE `gender` (
  `id_gender` int(11) NOT NULL,
  `nama_gender` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id_gender`, `nama_gender`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `kanpus`
--

DROP TABLE IF EXISTS `kanpus`;
CREATE TABLE `kanpus` (
  `id_kanpus` int(11) NOT NULL,
  `nama_kanpus` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kanpus`
--

INSERT INTO `kanpus` (`id_kanpus`, `nama_kanpus`, `alamat`, `foto`) VALUES
(1, 'Kantor Pusat', 'Jl. Braga No.135 Bandung', 'No Image');

-- --------------------------------------------------------

--
-- Table structure for table `kanwil`
--

DROP TABLE IF EXISTS `kanwil`;
CREATE TABLE `kanwil` (
  `id_kanwil` int(11) NOT NULL,
  `nama_kanwil` varchar(50) DEFAULT NULL,
  `id_kanpus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kanwil`
--

INSERT INTO `kanwil` (`id_kanwil`, `nama_kanwil`, `id_kanpus`) VALUES
(1, 'Kanwil I', 1),
(2, 'Kanwil II', 1),
(3, 'Kanwil III', 1),
(4, 'Kanwil IV', 1),
(5, 'Kanwil V', 1),
(6, 'Kanwil VI', 1),
(7, 'Kanwil VII', 1),
(8, 'Kanwil VIII', 1),
(13, 'Tes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kcp`
--

DROP TABLE IF EXISTS `kcp`;
CREATE TABLE `kcp` (
  `id_kcp` int(11) UNSIGNED NOT NULL,
  `id_cabang` int(11) DEFAULT NULL,
  `nama_kcp` varchar(100) DEFAULT NULL,
  `alamat_kcp` varchar(100) DEFAULT NULL,
  `telp_kcp` varchar(25) DEFAULT NULL,
  `fax_kcp` varchar(20) DEFAULT NULL,
  `foto_kcp` varchar(100) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kcp`
--

INSERT INTO `kcp` (`id_kcp`, `id_cabang`, `nama_kcp`, `alamat_kcp`, `telp_kcp`, `fax_kcp`, `foto_kcp`, `username`, `password`) VALUES
(1, 1, 'KC Bandung Pelajar Pejuang', 'Jl. Pelajar Pejuang 45 No.54 Kota Bandung, Jawa Barat', '022-7316408, 7306745', '022-7306619, 7308038', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_staff_or_fisik`
--

DROP TABLE IF EXISTS `laporan_staff_or_fisik`;
CREATE TABLE `laporan_staff_or_fisik` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_kcp` int(11) UNSIGNED NOT NULL,
  `id_staff` int(11) UNSIGNED NOT NULL,
  `id_fisik` int(11) UNSIGNED NOT NULL,
  `index_nilai` decimal(10,0) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mcoa_kategori`
--

DROP TABLE IF EXISTS `mcoa_kategori`;
CREATE TABLE `mcoa_kategori` (
  `id_kategori` int(11) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `id_posisi` int(11) UNSIGNED DEFAULT NULL,
  `id_fisik` int(10) UNSIGNED DEFAULT NULL,
  `jenis` enum('Mcoa','Kategori') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcoa_kategori`
--

INSERT INTO `mcoa_kategori` (`id_kategori`, `nama_kategori`, `id_posisi`, `id_fisik`, `jenis`) VALUES
(10, 'Telepon tersambung ke cabang', 3, NULL, 'Mcoa');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_parent` int(1) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `icon`, `is_active`, `is_parent`, `sort`) VALUES
(1, 'menu management', 'admin/menu', 'fa fa-sticky-note', 0, 0, 0),
(2, 'Pusat', 'admin/kanpus', 'fa fa-sitemap', 1, 0, 2),
(3, 'Kanwil', 'admin/kanwils', 'fa fa-flag', 1, 0, 3),
(4, 'Cabang', 'admin/cabangs', 'fa  fa-leaf', 1, 0, 4),
(5, 'KCP', 'admin/kcp', 'fa  fa-fax', 1, 0, 5),
(6, 'Posisi', 'admin/positions', 'fa fa-tag', 1, 0, 6),
(7, 'Staff', 'admin/staffs_kcp', 'fa fa-group', 1, 0, 7),
(8, 'Fisik', '#', 'fa fa-building', 1, 0, 8),
(9, 'Master Fisik', 'admin/fisiks_parameter', '', 1, 8, 0),
(10, 'Master KCP', 'admin/fisiks_kcp', '', 1, 8, 0),
(11, 'Laporan', '#', 'fa fa-file', 1, 0, 9),
(12, 'Daftar', 'admin/laporan_daftar', '', 1, 11, 0),
(13, 'KCP', 'admin/laporan_list_kcp', '', 1, 11, 0),
(14, 'Staff', 'admin/laporan_list_staff', '', 1, 11, 0),
(15, 'Dashboard', 'admin/dashboard', 'fa fa-desktop', 1, 0, 1),
(16, 'Fisik KCP', 'admin/laporan_list_fisik', '', 1, 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `parameter`
--

DROP TABLE IF EXISTS `parameter`;
CREATE TABLE `parameter` (
  `id_parameter` int(11) UNSIGNED NOT NULL,
  `id_kategori` int(11) UNSIGNED DEFAULT NULL,
  `id_posisi` int(11) DEFAULT NULL,
  `gender` varchar(15) NOT NULL,
  `nama_parameter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(100) DEFAULT NULL,
  `email_pengguna` varchar(100) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `email_pengguna`, `password`) VALUES
(1, 's1150', 'admin@bjbs.co.id', 'e10adc3949ba59abbe56e057f');

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

DROP TABLE IF EXISTS `posisi`;
CREATE TABLE `posisi` (
  `id_posisi` int(11) UNSIGNED NOT NULL,
  `nama_posisi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id_posisi`, `nama_posisi`) VALUES
(1, 'Analis Emas'),
(2, 'Customer Service'),
(3, 'Phoneliner'),
(4, 'Satpam'),
(5, 'Teller');

-- --------------------------------------------------------

--
-- Table structure for table `report_kcp`
--

DROP TABLE IF EXISTS `report_kcp`;
CREATE TABLE `report_kcp` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kcp` int(10) UNSIGNED NOT NULL,
  `index_nilai` decimal(10,0) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `id_kcp` int(11) DEFAULT NULL,
  `id_posisi` int(11) DEFAULT NULL,
  `nama_staff` varchar(100) DEFAULT NULL,
  `id_gender` int(11) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1474768922, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id_cabang`),
  ADD KEY `id_kanwil` (`id_kanwil`);

--
-- Indexes for table `daftar_laporan`
--
ALTER TABLE `daftar_laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_laporan`
--
ALTER TABLE `detail_laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_laporan_staff` (`id_laporan_staff`),
  ADD KEY `id_paramater` (`id_paramater`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `detail_parameter`
--
ALTER TABLE `detail_parameter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paramater` (`id_paramater`);

--
-- Indexes for table `file_report_kcp`
--
ALTER TABLE `file_report_kcp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_report_kcp` (`id_report_kcp`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `fisik`
--
ALTER TABLE `fisik`
  ADD PRIMARY KEY (`id_fisik`);

--
-- Indexes for table `fisik_kcp`
--
ALTER TABLE `fisik_kcp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fisik` (`id_fisik`),
  ADD KEY `id_kcp` (`id_kcp`),
  ADD KEY `id_kcp_2` (`id_kcp`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id_gender`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kanpus`
--
ALTER TABLE `kanpus`
  ADD PRIMARY KEY (`id_kanpus`);

--
-- Indexes for table `kanwil`
--
ALTER TABLE `kanwil`
  ADD PRIMARY KEY (`id_kanwil`),
  ADD KEY `id_kanpus` (`id_kanpus`);

--
-- Indexes for table `kcp`
--
ALTER TABLE `kcp`
  ADD PRIMARY KEY (`id_kcp`),
  ADD KEY `id_cabang` (`id_cabang`);

--
-- Indexes for table `laporan_staff_or_fisik`
--
ALTER TABLE `laporan_staff_or_fisik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kcp` (`id_kcp`),
  ADD KEY `id_staff` (`id_staff`),
  ADD KEY `id_fisik` (`id_fisik`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcoa_kategori`
--
ALTER TABLE `mcoa_kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `kategori` (`id_posisi`),
  ADD KEY `id_fisik` (`id_fisik`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`id_parameter`),
  ADD KEY `id_posisi` (`id_posisi`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id_posisi`);

--
-- Indexes for table `report_kcp`
--
ALTER TABLE `report_kcp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kcp` (`id_kcp`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`),
  ADD KEY `id_kcp` (`id_kcp`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id_cabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `daftar_laporan`
--
ALTER TABLE `daftar_laporan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detail_laporan`
--
ALTER TABLE `detail_laporan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_parameter`
--
ALTER TABLE `detail_parameter`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `file_report_kcp`
--
ALTER TABLE `file_report_kcp`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fisik`
--
ALTER TABLE `fisik`
  MODIFY `id_fisik` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fisik_kcp`
--
ALTER TABLE `fisik_kcp`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id_gender` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kanpus`
--
ALTER TABLE `kanpus`
  MODIFY `id_kanpus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kanwil`
--
ALTER TABLE `kanwil`
  MODIFY `id_kanwil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `kcp`
--
ALTER TABLE `kcp`
  MODIFY `id_kcp` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `laporan_staff_or_fisik`
--
ALTER TABLE `laporan_staff_or_fisik`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mcoa_kategori`
--
ALTER TABLE `mcoa_kategori`
  MODIFY `id_kategori` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `id_parameter` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id_posisi` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `report_kcp`
--
ALTER TABLE `report_kcp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cabang`
--
ALTER TABLE `cabang`
  ADD CONSTRAINT `cabang_ibfk_1` FOREIGN KEY (`id_kanwil`) REFERENCES `kanwil` (`id_kanwil`);

--
-- Constraints for table `detail_laporan`
--
ALTER TABLE `detail_laporan`
  ADD CONSTRAINT `f_lap_staff` FOREIGN KEY (`id_laporan_staff`) REFERENCES `laporan_staff_or_fisik` (`id`),
  ADD CONSTRAINT `f_pmp` FOREIGN KEY (`id_paramater`) REFERENCES `parameter` (`id_parameter`),
  ADD CONSTRAINT `f_usr` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `id_userr` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `detail_parameter`
--
ALTER TABLE `detail_parameter`
  ADD CONSTRAINT `parameter_ibfk_11` FOREIGN KEY (`id_paramater`) REFERENCES `parameter` (`id_parameter`);

--
-- Constraints for table `file_report_kcp`
--
ALTER TABLE `file_report_kcp`
  ADD CONSTRAINT `f_report_kcp` FOREIGN KEY (`id_report_kcp`) REFERENCES `report_kcp` (`id`),
  ADD CONSTRAINT `f_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `fisik_kcp`
--
ALTER TABLE `fisik_kcp`
  ADD CONSTRAINT `f_fisik` FOREIGN KEY (`id_fisik`) REFERENCES `fisik` (`id_fisik`),
  ADD CONSTRAINT `f_kcp` FOREIGN KEY (`id_kcp`) REFERENCES `kcp` (`id_kcp`);

--
-- Constraints for table `kanwil`
--
ALTER TABLE `kanwil`
  ADD CONSTRAINT `kanwil_ibfk_1` FOREIGN KEY (`id_kanpus`) REFERENCES `kanpus` (`id_kanpus`);

--
-- Constraints for table `kcp`
--
ALTER TABLE `kcp`
  ADD CONSTRAINT `kcp_ibfk_1` FOREIGN KEY (`id_cabang`) REFERENCES `cabang` (`id_cabang`) ON UPDATE CASCADE;

--
-- Constraints for table `laporan_staff_or_fisik`
--
ALTER TABLE `laporan_staff_or_fisik`
  ADD CONSTRAINT `f_fisiks` FOREIGN KEY (`id_fisik`) REFERENCES `fisik` (`id_fisik`),
  ADD CONSTRAINT `f_kcpp` FOREIGN KEY (`id_kcp`) REFERENCES `kcp` (`id_kcp`),
  ADD CONSTRAINT `f_staff` FOREIGN KEY (`id_fisik`) REFERENCES `fisik` (`id_fisik`),
  ADD CONSTRAINT `f_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `mcoa_kategori`
--
ALTER TABLE `mcoa_kategori`
  ADD CONSTRAINT `fisik` FOREIGN KEY (`id_fisik`) REFERENCES `fisik` (`id_fisik`),
  ADD CONSTRAINT `posisikf` FOREIGN KEY (`id_posisi`) REFERENCES `posisi` (`id_posisi`);

--
-- Constraints for table `parameter`
--
ALTER TABLE `parameter`
  ADD CONSTRAINT `id_kat` FOREIGN KEY (`id_kategori`) REFERENCES `mcoa_kategori` (`id_kategori`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
