-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 05:04 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 1, 1, NULL, '2020-05-19 22:05:54', '2020-05-19 22:05:54'),
(2, 'Cement', 1, 1, 1, '2020-05-19 22:06:12', '2020-05-27 22:02:02'),
(3, 'Accessories', 1, 1, NULL, '2021-01-28 23:19:43', '2021-01-28 23:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `mobile_no`, `email`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Md. Aslam', '01710659888', 'aslam@gmail.com', 'Chittagong', 1, 1, NULL, '2020-05-14 05:13:00', '2020-05-14 05:13:00'),
(2, 'Rony', '01710659888', 'rony@gmail.com', 'Rupatoly', 1, NULL, 1, '2020-06-06 08:06:46', '2020-06-19 10:53:06'),
(3, 'Mita', '01710659888', 'mita@gmail.com', 'khulna', 1, NULL, 1, '2020-06-19 11:19:23', '2020-06-24 00:25:13'),
(4, 'Faijul', '01789382733', 'faijul@gmail.com', 'Rupatoly', 1, NULL, 1, '2021-02-10 09:40:34', '2021-02-13 11:05:01');

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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending,1=Approved',
  `created_by` int(11) DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `date`, `description`, `status`, `created_by`, `approved_by`, `created_at`, `updated_at`) VALUES
(27, '1', '2020-06-10', 'Good.....', 1, 1, 1, '2020-06-19 11:19:23', '2020-06-19 11:21:04'),
(28, '2', '2020-06-12', 'Good', 1, 1, 1, '2020-06-19 11:22:42', '2020-06-19 11:22:55'),
(29, '3', '2020-06-15', 'Good...', 1, 1, 1, '2020-06-19 11:24:27', '2020-06-19 11:24:35'),
(34, '4', '2021-02-10', 'Thanks for buying....', 1, 1, 1, '2021-02-10 14:46:31', '2021-02-11 08:11:37'),
(36, '5', '2021-02-11', 'See you...', 1, 1, 1, '2021-02-11 08:47:54', '2021-02-11 08:47:54'),
(37, '6', '2021-02-11', 'afsdgh', 1, 1, 1, '2021-02-11 09:27:41', '2021-02-11 09:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `invoice_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `selling_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `date`, `invoice_id`, `category_id`, `product_id`, `selling_qty`, `unit_price`, `selling_price`, `status`, `created_at`, `updated_at`) VALUES
(36, '2020-06-10', 27, 1, 1, 10, 1500, 15000, 1, '2020-06-19 11:19:23', '2020-06-19 11:21:04'),
(37, '2020-06-10', 27, 1, 3, 10, 25000, 250000, 1, '2020-06-19 11:19:23', '2020-06-19 11:21:04'),
(38, '2020-06-12', 28, 2, 4, 10, 420, 4200, 1, '2020-06-19 11:22:42', '2020-06-19 11:22:55'),
(39, '2020-06-12', 28, 2, 5, 10, 420, 4200, 1, '2020-06-19 11:22:42', '2020-06-19 11:22:55'),
(40, '2020-06-15', 29, 1, 6, 5, 1100, 5500, 1, '2020-06-19 11:24:27', '2020-06-19 11:24:35'),
(41, '2020-06-15', 29, 1, 7, 5, 1000, 5000, 1, '2020-06-19 11:24:27', '2020-06-19 11:24:35'),
(48, '2021-02-10', 34, 1, 8, 2, 22000, 44000, 1, '2021-02-10 14:46:31', '2021-02-11 08:11:36'),
(50, '2021-02-11', 36, 1, 8, 2, 20000, 40000, 1, '2021-02-11 08:47:54', '2021-02-11 08:47:54'),
(51, '2021-02-11', 36, 1, 7, 5, 1500, 7500, 1, '2021-02-11 08:47:54', '2021-02-11 08:47:54'),
(52, '2021-02-11', 37, 1, 8, 2, 1000, 2000, 1, '2021-02-11 09:27:41', '2021-02-11 09:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2014_10_12_000000_create_users_table', 2),
(5, '2020_05_09_164148_create_suppliers_table', 3),
(6, '2020_05_14_105704_create_customers_table', 4),
(7, '2020_05_14_112239_create_units_table', 5),
(10, '2020_05_15_012020_create_categories_table', 6),
(11, '2020_05_15_015512_create_products_table', 7),
(12, '2020_05_25_140530_create_purchases_table', 8),
(13, '2020_06_03_172259_create_invoices_table', 9),
(14, '2020_06_03_172800_create_invoice_details_table', 9),
(15, '2020_06_03_172822_create_payments_table', 9),
(16, '2020_06_03_172848_create_payment_details_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `paid_status` varchar(51) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `due_amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `invoice_id`, `customer_id`, `paid_status`, `paid_amount`, `due_amount`, `total_amount`, `discount_amount`, `created_at`, `updated_at`) VALUES
(27, 27, 3, 'full_paid', 264500, 0, 264500, 500, '2020-06-19 11:19:24', '2020-06-19 11:19:24'),
(28, 28, 2, 'full_paid', 8300, 0, 8300, 100, '2020-06-19 11:22:42', '2020-06-19 22:59:21'),
(29, 29, 1, 'partial_paid', 7000, 3000, 10000, 500, '2020-06-19 11:24:27', '2020-06-24 01:08:41'),
(30, 30, 3, 'full_paid', 200000, 0, 200000, 0, '2020-06-23 22:06:43', '2020-06-24 00:59:11'),
(34, 34, 3, 'full_paid', 40000, 0, 40000, 4000, '2021-02-10 14:46:31', '2021-02-10 14:46:31'),
(36, 36, 3, 'full_paid', 40000, 0, 40000, 7500, '2021-02-11 08:47:54', '2021-02-11 08:47:54'),
(37, 37, 1, 'full_paid', 1900, 0, 1900, 100, '2021-02-11 09:27:41', '2021-02-11 09:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `current_paid_amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `invoice_id`, `current_paid_amount`, `date`, `updated_by`, `created_at`, `updated_at`) VALUES
(27, 27, 264500, '2020-06-10', NULL, '2020-06-19 11:19:24', '2020-06-19 11:19:24'),
(29, 29, 5000, '2020-06-15', NULL, '2020-06-19 11:24:27', '2020-06-19 11:24:27'),
(30, 28, 8300, '2020-06-12', NULL, '2020-06-19 22:55:41', '2020-06-19 22:55:41'),
(33, 30, 100000, '2020-06-24', NULL, '2020-06-24 00:56:27', '2020-06-24 00:56:27'),
(34, 30, 100000, '2020-06-25', NULL, '2020-06-24 00:59:11', '2020-06-24 00:59:11'),
(35, 29, 1000, '2020-06-24', NULL, '2020-06-24 01:02:00', '2020-06-24 01:02:00'),
(36, 29, 1000, '2020-06-26', NULL, '2020-06-24 01:08:41', '2020-06-24 01:08:41'),
(40, 34, 40000, '2021-02-10', NULL, '2021-02-10 14:46:31', '2021-02-10 14:46:31'),
(42, 36, 40000, '2021-02-11', NULL, '2021-02-11 08:47:54', '2021-02-11 08:47:54'),
(43, 37, 1900, '2021-02-11', NULL, '2021-02-11 09:27:41', '2021-02-11 09:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `supplier_id`, `unit_id`, `category_id`, `name`, `quantity`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Walton Mobile 1042', 90, 1, 1, 1, '2020-05-19 23:36:37', '2020-06-19 11:21:04'),
(3, 2, 1, 1, 'Samsung Phone A50', 140, 1, 1, 1, '2020-05-20 07:59:13', '2020-06-19 11:21:04'),
(4, 3, 1, 2, 'Holcim Cement', 490, 1, 1, NULL, '2020-05-27 22:04:07', '2020-06-19 11:22:55'),
(5, 3, 1, 2, 'Bosundhara Cement', 490, 1, 1, NULL, '2020-05-27 22:05:10', '2020-06-19 11:22:55'),
(6, 1, 1, 3, 'Walton Mobile 500', 45, 1, 1, NULL, '2020-05-27 22:05:44', '2020-06-19 11:24:35'),
(7, 1, 1, 1, 'Walton Mobile 360', 40, 1, 1, NULL, '2020-05-27 22:06:16', '2020-06-19 11:24:35'),
(8, 1, 1, 1, 'Walton A50S', 4, 1, 1, NULL, '2021-02-08 01:01:04', '2021-02-11 08:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buying_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `buying_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending,1=Approved',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplier_id`, `category_id`, `product_id`, `purchase_no`, `date`, `description`, `buying_qty`, `unit_price`, `buying_price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(17, 1, 1, 1, 'p-1', '2020-06-01', 'Enough Good', 50, 1200, 60000, 1, 1, NULL, '2020-06-19 11:08:39', '2020-06-19 11:08:39'),
(18, 1, 1, 6, 'p-1', '2020-06-01', 'Enough Good', 50, 1000, 50000, 1, 1, NULL, '2020-06-19 11:08:39', '2020-06-19 11:08:39'),
(19, 1, 1, 7, 'p-1', '2020-06-01', 'Enough Good', 50, 900, 45000, 1, 1, NULL, '2020-06-19 11:08:39', '2020-06-19 11:08:39'),
(20, 2, 1, 3, 'p-2', '2020-06-02', 'Enough Good', 100, 20000, 2000000, 1, 1, NULL, '2020-06-19 11:09:35', '2020-06-19 11:09:35'),
(21, 3, 2, 4, 'p-3', '2020-06-03', 'Enough Good', 500, 410, 205000, 1, 1, NULL, '2020-06-19 11:10:35', '2020-06-19 11:10:35'),
(22, 3, 2, 5, 'p-3', '2020-06-03', 'Enough Good', 500, 420, 210000, 1, 1, NULL, '2020-06-19 11:10:35', '2020-06-19 11:10:35'),
(23, 1, 1, 1, 'p-4', '2020-06-04', 'Enough Good', 50, 1200, 60000, 1, 1, NULL, '2020-06-19 11:14:12', '2020-06-19 11:14:12'),
(24, 2, 1, 3, 'p-4', '2020-06-04', 'Enough Good', 50, 20000, 1000000, 1, 1, NULL, '2020-06-19 11:14:12', '2020-06-19 11:14:12'),
(25, 1, 1, 8, 'p-8', '2021-02-08', 'Better Quality', 10, 10000, 100000, 1, 1, NULL, '2021-02-08 01:13:59', '2021-02-08 01:13:59');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `mobile_no`, `email`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Walton Company', '01710659888', 'walton@gmail.com', 'Dhaka', 1, 1, 1, '2020-05-09 11:37:32', '2020-05-09 11:43:00'),
(2, 'Samsung', '01710659888', 'samsung@gmail.com', 'Chittagong', 1, 1, NULL, '2020-05-11 08:06:54', '2020-05-11 08:06:54'),
(3, 'KSRM Road', '01915867739', 'ksrm@gmail.com', 'khulna', 1, 1, 1, '2020-05-11 08:14:59', '2020-05-27 22:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'PCS', 1, 1, NULL, '2020-05-14 08:20:08', '2020-05-14 08:20:08'),
(3, 'KG', 1, 1, NULL, '2020-05-14 08:21:25', '2020-05-14 08:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'khalid', 'khalidbucse02@gmail.com', NULL, '$2y$10$tFmxArMPd92Na3Qu93WPd.CSTqo2i3bhNfQ/ArVVBzFHH69G1euqG', '01710659888', NULL, 'Male', '202005090439user.png', 1, NULL, NULL, '2021-02-07 13:43:00'),
(2, 'User', 'Rony', 'rony@gmail.com', NULL, '$2y$10$ar8KPLQ3iivI427kM5hp6.TXi0rwnvGESXN26.T3brgAalrE7iCVS', NULL, NULL, NULL, NULL, 1, NULL, '2020-05-08 09:26:56', '2020-05-09 00:10:13'),
(3, 'Admin', 'Mita', 'mita@gmail.com', NULL, '$2y$10$Rvyqf1GHucHeQNpL3rOaAeX2eNoUmTEw1lrZGm7fmnmJocL9KrJEu', NULL, NULL, NULL, NULL, 1, NULL, '2020-05-08 09:29:38', '2020-05-09 09:21:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`supplier_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_supplier_id_foreign` (`supplier_id`),
  ADD KEY `purchases_category_id_foreign` (`category_id`),
  ADD KEY `purchases_product_id_foreign` (`product_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `unit_id` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchases_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
