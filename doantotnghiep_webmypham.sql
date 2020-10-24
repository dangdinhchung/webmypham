-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 06, 2020 lúc 01:18 PM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doantotnghiep_webmypham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'Product', 'Cập nhật product', 51, 'App\\Models\\Product', 1, 'App\\Models\\Admin', '{\"old\":{\"id\":51,\"pro_name\":\"Kem Ch\\u1ed1ng N\\u1eafng Neutrogena Ultra Sheer Dry-Touch Sunscreen SPF70\",\"pro_slug\":\"kem-chong-nang-neutrogena-ultra-sheer-dry-touch-sunscreen-spf70\",\"pro_price\":\"250000\",\"pro_price_entry\":0,\"pro_category_id\":\"6\",\"pro_supplier_id\":1,\"pro_admin_id\":0,\"pro_sale\":\"12\",\"pro_expiration_date\":\"127\",\"pro_avatar\":\"19\",\"pro_view\":2,\"pro_hot\":127,\"pro_active\":1,\"pro_pay\":2,\"pro_number_import\":\"20\",\"pro_import_goods\":1,\"pro_description\":\"Kem ch\\u1ed1ng n\\u1eafng neutrogena Ultra Sheer Sunscreen v\\u1edbi c\\u00f4ng th\\u1ee9c \\u0111\\u1eb7c bi\\u1ec7t b\\u1ea3o v\\u1ec7 da tr\\u00e1nh tia UV t\\u1ed1i \\u0111a d\\u01b0\\u1edbi \\u00e1nh n\\u1eafng g\\u1eaft c\\u1ee7a m\\u00f9a h\\u00e8.- Da b\\u1ea1n s\\u1ebd kh\\u00f4ng b\\u1ecb b\\u00f3ng nh\\u1eddn, ng\\u01b0\\u1ee3c l\\u1ea1i, s\\u1ebd c\\u00f3 c\\u1ea3m gi\\u00e1c kh\\u00f4 r\\u00e1o v\\u00e0 nh\\u1eb9 nh\\u00e0ng.- S\\u1ea3n ph\\u1ea9m c\\u00f2n t\\u00edch h\\u1ee3p Butylene Glycol d\\u01b0\\u1ee1ng \\u1ea9m v\\u00e0 l\\u00e0m \\u0111\\u1eb9p da, Vitamin A, C, E nu\\u00f4i d\\u01b0\\u1ee1ng l\\u00e0n da.- C\\u00f4ng th\\u1ee9c Heliopex n\\u00e0y t\\u0103ng \\u0111\\u1ed9 b\\u1ec1n v\\u1eefng tr\\u01b0\\u1edbc \\u00e1nh n\\u1eafng, gi\\u00fap ch\\u1ed1ng n\\u1eafng \\u0111\\u01b0\\u1ee3c l\\u00e2u h\\u01a1n.\",\"pro_content\":\"test\",\"pro_review_total\":1,\"pro_review_star\":3,\"pro_age_review\":3,\"created_at\":\"2020-04-25 15:17:22\",\"pro_number\":10,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-08-23 22:10:49\"},\"new\":{\"id\":51,\"pro_name\":\"Kem Ch\\u1ed1ng N\\u1eafng Neutrogena Ultra Sheer Dry-Touch Sunscreen SPF70\",\"pro_slug\":\"kem-chong-nang-neutrogena-ultra-sheer-dry-touch-sunscreen-spf70\",\"pro_price\":\"250000\",\"pro_price_entry\":0,\"pro_category_id\":\"6\",\"pro_supplier_id\":1,\"pro_admin_id\":0,\"pro_sale\":\"12\",\"pro_expiration_date\":\"127\",\"pro_avatar\":\"19\",\"pro_view\":2,\"pro_hot\":127,\"pro_active\":1,\"pro_pay\":2,\"pro_number_import\":\"20\",\"pro_import_goods\":1,\"pro_description\":\"Kem ch\\u1ed1ng n\\u1eafng neutrogena Ultra Sheer Sunscreen v\\u1edbi c\\u00f4ng th\\u1ee9c \\u0111\\u1eb7c bi\\u1ec7t b\\u1ea3o v\\u1ec7 da tr\\u00e1nh tia UV t\\u1ed1i \\u0111a d\\u01b0\\u1edbi \\u00e1nh n\\u1eafng g\\u1eaft c\\u1ee7a m\\u00f9a h\\u00e8.- Da b\\u1ea1n s\\u1ebd kh\\u00f4ng b\\u1ecb b\\u00f3ng nh\\u1eddn, ng\\u01b0\\u1ee3c l\\u1ea1i, s\\u1ebd c\\u00f3 c\\u1ea3m gi\\u00e1c kh\\u00f4 r\\u00e1o v\\u00e0 nh\\u1eb9 nh\\u00e0ng.- S\\u1ea3n ph\\u1ea9m c\\u00f2n t\\u00edch h\\u1ee3p Butylene Glycol d\\u01b0\\u1ee1ng \\u1ea9m v\\u00e0 l\\u00e0m \\u0111\\u1eb9p da, Vitamin A, C, E nu\\u00f4i d\\u01b0\\u1ee1ng l\\u00e0n da.- C\\u00f4ng th\\u1ee9c Heliopex n\\u00e0y t\\u0103ng \\u0111\\u1ed9 b\\u1ec1n v\\u1eefng tr\\u01b0\\u1edbc \\u00e1nh n\\u1eafng, gi\\u00fap ch\\u1ed1ng n\\u1eafng \\u0111\\u01b0\\u1ee3c l\\u00e2u h\\u01a1n.\",\"pro_content\":\"test\",\"pro_review_total\":1,\"pro_review_star\":3,\"pro_age_review\":3,\"created_at\":\"2020-04-25 15:17:22\",\"pro_number\":10,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-08-23 22:10:49\"}}', '2020-08-23 15:10:49', '2020-08-23 15:10:49'),
(2, 'Product', 'Cập nhật product', 49, 'App\\Models\\Product', 1, 'App\\Models\\Admin', '{\"old\":{\"id\":49,\"pro_name\":\"N\\u01b0\\u01a1\\u0301c Hoa Nam Victoria\\u2019s Secret\",\"pro_slug\":\"nuoc-hoa-nam-victorias-secret\",\"pro_price\":\"950000\",\"pro_price_entry\":0,\"pro_category_id\":\"1\",\"pro_supplier_id\":1,\"pro_admin_id\":0,\"pro_sale\":\"1\",\"pro_expiration_date\":\"2020-09-30\",\"pro_avatar\":\"2020-04-25__49.jpg\",\"pro_view\":4,\"pro_hot\":1,\"pro_active\":1,\"pro_pay\":8,\"pro_number_import\":\"4\",\"pro_import_goods\":0,\"pro_description\":\"N\\u01b0\\u01a1\\u0301c Hoa Nam Victoria\\u2019s Secret\",\"pro_content\":\"N\\u01b0\\u01a1\\u0301c Hoa Nam Victoria\\u2019s Secret\",\"pro_review_total\":0,\"pro_review_star\":0,\"pro_age_review\":0,\"created_at\":\"2020-04-25 15:11:10\",\"pro_number\":4,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-09-01 22:57:29\"},\"new\":{\"id\":49,\"pro_name\":\"N\\u01b0\\u01a1\\u0301c Hoa Nam Victoria\\u2019s Secret\",\"pro_slug\":\"nuoc-hoa-nam-victorias-secret\",\"pro_price\":\"950000\",\"pro_price_entry\":0,\"pro_category_id\":\"1\",\"pro_supplier_id\":1,\"pro_admin_id\":0,\"pro_sale\":\"1\",\"pro_expiration_date\":\"2020-09-30\",\"pro_avatar\":\"2020-04-25__49.jpg\",\"pro_view\":4,\"pro_hot\":1,\"pro_active\":1,\"pro_pay\":8,\"pro_number_import\":\"4\",\"pro_import_goods\":0,\"pro_description\":\"N\\u01b0\\u01a1\\u0301c Hoa Nam Victoria\\u2019s Secret\",\"pro_content\":\"N\\u01b0\\u01a1\\u0301c Hoa Nam Victoria\\u2019s Secret\",\"pro_review_total\":0,\"pro_review_star\":0,\"pro_age_review\":0,\"created_at\":\"2020-04-25 15:11:10\",\"pro_number\":4,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-09-01 22:57:29\"}}', '2020-09-01 15:57:29', '2020-09-01 15:57:29'),
(3, 'Product', 'Cập nhật product', 49, 'App\\Models\\Product', 1, 'App\\Models\\Admin', '{\"old\":{\"id\":49,\"pro_name\":\"N\\u01b0\\u01a1\\u0301c Hoa Nam Victoria\\u2019s Secret\",\"pro_slug\":\"nuoc-hoa-nam-victorias-secret\",\"pro_price\":\"950000\",\"pro_price_entry\":0,\"pro_category_id\":\"1\",\"pro_supplier_id\":1,\"pro_admin_id\":0,\"pro_sale\":\"1\",\"pro_expiration_date\":\"2020-09-02\",\"pro_avatar\":\"2020-04-25__49.jpg\",\"pro_view\":4,\"pro_hot\":1,\"pro_active\":1,\"pro_pay\":8,\"pro_number_import\":\"4\",\"pro_import_goods\":0,\"pro_description\":\"N\\u01b0\\u01a1\\u0301c Hoa Nam Victoria\\u2019s Secret\",\"pro_content\":\"N\\u01b0\\u01a1\\u0301c Hoa Nam Victoria\\u2019s Secret\",\"pro_review_total\":0,\"pro_review_star\":0,\"pro_age_review\":0,\"created_at\":\"2020-04-25 15:11:10\",\"pro_number\":4,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-09-01 22:57:38\"},\"new\":{\"id\":49,\"pro_name\":\"N\\u01b0\\u01a1\\u0301c Hoa Nam Victoria\\u2019s Secret\",\"pro_slug\":\"nuoc-hoa-nam-victorias-secret\",\"pro_price\":\"950000\",\"pro_price_entry\":0,\"pro_category_id\":\"1\",\"pro_supplier_id\":1,\"pro_admin_id\":0,\"pro_sale\":\"1\",\"pro_expiration_date\":\"2020-09-02\",\"pro_avatar\":\"2020-04-25__49.jpg\",\"pro_view\":4,\"pro_hot\":1,\"pro_active\":1,\"pro_pay\":8,\"pro_number_import\":\"4\",\"pro_import_goods\":0,\"pro_description\":\"N\\u01b0\\u01a1\\u0301c Hoa Nam Victoria\\u2019s Secret\",\"pro_content\":\"N\\u01b0\\u01a1\\u0301c Hoa Nam Victoria\\u2019s Secret\",\"pro_review_total\":0,\"pro_review_star\":0,\"pro_age_review\":0,\"created_at\":\"2020-04-25 15:11:10\",\"pro_number\":4,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-09-01 22:57:38\"}}', '2020-09-01 15:57:38', '2020-09-01 15:57:38'),
(4, 'Product', 'Cập nhật product', 51, 'App\\Models\\Product', 1, 'App\\Models\\Admin', '{\"old\":{\"id\":51,\"pro_name\":\"Kem Ch\\u1ed1ng N\\u1eafng Neutrogena Ultra Sheer Dry-Touch Sunscreen SPF70\",\"pro_slug\":\"kem-chong-nang-neutrogena-ultra-sheer-dry-touch-sunscreen-spf70\",\"pro_price\":\"250000\",\"pro_price_entry\":0,\"pro_category_id\":\"6\",\"pro_supplier_id\":1,\"pro_admin_id\":0,\"pro_sale\":\"12\",\"pro_expiration_date\":\"128\",\"pro_avatar\":\"19\",\"pro_view\":3,\"pro_hot\":127,\"pro_active\":1,\"pro_pay\":2,\"pro_number_import\":\"20\",\"pro_import_goods\":1,\"pro_description\":\"Kem ch\\u1ed1ng n\\u1eafng neutrogena Ultra Sheer Sunscreen v\\u1edbi c\\u00f4ng th\\u1ee9c \\u0111\\u1eb7c bi\\u1ec7t b\\u1ea3o v\\u1ec7 da tr\\u00e1nh tia UV t\\u1ed1i \\u0111a d\\u01b0\\u1edbi \\u00e1nh n\\u1eafng g\\u1eaft c\\u1ee7a m\\u00f9a h\\u00e8.- Da b\\u1ea1n s\\u1ebd kh\\u00f4ng b\\u1ecb b\\u00f3ng nh\\u1eddn, ng\\u01b0\\u1ee3c l\\u1ea1i, s\\u1ebd c\\u00f3 c\\u1ea3m gi\\u00e1c kh\\u00f4 r\\u00e1o v\\u00e0 nh\\u1eb9 nh\\u00e0ng.- S\\u1ea3n ph\\u1ea9m c\\u00f2n t\\u00edch h\\u1ee3p Butylene Glycol d\\u01b0\\u1ee1ng \\u1ea9m v\\u00e0 l\\u00e0m \\u0111\\u1eb9p da, Vitamin A, C, E nu\\u00f4i d\\u01b0\\u1ee1ng l\\u00e0n da.- C\\u00f4ng th\\u1ee9c Heliopex n\\u00e0y t\\u0103ng \\u0111\\u1ed9 b\\u1ec1n v\\u1eefng tr\\u01b0\\u1edbc \\u00e1nh n\\u1eafng, gi\\u00fap ch\\u1ed1ng n\\u1eafng \\u0111\\u01b0\\u1ee3c l\\u00e2u h\\u01a1n.\",\"pro_content\":\"test\",\"pro_review_total\":1,\"pro_review_star\":3,\"pro_age_review\":3,\"created_at\":\"2020-04-25 15:17:22\",\"pro_number\":10,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-09-01 22:59:23\"},\"new\":{\"id\":51,\"pro_name\":\"Kem Ch\\u1ed1ng N\\u1eafng Neutrogena Ultra Sheer Dry-Touch Sunscreen SPF70\",\"pro_slug\":\"kem-chong-nang-neutrogena-ultra-sheer-dry-touch-sunscreen-spf70\",\"pro_price\":\"250000\",\"pro_price_entry\":0,\"pro_category_id\":\"6\",\"pro_supplier_id\":1,\"pro_admin_id\":0,\"pro_sale\":\"12\",\"pro_expiration_date\":\"128\",\"pro_avatar\":\"19\",\"pro_view\":3,\"pro_hot\":127,\"pro_active\":1,\"pro_pay\":2,\"pro_number_import\":\"20\",\"pro_import_goods\":1,\"pro_description\":\"Kem ch\\u1ed1ng n\\u1eafng neutrogena Ultra Sheer Sunscreen v\\u1edbi c\\u00f4ng th\\u1ee9c \\u0111\\u1eb7c bi\\u1ec7t b\\u1ea3o v\\u1ec7 da tr\\u00e1nh tia UV t\\u1ed1i \\u0111a d\\u01b0\\u1edbi \\u00e1nh n\\u1eafng g\\u1eaft c\\u1ee7a m\\u00f9a h\\u00e8.- Da b\\u1ea1n s\\u1ebd kh\\u00f4ng b\\u1ecb b\\u00f3ng nh\\u1eddn, ng\\u01b0\\u1ee3c l\\u1ea1i, s\\u1ebd c\\u00f3 c\\u1ea3m gi\\u00e1c kh\\u00f4 r\\u00e1o v\\u00e0 nh\\u1eb9 nh\\u00e0ng.- S\\u1ea3n ph\\u1ea9m c\\u00f2n t\\u00edch h\\u1ee3p Butylene Glycol d\\u01b0\\u1ee1ng \\u1ea9m v\\u00e0 l\\u00e0m \\u0111\\u1eb9p da, Vitamin A, C, E nu\\u00f4i d\\u01b0\\u1ee1ng l\\u00e0n da.- C\\u00f4ng th\\u1ee9c Heliopex n\\u00e0y t\\u0103ng \\u0111\\u1ed9 b\\u1ec1n v\\u1eefng tr\\u01b0\\u1edbc \\u00e1nh n\\u1eafng, gi\\u00fap ch\\u1ed1ng n\\u1eafng \\u0111\\u01b0\\u1ee3c l\\u00e2u h\\u01a1n.\",\"pro_content\":\"test\",\"pro_review_total\":1,\"pro_review_star\":3,\"pro_age_review\":3,\"created_at\":\"2020-04-25 15:17:22\",\"pro_number\":10,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-09-01 22:59:23\"}}', '2020-09-01 15:59:23', '2020-09-01 15:59:23'),
(5, 'Product', 'Cập nhật product', 51, 'App\\Models\\Product', 1, 'App\\Models\\Admin', '{\"old\":{\"id\":51,\"pro_name\":\"Kem Ch\\u1ed1ng N\\u1eafng Neutrogena Ultra Sheer Dry-Touch Sunscreen SPF70\",\"pro_slug\":\"kem-chong-nang-neutrogena-ultra-sheer-dry-touch-sunscreen-spf70\",\"pro_price\":\"250000\",\"pro_price_entry\":0,\"pro_category_id\":\"6\",\"pro_supplier_id\":1,\"pro_admin_id\":0,\"pro_sale\":\"12\",\"pro_expiration_date\":\"128\",\"pro_avatar\":\"19\",\"pro_view\":3,\"pro_hot\":127,\"pro_active\":1,\"pro_pay\":2,\"pro_number_import\":\"20\",\"pro_import_goods\":1,\"pro_description\":\"Kem ch\\u1ed1ng n\\u1eafng neutrogena Ultra Sheer Sunscreen v\\u1edbi c\\u00f4ng th\\u1ee9c \\u0111\\u1eb7c bi\\u1ec7t b\\u1ea3o v\\u1ec7 da tr\\u00e1nh tia UV t\\u1ed1i \\u0111a d\\u01b0\\u1edbi \\u00e1nh n\\u1eafng g\\u1eaft c\\u1ee7a m\\u00f9a h\\u00e8.- Da b\\u1ea1n s\\u1ebd kh\\u00f4ng b\\u1ecb b\\u00f3ng nh\\u1eddn, ng\\u01b0\\u1ee3c l\\u1ea1i, s\\u1ebd c\\u00f3 c\\u1ea3m gi\\u00e1c kh\\u00f4 r\\u00e1o v\\u00e0 nh\\u1eb9 nh\\u00e0ng.- S\\u1ea3n ph\\u1ea9m c\\u00f2n t\\u00edch h\\u1ee3p Butylene Glycol d\\u01b0\\u1ee1ng \\u1ea9m v\\u00e0 l\\u00e0m \\u0111\\u1eb9p da, Vitamin A, C, E nu\\u00f4i d\\u01b0\\u1ee1ng l\\u00e0n da.- C\\u00f4ng th\\u1ee9c Heliopex n\\u00e0y t\\u0103ng \\u0111\\u1ed9 b\\u1ec1n v\\u1eefng tr\\u01b0\\u1edbc \\u00e1nh n\\u1eafng, gi\\u00fap ch\\u1ed1ng n\\u1eafng \\u0111\\u01b0\\u1ee3c l\\u00e2u h\\u01a1n.\",\"pro_content\":\"test\",\"pro_review_total\":1,\"pro_review_star\":3,\"pro_age_review\":3,\"created_at\":\"2020-04-25 15:17:22\",\"pro_number\":10,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-09-01 22:59:41\"},\"new\":{\"id\":51,\"pro_name\":\"Kem Ch\\u1ed1ng N\\u1eafng Neutrogena Ultra Sheer Dry-Touch Sunscreen SPF70\",\"pro_slug\":\"kem-chong-nang-neutrogena-ultra-sheer-dry-touch-sunscreen-spf70\",\"pro_price\":\"250000\",\"pro_price_entry\":0,\"pro_category_id\":\"6\",\"pro_supplier_id\":1,\"pro_admin_id\":0,\"pro_sale\":\"12\",\"pro_expiration_date\":\"128\",\"pro_avatar\":\"19\",\"pro_view\":3,\"pro_hot\":127,\"pro_active\":1,\"pro_pay\":2,\"pro_number_import\":\"20\",\"pro_import_goods\":1,\"pro_description\":\"Kem ch\\u1ed1ng n\\u1eafng neutrogena Ultra Sheer Sunscreen v\\u1edbi c\\u00f4ng th\\u1ee9c \\u0111\\u1eb7c bi\\u1ec7t b\\u1ea3o v\\u1ec7 da tr\\u00e1nh tia UV t\\u1ed1i \\u0111a d\\u01b0\\u1edbi \\u00e1nh n\\u1eafng g\\u1eaft c\\u1ee7a m\\u00f9a h\\u00e8.- Da b\\u1ea1n s\\u1ebd kh\\u00f4ng b\\u1ecb b\\u00f3ng nh\\u1eddn, ng\\u01b0\\u1ee3c l\\u1ea1i, s\\u1ebd c\\u00f3 c\\u1ea3m gi\\u00e1c kh\\u00f4 r\\u00e1o v\\u00e0 nh\\u1eb9 nh\\u00e0ng.- S\\u1ea3n ph\\u1ea9m c\\u00f2n t\\u00edch h\\u1ee3p Butylene Glycol d\\u01b0\\u1ee1ng \\u1ea9m v\\u00e0 l\\u00e0m \\u0111\\u1eb9p da, Vitamin A, C, E nu\\u00f4i d\\u01b0\\u1ee1ng l\\u00e0n da.- C\\u00f4ng th\\u1ee9c Heliopex n\\u00e0y t\\u0103ng \\u0111\\u1ed9 b\\u1ec1n v\\u1eefng tr\\u01b0\\u1edbc \\u00e1nh n\\u1eafng, gi\\u00fap ch\\u1ed1ng n\\u1eafng \\u0111\\u01b0\\u1ee3c l\\u00e2u h\\u01a1n.\",\"pro_content\":\"test\",\"pro_review_total\":1,\"pro_review_star\":3,\"pro_age_review\":3,\"created_at\":\"2020-04-25 15:17:22\",\"pro_number\":10,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-09-01 22:59:41\"}}', '2020-09-01 15:59:41', '2020-09-01 15:59:41'),
(6, 'Product', 'Cập nhật product', 51, 'App\\Models\\Product', 1, 'App\\Models\\Admin', '{\"old\":{\"id\":51,\"pro_name\":\"Kem Ch\\u1ed1ng N\\u1eafng Neutrogena Ultra Sheer Dry-Touch Sunscreen SPF70\",\"pro_slug\":\"kem-chong-nang-neutrogena-ultra-sheer-dry-touch-sunscreen-spf70\",\"pro_price\":\"250000\",\"pro_price_entry\":0,\"pro_category_id\":\"6\",\"pro_supplier_id\":1,\"pro_admin_id\":0,\"pro_sale\":\"12\",\"pro_added_by\":\"admin\",\"pro_expiration_date\":\"127\",\"pro_avatar\":\"2020-09-02__fb-img-1532132041738.jpg\",\"pro_view\":3,\"pro_hot\":127,\"pro_active\":1,\"pro_pay\":2,\"pro_number_import\":\"20\",\"pro_import_goods\":1,\"pro_description\":\"Kem ch\\u1ed1ng n\\u1eafng neutrogena Ultra Sheer Sunscreen v\\u1edbi c\\u00f4ng th\\u1ee9c \\u0111\\u1eb7c bi\\u1ec7t b\\u1ea3o v\\u1ec7 da tr\\u00e1nh tia UV t\\u1ed1i \\u0111a d\\u01b0\\u1edbi \\u00e1nh n\\u1eafng g\\u1eaft c\\u1ee7a m\\u00f9a h\\u00e8.- Da b\\u1ea1n s\\u1ebd kh\\u00f4ng b\\u1ecb b\\u00f3ng nh\\u1eddn, ng\\u01b0\\u1ee3c l\\u1ea1i, s\\u1ebd c\\u00f3 c\\u1ea3m gi\\u00e1c kh\\u00f4 r\\u00e1o v\\u00e0 nh\\u1eb9 nh\\u00e0ng.- S\\u1ea3n ph\\u1ea9m c\\u00f2n t\\u00edch h\\u1ee3p Butylene Glycol d\\u01b0\\u1ee1ng \\u1ea9m v\\u00e0 l\\u00e0m \\u0111\\u1eb9p da, Vitamin A, C, E nu\\u00f4i d\\u01b0\\u1ee1ng l\\u00e0n da.- C\\u00f4ng th\\u1ee9c Heliopex n\\u00e0y t\\u0103ng \\u0111\\u1ed9 b\\u1ec1n v\\u1eefng tr\\u01b0\\u1edbc \\u00e1nh n\\u1eafng, gi\\u00fap ch\\u1ed1ng n\\u1eafng \\u0111\\u01b0\\u1ee3c l\\u00e2u h\\u01a1n.\",\"pro_content\":\"test\",\"pro_review_total\":1,\"pro_review_star\":3,\"pro_age_review\":3,\"created_at\":\"2020-04-25 15:17:22\",\"pro_number\":10,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-09-02 15:06:36\"},\"new\":{\"id\":51,\"pro_name\":\"Kem Ch\\u1ed1ng N\\u1eafng Neutrogena Ultra Sheer Dry-Touch Sunscreen SPF70\",\"pro_slug\":\"kem-chong-nang-neutrogena-ultra-sheer-dry-touch-sunscreen-spf70\",\"pro_price\":\"250000\",\"pro_price_entry\":0,\"pro_category_id\":\"6\",\"pro_supplier_id\":1,\"pro_admin_id\":0,\"pro_sale\":\"12\",\"pro_added_by\":\"admin\",\"pro_expiration_date\":\"127\",\"pro_avatar\":\"2020-09-02__fb-img-1532132041738.jpg\",\"pro_view\":3,\"pro_hot\":127,\"pro_active\":1,\"pro_pay\":2,\"pro_number_import\":\"20\",\"pro_import_goods\":1,\"pro_description\":\"Kem ch\\u1ed1ng n\\u1eafng neutrogena Ultra Sheer Sunscreen v\\u1edbi c\\u00f4ng th\\u1ee9c \\u0111\\u1eb7c bi\\u1ec7t b\\u1ea3o v\\u1ec7 da tr\\u00e1nh tia UV t\\u1ed1i \\u0111a d\\u01b0\\u1edbi \\u00e1nh n\\u1eafng g\\u1eaft c\\u1ee7a m\\u00f9a h\\u00e8.- Da b\\u1ea1n s\\u1ebd kh\\u00f4ng b\\u1ecb b\\u00f3ng nh\\u1eddn, ng\\u01b0\\u1ee3c l\\u1ea1i, s\\u1ebd c\\u00f3 c\\u1ea3m gi\\u00e1c kh\\u00f4 r\\u00e1o v\\u00e0 nh\\u1eb9 nh\\u00e0ng.- S\\u1ea3n ph\\u1ea9m c\\u00f2n t\\u00edch h\\u1ee3p Butylene Glycol d\\u01b0\\u1ee1ng \\u1ea9m v\\u00e0 l\\u00e0m \\u0111\\u1eb9p da, Vitamin A, C, E nu\\u00f4i d\\u01b0\\u1ee1ng l\\u00e0n da.- C\\u00f4ng th\\u1ee9c Heliopex n\\u00e0y t\\u0103ng \\u0111\\u1ed9 b\\u1ec1n v\\u1eefng tr\\u01b0\\u1edbc \\u00e1nh n\\u1eafng, gi\\u00fap ch\\u1ed1ng n\\u1eafng \\u0111\\u01b0\\u1ee3c l\\u00e2u h\\u01a1n.\",\"pro_content\":\"test\",\"pro_review_total\":1,\"pro_review_star\":3,\"pro_age_review\":3,\"created_at\":\"2020-04-25 15:17:22\",\"pro_number\":10,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-09-02 15:06:36\"}}', '2020-09-02 08:06:36', '2020-09-02 08:06:36'),
(7, 'Product', 'Cập nhật product', 53, 'App\\Models\\Product', 1, 'App\\User', '{\"old\":{\"id\":53,\"pro_name\":\"chung test create shop seller 1\",\"pro_slug\":\"chung-test-create-shop-seller-1\",\"pro_price\":\"50000\",\"pro_price_entry\":0,\"pro_category_id\":\"8\",\"pro_supplier_id\":0,\"pro_admin_id\":0,\"pro_user_id\":1,\"pro_sale\":\"50\",\"pro_added_by\":\"seller\",\"pro_expiration_date\":null,\"pro_avatar\":\"2020-09-02__101903174-1125597857795548-2092010616264061976-o.jpg\",\"pro_view\":0,\"pro_hot\":0,\"pro_active\":1,\"pro_pay\":0,\"pro_number_import\":\"12\",\"pro_import_goods\":0,\"pro_description\":\"m\\u00f4 t\\u1ea3 1\",\"pro_content\":\"<p>N\\u1ed9i dung 1<\\/p>\",\"pro_review_total\":0,\"pro_review_star\":0,\"pro_age_review\":0,\"created_at\":\"2020-09-02 16:03:34\",\"pro_number\":12,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-09-02 16:42:10\"},\"new\":{\"id\":53,\"pro_name\":\"chung test create shop seller 1\",\"pro_slug\":\"chung-test-create-shop-seller-1\",\"pro_price\":\"50000\",\"pro_price_entry\":0,\"pro_category_id\":\"8\",\"pro_supplier_id\":0,\"pro_admin_id\":0,\"pro_user_id\":1,\"pro_sale\":\"50\",\"pro_added_by\":\"seller\",\"pro_expiration_date\":null,\"pro_avatar\":\"2020-09-02__101903174-1125597857795548-2092010616264061976-o.jpg\",\"pro_view\":0,\"pro_hot\":0,\"pro_active\":1,\"pro_pay\":0,\"pro_number_import\":\"12\",\"pro_import_goods\":0,\"pro_description\":\"m\\u00f4 t\\u1ea3 1\",\"pro_content\":\"<p>N\\u1ed9i dung 1<\\/p>\",\"pro_review_total\":0,\"pro_review_star\":0,\"pro_age_review\":0,\"created_at\":\"2020-09-02 16:03:34\",\"pro_number\":12,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-09-02 16:42:10\"}}', '2020-09-02 09:42:10', '2020-09-02 09:42:10'),
(8, 'Product', 'Cập nhật product', 55, 'App\\Models\\Product', 1, 'App\\Models\\Admin', '{\"old\":{\"id\":55,\"pro_name\":\"chung test product222222222222\",\"pro_slug\":\"chung-test-product222222222222\",\"pro_price\":\"50000\",\"pro_price_entry\":0,\"pro_category_id\":\"1\",\"pro_supplier_id\":0,\"pro_admin_id\":0,\"pro_user_id\":0,\"pro_sale\":\"10\",\"pro_added_by\":\"admin\",\"pro_expiration_date\":\"100\",\"pro_avatar\":null,\"pro_view\":0,\"pro_hot\":0,\"pro_active\":1,\"pro_pay\":0,\"pro_number_import\":\"12\",\"pro_import_goods\":0,\"pro_description\":\"sdfs\",\"pro_content\":\"<p>sdfas2222222222222<\\/p>\",\"pro_review_total\":0,\"pro_review_star\":0,\"pro_age_review\":0,\"created_at\":\"2020-09-03 21:17:57\",\"pro_number\":12,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-09-03 21:18:32\"},\"new\":{\"id\":55,\"pro_name\":\"chung test product222222222222\",\"pro_slug\":\"chung-test-product222222222222\",\"pro_price\":\"50000\",\"pro_price_entry\":0,\"pro_category_id\":\"1\",\"pro_supplier_id\":0,\"pro_admin_id\":0,\"pro_user_id\":0,\"pro_sale\":\"10\",\"pro_added_by\":\"admin\",\"pro_expiration_date\":\"100\",\"pro_avatar\":null,\"pro_view\":0,\"pro_hot\":0,\"pro_active\":1,\"pro_pay\":0,\"pro_number_import\":\"12\",\"pro_import_goods\":0,\"pro_description\":\"sdfs\",\"pro_content\":\"<p>sdfas2222222222222<\\/p>\",\"pro_review_total\":0,\"pro_review_star\":0,\"pro_age_review\":0,\"created_at\":\"2020-09-03 21:17:57\",\"pro_number\":12,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-09-03 21:18:32\"}}', '2020-09-03 14:18:32', '2020-09-03 14:18:32'),
(9, 'Product', 'Cập nhật product', 55, 'App\\Models\\Product', 1, 'App\\Models\\Admin', '{\"old\":{\"id\":55,\"pro_name\":\"chung test product222222222222\",\"pro_slug\":\"chung-test-product222222222222\",\"pro_price\":\"50000\",\"pro_price_entry\":0,\"pro_category_id\":\"1\",\"pro_supplier_id\":0,\"pro_admin_id\":0,\"pro_user_id\":0,\"pro_sale\":\"10\",\"pro_added_by\":\"admin\",\"pro_expiration_date\":null,\"pro_avatar\":null,\"pro_view\":0,\"pro_hot\":0,\"pro_active\":1,\"pro_pay\":0,\"pro_number_import\":\"12\",\"pro_import_goods\":0,\"pro_description\":\"sdfs\",\"pro_content\":\"<p>sdfas2222222222222<\\/p>\",\"pro_review_total\":0,\"pro_review_star\":0,\"pro_age_review\":0,\"created_at\":\"2020-09-03 21:17:57\",\"pro_number\":12,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-09-03 21:18:54\"},\"new\":{\"id\":55,\"pro_name\":\"chung test product222222222222\",\"pro_slug\":\"chung-test-product222222222222\",\"pro_price\":\"50000\",\"pro_price_entry\":0,\"pro_category_id\":\"1\",\"pro_supplier_id\":0,\"pro_admin_id\":0,\"pro_user_id\":0,\"pro_sale\":\"10\",\"pro_added_by\":\"admin\",\"pro_expiration_date\":null,\"pro_avatar\":null,\"pro_view\":0,\"pro_hot\":0,\"pro_active\":1,\"pro_pay\":0,\"pro_number_import\":\"12\",\"pro_import_goods\":0,\"pro_description\":\"sdfs\",\"pro_content\":\"<p>sdfas2222222222222<\\/p>\",\"pro_review_total\":0,\"pro_review_star\":0,\"pro_age_review\":0,\"created_at\":\"2020-09-03 21:17:57\",\"pro_number\":12,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-09-03 21:18:54\"}}', '2020-09-03 14:18:54', '2020-09-03 14:18:54'),
(10, 'Product', 'Cập nhật product', 56, 'App\\Models\\Product', 1, 'App\\Models\\Admin', '{\"old\":{\"id\":56,\"pro_name\":\"sdfsdfds\",\"pro_slug\":\"sdfsdfds\",\"pro_price\":\"12000\",\"pro_price_entry\":0,\"pro_category_id\":\"4\",\"pro_supplier_id\":0,\"pro_admin_id\":0,\"pro_user_id\":0,\"pro_sale\":\"12\",\"pro_added_by\":\"admin\",\"pro_avatar\":null,\"pro_view\":0,\"pro_hot\":0,\"pro_active\":1,\"pro_pay\":0,\"pro_number_import\":\"21\",\"pro_import_goods\":0,\"pro_description\":\"dsfsd\",\"pro_content\":\"<p>sdfds<\\/p>\",\"pro_review_total\":0,\"pro_review_star\":0,\"pro_age_review\":0,\"created_at\":\"2020-09-03 21:22:48\",\"pro_number\":21,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-09-03 21:29:55\"},\"new\":{\"id\":56,\"pro_name\":\"sdfsdfds\",\"pro_slug\":\"sdfsdfds\",\"pro_price\":\"12000\",\"pro_price_entry\":0,\"pro_category_id\":\"4\",\"pro_supplier_id\":0,\"pro_admin_id\":0,\"pro_user_id\":0,\"pro_sale\":\"12\",\"pro_added_by\":\"admin\",\"pro_avatar\":null,\"pro_view\":0,\"pro_hot\":0,\"pro_active\":1,\"pro_pay\":0,\"pro_number_import\":\"21\",\"pro_import_goods\":0,\"pro_description\":\"dsfsd\",\"pro_content\":\"<p>sdfds<\\/p>\",\"pro_review_total\":0,\"pro_review_star\":0,\"pro_age_review\":0,\"created_at\":\"2020-09-03 21:22:48\",\"pro_number\":21,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-09-03 21:29:55\"}}', '2020-09-03 14:29:55', '2020-09-03 14:29:55'),
(11, 'Product', 'Cập nhật product', 53, 'App\\Models\\Product', 1, 'App\\Models\\Admin', '{\"old\":{\"id\":53,\"pro_name\":\"chung test create shop seller 1\",\"pro_slug\":\"chung-test-create-shop-seller-1\",\"pro_price\":\"50000\",\"pro_price_entry\":0,\"pro_category_id\":\"8\",\"pro_supplier_id\":0,\"pro_admin_id\":0,\"pro_user_id\":1,\"pro_sale\":\"50\",\"pro_added_by\":\"seller\",\"pro_avatar\":\"2020-09-02__101903174-1125597857795548-2092010616264061976-o.jpg\",\"pro_view\":0,\"pro_hot\":0,\"pro_active\":1,\"pro_pay\":0,\"pro_number_import\":\"12\",\"pro_import_goods\":0,\"pro_description\":\"m\\u00f4 t\\u1ea3 1\",\"pro_content\":\"<p>N\\u1ed9i dung 1<\\/p>\",\"pro_review_total\":0,\"pro_review_star\":0,\"pro_age_review\":0,\"created_at\":\"2020-09-02 16:03:34\",\"pro_number\":12,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-09-20 10:25:44\"},\"new\":{\"id\":53,\"pro_name\":\"chung test create shop seller 1\",\"pro_slug\":\"chung-test-create-shop-seller-1\",\"pro_price\":\"50000\",\"pro_price_entry\":0,\"pro_category_id\":\"8\",\"pro_supplier_id\":0,\"pro_admin_id\":0,\"pro_user_id\":1,\"pro_sale\":\"50\",\"pro_added_by\":\"seller\",\"pro_avatar\":\"2020-09-02__101903174-1125597857795548-2092010616264061976-o.jpg\",\"pro_view\":0,\"pro_hot\":0,\"pro_active\":1,\"pro_pay\":0,\"pro_number_import\":\"12\",\"pro_import_goods\":0,\"pro_description\":\"m\\u00f4 t\\u1ea3 1\",\"pro_content\":\"<p>N\\u1ed9i dung 1<\\/p>\",\"pro_review_total\":0,\"pro_review_star\":0,\"pro_age_review\":0,\"created_at\":\"2020-09-02 16:03:34\",\"pro_number\":12,\"pro_resistant\":null,\"pro_energy\":null,\"pro_country\":0,\"updated_at\":\"2020-09-20 10:25:44\"}}', '2020-09-20 03:25:44', '2020-09-20 03:25:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_login` text COLLATE utf8mb4_unicode_ci,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone`, `log_login`, `class`, `address`, `level`, `status`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$kNYA/jfQW0d4KS9blR0SOODPwVXB.Mr43sx.GbKGiZj6rlCiilXEm', '0988999999', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(2, 'Nhân viên', 'nhanvien@gmail.com', '$2y$10$kNYA/jfQW0d4KS9blR0SOODPwVXB.Mr43sx.GbKGiZj6rlCiilXEm', '0986420994', NULL, NULL, NULL, 2, 1, NULL, '2020-06-12 23:23:32', NULL),
(3, 'chungdd', 'testperrmis@gmail.com', '$2y$10$OhHbM/6psKd4yNk7IAT/xuZrmzGP6IYdeI5ovnha6FMMumyC/lyL.', '1222', NULL, NULL, NULL, 1, 1, NULL, '2020-09-17 04:10:41', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `a_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_hot` tinyint(4) NOT NULL DEFAULT '0',
  `a_active` tinyint(4) NOT NULL DEFAULT '1',
  `a_menu_id` int(11) NOT NULL DEFAULT '0',
  `a_view` int(11) NOT NULL DEFAULT '0',
  `a_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `a_avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `a_position_2` tinyint(4) NOT NULL DEFAULT '0',
  `a_position_1` tinyint(4) NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `articles`
--

INSERT INTO `articles` (`id`, `a_name`, `a_slug`, `a_hot`, `a_active`, `a_menu_id`, `a_view`, `a_description`, `a_avatar`, `a_content`, `created_at`, `a_position_2`, `a_position_1`, `updated_at`) VALUES
(1, '3 sản phẩm nổi tiếng nào của Dior bất ngờ bị thu hồi tại Việt Nam', '3-san-pham-noi-tieng-nao-cua-dior-bat-ngo-bi-thu-hoi-tai-viet-nam', 1, 1, 3, 0, 'Cục Quản lý dược (Bộ Y tế) vừa ban hành 2 Công văn gửi Sở Y tế các tỉnh, thành phố trên cả nước thông báo việc đình chỉ lưu hành, thu hồi 3 sản phẩm mỹ phẩm của Dior (Pháp) sản xuất, do Công ty L-', '2020-04-24__anh-1.jpg', '<p>Sản phẩm n&agrave;y bị thu hồi do c&oacute; chứa chất Propylparaben c&oacute; h&agrave;m lượng vượt qu&aacute; giới hạn cho ph&eacute;p theo quy định của Asean. Hai sản phẩm c&ograve;n lại l&agrave; 2 d&ograve;ng nước hoa nổi tiếng: Dior Homme Sport very cool spray fresh eau de toilette (nước hoa cho nam, c&ocirc;ng bố số tiếp nhận phiếu c&ocirc;ng bố sản phẩm ng&agrave;y 3-1-2018) v&agrave; Dior J&rsquo;Adore L&rsquo;or Essence de Parfum (nước hoa cho nữ, c&ocirc;ng bố số tiếp nhận phiếu c&ocirc;ng bố sản phẩm ng&agrave;y 21-6-2017) bị thu hồi do c&oacute; th&agrave;nh phần c&ocirc;ng thức ghi tr&ecirc;n nh&atilde;n v&agrave; c&ocirc;ng thức sản xuất kh&ocirc;ng đ&uacute;ng như hồ sơ đ&atilde; c&ocirc;ng bố.</p>\r\n\r\n<p>Theo Cục Quản l&yacute; dược, c&aacute;c quyết định n&agrave;y dựa tr&ecirc;n kết quả hậu kiểm tại C&ocirc;ng ty L-Beauty Việt Nam. Cục y&ecirc;u cầu c&ocirc;ng ty n&agrave;y phải tiến h&agrave;nh thu hồi to&agrave;n bộ c&aacute;c sản phẩm mỹ phẩm tr&ecirc;n, đồng thời phải gửi th&ocirc;ng b&aacute;o thu hồi tới tất cả những nơi ph&acirc;n phối, sử dụng sản phẩm. Kết quả thu hồi gửi về Cục Quản l&yacute; dược trước ng&agrave;y 25/4.</p>', '2020-04-23 20:35:28', 0, 1, '2020-04-26 07:09:55'),
(2, 'Top 5 Cách Vừa Làm Đẹp Da, Vừa Phòng Ngừa Dịch Bệnh “Cô Výt”', 'top-5-cach-vua-lam-dep-da-vua-phong-ngua-dich-benh-co-vyt', 1, 1, 1, 0, 'Bí quyết vừa giúp làm đẹp da lại phòng ngừa dịch bệnh Corona hữu hiệu, cùng nhau tìm hiểu và khám phá trong bài viết ngay sau đây!', '2020-04-25__51.jpg', '<h2><strong>1. Thường xuy&ecirc;n đeo khẩu trang khi ra ngo&agrave;i</strong></h2>\r\n\r\n<p>Khẩu trang từng được xem l&agrave; vật dụng kh&ocirc;ng thể thiếu trong t&uacute;i x&aacute;ch của chị em phụ nữ mỗi khi ra đường. Nhằm che chắn l&agrave;n da tr&aacute;nh khỏi t&aacute;c động xấu của kh&oacute;i bụi, m&ocirc;i trường &ocirc; nhiễm v&agrave; &aacute;nh nắng mặt trời. Tia UV v&agrave; kh&oacute;i bụi c&oacute; thể l&agrave; nguy&ecirc;n d&acirc;n khiến l&agrave;n da l&atilde;o h&oacute;a. Xuất hiện th&acirc;m n&aacute;m, t&agrave;n nhang, lỗ ch&acirc;n l&ocirc;ng bị b&iacute;t tắc, sản sinh mụn,&hellip; G&acirc;y hại nghi&ecirc;m trọng đến sức khỏe của l&agrave;n da v&agrave; cơ thể.</p>\r\n\r\n<p>Hiện nay, trong thời điểm dịch bệnh b&ugrave;ng ph&aacute;t mạnh th&igrave; khẩu trang lại l&agrave; vật bất ly th&acirc;n của mỗi người khi ra đường v&agrave; tiếp x&uacute;c với người kh&aacute;c. Bởi virus Corona c&oacute; khả năng l&acirc;y lan rất nhanh qua đường h&ocirc; hấp. V&agrave; c&oacute; thể g&acirc;y nguy hiểm đến t&iacute;nh mạng. Việc đeo khẩu trang hiện nay kh&ocirc;ng những gi&uacute;p bảo vệ l&agrave;n da mỏng manh tr&aacute;nh khỏi những t&aacute;c hại từ b&ecirc;n ngo&agrave;i. M&agrave; c&ograve;n ph&ograve;ng ngừa dịch bệnh v&ocirc; c&ugrave;ng hữu hiệu.</p>\r\n\r\n<p><a href=\"https://beautygarden.vn/Upload/tinymce/2020/3/30/top-5-cach-vua-lam-dep-da-vua-phong-ngua-dich-benh-co-vyt-hinh-anh-1.jpg\" target=\"_blank\" title=\"Top 5 cách vừa làm đẹp da, vừa phòng ngừa dịch bệnh “Cô Výt” hình ảnh 1\"><img alt=\"top 5 cach vua lam dep da vua phong ngua dich benh co vyt hinh anh 1\" src=\"https://beautygarden.vn/Upload/tinymce/2020/3/30/top-5-cach-vua-lam-dep-da-vua-phong-ngua-dich-benh-co-vyt-hinh-anh-1.jpg\" style=\"height:1080px; width:1080px\" /></a></p>\r\n\r\n<h2><strong>2. Kh&ocirc;ng trực tiếp sờ tay l&ecirc;n mặt</strong></h2>\r\n\r\n<p>Từ trước đến nay, trong việc l&agrave;m đẹp da. Chắc hẳn nhiều chị em phụ nữ đ&atilde; từng nghe n&oacute;i đến nguy&ecirc;n tắc kh&ocirc;ng được sờ tay trực tiếp l&ecirc;n da nếu chưa được vệ sinh đ&uacute;ng c&aacute;ch. B&agrave;n tay mỗi ng&agrave;y đ&atilde; tiếp x&uacute;c với rất nhiều đồ vật. Nếu bạn sở l&ecirc;n da th&igrave; sẽ tạo cơ hội cho vi khuẩn x&acirc;m nhập v&agrave; g&acirc;y hại l&agrave;n da. H&agrave;nh động tưởng chừng v&ocirc; thức n&agrave;y lại khiến qu&aacute; tr&igrave;nh chăm s&oacute;c da của bạn trở n&ecirc;n v&ocirc; &iacute;ch. Đặc biệt, trong thời điểm dịch bệnh Corona b&ugrave;ng ph&aacute;t th&igrave; việc sờ tay l&ecirc;n mặt c&oacute; thể dễ d&agrave;ng l&agrave;m l&acirc;y lan virus truyền bệnh g&acirc;y hại cho bản th&acirc;n v&agrave; những người xung quanh. Tuyệt đối kh&ocirc;ng v&ocirc; thức sờ tay l&ecirc;n da mặt nếu b&agrave;n tay chưa đảm bảo vệ sinh trong suốt cả ng&agrave;y.</p>\r\n\r\n<p><a href=\"https://beautygarden.vn/Upload/tinymce/2020/3/30/top-5-cach-vua-lam-dep-da-vua-phong-ngua-dich-benh-co-vyt-hinh-anh-2.jpg\" target=\"_blank\" title=\"Top 5 cách vừa làm đẹp da, vừa phòng ngừa dịch bệnh “Cô Výt” hình ảnh 2\"><img alt=\"top 5 cach vua lam dep da vua phong ngua dich benh co vyt hinh anh 2\" src=\"https://beautygarden.vn/Upload/tinymce/2020/3/30/top-5-cach-vua-lam-dep-da-vua-phong-ngua-dich-benh-co-vyt-hinh-anh-2.jpg\" style=\"height:1049px; width:1079px\" /></a></p>\r\n\r\n<p><strong>Tham khảo một số sản phẩm chăm s&oacute;c da mặt tại đ&acirc;y:&nbsp;<a href=\"https://bit.ly/2wLIHx5\">https://bit.ly/2wLIHx5</a></strong></p>\r\n\r\n<h2><strong>3. Kh&ocirc;ng b&oacute;c da m&ocirc;i, kh&ocirc;ng dụi mắt</strong></h2>\r\n\r\n<p>H&agrave;nh động b&oacute;c da m&ocirc;i khiến cho l&agrave;n da m&ocirc;i vốn kh&ocirc;, mỏng manh, thiếu ẩm. Dễ bong tr&oacute;c nay lại c&agrave;ng bị tổn thương nghi&ecirc;m trọng hơn. Việc dụi mắt cũng l&agrave; h&agrave;nh động kh&ocirc;ng n&ecirc;n bởi g&acirc;y hại cho v&ugrave;ng da quanh mắt. Khiến xuất hiện quầng th&acirc;m, bọng mắt, rụng mi v&agrave; l&agrave;n da cũng trở n&ecirc;n k&eacute;m sức sống. Trong thời điểm nhạy cảm n&agrave;y, việc b&oacute;c da m&ocirc;i hay dụi mắt cũng l&agrave; h&agrave;nh động tạo cơ hội cho virus g&acirc;y bệnh dễ d&agrave;ng x&acirc;m nhập v&agrave;o cơ thể. Tr&aacute;nh xa những h&agrave;nh động n&agrave;y nhằm l&agrave;m đẹp da v&agrave; bảo vệ sức khỏe bản th&acirc;n.</p>\r\n\r\n<p><strong>Sản phẩm dưỡng da mắt, bạn c&oacute; thể tham khảo:&nbsp;<a href=\"http://bit.ly/2SKMstj\">http://bit.ly/2SKMstj</a></strong></p>\r\n\r\n<h2><strong>4. Rửa tay cẩn thận với nước rửa tay</strong></h2>\r\n\r\n<p>Ngo&agrave;i khẩu trang th&igrave; hiện nay, trong m&ugrave;a dịch bệnh, nước rửa tay đang trở th&agrave;nh m&oacute;n đồ v&ocirc; c&ugrave;ng &ldquo;hot trend&rdquo;, ch&aacute;y h&agrave;ng v&agrave; rất kh&oacute; để t&igrave;m mua. Nước rửa tay kh&ocirc; kh&ocirc;ng những gi&uacute;p l&agrave;m sạch tay ngay tại chỗ, chăm s&oacute;c l&agrave;n da tay mềm mịn m&agrave; c&ograve;n ngăn ngừa vi khuẩn, virus g&acirc;y bệnh hữu hiệu. H&atilde;y sử dụng nước rửa tay trước v&agrave; sau khi d&ugrave;ng bữa, sau khi đi vệ sinh, sau khi từ b&ecirc;n ngo&agrave;i v&agrave;o,&hellip;để đảm bảo nu&ocirc;i dưỡng da tay v&agrave; ph&ograve;ng ngừa dịch bệnh hiệu quả.</p>\r\n\r\n<p><a href=\"https://beautygarden.vn/Upload/images/top-5-cach-vua-lam-dep-da-vua-phong-ngua-dich-benh-co-vyt-hinh-anh-3.png\" target=\"_blank\" title=\"Top 5 cách vừa làm đẹp da, vừa phòng ngừa dịch bệnh “Cô Výt” hình ảnh 3\"><img alt=\"top 5 cach vua lam dep da vua phong ngua dich benh co vyt hinh anh 3\" src=\"https://beautygarden.vn/Upload/images/top-5-cach-vua-lam-dep-da-vua-phong-ngua-dich-benh-co-vyt-hinh-anh-3.png\" /></a></p>\r\n\r\n<p><strong>Đặt h&agrave;ng nước rửa tay ngay bạn nh&eacute;:&nbsp;<a href=\"https://bit.ly/2UO2SCm\">https://bit.ly/2UO2SCm</a></strong></p>\r\n\r\n<h2><strong>5. Vệ sinh m&agrave;n h&igrave;nh điện thoại thường xuy&ecirc;n</strong></h2>\r\n\r\n<p style=\"text-align:justify\">Điện thoại đường như l&agrave; vật bất ly th&acirc;n đối với chị em phụ nữ hiện đại ng&agrave;y nay. Bởi n&oacute; mang đến rất nhiều t&iacute;nh năng ưu việt. Tuy nhi&ecirc;n, m&agrave;n h&igrave;nh điện thoại cũng ẩn chứa v&ocirc; v&agrave;ng bụi bẩn, vi khuẩn m&agrave; mắt thường kh&ocirc;ng thể nhận biết. H&atilde;y chủ động vệ sinh m&agrave;n h&igrave;nh điện thoại thường xuy&ecirc;n nhằm ngăn ngừa vi khuẩn, virus tr&ecirc;n m&agrave;n h&igrave;nh c&oacute; thể tiếp x&uacute;c trực tiếp với da tay v&agrave; x&acirc;m nhập g&acirc;y hại cho cơ thể. Đ&acirc;y kh&ocirc;ng những l&agrave; th&oacute;i quen chăm s&oacute;c da hiệu quả m&agrave; c&ograve;n gi&uacute;p ph&ograve;ng ngừa dịch bệnh tối đa.</p>', '2020-04-25 08:22:03', 0, 1, '2020-04-26 08:53:07'),
(3, 'Mỹ Phẩm Khoáng- Hãy Là Người Sành Sỏi', 'my-pham-khoang-hay-la-nguoi-sanh-soi', 1, 1, 1, 0, 'Lựa chọn mỹ phẩm phù hợp', '2020-04-25__52.jpg', '<p><strong>1. Th&iacute;ch hợp cho mọi loại da, đặc biệt l&agrave; da dầu:</strong></p>\r\n\r\n<p>Sản phẩm mỹ phẩm kho&aacute;ng uy t&iacute;n, được sản xuất từ 100%&nbsp; kho&aacute;ng chất ho&agrave;n to&agrave;n từ thi&ecirc;n nhi&ecirc;n, kh&ocirc;ng chứa chất bảo quản, chứa dầu, chất tạo m&agrave;u hay m&ugrave;i hương nước hoa&hellip;đẩm bảo an to&agrave;n hết mức cho da, kể cả l&agrave; da nhạy cảm. Mỹ phẩm kho&aacute;ng trở th&agrave;nh một sản phẩm đ&aacute;nh dấu sự vượt trội về sự tiến bộ của ng&agrave;nh c&ocirc;ng nghiệp mỹ phẩm. Mỹ phẩm kho&aacute;ng chủ yếu l&agrave; ở dạng bột mịn, n&ecirc;n da đ&acirc;u v&agrave; dễ bị mụn l&agrave; loại da th&iacute;ch hợp nhất để sử dụng ch&uacute;ng. Với c&aacute;c ưu điểm tuyệt vời tr&ecirc;n, mỹ phẩm kho&aacute;ng tạo một lớp trang điểm ho&agrave;n hảo cho da dầu: lớp trang điểm mịn tự nhi&ecirc;n tr&ecirc;n da v&agrave; kh&ocirc;ng thấm v&agrave;o lỗ ch&acirc;n l&ocirc;ng, kh&ocirc;ng cho c&aacute;c t&aacute;c nh&acirc;n g&acirc;y mụn c&oacute; cơ hội ph&aacute;t triển. Đối với trang điểm mỹ phẩm kho&aacute;ng cho da kh&ocirc;, bạn c&oacute; thể sử dụng một loại xịt phun sương tạo độ ẩm để sử dụng sau khi&nbsp; ho&agrave;n th&agrave;nh việc trang điểm với mỹ phẩm kho&aacute;ng.</p>\r\n\r\n<p><img alt=\"Lựa chọn những loại mỹ phẩm có thể phù hợp cho mọi loại da\" src=\"https://beautygarden.vn/Files/Uploads/news/lua-chon-my-pham-phu-hop-voi-moi-loai-da(1).jpg\" title=\"Lựa chọn những loại mỹ phẩm có thể phù hợp cho mọi loại da\" /></p>\r\n\r\n<h4>Lựa chọn những loại mỹ phẩm c&oacute; thể ph&ugrave; hợp cho mọi loại da</h4>\r\n\r\n<p><strong>2. Đề ph&ograve;ng m</strong><strong>ột số kho&aacute;ng chất c&oacute; hại cho da:</strong></p>\r\n\r\n<p>Hiện nay sự lan tr&agrave;n của mỹ phẩm tr&ecirc;n thị trường l&agrave; kh&oacute; kiểm so&aacute;t, người ti&ecirc;u d&ugrave;ng cũng l&ecirc;n thật th&ocirc;ng minh trong lựa chọn. để tr&aacute;nh mua phải những loại mỹ phẩm kh&ocirc;ng tốt. Mỹ phẩm kho&aacute;ng cũng vậy c&oacute; một v&agrave;i c&ocirc;ng ty sử dụng th&ecirc;m những kho&aacute;ng chất c&oacute; hại cho da như: Bismuth oxychloride v&agrave;o sane phẩm của m&igrave;nh. H&atilde;y t&igrave;m hiểu v&agrave; để &yacute; tới th&agrave;nh phần của mỹ phẩm kho&aacute;ng để tr&aacute;nh cho l&agrave;n da của m&igrave;nh bị x&acirc;m hại.</p>\r\n\r\n<p><img alt=\"Xem kỹ những thành phần của loại mỹ phẩm tránh gây tổn hại cho da\" src=\"https://beautygarden.vn/Files/Uploads/news/xem-ky-nhung-thanh-phan-cua-my-pham(1).jpg\" title=\"Xem kỹ những thành phần của loại mỹ phẩm tránh gây tổn hại cho da\" /></p>\r\n\r\n<h4>Xem kỹ những th&agrave;nh phần của loại mỹ phẩm tr&aacute;nh g&acirc;y tổn hại cho da</h4>\r\n\r\n<p><strong>3. Khả năng chống nắng:</strong></p>\r\n\r\n<p>Mỹ phẩm kho&aacute;ng c&ograve;n c&oacute; một đặc t&iacute;nh cực k&igrave; tuyệt với đối với l&agrave;n da l&agrave; khả năng chống nắng cho da. Khả năng đ&oacute; l&agrave; nhờ v&agrave;o những chất titanium dioxide v&agrave; &ocirc; x&iacute;t kẽm c&oacute; trong đa số c&aacute;c sản phẩm mỹ phẩm kho&aacute;ng c&oacute; khả năng chống lại c&aacute;c tia cực t&iacute;m, tia UV c&oacute; hại cho da.</p>\r\n\r\n<p><strong>4. Khả năng h&ograve;a trộn với nhau:</strong></p>\r\n\r\n<p>Bởi kh&ocirc;ng chứa những h&oacute;a chất độc hại giống như mỹ phẩm th&ocirc;ng thường n&ecirc;n mỹ phẩm kho&aacute;ng ho&agrave;n to&agrave;n c&oacute; thể tự pha trộn lại với nhau m&agrave; kh&ocirc;ng sợ bất cứ phản ứng h&oacute;a học n&agrave;o xảy ra. Thật tuyệt vời phải kh&ocirc;ng? Đ&acirc;y l&agrave; một th&ocirc;ng tin rất vui mừng cho tất cả những ai y&ecirc;u th&iacute;ch sự s&aacute;ng tạo v&agrave; l&agrave;m đẹp trong trang điểm. Bạn c&oacute; thể h&ograve;a trộn mỹ phẩm theo m&agrave;u sắc ri&ecirc;ng, theo &yacute; th&iacute;ch để tạo ra sự độc đ&aacute;o ri&ecirc;ng của m&igrave;nh.</p>\r\n\r\n<p><img alt=\"Phối trộn các loại mỹ phẩm tạo ra sự độc đáo riêng\" src=\"https://beautygarden.vn/Files/Uploads/news/Phoi-tron-my-pham-tao-ra-su-doc-dao-rieng(1).jpg\" title=\"Phối trộn các loại mỹ phẩm tạo ra sự độc đáo riêng\" /></p>\r\n\r\n<h4>Phối trộn c&aacute;c loại mỹ phẩm tạo ra sự độc đ&aacute;o ri&ecirc;ng</h4>\r\n\r\n<p><strong>5. Sử dụng trang điểm mỹ phẩm kho&aacute;ng đ&uacute;ng c&aacute;ch:</strong></p>\r\n\r\n<p>Mỹ phẩm kho&aacute;ng chủ yếu l&agrave; dạng bột, c&oacute; nhiều bạn sẽ bối rối trong những lần đầu sử dụng thoa n&oacute; l&ecirc;n da của m&igrave;nh. Chỉ cần c&oacute; một chiếc cọ l&ocirc;ng mềm mại, bạn những cọ v&agrave;o lọ, lắc nhẹ hoặc dốc lọ mỹ phẩm cho phấn phủ đều l&ecirc;n cọ l&agrave; được.&nbsp; D&ugrave;ng cọ đ&atilde; thấm bột kho&aacute;ng nhẹ nh&agrave;ng đưa l&ecirc;n mặt v&agrave; di chuyển nhẹ theo hướng của l&ocirc;ng tơ tr&ecirc;n mặt để tạo n&ecirc;n một lớp trang điểm tự nhi&ecirc;n nhất cho da.</p>\r\n\r\n<p><strong>6. Đa t&iacute;nh năng trong sử dụng:</strong></p>\r\n\r\n<p style=\"text-align:justify\">T&iacute;nh đa năng trong sử dụng l&agrave; v&ocirc; tận. ch&uacute;ng c&oacute; thể được sử dụng với rất nhiều c&ocirc;ng dụng kh&aacute;c nhau m&agrave; kh&ocirc;ng dừng lại ở một hoặc hai c&ocirc;ng dụng như mỹ phẩm th&ocirc;ng thường. Bởi mỹ phẩm kho&aacute;ng ở dạng bột, bạn c&oacute; thể tạo ra bất cứ sản phẩm trang điểm n&agrave;o, c&ocirc;ng dụng n&agrave;o m&agrave; bạn muốn. Chỉ cần khi đ&atilde; th&ocirc;ng thạo kiến thức sử dụng mỹ phẩm kho&aacute;ng, bạn sẽ dễ d&agrave;ng trở th&agrave;nh một người s&agrave;nh sỏi v&agrave; s&agrave;nh điệu trong trang điểm đ&oacute;. M&aacute;ch nhỏ cho bạn, mỹ phẩm kho&aacute;ng c&oacute; thể trộn với nước để tạo th&agrave;nh những sản phẩm kem dưỡng da, hay kem che khuyết điểm cực hiệu quả.</p>\r\n\r\n<p>Ch&uacute;c bạn lu&ocirc;n khỏe mạnh v&agrave; xinh đẹp!</p>', '2020-04-25 08:23:23', 0, 0, '2020-04-25 08:38:00'),
(4, '5 Bước Trang Điểm Cho Da Dầu Hiệu Quả', '5-buoc-trang-diem-cho-da-dau-hieu-qua', 0, 1, 3, 0, 'Trang điểm cho da dầu luôn trở nên khó khăn. Nếu không chú ý và trang điểm không đúng cách, bạn sẽ làm hại làn da của bạn.', '2020-04-25__53.jpg', '<p style=\"text-align:justify\"><strong>Bước 1: Loại bỏ chất dầu</strong></p>\r\n\r\n<p style=\"text-align:justify\">&ndash; Tr&aacute;nh sử dụng tuỳ &yacute; c&aacute;c loại sữa rửa mặt th&ocirc;ng thường. Bạn h&atilde;y d&ugrave;ng loại x&agrave; b&ocirc;ng d&agrave;nh ri&ecirc;ng cho da dầu để rửa mặt. Rửa thật kỹ v&ugrave;ng chữ T để l&agrave;m giảm bớt lượng dầu tr&ecirc;n da, gi&uacute;p da kh&ocirc; tho&aacute;ng v&agrave; sạch hơn.</p>\r\n\r\n<p style=\"text-align:justify\">&ndash; D&ugrave;ng b&ocirc;ng g&ograve;n thấm dung dịch se lỗ ch&acirc;n l&ocirc;ng thoa đều l&ecirc;n to&agrave;n bộ bề mặt của khu&ocirc;n mặt.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Sử dụng sữa rửa mặt loại bỏ dầu\" src=\"https://beautygarden.vn/Files/Uploads/news/su-dung-sua-rua-mat-loai-bo-dau.jpg\" title=\"Sử dụng sữa rửa mặt loại bỏ dầu\" /></p>\r\n\r\n<h4 style=\"text-align:justify\">Sử dụng sữa rửa mặt loại bỏ dầu</h4>\r\n\r\n<p style=\"text-align:justify\">Sữa rửa mặt kiềm dầu v&agrave; trị mụn tốt nhất bạn n&ecirc;n sử dụng để hạn chế dầu tr&ecirc;n da mặt hằng ng&agrave;y. Chi tiết sản phẩm tại đ&acirc;y</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Bước 2: Trang điểm phấn nền:</strong></p>\r\n\r\n<p style=\"text-align:justify\">&ndash; Chọn lựa phấn nền cho da nhờn lu&ocirc;n l&agrave; sự kh&oacute; khăn nhất trong trang điểm. Nhiều chuy&ecirc;n gia trang điểm khuy&ecirc;n rằng khi chọn phấn nền, bạn n&ecirc;n chọn loại phấn nền dạng nước. V&igrave; phấn nền dạng nước sẽ kh&ocirc;ng g&acirc;y ra mụn trứng c&aacute; cho da nhờn.</p>\r\n\r\n<p style=\"text-align:justify\">&ndash; Bạn cũng c&oacute; thể sử dụng kem che khuyết điểm để che đi lớp mụn trứng c&aacute;, lưu &yacute; khi sử dụng n&ecirc;n thoa đều v&agrave; nhẹ nh&agrave;ng tr&ecirc;n bề mặt da nh&eacute;.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Bước 3: Chọn phấn phủ dạng bột:</strong></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Sử dụng phấn phủ dạng bột\" src=\"https://beautygarden.vn/Files/Uploads/news/Su-dung-phan-phu-dang-bot.jpg\" title=\"Sử dụng phấn phủ dạng bột\" /></p>\r\n\r\n<h4 style=\"text-align:justify\">Sử dụng phấn phủ dạng bột</h4>\r\n\r\n<p style=\"text-align:justify\">&ndash; Phấn phủ dạng bột c&oacute; t&aacute;c dụng h&uacute;t dầu tốt v&agrave; gi&uacute;p da mịn. Bạn n&ecirc;n chọn cho m&igrave;nh loại phấn phủ c&oacute; tinh chất kho&aacute;ng dạng bột. N&oacute; gi&uacute;p da bạn s&aacute;ng mịn hơn v&agrave; kiểm so&aacute;t được lượng dầu tr&ecirc;n da bạn.</p>\r\n\r\n<p style=\"text-align:justify\">&ndash; Ngo&agrave;i ra, sử dụng phấn phủ dạng bột c&oacute; chứa tinh kho&aacute;ng sẽ kh&ocirc;ng g&acirc;y ra hiện tượng tr&ocirc;i phấn, gi&uacute;p bạn giữ lớp trang điểm l&acirc;u hơn.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Bước 4: ch&acirc;n m&agrave;y v&agrave; mắt</strong></p>\r\n\r\n<p style=\"text-align:justify\">&ndash; D&ugrave;ng ch&igrave; tạo d&aacute;ng ch&acirc;n m&agrave;y rồi d&ugrave;ng bột dặm l&ecirc;n để tạo sự mềm mại. Đặc biệt với da dầu, bạn đừng ngại phải t&ocirc; ch&acirc;n m&agrave;y đậm v&agrave; sắc sảo một ch&uacute;t nh&eacute;.</p>\r\n\r\n<p style=\"text-align:justify\">&ndash; Da dầu rất th&iacute;ch hợp với những gam m&agrave;u trung t&iacute;nh, ch&uacute;ng l&agrave;m cho gương mặt kh&ocirc;ng c&oacute; cảm gi&aacute;c n&oacute;ng bức khi bề mặt da tiết chất dầu. V&igrave; vậy, n&ecirc;n d&ugrave;ng m&agrave;u mắt n&acirc;u đồng v&agrave; khi t&ocirc; nhấn ở ph&iacute;a đu&ocirc;i mắt nhằm gi&uacute;p mắt s&acirc;u hơn, giữ vẻ đẹp tự nhi&ecirc;n cho mắt.</p>\r\n\r\n<p style=\"text-align:justify\">&ndash; Kẻ m&iacute; mắt thật mảnh v&agrave; chuốt mi bằng mascara thật cong, đ&ocirc;i mắt của bạn sẽ trở n&ecirc;n thật quyến rũ nhưng kh&ocirc;ng qu&aacute; sắc sảo.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Bước 5: Phấn m&aacute; hồng</strong></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Sử dụng phấn má hồng màu da\" src=\"https://beautygarden.vn/Files/Uploads/news/su-dung-phan-ma-hong-mau-da.png\" title=\"Sử dụng phấn má hồng màu da\" /></p>\r\n\r\n<h4 style=\"text-align:justify\">Sử dụng phấn m&aacute; hồng m&agrave;u da</h4>\r\n\r\n<p style=\"text-align:justify\">Phấn m&aacute; hồng si&ecirc;u mịn v&agrave; tiện dụng, chi tiết sản phẩm tại đ&acirc;y</p>\r\n\r\n<p style=\"text-align:justify\">&ndash; Lời khuy&ecirc;n d&agrave;nh cho da dầu l&agrave; kh&ocirc;ng n&ecirc;n sử dụng phấn m&aacute; với những m&agrave;u qu&aacute; rực rợ hay qu&aacute; tối như m&agrave;u hồng cẩm chướng, m&agrave;u đất sẫm hay m&agrave;u n&acirc;u đỏ. Chọn phấn m&agrave;u hồng da v&agrave; t&aacute;n từ đỉnh g&ograve; m&aacute; t&aacute;n đều ra ph&iacute;a ngo&agrave;i.</p>\r\n\r\n<p style=\"text-align:justify\">&ndash; Son m&agrave;u hồng đất nhạt sẽ gi&uacute;p đ&ocirc;i m&ocirc;i trở n&ecirc;n sắc n&eacute;t hơn rất nhiều. Thoa th&ecirc;m ch&uacute;t son b&oacute;ng v&agrave;o giữa m&ocirc;i để tạo sự gợi cảm cho nụ cười.</p>\r\n\r\n<p style=\"text-align:justify\">&ndash; Cuối c&ugrave;ng, bạn phải nhớ l&uacute;c n&agrave;o cũng mang theo b&ecirc;n m&igrave;nh một tập giấy thấm dầu để ph&ograve;ng những l&uacute;c trời qu&aacute; n&oacute;ng nực đấy.</p>', '2020-04-25 08:24:23', 0, 0, '2020-04-25 08:29:42'),
(5, '5 Thỏi Son \"Dáng Bút\" Thấy Là Ghiền', '5-thoi-son-dang-but-thay-la-ghien', 0, 1, 3, 0, 'Nếu nói chọn một thỏi son ngoài những tiêu chí về màu sắc và chất son thì còn có hình dáng thiết kế bên ngoài cũng góp phần định hướng cho bạn, ngoài thỏi son thiết kế truyền thống những mẫu son có thiế kế \"dáng bút\" cũng gây không ít thiện cảm cho chị em.', '2020-04-25__54.jpg', '<p style=\"text-align:justify\"><strong>1. Rimmel London Provocalips ( Gi&aacute; b&aacute;n: 150.000 đồng)</strong></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Rimmel London Provocalips là dòng son đẹp giá rẻ của hãng Rimmel\" src=\"https://beautygarden.vn/Files/Uploads/Rimmel-London-Provocalips-la-dong-son-dep-gia-re-cua-hang-Rimmel.jpg\" title=\"Rimmel London Provocalips là dòng son đẹp giá rẻ của hãng Rimmel\" /></p>\r\n\r\n<h4 style=\"text-align:justify\">Rimmel London Provocalips l&agrave; d&ograve;ng son đẹp gi&aacute; rẻ của h&atilde;ng Rimmel</h4>\r\n\r\n<p style=\"text-align:justify\">Đ&acirc;y l&agrave; d&ograve;ng son đẹp gi&aacute; rẻ của h&atilde;ng Rimmel, được tung ra thị trường v&agrave;o cuối năm 2014 v&agrave; thực sự g&acirc;y được ch&uacute; &yacute;. Loại son n&agrave;y gồm c&oacute; 2 đầu, một b&ecirc;n l&agrave; son kem mịn, b&ecirc;n c&ograve;n lại l&agrave; son b&oacute;ng kh&ocirc;ng m&agrave;u. Nhờ thiết kế độc đ&aacute;o n&agrave;y, m&agrave; bạn c&oacute; thể biến tấu với nhiều c&aacute;ch đ&aacute;nh son kh&aacute;c nhau.</p>\r\n\r\n<p style=\"text-align:justify\">Chất son của Rimmel London Provocalips nhận được nhiều review khen ngợi của c&aacute;c t&iacute;n đồ l&agrave;m đẹp, nhờ khả năng b&aacute;m l&acirc;u, ăn l&ograve;ng m&ocirc;i m&agrave; kh&ocirc;ng g&acirc;y cảm gi&aacute;c kh&ocirc;. Đặc biệt loại son gi&aacute; rẻ n&agrave;y kh&ocirc;ng bị tr&ocirc;i hay lem khi ăn uống.</p>\r\n\r\n<p style=\"text-align:justify\">Với chất lượng được đ&aacute;nh gi&aacute; cao nhưng gi&aacute; b&aacute;n của Rimmel London Provocalips lại ở mức thấp. V&igrave; thế m&agrave; chẳng c&oacute; l&yacute; do g&igrave; ngăn cản bạn sở hữu một thỏi son rất &ldquo;đ&aacute;ng đồng tiền b&aacute;t gạo&rdquo; n&agrave;y cả.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>2. Dermacol Long Lasting Lip Colour ( Gi&aacute; b&aacute;n: 240.000 đồng)</strong></p>\r\n\r\n<p style=\"text-align:justify\">Thỏi son 2 đầu đ&igrave;nh đ&aacute;m Son l&igrave; Dermacol Long Lasting 16h Lip Colour được giới l&agrave;m đẹp săn l&ugrave;ng trong thời gian gần đ&acirc;y. Đ&acirc;y l&agrave; d&ograve;ng son cao cấp nhất của Dermacol v&agrave; một điều thật th&uacute; vị 16h Lip Color đến 50 quốc gia khắp c&aacute;c Ch&acirc;u lục đều giữ được vẻ cuốn h&uacute;t của m&igrave;nh.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Dermacol Long Lasting Lip Colour siêu bền màu và siêu lì\" src=\"https://beautygarden.vn/Files/Uploads/news/Dermacol-Long-Lasting-Lip-Colour-sieu-ben-mau-va-sieu-li.jpg\" title=\"Dermacol Long Lasting Lip Colour siêu bền màu và siêu lì\" /></p>\r\n\r\n<h4 style=\"text-align:justify\">Dermacol Long Lasting Lip Colour si&ecirc;u bền m&agrave;u v&agrave; si&ecirc;u l&igrave;</h4>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nVới nhiều ưu điểm như: Son b&oacute;ng kh&ocirc;ng kh&ocirc; m&ocirc;i, v&ocirc; c&ugrave;ng mềm mịn m&ocirc;i l&agrave; điều cam kết. S&oacute;n b&oacute;ng với hai đầu h&agrave;m lượng dưỡng cao, kh&ocirc;ng ch&igrave; theo chuẩn nhập khẩu Ch&acirc;u &Acirc;u, đặc biệt, si&ecirc;u bền m&agrave;u v&agrave; si&ecirc;u l&igrave; . Mệnh danh ăn kh&ocirc;ng tr&ocirc;i, mưa kh&ocirc;ng thấm nước, giữ m&agrave;u suốt 24h.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>3. Son Color Blur By Lip Studio Cream Matte Pencil &amp; Smudger (Gi&aacute; b&aacute;n: 140.000 đồng)</strong></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Son Color Blur By Lip Studio Cream Matte Pencil &amp; Smudger là dạng son lì dạng kem\" src=\"https://beautygarden.vn/Files/Uploads/Son-Color-Blur-By-Lip-Studio-Cream-Matte-Pencil-&amp;-Smudger-la-dang-son-li-dang-kem.jpg\" title=\"Son Color Blur By Lip Studio Cream Matte Pencil &amp; Smudger là dạng son lì dạng kem\" /></p>\r\n\r\n<h4 style=\"text-align:justify\">Son Color Blur By Lip Studio Cream Matte Pencil &amp; Smudger l&agrave; dạng son l&igrave; dạng kem</h4>\r\n\r\n<p style=\"text-align:justify\">L&agrave; dạng son l&igrave; dạng kem c&ugrave;ng đầu t&aacute;n son cho hiệu ứng l&ograve;ng m&ocirc;i xuất sắc. Đầu son mượt, mịn v&agrave; dễ chịu với m&ocirc;i. Trong khi đ&oacute;, đầu t&aacute;n son d&ugrave;ng thoa đều son từ l&ograve;ng m&ocirc;i hoặc cả m&ocirc;i để bạn dễ d&agrave;ng thay đổi từ vẻ đẹp dịu d&agrave;ng sang vẻ đẹp c&aacute; t&iacute;nh.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>4. L&#39;Oreal Colour Riche La Lacque Lip Pen ( Gi&aacute; b&aacute;n: 130.000 đồng)</strong></p>\r\n\r\n<p style=\"text-align:justify\">L&agrave; loại son được c&aacute;c chuy&ecirc;n gia makeup sử dụng trong c&aacute;c show diễn thời trang. Chất son l&igrave; nhưng lại rất mướt v&agrave; mềm m&ocirc;i, dạng b&uacute;t vặn dễ theo t&aacute;c.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"L\'Oreal Colour Riche La Lacque Lip Pen giúp căng mịn, không bị khô và nhăn môi\" src=\"https://beautygarden.vn/Files/Uploads/news/L\'Oreal-Colour-Riche-La-Lacque-Lip-Pen-giup-cang-min-khong-bi-kho-va-nhan-moi.jpg\" title=\"L\'Oreal Colour Riche La Lacque Lip Pen giúp căng mịn, không bị khô và nhăn môi\" /></p>\r\n\r\n<h4 style=\"text-align:justify\">L&#39;Oreal Colour Riche La Lacque Lip Pen gi&uacute;p căng mịn, kh&ocirc;ng bị kh&ocirc; v&agrave; nhăn m&ocirc;i</h4>\r\n\r\n<p style=\"text-align:justify\">Hợp chất dưỡng ẩm gi&uacute;p h&igrave;nh th&agrave;nh lớp bảo vệ m&ocirc;i, cải thiện m&agrave;u m&ocirc;i, từ đ&oacute; đ&ocirc;i m&ocirc;i của bạn sẽ lu&ocirc;n căng mịn, kh&ocirc;ng bị kh&ocirc; v&agrave; nhăn m&ocirc;i, duy tr&igrave; cho bạn l&agrave;n m&ocirc;i hồng h&agrave;o, tươi trẻ. Son c&oacute; nhiều m&agrave;u sắc kh&aacute;c nhau v&agrave; được nhiều minh tinh nổi tiếng sử dụng. Với Color Riche Le Lacque Lip Pen, đ&ocirc;i m&ocirc;i của bạn sẽ lu&ocirc;n được nu&ocirc;i dưỡng mềm mại, bền m&agrave;u v&agrave; mượt m&agrave; đầy x&uacute;c cảm.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>5. Son Colourpop Lippie Stix ( Gi&aacute; b&aacute;n: 140.000 đồng)</strong></p>\r\n\r\n<p style=\"text-align:justify\">Mặc d&ugrave; được xếp v&agrave;o mỹ phẩm b&igrave;nh d&acirc;n nhưng bao b&igrave; rất s&aacute;ng sủa v&agrave; đ&aacute;ng y&ecirc;u. Son c&oacute; vỏ hộp giấy, k&egrave;m theo giấy th&ocirc;ng tin th&agrave;nh phần son. Thiết kế c&acirc;y son như c&acirc;y b&uacute;t, hệt như t&ecirc;n vậy đ&oacute;, gọn nhẹ, vỏ nhựa b&oacute;ng m&agrave;u trắng, kh&ocirc;ng b&aacute;m tay, dưới đ&iacute;t son l&agrave; m&agrave;u son v&agrave; t&ecirc;n m&agrave;u, chất son.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Son Colourpop Lippie Stix có bao bì rất sáng sủa và đáng yêu\" src=\"https://beautygarden.vn/Files/Uploads/Son-Colourpop-Lippie-Stix-co-bao-bi-rat-sang-sua-va-dang-yeu.jpg\" title=\"Son Colourpop Lippie Stix có bao bì rất sáng sủa và đáng yêu\" /></p>\r\n\r\n<h4 style=\"text-align:justify\">Son Colourpop Lippie Stix c&oacute; bao b&igrave; rất s&aacute;ng sủa v&agrave; đ&aacute;ng y&ecirc;u</h4>\r\n\r\n<p style=\"text-align:justify\">Nắp son rất chắc, đầu son vắt ch&eacute;o tiện đẻ đ&aacute;nh viền m&ocirc;i v&ocirc; c&ugrave;ng, tuy nhi&ecirc;n v&igrave; đầu son kh&aacute; nhỏ n&ecirc;n đ&aacute;nh sẽ kh&aacute; mất thời gian. Ruột son mảnh, c&aacute;c bạn lưu &yacute; kh&ocirc;ng văn son l&ecirc;n qu&aacute; cao rồi đẩy xuống nha v&igrave; son sẽ bị b&agrave;o m&ograve;n khi vặn xuống lại.</p>', '2020-04-25 08:25:14', 0, 1, '2020-04-25 08:30:14'),
(6, 'Bạn Đã Biết Sử Dụng Nước Hoa Hồng Đúng Cách Chưa?', 'ban-da-biet-su-dung-nuoc-hoa-hong-dung-cach-chua', 0, 1, 3, 0, 'Nước hoa hồng hay toner là một sản phẩm làm đẹp có nguồn gốc thiên nhiên được sử dụng rộng rãi ở các chị em phụ nữ trong vấn đề chăm sóc da mặt, thế nhưng vẫn còn nhiều người băn khoăn về cách chọn cũng như sử dụng toner đúng cách.', '2020-04-25__55.jpg', '<p style=\"text-align:justify\"><strong>C&ocirc;ng dụng tuyệt vời của nước hoa hồng</strong></p>\r\n\r\n<p style=\"text-align:justify\">Trước hết, trong nước hoa hồng c&oacute; chứa một lượng lớn vitamin A v&agrave; C c&ugrave;ng c&aacute;c chất chống l&atilde;o h&oacute;a gi&uacute;p ngăn ngừa, giảm thiểu c&aacute;c nếp nhăn, chống l&atilde;o h&oacute;a, giảm th&acirc;m quầng v&ugrave;ng mắt v&agrave; gi&uacute;p da lu&ocirc;n tươi trẻ mỗi ng&agrave;y đấy bạn nh&eacute;! Nước hoa hồng nếu được sử dụng đều đặn mỗi ng&agrave;y sẽ l&agrave; tiền đề gi&uacute;p cho l&agrave;n da của bạn th&ecirc;m phần khỏe mạnh.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Nước hoa hồng là tiền đề giúp da khỏe mạnh\" src=\"https://beautygarden.vn/Files/Uploads/news/nuoc-hoa-hong-la-tien-de-giup-da-khoe-manh.jpg\" title=\"Nước hoa hồng là tiền đề giúp da khỏe mạnh\" /></p>\r\n\r\n<h4 style=\"text-align:justify\">Nước hoa hồng l&agrave; tiền đề gi&uacute;p da khỏe mạnh</h4>\r\n\r\n<p style=\"text-align:justify\">Nước hoa hồng cũng c&oacute; thể sử dụng cho m&aacute;i t&oacute;c v&agrave; cơ thể trong vai tr&ograve; &rdquo;essence&rdquo; với c&aacute;c th&agrave;nh phần dinh dưỡng tinh khiết gi&uacute;p nu&ocirc;i dưỡng l&agrave;n da, gi&uacute;p da săn chắc v&agrave; tr&igrave; ho&atilde;n tiến tr&igrave;nh l&atilde;o h&oacute;a. Nếu sử dụng nước hoa hồng thường xuy&ecirc;n, bạn sẽ sở hữu một l&agrave;n da mềm mại v&agrave; khỏe mạnh. Ngo&agrave;i ra, n&oacute; cũng l&agrave; liều thuốc tốt nhất chữa trị tận gốc mụn trứng c&aacute;, mụn bọc v&agrave; k&iacute;ch ứng da với t&iacute;nh chất kh&aacute;ng khuẩn. Nước hoa hồng cũng được sử dụng cho t&oacute;c để điều trị g&agrave;u v&agrave; nhiễm tr&ugrave;ng da đầu c&ugrave;ng những loại bệnh li&ecirc;n quan kh&aacute;c&hellip;</p>\r\n\r\n<p style=\"text-align:justify\">B&ecirc;n cạnh đ&oacute;, c&aacute;c tinh chất trong nước hoa hồng c&ograve;n c&oacute; t&aacute;c dụng s&aacute;t tr&ugrave;ng v&agrave; kh&aacute;ng khuẩn rất tốt cho da Nhờ vậy, m&agrave; da bạn lu&ocirc;n được bảo vệ trước những vi khuẩn c&oacute; hại. H&agrave;ng ng&agrave;y, bạn h&atilde;y chăm s&oacute;c da bằng nước hoa hồng sẽ gi&uacute;p da giảm mụn, giảm sưng tấy, l&agrave;m dịu nhẹ cho da, dưỡng ẩm , l&agrave;m m&aacute;t. Đồng thời thu nhỏ v&agrave; l&agrave;m se kh&iacute;t lỗ ch&acirc;n l&ocirc;ng, gi&uacute;p da trở n&ecirc;n l&aacute;ng mịn v&agrave; mềm mại hơn.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>L&agrave;m sao để chọn nước hoa hồng ph&ugrave; hợp?</strong></p>\r\n\r\n<p style=\"text-align:justify\">Được biết th&igrave; đa số c&aacute;c loại nước hoa hồng đều chứa cồn. Cồn c&oacute; trong nước hoa hồng gi&uacute;p tăng t&iacute;nh s&aacute;t khuẩn, kh&aacute;ng vi&ecirc;m, giảm sưng v&agrave; l&agrave;m sạch da hiệu quả. Tuy nhi&ecirc;n, t&aacute;c dụng phụ của n&oacute; l&agrave; rất dễ g&acirc;y k&iacute;ch ứng da, đối với da nhạy cảm n&oacute; rất dễ l&agrave;m da bị tổn thương như: l&agrave;m mỏng da, giảm độ ẩm v&agrave; kh&ocirc; da.</p>\r\n\r\n<p style=\"text-align:justify\">Để chăm s&oacute;c l&agrave;n da của m&igrave;nh tốt nhất, bạn cần chọn nước hoa hồng c&oacute; nồng độ cồn ph&ugrave; hợp với da nh&eacute;. Đối với da kh&ocirc;, bạn n&ecirc;n chọn mua những sản phẩm c&oacute; nồng độ cồn thấp hoặc kh&ocirc;ng cồn để tr&aacute;nh l&agrave;m cho da bị kh&ocirc;.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Chọn nước hoa hồng phù hợp với từng loại da\" src=\"https://beautygarden.vn/Files/Uploads/news/chon-nuoc-hoa-hong-phu-hop-voi-tung-loai-da.jpg\" title=\"Chọn nước hoa hồng phù hợp với từng loại da\" /></p>\r\n\r\n<h4 style=\"text-align:justify\">Chọn nước hoa hồng ph&ugrave; hợp với từng loại da</h4>\r\n\r\n<p style=\"text-align:justify\"><strong>C&aacute;ch sử dụng nước hoa hồng ra sao?</strong></p>\r\n\r\n<p style=\"text-align:justify\"><strong>Đối với tẩy trang</strong></p>\r\n\r\n<p style=\"text-align:justify\">Trước khi rửa mặt, bạn n&ecirc;n tẩy sạch lớp trang điểm tr&ecirc;n da bằng nước hoa hồng nh&eacute;. C&aacute;ch l&agrave;m v&ocirc; c&ugrave;ng đơn giản th&ocirc;i nha, bạn h&atilde;y d&ugrave;ng b&ocirc;ng g&ograve;n thấm nước hoa hồng v&agrave; tẩy sạch v&ugrave;ng mắt trước, sau đ&oacute; tẩy sạch c&aacute;c v&ugrave;ng da c&ograve;n lại.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Đối với dưỡng da</strong></p>\r\n\r\n<p style=\"text-align:justify\">Trước khi d&ugrave;ng nước hoa hồng cho dưỡng da, bạn n&ecirc;n đọc kỹ th&agrave;nh phần để ph&aacute;t huy hết t&aacute;c dụng của n&oacute; nha! Trước hết bạn cần rửa sạch v&agrave; lau kh&ocirc; da mặt. D&ugrave;ng b&ocirc;ng g&ograve;n thấm nước hoa hồng, thấm đều tr&ecirc;n da. Đối với những v&ugrave;ng da nhiều dầu v&agrave; mụn bạn n&ecirc;n thấm nhiều hơn một ch&uacute;t. Massage da mặt. D&ugrave;ng tay vỗ nhẹ v&agrave; đều l&ecirc;n da mặt. Ch&uacute; &yacute;, bạn n&ecirc;n sử dụng lực vừa phải kh&ocirc;ng n&ecirc;n qu&aacute; mạnh tay dễ l&agrave;m tổn thương c&aacute;c v&ugrave;ng da nhạy cảm. Massage đều đặn theo v&ograve;ng xoắn ốc theo hướng kim đồng hồ. Bạn cũng c&oacute; thể d&ugrave;ng 2 tay thoa mạnh để tạo hơi n&oacute;ng rồi &aacute;p 2 tay l&ecirc;n da mặt, động t&aacute;c n&agrave;y gi&uacute;p da hấp thụ tốt c&aacute;c tinh chất của nước hoa hồng v&agrave; giữ ẩm cho da.<br />\r\nLưu &yacute;: Đối với nước hoa hồng bạn cần đậy nắp k&iacute;n sau mỗi lần sử dụng v&agrave; kh&ocirc;ng d&ugrave;ng qu&aacute; 8 th&aacute;ng sau khi mở nh&eacute;!. Bạn cũng c&oacute; thể bỏ v&agrave;o ngăn m&aacute;t tủ lạnh 5 ph&uacute;t trước khi sử dụng để ph&aacute;t huy hết t&aacute;c dụng.</p>\r\n\r\n<p style=\"text-align:justify\">Hiện nay c&oacute; rất nhiều loại nước hoa hồng nhưng chủ yếu c&oacute; 2 loại l&agrave; c&oacute; cồn v&agrave; kh&ocirc;ng cồn, t&ugrave;y thuộc v&agrave;o từng loại da v&agrave; mong muốn sử dụng c&aacute;c bạn c&oacute; thể lựa chọn cho m&igrave;nh một sản phẩm ph&ugrave; hợp. Bạn c&oacute; thể tham khảo th&ocirc;ng tin về một số loại nước hoa hồng m&agrave; Beauty Garden đang cung cấp sau đ&acirc;y:</p>\r\n\r\n<p style=\"text-align:justify\">D&ograve;ng toner kh&ocirc;ng cồn c&oacute; một đại diện rất được ưa chuộng l&agrave;&nbsp;<strong>Nước hoa hồng kh&ocirc;ng cồn Thayers.</strong><br />\r\n&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Nước hoa hồng không cồn Thayers\" src=\"https://beautygarden.vn/Files/Uploads/news/nuoc-hoa-hong-khong-con-thayers.png\" title=\"Nước hoa hồng không cồn Thayers\" /></p>\r\n\r\n<h4 style=\"text-align:justify\">Nước hoa hồng kh&ocirc;ng cồn Thayers</h4>\r\n\r\n<p style=\"text-align:justify\">Th&ocirc;ng tin chi tiết sản phẩm xin mời bấm v&ocirc; đ&acirc;y!</p>\r\n\r\n<p style=\"text-align:justify\">Một đại diện nước hoa hồng c&oacute; cồn được tin d&ugrave;ng l&agrave;&nbsp;<strong>Nước hoa hồng kiềm dầu, trị mụn đầu đen v&agrave; se kh&iacute;t lỗ ch&acirc;n l&ocirc;ng Jeju Volcanic Lava Pore Toner</strong></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Nước hoa hồng Jeju Volcanic Lava Pore Toner\" src=\"https://beautygarden.vn/Files/Uploads/news/nuoc-hoa-hong-Jeju-Volcanic-Lava-Pore-Toner.png\" title=\"Nước hoa hồng Jeju Volcanic Lava Pore Toner\" /></p>\r\n\r\n<h4 style=\"text-align:justify\">Nước hoa hồng Jeju Volcanic Lava Pore Toner</h4>', '2020-04-25 08:26:00', 1, 0, '2020-04-25 08:32:06'),
(7, '\"Hô Biến\" Mắt 1 Mí Thành 2 Mí Cực Đơn Giản', 'ho-bien-mat-1-mi-thanh-2-mi-cuc-don-gian', 0, 1, 2, 0, 'Những thủ nhuật nhỏ khi trang điểm có thể giúp đôi mắt của bạn to tròn hơn.', '2020-04-25__56.jpg', '<p style=\"text-align:justify\"><strong>Kẻ viền mắt</strong></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Hãy tạo đường viền mí mắt bằng chì màu sẫm, kẻ đậm dần về phía đuôi mắt\" src=\"https://beautygarden.vn/Files/Uploads/news/hay-tao-duong-vien-mi-mat-bang-chi-mau-sam-ke-dam-dan-ve-phia-duoi-mat.jpg\" title=\"Hãy tạo đường viền mí mắt bằng chì màu sẫm, kẻ đậm dần về phía đuôi mắt\" /></p>\r\n\r\n<h4 style=\"text-align:justify\">H&atilde;y tạo đường viền m&iacute; mắt bằng ch&igrave; m&agrave;u sẫm, kẻ đậm dần về ph&iacute;a đu&ocirc;i mắt</h4>\r\n\r\n<p style=\"text-align:justify\">H&atilde;y tạo đường viền m&iacute; mắt bằng ch&igrave; m&agrave;u sẫm, kẻ đậm dần về ph&iacute;a đu&ocirc;i mắt. Sử dụng m&agrave;u ch&igrave; đen v&agrave; n&acirc;u sẫm kết hợp l&agrave; phổ biến d&ugrave;ng chung cho c&aacute;c m&agrave;u da.<br />\r\nNếu đi tham dự tiệc, bạn h&atilde;y kẻ ch&igrave; đen n&acirc;u v&agrave;o đường viền trong của m&iacute; mắt.Khi ấy dưới &aacute;nh đ&egrave;n đ&ocirc;i mắt sẽ tr&ocirc;ng to v&agrave; sắc n&eacute;t hơn.<br />\r\nNếu bạn c&oacute; khu&ocirc;n mặt ngắn, h&atilde;y k&eacute;o d&agrave;i đường kẻ viền m&iacute; mắt. Th&ocirc;ng thường muốn nổi bật v&agrave; c&aacute; t&iacute;nh, bạn c&oacute; thể kết hợp kẻ đường m&iacute; mắt m&agrave;u đậm đi với t&ocirc;ng m&ocirc;i m&agrave;u đỏ cổ điển. Khu&ocirc;n mặt bạn sẽ rất thu h&uacute;t trước người kh&aacute;c.<br />\r\nNgo&agrave;i ra đối với người đẹp mắt l&aacute; răm th&igrave; kẻ viền mắt m&egrave;o l&agrave; rất th&iacute;ch hợp.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Viền mắt dưới bằng ch&igrave; trắng</strong></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Tạo đường viền dưới bằng chì trắng\" src=\"https://beautygarden.vn/Files/Uploads/news/tao-duong-vien-mi-duoi-bang-chi-trang.jpg\" title=\"Tạo đường viền dưới bằng chì trắng\" /></p>\r\n\r\n<p style=\"text-align:justify\">Tạo đường viền dưới bằng ch&igrave; trắng</p>\r\n\r\n<p style=\"text-align:justify\">Ch&igrave; đen kh&ocirc;ng được c&aacute;c chuy&ecirc;n gia trang điểm khuy&ecirc;n d&ugrave;ng nếu bạn sở hữu đ&ocirc;i mắt nhỏ. Tương tự như việc kh&ocirc;ng n&ecirc;n sử dụng m&agrave;u mắt qu&aacute; đậm cho phần bầu mắt, chỉ kẻ mắt đen cũng kh&ocirc;ng được khuy&ecirc;n d&ugrave;ng. Thay v&agrave;o đ&oacute;, bạn h&atilde;y sử dụng chỉ mắt m&agrave;u trắng. Bạn sẽ thực sự bất ngờ với quyền năng của ch&igrave; kẻ trắng khi nh&igrave;n thấy đ&ocirc;i mắt long lanh như b&uacute;p b&ecirc; của m&igrave;nh sau khi sử dụng.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Chuốt mascara</strong></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Sau khi kẻ mắt, bạn dùng mascara chuốt thêm vào bộ lông mi\" src=\"https://beautygarden.vn/Files/Uploads/news/sau-khi-ke-mat-ban-dung-mascara-chuot-them-vao-bo-long-mi.jpg\" title=\"Sau khi kẻ mắt, bạn dùng mascara chuốt thêm vào bộ lông mi\" /></p>\r\n\r\n<h4 style=\"text-align:justify\">Sau khi kẻ mắt, bạn d&ugrave;ng mascara chuốt th&ecirc;m v&agrave;o bộ l&ocirc;ng mi</h4>\r\n\r\n<p style=\"text-align:justify\">Sau khi kẻ mắt, bạn d&ugrave;ng mascara chuốt th&ecirc;m v&agrave;o bộ l&ocirc;ng mi. Nếu mi của bạn qu&aacute; mỏng, khi trang điểm theo kiểu n&agrave;y bạn c&oacute; thể gắn th&ecirc;m l&ocirc;ng mi giả để to&agrave;n bộ đ&ocirc;i mặt tạo điểm nhấn tại đ&ocirc;i mắt nh&eacute;. Nếu đ&atilde; nhấn tại mắt th&igrave; khi trang điểm m&ocirc;i chỉ nhẹ nh&agrave;ng th&ocirc;i.</p>', '2020-04-25 08:27:03', 1, 0, NULL),
(8, 'Cách chọn kem chống nắng tốt phù hợp an toàn với từng loại da', 'cach-chon-kem-chong-nang-tot-phu-hop-an-toan-voi-tung-loai-da', 1, 1, 3, 0, 'Kem chống nắng là gì? \r\nKem chống nắng là mỹ phẩm có dạng sữa, xịt hay lotion có khả năng hấp thụ hoặc phản xạ các tia cực tím để', '2020-04-25__15805425160532.jpg', '<p>test</p>', '2020-04-25 08:37:01', 1, 0, '2020-04-25 08:40:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `atb_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atb_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atb_type` tinyint(4) NOT NULL DEFAULT '0',
  `atb_category_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attributes`
--

INSERT INTO `attributes` (`id`, `atb_name`, `atb_slug`, `atb_type`, `atb_category_id`, `created_at`, `updated_at`) VALUES
(1, 'Nước Mỹ', 'nuoc-my', 1, 2, '2020-04-25 04:04:25', '2020-04-26 07:56:25'),
(2, 'Nước Anh', 'nuoc-anh', 1, 1, '2020-04-25 04:04:31', NULL),
(3, '300ml', '300ml', 2, 1, '2020-04-25 04:04:39', NULL),
(4, '500ml', '500ml', 2, 1, '2020-04-25 04:04:44', NULL),
(5, 'Người lớn', 'nguoi-lon', 3, 1, '2020-04-28 20:01:29', NULL),
(6, 'Trẻ em', 'tre-em', 3, 1, '2020-04-28 20:01:35', NULL),
(7, 'Da thường', 'da-thuong', 4, 1, '2020-04-28 20:06:56', NULL),
(8, 'Da khô', 'da-kho', 4, 1, '2020-04-28 20:07:02', NULL),
(9, 'thuộc tính 1', 'thuoc-tinh-1', 1, 1, '2020-09-03 13:40:33', NULL),
(10, 'thuộc tính test 2', 'thuoc-tinh-test-2', 1, 1, '2020-09-03 13:47:09', NULL),
(11, 'test 3', 'test-3', 1, 1, '2020-09-03 13:49:33', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_parent_id` int(11) NOT NULL DEFAULT '0',
  `c_hot` tinyint(4) NOT NULL DEFAULT '0',
  `c_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `c_name`, `c_slug`, `c_avatar`, `c_banner`, `c_description`, `c_parent_id`, `c_hot`, `c_status`, `created_at`, `updated_at`) VALUES
(1, 'Nước hoa', 'nuoc-hoa', NULL, NULL, NULL, 0, 0, 1, '2020-04-25 04:03:42', NULL),
(2, 'Đồ trang điểm', 'do-trang-diem', NULL, NULL, NULL, 0, 0, 1, '2020-04-25 04:03:47', NULL),
(3, 'Chăm sóc tóc', 'cham-soc-toc', NULL, NULL, NULL, 0, 0, 1, '2020-04-25 07:05:25', NULL),
(4, 'Sản Phẩm Test 1', 'san-pham-test-1', '2020-04-25__screen-shot-2020-03-13-at-180054.png', NULL, NULL, 0, 0, 1, '2020-04-25 07:59:15', NULL),
(5, 'Chăm sóc da', 'cham-soc-da', NULL, NULL, NULL, 0, 1, 1, '2020-04-26 07:26:15', '2020-04-26 07:26:34'),
(6, 'Nước hoa con trai', 'nuoc-hoa-con-trai', '2020-07-14__screenshot-from-2020-07-09-11-04-01.png', NULL, NULL, 1, 0, 1, '2020-07-13 17:54:22', NULL),
(7, '12121', '12121', NULL, NULL, NULL, 0, 0, 1, '2020-08-23 12:34:13', NULL),
(8, 'Nước hoa con gái', 'nuoc-hoa-con-gai', NULL, NULL, NULL, 1, 0, 1, '2020-08-23 13:11:23', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cmt_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmt_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmt_content` text COLLATE utf8mb4_unicode_ci,
  `cmt_parent_id` int(11) NOT NULL DEFAULT '0',
  `cmt_product_id` int(11) NOT NULL DEFAULT '0',
  `cmt_admin_id` int(11) NOT NULL DEFAULT '0',
  `cmt_images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmt_user_id` int(11) NOT NULL DEFAULT '0',
  `cmt_like` int(11) NOT NULL DEFAULT '0',
  `cmt_disk_like` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `cmt_name`, `cmt_email`, `cmt_content`, `cmt_parent_id`, `cmt_product_id`, `cmt_admin_id`, `cmt_images`, `cmt_user_id`, `cmt_like`, `cmt_disk_like`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'sdfsdf', 0, 47, 0, '[\"2020-09-20__1png.PNG\"]', 1, 0, 0, '2020-09-20 02:49:33', NULL),
(2, 'Khách hàng 1', 'khachhang1@gmail.com', 'sdfsdfsdfsd', 0, 47, 0, '[]', 1, 0, 0, '2020-09-20 02:52:59', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_phone` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `cp_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cp_description` text COLLATE utf8_unicode_ci,
  `cp_discount` double(8,2) DEFAULT '0.00',
  `cp_discount_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cp_number_uses` int(10) NOT NULL DEFAULT '1',
  `cp_active` tinyint(4) NOT NULL DEFAULT '1',
  `cp_start_date` int(15) DEFAULT NULL,
  `cp_end_date` int(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `cp_code`, `cp_description`, `cp_discount`, `cp_discount_type`, `cp_number_uses`, `cp_active`, `cp_start_date`, `cp_end_date`, `created_at`, `updated_at`) VALUES
(11, 'aa44', 'mã giảm giá tháng 111212121', 50.00, 'percent', 12, 1, 1598461200, 1599238800, '2020-08-25 15:49:39', '2020-08-27 14:19:28'),
(12, 'ttttt', 'dsfsdf', 14.00, 'percent', 1, 1, 1598461200, 1599238800, '2020-08-27 13:44:35', '2020-08-27 13:44:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon_usages`
--

CREATE TABLE `coupon_usages` (
  `id` int(11) NOT NULL,
  `cpu_user_id` int(11) NOT NULL,
  `cpu_coupon_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupon_usages`
--

INSERT INTO `coupon_usages` (`id`, `cpu_user_id`, `cpu_coupon_id`, `created_at`, `updated_at`) VALUES
(4, 1, 11, '2020-08-31 13:19:03', '2020-08-31 13:19:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `e_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_position_1` tinyint(4) NOT NULL DEFAULT '0',
  `e_position_2` tinyint(4) NOT NULL DEFAULT '0',
  `e_position_3` tinyint(4) NOT NULL DEFAULT '0',
  `e_position_4` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `events`
--

INSERT INTO `events` (`id`, `e_name`, `e_banner`, `e_link`, `e_position_1`, `e_position_2`, `e_position_3`, `e_position_4`, `created_at`, `updated_at`) VALUES
(1, 'Event 1', '2020-06-08__anh1.jpg', 'https://www.facebook.com/TrungPhuNA', 1, 1, 1, 1, '2020-07-16 14:28:51', '2020-07-16 14:28:51'),
(2, 'Event2', '2020-06-08__evnet2.jpg', 'https://www.facebook.com/TrungPhuNA', 0, 0, 1, 0, '2020-06-08 09:02:26', '2020-06-08 09:02:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flash_sales`
--

CREATE TABLE `flash_sales` (
  `id` int(11) NOT NULL,
  `fs_title` varchar(255) DEFAULT NULL,
  `fs_start_date` int(20) DEFAULT NULL,
  `fs_end_date` int(20) DEFAULT NULL,
  `fs_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `flash_sales`
--

INSERT INTO `flash_sales` (`id`, `fs_title`, `fs_start_date`, `fs_end_date`, `fs_status`, `created_at`, `updated_at`) VALUES
(4, 'sự kiện tháng 101', 1601917200, 1602090000, 1, '2020-10-03 07:12:38', '2020-10-06 00:51:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flash_sale_products`
--

CREATE TABLE `flash_sale_products` (
  `id` int(11) NOT NULL,
  `fsp_flash_deal_id` int(11) NOT NULL,
  `fsp_product_id` int(11) NOT NULL,
  `fsp_discount` int(11) NOT NULL,
  `fsp_discount_type` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `flash_sale_products`
--

INSERT INTO `flash_sale_products` (`id`, `fsp_flash_deal_id`, `fsp_product_id`, `fsp_discount`, `fsp_discount_type`, `created_at`, `updated_at`) VALUES
(45, 4, 2, 50, 'percent', '2020-10-06 00:51:29', '2020-10-06 00:51:29'),
(46, 4, 3, 51, 'percent', '2020-10-06 00:51:29', '2020-10-06 00:51:29'),
(47, 4, 7, 50, 'percent', '2020-10-06 00:51:29', '2020-10-06 00:51:29'),
(48, 4, 13, 31, 'percent', '2020-10-06 00:51:29', '2020-10-06 00:51:29'),
(49, 4, 14, 11, 'percent', '2020-10-06 00:51:29', '2020-10-06 00:51:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `keywords`
--

CREATE TABLE `keywords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `k_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `k_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `k_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k_hot` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mn_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mn_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mn_avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mn_banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mn_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mn_hot` tinyint(4) NOT NULL DEFAULT '0',
  `mn_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `mn_name`, `mn_slug`, `mn_avatar`, `mn_banner`, `mn_description`, `mn_hot`, `mn_status`, `created_at`, `updated_at`) VALUES
(1, 'Kinh nghiệm mua mỹ phẩm', 'kinh-nghiem-mua-my-pham', NULL, NULL, NULL, 0, 1, '2020-04-23 20:33:34', NULL),
(2, 'Thông báo', 'thong-bao', NULL, NULL, NULL, 0, 1, '2020-04-23 20:33:38', NULL),
(3, 'Tuyển dụng', 'tuyen-dung', NULL, NULL, NULL, 0, 0, '2020-04-23 20:33:42', '2020-04-25 08:34:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_02_02_041429_create_categories_table', 1),
(4, '2020_02_02_155318_create_keywords_table', 1),
(5, '2020_02_03_145303_create_products_table', 1),
(6, '2020_02_06_165057_create_attributes_table', 1),
(7, '2020_02_06_184708_create_products_attributes_table', 1),
(8, '2020_02_08_005029_add_multiple_column_attribute_in_table_products', 1),
(9, '2020_02_09_073958_create_transactions_table', 1),
(10, '2020_02_09_074025_create_orders_table', 1),
(11, '2020_02_09_133309_create_products_keywords_table', 1),
(12, '2020_02_09_155308_create_admins_table', 1),
(13, '2020_02_09_180519_create_menus_table', 1),
(14, '2020_02_09_180620_create_articles_table', 1),
(15, '2020_02_12_100000_create_password_resets_table', 1),
(16, '2020_02_13_154148_alter_column_pro_number_in_table_product', 1),
(17, '2020_02_13_171036_create_slides_table', 1),
(18, '2020_02_14_121248_alter_column_a_position_in_table_articles', 1),
(19, '2020_02_15_053225_create_user_favourite_table', 1),
(20, '2020_02_15_191555_create_ratings_table', 1),
(21, '2020_02_17_162605_create_events_table', 1),
(22, '2020_02_18_152103_create_product_images_table', 1),
(23, '2020_02_24_222836_create_social_accounts_table', 1),
(24, '2020_03_08_104810_create_statics_table', 1),
(25, '2020_03_08_213403_alter_column_pro_age_review_in_table_product', 1),
(26, '2020_03_12_205704_create_contacts_table', 1),
(27, '2020_03_17_183239_create_comments_table', 1),
(28, '2020_03_22_003200_alter_column_spam_comment_ratings_in_table_users', 1),
(29, '2020_03_23_223714_alter_column_admin_in_table_admin', 1),
(30, '2020_03_24_201555_alter_column_c_parent_id_in_table_categories', 1),
(31, '2020_03_25_214331_create_list_table_system_pay_table', 1),
(32, '2020_03_27_181534_alter_column_type_pay_in_table_transaction', 1),
(33, '2020_04_14_164245_create_supplieres_table', 1),
(34, '2020_04_15_003305_alter_column_pro_supplier_id_in_table_products', 1),
(35, '2020_04_16_234410_after_column_tst_admin_id_in_table_transaction', 1),
(36, '2020_04_29_104806_alter_column_pro_expiration_date_in_table_products', 1),
(37, '2020_04_29_112931_create_invoice_entered_in_tables', 1),
(38, '2020_06_17_192357_create_product_invoice_entered_table', 1),
(39, '2020_06_21_112319_create_permission_tables', 1),
(40, '2020_06_21_205241_create_activity_log_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(2, 'App\\\\Models\\\\Admin', 1),
(2, 'App\\Models\\Admin', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(3, 'App\\Models\\Admin', 1),
(3, 'App\\Models\\Admin', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `od_transaction_id` int(11) NOT NULL DEFAULT '0',
  `od_product_id` int(11) NOT NULL DEFAULT '0',
  `od_sale` int(11) NOT NULL DEFAULT '0',
  `od_qty` tinyint(4) NOT NULL DEFAULT '0',
  `od_price` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `od_transaction_id`, `od_product_id`, `od_sale`, `od_qty`, `od_price`, `created_at`, `updated_at`) VALUES
(1, 1, 50, 2, 1, 11760, '2020-04-27 19:06:31', NULL),
(2, 1, 52, 12, 1, 220000, '2020-04-27 19:06:31', NULL),
(3, 3, 52, 12, 2, 220000, '2020-06-07 02:42:21', NULL),
(4, 4, 45, 3, 1, 504400, '2020-06-07 02:45:50', NULL),
(5, 5, 47, 1, 1, 237600, '2020-06-08 08:58:19', NULL),
(6, 6, 50, 2, 2, 11760, '2020-06-15 04:48:55', NULL),
(7, 7, 53, 20, 2, 8000, '2020-06-18 05:17:30', NULL),
(8, 8, 50, 2, 1, 11760, '2020-07-13 17:59:11', NULL),
(9, 8, 1, 2, 4, 784000, '2020-07-13 17:59:11', NULL),
(10, 9, 50, 2, 1, 11760, '2020-08-26 13:07:22', NULL),
(11, 10, 49, 1, 1, 940500, '2020-08-30 10:35:52', NULL),
(12, 11, 49, 1, 1, 940500, '2020-08-30 10:39:52', NULL),
(13, 12, 49, 1, 1, 940500, '2020-08-30 10:40:56', NULL),
(14, 13, 49, 1, 1, 940500, '2020-08-30 15:38:58', NULL),
(15, 14, 49, 1, 1, 940500, '2020-08-31 13:04:53', NULL),
(16, 16, 49, 1, 1, 940500, '2020-08-31 13:07:11', NULL),
(17, 22, 49, 1, 1, 940500, '2020-08-31 13:12:15', NULL),
(18, 25, 49, 1, 1, 940500, '2020-08-31 13:19:03', NULL),
(19, 30, 51, 12, 1, 220000, '2020-09-03 15:19:50', NULL),
(20, 31, 51, 12, 1, 220000, '2020-09-03 15:21:28', NULL),
(21, 32, 56, 12, 1, 10560, '2020-09-06 15:05:33', NULL),
(22, 33, 2, 50, 1, 165000, '2020-10-03 14:36:25', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('khachhang1@gmail.com', '$2y$10$XmQIOGIPmEIUziDfmDTCo.7SnYfEJq7yVaB.g5RVz1rtDKbWk0YAS', '2020-08-23 12:36:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pay_histories`
--

CREATE TABLE `pay_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `ph_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ph_user_id` int(10) UNSIGNED NOT NULL,
  `ph_credit` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `ph_debit` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `ph_balance` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `ph_meta_detail` text COLLATE utf8mb4_unicode_ci,
  `ph_status` tinyint(4) NOT NULL DEFAULT '0',
  `ph_month` tinyint(3) UNSIGNED DEFAULT NULL,
  `ph_year` smallint(5) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pay_histories`
--

INSERT INTO `pay_histories` (`id`, `ph_code`, `ph_user_id`, `ph_credit`, `ph_debit`, `ph_balance`, `ph_meta_detail`, `ph_status`, `ph_month`, `ph_year`, `created_at`, `updated_at`) VALUES
(1, 'PAYOUT1', 2, 0, 0, 0, NULL, 1, 6, 2020, '2020-06-07 01:03:48', NULL),
(2, 'IN1', 2, 10000, 0, 10000, 'Nạp tiền Online', 1, 6, 2020, '2020-06-07 02:32:57', NULL),
(3, 'PAYOUT2', 2, 0, 440000, 1000000, NULL, 1, 6, 2020, '2020-06-07 02:42:21', NULL),
(4, 'PAYOUT3', 2, 0, 504400, 560000, NULL, 1, 6, 2020, '2020-06-07 02:45:50', NULL),
(5, 'PAYOUT4', 1, 0, 470250, 500000, NULL, 1, 8, 2020, '2020-08-30 10:39:52', NULL),
(6, 'PAYOUT5', 1, 0, 470250, 500000, NULL, 1, 8, 2020, '2020-08-30 10:40:56', NULL),
(7, 'PAYOUT6', 1, 0, 10560, 20000, NULL, 1, 9, 2020, '2020-09-06 15:05:33', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pay_ins`
--

CREATE TABLE `pay_ins` (
  `id` int(10) UNSIGNED NOT NULL,
  `pi_user_id` int(10) UNSIGNED NOT NULL,
  `pi_admin_id` int(10) UNSIGNED NOT NULL,
  `pi_provider` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `pi_money` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `pi_fee` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `pi_amount` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `pi_meta_detail` text COLLATE utf8mb4_unicode_ci,
  `pi_status` tinyint(4) NOT NULL DEFAULT '0',
  `pi_month` tinyint(3) UNSIGNED DEFAULT NULL,
  `pi_year` smallint(5) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pay_ins`
--

INSERT INTO `pay_ins` (`id`, `pi_user_id`, `pi_admin_id`, `pi_provider`, `pi_money`, `pi_fee`, `pi_amount`, `pi_meta_detail`, `pi_status`, `pi_month`, `pi_year`, `created_at`, `updated_at`) VALUES
(1, 2, 0, 3, 10000, 0, 0, NULL, 1, 6, 2020, '2020-06-07 02:32:57', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pay_outs`
--

CREATE TABLE `pay_outs` (
  `id` int(10) UNSIGNED NOT NULL,
  `po_user_id` int(10) UNSIGNED NOT NULL,
  `po_transaction_id` int(10) UNSIGNED NOT NULL,
  `po_money` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `po_meta_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `po_status` tinyint(4) NOT NULL DEFAULT '0',
  `po_month` tinyint(3) UNSIGNED DEFAULT NULL,
  `po_year` smallint(5) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pay_outs`
--

INSERT INTO `pay_outs` (`id`, `po_user_id`, `po_transaction_id`, `po_money`, `po_meta_detail`, `po_status`, `po_month`, `po_year`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 0, '', 1, 6, 2020, '2020-06-07 01:03:48', NULL),
(2, 2, 3, 440000, '', 1, 6, 2020, '2020-06-07 02:42:21', NULL),
(3, 2, 4, 504400, '', 1, 6, 2020, '2020-06-07 02:45:50', NULL),
(4, 1, 11, 470250, '', 1, 8, 2020, '2020-08-30 10:39:52', NULL),
(5, 1, 12, 470250, '', 1, 8, 2020, '2020-08-30 10:40:56', NULL),
(6, 1, 32, 10560, '', 1, 9, 2020, '2020-09-06 15:05:33', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_permission` tinyint(4) NOT NULL DEFAULT '0',
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `group_permission`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Group Ql sản phẩm', 'Nhóm quản lý sản phẩm', 10, 'admins', '2020-06-20 21:38:19', '2020-06-20 21:38:19'),
(2, 'full', 'Full quyền', 1, 'admins', '2020-06-20 21:38:50', '2020-06-20 21:38:50'),
(3, 'Group sản phẩm', 'NHóm sản phẩm', 10, 'admins', '2020-06-20 21:45:49', '2020-06-20 21:45:49'),
(4, 'Danh sách sản phẩm', 'Danh sách sản phẩm', 10, 'admins', '2020-06-20 21:46:03', '2020-06-20 21:46:03'),
(5, 'Group Ql bài viết', 'Nhóm quyền quản lsy bài viết', 6, 'admins', '2020-06-20 22:27:46', '2020-06-20 22:27:46'),
(6, 'Danh sách Menu', 'Danh sách Menu', 5, 'admins', '2020-06-20 22:28:03', '2020-06-20 22:28:03'),
(7, 'Danh sách bài viết', 'Danh sách bài viết', 6, 'admins', '2020-06-20 22:28:16', '2020-06-20 22:28:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pro_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_price` int(11) NOT NULL DEFAULT '0',
  `pro_price_entry` int(11) NOT NULL DEFAULT '0' COMMENT 'giá nhập',
  `pro_category_id` int(11) NOT NULL DEFAULT '0',
  `pro_supplier_id` int(11) NOT NULL DEFAULT '0',
  `pro_admin_id` int(11) NOT NULL DEFAULT '0',
  `pro_user_id` int(11) NOT NULL DEFAULT '0',
  `pro_sale` tinyint(4) NOT NULL DEFAULT '0',
  `pro_added_by` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `pro_avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_view` int(11) NOT NULL DEFAULT '0',
  `pro_hot` tinyint(4) NOT NULL DEFAULT '0',
  `pro_active` tinyint(4) NOT NULL DEFAULT '1',
  `pro_pay` int(11) NOT NULL DEFAULT '0',
  `pro_number_import` int(11) NOT NULL DEFAULT '0',
  `pro_import_goods` int(11) NOT NULL DEFAULT '0',
  `pro_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `pro_content` text COLLATE utf8mb4_unicode_ci,
  `pro_review_total` int(11) NOT NULL DEFAULT '0',
  `pro_review_star` int(11) NOT NULL DEFAULT '0',
  `pro_age_review` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `pro_number` int(11) NOT NULL DEFAULT '0',
  `pro_resistant` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_energy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_country` tinyint(4) NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `pro_name`, `pro_slug`, `pro_price`, `pro_price_entry`, `pro_category_id`, `pro_supplier_id`, `pro_admin_id`, `pro_user_id`, `pro_sale`, `pro_added_by`, `pro_avatar`, `pro_view`, `pro_hot`, `pro_active`, `pro_pay`, `pro_number_import`, `pro_import_goods`, `pro_description`, `pro_content`, `pro_review_total`, `pro_review_star`, `pro_age_review`, `created_at`, `pro_number`, `pro_resistant`, `pro_energy`, `pro_country`, `updated_at`) VALUES
(1, 'Nước Hoa Calvin Klein One EDT 200ml', 'nuoc-hoa-calvin-klein-one-edt-200ml', 800000, 0, 1, 1, 0, 0, 2, 'admin', '2020-04-25__anh-1.jpg', 4, 1, 1, 0, 10, 0, 'Nước Hoa Calvin Klein One EDT 200ml', 'Nước Hoa Calvin Klein One EDT 200ml', 0, 0, 0, '2020-04-25 04:05:47', 10, NULL, NULL, 0, '2020-04-25 07:30:35'),
(2, 'Kem Dưỡng Đêm Elf Nourishing Night Cream', 'kem-duong-dem-elf-nourishing-night-cream', 330000, 0, 2, 1, 0, 0, 1, 'admin', '2020-04-25__1.jpg', 4, 0, 1, 1, 40, 0, 'Kem Dưỡng Đêm Elf Nourishing Night Cream', 'Kem Dưỡng Đêm Elf Nourishing Night Cream', 0, 0, 0, '2020-04-25 07:37:12', 39, NULL, NULL, 0, NULL),
(3, 'Sữa Dưỡng Muji Moisturising Milk', 'sua-duong-muji-moisturising-milk', 210000, 0, 2, 1, 0, 0, 5, 'admin', '2020-04-25__2.jpg', 1, 0, 1, 0, 8, 0, 'Sữa Dưỡng Muji Moisturising Milk', 'Sữa Dưỡng Muji Moisturising Milk', 0, 0, 0, '2020-04-25 07:37:49', 8, NULL, NULL, 0, NULL),
(4, 'Set Dưỡng Da Innisfree Jeju Pomegranate', 'set-duong-da-innisfree-jeju-pomegranate', 250000, 0, 2, 1, 0, 0, 1, 'admin', '2020-04-25__3.jpg', 0, 0, 1, 0, 3, 0, 'Set Dưỡng Da Innisfree Jeju Pomegranate', 'Set Dưỡng Da Innisfree Jeju Pomegranate', 0, 0, 0, '2020-04-25 07:39:00', 3, NULL, NULL, 0, '2020-04-25 07:39:37'),
(5, 'Gel Dưỡng Da La Roche Posay Posthelios', 'gel-duong-da-la-roche-posay-posthelios', 450000, 0, 2, 1, 0, 0, 2, 'admin', '2020-04-25__4.jpg', 0, 0, 1, 0, 6, 0, 'Gel Dưỡng Da La Roche Posay Posthelios', 'Gel Dưỡng Da La Roche Posay Posthelios', 0, 0, 0, '2020-04-25 07:40:39', 6, NULL, NULL, 0, NULL),
(6, 'Bộ Kit Dưỡng Cho Da Mụn Some By Mi AC-SOS', 'bo-kit-duong-cho-da-mun-some-by-mi-ac-sos', 360000, 0, 2, 1, 0, 0, 1, 'admin', '2020-04-25__5.jpg', 1, 0, 1, 0, 3, 0, 'Bộ Kit Dưỡng Cho Da Mụn Some By Mi AC-SOS', 'Bộ Kit Dưỡng Cho Da Mụn Some By Mi AC-SOS', 0, 0, 0, '2020-04-25 07:41:37', 3, NULL, NULL, 0, NULL),
(7, 'Dung Dịch Trị Mụn Mario Badescu Drying Lotion', 'dung-dich-tri-mun-mario-badescu-drying-lotion', 234600, 0, 2, 1, 0, 0, 6, 'admin', '2020-04-25__6.jpg', 0, 0, 1, 0, 25, 0, 'Dung Dịch Trị Mụn Mario Badescu Drying Lotion', 'Dung Dịch Trị Mụn Mario Badescu Drying Lotion', 0, 0, 0, '2020-04-25 07:42:30', 25, NULL, NULL, 0, NULL),
(8, 'Some By Mi Snail Truecica Miracle Repair Starte', 'some-by-mi-snail-truecica-miracle-repair-starte', 500000, 0, 2, 1, 0, 0, 2, 'admin', '2020-04-25__7.jpg', 1, 0, 1, 0, 6, 0, 'Some By Mi Snail Truecica Miracle Repair Starte', 'Some By Mi Snail Truecica Miracle Repair Starte', 0, 0, 0, '2020-04-25 07:43:13', 6, NULL, NULL, 0, NULL),
(9, 'Kem Dưỡng Nâng Tông A\'Pieu BABY Tone Up Cream', 'kem-duong-nang-tong-apieu-baby-tone-up-cream', 170000, 0, 2, 1, 0, 0, 1, 'admin', '2020-04-25__8.jpg', 1, 0, 1, 0, 6, 0, 'Kem Dưỡng Nâng Tông A\'Pieu BABY Tone Up Cream', 'Kem Dưỡng Nâng Tông A\'Pieu BABY Tone Up Cream', 0, 0, 0, '2020-04-25 07:43:47', 6, NULL, NULL, 0, NULL),
(10, 'Tinh Chất Dưỡng Da AHC Capture Solution', 'tinh-chat-duong-da-ahc-capture-solution', 260000, 0, 2, 1, 0, 0, 2, 'admin', '2020-04-25__9.jpg', 1, 0, 1, 0, 3, 0, 'Tinh Chất Dưỡng Da AHC Capture Solution', 'Tinh Chất Dưỡng Da AHC Capture Solution', 0, 0, 0, '2020-04-25 07:44:25', 3, NULL, NULL, 0, NULL),
(11, 'Set Dưỡng Da Nam Innisfree Forest For Men', 'set-duong-da-nam-innisfree-forest-for-men', 100000, 0, 2, 1, 0, 0, 3, 'admin', '2020-04-25__10.jpg', 1, 0, 1, 0, 2, 0, 'Set Dưỡng Da Nam Innisfree Forest For Men', 'Set Dưỡng Da Nam Innisfree Forest For Men', 0, 0, 0, '2020-04-25 07:45:05', 2, NULL, NULL, 0, NULL),
(12, 'Tinh Chất Dưỡng Da Lebelage Hee Yul Premium', 'tinh-chat-duong-da-lebelage-hee-yul-premium', 150000, 0, 2, 1, 0, 0, 1, 'admin', '2020-04-25__11.jpg', 1, 0, 1, 0, 3, 0, 'Tinh Chất Dưỡng Da Lebelage Hee Yul Premium', 'Tinh Chất Dưỡng Da Lebelage Hee Yul Premium', 0, 0, 0, '2020-04-25 07:45:42', 3, NULL, NULL, 0, NULL),
(13, 'Gel Dưỡng Lô Hội Ra&Gowoori Soothing Gel', 'gel-duong-lo-hoi-ragowoori-soothing-gel', 234600, 0, 2, 1, 0, 0, 3, 'admin', '2020-04-25__12.jpeg', 0, 0, 1, 0, 25, 0, 'Gel Dưỡng Lô Hội Ra&Gowoori Soothing Gel', 'Gel Dưỡng Lô Hội Ra&Gowoori Soothing Gel', 0, 0, 0, '2020-04-25 07:46:27', 25, NULL, NULL, 0, '2020-06-21 09:33:12'),
(14, 'Kem Dưỡng Ẩm Laneige Water Bank Moisture Cream', 'kem-duong-am-laneige-water-bank-moisture-cream', 150000, 0, 2, 1, 0, 0, 1, 'admin', '2020-04-25__13.jpg', 3, 0, 1, 0, 6, 0, 'Kem Dưỡng Ẩm Laneige Water Bank Moisture Cream', 'Kem Dưỡng Ẩm Laneige Water Bank Moisture Cream', 0, 0, 0, '2020-04-25 07:47:08', 6, NULL, NULL, 0, NULL),
(15, 'Gel Dưỡng Ẩm Sáng Da Momotani White Moisture', 'gel-duong-am-sang-da-momotani-white-moisture', 260000, 0, 2, 1, 0, 0, 6, 'admin', '2020-04-25__14.jpg', 1, 0, 1, 0, 2, 0, 'Gel Dưỡng Ẩm Sáng Da Momotani White Moisture', 'Gel Dưỡng Ẩm Sáng Da Momotani White Moisture', 0, 0, 0, '2020-04-25 07:47:51', 2, NULL, NULL, 0, NULL),
(16, 'Set Gội Xả Shiseido Tsubaki Hair Care Set', 'set-goi-xa-shiseido-tsubaki-hair-care-set', 250000, 0, 3, 1, 0, 0, 1, 'admin', '2020-04-25__16.jpg', 3, 0, 1, 0, 3, 0, 'Set Gội Xả Shiseido Tsubaki Hair Care Set', 'Set Gội Xả Shiseido Tsubaki Hair Care Set', 0, 0, 0, '2020-04-25 07:48:52', 3, NULL, NULL, 0, NULL),
(17, 'Bộ Gội Xả Shiseido Tsubaki', 'bo-goi-xa-shiseido-tsubaki', 360000, 0, 3, 1, 0, 0, 3, 'admin', '2020-04-25__17.jpg', 0, 0, 1, 0, 6, 0, 'Bộ Gội Xả Shiseido Tsubaki', 'Bộ Gội Xả Shiseido Tsubaki', 0, 0, 0, '2020-04-25 07:49:24', 6, NULL, NULL, 0, NULL),
(18, 'Dầu gội Avalon Organics có chứa Biotin 414ml', 'dau-goi-avalon-organics-co-chua-biotin-414ml', 270000, 0, 3, 1, 0, 0, 0, 'admin', '2020-04-25__18.jpg', 0, 1, 1, 0, 3, 0, 'Dầu gội Avalon Organics có chứa Biotin 414ml', 'Dầu gội Avalon Organics có chứa Biotin 414ml', 0, 0, 0, '2020-04-25 07:50:06', 3, NULL, NULL, 0, '2020-04-25 08:13:43'),
(19, 'Bộ gội - xả Kerasys Scalp Clinic 600ml', 'bo-goi-xa-kerasys-scalp-clinic-600ml', 230000, 0, 3, 1, 0, 0, 0, 'admin', '2020-04-25__19.jpg', 0, 0, 1, 0, 5, 0, 'Bộ gội - xả Kerasys Scalp Clinic 600ml', 'Bộ gội - xả Kerasys Scalp Clinic 600ml', 0, 0, 0, '2020-04-25 07:50:36', 5, NULL, NULL, 0, NULL),
(20, 'Bộ gội - xả Missha Natural Lotus Vinegar', 'bo-goi-xa-missha-natural-lotus-vinegar', 350000, 0, 3, 1, 0, 0, 2, 'admin', '2020-04-25__20.jpg', 1, 1, 1, 0, 3, 0, 'Bộ gội - xả Missha Natural Lotus Vinegar', 'Bộ gội - xả Missha Natural Lotus Vinegar', 0, 0, 0, '2020-04-25 07:51:06', 3, NULL, NULL, 0, '2020-04-25 08:13:40'),
(21, 'Bộ Dầu Gội & Dầu Xả Kracie Ichikami 480ml', 'bo-dau-goi-dau-xa-kracie-ichikami-480ml', 250000, 0, 3, 1, 0, 0, 0, 'admin', '2020-04-25__21.jpg', 0, 0, 1, 0, 6, 0, 'Bộ Dầu Gội & Dầu Xả Kracie Ichikami 480ml', 'Bộ Dầu Gội & Dầu Xả Kracie Ichikami 480ml', 0, 0, 0, '2020-04-25 07:51:38', 6, NULL, NULL, 0, NULL),
(22, 'Bộ Dầu Gội & Dầu Xả Kracie Ichikami 550ml', 'bo-dau-goi-dau-xa-kracie-ichikami-550ml', 560000, 0, 3, 1, 0, 0, 1, 'admin', '2020-04-25__22.jpg', 1, 0, 1, 0, 4, 0, 'Bộ Dầu Gội & Dầu Xả Kracie Ichikami 550ml', 'Bộ Dầu Gội & Dầu Xả Kracie Ichikami 550ml', 0, 0, 0, '2020-04-25 07:52:25', 4, NULL, NULL, 0, NULL),
(23, 'Bộ Chăm Sóc Tóc Pantene Pro-V Winter Rescue Set', 'bo-cham-soc-toc-pantene-pro-v-winter-rescue-set', 260000, 0, 3, 1, 0, 0, 1, 'admin', '2020-04-25__23.jpg', 1, 0, 1, 0, 5, 0, 'Bộ Chăm Sóc Tóc Pantene Pro-V Winter Rescue Set', 'Bộ Chăm Sóc Tóc Pantene Pro-V Winter Rescue Set', 0, 0, 0, '2020-04-25 07:53:01', 5, NULL, NULL, 0, NULL),
(24, 'Bộ gội xả Shiseido Tsubaki Extra Moist', 'bo-goi-xa-shiseido-tsubaki-extra-moist', 250000, 0, 3, 1, 0, 0, 5, 'admin', '2020-04-25__25.jpg', 1, 0, 1, 0, 3, 0, 'Bộ gội xả Shiseido Tsubaki Extra Moist', 'Bộ gội xả Shiseido Tsubaki Extra Moist', 0, 0, 0, '2020-04-25 07:54:32', 3, NULL, NULL, 0, NULL),
(25, 'Bộ Dầu Gôi & Dầu Xả Kerasys Damage Clinic', 'bo-dau-goi-dau-xa-kerasys-damage-clinic', 450000, 0, 3, 1, 0, 0, 1, 'admin', '2020-04-25__26.jpg', 0, 0, 1, 0, 25, 0, 'Bộ Dầu Gôi & Dầu Xả Kerasys Damage Clinic', 'Bộ Dầu Gôi & Dầu Xả Kerasys Damage Clinic', 0, 0, 0, '2020-04-25 07:55:14', 25, NULL, NULL, 0, NULL),
(26, 'Bộ Dầu Gôi & Dầu Xả Kerasys Volume Clinic 600ml*3', 'bo-dau-goi-dau-xa-kerasys-volume-clinic-600ml3', 330000, 0, 3, 1, 0, 0, 0, 'admin', '2020-04-25__27.jpg', 0, 0, 1, 0, 6, 0, 'Bộ Dầu Gôi & Dầu Xả Kerasys Volume Clinic 600ml*3', 'Bộ Dầu Gôi & Dầu Xả Kerasys Volume Clinic 600ml*3', 0, 0, 0, '2020-04-25 07:56:03', 6, NULL, NULL, 0, NULL),
(27, 'Dầu Gội Khô Shiseido Tsubaki Dry Shampoo', 'dau-goi-kho-shiseido-tsubaki-dry-shampoo', 350000, 0, 3, 1, 0, 0, 1, 'admin', '2020-04-25__28.jpg', 0, 0, 1, 0, 2, 0, 'Dầu Gội Khô Shiseido Tsubaki Dry Shampoo', 'Dầu Gội Khô Shiseido Tsubaki Dry Shampoo', 0, 0, 0, '2020-04-25 07:56:47', 2, NULL, NULL, 0, NULL),
(28, 'Dầu Gội Khô Girlz Only', 'dau-goi-kho-girlz-only', 560000, 0, 3, 1, 0, 0, 3, 'admin', '2020-04-25__29.jpg', 0, 0, 1, 0, 8, 0, 'Dầu Gội Khô Girlz Only', 'Dầu Gội Khô Girlz Only', 0, 0, 0, '2020-04-25 07:57:20', 8, NULL, NULL, 0, NULL),
(29, 'Dầu Gội Khô Dove Refresh Dry Shampoo', 'dau-goi-kho-dove-refresh-dry-shampoo', 56000, 0, 3, 1, 0, 0, 2, 'admin', '2020-04-25__30.png', 0, 0, 1, 0, 6, 0, 'Dầu Gội Khô Dove Refresh Dry Shampoo', 'Dầu Gội Khô Dove Refresh Dry Shampoo', 0, 0, 0, '2020-04-25 07:58:03', 6, NULL, NULL, 0, NULL),
(30, 'Tinh Dầu Dưỡng Tóc Raip R3 Argan Hair Oil', 'tinh-dau-duong-toc-raip-r3-argan-hair-oil', 140000, 0, 3, 1, 0, 0, 0, 'admin', '2020-04-25__31.jpg', 0, 0, 1, 0, 3, 0, 'Tinh Dầu Dưỡng Tóc Raip R3 Argan Hair Oil', 'Tinh Dầu Dưỡng Tóc Raip R3 Argan Hair Oil', 0, 0, 0, '2020-04-25 07:58:43', 3, NULL, NULL, 0, NULL),
(31, 'Tinh Dầu Dưỡng Tóc Miseen Scène Perfect Repair', 'tinh-dau-duong-toc-miseen-scene-perfect-repair', 210000, 0, 3, 1, 0, 0, 2, 'admin', '2020-04-25__32.jpg', 0, 0, 1, 0, 3, 0, 'Tinh Dầu Dưỡng Tóc Miseen Scène Perfect Repair', 'Tinh Dầu Dưỡng Tóc Miseen Scène Perfect Repair', 0, 0, 0, '2020-04-25 07:59:17', 3, NULL, NULL, 0, NULL),
(32, 'Miseen Scène Perfect Repair #Styling', 'miseen-scene-perfect-repair-styling', 320000, 0, 3, 1, 0, 0, 3, 'admin', '2020-04-25__33.jpg', 0, 0, 1, 0, 6, 0, 'Miseen Scène Perfect Repair #Styling', 'Miseen Scène Perfect Repair #Styling', 0, 0, 0, '2020-04-25 08:00:02', 6, NULL, NULL, 0, NULL),
(33, 'Serum Dưỡng Tóc Vacosi Hair Care Tonic', 'serum-duong-toc-vacosi-hair-care-tonic', 270000, 0, 3, 1, 0, 0, 3, 'admin', '2020-04-25__34.jpg', 1, 0, 1, 0, 5, 0, 'Serum Dưỡng Tóc Vacosi Hair Care Tonic', 'Serum Dưỡng Tóc Vacosi Hair Care Tonic', 0, 0, 0, '2020-04-25 08:00:41', 5, NULL, NULL, 0, NULL),
(34, 'Dưỡng Tóc Ogx Renewing-Argan Oil Of Morocco', 'duong-toc-ogx-renewing-argan-oil-of-morocco', 220000, 0, 3, 1, 0, 0, 3, 'admin', '2020-04-25__35.jpg', 0, 0, 1, 0, 5, 0, 'Dưỡng Tóc Ogx Renewing-Argan Oil Of Morocco', 'Dưỡng Tóc Ogx Renewing-Argan Oil Of Morocco', 0, 0, 0, '2020-04-25 08:01:26', 5, NULL, NULL, 0, NULL),
(35, 'Serum Phục Hồi Tóc Pink Grapefruit Cocoon', 'serum-phuc-hoi-toc-pink-grapefruit-cocoon', 195000, 0, 3, 1, 0, 0, 3, 'admin', '2020-04-25__36.jpg', 0, 0, 1, 0, 25, 0, 'Serum Phục Hồi Tóc Pink Grapefruit Cocoon', 'Serum Phục Hồi Tóc Pink Grapefruit Cocoon', 0, 0, 0, '2020-04-25 08:02:15', 25, NULL, NULL, 0, NULL),
(36, 'Test 1', 'test-1', 100000, 0, 4, 1, 0, 0, 10, 'admin', NULL, 1, 0, 1, 0, 5, 0, 'description for product test 1', 'Sản phẩm test số 1', 0, 0, 0, '2020-04-25 08:02:59', 5, NULL, NULL, 0, NULL),
(37, 'Xịt Thơm Khử Mùi Quần Áo Fabric Perfume Spray', 'xit-thom-khu-mui-quan-ao-fabric-perfume-spray', 160000, 0, 1, 1, 0, 0, 2, 'admin', '2020-04-25__37.jpg', 0, 0, 1, 0, 3, 0, 'Xịt Thơm Khử Mùi Quần Áo Fabric Perfume Spray', 'Xịt Thơm Khử Mùi Quần Áo Fabric Perfume Spray', 0, 0, 0, '2020-04-25 08:03:10', 3, NULL, NULL, 0, NULL),
(38, 'Xịt Thơm Nước Hoa 1902 Melle Fleurs L\'Eau Eau', 'xit-thom-nuoc-hoa-1902-melle-fleurs-leau-eau', 450000, 0, 1, 1, 0, 0, 1, 'admin', '2020-04-25__38.jpg', 0, 0, 1, 0, 6, 0, 'Xịt Thơm Nước Hoa 1902 Melle Fleurs L\'Eau Eau', 'Xịt Thơm Nước Hoa 1902 Melle Fleurs L\'Eau Eau', 0, 0, 0, '2020-04-25 08:03:41', 6, NULL, NULL, 0, NULL),
(39, 'Xịt Thơm Body Victoria\'s Secret Fragrance Body', 'xit-thom-body-victorias-secret-fragrance-body', 270000, 0, 1, 1, 0, 0, 0, 'admin', '2020-04-25__39.jpg', 0, 0, 1, 0, 5, 0, 'Xịt Thơm Body Victoria\'s Secret Fragrance Body', 'Xịt Thơm Body Victoria\'s Secret Fragrance Body', 0, 0, 0, '2020-04-25 08:04:12', 5, NULL, NULL, 0, NULL),
(40, 'Bộ Victoria\'s Secret Fragrance Mist & Lotion', 'bo-victorias-secret-fragrance-mist-lotion', 350000, 0, 1, 1, 0, 0, 2, 'admin', '2020-04-25__40.jpg', 0, 0, 1, 0, 3, 0, 'Bộ Victoria\'s Secret Fragrance Mist & Lotion', 'Bộ Victoria\'s Secret Fragrance Mist & Lotion', 0, 0, 0, '2020-04-25 08:04:48', 3, NULL, NULL, 0, NULL),
(41, 'Nước Hoa Nữ Venus Global Beauty Laura Anné', 'nuoc-hoa-nu-venus-global-beauty-laura-anne', 410000, 0, 1, 1, 0, 0, 2, 'admin', '2020-04-25__41.jpg', 0, 0, 1, 0, 3, 0, 'Nước Hoa Nữ Venus Global Beauty Laura Anné', 'Nước Hoa Nữ Venus Global Beauty Laura Anné', 0, 0, 0, '2020-04-25 08:05:33', 3, NULL, NULL, 0, NULL),
(42, 'Nước Hoa Nữ Venus Global Beauty Laura Anné 1', 'nuoc-hoa-nu-venus-global-beauty-laura-anne-1', 420000, 0, 1, 1, 0, 0, 3, 'admin', '2020-04-25__42.jpg', 1, 0, 1, 0, -1, 0, 'Nước Hoa Nữ Venus Global Beauty Laura Anné', 'Nước Hoa Lancôme Miracle L\'Eau de Parfum', 0, 0, 0, '2020-04-25 08:06:43', -1, NULL, NULL, 0, '2020-06-12 04:05:05'),
(43, 'Nước Hoa Lancôme Miracle L\'Eau de Parfum', 'nuoc-hoa-lancome-miracle-leau-de-parfum', 250000, 0, 1, 1, 0, 0, 3, 'admin', '2020-04-25__43.jpg', 1, 0, 1, 0, 3, 0, 'Nước Hoa Lancôme Miracle L\'Eau de Parfum', 'Nước Hoa Lancôme Miracle L\'Eau de Parfum', 1, 5, 5, '2020-04-25 08:07:12', 3, NULL, NULL, 0, '2020-09-01 16:15:43'),
(44, 'Nước Hoa Gucci Bloom Eau de Parfum 2017', 'nuoc-hoa-gucci-bloom-eau-de-parfum-2017', 380000, 0, 1, 1, 0, 0, 2, 'admin', '2020-04-25__44.jpg', 5, 1, 1, 0, 5, 0, 'Nước Hoa Gucci Bloom Eau de Parfum 2017', 'Nước Hoa Gucci Bloom Eau de Parfum 2017', 2, 10, 5, '2020-04-25 08:07:45', 5, NULL, NULL, 0, '2020-10-04 10:19:49'),
(45, 'Nước Hoa Berdoues 1902 Eau de Toilette', 'nuoc-hoa-berdoues-1902-eau-de-toilette', 520000, 0, 1, 1, 0, 0, 3, 'admin', '2020-04-25__45.jpg', 12, 1, 1, 1, 6, 0, 'Nước Hoa Berdoues 1902 Eau de Toilette', 'Nước Hoa Berdoues 1902 Eau de Toilette', 0, 0, 0, '2020-04-25 08:08:22', 5, NULL, NULL, 0, '2020-04-25 08:13:17'),
(46, 'Nước Hoa Nam Venus Global Beauty Gota Perfume', 'nuoc-hoa-nam-venus-global-beauty-gota-perfume', 290000, 0, 1, 1, 0, 0, 2, 'admin', '2020-04-25__46.jpg', 0, 0, 1, 0, 3, 0, 'Nước Hoa Nam Venus Global Beauty Gota Perfume', 'Nước Hoa Nam Venus Global Beauty Gota Perfume', 0, 0, 0, '2020-04-25 08:09:12', 3, NULL, NULL, 0, NULL),
(47, 'Nước Hoa Versace Pour Homme Dylan Blue 5ml', 'nuoc-hoa-versace-pour-homme-dylan-blue-5ml', 240000, 0, 1, 1, 0, 0, 1, 'admin', '2020-04-25__47.jpg', 9, 1, 1, 1, 5, 0, 'Nước Hoa Versace Pour Homme Dylan Blue 5ml', 'Nước Hoa Versace Pour Homme Dylan Blue 5ml', 0, 0, 0, '2020-04-25 08:10:05', 5, NULL, NULL, 0, '2020-04-25 08:13:13'),
(48, 'Lăn Khử Mùi Cho Nam Old Spice Timber', 'lan-khu-mui-cho-nam-old-spice-timber', 650000, 0, 1, 1, 0, 0, 1, 'admin', '2020-04-25__48.jpg', 6, 0, 1, 0, 3, 0, 'Lăn Khử Mùi Cho Nam Old Spice Timber', 'Lăn Khử Mùi Cho Nam Old Spice Timber', 0, 0, 0, '2020-04-25 08:10:36', 3, NULL, NULL, 0, NULL),
(49, 'Nước Hoa Nam Victoria’s Secret', 'nuoc-hoa-nam-victorias-secret', 950000, 0, 1, 1, 0, 0, 1, 'admin', '2020-04-25__49.jpg', 8, 1, 1, 8, 4, 0, 'Nước Hoa Nam Victoria’s Secret', 'Nước Hoa Nam Victoria’s Secret', 0, 0, 0, '2020-04-25 08:11:10', -4, NULL, NULL, 0, '2020-09-01 15:57:38'),
(50, 'Nước hoa mini Versace Pour Homme - Eau De Toilette', 'nuoc-hoa-mini-versace-pour-homme-eau-de-toilette', 12000, 0, 1, 1, 0, 0, 2, 'admin', '2020-04-25__50.jpg', 22, 0, 1, 3, 3, 2, 'Nước hoa mini Versace Pour Homme - Eau De Toilette', 'Nước hoa mini Versace Pour Homme - Eau De Toilette', 0, 0, 0, '2020-04-25 08:11:49', 0, NULL, NULL, 0, '2020-06-15 04:48:23'),
(51, 'Kem Chống Nắng Neutrogena Ultra Sheer Dry-Touch Sunscreen SPF70', 'kem-chong-nang-neutrogena-ultra-sheer-dry-touch-sunscreen-spf70', 250000, 0, 6, 1, 0, 0, 12, 'admin', '2020-09-02__fb-img-1532132041738.jpg', 11, 127, 1, 4, 20, 1, 'Kem chống nắng neutrogena Ultra Sheer Sunscreen với công thức đặc biệt bảo vệ da tránh tia UV tối đa dưới ánh nắng gắt của mùa hè.- Da bạn sẽ không bị bóng nhờn, ngược lại, sẽ có cảm giác khô ráo và nhẹ nhàng.- Sản phẩm còn tích hợp Butylene Glycol dưỡng ẩm và làm đẹp da, Vitamin A, C, E nuôi dưỡng làn da.- Công thức Heliopex này tăng độ bền vững trước ánh nắng, giúp chống nắng được lâu hơn.', 'test', 3, 13, 4, '2020-04-25 08:17:22', 8, NULL, NULL, 0, '2020-09-28 13:35:11'),
(53, 'chung test create shop seller 1', 'chung-test-create-shop-seller-1', 50000, 0, 8, 0, 0, 1, 50, 'seller', '2020-09-02__101903174-1125597857795548-2092010616264061976-o.jpg', 0, 0, 1, 0, 12, 0, 'mô tả 1', '<p>Nội dung 1</p>', 0, 0, 0, '2020-09-02 09:03:34', 12, NULL, NULL, 0, '2020-09-20 03:25:44'),
(54, 'chung test add product', 'chung-test-add-product', 130000, 0, 2, 0, 0, 0, 10, 'admin', '2020-09-03__117108163-1179202312435102-2607025118622587023-o.jpg', 0, 0, 1, 0, 12, 0, 'Mô tả', '<p>Nội dung</p>', 0, 0, 0, '2020-09-03 14:11:28', 12, NULL, NULL, 0, NULL),
(55, 'chung test product222222222222', 'chung-test-product222222222222', 50000, 0, 1, 0, 0, 0, 10, 'admin', NULL, 1, 0, 1, 0, 12, 0, 'sdfs', '<p>sdfas2222222222222</p>', 0, 0, 0, '2020-09-03 14:17:57', 12, NULL, NULL, 0, '2020-09-03 14:18:54'),
(56, 'sdfsdfds', 'sdfsdfds', 12000, 0, 4, 0, 0, 0, 12, 'admin', NULL, 1, 0, 1, 1, 21, 0, 'dsfsd', '<p>sdfds</p>', 0, 0, 0, '2020-09-03 14:22:48', 21, NULL, NULL, 0, '2020-09-03 14:29:55'),
(57, 'sdfsdf', 'sdfsdf', 12000, 0, 3, 0, 0, 1, 2, 'admin', NULL, 0, 0, 1, 0, 12, 0, 'dsf', '<p>sdf</p>', 0, 0, 0, '2020-09-03 14:30:12', 12, NULL, NULL, 0, NULL),
(58, 'test', 'test', 12, 0, 2, 0, 0, 0, 1, 'admin', NULL, 0, 0, 1, 0, 1, 0, 'sdfsd', '<p>sfsfsdfdsf</p>', 0, 0, 0, '2020-09-21 10:24:54', 1, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pa_product_id` int(11) NOT NULL DEFAULT '0',
  `pa_attribute_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `pa_product_id`, `pa_attribute_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 1),
(4, 2, 3),
(5, 3, 1),
(8, 4, 1),
(9, 4, 4),
(10, 5, 1),
(11, 5, 4),
(12, 6, 1),
(13, 6, 4),
(14, 7, 2),
(15, 7, 3),
(16, 8, 1),
(17, 8, 4),
(18, 9, 1),
(19, 9, 3),
(20, 10, 1),
(21, 10, 4),
(22, 11, 1),
(23, 11, 3),
(24, 12, 1),
(25, 12, 4),
(26, 13, 1),
(27, 13, 4),
(28, 14, 1),
(29, 14, 4),
(30, 15, 1),
(31, 15, 4),
(32, 16, 1),
(33, 16, 4),
(34, 17, 1),
(35, 17, 3),
(36, 18, 1),
(37, 18, 4),
(38, 19, 1),
(39, 19, 4),
(40, 20, 2),
(41, 20, 3),
(42, 21, 1),
(43, 21, 4),
(44, 22, 1),
(45, 22, 3),
(46, 23, 1),
(47, 23, 4),
(48, 24, 2),
(49, 24, 3),
(50, 25, 1),
(51, 25, 3),
(52, 26, 1),
(53, 26, 4),
(54, 27, 2),
(55, 27, 3),
(56, 28, 1),
(57, 28, 3),
(58, 29, 2),
(59, 29, 3),
(60, 30, 1),
(61, 30, 4),
(62, 31, 1),
(63, 31, 3),
(64, 32, 1),
(65, 32, 4),
(66, 33, 1),
(67, 33, 3),
(68, 34, 2),
(69, 34, 3),
(70, 34, 4),
(71, 35, 2),
(72, 35, 3),
(73, 36, 1),
(74, 36, 4),
(75, 37, 1),
(76, 37, 3),
(77, 38, 2),
(78, 38, 3),
(79, 39, 1),
(80, 39, 4),
(81, 40, 2),
(82, 40, 3),
(83, 41, 1),
(84, 41, 3),
(87, 43, 1),
(88, 43, 3),
(89, 44, 1),
(90, 44, 3),
(91, 45, 1),
(92, 45, 3),
(93, 46, 1),
(94, 46, 3),
(95, 47, 1),
(96, 47, 3),
(97, 48, 1),
(98, 48, 4),
(121, 42, 1),
(122, 42, 4),
(131, 50, 1),
(132, 50, 3),
(187, 49, 1),
(188, 49, 3),
(193, 52, 1),
(194, 52, 4),
(195, 52, 5),
(196, 52, 7),
(197, 51, 1),
(198, 51, 4),
(211, 54, 1),
(212, 54, 3),
(213, 54, 5),
(214, 54, 7),
(227, 55, 1),
(228, 55, 2),
(229, 55, 3),
(230, 55, 4),
(231, 55, 5),
(232, 55, 6),
(233, 55, 7),
(234, 55, 8),
(239, 56, 1),
(240, 56, 3),
(241, 56, 5),
(242, 56, 7),
(243, 53, 1),
(244, 53, 2),
(245, 53, 3),
(246, 53, 4),
(247, 53, 5),
(248, 53, 6),
(249, 53, 7),
(250, 53, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pi_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pi_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pi_product_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `r_user_id` int(11) NOT NULL DEFAULT '0',
  `r_product_id` int(11) NOT NULL DEFAULT '0',
  `r_number` tinyint(4) NOT NULL DEFAULT '0',
  `r_status` tinyint(4) NOT NULL DEFAULT '0',
  `r_content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `r_user_id`, `r_product_id`, `r_number`, `r_status`, `r_content`, `created_at`, `updated_at`) VALUES
(2, 1, 45, 3, 0, 'tốt', '2020-07-13 17:52:26', '2020-07-13 17:52:26'),
(3, 1, 43, 5, 0, 'sdsds', '2020-09-01 16:15:43', '2020-09-01 16:15:43'),
(4, 5, 51, 5, 0, NULL, '2020-09-28 13:34:54', '2020-09-28 13:34:54'),
(5, 5, 51, 5, 0, 'a', '2020-09-28 13:35:11', '2020-09-28 13:35:11'),
(6, 5, 44, 5, 0, '6yryrytr', '2020-10-04 10:19:33', '2020-10-04 10:19:33'),
(7, 5, 44, 5, 0, '546456', '2020-10-04 10:19:49', '2020-10-04 10:19:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `name_slug`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Full tính năng', 'full-tinh-nang', 'admins', NULL, '2020-06-20 21:58:12', '2020-06-20 22:06:13'),
(3, 'CTV Viết Bài', 'ctv-viet-bai', 'admins', 'Cộng tác viên viết bài', '2020-06-20 22:31:01', '2020-06-20 22:31:01'),
(4, 'chungdd', 'chungdd', 'admins', 'jhjhj', '2020-09-20 03:50:27', '2020-09-20 03:50:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 1),
(2, 4),
(5, 3),
(6, 3),
(7, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `se_user_id` int(11) NOT NULL,
  `se_verification_status` int(11) NOT NULL DEFAULT '0',
  `se_admin_to_pay` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sellers`
--

INSERT INTO `sellers` (`id`, `se_user_id`, `se_verification_status`, `se_admin_to_pay`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, '2020-09-05 03:04:59', '2020-09-05 03:04:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `sp_user_id` int(11) NOT NULL,
  `sp_name` varchar(255) NOT NULL,
  `sp_logo` varchar(255) DEFAULT NULL,
  `sp_address` varchar(255) NOT NULL,
  `sp_slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `shops`
--

INSERT INTO `shops` (`id`, `sp_user_id`, `sp_name`, `sp_logo`, `sp_address`, `sp_slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'chung test create shop', NULL, 'Hà Nam 1', 'chung-test-create-shop', '2020-08-31 15:35:40', '2020-09-01 14:13:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sd_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sd_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sd_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sd_target` tinyint(4) NOT NULL DEFAULT '1',
  `sd_active` tinyint(4) NOT NULL DEFAULT '1',
  `sd_sort` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `sd_title`, `sd_link`, `sd_image`, `sd_target`, `sd_active`, `sd_sort`, `created_at`, `updated_at`) VALUES
(1, 'Mua nhiều giảm nhiều nhanh tay số lượng có hạn', 'https://beautygarden.vn/', '2020-04-25__banner-tgnh-thang3.jpg', 3, 1, 0, '2020-04-25 07:27:33', '2020-04-25 08:24:13'),
(2, 'Test', 'https://beautygarden.vn/', '2020-04-25__banner-tgnh-thang3.jpg', 1, 1, 1, '2020-04-25 07:30:24', NULL),
(3, 'Test', 'https://beautygarden.vn/', '2020-04-25__banner-web-bgxshopee.png', 2, 1, 0, '2020-04-25 08:10:01', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statics`
--

CREATE TABLE `statics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `s_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_type` tinyint(4) NOT NULL DEFAULT '0',
  `s_md5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `statics`
--

INSERT INTO `statics` (`id`, `s_title`, `s_slug`, `s_type`, `s_md5`, `s_content`, `created_at`, `updated_at`) VALUES
(1, 'abc', NULL, 2, NULL, '<p>SPF được t&iacute;nh theo thời gian chống tia UV: Rất đơn giản bạn chỉ cần lấy SPF nh&acirc;n với 10 sẽ ra được thời gian bảo vệ da t&iacute;nh bằng ph&uacute;t. V&iacute; dụ SPF chống nắng l&agrave; 20 th&igrave; thời gian bảo vệ da l&agrave; SPF 20 = 20 x 10 = 200 ph&uacute;t = 3h20 ph&uacute;t. Hay SPF 50 th&igrave; thời gian bảo vệ tối đa l&agrave; 500 ph&uacute;t.&nbsp;</p>', '2020-04-25 08:44:06', '2020-04-25 08:44:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tst_user_id` int(11) NOT NULL DEFAULT '0',
  `tst_admin_id` int(11) NOT NULL DEFAULT '0',
  `tst_total_money` int(11) NOT NULL DEFAULT '0',
  `tst_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tst_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tst_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tst_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tst_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tst_status` tinyint(4) NOT NULL DEFAULT '1',
  `tst_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT ' 1 thanh toan thuong, 2 la thanh toan online',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transactions`
--

INSERT INTO `transactions` (`id`, `tst_user_id`, `tst_admin_id`, `tst_total_money`, `tst_name`, `tst_email`, `tst_phone`, `tst_address`, `tst_note`, `tst_status`, `tst_type`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 231760, 'TrungPhuNa', 'phupt.humg.94@gmail.com', '0986420994', 'Nghệ AN', NULL, 3, 1, '2020-04-27 19:06:31', '2020-09-03 14:32:58'),
(2, 2, 1, 0, 'TrungPhuNa', 'phupt.humg.94@gmail.com', '0986420994', 'Nghệ AN', NULL, 3, 2, '2020-06-07 01:03:48', '2020-09-03 14:32:58'),
(3, 2, 1, 440000, 'TrungPhuNa', 'phupt.humg.94@gmail.com', '0986420994', 'Nghệ AN', NULL, 3, 2, '2020-06-07 02:42:21', '2020-09-03 14:32:57'),
(4, 2, 1, 504400, 'TrungPhuNa', 'phupt.humg.94@gmail.com', '0986420994', 'Nghệ AN', NULL, 3, 2, '2020-06-07 02:45:50', '2020-09-03 14:32:56'),
(5, 2, 1, 237600, 'TrungPhuNa', 'phupt.humg.94@gmail.com', '0986420994', 'Nghệ AN', NULL, 3, 1, '2020-06-08 08:58:19', '2020-06-08 08:58:35'),
(6, 2, 1, 23520, 'TrungPhuNa', 'phupt.humg.94@gmail.com', '0986420994', 'Hai Bà Trưng Hà Nội', NULL, 3, 1, '2020-06-15 04:48:55', '2020-06-15 04:49:04'),
(7, 2, 1, 16000, 'TrungPhuNa', 'phupt.humg.94@gmail.com', '0986420994', 'Hai Bà Trưng Hà Nội', NULL, 3, 1, '2020-06-18 05:17:30', '2020-06-18 05:26:50'),
(8, 1, 1, 3147760, 'Khách hàng 1', 'khachhang1@gmail.com', '01255878995885', 'Ha Nam', 'Gui hanh nhanh cho toi nhe', -1, 1, '2020-07-13 17:59:11', '2020-07-13 18:03:26'),
(9, 1, 0, 11760, 'Khách hàng 1', 'khachhang1@gmail.com', '01255878995885', 'sfgsdgfsdf', 'sdfdsfsdfds', -1, 1, '2020-08-26 13:07:22', '2020-08-26 13:23:27'),
(10, 1, 1, 470250, 'Khách hàng 1', 'khachhang1@gmail.com', '01255878995885', 'chung test coupon', 'ok', 3, 1, '2020-08-30 10:35:52', '2020-09-03 14:32:43'),
(11, 1, 1, 470250, 'Khách hàng 1', 'khachhang1@gmail.com', '01255878995885', 'dsd', 'sdsd', 3, 2, '2020-08-30 10:39:52', '2020-09-03 14:32:42'),
(12, 1, 1, 470250, 'Khách hàng 1', 'khachhang1@gmail.com', '01255878995885', 'cvv', 'xvvxc', 3, 2, '2020-08-30 10:40:56', '2020-09-03 14:32:42'),
(13, 1, 1, 470250, 'Khách hàng 1', 'khachhang1@gmail.com', '01255878995885', 'ádsadsad', 'ádasdasdasd', 3, 1, '2020-08-30 15:38:58', '2020-09-03 14:32:41'),
(14, 1, 1, 470250, 'Khách hàng 1', 'khachhang1@gmail.com', '01255878995885', 'aaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaa', 3, 1, '2020-08-31 13:04:53', '2020-09-03 14:32:35'),
(15, 1, 1, 470250, 'Khách hàng 1', 'khachhang1@gmail.com', '01255878995885', 'qqqqqqqqqqqqqqq', 'qqqqqqqqqqqqqqqqq', 3, 1, '2020-08-31 13:06:01', '2020-09-03 14:32:34'),
(16, 1, 1, 470250, 'Khách hàng 1', 'khachhang1@gmail.com', '01255878995885', 'hhhhhhhhhhhh', 'hhhhhhhhhhhhhhhh', 3, 1, '2020-08-31 13:07:11', '2020-09-03 14:32:33'),
(17, 1, 1, 470250, 'Khách hàng 1', 'khachhang1@gmail.com', '01255878995885', 'fffffffffff', 'ffffffffffffffffff', 3, 1, '2020-08-31 13:08:24', '2020-09-03 14:32:33'),
(18, 1, 1, 470250, 'Khách hàng 1', 'khachhang1@gmail.com', '01255878995885', 'rxxxxxxxxxx', 'xxxxxxxxxxxxx', 3, 1, '2020-08-31 13:09:11', '2020-09-03 14:32:32'),
(19, 1, 1, 470250, 'Khách hàng 1', 'khachhang1@gmail.com', '01255878995885', 'rxxxxxxxxxx', 'xxxxxxxxxxxxx', 3, 1, '2020-08-31 13:10:25', '2020-09-03 14:32:31'),
(20, 1, 1, 470250, 'Khách hàng 1', 'khachhang1@gmail.com', '01255878995885', 'rxxxxxxxxxx', 'xxxxxxxxxxxxx', 3, 1, '2020-08-31 13:11:53', '2020-09-03 14:32:31'),
(21, 1, 1, 470250, 'Khách hàng 1', 'khachhang1@gmail.com', '01255878995885', 'rxxxxxxxxxx', 'xxxxxxxxxxxxx', 3, 1, '2020-08-31 13:11:56', '2020-09-03 14:32:30'),
(22, 1, 1, 470250, 'Khách hàng 1', 'khachhang1@gmail.com', '01255878995885', 'bbbbbbbb', 'bbbbbbbbbbb', 3, 1, '2020-08-31 13:12:15', '2020-09-03 14:32:29'),
(23, 1, 1, 470250, 'Khách hàng 1', 'khachhang1@gmail.com', '01255878995885', 'vvvvvvvvv', 'vvvvvvvvvv', 3, 1, '2020-08-31 13:17:15', '2020-09-03 14:32:18'),
(24, 1, 0, 470250, 'Khách hàng 1', 'khachhang1@gmail.com', '01255878995885', 'vvvvvvvvv', 'vvvvvvvvvv', -1, 1, '2020-08-31 13:18:39', '2020-09-02 08:52:15'),
(25, 1, 0, 470250, 'Khách hàng 1', 'khachhang1@gmail.com', '01255878995885', 'vvvvvvvvv', 'vvvvvvvvvv', -1, 1, '2020-08-31 13:19:03', '2020-09-02 08:52:09'),
(26, 4, 0, 643500, 'test', 'test@gmail.com', '111111', 'sds', 'sdfsdfsdf', -1, 1, '2020-09-03 14:54:13', '2020-09-03 14:57:48'),
(27, 4, 0, 504400, 'test', 'test@gmail.com', '111111', 'regdsfgfdgfsd', 'fdgsdgsfdgsdgd', 1, 1, '2020-09-03 14:58:20', NULL),
(28, 4, 0, 504400, 'test', 'test@gmail.com', '111111', 'rẻgfdgdfgfd', 'dfgfdgfdgfd', 1, 1, '2020-09-03 15:01:44', NULL),
(29, 4, 1, 504400, 'test', 'test@gmail.com', '111111', 'sdfsdf', 'sdfdsfsd', 3, 1, '2020-09-03 15:03:22', '2020-10-04 10:23:36'),
(30, 4, 0, 220000, 'test', 'test@gmail.com', '111111', 'sdfsd', 'sdfsdf', 1, 1, '2020-09-03 15:19:50', NULL),
(31, 5, 1, 220000, 'chungdd', 'chungdd@gmail.com', '11111111', 'sdfdsfsd', 'sdfsdfsfsfsd', -1, 1, '2020-09-03 15:21:28', '2020-10-04 10:21:46'),
(32, 1, 0, 10560, 'Khách hàng 1', 'khachhang1@gmail.com', '01255878995885', 'sdfsd', 'sdf', 1, 2, '2020-09-06 15:05:33', NULL),
(33, 5, 0, 165000, 'chungdd', 'chungdd@gmail.com', '11111111', 'sdfds', 'sdfsdfds', 1, 1, '2020-10-03 14:36:25', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `balance` int(11) NOT NULL DEFAULT '0',
  `log_login` text COLLATE utf8mb4_unicode_ci,
  `count_comment` tinyint(4) NOT NULL DEFAULT '0',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `user_type`, `balance`, `log_login`, `count_comment`, `address`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Khách hàng 1', 'khachhang1@gmail.com', NULL, '$2y$10$kNYA/jfQW0d4KS9blR0SOODPwVXB.Mr43sx.GbKGiZj6rlCiilXEm', '01255878995885', 'seller', 9440, '[{\"device\":\"WebKit\",\"platform\":\"Linux\",\"platform_ver\":false,\"browser\":\"Chrome\",\"browser_ver\":\"79.0.3945.79\",\"time\":\"2020-07-14T00:51:11.526745Z\"},{\"device\":\"WebKit\",\"platform\":\"Windows\",\"platform_ver\":\"10.0\",\"browser\":\"Chrome\",\"browser_ver\":\"84.0.4147.125\",\"time\":\"2020-08-17T14:59:55.142715Z\"},{\"device\":\"WebKit\",\"platform\":\"Windows\",\"platform_ver\":\"10.0\",\"browser\":\"Chrome\",\"browser_ver\":\"84.0.4147.135\",\"time\":\"2020-08-23T12:37:05.062292Z\"},{\"device\":\"WebKit\",\"platform\":\"Windows\",\"platform_ver\":\"10.0\",\"browser\":\"Chrome\",\"browser_ver\":\"84.0.4147.135\",\"time\":\"2020-08-26T13:06:41.729666Z\"},{\"device\":\"WebKit\",\"platform\":\"Windows\",\"platform_ver\":\"10.0\",\"browser\":\"Chrome\",\"browser_ver\":\"84.0.4147.135\",\"time\":\"2020-08-27T12:57:35.292477Z\"},{\"device\":\"WebKit\",\"platform\":\"Windows\",\"platform_ver\":\"10.0\",\"browser\":\"Chrome\",\"browser_ver\":\"84.0.4147.135\",\"time\":\"2020-08-30T08:41:30.011210Z\"},{\"device\":\"WebKit\",\"platform\":\"Windows\",\"platform_ver\":\"10.0\",\"browser\":\"Chrome\",\"browser_ver\":\"84.0.4147.135\",\"time\":\"2020-08-31T12:55:50.387948Z\"},{\"device\":\"WebKit\",\"platform\":\"Windows\",\"platform_ver\":\"10.0\",\"browser\":\"Chrome\",\"browser_ver\":\"84.0.4147.135\",\"time\":\"2020-09-01T12:38:22.675481Z\"},{\"device\":\"WebKit\",\"platform\":\"Windows\",\"platform_ver\":\"10.0\",\"browser\":\"Chrome\",\"browser_ver\":\"84.0.4147.135\",\"time\":\"2020-09-02T04:08:24.696378Z\"},{\"device\":\"WebKit\",\"platform\":\"Windows\",\"platform_ver\":\"10.0\",\"browser\":\"Chrome\",\"browser_ver\":\"84.0.4147.135\",\"time\":\"2020-09-02T07:19:58.041088Z\"},{\"device\":\"WebKit\",\"platform\":\"Windows\",\"platform_ver\":\"10.0\",\"browser\":\"Chrome\",\"browser_ver\":\"85.0.4183.83\",\"time\":\"2020-09-03T13:39:25.354825Z\"},{\"device\":\"WebKit\",\"platform\":\"Windows\",\"platform_ver\":\"10.0\",\"browser\":\"Chrome\",\"browser_ver\":\"85.0.4183.83\",\"time\":\"2020-09-06T15:04:54.286702Z\"},{\"device\":\"WebKit\",\"platform\":\"Windows\",\"platform_ver\":\"10.0\",\"browser\":\"Chrome\",\"browser_ver\":\"85.0.4183.83\",\"time\":\"2020-09-07T13:53:46.572862Z\"},{\"device\":\"WebKit\",\"platform\":\"Windows\",\"platform_ver\":\"10.0\",\"browser\":\"Chrome\",\"browser_ver\":\"85.0.4183.83\",\"time\":\"2020-09-08T14:54:14.090192Z\"},{\"device\":\"WebKit\",\"platform\":\"Windows\",\"platform_ver\":\"10.0\",\"browser\":\"Chrome\",\"browser_ver\":\"85.0.4183.102\",\"time\":\"2020-09-20T02:46:35.625390Z\"}]', 3, NULL, '2020-08-31__83897126-1032624393759562-4005644151319166976-n.jpg', NULL, '2020-04-27 14:04:54', '2020-08-31 15:30:03'),
(2, 'TrungPhuNa', 'phupt.humg.94@gmail.com', NULL, '$2y$10$kNYA/jfQW0d4KS9blR0SOODPwVXB.Mr43sx.GbKGiZj6rlCiilXEm', '0986420994', 'customer', 55600, '[{\"device\":\"Macintosh\",\"platform\":\"OS X\",\"platform_ver\":\"10_15_5\",\"browser\":\"Chrome\",\"browser_ver\":\"83.0.4103.97\",\"time\":\"2020-06-07T07:43:32.544299Z\"},{\"device\":\"Macintosh\",\"platform\":\"OS X\",\"platform_ver\":\"10_15_5\",\"browser\":\"Chrome\",\"browser_ver\":\"83.0.4103.97\",\"time\":\"2020-06-08T15:58:03.202012Z\"},{\"device\":\"Macintosh\",\"platform\":\"OS X\",\"platform_ver\":\"10_15_5\",\"browser\":\"Chrome\",\"browser_ver\":\"83.0.4103.97\",\"time\":\"2020-06-10T01:36:24.281584Z\"},{\"device\":\"Macintosh\",\"platform\":\"OS X\",\"platform_ver\":\"10_15_5\",\"browser\":\"Chrome\",\"browser_ver\":\"83.0.4103.97\",\"time\":\"2020-06-11T06:10:10.072933Z\"},{\"device\":\"Macintosh\",\"platform\":\"OS X\",\"platform_ver\":\"10_15_5\",\"browser\":\"Chrome\",\"browser_ver\":\"83.0.4103.97\",\"time\":\"2020-06-12T06:56:54.562544Z\"},{\"device\":\"Macintosh\",\"platform\":\"OS X\",\"platform_ver\":\"10_15_5\",\"browser\":\"Chrome\",\"browser_ver\":\"83.0.4103.97\",\"time\":\"2020-06-14T14:16:54.143852Z\"},{\"device\":\"Macintosh\",\"platform\":\"OS X\",\"platform_ver\":\"10_15_5\",\"browser\":\"Chrome\",\"browser_ver\":\"83.0.4103.97\",\"time\":\"2020-06-15T11:48:34.285855Z\"},{\"device\":\"Macintosh\",\"platform\":\"OS X\",\"platform_ver\":\"10_15_5\",\"browser\":\"Chrome\",\"browser_ver\":\"83.0.4103.97\",\"time\":\"2020-06-18T12:17:16.843168Z\"},{\"device\":\"Macintosh\",\"platform\":\"OS X\",\"platform_ver\":\"10_15_5\",\"browser\":\"Chrome\",\"browser_ver\":\"83.0.4103.97\",\"time\":\"2020-06-20T00:34:07.005772Z\"},{\"device\":\"Macintosh\",\"platform\":\"OS X\",\"platform_ver\":\"10_15_5\",\"browser\":\"Chrome\",\"browser_ver\":\"83.0.4103.116\",\"time\":\"2020-06-29T09:24:36.795657Z\"}]', 27, 'Hai Bà Trưng Hà Nội', NULL, NULL, '2020-04-27 19:06:14', '2020-06-12 00:07:08'),
(3, 'Đức Anh', 'ducanh12121@gmail.com', NULL, '$2y$10$kNYA/jfQW0d4KS9blR0SOODPwVXB.Mr43sx.GbKGiZj6rlCiilXEm', '098767615', 'customer', 0, NULL, 2, NULL, NULL, NULL, '2020-06-18 10:24:55', NULL),
(4, 'test', 'test@gmail.com', NULL, '$2y$10$YMHxYZKVznBR/QtlZjmzOObiVITIuWsKYzQtrOBJ/fRFPgZ9XvxDG', '111111', 'customer', 0, NULL, 0, NULL, NULL, NULL, '2020-09-03 14:48:23', NULL),
(5, 'chungdd', 'chungdd@gmail.com', NULL, '$2y$10$P6xbHW3O418hENW9ZyAPl.xjVVzsuHhANFiS2j0Scqo8KqsstA/KG', '11111111', 'customer', 0, '[{\"device\":\"WebKit\",\"platform\":\"Windows\",\"platform_ver\":\"10.0\",\"browser\":\"Chrome\",\"browser_ver\":\"85.0.4183.83\",\"time\":\"2020-09-05T02:47:08.337884Z\"},{\"device\":\"WebKit\",\"platform\":\"Windows\",\"platform_ver\":\"10.0\",\"browser\":\"Chrome\",\"browser_ver\":\"85.0.4183.83\",\"time\":\"2020-09-06T15:02:13.241622Z\"},{\"device\":\"WebKit\",\"platform\":\"Windows\",\"platform_ver\":\"10.0\",\"browser\":\"Chrome\",\"browser_ver\":\"85.0.4183.121\",\"time\":\"2020-09-28T12:20:20.613698Z\"},{\"device\":\"WebKit\",\"platform\":\"Windows\",\"platform_ver\":\"10.0\",\"browser\":\"Chrome\",\"browser_ver\":\"85.0.4183.121\",\"time\":\"2020-10-03T14:16:16.822131Z\"},{\"device\":\"WebKit\",\"platform\":\"Windows\",\"platform_ver\":\"10.0\",\"browser\":\"Chrome\",\"browser_ver\":\"85.0.4183.121\",\"time\":\"2020-10-04T10:18:47.644131Z\"},{\"device\":\"WebKit\",\"platform\":\"Windows\",\"platform_ver\":\"10.0\",\"browser\":\"Chrome\",\"browser_ver\":\"85.0.4183.121\",\"time\":\"2020-10-04T15:45:22.265192Z\"}]', 0, NULL, NULL, NULL, '2020-09-03 15:21:11', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_favourite`
--

CREATE TABLE `user_favourite` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uf_product_id` int(11) NOT NULL DEFAULT '0',
  `uf_user_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_favourite`
--

INSERT INTO `user_favourite` (`id`, `uf_product_id`, `uf_user_id`) VALUES
(1, 49, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`),
  ADD KEY `subject` (`subject_id`,`subject_type`),
  ADD KEY `causer` (`causer_id`,`causer_type`);

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`);

--
-- Chỉ mục cho bảng `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_a_slug_index` (`a_slug`),
  ADD KEY `articles_a_hot_index` (`a_hot`),
  ADD KEY `articles_a_active_index` (`a_active`),
  ADD KEY `articles_a_menu_id_index` (`a_menu_id`);

--
-- Chỉ mục cho bảng `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attributes_atb_name_unique` (`atb_name`),
  ADD KEY `attributes_atb_category_id_index` (`atb_category_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_c_slug_unique` (`c_slug`),
  ADD KEY `categories_c_parent_id_index` (`c_parent_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_cmt_parent_id_index` (`cmt_parent_id`),
  ADD KEY `comments_cmt_product_id_index` (`cmt_product_id`),
  ADD KEY `comments_cmt_admin_id_index` (`cmt_admin_id`),
  ADD KEY `comments_cmt_user_id_index` (`cmt_user_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupon_usages`
--
ALTER TABLE `coupon_usages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `flash_sales`
--
ALTER TABLE `flash_sales`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `flash_sale_products`
--
ALTER TABLE `flash_sale_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `keywords_k_slug_unique` (`k_slug`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_mn_slug_unique` (`mn_slug`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `pay_histories`
--
ALTER TABLE `pay_histories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pay_histories_ph_code_unique` (`ph_code`),
  ADD KEY `index_code_user_id` (`ph_code`,`ph_user_id`),
  ADD KEY `pay_histories_ph_user_id_index` (`ph_user_id`);

--
-- Chỉ mục cho bảng `pay_ins`
--
ALTER TABLE `pay_ins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pay_ins_pi_user_id_index` (`pi_user_id`),
  ADD KEY `pay_ins_pi_admin_id_index` (`pi_admin_id`);

--
-- Chỉ mục cho bảng `pay_outs`
--
ALTER TABLE `pay_outs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pay_outs_po_user_id_index` (`po_user_id`),
  ADD KEY `pay_outs_po_transaction_id_index` (`po_transaction_id`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_pro_slug_unique` (`pro_slug`),
  ADD KEY `products_pro_hot_index` (`pro_hot`),
  ADD KEY `products_pro_active_index` (`pro_active`),
  ADD KEY `products_pro_supplier_id_index` (`pro_supplier_id`);

--
-- Chỉ mục cho bảng `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_attributes_pa_product_id_index` (`pa_product_id`),
  ADD KEY `products_attributes_pa_attribute_id_index` (`pa_attribute_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_slug_unique` (`name_slug`);

--
-- Chỉ mục cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `statics`
--
ALTER TABLE `statics`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_tst_user_id_index` (`tst_user_id`),
  ADD KEY `transactions_tst_admin_id_index` (`tst_admin_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD KEY `users_balance_index` (`balance`);

--
-- Chỉ mục cho bảng `user_favourite`
--
ALTER TABLE `user_favourite`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_favourite_uf_product_id_uf_user_id_unique` (`uf_product_id`,`uf_user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `coupon_usages`
--
ALTER TABLE `coupon_usages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `flash_sales`
--
ALTER TABLE `flash_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `flash_sale_products`
--
ALTER TABLE `flash_sale_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `pay_histories`
--
ALTER TABLE `pay_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `pay_ins`
--
ALTER TABLE `pay_ins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `pay_outs`
--
ALTER TABLE `pay_outs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `statics`
--
ALTER TABLE `statics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user_favourite`
--
ALTER TABLE `user_favourite`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
