CREATE DATABASE  IF NOT EXISTS `aps_c4` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `aps_c4`;
-- MariaDB dump 10.17  Distrib 10.4.13-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: aps_c4
-- ------------------------------------------------------
-- Server version	10.4.13-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dokumen`
--

DROP TABLE IF EXISTS `dokumen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipe` int(11) NOT NULL,
  `nama_dokumen` varchar(200) NOT NULL,
  `tgl_dokumen` date NOT NULL,
  `file_pdf` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `fk_tipe_dokumen` (`id_tipe`),
  CONSTRAINT `fk_tipe_dokumen` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_dokumen` (`id_tipe`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dokumen`
--

LOCK TABLES `dokumen` WRITE;
/*!40000 ALTER TABLE `dokumen` DISABLE KEYS */;
INSERT INTO `dokumen` VALUES (1,1,'penyerahan piala','2022-01-13','dokumen_penyerahan piala_1.pdf'),(3,3,'tugas akhir mahasiswa','2022-01-11','dokumen_tugas akhir mahasiswa_3.pdf');
/*!40000 ALTER TABLE `dokumen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dosen`
--

DROP TABLE IF EXISTS `dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dosen` (
  `nip` varchar(25) NOT NULL,
  `nidn` varchar(25) NOT NULL,
  `nama_dosen` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prodi` int(11) NOT NULL,
  `pendidikan_terakhir` varchar(200) NOT NULL,
  `bidang_keahlian` varchar(200) NOT NULL,
  `DTPS` enum('y','n') NOT NULL,
  `jabatan_akademik` int(11) NOT NULL,
  `nomor_serdos` varchar(50) NOT NULL,
  `kesesuaian_bidang` enum('y','n') NOT NULL,
  `status_dosen` enum('tetap','tidak_tetap') NOT NULL,
  PRIMARY KEY (`nip`),
  KEY `fk_kode_prodi` (`prodi`),
  KEY `jabatan_akademik` (`jabatan_akademik`),
  CONSTRAINT `fk_kode_prodi` FOREIGN KEY (`prodi`) REFERENCES `prodi` (`kode_prodi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dosen`
--

LOCK TABLES `dosen` WRITE;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
INSERT INTO `dosen` VALUES ('237238732','32872873827','Gilang','DPS','29389283',18,2331212,'','','y',0,'','y','tetap'),('323280238','12345678','Pak Chandra','Kuta','0823723821',9,2321232,'','','y',0,'','y','tetap'),('6152738712','231232332','Pak Eddy','DPS','089754789237',8,889273,'','','y',0,'','y','tetap'),('72637263271','7823782281','dosen test','Denpasar','08782372812',16,736482,'','','y',0,'','y','tetap');
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dosen_industri`
--

DROP TABLE IF EXISTS `dosen_industri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dosen_industri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nidk` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pendidikan_terakhir` varchar(100) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `list_sertifikat` varchar(100) NOT NULL,
  `list_matakuliah` varchar(100) NOT NULL,
  `bobot_sks` float NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `tahun` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dosen_industri`
--

LOCK TABLES `dosen_industri` WRITE;
/*!40000 ALTER TABLE `dosen_industri` DISABLE KEYS */;
/*!40000 ALTER TABLE `dosen_industri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ewmp`
--

DROP TABLE IF EXISTS `ewmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ewmp` (
  `id` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `tahun` year(4) NOT NULL,
  `pendidikan_prodi` varchar(200) NOT NULL,
  `pendidikan_prodi_lain` varchar(200) NOT NULL,
  `pendidikan_pt_luar` varchar(200) NOT NULL,
  `penelitian` varchar(200) NOT NULL,
  `pkm` varchar(200) NOT NULL,
  `penunjang` varchar(200) NOT NULL,
  KEY `nip` (`nip`),
  CONSTRAINT `ewmp_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ewmp`
--

LOCK TABLES `ewmp` WRITE;
/*!40000 ALTER TABLE `ewmp` DISABLE KEYS */;
/*!40000 ALTER TABLE `ewmp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `haki_dosen`
--

DROP TABLE IF EXISTS `haki_dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `haki_dosen` (
  `id_hakidosen` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(25) NOT NULL,
  `judul_haki` varchar(200) NOT NULL,
  `tgl_terdaftar` date NOT NULL,
  `no_haki` int(11) NOT NULL,
  `file_sertif` varchar(100) DEFAULT NULL,
  `anggota` varchar(200) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  PRIMARY KEY (`id_hakidosen`),
  KEY `fk_nip_haki` (`nip`),
  CONSTRAINT `fk_nip_haki` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `haki_dosen`
--

LOCK TABLES `haki_dosen` WRITE;
/*!40000 ALTER TABLE `haki_dosen` DISABLE KEYS */;
INSERT INTO `haki_dosen` VALUES (3,'323280238','HAKI TEST','2022-01-14',22,'haki_dosen_323280238_3.pdf','surya indrawan',''),(5,'6152738712','HAKI BERTAHAN HIDUP','2022-02-17',23321212,'haki_dosen_6152738712_5.pdf','wadwadwadwa','');
/*!40000 ALTER TABLE `haki_dosen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `haki_mahasiswa`
--

DROP TABLE IF EXISTS `haki_mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `haki_mahasiswa` (
  `id_hakimhs` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(25) NOT NULL,
  `judul_haki` varchar(200) NOT NULL,
  `tgl_terdaftar` date NOT NULL,
  `no_haki` int(11) NOT NULL,
  `file_sertif` varchar(100) DEFAULT NULL,
  `anggota` varchar(200) NOT NULL,
  PRIMARY KEY (`id_hakimhs`),
  KEY `fk_nim_haki` (`nim`),
  CONSTRAINT `fk_nim_haki` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `haki_mahasiswa`
--

LOCK TABLES `haki_mahasiswa` WRITE;
/*!40000 ALTER TABLE `haki_mahasiswa` DISABLE KEYS */;
INSERT INTO `haki_mahasiswa` VALUES (2,'2015354007','HAKI WEB','2022-01-07',7,'haki_mhs_2015354007_2.pdf','surya,riski,gilang'),(4,'2015354008','HAKI Contoh','2022-02-21',23231231,'haki_mhs_2015354008_4.pdf','Saya sendiri');
/*!40000 ALTER TABLE `haki_mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `jabatan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `dosen` (`jabatan_akademik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatan`
--

LOCK TABLES `jabatan` WRITE;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jurnal_index`
--

DROP TABLE IF EXISTS `jurnal_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jurnal_index` (
  `id_jurnalindex` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurnalindex` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jurnalindex`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jurnal_index`
--

LOCK TABLES `jurnal_index` WRITE;
/*!40000 ALTER TABLE `jurnal_index` DISABLE KEYS */;
INSERT INTO `jurnal_index` VALUES (1,'SINTA'),(3,'SCOPUS'),(4,'Web Of Science');
/*!40000 ALTER TABLE `jurnal_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kopetensi`
--

DROP TABLE IF EXISTS `kopetensi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kopetensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_sertif` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama_sertif` varchar(100) NOT NULL,
  `tanggal_berlaku` date NOT NULL,
  `file_bukti` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nip` (`nip`),
  CONSTRAINT `kopetensi_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kopetensi`
--

LOCK TABLES `kopetensi` WRITE;
/*!40000 ALTER TABLE `kopetensi` DISABLE KEYS */;
/*!40000 ALTER TABLE `kopetensi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mahasiswa` (
  `nim` varchar(25) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `tahun_diterima` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prodi` int(11) NOT NULL,
  PRIMARY KEY (`nim`),
  KEY `fk_prodi_mhs` (`prodi`),
  CONSTRAINT `fk_prodi_mhs` FOREIGN KEY (`prodi`) REFERENCES `prodi` (`kode_prodi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa`
--

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` VALUES ('2015354007','I Kadek Surya Indrawan','Denpasar Selatan','08970945425',2020,12,889273),('2015354008','I Kadek Surya','Pemogan','081238883199',2020,17,2321232);
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mengajar`
--

DROP TABLE IF EXISTS `mengajar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mengajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(25) NOT NULL,
  `nama_matakuliah` int(11) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `tahun_akademik` year(4) NOT NULL,
  `kode_prodi` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nip` (`nip`,`kode_prodi`),
  KEY `kode_prodi` (`kode_prodi`),
  CONSTRAINT `mengajar_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`),
  CONSTRAINT `mengajar_ibfk_2` FOREIGN KEY (`kode_prodi`) REFERENCES `prodi` (`kode_prodi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mengajar`
--

LOCK TABLES `mengajar` WRITE;
/*!40000 ALTER TABLE `mengajar` DISABLE KEYS */;
/*!40000 ALTER TABLE `mengajar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembimbing_utama`
--

DROP TABLE IF EXISTS `pembimbing_utama`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembimbing_utama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(25) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `jumlah_bimbingan` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nip` (`nip`,`id_prodi`),
  KEY `id_prodi` (`id_prodi`),
  CONSTRAINT `pembimbing_utama_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`),
  CONSTRAINT `pembimbing_utama_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`kode_prodi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembimbing_utama`
--

LOCK TABLES `pembimbing_utama` WRITE;
/*!40000 ALTER TABLE `pembimbing_utama` DISABLE KEYS */;
/*!40000 ALTER TABLE `pembimbing_utama` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penelitian`
--

DROP TABLE IF EXISTS `penelitian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penelitian` (
  `id_penelitian` int(11) NOT NULL AUTO_INCREMENT,
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
  `nim` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_penelitian`),
  KEY `fk_penelitian_nip` (`nip`),
  CONSTRAINT `fk_penelitian_nip` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penelitian`
--

LOCK TABLES `penelitian` WRITE;
/*!40000 ALTER TABLE `penelitian` DISABLE KEYS */;
INSERT INTO `penelitian` VALUES (3,'Penelitian Bunga Anggrek',2021,'Denpasar','323280238','Surya Indrawan',2000000,'DRPMDIKTI','penelitian_proposal_323280238_3.pdf','penelitian_laporan_323280238_3.pdf','terverifikasi',NULL),(4,'Penelitian Bunga Mawar',2018,'Ubud','6152738712','Surya Riski',5000000,'SWADANA','penelitian_proposal_6152738712_4.pdf','penelitian_laporan_6152738712_4.pdf','belum terverifikasi',NULL),(7,'Penelitian Anak',2022,'Denpasar','323280238','Surya Indrawan',1000000,'SWADANA','penelitian_proposal_323280238_7.pdf','penelitian_laporan_323280238_7.pdf','belum terverifikasi','2015354007'),(8,'Penelitian Contoh',2022,'Denpasar','323280238','surya kadek',5000000,'DRPMDIKTI','penelitian_proposal_323280238_8.pdf','penelitian_laporan_323280238_8.pdf','belum terverifikasi','2015354008');
/*!40000 ALTER TABLE `penelitian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengabdian`
--

DROP TABLE IF EXISTS `pengabdian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengabdian` (
  `id_pengabdian` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengabdian` varchar(100) NOT NULL,
  `tgl_pengabdian` date NOT NULL,
  `tempat_pengabdian` varchar(100) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `dana` int(11) NOT NULL,
  `sumber_dana` varchar(100) NOT NULL,
  `file_proposal` varchar(100) DEFAULT NULL,
  `file_laporan` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pengabdian`),
  KEY `fk_pengabdian_dosen` (`nip`),
  CONSTRAINT `fk_pengabdian_dosen` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengabdian`
--

LOCK TABLES `pengabdian` WRITE;
/*!40000 ALTER TABLE `pengabdian` DISABLE KEYS */;
INSERT INTO `pengabdian` VALUES (1,'Pengabdian desa pemogan','2022-01-15','Denpasar','72637263271',2000000,'DIPA','pengabdian_proposal_72637263271_1.pdf','pengabdian_laporan_72637263271_1.pdf','terverifikasi'),(4,'Pengabdian Biasa','2022-01-29','Denpasar','6152738712',4000000,'SWADANA','pengabdian_proposal_6152738712_4.pdf','pengabdian_laporan_6152738712_4.pdf','belum terverifikasi'),(5,'Pengabdian Di PNB','2022-02-22','Denpasar','323280238',1000000,'SWADANA','pengabdian_proposal_323280238_5.pdf','pengabdian_laporan_323280238_5.pdf','belum terverifikasi');
/*!40000 ALTER TABLE `pengabdian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peringkat_jurnal`
--

DROP TABLE IF EXISTS `peringkat_jurnal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peringkat_jurnal` (
  `id_peringkatjurnal` int(11) NOT NULL AUTO_INCREMENT,
  `id_jurnalindex` int(11) NOT NULL,
  `nama_peringkatjurnal` text NOT NULL,
  `jenis_media_publikasi` varchar(150) NOT NULL,
  PRIMARY KEY (`id_peringkatjurnal`),
  KEY `fk_jurnalindex` (`id_jurnalindex`),
  CONSTRAINT `fk_jurnalindex` FOREIGN KEY (`id_jurnalindex`) REFERENCES `jurnal_index` (`id_jurnalindex`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peringkat_jurnal`
--

LOCK TABLES `peringkat_jurnal` WRITE;
/*!40000 ALTER TABLE `peringkat_jurnal` DISABLE KEYS */;
INSERT INTO `peringkat_jurnal` VALUES (1,1,'sinta 1',''),(2,1,'sinta 2',''),(3,3,'q 1',''),(4,3,'q 2',''),(6,3,'q 3',''),(7,1,'sinta 3',''),(8,4,'web 1',''),(9,4,'web 2','');
/*!40000 ALTER TABLE `peringkat_jurnal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prestasi_mhs`
--

DROP TABLE IF EXISTS `prestasi_mhs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prestasi_mhs` (
  `id_prestasi` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(25) NOT NULL,
  `nama_event` varchar(100) NOT NULL,
  `tahun_event` int(11) NOT NULL,
  `peringkat` int(11) NOT NULL,
  `tingkat` varchar(25) NOT NULL,
  `file_sertif` varchar(100) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id_prestasi`),
  KEY `fk_prestasi_nim` (`nim`),
  CONSTRAINT `fk_prestasi_nim` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestasi_mhs`
--

LOCK TABLES `prestasi_mhs` WRITE;
/*!40000 ALTER TABLE `prestasi_mhs` DISABLE KEYS */;
INSERT INTO `prestasi_mhs` VALUES (6,'2015354007','PNBWDC',2020,2,'politeknik','prestasi_2015354007_6.pdf','Akademik'),(7,'2015354008','INTECHFEST',2021,3,'nasional','prestasi_2015354008_7.pdf','Akademik');
/*!40000 ALTER TABLE `prestasi_mhs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodi`
--

DROP TABLE IF EXISTS `prodi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `status_dosen` enum('tetap','tidak_tetap') NOT NULL,
  PRIMARY KEY (`kode_prodi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodi`
--

LOCK TABLES `prodi` WRITE;
/*!40000 ALTER TABLE `prodi` DISABLE KEYS */;
INSERT INTO `prodi` VALUES (736482,'D4 TEST','72637263271','','','Y','','','Y','tetap'),(889273,'D4 TRPL','6152738712','','','Y','','','Y','tetap'),(2321232,'D3 Manajemen Informatika','323280238','','','Y','','','Y','tetap'),(2331212,'D4 Teknik Otomasi','','','','Y','','','Y','tetap');
/*!40000 ALTER TABLE `prodi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produk_dosen`
--

DROP TABLE IF EXISTS `produk_dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produk_dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(25) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `deskripsi` varchar(2000) NOT NULL,
  `file_bukti` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nip` (`nip`),
  CONSTRAINT `produk_dosen_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produk_dosen`
--

LOCK TABLES `produk_dosen` WRITE;
/*!40000 ALTER TABLE `produk_dosen` DISABLE KEYS */;
/*!40000 ALTER TABLE `produk_dosen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publikasi_buku`
--

DROP TABLE IF EXISTS `publikasi_buku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publikasi_buku` (
  `id_publikasibuku` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(25) NOT NULL,
  `penulis_buku` varchar(200) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `isbn` varchar(17) NOT NULL,
  PRIMARY KEY (`id_publikasibuku`),
  KEY `fk_buku_nip` (`nip`),
  CONSTRAINT `fk_buku_nip` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publikasi_buku`
--

LOCK TABLES `publikasi_buku` WRITE;
/*!40000 ALTER TABLE `publikasi_buku` DISABLE KEYS */;
INSERT INTO `publikasi_buku` VALUES (1,'6152738712','surya indrawan, surya kadek','Laskar Pelangi','gramedia',2020,'belum terverifikasi',''),(3,'323280238','saya sendiri','Sang Pemimpi','gramedia',2019,'terverifikasi','');
/*!40000 ALTER TABLE `publikasi_buku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publikasi_dosen`
--

DROP TABLE IF EXISTS `publikasi_dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publikasi_dosen` (
  `id_publikasidosen` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(25) NOT NULL,
  `judul_jurnal` varchar(100) NOT NULL,
  `nama_jurnal` varchar(100) NOT NULL,
  `id_jurnalindex` int(11) NOT NULL,
  `peringkat_jurnal` int(11) NOT NULL,
  `tgl_publish` date NOT NULL,
  `institusi_penerbit` varchar(100) NOT NULL,
  `file_jurnal` varchar(100) DEFAULT NULL,
  `jumlah_sitasi` int(11) NOT NULL,
  PRIMARY KEY (`id_publikasidosen`),
  KEY `fk_nip_publikasi` (`nip`),
  KEY `fk_jurnal_index` (`id_jurnalindex`),
  KEY `fk_peringkatjurnal` (`peringkat_jurnal`),
  CONSTRAINT `fk_jurnal_index` FOREIGN KEY (`id_jurnalindex`) REFERENCES `jurnal_index` (`id_jurnalindex`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_nip_publikasi` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_peringkatjurnal` FOREIGN KEY (`peringkat_jurnal`) REFERENCES `peringkat_jurnal` (`id_peringkatjurnal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publikasi_dosen`
--

LOCK TABLES `publikasi_dosen` WRITE;
/*!40000 ALTER TABLE `publikasi_dosen` DISABLE KEYS */;
INSERT INTO `publikasi_dosen` VALUES (3,'6152738712','Jurnal TRPL','TRPL Jurnal',1,7,'2022-02-22','Politeknik Negeri Bali','publikasi_dosen_6152738712_3.pdf',0),(5,'323280238','Jurnal Pak Chandra','Pak Chandra punya',1,2,'2022-02-22','Politeknik Negeri Bali','publikasi_dosen_323280238_5.pdf',0);
/*!40000 ALTER TABLE `publikasi_dosen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publikasi_mhs`
--

DROP TABLE IF EXISTS `publikasi_mhs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publikasi_mhs` (
  `id_publikasimhs` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(25) NOT NULL,
  `judul_jurnal` varchar(100) NOT NULL,
  `nama_jurnal` varchar(100) NOT NULL,
  `id_jurnalindex` int(11) NOT NULL,
  `peringkat_jurnal` int(11) NOT NULL,
  `tgl_publish` date NOT NULL,
  `institusi_penerbit` varchar(100) NOT NULL,
  `file_jurnal` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_publikasimhs`),
  KEY `fk_nim_publikasi` (`nim`),
  KEY `fk_jurnal_index_mhs` (`id_jurnalindex`),
  KEY `fk_peringkatjurnalmhs` (`peringkat_jurnal`),
  CONSTRAINT `fk_jurnal_index_mhs` FOREIGN KEY (`id_jurnalindex`) REFERENCES `jurnal_index` (`id_jurnalindex`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_nim_publikasi` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_peringkatjurnalmhs` FOREIGN KEY (`peringkat_jurnal`) REFERENCES `peringkat_jurnal` (`id_peringkatjurnal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publikasi_mhs`
--

LOCK TABLES `publikasi_mhs` WRITE;
/*!40000 ALTER TABLE `publikasi_mhs` DISABLE KEYS */;
INSERT INTO `publikasi_mhs` VALUES (3,'2015354007','Jurnal Kelas','Kelas A',4,9,'2022-02-19','Politeknik Negeri Bali','publikasi_mhs_2015354007_3.pdf'),(5,'2015354008','Jurnal Contoh','Contoh',1,1,'2022-02-15','PNB','publikasi_mhs_2015354008_5.pdf');
/*!40000 ALTER TABLE `publikasi_mhs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rekognisi`
--

DROP TABLE IF EXISTS `rekognisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rekognisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(25) NOT NULL,
  `rekognisi` varchar(200) NOT NULL,
  `tingkat` enum('wilayah','nasional','internasional') NOT NULL,
  `tahun` year(4) NOT NULL,
  `file_sk` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rekognisi`
--

LOCK TABLES `rekognisi` WRITE;
/*!40000 ALTER TABLE `rekognisi` DISABLE KEYS */;
/*!40000 ALTER TABLE `rekognisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teknologi_tepat_guna`
--

DROP TABLE IF EXISTS `teknologi_tepat_guna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teknologi_tepat_guna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(25) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` varchar(2000) NOT NULL,
  `tahun` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teknologi_tepat_guna`
--

LOCK TABLES `teknologi_tepat_guna` WRITE;
/*!40000 ALTER TABLE `teknologi_tepat_guna` DISABLE KEYS */;
/*!40000 ALTER TABLE `teknologi_tepat_guna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipe_dokumen`
--

DROP TABLE IF EXISTS `tipe_dokumen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipe_dokumen` (
  `id_tipe` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tipe` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipe`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipe_dokumen`
--

LOCK TABLES `tipe_dokumen` WRITE;
/*!40000 ALTER TABLE `tipe_dokumen` DISABLE KEYS */;
INSERT INTO `tipe_dokumen` VALUES (1,'proposal'),(3,'tugas akhir');
/*!40000 ALTER TABLE `tipe_dokumen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','dosen','mahasiswa','guest') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'admin@gmail.com','$2y$12$gP0lNd6u4iSmeXLhIWU.POezO6PuhfJKoEKkTDKp1MFmAQxl7.BoK','admin'),(8,'pakeddy@gmail.com','$2y$12$OGurcRsktRFgHKqTzqqZYeihsvfhJ8QRFuiH1CawLq4fXAgzV8F9a','dosen'),(9,'pakchandra@gmail.com','$2y$12$/zRktRjg0.AAJgiyp21n1OwoC8ooMk7tEgmA0z1GeLOg2bPrCA1fO','dosen'),(10,'kadeksuryaindrawan@gmail.com','$2y$12$17oEGdFxMTSakvUnwF1qYOr7SHwkl6VRRX6cfJOWUxBmVjnCUT69i','admin'),(11,'adminprodi@gmail.com','$2y$12$Cb55xCjH4u3X7HIgCYE/O.pY65f4C79N9/vwoex8r5YoY9hXLSpgS','admin'),(12,'kadektempeh@gmail.com','$2y$12$bTGik0G29zEJzYU8MhRCiudgUFrJKmhfX1eVvFihCCAZvCGETdes6','mahasiswa'),(15,'test1@gmail.com','$2y$12$uplGRnfbW3uqZ6/pQ7TvQOvN23Bna.80Bfg3HfyalHKW66es8OJdi','admin'),(16,'test123@gmail.com','$2y$12$TcAjtXMjsDak7adO1hn75OeC/2cr03EzSTqLD58zRr79vKfbcGgGm','dosen'),(17,'kadeksurya123@gmail.com','$2y$12$Ig.jLgube9YSziYhGk67Ze3qL74QdJDPXOUUZkPZ2WIT83w5xcsTO','mahasiswa'),(18,'gilang@gmail.com','$2y$12$Ww5RnIkLa16b1txTh7ySG.eILx0aQYxITZttu.3a3XmIuE.Y3EaU2','dosen'),(19,'guest@gmail.com','$2y$12$OMh3TUVSbSsgsT2Zm0F.YeLM.k.h052GZfAw4JT8bV7q.b3r.Pb4K','guest');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'aps_c4'
--

--
-- Dumping routines for database 'aps_c4'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-25 10:07:34
