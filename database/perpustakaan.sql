-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Mar 2024 pada 01.24
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auto_numbers`
--

CREATE TABLE `auto_numbers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `book_code` char(255) NOT NULL,
  `isbn` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `book_location` varchar(255) NOT NULL,
  `book_category` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`book_id`, `book_code`, `isbn`, `title`, `description`, `book_location`, `book_category`, `author`, `publisher`, `year`, `amount`, `image`, `created_at`, `updated_at`) VALUES
(1, 'SMK1/0248/SEBATIKBARAT', 650089245, 'Struktur Pada Laravel', 'Buku ini berisikan materi pemrograman web di dalam laravel ', 'Rak 1', 'Novel', 'Apras', 'Erlangga', '2023', 12, '', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(2, 'SMK1/0249/SEBATIKBARAT', 650089246, 'Sistem Pakar', 'Buku ini berisikan materi pemrograman web dengan sistem kepakaran ', 'Rak 1', 'Novel', 'Apras', 'Erlangga', '2023', 12, '', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(3, 'SMK1/0250/SEBATIKBARAT', 650089247, 'Belum Siap Botak', 'bayangkan aja dulu walai makan ', 'Rak 1', 'Novel', 'Apras', 'Erlangga', '2023', 11, '', '2024-03-07 17:10:42', '2024-03-07 17:15:18'),
(4, 'SMK1/0251/SEBATIKBARAT', 650089248, 'Yuk Bisa Cumlaude Agustus', 'bayangkan aja dulu walau terlihat susah ', 'Rak 1', 'Novel', 'Apras', 'Erlangga', '2023', 12, '', '2024-03-07 17:10:42', '2024-03-07 17:10:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `categorie_id` bigint(20) UNSIGNED NOT NULL,
  `categori_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`categorie_id`, `categori_name`, `created_at`, `updated_at`) VALUES
(1, 'Novel', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(2, 'Majalah', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(3, 'Kamus', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(4, 'Komik', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(5, 'Pelajaran', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(6, 'Ensiklopedia', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(7, 'Biografi', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(8, 'Naskah', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(9, 'Ligth novel', '2024-03-07 17:10:42', '2024-03-07 17:10:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `charges`
--

CREATE TABLE `charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `charge` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `charges`
--

INSERT INTO `charges` (`id`, `charge`, `created_at`, `updated_at`) VALUES
(1, '500', '2024-03-07 17:10:42', '2024-03-07 17:10:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datastudents`
--

CREATE TABLE `datastudents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `street` text NOT NULL,
  `contact` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `donationbooks`
--

CREATE TABLE `donationbooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `amount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `donaturrelations`
--

CREATE TABLE `donaturrelations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `donation_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `guests`
--

CREATE TABLE `guests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_03_055212_create_auto_numbers', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_01_30_132340_create_rak_table', 1),
(7, '2023_01_31_125747_create_kategori_table', 1),
(8, '2023_02_02_111117_create_publishers_table', 1),
(9, '2023_02_04_110233_create_books_table', 1),
(10, '2023_02_09_041835_create_profile_table', 1),
(11, '2023_02_12_084407_create_charges_table', 1),
(12, '2023_02_12_125442_create_transactions_table', 1),
(13, '2023_03_22_035222_create_suggestions_table', 1),
(14, '2023_03_23_053854_create_guests_table', 1),
(15, '2023_03_24_133412_create_donationbooks_table', 1),
(16, '2023_03_26_070236_create_datastudents_table', 1),
(17, '2023_03_26_073316_create_donaturrelations_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `major` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profiles`
--

INSERT INTO `profiles` (`id`, `major`, `street`, `phone_number`, `image`, `users_id`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Sipil', 'Jl. Bumiijos', '082241569190', '', 1, '2024-03-07 17:10:42', '2024-03-07 17:12:37'),
(2, 'Teknik Informatika', 'Jl. Bumiijos', '082241569190', '', 2, '2024-03-07 17:10:42', '2024-03-07 17:12:52'),
(3, 'Teknik Tata Boga Informatika', 'Jl. Bumiijo', '082241569190', '', 3, '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(4, 'informatika', 'jl. tentara rakyat mataramm', '082241569190', '20240308001351.jpg', 4, '2024-03-07 17:13:51', '2024-03-07 17:14:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `publishers`
--

CREATE TABLE `publishers` (
  `publisher_id` bigint(20) UNSIGNED NOT NULL,
  `name_publisher` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `publishers`
--

INSERT INTO `publishers` (`publisher_id`, `name_publisher`, `created_at`, `updated_at`) VALUES
(1, 'Penerbit Deepublish', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(2, 'Penerbit Bukunesia', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(3, 'Penerbit Gramedia Pustaka Utama', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(4, 'Penerbit Grasindo', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(5, 'Penerbit Inari', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(6, 'Penerbit Bintang Media', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(7, 'Penerbit Kata Depan', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(8, 'Penerbit Falcon Publishing', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(9, 'Penerbit Gradien Mediatama', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(10, 'Penerbit Twigora', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(11, 'Penerbit Haru', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(12, 'Penerbit Media Kita', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(13, 'Penerbit Bentang Pustaka', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(14, 'Penerbit PlotPoint', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(15, 'Penerbit Republika', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(16, 'Penerbit Erlangga', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(17, 'Penerbit Elex Media Komputindo', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(18, 'Penerbit Ikon', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(19, 'Penerbit  Pro-U Media', '2024-03-07 17:10:42', '2024-03-07 17:10:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `raks`
--

CREATE TABLE `raks` (
  `id_rak` bigint(20) UNSIGNED NOT NULL,
  `name_rak` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `raks`
--

INSERT INTO `raks` (`id_rak`, `name_rak`, `created_at`, `updated_at`) VALUES
(1, 'Rak 1', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(2, 'Rak 2', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(3, 'Rak 3', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(4, 'Rak 4', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(5, 'Rak 5', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(6, 'Rak 6', '2024-03-07 17:10:42', '2024-03-07 17:10:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suggestions`
--

CREATE TABLE `suggestions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `created` date NOT NULL,
  `deadline` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `late` varchar(255) DEFAULT NULL,
  `charge` varchar(255) DEFAULT NULL,
  `status` enum('PINJAM','KEMBALI','HILANG','LUNAS') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `users_id`, `book_id`, `created`, `deadline`, `return_date`, `late`, `charge`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, '2024-03-08', '2024-03-15', NULL, NULL, NULL, 'PINJAM', '2024-03-07 17:15:18', '2024-03-07 17:15:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nis`, `password`, `name`, `role`, `created_at`, `updated_at`) VALUES
(1, '18310135', '$2y$10$RUQ9z5f0Cn2yUPBIUgQfuePDejBBx1myHXRItNU.PIIXdGFW7KBVW', 'Nukbatun Nisa', 'USER', '2024-03-07 17:10:42', '2024-03-07 17:12:37'),
(2, '19330017', '$2y$10$.R9R065Zm09nLpYtrPoKSe0oT7NOXBiF6nhpUKeZBVJ2eHB51nkvy', 'Reza Abdy Prasetyo', 'USER', '2024-03-07 17:10:42', '2024-03-07 17:12:52'),
(3, '121', '$2y$10$z4pwP3P2so3qfI/MlaksiOSUUdZZXQrSQAfDV6jKXcOP0a22Ks2PG', 'tester', 'ADMIN', '2024-03-07 17:10:42', '2024-03-07 17:10:42'),
(4, '1111', '$2y$10$Br1nDaGkXz5ak3iPYzRW7OMxZhP7Gtuxfo8ufk40WvGQqauqEd3w6', 'anggota', 'USER', '2024-03-07 17:13:51', '2024-03-07 17:14:05');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auto_numbers`
--
ALTER TABLE `auto_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `books_book_code_unique` (`book_code`),
  ADD UNIQUE KEY `books_isbn_unique` (`isbn`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categorie_id`);

--
-- Indeks untuk tabel `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `datastudents`
--
ALTER TABLE `datastudents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `datastudents_nis_unique` (`nis`);

--
-- Indeks untuk tabel `donationbooks`
--
ALTER TABLE `donationbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `donaturrelations`
--
ALTER TABLE `donaturrelations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donaturrelations_student_id_foreign` (`student_id`),
  ADD KEY `donaturrelations_donation_id_foreign` (`donation_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_users_id_foreign` (`users_id`);

--
-- Indeks untuk tabel `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indeks untuk tabel `raks`
--
ALTER TABLE `raks`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indeks untuk tabel `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `transactions_users_id_foreign` (`users_id`),
  ADD KEY `transactions_book_id_foreign` (`book_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nis_unique` (`nis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auto_numbers`
--
ALTER TABLE `auto_numbers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `books`
--
ALTER TABLE `books`
  MODIFY `book_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `categorie_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `charges`
--
ALTER TABLE `charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `datastudents`
--
ALTER TABLE `datastudents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `donationbooks`
--
ALTER TABLE `donationbooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `donaturrelations`
--
ALTER TABLE `donaturrelations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guests`
--
ALTER TABLE `guests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `publishers`
--
ALTER TABLE `publishers`
  MODIFY `publisher_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `raks`
--
ALTER TABLE `raks`
  MODIFY `id_rak` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `donaturrelations`
--
ALTER TABLE `donaturrelations`
  ADD CONSTRAINT `donaturrelations_donation_id_foreign` FOREIGN KEY (`donation_id`) REFERENCES `donationbooks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donaturrelations_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `datastudents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
