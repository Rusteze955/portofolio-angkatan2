-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Bulan Mei 2025 pada 10.41
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_porto_2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `abouts`
--

CREATE TABLE `abouts` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `position_name` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `website` varchar(50) NOT NULL,
  `phone` int(30) NOT NULL,
  `city` varchar(50) NOT NULL,
  `age` int(30) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `freelance` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `abouts`
--

INSERT INTO `abouts` (`id`, `name`, `position_name`, `photo`, `birthday`, `website`, `phone`, `city`, `age`, `degree`, `email`, `freelance`, `description`, `status`, `created_at`, `update_at`) VALUES
(8, 'Mulyono', 'Frontend Develops', '683546a0237f1___00__00__00__00__00_____qwerty.jpg', '2025-05-26', 'https//:mulyono.com', 2147483647, 'Bekasi', 22, 'Bachelor', 'admin@gmail.com', 'Availabel', ' (CSS), dan JavaScript. </p><p style=\"text-align: justify; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(56, 49, 49); font-family: \"Open Sans\", Arial, Helvetica, sans-serif; font-size: 15px;\">Walaupun front end berkaitan dengan hal-hal visual namun ia berbeda dengan desain web, front end memperhatikan kegunaannya dimana rekayasa yang mengubah desain menjadi situs web interaktif yang lebih hidup. front end developer yaitu mereka yang bertanggung jawab dalam menghubungkan suatu situs website ataupun aplikasi dengan para penggunanya.</p>>>>>>', 1, '2025-05-26 04:44:05', '2025-05-27 04:59:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `your_name` varchar(50) NOT NULL,
  `your_email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `contacts`
--

INSERT INTO `contacts` (`id`, `your_name`, `your_email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(9, 'rey', 'rey@gmail.com', 'Experience', 'zafsdgsgdsg', '2025-05-27 05:01:05', NULL),
(10, 'abdul', 'abdul@gmail.com', 'Experience', '12345678', '2025-05-27 05:49:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `nama_level` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `levels`
--

INSERT INTO `levels` (`id`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `photo_app`
--

CREATE TABLE `photo_app` (
  `id` int(11) NOT NULL,
  `id_app` int(11) NOT NULL,
  `photo_4` varchar(100) NOT NULL,
  `photo_5` varchar(100) NOT NULL,
  `photo_6` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `portofolios`
--

CREATE TABLE `portofolios` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name_porto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `profile_name` varchar(45) DEFAULT NULL,
  `profesion` varchar(55) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_level`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2025-05-21 01:37:15', '2025-05-23 01:57:12'),
(5, 2, 'abdullah', 'abdullah@uhamka.ac.id', '7c222fb2927d828af22f592134e8932480637c0d', '2025-05-21 08:07:07', '2025-05-22 08:00:28'),
(13, 2, 'user2', 'user@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2025-05-27 03:20:39', '2025-05-27 03:58:14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `photo_app`
--
ALTER TABLE `photo_app`
  ADD PRIMARY KEY (`id`),
  ADD KEY `porto_id_to_id_app` (`id_app`);

--
-- Indeks untuk tabel `portofolios`
--
ALTER TABLE `portofolios`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id_to_id_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `photo_app`
--
ALTER TABLE `photo_app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `portofolios`
--
ALTER TABLE `portofolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `photo_app`
--
ALTER TABLE `photo_app`
  ADD CONSTRAINT `porto_id_to_id_app` FOREIGN KEY (`id_app`) REFERENCES `categories` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `level_id_to_id_level` FOREIGN KEY (`id_level`) REFERENCES `levels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
