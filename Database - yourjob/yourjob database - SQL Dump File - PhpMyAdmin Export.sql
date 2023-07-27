-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 27, 2023 at 10:32 PM
-- Server version: 8.0.28
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yourjob`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `user_id`, `title`, `logo`, `tags`, `company`, `location`, `email`, `website`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tenetur odit impedit consectetur consectetur rerum autem.', 'logos/8qGpmiTwTH5sv6uCtccNmVoJeEMvVdXpH9y2ne6D.png', 'laravel, api, backend', 'Elsewedy Electric', 'Beni Suef', 'hany@elsewedy.com', 'http://www.waters.com/recusandae-vero-quaerat-sit-cupiditate-numquam-magnam-veniam-dolorum', 'Reprehenderit sit tempore natus et corrupti. Officiis enim saepe et modi. Dolor harum rerum molestiae aperiam velit autem veritatis commodi. Similique adipisci expedita et quis aut unde inventore. Et rerum voluptatem perferendis officia ut delectus.', '2022-10-27 17:59:46', '2023-07-24 20:59:59'),
(2, 1, 'Possimus quae porro ut a quis deleniti.', NULL, 'laravel, api, backend', 'Halliburton', 'Cairo', 'azemlak@dooley.com', 'http://www.moore.org/inventore-numquam-eius-animi-voluptatum-necessitatibus-repellat-qui-culpa', 'Libero fugiat ut hic nihil dolorem nostrum incidunt. Facere nam quisquam aut qui et rem. Amet dolorem adipisci sit facilis quis cumque. Fuga quia repellat voluptatem vero quas velit. Itaque eos optio quo corporis rerum. Eos eaque quidem ipsa temporibus magni.', '2022-10-27 17:59:46', '2022-10-27 17:59:46'),
(3, 1, 'Quos ut provident animi rerum aspernatur.', 'logos/4YTwAw695f41kOLOjRKNVZlYAXAKfwjwqlMyG8DP.jpg', 'laravel, api, backend', 'El Hamra Oil', 'Alexandria', 'justice.donnelly@kautzer.com', 'http://www.cummings.com/non-id-et-quos-blanditiis', 'Officia enim sed perspiciatis asperiores eligendi. Asperiores voluptatem qui eligendi. Quis et ratione non optio nostrum. Eos veniam hic aliquid hic id.', '2022-10-27 17:59:46', '2023-07-24 21:02:37'),
(4, 1, 'Nesciunt culpa voluptatem aspernatur et sint.', 'logos/dJc5PaONBF1MzMJHBejRwRjHMJ0atiepWGlA9uXP.png', 'laravel, api, backend', 'Orascom Construction', 'Luxor', 'stephan42@gutkowski.info', 'http://www.ziemann.com/ut-dolores-possimus-et-minus-culpa-dolorem-nam', 'Et amet nobis ipsum ad hic. Culpa tenetur cupiditate nulla voluptate quis sed. Sapiente dolor voluptas nesciunt ducimus quia culpa et. Omnis adipisci minima soluta qui. In architecto error facere ut placeat non quo. Sit ut mollitia aperiam totam aut dolor qui. Harum consequatur eum et ad assumenda.', '2022-10-27 17:59:46', '2023-07-24 21:03:36'),
(5, 1, 'Corporis sunt impedit fuga exercitationem ut consectetur.', NULL, 'laravel, api, backend', 'Orange', 'Port Said', 'brando.paucek@adams.com', 'https://www.littel.com/culpa-tempora-veniam-enim-eligendi', 'Aperiam voluptatem et delectus ipsum optio officiis aut. Deserunt minus dolor consectetur provident. Voluptas ab officia eveniet neque culpa. Quia repellat cum excepturi labore modi dolorem. Saepe voluptas omnis ipsa natus odio officiis eveniet.', '2022-10-27 17:59:46', '2022-10-27 17:59:46'),
(6, 1, 'Est dolorem officiis eum nulla nam.', 'logos/QYUtrbvIDRvNR3QZ1q3IBhM9ERJzY1MiQcjVMM3V.png', 'laravel, api, backend', 'ITWorx', 'Menofia', 'osborne56@abbott.com', 'http://www.cronin.info/fugiat-voluptates-ea-possimus-rerum-omnis-sapiente-inventore-sed.html', 'Natus cum libero reprehenderit in quae. Maxime ut blanditiis quia. Ipsa voluptatem expedita nemo qui ut. Quas atque reiciendis quam incidunt tenetur. Vel sed fugiat ab vero accusamus.', '2022-10-27 17:59:46', '2023-07-24 21:04:51'),
(7, 2, 'Senior Laravel Developer', 'logos/AcmprhEmkFwfbDGY6noXsJuAe7bPArXSlTES3Z2l.png', 'laravel,api,vue', 'Xceed', 'Guiza', 'test@test.com', 'https://acme.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse in felis malesuada, aliquet nisl at, rhoncus lacus. Nulla molestie lectus ut urna lobortis posuere. Vestibulum tellus lacus, auctor eget justo dapibus, dignissim consectetur erat. Nullam aliquam sagittis diam, in feugiat ligula consequat non. Morbi feugiat scelerisque magna quis lobortis. Donec eleifend id nunc dignissim gravida. Nullam augue tellus, ultrices nec dapibus id, sodales eu erat. Nam maximus, risus nec convallis tristique, orci diam gravida ex, eu dictum tortor ipsum non felis. Sed scelerisque sed diam non rhoncus. Aenean suscipit metus vitae neque aliquet, eget tincidunt est lobortis. Phasellus placerat facilisis neque convallis molestie. Sed a velit tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eu risus justo.', '2022-10-27 21:17:41', '2023-07-24 21:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(46, '2014_10_12_000000_create_users_table', 1),
(47, '2014_10_12_100000_create_password_resets_table', 1),
(48, '2019_08_19_000000_create_failed_jobs_table', 1),
(49, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(50, '2022_10_18_014732_create_listings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed Yahya', 'test@test.com', '2022-10-27 17:59:45', '$2y$10$FIKmadZ8AyHYPJJE4gHSY.ob7Gr5aFrU7XksML3GMik0WpvjGYc.y', 'R2Jka0dTTDP8WPbsE7AHGN21LoczBMIIpnvItvm1EBFBgMgU1Wgn93ku9O46', '2022-10-27 17:59:45', '2022-10-27 17:59:45'),
(2, 'Yasser Amin', 'yasser@gmail.com', NULL, '$2y$10$FIKmadZ8AyHYPJJE4gHSY.ob7Gr5aFrU7XksML3GMik0WpvjGYc.y', NULL, '2022-10-27 21:08:09', '2022-10-27 21:08:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listings_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listings`
--
ALTER TABLE `listings`
  ADD CONSTRAINT `listings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
