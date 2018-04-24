/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.28-MariaDB : Database - db_krs
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_krs` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_krs`;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2017_12_23_101659_create_mahasiswas_table',1),(2,'2017_12_23_113143_create_dosens_table',2),(3,'2017_12_23_113222_create_krs_table',2),(4,'2017_12_23_113506_create_matakuliahs_table',2),(5,'2017_12_23_113751_create_mktawars_table',2);

/*Table structure for table `tb_dosen` */

DROP TABLE IF EXISTS `tb_dosen`;

CREATE TABLE `tb_dosen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tb_dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tb_dosen` */

insert  into `tb_dosen`(`id`,`nip`,`nama`,`id_user`,`created_at`,`updated_at`) values (6,'33333333','Prof. Kadek Agung',6,'2018-01-03 07:04:32','2018-01-03 07:04:32'),(8,'11111111','Prof. Wayan Made',8,'2018-01-03 20:41:14','2018-01-03 20:41:14'),(9,'22222222','Prof. Nyoman Gede',9,'2018-01-03 20:41:30','2018-01-03 20:41:30');

/*Table structure for table `tb_krs` */

DROP TABLE IF EXISTS `tb_krs`;

CREATE TABLE `tb_krs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_mhs` int(10) unsigned NOT NULL,
  `id_mktawar` int(10) unsigned NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `id_nilai` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_mhs` (`id_mhs`),
  KEY `id_mktawar` (`id_mktawar`),
  KEY `id_nilai` (`id_nilai`),
  CONSTRAINT `tb_krs_ibfk_3` FOREIGN KEY (`id_mhs`) REFERENCES `tb_mahasiswa` (`id`),
  CONSTRAINT `tb_krs_ibfk_4` FOREIGN KEY (`id_mktawar`) REFERENCES `tb_mktawar` (`id`),
  CONSTRAINT `tb_krs_ibfk_5` FOREIGN KEY (`id_nilai`) REFERENCES `tb_nilai` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

/*Data for the table `tb_krs` */

insert  into `tb_krs`(`id`,`id_mhs`,`id_mktawar`,`status`,`id_nilai`,`created_at`,`updated_at`) values (54,22,21,1,3,'2018-01-03 21:06:30','2018-01-04 08:15:36'),(55,22,22,1,2,'2018-01-03 21:06:34','2018-01-03 21:15:55'),(56,22,23,1,3,'2018-01-03 21:06:37','2018-01-03 21:16:08'),(57,22,24,1,4,'2018-01-03 21:06:40','2018-01-03 21:12:37'),(58,22,25,1,5,'2018-01-03 21:35:59','2018-01-03 21:38:17'),(59,22,26,1,2,'2018-01-03 21:36:03','2018-01-04 08:26:13'),(60,22,27,1,7,'2018-01-03 21:36:06','2018-01-03 21:39:48'),(61,26,25,1,8,'2018-01-04 07:06:05','2018-01-04 07:06:27'),(62,26,26,1,7,'2018-01-04 07:06:08','2018-01-04 08:24:39'),(63,26,27,1,2,'2018-01-04 07:06:12','2018-01-04 07:06:27');

/*Table structure for table `tb_mahasiswa` */

DROP TABLE IF EXISTS `tb_mahasiswa`;

CREATE TABLE `tb_mahasiswa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tb_mahasiswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_mahasiswa` */

insert  into `tb_mahasiswa`(`id`,`nim`,`nama`,`alamat`,`id_user`,`created_at`,`updated_at`) values (13,'1605551014','Ida Bagus Alit Dwipayana','Sanur',6,'2017-12-01 17:10:04','2017-12-01 17:10:04'),(22,'1705551014','Wayan Gede Dwipa','Sanur',2,'2018-01-03 06:47:27','2018-01-03 06:47:27'),(26,'1705551015','Wayan Made','Dalung',11,'2018-01-04 07:04:58','2018-01-04 07:04:58');

/*Table structure for table `tb_matakuliah` */

DROP TABLE IF EXISTS `tb_matakuliah`;

CREATE TABLE `tb_matakuliah` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_mk` varchar(20) NOT NULL,
  `nama_mk` varchar(100) NOT NULL,
  `sks` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tb_matakuliah` */

insert  into `tb_matakuliah`(`id`,`kode_mk`,`nama_mk`,`sks`,`created_at`,`updated_at`) values (1,'TI1','Interpersonal & Life Skill',2,'2017-12-26 11:38:50','2017-12-26 11:41:09'),(3,'TI2','Pengembangan Manajemen Bisnis',3,'2017-12-26 11:41:33','2017-12-26 11:41:33'),(4,'TI3','IT Forensic',2,'2017-12-26 12:01:18','2017-12-26 12:01:18'),(5,'TI4','Pemrograman Internet',3,'2017-12-26 12:01:18','2017-12-26 12:01:18'),(6,'TI21','Pengembangan Media Digital',2,'2017-12-31 21:18:05','2017-12-31 21:18:05'),(7,'TI22','Data Warehouse',3,'2017-12-31 21:18:27','2017-12-31 21:18:27'),(8,'TI23','Algoritma',2,'2017-12-31 21:18:50','2017-12-31 21:18:50');

/*Table structure for table `tb_mktawar` */

DROP TABLE IF EXISTS `tb_mktawar`;

CREATE TABLE `tb_mktawar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tahun_ajaran` varchar(20) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `id_mk` int(10) unsigned NOT NULL,
  `id_dosenpengampu` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_dosenpengampu` (`id_dosenpengampu`),
  KEY `id_mk` (`id_mk`),
  CONSTRAINT `tb_mktawar_ibfk_2` FOREIGN KEY (`id_dosenpengampu`) REFERENCES `tb_dosen` (`id`),
  CONSTRAINT `tb_mktawar_ibfk_3` FOREIGN KEY (`id_mk`) REFERENCES `tb_matakuliah` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `tb_mktawar` */

insert  into `tb_mktawar`(`id`,`tahun_ajaran`,`semester`,`kelas`,`id_mk`,`id_dosenpengampu`,`created_at`,`updated_at`) values (21,'2016','Ganjil','(ada)',1,6,'2018-01-04 04:54:31','2018-01-04 04:54:31'),(22,'2016','Ganjil','(ada)',3,8,'2018-01-04 04:54:31','2018-01-04 04:54:31'),(23,'2016','Ganjil','(ada)',4,8,'2018-01-04 04:54:31','2018-01-04 04:54:31'),(24,'2016','Ganjil','(ada)',5,9,'2018-01-04 04:54:31','2018-01-04 04:54:31'),(25,'2016','Genap','(ada)',6,9,'2018-01-04 04:54:31','2018-01-04 04:54:31'),(26,'2016','Genap','(ada)',7,6,'2018-01-04 04:54:31','2018-01-04 04:54:31'),(27,'2016','Genap','(ada)',8,6,'2018-01-04 04:54:31','2018-01-04 04:54:31');

/*Table structure for table `tb_nilai` */

DROP TABLE IF EXISTS `tb_nilai`;

CREATE TABLE `tb_nilai` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nilai_huruf` varchar(10) DEFAULT NULL,
  `nilai_angka` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tb_nilai` */

insert  into `tb_nilai`(`id`,`nilai_huruf`,`nilai_angka`) values (2,'A',4),(3,'B+',3.5),(4,'B',3),(5,'C+',2.5),(6,'C',2),(7,'D',1),(8,'E',0);

/*Table structure for table `tb_openkrs` */

DROP TABLE IF EXISTS `tb_openkrs`;

CREATE TABLE `tb_openkrs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `semester` enum('Ganjil','Genap') DEFAULT NULL,
  `tahun_ajaran` int(6) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_openkrs` */

insert  into `tb_openkrs`(`id`,`semester`,`tahun_ajaran`,`status`,`created_at`,`updated_at`) values (1,'Genap',2016,'Aktif','2017-12-01 17:10:17','2018-01-03 21:35:43');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `prev` tinyint(4) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`prev`,`remember_token`,`created_at`,`updated_at`) values (2,'1705551014','$2y$10$ga2hha8IRS3RDhdr2LE4ZOw.S2m1FPw4FXp.vZO/NIsLcO2kgOuS.',1,'','2018-01-03 06:47:27','2018-01-03 06:47:27'),(6,'33333333','$2y$10$PBivcPzU9wv5f9rvMk4u7euZvcB5qXOTXtPkgheYIg1mejyokJlKy',2,'','2018-01-03 07:04:32','2018-01-03 07:04:32'),(7,'admin','$2y$10$b4Q4RP.3n3PM2Kk5.uxzP.5MG2imwtxiicRlLnIM.PZdkuhSZWMxS',3,'','2018-01-03 18:41:51','2018-01-03 18:41:51'),(8,'11111111','$2y$10$jM/Vm.PGMiXZM1M5MqeVDe67eE4Rq0gyYq3XxtS2dOSRh94FSqMC6',2,'','2018-01-03 20:41:14','2018-01-03 20:41:14'),(9,'22222222','$2y$10$qJXYjLdaq5UWrdPLDFFxJeKUZIFFlRlFJJH7k4D50JoqKT2x3G.NK',2,'','2018-01-03 20:41:30','2018-01-03 20:41:30'),(11,'1705551015','$2y$10$w7ZXSKMm.C7xV3Z5dwPGp.Yhgb8Y4VSxLVLVtQfRTOv6FCeAEJT6y',1,'','2018-01-04 07:04:58','2018-01-04 07:04:58');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
