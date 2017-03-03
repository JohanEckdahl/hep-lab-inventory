-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: heplab
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.10.1

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
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(20) NOT NULL,
  `table_key` int(20) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(20) NOT NULL,
  `body` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `module` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `sensor_id` int(20) DEFAULT NULL,
  `pcb_id` int(20) DEFAULT NULL,
  `plate_id` int(20) DEFAULT NULL,
  `barcode` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sensor_id` (`sensor_id`),
  KEY `pcb_id` (`pcb_id`),
  KEY `plate_id` (`plate_id`),
  CONSTRAINT `module_ibfk_1` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`),
  CONSTRAINT `module_ibfk_2` FOREIGN KEY (`pcb_id`) REFERENCES `pcb` (`id`),
  CONSTRAINT `module_ibfk_3` FOREIGN KEY (`plate_id`) REFERENCES `plate` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module`
--

LOCK TABLES `module` WRITE;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` VALUES (1,1,1,24,NULL),(2,2,2,25,NULL),(3,3,3,17,NULL),(4,4,4,28,NULL),(5,5,5,29,NULL),(6,6,6,30,NULL),(7,7,7,31,NULL),(8,8,8,32,NULL),(9,9,9,18,NULL),(10,10,10,19,NULL),(11,11,NULL,20,NULL),(12,12,11,33,NULL),(13,13,24,34,NULL),(14,14,12,1,NULL),(15,15,NULL,35,NULL),(16,16,13,21,NULL),(17,17,14,2,NULL),(18,18,NULL,3,NULL),(19,19,15,4,NULL),(20,20,16,5,NULL),(21,21,17,6,NULL),(22,22,18,7,NULL),(23,23,NULL,8,NULL),(24,24,19,9,NULL),(25,33,20,10,NULL),(26,26,21,22,NULL),(27,27,22,23,NULL),(28,34,23,11,NULL);
/*!40000 ALTER TABLE `module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pcb`
--

DROP TABLE IF EXISTS `pcb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pcb` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `identifier` varchar(20) DEFAULT NULL,
  `thickness` float DEFAULT NULL,
  `flatness` float DEFAULT NULL,
  `size` float NOT NULL,
  `channels` int(20) NOT NULL,
  `bonded_skirocs` int(20) DEFAULT NULL,
  `manufacturer` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pcb`
--

LOCK TABLES `pcb` WRITE;
/*!40000 ALTER TABLE `pcb` DISABLE KEYS */;
INSERT INTO `pcb` VALUES (1,NULL,NULL,NULL,6,128,NULL,NULL),(2,NULL,NULL,NULL,6,128,NULL,NULL),(3,NULL,NULL,NULL,6,128,NULL,NULL),(4,NULL,NULL,NULL,6,128,NULL,NULL),(5,NULL,NULL,NULL,6,128,NULL,NULL),(6,NULL,NULL,NULL,6,128,NULL,NULL),(7,NULL,NULL,NULL,6,128,NULL,NULL),(8,NULL,NULL,NULL,6,128,NULL,NULL),(9,NULL,NULL,NULL,6,128,NULL,NULL),(10,NULL,NULL,NULL,6,128,NULL,NULL),(11,NULL,NULL,NULL,6,128,NULL,NULL),(12,NULL,NULL,NULL,6,128,NULL,NULL),(13,NULL,NULL,NULL,6,128,NULL,NULL),(14,NULL,NULL,NULL,6,128,NULL,NULL),(15,NULL,NULL,NULL,6,128,NULL,NULL),(16,NULL,NULL,NULL,6,128,NULL,NULL),(17,NULL,NULL,NULL,6,128,NULL,NULL),(18,NULL,NULL,NULL,6,128,NULL,NULL),(19,NULL,NULL,NULL,6,128,NULL,NULL),(20,NULL,NULL,NULL,6,128,NULL,NULL),(21,NULL,NULL,NULL,6,128,NULL,NULL),(22,NULL,NULL,NULL,6,128,NULL,NULL),(23,NULL,NULL,NULL,6,128,NULL,NULL),(24,'2816005-04',NULL,NULL,6,128,2,NULL);
/*!40000 ALTER TABLE `pcb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plate`
--

DROP TABLE IF EXISTS `plate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plate` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `material` varchar(20) NOT NULL,
  `nom_thickness` float DEFAULT NULL,
  `min_thickness` float DEFAULT NULL,
  `max_thickness` float DEFAULT NULL,
  `flatness` float DEFAULT NULL,
  `kapton` enum('y','n') NOT NULL,
  `size` float NOT NULL,
  `manufacturer` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plate`
--

LOCK TABLES `plate` WRITE;
/*!40000 ALTER TABLE `plate` DISABLE KEYS */;
INSERT INTO `plate` VALUES (1,'CuW',0.57,NULL,NULL,NULL,'y',6,NULL),(2,'CuW',0.57,NULL,NULL,NULL,'y',6,NULL),(3,'CuW',0.57,NULL,NULL,NULL,'y',6,NULL),(4,'CuW',0.57,NULL,NULL,NULL,'y',6,NULL),(5,'CuW',0.57,NULL,NULL,NULL,'y',6,NULL),(6,'CuW',0.57,NULL,NULL,NULL,'y',6,NULL),(7,'CuW',0.57,NULL,NULL,NULL,'y',6,NULL),(8,'CuW',0.57,NULL,NULL,NULL,'y',6,NULL),(9,'CuW',0.57,NULL,NULL,NULL,'y',6,NULL),(10,'CuW',0.57,NULL,NULL,NULL,'y',6,NULL),(11,'CuW',0.57,NULL,NULL,NULL,'y',6,NULL),(12,'CuW',0.57,NULL,NULL,NULL,'y',6,NULL),(13,'CuW',0.57,NULL,NULL,NULL,'n',6,NULL),(14,'CuW',0.57,NULL,NULL,NULL,'n',6,NULL),(15,'CuW',1.1,NULL,NULL,NULL,'n',6,NULL),(16,'CuW',1.12,NULL,NULL,NULL,'y',6,NULL),(17,'CuW',1.18,NULL,NULL,NULL,'y',6,NULL),(18,'CuW',1.18,NULL,NULL,NULL,'y',6,NULL),(19,'CuW',1.18,NULL,NULL,NULL,'y',6,NULL),(20,'CuW',1.18,NULL,NULL,NULL,'y',6,NULL),(21,'CuW',1.18,NULL,NULL,NULL,'y',6,NULL),(22,'CuW',1.18,NULL,NULL,NULL,'y',6,NULL),(23,'CuW',1.18,NULL,NULL,NULL,'y',6,NULL),(24,'CuW',1.18,NULL,NULL,NULL,'y',6,NULL),(25,'CuW',1.18,NULL,NULL,NULL,'y',6,NULL),(26,'CuW',1.18,NULL,NULL,NULL,'y',6,NULL),(27,'CuW',1.18,NULL,NULL,NULL,'y',6,NULL),(28,'CuW',2.2,NULL,NULL,NULL,'y',6,NULL),(29,'CuW',2.2,NULL,NULL,NULL,'y',6,NULL),(30,'CuW',2.2,NULL,NULL,NULL,'y',6,NULL),(31,'CuW',2.2,NULL,NULL,NULL,'y',6,NULL),(32,'CuW',2.2,NULL,NULL,NULL,'y',6,NULL),(33,'CuW',2.2,NULL,NULL,NULL,'y',6,NULL),(34,'CuW',2.2,NULL,NULL,NULL,'y',6,NULL),(35,'CuW',2.2,NULL,NULL,NULL,'y',6,NULL),(36,'CuW',2.2,NULL,NULL,NULL,'n',6,NULL),(37,'CuW',2.2,NULL,NULL,NULL,'n',6,NULL);
/*!40000 ALTER TABLE `plate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sensor`
--

DROP TABLE IF EXISTS `sensor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sensor` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `identifier` varchar(20) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `size` int(20) NOT NULL,
  `channels` int(20) NOT NULL,
  `manufacturer` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sensor`
--

LOCK TABLES `sensor` WRITE;
/*!40000 ALTER TABLE `sensor` DISABLE KEYS */;
INSERT INTO `sensor` VALUES (1,NULL,'200DD',6,128,'HPK'),(2,NULL,'200DD',6,128,'HPK'),(3,NULL,'200DD',6,128,'HPK'),(4,NULL,'200DD',6,128,'HPK'),(5,NULL,'200DD',6,128,'HPK'),(6,NULL,'200DD',6,128,'HPK'),(7,NULL,'200DD',6,128,'HPK'),(8,'3','200DD',6,128,'HPK'),(9,'4','200DD',6,128,'HPK'),(10,'5','200DD',6,128,'HPK'),(11,'6','200DD',6,128,'HPK'),(12,'7','200DD',6,128,'HPK'),(13,'9','200DD',6,128,'HPK'),(14,'11','200DD',6,128,'HPK'),(15,'14','200DD',6,128,'HPK'),(16,'17','200DD',6,128,'HPK'),(17,'19','200DD',6,128,'HPK'),(18,'21','200DD',6,128,'HPK'),(19,'22','200DD',6,128,'HPK'),(20,'28','200DD',6,128,'HPK'),(21,'29','200DD',6,128,'HPK'),(22,'31','200DD',6,128,'HPK'),(23,'32','200DD',6,128,'HPK'),(24,'35','200DD',6,128,'HPK'),(25,'34','200DD',6,128,'HPK'),(26,'36','200DD',6,128,'HPK'),(27,'37','200DD',6,128,'HPK'),(28,'38','200DD',6,128,'HPK'),(29,'39','200DD',6,128,'HPK'),(30,'40','200DD',6,128,'HPK'),(31,'44','200DD',6,128,'HPK'),(32,'45','200DD',6,128,'HPK'),(33,'1001','300STD',6,128,'HPK'),(34,'1002','300STD',6,128,'HPK');
/*!40000 ALTER TABLE `sensor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipment`
--

DROP TABLE IF EXISTS `shipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipment` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `actor` varchar(20) NOT NULL,
  `recipient` varchar(20) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipment`
--

LOCK TABLES `shipment` WRITE;
/*!40000 ALTER TABLE `shipment` DISABLE KEYS */;
INSERT INTO `shipment` VALUES (1,'FNAL','UCSB','2016-06-01'),(2,'UCSB','FNAL','2016-06-02'),(3,'UCSB','UMN','2016-06-08'),(4,'UCSB','FNAL','2016-06-10'),(5,'UCSB','FNAL','2016-06-21'),(6,'UCSB','FNAL','2016-06-30'),(7,'UCSB','FNAL','2016-07-05'),(8,'UCSB','FNAL','2016-07-06');
/*!40000 ALTER TABLE `shipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipment_item`
--

DROP TABLE IF EXISTS `shipment_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipment_item` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `shipment_id` int(20) NOT NULL,
  `table_name` varchar(20) NOT NULL,
  `table_key` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `shipment_id` (`shipment_id`),
  CONSTRAINT `shipment_item_ibfk_1` FOREIGN KEY (`shipment_id`) REFERENCES `shipment` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipment_item`
--

LOCK TABLES `shipment_item` WRITE;
/*!40000 ALTER TABLE `shipment_item` DISABLE KEYS */;
INSERT INTO `shipment_item` VALUES (1,1,'sensor',1),(2,1,'sensor',2),(3,1,'sensor',3),(4,1,'sensor',4),(5,1,'sensor',5),(6,1,'sensor',6),(7,1,'sensor',7),(8,1,'sensor',8),(9,1,'sensor',9),(10,1,'sensor',10),(11,1,'sensor',11),(12,8,'sensor',12),(13,1,'sensor',13),(14,1,'sensor',14),(15,1,'sensor',15),(16,1,'sensor',16),(17,1,'sensor',17),(18,1,'sensor',18),(19,1,'sensor',19),(20,1,'sensor',20),(21,1,'sensor',21),(22,1,'sensor',22),(23,1,'sensor',23),(24,1,'sensor',24),(25,1,'sensor',25),(26,8,'sensor',26),(27,1,'sensor',27),(28,1,'sensor',28),(29,1,'sensor',29),(30,1,'sensor',30),(31,1,'sensor',31),(32,1,'sensor',32),(33,1,'sensor',33),(34,1,'sensor',34),(35,1,'sensor',35),(36,1,'plate',1),(37,1,'plate',2),(38,1,'plate',3),(39,1,'plate',4),(40,1,'plate',5),(41,1,'plate',6),(42,1,'plate',7),(43,1,'plate',8),(44,1,'plate',9),(45,1,'plate',10),(46,1,'plate',11),(47,8,'plate',12),(48,1,'plate',13),(49,1,'plate',14),(50,1,'plate',15),(51,1,'plate',16),(52,1,'plate',17),(53,1,'plate',18),(54,1,'plate',19),(55,1,'plate',20),(56,1,'plate',21),(57,1,'plate',22),(58,1,'plate',23),(59,1,'plate',24),(60,1,'plate',25),(61,8,'plate',26),(62,1,'plate',27),(63,1,'plate',28),(64,1,'plate',29),(65,1,'plate',30),(66,1,'plate',31),(67,1,'plate',32),(68,1,'plate',33),(69,1,'plate',34),(70,1,'plate',35),(71,1,'plate',36),(72,1,'plate',37),(73,3,'module',14),(74,3,'module',17),(75,4,'module',22),(76,5,'module',19),(77,5,'module',24),(78,6,'module',21),(79,6,'module',9),(80,7,'module',20),(81,7,'module',16),(82,7,'module',27),(83,8,'module',12),(84,8,'module',26),(85,2,'module',1),(86,2,'module',2),(87,2,'module',3),(88,2,'module',4),(89,2,'module',5),(90,2,'module',6),(91,2,'module',7),(92,2,'module',8),(93,2,'module',10),(94,2,'module',25),(95,2,'module',28);
/*!40000 ALTER TABLE `shipment_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'JohanEckdahl','hepuser');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-03  0:00:02
