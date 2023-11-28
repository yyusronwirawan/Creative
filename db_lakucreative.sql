-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 28 Nov 2023 pada 13.59
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
-- Database: `db_lakucreative`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, '<h3 class=\"rhpdm\">MENS ORIGINAL SPORT &amp; FASHION</h3>\r\n<p>Shopee : BRANDEDDTERMURAH<br />WA : 0812 8698 8388 (NO CALL)<br />LINE :&nbsp;<a class=\"notranslate\" href=\"https://www.instagram.com/brandedtermurah/\">@brandedtermurah</a>&nbsp;(use &ldquo;@&ldquo;)<br />Cek RESI (IG) :&nbsp;<a class=\"notranslate\" href=\"https://www.instagram.com/resi.testi.branded/\">@resi.testi.branded</a><br />Fast Response &darr; &darr;<a class=\"yLUwa\" href=\"https://l.instagram.com/?u=http%3A%2F%2Fgoo.gl%2Fzh3vuy&amp;e=ATOP5DoGHm1nh1wdaZ6z6e1Dsc-5-LMRZkTibwTWgcGMXC4SqmkCdOzEyrvhHPUeLzEwUmrza8ZIJ9c&amp;s=1\" target=\"_blank\" rel=\"me nofollow noopener noreferrer\">goo.gl/zh3vuy</a></p>\r\n<p>&nbsp;</p>\r\n<p>Contoh About</p>', NULL, '2019-12-17 00:38:26', '2020-02-13 11:27:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `status` int(11) NOT NULL,
  `last_login` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `status`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'admin@branded.com', 'e71460b8d5045ab1f1932a6a37c9b3c5', 'admin@branded.com', 1, '2023-11-28 15:54:38', NULL, '2023-11-28 08:54:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_color`
--

CREATE TABLE `admin_color` (
  `id` int(11) NOT NULL,
  `header` varchar(191) DEFAULT NULL,
  `sidebar` varchar(191) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `admin_color`
--

INSERT INTO `admin_color` (`id`, `header`, `sidebar`, `created_at`, `updated_at`) VALUES
(1, '#ffffff', '#2cb7a6', '2020-10-21 14:32:39', '2020-10-21 14:55:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id`, `bank`, `image`, `created_at`, `updated_at`, `deleted_at`, `slug`, `sort`) VALUES
(1, 'BCA', 'bca.png', '2020-10-14 04:25:42', '2020-10-16 08:47:35', NULL, 'bca', 1),
(2, 'MANDIRI', 'mandiri.png', '2020-10-16 08:47:50', '2020-10-16 08:47:50', NULL, 'mandiri', 2),
(3, 'sadsa', 'sadsa.png', '2020-10-21 06:47:03', '2020-10-21 06:47:06', '2020-10-21 06:47:06', 'sadsa', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `link` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cara_kerja`
--

CREATE TABLE `cara_kerja` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `link` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cara_kerja`
--

INSERT INTO `cara_kerja` (`id`, `title`, `image`, `status`, `link`, `description`, `created_at`, `updated_at`, `deleted_at`, `sort`, `slug`) VALUES
(1, 'KONFIRMASI', 'konfirmasi.png', 1, NULL, '<p>Order Anda dan isi form order yang kami berikan</p>', '2020-10-14 04:24:55', '2020-10-16 08:28:52', NULL, 2, 'konfirmasi'),
(2, 'KONSULTASI', 'konsultasi.png', 1, NULL, '<p>Melalui Whatsapp dengan Konsultan brand yang berpengalaman menangani berbagai macam brand dan produk</p>', '2020-10-14 04:25:10', '2020-10-16 08:28:13', NULL, 1, 'konsultasi'),
(3, 'BAYAR', 'bayar.png', 1, NULL, '<p>Pesanan Anda disesuaikan dengan totalan kami agar pesanan Anda segera kami proses</p>', '2020-10-16 08:29:16', '2020-10-16 08:29:16', NULL, 3, 'bayar'),
(4, 'DRAFT', 'draft.png', 1, NULL, '<p>Akan kami kirimkan untuk Anda periksa dan daftar revisi yang diperlukan sesuai dengan ketentuan dari kami</p>', '2020-10-16 08:29:45', '2020-10-16 08:29:45', NULL, 4, 'draft'),
(5, 'FILE', 'file.png', 1, NULL, '<p>yang sudah final akan dikirim melalui email / link G-drive dan siap untuk digunakan</p>', '2020-10-16 08:30:07', '2020-10-16 08:30:07', NULL, 5, 'file');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `company_data`
--

CREATE TABLE `company_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(191) DEFAULT NULL,
  `instagram` varchar(191) DEFAULT NULL,
  `pinterest` varchar(191) DEFAULT NULL,
  `bridestory` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `line` varchar(191) DEFAULT NULL,
  `whatsapp` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `hours` varchar(191) DEFAULT NULL,
  `telephone` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `company_data`
--

INSERT INTO `company_data` (`id`, `facebook`, `instagram`, `pinterest`, `bridestory`, `email`, `line`, `whatsapp`, `address`, `hours`, `telephone`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, 'support@lakucreative.com', NULL, '+6282111157461', '', '', '', '2019-12-17 20:06:31', '2020-10-16 10:27:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) DEFAULT NULL,
  `last_name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id`, `first_name`, `last_name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(10, 'stev', 'stev', 'stev3nlee@yahoo.com', '7575756', 'test', '2020-07-24 09:38:30', '2020-07-24 09:38:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `design`
--

CREATE TABLE `design` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `design`
--

INSERT INTO `design` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`, `sort`) VALUES
(2, 'Social Media', 'social-media', '<ul class=\"l-desain\">\r\n<li>Feed Instagram</li>\r\n<li>Feed Facebook</li>\r\n<li>Banner Website</li>\r\n<li>Banner Marketplace</li>\r\n</ul>', 1, '2020-10-15 04:16:31', '2020-10-16 08:59:58', NULL, 1),
(3, 'Kemasan', 'kemasan', '<ul class=\"l-desain\">\r\n<li>Box</li>\r\n<li>Label</li>\r\n<li>Sachet</li>\r\n<li>Pouch</li>\r\n</ul>', 1, '2020-10-15 04:16:40', '2021-02-18 03:34:03', NULL, 2),
(4, 'Marketing Kit', 'marketing-kit', '<ul class=\"l-desain\">\r\n<li>Banner</li>\r\n<li>Brosur</li>\r\n<li>Flyer</li>\r\n<li>Poster</li>\r\n</ul>', 1, '2020-10-16 09:01:53', '2020-10-16 09:01:53', NULL, 3),
(5, 'Branding Items', 'branding-items', '<ul class=\"l-desain\">\r\n<li>Logotype</li>\r\n<li>Logograf</li>\r\n<li>Mascott</li>\r\n<li>Merchandise</li>\r\n</ul>', 1, '2020-10-16 09:02:41', '2021-02-18 03:39:31', NULL, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `design_image`
--

CREATE TABLE `design_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `design_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `design_image`
--

INSERT INTO `design_image` (`id`, `design_id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, '89b732bc2598f571dd6eafb2cad5ed4c.png', '2020-10-15 04:15:18', '2021-05-31 07:15:33', NULL),
(2, 2, '2d23e50e4449f0d73394362706222be7.png', '2020-10-15 04:15:19', '2021-05-31 07:15:33', NULL),
(3, 2, '323bb665a4a4b5978873ebf5d63f6069.png', '2020-10-15 04:16:19', '2020-10-15 04:16:23', '2020-10-15 04:16:23'),
(4, 3, '3001e5c64c1a7d5091986c34600dd463.png', '2020-10-15 04:16:40', '2021-02-17 03:53:59', NULL),
(5, 2, '8fed2927644c05125fb7791cd08339f2.png', '2020-10-16 08:59:58', '2021-05-31 07:15:33', NULL),
(6, 2, '5ece12820d6fba25976b9343ecdba1ef.png', '2020-10-16 08:59:58', '2021-05-31 07:15:36', NULL),
(7, 3, 'e7addd11f2a21b7cc11366d5879d6a7c.png', '2020-10-16 09:00:37', '2021-02-18 03:33:04', NULL),
(8, 3, '07ad1e574c4443242a4a6416ad006f3c.png', '2020-10-16 09:00:37', '2021-02-17 03:53:59', '2021-02-17 03:53:59'),
(9, 3, '36fae0b4cc876d2facd7d19e0a551360.png', '2020-10-16 09:00:37', '2021-02-17 03:53:59', '2021-02-17 03:53:59'),
(10, 4, 'f09434106885ed436c66e6caf2997332.png', '2020-10-16 09:01:53', '2021-05-31 07:19:07', NULL),
(11, 4, 'c8f2eee053f90725b4fbe77fb1a424ec.png', '2020-10-16 09:01:53', '2021-02-17 03:54:45', '2021-02-17 03:54:45'),
(12, 4, '3fc3e3ac998f40e1ef3217b7f8b7290d.png', '2020-10-16 09:01:53', '2021-02-17 03:54:45', '2021-02-17 03:54:45'),
(13, 4, 'd37d9bcc52d85b7bf49a08d8c1e2cab4.png', '2020-10-16 09:01:53', '2021-02-17 03:54:45', '2021-02-17 03:54:45'),
(14, 5, 'ee446185abe869acd4ce72caed43a1e8.png', '2020-10-16 09:02:41', '2021-02-17 03:55:17', '2021-02-17 03:55:17'),
(15, 5, '63c0a4961ba1ae7d65e819343f939b0f.png', '2020-10-16 09:02:41', '2021-02-17 03:55:17', '2021-02-17 03:55:17'),
(16, 5, '87ceaf9d23b430a07a83142672638428.png', '2020-10-16 09:02:41', '2021-02-17 03:55:17', '2021-02-17 03:55:17'),
(17, 5, '688f63791671d4816d44df01b29b05d7.png', '2020-10-16 09:02:41', '2021-02-17 03:55:17', '2021-02-17 03:55:17'),
(18, 2, '55b93d43228535d37a5c270b8d9de5e5.png', '2021-02-17 03:53:12', '2021-02-18 02:58:51', '2021-02-18 02:58:51'),
(19, 3, 'dda3747bc4efe531db1b883d98ba8ba3.png', '2021-02-18 03:33:04', '2021-02-18 03:33:04', NULL),
(20, 3, 'ffbc6a228467381389de3a2f028fa605.png', '2021-02-18 03:34:03', '2021-04-29 08:49:11', NULL),
(21, 5, '622f8cb3e620c7c1d700d4eb0786fcb5.png', '2021-02-18 03:38:34', '2021-05-31 07:21:22', NULL),
(22, 5, 'a708ad388b23434dc1d85f92b592bb7d.png', '2021-02-18 03:38:34', '2021-05-31 07:21:22', NULL),
(23, 5, '8b5d35ba206bd9dff2a9cfa6aa0c7a62.png', '2021-02-18 03:38:34', '2021-04-29 08:46:57', NULL),
(24, 5, '90108f9fd7992323167f66f4c5a2e472.png', '2021-02-18 03:38:34', '2021-03-24 04:23:01', NULL),
(25, 4, '74b4d87365f74e636b87195322144d8e.png', '2021-02-18 03:56:51', '2021-05-31 07:19:07', NULL),
(26, 4, 'f36752ba14eb860b36798f04bf4289e2.png', '2021-02-18 03:56:51', '2021-05-31 07:19:42', NULL),
(27, 4, 'bcbe63758d43de1744519eb7cb58b6a7.png', '2021-02-18 03:56:51', '2021-05-31 07:20:21', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '<p>sad11</p>', '<p>dsad11</p>', '2020-02-06 02:50:07', '2020-01-05 20:17:14', '2020-02-06 02:50:07'),
(2, '<p>What are the questions for this?</p>', '<p>These are the answers for you to read</p>', NULL, '2020-02-06 02:50:23', '2020-02-12 03:24:04'),
(3, '<p>What are the questions again for this?</p>', '<p>This is the answers for you to read again</p>', NULL, '2020-02-06 06:05:58', '2020-02-06 06:05:58'),
(4, '<p>Are curved to on a for body for posters serif italics oblique, ligature double-loop swash tail Q of tilde?</p>', '<p>Typesetting the sorts ordered to a according be could works gained not prior the stored significant it for types physical glyphs and in systems systems digital on and orthography that authorship works of easily more era letterpress by hand sorts words then then lines. Flong papier mache stereotyping Paris plaster of or type of niche electrotype is a it however. Artisanal for a revival however is it printing fallen out use and of revival a as an hot typesetting \"set\", or width.</p>', NULL, '2020-02-10 04:43:40', '2020-02-10 04:43:40'),
(5, '<p>123</p>', '<p>123</p>', '2020-02-12 03:23:38', '2020-02-12 03:23:33', '2020-02-12 03:23:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungi_kami`
--

CREATE TABLE `hubungi_kami` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesan_link` text DEFAULT NULL,
  `pesan_image` varchar(191) DEFAULT NULL,
  `chat_link` text DEFAULT NULL,
  `chat_image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hubungi_kami`
--

INSERT INTO `hubungi_kami` (`id`, `pesan_link`, `pesan_image`, `chat_link`, `chat_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'https://linktr.ee/FormLakuCreative', 'a46119f4e5c027c0e267f122a41454ff.png', 'https://linktr.ee/LakuCreative', 'c21fec40923446546eb6f8b2de862cbd.png', '2020-10-15 05:37:12', '2021-01-11 12:29:41', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `logo`
--

CREATE TABLE `logo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `logo`
--

INSERT INTO `logo` (`id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'logo.png', NULL, '2020-10-19 06:54:05', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mengapa`
--

CREATE TABLE `mengapa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mengapa`
--

INSERT INTO `mengapa` (`id`, `title`, `image`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mengapa memilih Lakucreative?', 'mengapa_1723469135.png', '<div>Sudah, Jasa Marketing Memang Berat,</div>\r\n<div><span class=\"blue\">Kamu</span>&nbsp;Engga Akan Kuat.</div>\r\n<div>Biar&nbsp;<span class=\"blue\">LakuCreative</span>&nbsp;Aja~</div>', '2020-10-26 15:32:27', '2020-10-27 05:19:04', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `menu`, `slug`, `link`, `created_at`, `updated_at`, `deleted_at`, `sort`) VALUES
(1, 'Beranda', 'beranda', 'http://lakucreative.com/public', NULL, '2020-10-24 13:50:19', NULL, 1),
(2, 'Tentang Kami', 'tentang-kami', 'http://lakucreative.com/public/#tentang-kami', NULL, '2020-10-24 13:50:25', NULL, 2),
(3, 'Jasa Desain', 'jasa-desain', 'http://lakucreative.com/public/#desain', NULL, '2020-10-24 13:50:30', NULL, 3),
(4, 'Cara Pemesanan', 'cara-pemesanan', 'http://lakucreative.com/public/#cara-pemesanan', NULL, '2020-10-24 13:50:36', NULL, 4),
(5, 'Testimoni', 'testimoni', 'http://lakucreative.com/public/#testimonial', NULL, '2020-10-24 13:50:44', NULL, 5),
(6, 'Hubungi Kami', 'hubungi-kami', 'http://lakucreative.com/public/#hubungi-kami', NULL, '2020-10-24 13:50:50', NULL, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `metadata`
--

CREATE TABLE `metadata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `keyword` text DEFAULT NULL,
  `h1` varchar(191) DEFAULT NULL,
  `page` varchar(191) DEFAULT NULL,
  `link` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `metadata`
--

INSERT INTO `metadata` (`id`, `title`, `description`, `keyword`, `h1`, `page`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Lakucreative', 'Jasa desain Jasa desain grafis', 'Jasa desain, Jasa desain grafis, jasa desain feed, jasa desain kemasan, jasa desain feed instagram', NULL, 'Homepage', 'http://lakucreative.com/public', '2020-02-13 05:27:25', '2020-10-26 09:43:01'),
(2, 'Lakucreative - Tentang Kami', 'Jasa desain Jasa desain grafis', 'Jasa design, Jasa design grafis, jasa design feed, jasa design kemasan, jasa design feed instagram', NULL, 'Tentang Kami', 'http://lakucreative.com/public/tentang-kami', '2020-10-19 05:20:26', '2020-10-26 09:43:30');

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
(3, '2019_08_16_132348_create_admin', 2),
(4, '2019_09_12_123817_create_banner_table', 3),
(5, '2019_11_28_041803_create_category_table', 3),
(6, '2019_11_28_041809_create_sub_category_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `social_media`
--

INSERT INTO `social_media` (`id`, `name`, `image`, `created_at`, `updated_at`, `deleted_at`, `slug`, `sort`, `link`) VALUES
(1, 'sads', 'sads.png', '2020-10-14 04:54:54', '2020-10-16 10:29:23', '2020-10-16 10:29:23', 'sads', 2, 'dasdsadas2312312'),
(2, '@lakucreative', 'instagram.png', '2020-10-14 04:55:08', '2020-10-21 06:59:18', NULL, 'at-lakucreative', 1, 'https://www.instagram.com/lakucreative'),
(3, '@lakucreative', 'at-lakucreative-1.png', '2020-10-27 08:37:38', '2020-10-27 08:37:38', NULL, 'at-lakucreative-1', 2, 'https://www.tiktok.com/@lakucreative');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_category`
--

CREATE TABLE `sub_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang_kami`
--

CREATE TABLE `tentang_kami` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `link` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tentang_kami`
--

INSERT INTO `tentang_kami` (`id`, `title`, `image`, `status`, `link`, `description`, `created_at`, `updated_at`, `deleted_at`, `sort`, `slug`) VALUES
(1, 'Lakucreative adalah...', 'lakucreative-adalah.png', 1, NULL, '<p class=\"mb10\">Layanan multijasa yang menyediakan&nbsp;<span class=\"blue\">layanan design marketing, branding consulting, branding concepting,</span>&nbsp;serta&nbsp;<span class=\"blue\">content</span>&nbsp;creating untuk menarik daya beli customer Anda sesuai dengan desire dan interest mereka serta menguatkan potensi dari nilai brand yang Anda miliki untuk mendapatkan posisi top of mind dari pasar bisnis Anda.</p>\r\n<p>LakuCreative memiliki visi dan misi untuk membantu perusahaan serta UKM di Indonesia seperti Anda agar nilai brand lebih dikenal oleh para customer dan mendapatkan customer loyalty tertinggi yaitu&nbsp;<span class=\"blue\">Level Advocate</span>. Kami bertujuan untuk menarik para customer Anda agar dapat menjadi sebuah kelompok customer advocate yang akan berjuang bersama perusahaan Anda.</p>', '2020-10-19 05:02:06', '2020-10-26 13:20:28', '2020-10-26 13:20:28', 1, 'lakucreative-adalah'),
(2, 'Customer Advocate adalah...', 'customer-advocate-adalah.png', 1, NULL, '<p>Customer setia&nbsp;<span class=\"blue\">( loyal customer )</span>&nbsp;yang fanatik menggunakan produk/ jasa perusahaan Anda dan mereka mau berbagi cerita baik tentang perusahaan Anda. Kelompok ini juga secara spontan akan membela perusahaan Anda karena inisiatif / keinginannya sendiri. Semakin banyak customer advocate yang tercipta, maka perusahaan Anda akan memenangkan persaingan dan menjadi juara di hati customer.</p>', '2020-10-19 05:04:30', '2020-10-26 14:05:13', NULL, 3, 'customer-advocate-adalah'),
(3, 'Pentingnya Nilai Brand Kamu bagi Lakucreative itu...', 'pentingnya-nilai-brand-kamu-bagi-lakucreative-itu.png', 1, NULL, '<p>LakuCreative sangat mengerti bahwa brand Anda pasti memiliki keunikan dan potensi tersendiri. Makna, cita &ndash; cita, atau asa yang diciptakan oleh sang pemiliki brand, kami jadikan sebuah nilai tambah yang perlu untuk terus diperbarui dan dikenali oleh para customer dari brand Anda. Dengan menonjolkan nilai tambah tersebut, maka loyalitas dari customer akan dapat tercapai.</p>', '2020-10-19 05:04:48', '2020-10-26 14:05:13', NULL, 4, 'pentingnya-nilai-brand-kamu-bagi-lakucreative-itu'),
(4, 'Lakucreative itu bagaimana?', 'lakucreative-itu-bagaimana.png', 1, NULL, '<p>sdadasda</p>', '2020-10-26 13:19:11', '2020-10-26 13:20:24', '2020-10-26 13:20:24', 4, 'lakucreative-itu-bagaimana'),
(5, 'Lakucreative adalah..', 'lakucreative-adalah-1.png', 1, NULL, '<p class=\"mb10\">Layanan multijasa yang menyediakan&nbsp;<span class=\"blue\">layanan design marketing, branding consulting, branding concepting,</span>&nbsp;serta&nbsp;<span class=\"blue\">content</span>&nbsp;creating untuk menarik daya beli customer Anda sesuai dengan desire dan interest mereka serta menguatkan potensi dari nilai brand yang Anda miliki untuk mendapatkan posisi top of mind dari pasar bisnis Anda.</p>\r\n<p>LakuCreative memiliki visi dan misi untuk membantu perusahaan serta UKM di Indonesia seperti Anda agar nilai brand lebih dikenal oleh para customer dan mendapatkan customer loyalty tertinggi yaitu&nbsp;<span class=\"blue\">Level Advocate</span>. Kami bertujuan untuk menarik para customer Anda agar dapat menjadi sebuah kelompok customer advocate yang akan berjuang bersama perusahaan Anda.</p>', '2020-10-26 13:22:45', '2020-10-26 14:05:18', '2020-10-26 14:05:18', 1, 'lakucreative-adalah-1'),
(6, 'Lakucreative adalah....', 'lakucreative-adalah-2.png', 1, NULL, '<p class=\"mb10\">Layanan multijasa yang menyediakan&nbsp;<span class=\"blue\">layanan design marketing, branding consulting, branding concepting,</span>&nbsp;serta&nbsp;<span class=\"blue\">content</span>&nbsp;creating untuk menarik daya beli customer Anda sesuai dengan desire dan interest mereka serta menguatkan potensi dari nilai brand yang Anda miliki untuk mendapatkan posisi top of mind dari pasar bisnis Anda.</p>\r\n<p>LakuCreative memiliki visi dan misi untuk membantu perusahaan serta UKM di Indonesia seperti Anda agar nilai brand lebih dikenal oleh para customer dan mendapatkan customer loyalty tertinggi yaitu&nbsp;<span class=\"blue\">Level Advocate</span>. Kami bertujuan untuk menarik para customer Anda agar dapat menjadi sebuah kelompok customer advocate yang akan berjuang bersama perusahaan Anda.</p>', '2020-10-26 14:05:05', '2020-10-26 14:05:13', NULL, 2, 'lakucreative-adalah-2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `terms` text DEFAULT NULL,
  `privacy_policy` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `terms`
--

INSERT INTO `terms` (`id`, `terms`, `privacy_policy`, `created_at`, `updated_at`) VALUES
(1, '<p>Terms and Conditions</p>', '<p>Privacy Policy</p>', '2020-01-06 22:06:13', '2020-02-12 03:21:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonial`
--

CREATE TABLE `testimonial` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `testimonial` text DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `testimonial`, `image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 'Ryan Disastra, @organicmart.id', '<p>&ldquo; Hasil kerjanya sangat bagus sama tepat waktuu &rdquo;</p>', NULL, 0, NULL, '2020-10-14 04:27:45', '2020-10-16 08:36:43'),
(4, 'Editha Meydiana, @pixeldental.id', '<p>&ldquo; Desain bagus, sesuai yg diinginkan, komunikasi oke. Sukses yaa! &rdquo;</p>', NULL, 1, NULL, '2020-10-16 08:35:31', '2020-10-16 08:37:21'),
(5, 'Rusila Puty, @dwilbeuty', '<p>&ldquo; Hasil design cepat dn memuaskan bgt, Uda gt admin nya jg baik dan cpt mengerti apa yg di mau, sampe ga bsa kelain hati haha &rdquo;</p>', NULL, 1, NULL, '2020-10-16 08:37:35', '2020-10-16 08:37:35'),
(6, 'Ryan Disastra, @organicmart.id', '<p>&ldquo; Jasa desain terbaik, yang bisa merubah konsep jadi postingan &rdquo;</p>', NULL, 1, NULL, '2020-10-16 08:37:48', '2020-10-16 08:37:48'),
(7, 'Aji Setyawan, @j.mask.id', '<p>&ldquo; Respon admin nya enak banget, ga nyesel deh Order Disini &rdquo;</p>', NULL, 1, NULL, '2020-10-16 08:38:00', '2020-10-16 08:38:00'),
(8, 'Renny Apriani, @oilsome.id', '<p>&ldquo; Pelayanan memuaskan. Hasil design juga bagus. Harga terjangkau &rdquo;</p>', NULL, 1, NULL, '2020-10-16 08:38:16', '2020-10-16 08:38:16'),
(9, 'Afdhal Firlando, @zubair.co.id', '<p>&ldquo; Sangat memuaskan, pengerjaan rapi dan cepat, admin sangat mengerti kebutuhan yang di inginkan untuk hasil terbaik &rdquo;</p>', NULL, 1, NULL, '2020-10-16 08:38:28', '2020-10-16 08:38:28'),
(10, 'Meilia Putri Zaida, @laksanadaster', '<p>&ldquo; Desain disini hasilnya bagus banget, ngerti apa yang aku mau gausah pake revisi langsung klop. Maaci lakucreative! &rdquo;</p>', NULL, 1, NULL, '2020-10-16 08:38:45', '2020-10-16 08:38:45'),
(11, 'Addina, @madina.babykids', '<p>&ldquo; Terima kasih lakucreative, email projek madina sudah saya terima. Hasilnya bagus bgt. Selalu memuaskan. Sukses selalu lakucreative &rdquo;</p>', NULL, 1, NULL, '2020-10-16 08:38:58', '2020-10-16 08:38:58'),
(12, 'Wanda Resita, @miware.id', '<p>&ldquo; Super puas, lucuuuu, fast respon, cepet jadinya dan yang pasti enak banget diajak konsultasi meskipun akunya agak rewel tapi bener-bener diladenin dengan sabar. Love bgt! &rdquo;</p>', NULL, 1, NULL, '2020-10-16 08:39:11', '2020-10-16 08:39:11'),
(13, 'Dwi Audit, @sada.kids', '<p>&ldquo; Thanks yaa, order buat 15 gambar feed, adminnya sabar banget,, untung nya fast respond,, jadi komunikasinya baik, thanks yaa! hasilnya puas! &rdquo;</p>', NULL, 1, NULL, '2020-10-16 08:39:24', '2020-10-16 08:39:24'),
(14, 'Nicky Ruliana Sari, @Blessglow.official', '<p>&ldquo; Hasil Desainnya bagus dan cepat banget jadinya. gak pake revisi langsung klop. very recommended &rdquo;</p>', NULL, 1, NULL, '2020-10-16 08:39:38', '2020-10-16 08:39:38'),
(15, 'Hasby Hadian, @silauk', '<p>\" Hasil kerjanya sangat bagus sama tepat waktuu \"</p>', NULL, 1, NULL, '2020-10-27 07:45:03', '2020-10-27 07:51:42'),
(16, 'Sanga Syahriani, @sweet.blusher', '<p>\" Alhamdulillah puas bgtttt sama hasil nyaaa harga nya juga sangat terjangkau,respon penjual nya baik \"</p>', NULL, 1, NULL, '2020-10-27 07:47:46', '2020-10-27 07:51:55'),
(17, 'Mey Puspita, @thebeautybar_bjb', '<p>\" Fast respon, kalo ada revisi juga pengerjaannya cepet, komunikatif \"</p>', NULL, 1, NULL, '2020-10-27 07:48:49', '2020-10-27 07:52:05'),
(18, 'Rina Suliastini, @bahapcosmetic', '<p>\" Proses cepat, owner nya ramah , sabar bgt, tetep respond pesan walo udh malam . Bakal langganan . Makasi ya laku creative \"</p>', NULL, 1, NULL, '2020-10-27 07:50:29', '2020-10-27 07:52:14'),
(19, 'Dira Wiwanda, @radissa.id', '<p>\" Pelayanannya baik dan memuaskan hasilnya juga oke banget Bener2 trusted \"</p>', NULL, 1, NULL, '2020-10-27 07:51:22', '2020-10-27 07:52:23'),
(20, 'Milli Yanarani, @maskfactoryjkt', '<p>\" Adminnya ramah . Informatif dan sabar banget . Dan satu lagi santuy bgt kalo minta tambahan a b c d , gak semuanya di duitin asli baik banget. pokoknya best lah ! \"</p>', NULL, 1, NULL, '2020-10-27 08:08:49', '2020-10-27 08:08:49'),
(21, 'Nurul WK', '<p>\" Super buuuaaaggguuuusssss sekali editannya Suka, amat snagat suka!!! Harga murah, tapi hasilnya MEWAH Sukses terus @lakucreative \"</p>', NULL, 1, NULL, '2020-10-27 08:12:18', '2020-10-27 08:12:18'),
(22, 'Iyan Nugraha, @weizenoil', '<p>\" Fast, professional.. pokonya recommended. \"</p>', NULL, 1, NULL, '2020-10-27 08:13:23', '2020-10-27 08:13:23'),
(23, 'Widia Villani, @rahasioemak', '<p>\" Bisa ngobrol design2 seperti apa yg kita mau selain itu dikasih masukan juga , cocok banget klo mau design bagi pemula yang mau coba jualan atau memperbaiki isi feed di IG. \"</p>', NULL, 1, NULL, '2020-10-27 08:14:17', '2020-10-27 08:16:16'),
(24, 'Widia Villani, @rahasioemak', '<p>\" Pelayanan dan hasilnya memuaskan banget.. Aku recomendasi kalian buat bikin design disini.. \"</p>\r\n<p>&nbsp;</p>', NULL, 1, NULL, '2020-10-27 08:16:23', '2020-10-27 08:16:35'),
(25, 'someofmine', '<p>\" Baru sekali jadi aja udah oke bangett feed giveaway aku next time pasti order lagi, mba nya juga ramah bingoo&nbsp; \"</p>', NULL, 1, NULL, '2020-10-27 08:17:02', '2020-10-27 08:17:02'),
(26, 'Adam Kusuma, @exploresemaku', '<p>\" Pesen disini cepat banget, admin responsif pelayanan memuaskan. Rekomen bagi yg pengen menggunakan jasa desain di lakucreative \"</p>', NULL, 1, NULL, '2020-10-27 08:18:24', '2020-10-27 08:18:24'),
(27, 'And Mary, @soyahowuhowu', '<p>\" Desainnya kereeenn, pilihan warna bagus dan superrrrr sabar meski sudah ganti sampai 3 kali . Sukses terus buatmu dear. Lakucreative the best \"</p>', NULL, 1, NULL, '2020-10-27 08:19:53', '2020-10-27 08:19:53'),
(28, 'Mega, @alanahijab.id', '<p>\" Thank you kak sudah bantuin edit warna. Prosesnya cepet dan hasilnya baguuss sesuai request. \"</p>', NULL, 1, NULL, '2020-10-27 08:21:02', '2020-10-27 08:21:02'),
(29, 'Rusila Puty, @dwilbeuty', '<p>\" Hasil design cepat dn memuaskan bgt, Uda gt admin nya jg baik dan cpt mengerti apa yg di mau, sampe ga bsa kelain hati haha \"</p>', NULL, 1, NULL, '2020-10-27 08:21:35', '2020-10-27 08:21:35'),
(30, 'Aprilia Santoso, @dndcstore', '<p>\" Pertama kali pakai jasa desain LakuCreative, puas dengan hasil dan pelayanannya. Yang paling penting adalah gak bikin jeboool kantongku hehe. Semoga semakin berkualitas \"</p>', NULL, 1, NULL, '2020-10-27 08:22:33', '2020-10-27 08:22:33'),
(31, 'Wynee Kurniawan, @wyneefootwear', '<p>\" Recomended bgt , Karena Design feed ig olshopku sesuai dengan yg aq harapkan . sisnya ramah dan bersedia membantu apabila sy minta tolong kecilin sizenya . Designnya pun bagus &amp; kreatif , pasti jg langganan lagi . \"</p>', NULL, 1, NULL, '2020-10-27 08:23:17', '2020-10-27 08:23:17'),
(32, 'Ria Wulandari, @fujifrozen', '<p>\" Memuaskan! Hasil sesuai request! Pengerjaan lumayan cepat... bakal langganan dan rekomendasiin ke temen-temen! \"</p>', NULL, 1, NULL, '2020-10-27 08:24:27', '2020-10-27 08:24:27'),
(33, 'Julia Purnamasari, @laterra.id', '<p>\" Tetep sabar meskipun aku banyak request... maapkan yaa kak \"</p>', NULL, 1, NULL, '2020-10-27 08:25:39', '2020-10-27 08:25:39'),
(34, 'Nova Anggraheni, @saystory.pakulonan', '<p>\" chat dibalas dg cepat, ramah, hasil memuaskan \"</p>', NULL, 1, NULL, '2020-10-27 08:26:54', '2020-10-27 08:26:54'),
(35, 'Ponco Naiya', '<p>\" Terima kasih kak, respon cepat dan designnya okeh sesuai apa keinginan kita. \"</p>', NULL, 1, NULL, '2020-10-27 08:27:39', '2020-10-27 08:27:39'),
(36, 'Elina Malau, @masakanemayang', '<p>\" Suka banget sm gambarnya. Labelnya jg terinformasi. Smoga usahanya lancar... trimakasih... \"</p>', NULL, 1, NULL, '2020-10-27 08:28:14', '2020-10-27 08:28:14'),
(37, 'Rumaisha Humaira, @cleine', '<p>\" Tim ramah, respon cepet banget, hasil memuaskan \"</p>', NULL, 1, NULL, '2020-10-27 08:29:05', '2020-10-27 08:29:05'),
(38, 'Kartika Kusuma, @kaswabeauty_', '<p>\" MANTAP PUAS BANGET SAMA HASILNYA. KAKAK NYA RAMAH DAN SABAR BANGET NGADEPIN AKU YANG BAWEL, MAKASIH YA LAKU CREATIVE SEMOGA SUKSES SELALU \"</p>', NULL, 1, NULL, '2020-10-27 08:30:22', '2020-10-27 08:30:22'),
(39, 'Cynthia Aulia Putri', '<p>harganya murah bgt🖤🖤tapi designya bagus bgtt!admin nya juga fast respon bgt😊</p>', NULL, 1, NULL, '2022-02-16 05:37:20', '2022-02-16 05:37:20'),
(40, 'Dinda Whitney', '<p>Pengerjaan cepat, rapi, dan designnya juga sangat profesional seperti yang diharapkan untuk proyek sosial saya. Terima kasih dan sukses selalu LakuCreative!</p>', NULL, 1, NULL, '2022-02-16 05:37:47', '2022-02-16 05:37:47'),
(41, 'Aridha NH', '<p>Sangat membantu hasil sangat memuaskan</p>', NULL, 1, NULL, '2022-02-16 05:38:09', '2022-02-16 05:38:09'),
(42, 'Rizka Tanos', '<p>Kereeeennnnn👍🏻</p>', NULL, 1, NULL, '2022-02-16 05:38:41', '2022-02-16 05:38:41'),
(43, '༺ R\'N\'R ༻', '<p>Admin cepat tanggap.<br />Design nya kerennnnnn</p>', NULL, 1, NULL, '2022-02-16 05:38:58', '2022-02-16 05:38:58'),
(44, 'Selvia Sari', '<p>Gak perlu repot pikirin konten harian.. Semua beres dibantu am team Laku Creative.. Thank you &amp; Sukses terus 🙏🙏</p>', NULL, 1, NULL, '2022-02-16 05:39:17', '2022-02-16 05:39:17'),
(45, 'dwi novitautami', '<p>Bagus</p>', NULL, 1, NULL, '2022-02-16 05:39:38', '2022-02-16 05:39:38'),
(46, 'safitri fs', '<p>Mantap pelayanannya cepat dan design yg di buat oke oke bgt. Puasss pakai jasa laku creative.</p>', NULL, 1, NULL, '2022-02-16 05:39:59', '2022-02-16 05:39:59'),
(47, 'Riska Chandra', '<p>Sejauh ini memuaskan, revisi sampai puas, adminnya juga responsif jadi kitanya juga merasa aman. Thank you :)</p>', NULL, 1, NULL, '2022-02-16 05:40:18', '2022-02-16 05:40:18'),
(48, 'Liane Sumitto', '<p>Senang dengan pelayanannya yang cepat responnya dan ramah. Harga juga masih terjangkau kok dengan hasil yang didapat. Konten2nya juga oke2, cocok untuk yang sudah buntu dengan konten2nya. 🙏 Bakalan puas pokoknya dan akan selalu order langganan. ❤ Terima kasih</p>', NULL, 1, NULL, '2022-02-16 05:40:37', '2022-02-16 05:40:37'),
(49, 'Anida Nursyifa', '<p>Demi apa secepat itu baru dipesen habis magrib eh malam itu juga udah jadi, sangat memuaskan pokoknya apalagi desainnya pas bgt sama yg aku mau🤗🤗</p>', NULL, 1, NULL, '2022-02-16 05:40:59', '2022-02-16 05:40:59'),
(50, 'Dyanti PrimPut', '<p>Cepat sekali pengerjaanyaa🙏</p>', NULL, 1, NULL, '2022-02-16 05:41:14', '2022-02-16 05:41:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin_color`
--
ALTER TABLE `admin_color`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cara_kerja`
--
ALTER TABLE `cara_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `company_data`
--
ALTER TABLE `company_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `design_image`
--
ALTER TABLE `design_image`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hubungi_kami`
--
ALTER TABLE `hubungi_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mengapa`
--
ALTER TABLE `mengapa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `metadata`
--
ALTER TABLE `metadata`
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
-- Indeks untuk tabel `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_category_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `tentang_kami`
--
ALTER TABLE `tentang_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `admin_color`
--
ALTER TABLE `admin_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cara_kerja`
--
ALTER TABLE `cara_kerja`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `company_data`
--
ALTER TABLE `company_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `design`
--
ALTER TABLE `design`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `design_image`
--
ALTER TABLE `design_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `hubungi_kami`
--
ALTER TABLE `hubungi_kami`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `logo`
--
ALTER TABLE `logo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mengapa`
--
ALTER TABLE `mengapa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `metadata`
--
ALTER TABLE `metadata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tentang_kami`
--
ALTER TABLE `tentang_kami`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
