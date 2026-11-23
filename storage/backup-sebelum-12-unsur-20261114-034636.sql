-- MySQL dump 10.13  Distrib 8.4.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: u685089215_skmBappelitMhl
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `2023`
--

DROP TABLE IF EXISTS `2023`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `2023` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `jenkel` varchar(15) NOT NULL,
  `usia` int(11) NOT NULL,
  `nohp` varchar(16) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `u1` int(11) NOT NULL,
  `u2` int(11) NOT NULL,
  `u3` int(11) NOT NULL,
  `u4` int(11) NOT NULL,
  `u5` int(11) NOT NULL,
  `u6` int(11) NOT NULL,
  `u7` int(11) NOT NULL,
  `u8` int(11) NOT NULL,
  `u9` int(11) NOT NULL,
  `saran` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `2023`
--

LOCK TABLES `2023` WRITE;
/*!40000 ALTER TABLE `2023` DISABLE KEYS */;
/*!40000 ALTER TABLE `2023` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `2024`
--

DROP TABLE IF EXISTS `2024`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `2024` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kodeUnik` varchar(6) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `keperluan` varchar(255) DEFAULT NULL,
  `foto_ktp` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `jenkel` varchar(15) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `nohp` varchar(16) DEFAULT NULL,
  `pendidikan` varchar(20) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `u1` int(11) DEFAULT NULL,
  `u2` int(11) DEFAULT NULL,
  `u3` int(11) DEFAULT NULL,
  `u4` int(11) DEFAULT NULL,
  `u5` int(11) DEFAULT NULL,
  `u6` int(11) DEFAULT NULL,
  `u7` int(11) DEFAULT NULL,
  `u8` int(11) DEFAULT NULL,
  `u9` int(11) DEFAULT NULL,
  `u10` int(11) DEFAULT NULL,
  `u11` int(11) DEFAULT NULL,
  `u12` int(11) DEFAULT NULL,
  `u13` int(11) DEFAULT NULL,
  `u14` int(11) DEFAULT NULL,
  `u15` int(11) DEFAULT NULL,
  `saran` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenisPelayanan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `2024`
--

LOCK TABLES `2024` WRITE;
/*!40000 ALTER TABLE `2024` DISABLE KEYS */;
INSERT INTO `2024` VALUES (1,NULL,'M Guntur Borneo','samarinda',NULL,NULL,'Swasta','Laki - Laki',29,'085224839281','SMA / SMK','6472019201922910',4,4,4,4,4,4,4,4,4,NULL,NULL,NULL,NULL,NULL,NULL,'mantab','2025-06-27 13:35:51','2025-06-27 13:35:51','Pajak 1 Tahunan'),(2,NULL,'jerry triananda','samarinda',NULL,NULL,'Swasta','Laki - Laki',29,'081350602955','SMA / SMK','6472019201922192',4,4,4,4,4,4,4,4,4,NULL,NULL,NULL,NULL,NULL,NULL,'pelayanan sudah sesuai dengan prosedur','2025-08-13 06:46:52','2025-08-13 06:46:52','Pajak 1 Tahunan'),(3,NULL,'reza','jl. ks tubun',NULL,NULL,'Pengusaha','Laki - Laki',29,'082153464358','SMA / SMK','6477777777777777',3,3,3,2,3,3,2,2,3,NULL,NULL,NULL,NULL,NULL,NULL,'tingkatkan pelayanan!','2025-08-13 07:10:35','2025-08-13 07:10:35','Pajak 1 Tahunan'),(4,NULL,'M Guntur Borneo','Ujoh Bilang',NULL,NULL,'Swasta','Laki - Laki',29,'085224302550','SMA / SMK','6472053101990002',4,4,4,4,4,4,4,4,4,NULL,NULL,NULL,NULL,NULL,NULL,'sudah sangat baik','2025-08-19 07:28:27','2025-08-19 07:28:27','Pajak 1 Tahunan'),(5,NULL,'Dominika Devung Jaang','Ujoh Bilang',NULL,NULL,'ASN','Perempuan',41,'081253002998','S2 / S3','6407076506800001',3,3,3,2,3,3,3,3,3,NULL,NULL,NULL,NULL,NULL,NULL,'Agar dipertahankan dan ditingkatkan lagi','2025-09-15 08:33:30','2025-09-15 08:33:30','Pajak 1 Tahunan'),(6,NULL,'Teddy Andrianus Mirah','Ujoh Bilang RT. 15',NULL,NULL,'ASN','Laki - Laki',30,'085250861666','S1 / Setara','6407180503900001',3,3,3,4,3,4,4,1,3,NULL,NULL,NULL,NULL,NULL,NULL,'semoga sarana dan prasara untuk menunjang pekerjaan segera terpenuhi','2025-09-27 13:11:19','2025-09-27 13:11:19','Pajak 1 Tahunan'),(7,NULL,'Elizabeth','Ujoh bilang Rt.13',NULL,NULL,'ASN','Perempuan',30,'082234371984','S1 / Setara','6406026408880003',4,3,3,4,4,3,4,2,4,NULL,NULL,NULL,NULL,NULL,NULL,'Aplikasi Kanal pengaduan dan survei kepuasan masyarakat sudah cukup baik namun kami berharap sarana dan prasarana dapat ditingkatkan lagi demi kenyamanan masyarakat dalam berkoordinasi dan konsultasi langsung dikantor','2025-09-27 13:23:31','2025-09-27 13:23:31','Pajak 1 Tahunan'),(8,NULL,'Veronika Hubung','Memahak Besar RT 005 Kec.Long Bagun Kab.Mahakam Ulu',NULL,NULL,'ASN','Perempuan',41,'081347621877','SMA / SMK','6407034405770001',3,1,3,4,3,3,3,1,4,NULL,NULL,NULL,NULL,NULL,NULL,'Semoga kedepannya lebih baik lagi baik dalam pelayanan maupun tentang sarana dan prasarana, terima kasih.','2025-09-27 13:58:29','2025-09-27 13:58:29','Pajak 1 Tahunan'),(9,NULL,'cornelia sui ngulan buring','Ujoh Bilang',NULL,NULL,'ASN','Perempuan',30,'082157604835','S2 / S3','6407024804930001',3,3,4,4,4,4,4,2,4,NULL,NULL,NULL,NULL,NULL,NULL,'saranan di perbaiki ya terima kasih','2025-10-17 03:51:21','2025-10-17 03:51:21','Pajak 1 Tahunan'),(10,NULL,'NATAN NOVTARAIN TIRTA ADI KUSUMA','Ujoh Bilang',NULL,NULL,'ASN','Laki - Laki',29,'082137397574','D-I / D-III','3403080811000005',4,3,4,4,3,3,3,3,4,NULL,NULL,NULL,NULL,NULL,NULL,'Bagus lanjutkan','2025-10-17 04:23:36','2025-10-17 04:23:36','Pajak 1 Tahunan'),(11,NULL,'Anastasia Tubun','Jl.Poros Kampung Ujoh Bilang Rt.III No 28, Kec.Long Bagun',NULL,NULL,'ASN','Perempuan',41,'082252650454','S1 / Setara','6407075902790001',3,3,3,4,3,4,3,3,2,NULL,NULL,NULL,NULL,NULL,NULL,'saran perbaikan, adanya peningkatan kompotensi pegawai melalui pelatihan tentang pelayanan publik,komunikas dan teknologi informasi. masukan sediakan kotak saran','2025-10-17 04:40:00','2025-10-17 04:40:00','Pajak 1 Tahunan'),(12,NULL,'Mardiana, S.Pd','Kampung laham, RT. 005, kecamatan Laham, kab. Mahakam ulu, kalimantan Timur',NULL,NULL,'ASN','Perempuan',30,'085251562774','S1 / Setara','6407125102900001',4,4,3,4,4,4,4,4,4,NULL,NULL,NULL,NULL,NULL,NULL,'Semua sudah sesuai dengan prosedur pelayanan','2025-10-17 05:44:53','2025-10-17 05:44:53','Pajak 1 Tahunan'),(13,NULL,'Thresia Luhung','Long Melaham RT.02',NULL,NULL,'ASN','Perempuan',30,'081351783597','S1 / Setara','6472034602850011',3,3,3,2,2,3,3,2,3,NULL,NULL,NULL,NULL,NULL,NULL,'Harapan nya agar supaya seluruh pelayanan yg sdh berjalan dgn baik utk lebih di tingkatkan lagi','2025-10-17 06:25:48','2025-10-17 06:25:48','Pajak 1 Tahunan'),(14,NULL,'F. Theresia Soong','Memahak Teboq',NULL,NULL,'ASN','Perempuan',41,'085250601476','S1 / Setara','6407046408790001',3,3,3,4,3,3,3,3,4,NULL,NULL,NULL,NULL,NULL,NULL,'Saran:\r\nTingkatkan kecepatan dan kemudahan dalam proses pelayanan.\r\n\r\nHarapan:\r\nSemoga layanan Inspektorat semakin profesional.','2025-10-17 06:25:50','2025-10-17 06:25:50','Pajak 1 Tahunan'),(15,NULL,'Theresia Inu','Long Hubung Ulu RT.001',NULL,NULL,'ASN','Perempuan',30,'081350604721','D-I / D-III','6407045302860002',2,2,2,3,3,3,3,1,3,NULL,NULL,NULL,NULL,NULL,NULL,'Kedepan lebih transparan dalam segala hal','2025-10-18 04:42:57','2025-10-18 04:42:57','Pajak 1 Tahunan'),(16,NULL,'Novianty','Long Hubung Ulu',NULL,NULL,'ASN','Perempuan',29,'O85338317770','D-I / D-III','7326114411940001',4,4,4,4,3,4,4,4,4,NULL,NULL,NULL,NULL,NULL,NULL,'Tetap melayani dengan Ramah dan penuh tanggung jawab','2025-10-18 04:53:09','2025-10-18 04:53:09','Pajak 1 Tahunan'),(17,NULL,'Ruth Damayanti Dom','Longhubung',NULL,NULL,'ASN','Perempuan',41,'082256476318','SMA / SMK','6407044609820001',3,3,3,4,3,3,4,3,3,NULL,NULL,NULL,NULL,NULL,NULL,'Lebih memperhatikan pelayanan','2025-10-18 04:56:19','2025-10-18 04:56:19','Pajak 1 Tahunan'),(18,NULL,'Solihati','Kampung sirau RT 01',NULL,NULL,'ASN','Perempuan',30,'085250841870','D-I / D-III','6407065305910002',3,3,3,4,3,3,3,2,4,NULL,NULL,NULL,NULL,NULL,NULL,'Semogaa bisa lebih baik lagi dalam memberikan pelayanan','2025-10-18 07:43:02','2025-10-18 07:43:02','Pajak 1 Tahunan'),(19,NULL,'Magdalena Hunyang','Long Hubung RT.04',NULL,NULL,'ASN','Perempuan',30,'082251125551','S1 / Setara','6407046209880001',3,3,3,4,3,3,3,2,4,NULL,NULL,NULL,NULL,NULL,NULL,'Semangat lebih baik lagi','2025-10-18 07:55:18','2025-10-18 07:55:18','Pajak 1 Tahunan'),(20,NULL,'purnama sari buaq','Long hubung,RT.003 kec. Long hubung,kan.mahakam ulu',NULL,NULL,'ASN','Perempuan',30,'081346040619','D-I / D-III','6407046405910001',3,3,3,4,3,3,3,3,4,NULL,NULL,NULL,NULL,NULL,NULL,'Semoga kedepannya lebih baik lagi dan lebih memberikan pelayanan yang maksimal kepada masyarakat','2025-10-18 08:53:55','2025-10-18 08:53:55','Pajak 1 Tahunan'),(21,NULL,'purnama sari buaq','Long hubung,RT.003 kec. Long hubung,kan.mahakam ulu',NULL,NULL,'ASN','Perempuan',30,'081346040619','D-I / D-III','6407046405910001',3,3,3,4,3,3,3,3,4,NULL,NULL,NULL,NULL,NULL,NULL,'Semoga kedepannya lebih baik lagi dan lebih memberikan pelayanan yang maksimal kepada masyarakat','2025-10-18 08:53:55','2025-10-18 08:53:55','Pajak 1 Tahunan'),(22,NULL,'Yunius Jelivan','RT. 15 Ujoh Bilang',NULL,NULL,'ASN','Laki - Laki',30,'082252001989','S1 / Setara','6407192406890002',3,4,3,3,3,4,3,3,4,NULL,NULL,NULL,NULL,NULL,NULL,'Di pertahankan dan di tingkatkan lagi','2025-11-05 06:10:35','2025-11-05 06:10:35','Pajak 1 Tahunan'),(23,NULL,'contoh berita','samarinda',NULL,NULL,'Swasta','Laki - Laki',29,'082153464358','SMA / SMK','1234567890123456',4,4,4,4,4,4,4,4,4,NULL,NULL,NULL,NULL,NULL,NULL,'terimakasih','2025-12-06 03:06:46','2025-12-06 03:06:46','Pajak 1 Tahunan'),(24,NULL,'Honorata Yulita usun','Ujoh bilang RT X kec long Bagun kab mahulu',NULL,NULL,'ASN','Perempuan',51,'081346270416','S2 / S3','6407075201750001',3,4,3,4,3,3,4,3,4,NULL,NULL,NULL,NULL,NULL,NULL,'-','2026-01-21 09:54:04','2026-01-21 09:54:04','Pajak 1 Tahunan'),(25,NULL,'Eka Widya Wiranda','Ujoh bilang RT. 11',NULL,NULL,'ASN','Perempuan',30,'081383123309','S1 / Setara','6472064912950006',3,4,4,4,4,4,4,4,4,NULL,NULL,NULL,NULL,NULL,NULL,'Sudah sangat baik, tolong dipertahankan','2026-01-21 10:18:30','2026-01-21 10:18:30','Pajak 1 Tahunan'),(26,NULL,'Batara Lawalata Budaiska','Ujoh Bilang RT. XV, Kecamatan Long Bagun, Kabupaten Mahakam Ulu',NULL,NULL,'ASN','Laki - Laki',30,'082269888885','S2 / S3','6103060512950001',3,3,3,4,3,3,3,2,4,NULL,NULL,NULL,NULL,NULL,NULL,'Semoga sarana dan prasarana kantor khusunya bagi OPD yang belum memiliki kantor permanen agar dapat segera dibangun, sehingga pelayanan yang diberikan kepada pengguna layanan dapat terlayani secara maksimal.','2026-01-21 10:53:14','2026-01-21 10:53:14','Pajak 1 Tahunan'),(27,NULL,'Batara Lawalata Budaiska','Ujoh Bilang RT. XV, Kecamatan Long Bagun, Kabupaten Mahakam Ulu',NULL,NULL,'ASN','Laki - Laki',30,'082269888885','S2 / S3','6103060512950001',3,3,3,4,3,3,3,2,4,NULL,NULL,NULL,NULL,NULL,NULL,'Semoga sarana dan prasarana kantor khusunya bagi OPD yang belum memiliki kantor permanen agar dapat segera dibangun, sehingga pelayanan yang diberikan kepada pengguna layanan dapat terlayani secara maksimal.','2026-01-21 10:53:15','2026-01-21 10:53:15','Pajak 1 Tahunan'),(28,NULL,'Merina Yesie Elvira','Ujoh Bilang rt.7',NULL,NULL,'ASN','Perempuan',30,'082256261982','S1 / Setara','6205055508890005',3,4,3,4,3,3,3,2,4,NULL,NULL,NULL,NULL,NULL,NULL,'Semoga inspektorat kab mahakam ulu semakin meningkat kualitas pelayanan terhadap seluruh OPD untuk kab mahakam ulu melaju 💪','2026-01-21 12:57:06','2026-01-21 12:57:06','Pajak 1 Tahunan'),(29,NULL,'Zita Devung Paran','Ujoh Bilang RT.12',NULL,NULL,'ASN','Perempuan',41,'081349475556','S1 / Setara','6404054204770004',4,3,3,4,4,4,4,3,4,NULL,NULL,NULL,NULL,NULL,NULL,'Semoga kedepan lebih baik','2026-01-22 02:50:01','2026-01-22 02:50:01','Pajak 1 Tahunan'),(30,NULL,'arrauf','mahulu',NULL,NULL,'Swasta','Laki - Laki',29,'0822290310038','SMA / SMK','6402162811990001',4,4,4,4,4,4,4,4,4,NULL,NULL,NULL,NULL,NULL,NULL,'sangat bagus pelayanannya','2026-01-26 09:38:21','2026-01-26 09:38:21','Pajak 1 Tahunan'),(31,NULL,'Eka','BPBD Kabupaten Mahakam Ulu',NULL,NULL,'ASN','Perempuan',30,'081383123309','S1 / Setara','0000000000000000',4,4,4,4,4,4,4,4,4,NULL,NULL,NULL,NULL,NULL,NULL,'-','2026-05-13 10:13:34','2026-05-13 10:13:34','Pajak 1 Tahunan'),(32,NULL,'ANGELICA DWIWAHYU GUSTVANEO HONG','Jl. Long Bagun ilir',NULL,NULL,'ASN','Perempuan',30,'085211748714','S2 / S3','6474016508890006',3,4,3,4,4,4,4,3,4,NULL,NULL,NULL,NULL,NULL,NULL,'snack dan minuman disediakan','2026-05-18 06:35:27','2026-05-18 06:35:27','Pajak 1 Tahunan'),(33,NULL,'Elisabet long','DKPP Ujoh Bilang',NULL,NULL,'ASN','Perempuan',41,'081293099873','S1 / Setara','0000000000000000',3,3,3,3,4,3,4,4,4,NULL,NULL,NULL,NULL,NULL,NULL,'Baik','2026-05-19 02:58:51','2026-05-19 02:58:51','Pajak 1 Tahunan'),(34,NULL,'Andi','Long bagun ulu',NULL,NULL,'Lainnya','Laki - Laki',30,'085247163207','D-I / D-III','0000000000000000',3,3,3,3,3,3,3,2,4,NULL,NULL,NULL,NULL,NULL,NULL,'Untuk pengaduan dibuat semudah mungkin, di zaman digitalisasi ini produk pengaduan hrs dengan sistem digital dan harapannya hal sprti ini tetap berjalan.','2026-06-02 07:40:50','2026-06-02 07:40:50','Pajak 1 Tahunan'),(35,NULL,'Bute','DKPP UJOH BILANG',NULL,NULL,'Lainnya','Perempuan',30,'081352236818','S1 / Setara','0000000000000000',3,3,3,4,3,3,3,3,4,NULL,NULL,NULL,NULL,NULL,NULL,'Cukup baik dan memuaskan','2026-06-04 04:18:22','2026-06-04 04:18:22','Pajak 1 Tahunan'),(37,NULL,'guntur','samarinda','menginap','ktp/WzGAa67G79PYfE50J1ZF1eQKpsEPVHDPvMPrlL5X.jpg','Swasta','Laki - Laki',29,'085224839281','SMA / SMK','6472053101990002',4,4,4,4,4,4,4,4,4,NULL,NULL,NULL,NULL,NULL,NULL,'ok','2026-10-15 01:52:07','2026-10-15 01:52:07','Pajak 1 Tahunan'),(38,NULL,'guntur','samarinda','',NULL,'Swasta','Laki - Laki',29,'081350102019','SMA / SMK','6472053101990002',4,4,4,4,4,4,4,4,4,NULL,NULL,NULL,NULL,NULL,NULL,'oke','2026-10-16 08:05:49','2026-10-16 08:05:49','Pajak 1 Tahunan'),(39,NULL,'guntur','samarinda','',NULL,'Swasta','Laki - Laki',29,'081350102019','SMA / SMK','6472053101990002',4,4,4,4,4,4,4,4,4,NULL,NULL,NULL,NULL,NULL,NULL,'oke','2026-10-16 08:05:49','2026-10-16 08:05:49','Pajak 1 Tahunan'),(40,NULL,'Selamat Hari Kesaktian Pancasila','samarinda','',NULL,'Swasta','Laki - Laki',29,'0895704367830','SMA / SMK','6472053101990002',4,4,4,4,4,4,4,4,4,NULL,NULL,NULL,NULL,NULL,NULL,'oke','2026-10-16 08:31:54','2026-10-16 08:31:54','Pajak 1 Tahunan'),(41,NULL,'guntur','samarinda','',NULL,'Swasta','Laki - Laki',29,'082153464358','SMA / SMK','6472019201922910',4,4,4,4,4,4,4,4,4,NULL,NULL,NULL,NULL,NULL,NULL,'sangat ramah dan mengayomi','2026-10-16 21:03:59','2026-10-16 21:03:59','Pajak 1 Tahunan');
/*!40000 ALTER TABLE `2024` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bukutamu`
--

DROP TABLE IF EXISTS `bukutamu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bukutamu` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `kodeUnik` varchar(6) DEFAULT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `jenkel` varchar(15) NOT NULL,
  `usia` int(11) NOT NULL,
  `nohp` varchar(16) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `keperluan` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `jenisPelayanan` char(2) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bukutamu`
--

LOCK TABLES `bukutamu` WRITE;
/*!40000 ALTER TABLE `bukutamu` DISABLE KEYS */;
/*!40000 ALTER TABLE `bukutamu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2026_09_28_150000_add_keperluan_and_foto_ktp_to_2024_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nilaiunsur`
--

DROP TABLE IF EXISTS `nilaiunsur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nilaiunsur` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `kodeUnik` varchar(10) DEFAULT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `jenkel` varchar(15) NOT NULL,
  `usia` int(11) NOT NULL,
  `nohp` varchar(16) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `u1` int(11) NOT NULL,
  `u2` int(11) NOT NULL,
  `u3` int(11) NOT NULL,
  `u4` int(11) NOT NULL,
  `u5` int(11) NOT NULL,
  `u6` int(11) NOT NULL,
  `u7` int(11) NOT NULL,
  `u8` int(11) NOT NULL,
  `u9` int(11) NOT NULL,
  `saran` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nilaiunsur`
--

LOCK TABLES `nilaiunsur` WRITE;
/*!40000 ALTER TABLE `nilaiunsur` DISABLE KEYS */;
/*!40000 ALTER TABLE `nilaiunsur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-11-14  3:46:37
