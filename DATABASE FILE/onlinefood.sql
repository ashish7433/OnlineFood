-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 09, 2023 at 07:03 PM
-- Server version: 8.0.32
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinefood`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(1, 'admin', 'CAC29D7A34687EB14B37068EE4708E7B', 'admin@mail.com', '', '2022-05-27 13:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int NOT NULL,
  `rs_id` int NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(1, 1, 'Samosa Pav', 'The perfect snack, samosas never lack.', '20.00', 'samosa.jpg'),
(2, 1, 'Misal Pav', 'A little bit spicy, a whole lot of yummy!', '60.00', 'misal-pav.jpg'),
(3, 2, '\nSabudana Vada', 'Fast snack food', '35.00', 'Sabudana-vada-with-chutney-Piping-Pot-Curry-1.jpg'),
(4, 1, 'Masala Dosa', '\"Experience authentic flavors of South India!\"', '80.00', 'Masala-Dosa.jpg'),
(5, 2, 'Veg Cutlet ', 'The perfect snack, veg cutlet  never lack.', '20.00', 'Veg-Cutlet-2-3-500x500.jpg'),
(6, 2, 'Kachori', 'Kachori with onion and dahi', '25.00', 'download.jpg'),
(7, 4, 'Misal Pav', 'A little bit spicy, a whole lot of yummy!', '80.00', 'misal-pav.jpg'),
(8, 2, 'Hyderabadi Dum Biryani ', ' rice wok with cabbage, beans, carrots, and spring onions.', '110.00', 'Veg-Biryani-2-3-500x375.jpg'),
(9, 3, 'Idli', '\"Experience authentic flavors of South India!\"', '50.00', 'idli.jpg'),
(10, 3, 'Medu Wada', '\"Experience authentic flavors of South India!\"', '60.00', 'medu-vada-south-indian-recipe_g.jpg'),
(11, 3, 'Cheese Masala Dosa', '\"Experience authentic flavors of South India!\"', '150.00', 'Masala-Dosa.jpg'),
(12, 3, 'Paper Dosa', 'Chicken pieces slow cooked with spring onions in our house made manchurian style sauce.\"Experience authentic flavors of South India!\"', '120.00', 'Masala-Dosa.jpg'),
(13, 4, 'Bhurji Pav', 'Smashed eggs with bread', '40.00', 'IMG_6455.jpg'),
(14, 4, 'Puri Bhaji', 'Wheat roti with spicy greavy ', '55.00', 'puribhaji.jpg'),
(15, 4, 'Upama', 'Upma ', '35.00', 'tomato-upma-recipe-500x500.jpg'),
(16, 4, 'Pohe', 'Rice poha', '35.00', 'poha.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int NOT NULL,
  `frm_id` int NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(1, 2, 'in process', 'none', '2022-05-01 05:17:49'),
(2, 3, 'in process', 'none', '2022-05-27 11:01:30'),
(3, 2, 'closed', 'thank you for your order!', '2022-05-27 11:11:41'),
(4, 3, 'closed', 'none', '2022-05-27 11:42:35'),
(5, 4, 'in process', 'none', '2022-05-27 11:42:55'),
(6, 1, 'rejected', 'none', '2022-05-27 11:43:26'),
(7, 7, 'in process', 'none', '2022-05-27 13:03:24'),
(8, 8, 'in process', 'none', '2022-05-27 13:03:38'),
(9, 9, 'rejected', 'thank you', '2022-05-27 13:03:53'),
(10, 7, 'closed', 'thank you for your ordering with us', '2022-05-27 13:04:33'),
(11, 8, 'closed', 'thanks ', '2022-05-27 13:05:24'),
(12, 5, 'closed', 'none', '2022-05-27 13:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rs_id` int NOT NULL,
  `c_id` int NOT NULL,
  `title` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `url` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(1, 1, 'Mumbai Snacks', 'mumbaisnack@gmail.com', '9898989898', '', '8am', '8pm', 'mon-sat', 'Andheri East', '6290877b473ce.jpg', '2023-04-09 16:04:19'),
(2, 2, 'Balaji Lunch Home\n', 'eataly@gmail.com', '0557426406', '', '11am', '9pm', 'Mon-Sat', 'Bandra West', '606d720b5fc71.jpg', '2023-04-09 16:04:32'),
(3, 3, 'South Indian Fast Food\n', 'nanxiangbao45@mail.com', '1458745855', '', '9am', '8pm', 'mon-sat', 'Virar, Near Dmart', '6290860e72d1e.jpg', '2023-04-09 16:04:50'),
(4, 4, 'Green garden dhaba\n', 'hbg@mail.com', '6545687458', '', '7am', '8pm', 'mon-sat', 'Borivali West', '6290af6f81887.jpg', '2023-04-09 16:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(1, 'Andheri', '2023-04-09 16:21:22'),
(2, 'Bandra', '2023-04-09 16:21:35'),
(3, 'Virar', '2023-04-09 16:21:47'),
(4, 'Borivali', '2023-04-09 16:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(1, 'eric', 'Eric', 'Lopez', 'eric@mail.com', '1458965547', 'a32de55ffd7a9c4101a0c5c8788b38ed', '87 Armbrester Drive', 1, '2022-05-27 08:40:36'),
(2, 'harry', 'Harry', 'Holt', 'harryh@mail.com', '3578545458', 'bc28715006af20d0e961afd053a984d9', '33 Stadium Drive', 1, '2022-05-27 08:41:07'),
(3, 'james', 'James', 'Duncan', 'james@mail.com', '0258545696', '58b2318af54435138065ee13dd8bea16', '67 Hiney Road', 1, '2022-05-27 08:41:37'),
(4, 'christine', 'Christine', 'Moore', 'christine@mail.com', '7412580010', '5f4dcc3b5aa765d61d8327deb882cf99', '114 Test Address', 1, '2022-05-01 05:14:42'),
(5, 'scott', 'Scott', 'Miller', 'scott@mail.com', '7896547850', '5f4dcc3b5aa765d61d8327deb882cf99', '63 Charack Road', 1, '2022-05-27 10:53:51'),
(6, 'liamoore', 'Liam', 'Moore', 'liamoore@mail.com', '7896969696', '5f4dcc3b5aa765d61d8327deb882cf99', '122 Bleck Street', 1, '2022-05-27 12:57:00'),
(7, 'admin-akash', 'Akash', 'More', 'akash@gmail.com', '7977803163', '25d55ad283aa400af464c76d713c07ad', 'Mumbai', 1, '2023-04-09 15:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int NOT NULL,
  `u_id` int NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`) VALUES
(1, 4, 'Spring Rolls', 2, '6.00', 'rejected', '2022-05-27 11:43:26'),
(2, 4, 'Prawn Crackers', 1, '7.00', 'closed', '2022-05-27 11:11:41'),
(3, 5, 'Chicken Madeira', 1, '23.00', 'closed', '2022-05-27 11:42:35'),
(4, 5, 'Cheesy Mashed Potato', 1, '5.00', 'in process', '2022-05-27 11:42:55'),
(5, 5, 'Meatballs Penne Pasta', 1, '10.00', 'closed', '2022-05-27 13:18:03'),
(6, 5, 'Yorkshire Lamb Patties', 1, '14.00', NULL, '2022-05-27 11:40:51'),
(7, 6, 'Yorkshire Lamb Patties', 1, '14.00', 'closed', '2022-05-27 13:04:33'),
(8, 6, 'Lobster Thermidor', 1, '36.00', 'closed', '2022-05-27 13:05:24'),
(9, 6, 'Stuffed Jacket Potatoes', 1, '8.00', 'rejected', '2022-05-27 13:03:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rs_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
