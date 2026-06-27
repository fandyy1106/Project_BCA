-- Database Project UAS Pemrograman Web
-- Backend Company Profile BCA Berbasis Laravel

CREATE DATABASE IF NOT EXISTS `db_bca_website` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `db_bca_website`;

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `galleries`;
DROP TABLE IF EXISTS `company_profiles`;
DROP TABLE IF EXISTS `articles`;
DROP TABLE IF EXISTS `products`;
DROP TABLE IF EXISTS `failed_jobs`;
DROP TABLE IF EXISTS `job_batches`;
DROP TABLE IF EXISTS `jobs`;
DROP TABLE IF EXISTS `cache_locks`;
DROP TABLE IF EXISTS `cache`;
DROP TABLE IF EXISTS `sessions`;
DROP TABLE IF EXISTS `password_reset_tokens`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `migrations`;
SET FOREIGN_KEY_CHECKS=1;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `deskripsi_singkat` text NOT NULL,
  `deskripsi_lengkap` text NOT NULL,
  `fitur` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `articles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'published',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `articles_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `company_profiles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `deskripsi` longtext NOT NULL,
  `visi` text,
  `misi` longtext,
  `alamat` text,
  `telepon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_05_03_153158_create_products_table', 1),
(5, '2026_06_23_000001_create_articles_table', 1),
(6, '2026_06_23_000002_create_company_profiles_table', 1),
(7, '2026_06_23_000003_create_galleries_table', 1);

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@project.test', NULL, '$2y$12$ZtaLYzkg/4PfHUEBGkvYbekCwFaQ4DXcpDFx4F.0oVT0nP8ddHA2.', NULL, NOW(), NOW());

INSERT INTO `products` (`id`, `nama`, `gambar`, `deskripsi_singkat`, `deskripsi_lengkap`, `fitur`, `created_at`, `updated_at`) VALUES
(1, 'Tahapan BCA', 'img/tahapan.jpg', 'Tabungan praktis untuk kenyamanan hidup Anda.', 'Tahapan BCA hadir untuk memberikan kemudahan bertransaksi di manapun dan kapanpun. Dilengkapi dengan berbagai fitur digital yang memudahkan hidup Anda.', JSON_ARRAY('ATM 24 Jam', 'Mobile Banking', 'Debit Contactless'), NOW(), NOW()),
(2, 'Kartu Kredit Black', 'img/kartukredit.png', 'Eksklusivitas dalam setiap transaksi Anda.', 'Nikmati berbagai keistimewaan seperti akses airport lounge, poin reward berlipat, dan layanan prioritas di seluruh dunia.', JSON_ARRAY('Priority Service', 'Travel Insurance', 'Point Reward'), NOW(), NOW()),
(3, 'KPR BCA', 'img/kpr.jpg', 'Wujudkan rumah impian Anda sekarang juga.', 'KPR BCA memberikan solusi pembiayaan hunian yang mudah, aman, dengan pilihan suku bunga yang kompetitif dan jangka waktu yang fleksibel.', JSON_ARRAY('Bunga Kompetitif', 'Proses Cepat & Mudah', 'Jangka Waktu Hingga 20 Tahun'), NOW(), NOW());

INSERT INTO `articles` (`id`, `title`, `slug`, `excerpt`, `content`, `image`, `status`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Kemudahan Transaksi Digital untuk Nasabah', 'kemudahan-transaksi-digital-untuk-nasabah-a1b2c', 'Layanan digital membantu nasabah melakukan transaksi dengan lebih cepat, aman, dan praktis.', 'BCA terus menghadirkan layanan digital untuk mendukung kebutuhan transaksi harian nasabah. Melalui inovasi digital, nasabah dapat melakukan pembayaran, transfer, dan pengelolaan keuangan secara lebih praktis.', NULL, 'published', NOW(), NOW(), NOW()),
(2, 'Tips Aman Menggunakan Layanan Perbankan Online', 'tips-aman-menggunakan-layanan-perbankan-online-d3e4f', 'Keamanan data menjadi hal penting ketika menggunakan layanan perbankan berbasis internet.', 'Nasabah perlu menjaga kerahasiaan password, mengganti PIN secara berkala, serta memastikan akses layanan dilakukan melalui kanal resmi. Langkah sederhana ini membantu mengurangi risiko penyalahgunaan akun.', NULL, 'published', NOW(), NOW(), NOW());

INSERT INTO `company_profiles` (`id`, `nama_perusahaan`, `tagline`, `deskripsi`, `visi`, `misi`, `alamat`, `telepon`, `email`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'PT Bank Central Asia Tbk', 'Senantiasa di Sisi Anda', 'PT Bank Central Asia Tbk (BCA) merupakan salah satu bank swasta nasional yang menyediakan layanan perbankan, solusi transaksi digital, pembiayaan, dan layanan finansial untuk mendukung kebutuhan nasabah individu maupun bisnis.', 'Menjadi bank pilihan utama andalan masyarakat, yang berperan sebagai pilar penting perekonomian Indonesia.', 'Membangun institusi yang unggul di bidang penyelesaian pembayaran dan solusi keuangan.\nMemahami beragam kebutuhan nasabah dan memberikan layanan finansial yang tepat.\nMeningkatkan nilai perusahaan dan nilai stakeholder BCA.', 'Menara BCA, Grand Indonesia, Jl. MH Thamrin No. 1, Jakarta', '1500888', 'halobca@bca.co.id', 'img/logobca.png', NOW(), NOW());

INSERT INTO `galleries` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Layanan Tabungan', 'Ilustrasi layanan tabungan BCA.', 'img/tahapan.jpg', NOW(), NOW()),
(2, 'Kartu Kredit', 'Produk kartu kredit untuk kebutuhan transaksi.', 'img/kartukredit.png', NOW(), NOW()),
(3, 'Kredit Pemilikan Rumah', 'Solusi pembiayaan rumah.', 'img/kpr.jpg', NOW(), NOW());
