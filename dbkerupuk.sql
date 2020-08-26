-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 03:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkerupuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbrekap`
--

CREATE TABLE `tbrekap` (
  `id` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `cahaya` float NOT NULL,
  `hujan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbrekap`
--

INSERT INTO `tbrekap` (`id`, `waktu`, `cahaya`, `hujan`) VALUES
(1, '2020-05-18 13:04:43', 90, 10),
(3, '2020-05-23 07:27:44', 96, 9),
(616, '2020-06-02 00:03:07', 20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `created` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`id`, `nama`, `email`, `password`, `foto`, `created`) VALUES
(1, 'Ragil Hidayatulah', 'ragil@gmail.com', '$2y$10$YO1xmaCRYI8lsDLaEjZ3xO5.9bOr8XRKUEv9imd1Vc5dQ55yl5XXe', 'kerupuk.jpg', 1586955454),
(2, 'M. Fajar Eka Putra', 'fajareka@gmail.com', '$2y$10$YO1xmaCRYI8lsDLaEjZ3xO5.9bOr8XRKUEv9imd1Vc5dQ55yl5XXe', 'kerupuk.jpg', 1586955454),
(3, 'Nabila Nur Ardianti Siregar', 'nabila@gmail.com', '$2y$10$YO1xmaCRYI8lsDLaEjZ3xO5.9bOr8XRKUEv9imd1Vc5dQ55yl5XXe', 'kerupuk.jpg', 1586955454);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbrekap`
--
ALTER TABLE `tbrekap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unik` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbrekap`
--
ALTER TABLE `tbrekap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=617;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
