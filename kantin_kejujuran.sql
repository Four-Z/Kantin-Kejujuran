-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2022 pada 09.00
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kantin_kejujuran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `student_id` varchar(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_path`, `student_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Aqua', 'sebotol aqua', 6000, 'Dbz7wa9qpshhckm8CZpo8a8Y65BQ', '45615', '2022-06-29 11:15:10', '2022-06-29 11:15:10', NULL),
(2, 'Beng Beng', 'sebuah Beng Beng', 2000, 'fTonivh3wrgOfb85viU1l87hGe6j', '45615', '2022-06-29 11:15:45', '2022-06-29 11:15:45', NULL),
(3, 'Chocolatos', 'sebuah chocolatos', 1000, '5i7Yb98BnbeiDJGORd9mLTGg9vAN', '45615', '2022-06-29 11:16:08', '2022-06-29 11:16:08', NULL),
(4, 'Kopiko', 'tiga buah permen kopiko', 500, 'kZ2Mi9kd0V7UfYlNLFlG9SLz8AL1', '45615', '2022-06-29 11:16:29', '2022-06-29 11:16:29', NULL),
(5, 'Momogi', 'sebuah momogi', 1000, 'alAB4nOr7SnzoTirIRlCpl0HzDVw', '45615', '2022-06-29 11:16:49', '2022-06-29 11:16:49', NULL),
(6, 'Sosis Sonice', 'sebuah sosis sonice', 2500, 'JdYlwbB1PdMfCI5hxdQ82KkiO13Q', '45615', '2022-06-29 11:17:20', '2022-06-29 11:17:20', NULL),
(7, 'Teh Gelas', 'sebuah teh gelas', 1500, 'IJRioGLS3X3l3mOXwiOf5dTfBfr6', '45615', '2022-06-29 11:17:43', '2022-06-29 11:17:43', NULL),
(8, 'Ultramilk', 'sebuah ultramilk', 7000, 'fdWqUOqik5Yn9IkjfIq8h03soOGY', '45615', '2022-06-29 11:18:06', '2022-06-29 11:18:06', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo_kantin`
--

CREATE TABLE `saldo_kantin` (
  `saldo` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `saldo_kantin`
--

INSERT INTO `saldo_kantin` (`saldo`) VALUES
(0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `student_id` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`student_id`, `name`, `password`, `created_at`, `updated_at`) VALUES
('41207', 'tes', '$2y$10$grwKL0hqZdlZ1swSYC6BueuNdrlkJU5M0ju61bueX/TabgmSi16A6', '2022-06-28 01:20:38', '2022-06-28 01:20:38'),
('45615', 'tes', '$2y$10$R2itrN3sXF43zigjI5PA3O051ER9B.1w2wKASR1p5d8w00BdPOkLm', '2022-06-28 01:18:30', '2022-06-28 01:18:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
