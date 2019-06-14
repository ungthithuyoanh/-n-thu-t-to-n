-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2019 at 03:20 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fooding_one`
--

-- --------------------------------------------------------

--
-- Table structure for table `foodshop`
--

CREATE TABLE `foodshop` (
  `id` int(225) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `shop_types` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `open_time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cost` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `crtime` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(225) DEFAULT NULL,
  `shipped` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prepare` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `foodshop`
--

INSERT INTO `foodshop` (`id`, `name`, `shop_types`, `address`, `open_time`, `cost`, `img`, `crtime`, `updateTime`, `user_id`, `shipped`, `prepare`) VALUES
(1, 'A Hải -  Cơm Gà Xối Mỡ', 'Quán Ăn', '96 Phan Chu Trinh, Quận Hải Châu, Đà Nẵng', '10:00 - 22:00', '30,000 - 55,000', 'g11.jpg', '2019-05-13 17:14:23', '2019-06-07 15:36:35', 2, '6.000', '10 Phút'),
(2, 'The Alley - Trà Sữa Đài Loan - 2 Tháng 9', 'Cafe/Dessert', 'Lô 29 - 30 Đường 2 Tháng 9, Quận Hải Châu, Đà Nẵng', '08:30 - 22:00', '41,000 - 65,000', 'gg2.jpg', '2019-05-13 17:38:38', '2019-05-13 17:38:38', 2, '6.000', '15 Phút'),
(3, 'TooCha - Trà Sữa Không Mập - Nguyễn Văn Linh', 'Cafe/Dessert', '79 Nguyễn Văn Linh, Quận Hải Châu, Đà Nẵng', '09:00 - 23:00', '39,000 - 69,000', 'gg3.jpg', '2019-05-13 17:40:56', '2019-05-13 17:40:56', 1, '5.000', '20 Phút'),
(4, 'Tiệm Chay Xưa', 'Quán Ăn, Ăn Chay', '4 Nguyễn Thị Minh Khai, Quận Hải Châu, Đà Nẵng', '06:30 -14:00 | 16:30 - 21:00', '15,000 - 35,000', 'gg4.jpg', '2019-05-13 20:50:11', '2019-05-13 20:50:11', 1, '5.000', '10 Phút'),
(5, 'Vàng Nâu Cake Studio', 'Tiệm Bánh', 'K19/12 Đinh Tiên Hoàng, Quận Thanh Khê, Đà Nẵng', '08:30 - 22:00', '45,000 - 500,000', 'gg5.jpg', '2019-05-13 20:55:34', '2019-05-13 20:55:34', 1, '5.000', '10 Phút'),
(6, 'Quán Chay Thúy', 'Quán Ăn, Ăn Chay', '122 Hoàng Diệu, P. Hải Châu 2, Quận Hải Châu, Đà Nẵng', '06:30 - 21:00', '15,000 - 33,000', 'gg6.jpg', '2019-05-13 20:57:53', '2019-05-13 20:57:53', 1, '5.000', '30 Phút'),
(7, 'Gà Rán KFC - Co.opMart', 'Nhà Hàng', 'Tầng Trệt, Co.opMart, 478 Điện Biên Phủ, Quận Thanh Khê, Đà Nẵng', '09:00 - 21:00', '29,000 - 179,000', 'gg19.jpg', '2019-06-13 12:08:08', '2019-06-13 12:08:08', 9, '6.000', '10 Phút'),
(8, 'Ba Hưng Bakery - Nguyễn Văn Thoại', 'Tiệm Bánh', '47 Nguyễn Văn Thoại, Quận Sơn Trà, Đà Nẵng', '06:00 - 22:30', '10,000 - 200,000', 'gg8.jpg', '2019-05-23 20:10:54', '2019-05-23 20:10:54', 1, '5.000', '10 Phút'),
(9, 'Trà Sữa House Of Cha - Hùng Vương', 'Cafe/Dessert', '341 Hùng Vương, P. Vĩnh Trung, Quận Thanh Khê, Đà Nẵng', '07:00 - 22:30', '27,000 - 55,000', 'gg9.jpg', '2019-06-10 03:10:20', '2019-06-10 03:10:20', 9, '5.000', '15 Phút'),
(10, 'Hương Chè Thái - Chi Lăng', 'Ăn vặt/vỉa hè', '41 Chi Lăng, Quận Hải Châu, Đà Nẵng', '08:00 - 22:00', '12,000 - 28,000', 'gg7.jpg', '2019-05-13 20:59:23', '2019-05-13 20:59:23', 2, '6.000', '20 Phút'),
(11, 'Gà Rán KFC - Nguyễn Văn Linh', 'Nhà Hàng', '148 Nguyễn Văn Linh, P. Nam Dương, Quận Hải Châu, Đà Nẵng', '09:00 - 21:30', '29,000 - 179,000', 'gg18.jpg', '2019-06-13 12:08:08', '2019-06-13 12:08:08', 9, '6.000', '10 Phút');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(225) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `type_id` int(225) NOT NULL,
  `img` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `crtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `type_id`, `img`, `crtime`, `updateTime`) VALUES
(1, 'Combo cùng nhau: Cơm gà quay + Cơm gà xé', 92, 1, 'p1_gg1.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(2, 'Combo một mình: Cơm gà quay + Nước cốc', 64, 1, 'p2_gg1.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(3, 'Cơm gà quay', 52, 2, 'p3_gg1.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(4, 'Cơm sườn', 35, 2, 'p4_gg1.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(5, 'Cơm bò xào', 40, 2, 'p5_gg1.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(6, 'Pepsi', 13, 3, 'p6_gg1.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(7, 'Twister', 13, 3, 'p7_gg1.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(8, 'Bia Tiger', 16, 3, 'p8_gg1.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(9, 'Bia Larue', 13, 3, 'p9_gg1.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(10, 'Trà sữa kem cheese đường đen', 58, 4, 'p1_gg2.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(11, 'Trà kem cheese đường đen', 58, 4, 'p2_gg2.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(12, '\r\nTrà Ô long Qingcha', 45, 5, 'p3_gg2.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(13, 'Hồng trà Assam', 41, 5, 'p4_gg2.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(14, 'Hồng trà sữa', 52, 6, 'p5_gg2.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(15, 'Trà sữa trân châu', 53, 6, 'p6_gg2.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(16, 'Trà sữa hạnh phúc', 69, 6, 'p7_gg2.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(17, '\r\nLục trà chanh dây + (trân châu + thạch dừa)', 58, 7, 'p8_gg2.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(18, 'Nước táo + nha đam', 55, 7, 'p9_gg2.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(19, 'Lục trà đào', 42, 8, 'p1_gg3.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(20, 'Lục trà xoài', 42, 8, 'p2_gg3.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(21, 'Trà olong bí đao', 43, 8, 'p3_gg3.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(22, 'Lục trà chanh tươi', 42, 8, 'p4_gg3.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(23, 'Hồng trà sữa hạt dẻ', 49, 9, 'p5_gg3.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(24, 'Lục trà sữa', 41, 9, 'p6_gg3.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(25, 'Cơm gạo lứt trộn ngũ quả', 35, 10, 'p1_gg4.jpg', '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(26, 'Cơm thố', 30, 10, NULL, '2019-06-07 16:51:56', '2019-06-07 16:51:56'),
(27, 'Chè Khúc Bạch', 30, 13, 'p1_gg5.jpg', '2019-06-12 20:35:53', '2019-06-12 20:35:53'),
(28, 'Bánh bông lan trứng muối hộp chữ nhật', 75, 15, 'p2_gg5.jpg', '2019-06-12 20:35:53', '2019-06-12 20:35:53'),
(29, '\r\nBông lan trứng muối sinh nhật 16cm', 160, 15, 'p3_gg5.jpg', '2019-06-12 21:12:45', '2019-06-12 21:12:45'),
(30, '\r\nBánh mỳ hoa cúc (1 cái)', 75, 14, 'p4_gg5.jpg', '2019-06-12 21:12:45', '2019-06-12 21:12:45'),
(31, '\r\nBánh chuối hạnh nhân', 35, 14, 'p5_gg5.jpg', '2019-06-12 21:14:34', '2019-06-12 21:14:34'),
(32, 'Tiramisu Thần Thánh', 45, 16, 'p6_gg5.jpg', '2019-06-12 21:14:34', '2019-06-12 21:14:34'),
(33, '\r\nPhô mai chanh dây', 35, 16, 'p7_gg5.jpg', '2019-06-12 21:18:01', '2019-06-12 21:18:01'),
(34, '\r\nBánh bông lan trứng muối 18cm', 130, 15, 'p8_gg5.jpg', '2019-06-12 21:18:01', '2019-06-12 21:18:01'),
(35, 'Gỏi miến Thái Lan', 50, 11, NULL, '2019-06-13 11:55:26', '2019-06-13 11:55:26'),
(36, 'Gỏi hoa chuối', 50, 11, NULL, '2019-06-13 11:55:26', '2019-06-13 11:55:26'),
(37, 'Mì quảng nghệ', 25, 12, 'p2_gg4.jpg', '2019-06-13 11:57:42', '2019-06-13 11:57:42'),
(38, 'Mì xào mềm', 40, 12, NULL, '2019-06-13 11:57:42', '2019-06-13 11:57:42'),
(39, 'Cơm gà xé chay', 25, 17, NULL, '2019-06-13 12:02:49', '2019-06-13 12:02:49'),
(40, 'Cơm chiên dương châu', 25, 17, NULL, '2019-06-13 12:02:49', '2019-06-13 12:02:49'),
(41, 'Bún măng gà chay', 25, 18, NULL, '2019-06-13 12:04:09', '2019-06-13 12:04:09'),
(42, 'Bún mắm', 25, 18, 'p1_gg6.jpg', '2019-06-13 12:04:09', '2019-06-13 12:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `user_id` int(225) NOT NULL,
  `shop_id` int(225) NOT NULL,
  `comment` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `crtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sugests`
--

CREATE TABLE `sugests` (
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(225) DEFAULT NULL,
  `crtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sugests`
--

INSERT INTO `sugests` (`email`, `comment`, `user_id`, `crtime`, `id`) VALUES
('', 'cam on', NULL, '2019-06-13 11:44:59', 1),
('', 'hi', 2, '2019-06-13 14:10:50', 2);

-- --------------------------------------------------------

--
-- Table structure for table `types_products`
--

CREATE TABLE `types_products` (
  `id` int(225) NOT NULL,
  `shop_id` int(225) NOT NULL,
  `types` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `crtime` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateTime` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types_products`
--

INSERT INTO `types_products` (`id`, `shop_id`, `types`, `crtime`, `updateTime`) VALUES
(1, 1, 'COMBO', '2019-06-07 16:51:14', '2019-06-07 16:51:14'),
(2, 1, 'CƠM', '2019-06-07 16:51:14', '2019-06-07 16:51:14'),
(3, 1, 'THỨC UỐNG', '2019-06-07 16:51:14', '2019-06-07 16:51:14'),
(4, 2, 'KEM CHEESE ĐƯỜNG ĐEN', '2019-06-07 16:51:14', '2019-06-07 16:51:14'),
(5, 2, 'HƯƠNG VỊ NGUYÊN CHẤT', '2019-06-07 16:51:14', '2019-06-07 16:51:14'),
(6, 2, 'TRÀ SỮA', '2019-06-07 16:51:14', '2019-06-07 16:51:14'),
(7, 2, 'THE ALLEY ĐẶC BIỆT', '2019-06-07 16:51:14', '2019-06-07 16:51:14'),
(8, 3, 'FRUIT TEA', '2019-06-07 16:51:14', '2019-06-07 16:51:14'),
(9, 3, 'MILK TEA', '2019-06-07 16:51:14', '2019-06-07 16:51:14'),
(10, 4, 'MÓN CƠM', '2019-06-07 16:51:14', '2019-06-07 16:51:14'),
(11, 4, 'MÓN GỎI', '2019-06-07 16:51:14', '2019-06-07 16:51:14'),
(12, 4, 'ĐIỂM TÂM', '2019-06-07 16:51:14', '2019-06-07 16:51:14'),
(13, 5, 'MÓN CHÈ', '2019-06-12 20:32:54', '2019-06-12 20:32:54'),
(14, 5, 'BÁNH NGỌT', '2019-06-12 20:32:54', '2019-06-12 20:32:54'),
(15, 5, 'BÔNG LAN TRỨNG MUỐI', '2019-06-12 20:33:46', '2019-06-12 20:33:46'),
(16, 5, 'BÁNH LẠNH', '2019-06-12 20:33:46', '2019-06-12 20:33:46'),
(17, 6, 'MÓN CƠM', '2019-06-13 12:01:38', '2019-06-13 12:01:38'),
(18, 6, 'MÓN BÚN', '2019-06-13 12:01:38', '2019-06-13 12:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(225) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vkey` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verified` int(2) NOT NULL DEFAULT '0',
  `role` int(20) NOT NULL,
  `crtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updateTime` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `sex`, `birthday`, `phone`, `address`, `vkey`, `verified`, `role`, `crtime`, `token`, `updateTime`) VALUES
(1, 'Van Tri', '123456', 'Lê Văn Trí', 'vantri27051998@gmail.com', 'Nữ', NULL, '0967516036', '', '974dec04e280328bb3ec724f60d2b7b1', 1, 3, '2019-05-22 13:59:01', NULL, '2019-06-07 16:52:51'),
(2, 'One one', '123456', 'One Thùy', 'vantri.dev@gmail.com', 'Nữ', NULL, '', '', 'a133f52e29e56074d2109cf334a2fb31', 1, 3, '2019-05-24 13:47:26', NULL, '2019-06-07 16:52:51'),
(3, 'Thùy Oanh', '123456', 'Ung Thị Thùy Oanh', 'ungthithuyoanh1998@gmail.com', 'Nữ', '1998-05-17', '0967516036', '', '2e94d74aa6cbc07f99f9af9ea840e605', 1, 1, '2019-05-10 17:48:46', NULL, '2019-06-07 16:52:51'),
(4, 'Nho Tiên', '123456', 'Ung Nho Tiên', 'ungnhotien110@gmail.com', NULL, '1998-07-24', '', '', 'ca97d3cbe703ed4059985c3091397522', 1, 0, '2019-05-25 14:11:41', NULL, '2019-06-07 16:52:51'),
(6, 'Cẩm Nga', '123456', 'Trần Thị Cẩm Nga', 'camnga2608@gmail.com', NULL, NULL, NULL, NULL, '5e7372869ead17e6ce0479b988dd18f9', 1, 0, '2019-06-08 11:50:52', NULL, '2019-06-08 11:50:52'),
(7, 'Thanh Phúc', '123456', 'Nguyễn Thanh Phúc', 'ntp98@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, 3, '2019-06-08 11:53:02', NULL, '2019-06-08 11:53:02'),
(8, 'Ung Anh Vũ', '123456', 'Ung Anh Vũ', 'unganhvu98@gmail.com', NULL, NULL, NULL, NULL, 'c4a069aac23dca8593b9df3d16ac026b', 0, 0, '2019-06-10 00:46:05', NULL, '2019-06-10 00:46:05'),
(9, 'Đức Hoàng', '123456', 'Lê Đức Hoàng', 'lehoang5398@gmail.com', NULL, NULL, NULL, NULL, '621b80152280f5921b9f045d6e6643e5', 0, 3, '2019-06-10 01:02:13', NULL, '2019-06-10 01:02:13'),
(10, 'One Thùy', '123456', 'Ung Thị Thùy Trang', 'ungthithuyoanh170598@gmail.com', NULL, NULL, NULL, NULL, '484cc9b7194fd6cd5971ded293cc20cd', 1, 0, '2019-06-13 14:07:57', NULL, '2019-06-13 14:07:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foodshop`
--
ALTER TABLE `foodshop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `shop_id` (`shop_id`);

--
-- Indexes for table `sugests`
--
ALTER TABLE `sugests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `types_products`
--
ALTER TABLE `types_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_shop` (`shop_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foodshop`
--
ALTER TABLE `foodshop`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sugests`
--
ALTER TABLE `sugests`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `types_products`
--
ALTER TABLE `types_products`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foodshop`
--
ALTER TABLE `foodshop`
  ADD CONSTRAINT `foodshop_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types_products` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`shop_id`) REFERENCES `foodshop` (`id`);

--
-- Constraints for table `sugests`
--
ALTER TABLE `sugests`
  ADD CONSTRAINT `sugests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `types_products`
--
ALTER TABLE `types_products`
  ADD CONSTRAINT `types_products_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `foodshop` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
