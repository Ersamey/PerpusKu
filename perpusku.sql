-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 06:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpusku`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`, `role`) VALUES
(1, 'ersamey', 'meymey5', 1),
(2, 'sitinuraeni', 'eninuninu', 1),
(3, 'yasminh', 'hafidah', 2),
(4, 'ekanurul', 'ekanurulll', 3);

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Site Administrator'),
(2, 'user', 'Regular User'),
(3, 'perpustakaan', 'Site Perpustakaan');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 6),
(2, 2),
(2, 3),
(2, 4),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'Ersa Meilia', 1, '2024-05-19 01:53:04', 0),
(2, '::1', 'Ersa Meilia', 1, '2024-05-19 01:55:52', 0),
(3, '::1', 'ersameilia050504@gmail.com', 1, '2024-05-19 01:56:56', 0),
(4, '::1', 'Ersa Meilia', NULL, '2024-05-19 01:57:55', 0),
(5, '::1', 'Ersa Meilia', 1, '2024-05-19 01:58:09', 0),
(6, '::1', 'Ersa Meilia', 1, '2024-05-19 02:03:06', 0),
(7, '::1', 'a@gmail.com', 2, '2024-05-19 02:10:48', 1),
(8, '::1', 'meymey', NULL, '2024-05-19 04:14:56', 0),
(9, '::1', 'aan', NULL, '2024-05-19 04:15:12', 0),
(10, '::1', 'aan', NULL, '2024-05-19 04:15:25', 0),
(11, '::1', 'a@gmail.com', NULL, '2024-05-19 04:15:40', 0),
(12, '::1', 'meymey', NULL, '2024-05-19 04:16:04', 0),
(13, '::1', 'meymey', NULL, '2024-05-19 04:16:30', 0),
(14, '::1', 'aan', NULL, '2024-05-19 04:16:55', 0),
(15, '::1', 'a@gmail.com', NULL, '2024-05-19 04:17:29', 0),
(16, '::1', 'meymey', NULL, '2024-05-19 04:19:14', 0),
(17, '::1', 'aan', NULL, '2024-05-19 04:19:29', 0),
(18, '::1', 'Ersa Meilia', NULL, '2024-05-19 04:20:21', 0),
(19, '::1', 'ersameilia050504@gmail.com', 4, '2024-05-19 04:20:30', 1),
(20, '::1', 'aan', NULL, '2024-05-19 04:47:06', 0),
(21, '::1', 'ersameilia050504@gmail.com', 4, '2024-05-19 04:47:16', 1),
(22, '::1', 'ersameilia050504@gmail.com', 4, '2024-05-19 04:54:31', 1),
(23, '::1', 'ersameil54', NULL, '2024-05-19 04:55:47', 0),
(24, '::1', 'ersameilia050504@gmail.com', 4, '2024-05-19 04:55:57', 1),
(25, '::1', 'ersameilia050504@gmail.com', 4, '2024-05-21 02:48:17', 1),
(26, '::1', 'Ersa Meilia', NULL, '2024-05-23 10:35:13', 0),
(27, '::1', 'ersameilia050504@gmail.com', 4, '2024-05-23 10:35:20', 1),
(28, '::1', 'ersameilia050504@gmail.com', 4, '2024-05-23 12:15:47', 1),
(29, '::1', 'ersameilia050504@gmail.com', 4, '2024-05-23 13:45:40', 1),
(30, '::1', 'ersameilia050504@gmail.com', 4, '2024-05-24 01:56:48', 1),
(31, '::1', 'Ersa Meilia', NULL, '2024-05-24 02:37:12', 0),
(32, '::1', 'ersameilia050504@gmail.com', 4, '2024-05-24 02:37:20', 1),
(33, '::1', 'ersameilia050504@gmail.com', 4, '2024-05-24 04:59:27', 1),
(34, '::1', 'ersameilia050504@gmail.com', 4, '2024-05-24 07:02:24', 1),
(35, '::1', 'ersa@gmail.com', 4, '2024-05-24 11:33:57', 1),
(36, '::1', 'ersa@gmail.com', 4, '2024-05-24 11:36:07', 1),
(37, '::1', 'Admin@min.com', 6, '2024-05-24 12:08:57', 1),
(38, '::1', 'Admin@min.com', 6, '2024-05-24 23:47:36', 1),
(39, '::1', 'ersa@gmail.com', 4, '2024-05-25 00:02:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-users', 'Manage All Users'),
(2, 'manage-profile', 'Manage user\'s profile');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `pengarang` varchar(100) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `pict` varchar(100) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `pengarang`, `tahun`, `pict`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Hujan', 'Tere Liye', '2016', 'hujan.png', 'hujan', NULL, NULL),
(2, 'Atomic Habits', 'James Clear', '2018', 'Atomic_Habit.jpg', 'atomic-habit', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ketersediaan`
--

CREATE TABLE `ketersediaan` (
  `perpus_id` int(11) DEFAULT NULL,
  `buku_id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ketersediaan`
--

INSERT INTO `ketersediaan` (`perpus_id`, `buku_id`, `status`) VALUES
(1, 1, 'Tersedia'),
(2, 1, 'Tersedia'),
(1, 2, 'TdkTersedia'),
(2, 2, 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1716052455, 1);

-- --------------------------------------------------------

--
-- Table structure for table `perpustakaan`
--

CREATE TABLE `perpustakaan` (
  `id_perpus` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perpustakaan`
--

INSERT INTO `perpustakaan` (`id_perpus`, `nama`, `alamat`, `username`, `password`) VALUES
(1, 'Dinas Arsip dan Perpustakaan Kota Bandung', 'Jl. Seram No.2, Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat', 'disarpus_bdg', '12345'),
(2, 'Dinas Perpustakaan dan Arsip Daerah Jawa Barat', 'Jl. Kawaluyaan Indah II No.4, Jatisari, Kec. Buahbatu, Kota Bandung, Jawa Barat', 'DispusipdaJabar', '98765');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `review` text DEFAULT NULL,
  `buku_id` int(11) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `review`, `buku_id`, `user_id`) VALUES
(6, 'Buku ini luar biasa, memberikan banyak sekali contoh dan perumpamaan yang mudah dipahami sambil menjelaskan mengenai tahapan memperbaiki kebiasaan hidup.', 2, 2),
(7, 'Luar Biasa! - \"Hujan\" benar-benar membawa saya ke dalam dunia yang penuh emosi dan petualangan. Tere Liye menulis dengan begitu indah dan mendalam.', 1, 5),
(8, 'Bahasa yang Indah - Tere Liye menggunakan bahasa yang puitis dan mengalir dengan lancar. Membaca \"Hujan\" terasa seperti menikmati sebuah puisi panjang.', 1, 3),
(25, 'Kisah cinta dan persahabatan yang dikemas dalam bahasa yang sangat indah dan menyentuh hati oleh Tere Liye. Sehingga tidak membosankan saat dibaca. Buku ini juga memiliki alur cerita putar balik yang kemudian mengejutkan di setiap babnya.', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT '''default.svg''',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'a@gmail.com', 'aan', '\'default.svg\'', '$2y$10$Zgml9A9BND.VxfuxOOfvVeaBjqx6B9vcBL9VeUoXb2BEGVCFLPGs2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-05-19 02:10:36', '2024-05-19 02:10:36', NULL),
(3, 'luicy@gmail.com', 'luicy', '\'default.svg\'', '$2y$10$zRzSDhqNB8BRzmjlhLzIKu0GT35KNiQFdb1WElXwq4nrNWMbmUeKi', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-05-19 04:14:23', '2024-05-19 04:14:23', NULL),
(4, 'ersa@gmail.com', 'Ersa Meilia', '\'default.svg\'', '$2y$10$9ko5A.Gvdr4du9iCvx5HTuecoumB97fAMMP0xVuw52GUcdc8xUnJq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-05-19 04:20:03', '2024-05-19 04:20:03', NULL),
(5, 'ab@gmail.com', 'sarah', '\'default.svg\'', '$2y$10$q/HwrYzNKd2VrE79ZKTu1O5tkF4Vc0HeA8wP6HJrXL0z4nZPrxw4u', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-05-19 04:55:23', '2024-05-19 04:55:23', NULL),
(6, 'Admin@min.com', 'adminKu', '\'default.svg\'', '$2y$10$IwIyLKkDRyBDM6fPRBY1QOciSM5xpeMFqoCZM7s5ast4C/w23ehqG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-05-24 12:08:48', '2024-05-24 12:08:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `ketersediaan`
--
ALTER TABLE `ketersediaan`
  ADD KEY `perpus_id` (`perpus_id`),
  ADD KEY `buku_id` (`buku_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perpustakaan`
--
ALTER TABLE `perpustakaan`
  ADD PRIMARY KEY (`id_perpus`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `buku_id` (`buku_id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perpustakaan`
--
ALTER TABLE `perpustakaan`
  MODIFY `id_perpus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ketersediaan`
--
ALTER TABLE `ketersediaan`
  ADD CONSTRAINT `ketersediaan_ibfk_1` FOREIGN KEY (`perpus_id`) REFERENCES `perpustakaan` (`id_perpus`),
  ADD CONSTRAINT `ketersediaan_ibfk_2` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id_buku`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `review_iufk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
