/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 8.0.30 : Database - jca
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`jca` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `jca`;

/*Table structure for table `bulans` */

DROP TABLE IF EXISTS `bulans`;

CREATE TABLE `bulans` (
  `id` tinyint NOT NULL,
  `nama` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bulans` */

insert  into `bulans`(`id`,`nama`) values 
(1,'Januari'),
(2,'Februari'),
(3,'Maret'),
(4,'April'),
(5,'Mei'),
(6,'Juni'),
(7,'Juli'),
(8,'Agustus'),
(9,'September'),
(10,'Oktober'),
(11,'November'),
(12,'Desember');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `links` */

DROP TABLE IF EXISTS `links`;

CREATE TABLE `links` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `pesan` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `iduser` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `links` */

insert  into `links`(`id`,`nama`,`pesan`,`iduser`,`created_at`,`updated_at`) values 
(11,'Google Sheets','https://docs.google.com/spreadsheets/d/1Lbv0aRSSjB7gBwMp0ju74XjRu_Qge6si_Ukm8_NLpUU/edit?usp=sharing',4,'2024-11-02 06:39:29','2024-11-02 06:39:29');

/*Table structure for table `md_haris` */

DROP TABLE IF EXISTS `md_haris`;

CREATE TABLE `md_haris` (
  `id` tinyint NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `md_haris` */

insert  into `md_haris`(`id`,`nama`) values 
(0,'Minggu'),
(1,'Senin'),
(2,'Selasa'),
(3,'Rabu'),
(4,'Kamis'),
(5,'Jumat'),
(6,'Sabtu');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2024_10_31_103346_create_users_table',2);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `product_kategoris` */

DROP TABLE IF EXISTS `product_kategoris`;

CREATE TABLE `product_kategoris` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `iduser` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `product_kategoris` */

insert  into `product_kategoris`(`id`,`nama`,`iduser`,`created_at`,`updated_at`) values 
(1,'Category FnB',4,'2023-09-25 08:23:35','2024-11-01 02:30:41'),
(2,'Category Non FnB',4,'2023-09-25 09:34:59','2024-11-01 01:07:08');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idkategori` int NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'Itu',
  `slug` varchar(600) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `isi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `iduser` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`id`,`idkategori`,`nama`,`slug`,`isi`,`gambar`,`iduser`,`created_at`,`updated_at`) values 
(8,2,'','8','<p><span style=\"color: rgb(0, 0, 0);\">Discover expert products designed to elevate your business success in the food and beverage industry! Delivering high-quality solutions and swift distribution that enhance growth and efficiency, meeting the specific needs of our clients.</span></p>','product-img/8/VLlhrgc6SjcMQAMwP0VWmgtWCb9pDprPVbyotHOC.jpg',4,'2024-11-01 01:12:01','2024-11-02 06:52:02'),
(12,1,'Itu','12','<p><span style=\"color: rgb(0, 0, 0);\">Discover expert products designed to elevate your business success in the food and beverage industry. Delivering high-quality solutions and swift distribution that enhance growth and efficiency, meeting the specific needs of our clients.</span></p>','product-img/12/YLZR81qAndwI0GoYpNQwNOJn3agL1eUiDtARmmQh.jpg',4,'2024-11-01 07:40:29','2024-11-02 06:52:19');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'images/user-default.jpg',
  `nama` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` int NOT NULL DEFAULT '0',
  `role` tinyint NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`foto`,`nama`,`username`,`email_verified_at`,`password`,`link`,`role`,`remember_token`,`created_at`,`updated_at`) values 
(3,'userimages/KI2zcQvbODv4mM34eQvWBpa06ziJMxD70JwJuWIW.jpg','Kadek Agus Satrya','rangda@g.com',NULL,'$2y$10$lYA00b.QOgS7jM88sP.JO.ngxH.ElVxj4YO2BewkTUWsy/dKwC.yS',0,0,'GkmznrRPsPozdwWj2rArr51uFTdUeWk4pI6IUW3aoYaN6GPULaZobB36ZvmF','2023-10-12 06:11:08','2023-10-17 09:25:53'),
(4,'images/user-default.jpg','admin','admin@gmail.com',NULL,'$2y$12$ohzRxjy8cpq.qQ4lCMgCFuvKfmbcX5A.MFELu3MUjUFO0eSEHVsoG',0,0,'CEZTkMSnp4z4WJcKTSCNhrs6tJHvVnZfXtEG01pJKrN1U1eTb0dan2TeN5Ya','2024-10-31 12:18:45','2024-11-02 06:24:44');

/*Table structure for table `web_abouts` */

DROP TABLE IF EXISTS `web_abouts`;

CREATE TABLE `web_abouts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `slug` varchar(150) NOT NULL,
  `desk` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `iduser` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `web_abouts` */

insert  into `web_abouts`(`id`,`judul`,`slug`,`desk`,`foto`,`iduser`,`created_at`,`updated_at`) values 
(9,'PT. Jembatan Cemerlang Abadi','pt-jembatan-cemerlang-abadi','Was established with our confidence in the food and beverage industry, starting small with the belief that we would grow big. Dedicated to delivering customized solutions and actionable insights, our consulting firm supports food and beverage businesses in realizing their full potential and achieving sustainable growth. With deep expertise in the F&B industry, we prioritize understanding and meeting the specific needs of each client.','about-img//PylKU7sxvRZoDn6fcO1yoRNbeopH1PQzDkK3klOE.jpg',4,'2024-11-02 06:17:06','2024-11-02 06:26:58'),
(10,'Patras','patras','CV. Patras Dev','about-img//PaHiFxvSCIy7CBIeXopESfo04Rh6fVPgOMFES74c.jpg',4,'2024-11-02 06:59:19','2024-11-02 08:30:08'),
(12,'Contoh Lain','contoh-lain','Lain-Lain lah ya','about-img//fxHQVUzn2VvAtOwTbnEwmXtup7zryVKsKvSGCGuU.jpg',4,'2024-11-02 08:29:58','2024-11-02 08:29:58'),
(13,'JCA (lagi)','jca-lagi','@testing #testing $wala we','about-img//F5MlLK7ZBrqO7gkpZHlIocMoygPYpntChpZWx1Rc.jpg',4,'2024-11-04 03:54:19','2024-11-04 05:05:23');

/*Table structure for table `web_abouts_gambars` */

DROP TABLE IF EXISTS `web_abouts_gambars`;

CREATE TABLE `web_abouts_gambars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idabouts` int NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `urut` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `web_abouts_gambars` */

insert  into `web_abouts_gambars`(`id`,`idabouts`,`file`,`urut`,`created_at`,`updated_at`) values 
(29,9,'about-img//PylKU7sxvRZoDn6fcO1yoRNbeopH1PQzDkK3klOE.jpg',0,'2024-11-02 06:26:58','2024-11-02 06:26:58'),
(32,12,'about-img//fxHQVUzn2VvAtOwTbnEwmXtup7zryVKsKvSGCGuU.jpg',0,'2024-11-02 08:29:58','2024-11-02 08:29:58'),
(33,10,'about-img//PaHiFxvSCIy7CBIeXopESfo04Rh6fVPgOMFES74c.jpg',0,'2024-11-02 08:30:08','2024-11-02 08:30:08'),
(35,13,'about-img//F5MlLK7ZBrqO7gkpZHlIocMoygPYpntChpZWx1Rc.jpg',0,'2024-11-04 05:05:23','2024-11-04 05:05:23');

/*Table structure for table `web_homes` */

DROP TABLE IF EXISTS `web_homes`;

CREATE TABLE `web_homes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `slug` varchar(150) NOT NULL,
  `deskripsi` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cover` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `iduser` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `web_homes` */

insert  into `web_homes`(`id`,`nama`,`slug`,`deskripsi`,`cover`,`iduser`,`created_at`,`updated_at`) values 
(9,'One Stop Solution For Your Bussiness','one-stop-solution-for-your-bussiness','At JCA, we excel in providing Hospitality Supplies & Consultant Service that drive strategic growth and operational success for your business. Count on our knowledgeable professionals to offer precise insights and powerful solutions for your business challenges.','home-img//o8ijPhr6LFWAeVmxF1vMCis5vREQe4VPhrEWqjeD.jpg',4,'2024-11-02 06:19:33','2024-11-04 05:51:06'),
(13,'Gedung','gedung','Gedung Ini Tinggi Kali cuy','home-img//iNlSKiwPoJ3MheodCop2M2jDdgcrY61fpN6e2Dvb.jpg',4,'2024-11-02 07:24:09','2024-11-02 07:24:09');

/*Table structure for table `web_homes_gambars` */

DROP TABLE IF EXISTS `web_homes_gambars`;

CREATE TABLE `web_homes_gambars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idhomes` int NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `urut` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `web_homes_gambars` */

insert  into `web_homes_gambars`(`id`,`idhomes`,`file`,`urut`,`created_at`,`updated_at`) values 
(32,13,'home-img//iNlSKiwPoJ3MheodCop2M2jDdgcrY61fpN6e2Dvb.jpg',0,'2024-11-02 07:24:09','2024-11-02 07:24:09'),
(34,9,'home-img//o8ijPhr6LFWAeVmxF1vMCis5vREQe4VPhrEWqjeD.jpg',0,'2024-11-04 05:51:06','2024-11-04 05:51:06');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
