-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2025 at 02:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `construction_depot_lim_try`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` text NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `user_id`, `action`, `ip_address`, `user_agent`, `created_at`) VALUES
(1, NULL, 'User registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 00:19:37'),
(2, NULL, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 00:20:31'),
(3, NULL, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 00:20:43'),
(4, NULL, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 02:11:59'),
(5, NULL, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 05:45:05'),
(6, NULL, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 11:13:10'),
(7, NULL, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 04:55:24'),
(8, NULL, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 02:21:29'),
(9, NULL, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 02:21:39'),
(10, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 02:21:44'),
(11, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 02:21:58'),
(12, NULL, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 02:22:15'),
(13, NULL, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 05:21:32'),
(14, NULL, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 10:30:29'),
(15, NULL, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 11:09:41'),
(16, NULL, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 11:10:47'),
(17, NULL, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 11:10:53'),
(18, 2, 'User registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 11:11:26'),
(19, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 11:12:04'),
(20, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 11:13:09'),
(21, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 11:16:21'),
(22, NULL, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 11:16:37'),
(23, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:19:31'),
(24, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:22:35'),
(25, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:23:11'),
(26, NULL, 'Failed login attempt for email: chandyneat9@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:25:34'),
(27, NULL, 'Failed login attempt for email: chandyneat9@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:28:14'),
(28, NULL, 'Failed login attempt for email: chandyneat9@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:28:21'),
(29, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:28:33'),
(30, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:29:06'),
(31, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:29:09'),
(32, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:29:11'),
(33, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:29:12'),
(34, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:29:56'),
(35, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:33:11'),
(36, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:37:09'),
(37, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:37:16'),
(38, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:43:05'),
(39, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:43:10'),
(40, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:43:12'),
(41, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:43:13'),
(42, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:43:54'),
(43, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:46:49'),
(44, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:46:54'),
(45, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:47:37'),
(46, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:47:42'),
(47, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:56:43'),
(48, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:58:17'),
(49, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 02:58:24'),
(50, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 03:00:16'),
(51, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 03:00:20'),
(52, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 03:00:30'),
(53, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 03:03:47'),
(54, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 03:03:54'),
(55, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 03:04:56'),
(56, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 03:06:35'),
(57, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 03:06:43'),
(58, NULL, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:09:24'),
(59, NULL, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:12:27'),
(60, NULL, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:12:57'),
(61, NULL, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:14:00'),
(62, NULL, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:14:08'),
(63, NULL, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:16:19'),
(64, NULL, 'Failed login attempt for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:18:55'),
(65, NULL, 'Failed login attempt for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:18:59'),
(66, NULL, 'Failed login attempt for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:20:55'),
(67, NULL, 'Failed login attempt for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:21:02'),
(68, NULL, 'Failed login attempt for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:21:10'),
(69, NULL, 'Failed login attempt for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:22:27'),
(70, NULL, 'Failed login attempt for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:22:42'),
(71, NULL, 'Failed login attempt for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:24:48'),
(72, NULL, 'Failed login attempt for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:24:56'),
(73, NULL, 'Failed login attempt for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:46:56'),
(74, NULL, 'Failed login attempt for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:47:08'),
(75, NULL, 'Failed login attempt for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:47:18'),
(76, NULL, 'Failed login attempt for email: chandyneat876@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:47:34'),
(77, NULL, 'Failed login attempt for email: chandyneat876@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:47:46'),
(78, NULL, 'Failed login attempt for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:49:13'),
(79, NULL, 'Failed login attempt for email: chandyneat09@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:49:31'),
(80, NULL, 'Failed login attempt for email: chandyneat876@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:53:18'),
(81, NULL, 'Failed login attempt for email: chandyneat67@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:53:34'),
(82, NULL, 'Failed login attempt for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:53:47'),
(83, NULL, 'Failed login (wrong password) for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:58:31'),
(84, NULL, 'Failed login (wrong password) for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:58:42'),
(85, NULL, 'Failed login (wrong email) for email: chandyneat990@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:59:00'),
(86, NULL, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:59:22'),
(87, NULL, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:59:25'),
(88, NULL, 'Failed login (wrong email) for email: senghin@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:59:35'),
(89, NULL, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 05:59:51'),
(90, NULL, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 06:00:53'),
(91, NULL, 'Failed login (wrong password) for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 06:03:28'),
(92, NULL, 'Failed login (wrong email) for email: chandyneat@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 06:03:41'),
(93, NULL, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 06:04:01'),
(94, NULL, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 06:04:14'),
(95, NULL, 'Failed login (wrong password) for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 06:11:38'),
(96, NULL, 'Failed login (wrong password) for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 06:11:49'),
(97, NULL, 'Failed login (wrong password) for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 06:12:37'),
(98, NULL, 'Failed login (wrong password) for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 06:13:08'),
(99, NULL, 'Failed login (wrong password) for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 06:13:16'),
(100, NULL, 'Failed login (wrong password) for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 06:13:25'),
(101, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 06:18:33'),
(102, 2, 'User requested reset, but email not found.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 06:25:24'),
(103, 2, 'User requested reset, but email not found.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 06:25:27'),
(104, NULL, 'Failed login (wrong email) for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 13:01:58'),
(105, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 13:02:14'),
(106, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 13:28:03'),
(107, NULL, 'Failed login (wrong email) for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 13:28:46'),
(108, NULL, 'Failed login (wrong password) for email: sophean.phouk@example.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 13:35:04'),
(109, NULL, 'Failed login (wrong password) for email: sophean.phouk@example.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 13:35:28'),
(110, NULL, 'Failed login (wrong password) for email: sophean.phouk@example.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 13:36:16'),
(111, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-21 13:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`, `Description`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 'Cement & Concrete', 'Cement, concrete mix, ready-mix concrete, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(2, 'Bricks & Blocks', 'Clay bricks, concrete blocks, AAC blocks, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(3, 'Steel & Metal Products', 'Steel rods, beams, pipes, metal sheets, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(4, 'Wood & Timber', 'Plywood, MDF boards, hardwood, softwood, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(5, 'Roofing Materials', 'Roof tiles, metal roofing sheets, shingles, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(6, 'Plumbing Supplies', 'Pipes, fittings, valves, water tanks, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(7, 'Electrical Components', 'Wiring, switches, circuit breakers, transformers, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(8, 'Paint & Finishing', 'Paint, primers, varnishes, wallpapers, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(9, 'Doors & Windows', 'Wooden doors, aluminum windows, glass panels, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(10, 'Flooring & Tiles', 'Ceramic tiles, marble, laminate flooring, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(11, 'Tools & Equipment', 'Power tools, hand tools, safety gear, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(12, 'Insulation & Sealants', 'Foam insulation, waterproofing materials, caulking, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(13, 'Safety & Security', 'Helmets, gloves, safety harnesses, fire extinguishers, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(14, 'Heavy Machinery', 'Excavators, bulldozers, cranes, forklifts, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(15, 'Miscellaneous', 'Adhesives, fasteners, scaffolding, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(16, 'HVAC & Ventilation', 'Air conditioning systems, ducts, vents, exhaust fans, HVAC units, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(17, 'Prefabricated Structures', 'Precast panels, modular homes, portable cabins, prefab steel buildings, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(18, 'Waterproofing & Drainage', 'Waterproof coatings, drainage pipes, sump pumps, moisture barriers, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(19, 'Construction Chemicals', 'Concrete admixtures, curing compounds, anti-rust coatings, epoxy, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(20, 'Landscaping & Outdoor', 'Garden paving, fencing, outdoor lighting, irrigation systems, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(21, 'Structural Reinforcements', 'Rebars, post-tensioning systems, fiber reinforcements, formwork, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(22, 'Glass & Glazing', 'Tempered glass, laminated glass, acrylic sheets, skylights, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(23, 'Smart Building Technologies', 'Home automation, smart locks, IoT sensors, building management systems, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `ContactPerson` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` text NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `Name`, `ContactPerson`, `Phone`, `Email`, `Address`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 'John Doe', 'John Doe', '123-456-7890', 'john.doe@example.com', '1234 Elm Street, Springfield', '2025-03-21 13:53:38', '2025-03-21 13:53:38'),
(2, 'Jane Smith', 'Jane Smith', '987-654-3210', 'jane.smith@example.com', '5678 Oak Avenue, Rivertown', '2025-03-21 13:53:38', '2025-03-21 13:53:38'),
(3, 'Acme Corp.', 'Michael Johnson', '555-123-4567', 'contact@acmecorp.com', '4321 Maple Lane, Business City', '2025-03-21 13:53:38', '2025-03-21 13:53:38'),
(4, 'Tech Solutions', 'Sarah Lee', '666-987-6543', 'sarah.lee@techsol.com', '8765 Pine Road, Tech City', '2025-03-21 13:53:38', '2025-03-21 13:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `MaterialID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `UnitPrice` decimal(10,2) NOT NULL,
  `SupplierID` int(11) NOT NULL,
  `MinStockLevel` int(11) NOT NULL,
  `ReorderLevel` int(11) NOT NULL,
  `UnitOfMeasure` varchar(50) DEFAULT NULL,
  `Size` varchar(100) DEFAULT NULL,
  `ImagePath` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `UpdatedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Brand` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `SupplierContact` varchar(255) DEFAULT NULL,
  `Status` enum('Active','Inactive','Discontinued','Pending') DEFAULT 'Active',
  `WarrantyPeriod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`MaterialID`, `Name`, `CategoryID`, `Quantity`, `UnitPrice`, `SupplierID`, `MinStockLevel`, `ReorderLevel`, `UnitOfMeasure`, `Size`, `ImagePath`, `Description`, `CreatedAt`, `UpdatedAt`, `Brand`, `Location`, `SupplierContact`, `Status`, `WarrantyPeriod`) VALUES
(1, 'Fan', 1, 70, 5.99, 2, 2, 7, 'kg', 'm', NULL, 'jhjhttr', '2025-03-18 17:48:45', '2025-03-18 17:48:45', 'K cement', 'Phnom penh', '07654352424', '', 2),
(2, 'Fan', 1, 70, 5.99, 2, 2, 7, 'kg', 'm', NULL, 'jhjhttr', '2025-03-18 17:49:22', '2025-03-18 17:49:22', 'K cement', 'Phnom penh', '07654352424', '', 2),
(3, 'Fan', 2, 0, 9.99, 1, 3, 6, 'kg', 'm3', NULL, 'gddddf', '2025-03-18 18:05:14', '2025-03-20 19:08:36', 'K cement', 'Phnom penh', '07654352424', '', 2),
(4, 'Fan', 1, 3, 5.89, 1, 3, 6, 'kg', 'm3', NULL, 'hdhdgsg', '2025-03-18 18:12:19', '2025-03-20 19:17:32', 'K cement', 'Phnom penh', '07654352424', '', 2),
(5, 'Fan', 1, 90, 5.89, 1, 3, 6, 'kg', 'm3', NULL, 'hdhdgsg', '2025-03-18 18:12:54', '2025-03-18 18:12:54', 'K cement', 'Phnom penh', '07654352424', '', 2),
(6, 'lymeng', 1, 90, 5.88, 3, 2, 6, 'kg', 'kg', NULL, 'man', '2025-03-18 18:26:43', '2025-03-18 18:26:43', 'K cementmong', 'Phnom penh', '07654352486', '', 1),
(7, 'chandy_neat', 1, 67, 5.99, 1, 2, 6, 'Bav', 'kg', NULL, 'nnnnnnbb', '2025-03-18 19:02:07', '2025-03-18 19:02:07', 'K cementmong', 'Phnom penh', '07654352486', '', 2),
(8, 'chandy_neat', 1, 67, 5.99, 1, 2, 6, 'Bav', 'kg', NULL, 'nnnnnnbb', '2025-03-18 19:06:38', '2025-03-18 19:06:38', 'K cementmong', 'Phnom penh', '07654352486', '', 2),
(9, 'lymeng', 19, 90, 7.99, 2, 3, 9, 'Bav', 'kg', NULL, 'hdhfdhdh', '2025-03-18 19:42:44', '2025-03-18 19:42:44', 'K cementmong', 'Phnom penh', '07654352409', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `expiration` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `user_id`, `email`, `token`, `expiration`, `created_at`) VALUES
(4, 3, 'sophean.phouk@example.com', '0b731cbb2fb8f6c6d4ec8a1429717e0c', '2025-03-21 15:34:30', '2025-03-21 13:34:30'),
(5, 3, 'sophean.phouk@example.com', '7a0f92ec51079d3f9389ec0af53e525e', '2025-03-21 15:35:36', '2025-03-21 13:35:36');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Has full access to the system, can manage all data.', '2025-01-01 02:00:00', '2025-03-20 03:00:00'),
(2, 'Manager', 'Can manage inventory, suppliers, and sales orders.', '2025-02-01 03:30:00', '2025-03-20 04:15:00'),
(3, 'Employee', 'Can update work logs and view sales and inventory.', '2025-03-01 07:00:00', '2025-03-20 05:00:00'),
(4, 'Sales', 'Can only view and manage sales-related information.', '2025-03-05 01:30:00', '2025-03-20 06:30:00'),
(5, 'Inventory Staff', 'Manages inventory stock levels and warehouse data.', '2025-03-10 09:45:00', '2025-03-20 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `SupplierID` int(11) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `ContactPerson` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`SupplierID`, `Name`, `ContactPerson`, `Phone`, `Email`, `Address`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 'BuildMaster Supplies Co.', 'John Carter', '09123456789', 'john@buildmaster.com', '123 Industrial Zone, Metro City', '2025-03-18 00:13:58', '2025-03-18 00:13:58'),
(2, 'Concrete Plus Ltd.', 'Maria Gonzales', '09234567890', 'maria@concreteplus.com', '456 Cement Road, Capital Town', '2025-03-18 00:13:58', '2025-03-18 00:13:58'),
(3, 'SteelStrong Corp.', 'Alex Tan', '09345678901', 'alex@steelstrong.com', '789 Steel Avenue, Iron District', '2025-03-18 00:13:58', '2025-03-18 00:13:58'),
(4, 'TimberTrade Inc.', 'Lucy Reyes', '09456789012', 'lucy@timbertrade.com', '101 Wood Street, Forest Park', '2025-03-18 00:13:58', '2025-03-18 00:13:58'),
(5, 'RoofTop Materials', 'Daniel Cruz', '09567890123', 'daniel@rooftopmaterials.com', '55 Roofline Drive, Skyline City', '2025-03-18 00:13:58', '2025-03-18 00:13:58'),
(6, 'PlumbPro Solutions', 'Nina Herrera', '09678901234', 'nina@plumbpro.com', '23 Pipe Lane, Flow Town', '2025-03-18 00:13:58', '2025-03-18 00:13:58'),
(7, 'ElectroTech Supplies', 'Mark Lim', '09789012345', 'mark@electrotech.com', '77 Electric Blvd, Volt City', '2025-03-18 00:13:58', '2025-03-18 00:13:58'),
(8, 'PaintWorks Inc.', 'Anna dela Cruz', '09890123456', 'anna@paintworks.com', '32 Color Street, Hueville', '2025-03-18 00:13:58', '2025-03-18 00:13:58'),
(9, 'SafeTools PH', 'Chris Uy', '09901234567', 'chris@safetoolsph.com', '88 Safety Way, Securetown', '2025-03-18 00:13:58', '2025-03-18 00:13:58'),
(10, 'HeavyDuty Machinery', 'Rachel Santos', '09012345678', 'rachel@heavyduty.com', '99 Machine Zone, Power City', '2025-03-18 00:13:58', '2025-03-18 00:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `select_user` varchar(255) DEFAULT 'default_value',
  `profile_image` varchar(255) DEFAULT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `street_address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `select_user`, `profile_image`, `first_name`, `last_name`, `email`, `phone`, `role_id`, `password`, `address`, `street_address`, `created_at`, `updated_at`) VALUES
(2, 'default_value', NULL, 'Chandy', 'Neat', 'chandyneat9999@gmail.com', '', 1, '$2y$10$oyNswhcyN11Bd3BEcYrcfuhSS11GZG5d0QKhacwkYDijvEWkvSqVO', 'Phnom Penh', '', '2025-03-20 11:11:26', '2025-03-21 06:18:03'),
(3, 'Customer', 'uploads/profile1.jpg', 'Sopean', 'Phouk', 'sophean.phouk@example.com', '1234567890', 1, '$2y$10$tH5w6oJtY1rE0Te6lC.03OpsX5Jz7Fy5ipo778b0cjtuie7Skiv0C', '123 Main Street, New York, NY', 'Main Street, Apt 4B', '2025-03-21 13:33:07', '2025-03-21 13:35:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`),
  ADD UNIQUE KEY `CategoryName` (`CategoryName`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `Phone` (`Phone`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`MaterialID`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `SupplierID` (`SupplierID`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`SupplierID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `MaterialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD CONSTRAINT `audit_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`) ON DELETE CASCADE,
  ADD CONSTRAINT `materials_ibfk_2` FOREIGN KEY (`SupplierID`) REFERENCES `suppliers` (`SupplierID`) ON DELETE CASCADE;

--
-- Constraints for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


--------------------------------------------------------------
-- Adds a foreign key constraint between user and role
-- 1. Identify Invalid role_id Values:
SELECT u.role_id
FROM users u
LEFT JOIN roles r ON u.role_id = r.role_id
WHERE r.role_id IS NULL;

-- 2. Fix the Invalid Data:
UPDATE users
SET role_id = 1
WHERE role_id NOT IN (SELECT role_id FROM roles);

-- 3. Add the Foreign Key Constraint:
ALTER TABLE users
ADD CONSTRAINT fk_user_role
FOREIGN KEY (role_id)
REFERENCES roles(role_id);

--------------------------------------------------------------