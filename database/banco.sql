/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.17 : Database - judplus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`judplus` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `judplus`;

/*Table structure for table `advogado` */

DROP TABLE IF EXISTS `advogado`;

CREATE TABLE `advogado` (
  `id_pessoa` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `oab` varchar(255) DEFAULT NULL,
  `descobrir` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pessoa`,`id_empresa`),
  KEY `fk_advogado_empresa` (`id_empresa`),
  CONSTRAINT `fk_advogado_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`),
  CONSTRAINT `fk_advogado_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `advogado` */

insert  into `advogado`(`id_pessoa`,`id_empresa`,`oab`,`descobrir`) values (1,1,'RJ2321321',1),(2,1,'RJ5465465',0);

/*Table structure for table `assistente` */

DROP TABLE IF EXISTS `assistente`;

CREATE TABLE `assistente` (
  `id_pessoa` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_pessoa`,`id_empresa`),
  KEY `fk_assistente_empresa` (`id_empresa`),
  CONSTRAINT `fk_assistente_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`),
  CONSTRAINT `fk_assistente_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `assistente` */

insert  into `assistente`(`id_pessoa`,`id_empresa`) values (3,1);

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id_pessoa` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_pessoa`),
  KEY `fk_cliente_empresa` (`id_empresa`),
  CONSTRAINT `fk_cliente_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`),
  CONSTRAINT `fk_cliente_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cliente` */

insert  into `cliente`(`id_pessoa`,`id_empresa`) values (4,1),(5,1),(6,1),(9,1),(10,1);

/*Table structure for table `empresa` */

DROP TABLE IF EXISTS `empresa`;

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `apelido` varchar(100) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `empresa` */

insert  into `empresa`(`id`,`nome`,`apelido`,`imagem`,`created_at`,`updated_at`,`deleted_at`) values (1,'Barbosa e Santos Advocacia','BS Advocacia','','2016-02-15 17:30:41','2016-02-15 17:30:44',NULL);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`migration`,`batch`) values ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `pessoa` */

DROP TABLE IF EXISTS `pessoa`;

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nascimento` timestamp NULL DEFAULT NULL,
  `sexo` char(1) NOT NULL,
  `cpf_cnpj` varchar(18) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `pessoa` */

insert  into `pessoa`(`id`,`nome`,`email`,`nascimento`,`sexo`,`cpf_cnpj`,`imagem`,`tipo`,`created_at`,`updated_at`,`deleted_at`) values (1,'Isaias Lima dos Santos','isaikki@gmail.com','1981-08-06 15:41:01','m','08507661769',NULL,NULL,'2016-02-11 15:41:45','2016-02-11 15:41:48',NULL),(2,'Barbara Danielly Barbosa dos Santos','babiely@gmail.com','1982-12-04 12:00:00','f','498790090898',NULL,NULL,'2016-02-15 17:33:02','2016-02-15 17:33:04',NULL),(3,'Marciara Barbosa Purificação dos Santos','marciaesf@ibest.com.br','1981-05-01 12:00:02','f','60965980986',NULL,NULL,'2016-02-15 17:34:15','2016-02-15 17:34:18',NULL),(4,'José Alcindo dos Santos','josealcindo@hotmail.com','1981-05-01 12:00:02','m','54065065465',NULL,NULL,'2016-02-16 09:40:50','2016-02-16 09:40:53',NULL),(5,'Maria Dalva da Silva','mdalva@gmail.com','1977-02-02 23:25:03','f','06986546540',NULL,NULL,'2016-02-16 12:31:52','2016-02-16 12:31:54',NULL),(6,'Ademar dos Santos','ademar@gmail.com','1977-02-02 23:25:03','m','35465498096',NULL,NULL,'2016-02-16 12:37:43','2016-02-16 12:37:46',NULL),(9,'Eldemar Quaresma','eldemar@gmail.com','1984-02-07 00:00:00','','40654098796',NULL,NULL,'2016-02-17 17:36:37','2016-02-17 17:36:37',NULL),(10,'Delorean Mozart','delorean@gmail.com','1993-06-15 00:00:00','','60984654965',NULL,NULL,'2016-02-17 17:39:03','2016-02-17 17:39:03',NULL);

/*Table structure for table `telefone` */

DROP TABLE IF EXISTS `telefone`;

CREATE TABLE `telefone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ddd` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `id_pessoa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_telefone_pessoa` (`id_pessoa`),
  KEY `fk_telefone_tipo` (`id_tipo`),
  CONSTRAINT `fk_telefone_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_telefone` (`id`),
  CONSTRAINT `fk_telefone_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `telefone` */

/*Table structure for table `tipo_telefone` */

DROP TABLE IF EXISTS `tipo_telefone`;

CREATE TABLE `tipo_telefone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tipo_telefone` */

insert  into `tipo_telefone`(`id`,`tipo`) values (1,'Residencial'),(2,'Celular'),(3,'Comercial');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`id_empresa`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values (1,NULL,'isaikki@gmail.com','$2y$10$Q/tpmoEDUo5kQciNc3p4Ze8tvSZCILwXoJjYbxDTe5K6tOh8WZV1m',1,'1bQx11urjKoIiZsL6OxPxLgZCbXVAWeNHiE8sg5zMejfQWyLKfYO7q7XLbbn','2016-02-02 18:18:11','2016-02-19 11:39:35',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
