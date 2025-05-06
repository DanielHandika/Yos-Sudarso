-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2022 at 05:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spppintar`
--

-- --------------------------------------------------------

--
-- Table structure for table `backset`
--

CREATE TABLE `backset` (
  `url` varchar(100) NOT NULL,
  `sessiontime` varchar(4) DEFAULT NULL,
  `footer` varchar(50) DEFAULT NULL,
  `themesback` varchar(2) DEFAULT NULL,
  `responsive` varchar(2) DEFAULT NULL,
  `app` varchar(20) NOT NULL,
  `harihapus` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backset`
--

INSERT INTO `backset` (`url`, `sessiontime`, `footer`, `themesback`, `responsive`, `app`, `harihapus`) VALUES
('http://localhost:8080/spppintar', '1001', 'SPP PINTAR', '1', '0', 'SPP Pintar', 7);

-- --------------------------------------------------------

--
-- Table structure for table `bebasan`
--

CREATE TABLE `bebasan` (
  `no` int(10) NOT NULL,
  `period_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `jenis_id` int(10) NOT NULL,
  `bill` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `sudahbayar` int(10) NOT NULL,
  `kasir` varchar(100) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bebasan`
--

INSERT INTO `bebasan` (`no`, `period_id`, `student_id`, `jenis_id`, `bill`, `status`, `sudahbayar`, `kasir`, `tgl_input`) VALUES
(1, 1, 2, 1, 300000, 'belum', 20000, 'admin', '2022-06-26'),
(2, 1, 3, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(3, 1, 4, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(4, 1, 5, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(5, 1, 6, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(6, 1, 7, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(7, 1, 8, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(8, 1, 9, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(9, 1, 10, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(10, 1, 11, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(11, 1, 12, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(12, 1, 13, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(13, 1, 15, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(14, 1, 16, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(15, 1, 17, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(16, 1, 18, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(17, 1, 19, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(18, 1, 20, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(19, 1, 21, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(20, 1, 22, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(21, 1, 23, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(22, 1, 24, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(23, 1, 25, 1, 300000, 'belum', 0, 'admin', '2022-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `bebasan_pay`
--

CREATE TABLE `bebasan_pay` (
  `no` int(10) NOT NULL,
  `bebasan_id` int(10) NOT NULL,
  `period_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `kasir` varchar(100) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `sisa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bebasan_pay`
--

INSERT INTO `bebasan_pay` (`no`, `bebasan_id`, `period_id`, `student_id`, `tanggal`, `kasir`, `jumlah`, `sisa`) VALUES
(1, 1, 1, 2, '2022-06-26', 'admin', 20000, 280000);

-- --------------------------------------------------------

--
-- Table structure for table `bulanan`
--

CREATE TABLE `bulanan` (
  `no` int(10) NOT NULL,
  `period_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `jenis_id` int(10) NOT NULL,
  `month_id` int(10) NOT NULL,
  `bulanan_bill` int(10) NOT NULL,
  `bulanan_status` varchar(10) NOT NULL,
  `bulanan_bayar` int(10) NOT NULL,
  `kasir` varchar(100) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulanan`
--

INSERT INTO `bulanan` (`no`, `period_id`, `student_id`, `jenis_id`, `month_id`, `bulanan_bill`, `bulanan_status`, `bulanan_bayar`, `kasir`, `tgl_input`) VALUES
(1, 1, 2, 2, 1, 300000, 'sudah', 300000, 'admin', '2022-06-26'),
(2, 1, 2, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(3, 1, 2, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(4, 1, 2, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(5, 1, 2, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(6, 1, 2, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(7, 1, 2, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(8, 1, 2, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(9, 1, 2, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(10, 1, 2, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(11, 1, 2, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(12, 1, 2, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(13, 1, 3, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(14, 1, 3, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(15, 1, 3, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(16, 1, 3, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(17, 1, 3, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(18, 1, 3, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(19, 1, 3, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(20, 1, 3, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(21, 1, 3, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(22, 1, 3, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(23, 1, 3, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(24, 1, 3, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(25, 1, 4, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(26, 1, 4, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(27, 1, 4, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(28, 1, 4, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(29, 1, 4, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(30, 1, 4, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(31, 1, 4, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(32, 1, 4, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(33, 1, 4, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(34, 1, 4, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(35, 1, 4, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(36, 1, 4, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(37, 1, 5, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(38, 1, 5, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(39, 1, 5, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(40, 1, 5, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(41, 1, 5, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(42, 1, 5, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(43, 1, 5, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(44, 1, 5, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(45, 1, 5, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(46, 1, 5, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(47, 1, 5, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(48, 1, 5, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(49, 1, 6, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(50, 1, 6, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(51, 1, 6, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(52, 1, 6, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(53, 1, 6, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(54, 1, 6, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(55, 1, 6, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(56, 1, 6, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(57, 1, 6, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(58, 1, 6, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(59, 1, 6, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(60, 1, 6, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(61, 1, 7, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(62, 1, 7, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(63, 1, 7, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(64, 1, 7, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(65, 1, 7, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(66, 1, 7, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(67, 1, 7, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(68, 1, 7, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(69, 1, 7, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(70, 1, 7, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(71, 1, 7, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(72, 1, 7, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(73, 1, 8, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(74, 1, 8, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(75, 1, 8, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(76, 1, 8, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(77, 1, 8, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(78, 1, 8, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(79, 1, 8, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(80, 1, 8, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(81, 1, 8, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(82, 1, 8, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(83, 1, 8, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(84, 1, 8, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(85, 1, 9, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(86, 1, 9, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(87, 1, 9, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(88, 1, 9, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(89, 1, 9, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(90, 1, 9, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(91, 1, 9, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(92, 1, 9, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(93, 1, 9, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(94, 1, 9, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(95, 1, 9, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(96, 1, 9, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(97, 1, 10, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(98, 1, 10, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(99, 1, 10, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(100, 1, 10, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(101, 1, 10, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(102, 1, 10, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(103, 1, 10, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(104, 1, 10, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(105, 1, 10, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(106, 1, 10, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(107, 1, 10, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(108, 1, 10, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(109, 1, 11, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(110, 1, 11, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(111, 1, 11, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(112, 1, 11, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(113, 1, 11, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(114, 1, 11, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(115, 1, 11, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(116, 1, 11, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(117, 1, 11, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(118, 1, 11, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(119, 1, 11, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(120, 1, 11, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(121, 1, 12, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(122, 1, 12, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(123, 1, 12, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(124, 1, 12, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(125, 1, 12, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(126, 1, 12, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(127, 1, 12, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(128, 1, 12, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(129, 1, 12, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(130, 1, 12, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(131, 1, 12, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(132, 1, 12, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(133, 1, 13, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(134, 1, 13, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(135, 1, 13, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(136, 1, 13, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(137, 1, 13, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(138, 1, 13, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(139, 1, 13, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(140, 1, 13, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(141, 1, 13, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(142, 1, 13, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(143, 1, 13, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(144, 1, 13, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(145, 1, 15, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(146, 1, 15, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(147, 1, 15, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(148, 1, 15, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(149, 1, 15, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(150, 1, 15, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(151, 1, 15, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(152, 1, 15, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(153, 1, 15, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(154, 1, 15, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(155, 1, 15, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(156, 1, 15, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(157, 1, 16, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(158, 1, 16, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(159, 1, 16, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(160, 1, 16, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(161, 1, 16, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(162, 1, 16, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(163, 1, 16, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(164, 1, 16, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(165, 1, 16, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(166, 1, 16, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(167, 1, 16, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(168, 1, 16, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(169, 1, 17, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(170, 1, 17, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(171, 1, 17, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(172, 1, 17, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(173, 1, 17, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(174, 1, 17, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(175, 1, 17, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(176, 1, 17, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(177, 1, 17, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(178, 1, 17, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(179, 1, 17, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(180, 1, 17, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(181, 1, 18, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(182, 1, 18, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(183, 1, 18, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(184, 1, 18, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(185, 1, 18, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(186, 1, 18, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(187, 1, 18, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(188, 1, 18, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(189, 1, 18, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(190, 1, 18, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(191, 1, 18, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(192, 1, 18, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(193, 1, 19, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(194, 1, 19, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(195, 1, 19, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(196, 1, 19, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(197, 1, 19, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(198, 1, 19, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(199, 1, 19, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(200, 1, 19, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(201, 1, 19, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(202, 1, 19, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(203, 1, 19, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(204, 1, 19, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(205, 1, 20, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(206, 1, 20, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(207, 1, 20, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(208, 1, 20, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(209, 1, 20, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(210, 1, 20, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(211, 1, 20, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(212, 1, 20, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(213, 1, 20, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(214, 1, 20, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(215, 1, 20, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(216, 1, 20, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(217, 1, 21, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(218, 1, 21, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(219, 1, 21, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(220, 1, 21, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(221, 1, 21, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(222, 1, 21, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(223, 1, 21, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(224, 1, 21, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(225, 1, 21, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(226, 1, 21, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(227, 1, 21, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(228, 1, 21, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(229, 1, 22, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(230, 1, 22, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(231, 1, 22, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(232, 1, 22, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(233, 1, 22, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(234, 1, 22, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(235, 1, 22, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(236, 1, 22, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(237, 1, 22, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(238, 1, 22, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(239, 1, 22, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(240, 1, 22, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(241, 1, 23, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(242, 1, 23, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(243, 1, 23, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(244, 1, 23, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(245, 1, 23, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(246, 1, 23, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(247, 1, 23, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(248, 1, 23, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(249, 1, 23, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(250, 1, 23, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(251, 1, 23, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(252, 1, 23, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(253, 1, 24, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(254, 1, 24, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(255, 1, 24, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(256, 1, 24, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(257, 1, 24, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(258, 1, 24, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(259, 1, 24, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(260, 1, 24, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(261, 1, 24, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(262, 1, 24, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(263, 1, 24, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(264, 1, 24, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26'),
(265, 1, 25, 2, 1, 300000, 'belum', 0, 'admin', '2022-06-26'),
(266, 1, 25, 2, 2, 300000, 'belum', 0, 'admin', '2022-06-26'),
(267, 1, 25, 2, 3, 300000, 'belum', 0, 'admin', '2022-06-26'),
(268, 1, 25, 2, 4, 300000, 'belum', 0, 'admin', '2022-06-26'),
(269, 1, 25, 2, 5, 300000, 'belum', 0, 'admin', '2022-06-26'),
(270, 1, 25, 2, 6, 300000, 'belum', 0, 'admin', '2022-06-26'),
(271, 1, 25, 2, 7, 300000, 'belum', 0, 'admin', '2022-06-26'),
(272, 1, 25, 2, 8, 300000, 'belum', 0, 'admin', '2022-06-26'),
(273, 1, 25, 2, 9, 300000, 'belum', 0, 'admin', '2022-06-26'),
(274, 1, 25, 2, 10, 300000, 'belum', 0, 'admin', '2022-06-26'),
(275, 1, 25, 2, 11, 300000, 'belum', 0, 'admin', '2022-06-26'),
(276, 1, 25, 2, 12, 300000, 'belum', 0, 'admin', '2022-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `chmenu`
--

CREATE TABLE `chmenu` (
  `userjabatan` varchar(20) NOT NULL,
  `menu1` varchar(1) DEFAULT NULL,
  `menu2` varchar(1) DEFAULT NULL,
  `menu3` varchar(1) DEFAULT '0',
  `menu4` varchar(1) DEFAULT '0',
  `menu5` varchar(1) DEFAULT '0',
  `menu6` varchar(1) DEFAULT '0',
  `menu7` varchar(1) DEFAULT '0',
  `menu8` varchar(1) DEFAULT '0',
  `menu9` varchar(1) DEFAULT '0',
  `menu10` varchar(1) DEFAULT '0',
  `menu11` varchar(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chmenu`
--

INSERT INTO `chmenu` (`userjabatan`, `menu1`, `menu2`, `menu3`, `menu4`, `menu5`, `menu6`, `menu7`, `menu8`, `menu9`, `menu10`, `menu11`) VALUES
('admin', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4'),
('Karyawan', '4', '5', '4', '3', '3', '2', '3', '5', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `no` int(10) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`no`, `kelas`, `status`) VALUES
(1, 'X(A)', 'active'),
(2, 'X B', 'active'),
(3, 'Xi A', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `nama` varchar(100) DEFAULT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `notelp` varchar(20) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `web` varchar(100) NOT NULL,
  `npwp` varchar(100) NOT NULL,
  `avatar` varchar(150) NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`nama`, `tagline`, `alamat`, `notelp`, `signature`, `email`, `web`, `npwp`, `avatar`, `no`) VALUES
('SMA FYMA MEDIA NUSANTARA 1', 'Profesional Terpercaya', 'jalan Ngurah Rai no.8 , Denpasar, Bali', '02100110011', 'Tut Wuri Handayani', 'fyma@gmail.com', 'www.fymamedia/demo.com', '19171171718171', 'upload/image/tut wuri.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(1, 'aaa', '#64C5b1', '2022-06-19 08:03:43', '2022-06-19 08:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `event_colors`
--

CREATE TABLE `event_colors` (
  `no` int(10) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `kodewarna` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_colors`
--

INSERT INTO `event_colors` (`no`, `warna`, `kodewarna`) VALUES
(1, 'Upacara', '#64C5B1'),
(2, 'Pengumuman', '#34D3EB'),
(3, 'Kelulusan', '#32C861'),
(4, 'Pembayaran', '#FFA91C'),
(5, 'Ujian', '#5553CE'),
(6, 'Penting', '#F96A74'),
(7, 'Festival', '#F06292'),
(10, 'Liburan', '#313A46'),
(12, 'TEs', '#64C5b1');

-- --------------------------------------------------------

--
-- Table structure for table `graduation`
--

CREATE TABLE `graduation` (
  `grad_id` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `nama` varchar(100) DEFAULT NULL,
  `userid` int(10) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`nama`, `userid`, `avatar`, `tanggal`, `isi`, `id`) VALUES
('admin', 24, 'upload/image/placeholder.png', '2022-06-20', '<h1>Pengumuman baru:</h1><p>hanya beli di tokopedia.com/warungebook</p><p><br></p><p>Pastikan beli original</p><p><br></p><p>AAAA</p><p></p>                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `kode` varchar(20) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kode`, `nama`, `no`) VALUES
('0001', 'admin', 30),
('0003', 'Karyawan', 31);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bayar`
--

CREATE TABLE `jenis_bayar` (
  `jenis_id` int(10) NOT NULL,
  `period_id` int(10) NOT NULL,
  `pos_bayar_id` int(10) NOT NULL,
  `jenis_pembayaran` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tahunajar` varchar(10) NOT NULL,
  `update_time` date NOT NULL,
  `create_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_bayar`
--

INSERT INTO `jenis_bayar` (`jenis_id`, `period_id`, `pos_bayar_id`, `jenis_pembayaran`, `nama`, `tahunajar`, `update_time`, `create_time`) VALUES
(1, 1, 2, 'bebas', 'Buku', '2020/2021', '2022-06-26', '2022-06-26'),
(2, 1, 1, 'bulanan', 'SPP', '2020/2021', '2022-06-26', '2022-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `month_id` int(11) NOT NULL,
  `month_name` varchar(45) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`month_id`, `month_name`, `status`) VALUES
(1, 'Juli', 'active'),
(2, 'Agustus', 'inactive'),
(3, 'September', 'inactive'),
(4, 'Oktober', 'inactive'),
(5, 'November', 'inactive'),
(6, 'Desember', 'inactive'),
(7, 'Januari', 'inactive'),
(8, 'Februari', 'inactive'),
(9, 'Maret', 'inactive'),
(10, 'April', 'inactive'),
(11, 'Mei', 'inactive'),
(12, 'Juni', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `no` int(10) NOT NULL,
  `period_start` year(4) NOT NULL,
  `period_end` year(4) NOT NULL,
  `period_name` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`no`, `period_start`, `period_end`, `period_name`, `status`) VALUES
(1, 2020, 2021, '2020/2021', 'active'),
(2, 2019, 2020, '2019/2020', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `pin`
--

CREATE TABLE `pin` (
  `pin` varchar(255) NOT NULL,
  `ubah` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pin`
--

INSERT INTO `pin` (`pin`, `ubah`) VALUES
('10470c3b4b1fed12c3baac014be15fac67c6e815', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pos_bayar`
--

CREATE TABLE `pos_bayar` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos_bayar`
--

INSERT INTO `pos_bayar` (`id`, `nama`, `keterangan`) VALUES
(1, 'SPP', 'sumbangan'),
(2, 'Buku', 'buku');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `no` int(10) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `norek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`no`, `bank`, `nama`, `norek`) VALUES
(4, 'BCA', 'ANDI M', '120919101');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `nis` varchar(45) DEFAULT NULL,
  `nisn` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `birth_place` varchar(45) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `nohp` varchar(45) DEFAULT NULL,
  `hobi` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `ibu` varchar(100) DEFAULT NULL,
  `ayahwali` varchar(100) DEFAULT NULL,
  `waortu` varchar(45) DEFAULT NULL,
  `kelas_id` varchar(11) DEFAULT NULL,
  `jurusan` int(11) DEFAULT NULL,
  `catatan` text NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `nis`, `nisn`, `password`, `nama`, `gender`, `birth_place`, `birth_date`, `avatar`, `nohp`, `hobi`, `alamat`, `ibu`, `ayahwali`, `waortu`, `kelas_id`, `jurusan`, `catatan`, `status`, `input_date`, `last_update`) VALUES
(2, '1234', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'Andi Andromeda', 'Laki Laki', 'Jakarta', '2005-09-12', 'student/image/sky.png', '6285712345678', 'Baca', 'Jakarta', 'Sukiah', 'Shobun', '6285678963457', '2', 1, 'nakal', 'active', '2022-06-20', '2022-06-20'),
(3, '1235', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'Budi', 'Perempuan', 'Jakarta', '2005-09-13', 'image/placeholder.png', '6285712345678', '', 'Jakarta', 'Sukiah', 'Shobun', '6285678963457', '2', 2, '', 'active', '2022-06-20', '2022-06-20'),
(4, '1236', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'Dedi', 'Laki Laki', 'Jambi', '2005-09-14', 'image/placeholder.png', '6285712345678', 'Nyanyi', 'Jambi', 'Sukiah', 'Shobun', '6285678963457', '3', 1, '', 'active', '2022-06-20', '2022-06-20'),
(5, '1237', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'Rudi', 'Perempuan', 'Lampung', '2005-09-15', 'image/placeholder.png', '6285712345678', '', 'Lampung', 'Sukiah', 'Shobun', '6285678963457', '2', 2, '', 'active', '2022-06-20', '2022-06-20'),
(6, '1238', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'Didi', 'Laki Laki', 'Aceh', '2005-09-16', 'image/placeholder.png', '6285712345678', '', 'Aceh', 'Sukiah', 'Shobun', '6285678963457', '3', 1, '', 'active', '2022-06-20', '2022-06-20'),
(7, '1239', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'Beni', 'Perempuan', 'Medan', '2005-09-17', 'image/placeholder.png', '6285712345678', 'Menulis', 'Medan', 'Sukiah', 'Shobun', '6285678963457', '2', 2, '', 'active', '2022-06-20', '2022-06-20'),
(8, '1240', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'Deni', 'Laki Laki', 'Papua', '2005-09-18', 'image/placeholder.png', '6285712345678', '', 'Papua', 'Sukiah', 'Shobun', '6285678963457', '3', 1, '', 'active', '2022-06-20', '2022-06-20'),
(9, '1241', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'Ani', 'Perempuan', 'Bogor', '2005-09-19', 'image/placeholder.png', '6285712345678', '', 'Bogor', 'Sukiah', 'Shobun', '6285678963457', '2', 2, '', 'active', '2022-06-20', '2022-06-20'),
(10, '1242', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'Roni', 'Laki Laki', 'Jombang', '2005-09-20', 'image/placeholder.png', '6285712345678', 'Main game', 'Jombang', 'Sukiah', 'Shobun', '6285678963457', '3', 1, '', 'active', '2022-06-20', '2022-06-20'),
(11, '1243', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'Toni', 'Perempuan', 'Japan', '2005-09-21', 'image/placeholder.png', '6285712345678', '', 'Japan', 'Sukiah', 'Shobun', '6285678963457', '2', 2, '', 'active', '2022-06-20', '2022-06-20'),
(12, '1244', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'Soni', 'Laki Laki', 'Bengkulu', '2005-09-22', 'image/placeholder.png', '6285712345678', '', 'Bengkulu', 'Sukiah', 'Shobun', '6285678963457', '3', 1, '', 'active', '2022-06-20', '2022-06-20'),
(13, '1245', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'Sunni', 'Perempuan', 'dumai', '2005-09-23', 'image/placeholder.png', '6285712345678', '', 'dumai', 'Sukiah', 'Shobun', '6285678963457', '2', 2, '', 'active', '2022-06-20', '2022-06-20'),
(15, '1247', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'Nini', 'Perempuan', 'Jember', '2005-09-25', 'image/placeholder.png', '6285712345678', '', 'Jember', 'Sukiah', 'Shobun', '6285678963457', '2', 2, '', 'active', '2022-06-20', '2022-06-20'),
(16, '1248', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'Noni', 'Laki Laki', 'Brebes', '2005-09-26', 'image/placeholder.png', '6285712345678', '', 'Brebes', 'Sukiah', 'Shobun', '6285678963457', '1', 1, '', 'active', '2022-06-20', '2022-06-20'),
(17, '1249', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'Yani', 'Perempuan', 'Tegal', '2005-09-27', 'image/placeholder.png', '6285712345678', '', 'Tegal', 'Sukiah', 'Shobun', '6285678963457', '2', 2, '', 'active', '2022-06-20', '2022-06-20'),
(18, '1250', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'Ardi', 'Laki Laki', 'Parang', '2005-09-28', 'image/placeholder.png', '6285712345678', '', 'Parang', 'Sukiah', 'Shobun', '6285678963457', '1', 1, '', 'active', '2022-06-20', '2022-06-20'),
(19, '1251', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'boni', 'Perempuan', 'Gowa', '2005-09-29', 'image/placeholder.png', '6285712345678', '', 'Gowa', 'Sukiah', 'Shobun', '6285678963457', '2', 2, '', 'active', '2022-06-20', '2022-06-20'),
(20, '1252', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'aan', 'Laki Laki', 'Padang', '2005-09-30', 'image/placeholder.png', '6285712345678', '', 'Padang', 'Sukiah', 'Shobun', '6285678963457', '1', 1, '', 'active', '2022-06-20', '2022-06-20'),
(21, '1253', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'ian', 'Perempuan', 'Palembang', '2005-10-01', 'image/placeholder.png', '6285712345678', '', 'Palembang', 'Sukiah', 'Shobun', '6285678963457', '2', 2, '', 'active', '2022-06-20', '2022-06-20'),
(22, '1254', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'ardian', 'Laki Laki', 'Riau', '1970-01-01', 'image/placeholder.png', '6285712345678', '', 'Riau', 'Sukiah', 'Shobun', '6285678963457', '1', 1, '', 'active', '2022-06-20', '2022-06-20'),
(23, '1255', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'bunian', 'Perempuan', 'batam', '1970-01-01', 'image/placeholder.png', '6285712345678', '', 'batam', 'Sukiah', 'Shobun', '6285678963457', '2', 2, '', 'active', '2022-06-20', '2022-06-20'),
(24, '1256', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'roki', 'Laki Laki', 'belitung', '1970-01-01', 'image/placeholder.png', '6285712345678', '', 'belitung', 'Sukiah', 'Shobun', '6285678963457', '1', 1, '', 'active', '2022-06-20', '2022-06-20'),
(25, '1257', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'ruan', 'Perempuan', 'batang', '1970-01-01', 'image/placeholder.png', '6285712345678', '', 'batang', 'Sukiah', 'Shobun', '6285678963457', '1', 1, '', 'active', '2022-06-20', '2022-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `student_alumni`
--

CREATE TABLE `student_alumni` (
  `student_id` int(11) NOT NULL,
  `nis` varchar(45) DEFAULT NULL,
  `nisn` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `birth_place` varchar(45) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `nohp` varchar(45) DEFAULT NULL,
  `hobi` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `ibu` varchar(100) DEFAULT NULL,
  `ayahwali` varchar(100) DEFAULT NULL,
  `waortu` varchar(45) DEFAULT NULL,
  `kelas_id` varchar(11) DEFAULT NULL,
  `jurusan` int(11) DEFAULT NULL,
  `catatan` text NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `input_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_alumni`
--

INSERT INTO `student_alumni` (`student_id`, `nis`, `nisn`, `password`, `nama`, `gender`, `birth_place`, `birth_date`, `avatar`, `nohp`, `hobi`, `alamat`, `ibu`, `ayahwali`, `waortu`, `kelas_id`, `jurusan`, `catatan`, `status`, `input_date`, `last_update`) VALUES
(14, '1246', '0', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'Sani', 'Laki Laki', 'malang', '2005-09-24', 'image/placeholder.png', '6285712345678', '', 'malang', 'Sukiah', 'Shobun', '6285678963457', '3', 1, '', 'lulus', '2022-06-20', '2022-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `uang_kategori`
--

CREATE TABLE `uang_kategori` (
  `kategori_id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uang_kategori`
--

INSERT INTO `uang_kategori` (`kategori_id`, `nama`, `jenis`, `keterangan`) VALUES
(1, 'Pembayaran Siswa', 'in', 'Semua pemasukan yang diperoleh dari iuran bulanan/non bulanan siswa'),
(4, 'Dana BOS', 'in', 'dana bantuan operasional'),
(5, 'Listrik', 'out', 'Beban Listrik');

-- --------------------------------------------------------

--
-- Table structure for table `uang_masuk_keluar`
--

CREATE TABLE `uang_masuk_keluar` (
  `no` int(10) NOT NULL,
  `tipe` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `kasir` varchar(100) NOT NULL,
  `kategori_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `period_id` int(10) NOT NULL,
  `bebas_id` int(10) NOT NULL,
  `bulanan_id` int(10) NOT NULL,
  `tgl_update` date NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uang_masuk_keluar`
--

INSERT INTO `uang_masuk_keluar` (`no`, `tipe`, `nama`, `keterangan`, `jumlah`, `kasir`, `kategori_id`, `student_id`, `period_id`, `bebas_id`, `bulanan_id`, `tgl_update`, `tgl_input`) VALUES
(1, 'pay', 'SPP T.A 2020/2021', 'pembayaran bulanan', 300000, 'admin', 1, 2, 1, 0, 1, '2022-06-26', '2022-06-26'),
(2, 'pay', 'Buku T.A 2020/2021', 'pembayaran cicilan', 20000, 'admin', 1, 2, 1, 1, 0, '2022-06-26', '2022-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userna_me` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pa_ssword` varchar(70) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `tglaktif` date DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userna_me`, `email`, `pa_ssword`, `nama`, `alamat`, `nohp`, `tgllahir`, `tglaktif`, `jabatan`, `avatar`, `no`) VALUES
('admin', 'admin@admin.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'admin', 'alamat', '111', '2020-02-02', '2020-02-02', 'admin', 'upload/image/placeholder.png', 24),
('admin2', 'admin2@gmail.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'admin2', 'jajajana', '021736262', '2022-06-23', '2022-06-23', 'admin', 'upload/image/placeholder.png', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backset`
--
ALTER TABLE `backset`
  ADD PRIMARY KEY (`url`);

--
-- Indexes for table `bebasan`
--
ALTER TABLE `bebasan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `bebasan_pay`
--
ALTER TABLE `bebasan_pay`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `bulanan`
--
ALTER TABLE `bulanan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `chmenu`
--
ALTER TABLE `chmenu`
  ADD PRIMARY KEY (`userjabatan`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_colors`
--
ALTER TABLE `event_colors`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `graduation`
--
ALTER TABLE `graduation`
  ADD PRIMARY KEY (`grad_id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `no` (`no`);

--
-- Indexes for table `jenis_bayar`
--
ALTER TABLE `jenis_bayar`
  ADD PRIMARY KEY (`jenis_id`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`month_id`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `pin`
--
ALTER TABLE `pin`
  ADD PRIMARY KEY (`ubah`);

--
-- Indexes for table `pos_bayar`
--
ALTER TABLE `pos_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `fk_student_class1_idx` (`kelas_id`),
  ADD KEY `fk_student_majors1_idx` (`jurusan`);

--
-- Indexes for table `student_alumni`
--
ALTER TABLE `student_alumni`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `fk_student_class1_idx` (`kelas_id`),
  ADD KEY `fk_student_majors1_idx` (`jurusan`);

--
-- Indexes for table `uang_kategori`
--
ALTER TABLE `uang_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `uang_masuk_keluar`
--
ALTER TABLE `uang_masuk_keluar`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userna_me`),
  ADD KEY `no` (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bebasan`
--
ALTER TABLE `bebasan`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `bebasan_pay`
--
ALTER TABLE `bebasan_pay`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bulanan`
--
ALTER TABLE `bulanan`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_colors`
--
ALTER TABLE `event_colors`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `graduation`
--
ALTER TABLE `graduation`
  MODIFY `grad_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `jenis_bayar`
--
ALTER TABLE `jenis_bayar`
  MODIFY `jenis_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `month_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pos_bayar`
--
ALTER TABLE `pos_bayar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `student_alumni`
--
ALTER TABLE `student_alumni`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `uang_kategori`
--
ALTER TABLE `uang_kategori`
  MODIFY `kategori_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `uang_masuk_keluar`
--
ALTER TABLE `uang_masuk_keluar`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
