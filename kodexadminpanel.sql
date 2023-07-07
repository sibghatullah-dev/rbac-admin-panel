-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2020 at 02:49 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kodexadminpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `parent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `action_name`, `action_description`, `controller_name`, `is_delete`, `is_active`, `parent`, `level`, `menu`, `order_by`, `icon_name`, `url`, `created_at`, `updated_at`) VALUES
(1, 'User Managment', '', '', NULL, NULL, '0', '0', 'User Managment', '1', 'fa fa-icon', '', NULL, NULL),
(5, 'manage_users', 'Manage Users', 'UserController', NULL, NULL, '1', '1', 'Manage Users', '1', 'fa fa-icon', '/allusers', NULL, NULL),
(6, 'manage_orgnization', 'manage_organization', 'OrganizationController', NULL, NULL, '1', '1', 'Manage Organization', '5', 'fa fa-icon', '/allorg', NULL, NULL),
(9, 'manage_roles', 'Manage Roles', 'RoleController', NULL, NULL, '1', '1', 'Manage Roles', '2', 'fa fa-user', '/allrole', NULL, NULL),
(10, 'role_action_mapping', 'Action and Role Mapping', 'ActionRoleController', NULL, NULL, '1', '1', 'Action Role Mapping', '3', 'fa fa-user', '/ARMapping', NULL, NULL),
(11, 'permission_action_mapping', 'Action and Permission Mapping', 'ActionPermissionController', NULL, NULL, '1', '1', 'Action Permission \r\nMapping', '4', 'fa fa-user', '/APMapping', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `action_permission_mappings`
--

CREATE TABLE `action_permission_mappings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `action_permission_mappings`
--

INSERT INTO `action_permission_mappings` (`id`, `action_id`, `permission_id`, `is_delete`, `created_at`, `updated_at`) VALUES
(2, 10, 2, NULL, '2020-11-08 22:19:16', '2020-11-08 22:19:17'),
(3, 11, 2, NULL, '2020-11-08 22:19:37', '2020-11-08 22:19:37'),
(19, 9, 1, NULL, '2020-11-10 03:56:02', '2020-11-10 03:56:02'),
(20, 9, 2, NULL, '2020-11-10 03:56:02', '2020-11-10 03:56:02'),
(21, 5, 1, NULL, '2020-11-10 04:02:42', '2020-11-10 04:02:42'),
(22, 5, 3, NULL, '2020-11-10 04:02:42', '2020-11-10 04:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `action_role_mappings`
--

CREATE TABLE `action_role_mappings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `action_role_mappings`
--

INSERT INTO `action_role_mappings` (`id`, `action_id`, `role_id`, `is_delete`, `created_at`, `updated_at`) VALUES
(15, 1, 1, NULL, '2020-11-10 02:00:37', '2020-11-10 02:00:37'),
(16, 5, 1, NULL, '2020-11-10 02:00:37', '2020-11-10 02:00:37'),
(17, 6, 1, NULL, '2020-11-10 02:00:37', '2020-11-10 02:00:37'),
(18, 9, 1, NULL, '2020-11-10 02:00:37', '2020-11-10 02:00:37'),
(19, 10, 1, NULL, '2020-11-10 02:00:38', '2020-11-10 02:00:38'),
(20, 11, 1, NULL, '2020-11-10 02:00:38', '2020-11-10 02:00:38'),
(21, 1, 2, NULL, '2020-11-10 02:41:27', '2020-11-10 02:41:27'),
(22, 5, 2, NULL, '2020-11-10 02:41:27', '2020-11-10 02:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_23_071153_create_role_table', 1),
(5, '2020_10_23_071215_create_action_table', 1),
(6, '2020_10_23_071234_create_permission_table', 1),
(7, '2020_10_27_094453_create_action_role_mapping', 1),
(8, '2020_10_27_094533_create_action_permission_mapping', 1),
(9, '2020_10_27_094628_create_organization_table', 1),
(10, '2020_10_27_095633_create_foreign', 1),
(11, '2020_11_05_081326_create_organization_column_in_roles', 1);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organization_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Organization_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `organization_name`, `Organization_description`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Kodex', 'Tech Company', NULL, NULL, '2020-11-05 05:50:07', '2020-11-05 05:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_code` int(11) NOT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission_name`, `permission_code`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Add', 1000, NULL, NULL, NULL),
(2, 'Delete', 2000, NULL, NULL, NULL),
(3, 'Update', 3000, NULL, NULL, NULL),
(4, 'View', 4000, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_descriptions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles_organization_id_foreign` bigint(20) UNSIGNED NOT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `role_descriptions`, `roles_organization_id_foreign`, `is_delete`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Control All Functions', 1, NULL, NULL, '2020-11-05 05:50:26', '2020-11-05 05:50:26'),
(2, 'Admin', 'Sub Admin', 1, NULL, NULL, '2020-11-10 00:53:15', '2020-11-10 00:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `is_block` tinyint(1) DEFAULT NULL,
  `count_login_attempts` int(11) DEFAULT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `is_active`, `is_deleted`, `is_block`, `count_login_attempts`, `organization_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Sibghatullah', 'superadmin@gmail.com', 'asad', '1.jpg', NULL, NULL, NULL, NULL, 1, 1, '2020-11-05 05:50:55', '2020-11-05 05:50:55'),
(2, 'Asad', 'asad@gmail.com', '123456', '2.jpg', NULL, NULL, NULL, NULL, 1, 2, '2020-11-10 01:04:05', '2020-11-10 01:04:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `action_permission_mappings`
--
ALTER TABLE `action_permission_mappings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `action_permission_mappings_action_id_foreign` (`action_id`),
  ADD KEY `action_permission_mappings_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `action_role_mappings`
--
ALTER TABLE `action_role_mappings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `action_role_mappings_role_id_foreign` (`role_id`),
  ADD KEY `action_role_mappings_action_id_foreign` (`action_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_roles_organization_id_foreign_foreign` (`roles_organization_id_foreign`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_organization_id_foreign` (`organization_id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `action_permission_mappings`
--
ALTER TABLE `action_permission_mappings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `action_role_mappings`
--
ALTER TABLE `action_role_mappings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `action_permission_mappings`
--
ALTER TABLE `action_permission_mappings`
  ADD CONSTRAINT `action_permission_mappings_action_id_foreign` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `action_permission_mappings_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `action_role_mappings`
--
ALTER TABLE `action_role_mappings`
  ADD CONSTRAINT `action_role_mappings_action_id_foreign` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `action_role_mappings_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_roles_organization_id_foreign_foreign` FOREIGN KEY (`roles_organization_id_foreign`) REFERENCES `organizations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
