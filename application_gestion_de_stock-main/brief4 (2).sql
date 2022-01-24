-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 04:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brief4`
--

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id_p` int(11) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `descriptions` varchar(200) NOT NULL,
  `prix` float NOT NULL,
  `quantite` int(11) NOT NULL,
  `categorie` varchar(200) NOT NULL,
  `images` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id_p`, `reference`, `nom`, `descriptions`, `prix`, `quantite`, `categorie`, `images`) VALUES
(1, 'A45E36', 'laptop', 'hhhhhhhh', 56, 11, 'pc', 'hp.png'),
(2, '  R1234', 'souris', 'qfffffffffffffffffff', 13, 13, 'souris', 'download.png'),
(3, 'A45E', 'clavier', 'hqdhcqdhqfckq', 43, 41, 'clavier', 'dollar.png'),
(11, 'J765', 'cam', 'jhfbqufq', 43, 8, 'cam', '61ee7c962fcd7images.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `role` enum('admin','client') NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `role`) VALUES
(10, 'idriss', 'idriss@gmail.com', '$2y$10$T4NvkReRYYLJMZpdTnWcrulA.rDQHNyXJTwSYdF6HBNK6fgeMbyZe', '2022-01-22 01:21:23', 'client'),
(11, 'haitham', '', '$2y$10$0G9OK1SyJvrRCxvD.yCdme9208DXhyLHAfG2djGa2R0kM27MXoOWK', '2022-01-24 09:25:36', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_p`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
