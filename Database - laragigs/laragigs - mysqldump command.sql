-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: laragigs
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `listings`
--

DROP TABLE IF EXISTS `listings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `listings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `listings_user_id_foreign` (`user_id`),
  CONSTRAINT `listings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listings`
--

LOCK TABLES `listings` WRITE;
/*!40000 ALTER TABLE `listings` DISABLE KEYS */;
INSERT INTO `listings` VALUES (1,1,'Tenetur odit impedit consectetur consectetur rerum autem.',NULL,'laravel, api, backend','Jaskolski Inc','South Ashleechester','xstracke@pfeffer.com','http://www.waters.com/recusandae-vero-quaerat-sit-cupiditate-numquam-magnam-veniam-dolorum','Reprehenderit sit tempore natus et corrupti. Officiis enim saepe et modi. Dolor harum rerum molestiae aperiam velit autem veritatis commodi. Similique adipisci expedita et quis aut unde inventore. Et rerum voluptatem perferendis officia ut delectus.','2022-10-27 17:59:46','2022-10-27 17:59:46'),(2,1,'Possimus quae porro ut a quis deleniti.',NULL,'laravel, api, backend','Conn, Friesen and Von','New Alanis','azemlak@dooley.com','http://www.moore.org/inventore-numquam-eius-animi-voluptatum-necessitatibus-repellat-qui-culpa','Libero fugiat ut hic nihil dolorem nostrum incidunt. Facere nam quisquam aut qui et rem. Amet dolorem adipisci sit facilis quis cumque. Fuga quia repellat voluptatem vero quas velit. Itaque eos optio quo corporis rerum. Eos eaque quidem ipsa temporibus magni.','2022-10-27 17:59:46','2022-10-27 17:59:46'),(3,1,'Quos ut provident animi rerum aspernatur.',NULL,'laravel, api, backend','Hauck, Glover and Mann','Lockmantown','justice.donnelly@kautzer.com','http://www.cummings.com/non-id-et-quos-blanditiis','Officia enim sed perspiciatis asperiores eligendi. Asperiores voluptatem qui eligendi. Quis et ratione non optio nostrum. Eos veniam hic aliquid hic id.','2022-10-27 17:59:46','2022-10-27 17:59:46'),(4,1,'Nesciunt culpa voluptatem aspernatur et sint.',NULL,'laravel, api, backend','Prosacco LLC','Champlinview','stephan42@gutkowski.info','http://www.ziemann.com/ut-dolores-possimus-et-minus-culpa-dolorem-nam','Et amet nobis ipsum ad hic. Culpa tenetur cupiditate nulla voluptate quis sed. Sapiente dolor voluptas nesciunt ducimus quia culpa et. Omnis adipisci minima soluta qui. In architecto error facere ut placeat non quo. Sit ut mollitia aperiam totam aut dolor qui. Harum consequatur eum et ad assumenda.','2022-10-27 17:59:46','2022-10-27 17:59:46'),(5,1,'Corporis sunt impedit fuga exercitationem ut consectetur.',NULL,'laravel, api, backend','Little, Schulist and Effertz','Port Lunabury','brando.paucek@adams.com','https://www.littel.com/culpa-tempora-veniam-enim-eligendi','Aperiam voluptatem et delectus ipsum optio officiis aut. Deserunt minus dolor consectetur provident. Voluptas ab officia eveniet neque culpa. Quia repellat cum excepturi labore modi dolorem. Saepe voluptas omnis ipsa natus odio officiis eveniet.','2022-10-27 17:59:46','2022-10-27 17:59:46'),(6,1,'Est dolorem officiis eum nulla nam.',NULL,'laravel, api, backend','Blanda, Reynolds and Buckridge','Hackettberg','osborne56@abbott.com','http://www.cronin.info/fugiat-voluptates-ea-possimus-rerum-omnis-sapiente-inventore-sed.html','Natus cum libero reprehenderit in quae. Maxime ut blanditiis quia. Ipsa voluptatem expedita nemo qui ut. Quas atque reiciendis quam incidunt tenetur. Vel sed fugiat ab vero accusamus.','2022-10-27 17:59:46','2022-10-27 17:59:46'),(7,2,'Senior Laravel Developer','logos/K3bdWmjvZWB6m5OgTx3yKIb3HjRGYN4KDSdcPAGN.png','laravel,api,vue','Acme Corp','Boston, MA','test@test.com','https://acme.com','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in felis malesuada, aliquet nisl at, rhoncus lacus. Nulla molestie lectus ut urna lobortis posuere. Vestibulum tellus lacus, auctor eget justo dapibus, dignissim consectetur erat. Nullam aliquam sagittis diam, in feugiat ligula consequat non. Morbi feugiat scelerisque magna quis lobortis. Donec eleifend id nunc dignissim gravida. Nullam augue tellus, ultrices nec dapibus id, sodales eu erat. Nam maximus, risus nec convallis tristique, orci diam gravida ex, eu dictum tortor ipsum non felis. Sed scelerisque sed diam non rhoncus. Aenean suscipit metus vitae neque aliquet, eget tincidunt est lobortis. Phasellus placerat facilisis neque convallis molestie. Sed a velit tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eu risus justo.','2022-10-27 21:17:41','2022-10-27 21:17:41');
/*!40000 ALTER TABLE `listings` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (46,'2014_10_12_000000_create_users_table',1),(47,'2014_10_12_100000_create_password_resets_table',1),(48,'2019_08_19_000000_create_failed_jobs_table',1),(49,'2019_12_14_000001_create_personal_access_tokens_table',1),(50,'2022_10_18_014732_create_listings_table',1);
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'John Doe','john@gmail.com','2022-10-27 17:59:45','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','UeLbYfwoUT','2022-10-27 17:59:45','2022-10-27 17:59:45'),(2,'Brad Traversy','brad@gamil.com',NULL,'$2y$10$IgYLUiRnX3S5aKaIru6maOrHxYbwf6Wnw8nLnGgPehwvQQ67.MsXO',NULL,'2022-10-27 21:08:09','2022-10-27 21:08:09');
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

-- Dump completed on 2023-03-16  2:48:13
