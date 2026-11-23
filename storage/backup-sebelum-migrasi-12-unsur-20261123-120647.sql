SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `2024`;
CREATE TABLE `2024` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kodeUnik` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keperluan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto_ktp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pekerjaan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenkel` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `usia` int DEFAULT NULL,
  `nohp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pendidikan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `u1` int DEFAULT NULL,
  `u2` int DEFAULT NULL,
  `u3` int DEFAULT NULL,
  `u4` int DEFAULT NULL,
  `u5` int DEFAULT NULL,
  `u6` int DEFAULT NULL,
  `u7` int DEFAULT NULL,
  `u8` int DEFAULT NULL,
  `u9` int DEFAULT NULL,
  `u10` int DEFAULT NULL,
  `u11` int DEFAULT NULL,
  `u12` int DEFAULT NULL,
  `u13` int DEFAULT NULL,
  `u14` int DEFAULT NULL,
  `u15` int DEFAULT NULL,
  `saran` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenisPelayanan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('1',NULL,'M Guntur Borneo','samarinda',NULL,NULL,'Swasta','Laki - Laki','29','085224839281','SMA / SMK','6472019201922910','4','4','4','4','4','4','4','4','4',NULL,NULL,NULL,NULL,NULL,NULL,'mantab','2025-06-27 21:35:51','2025-06-27 21:35:51','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('2',NULL,'jerry triananda','samarinda',NULL,NULL,'Swasta','Laki - Laki','29','081350602955','SMA / SMK','6472019201922192','4','4','4','4','4','4','4','4','4',NULL,NULL,NULL,NULL,NULL,NULL,'pelayanan sudah sesuai dengan prosedur','2025-08-13 14:46:52','2025-08-13 14:46:52','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('3',NULL,'reza','jl. ks tubun',NULL,NULL,'Pengusaha','Laki - Laki','29','082153464358','SMA / SMK','6477777777777777','3','3','3','2','3','3','2','2','3',NULL,NULL,NULL,NULL,NULL,NULL,'tingkatkan pelayanan!','2025-08-13 15:10:35','2025-08-13 15:10:35','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('4',NULL,'M Guntur Borneo','Ujoh Bilang',NULL,NULL,'Swasta','Laki - Laki','29','085224302550','SMA / SMK','6472053101990002','4','4','4','4','4','4','4','4','4',NULL,NULL,NULL,NULL,NULL,NULL,'sudah sangat baik','2025-08-19 15:28:27','2025-08-19 15:28:27','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('5',NULL,'Dominika Devung Jaang','Ujoh Bilang',NULL,NULL,'ASN','Perempuan','41','081253002998','S2 / S3','6407076506800001','3','3','3','2','3','3','3','3','3',NULL,NULL,NULL,NULL,NULL,NULL,'Agar dipertahankan dan ditingkatkan lagi','2025-09-15 16:33:30','2025-09-15 16:33:30','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('6',NULL,'Teddy Andrianus Mirah','Ujoh Bilang RT. 15',NULL,NULL,'ASN','Laki - Laki','30','085250861666','S1 / Setara','6407180503900001','3','3','3','4','3','4','4','1','3',NULL,NULL,NULL,NULL,NULL,NULL,'semoga sarana dan prasara untuk menunjang pekerjaan segera terpenuhi','2025-09-27 21:11:19','2025-09-27 21:11:19','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('7',NULL,'Elizabeth','Ujoh bilang Rt.13',NULL,NULL,'ASN','Perempuan','30','082234371984','S1 / Setara','6406026408880003','4','3','3','4','4','3','4','2','4',NULL,NULL,NULL,NULL,NULL,NULL,'Aplikasi Kanal pengaduan dan survei kepuasan masyarakat sudah cukup baik namun kami berharap sarana dan prasarana dapat ditingkatkan lagi demi kenyamanan masyarakat dalam berkoordinasi dan konsultasi langsung dikantor','2025-09-27 21:23:31','2025-09-27 21:23:31','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('8',NULL,'Veronika Hubung','Memahak Besar RT 005 Kec.Long Bagun Kab.Mahakam Ulu',NULL,NULL,'ASN','Perempuan','41','081347621877','SMA / SMK','6407034405770001','3','1','3','4','3','3','3','1','4',NULL,NULL,NULL,NULL,NULL,NULL,'Semoga kedepannya lebih baik lagi baik dalam pelayanan maupun tentang sarana dan prasarana, terima kasih.','2025-09-27 21:58:29','2025-09-27 21:58:29','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('9',NULL,'cornelia sui ngulan buring','Ujoh Bilang',NULL,NULL,'ASN','Perempuan','30','082157604835','S2 / S3','6407024804930001','3','3','4','4','4','4','4','2','4',NULL,NULL,NULL,NULL,NULL,NULL,'saranan di perbaiki ya terima kasih','2025-10-17 11:51:21','2025-10-17 11:51:21','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('10',NULL,'NATAN NOVTARAIN TIRTA ADI KUSUMA','Ujoh Bilang',NULL,NULL,'ASN','Laki - Laki','29','082137397574','D-I / D-III','3403080811000005','4','3','4','4','3','3','3','3','4',NULL,NULL,NULL,NULL,NULL,NULL,'Bagus lanjutkan','2025-10-17 12:23:36','2025-10-17 12:23:36','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('11',NULL,'Anastasia Tubun','Jl.Poros Kampung Ujoh Bilang Rt.III No 28, Kec.Long Bagun',NULL,NULL,'ASN','Perempuan','41','082252650454','S1 / Setara','6407075902790001','3','3','3','4','3','4','3','3','2',NULL,NULL,NULL,NULL,NULL,NULL,'saran perbaikan, adanya peningkatan kompotensi pegawai melalui pelatihan tentang pelayanan publik,komunikas dan teknologi informasi. masukan sediakan kotak saran','2025-10-17 12:40:00','2025-10-17 12:40:00','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('12',NULL,'Mardiana, S.Pd','Kampung laham, RT. 005, kecamatan Laham, kab. Mahakam ulu, kalimantan Timur',NULL,NULL,'ASN','Perempuan','30','085251562774','S1 / Setara','6407125102900001','4','4','3','4','4','4','4','4','4',NULL,NULL,NULL,NULL,NULL,NULL,'Semua sudah sesuai dengan prosedur pelayanan','2025-10-17 13:44:53','2025-10-17 13:44:53','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('13',NULL,'Thresia Luhung','Long Melaham RT.02',NULL,NULL,'ASN','Perempuan','30','081351783597','S1 / Setara','6472034602850011','3','3','3','2','2','3','3','2','3',NULL,NULL,NULL,NULL,NULL,NULL,'Harapan nya agar supaya seluruh pelayanan yg sdh berjalan dgn baik utk lebih di tingkatkan lagi','2025-10-17 14:25:48','2025-10-17 14:25:48','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('14',NULL,'F. Theresia Soong','Memahak Teboq',NULL,NULL,'ASN','Perempuan','41','085250601476','S1 / Setara','6407046408790001','3','3','3','4','3','3','3','3','4',NULL,NULL,NULL,NULL,NULL,NULL,'Saran:\r\nTingkatkan kecepatan dan kemudahan dalam proses pelayanan.\r\n\r\nHarapan:\r\nSemoga layanan Inspektorat semakin profesional.','2025-10-17 14:25:50','2025-10-17 14:25:50','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('15',NULL,'Theresia Inu','Long Hubung Ulu RT.001',NULL,NULL,'ASN','Perempuan','30','081350604721','D-I / D-III','6407045302860002','2','2','2','3','3','3','3','1','3',NULL,NULL,NULL,NULL,NULL,NULL,'Kedepan lebih transparan dalam segala hal','2025-10-18 12:42:57','2025-10-18 12:42:57','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('16',NULL,'Novianty','Long Hubung Ulu',NULL,NULL,'ASN','Perempuan','29','O85338317770','D-I / D-III','7326114411940001','4','4','4','4','3','4','4','4','4',NULL,NULL,NULL,NULL,NULL,NULL,'Tetap melayani dengan Ramah dan penuh tanggung jawab','2025-10-18 12:53:09','2025-10-18 12:53:09','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('17',NULL,'Ruth Damayanti Dom','Longhubung',NULL,NULL,'ASN','Perempuan','41','082256476318','SMA / SMK','6407044609820001','3','3','3','4','3','3','4','3','3',NULL,NULL,NULL,NULL,NULL,NULL,'Lebih memperhatikan pelayanan','2025-10-18 12:56:19','2025-10-18 12:56:19','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('18',NULL,'Solihati','Kampung sirau RT 01',NULL,NULL,'ASN','Perempuan','30','085250841870','D-I / D-III','6407065305910002','3','3','3','4','3','3','3','2','4',NULL,NULL,NULL,NULL,NULL,NULL,'Semogaa bisa lebih baik lagi dalam memberikan pelayanan','2025-10-18 15:43:02','2025-10-18 15:43:02','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('19',NULL,'Magdalena Hunyang','Long Hubung RT.04',NULL,NULL,'ASN','Perempuan','30','082251125551','S1 / Setara','6407046209880001','3','3','3','4','3','3','3','2','4',NULL,NULL,NULL,NULL,NULL,NULL,'Semangat lebih baik lagi','2025-10-18 15:55:18','2025-10-18 15:55:18','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('20',NULL,'purnama sari buaq','Long hubung,RT.003 kec. Long hubung,kan.mahakam ulu',NULL,NULL,'ASN','Perempuan','30','081346040619','D-I / D-III','6407046405910001','3','3','3','4','3','3','3','3','4',NULL,NULL,NULL,NULL,NULL,NULL,'Semoga kedepannya lebih baik lagi dan lebih memberikan pelayanan yang maksimal kepada masyarakat','2025-10-18 16:53:55','2025-10-18 16:53:55','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('21',NULL,'purnama sari buaq','Long hubung,RT.003 kec. Long hubung,kan.mahakam ulu',NULL,NULL,'ASN','Perempuan','30','081346040619','D-I / D-III','6407046405910001','3','3','3','4','3','3','3','3','4',NULL,NULL,NULL,NULL,NULL,NULL,'Semoga kedepannya lebih baik lagi dan lebih memberikan pelayanan yang maksimal kepada masyarakat','2025-10-18 16:53:55','2025-10-18 16:53:55','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('22',NULL,'Yunius Jelivan','RT. 15 Ujoh Bilang',NULL,NULL,'ASN','Laki - Laki','30','082252001989','S1 / Setara','6407192406890002','3','4','3','3','3','4','3','3','4',NULL,NULL,NULL,NULL,NULL,NULL,'Di pertahankan dan di tingkatkan lagi','2025-11-05 14:10:35','2025-11-05 14:10:35','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('23',NULL,'contoh berita','samarinda',NULL,NULL,'Swasta','Laki - Laki','29','082153464358','SMA / SMK','1234567890123456','4','4','4','4','4','4','4','4','4',NULL,NULL,NULL,NULL,NULL,NULL,'terimakasih','2025-12-06 11:06:46','2025-12-06 11:06:46','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('24',NULL,'Honorata Yulita usun','Ujoh bilang RT X kec long Bagun kab mahulu',NULL,NULL,'ASN','Perempuan','51','081346270416','S2 / S3','6407075201750001','3','4','3','4','3','3','4','3','4',NULL,NULL,NULL,NULL,NULL,NULL,'-','2026-01-21 17:54:04','2026-01-21 17:54:04','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('25',NULL,'Eka Widya Wiranda','Ujoh bilang RT. 11',NULL,NULL,'ASN','Perempuan','30','081383123309','S1 / Setara','6472064912950006','3','4','4','4','4','4','4','4','4',NULL,NULL,NULL,NULL,NULL,NULL,'Sudah sangat baik, tolong dipertahankan','2026-01-21 18:18:30','2026-01-21 18:18:30','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('26',NULL,'Batara Lawalata Budaiska','Ujoh Bilang RT. XV, Kecamatan Long Bagun, Kabupaten Mahakam Ulu',NULL,NULL,'ASN','Laki - Laki','30','082269888885','S2 / S3','6103060512950001','3','3','3','4','3','3','3','2','4',NULL,NULL,NULL,NULL,NULL,NULL,'Semoga sarana dan prasarana kantor khusunya bagi OPD yang belum memiliki kantor permanen agar dapat segera dibangun, sehingga pelayanan yang diberikan kepada pengguna layanan dapat terlayani secara maksimal.','2026-01-21 18:53:14','2026-01-21 18:53:14','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('27',NULL,'Batara Lawalata Budaiska','Ujoh Bilang RT. XV, Kecamatan Long Bagun, Kabupaten Mahakam Ulu',NULL,NULL,'ASN','Laki - Laki','30','082269888885','S2 / S3','6103060512950001','3','3','3','4','3','3','3','2','4',NULL,NULL,NULL,NULL,NULL,NULL,'Semoga sarana dan prasarana kantor khusunya bagi OPD yang belum memiliki kantor permanen agar dapat segera dibangun, sehingga pelayanan yang diberikan kepada pengguna layanan dapat terlayani secara maksimal.','2026-01-21 18:53:15','2026-01-21 18:53:15','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('28',NULL,'Merina Yesie Elvira','Ujoh Bilang rt.7',NULL,NULL,'ASN','Perempuan','30','082256261982','S1 / Setara','6205055508890005','3','4','3','4','3','3','3','2','4',NULL,NULL,NULL,NULL,NULL,NULL,'Semoga inspektorat kab mahakam ulu semakin meningkat kualitas pelayanan terhadap seluruh OPD untuk kab mahakam ulu melaju 💪','2026-01-21 20:57:06','2026-01-21 20:57:06','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('29',NULL,'Zita Devung Paran','Ujoh Bilang RT.12',NULL,NULL,'ASN','Perempuan','41','081349475556','S1 / Setara','6404054204770004','4','3','3','4','4','4','4','3','4',NULL,NULL,NULL,NULL,NULL,NULL,'Semoga kedepan lebih baik','2026-01-22 10:50:01','2026-01-22 10:50:01','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('30',NULL,'arrauf','mahulu',NULL,NULL,'Swasta','Laki - Laki','29','0822290310038','SMA / SMK','6402162811990001','4','4','4','4','4','4','4','4','4',NULL,NULL,NULL,NULL,NULL,NULL,'sangat bagus pelayanannya','2026-01-26 17:38:21','2026-01-26 17:38:21','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('31',NULL,'Eka','BPBD Kabupaten Mahakam Ulu',NULL,NULL,'ASN','Perempuan','30','081383123309','S1 / Setara','0000000000000000','4','4','4','4','4','4','4','4','4',NULL,NULL,NULL,NULL,NULL,NULL,'-','2026-05-13 18:13:34','2026-05-13 18:13:34','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('32',NULL,'ANGELICA DWIWAHYU GUSTVANEO HONG','Jl. Long Bagun ilir',NULL,NULL,'ASN','Perempuan','30','085211748714','S2 / S3','6474016508890006','3','4','3','4','4','4','4','3','4',NULL,NULL,NULL,NULL,NULL,NULL,'snack dan minuman disediakan','2026-05-18 14:35:27','2026-05-18 14:35:27','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('33',NULL,'Elisabet long','DKPP Ujoh Bilang',NULL,NULL,'ASN','Perempuan','41','081293099873','S1 / Setara','0000000000000000','3','3','3','3','4','3','4','4','4',NULL,NULL,NULL,NULL,NULL,NULL,'Baik','2026-05-19 10:58:51','2026-05-19 10:58:51','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('34',NULL,'Andi','Long bagun ulu',NULL,NULL,'Lainnya','Laki - Laki','30','085247163207','D-I / D-III','0000000000000000','3','3','3','3','3','3','3','2','4',NULL,NULL,NULL,NULL,NULL,NULL,'Untuk pengaduan dibuat semudah mungkin, di zaman digitalisasi ini produk pengaduan hrs dengan sistem digital dan harapannya hal sprti ini tetap berjalan.','2026-06-02 15:40:50','2026-06-02 15:40:50','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('35',NULL,'Bute','DKPP UJOH BILANG',NULL,NULL,'Lainnya','Perempuan','30','081352236818','S1 / Setara','0000000000000000','3','3','3','4','3','3','3','3','4',NULL,NULL,NULL,NULL,NULL,NULL,'Cukup baik dan memuaskan','2026-06-04 12:18:22','2026-06-04 12:18:22','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('37',NULL,'guntur','samarinda','menginap','ktp/WzGAa67G79PYfE50J1ZF1eQKpsEPVHDPvMPrlL5X.jpg','Swasta','Laki - Laki','29','085224839281','SMA / SMK','6472053101990002','4','4','4','4','4','4','4','4','4',NULL,NULL,NULL,NULL,NULL,NULL,'ok','2026-10-15 09:52:07','2026-10-15 09:52:07','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('38',NULL,'guntur','samarinda','',NULL,'Swasta','Laki - Laki','29','081350102019','SMA / SMK','6472053101990002','4','4','4','4','4','4','4','4','4',NULL,NULL,NULL,NULL,NULL,NULL,'oke','2026-10-16 16:05:49','2026-10-16 16:05:49','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('39',NULL,'guntur','samarinda','',NULL,'Swasta','Laki - Laki','29','081350102019','SMA / SMK','6472053101990002','4','4','4','4','4','4','4','4','4',NULL,NULL,NULL,NULL,NULL,NULL,'oke','2026-10-16 16:05:49','2026-10-16 16:05:49','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('40',NULL,'Selamat Hari Kesaktian Pancasila','samarinda','',NULL,'Swasta','Laki - Laki','29','0895704367830','SMA / SMK','6472053101990002','4','4','4','4','4','4','4','4','4',NULL,NULL,NULL,NULL,NULL,NULL,'oke','2026-10-16 16:31:54','2026-10-16 16:31:54','Pajak 1 Tahunan');
INSERT INTO `2024` (`id`,`kodeUnik`,`nama`,`alamat`,`keperluan`,`foto_ktp`,`pekerjaan`,`jenkel`,`usia`,`nohp`,`pendidikan`,`nik`,`u1`,`u2`,`u3`,`u4`,`u5`,`u6`,`u7`,`u8`,`u9`,`u10`,`u11`,`u12`,`u13`,`u14`,`u15`,`saran`,`created_at`,`updated_at`,`jenisPelayanan`) VALUES ('41',NULL,'guntur','samarinda','',NULL,'Swasta','Laki - Laki','29','082153464358','SMA / SMK','6472019201922910','4','4','4','4','4','4','4','4','4',NULL,NULL,NULL,NULL,NULL,NULL,'sangat ramah dan mengayomi','2026-10-17 05:03:59','2026-10-17 05:03:59','Pajak 1 Tahunan');
DROP TABLE IF EXISTS `2023`;
CREATE TABLE `2023` (
  `no` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pekerjaan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenkel` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usia` int NOT NULL,
  `nohp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pendidikan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `u1` int NOT NULL,
  `u2` int NOT NULL,
  `u3` int NOT NULL,
  `u4` int NOT NULL,
  `u5` int NOT NULL,
  `u6` int NOT NULL,
  `u7` int NOT NULL,
  `u8` int NOT NULL,
  `u9` int NOT NULL,
  `saran` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
DROP TABLE IF EXISTS `nilaiunsur`;
CREATE TABLE `nilaiunsur` (
  `no` int NOT NULL AUTO_INCREMENT,
  `kodeUnik` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pekerjaan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenkel` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usia` int NOT NULL,
  `nohp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pendidikan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `u1` int NOT NULL,
  `u2` int NOT NULL,
  `u3` int NOT NULL,
  `u4` int NOT NULL,
  `u5` int NOT NULL,
  `u6` int NOT NULL,
  `u7` int NOT NULL,
  `u8` int NOT NULL,
  `u9` int NOT NULL,
  `saran` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
DROP TABLE IF EXISTS `bukutamu`;
CREATE TABLE `bukutamu` (
  `no` int NOT NULL AUTO_INCREMENT,
  `kodeUnik` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pekerjaan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenkel` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usia` int NOT NULL,
  `nohp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pendidikan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keperluan` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `jenisPelayanan` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES ('1','2026_09_28_150000_add_keperluan_and_foto_ktp_to_2024_table','1');
SET FOREIGN_KEY_CHECKS=1;
