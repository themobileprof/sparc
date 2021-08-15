-- MySQL dump 10.13  Distrib 8.0.24, for Linux (x86_64)
--
-- Host: localhost    Database: sparc
-- ------------------------------------------------------
-- Server version	8.0.24

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
-- Table structure for table `component_entries`
--

DROP TABLE IF EXISTS `component_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `component_entries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int unsigned DEFAULT NULL,
  `content` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `component_entries_country_id_foreign` (`country_id`),
  KEY `component_entries_component_id_foreign` (`component_id`),
  CONSTRAINT `component_entries_component_id_foreign` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`),
  CONSTRAINT `component_entries_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `component_entries`
--

LOCK TABLES `component_entries` WRITE;
/*!40000 ALTER TABLE `component_entries` DISABLE KEYS */;
INSERT INTO `component_entries` VALUES (1,1,'Use of evidence necessary for choice of PPM especially for Use of legislation to entrench strategic',6,'2021-08-03 03:16:50','2021-08-03 03:16:50',NULL);
/*!40000 ALTER TABLE `component_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `components`
--

DROP TABLE IF EXISTS `components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `components` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `component` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headerEnglish` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headerFrench` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `components`
--

LOCK TABLES `components` WRITE;
/*!40000 ALTER TABLE `components` DISABLE KEYS */;
INSERT INTO `components` VALUES (1,'country_context','Country context','Contexte du pays','2021-07-30 13:26:57','2021-07-30 13:26:57',NULL),(2,'purchasing_functions','Purchasing functions','Fonctions d’achat','2021-07-30 13:27:51','2021-07-30 13:27:51',NULL),(3,'opportunities','Opportunities','Opportunités','2021-07-30 13:28:21','2021-07-30 13:28:21',NULL),(4,'next_steps','Next steps','Prochaines étapes','2021-07-30 13:29:25','2021-07-30 13:29:25',NULL),(5,'country_shp_objectives_and_priorities','Country SHP objectives and priorities','Objectifs et priorités du pays en achats stratégiques de santé','2021-07-30 13:30:12','2021-07-30 13:30:12',NULL),(6,'key_messages_to_policymakers','Key messages to policymakers','Messages clés aux décideurs politiques','2021-07-30 13:30:43','2021-07-30 13:30:43',NULL);
/*!40000 ALTER TABLE `components` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `context_entries`
--

DROP TABLE IF EXISTS `context_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `context_entries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int unsigned DEFAULT NULL,
  `context_id` int unsigned DEFAULT NULL,
  `year` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `context_entries_country_id_foreign` (`country_id`),
  KEY `context_entries_context_id_foreign` (`context_id`),
  CONSTRAINT `context_entries_context_id_foreign` FOREIGN KEY (`context_id`) REFERENCES `contexts` (`id`),
  CONSTRAINT `context_entries_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `context_entries`
--

LOCK TABLES `context_entries` WRITE;
/*!40000 ALTER TABLE `context_entries` DISABLE KEYS */;
INSERT INTO `context_entries` VALUES (1,NULL,1,'NBS, 2019','$198m','2021-08-03 02:47:22','2021-08-03 03:12:26','2021-08-03 03:12:26'),(2,1,1,'NBS, 2019','$198m','2021-08-03 03:12:31','2021-08-03 03:12:31',NULL);
/*!40000 ALTER TABLE `context_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contexts`
--

DROP TABLE IF EXISTS `contexts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contexts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `english` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `french` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contexts`
--

LOCK TABLES `contexts` WRITE;
/*!40000 ALTER TABLE `contexts` DISABLE KEYS */;
INSERT INTO `contexts` VALUES (1,'population','Population','Population','2021-07-30 11:26:03','2021-07-30 11:26:03',NULL),(2,'gdp_per_capita','GDP per capita','PIB par habitant','2021-07-30 11:28:50','2021-07-30 11:28:50',NULL),(3,'the_per_capita','Total Health Expenditure (THE) per capita','Dépenses Totales de Santé(DTS) par habitant','2021-07-30 11:29:34','2021-07-30 13:11:58',NULL),(4,'public_expenditure_the','Public expenditure as % of THE','Dépenses publiques en % de DTS','2021-07-30 11:30:32','2021-07-30 11:30:32',NULL),(5,'private_expenditure_the','Private expenditure as % of THE','Dépenses privées en % de DTS','2021-07-30 11:31:16','2021-07-30 11:31:16',NULL),(6,'donor_spending_the','Donor spending as % of THE','Dépenses des bailleurs en % de DTS','2021-07-30 11:39:44','2021-07-30 11:39:44',NULL),(7,'che_per_capita','Current Health Expenditure (CHE) per capita','Dépense courante de santé (DCS) par habitant','2021-07-30 11:42:23','2021-07-30 13:13:08',NULL),(8,'direct_household_expenditure_the','Direct household expenditure in % of THE','Dépense directe des ménages en % de la DTS','2021-07-30 13:18:12','2021-07-30 13:20:08',NULL),(9,'domestic_resources_the','Domestic resources for health as a % of THE','Ressources intérieures pour la santé en % de DTS','2021-07-30 13:22:19','2021-07-30 13:22:19',NULL),(10,'external_resources_the','External resources as % of THE','Ressources extérieures pour la santé en % de DTS','2021-07-30 13:22:57','2021-07-30 13:22:57',NULL);
/*!40000 ALTER TABLE `contexts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `cc` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `external_img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'NG','Nigeria','English','ng.png',NULL,NULL,'2021-07-30 00:34:41','2021-07-30 01:10:45',NULL),(2,'BF','Burkina Faso','French','bf.png','Source: BM: Banque Mondiale; CNS: Comptes nationaux de santé; MS: Ministère de la santé',NULL,'2021-07-30 01:04:26','2021-07-30 01:10:57',NULL),(3,'GH','Ghana','English','gh.png',NULL,NULL,'2021-07-30 01:11:53','2021-07-30 01:11:53',NULL),(4,'BJ','Benin','French','bj.png',NULL,'bj-external.png','2021-07-30 01:21:29','2021-07-30 01:21:29',NULL),(5,'CM','Cameroon','English','cm.png',NULL,NULL,'2021-07-30 01:27:33','2021-07-30 01:27:33',NULL),(6,'ZA','South Africa','English','za.png',NULL,NULL,'2021-07-30 01:29:03','2021-07-30 01:29:03',NULL),(7,'UG','Uganda','English','ug.png',NULL,NULL,'2021-07-30 01:30:02','2021-07-30 01:30:02',NULL),(8,'KE','Kenya','English','ke.png',NULL,NULL,'2021-07-30 01:30:55','2021-07-30 01:30:55',NULL),(9,'RW','Rwanda','English','rw.png',NULL,NULL,'2021-07-30 01:32:50','2021-07-30 01:32:50',NULL),(10,'TZ','Tanzania','English','tz.png','Ifakara Health Institute (IHI)',NULL,'2021-07-30 01:34:34','2021-07-30 01:34:34',NULL),(11,'CA','Canada','English','ca.png',NULL,NULL,'2021-08-03 12:55:48','2021-08-03 12:56:59','2021-08-03 12:56:59');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country_sponsor`
--

DROP TABLE IF EXISTS `country_sponsor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country_sponsor` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `country_id` varchar(3) NOT NULL,
  `sponsor_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country_sponsor`
--

LOCK TABLES `country_sponsor` WRITE;
/*!40000 ALTER TABLE `country_sponsor` DISABLE KEYS */;
INSERT INTO `country_sponsor` VALUES (1,'1',11,'2021-08-02 21:00:29','2021-08-02 21:00:29',NULL),(2,'9',2,'2021-08-02 21:15:02','2021-08-02 21:15:02',NULL),(3,'2',12,'2021-08-03 02:31:14','2021-08-03 02:31:14',NULL),(4,'3',10,'2021-08-03 02:31:40','2021-08-03 02:31:40',NULL),(5,'4',7,'2021-08-03 02:32:05','2021-08-03 02:32:05',NULL),(6,'5',6,'2021-08-03 02:32:24','2021-08-03 02:32:24',NULL),(7,'7',4,'2021-08-03 02:33:08','2021-08-03 02:33:08',NULL),(8,'8',3,'2021-08-03 02:33:46','2021-08-03 02:33:46',NULL),(9,'10',5,'2021-08-03 02:34:17','2021-08-03 02:34:17',NULL),(11,'3',9,'2021-08-03 02:35:16','2021-08-03 02:35:16',NULL);
/*!40000 ALTER TABLE `country_sponsor` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2021_07_24_161422_create_components_table',1),(6,'2021_07_24_161423_create_contexts_table',1),(7,'2021_07_24_161424_create_countries_table',1),(8,'2021_07_24_161425_create_sponsors_table',1),(9,'2021_07_24_161426_create_context_entries_table',1),(10,'2021_07_24_161427_create_country_sponsor_table',1),(11,'2021_07_24_161428_create_purchasing_functions_table',1),(12,'2021_07_24_161429_create_component_entries_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (1,'App\\Models\\User',1,'API Token','9fdca8daab3d3dfa572216c98786cb2cf3a77b58ac87f9abf4903fd3e3fad434','[\"*\"]',NULL,'2021-08-03 21:39:19','2021-08-03 21:39:19'),(2,'App\\Models\\User',1,'API Token','e0a395cacfecdc7a326950110739813adbada1e4ab30476196d9b3edfcf272a0','[\"*\"]',NULL,'2021-08-03 21:44:11','2021-08-03 21:44:11'),(3,'App\\Models\\User',1,'auth_token','1adc4118db16a046d207ce88a33865476427049008c00b12149aeffabcbe69b9','[\"*\"]','2021-08-03 22:07:58','2021-08-03 22:03:42','2021-08-03 22:07:58'),(4,'App\\Models\\User',1,'auth_token','72609b5604d5f6bbb15ae3bfb8a6dc0eb476c9d75292f8029c5323f0a577521d','[\"*\"]','2021-08-04 00:28:16','2021-08-04 00:24:12','2021-08-04 00:28:16');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchasing_functions`
--

DROP TABLE IF EXISTS `purchasing_functions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchasing_functions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int unsigned DEFAULT NULL,
  `column` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `financial_mgmt` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benefits_spec` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contracting` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_payment` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monitoring` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchasing_functions_country_id_foreign` (`country_id`),
  CONSTRAINT `purchasing_functions_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchasing_functions`
--

LOCK TABLES `purchasing_functions` WRITE;
/*!40000 ALTER TABLE `purchasing_functions` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchasing_functions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsors`
--

DROP TABLE IF EXISTS `sponsors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sponsors` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsors`
--

LOCK TABLES `sponsors` WRITE;
/*!40000 ALTER TABLE `sponsors` DISABLE KEYS */;
INSERT INTO `sponsors` VALUES (1,'Kemri','N/A','2021-07-31 06:02:37','2021-07-31 23:28:44','2021-07-31 23:28:44'),(2,'University of Rwanda','sponsors/sponsor-1627772481.png','2021-07-31 23:01:21','2021-07-31 23:01:21',NULL),(3,'Kemri','sponsors/sponsor-1627774267.png','2021-07-31 23:31:07','2021-07-31 23:31:07',NULL),(4,'Makerere University','sponsors/sponsor-1627774478.png','2021-07-31 23:34:38','2021-07-31 23:34:38',NULL),(5,'Hekima Ni Uhuru','sponsors/sponsor-1627774538.png','2021-07-31 23:35:38','2021-07-31 23:35:38',NULL),(6,'R4D International','sponsors/sponsor-1627774568.png','2021-07-31 23:36:08','2021-07-31 23:36:08',NULL),(7,'Cerrhud','sponsors/sponsor-1627774590.png','2021-07-31 23:36:30','2021-07-31 23:36:30',NULL),(8,'Sparc','sponsors/sponsor-1627774624.png','2021-07-31 23:37:04','2021-07-31 23:37:04',NULL),(9,'NHIS','sponsors/sponsor-1627774674.png','2021-07-31 23:37:54','2021-07-31 23:37:54',NULL),(10,'Nyansapo','sponsors/sponsor-1627774784.png','2021-07-31 23:39:44','2021-07-31 23:39:44',NULL),(11,'HPRG Nigeria','sponsors/sponsor-1627774831.png','2021-07-31 23:40:31','2021-07-31 23:40:31',NULL),(12,'Resade','sponsors/sponsor-1627774851.png','2021-07-31 23:40:51','2021-07-31 23:40:51',NULL);
/*!40000 ALTER TABLE `sponsors` ENABLE KEYS */;
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrator','admin@sparc.africa',NULL,'$2y$10$TE9.UNgvJ8Ufk.rPBPnB0.ix/VZzYTCG/x3utDO0Z8xmC.vLEciTC',NULL,'2021-07-30 00:33:40','2021-07-30 00:33:40');
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

-- Dump completed on 2021-08-15 21:57:21
