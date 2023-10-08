-- MySQL dump 10.13  Distrib 5.7.41, for Win64 (x86_64)
--
-- Host: localhost    Database: legion_website
-- ------------------------------------------------------
-- Server version	5.7.29

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
-- Table structure for table `access`
--

DROP TABLE IF EXISTS `access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wowid` varchar(100) NOT NULL,
  `level` smallint(6) NOT NULL DEFAULT '0',
  `notes` varchar(100) DEFAULT NULL,
  UNIQUE KEY `access_un` (`id`),
  UNIQUE KEY `access_id_IDX` (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access`
--

LOCK TABLES `access` WRITE;
/*!40000 ALTER TABLE `access` DISABLE KEYS */;
/*!40000 ALTER TABLE `access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cpanel_account`
--

DROP TABLE IF EXISTS `cpanel_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cpanel_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `password` varchar(512) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `notes` varchar(512) DEFAULT NULL,
  UNIQUE KEY `cpanel_account_un` (`id`),
  UNIQUE KEY `cpanel_account_Column1_IDX` (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cpanel_account`
--

LOCK TABLES `cpanel_account` WRITE;
/*!40000 ALTER TABLE `cpanel_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `cpanel_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `downloads`
--

DROP TABLE IF EXISTS `downloads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `downloads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `host` varchar(100) DEFAULT NULL,
  `link` varchar(512) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  UNIQUE KEY `downloads_un` (`id`),
  UNIQUE KEY `downloads_id_IDX` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `downloads`
--

LOCK TABLES `downloads` WRITE;
/*!40000 ALTER TABLE `downloads` DISABLE KEYS */;
INSERT INTO `downloads` VALUES (1,'2023-10-08 20:00:04','MEGA','https://mega.nz',1);
/*!40000 ALTER TABLE `downloads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `body` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `posted_by` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  UNIQUE KEY `news_un` (`id`),
  UNIQUE KEY `news_Column1_IDX` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'small pp','Dolore dolore sunt qui ullamco culpa do ullamco officia labore.Enim ad pariatur duis incididunt adipisicing nostrud. Adipisicing aute eu ipsum amet eiusmod tempor consectetur eiusmod enim sunt consequat velit veniam. Voluptate occaecat sit incididunt mollit tempor. Nostrud mollit officia nostrud cupidatat exercitation minim consectetur cupidatat. Quis tempor dolor cillum sit.','2023-10-08 19:44:36',0,1),(2,'small pp','Dolore dolore sunt qui ullamco culpa do ullamco officia labore.Enim ad pariatur duis incididunt adipisicing nostrud. Adipisicing aute eu ipsum amet eiusmod tempor consectetur eiusmod enim sunt consequat velit veniam. Voluptate occaecat sit incididunt mollit tempor. Nostrud mollit officia nostrud cupidatat exercitation minim consectetur cupidatat. Quis tempor dolor cillum sit.','2023-10-08 19:44:36',0,1),(3,'small pp','Dolore dolore sunt qui ullamco culpa do ullamco officia labore.Enim ad pariatur duis incididunt adipisicing nostrud. Adipisicing aute eu ipsum amet eiusmod tempor consectetur eiusmod enim sunt consequat velit veniam. Voluptate occaecat sit incididunt mollit tempor. Nostrud mollit officia nostrud cupidatat exercitation minim consectetur cupidatat. Quis tempor dolor cillum sit.','2023-10-08 19:44:36',0,1),(4,'small pp','Dolore dolore sunt qui ullamco culpa do ullamco officia labore.Enim ad pariatur duis incididunt adipisicing nostrud. Adipisicing aute eu ipsum amet eiusmod tempor consectetur eiusmod enim sunt consequat velit veniam. Voluptate occaecat sit incididunt mollit tempor. Nostrud mollit officia nostrud cupidatat exercitation minim consectetur cupidatat. Quis tempor dolor cillum sit.','2023-10-08 19:44:36',0,1);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'legion_website'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-08 23:17:50
