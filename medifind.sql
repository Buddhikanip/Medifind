-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 04:03 PM
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
-- Database: `medifind`
--

-- --------------------------------------------------------

--
-- Table structure for table `asas`
--

CREATE TABLE `asas` (
  `id` int(10) UNSIGNED NOT NULL,
  `dname` varchar(200) NOT NULL,
  `manu` varchar(200) NOT NULL,
  `sup` varchar(100) NOT NULL,
  `ndc` varchar(100) NOT NULL,
  `exp` date NOT NULL,
  `qty` int(10) NOT NULL,
  `uprice` varchar(100) NOT NULL,
  `iid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asas`
--

INSERT INTO `asas` (`id`, `dname`, `manu`, `sup`, `ndc`, `exp`, `qty`, `uprice`, `iid`) VALUES
(3, '2', '1', '1', '1', '0001-11-11', 123, '1', 27);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(10) NOT NULL,
  `dname` varchar(200) NOT NULL,
  `manu` varchar(200) NOT NULL,
  `sup` varchar(100) NOT NULL,
  `ndc` varchar(100) NOT NULL,
  `exp` date NOT NULL,
  `qty` int(10) NOT NULL,
  `uprice` varchar(100) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `rid` int(10) NOT NULL,
  `cleanStr` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `dname`, `manu`, `sup`, `ndc`, `exp`, `qty`, `uprice`, `pname`, `rid`, `cleanStr`) VALUES
(27, '2', '1', '1', '1', '0001-11-11', 123, '1', 'Suruthi', 3, 'asas');

-- --------------------------------------------------------

--
-- Table structure for table `phamacy`
--

CREATE TABLE `phamacy` (
  `id` int(10) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `oname` varchar(200) NOT NULL,
  `oaddress` varchar(300) NOT NULL,
  `otel` varchar(100) NOT NULL,
  `oemail` varchar(100) NOT NULL,
  `onic` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `web` varchar(100) NOT NULL,
  `hor` varchar(100) NOT NULL,
  `plicense` varchar(30) NOT NULL,
  `pwd` varchar(300) NOT NULL,
  `cleanStr` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phamacy`
--

INSERT INTO `phamacy` (`id`, `pname`, `oname`, `oaddress`, `otel`, `oemail`, `onic`, `email`, `address`, `tel`, `web`, `hor`, `plicense`, `pwd`, `cleanStr`) VALUES
(48, 'Suruthi', '', '', '', '', '', 'b@gmail.com', '858,Kuruheragedara', '0713270510', '', '', 'as/as', '$2y$10$Hp/SNKZ1P6GzfTnCtRTb1./fNI1yiaU/hRp6yYCJ77dh10paeoMaO', 'asas');

-- --------------------------------------------------------

--
-- Table structure for table `temp_phamacy`
--

CREATE TABLE `temp_phamacy` (
  `id` int(10) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `oname` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `plicense` varchar(30) NOT NULL,
  `pwd` varchar(300) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_phamacy`
--

INSERT INTO `temp_phamacy` (`id`, `pname`, `oname`, `email`, `address`, `tel`, `plicense`, `pwd`, `status`) VALUES
(12, 'Suruthi', '', 'b@gmail.com', '858,Kuruheragedara', '0713270510', 'as/as', '$2y$10$Hp/SNKZ1P6GzfTnCtRTb1./fNI1yiaU/hRp6yYCJ77dh10paeoMaO', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asas`
--
ALTER TABLE `asas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phamacy`
--
ALTER TABLE `phamacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_phamacy`
--
ALTER TABLE `temp_phamacy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asas`
--
ALTER TABLE `asas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `phamacy`
--
ALTER TABLE `phamacy`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `temp_phamacy`
--
ALTER TABLE `temp_phamacy`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
