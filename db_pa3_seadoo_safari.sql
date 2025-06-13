-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 05 Jun 2025 pada 09.43
-- Versi server: 8.0.30
-- Versi PHP: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pa3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ringkasan` text COLLATE utf8mb4_unicode_ci,
  `konten` longtext COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tautan_eksternal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dipublikasikan` tinyint(1) NOT NULL DEFAULT '0',
  `tanggal_publikasi` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `slug`, `ringkasan`, `konten`, `gambar`, `tautan_eksternal`, `dipublikasikan`, `tanggal_publikasi`, `created_at`, `updated_at`) VALUES
(1, 'Fuji Datang Bermain Jetski di Safari Samosir, Seru dan Menantang!', 'fuji-datang-bermain-jetski-di-safari-samosir-seru-dan-menantang', 'Artis muda Tanah Air, Fuji, menyempatkan diri menjajal sensasi jetski di Safari Jetski Samosir. Lokasi yang eksotis dan pemandangan alam yang memukau menjadi latar belakang aktivitas serunya kali ini.', 'Samosir, sebuah pulau di tengah Danau Toba yang terkenal dengan keindahan alamnya, kini memiliki destinasi wisata unik bernama Safari Jetski Samosir . Tempat ini menjadi sorotan setelah artis cantik dan selebritas TikTok, Fuji, datang langsung untuk mencoba pengalaman seru berkendara jetski di lokasi yang Instagramable tersebut.\r\n\r\nDalam kunjungannya beberapa waktu lalu, Fuji tampil percaya diri saat melibas ombak Danau Toba dengan jetski bertenaga tinggi. Ia ditemani oleh sejumlah teman dan juga instruktur profesional dari tim Safari Jetski Samosir. Tak hanya menikmati sensasi kecepatan, Fuji juga sempat berhenti di tengah danau untuk berfoto dan menikmati keindahan panorama Pulau Samosir dari perspektif yang berbeda.\r\n\r\n\"Pertama kali nyoba jetski di sini, seru banget! Pemandangannya indah, udaranya seger, dan tantangannya bikin adrenalin naik!\" ujar Fuji sembari tersenyum usai mencoba wahana tersebut.\r\n\r\nSafari Jetski Samosir menawarkan berbagai paket perjalanan, mulai dari sesi singkat hingga adventure yang lebih panjang mengelilingi pulau. Selain jetski, wisatawan juga bisa menikmati fasilitas seperti spot foto, penyewaan perahu, serta kuliner lokal khas Batak.\r\n\r\nLokasi Safari Jetski Samosir berada di Desa Tuk-tuk Siadong, salah satu destinasi favorit di Samosir yang mudah diakses dari Parapat atau Balige. Dengan suasana yang tenang namun tetap menawarkan keseruan, tempat ini cocok dikunjungi bersama keluarga, pasangan, maupun teman-teman.\r\n\r\nJika kamu ingin merasakan sensasi berkendara di atas air seperti Fuji, jangan ragu untuk masukkan Safari Jetski Samosir dalam daftar liburanmu!', 'berita/iAkegY25mx1qLDc6pngO89wBaHz2PraY9cY1LEGf.jpg', 'https://www.instagram.com/fuji_an/reel/DI8x4ZyyyTZ/', 1, '2025-04-27 07:55:00', '2025-05-12 13:57:08', '2025-05-12 13:57:08'),
(2, 'Boy William Jelajahi Keindahan Danau Toba dengan Jetski di Seadoo Safari Samosir!', 'boy-william-jelajahi-keindahan-danau-toba-dengan-jetski-di-seadoo-safari-samosir', 'Presenter ternama Boy William mengunjungi Seadoo Safari Samosir dan menikmati sensasi naik jetski di Danau Toba.', 'Presenter kondang Indonesia, Boy William, belum lama ini membagikan momen seru saat menjajal jetski di tengah pesona alam Danau Toba bersama tim Seadoo Safari Samosir. Dalam unggahan video di Instagram, Boy terlihat begitu antusias melaju di atas air biru jernih, menikmati tiap detik petualangan ekstrem namun menyenangkan ini.\r\n\r\n\"Cocok gak aku jadi pembalap jetski? Haha. Sumpah pengen balik lagi ke sini, naik jetski di Danau Toba terus makan mie gamok,\" tulisnya dalam caption yang mengundang tawa sekaligus rasa penasaran para followers-nya.\r\n\r\nKegiatan seru ini dipandu langsung oleh Captain @sianturi_al, sementara momen-momen epik dari udara berhasil diabadikan dengan apik lewat drone milik @frederikjoo_simbolon.', 'berita/CTDVCwukudGXh7UJXFDKuLrMm8xJviZofikGlNKX.jpg', 'https://www.instagram.com/reel/DJBoRCHTHGd/', 1, '2025-06-03 02:59:00', '2025-06-03 02:59:21', '2025-06-03 02:59:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_mulai` datetime DEFAULT NULL,
  `waktu_selesai` datetime DEFAULT NULL,
  `jumlah_penumpang` int DEFAULT NULL,
  `nama_penumpang1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_penumpang2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `metode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refund_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refund_processed_at` timestamp NULL DEFAULT NULL,
  `harga_drone` int DEFAULT NULL,
  `total_harga` int DEFAULT NULL,
  `detail_paket_id` bigint UNSIGNED DEFAULT NULL,
  `users_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id`, `nama_customer`, `no_telepon`, `waktu_mulai`, `waktu_selesai`, `jumlah_penumpang`, `nama_penumpang1`, `nama_penumpang2`, `status`, `metode_pembayaran`, `status_pembayaran`, `bukti_pembayaran`, `refund_proof`, `refund_processed_at`, `harga_drone`, `total_harga`, `detail_paket_id`, `users_id`, `created_at`, `updated_at`) VALUES
(1, 'PANGERAN SILAEN', '082162717323', '2025-05-08 09:25:00', '2025-05-08 09:30:00', 1, 'pangeran', NULL, 'success', 'manual_transfer', 'success', 'bukti_pembayaran/LhTobF47CzXgaY3hpzXZNcbjKGfCotsniuy48AWf.jpg', NULL, NULL, 500000, 2000000, 2, 16, '2025-05-07 19:23:01', '2025-05-07 19:25:07'),
(2, 'PANGERAN SILAEN', '082162717323', '2025-05-08 10:01:00', '2025-05-08 10:06:00', 1, 'david', NULL, 'success', 'manual_transfer', 'success', 'bukti_pembayaran/RvJ23nbwOjPzwLYX30lr9BHak2G9cPWfnB4PRTGS.jpg', NULL, NULL, 500000, 2000000, 2, 16, '2025-05-07 19:57:16', '2025-05-07 19:58:19'),
(3, 'PANGERAN SILAEN', '082162717323', '2025-05-08 10:30:00', '2025-05-08 10:35:00', 1, 'david', NULL, 'success', NULL, 'pending', NULL, NULL, NULL, 500000, 2000000, 2, 16, '2025-05-07 20:27:33', '2025-05-07 20:27:33'),
(4, 'PANGERAN SILAEN', '082162717323', '2025-05-08 10:30:00', '2025-05-08 10:35:00', 1, 'david', NULL, 'success', 'manual_transfer', 'success', 'bukti_pembayaran/93NFhzaOWwqHCKqU4RzTaE3oPBTQz7lUcBCSSiXy.jpg', NULL, NULL, 500000, 2000000, 2, 16, '2025-05-07 20:27:59', '2025-05-07 20:28:41'),
(5, 'PANGERAN SILAEN', '082162717323', '2025-05-08 10:55:00', '2025-05-08 11:00:00', 1, 'david', NULL, 'success', NULL, 'pending', NULL, NULL, NULL, 500000, 2000000, 2, 16, '2025-05-07 20:52:20', '2025-05-07 20:52:20'),
(6, 'PANGERAN SILAEN', '082162717323', '2025-05-08 10:56:00', '2025-05-08 11:01:00', 1, 'david', NULL, 'success', NULL, 'pending', NULL, NULL, NULL, 500000, 2000000, 2, 16, '2025-05-07 20:53:37', '2025-05-07 20:53:37'),
(7, 'PANGERAN SILAEN', '082162717323', '2025-05-08 10:56:00', '2025-05-08 11:01:00', 1, 'david', NULL, 'success', 'manual_transfer', 'pending', 'bukti_pembayaran/dUPhWviF80pedfIPRuGc1R1DgUeREvuIqQ8rRTit.jpg', NULL, NULL, 500000, 2000000, 2, 16, '2025-05-07 20:54:55', '2025-05-07 21:21:39'),
(8, 'PANGERAN SILAEN', '082162717323', '2025-05-08 11:26:00', '2025-05-08 11:31:00', 1, 'david', NULL, 'success', NULL, 'expired', NULL, NULL, NULL, 500000, 2000000, 2, 16, '2025-05-07 21:23:44', '2025-05-10 02:01:43'),
(9, 'PANGERAN SILAEN', '082162717323', '2025-05-08 11:26:00', '2025-05-08 11:31:00', 1, 'david', NULL, 'success', 'manual_transfer', 'success', 'bukti_pembayaran/UHDNnlrm58YCx1EVzVy2dgXuNQMpQUi550K86NYR.jpg', NULL, NULL, 500000, 2000000, 2, 16, '2025-05-07 21:24:08', '2025-05-07 21:24:39'),
(10, 'PANGERAN SILAEN', '082162717323', '2025-05-08 11:37:00', '2025-05-08 11:42:00', 1, 'david', NULL, 'success', 'manual_transfer', 'expired', 'bukti_pembayaran/QOCuTEtppUvUvwLvgjUKevE2PpGapmqHp6bUdoD6.jpg', NULL, NULL, 500000, 2000000, 2, 16, '2025-05-07 21:39:19', '2025-05-09 02:46:04'),
(11, 'Gladys', '0813-7525-2216', '2025-05-08 11:42:00', '2025-05-08 11:47:00', 1, 'Gladys', NULL, 'success', 'manual_transfer', 'pending', 'bukti_pembayaran/hRE9v8ZwAgmTX3YN9cPQ43slErEQP4lNr14hYadj.jpg', NULL, NULL, 500000, 2000000, 2, 21, '2025-05-07 21:43:16', '2025-05-07 21:43:35'),
(12, 'PANGERAN SILAEN', '082162717323', '2025-05-08 13:08:00', '2025-05-08 16:38:00', 2, 'David', NULL, 'success', 'manual_transfer', 'expired', 'bukti_pembayaran/Jci3KCufHBThQiKgfZgK8mzaJukmu1EZugALZZTz.jpg', NULL, NULL, 500000, 6500000, 5, 16, '2025-05-07 23:08:28', '2025-05-07 23:09:55'),
(13, 'IRENE SITUMORANG', '+6282162717323', '2025-05-08 13:10:00', '2025-05-08 15:10:00', 2, 'ELFRINA', 'MASRIN', 'success', 'manual_transfer', 'pending', 'bukti_pembayaran/Tf631mEnhwJSXcmHAITT87RyqoIvCuQtyVuOSSsp.jpg', NULL, NULL, 0, 4000000, 4, 17, '2025-05-07 23:10:33', '2025-05-07 23:17:03'),
(14, 'Otto manik', '085362682652', '2025-05-09 13:11:00', '2025-05-09 13:41:00', 2, 'Djdj', 'Ndnd', 'success', 'manual_transfer', 'pending', 'bukti_pembayaran/9FsPV4YXHnPynyA5HNBgXWKxzHxZ777D2alA7Qcm.png', NULL, NULL, 1000000, 10000000, 6, 22, '2025-05-07 23:11:53', '2025-05-07 23:13:33'),
(15, 'Jane', '081383141916', '2228-02-29 13:14:00', '2228-02-29 13:19:00', 1, 'Jane', NULL, 'success', 'manual_transfer', 'pending', 'bukti_pembayaran/76tRR9j72WUffGUO5KP7O05vubWoMjTMAzNunRGu.jpg', NULL, NULL, 1000000, 2500000, 2, 24, '2025-05-07 23:14:47', '2025-05-07 23:19:07'),
(16, 'Winda Pane', '+6282115830013', '2025-05-09 13:22:00', '2025-05-09 15:22:00', 2, 'Winda Pane', 'Ester', 'success', 'manual_transfer', 'pending', 'bukti_pembayaran/W1Gs63lteq6dI2OqvDtIAjGRPMgV0ASg6EQR5bBf.png', NULL, NULL, 1000000, 5000000, 4, 25, '2025-05-07 23:23:34', '2025-05-07 23:30:40'),
(17, 'Avoan Greace Stepany Nababan', '081389973280', '2025-06-20 10:00:00', '2025-06-20 10:30:00', 2, 'Avoan Greace Stepany Nababan', 'Arifa Ambarita', 'success', 'manual_transfer', 'success', 'bukti_pembayaran/F3bBcE5DwIkESmaXT8ZEW6fsurWhnxcJX6W7VErN.png', NULL, NULL, 1000000, 10000000, 6, 26, '2025-05-07 23:23:40', '2025-05-07 23:28:07'),
(18, 'Inoru', '085837428013', '2025-05-18 19:23:00', '2025-05-18 19:28:00', 2, 'Inoru', 'Firman', 'success', NULL, 'pending', NULL, NULL, NULL, 1000000, 2500000, 2, 27, '2025-05-07 23:24:22', '2025-05-07 23:24:22'),
(19, 'Hanna', '081375678332', '2025-05-09 15:27:00', '2025-05-09 16:27:00', 1, 'Hanna sitinjak', NULL, 'success', NULL, 'pending', NULL, NULL, NULL, 0, 2000000, 3, 28, '2025-05-07 23:28:50', '2025-05-07 23:28:50'),
(20, 'Astrit', '082268004495', '2025-05-08 15:29:00', '2025-05-08 16:29:00', 1, 'Astrit', NULL, 'success', 'manual_transfer', 'pending', 'bukti_pembayaran/LKLMmrBd874qTF3DttHLxtKKd7znHlC5wC0KIhgg.png', NULL, NULL, 0, 2000000, 3, 29, '2025-05-07 23:30:02', '2025-05-07 23:31:45'),
(21, 'Steven Samosir', '+6282360745174', '2025-05-08 18:30:00', '2025-05-08 22:00:00', 1, 'steven', NULL, 'success', 'manual_transfer', 'expired', 'bukti_pembayaran/dY1j9aoLZRsJhSZu5QSXz5M3LBEm3YleYJHDZbe0.png', NULL, NULL, 1000000, 7000000, 5, 19, '2025-05-07 23:32:43', '2025-05-13 03:38:31'),
(22, 'Christy Natalia Siallagan', '082168554940', '2025-05-09 13:46:00', '2025-05-09 14:46:00', 1, 'Natalia', NULL, 'success', 'manual_transfer', 'pending', 'bukti_pembayaran/vhwK4G5BKkLTDMeLqv2s7XNOWwrv5XJNcEoSKxD1.png', NULL, NULL, 0, 2000000, 3, 30, '2025-05-07 23:47:02', '2025-05-07 23:49:07'),
(23, 'Arga', '085792112111', '2025-05-08 14:18:00', '2025-05-08 14:48:00', 1, 'Arga', NULL, 'success', 'manual_transfer', 'pending', 'bukti_pembayaran/rLS5qT4RUpwSPWzXYxrrax0P9go0TEu2lV7SeROl.jpg', NULL, NULL, 1000000, 10000000, 6, 31, '2025-05-08 00:18:49', '2025-05-08 00:20:01'),
(24, 'Dimas Sidabutar', '082385345239', '2025-05-10 15:40:00', '2025-05-10 16:10:00', 1, 'Dimas Sidabutar', NULL, 'success', 'manual_transfer', 'pending', 'bukti_pembayaran/CzHgRNEYxDjvMV3yPq3PXm6lr5IA1RKMV71EiIw7.jpg', NULL, NULL, 0, 900000, 6, 33, '2025-05-08 00:41:03', '2025-05-08 00:42:04'),
(25, 'grace imut', '0895611222206', '2025-05-23 14:51:00', '2025-05-23 15:21:00', 1, 'grace aja', NULL, 'success', 'manual_transfer', 'pending', 'bukti_pembayaran/GL9siL95Onq42w2aCsIZgw72AHKYNDf5JehLVY05.png', NULL, NULL, 1000000, 1900000, 6, 35, '2025-05-08 00:46:24', '2025-05-08 00:47:44'),
(26, 'JANRITUA MANIK', '085277166420', '2025-05-10 16:00:00', '2025-05-10 17:00:00', 1, 'Janri', NULL, 'success', 'manual_transfer', 'pending', 'bukti_pembayaran/dybCQDmlAkQ3H5EzapvCAGVN6pHrTRb9V5ZR2oqU.jpg', NULL, NULL, 1000000, 3000000, 3, 34, '2025-05-08 00:46:25', '2025-05-08 00:51:18'),
(27, 'david12345', '0852222222', '2025-05-09 09:00:00', '2025-05-09 12:30:00', 2, 'david', 'lili', 'success', 'manual_transfer', 'success', 'bukti_pembayaran/BjBDMHRetDZ3LiylfmxZBa5JWw6N7HSKAm5N032z.jpg', NULL, NULL, 1000000, 7000000, 5, 9, '2025-05-08 01:00:06', '2025-05-08 01:03:26'),
(28, 'Ambar jr', '081268735946', '2025-05-08 03:30:00', '2025-05-08 07:00:00', 2, 'Miduk', 'Rendi', 'success', NULL, 'expired', NULL, NULL, NULL, 1000000, 7000000, 5, 37, '2025-05-08 01:28:06', '2025-05-08 01:28:07'),
(29, 'Tino Silaban', '082274980601', '2025-05-08 15:28:00', '2025-05-08 16:38:00', 1, 'tinosilaban', NULL, 'success', NULL, 'pending', NULL, NULL, NULL, 0, 1800000, 7, 36, '2025-05-08 01:29:33', '2025-05-08 01:29:33'),
(30, 'david12345', '0852222222', '2025-05-09 09:55:00', '2025-05-09 13:25:00', 2, 'david', 'lili', 'success', 'manual_transfer', 'pending', 'bukti_pembayaran/8VkYQ3M3LR2H3yGAR3vswmbIZORoo0VNDHzskGjP.jpg', NULL, NULL, 500000, 6500000, 5, 9, '2025-05-08 01:53:00', '2025-05-08 01:56:50'),
(31, 'PANGERAN SILAEN', '082162717323', '2025-05-09 14:15:00', '2025-05-09 15:25:00', 1, 'david', NULL, 'success', 'manual_transfer', 'menunggu_konfirmasi', 'bukti_pembayaran/iEcut3WsKlm81lePThdaFcZd2FX5L4GBiS8EV2zD.jpg', NULL, NULL, 500000, 2300000, 7, 9, '2025-05-09 00:13:20', '2025-05-09 00:30:19'),
(32, 'PANGERAN SILAEN', '082162717323', '2025-05-09 15:47:00', '2025-05-09 16:57:00', 1, 'Sion', NULL, 'success', 'manual_transfer', 'expired', NULL, NULL, NULL, 1000000, 2800000, 7, 16, '2025-05-09 01:39:43', '2025-05-10 02:00:36'),
(33, 'Esthefany Sipahutar', '081282523709', '2025-05-10 16:54:00', '2025-05-10 18:04:00', 1, 'Esthefany', NULL, 'success', 'manual_transfer', 'success', 'bukti_pembayaran/vX2IuEpNEirhlhxtvGCmjJg5RxWnoIxmhoctNWbJ.jpg', NULL, NULL, 500000, 2300000, 7, 38, '2025-05-10 02:48:51', '2025-05-10 05:07:07'),
(34, 'Esthefany Sipahutar', '081282523709', '2025-05-11 16:31:00', '2025-05-11 16:46:00', 2, 'pangeran', 'esthefany', 'success', 'manual_transfer', 'canceled', NULL, NULL, NULL, 500000, 1300000, 8, 38, '2025-05-10 03:31:47', '2025-05-10 06:47:12'),
(35, 'Esthefany Sipahutar', '081282523709', '2025-05-11 14:00:00', '2025-05-11 14:30:00', 2, 'david', 'pangeran', 'success', 'manual_transfer', 'expired', NULL, NULL, NULL, 500000, 1400000, 6, 38, '2025-05-10 04:07:21', '2025-05-11 11:05:00'),
(36, 'Esthefany Sipahutar', '081282523709', '2025-05-11 11:55:00', '2025-05-11 12:10:00', 1, 'david', NULL, 'success', 'manual_transfer', 'canceled', NULL, NULL, NULL, 500000, 1300000, 8, 38, '2025-05-10 06:56:10', '2025-05-10 06:56:25'),
(37, 'Esthefany Sipahutar', '081282523709', '2025-05-11 16:10:00', '2025-05-11 16:15:00', 1, 'david', NULL, 'success', NULL, 'expired', NULL, NULL, NULL, 500000, 2000000, 2, 38, '2025-05-11 02:04:56', '2025-05-11 11:05:00'),
(38, 'Esthefany Sipahutar', '081282523709', '2025-05-11 16:26:00', '2025-05-11 16:31:00', 1, 'david', NULL, 'success', 'manual_transfer', 'success', 'bukti_pembayaran/ctjFqqvhQsevm7zi1rbDal2XpeWccCKGF8CIme8p.jpg', NULL, NULL, 1000000, 2500000, 2, 38, '2025-05-11 02:20:52', '2025-05-11 02:22:59'),
(39, 'Esthefany Sipahutar', '081282523709', '2025-05-12 15:19:00', '2025-05-12 15:24:00', 1, 'david', NULL, 'success', NULL, 'expired', NULL, NULL, NULL, 1000000, 2500000, 2, 38, '2025-05-11 11:20:06', '2025-05-11 11:25:40'),
(40, 'Esthefany Sipahutar', '081282523709', '2025-05-12 16:20:00', '2025-05-12 16:25:00', 1, 'daivd', NULL, 'success', 'manual_transfer', 'canceled', NULL, NULL, NULL, 500000, 2000000, 2, 38, '2025-05-11 11:21:11', '2025-05-11 11:22:31'),
(41, 'Esthefany Sipahutar', '081282523709', '2025-05-12 15:17:00', '2025-05-12 15:22:00', 1, 'david', NULL, 'success', 'manual_transfer', 'expired', NULL, NULL, NULL, 500000, 2000000, 2, 38, '2025-05-11 11:23:22', '2025-05-13 06:03:59'),
(42, 'Esthefany Sipahutar', '081282523709', '2025-05-12 16:40:00', '2025-05-12 16:45:00', 1, 'david', NULL, 'success', NULL, 'expired', NULL, NULL, NULL, 500000, 2000000, 2, 38, '2025-05-11 11:38:50', '2025-05-11 13:02:06'),
(43, 'IRENE SITUMORANG', '+6282162717323', '2025-05-13 11:30:00', '2025-05-13 12:40:00', 1, 'YU', NULL, 'success', 'manual_transfer', 'pending', NULL, NULL, NULL, 0, 1800000, 7, 17, '2025-05-11 13:38:50', '2025-05-11 13:44:15'),
(44, 'David Kristian Silalahi', '+6282276588347', '2025-05-12 12:55:00', '2025-05-12 14:05:00', 1, 'Kimmi', NULL, 'success', 'manual_transfer', 'success', 'bukti_pembayaran/GgPuhWRi6z3tfosRfa9l6nEJlOHne0ax8Mx10f1m.png', NULL, NULL, 1000000, 2800000, 7, 13, '2025-05-11 13:51:56', '2025-05-11 14:00:25'),
(45, 'Esthefany Sipahutar', '081282523709', '2025-05-12 14:57:00', '2025-05-12 15:02:00', 1, 'Iren', NULL, 'success', 'manual_transfer', 'success', 'bukti_pembayaran/Qik13NiN1X2E7cS84XBgL9jJfLLRozCu72DkXxcr.jpg', NULL, NULL, 1000000, 2500000, 2, 38, '2025-05-11 13:58:18', '2025-05-11 14:00:49'),
(46, 'David Kristian j Silalahi', '+6282276588347', '2025-05-12 13:41:00', '2025-05-12 15:41:00', 1, 'Goretty', NULL, 'success', 'manual_transfer', 'menunggu_konfirmasi', 'bukti_pembayaran/fMpvcb1lCY9IpT7hNMBGHNNkJqCvuiGMrJWH9ujL.png', NULL, NULL, 1000000, 5000000, 4, 13, '2025-05-11 14:38:09', '2025-05-11 14:40:54'),
(47, 'David Kristian j Silalahi', '+6282276588347', '2025-05-14 09:27:00', '2025-05-14 09:57:00', 1, 'Yulanda', NULL, 'success', 'manual_transfer', 'menunggu_konfirmasi', 'bukti_pembayaran/8FHVge6CVy3OaZ4vdTWRsVv4HEAll6DE0pHp0QaW.jpg', NULL, NULL, 1000000, 1900000, 6, 13, '2025-05-13 02:28:22', '2025-05-13 02:29:21'),
(48, 'David Kristian j Silalahi', '+6282276588347', '2025-05-13 11:30:00', '2025-05-13 12:40:00', 1, 'Jagarman', NULL, 'success', 'manual_transfer', 'success', 'bukti_pembayaran/6jCjJWl9NToHUPjLPZI0nplRonna4NJsHMaiW2uj.jpg', NULL, NULL, 1000000, 2800000, 7, 13, '2025-05-13 03:02:00', '2025-05-13 03:05:46'),
(49, 'Esthefany Sipahutar', '081282523709', '2025-05-13 12:47:00', '2025-05-13 13:57:00', 2, 'pangeran', 'not', 'success', 'manual_transfer', 'menunggu_konfirmasi', 'bukti_pembayaran/UDJ3aDB5Q3p2wuRQZcTmmdOkPpJJs3OHkbztWqiG.jpg', NULL, NULL, 0, 1800000, 7, 38, '2025-05-13 04:48:10', '2025-05-13 04:49:22'),
(50, 'Esthefany Sipahutar', '081282523709', '2025-05-13 13:08:00', '2025-05-13 16:38:00', 1, 'dapot', NULL, 'success', 'manual_transfer', 'menunggu_konfirmasi', 'bukti_pembayaran/xs4D690ucaV6hNRtoE5BdUgDk11Xd8Od8vJ3UXAh.jpg', NULL, NULL, 500000, 6500000, 5, 38, '2025-05-13 06:01:28', '2025-05-13 06:03:14'),
(51, 'Esthefany Sipahutar', '081282523709', '2025-05-14 08:32:00', '2025-05-14 08:37:00', 2, 'david', 'silalahi', 'success', NULL, 'expired', NULL, NULL, NULL, 500000, 2000000, 2, 38, '2025-05-14 01:27:01', '2025-05-14 18:20:29'),
(52, 'Esthefany Sipahutar', '081282523709', '2025-05-14 11:42:00', '2025-05-14 12:52:00', 2, 'david', 'silalahi', 'success', 'manual_transfer', 'menunggu_konfirmasi', 'bukti_pembayaran/bDr8lT0pwTK2tVN9tfFekVW4ArzRHxkW0cGncpXL.jpg', NULL, NULL, 500000, 2300000, 7, 38, '2025-05-14 04:36:40', '2025-05-14 04:39:48'),
(53, 'Esthefany Sipahutar', '081282523709', '2025-05-15 15:29:00', '2025-05-15 17:29:00', 2, 'ghbhug', 'byfyuh', 'success', 'manual_transfer', 'canceled', NULL, NULL, NULL, 0, 4000000, 4, 38, '2025-05-14 08:25:15', '2025-05-14 08:26:10'),
(54, 'Esthefany Sipahutar', '081282523709', '2025-05-15 10:00:00', '2025-05-15 10:05:00', 2, 'david', 'iren', 'success', 'manual_transfer', 'refunded', 'bukti_pembayaran/0MTe7LbX4527h5GEVUFZpNwimtHCWmYHOd3qe8Rf.jpg', NULL, NULL, 500000, NULL, 2, 38, '2025-05-15 02:48:20', '2025-05-15 03:45:37'),
(55, 'Esthefany Sipahutar', '081282523709', '2025-05-15 11:26:00', '2025-05-15 14:56:00', 2, 'david', 'silalahi', 'success', 'manual_transfer', 'refunded', 'bukti_pembayaran/aLKgAJkuKqjUz60subLFpOedd9mLXXg0mPouWDZh.jpg', 'refund_proofs/lqjN2v6t2DHu6OfUT7aUDZ78FxhAaDlH64EH3URX.jpg', '2025-05-15 04:13:12', 500000, NULL, 5, 38, '2025-05-15 04:09:10', '2025-05-15 04:13:12'),
(56, 'Esthefany Sipahutar', '081282523709', '2025-05-15 15:51:00', '2025-05-15 15:56:00', 1, 'david', NULL, 'success', NULL, 'expired', NULL, NULL, NULL, 500000, 2000000, 2, 38, '2025-05-15 08:35:04', '2025-05-15 12:14:50'),
(57, 'Esthefany Sipahutar', '081282523709', '2025-05-16 10:09:00', '2025-05-16 10:39:00', 2, 'david', 'pangeran', 'success', 'manual_transfer', 'success', 'bukti_pembayaran/Y1guj6fovwmH47B18nTlK0PZRA5bcbgsflfI9SWt.jpg', NULL, NULL, 500000, 1400000, 6, 38, '2025-05-15 12:09:51', '2025-05-15 12:16:28'),
(58, 'Steven Samosir', '+6282360745174', '2025-05-16 14:50:00', '2025-05-16 17:05:00', 1, 'q', NULL, 'success', 'manual_transfer', 'menunggu_konfirmasi', 'bukti_pembayaran/18281ULfRwtPOO8SbkGosFxee4kKFoeD5WHbhYbK.jpg', NULL, NULL, 0, 4000000, 4, 19, '2025-05-15 12:53:08', '2025-05-15 12:57:02'),
(59, 'Esthefany Sipahutar', '081282523709', '2025-05-16 11:52:00', '2025-05-16 12:07:00', 1, 'david', NULL, 'success', 'manual_transfer', 'refunded', 'bukti_pembayaran/Ms2npvsBgyT7xFtd8lXhRYVynN42aaBpO1ppxDLq.jpg', 'refund_proofs/L7o31cUKFJoFuZfDNTputBZmz7Did6kipfzJ754J.jpg', '2025-05-16 04:48:29', 500000, NULL, 8, 38, '2025-05-16 04:37:21', '2025-05-16 04:48:29'),
(60, 'Benyamin Sibarani', '081360344859', '2025-05-27 08:11:00', '2025-05-27 08:26:00', 1, 'David', NULL, 'success', 'manual_transfer', 'success', 'bukti_pembayaran/1748268374_683475567cfee.jpg', NULL, NULL, 500000, 1300000, 8, 45, '2025-05-26 14:05:30', '2025-05-26 14:16:46'),
(61, 'Benyamin Sibarani', '081360344859', '2025-05-28 08:50:00', '2025-05-28 10:00:00', 1, 'david', NULL, 'success', 'manual_transfer', 'menunggu_konfirmasi', 'bukti_pembayaran/1748271051_68347fcbb829e.png', NULL, NULL, 500000, 2300000, 7, 45, '2025-05-26 14:50:29', '2025-05-26 14:50:51'),
(62, 'Esthefany Sipahutar', '081282523709', '2025-05-27 13:26:00', '2025-05-27 14:26:00', 1, 'marihot', NULL, 'success', 'manual_transfer', 'success', 'bukti_pembayaran/1748326888_683559e84f256.jpg', NULL, NULL, 500000, 2000000, 2, 38, '2025-05-27 06:20:58', '2025-05-27 07:15:04'),
(63, 'Pangeran Silaen', '08227658834', '2025-05-27 14:27:00', '2025-05-27 16:42:00', 1, 'david', NULL, 'success', 'manual_transfer', 'rejected', 'bukti_pembayaran/1748330429_683567bddfb6a.jpg', NULL, NULL, 500000, 4500000, 4, 46, '2025-05-27 07:20:00', '2025-05-27 07:57:41'),
(64, 'halohalo', '090853853853', '2025-06-03 10:09:00', '2025-06-03 10:24:00', 2, 'david', 'rejeki', 'success', 'bri_bank', 'success', 'bukti_pembayaran/1748920989_683e6a9d91882.jpg', NULL, NULL, 500000, 1300000, 8, 49, '2025-06-03 03:03:23', '2025-06-03 03:40:09'),
(65, 'halohalo', '090853853853', '2025-06-03 10:57:00', '2025-06-03 11:12:00', 2, 'oi', 'oihehi91023109', 'success', 'bank_sumut', 'success', 'bukti_pembayaran/1748922799_683e71af56130.jpg', NULL, NULL, 500000, 1300000, 8, 49, '2025-06-03 03:51:44', '2025-06-03 03:53:19'),
(66, 'halohalo', '090853853853', '2025-06-03 11:18:00', '2025-06-03 11:33:00', 1, 'david', NULL, 'success', NULL, 'expired', NULL, NULL, NULL, 500000, 1300000, 8, 49, '2025-06-03 04:07:10', '2025-06-03 08:27:03'),
(67, 'halohalo', '090853853853', '2025-06-03 15:38:00', '2025-06-03 17:53:00', 1, 'david', NULL, 'success', 'bri_bank', 'menunggu_konfirmasi', 'bukti_pembayaran/1748940179_683eb5933cfe8.jpg', NULL, NULL, 1000000, 5000000, 4, 49, '2025-06-03 08:26:20', '2025-06-03 08:42:59'),
(68, 'halohalo', '090853853853', '2025-06-04 12:15:00', '2025-06-04 14:30:00', 1, 'david', NULL, 'success', 'bri_bank', 'meminta_refund', 'bukti_pembayaran/1748967624_683f20c8e684c.jpg', NULL, NULL, 500000, 4500000, 4, 49, '2025-06-03 16:15:52', '2025-06-03 16:42:50'),
(69, 'halohalo', '090853853853', '2025-06-04 09:33:00', '2025-06-04 09:48:00', 1, 'david', NULL, 'success', 'bri_bank', 'success', 'bukti_pembayaran/1749003783_683fae072e277.jpg', NULL, NULL, 500000, 1300000, 8, 49, '2025-06-04 02:22:09', '2025-06-04 02:41:53'),
(70, 'halohalo', '090853853853', '2025-06-04 12:18:00', '2025-06-04 12:33:00', 1, 'david', NULL, 'success', 'bri_bank', 'canceled', NULL, NULL, NULL, 1000000, 1800000, 8, 49, '2025-06-04 05:04:15', '2025-06-04 05:05:06'),
(71, 'halohalo', '090853853853', '2025-06-04 12:29:00', '2025-06-04 12:44:00', 1, 'david', NULL, 'success', 'bri_bank', 'menunggu_konfirmasi', 'bukti_pembayaran/1749013622_683fd476cb16d.jpg', NULL, NULL, 500000, 1300000, 8, 49, '2025-06-04 05:06:38', '2025-06-04 05:07:02'),
(72, 'halohalo', '090853853853', '2025-06-04 13:38:00', '2025-06-04 13:53:00', 1, 'david', NULL, 'success', 'bri_bank', 'refunded', 'bukti_pembayaran/1749018107_683fe5fb56c2a.jpg', 'refund_proofs/1749018696_683fe8489218e.jpg', '2025-06-04 06:31:36', 500000, NULL, 8, 49, '2025-06-04 06:20:27', '2025-06-04 06:31:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('b794295526f317abd7b622347098473d', 'i:2;', 1749027461),
('b794295526f317abd7b622347098473d:timer', 'i:1749027461;', 1749027461),
('c0489113f8c96b3a3aa07e86a050dbc6', 'i:1;', 1749115446),
('c0489113f8c96b3a3aa07e86a050dbc6:timer', 'i:1749115446;', 1749115446),
('da2e2ed77160d7d73f1cc89d6141fc7a', 'i:1;', 1749115034),
('da2e2ed77160d7d73f1cc89d6141fc7a:timer', 'i:1749115034;', 1749115034),
('e1822db470e60d090affd0956d743cb0e7cdf113', 'i:1;', 1749027515),
('e1822db470e60d090affd0956d743cb0e7cdf113:timer', 'i:1749027515;', 1749027515);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_paket`
--

CREATE TABLE `detail_paket` (
  `id` bigint UNSIGNED NOT NULL,
  `paket_jetski_id` bigint UNSIGNED DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `rating` double NOT NULL DEFAULT '0',
  `harga_drone` int DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_paket`
--

INSERT INTO `detail_paket` (`id`, `paket_jetski_id`, `foto`, `rating`, `harga_drone`, `deskripsi`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 1, '\"[\\\"assets\\\\\\/item\\\\\\/mUr5Vdf1GF44ykTPakKYrgZNpcss9CGtueqkItNd.jpg\\\",\\\"assets\\\\\\/item\\\\\\/qhC85ErzTvVQYaPVEMQY1I2npvGZtK2Bk7jr66ED.jpg\\\",\\\"assets\\\\\\/item\\\\\\/08EiKF5n1F61KdwIl2AcaJXdq7NvHTQpz84TrU6p.jpg\\\",\\\"assets\\\\\\/item\\\\\\/RiIiQiX5qmCBtHzFsMIbtWMoM9ehqz1vM02RboHA.jpg\\\"]\"', 3, 100000, 'JUMLAH UNIT : 1 JETSKI,JUMLAH ORANG : 2 DEWASA DAN 1 ANAK < 12 TAHUN ,DURASI BERMAIN: 1 JAM (DAPAT BERGANTIAN 1X/30 MENIT, FOTO-VIDEO BY IPHONE 15 PROMAX, TIDAK TERMASUK DRONE', NULL, '2025-03-05 01:23:45', '2025-05-15 19:06:43'),
(3, 3, '\"[\\\"assets\\\\\\/item\\\\\\/d9XJWfWeYZY6wRD78lphD59gGnLeDSt4iJh23aRj.jpg\\\",\\\"assets\\\\\\/item\\\\\\/0rqk9Wemdf8T5M6fQ14oF4C722aTmEbkBG9KaIdm.jpg\\\",\\\"assets\\\\\\/item\\\\\\/0NafOXmvboA7L1h3NYI8ZAOoOy4qskX85cAA5dSX.jpg\\\",\\\"assets\\\\\\/item\\\\\\/9MhXw11bnf9WI7whi7IbkSldg5u4yNm9Z5JdpUrO.jpg\\\"]\"', 5, 100000, 'JUMLAH UNIT: 1 JETSKI, JUMLAH ORANG: 2 DEWASA, DURASI BERMAIN: 1 JAM 15 MENIT (DAPAT BERGANTIAN 1X DI DESTINASI TUJUAN), FOTO-VIDEO BY IPHONE 15 PROMAX, TIDAK TERMASUK DRONE', NULL, '2025-03-25 20:16:31', '2025-05-15 19:41:49'),
(4, 4, '\"[\\\"assets\\\\\\/item\\\\\\/wPYLSRwe7b9zCE4BMavSAnuQqa17ec6WELIIuiBp.jpg\\\",\\\"assets\\\\\\/item\\\\\\/uePvMFT6VVNUITbmkcOFyJz3gjcXiE68iOcHzUqS.jpg\\\",\\\"assets\\\\\\/item\\\\\\/SPXulKPceYzIxFQNJhDswCuDoP0oLVKwK808Rtvu.jpg\\\",\\\"assets\\\\\\/item\\\\\\/tgarF7rRvU5cLn0JJqKaqS5bTu1svdTrhmO9BnX5.jpg\\\"]\"', 4, 100000, 'JUMLAH UNIT: 1 JETSKI, JUMLAH ORANG: 2 DEWASA, DURASI BERMAIN: 2 JAM 15 MENIT (DAPAT BERGANTIAN 1X DI DESTINASI TUJUAN), FOTO-VIDEO BY IPHONE 15 PROMAX, TIDAK TERMASUK DRONE', NULL, '2025-03-25 21:49:32', '2025-05-15 09:57:21'),
(5, 5, '\"[\\\"assets\\\\\\/item\\\\\\/WMdCFbQ6KDUJwcPMlejiRODaPj6cs7ljxiLof99O.jpg\\\",\\\"assets\\\\\\/item\\\\\\/3PUqiHFgJsFxlldEaX41hw9qek5Ghkd4YIeTRpUm.jpg\\\",\\\"assets\\\\\\/item\\\\\\/kDQU1iqyRecysIy3L0LeSyWMHk2mG00qRi9I00Q2.jpg\\\"]\"', 4, 100000, 'JUMLAH UNIT: 1 JETSKI, JUMLAH ORANG: 2 DEWASA, DURASI BERMAIN: 3 JAM (DAPAT BERGANTIAN 1X DI DESTINASI TUJUAN), FOTO-VIDEO BY IPHONE 15 PROMAX, TERMASUK DRONE', NULL, '2025-03-26 18:22:03', '2025-05-15 19:42:52'),
(6, 6, '\"[\\\"assets\\\\\\/item\\\\\\/gk6K7IERf6fz1KhnKTXsUWDH6il7BHUfSfZyjCR7.jpg\\\",\\\"assets\\\\\\/item\\\\\\/wJLZUVpILDWuubSCnkZaPoVWHSu1HQEQvRlMw5XE.jpg\\\",\\\"assets\\\\\\/item\\\\\\/V7QcEXUDMAVIOZIvaJl3m1SOVCu6LEFBWgW1tV0m.jpg\\\",\\\"assets\\\\\\/item\\\\\\/scAwYCvKySI2awqMLeH82NXVE297TEAY8pkUsg0f.jpg\\\"]\"', 0, 1000000, 'JUMLAH UNIT : 1 JETSKI , JUMLAH ORANG : 2 DEWASA DAN 1 ANAK < 12 TAHUN, DURASI BERMAIN : 30 MENIT ,FOTO VIDEO BY IPHONE 15 PRO MAX, TIDAK TERMASUK DRONE', NULL, '2025-05-04 19:56:51', '2025-05-15 09:58:58'),
(7, 7, '\"[\\\"assets\\\\\\/item\\\\\\/9x8t27fmYBpIDxGSaohzlDvfwu47xWntlqSVXQzG.jpg\\\",\\\"assets\\\\\\/item\\\\\\/uXPcOXrchdyWaW3EbBTkwgPBPx9C00AZCQ9QO7pL.jpg\\\",\\\"assets\\\\\\/item\\\\\\/PAxsgVkpjRjx0CUJnx1IPzO9HDNT3MBnKJDYbYvy.jpg\\\",\\\"assets\\\\\\/item\\\\\\/btWYe4xkNQBMnGR8XUbxsYADYe1WfhskcEuFx6B0.jpg\\\"]\"', 0, NULL, 'JUMLAH UNIT 1 JETSKI, JUMLAH ORANG:2 DEWASA,DURAASI BERMAIN 1 JAM 10 MENIT,FOTO-VIDEO BY IPHONE 15 PROMAX,TIDAK TERMASUK DRONE', NULL, '2025-05-08 00:40:59', '2025-05-15 19:43:17'),
(8, 8, '\"[\\\"assets\\\\\\/item\\\\\\/odj1u6r5zLLn8n8RoYFj2d7keWRA3TfUgfxFZJOY.jpg\\\",\\\"assets\\\\\\/item\\\\\\/HWVrt7Go8DaAUYUv4rczQS5AaRMcsf0DoWpyOaVa.jpg\\\",\\\"assets\\\\\\/item\\\\\\/U9VE23af4AKIrFTu66Zjq4n9L3N9sVZarkzNdlob.jpg\\\",\\\"assets\\\\\\/item\\\\\\/T5lTRIN1zjCKAxTFkGBjGyhWMSsYOqeMVHQDjmtg.jpg\\\"]\"', 0, NULL, 'JUMLAH UNIT: 1, JUMLAH ORANG: 1, DURASI BERMAIN: 7 MENIT BILA BERDUA DENGAN KAPTEN, 15 MENIT BILA SENDIRI, FREE VIDEO DRONE', NULL, '2025-05-08 00:59:48', '2025-05-15 19:17:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id` bigint UNSIGNED NOT NULL,
  `stock` int NOT NULL,
  `pilihpakets_id` bigint UNSIGNED DEFAULT NULL,
  `photos` text COLLATE utf8mb4_unicode_ci,
  `rating` int NOT NULL DEFAULT '0',
  `deksripsi` text COLLATE utf8mb4_unicode_ci,
  `jumlah_penumpang` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_20_110429_add_two_factor_columns_to_users_table', 1),
(5, '2025_02_20_110606_create_personal_access_tokens_table', 1),
(6, '2025_02_20_111417_create_pilihpakets_table', 2),
(7, '2025_02_20_111937_create_items_table', 2),
(8, '2025_02_20_112004_create_bookings_table', 2),
(9, '2025_02_20_112202_add_roles_and_phone_field_to_users_table', 2),
(10, '2025_02_20_112923_add_two_factor_columns_to_users_table', 2),
(11, '2025_03_04_102010_update_pilih_paket_table', 3),
(12, '2025_03_04_112346_create_detail_pakets_table', 4),
(13, '2025_03_04_140620_update_bookings_table', 5),
(14, '2025_03_06_092827_add_jumlah_penumpang_and_rating_to_bookings_table', 6),
(15, '2025_03_08_094622_create_jetskis_table', 7),
(16, '2025_03_08_095302_rename_pilihpakets_to_paket_jetski', 8),
(17, '2025_03_08_100409_update_paket_jetski_table', 8),
(18, '2025_04_28_033842_add_bukti_pembayaran_to_bookings_table', 9),
(19, '2025_05_07_132737_create_jetski_adjustments_table', 10),
(20, '2025_05_08_014748_create_jetski_adjustments_table', 11),
(21, '2025_05_11_213330_create_berita_table', 12),
(22, '2025_05_13_090059_add_dibaca_to_berita_table', 13),
(23, '2025_05_15_103823_add_refund_columns_to_bookings_table', 14),
(24, '2025_05_15_150937_add_notified_at_to_bookings_table', 15),
(25, '2025_05_28_133815_create_otp_verifications_table', 16),
(26, '2025_06_05_152832_add_status_paket_to_paket_jetski', 17),
(27, '2025_06_05_164151_add_status_user_to_users_table', 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `otp_verifications`
--

CREATE TABLE `otp_verifications` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_jetski`
--

CREATE TABLE `paket_jetski` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `durasi` int NOT NULL,
  `jumlah_jetski` int DEFAULT NULL,
  `status_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `paket_jetski`
--

INSERT INTO `paket_jetski` (`id`, `nama_paket`, `harga`, `deskripsi`, `durasi`, `jumlah_jetski`, `status_paket`, `created_at`, `updated_at`) VALUES
(1, 'COASTAL TRIP', 1500000, 'JUMLAH UNIT : 1 JETSKI,JUMLAH ORANG : 2 DEWASA DAN 1 ANAK < 12 TAHUN ,DURASI BERMAIN: 1 JAM (DAPAT BERGANTIAN 1X/30 MENIT, FOTO-VIDEO BY IPHONE 15 PROMAX, TIDAK TERMASUK DRONE', 60, 15, 'nonaktif', '2025-02-13 07:12:27', '2025-06-05 09:15:40'),
(3, 'Batu Gantung Trip', 2000000, 'JUMLAH UNIT: 1 JETSKI, JUMLAH ORANG: 2 DEWASA, DURASI BERMAIN: 1 JAM 15 MENIT (DAPAT BERGANTIAN 1X DI DESTINASI TUJUAN), FOTO-VIDEO BY IPHONE 15 PROMAX, TIDAK TERMASUK DRONE', 75, 15, 'aktif', '2025-03-25 19:51:49', '2025-05-15 09:37:08'),
(4, 'Air Terjun Situmurun Trip', 4000000, 'JUMLAH UNIT: 1 JETSKI, JUMLAH ORANG: 2 DEWASA, DURASI BERMAIN: 2 JAM 15 MENIT (DAPAT BERGANTIAN 1X DI DESTINASI TUJUAN), FOTO-VIDEO BY IPHONE 15 PROMAX, TIDAK TERMASUK DRONE', 135, 15, 'aktif', '2025-03-25 21:43:58', '2025-05-15 09:44:32'),
(5, 'Sibea-bea Trip', 6000000, 'JUMLAH UNIT: 1 JETSKI, JUMLAH ORANG: 2 DEWASA, DURASI BERMAIN: 3 JAM (DAPAT BERGANTIAN 1X DI DESTINASI TUJUAN), FOTO-VIDEO BY IPHONE 15 PROMAX, TERMASUK DRONE', 180, 15, 'aktif', '2025-03-26 18:21:29', '2025-05-15 09:43:39'),
(6, 'PHOTO TRIP', 900000, 'JUMLAH UNIT : 1 JETSKI , JUMLAH ORANG : 2 DEWASA DAN 1 ANAK < 12 TAHUN, DURASI BERMAIN : 30 MENIT ,FOTO VIDEO BY IPHONE 15 PRO MAX, TIDAK TERMASUK DRONE', 30, 15, 'aktif', '2025-05-04 19:37:08', '2025-05-15 09:35:18'),
(7, 'PULAU HOLE TRIP', 1800000, 'JUMLAH UNIT 1 JETSKI, JUMLAH ORANG:2 DEWASA,DURAASI BERMAIN 1 JAM 10 MENIT,FOTO-VIDEO BY IPHONE 15 PROMAX,TIDAK TERMASUK DRONE', 70, 15, 'aktif', '2025-05-08 00:39:05', '2025-05-15 09:56:01'),
(8, 'FLYBOARD', 800000, 'JUMLAH UNIT: 1, JUMLAH ORANG: 1, DURASI BERMAIN: 7 MENIT BILA BERDUA DENGAN KAPTEN, 15 MENIT BILA SENDIRI, FREE VIDEO DRONE', 15, 15, 'aktif', '2025-05-08 00:53:24', '2025-05-15 09:47:22'),
(9, 'AIR TERJUN SITIRIS-TIRIS - DAIRI TRIP', 5000000, 'JUMLAH UNIT: 1 JETSKI, JUMLAH ORANG: 2 DEWASA, DURASI BERMAIN: 3 JAM (DAPAT BERGANTIAN 1X DI DESTINASI TUJUAN), FOTO-VIDEO BY IPHONE 15 PROMAX, TIDAK TERMASUK DRONE', 180, 15, 'aktif', '2025-05-15 09:48:50', '2025-05-15 09:48:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('pangeransilaen1414@gmail.com', '$2y$12$HhVcMfJWDle88zPFWruujeQ9sAHjKckAsd7xvuH8FEwi2durntq.C', '2025-04-09 23:24:44'),
('pangeransilaen1418@gmail.com', '$2y$12$U75D2U2mH/o/BHWUjL0jq.bcwoaslH0meb2/7ncpHJlQjqHRZV0LW', '2025-05-15 00:43:54'),
('pangeransilaen1419@gmail.com', '$2y$12$tXJVX1XrM3RQA1.72Uv1S.ZplR5nt3VpyDrGH/ntSN.ZCS7/m/e5q', '2025-04-10 00:12:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('CkBQbWLC6b1UppR93AskDUkQpMWUK7cSOwXWQysZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMzVVZmxiSEhKaDdSMkxtMVJGakZKalNFZWp3QkZrVllEdkQ5SnZuSCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1749114949),
('mMfAHoaNvTcOQQEz7Nxr9Dk9wZPLZqb2mSUpBEKJ', 49, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVzFHNXpOMzZKbjZGMzlicXQwcGg2eGVsV1hBMEVPVVJ5czZOd2ZjRSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvcGF5bWVudHMvbGF0ZXN0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDk7fQ==', 1749116029);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER',
  `status_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `roles`, `status_user`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(2, 'pangeran11', NULL, 'pangeransilaen1418@gmail.com', '2025-05-28 08:00:38', '$2y$12$M4nswKCkQAFONUf1pmgbZO/kDdQNMEVlhI/57uvhanesN0mIFJha6', 'SUPER_ADMIN', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-21 19:17:59', '2025-06-04 07:28:17'),
(3, 'Pangeran Silaen', '085265362246', 'pangeransilaen1417@gmail.com', NULL, 'pangeran', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'pangeran11', NULL, 'pangeransilaen1420@gmail.com', NULL, '$2y$10$fC6ga1MzejC4HU4nSLQE6OJL1ssX0nA0nMqCI9hF4PFJZhXNhBLZ.', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-16 18:48:11', '2025-03-16 18:48:11'),
(5, 'pangeran', NULL, 'pangeransilaen1414@gmail.com', NULL, '$2y$12$TRdV/53YbRqVOUT7ioNhKe1.MZKx8MOMV8LiAMJpRuji.QUI3D7/6', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-05 02:04:04', '2025-04-05 02:04:04'),
(6, 'david', NULL, 'david123@gmail.com', NULL, '$2y$12$7bC8fBamV8Nv.H/AmXu0veJ.b17NCA8mJsnco7n47pcI9kBmbAeoK', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-08 20:07:23', '2025-04-08 20:07:23'),
(7, 'eran', NULL, 'pangerasilaen1444@gmail.com', NULL, '$2y$12$VfublcZtfqvtUMppyqOSPOXa0D.j/e38k/cW.nkQ5U5EsaUmhviSu', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-09 23:06:27', '2025-04-09 23:06:27'),
(8, 'davidddd', NULL, 'david1234@gmail.com', NULL, '$2y$12$wO3hjeBWKNrpI3DmKlyMw.Etir/Y/CeNrYzLE.AfaKnY3TPfEHOpq', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-09 23:09:36', '2025-04-09 23:09:36'),
(9, 'david12345', '0852222222', 'david12345@gmail.com', NULL, '$2y$12$fhp5q3PL71W5hCZA3/l5t.unjEaWM4.M1S0pNJ9Q4Ck2NcmfGdGUi', 'ADMIN', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-09 23:16:05', '2025-06-04 09:29:43'),
(10, 'pangerankece', '08152119231281', 'pangeransilaen1112@gmail.com', NULL, '$2y$12$351V7vudxE77rgQ.G5oGo.EgH0Z0vvLCddO46EzdZxceMNdys2VH6', 'ADMIN', 'aktif', NULL, NULL, NULL, 'hwvgYFVxXxjrFxjdRRwQskmirXsy8EBvcQzqx1aIGDBYFe4mTCmBCiNBXEuY', NULL, NULL, '2025-04-10 00:13:28', '2025-06-04 09:51:22'),
(11, 'IRENE SITUMORANG', '+6282162717323', 'irenemutiara17@gmail.com', NULL, '$2y$12$49MJ9douNyc4SSZJJH0qduicGSU/0rWdzhx1wM86GDPo6xq0uuvDe', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-15 18:28:31', '2025-04-15 18:28:31'),
(12, 'melva', '+6281373026325', 'melvamanik789@gmail.com', NULL, '$2y$12$piF5KcXjGyFCkFeYHvVpoORTGJmpwvoE5a3D6gWn7LbueAQR6WTj.', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-15 18:39:08', '2025-04-15 18:39:08'),
(13, 'David Kristian j Silalahi', '+6282276588347', 'davidksilalahi@gmail.com', NULL, '$2y$12$1in6fTK1imE0KZXaN/I1C.XSZmuIbDibd5aeWsJw0DtAterFVItOS', 'USER', 'aktif', NULL, NULL, NULL, 'df8sCsdlSQuoPvvIWnmIZ4TZxfqGBHYQHkbfLeIqeh7LE1cnCegEDOgWfieC', NULL, NULL, '2025-04-15 18:41:41', '2025-05-15 01:00:46'),
(14, 'Davidsilalahi', '08127381897317', 'david123456@gmail.com', NULL, '$2y$12$7AzdewGiIVlHALvJteLQlu.57wNmkZdIcx7bK1ikDcwbjNMo5/YO.', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-24 21:28:31', '2025-04-24 21:28:31'),
(15, 'Pangeran Silaen', '085763189029', 'pangeransilaen1444@gmail.com', NULL, '$2y$12$ZTblQMqPh3M9gHNQCwbGz.8qmn2cWn2e/PoWYtmk5Y40nHKwu9PgO', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-30 01:50:08', '2025-04-30 01:50:08'),
(16, 'PANGERAN SILAEN', '082162717323', 'pangeran1000@gmail.com', NULL, '$2y$12$7f9Zma/FWzprtDoBdGqIOehP6thr2eziOOwA2UJ/olG6wzRt4T/Uu', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-30 02:13:49', '2025-04-30 02:13:49'),
(17, 'IRENE SITUMORANG', '+6282162717323', 'irenemutiara13@gmail.com', NULL, '$2y$12$CXI/CHpZkRwT3zoMgvlyFeNNEg8vi.xuvp8Sb6e9prdPBu4DFeeKG', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-05 21:36:25', '2025-05-05 21:36:25'),
(18, 'melvamanik', '08137302738', 'melvamanik@gmail.com', NULL, '$2y$12$1RvnmFSilEIOZHehuTcPVe5kF9qTRxC9Y0xHBDtH0niOnqfuKtkni', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-05 21:40:38', '2025-05-05 21:40:38'),
(19, 'Steven Samosir', '+6282360745174', 'stevenlukas990@gmail.com', NULL, '$2y$12$msXO2MQi5AsOVHWh02fbxuno7oa9HKLetyT3XT5pi/WWDYnqFqYoa', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-06 01:10:24', '2025-05-06 01:10:24'),
(20, 'David Kristian Silalahi', '+6282276588347', 'ayamijo343@gmail.com', NULL, '$2y$12$n/EdJLhVmdOLpjihCzcasebXPWgDtXV7bUWkxcxHIZ9fwBxdE0n0e', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-06 05:59:21', '2025-05-06 05:59:21'),
(21, 'Gladys', '0813-7525-2216', 'gladys@gmail.com', NULL, '$2y$12$CkTm9EYvmb7upFA6uz4bd.QsqddNG/JSuchXqt7vEBA6dSTZSayba', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-07 21:42:38', '2025-05-07 21:42:38'),
(22, 'Otto manik', '085362682652', 'ottomanik9@gmail.com', NULL, '$2y$12$wMm/aPZJ.M4pKWDP8c6VkuafhTdTG8zqPC1LRq06eyjVwnQNERA.y', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-07 23:04:00', '2025-05-07 23:04:00'),
(23, 'melva', '082635282', 'melvamanik7@gmail.com', NULL, '$2y$12$MHvhX5lbXSfoY/FOFHfIMutl38OecPHzMC2Y1JchP2gdBA4I5S18a', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-07 23:10:11', '2025-05-07 23:10:11'),
(24, 'Jane', '081383141916', 'monicdmj@gmail.com', NULL, '$2y$12$2d4HE3kYIYkMhmIobKwKYegpm695dRXVGFKd.MPYFXYVSaUYm6xnO', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-07 23:10:56', '2025-05-07 23:10:56'),
(25, 'Winda Pane', '+6282115830013', 'sitorusw46@gmail.com', NULL, '$2y$12$iEePVQv9P0gWkJK6AvrQc.oMRY9zMLLsCvX2/AwNZ7sqrKXwo5e16', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-07 23:19:26', '2025-05-07 23:19:26'),
(26, 'Avoan Greace Stepany Nababan', '081389973280', 'avoannababan2005@gmail.com', NULL, '$2y$12$TaR/1.bC09cYYwv9cOIhGuDY7/wGsPbuPIN4Urx0GJGD.oHNAqatC', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-07 23:20:23', '2025-05-07 23:20:23'),
(27, 'Inoru', '085837428013', 'inorutuyta@gmail.com', NULL, '$2y$12$5S7Zgvs4ybAGxQcbR/nyhu01B3wGDIqrPLfnnkw6MNJ7B0oNF2bxq', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-07 23:22:26', '2025-05-07 23:22:26'),
(28, 'Hanna', '081375678332', 'hm61069@gmail.com', NULL, '$2y$12$1p.Dz741.nUmNREckJ6MNusm2e2N414HfXIPeOzo/C6reTmGgig6e', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-07 23:27:14', '2025-05-07 23:27:14'),
(29, 'Astrit', '082268004495', 'selvyonaastrit270606@gmail.com', NULL, '$2y$12$FE14ZdaIV5raRP3qHkoYSOpt9dr9iH7IeVIeSsPDoQdzmIH3J33VW', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-07 23:28:07', '2025-05-07 23:28:07'),
(30, 'Christy Natalia Siallagan', '082168554940', 'christynatalia44420@gmail.com', NULL, '$2y$12$feoyTpKus5aylbuhnT8eAO4JYgpAX6hBeOZzawSM.dqHHnWZXOwCq', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-07 23:46:05', '2025-05-07 23:46:05'),
(31, 'Arga', '085792112111', 'jongguranarga@gmail.com', NULL, '$2y$12$iXRi9JAD.BgE5wKXR6Y1G.J1P3aLbkndCHzioDzc3PFC5D7TpO4Iq', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-08 00:13:01', '2025-05-08 00:13:01'),
(32, 'Samosir seado', '081362384536', 'samosirmargana921@gmail.com', NULL, '$2y$12$a2c//sax2fkBK02pLPJY3euwy1oqramV2ovVXVOvhOuDcIi8Ft6hW', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-08 00:37:15', '2025-05-08 00:37:15'),
(33, 'Dimas Sidabutar', '082385345239', 'sidabutardimas935@gmail.com', NULL, '$2y$12$f/5WdH/WV0BYFRTzRVREZey9d2Q8eXoDgefHQUVsefqb90dggFOx2', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-08 00:37:34', '2025-05-08 00:37:34'),
(34, 'JANRITUA MANIK', '085277166420', 'manikjandri@gmail.com', NULL, '$2y$12$K8QOPu04sTp/p56B3QbIk.o1oJZ7V9FJriciiMsJUUITzYHtZUHH6', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-08 00:42:08', '2025-05-08 00:42:08'),
(35, 'grace imut', '0895611222206', 'grace.angell2805@gmail.com', NULL, '$2y$12$yuQbMMQjf4IWUmF8.BIktO497IzTEot7ygYlGQC8TNCxkwClzsuZ.', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-08 00:45:36', '2025-05-08 00:45:36'),
(36, 'Tino Silaban', '082274980601', 'srelinton@gmail.com', NULL, '$2y$12$iwuGohEtAAE.4Dr/KnyKiuWXguVt2PiZCUu7YRaXu32CYkg/8XrT.', 'USER', 'aktif', NULL, NULL, NULL, '97WJxKhwB4BHsiPuindiE7UTySeR23RtaIa0doRtrnkYH7MMxxpmZ0YigeSY', NULL, NULL, '2025-05-08 01:06:24', '2025-05-08 01:06:24'),
(37, 'Ambar jr', '081268735946', 'aldifetricsambarita@gmail.com', NULL, '$2y$12$s7GgckvMEQo1O/dHMhDWyO8u75of.mv84NF7DtDr6p7uy7BeNtaKO', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-08 01:24:36', '2025-05-08 01:24:36'),
(38, 'Esthefany Sipahutar', '081282523709', 'esthefany@gmail.com', NULL, '$2y$12$w1xN2DuE8.RcJkBU1JGyNOIn6RmWaVruzJsuiGalQi026cJW.BE3G', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-10 02:46:37', '2025-05-10 05:39:00'),
(39, 'dadaadada', '08982981098398', 'sadadasdaa@gmail.com', NULL, '$2y$12$svnXsQXFJC0MWto0A0bfP.tpKHcLbtQN0zKlzgse44sQfFENy9baG', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-14 16:02:10', '2025-05-14 16:02:10'),
(40, 'sadadaasda', '082938109830193', 'sadaaad@gmail.com', NULL, '$2y$12$G2FU1tPGtXihFPNoywkj/ODDTNnVF8du.6a30jCcXnmLgbplhr5sa', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-14 16:18:22', '2025-05-14 16:18:22'),
(41, 'frans', '81282523709', 'frans@gmail.com', NULL, '$2y$12$lIa.Cs4w9R/fehIt5.xSW.uRm5JCaUQWGEECYLpDpuDTLfEHGZ7N6', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-14 18:16:54', '2025-05-14 18:16:54'),
(42, 'daasdkal', '85763189029', 'sadsaad@gmail.com', NULL, '$2y$12$iT6nWa.Comg7tu01NNHgRul2eT4FQpg.FOtoI.C5OzQFg/XFEP7bC', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-14 19:07:56', '2025-05-14 19:07:56'),
(43, 'papdpapa', '0857310921831', 'ssada@gmail.com', NULL, '$2y$12$deEEZMIA4GO5u.mBfFMn1.ma9XWFIRYA3LSYqR12YyOw/CCfq92EK', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-15 06:41:20', '2025-05-15 06:41:20'),
(44, 'adsdhadiusajdaj', '081923173191', 'pangeransilaen1425@gmail.com', NULL, '$2y$12$Pv5HXFpRzasXaXru08fDeuAJUjt5/hczbrlq1dQcOHNQrqvZXvubG', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-15 07:17:36', '2025-05-15 07:17:36'),
(45, 'Benyamin Sibarani', '081360344859', 'benyaminsibarani2406@gmail.com', NULL, '$2y$12$.KeJKFnEDxfmXTIy4sPu8.Ilz/qLKpzwuf12c6SZ6n6P/hKEqv0pi', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-26 14:02:51', '2025-05-26 14:02:51'),
(46, 'Pangeran Silaen', '08227658834', 'pangeransilaen@gmail.com', NULL, '$2y$12$vpNBDTcyTmEfa6JuV1IBx.ohbWCAXYX0PSqumWiBzs5WpMgIrxQ4a', 'USER', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-27 07:18:22', '2025-05-27 07:18:22'),
(49, 'Pangeran TRPL2', '090853853853', 'pangeransilaen906@gmail.com', '2025-05-28 08:09:20', '$2y$12$tfhy3CnVAm8DFtt5ngjmgO3XIsOtkUn0FCKzoPeM94KeiXzcB8uVS', 'USER', 'aktif', NULL, NULL, NULL, 'nl3S7xNAIktDFLl1oIcDDiJ9ZOgyKzwoxLPuemKVZa3pUifb62yVY92z9NFL', NULL, NULL, '2025-05-28 08:08:39', '2025-06-05 09:16:39'),
(50, 'steven samosir', '082360745174', 'stevenlukas999@gmail.com', NULL, '$2y$12$JmtO28bReJ.lMPRwGGCBXOh4rs2/LENn7YdefTAlomc03xdI.av4C', 'SUPER_ADMIN', 'aktif', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-03 01:45:14', '2025-06-03 01:45:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_berita`
--

CREATE TABLE `user_berita` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `berita_id` bigint UNSIGNED NOT NULL,
  `dibaca` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_berita`
--

INSERT INTO `user_berita` (`id`, `user_id`, `berita_id`, `dibaca`, `created_at`, `updated_at`) VALUES
(1, 38, 1, 1, '2025-05-13 03:14:48', '2025-05-13 03:14:54'),
(2, 13, 1, 1, '2025-05-13 03:38:25', '2025-05-13 03:38:26'),
(3, 19, 1, 1, '2025-05-13 03:39:11', '2025-05-13 03:39:12'),
(4, 45, 1, 1, '2025-05-26 14:03:28', '2025-05-26 14:03:30'),
(5, 46, 1, 1, '2025-05-27 07:18:42', '2025-05-27 07:18:56'),
(6, 49, 1, 1, '2025-06-03 02:47:35', '2025-06-03 02:47:40');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `berita_slug_unique` (`slug`);

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_users_id_foreign` (`users_id`),
  ADD KEY `fk_detail_paket` (`detail_paket_id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `detail_paket`
--
ALTER TABLE `detail_paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_paket_paket_jetski` (`paket_jetski_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_pilihpakets_id_foreign` (`pilihpakets_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `otp_verifications`
--
ALTER TABLE `otp_verifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `otp_verifications_email_index` (`email`);

--
-- Indeks untuk tabel `paket_jetski`
--
ALTER TABLE `paket_jetski`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_berita`
--
ALTER TABLE `user_berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_berita_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `detail_paket`
--
ALTER TABLE `detail_paket`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `otp_verifications`
--
ALTER TABLE `otp_verifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `paket_jetski`
--
ALTER TABLE `paket_jetski`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `user_berita`
--
ALTER TABLE `user_berita`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_detail_paket` FOREIGN KEY (`detail_paket_id`) REFERENCES `detail_paket` (`id`);

--
-- Ketidakleluasaan untuk tabel `detail_paket`
--
ALTER TABLE `detail_paket`
  ADD CONSTRAINT `fk_detail_paket_paket_jetski` FOREIGN KEY (`paket_jetski_id`) REFERENCES `paket_jetski` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_pilihpakets_id_foreign` FOREIGN KEY (`pilihpakets_id`) REFERENCES `paket_jetski` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_berita`
--
ALTER TABLE `user_berita`
  ADD CONSTRAINT `user_berita_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
