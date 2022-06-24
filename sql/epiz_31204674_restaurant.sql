-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql108.epizy.com
-- Generation Time: Mar 04, 2022 at 08:59 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_31204674_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin01@gmail.com', 'admin123'),
(2, 'admin02@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(255) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `reservation_date` varchar(20) NOT NULL,
  `reservation_time` varchar(255) NOT NULL,
  `people_num` varchar(20) NOT NULL,
  `tabletype` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_num` varchar(20) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_id`, `booking_date`, `reservation_date`, `reservation_time`, `people_num`, `tabletype`, `first_name`, `last_name`, `email`, `mobile_num`, `notes`, `status`) VALUES
(1, 'BO61fbcbe72fcdd', '2022-02-03 23:14:00', '02/04/2022', '6:00 PM', '2', 'Square', 'Hello', 'World', 'hello@gmail.com', '09765321890', 'Hello', 'Pending'),
(2, 'BO61fbcc15b3414', '2022-02-03 23:25:24', '02/07/2022', '10:00 AM', 'More than 10', 'Conference', 'Admin', 'Test', 'yaaakko123@gmail.com', '09876543213', '', 'Confirmed'),
(3, 'BO61fbd30823b57', '2022-02-05 09:14:59', '02/18/2022', '4:00 PM', '10', 'Rectangle', 'Hi', 'World', 'hello123@gmail.com', '09018281200', '', 'Pending'),
(4, 'BO61fe5b564d5b9', '2022-02-16 13:23:07', '02/23/2022', '4:00 PM', '5', 'Rectangle', 'Hello', 'World', 'ariassalyssaaa@gmail.com', '09010101010', '', 'Pending'),
(5, 'BO61fe6eaa9ce4b', '2022-02-18 05:08:43', '02/28/2022', '8:00 PM', '8', 'Rectangle', 'Hello', 'World', 'ariasalyssaaa@gmail.com', '09010101010', 'With 2 kids', 'Confirmed'),
(6, 'BO6213742c8a109', '2022-03-21 00:42:27', '02/22/2022', '8:00 PM', '7', 'Rectangle', 'World', 'Hello', 'ariassalyssaaa@gmail.com', '09010101010', 'try lang', 'Confirmed'),
(7, 'BO6220c47b59767', '2022-03-02 18:36:59', '03/05/2022', '10:00 AM', '3', 'Square', 'Okay', 'Yako', 'yaaakko123@gmail.com', '09821261621', 'Try try try', 'Pending'),
(8, 'BO6220c5005b858', '2022-03-02 18:39:12', '03/05/2022', '11:00 AM', 'More than 10', 'Conference', 'Okay', 'Yako', 'yaaakko123@gmail.com', '09821261621', 'Hellooooooo', 'Pending'),
(9, 'BO6220c53d37e6b', '2022-03-02 18:40:13', '03/06/2022', '2:00 PM', 'More than 10', 'Conference', 'Okay', 'Yako', 'yaaakko123@gmail.com', '09821261621', 'Try try try', 'Pending'),
(10, 'BO622255e389d96', '2022-03-04 06:09:39', '03/05/2022', '3:00 PM', 'More than 10', 'Conference', 'World', 'Hello', 'ariasalyssaaa@gmail.com', '09010101001', '', 'Pending'),
(11, 'BO622274a2a68cf', '2022-03-04 08:20:50', '03/09/2022', '12:00 PM', '5', 'Not assigned', 'Jociel', 'Anne', 'lucidojocielanne@gmail.com', '09474774954', '', 'Pending'),
(12, 'BO622274f2b5986', '2022-03-04 08:22:10', '03/16/2022', '2:00 PM', '10', 'Not assigned', 'Jose', 'Rizal', 'lucidojocielanne@gmail.com', '09474774954', '', 'Pending'),
(13, 'BO62228763abc0a', '2022-03-04 09:40:51', '03/09/2022', '12:00 PM', '5', 'Not assigned', 'jociel', 'lucido', 'jocielanne@gmail.com', '09474774954', '', 'Pending'),
(14, 'BO62229a26513a9', '2022-03-04 11:00:54', '03/09/2022', '12:00 PM', '5', 'Not assigned', 'Mary', 'Anne', 'maryy@gmail.com', '09474774954', '', 'Pending'),
(15, 'BO6222a11acc303', '2022-03-04 11:30:34', '03/05/2022', '8:00 PM', '10', 'Not assigned', 'Okay', 'Yako', 'yaaakko123@gmail.com', '09821261621', 'Hi', 'Pending'),
(16, 'BO6222aa5db6882', '2022-03-04 12:10:05', '03/16/2022', '12:00 PM', '5', 'Rectangle', 'Jociel', 'Lucido', 'jocielannelucido@gmail.com', '09474774954', '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Breakfast'),
(2, 'Main Course'),
(3, 'Merienda'),
(4, 'Vegetables'),
(5, 'Sandwiches'),
(6, 'Desserts'),
(7, 'Beverages'),
(8, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `email` varchar(255) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `instruction` varchar(250) NOT NULL,
  `payment_method` varchar(250) NOT NULL,
  `total_amount` int(250) NOT NULL,
  `gcash_name` varchar(250) NOT NULL,
  `receipt` varchar(250) NOT NULL,
  `acc_num` varchar(20) NOT NULL,
  `reference_num` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `fname`, `lname`, `email`, `street`, `city`, `region`, `instruction`, `payment_method`, `total_amount`, `gcash_name`, `receipt`, `acc_num`, `reference_num`, `date`, `status`) VALUES
(1, 'OR62229edd415d3', 'World', 'Hello', 'ariasalyssaaa@gmail.com', '111 Santolan', 'Pasig', 'NCR', '', 'COD', 235, 'none', 'none', '0', '0', '2022-03-04 06:21:01', 'Completed'),
(2, 'OR62229f21ed45a', 'World', 'Hello', 'ariasalyssaaa@gmail.com', '111 Sampaloc', 'Pasig', 'NCR', 'none', 'GCASH', 595, 'Alyssa AA', 'female-avatar.png', '09123457896', '123456', '2022-03-04 06:22:09', 'Shipped'),
(3, 'OR62229f8f0b0f3', 'World', 'Hello', 'ariasalyssaaa@gmail.com', '111 Evagelista Santolan', 'Pasig', 'NCR', 'none', 'GCASH', 370, 'AA Alyssa ', 'breakfast.png', '09897654231', '12345678', '2022-03-04 06:23:59', 'Confirmed'),
(4, 'OR62229fd2ba527', 'jociel', 'lucido', 'jocielanne@gmail.com', 'Sto. Nino', 'Quezon City', 'NCR', 'less ice', 'COD', 475, 'none', 'none', '0', '0', '2022-03-04 06:25:06', 'Pending'),
(5, 'OR6222a0246748c', 'World', 'Hello', 'ariasalyssaaa@gmail.com', '222 Santolan', 'Pasig', 'NCR', 'Hello', 'COD', 260, 'none', 'none', '0', '0', '2022-03-04 06:26:28', 'Pending'),
(6, 'OR6222a09365b02', 'World', 'Hello', 'ariasalyssaaa@gmail.com', '333 Evangelista Santolan', 'Pasig', 'NCR', 'none', 'GCASH', 715, 'Alyssa AA', 'female-avatar.png', '09126354678', '12034956', '2022-03-04 06:28:19', 'Pending'),
(7, 'OR6222ab2f197e7', 'Jociel', 'Lucido', 'jocielannelucido@gmail.com', 'Sto. Nino', 'Quezon City', 'NCR', 'less ice', 'COD', 385, 'none', 'none', '0', '0', '2022-03-04 07:13:35', 'Pending'),
(8, 'OR6222aba1cae6c', 'Jociel', 'Lucido', 'jocielannelucido@gmail.com', 'Sto. Nino', 'Quezon City', 'NCR', 'none', 'GCASH', 290, 'Jociel anne', 'Screenshot_2021-12-02-22-43-57-85.png', '09474774954', '1234567', '2022-03-04 07:15:29', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `total_price` int(250) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `fname`, `lname`, `order_id`, `product_name`, `quantity`, `price`, `total_price`, `added_on`) VALUES
(1, 'World', 'Hello', 'OR62229edd415d3', 'Arroz caldo with Egg', 1, 45, 45, '2022-03-04 06:21:01'),
(2, 'World', 'Hello', 'OR62229edd415d3', 'CornedSiLog', 1, 75, 75, '2022-03-04 06:21:01'),
(3, 'World', 'Hello', 'OR62229edd415d3', 'HotSiLog', 1, 75, 75, '2022-03-04 06:21:01'),
(4, 'World', 'Hello', 'OR62229f21ed45a', 'Beef with Broccoli', 1, 250, 250, '2022-03-04 06:22:09'),
(5, 'World', 'Hello', 'OR62229f21ed45a', 'Beef with Mushroom', 1, 250, 250, '2022-03-04 06:22:09'),
(6, 'World', 'Hello', 'OR62229f21ed45a', 'Coffee 3-in-1', 1, 25, 25, '2022-03-04 06:22:09'),
(7, 'World', 'Hello', 'OR62229f21ed45a', 'Coffee with Chocolate', 1, 30, 30, '2022-03-04 06:22:09'),
(8, 'World', 'Hello', 'OR62229f8f0b0f3', 'Carbonara', 1, 100, 100, '2022-03-04 06:23:59'),
(9, 'World', 'Hello', 'OR62229f8f0b0f3', 'Cheese Sticks', 1, 60, 60, '2022-03-04 06:23:59'),
(10, 'World', 'Hello', 'OR62229f8f0b0f3', 'Nachos', 1, 90, 90, '2022-03-04 06:23:59'),
(11, 'World', 'Hello', 'OR62229f8f0b0f3', 'Pancit Canton', 1, 80, 80, '2022-03-04 06:23:59'),
(12, 'jociel', 'lucido', 'OR62229fd2ba527', 'Arroz caldo with Egg', 1, 45, 45, '2022-03-04 06:25:06'),
(13, 'jociel', 'lucido', 'OR62229fd2ba527', 'Pork Binagoongan', 1, 185, 185, '2022-03-04 06:25:06'),
(14, 'jociel', 'lucido', 'OR62229fd2ba527', 'Sotanghon', 1, 80, 80, '2022-03-04 06:25:06'),
(15, 'jociel', 'lucido', 'OR62229fd2ba527', 'Fruit Salad', 1, 75, 75, '2022-03-04 06:25:06'),
(16, 'jociel', 'lucido', 'OR62229fd2ba527', 'Crab and Corn Soup', 1, 50, 50, '2022-03-04 06:25:06'),
(17, 'World', 'Hello', 'OR6222a0246748c', 'Chicken Sandwich', 1, 45, 45, '2022-03-04 06:26:28'),
(18, 'World', 'Hello', 'OR6222a0246748c', 'Cheese Pimiento', 1, 25, 25, '2022-03-04 06:26:28'),
(19, 'World', 'Hello', 'OR6222a0246748c', 'Ham and Egg', 1, 50, 50, '2022-03-04 06:26:28'),
(20, 'World', 'Hello', 'OR6222a0246748c', 'Leche Flan', 1, 100, 100, '2022-03-04 06:26:28'),
(21, 'World', 'Hello', 'OR6222a09365b02', 'Pork Barbecue ', 3, 25, 75, '2022-03-04 06:28:19'),
(22, 'World', 'Hello', 'OR6222a09365b02', 'Pork Sinigang', 1, 450, 450, '2022-03-04 06:28:19'),
(23, 'World', 'Hello', 'OR6222a09365b02', 'Stuffed Squid', 1, 150, 150, '2022-03-04 06:28:19'),
(24, 'Jociel', 'Lucido', 'OR6222ab2f197e7', 'Arroz caldo with Egg', 1, 45, 45, '2022-03-04 07:13:35'),
(25, 'Jociel', 'Lucido', 'OR6222ab2f197e7', 'CornedSiLog', 2, 75, 150, '2022-03-04 07:13:35'),
(26, 'Jociel', 'Lucido', 'OR6222ab2f197e7', 'HotSiLog', 2, 75, 150, '2022-03-04 07:13:35'),
(27, 'Jociel', 'Lucido', 'OR6222aba1cae6c', 'Chicken Sandwich', 1, 45, 45, '2022-03-04 07:15:29'),
(28, 'Jociel', 'Lucido', 'OR6222aba1cae6c', 'Leche Flan', 1, 100, 100, '2022-03-04 07:15:29'),
(29, 'Jociel', 'Lucido', 'OR6222aba1cae6c', 'Fruit Salad', 1, 75, 75, '2022-03-04 07:15:29'),
(30, 'Jociel', 'Lucido', 'OR6222aba1cae6c', 'Coffee with Chocolate', 1, 30, 30, '2022-03-04 07:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` double NOT NULL,
  `status` varchar(50) NOT NULL,
  `category` varchar(255) NOT NULL,
  `special` varchar(5) NOT NULL,
  `best_seller` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `description`, `price`, `status`, `category`, `special`, `best_seller`) VALUES
(1, 'Arroz caldo with Egg', 'arrozcaldo.png', 'lugaw with egg, chicken, chicharon, toasted garlic, and calamansi', 45, 'In stock', 'Breakfast', '', ''),
(2, 'CornedSiLog', 'cornedsilog.png', 'corned beef mixed with chopped potatoes, egg, and fried rice', 75, 'In stock', 'Breakfast', 'Yes', ''),
(3, 'HotSiLog', 'hotsilog.png', '2 hotdogs paired with fried rice and egg', 75, 'In stock', 'Breakfast', 'Yes', ''),
(4, 'LongSiLog', 'longsilog.png', '2 chicken longganisa paired with fried rice and egg', 75, 'In stock', 'Breakfast', 'Yes', ''),
(5, 'TapSiLog', 'tapsilog.png', 'pair up of marinated pork, egg, and fried rice', 85, 'In stock', 'Breakfast', 'Yes', ''),
(6, 'ToSiLog', 'tosilog.png', 'sweet pork belly tocino paired with fried rice and egg', 75, 'In stock', 'Breakfast', '', ''),
(7, 'Beef with Broccoli', 'beefbroccoli.png', 'tender broccoli and moist beef in a savory sauce', 250, 'In stock', 'Main Course', '', 'Yes'),
(8, 'Beef Kaldereta', 'beefkaldereta.png', 'beef stew cooked with tomato sauce and liver spread', 300, 'In stock', 'Main Course', '', ''),
(9, 'Beef with Mushroom', 'beefmushroom.png', 'fork-tender beef and mushroom paired with mashed potatoes', 250, 'In stock', 'Main Course', '', ''),
(10, 'Crispy Pata', 'crispypata.png', 'crunchy deep fried pig trotters served with a soy-vinegar dip', 600, 'In stock', 'Main Course', 'Yes', 'Yes'),
(11, 'Fried Chicken', 'friedchicken.png', 'fried chicken coated with buttermilk, flour and paprika', 90, 'In stock', 'Main Course', '', 'Yes'),
(12, 'Grilled Liempo', 'grilledliempo.png', 'pork belly marinated in lemon and rosemary marinade', 50, 'In stock', 'Main Course', '', ''),
(13, 'Lechong Kawali', 'lechongkawali.png', 'pan-fried pork belly seasoned with garlic, bay leaves, and pineapple ', 250, 'In stock', 'Main Course', '', ''),
(14, 'Lumpiang Shanghai', 'lumpiangshanghai.png', 'medium sized bilao of lumpia good for 6-7 persons', 120, 'In stock', 'Main Course', 'Yes', ''),
(15, 'Pork Barbecue ', 'pork_barbecue.png', '1 stick of thinly sliced pork pieces marinated in pineapple marinade', 25, 'In stock', 'Main Course', '', ''),
(16, 'Pork Kaldereta', 'pork_kaldereta.png', 'pork ribs mixed with potatoes, carrots, bell peppers and green peas', 150, 'In stock', 'Main Course', '', ''),
(17, 'Pork Binagoongan', 'porkbinagoongan.png', 'pork belly cooked in tomato, chili, and shrimp paste with eggplant', 185, 'In stock', 'Main Course', '', ''),
(18, 'Pork Sinigang', 'porksinigang.png', 'made with pork ribs, vegetables, and kamias-flavored broth', 450, 'In stock', 'Main Course', '', ''),
(19, 'Sinigang na Bangus', 'sinigangbangus.png', 'bangus is stewed in a flavorful and slightly sour tamarind broth', 180, 'In stock', 'Main Course', '', ''),
(20, 'Stuffed Squid', 'stuffedsquid.png', 'dish of marinated squid stuffed with onions, parsley, and tomato mixture', 150, 'In stock', 'Main Course', '', ''),
(21, 'Carbonara', 'carbonara.png', 'made with cream, egg, parmesan cheese, bacon, and peas', 100, 'In stock', 'Merienda', '', ''),
(22, 'Cheese Sticks', 'cheesestick.png', '10 pieces of cheese sticks coated in seasoned breadcrumbs', 60, 'In stock', 'Merienda', '', ''),
(23, 'Nachos', 'nachos.png', 'heated tortilla chips and nachos covered with melted cheese', 90, 'In stock', 'Merienda', '', ''),
(24, 'Pancit Bihon', 'pancit_bihon.png', 'guisado with rice noodles, meat, shrimp, and vegetables', 75, 'In stock', 'Merienda', '', ''),
(25, 'Pancit Canton', 'pancit_canton.png', 'guisado with flour noodles, meat, shrimp, and vegetables', 80, 'In stock', 'Merienda', '', ''),
(26, 'Potato Fries', 'fries.png', '\r\npotato fries with curried ketchup and mayonnaise', 60, 'In stock', 'Merienda', '', ''),
(27, 'Sotanghon', 'sotanghon.png', 'bowl of chicken, cellophane noodles, tender-crisp veggies, and tasty broth ', 80, 'In stock', 'Merienda', 'Yes', ''),
(28, 'Spaghetti', 'spaghetti.png', 'topped with sliced hotdogs, giniling (ground meat), and grated cheese', 85, 'In stock', 'Merienda', '', ''),
(29, 'Buttered Vegetables', 'buttered.png', '1 medium sized bilao of steamed vegetables dressed in seasoned melted butter', 250, 'In stock', 'Vegetables', '', ''),
(30, 'Chopsuey', 'chopsuey.png', '1 medium sized bilao of stir-fried vegetable dish that is cooked with meat and shrimp', 250, 'In stock', 'Vegetables', '', ''),
(31, 'Pinakbet', 'pakbet.png', '1 medium sized bilao of variety of vegetables sautéed in fish sauce or bagoong', 200, 'In stock', 'Vegetables', '', ''),
(32, 'Regular Burger', 'burger.png', 'with patty, cheddar chess, tomato, onions, and lettuce', 35, 'In stock', 'Sandwiches', '', ''),
(33, 'Cheese Pimiento', 'cheesepimiento.png', 'sandwich spread made from mayonnaise, cheese, and pimiento', 25, 'In stock', 'Sandwiches', '', ''),
(34, 'Chicken Sandwich', 'chickensandwich.png', 'with sautéed  chicken, mayo, crushed pepper, and ground mustard ', 45, 'In stock', 'Sandwiches', '', ''),
(35, 'Ham and Cheese', 'hamcheese.png', ' sweet ham layered with cheese and stacked with slices of cucumber', 45, 'In stock', 'Sandwiches', '', ''),
(36, 'Ham and Egg', 'hamegg.png', 'with a slice of ham, egg, mayonnaise, and some crisp lettuce.', 50, 'In stock', 'Sandwiches', 'Yes', ''),
(37, 'Buko Pandan', 'bukopandan.png', 'made with pandan flavored gelatin, tapioca pearls, and shredded young coconut in sweetened cream', 65, 'In stock', 'Desserts', '', ''),
(38, 'Fruit Salad', 'fruitsalad.png', 'fruit cocktail combined with condensed milk, cheese, buko, and table cream', 75, 'In stock', 'Desserts', 'Yes', ''),
(39, 'Leche Flan', 'lecheflan.png', 'creamy and sweet steamed custard with a golden and syrupy caramel topping', 100, 'In stock', 'Desserts', '', 'Yes'),
(40, 'Potato Salad', 'potatosalad.png', 'made with boiled potatoes, sour cream, mayo, green onions, celery, parsley, pickles and bacon', 85, 'In stock', 'Desserts', '', 'Yes'),
(41, 'Sweet Macaroni Salad', 'macaroni.png', 'creamy salad with eggs, crisp vegetables, sweetened fruits, condensed milk, and mayonnaise', 75, 'In stock', 'Desserts', '', ''),
(42, 'Vegetable Salad', 'vegetablesalad.png', 'sauced mixture of cooked vegetables, crunchy nuts, and seeds with a mayonnaise', 75, 'In stock', 'Desserts', '', ''),
(43, 'Coffee Brewed', 'coffeebrewed.png', '', 60, 'In stock', 'Beverages', '', ''),
(44, 'Coffee 3-in-1', 'coffee3in1.png', '', 25, 'In stock', 'Beverages', '', ''),
(45, 'Coffee with Chocolate', 'coffeechocolate.png', '', 30, 'In stock', 'Beverages', '', ''),
(46, 'Hot Chocolate', 'hotchocolate.png', '', 30, 'In stock', 'Beverages', '', ''),
(47, 'Orange Juice', 'orangejuice.png', '', 20, 'In stock', 'Beverages', '', ''),
(48, 'Pineapple Juice', 'pineapplejuice.png', '', 45, 'In stock', 'Beverages', '', ''),
(49, 'Coke', 'coke.png', '', 20, 'In stock', 'Beverages', '', ''),
(50, 'Mountain Dew', 'mountaindew.png', '', 20, 'In stock', 'Beverages', '', ''),
(51, 'Pepsi', 'pepsi.png', '', 20, 'In stock', 'Beverages', '', ''),
(52, 'Royal', 'royal.png', '', 20, 'In stock', 'Beverages', '', ''),
(53, 'Combo meal', 'chickenveg.png', 'combination of grilled chicken and vegetables with rice', 130, 'In stock', 'Others', '', ''),
(54, 'Crab and Corn Soup', 'crabcorn.png', 'corn and lump crab meat, flavored with ginger, and spring onions', 50, 'In stock', 'Others', '', ''),
(55, 'Extra Rice', 'rice.png', 'plain rice', 15, 'In stock', 'Others', '', ''),
(56, 'New Item', 'breakfast.png', 'Try', 50.6, 'In stock', 'Breakfast', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `tablename` varchar(255) NOT NULL,
  `tabletype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `tablename`, `tabletype`) VALUES
(1, 'Table01', 'Square'),
(2, 'Table02', 'Rectangle'),
(3, 'Table03', 'Conference'),
(4, 'Table04', 'Rectangle'),
(5, 'Table05', 'Square'),
(6, 'New Table', 'Conference'),
(7, 'New Table', 'Rectangle');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_num` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `token_expiry` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `address`, `email`, `mobile_num`, `password`, `reset_token`, `token_expiry`) VALUES
(1, 'World', 'Hello', '12345 123 Pasig City', 'ariasalyssaaa@gmail.com', '09010101001', 'cc03e747a6afbbcbf8be7668acfebee5', NULL, NULL),
(2, 'Hi', 'World', 'Manila', 'hello123@gmail.com', '09018281200', 'cc03e747a6afbbcbf8be7668acfebee5', NULL, NULL),
(3, 'Yo', 'YOO', 'Pasig', 'hello@gmail.com', '09021311234', '30c2138619045a1dd4b1f6cb888f0d67', NULL, NULL),
(4, 'Hellooo', 'World', 'Manila', 'helloworld@gmail.com', '09765498321', 'cc03e747a6afbbcbf8be7668acfebee5', NULL, NULL),
(5, 'Hi', 'World', 'Manila', 'hiworld@gmail.com', '09237654890', 'cc03e747a6afbbcbf8be7668acfebee5', NULL, NULL),
(6, 'Okay', 'Yako', '000 Pasig', 'yaaakko123@gmail.com', '09821261621', 'f30aa7a662c728b7407c54ae6bfd27d1', NULL, NULL),
(7, 'jociel', 'lucido', 'qc', 'jocielanne@gmail.com', '09474774954', '296ab79bb0e6b305a21f964bd2ac8531', NULL, NULL),
(8, 'Donald', 'wer', 'manila', 'jociell@gmail.com', '09474774954', '296ab79bb0e6b305a21f964bd2ac8531', NULL, NULL),
(9, 'Jociel Anne', 'Lucido', 'Quezon City', 'lucidojocielannel@gmail.com', '09474774954', '5d41402abc4b2a76b9719d911017c592', NULL, NULL),
(10, 'Mary', 'Anne', 'Sto. Nino St. Quezon City', 'mary@gmail.com', '09474774954', '5d41402abc4b2a76b9719d911017c592', NULL, NULL),
(11, 'Mary', 'Annee', 'Sto. Nino St. Quezon City', 'maryy@gmail.com', '09474774954', '5d41402abc4b2a76b9719d911017c592', NULL, NULL),
(12, 'May', 'Lucido', 'Sto. Nino Quezon City', 'jocielannelucido@gmail.com', '09474774954', '5d41402abc4b2a76b9719d911017c592', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
