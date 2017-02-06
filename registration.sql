-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2016 at 08:56 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `token`, `status`) VALUES
(2, 'Amrit', 'amrit.m23@gmail.com', '123456789', '2dc91cf05712059e5315065564cc6db6f0ec08168965d42c808fd93950cba858', 0),
(5, 'Balpreet Singh', 'balpreet.m23@gmail.com', '123456789', 'ff7a488a230b46128bd35a23e516a3d056990b77e07428d05dc7276144d5a68d', 1),
(6, 'Balpreet Singh', 'innallure@gmail.com', '123456789', '8e3bd1cbe45672b47c86c229da9a2f94c8cebeb24ad3882af40db55794b48108', 0),
(7, 'Balpreet Singh', 'abc@gmail.com', '123456789', '18a9137abcc826f7348962eb19c30b7cab22eb67ea5b90cf224b0d2b5949d2dc', 0),
(8, 'Balpreet Singh', 'xyz@gmail.com', '123456789', '02ad075d961e2c985025c95df44891ea58f5ebb05e020ebe31090a9647f062ed', 0),
(9, 'Balpreet Singh', 'xyz1@gmail.com', '123456789', 'd282fe43b4fee8e44317c6d02da68f54ae5b4ef66e3a5c7e7436ad42e103412b', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
