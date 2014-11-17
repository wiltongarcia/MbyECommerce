# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.27)
# Database: mby_ecommerce
# Generation Time: 2014-11-17 18:40:00 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table addresses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `addresses`;

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `street` text NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip_code` char(9) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id_idxfk` (`user_id`),
  CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;

INSERT INTO `addresses` (`id`, `user_id`, `street`, `city`, `zip_code`, `status`, `updated_at`, `created_at`)
VALUES
	(1,1,'Rua Carlo Pallavicino, 260 BL06 Ap 74','Sâo Paulo','02993110',1,'2014-11-17 16:30:37','2014-11-17 16:30:37'),
	(2,2,'Rua Carlo Pallavicino, 260 BL06 Ap 74','Sâo Paulo','02993110',1,'2014-11-17 16:35:49','2014-11-17 16:35:49'),
	(3,3,'Rua Carlo Pallavicino, 260 BL06 Ap 74','Sâo Paulo','02993110',1,'2014-11-17 16:36:28','2014-11-17 16:36:28'),
	(4,4,'Rua Carlo Pallavicino, 260 BL06 Ap 74','Sâo Paulo','02993110',1,'2014-11-17 16:37:10','2014-11-17 16:37:10');

/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `title`, `description`, `status`, `updated_at`, `created_at`)
VALUES
	(1,'Roupas','',1,'2014-11-17 16:00:06','2014-11-17 16:00:06'),
	(2,'Acessórios','',1,'2014-11-17 16:00:13','2014-11-17 16:00:13'),
	(3,'Calçados','',1,'2014-11-17 16:00:40','2014-11-17 16:00:40');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table characteristics
# ------------------------------------------------------------

DROP TABLE IF EXISTS `characteristics`;

CREATE TABLE `characteristics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `characteristics` WRITE;
/*!40000 ALTER TABLE `characteristics` DISABLE KEYS */;

INSERT INTO `characteristics` (`id`, `title`, `description`, `status`, `updated_at`, `created_at`)
VALUES
	(1,'Cintura','Baixa',1,'2014-11-17 16:01:38','0000-00-00 00:00:00'),
	(2,'bordado','bordado italiano',1,'2014-11-17 16:04:21','0000-00-00 00:00:00'),
	(3,'tecido','linho',1,'2014-11-17 16:05:25','0000-00-00 00:00:00'),
	(4,'moletom','tecido bem quentinho',1,'2014-11-17 16:08:19','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `characteristics` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order_addresses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_addresses`;

CREATE TABLE `order_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `order_id_idxfk` (`order_id`),
  KEY `address_id_idxfk` (`address_id`),
  CONSTRAINT `order_addresses_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  CONSTRAINT `order_addresses_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `order_addresses` WRITE;
/*!40000 ALTER TABLE `order_addresses` DISABLE KEYS */;

INSERT INTO `order_addresses` (`id`, `order_id`, `address_id`, `updated_at`, `created_at`)
VALUES
	(1,1,1,'2014-11-17 16:30:37','2014-11-17 16:30:37'),
	(2,2,2,'2014-11-17 16:35:49','2014-11-17 16:35:49'),
	(3,3,3,'2014-11-17 16:36:28','2014-11-17 16:36:28'),
	(4,4,4,'2014-11-17 16:37:10','2014-11-17 16:37:10');

/*!40000 ALTER TABLE `order_addresses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order_items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_items`;

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `order_id_idxfk` (`order_id`),
  KEY `product_id_idxfk` (`product_id`),
  CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `price`, `quantity`, `total`, `status`, `updated_at`, `created_at`)
VALUES
	(1,1,1,100.00,1,100.00,1,'2014-11-17 16:30:37','2014-11-17 16:30:37'),
	(2,1,2,50.00,1,50.00,1,'2014-11-17 16:30:37','2014-11-17 16:30:37'),
	(3,2,1,100.00,1,100.00,1,'2014-11-17 16:35:49','2014-11-17 16:35:49'),
	(4,2,2,50.00,1,50.00,1,'2014-11-17 16:35:49','2014-11-17 16:35:49'),
	(5,3,1,100.00,1,100.00,1,'2014-11-17 16:36:28','2014-11-17 16:36:28'),
	(6,3,2,50.00,1,50.00,1,'2014-11-17 16:36:28','2014-11-17 16:36:28'),
	(7,4,1,100.00,1,100.00,1,'2014-11-17 16:37:10','2014-11-17 16:37:10'),
	(8,4,2,50.00,1,50.00,1,'2014-11-17 16:37:10','2014-11-17 16:37:10');

/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

INSERT INTO `orders` (`id`, `updated_at`, `created_at`)
VALUES
	(1,'2014-11-17 04:30:37','2014-11-17 04:30:37'),
	(2,'2014-11-17 04:35:49','2014-11-17 04:35:49'),
	(3,'2014-11-17 04:36:28','2014-11-17 04:36:28'),
	(4,'2014-11-17 04:37:10','2014-11-17 04:37:10');

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_categories`;

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `product_id_idxfk_1` (`product_id`),
  KEY `category_id_idxfk` (`category_id`),
  CONSTRAINT `product_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `product_categories_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`, `updated_at`, `created_at`)
VALUES
	(1,1,1,'2014-11-17 16:06:11','2014-11-17 16:06:11'),
	(2,2,1,'2014-11-17 16:07:43','2014-11-17 16:07:43');

/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_characteristics
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_characteristics`;

CREATE TABLE `product_characteristics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `characteristic_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `characteristic_id_idxfk` (`characteristic_id`),
  CONSTRAINT `product_characteristics_ibfk_2` FOREIGN KEY (`characteristic_id`) REFERENCES `characteristics` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `product_characteristics` WRITE;
/*!40000 ALTER TABLE `product_characteristics` DISABLE KEYS */;

INSERT INTO `product_characteristics` (`id`, `product_id`, `characteristic_id`, `updated_at`, `created_at`)
VALUES
	(1,1,1,'2014-11-17 16:06:15','2014-11-17 16:06:15'),
	(2,1,3,'2014-11-17 16:06:19','2014-11-17 16:06:19'),
	(3,2,4,'2014-11-17 16:08:29','2014-11-17 16:08:29');

/*!40000 ALTER TABLE `product_characteristics` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `title`, `description`, `image`, `price`, `status`, `updated_at`, `created_at`)
VALUES
	(1,'Calça','Calça jeans azul muito bonita','1416248710calca-jeans-feminina-barata-6.jpg',100.00,1,'2014-11-17 16:06:08','0000-00-00 00:00:00'),
	(2,'Blusa','Blusa azul bem bonita','1416248658blusa-moletom-domyos_12148843_1954321.jpg',50.00,1,'2014-11-17 16:07:38','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sex` enum('F','M') NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `sex`, `email`, `password`, `salt`, `status`, `updated_at`, `created_at`)
VALUES
	(1,'Wilton de Oliveira garcia','M','wiltongarcia@hotmail.com','$1$h4uettM7$X2Qes5VbQ73QiIJXuUOnK1','$1$h4uettM7$sAahkhjJ0BhnnK.Wasjaz1',1,'2014-11-17 16:30:37','2014-11-17 16:30:37'),
	(2,'Wilton de Oliveira garcia','M','wiltongarcia@hotmail.com','$1$sSayHkr9$MqeEK4B44xxOgKiwVNRGl/','$1$sSayHkr9$jsM83MerTTxZbp.P04IXr0',1,'2014-11-17 16:35:49','2014-11-17 16:35:49'),
	(3,'Wilton de Oliveira garcia','M','wiltongarcia@hotmail.com','$1$RW/NRpKB$jUhBD371uxryu6GwlvSfi1','$1$RW/NRpKB$YQHGSk.awSVyLCoINDuc60',1,'2014-11-17 16:36:28','2014-11-17 16:36:28'),
	(4,'Wilton de Oliveira garcia','M','wiltongarcia@hotmail.com','$1$3M/P1m1F$cOPyQtWz7k5KXkfOin7gb0','$1$3M/P1m1F$bDj6liRWNAF.xAfyhGVkW/',1,'2014-11-17 16:37:10','2014-11-17 16:37:10');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
