CREATE DATABASE  IF NOT EXISTS `game` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `game`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: game
-- ------------------------------------------------------
-- Server version	5.7.16-log

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
-- Table structure for table `antwort`
--

DROP TABLE IF EXISTS `antwort`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `antwort` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `antwort` varchar(255) DEFAULT NULL,
  `is_korrekt` tinyint(1) DEFAULT NULL,
  `frage_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `frage_id` (`frage_id`),
  CONSTRAINT `antwort_ibfk_1` FOREIGN KEY (`frage_id`) REFERENCES `frage` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `antwort`
--

LOCK TABLES `antwort` WRITE;
/*!40000 ALTER TABLE `antwort` DISABLE KEYS */;
/*!40000 ALTER TABLE `antwort` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `benutzer`
--

DROP TABLE IF EXISTS `benutzer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `benutzer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `benutzername` varchar(120) DEFAULT NULL,
  `passwort` varchar(120) DEFAULT NULL,
  `ist_admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `benutzer`
--

LOCK TABLES `benutzer` WRITE;
/*!40000 ALTER TABLE `benutzer` DISABLE KEYS */;
/*!40000 ALTER TABLE `benutzer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frage`
--

DROP TABLE IF EXISTS `frage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text,
  `moralfrage` tinyint(1) DEFAULT NULL,
  `freigegeben` tinyint(1) DEFAULT NULL,
  `erstellt_von` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `erstellt_von` (`erstellt_von`),
  CONSTRAINT `frage_ibfk_1` FOREIGN KEY (`erstellt_von`) REFERENCES `benutzer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frage`
--

LOCK TABLES `frage` WRITE;
/*!40000 ALTER TABLE `frage` DISABLE KEYS */;
/*!40000 ALTER TABLE `frage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `geantwortet`
--

DROP TABLE IF EXISTS `geantwortet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `geantwortet` (
  `id` int(11) DEFAULT NULL,
  `person_id` int(11) DEFAULT NULL,
  `antwort_id` int(11) DEFAULT NULL,
  `zeit` datetime DEFAULT NULL,
  KEY `person_id` (`person_id`),
  KEY `antwort_id` (`antwort_id`),
  CONSTRAINT `geantwortet_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `benutzer` (`id`),
  CONSTRAINT `geantwortet_ibfk_2` FOREIGN KEY (`antwort_id`) REFERENCES `antwort` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `geantwortet`
--

LOCK TABLES `geantwortet` WRITE;
/*!40000 ALTER TABLE `geantwortet` DISABLE KEYS */;
/*!40000 ALTER TABLE `geantwortet` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-15 15:33:49
