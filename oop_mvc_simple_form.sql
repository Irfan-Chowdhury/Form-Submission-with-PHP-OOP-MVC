-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 31, 2024 at 02:02 PM
-- Server version: 8.0.37-0ubuntu0.22.04.3
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oop_mvc_simple_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint NOT NULL,
  `amount` int NOT NULL,
  `buyer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `receipt_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `items` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `buyer_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `buyer_ip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hash_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `entry_at` date NOT NULL,
  `entry_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `amount`, `buyer`, `receipt_id`, `items`, `buyer_email`, `buyer_ip`, `note`, `city`, `phone`, `hash_key`, `entry_at`, `entry_by`) VALUES
(22, 44, 'Veritatis voluptatem', 'assumenda', 'test1, test2, test3', 'tenam@mailinator.com', '127.0.0.1', 'Sed commodi harum di', 'Sunt quia dolores al', '8801829498634', '8d54474d2c833d3e0df0b2a5e95f724e308f7c5df7a4b47a7d474363276b3db2d17e1b684d1a83cd3f23fa1d53df5adbf8392942b3588c64798012f68683f4e7', '2024-08-30', 76),
(23, 74, 'Et in possimus mole', 'Perspiciatis', 'Officiis vero sed et', 'disun@mailinator.com', '127.0.0.1', 'Ad aspernatur archit', 'Est quisquam sunt p', '8801939498634', '1cc1e93f26809955b5ab02b5657197a9fddc4e524f6d376f47b59df542af6fe13a03694f9aa3889b88f03601e8c6aabe6b68719cc5e85fd684004e389995ef64', '2024-08-31', 68),
(24, 31, 'Repellendus Volupta', 'cupiditate', 'Voluptas temporibus ', 'burasadozi@mailinator.com', '127.0.0.1', 'Do sed enim vitae ut', 'Voluptates dolore se', '8801839498634', 'cbfed85d397075ea4f3ca4051156a2dee15b800732578311e5f6fc0e9841745b4146931b68ef82d0836bd89e52e538d50869085e2a6705cc175b5fe6b94129bc', '2024-08-31', 14),
(25, 31, 'Ullamco amet nostru', 'dolor', 'Reprehenderit dicta', 'sumow@mailinator.com', '127.0.0.1', 'Consectetur quasi i', 'Magna vitae assumend', '8801998498634', 'f4369a787f28158e400b5e281d37065104eff073bb8c9c1f99852d55f534989050d68b668701f80530be92f7177fab320422786480acdf82e3de9485b072804e', '2024-08-31', 65);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
