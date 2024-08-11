-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 07:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `astonishdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `p_id` int(100) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL,
  `p_price` int(100) NOT NULL,
  `p_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(100) NOT NULL,
  `c_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(1, 'Cleanser'),
(2, 'Toner'),
(3, 'Serum'),
(4, 'Moisturizer'),
(5, 'Sunscreen');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `pre_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mno` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(100) NOT NULL,
  `country` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total`, `pre_name`, `name`, `email`, `mno`, `address1`, `address2`, `city`, `state`, `zip`, `country`, `payment`, `status`) VALUES
(27, 2, 389, 'mr', 'divyesh', 'bhutdivyesh628@gmail.com', '09510541655', 'rajkot', 'Rajkot', 'Rajkot', 'Gujarat', 360020, 'India', 'Cash on delivery', 'Confirmed'),
(28, 2, 545, 'mr', 'divyesh', 'bhutdivyesh628@gmail.com', '09510541655', 'rajkot', 'Rajkot', 'Rajkot', 'Gujarat', 360020, 'India', 'Cash on delivery', 'Order has been dispatched'),
(29, 2, 539, 'mr', 'divyesh', 'bhutdivyesh628@gmail.com', '09510541655', 'rajkot', 'Rajkot', 'Rajkot', 'Gujarat', 360020, 'India', 'Cash on delivery', 'Out of Delivery'),
(30, 2, 2024, 'mr', 'divyesh', 'bhutdivyesh628@gmail.com', '09510541655', 'rajkot', 'Rajkot', 'Rajkot', 'Gujarat', 360020, 'India', 'Cash on delivery', 'Confirmed'),
(31, 2, 578, 'mr', 'divyesh', 'bhutdivyesh628@gmail.com', '09510541655', 'rajkot', 'Rajkot', 'Rajkot', 'Gujarat', 360020, 'India', 'Cash on delivery', 'Order has been dispatched'),
(32, 2, 500, 'mr', 'raj vamja', 'rvamja746@rku.ac.in', '06353971392', 'rajkot', 'hjh', 'rajkot', 'gujarat', 360020, 'India', 'Cash on delivery', 'Order has been dispatched'),
(33, 2, 0, 'mr', 'raj vamja', 'rvamja746@rku.ac.in', '06353971392', 'rajkot', 'iuu', 'rajkot', 'gujarat', 360020, 'India', 'Cash on delivery', 'Order has been dispatched');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(30) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `p_mrp` int(100) NOT NULL,
  `p_price` int(100) NOT NULL,
  `p_desc` varchar(255) NOT NULL,
  `c_id` int(100) NOT NULL,
  `qty` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_img`, `p_mrp`, `p_price`, `p_desc`, `c_id`, `qty`) VALUES
(1, 'Alpha Arbutin 02%', 'AlphaArbutin2_1200-1-min_720x.jpg', 600, 500, 'Reduces Dark Spots, Marks & Evens Skin Tone', 3, 1),
(2, 'Salicylic Acid 02%', 'SalicylicAcid2_1200-1-min_720x.jpg', 549, 545, 'Reduces Acne, Blackheads & Excessive Oil', 3, 1),
(3, 'SPF 50 Sunscreen', 'SPF501200-2-min_720x.jpg', 399, 389, 'Broad Spectrum SPF 50, PA++++', 5, 1),
(4, 'Vitamin C 10%', 'VitaminC10_1200-1-min_720x.jpg', 699, 695, 'For Brighter, Glowing & Healthy Looking Skin', 3, 1),
(5, 'Salicylic Acid + LHA 02% Face Cleanser', '18-min_720x.jpg', 299, 295, 'Reduces Sebum & Prevents Breakout Without Drying Skin', 1, 1),
(6, 'Niacinamide 10%', 'NewNia10_2048x.jpg', 635, 599, 'For reducing sebum & pores, and even skin tone', 3, 1),
(7, 'Sepicalm 03% Moisturizer', 'SepicalmMoisturizer1200-2_720x.jpg', 349, 345, 'Skin Soothing, Lightweight Moisturization', 4, 1),
(8, 'Hyaluronic + PGA 02%', 'HAPGA2_1200-1-min_720x.jpg', 599, 595, 'Intense, Multi-Level Hydration without the Oily Feel', 3, 1),
(9, 'Vitamin B5 10% Moisturizer', 'B5Moisturizer1200-2-min_720x.jpg', 349, 329, 'Provides Lightweight Moisturization & Repairs Skin', 4, 1),
(10, 'AHA PHA BHA 32%', 'AHAPHABHA32_1200-1-min_720x.jpg', 699, 689, 'Weekend Exfoliator for Instant Glow & Soft Skin', 3, 1),
(11, 'Polyhydroxy Acid (PHA) 03% Toner', 'PHAToner1200-2-min_720x.jpg', 399, 395, 'Tightens Pores, Exfoliates, Hydrates & Rebalances Skin Microbiome', 2, 1),
(12, 'Hair Growth Actives 18%', 'Hairgrowthserum1200-2-min_720x.jpg', 799, 795, 'Reduces Hairfall & Promotes Healthy Hair Growth', 3, 1),
(13, 'Retinol 0.3%', 'Retinolserum1200-2-min_720x.jpg', 599, 589, 'Powerful Anti-aging Serum for Fine Lines & Wrinkles', 3, 1),
(14, 'Tranexamic 03%', 'Tranexamicserum1200-2-min_1_720x.jpg', 649, 645, 'Reduces Melasma, PIE, PIH & Scars', 3, 1),
(15, 'SPF 60 Sunscreen', 'SPF601200-2-min_720x.jpg', 599, 589, 'Broad spectrum SPF 60, PA++++', 5, 1),
(16, 'Granactive Retinoid 02%', 'GranactiveRetinoid2_1200-1-min_720x.jpg', 699, 695, 'Help Reduce Fine Lines & Wrinkles', 4, 1),
(17, 'Marula Oil 05% Moisturizer', 'MarulaMoisturizer1200-2-min_720x.jpg', 299, 279, 'Deep & Intense Moisturization. Treats Dryness, Roughness and Flakiness', 4, 1),
(18, 'Glycolic Acid 08% Exfoliating Liquid', 'GlycolicMainimage-min_720x.jpg', 519, 499, 'Deep Exfoliation For Even Skin Tone, Texture & Glow', 2, 1),
(19, 'Oat Extract 06% Gentle Cleanser', 'OatCleanser1200-1_720x.jpg', 299, 289, 'Gentle, low-foaming cleanser for damaged, sensitive skin', 1, 1),
(20, 'SPF 50 Sunscreen Stick', 'Stickmailimage-min_720x.jpg', 819, 799, 'Broad spectrum SPF 50, PA++++', 5, 1),
(21, 'AHA BHA 10%', 'aha-bha-10-1200--1min-1645781661616_720x.jpg', 599, 589, 'Exfoliator for Younger and Glowing Skin', 3, 1),
(22, 'L-Ascorbic Acid 08% Lip Treatment Balm', 'Untitled_1_720x.jpg', 419, 399, 'Prevents & treats hyperpigmentation, hydrates and softens lips', 4, 1),
(23, 'Lip Balm SPF 30', 'MinimalistLIPBalmSPF30-min_1_720x.png', 309, 299, 'A nourishing SPF balm that protects, heals and nourishes dry, chapped, and irritated lips', 4, 1),
(24, 'Aquaporin Booster 05% Cleanser', '19-min_720x.jpg', 299, 289, 'Stimulates hydration & cleans without drying', 1, 1),
(25, 'Alpha Lipoic + Glycolic 07% Cleanser', 'Websiteimage11001600px-min_2_720x.jpg', 399, 389, 'For brightening skin tone & evening skin texture', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `testimonial_data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonial_id`, `name`, `testimonial_data`) VALUES
(1, 'Divyesh Bhut', 'Very much pocket friendly, suitable for absolute sensitive skin and visible results..so glad to have come across this amazing brand'),
(2, 'Raj Vamja', 'The one and only skin product that actually work on my skin!! very effective, some improvement, budget friendly, gentle to skin'),
(3, 'Ayush Sangtani', 'My life saviour i.e. I can say my skin saviour. I started seeing effect after 2 months and how it\'s doing wonder. People say my skin glow');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `user_id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`user_id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Divyesh', 'bhutdivyesh628@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(2, 'Divyesh', 'dbhut076@rku.ac.in', '202cb962ac59075b964b07152d234b70', 'user'),
(3, 'ayush', 'ayush@gmail.com', '202cb962ac59075b964b07152d234b70', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wish_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `p_id` int(100) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL,
  `p_price` int(100) NOT NULL,
  `p_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wish_id`, `user_id`, `p_id`, `p_name`, `p_img`, `qty`, `p_price`, `p_desc`) VALUES
(27, 2, 1, 'Alpha Arbutin 02%', 'AlphaArbutin2_1200-1-min_720x.jpg', 1, 500, ' Reduces Dark Spots, Marks & Evens Skin Tone');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wish_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonial_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wish_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
