-- MySQL dump 10.13  Distrib 5.7.39, for osx11.0 (x86_64)
--
-- Host: localhost    Database: local_ecf_garage_lts_dev
-- ------------------------------------------------------
-- Server version	5.7.39

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
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,'Peugeot'),(2,'Renault'),(3,'Audi'),(4,'Volkswagen'),(5,'Bmw'),(6,'Mercedes'),(7,'Hyundai'),(8,'Mitsubishi'),(9,'Opel'),(10,'Tesla'),(11,'Fiat'),(13,'Skoda'),(14,'Ford'),(15,'Porsche'),(16,'Chevrolet'),(17,'Mercedes Benz'),(18,'Audi'),(19,'Alfa Romeo'),(20,'Lamborghini');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `garage_id` int(11) DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4C62E638C4FFF555` (`garage_id`),
  CONSTRAINT `FK_4C62E638C4FFF555` FOREIGN KEY (`garage_id`) REFERENCES `garage` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,1,'NUNEZ','Sergio','sergio@nunez.com','0651556530','Bonjour,\r\nMa voiture ne démarre plus et la compagnie d\'assurances m\'a demandé de contacter le garage le plus proche.\r\n\r\nAvez vous la possibilité de m\'appeller afin d\'accorder d\'un RDV ?\r\n\r\nIl faudra prévoir le remorquage de la voiture.\r\n\r\nD\'avance merci.\r\n\r\nSergio NUNEZ','Demande de RDV'),(2,1,'Kum','ARO','kumaro@test.com','0237307204','Je vends ma voiture',NULL),(3,1,'Kum','ARO','kumaro@test.com','0237307204','Je vends ma voiture',NULL),(4,1,'Smith','Nancy','nancy.smith@test.fr','0621514537','Je suis intéressée par la 607 GTI.\r\nPouvons-nous avoir un RDV pour ce vendredi à 16h30 ?\r\n\r\nD\'avance merci.\r\n\r\nNancy',NULL),(5,1,'Voisin','Clara','clara.voisin@test.com','0000000000','Je souhaite estimer mon véhicule.\r\nPourriez-vous m\'appeler pour accorder d\'un RDV.',NULL),(6,1,'Nunez','Sergio','sergio.nunez@email.net','0102030405','Je suis intéressé par ce véhicule et je voudrais savoir si le prix est négociable.','BMW M2 CS');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20231025131938','2023-10-25 13:19:54',568),('DoctrineMigrations\\Version20231101214409','2023-11-01 21:45:47',16),('DoctrineMigrations\\Version20231102193711','2023-11-02 19:38:15',81),('DoctrineMigrations\\Version20231102222633','2023-11-02 22:27:06',76),('DoctrineMigrations\\Version20231103202700','2023-11-03 20:27:40',19),('DoctrineMigrations\\Version20231103202954','2023-11-03 20:30:49',66),('DoctrineMigrations\\Version20231109090917','2023-11-09 09:11:31',48),('DoctrineMigrations\\Version20231110205910','2023-11-10 21:00:00',73),('DoctrineMigrations\\Version20231114104544','2023-11-14 11:46:17',62),('DoctrineMigrations\\Version20231116102721','2023-11-16 11:34:47',67),('DoctrineMigrations\\Version20231120204242','2023-11-20 21:45:04',51),('DoctrineMigrations\\Version20231130210334','2023-11-30 23:39:49',60);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `garage_id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_5D9F75A1E7927C74` (`email`),
  KEY `IDX_5D9F75A1C4FFF555` (`garage_id`),
  CONSTRAINT `FK_5D9F75A1C4FFF555` FOREIGN KEY (`garage_id`) REFERENCES `garage` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (17,1,'admin@garage-parrot.com','[\"ROLE_ADMIN\"]','$2y$13$SqqdE1ElomD5dbvo..U.muyskMcHFuNQ8Ufd8oLuu1BaX4OGf4MKi','ad','min',1),(18,1,'employee@garage-parrot.com','[\"ROLE_EMPLOYEE\", \"ROLE_USER\"]','$2y$13$Wux5OgzKIvCNLQwoErRjSuNAr3imGbQKgG25fZfK4nfTKVdfP/v2G','emplo','yee',0);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `garage`
--

DROP TABLE IF EXISTS `garage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `garage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `garage_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_number` int(11) NOT NULL,
  `street` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` int(11) NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `garage`
--

LOCK TABLES `garage` WRITE;
/*!40000 ALTER TABLE `garage` DISABLE KEYS */;
INSERT INTO `garage` VALUES (1,'Garage Parrot',3,'rue de la tonnellerie',28000,'Chartres','France','0237302828');
/*!40000 ALTER TABLE `garage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `garage_service`
--

DROP TABLE IF EXISTS `garage_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `garage_service` (
  `garage_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`garage_id`,`service_id`),
  KEY `IDX_67DD7642C4FFF555` (`garage_id`),
  KEY `IDX_67DD7642ED5CA9E6` (`service_id`),
  CONSTRAINT `FK_67DD7642C4FFF555` FOREIGN KEY (`garage_id`) REFERENCES `garage` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_67DD7642ED5CA9E6` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `garage_service`
--

LOCK TABLES `garage_service` WRITE;
/*!40000 ALTER TABLE `garage_service` DISABLE KEYS */;
INSERT INTO `garage_service` VALUES (1,1),(1,2),(1,5);
/*!40000 ALTER TABLE `garage_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_C53D045F545317D1` (`vehicle_id`),
  CONSTRAINT `FK_C53D045F545317D1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (1,6,'Photo-1','vehicle-1-655bcf20a89e0257915315.webp',17488,'2023-11-20 22:26:56'),(2,6,'Photo-2','vehicle-2-655bcf5471242817277311.webp',21478,'2023-11-20 22:27:48'),(3,6,'Photo-3','vehicle-3-655bcf8906489113396324.webp',13780,'2023-11-20 22:28:41'),(6,8,'Image de base','gt-65bfef8b4d1a1390299524.jpg',308320,'2024-02-04 21:11:55'),(7,8,'Autre image','gt-1-65bfefb058791504569701.jpg',309539,'2024-02-04 21:12:32'),(8,9,'Image principale','carrera-rs-65bff13b557c1059651364.jpg',299249,'2024-02-04 21:19:07'),(9,9,'Image secondaire','carrera-rs-1-65bff1780f908898628973.jpg',284743,'2024-02-04 21:20:08'),(10,9,'Autre image','carrera-rs-2-65bff199418d0672815921.jpg',305517,'2024-02-04 21:20:41'),(11,10,'Image principale','corvette-zr1-65bff2ff6c120385719400.jpg',309925,'2024-02-04 21:26:39'),(12,10,'Image secondaire','corvette-zr1-1-65bff3147bf8b188666842.jpg',302894,'2024-02-04 21:27:00'),(13,10,'Autre image','corvette-zr1-2-65bff32b30768448373716.jpg',302396,'2024-02-04 21:27:23'),(14,11,'Image principale','twingo-65bff479e1859312996275.jpg',313859,'2024-02-04 21:32:57'),(15,11,'Image secondaire','twingo-1-65bff48c911e1707764880.jpg',313054,'2024-02-04 21:33:16'),(16,11,'Autre image','twingo-2-65bff4a5cd492017420309.jpg',312549,'2024-02-04 21:33:41'),(17,12,'Image principale','twingo-blanche-65bff580d485c735898612.jpg',318391,'2024-02-04 21:37:20'),(18,12,'Image secondaire','twingo-blanche-1-65bff59690456986157842.jpg',317786,'2024-02-04 21:37:42'),(19,12,'Autre image','twingo-blanche-2-65bff5aa53034825942548.jpg',306110,'2024-02-04 21:38:02'),(20,13,'Image principale','sls-amg-black-serie-65bff6fc7c155393990369.jpg',302420,'2024-02-04 21:43:40'),(21,13,'Image secondaire','sls-amg-black-serie-1-65bff70a0de24229702990.jpg',305129,'2024-02-04 21:43:54'),(22,13,'Autre image','sls-amg-black-serie-2-65bff718125ed025920302.jpg',302225,'2024-02-04 21:44:08'),(23,14,'Image principale','r8-jaune-65c7d8f56efab587254081.jpg',305974,'2024-02-10 21:13:41'),(25,14,'Image secondaire','r8-jaune-1-65c7d96ae8d75545083589.jpg',321139,'2024-02-10 21:15:38'),(26,14,'Autre image','r8-jaune-2-65c7d98770a40277704476.jpg',305497,'2024-02-10 21:16:07'),(27,15,'Image principale','4c-spider-65c7da6fb7903730665322.jpg',308792,'2024-02-10 21:19:59'),(28,15,'Image secondaire','4c-spider-1-65c7da877547a190869070.jpg',306589,'2024-02-10 21:20:23'),(29,15,'Autre image','4c-spider-2-65c7daa40b56a570967608.jpg',313572,'2024-02-10 21:20:52'),(30,15,'Image de base','4c-spider-3-65c7daba87eb4319197599.jpg',301469,'2024-02-10 21:21:14'),(31,16,'Image principale','megane-rs-65c7db9ac253a287299041.jpg',307881,'2024-02-10 21:24:58'),(32,16,'Image secondaire','megane-rs-1-65c7dbaac4098624064273.jpg',304550,'2024-02-10 21:25:14'),(33,16,'Autre image','megane-rs-2-65c7dbc386dcc541891449.jpg',307881,'2024-02-10 21:25:39'),(34,17,'Image principale','r8-spider-65c7dcdf577d5775220432.jpg',291450,'2024-02-10 21:30:23'),(35,17,'Image secondaire','r8-spider-1-65c7dcf13f113353884072.jpg',290322,'2024-02-10 21:30:41'),(36,17,'Autre image','r8-spider-2-65c7dd031a108354522162.jpg',294482,'2024-02-10 21:30:59'),(37,17,'Image de base','r8-spider-3-65c7dd68923f4452108834.jpg',289119,'2024-02-10 21:32:40'),(38,18,'Image principale','r8-bleu-65c7de5acc832986631752.jpg',307549,'2024-02-10 21:36:42'),(39,18,'Image secondaire','r8-bleu-1-65c7de6bd9449978495644.jpg',304303,'2024-02-10 21:36:59'),(40,18,'Autre image','r8-bleu-2-65c7de8173fc2059216059.jpg',300334,'2024-02-10 21:37:21'),(41,19,'Image principale','aventador-65c7df7731255289156917.jpg',284726,'2024-02-10 21:41:27'),(42,19,'Image secondaire','aventador-1-65c7df8542dca043413866.jpg',292103,'2024-02-10 21:41:41'),(43,19,'Autre image','aventador-2-65c7df954968e960368712.jpg',298622,'2024-02-10 21:41:57'),(44,20,'Image secondaire','gt-violette-1-65c7e0cb390dd788083321.jpg',297224,'2024-02-10 21:47:07'),(45,20,'Autre image','gt-violette-2-65c7e0dcb28ce527951769.jpg',286532,'2024-02-10 21:47:24'),(46,20,'Image principale','gt-violette-65c7e0f94f1d2718920890.jpg',288910,'2024-02-10 21:47:53');
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model`
--

DROP TABLE IF EXISTS `model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `model_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `energy_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motorization` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horse_power` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D79572D944F5D008` (`brand_id`),
  CONSTRAINT `FK_D79572D944F5D008` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model`
--

LOCK TABLES `model` WRITE;
/*!40000 ALTER TABLE `model` DISABLE KEYS */;
INSERT INTO `model` VALUES (2,13,'Fabia','2023-07-01','Essence','Essence',4),(3,1,'607','2023-11-23','Essence','Essence',6),(4,1,'BMW M2 CS','2020-03-01','Essence','Essence',450),(5,14,'Ford GT','2020-01-01','Essence','Essence',2),(6,15,'Carrera RS','2015-12-15','Essence','Essence',1),(7,16,'Corvette ZR1','2012-06-13','Essence','Essence',2),(8,2,'Twingo','2013-07-17','Essence','Essence',250),(9,2,'Twingo','2016-07-20','Essence','Essence',250),(10,17,'SLS AMG Black Serie','2010-02-20','e','e',3),(11,3,'Audi R8','2013-01-01','Essence','Essence',1),(12,19,'4C Spider','2015-01-01','Essence','Essence',1),(13,2,'Mégane RS','2016-01-01','Essence','Essence',250),(14,3,'R8 Spider','2018-01-01','Essence','Essence',1),(15,20,'Aventador','2021-01-01','Essence','Essence',1);
/*!40000 ALTER TABLE `model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `option`
--

DROP TABLE IF EXISTS `option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `option`
--

LOCK TABLES `option` WRITE;
/*!40000 ALTER TABLE `option` DISABLE KEYS */;
INSERT INTO `option` VALUES (1,'Retroviseurs auto-retractables','Les rétroviseurs extérieurs se retractent lorsque le contact est coupé et se déplient au démarrage.'),(2,'Essuies glasses à détection de pluie','Les essuies glasses se déclenchent automatiquement sous la  pluie');
/*!40000 ALTER TABLE `option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `garage_id` int(11) NOT NULL,
  `day_of_week` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `schedule_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5A3811FBC4FFF555` (`garage_id`),
  CONSTRAINT `FK_5A3811FBC4FFF555` FOREIGN KEY (`garage_id`) REFERENCES `garage` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` VALUES (1,1,'Lundi','08:00:00','12:00:00','Matin'),(2,1,'Lundi','13:00:00','17:00:00','Après-midi'),(3,1,'Mardi','08:00:00','12:00:00','Matin'),(4,1,'Mardi','13:00:00','17:00:00','Après-midi'),(5,1,'Mercredi','08:00:00','12:00:00','Matin'),(6,1,'Mercredi','13:00:00','17:00:00','Après-midi'),(7,1,'Jeudi','08:00:00','12:00:00','Matin'),(8,1,'Jeudi','13:00:00','16:00:00','Après-midi'),(9,1,'Vendredi','08:00:00','12:00:00','Matin'),(10,1,'Vendredi','13:00:00','17:00:00','Après-midi'),(11,1,'Samedi','08:00:00','12:00:00','Matin'),(12,1,'Samedi','13:00:00','17:00:00','Après-midi');
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (1,'L\'entretien de votre véhicule','Entretien','Qu\'est ce que la révision/vidange ? \r\n\r\nC’est l’entretien de votre véhicule, primordial pour prolonger sa durée de vie. Un moteur exige pour fonctionner convenablement les ingrédients suivants : Un carburant propre, Un air sans poussière, Une huile ayant un bon pouvoir de lubrification, Un liquide de refroidissement conservant ses propriétés calorifiques (antigel).','entretien-65579dfb6536e821486533.jpg',131670,'2023-11-17 18:08:11'),(2,'La courroie de distribution','Mecanique','Le kit de distribution se compose de plusieurs éléments :\r\n\r\n- La courroie de distribution.\r\n- La courroie d’alternateur.\r\n- La pompe à eau.\r\n- Les galets tendeurs.\r\n- Le liquide de refroidissement.\r\n\r\nEnsemble ils assurent le bon fonctionnement du moteur.\r\nLa courroie de distribution est particulièrement importante dans ce dispositif.\r\nElle assure une bonne coordination entre la pompe à injection, le vilebrequin, la pompe à eau et les arbres à cames commandant les soupapes d\'admission et d\'échappement.','atelieir-mecanique-6557b87aad29c642058206.jpeg',34945,'2023-11-17 20:01:14'),(5,'Carrosserie et peinture','Carrosserie et peinture','Bien entretenir la carrosserie de votre véhicule en préservera la qualité, la sécurité et la valeur à la revente ou à la restitution de votre véhicule en LLD ou LOA.\r\n\r\nEn traitant le plus tôt possible les éventuelles dégradations, vous limiterez également vos dépenses.\r\n\r\nNous réparons la carrosserie pour vos véhicules toutes marques et assurons également les travaux de remplacement de pièces, de ponçage, de redressage et de débosselage.','carrocerie-peinture-65579de2e8cd4725347173.jpg',53263,'2023-11-17 18:07:46');
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonial`
--

DROP TABLE IF EXISTS `testimonial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `garage_id` int(11) DEFAULT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `is_approved` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E6BDCDF7C4FFF555` (`garage_id`),
  CONSTRAINT `FK_E6BDCDF7C4FFF555` FOREIGN KEY (`garage_id`) REFERENCES `garage` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonial`
--

LOCK TABLES `testimonial` WRITE;
/*!40000 ALTER TABLE `testimonial` DISABLE KEYS */;
INSERT INTO `testimonial` VALUES (1,1,'Sergio NUNEZ','Excellente communication et Service.\r\n\r\nJe recommande !\r\n\r\nSergio',5,0),(2,1,'Sergio NUNEZ','Très Content, très content !!!!!',5,0),(3,1,'Toto','Un avis personnel',3,0),(4,1,'Le frere de Toto','Un autre avis personnel',3,1),(5,1,'Titi','Un avis très personnel',4,1),(6,1,'Tata','Voici mon commentaire SUPER important !',5,1),(7,1,'Clément','Je trouve ce garage bien !',5,1),(8,1,'Denis','Très bon garage, je recommande !',5,1),(9,1,'Camille','Très beau garage !',3,1),(10,1,'Kumaro','Je suis très content',4,1),(11,1,'Kaikuse','Personnel compétent et service rapide',5,1),(12,1,'Léo','Lu',1,NULL),(13,1,'Temistocles','mlkj qsdf azert',1,1),(14,1,'Titeuf','Je suis très fâché du mauvais travail du gargage.\r\n\r\nJe l\'aisse une note de 1 car impossible de mettre 0 ou moins quelque chose !',1,1),(15,1,'Ma Dalton','Ce sont des petits anges (mes enfants).',1,NULL),(16,1,'Lucky Luc','Ils ne risquent rien, ils dorment en prison.',1,NULL),(17,1,'Superman','Encore un test de commentaire !',5,NULL),(18,1,'Tony','Très bon garage, personnel compétent et bon accueil.',4,NULL),(19,1,'Tony','Lui, là bas est en train de jouer à Galaga !',1,NULL),(20,1,'Clara','Très bon service.\r\nLe personne est compétent et votre véhicule est pris en charge rapidement.',4,NULL),(21,1,'Mon frère','Trop d\'la bal ce garage',5,1),(22,1,'Stefan','Este es un taller de BIIIIPPPP !\r\nLe doy una nota de uno porque no puedo dar menos !',1,1);
/*!40000 ALTER TABLE `testimonial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `garage_id` int(11) DEFAULT NULL,
  `model_id` int(11) NOT NULL,
  `kilometers` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_date` date NOT NULL,
  `vehicle_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_1B80E486C4FFF555` (`garage_id`),
  KEY `IDX_1B80E4867975B7E7` (`model_id`),
  CONSTRAINT `FK_1B80E4867975B7E7` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`),
  CONSTRAINT `FK_1B80E486C4FFF555` FOREIGN KEY (`garage_id`) REFERENCES `garage` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle`
--

LOCK TABLES `vehicle` WRITE;
/*!40000 ALTER TABLE `vehicle` DISABLE KEYS */;
INSERT INTO `vehicle` VALUES (4,1,3,120000,7000.00,'Très bon état','2020-01-03','607 Turbo Diesel','photo-voiture-occasion-cote-2-65577a6c4dddf056051080-6557a3eb40559513331994.webp',3360,'2023-11-17 18:33:31'),(5,1,3,50000,15000.00,'Véhicule en très bon état.','2020-11-01','607 GTI','w102777861-standard-0-655357dcd3187279930049-65577a88511cf201618527-6557a3fe7196d231454933.webp',13780,'2023-11-17 18:33:50'),(6,1,2,30000,21500.00,'Voiture de première main en très bon état !\r\n\r\nQuickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.','2020-10-11','Fabia tour de France','peugeot-260-210-655354ea125a1876337130-65577a9908841369717321-6557a40f4f423842257613.webp',9424,'2023-11-17 18:34:07'),(7,1,4,52000,9000.00,'Véhicule de première main en très bon état avec l\'ensemble des contrôles et mainteance faits.','2020-03-01','BMW M2 CS','image-bmw-m2-cs-656369dc9044c933323143.jpeg',140829,'2023-11-26 15:53:00'),(8,1,2,25000,8000.00,'Très bon état','2020-01-01','Ford GT','gt-65bfeecf6484b486743943.jpg',308320,'2024-02-04 21:08:47'),(9,1,6,75000,20000.00,'Top moumoute !','2015-12-16','Porsche - Carrera RS','carrera-rs-65bff0f560dfc947052644.jpg',299249,'2024-02-04 21:17:57'),(10,1,7,28000,17000.00,'Très bien','2013-01-01','Chevrolet - corvette ZR1','corvette-zr1-65bff2bfb3d29733570981.jpg',309925,'2024-02-04 21:25:35'),(11,1,8,32000,6000.00,'Très bon état d\'entretien','2014-06-12','Renault Twingo Rouge','twingo-65bff4621bf47307448412.jpg',313859,'2024-02-04 21:32:34'),(12,1,9,40000,5000.00,'Bien entretenue','2016-07-20','Renault Twingo Blanche','twingo-blanche-65bff561c9188762873199.jpg',318391,'2024-02-04 21:36:49'),(13,1,10,57000,12000.00,'Véhicule bien entrenu','2014-01-01','Mercedes Benz - SLS AMG Black Serie - Jaune','sls-amg-black-serie-65bff6e6c32ae520134442.jpg',302420,'2024-02-04 21:43:18'),(14,1,11,10000,18000.00,'Voiture de collection en excellent état','2013-01-01','Audi R8 Jaune','r8-jaune-65c7d8873f2aa955184093.jpg',305974,'2024-02-10 21:11:51'),(15,1,12,15000,19000.00,'Excellente voiture !','2015-01-01','Alfa Romeo - 4C Spider','4c-spider-65c7da5ab19ca584894366.jpg',308792,'2024-02-10 21:19:38'),(16,1,13,18000,11000.00,'Très bien conservée','2016-01-01','Renault - Mégane RS','megane-rs-65c7db8208eb3307925694.jpg',307881,'2024-02-10 21:24:34'),(17,1,14,22000,21000.00,'Révisions et entretiens toujours respecté.\r\n\r\nVéhicule ayant eu un seul propriétaire.','2018-01-01','Audi - R8 Spider','r8-spider-65c7dcb82fc62679308924.jpg',291450,'2024-02-10 21:29:44'),(18,1,11,20000,20000.00,'Très bon véhicule','2019-01-01','Audi R8 Bleue','r8-bleu-65c7de432c266655956095.jpg',307549,'2024-02-10 21:36:19'),(19,1,15,19000,21000.00,'Lamborghini - Aventador !\r\n\r\nTout est dit !','2021-01-01','Lamborghini - Aventador','aventador-65c7df6472eed748188114.jpg',284726,'2024-02-10 21:41:08'),(20,1,5,50000,20000.00,'Très bonne américaine','2022-01-01','Ford GT Violette','gt-violette-65c7e0a599ff2413637423.jpg',288910,'2024-02-10 21:46:29');
/*!40000 ALTER TABLE `vehicle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_option`
--

DROP TABLE IF EXISTS `vehicle_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle_option` (
  `vehicle_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  PRIMARY KEY (`vehicle_id`,`option_id`),
  KEY `IDX_F3580163545317D1` (`vehicle_id`),
  KEY `IDX_F3580163A7C41D6F` (`option_id`),
  CONSTRAINT `FK_F3580163545317D1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_F3580163A7C41D6F` FOREIGN KEY (`option_id`) REFERENCES `option` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_option`
--

LOCK TABLES `vehicle_option` WRITE;
/*!40000 ALTER TABLE `vehicle_option` DISABLE KEYS */;
INSERT INTO `vehicle_option` VALUES (4,1),(5,1),(5,2),(7,1),(7,2),(9,1),(9,2),(15,1),(15,2);
/*!40000 ALTER TABLE `vehicle_option` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-16 19:31:44
