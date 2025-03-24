-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2025 at 02:38 PM
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
(126, 5, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-23 10:03:43'),
(127, NULL, 'Failed login (wrong email) for email: panha9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 01:01:27'),
(128, NULL, 'Failed login (wrong email) for email: panha9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 01:01:37'),
(129, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 01:01:56'),
(130, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 01:34:10'),
(131, 6, 'Customer registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 03:44:09'),
(132, 6, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 03:44:17'),
(133, 2, 'Password reset token generated.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 04:20:19'),
(134, 2, 'Password reset token generated.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 05:34:06'),
(135, 2, 'Password reset token generated.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 05:40:06'),
(136, 2, 'Password reset token generated.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 05:46:13'),
(137, 2, 'Password reset token generated.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 05:49:16'),
(138, 2, 'Password reset token generated.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 05:55:28'),
(139, 2, 'Password reset token generated.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 06:00:03'),
(140, 2, 'Password reset token generated.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 06:06:29'),
(141, 2, 'Password reset token generated.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 06:11:33'),
(142, 2, 'Password reset token generated.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 06:18:19'),
(143, 2, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 06:26:11'),
(144, 2, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 06:28:58'),
(145, NULL, 'Failed login (wrong password) for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 06:33:31'),
(146, NULL, 'Failed login (wrong password) for email: chandyneat9999@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 06:33:46'),
(147, NULL, 'Failed login (wrong password) for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 06:34:04'),
(148, NULL, 'Failed login (wrong password) for email: chandyneat94@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 06:34:38'),
(149, 2, 'Password reset token generated.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 07:48:08'),
(150, 2, 'Password reset token generated.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 07:55:00'),
(151, 6, 'Password reset token generated.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 07:56:22'),
(152, 2, 'Password reset token generated.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 08:06:45'),
(153, 2, 'Password reset token generated.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 08:29:19'),
(154, 6, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 08:37:41'),
(155, 6, 'User logged out', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 09:07:00'),
(156, 6, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 09:07:02'),
(157, 7, 'Customer registered successfully.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-24 11:48:30');

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
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EmployeeID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Position` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Salary` decimal(10,2) DEFAULT NULL,
  `HireDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmployeeID`, `Name`, `Position`, `Phone`, `Email`, `Salary`, `HireDate`) VALUES
(1, 'John Doe', 'Manager', '123-456-7890', 'johndoe@example.com', 5000.00, '2025-03-01'),
(2, 'Jane Smith', 'Assistant Manager', '123-456-7891', 'janesmith@example.com', 4000.00, '2024-11-15'),
(3, 'Mike Johnson', 'Sales Representative', '123-456-7892', 'mikejohnson@example.com', 3000.00, '2023-06-20'),
(4, 'Emily Davis', 'Warehouse Supervisor', '123-456-7893', 'emilydavis@example.com', 3500.00, '2022-08-10'),
(5, 'David Clark', 'Logistics Coordinator', '123-456-7894', 'davidclark@example.com', 3800.00, '2023-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `goodsreceived`
--

CREATE TABLE `goodsreceived` (
  `GoodsReceivedID` int(11) NOT NULL,
  `PurchaseOrderID` int(11) DEFAULT NULL,
  `ReceivedDate` date DEFAULT NULL,
  `EmployeeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goodsreceived`
--

INSERT INTO `goodsreceived` (`GoodsReceivedID`, `PurchaseOrderID`, `ReceivedDate`, `EmployeeID`) VALUES
(7, 1, '2025-04-05', 1),
(8, 2, '2025-04-01', 2),
(9, 3, '2025-04-10', 3),
(10, 5, '2025-03-28', 1),
(11, 6, '2025-03-30', 4),
(12, 7, '2025-04-15', 2);

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
(10, 'Portland Cement', 1, 200, 5.50, 1, 50, 100, 'Bag', '50kg', 'images/cement.jpg', 'High-quality Portland cement', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'UltraBuild', 'Warehouse A', 'supplier1@example.com', '', 12),
(11, 'Steel Rods 12mm', 2, 150, 2.30, 2, 30, 70, 'Kg', '12mm', 'images/steel.jpg', 'TMT Steel rods', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'IronFlex', 'Warehouse B', 'supplier2@example.com', '', 5),
(12, 'Red Clay Bricks', 3, 1000, 0.30, 1, 200, 500, 'Piece', 'Standard', 'images/bricks.jpg', 'High-quality red clay bricks', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'BrickMaster', 'Yard', 'supplier1@example.com', '', 0),
(13, 'River Sand', 1, 300, 12.00, 3, 50, 150, 'Cubic Meter', 'Standard', 'images/sand.jpg', 'Clean river sand', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'SandPro', 'Warehouse C', 'supplier3@example.com', '', 0),
(14, 'Ceramic Floor Tiles', 4, 80, 20.00, 2, 20, 40, 'Box', '24x24', 'images/tiles.jpg', 'Ceramic tiles for flooring', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'TileZone', 'Warehouse A', 'supplier2@example.com', '', 2),
(15, 'White Paint (Interior)', 5, 60, 18.00, 4, 10, 25, 'Gallon', '4L', 'images/paint.jpg', 'Interior white wall paint', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'ColorTech', 'Warehouse D', 'supplier4@example.com', '', 3),
(16, 'Plywood Sheet 12mm', 1, 100, 15.00, 3, 20, 50, 'Piece', '12mm', 'images/plywood.jpg', 'Construction grade plywood', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'WoodWorks', 'Warehouse B', 'supplier3@example.com', '', 2),
(17, 'PVC Pipes 2 Inch', 2, 250, 3.00, 1, 60, 120, 'Piece', '2 inch', 'images/pvc_pipe.jpg', 'PVC pipe for plumbing', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'PipeMaster', 'Warehouse C', 'supplier1@example.com', '', 10),
(18, 'Electrical Wire 1.5mm', 2, 400, 0.80, 2, 100, 200, 'Roll', '1.5mm', 'images/wire.jpg', 'Copper electrical wire', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'ElectroFlex', 'Warehouse D', 'supplier2@example.com', '', 5),
(19, 'Switch Box (Plastic)', 2, 150, 1.20, 4, 30, 70, 'Piece', 'Standard', 'images/switchbox.jpg', 'Plastic electrical switch box', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'SafeElectro', 'Warehouse A', 'supplier4@example.com', '', 2),
(20, 'Concrete Hollow Blocks', 3, 800, 0.60, 1, 150, 300, 'Piece', '6 inch', 'images/blocks.jpg', 'Cement-based hollow blocks', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'BuildSolid', 'Yard', 'supplier1@example.com', '', 0),
(21, 'Roofing Sheets (GI)', 4, 100, 22.00, 3, 20, 50, 'Piece', '8ft', 'images/roofing.jpg', 'Galvanized roofing sheet', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'RoofMax', 'Warehouse B', 'supplier3@example.com', '', 7),
(22, 'Wall Putty', 5, 60, 6.50, 2, 10, 30, 'Bucket', '20kg', 'images/putty.jpg', 'Pre-mix wall putty', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'SmoothWalls', 'Warehouse D', 'supplier2@example.com', '', 2),
(23, 'Glass Window Panels', 4, 30, 40.00, 5, 10, 20, 'Piece', '48x48', 'images/glass.jpg', 'Tempered glass panel', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'GlassWorks', 'Warehouse C', 'supplier5@example.com', '', 10),
(24, 'Masonry Nails', 2, 500, 0.02, 1, 100, 250, 'Kg', '2 inch', 'images/nails.jpg', 'Iron masonry nails', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'FixitPro', 'Warehouse A', 'supplier1@example.com', '', 0),
(25, 'Paint Brushes', 5, 200, 1.50, 4, 50, 100, 'Piece', '4 inch', 'images/brush.jpg', 'Bristle brushes for painting', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'PaintEase', 'Warehouse D', 'supplier4@example.com', '', 1),
(26, 'Angle Bars', 2, 120, 12.00, 2, 20, 60, 'Piece', '1x1 inch', 'images/anglebar.jpg', 'Steel angle bars', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'IronFlex', 'Warehouse B', 'supplier2@example.com', '', 5),
(27, 'Ladders (Aluminum)', 4, 25, 35.00, 3, 5, 15, 'Piece', '6ft', 'images/ladder.jpg', 'Aluminum ladder', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'SafeSteps', 'Warehouse A', 'supplier3@example.com', '', 10),
(28, 'Door Hinges', 2, 300, 0.75, 1, 60, 150, 'Piece', 'Standard', 'images/hinge.jpg', 'Metal door hinges', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'FixitPro', 'Warehouse B', 'supplier1@example.com', '', 3),
(29, 'Waterproof Membrane', 5, 40, 28.00, 4, 10, 20, 'Roll', '10m', 'images/waterproof.jpg', 'Bituminous waterproof layer', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'SealTight', 'Warehouse C', 'supplier4@example.com', '', 5),
(30, 'Aluminum Composite Panel', 4, 35, 45.00, 2, 10, 20, 'Sheet', '4x8 ft', 'images/acp.jpg', 'ACP sheets for cladding', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'AluTech', 'Warehouse B', 'supplier2@example.com', '', 7),
(31, 'Binding Wire', 2, 500, 0.40, 1, 100, 200, 'Roll', '1kg', 'images/bindingwire.jpg', 'Binding wire for reinforcement', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'WireZone', 'Warehouse C', 'supplier1@example.com', '', 0),
(32, 'Wall Screws', 2, 800, 0.05, 3, 200, 300, 'Piece', '1.5 inch', 'images/screws.jpg', 'Galvanized wall screws', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'FixitPro', 'Warehouse A', 'supplier3@example.com', '', 0),
(33, 'Door Lock Set', 2, 70, 12.50, 2, 20, 30, 'Set', 'Standard', 'images/lock.jpg', 'Complete door lock set', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'SecureHome', 'Warehouse D', 'supplier2@example.com', '', 3),
(34, 'Flexible Conduit Pipe', 2, 130, 1.80, 1, 30, 70, 'Roll', '25m', 'images/conduit.jpg', 'Plastic flexible conduit', '2025-03-24 19:30:04', '2025-03-24 19:30:04', 'PipeMaster', 'Warehouse C', 'supplier1@example.com', '', 5);

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
(5, 3, 'sophean.phouk@example.com', '7a0f92ec51079d3f9389ec0af53e525e', '2025-03-21 15:35:36', '2025-03-21 13:35:36'),
(8, 2, NULL, '10e2017a9f75190d465a9361800fcb137ba1122f035b1a428609a18ac3db57a9', '2025-03-24 06:19:58', '2025-03-24 04:19:58'),
(9, 2, NULL, 'fa4fc67faf0c43c1478f1d540fe548c33c8e7a23f715c263de46cd4b76bac64a', '2025-03-24 07:33:56', '2025-03-24 05:33:56'),
(10, 2, NULL, 'f089f7b3cdf337ddcf3a0b1defd914736a6ca0b381add58665dd69fc676203cd', '2025-03-24 07:39:45', '2025-03-24 05:39:45'),
(11, 2, NULL, '952f614c115fbd0a8dc023c9642feba7352470cc83e45714718d964436d63947', '2025-03-24 07:46:11', '2025-03-24 05:46:11'),
(12, 2, NULL, 'c257665921ebd9591ba73ed2b946d75c80a5459ba6dfc4445fb54e3ccc0d0c11', '2025-03-24 07:49:14', '2025-03-24 05:49:14'),
(13, 2, NULL, '557a268287a638296b6bcc5af6424e0e2ac1d3416aefa89daecba4249694356f', '2025-03-24 07:55:26', '2025-03-24 05:55:26'),
(14, 2, NULL, 'b7d07fdf8a4ce3c8a0ed4bf6e1db638cc8165f18273c5b0b3b59883269b801b9', '2025-03-24 08:00:01', '2025-03-24 06:00:01'),
(15, 2, NULL, 'bc51d93ffaa095dc6da7eb330b8ecbc38ffd77b7cb7e0766a4205106664d136e', '2025-03-24 08:06:26', '2025-03-24 06:06:26'),
(16, 2, NULL, 'e6d3d67c265fd7828ef8470312348a110358e67083f6c20af7f8f9d19bc02e22', '2025-03-24 08:11:31', '2025-03-24 06:11:31'),
(17, 2, NULL, 'f4e1408e75254a6198f8a03780b0829214eef42ba92105d92117867ef2e99e80', '2025-03-24 08:18:16', '2025-03-24 06:18:16'),
(18, 5, 'chandyneat94@gmail.com', '1c9be01c3b4471a54c100d4bdda2c84a', '2025-03-24 08:29:03', '2025-03-24 06:29:03'),
(19, 5, 'chandyneat94@gmail.com', '7e58c0df2eef6eb14d10f8ba4d14e097', '2025-03-24 08:33:06', '2025-03-24 06:33:06'),
(20, 5, 'chandyneat94@gmail.com', '1d9e041da079f2b5a96574bb35c4eab7', '2025-03-24 08:34:10', '2025-03-24 06:34:10'),
(21, 2, NULL, '033d7a1f7d76e53cd10bc3758cb5797528b53c03d5207488902439007729298c', '2025-03-24 09:48:06', '2025-03-24 07:48:06'),
(22, 2, NULL, '0a775685abd0735a49e68f43331a84d9cceb9f512147ced7fca1a22ae2268464', '2025-03-24 09:54:58', '2025-03-24 07:54:58'),
(23, 6, NULL, 'd64ad6e0151c9cf71f1791b576a3705708642ffa0856f4ad887c37694722f973', '2025-03-24 09:56:20', '2025-03-24 07:56:20'),
(24, 2, NULL, '99663ffd618197adc37eeff0f8d631cb29443b4eb66d202212ea9daa48e6d236', '2025-03-24 10:06:43', '2025-03-24 08:06:43'),
(25, 2, NULL, '55914da3b964859002cfaba2927197ed05f9c60722c053cab6db447b452d6d3a', '2025-03-24 10:29:17', '2025-03-24 08:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `PaymentID` int(11) NOT NULL,
  `SalesOrderID` int(11) DEFAULT NULL,
  `PaymentDate` date DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `PaymentMethod` enum('Cash','Credit Card','Bank Transfer','Other') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`PaymentID`, `SalesOrderID`, `PaymentDate`, `Amount`, `PaymentMethod`) VALUES
(1, 1, '2025-03-01', 500.00, 'Cash'),
(2, 2, '2025-03-02', 750.00, 'Credit Card'),
(3, 3, '2025-03-03', 1200.00, 'Bank Transfer'),
(4, 4, '2025-03-04', 300.00, 'Other'),
(5, 5, '2025-03-05', 950.00, 'Credit Card');

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
(1, 'manage_users', 'Add, edit, delete users', '2025-03-22 08:55:04', '2025-03-22 08:55:04'),
(2, 'manage_inventory', 'View, add, update, delete inventory items', '2025-03-22 08:55:04', '2025-03-22 08:55:04'),
(3, 'manage_sales', 'Process sales orders and invoices', '2025-03-22 08:55:04', '2025-03-22 08:55:04'),
(4, 'view_reports', 'View sales, inventory, and finance reports', '2025-03-22 08:55:04', '2025-03-22 08:55:04'),
(5, 'manage_finance', 'Handle payments, expenses, and budgets', '2025-03-22 08:55:04', '2025-03-22 08:55:04'),
(6, 'manage_suppliers', 'Add, update, and delete supplier details', '2025-03-22 08:55:04', '2025-03-22 08:55:04'),
(7, 'buy_materials', 'Allows customers to purchase materials', '2025-03-23 09:57:28', '2025-03-23 09:57:28'),
(8, 'feedback', 'Allows customers to submit feedback', '2025-03-23 09:57:28', '2025-03-23 09:57:28'),
(9, 'orders', 'Allows customers to create and manage orders', '2025-03-23 09:57:28', '2025-03-23 09:57:28'),
(10, 'view_profile', 'Allows customers to view their profile information', '2025-03-23 09:57:28', '2025-03-23 09:57:28'),
(11, 'view_help', 'Allows customers to access help resources', '2025-03-23 09:57:28', '2025-03-23 09:57:28');

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
(1, 1, 1, '2025-03-22 09:04:22'),
(2, 1, 2, '2025-03-22 09:04:22'),
(3, 1, 3, '2025-03-22 09:04:22'),
(4, 1, 4, '2025-03-22 09:04:22'),
(5, 1, 5, '2025-03-22 09:04:22'),
(6, 1, 6, '2025-03-22 09:04:22'),
(11, 3, 4, '2025-03-22 09:04:22'),
(12, 4, 3, '2025-03-22 09:04:22'),
(13, 4, 4, '2025-03-22 09:04:22'),
(14, 5, 2, '2025-03-22 09:04:22'),
(15, 5, 6, '2025-03-22 09:04:22'),
(16, 2, 7, '2025-03-23 10:00:06'),
(17, 2, 8, '2025-03-23 10:00:06'),
(18, 2, 9, '2025-03-23 10:00:06'),
(19, 2, 10, '2025-03-23 10:00:06'),
(20, 2, 11, '2025-03-23 10:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorders`
--

CREATE TABLE `purchaseorders` (
  `PurchaseOrderID` int(11) NOT NULL,
  `SupplierID` int(11) DEFAULT NULL,
  `OrderDate` date DEFAULT NULL,
  `ExpectedDeliveryDate` date DEFAULT NULL,
  `Status` enum('Pending','Completed','Cancelled') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchaseorders`
--

INSERT INTO `purchaseorders` (`PurchaseOrderID`, `SupplierID`, `OrderDate`, `ExpectedDeliveryDate`, `Status`) VALUES
(1, 1, '2025-03-24', '2025-04-05', 'Pending'),
(2, 2, '2025-03-23', '2025-04-01', 'Completed'),
(3, 3, '2025-03-20', '2025-04-10', 'Pending'),
(4, 4, '2025-03-18', '2025-04-03', 'Cancelled'),
(5, 1, '2025-03-15', '2025-03-28', 'Completed'),
(6, 2, '2025-03-12', '2025-03-30', 'Pending'),
(7, 3, '2025-03-10', '2025-04-15', 'Completed');

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
(2, 'User', 'Can buy materials, orders materials, and Give feedback.', '2025-02-01 03:30:00', '2025-03-23 09:52:04'),
(3, 'Employee', 'Can update work logs and view sales and inventory.', '2025-03-01 07:00:00', '2025-03-20 05:00:00'),
(4, 'Sales', 'Can only view and manage sales-related information.', '2025-03-05 01:30:00', '2025-03-20 06:30:00'),
(5, 'Inventory Staff', 'Manages inventory stock levels and warehouse data.', '2025-03-10 09:45:00', '2025-03-20 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `salesorderdetails`
--

CREATE TABLE `salesorderdetails` (
  `ID` int(11) NOT NULL,
  `SalesOrderID` int(11) DEFAULT NULL,
  `MaterialID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `UnitPrice` decimal(10,2) DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesorderdetails`
--

INSERT INTO `salesorderdetails` (`ID`, `SalesOrderID`, `MaterialID`, `Quantity`, `UnitPrice`, `Total`) VALUES
(61, 1, 10, 50, 5.50, 275.00),
(62, 1, 11, 100, 2.30, 230.00),
(63, 1, 12, 500, 0.30, 150.00),
(64, 2, 13, 200, 12.00, 2400.00),
(65, 2, 14, 40, 20.00, 800.00),
(66, 2, 15, 30, 18.00, 540.00);

-- --------------------------------------------------------

--
-- Table structure for table `salesorders`
--

CREATE TABLE `salesorders` (
  `SalesOrderID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `OrderDate` date DEFAULT NULL,
  `DeliveryDate` date DEFAULT NULL,
  `Status` enum('Pending','Shipped','Delivered','Canceled') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesorders`
--

INSERT INTO `salesorders` (`SalesOrderID`, `CustomerID`, `OrderDate`, `DeliveryDate`, `Status`) VALUES
(1, 1, '2025-03-01', '2025-03-05', 'Pending'),
(2, 2, '2025-03-02', '2025-03-06', 'Shipped'),
(3, 3, '2025-03-03', '2025-03-07', 'Delivered'),
(4, 1, '2025-03-04', '2025-03-08', 'Canceled'),
(5, 2, '2025-03-05', '2025-03-10', 'Delivered');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `select_user`, `profile_image`, `first_name`, `last_name`, `email`, `phone`, `role_id`, `password`, `address`, `street_address`, `created_at`, `updated_at`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(2, 'default_value', '/public/Images/1742797703_cbfb2e265b7c88c565d101aad179352c.jpg', 'Chandy', 'Neat', 'chandyneat9999@gmail.com', '093967654', 1, '$2y$10$mjuFzLjv1SiJ51x0B2VOYem7g9eRz/dDkB.zLk9i0ekuvq.Z1Pqye', 'Phnom Penh', 'Chomka Duong', '2025-03-20 11:11:26', '2025-03-24 07:52:08', NULL, NULL),
(3, 'Customer', 'uploads/profile1.jpg', 'Sopean', 'Phouk', 'sophean.phouk@example.com', '1234567890', 1, '$2y$10$tH5w6oJtY1rE0Te6lC.03OpsX5Jz7Fy5ipo778b0cjtuie7Skiv0C', '123 Main Street, New York, NY', 'Main Street, Apt 4B', '2025-03-21 13:33:07', '2025-03-21 13:35:53', NULL, NULL),
(5, 'default_value', NULL, 'Chandy', 'Neat', 'chandyneat94@gmail.com', '', 2, '$2y$10$6U.SJXYRYXBO.pUpjlpUwuAOdvBqHPqSDTO7kRypTKthRSM2jsTtG', '', '', '2025-03-23 10:01:30', '2025-03-24 06:34:20', NULL, NULL),
(6, 'default_value', NULL, 'Dyy', 'Development', 'chandy.neat@student.passerellesnumeriques.org', '', 2, '$2y$10$Mr7//LTRbwrTC8mjCDnSYuBXxPUrznsvVXPiwNdMv0BSv.vcm7hBy', '', '', '2025-03-24 03:44:09', '2025-03-24 03:44:09', NULL, NULL),
(7, 'default_value', NULL, 'Senghin', 'Loem', 'senghin@gmail.com', '', 2, '$2y$10$WHA25lbzEwgZzN3jm/HOIerawwNst2h7AaePH0rr/qcbeXBVfTNVC', '', '', '2025-03-24 11:48:30', '2025-03-24 11:48:30', NULL, NULL);

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
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `goodsreceived`
--
ALTER TABLE `goodsreceived`
  ADD PRIMARY KEY (`GoodsReceivedID`),
  ADD KEY `PurchaseOrderID` (`PurchaseOrderID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `SalesOrderID` (`SalesOrderID`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permission_id`),
  ADD UNIQUE KEY `permission_name` (`permission_name`);

--
-- Indexes for table `permission_roles`
--
ALTER TABLE `permission_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_id` (`role_id`,`permission_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  ADD PRIMARY KEY (`PurchaseOrderID`);

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
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SalesOrderID` (`SalesOrderID`),
  ADD KEY `MaterialID` (`MaterialID`);

--
-- Indexes for table `salesorders`
--
ALTER TABLE `salesorders`
  ADD PRIMARY KEY (`SalesOrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

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
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

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
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `goodsreceived`
--
ALTER TABLE `goodsreceived`
  MODIFY `GoodsReceivedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `MaterialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permission_roles`
--
ALTER TABLE `permission_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  MODIFY `PurchaseOrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salesorderdetails`
--
ALTER TABLE `salesorderdetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `salesorders`
--
ALTER TABLE `salesorders`
  MODIFY `SalesOrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `SupplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD CONSTRAINT `audit_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `goodsreceived`
--
ALTER TABLE `goodsreceived`
  ADD CONSTRAINT `goodsreceived_ibfk_1` FOREIGN KEY (`PurchaseOrderID`) REFERENCES `purchaseorders` (`PurchaseOrderID`),
  ADD CONSTRAINT `goodsreceived_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`EmployeeID`);

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
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`SalesOrderID`) REFERENCES `salesorders` (`SalesOrderID`);

--
-- Constraints for table `permission_roles`
--
ALTER TABLE `permission_roles`
  ADD CONSTRAINT `permission_roles_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_roles_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`permission_id`) ON DELETE CASCADE;

--
-- Constraints for table `salesorderdetails`
--
ALTER TABLE `salesorderdetails`
  ADD CONSTRAINT `salesorderdetails_ibfk_1` FOREIGN KEY (`SalesOrderID`) REFERENCES `salesorders` (`SalesOrderID`),
  ADD CONSTRAINT `salesorderdetails_ibfk_2` FOREIGN KEY (`MaterialID`) REFERENCES `materials` (`MaterialID`);

--
-- Constraints for table `salesorders`
--
ALTER TABLE `salesorders`
  ADD CONSTRAINT `salesorders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);
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