-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 02:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_kip_kuliah`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verifikasi_user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `nama`, `created_at`, `updated_at`, `verifikasi_user_id`) VALUES
(1, 'Mira Lova', NULL, '2023-05-11 23:27:59', NULL),
(2, 'Qori Eza Fadillah', '2023-04-16 03:10:17', '2023-05-11 23:28:55', NULL),
(15, 'Lani Sari', '2023-04-17 22:45:28', '2023-05-11 23:27:45', NULL),
(20, 'Kurnia Vara Lewi', '2023-04-17 23:38:06', '2023-05-11 23:27:36', NULL),
(24, 'Oktaviani', '2023-04-17 23:45:16', '2023-05-11 23:28:24', NULL),
(28, 'Rani Putri', '2023-04-17 23:50:58', '2023-05-11 23:29:05', NULL),
(29, 'Sari Lesmana Putri', '2023-04-17 23:53:05', '2023-05-11 23:29:19', NULL),
(37, 'Putra Valir', '2023-04-18 01:17:50', '2023-05-11 23:28:40', NULL),
(51, 'Nada Cinta Lestari', '2023-04-18 03:14:01', '2023-05-11 23:28:13', NULL),
(52, 'Hana Wijaya', '2023-04-18 04:21:15', '2023-05-11 23:26:58', NULL),
(53, 'Zaka Saragih', '2023-04-18 04:32:01', '2023-05-11 23:51:55', NULL),
(54, 'Umi Wati', '2023-04-18 04:33:34', '2023-05-11 23:29:36', NULL),
(56, 'Tito Kerz', '2023-04-18 04:35:47', '2023-05-11 23:29:26', NULL),
(57, 'Galuh Setyo Rizki', '2023-04-18 04:42:49', '2023-05-11 23:26:49', NULL),
(58, 'Zovo Emaszeh', '2023-04-18 04:44:15', '2023-05-11 23:34:40', NULL),
(59, 'Zulkarnain Prasetyo', '2023-04-18 04:45:30', '2023-05-11 23:35:01', NULL),
(60, 'Xaverius', '2023-04-18 17:13:47', '2023-05-11 23:51:08', NULL),
(61, 'Yoan Variz', '2023-04-18 17:16:14', '2023-05-11 23:31:00', NULL),
(66, 'Farhana Dewi', '2023-04-18 17:50:16', '2023-05-25 21:21:48', NULL),
(71, 'Ziggy Putri Maharani', '2023-04-18 20:26:16', '2023-05-11 23:34:13', NULL),
(72, 'Vina Vani', '2023-04-18 20:27:03', '2023-05-11 23:29:49', NULL),
(73, 'Wulandari Putri', '2023-04-18 20:29:11', '2023-05-11 23:30:32', NULL),
(76, 'Jaka Tengku', '2023-04-21 21:52:02', '2023-05-11 23:27:20', NULL),
(77, 'Indra Kusuma', '2023-04-21 21:52:10', '2023-05-11 23:27:08', NULL),
(85, 'Budi Pra Cahyo', NULL, '2023-05-21 18:16:31', NULL),
(86, 'Chandra Eka Prawira', NULL, '2023-05-21 17:59:50', 2),
(87, 'Deva Saleh Putra', NULL, '2023-05-21 18:16:21', NULL),
(88, 'Eka Putri', NULL, '2023-05-21 17:46:22', NULL),
(89, 'Yukino Putri', '2023-05-02 20:46:54', '2023-05-11 23:51:39', NULL),
(91, 'Abdi Putra Negara', '2023-05-02 20:54:44', '2023-05-21 17:45:52', 2);

-- --------------------------------------------------------

--
-- Table structure for table `alternatif_kriteria_subkriteria`
--

CREATE TABLE `alternatif_kriteria_subkriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternatif_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `sub_kriteria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatif_kriteria_subkriteria`
--

INSERT INTO `alternatif_kriteria_subkriteria` (`id`, `alternatif_id`, `kriteria_id`, `sub_kriteria_id`, `created_at`, `updated_at`) VALUES
(57, 66, 3, 25, '2023-04-21 19:38:55', '2023-04-21 22:08:13'),
(58, 66, 7, 31, '2023-04-21 19:38:55', '2023-04-21 22:08:13'),
(60, 66, 9, 42, '2023-04-21 19:38:55', '2023-04-21 22:08:13'),
(68, 1, 1, 21, '2023-04-21 21:33:58', '2023-04-21 21:33:58'),
(69, 1, 3, 28, '2023-04-21 21:33:58', '2023-04-21 22:15:53'),
(70, 1, 7, 29, '2023-04-21 21:33:58', '2023-04-21 22:15:53'),
(71, 1, 8, 35, '2023-04-21 21:33:58', '2023-04-21 22:15:53'),
(72, 1, 9, 40, '2023-04-21 21:33:58', '2023-04-21 22:15:53'),
(73, 1, 10, 47, '2023-04-21 21:33:58', '2023-04-21 22:15:53'),
(74, 76, 1, 22, '2023-04-21 21:52:03', '2023-04-21 22:14:36'),
(75, 76, 3, 25, '2023-04-21 21:52:03', '2023-04-21 22:14:36'),
(76, 76, 7, 29, '2023-04-21 21:52:03', '2023-04-21 22:14:36'),
(77, 76, 8, 37, '2023-04-21 21:52:03', '2023-04-21 22:14:36'),
(78, 76, 9, 43, '2023-04-21 21:52:03', '2023-04-21 22:14:36'),
(79, 76, 10, 46, '2023-04-21 21:52:03', '2023-04-21 22:14:36'),
(80, 77, 1, 22, '2023-04-21 21:52:10', '2023-04-21 22:14:00'),
(81, 77, 3, 27, '2023-04-21 21:52:10', '2023-04-21 22:14:00'),
(82, 77, 7, 29, '2023-04-21 21:52:10', '2023-04-21 22:14:00'),
(83, 77, 8, 36, '2023-04-21 21:52:10', '2023-04-21 22:14:00'),
(84, 77, 9, 39, '2023-04-21 21:52:10', '2023-04-21 21:52:10'),
(85, 77, 10, 44, '2023-04-21 21:52:10', '2023-04-21 22:14:01'),
(109, 66, 1, 23, '2023-04-21 22:08:13', '2023-04-21 22:08:13'),
(110, 66, 8, 36, '2023-04-21 22:08:13', '2023-04-21 22:08:13'),
(111, 66, 10, 44, '2023-04-21 22:08:13', '2023-04-21 22:08:13'),
(112, 57, 1, 21, '2023-04-21 22:08:52', '2023-04-21 22:08:52'),
(113, 57, 3, 26, '2023-04-21 22:08:52', '2023-04-21 22:08:52'),
(114, 57, 7, 31, '2023-04-21 22:08:52', '2023-04-21 22:08:52'),
(115, 57, 8, 35, '2023-04-21 22:08:52', '2023-04-21 22:08:52'),
(116, 57, 9, 43, '2023-04-21 22:08:52', '2023-04-21 22:08:52'),
(117, 57, 10, 48, '2023-04-21 22:08:52', '2023-04-21 22:08:52'),
(118, 59, 1, 24, '2023-04-21 22:09:15', '2023-04-21 22:09:15'),
(119, 59, 3, 25, '2023-04-21 22:09:15', '2023-04-21 22:09:15'),
(120, 59, 7, 33, '2023-04-21 22:09:15', '2023-04-21 22:09:15'),
(121, 59, 8, 38, '2023-04-21 22:09:16', '2023-04-21 22:09:16'),
(122, 59, 9, 40, '2023-04-21 22:09:16', '2023-04-21 22:09:16'),
(123, 59, 10, 45, '2023-04-21 22:09:16', '2023-04-21 22:09:16'),
(124, 58, 1, 21, '2023-04-21 22:09:39', '2023-04-21 22:09:39'),
(125, 58, 3, 26, '2023-04-21 22:09:39', '2023-04-21 22:09:39'),
(126, 58, 7, 32, '2023-04-21 22:09:39', '2023-04-21 22:09:39'),
(127, 58, 8, 36, '2023-04-21 22:09:39', '2023-04-21 22:09:39'),
(128, 58, 9, 40, '2023-04-21 22:09:39', '2023-04-21 22:09:39'),
(129, 58, 10, 45, '2023-04-21 22:09:39', '2023-04-21 22:09:39'),
(130, 52, 1, 23, '2023-04-21 22:12:39', '2023-04-21 22:12:39'),
(131, 52, 3, 27, '2023-04-21 22:12:39', '2023-04-21 22:12:39'),
(132, 52, 7, 29, '2023-04-21 22:12:39', '2023-04-21 22:12:39'),
(133, 52, 8, 35, '2023-04-21 22:12:39', '2023-04-21 22:12:39'),
(134, 52, 9, 41, '2023-04-21 22:12:39', '2023-04-21 22:12:39'),
(135, 52, 10, 45, '2023-04-21 22:12:39', '2023-04-21 22:12:39'),
(136, 20, 1, 23, '2023-04-21 22:15:00', '2023-04-21 22:15:00'),
(137, 20, 3, 25, '2023-04-21 22:15:00', '2023-04-21 22:15:00'),
(138, 20, 7, 29, '2023-04-21 22:15:00', '2023-04-21 22:15:00'),
(139, 20, 8, 37, '2023-04-21 22:15:00', '2023-04-21 22:15:00'),
(140, 20, 9, 39, '2023-04-21 22:15:00', '2023-04-21 22:15:00'),
(141, 20, 10, 44, '2023-04-21 22:15:00', '2023-04-21 22:15:00'),
(142, 15, 1, 24, '2023-04-21 22:15:35', '2023-04-21 22:15:35'),
(143, 15, 3, 25, '2023-04-21 22:15:35', '2023-04-21 22:15:35'),
(144, 15, 7, 29, '2023-04-21 22:15:35', '2023-04-21 22:15:35'),
(145, 15, 8, 36, '2023-04-21 22:15:35', '2023-04-21 22:15:35'),
(146, 15, 9, 42, '2023-04-21 22:15:35', '2023-04-21 22:15:35'),
(147, 15, 10, 48, '2023-04-21 22:15:35', '2023-04-21 22:15:35'),
(148, 51, 1, 24, '2023-04-21 22:17:12', '2023-04-21 22:17:12'),
(149, 51, 3, 26, '2023-04-21 22:17:12', '2023-04-21 22:17:12'),
(150, 51, 7, 32, '2023-04-21 22:17:12', '2023-04-21 22:17:12'),
(151, 51, 8, 35, '2023-04-21 22:17:12', '2023-04-21 22:17:12'),
(152, 51, 9, 41, '2023-04-21 22:17:13', '2023-04-21 22:17:13'),
(153, 51, 10, 45, '2023-04-21 22:17:13', '2023-04-21 22:17:13'),
(154, 24, 1, 24, '2023-04-21 22:17:28', '2023-04-21 22:17:28'),
(155, 24, 3, 26, '2023-04-21 22:17:28', '2023-04-21 22:17:28'),
(156, 24, 7, 31, '2023-04-21 22:17:28', '2023-04-21 22:17:28'),
(157, 24, 8, 35, '2023-04-21 22:17:28', '2023-04-21 22:17:28'),
(158, 24, 9, 39, '2023-04-21 22:17:28', '2023-04-21 22:17:28'),
(159, 24, 10, 47, '2023-04-21 22:17:28', '2023-04-21 22:17:28'),
(160, 37, 1, 23, '2023-04-21 22:17:53', '2023-04-21 22:17:53'),
(161, 37, 3, 26, '2023-04-21 22:17:54', '2023-04-21 22:17:54'),
(162, 37, 7, 29, '2023-04-21 22:17:54', '2023-04-21 22:17:54'),
(163, 37, 8, 37, '2023-04-21 22:17:54', '2023-04-21 22:17:54'),
(164, 37, 9, 41, '2023-04-21 22:17:54', '2023-04-21 22:17:54'),
(165, 37, 10, 47, '2023-04-21 22:17:54', '2023-04-21 22:17:54'),
(166, 2, 1, 21, '2023-04-21 22:18:22', '2023-04-21 22:18:22'),
(167, 2, 3, 26, '2023-04-21 22:18:22', '2023-04-21 22:18:22'),
(168, 2, 7, 29, '2023-04-21 22:18:22', '2023-04-21 22:18:22'),
(169, 2, 8, 37, '2023-04-21 22:18:22', '2023-04-21 22:18:22'),
(170, 2, 9, 40, '2023-04-21 22:18:22', '2023-04-21 22:18:22'),
(171, 2, 10, 45, '2023-04-21 22:18:22', '2023-04-21 22:18:22'),
(172, 28, 1, 23, '2023-04-21 22:18:42', '2023-04-21 22:18:42'),
(173, 28, 3, 27, '2023-04-21 22:18:42', '2023-04-21 22:18:42'),
(174, 28, 7, 30, '2023-04-21 22:18:42', '2023-04-21 22:18:42'),
(175, 28, 8, 34, '2023-04-21 22:18:42', '2023-04-21 22:18:42'),
(176, 28, 9, 43, '2023-04-21 22:18:42', '2023-04-21 22:18:42'),
(177, 28, 10, 45, '2023-04-21 22:18:42', '2023-04-21 22:18:42'),
(178, 29, 1, 21, '2023-04-21 22:20:45', '2023-04-21 22:20:45'),
(179, 29, 3, 28, '2023-04-21 22:20:45', '2023-04-21 22:20:45'),
(180, 29, 7, 31, '2023-04-21 22:20:45', '2023-04-21 22:20:45'),
(181, 29, 8, 36, '2023-04-21 22:20:45', '2023-04-21 22:20:45'),
(182, 29, 9, 42, '2023-04-21 22:20:45', '2023-04-21 22:20:45'),
(183, 29, 10, 45, '2023-04-21 22:20:45', '2023-04-21 22:20:45'),
(184, 56, 1, 24, '2023-04-21 22:21:07', '2023-04-21 22:21:07'),
(185, 56, 3, 26, '2023-04-21 22:21:07', '2023-04-21 22:21:07'),
(186, 56, 7, 31, '2023-04-21 22:21:07', '2023-04-21 22:21:07'),
(187, 56, 8, 37, '2023-04-21 22:21:07', '2023-04-21 22:21:07'),
(188, 56, 9, 40, '2023-04-21 22:21:07', '2023-04-21 22:21:07'),
(189, 56, 10, 45, '2023-04-21 22:21:07', '2023-04-21 22:21:07'),
(190, 54, 1, 24, '2023-04-21 22:21:26', '2023-04-21 22:21:26'),
(191, 54, 3, 28, '2023-04-21 22:21:26', '2023-04-21 22:21:26'),
(192, 54, 7, 31, '2023-04-21 22:21:26', '2023-04-21 22:21:26'),
(193, 54, 8, 37, '2023-04-21 22:21:26', '2023-04-21 22:21:26'),
(194, 54, 9, 39, '2023-04-21 22:21:26', '2023-04-21 22:21:26'),
(195, 54, 10, 44, '2023-04-21 22:21:26', '2023-04-21 22:21:26'),
(196, 72, 1, 21, '2023-04-21 22:21:50', '2023-04-21 22:21:50'),
(197, 72, 3, 25, '2023-04-21 22:21:50', '2023-04-21 22:21:50'),
(198, 72, 7, 32, '2023-04-21 22:21:50', '2023-04-21 22:21:50'),
(199, 72, 8, 36, '2023-04-21 22:21:50', '2023-04-21 22:21:50'),
(200, 72, 9, 39, '2023-04-21 22:21:50', '2023-04-21 22:21:50'),
(201, 72, 10, 48, '2023-04-21 22:21:50', '2023-04-21 22:21:50'),
(202, 73, 1, 24, '2023-04-21 22:22:07', '2023-04-21 22:22:07'),
(203, 73, 3, 27, '2023-04-21 22:22:07', '2023-04-21 22:22:07'),
(204, 73, 7, 33, '2023-04-21 22:22:07', '2023-04-21 22:22:07'),
(205, 73, 8, 38, '2023-04-21 22:22:07', '2023-04-21 22:22:07'),
(206, 73, 9, 40, '2023-04-21 22:22:07', '2023-04-21 22:22:07'),
(207, 73, 10, 48, '2023-04-21 22:22:07', '2023-04-21 22:22:07'),
(208, 60, 1, 22, '2023-04-21 22:22:24', '2023-04-21 22:22:24'),
(209, 60, 3, 28, '2023-04-21 22:22:24', '2023-04-21 22:22:24'),
(210, 60, 7, 30, '2023-04-21 22:22:24', '2023-04-21 22:22:24'),
(211, 60, 8, 38, '2023-04-21 22:22:24', '2023-04-21 22:22:24'),
(212, 60, 9, 39, '2023-04-21 22:22:24', '2023-04-21 22:22:24'),
(213, 60, 10, 47, '2023-04-21 22:22:24', '2023-04-21 22:22:24'),
(214, 61, 1, 22, '2023-04-21 22:23:04', '2023-04-21 22:23:04'),
(215, 61, 3, 27, '2023-04-21 22:23:04', '2023-04-21 22:23:04'),
(216, 61, 7, 29, '2023-04-21 22:23:04', '2023-04-21 22:23:04'),
(217, 61, 8, 35, '2023-04-21 22:23:04', '2023-04-21 22:23:04'),
(218, 61, 9, 41, '2023-04-21 22:23:04', '2023-04-21 22:23:04'),
(219, 61, 10, 44, '2023-04-21 22:23:04', '2023-04-21 22:23:04'),
(224, 53, 1, 23, '2023-04-21 22:23:45', '2023-04-21 22:23:45'),
(225, 53, 3, 28, '2023-04-21 22:23:45', '2023-04-21 22:23:45'),
(226, 53, 7, 32, '2023-04-21 22:23:45', '2023-04-21 22:23:45'),
(227, 53, 8, 34, '2023-04-21 22:23:45', '2023-04-21 22:23:45'),
(228, 53, 9, 39, '2023-04-21 22:23:45', '2023-04-21 22:23:45'),
(229, 53, 10, 47, '2023-04-21 22:23:45', '2023-04-21 22:23:45'),
(230, 71, 1, 21, '2023-04-21 22:23:58', '2023-04-21 22:23:58'),
(231, 71, 3, 27, '2023-04-21 22:23:58', '2023-04-21 22:23:58'),
(232, 71, 7, 30, '2023-04-21 22:23:58', '2023-04-21 22:23:58'),
(233, 71, 8, 37, '2023-04-21 22:23:58', '2023-04-21 22:23:58'),
(234, 71, 9, 40, '2023-04-21 22:23:58', '2023-04-21 22:23:58'),
(235, 71, 10, 47, '2023-04-21 22:23:58', '2023-04-21 22:23:58'),
(272, 89, 1, 23, '2023-05-02 20:46:54', '2023-05-02 20:50:58'),
(273, 89, 3, 25, '2023-05-02 20:46:54', '2023-05-02 20:50:59'),
(274, 89, 7, 32, '2023-05-02 20:46:54', '2023-05-02 20:50:59'),
(275, 89, 8, 35, '2023-05-02 20:46:54', '2023-05-02 20:50:59'),
(276, 89, 9, 43, '2023-05-02 20:46:54', '2023-05-02 20:50:59'),
(277, 89, 10, 44, '2023-05-02 20:46:54', '2023-05-02 20:50:59'),
(284, 85, 1, 22, '2023-05-02 20:50:05', '2023-05-02 20:50:05'),
(285, 85, 3, 28, '2023-05-02 20:50:05', '2023-05-02 20:50:05'),
(286, 85, 7, 31, '2023-05-02 20:50:05', '2023-05-02 20:50:05'),
(287, 85, 8, 38, '2023-05-02 20:50:06', '2023-05-02 20:50:06'),
(288, 85, 9, 43, '2023-05-02 20:50:06', '2023-05-02 20:50:06'),
(289, 85, 10, 47, '2023-05-02 20:50:06', '2023-05-02 20:50:06'),
(290, 86, 1, 21, '2023-05-02 20:50:16', '2023-05-02 20:50:16'),
(291, 86, 3, 27, '2023-05-02 20:50:16', '2023-05-02 20:50:16'),
(292, 86, 7, 32, '2023-05-02 20:50:16', '2023-05-02 20:50:16'),
(293, 86, 8, 34, '2023-05-02 20:50:16', '2023-05-02 20:50:16'),
(294, 86, 9, 41, '2023-05-02 20:50:16', '2023-05-02 20:50:16'),
(295, 86, 10, 45, '2023-05-02 20:50:16', '2023-05-02 20:50:16'),
(296, 87, 1, 24, '2023-05-02 20:50:28', '2023-05-02 20:50:28'),
(297, 87, 3, 27, '2023-05-02 20:50:28', '2023-05-02 20:50:28'),
(298, 87, 7, 29, '2023-05-02 20:50:28', '2023-05-02 20:50:28'),
(299, 87, 8, 34, '2023-05-02 20:50:28', '2023-05-02 20:50:28'),
(300, 87, 9, 43, '2023-05-02 20:50:28', '2023-05-02 20:50:28'),
(301, 87, 10, 47, '2023-05-02 20:50:28', '2023-05-02 20:50:28'),
(302, 88, 1, 24, '2023-05-02 20:50:42', '2023-05-02 20:50:42'),
(303, 88, 3, 27, '2023-05-02 20:50:42', '2023-05-02 20:50:42'),
(304, 88, 7, 31, '2023-05-02 20:50:42', '2023-05-02 20:50:42'),
(305, 88, 8, 37, '2023-05-02 20:50:42', '2023-05-02 20:50:42'),
(306, 88, 9, 40, '2023-05-02 20:50:42', '2023-05-02 20:50:42'),
(307, 88, 10, 46, '2023-05-02 20:50:42', '2023-05-02 20:50:42'),
(314, 91, 1, 23, '2023-05-02 20:54:44', '2023-05-02 20:55:54'),
(315, 91, 3, 27, '2023-05-02 20:54:44', '2023-05-02 20:55:54'),
(316, 91, 7, 29, '2023-05-02 20:54:44', '2023-05-02 20:55:54'),
(317, 91, 8, 36, '2023-05-02 20:54:44', '2023-05-02 20:55:54'),
(318, 91, 9, 41, '2023-05-02 20:54:44', '2023-05-02 20:55:54'),
(319, 91, 10, 47, '2023-05-02 20:54:44', '2023-05-02 20:55:54');

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
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bobot` decimal(5,2) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `bobot`, `tipe`, `created_at`, `updated_at`) VALUES
(1, 'Status Calon Mahasiswa', '25.00', 'benefit', '2023-04-15 19:13:37', '2023-05-16 18:54:52'),
(3, 'Status Keluarga Mahasiswa', '15.00', 'benefit', '2023-04-15 19:17:55', '2023-05-16 18:55:09'),
(7, 'Jumlah Pendapatan Orang Tua/Wali', '25.00', 'cost', '2023-04-16 22:55:31', '2023-05-16 18:55:14'),
(8, 'Jumlah Tanggungan', '15.00', 'benefit', '2023-04-16 22:55:42', '2023-05-16 18:55:20'),
(9, 'Status Kepemilikan Rumah', '10.00', 'benefit', '2023-04-16 22:55:50', '2023-05-16 18:55:34'),
(10, 'Riwayat Prestasi', '10.00', 'benefit', '2023-04-16 22:56:22', '2023-05-16 18:55:38');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_15_072949_create_kriteria_table', 1),
(6, '2023_04_15_073928_create_sub_kriteria_table', 1),
(7, '2023_04_15_073934_create_alternatif_table', 1),
(8, '2023_04_17_054529_create_kriteria_alternatif_table', 2),
(9, '2023_04_18_043406_add_sub_kriteria_id_to_kriteria_alternatif_table', 3),
(10, '2023_04_18_054902_add_default_value_to_nilai_column_in_kriteria_alternatif_table', 4),
(11, '2023_04_18_071623_create_sub_kriteria_alternatif_table', 5),
(12, '2023_04_18_071808_remove_sub_kriteria_id_from_kriteria_alternatif_table', 6),
(13, '2023_04_18_073501_add_sub_kriteria_id_to_kriteria_alternatif_table', 7),
(14, '2023_04_18_081445_create_alternatif_kriteria_subkriteria_table', 8),
(15, '2023_04_18_105314_create_nilai_sub_kriteria_table', 9),
(17, '2023_04_19_040824_add_bobot_to_kriteria_table', 10),
(19, '2023_04_21_021031_add_is_admin_to_users_table', 11),
(20, '2023_05_22_001056_add_verifikasi_user_id_to_alternatif', 12),
(21, '2023_05_22_001223_add_verifikasi_user_id_to_alternatif', 13);

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
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id`, `kriteria_id`, `nama`, `nilai`, `created_at`, `updated_at`) VALUES
(21, 1, 'Kepemilikan kartu KIP/KKS/PKH', 1, '2023-04-21 21:21:20', '2023-04-21 21:21:20'),
(22, 1, 'Orang tua bercerai ditanggung', 2, '2023-04-21 21:21:35', '2023-04-21 23:36:48'),
(23, 1, 'Orang tua bercerai tanpa tanggungan', 3, '2023-04-21 21:21:57', '2023-04-21 23:37:15'),
(24, 1, 'Berasal dari Panti Sosial/Panti Asuhan', 4, '2023-04-21 21:22:12', '2023-04-21 23:37:18'),
(25, 3, 'Masih ada Orang Tua', 1, '2023-04-21 21:22:44', '2023-04-21 21:22:44'),
(26, 3, 'Piatu', 2, '2023-04-21 21:22:54', '2023-04-21 23:37:22'),
(27, 3, 'Yatim', 3, '2023-04-21 21:23:17', '2023-04-21 23:37:25'),
(28, 3, 'Yatim Piatu', 4, '2023-04-21 21:23:28', '2023-04-21 23:37:29'),
(29, 7, '< 300.000', 1, '2023-04-21 21:23:41', '2023-04-21 21:23:41'),
(30, 7, '300.000 - 800.000', 2, '2023-04-21 21:24:11', '2023-04-21 21:24:11'),
(31, 7, '800.000 - 1.500.000', 3, '2023-04-21 21:24:31', '2023-04-21 23:37:33'),
(32, 7, '1.500.000 - 3.000.000', 4, '2023-04-21 21:24:47', '2023-04-21 23:37:39'),
(33, 7, '> 3.000.000', 5, '2023-04-21 21:25:00', '2023-04-21 21:25:00'),
(34, 8, '1 orang', 1, '2023-04-21 21:25:37', '2023-04-21 21:25:37'),
(35, 8, '2 orang', 2, '2023-04-21 21:25:44', '2023-04-21 23:37:52'),
(36, 8, '3 orang', 3, '2023-04-21 21:25:52', '2023-04-21 23:37:58'),
(37, 8, '4-5 orang', 4, '2023-04-21 21:26:34', '2023-04-21 23:38:04'),
(38, 8, '> 5 orang', 5, '2023-04-21 21:26:50', '2023-04-21 23:38:08'),
(39, 9, 'Pribadi', 1, '2023-04-21 21:31:25', '2023-04-21 21:31:25'),
(40, 9, 'Warisan', 2, '2023-04-21 21:31:34', '2023-04-21 23:38:15'),
(41, 9, 'Sewa Tahunan', 3, '2023-04-21 21:31:42', '2023-04-21 23:38:22'),
(42, 9, 'Sewa Bulanan', 4, '2023-04-21 21:32:04', '2023-04-21 23:38:27'),
(43, 9, 'Menumpang', 5, '2023-04-21 21:32:13', '2023-04-21 23:38:31'),
(44, 10, 'Tingkat Kota', 1, '2023-04-21 21:32:23', '2023-04-21 21:32:23'),
(45, 10, 'Tingkat Kecamatan', 2, '2023-04-21 21:32:33', '2023-04-21 23:38:36'),
(46, 10, 'Tingkat Provinsi', 3, '2023-04-21 21:32:44', '2023-04-21 23:38:41'),
(47, 10, 'Tingkat Nasional', 4, '2023-04-21 21:32:54', '2023-04-21 23:38:45'),
(48, 10, 'Tingkat Internasional', 5, '2023-04-21 21:33:03', '2023-04-21 23:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'decisionmaker@gmail.com', 0, NULL, '$2y$10$si3S8NttQnIypgEPdw9Gy.zl/PkTFKg7Y2xDbqvyrQLbkwPQPsF.6', NULL, NULL, '2023-05-28 05:38:28'),
(2, 'Operator', 'operator@gmail.com', 1, NULL, '$2y$10$UEfTBHf19tGvapanm1t.RO/4jAROXpV87QPMEKqd02kpNTArXWBDa', NULL, NULL, '2023-05-26 21:48:26'),
(7, 'operator2', 'Operator2@gmail.com', 1, NULL, '$2y$10$zvGuyK3sKA2mtPo74KYbIe46WlTXwImYclOkM4N3ne6moBZpaW52O', NULL, '2023-05-04 22:01:46', '2023-05-21 18:45:07'),
(12, 'asdf', 'asdf@gmail.com', 1, NULL, '$2y$10$eueFRz9urZBuXS/MOhJR2OAtiTSu5bsgoKAZdpESrnQKNOZnOXrGS', NULL, '2023-05-26 21:35:35', '2023-05-26 21:50:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatif_verifikasi_user_id_foreign` (`verifikasi_user_id`);

--
-- Indexes for table `alternatif_kriteria_subkriteria`
--
ALTER TABLE `alternatif_kriteria_subkriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatif_kriteria_subkriteria_alternatif_id_foreign` (`alternatif_id`),
  ADD KEY `alternatif_kriteria_subkriteria_kriteria_id_foreign` (`kriteria_id`),
  ADD KEY `alternatif_kriteria_subkriteria_sub_kriteria_id_foreign` (`sub_kriteria_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_kriteria_kriteria_id_foreign` (`kriteria_id`);

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
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `alternatif_kriteria_subkriteria`
--
ALTER TABLE `alternatif_kriteria_subkriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=534;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `alternatif_verifikasi_user_id_foreign` FOREIGN KEY (`verifikasi_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `alternatif_kriteria_subkriteria`
--
ALTER TABLE `alternatif_kriteria_subkriteria`
  ADD CONSTRAINT `alternatif_kriteria_subkriteria_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alternatif_kriteria_subkriteria_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alternatif_kriteria_subkriteria_sub_kriteria_id_foreign` FOREIGN KEY (`sub_kriteria_id`) REFERENCES `sub_kriteria` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
