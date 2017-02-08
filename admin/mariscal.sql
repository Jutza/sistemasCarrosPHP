# MySQL-Front 5.1  (Build 1.5)

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;


# Host: localhost    Database: mariscal
# ------------------------------------------------------
# Server version 5.1.50-community

CREATE DATABASE `mariscal` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `mariscal`;

#
# Source for table ciudad
#

CREATE TABLE `ciudad` (
  `id_ciu` bigint(20) NOT NULL AUTO_INCREMENT,
  `nomb_ciu` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_ciu`),
  UNIQUE KEY `unique_ciu` (`nomb_ciu`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Dumping data for table ciudad
#
LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;

INSERT INTO `ciudad` VALUES (1,'hermosillo');
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table clientes
#

CREATE TABLE `clientes` (
  `cli` bigint(20) NOT NULL AUTO_INCREMENT,
  `nomb_cli` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ap_cli` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `am_cli` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `calle_cli` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `numc_cli` int(5) NOT NULL,
  `colonia_cli` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cp_cli` int(6) NOT NULL,
  `id_ciuf` bigint(20) NOT NULL,
  `limcredito` decimal(15,2) NOT NULL,
  PRIMARY KEY (`cli`),
  UNIQUE KEY `unique_napamcnc` (`nomb_cli`,`ap_cli`,`am_cli`,`calle_cli`,`numc_cli`,`colonia_cli`),
  KEY `fk_cli_ciu` (`id_ciuf`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Dumping data for table clientes
#
LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;

INSERT INTO `clientes` VALUES (1,'Luis','Gomez','Fuentes','calle 3',342,'apolo',23100,1,3000);
INSERT INTO `clientes` VALUES (2,'carmen','perez','moncha','conocida',52,'olivares',528785,1,5000);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table detalles
#

CREATE TABLE `detalles` (
  `det` bigint(20) NOT NULL AUTO_INCREMENT,
  `foliof` bigint(20) NOT NULL,
  `prodf` bigint(20) NOT NULL,
  `cantidad` bigint(20) NOT NULL,
  PRIMARY KEY (`det`),
  KEY `fk_folio_det` (`foliof`),
  KEY `fk_prod_det` (`prodf`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Dumping data for table detalles
#
LOCK TABLES `detalles` WRITE;
/*!40000 ALTER TABLE `detalles` DISABLE KEYS */;

INSERT INTO `detalles` VALUES (1,1,1,5);
INSERT INTO `detalles` VALUES (2,2,2,50);
INSERT INTO `detalles` VALUES (3,1,2,5000);
INSERT INTO `detalles` VALUES (4,2,1,25);
INSERT INTO `detalles` VALUES (5,1,1,55);
/*!40000 ALTER TABLE `detalles` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table facturas
#

CREATE TABLE `facturas` (
  `folio` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `acredito` tinyint(1) NOT NULL,
  `clif` bigint(20) NOT NULL,
  PRIMARY KEY (`folio`),
  KEY `fk_fac_cli` (`clif`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Dumping data for table facturas
#
LOCK TABLES `facturas` WRITE;
/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;

INSERT INTO `facturas` VALUES (1,'2014-01-01',0,1);
INSERT INTO `facturas` VALUES (2,'2016-09-22',0,2);
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table productos
#

CREATE TABLE `productos` (
  `prod` bigint(20) NOT NULL AUTO_INCREMENT,
  `producto` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `precio` decimal(15,2) NOT NULL,
  `existencia` bigint(20) NOT NULL,
  `reorden` bigint(20) NOT NULL,
  PRIMARY KEY (`prod`),
  UNIQUE KEY `unique_producto` (`producto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Dumping data for table productos
#
LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;

INSERT INTO `productos` VALUES (1,'bolsa',60,25,1);
INSERT INTO `productos` VALUES (2,'inodoro',5600,50000,500);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table usuarios
#

CREATE TABLE `usuarios` (
  `id_usu` bigint(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contrasena` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ocupacion` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Dumping data for table usuarios
#
LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;

INSERT INTO `usuarios` VALUES (1,'1','1','Jose Canseco','Analista','9.jpg');
INSERT INTO `usuarios` VALUES (2,'2','2','Karla Fonseca','Tester','7.jpg');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

#
#  Foreign keys for table clientes
#

ALTER TABLE `clientes`
ADD CONSTRAINT `fk_cli_ciu` FOREIGN KEY (`id_ciuf`) REFERENCES `ciudad` (`id_ciu`);

#
#  Foreign keys for table detalles
#

ALTER TABLE `detalles`
ADD CONSTRAINT `fk_folio_det` FOREIGN KEY (`foliof`) REFERENCES `facturas` (`folio`),
ADD CONSTRAINT `fk_prod_det` FOREIGN KEY (`prodf`) REFERENCES `productos` (`prod`);

#
#  Foreign keys for table facturas
#

ALTER TABLE `facturas`
ADD CONSTRAINT `fk_fac_cli` FOREIGN KEY (`clif`) REFERENCES `clientes` (`cli`);


/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
