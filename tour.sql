-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 25, 2021 lúc 02:59 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tour`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_account`
--

CREATE TABLE `db_account` (
  `account_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_tour`
--

CREATE TABLE `db_tour` (
  `tour_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_long` int(11) DEFAULT NULL,
  `tour_loc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starttime` date DEFAULT NULL,
  `endtime` date DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rules` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `installment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_tourcategory`
--

CREATE TABLE `db_tourcategory` (
  `category_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_tourhost`
--

CREATE TABLE `db_tourhost` (
  `host_id` int(11) NOT NULL,
  `phone_num` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_tourpart`
--

CREATE TABLE `db_tourpart` (
  `tour_id` int(11) NOT NULL,
  `part_num` int(11) NOT NULL,
  `start_time` time DEFAULT NULL,
  `loc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `db_account`
--
ALTER TABLE `db_account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `db_tour`
--
ALTER TABLE `db_tour`
  ADD PRIMARY KEY (`tour_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `db_tourcategory`
--
ALTER TABLE `db_tourcategory`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `host_id` (`host_id`);

--
-- Chỉ mục cho bảng `db_tourhost`
--
ALTER TABLE `db_tourhost`
  ADD PRIMARY KEY (`host_id`);

--
-- Chỉ mục cho bảng `db_tourpart`
--
ALTER TABLE `db_tourpart`
  ADD PRIMARY KEY (`tour_id`,`part_num`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `db_account`
--
ALTER TABLE `db_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_tour`
--
ALTER TABLE `db_tour`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_tourcategory`
--
ALTER TABLE `db_tourcategory`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `db_tour`
--
ALTER TABLE `db_tour`
  ADD CONSTRAINT `db_tour_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `db_tourcategory` (`category_id`);

--
-- Các ràng buộc cho bảng `db_tourcategory`
--
ALTER TABLE `db_tourcategory`
  ADD CONSTRAINT `db_tourcategory_ibfk_1` FOREIGN KEY (`host_id`) REFERENCES `db_tourhost` (`host_id`);

--
-- Các ràng buộc cho bảng `db_tourhost`
--
ALTER TABLE `db_tourhost`
  ADD CONSTRAINT `db_tourhost_ibfk_1` FOREIGN KEY (`host_id`) REFERENCES `db_account` (`account_id`);

--
-- Các ràng buộc cho bảng `db_tourpart`
--
ALTER TABLE `db_tourpart`
  ADD CONSTRAINT `db_tourpart_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `db_tour` (`tour_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
