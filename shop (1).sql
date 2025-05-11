-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 10:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `order_note` varchar(500) DEFAULT 'none',
  `products_data` longtext DEFAULT NULL,
  `order_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_sell` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `first_name`, `last_name`, `country`, `address`, `city`, `state`, `postcode`, `phone`, `email`, `order_note`, `products_data`, `order_datetime`, `total_sell`) VALUES
(1, 'Romal', 'Kumar', 'Pakistan', 'bagh colony', 'tando ajm', 'pakistan', '70060', '94933003924', 'romalkumar8@gmail.com', 'hello', 'a:3:{i:0;a:11:{s:2:\"ID\";s:1:\"1\";s:4:\"NAME\";s:4:\"Meat\";s:5:\"PRICE\";s:2:\"30\";s:5:\"IMAGE\";s:13:\"product-1.jpg\";s:8:\"DISCOUNT\";s:1:\"0\";s:8:\"CATEGORY\";s:4:\"Meat\";s:11:\"product_qty\";s:1:\"1\";s:15:\"product_details\";s:252:\"Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.\";s:2:\"id\";s:2:\"56\";s:10:\"product_id\";s:1:\"1\";s:16:\"discounted_price\";s:7:\"30.0000\";}i:1;a:11:{s:2:\"ID\";s:1:\"3\";s:4:\"NAME\";s:6:\"Orange\";s:5:\"PRICE\";s:2:\"50\";s:5:\"IMAGE\";s:13:\"product-3.jpg\";s:8:\"DISCOUNT\";s:2:\"10\";s:8:\"CATEGORY\";s:5:\"Fruit\";s:11:\"product_qty\";s:1:\"2\";s:15:\"product_details\";s:252:\"Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.\";s:2:\"id\";s:2:\"57\";s:10:\"product_id\";s:1:\"3\";s:16:\"discounted_price\";s:7:\"45.0000\";}i:2;a:11:{s:2:\"ID\";s:1:\"6\";s:4:\"NAME\";s:5:\"Mango\";s:5:\"PRICE\";s:3:\"200\";s:5:\"IMAGE\";s:13:\"product-6.jpg\";s:8:\"DISCOUNT\";s:1:\"0\";s:8:\"CATEGORY\";s:5:\"Fruit\";s:11:\"product_qty\";s:1:\"1\";s:15:\"product_details\";s:252:\"Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.\";s:2:\"id\";s:2:\"58\";s:10:\"product_id\";s:1:\"6\";s:16:\"discounted_price\";s:8:\"200.0000\";}}', '2024-05-01 19:10:45', '320.00'),
(2, 'Romal', 'Kumar', 'Pakistan', 'Shamdas confectionary shaheed Rustom road tando jam opposite the first microfinance bank', 'Tando jam', '', '70060', '03352610263', 'romalkumar8@gmail.com', 'hi romal', 'a:2:{i:0;a:11:{s:2:\"ID\";s:1:\"5\";s:4:\"NAME\";s:6:\"Burger\";s:5:\"PRICE\";s:3:\"300\";s:5:\"IMAGE\";s:13:\"product-5.jpg\";s:8:\"DISCOUNT\";s:2:\"40\";s:8:\"CATEGORY\";s:8:\"FastFood\";s:11:\"product_qty\";s:1:\"1\";s:15:\"product_details\";s:252:\"Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.\";s:2:\"id\";s:2:\"59\";s:10:\"product_id\";s:1:\"5\";s:16:\"discounted_price\";s:8:\"180.0000\";}i:1;a:11:{s:2:\"ID\";s:1:\"4\";s:4:\"NAME\";s:10:\"Strawberry\";s:5:\"PRICE\";s:3:\"100\";s:5:\"IMAGE\";s:13:\"product-4.jpg\";s:8:\"DISCOUNT\";s:1:\"0\";s:8:\"CATEGORY\";s:5:\"Fruit\";s:11:\"product_qty\";s:1:\"2\";s:15:\"product_details\";s:252:\"Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.\";s:2:\"id\";s:2:\"60\";s:10:\"product_id\";s:1:\"4\";s:16:\"discounted_price\";s:8:\"100.0000\";}}', '2024-05-01 19:46:01', '380.00'),
(3, 'Romal', 'Kumar', 'Pakistan', 'Shamdas confectionary shaheed Rustom road tando jam opposite the first microfinance bank', 'Tando jam', 'sindh', '70060', '03352610263', 'romalkumar8@gmail.com', 'hi romal kumar', 'a:2:{i:0;a:11:{s:2:\"ID\";s:1:\"4\";s:4:\"NAME\";s:10:\"Strawberry\";s:5:\"PRICE\";s:3:\"100\";s:5:\"IMAGE\";s:13:\"product-4.jpg\";s:8:\"DISCOUNT\";s:1:\"0\";s:8:\"CATEGORY\";s:5:\"Fruit\";s:11:\"product_qty\";s:1:\"1\";s:15:\"product_details\";s:252:\"Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.\";s:2:\"id\";s:2:\"61\";s:10:\"product_id\";s:1:\"4\";s:16:\"discounted_price\";s:8:\"100.0000\";}i:1;a:11:{s:2:\"ID\";s:1:\"6\";s:4:\"NAME\";s:5:\"Mango\";s:5:\"PRICE\";s:3:\"200\";s:5:\"IMAGE\";s:13:\"product-6.jpg\";s:8:\"DISCOUNT\";s:1:\"0\";s:8:\"CATEGORY\";s:5:\"Fruit\";s:11:\"product_qty\";s:1:\"1\";s:15:\"product_details\";s:252:\"Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.\";s:2:\"id\";s:2:\"62\";s:10:\"product_id\";s:1:\"6\";s:16:\"discounted_price\";s:8:\"200.0000\";}}', '2024-05-01 19:47:55', '300.00'),
(4, 'Romal', 'Kumar', 'Pakistan', 'Shamdas confectionary shaheed Rustom road tando jam opposite the first microfinance bank', 'Tando jam', 'kpk', '70060', '03352610263', 'romalkumar8@gmail.com', 'hello world', 'a:1:{i:0;a:11:{s:2:\"ID\";s:1:\"1\";s:4:\"NAME\";s:4:\"Meat\";s:5:\"PRICE\";s:2:\"30\";s:5:\"IMAGE\";s:13:\"product-1.jpg\";s:8:\"DISCOUNT\";s:1:\"0\";s:8:\"CATEGORY\";s:4:\"Meat\";s:11:\"product_qty\";s:1:\"2\";s:15:\"product_details\";s:252:\"Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.\";s:2:\"id\";s:2:\"63\";s:10:\"product_id\";s:1:\"1\";s:16:\"discounted_price\";s:7:\"30.0000\";}}', '2024-05-01 19:50:57', '60.00'),
(5, 'Romal', 'Kumar', 'Pakistan', 'Shamdas confectionary shaheed Rustom road tando jam opposite the first microfinance bank', 'Tando jam', 'rkfoefmkwe', '70060', '03352610263', 'romalkumar@gmail.com', 'knknlmomk  u', 'a:2:{i:0;a:11:{s:2:\"ID\";s:1:\"1\";s:4:\"NAME\";s:4:\"Meat\";s:5:\"PRICE\";s:2:\"30\";s:5:\"IMAGE\";s:13:\"product-1.jpg\";s:8:\"DISCOUNT\";s:1:\"0\";s:8:\"CATEGORY\";s:4:\"Meat\";s:11:\"product_qty\";s:1:\"1\";s:15:\"product_details\";s:252:\"Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.\";s:2:\"id\";s:2:\"64\";s:10:\"product_id\";s:1:\"1\";s:16:\"discounted_price\";s:7:\"30.0000\";}i:1;a:11:{s:2:\"ID\";s:1:\"2\";s:4:\"NAME\";s:6:\"Banana\";s:5:\"PRICE\";s:2:\"20\";s:5:\"IMAGE\";s:13:\"product-2.jpg\";s:8:\"DISCOUNT\";s:2:\"20\";s:8:\"CATEGORY\";s:5:\"Fruit\";s:11:\"product_qty\";s:1:\"1\";s:15:\"product_details\";s:252:\"Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.\";s:2:\"id\";s:2:\"65\";s:10:\"product_id\";s:1:\"2\";s:16:\"discounted_price\";s:7:\"16.0000\";}}', '2024-05-01 20:15:34', '46.00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(20) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `IMAGE` varchar(200) NOT NULL,
  `DISCOUNT` int(11) NOT NULL,
  `CATEGORY` varchar(50) DEFAULT NULL,
  `product_qty` int(11) DEFAULT 0,
  `product_details` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `NAME`, `PRICE`, `IMAGE`, `DISCOUNT`, `CATEGORY`, `product_qty`, `product_details`) VALUES
(1, 'Meat', 30, 'product-1.jpg', 0, 'Meat', 100, 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.'),
(2, 'Banana', 20, 'product-2.jpg', 20, 'Fruit', 92, 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.'),
(3, 'Orange', 50, 'product-3.jpg', 10, 'Fruit', 87, 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.'),
(4, 'Strawberry', 100, 'product-4.jpg', 0, 'Fruit', 86, 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.'),
(5, 'Burger', 300, 'product-5.jpg', 40, 'FastFood', 94, 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.'),
(6, 'Mango', 200, 'product-6.jpg', 0, 'Fruit', 95, 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.'),
(7, 'Watermelon', 150, 'product-7.jpg', 30, 'Fruit', 98, 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.'),
(8, 'Apple', 30, 'product-8.jpg', 25, 'Fruit', 99, 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.'),
(9, 'Capsicum', 90, 'product-13.jpg', 0, 'Vegetable', 99, 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.'),
(10, 'Spinach', 50, 'product-14.jpg', 5, 'Vegetable', 97, 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_qty` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
