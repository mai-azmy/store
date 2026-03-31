-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2026 at 01:49 PM
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
-- Database: `my_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `description`, `image`) VALUES
(1, 'T-Shirt Oversize', 'clothes', 250.00, 'Comfortable cotton oversized t-shirt', 'images/tshirt.jpg'),
(2, 'Hoodie Black', 'clothes', 500.00, 'Warm stylish black hoodie', 'images/hoodie.jpg'),
(3, 'Jeans Pants', 'clothes', 600.00, 'Slim fit blue jeans', 'images/jeans.jpg'),
(4, 'Silver Necklace', 'accessories', 300.00, 'Elegant silver necklace', 'images/necklace.jpg'),
(5, 'Leather Watch', 'accessories', 700.00, 'Classic leather watch', 'images/watch.jpg'),
(6, 'Sunglasses', 'accessories', 350.00, 'Modern UV protection sunglasses', 'images/sunglasses.jpg'),
(7, 'iPhone 13', 'mobiles', 25000.00, 'Apple smartphone with A15 chip', 'images/iphone.jpg'),
(8, 'Samsung Galaxy S22', 'mobiles', 22000.00, 'High performance Android phone', 'images/samsung.jpg'),
(9, 'Xiaomi Redmi Note 12', 'mobiles', 9000.00, 'Budget friendly smartphone', 'images/xiaomi.jpg'),
(10, 'iPhone 14', 'Mobiles', 30000.00, 'Latest iPhone model', 'iphone14.jpg'),
(11, 'Samsung Galaxy S23', 'Mobiles', 25000.00, 'Latest Samsung Galaxy', 'samsung_s23.jpg'),
(12, 'Wireless Earbuds', 'Accessories', 1200.00, 'High quality sound', 'earbuds.jpg'),
(13, 'Leather Wallet', 'Accessories', 500.00, 'Genuine leather wallet', 'wallet.jpg'),
(14, 'Men T-Shirt', 'Clothes', 350.00, '100% Cotton', 'men_tshirt.jpg'),
(15, 'Women Dress', 'Clothes', 1200.00, 'Elegant evening dress', 'women_dress.jpg'),
(16, 'Smart Watch', 'Accessories', 2500.00, 'Track your fitness', 'smartwatch.jpg'),
(17, 'Laptop Bag', 'Accessories', 800.00, 'Durable and stylish', 'laptop_bag.jpg'),
(18, 'Gaming Mouse', 'Accessories', 600.00, 'High precision gaming mouse', 'gaming_mouse.jpg'),
(19, 'Backpack', 'Accessories', 900.00, 'Comfortable backpack', 'backpack.jpg'),
(20, 'Headphones', 'Accessories', 1500.00, 'Noise-cancelling', 'headphones.jp'),
(21, 'Sunglasses', 'Accessories', 700.00, 'UV protection', 'sunglasses.jpg'),
(22, 'iPad Air', 'Mobiles', 18000.00, 'Lightweight tablet', 'ipadair.jpg'),
(23, 'Men Jacket', 'Clothes', 1500.00, 'Winter jacket', 'men_jacket.jpg'),
(24, 'Women Sneakers', 'Clothes', 900.00, 'Comfortable and stylish', 'women_sneakers.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
