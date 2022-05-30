-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 04:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_rating`
--

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `phone`, `email`, `password`, `status`, `address`, `description`) VALUES
(1, 'Root', '00972598848308', 'root@gmail.com', '7b24afc8bc80e548d66c4e7ff72171c5', 1, 'USA', 'No Description'),
(3, 'Braa', '+972598848308', 'braa@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 0, 'Gaza', 'No Description'),
(4, 'Ahmed', '00972598848308', 'Ahmed3@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 1, 'Ramallah', 'No Description'),
(5, 'Ali', '+972598848308', 'ali@gmail.com', '86318e52f5ed4801abe1d13d509443de', 1, 'Gaza', 'No Description');

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(2, '   Mobile phones', '   Samsung '),
(3, 'Laptops', '500GB'),
(6, 'Watches', 'No description'),
(8, 'Movies', 'Action movies');

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `description`, `address`, `phone`, `logo`, `category_id`, `rates_number`, `rate`) VALUES
(6, 'City Store', 'The pretties store in gaza ever', 'Gaza - PS', '+972598848308', '210431-How_to_Train_Your_Dragon.jpg16533070847755.jpg', 2, 5, 17),
(7, 'Capital Store', 'No description', 'Yafa', '+9703214568', 'Wallpaper (23).jpg16533086778854.jpg', 3, 15, 49),
(8, 'Sport Shop', 'No description', 'USA', '+970594532156', 'Wallpaper (21).jpg165330952084.jpg', 6, 4, 15),
(9, 'Book Store', 'No description', 'Japan', '0248548544', 'Wallpaper (13).jpg16533162653335.jpg', 6, 3, 10),
(10, 'Store1', 'bla bla bla', 'Cairo', '00972598848308', 'Wallpaper (2).jpg16533313395967.jpg', 8, 1, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
