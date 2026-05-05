-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2026 at 11:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fastfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(24) DEFAULT NULL,
  `passwordHash` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `created_at`, `username`, `passwordHash`) VALUES
(1, 'Rhys', 'rhys@gmail.com', '0000-00-00 00:00:00', NULL, NULL),
(2, 'John Dooe', 'john@example.com', '2026-04-21 09:24:40', 'johndoe', '$2y$10$kIGoFtAF0H2BMJ1ARZ/PlOVXuPhFk7qWAr7xiSyZwBvZ34mY1OLI.'),
(3, 'Barthoelameew IIIIIIIIIIIIIIIIIIII', 'Bethethird@hotmail.com', '2026-04-21 09:26:02', 'The Third', '$2y$10$otUeBMdEJvHzJ319r5fa8eAfKx9MAOMYqSgl4haJvuLF0wfF2FoRO'),
(4, 'Hello World', 'hello@world.com', '2026-04-21 10:36:01', 'HW', '$2y$10$VvcgI7ixdEd0DU./p.g/c.w/KuU67YsmCSSejMBwB9.djNCMROtw.'),
(5, 'Test Test', 'test@gmail.com', '2026-04-21 11:02:13', 'Test', '$2y$10$VYldp1PsEE6gP6PbRM/umebpTxDXOn0gcXvlutHsRU17cwA67l4sS'),
(6, 'Dave Dave', 'dave@dave.dave', '2026-05-05 08:29:26', 'davey', '$2y$10$nGFOlvmtacNScytW6VMQHum9mODYMztY/h.BsOy0JWjPArolF1/Vi');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_type` varchar(4) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `outlet_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_timestamp`, `payment_type`, `staff_id`, `outlet_id`, `customer_id`) VALUES
(1, '2026-05-05 09:00:00', 'CARD', 1, 1, 2),
(2, '2026-05-05 09:00:00', 'CARD', 2, 1, 1),
(3, '2026-05-05 09:02:08', 'CASH', 3, 1, 6),
(4, '2026-05-05 17:15:00', 'CARD', 5, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `savers_menu_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `savers_menu_id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 1, 1, 1),
(2, NULL, 1, 2, 1),
(3, 1, 2, 1, 2),
(4, NULL, 2, 4, 2),
(5, 2, 3, 3, 1),
(6, NULL, 3, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE `outlet` (
  `outlet_id` int(11) NOT NULL,
  `outlet_location` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `outlet`
--

INSERT INTO `outlet` (`outlet_id`, `outlet_location`) VALUES
(1, 'Glasgow City'),
(2, 'Edinburgh'),
(3, 'Aberdeen');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(20) DEFAULT NULL,
  `product_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`) VALUES
(1, 'Cheeseburger', 3.49),
(2, 'Fries', 1.99),
(3, 'Chicken Nuggets', 4.29),
(4, 'Soft Drink', 1.5),
(5, 'Milkshake', 2.99);

-- --------------------------------------------------------

--
-- Table structure for table `restock`
--

CREATE TABLE `restock` (
  `restock_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `restock_quantity` int(11) DEFAULT NULL,
  `restock_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restock`
--

INSERT INTO `restock` (`restock_id`, `product_id`, `restock_quantity`, `restock_date`) VALUES
(1, 1, 100, '2026-05-01'),
(2, 2, 200, '2026-05-01'),
(3, 3, 150, '2026-05-02'),
(4, 4, 300, '2026-05-03'),
(5, 5, 120, '2026-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `saver_menu`
--

CREATE TABLE `saver_menu` (
  `savers_menu_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `menu_type` varchar(20) DEFAULT NULL,
  `menu_section` varchar(20) DEFAULT NULL,
  `menu_start_time` time DEFAULT NULL,
  `menu_end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saver_menu`
--

INSERT INTO `saver_menu` (`savers_menu_id`, `start_date`, `end_date`, `menu_type`, `menu_section`, `menu_start_time`, `menu_end_time`) VALUES
(1, NULL, NULL, 'Lunch Deal', 'Burger + Fries + Dri', '11:00:00', '15:00:00'),
(2, NULL, NULL, 'Evening Deal', 'Nuggets + Fries + Dr', '17:00:00', '21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `shift_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `shift_start` time DEFAULT NULL,
  `shift_end` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`shift_id`, `staff_id`, `shift_start`, `shift_end`) VALUES
(1, 1, '08:00:00', '16:00:00'),
(2, 2, '10:00:00', '18:00:00'),
(3, 3, '12:00:00', '20:00:00'),
(4, 4, '09:00:00', '17:00:00'),
(5, 5, '14:00:00', '22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(25) DEFAULT NULL,
  `staff_role` varchar(20) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_role`, `manager_id`) VALUES
(1, 'John Smith', NULL, NULL),
(2, 'Emma Brown', NULL, NULL),
(3, 'Charlie Brown', 'Crew', 1),
(4, 'Daisy Miller', 'Supervisor', 1),
(5, 'Ethan Davis', 'Crew', 4);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT NULL,
  `last_restock_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `product_id`, `stock_quantity`, `last_restock_date`) VALUES
(1, 1, 100, '2026-05-01'),
(2, 2, 200, '2026-05-01'),
(3, 3, 150, '2026-05-02'),
(4, 4, 300, '2026-05-03'),
(5, 5, 120, '2026-05-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `outlet_id` (`outlet_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `savers_menu_id` (`savers_menu_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`outlet_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `restock`
--
ALTER TABLE `restock`
  ADD PRIMARY KEY (`restock_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `saver_menu`
--
ALTER TABLE `saver_menu`
  ADD PRIMARY KEY (`savers_menu_id`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`shift_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`outlet_id`) REFERENCES `outlet` (`outlet_id`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`savers_menu_id`) REFERENCES `saver_menu` (`savers_menu_id`),
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`),
  ADD CONSTRAINT `order_item_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `restock`
--
ALTER TABLE `restock`
  ADD CONSTRAINT `restock_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `shift`
--
ALTER TABLE `shift`
  ADD CONSTRAINT `shift_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
