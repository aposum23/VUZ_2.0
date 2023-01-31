-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: yii2basic
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `audience`
--

DROP TABLE IF EXISTS `audience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `audience` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parent_subdivision` int NOT NULL,
  `type` int NOT NULL,
  `anumber` int DEFAULT NULL,
  `length` float DEFAULT NULL,
  `width` float DEFAULT NULL,
  `seats_count` int DEFAULT NULL,
  `floor` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-audience-parent_subdivision` (`parent_subdivision`),
  KEY `fk-audience-type` (`type`),
  CONSTRAINT `fk-audience-parent_subdivision` FOREIGN KEY (`parent_subdivision`) REFERENCES `subdivision` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-audience-type` FOREIGN KEY (`type`) REFERENCES `audiencetype` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audience`
--

LOCK TABLES `audience` WRITE;
/*!40000 ALTER TABLE `audience` DISABLE KEYS */;
INSERT INTO `audience` VALUES (1,1,1,152,10,10,19,1),(2,1,2,132,3,4.5,6,1),(3,1,3,107,10,5,20,1),(4,1,1,140,4,3,4,1),(5,2,2,307,6,5,12,3),(6,2,1,320,6,6,20,3),(7,3,2,550,6,3,10,5),(8,3,3,530,8,9,25,5),(9,3,1,515,6,7,24,5),(12,1,1,100,10,10.5,30,1),(13,1,1,101,15,15,30,1),(14,1,3,102,5.5,5,6,1),(15,5,3,329,6.3,7,10,3),(16,1,3,153,3,5,15,1),(17,1,2,172,4,4,10,1),(18,1,2,135,4,4,10,1),(19,3,3,523,3,4,14,5),(20,5,3,521,4,4,16,5),(21,4,3,202,4,4,15,2),(22,2,2,345,2,6,10,3),(23,1,3,126,3,7,15,1),(24,2,3,363,6,6,25,3);
/*!40000 ALTER TABLE `audience` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-31 21:20:16
