-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 10:01 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spiralnabaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `dodaci`
--

CREATE TABLE `dodaci` (
  `id_dodadtka` int(11) NOT NULL,
  `naslovDodatka` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `opisDodatka` text COLLATE utf8_croatian_ci NOT NULL,
  `slikaDodatka` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `cijenaDodatka` varchar(11) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `igre`
--

CREATE TABLE `igre` (
  `id_igre` int(11) NOT NULL,
  `nazivIgre` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `opisIgre` text COLLATE utf8_croatian_ci NOT NULL,
  `slikaIgre` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `cijenaIgre` varchar(10) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `konzole`
--

CREATE TABLE `konzole` (
  `id_konzole` int(11) NOT NULL,
  `naslovKonzole` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `opisKonzole` text COLLATE utf8_croatian_ci NOT NULL,
  `slikaKonzole` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `cijenaKonzole` varchar(10) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `veza_dodatakkonzola`
--

CREATE TABLE `veza_dodatakkonzola` (
  `id_konzole` int(11) NOT NULL,
  `id_dodatka` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `veza_igrakonzola`
--

CREATE TABLE `veza_igrakonzola` (
  `id_igre` int(11) NOT NULL,
  `id_konzole` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dodaci`
--
ALTER TABLE `dodaci`
  ADD PRIMARY KEY (`id_dodadtka`);

--
-- Indexes for table `igre`
--
ALTER TABLE `igre`
  ADD PRIMARY KEY (`id_igre`);

--
-- Indexes for table `konzole`
--
ALTER TABLE `konzole`
  ADD PRIMARY KEY (`id_konzole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dodaci`
--
ALTER TABLE `dodaci`
  MODIFY `id_dodadtka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `igre`
--
ALTER TABLE `igre`
  MODIFY `id_igre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;
--
-- AUTO_INCREMENT for table `konzole`
--
ALTER TABLE `konzole`
  MODIFY `id_konzole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
