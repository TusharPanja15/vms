-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2021 at 09:47 AM
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
-- Database: `poject`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `date` varchar(12) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `gst_no` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `product` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `user_id`, `date`, `invoice_no`, `gst_no`, `name`, `business_name`, `email`, `address`, `contact_no`, `product`, `quantity`, `amount`, `payment_mode`, `payment_status`) VALUES
(2, 83, '02/02/2021', 'EGYTH', 'ERDTHSEESDEH', 'ETYHDS', '', '', '', 0, '', 0, 0, '', 0),
(3, 83, '02/02/2021', 'EGYTH', 'ERDTHSEESDEH', 'ETYHDS', '', '', '', 0, '', 0, 0, '', 0),
(4, 83, '02/02/2021', 'EGYTH', 'ERDTHSEESDEH', 'ETYHDS', '', '', '', 0, '', 0, 0, '', 0),
(5, 83, '02/02/2021', 'EGYTH', 'ERDTHSEESDEH', 'ETYHDS', '', '', '', 0, '', 0, 0, '', 0),
(6, 83, '02/02/2021', 'sdfgh', 'uytrewdfgh', 'sdfgfdsdf', '', '', '', 0, '', 0, 0, '', 0),
(7, 83, '02/02/2021', 'sdfgh', 'uytrewdfgh', 'sdfgfdsdf', '', '', '', 0, '', 0, 0, '', 0),
(8, 83, '02/02/2021', 'sdfgh', 'uytrewdfgh', 'sdfgfdsdf', '', '', '', 0, '', 0, 0, '', 0),
(9, 83, '02/02/2021', 'sdfgh', 'uytrewdfgh', 'sdfgfdsdf', '', '', '', 0, '', 0, 0, '', 0),
(10, 84, '02/04/2021', 'ertytrewe', 'wertyujytrewert', 'wertytre', 'ertyu', 'ertyu', 'drftyujk', 2345678, '', 4, 345, '', 1),
(12, 84, '02/04/2021', 'ertytrewe', 'wertyujytrewert', 'wertytre', 'ertyu', 'ertyu', 'drftyujk', 2345678, '', 4, 345, '', 1),
(13, 84, '02/04/2021', 'ertytrewe', 'wertyujytrewert', 'wertytre', 'ertyu', 'ertyu', 'drftyujk', 2345678, '', 4, 345, '', 1),
(14, 89, '02/10/2021', 'WSEDRTD', 'QWERT54RFTGYHGF', 'Will Smith', 'Google INC', 'google.com', 'Ensontie 1, 49420 Hamina, Finland', 2345678, '', 1, 12000, 'ONLINE', 1),
(15, 89, '02/10/2021', 'WSEDRTD', 'QWERT54RFTGYHGF', 'Will Smith', 'Google INC', 'google.com', 'Ensontie 1, 49420 Hamina, Finland', 2345678, '', 1, 12000, 'ONLINE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `user_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `product` text NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`user_id`, `product_id`, `product`, `quantity`, `price`) VALUES
(81, 3, 'tablet', 20, 1),
(83, 1, 'tv', 22, 22222),
(83, 2, 'mobile', 666, 432345);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `date` varchar(12) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `gst_no` varchar(16) NOT NULL,
  `name` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `product` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `user_id`, `date`, `invoice_no`, `gst_no`, `name`, `business_name`, `email`, `address`, `contact_no`, `product`, `quantity`, `amount`, `payment_mode`, `payment_status`) VALUES
(2, 83, '11', '1234567', '1234567890', 'QWERTYUIOP', 'qwertyuio', 'QWERTYUIOP', 'QWERTYUIOP', 1234567890, 'tv', 434, 98998, 'cash', 0),
(3, 83, '02/02/2021', '123456789', '0', 'QWERTYUI', 'WERTYUIO', '', 'WERTYUIO', 1234567890, 'mobile', 88, 87654, 'MMMM', 0),
(4, 83, '02/02/2021', '123456789', '0', 'QWERTYUI', 'WERTYUIO', '', 'WERTYUIO', 1234567890, 'mobile', 88, 87654, 'MMMM', 0),
(5, 83, '02/02/2021', '123456789', '0', 'QWERTYUI', 'WERTYUIO', '', 'WERTYUIO', 1234567890, 'mobile', 88, 87654, 'MMMM', 0),
(7, 83, '02/02/2021', '123456789', '0', 'QWERTYUI', 'WERTYUIO', '', 'WERTYUIO', 1234567890, 'mobile', 88, 87654, 'MMMM', 0),
(8, 83, '02/02/2021', '123456789', '0', 'QWERTYUI', 'WERTYUIO', '', 'WERTYUIO', 1234567890, 'mobile', 88, 87654, 'MMMM', 0),
(9, 83, '02/02/2021', '123456789', '0', 'QWERTYUI', 'WERTYUIO', '', 'WERTYUIO', 1234567890, 'mobile', 88, 87654, 'MMMM', 0),
(10, 83, '02/02/2021', '123456789', '0', 'QWERTYUI', 'WERTYUIO', '', 'WERTYUIO', 1234567890, 'mobile', 88, 87654, 'MMMM', 0),
(11, 83, '02/02/2021', '12345654', '0', 'WSERTY', 'SDFGH', '', 'SDFGHJ', 2147483647, 'tv', 23, 123456, 'XSS', 0),
(12, 83, '02/02/2021', '12345654', '0', 'WSERTY', 'SDFGH', '', 'SDFGHJ', 2147483647, 'tv', 23, 123456, 'XSS', 0),
(13, 83, '02/03/2021', '123456789', '0', 'qwertyuiop', 'wertyui', '', 'wertyuio', 1234567890, 'tv', 3, 765432, 'cash', 0),
(14, 83, '02/03/2021', '123456789', '0', 'qwertyuiop', 'wertyui', '', 'wertyuio', 1234567890, 'tv', 3, 765432, 'cash', 0),
(15, 83, '02/04/2021', 'SWERTY', 'QWERTYUIUYT', 'WERTYUYTR', '', '', '', 0, '', 0, 0, '', 0),
(16, 83, '02/04/2021', 'SWERTY', 'QWERTYUIUYT', 'WERTYUYTR', '', '', '', 0, '', 0, 0, '', 0),
(17, 83, '02/02/2021', 'SDFGGS', 'QWERTYIUYTYF', 'SDGFHDDJ', '', '', '', 0, '', 0, 0, '', 0),
(18, 83, '02/02/2021', 'SDFGGS', 'QWERTYIUYTYF', 'SDGFHDDJ', '', '', '', 0, '', 0, 0, '', 0),
(19, 83, '02/02/2021', 'SDFGGS', 'QWERTYIUYTYF', 'SDGFHDDJ', '', '', '', 0, '', 0, 0, '', 0),
(20, 83, '02/02/2021', 'SDFGGS', 'QWERTYIUYTYF', 'SDGFHDDJ', '', '', '', 0, '', 0, 0, '', 0),
(21, 84, '02/05/2021', 'LLL/25TG/YRUD', 'QWERTYUIOPHGFD', 'Mr. Rakesh', 'Pataka Industries Pvt Ltd', '', '', 987654321, 'Packing Materials', 201, 29000, 'NEFT', 0),
(22, 84, '02/05/2021', 'LLL/25TG/YRUD', 'QWERTYUIOPHGFD', 'Mr. Rakesh', 'Pataka Industries Pvt Ltd', '', '', 987654321, 'Packing Materials', 201, 29000, 'NEFT', 0),
(23, 84, '02/17/2021', 'asdfghgfd', 'qwertyui89o', 'asdf', '', '', '', 2345678, '', 0, 0, '', 0),
(24, 84, '02/17/2021', 'asdfghgfd', 'qwertyui89o', 'asdf', '', '', '', 2345678, '', 0, 0, '', 0),
(25, 84, '02/03/2021', 'azsxdcfghjk', 'asdfghjedrftgyh', 'dfghj', '', 'qwertyuiop', '', 0, '', 0, 0, '', 0),
(26, 84, '02/03/2021', 'azsxdcfghjk', 'asdfghjedrftgyh', 'dfghj', '', 'qwertyuiop', '', 0, '', 0, 0, '', 0),
(27, 84, '02/02/2021', 'sdfgtrert', 'sderftgyhujytrs', 'sdfgdfg', '', 'srdtyfgujuytrhtjyj', 'esrdtyuytrytjeykruyjt', 234567, '', 0, 0, '', 0),
(28, 84, '02/02/2021', 'sdfgtrert', 'sderftgyhujytrs', 'sdfgdfg', '', 'srdtyfgujuytrhtjyj', 'esrdtyuytrytjeykruyjt', 234567, '', 0, 0, '', 0),
(29, 84, '02/02/2021', 'sdfgtrert', 'sderftgyhujytrs', 'sdfgdfg', '', 'srdtyfgujuytrhtjyj', 'esrdtyuytrytjeykruyjt', 234567, '', 0, 0, '', 0),
(30, 84, '02/02/2021', 'sdfgtrert', 'sderftgyhujytrs', 'sdfgdfg', '', 'srdtyfgujuytrhtjyj', 'esrdtyuytrytjeykruyjt', 234567, '', 0, 0, '', 0),
(32, 84, '02/03/2021', 'fgsdfgfdfg', 'sdfgfdfghgfdfgh', 'sdfgfds', 'werf', 'sdfghj', 'sdfgf', 123456789, '', 0, 0, '', 0),
(33, 84, '02/02/2021', 'sdfghy', 'edrtyuiygtfd', 'sdftgyhujik', 'ertyuytfrd', 'sdfghjhgfd', 'sdfghjhgf', 987654000, 'werty', 1234, 6543, 'wert', 0),
(34, 84, '02/02/2021', 'sdfghy', 'edrtyuiygtfd', 'sdftgyhujik', 'ertyuytfrd', 'sdfghjhgfd', 'sdfghjhgf', 987654000, 'werty', 1234, 6543, 'wert', 0),
(36, 89, '13-2-2021', 'WER/889/IU', 'QWERTYUIOPL9IU', 'Bobby Kotick', 'Activision Blizzard', 'Activision.com', '3100 Ocean Park Blvd, Santa Monica, CA 90405, United States', 131025520, 'COD Points', 26000, 8501, 'ONLINE', 1),
(37, 89, '1/2/2021', 'QWER/221/REF', 'POIUY564CVGJHVFV', 'Mr Ghosh', 'Pataka Industries Pvt Ltd', 'PP@pp.com', '36, Gagan Vihar, Krishna Nagar, Delhi, 110051', 1234567890, 'Brushless Motors', 200, 24900, 'CHECQUE', 1),
(38, 89, '31/1/2021', 'URYETWR/56URFTGR', 'POIU5676YRE8YTRE', 'Mr. Will', 'Google INC', 'google.com', 'Ensontie 1, 49420 Hamina, Finland', 123456746, 'Hard Drives 2TB', 1200, 590200, 'ONLINE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `tbl_attendance_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `attend` varchar(255) NOT NULL,
  `att_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`tbl_attendance_id`, `user_id`, `employee_id`, `attend`, `att_time`) VALUES
(1, 83, '1234567', 'present', '2021-02-02'),
(2, 83, '1234567', 'present', '0000-00-00'),
(3, 83, '123456666', 'present', '0000-00-00'),
(4, 83, 'addd3', 'absent', '0000-00-00'),
(6, 83, 'adc12', 'absent', '0000-00-00'),
(8, 83, '1234567890', 'absent', '2021-02-12'),
(9, 83, '1234567', 'absent', '2021-02-12'),
(10, 83, '123456666', 'absent', '2021-02-12'),
(11, 83, 'addd3', 'absent', '2021-02-12'),
(12, 83, 'adc12', 'absent', '2021-02-12'),
(13, 83, '234567', 'present', '0000-00-00'),
(14, 83, '4334', '', '0000-00-00'),
(15, 83, '123', '', '2021-02-12'),
(16, 84, 'AS233', 'present', '2021-02-13'),
(17, 84, 'AB112', 'absent', '2021-02-13'),
(18, 84, 'C123D', 'absent', '2021-02-13'),
(19, 84, 'B222', 'present', '2021-02-13'),
(20, 84, 'N22M4', 'present', '2021-02-13'),
(21, 89, 'ASD122', 'present', '2021-02-14'),
(22, 89, 'ASFG32', 'absent', '2021-02-14'),
(23, 89, 'ASFG3R', 'present', '2021-02-14'),
(24, 89, 'ASFG32I', 'present', '2021-02-14'),
(25, 89, 'HGD33', 'absent', '2021-02-14'),
(27, 89, 'AWW22', 'absent', '2021-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `employee_tbl_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`employee_tbl_id`, `user_id`, `name`, `employee_id`) VALUES
(1, 83, 'Tusar', '1234567890'),
(2, 74, 'wertyu', '12345'),
(4, 83, 'qwertyui', '1234567'),
(5, 83, 'tuuuu', '123456666'),
(6, 83, 'raj', 'addd3'),
(7, 83, 'Raj', 'adc12'),
(8, 83, 'new', '234567'),
(9, 83, 'mok', '4334'),
(10, 83, 'set', '123'),
(11, 84, 'Tushar', 'AS233'),
(12, 84, 'John', 'AB112'),
(13, 84, 'Dennis', 'C123D'),
(14, 84, 'Mohan', 'B222'),
(15, 84, 'Pandey', 'N22M4'),
(16, 89, 'Danney', 'ASD122'),
(17, 89, 'Victor', 'ASFG32'),
(18, 89, 'Tushar', 'ASFG3R'),
(19, 89, 'Neil', 'ASFG32I'),
(20, 89, 'John', 'HGD33'),
(21, 89, 'Dany', 'AWW22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `date of creation` datetime NOT NULL,
  `first name` text NOT NULL,
  `last name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `date of creation`, `first name`, `last name`, `email`, `password`) VALUES
(64, '0000-00-00 00:00:00', 'qwert', 'y', 'qwert@qwert', 'q'),
(65, '0000-00-00 00:00:00', 'thersg', 'ds', 'yjrhtdz@reagfv', '4560ffd9d0c650e397be819da301cd40'),
(66, '0000-00-00 00:00:00', 'gerth', 'edth', 'sgrsgdgh@gredfgd', '1d0967ea90b511c3cdc02d22507b98f9'),
(67, '0000-00-00 00:00:00', 'thfggfg', 'rtt', 'gdr@thfdgf', '127744158e4139f2db20c99c1f070c70'),
(68, '2020-11-06 11:48:44', 'w', 'w', 'dfgfds@rew', 'f2fd3303b143a4a4d5dc74409372134a'),
(69, '2020-11-06 12:48:18', 'w', 'w', 'gfd@eww', 'w'),
(70, '2020-11-06 12:52:15', 'q', 'q', 'hgfdsa@tyui', 'q'),
(71, '2020-11-06 12:54:56', 'wert', 'fgds', 'dfghgfds@werty', 'w'),
(72, '2020-11-06 13:53:41', 'w', 'w', 'fhtd@shdgh', '1ed1b8330e7726b22d8d4bf96fcf2924'),
(73, '2020-11-07 14:43:21', 'qert', 'trewq', 'qwer@fdsa', 'a0600d8e9a2632b4682032fb986abe5f'),
(74, '2020-11-07 16:35:07', 'Raj', 'Panja', 'Raj@15raj.com', '65345df44cd41c18e142d376a14385bf'),
(75, '2021-01-05 07:54:53', 'trew', 'wer', 'qwerty@qwerty', 'bcc6f25267c76ec40b2d716b0b3f9db7'),
(76, '2021-01-05 07:55:22', 'wertyui', 'ytrew', 'poiuytrew@oiuytre', '1319041b5dda67dd8a5a0ce0b5eb9973'),
(77, '2021-01-05 12:19:09', 'raaj', 'ffff', 'ttt@tttytt', 'a44a6fb21e64f9f014019948fb89c150'),
(78, '2021-01-06 13:01:57', 'Tushar', 'Panja', 'tushar@raj', 'e34b0e6f6f6d0cad84bf79e40f9c109e'),
(79, '2021-01-07 09:08:10', 'qwertyui', 'wertyu', 'rtyu@sdfghj', '43037c1016b52f08439001b348004062'),
(80, '2021-01-09 06:34:11', 'raj', 'raj', '5rsddg@fhgfg', 'd47524f75777a91e687ec5dc03932333'),
(81, '2021-01-09 07:59:58', 'qqq', 'qqq', 'wertyu@rf', '883540d9a0fa9dd41414399756e1e9b9'),
(82, '2021-01-12 12:13:39', 'rrr', 'trrtr', 'raj@rrrrr', '172bd6d20ade89c5de40ec9f6506d47b'),
(83, '2021-02-10 07:23:44', 'Raj', '!5', 'raaaa@raaa.com', 'afd63fe3e813db5d4e032dc5e28482ef'),
(84, '2021-02-13 05:44:35', 'Raj', 'Admin', 'admin@gmail.com', 'd7902c90979cc8a8d1b23f9b2c1413fa'),
(85, '2021-02-13 10:50:47', 'Raj', 'Admin', 'raj@admin.com', '0bf56b0564c4079ed1cd403ec8627663'),
(86, '2021-02-13 10:54:45', 'admin', 'raj', 'admin@admin.in', 'e7c1f0fc5bbfd9e801f779295f1b3563'),
(87, '2021-02-13 10:55:17', 't', 't', 't@t.com', 'd74e340b1115db89cf9a533d08717c7f'),
(89, '2021-02-13 17:49:09', 'Raj', 'Panja', 'main@main.com', 'efe40c62b8691f9168286a145350d8db');

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE `users_details` (
  `id` int(11) NOT NULL,
  `date of creation` datetime NOT NULL,
  `email` text NOT NULL,
  `first name` text NOT NULL,
  `last name` text NOT NULL,
  `contact no` int(10) NOT NULL,
  `company name` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_details`
--

INSERT INTO `users_details` (`id`, `date of creation`, `email`, `first name`, `last name`, `contact no`, `company name`, `address`, `city`, `state`, `zip`) VALUES
(5, '0000-00-00 00:00:00', '', '', '', 23456789, 'iuytredfgh', 'bgrdcvt564465yjhv', 'hjtdhgn', 'Kargil', 987658),
(6, '0000-00-00 00:00:00', '', '', '', 2147483647, 'arsf', '1234 utrhbs432 3434346 Karnataka 098765 ', '', '', 0),
(7, '2020-11-06 12:48:18', 'gfd@eww', 'w', 'w', 0, '', '', '', '', 0),
(8, '2020-11-06 12:52:15', 'hgfdsa@tyui', 'q', 'q', 0, '', '', '', '', 0),
(9, '2020-11-06 12:54:56', 'dfghgfds@werty', 'wert', 'fgds', 0, '', '', '', '', 0),
(10, '2020-11-06 13:53:41', 'fhtd@shdgh', 'w', 'w', 0, '', '', '', '', 0),
(11, '2020-11-07 14:43:21', 'qwer@fdsa', 'qert', 'trewq', 987654321, 'abcd', 'heeeee', 'ooooo', 'West Bengal', 98765),
(12, '2020-11-07 16:35:07', 'Raj@15raj.com', 'Raj', 'Panja', 987654321, 'wertyuio', 'ytrewwerty', 'erbvcf5432', 'Chandigarh', 123456),
(13, '2021-01-05 07:54:53', 'qwerty@qwerty', 'trew', 'wer', 0, '', '', '', '', 0),
(14, '2021-01-05 07:55:22', 'poiuytrew@oiuytre', 'wertyui', 'ytrew', 0, '', '', '', '', 0),
(15, '2021-01-05 12:19:09', 'ttt@tttytt', 'raaj', 'ffff', 0, '', '', '', '', 0),
(16, '2021-01-06 13:01:57', 'tushar@raj', 'Tushar', 'Panja', 0, '', '', '', '', 0),
(17, '2021-01-07 09:08:10', 'rtyu@sdfghj', 'qwertyui', 'wertyu', 0, '', '', '', '', 0),
(18, '2021-01-09 06:34:11', '5rsddg@fhgfg', 'raj', 'raj', 0, '', '', '', '', 0),
(19, '2021-01-09 07:59:58', 'wertyu@rf', 'qqq', 'qqq', 0, '', '', '', '', 0),
(20, '2021-01-12 12:13:39', 'raj@rrrrr', 'rrr', 'trrtr', 0, '', '', '', '', 0),
(21, '2021-02-10 07:23:44', 'raaaa@raaa.com', 'Raj', '!5', 0, '', '', '', '', 0),
(22, '2021-02-13 05:44:35', 'admin@gmail.com', 'Raj', 'Admin', 1234567890, 'AWS Pvt Ltd', 'Orange StreetBlock-22A', 'Napur', 'Maharashtra', 220192),
(23, '2021-02-13 10:50:47', 'raj@admin.com', 'Raj', 'Admin', 0, '', '', '', '', 0),
(24, '2021-02-13 10:54:45', 'admin@admin.in', 'admin', 'raj', 0, '', '', '', '', 0),
(25, '2021-02-13 10:55:17', 't@t.com', 't', 't', 0, '', '', '', '', 0),
(26, '2021-02-13 17:49:09', 'main@main.com', 'Raj', 'Panja', 0, '', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`tbl_attendance_id`,`user_id`,`employee_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`employee_tbl_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_details`
--
ALTER TABLE `users_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `tbl_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `employee_tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `users_details`
--
ALTER TABLE `users_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD CONSTRAINT `tbl_attendance_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD CONSTRAINT `tbl_employee_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
