-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 19, 2016 at 07:15 PM
-- Server version: 5.7.15-0ubuntu0.16.04.1
-- PHP Version: 7.0.12-1+deb.sury.org~xenial+1

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
(4, 'Kunjungan 1', '2016-10-01', '2016-10-20'),
(5, 'Kunjungan 2', '2016-10-20', '2016-11-10');

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
  `id_parameter` int(11) UNSIGNED NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_parameter`
--

INSERT INTO `detail_parameter` (`id`, `id_parameter`, `pilihan`) VALUES
(4, 20, 'A'),
(5, 21, 'A'),
(6, 21, 'B'),
(7, 21, 'C'),
(19, 402, 'Lebih dari 3 kali'),
(20, 402, '3 Kali'),
(21, 402, '2 kali'),
(22, 402, '1 kali langsung tersambung'),
(23, 403, 'Lebih dari 4 kali'),
(24, 403, '4 Kali'),
(25, 403, '3 Kali'),
(26, 403, 'Kurang dari 3 Kali'),
(27, 404, 'Sekali'),
(28, 404, 'Dua kali'),
(29, 404, 'Lebih dari 3 kali'),
(30, 404, 'Tidak disambungkan'),
(31, 405, 'Kurang dari 10 menit'),
(32, 405, 'Antara 10-15 Menit'),
(33, 405, 'Antara 20-30 Menit'),
(34, 405, 'Lebih dari 30 Menit'),
(35, 406, '0 - 30 detik'),
(36, 406, '31 detik – 60 detik'),
(37, 406, '61 detik – 1 menit 30 detik'),
(38, 406, 'Lebih dari 1 menit 30 detik');

-- --------------------------------------------------------

--
-- Table structure for table `file_report_kcp`
--

DROP TABLE IF EXISTS `file_report_kcp`;
CREATE TABLE `file_report_kcp` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_report_kcp` int(11) UNSIGNED NOT NULL,
  `type_file` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_report_kcp`
--

INSERT INTO `file_report_kcp` (`id`, `id_report_kcp`, `type_file`, `nama_file`, `user_id`) VALUES
(6, 1, 'image/jpeg', '091.jpg', 1),
(7, 1, 'image/jpeg', '092.jpg', 1);

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
(2, 'Banking Hall'),
(3, 'Kondisi Kantor Cabang'),
(5, 'Kondisi Luar Banking Hall'),
(6, 'Meja'),
(7, 'Mobil'),
(8, 'Mushola'),
(9, 'Peralatan Banking Hall'),
(10, 'Toilet'),
(11, 'Toilet Wanita');

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

--
-- Dumping data for table `fisik_kcp`
--

INSERT INTO `fisik_kcp` (`id`, `id_fisik`, `id_kcp`) VALUES
(1, 1, 1),
(4, 1, 2);

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
(8, 'Kanwil VIII', 1);

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
(1, 1, 'KC Bandung Pelajar Pejuang', 'Jl. Pelajar Pejuang 45 No.54 Kota Bandung, Jawa Barat', '022-7316408, 7306745', '022-7306619, 7308038', 'Untitled-4.jpg', NULL, NULL),
(2, 1, 'KCP Soreang', 'Jl. Raya Soreang Banjaran No.11 Soreang Kab. Bandung, Jawa Barat', '0856', '1213', NULL, 'aziz', '77f96d74d7'),
(3, 1, 'KCP Cimahi', 'Jl. Jend. Amir Machmud No.589 Kota Cimahi, Jawa Barat', '022-6631487', '022-6631620', NULL, 'admin5@gmail.com', '5f4dcc3b5a'),
(4, 1, 'KCP Garut', 'Jl. Ciledug No.77  Kab. Garut, Jawa Barat', '0262-546045', '0262-546044', '', 'admin1', '0192023a7b'),
(5, 1, 'KCP Rancaekek', 'Jl. Raya Bandung Garut KM 21 Rancaekek Kab. Bandung, Jawa barat', '022-7791821', '022-7791821', 'dki.png', 'admin2', '0192023a7b'),
(6, 1, 'KCP Sumedang', 'Jl. Mayor Abdurrachman No. 99 Kab. Sumedang, Jawa Barat', '0261-203207', '0261-203189', '13645248_1081315131954846_6213349465909910460_n.jpg', '', 'd41d8cd98f');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_staff_or_fisik`
--

DROP TABLE IF EXISTS `laporan_staff_or_fisik`;
CREATE TABLE `laporan_staff_or_fisik` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_kcp` int(11) UNSIGNED NOT NULL,
  `id_staff` int(11) UNSIGNED DEFAULT NULL,
  `id_fisik` int(11) UNSIGNED DEFAULT NULL,
  `id_daftar_laporan` int(11) UNSIGNED NOT NULL,
  `index_nilai` decimal(10,0) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_staff_or_fisik`
--

INSERT INTO `laporan_staff_or_fisik` (`id`, `id_kcp`, `id_staff`, `id_fisik`, `id_daftar_laporan`, `index_nilai`, `user_id`) VALUES
(1, 1, 1, NULL, 4, '5', 1),
(2, 1, NULL, 1, 4, '90', 1);

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
(10, 'Telepon tersambung ke cabang', 3, NULL, 'Mcoa'),
(13, 'Apabila disambungkan kepada petugas bank lainnya, berapa jumlah transfer teleponsampai Kepada petugas yang dituju', 3, NULL, 'Kategori'),
(14, 'Apakah pada saat pertama kali menghubungi cabang/cabang pembantu/gerai bjb syariah tersambung pada mesin penjawab telepon', 3, NULL, 'Kategori'),
(15, 'Apakah petugas menanyakan kepada Anda/Nasabah tentang produk bjb syariah di awal', 3, NULL, 'Kategori'),
(16, 'Bagaimana kah sikap petugas operator ketika mengangkat telepon', 3, NULL, 'Kategori'),
(17, 'Bagaimana sikap petugas saat menerima panggilan dari Anda', 3, NULL, 'Kategori'),
(18, 'Bagaimanakah pengetahuan petugas mengenai produk investasi bjb syariah?', 3, NULL, 'Kategori'),
(19, 'Bagaimanakan penutup petugas di akhir percakapan', 3, NULL, 'Kategori'),
(20, 'Berbicara & penjelasan', 3, NULL, 'Kategori'),
(21, 'Pada saat pertama kali telepon ke cabang/cabang pembantu/gerai bank bjb syariah berapa kalikah telepon dapat tersambung', 3, NULL, 'Kategori'),
(22, 'Setelah tersambung berapa kali nada tunggu baru telepon diangkat', 3, NULL, 'Kategori'),
(23, 'Tes Ah', NULL, 1, 'Mcoa'),
(24, 'Tes Atm', NULL, 1, 'Mcoa'),
(26, 'Bagaimana kondisi dinding didalam ATM?', NULL, 1, 'Kategori'),
(27, 'Tes Fisik Kategori Kedua', NULL, 1, 'Mcoa'),
(29, 'Tes Analis Emas', 1, NULL, 'Mcoa'),
(33, 'Apakah pada saat Anda/nasabah datang terdapat analisemas yang melayani', 1, NULL, 'Kategori'),
(34, 'Bagaimana keberadaan perlengkapan meja/tempat bekerja AE', 1, NULL, 'Kategori'),
(35, 'Bagaimana penampilan AE saat melayani Anda/nasabah', 1, NULL, 'Kategori'),
(36, 'Bagaimana pengetahuan AE saat berinteraksi dengan Anda/nasabah', 1, NULL, 'Kategori'),
(37, 'Bagaimana sikap AE pada akhir dalam melayani Anda/nasabah', 1, NULL, 'Kategori'),
(38, 'Bagaimana sikap Analis Emas saat berinteraksi dengan Anda/nasabah', 1, NULL, 'Kategori'),
(39, 'Bagaimana sikap pelayanan analis emas pada saat menerima Anda/nasabah', 1, NULL, 'Kategori'),
(40, 'Hal-hal apa saja yang dilakukan oleh Analis emas dalam melakukan penjelasan mengenai produk gadai emas bjb syariah', 1, NULL, 'Kategori'),
(41, 'Proses transaksi gadai emas apa saja yang dijelaskan oleh Analis emas', 1, NULL, 'Kategori'),
(42, 'Apakah pada saat Anda/nasabah datang terdapat CS yang melayani?', 2, NULL, 'Kategori'),
(43, 'Bagaimana keberadaan perlengkapan meja/tempat bekerja CS?', 2, NULL, 'Kategori'),
(44, 'Bagaimana kemampuan CS dalam melakukan cross selling product', 2, NULL, 'Kategori'),
(45, 'Bagaimana kemampuan CS dalam menjelaskan fitur-fitur produk tabungan?', 2, NULL, 'Kategori'),
(46, 'Bagaimana penampilan CS saat melayani Anda/nasabah?', 2, NULL, 'Kategori'),
(47, 'Bagaimana pengetahuan CS saat berinteraksi dengan Anda/nasabah?', 2, NULL, 'Kategori'),
(48, 'Bagaimana sikap CS pada akhir dalam melayani Anda/nasabah?', 2, NULL, 'Kategori'),
(49, 'Bagaimana sikap CS saat berinteraksi dengan Anda/nasabah?', 2, NULL, 'Kategori'),
(50, 'Bagaimana sikap dari CS saat Anda berkeinginan memiliki rekening di bjb syariah?', 2, NULL, 'Kategori'),
(51, 'Bagaimana sikap pelayanan CS pada saat menerima Anda/nasabah?', 2, NULL, 'Kategori'),
(52, 'Fitur Produk Tabungan', 2, NULL, 'Kategori'),
(53, 'Melakukan Cros Selling', 2, NULL, 'Kategori'),
(54, 'Aktifitas Satpam yang berada d halaman parkir bank/ gardu satpam', 4, NULL, 'Kategori'),
(55, 'Bagaimana perlengkapan satpam di dalam banking hall ?', 4, NULL, 'Kategori'),
(56, 'Bagaimana sikap satpam ketika Anda/Nasabah keluar dari banking hall', 4, NULL, 'Kategori'),
(57, 'Bagaimana sikap satpam ketika menyambut kedatangan Anda/nasabah', 4, NULL, 'Kategori'),
(58, 'Keberadaan satpam saat Anda/Nasabah keluar dari banking hall', 4, NULL, 'Kategori'),
(59, 'Sikap satpam ketika berinteraksi dengan nasabah', 4, NULL, 'Kategori'),
(60, 'Apa yang dilakukan oleh teller pada saat di akhir pelayanan?', 5, NULL, 'Kategori'),
(61, 'Apakah yang dilakukan oleh Teller ketika Anda tiba di loket pelayanan?', 5, NULL, 'Kategori'),
(62, 'Bagaimana penampilan teller pada saat Anda datang?', 5, NULL, 'Kategori'),
(63, 'Bagaimana sikap teller pada saat melayani nasabah?', 5, NULL, 'Kategori'),
(64, 'Kondisi counter teller', 5, NULL, 'Kategori'),
(65, 'Bagaimana kondisi kaca pada ATM?', NULL, 1, 'Kategori'),
(66, 'Bagaimana kondisi lantai didalam ATM?', NULL, 1, 'Kategori'),
(67, 'Bagaimana kondisi mesin ATM di cabang ?', NULL, 1, 'Kategori'),
(68, 'Bagaimana kondisi pencahayaan didalam ATM?', NULL, 1, 'Kategori'),
(69, 'Bagaimana kondisi perlengkapan lainnya di ATM?', NULL, 1, 'Kategori'),
(70, 'Bagaimana kondisi plafon didalam ATM?', NULL, 1, 'Kategori'),
(71, 'Bagaimana kondisi tempat sampah di ruangan ATM?', NULL, 1, 'Kategori'),
(72, 'Bagaimana suhu ruangan di dalam ATM?', NULL, 1, 'Kategori'),
(73, 'Keberadaan ATM', NULL, 1, 'Kategori'),
(74, 'Keberadaan Tempat Sampah', NULL, 1, 'Kategori'),
(75, 'Lampu ATM', NULL, 1, 'Kategori'),
(76, 'Durasi waktu pembukaan rekening', 2, NULL, 'Mcoa'),
(77, 'Skill Teller', 4, NULL, 'Mcoa');

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
  `id_posisi` int(11) UNSIGNED DEFAULT NULL,
  `id_fisik` int(11) UNSIGNED DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `nama_parameter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parameter`
--

INSERT INTO `parameter` (`id_parameter`, `id_kategori`, `id_posisi`, `id_fisik`, `gender`, `nama_parameter`) VALUES
(20, 23, NULL, 1, '', 'Tes ATM dengan ng-parent'),
(21, 23, NULL, 1, '', 'Tes dengan ng parent 2'),
(26, 13, 3, NULL, 'Pria,Wanita', 'Lebih dari 3 kali'),
(27, 13, 3, NULL, 'Pria,Wanita', '3 Kali'),
(28, 13, 3, NULL, 'Pria,Wanita', '2 kali'),
(29, 13, 3, NULL, 'Pria,Wanita', '1 kali langsung tersambung'),
(30, 14, 3, NULL, 'Pria,Wanita', 'Ya, shopper memasukan no ext. CS yang dituju'),
(31, 14, 3, NULL, 'Pria,Wanita', 'Ya, shopper memasukan no ext. Operator'),
(32, 14, 3, NULL, 'Pria,Wanita', 'Tidak, telepon langsung tersambung ke operator'),
(33, 14, 3, NULL, 'Pria,Wanita', 'Tidak, telepon langsung tersambung ke CS/Petugas back office lainnya'),
(34, 15, 3, NULL, 'Pria,Wanita', 'Produk yang Anda miliki di bjb syariah'),
(35, 15, 3, NULL, 'Pria,Wanita', 'Produk investasi yang diinginkan'),
(36, 15, 3, NULL, 'Pria,Wanita', 'Tujuan investasi Anda'),
(37, 15, 3, NULL, 'Pria,Wanita', 'Menerangkan mengenai cara investasi'),
(38, 15, 3, NULL, 'Pria,Wanita', 'Jangka waktu investasi'),
(39, 33, 1, NULL, 'Pria,Wanita', 'Tidak ada, AE terlihat tidak berada ditempatnya'),
(40, 33, 1, NULL, 'Pria,Wanita', 'Ya, AE stand by di tempatnya dan siap melayani'),
(41, 33, 1, NULL, 'Pria,Wanita', 'Ya, AE terlihat tidak siap melayani (sedang mengobrol dengan karyawan lain)'),
(42, 34, 1, NULL, 'Pria,Wanita', 'Bersih'),
(43, 34, 1, NULL, 'Pria,Wanita', 'Rapi (dokumen & alat tulis tertata rapi)'),
(44, 34, 1, NULL, 'Pria,Wanita', 'Terdapat permen'),
(45, 34, 1, NULL, 'Pria,Wanita', 'Terdapat rak brosur'),
(46, 34, 1, NULL, 'Pria,Wanita', 'Tidak ada barang yang tidak semestinya (Tidak terlihat barang pribadi, alat makan/minum, foto pribadi boneka & hiasan)'),
(47, 35, 1, NULL, ',Wanita', 'AE menggunakan jilbab rapi'),
(48, 35, 1, NULL, ',Wanita', 'AE terlihat rapi, bersih & tidak bau'),
(49, 35, 1, NULL, 'Pria,', 'AE terlihat rapi, bersih & tidak bau'),
(50, 35, 1, NULL, ',Wanita', 'Aksesories maks 4 titik (bros, cincin, jam tangan & gelang)'),
(51, 35, 1, NULL, 'Pria,', 'Aksesoris maks 3 titik (Jam tangan, cincin, Jepit Dasi)'),
(52, 35, 1, NULL, 'Pria,', 'Kumis terpotong rapi & tidak melebihi bibir'),
(53, 35, 1, NULL, ',Wanita', 'Memakai bedak (tampak segar & tidak berminyak)'),
(54, 35, 1, NULL, 'Pria,', 'Mengenakan dasi panjang, warna tidak mencolok serta motif tidak kekanak-kanakan (N/A jika waktu kunjungan dilakukan pada hari Jum’at'),
(55, 35, 1, NULL, ',Wanita', 'Mengenakan name tag (dipasang di dada kiri) dan terbaca dengan jelas'),
(56, 35, 1, NULL, 'Pria,', 'Mengenakan name tag (khusus dipasang di dada kiri) dan terbaca dengan jelas'),
(57, 36, 1, NULL, 'Pria,Wanita', 'AE dapat menjelaskan produk gadai bjb syariah dengan baik, benar dan menggunakan sales kit (brosur/ digital brosur)'),
(58, 36, 1, NULL, 'Pria,Wanita', 'AE menggunakan rangkaian kata yang baik dan benar'),
(59, 36, 1, NULL, 'Pria,Wanita', 'AEmenginformasikan menerangkan mengenai bjb syariah call (salam maslahah 1500727)'),
(60, 37, 1, NULL, 'Pria,Wanita', 'AE berdiri'),
(61, 37, 1, NULL, 'Pria,Wanita', 'AE Melakukan customer intimacy yang mengarah kepada CRM menyebutkan hati-hati di jalan pada saat greeting akhir atau selamat melakukan aktifitas kembali atausilahkan datang kembali'),
(62, 37, 1, NULL, 'Pria,Wanita', 'AE menawarkan bantuan lain'),
(63, 37, 1, NULL, 'Pria,Wanita', 'AE mengucapkan asalamualaikum'),
(64, 37, 1, NULL, 'Pria,Wanita', 'AE mengucapkan terima kasih sambil menyebutkan nama nasabah'),
(65, 37, 1, NULL, 'Pria,Wanita', 'AE tersenyum ramah& tulus'),
(71, 38, 1, NULL, 'Pria,Wanita', 'AE fokus melayani nasabah (kontak mata)'),
(72, 38, 1, NULL, 'Pria,Wanita', 'AE menggali kebutuhan nasabah'),
(73, 38, 1, NULL, 'Pria,Wanita', 'AE mengkonfirmasi kebutuhan transaksi nasabah'),
(74, 38, 1, NULL, 'Pria,Wanita', 'AE menyebutkan nama nasabah'),
(75, 38, 1, NULL, 'Pria,Wanita', 'AE tidak melakukan aktifitas lain selain melayani nasabah saat ini'),
(76, 39, 1, NULL, 'Pria,Wanita', 'AE melakukan kontak mata dengan nasabah'),
(77, 39, 1, NULL, 'Pria,Wanita', 'AE Memperkenalkan diri'),
(78, 39, 1, NULL, 'Pria,Wanita', 'AE mempersilahkan nasabah duduk dengan telapak tangan terbuka'),
(79, 39, 1, NULL, 'Pria,Wanita', 'AE menangkupkan kedua tangan'),
(80, 39, 1, NULL, 'Pria,Wanita', 'AE Menanyakan nama nasabah'),
(81, 39, 1, NULL, 'Pria,Wanita', 'AE menawarkan bantuan dengan diakhiri penyebutan nama nasabah'),
(82, 39, 1, NULL, 'Pria,Wanita', 'AE menerima Anda dengan berdiri'),
(83, 39, 1, NULL, 'Pria,Wanita', 'AE mengucapkan Asalamualaikum'),
(84, 39, 1, NULL, 'Pria,Wanita', 'AE tersenyum tulus, ramah, dan sopan'),
(85, 39, 1, NULL, 'Pria,Wanita', 'Saat AE memperkenalkan diri apakah posisi tangan kanan menempel didada'),
(86, 40, 1, NULL, 'Pria,Wanita', 'AE Menanyakan apakah nasabah sudah memiliki rekening sebelumnya di bank bjb syariah'),
(87, 40, 1, NULL, 'Pria,Wanita', 'AE menanyakan apakah nasabah sudah mengetahui produk gadai bank bjb syariah'),
(88, 40, 1, NULL, 'Pria,Wanita', 'AE menjelaskan AKAD Mitra Emas'),
(89, 40, 1, NULL, 'Pria,Wanita', 'Menjelaskan mengenai fitur produk (misalnya biaya-biaya dan prasyarat)'),
(90, 40, 1, NULL, 'Pria,Wanita', 'Menjelaskan prosedur gadai emas/Mitra Emas'),
(91, 40, 1, NULL, 'Pria,Wanita', 'Menyebutkan nama produk'),
(92, 41, 1, NULL, 'Pria,Wanita', 'Akad gadai'),
(93, 41, 1, NULL, 'Pria,Wanita', 'Biaya penalty'),
(94, 41, 1, NULL, 'Pria,Wanita', 'Biaya sewa/ujroh'),
(95, 41, 1, NULL, 'Pria,Wanita', 'Jangka waktu'),
(96, 41, 1, NULL, 'Pria,Wanita', 'Ketentuan – ketentuan'),
(97, 41, 1, NULL, 'Pria,Wanita', 'Konfirmasi besarnya biaya perpanjangan'),
(98, 41, 1, NULL, 'Pria,Wanita', 'Konfirmasi dan kesepakatan harga taksiran'),
(99, 41, 1, NULL, 'Pria,Wanita', 'Memberikan harga taksiran'),
(100, 41, 1, NULL, 'Pria,Wanita', 'Proses penaksiran'),
(101, 42, 2, NULL, 'Pria,Wanita', 'Tidak ada, CS terlihat tidak berada ditempatnya'),
(102, 42, 2, NULL, 'Pria,Wanita', 'Ya, CS stand by di tempatnya dan siap melayani'),
(103, 42, 2, NULL, 'Pria,Wanita', 'Ya, CS terlihat tidak siap melayani (sedang mengobrol dengan karyawan lain)'),
(104, 43, 2, NULL, 'Pria,Wanita', 'Bersih'),
(105, 43, 2, NULL, 'Pria,Wanita', 'Rapi (dokumen & alat tulis tertata rapi)'),
(106, 43, 2, NULL, 'Pria,Wanita', 'Terdapat permen'),
(107, 43, 2, NULL, 'Pria,Wanita', 'Terdapat rak brosur'),
(108, 43, 2, NULL, 'Pria,Wanita', 'Tidak ada barang yang tidak semestinya (Tidak terlihat barang pribadi, alat makan/minum, foto pribadi boneka & hiasan)'),
(109, 44, 2, NULL, 'Pria,Wanita', 'Apakah CS menjelaskan simulasi produk'),
(110, 44, 2, NULL, 'Pria,Wanita', 'Benefit'),
(111, 44, 2, NULL, 'Pria,Wanita', 'Fitur'),
(112, 44, 2, NULL, 'Pria,Wanita', 'Persyaratan produk'),
(113, 45, 2, NULL, 'Pria,Wanita', 'Administrasi ATM bulanan (Rp 5.000)'),
(114, 45, 2, NULL, 'Pria,Wanita', 'Biaya Cek saldo di ATM bersama dan ATM Prima (Rp 4.000,-)'),
(115, 45, 2, NULL, 'Pria,Wanita', 'Biaya gagal transaksi di ATM bersama dan ATM Prima (Rp 2.500)'),
(116, 45, 2, NULL, 'Pria,Wanita', 'Biaya gagal transaksi kartu debit prima (Rp 2.000)'),
(117, 45, 2, NULL, 'Pria,Wanita', 'Biaya materai (Rp 6.000,-)'),
(118, 45, 2, NULL, 'Pria,Wanita', 'Biaya pembatalan transaksi kartu debit prima (Rp 4.000)'),
(119, 45, 2, NULL, 'Pria,Wanita', 'Biaya pembelian pulsa (Sesuai dengan harga pulsa)'),
(120, 45, 2, NULL, 'Pria,Wanita', 'Biaya penutupan rekening Rp 20,000'),
(121, 45, 2, NULL, 'Pria,Wanita', 'Biaya saldo kurang di ATM bersama dan ATM Prima (Rp 3.000)'),
(122, 45, 2, NULL, 'Pria,Wanita', 'Biaya transaksi kartu debit prima (Rp 4.000)'),
(123, 45, 2, NULL, 'Pria,Wanita', 'Biaya transaksi tarik tunai, cek saldo, transfer sesama bjb syariah di atm bjb syariah (gratis)'),
(124, 45, 2, NULL, 'Pria,Wanita', 'Biaya transaksi tunai di ATM Bersama dan ATM Prima (Rp 7.500,-)'),
(125, 45, 2, NULL, 'Pria,Wanita', 'Biaya transfer ke bank lain (Rp 6.500)'),
(126, 45, 2, NULL, 'Pria,Wanita', 'Biaya transfer per transaksi ke bank lain (Rp 6.500)'),
(127, 45, 2, NULL, 'Pria,Wanita', 'Cek Saldo'),
(128, 45, 2, NULL, 'Pria,Wanita', 'Debit Card'),
(129, 45, 2, NULL, 'Pria,Wanita', 'Informasi 5 transaksi terakhir'),
(130, 45, 2, NULL, 'Pria,Wanita', 'Jumlah maksimal transaksi dalam 1 hari (15 kali transaksi selama tidak melampaui batas transaksi harian'),
(131, 45, 2, NULL, 'Pria,Wanita', 'Jumlah maksimal transaksi kartu debit dalam 1 hari (Rp 10.000.000,-)'),
(132, 45, 2, NULL, 'Pria,Wanita', 'Jumlah minimal transaksi kartu debit dalam setiap transaksi (Rp 50.000,-)'),
(133, 45, 2, NULL, 'Pria,Wanita', 'Jumlah total transaksi dalam 1 hari (Rp 25.000.000,-)'),
(134, 45, 2, NULL, 'Pria,Wanita', 'Jumlah transaksi penarikan tunai maksimal dalam 1 hari (Rp 10.000.000,-)'),
(135, 45, 2, NULL, 'Pria,Wanita', 'Jumlah transaksi penarikan tunai maksimal untuk setiap transaksi (Rp 1.500.000,-)'),
(136, 45, 2, NULL, 'Pria,Wanita', 'Jumlah transfer maksimal dalam 1 hari (Rp 25.000.000,-)'),
(137, 45, 2, NULL, 'Pria,Wanita', 'Jumlah transfer maksimal dalam 1 kali transfer (Rp 10.000.000)'),
(138, 45, 2, NULL, 'Pria,Wanita', 'Karena ada nya permohonan nasabah / meninggal dunia'),
(139, 45, 2, NULL, 'Pria,Wanita', 'Karena saldo dibawah ketentuan minimal selama 3 bulan berturut-turut'),
(140, 45, 2, NULL, 'Pria,Wanita', 'Kartu Identitas yang masih berlaku'),
(141, 45, 2, NULL, 'Pria,Wanita', 'Mengisi formulir'),
(142, 45, 2, NULL, 'Pria,Wanita', 'Nisbah / Bagi hasil'),
(143, 45, 2, NULL, 'Pria,Wanita', 'Pembayaran'),
(144, 45, 2, NULL, 'Pria,Wanita', 'Pembayaran (tergantung mitra)'),
(145, 45, 2, NULL, 'Pria,Wanita', 'Pembelian'),
(146, 45, 2, NULL, 'Pria,Wanita', 'Penarikan Tunai'),
(147, 45, 2, NULL, 'Pria,Wanita', 'Rekening dikategorikan sebagai rekening pasif yang bersaldo dibawah ketentuan saldo minimum'),
(148, 45, 2, NULL, 'Pria,Wanita', 'Saldo minimum'),
(149, 45, 2, NULL, 'Pria,Wanita', 'Setoran awal (Rp 100.000,-)'),
(150, 45, 2, NULL, 'Pria,Wanita', 'Transfer'),
(151, 46, 2, NULL, ',Wanita', 'Aksesories maks 4 titik (bros, cincin, jam tangan & gelang)'),
(152, 46, 2, NULL, 'Pria,', 'Aksesoris maks 3 titik (Jam tangan, cincin, Jepit Dasi)'),
(153, 46, 2, NULL, ',Wanita', 'CS menggunakan jilbab rapi'),
(154, 46, 2, NULL, ',Wanita', 'CS terlihat rapi, bersih & tidak bau'),
(155, 46, 2, NULL, 'Pria,', 'CS terlihat rapi, bersih & tidak bau'),
(156, 46, 2, NULL, 'Pria,', 'Kumis terpotong rapi & tidak melebihi bibir'),
(157, 46, 2, NULL, ',Wanita', 'Memakai bedak (tampak segar & tidak berminyak)'),
(158, 46, 2, NULL, 'Pria,', 'Mengenakan dasi panjang, warna tidak mencolok serta motif tidak kekanak-kanakan (N/A jika waktu kunjungan dilakukan pada hari Jum’at'),
(159, 46, 2, NULL, ',Wanita', 'Mengenakan name tag (dipasang di dada kiri) dan terbaca dengan jelas'),
(160, 46, 2, NULL, 'Pria,', 'Mengenakan name tag (khusus dipasang di dada kiri) dan terbaca dengan jelas'),
(161, 46, 2, NULL, ',Wanita', 'Mengenakan seragam sesuai standar'),
(162, 46, 2, NULL, 'Pria,', 'Mengenakan seragam sesuai standar'),
(163, 46, 2, NULL, ',Wanita', 'Menggunakan make up (Lipstik, Eyeshadow, Blush On) yang tidak mencolok dan sesuai dengan standar'),
(164, 46, 2, NULL, 'Pria,', 'Rambut pendek tersisir rapi'),
(165, 46, 2, NULL, 'Pria,', 'Rambut tidak dicat'),
(166, 46, 2, NULL, ',Wanita', 'Seragam yang dikenakan bersih (tidak kumal/tidak bernoda)'),
(167, 46, 2, NULL, ',Wanita', 'Seragam yang dikenakan rapi'),
(168, 46, 2, NULL, 'Pria,', 'Tidak berjenggot/ berjenggot tetapi terlihat rapih'),
(169, 46, 2, NULL, 'Pria,', 'Wajah tampak segar, tidak berminyak & tidak berkeringat'),
(170, 47, 2, NULL, 'Pria,Wanita', 'CS dapat menjelaskan produk dan layanan bjb syariah dengan baik, benar dan menggunakan sales kit (Digital brosur), Tidak jika tidak menggunakan digital brosur'),
(171, 47, 2, NULL, 'Pria,Wanita', 'CS menggunakan rangkaian kata yang baik dan benar'),
(172, 47, 2, NULL, 'Pria,Wanita', 'CS menginformasikan menerangkan mengenai bjb syariah call (salam maslahah 1500727)'),
(173, 48, 2, NULL, 'Pria,Wanita', 'CS berdiri'),
(174, 48, 2, NULL, 'Pria,Wanita', 'CS Melakukan customer intimacy yang mengarah kepada CRM menyebutkan kalimat seperti hati-hati di jalan pada saat greeting akhir atau selamat melakukan aktifitas kembali atau silahkan datang kembali'),
(175, 48, 2, NULL, 'Pria,Wanita', 'CS menawarkan bantuan lain'),
(176, 48, 2, NULL, 'Pria,Wanita', 'CS mengucapkan asalamualaikum'),
(177, 48, 2, NULL, 'Pria,Wanita', 'CS mengucapkan terima kasih'),
(178, 48, 2, NULL, 'Pria,Wanita', 'CS Menyebutkan nama nasabah di akhir pelayanan'),
(179, 48, 2, NULL, 'Pria,Wanita', 'CS tersenyum ramah& tulus'),
(180, 49, 2, NULL, 'Pria,Wanita', 'CS fokus melayani nasabah (kontak mata)'),
(181, 49, 2, NULL, 'Pria,Wanita', 'CS mampu mendengarkan masalah yang diungkapkan nasabah dengan baik'),
(182, 49, 2, NULL, 'Pria,Wanita', 'CS menggali kebutuhan nasabah'),
(183, 49, 2, NULL, 'Pria,Wanita', 'CS mengkonfirmasi kebutuhan transaksi nasabah'),
(184, 49, 2, NULL, 'Pria,Wanita', 'CS menyebutkan nama nasabah'),
(185, 49, 2, NULL, 'Pria,Wanita', 'CS tidak melakukan aktifitas lain selain melayani nasabah saat ini'),
(186, 50, 2, NULL, 'Pria,Wanita', 'CS meminta izin foto kopi KTP untuk pendaftaran rekening'),
(187, 50, 2, NULL, 'Pria,Wanita', 'CS Konfirmasi kesesuaian produk/akad yang dipilih'),
(188, 50, 2, NULL, 'Pria,Wanita', 'CS Melakukan customer intimacy yang mengarah ke CRM (misal menanyakan kabar nasabah selama pelayanan atau menggali profil nasabah seperti menanyakan profesi nya apa, ataupun menanyakan anggota keluarga)'),
(189, 50, 2, NULL, 'Pria,Wanita', 'CS melakukan registrasi untuk nasabah terkait dengan mobile banking'),
(190, 50, 2, NULL, 'Pria,Wanita', 'CS membantu nasabah untuk mendownload aplikasi mobile banking. N/A Jika handphone nasabah tidak support atau tidak bawa'),
(191, 50, 2, NULL, 'Pria,Wanita', 'CS Memberikan formulir yang sudah ditandai sebelumnya'),
(192, 50, 2, NULL, 'Pria,Wanita', 'CS memberikan informasi mengenai spesifikasi kartu ATM (Instant atau reguler)'),
(193, 50, 2, NULL, 'Pria,Wanita', 'CS memberikan kartu ATM'),
(194, 50, 2, NULL, 'Pria,Wanita', 'CS meminta izin terlebih dahulu apabila untuk mengerjakan pekerjaan lainnya (mengangkat telepon atau melakukan komunikasi dengan karyawan lain terkait dengan pekerjaan).'),
(195, 50, 2, NULL, 'Pria,Wanita', 'CS Meminta nasabah memilih akad yang sesuai dengan kebutuhannya'),
(196, 50, 2, NULL, 'Pria,Wanita', 'CS memperhatikan kondisi nasabah saat pengisian formulir buka rekening'),
(197, 50, 2, NULL, 'Pria,Wanita', 'CS Menanyakan apakah nasabah sudah memiliki rekening sebelumnya di bank bjb syariah'),
(198, 50, 2, NULL, 'Pria,Wanita', 'CS Menanyakan Keperluan pembukaan rekening nasabah (untuk transaksional, investasi atau bisnis)'),
(199, 50, 2, NULL, 'Pria,Wanita', 'CS Menanyakan Rekening untuk keperluan pribadi atau perusahaan'),
(200, 50, 2, NULL, 'Pria,Wanita', 'CS Mengarahkan dalam mengisi formulir'),
(201, 50, 2, NULL, 'Pria,Wanita', 'CS Menggiring nasabah pada keputusan pemilihan produk'),
(202, 50, 2, NULL, 'Pria,Wanita', 'CS mengucapkan terima kasih atas kesediaanya untuk menunggu'),
(203, 50, 2, NULL, 'Pria,Wanita', 'CS menjelaskan AKAD yang dipilih sesuai dengan produk'),
(204, 50, 2, NULL, 'Pria,Wanita', 'CS menjelaskan pengisian form pembukaan rekening dengan lengkap merupakan persyaratan dari Bank Indonesia)'),
(205, 50, 2, NULL, 'Pria,Wanita', 'CS menyebutkan nama nasabah selama pelayanan (Minimal 3x) Tidak jika < dari 3x'),
(206, 50, 2, NULL, 'Pria,Wanita', 'Dalam mengarahkan pengisian formulir CS menggunakan standar menunjuk 3 jari'),
(207, 50, 2, NULL, 'Pria,Wanita', 'Proses admin dan pengisian formulir berjalan serempak'),
(208, 50, 2, NULL, 'Pria,Wanita', 'Skenario shopper : (Kosongkan isian di form buka rekening Mandatory KYC seperti sumber dana atau data penghasilan), apakah CS meminta nasabah untuk mengisinya'),
(209, 51, 2, NULL, 'Pria,Wanita', 'CS melakukan kontak mata dengan nasabah'),
(210, 51, 2, NULL, 'Pria,Wanita', 'CS Memperkenalkan diri'),
(211, 51, 2, NULL, 'Pria,Wanita', 'CS mempersilahkan nasabah duduk dengan telapak tangan terbuka'),
(212, 51, 2, NULL, 'Pria,Wanita', 'CS menangkupkan kedua tangan'),
(213, 51, 2, NULL, 'Pria,Wanita', 'CS Menanyakan nama nasabah'),
(214, 51, 2, NULL, 'Pria,Wanita', 'CS menawarkan bantuan dengan diakhiri penyebutan nama nasabah'),
(215, 51, 2, NULL, 'Pria,Wanita', 'CS menerima Anda dengan berdiri'),
(216, 51, 2, NULL, 'Pria,Wanita', 'CS mengucapkan Asalamualaikum'),
(217, 51, 2, NULL, 'Pria,Wanita', 'CS tersenyum tulus, ramah, dan sopan'),
(218, 51, 2, NULL, 'Pria,Wanita', 'Saat CS memperkenalkan diri apakah posisi tangan kanan berada di atas dada'),
(219, 16, 3, NULL, 'Pria,Wanita', 'Intonasi suara ramah'),
(220, 16, 3, NULL, 'Pria,Wanita', 'Memperkenalkan diri'),
(221, 16, 3, NULL, 'Pria,Wanita', 'Menanyakan nama nasabah/konsumen'),
(222, 16, 3, NULL, 'Pria,Wanita', 'Menawarkan bantuan'),
(223, 16, 3, NULL, 'Pria,Wanita', 'Mengucapkan salam Asalamualaikum(Wilujeng Enjing/Siang/Sonten)'),
(224, 16, 3, NULL, 'Pria,Wanita', 'Menyebut nama nasabah saat dilayani'),
(225, 16, 3, NULL, 'Pria,Wanita', 'Penerima telepon/petugas bebicara dengan jelas, ramah dan sopan'),
(226, 16, 3, NULL, 'Pria,Wanita', 'Penerima telepon/petugas menggunakan bahasa yang baik dan benar'),
(227, 16, 3, NULL, 'Pria,Wanita', 'Penerima telepon/petugas tidak mengobrol dengan orang lain ketika menerima telepon'),
(228, 16, 3, NULL, 'Pria,Wanita', 'Petugas mengucapkan nama jaringan kantor (bank bjb syariah KCP / Cabang)'),
(229, 17, 3, NULL, 'Pria,Wanita', 'Intonasi suara ramah'),
(230, 17, 3, NULL, 'Pria,Wanita', 'Memperkenalkan diri'),
(231, 17, 3, NULL, 'Pria,Wanita', 'Menanyakan nama nasabah/konsumen'),
(232, 17, 3, NULL, 'Pria,Wanita', 'Menawarkan bantuan'),
(233, 17, 3, NULL, 'Pria,Wanita', 'Mengucapkan bagian unit kerja (Customer Service )'),
(234, 17, 3, NULL, 'Pria,Wanita', 'Menyebutkan nama nasabah minimal 3x selama transaksi'),
(235, 18, 3, NULL, 'Pria,Wanita', 'Definisi produk investasi tersebut'),
(236, 18, 3, NULL, 'Pria,Wanita', 'Keuntungan investasi dalam bentuk produk tersebut'),
(237, 18, 3, NULL, 'Pria,Wanita', 'Menjelaskan pilihan jenis/jangka waktu produk investasi tersebut'),
(238, 18, 3, NULL, 'Pria,Wanita', 'Persyaratan investasi dalam produk tersebut'),
(239, 19, 3, NULL, 'Pria,Wanita', 'Apakah petugas tidak menutup gagang telepon terlebih dahulu'),
(240, 19, 3, NULL, 'Pria,Wanita', 'Menanyakan kejelasan materi yang dijelaskan'),
(241, 19, 3, NULL, 'Pria,Wanita', 'Menawarkan bantuan lain'),
(242, 19, 3, NULL, 'Pria,Wanita', 'Menegaskan bahwa produk yang dijelaskan sesuai dengan profil & kebutuhan Anda'),
(243, 19, 3, NULL, 'Pria,Wanita', 'Mengedukasi nasabah untuk selanjutnya apabila ingin mengetahui perihal produk lainnya bisa menghubungi call center kami salaMaslahah 1500727'),
(244, 19, 3, NULL, 'Pria,Wanita', 'Mengucapkan salam (Asalamualaikum)'),
(245, 19, 3, NULL, 'Pria,Wanita', 'Mengucapkan selamat beraktifitas kembali'),
(246, 19, 3, NULL, 'Pria,Wanita', 'Mengucapkan terima kasih telah menghubungi bank bjb syariah'),
(247, 20, 3, NULL, 'Pria,Wanita', 'Apakah petugas menggunakan nama nasabah selama percakapan'),
(248, 20, 3, NULL, 'Pria,Wanita', 'Apakah petugas menjelaskan secara spontan tentang produk yang ditanyakan'),
(249, 20, 3, NULL, 'Pria,Wanita', 'Apakah petugas berbicara dengan jelas dan tidak berbelit-belit'),
(250, 21, 3, NULL, 'Pria,Wanita', '1 kali langsung tersambung'),
(251, 21, 3, NULL, 'Pria,Wanita', '2 kali'),
(252, 21, 3, NULL, 'Pria,Wanita', '3 Kali'),
(253, 21, 3, NULL, 'Pria,Wanita', 'Lebih dari 3 kali'),
(254, 22, 3, NULL, 'Pria,Wanita', '3 Kali'),
(255, 22, 3, NULL, 'Pria,Wanita', '4 Kali'),
(256, 22, 3, NULL, 'Pria,Wanita', 'Kurang dari 3 Kali'),
(257, 22, 3, NULL, 'Pria,Wanita', 'Lebih dari 4 kali'),
(258, 54, 4, NULL, 'Pria,Wanita', 'Satpam berdiri dekat mesin ATM dengan mengawasi sekitar'),
(259, 54, 4, NULL, 'Pria,Wanita', 'Satpam berdiri di halaman/pos satpam terlihat mengawasi sekitar'),
(260, 54, 4, NULL, 'Pria,Wanita', 'Satpam sedang membukakan pintu/ menutup pintu mobil nasabah'),
(261, 54, 4, NULL, 'Pria,Wanita', 'Satpam sedang mengarahkan nasabah yang hendak parkir/ membantu nasabah keluar Parkir'),
(263, 55, 4, NULL, ',Wanita', 'Baju kemeja satpam lengan panjang berwarna putih dan memakai lap pundak'),
(264, 55, 4, NULL, 'Pria,', 'Baju kemeja satpam lengan pendek berwarna putih dan memakai lap pundak'),
(265, 55, 4, NULL, ',Wanita', 'Jilbab terlihat rapi dan dimasukan kedalam kerah baju'),
(266, 55, 4, NULL, ',Wanita', 'Memakai bedak (tampak segar & tidak berminyak)'),
(267, 55, 4, NULL, 'Pria,', 'Membawa borgol'),
(268, 55, 4, NULL, ',Wanita', 'Membawa borgol'),
(269, 55, 4, NULL, 'Pria,', 'Menggunakan badge satpam'),
(270, 55, 4, NULL, ',Wanita', 'Menggunakan badge satpam'),
(271, 55, 4, NULL, 'Pria,', 'Menggunakan celana panjang berwarna biru tua'),
(272, 55, 4, NULL, ',Wanita', 'Menggunakan celana panjang berwarna biru tua'),
(273, 55, 4, NULL, 'Pria,', 'Menggunakan dasi warna biru'),
(274, 55, 4, NULL, ',Wanita', 'Menggunakan dasi warna biru'),
(275, 55, 4, NULL, 'Pria,', 'Menggunakan ikat pinggang berlogo khusus satpam dan terlihat bersih mengkilap (Ceklist tidak jika kepala gesper tidak terlihat bersih dan mengkilap)'),
(276, 55, 4, NULL, ',Wanita', 'Menggunakan ikat pinggang berlogo khusus satpam dan terlihat bersih mengkilap (Ceklist tidak jika kepala gesper tidak terlihat bersih dan mengkilap)'),
(277, 55, 4, NULL, ',Wanita', 'Menggunakan make up (Lipstik, Eyeshadow, Blush On) yang tidak mencolok dan sesuai dengan standar'),
(278, 55, 4, NULL, 'Pria,', 'Menggunakan peluit'),
(279, 55, 4, NULL, ',Wanita', 'Menggunakan peluit'),
(280, 55, 4, NULL, 'Pria,', 'Menggunakan pentungan'),
(281, 55, 4, NULL, ',Wanita', 'Menggunakan pentungan'),
(282, 55, 4, NULL, 'Pria,', 'Menggunakan Talikur (tali peluit berwarna hitam)'),
(283, 55, 4, NULL, ',Wanita', 'Menggunakan Talikur (tali peluit berwarna hitam)'),
(284, 55, 4, NULL, 'Pria,', 'Rambut satpam terlihat rapih (tidak menutup telinga dan kerah)'),
(285, 55, 4, NULL, 'Pria,', 'Rambut satpam terlihat rapih (tidak menutup telinga dan kerah)'),
(286, 55, 4, NULL, ',Wanita', 'Satpam dengan seragam security normal (PDH Putih Biru)'),
(287, 55, 4, NULL, 'Pria,', 'Satpam menggunakan kaos dalam berwarna putih (Ceklist tidak jika terlihat menggunakan warna selain putih)'),
(288, 55, 4, NULL, 'Pria,', 'Satpam menggunakan kaos dalam berwarna putih (Ceklist tidak jika terlihat menggunakan warna selain putih)'),
(289, 55, 4, NULL, ',Wanita', 'Satpam menggunakan sepatu berwarna hitam, bersih dan mengkilap (Ceklist tidak, jika salah satu kriteria tidak terpenuhi)'),
(290, 55, 4, NULL, 'Pria,', 'Seragam yang digunakan satpam terlihat rapih dan bersih'),
(291, 55, 4, NULL, ',Wanita', 'Seragam yang digunakan satpam terlihat rapih dan bersih'),
(292, 55, 4, NULL, 'Pria,', 'Wajah terlihat cerah dan bersih (tidak berminyak)'),
(293, 56, 4, NULL, 'Pria,Wanita', 'Satpam berdiri'),
(294, 56, 4, NULL, 'Pria,Wanita', 'Satpam membukakan pintu'),
(295, 56, 4, NULL, 'Pria,Wanita', 'Satpam mengarahkan/memandu nasabah/Anda untuk mengisi form CSI (Customer Satisfaction Index)'),
(296, 56, 4, NULL, 'Pria,Wanita', 'Satpam mengucapkan asalamualaikum'),
(297, 56, 4, NULL, 'Pria,Wanita', 'Satpam mengucapkan terima kasih atas kunjungannya'),
(298, 56, 4, NULL, 'Pria,Wanita', 'Satpam tersenyum ramah & sopan'),
(299, 57, 4, NULL, 'Pria,Wanita', 'Satpam berdiri (terlihat sigap dan siap selama menjalankan tugas)'),
(300, 57, 4, NULL, 'Pria,Wanita', 'Satpam membukakan pintu'),
(301, 57, 4, NULL, 'Pria,Wanita', 'Satpam mengucapkan Asalamualaikum'),
(302, 57, 4, NULL, 'Pria,Wanita', 'Satpam mengucapkan Wilujeng sumping di bank bjb syariah'),
(303, 57, 4, NULL, 'Pria,Wanita', 'Satpam tersenyum ramah & sopan(Ketika berbicara kepada nasabah)'),
(304, 58, 4, NULL, 'Pria,Wanita', 'Apakah terdapat keberadaan satpam saat Anda/Nasabah keluar dari banking hall?'),
(305, 59, 4, NULL, 'Pria,Wanita', 'Gestur tubuh satpam terlihat tegap dan tegas'),
(306, 59, 4, NULL, 'Pria,Wanita', 'Satpam fokus (kontak mata dan tidak mengobrol dengan petugas/ karyawan bank mengenai pembahasan diluar pekerjaan)'),
(307, 59, 4, NULL, 'Pria,Wanita', 'Satpam mampu memberikan jawaban yang tepat kepada nasabah perihal informasi produk / transaksi secara spontan'),
(308, 59, 4, NULL, 'Pria,Wanita', 'Satpam menawarkan bantuan'),
(309, 59, 4, NULL, 'Pria,Wanita', 'Satpam mengarahkan nasabah untuk mengambil nomor antrian'),
(310, 59, 4, NULL, 'Pria,Wanita', 'Satpam tanggap(menawarkan bantuan jika nasabah terlihat bingung/ segera bertindak jika terdapat hal yang mencurigakan/mempersilahkan duduk untuk menunggu)'),
(317, 60, 5, NULL, 'Pria,Wanita', 'Teler melakukan pendekatan dengan nasabah (Customer Intimacy) seperti menyebutkan hati-hati di jalan pada saat greeting akhir atau selamat melakukan aktifitas kembali atau silahkan datang kembali'),
(318, 60, 5, NULL, 'Pria,Wanita', 'Teller berdiri'),
(319, 60, 5, NULL, 'Pria,Wanita', 'Teller menawarkan bantuan lain'),
(320, 60, 5, NULL, 'Pria,Wanita', 'Teller mengucapkan asalamualaikum'),
(321, 60, 5, NULL, 'Pria,Wanita', 'Teller mengucapkan terima kasih'),
(322, 60, 5, NULL, 'Pria,Wanita', 'Teller Menyebutkan nama nasabah'),
(323, 60, 5, NULL, 'Pria,Wanita', 'Teller tersenyum ramah dan tulus'),
(324, 61, 5, NULL, 'Pria,Wanita', 'Teller berdiri'),
(325, 61, 5, NULL, 'Pria,Wanita', 'Teller memperkenalkan diri'),
(326, 61, 5, NULL, 'Pria,Wanita', 'Teller menawarkan bantuan'),
(327, 61, 5, NULL, 'Pria,Wanita', 'Teller mengucapkan asalamualaikum'),
(328, 61, 5, NULL, 'Pria,Wanita', 'Teller tersenyum ramah& tulus'),
(329, 62, 5, NULL, ',Wanita', 'Aksesories maks 4 titik (bros, cincin, jam tangan & gelang)'),
(330, 62, 5, NULL, 'Pria,', 'Aksesoris maks 3 titik (Jam tangan, cincin, Jepit Dasi)'),
(331, 62, 5, NULL, 'Pria,', 'Kumis terpotong rapi & tidak melebihi bibir'),
(332, 62, 5, NULL, ',Wanita', 'Memakai bedak (tampak segar & tidak berminyak)'),
(333, 62, 5, NULL, 'Pria,', 'Mengenakan dasi panjang, warna tidak mencolok serta motif tidak kekanak-kanakan (N/A jika waktu kunjungan dilakukan pada hari Jum’at'),
(334, 62, 5, NULL, ',Wanita', 'Mengenakan name tag (dipasang di dada kiri) dan terbaca dengan jelas'),
(335, 62, 5, NULL, 'Pria,', 'Mengenakan name tag (khusus dipasang di dada kiri) dan terbaca dengan jelas'),
(336, 62, 5, NULL, ',Wanita', 'Mengenakan seragam sesuai standar'),
(337, 62, 5, NULL, 'Pria,', 'Mengenakan seragam sesuai standar'),
(338, 62, 5, NULL, ',Wanita', 'Menggunakan make up (Lipstik, Eyeshadow, Blush On) yang tidak mencolok dan sesuai dengan standar'),
(339, 62, 5, NULL, 'Pria,', 'Rambut pendek tersisir rapi'),
(340, 62, 5, NULL, 'Pria,', 'Rambut tidak dicat'),
(341, 62, 5, NULL, ',Wanita', 'Seragam yang dikenakan bersih (tidak kumal/tidak bernoda)'),
(342, 62, 5, NULL, ',Wanita', 'Seragam yang dikenakan rapi'),
(343, 62, 5, NULL, ',Wanita', 'Teller menggunakan jilbab rapi'),
(344, 62, 5, NULL, ',Wanita', 'Teller terlihat rapi, bersih & tidak bau'),
(345, 62, 5, NULL, 'Pria,', 'Teller terlihat rapi, bersih & tidak bau'),
(346, 62, 5, NULL, 'Pria,', 'Tidak berjenggot/ berjenggot tetapi terlihat rapih'),
(347, 62, 5, NULL, 'Pria,', 'Wajah tampak segar, tidak berminyak & tidak berkeringat'),
(348, 63, 5, NULL, 'Pria,Wanita', 'Teller Fokus (kontak mata & tidak mengobrol dengan orang lain)'),
(349, 63, 5, NULL, 'Pria,Wanita', 'Teller konfirmasi kebutuhan transaksi nasabah'),
(350, 63, 5, NULL, 'Pria,Wanita', 'Teller melakukan konfirmasi nama, rekening, dan jumlah'),
(351, 63, 5, NULL, 'Pria,Wanita', 'Teller memeriksa slip transaksi dengan teliti (salahkan salah satu isian form misal terbilang, nominal atau tanggal)'),
(352, 63, 5, NULL, 'Pria,Wanita', 'Teller meminta izin untuk memproses transaksi'),
(353, 63, 5, NULL, 'Pria,Wanita', 'Teller meminta izin untuk menghitung uang nasabah'),
(354, 63, 5, NULL, 'Pria,Wanita', 'Teller mengajak untuk memperhatikan proses penghitungan uang'),
(355, 63, 5, NULL, 'Pria,Wanita', 'Teller mengecek keaslian uang dengan UV (ultra violet)'),
(356, 63, 5, NULL, 'Pria,Wanita', 'Teller menghitung uang dengan cekatan'),
(357, 63, 5, NULL, 'Pria,Wanita', 'Teller menghitung uang dengan teliti'),
(358, 63, 5, NULL, 'Pria,Wanita', 'Teller mengkonfirmasi jumlah transaksi'),
(359, 63, 5, NULL, 'Pria,Wanita', 'Teller mengkonfirmasi jumlah uang yang diterima'),
(360, 63, 5, NULL, 'Pria,Wanita', 'Teller mengucapkan terima kasih telah menunggu'),
(361, 63, 5, NULL, 'Pria,Wanita', 'Teller menunjukan hasil validasi kepada nasabah'),
(362, 63, 5, NULL, 'Pria,Wanita', 'Teller menyebutkan nama nasabah'),
(363, 64, 5, NULL, 'Pria,Wanita', 'Bersih'),
(364, 64, 5, NULL, 'Pria,Wanita', 'Rapi (dokumen & alat tulis tertata rapi)'),
(365, 64, 5, NULL, 'Pria,Wanita', 'Terdapat permen'),
(366, 64, 5, NULL, 'Pria,Wanita', 'Tidak ada barang yang tidak semestinya (Tidak terlihat barang pribadi, alat makan/minum, foto pribadi boneka & hiasan)'),
(367, 26, NULL, 1, NULL, 'Dinding terlihat bersih secara keseluruhan'),
(368, 26, NULL, 1, NULL, 'Tidak ada kotoran /coretan/cat terkelupas'),
(369, 26, NULL, 1, NULL, 'Warna dinding terlihat cerah'),
(370, 65, NULL, 1, NULL, 'Terlihat bersih dan mengkilap'),
(371, 65, NULL, 1, NULL, 'Tidak ada bekas kotoran yang menempel'),
(372, 65, NULL, 1, NULL, 'Tidak ada goresan pada kaca akibat benda tumpul/benda tajam'),
(373, 66, NULL, 1, NULL, 'Lantai Terlihat bersih mengkilap'),
(374, 66, NULL, 1, NULL, 'Lantai tidak berdebu'),
(375, 66, NULL, 1, NULL, 'Tidak ada kotoran/kertas/sampah yang berserakan'),
(376, 67, NULL, 1, NULL, 'Mesin ATM berfungsi/dapat bertransaksi'),
(377, 67, NULL, 1, NULL, 'Mesin ATM bersih (tidak berdebu, tidak bernoda)'),
(378, 67, NULL, 1, NULL, 'Tanda-tanda pada mesin ATM (huruf pada tombol-tombol) dalam kondisi baik'),
(379, 67, NULL, 1, NULL, 'Terdapat informasi jaringan (mis. ATM bersama, ATM Prima)'),
(380, 67, NULL, 1, NULL, 'Terdapat informasi pecahan uang'),
(381, 67, NULL, 1, NULL, 'Tersedia bukti transaksi'),
(382, 68, NULL, 1, NULL, 'Fungsi lampu bekerja dengan baik (Tidak ada lampu yang rusak)'),
(383, 68, NULL, 1, NULL, 'Pencahayaan banking hall sangat baik (tidak terlalu terang ataupun tidak terlalu gelap)'),
(384, 69, NULL, 1, NULL, 'Terdapat media promosi/pengumuman dengan menggunakan media akrilik'),
(385, 69, NULL, 1, NULL, 'Terdapat pewangi ruangan'),
(386, 70, NULL, 1, NULL, 'Cat tidak terkelupas'),
(387, 70, NULL, 1, NULL, 'Secara keseluruhan plafond terlihat bersih'),
(388, 70, NULL, 1, NULL, 'Tidak ada debu yang menempel pada plafond'),
(389, 70, NULL, 1, NULL, 'Tidak ada sarang laba-laba yang menempel pada plafond'),
(390, 71, NULL, 1, NULL, 'Tempat sampah terlihat bersih'),
(391, 71, NULL, 1, NULL, 'Tempat sampah tidak berbau'),
(392, 71, NULL, 1, NULL, 'Tempat sampah tidak penuh'),
(393, 71, NULL, 1, NULL, 'Tempat sampah tidak rusak'),
(394, 72, NULL, 1, NULL, 'Suhu ruangan terasa sejuk (AC berfungsi dengan baik)'),
(395, 72, NULL, 1, NULL, 'Udara terasa bersih tidak ada debu di sekitar ruangan'),
(396, 73, NULL, 1, NULL, 'Apakah terdapat keberadaan mesin ATM Bank bjb di sekitar Bank bjb syariah?'),
(397, 74, NULL, 1, NULL, 'Apakah terdapat keberadaan tempat sampah stainles (bukan tempat sampah plastik) di ruangan ATM?'),
(398, 75, NULL, 1, NULL, 'Apakah lampu-lampu di ruang ATM berfungsi dengan baik?'),
(402, 10, 3, NULL, 'Pria,Wanita', 'Berapa kalikah telepon dapat tersambung ke cabang ?'),
(403, 10, 3, NULL, 'Pria,Wanita', 'Setelah tersambung berapa kali nada tunggu baru telepon diangkat ?'),
(404, 10, 3, NULL, 'Pria,Wanita', 'Disambungkan kepada petugas bank lainnya, berapa jumlah transfer telepon sampai kepada petugas yang dituju'),
(405, 76, 2, NULL, 'Pria,Wanita', 'Durasi waktu dalam melayani pembukaan rekening ?'),
(406, 77, 4, NULL, 'Pria,Wanita', 'Waktu antrian sampai dilayani oleh Teller');

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
  `id_daftar_laporan` int(11) UNSIGNED NOT NULL,
  `index_nilai` decimal(10,0) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_kcp`
--

INSERT INTO `report_kcp` (`id`, `id_kcp`, `id_daftar_laporan`, `index_nilai`, `user_id`) VALUES
(1, 1, 4, '91', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id_staff` int(11) UNSIGNED NOT NULL,
  `id_kcp` int(11) UNSIGNED DEFAULT NULL,
  `id_posisi` int(11) UNSIGNED DEFAULT NULL,
  `nama_staff` varchar(100) DEFAULT NULL,
  `gender` enum('Pria','Wanita') DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `id_kcp`, `id_posisi`, `nama_staff`, `gender`, `foto`) VALUES
(1, 1, 3, 'Jamal Apriadi', 'Pria', NULL),
(2, 1, 2, 'Tri Raharjo', 'Pria', 'mcoa_kategori_wher_jeniskategori.png'),
(3, 1, 4, 'Eko Kurniawan', 'Pria', '09.jpg'),
(6, 1, 4, 'Nazar Zulmi', 'Pria', NULL);

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
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1476808067, 1, 'Admin', 'istrator', 'ADMIN', '0');

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
  ADD KEY `id_paramater` (`id_parameter`);

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_daftar_laporan` (`id_daftar_laporan`),
  ADD KEY `id_staff_2` (`id_staff`),
  ADD KEY `id_staff_3` (`id_staff`);

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
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_fisik` (`id_fisik`),
  ADD KEY `id_posisi_2` (`id_posisi`);

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_daftar_laporan` (`id_daftar_laporan`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`),
  ADD KEY `id_kcp` (`id_kcp`),
  ADD KEY `id_posisi` (`id_posisi`);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `detail_laporan`
--
ALTER TABLE `detail_laporan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_parameter`
--
ALTER TABLE `detail_parameter`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `file_report_kcp`
--
ALTER TABLE `file_report_kcp`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `fisik`
--
ALTER TABLE `fisik`
  MODIFY `id_fisik` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `fisik_kcp`
--
ALTER TABLE `fisik_kcp`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `id_kanwil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `kcp`
--
ALTER TABLE `kcp`
  MODIFY `id_kcp` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `laporan_staff_or_fisik`
--
ALTER TABLE `laporan_staff_or_fisik`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mcoa_kategori`
--
ALTER TABLE `mcoa_kategori`
  MODIFY `id_kategori` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `id_parameter` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=407;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  ADD CONSTRAINT `parameter_ibfk_11` FOREIGN KEY (`id_parameter`) REFERENCES `parameter` (`id_parameter`);

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
  ADD CONSTRAINT `f_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fas` FOREIGN KEY (`id_daftar_laporan`) REFERENCES `daftar_laporan` (`id`),
  ADD CONSTRAINT `ss_staff` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`);

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
  ADD CONSTRAINT `id_f` FOREIGN KEY (`id_fisik`) REFERENCES `fisik` (`id_fisik`),
  ADD CONSTRAINT `id_kat` FOREIGN KEY (`id_kategori`) REFERENCES `mcoa_kategori` (`id_kategori`),
  ADD CONSTRAINT `id_p` FOREIGN KEY (`id_posisi`) REFERENCES `posisi` (`id_posisi`);

--
-- Constraints for table `report_kcp`
--
ALTER TABLE `report_kcp`
  ADD CONSTRAINT `asd` FOREIGN KEY (`id_daftar_laporan`) REFERENCES `daftar_laporan` (`id`),
  ADD CONSTRAINT `fkckp` FOREIGN KEY (`id_kcp`) REFERENCES `kcp` (`id_kcp`),
  ADD CONSTRAINT `fkckpsd` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `kcpstaff` FOREIGN KEY (`id_kcp`) REFERENCES `kcp` (`id_kcp`),
  ADD CONSTRAINT `posisikcpStaff` FOREIGN KEY (`id_posisi`) REFERENCES `posisi` (`id_posisi`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
