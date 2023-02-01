-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 08:48 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `id` int(10) NOT NULL,
  `bName` varchar(20) NOT NULL,
  `mName` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`id`, `bName`, `mName`, `phone`, `email`, `password`, `status`) VALUES
(4, 'Bhola', 'Sahadat', '01799', 'naimsahadat@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(10, ' Panthapath ', 'Parvez', '01789203637', 'mkhparvez72@gmail.com', 'c12e01f2a13ff5587e1e9e4aedb8242d', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `des` text NOT NULL,
  `size` varchar(10) NOT NULL,
  `color` varchar(10) NOT NULL,
  `barcode` varchar(15) NOT NULL,
  `costPrice` float NOT NULL,
  `salePrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `des`, `size`, `color`, `barcode`, `costPrice`, `salePrice`) VALUES
(5, 'T-Shirt   ', 'Easy Brand', 'XL   ', '#000000', '202201   ', 500, 600),
(6, 'T-Shirt      ', '  China T-Shirt', 'XXL   ', '#000000', '202202', 590, 700);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_details`
--

CREATE TABLE `tbl_purchase_details` (
  `id` int(11) NOT NULL,
  `pdate` date NOT NULL,
  `cName` varchar(50) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `br_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `barcode` int(11) NOT NULL,
  `price` float NOT NULL,
  `qnt` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_purchase_details`
--

INSERT INTO `tbl_purchase_details` (`id`, `pdate`, `cName`, `invoice`, `br_id`, `product_id`, `barcode`, `price`, `qnt`, `total`) VALUES
(64, '2022-11-13', 'dfsa', '004', 10, 5, 202201, 500, 4, 2000),
(65, '2022-11-13', 'afad', '004', 10, 5, 202201, 500, 6, 3000),
(66, '2022-11-13', 'fuet', '005', 10, 5, 202201, 500, 4, 2000),
(67, '2022-11-13', 'rewr', '006', 10, 5, 202201, 500, 2, 1000),
(69, '2022-11-14', 'ABC', '003', 10, 5, 202201, 500, 6, 3000),
(70, '2022-11-14', 'akkd', '004', 10, 5, 202201, 500, 2, 1000),
(72, '2022-11-14', 'afd', '005', 10, 6, 202202, 590, 3, 1770),
(73, '2022-11-14', 'afd', '001', 10, 6, 202202, 590, 1, 590),
(74, '2022-11-14', 'afdf', '004', 10, 5, 202201, 500, 2, 1000),
(75, '2022-11-14', 'afdf', '004', 10, 5, 202201, 500, 2, 1000),
(76, '2022-11-14', 'afd', '004', 10, 5, 202201, 500, 1, 500),
(77, '2022-11-14', 'abc', '004', 10, 5, 202201, 500, 2, 1000),
(78, '2022-11-14', 'gsg', '004', 10, 5, 202201, 500, 1, 500),
(79, '2022-11-14', 'Avc', '004', 10, 5, 202201, 500, 2, 1000),
(80, '2022-11-14', 'Avc', '002', 10, 5, 202201, 500, 2, 1000),
(81, '2022-11-14', 'gdf', '004', 10, 5, 202201, 500, 1, 500),
(82, '2022-11-14', 'fdf', '004', 10, 6, 202202, 590, 1, 590),
(83, '2022-11-14', 'afds', '004', 10, 6, 202202, 590, 2, 1180),
(84, '2022-11-14', 'afsd', '005', 10, 6, 202202, 590, 1, 590),
(85, '2022-11-14', 'afsd', '005', 10, 6, 202202, 590, 1, 590),
(86, '2022-11-14', 'fasd', '005', 10, 6, 202202, 590, 1, 590),
(87, '2022-11-14', 'fgdf', '005', 10, 6, 202202, 590, 2, 1180);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `qnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`id`, `product_id`, `br_id`, `qnt`) VALUES
(5, 7, 10, 25),
(6, 5, 10, 33),
(8, 0, 10, 0),
(9, 6, 10, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchase_details`
--
ALTER TABLE `tbl_purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_purchase_details`
--
ALTER TABLE `tbl_purchase_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
