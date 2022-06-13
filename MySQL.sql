-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 11, 2022 at 02:50 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id_config` bigint(20) NOT NULL,
  `config_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id_record` bigint(20) NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id_record`, `short_description`, `value`, `date`) VALUES
(1, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:35'),
(2, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(3, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(4, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(5, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(6, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(7, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(8, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(9, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(10, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(11, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(12, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(13, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(14, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(15, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(16, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(17, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(18, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(19, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(20, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(21, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(22, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(23, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(24, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(25, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(26, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(27, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(28, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(29, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(30, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(31, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(32, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(33, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(34, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(35, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(36, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(37, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(38, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(39, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(40, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(41, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(42, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(43, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(44, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(45, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(46, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(47, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(48, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(49, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(50, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(51, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(52, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(53, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(54, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(55, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(56, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(57, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(58, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(59, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(60, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(61, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(62, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(63, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(64, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(65, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(66, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(67, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(68, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(69, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(70, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(71, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(72, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(73, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(74, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(75, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(76, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(77, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(78, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(79, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(80, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(81, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(82, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(83, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(84, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(85, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(86, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(87, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(88, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(89, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(90, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(91, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(92, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(93, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(94, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(95, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(96, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(97, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(98, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(99, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(100, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(101, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(102, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(103, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(104, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(105, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(106, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(107, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(108, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(109, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(110, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(111, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(112, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(113, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(114, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(115, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(116, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(117, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(118, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(119, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(120, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(121, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(122, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(123, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(124, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(125, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(126, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(127, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(128, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(129, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(130, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(131, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(132, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(133, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(134, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(135, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(136, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(137, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(138, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(139, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(140, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(141, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(142, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(143, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(144, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(145, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(146, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(147, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(148, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(149, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(150, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(151, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(152, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(153, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(154, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(155, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(156, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(157, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(158, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(159, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(160, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(161, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(162, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(163, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(164, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(165, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(166, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(167, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(168, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(169, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(170, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(171, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(172, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(173, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(174, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(175, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(176, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(177, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(178, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(179, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(180, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(181, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(182, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(183, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(184, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(185, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(186, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(187, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(188, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(189, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(190, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(191, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(192, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(193, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(194, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(195, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(196, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(197, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(198, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(199, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(200, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(201, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(202, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(203, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(204, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(205, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(206, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(207, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(208, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(209, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(210, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(211, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(212, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(213, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(214, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(215, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(216, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(217, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(218, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(219, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(220, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(221, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(222, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(223, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(224, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(225, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(226, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(227, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(228, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(229, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(230, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(231, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(232, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(233, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(234, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(235, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(236, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(237, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(238, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(239, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(240, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(241, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(242, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(243, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(244, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(245, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(246, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(247, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(248, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(249, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(250, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(251, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(252, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(253, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(254, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(255, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(256, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(257, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(258, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(259, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(260, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(261, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(262, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(263, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(264, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(265, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(266, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(267, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(268, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(269, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(270, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(271, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(272, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(273, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(274, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(275, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(276, 'Text record for pagination', 'This is a test', '2022-06-10 04:58:46'),
(277, 'New 404 Page Visit', '/favicon.ico', '2022-06-10 09:52:12'),
(278, 'Email Was Successfully Sent', '[\"from name=localhost\",\"from email=info@neftify.com\",\"to email=steven@neftify.com\",\"to name=puzzle\",\"subject=localhost Login Verification (code: \\\"746813\\\")\",\"body=Hello puzzle, <br \\/>We have received a login attempt with the following code:\"]', '2022-06-10 13:05:15'),
(279, 'Email Was Successfully Sent', '[\"from name=localhost\",\"from email=info@neftify.com\",\"to email=steven@neftify.com\",\"to name=puzzle\",\"subject=localhost Login Verification (code: \\\"769512\\\")\",\"body=Hello puzzle, <br \\/><br \\/>We have received a login attempt with the following code:\"]', '2022-06-10 13:06:35'),
(280, 'Email Was Successfully Sent', '[\"from name=localhost\",\"from email=info@neftify.com\",\"to email=steven@neftify.com\",\"to name=puzzle\",\"subject=localhost Login Verification (code: \\\"182394\\\")\",\"body=Hello puzzle, <br \\/><br \\/>We have received a login attempt with the following code:\"]', '2022-06-10 13:09:53'),
(281, 'Email Was Successfully Sent', '[\"from name=localhost\",\"from email=info@neftify.com\",\"to email=steven@neftify.com\",\"to name=puzzle\",\"subject=localhost Login Verification (code: \\\"204951\\\")\",\"body=Hello puzzle, <br \\/><br \\/>We have received a login attempt with the following code:\"]', '2022-06-10 13:10:32'),
(282, 'New 404 Page Visit', '/login?email=steven@neftify.com&token=MUIEAA8SyBex6s5BGPApmGPqR6H1FHAnIkENkbUbhy5M5VF2PqtLBdT7GVL9GeKGPuin8W8CGDtyiiDIziniFAXzKd8qWbBSyI0zXuxugdJ87hcXiF6lkxLFUhVBkvDih7RHGDGLiWspRKdf2KovbtLXWkkE63ng236GmWcLxCcVobExjnCPxst4kQR3CgG1YkEuVci_IteCnqOwTq4M5bYSv59mLI7gDnBgdJnNNAMRyPQ1O96Mp6TMUZndE6bf7cktCrQ8mZRqcJd8fK8pUBd2rdXFSYZkc8pOR2YGIwVXVeY8n8m62sGx-lBJh_0RCF6fq-G_KHCYgyNyMbPXnLETaGvz6V7MkhT-TdIFEzLcXfTSa2Hp_oIQISrxBoYagMKIMTy7QjTNvhNP3gcHsORaoiKyGWfT', '2022-06-10 13:11:45'),
(283, 'Email Was Successfully Sent', '[\"from name=localhost\",\"from email=info@neftify.com\",\"to email=steven@neftify.com\",\"to name=puzzle\",\"subject=localhost Login Verification (code: \\\"246079\\\")\",\"body=Hello puzzle, <br \\/><br \\/>We have received a login attempt with the following code:\"]', '2022-06-10 13:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eth_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sol_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `nonce` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_verification` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `referred_by` bigint(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_meta`
--

CREATE TABLE `users_meta` (
  `id_meta` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id_config`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id_record`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users_meta`
--
ALTER TABLE `users_meta`
  ADD PRIMARY KEY (`id_meta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id_config` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id_record` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_meta`
--
ALTER TABLE `users_meta`
  MODIFY `id_meta` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
