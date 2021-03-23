-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2020 at 11:58 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmsvilla`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `token`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'admin@gmail.com', '$2y$10$qRV/5UAVyKe35/Peyt4QY.T/q3PmwDWLDzmRezZR2i44TRQxHMr9u', '', 'user-1.jpg', NULL, '2020-12-12 10:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `blog_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_content_short` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `blog_title`, `blog_slug`, `blog_content`, `blog_content_short`, `blog_photo`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(3, 5, 'Insolens mea at vitae aliquip qui eu', 'insolens-mea-at-vitae-aliquip-qui-eu', '<p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Eam sint reformidans ex, ex doming iracundia his. Sint modus pro ne, vix ut omnis scripta corpora. Sea graecis suavitate te. Eum tantas possim torquatos ei. An qui falli sadipscing suscipiantur. At congue forensibus constituto his, erat vidit veniam vis eu, dico soleat possim nec ei.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Cu modo adipisci sea. At clita doctus sit. Pri ex solet deterruisset, falli harum fuisset qui ei, an commune delicata patrioque sit. Fabulas adversarium no sea, at quis disputando pri, meis epicurei eloquentiam vix ad. An consulatu sententiae posidonium his, te elaboraret cotidieque eos, sed an illud recteque.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Eu per altera aliquam consulatu, ea pro nulla doctus. Sea porro everti an, nostrud ceteros nam no. Ei quando qualisque his, alterum ocurreret nec eu, dolorum deseruisse ad mel. Nam vidit omnis ad, pro eu veniam efficiendi, sea an iriure vivendo appetere. Usu ad latine vocibus voluptatum.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Et bonorum consetetur mediocritatem qui, cu est omnis persequeris, mea te doctus incorrupte. Vix et tale justo. Vel te lorem sapientem interesset. Ne ius tantas saperet officiis, volutpat adolescens ut sea, an animal consectetuer vis. Nonumy ornatus constituam vis ne, cum ne vidisse patrioque.</p>', 'Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.', 'blog-3.png', 'Insolens mea at vitae aliquip qui eu', 'Insolens mea at vitae aliquip qui eu', '2020-11-19 21:01:33', '2020-11-28 00:09:32'),
(5, 6, 'Mutat torquatos nec per adhuc causae', 'mutat-torquatos-nec-per-adhuc-causae', '<p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Eam sint reformidans ex, ex doming iracundia his. Sint modus pro ne, vix ut omnis scripta corpora. Sea graecis suavitate te. Eum tantas possim torquatos ei. An qui falli sadipscing suscipiantur. At congue forensibus constituto his, erat vidit veniam vis eu, dico soleat possim nec ei.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Cu modo adipisci sea. At clita doctus sit. Pri ex solet deterruisset, falli harum fuisset qui ei, an commune delicata patrioque sit. Fabulas adversarium no sea, at quis disputando pri, meis epicurei eloquentiam vix ad. An consulatu sententiae posidonium his, te elaboraret cotidieque eos, sed an illud recteque.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Eu per altera aliquam consulatu, ea pro nulla doctus. Sea porro everti an, nostrud ceteros nam no. Ei quando qualisque his, alterum ocurreret nec eu, dolorum deseruisse ad mel. Nam vidit omnis ad, pro eu veniam efficiendi, sea an iriure vivendo appetere. Usu ad latine vocibus voluptatum.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Et bonorum consetetur mediocritatem qui, cu est omnis persequeris, mea te doctus incorrupte. Vix et tale justo. Vel te lorem sapientem interesset. Ne ius tantas saperet officiis, volutpat adolescens ut sea, an animal consectetuer vis. Nonumy ornatus constituam vis ne, cum ne vidisse patrioque.</p>', 'Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.', 'blog-5.jpeg', 'Mutat torquatos nec per adhuc causae', 'Mutat torquatos nec per adhuc causae', '2020-11-19 21:56:00', '2020-11-28 00:10:54'),
(6, 4, 'Cum at salutandi persecuti pro id virtute', 'cum-at-salutandi-persecuti-pro-id-virtute', '<p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Eam sint reformidans ex, ex doming iracundia his. Sint modus pro ne, vix ut omnis scripta corpora. Sea graecis suavitate te. Eum tantas possim torquatos ei. An qui falli sadipscing suscipiantur. At congue forensibus constituto his, erat vidit veniam vis eu, dico soleat possim nec ei.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Cu modo adipisci sea. At clita doctus sit. Pri ex solet deterruisset, falli harum fuisset qui ei, an commune delicata patrioque sit. Fabulas adversarium no sea, at quis disputando pri, meis epicurei eloquentiam vix ad. An consulatu sententiae posidonium his, te elaboraret cotidieque eos, sed an illud recteque.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Eu per altera aliquam consulatu, ea pro nulla doctus. Sea porro everti an, nostrud ceteros nam no. Ei quando qualisque his, alterum ocurreret nec eu, dolorum deseruisse ad mel. Nam vidit omnis ad, pro eu veniam efficiendi, sea an iriure vivendo appetere. Usu ad latine vocibus voluptatum.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Et bonorum consetetur mediocritatem qui, cu est omnis persequeris, mea te doctus incorrupte. Vix et tale justo. Vel te lorem sapientem interesset. Ne ius tantas saperet officiis, volutpat adolescens ut sea, an animal consectetuer vis. Nonumy ornatus constituam vis ne, cum ne vidisse patrioque.</p>', 'Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.', 'blog-6.jpeg', 'Cum at salutandi persecuti pro id virtute', 'Cum at salutandi persecuti pro id virtute', '2020-11-19 21:57:33', '2020-11-28 00:12:34'),
(7, 3, 'Libris impetus molestiae te eu ius ludus', 'libris-impetus-molestiae-te-eu-ius-ludus', '<p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Eam sint reformidans ex, ex doming iracundia his. Sint modus pro ne, vix ut omnis scripta corpora. Sea graecis suavitate te. Eum tantas possim torquatos ei. An qui falli sadipscing suscipiantur. At congue forensibus constituto his, erat vidit veniam vis eu, dico soleat possim nec ei.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Cu modo adipisci sea. At clita doctus sit. Pri ex solet deterruisset, falli harum fuisset qui ei, an commune delicata patrioque sit. Fabulas adversarium no sea, at quis disputando pri, meis epicurei eloquentiam vix ad. An consulatu sententiae posidonium his, te elaboraret cotidieque eos, sed an illud recteque.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Eu per altera aliquam consulatu, ea pro nulla doctus. Sea porro everti an, nostrud ceteros nam no. Ei quando qualisque his, alterum ocurreret nec eu, dolorum deseruisse ad mel. Nam vidit omnis ad, pro eu veniam efficiendi, sea an iriure vivendo appetere. Usu ad latine vocibus voluptatum.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Et bonorum consetetur mediocritatem qui, cu est omnis persequeris, mea te doctus incorrupte. Vix et tale justo. Vel te lorem sapientem interesset. Ne ius tantas saperet officiis, volutpat adolescens ut sea, an animal consectetuer vis. Nonumy ornatus constituam vis ne, cum ne vidisse patrioque.</p>', 'Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.', 'blog-7.jpeg', 'Libris impetus molestiae te eu ius ludus', 'Libris impetus molestiae te eu ius ludus', '2020-11-28 00:13:12', '2020-11-28 00:13:12'),
(8, 1, 'Eu paulo lucilius adipisci duo eam', 'eu-paulo-lucilius-adipisci-duo-eam', '<p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Eam sint reformidans ex, ex doming iracundia his. Sint modus pro ne, vix ut omnis scripta corpora. Sea graecis suavitate te. Eum tantas possim torquatos ei. An qui falli sadipscing suscipiantur. At congue forensibus constituto his, erat vidit veniam vis eu, dico soleat possim nec ei.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Cu modo adipisci sea. At clita doctus sit. Pri ex solet deterruisset, falli harum fuisset qui ei, an commune delicata patrioque sit. Fabulas adversarium no sea, at quis disputando pri, meis epicurei eloquentiam vix ad. An consulatu sententiae posidonium his, te elaboraret cotidieque eos, sed an illud recteque.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Eu per altera aliquam consulatu, ea pro nulla doctus. Sea porro everti an, nostrud ceteros nam no. Ei quando qualisque his, alterum ocurreret nec eu, dolorum deseruisse ad mel. Nam vidit omnis ad, pro eu veniam efficiendi, sea an iriure vivendo appetere. Usu ad latine vocibus voluptatum.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Et bonorum consetetur mediocritatem qui, cu est omnis persequeris, mea te doctus incorrupte. Vix et tale justo. Vel te lorem sapientem interesset. Ne ius tantas saperet officiis, volutpat adolescens ut sea, an animal consectetuer vis. Nonumy ornatus constituam vis ne, cum ne vidisse patrioque.</p>', 'Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.', 'blog-8.jpeg', 'Eu paulo lucilius adipisci duo eam', 'Eu paulo lucilius adipisci duo eam', '2020-11-28 00:13:49', '2020-11-28 00:13:49'),
(9, 1, 'Debitis consequuntur sea eu ex agam', 'debitis-consequuntur-sea-eu-ex-agam', '<p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Eam sint reformidans ex, ex doming iracundia his. Sint modus pro ne, vix ut omnis scripta corpora. Sea graecis suavitate te. Eum tantas possim torquatos ei. An qui falli sadipscing suscipiantur. At congue forensibus constituto his, erat vidit veniam vis eu, dico soleat possim nec ei.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Cu modo adipisci sea. At clita doctus sit. Pri ex solet deterruisset, falli harum fuisset qui ei, an commune delicata patrioque sit. Fabulas adversarium no sea, at quis disputando pri, meis epicurei eloquentiam vix ad. An consulatu sententiae posidonium his, te elaboraret cotidieque eos, sed an illud recteque.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Eu per altera aliquam consulatu, ea pro nulla doctus. Sea porro everti an, nostrud ceteros nam no. Ei quando qualisque his, alterum ocurreret nec eu, dolorum deseruisse ad mel. Nam vidit omnis ad, pro eu veniam efficiendi, sea an iriure vivendo appetere. Usu ad latine vocibus voluptatum.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Sen, sans-serif; font-size: 16px;\">Et bonorum consetetur mediocritatem qui, cu est omnis persequeris, mea te doctus incorrupte. Vix et tale justo. Vel te lorem sapientem interesset. Ne ius tantas saperet officiis, volutpat adolescens ut sea, an animal consectetuer vis. Nonumy ornatus constituam vis ne, cum ne vidisse patrioque.</p>', 'Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.', 'blog-9.jpeg', 'Debitis consequuntur sea eu ex agam', 'Debitis consequuntur sea eu ex agam', '2020-11-28 00:14:30', '2020-11-28 00:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Commercial', 'commercial', 'Commercial', 'Commercial', '2020-11-19 10:00:01', '2020-11-28 00:07:18'),
(3, 'Residential', 'residential', 'Residential', 'Residential', '2020-11-19 21:54:59', '2020-11-28 00:07:14'),
(4, 'Economical', 'economical', 'Economical', 'Economical', '2020-11-28 00:07:59', '2020-11-28 00:07:59'),
(5, 'Business Idea', 'business-idea', 'Business Idea', 'Business Idea', '2020-11-28 00:08:08', '2020-11-28 00:08:08'),
(6, 'Popular Tools', 'popular-tools', 'Popular Tools', 'Popular Tools', '2020-11-28 00:08:16', '2020-11-28 00:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` int(11) NOT NULL,
  `person_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `blog_id`, `person_name`, `person_email`, `person_message`, `comment_status`, `created_at`, `updated_at`) VALUES
(4, 3, 'Sabbir Ahmed', 'sabbirahmed@gmail.com', 'This is a very nice website. I love it so much. I want to make a website like this. When can you talk to me? Please give me a time.', 'Pending', '2020-11-28 06:46:13', '2020-11-28 06:46:13'),
(5, 3, 'Patrick Henderson', 'patrickhenderson@gmail.com', 'Hi admin, very nice post and very helpful.', 'Approved', '2020-11-28 06:48:02', '2020-11-28 06:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_maximum_use` smallint(6) NOT NULL,
  `coupon_existing_use` smallint(6) NOT NULL,
  `coupon_start_date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_end_date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `coupon_type`, `coupon_discount`, `coupon_maximum_use`, `coupon_existing_use`, `coupon_start_date`, `coupon_end_date`, `coupon_status`, `created_at`, `updated_at`) VALUES
(2, 'NICE', 'Percentage', '5', 20, 0, '2020-04-09', '2020-12-25', 'Show', '2020-12-03 02:43:49', '2020-12-03 02:43:49'),
(3, 'STRONG', 'Amount', '15', 14, 0, '2020-04-09', '2020-12-25', 'Show', '2020-12-03 02:44:18', '2020-12-03 02:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_email`, `customer_phone`, `customer_country`, `customer_address`, `customer_state`, `customer_city`, `customer_zip`, `customer_password`, `customer_token`, `customer_status`, `created_at`, `updated_at`) VALUES
(1, 'Thomas C. Bell', 'customer@gmail.com', '409-671-5285', 'USA', '1178 Burwell Heights Road Sugar Land, TX 77478', 'TX', 'Sugar Land', '77478', '$2y$10$l1DLkKjcoDxU23EkAK5K4e6fnSWWkWlnaxxObBpxHYzE0glMAIwmy', '', 'Active', '2020-12-04 20:14:31', '2020-12-06 10:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `dynamic_pages`
--

CREATE TABLE `dynamic_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dynamic_page_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dynamic_page_slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dynamic_page_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dynamic_page_banner` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dynamic_pages`
--

INSERT INTO `dynamic_pages` (`id`, `dynamic_page_name`, `dynamic_page_slug`, `dynamic_page_content`, `dynamic_page_banner`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(6, 'Dynamic Page 1', 'dynamic-page-1', '<p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 16px;\">Lorem ipsum dolor sit amet, id saperet suavitate signiferumque sea. Eu tantas invenire signiferumque per, at affert eloquentiam eos, duo no sale utroque. His ad homero verterem, ut paulo neglegentur contentiones per. Ex cum unum vocent commodo. Ut ridens principes rationibus ius, ex mea saepe docendi, cu eum unum assum accumsan.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 16px;\">Ne quo possim consectetuer, splendide voluptatibus ut mea. Summo mucius regione qui et, sea soleat everti indoctum no. Brute postea ut vel, oblique propriae pertinacia et sed. No nominati adipiscing nam, accusata interpretaris no est, no tota conceptam nam. Id posidonium dissentiunt mea, an nibh menandri eum. Meis nominati cum cu.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 16px;\">Eum ad delicatissimi signiferumque, mea causae delenit perfecto et. Sit primis nostrum id, an postea numquam per, id quo diceret deleniti consectetuer. Eum eu salutatus mediocritatem. Blandit ocurreret dissentiet ne quo, ex mazim numquam delenit his.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 16px;\">Ea mel elit placerat. Ius nobis delicata gloriatur at. Nam fabulas salutandi at, in per officiis omittantur contentiones, omnes insolens suscipiantur sed cu. Ei modus persequeris vix. Persius legimus has an, mea dicit maiestatis adipiscing eu.</p>', 'dynamic-page-banner-6.jpeg', 'Dynamic Page 1', 'Dynamic Page 1', '2020-11-22 04:57:46', '2020-12-10 00:58:23'),
(7, 'Dynamic Page 2', 'dynamic-page-2', '<p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 16px;\">Lorem ipsum dolor sit amet, id saperet suavitate signiferumque sea. Eu tantas invenire signiferumque per, at affert eloquentiam eos, duo no sale utroque. His ad homero verterem, ut paulo neglegentur contentiones per. Ex cum unum vocent commodo. Ut ridens principes rationibus ius, ex mea saepe docendi, cu eum unum assum accumsan.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 16px;\">Ne quo possim consectetuer, splendide voluptatibus ut mea. Summo mucius regione qui et, sea soleat everti indoctum no. Brute postea ut vel, oblique propriae pertinacia et sed. No nominati adipiscing nam, accusata interpretaris no est, no tota conceptam nam. Id posidonium dissentiunt mea, an nibh menandri eum. Meis nominati cum cu.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 16px;\">Eum ad delicatissimi signiferumque, mea causae delenit perfecto et. Sit primis nostrum id, an postea numquam per, id quo diceret deleniti consectetuer. Eum eu salutatus mediocritatem. Blandit ocurreret dissentiet ne quo, ex mazim numquam delenit his.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-size: 16px;\">Ea mel elit placerat. Ius nobis delicata gloriatur at. Nam fabulas salutandi at, in per officiis omittantur contentiones, omnes insolens suscipiantur sed cu. Ei modus persequeris vix. Persius legimus has an, mea dicit maiestatis adipiscing eu.</p>', 'dynamic-page-banner-7.jpeg', 'Dynamic Page 2', 'Dynamic Page 2', '2020-11-22 04:57:58', '2020-12-10 00:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `et_subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `et_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `et_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `et_subject`, `et_content`, `et_name`, `created_at`, `updated_at`) VALUES
(1, 'Contact Form - your website', '<p>You have received a message from a visitor. Detailed information is here:</p><p>Visitor Name: [[visitor_name]]</p><p>Visitor Email: [[visitor_email]]</p><p>Visitor Phone: [[visitor_phone]]</p><p>Visitor Message:&nbsp;</p><p>[[visitor_message]]</p>', 'Contact Page Message', NULL, '2020-11-24 11:15:19'),
(2, 'New Comment Posted', '<p>You have received a new comment from a person. His detail is here:</p><p><strong>Person Name:</strong>&nbsp;[[person_name]]</p><p><strong>Person Email:&nbsp;</strong>[[person_email]]</p><p><strong>Person Message:</strong></p><p>[[person_message]]</p><p>Go to this link to see this comment<span style=\"font-weight: bolder;\">:&nbsp;</span><a href=\"[[comment_see_url]]\" target=\"_blank\">See Comment</a></p>', 'Comment Message to Admin', NULL, '2020-11-28 04:51:16'),
(3, 'Verify Subscription', '<p>Dear Sir,</p><p>You have requested to be a subscriber in our website. Please click on the following link to confirm the subscription:</p><p><a href=\"[[verification_link]]\" target=\"_blank\">Verification Link</a></p><p>Thank you so much!<br>Marketing Team</p>', 'Subscriber Message for Verification', NULL, '2020-12-09 18:51:13'),
(4, 'A News has been added', '<p>Dear Subscriber,</p><p>A news has been published. To see the news, please go to the following link:</p><p><a href=\"[[post_link]]\" target=\"_blank\">Click here to see the post</a></p><p>Thank you!</p>', 'News Post Message to Active Subscribers', NULL, '2020-12-09 22:26:04'),
(5, 'Reset Password', '<p>To reset your password, please click on the following link:</p><p><a href=\"[[reset_link]]\" target=\"_blank\">Reset Password</a><br></p>', 'Reset Password Message to Admin', NULL, '2020-11-27 19:20:59'),
(6, 'Confirm Registration', '<p>To activate your account and confirm the registration, please click on the verify link below:</p><p><a href=\"[[verification_link]]\" target=\"_blank\">Verification Link</a></p>', 'Registration Email to Customer', NULL, '2020-12-03 10:38:57'),
(7, 'Reset Password', '<p>To reset your password, please click on the following link:</p><p><a href=\"[[reset_link]]\" target=\"_blank\">Reset Password Link</a></p>', 'Reset Password Message to Customer', NULL, '2020-12-05 03:30:14'),
(8, 'Order Completed', '<p>Dear [[customer_name]],</p><p>Your order has been submitted successfully and we received the payment from you. After you process and ship the order, you will get all the products after a certain time period.&nbsp;</p><p><b>Payment Information:</b></p><p>Order Number: [[order_number]]</p><p>[[payment_method]]</p><p>Payment Date &amp; Time: [[payment_date_time]]</p><p>Transaction Id: [[transaction_id]]</p><p>Shipping Cost: [[shipping_cost]]</p><p>Coupon Code: [[coupon_code]]</p><p>Coupon Discount: [[coupon_discount]]</p><p>Paid Amount: [[paid_amount]]</p><p>Payment Status: [[payment_status]]</p><p>----------------------------------------</p><p><b>Your billing details:</b></p><p>Billing Name: [[billing_name]]</p><p>Billing Email: [[billing_email]]</p><p>Billing Phone: [[billing_phone]]</p><p>Billing Country: [[billing_country]]</p><p>Billing Address: [[billing_address]]</p><p>Billing State: [[billing_state]]</p><p>Billing City: [[billing_city]]</p><p>Billing Zip: [[billing_zip]]</p><p>----------------------------------------</p><p><b>Your shipping details:</b></p><p>Shipping Name: [[shipping_name]]</p><p>Shipping Email: [[shipping_email]]</p><p>Shipping Phone: [[shipping_phone]]</p><p>Shipping Country: [[shipping_country]]</p><p>Shipping Address: [[shipping_address]]</p><p>Shipping State: [[shipping_state]]</p><p>Shipping City: [[shipping_city]]</p><p>Shipping Zip: [[shipping_zip]]</p><p>----------------------------------------</p><p><b>Products You Purchased:&nbsp;</b></p><p>[[product_detail]]</p><p>Thank you! The ABC Team</p>', 'Order Completed Email to Customer', NULL, '2020-12-08 22:11:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faq_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_order` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `faq_title`, `faq_content`, `faq_order`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet, eu vim elitr clita?', '<p>Lorem ipsum dolor sit amet, eu vim elitr clita, quot putent feugait cu per. Tamquam voluptua persequeris ad cum, at his cibo scaevola. Cibo justo equidem cu nam. An meliore admodum vis, quot aliquip bonorum ei quo. Mea nemore feugiat verterem cu, modus vulputate mea id.<br></p>', 3, '2020-11-23 11:09:14', '2020-11-28 23:12:53'),
(2, 'Est facilis recteque et, etiam aliquip?', '<p>Lorem ipsum dolor sit amet, eu vim elitr clita, quot putent feugait cu per. Tamquam voluptua persequeris ad cum, at his cibo scaevola. Cibo justo equidem cu nam. An meliore admodum vis, quot aliquip bonorum ei quo. Mea nemore feugiat verterem cu, modus vulputate mea id.<br></p>', 2, '2020-11-23 11:09:31', '2020-11-23 11:09:31'),
(3, 'Cetero mnesarchum id vis, id sea?', '<p>Lorem ipsum dolor sit amet, eu vim elitr clita, quot putent feugait cu per. Tamquam voluptua persequeris ad cum, at his cibo scaevola. Cibo justo equidem cu nam. An meliore admodum vis, quot aliquip bonorum ei quo. Mea nemore feugiat verterem cu, modus vulputate mea id.<br></p>', 1, '2020-11-23 11:09:45', '2020-11-28 23:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `footer_columns`
--

CREATE TABLE `footer_columns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `column_item_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_item_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_item_order` int(11) NOT NULL DEFAULT 0,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_columns`
--

INSERT INTO `footer_columns` (`id`, `column_item_text`, `column_item_url`, `column_item_order`, `column_name`, `created_at`, `updated_at`) VALUES
(1, 'Link Name 1', '#', 1, 'Column 1', '2020-12-10 23:29:18', '2020-12-10 23:49:14'),
(2, 'Link Name 2', '#', 2, 'Column 1', '2020-12-10 23:30:09', '2020-12-10 23:30:09'),
(3, 'Link Name 3', '#', 3, 'Column 1', '2020-12-10 23:30:17', '2020-12-10 23:30:17'),
(4, 'Link Name 1', '#', 1, 'Column 2', '2020-12-10 23:30:35', '2020-12-10 23:30:35'),
(5, 'Link Name 2', '#', 2, 'Column 2', '2020-12-10 23:30:44', '2020-12-10 23:46:15'),
(6, 'Link Name 3', '#', 3, 'Column 2', '2020-12-10 23:30:53', '2020-12-10 23:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_bg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `top_bar_email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_bar_phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_bar_social_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `top_bar_login_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `top_bar_registration_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `top_bar_cart_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sidebar_total_recent_post` tinyint(4) NOT NULL,
  `theme_color` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_column1_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_column2_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_column3_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_column4_heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_copyright` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `preloader_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `preloader_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sticky_header_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_analytic_tracking_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_analytic_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tawk_live_chat_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tawk_live_chat_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cookie_consent_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_recaptcha_site_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_recaptcha_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_service` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_service_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_blog` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_blog_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_project` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_project_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_team_member` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_team_member_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_photo_gallery` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_video_gallery` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_faq` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_product` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_product_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_contact` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_search` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_cart` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_checkout` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_login` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_registration` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_forget_password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_customer_panel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_career` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_job` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_job_application` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_term` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_privacy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `logo`, `favicon`, `login_bg`, `top_bar_email`, `top_bar_phone`, `top_bar_social_status`, `top_bar_login_status`, `top_bar_registration_status`, `top_bar_cart_status`, `sidebar_total_recent_post`, `theme_color`, `footer_column1_heading`, `footer_column2_heading`, `footer_column3_heading`, `footer_column4_heading`, `footer_address`, `footer_email`, `footer_phone`, `footer_copyright`, `preloader_photo`, `preloader_status`, `sticky_header_status`, `google_analytic_tracking_id`, `google_analytic_status`, `tawk_live_chat_code`, `tawk_live_chat_status`, `cookie_consent_status`, `google_recaptcha_site_key`, `google_recaptcha_status`, `banner_about`, `banner_service`, `banner_service_detail`, `banner_blog`, `banner_blog_detail`, `banner_category`, `banner_project`, `banner_project_detail`, `banner_team_member`, `banner_team_member_detail`, `banner_photo_gallery`, `banner_video_gallery`, `banner_faq`, `banner_product`, `banner_product_detail`, `banner_contact`, `banner_search`, `banner_cart`, `banner_checkout`, `banner_login`, `banner_registration`, `banner_forget_password`, `banner_customer_panel`, `banner_career`, `banner_job`, `banner_job_application`, `banner_term`, `banner_privacy`, `created_at`, `updated_at`) VALUES
(1, 'logo.png', 'favicon.png', 'login_bg.jpg', 'info@yourwebsite.com', '111-222-3456', 'Show', 'Show', 'Show', 'Show', 5, '3867D6', 'Important Links', 'Useful Links', 'Contact Information', 'Social Media', '1582 Progress, Mora, MN, 55051', 'contact@yourwebsite.com', '320-225-5131', 'Copyright 2021. Your Company Name. All Rights Reserved.', 'preloader.gif', 'Hide', 'Show', 'UA-84213520-6', 'Show', '<script type=\"text/javascript\">\r\n    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n    (function(){\r\n        var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\r\n        s1.async=true;\r\n        s1.src=\'https://embed.tawk.to/5a7c31ded7591465c7077c48/default\';\r\n        s1.charset=\'UTF-8\';\r\n        s1.setAttribute(\'crossorigin\',\'*\');\r\n        s0.parentNode.insertBefore(s1,s0);\r\n    })();\r\n</script>', 'Show', 'Show', '6LfzGuEZAAAAADZrHN3QDdPLYfS3I6BaKmjWjryh', 'Show', 'banner_about.jpeg', 'banner_service.jpeg', 'banner_service_detail.jpeg', 'banner_blog.jpeg', 'banner_blog_detail.jpeg', 'banner_category.jpeg', 'banner_project.jpeg', 'banner_project_detail.jpeg', 'banner_team_member.jpeg', 'banner_team_member_detail.jpeg', 'banner_photo_gallery.jpeg', 'banner_video_gallery.jpeg', 'banner_faq.jpeg', 'banner_product.jpeg', 'banner_product_detail.jpeg', 'banner_contact.jpeg', 'banner_search.jpeg', 'banner_cart.jpeg', 'banner_checkout.jpeg', 'banner_login.jpeg', 'banner_registration.jpeg', 'banner_forget_password.jpeg', 'banner_customer_panel.jpeg', 'banner_career.jpeg', 'banner_job.jpeg', 'banner_job_application.jpeg', 'banner_term.jpeg', 'banner_privacy.jpeg', NULL, '2020-12-23 04:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_description_short` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_responsibility` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_education` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_experience` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_additional_requirement` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_benefit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_deadline` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_vacancy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_company_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_salary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_order` int(11) NOT NULL DEFAULT 0,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_title`, `job_slug`, `job_description_short`, `job_responsibility`, `job_education`, `job_experience`, `job_additional_requirement`, `job_benefit`, `job_deadline`, `job_vacancy`, `job_company_name`, `job_location`, `job_type`, `job_salary`, `job_order`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Software Engineer (SQL & BI Reporting)', 'software-engineer-sql-bi-reporting', 'We are looking for a Software Engineer (SQL & BI Reporting) in our company.', '<ul><li>Perform database programming for new and existing systems.</li><li>Write scripts, stored procedures, and functions for database systems with SQL Server 2008 and above.</li><li>Build and maintain reports with Crystal Reports/ Windward.</li><li>Troubleshoot database problems, queries, and errors in an accurate and timely manner</li><li>Maintain accurate and complete database programming documentation</li></ul>', '<ul><li>Bachelor in Engineering (BEngg)</li><li>B.Sc in Computer Science/ Engineering from any Reputed University.</li><li>Skills Required: MS SQL Server ,Oracle Database,Oracle PLSQL,TSQL</li></ul>', '<ul><li>At least 1 year(s)</li><li>Freshers are also encouraged to apply.</li></ul>', '<ul><li>Age 25 to 45 years</li><li>Female candidates are encouraged to apply</li><li>Self-starter who is able to take the initiative with minimal supervision</li><li>Ability to work under pressure and meet the deadline</li><li>Strong problem-solving skills</li><li>Strong communication skills - technical and non-technical</li><li>C#, ASP.Net MVC/Web API development knowledge will be a plus point.</li></ul>', '<ul><li>Medical allowance, Performance bonus, Provident fund, Gratuity, Weekly 2 holidays</li><li>Lunch Facilities: Full Subsidize</li><li>Salary Review: Yearly</li><li>Festival Bonus: 2</li></ul>', '2020/11/30', '02', 'ABC Software Limited', 'New York, USA', 'Full Time', 'Negotiable', 1, 'Software Engineer (SQL & BI Reporting)', 'Software Engineer (SQL & BI Reporting)', '2020-11-29 08:36:19', '2020-11-29 09:01:15'),
(2, 'PHP/Web Developer', 'phpweb-developer', 'This role will be focused on an integration project involving Marekto and Salesforce with additional work on our eCommerce platform.', '<ul><li>Perform database programming for new and existing systems.</li><li>Write scripts, stored procedures and functions for database system with SQL Server 2008 and above.</li><li>Build and maintain reports with Crystal Reports/ Windward.</li><li>Troubleshoot database problems, queries and errors in accurate and timely manner</li><li>Maintain accurate and complete database programming documentation</li></ul>', '<ul><li>Bachelor in Engineering (BEngg)</li><li>B.Sc in Computer Science/ Engineering from any Reputed University.</li><li>Skills Required: MS SQL Server ,Oracle Database,Oracle PLSQL,TSQL</li></ul>', '<ul><li>At least 1 year(s)</li><li>Freshers are also encouraged to apply.</li></ul>', '<ul><li>Age 25 to 45 years</li><li>Female candidates are encouraged to apply</li><li>Self-starter who is able to take the initiative with minimal supervision</li><li>Ability to work under pressure and meet the deadline</li><li>Strong problem solving skills</li><li>Strong communication skills - technical and non-technical</li><li>C#, ASP.Net MVC/Web Api development knowledge will be a plus point.</li></ul>', '<ul><li>Medical allowance, Performance bonus, Provident fund, Gratuity, Weekly 2 holidays</li><li>Lunch Facilities: Full Subsidize</li><li>Salary Review: Yearly</li><li>Festival Bonus: 2</li></ul>', '2020-07-23', '01', 'XYZ Software Limited', 'New York, USA', 'Full Time', 'Negotiable', 2, 'PHP/Web Developer', 'PHP/Web Developer', '2020-11-29 09:03:51', '2020-11-29 09:03:51'),
(3, 'Senior PHP Developer', 'senior-php-developer', 'Resume-Library is the fastest-growing job board in the U.S. market. We help thousands of expanding companies source the best candidates available. Our established tech team has worked hard to achieve a reputation for innovation, flexibility and usability, but we want more.', '<ul><li>Perform database programming for new and existing systems.</li><li>Write scripts, stored procedures and functions for database system with SQL Server 2008 and above.</li><li>Build and maintain reports with Crystal Reports/ Windward.</li><li>Troubleshoot database problems, queries and errors in accurate and timely manner</li><li>Maintain accurate and complete database programming documentation</li></ul>', '<ul><li>Bachelor in Engineering (BEngg)</li><li>B.Sc in Computer Science/ Engineering from any Reputed University.</li><li>Skills Required: MS SQL Server ,Oracle Database,Oracle PLSQL,TSQL</li></ul>', '<ul><li>At least 1 year(s)</li><li>Freshers are also encouraged to apply.</li></ul>', '<ul><li>Age 25 to 45 years</li><li>Female candidates are encouraged to apply</li><li>Self-starter who is able to take the initiative with minimal supervision</li><li>Ability to work under pressure and meet the deadline</li><li>Strong problem solving skills</li><li>Strong communication skills - technical and non-technical</li><li>C#, ASP.Net MVC/Web Api development knowledge will be a plus point.</li></ul>', '<ul><li>Medical allowance, Performance bonus, Provident fund, Gratuity, Weekly 2 holidays</li><li>Lunch Facilities: Full Subsidize</li><li>Salary Review: Yearly</li><li>Festival Bonus: 2</li></ul>', '2028-07-19', '01', 'MM Software Limited', 'New York, USA', 'Full Time', 'Negotiable', 3, 'Senior PHP Developer', 'Senior PHP Developer', '2020-11-29 09:06:01', '2020-11-29 09:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `applicant_first_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_last_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_country` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_state` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_street` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_zip_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_expected_salary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_cover_letter` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_cv` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `menu_status`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'Show', NULL, NULL),
(2, 'About', 'Show', NULL, NULL),
(3, 'Services', 'Show', NULL, NULL),
(4, 'Shop', 'Show', NULL, NULL),
(5, 'Blog', 'Show', NULL, NULL),
(6, 'Project', 'Show', NULL, NULL),
(7, 'FAQ', 'Show', NULL, NULL),
(8, 'Team Members', 'Show', NULL, NULL),
(9, 'Contact', 'Show', NULL, NULL),
(10, 'Career', 'Show', NULL, NULL),
(11, 'Photo Gallery', 'Show', NULL, NULL),
(12, 'Video Gallery', 'Show', NULL, NULL),
(13, 'Terms and Conditions', 'Show', NULL, NULL),
(14, 'Privacy Policy', 'Show', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_05_052517_create_admins_table', 1),
(5, '2020_11_18_041627_create_categories_table', 1),
(6, '2020_11_18_041747_create_blogs_table', 1),
(7, '2020_11_20_040327_create_sliders_table', 2),
(8, '2020_11_20_052802_create_general_settings_table', 3),
(11, '2020_11_20_161634_create_page_about_items_table', 4),
(12, '2020_11_21_020753_create_page_service_items_table', 4),
(13, '2020_11_21_045826_create_page_shop_items_table', 5),
(14, '2020_11_21_052123_create_page_blog_items_table', 5),
(15, '2020_11_21_052218_create_page_project_items_table', 5),
(16, '2020_11_21_052236_create_page_photo_gallery_items_table', 5),
(17, '2020_11_21_052252_create_page_video_gallery_items_table', 5),
(18, '2020_11_21_052416_create_page_faq_items_table', 5),
(19, '2020_11_21_052431_create_page_team_items_table', 5),
(20, '2020_11_21_052449_create_page_contact_items_table', 5),
(21, '2020_11_21_052506_create_page_career_items_table', 5),
(22, '2020_11_21_052522_create_page_term_items_table', 5),
(23, '2020_11_21_052537_create_page_privacy_items_table', 5),
(24, '2020_11_21_121719_create_page_home_items_table', 6),
(25, '2020_11_22_034318_create_page_other_items_table', 7),
(27, '2020_11_22_051017_create_dynamic_pages_table', 8),
(28, '2020_11_22_155040_create_projects_table', 9),
(29, '2020_11_22_155955_create_project_photos_table', 10),
(30, '2020_11_23_020609_create_photos_table', 11),
(31, '2020_11_23_023020_create_videos_table', 12),
(32, '2020_11_23_033108_create_why_choose_items_table', 13),
(34, '2020_11_23_052309_create_services_table', 14),
(35, '2020_11_23_065919_create_testimonials_table', 15),
(36, '2020_11_23_145620_create_team_members_table', 16),
(37, '2020_11_23_170012_create_faqs_table', 17),
(38, '2020_11_24_155819_create_email_templates_table', 18),
(39, '2020_11_25_003858_create_social_media_items_table', 19),
(40, '2020_11_25_014512_create_subscribers_table', 20),
(41, '2020_11_28_085244_create_comments_table', 21),
(42, '2020_11_29_130743_create_jobs_table', 22),
(43, '2020_11_29_131227_create_job_applications_table', 23),
(44, '2020_11_30_012218_create_coupons_table', 24),
(45, '2020_11_30_022238_create_shippings_table', 25),
(46, '2020_11_30_033142_create_products_table', 26),
(48, '2020_12_03_124013_create_customers_table', 27),
(49, '2020_12_06_054145_create_orders_table', 28),
(50, '2020_12_06_055114_create_order_details_table', 29),
(51, '2020_12_11_042247_create_footer_columns_table', 30),
(54, '2020_12_12_070218_create_menus_table', 32);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_country` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_state` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_zip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_country` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_state` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_zip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txnid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_cost` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_discount` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee_amount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `net_amount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_last4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_exp_month` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_exp_year` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `customer_name`, `customer_email`, `customer_type`, `billing_name`, `billing_email`, `billing_phone`, `billing_country`, `billing_address`, `billing_state`, `billing_city`, `billing_zip`, `shipping_name`, `shipping_email`, `shipping_phone`, `shipping_country`, `shipping_address`, `shipping_state`, `shipping_city`, `shipping_zip`, `order_note`, `txnid`, `shipping_cost`, `coupon_code`, `coupon_discount`, `paid_amount`, `fee_amount`, `net_amount`, `card_last4`, `card_exp_month`, `card_exp_year`, `payment_method`, `payment_status`, `order_no`, `created_at`, `updated_at`) VALUES
(1, 1, 'Patrick Henderson', 'demosly99@gmail.com', 'Returning Customer', 'Patrick Henderson', 'demosly99@gmail.com', '111-222-3333', 'Bangladesh', 'Aronghata', 'N/A', 'Khulna', '9100', 'Patrick Henderson', 'demosly99@gmail.com', '111-222-3333', 'Bangladesh', 'Aronghata', 'N/A', 'Khulna', '9100', NULL, 'txn_1HwIv6BoKopKik6A9XlVaFtu', '10', 'STRONG', '15', '54', '1.87', '52.13', '4242', '10', '2023', 'Stripe', 'Completed', '5fd03ddfe6a6e', '2020-12-08 21:00:47', NULL),
(2, 0, 'Samuel Green', 'samuel110@gmail.com', 'Guest', 'Samuel Green', 'samuel110@gmail.com', '111-222-3333', 'UK', '23 Street Road', 'KH', 'London', '12988', 'Samuel Green', 'samuel110@gmail.com', '111-222-3333', 'UK', '23 Street Road', 'KH', 'London', '12988', NULL, 'txn_1HwIxrBoKopKik6ANb6LxXtW', '0', '', '0', '319', '9.55', '309.45', '0005', '10', '2022', 'Stripe', 'Completed', '5fd03e8b39813', '2020-12-08 21:03:39', NULL),
(3, 1, 'Patrick Henderson', 'demosly99@gmail.com', 'Returning Customer', 'Patrick Henderson', 'demosly99@gmail.com', '111-222-3333', 'Bangladesh', 'Aronghata', 'N/A', 'Khulna', '9100', 'Patrick Henderson', 'demosly99@gmail.com', '111-222-3333', 'Bangladesh', 'Aronghata', 'N/A', 'Khulna', '9100', NULL, 'PAYID-L7ID6BI7Y50796990454002S', '0', '', '0', '60.00', '2.04', '57.96', '', '', '', 'PayPal', 'Completed', '5fd03f2265fa0', '2020-12-08 21:06:10', NULL),
(4, 0, 'Brent Grundy', 'brent9238@gmail.com', 'Guest', 'Brent Grundy', 'brent9238@gmail.com', '111-222-3874', 'Australia', '78 Grer Road', 'KL', 'New South Wales', '96271', 'Brent Grundy', 'brent9238@gmail.com', '111-222-3874', 'Australia', '78 Grer Road', 'KL', 'New South Wales', '96271', NULL, 'PAYID-L7ID7XI1V967346VW784225Y', '0', '', '0', '60.00', '2.04', '57.96', '', '', '', 'PayPal', 'Completed', '5fd03ff532966', '2020-12-08 21:09:41', NULL),
(5, 1, 'Patrick Henderson', 'demosly99@gmail.com', 'Returning Customer', 'Patrick Henderson', 'demosly99@gmail.com', '111-222-3333', 'Bangladesh', 'Aronghata', 'N/A', 'Khulna', '9100', 'Patrick Henderson', 'demosly99@gmail.com', '111-222-3333', 'Bangladesh', 'Aronghata', 'N/A', 'Khulna', '9100', NULL, 'txn_1HwJqlBoKopKik6AHODswFTL', '0', '', '0', '40', '1.46', '38.54', '4242', '10', '2024', 'Stripe', 'Completed', '5fd04bd7c5de0', '2020-12-08 22:00:23', NULL),
(7, 1, 'Thomas C. Bell', 'customer@gmail.com', 'Returning Customer', 'Thomas C. Bell', 'customer@gmail.com', '409-671-5285', 'USA', '1178 Burwell Heights Road Sugar Land, TX 77478', 'TX', 'Sugar Land', '77478', 'Thomas C. Bell', 'customer@gmail.com', '409-671-5285', 'USA', '1178 Burwell Heights Road Sugar Land, TX 77478', 'TX', 'Sugar Land', '77478', NULL, 'txn_1I1TnpBoKopKik6ATEJIiBNv', '0', '', '0', '39', '1.43', '37.57', '4242', '2', '2022', 'Stripe', 'Completed', '5fe31023e30a4', '2020-12-23 03:38:43', NULL),
(8, 1, 'Thomas C. Bell', 'customer@gmail.com', 'Returning Customer', 'Thomas C. Bell', 'customer@gmail.com', '409-671-5285', 'USA', '1178 Burwell Heights Road Sugar Land, TX 77478', 'TX', 'Sugar Land', '77478', 'Thomas C. Bell', 'customer@gmail.com', '409-671-5285', 'USA', '1178 Burwell Heights Road Sugar Land, TX 77478', 'TX', 'Sugar Land', '77478', NULL, 'PAYID-L7RRBOA1BD69183NN6084606', '0', '', '0', '30.00', '1.17', '28.83', '', '', '', 'PayPal', 'Completed', '5fe310cf6d80d', '2020-12-23 03:41:35', NULL),
(9, 1, 'Thomas C. Bell', 'customer@gmail.com', 'Returning Customer', 'Thomas C. Bell', 'customer@gmail.com', '409-671-5285', 'USA', '1178 Burwell Heights Road Sugar Land, TX 77478', 'TX', 'Sugar Land', '77478', 'Thomas C. Bell', 'customer@gmail.com', '409-671-5285', 'USA', '1178 Burwell Heights Road Sugar Land, TX 77478', 'TX', 'Sugar Land', '77478', NULL, 'PAYID-L7RRBOA1BD69183NN6084606', '0', '', '0', '30.00', '1.17', '28.83', '', '', '', 'PayPal', 'Completed', '5fe3119be7bb9', '2020-12-23 03:44:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_qty`, `payment_status`, `order_no`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Product Item Name 3', '5', '3', 'Completed', '5fd03ddfe6a6e', '2020-12-08 21:00:48', NULL),
(2, 1, 5, 'Product Item Name 4', '22', '2', 'Completed', '5fd03ddfe6a6e', '2020-12-08 21:00:48', NULL),
(3, 2, 6, 'Product Item Name 5', '299', '1', 'Completed', '5fd03e8b39813', '2020-12-08 21:03:39', NULL),
(4, 2, 7, 'Product Item Name 6', '20', '1', 'Completed', '5fd03e8b39813', '2020-12-08 21:03:39', NULL),
(5, 3, 8, 'Product Item Name 7', '45', '1', 'Completed', '5fd03f2265fa0', '2020-12-08 21:06:10', NULL),
(6, 3, 9, 'Product Item Name 8', '15', '1', 'Completed', '5fd03f2265fa0', '2020-12-08 21:06:10', NULL),
(7, 4, 8, 'Product Item Name 7', '45', '1', 'Completed', '5fd03ff532966', '2020-12-08 21:09:41', NULL),
(8, 4, 9, 'Product Item Name 8', '15', '1', 'Completed', '5fd03ff532966', '2020-12-08 21:09:41', NULL),
(9, 5, 7, 'Product Item Name 6', '20', '2', 'Completed', '5fd04bd7c5de0', '2020-12-08 22:00:23', NULL),
(11, 7, 1, 'Product Item Name 1', '39', '1', 'Completed', '5fe31023e30a4', '2020-12-23 03:38:44', NULL),
(12, 8, 9, 'Product Item Name 8', '15', '2', 'Completed', '5fe310cf6d80d', '2020-12-23 03:41:35', NULL),
(13, 9, 9, 'Product Item Name 8', '15', '2', 'Completed', '5fe3119be7bb9', '2020-12-23 03:44:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_about_items`
--

CREATE TABLE `page_about_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_about_items`
--

INSERT INTO `page_about_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'About Us', '<p>Lorem ipsum dolor sit amet, id saperet suavitate signiferumque sea. Eu tantas invenire signiferumque per, at affert eloquentiam eos, duo no sale utroque. His ad homero verterem, ut paulo neglegentur contentiones per. Ex cum unum vocent commodo. Ut ridens principes rationibus ius, ex mea saepe docendi, cu eum unum assum accumsan.</p><p>Ne quo possim consectetuer, splendide voluptatibus ut mea. Summo mucius regione qui et, sea soleat everti indoctum no. Brute postea ut vel, oblique propriae pertinacia et sed. No nominati adipiscing nam, accusata interpretaris no est, no tota conceptam nam. Id posidonium dissentiunt mea, an nibh menandri eum. Meis nominati cum cu.</p><p>Eum ad delicatissimi signiferumque, mea causae delenit perfecto et. Sit primis nostrum id, an postea numquam per, id quo diceret deleniti consectetuer. Eum eu salutatus mediocritatem. Blandit ocurreret dissentiet ne quo, ex mazim numquam delenit his.</p><p>Ea mel elit placerat. Ius nobis delicata gloriatur at. Nam fabulas salutandi at, in per officiis omittantur contentiones, omnes insolens suscipiantur sed cu. Ei modus persequeris vix. Persius legimus has an, mea dicit maiestatis adipiscing eu.</p>', 'Show', 'About Us', 'About Us Meta Description', NULL, '2020-12-22 20:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `page_blog_items`
--

CREATE TABLE `page_blog_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_blog_items`
--

INSERT INTO `page_blog_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Blog', NULL, 'Show', 'Blog', 'Blog', NULL, '2020-11-21 05:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `page_career_items`
--

CREATE TABLE `page_career_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_career_items`
--

INSERT INTO `page_career_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Career', NULL, 'Show', 'Career', 'Career', NULL, '2020-11-21 05:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `page_contact_items`
--

CREATE TABLE `page_contact_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_contact_items`
--

INSERT INTO `page_contact_items` (`id`, `name`, `detail`, `status`, `contact_address`, `contact_email`, `contact_phone`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Contact Us', '<p><br></p>', 'Show', '3153 Foley Street\r\nMiami, FL 33176', 'Office 1: 954-648-1802\r\nOffice 2: 963-612-1782', 'sales@yourwebsite.com\r\nsupport@yourwebsite.com', 'Contact Us', 'Contact Us', NULL, '2020-11-21 05:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `page_faq_items`
--

CREATE TABLE `page_faq_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_faq_items`
--

INSERT INTO `page_faq_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'FAQ', NULL, 'Show', 'FAQ', 'FAQ', NULL, '2020-11-21 05:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `page_home_items`
--

CREATE TABLE `page_home_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `why_choose_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `why_choose_subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `why_choose_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `special_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `special_subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `special_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `special_btn_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `special_btn_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `special_yt_video` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `special_bg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `special_video_bg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `special_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonial_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonial_subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonial_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonial_bg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_member_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_member_subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_member_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_btn_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_btn_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_bg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latest_blog_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latest_blog_subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latest_blog_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `newsletter_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `newsletter_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `newsletter_bg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `newsletter_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_home_items`
--

INSERT INTO `page_home_items` (`id`, `seo_title`, `seo_meta_description`, `why_choose_title`, `why_choose_subtitle`, `why_choose_status`, `special_title`, `special_subtitle`, `special_content`, `special_btn_text`, `special_btn_url`, `special_yt_video`, `special_bg`, `special_video_bg`, `special_status`, `service_title`, `service_subtitle`, `service_status`, `testimonial_title`, `testimonial_subtitle`, `testimonial_status`, `testimonial_bg`, `project_title`, `project_subtitle`, `project_status`, `team_member_title`, `team_member_subtitle`, `team_member_status`, `appointment_title`, `appointment_text`, `appointment_btn_text`, `appointment_btn_url`, `appointment_bg`, `appointment_status`, `latest_blog_title`, `latest_blog_subtitle`, `latest_blog_status`, `newsletter_title`, `newsletter_text`, `newsletter_bg`, `newsletter_status`, `created_at`, `updated_at`) VALUES
(1, 'CMS Villa - Multipurpose Laravel Business Website CMS', 'CMS Villa - Multipurpose Laravel Business Website CMS', 'Why Choose Us', 'You should choose our construction firm for the following reasons', 'Show', 'Welcome to our website', 'How we run the consulting business', 'Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne.\r\n\r\nDuo luptatum delicata evertitur ad. Usu te quaerendum definitiones, ne mundi volutpat duo, in dissentias temporibus pri. Duo ferri dicant definitionem te.', 'Read More', '#', 'mJT899QyRvI', 'special_bg.jpeg', 'special_video_bg.jpeg', 'Show', 'Our Services', 'Our team always provides quality services to our valuable clients', 'Show', 'Testimonial', 'What our clients tell about us', 'Show', 'testimonial_bg.jpeg', 'Our Projects', 'See all our completed successful projects here', 'Show', 'Team Members', 'See all our expert team members who are ready to help you always', 'Show', 'Want to hire us for your business?', 'If you want to take our service to build your business, our expert team members are always here to help you to make you successful.', 'Make An Appointment', '#', 'appointment_bg.jpeg', 'Show', 'Latest Blog', 'See all the latest blog about our activity from here', 'Show', 'Newsletter', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid fugit expedita, iure ullam cum vero ex sint aperiam maxime.', 'newsletter_bg.jpeg', 'Show', NULL, '2020-12-22 20:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `page_other_items`
--

CREATE TABLE `page_other_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_other_items`
--

INSERT INTO `page_other_items` (`id`, `seo_title`, `seo_meta_description`, `page_name`, `created_at`, `updated_at`) VALUES
(1, 'Search', 'Search Page Description', 'Search Page', NULL, '2020-11-21 22:03:51'),
(2, 'Cart', 'Cart Page Description', 'Cart Page', NULL, '2020-11-21 22:03:55'),
(3, 'Checkout', 'Checkout Page Description', 'Checkout Page', NULL, '2020-11-21 22:04:00'),
(4, 'Login', 'Login Page Description', 'Login Page', NULL, '2020-12-22 20:19:05'),
(5, 'Registration', 'Registration Page Description', 'Registration Page', NULL, '2020-11-21 22:04:09'),
(6, 'Forget Password', 'Forget Password Page Description', 'Forget Password Page', NULL, '2020-12-22 20:19:07'),
(7, 'Customer Panel', 'Customer Page Description', 'Customer Panel Pages', NULL, '2020-11-21 22:04:19'),
(8, 'Payment', 'Payment Page Description', 'Payment Page', NULL, '2020-12-22 20:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `page_photo_gallery_items`
--

CREATE TABLE `page_photo_gallery_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_photo_gallery_items`
--

INSERT INTO `page_photo_gallery_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Photo Gallery', NULL, 'Show', 'Photo Gallery', 'Photo Gallery', NULL, '2020-12-12 10:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `page_privacy_items`
--

CREATE TABLE `page_privacy_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_privacy_items`
--

INSERT INTO `page_privacy_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', '<p>Lorem ipsum dolor sit amet, id saperet suavitate signiferumque sea. Eu tantas invenire signiferumque per, at affert eloquentiam eos, duo no sale utroque. His ad homero verterem, ut paulo neglegentur contentiones per. Ex cum unum vocent commodo. Ut ridens principes rationibus ius, ex mea saepe docendi, cu eum unum assum accumsan.</p><p>Ne quo possim consectetuer, splendide voluptatibus ut mea. Summo mucius regione qui et, sea soleat everti indoctum no. Brute postea ut vel, oblique propriae pertinacia et sed. No nominati adipiscing nam, accusata interpretaris no est, no tota conceptam nam. Id posidonium dissentiunt mea, an nibh menandri eum. Meis nominati cum cu.</p><p>Eum ad delicatissimi signiferumque, mea causae delenit perfecto et. Sit primis nostrum id, an postea numquam per, id quo diceret deleniti consectetuer. Eum eu salutatus mediocritatem. Blandit ocurreret dissentiet ne quo, ex mazim numquam delenit his.</p><p>Ea mel elit placerat. Ius nobis delicata gloriatur at. Nam fabulas salutandi at, in per officiis omittantur contentiones, omnes insolens suscipiantur sed cu. Ei modus persequeris vix. Persius legimus has an, mea dicit maiestatis adipiscing eu.</p>', 'Show', 'Privacy Policy', 'Privacy Policy', NULL, '2020-11-21 05:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `page_project_items`
--

CREATE TABLE `page_project_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_project_items`
--

INSERT INTO `page_project_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Projects', NULL, 'Show', 'Projects', 'Project Page Meta Description', NULL, '2020-11-21 05:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `page_service_items`
--

CREATE TABLE `page_service_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_service_items`
--

INSERT INTO `page_service_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Services', NULL, 'Show', 'Services', 'Services Meta Description', NULL, '2020-11-20 21:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `page_shop_items`
--

CREATE TABLE `page_shop_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_shop_items`
--

INSERT INTO `page_shop_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Shop', NULL, 'Show', 'Shop', 'Shop Page Meta Description', NULL, '2020-11-21 00:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `page_team_items`
--

CREATE TABLE `page_team_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_team_items`
--

INSERT INTO `page_team_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Team Member', NULL, 'Show', 'Team Member', 'Team Member', NULL, '2020-11-21 05:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `page_term_items`
--

CREATE TABLE `page_term_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_term_items`
--

INSERT INTO `page_term_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Terms and Conditions', '<p>Lorem ipsum dolor sit amet, id saperet suavitate signiferumque sea. Eu tantas invenire signiferumque per, at affert eloquentiam eos, duo no sale utroque. His ad homero verterem, ut paulo neglegentur contentiones per. Ex cum unum vocent commodo. Ut ridens principes rationibus ius, ex mea saepe docendi, cu eum unum assum accumsan.</p><p>Ne quo possim consectetuer, splendide voluptatibus ut mea. Summo mucius regione qui et, sea soleat everti indoctum no. Brute postea ut vel, oblique propriae pertinacia et sed. No nominati adipiscing nam, accusata interpretaris no est, no tota conceptam nam. Id posidonium dissentiunt mea, an nibh menandri eum. Meis nominati cum cu.</p><p>Eum ad delicatissimi signiferumque, mea causae delenit perfecto et. Sit primis nostrum id, an postea numquam per, id quo diceret deleniti consectetuer. Eum eu salutatus mediocritatem. Blandit ocurreret dissentiet ne quo, ex mazim numquam delenit his.</p><p>Ea mel elit placerat. Ius nobis delicata gloriatur at. Nam fabulas salutandi at, in per officiis omittantur contentiones, omnes insolens suscipiantur sed cu. Ei modus persequeris vix. Persius legimus has an, mea dicit maiestatis adipiscing eu.</p>', 'Show', 'Terms and Conditions', 'Terms and Conditions', NULL, '2020-11-21 05:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `page_video_gallery_items`
--

CREATE TABLE `page_video_gallery_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_video_gallery_items`
--

INSERT INTO `page_video_gallery_items` (`id`, `name`, `detail`, `status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Video Gallery', NULL, 'Show', 'Video Gallery', 'Video Gallery', NULL, '2020-12-12 10:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('arefin2k@gmail.com', '$2y$10$n.b82lZQRLiL4WIgRsgpeu8UpfQMmx9M1FdiQQ18rjK38i9yGD6kG', '2020-11-23 19:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_caption` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_order` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `photo_name`, `photo_caption`, `photo_order`, `created_at`, `updated_at`) VALUES
(3, 'photo-3.jpeg', 'Item 1', 1, '2020-11-22 20:27:59', '2020-11-22 20:49:20'),
(4, 'photo-4.jpeg', 'Item 2', 2, '2020-11-22 20:28:26', '2020-11-22 20:51:06'),
(5, 'photo-5.jpeg', 'Item 3', 3, '2020-11-22 20:28:34', '2020-11-22 20:37:16'),
(6, 'photo-6.png', 'Item 4', 4, '2020-11-22 20:28:42', '2020-11-22 20:51:17'),
(7, 'photo-7.jpeg', 'Item 5', 5, '2020-11-22 20:28:59', '2020-11-22 20:37:26'),
(8, 'photo-8.jpeg', 'Item 6', 6, '2020-11-22 20:29:07', '2020-11-22 20:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_old_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_current_price` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_stock` smallint(6) NOT NULL,
  `product_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_content_short` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_return_policy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_featured_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_order` smallint(6) NOT NULL DEFAULT 0,
  `product_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_slug`, `product_old_price`, `product_current_price`, `product_stock`, `product_content`, `product_content_short`, `product_return_policy`, `product_featured_photo`, `product_order`, `product_status`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Product Item Name 1', 'product-item-name-1', '59', '39', 7, '<p>Lorem ipsum dolor sit amet, erat dicat percipitur vix in, habeo expetendis nam et, his homero verterem molestiae ea. Tantas legere blandit duo ei, ei malis maluisset voluptatum mei. Ne mel alia consul equidem, at mea timeam indoctum explicari. Ut detracto gubergren dissentiet sea, harum dolores deserunt ut sed. Mel ne animal invidunt petentium, te mei exerci voluptaria. Quo id populo fabulas voluptatum, ius ei legere deterruisset, et nec ridens liberavisse. Nusquam partiendo scribentur quo an.</p><p>Et duo inermis tacimates, sed id posse intellegebat, ut sed agam aperiri. Nam ex dolorem vivendum, te omnis eleifend est, atqui tempor fabellas ne qui. Cotidieque reprehendunt eam no. Sed at alii sanctus, ius dictas mediocritatem in. Qui stet principes ut, ad pro dicat oporteat. Doctus senserit sea ut, eum an iisque neglegentur. Fugit putant consequuntur id sit.</p><p>In vidisse referrentur consectetuer duo. Dolor vocibus consulatu an pro, ei sed graece tritani perpetua. Mel et dolorem percipit, per nemore commune gloriatur no. Ex sed minim utamur intellegebat.&nbsp;</p>', 'Lorem ipsum dolor sit amet, erat dicat percipitur vix in, habeo expetendis nam et, his homero verterem molestiae ea.', '<p>Eu eos malis dicat facilisis, aliquip alterum assentior at vix. Inimicus interpretaris ei vim, graece singulis atomorum ad per, ea sed admodum apeirian indoctum. Cu pro tantas reprehendunt. Usu menandri pertinacia et, vis ne scaevola dissentias. In ornatus eligendi persequeris his, ea usu causae labitur. At porro delectus sed. Quot minim ei has, has id dolore maiorum interesset.</p><p>Justo incorrupte ea quo, adhuc eligendi reprimique pro et. Eos nobis aeterno conclusionemque ei, no eam dolor delectus. Error altera argumentum quo ea, eam ne antiopam assentior. Ea mea ullum dicant timeam, sea affert reformidans ad. Ei dicam appetere sea, id phaedrum moderatius sed.</p><p>Ad mel velit quidam honestatis. Has no mediocrem repudiandae, mel in ceteros perfecto gubergren, has ne dignissim consequat theophrastus. Duo et assum harum iriure, solum ubique philosophia per an, mea clita nominati reprehendunt ei. Zril melius dignissim qui ad. Debitis fierent quo in, no usu affert aeterno.</p>', 'product-1.png', 1, 'Show', 'Product Item Name', 'Product Item Name', '2020-11-30 03:40:11', '2020-11-30 19:03:13'),
(3, 'Product Item Name 2', 'product-item-name-2', '166', '110', 24, '<p>Lorem ipsum dolor sit amet, erat dicat percipitur vix in, habeo expetendis nam et, his homero verterem molestiae ea. Tantas legere blandit duo ei, ei malis maluisset voluptatum mei. Ne mel alia consul equidem, at mea timeam indoctum explicari. Ut detracto gubergren dissentiet sea, harum dolores deserunt ut sed. Mel ne animal invidunt petentium, te mei exerci voluptaria. Quo id populo fabulas voluptatum, ius ei legere deterruisset, et nec ridens liberavisse. Nusquam partiendo scribentur quo an.</p><p>Et duo inermis tacimates, sed id posse intellegebat, ut sed agam aperiri. Nam ex dolorem vivendum, te omnis eleifend est, atqui tempor fabellas ne qui. Cotidieque reprehendunt eam no. Sed at alii sanctus, ius dictas mediocritatem in. Qui stet principes ut, ad pro dicat oporteat. Doctus senserit sea ut, eum an iisque neglegentur. Fugit putant consequuntur id sit.</p><p>In vidisse referrentur consectetuer duo. Dolor vocibus consulatu an pro, ei sed graece tritani perpetua. Mel et dolorem percipit, per nemore commune gloriatur no. Ex sed minim utamur intellegebat.</p>', 'Lorem ipsum dolor sit amet, erat dicat percipitur vix in, habeo expetendis nam et, his homero verterem molestiae ea.', '<p>Eu eos malis dicat facilisis, aliquip alterum assentior at vix. Inimicus interpretaris ei vim, graece singulis atomorum ad per, ea sed admodum apeirian indoctum. Cu pro tantas reprehendunt. Usu menandri pertinacia et, vis ne scaevola dissentias. In ornatus eligendi persequeris his, ea usu causae labitur. At porro delectus sed. Quot minim ei has, has id dolore maiorum interesset.</p><p>Justo incorrupte ea quo, adhuc eligendi reprimique pro et. Eos nobis aeterno conclusionemque ei, no eam dolor delectus. Error altera argumentum quo ea, eam ne antiopam assentior. Ea mea ullum dicant timeam, sea affert reformidans ad. Ei dicam appetere sea, id phaedrum moderatius sed.</p><p>Ad mel velit quidam honestatis. Has no mediocrem repudiandae, mel in ceteros perfecto gubergren, has ne dignissim consequat theophrastus. Duo et assum harum iriure, solum ubique philosophia per an, mea clita nominati reprehendunt ei. Zril melius dignissim qui ad. Debitis fierent quo in, no usu affert aeterno.</p>', 'product-3.png', 2, 'Show', 'Product Item Name', 'Product Item Name', '2020-11-30 09:36:05', '2020-11-30 19:03:16'),
(4, 'Product Item Name 3', 'product-item-name-3', '9', '5', 1, '<p>Lorem ipsum dolor sit amet, erat dicat percipitur vix in, habeo expetendis nam et, his homero verterem molestiae ea. Tantas legere blandit duo ei, ei malis maluisset voluptatum mei. Ne mel alia consul equidem, at mea timeam indoctum explicari. Ut detracto gubergren dissentiet sea, harum dolores deserunt ut sed. Mel ne animal invidunt petentium, te mei exerci voluptaria. Quo id populo fabulas voluptatum, ius ei legere deterruisset, et nec ridens liberavisse. Nusquam partiendo scribentur quo an.</p><p>Et duo inermis tacimates, sed id posse intellegebat, ut sed agam aperiri. Nam ex dolorem vivendum, te omnis eleifend est, atqui tempor fabellas ne qui. Cotidieque reprehendunt eam no. Sed at alii sanctus, ius dictas mediocritatem in. Qui stet principes ut, ad pro dicat oporteat. Doctus senserit sea ut, eum an iisque neglegentur. Fugit putant consequuntur id sit.</p><p>In vidisse referrentur consectetuer duo. Dolor vocibus consulatu an pro, ei sed graece tritani perpetua. Mel et dolorem percipit, per nemore commune gloriatur no. Ex sed minim utamur intellegebat.</p>', 'Lorem ipsum dolor sit amet, erat dicat percipitur vix in, habeo expetendis nam et, his homero verterem molestiae ea.', '<p>Eu eos malis dicat facilisis, aliquip alterum assentior at vix. Inimicus interpretaris ei vim, graece singulis atomorum ad per, ea sed admodum apeirian indoctum. Cu pro tantas reprehendunt. Usu menandri pertinacia et, vis ne scaevola dissentias. In ornatus eligendi persequeris his, ea usu causae labitur. At porro delectus sed. Quot minim ei has, has id dolore maiorum interesset.</p><p>Justo incorrupte ea quo, adhuc eligendi reprimique pro et. Eos nobis aeterno conclusionemque ei, no eam dolor delectus. Error altera argumentum quo ea, eam ne antiopam assentior. Ea mea ullum dicant timeam, sea affert reformidans ad. Ei dicam appetere sea, id phaedrum moderatius sed.</p><p>Ad mel velit quidam honestatis. Has no mediocrem repudiandae, mel in ceteros perfecto gubergren, has ne dignissim consequat theophrastus. Duo et assum harum iriure, solum ubique philosophia per an, mea clita nominati reprehendunt ei. Zril melius dignissim qui ad. Debitis fierent quo in, no usu affert aeterno.</p>', 'product-4.png', 3, 'Show', 'Product Item Name', 'Product Item Name', '2020-11-30 09:37:39', '2020-11-30 19:03:20'),
(5, 'Product Item Name 4', 'product-item-name-4', '29', '22', 42, '<p>Lorem ipsum dolor sit amet, te constituto intellegam eloquentiam sed, putent accusamus temporibus his ut. Prima impetus virtute usu ex, et vim numquam efficiantur, cu vis option civibus. Ad tale quas corpora has, melius nostrud ius ad, sonet consectetuer signiferumque cu usu. Sed te adhuc atomorum, ad quo erant alterum reprimique. Virtute equidem deseruisse vim ei.</p><p>Eu vim atqui ludus petentium, suas idque est id. Ne veniam oblique propriae vim, dicant forensibus definitionem vix eu. Pri eu probatus abhorreant, nonumy aliquid perpetua ut usu. Etiam iudicabit vituperata ne est, id sed everti utroque, vis ea oblique pertinax concludaturque.</p><p>Te cum abhorreant temporibus, eam mazim platonem ea. Dolor abhorreant sea et, usu cu debet bonorum, aliquando instructior necessitatibus vix te. Ea ubique percipit recusabo cum, regione consulatu interpretaris vim no, mel altera fabulas probatus ad. Ignota tritani ad nam, eu per delectus perfecto conceptam.</p><p>An sanctus pertinax cotidieque sed, quo te habemus molestiae consetetur, at salutandi periculis expetendis vim. Quando nusquam eum ut, ius an quem alii. Sit ad ullum consequuntur. Ei sea iudico sententiae honestatis, mel dolorem pertinax senserit ei, cu causae timeam eripuit sit. Sed ex habeo blandit oporteat, ex usu autem iisque. Vel minim dicam soleat te, denique liberavisse ex usu, cibo omnes te eam. Pri esse nobis no, no quo volutpat vulputate.</p>', 'Lorem ipsum dolor sit amet, te constituto intellegam eloquentiam sed, putent accusamus temporibus his ut.', '<p>Eu eos malis dicat facilisis, aliquip alterum assentior at vix. Inimicus interpretaris ei vim, graece singulis atomorum ad per, ea sed admodum apeirian indoctum. Cu pro tantas reprehendunt. Usu menandri pertinacia et, vis ne scaevola dissentias. In ornatus eligendi persequeris his, ea usu causae labitur. At porro delectus sed. Quot minim ei has, has id dolore maiorum interesset.</p><p>Justo incorrupte ea quo, adhuc eligendi reprimique pro et. Eos nobis aeterno conclusionemque ei, no eam dolor delectus. Error altera argumentum quo ea, eam ne antiopam assentior. Ea mea ullum dicant timeam, sea affert reformidans ad. Ei dicam appetere sea, id phaedrum moderatius sed.</p><p>Ad mel velit quidam honestatis. Has no mediocrem repudiandae, mel in ceteros perfecto gubergren, has ne dignissim consequat theophrastus. Duo et assum harum iriure, solum ubique philosophia per an, mea clita nominati reprehendunt ei. Zril melius dignissim qui ad. Debitis fierent quo in, no usu affert aeterno.</p>', 'product-5.png', 4, 'Show', 'Product Item Name', 'Product Item Name', '2020-11-30 09:38:45', '2020-11-30 19:03:25'),
(6, 'Product Item Name 5', 'product-item-name-5', '370', '299', 34, '<p>Lorem ipsum dolor sit amet, te constituto intellegam eloquentiam sed, putent accusamus temporibus his ut. Prima impetus virtute usu ex, et vim numquam efficiantur, cu vis option civibus. Ad tale quas corpora has, melius nostrud ius ad, sonet consectetuer signiferumque cu usu. Sed te adhuc atomorum, ad quo erant alterum reprimique. Virtute equidem deseruisse vim ei.</p><p>Eu vim atqui ludus petentium, suas idque est id. Ne veniam oblique propriae vim, dicant forensibus definitionem vix eu. Pri eu probatus abhorreant, nonumy aliquid perpetua ut usu. Etiam iudicabit vituperata ne est, id sed everti utroque, vis ea oblique pertinax concludaturque.</p><p>Te cum abhorreant temporibus, eam mazim platonem ea. Dolor abhorreant sea et, usu cu debet bonorum, aliquando instructior necessitatibus vix te. Ea ubique percipit recusabo cum, regione consulatu interpretaris vim no, mel altera fabulas probatus ad. Ignota tritani ad nam, eu per delectus perfecto conceptam.</p><p>An sanctus pertinax cotidieque sed, quo te habemus molestiae consetetur, at salutandi periculis expetendis vim. Quando nusquam eum ut, ius an quem alii. Sit ad ullum consequuntur. Ei sea iudico sententiae honestatis, mel dolorem pertinax senserit ei, cu causae timeam eripuit sit. Sed ex habeo blandit oporteat, ex usu autem iisque. Vel minim dicam soleat te, denique liberavisse ex usu, cibo omnes te eam. Pri esse nobis no, no quo volutpat vulputate.</p>', 'Lorem ipsum dolor sit amet, te constituto intellegam eloquentiam sed, putent accusamus temporibus his ut.', '<p>Eu eos malis dicat facilisis, aliquip alterum assentior at vix. Inimicus interpretaris ei vim, graece singulis atomorum ad per, ea sed admodum apeirian indoctum. Cu pro tantas reprehendunt. Usu menandri pertinacia et, vis ne scaevola dissentias. In ornatus eligendi persequeris his, ea usu causae labitur. At porro delectus sed. Quot minim ei has, has id dolore maiorum interesset.</p><p>Justo incorrupte ea quo, adhuc eligendi reprimique pro et. Eos nobis aeterno conclusionemque ei, no eam dolor delectus. Error altera argumentum quo ea, eam ne antiopam assentior. Ea mea ullum dicant timeam, sea affert reformidans ad. Ei dicam appetere sea, id phaedrum moderatius sed.</p><p>Ad mel velit quidam honestatis. Has no mediocrem repudiandae, mel in ceteros perfecto gubergren, has ne dignissim consequat theophrastus. Duo et assum harum iriure, solum ubique philosophia per an, mea clita nominati reprehendunt ei. Zril melius dignissim qui ad. Debitis fierent quo in, no usu affert aeterno.</p>', 'product-6.png', 5, 'Show', 'Product Item Name', 'Product Item Name', '2020-11-30 09:39:42', '2020-11-30 19:03:29'),
(7, 'Product Item Name 6', 'product-item-name-6', '28', '20', 33, '<p>Lorem ipsum dolor sit amet, te constituto intellegam eloquentiam sed, putent accusamus temporibus his ut. Prima impetus virtute usu ex, et vim numquam efficiantur, cu vis option civibus. Ad tale quas corpora has, melius nostrud ius ad, sonet consectetuer signiferumque cu usu. Sed te adhuc atomorum, ad quo erant alterum reprimique. Virtute equidem deseruisse vim ei.</p><p>Eu vim atqui ludus petentium, suas idque est id. Ne veniam oblique propriae vim, dicant forensibus definitionem vix eu. Pri eu probatus abhorreant, nonumy aliquid perpetua ut usu. Etiam iudicabit vituperata ne est, id sed everti utroque, vis ea oblique pertinax concludaturque.</p><p>Te cum abhorreant temporibus, eam mazim platonem ea. Dolor abhorreant sea et, usu cu debet bonorum, aliquando instructior necessitatibus vix te. Ea ubique percipit recusabo cum, regione consulatu interpretaris vim no, mel altera fabulas probatus ad. Ignota tritani ad nam, eu per delectus perfecto conceptam.</p><p>An sanctus pertinax cotidieque sed, quo te habemus molestiae consetetur, at salutandi periculis expetendis vim. Quando nusquam eum ut, ius an quem alii. Sit ad ullum consequuntur. Ei sea iudico sententiae honestatis, mel dolorem pertinax senserit ei, cu causae timeam eripuit sit. Sed ex habeo blandit oporteat, ex usu autem iisque. Vel minim dicam soleat te, denique liberavisse ex usu, cibo omnes te eam. Pri esse nobis no, no quo volutpat vulputate.</p>', 'Lorem ipsum dolor sit amet, te constituto intellegam eloquentiam sed, putent accusamus temporibus his ut.', '<p>Eu eos malis dicat facilisis, aliquip alterum assentior at vix. Inimicus interpretaris ei vim, graece singulis atomorum ad per, ea sed admodum apeirian indoctum. Cu pro tantas reprehendunt. Usu menandri pertinacia et, vis ne scaevola dissentias. In ornatus eligendi persequeris his, ea usu causae labitur. At porro delectus sed. Quot minim ei has, has id dolore maiorum interesset.</p><p>Justo incorrupte ea quo, adhuc eligendi reprimique pro et. Eos nobis aeterno conclusionemque ei, no eam dolor delectus. Error altera argumentum quo ea, eam ne antiopam assentior. Ea mea ullum dicant timeam, sea affert reformidans ad. Ei dicam appetere sea, id phaedrum moderatius sed.</p><p>Ad mel velit quidam honestatis. Has no mediocrem repudiandae, mel in ceteros perfecto gubergren, has ne dignissim consequat theophrastus. Duo et assum harum iriure, solum ubique philosophia per an, mea clita nominati reprehendunt ei. Zril melius dignissim qui ad. Debitis fierent quo in, no usu affert aeterno.</p>', 'product-7.png', 6, 'Show', 'Product Item Name', 'Product Item Name', '2020-11-30 09:40:29', '2020-11-30 19:03:34'),
(8, 'Product Item Name 7', 'product-item-name-7', '65', '45', 40, '<p>Lorem ipsum dolor sit amet, te constituto intellegam eloquentiam sed, putent accusamus temporibus his ut. Prima impetus virtute usu ex, et vim numquam efficiantur, cu vis option civibus. Ad tale quas corpora has, melius nostrud ius ad, sonet consectetuer signiferumque cu usu. Sed te adhuc atomorum, ad quo erant alterum reprimique. Virtute equidem deseruisse vim ei.</p><p>Eu vim atqui ludus petentium, suas idque est id. Ne veniam oblique propriae vim, dicant forensibus definitionem vix eu. Pri eu probatus abhorreant, nonumy aliquid perpetua ut usu. Etiam iudicabit vituperata ne est, id sed everti utroque, vis ea oblique pertinax concludaturque.</p><p>Te cum abhorreant temporibus, eam mazim platonem ea. Dolor abhorreant sea et, usu cu debet bonorum, aliquando instructior necessitatibus vix te. Ea ubique percipit recusabo cum, regione consulatu interpretaris vim no, mel altera fabulas probatus ad. Ignota tritani ad nam, eu per delectus perfecto conceptam.</p><p>An sanctus pertinax cotidieque sed, quo te habemus molestiae consetetur, at salutandi periculis expetendis vim. Quando nusquam eum ut, ius an quem alii. Sit ad ullum consequuntur. Ei sea iudico sententiae honestatis, mel dolorem pertinax senserit ei, cu causae timeam eripuit sit. Sed ex habeo blandit oporteat, ex usu autem iisque. Vel minim dicam soleat te, denique liberavisse ex usu, cibo omnes te eam. Pri esse nobis no, no quo volutpat vulputate.</p>', 'Lorem ipsum dolor sit amet, te constituto intellegam eloquentiam sed, putent accusamus temporibus his ut.', '<p>Eu eos malis dicat facilisis, aliquip alterum assentior at vix. Inimicus interpretaris ei vim, graece singulis atomorum ad per, ea sed admodum apeirian indoctum. Cu pro tantas reprehendunt. Usu menandri pertinacia et, vis ne scaevola dissentias. In ornatus eligendi persequeris his, ea usu causae labitur. At porro delectus sed. Quot minim ei has, has id dolore maiorum interesset.</p><p>Justo incorrupte ea quo, adhuc eligendi reprimique pro et. Eos nobis aeterno conclusionemque ei, no eam dolor delectus. Error altera argumentum quo ea, eam ne antiopam assentior. Ea mea ullum dicant timeam, sea affert reformidans ad. Ei dicam appetere sea, id phaedrum moderatius sed.</p><p>Ad mel velit quidam honestatis. Has no mediocrem repudiandae, mel in ceteros perfecto gubergren, has ne dignissim consequat theophrastus. Duo et assum harum iriure, solum ubique philosophia per an, mea clita nominati reprehendunt ei. Zril melius dignissim qui ad. Debitis fierent quo in, no usu affert aeterno.</p>', 'product-8.png', 7, 'Show', 'Product Item Name', 'Product Item Name', '2020-11-30 09:41:18', '2020-11-30 19:03:38'),
(9, 'Product Item Name 8', 'product-item-name-8', '20', '15', 7, '<p>Lorem ipsum dolor sit amet, te constituto intellegam eloquentiam sed, putent accusamus temporibus his ut. Prima impetus virtute usu ex, et vim numquam efficiantur, cu vis option civibus. Ad tale quas corpora has, melius nostrud ius ad, sonet consectetuer signiferumque cu usu. Sed te adhuc atomorum, ad quo erant alterum reprimique. Virtute equidem deseruisse vim ei.</p><p>Eu vim atqui ludus petentium, suas idque est id. Ne veniam oblique propriae vim, dicant forensibus definitionem vix eu. Pri eu probatus abhorreant, nonumy aliquid perpetua ut usu. Etiam iudicabit vituperata ne est, id sed everti utroque, vis ea oblique pertinax concludaturque.</p><p>Te cum abhorreant temporibus, eam mazim platonem ea. Dolor abhorreant sea et, usu cu debet bonorum, aliquando instructior necessitatibus vix te. Ea ubique percipit recusabo cum, regione consulatu interpretaris vim no, mel altera fabulas probatus ad. Ignota tritani ad nam, eu per delectus perfecto conceptam.</p><p>An sanctus pertinax cotidieque sed, quo te habemus molestiae consetetur, at salutandi periculis expetendis vim. Quando nusquam eum ut, ius an quem alii. Sit ad ullum consequuntur. Ei sea iudico sententiae honestatis, mel dolorem pertinax senserit ei, cu causae timeam eripuit sit. Sed ex habeo blandit oporteat, ex usu autem iisque. Vel minim dicam soleat te, denique liberavisse ex usu, cibo omnes te eam. Pri esse nobis no, no quo volutpat vulputate.</p>', 'Lorem ipsum dolor sit amet, te constituto intellegam eloquentiam sed, putent accusamus temporibus his ut.', '<p>Eu eos malis dicat facilisis, aliquip alterum assentior at vix. Inimicus interpretaris ei vim, graece singulis atomorum ad per, ea sed admodum apeirian indoctum. Cu pro tantas reprehendunt. Usu menandri pertinacia et, vis ne scaevola dissentias. In ornatus eligendi persequeris his, ea usu causae labitur. At porro delectus sed. Quot minim ei has, has id dolore maiorum interesset.</p><p>Justo incorrupte ea quo, adhuc eligendi reprimique pro et. Eos nobis aeterno conclusionemque ei, no eam dolor delectus. Error altera argumentum quo ea, eam ne antiopam assentior. Ea mea ullum dicant timeam, sea affert reformidans ad. Ei dicam appetere sea, id phaedrum moderatius sed.</p><p>Ad mel velit quidam honestatis. Has no mediocrem repudiandae, mel in ceteros perfecto gubergren, has ne dignissim consequat theophrastus. Duo et assum harum iriure, solum ubique philosophia per an, mea clita nominati reprehendunt ei. Zril melius dignissim qui ad. Debitis fierent quo in, no usu affert aeterno.</p>', 'product-9.png', 8, 'Show', 'Product Item Name', 'Product Item Name', '2020-11-30 09:42:06', '2020-11-30 19:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_content_short` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_start_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_end_date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_client_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_client_company` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_client_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_video` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_featured_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_slug`, `project_content`, `project_content_short`, `project_start_date`, `project_end_date`, `project_client_name`, `project_client_company`, `project_client_comment`, `project_video`, `project_featured_photo`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(3, 'Libris impetus molestiae te eu ius ludus', 'libris-impetus-molestiae-te-eu-ius-ludus', '<p>Lorem ipsum dolor sit amet, eu vim elitr clita, quot putent feugait cu per. Tamquam voluptua persequeris ad cum, at his cibo scaevola. Cibo justo equidem cu nam. An meliore admodum vis, quot aliquip bonorum ei quo. Mea nemore feugiat verterem cu, modus vulputate mea id.</p><p>Est facilis recteque et, etiam aliquip fastidii usu ea, eos id diam aeterno definiebas. Ad pro tantas numquam alienum, an quidam dolorem voluptatum his, ut natum explicari consequat quo. Minim audiam te vel, in est decore legimus. Semper accusamus posidonium ea duo, usu tale fabellas cu, elitr semper tincidunt ius in. Cum possim labitur eripuit at, vix ut quas commodo neglegentur.</p><p>Cetero mnesarchum id vis, id sea magna interpretaris. In perpetua posidonium complectitur duo. Te duo harum veniam altera, pri veritus nusquam offendit ex. Sed no ferri soleat quaerendum, quo ad vitae utroque expetendis, ex lorem soleat vis.</p>', 'Lorem ipsum dolor sit amet, eu vim elitr clita, quot putent feugait cu per. Tamquam voluptua persequeris ad cum, at his cibo scaevola. Cibo justo equidem cu nam.', '2020-01-01', '2020-02-21', 'Client Name Here', 'Company Name Here', 'Qui commune laboramus definitionem et, ut regione persius vel, facete verterem has eu. Scripta iracundia mel in, vim omittam perpetua ut. Magna affert graece at pri, et est blandit laboramus. Duo feugiat periculis eu, ne illum melius molestie has.', 'wwOY6RgrDKQ', 'project-featured-photo-3.png', 'Libris impetus molestiae te eu ius ludus', 'Libris impetus molestiae te eu ius ludus', '2020-11-22 18:39:57', '2020-11-22 18:39:57'),
(8, 'Eu paulo lucilius adipisci duo eam', 'eu-paulo-lucilius-adipisci-duo-eam', '<p>Lorem ipsum dolor sit amet, eu vim elitr clita, quot putent feugait cu per. Tamquam voluptua persequeris ad cum, at his cibo scaevola. Cibo justo equidem cu nam. An meliore admodum vis, quot aliquip bonorum ei quo. Mea nemore feugiat verterem cu, modus vulputate mea id.<br></p><p>Est facilis recteque et, etiam aliquip fastidii usu ea, eos id diam aeterno definiebas. Ad pro tantas numquam alienum, an quidam dolorem voluptatum his, ut natum explicari consequat quo. Minim audiam te vel, in est decore legimus. Semper accusamus posidonium ea duo, usu tale fabellas cu, elitr semper tincidunt ius in. Cum possim labitur eripuit at, vix ut quas commodo neglegentur.</p><p>Cetero mnesarchum id vis, id sea magna interpretaris. In perpetua posidonium complectitur duo. Te duo harum veniam altera, pri veritus nusquam offendit ex. Sed no ferri soleat quaerendum, quo ad vitae utroque expetendis, ex lorem soleat vis.</p>', 'Lorem ipsum dolor sit amet, eu vim elitr clita, quot putent feugait cu per. Tamquam voluptua persequeris ad cum, at his cibo scaevola. Cibo justo equidem cu nam.', '2020-03-03', '2020-04-23', 'Client Name Here', 'Company Name Here', 'Qui commune laboramus definitionem et, ut regione persius vel, facete verterem has eu. Scripta iracundia mel in, vim omittam perpetua ut. Magna affert graece at pri, et est blandit laboramus. Duo feugiat periculis eu, ne illum melius molestie has.', 'hfDUf8g94nA', 'project-featured-photo-8.png', 'Eu paulo lucilius adipisci duo eam', 'Eu paulo lucilius adipisci duo eam', '2020-12-13 03:20:04', '2020-12-13 03:20:04'),
(9, 'Debitis consequuntur sea eu ex agam', 'debitis-consequuntur-sea-eu-ex-agam', '<p>Lorem ipsum dolor sit amet, eu vim elitr clita, quot putent feugait cu per. Tamquam voluptua persequeris ad cum, at his cibo scaevola. Cibo justo equidem cu nam. An meliore admodum vis, quot aliquip bonorum ei quo. Mea nemore feugiat verterem cu, modus vulputate mea id.<br></p><p>Est facilis recteque et, etiam aliquip fastidii usu ea, eos id diam aeterno definiebas. Ad pro tantas numquam alienum, an quidam dolorem voluptatum his, ut natum explicari consequat quo. Minim audiam te vel, in est decore legimus. Semper accusamus posidonium ea duo, usu tale fabellas cu, elitr semper tincidunt ius in. Cum possim labitur eripuit at, vix ut quas commodo neglegentur.</p><p>Cetero mnesarchum id vis, id sea magna interpretaris. In perpetua posidonium complectitur duo. Te duo harum veniam altera, pri veritus nusquam offendit ex. Sed no ferri soleat quaerendum, quo ad vitae utroque expetendis, ex lorem soleat vis.</p>', 'Lorem ipsum dolor sit amet, eu vim elitr clita, quot putent feugait cu per. Tamquam voluptua persequeris ad cum, at his cibo scaevola. Cibo justo equidem cu nam.', '2020-03-25', '2020-05-05', 'Client Name Here', 'Company Name Here', 'Qui commune laboramus definitionem et, ut regione persius vel, facete verterem has eu. Scripta iracundia mel in, vim omittam perpetua ut. Magna affert graece at pri, et est blandit laboramus. Duo feugiat periculis eu, ne illum melius molestie has.', 'eT68ne9TwsA', 'project-featured-photo-9.png', 'Debitis consequuntur sea eu ex agam', 'Debitis consequuntur sea eu ex agam', '2020-12-13 03:22:01', '2020-12-13 03:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `project_photos`
--

CREATE TABLE `project_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `project_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_photo_caption` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_photos`
--

INSERT INTO `project_photos` (`id`, `project_id`, `project_photo`, `project_photo_caption`, `created_at`, `updated_at`) VALUES
(6, 3, 'project-photo-6.png', NULL, '2020-11-22 19:23:45', '2020-11-22 19:23:45'),
(7, 3, 'project-photo-7.png', NULL, '2020-11-22 19:23:52', '2020-11-22 19:23:52'),
(18, 3, 'project-photo-18.png', 'Project Photo', '2020-12-13 03:23:33', '2020-12-13 03:23:33'),
(19, 8, 'project-photo-19.png', 'Project Photo', '2020-12-13 03:24:34', '2020-12-13 03:24:34'),
(20, 8, 'project-photo-20.png', 'Project Photo', '2020-12-13 03:24:53', '2020-12-13 03:24:53'),
(21, 8, 'project-photo-21.png', 'Project Photo', '2020-12-13 03:25:09', '2020-12-13 03:25:09'),
(22, 9, 'project-photo-22.png', 'Project Photo', '2020-12-13 03:25:46', '2020-12-13 03:25:46'),
(23, 9, 'project-photo-23.png', 'Project Photo', '2020-12-13 03:26:07', '2020-12-13 03:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `slug`, `description`, `short_description`, `photo`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Consultant Coordination', 'consultant-coordination', '<p>Lorem ipsum dolor sit amet, porro dicam docendi mei an. Vis paulo euismod delectus an. Te has prima fierent, suscipit platonem necessitatibus nec cu. Eu cum justo munere malorum, quo cu quando adipisci, ex porro ceteros duo. Has cu aeterno fastidii vituperatoribus, duo ea nihil percipitur.</p><p>Ne mea quaestio tincidunt, modus cetero singulis et per. Vix ne fuisset senserit. Partem instructior ne per. Ea est erant forensibus, pri ne prima mucius dictas, in cum graeci corpora volutpat. Cum ea virtute feugait delicatissimi, reque clita vel at, habeo luptatum et eam.</p><p>Id duo alia animal apeirian, cum persius aliquam incorrupte et. Utinam deleniti ponderum ex mel, adhuc singulis democritum has ad, te duo postea antiopam consectetuer. Sit stet tractatos definiebas no, malis libris delicata mei te. At dicit habemus adversarium eam, falli error quo ex, no mel altera cetero officiis. Has ad affert putent epicuri, alia dolorem scriptorem sea an.</p>', 'Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has.', 'service-1.jpeg', 'Consultant Coordination', 'Consultant Coordination', '2020-11-22 23:35:59', '2020-11-22 23:35:59'),
(2, 'Cost Management', 'cost-management', '<p>Lorem ipsum dolor sit amet, porro dicam docendi mei an. Vis paulo euismod delectus an. Te has prima fierent, suscipit platonem necessitatibus nec cu. Eu cum justo munere malorum, quo cu quando adipisci, ex porro ceteros duo. Has cu aeterno fastidii vituperatoribus, duo ea nihil percipitur.</p><p>Ne mea quaestio tincidunt, modus cetero singulis et per. Vix ne fuisset senserit. Partem instructior ne per. Ea est erant forensibus, pri ne prima mucius dictas, in cum graeci corpora volutpat. Cum ea virtute feugait delicatissimi, reque clita vel at, habeo luptatum et eam.</p><p>Id duo alia animal apeirian, cum persius aliquam incorrupte et. Utinam deleniti ponderum ex mel, adhuc singulis democritum has ad, te duo postea antiopam consectetuer. Sit stet tractatos definiebas no, malis libris delicata mei te. At dicit habemus adversarium eam, falli error quo ex, no mel altera cetero officiis. Has ad affert putent epicuri, alia dolorem scriptorem sea an.</p>', 'Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has.', 'service-2.jpeg', 'Cost Management', 'Cost Management', '2020-11-22 23:36:45', '2020-11-22 23:40:12'),
(3, 'Training Program', 'training-program', '<p>Lorem ipsum dolor sit amet, porro dicam docendi mei an. Vis paulo euismod delectus an. Te has prima fierent, suscipit platonem necessitatibus nec cu. Eu cum justo munere malorum, quo cu quando adipisci, ex porro ceteros duo. Has cu aeterno fastidii vituperatoribus, duo ea nihil percipitur.</p><p>Ne mea quaestio tincidunt, modus cetero singulis et per. Vix ne fuisset senserit. Partem instructior ne per. Ea est erant forensibus, pri ne prima mucius dictas, in cum graeci corpora volutpat. Cum ea virtute feugait delicatissimi, reque clita vel at, habeo luptatum et eam.</p><p>Id duo alia animal apeirian, cum persius aliquam incorrupte et. Utinam deleniti ponderum ex mel, adhuc singulis democritum has ad, te duo postea antiopam consectetuer. Sit stet tractatos definiebas no, malis libris delicata mei te. At dicit habemus adversarium eam, falli error quo ex, no mel altera cetero officiis. Has ad affert putent epicuri, alia dolorem scriptorem sea an.</p>', 'Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has.', 'service-3.jpeg', 'Training Program', 'Training Program', '2020-11-22 23:37:17', '2020-11-22 23:40:19'),
(4, 'Project Management', 'project-management', '<p>Lorem ipsum dolor sit amet, porro dicam docendi mei an. Vis paulo euismod delectus an. Te has prima fierent, suscipit platonem necessitatibus nec cu. Eu cum justo munere malorum, quo cu quando adipisci, ex porro ceteros duo. Has cu aeterno fastidii vituperatoribus, duo ea nihil percipitur.</p><p>Ne mea quaestio tincidunt, modus cetero singulis et per. Vix ne fuisset senserit. Partem instructior ne per. Ea est erant forensibus, pri ne prima mucius dictas, in cum graeci corpora volutpat. Cum ea virtute feugait delicatissimi, reque clita vel at, habeo luptatum et eam.</p><p>Id duo alia animal apeirian, cum persius aliquam incorrupte et. Utinam deleniti ponderum ex mel, adhuc singulis democritum has ad, te duo postea antiopam consectetuer. Sit stet tractatos definiebas no, malis libris delicata mei te. At dicit habemus adversarium eam, falli error quo ex, no mel altera cetero officiis. Has ad affert putent epicuri, alia dolorem scriptorem sea an.</p>', 'Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has.', 'service-4.jpeg', 'Project Management', 'Project Management', '2020-11-22 23:37:38', '2020-11-22 23:40:27'),
(5, 'Quality Assurance', 'quality-assurance', '<p>Lorem ipsum dolor sit amet, porro dicam docendi mei an. Vis paulo euismod delectus an. Te has prima fierent, suscipit platonem necessitatibus nec cu. Eu cum justo munere malorum, quo cu quando adipisci, ex porro ceteros duo. Has cu aeterno fastidii vituperatoribus, duo ea nihil percipitur.</p><p>Ne mea quaestio tincidunt, modus cetero singulis et per. Vix ne fuisset senserit. Partem instructior ne per. Ea est erant forensibus, pri ne prima mucius dictas, in cum graeci corpora volutpat. Cum ea virtute feugait delicatissimi, reque clita vel at, habeo luptatum et eam.</p><p>Id duo alia animal apeirian, cum persius aliquam incorrupte et. Utinam deleniti ponderum ex mel, adhuc singulis democritum has ad, te duo postea antiopam consectetuer. Sit stet tractatos definiebas no, malis libris delicata mei te. At dicit habemus adversarium eam, falli error quo ex, no mel altera cetero officiis. Has ad affert putent epicuri, alia dolorem scriptorem sea an.</p>', 'Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has.', 'service-5.jpeg', 'Quality Assurance', 'Quality Assurance', '2020-11-22 23:37:53', '2020-11-22 23:40:33'),
(6, 'Reporting Module', 'reporting-module', '<p>Lorem ipsum dolor sit amet, porro dicam docendi mei an. Vis paulo euismod delectus an. Te has prima fierent, suscipit platonem necessitatibus nec cu. Eu cum justo munere malorum, quo cu quando adipisci, ex porro ceteros duo. Has cu aeterno fastidii vituperatoribus, duo ea nihil percipitur.</p><p>Ne mea quaestio tincidunt, modus cetero singulis et per. Vix ne fuisset senserit. Partem instructior ne per. Ea est erant forensibus, pri ne prima mucius dictas, in cum graeci corpora volutpat. Cum ea virtute feugait delicatissimi, reque clita vel at, habeo luptatum et eam.</p><p>Id duo alia animal apeirian, cum persius aliquam incorrupte et. Utinam deleniti ponderum ex mel, adhuc singulis democritum has ad, te duo postea antiopam consectetuer. Sit stet tractatos definiebas no, malis libris delicata mei te. At dicit habemus adversarium eam, falli error quo ex, no mel altera cetero officiis. Has ad affert putent epicuri, alia dolorem scriptorem sea an.</p>', 'Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has.', 'service-6.jpeg', 'Reporting Module', 'Reporting Module', '2020-11-22 23:38:07', '2020-11-22 23:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_cost` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_order` smallint(6) NOT NULL DEFAULT 0,
  `shipping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `shipping_name`, `shipping_text`, `shipping_cost`, `shipping_order`, `shipping_status`, `created_at`, `updated_at`) VALUES
(1, 'Free Shipping', 'Shipment will be within 10-15 Days', '0', 1, 'Show', '2020-11-29 21:08:10', '2020-11-29 21:11:47'),
(2, 'Standard Shipping', 'Shipment will be within 5-10 Day.', '5', 2, 'Show', '2020-11-29 21:14:01', '2020-11-29 21:14:01'),
(3, '2-Day Shipping', 'Shipment will be within 2 Days.', '10', 3, 'Show', '2020-11-29 21:14:21', '2020-11-29 21:14:21'),
(4, 'Same day delivery', 'Shipment will be within 1 Day.', '20', 4, 'Show', '2020-11-29 21:14:46', '2020-11-29 21:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_button_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_button_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_heading`, `slider_text`, `slider_button_text`, `slider_button_url`, `slider_photo`, `created_at`, `updated_at`) VALUES
(2, 'We are number one in creative business', 'Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis.', 'Read More', '#', 'slider-2.jpeg', '2020-11-19 22:21:45', '2020-11-25 09:38:00'),
(3, 'We work for your success in real', 'Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis.', 'Read More', '#', 'slider-3.jpeg', '2020-11-19 22:22:04', '2020-11-25 09:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `social_media_items`
--

CREATE TABLE `social_media_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_order` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media_items`
--

INSERT INTO `social_media_items` (`id`, `social_url`, `social_icon`, `social_order`, `created_at`, `updated_at`) VALUES
(2, '#', 'fab fa-twitter', 2, '2020-11-24 18:54:56', '2020-11-24 19:07:08'),
(4, '#', 'fab fa-facebook-f', 1, '2020-11-24 18:56:23', '2020-11-25 03:04:07'),
(5, '#', 'fab fa-linkedin-in', 3, '2020-11-24 19:07:28', '2020-11-24 19:08:35'),
(6, '#', 'fab fa-pinterest-p', 4, '2020-11-24 19:07:41', '2020-11-24 19:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subs_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subs_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subs_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_youtube` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `slug`, `designation`, `degree`, `detail`, `facebook`, `twitter`, `linkedin`, `youtube`, `instagram`, `email`, `phone`, `website`, `address`, `video_youtube`, `photo`, `seo_title`, `seo_meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Brent Grundy', 'brent-grundy', 'Founder', '<p>Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.</p><p>Eam sint reformidans ex, ex doming iracundia his. Sint modus pro ne, vix ut omnis scripta corpora. Sea graecis suavitate te. Eum tantas possim torquatos ei. An qui falli sadipscing suscipiantur. At congue forensibus constituto his, erat vidit veniam vis eu, dico soleat possim nec ei.</p><p>Cu modo adipisci sea. At clita doctus sit. Pri ex solet deterruisset, falli harum fuisset qui ei, an commune delicata patrioque sit. Fabulas adversarium no sea, at quis disputando pri, meis epicurei eloquentiam vix ad. An consulatu sententiae posidonium his, te elaboraret cotidieque eos, sed an illud recteque.</p><p>Eu per altera aliquam consulatu, ea pro nulla doctus. Sea porro everti an, nostrud ceteros nam no. Ei quando qualisque his, alterum ocurreret nec eu, dolorum deseruisse ad mel. Nam vidit omnis ad, pro eu veniam efficiendi, sea an iriure vivendo appetere. Usu ad latine vocibus voluptatum.</p><p>Et bonorum consetetur mediocritatem qui, cu est omnis persequeris, mea te doctus incorrupte. Vix et tale justo. Vel te lorem sapientem interesset. Ne ius tantas saperet officiis, volutpat adolescens ut sea, an animal consectetuer vis. Nonumy ornatus constituam vis ne, cum ne vidisse patrioque.</p>', '<p>Fugit contentiones id nam, noster percipit ne mei. Duo no modo tempor, per ea quaeque commune complectitur, sed ex alia utamur apeirian. Est id solum dicant ceteros. Quem omnium dignissim in vim, sea nihil expetenda id, molestiae definitionem ad pri.</p><p>Id per esse iudicabit expetendis, ne qui legimus accusata corrumpit. Ei has duis corrumpit, facilisis accommodare te nec. Ne usu molestiae voluptatum mediocritatem, tota percipitur ut qui. Ne modo idque feugait vel. Postea epicuri mei te. Ad tollit qualisque dignissim per, eu purto virtute fabulas his.</p><p>Viris ignota vim et. Ea idque etiam liberavisse has. Ex mel lorem voluptatibus, sed vero accusata no. Ad pri utinam praesent, usu iuvaret adipisci contentiones an. Eum falli fabellas ut, usu te putent posidonium.</p><p>Ei cum elit fuisset, ad tota assueverit scriptorem qui, pro ex utamur recteque incorrupte. Has iisque consectetuer eu. Malis doming eirmod id his, te mea novum offendit. Ea minim doming evertitur eum, latine neglegentur no nec. Ea pro putant perpetua interpretaris. Mea ne noster aliquando constituam, iudico discere neglegentur vel cu, mandamus corrumpit duo ne.</p>', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.linkedin.com', 'http://www.youtube.com', 'http://www.instagram.com', 'info@yourwebsite1.com', '111-222-3333', 'http://www.yourwebsite1.com', '4008 Ocala Street\r\nOrlando, FL 32809', '12oynGTjYKs', 'team-member-1.jpeg', 'Brent Grundy', 'Brent Grundy', '2020-11-23 10:53:34', '2020-11-23 10:53:34'),
(2, 'Robin Cook', 'robin-cook', 'Chairman', '<p>Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.<br></p><p>Eam sint reformidans ex, ex doming iracundia his. Sint modus pro ne, vix ut omnis scripta corpora. Sea graecis suavitate te. Eum tantas possim torquatos ei. An qui falli sadipscing suscipiantur. At congue forensibus constituto his, erat vidit veniam vis eu, dico soleat possim nec ei.</p><p>Cu modo adipisci sea. At clita doctus sit. Pri ex solet deterruisset, falli harum fuisset qui ei, an commune delicata patrioque sit. Fabulas adversarium no sea, at quis disputando pri, meis epicurei eloquentiam vix ad. An consulatu sententiae posidonium his, te elaboraret cotidieque eos, sed an illud recteque.</p><p>Eu per altera aliquam consulatu, ea pro nulla doctus. Sea porro everti an, nostrud ceteros nam no. Ei quando qualisque his, alterum ocurreret nec eu, dolorum deseruisse ad mel. Nam vidit omnis ad, pro eu veniam efficiendi, sea an iriure vivendo appetere. Usu ad latine vocibus voluptatum.</p><p>Et bonorum consetetur mediocritatem qui, cu est omnis persequeris, mea te doctus incorrupte. Vix et tale justo. Vel te lorem sapientem interesset. Ne ius tantas saperet officiis, volutpat adolescens ut sea, an animal consectetuer vis. Nonumy ornatus constituam vis ne, cum ne vidisse patrioque.</p>', '<p>Fugit contentiones id nam, noster percipit ne mei. Duo no modo tempor, per ea quaeque commune complectitur, sed ex alia utamur apeirian. Est id solum dicant ceteros. Quem omnium dignissim in vim, sea nihil expetenda id, molestiae definitionem ad pri.<br></p><p>Id per esse iudicabit expetendis, ne qui legimus accusata corrumpit. Ei has duis corrumpit, facilisis accommodare te nec. Ne usu molestiae voluptatum mediocritatem, tota percipitur ut qui. Ne modo idque feugait vel. Postea epicuri mei te. Ad tollit qualisque dignissim per, eu purto virtute fabulas his.<br></p><p>Viris ignota vim et. Ea idque etiam liberavisse has. Ex mel lorem voluptatibus, sed vero accusata no. Ad pri utinam praesent, usu iuvaret adipisci contentiones an. Eum falli fabellas ut, usu te putent posidonium.</p><p>Ei cum elit fuisset, ad tota assueverit scriptorem qui, pro ex utamur recteque incorrupte. Has iisque consectetuer eu. Malis doming eirmod id his, te mea novum offendit. Ea minim doming evertitur eum, latine neglegentur no nec. Ea pro putant perpetua interpretaris. Mea ne noster aliquando constituam, iudico discere neglegentur vel cu, mandamus corrumpit duo ne.</p>', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.linkedin.com', NULL, NULL, 'robincook@gmail.com', '111-222-3334', 'http://www.website2.com', '4008 Ocala Street\r\nOrlando, FL 32809', 'ez-M8wHX4Wk', 'team-member-2.jpg', 'Robin Cook', 'Robin Cook', '2020-12-13 03:28:29', '2020-12-13 03:28:29'),
(3, 'Bob Smith', 'bob-smith', 'Executive Office', '<p>Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.<br></p><p>Eam sint reformidans ex, ex doming iracundia his. Sint modus pro ne, vix ut omnis scripta corpora. Sea graecis suavitate te. Eum tantas possim torquatos ei. An qui falli sadipscing suscipiantur. At congue forensibus constituto his, erat vidit veniam vis eu, dico soleat possim nec ei.</p><p>Cu modo adipisci sea. At clita doctus sit. Pri ex solet deterruisset, falli harum fuisset qui ei, an commune delicata patrioque sit. Fabulas adversarium no sea, at quis disputando pri, meis epicurei eloquentiam vix ad. An consulatu sententiae posidonium his, te elaboraret cotidieque eos, sed an illud recteque.</p><p>Eu per altera aliquam consulatu, ea pro nulla doctus. Sea porro everti an, nostrud ceteros nam no. Ei quando qualisque his, alterum ocurreret nec eu, dolorum deseruisse ad mel. Nam vidit omnis ad, pro eu veniam efficiendi, sea an iriure vivendo appetere. Usu ad latine vocibus voluptatum.</p><p>Et bonorum consetetur mediocritatem qui, cu est omnis persequeris, mea te doctus incorrupte. Vix et tale justo. Vel te lorem sapientem interesset. Ne ius tantas saperet officiis, volutpat adolescens ut sea, an animal consectetuer vis. Nonumy ornatus constituam vis ne, cum ne vidisse patrioque.</p>', '<p>Fugit contentiones id nam, noster percipit ne mei. Duo no modo tempor, per ea quaeque commune complectitur, sed ex alia utamur apeirian. Est id solum dicant ceteros. Quem omnium dignissim in vim, sea nihil expetenda id, molestiae definitionem ad pri.<br></p><p>Id per esse iudicabit expetendis, ne qui legimus accusata corrumpit. Ei has duis corrumpit, facilisis accommodare te nec. Ne usu molestiae voluptatum mediocritatem, tota percipitur ut qui. Ne modo idque feugait vel. Postea epicuri mei te. Ad tollit qualisque dignissim per, eu purto virtute fabulas his.</p><p>Viris ignota vim et. Ea idque etiam liberavisse has. Ex mel lorem voluptatibus, sed vero accusata no. Ad pri utinam praesent, usu iuvaret adipisci contentiones an. Eum falli fabellas ut, usu te putent posidonium.</p><p>Ei cum elit fuisset, ad tota assueverit scriptorem qui, pro ex utamur recteque incorrupte. Has iisque consectetuer eu. Malis doming eirmod id his, te mea novum offendit. Ea minim doming evertitur eum, latine neglegentur no nec. Ea pro putant perpetua interpretaris. Mea ne noster aliquando constituam, iudico discere neglegentur vel cu, mandamus corrumpit duo ne.</p>', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.linkedin.com', NULL, NULL, 'bobsmith@gmail.com', '111-222-3338', 'http://www.website3.com', '4008 Ocala Street\r\nOrlando, FL 32809', 'KZxskJojRLY', 'team-member-3.jpg', 'Bob Smith', 'Bob Smith', '2020-12-13 04:24:07', '2020-12-13 04:24:07'),
(4, 'Patrick Henderson', 'patrick-henderson', 'Marketing Officer', '<p>Lorem ipsum dolor sit amet, ea qui tation adversarium definitionem, eu labitur denique est. Ad duo quando recusabo petentium. Mea elit affert oportere ex. Ut error affert accusam pri. Sit no causae vidisse invenire, bonorum inermis nec ex.<br></p><p>Eam sint reformidans ex, ex doming iracundia his. Sint modus pro ne, vix ut omnis scripta corpora. Sea graecis suavitate te. Eum tantas possim torquatos ei. An qui falli sadipscing suscipiantur. At congue forensibus constituto his, erat vidit veniam vis eu, dico soleat possim nec ei.</p><p>Cu modo adipisci sea. At clita doctus sit. Pri ex solet deterruisset, falli harum fuisset qui ei, an commune delicata patrioque sit. Fabulas adversarium no sea, at quis disputando pri, meis epicurei eloquentiam vix ad. An consulatu sententiae posidonium his, te elaboraret cotidieque eos, sed an illud recteque.</p><p>Eu per altera aliquam consulatu, ea pro nulla doctus. Sea porro everti an, nostrud ceteros nam no. Ei quando qualisque his, alterum ocurreret nec eu, dolorum deseruisse ad mel. Nam vidit omnis ad, pro eu veniam efficiendi, sea an iriure vivendo appetere. Usu ad latine vocibus voluptatum.</p><p>Et bonorum consetetur mediocritatem qui, cu est omnis persequeris, mea te doctus incorrupte. Vix et tale justo. Vel te lorem sapientem interesset. Ne ius tantas saperet officiis, volutpat adolescens ut sea, an animal consectetuer vis. Nonumy ornatus constituam vis ne, cum ne vidisse patrioque.</p>', '<p>Fugit contentiones id nam, noster percipit ne mei. Duo no modo tempor, per ea quaeque commune complectitur, sed ex alia utamur apeirian. Est id solum dicant ceteros. Quem omnium dignissim in vim, sea nihil expetenda id, molestiae definitionem ad pri.<br></p><p>Id per esse iudicabit expetendis, ne qui legimus accusata corrumpit. Ei has duis corrumpit, facilisis accommodare te nec. Ne usu molestiae voluptatum mediocritatem, tota percipitur ut qui. Ne modo idque feugait vel. Postea epicuri mei te. Ad tollit qualisque dignissim per, eu purto virtute fabulas his.</p><p>Viris ignota vim et. Ea idque etiam liberavisse has. Ex mel lorem voluptatibus, sed vero accusata no. Ad pri utinam praesent, usu iuvaret adipisci contentiones an. Eum falli fabellas ut, usu te putent posidonium.</p><p>Ei cum elit fuisset, ad tota assueverit scriptorem qui, pro ex utamur recteque incorrupte. Has iisque consectetuer eu. Malis doming eirmod id his, te mea novum offendit. Ea minim doming evertitur eum, latine neglegentur no nec. Ea pro putant perpetua interpretaris. Mea ne noster aliquando constituam, iudico discere neglegentur vel cu, mandamus corrumpit duo ne.</p>', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.linkedin.com', NULL, NULL, 'patrickhenderson@gmail.com', '111-222-3839', 'http://www.website4.com', '4008 Ocala Street\r\nOrlando, FL 32809', 'FbYrGaoWIec', 'team-member-4.jpg', 'Patrick Henderson', 'Patrick Henderson', '2020-12-13 04:26:08', '2020-12-13 04:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `photo`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'Managing Director, ABC Media', 'testimonial-1.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2020-11-23 01:11:54', '2020-11-23 01:13:39'),
(2, 'Dadiv Smith', 'CEO, XYZ Technologies', 'testimonial-2.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2020-11-23 01:12:35', '2020-11-23 01:13:44'),
(3, 'Stefen Carman', 'Chairman, ZZ Corporation', 'testimonial-3.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '2020-11-23 01:12:54', '2020-11-23 01:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_youtube` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_caption` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_order` smallint(6) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_youtube`, `video_caption`, `video_order`, `created_at`, `updated_at`) VALUES
(1, 'MFptcZb4YwM', 'Caption 2', 2, '2020-11-22 21:08:21', '2020-11-22 21:13:39'),
(2, 'al-KfXBK1E0', 'Caption 1', 1, '2020-11-22 21:08:36', '2020-11-22 21:13:07'),
(3, 'JiR7cr3cljU', 'Caption 3', 3, '2020-11-22 21:13:58', '2020-11-22 21:13:58'),
(4, 'O7QtDOZuwfc', 'Caption 4', 4, '2020-11-22 21:14:42', '2020-11-22 21:14:42'),
(5, '5Lc91smOaoY', 'Caption 5', 5, '2020-11-22 21:15:02', '2020-11-22 21:15:02'),
(6, 'UDqR6gnuemw', 'Caption 6', 6, '2020-11-22 21:15:23', '2020-11-22 21:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_items`
--

CREATE TABLE `why_choose_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `why_choose_items`
--

INSERT INTO `why_choose_items` (`id`, `name`, `description`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Quick Support', 'Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has.', 'why-choose-1.png', '2020-11-22 23:10:36', '2020-11-25 09:46:10'),
(2, 'Quality Service', 'Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has.', 'why-choose-2.png', '2020-11-22 23:12:59', '2020-11-22 23:12:59'),
(3, 'Modern Technology', 'Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has.', 'why-choose-3.png', '2020-11-22 23:13:16', '2020-11-22 23:13:16'),
(4, 'Best Communication', 'Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has.', 'why-choose-4.png', '2020-11-22 23:13:32', '2020-11-22 23:13:32'),
(5, '100% Satisfaction', 'Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has.', 'why-choose-5.png', '2020-11-22 23:13:47', '2020-11-22 23:13:47'),
(6, 'Security Protection', 'Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has.', 'why-choose-6.png', '2020-11-22 23:14:10', '2020-11-22 23:14:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dynamic_pages`
--
ALTER TABLE `dynamic_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_columns`
--
ALTER TABLE `footer_columns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_about_items`
--
ALTER TABLE `page_about_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_blog_items`
--
ALTER TABLE `page_blog_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_career_items`
--
ALTER TABLE `page_career_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_contact_items`
--
ALTER TABLE `page_contact_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_faq_items`
--
ALTER TABLE `page_faq_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_home_items`
--
ALTER TABLE `page_home_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_other_items`
--
ALTER TABLE `page_other_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_photo_gallery_items`
--
ALTER TABLE `page_photo_gallery_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_privacy_items`
--
ALTER TABLE `page_privacy_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_project_items`
--
ALTER TABLE `page_project_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_service_items`
--
ALTER TABLE `page_service_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_shop_items`
--
ALTER TABLE `page_shop_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_team_items`
--
ALTER TABLE `page_team_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_term_items`
--
ALTER TABLE `page_term_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_video_gallery_items`
--
ALTER TABLE `page_video_gallery_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_photos`
--
ALTER TABLE `project_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media_items`
--
ALTER TABLE `social_media_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_choose_items`
--
ALTER TABLE `why_choose_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dynamic_pages`
--
ALTER TABLE `dynamic_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `footer_columns`
--
ALTER TABLE `footer_columns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `page_about_items`
--
ALTER TABLE `page_about_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_blog_items`
--
ALTER TABLE `page_blog_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_career_items`
--
ALTER TABLE `page_career_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_contact_items`
--
ALTER TABLE `page_contact_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_faq_items`
--
ALTER TABLE `page_faq_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_home_items`
--
ALTER TABLE `page_home_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_other_items`
--
ALTER TABLE `page_other_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `page_photo_gallery_items`
--
ALTER TABLE `page_photo_gallery_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_privacy_items`
--
ALTER TABLE `page_privacy_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_project_items`
--
ALTER TABLE `page_project_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_service_items`
--
ALTER TABLE `page_service_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_shop_items`
--
ALTER TABLE `page_shop_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_team_items`
--
ALTER TABLE `page_team_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_term_items`
--
ALTER TABLE `page_term_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_video_gallery_items`
--
ALTER TABLE `page_video_gallery_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_photos`
--
ALTER TABLE `project_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `social_media_items`
--
ALTER TABLE `social_media_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `why_choose_items`
--
ALTER TABLE `why_choose_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
