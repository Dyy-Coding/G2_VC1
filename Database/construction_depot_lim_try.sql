-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2025 at 05:07 AM
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
(57, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-04-03 03:04:56');

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
(23, 'Smart Building Technologies', 'Home automation, smart locks, IoT sensors, building management systems, etc.', '2025-03-18 00:12:10', '2025-03-18 00:12:10'),
(24, 'Sand', 'good for building', '2025-03-28 02:49:19', '2025-03-28 02:49:19'),
(25, 'Sand sea', 'good for building', '2025-03-31 00:42:06', '2025-03-31 00:42:06');

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
(1, 'Fan', 1, 70, 5.99, 2, 2, 7, 'kg', 'm', NULL, 'jhjhttr', '2025-03-18 17:48:45', '2025-03-18 17:48:45', 'K cement', 'Phnom penh', '07654352424', '', 2),
(2, 'Fan', 1, 70, 5.99, 2, 2, 7, 'kg', 'm', NULL, 'jhjhttr', '2025-03-18 17:49:22', '2025-03-18 17:49:22', 'K cement', 'Phnom penh', '07654352424', '', 2),
(5, 'Fan', 1, 90, 5.89, 1, 3, 6, 'kg', 'm3', NULL, 'hdhdgsg', '2025-03-18 18:12:54', '2025-03-18 18:12:54', 'K cement', 'Phnom penh', '07654352424', '', 2),
(6, 'lymeng', 1, 90, 5.88, 3, 2, 6, 'kg', 'kg', NULL, 'man', '2025-03-18 18:26:43', '2025-03-18 18:26:43', 'K cementmong', 'Phnom penh', '07654352486', '', 1),
(7, 'chandy_neat', 1, 67, 5.99, 1, 2, 6, 'Bav', 'kg', NULL, 'nnnnnnbb', '2025-03-18 19:02:07', '2025-03-18 19:02:07', 'K cementmong', 'Phnom penh', '07654352486', '', 2),
(8, 'chandy_neat', 1, 0, 5.99, 1, 0, 0, '', 'kg', NULL, 'nnnnnnbb', '2025-03-18 19:06:38', '2025-03-31 18:35:14', 'K cementmong', '', '', 'Active', 0),
(9, 'lymeng', 19, 0, 7.99, 2, 0, 0, '', 'kg', NULL, 'hdhfdhdh', '2025-03-18 19:42:44', '2025-04-01 18:30:23', 'K cementmong', '', '', 'Active', 0),
(20, 'Gravel', 4, 3, 1.50, 6, 0, 0, '', 'Medium', 'images/gravel.jpg', 'Gravel for foundation works.', '2025-03-26 16:18:55', '2025-03-31 18:36:52', 'BrandE', '', '', 'Active', 0),
(21, 'Paint', 5, 0, 15.00, 7, 0, 0, '', '5L', 'images/paint.jpg', 'Waterproof paint for external surfaces.', '2025-03-26 16:18:55', '2025-03-31 17:12:12', 'BrandF', '', '', 'Discontinued', 0),
(22, 'Tiles', 6, 2, 2.50, 8, 0, 0, '', '30x30cm', 'images/tiles.jpg', 'Ceramic tiles for flooring and wall tiling.', '2025-03-26 16:18:55', '2025-03-31 17:12:29', 'BrandG', '', '', 'Active', 0),
(23, 'Book Smart', 19, 3, 90.00, 6, 0, 0, '', 'books', 'uploads/images/67ea58a816de0_8d0c72f49aaa0a6a35d34c7b98035baa.jpg', '', '2025-03-31 15:33:47', '2025-03-31 18:36:02', 'JMK', '', '', 'Active', 0);

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
(2, 'Inventory Management', '/inventory', 'Manage stock and warehouse items', 'Inventory'),
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
(7, 2, 20, 1.80, '2024-04-01', 1, 'Pending', 0.00, 0.10, '2024-04-10'),
(8, 1, 22, 2.50, '2024-04-15', 2, 'Completed', 0.05, 0.12, '2024-04-20'),
(9, 5, 30, 3.75, '2024-05-01', 1, 'Shipped', 0.10, 0.15, '2024-05-10'),
(10, 6, 15, 4.00, '2024-05-15', 2, 'Pending', 0.00, 0.08, '2024-05-20'),
(11, 7, 25, 5.50, '2024-06-01', 1, 'Completed', 0.05, 0.12, '2024-06-10'),
(12, 8, 10, 8.00, '2024-06-15', 2, 'Pending', 0.00, 0.10, '2024-06-20'),
(15, 2, 20, 1.80, '2024-04-01', 1, 'Pending', 0.00, 0.10, '2024-04-10'),
(16, 1, 22, 2.50, '2024-04-15', 2, 'Completed', 0.05, 0.12, '2024-04-20'),
(17, 5, 30, 3.75, '2024-05-01', 1, 'Shipped', 0.10, 0.15, '2024-05-10'),
(18, 6, 15, 4.00, '2024-05-15', 2, 'Pending', 0.00, 0.08, '2024-05-20'),
(19, 7, 25, 5.50, '2024-06-01', 1, 'Completed', 0.05, 0.12, '2024-06-10'),
(20, 8, 10, 8.00, '2024-06-15', 2, 'Pending', 0.00, 0.10, '2024-06-20'),
(21, 7, 35, 7.20, '2024-07-01', 1, 'Shipped', 0.10, 0.18, '2024-07-10'),
(22, 8, 20, 3.00, '2024-07-15', 2, 'Completed', 0.07, 0.12, '2024-07-20'),
(25, 2, 20, 1.80, '2024-04-01', 1, 'Pending', 0.00, 0.10, '2024-04-10'),
(26, 1, 22, 2.50, '2024-04-15', 2, 'Completed', 0.05, 0.12, '2024-04-20'),
(27, 5, 30, 3.75, '2024-05-01', 1, 'Shipped', 0.10, 0.15, '2024-05-10'),
(28, 6, 15, 4.00, '2024-05-15', 2, 'Pending', 0.00, 0.08, '2024-05-20'),
(29, 7, 25, 5.50, '2024-06-01', 1, 'Completed', 0.05, 0.12, '2024-06-10'),
(30, 8, 10, 8.00, '2024-06-15', 2, 'Pending', 0.00, 0.10, '2024-06-20'),
(31, 7, 35, 7.20, '2024-07-01', 1, 'Shipped', 0.10, 0.18, '2024-07-10'),
(32, 8, 20, 3.00, '2024-07-15', 2, 'Completed', 0.07, 0.12, '2024-07-20'),
(35, 2, 20, 1.80, '2024-04-01', 1, 'Pending', 0.00, 0.10, '2024-04-10'),
(36, 1, 22, 2.50, '2024-04-15', 2, 'Completed', 0.05, 0.12, '2024-04-20'),
(37, 5, 30, 3.75, '2024-05-01', 1, 'Shipped', 0.10, 0.15, '2024-05-10'),
(38, 6, 15, 4.00, '2024-05-15', 2, 'Pending', 0.00, 0.08, '2024-05-20'),
(39, 7, 25, 5.50, '2024-06-01', 1, 'Completed', 0.05, 0.12, '2024-06-10'),
(40, 8, 10, 8.00, '2024-06-15', 2, 'Pending', 0.00, 0.10, '2024-06-20'),
(41, 7, 35, 7.20, '2024-07-01', 1, 'Shipped', 0.10, 0.18, '2024-07-10'),
(42, 8, 20, 3.00, '2024-07-15', 2, 'Completed', 0.07, 0.12, '2024-07-20'),
(43, 1, 40, 5.50, '2024-08-01', 1, 'Pending', 0.00, 0.10, '2024-08-10'),
(44, 2, 50, 2.00, '2024-08-15', 2, 'Completed', 0.05, 0.15, '2024-08-20'),
(47, 2, 20, 1.80, '2024-04-01', 1, 'Pending', 0.00, 0.10, '2024-04-10'),
(48, 1, 22, 2.50, '2024-04-15', 2, 'Completed', 0.05, 0.12, '2024-04-20'),
(49, 5, 30, 3.75, '2024-05-01', 1, 'Shipped', 0.10, 0.15, '2024-05-10'),
(50, 6, 15, 4.00, '2024-05-15', 2, 'Pending', 0.00, 0.08, '2024-05-20'),
(51, 7, 25, 5.50, '2024-06-01', 1, 'Completed', 0.05, 0.12, '2024-06-10'),
(52, 8, 10, 8.00, '2024-06-15', 2, 'Pending', 0.00, 0.10, '2024-06-20'),
(53, 7, 35, 7.20, '2024-07-01', 1, 'Shipped', 0.10, 0.18, '2024-07-10'),
(54, 8, 20, 3.00, '2024-07-15', 2, 'Completed', 0.07, 0.12, '2024-07-20'),
(55, 1, 40, 5.50, '2024-08-01', 1, 'Pending', 0.00, 0.10, '2024-08-10'),
(56, 2, 50, 2.00, '2024-08-15', 2, 'Completed', 0.05, 0.15, '2024-08-20'),
(57, 1, 15, 9.00, '2024-09-01', 1, 'Shipped', 0.10, 0.12, '2024-09-10'),
(58, 2, 30, 4.50, '2024-09-15', 2, 'Pending', 0.05, 0.10, '2024-09-20'),
(61, 2, 20, 1.80, '2024-04-01', 1, 'Pending', 0.00, 0.10, '2024-04-10'),
(62, 1, 22, 2.50, '2024-04-15', 2, 'Completed', 0.05, 0.12, '2024-04-20'),
(63, 5, 30, 3.75, '2024-05-01', 1, 'Shipped', 0.10, 0.15, '2024-05-10'),
(64, 6, 15, 4.00, '2024-05-15', 2, 'Pending', 0.00, 0.08, '2024-05-20'),
(65, 7, 25, 5.50, '2024-06-01', 1, 'Completed', 0.05, 0.12, '2024-06-10'),
(66, 8, 10, 8.00, '2024-06-15', 2, 'Pending', 0.00, 0.10, '2024-06-20'),
(67, 7, 35, 7.20, '2024-07-01', 1, 'Shipped', 0.10, 0.18, '2024-07-10'),
(68, 8, 20, 3.00, '2024-07-15', 2, 'Completed', 0.07, 0.12, '2024-07-20'),
(69, 1, 40, 5.50, '2024-08-01', 1, 'Pending', 0.00, 0.10, '2024-08-10'),
(70, 2, 50, 2.00, '2024-08-15', 2, 'Completed', 0.05, 0.15, '2024-08-20'),
(71, 1, 15, 9.00, '2024-09-01', 1, 'Shipped', 0.10, 0.12, '2024-09-10'),
(72, 2, 30, 4.50, '2024-09-15', 2, 'Pending', 0.05, 0.10, '2024-09-20'),
(73, 20, 25, 3.80, '2024-10-01', 1, 'Completed', 0.05, 0.12, '2024-10-10'),
(74, 21, 40, 6.20, '2024-10-15', 2, 'Pending', 0.10, 0.15, '2024-10-20'),
(77, 2, 20, 1.80, '2024-04-01', 1, 'Pending', 0.00, 0.10, '2024-04-10'),
(78, 1, 22, 2.50, '2024-04-15', 2, 'Completed', 0.05, 0.12, '2024-04-20'),
(79, 5, 30, 3.75, '2024-05-01', 1, 'Shipped', 0.10, 0.15, '2024-05-10'),
(80, 6, 15, 4.00, '2024-05-15', 2, 'Pending', 0.00, 0.08, '2024-05-20'),
(81, 7, 25, 5.50, '2024-06-01', 1, 'Completed', 0.05, 0.12, '2024-06-10'),
(82, 8, 10, 8.00, '2024-06-15', 2, 'Pending', 0.00, 0.10, '2024-06-20'),
(83, 7, 35, 7.20, '2024-07-01', 1, 'Shipped', 0.10, 0.18, '2024-07-10'),
(84, 8, 20, 3.00, '2024-07-15', 2, 'Completed', 0.07, 0.12, '2024-07-20'),
(85, 1, 40, 5.50, '2024-08-01', 1, 'Pending', 0.00, 0.10, '2024-08-10'),
(86, 2, 50, 2.00, '2024-08-15', 2, 'Completed', 0.05, 0.15, '2024-08-20'),
(87, 1, 15, 9.00, '2024-09-01', 1, 'Shipped', 0.10, 0.12, '2024-09-10'),
(88, 2, 30, 4.50, '2024-09-15', 2, 'Pending', 0.05, 0.10, '2024-09-20'),
(89, 20, 25, 3.80, '2024-10-01', 1, 'Completed', 0.05, 0.12, '2024-10-10'),
(90, 21, 40, 6.20, '2024-10-15', 2, 'Pending', 0.10, 0.15, '2024-10-20'),
(91, 1, 30, 4.60, '2024-11-01', 1, 'Shipped', 0.00, 0.10, '2024-11-10'),
(92, 1, 20, 5.00, '2024-11-15', 2, 'Completed', 0.05, 0.12, '2024-11-20'),
(93, 1, 25, 6.80, '2024-12-01', 1, 'Pending', 0.00, 0.15, '2024-12-10'),
(94, 20, 30, 7.00, '2024-12-15', 2, 'Completed', 0.07, 0.12, '2024-12-20'),
(95, 21, 20, 8.20, '2025-01-01', 1, 'Shipped', 0.10, 0.18, '2025-01-10'),
(96, 22, 35, 3.00, '2025-01-15', 2, 'Pending', 0.05, 0.12, '2025-01-20'),
(99, 2, 20, 1.80, '2024-04-01', 1, 'Pending', 0.00, 0.10, '2024-04-10'),
(100, 1, 22, 2.50, '2024-04-15', 2, 'Completed', 0.05, 0.12, '2024-04-20'),
(101, 5, 30, 3.75, '2024-05-01', 1, 'Shipped', 0.10, 0.15, '2024-05-10'),
(102, 6, 15, 4.00, '2024-05-15', 2, 'Pending', 0.00, 0.08, '2024-05-20'),
(103, 7, 25, 5.50, '2024-06-01', 1, 'Completed', 0.05, 0.12, '2024-06-10'),
(104, 8, 10, 8.00, '2024-06-15', 2, 'Pending', 0.00, 0.10, '2024-06-20'),
(105, 7, 35, 7.20, '2024-07-01', 1, 'Shipped', 0.10, 0.18, '2024-07-10'),
(106, 8, 20, 3.00, '2024-07-15', 2, 'Completed', 0.07, 0.12, '2024-07-20'),
(107, 1, 40, 5.50, '2024-08-01', 1, 'Pending', 0.00, 0.10, '2024-08-10'),
(108, 2, 50, 2.00, '2024-08-15', 2, 'Completed', 0.05, 0.15, '2024-08-20'),
(109, 1, 15, 9.00, '2024-09-01', 1, 'Shipped', 0.10, 0.12, '2024-09-10'),
(110, 2, 30, 4.50, '2024-09-15', 2, 'Pending', 0.05, 0.10, '2024-09-20'),
(111, 20, 25, 3.80, '2024-10-01', 1, 'Completed', 0.05, 0.12, '2024-10-10'),
(112, 21, 40, 6.20, '2024-10-15', 2, 'Pending', 0.10, 0.15, '2024-10-20'),
(113, 1, 30, 4.60, '2024-11-01', 1, 'Shipped', 0.00, 0.10, '2024-11-10'),
(114, 1, 20, 5.00, '2024-11-15', 2, 'Completed', 0.05, 0.12, '2024-11-20'),
(115, 1, 25, 6.80, '2024-12-01', 1, 'Pending', 0.00, 0.15, '2024-12-10'),
(116, 20, 30, 7.00, '2024-12-15', 2, 'Completed', 0.07, 0.12, '2024-12-20'),
(117, 21, 20, 8.20, '2025-01-01', 1, 'Shipped', 0.10, 0.18, '2025-01-10'),
(118, 22, 35, 3.00, '2025-01-15', 2, 'Pending', 0.05, 0.12, '2025-01-20'),
(119, 2, 40, 4.00, '2025-02-01', 1, 'Completed', 0.00, 0.10, '2025-02-10'),
(120, 1, 45, 5.50, '2025-02-15', 2, 'Pending', 0.07, 0.12, '2025-02-20'),
(121, 2, 30, 2.90, '2025-03-01', 1, 'Shipped', 0.10, 0.08, '2025-03-10'),
(122, 2, 50, 3.50, '2025-03-15', 2, 'Completed', 0.05, 0.15, '2025-03-20'),
(123, 1, 20, 1.90, '2025-04-01', 1, 'Pending', 0.00, 0.12, '2025-04-10'),
(124, 2, 25, 6.30, '2025-04-15', 2, 'Completed', 0.05, 0.10, '2025-04-20');

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
(7, NULL, '2025-03-26', NULL, 1500.00, 'Pending', '2025-03-26 10:46:01', '2025-03-26 10:46:01');

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
(40, 43, 20, 10, 15.50, '2025-03-29', '2025-03-29 07:18:03', '2025-03-29 07:18:03'),
(41, 44, 21, 5, 20.00, '2025-03-29', '2025-03-29 07:18:03', '2025-03-29 07:18:03'),
(42, 45, 22, 8, 12.75, '2025-03-29', '2025-03-29 07:18:03', '2025-03-29 07:18:03'),
(147, 44, 1, 5, 20.00, '2024-04-05', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(148, 45, 2, 3, 25.00, '2024-04-10', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(149, 46, 5, 8, 15.00, '2024-04-15', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(150, 47, 6, 9, 10.00, '2024-04-20', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(151, 48, 7, 2, 50.00, '2024-05-05', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(152, 49, 8, 6, 30.00, '2024-05-10', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(153, 50, 20, 4, 40.00, '2024-05-15', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(154, 51, 21, 9, 22.00, '2024-05-20', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(155, 52, 22, 7, 18.00, '2024-06-05', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(156, 53, 9, 3, 55.00, '2024-06-10', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(157, 54, 23, 4, 21.00, '2024-06-15', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(158, 55, 1, 6, 19.00, '2024-06-20', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(159, 56, 2, 5, 20.00, '2024-07-05', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(160, 57, 5, 3, 25.00, '2024-07-10', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(161, 58, 6, 8, 15.00, '2024-07-15', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(162, 59, 7, 10, 10.00, '2024-07-20', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(163, 60, 8, 2, 50.00, '2024-08-05', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(164, 61, 20, 6, 30.00, '2024-08-10', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(165, 62, 21, 4, 40.00, '2024-08-15', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(166, 63, 22, 9, 22.00, '2024-08-20', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(167, 64, 9, 7, 18.00, '2024-09-05', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(168, 65, 23, 3, 55.00, '2024-09-10', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(169, 66, 1, 4, 21.00, '2024-09-15', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(170, 67, 2, 6, 19.00, '2024-09-20', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(171, 68, 5, 5, 20.00, '2024-10-05', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(172, 69, 6, 3, 25.00, '2024-10-10', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(173, 70, 7, 8, 15.00, '2024-10-15', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(174, 71, 8, 10, 10.00, '2024-10-20', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(175, 72, 20, 2, 50.00, '2024-11-05', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(176, 73, 21, 6, 30.00, '2024-11-10', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(177, 74, 22, 4, 40.00, '2024-11-15', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(178, 75, 9, 9, 22.00, '2024-11-20', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(179, 76, 23, 7, 18.00, '2024-12-05', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(180, 77, 1, 3, 55.00, '2024-12-10', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(181, 78, 2, 4, 21.00, '2024-12-15', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(182, 79, 5, 6, 19.00, '2024-12-20', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(183, 80, 6, 5, 20.00, '2025-01-05', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(184, 81, 7, 3, 25.00, '2025-01-10', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(185, 82, 8, 8, 15.00, '2025-01-15', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(186, 83, 20, 10, 10.00, '2025-01-20', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(187, 84, 21, 2, 50.00, '2025-02-05', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(188, 85, 22, 6, 30.00, '2025-02-10', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(189, 86, 9, 4, 40.00, '2025-02-15', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(190, 87, 23, 9, 22.00, '2025-02-20', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(191, 88, 1, 7, 18.00, '2025-03-05', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(192, 89, 2, 3, 55.00, '2025-03-10', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(193, 90, 5, 4, 21.00, '2025-03-15', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(194, 91, 6, 6, 19.00, '2025-03-20', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(195, 92, 7, 5, 20.00, '2025-04-05', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(196, 93, 8, 3, 25.00, '2025-04-10', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(197, 94, 20, 8, 15.00, '2025-04-15', '2025-04-02 01:00:22', '2025-04-02 01:00:22'),
(198, 95, 21, 9, 10.00, '2025-04-20', '2025-04-02 01:00:22', '2025-04-02 01:00:22');

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
(42, '2024-01-10', 1500.00, 'Completed', '2024-01-09 17:00:00', NULL),
(43, '2024-01-15', 800.00, 'Completed', '2024-01-14 17:00:00', NULL),
(44, '2024-01-20', 1000.00, 'Completed', '2024-01-19 17:00:00', NULL),
(45, '2024-01-25', 1200.00, 'Completed', '2024-01-24 17:00:00', NULL),
(46, '2024-02-05', 1700.00, 'Completed', '2024-02-04 17:00:00', NULL),
(47, '2024-02-10', 1800.00, 'Completed', '2024-02-09 17:00:00', NULL),
(48, '2024-02-15', 1300.00, 'Completed', '2024-02-14 17:00:00', NULL),
(49, '2024-02-20', 1600.00, 'Completed', '2024-02-19 17:00:00', NULL),
(50, '2024-03-01', 1400.00, 'Completed', '2024-02-29 17:00:00', NULL),
(51, '2024-03-05', 900.00, 'Completed', '2024-03-04 17:00:00', NULL),
(52, '2024-03-10', 1600.00, 'Completed', '2024-03-09 17:00:00', NULL),
(53, '2024-03-15', 1700.00, 'Completed', '2024-03-14 17:00:00', NULL),
(54, '2024-04-05', 1500.00, 'Completed', '2024-04-04 17:00:00', NULL),
(55, '2024-04-10', 1200.00, 'Completed', '2024-04-09 17:00:00', NULL),
(56, '2024-04-15', 1800.00, 'Completed', '2024-04-14 17:00:00', NULL),
(57, '2024-04-20', 2000.00, 'Completed', '2024-04-19 17:00:00', NULL),
(58, '2024-05-01', 1500.00, 'Completed', '2024-04-30 17:00:00', NULL),
(59, '2024-05-10', 1700.00, 'Completed', '2024-05-09 17:00:00', NULL),
(60, '2024-05-15', 1800.00, 'Completed', '2024-05-14 17:00:00', NULL),
(61, '2024-05-20', 2000.00, 'Completed', '2024-05-19 17:00:00', NULL),
(62, '2024-06-05', 2100.00, 'Completed', '2024-06-04 17:00:00', NULL),
(63, '2024-06-10', 2200.00, 'Completed', '2024-06-09 17:00:00', NULL),
(64, '2024-06-15', 2300.00, 'Completed', '2024-06-14 17:00:00', NULL),
(65, '2024-06-20', 2400.00, 'Completed', '2024-06-19 17:00:00', NULL),
(66, '2024-07-05', 2500.00, 'Completed', '2024-07-04 17:00:00', NULL),
(67, '2024-07-10', 2600.00, 'Completed', '2024-07-09 17:00:00', NULL),
(68, '2024-07-15', 2700.00, 'Completed', '2024-07-14 17:00:00', NULL),
(69, '2024-07-20', 2800.00, 'Completed', '2024-07-19 17:00:00', NULL),
(70, '2024-08-05', 2900.00, 'Completed', '2024-08-04 17:00:00', NULL),
(71, '2024-08-10', 3000.00, 'Completed', '2024-08-09 17:00:00', NULL),
(72, '2024-08-15', 3100.00, 'Completed', '2024-08-14 17:00:00', NULL),
(73, '2024-08-20', 3200.00, 'Completed', '2024-08-19 17:00:00', NULL),
(74, '2024-09-05', 3300.00, 'Completed', '2024-09-04 17:00:00', NULL),
(75, '2024-09-10', 3400.00, 'Completed', '2024-09-09 17:00:00', NULL),
(76, '2024-09-15', 3500.00, 'Completed', '2024-09-14 17:00:00', NULL),
(77, '2024-09-20', 3600.00, 'Completed', '2024-09-19 17:00:00', NULL),
(78, '2024-10-05', 3700.00, 'Completed', '2024-10-04 17:00:00', NULL),
(79, '2024-10-10', 3800.00, 'Completed', '2024-10-09 17:00:00', NULL),
(80, '2024-10-15', 3900.00, 'Completed', '2024-10-14 17:00:00', NULL),
(81, '2024-10-20', 4000.00, 'Completed', '2024-10-19 17:00:00', NULL),
(82, '2024-11-05', 4100.00, 'Completed', '2024-11-04 17:00:00', NULL),
(83, '2024-11-10', 4200.00, 'Completed', '2024-11-09 17:00:00', NULL),
(84, '2024-11-15', 4300.00, 'Completed', '2024-11-14 17:00:00', NULL),
(85, '2024-11-20', 4400.00, 'Completed', '2024-11-19 17:00:00', NULL),
(86, '2025-01-05', 4600.00, 'Completed', '2025-01-04 17:00:00', NULL),
(87, '2025-01-10', 4700.00, 'Completed', '2025-01-09 17:00:00', NULL),
(88, '2025-01-15', 4800.00, 'Completed', '2025-01-14 17:00:00', NULL),
(89, '2025-01-20', 4900.00, 'Completed', '2025-01-19 17:00:00', NULL),
(90, '2025-01-25', 5000.00, 'Completed', '2025-01-24 17:00:00', NULL),
(91, '2025-02-05', 5100.00, 'Completed', '2025-02-04 17:00:00', NULL),
(92, '2025-02-10', 5200.00, 'Completed', '2025-02-09 17:00:00', NULL),
(93, '2025-02-15', 5300.00, 'Completed', '2025-02-14 17:00:00', NULL),
(94, '2025-02-20', 5400.00, 'Completed', '2025-02-19 17:00:00', NULL),
(95, '2025-02-25', 5500.00, 'Completed', '2025-02-24 17:00:00', NULL),
(96, '2025-03-05', 5600.00, 'Completed', '2025-03-04 17:00:00', NULL),
(97, '2025-03-10', 5700.00, 'Completed', '2025-03-09 17:00:00', NULL),
(98, '2025-03-15', 5800.00, 'Completed', '2025-03-14 17:00:00', NULL),
(99, '2025-03-20', 5900.00, 'Completed', '2025-03-19 17:00:00', NULL),
(100, '2025-03-25', 6000.00, 'Completed', '2025-03-24 17:00:00', NULL),
(101, '2025-04-05', 6100.00, 'Completed', '2025-04-04 17:00:00', NULL),
(102, '2025-04-10', 6200.00, 'Completed', '2025-04-09 17:00:00', NULL),
(103, '2025-04-15', 6300.00, 'Completed', '2025-04-14 17:00:00', NULL),
(104, '2025-04-20', 6400.00, 'Completed', '2025-04-19 17:00:00', NULL),
(105, '2025-05-01', 6500.00, 'Completed', '2025-04-30 17:00:00', NULL),
(106, '2025-05-05', 6600.00, 'Completed', '2025-05-04 17:00:00', NULL),
(107, '2025-05-10', 6700.00, 'Completed', '2025-05-09 17:00:00', NULL),
(108, '2025-05-15', 6800.00, 'Completed', '2025-05-14 17:00:00', NULL),
(109, '2025-05-20', 6900.00, 'Completed', '2025-05-19 17:00:00', NULL),
(110, '2025-05-25', 7000.00, 'Completed', '2025-05-24 17:00:00', NULL),
(111, '2025-03-31', 87.32, 'Pending', '2025-03-30 17:00:00', NULL),
(112, '2025-03-31', 21.87, 'Pending', '2025-03-30 17:00:00', NULL),
(113, '2025-03-31', 55.13, 'Completed', '2025-03-30 17:00:00', NULL),
(114, '2025-03-31', 184.53, 'Cancelled', '2025-03-30 17:00:00', NULL),
(115, '2025-03-31', 92.90, 'Pending', '2025-03-30 17:00:00', NULL),
(116, '2025-03-31', 350.75, '', '2025-03-30 17:00:00', NULL),
(117, '2025-03-31', 67.80, '', '2025-03-30 17:00:00', NULL),
(118, '2025-03-31', 120.45, 'Completed', '2025-03-30 17:00:00', NULL),
(119, '2025-03-31', 215.99, '', '2025-03-30 17:00:00', NULL),
(120, '2025-03-31', 42.50, 'Cancelled', '2025-03-30 17:00:00', NULL),
(121, '2025-03-31', 312.89, 'Completed', '2025-03-30 17:00:00', NULL),
(122, '2025-03-31', 89.99, '', '2025-03-30 17:00:00', NULL),
(123, '2025-03-31', 150.10, 'Pending', '2025-03-30 17:00:00', NULL),
(124, '2025-03-31', 275.40, '', '2025-03-30 17:00:00', NULL),
(125, '2025-03-31', 68.75, 'Cancelled', '2025-03-30 17:00:00', NULL),
(126, '2025-03-31', 149.99, 'Completed', '2025-03-30 17:00:00', NULL),
(127, '2025-03-31', 77.65, 'Pending', '2025-03-30 17:00:00', NULL),
(128, '2025-03-31', 129.99, '', '2025-03-30 17:00:00', NULL),
(129, '2025-03-31', 50.25, '', '2025-03-30 17:00:00', NULL),
(130, '2025-03-31', 199.99, 'Completed', '2025-03-30 17:00:00', NULL),
(131, '2025-03-31', 222.75, '', '2025-03-30 17:00:00', NULL),
(132, '2025-03-31', 310.50, '', '2025-03-30 17:00:00', NULL),
(133, '2025-03-31', 41.80, 'Cancelled', '2025-03-30 17:00:00', NULL),
(134, '2025-03-31', 105.90, 'Pending', '2025-03-30 17:00:00', NULL),
(135, '2025-03-31', 55.40, 'Completed', '2025-03-30 17:00:00', NULL),
(136, '2025-03-31', 370.25, '', '2025-03-30 17:00:00', NULL),
(137, '2025-03-31', 99.99, 'Pending', '2025-03-30 17:00:00', NULL),
(138, '2025-03-31', 290.75, 'Completed', '2025-03-30 17:00:00', NULL),
(139, '2025-03-31', 49.50, 'Cancelled', '2025-03-30 17:00:00', NULL),
(140, '2025-03-31', 74.84, '', '2025-03-30 17:00:00', NULL),
(141, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 1),
(142, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 2),
(143, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 3),
(144, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 1),
(145, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 2),
(146, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 3),
(147, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 1),
(148, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 2),
(149, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 3),
(150, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 1),
(151, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 2),
(152, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 3),
(153, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 1),
(154, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 2),
(155, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 3),
(156, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 1),
(157, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 2),
(158, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 3),
(159, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 1),
(160, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 2),
(161, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 3),
(162, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 1),
(163, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 2),
(164, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 3),
(165, '0000-00-00', 0.00, 'Pending', '2025-04-02 05:50:22', 1);

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
-- Table structure for table `today_money`
--

CREATE TABLE `today_money` (
  `id` int(11) NOT NULL,
  `total_income` decimal(10,2) DEFAULT NULL,
  `total_expenses` decimal(10,2) DEFAULT NULL,
  `today_money` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(11, 'default_value', NULL, 'Chantha', 'Dy', 'chantha9999@gmail.com', '', 2, '$2y$10$uhWzwOZtwBOcw.ba/jtLN.F6bsLCavxcm7cLw5oRmQBINK1EwfXRO', '', '', '2025-04-03 00:27:47', '2025-04-03 00:27:47');

-- --------------------------------------------------------

--
-- Structure for view `customers`
--
DROP TABLE IF EXISTS `customers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customers`  AS SELECT `users`.`user_id` AS `user_id`, `users`.`select_user` AS `select_user`, `users`.`profile_image` AS `profile_image`, `users`.`first_name` AS `first_name`, `users`.`last_name` AS `last_name`, `users`.`email` AS `email`, `users`.`phone` AS `phone`, `users`.`role_id` AS `role_id`, `users`.`password` AS `password`, `users`.`address` AS `address`, `users`.`street_address` AS `street_address`, `users`.`created_at` AS `created_at`, `users`.`updated_at` AS `updated_at` FROM `users` WHERE `users`.`role_id` = 2 ;

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
-- Indexes for table `today_money`
--
ALTER TABLE `today_money`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `MaterialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchaseorderdetails`
--
ALTER TABLE `purchaseorderdetails`
  MODIFY `PurchaseOrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

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
  MODIFY `SalesOrderDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

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
-- AUTO_INCREMENT for table `today_money`
--
ALTER TABLE `today_money`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
