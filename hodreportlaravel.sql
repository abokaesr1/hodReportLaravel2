-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table hodreportlaravel.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
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

-- Dumping data for table hodreportlaravel.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table hodreportlaravel.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hodreportlaravel.groups: ~6 rows (approximately)
DELETE FROM `groups`;
INSERT INTO `groups` (`id`, `name`, `position`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'RAWAN AID', 'HEAD OF DIGITAL', 1, '2023-12-12 08:37:49', '2023-12-12 08:37:49'),
	(2, 'AHMAD REHANY', 'HEAD OF COMUNCATIONS', 1, '2023-12-12 08:38:24', '2023-12-12 08:38:24'),
	(3, 'SARA AMIN', 'HEAD OF STRATGY', 1, '2023-12-12 08:41:02', '2023-12-12 08:41:02'),
	(4, 'SERINA LHAM', 'HEAD OF PRODUCTION', 1, '2023-12-12 08:43:55', '2023-12-12 08:43:55'),
	(5, 'SUPER ADMIN', 'HEAD OF IT', 1, '2023-12-12 09:05:35', '2023-12-12 09:05:35'),
	(6, 'SUPER VIEWER', 'HEAD OF OPRATION', 1, '2023-12-12 09:05:53', '2023-12-12 09:05:53');

-- Dumping structure for table hodreportlaravel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hodreportlaravel.migrations: ~0 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_12_12_104654_create_groups_table', 1),
	(6, '2023_12_12_105113_create_roles_table', 1),
	(7, '2023_12_13_121453_create_trackersheets_table', 2);

-- Dumping structure for table hodreportlaravel.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hodreportlaravel.password_reset_tokens: ~0 rows (approximately)
DELETE FROM `password_reset_tokens`;

-- Dumping structure for table hodreportlaravel.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
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

-- Dumping data for table hodreportlaravel.personal_access_tokens: ~0 rows (approximately)
DELETE FROM `personal_access_tokens`;

-- Dumping structure for table hodreportlaravel.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hodreportlaravel.roles: ~4 rows (approximately)
DELETE FROM `roles`;
INSERT INTO `roles` (`id`, `name`, `position`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'super_admin', 'SUPER ADMIN', 1, '2023-12-12 08:49:21', '2023-12-12 08:49:21'),
	(2, 'super_viewer', 'SUPER VIEWER', 1, '2023-12-12 08:49:51', '2023-12-12 08:49:51'),
	(3, 'group_admin', 'GROUP ADMIN', 1, '2023-12-12 08:50:54', '2023-12-12 08:50:54'),
	(4, 'user', 'USER', 1, '2023-12-12 08:52:00', '2023-12-12 08:52:00');

-- Dumping structure for table hodreportlaravel.trackersheets
CREATE TABLE IF NOT EXISTS `trackersheets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `group_id` bigint unsigned NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chil_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_manage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `probability` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revenue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_revenue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote_created` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_to_take` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_contact_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_contact_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_close_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hodreportlaravel.trackersheets: ~8 rows (approximately)
DELETE FROM `trackersheets`;
INSERT INTO `trackersheets` (`id`, `user_id`, `group_id`, `company_name`, `account_owner`, `parent_account`, `chil_account`, `parent_company`, `line_manage`, `contact_name`, `position`, `website`, `stage`, `probability`, `revenue`, `expected_revenue`, `type`, `quote_created`, `customer_type`, `product_name`, `comments`, `action_to_take`, `last_contact_date`, `next_contact_date`, `expected_close_date`, `email`, `phone`, `address`, `country`, `city`, `zip`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'EITHMAR', '2', '0', '1', 'EIH', 'Test', 'Mohammad Alslamat', 'HEAD OF DIGITAL', 'http://eihuae.com', 'proposal', '70%', '5000000', '3500000.00', 'Hot', '1', 'retainer', 'Website', 'nothing', 'not_interested_in_aservice', '2023-12-20', '2023-12-23', '2023-12-28', 'alomda.alslmat@gmail.com', '0567655814', '9Yards Media & Marketing', 'United Arab Emirates', 'Abu Dhabi', '68890', '2023-12-18 14:08:56', '2023-12-18 14:08:56'),
	(2, 6, 1, 'Lyons Hebert Inc', '3', '0', '1', 'EIH', 'Dolor labore ut nost', 'Cedric Hinton', 'Ullam hic natus temp', 'https://www.golerevibok.ws', 'closedlost', '0%', '24', '24.00', 'Cold', '0', 'project', 'Yoshi Kim', 'Aute aliquid dolor s', 'product_preference', '2012-04-15', '1987-04-28', '1972-04-15', 'hazumexo@mailinator.com', '+1 (121) 561-6123', 'Et perferendis quia', 'Est sint inventore', 'Cupidatat ratione ex', '32728', '2023-12-18 14:31:39', '2023-12-18 14:31:39'),
	(3, 4, 2, 'Nixon and Wooten Inc', '2', '1', '0', 'null', 'Ipsum omnis deserunt', 'Dalton Jackson', 'Elit eum veniam ex', 'https://www.gelip.us', 'contacted', '50%', '96', '48.00', 'Cold', '0', 'retainer', 'Sonia Bender', 'Rerum distinctio Co', 'close_the_deal', '2002-05-11', '1998-02-07', '1978-04-29', 'mygy@mailinator.com', '+1 (762) 876-6772', 'Voluptate obcaecati', 'Laborum blanditiis e', 'Repudiandae distinct', '32710', '2023-12-18 14:34:19', '2023-12-18 14:34:19'),
	(4, 4, 2, 'Mcbride and Haley Associates', '1', '1', '0', 'null', 'Sed sapiente officia', 'Jayme Mayo', 'Ex voluptate in volu', 'https://www.gifyziryfafejy.org', 'closedlost', '0%', '76', '76.00', 'Cold', '0', 'project', 'Aurora Buck', 'Reprehenderit tempor', 'rejection_reason', '2017-10-23', '2012-08-16', '1979-11-30', 'lamukujib@mailinator.com', '+1 (666) 544-7955', 'Ut est officia in ac', 'Unde quaerat ratione', 'Sunt doloribus exerc', '23316', '2023-12-18 14:34:35', '2023-12-18 14:34:35'),
	(5, 7, 1, 'Crane Mcdaniel LLC', '1', '1', '0', 'null', 'Ab dolor velit est', 'Alfreda Gamble', 'Quis quos officiis i', 'https://www.cepipu.com.au', 'closedlost', '0%', '50', '50.00', 'Cold', '0', 'project', 'Yolanda Dale', 'Sunt eius consequun', 'product_preference', '2020-04-21', '2020-06-22', '1986-06-11', 'nudavidumo@mailinator.com', '+1 (412) 186-8878', 'Commodi blanditiis v', 'Et dolorum in ea vel', 'Elit quisquam do ut', '50851', '2023-12-18 14:43:41', '2023-12-18 14:43:41'),
	(6, 7, 1, 'Schwartz Holt LLC', '1', '1', '0', 'null', 'Tenetur culpa qui e', 'Britanney Burns', 'Aut aut aliqua In s', 'https://www.fykitizom.info', 'contacted', '50%', '88', '44.00', 'Cold', '0', 'retainer', 'Charity Gaines', 'In aliquam deserunt', 'product_preference', '2015-11-22', '2003-05-26', '2022-08-27', 'pejonok@mailinator.com', '+1 (132) 874-3337', 'Occaecat ipsa et ab', 'Consectetur neque ad', 'Non sed molestias eu', '67467', '2023-12-18 14:44:05', '2023-12-18 14:44:05'),
	(7, 1, 1, 'EITHMAR', '1', '0', '1', 'EIH', 'Test', 'Mohammad Alslamat', 'HEAD OF DIGITAL', 'http://eihuae.com', 'contacted', '50%', '500000', '250000.00', 'Warm', '0', 'retainer', 'Website', 'vcxvzcxvczx', 'know_client_budget', '2023-12-20', '2023-12-22', '2023-12-23', 'alomda.alslmat@gmail.com', '0567655814', '9Yards Media & Marketing', 'United Arab Emirates', 'Abu Dhabi', '68890', '2023-12-19 01:53:20', '2023-12-19 01:53:20'),
	(8, 7, 1, 'Mcgowan Burns Plc', '1', '1', '0', 'null', 'Aut illum tempore', 'Audra Trevino', 'Tempora nihil totam', 'https://www.xabum.org', 'closedlost', '0%', '83', '83.00', 'Cold', '0', 'retainer', 'Kaitlin Perez', 'Minim libero aut ali', 'rejection_reason', '1970-10-18', '2001-06-09', '2004-09-24', 'lobyxaxej@mailinator.com', '+1 (287) 197-9141', 'Dolore officia ea la', 'Laboriosam ipsum a', 'Nulla esse eum aut q', '28283', '2023-12-19 02:04:00', '2023-12-19 02:04:00'),
	(9, 1, 1, 'Oneil and Francis Co', '4', '1', '0', 'null', 'Lorem similique accu', 'Maxwell Carpenter', 'Eos in tempore dolo', 'https://www.qyty.info', 'closedwon', '100%', '960000', '960000.00', 'Warm', '0', 'project', 'Shannon Sykes', 'Ut voluptas non sed', 'product_preference', '1990-09-19', '1980-01-03', '1997-08-24', 'nygih@mailinator.com', '+1 (931) 805-7118', 'Enim totam deserunt', 'Exercitationem autem', 'Dolore labore nostru', '26411', '2023-12-23 11:08:08', '2023-12-23 11:08:08'),
	(10, 1, 1, 'Carey Mcclure Trading', '2', '0', '1', 'null', 'Aut sint sint elit', 'Kuame Travis', 'Iusto non aliquid au', 'https://www.bynuwywisiniweq.cm', 'proposal', '70%', '8200000', '5740000.00', 'Hot', '1', 'retainer', 'Sawyer Roberts', 'Aut minim culpa dele', 'close_the_deal', '2009-01-21', '1998-08-09', '2023-09-05', 'mofuvuxi@mailinator.com', '+1 (228) 411-4269', 'Dolor quia nostrum o', 'Fuga Provident aut', 'Aperiam omnis aut in', '22247', '2023-12-23 11:19:06', '2023-12-23 11:19:06'),
	(11, 1, 2, 'EI]', '1', '0', '1', 'null', 'Pariatur Tempore p', 'Byron Carpenter', 'Voluptas animi ad e', 'https://www.rytasavo.net', 'closedwon', '100%', '2800000000', '2800000000.00', 'Hot', '0', 'project', 'Olympia Salazar', 'Totam odit omnis in', 'product_preference', '1989-10-01', '2014-05-24', '1970-11-05', 'zuqeh@mailinator.com', '+1 (368) 886-7845', 'Proident sit tenetu', 'Qui tempore aut vol', 'Magnam expedita pari', '83512', '2023-12-25 01:08:51', '2023-12-25 01:08:51');

-- Dumping structure for table hodreportlaravel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `form_id` bigint unsigned NOT NULL,
  `group_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table hodreportlaravel.users: ~7 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `form_id`, `group_id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 0, 2, 1, 'Mohammad Al Salamat', 'alomda.alslmat@gmail.com', NULL, '$2y$12$ylyD6/Fsg.anSS0naGwDCOpWBAKjgeeuP3z75/coF2k8vutd/3hUq', 1, NULL, '2023-12-12 09:03:28', '2023-12-24 13:26:25'),
	(2, 0, 2, 4, 'hassan Hamouda', 'user@gmail.com', NULL, '$2y$12$dww8RyD1SOZFD1G.M400n.IqvqqWGzPmKSl.PZESXLhcr.vznLUc6', 1, NULL, '2023-12-13 04:31:51', '2023-12-13 04:31:51'),
	(3, 0, 6, 2, 'Super Viewer', 'viewer@gmail.com', NULL, '$2y$12$VJrgCqjuzx2NIL5LlbWUk.fTe8tqi/o2P.71rMwyaWxHFGLbbyrdG', 1, NULL, '2023-12-13 04:32:24', '2023-12-13 04:32:24'),
	(4, 0, 3, 3, 'AHMAD REHANY', 'ahmad@gmail.com', NULL, '$2y$12$3PudWRi1Y35g7cOGW43m4eL3G/rTCoHhe.cD8HxrpmkBDUgvIChBu', 1, NULL, '2023-12-13 04:32:53', '2023-12-24 13:36:38'),
	(5, 0, 2, 4, 'Bassma', 'user2@gmail.com', NULL, '$2y$12$JnPkR109SldZzyLL26c29ufNoK0UT5kmWeslkZWtfRTl5.knchfdC', 1, NULL, '2023-12-13 05:36:03', '2023-12-13 05:36:03'),
	(6, 0, 1, 3, 'RAWAN AID', 'rawan@gmail.com', NULL, '$2y$12$D990MBqDHNGYem23xpQG5.hI12ZaSx9.IoZpeDZRhm6Bj37vm48e6', 1, NULL, '2023-12-13 05:42:40', '2023-12-13 05:42:40'),
	(7, 0, 1, 4, 'rola', 'rola@gmail.com', NULL, '$2y$12$cZP2QQP3nqawUSCZXcfXPuDtr/P5hVgNnE8fQDyc.zxGEcpUhbt6e', 1, NULL, '2023-12-13 05:43:35', '2023-12-13 05:43:35');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
