-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 11:11 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_id` int(11) NOT NULL,
  `Category_name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `Active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Category of Meals';

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_id`, `Category_name`, `image`, `Active`) VALUES
(28, 'goorej', 'logo-godrej.png', 1),
(29, 'oppo', 'logo-oppo.png', 1),
(30, 'cocacola', 'logo-coca-cola.png', 1),
(31, 'paypal', 'logo-paypal.png', 1),
(32, 'philips', 'logo-philips.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `price` int(11) NOT NULL,
  `Active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Information of orders';

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_id`, `user_id`, `Order_date`, `price`, `Active`) VALUES
(10, 143, '2021-12-16 08:21:06', 24, 1),
(11, 144, '2021-12-16 09:07:45', 32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `Permission_id` int(11) NOT NULL,
  `Permission_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `privilage`
--

CREATE TABLE `privilage` (
  `Perivilage_id` int(11) NOT NULL,
  `Allow` tinyint(4) NOT NULL,
  `Role_id` int(11) NOT NULL,
  `Permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Permissions of Roles';

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `E_pro_name` varchar(255) NOT NULL,
  `image1` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  `image4` text NOT NULL,
  `pro_cost` int(11) NOT NULL,
  `Category_id` int(11) NOT NULL,
  `Active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `E_pro_name`, `image1`, `image2`, `image3`, `image4`, `pro_cost`, `Category_id`, `Active`) VALUES
(21, 'Red T_shirt', 'Red T_shirt', 'product-1.jpg', 'gallery-1.jpg', 'gallery-2.jpg', 'gallery-3.jpg', 10, 28, 1),
(22, 'Black Boot', 'Black Boot', 'product-2.jpg', 'buy-2.jpg', 'buy-2.jpg', 'buy-2.jpg', 11, 29, 1),
(23, 'Black pants', 'Black pants', 'product-3.jpg', 'product-3.jpg', 'product-3.jpg', 'product-3.jpg', 13, 30, 1),
(24, 'Black T-shirt', 'Black T-shirt', 'product-4.jpg', 'product-4.jpg', 'product-4.jpg', 'product-4.jpg', 11, 31, 1),
(25, 'Gray Boot', 'Gray Boot', 'product-5.jpg', 'product-5.jpg', 'product-5.jpg', 'product-5.jpg', 14, 32, 1),
(26, 'Dark Black T-shirt', 'Dark Black T-shirt', 'product-6.jpg', 'product-6.jpg', 'product-6.jpg', 'product-6.jpg', 12, 28, 1),
(27, 'Foot sorbet', 'Foot sorbet', 'product-7.jpg', 'product-7.jpg', 'product-7.jpg', 'product-7.jpg', 6, 29, 1),
(28, 'Black watch', 'Black watch', 'product-8.jpg', 'product-8.jpg', 'product-8.jpg', 'product-8.jpg', 15, 30, 1),
(29, 'Black w', 'Black watch', 'product-9.jpg', 'product-9.jpg', 'product-9.jpg', 'product-9.jpg', 17, 31, 1),
(30, 'Fiery Boot', 'Fiery Boot', 'product-10.jpg', 'product-10.jpg', 'product-10.jpg', 'product-10.jpg', 18, 32, 1),
(31, 'Gray Boot', 'Gray Boot', 'product-11.jpg', 'product-11.jpg', 'product-11.jpg', 'product-11.jpg', 10, 28, 1),
(32, 'Dark Black Pants', 'Dark Black Pants', 'product-12.jpg', 'product-12.jpg', 'product-12.jpg', 'product-12.jpg', 12, 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `pro_oder_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Order of meals';

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `Role_id` int(11) NOT NULL,
  `Role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`Role_id`, `Role_name`) VALUES
(1, 'Admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `temp_order`
--

CREATE TABLE `temp_order` (
  `Id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Category_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `E_name` text NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temp_order`
--

INSERT INTO `temp_order` (`Id`, `pro_id`, `user_id`, `Category_id`, `image`, `name`, `E_name`, `cost`) VALUES
(75, 21, 143, 28, 'product-1.jpg', 'Red T_shirt', 'Red T_shirt', 10),
(76, 25, 143, 32, 'product-5.jpg', 'Gray Boot', 'Gray Boot', 14),
(78, 27, 144, 29, 'product-7.jpg', 'Foot sorbet', 'Foot sorbet', 6),
(79, 28, 144, 30, 'product-8.jpg', 'Black watch', 'Black watch', 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(11) NOT NULL,
  `User_name` varchar(255) NOT NULL,
  `User_image` text DEFAULT NULL,
  `Address` varchar(255) NOT NULL DEFAULT 'Hada',
  `Phone` int(9) NOT NULL,
  `Eamil` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role_id` int(11) NOT NULL DEFAULT 2,
  `Active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Information of users';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `User_name`, `User_image`, `Address`, `Phone`, `Eamil`, `Password`, `Role_id`, `Active`) VALUES
(142, 'fatima', '564c3d94cba67bf2d9e9bc3319d78380.jpg', 'sanaa', 775855568, 'fatima@gmail.com', '$2y$10$Y7QVfjFWdOyYrcMYDJtg6.0VWd1ky1oZVzPeAzoVffgQ7oUI34c0m', 1, 1),
(143, 'rokia', NULL, 'sanaa', 123456789, 'r@gmail.com', '$2y$10$jmoQPLnToCjn.xzoi0E8FeNZ2nlOMBWnIKvyp6hjLT/BFUOMyI5Fy', 2, 1),
(144, 'razan', NULL, 'alrabat', 2147483647, 'razan@gmail.com', '$2y$10$RjRJg5YSIEo90mirUQJ1gOrl3MX5hSDF2aaEhy5qUUxVfoNoy2Gtm', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`Permission_id`);

--
-- Indexes for table `privilage`
--
ALTER TABLE `privilage`
  ADD PRIMARY KEY (`Perivilage_id`),
  ADD KEY `Role_id_FK` (`Role_id`),
  ADD KEY `Permission_id_FK` (`Permission_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `Category_id_FK` (`Category_id`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`pro_oder_id`),
  ADD KEY `userorder` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Role_id`);

--
-- Indexes for table `temp_order`
--
ALTER TABLE `temp_order`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `userid` (`user_id`),
  ADD KEY `productid` (`pro_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`),
  ADD KEY `Role_id_FK` (`Role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `Permission_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privilage`
--
ALTER TABLE `privilage`
  MODIFY `Perivilage_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `pro_oder_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `Role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temp_order`
--
ALTER TABLE `temp_order`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fkuserorder` FOREIGN KEY (`user_id`) REFERENCES `users` (`User_id`);

--
-- Constraints for table `privilage`
--
ALTER TABLE `privilage`
  ADD CONSTRAINT `Role_perivilage_FK` FOREIGN KEY (`Role_id`) REFERENCES `roles` (`Role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_perviliage_FK` FOREIGN KEY (`Permission_id`) REFERENCES `permission` (`Permission_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `Meal_Category_FK` FOREIGN KEY (`Category_id`) REFERENCES `category` (`Category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD CONSTRAINT `userorder` FOREIGN KEY (`user_id`) REFERENCES `users` (`User_id`);

--
-- Constraints for table `temp_order`
--
ALTER TABLE `temp_order`
  ADD CONSTRAINT `productid` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`),
  ADD CONSTRAINT `userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`User_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `Roles_user_FK` FOREIGN KEY (`Role_id`) REFERENCES `roles` (`Role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
