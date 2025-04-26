-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2025 at 04:05 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_top_selling_materials` ()   BEGIN
    -- Clear the current data in the top_selling_materials table
    TRUNCATE TABLE top_selling_materials;
    
    -- Insert the top 5 best-selling materials into the table
    INSERT INTO top_selling_materials (
        MaterialID,
        Name,
        CategoryID,
        Quantity,
        UnitPrice,
        SupplierID,
        MinStockLevel,
        ReorderLevel,
        UnitOfMeasure,
        Size,
        ImagePath,
        Description,
        CreatedAt,
        UpdatedAt,
        Brand,
        Location,
        SupplierContact,
        Status,
        WarrantyPeriod,
        TotalSold
    )
    SELECT 
        m.MaterialID,
        m.Name,
        m.CategoryID,
        m.Quantity,
        m.UnitPrice,
        m.SupplierID,
        m.MinStockLevel,
        m.ReorderLevel,
        m.UnitOfMeasure,
        m.Size,
        m.ImagePath,
        m.Description,
        m.CreatedAt,
        m.UpdatedAt,
        m.Brand,
        m.Location,
        m.SupplierContact,
        m.Status,
        m.WarrantyPeriod,
        SUM(sod.Quantity) AS TotalSold
    FROM salesorderdetails sod
    JOIN materials m ON m.MaterialID = sod.MaterialID
    GROUP BY 
        m.MaterialID,
        m.Name,
        m.CategoryID,
        m.Quantity,
        m.UnitPrice,
        m.SupplierID,
        m.MinStockLevel,
        m.ReorderLevel,
        m.UnitOfMeasure,
        m.Size,
        m.ImagePath,
        m.Description,
        m.CreatedAt,
        m.UpdatedAt,
        m.Brand,
        m.Location,
        m.SupplierContact,
        m.Status,
        m.WarrantyPeriod
    ORDER BY TotalSold DESC
    LIMIT 5;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `all_day_customers`
-- (See below for the actual view)
--
CREATE TABLE `all_day_customers` (
`customer_date` date
,`total_customers_today` bigint(21)
,`total_customers_yesterday` bigint(21)
,`percent_change` decimal(27,2)
);

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
(1, 1, 'User registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 00:19:37'),
(2, 1, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 00:20:31'),
(3, 1, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 00:20:43'),
(4, 1, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 02:11:59'),
(5, 1, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 05:45:05'),
(6, 1, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-18 11:13:10'),
(7, 1, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-19 04:55:24'),
(8, 1, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 02:21:29'),
(9, 1, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 02:21:39'),
(10, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 02:21:44'),
(11, NULL, 'Failed login attempt for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 02:21:58'),
(12, 1, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 02:22:15'),
(13, 1, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 05:21:32'),
(14, 1, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 10:30:29'),
(15, 1, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 11:09:41'),
(16, 1, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 11:10:47'),
(17, 1, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 11:10:53'),
(18, 2, 'User registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 11:11:26'),
(19, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 11:12:04'),
(20, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 11:13:09'),
(21, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 11:16:21'),
(22, 1, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 11:16:37'),
(23, NULL, 'Failed login (wrong email) for email: mealeameng@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 10:58:59'),
(24, NULL, 'Failed login (wrong email) for email: mealeameng@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 10:59:12'),
(25, 3, 'Customer registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 10:59:41'),
(26, 3, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 11:00:10'),
(27, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 11:00:23'),
(28, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 11:02:19'),
(29, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 11:02:40'),
(30, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 11:26:01'),
(31, NULL, 'Failed login (wrong password) for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 11:26:10'),
(32, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 11:26:28'),
(33, 4, 'Customer registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 13:34:38'),
(34, 4, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 13:34:43'),
(35, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-26 13:34:49'),
(36, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-29 03:07:42'),
(37, NULL, 'Failed login (wrong email) for email: mealeameng@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-31 08:12:14'),
(38, NULL, 'Failed login (wrong email) for email: mealeameng@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-31 08:12:28'),
(39, 5, 'Customer registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-31 08:13:17'),
(40, 5, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-31 08:14:03'),
(41, 1, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-31 08:14:11'),
(42, NULL, 'Failed login (wrong password) for email: ronaldosmos94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-02 10:53:19'),
(43, 7, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-02 10:53:27'),
(44, NULL, 'Failed login (wrong password) for email: ronaldosmos94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-02 10:53:38'),
(45, 10, 'Customer registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-02 10:55:25'),
(46, 10, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-02 10:55:31'),
(47, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-02 10:55:45'),
(48, 11, 'Customer registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-03 00:27:47'),
(49, 11, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-03 00:28:00'),
(50, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-03 00:28:03'),
(51, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-03 01:28:12'),
(52, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-03 01:28:13'),
(53, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-03 01:32:50'),
(54, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-03 01:32:52'),
(55, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-03 03:03:55'),
(56, 2, 'Password reset token generated.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-03 03:04:35'),
(57, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-03 03:04:56'),
(58, 12, 'Customer registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 00:52:38'),
(59, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 01:17:03'),
(60, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 02:10:10'),
(61, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 02:10:32'),
(62, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 02:10:42'),
(63, 13, 'Customer registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 02:12:22'),
(64, 13, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 02:16:38'),
(65, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 02:17:14'),
(66, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 02:27:41'),
(67, 14, 'Customer registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 02:28:18'),
(68, 14, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 02:30:01'),
(69, 15, 'Customer registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 02:30:59'),
(70, 15, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 03:54:06'),
(71, 16, 'Customer registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 03:54:53'),
(72, 16, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 03:55:04'),
(73, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 03:55:09'),
(74, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 03:55:16'),
(75, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 03:58:25'),
(76, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 04:08:13'),
(77, NULL, 'Failed login (wrong email) for email: chandy.neat@student.passerellesnumeriques.org', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 07:53:31'),
(78, 17, 'Customer registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 07:53:48'),
(79, 17, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 09:44:07'),
(80, NULL, 'Failed login (wrong password) for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 09:44:12'),
(81, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 09:44:20'),
(82, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 09:50:02'),
(83, 18, 'Customer registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 09:50:44'),
(84, 18, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 09:50:56'),
(85, NULL, 'Failed login (wrong password) for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 09:51:00'),
(86, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 09:51:07'),
(87, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 09:51:13'),
(88, 18, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 09:51:20'),
(89, 19, 'Customer registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 12:54:56'),
(90, 19, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 13:02:35'),
(91, 20, 'Customer registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 13:03:24'),
(92, 20, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 13:03:27'),
(93, 20, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 13:03:54'),
(94, 20, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 13:07:05'),
(95, 20, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 13:07:08'),
(96, NULL, 'Failed login (wrong password) for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 13:07:15'),
(97, NULL, 'Failed login (wrong password) for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 13:07:21'),
(98, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 13:07:33'),
(99, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 13:07:36'),
(100, 20, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 13:07:52'),
(101, 20, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 13:10:59'),
(102, 20, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-07 13:11:26'),
(103, 18, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-08 13:05:19'),
(104, 18, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-08 13:05:30'),
(105, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-08 13:05:34'),
(106, NULL, 'Failed login (wrong password) for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-08 13:37:00'),
(107, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-08 13:37:09'),
(108, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-08 13:47:34'),
(109, 21, 'Customer registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-08 13:48:22'),
(110, 21, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-08 13:48:31'),
(111, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-08 13:48:38'),
(112, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-08 13:54:55'),
(113, NULL, 'Failed login (wrong password) for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 01:53:24'),
(114, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 01:53:31'),
(115, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 01:53:36'),
(116, 22, 'Customer registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 01:54:45'),
(117, 22, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 01:54:50'),
(118, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 01:57:58'),
(119, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 02:03:37'),
(120, 22, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 02:03:41'),
(121, 22, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 02:03:49'),
(122, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', '2025-04-09 02:03:54');

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
(1, 'Cement & Concrete', '                        Cement, concrete mix, ready-mix concrete, etc.                    ', '2025-03-18 00:12:10', '2025-04-03 06:01:56'),
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
-- Stand-in structure for view `customers`
-- (See below for the actual view)
--
CREATE TABLE `customers` (
`user_id` int(11)
,`select_user` varchar(255)
,`profile_image` varchar(255)
,`first_name` varchar(100)
,`last_name` varchar(100)
,`email` varchar(150)
,`phone` varchar(20)
,`role_id` int(11)
,`password` varchar(255)
,`address` text
,`street_address` text
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `daily_money_summary`
-- (See below for the actual view)
--
CREATE TABLE `daily_money_summary` (
`record_date` date
,`total_income` decimal(34,2)
,`total_expenses` decimal(34,2)
,`today_money` decimal(35,2)
,`percent_change` decimal(42,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `daily_sales_summary`
-- (See below for the actual view)
--
CREATE TABLE `daily_sales_summary` (
`record_date` date
,`total_sales` decimal(32,2)
,`total_sales_orders` bigint(21)
,`yesterday_sales` decimal(32,2)
,`percent_change` decimal(39,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EmployeeID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Position` varchar(100) NOT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Salary` decimal(10,2) NOT NULL CHECK (`Salary` >= 0),
  `HireDate` date NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmployeeID`, `Name`, `Position`, `Phone`, `Email`, `Salary`, `HireDate`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 'John Doe', 'Site Manager', '0123456789', 'johndoe@example.com', 3500.00, '2020-05-10', '2025-03-26 07:49:58', '2025-03-26 07:49:58'),
(2, 'Jane Smith', 'Project Engineer', '0987654321', 'janesmith@example.com', 4500.00, '2019-08-15', '2025-03-26 07:49:58', '2025-03-26 07:49:58'),
(3, 'Michael Brown', 'Foreman', '0112233445', 'michaelbrown@example.com', 2800.00, '2021-03-20', '2025-03-26 07:49:58', '2025-03-26 07:49:58'),
(4, 'Emily Davis', 'Safety Officer', '0156789012', 'emilydavis@example.com', 3200.00, '2022-01-10', '2025-03-26 07:49:58', '2025-03-26 07:49:58'),
(5, 'Robert Wilson', 'Civil Engineer', '0176543210', 'robertwilson@example.com', 5000.00, '2018-06-25', '2025-03-26 07:49:58', '2025-03-26 07:49:58'),
(6, 'Sarah Johnson', 'Accountant', '0134455667', 'sarahjohnson@example.com', 4000.00, '2020-09-12', '2025-03-26 07:49:58', '2025-03-26 07:49:58'),
(7, 'David Martinez', 'Warehouse Supervisor', '0192837465', 'davidmartinez@example.com', 3700.00, '2021-07-05', '2025-03-26 07:49:58', '2025-03-26 07:49:58'),
(8, 'Linda Anderson', 'Procurement Officer', '0167483920', 'lindaanderson@example.com', 4200.00, '2019-11-30', '2025-03-26 07:49:58', '2025-03-26 07:49:58'),
(9, 'James Thomas', 'Electrician', '0129384756', 'jamesthomas@example.com', 2700.00, '2023-02-14', '2025-03-26 07:49:58', '2025-03-26 07:49:58'),
(10, 'Jessica White', 'HR Manager', '0148392756', 'jessicawhite@example.com', 4300.00, '2017-04-18', '2025-03-26 07:49:58', '2025-03-26 07:49:58'),
(33, 'John Doe', 'Site Manager', '0923456789', 'johndy@example.com', 3500.00, '2020-05-10', '2025-03-26 07:53:57', '2025-03-26 07:53:57'),
(34, 'Jane Smith', 'Project Engineer', '0587654321', 'dysmith@example.com', 4500.00, '2019-08-15', '2025-03-26 07:53:57', '2025-03-26 07:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `ExpenseID` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `date_expenses` date DEFAULT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `Category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`ExpenseID`, `Description`, `Amount`, `date_expenses`, `EmployeeID`, `Category`) VALUES
(1, 'Material purchase for site A', 250.50, '2024-03-01', 1, 'Materials'),
(2, 'Transportation fees for delivery', 75.00, '2024-03-02', 2, 'Logistics'),
(3, 'Employee training seminar', 200.00, '2024-03-03', 3, 'Training'),
(4, 'Safety equipment purchase', 120.00, '2024-03-04', 4, 'Safety'),
(5, 'Site cleaning and maintenance', 100.00, '2024-03-05', 5, 'Maintenance'),
(6, 'Office rent for March', 500.00, '2025-03-26', 6, 'Rent');

-- --------------------------------------------------------

--
-- Table structure for table `goodsreceived`
--

CREATE TABLE `goodsreceived` (
  `GoodsReceivedID` int(11) NOT NULL,
  `PurchaseOrderID` int(11) DEFAULT NULL,
  `ReceivedDate` date NOT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `TotalReceivedAmount` decimal(10,2) DEFAULT NULL,
  `Status` enum('Pending','Completed','Partially Received') DEFAULT 'Pending',
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goodsreceived`
--

INSERT INTO `goodsreceived` (`GoodsReceivedID`, `PurchaseOrderID`, `ReceivedDate`, `EmployeeID`, `TotalReceivedAmount`, `Status`, `CreatedAt`) VALUES
(1, 1, '2024-03-06', 3, 350.00, 'Completed', '2025-03-26 07:56:37'),
(2, 2, '2024-03-08', 1, 400.00, 'Partially Received', '2025-03-26 07:56:37'),
(3, 1, '2024-03-06', 3, 350.00, 'Completed', '2025-03-26 07:57:18'),
(4, 2, '2024-03-08', 1, 400.00, 'Partially Received', '2025-03-26 07:57:18'),
(5, NULL, '2025-03-26', NULL, 800.00, 'Pending', '2025-03-26 10:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `InvoiceID` int(11) NOT NULL,
  `SalesOrderID` int(11) DEFAULT NULL,
  `InvoiceDate` date NOT NULL,
  `PaymentStatus` enum('Paid','Pending','Overdue') NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `payment_status` enum('Pending','Paid','Failed') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`InvoiceID`, `SalesOrderID`, `InvoiceDate`, `PaymentStatus`, `Amount`, `payment_status`) VALUES
(1, NULL, '2025-03-26', 'Paid', 300.00, 'Paid');

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
(28, 'Ramco Cement', 1, 90, 5.00, 1, 0, 5, '', 'Bav', 'uploads/images/67efc9cfcc1c3_9b2221a70099156c00ba9cd75afde65b.jpg', '', '2025-04-04 19:00:15', '2025-04-04 19:00:15', '', '', '', '', 0),
(29, 'Zinc plated Chipboard screws', 3, 70, 10.00, 1, 0, 6, '', 'Box', 'uploads/images/67efca9f3ea9a_d5ca745d86b6bc1610703de6768e96b4.jpg', '', '2025-04-04 19:03:43', '2025-04-04 19:03:43', '', '', '', '', 0),
(30, 'Sand', 1, 3, 50.00, 1, 0, 0, '', 'Car', 'uploads/images/67efcaf6b134a_7a64fff940f3f0debcaf25c5fdddc87e.jpg', '', '2025-04-04 19:05:10', '2025-04-05 11:09:19', '', '', '', 'Active', 0),
(31, 'Fan Hateri', 7, 0, 30.00, 7, 0, 0, '', 'Fan', 'uploads/images/67efcb9baa757_f498619669ecb103b9d4f355cb7b8401.jpg', '', '2025-04-04 19:07:55', '2025-04-09 08:09:28', '', '', '', 'Discontinued', 0),
(32, 'ដែក40', 3, 1, 2.00, 1, 0, 0, '', 'ដើម', 'uploads/images/67f329bf51f2d_78269eb4d70fd4710ceee85908d098a6.jpg', '', '2025-04-07 08:26:23', '2025-04-09 08:08:59', '', '', '', 'Active', 0),
(33, 'Nial', 3, 0, 30.00, 4, 0, 0, '', 'Box', 'uploads/images/67f325a1c7344_1e714702f1724b0bc46866bb1bc3cd8b.jpg', '', '2025-04-07 08:08:49', '2025-04-07 13:16:09', '', '', '', 'Active', 0),
(34, 'សំណាញ់ជ័រ', 4, 30, 20.00, 7, 0, 6, '', 'ដុំ', 'uploads/images/67f325f6dc9cc_19fd75f50123f61f15a4f1a9bf7a225f.jpg', '', '2025-04-07 08:10:14', '2025-04-07 08:10:14', '', '', '', '', 0),
(36, 'solar cable', 7, 3, 15.00, 7, 0, 0, '', 'ដុំ', 'uploads/images/67f36d3d18a18_cf1461b4f8a886b526bf6781567c6c29.jpg', '', '2025-04-07 13:14:21', '2025-04-08 20:54:41', '', '', '', 'Active', 0),
(37, 'ទុយោរុំខ្សែរភ្លើង', 18, 80, 12.00, 13, 0, 6, '', 'ដុំ', 'uploads/images/67f375b098783_0e940b6e5aaa818e172e50d52cf4fefc.jpg', '', '2025-04-07 13:50:24', '2025-04-07 13:50:24', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `monthlysalessummary`
-- (See below for the actual view)
--
CREATE TABLE `monthlysalessummary` (
`year` int(4)
,`month` int(2)
,`totalOrders` bigint(21)
,`totalAmount` decimal(32,2)
,`percentFromLastMonth` decimal(39,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `monthly_purchase_order_summary`
-- (See below for the actual view)
--
CREATE TABLE `monthly_purchase_order_summary` (
`month` varchar(7)
,`total_orders` bigint(21)
,`total_purchase_amount` decimal(32,2)
,`completed_orders` bigint(21)
,`pending_orders` bigint(21)
,`completed_orders_percent` decimal(26,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `url`, `description`, `category`) VALUES
(1, 'Dashboard', '/', 'Overview of the system', 'General'),
(2, 'Material', '/material', 'Manage stock and warehouse items', 'Inventory'),
(3, 'Categories', '/category', 'Manage product categories', 'Inventory'),
(4, 'Materials', '/materials', 'Manage raw materials and supplies', 'Inventory'),
(5, 'Customers', '/customer', 'Customer management system', 'Sales'),
(6, 'Employees', '/employees', 'Employee records and roles', 'HR'),
(7, 'Sales Reports', '/sales', 'View and analyze sales reports', 'Sales'),
(8, 'Purchase Orders', '/purchasesOrder', 'Track and manage supplier purchases', 'Purchasing'),
(9, 'Work Logs', '/work_logs', 'Employee work logs and task tracking', 'HR');

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
(1, 2, NULL, 'b08b5fa8b149bf092805590205d287c5ec2c15ac295ced6fb23029b634c88179', '2025-04-03 06:04:33', '2025-04-03 03:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `PaymentID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `PaymentDate` date NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `PaymentMethod` enum('Cash','Credit Card','Bank Transfer','Other') NOT NULL,
  `payment_status` enum('Pending','Completed','Failed') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`PaymentID`, `OrderID`, `PaymentDate`, `Amount`, `PaymentMethod`, `payment_status`) VALUES
(9, 42, '2025-04-08', 1500.00, 'Credit Card', 'Completed'),
(10, 43, '2025-04-08', 2000.00, '', 'Pending'),
(11, 44, '2025-04-08', 1200.00, 'Bank Transfer', 'Completed'),
(12, 45, '2025-04-09', 1800.00, 'Credit Card', 'Completed'),
(13, 46, '2025-04-09', 950.00, 'Cash', 'Pending'),
(14, 47, '2025-04-09', 3000.00, 'Bank Transfer', 'Completed'),
(15, 48, '2025-04-09', 2200.00, '', 'Completed'),
(16, 49, '2025-04-09', 1100.00, 'Credit Card', 'Failed'),
(17, 50, '2025-04-09', 1750.00, 'Credit Card', 'Pending'),
(18, 51, '2025-04-09', 2600.00, 'Bank Transfer', 'Completed'),
(19, 52, '2025-04-09', 900.00, 'Cash', 'Completed'),
(20, 53, '2025-04-09', 1400.00, '', 'Pending'),
(21, 54, '2025-04-09', 3300.00, 'Credit Card', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permission_id` int(11) NOT NULL,
  `permission_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permission_id`, `permission_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'manage_users', 'Add, edit, delete users', '2025-03-22 01:55:04', '2025-03-22 01:55:04'),
(2, 'manage_inventory', 'View, add, update, delete inventory items', '2025-03-22 01:55:04', '2025-03-22 01:55:04'),
(3, 'manage_sales', 'Process sales orders and invoices', '2025-03-22 01:55:04', '2025-03-22 01:55:04'),
(4, 'view_reports', 'View sales, inventory, and finance reports', '2025-03-22 01:55:04', '2025-03-22 01:55:04'),
(5, 'manage_finance', 'Handle payments, expenses, and budgets', '2025-03-22 01:55:04', '2025-03-22 01:55:04'),
(6, 'manage_suppliers', 'Add, update, and delete supplier details', '2025-03-22 01:55:04', '2025-03-22 01:55:04'),
(7, 'buy_materials', 'Allows customers to purchase materials', '2025-03-23 02:57:28', '2025-03-23 02:57:28'),
(8, 'feedback', 'Allows customers to submit feedback', '2025-03-23 02:57:28', '2025-03-23 02:57:28'),
(9, 'orders', 'Allows customers to create and manage orders', '2025-03-23 02:57:28', '2025-03-23 02:57:28'),
(10, 'view_profile', 'Allows customers to view their profile information', '2025-03-23 02:57:28', '2025-03-23 02:57:28'),
(11, 'view_help', 'Allows customers to access help resources', '2025-03-23 02:57:28', '2025-03-23 02:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `permission_roles`
--

CREATE TABLE `permission_roles` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permission_roles`
--

INSERT INTO `permission_roles` (`id`, `role_id`, `permission_id`, `created_at`) VALUES
(1, 1, 1, '2025-03-22 02:04:22'),
(2, 1, 2, '2025-03-22 02:04:22'),
(3, 1, 3, '2025-03-22 02:04:22'),
(4, 1, 4, '2025-03-22 02:04:22'),
(5, 1, 5, '2025-03-22 02:04:22'),
(6, 1, 6, '2025-03-22 02:04:22'),
(11, 3, 4, '2025-03-22 02:04:22'),
(12, 4, 3, '2025-03-22 02:04:22'),
(13, 4, 4, '2025-03-22 02:04:22'),
(14, 5, 2, '2025-03-22 02:04:22'),
(15, 5, 6, '2025-03-22 02:04:22'),
(16, 2, 7, '2025-03-23 03:00:06'),
(17, 2, 8, '2025-03-23 03:00:06'),
(18, 2, 9, '2025-03-23 03:00:06'),
(19, 2, 10, '2025-03-23 03:00:06'),
(20, 2, 11, '2025-03-23 03:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorderdetails`
--

CREATE TABLE `purchaseorderdetails` (
  `PurchaseOrderID` int(11) NOT NULL,
  `MaterialID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `UnitPrice` decimal(10,2) NOT NULL,
  `TotalAmount` decimal(10,2) GENERATED ALWAYS AS (`Quantity` * `UnitPrice`) STORED,
  `OrderDate` date NOT NULL,
  `SupplierID` int(11) DEFAULT NULL,
  `Status` varchar(50) DEFAULT 'Pending',
  `Discount` decimal(10,2) DEFAULT 0.00,
  `Tax` decimal(10,2) DEFAULT 0.00,
  `DeliveryDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchaseorderdetails`
--

INSERT INTO `purchaseorderdetails` (`PurchaseOrderID`, `MaterialID`, `Quantity`, `UnitPrice`, `OrderDate`, `SupplierID`, `Status`, `Discount`, `Tax`, `DeliveryDate`) VALUES
(125, 28, 100, 15.50, '2024-04-01', 1, 'Pending', 10.00, 5.00, '2024-04-10'),
(126, 29, 150, 20.00, '2024-04-05', 2, 'Completed', 5.00, 10.00, '2024-04-15'),
(127, 30, 200, 18.75, '2024-04-10', 3, 'Pending', 12.00, 8.00, '2024-04-20'),
(128, 31, 120, 25.00, '2024-04-15', 4, 'Completed', 8.00, 7.00, '2024-04-25'),
(129, 32, 80, 30.00, '2024-04-20', 5, 'Pending', 15.00, 5.00, '2024-04-30'),
(130, 33, 130, 16.00, '2024-05-01', 1, 'Completed', 10.00, 6.00, '2024-05-10'),
(131, 34, 100, 18.50, '2024-05-05', 2, 'Pending', 5.00, 7.00, '2024-05-15'),
(132, 28, 150, 14.75, '2024-05-10', 3, 'Completed', 12.00, 6.00, '2024-05-20'),
(133, 29, 170, 20.25, '2024-05-15', 4, 'Pending', 10.00, 8.00, '2024-05-25'),
(134, 30, 110, 22.50, '2024-05-20', 5, 'Completed', 5.00, 5.00, '2024-05-30'),
(135, 31, 140, 21.00, '2024-06-01', 1, 'Pending', 8.00, 7.00, '2024-06-10'),
(136, 32, 160, 19.50, '2024-06-05', 2, 'Completed', 10.00, 9.00, '2024-06-15'),
(137, 33, 120, 25.00, '2024-06-10', 3, 'Pending', 12.00, 8.00, '2024-06-20'),
(138, 34, 180, 23.00, '2024-06-15', 4, 'Completed', 15.00, 6.00, '2024-06-25'),
(139, 28, 200, 17.75, '2024-06-20', 5, 'Pending', 5.00, 10.00, '2024-06-30'),
(140, 29, 130, 19.00, '2024-07-01', 1, 'Completed', 10.00, 7.00, '2024-07-10'),
(141, 30, 110, 21.50, '2024-07-05', 2, 'Pending', 8.00, 6.00, '2024-07-15'),
(142, 31, 150, 23.25, '2024-07-10', 3, 'Completed', 5.00, 5.00, '2024-07-20'),
(143, 32, 120, 24.00, '2024-07-15', 4, 'Pending', 12.00, 8.00, '2024-07-25'),
(144, 33, 100, 20.00, '2024-07-20', 5, 'Completed', 15.00, 10.00, '2024-07-30'),
(145, 34, 150, 18.00, '2024-08-01', 1, 'Pending', 10.00, 6.00, '2024-08-10'),
(146, 28, 120, 22.50, '2024-08-05', 2, 'Completed', 8.00, 7.00, '2024-08-15'),
(147, 29, 130, 16.75, '2024-08-10', 3, 'Pending', 5.00, 6.00, '2024-08-20'),
(148, 30, 150, 19.25, '2024-08-15', 4, 'Completed', 12.00, 8.00, '2024-08-25'),
(149, 31, 110, 25.00, '2024-08-20', 5, 'Pending', 15.00, 5.00, '2024-08-30'),
(150, 32, 100, 20.00, '2024-09-01', 1, 'Completed', 10.00, 7.00, '2024-09-10'),
(151, 33, 150, 18.50, '2024-09-05', 2, 'Pending', 8.00, 6.00, '2024-09-15'),
(152, 34, 120, 21.00, '2024-09-10', 3, 'Completed', 5.00, 5.00, '2024-09-20'),
(153, 28, 140, 19.25, '2024-09-15', 4, 'Pending', 12.00, 8.00, '2024-09-25'),
(154, 29, 130, 22.50, '2024-09-20', 5, 'Completed', 10.00, 7.00, '2024-09-30'),
(155, 30, 150, 21.00, '2024-10-01', 1, 'Completed', 10.00, 8.00, '2024-10-10'),
(156, 31, 130, 22.00, '2024-10-05', 2, 'Pending', 8.00, 7.00, '2024-10-15'),
(157, 32, 120, 24.50, '2024-10-10', 3, 'Completed', 5.00, 6.00, '2024-10-20'),
(158, 33, 110, 19.75, '2024-10-15', 4, 'Pending', 12.00, 9.00, '2024-10-25'),
(159, 34, 100, 18.00, '2024-10-20', 5, 'Completed', 15.00, 5.00, '2024-10-30'),
(160, 28, 140, 17.25, '2024-11-01', 1, 'Pending', 10.00, 6.00, '2024-11-10'),
(161, 29, 120, 22.50, '2024-11-05', 2, 'Completed', 8.00, 7.00, '2024-11-15'),
(162, 30, 130, 19.00, '2024-11-10', 3, 'Pending', 5.00, 6.00, '2024-11-20'),
(163, 31, 100, 23.00, '2024-11-15', 4, 'Completed', 12.00, 8.00, '2024-11-25'),
(164, 32, 150, 21.75, '2024-11-20', 5, 'Pending', 15.00, 10.00, '2024-11-30'),
(165, 33, 120, 18.50, '2024-12-01', 1, 'Completed', 10.00, 7.00, '2024-12-10'),
(166, 34, 130, 20.00, '2024-12-05', 2, 'Pending', 8.00, 6.00, '2024-12-15'),
(167, 28, 140, 19.25, '2024-12-10', 3, 'Completed', 5.00, 5.00, '2024-12-20'),
(168, 29, 110, 22.75, '2024-12-15', 4, 'Pending', 12.00, 8.00, '2024-12-25'),
(169, 30, 120, 21.00, '2024-12-20', 5, 'Completed', 15.00, 7.00, '2024-12-30'),
(170, 31, 150, 23.00, '2025-01-01', 1, 'Pending', 10.00, 8.00, '2025-01-10'),
(171, 32, 120, 20.50, '2025-01-05', 2, 'Completed', 8.00, 7.00, '2025-01-15'),
(172, 33, 100, 22.00, '2025-01-10', 3, 'Pending', 5.00, 6.00, '2025-01-20'),
(173, 34, 130, 19.50, '2025-01-15', 4, 'Completed', 12.00, 9.00, '2025-01-25'),
(174, 28, 140, 18.75, '2025-01-20', 5, 'Pending', 15.00, 5.00, '2025-01-30'),
(175, 29, 110, 21.00, '2025-02-01', 1, 'Completed', 10.00, 7.00, '2025-02-10'),
(176, 30, 130, 19.25, '2025-02-05', 2, 'Pending', 8.00, 6.00, '2025-02-15'),
(177, 31, 120, 23.00, '2025-02-10', 3, 'Completed', 5.00, 5.00, '2025-02-20'),
(178, 32, 150, 20.50, '2025-02-15', 4, 'Pending', 12.00, 8.00, '2025-02-25'),
(179, 33, 100, 22.75, '2025-02-20', 5, 'Completed', 15.00, 10.00, '2025-02-28'),
(180, 34, 130, 19.00, '2025-03-01', 1, 'Pending', 10.00, 6.00, '2025-03-10'),
(181, 28, 120, 21.50, '2025-03-05', 2, 'Completed', 8.00, 7.00, '2025-03-15'),
(182, 29, 140, 20.25, '2025-03-10', 3, 'Pending', 5.00, 6.00, '2025-03-20'),
(183, 30, 110, 22.00, '2025-03-15', 4, 'Completed', 12.00, 8.00, '2025-03-25'),
(184, 31, 120, 23.50, '2025-03-20', 5, 'Pending', 15.00, 7.00, '2025-03-30'),
(185, 32, 130, 21.00, '2025-04-01', 1, 'Completed', 10.00, 6.00, '2025-04-10'),
(186, 33, 100, 19.50, '2025-04-05', 2, 'Pending', 8.00, 7.00, '2025-04-15'),
(187, 34, 140, 20.75, '2025-04-10', 3, 'Completed', 5.00, 6.00, '2025-04-20'),
(188, 28, 110, 22.00, '2025-04-15', 4, 'Pending', 12.00, 9.00, '2025-04-25'),
(189, 29, 120, 21.25, '2025-04-20', 5, 'Completed', 15.00, 10.00, '2025-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorders`
--

CREATE TABLE `purchaseorders` (
  `PurchaseOrderID` int(11) NOT NULL,
  `SupplierID` int(11) DEFAULT NULL,
  `OrderDate` date NOT NULL,
  `ExpectedDeliveryDate` date DEFAULT NULL,
  `TotalAmount` decimal(10,2) DEFAULT NULL,
  `Status` enum('Pending','Completed','Cancelled') DEFAULT 'Pending',
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchaseorders`
--

INSERT INTO `purchaseorders` (`PurchaseOrderID`, `SupplierID`, `OrderDate`, `ExpectedDeliveryDate`, `TotalAmount`, `Status`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 4, '2024-03-01', '2024-03-05', 700.00, 'Pending', '2025-03-26 07:56:36', '2025-03-26 09:11:48'),
(2, 7, '2024-03-02', '2024-03-07', 750.00, 'Completed', '2025-03-26 07:56:36', '2025-03-26 09:12:01'),
(3, 3, '2024-03-03', '2024-03-10', 750.00, 'Cancelled', '2025-03-26 07:56:36', '2025-03-26 09:12:22'),
(4, 4, '2024-03-01', '2024-03-05', 700.00, 'Pending', '2025-03-26 07:57:18', '2025-03-26 09:12:28'),
(5, 7, '2024-03-02', '2024-03-07', 750.00, 'Completed', '2025-03-26 07:57:18', '2025-03-26 09:12:35'),
(6, 3, '2024-03-03', '2024-03-10', 700.00, 'Cancelled', '2025-03-26 07:57:18', '2025-03-26 09:12:43'),
(7, 11, '2025-03-26', '2025-04-07', 1500.00, 'Pending', '2025-03-26 10:46:01', '2025-04-07 01:46:26');

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
(2, 'Customer', 'Buy product.', '2025-03-10 09:45:00', '2025-04-02 10:50:32'),
(3, 'Employee', 'Can update work logs and view sales and inventory.', '2025-03-01 07:00:00', '2025-03-20 05:00:00'),
(4, 'Sales', 'Can only view and manage sales-related information.', '2025-03-05 01:30:00', '2025-03-20 06:30:00'),
(6, 'Manager', 'Can manage inventory, suppliers, and sales orders.', '2025-02-01 03:30:00', '2025-04-02 10:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `salesorderdetails`
--

CREATE TABLE `salesorderdetails` (
  `SalesOrderDetailID` int(11) NOT NULL,
  `SalesOrderID` int(11) DEFAULT NULL,
  `MaterialID` int(11) DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  `UnitPrice` decimal(10,2) NOT NULL,
  `Total` decimal(10,2) GENERATED ALWAYS AS (`Quantity` * `UnitPrice`) STORED,
  `SalesOrderDetail_Date` date NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesorderdetails`
--

INSERT INTO `salesorderdetails` (`SalesOrderDetailID`, `SalesOrderID`, `MaterialID`, `Quantity`, `UnitPrice`, `SalesOrderDetail_Date`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 42, 28, 10, 100.00, '2024-04-01', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(2, 43, 29, 20, 200.00, '2024-04-06', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(3, 44, 30, 30, 300.00, '2024-04-11', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(4, 45, 31, 40, 400.00, '2024-04-16', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(5, 46, 32, 50, 500.00, '2024-04-21', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(6, 47, 33, 10, 100.00, '2024-04-26', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(7, 48, 34, 20, 200.00, '2024-05-01', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(8, 49, 28, 30, 300.00, '2024-05-08', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(9, 50, 29, 40, 400.00, '2024-05-11', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(10, 51, 30, 50, 500.00, '2024-05-16', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(11, 52, 31, 10, 100.00, '2024-05-21', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(12, 53, 32, 20, 200.00, '2024-05-26', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(13, 54, 33, 30, 300.00, '2024-06-01', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(14, 55, 34, 40, 400.00, '2024-06-06', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(15, 56, 28, 50, 500.00, '2024-06-11', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(16, 57, 29, 10, 100.00, '2024-06-16', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(17, 58, 30, 20, 200.00, '2024-06-21', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(18, 59, 31, 30, 300.00, '2024-06-26', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(19, 60, 32, 40, 400.00, '2024-07-01', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(20, 61, 33, 50, 500.00, '2024-07-06', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(21, 62, 34, 10, 100.00, '2024-07-11', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(22, 63, 28, 20, 200.00, '2024-07-16', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(23, 64, 29, 30, 300.00, '2024-07-21', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(24, 65, 30, 40, 400.00, '2024-07-26', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(25, 66, 31, 50, 500.00, '2024-08-01', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(26, 67, 32, 10, 100.00, '2024-08-06', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(27, 68, 33, 20, 200.00, '2024-08-11', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(28, 69, 34, 30, 300.00, '2024-08-16', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(29, 70, 28, 40, 400.00, '2024-08-21', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(30, 71, 29, 50, 500.00, '2024-08-26', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(31, 72, 30, 10, 100.00, '2024-09-01', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(32, 73, 31, 20, 200.00, '2024-09-06', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(33, 74, 32, 30, 300.00, '2024-09-11', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(34, 75, 33, 40, 400.00, '2024-09-16', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(35, 76, 34, 50, 500.00, '2024-09-21', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(36, 77, 28, 10, 100.00, '2024-09-26', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(37, 78, 29, 20, 200.00, '2024-10-01', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(38, 79, 30, 30, 300.00, '2024-10-06', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(39, 80, 31, 40, 400.00, '2024-10-11', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(40, 81, 32, 50, 500.00, '2024-10-16', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(41, 82, 33, 10, 100.00, '2024-10-21', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(42, 83, 34, 20, 200.00, '2024-10-26', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(43, 84, 28, 30, 300.00, '2024-11-01', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(44, 85, 29, 40, 400.00, '2024-11-06', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(45, 86, 30, 50, 500.00, '2024-11-11', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(46, 87, 31, 10, 100.00, '2024-11-16', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(47, 88, 32, 20, 200.00, '2024-11-21', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(48, 89, 33, 30, 300.00, '2024-11-26', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(49, 90, 34, 40, 400.00, '2024-12-01', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(50, 105, 28, 10, 100.00, '2025-02-01', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(51, 106, 29, 20, 200.00, '2025-02-06', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(52, 107, 30, 30, 300.00, '2025-02-11', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(53, 108, 31, 40, 400.00, '2025-02-16', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(54, 109, 32, 50, 500.00, '2025-02-21', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(55, 110, 33, 10, 100.00, '2025-02-26', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(56, 111, 34, 20, 200.00, '2025-03-01', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(57, 112, 28, 30, 300.00, '2025-03-06', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(58, 113, 29, 40, 400.00, '2025-03-11', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(59, 114, 30, 50, 500.00, '2025-03-16', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(60, 115, 31, 10, 100.00, '2025-03-21', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(61, 116, 32, 20, 200.00, '2025-03-26', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(62, 117, 33, 30, 300.00, '2025-04-01', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(63, 118, 34, 40, 400.00, '2025-04-06', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(64, 119, 28, 50, 500.00, '2025-04-11', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(65, 120, 29, 10, 100.00, '2025-04-16', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(66, 121, 30, 20, 200.00, '2025-04-21', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(67, 122, 31, 30, 300.00, '2025-04-26', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(68, 117, 28, 10, 100.00, '2025-04-01', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(69, 118, 29, 20, 200.00, '2025-04-06', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(70, 119, 30, 30, 300.00, '2025-04-11', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(71, 120, 31, 40, 400.00, '2025-04-16', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(72, 121, 32, 50, 500.00, '2025-04-21', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(73, 122, 33, 10, 100.00, '2025-04-26', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(74, 123, 34, 20, 200.00, '2025-04-02', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(75, 124, 28, 30, 300.00, '2025-04-07', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(76, 125, 29, 40, 400.00, '2025-04-12', '2025-04-08 13:43:38', '2025-04-08 13:43:38'),
(77, 126, 30, 50, 500.00, '2025-04-17', '2025-04-08 13:43:38', '2025-04-08 13:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `salesorders`
--

CREATE TABLE `salesorders` (
  `SalesOrderID` int(11) NOT NULL,
  `OrderDate` date NOT NULL,
  `TotalAmount` decimal(10,2) NOT NULL,
  `Status` enum('Pending','Completed','Cancelled') DEFAULT 'Pending',
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `CustomerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesorders`
--

INSERT INTO `salesorders` (`SalesOrderID`, `OrderDate`, `TotalAmount`, `Status`, `CreatedAt`, `CustomerID`) VALUES
(42, '2024-01-10', 1500.00, 'Completed', '2025-04-09 01:08:16', NULL),
(43, '2024-01-15', 800.00, 'Completed', '2025-04-09 01:08:16', NULL),
(44, '2024-04-08', 1000.00, 'Completed', '2025-04-09 01:08:16', NULL),
(45, '2024-04-08', 1200.00, 'Completed', '2025-04-09 01:08:16', NULL),
(46, '2024-02-05', 1700.00, 'Completed', '2025-04-09 01:08:16', NULL),
(47, '2024-02-10', 1800.00, 'Completed', '2025-04-09 01:08:16', NULL),
(48, '2024-02-15', 1300.00, 'Completed', '2025-04-09 01:08:16', NULL),
(49, '2024-02-20', 1600.00, 'Completed', '2025-04-09 01:08:16', NULL),
(50, '2024-03-01', 1400.00, 'Completed', '2025-04-09 01:08:16', NULL),
(51, '2024-03-05', 900.00, 'Completed', '2025-04-09 01:08:16', NULL),
(52, '2024-03-10', 1600.00, 'Completed', '2025-04-09 01:08:16', NULL),
(53, '2024-03-15', 1700.00, 'Completed', '2025-04-09 01:08:16', NULL),
(54, '2024-04-05', 1500.00, 'Completed', '2025-04-09 01:08:16', NULL),
(55, '2024-04-10', 1200.00, 'Completed', '2025-04-09 01:08:16', NULL),
(56, '2024-04-15', 1800.00, 'Completed', '2025-04-09 01:08:16', NULL),
(57, '2024-04-20', 2000.00, 'Completed', '2025-04-09 01:08:16', NULL),
(58, '2024-05-01', 1500.00, 'Completed', '2025-04-09 01:08:16', NULL),
(59, '2024-05-10', 1700.00, 'Completed', '2025-04-09 01:08:16', NULL),
(60, '2024-05-15', 1800.00, 'Completed', '2025-04-09 01:08:16', NULL),
(61, '2024-05-20', 2000.00, 'Completed', '2025-04-09 01:08:16', NULL),
(62, '2024-06-05', 2100.00, 'Completed', '2025-04-09 01:08:16', NULL),
(63, '2024-06-10', 2200.00, 'Completed', '2025-04-09 01:08:16', NULL),
(64, '2024-06-15', 2300.00, 'Completed', '2025-04-09 01:08:16', NULL),
(65, '2024-06-20', 2400.00, 'Completed', '2025-04-09 01:08:16', NULL),
(66, '2024-07-05', 2500.00, 'Completed', '2025-04-09 01:08:16', NULL),
(67, '2024-07-10', 2600.00, 'Completed', '2025-04-09 01:08:16', NULL),
(68, '2024-07-15', 2700.00, 'Completed', '2025-04-09 01:08:16', NULL),
(69, '2024-07-20', 2800.00, 'Completed', '2025-04-09 01:08:16', NULL),
(70, '2024-08-05', 2900.00, 'Completed', '2025-04-09 01:08:16', NULL),
(71, '2024-08-10', 3000.00, 'Completed', '2025-04-09 01:08:16', NULL),
(72, '2024-08-15', 3100.00, 'Completed', '2025-04-09 01:08:16', NULL),
(73, '2024-08-20', 3200.00, 'Completed', '2025-04-09 01:08:16', NULL),
(74, '2024-09-05', 3300.00, 'Completed', '2025-04-09 01:08:16', NULL),
(75, '2024-09-10', 3400.00, 'Completed', '2025-04-09 01:08:16', NULL),
(76, '2024-09-15', 3500.00, 'Completed', '2025-04-09 01:08:16', NULL),
(77, '2024-09-20', 3600.00, 'Completed', '2025-04-09 01:08:16', NULL),
(78, '2024-10-05', 3700.00, 'Completed', '2025-04-09 01:08:16', NULL),
(79, '2024-10-10', 3800.00, 'Completed', '2025-04-09 01:08:16', NULL),
(80, '2024-10-15', 3900.00, 'Completed', '2025-04-09 01:08:16', NULL),
(81, '2024-10-20', 4000.00, 'Completed', '2025-04-09 01:08:16', NULL),
(82, '2024-11-05', 4100.00, 'Completed', '2025-04-09 01:08:16', NULL),
(83, '2024-11-10', 4200.00, 'Completed', '2025-04-09 01:08:16', NULL),
(84, '2024-11-15', 4300.00, 'Completed', '2025-04-09 01:08:16', NULL),
(85, '2024-11-20', 4400.00, 'Completed', '2025-04-09 01:08:16', NULL),
(86, '2025-01-05', 4600.00, 'Completed', '2025-04-09 01:08:16', NULL),
(87, '2025-01-10', 4700.00, 'Completed', '2025-04-09 01:08:16', NULL),
(88, '2025-01-15', 4800.00, 'Completed', '2025-04-09 01:08:16', NULL),
(89, '2025-01-20', 4900.00, 'Completed', '2025-04-09 01:08:16', NULL),
(90, '2025-01-25', 5000.00, 'Completed', '2025-04-09 01:08:16', NULL),
(91, '2025-02-05', 5100.00, 'Completed', '2025-04-09 01:08:16', NULL),
(92, '2025-02-10', 5200.00, 'Completed', '2025-04-09 01:08:16', NULL),
(93, '2025-02-15', 5300.00, 'Completed', '2025-04-09 01:08:16', NULL),
(94, '2025-02-20', 5400.00, 'Completed', '2025-04-09 01:08:16', NULL),
(95, '2025-02-25', 5500.00, 'Completed', '2025-04-09 01:08:16', NULL),
(96, '2025-03-05', 5600.00, 'Completed', '2025-04-09 01:08:16', NULL),
(97, '2025-03-10', 5700.00, 'Completed', '2025-04-09 01:08:16', NULL),
(98, '2025-03-15', 5800.00, 'Completed', '2025-04-09 01:08:16', NULL),
(99, '2025-03-20', 5900.00, 'Completed', '2025-04-09 01:08:16', NULL),
(100, '2025-03-25', 6000.00, 'Completed', '2025-04-09 01:08:16', NULL),
(101, '2025-04-05', 6100.00, 'Completed', '2025-04-09 01:08:16', NULL),
(102, '2025-04-10', 6200.00, 'Completed', '2025-04-09 01:08:16', NULL),
(103, '2025-04-15', 6300.00, 'Completed', '2025-04-09 01:08:16', NULL),
(104, '2025-04-20', 6400.00, 'Completed', '2025-04-09 01:08:16', NULL),
(105, '2025-05-01', 6500.00, 'Completed', '2025-04-09 01:08:16', NULL),
(106, '2025-05-05', 6600.00, 'Completed', '2025-04-09 01:08:16', NULL),
(107, '2025-05-10', 6700.00, 'Completed', '2025-04-09 01:08:16', NULL),
(108, '2025-05-15', 6800.00, 'Completed', '2025-04-09 01:08:16', NULL),
(109, '2025-05-20', 6900.00, 'Completed', '2025-04-09 01:08:16', NULL),
(110, '2025-05-25', 7000.00, 'Completed', '2025-04-09 01:08:16', NULL),
(111, '2025-03-31', 87.32, 'Pending', '2025-04-09 01:08:16', NULL),
(112, '2025-03-31', 21.87, 'Pending', '2025-04-09 01:08:16', NULL),
(113, '2025-03-31', 55.13, 'Completed', '2025-04-09 01:08:16', NULL),
(114, '2025-03-31', 184.53, 'Cancelled', '2025-04-09 01:08:16', NULL),
(115, '2025-03-31', 92.90, 'Pending', '2025-04-09 01:08:16', NULL),
(116, '2025-03-31', 350.75, '', '2025-04-09 01:08:16', NULL),
(117, '2025-03-31', 67.80, '', '2025-04-09 01:08:16', NULL),
(118, '2025-03-31', 120.45, 'Completed', '2025-04-09 01:08:16', NULL),
(119, '2025-03-31', 215.99, '', '2025-04-09 01:08:16', NULL),
(120, '2025-03-31', 42.50, 'Cancelled', '2025-04-09 01:08:16', NULL),
(121, '2025-03-31', 312.89, 'Completed', '2025-04-09 01:08:16', NULL),
(122, '2025-03-31', 89.99, '', '2025-04-09 01:08:16', NULL),
(123, '2025-03-31', 150.10, 'Pending', '2025-04-09 01:08:16', NULL),
(124, '2025-03-31', 275.40, '', '2025-04-09 01:08:16', NULL),
(125, '2025-03-31', 68.75, 'Cancelled', '2025-04-09 01:08:16', NULL),
(126, '2025-03-31', 149.99, 'Completed', '2025-04-09 01:08:16', NULL),
(127, '2025-03-31', 77.65, 'Pending', '2025-04-09 01:08:16', NULL),
(128, '2025-03-31', 129.99, '', '2025-04-09 01:08:16', NULL),
(129, '2025-03-31', 50.25, '', '2025-04-09 01:08:16', NULL),
(130, '2025-03-31', 199.99, 'Completed', '2025-04-09 01:08:16', NULL),
(131, '2025-03-31', 222.75, '', '2025-04-09 01:08:16', NULL),
(132, '2025-03-31', 310.50, '', '2025-04-09 01:08:16', NULL),
(133, '2025-03-31', 41.80, 'Cancelled', '2025-04-09 01:08:16', NULL),
(134, '2025-03-31', 105.90, 'Pending', '2025-04-09 01:08:16', NULL),
(135, '2025-03-31', 55.40, 'Completed', '2025-04-09 01:08:16', NULL),
(136, '2025-03-31', 370.25, '', '2025-04-09 01:08:16', NULL),
(137, '2025-03-31', 99.99, 'Pending', '2025-04-09 01:08:16', NULL),
(138, '2025-03-31', 290.75, 'Completed', '2025-04-09 01:08:16', NULL),
(139, '2025-03-31', 49.50, 'Cancelled', '2025-04-09 01:08:16', NULL),
(140, '2025-03-31', 74.84, '', '2025-04-09 01:08:16', NULL),
(141, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 1),
(142, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 2),
(143, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 3),
(144, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 1),
(145, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 2),
(146, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 3),
(147, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 1),
(148, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 2),
(149, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 3),
(150, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 1),
(151, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 2),
(152, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 3),
(153, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 1),
(154, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 2),
(155, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 3),
(156, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 1),
(157, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 2),
(158, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 3),
(159, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 1),
(160, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 2),
(161, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 3),
(162, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 1),
(163, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 2),
(164, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 3),
(165, '0000-00-00', 0.00, 'Pending', '2025-04-09 01:08:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `SupplierID` int(11) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `ContactPerson` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 
-- update suplliers
-- 
ALTER TABLE suppliers
ADD COLUMN CategoryID INT(11) AFTER SupplierID;



--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`SupplierID`, `Name`, `ContactPerson`, `Phone`, `image`, `Email`, `Address`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 'BuildMaster Supplies Co.', 'John Carter', '09123456789', NULL, 'john@buildmaster.com', '123 Industrial Zone, Metro City', '2025-03-18 00:13:58', '2025-03-18 00:13:58'),
(2, 'Concrete Plus Ltd.', 'Maria Gonzales', '09234567890', NULL, 'maria@concreteplus.com', '456 Cement Road, Capital Town', '2025-03-18 00:13:58', '2025-03-18 00:13:58'),
(3, 'SteelStrong Corp.', 'Alex Tan', '09345678901', NULL, 'alex@steelstrong.com', '789 Steel Avenue, Iron District', '2025-03-18 00:13:58', '2025-03-18 00:13:58'),
(4, 'TimberTrade Inc.', 'Lucy Reyes', '09456789012', NULL, 'lucy@timbertrade.com', '101 Wood Street, Forest Park', '2025-03-18 00:13:58', '2025-03-18 00:13:58'),
(5, 'RoofTop Materials', 'Daniel Cruz', '09567890123', NULL, 'daniel@rooftopmaterials.com', '55 Roofline Drive, Skyline City', '2025-03-18 00:13:58', '2025-03-18 00:13:58'),
(6, 'PlumbPro Solutions', 'Nina Herrera', '09678901234', NULL, 'nina@plumbpro.com', '23 Pipe Lane, Flow Town', '2025-03-18 00:13:58', '2025-03-18 00:13:58'),
(7, 'ElectroTech Supplies', 'Mark Lim', '09789012345', NULL, 'mark@electrotech.com', '77 Electric Blvd, Volt City', '2025-03-18 00:13:58', '2025-03-18 00:13:58'),
(8, 'PaintWorks Inc.', 'Anna dela Cruz', '09890123456', NULL, 'anna@paintworks.com', '32 Color Street, Hueville', '2025-03-18 00:13:58', '2025-03-18 00:13:58'),
(9, 'SafeTools PH', 'Chris Uy', '09901234567', NULL, 'chris@safetoolsph.com', '88 Safety Way, Securetown', '2025-03-18 00:13:58', '2025-03-18 00:13:58'),
(10, 'HeavyDuty Machinery', 'Rachel Santos', '09012345678', NULL, 'rachel@heavyduty.com', '99 Machine Zone, Power City', '2025-03-18 00:13:58', '2025-03-18 00:13:58'),
(11, 'ABC Construction Supply', 'Alice Johnson', '0991234567', NULL, 'alice@abc.com', '123 Main St, Phnom Penh', '2025-03-26 07:53:57', '2025-03-26 07:53:57'),
(12, 'XYZ Hardware', 'Bob Smith', '0887654321', NULL, 'bob@xyz.com', '456 Industrial Rd, Siem Reap', '2025-03-26 07:53:57', '2025-03-26 07:53:57'),
(13, 'BuildPro Materials', 'Charlie Lee', '0976543210', NULL, 'charlie@buildpro.com', '789 Depot Ave, Sihanoukville', '2025-03-26 07:53:57', '2025-03-26 07:53:57'),
(14, 'ABC Construction Supply', 'Alice Johnson', '0991234567', NULL, 'alice@abc.com', '123 Main St, Phnom Penh', '2025-03-26 07:54:23', '2025-03-26 07:54:23'),
(15, 'XYZ Hardware', 'Bob Smith', '0887654321', NULL, 'bob@xyz.com', '456 Industrial Rd, Siem Reap', '2025-03-26 07:54:23', '2025-03-26 07:54:23'),
(16, 'BuildPro Materials', 'Charlie Lee', '0976543210', NULL, 'charlie@buildpro.com', '789 Depot Ave, Sihanoukville', '2025-03-26 07:54:23', '2025-03-26 07:54:23'),
(17, 'ABC Construction Supply', 'Alice Johnson', '0991234567', NULL, 'alice@abc.com', '123 Main St, Phnom Penh', '2025-03-26 07:54:32', '2025-03-26 07:54:32'),
(18, 'XYZ Hardware', 'Bob Smith', '0887654321', NULL, 'bob@xyz.com', '456 Industrial Rd, Siem Reap', '2025-03-26 07:54:32', '2025-03-26 07:54:32'),
(19, 'BuildPro Materials', 'Charlie Lee', '0976543210', NULL, 'charlie@buildpro.com', '789 Depot Ave, Sihanoukville', '2025-03-26 07:54:32', '2025-03-26 07:54:32');

-- --------------------------------------------------------

--
-- Table structure for table `top_selling_materials`
--

CREATE TABLE `top_selling_materials` (
  `MaterialID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `UnitPrice` decimal(10,2) DEFAULT NULL,
  `SupplierID` int(11) DEFAULT NULL,
  `MinStockLevel` int(11) DEFAULT NULL,
  `ReorderLevel` int(11) DEFAULT NULL,
  `UnitOfMeasure` varchar(50) DEFAULT NULL,
  `Size` varchar(50) DEFAULT NULL,
  `ImagePath` text DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Brand` varchar(100) DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL,
  `SupplierContact` text DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `WarrantyPeriod` varchar(50) DEFAULT NULL,
  `TotalSold` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `top_selling_materials`
--

INSERT INTO `top_selling_materials` (`MaterialID`, `Name`, `CategoryID`, `Quantity`, `UnitPrice`, `SupplierID`, `MinStockLevel`, `ReorderLevel`, `UnitOfMeasure`, `Size`, `ImagePath`, `Description`, `CreatedAt`, `UpdatedAt`, `Brand`, `Location`, `SupplierContact`, `Status`, `WarrantyPeriod`, `TotalSold`) VALUES
(28, 'Ramco Cement', 1, 90, 5.00, 1, 0, 5, '', 'Bav', 'uploads/images/67efc9cfcc1c3_9b2221a70099156c00ba9cd75afde65b.jpg', '', '2025-04-04 12:00:15', '2025-04-04 12:00:15', '', '', '', '', '0', 320),
(29, 'Zinc plated Chipboard screws', 3, 70, 10.00, 1, 0, 6, '', 'Box', 'uploads/images/67efca9f3ea9a_d5ca745d86b6bc1610703de6768e96b4.jpg', '', '2025-04-04 12:03:43', '2025-04-04 12:03:43', '', '', '', '', '0', 340),
(30, 'Sand', 1, 3, 50.00, 1, 0, 0, '', 'Car', 'uploads/images/67efcaf6b134a_7a64fff940f3f0debcaf25c5fdddc87e.jpg', '', '2025-04-04 12:05:10', '2025-04-05 04:09:19', '', '', '', 'Active', '0', 410),
(31, 'Fan Hateri', 7, 60, 30.00, 7, 0, 0, '', 'Fan', 'uploads/images/67efcb9baa757_f498619669ecb103b9d4f355cb7b8401.jpg', '', '2025-04-04 12:07:55', '2025-04-05 05:35:19', '', '', '', 'Discontinued', '0', 320),
(32, 'ដែក40', 3, 100, 2.00, 1, 0, 6, '', 'ដើម', 'uploads/images/67f329bf51f2d_78269eb4d70fd4710ceee85908d098a6.jpg', '', '2025-04-07 01:26:23', '2025-04-07 01:26:23', '', '', '', '', '0', 340);

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
(1, 'default_value', NULL, 'chandy', 'neat', 'chandyneat94@gmail.com', '', 1, '$2y$10$w/vX6KMPNUfArPcVyViX4uQAf5R1iG9z.53o8pKpqnw0wztt83ICC', 'Chomka Duong', '', '2025-03-18 00:19:37', '2025-03-18 00:20:20'),
(2, 'default_value', NULL, 'Chandy', 'Neat', 'chandyneat9999@gmail.com', '093967654', 1, '$2y$10$oyNswhcyN11Bd3BEcYrcfuhSS11GZG5d0QKhacwkYDijvEWkvSqVO', 'Phnom Penh', '', '2025-03-20 11:11:26', '2025-03-26 11:25:43'),
(3, 'default_value', NULL, 'Senghin', 'Loem', 'senghin@gmail.com', '', 2, '$2y$10$qmK/SH7U6PZLfXOFL/7equVKxNBqPvX9VmzeChIt4F9DWUBCigGl6', '', '', '2025-04-02 10:59:41', '2025-04-02 10:08:50'),
(4, 'default_value', NULL, 'Chandy', 'Neat', 'chandyneat987@gmail.com', '', 2, '$2y$10$XlarGS2iv492SS.kQ0dcgOxJDr8f12PwC7u7p1z9Id1DjEVGBu.je', '', '', '2025-04-01 13:34:38', '2025-04-02 10:29:50'),
(5, 'default_value', NULL, 'Chandy', 'Neat', 'chandyneat89@gmail.com', '', 2, '$2y$10$aZe.pYH4ioXD97p9.5TxkuoMC.iEUzBKEUKTVQyx1codqnK3jI1rC', '', '', '2025-04-02 08:13:17', '2025-04-02 10:08:01'),
(7, 'default_value', 'uploads/1743590713_332d9c658b26340cd0f5808371458659.jpg', 'Ronaldo', 'Smos', 'ronaldosmos94@gmail.com', '093967654', 6, '$2y$10$500ShBTa8VRimQprJXZrC.93AaGddNRf.9cEDxNXjx4xAlj4O.wkK', 'Cambodia Phnom Penh', 'Chomka Duong', '2025-04-02 10:45:13', '2025-04-02 10:51:39'),
(8, 'default_value', 'uploads/1743590925_06ae800957fd7efabe894de3d1c0611b.jpg', 'Dyy', 'Development', 'chandyneat0094@gmail.com', '093967689', 4, '$2y$10$8ZN5cT/Gc.eoJo0uW2ATAe3q6dV.AHK9FHL3YODqmlCMKybx/uom2', 'Cambodia Phnom Penh', 'Chomka Duong', '2025-04-02 10:48:45', '2025-04-02 10:48:45'),
(10, 'default_value', NULL, 'Darin', 'Development', 'darin94@gmail.com', '', 2, '$2y$10$W/y5b415UMXbNMbvlYB2fej/PCrMAhPhusWo.hZIwow2PtXGSLx/u', '', '', '2025-04-02 10:55:25', '2025-04-02 10:55:25'),
(11, 'default_value', NULL, 'Chantha', 'Dy', 'chantha9999@gmail.com', '', 2, '$2y$10$uhWzwOZtwBOcw.ba/jtLN.F6bsLCavxcm7cLw5oRmQBINK1EwfXRO', '', '', '2025-04-03 00:27:47', '2025-04-03 00:27:47'),
(12, 'default_value', NULL, 'Chorina', 'Thin', 'thinchorina9999@gmail.com', '', 2, '$2y$10$0Qb1d4.Pl2pSV56aTgs/IuMA4wLc9FBqd1KNDA94OZteotC1Psljy', '', '', '2025-04-07 00:52:38', '2025-04-07 00:52:38'),
(13, 'default_value', NULL, 'Sohean', 'Chan', 'sopeahnpgouk9999@gmail.com', '', 2, '$2y$10$DRh6tDArirNUpXSN6Kd4fej5xIhUWzk9tR1cV6LmfUplG7CujQXN.', '', '', '2025-04-07 02:12:22', '2025-04-07 02:12:22'),
(14, 'default_value', NULL, 'Meng', 'Khang', 'menghang9999@gmail.com', '', 2, '$2y$10$DfM2/iOHX3Ro7SoJPNEohOuxqfBrgw7PzPl9EY7IFyo2Vg/dUYuOi', '', '', '2025-04-07 02:28:18', '2025-04-07 02:28:18'),
(15, 'default_value', NULL, 'Chan', 'Leng', 'chanleng9999@gmail.com', '', 2, '$2y$10$hHkmAYWtKcp7IijuJXfFjOS.nNz86XS7FQEYQRjtFywOxl04vSBhu', '', '', '2025-04-07 02:30:59', '2025-04-07 02:30:59'),
(16, 'default_value', NULL, 'Makara', 'Chan', 'chanmakara9999@gmail.com', '', 2, '$2y$10$lpN2JjZL2O.NX.aRfKiJ8e28hs1.uttXiSHVhhAOIkPaynrJ8PKSS', '', '', '2025-04-07 03:54:53', '2025-04-07 03:54:53'),
(17, 'default_value', NULL, 'Dyy', 'Development', 'chandy.neat@student.passerellesnumeriques.org', '', 2, '$2y$10$3u/6H4mqVmuiTcPTcN5C6OsQ689UMhZ2huXn1UPMTg51Uf236Ty6y', '', '', '2025-04-07 07:53:48', '2025-04-07 07:53:48'),
(18, 'default_value', NULL, 'Nona', 'Loem', 'nona@student.passerellesnumeriques.org', '', 2, '$2y$10$pzTsYufxZk1TytzQxi6A.emr/c3O0SoeMFSacs6PDSj7SnvVvX34S', '', '', '2025-04-07 09:50:44', '2025-04-07 09:50:44'),
(19, 'default_value', NULL, 'Koko', 'jenny', 'kokojenii94@gmail.com', '', 2, '$2y$10$X1yHobF2fn3WOwLDvcgHwOw0rniwBbuvoMNfG119apr8DM4/HGIE6', '', '', '2025-04-07 12:54:56', '2025-04-07 12:54:56'),
(20, 'default_value', NULL, 'dYY', 'Smos', 'chandyneat8888@gmail.com', '', 2, '$2y$10$DjtAXMisTCOdsFCw7FFXqux/p5nWFrxpNje9IU6feXE8Lf1XCOV7.', '', '', '2025-04-07 13:03:24', '2025-04-07 13:03:24'),
(21, 'default_value', NULL, 'Somnang', 'Neat', 'somnangneat9999@gmail.com', '', 2, '$2y$10$DDiKQTXMhaTco3SpJnuQbO/PEzd6fAXB9n/qrmCQwPfezum2zPWhC', '', '', '2025-04-08 13:48:22', '2025-04-08 13:48:22'),
(22, 'default_value', NULL, 'Chantha', 'leng', 'chanthatleng9999@gmail.com', '', 2, '$2y$10$YCWNN5f5vivrcm.jFGHfF.hMsuO.BVdGUWzsZQnaqkRHjcLZ2Gf7.', '', '', '2025-04-09 01:54:45', '2025-04-09 01:54:45');

-- --------------------------------------------------------

--
-- Structure for view `all_day_customers`
--
DROP TABLE IF EXISTS `all_day_customers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_day_customers`  AS SELECT cast(`customers`.`created_at` as date) AS `customer_date`, count(0) AS `total_customers_today`, (select count(0) from `customers` where cast(`customers`.`created_at` as date) = cast(`customer_date` as date) - interval 1 day) AS `total_customers_yesterday`, CASE WHEN (select count(0) from `customers` where cast(`customers`.`created_at` as date) = cast(`customer_date` as date) - interval 1 day) = 0 THEN NULL ELSE round((count(0) - (select count(0) from `customers` where cast(`customers`.`created_at` as date) = cast(`customer_date` as date) - interval 1 day)) / (select count(0) from `customers` where cast(`customers`.`created_at` as date) = cast(`customer_date` as date) - interval 1 day) * 100,2) END AS `percent_change` FROM `customers` GROUP BY cast(`customers`.`created_at` as date) ORDER BY cast(`customers`.`created_at` as date) DESC ;

-- --------------------------------------------------------

--
-- Structure for view `customers`
--
DROP TABLE IF EXISTS `customers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customers`  AS SELECT `users`.`user_id` AS `user_id`, `users`.`select_user` AS `select_user`, `users`.`profile_image` AS `profile_image`, `users`.`first_name` AS `first_name`, `users`.`last_name` AS `last_name`, `users`.`email` AS `email`, `users`.`phone` AS `phone`, `users`.`role_id` AS `role_id`, `users`.`password` AS `password`, `users`.`address` AS `address`, `users`.`street_address` AS `street_address`, `users`.`created_at` AS `created_at`, `users`.`updated_at` AS `updated_at` FROM `users` WHERE `users`.`role_id` = 2 ;

-- --------------------------------------------------------

--
-- Structure for view `daily_money_summary`
--
DROP TABLE IF EXISTS `daily_money_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `daily_money_summary`  AS SELECT `summary`.`record_date` AS `record_date`, coalesce(`summary`.`sales_total`,0) + coalesce(`summary`.`payment_total`,0) + coalesce(`summary`.`invoice_total`,0) AS `total_income`, coalesce(`summary`.`expense_total`,0) + coalesce(`summary`.`po_total`,0) + coalesce(`summary`.`received_total`,0) AS `total_expenses`, coalesce(`summary`.`sales_total`,0) + coalesce(`summary`.`payment_total`,0) + coalesce(`summary`.`invoice_total`,0) - (coalesce(`summary`.`expense_total`,0) + coalesce(`summary`.`po_total`,0) + coalesce(`summary`.`received_total`,0)) AS `today_money`, CASE WHEN `yesterday`.`today_money` is null OR `yesterday`.`today_money` = 0 THEN NULL ELSE round((coalesce(`summary`.`sales_total`,0) + coalesce(`summary`.`payment_total`,0) + coalesce(`summary`.`invoice_total`,0) - (coalesce(`summary`.`expense_total`,0) + coalesce(`summary`.`po_total`,0) + coalesce(`summary`.`received_total`,0)) - `yesterday`.`today_money`) / `yesterday`.`today_money` * 100,2) END AS `percent_change` FROM ((select `d`.`record_date` AS `record_date`,`sales`.`sales_total` AS `sales_total`,`pay`.`payment_total` AS `payment_total`,`inv`.`invoice_total` AS `invoice_total`,`exp`.`expense_total` AS `expense_total`,`po`.`po_total` AS `po_total`,`rec`.`received_total` AS `received_total` from (((((((select cast(`salesorderdetails`.`SalesOrderDetail_Date` as date) AS `record_date` from `salesorderdetails` union select cast(`payments`.`PaymentDate` as date) AS `DATE(PaymentDate)` from `payments` union select cast(`invoices`.`InvoiceDate` as date) AS `DATE(invoiceDate)` from `invoices` union select cast(`expenses`.`date_expenses` as date) AS `DATE(date_expenses)` from `expenses` union select cast(`purchaseorders`.`OrderDate` as date) AS `DATE(OrderDate)` from `purchaseorders` union select cast(`goodsreceived`.`ReceivedDate` as date) AS `DATE(ReceivedDate)` from `goodsreceived`) `d` left join (select cast(`salesorderdetails`.`SalesOrderDetail_Date` as date) AS `record_date`,sum(`salesorderdetails`.`Total`) AS `sales_total` from `salesorderdetails` group by cast(`salesorderdetails`.`SalesOrderDetail_Date` as date)) `sales` on(`sales`.`record_date` = `d`.`record_date`)) left join (select cast(`payments`.`PaymentDate` as date) AS `record_date`,sum(`payments`.`Amount`) AS `payment_total` from `payments` group by cast(`payments`.`PaymentDate` as date)) `pay` on(`pay`.`record_date` = `d`.`record_date`)) left join (select cast(`invoices`.`InvoiceDate` as date) AS `record_date`,sum(`invoices`.`Amount`) AS `invoice_total` from `invoices` where `invoices`.`payment_status` = 'Paid' group by cast(`invoices`.`InvoiceDate` as date)) `inv` on(`inv`.`record_date` = `d`.`record_date`)) left join (select cast(`expenses`.`date_expenses` as date) AS `record_date`,sum(`expenses`.`Amount`) AS `expense_total` from `expenses` group by cast(`expenses`.`date_expenses` as date)) `exp` on(`exp`.`record_date` = `d`.`record_date`)) left join (select cast(`purchaseorders`.`OrderDate` as date) AS `record_date`,sum(`purchaseorders`.`TotalAmount`) AS `po_total` from `purchaseorders` group by cast(`purchaseorders`.`OrderDate` as date)) `po` on(`po`.`record_date` = `d`.`record_date`)) left join (select cast(`goodsreceived`.`ReceivedDate` as date) AS `record_date`,sum(`goodsreceived`.`TotalReceivedAmount`) AS `received_total` from `goodsreceived` group by cast(`goodsreceived`.`ReceivedDate` as date)) `rec` on(`rec`.`record_date` = `d`.`record_date`))) `summary` left join (select `d`.`record_date` AS `record_date`,coalesce(`sales`.`sales_total`,0) + coalesce(`pay`.`payment_total`,0) + coalesce(`inv`.`invoice_total`,0) - (coalesce(`exp`.`expense_total`,0) + coalesce(`po`.`po_total`,0) + coalesce(`rec`.`received_total`,0)) AS `today_money` from (((((((select cast(`salesorderdetails`.`SalesOrderDetail_Date` as date) AS `record_date` from `salesorderdetails` union select cast(`payments`.`PaymentDate` as date) AS `DATE(PaymentDate)` from `payments` union select cast(`invoices`.`InvoiceDate` as date) AS `DATE(invoiceDate)` from `invoices` union select cast(`expenses`.`date_expenses` as date) AS `DATE(date_expenses)` from `expenses` union select cast(`purchaseorders`.`OrderDate` as date) AS `DATE(OrderDate)` from `purchaseorders` union select cast(`goodsreceived`.`ReceivedDate` as date) AS `DATE(ReceivedDate)` from `goodsreceived`) `d` left join (select cast(`salesorderdetails`.`SalesOrderDetail_Date` as date) AS `record_date`,sum(`salesorderdetails`.`Total`) AS `sales_total` from `salesorderdetails` group by cast(`salesorderdetails`.`SalesOrderDetail_Date` as date)) `sales` on(`sales`.`record_date` = `d`.`record_date`)) left join (select cast(`payments`.`PaymentDate` as date) AS `record_date`,sum(`payments`.`Amount`) AS `payment_total` from `payments` group by cast(`payments`.`PaymentDate` as date)) `pay` on(`pay`.`record_date` = `d`.`record_date`)) left join (select cast(`invoices`.`InvoiceDate` as date) AS `record_date`,sum(`invoices`.`Amount`) AS `invoice_total` from `invoices` where `invoices`.`payment_status` = 'Paid' group by cast(`invoices`.`InvoiceDate` as date)) `inv` on(`inv`.`record_date` = `d`.`record_date`)) left join (select cast(`expenses`.`date_expenses` as date) AS `record_date`,sum(`expenses`.`Amount`) AS `expense_total` from `expenses` group by cast(`expenses`.`date_expenses` as date)) `exp` on(`exp`.`record_date` = `d`.`record_date`)) left join (select cast(`purchaseorders`.`OrderDate` as date) AS `record_date`,sum(`purchaseorders`.`TotalAmount`) AS `po_total` from `purchaseorders` group by cast(`purchaseorders`.`OrderDate` as date)) `po` on(`po`.`record_date` = `d`.`record_date`)) left join (select cast(`goodsreceived`.`ReceivedDate` as date) AS `record_date`,sum(`goodsreceived`.`TotalReceivedAmount`) AS `received_total` from `goodsreceived` group by cast(`goodsreceived`.`ReceivedDate` as date)) `rec` on(`rec`.`record_date` = `d`.`record_date`))) `yesterday` on(`summary`.`record_date` + interval -1 day = `yesterday`.`record_date`)) ORDER BY `summary`.`record_date` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `daily_sales_summary`
--
DROP TABLE IF EXISTS `daily_sales_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `daily_sales_summary`  AS SELECT curdate() AS `record_date`, sum(case when cast(`salesorders`.`CreatedAt` as date) = curdate() then `salesorders`.`TotalAmount` else 0 end) AS `total_sales`, count(case when cast(`salesorders`.`CreatedAt` as date) = curdate() then 1 else NULL end) AS `total_sales_orders`, sum(case when cast(`salesorders`.`CreatedAt` as date) = curdate() - interval 1 day then `salesorders`.`TotalAmount` else 0 end) AS `yesterday_sales`, CASE WHEN sum(case when cast(`salesorders`.`CreatedAt` as date) = curdate() - interval 1 day then `salesorders`.`TotalAmount` else 0 end) = 0 THEN NULL ELSE round((sum(case when cast(`salesorders`.`CreatedAt` as date) = curdate() then `salesorders`.`TotalAmount` else 0 end) - sum(case when cast(`salesorders`.`CreatedAt` as date) = curdate() - interval 1 day then `salesorders`.`TotalAmount` else 0 end)) / sum(case when cast(`salesorders`.`CreatedAt` as date) = curdate() - interval 1 day then `salesorders`.`TotalAmount` else 0 end) * 100,2) END AS `percent_change` FROM `salesorders` ;

-- --------------------------------------------------------

--
-- Structure for view `monthlysalessummary`
--
DROP TABLE IF EXISTS `monthlysalessummary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `monthlysalessummary`  AS SELECT year(`salesorderdetails`.`SalesOrderDetail_Date`) AS `year`, month(`salesorderdetails`.`SalesOrderDetail_Date`) AS `month`, count(distinct `salesorderdetails`.`SalesOrderID`) AS `totalOrders`, sum(`salesorderdetails`.`Total`) AS `totalAmount`, round((sum(`salesorderdetails`.`Total`) - lag(sum(`salesorderdetails`.`Total`),1) over ( order by year(`salesorderdetails`.`SalesOrderDetail_Date`),month(`salesorderdetails`.`SalesOrderDetail_Date`))) / nullif(lag(sum(`salesorderdetails`.`Total`),1) over ( order by year(`salesorderdetails`.`SalesOrderDetail_Date`),month(`salesorderdetails`.`SalesOrderDetail_Date`)),0) * 100,2) AS `percentFromLastMonth` FROM `salesorderdetails` GROUP BY year(`salesorderdetails`.`SalesOrderDetail_Date`), month(`salesorderdetails`.`SalesOrderDetail_Date`) ORDER BY year(`salesorderdetails`.`SalesOrderDetail_Date`) ASC, month(`salesorderdetails`.`SalesOrderDetail_Date`) ASC ;

-- --------------------------------------------------------

--
-- Structure for view `monthly_purchase_order_summary`
--
DROP TABLE IF EXISTS `monthly_purchase_order_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `monthly_purchase_order_summary`  AS SELECT date_format(`purchaseorderdetails`.`OrderDate`,'%Y-%m') AS `month`, count(0) AS `total_orders`, sum(`purchaseorderdetails`.`TotalAmount`) AS `total_purchase_amount`, count(case when `purchaseorderdetails`.`Status` = 'Completed' then 1 else NULL end) AS `completed_orders`, count(case when `purchaseorderdetails`.`Status` = 'Pending' then 1 else NULL end) AS `pending_orders`, CASE WHEN count(0) = 0 THEN 0 ELSE round(count(case when `purchaseorderdetails`.`Status` = 'Completed' then 1 else NULL end) / count(0) * 100,2) END AS `completed_orders_percent` FROM `purchaseorderdetails` GROUP BY date_format(`purchaseorderdetails`.`OrderDate`,'%Y-%m') ORDER BY date_format(`purchaseorderdetails`.`OrderDate`,'%Y-%m') ASC ;

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
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD UNIQUE KEY `Phone` (`Phone`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `idx_employee_name` (`Name`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`ExpenseID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `goodsreceived`
--
ALTER TABLE `goodsreceived`
  ADD PRIMARY KEY (`GoodsReceivedID`),
  ADD KEY `PurchaseOrderID` (`PurchaseOrderID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`InvoiceID`),
  ADD KEY `SalesOrderID` (`SalesOrderID`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`MaterialID`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `SupplierID` (`SupplierID`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `purchaseorderdetails`
--
ALTER TABLE `purchaseorderdetails`
  ADD PRIMARY KEY (`PurchaseOrderID`),
  ADD KEY `MaterialID` (`MaterialID`),
  ADD KEY `SupplierID` (`SupplierID`);

--
-- Indexes for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  ADD PRIMARY KEY (`PurchaseOrderID`),
  ADD KEY `SupplierID` (`SupplierID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `salesorderdetails`
--
ALTER TABLE `salesorderdetails`
  ADD PRIMARY KEY (`SalesOrderDetailID`),
  ADD KEY `SalesOrderID` (`SalesOrderID`),
  ADD KEY `MaterialID` (`MaterialID`);

--
-- Indexes for table `salesorders`
--
ALTER TABLE `salesorders`
  ADD PRIMARY KEY (`SalesOrderID`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`SupplierID`);

--
-- Indexes for table `top_selling_materials`
--
ALTER TABLE `top_selling_materials`
  ADD PRIMARY KEY (`MaterialID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `ExpenseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `goodsreceived`
--
ALTER TABLE `goodsreceived`
  MODIFY `GoodsReceivedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `InvoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `MaterialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `purchaseorderdetails`
--
ALTER TABLE `purchaseorderdetails`
  MODIFY `PurchaseOrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  MODIFY `PurchaseOrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `salesorderdetails`
--
ALTER TABLE `salesorderdetails`
  MODIFY `SalesOrderDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `salesorders`
--
ALTER TABLE `salesorders`
  MODIFY `SalesOrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD CONSTRAINT `audit_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`EmployeeID`) ON DELETE SET NULL;

--
-- Constraints for table `goodsreceived`
--
ALTER TABLE `goodsreceived`
  ADD CONSTRAINT `goodsreceived_ibfk_1` FOREIGN KEY (`PurchaseOrderID`) REFERENCES `purchaseorders` (`PurchaseOrderID`) ON DELETE CASCADE,
  ADD CONSTRAINT `goodsreceived_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`EmployeeID`) ON DELETE SET NULL;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`SalesOrderID`) REFERENCES `salesorders` (`SalesOrderID`) ON DELETE CASCADE;

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

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `salesorders` (`SalesOrderID`) ON DELETE CASCADE;

--
-- Constraints for table `purchaseorderdetails`
--
ALTER TABLE `purchaseorderdetails`
  ADD CONSTRAINT `purchaseorderdetails_ibfk_1` FOREIGN KEY (`MaterialID`) REFERENCES `materials` (`MaterialID`),
  ADD CONSTRAINT `purchaseorderdetails_ibfk_2` FOREIGN KEY (`SupplierID`) REFERENCES `suppliers` (`SupplierID`);

--
-- Constraints for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  ADD CONSTRAINT `purchaseorders_ibfk_1` FOREIGN KEY (`SupplierID`) REFERENCES `suppliers` (`SupplierID`) ON DELETE CASCADE;

--
-- Constraints for table `salesorderdetails`
--
ALTER TABLE `salesorderdetails`
  ADD CONSTRAINT `salesorderdetails_ibfk_1` FOREIGN KEY (`SalesOrderID`) REFERENCES `salesorders` (`SalesOrderID`) ON DELETE CASCADE,
  ADD CONSTRAINT `salesorderdetails_ibfk_2` FOREIGN KEY (`MaterialID`) REFERENCES `materials` (`MaterialID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
<<<<<<< HEAD
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
=======
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- update customers table 
ALTER TABLE Customers ADD COLUMN created DATE;

UPDATE Customers SET created = '2025-03-28';

--
-- update customers table 
--
ALTER TABLE customers 
ADD COLUMN Profile VARCHAR(255) AFTER CustomerID,
ADD COLUMN Status VARCHAR(50) AFTER Address,
ADD COLUMN Quantity INT AFTER MaterialID;
>>>>>>> 8e5876e9d77f42d7799115338ff016561dfdf94d
