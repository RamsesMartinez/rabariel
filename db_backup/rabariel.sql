-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2016 at 12:58 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rabariel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--
CREATE  DATABASE IF NOT EXISTS  `rabariel`;

USE `rabariel`;

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `article`, `url`, `image`, `updated_at`, `created_at`) VALUES
(1, 'Voto', 'Tema: Votación', 'voto', 'voto.jpg', '2016-04-14 00:00:00', '2016-04-14 00:00:00'),
(2, 'Debate', 'Tema: Debate', 'debate', 'debate.jpg', '2016-04-14 00:00:00', '2016-04-14 00:00:00'),
(3, 'Logo', 'Tema: Simbolos', 'logo', 'logo.jpg', '2016-04-14 00:00:00', '2016-04-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
`id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `menu_id`, `title`, `article`, `updated_at`, `created_at`) VALUES
(1, 1, 'About us', 'Sobre nuestros artículos...', '2016-05-22 00:00:00', '2016-05-22 00:00:00'),
(2, 1, 'Nuestra compania', 'Nuestra compania tiene las mejores clases', '2016-05-22 00:00:00', '2016-05-22 00:00:00'),
(5, 2, 'Servicios online', 'Nuestros servicios online', '2016-05-22 00:00:00', '2016-05-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
`id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `link`, `title`, `url`, `updated_at`, `created_at`) VALUES
(1, 'About', 'About us...', 'about', '2016-05-22 00:00:00', '2016-05-22 00:00:00'),
(2, 'Services', 'Our services', 'services', '2016-05-22 00:00:00', '2016-05-22 00:00:00'),
(3, 'Contact', 'Contact us', 'contact', '2016-05-22 00:00:00', '2016-05-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` text NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `data`, `total`, `updated_at`, `created_at`) VALUES
(1, 6, '{"3":{"id":3,"name":"Audio","price":150,"quantity":1,"attributes":[],"conditions":[]},"4":{"id":4,"name":"Video","price":200,"quantity":1,"attributes":[],"conditions":[]}}', '350.00', '2016-05-16 01:47:50', '2016-05-16 01:47:50'),
(2, 6, '{"1":{"id":1,"name":"Texto","price":100,"quantity":1,"attributes":[],"conditions":[]}}', '100.00', '2016-05-16 01:49:09', '2016-05-16 01:49:09'),
(3, 5, '{"1":{"id":1,"name":"Texto","price":100,"quantity":1,"attributes":[],"conditions":[]}}', '100.00', '2016-05-16 01:49:36', '2016-05-16 01:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `article`, `image`, `url`, `price`, `categorie_id`, `updated_at`, `created_at`) VALUES
(1, 'Texto', 'Texto sobre Votación', 'texto.png', 'v-texto', '100.00', 1, '2016-04-20 00:00:00', '2016-04-20 00:00:00'),
(2, 'Audio', 'Audio sobre Votación', 'audio.png', 'v-audio', '150.00', 1, '2016-04-20 00:00:00', '2016-04-20 00:00:00'),
(3, 'Audio', 'Audio sobre Debates', 'audio.png', 'd-audio', '150.00', 2, '2016-04-20 00:00:00', '2016-04-20 00:00:00'),
(4, 'Video', 'Video sobre Debates', 'video.png', 'd-video', '200.00', 2, '2016-04-20 00:00:00', '2016-04-20 00:00:00'),
(5, 'Video', 'Video sobre Símbolos', 'video.png', 's-video', '200.00', 3, '2016-04-20 00:00:00', '2016-04-20 00:00:00'),
(6, 'Texto', 'Texto sobre Símbolos', 'texto.png', 's-texto', '100.00', 3, '2016-04-20 00:00:00', '2016-04-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `updated_at`, `created_at`) VALUES
(1, '-', '-', '-', '2016-05-06 00:00:00', '2016-05-06 00:00:00'),
(2, '--', '--', '--', '2016-05-06 00:00:00', '2016-05-06 00:00:00'),
(3, 'Admin', 'admin@gmail.com', '$2y$10$R0gq.dlMPilkBD2YyGO9..DeT0iBZaBZho7afIDfGyDa/C7WjEHFa', '2016-05-09 00:00:00', '2016-05-09 00:00:00'),
(4, 'Ariel', 'ariel@gmail.com', '$2y$10$R0gq.dlMPilkBD2YyGO9..DeT0iBZaBZho7afIDfGyDa/C7WjEHFa', '2016-05-09 00:00:00', '2016-05-09 00:00:00'),
(5, 'Jorge', 'jorge@gmail.com', '$2y$10$R0gq.dlMPilkBD2YyGO9..DeT0iBZaBZho7afIDfGyDa/C7WjEHFa', '2016-05-09 00:00:00', '2016-05-09 00:00:00'),
(6, 'Avi Cohen', 'avi@gmail.com', '$2y$10$diMqYfHgAOZ5FGxAehpNo.I48GMy6nOLFOQCW10azXPPEk/Dk1O62', '2016-05-16 00:45:51', '2016-05-16 00:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE IF NOT EXISTS `users_role` (
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`uid`, `rid`) VALUES
(3, 3),
(4, 4),
(5, 4),
(6, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
