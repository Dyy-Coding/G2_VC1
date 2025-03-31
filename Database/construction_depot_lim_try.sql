-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2025 at 11:55 AM
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
(22, 1, 'User logged in', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', '2025-03-20 11:16:37');

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
  `Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `Name`, `ContactPerson`, `Phone`, `Email`, `Address`) VALUES
(47, 'Kingdom Builders', 'John Doe', '123-456-7890', 'contact@kingdombuilders.com', '123 Building St, City, Country'),
(48, 'Urban Developers', 'Jane Smith', '234-567-8901', 'info@urbandesign.com', '456 City Rd, City, Country'),
(49, 'Metro Construction', 'Robert Brown', '345-678-9012', 'robert@metroconstruction.com', '789 Industrial Ave, City, Country'),
(50, 'Bright Future Co.', 'Emily Clark', '456-789-0123', 'emily@brightfuture.com', '101 Business Blvd, City, Country'),
(51, 'Rapid Builders', 'Michael Green', '567-890-1234', 'michael@rapidbuilders.com', '202 Fast Lane, City, Country'),
(52, 'Skyline Construction', 'Alice Johnson', '678-901-2345', 'alice@skylineconstr.com', '303 Sky High St, City, Country'),
(53, 'Pioneer Developers', 'David Wilson', '789-012-3456', 'david@pioneerdevelopers.com', '404 Pioneer Rd, City, Country'),
(54, 'Grand Build Ltd.', 'Sarah Miller', '890-123-4567', 'sarah@grandbuild.com', '505 Grand Ave, City, Country'),
(55, 'Prestige Construction', 'William Taylor', '901-234-5678', 'william@prestigeconstruct.com', '606 Prestige Blvd, City, Country'),
(56, 'Elite Builders', 'Olivia Lee', '012-345-6789', 'olivia@elitebuilders.com', '707 Elite Rd, City, Country'),
(57, 'Advance Engineering', 'James Harris', '123-456-7892', 'james@advanceeng.com', '808 Advance St, City, Country'),
(58, 'Sunrise Construction', 'Sophia Clark', '234-567-8903', 'sophia@sunriseconstr.com', '909 Sunrise Blvd, City, Country'),
(59, 'Solid Foundations', 'Liam Lewis', '345-678-9013', 'liam@solidfoundations.com', '1010 Solid Ave, City, Country'),
(60, 'Northern Builders', 'Benjamin Walker', '456-789-0124', 'benjamin@northernbuilders.com', '1111 Northern St, City, Country'),
(61, 'Vista Builders', 'Lucas Allen', '567-890-1235', 'lucas@vistabuilders.com', '1212 Vista Rd, City, Country'),
(62, 'Urban Dynamics', 'Charlotte Young', '678-901-2346', 'charlotte@urbandynamics.com', '1313 Urban Ave, City, Country'),
(63, 'Innovative Constructions', 'Henry King', '789-012-3457', 'henry@innovativeconstr.com', '1414 Innovation Blvd, City, Country'),
(64, 'Diamond Construction', 'Amelia Scott', '890-123-4568', 'amelia@diamondconstruction.com', '1515 Diamond St, City, Country'),
(65, 'Ocean Builders', 'Ethan Adams', '901-234-5679', 'ethan@oceanbuilders.com', '1616 Ocean Blvd, City, Country'),
(66, 'Core Developers', 'Grace Baker', '012-345-6790', 'grace@coredevelopers.com', '1717 Core Rd, City, Country'),
(67, 'Golden Age Construction', 'Alexander Moore', '123-456-7893', 'alexander@goldenage.com', '1818 Golden St, City, Country'),
(68, 'NextGen Builders', 'Mason Lee', '234-567-8904', 'mason@nextgenbuilders.com', '1919 Nextgen Blvd, City, Country'),
(69, 'Evergreen Builders', 'Isabella Davis', '345-678-9014', 'isabella@evergreenbuilders.com', '2020 Evergreen Rd, City, Country'),
(70, 'Premier Construction', 'Mia Rodriguez', '456-789-0125', 'mia@premierconstruction.com', '2121 Premier Ave, City, Country'),
(71, 'Genesis Construction', 'Elijah Martinez', '567-890-1236', 'elijah@genesisconstruction.com', '2222 Genesis St, City, Country'),
(72, 'Noble Builders', 'Zoe Gonzalez', '678-901-2347', 'zoe@noblebuilders.com', '2323 Noble Rd, City, Country'),
(73, 'Focus Construction', 'Jack Wilson', '789-012-3458', 'jack@focusconstruction.com', '2424 Focus Ave, City, Country'),
(74, 'Brilliant Builders', 'Harper White', '890-123-4569', 'harper@brilliantbuilders.com', '2525 Brilliant Blvd, City, Country'),
(75, 'Mighty Construction', 'Sebastian King', '901-234-5680', 'sebastian@mightyconstruction.com', '2626 Mighty Rd, City, Country'),
(76, 'Next Level Builders', 'Amos Harris', '012-345-6791', 'amos@nextlevelbuilders.com', '2727 Next Level St, City, Country'),
(77, 'Horizon Builders', 'Jackie Clark', '123-456-7894', 'jackie@horizonbuilders.com', '2828 Horizon Ave, City, Country'),
(78, 'Infinity Construction', 'Evelyn Martinez', '234-567-8905', 'evelyn@infinityconstruction.com', '2929 Infinity Rd, City, Country'),
(79, 'Visionary Builders', 'Lily Thompson', '345-678-9015', 'lily@visionarybuilders.com', '3030 Visionary Blvd, City, Country'),
(80, 'Precision Construction', 'Daniel Allen', '456-789-0126', 'daniel@precisionconstruction.com', '3131 Precision St, City, Country'),
(81, 'Skyline Engineering', 'Ella White', '567-890-1237', 'ella@skylineeng.com', '3232 Skyline Rd, City, Country'),
(82, 'Titan Builders', 'Aiden Harris', '678-901-2348', 'aiden@titanbuilders.com', '3333 Titan Ave, City, Country'),
(83, 'Metro City Developers', 'Nora King', '789-012-3459', 'nora@metrocities.com', '3434 Metro City Blvd, City, Country'),
(84, 'Silverstone Construction', 'Leo Moore', '890-123-4570', 'leo@silverstoneconstruction.com', '3535 Silverstone Rd, City, Country'),
(85, 'Majestic Builders', 'Liam Clark', '901-234-5681', 'liam@majesticbuilders.com', '3636 Majestic St, City, Country'),
(86, 'Premier Development', 'Ella Lee', '012-345-6792', 'ella@premierdevelopment.com', '3737 Premier Blvd, City, Country'),
(87, 'NorthStar Construction', 'Chloe Taylor', '123-456-7895', 'chloe@northstarconstruction.com', '3838 NorthStar Rd, City, Country'),
(88, 'Pinnacle Builders', 'Ethan Brown', '234-567-8906', 'ethan@pinnaclebuilders.com', '3939 Pinnacle St, City, Country'),
(89, 'Benchmark Construction', 'Liam Johnson', '345-678-9016', 'liam@benchmarkconstruction.com', '4040 Benchmark Ave, City, Country'),
(90, 'Elite Engineering', 'Amelia Green', '456-789-0127', 'amelia@eliteengineering.com', '4141 Elite Rd, City, Country'),
(91, 'Grand Design Builders', 'Sophia Carter', '567-890-1238', 'sophia@granddesign.com', '4242 Grand Design Blvd, City, Country'),
(92, 'SilverRock Developers', 'Jacob Walker', '678-901-2349', 'jacob@silverrock.com', '4343 SilverRock Rd, City, Country');

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
(1, NULL, '2025-03-26', 'Paid', 300.00, 'Paid'),
(7, 3, '2024-03-06', 'Paid', 1200.00, 'Pending'),
(8, 4, '2024-03-07', 'Pending', 800.00, 'Pending'),
(9, 5, '2024-03-08', 'Overdue', 650.00, 'Pending');

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
(9, 'lymeng', 19, 90, 7.99, 2, 3, 9, 'Bav', 'kg', NULL, 'hdhfdhdh', '2025-03-18 19:42:44', '2025-03-18 19:42:44', 'K cementmong', 'Phnom penh', '07654352409', '', 2),
(16, 'Cement', 1, 500, 7.50, 2, 50, 100, 'Bags', '50kg', 'images/cement.jpg', 'High quality cement for construction works.', '2025-03-26 16:18:55', '2025-03-26 16:18:55', 'BrandA', 'Warehouse A', 'John Doe, 0123456789', 'Active', 12),
(17, 'Steel Bars', 2, 1000, 3.00, 3, 100, 200, 'Meters', '10mm', 'images/steel_bars.jpg', 'Steel bars for reinforcement in concrete.', '2025-03-26 16:18:55', '2025-03-26 16:18:55', 'BrandB', 'Warehouse B', 'Jane Smith, 0123456790', 'Active', 24),
(18, 'Bricks', 3, 3000, 0.50, 4, 200, 400, 'Pieces', 'Standard', 'images/bricks.jpg', 'Standard red bricks for construction.', '2025-03-26 16:18:55', '2025-03-26 16:18:55', 'BrandC', 'Warehouse C', 'Sam Lee, 0123456791', 'Pending', NULL),
(19, 'Sand', 4, 2000, 2.00, 5, 150, 300, 'Cubic Meters', 'Large', 'images/sand.jpg', 'River sand for concrete mixing and building work.', '2025-03-26 16:18:55', '2025-03-26 16:18:55', 'BrandD', 'Warehouse D', 'Alice Brown, 0123456792', 'Active', NULL),
(20, 'Gravel', 4, 1500, 1.50, 6, 100, 200, 'Cubic Meters', 'Medium', 'images/gravel.jpg', 'Gravel for foundation works.', '2025-03-26 16:18:55', '2025-03-26 16:18:55', 'BrandE', 'Warehouse E', 'Bob White, 0123456793', 'Active', NULL),
(21, 'Paint', 5, 800, 15.00, 7, 50, 100, 'Gallons', '5L', 'images/paint.jpg', 'Waterproof paint for external surfaces.', '2025-03-26 16:18:55', '2025-03-26 16:18:55', 'BrandF', 'Warehouse F', 'Charlie Green, 0123456794', 'Discontinued', 36),
(22, 'Tiles', 6, 1200, 2.50, 8, 100, 200, 'Square Meters', '30x30cm', 'images/tiles.jpg', 'Ceramic tiles for flooring and wall tiling.', '2025-03-26 16:18:55', '2025-03-26 16:18:55', 'BrandG', 'Warehouse G', 'David Black, 0123456795', 'Active', NULL);

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
(1, 1, '2024-03-06', 1200.00, 'Cash', 'Pending'),
(2, 2, '2024-03-07', 800.00, 'Credit Card', 'Completed'),
(3, 3, '2024-03-08', 500.00, 'Bank Transfer', 'Completed'),
(4, 4, '2024-03-09', 1500.00, 'Other', 'Pending'),
(5, 5, '2025-03-26', 1000.00, '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorderdetails`
--

CREATE TABLE `purchaseorderdetails` (
  `ID` int(11) NOT NULL,
  `PurchaseOrderID` int(11) DEFAULT NULL,
  `MaterialID` int(11) DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  `UnitPrice` decimal(10,2) NOT NULL,
  `OrderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchaseorderdetails`
--

INSERT INTO `purchaseorderdetails` (`ID`, `PurchaseOrderID`, `MaterialID`, `Quantity`, `UnitPrice`, `OrderDate`) VALUES
(81, 2, 16, 50, 4.50, '2024-03-01'),
(82, 4, 17, 100, 2.75, '2024-03-01'),
(83, 2, 18, 200, 3.00, '2024-03-02'),
(84, 2, 19, 150, 5.25, '2024-03-02'),
(85, 3, 20, 300, 1.80, '2024-03-03'),
(86, 3, 21, 100, 6.00, '2024-03-03'),
(87, 4, 22, 80, 2.50, '2024-03-04');

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
(2, 'Manager', 'Can manage inventory, suppliers, and sales orders.', '2025-02-01 03:30:00', '2025-03-20 04:15:00'),
(3, 'Employee', 'Can update work logs and view sales and inventory.', '2025-03-01 07:00:00', '2025-03-20 05:00:00'),
(4, 'Sales', 'Can only view and manage sales-related information.', '2025-03-05 01:30:00', '2025-03-20 06:30:00'),
(5, 'Inventory Staff', 'Manages inventory stock levels and warehouse data.', '2025-03-10 09:45:00', '2025-03-20 07:00:00');

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
(1, 1, 1, 50, 4.50, '2024-03-01', '2025-03-26 08:21:55', '2025-03-26 08:21:55'),
(2, 1, 2, 100, 2.75, '2024-03-01', '2025-03-26 08:21:55', '2025-03-26 08:21:55'),
(3, 2, 3, 500, 0.80, '2024-03-03', '2025-03-26 08:21:55', '2025-03-26 08:21:55'),
(4, 3, 1, 30, 4.50, '2024-03-05', '2025-03-26 08:21:55', '2025-03-26 08:21:55'),
(5, 4, 1, 100, 4.25, '2024-03-06', '2025-03-26 10:26:40', '2025-03-26 10:26:40'),
(6, 4, 2, 150, 3.00, '2024-03-06', '2025-03-26 10:26:40', '2025-03-26 10:26:40'),
(7, 5, 3, 200, 1.50, '2024-03-07', '2025-03-26 10:26:40', '2025-03-26 10:26:40'),
(8, 5, 4, 75, 2.75, '2024-03-07', '2025-03-26 10:26:40', '2025-03-26 10:26:40'),
(9, 6, 1, 120, 4.75, '2024-03-08', '2025-03-26 10:26:40', '2025-03-26 10:26:40'),
(10, 6, 5, 180, 3.50, '2024-03-08', '2025-03-26 10:26:40', '2025-03-26 10:26:40'),
(11, 7, 2, 130, 3.00, '2024-03-09', '2025-03-26 10:26:40', '2025-03-26 10:26:40'),
(12, 7, 3, 100, 0.80, '2024-03-09', '2025-03-26 10:26:40', '2025-03-26 10:26:40'),
(13, 8, 6, 50, 2.00, '2024-03-10', '2025-03-26 10:26:40', '2025-03-26 10:26:40'),
(14, 8, 4, 200, 3.00, '2024-03-10', '2025-03-26 10:26:40', '2025-03-26 10:26:40'),
(15, 1, 1, 50, 4.50, '2025-03-26', '2025-03-26 10:40:53', '2025-03-26 10:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `salesorders`
--

CREATE TABLE `salesorders` (
  `SalesOrderID` int(11) NOT NULL,
  `CustomerName` varchar(100) NOT NULL,
  `OrderDate` date NOT NULL,
  `TotalAmount` decimal(10,2) NOT NULL,
  `Status` enum('Pending','Completed','Cancelled') DEFAULT 'Pending',
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesorders`
--

INSERT INTO `salesorders` (`SalesOrderID`, `CustomerName`, `OrderDate`, `TotalAmount`, `Status`, `CreatedAt`) VALUES
(1, 'Kingdom Builders', '2024-03-04', 1200.00, 'Completed', '2025-03-26 07:57:18'),
(2, 'Urban Developers', '2024-03-05', 800.00, 'Pending', '2025-03-26 07:57:18'),
(3, 'Kingdom Builders', '2024-03-06', 1200.00, 'Completed', '2025-03-26 08:09:05'),
(4, 'Urban Developers', '2024-03-07', 800.00, 'Pending', '2025-03-26 08:09:05'),
(5, 'Metro Construction', '2024-03-08', 650.00, 'Completed', '2025-03-26 08:09:05'),
(6, 'Elite Builders', '2024-03-09', 900.00, '', '2025-03-26 08:15:10'),
(7, 'Prime Construction', '2024-03-10', 1100.00, 'Completed', '2025-03-26 08:15:10'),
(8, 'Skyline Developers', '2024-03-11', 1500.00, 'Pending', '2025-03-26 08:15:10'),
(9, 'Innovative Structures', '2024-03-12', 1300.00, 'Completed', '2025-03-26 08:15:10'),
(10, 'City Constructors', '2024-03-13', 1000.00, '', '2025-03-26 08:15:10');

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
-- update suplliers
-- 
ALTER TABLE suppliers
ADD COLUMN CategoryID INT(11) AFTER SupplierID;



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
(10, 'HeavyDuty Machinery', 'Rachel Santos', '09012345678', 'rachel@heavyduty.com', '99 Machine Zone, Power City', '2025-03-18 00:13:58', '2025-03-18 00:13:58'),
(11, 'ABC Construction Supply', 'Alice Johnson', '0991234567', 'alice@abc.com', '123 Main St, Phnom Penh', '2025-03-26 07:53:57', '2025-03-26 07:53:57'),
(12, 'XYZ Hardware', 'Bob Smith', '0887654321', 'bob@xyz.com', '456 Industrial Rd, Siem Reap', '2025-03-26 07:53:57', '2025-03-26 07:53:57'),
(13, 'BuildPro Materials', 'Charlie Lee', '0976543210', 'charlie@buildpro.com', '789 Depot Ave, Sihanoukville', '2025-03-26 07:53:57', '2025-03-26 07:53:57'),
(14, 'ABC Construction Supply', 'Alice Johnson', '0991234567', 'alice@abc.com', '123 Main St, Phnom Penh', '2025-03-26 07:54:23', '2025-03-26 07:54:23'),
(15, 'XYZ Hardware', 'Bob Smith', '0887654321', 'bob@xyz.com', '456 Industrial Rd, Siem Reap', '2025-03-26 07:54:23', '2025-03-26 07:54:23'),
(16, 'BuildPro Materials', 'Charlie Lee', '0976543210', 'charlie@buildpro.com', '789 Depot Ave, Sihanoukville', '2025-03-26 07:54:23', '2025-03-26 07:54:23'),
(17, 'ABC Construction Supply', 'Alice Johnson', '0991234567', 'alice@abc.com', '123 Main St, Phnom Penh', '2025-03-26 07:54:32', '2025-03-26 07:54:32'),
(18, 'XYZ Hardware', 'Bob Smith', '0887654321', 'bob@xyz.com', '456 Industrial Rd, Siem Reap', '2025-03-26 07:54:32', '2025-03-26 07:54:32'),
(19, 'BuildPro Materials', 'Charlie Lee', '0976543210', 'charlie@buildpro.com', '789 Depot Ave, Sihanoukville', '2025-03-26 07:54:32', '2025-03-26 07:54:32');

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
(2, 'default_value', NULL, 'Chandy', 'Neat', 'chandyneat9999@gmail.com', '', 2, '$2y$10$oyNswhcyN11Bd3BEcYrcfuhSS11GZG5d0QKhacwkYDijvEWkvSqVO', 'Phnom Penh', '', '2025-03-20 11:11:26', '2025-03-20 11:11:26');

--
-- Indexes for dumped tables
--


-- Update image for user table 
UPDATE users 
SET profile_image = '/uploads/profile.jpg' 
WHERE user_id = 1;

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
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PurchaseOrderID` (`PurchaseOrderID`),
  ADD KEY `MaterialID` (`MaterialID`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

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
  MODIFY `MaterialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchaseorderdetails`
--
ALTER TABLE `purchaseorderdetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

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
  MODIFY `SalesOrderDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `salesorders`
--
ALTER TABLE `salesorders`
  MODIFY `SalesOrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `purchaseorderdetails_ibfk_1` FOREIGN KEY (`PurchaseOrderID`) REFERENCES `purchaseorders` (`PurchaseOrderID`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchaseorderdetails_ibfk_2` FOREIGN KEY (`MaterialID`) REFERENCES `materials` (`MaterialID`) ON DELETE CASCADE;

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
