-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 04:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_book`
--

CREATE TABLE `tb_book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_detail` varchar(255) NOT NULL,
  `book_user` text NOT NULL,
  `book_category` varchar(255) NOT NULL,
  `book_year` int(11) NOT NULL,
  `book_date` datetime NOT NULL,
  `book_status` varchar(20) NOT NULL,
  `book_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_book`
--

INSERT INTO `tb_book` (`book_id`, `book_name`, `book_detail`, `book_user`, `book_category`, `book_year`, `book_date`, `book_status`, `book_code`) VALUES
(5, 'เครือข่ายคอมพิวเตอร์และการสื่อสาร (ฉบับปรับปรุงเพิ่มเติม)', '', 'โอภาส เอี่ยมสิริวงศ์', 'คอมพิวเตอร์และเทคโนโลยี', 2565, '2022-10-19 00:00:00', 'ปกติ', 'C001'),
(6, 'เขียนโปรแกรมด้วยภาษา Python ฉบับเพิ่มเติมกับ PyQt และ Pygame', '', 'บัญชา ปะสีละเตสัง', 'คอมพิวเตอร์และเทคโนโลยี', 2565, '2022-10-19 00:00:00', 'ถูกยืม', 'C002'),
(7, 'พัฒนา Web App แบบ Responsive', '', 'บัญชา ปะสีละเตสัง', 'คอมพิวเตอร์', 2565, '2022-10-19 00:00:00', 'ปกติ', 'C003'),
(8, 'พัฒนา Application ด้วย React และ React Native', '', 'บัญชา ปะสีละเตสัง', 'คอมพิวเตอร์', 2565, '2022-10-19 00:00:00', 'ปกติ', 'C004'),
(9, 'โครงสร้างข้อมูลกับภาษา C/C++', '', 'ผศ. อุหมาด หมัดอาค้ำ', 'คอมพิวเตอร์', 2565, '2022-10-19 00:00:00', 'ปกติ', 'C005'),
(12, 'มหัศจรรย์ห้องสมุดเที่ยงคืน THE MIDNIGHT LIBRARY', './file/1666280896.', 'แมตต์ เฮก', 'นวนิยาย', 2564, '2022-10-20 00:00:00', 'ปกติ', 'C006'),
(13, 'แนวข้อสอบ GAT ภาษาอังกฤษ', './file/1666280950.', 'ศุภวัฒน์ พุกเจริญ', 'ภาษา', 2562, '2022-10-20 00:00:00', 'ปกติ', 'C007'),
(14, 'แนวข้อสอบ 9 วิชาสามัญภาษาอังกฤษ', '', 'ศุภวัฒน์ พุกเจริญ', 'ภาษา', 2565, '2022-10-20 00:00:00', 'ปกติ', 'C008'),
(15, 'ESSENTIAL BIOLOGY PLUS', './file/1666281113.', 'ศุภณัฐ ไพโรหกุล', 'ชีววิทยา', 2560, '2022-10-20 00:00:00', 'ปกติ', 'C009'),
(16, 'Perfect Maths สรุปเข้มคณิตศาสตร์ ม.ปลาย', './file/1666281152.', 'เทพวี ชนะชาญมงคล', 'คณิตศาสตร์', 2560, '2022-10-20 00:00:00', 'ปกติ', 'C010'),
(17, 'MONEY 101 เริ่มต้นนับหนึ่งสู่ชีวิตการเงินอุดมสุข', './file/1666281206.', 'จักรพงษ์ เมษพันธุ์', 'เศรษฐศาสตร์/การเงิน', 2563, '2022-10-20 00:00:00', 'ปกติ', 'C011'),
(18, 'Inventing Bitcoin : ไขกลไกนวัตกรรมเงินเปลี่ยนโลก', './file/1666281370.', 'Yan Pritzker', 'เศรษฐศาสตร์/การเงิน', 2565, '2022-10-20 00:00:00', 'ปกติ', 'C012');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail`
--

CREATE TABLE `tb_detail` (
  `detail_id` int(11) NOT NULL,
  `history_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `status_lend` int(11) NOT NULL,
  `fine` int(11) NOT NULL,
  `lent_date_strat` datetime NOT NULL,
  `lend_date_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_detail`
--

INSERT INTO `tb_detail` (`detail_id`, `history_id`, `book_id`, `status_lend`, `fine`, `lent_date_strat`, `lend_date_end`) VALUES
(65, 33, 7, 1, 0, '2022-10-21 07:13:55', '2022-11-20 00:00:00'),
(66, 34, 8, 1, 0, '2022-10-21 07:14:38', '2022-11-20 00:00:00'),
(67, 35, 5, 1, 0, '2022-11-12 07:15:53', '2022-12-12 00:00:00'),
(68, 35, 12, 1, 0, '2022-11-12 07:15:53', '2022-12-12 00:00:00'),
(69, 36, 17, 1, 0, '2022-10-21 08:16:01', '2022-11-20 00:00:00'),
(70, 36, 18, 1, 0, '2022-10-21 08:16:01', '2022-11-20 00:00:00'),
(71, 37, 5, 1, 0, '2022-10-21 09:02:06', '2022-11-20 00:00:00'),
(72, 38, 7, 1, 0, '2022-10-24 04:56:26', '2022-11-23 00:00:00'),
(73, 38, 8, 1, 0, '2022-10-24 04:56:26', '2022-11-23 00:00:00'),
(74, 39, 5, 1, 0, '2023-07-23 12:55:09', '2023-08-22 00:00:00'),
(75, 39, 6, 0, 0, '2023-07-23 12:55:09', '2023-08-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_history`
--

CREATE TABLE `tb_history` (
  `history_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `history_date` datetime NOT NULL,
  `history_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_history`
--

INSERT INTO `tb_history` (`history_id`, `user_id`, `history_date`, `history_status`) VALUES
(33, 27, '2022-10-21 07:13:55', 0),
(34, 27, '2022-10-21 07:14:38', 0),
(35, 27, '2022-11-12 07:15:53', 0),
(36, 27, '2022-10-21 08:16:01', 0),
(37, 24, '2022-10-21 09:02:06', 0),
(38, 28, '2022-10-24 04:56:26', 0),
(39, 27, '2023-07-23 12:55:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `student_id`, `password`, `name`, `lastname`, `status`) VALUES
(1, 'admin', 'admin', 'admin', '', 1),
(24, 'a_aa', 'a_aa', 'a', 'aa', 0),
(25, 'b_bb', 'b_bb', 'b', 'bb', 0),
(27, 'achiraya_63', '12345678', 'achiraya', 'jampawan', 0),
(28, 'b_bb1', 'b_bb1', 'b', 'bb', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_book`
--
ALTER TABLE `tb_book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_book`
--
ALTER TABLE `tb_book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_detail`
--
ALTER TABLE `tb_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tb_history`
--
ALTER TABLE `tb_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
