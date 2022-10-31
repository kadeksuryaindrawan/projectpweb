-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2022 at 03:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aps_c4`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `nama_dokumen` varchar(200) NOT NULL,
  `tgl_dokumen` date NOT NULL,
  `file_pdf` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `id_tipe`, `nama_dokumen`, `tgl_dokumen`, `file_pdf`) VALUES
(1, 1, 'penyerahan piala', '2022-01-13', 'dokumen_penyerahan piala_1.pdf'),
(3, 3, 'tugas akhir mahasiswa', '2022-01-11', 'dokumen_tugas akhir mahasiswa_3.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(25) NOT NULL,
  `nidn` varchar(25) NOT NULL,
  `nama_dosen` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prodi` int(11) NOT NULL,
  `pendidikan_terakhir` varchar(50) NOT NULL,
  `bidang_keahlian` varchar(200) NOT NULL,
  `DTPS` enum('y','n') NOT NULL,
  `jabatan_akademik` int(11) NOT NULL,
  `nomor_serdos` varchar(50) NOT NULL,
  `kesesuaian_bidang` enum('y','n') NOT NULL,
  `status_dosen` enum('tetap','tidak_tetap') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nidn`, `nama_dosen`, `alamat`, `no_telp`, `user_id`, `prodi`, `pendidikan_terakhir`, `bidang_keahlian`, `DTPS`, `jabatan_akademik`, `nomor_serdos`, `kesesuaian_bidang`, `status_dosen`) VALUES
('232343213', '233232', 'Indrawan', 'dwadw', '233243', 22, 889273, 'smk', 'dawwda', 'y', 8, '23433412', 'n', 'tetap'),
('237238732', '32872873827', 'Gilang', 'DPS', '29389283', 18, 2331212, '', '', 'y', 8, '', 'y', 'tetap'),
('323280238', '12345678', 'Pak Chandra', 'Kuta Selatan', '0823723821', 9, 2321232, 'Magister', 'Data', 'y', 11, '2321243', 'y', 'tidak_tetap'),
('6152738712', '231232332', 'Pak Eddy', 'DPS', '089754789237', 8, 889273, 'Magister', 'test', 'y', 9, '7664553', 'y', 'tetap'),
('72637263271', '7823782281', 'dosen test', 'Denpasar', '08782372812', 16, 736482, '', '', 'y', 8, '', 'y', 'tidak_tetap');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_industri`
--

CREATE TABLE `dosen_industri` (
  `id` int(11) NOT NULL,
  `nidk` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pendidikan_terakhir` varchar(100) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `list_sertifikat` text NOT NULL,
  `list_matakuliah` text NOT NULL,
  `bobot_sks` float NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen_industri`
--

INSERT INTO `dosen_industri` (`id`, `nidk`, `nama`, `pendidikan_terakhir`, `perusahaan`, `bidang`, `list_sertifikat`, `list_matakuliah`, `bobot_sks`, `semester`, `tahun`) VALUES
(2, '2017283718234', 'Pak Test', 'S2', 'Test', 'Test', '  test, test2, test3', 'matkul1,matkul2,matkul3', 23, 'ganjil', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `ewmp`
--

CREATE TABLE `ewmp` (
  `id` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `tahun` year(4) NOT NULL,
  `pendidikan_prodi` float NOT NULL,
  `pendidikan_prodi_lain` float NOT NULL,
  `pendidikan_pt_luar` float NOT NULL,
  `penelitian` float NOT NULL,
  `pkm` float NOT NULL,
  `penunjang` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ewmp`
--

INSERT INTO `ewmp` (`id`, `nip`, `tahun`, `pendidikan_prodi`, `pendidikan_prodi_lain`, `pendidikan_pt_luar`, `penelitian`, `pkm`, `penunjang`) VALUES
(1, '6152738712', 2022, 20.9, 10, 20, 23, 12, 3),
(4, '323280238', 2022, 12, 8.44, 0, 5.3, 1.375, 1.5);

-- --------------------------------------------------------

--
-- Table structure for table `haki_dosen`
--

CREATE TABLE `haki_dosen` (
  `id_hakidosen` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `judul_haki` varchar(200) NOT NULL,
  `tgl_terdaftar` date NOT NULL,
  `no_haki` int(11) NOT NULL,
  `file_sertif` varchar(100) DEFAULT NULL,
  `anggota` varchar(200) NOT NULL,
  `jenis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `haki_dosen`
--

INSERT INTO `haki_dosen` (`id_hakidosen`, `nip`, `judul_haki`, `tgl_terdaftar`, `no_haki`, `file_sertif`, `anggota`, `jenis`) VALUES
(3, '323280238', 'HAKI TEST', '2021-01-14', 22, 'haki_dosen_323280238_3.pdf', 'surya indrawan', 'paten'),
(5, '6152738712', 'HAKI BERTAHAN HIDUP', '2022-02-17', 23321212, 'haki_dosen_6152738712_5.pdf', 'wadwadwadwa', 'hak cipta');

-- --------------------------------------------------------

--
-- Table structure for table `haki_mahasiswa`
--

CREATE TABLE `haki_mahasiswa` (
  `id_hakimhs` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `judul_haki` varchar(200) NOT NULL,
  `tgl_terdaftar` date NOT NULL,
  `no_haki` int(11) NOT NULL,
  `file_sertif` varchar(100) DEFAULT NULL,
  `anggota` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `haki_mahasiswa`
--

INSERT INTO `haki_mahasiswa` (`id_hakimhs`, `nim`, `judul_haki`, `tgl_terdaftar`, `no_haki`, `file_sertif`, `anggota`) VALUES
(2, '2015354007', 'HAKI WEB', '2022-01-07', 7, 'haki_mhs_2015354007_2.pdf', 'surya,riski,gilang'),
(4, '2015354008', 'HAKI Contoh', '2022-02-21', 23231231, 'haki_mhs_2015354008_4.pdf', 'Saya sendiri');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama_jabatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`) VALUES
(8, 'Lektur'),
(9, 'Contoh Jabatan'),
(11, '-');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_index`
--

CREATE TABLE `jurnal_index` (
  `id_jurnalindex` int(11) NOT NULL,
  `nama_jurnalindex` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurnal_index`
--

INSERT INTO `jurnal_index` (`id_jurnalindex`, `nama_jurnalindex`) VALUES
(1, 'SINTA'),
(3, 'SCOPUS'),
(4, 'Web Of Science');

-- --------------------------------------------------------

--
-- Table structure for table `kompetensi`
--

CREATE TABLE `kompetensi` (
  `id` int(11) NOT NULL,
  `nomor_sertif` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama_sertif` varchar(100) NOT NULL,
  `tanggal_berlaku` date NOT NULL,
  `file_bukti` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kompetensi`
--

INSERT INTO `kompetensi` (`id`, `nomor_sertif`, `nip`, `nama_sertif`, `tanggal_berlaku`, `file_bukti`) VALUES
(1, 201, '323280238', 'Contoh', '2022-09-24', 'kompetensi_323280238_1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(25) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `tahun_diterima` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `alamat`, `no_telp`, `tahun_diterima`, `user_id`, `prodi`) VALUES
('2015354007', 'I Kadek Surya Indrawan', 'Denpasar Selatan', '08970945425', 2020, 12, 889273),
('2015354008', 'I Kadek Surya', 'Pemogan', '081238883199', 2020, 17, 2321232);

-- --------------------------------------------------------

--
-- Table structure for table `mengajar`
--

CREATE TABLE `mengajar` (
  `id` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama_matakuliah` text NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `tahun_akademik` year(4) NOT NULL,
  `kode_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mengajar`
--

INSERT INTO `mengajar` (`id`, `nip`, `nama_matakuliah`, `semester`, `tahun_akademik`, `kode_prodi`) VALUES
(2, '323280238', 'PBO2, Test', 'genap', 2022, 2321232),
(3, '6152738712', 'Pemrograman Web Dasar', 'genap', 2022, 889273),
(6, '6152738712', 'mantap', 'ganjil', 2022, 889273);

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing_utama`
--

CREATE TABLE `pembimbing_utama` (
  `id` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `kode_prodi` int(11) NOT NULL,
  `jumlah_bimbingan` int(11) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembimbing_utama`
--

INSERT INTO `pembimbing_utama` (`id`, `nip`, `kode_prodi`, `jumlah_bimbingan`, `tahun`) VALUES
(1, '6152738712', 889273, 20, 2021),
(3, '6152738712', 2321232, 15, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `penelitian`
--

CREATE TABLE `penelitian` (
  `id_penelitian` int(11) NOT NULL,
  `judul_penelitian` varchar(100) NOT NULL,
  `tahun_penelitian` int(11) NOT NULL,
  `tempat_penelitian` varchar(100) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `anggota` text NOT NULL,
  `dana` int(11) NOT NULL,
  `sumber_dana` varchar(100) NOT NULL,
  `file_proposal` varchar(100) DEFAULT NULL,
  `file_laporan` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `nim` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penelitian`
--

INSERT INTO `penelitian` (`id_penelitian`, `judul_penelitian`, `tahun_penelitian`, `tempat_penelitian`, `nip`, `anggota`, `dana`, `sumber_dana`, `file_proposal`, `file_laporan`, `status`, `nim`) VALUES
(3, 'Penelitian Bunga Anggrek', 2022, 'Denpasar', '323280238', 'Surya Indrawan', 2000000, 'DRPMDIKTI', 'penelitian_proposal_323280238_3.pdf', 'penelitian_laporan_323280238_3.pdf', 'terverifikasi', NULL),
(4, 'Penelitian Bunga Mawar', 2022, 'Ubud', '6152738712', 'Surya Riski', 5000000, 'SWADANA', 'penelitian_proposal_6152738712_4.pdf', 'penelitian_laporan_6152738712_4.pdf', 'terverifikasi', NULL),
(7, 'Penelitian Anak', 2020, 'Denpasar', '323280238', 'Surya Indrawan', 1000000, 'SWADANA', 'penelitian_proposal_323280238_7.pdf', 'penelitian_laporan_323280238_7.pdf', 'terverifikasi', '2015354007'),
(8, 'Penelitian Contoh', 2022, 'Denpasar', '323280238', 'surya kadek', 5000000, 'DRPMDIKTI', 'penelitian_proposal_323280238_8.pdf', 'penelitian_laporan_323280238_8.pdf', 'terverifikasi', '2015354008');

-- --------------------------------------------------------

--
-- Table structure for table `pengabdian`
--

CREATE TABLE `pengabdian` (
  `id_pengabdian` int(11) NOT NULL,
  `nama_pengabdian` varchar(100) NOT NULL,
  `tgl_pengabdian` date NOT NULL,
  `tempat_pengabdian` varchar(100) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `dana` int(11) NOT NULL,
  `sumber_dana` varchar(100) NOT NULL,
  `file_proposal` varchar(100) DEFAULT NULL,
  `file_laporan` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengabdian`
--

INSERT INTO `pengabdian` (`id_pengabdian`, `nama_pengabdian`, `tgl_pengabdian`, `tempat_pengabdian`, `nip`, `dana`, `sumber_dana`, `file_proposal`, `file_laporan`, `status`) VALUES
(1, 'Pengabdian desa pemogan', '2021-06-24', 'Denpasar', '72637263271', 2000000, 'DIPA', 'pengabdian_proposal_72637263271_1.pdf', 'pengabdian_laporan_72637263271_1.pdf', 'terverifikasi'),
(4, 'Pengabdian Biasa', '2022-01-29', 'Denpasar', '6152738712', 4000000, 'SWADANA', 'pengabdian_proposal_6152738712_4.pdf', 'pengabdian_laporan_6152738712_4.pdf', 'terverifikasi'),
(5, 'Pengabdian Di PNB', '2022-02-22', 'Denpasar', '323280238', 1000000, 'SWADANA', 'pengabdian_proposal_323280238_5.pdf', 'pengabdian_laporan_323280238_5.pdf', 'belum terverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `peringkat_jurnal`
--

CREATE TABLE `peringkat_jurnal` (
  `id_peringkatjurnal` int(11) NOT NULL,
  `id_jurnalindex` int(11) NOT NULL,
  `nama_peringkatjurnal` text NOT NULL,
  `jenis_media_publikasi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peringkat_jurnal`
--

INSERT INTO `peringkat_jurnal` (`id_peringkatjurnal`, `id_jurnalindex`, `nama_peringkatjurnal`, `jenis_media_publikasi`) VALUES
(1, 1, 'sinta 1', 'Instagram'),
(2, 1, 'sinta 2', 'Instagram'),
(3, 3, 'q 1', 'Whatsapp'),
(4, 3, 'q 2', 'Whatsapp'),
(6, 3, 'q 3', 'Whatsapp'),
(7, 1, 'sinta 3', 'Twitter'),
(8, 4, 'web 1', 'Radio'),
(9, 4, 'web 2', 'Radio');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi_mhs`
--

CREATE TABLE `prestasi_mhs` (
  `id_prestasi` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `nama_event` varchar(100) NOT NULL,
  `tahun_event` int(11) NOT NULL,
  `peringkat` int(11) NOT NULL,
  `tingkat` varchar(25) NOT NULL,
  `file_sertif` varchar(100) DEFAULT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestasi_mhs`
--

INSERT INTO `prestasi_mhs` (`id_prestasi`, `nim`, `nama_event`, `tahun_event`, `peringkat`, `tingkat`, `file_sertif`, `type`) VALUES
(6, '2015354007', 'PNBWDC', 2020, 2, 'politeknik', 'prestasi_2015354007_6.pdf', 'Akademik'),
(7, '2015354008', 'INTECHFEST', 2021, 3, 'nasional', 'prestasi_2015354008_7.pdf', 'Akademik');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `kode_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `nip_kaprodi` varchar(25) DEFAULT NULL,
  `pendidikan_terakhir` varchar(100) NOT NULL,
  `bidang_keahlian` varchar(100) NOT NULL,
  `DTPS` enum('Y','N') NOT NULL,
  `jabatan_akademik` varchar(50) NOT NULL,
  `nomor_serdos` varchar(15) NOT NULL,
  `kesesuaian_bidang` enum('Y','N') NOT NULL,
  `status_dosen` enum('tetap','tidak_tetap') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`kode_prodi`, `nama_prodi`, `nip_kaprodi`, `pendidikan_terakhir`, `bidang_keahlian`, `DTPS`, `jabatan_akademik`, `nomor_serdos`, `kesesuaian_bidang`, `status_dosen`) VALUES
(736482, 'D4 TEST', '72637263271', '', '', 'Y', '', '', 'Y', 'tetap'),
(889273, 'D4 TRPL', '6152738712', '', '', 'Y', '', '', 'Y', 'tetap'),
(2321232, 'D3 Manajemen Informatika', '323280238', '', '', 'Y', '', '', 'Y', 'tetap'),
(2331212, 'D4 Teknik Otomasi', '', '', '', 'Y', '', '', 'Y', 'tetap');

-- --------------------------------------------------------

--
-- Table structure for table `produk_dosen`
--

CREATE TABLE `produk_dosen` (
  `id` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `deskripsi` varchar(2000) NOT NULL,
  `file_bukti` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_dosen`
--

INSERT INTO `produk_dosen` (`id`, `nip`, `nama_produk`, `deskripsi`, `file_bukti`) VALUES
(2, '323280238', 'Kursi', 'mantap', 'produk_dosen_323280238_2.pdf'),
(3, '6152738712', 'meja', 'mantap sekali', 'produk_dosen_6152738712_3.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `publikasi_buku`
--

CREATE TABLE `publikasi_buku` (
  `id_publikasibuku` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `penulis_buku` varchar(200) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `isbn` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publikasi_buku`
--

INSERT INTO `publikasi_buku` (`id_publikasibuku`, `nip`, `penulis_buku`, `judul_buku`, `penerbit`, `tahun_terbit`, `status`, `isbn`) VALUES
(1, '6152738712', 'surya indrawan, surya kadek', 'Laskar Pelangi', 'gramedia', 2020, 'belum terverifikasi', '23242124'),
(3, '323280238', 'saya sendiri', 'Sang Pemimpi', 'gramedia', 2019, 'terverifikasi', '32234312');

-- --------------------------------------------------------

--
-- Table structure for table `publikasi_dosen`
--

CREATE TABLE `publikasi_dosen` (
  `id_publikasidosen` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `judul_jurnal` varchar(100) NOT NULL,
  `nama_jurnal` varchar(100) NOT NULL,
  `id_jurnalindex` int(11) NOT NULL,
  `peringkat_jurnal` int(11) NOT NULL,
  `tgl_publish` date NOT NULL,
  `institusi_penerbit` varchar(100) NOT NULL,
  `file_jurnal` varchar(100) DEFAULT NULL,
  `jumlah_sitasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publikasi_dosen`
--

INSERT INTO `publikasi_dosen` (`id_publikasidosen`, `nip`, `judul_jurnal`, `nama_jurnal`, `id_jurnalindex`, `peringkat_jurnal`, `tgl_publish`, `institusi_penerbit`, `file_jurnal`, `jumlah_sitasi`) VALUES
(3, '6152738712', 'Jurnal TRPL', 'TRPL Jurnal', 1, 7, '2021-07-24', 'Politeknik Negeri Bali', 'publikasi_dosen_6152738712_3.pdf', 1),
(5, '323280238', 'Jurnal Pak Chandra', 'Pak Chandra punya', 1, 2, '2022-02-22', 'Politeknik Negeri Bali', 'publikasi_dosen_323280238_5.pdf', 2),
(6, '232343213', 'testttt', 'testtt', 1, 2, '2022-10-20', 'PNB', 'publikasi_dosen_232343213_6.pdf', 3);

-- --------------------------------------------------------

--
-- Table structure for table `publikasi_mhs`
--

CREATE TABLE `publikasi_mhs` (
  `id_publikasimhs` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `judul_jurnal` varchar(100) NOT NULL,
  `nama_jurnal` varchar(100) NOT NULL,
  `id_jurnalindex` int(11) NOT NULL,
  `peringkat_jurnal` int(11) NOT NULL,
  `tgl_publish` date NOT NULL,
  `institusi_penerbit` varchar(100) NOT NULL,
  `file_jurnal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publikasi_mhs`
--

INSERT INTO `publikasi_mhs` (`id_publikasimhs`, `nim`, `judul_jurnal`, `nama_jurnal`, `id_jurnalindex`, `peringkat_jurnal`, `tgl_publish`, `institusi_penerbit`, `file_jurnal`) VALUES
(3, '2015354007', 'Jurnal Kelas', 'Kelas A', 4, 9, '2022-02-19', 'Politeknik Negeri Bali', 'publikasi_mhs_2015354007_3.pdf'),
(5, '2015354008', 'Jurnal Contoh', 'Contoh', 1, 1, '2022-02-15', 'PNB', 'publikasi_mhs_2015354008_5.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `rekognisi`
--

CREATE TABLE `rekognisi` (
  `id` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `rekognisi` varchar(200) NOT NULL,
  `tingkat` enum('wilayah','nasional','internasional') NOT NULL,
  `tahun` year(4) NOT NULL,
  `file_sk` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekognisi`
--

INSERT INTO `rekognisi` (`id`, `nip`, `rekognisi`, `tingkat`, `tahun`, `file_sk`) VALUES
(1, '323280238', 'test rekognisi', 'internasional', 2022, 'rekognisi_323280238_1.pdf'),
(3, '6152738712', 'mantap', 'nasional', 2021, 'rekognisi_6152738712_3.pdf'),
(4, '232343213', 'yuhuu', 'nasional', 2022, 'rekognisi_232343213_4.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `teknologi_tepat_guna`
--

CREATE TABLE `teknologi_tepat_guna` (
  `id` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` varchar(2000) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teknologi_tepat_guna`
--

INSERT INTO `teknologi_tepat_guna` (`id`, `nip`, `judul`, `deskripsi`, `tahun`) VALUES
(1, '6152738712', 'Contoh judul', 'contoh deskripsi', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_dokumen`
--

CREATE TABLE `tipe_dokumen` (
  `id_tipe` int(11) NOT NULL,
  `nama_tipe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_dokumen`
--

INSERT INTO `tipe_dokumen` (`id_tipe`, `nama_tipe`) VALUES
(1, 'proposal'),
(3, 'tugas akhir');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','dosen','mahasiswa','guest') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `level`) VALUES
(3, 'admin@gmail.com', '$2y$12$gP0lNd6u4iSmeXLhIWU.POezO6PuhfJKoEKkTDKp1MFmAQxl7.BoK', 'admin'),
(8, 'pakeddy@gmail.com', '$2y$12$OGurcRsktRFgHKqTzqqZYeihsvfhJ8QRFuiH1CawLq4fXAgzV8F9a', 'dosen'),
(9, 'pakchandra@gmail.com', '$2y$12$/zRktRjg0.AAJgiyp21n1OwoC8ooMk7tEgmA0z1GeLOg2bPrCA1fO', 'dosen'),
(10, 'kadeksuryaindrawan@gmail.com', '$2y$12$17oEGdFxMTSakvUnwF1qYOr7SHwkl6VRRX6cfJOWUxBmVjnCUT69i', 'admin'),
(11, 'adminprodi@gmail.com', '$2y$12$Cb55xCjH4u3X7HIgCYE/O.pY65f4C79N9/vwoex8r5YoY9hXLSpgS', 'admin'),
(12, 'kadektempeh@gmail.com', '$2y$12$bTGik0G29zEJzYU8MhRCiudgUFrJKmhfX1eVvFihCCAZvCGETdes6', 'mahasiswa'),
(15, 'test1@gmail.com', '$2y$12$uplGRnfbW3uqZ6/pQ7TvQOvN23Bna.80Bfg3HfyalHKW66es8OJdi', 'admin'),
(16, 'test123@gmail.com', '$2y$12$TcAjtXMjsDak7adO1hn75OeC/2cr03EzSTqLD58zRr79vKfbcGgGm', 'dosen'),
(17, 'kadeksurya123@gmail.com', '$2y$12$Ig.jLgube9YSziYhGk67Ze3qL74QdJDPXOUUZkPZ2WIT83w5xcsTO', 'mahasiswa'),
(18, 'gilang@gmail.com', '$2y$12$Ww5RnIkLa16b1txTh7ySG.eILx0aQYxITZttu.3a3XmIuE.Y3EaU2', 'dosen'),
(19, 'guest@gmail.com', '$2y$12$OMh3TUVSbSsgsT2Zm0F.YeLM.k.h052GZfAw4JT8bV7q.b3r.Pb4K', 'guest'),
(22, 'indrawan@gmail.com', '$2y$12$oZUT7AvgxreneXdNC0SGNOPBKQzijsQun85BO6ZXG0OegCQuRtJhy', 'dosen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`),
  ADD KEY `fk_tipe_dokumen` (`id_tipe`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `fk_kode_prodi` (`prodi`),
  ADD KEY `jabatan_akademik` (`jabatan_akademik`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `dosen_industri`
--
ALTER TABLE `dosen_industri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ewmp`
--
ALTER TABLE `ewmp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `haki_dosen`
--
ALTER TABLE `haki_dosen`
  ADD PRIMARY KEY (`id_hakidosen`),
  ADD KEY `fk_nip_haki` (`nip`);

--
-- Indexes for table `haki_mahasiswa`
--
ALTER TABLE `haki_mahasiswa`
  ADD PRIMARY KEY (`id_hakimhs`),
  ADD KEY `fk_nim_haki` (`nim`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnal_index`
--
ALTER TABLE `jurnal_index`
  ADD PRIMARY KEY (`id_jurnalindex`);

--
-- Indexes for table `kompetensi`
--
ALTER TABLE `kompetensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `fk_prodi_mhs` (`prodi`);

--
-- Indexes for table `mengajar`
--
ALTER TABLE `mengajar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`,`kode_prodi`),
  ADD KEY `kode_prodi` (`kode_prodi`);

--
-- Indexes for table `pembimbing_utama`
--
ALTER TABLE `pembimbing_utama`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`,`kode_prodi`),
  ADD KEY `id_prodi` (`kode_prodi`);

--
-- Indexes for table `penelitian`
--
ALTER TABLE `penelitian`
  ADD PRIMARY KEY (`id_penelitian`),
  ADD KEY `fk_penelitian_nip` (`nip`);

--
-- Indexes for table `pengabdian`
--
ALTER TABLE `pengabdian`
  ADD PRIMARY KEY (`id_pengabdian`),
  ADD KEY `fk_pengabdian_dosen` (`nip`);

--
-- Indexes for table `peringkat_jurnal`
--
ALTER TABLE `peringkat_jurnal`
  ADD PRIMARY KEY (`id_peringkatjurnal`),
  ADD KEY `fk_jurnalindex` (`id_jurnalindex`);

--
-- Indexes for table `prestasi_mhs`
--
ALTER TABLE `prestasi_mhs`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `fk_prestasi_nim` (`nim`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kode_prodi`);

--
-- Indexes for table `produk_dosen`
--
ALTER TABLE `produk_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `publikasi_buku`
--
ALTER TABLE `publikasi_buku`
  ADD PRIMARY KEY (`id_publikasibuku`),
  ADD KEY `fk_buku_nip` (`nip`);

--
-- Indexes for table `publikasi_dosen`
--
ALTER TABLE `publikasi_dosen`
  ADD PRIMARY KEY (`id_publikasidosen`),
  ADD KEY `fk_nip_publikasi` (`nip`),
  ADD KEY `fk_jurnal_index` (`id_jurnalindex`),
  ADD KEY `fk_peringkatjurnal` (`peringkat_jurnal`);

--
-- Indexes for table `publikasi_mhs`
--
ALTER TABLE `publikasi_mhs`
  ADD PRIMARY KEY (`id_publikasimhs`),
  ADD KEY `fk_nim_publikasi` (`nim`),
  ADD KEY `fk_jurnal_index_mhs` (`id_jurnalindex`),
  ADD KEY `fk_peringkatjurnalmhs` (`peringkat_jurnal`);

--
-- Indexes for table `rekognisi`
--
ALTER TABLE `rekognisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teknologi_tepat_guna`
--
ALTER TABLE `teknologi_tepat_guna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_dokumen`
--
ALTER TABLE `tipe_dokumen`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dosen_industri`
--
ALTER TABLE `dosen_industri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ewmp`
--
ALTER TABLE `ewmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `haki_dosen`
--
ALTER TABLE `haki_dosen`
  MODIFY `id_hakidosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `haki_mahasiswa`
--
ALTER TABLE `haki_mahasiswa`
  MODIFY `id_hakimhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jurnal_index`
--
ALTER TABLE `jurnal_index`
  MODIFY `id_jurnalindex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kompetensi`
--
ALTER TABLE `kompetensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mengajar`
--
ALTER TABLE `mengajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembimbing_utama`
--
ALTER TABLE `pembimbing_utama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penelitian`
--
ALTER TABLE `penelitian`
  MODIFY `id_penelitian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengabdian`
--
ALTER TABLE `pengabdian`
  MODIFY `id_pengabdian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peringkat_jurnal`
--
ALTER TABLE `peringkat_jurnal`
  MODIFY `id_peringkatjurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prestasi_mhs`
--
ALTER TABLE `prestasi_mhs`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk_dosen`
--
ALTER TABLE `produk_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `publikasi_buku`
--
ALTER TABLE `publikasi_buku`
  MODIFY `id_publikasibuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `publikasi_dosen`
--
ALTER TABLE `publikasi_dosen`
  MODIFY `id_publikasidosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `publikasi_mhs`
--
ALTER TABLE `publikasi_mhs`
  MODIFY `id_publikasimhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rekognisi`
--
ALTER TABLE `rekognisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teknologi_tepat_guna`
--
ALTER TABLE `teknologi_tepat_guna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipe_dokumen`
--
ALTER TABLE `tipe_dokumen`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `fk_tipe_dokumen` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_dokumen` (`id_tipe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `fk_kode_prodi` FOREIGN KEY (`prodi`) REFERENCES `prodi` (`kode_prodi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ewmp`
--
ALTER TABLE `ewmp`
  ADD CONSTRAINT `ewmp_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`);

--
-- Constraints for table `haki_dosen`
--
ALTER TABLE `haki_dosen`
  ADD CONSTRAINT `fk_nip_haki` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `haki_mahasiswa`
--
ALTER TABLE `haki_mahasiswa`
  ADD CONSTRAINT `fk_nim_haki` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kompetensi`
--
ALTER TABLE `kompetensi`
  ADD CONSTRAINT `kompetensi_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_prodi_mhs` FOREIGN KEY (`prodi`) REFERENCES `prodi` (`kode_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mengajar`
--
ALTER TABLE `mengajar`
  ADD CONSTRAINT `mengajar_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`),
  ADD CONSTRAINT `mengajar_ibfk_2` FOREIGN KEY (`kode_prodi`) REFERENCES `prodi` (`kode_prodi`);

--
-- Constraints for table `pembimbing_utama`
--
ALTER TABLE `pembimbing_utama`
  ADD CONSTRAINT `pembimbing_utama_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`),
  ADD CONSTRAINT `pembimbing_utama_ibfk_2` FOREIGN KEY (`kode_prodi`) REFERENCES `prodi` (`kode_prodi`);

--
-- Constraints for table `penelitian`
--
ALTER TABLE `penelitian`
  ADD CONSTRAINT `fk_penelitian_nip` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengabdian`
--
ALTER TABLE `pengabdian`
  ADD CONSTRAINT `fk_pengabdian_dosen` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peringkat_jurnal`
--
ALTER TABLE `peringkat_jurnal`
  ADD CONSTRAINT `fk_jurnalindex` FOREIGN KEY (`id_jurnalindex`) REFERENCES `jurnal_index` (`id_jurnalindex`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prestasi_mhs`
--
ALTER TABLE `prestasi_mhs`
  ADD CONSTRAINT `fk_prestasi_nim` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk_dosen`
--
ALTER TABLE `produk_dosen`
  ADD CONSTRAINT `produk_dosen_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`);

--
-- Constraints for table `publikasi_buku`
--
ALTER TABLE `publikasi_buku`
  ADD CONSTRAINT `fk_buku_nip` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `publikasi_dosen`
--
ALTER TABLE `publikasi_dosen`
  ADD CONSTRAINT `fk_jurnal_index` FOREIGN KEY (`id_jurnalindex`) REFERENCES `jurnal_index` (`id_jurnalindex`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nip_publikasi` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_peringkatjurnal` FOREIGN KEY (`peringkat_jurnal`) REFERENCES `peringkat_jurnal` (`id_peringkatjurnal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `publikasi_mhs`
--
ALTER TABLE `publikasi_mhs`
  ADD CONSTRAINT `fk_jurnal_index_mhs` FOREIGN KEY (`id_jurnalindex`) REFERENCES `jurnal_index` (`id_jurnalindex`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nim_publikasi` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_peringkatjurnalmhs` FOREIGN KEY (`peringkat_jurnal`) REFERENCES `peringkat_jurnal` (`id_peringkatjurnal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
