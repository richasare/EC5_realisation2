-- MySQL dump 10.13  Distrib 8.0.26, for Linux (x86_64)
--
-- Host: localhost    Database: SicilyLines
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bateau`
--

DROP TABLE IF EXISTS `bateau`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bateau` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longueur` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `largeur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vitesse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bateau`
--

LOCK TABLES `bateau` WRITE;
/*!40000 ALTER TABLE `bateau` DISABLE KEYS */;
INSERT INTO `bateau` VALUES (1,'Bateau de la Mer','10Mètres','8Mètres','20 noeuds');
/*!40000 ALTER TABLE `bateau` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contenir` (
  `nb_max` int NOT NULL,
  `la_categorie_id` int NOT NULL,
  `bateau_id` int NOT NULL,
  PRIMARY KEY (`la_categorie_id`,`bateau_id`),
  KEY `IDX_3C914DFD281042B9` (`la_categorie_id`),
  KEY `IDX_3C914DFDA9706509` (`bateau_id`),
  CONSTRAINT `FK_3C914DFD281042B9` FOREIGN KEY (`la_categorie_id`) REFERENCES `categorie` (`id`),
  CONSTRAINT `FK_3C914DFDA9706509` FOREIGN KEY (`bateau_id`) REFERENCES `bateau` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenir`
--

LOCK TABLES `contenir` WRITE;
/*!40000 ALTER TABLE `contenir` DISABLE KEYS */;
/*!40000 ALTER TABLE `contenir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20211227001108','2021-12-27 01:11:14',56),('DoctrineMigrations\\Version20211227001204','2021-12-27 01:12:07',60),('DoctrineMigrations\\Version20211227001413','2021-12-27 01:14:16',142),('DoctrineMigrations\\Version20211227001528','2021-12-27 01:15:30',60),('DoctrineMigrations\\Version20211227001635','2021-12-27 01:16:37',55),('DoctrineMigrations\\Version20211227001659','2021-12-27 01:17:02',53),('DoctrineMigrations\\Version20211227001726','2021-12-27 01:17:28',54),('DoctrineMigrations\\Version20211227001753','2021-12-27 01:18:04',61),('DoctrineMigrations\\Version20211227001916','2021-12-27 01:19:19',54),('DoctrineMigrations\\Version20211227002020','2021-12-27 01:20:23',211),('DoctrineMigrations\\Version20211227002204','2021-12-27 01:22:07',215),('DoctrineMigrations\\Version20211227002316','2021-12-27 01:23:19',67),('DoctrineMigrations\\Version20211227002355','2021-12-27 01:23:58',53),('DoctrineMigrations\\Version20211227002416','2021-12-27 01:24:19',64),('DoctrineMigrations\\Version20211227002502','2021-12-27 01:25:06',166),('DoctrineMigrations\\Version20211227002613','2021-12-27 01:26:16',138),('DoctrineMigrations\\Version20211227010341','2021-12-27 02:03:47',180),('DoctrineMigrations\\Version20211227010518','2021-12-27 02:05:21',128),('DoctrineMigrations\\Version20211227010633','2021-12-27 02:06:36',145),('DoctrineMigrations\\Version20211227010715','2021-12-27 02:07:18',52),('DoctrineMigrations\\Version20211227010840','2021-12-27 02:08:43',301),('DoctrineMigrations\\Version20211227010936','2021-12-27 02:09:38',57),('DoctrineMigrations\\Version20211227011042','2021-12-27 02:10:44',243),('DoctrineMigrations\\Version20211227011410','2021-12-27 02:14:13',366),('DoctrineMigrations\\Version20211227012548','2021-12-27 02:25:52',286),('DoctrineMigrations\\Version20211227012940','2021-12-27 02:29:42',286),('DoctrineMigrations\\Version20211227133624','2021-12-27 14:36:32',267),('DoctrineMigrations\\Version20211227134312','2021-12-27 14:43:22',285),('DoctrineMigrations\\Version20211227134427','2021-12-27 14:44:29',269),('DoctrineMigrations\\Version20220316111404','2022-03-16 12:14:25',52);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipement`
--

DROP TABLE IF EXISTS `equipement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipement`
--

LOCK TABLES `equipement` WRITE;
/*!40000 ALTER TABLE `equipement` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liaison`
--

DROP TABLE IF EXISTS `liaison`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `liaison` (
  `id` int NOT NULL AUTO_INCREMENT,
  `duree` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `port_depart_id` int DEFAULT NULL,
  `port_arrivee_id` int DEFAULT NULL,
  `le_secteur_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_225AC3794C9CCD3` (`port_depart_id`),
  KEY `IDX_225AC37141EAE06` (`port_arrivee_id`),
  KEY `IDX_225AC37BC7E3BAE` (`le_secteur_id`),
  CONSTRAINT `FK_225AC37141EAE06` FOREIGN KEY (`port_arrivee_id`) REFERENCES `port` (`id`),
  CONSTRAINT `FK_225AC3794C9CCD3` FOREIGN KEY (`port_depart_id`) REFERENCES `port` (`id`),
  CONSTRAINT `FK_225AC37BC7E3BAE` FOREIGN KEY (`le_secteur_id`) REFERENCES `secteur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liaison`
--

LOCK TABLES `liaison` WRITE;
/*!40000 ALTER TABLE `liaison` DISABLE KEYS */;
INSERT INTO `liaison` VALUES (1,'3H30',1,2,1);
/*!40000 ALTER TABLE `liaison` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participer`
--

DROP TABLE IF EXISTS `participer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `participer` (
  `nombre` int NOT NULL,
  `le_type_id` int NOT NULL,
  `la_reservation_id` int NOT NULL,
  PRIMARY KEY (`le_type_id`,`la_reservation_id`),
  KEY `IDX_EDBE16F8EA83FAE4` (`le_type_id`),
  KEY `IDX_EDBE16F8BA31B7B` (`la_reservation_id`),
  CONSTRAINT `FK_EDBE16F8BA31B7B` FOREIGN KEY (`la_reservation_id`) REFERENCES `reservation` (`id`),
  CONSTRAINT `FK_EDBE16F8EA83FAE4` FOREIGN KEY (`le_type_id`) REFERENCES `type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participer`
--

LOCK TABLES `participer` WRITE;
/*!40000 ALTER TABLE `participer` DISABLE KEYS */;
/*!40000 ALTER TABLE `participer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periode`
--

DROP TABLE IF EXISTS `periode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `periode` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periode`
--

LOCK TABLES `periode` WRITE;
/*!40000 ALTER TABLE `periode` DISABLE KEYS */;
/*!40000 ALTER TABLE `periode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `port`
--

DROP TABLE IF EXISTS `port`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `port` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `port`
--

LOCK TABLES `port` WRITE;
/*!40000 ALTER TABLE `port` DISABLE KEYS */;
INSERT INTO `port` VALUES (1,'port de Palerme'),(2,'port de Catane');
/*!40000 ALTER TABLE `port` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proposer`
--

DROP TABLE IF EXISTS `proposer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proposer` (
  `qte` int NOT NULL,
  `equipement_id` int NOT NULL,
  `bateau_id` int NOT NULL,
  PRIMARY KEY (`equipement_id`,`bateau_id`),
  KEY `IDX_21866C15806F0F5C` (`equipement_id`),
  KEY `IDX_21866C15A9706509` (`bateau_id`),
  CONSTRAINT `FK_21866C15806F0F5C` FOREIGN KEY (`equipement_id`) REFERENCES `equipement` (`id`),
  CONSTRAINT `FK_21866C15A9706509` FOREIGN KEY (`bateau_id`) REFERENCES `bateau` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proposer`
--

LOCK TABLES `proposer` WRITE;
/*!40000 ALTER TABLE `proposer` DISABLE KEYS */;
/*!40000 ALTER TABLE `proposer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `le_client_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_42C84955C0F37DD6` (`le_client_id`),
  CONSTRAINT `FK_42C84955C0F37DD6` FOREIGN KEY (`le_client_id`) REFERENCES `client` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `secteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secteur`
--

LOCK TABLES `secteur` WRITE;
/*!40000 ALTER TABLE `secteur` DISABLE KEYS */;
INSERT INTO `secteur` VALUES (1,'secteur A');
/*!40000 ALTER TABLE `secteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarifer`
--

DROP TABLE IF EXISTS `tarifer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tarifer` (
  `la_liaison_id` int NOT NULL,
  `la_periode_id` int NOT NULL,
  `le_type_id` int NOT NULL,
  `tarif` decimal(10,0) NOT NULL,
  PRIMARY KEY (`la_liaison_id`,`la_periode_id`,`le_type_id`),
  KEY `IDX_6904C4FF2ED55551` (`la_liaison_id`),
  KEY `IDX_6904C4FFD382851B` (`la_periode_id`),
  KEY `IDX_6904C4FFEA83FAE4` (`le_type_id`),
  CONSTRAINT `FK_6904C4FF2ED55551` FOREIGN KEY (`la_liaison_id`) REFERENCES `liaison` (`id`),
  CONSTRAINT `FK_6904C4FFD382851B` FOREIGN KEY (`la_periode_id`) REFERENCES `periode` (`id`),
  CONSTRAINT `FK_6904C4FFEA83FAE4` FOREIGN KEY (`le_type_id`) REFERENCES `type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarifer`
--

LOCK TABLES `tarifer` WRITE;
/*!40000 ALTER TABLE `tarifer` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarifer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `traversee`
--

DROP TABLE IF EXISTS `traversee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `traversee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `heure` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `le_bateau_id` int DEFAULT NULL,
  `la_liaison_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B688F501706871FE` (`le_bateau_id`),
  KEY `IDX_B688F5012ED55551` (`la_liaison_id`),
  CONSTRAINT `FK_B688F5012ED55551` FOREIGN KEY (`la_liaison_id`) REFERENCES `liaison` (`id`),
  CONSTRAINT `FK_B688F501706871FE` FOREIGN KEY (`le_bateau_id`) REFERENCES `bateau` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `traversee`
--

LOCK TABLES `traversee` WRITE;
/*!40000 ALTER TABLE `traversee` DISABLE KEYS */;
INSERT INTO `traversee` VALUES (1,'2022-12-10','15H30',1,1);
/*!40000 ALTER TABLE `traversee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `la_categorie_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8CDE5729281042B9` (`la_categorie_id`),
  CONSTRAINT `FK_8CDE5729281042B9` FOREIGN KEY (`la_categorie_id`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,'da@outlook.fr','1234','gnda','dany');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-08 11:19:31
