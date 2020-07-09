-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2019 at 07:38 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saloon_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`customer_id`, `customer_name`, `address`, `mobile_no`) VALUES
(13, 'Ashrafuzzaman mollah', 'Sylhet', '01521578679'),
(14, 'Jawad', 'Mayarchor , Sylhet', '01714776688'),
(15, 'Nayeem', 'Mejortila, Sylhet', '01715195709'),
(16, 'Rahim', 'KhanishailGhat, Sylhet', '01625443366'),
(18, 'Mir Luthfur Rahman', 'Modina-Market, Sylhet', '01724455567'),
(19, 'Al-Mehdi Saadat Chowdhury', 'Sylhet', '01730440808'),
(20, 'Noushad Sojib', 'Sylhet', '01738610213'),
(21, 'Ahshan Habib', 'Sylhet', '01915796886'),
(22, 'Shahadat Parvez', 'Sylhet', '01634556677'),
(23, 'Mahbubur Rahman', 'Mejortila, Sylhet', '01768654980');

-- --------------------------------------------------------

--
-- Table structure for table `customer_service_info`
--

CREATE TABLE `customer_service_info` (
  `customer_service_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `voucher_no` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_provider_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_service_info`
--

INSERT INTO `customer_service_info` (`customer_service_id`, `date`, `voucher_no`, `service_id`, `service_provider_id`, `discount`) VALUES
(162, '2018-09-16', 140, 14, 13, 0),
(163, '2018-09-16', 140, 15, 19, 5),
(164, '2018-09-16', 141, 14, 17, 0),
(165, '2018-09-16', 142, 16, 20, 10),
(166, '2018-09-16', 143, 18, 18, 0),
(167, '2018-10-16', 144, 14, 13, 0),
(168, '2018-10-16', 144, 17, 20, 0),
(169, '2018-10-16', 145, 19, 17, 0),
(170, '2018-10-16', 145, 16, 19, 10),
(171, '2018-10-16', 146, 21, 17, 0),
(172, '2018-11-16', 147, 16, 20, 0),
(173, '2018-11-16', 148, 48, 18, 0),
(174, '2018-11-16', 149, 24, 20, 0),
(175, '2018-11-16', 149, 15, 20, 0),
(176, '2018-12-16', 150, 16, 18, 0),
(177, '2018-12-16', 150, 18, 13, 0),
(178, '2018-12-16', 151, 14, 13, 0),
(179, '2018-12-16', 151, 17, 17, 0),
(180, '2018-12-16', 152, 23, 20, 0),
(181, '2018-12-16', 152, 14, 17, 0),
(182, '2019-01-16', 153, 14, 17, 0),
(183, '2019-01-16', 154, 15, 18, 0),
(184, '2019-01-16', 155, 16, 17, 0),
(185, '2019-01-19', 156, 14, 13, 0),
(186, '2019-01-19', 156, 15, 17, 0),
(187, '2019-01-19', 157, 18, 18, 0),
(188, '2019-01-19', 157, 23, 18, 0),
(189, '2019-01-19', 158, 16, 18, 0),
(190, '2019-01-19', 159, 17, 17, 0),
(191, '2019-01-19', 160, 16, 17, 0),
(192, '2019-01-19', 160, 17, 20, 0),
(194, '2019-01-19', 161, 14, 13, 0),
(195, '2019-01-19', 161, 24, 17, 0),
(196, '2017-12-19', 162, 16, 20, 0),
(197, '2017-12-19', 162, 17, 20, 0),
(198, '2017-12-19', 163, 15, 18, 0),
(199, '2017-12-19', 163, 18, 13, 0),
(200, '2017-12-19', 164, 15, 13, 0),
(201, '2017-12-19', 164, 23, 13, 0),
(202, '2017-12-19', 165, 14, 17, 0),
(203, '2017-12-19', 165, 16, 20, 0),
(204, '2017-12-19', 166, 15, 20, 0),
(205, '2017-12-19', 166, 16, 18, 0),
(206, '2017-12-19', 167, 14, 13, 0),
(207, '2017-12-19', 167, 17, 17, 0),
(208, '2019-01-19', 168, 14, 17, 0),
(209, '2019-01-19', 168, 16, 18, 10),
(211, '2019-01-19', 169, 34, 17, 10),
(212, '2019-01-19', 169, 14, 18, 0),
(214, '2019-01-19', 170, 17, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `expenditure_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `rent` int(11) NOT NULL,
  `electricity_bill` int(11) NOT NULL,
  `blade` int(11) NOT NULL,
  `rezar` int(11) NOT NULL,
  `medicine` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`expenditure_id`, `date`, `rent`, `electricity_bill`, `blade`, `rezar`, `medicine`, `total`) VALUES
(9, '2018-09-16', 10000, 2000, 2000, 3000, 5000, 22000),
(10, '2018-10-16', 1000, 1500, 2000, 1500, 3000, 9000),
(11, '2018-11-16', 10000, 2000, 1500, 1500, 5000, 20000),
(12, '2018-12-16', 10000, 1500, 1500, 1500, 4000, 18500),
(13, '2019-01-17', 10000, 2000, 1500, 1500, 3000, 18000),
(14, '2017-12-19', 10000, 2000, 1500, 1500, 3000, 18000);

-- --------------------------------------------------------

--
-- Table structure for table `income_distribution`
--

CREATE TABLE `income_distribution` (
  `income_distribution_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `service_provider_id` int(11) NOT NULL,
  `total_income` int(20) NOT NULL,
  `60%_of_total_income` int(20) NOT NULL,
  `40%_of_total_income` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income_distribution`
--

INSERT INTO `income_distribution` (`income_distribution_id`, `date`, `service_provider_id`, `total_income`, `60%_of_total_income`, `40%_of_total_income`) VALUES
(36, '2018-09-16', 13, 50, 25, 25),
(37, '2018-09-16', 19, 76, 38, 38),
(38, '2018-09-16', 17, 50, 25, 25),
(39, '2018-09-16', 20, 900, 450, 450),
(40, '2018-09-16', 18, 30, 15, 15),
(41, '2018-10-16', 13, 50, 25, 25),
(42, '2018-10-16', 20, 50, 25, 25),
(43, '2018-10-16', 17, 350, 175, 175),
(44, '2018-10-16', 19, 900, 450, 450),
(45, '2018-11-16', 20, 1120, 560, 560),
(46, '2018-11-16', 18, 1200, 600, 600),
(47, '2018-12-16', 18, 1000, 500, 500),
(48, '2018-12-16', 13, 80, 40, 40),
(49, '2018-12-16', 17, 100, 50, 50),
(50, '2018-12-16', 20, 50, 25, 25),
(51, '2019-01-16', 17, 1050, 525, 525),
(52, '2019-01-16', 18, 80, 40, 40),
(53, '2019-01-19', 13, 100, 50, 50),
(54, '2019-01-19', 17, 1670, 835, 835),
(55, '2019-01-19', 18, 2030, 1015, 1015),
(56, '2019-01-19', 20, 100, 50, 50),
(57, '2017-12-19', 20, 2130, 1065, 1065),
(58, '2017-12-19', 18, 1080, 540, 540),
(59, '2017-12-19', 13, 210, 105, 105),
(60, '2017-12-19', 17, 100, 50, 50);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_code` int(11) NOT NULL,
  `service_name` varchar(30) NOT NULL,
  `service_type` varchar(15) NOT NULL,
  `price_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_code`, `service_name`, `service_type`, `price_rate`) VALUES
(14, 11, 'Hair cut', 'hair-cutting', 50),
(15, 12, 'Hair style', 'hair-cutting', 80),
(16, 13, 'Hair Straight', 'hair-cutting', 1000),
(17, 14, 'Hair conditionar', 'hair-cutting', 50),
(18, 15, 'Hair Shampoo', 'hair-cutting', 30),
(19, 16, 'Hair jel', 'hair-cutting', 50),
(20, 17, 'Hair cream', 'hair-cutting', 50),
(21, 18, 'Hair treatment', 'hair-cutting', 300),
(22, 19, 'Hair kushki', 'hair-cutting', 150),
(23, 21, 'Jel Shave', 'shaving', 50),
(24, 22, 'Foam Shave', 'shaving', 40),
(25, 23, 'Machine shave', 'shaving', 30),
(26, 24, 'Bilis shave', 'shaving', 150),
(27, 25, 'Normal Massag', 'shaving', 50),
(28, 26, 'oil massag', 'shaving', 100),
(29, 31, 'High Speet color', 'hair-coloring', 350),
(30, 32, 'Bigen color', 'hair-coloring', 500),
(31, 33, 'Flower color', 'hair-coloring', 300),
(32, 34, 'Super speet color', 'hair-coloring', 300),
(33, 35, 'Lubia color', 'hair-coloring', 300),
(34, 36, 'Dak brown color', 'hair-coloring', 500),
(35, 37, 'Light color', 'hair-coloring', 500),
(36, 38, 'Normal color', 'hair-coloring', 150),
(37, 41, 'Honey facial', 'facial', 150),
(38, 42, 'Fujian scarv', 'facial', 150),
(39, 43, 'Dab scarv', 'facial', 100),
(40, 44, 'YC scarv', 'facial', 150),
(41, 45, 'Mango scarv', 'facial', 100),
(42, 46, 'Cleanjar Milk', 'facial', 100),
(43, 47, 'Light chondon', 'facial', 150),
(44, 48, 'Golden SPA', 'facial', 200),
(45, 51, 'Facial-menu-package-1', 'facial-package', 300),
(46, 52, 'Facial-menu-package-2', 'facial-package', 600),
(47, 53, 'Facial-menu-package-3', 'facial-package', 800),
(48, 54, 'Facial-menu-package-4', 'facial-package', 1200),
(49, 55, 'Facial-menu-package-5', 'facial-package', 600),
(50, 56, 'Facial-menu-package-6', 'facial-package', 600);

-- --------------------------------------------------------

--
-- Table structure for table `service_provider`
--

CREATE TABLE `service_provider` (
  `service_provider_id` int(11) NOT NULL,
  `service_provider_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile_no` varchar(12) NOT NULL,
  `expertise` varchar(30) NOT NULL,
  `ref` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_provider`
--

INSERT INTO `service_provider` (`service_provider_id`, `service_provider_name`, `address`, `mobile_no`, `expertise`, `ref`) VALUES
(13, 'Juwal', 'Uposhohor', '01675443322', 'Hair-cutting', 'good'),
(17, 'Rayhan', 'Uposhohor', '01715445566', 'facial', 'good'),
(18, 'Juber', 'Sylhet', '01712667788', 'Shaving', 'Very good'),
(19, 'Korim', 'Uposhohor, Sylhet', '01977445588', 'facial', 'Good'),
(20, 'Anwar ', 'Uposhohor, Sylhet', '01672420420', 'Hair coloring', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(12) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_type`, `email`, `password`, `address`, `mobile_no`) VALUES
(6, 'Suhel Ahmed', 'owner', 'suhelahmed@gmail.com', '1234', 'Uposhohor , Sylhet', '01712677020'),
(7, 'moynul islam', 'manager', 'moynulislam@gmail.com', '5678', 'Uposhohor , Sylhet', '01715747322');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `voucher_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `payable_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`voucher_no`, `date`, `customer_id`, `total_amount`, `payable_amount`) VALUES
(140, '2018-09-16', 14, 130, 126),
(141, '2018-09-16', 23, 50, 50),
(142, '2018-09-16', 16, 1000, 900),
(143, '2018-09-16', 22, 30, 30),
(144, '2018-10-16', 20, 100, 100),
(145, '2018-10-16', 19, 1050, 950),
(146, '2018-10-16', 18, 300, 300),
(147, '2018-11-16', 14, 1000, 1000),
(148, '2018-11-16', 15, 1200, 1200),
(149, '2018-11-16', 23, 120, 120),
(150, '2018-12-16', 23, 1030, 1030),
(151, '2018-12-16', 22, 100, 100),
(152, '2018-12-16', 21, 100, 100),
(153, '2019-01-16', 16, 50, 50),
(154, '2019-01-16', 22, 80, 80),
(155, '2019-01-16', 13, 1000, 1000),
(156, '2019-01-19', 13, 130, 130),
(157, '2019-01-19', 19, 80, 80),
(158, '2019-01-19', 22, 1000, 1000),
(159, '2019-01-19', 20, 50, 50),
(160, '2019-01-19', 18, 1050, 1050),
(161, '2019-01-19', 21, 90, 90),
(162, '2017-12-19', 19, 1050, 1050),
(163, '2017-12-19', 23, 110, 110),
(164, '2017-12-19', 21, 130, 130),
(165, '2017-12-19', 20, 1050, 1050),
(166, '2017-12-19', 13, 1080, 1080),
(167, '2017-12-19', 18, 100, 100),
(168, '2019-01-19', 14, 1050, 950),
(169, '2019-01-19', 16, 550, 500),
(170, '2019-01-19', 15, 50, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_service_info`
--
ALTER TABLE `customer_service_info`
  ADD PRIMARY KEY (`customer_service_id`),
  ADD KEY `custom_voucher` (`voucher_no`),
  ADD KEY `customer's_service` (`service_id`),
  ADD KEY `customer's_server` (`service_provider_id`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`expenditure_id`);

--
-- Indexes for table `income_distribution`
--
ALTER TABLE `income_distribution`
  ADD PRIMARY KEY (`income_distribution_id`),
  ADD KEY `service_provider_income` (`service_provider_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `service_provider`
--
ALTER TABLE `service_provider`
  ADD PRIMARY KEY (`service_provider_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voucher_no`),
  ADD KEY `customer_voucher` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customer_service_info`
--
ALTER TABLE `customer_service_info`
  MODIFY `customer_service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `expenditure_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `income_distribution`
--
ALTER TABLE `income_distribution`
  MODIFY `income_distribution_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `service_provider`
--
ALTER TABLE `service_provider`
  MODIFY `service_provider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `voucher_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_service_info`
--
ALTER TABLE `customer_service_info`
  ADD CONSTRAINT `custom_voucher` FOREIGN KEY (`voucher_no`) REFERENCES `voucher` (`voucher_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer's_server` FOREIGN KEY (`service_provider_id`) REFERENCES `service_provider` (`service_provider_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer's_service` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `income_distribution`
--
ALTER TABLE `income_distribution`
  ADD CONSTRAINT `service_provider_income` FOREIGN KEY (`service_provider_id`) REFERENCES `service_provider` (`service_provider_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `customer_voucher` FOREIGN KEY (`customer_id`) REFERENCES `customer_info` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
