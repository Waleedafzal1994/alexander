-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: gamersplay_db
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.20.04.3

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int NOT NULL,
  `image_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `popular` int NOT NULL DEFAULT '0',
  `udf1_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `udf1_values` json DEFAULT NULL,
  `udf2_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `udf2_values` json DEFAULT NULL,
  `udf3_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `udf3_values` json DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `visible` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'League of Legends',1,'storage/categories/1/aVcG2I2ctwHZQ1ciPFlsCuICOWMV1tsqY7cQ3WGn.jpg',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-12-29 15:05:16','2021-12-29 15:50:41'),(2,'CS:GO',1,'storage/categories/2/OwtPxOGehfiUqTCqQgOhve6ek3B0U9xvpwNSWVdE.png',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-12-29 15:05:16','2021-12-29 15:50:50'),(3,'Minecraft',1,'storage/categories/3/zobiEUhnrPHwmw0BqFOkagDO5DBwXx6JHQrgJgn6.jpg',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-12-29 15:05:16','2021-12-29 16:08:28'),(4,'Apex Legends',1,'storage/categories/4/xQweXTZYB9E1qQQVsMjOGM3Z4X5A4MvRFGICiRDM.jpg',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-12-29 15:05:16','2021-12-29 16:07:15'),(5,'Dota 2',1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-12-29 15:05:17',NULL),(6,'Terraria',1,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-12-29 15:05:17',NULL),(7,'Advice',2,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-12-29 15:05:17',NULL),(8,'Chat',2,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-12-29 15:05:17',NULL),(9,'Emotional Support',2,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2021-12-29 15:05:17',NULL),(10,'TEST',1,'storage/categories/10/ggGJ3pGdH3xuNThGqjkdOMYCR5KBLAkqYWj9n0zq.png',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-01-10 13:44:12','2022-01-10 13:44:12'),(11,'Overwatch',1,'storage/categories/11/Qvtr6CYBHLqtMu53xQpS02kUahpAVhEYJjmpYdHm.png',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-04-26 09:17:56','2022-04-26 09:17:56'),(12,'Valorant',1,'storage/categories/12/VBHJWR9eNRKNt9xyTyuTsoUeclpzVgYL5SBo9IDm.png',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-04-26 09:20:00','2022-04-26 09:20:00');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_types`
--

DROP TABLE IF EXISTS `category_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_types`
--

LOCK TABLES `category_types` WRITE;
/*!40000 ALTER TABLE `category_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `category_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `commentable_id` bigint unsigned DEFAULT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,9,NULL,'Hello Commenting on top post',26,'App\\Models\\Post','2022-03-04 19:55:10','2022-03-04 19:55:10'),(2,9,NULL,'COmmenting on another post',25,'App\\Models\\Post','2022-03-04 19:56:54','2022-03-04 19:56:54'),(3,3,NULL,'gg kek',25,'App\\Models\\Post','2022-03-04 20:08:27','2022-03-04 20:08:27'),(4,3,NULL,'ff',25,'App\\Models\\Post','2022-03-04 20:18:17','2022-03-04 20:18:17'),(5,9,NULL,'Hello',28,'App\\Models\\Post','2022-03-08 22:09:08','2022-03-08 22:09:08'),(6,9,NULL,'lorem ipsum',27,'App\\Models\\Post','2022-03-08 23:16:09','2022-03-08 23:16:09'),(7,9,NULL,'lorem ipsum 2 2 2',27,'App\\Models\\Post','2022-03-08 23:16:33','2022-03-08 23:16:33'),(8,3,NULL,'hi',26,'App\\Models\\Post','2022-03-09 10:01:37','2022-03-09 10:01:37'),(9,3,NULL,'jhjh',25,'App\\Models\\Post','2022-03-09 20:17:18','2022-03-09 20:17:18'),(10,3,NULL,'kkkk',11,'App\\Models\\Post','2022-03-15 21:51:01','2022-03-15 21:51:01'),(11,3,NULL,'sdsd',28,'App\\Models\\Post','2022-03-16 11:38:13','2022-03-16 11:38:13'),(12,3,NULL,'fgdfg',26,'App\\Models\\Post','2022-03-16 18:28:54','2022-03-16 18:28:54'),(13,3,NULL,'dfgdfg',26,'App\\Models\\Post','2022-03-16 18:28:55','2022-03-16 18:28:55'),(14,3,NULL,'dfgdfg',26,'App\\Models\\Post','2022-03-16 18:28:57','2022-03-16 18:28:57'),(15,3,NULL,'sdfsdf',26,'App\\Models\\Post','2022-03-16 18:29:21','2022-03-16 18:29:21'),(16,3,NULL,'sdfsdf',26,'App\\Models\\Post','2022-03-16 18:29:22','2022-03-16 18:29:22'),(17,3,NULL,'sdfsdfds',26,'App\\Models\\Post','2022-03-16 18:39:27','2022-03-16 18:39:27'),(18,3,NULL,'sdfsdf',26,'App\\Models\\Post','2022-03-16 18:39:29','2022-03-16 18:39:29'),(19,3,NULL,'sdfsdfsd',26,'App\\Models\\Post','2022-03-16 18:39:33','2022-03-16 18:39:33'),(20,3,NULL,'sfsf',26,'App\\Models\\Post','2022-03-16 18:39:35','2022-03-16 18:39:35'),(21,3,NULL,'asdasd',25,'App\\Models\\Post','2022-03-16 18:43:31','2022-03-16 18:43:31'),(22,3,NULL,'asdadasd',25,'App\\Models\\Post','2022-03-16 18:43:34','2022-03-16 18:43:34'),(23,3,NULL,'asdasd',25,'App\\Models\\Post','2022-03-16 18:43:37','2022-03-16 18:43:37'),(24,3,NULL,'sdfsdfdsf',26,'App\\Models\\Post','2022-03-16 18:52:47','2022-03-16 18:52:47'),(25,3,NULL,'dfgfdg',26,'App\\Models\\Post','2022-03-16 18:54:24','2022-03-16 18:54:24'),(26,3,NULL,'sfsfsfd',26,'App\\Models\\Post','2022-03-16 18:54:27','2022-03-16 18:54:27'),(27,3,NULL,'sdfsfsdf',26,'App\\Models\\Post','2022-03-16 18:54:34','2022-03-16 18:54:34'),(28,3,NULL,'sdfsfsfs',26,'App\\Models\\Post','2022-03-16 18:54:35','2022-03-16 18:54:35'),(29,3,NULL,'sdfsfsfsfsd',26,'App\\Models\\Post','2022-03-16 18:54:37','2022-03-16 18:54:37'),(30,3,NULL,'asdasd',26,'App\\Models\\Post','2022-03-16 22:02:05','2022-03-16 22:02:05'),(31,3,NULL,'ghfgh',29,'App\\Models\\Post','2022-03-16 22:03:12','2022-03-16 22:03:12'),(32,3,NULL,'fghfghfg',29,'App\\Models\\Post','2022-03-16 22:03:17','2022-03-16 22:03:17'),(33,3,NULL,'fhfghfgh',29,'App\\Models\\Post','2022-03-16 22:03:20','2022-03-16 22:03:20'),(34,3,NULL,'fghfghfgh',29,'App\\Models\\Post','2022-03-16 22:03:24','2022-03-16 22:03:24'),(35,3,NULL,'fghfgh',29,'App\\Models\\Post','2022-03-16 22:03:25','2022-03-16 22:03:25'),(36,3,NULL,'gfhgfh',29,'App\\Models\\Post','2022-03-16 22:03:26','2022-03-16 22:03:26'),(37,3,NULL,'ghfg',29,'App\\Models\\Post','2022-03-16 22:03:26','2022-03-16 22:03:26'),(38,3,NULL,'fg',29,'App\\Models\\Post','2022-03-16 22:03:26','2022-03-16 22:03:26'),(39,3,NULL,'fg',29,'App\\Models\\Post','2022-03-16 22:03:26','2022-03-16 22:03:26'),(40,3,NULL,'f',29,'App\\Models\\Post','2022-03-16 22:03:27','2022-03-16 22:03:27'),(41,3,NULL,'fg',29,'App\\Models\\Post','2022-03-16 22:03:27','2022-03-16 22:03:27'),(42,3,NULL,'fhg',29,'App\\Models\\Post','2022-03-16 22:03:28','2022-03-16 22:03:28'),(43,3,NULL,'hjkhjk',22,'App\\Models\\Post','2022-03-16 22:15:55','2022-03-16 22:15:55'),(44,3,NULL,'PEOSΠΕΟΣ',22,'App\\Models\\Post','2022-03-16 22:17:26','2022-03-16 22:17:26'),(45,3,NULL,'sdfsdf',29,'App\\Models\\Post','2022-03-17 19:33:11','2022-03-17 19:33:11'),(46,3,NULL,'sfsdf',29,'App\\Models\\Post','2022-03-17 19:33:12','2022-03-17 19:33:12'),(47,3,NULL,'sdfsdf',29,'App\\Models\\Post','2022-03-17 19:33:13','2022-03-17 19:33:13'),(48,3,NULL,'sdf',29,'App\\Models\\Post','2022-03-17 19:33:13','2022-03-17 19:33:13'),(49,3,NULL,'sdf',29,'App\\Models\\Post','2022-03-17 19:33:14','2022-03-17 19:33:14'),(50,3,NULL,'sdf',29,'App\\Models\\Post','2022-03-17 19:33:15','2022-03-17 19:33:15'),(51,3,NULL,'sdf',29,'App\\Models\\Post','2022-03-17 19:33:18','2022-03-17 19:33:18'),(52,3,NULL,'hhh',29,'App\\Models\\Post','2022-03-18 14:11:03','2022-03-18 14:11:03'),(53,3,NULL,'kjkj',29,'App\\Models\\Post','2022-03-24 18:02:15','2022-03-24 18:02:15'),(54,3,NULL,'lklk',29,'App\\Models\\Post','2022-03-24 18:02:18','2022-03-24 18:02:18'),(55,3,NULL,'k',29,'App\\Models\\Post','2022-03-24 18:03:18','2022-03-24 18:03:18'),(56,3,NULL,'kk',29,'App\\Models\\Post','2022-03-24 18:03:18','2022-03-24 18:03:18'),(57,3,NULL,'k',29,'App\\Models\\Post','2022-03-24 18:03:19','2022-03-24 18:03:19'),(58,3,NULL,'k',29,'App\\Models\\Post','2022-03-24 18:03:19','2022-03-24 18:03:19'),(59,3,NULL,'k',29,'App\\Models\\Post','2022-03-24 18:03:19','2022-03-24 18:03:19'),(60,3,NULL,'kk',29,'App\\Models\\Post','2022-03-24 18:03:20','2022-03-24 18:03:20'),(61,3,NULL,'[k',29,'App\\Models\\Post','2022-03-24 18:03:20','2022-03-24 18:03:20'),(62,3,NULL,'[k[k',29,'App\\Models\\Post','2022-03-24 18:03:20','2022-03-24 18:03:20'),(63,3,NULL,'k',29,'App\\Models\\Post','2022-03-24 18:03:20','2022-03-24 18:03:20'),(64,3,NULL,'k',29,'App\\Models\\Post','2022-03-24 18:03:21','2022-03-24 18:03:21'),(65,3,NULL,'k',29,'App\\Models\\Post','2022-03-24 18:03:21','2022-03-24 18:03:21'),(66,3,NULL,'[k',29,'App\\Models\\Post','2022-03-24 18:03:22','2022-03-24 18:03:22'),(67,3,NULL,'k',29,'App\\Models\\Post','2022-03-24 18:03:22','2022-03-24 18:03:22'),(68,3,NULL,'www.porn.com',29,'App\\Models\\Post','2022-03-24 18:04:32','2022-03-24 18:04:32'),(69,3,NULL,'🏄',29,'App\\Models\\Post','2022-03-24 18:06:05','2022-03-24 18:06:05'),(70,3,NULL,'no2',29,'App\\Models\\Post','2022-03-24 18:09:24','2022-03-24 18:09:24'),(71,3,NULL,'ok',29,'App\\Models\\Post','2022-03-24 18:09:52','2022-03-24 18:09:52'),(72,3,NULL,'sdcs',29,'App\\Models\\Post','2022-04-04 22:57:28','2022-04-04 22:57:28'),(73,3,NULL,'sdcsdcsc',29,'App\\Models\\Post','2022-04-04 22:58:14','2022-04-04 22:58:14'),(74,3,NULL,'sdcsdcsdc test',29,'App\\Models\\Post','2022-04-04 23:00:53','2022-04-04 23:00:53'),(75,3,NULL,'sdsdcsd',31,'App\\Models\\Post','2022-04-04 23:01:12','2022-04-04 23:01:12'),(76,3,NULL,'new tst',31,'App\\Models\\Post','2022-04-04 23:02:25','2022-04-04 23:02:25'),(77,3,NULL,'fgghgfhfghfgh',29,'App\\Models\\Post','2022-05-07 08:32:16','2022-05-07 08:32:16'),(78,3,NULL,'keko',25,'App\\Models\\Post','2022-05-07 08:32:33','2022-05-07 08:32:33'),(79,3,NULL,'keko',25,'App\\Models\\Post','2022-05-07 08:32:54','2022-05-07 08:32:54'),(80,3,NULL,'keko2',25,'App\\Models\\Post','2022-05-07 08:32:56','2022-05-07 08:32:56');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conversations`
--

DROP TABLE IF EXISTS `conversations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conversations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_one` int NOT NULL,
  `user_two` int NOT NULL,
  `last_message` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conversations`
--

LOCK TABLES `conversations` WRITE;
/*!40000 ALTER TABLE `conversations` DISABLE KEYS */;
INSERT INTO `conversations` VALUES (1,3,2,'2021-12-29 16:45:26',0,'2021-12-29 16:45:26','2021-12-29 16:45:26');
/*!40000 ALTER TABLE `conversations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dispute_replies`
--

DROP TABLE IF EXISTS `dispute_replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dispute_replies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dispute_id` int NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `staff_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dispute_replies`
--

LOCK TABLES `dispute_replies` WRITE;
/*!40000 ALTER TABLE `dispute_replies` DISABLE KEYS */;
/*!40000 ALTER TABLE `dispute_replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disputes`
--

DROP TABLE IF EXISTS `disputes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `disputes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `disputer_id` int NOT NULL,
  `order_id` int NOT NULL,
  `admin_id` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disputes`
--

LOCK TABLES `disputes` WRITE;
/*!40000 ALTER TABLE `disputes` DISABLE KEYS */;
/*!40000 ALTER TABLE `disputes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `imageable_id` bigint unsigned DEFAULT NULL,
  `imageable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'/storage/post-media/7/350x350.jpg',9,7,'App\\Models\\Post',1,'2022-02-25 21:53:18','2022-02-25 21:53:18','350x350.jpg','jpg'),(2,'/storage/post-media/7/aVcG2I2ctwHZQ1ciPFlsCuICOWMV1tsqY7cQ3WGn.jpg',9,7,'App\\Models\\Post',1,'2022-02-25 21:53:18','2022-02-25 21:53:18','aVcG2I2ctwHZQ1ciPFlsCuICOWMV1tsqY7cQ3WGn.jpg','jpg'),(3,'/storage/post-media/8/sample-mp4-file-small.mp4',9,8,'App\\Models\\Post',2,'2022-02-25 21:55:06','2022-02-25 21:55:06','sample-mp4-file-small.mp4','mp4'),(4,'/storage/post-media/9/file_example_MP3_700KB.mp3',9,9,'App\\Models\\Post',3,'2022-02-25 21:56:00','2022-02-25 21:56:00','file_example_MP3_700KB.mp3','mp3'),(9,'/storage/post-media/11/sample-mp4-file-small.mp4',9,11,'App\\Models\\Post',2,'2022-02-25 21:58:03','2022-02-25 21:58:03','sample-mp4-file-small.mp4','mp4'),(10,'/storage/post-media/11/file_example_MP3_700KB.mp3',9,11,'App\\Models\\Post',3,'2022-02-25 21:58:03','2022-02-25 21:58:03','file_example_MP3_700KB.mp3','mp3'),(11,'/storage/post-media/13/medusa.jpg',3,13,'App\\Models\\Post',1,'2022-02-26 09:53:34','2022-02-26 09:53:34','medusa.jpg','jpg'),(12,'/storage/post-media/14/Drawing_tattoo_ideas_I_best_tattoo_sketches_ideas_I_doodle_tattoos.jfif',3,14,'App\\Models\\Post',1,'2022-02-26 09:56:51','2022-02-26 09:56:51','Drawing tattoo ideas I best tattoo sketches ideas I doodle tattoos.jfif','jfif'),(13,'/storage/post-media/14/medusa.jpg.jfif',3,14,'App\\Models\\Post',1,'2022-02-26 09:56:51','2022-02-26 09:56:51','medusa.jpg.jfif','jfif'),(14,'/storage/post-media/14/medusa.jpg',3,14,'App\\Models\\Post',1,'2022-02-26 09:56:51','2022-02-26 09:56:51','medusa.jpg','jpg'),(15,'/storage/post-media/16/Floating_Capital,_Jedd_Chevrier.jpg',3,16,'App\\Models\\Post',1,'2022-02-27 13:41:16','2022-02-27 13:41:16','Floating Capital, Jedd Chevrier.jpg','jpg'),(16,'/storage/post-media/17/image_processing20200413-30497-q2biik.png',3,17,'App\\Models\\Post',1,'2022-02-27 14:34:48','2022-02-27 14:34:48','image_processing20200413-30497-q2biik.png','png'),(17,'/storage/post-media/20/medusa.jpg',3,20,'App\\Models\\Post',1,'2022-03-01 18:17:12','2022-03-01 18:17:12','medusa.jpg','jpg'),(18,'/storage/post-media/20/arrow-03.png',3,20,'App\\Models\\Post',1,'2022-03-01 18:17:12','2022-03-01 18:17:12','arrow-03.png','png'),(19,'/storage/post-media/20/arrow-04.png',3,20,'App\\Models\\Post',1,'2022-03-01 18:17:12','2022-03-01 18:17:12','arrow-04.png','png'),(20,'/storage/post-media/20/arrow-05.png',3,20,'App\\Models\\Post',1,'2022-03-01 18:17:12','2022-03-01 18:17:12','arrow-05.png','png'),(21,'/storage/post-media/22/arrow-04.png',3,22,'App\\Models\\Post',1,'2022-03-01 18:18:21','2022-03-01 18:18:21','arrow-04.png','png'),(22,'/storage/post-media/24/medusa.jpg',3,24,'App\\Models\\Post',1,'2022-03-03 21:24:26','2022-03-03 21:24:26','medusa.jpg','jpg'),(23,'/storage/post-media/25/coffee-beans-5712780_1280.jpg',3,25,'App\\Models\\Post',1,'2022-03-04 12:27:20','2022-03-04 12:27:20','coffee-beans-5712780_1280.jpg','jpg'),(24,'/storage/post-media/26/coffee-beans-5712780_1280.jpg',9,26,'App\\Models\\Post',1,'2022-03-04 12:28:55','2022-03-04 12:28:55','coffee-beans-5712780_1280.jpg','jpg'),(25,'/storage/post-media/27/NHD_M154_09.jpg',3,27,'App\\Models\\Post',1,'2022-03-05 19:49:19','2022-03-05 19:49:19','NHD_M154_09.jpg','jpg'),(26,'/storage/post-media/28/Single_Question_Single_Answer_and_Reading___Etsy.jpg',3,28,'App\\Models\\Post',1,'2022-03-05 19:51:51','2022-03-05 19:51:51','Single Question Single Answer and Reading _ Etsy.jpg','jpg'),(27,'/storage/post-media/28/arrow-05.png',3,28,'App\\Models\\Post',1,'2022-03-05 19:51:51','2022-03-05 19:51:51','arrow-05.png','png'),(28,'/storage/post-media/28/arrow-04.png',3,28,'App\\Models\\Post',1,'2022-03-05 19:51:51','2022-03-05 19:51:51','arrow-04.png','png'),(29,'/storage/post-media/28/Floating_Capital,_Jedd_Chevrier.jpg',3,28,'App\\Models\\Post',1,'2022-03-05 19:51:51','2022-03-05 19:51:51','Floating Capital, Jedd Chevrier.jpg','jpg'),(30,'/storage/post-media/29/511224-285x380.jpg',3,29,'App\\Models\\Post',1,'2022-03-06 10:49:06','2022-03-06 10:49:06','511224-285x380.jpg','jpg');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `likes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `likeable_id` bigint unsigned DEFAULT NULL,
  `likeable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` int NOT NULL DEFAULT '0',
  `user_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (1,24,'App\\Models\\Post',1,3,'2022-03-03 22:47:15','2022-03-03 23:12:44'),(2,23,'App\\Models\\Post',1,3,'2022-03-03 22:47:19','2022-03-05 16:36:49'),(3,17,'App\\Models\\Post',0,3,'2022-03-03 22:47:23','2022-03-03 22:47:35'),(4,22,'App\\Models\\Post',1,3,'2022-03-03 22:49:59','2022-03-03 22:50:28'),(5,21,'App\\Models\\Post',1,3,'2022-03-03 22:50:30','2022-03-09 17:18:26'),(6,25,'App\\Models\\Post',1,9,'2022-03-04 20:03:22','2022-03-04 20:03:22'),(7,25,'App\\Models\\Post',1,3,'2022-03-04 20:10:10','2022-05-09 12:43:28'),(8,26,'App\\Models\\Post',1,3,'2022-03-04 20:10:12','2022-03-16 22:02:46'),(9,2,'App\\Models\\Image',1,9,'2022-03-08 04:00:22','2022-03-08 04:00:38'),(10,1,'App\\Models\\Comment',1,9,'2022-03-08 05:00:39','2022-03-08 05:00:39'),(11,2,'App\\Models\\Comment',1,9,'2022-03-08 05:01:24','2022-03-08 05:01:24'),(12,4,'App\\Models\\Comment',1,9,'2022-03-08 05:01:25','2022-03-08 05:01:25'),(13,5,'App\\Models\\Comment',1,9,'2022-03-08 22:09:21','2022-03-08 22:09:21'),(14,28,'App\\Models\\Post',1,9,'2022-03-08 22:09:23','2022-03-08 22:09:23'),(15,27,'App\\Models\\Post',1,9,'2022-03-08 23:16:14','2022-03-08 23:16:14'),(16,6,'App\\Models\\Comment',1,9,'2022-03-08 23:16:21','2022-03-08 23:16:21'),(17,6,'App\\Models\\Image',1,3,'2022-03-09 10:00:56','2022-03-09 10:00:56'),(18,1,'App\\Models\\Image',1,3,'2022-03-09 10:00:58','2022-03-16 22:08:22'),(19,2,'App\\Models\\Image',0,3,'2022-03-09 10:01:01','2022-05-07 08:45:00'),(20,7,'App\\Models\\Image',1,3,'2022-03-09 10:01:03','2022-03-09 10:01:03'),(21,8,'App\\Models\\Image',1,3,'2022-03-09 10:01:04','2022-03-09 10:01:04'),(22,5,'App\\Models\\Image',1,3,'2022-03-09 10:01:05','2022-03-16 22:08:20'),(23,10,'App\\Models\\Post',1,9,'2022-03-09 12:38:00','2022-03-09 12:38:00'),(24,4,'App\\Models\\Post',0,9,'2022-03-09 12:38:06','2022-03-09 12:38:38'),(25,1,'App\\Models\\Post',1,9,'2022-03-09 12:38:13','2022-03-09 12:38:14'),(26,29,'App\\Models\\Post',1,3,'2022-03-09 12:44:35','2022-03-09 12:44:35'),(27,11,'App\\Models\\Post',1,3,'2022-03-15 21:48:31','2022-03-15 21:48:31'),(28,10,'App\\Models\\Post',1,3,'2022-03-15 21:48:33','2022-03-15 21:48:33'),(29,6,'App\\Models\\Image',1,9,'2022-03-15 23:45:32','2022-03-15 23:45:32'),(30,24,'App\\Models\\Image',1,3,'2022-03-16 18:23:21','2022-05-09 12:42:48'),(31,20,'App\\Models\\Comment',1,9,'2022-03-16 18:41:59','2022-03-16 18:41:59'),(32,19,'App\\Models\\Comment',1,9,'2022-03-16 18:42:14','2022-03-16 18:42:14'),(33,18,'App\\Models\\Comment',1,9,'2022-03-16 18:42:24','2022-03-16 18:42:24'),(34,8,'App\\Models\\Comment',1,9,'2022-03-16 18:44:39','2022-03-16 18:44:43'),(35,31,'App\\Models\\Post',1,3,'2022-03-16 20:20:32','2022-05-09 12:43:22'),(36,1,'App\\Models\\Comment',1,3,'2022-03-16 22:02:19','2022-03-16 22:02:19'),(37,8,'App\\Models\\Comment',1,3,'2022-03-16 22:02:21','2022-03-16 22:02:21'),(38,24,'App\\Models\\Comment',1,3,'2022-03-16 22:02:28','2022-03-16 22:02:43'),(39,31,'App\\Models\\Comment',1,3,'2022-03-16 22:07:38','2022-03-16 22:07:38'),(40,28,'App\\Models\\Post',0,3,'2022-05-09 13:00:18','2022-05-09 13:00:21');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Games',NULL,'2021-12-29 15:05:16',NULL),(2,'Lifestyle',NULL,'2021-12-29 15:05:16',NULL);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_from_sender` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_from_receiver` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int DEFAULT NULL,
  `conversation_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'puto',0,0,0,3,1,'2021-12-29 16:45:26','2021-12-29 16:45:26'),(2,'hi',0,0,0,3,1,'2022-01-10 13:37:52','2022-01-10 13:37:52'),(3,'A new order has been created: #1. Please follow the site rules and have fun!',0,0,0,NULL,1,'2022-01-11 14:43:45','2022-01-11 14:43:45'),(4,'A new order has been created: #2. Please follow the site rules and have fun!',0,0,0,NULL,1,'2022-01-11 18:37:10','2022-01-11 18:37:10'),(5,'hi',0,0,0,3,1,'2022-05-09 13:03:40','2022-05-09 13:03:40');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_06_01_000001_create_oauth_auth_codes_table',1),(4,'2016_06_01_000002_create_oauth_access_tokens_table',1),(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(6,'2016_06_01_000004_create_oauth_clients_table',1),(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(8,'2019_05_03_000001_create_customer_columns',1),(9,'2019_05_03_000002_create_subscriptions_table',1),(10,'2019_05_03_000003_create_subscription_items_table',1),(11,'2019_08_19_000000_create_failed_jobs_table',1),(12,'2021_09_02_061536_create_posts_table',1),(13,'2021_09_18_154113_create_conversations_table',1),(14,'2021_09_18_154120_create_messages_table',1),(15,'2021_09_26_131344_create_categories_table',1),(16,'2021_10_05_091032_create_menus_table',1),(17,'2021_10_05_091301_create_services_table',1),(18,'2021_10_05_091431_create_category_types_table',1),(19,'2021_10_05_093504_create_transactions_table',1),(20,'2021_10_18_111322_create_service_images_table',1),(21,'2021_11_14_084953_create_orders_table',1),(22,'2021_11_16_181421_create_seller_applications_table',1),(23,'2021_12_04_141047_create_withdrawal_requests_table',1),(24,'2021_12_09_154119_create_ratings_table',1),(25,'2021_12_13_125613_create_disputes_table',1),(26,'2021_12_22_134031_create_tickets_table',1),(27,'2021_12_22_134059_create_ticket_replies_table',1),(28,'2021_12_23_081135_create_dispute_replies_table',1),(29,'2022_01_24_231321_add_col_tnc_user_tbl',2),(30,'2022_02_24_205633_create_media_tbl',3),(31,'2022_02_25_210352_create_posts_tbl_final',4),(32,'2022_02_25_212215_add_name_to_media_tbl',5),(33,'2022_02_25_214856_add_name_to_media_tbl_final',6),(34,'2022_03_01_155209_create_news_table',7),(35,'2022_03_03_181246_create_likes_table',8),(36,'2022_03_03_195033_create_comments_table',8),(37,'2022_03_08_070932_user_thumbnail_col_add',9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `user_id` int DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'GamersPlay - Officially launching , June 2022','<p>Stay tunned, GamersPlay is officially launching, June 2022</p>',3,'storage/news/1/C40LiODKZKW8vozfwBsltP9AH7accVtVQm6TGjsm.png',1,'2022-03-01 17:04:33','2022-03-25 15:35:38'),(4,'GamersPlay is seeking investors.','<p>Hello,</p><p><br></p><p>We are seeking investors to invest on our gaming platform.</p><p>For more information visit: <a href=\"gamersplay.gg/invest\" target=\"_blank\">gamersplay.gg/invest</a> or contact us: <a href=\"mailto:support@gamersplay.gg\" target=\"_blank\"><u>support@gamersplay.gg</u></a></p><p><br></p><p>Regards,</p><p>GamersPlay LTD, CEO</p><p>Alex G.</p>',3,'storage/news/4/WSVQlFtJvHmAryULMhAj03i4l4LDL6OK5MZGuZ8C.png',1,'2022-03-01 17:09:46','2022-03-25 15:32:34');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `client_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `client_id` bigint unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tx_id` int DEFAULT NULL,
  `buyer_id` int DEFAULT NULL,
  `seller_id` int DEFAULT NULL,
  `service_id` int DEFAULT NULL,
  `price` decimal(13,2) NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `feedback_posted` int NOT NULL DEFAULT '0',
  `escrow` int NOT NULL DEFAULT '1',
  `escrow_release` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,8,3,1,1,5.50,0,0,1,'2022-01-12 14:43:45','2022-01-11 14:43:45','2022-01-11 14:43:45'),(2,13,3,1,1,5.50,0,0,1,'2022-01-12 18:37:10','2022-01-11 18:37:10','2022-01-11 18:37:10');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('tehswarm@gmail.com','$2y$10$l.SQFnec5Y2KEv.yeXAOX.R94FV4nH8ZZy5ag3wuPq1omPtoaSX6K','2022-01-25 20:41:24');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` int DEFAULT NULL,
  `service_id` int DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `state_id` tinyint(1) NOT NULL DEFAULT '1',
  `type_id` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'hello',9,1,1,1,1,'2022-02-25 21:13:36','2022-02-25 21:13:36'),(4,'Helo',9,1,1,1,1,'2022-02-25 21:15:55','2022-02-25 21:15:55'),(7,'testing',9,1,1,1,1,'2022-02-25 21:53:18','2022-02-25 21:53:18'),(8,'Hello',9,1,1,1,1,'2022-02-25 21:55:06','2022-02-25 21:55:06'),(9,'Hello',9,1,1,1,1,'2022-02-25 21:56:00','2022-02-25 21:56:00'),(10,NULL,9,1,1,1,1,'2022-02-25 21:57:31','2022-02-25 21:57:31'),(11,NULL,9,1,1,1,1,'2022-02-25 21:58:03','2022-02-25 21:58:03'),(12,'kkk',3,4,1,1,1,'2022-02-26 09:52:59','2022-02-26 09:52:59'),(13,'ggg',3,4,1,1,1,'2022-02-26 09:53:34','2022-02-26 09:53:34'),(14,'test 3',3,4,1,1,1,'2022-02-26 09:56:51','2022-02-26 09:56:51'),(15,'test 1 test 1',3,4,1,1,1,'2022-02-26 16:28:56','2022-02-26 16:28:56'),(16,NULL,3,4,1,1,1,'2022-02-27 13:41:16','2022-02-27 13:41:16'),(17,NULL,3,3,1,1,1,'2022-02-27 14:34:48','2022-02-27 14:34:48'),(18,'OH YEAH BABE',3,4,1,1,1,'2022-03-01 17:24:25','2022-03-01 17:24:25'),(19,'sdsd',3,4,1,1,1,'2022-03-01 18:17:00','2022-03-01 18:17:00'),(20,NULL,3,4,1,1,1,'2022-03-01 18:17:12','2022-03-01 18:17:12'),(21,'test',3,4,1,1,1,'2022-03-01 18:18:13','2022-03-01 18:18:13'),(22,NULL,3,4,1,1,1,'2022-03-01 18:18:21','2022-03-01 18:18:21'),(23,'sdsd',3,3,1,1,1,'2022-03-03 21:24:06','2022-03-03 21:24:06'),(24,NULL,3,3,1,1,1,'2022-03-03 21:24:26','2022-03-03 21:24:26'),(25,NULL,3,3,1,1,1,'2022-03-04 12:27:20','2022-03-04 12:27:20'),(26,NULL,9,3,1,1,1,'2022-03-04 12:28:55','2022-03-04 12:28:55'),(27,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxkxkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk',3,1,1,1,1,'2022-03-05 19:49:19','2022-03-05 19:49:19'),(28,'test 4 pics',3,1,1,1,1,'2022-03-05 19:51:51','2022-03-05 19:51:51'),(29,NULL,3,3,1,1,1,'2022-03-06 10:49:06','2022-03-06 10:49:06'),(31,'https://www.youtube.com/watch?v=xrR3xQNeB_Y',9,3,1,1,1,'2022-03-16 16:38:08','2022-03-16 16:38:08');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ratings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `service_id` int NOT NULL,
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `rating` int NOT NULL,
  `anonymous` int NOT NULL DEFAULT '0',
  `anonymous_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
INSERT INTO `ratings` VALUES (1,1,0,1,3,0,'Testing Account','Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. My first review.','2022-02-25 22:09:39',NULL),(2,1,0,1,3,0,'Testing Account Two','Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. My second review.','2022-02-25 22:09:39',NULL);
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seller_applications`
--

DROP TABLE IF EXISTS `seller_applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seller_applications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `denied_at` datetime DEFAULT NULL,
  `audio_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seller_applications`
--

LOCK TABLES `seller_applications` WRITE;
/*!40000 ALTER TABLE `seller_applications` DISABLE KEYS */;
INSERT INTO `seller_applications` VALUES (2,9,2,NULL,'storage/audio-verifications/9/2SGn4YyprjG9kpR9OUyjGEvJoicM492j862H06tI.mp3','2022-01-26 23:15:03','2022-01-26 23:16:11');
/*!40000 ALTER TABLE `seller_applications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_images`
--

DROP TABLE IF EXISTS `service_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `service_id` int NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int NOT NULL DEFAULT '1',
  `default_image` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_images`
--

LOCK TABLES `service_images` WRITE;
/*!40000 ALTER TABLE `service_images` DISABLE KEYS */;
INSERT INTO `service_images` VALUES (1,3,'storage/services/3/zyiUykZQMbv0RQ4LmVbweSEAM3iq5VTYRPTlRexc.jpg',1,0,'2022-01-26 23:21:32','2022-01-26 23:21:32');
/*!40000 ALTER TABLE `service_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `category_type_id` int NOT NULL,
  `rating` decimal(5,1) DEFAULT NULL,
  `ratings_count` int NOT NULL DEFAULT '0',
  `udf1_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `udf2_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `udf3_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructions` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `price` decimal(13,2) NOT NULL DEFAULT '5.00',
  `monday_from` time DEFAULT NULL,
  `monday_to` time DEFAULT NULL,
  `tuesday_from` time DEFAULT NULL,
  `tuesday_to` time DEFAULT NULL,
  `wednesday_from` time DEFAULT NULL,
  `wednesday_to` time DEFAULT NULL,
  `thursday_from` time DEFAULT NULL,
  `thursday_to` time DEFAULT NULL,
  `friday_from` time DEFAULT NULL,
  `friday_to` time DEFAULT NULL,
  `saturday_from` time DEFAULT NULL,
  `saturday_to` time DEFAULT NULL,
  `sunday_from` time DEFAULT NULL,
  `sunday_to` time DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Testing Service',1,1,0,NULL,0,NULL,NULL,NULL,NULL,1,5.50,'00:00:00','23:59:59','00:00:00','23:59:59','00:00:00','23:59:59','00:00:00','23:59:59','00:00:00','23:59:59','00:00:00','23:59:59','00:00:00','23:59:59','This is a test.','2021-12-29 15:05:17',NULL),(2,'Test two',1,2,0,NULL,0,NULL,NULL,NULL,NULL,1,5.50,'00:00:00','23:59:59','00:00:00','23:59:59','00:00:00','23:59:59','00:00:00','23:59:59','00:00:00','23:59:59','00:00:00','23:59:59','00:00:00','23:59:59','This is a test.','2021-12-29 15:05:17','2022-01-26 17:43:56'),(3,'New Service',9,1,0,NULL,0,NULL,NULL,NULL,'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Lorem Ipsum is simply dummy text of the printing and typesetting industry.',1,10.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'tt is a long established fact.','2022-01-26 23:17:59','2022-01-26 23:24:33'),(4,'Testing Service',1,1,0,NULL,0,NULL,NULL,NULL,NULL,1,5.50,'00:00:00','23:59:59','00:00:00','23:59:59','00:00:00','23:59:59','00:00:00','23:59:59','00:00:00','23:59:59','00:00:00','23:59:59','00:00:00','23:59:59','This is a test.','2022-02-25 21:06:58',NULL),(5,'',1,2,0,NULL,0,NULL,NULL,NULL,NULL,1,5.50,'00:00:00','23:59:59','00:00:00','23:59:59','00:00:00','23:59:59','00:00:00','23:59:59','00:00:00','23:59:59','00:00:00','23:59:59','00:00:00','23:59:59','This is a test.','2022-02-25 21:06:58',NULL);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_items`
--

DROP TABLE IF EXISTS `subscription_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscription_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `subscription_id` bigint unsigned NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_product` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_items`
--

LOCK TABLES `subscription_items` WRITE;
/*!40000 ALTER TABLE `subscription_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscription_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_replies`
--

DROP TABLE IF EXISTS `ticket_replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ticket_replies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `ticket_id` int NOT NULL,
  `staff_id` int DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_replies`
--

LOCK TABLES `ticket_replies` WRITE;
/*!40000 ALTER TABLE `ticket_replies` DISABLE KEYS */;
INSERT INTO `ticket_replies` VALUES (1,3,3,3,'rtert','2022-01-26 15:09:34','2022-01-26 15:09:34');
/*!40000 ALTER TABLE `ticket_replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tickets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,9,'sdcsdc','sdcsdc',3,'2022-01-12 11:52:42','2022-01-12 11:52:57'),(2,3,'sdfsdfsdf','sdfsdf',3,'2022-01-17 11:00:44','2022-01-17 11:01:56'),(3,3,'ertert','ertert',3,'2022-01-17 11:03:18','2022-01-26 15:10:02');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` int NOT NULL,
  `user_id` int NOT NULL,
  `amount` decimal(13,2) NOT NULL,
  `inc_dec` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `paypal_tx_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_tx_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,0,3,20.00,'inc','paypal','0','20',NULL,NULL,'PAYID-MHKEKTQ3W392404013236709',NULL,'2022-01-04 13:02:05','2022-01-04 13:02:06'),(2,0,8,1000.00,'inc','paypal','0','1000',NULL,NULL,'PAYID-MHNXJ5I14H21153VM7340921',NULL,'2022-01-09 23:51:15','2022-01-09 23:51:17'),(3,0,3,20.00,'inc','paypal','0','20',NULL,NULL,'PAYID-MHODWVY1JK02432H0199742X',NULL,'2022-01-10 13:57:42','2022-01-10 13:57:43'),(4,0,3,20.00,'inc','paypal','0','20',NULL,NULL,'PAYID-MHOXM2I63296497SC352820B',NULL,'2022-01-11 12:22:00','2022-01-11 12:22:01'),(5,0,3,20.00,'inc','stripe','1','20',NULL,NULL,NULL,'pi_3KGjNBK83ILMoJrg1LwAalx4','2022-01-11 12:22:47','2022-01-11 12:22:47'),(6,0,3,1000.00,'inc','stripe','1','1000',NULL,NULL,NULL,'pi_3KGjNUK83ILMoJrg03ZSXF6O','2022-01-11 12:23:05','2022-01-11 12:23:05'),(7,0,3,100.00,'inc','stripe','1','100',NULL,NULL,NULL,'pi_3KGlZKK83ILMoJrg17zxDabH','2022-01-11 14:43:27','2022-01-11 14:43:27'),(8,1,3,5.50,'dec',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-01-11 14:43:45','2022-01-11 14:43:45'),(9,0,10,30.00,'inc','stripe','1','30',NULL,NULL,NULL,'pi_3KGp25K83ILMoJrg0HTxFDO3','2022-01-11 18:25:22','2022-01-11 18:25:22'),(10,0,10,30.00,'inc','stripe','1','30',NULL,NULL,NULL,'pi_3KGp2HK83ILMoJrg0GuN63ak','2022-01-11 18:25:34','2022-01-11 18:25:34'),(11,0,10,1000.00,'inc','paypal','0','1000',NULL,NULL,'PAYID-MHO4XJA6RL124709V573221J',NULL,'2022-01-11 18:25:39','2022-01-11 18:25:40'),(12,0,10,1000.00,'inc','stripe','1','1000',NULL,NULL,NULL,'pi_3KGp2dK83ILMoJrg0Vn86Pvq','2022-01-11 18:25:56','2022-01-11 18:25:56'),(13,1,3,5.50,'dec',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-01-11 18:37:10','2022-01-11 18:37:10'),(14,0,9,100.00,'inc','paypal','0','100',NULL,NULL,'PAYID-MHO54CA50A24997HE897541Y',NULL,'2022-01-11 19:44:07','2022-01-11 19:44:08'),(15,0,3,30.00,'inc','paypal','0','30',NULL,NULL,'PAYID-MHYGFAA4NT01330LB455941P',NULL,'2022-01-25 20:50:07','2022-01-25 20:50:08');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `real_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'New User',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'GamersPlay User',
  `birth_date` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `primary_language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'English',
  `secondary_language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` decimal(13,2) NOT NULL DEFAULT '0.00',
  `earned_gp` decimal(13,2) NOT NULL DEFAULT '0.00',
  `active` int NOT NULL DEFAULT '1',
  `banned` int NOT NULL DEFAULT '0',
  `discord_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitch_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apple_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitch_profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discord_handle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_group` int NOT NULL DEFAULT '0',
  `user_subscription_rank` int NOT NULL DEFAULT '0',
  `seller_rank` int NOT NULL DEFAULT '0',
  `seller_audio_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_vacation_mode` int NOT NULL DEFAULT '0',
  `seller_rank_update` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `tnc` int NOT NULL DEFAULT '0',
  `profile_thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_stripe_id_index` (`stripe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Test','Test','test@test.com','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL,NULL,'2021-12-29 15:04:29','$2y$10$cUnTRSWlk3Sd3hgbsLQCe.n6.NkHjNZgLraXLHqGxNyiF7DS0xWKO','7Mx3FKHBXzXIHEzWxHHDlycI9a5rFZhliAvpCiTV8S54C8ozq2YBYxpuGrwW','2021-12-29 15:03:21','2021-12-29 15:04:29',NULL,NULL,NULL,NULL,0,NULL),(2,'Shone','Shone Test','ShoneRL@protonmail.com','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0,0,'storage/audio-verifications/2/V7I2Fj8PSfpZ6Wo6RpXedu3P9s2RlxzYqVaJm2zJ.mp3',0,'2021-12-31 10:28:07','2021-12-29 15:05:06','2022-01-01 18:48:08','$2y$10$Clf9v9.DwGi2XW.yGDEGeOk/0Uvplq20nvBh/W3kZDbk7TTVn7mD.','DJedDwVI2mCRA4oxEWjwAi48iovipRGX4RebnPD3RAcOyHyP8i6SF2fbyzGR','2021-12-29 15:04:44','2022-01-01 18:48:08',NULL,NULL,NULL,NULL,0,NULL),(3,'diamond','aasss','tehswarm@gmail.com','N/A','Male','GamersPlay User',NULL,NULL,'English',NULL,1109.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'http://gamersplay.gg/storage/avatars/ylAavvs6dvEWppcfAXNWmFKtKqlvDhjOvE6oaSNw.jpg',3,0,0,NULL,0,NULL,'2021-12-29 15:35:05','2022-05-10 10:13:36','$2y$10$g8RT0zKdDH4GN11si0BF0OTXHDrNNIf7FMZhSnTbwazARMLbd2XBO','jN2LMX2qPDIHnnZm1Txp7zOvmopewGa0WnLt94edPjay4OaeGpfhfhtBjBOy','2021-12-29 15:34:00','2022-05-10 10:13:36','cus_Kwcccd4h3yT1qj','visa','1111',NULL,0,'/storage/avatars/thumbnail/julen-urrutia-mononoke-00000.jpg'),(4,'Test','test test','test111@gmail.com','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL,NULL,'2021-12-29 15:36:59','$2y$10$8cImVzK.eySKd/Z8kF1gb.QcgmFzPHiiRdRkiXzt3TGpo7C0jrUke',NULL,'2021-12-29 15:36:41','2021-12-29 15:36:59',NULL,NULL,NULL,NULL,0,NULL),(5,'20Sven','Pontikos John','iyspain37@gmai.com','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL,NULL,'2021-12-31 11:57:19','$2y$10$xCE.M8igixepmzI4a4TZJOhDDaSiEp1g7158fe0MwLHOEvj4JM9si',NULL,'2021-12-31 11:55:12','2021-12-31 11:57:19',NULL,NULL,NULL,NULL,0,NULL),(6,'kmalik748','Kshif ali','kmalik748@gmail.com','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL,NULL,'2022-01-07 12:51:52','$2y$10$CvB4HXLryVbugUi1M.T2ie1z/StFMjW6GQdBwZ8GdV1aQEGnzgPCK',NULL,'2022-01-07 12:50:36','2022-01-07 12:51:52',NULL,NULL,NULL,NULL,0,NULL),(7,'hamadpervaiz','Hamad Pervaiz','hamad@bearplex.com','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL,NULL,'2022-01-07 19:54:24','$2y$10$Tn7ykmte0ZzqAryUt6nSdeNNF2IZ7a/nTH6jJjPphRpL9wDXKzvYW',NULL,'2022-01-07 19:51:17','2022-01-07 19:54:24',NULL,NULL,NULL,NULL,0,NULL),(8,'Healer','Danil Sannikov','healer1064729@gmail.com','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL,'2022-01-09 17:07:04','2022-01-11 15:30:39','$2y$10$qFUEpQyHtvCLvF/ScmbH.enCdRb4aBJ0c06IPYCoqJ1iZzGFuQlOy','mBcJD4uaBJwp92fsZMM8xv2OVoqEReXU9AIHoZHqQI2r9y3DGWE9uzGoz4fw','2022-01-09 17:06:33','2022-01-11 15:30:39',NULL,NULL,NULL,NULL,0,NULL),(9,'dexter777','Amit Singh','amritsinghh777@gmail.com','N/A','Male','GamersPlay User',NULL,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum','English','Punjabi',0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'http://www.gamersplay.gg/storage/avatars/IyRVpuO6sZtRIEs6xn26XKuXfpcdT2eY9Ag1rfXC.jpg',0,0,1,'storage/audio-verifications/9/2SGn4YyprjG9kpR9OUyjGEvJoicM492j862H06tI.mp3',0,'2022-01-26 23:16:11','2022-01-11 09:41:54','2022-04-04 22:51:23','$2y$10$qasb6KfGtaIWa7pM7XKVt.HRisc6PACcIYr2FkCgT7DNROOWH/DUW','Khhe2jISW42AMfb2eXJvQBPF5wHkdDTdPu3nDEK9vyIq1YjdCURRNkNwqcIv','2022-01-11 09:41:21','2022-04-04 22:51:23',NULL,NULL,NULL,NULL,0,'/storage/avatars/thumbnail/350x350.jpg'),(10,'captainx','Arnold Kaca','arnold.kaca@gmail.com','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,1060.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL,'2022-01-11 18:19:19','2022-01-25 21:17:39','$2y$10$URfY1apQX81k.zV0bgOuZ.dhPEKZMLupJ6AnsKqlSJu6XKzFqDU1G','TN30x9lbyEo7qodFQj1DsvcHZvm0UoYEEhKB9qufnZc2ouQ2GnoOwlDTbD8x','2022-01-11 18:18:06','2022-01-25 21:17:39','cus_KwiS4S3Iv5xKKw','visa','4242',NULL,0,NULL),(11,'20Seven','20Sevem','iyspain37@gmail.com','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL,'2022-01-20 02:40:14','2022-03-09 12:40:16','$2y$10$E772FDKQrul6GWrsIWCjy.VfpnqYwKEgjPAjG3aH/BovLU3L6SjJW',NULL,'2022-01-20 02:39:06','2022-03-09 12:40:16',NULL,NULL,NULL,NULL,0,NULL),(12,'jksndcjk','sdjcnlskdc','testingggg@gmail.com','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL,NULL,'2022-01-25 19:54:33','$2y$10$t06MqkmBeYf234646eUIVeXf8dLVBYxvX7ntk1ngag.r7sWDXq1qy',NULL,'2022-01-25 19:28:12','2022-01-25 19:54:33',NULL,NULL,NULL,NULL,1,NULL),(13,'sdcs','sdcsd','testinggg@yopmail.com','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL,NULL,'2022-01-25 19:49:31','$2y$10$QMkT1dPliz370SV55pEkDeyGAaEvcX/auUxZfTdK52fhMJp890mkq',NULL,'2022-01-25 19:47:51','2022-01-25 19:49:31',NULL,NULL,NULL,NULL,1,NULL),(14,'sdcvdfvdf','dfvdf','amritsing@gmail.com','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL,NULL,'2022-01-26 11:45:12','$2y$10$e4.E0HjtK1.YT4agFsLIietErsrqz/XfAKAFaOUvkAc6iHC269u0y',NULL,'2022-01-26 11:38:10','2022-01-26 11:45:12',NULL,NULL,NULL,NULL,1,NULL),(15,'Amrit Singh','sdcsdcsd','testingone@gmail.com','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL,NULL,'2022-01-26 12:24:59','$2y$10$77pkew3z0Chtq7WA60KgOu.XXQYlDZnFdI81Qdbr7L/4C75tcRcOy',NULL,'2022-01-26 12:24:58','2022-01-26 12:24:59',NULL,NULL,NULL,NULL,1,NULL),(16,'Amrit Singh','sdc','sdc@gmail.com','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL,NULL,'2022-01-26 12:26:08','$2y$10$CWXAMtBPyHSfcnhP9PQkYefCPXBFMf9yGvK8D0CQtBYSRfWyGSEyq',NULL,'2022-01-26 12:26:06','2022-01-26 12:26:08',NULL,NULL,NULL,NULL,1,NULL),(17,'panda','panda bro','support@Gamersplay.gg','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL,NULL,'2022-01-26 13:44:03','$2y$10$iuNscP4mA7TI2Tnqvqyk0OSwXLNrHhLfbmcJMQrRkv.GpNKt1jK4a',NULL,'2022-01-26 13:11:58','2022-01-26 13:44:03',NULL,NULL,NULL,NULL,1,NULL),(18,'dfvdfv','dfvdf','amridfhh777@gmail.com','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL,NULL,'2022-01-26 17:34:34','$2y$10$7UCMr1dZJrZLPABccd/lieqzhXbm5W2CH8.Tayeqc/aLCSFYaCUYS',NULL,'2022-01-26 17:34:27','2022-01-26 17:34:34',NULL,NULL,NULL,NULL,1,NULL),(19,'sdc','sdcsdc','sdc@dfv.sdc','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL,NULL,'2022-01-26 18:18:16','$2y$10$4A3dAAWSsggIN2KXdZg91uhqkoIn7KD77D/KQcd9Rt6yYQdTjmUyq',NULL,'2022-01-26 18:18:12','2022-01-26 18:18:16',NULL,NULL,NULL,NULL,1,NULL),(20,'sds','sdsd','asdad@gmail.comgg','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL,NULL,'2022-01-26 20:11:42','$2y$10$1ZUMFrkr/keJCMU8qm09lOmBPGNtnnK8J16FitBAlYyT.WyS68iaK',NULL,'2022-01-26 20:11:39','2022-01-26 20:11:42',NULL,NULL,NULL,NULL,1,NULL),(21,'asdasd','asdasd','asasdasddasd@gmail.com','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL,NULL,'2022-01-26 20:15:35','$2y$10$H7NEnlKW7JdN67kOAzIfk.4Cg8p4R/yLAQAoCSyVOeTHeH5dL.Pfu',NULL,'2022-01-26 20:15:31','2022-01-26 20:15:35',NULL,NULL,NULL,NULL,1,NULL),(22,'Sooxzay','idontsay that','daniilko1978@gmail.com','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL,NULL,'2022-04-15 10:10:08','$2y$10$W6aW/5.wg8KuPtvqPhlueOPLNmqOMl2NY/hNkfOhh6UzF/ZDpPz6O',NULL,'2022-04-15 10:07:51','2022-04-15 10:10:08',NULL,NULL,NULL,NULL,1,NULL),(23,'Most','Robert Braddocke','handsome010216@gmail.com','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL,NULL,'2022-05-07 09:40:52','$2y$10$yocmEUJaK2HWE9GEOYeo5uTJ2PnPILyZY3pK7HnvqSErdaPJnGtDO',NULL,'2022-05-07 09:30:08','2022-05-07 09:40:52',NULL,NULL,NULL,NULL,1,NULL),(24,'Anton','Anton Semonov','dolgihe179@gmail.com','N/A',NULL,'GamersPlay User',NULL,NULL,'English',NULL,0.00,0.00,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,0,NULL,NULL,'2022-05-07 16:46:36','$2y$10$NMBrcw/PAD6p4x9nMPLbOOyxrLm.WOsIU1.EuKylNqHGXJTehLl6a',NULL,'2022-05-07 16:41:41','2022-05-07 16:46:36',NULL,NULL,NULL,NULL,1,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `withdrawal_requests`
--

DROP TABLE IF EXISTS `withdrawal_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `withdrawal_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `amount` decimal(13,2) NOT NULL,
  `staff_id` int NOT NULL,
  `payment_method` int NOT NULL,
  `bank_iban` text COLLATE utf8mb4_unicode_ci,
  `bank_name` text COLLATE utf8mb4_unicode_ci,
  `bank_swift` text COLLATE utf8mb4_unicode_ci,
  `bank_recipient` text COLLATE utf8mb4_unicode_ci,
  `bank_recipient_address` text COLLATE utf8mb4_unicode_ci,
  `note` text COLLATE utf8mb4_unicode_ci,
  `paypal_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `withdrawal_requests`
--

LOCK TABLES `withdrawal_requests` WRITE;
/*!40000 ALTER TABLE `withdrawal_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `withdrawal_requests` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-11  8:53:03
