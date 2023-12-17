-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2023 at 06:24 PM
-- Server version: 10.4.29-MariaDB-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cities_id` int(11) DEFAULT NULL,
  `detail` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id`, `cities_id`, `detail`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'rmh abrar', 1, '2023-12-16 01:52:56', '2023-12-16 08:59:26'),
(2, NULL, 'abrar', 1, '2023-12-16 08:13:51', '2023-12-16 08:13:51'),
(3, NULL, 'tebo', 3, '2023-12-16 11:12:20', '2023-12-16 11:12:20'),
(4, NULL, 'tebo', 3, '2023-12-16 11:12:49', '2023-12-16 11:12:49'),
(5, NULL, 'tebo', 3, '2023-12-16 11:13:07', '2023-12-16 11:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Buku', '2023-12-15 09:02:41', '2023-12-15 09:02:41'),
(2, 'Bku', '2023-12-15 09:03:04', '2023-12-15 09:03:04'),
(3, 'Alat Kantor', '2023-12-16 00:05:53', '2023-12-16 00:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `harga_id` int(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`id`, `order_id`, `product_id`, `harga_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 0, 1, '2023-12-16 03:59:24', '2023-12-16 03:59:24'),
(2, 4, 2, 0, 3, '2023-12-16 04:00:21', '2023-12-16 04:00:21'),
(3, 4, 3, 0, 1, '2023-12-16 04:00:21', '2023-12-16 04:00:21'),
(4, 6, 7, 6, 3, '2023-12-16 07:39:36', '2023-12-16 07:39:36'),
(5, 7, 7, 6, 3, '2023-12-16 11:16:56', '2023-12-16 11:16:56');

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
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id` int(10) NOT NULL,
  `harga` int(13) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id`, `harga`, `created_at`, `updated_at`) VALUES
(1, 10000, '2023-12-16 06:27:18', '2023-12-16 06:27:18'),
(2, 20000, '2023-12-16 06:27:18', '2023-12-16 06:27:18'),
(3, 30000, '2023-12-16 07:01:02', '2023-12-16 07:01:02'),
(4, 40000, '2023-12-16 07:01:02', '2023-12-16 07:01:02'),
(5, 20000, '2023-12-16 07:08:42', '2023-12-16 07:08:42'),
(6, 33000, '2023-12-16 07:11:39', '2023-12-16 07:11:39'),
(7, 22000, '2023-12-16 07:13:45', '2023-12-16 07:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` int(11) NOT NULL,
  `no_resi` varchar(255) DEFAULT NULL,
  `status_order_id` bigint(20) UNSIGNED NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `biaya_cod` int(11) NOT NULL DEFAULT 0,
  `no_hp` varchar(255) DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `invoice`, `user_id`, `subtotal`, `no_resi`, `status_order_id`, `metode_pembayaran`, `ongkir`, `created_at`, `updated_at`, `biaya_cod`, `no_hp`, `bukti_pembayaran`, `pesan`) VALUES
(1, 'ALV202312160902', 1, 100, '129391391', 5, 'trf', 0, '2023-12-16 02:22:38', '2023-12-16 04:02:47', 0, '0090390931', 'buktibayar/V2MaFNa4EppMNfhJZEgqm70SmOPr9rYYJJeVvFCp.jpg', 'fsflfskfl'),
(2, 'ALV202312161058', 1, 100, NULL, 1, 'trf', 0, '2023-12-16 03:58:28', '2023-12-16 03:58:28', 0, '098782', NULL, 'akdjkf'),
(3, 'ALV202312161059', 1, 100, NULL, 1, 'trf', 0, '2023-12-16 03:59:24', '2023-12-16 03:59:24', 0, '423894298', NULL, '029029'),
(4, 'ALV202312161100', 1, 400, NULL, 1, 'trf', 0, '2023-12-16 04:00:21', '2023-12-16 04:00:21', 0, '0902042', NULL, 'ioiop['),
(5, 'ALV202312160233', 1, 99000, NULL, 1, 'trf', 0, '2023-12-16 07:33:50', '2023-12-16 07:33:50', 0, '10940194', NULL, 'qqorioq'),
(6, 'ALV202312160239', 1, 99000, NULL, 2, 'trf', 0, '2023-12-16 07:39:36', '2023-12-16 07:40:26', 0, '0090', 'buktibayar/I6qeEytmD3pnYfbvQ0GCNKzgW04d4dAk2dPuLNqv.png', 'klakl'),
(7, 'ALV202312160616', 3, 99000, NULL, 1, 'trf', 0, '2023-12-16 11:16:56', '2023-12-16 11:16:56', 0, '098782', NULL, 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `weigth` int(11) NOT NULL,
  `harga_id` int(10) NOT NULL,
  `categories_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stok` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `weigth`, `harga_id`, `categories_id`, `created_at`, `updated_at`, `stok`) VALUES
(6, 'tesss', 'daflkl', 'imageproduct/miW11DQPpw96OUfWc77xkejuFSJNnnFkyjNcHvhw.png', 100, 7, 3, '2023-12-16 07:08:42', '2023-12-16 07:13:45', 1),
(7, 'tesss', 'daflkl', 'imageproduct/0J4zqJGvhVOAz9jtbOleQFDkivjFTXlyLn7S7VNf.png', 100, 6, 3, '2023-12-16 07:11:40', '2023-12-16 07:11:40', 10);

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id`, `bank_name`, `atas_nama`, `no_rekening`, `created_at`, `updated_at`) VALUES
(1, 'BRI', 'FIKRI SUHERI', '123123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_order`
--

CREATE TABLE `status_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_order`
--

INSERT INTO `status_order` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Belum Bayar', NULL, NULL),
(2, 'Perlu Di Cek', NULL, NULL),
(3, 'Telah Di Bayar', NULL, NULL),
(4, 'Barang Di Kirim', NULL, NULL),
(5, 'Barang Telah Sampai', NULL, NULL),
(6, 'Pesanan Di Batalkan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` enum('admin','customer') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$12$2gTNTr3j7SG7ggabN//QrOEK/Q/3q1Ywrb1ca0Kx.NikDlZPLJ3BW', NULL, 'admin', '2023-12-15 22:56:12', '2023-12-15 22:56:12'),
(2, 'abrar', 'abrar@gmail.com', NULL, '$2y$12$AQFRxEfh43RNKwgWwv8NIO16AV3.3tQf6hn9aSLBkL7PwMqTeAA6C', NULL, 'admin', '2023-12-15 23:12:55', '2023-12-15 23:12:55'),
(3, 'abrar', 'abrar@user.com', NULL, '$2y$12$XI1HC0QsHXBZwIoVq7BCfei40xnHWbGSljYdkJQWcAJKhrft.Udii', NULL, 'customer', '2023-12-16 11:09:22', '2023-12-16 11:09:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
