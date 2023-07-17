-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: cypress_activity
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.20.04.2

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
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` VALUES (1,'Test activity 1','This is a Test activity 1','images/u67OjUrd2Cw5tRbRD4stXQmPXetF3bJ36TWywGxn.png','2023-07-17','2023-07-17 08:46:03','2023-07-17 08:47:30',NULL),(2,'Test activity 2','This is a Test activity 2','images/lQvF4jvikiHC1LF28GEpOkX33J5HPonqacZka95y.png','2023-07-18','2023-07-17 08:46:31','2023-07-17 08:46:31',NULL),(3,'Test activity 3','This is a Test activity 3','images/7LUYqgHd1zlykhshXUZIHRbtX6rQxUG1CZCOoXBX.png','2023-07-18','2023-07-17 08:46:47','2023-07-17 08:46:47',NULL),(4,'Test activity 4','This is a Test activity 4','images/JfuUyCOmQMdtkRVyI7rFknF2j0crQCatu0iEV3Sk.png','2023-07-19','2023-07-17 08:47:01','2023-07-17 08:47:01',NULL);
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_07_15_064813_add_super_admin_to_users',2),(7,'2023_07_15_093127_create_activities_table',3),(9,'2023_07_16_045916_create_user_activities_table',4),(10,'2023_07_17_113113_add_last_login_fields_to_users',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (1,'App\\Models\\User',7,'authToken','ae9cf90bcab261c69ed3af4b953a23b06e65568376e603184df4cd5af78835e1','[\"*\"]',NULL,NULL,'2023-07-17 05:42:03','2023-07-17 05:42:03'),(2,'App\\Models\\User',7,'authToken','e17ea7927a2701b93595374c6668d74dbc66c75a43260358c07f322f591c8017','[\"*\"]',NULL,NULL,'2023-07-17 05:44:32','2023-07-17 05:44:32'),(3,'App\\Models\\User',7,'authToken','f4a18b54452e325db3d866ac29c72df3f708c6ddb623e26eafd578de1bfb6540','[\"*\"]',NULL,NULL,'2023-07-17 05:44:35','2023-07-17 05:44:35'),(4,'App\\Models\\User',7,'authToken','ccf1f738a91831258cad3f93992ba8ebd196fee822a5fd3ac88b315b11e206b2','[\"*\"]',NULL,NULL,'2023-07-17 05:46:42','2023-07-17 05:46:42'),(5,'App\\Models\\User',8,'authToken','ed1e66aef162db468a2a5c4c16e08d09cfeb4a74156be7f4fa635f6693c84349','[\"*\"]',NULL,NULL,'2023-07-17 05:48:35','2023-07-17 05:48:35'),(6,'App\\Models\\User',8,'authToken','761c5818828a981070dc04b553e3f0405438e0c585eab12defcf2950c5de2f42','[\"*\"]',NULL,NULL,'2023-07-17 05:49:08','2023-07-17 05:49:08'),(7,'App\\Models\\User',8,'authToken','1c0ac978e95e7a9432ab7feccc197205c19300147ed947d178132c4b7e8b765e','[\"*\"]',NULL,NULL,'2023-07-17 06:05:10','2023-07-17 06:05:10'),(8,'App\\Models\\User',7,'authToken','9d1cb0b952f3054ee2e13631b0119ce3bf45c21b7b4c61a6d36ef430a4d66738','[\"*\"]',NULL,NULL,'2023-07-17 06:05:51','2023-07-17 06:05:51'),(9,'App\\Models\\User',8,'authToken','4b8f633d716fb112352f38b957623eb96a079e82b5fd275d8ddd2266dcfc5c40','[\"*\"]',NULL,NULL,'2023-07-17 06:07:56','2023-07-17 06:07:56'),(10,'App\\Models\\User',8,'authToken','403e45d187e7ee1f6b2ef25c0ab6cd1179d914155c84532a717d617880cd2182','[\"*\"]',NULL,NULL,'2023-07-17 06:08:12','2023-07-17 06:08:12'),(11,'App\\Models\\User',8,'authToken','43eb5295d77752d580da24b9ea4052355ed7d86f1ba55087e3117bd0736a77f8','[\"*\"]',NULL,NULL,'2023-07-17 06:08:17','2023-07-17 06:08:17'),(12,'App\\Models\\User',1,'authToken','5bd9567dfc6b35c179c5cb29c303e98935e15a5de10f46178a8e1fab7ddbcbba','[\"*\"]',NULL,NULL,'2023-07-17 07:45:14','2023-07-17 07:45:14'),(13,'App\\Models\\User',1,'authToken','fa59f0b5a502a0fca8139a83630cced4f88d1f9df2a2c4860514390f5ecf0b57','[\"*\"]','2023-07-17 08:48:53',NULL,'2023-07-17 07:50:37','2023-07-17 08:48:53'),(14,'App\\Models\\User',9,'authToken','7ded2e1c1a8c68b3cdf839321aa3419de47d2ee90571eafaba3cb653f6e28011','[\"*\"]','2023-07-17 08:30:32',NULL,'2023-07-17 08:13:53','2023-07-17 08:30:32'),(15,'App\\Models\\User',10,'authToken','ab9b1a24d1b30476e3b66cfadba16191aafa4043c8454d3598e45fc799184153','[\"*\"]','2023-07-17 08:32:02',NULL,'2023-07-17 08:31:38','2023-07-17 08:32:02');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_activities`
--

DROP TABLE IF EXISTS `user_activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_activities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `activity_id` int DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `is_global` tinyint(1) NOT NULL DEFAULT '0',
  `is_edited` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_activities`
--

LOCK TABLES `user_activities` WRITE;
/*!40000 ALTER TABLE `user_activities` DISABLE KEYS */;
INSERT INTO `user_activities` VALUES (1,3,1,'Test activity 1','This is a Test activity 1','images/u67OjUrd2Cw5tRbRD4stXQmPXetF3bJ36TWywGxn.png','2023-07-17',1,0,'2023-07-17 08:46:04','2023-07-17 08:47:31',NULL),(2,4,1,'Test activity 1','This is a Test activity 1','images/u67OjUrd2Cw5tRbRD4stXQmPXetF3bJ36TWywGxn.png','2023-07-17',1,0,'2023-07-17 08:46:04','2023-07-17 08:47:31',NULL),(3,8,1,'Test activity 1','This is a Test activity 1','images/u67OjUrd2Cw5tRbRD4stXQmPXetF3bJ36TWywGxn.png','2023-07-17',1,0,'2023-07-17 08:46:04','2023-07-17 08:47:31',NULL),(4,3,2,'Test activity 2','This is a Test activity 2','images/lQvF4jvikiHC1LF28GEpOkX33J5HPonqacZka95y.png','2023-07-18',1,0,'2023-07-17 08:46:32','2023-07-17 08:46:32',NULL),(5,4,2,'Test activity 2','This is a Test activity 2','images/lQvF4jvikiHC1LF28GEpOkX33J5HPonqacZka95y.png','2023-07-18',1,0,'2023-07-17 08:46:32','2023-07-17 08:46:32',NULL),(6,8,2,'Test activity 2','This is a Test activity 2','images/lQvF4jvikiHC1LF28GEpOkX33J5HPonqacZka95y.png','2023-07-18',1,0,'2023-07-17 08:46:32','2023-07-17 08:46:32',NULL),(7,3,3,'Test activity 3','This is a Test activity 3','images/7LUYqgHd1zlykhshXUZIHRbtX6rQxUG1CZCOoXBX.png','2023-07-18',1,0,'2023-07-17 08:46:47','2023-07-17 08:46:47',NULL),(8,4,3,'Test activity 3','This is a Test activity 3','images/7LUYqgHd1zlykhshXUZIHRbtX6rQxUG1CZCOoXBX.png','2023-07-18',1,0,'2023-07-17 08:46:48','2023-07-17 08:46:48',NULL),(9,8,3,'Test activity 3','This is a Test activity 3','images/7LUYqgHd1zlykhshXUZIHRbtX6rQxUG1CZCOoXBX.png','2023-07-18',1,0,'2023-07-17 08:46:48','2023-07-17 08:46:48',NULL),(10,3,4,'Test activity 4','This is a Test activity 4','images/JfuUyCOmQMdtkRVyI7rFknF2j0crQCatu0iEV3Sk.png','2023-07-19',1,0,'2023-07-17 08:47:01','2023-07-17 08:47:01',NULL),(11,4,4,'Test activity 4','This is a Test activity 4','images/JfuUyCOmQMdtkRVyI7rFknF2j0crQCatu0iEV3Sk.png','2023-07-19',1,0,'2023-07-17 08:47:01','2023-07-17 08:47:01',NULL),(12,8,4,'Test activity 4','This is a Test activity 4','images/JfuUyCOmQMdtkRVyI7rFknF2j0crQCatu0iEV3Sk.png','2023-07-19',1,0,'2023-07-17 08:47:02','2023-07-17 08:47:02',NULL),(13,3,NULL,'Test activity A','This is a Test activity A','images/8Ha94p6hNTilb0200I7K7AiHcq68fhdBMW7D6lKX.png','2023-07-25',0,0,'2023-07-17 08:48:20','2023-07-17 08:48:20',NULL);
/*!40000 ALTER TABLE `user_activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_super_admin` tinyint(1) NOT NULL DEFAULT '0',
  `last_login_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','super@admin.com',NULL,'$2y$10$AGpJRKKAkO4/Uzr8peJbw.JnrgyQ1L8i.uKeopLVtDHXrgZ.WC3fq',NULL,'2023-07-15 01:21:37','2023-07-17 07:50:37',1,'2023-07-17 07:50:37'),(3,'User 1','test1@user.com',NULL,'$2y$10$AGpJRKKAkO4/Uzr8peJbw.JnrgyQ1L8i.uKeopLVtDHXrgZ.WC3fq',NULL,'2023-07-15 01:21:37','2023-07-15 01:21:37',0,NULL),(4,'User 2','test2@user.com',NULL,'$2y$10$AGpJRKKAkO4/Uzr8peJbw.JnrgyQ1L8i.uKeopLVtDHXrgZ.WC3fq',NULL,'2023-07-15 01:21:37','2023-07-15 01:21:37',0,NULL),(8,'Test User','test123@email.com',NULL,'$2y$10$Ym9qm1wp/88.GaagaYFcxODiZ9dMvSs0SJKQu/waxHaBCUlGL9gMe',NULL,'2023-07-17 05:48:00','2023-07-17 06:08:17',0,'2023-07-17 06:08:17');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-17 19:53:36
