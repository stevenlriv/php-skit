-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 08, 2022 at 08:38 PM
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
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(4, 'New 404 Page Visit', '/jjj?q=ssss&hhh', '2022-06-05 05:40:27'),
(5, 'New 404 Page Visit', '/jjj?q=ssss&hhhsss=jkk', '2022-06-05 05:40:40'),
(6, 'New 404 Page Visit', '/jjj?q=ssss&hhhsss=jkk', '2022-06-05 05:47:29'),
(7, 'new_short_description', 'this_is_A_new_value', '2022-06-05 06:01:59'),
(8, 'q8w0RsjaJHrXGEWhPCNi', 'ED1Jm', '2022-06-05 16:32:25'),
(9, 'FHBu5gVvfjkG0Kz9PadZ', 'R1TWU', '2022-06-05 16:33:19'),
(10, 'UCF9jzlK7bf2Pn3uvTXp', 'kF5n1', '2022-06-05 16:33:19'),
(11, 'WF7SYeRfdLcqUlxHy986', 'wtxVs', '2022-06-05 16:33:19'),
(12, '2Vaw0hHKtQcuZX4o6sGP', 'AJX9D', '2022-06-05 16:33:19'),
(13, 'RS7qUn9jX1yulhBcV5M4', '9elDU', '2022-06-05 16:33:19'),
(14, 'eLlfvU7I48ypVbqjW3CG', 'GR5dy', '2022-06-05 16:33:19'),
(15, 'rTHdhFgWiVZkGDqNl31p', 'i8s7d', '2022-06-05 16:33:19'),
(16, 'VeYq6CoWugxnsHb7l3QF', 'ALM20', '2022-06-05 16:33:19'),
(17, '4bOf6P2qzsZRkYy0LXic', '1Df7s', '2022-06-05 16:33:19'),
(18, '6OPF5vrQka4KNG1JicYg', 'vG2rb', '2022-06-05 16:33:19'),
(19, 'hGVZQaN0kHwX2rPiMdYD', 'M90IY', '2022-06-05 16:33:19'),
(20, 'k7ZXzBrISih8PFOpGC5V', 'E1BNF', '2022-06-05 16:33:19'),
(21, 'FgCy94OTfkja7Km0SI1r', 'ZMEci', '2022-06-05 16:33:19'),
(22, 'ESq71VoeF9xNBnzJWQrf', 'ov4Rj', '2022-06-05 16:33:19'),
(23, '2IyGs5Zi01S7COcMowHx', 'lUFEr', '2022-06-05 16:33:19'),
(24, 'TbCZ2iSeOdNVx1H4Et5J', 'zKeDP', '2022-06-05 16:33:19'),
(25, '3Ofx0Vaieujh5DYIXy4p', 'vNlAF', '2022-06-05 16:33:19'),
(26, 'FmElQ9jd0JIewOMYpusn', 'WtiYj', '2022-06-05 16:33:19'),
(27, '5imCWDSjK4RntbkoXcOG', 'cFTz4', '2022-06-05 16:33:19'),
(28, 'G9AFowLEYUqumfxseca8', '6Curv', '2022-06-05 16:33:19'),
(29, 'rdMSvNEVWAjzhJiYPCgL', 'WGu53', '2022-06-05 16:33:19'),
(30, 'FBzYX3lm0GrjRLU21aMW', 'v3gpx', '2022-06-05 16:33:19'),
(31, 'NkvnORq9cfJ2hpYgo0iB', 'PARcz', '2022-06-05 16:33:19'),
(32, 'ixRH2CBTYalJPbkVh1F5', 'TeKOc', '2022-06-05 16:33:19'),
(33, '6nH8KNvBqDyMgdrmU3jP', '5dOjP', '2022-06-05 16:33:19'),
(34, 'vqZQkbR7E9WSjCJzpIxN', 'kdW5f', '2022-06-05 16:33:19'),
(35, 'kUX9d0sifqAcHtx2VQye', 'GMKEo', '2022-06-05 16:33:19'),
(36, 'i8a3GLM45X2KRFsdCxcJ', 'ylXGg', '2022-06-05 16:33:19'),
(37, 'eXCZyYPTLIGlw8ROaEkc', 'NJzM3', '2022-06-05 16:33:19'),
(38, 'QxcaJzIWXwC7vkB9biE0', 'eM4W1', '2022-06-05 16:33:19'),
(39, '3NGJZxXoUay9hAmpI40u', '7zmXn', '2022-06-05 16:33:19'),
(40, 'tjHfAFMXVBpnod9D2I7e', 'sHSRO', '2022-06-05 16:33:19'),
(41, '7AZvHUR43LlhE1aOMT9Q', 'KJlXB', '2022-06-05 16:33:19'),
(42, 'D0eHEdJZTr78hk94U2mX', 'l3VUf', '2022-06-05 16:33:19'),
(43, 'NdDYaHEVgusLnxzZOwXB', 'e9VWi', '2022-06-05 16:33:19'),
(44, 'g1wFEqP7vmnV8UaGeSzx', 'o1ZBw', '2022-06-05 16:33:19'),
(45, 'q3pfKSgzL5vENFa4AOQ7', 'd3Dyv', '2022-06-05 16:33:19'),
(46, '0NVQLa1lUw9oDKs3Hb7C', 'pnQE3', '2022-06-05 16:33:19'),
(47, '3wL97FxC2kPfdETyI5tg', 'IZ31j', '2022-06-05 16:33:19'),
(48, 'bocBgp1rZO4W7fuAz8vK', 'IWN3V', '2022-06-05 16:33:19'),
(49, 'l9dBKFRurpHb6tLTxqAQ', 'dDrZH', '2022-06-05 16:33:19'),
(50, 'ERIB1P3FZ5LJawA9xTkm', 'mWKER', '2022-06-05 16:33:19'),
(51, 'XAiPSZy9tLxGkac5ofvn', 'H2qFU', '2022-06-05 16:33:19'),
(52, 'mpNdhYARF2J0WKwcLj7D', 'EPecB', '2022-06-05 16:33:19'),
(53, 'Z3QXjoyp5sCxMcDbU4kY', 'L8RcG', '2022-06-05 16:33:19'),
(54, 'JqxFVbdQaB7ZLYGjKzsw', 'aWZj5', '2022-06-05 16:33:19'),
(55, 'MFuaw58GO10xrqAjnSpH', 'T5fr3', '2022-06-05 16:33:19'),
(56, 'lSnH2gFQb8wkBt4hxG9K', '6hvPS', '2022-06-05 16:33:19'),
(57, 'mKjNadWZqk7Gwt6o3s5E', 'MgHTO', '2022-06-05 16:33:19'),
(58, 'DqAmxJ04H1cr2Caog38O', 'NW15U', '2022-06-05 16:33:19'),
(59, 'kHPV2NFBRzpMy9nZCq1f', 'kQ9Lm', '2022-06-05 16:33:19'),
(60, 'ID2FlJRYTrBENkPc8pq5', 'pvro8', '2022-06-05 16:33:19'),
(61, 'cflOKSuNP4bExAoZF05X', 'F4H98', '2022-06-05 16:33:19'),
(62, 'BA2jfouVtHsvI9Yk7U6z', 'G76PC', '2022-06-05 16:33:19'),
(63, 'AyoVF8MiSIQHTZmNpCXL', 'j7Jsp', '2022-06-05 16:33:19'),
(64, 'zxZKre41ynoREHUtL35u', 'kuGCJ', '2022-06-05 16:33:19'),
(65, 'LAWYbD8R1lEzNa9iQjxI', 'NwpAM', '2022-06-05 16:33:19'),
(66, 'IqJ21aWcLlf5NMUKGkzg', 'V1YzA', '2022-06-05 16:33:19'),
(67, 'diXDsI9olqOArUPWp7nG', 'mGac9', '2022-06-05 16:33:19'),
(68, 'fs1E8Gc6ByVM42rCSpnD', 'Ajnxv', '2022-06-05 16:33:19'),
(69, '6zGQsn7ZSyY5xlhbXMLB', 'YKkVl', '2022-06-05 16:33:19'),
(70, 'eWk6ZxDQAI2Nnov31gtp', 'Hd1RO', '2022-06-05 16:33:19'),
(71, 'RJq7Cschdu03nlOjP6iX', '1XWZ2', '2022-06-05 16:33:19'),
(72, 'YGCjrDR1u7E2XSznV0yx', 'ahcfj', '2022-06-05 16:33:19'),
(73, 'uAB52jPFx3JsTmXMUpao', 'sc561', '2022-06-05 16:33:19'),
(74, 'm4p0q3RnrJoK9xyVXiz1', 'tXDBQ', '2022-06-05 16:33:19'),
(75, 'KpEzcIo8w71aWZ6fJqbR', 'cM8Ox', '2022-06-05 16:33:19'),
(76, 'iaztEhw2ZKVnoHx7flJj', 'TbquS', '2022-06-05 16:33:19'),
(77, '6vOTEQ501ph2Y7Pswxlt', 'f6ovj', '2022-06-05 16:33:19'),
(78, 'uGHVrvAwSJzf4aFDx6RN', '0UIPE', '2022-06-05 16:33:19'),
(79, 'QPUBxm7zJcLwrWqkRb5S', 'oev9O', '2022-06-05 16:33:19'),
(80, '2UoyQd1sGtIXwFRbY8ZV', 'fc9bE', '2022-06-05 16:33:19'),
(81, 'FHiL6g3T28mQlEjkhUIt', 'n1PNq', '2022-06-05 16:33:19'),
(82, 'GObCFVR1Jzhetim4NsWy', 'GwuHO', '2022-06-05 16:33:19'),
(83, 'm89wq2YSuNDrInfe7OTd', 'i8ChA', '2022-06-05 16:33:19'),
(84, 'YTObtG3gljLn769NMc8q', 'Zznqk', '2022-06-05 16:33:19'),
(85, 'iBYRdS3lrMqC0IxhQ569', 'TwM8P', '2022-06-05 16:33:19'),
(86, 'pT0Woe7gVSijv2GPdLKY', 'IqB0z', '2022-06-05 16:33:19'),
(87, 'GQy1Ntxf6H4dzJDb2SCi', 'yx49r', '2022-06-05 16:33:19'),
(88, 'y6GNApWDfOMusI7SwtC2', '2PRp5', '2022-06-05 16:33:19'),
(89, 'iRAUFdHGvEK2QWkaOx0V', 'fcQb9', '2022-06-05 16:33:19'),
(90, 'HoPV9DcSLIU8EBG5vuRi', 'T0z8O', '2022-06-05 16:33:19'),
(91, 'XwNJGhm2fIj1oTAYWL6Q', 'Vdo1J', '2022-06-05 16:33:19'),
(92, 'gpbB8qxDuNhkQe3m5lPW', 'FE4rP', '2022-06-05 16:33:19'),
(93, 'wZ1gB3jOezUf5idTtEps', 'rK5vk', '2022-06-05 16:33:19'),
(94, 'gma298Tv6rXkyGcLq7Hl', 'qGEOL', '2022-06-05 16:33:19'),
(95, 'jZfSEn5kIGsPq48gYVth', 'QWUNA', '2022-06-05 16:33:19'),
(96, 'hYnjKRfFGB7CyObMS16u', '3BpML', '2022-06-05 16:33:19'),
(97, 'NbeoTwJaiUpux10cVrXj', '2fxHK', '2022-06-05 16:33:19'),
(98, 'bF94fDzT6CVEPvuNkJBe', 'EMUei', '2022-06-05 16:33:19'),
(99, 'AFQdh931MHsOzpemtbfN', 'GIRyH', '2022-06-05 16:33:19'),
(100, '9GMhYpcFSvXZQs5bkTJe', 'lDkEe', '2022-06-05 16:33:19'),
(101, 'KVMHFRb5gkC3qymsDc2P', 'L3KAu', '2022-06-05 16:33:19'),
(102, 'Qj5WUnV7gb2pEhZrkdXT', 'kx2c3', '2022-06-05 16:33:19'),
(103, '3l20XRUpk7TqieIQDj5B', 'BSIUJ', '2022-06-05 16:33:19'),
(104, 'pioQHvbEknJZMaWzC01s', '2jr8L', '2022-06-05 16:33:19'),
(105, 'MGgsXvW8uAp5OFryNitT', 'c7OBV', '2022-06-05 16:33:19'),
(106, '8HlMBfLejTmnqs0aGQNy', 'CEa3x', '2022-06-05 16:33:19'),
(107, 'kLN60TlMXUuAWvRQrKGS', 'eKfrJ', '2022-06-05 16:33:19'),
(108, '1DAUx3ZHwYPSMJcvTlbm', 'sTB39', '2022-06-05 16:33:19'),
(109, 'O7KkQrZTigAvdpzbjyeC', 'nR7EW', '2022-06-05 16:33:19'),
(110, 'i5sSzGbZ7YrudBphE6ge', 'U2x4V', '2022-06-05 16:33:19'),
(111, 'HQ5L81yKwdloZX9EfTqO', 'DSI4p', '2022-06-05 16:33:19'),
(112, 'k3yQrLEscdWHKIqwX6tU', 'iy8VF', '2022-06-05 16:33:19'),
(113, '9xDcGowVIglB5sEAmdvj', '7uJsQ', '2022-06-05 16:33:19'),
(114, 'C7MeW98hSKTiadZYzu5x', 'fnjRO', '2022-06-05 16:33:19'),
(115, 'mVpzTOjAey7swg2fP0l1', 'sfTwD', '2022-06-05 16:33:19'),
(116, 'rGDgYklH4amMT7jS0Xbp', '031WS', '2022-06-05 16:33:19'),
(117, 'oLAmZ83MsrFNHw2RGp1C', 'DG9aS', '2022-06-05 16:33:19'),
(118, 'IvamCVk96TdfLeQzN4nM', 'RNCxn', '2022-06-05 16:33:19'),
(119, 'iDjRAZxNfzVk2gsulLtm', '8KiEu', '2022-06-05 16:33:19'),
(120, 'QfhEcu5Y43wqPkX2tRbo', '4Lnlm', '2022-06-05 16:33:19'),
(121, '9VTOdybhkzrSPAx1ZNlY', '52XEC', '2022-06-05 16:33:19'),
(122, 'XuZ4BS3rM9KWAUCTbkxF', 'ekGAz', '2022-06-05 16:33:19'),
(123, '1gci7seXlfhVj0wb4DdY', 'xcGE6', '2022-06-05 16:33:19'),
(124, 'ae73b28X0FApmMWdBzUN', '37naj', '2022-06-05 16:33:19'),
(125, '1HhJle7PmLdY0yMo5zcq', 'WnIBe', '2022-06-05 16:33:19'),
(126, 'WVloSKDMdX5kY4bg9F6f', 'msSJ5', '2022-06-05 16:33:19'),
(127, 'Wx7Pzs0KanwYdEM5uSmb', 'Iujdh', '2022-06-05 16:33:19'),
(128, 'kUKEablHVWcdtX3Y765q', 'bWSy0', '2022-06-05 16:33:19'),
(129, 'HJdLU0i4VyY9AIPCxkzq', 'pafkY', '2022-06-05 16:33:19'),
(130, 'ydtKwOfsQC2GgHxN6cTa', 'pkP2K', '2022-06-05 16:33:19'),
(131, 'UxJ6MVyhLKSY2QvRH7tw', 'ewIk4', '2022-06-05 16:33:19'),
(132, 'dMUeIOlVfqoDHAj8h2pi', 'spYve', '2022-06-05 16:33:19'),
(133, '1Xm2LCxz09SMwtr5Ibl3', 'gARkT', '2022-06-05 16:33:19'),
(134, 'JuMij83v2lEFymtfDrZK', 'RLryG', '2022-06-05 16:33:19'),
(135, 'Y5ionlb7yjtXWRkcuEdA', 'SAZpD', '2022-06-05 16:33:19'),
(136, '8aVehHMgqJTNlGbkI3F7', 'GAbEU', '2022-06-05 16:33:19'),
(137, 'zZpOQbC6VkSa07A4BT3F', 'Ow01M', '2022-06-05 16:33:19'),
(138, 'nJOW7QUhc4miv8wsqa29', 'ETCeg', '2022-06-05 16:33:19'),
(139, '0VdT5CY6WgRuMjpBIt9r', 'axSBR', '2022-06-05 16:33:19'),
(140, 'J1mWAbjnyqVMSIkiGPu7', 'ypPN8', '2022-06-05 16:33:19'),
(141, 'z7xKp0IuvL3YwHC5tAjl', 'D6vfR', '2022-06-05 16:33:19'),
(142, 'qLU7nWEv14hODAI5Braw', 'BDfli', '2022-06-05 16:33:19'),
(143, 'HdZc6iNmQ7aXIrPThqjf', 'gd3fR', '2022-06-05 16:33:19'),
(144, 'Fn0g9yfZ4Vl8YmKhdXTe', '7A1lQ', '2022-06-05 16:33:19'),
(145, '9ujdIB4HFmsXwaeERvPy', 'T4wia', '2022-06-05 16:33:19'),
(146, 'tRgLPj73NBoh9VOivprX', 'F4Wbc', '2022-06-05 16:33:19'),
(147, 'rRyCwJWjdetPhHnSNlTB', 'suJ0A', '2022-06-05 16:33:19'),
(148, 'CJhkmY29L3it1zHuwfRU', '32yoS', '2022-06-05 16:33:19'),
(149, 'SQFXcLoE4wfPjmAp7YI8', 'R0Sq2', '2022-06-05 16:33:19'),
(150, 'Ia4F6QCwDY3EpgNsz09e', '498zM', '2022-06-05 16:33:19'),
(151, 'AgrbHnUF0MJQ5KBm8wIC', 'PeWDR', '2022-06-05 16:33:19'),
(152, 'wBtQ0FcxLJ3gMWIrTXGC', 'Q1H23', '2022-06-05 16:33:19'),
(153, 'JfyjYSCFce0a87EpuD4W', 'dqazg', '2022-06-05 16:33:19'),
(154, 'sYBJWzmpFfRX5tMVbU38', 'CO23c', '2022-06-05 16:33:19'),
(155, 'dvecUAx9T0wBoa7fmIGt', 'QNVdK', '2022-06-05 16:33:19'),
(156, 'cTAWsjXbrL0OBI27uhKR', 'NVh3m', '2022-06-05 16:33:19'),
(157, 'soVuyzaPTOIDE8F1fSXe', 'TPkng', '2022-06-05 16:33:19'),
(158, 'ZaY2qQD7zMy6egf5dco8', '7etP8', '2022-06-05 16:33:19'),
(159, '4qjLWUNoyEFza2THOMdh', 'L3Rls', '2022-06-05 16:33:19'),
(160, 'YV6cZOidqMTE2pDwnyIL', '8X9xn', '2022-06-05 16:33:19'),
(161, '9SGyWRl6azQpwBoJbYrj', 'z376j', '2022-06-05 16:33:19'),
(162, 'hpNiLHlcEeMTnPGbCg69', 'geJ7n', '2022-06-05 16:33:19'),
(163, 'oICaEXS0N46MdrHRPDAB', 'drvRw', '2022-06-05 16:33:19'),
(164, 'du9aqpAhyNvTsGm3U7EQ', 'CTkAa', '2022-06-05 16:33:19'),
(165, 'J1NQdVKi3Zf70sRBeUbP', 'XrJ2Z', '2022-06-05 16:33:19'),
(166, '0riaXYq5bgCoSZPW1yTD', 'hJ9qR', '2022-06-05 16:33:19'),
(167, 'NJyqCQsFZXpGtOlH3kE9', 'a8vGu', '2022-06-05 16:33:19'),
(168, '25NLlBJmF0nA6QPDV1hI', '16THg', '2022-06-05 16:33:19'),
(169, 'sOq8a9v25r617nRAEG4V', 'naDAg', '2022-06-05 16:33:19'),
(170, 'xiUGq4QRPMWskZc5vflD', 'hlPmy', '2022-06-05 16:33:19'),
(171, 'cy3u8aQIpUOzokjeEPNX', 'iI6jR', '2022-06-05 16:33:19'),
(172, 'MnxeavlWFRyoBKs8H4DL', 'hZWLV', '2022-06-05 16:33:19'),
(173, 'RXEosa3iU9bxjlWDcvfq', '9dJ7Y', '2022-06-05 16:33:19'),
(174, '9cLF7AZPXxgQHpnOmSY4', '2eSOt', '2022-06-05 16:33:19'),
(175, 'XynBqUC2Rb9SjDZOHh6i', 'uBVIF', '2022-06-05 16:33:19'),
(176, 'oVJegwRmxI4SFGWYPpnD', 'O56rC', '2022-06-05 16:33:19'),
(177, '0FRvrIDmWnBxf9uYeOlV', '6ceXT', '2022-06-05 16:33:19'),
(178, 'hcTlKoCESWaXuIRzpf6D', 'sr29L', '2022-06-05 16:33:19'),
(179, 'flPUm2dH7JB4uFkyteWA', 'gdElx', '2022-06-05 16:33:19'),
(180, 'LyRSTJwE6tWOCare5Vb1', 'qgIjl', '2022-06-05 16:33:19'),
(181, 'WH0w357QaL1qcz6IjrJB', 'qsyxB', '2022-06-05 16:33:19'),
(182, 'maH19TSAol36dFZUNcRP', 'Xifac', '2022-06-05 16:33:19'),
(183, 'BdyaYACnwNWU7xQreb90', 'oK4d0', '2022-06-05 16:33:19'),
(184, '1QBaNeoOh65AVT9CGUJc', 'g0jvM', '2022-06-05 16:33:19'),
(185, 'd5ki32GsZjgAWO1l6N7m', '8BezF', '2022-06-05 16:33:19'),
(186, 'wqrIyC6OXuVxkZaQ40o2', 'qnSX2', '2022-06-05 16:33:19'),
(187, 'tQnPEh4u0gsrxaIYej1b', 'TwQt7', '2022-06-05 16:33:19'),
(188, '5pHNLR2zfeBXvUycGDwx', 'z2cpB', '2022-06-05 16:33:19'),
(189, 'aQbyfLl5n2JtoF8AWNMp', 'vKblt', '2022-06-05 16:33:19'),
(190, 'YzyCgbj3TVEquG6xRUMd', 'V14iw', '2022-06-05 16:33:19'),
(191, 'XvAq9mBl5PW3pZFcCY80', 'WBr7l', '2022-06-05 16:33:19'),
(192, 'S3eU8wjzmLDsxFyYVRPH', '4Z7Iu', '2022-06-05 16:33:19'),
(193, 'aPmIBvGuX356V9JjSsdU', 'uGnUq', '2022-06-05 16:33:19'),
(194, 'dGSbB7O6ht5ofvZj0wXg', 'QmAVv', '2022-06-05 16:33:19'),
(195, 'WjnDacpQwIhtRe5gk790', '9twxc', '2022-06-05 16:33:19'),
(196, '0a8xLEecO72W4j9VrXpI', 'xhwT0', '2022-06-05 16:33:19'),
(197, 'BoWihGDv6aERxYmT8y3j', 'VEZi7', '2022-06-05 16:33:19'),
(198, 'A5jKQbC6EqzMcWvyxG1F', 'VkTa4', '2022-06-05 16:33:19'),
(199, 'xaSKFTOdl9QYPjLZgVhs', 'KZjvP', '2022-06-05 16:33:19'),
(200, '2lvJCgwA4GduZ1jDT7ef', 'a1NEJ', '2022-06-05 16:33:19'),
(201, 'VA8GM5J6tK2oUCrO3WT4', 'mY24E', '2022-06-05 16:33:19'),
(202, 'V87dMEbjX2Nfxn0rQcsk', 'dUsHZ', '2022-06-05 16:33:19'),
(203, 'c9yems4CwnqQv7LRTaX2', 'ZklMC', '2022-06-05 16:33:19'),
(204, 'eRxvth64aZM0O7QsAmNj', 'lVYLB', '2022-06-05 16:33:19'),
(205, 'jVTqBMzF8AmyOp5ZoYdi', 'tN4OH', '2022-06-05 16:33:19'),
(206, 'mzpoHl3fSv51cPdwx2DT', 'AYqhm', '2022-06-05 16:33:19'),
(207, 'BtJKqgpQ4NZLS7Clx0ej', 'giLHb', '2022-06-05 16:33:19'),
(208, 'ASdh2jGb6swETk7r4Q1L', 'K0MAk', '2022-06-05 16:33:19'),
(209, 'raN90QHPL2WUkbO57KpY', 'EhvUs', '2022-06-05 16:33:19'),
(210, 'sUGljB5c9XMmyWtKkTDR', 'Vexiv', '2022-06-05 16:33:19'),
(211, 'RKMJ6VhnIfYg1wrLazZy', 'O3YBQ', '2022-06-05 16:33:19'),
(212, 'SiQUbyKDgRPJ3Bh1wqOp', 'ktF6H', '2022-06-05 16:33:19'),
(213, 'bzh6EQZv1BIypxAMSP2J', 'mDlvJ', '2022-06-05 16:33:19'),
(214, 'LspbhnBTFZ782KzNQIV6', 'm2Y0W', '2022-06-05 16:33:19'),
(215, 'fKag6v4dtbzFpNQ0XTce', '7Mof4', '2022-06-05 16:33:19'),
(216, 'gQhUDeYMcCjtLBJuyGbA', 'Pz6Hu', '2022-06-05 16:33:19'),
(217, '2A4Ldom1SsG68CxFrbRJ', 'rcsUB', '2022-06-05 16:33:19'),
(218, 'BPr2nZMX1S9VykgbaTtQ', 'Kifxd', '2022-06-05 16:33:19'),
(219, 'hrsTvonlUwFImxWpdK3c', 'lx5Ua', '2022-06-05 16:33:19'),
(220, 'rmjtMQ2SEIGYXo4Zgha3', 'ejAYo', '2022-06-05 16:33:19'),
(221, 'jl0bSdCUOis7tcZAHyzf', 'YsFgQ', '2022-06-05 16:33:19'),
(222, 'aSBwpnsqxrCJXY52hvDe', '2M61o', '2022-06-05 16:33:19'),
(223, 'laj4uBbLrZtoPmA60MfT', 'dn5OK', '2022-06-05 16:33:19'),
(224, 'W3SMKERpxy1X8fwl2bC6', 'wZeig', '2022-06-05 16:33:19'),
(225, 'bMyDah72QlRevmn134z0', 'R9eaJ', '2022-06-05 16:33:19'),
(226, 'fEQ4Fyg8IkULXaOGsHJY', 'tdhf4', '2022-06-05 16:33:19'),
(227, '8djNWOu6oi3hSQ2fw14B', 'P0DSE', '2022-06-05 16:33:19'),
(228, 'Iyic5KUelSGfP0VBXqtY', '4MEzQ', '2022-06-05 16:33:19'),
(229, '4hCfrseL5lcnYD18pISx', 'kQ4Ex', '2022-06-05 16:33:19'),
(230, '1skHrGbgqXjxQIiyZTvm', '2Nqn9', '2022-06-05 16:33:19'),
(231, 'dXTnpMQqCOVN8DLbeKWR', 'YdM3l', '2022-06-05 16:33:19'),
(232, 'gAdUYhC75yiu4pe3w1M2', 'pFbMs', '2022-06-05 16:33:19'),
(233, 'Hq6V7ziDZAwsPbNGIMQJ', 'WuVCJ', '2022-06-05 16:33:19'),
(234, 'MkDTQYz9237audZfHUlL', 'NpX8L', '2022-06-05 16:33:19'),
(235, '6ZdEiMRYF4LkATWJrf3t', 'OkrhQ', '2022-06-05 16:33:19'),
(236, 'Tve0HDBSU9YmP5EkCVdL', '0Rigt', '2022-06-05 16:33:19'),
(237, 'DfLoiVYX5teOZsjUw4S6', 'hqROT', '2022-06-05 16:33:19'),
(238, 'TbFs65GmUW2LitPku9RC', 'nvIcV', '2022-06-05 16:33:19'),
(239, 'jdyK58Tq6D2CROeFcNPh', '1t8y2', '2022-06-05 16:33:19'),
(240, '9WCuUMDqtpFYwmTGL7zK', 'ZhFAD', '2022-06-05 16:33:19'),
(241, 'wUiPCWhHEafksb98gqAX', 'voExr', '2022-06-05 16:33:19'),
(242, 'yANuCV8K60xDjstY7dna', 'OHU0f', '2022-06-05 16:33:19'),
(243, 'pbEIzAxjvYNnclL0k51G', 'QrFd7', '2022-06-05 16:33:19'),
(244, 'nqS56cV0vMHP47ROGXlk', 'JyIY7', '2022-06-05 16:33:19'),
(245, 'vrNfeV4tjG0xoQJ3KIDM', 'DJjqU', '2022-06-05 16:33:19'),
(246, 'zZnIMvYJr7tFK2XNLjx8', 'cXJok', '2022-06-05 16:33:19'),
(247, '8PqohU2XtmlRWLQnjwy6', 'kDl3z', '2022-06-05 16:33:19'),
(248, 'y6YBTdeP0f5jSvWQ3rZa', 'vEgLa', '2022-06-05 16:33:19'),
(249, 'lAmaE05F2nNZ8L4VxGOR', 'B2xZl', '2022-06-05 16:33:19'),
(250, 'h8VbyPXut1Z2cgJS9YqN', 'rkoLW', '2022-06-05 16:33:19'),
(251, 'kvbw3NLEhUIlCsJurRVF', '8kZwK', '2022-06-05 16:33:19'),
(252, 'Ue4xFTrDaHdbG3m9ILvW', 'DSfyc', '2022-06-05 16:33:19'),
(253, '97kQv1VCWIuxUwgrmOyi', 'KVieb', '2022-06-05 16:33:19'),
(254, 'M6nCaA125dl94bGRXyV3', 'P3X7M', '2022-06-05 16:33:19'),
(255, 'Um1RJVDjBXEYheM4uPQr', 'VhCna', '2022-06-05 16:33:19'),
(256, 'npF3Lbw7xvmA1gQy9Mj6', 'vxq3w', '2022-06-05 16:33:19'),
(257, 'civS4LFHM5sIrWPGaJdX', 'QbEwd', '2022-06-05 16:33:19'),
(258, 'RNLDKs6I0lACua7JfkeM', 'Ad7Ve', '2022-06-05 16:33:19'),
(259, 'lKU4YOzpeysZXCVFrcW7', 'uM02U', '2022-06-05 16:33:19'),
(260, 'mBjDyYpAXtNwHahg6u9x', 'EU2rR', '2022-06-05 16:33:19'),
(261, 'yU4HgQrNR6Wc2Chapk9A', 'rdXaH', '2022-06-05 16:33:19'),
(262, '91FXA5GKhnlebI2LRpQ4', 'Z4Sza', '2022-06-05 16:33:19'),
(263, 'aAm0QZynMY4rFUxvPIlk', 'n754W', '2022-06-05 16:33:19'),
(264, 'j2TFIaNpc9iWg7wlSHJe', 'bikOL', '2022-06-05 16:33:19'),
(265, '9BoOTgiusWha2rLANPHm', 'mGt7I', '2022-06-05 16:33:19'),
(266, 'BM2J5xVmo31HapQlbsL4', 'MXjFv', '2022-06-05 16:33:19'),
(267, 'TRWzCr78GE1ajHmA4doM', '2YS0k', '2022-06-05 16:33:19'),
(268, 'FGduv8nr4ozt9D5bJSc2', 'X0aM1', '2022-06-05 16:33:19'),
(269, 'SvxJc2XWzfBZ9Vt3Luir', 'axkF5', '2022-06-05 16:33:19'),
(270, 'MbAO8ScBNDWQFk03mCq1', 'auHJ8', '2022-06-05 16:33:19'),
(271, 'mYwua5izyR2GjTrO1lQK', 'dCIT2', '2022-06-05 16:33:19'),
(272, 'Zt1N3TDpd7sUi56LuJWx', '0uSG4', '2022-06-05 16:33:19'),
(273, 'MQ8fNHGb6FIpAhLwC5Vt', 'qUV9n', '2022-06-05 16:33:19'),
(274, 'kVjTE9N0M6GwR3YtJWLP', 'CVgoh', '2022-06-05 16:33:19'),
(275, 'UoVp2Og0fM3HYh6yP1QK', 'ZOoF4', '2022-06-05 16:33:19'),
(276, 'liUWCYu3E9vxh7a0NmgZ', 'ehM60', '2022-06-05 16:33:19'),
(277, 'uR3a0xeYhdg4jkomETZD', '7jEZC', '2022-06-05 16:33:19'),
(278, 'qR8D4LFysHOeMZXdWol5', '37qH0', '2022-06-05 16:33:19'),
(279, '7UQvt5s3Df8CoKaFBNul', 'ArJgi', '2022-06-05 16:33:19'),
(280, 'jCmXo3a5SObkt0Rcp6Vx', 'QSKBW', '2022-06-05 16:33:19'),
(281, '48Z0H2Yxj7MFNw6VedGa', 'pFsye', '2022-06-05 16:33:19'),
(282, 'VpENXa3SHwBGxmi2eITC', 'Lfxin', '2022-06-05 16:33:19'),
(283, 'SkZrvNEHFpgIJ5XozAdK', 'lQVco', '2022-06-05 16:33:19'),
(284, 'jWI2R7Dv3LgtQGBr9fy8', 'OR4lP', '2022-06-05 16:33:19'),
(285, 'SjgXDk317EV8YpcmWbeq', 'hx6f5', '2022-06-05 16:33:19'),
(286, 'L7YIwum6SnVqCaR1xKZl', 'tXpd9', '2022-06-05 16:33:19'),
(287, 'Z7u86eqxCisD5NTlRJAS', 'bqOC9', '2022-06-05 16:33:19'),
(288, 'w1zkPy7xZnbpLIlrSvQR', 'dBLmy', '2022-06-05 16:33:19'),
(289, '3VZd0L8zRg17Ev2wiGAo', 'oYSpF', '2022-06-05 16:33:19'),
(290, 'UQo51uv7aXeJ36IABKOs', 'l67FV', '2022-06-05 16:33:19'),
(291, 'yeufRI96C8pFATczwE7g', 'ZXcWS', '2022-06-05 16:33:19'),
(292, 'icuOAUwG4PWVzeEMS36H', 'REZtM', '2022-06-05 16:33:19'),
(293, 'LhHsAtCRzmYkJlXua8IV', 'Oa394', '2022-06-05 16:33:19'),
(294, 'yDukqLoCrRwHhsnxFJ1l', 'mSN0B', '2022-06-05 16:33:19'),
(295, 'rZYibMsXUWf36yGhu90D', '1IZ0f', '2022-06-05 16:33:19'),
(296, 'ngB3arIvz75kVeHZ1w9y', 'sWkyU', '2022-06-05 16:33:19'),
(297, 'BywnsK8ripec7TZaHqDO', 'caeWi', '2022-06-05 16:33:19'),
(298, 'uCHcT5gswLE9Jri7NSAZ', 'Ko54f', '2022-06-05 16:33:19'),
(299, 'XDQzHPl6wrntSkfqZi0y', 'M4zEo', '2022-06-05 16:33:19'),
(300, 'pZwgWq5MIHYCbLi0ztlN', 'LWvql', '2022-06-05 16:33:19'),
(301, 'IKwkAXSpcmBNsdejHZOg', 'hfLF2', '2022-06-05 16:33:19'),
(302, 'jY2b5vouUGfzZ8ElmICX', 'Wl3dj', '2022-06-05 16:33:19'),
(303, '3GMlqLtC40TH5QdDzhuv', '8aA9W', '2022-06-05 16:33:19'),
(304, 'hY2HURVx8OpdC7b34mo1', 'ftwVY', '2022-06-05 16:33:19'),
(305, '0fsMhFWJop2H4BLj3AIN', 'JqFEp', '2022-06-05 16:33:19'),
(306, 'UV4upPyz8eT5dbqhwQIR', 'NkbWM', '2022-06-05 16:33:19'),
(307, 'u580MnKc21oNSwCk9HED', 'b7tKT', '2022-06-05 16:33:19'),
(308, 'R1hiol3tjVMAFDKLwHqv', 'WixcZ', '2022-06-05 16:33:19'),
(309, '9gq1oMf38wG4pHaYDQPK', 'q0XTc', '2022-06-05 16:33:19'),
(310, 'sHQitILOmCPlRjTMfKS9', 'ZqHQS', '2022-06-05 16:33:19'),
(311, 'xN7hzvVDAO4ZXKIQ8wk0', 'l68LA', '2022-06-05 16:33:19'),
(312, '7RTnUExLoZDf54yB8VCe', '8J6jO', '2022-06-05 16:33:19'),
(313, 'oePxzdZCUYQsLa5ObIhn', 'TugMB', '2022-06-05 16:33:19'),
(314, 'QrDzIWyoMC8VwSYFhbAa', 'DBgwz', '2022-06-05 16:33:19'),
(315, 'kIgNWFK3rj9npDwByAQa', 'Gz62l', '2022-06-05 16:33:19'),
(316, 'miwK6ejHbJx72DzYkrZg', 'vRLza', '2022-06-05 16:33:19'),
(317, 'V7whDpOXuB1q6QkSaINy', 'nkV8z', '2022-06-05 16:33:19'),
(318, 'Xg0iK12DdGoaPzhtYE6m', 'Wu8My', '2022-06-05 16:33:19'),
(319, 'reTYB86G9Zl140iqQuDE', 'gEITi', '2022-06-05 16:33:19'),
(320, 'AJWtFkBbZia20IhxyqrL', 'dtQG5', '2022-06-05 16:33:19'),
(321, 'IFaYoHBpbPEQ0Tl1mGyf', 'yanWY', '2022-06-05 16:33:19'),
(322, '9JfFODrH4XNPutjxewSC', 'f1rgZ', '2022-06-05 16:33:19'),
(323, 'a4ykbOc8mZgAVWduQ6e0', 'iLIHm', '2022-06-05 16:33:19'),
(324, 'nFi3Guba2BULv7zXfsQl', 'b8oPk', '2022-06-05 16:33:19'),
(325, 'EbK3TJPGR0XdZHsClaU8', '5mV04', '2022-06-05 16:33:19'),
(326, 'jReCWPVbI0m9atfhS8JB', 'kEX9G', '2022-06-05 16:33:19'),
(327, 'I8ZowfeDvVuKCFqpULOl', 'E8tsL', '2022-06-05 16:33:19'),
(328, 'cw4kMgQbHUidhvTn6AJE', 'LzF85', '2022-06-05 16:33:19'),
(329, 'TgbMXvWl6IwteEN72LQS', 'AOFyJ', '2022-06-05 16:33:19'),
(330, '785omSIXkGWyvaEnBflM', 'PEtnc', '2022-06-05 16:33:19'),
(331, 'Il6wXSDBkf2aeibRcF54', 'UjYCn', '2022-06-05 16:33:19'),
(332, 'igE5oyAez1QpaJSYUPGB', 'fS37r', '2022-06-05 16:33:19'),
(333, '0xUlR4KrvJhitYj98D7F', '7ESDw', '2022-06-05 16:33:19'),
(334, '9ysQVnJCxPl1K348pi6q', 'MvDKt', '2022-06-05 16:33:19'),
(335, '9I4MytKbCUdwSo0BAjX6', 'dbyqn', '2022-06-05 16:33:19'),
(336, '7VAh4jCnPlbutGFwqaZU', 'vcDwO', '2022-06-05 16:33:19'),
(337, 'Cdc9GauKVpXYSe7BDr1Q', 'drD7I', '2022-06-05 16:33:19'),
(338, 'jcPyxtei9qGCMd8XLU3k', 'bxqtZ', '2022-06-05 16:33:19'),
(339, 'YBS1CfVJosd73mvKRZ6U', '7Iqzc', '2022-06-05 16:33:19'),
(340, '28luBFVrgfR0oXjbAzGe', 'z0X3l', '2022-06-05 16:33:19'),
(341, 'xXqkPWvCfayF2GMjnB7g', 'OHIeu', '2022-06-05 16:33:19'),
(342, 'T4VXESBL7dto3NPY5iyx', 'W7hoM', '2022-06-05 16:33:19'),
(343, 'siGXSeBfbrwxoP4y08tm', 'lWjfn', '2022-06-05 16:33:19'),
(344, '5DnMIugeR6Lhk4XBGxOQ', 'yGpIc', '2022-06-05 16:33:19'),
(345, 'l8dfbqtwia0zVnAysrTR', 'N1uYP', '2022-06-05 16:33:19'),
(346, 'wkpcuTlaCUt5NigQHWv9', 'yeOWq', '2022-06-05 16:33:19'),
(347, 'kgzwyx5qWoadcTM920O8', 'HjPOM', '2022-06-05 16:33:19'),
(348, 'EKhblSry57TJN2YXL61c', '48eDl', '2022-06-05 16:33:19'),
(349, 'kYobgjulv1TFIMzN9fxU', '51LH9', '2022-06-05 16:33:19'),
(350, 'n3pE9xy4gfjCRwSiBr1v', 'pev3q', '2022-06-05 16:33:19'),
(351, 'wRCtFfX3c2HTK1sQlJev', 'XObmE', '2022-06-05 16:33:19'),
(352, 'fh5o7816dxSJYuBjc9Gp', 'Lnmkl', '2022-06-05 16:33:19'),
(353, 'vC2RktehD1VEumlYbrUd', 'eg8k7', '2022-06-05 16:33:19'),
(354, '3qneERBhM8drkTW5mX69', 'KApyu', '2022-06-05 16:33:19'),
(355, '9a1Cr6pzE40kYWcOXRyn', 'fH27c', '2022-06-05 16:33:19'),
(356, 'NeLT0MGFvYmbQwUgi5fp', 'nLem8', '2022-06-05 16:33:19'),
(357, 'RhfGtjWST9gPHbKaLq68', 'ST1RB', '2022-06-05 16:33:19'),
(358, 'atSHW3V2joxP8w0lbZMR', 'O65Fn', '2022-06-05 16:33:19'),
(359, 'TDK6Hg2b3VSj0rlXxGtP', 'IvTsu', '2022-06-05 16:33:19'),
(360, '6EVfipMeHwPnUgLF1qsv', 'DUz7c', '2022-06-05 16:33:19'),
(361, '1aDAxNdQepbCLiBHW6qI', 'et4zW', '2022-06-05 16:33:19'),
(362, 'HD9so0paSU3jdPt7W4lz', 'hNebz', '2022-06-05 16:33:19'),
(363, '2aTUcsiyC9vLBGYd5Vkw', 'EqZmf', '2022-06-05 16:33:19'),
(364, 'fZEewAg5kilbCM4usrBy', '1hjdc', '2022-06-05 16:33:19'),
(365, '9P2muBpkctyd1fK0USVQ', 'dILFm', '2022-06-05 16:33:19'),
(366, 'Z6T2z7hjn59iEuawyQHd', '7Dhd9', '2022-06-05 16:33:19'),
(367, 'jx41zrC7vnETafP532F8', 'QobVm', '2022-06-05 16:33:19'),
(368, 'B1iAMVl5Hsy76NRkdoYf', 'jqZRx', '2022-06-05 16:33:19'),
(369, 'DKNjmf6Z1SFdGy9CEMQs', 'ED8Se', '2022-06-05 16:33:19'),
(370, 'dMJ3j6sevtbS5GHuny2O', 'EdnVh', '2022-06-05 16:33:19'),
(371, 'EHO5gmzbLvsfXr1GJ48k', 'K4Ijv', '2022-06-05 16:33:19'),
(372, '7KjNanygvQre45AxcYl2', 'hv4dm', '2022-06-05 16:33:19'),
(373, 'Ece7jNGUs24WBilY9Stk', '5JTtW', '2022-06-05 16:33:19'),
(374, 'QO9VGYfW7piF2PrAb5Kl', 'usOQZ', '2022-06-05 16:33:19'),
(375, 'MUyS5GHQBchWs4DrdYa3', '8k7Ag', '2022-06-05 16:33:19'),
(376, 'nqUTf7OD4VREKzoNQ1dl', '1vszK', '2022-06-05 16:33:19'),
(377, 'YEFhovjLXea451kWwt2B', 'V3wYD', '2022-06-05 16:33:19'),
(378, 'AKVF094eOixlaNWDG8y7', '1dEyI', '2022-06-05 16:33:19'),
(379, 'CpAZ061vMdVKuWPTDEbO', 'FmI7J', '2022-06-05 16:33:19'),
(380, 'pgZE0lyvsTCmRz5nYWOP', 'Dobxa', '2022-06-05 16:33:19'),
(381, '3Abr0jQGVZTvOBhqYx2l', 'hM4qY', '2022-06-05 16:33:19'),
(382, 'iYOPf7hoeGuW2ZH6vyNE', 'vXbVA', '2022-06-05 16:33:19'),
(383, '65jsdaxueURWm17ZzQDi', 'AK3wj', '2022-06-05 16:33:19'),
(384, 'T0d2rknDmJZPy19If6HG', 'ATMut', '2022-06-05 16:33:19'),
(385, 'XCvxM1FhNVzKIU6aB0sw', 'd6MnG', '2022-06-05 16:33:19'),
(386, '3e5TUXbrICZwjS7YRFNa', 'GDrzI', '2022-06-05 16:33:19'),
(387, 'cnZC7fwkTSx8zvGmKL0l', 'pNPO1', '2022-06-05 16:33:19'),
(388, 'UNfM5F6J7TOcaH2DQKg4', 'sjUSp', '2022-06-05 16:33:19'),
(389, '6WkAwJbZgDTaKXEMprme', 'HpPgq', '2022-06-05 16:33:19'),
(390, 'QpCr5LtMdNUZnBAi6ISl', 'tyFoH', '2022-06-05 16:33:19'),
(391, 'PreIyw4bq9hCNscJSLDo', 'W8IYC', '2022-06-05 16:33:19'),
(392, 'Z2BIqEvlGMuzobg7a5r6', 'i4ULb', '2022-06-05 16:33:19'),
(393, 'New 404 Page Visit', '/favicon.ico', '2022-06-05 22:22:22'),
(394, 'New message was recorded!', 'The message was sssss', '2022-06-07 18:30:19'),
(395, 'A new image was uploaded!', 'URL is https://php-skit.sfo3.digitaloceanspaces.com/uploads/example-folder-name/2022/June/07/DvnQH61mJ9_Screen Shot 2022-05-30 at 2.56.32 PM.png', '2022-06-07 19:07:33'),
(396, 'New 404 Page Visit', '/', '2022-06-07 22:28:11'),
(397, 'New 404 Page Visit', '/', '2022-06-07 22:29:31'),
(398, 'New 404 Page Visit', '/', '2022-06-07 22:29:53'),
(399, 'New message was recorded!', 'The message was sss', '2022-06-07 22:30:58'),
(400, 'New message was recorded!', 'The message was sss', '2022-06-08 19:57:46');

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
  `2fa` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
  MODIFY `id_record` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;

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
