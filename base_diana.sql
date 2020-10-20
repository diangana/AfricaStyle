-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: base_diana
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu18.04.1

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
-- Current Database: `base_diana`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `base_diana` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `base_diana`;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  `prenom` varchar(80) NOT NULL,
  `adresse` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'diangana','diana','di.diana@live.fr'),(7,'do','jean','jeando@gmail.com');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuisine`
--

DROP TABLE IF EXISTS `cuisine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuisine` (
  `id` int(11) NOT NULL,
  `plas` varchar(100) NOT NULL,
  `ingredients` text NOT NULL,
  `recette` text NOT NULL,
  `id_image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuisine`
--

LOCK TABLES `cuisine` WRITE;
/*!40000 ALTER TABLE `cuisine` DISABLE KEYS */;
INSERT INTO `cuisine` VALUES (1,'begniet senegalais','Vos ingredients:\r\nfarine\r\nlait \r\nsucre\r\noeuf\r\nlevure chimique','',''),(2,'begniet senegalais','Vos ingredients:\r\n','Votre recettes:\r\n',''),(3,'begniet senegalais','Vos ingredients:\r\n','Votre recettes:\r\n',''),(4,'begniet senegalais','Vos ingredients:\r\n','Votre recettes:\r\n',''),(5,'begniet senegalais','Vos ingredients:\r\n','Votre recettes:\r\n',''),(6,'fff','Vos ingredients:\r\n','Votre recettes:\r\n',''),(7,'fff','Vos ingredients:\r\n','Votre recettes:\r\n',''),(8,'fff','Vos ingredients:\r\n','Votre recettes:\r\n',''),(9,'','','',''),(10,'fff','Vos ingredients:\r\n','Votre recettes:\r\n',''),(11,'fff','Vos ingredients:\r\n','Beignet.webp',''),(12,'fff','Vos ingredients:\r\n','Beignet.webp',''),(13,'fff','Vos ingredients:\r\n','Votre recettes:\r\n',''),(14,'azz','Vos ingredients:\r\n','',''),(15,'cc','Vos ingredients:\r\n','Votre recettes:cc',''),(16,'cc','Vos ingredients:\r\n','Votre recettes:cc',''),(17,'fff','Vos ingredients:\r\n','Votre recettes:\r\n',''),(18,'fff','Vos ingredients:\r\n','Beignet.webp',''),(19,'e','Vos ingredients:\r\n','Beignet.webp','');
/*!40000 ALTER TABLE `cuisine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuisines`
--

DROP TABLE IF EXISTS `cuisines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuisines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plas` varchar(100) NOT NULL,
  `ingredients` text NOT NULL,
  `recette` text NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuisines`
--

LOCK TABLES `cuisines` WRITE;
/*!40000 ALTER TABLE `cuisines` DISABLE KEYS */;
INSERT INTO `cuisines` VALUES (1,'begniet senegalais','Vos ingredients:\r\noeuf\r\nfarine\r\n levure\r\nlait\r\nsucre','Beignet.webp','Beignet.webp'),(2,'begniet senegalais','Vos ingredients:\r\noeuf \r\nfarine\r\nlevure chimique\r\nlait\r\nsucre','Votre recettes:\r\ntout melanger \r\nfaire frire petit a petit','Beignet.webp'),(3,'begniet senegalais','Vos ingredients:\r\n','Votre recettes:\r\n','Beignet.webp');
/*!40000 ALTER TABLE `cuisines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fav_cuisines`
--

DROP TABLE IF EXISTS `fav_cuisines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fav_cuisines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cuisine` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fav_cuisines`
--

LOCK TABLES `fav_cuisines` WRITE;
/*!40000 ALTER TABLE `fav_cuisines` DISABLE KEYS */;
INSERT INTO `fav_cuisines` VALUES (1,1,3);
/*!40000 ALTER TABLE `fav_cuisines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fav_style`
--

DROP TABLE IF EXISTS `fav_style`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fav_style` (
  `id_fav_style` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `id_style` tinyint(4) unsigned NOT NULL,
  `id` tinyint(4) unsigned NOT NULL,
  PRIMARY KEY (`id_fav_style`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fav_style`
--

LOCK TABLES `fav_style` WRITE;
/*!40000 ALTER TABLE `fav_style` DISABLE KEYS */;
/*!40000 ALTER TABLE `fav_style` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `id_image` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id_image`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `log` (`pseudo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'diana','azerty'),(2,'AZ','AZ'),(3,'dianaa','a');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `style`
--

DROP TABLE IF EXISTS `style`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `style` (
  `id_style` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `description` text,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id_style`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `style`
--

LOCK TABLES `style` WRITE;
/*!40000 ALTER TABLE `style` DISABLE KEYS */;
INSERT INTO `style` VALUES (1,'afrique.jpeg','',''),(2,'afrique.jpeg','',''),(3,'afrique.jpeg','',''),(4,'afrique.jpeg','',''),(5,'afrique.jpeg','wawa',''),(6,'ankara.jpg','tres joili','ankara'),(7,'africa.jpg','parfait','paysage');
/*!40000 ALTER TABLE `style` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-12 12:44:32
