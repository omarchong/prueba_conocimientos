/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.21-MariaDB : Database - prueba_conocimientos
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`prueba_conocimientos` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;

USE `prueba_conocimientos`;

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipocliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombreempresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_id` bigint(20) unsigned NOT NULL,
  `cp` int(11) NOT NULL,
  `referencias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccionfiscal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatuscliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rfc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto_id` bigint(20) unsigned NOT NULL,
  `giro_id` bigint(20) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clientes_estado_id_foreign` (`estado_id`),
  KEY `clientes_contacto_id_foreign` (`contacto_id`),
  KEY `clientes_giro_id_foreign` (`giro_id`),
  CONSTRAINT `clientes_contacto_id_foreign` FOREIGN KEY (`contacto_id`) REFERENCES `contactos` (`id`),
  CONSTRAINT `clientes_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`),
  CONSTRAINT `clientes_giro_id_foreign` FOREIGN KEY (`giro_id`) REFERENCES `giros` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `clientes` */

insert  into `clientes`(`id`,`tipocliente`,`nombreempresa`,`estado_id`,`cp`,`referencias`,`direccionfiscal`,`estatuscliente`,`rfc`,`contacto_id`,`giro_id`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'Empresa','DSW',1,53273,'Enfrente de la iglesia','Edo Mex','Habitual','COLO9910230HMCHPM06',2,1,NULL,'2022-05-25 03:09:15','2022-05-25 03:09:15'),
(2,'Empresa','Selkar',1,53273,'Enfrente de la iglesia','Edo Mex','Prospecto','COLO9910230HMCHPM06',1,2,NULL,'2022-05-25 03:09:15','2022-05-25 03:09:15'),
(3,'Empresa','SIPRO',1,53273,'Enfrente de la iglesia','Enfrente de la iglesia','Ocacional','COLO9910230HMCHPM06',3,3,NULL,'2022-05-25 03:09:15','2022-05-25 03:09:15'),
(4,'Empresa','Barcel',1,53273,'a 2 min de plaza sendero','Campeche','Frecuente','COLO9910230HMCHPM06',3,4,NULL,'2022-05-25 03:09:15','2022-05-25 03:09:15');

/*Table structure for table `contactos` */

DROP TABLE IF EXISTS `contactos`;

CREATE TABLE `contactos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contacto1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contactos` */

insert  into `contactos`(`id`,`contacto1`,`email1`,`telefono1`,`descripcion`,`created_at`,`updated_at`) values 
(1,'Omar','omar.13.chong@gmail.com','7221923091','Informacion servicios','2022-05-25 03:09:14','2022-05-25 03:09:14'),
(2,'Sonia','sonia@gmail.com','009823914','Pruebas piloto','2022-05-25 03:09:15','2022-05-25 03:09:15'),
(3,'Cristhian Zacarias Diaz','cris.diaz@gmail.com','889123456','diseño logos','2022-05-25 03:09:15','2022-05-25 03:09:15'),
(4,'Karen Perez Juarez','Karen.perez@gmail.com','7711223300','Informacion servicios','2022-05-25 03:09:15','2022-05-25 03:09:15'),
(5,'Hector Bastida Barcenas','hector@dsw.com','0925712345','Sitio web','2022-05-25 03:09:15','2022-05-25 03:09:15');

/*Table structure for table `estados` */

DROP TABLE IF EXISTS `estados`;

CREATE TABLE `estados` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `clave` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abrev` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `estados` */

insert  into `estados`(`id`,`clave`,`nombre`,`abrev`,`activo`,`created_at`,`updated_at`) values 
(1,'01','Aguascalientes','Ags.','1',NULL,NULL),
(2,'02','Baja California','BC.','1',NULL,NULL),
(3,'03','Baja California Sur','BCS.','1',NULL,NULL),
(4,'04','Campeche','Camp.','1',NULL,NULL);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `giros` */

DROP TABLE IF EXISTS `giros`;

CREATE TABLE `giros` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `giros` */

insert  into `giros`(`id`,`nombre`,`descripcion`,`created_at`,`updated_at`) values 
(1,'TIC','Tecnologias de la informacion',NULL,NULL),
(2,'Marketing','Ventas y mercadotecnia',NULL,NULL),
(3,'Deportes','Deportes',NULL,NULL),
(4,'RH','Recursos humanos',NULL,NULL),
(5,'Abarrotes','Abarrotes',NULL,NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),
(4,'2019_08_19_000000_create_failed_jobs_table',1),
(5,'2019_12_14_000001_create_personal_access_tokens_table',1),
(6,'2022_05_22_222215_create_contactos_table',1),
(7,'2022_05_22_222612_create_giros_table',1),
(8,'2022_05_22_222728_create_estados_table',1),
(9,'2022_05_22_222807_create_municipios_table',1),
(10,'2022_05_23_221939_create_sessions_table',1),
(11,'2022_05_24_010922_create_clientes_table',1);

/*Table structure for table `municipios` */

DROP TABLE IF EXISTS `municipios`;

CREATE TABLE `municipios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `clave` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `municipios_estado_id_foreign` (`estado_id`),
  CONSTRAINT `municipios_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `municipios` */

insert  into `municipios`(`id`,`clave`,`nombre`,`activo`,`estado_id`,`created_at`,`updated_at`) values 
(1,'001','Aguascalientes','1',1,NULL,NULL),
(2,'002','Asientos','1',1,NULL,NULL),
(3,'003','Baja Calvillo','1',1,NULL,NULL),
(4,'004','Cosío','1',1,NULL,NULL),
(5,'005','Jesús María','1',1,NULL,NULL),
(6,'006','Pabellón de Arteaga','1',1,NULL,NULL),
(7,'007','Rincón de Romos','1',1,NULL,NULL),
(8,'008','San José de Gracia','1',1,NULL,NULL),
(9,'009','Tepezalá','1',1,NULL,NULL),
(10,'010','El Llano','1',1,NULL,NULL),
(11,'011','San Francisco de los Romo','1',1,NULL,NULL),
(12,'012','Ensenada','1',2,NULL,NULL),
(13,'013','Mexicali','1',2,NULL,NULL),
(14,'014','Tecate','1',2,NULL,NULL),
(15,'015','Tijuana','1',2,NULL,NULL),
(16,'016','Playas de Rosarito','1',2,NULL,NULL),
(17,'017','San Quintín','1',2,NULL,NULL),
(18,'018','Comondú','1',3,NULL,NULL),
(19,'019','Mulegé','1',3,NULL,NULL),
(20,'20','La Paz','1',3,NULL,NULL),
(21,'21','Los Cabos','1',3,NULL,NULL),
(22,'22','Loreto','1',3,NULL,NULL),
(23,'23','Calkiní Roo','1',4,NULL,NULL),
(24,'24','Campeche','1',4,NULL,NULL),
(25,'25  ','Carmen','1',4,NULL,NULL),
(26,'26','Champotón','1',4,NULL,NULL),
(27,'27','Hecelchakán.','1',4,NULL,NULL),
(28,'28','Hopelchén','1',4,NULL,NULL),
(29,'29','Palizada','1',4,NULL,NULL),
(30,'30','Tenabo','1',4,NULL,NULL),
(31,'31','Escárcega','1',4,NULL,NULL),
(32,'32','Candelaria','1',4,NULL,NULL),
(33,'32','Seybaplaya','1',4,NULL,NULL);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
