-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2023 at 02:11 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `id` int(10) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `mName` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`id`, `dept`, `mName`, `phone`, `email`, `password`, `status`) VALUES
(10, 'IT', 'Parvez', '01789203637', 'mkhparvez72@gmail.com', 'c12e01f2a13ff5587e1e9e4aedb8242d', 1),
(11, 'Accounts', 'Admin', '017', 'fdf@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(12, 'IT', 'Didar', '01914240042', 'shahidul.khan@bga-bd.com', '630cbc5eb92050af500a2ad9b2054ecb', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history`
--

CREATE TABLE `tbl_history` (
  `id` int(10) NOT NULL,
  `inv_id` varchar(15) NOT NULL,
  `curr_user` varchar(30) NOT NULL,
  `pre_user` varchar(30) NOT NULL,
  `curr_loc` varchar(30) NOT NULL,
  `pre_loc` varchar(30) NOT NULL,
  `remarks` varchar(30) DEFAULT NULL,
  `entry_user` varchar(15) NOT NULL,
  `trnsfr_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_history`
--

INSERT INTO `tbl_history` (`id`, `inv_id`, `curr_user`, `pre_user`, `curr_loc`, `pre_loc`, `remarks`, `entry_user`, `trnsfr_date`) VALUES
(1, '', 'Parvez', 'Shahrier Islam', 'Level-02', 'Level-01', 'Tranfer', 'Parvez', '0000-00-00 00:00:00'),
(2, 'PC-001 ', 'Parvez', 'Shahrier Islam', 'Level-02', 'Level-01', 'Tranfer', 'Parvez', '2023-01-10 12:35:33'),
(7, 'UPS-001 ', 'Shahrier Islam', 'abulkalam', 'Level-10', 'Level-01', 'Tranfer', 'Admin', '2023-01-14 19:17:18'),
(8, 'UPS-001 ', 'Shahrier Islam', 'abulkalam', 'Level-10', 'Level-01', 'Tranfer', 'Admin', '2023-01-14 19:01:06'),
(9, 'PC-001 ', 'S Hasan', 'Parvez', 'Level-01', 'Level-02', 'Tranfer', 'Admin', '2023-01-12 19:01:34'),
(10, 'PC-001 ', 'Shahrier Islam', 'S Hasan', 'Level-10', 'Level-01', '', 'Admin', '2023-01-13 19:01:33'),
(21, 'PC-001 ', 'Shahrier Islam', 'Parvez', 'Level-01', 'Level-02', 'Tranfer', 'Admin', '2023-01-14 20:01:46'),
(22, 'PC-001 ', 'Shahrier Islam', 'Parvez', 'Level-01', 'Level-02', 'Tranfer', 'Admin', '2023-01-15 20:01:10'),
(23, 'PC-001 ', 'Parvez', 'Shahrier Islam', 'Level-02', 'Level-01', '', 'Admin', '2023-01-16 19:08:43'),
(24, 'UPS-001 ', 'S Hasan', 'Shahrier Islam', 'Level-01', 'Level-10', '', 'Admin', '2023-01-14 20:01:10'),
(25, 'UPS-001 ', 'S Hasan', 'Shahrier Islam', 'Level-01', 'Level-10', '', 'Admin', '2023-01-14 20:01:19'),
(26, 'UPS-001 ', 'S Hasan', 'Shahrier Islam', 'Level-01', 'Level-10', '', 'Admin', '2023-01-14 20:01:22'),
(27, 'UPS-001 ', 'Shahrier Islam', 'S Hasan', 'Level-02', 'Level-01', 'Tranfer', 'Admin', '2023-01-14 20:01:48'),
(28, 'UPS-001 ', 'Shahrier Islam', 'S Hasan', 'Level-02', 'Level-01', 'Tranfer', 'Admin', '2023-01-14 20:01:07'),
(29, 'UPS-001 ', 'Shahrier Islam', 'S Hasan', 'Level-02', 'Level-01', 'Tranfer', 'Admin', '2023-01-14 20:01:25'),
(30, 'UPS-001 ', 'Shahrier Islam', 'S Hasan', 'Level-02', 'Level-01', 'Tranfer', 'Admin', '2023-01-14 20:01:26'),
(31, 'UPS-001 ', 'Shahrier Islam', 'S Hasan', 'Level-02', 'Level-01', 'Tranfer', 'Admin', '2023-01-14 20:01:06'),
(35, 'PC-001 ', 'Sujan Biswas', 'Shahrier Islam', 'Level-02', 'Level-02', '', 'Admin', '2023-01-18 20:01:51'),
(36, 'UPS-001 ', 'Shahrier Islam', 'abulkalam', 'Level-02', 'Level-01', '', 'Parvez', '2023-01-20 15:01:35');

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
(6, 'T-Shirt      ', '  China T-Shirt', 'XXL   ', '#000000', '202202', 590, 700),
(7, ' afd', ' dad', ' dsad', '#000000', ' da', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `inv_id` varchar(10) CHARACTER SET utf8 NOT NULL,
  `brand` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `model` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `sl_no` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `product_cat` int(2) NOT NULL,
  `location` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `mon_size` decimal(3,1) DEFAULT NULL,
  `ram` int(5) DEFAULT NULL,
  `processor` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `hdd` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `mouse` int(2) NOT NULL,
  `keyboard` int(2) NOT NULL,
  `toner` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `va` int(5) DEFAULT NULL,
  `user` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `user_designation` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `PF` int(10) DEFAULT NULL,
  `entry_user` varchar(10) CHARACTER SET utf8 NOT NULL,
  `dept_id` int(5) NOT NULL,
  `dept` varchar(20) CHARACTER SET utf8 NOT NULL,
  `status` int(2) NOT NULL,
  `remarks` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`inv_id`, `brand`, `model`, `sl_no`, `product_cat`, `location`, `mon_size`, `ram`, `processor`, `hdd`, `mouse`, `keyboard`, `toner`, `va`, `user`, `user_designation`, `PF`, `entry_user`, `dept_id`, `dept`, `status`, `remarks`) VALUES
('', NULL, NULL, NULL, 0, 'Level-01 (Aarong Side)', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-01 Counter(01)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-002', 'POSDIGI', 'DC 410', 'DIGIC1803186', 8, 'Level-17', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-17 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-005', 'POSDIGI', 'DC 410', 'DIGIC2001070', 8, 'Level-01 (Aarong Side)', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-01 Counter(02)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-006', 'POSDIGI', 'DC 410', 'DIGIC1803254', 8, 'Level-10 (Bowling)', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-10 Counter(02)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-008', NULL, 'MK410S', 'SK410S160900042', 8, 'Level-08', NULL, NULL, NULL, NULL, 0, 0, NULL, 650, 'Level-08 Counter(05)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-010', 'POSDIGI', 'DC 410', 'DIGIC2001035', 8, 'Level-10', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-10 Counter(01)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-011', NULL, 'MK410S', 'SK410S160900013', 8, 'Level-08', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-08 Counter(01)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-012', 'POSDIGI', 'DC 410', 'DIGIC1803153', 8, 'Level-01 (Aarong Side)', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-01 Counter(01)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 3, 'Need to Repair'),
('DWR-013', 'POSDIGI', 'DC 410', 'MK410180300286', 8, 'Basement-01', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Basement-01 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-014', 'POSDIGI', 'DC 410', 'DIGIC2001193', 8, 'Level-11', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-11 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-015', 'POSDIGI', 'DC 410', 'DIGIC2001115', 8, 'Level-08 (Online)', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-08 Counter(06) Online', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-017', NULL, 'MK410S', 'SK410S160900047', 8, 'Level-08', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-08 Counter(04)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-018', 'POSDIGI', 'DC 410', 'DIGIC2001020', 8, 'Level-12', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-12 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-019', 'POSDIGI', 'DC 410', 'DIGIC1803131', 8, 'Level-08', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-08 Counter(02)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-020', 'POSDIGI', 'DC 410', 'DIGIC2001076', 8, 'Level-01 (Atrium)', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Shopping Mall Counter-02', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-021', 'POSDIGI', 'DC 410', 'DIGIC2001055', 8, 'Level-01 (Atrium)', NULL, NULL, NULL, NULL, 0, 0, NULL, 650, 'Shopping Mall Counter-03', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-022', 'POSDIGI', 'DC 410', 'DIGIC1803015', 8, 'Level-13', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-13 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-023', 'POSDIGI', 'DC 410', 'MK410180300136', 8, 'Level-14', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-14 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-024', NULL, 'MK410S', 'SK410S160900014', 8, 'Level-08', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-08 Counter(03)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-025', NULL, 'MK410S', 'SK410S160900018', 8, 'Level-08 (Kids Bowling)', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-08 Counter(07)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-026', 'POSDIGI', 'DC 410', 'DIGIC1803054', 8, 'Level-15', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-15 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-029', 'POSDIGI', 'DC 410', 'B5AKC00001', 8, 'Level-09', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-09 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-030', 'POSDIGI', 'DC 410', 'MK410180300135', 8, 'Level-16', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-16 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-033', 'POSDIGI', 'DC 410', 'DIGIC2001083', 8, 'Level-01 (Aarong Side)', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-01 Counter(03) Online', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('DWR-034', 'POSDIGI', 'DC 410', 'DIGIC1803094', 8, 'Level-18', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-18 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('LAP-002', 'Dell', 'Lattitude E5470', '4XL8CG2', 2, 'Accounts Office', '0.0', 4, 'Core i3', '500GB', 0, 0, '', NULL, 'Kamol Kumar Paul', NULL, NULL, 'Parvez', 2, 'Accounts', 1, NULL),
('MON-002', 'Dell', 'D1918Ho', 'CN0GC2RWBO30004P0L5EA04', 3, 'Accounts Office', '18.5', NULL, NULL, NULL, 0, 0, NULL, NULL, 'Akram Hossain Khan', 'DGM', NULL, 'Parvez', 2, 'Accounts', 1, NULL),
('MON-003', 'Dell', 'E1709Wc', 'CN0J672H6418097F19ZL', 3, 'Accounts Office', '17.0', NULL, NULL, NULL, 0, 0, NULL, NULL, 'Md. Mizanur Rahman', 'Asst. Officer', 242342, 'Parvez', 2, 'Accounts', 1, NULL),
('MON-004', 'Dell', 'E1912Hc', 'CN03XNMH6418022P2QYS', 3, 'Accounts Office', '18.5', NULL, NULL, NULL, 0, 0, NULL, NULL, 'Md. Motalibe Hossain', 'Officer', 9176, 'Parvez', 2, 'Accounts', 1, NULL),
('MON-005', 'LG', 'FLATRON W1941S', 'D38-902NLDA000018BD', 3, 'Accounts Office', '18.5', 0, '', '', 0, 0, '', NULL, 'Kazi Shahidul Alam', 'Sr. Officer', 7013, 'Parvez', 2, 'Accounts', 1, NULL),
('MON-006', 'Dell', 'E1912Hf', 'CN0YKH8772872659AFKUA00', 3, 'Accounts Office', '18.5', NULL, NULL, NULL, 0, 0, NULL, NULL, 'Md. Sahenur Rahman', 'Manager', 2060, 'Parvez', 2, 'Accounts', 1, NULL),
('MON-007', 'Dell', 'E1916Hf', 'CN0DFDMY7287262HD16BA00', 3, 'Accounts Office', '18.5', NULL, NULL, NULL, 0, 0, NULL, NULL, 'Partha Sharathi Paul', 'Dy. Manager', 2079, 'Parvez', 2, 'Accounts', 1, NULL),
('MON-008', 'Dell', 'E1916HV', 'CN0Y0YJ6FCC0011PC10UA15', 3, 'Accounts Office', '18.5', NULL, NULL, NULL, 0, 0, NULL, NULL, 'Md. Maslur Hassan', 'Dy. Manager', 9003, 'Parvez', 2, 'Accounts', 1, NULL),
('MON-009', 'Dell', 'E1914Hc', 'CN0657PN6418052501EB', 3, 'Accounts Office', '18.5', NULL, NULL, NULL, 0, 0, NULL, NULL, 'Md. Saifur Rahman', 'Asst. Officer', 10600110, 'Parvez', 2, 'Accounts', 1, NULL),
('MON-010', 'HP', 'v185e', 'CNT92953NM', 3, 'Accounts Office', '18.5', NULL, NULL, NULL, 0, 0, NULL, NULL, 'Md. Anwar Hossain', 'Officer', 2190, 'Parvez', 2, 'Accounts', 1, NULL),
('MON-011', 'Dell', 'E1709Wc', 'CN0J672H6418097G2ERL', 3, 'Accounts Office', '17.0', NULL, NULL, NULL, 0, 0, NULL, NULL, 'Ariful Hoque Patwary', 'Jr. Officer', NULL, 'Parvez', 2, 'Accounts', 1, NULL),
('MON-012', 'Dell', 'E1709Wc', 'CN0J672H6418097G3HUL', 3, 'Accounts Office', '17.0', NULL, NULL, NULL, 0, 0, NULL, NULL, 'Zakir Hossain', 'Asst. Officer', NULL, 'Parvez', 2, 'Accounts', 1, NULL),
('MON-013', 'Dell', 'E1912Hf', 'CN04H19R7287218G7YGM', 3, 'Accounts Office', '18.5', NULL, NULL, NULL, 0, 0, NULL, NULL, 'Mokbul Hossain', 'Asst. Officer', NULL, 'Parvez', 2, 'Accounts', 1, NULL),
('MON-014', 'LG', 'W1941S-PF', 'D38-902NLLG000184BD', 3, 'Store Department (B-02)', '18.5', NULL, NULL, NULL, 0, 0, NULL, NULL, 'Store Common-01', NULL, NULL, 'Parvez', 13, 'Store', 1, NULL),
('MON-015', 'Dell', 'E1709Wc', 'CN0J672H6418097G3KUL', 3, 'Accounts Office', '17.0', NULL, NULL, NULL, 0, 0, NULL, NULL, 'Md. Golam Nabi', 'Officer', 9192, 'Parvez', 2, 'Accounts', 1, NULL),
('MON-016', 'Dell', 'IN1910Nb', 'CN0G492N7426198617PL', 3, 'Store Department (B-02)', '18.5', NULL, NULL, NULL, 0, 0, NULL, NULL, 'Abdus Salam', 'Supervisor (Store)', 2401100, 'Parvez', 13, 'Store', 1, NULL),
('MON-017', 'Dell', 'E1709Wc', 'CN0J672H641809AU3BTL', 3, 'Store Department (B-02)', '17.0', NULL, NULL, NULL, 0, 0, NULL, NULL, 'Md. Akbar Ali', 'Jr. Officer', 242345, 'Parvez', 13, 'Store', 1, NULL),
('MON-018', 'Dell', 'E1910Hc', 'CN0U417N6418002J05SS', 3, 'Store Department (B-02)', '18.5', NULL, NULL, NULL, 0, 0, NULL, NULL, 'Wasim Mia', 'Asstt. Officer', 12200179, 'Parvez', 13, 'Store', 1, NULL),
('MON-021', 'Dell', 'E1914Hc', 'CN0657PN6418052A1GVB', 3, 'Store Department (B-02)', '18.5', NULL, NULL, NULL, 0, 0, NULL, NULL, 'Md. Omar Faruk', 'Office Assistant', 2401225, 'Parvez', 13, 'Store', 1, NULL),
('MON-022', 'Dell', 'IN1910Nb', 'CN0G492N7426198618TL', 3, 'Store Department (B-02)', '18.5', NULL, NULL, NULL, 0, 0, NULL, NULL, 'Store Common-02', NULL, NULL, 'Parvez', 13, 'Store', 1, NULL),
('PC-001', 'Dell', 'Optiplex 3020', '5XHSY42', 1, 'Store Department (B-02)', NULL, 4, 'Core i3', '500GB', 1, 1, NULL, NULL, 'Md. Omar Faruk', 'Office Assistant', 2401225, 'Parvez', 13, 'Store', 1, NULL),
('PC-002', 'Dell', 'Vostro 3671', '6Y09Q03', 1, 'Accounts Office', NULL, 4, 'Core i5', '1TB', 1, 1, NULL, NULL, 'Akram Hossain Khan', 'DGM', NULL, 'Parvez', 2, 'Accounts', 1, NULL),
('PC-003', 'Dell', 'Optiplex 380', 'FV9C22S', 1, 'Accounts Office', NULL, 3, 'Core 2 Duo', '160GB', 1, 1, NULL, NULL, 'Md. Mizanur Rahman', 'Asst. Officer', 242342, 'Parvez', 2, 'Accounts', 1, NULL),
('PC-004', 'Lenovo', 'V530', 'PC19SYAM', 1, 'Accounts Office', NULL, 4, 'Core i3', '1TB', 1, 1, NULL, NULL, 'Md. Motalibe Hossain', 'Officer', 9176, 'Parvez', 2, 'Accounts', 1, NULL),
('PC-005', 'Dell', 'Optiplex 3020', '7HKSY42', 1, 'Accounts Office', '0.0', 4, 'Core i3', '500GB', 1, 1, '', NULL, 'Kazi Shahidul Alam', 'Sr. Officer', 7013, 'Parvez', 2, 'Accounts', 1, NULL),
('PC-006', 'Dell', 'Optiplex 3046', '7T1F2K2', 1, 'Accounts Office', NULL, 4, 'Core i3', '1TB', 1, 1, NULL, NULL, 'Md. Sahenur Rahman', 'Manager', 2060, 'Parvez', 2, 'Accounts', 1, NULL),
('PC-007', 'HP', 'Compaq dx7500 MT', 'FN839AV', 1, 'Accounts Office', NULL, 2, 'Core 2 Duo', '500GB', 1, 1, NULL, NULL, 'Partha Sharathi Paul', 'Dy. Manager', 2079, 'Parvez', 2, 'Accounts', 1, NULL),
('PC-008', 'Dell', 'Vostro 3888', 'JX3S4C3', 1, 'Accounts Office', NULL, 4, 'Core i3', '1TB', 1, 1, NULL, NULL, 'Md. Maslur Hassan', 'Dy. Manager', 9003, 'Parvez', 2, 'Accounts', 1, NULL),
('PC-009', 'Dell', 'Optiplex 3020', 'FJKSY42', 1, 'Accounts Office', NULL, 4, 'Core i3', '500GB', 1, 1, NULL, NULL, 'Md. Anwar Hossain', 'Officer', 2190, 'Parvez', 2, 'Accounts', 1, NULL),
('PC-010', 'Dell', 'Optiplex 3020', '6CKSY42', 1, 'Accounts Office', NULL, 4, 'Core i3', '500GB', 1, 1, NULL, NULL, 'Md. Saifur Rahman', 'Asst. Officer', 10600110, 'Parvez', 2, 'Accounts', 1, NULL),
('PC-011', 'Dell', 'Vostro 220', 'BNHY12S', 1, 'Accounts Office', NULL, 3, 'Core 2 Duo', '160GB', 1, 1, NULL, NULL, 'Zakir Hossain', 'Asst. Officer', NULL, 'Parvez', 2, 'Accounts', 1, NULL),
('PC-012', 'HP', 'Pro 3330 MT', 'QT035AV', 1, 'Accounts Office', NULL, 4, 'Core i3', '500GB', 1, 1, NULL, NULL, 'Ariful Hoque Patwary', 'Jr. Officer', NULL, 'Parvez', 2, 'Accounts', 1, NULL),
('PC-0130', 'Dell', 'Optiplex 3046', '7GD587', 1, 'Level-01', '0.0', 4, 'Core i3', '500GB', 0, 0, '', 0, 'Parvez', 'Assistant Officer', 11900646, 'Parvez', 8, 'IT', 1, 'PF Changed  ghdfg'),
('PC-014', 'Dell', 'Optiplex 360', 'HM8M32S', 1, 'Store Department (B-02)', NULL, 2, 'Core 2 Duo', '250GB', 1, 1, NULL, NULL, 'Abdus Salam Sheikh', 'Supervisor (Store)', 2401100, 'Parvez', 13, 'Store', 1, NULL),
('PC-015', 'Clone', NULL, NULL, 1, 'Accounts Office', NULL, 2, 'Pentium', '320GB', 1, 1, NULL, NULL, 'Mokbul Hossain', 'Asst. Officer', NULL, 'Parvez', 2, 'Accounts', 1, NULL),
('PC-016', 'Dell', 'Vostro 220', '3MHY12S', 1, 'Accounts Office', NULL, 2, 'Core 2 Duo', '1TB', 1, 1, NULL, NULL, 'Md. Golam Nabi', 'Officer', 9192, 'Parvez', 2, 'Accounts', 1, NULL),
('PC-018', 'Dell', 'Optiplex 3020', 'DGJSY42', 1, 'Store Department (B-02)', NULL, 4, 'Core i3', '500GB', 1, 1, NULL, NULL, 'Md. Akbar Ali', 'Jr. Officer', 242345, 'Parvez', 13, 'Store', 1, NULL),
('PC-019', 'Dell', 'Optiplex 3020', '4SJSY42', 1, 'Store Department (B-02)', NULL, 4, 'Core i3', '500GB', 1, 1, NULL, NULL, 'Store Common-01', NULL, NULL, 'Parvez', 13, 'Store', 1, NULL),
('PC-020', 'POINDUS', 'VARIPOS-250', 'ICB0393P0006', 9, 'Level-09', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Level-09  Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-021', 'POINDUS', 'VARIPOS-250', 'ICB0393P0020', 9, 'Level-10 (Bowling)', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Level-10 Counter(02)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-022', 'POINDUS', 'VARIPOS-250', 'KAA0296P0004', 9, 'Level-10', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Level-10 Counter(01)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-023', 'POINDUS', 'VARIPOS-250', 'ICB0393P0003', 9, 'Level-11', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Level-11 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-024', 'POINDUS', 'VARIPOS-250', 'KAA0296P0006', 9, 'Level-12', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Level-12 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-025', 'POINDUS', 'VARIPOS-250', 'ICB0468P0001', 9, 'Level-13', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Level-13 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-026', 'POINDUS', 'VARIPOS-250', 'KAA0296P0002', 9, 'Level-14', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Level-14 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-027', 'POINDUS', 'VARIPOS-250', 'ICB0393P0009', 9, 'Level-18', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Level-18 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-028', 'POINDUS', 'VARIPOS-250', 'ICB0393P0012', 9, 'Level-15', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Level-15 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-029', 'POINDUS', 'VARIPOS-250', 'ICB0393P0005', 9, 'Level-16', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Level-16 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-030', 'POINDUS', 'VARIPOS-250', 'KAA0296P0003', 9, 'Level-17', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Level-17 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-031', 'Dell', 'Optiplex 360', '9L8M32S', 1, 'Store Department (B-02)', NULL, 2, 'Core 2 Duo', '250GB', 1, 1, NULL, NULL, 'Store Common-02', NULL, NULL, 'Parvez', 13, 'Store', 1, NULL),
('PC-032', 'Dell', 'Optiplex 360', '3HRQ42S', 1, 'Store Department (B-02)', NULL, 2, 'Core 2 Duo', '250GB', 1, 1, NULL, NULL, 'Wasim Mia', 'Asstt. Officer', 12200179, 'Parvez', 13, 'Store', 1, NULL),
('PC-033', 'POINDUS', 'VARIPOS-250', 'ICB0393P0001', 9, 'Level-08', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Level-08 Counter(05)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-034', 'POINDUS', 'VARIPOS-250', 'ICB0393P0014', 9, 'Level-08', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Level-08 Counter(01)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-035', 'POINDUS', 'VARIPOS-250', 'ICB0393P0002', 9, 'Level-08', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Level-08 Counter(02)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-036', 'POINDUS', 'VARIPOS-250', 'ICB0393P0018', 9, 'Level-08', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Level-08 Counter(03)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-037', 'POINDUS', 'VARIPOS-250', 'ICB0393P0008', 9, 'Level-08 (Online)', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Level-08 Counter(06) Online', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-038', 'POINDUS', 'VARIPOS-250', 'ICB0393P0004', 9, 'Level-08', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Level-08 Counter(04)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-039', 'POINDUS', 'VARIPOS-250', 'KAA0296P0008', 9, 'Level-08 (Kids Bowling)', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Level-08 Counter(07)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-040', 'POINDUS', 'VARIPOS-250', 'ICB0393P0019', 9, 'Level-01 (Aarong Side)', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Level-01 Counter(02)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-041', 'POINDUS', 'VARIPOS-250', 'ICB0393P0013', 9, 'Level-01 (Aarong Side)', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Level-01 Counter(03) Online', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-042', 'POINDUS', 'VARIPOS-250', 'ICB0393P0007', 9, 'Level-01 (Atrium)', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Shopping Mall Counter-03', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-043', 'POINDUS', 'VARIPOS-250', 'ICB0393P0015', 9, 'Level-01 (Atrium)', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Shopping Mall Counter-01', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PC-044', 'POINDUS', 'VARIPOS-250', 'ICB0393P0010', 9, 'Basement-01', NULL, 4, 'Celeron', '500GB', 0, 0, NULL, NULL, 'Basement-01 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-002', 'HP', 'Laserjet Pro M12a', 'VNCX541794', 4, 'Accounts Office', NULL, NULL, NULL, NULL, 0, 0, '279A', NULL, 'Akram Hossain Khan', 'DGM', NULL, 'Parvez', 2, 'Accounts', 1, NULL),
('PTR-003', 'HP', 'Laserjet Pro M402n', 'PHCFB04246', 4, 'Accounts Office', NULL, NULL, NULL, NULL, 0, 0, '26A', NULL, 'Accounts Common', NULL, NULL, 'Parvez', 2, 'Accounts', 1, NULL),
('PTR-004', 'HP', 'Laserjet Pro M404dn', 'PHFXG14234', 4, 'Accounts Office', NULL, NULL, NULL, NULL, 0, 0, '76A', NULL, 'Accounts Common', NULL, NULL, 'Parvez', 2, 'Accounts', 1, NULL),
('PTR-005', 'Bixolon', 'SRP 350III', 'DGS1DKA18050044', 4, 'Level-08', NULL, NULL, NULL, NULL, 0, 0, NULL, 650, 'Level-08 Counter(02)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-006', 'Canon', 'LBP3060w', 'NBJA314600', 4, 'Store Department (B-02)', NULL, NULL, NULL, NULL, 0, 0, '325A', NULL, 'Store Common', NULL, NULL, 'Parvez', 13, 'Store', 1, NULL),
('PTR-009', 'Bixolon', 'SRP 350III', 'DGS1DKA16040059', 4, 'Level-01 (Atrium)', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Shopping Mall Counter-04', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-010', 'Bixolon', 'SRP 350III', 'DGS1DKA20010008', 4, 'Level-10', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-10 Counter(01)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-011', 'Bixolon', 'SRP 350III', 'DGS1DKA18050006', 4, 'Level-10 (Bowling)', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-10 Counter(02)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-013', 'Lexmark', 'X-2650', '3001960000MD164844', 4, 'Store Department (B-02)', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Md. Akbar Ali', 'Jr. Officer', 242345, 'Parvez', 13, 'Store', 1, 'Only Scanner'),
('PTR-014', 'Bixolon', 'SRP 350III', 'DGS1DKA18050007', 4, 'Level-15', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-15 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-015', 'Bixolon', 'SRP 350III', 'DGS1DKA18050041', 4, 'Level-08 (Kids Bowling)', NULL, NULL, NULL, NULL, 0, 0, NULL, 650, 'Level-08 Counter(07)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-016', 'Bixolon', 'SRP 350III', 'DGS1DKA18050087', 4, 'Level-01 (Atrium)', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Shopping Mall Counter-02', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-018', 'Bixolon', 'SRP 350III', 'DGS1DKA18050008', 4, 'Level-18', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-18 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-019', 'Bixolon', 'SRP 350III', 'DGS1DKA16040084', 4, 'Level-08', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-08 Counter(05)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-021', 'Bixolon', 'SRP 350III', 'DGS1DKA18050088', 4, 'Level-09', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-09 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-022', 'Bixolon', 'SRP 350III', 'DGS1DKA19110039', 4, 'Level-11', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-11 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-024', 'Bixolon', 'SRP 350III', 'DGS1DKA16080074', 4, 'Level-01 (Aarong Side)', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-01 Counter(01)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-025', 'Bixolon', 'SRP 350III', 'DGS1DKA18050042', 4, 'Level-08', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-08 Counter(04)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-026', 'Bixolon', 'SRP 350III', 'DGS1DKA18050043', 4, 'Level-13', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-13 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-027', 'Bixolon', 'SRP 350III', 'DGS1DKA18050021', 4, 'Level-01 (Aarong Side)', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-01 Counter(03) Online', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-029', 'Bixolon', 'SRP 350III', 'DGS1DKA19110038', 4, 'Level-12', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-12 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-030', 'Bixolon', 'SRP 350III', 'DGS1DKA18050031', 4, 'Level-14', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-14 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-031', 'Bixolon', 'SRP 350III', 'DGS1DKA19110040', 4, 'Level-08 (Online)', NULL, NULL, NULL, NULL, 0, 0, NULL, 650, 'Level-08 Counter(06) Online', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-033', 'Bixolon', 'SRP 350III', 'DGS1DKA18050085', 4, 'Basement-01', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Basement-01 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-034', 'Bixolon', 'SRP 350III', 'DGS1DKA18050005', 4, 'Level-17', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-17 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-035', 'Bixolon', 'SRP 350III', 'DGS1DKA18050086', 4, 'Level-01 (Aarong Side)', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-01 Counter(02)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-036', 'Bixolon', 'SRP 350III', 'DGS1DKA20070005', 4, 'Level-08', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-08 Counter(03)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-037', 'Bixolon', 'SRP 350III', 'DGS1DKA17080059', 4, 'Level-08', NULL, NULL, NULL, NULL, 0, 0, NULL, 650, 'Level-08 Counter(01)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('PTR-038', 'Bixolon', 'SRP 350III', 'DGS1DKA18050029', 4, 'Level-16', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-16 Counter', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('UPS-002', 'Apollo', '1120', 'E2206056661', 7, 'Accounts Office', NULL, NULL, NULL, NULL, 0, 0, NULL, 1200, 'Md. Sahenur Rahman', 'Manager', 2060, 'Parvez', 2, 'Accounts', 1, NULL),
('UPS-006', 'Apollo', '1120', 'E2206056666', 7, 'Level-01 (Atrium)', NULL, NULL, NULL, NULL, 0, 0, NULL, 1200, 'Shopping Mall Counter-04', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 1, NULL),
('UPS-010', 'Maxgreen', 'MG-LI-EAP-650VA', 'E2009065612', 7, 'Accounts Office', NULL, NULL, NULL, NULL, 0, 0, NULL, 650, 'Akram Hossain Khan', 'DGM', NULL, 'Parvez', 2, 'Accounts', 1, NULL),
('UPS-011', 'Apollo', '1120F', '61200129', 7, 'Accounts Office', NULL, NULL, NULL, NULL, 0, 0, NULL, 1200, 'Md. Mizanur Rahman', 'Asst. Officer', 242342, 'Parvez', 2, 'Accounts', 1, NULL),
('UPS-013', 'Power Guard', 'PG 650 AOF', '1612240818', 7, 'Level-08', NULL, NULL, NULL, NULL, 0, 0, NULL, 650, 'Level-08 Counter(02)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 3, 'Need to Repair'),
('UPS-019', 'Apollo', '1120', 'E2206056662', 7, 'Accounts Office', NULL, NULL, NULL, NULL, 0, 0, NULL, 1200, 'Partha Sharathi Paul', 'Dy. Manager', 2079, 'Parvez', 2, 'Accounts', 1, NULL),
('UPS-020', 'Tronix', '650VA', 'C2416520350262', 7, 'Accounts Office', NULL, NULL, NULL, NULL, 0, 0, NULL, 650, 'Md. Maslur Hassan', 'Dy. Manager', 9003, 'Parvez', 2, 'Accounts', 1, NULL),
('UPS-022', 'Rahim Afrooz', '1000VA', 'B03I480006946A6', 7, 'Level-08 (Online)', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-08 Counter(06) Online', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 3, 'Need to Repair'),
('UPS-028', 'Power Guard', 'PG 650 AOF', '1612240817', 7, 'Level-08', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-08 Counter(03)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 2, 'Dameged'),
('UPS-035', 'Apollo', '1120', 'E2206054758', 7, 'Accounts Office', NULL, NULL, NULL, NULL, 0, 0, NULL, 1200, 'Md. Motalibe Hossain', 'Officer', 9176, 'Parvez', 2, 'Accounts', 1, NULL),
('UPS-042', 'Power Guard', 'PG 650 AOF', '1509090345', 7, 'Level-08', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-08 Counter(01)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 3, 'Need to Repair'),
('UPS-046', 'Prolink', 'PRO 700C', '518501151700683', 7, 'Level-08', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-08 Counter(05)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 3, 'Need to Repair'),
('UPS-049', 'Power Guard', 'PG 650 AOF', '1612240820', 7, 'Level-08 (Kids Bowling)', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'Level-08 Counter(07)', NULL, NULL, 'Parvez', 12, 'Toggi Fun World', 3, 'Need to Repair');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productss`
--

CREATE TABLE `tbl_productss` (
  `inv_id` varchar(30) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `sl_no` varchar(50) NOT NULL,
  `product_cat` varchar(20) NOT NULL,
  `location` varchar(20) DEFAULT NULL,
  `mon_size` float DEFAULT NULL,
  `ram` int(5) DEFAULT NULL,
  `processor` varchar(20) DEFAULT NULL,
  `hdd` varchar(10) DEFAULT NULL,
  `toner` varchar(10) DEFAULT NULL,
  `user` varchar(30) NOT NULL,
  `entry_user` varchar(30) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `dept` varchar(15) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_productss`
--

INSERT INTO `tbl_productss` (`inv_id`, `brand`, `model`, `sl_no`, `product_cat`, `location`, `mon_size`, `ram`, `processor`, `hdd`, `toner`, `user`, `entry_user`, `dept_id`, `dept`, `status`) VALUES
('DWR-001', 'DIGI', 'ABC', 'ADGE4321', '8', 'Level-01', 0, 0, '0', '0', '', 'Didar Sir', 'Parvez', 8, 'IT', 1),
('MON-01', 'Dell', 'dfaedf', '34325q2', '3', 'Level-01', 18.5, 0, NULL, '0', '', 'sujan-biswas', 'Parvez', 9, 'Mechanical', 1),
('PC-001', 'Dell', 'Optiplex 3046', '7GD587', '1', 'Level-01', 0, 2, 'Core i3', '500', '', 'Parvez', 'Parvez', 8, 'IT', 1),
('PTR-001', 'HP', 'Laserjet', '454dn', '4', 'Level-01', 0, 0, NULL, '0', '26A', 'khairul-hasan', 'Parvez', 8, 'IT', 1),
('UPS-001', 'da', 'dfaedf', '34325q2', '7', 'Level-02', 0, 0, NULL, '0', '', 'Shahrier Islam', 'Admin', 5, 'Civil', 1);

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
(87, '2022-11-14', 'fgdf', '005', 10, 6, 202202, 590, 2, 1180),
(88, '2022-11-14', 'ABC', '003', 3, 6, 202202, 590, 2, 1180),
(89, '2022-11-14', 'SDFD', '002', 3, 5, 202201, 500, 2, 1000),
(90, '2022-11-14', 'BCDL', '002', 10, 6, 202202, 590, 2, 1180),
(91, '2022-11-14', 'BCDL', '002', 10, 6, 202202, 590, 1, 590),
(93, '2022-11-14', 'dfc', '001', 10, 6, 202202, 590, 1, 590),
(95, '2022-11-14', 'fd', '003', 10, 6, 202202, 590, 1, 590),
(102, '2022-11-14', 'Akij', '004', 4, 6, 202202, 590, 2, 1180);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_summery`
--

CREATE TABLE `tbl_purchase_summery` (
  `id` int(11) NOT NULL,
  `pdate` date NOT NULL,
  `company` varchar(50) NOT NULL,
  `invoice` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `dis` float NOT NULL,
  `dis_amount` float NOT NULL,
  `grand_total` float NOT NULL,
  `pay` float NOT NULL,
  `due` float NOT NULL,
  `br_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_purchase_summery`
--

INSERT INTO `tbl_purchase_summery` (`id`, `pdate`, `company`, `invoice`, `total_quantity`, `total_price`, `dis`, `dis_amount`, `grand_total`, `pay`, `due`, `br_id`) VALUES
(4, '2022-11-14', 'BCDL', 2, 7, 2180, 15, 327, 1853, 2000, 147, 10),
(5, '2022-11-14', 'Akij', 4, 28, 6770, 20, 1354, 5416, 10000, 4584, 4);

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
(6, 5, 10, 35),
(8, 0, 10, 0),
(9, 6, 10, 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `pf` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `department` varchar(20) NOT NULL,
  `dpt_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`pf`, `name`, `designation`, `department`, `dpt_id`) VALUES
(11700207, 'Shahrier Islam', 'Officer', 'IT', 8),
(11900646, 'S Hasan', 'Asstt. Officer', 'IT', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_history`
--
ALTER TABLE `tbl_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD UNIQUE KEY `inv_id` (`inv_id`);

--
-- Indexes for table `tbl_productss`
--
ALTER TABLE `tbl_productss`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indexes for table `tbl_purchase_details`
--
ALTER TABLE `tbl_purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchase_summery`
--
ALTER TABLE `tbl_purchase_summery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`pf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_history`
--
ALTER TABLE `tbl_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_purchase_details`
--
ALTER TABLE `tbl_purchase_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tbl_purchase_summery`
--
ALTER TABLE `tbl_purchase_summery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `pf` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11900647;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
