-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2018 at 07:54 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asis`
--

-- --------------------------------------------------------

--
-- Table structure for table `sis_akun`
--

CREATE TABLE `sis_akun` (
  `id_akun` varchar(8) NOT NULL,
  `nama_akun` varchar(190) DEFAULT NULL,
  `jenis_akun` varchar(10) DEFAULT NULL,
  `status` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sis_akun`
--

INSERT INTO `sis_akun` (`id_akun`, `nama_akun`, `jenis_akun`, `status`) VALUES
('101', 'Kas', 'Aset', 1),
('201', 'Tanah', 'Aset', 1),
('210', 'Gedung', 'Aset', 1),
('400', 'Utang Usaha', 'Kewajiban', 1),
('450 ', 'Utang Pajak', 'Kewajiban', 1),
('600', 'Modal', 'Modal', 1),
('700', 'Pendapatan', 'Pendapatan', 1),
('800', 'Beban Gaji', 'Beban', 1),
('802', 'Beban Listrik', 'Beban', 1),
('803', 'Beban Telepon', 'Beban', 1),
('805', 'Beban Lain-Lain', 'Beban', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sis_alokasiguru`
--

CREATE TABLE `sis_alokasiguru` (
  `id` int(11) NOT NULL,
  `kode_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_alokasimapel`
--

CREATE TABLE `sis_alokasimapel` (
  `id` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_anggota`
--

CREATE TABLE `sis_anggota` (
  `id_anggota` varchar(10) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_buku`
--

CREATE TABLE `sis_buku` (
  `id_buku` varchar(50) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `jml_buku` int(11) NOT NULL,
  `status` enum('AKTIF','NONAKTIF') NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_daftar`
--

CREATE TABLE `sis_daftar` (
  `id_daftar` int(11) NOT NULL,
  `no_reg` varchar(100) NOT NULL,
  `id_angkatan` int(11) DEFAULT NULL,
  `id_jenjang` int(11) DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jekel` enum('L','P') DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `alamat_tinggal` text,
  `wn` varchar(255) DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `sdr_kandung` int(11) DEFAULT NULL,
  `sdr_angkat` int(11) DEFAULT NULL,
  `alamat_domisili` text,
  `telepon` varchar(255) DEFAULT NULL,
  `tinggal_dengan` varchar(255) DEFAULT NULL,
  `gol_darah` varchar(5) DEFAULT NULL,
  `penyakit` varchar(255) DEFAULT NULL,
  `tinggi` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `foto` text,
  `ayah` varchar(100) NOT NULL,
  `ibu` varchar(100) NOT NULL,
  `wali` varchar(100) NOT NULL,
  `alamat_orangtua` text NOT NULL,
  `alamat_wali` text NOT NULL,
  `pendapatan` varchar(100) NOT NULL,
  `diterima` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sis_daftar`
--

INSERT INTO `sis_daftar` (`id_daftar`, `no_reg`, `id_angkatan`, `id_jenjang`, `tgl_daftar`, `nisn`, `nama`, `jekel`, `tempat_lahir`, `tgl_lahir`, `agama`, `alamat_tinggal`, `wn`, `anak_ke`, `sdr_kandung`, `sdr_angkat`, `alamat_domisili`, `telepon`, `tinggal_dengan`, `gol_darah`, `penyakit`, `tinggi`, `berat`, `foto`, `ayah`, `ibu`, `wali`, `alamat_orangtua`, `alamat_wali`, `pendapatan`, `diterima`) VALUES
(1, '0110180001', 1, 1, '2018-10-01', '', 'Andi Firmansyah', 'L', 'Kudus', '1996-08-16', '', '', 'WNI', 1, 0, 0, '', '', NULL, '', '', 0, 0, '', '', '', '', '', '', '', 'C'),
(2, '0110180002', 1, 1, '2018-10-01', '', 'Mail', 'L', 'Kudus', '2000-12-29', '', '', 'WNI', 1, 0, 0, '', '', NULL, '', '', 0, 0, '', '', '', '', '', '', '', 'C'),
(5, '2510180001', 1, 1, '2018-10-25', '', 'Andir', 'L', 'a', '2000-09-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', 'C'),
(6, '2510180001', 1, 1, '2018-10-25', '', 'Indra', 'P', 's', '2000-09-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `sis_denda`
--

CREATE TABLE `sis_denda` (
  `id_denda` int(11) NOT NULL,
  `denda` int(11) DEFAULT NULL,
  `max` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sis_denda`
--

INSERT INTO `sis_denda` (`id_denda`, `denda`, `max`) VALUES
(1, 1000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sis_detailbuku`
--

CREATE TABLE `sis_detailbuku` (
  `id_detailbuku` varchar(50) NOT NULL,
  `id_buku` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `ava` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_detail_angsur`
--

CREATE TABLE `sis_detail_angsur` (
  `id` int(11) NOT NULL,
  `id_angsur` int(11) DEFAULT NULL,
  `id_tf` varchar(20) DEFAULT NULL,
  `cicilan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_det_peminjaman`
--

CREATE TABLE `sis_det_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `no_peminjaman` varchar(100) NOT NULL,
  `id_detailbuku` varchar(20) NOT NULL,
  `denda` int(11) NOT NULL,
  `status` enum('PROSES','SELESAI') NOT NULL DEFAULT 'PROSES'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_guru`
--

CREATE TABLE `sis_guru` (
  `kode_guru` int(11) NOT NULL,
  `nip` varchar(10) DEFAULT NULL,
  `nama_guru` varchar(50) DEFAULT NULL,
  `jekel` enum('L','P') DEFAULT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `alamat` text,
  `status` enum('AKTIF','NONAKTIF') DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_isipaket`
--

CREATE TABLE `sis_isipaket` (
  `id_isi` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `nama_isi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sis_isipaket`
--

INSERT INTO `sis_isipaket` (`id_isi`, `id_paket`, `nama_isi`) VALUES
(1, 1, 'Kelas 1'),
(2, 1, 'Kelas 2'),
(3, 1, 'Kelas 3'),
(4, 1, 'Kelas 4'),
(5, 1, 'Kelas 5'),
(6, 1, 'Kelas 6'),
(7, 2, 'Kelas VII'),
(8, 2, 'Kelas VIII'),
(9, 2, 'Kelas IX'),
(10, 3, 'Kelas X'),
(11, 3, 'Kelas XI'),
(12, 3, 'Kelas XII'),
(13, 4, 'Kelas X'),
(14, 4, 'Kelas XI'),
(15, 4, 'Kelas XII');

-- --------------------------------------------------------

--
-- Table structure for table `sis_jenisbayar`
--

CREATE TABLE `sis_jenisbayar` (
  `id` int(11) NOT NULL,
  `kode_jenis` varchar(3) DEFAULT NULL,
  `nama_jenis` varchar(25) DEFAULT NULL,
  `tipe_jenis` int(1) DEFAULT NULL,
  `ket` text,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_jenismapel`
--

CREATE TABLE `sis_jenismapel` (
  `id_jenismapel` int(11) NOT NULL,
  `nama_jenismapel` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('AKTIF','NONAKTIF') NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_jenis_transaksi`
--

CREATE TABLE `sis_jenis_transaksi` (
  `id` varchar(20) NOT NULL,
  `nm_jenis_trans` varchar(200) NOT NULL,
  `rencana_anggaran` varchar(5) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `jenis_trans` enum('m','k') NOT NULL,
  `nominal` bigint(100) NOT NULL,
  `debit` varchar(10) NOT NULL,
  `kredit` varchar(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_jenjang`
--

CREATE TABLE `sis_jenjang` (
  `id_jenjang` int(11) NOT NULL,
  `kd_jenjang` varchar(50) NOT NULL,
  `nama_jenjang` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `paket` varchar(2) NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_jurnal`
--

CREATE TABLE `sis_jurnal` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(15) DEFAULT NULL,
  `akun` varchar(10) DEFAULT NULL,
  `debet` bigint(100) DEFAULT NULL,
  `kredit` bigint(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_kategoribuku`
--

CREATE TABLE `sis_kategoribuku` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_kelas`
--

CREATE TABLE `sis_kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_jenjang` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('AKTIF','NONAKTIF','','') NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sis_kelas`
--

INSERT INTO `sis_kelas` (`id_kelas`, `id_jenjang`, `nama_kelas`, `keterangan`, `status`) VALUES
(1, 1, 'Kelas 1', '', 'AKTIF'),
(2, 1, 'Kelas 2', '', 'AKTIF'),
(3, 1, 'Kelas 3', '', 'AKTIF'),
(4, 1, 'Kelas 4', '', 'AKTIF'),
(5, 1, 'Kelas 5', '', 'AKTIF'),
(6, 1, 'Kelas 6', '', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `sis_level`
--

CREATE TABLE `sis_level` (
  `id_akses` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_lulus`
--

CREATE TABLE `sis_lulus` (
  `id_daftar` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `tgl_lulus` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_mapel`
--

CREATE TABLE `sis_mapel` (
  `id_mapel` int(11) NOT NULL,
  `id_jenismapel` int(11) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('AKTIF','NONAKTIF') NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_modul`
--

CREATE TABLE `sis_modul` (
  `id_modul` int(11) NOT NULL,
  `nama_modul` varchar(30) NOT NULL,
  `nama_span` varchar(50) NOT NULL,
  `glyphicon` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `ktg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sis_modul`
--

INSERT INTO `sis_modul` (`id_modul`, `nama_modul`, `nama_span`, `glyphicon`, `url`, `ktg`) VALUES
(1, 'tahunajaran', 'Tahun Ajaran', 'fa fa-calendar-check-o', 'tahunajaran', 17),
(2, 'jenjang', 'Jenjang', 'fa fa-th-large', 'jenjang', 17),
(3, 'kelas', 'Kelas', 'fa fa-object-group', 'kelas', 17),
(4, 'rombel', 'Rombongan Belajar', 'fa fa-object-ungroup', 'rombel', 17),
(5, 'jenismapel', 'Jenis Mata Pelajaran', 'fa fa-file-text', 'jenismapel', 17),
(6, 'mapel', 'Mata Pelajaran', 'fa fa-file-text', 'mapel', 17),
(7, 'guru', 'Guru', 'fa fa-group', 'guru', 17),
(8, 'daftar', 'Pendaftaran Siswa', 'fa fa-indent', 'daftar', 17),
(9, 'pembagian', 'Pembagian Kelas', 'glyphicon glyphicon-indent-left', 'pembagian', 17),
(10, 'siswa', 'Siswa', 'fa fa-users', 'siswa', 17),
(11, 'rakbuku', 'Data Rak Buku', 'glyphicon glyphicon-th', 'rakbuku', 18),
(12, 'kategoribuku', 'Data Kategori', 'fa fa-bars', 'kategoribuku', 18),
(13, 'buku', 'Data Buku', 'fa fa-book', 'buku', 18),
(14, 'anggota', 'Data Anggota', 'fa fa-group', 'anggota', 18),
(15, 'peminjaman', 'Peminjaman', 'fa fa-share', 'peminjaman', 18),
(16, 'pengembalian', 'Pengembalian', 'fa fa-reply', 'pengembalian', 18),
(17, 'akademik', 'Akademik', 'glyphicon glyphicon-education', '#', 0),
(18, 'perpustakaan', 'Perpustakaan', 'glyphicon glyphicon-book', '#', 0),
(19, 'nilai', 'Nilai Siswa', 'glyphicon glyphicon-list-alt', '#', 0),
(20, 'inputnilai', 'Input Nilai', 'glyphicon glyphicon-plus-sign', 'nilai', 19),
(21, 'datanilai', 'Data Nilai', 'glyphicon glyphicon-floppy-disk', 'datanilai', 19),
(22, 'cetaknilai', 'Cetak Raport', 'glyphicon glyphicon-print\r\n', 'cetaknilai', 19),
(23, 'keuangan', 'Keuangan', 'fa fa-dollar', '#', 0),
(25, 'mutasi', 'Mutasi Siswa', 'fa fa-random', 'mutasi', 17),
(26, 'rencana', 'Rencana Anggaran', 'glyphicon glyphicon-tasks', 'rencana', 23),
(27, 'akun', 'Akun', 'glyphicon glyphicon-asterisk', 'akun', 23),
(28, 'inputdana', 'Input Dana Masuk / Keluar', 'glyphicon glyphicon-arrow-right', 'inputdana', 23),
(29, 'jurnal', 'Entri Jurnal', 'glyphicon glyphicon-import', 'jurnal', 23),
(32, 'lapjurnal', 'Laporan Jurnal', 'glyphicon glyphicon-book', 'lapjurnal', 23),
(33, 'lapbukubesar', 'Laporan Buku Besar', 'glyphicon glyphicon-book', 'lapbukubesar', 23),
(34, 'lapneraca', 'Laporan Neraca Lajur', 'glyphicon glyphicon-book', 'lapneraca', 23),
(35, 'laperpus', 'Laporan', 'glyphicon glyphicon-book', 'laperpus', 18),
(36, 'pembayaran', 'Pembayaran', 'glyphicon glyphicon-briefcase', '#', 0),
(37, 'jenisbayar', 'Jenis Pembayaran', 'glyphicon glyphicon-tasks', 'jenisbayar', 36),
(38, 'pilihbayar', 'Pilihan Pembayaran', 'glyphicon glyphicon-option-vertical', 'pilihbayar', 36),
(39, 'setbayar', 'Set Pembayaran', 'glyphicon glyphicon-cog', 'setbayar', 36),
(40, 'inputbayar', 'Input Pembayaran', 'glyphicon glyphicon-log-in', 'inputbayar', 36),
(41, 'tabungan', 'Tabungan', 'glyphicon glyphicon-credit-card', 'tabungan', 36),
(42, 'lapbayar', 'Laporan Pembayaran', 'glyphicon glyphicon-file', 'lapbayar', 36);

-- --------------------------------------------------------

--
-- Table structure for table `sis_nilai`
--

CREATE TABLE `sis_nilai` (
  `id` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_angkatan` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `nuh1` int(11) NOT NULL,
  `nuh2` int(11) NOT NULL,
  `nuh3` int(11) NOT NULL,
  `nt1` int(11) NOT NULL,
  `nt2` int(11) NOT NULL,
  `nt3` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `rnuh` int(11) NOT NULL,
  `rnt` int(11) NOT NULL,
  `nh` int(11) NOT NULL,
  `nar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_paketjenjang`
--

CREATE TABLE `sis_paketjenjang` (
  `id_paket` int(11) NOT NULL,
  `kode_paket` varchar(10) NOT NULL,
  `nama_paket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sis_paketjenjang`
--

INSERT INTO `sis_paketjenjang` (`id_paket`, `kode_paket`, `nama_paket`) VALUES
(1, 'SD', 'Sekolah Dasar'),
(2, 'SMP', 'Sekolah Menengah Pertama'),
(3, 'SMA', 'Sekolah Menengah Atas'),
(4, 'SMK', 'Sekolah Menengah Kejuruan');

-- --------------------------------------------------------

--
-- Table structure for table `sis_pembayaran`
--

CREATE TABLE `sis_pembayaran` (
  `id` int(11) NOT NULL,
  `id_tf` varchar(20) DEFAULT NULL,
  `date` date NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_ta` int(11) DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `ket` text,
  `cek_p` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_peminjaman`
--

CREATE TABLE `sis_peminjaman` (
  `no_peminjaman` varchar(100) NOT NULL,
  `id_anggota` varchar(10) NOT NULL,
  `datestamp` date NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` enum('PROSES','SELESAI') NOT NULL DEFAULT 'PROSES'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_pilihanbayar`
--

CREATE TABLE `sis_pilihanbayar` (
  `id` int(11) NOT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_ta` int(11) DEFAULT NULL,
  `nama_pilihan` varchar(50) DEFAULT NULL,
  `opsi_a` int(11) DEFAULT NULL,
  `opsi_b` int(11) DEFAULT NULL,
  `opsi_c` int(11) DEFAULT NULL,
  `opsi_d` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `save` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_pindah`
--

CREATE TABLE `sis_pindah` (
  `id_daftar` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `nm_sekolah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_pmb_angsur`
--

CREATE TABLE `sis_pmb_angsur` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_ta` int(11) DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `tagihan` int(11) DEFAULT NULL,
  `sisa` int(11) DEFAULT NULL,
  `tipe` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_pmb_rutin`
--

CREATE TABLE `sis_pmb_rutin` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_ta` int(11) DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `tagihan` int(11) DEFAULT NULL,
  `Jul` varchar(20) DEFAULT NULL,
  `Agt` varchar(20) DEFAULT NULL,
  `Sep` varchar(20) DEFAULT NULL,
  `Okt` varchar(20) DEFAULT NULL,
  `Nov` varchar(20) DEFAULT NULL,
  `Des` varchar(20) DEFAULT NULL,
  `Jan` varchar(20) DEFAULT NULL,
  `Feb` varchar(20) DEFAULT NULL,
  `Mar` varchar(20) DEFAULT NULL,
  `Apr` varchar(20) DEFAULT NULL,
  `Mei` varchar(20) DEFAULT NULL,
  `Jun` varchar(20) DEFAULT NULL,
  `tipe` int(11) DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_privilage`
--

CREATE TABLE `sis_privilage` (
  `id` int(11) NOT NULL,
  `id_akses` varchar(50) NOT NULL,
  `id_modul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_rakbuku`
--

CREATE TABLE `sis_rakbuku` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_reg_user`
--

CREATE TABLE `sis_reg_user` (
  `id_reg` varchar(100) NOT NULL,
  `date_reg` date NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `sis_rencana_anggaran`
--

CREATE TABLE `sis_rencana_anggaran` (
  `id` int(5) NOT NULL,
  `nm_anggaran` varchar(150) NOT NULL,
  `awal_periode` date NOT NULL,
  `akhir_periode` date NOT NULL,
  `pencatat` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `tetapkan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_rombel`
--

CREATE TABLE `sis_rombel` (
  `id_rombel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_rombel` varchar(100) NOT NULL,
  `kuota` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `status` enum('AKTIF','NONAKTIF','','') NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_siswa`
--

CREATE TABLE `sis_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `id_rombel` int(11) NOT NULL,
  `saldo_tabungan` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_tabungandetail`
--

CREATE TABLE `sis_tabungandetail` (
  `id` int(11) NOT NULL,
  `id_tf` varchar(20) DEFAULT NULL,
  `date` date NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_ta` int(11) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `kredit` int(11) DEFAULT NULL,
  `saldo_r` int(11) DEFAULT NULL,
  `ket` text,
  `cek_p` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_tagihan`
--

CREATE TABLE `sis_tagihan` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nm_tagihan` varchar(50) NOT NULL,
  `tagihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_tahunajaran`
--

CREATE TABLE `sis_tahunajaran` (
  `id_angkatan` int(11) NOT NULL,
  `kd_angkatan` varchar(15) NOT NULL,
  `nama_angkatan` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_a` date NOT NULL,
  `tgl_b` date NOT NULL,
  `aktif` int(11) NOT NULL,
  `status` enum('AKTIF','NONAKTIF') NOT NULL DEFAULT 'AKTIF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sis_transaksi`
--

CREATE TABLE `sis_transaksi` (
  `id` varchar(15) NOT NULL,
  `waktu` datetime DEFAULT NULL,
  `id_jenis_transaksi` varchar(15) DEFAULT NULL,
  `idr` int(11) NOT NULL,
  `pencatat` varchar(20) DEFAULT NULL,
  `uraian` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sis_akun`
--
ALTER TABLE `sis_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `sis_alokasiguru`
--
ALTER TABLE `sis_alokasiguru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sis_alokasimapel`
--
ALTER TABLE `sis_alokasimapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `sis_anggota`
--
ALTER TABLE `sis_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `sis_buku`
--
ALTER TABLE `sis_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_rak` (`id_rak`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `sis_daftar`
--
ALTER TABLE `sis_daftar`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `id_angkatan` (`id_angkatan`),
  ADD KEY `id_jenjang` (`id_jenjang`);

--
-- Indexes for table `sis_denda`
--
ALTER TABLE `sis_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `sis_detailbuku`
--
ALTER TABLE `sis_detailbuku`
  ADD PRIMARY KEY (`id_detailbuku`);

--
-- Indexes for table `sis_detail_angsur`
--
ALTER TABLE `sis_detail_angsur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sis_det_peminjaman`
--
ALTER TABLE `sis_det_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `sis_guru`
--
ALTER TABLE `sis_guru`
  ADD PRIMARY KEY (`kode_guru`);

--
-- Indexes for table `sis_isipaket`
--
ALTER TABLE `sis_isipaket`
  ADD PRIMARY KEY (`id_isi`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `sis_jenisbayar`
--
ALTER TABLE `sis_jenisbayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sis_jenismapel`
--
ALTER TABLE `sis_jenismapel`
  ADD PRIMARY KEY (`id_jenismapel`);

--
-- Indexes for table `sis_jenis_transaksi`
--
ALTER TABLE `sis_jenis_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sis_jenjang`
--
ALTER TABLE `sis_jenjang`
  ADD PRIMARY KEY (`id_jenjang`),
  ADD KEY `id_jenjang` (`id_jenjang`);

--
-- Indexes for table `sis_jurnal`
--
ALTER TABLE `sis_jurnal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sis_kategoribuku`
--
ALTER TABLE `sis_kategoribuku`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `sis_kelas`
--
ALTER TABLE `sis_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jenjang` (`id_jenjang`);

--
-- Indexes for table `sis_level`
--
ALTER TABLE `sis_level`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `sis_lulus`
--
ALTER TABLE `sis_lulus`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `sis_mapel`
--
ALTER TABLE `sis_mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `id_jenismapel` (`id_jenismapel`);

--
-- Indexes for table `sis_modul`
--
ALTER TABLE `sis_modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `sis_nilai`
--
ALTER TABLE `sis_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sis_paketjenjang`
--
ALTER TABLE `sis_paketjenjang`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `sis_pembayaran`
--
ALTER TABLE `sis_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sis_peminjaman`
--
ALTER TABLE `sis_peminjaman`
  ADD PRIMARY KEY (`no_peminjaman`);

--
-- Indexes for table `sis_pilihanbayar`
--
ALTER TABLE `sis_pilihanbayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sis_pindah`
--
ALTER TABLE `sis_pindah`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `sis_pmb_angsur`
--
ALTER TABLE `sis_pmb_angsur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sis_pmb_rutin`
--
ALTER TABLE `sis_pmb_rutin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sis_privilage`
--
ALTER TABLE `sis_privilage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sis_rakbuku`
--
ALTER TABLE `sis_rakbuku`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `sis_reg_user`
--
ALTER TABLE `sis_reg_user`
  ADD PRIMARY KEY (`id_reg`);

--
-- Indexes for table `sis_rencana_anggaran`
--
ALTER TABLE `sis_rencana_anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sis_rombel`
--
ALTER TABLE `sis_rombel`
  ADD PRIMARY KEY (`id_rombel`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `sis_siswa`
--
ALTER TABLE `sis_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_daftar` (`id_daftar`),
  ADD KEY `id_rombel` (`id_rombel`);

--
-- Indexes for table `sis_tabungandetail`
--
ALTER TABLE `sis_tabungandetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sis_tagihan`
--
ALTER TABLE `sis_tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sis_tahunajaran`
--
ALTER TABLE `sis_tahunajaran`
  ADD PRIMARY KEY (`id_angkatan`);

--
-- Indexes for table `sis_transaksi`
--
ALTER TABLE `sis_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sis_alokasiguru`
--
ALTER TABLE `sis_alokasiguru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_alokasimapel`
--
ALTER TABLE `sis_alokasimapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_daftar`
--
ALTER TABLE `sis_daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sis_detail_angsur`
--
ALTER TABLE `sis_detail_angsur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_det_peminjaman`
--
ALTER TABLE `sis_det_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_guru`
--
ALTER TABLE `sis_guru`
  MODIFY `kode_guru` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_isipaket`
--
ALTER TABLE `sis_isipaket`
  MODIFY `id_isi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sis_jenisbayar`
--
ALTER TABLE `sis_jenisbayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_jenismapel`
--
ALTER TABLE `sis_jenismapel`
  MODIFY `id_jenismapel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_jenjang`
--
ALTER TABLE `sis_jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_jurnal`
--
ALTER TABLE `sis_jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_kategoribuku`
--
ALTER TABLE `sis_kategoribuku`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_kelas`
--
ALTER TABLE `sis_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sis_mapel`
--
ALTER TABLE `sis_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_modul`
--
ALTER TABLE `sis_modul`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sis_nilai`
--
ALTER TABLE `sis_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_paketjenjang`
--
ALTER TABLE `sis_paketjenjang`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sis_pembayaran`
--
ALTER TABLE `sis_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_pilihanbayar`
--
ALTER TABLE `sis_pilihanbayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_pmb_angsur`
--
ALTER TABLE `sis_pmb_angsur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_pmb_rutin`
--
ALTER TABLE `sis_pmb_rutin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_privilage`
--
ALTER TABLE `sis_privilage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_rakbuku`
--
ALTER TABLE `sis_rakbuku`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_rencana_anggaran`
--
ALTER TABLE `sis_rencana_anggaran`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_rombel`
--
ALTER TABLE `sis_rombel`
  MODIFY `id_rombel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_siswa`
--
ALTER TABLE `sis_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_tabungandetail`
--
ALTER TABLE `sis_tabungandetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_tagihan`
--
ALTER TABLE `sis_tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sis_tahunajaran`
--
ALTER TABLE `sis_tahunajaran`
  MODIFY `id_angkatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sis_alokasimapel`
--
ALTER TABLE `sis_alokasimapel`
  ADD CONSTRAINT `sis_alokasimapel_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `sis_kelas` (`id_kelas`);

--
-- Constraints for table `sis_buku`
--
ALTER TABLE `sis_buku`
  ADD CONSTRAINT `sis_buku_ibfk_1` FOREIGN KEY (`id_rak`) REFERENCES `sis_rakbuku` (`id_rak`),
  ADD CONSTRAINT `sis_buku_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `sis_kategoribuku` (`id_kategori`);

--
-- Constraints for table `sis_isipaket`
--
ALTER TABLE `sis_isipaket`
  ADD CONSTRAINT `sis_isipaket_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `sis_paketjenjang` (`id_paket`);

--
-- Constraints for table `sis_kelas`
--
ALTER TABLE `sis_kelas`
  ADD CONSTRAINT `sis_kelas_ibfk_1` FOREIGN KEY (`id_jenjang`) REFERENCES `sis_jenjang` (`id_jenjang`);

--
-- Constraints for table `sis_mapel`
--
ALTER TABLE `sis_mapel`
  ADD CONSTRAINT `sis_mapel_ibfk_1` FOREIGN KEY (`id_jenismapel`) REFERENCES `sis_jenismapel` (`id_jenismapel`);

--
-- Constraints for table `sis_rombel`
--
ALTER TABLE `sis_rombel`
  ADD CONSTRAINT `sis_rombel_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `sis_kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
