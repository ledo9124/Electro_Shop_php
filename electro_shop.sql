-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 10:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electro_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_img` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_img`) VALUES
(1, 'Smartphones', 'category-smartphone.png'),
(2, 'Tablets', 'category-tablet.png'),
(3, 'Accessories', 'category-accessories.png'),
(4, 'Cameras & Photography', 'category-camera.png'),
(5, 'Headphones', 'category-headphones.png'),
(6, 'Laptops', 'category-laptop.png'),
(7, 'Speakers', 'category-speaker.png');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `client_status` int(11) DEFAULT 0,
  `client_img` varchar(50) DEFAULT NULL,
  `client_email` varchar(50) NOT NULL,
  `client_role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `user_name`, `password`, `client_status`, `client_img`, `client_email`, `client_role`) VALUES
(1, 'LeDo', 'Ledo9124@', 0, 'th.jpg', 'ledo@gmail.com', 1),
(5, 'DoLe@@', 'Ledo9124@', 0, 'th.jpg', 'leminhdo9124@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_content` varchar(225) NOT NULL,
  `product_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `comment_date` varchar(50) NOT NULL,
  `comment_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_content`, `product_id`, `client_id`, `comment_date`, `comment_rating`) VALUES
(63, '###', 22, 5, 'October 18, 2023', 5),
(64, '@@@@', 22, 5, 'October 18, 2023', 3),
(65, '##\r\n\r\n', 4, 5, 'October 19, 2023', 5),
(66, 'ềwfwefewfew', 4, 5, 'October 19, 2023', 5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` float NOT NULL,
  `product_discount` float DEFAULT NULL,
  `product_image` varchar(50) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `product_status` int(11) NOT NULL DEFAULT 0,
  `product_view` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_discount`, `product_image`, `product_description`, `product_status`, `product_view`, `category_id`) VALUES
(1, 'Notebook White Spire V Nitro VN7-591G', 2.299, NULL, 'product-smartphone-1.png', '4.5 inch HD Screen,Android 4.4 KitKat OS,1.4 GHz Quad Core™ Processor,20 MP front Camera', 0, 0, 1),
(2, 'Notebook Widescreen Z51-70 80K6013UPB', 1.199, NULL, 'product-smartphone-2.png', '4.5 inch HD Screen,\r\nAndroid 4.4 KitKat OS,\r\n1.4 GHz Quad Core™ Processor,\r\n3GB Ram', 0, 5, 1),
(3, 'Tablet Thin EliteBook Revolve 810 G6', 1.299, NULL, 'product-smartphone-3.png', '4.7 inch 720p Screen,\r\nAndroid 6.0 OS,\r\n2.4 GHz Quad Core™ Processor,\r\n23 MP front Camera', 0, 15, 1),
(4, 'Notebook Purple G952VX-T7008T', 2.789, NULL, 'product-smartphone-4.png', '5 inch HD Screen,\r\nAndroid 6.2 Lolipop OS,\r\n3.4 GHz Quad Core™ Processor,\r\n18 MP front Camera', 0, 3, 1),
(5, 'Laptop Yoga 21 80JH0035GE W8.1', 200, NULL, 'product-smartphone-5.png', '4.9 inch HD Screen,\r\nAndroid 4.4 KitKat OS,\r\n3 GHz  Processor,\r\n20 MP front Camera', 0, 1, 1),
(6, 'Smartphone 6S 32GB LTE', 780, NULL, 'product-smartphone-6.png', '4.5 inch HD Screen,\r\nAndroid 4.4 KitKat OS,\r\n1.4 GHz Quad Core™ Processor,\r\n20 MP front Camera', 0, 0, 1),
(7, 'Ultrabook UX305CA-FC050T', 1.218, 1.199, 'product-smartphone-7.png', '4.5 inch HD Screen,\r\nAndroid 4.4 KitKat OS,\r\n1.4 GHz Quad Core™ Processor,\r\n20 MP front Camera', 0, 0, 1),
(8, 'Notebook Black Spire V Nitro VN7-591G', 2.299, 1.999, 'product-smartphone-8.png', '4.5 inch HD Screen,\r\nAndroid 4.4 KitKat OS,\r\n1.4 GHz Quad Core™ Processor,\r\n20 MP front Camera', 0, 0, 1),
(9, 'Notebook Widescreen Z51-70 40K6013UPB', 1.099, NULL, 'product-smartphone-9.png', '4.5 inch HD Screen,Android 4.4 KitKat OS,1.4 GHz Quad Core™ Processor,3GB Ram', 0, 0, 1),
(10, 'Smartphone 6S 64GB LTE', 1.215, NULL, 'product-smartphone-10.png', '4.5 inch HD Screen,\r\nAndroid 4.4 KitKat OS,\r\n1.4 GHz Quad Core™ Processor,\r\n20 MP front Camera', 0, 0, 1),
(11, 'Tablet Thin EliteBook Revolve 810 G2', 1.299, NULL, 'product-smartphone-11.png', '4.7 inch 720p Screen,\r\nAndroid 6.0 OS,\r\n2.4 GHz Quad Core™ Processor,\r\n23 MP front Camera', 0, 0, 1),
(12, 'Notebook Purple G752VT-T7008T', 2.799, NULL, 'product-smartphone-12.png', '5 inch HD Screen,\r\nAndroid 6.2 Lolipop OS,\r\n3.4 GHz Quad Core™ Processor,\r\n18 MP front Camera', 0, 0, 1),
(13, 'Laptop Yoga 14 80JH0035GE W8.1', 3.485, NULL, 'product-smartphone-13.png', '4.9 inch HD Screen,\r\nAndroid 4.4 KitKat OS,\r\n3 GHz  Processor,\r\n20 MP front Camera', 0, 0, 1),
(14, 'Ultrabook UX605CA-FC050T', 1.218, NULL, 'product-smartphone-14.png', '4.5 inch HD Screen,\r\nAndroid 4.4 KitKat OS,\r\n1.4 GHz Quad Core™ Processor,\r\n20 MP front Camera', 0, 0, 1),
(15, 'Smartphone 6S 32GB LTE', 1.099, NULL, 'product-smartphone-15.png', '4.5 inch HD Screen,\r\nAndroid 4.4 KitKat OS,\r\n1.4 GHz Quad Core™ Processor,\r\n20 MP front Camera', 0, 0, 1),
(22, 'asdasd', 121321, NULL, 'category-tablet.png', 'dasdasd', 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`,`product_id`,`client_id`),
  ADD KEY `fk_comment_client` (`client_id`),
  ADD KEY `fk_comment_pro` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_category` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_pro` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
