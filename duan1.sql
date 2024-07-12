-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 12, 2024 at 02:03 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`) VALUES
(2, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `cart_detail_id` int NOT NULL,
  `product_detail_id` int NOT NULL,
  `cart_id` int NOT NULL,
  `product_quantity` int NOT NULL,
  `product_size` int NOT NULL,
  `total` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`cart_detail_id`, `product_detail_id`, `cart_id`, `product_quantity`, `product_size`, `total`) VALUES
(11, 1, 2, 2, 40, 6600000);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `category_name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Chưa phân loại'),
(6, 'Rolex');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `evaluation_id` int NOT NULL,
  `content` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `number_stars` tinyint(1) NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`evaluation_id`, `content`, `number_stars`, `product_id`, `user_id`) VALUES
(6, 'aaa', 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `tel` varchar(11) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `total` int NOT NULL,
  `payment_method` enum('cod','banking','','') COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` enum('pending','processing','shiped','delivered','canceled') COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `note` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `fullname`, `email`, `tel`, `address`, `total`, `payment_method`, `status`, `date_add`, `note`) VALUES
(2, 2, 'customer', 'customer@gmail.com', '0359980959', 'hn', 0, 'cod', 'pending', '2024-07-11 10:28:58', 'cod'),
(3, 2, 'customer', 'customer@gmail.com', '0359980959', 'hn', 0, 'cod', 'pending', '2024-07-11 10:29:02', 'cod');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_detail_id` int NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `product_detail_id`, `price`, `quantity`) VALUES
(7, 2, 1, 3300000, 1),
(8, 3, 1, 3300000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_evaluation`
--

CREATE TABLE `order_evaluation` (
  `evaluation_id` int NOT NULL,
  `content` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `number_stars` tinyint(1) NOT NULL,
  `order_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_price` int NOT NULL,
  `discounted_price` int DEFAULT NULL,
  `product_describe` text COLLATE utf8mb4_vietnamese_ci,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int NOT NULL,
  `view` int DEFAULT NULL,
  `highlight` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `discounted_price`, `product_describe`, `date_add`, `category_id`, `view`, `highlight`, `status`) VALUES
(1, 'AIR FORCE 1', 3300000, 0, '', '2023-11-09 08:31:49', 1, 0, 1, 1),
(2, 'NIKE ACG MOUNTAIN FLY 2 LOW', 4800000, 0, NULL, '2023-11-14 03:48:24', 1, 0, 1, 0),
(3, 'NIKE TECH HERA', 3200000, 0, '', '2023-11-14 03:51:54', 1, 0, 1, 0),
(4, 'AIR MAX 1', 4800000, 0, NULL, '2023-11-14 03:51:54', 1, 0, 1, 1),
(5, 'REACT INFINITY RUN FK 3', 3800000, 0, NULL, '2023-11-14 03:53:54', 1, 0, 0, 1),
(6, 'ADIDAS NMD_S1', 2900000, 3600000, NULL, '2023-11-14 04:00:44', 1, 0, 0, 1),
(7, 'ADIDAS DURAMO SL WIDE', 2200000, 0, NULL, '2023-11-14 04:00:44', 1, 0, 0, 1),
(8, 'ADIDAS NMD_G1', 2900000, 0, NULL, '2023-11-14 04:00:44', 1, 0, 0, 1),
(9, 'ADIDAS RUN FALCON 2.0', 1800000, 0, NULL, '2023-11-14 04:00:44', 1, 0, 0, 1),
(10, 'ADIDAS SAMBA CLASSIC', 3200000, 0, '', '2023-11-14 04:00:44', 1, 0, 0, 1),
(19, 'adidas 4', 2, 2, 'ahihi', '2023-11-24 06:53:09', 1, NULL, 0, 0),
(20, 'oooooooooooooooooo', 9999, 99, 'abhabjcbajbcac', '2024-07-11 10:36:48', 1, NULL, 0, 1),
(21, 'oooooooooooooooooo', 9999, 99, 'aaaaaaaaaaaa', '2024-07-11 13:24:07', 1, NULL, 0, 1),
(22, 'oooooooooooooooooo', 9999, 99, 'aaaaaaaaaaaaaa', '2024-07-11 14:48:55', 1, NULL, 0, 1),
(23, 'iiiiiiiiiiiii', 9999, 99, 'gggggggggggggg', '2024-07-11 15:03:19', 6, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_detail`
--

CREATE TABLE `products_detail` (
  `product_detail_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_quantity` int NOT NULL,
  `product_size` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `products_detail`
--

INSERT INTO `products_detail` (`product_detail_id`, `product_id`, `product_quantity`, `product_size`) VALUES
(1, 1, 3, 40),
(2, 1, 5, 41),
(3, 1, 3, 42),
(4, 2, 10, 40),
(5, 2, 20, 41),
(6, 3, 10, 40),
(7, 3, 20, 41),
(8, 3, 30, 42),
(9, 4, 10, 40),
(10, 4, 20, 41),
(11, 4, 5, 42),
(12, 5, 5, 40),
(13, 5, 10, 41),
(14, 5, 15, 42),
(15, 6, 5, 40),
(16, 6, 10, 41),
(17, 6, 12, 42),
(18, 6, 15, 43),
(19, 7, 20, 40),
(20, 7, 11, 41),
(21, 7, 12, 42),
(22, 8, 3, 40),
(23, 8, 12, 41),
(24, 8, 21, 42),
(25, 9, 10, 40),
(26, 9, 5, 41),
(27, 9, 25, 42),
(28, 10, 20, 39),
(29, 10, 15, 40),
(30, 10, 10, 41),
(31, 10, 5, 42),
(38, 19, 42, 40),
(39, 19, 43, 41),
(40, 20, 9, 43),
(41, 21, 10, 43),
(42, 22, 9, 43),
(43, 23, 9, 43);

-- --------------------------------------------------------

--
-- Table structure for table `products_image`
--

CREATE TABLE `products_image` (
  `image_id` int NOT NULL,
  `product_id` int NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `products_image`
--

INSERT INTO `products_image` (`image_id`, `product_id`, `image_name`) VALUES
(1, 1, 'AF1.png'),
(2, 1, 'AF1-1.png'),
(3, 1, 'AF1-2.png'),
(4, 1, 'AF1-3.png'),
(5, 1, 'AF1-4.png'),
(6, 2, 'MT5.png'),
(7, 2, 'MT1.png'),
(8, 2, 'MT2.png'),
(9, 2, 'MT3.png'),
(10, 2, 'MT4.png'),
(11, 3, 'TECH5.png'),
(12, 3, 'TECH1.png'),
(13, 3, 'TECH2.png'),
(14, 3, 'TECH3.png'),
(15, 3, 'TECH4.png'),
(16, 4, 'MAX5.png'),
(17, 4, 'MAX1.png'),
(18, 4, 'MAX2.png'),
(19, 4, 'MAX3.png'),
(20, 4, 'MAX4.png'),
(21, 5, 'FK5.png'),
(22, 5, 'FK1.png'),
(23, 5, 'FK2.png'),
(24, 5, 'FK3.png'),
(25, 5, 'FK4.png'),
(26, 6, 'S1.jpg'),
(27, 6, 'S12.jpg'),
(28, 6, 'S13.jpg'),
(29, 6, 'S14.jpg'),
(30, 7, 'SL.jpg'),
(31, 7, 'SL1.jpg'),
(32, 7, 'SL2.jpg'),
(33, 7, 'SL3.jpg'),
(34, 7, 'SL4.jpg'),
(35, 8, 'G1.jpg'),
(36, 8, 'G2.jpg'),
(37, 8, 'G13.jpg'),
(38, 8, 'G14.jpg'),
(39, 8, 'G15.jpg'),
(40, 9, 'FA.jpg'),
(41, 9, 'FA1.jpg'),
(42, 9, 'FA2.jpg'),
(43, 9, 'FA3.jpg'),
(44, 9, 'FA4.jpg'),
(49, 10, '--.png'),
(56, 19, 'IMG_20221231_122252.jpg'),
(57, 19, 'Amakano_2.png'),
(58, 20, 'Amanatsu.png'),
(59, 10, '5.png'),
(60, 10, '5.png'),
(61, 22, '1 (9).jpg'),
(62, 23, '1 (6).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tel` varchar(11) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `role` enum('admin','customer','','') COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `fullname`, `email`, `password`, `tel`, `address`, `avatar`, `role`) VALUES
(1, 'Admin', 'Admin', 'Admin@gmail.com', 'admin', '', '', '', 'admin'),
(2, 'customer', 'customer', 'customer@gmail.com', 'customer', '', '', '', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `voucher_id` int NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `category_code` tinyint(1) NOT NULL,
  `date_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_end` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `FOREIGN KEY` (`user_id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`cart_detail_id`),
  ADD KEY `FK_cart_detail_1` (`cart_id`),
  ADD KEY `FK_cart_detail_2` (`product_detail_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`evaluation_id`),
  ADD KEY `FK1` (`product_id`),
  ADD KEY `FK2` (`user_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK1_order` (`user_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `FK_order` (`order_id`);

--
-- Indexes for table `order_evaluation`
--
ALTER TABLE `order_evaluation`
  ADD PRIMARY KEY (`evaluation_id`),
  ADD KEY `FK1_eva` (`order_id`),
  ADD KEY `FK2_eva` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `FK_sanpham` (`category_id`);

--
-- Indexes for table `products_detail`
--
ALTER TABLE `products_detail`
  ADD PRIMARY KEY (`product_detail_id`),
  ADD KEY `FK1_sanpham` (`product_id`);

--
-- Indexes for table `products_image`
--
ALTER TABLE `products_image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `FK1_image` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voucher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `cart_detail_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `evaluation_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_evaluation`
--
ALTER TABLE `order_evaluation`
  MODIFY `evaluation_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products_detail`
--
ALTER TABLE `products_detail`
  MODIFY `product_detail_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `products_image`
--
ALTER TABLE `products_image`
  MODIFY `image_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `voucher_id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FOREIGN KEY` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `FK_cart_detail_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_cart_detail_2` FOREIGN KEY (`product_detail_id`) REFERENCES `products_detail` (`product_detail_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK1_order` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `FK_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_evaluation`
--
ALTER TABLE `order_evaluation`
  ADD CONSTRAINT `FK1_eva` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK2_eva` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_sanpham` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `products_detail`
--
ALTER TABLE `products_detail`
  ADD CONSTRAINT `FK1_sanpham` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_image`
--
ALTER TABLE `products_image`
  ADD CONSTRAINT `FK1_image` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
