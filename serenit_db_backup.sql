/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 10.4.24-MariaDB-log : Database - serenit_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`serenit_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `serenit_db`;

/*Table structure for table `citas_terapia` */

DROP TABLE IF EXISTS `citas_terapia`;

CREATE TABLE `citas_terapia` (
  `id_cita` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_terapeuta` int(11) NOT NULL,
  `fecha_cita` date NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_cita`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_terapeuta` (`id_terapeuta`),
  CONSTRAINT `citas_terapia_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `citas_terapia_ibfk_2` FOREIGN KEY (`id_terapeuta`) REFERENCES `terapeutas` (`id_terapeuta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `citas_terapia` */

insert  into `citas_terapia`(`id_cita`,`id_usuario`,`id_terapeuta`,`fecha_cita`,`estado`) values 
(1,1,1,'2024-07-15',1),
(2,2,2,'2024-07-20',0),
(3,3,3,'2024-07-25',1);

/*Table structure for table `detalles_seguimiento_recursos` */

DROP TABLE IF EXISTS `detalles_seguimiento_recursos`;

CREATE TABLE `detalles_seguimiento_recursos` (
  `id_recurso` int(11) NOT NULL,
  `id_seguimiento` int(11) NOT NULL,
  `fecha_acceso_recurso` date NOT NULL,
  PRIMARY KEY (`id_recurso`,`id_seguimiento`),
  KEY `id_seguimiento` (`id_seguimiento`),
  CONSTRAINT `detalles_seguimiento_recursos_ibfk_1` FOREIGN KEY (`id_recurso`) REFERENCES `recursos` (`id_recurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `detalles_seguimiento_recursos_ibfk_2` FOREIGN KEY (`id_seguimiento`) REFERENCES `seguimientos_usuarios` (`id_seguimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `detalles_seguimiento_recursos` */

/*Table structure for table `estados_animo` */

DROP TABLE IF EXISTS `estados_animo`;

CREATE TABLE `estados_animo` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_tipo_estado_animo` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id_estado`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_tipo_estado_animo` (`id_tipo_estado_animo`),
  CONSTRAINT `estados_animo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `estados_animo_ibfk_2` FOREIGN KEY (`id_tipo_estado_animo`) REFERENCES `tipos_estados_animo` (`id_tipo_estado_animo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `estados_animo` */

insert  into `estados_animo`(`id_estado`,`id_usuario`,`id_tipo_estado_animo`,`fecha_registro`) values 
(1,1,1,'2024-07-10'),
(2,2,2,'2024-07-15'),
(3,3,3,'2024-07-20');

/*Table structure for table `recursos` */

DROP TABLE IF EXISTS `recursos`;

CREATE TABLE `recursos` (
  `id_recurso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_recurso` varchar(100) NOT NULL,
  `tipo_recurso` tinyint(1) NOT NULL,
  `descripcion_recurso` varchar(250) NOT NULL,
  `enlace_recurso` varchar(150) NOT NULL,
  PRIMARY KEY (`id_recurso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `recursos` */

insert  into `recursos`(`id_recurso`,`nombre_recurso`,`tipo_recurso`,`descripcion_recurso`,`enlace_recurso`) values 
(1,'Guía de Autoayuda',1,'Guía para mejorar la salud mental','http://recursos.com/autoayuda'),
(2,'Video de Relajación',0,'Ejercicios de respiración y relajación','http://recursos.com/relajacion'),
(3,'Artículo sobre Ansiedad',1,'Información sobre cómo manejar la ansiedad','http://recursos.com/ansiedad');

/*Table structure for table `seguimientos_usuarios` */

DROP TABLE IF EXISTS `seguimientos_usuarios`;

CREATE TABLE `seguimientos_usuarios` (
  `id_seguimiento` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `fecha_seguimiento` date NOT NULL,
  PRIMARY KEY (`id_seguimiento`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `seguimientos_usuarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `seguimientos_usuarios` */

/*Table structure for table `tareas` */

DROP TABLE IF EXISTS `tareas`;

CREATE TABLE `tareas` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `fecha_tarea` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_evento`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `tareas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tareas` */

insert  into `tareas`(`id_evento`,`id_usuario`,`titulo`,`descripcion`,`fecha_tarea`,`created_at`,`updated_at`) values 
(1,1,'Ejercicio de Meditación','Realizar 10 minutos de meditación diaria','2024-07-12','2025-03-26 21:12:52','2025-03-26 21:12:52'),
(2,2,'Escribir Diario','Anotar pensamientos y emociones cada noche','2024-07-18','2025-03-26 21:12:52','2025-03-26 21:12:52'),
(3,3,'Hacer Ejercicio','Salir a caminar durante 30 minutos','2024-07-22','2025-03-26 21:12:52','2025-03-26 21:12:52');

/*Table structure for table `terapeutas` */

DROP TABLE IF EXISTS `terapeutas`;

CREATE TABLE `terapeutas` (
  `id_terapeuta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_terapeuta` varchar(150) NOT NULL,
  `especialidad` varchar(80) NOT NULL,
  `email_terapeuta` varchar(100) NOT NULL,
  `celular_terapeuta` varchar(20) NOT NULL,
  PRIMARY KEY (`id_terapeuta`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `terapeutas` */

insert  into `terapeutas`(`id_terapeuta`,`nombre_terapeuta`,`especialidad`,`email_terapeuta`,`celular_terapeuta`) values 
(1,'Dr. Juan Pérez','Psicología Clínica','juan.perez@email.com','5523456789'),
(2,'Dra. Ana Gómez','Terapia Familiar','ana.gomez@email.com','5512345678'),
(3,'Lic. Roberto Díaz','Psicoterapia Infantil','roberto.diaz@email.com','5545678901');

/*Table structure for table `tipos_estados_animo` */

DROP TABLE IF EXISTS `tipos_estados_animo`;

CREATE TABLE `tipos_estados_animo` (
  `id_tipo_estado_animo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_estado_animo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipos_estados_animo` */

insert  into `tipos_estados_animo`(`id_tipo_estado_animo`,`nombre_tipo`,`descripcion`) values 
(1,'Feliz','Estado de felicidad y satisfacción'),
(2,'Ansioso','Estado de preocupación constante'),
(3,'Triste','Estado de melancolía y depresión');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido_pat` varchar(100) NOT NULL,
  `apellido_mat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id_usuario`,`nombre`,`apellido_pat`,`apellido_mat`,`email`,`username`,`contrasenia`,`created_at`,`updated_at`) values 
(1,'Carlos','Ramírez','López','carlos.ramirez@email.com','carlosr','pass1234','2025-03-26 21:12:52','2025-03-26 21:12:52'),
(2,'María','García','Fernández','maria.garcia@email.com','mariag','clave5678','2025-03-26 21:12:52','2025-03-26 21:12:52'),
(3,'José','Hernández','Sánchez','jose.hernandez@email.com','joseh','secreto90','2025-03-26 21:12:52','2025-03-26 21:12:52');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
