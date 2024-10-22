-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Mar 2022 pada 02.44
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_request`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
--

CREATE TABLE `alat` (
  `id_alat` int(11) NOT NULL,
  `alat` varchar(200) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alat`
--

INSERT INTO `alat` (`id_alat`, `alat`, `active`) VALUES
(1, 'EXCAVATOR', 1),
(2, 'BULDOZER', 1),
(3, 'BULDOZER RIPPER', 1),
(4, 'VIBRO ROLLER', 1),
(6, 'SHEEP FOOT', 1),
(8, 'ASPHALT FINISHER', 1),
(9, 'PNEUMATIC TANDEM ROLLER', 1),
(10, 'WIRTGEN', 1),
(11, 'VIBRATOR', 1),
(13, 'BREAKER', 1),
(14, 'TOWER CRANE', 1),
(15, 'CRANE', 1),
(16, 'RAFTER', 1),
(17, 'DRILING RIG', 1),
(18, 'DUMP TRUCK', 1),
(19, 'WATER TANK', 1),
(20, 'CONCRETE PUMP', 1),
(21, 'CONCRETE SPRAYER', 1),
(22, 'TRUCK MIXER', 1),
(23, 'COMPRESOR', 1),
(24, 'GENSET', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_quality`
--

CREATE TABLE `data_quality` (
  `id_data_quality` int(11) NOT NULL,
  `id_data` varchar(200) NOT NULL,
  `no_data_quality` varchar(100) NOT NULL,
  `judul_data_quality` varchar(100) NOT NULL,
  `klasifikasi_data_quality` varchar(100) NOT NULL,
  `keterangan_data_quality` varchar(200) NOT NULL,
  `tanggal_data_quality` date NOT NULL,
  `berkas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_quality`
--

INSERT INTO `data_quality` (`id_data_quality`, `id_data`, `no_data_quality`, `judul_data_quality`, `klasifikasi_data_quality`, `keterangan_data_quality`, `tanggal_data_quality`, `berkas`) VALUES
(23, '20220327123332', 'no dokumen edit', 'judul dokumen edit', 'Office & Fastol', 'keterangan dokumen edit', '2022-03-27', '20220327123332.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_alat_laporan`
--

CREATE TABLE `detail_alat_laporan` (
  `id_detail_alat_laporan` int(11) NOT NULL,
  `id_detail_laporan_harian` varchar(100) NOT NULL,
  `id_alat` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_alat_laporan`
--

INSERT INTO `detail_alat_laporan` (`id_detail_alat_laporan`, `id_detail_laporan_harian`, `id_alat`, `jumlah`) VALUES
(2, '20220326120153', '8', 0),
(3, '20220326120153', '13', 0),
(4, '20220326120153', '2', 0),
(5, '20220326120153', '3', 6),
(6, '20220326120153', '23', 0),
(7, '20220326120153', '20', 43),
(8, '20220326120153', '21', 0),
(9, '20220326120153', '15', 8),
(10, '20220326120153', '17', 7),
(11, '20220326120153', '18', 6),
(12, '20220326120153', '1', 5),
(13, '20220326120153', '24', 0),
(14, '20220326120153', '9', 5),
(15, '20220326120153', '16', 6),
(16, '20220326120153', '6', 6),
(18, '20220326120153', '14', 6),
(19, '20220326120153', '22', 77),
(20, '20220326120153', '11', 8),
(21, '20220326120153', '4', 5),
(22, '20220326120153', '19', 6),
(23, '20220326120153', '10', 4),
(25, '20220326120226', '8', 1),
(26, '20220326120226', '13', 2),
(27, '20220326120226', '2', 3),
(28, '20220326120226', '3', 4),
(29, '20220326120226', '23', 5),
(30, '20220326120226', '20', 6),
(31, '20220326120226', '21', 7),
(32, '20220326120226', '15', 8),
(33, '20220326120226', '17', 9),
(34, '20220326120226', '18', 1),
(35, '20220326120226', '1', 2),
(36, '20220326120226', '24', 3),
(37, '20220326120226', '9', 4),
(38, '20220326120226', '16', 5),
(39, '20220326120226', '6', 6),
(41, '20220326120226', '14', 7),
(42, '20220326120226', '22', 8),
(43, '20220326120226', '11', 9),
(44, '20220326120226', '4', 8),
(45, '20220326120226', '19', 7),
(46, '20220326120226', '10', 6),
(71, '20220326155946', '8', 0),
(72, '20220326155946', '13', 0),
(73, '20220326155946', '2', 0),
(74, '20220326155946', '3', 0),
(75, '20220326155946', '23', 0),
(76, '20220326155946', '20', 0),
(77, '20220326155946', '21', 0),
(78, '20220326155946', '15', 0),
(79, '20220326155946', '17', 2),
(80, '20220326155946', '18', 2),
(81, '20220326155946', '1', 2),
(82, '20220326155946', '24', 0),
(83, '20220326155946', '9', 0),
(84, '20220326155946', '16', 0),
(85, '20220326155946', '6', 0),
(87, '20220326155946', '14', 0),
(88, '20220326155946', '22', 0),
(89, '20220326155946', '11', 0),
(90, '20220326155946', '4', 0),
(91, '20220326155946', '19', 0),
(92, '20220326155946', '10', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_laporan_harian`
--

CREATE TABLE `detail_laporan_harian` (
  `id_detail_laporan_harian` varchar(100) NOT NULL,
  `id_laporan_harian` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `id_item` varchar(100) NOT NULL,
  `jumlah` decimal(15,0) NOT NULL,
  `uraian` varchar(200) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `cuaca` varchar(100) NOT NULL,
  `dokumentasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_laporan_harian`
--

INSERT INTO `detail_laporan_harian` (`id_detail_laporan_harian`, `id_laporan_harian`, `tanggal`, `id_item`, `jumlah`, `uraian`, `lokasi`, `cuaca`, `dokumentasi`) VALUES
('20220326120153', '2203260001', '2022-03-26', '2', '45', 'Beton', 'Jakarta', 'Cerah', 'https://www.youtube.com/watch?v=HhjHYkPQ8F0&list=RDGMEMQ1dJ7wXfLlqCjwV0xfSNbA&index=20'),
('20220326120226', '2203260001', '2022-03-28', '1', '23', 'Solid', 'Solo', 'Cerah', 'https://www.youtube.com/watch?v=HhjHYkPQ8F0&list=RDGMEMQ1dJ7wXfLlqCjwV0xfSNbA&index=20'),
('20220326155946', '2203260002', '2022-03-03', '1', '20', 'Solid 2', 'Pajang', 'Cerah', 'https://www.youtube.com/watch?v=HhjHYkPQ8F0&list=RDGMEMQ1dJ7wXfLlqCjwV0xfSNbA&index=20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_material`
--

CREATE TABLE `detail_material` (
  `id_detail_material` int(11) NOT NULL,
  `id_request` varchar(100) NOT NULL,
  `id_material` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_material`
--

INSERT INTO `detail_material` (`id_detail_material`, `id_request`, `id_material`, `jumlah`) VALUES
(7, '20220327160315', '2', 5),
(8, '20220327160315', '1', 6),
(9, '20220327160315', '3', 7),
(10, '20220327160315', '5', 8),
(11, '20220327160315', '7', 9),
(12, '20220327160315', '4', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peralatan`
--

CREATE TABLE `detail_peralatan` (
  `id_detail_peralatan` int(11) NOT NULL,
  `id_request` varchar(100) NOT NULL,
  `id_peralatan` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_peralatan`
--

INSERT INTO `detail_peralatan` (`id_detail_peralatan`, `id_request`, `id_peralatan`, `jumlah`) VALUES
(6, '20220327160315', '7', 11),
(7, '20220327160315', '3', 12),
(8, '20220327160315', '6', 13),
(9, '20220327160315', '4', 14),
(10, '20220327160315', '5', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_request`
--

CREATE TABLE `detail_request` (
  `id_detail_request` int(11) NOT NULL,
  `id_request` varchar(100) NOT NULL,
  `id_item_pekerjaan` varchar(100) NOT NULL,
  `volume` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_request`
--

INSERT INTO `detail_request` (`id_detail_request`, `id_request`, `id_item_pekerjaan`, `volume`, `lokasi`) VALUES
(4, '20220327160315', '3', '20', 'Jakarta'),
(5, '20220327160315', '1', '5', 'Solo'),
(6, '20220327160315', '4', '15', 'Bandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_tenaga`
--

CREATE TABLE `detail_tenaga` (
  `id_detail_tenaga` int(11) NOT NULL,
  `id_request` varchar(100) NOT NULL,
  `id_tenaga` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_tenaga`
--

INSERT INTO `detail_tenaga` (`id_detail_tenaga`, `id_request`, `id_tenaga`, `jumlah`) VALUES
(5, '20220327160315', '4', 2),
(6, '20220327160315', '5', 0),
(7, '20220327160315', '2', 0),
(8, '20220327160315', '1', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `id_laporan_harian` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `username`, `status`, `keterangan`, `tanggal`, `id_laporan_harian`) VALUES
(3, 'owner', 1, 'Belum OK, perbaiki bagian A', '2022-03-26', '2203260001'),
(4, 'owner', 1, 'Perbaiki bagian B', '2022-03-26', '2203260001'),
(5, 'ks', 2, 'OK LANJUT', '2022-03-26', '2203260001'),
(7, 'owner', 2, 'OK bisa dilanjutkan', '2022-03-26', '2203260001'),
(9, 'se', 2, 'OK LANJOOOOT', '2022-03-27', '2203260001'),
(10, 'se', 1, 'Perbaiki bagian 1,2,3', '2022-03-27', '2203260002'),
(12, 'pm', 1, 'Perbaiki bagian 2', '2022-03-28', '20220327160315'),
(14, 're', 1, 'Revisi bagian ini ini ini', '2022-03-28', '20220327160315'),
(15, 'pm', 1, 'Perbaiki\r\nbagian AAAA NNNN', '2022-03-28', '20220327160315'),
(16, 'pm', 2, 'OK LANJOOOOOT', '2022-03-28', '20220327160315'),
(17, 'ci', 2, 'Feedback dari chief, OK', '2022-03-28', '20220327160315'),
(18, 'struk', 2, 'feedback dari struktur engin, OK', '2022-03-28', '20220327160315'),
(19, 'pme', 2, 'PAVEMENT MATERIAL ENGINEER OKKKKK', '2022-03-28', '20220327160315'),
(20, 'qe', 1, 'Periksa lagi bagian A', '2022-03-28', '20220327160315'),
(21, 'qe', 2, 'Quantity engi OK', '2022-03-28', '20220327160315'),
(22, 're', 2, 'Resident Engi OK', '2022-03-28', '20220327160315'),
(23, 'owner', 1, 'ganti bagian ini itu', '2022-03-28', '20220327160315'),
(24, 'owner', 2, 'OK bisa dilanjutkan', '2022-03-28', '20220327160315');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_kerja`
--

CREATE TABLE `gambar_kerja` (
  `id_gambar_kerja` int(11) NOT NULL,
  `no_gambar` varchar(100) NOT NULL,
  `judul_gambar` varchar(100) NOT NULL,
  `jenis_gambar` varchar(100) NOT NULL,
  `jumlah_halaman_gambar` varchar(100) NOT NULL,
  `klasifikasi_gambar` varchar(100) NOT NULL,
  `keterangan_gambar` varchar(200) NOT NULL,
  `link_gambar` varchar(200) NOT NULL,
  `tanggal_gambar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar_kerja`
--

INSERT INTO `gambar_kerja` (`id_gambar_kerja`, `no_gambar`, `judul_gambar`, `jenis_gambar`, `jumlah_halaman_gambar`, `klasifikasi_gambar`, `keterangan_gambar`, `link_gambar`, `tanggal_gambar`) VALUES
(8, 'no gambar kerja edit', 'judul gambar kerja edit', 'Shop Drawing', '20', 'Office & Fastol', 'keterangan gambar edit', 'https://194.163.183.129/sono-bisque-doll-wa-koi-wo-suru-episode-12/1', '2022-03-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `harga` decimal(15,0) NOT NULL,
  `no_item` varchar(100) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`id_item`, `nama`, `satuan`, `harga`, `no_item`, `active`) VALUES
(1, 'Solid Sodding', 'm2', '30554', '12.01 (1)', 1),
(2, 'Beton Kelas E', 'm3', '1159498', '10.01 (15)', 1),
(3, 'Pagar Rumija, Tipe 2 (Kawat Berduri)', 'M', '436121', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_pekerjaan`
--

CREATE TABLE `item_pekerjaan` (
  `id_item_pekerjaan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `mata_pembayaran` varchar(100) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `item_pekerjaan`
--

INSERT INTO `item_pekerjaan` (`id_item_pekerjaan`, `nama`, `satuan`, `mata_pembayaran`, `active`) VALUES
(1, 'Bitumen Lapis Resap Pengikat (Prime Coat)', 'Kg', '9.04', 1),
(2, 'Asphalt Concrete Base Course ', 'Ton', '9.07 (1)', 1),
(3, 'Asphal Pen 60/70 ', 'Ton', '9.07 (4a)', 1),
(4, 'Bahan Anti Pengelupasan', 'Kg', '9.07 (5)', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `norek` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `saldo` decimal(15,0) NOT NULL,
  `no_kontrak` varchar(100) NOT NULL,
  `tanggal_kontrak` date NOT NULL,
  `waktu_desain` varchar(100) NOT NULL,
  `waktu_pelaksanaan` varchar(100) NOT NULL,
  `pengguna_jasa` varchar(100) NOT NULL,
  `penyedia_jasa` varchar(100) NOT NULL,
  `konsultasi_pengawas` varchar(100) NOT NULL,
  `nama_proyek` varchar(100) NOT NULL,
  `kontraktor_pelaksana` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id`, `nama`, `email`, `alamat`, `phone`, `norek`, `logo`, `judul`, `saldo`, `no_kontrak`, `tanggal_kontrak`, `waktu_desain`, `waktu_pelaksanaan`, `pengguna_jasa`, `penyedia_jasa`, `konsultasi_pengawas`, `nama_proyek`, `kontraktor_pelaksana`) VALUES
(1, 'SMK Pembangunan Nasional Sukoharjo', 'gagedesignsolo@gmail.com', 'Jln. Monginsidi III/6, Margorejo, Solo', '(0271) 654038', 'BCA : Bambang Nugroho No Rek. 015 318 899', 'logo.png', 'Aplikasi Adminstrasi Proyek Tol Manado Bitung', '30000000', '001/KONTRAK-DIR/2016', '2016-11-01', '233', '3', '4', '5', '6', 'PEMBANGUNAN JALAN TOL MANADO – BITUNG', 'PT. PP (Persero) Tbk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_harian`
--

CREATE TABLE `laporan_harian` (
  `id_laporan` int(11) NOT NULL,
  `id_laporan_harian` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `tanggal_submit` date NOT NULL,
  `tanggal_start` date NOT NULL,
  `tanggal_end` date NOT NULL,
  `se_acc` int(11) NOT NULL,
  `ks_acc` int(11) NOT NULL,
  `owner_acc` int(11) NOT NULL,
  `se_feedback` text NOT NULL,
  `owner_feedback` text NOT NULL,
  `ks_feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan_harian`
--

INSERT INTO `laporan_harian` (`id_laporan`, `id_laporan_harian`, `username`, `tanggal_submit`, `tanggal_start`, `tanggal_end`, `se_acc`, `ks_acc`, `owner_acc`, `se_feedback`, `owner_feedback`, `ks_feedback`) VALUES
(3, '2203260001', 'pl', '2022-03-26', '2022-03-26', '2022-04-02', 2, 2, 2, '', '', ''),
(5, '2203260002', 'pl', '2022-03-26', '2022-03-01', '2022-03-08', 1, 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `level`, `status`) VALUES
(1, 'Site Engineer', 1),
(2, 'Project Manager', 1),
(3, 'Chief Engineer', 1),
(4, 'Struktur Engineer', 1),
(5, 'Pavement Material Engineer', 1),
(6, 'Quantity Engineer', 1),
(7, 'Resident Engineer', 1),
(8, 'Pelaksana Lapangan', 1),
(9, 'Konsultasi Supervisi', 1),
(10, 'Owner', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `material`
--

CREATE TABLE `material` (
  `id_material` int(11) NOT NULL,
  `material` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `material`
--

INSERT INTO `material` (`id_material`, `material`) VALUES
(1, 'Batu Bata'),
(2, 'Batu'),
(3, 'Kayu'),
(4, 'Semen'),
(5, 'Metal'),
(7, 'Pipa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode`
--

CREATE TABLE `metode` (
  `id_metode` int(11) NOT NULL,
  `no_metode` varchar(200) NOT NULL,
  `judul_metode` text NOT NULL,
  `jumlah_halaman_metode` varchar(100) NOT NULL,
  `klasifikasi_metode` varchar(100) NOT NULL,
  `link_metode` varchar(200) NOT NULL,
  `keterangan_metode` varchar(200) NOT NULL,
  `tanggal_metode` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `metode`
--

INSERT INTO `metode` (`id_metode`, `no_metode`, `judul_metode`, `jumlah_halaman_metode`, `klasifikasi_metode`, `link_metode`, `keterangan_metode`, `tanggal_metode`) VALUES
(8, 'no kerja edit', 'judul metode edit', '28', 'Drainase', 'https://194.163.183.129/sono-bisque-doll-wa-koi-wo-suru-episode-12/edit', 'keterangan metode edit', '2022-03-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peralatan`
--

CREATE TABLE `peralatan` (
  `id_peralatan` int(11) NOT NULL,
  `peralatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peralatan`
--

INSERT INTO `peralatan` (`id_peralatan`, `peralatan`) VALUES
(3, 'Dump Truck'),
(4, 'Pneumatic Tire Roller'),
(5, 'Tandem Roller'),
(6, 'Excavator'),
(7, 'Asphalt Finisher'),
(8, 'Crane');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `id_request` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `tanggal_pelaksanaan` date NOT NULL,
  `pm_acc` int(11) NOT NULL,
  `ci_acc` int(11) NOT NULL,
  `struk_acc` int(11) NOT NULL,
  `pme_acc` int(11) NOT NULL,
  `qe_acc` int(11) NOT NULL,
  `re_acc` int(11) NOT NULL,
  `owner_acc` int(11) NOT NULL,
  `tanggal_submit` date NOT NULL,
  `id_gambar_kerja` varchar(100) NOT NULL,
  `id_metode` varchar(100) NOT NULL,
  `id_data_quality` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `request`
--

INSERT INTO `request` (`id`, `id_request`, `username`, `tanggal_pengajuan`, `tanggal_pelaksanaan`, `pm_acc`, `ci_acc`, `struk_acc`, `pme_acc`, `qe_acc`, `re_acc`, `owner_acc`, `tanggal_submit`, `id_gambar_kerja`, `id_metode`, `id_data_quality`) VALUES
(5, '20220327160315', 'se', '2022-03-01', '2022-03-31', 2, 2, 2, 2, 2, 2, 2, '2022-03-27', '8', '8', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tenaga`
--

CREATE TABLE `tenaga` (
  `id_tenaga` int(11) NOT NULL,
  `tenaga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tenaga`
--

INSERT INTO `tenaga` (`id_tenaga`, `tenaga`) VALUES
(1, 'Pekerja Harian'),
(2, 'Pekerja Cor'),
(4, 'Pekerja Bekisting'),
(5, 'Pekerja Besi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `no_hp` varchar(200) NOT NULL,
  `ttd` varchar(200) NOT NULL,
  `cv` varchar(100) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `nama`, `password`, `level`, `email`, `no_hp`, `ttd`, `cv`, `last_login`) VALUES
(1, 'admin', 'Reyhan', '$2y$05$5YkxCpx/xPqfrTSDVhgqWe7vKVlzW3b38jjjNiawHiVikrMvy683O', 'Admin', 'admin@google.com', '089673333318', '', '', '0000-00-00 00:00:00'),
(2, 'se', 'Nama Site Enginer', '$2y$05$W7wlTa5hilHKjhTpYvqPju1xmJqL/iIu1G3t2awxY9HlOhCMKXHOK', '1', 'se@gmail.com', '000', '', 'PT Site Enginer', '0000-00-00 00:00:00'),
(3, 'pm', 'Danang Hadiya T', '$2y$05$GS/sGX/ydOs5XBm..IqpiOqIDD2TtDpgozAXqtmWwzaLgvUIEVmju', '2', 'pm@gmail.com', '123456', '', 'PT. PP (Persero) Tbk', '0000-00-00 00:00:00'),
(4, 'ci', 'ci', '$2y$05$CjoayEiYJIeeYyYC8Dof8O2.3FJeGcMqoi2FVEDc40JPceL9d3Ib6', '3', 'admin@google.com', '1233123', '', '', '0000-00-00 00:00:00'),
(5, 'struk', 'struk', '$2y$05$Z8wUW1ukiusetUwrho6E4.JNVgfYzWG8HD3dQmSZZpHRRdYBpyNNa', '4', 'admin@google.com', '123123', '', '', '0000-00-00 00:00:00'),
(6, 'pme', 'pme', '$2y$05$Fd.f7ZXhIvuU4IEPQ8LNdOIuwcfOfm4xen0Nze/ZA79rbnif2VhRW', '5', 'mail@sd.com', '33333', '', '', '0000-00-00 00:00:00'),
(7, 'qe', 'qe', '$2y$05$E7oJjZaO9nSwG5xW2IkjOuOaivkQevWhHVwL1JHXBkNw5ewxhMA9e', '6', 'afifnuruddinmaisaroh@gmail.co.id', '123123', '', '', '0000-00-00 00:00:00'),
(8, 're', 'Purwanto', '$2y$05$IGxKYHWiD2w7dUktjJtWJ.ecbSI/N.SAKtTnTe77BBb/mtbVbHHBq', '7', 're@gmail.com', '3332133', '', 'KSO BUANA MABIT', '0000-00-00 00:00:00'),
(9, 'owner', 'Muhammad Taufiq', '$2y$05$QCjv6AfDHCi4oHktrzi2e.EwRfRBiN3OqptHB7BqdqUQd77148Usm', '10', 'owner@gmail.com', '231233', '', 'PT Jasamarga Manado-Bitung', '0000-00-00 00:00:00'),
(10, 'pl', 'pl', '$2y$05$dRouEDHy1oS0i4qYUFq8VOHvtUhuKt0gLOGnIyK2x/qjvQUb5iLTi', '8', 'pl@gmail.com', '089673333318', '', 'PT Sinar Jati Perkasa', '0000-00-00 00:00:00'),
(11, 'ks', 'ks', '$2y$05$N4AsA07UaQ5i.KSF3j/miehUbcZ6D.4YPTfqGBXeMi1UfEmIBD4G.', '9', '', '', '', 'PT Terang Sentosa', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `data_quality`
--
ALTER TABLE `data_quality`
  ADD PRIMARY KEY (`id_data_quality`);

--
-- Indexes for table `detail_alat_laporan`
--
ALTER TABLE `detail_alat_laporan`
  ADD PRIMARY KEY (`id_detail_alat_laporan`);

--
-- Indexes for table `detail_laporan_harian`
--
ALTER TABLE `detail_laporan_harian`
  ADD PRIMARY KEY (`id_detail_laporan_harian`);

--
-- Indexes for table `detail_material`
--
ALTER TABLE `detail_material`
  ADD PRIMARY KEY (`id_detail_material`);

--
-- Indexes for table `detail_peralatan`
--
ALTER TABLE `detail_peralatan`
  ADD PRIMARY KEY (`id_detail_peralatan`);

--
-- Indexes for table `detail_request`
--
ALTER TABLE `detail_request`
  ADD PRIMARY KEY (`id_detail_request`);

--
-- Indexes for table `detail_tenaga`
--
ALTER TABLE `detail_tenaga`
  ADD PRIMARY KEY (`id_detail_tenaga`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `gambar_kerja`
--
ALTER TABLE `gambar_kerja`
  ADD PRIMARY KEY (`id_gambar_kerja`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `item_pekerjaan`
--
ALTER TABLE `item_pekerjaan`
  ADD PRIMARY KEY (`id_item_pekerjaan`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_harian`
--
ALTER TABLE `laporan_harian`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indexes for table `metode`
--
ALTER TABLE `metode`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`id_peralatan`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenaga`
--
ALTER TABLE `tenaga`
  ADD PRIMARY KEY (`id_tenaga`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `data_quality`
--
ALTER TABLE `data_quality`
  MODIFY `id_data_quality` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `detail_alat_laporan`
--
ALTER TABLE `detail_alat_laporan`
  MODIFY `id_detail_alat_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `detail_material`
--
ALTER TABLE `detail_material`
  MODIFY `id_detail_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `detail_peralatan`
--
ALTER TABLE `detail_peralatan`
  MODIFY `id_detail_peralatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `detail_request`
--
ALTER TABLE `detail_request`
  MODIFY `id_detail_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `detail_tenaga`
--
ALTER TABLE `detail_tenaga`
  MODIFY `id_detail_tenaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `gambar_kerja`
--
ALTER TABLE `gambar_kerja`
  MODIFY `id_gambar_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `item_pekerjaan`
--
ALTER TABLE `item_pekerjaan`
  MODIFY `id_item_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `laporan_harian`
--
ALTER TABLE `laporan_harian`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `metode`
--
ALTER TABLE `metode`
  MODIFY `id_metode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `id_peralatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tenaga`
--
ALTER TABLE `tenaga`
  MODIFY `id_tenaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
