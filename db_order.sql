-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 26, 2021 lúc 03:02 AM
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
-- Cấu trúc bảng cho bảng `db_order`
--

CREATE TABLE `db_order` (
  `order_id` int(11) NOT NULL,
  `tour_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `customer_fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_phonenum` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_order`
--

INSERT INTO `db_order` (`order_id`, `tour_id`, `total`, `order_date`, `status`, `customer_fname`, `customer_lname`, `customer_phonenum`, `customer_email`, `customer_address`) VALUES
(2, 5, '4446685.00', NULL, 1, 'Theodosia', 'Fausset', '2745556513', 'tfausset1@naver.com', '26 8th Avenue'),
(3, 4, '3927223.00', NULL, 0, 'Terrel', 'Glinde', '4532485118', 'tglinde2@bloomberg.com', '547 Dixon Terrace'),
(4, 1, '6340122.00', NULL, 1, 'Letta', 'Bould', '1833270388', 'lbould3@clickbank.net', '08489 Ridgeview Point'),
(5, 1, '6736507.00', NULL, 0, 'Lydia', 'Westrope', '5277663945', 'lwestrope4@list-manage.com', '58 Crest Line Street'),
(6, 1, '9307068.00', NULL, 1, 'Astrix', 'Minthorpe', '7924272437', 'aminthorpe5@uol.com.br', '25 Hoard Trail');

--
-- Bẫy `db_order`
--
DELIMITER $$
CREATE TRIGGER `delete_order` BEFORE DELETE ON `db_order` FOR EACH ROW DELETE FROM db_passenger
    WHERE db_passenger.order_id = old.order_id
$$
DELIMITER ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `db_order`
--
ALTER TABLE `db_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `db_order`
--
ALTER TABLE `db_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `db_order`
--
ALTER TABLE `db_order`
  ADD CONSTRAINT `db_order_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `db_tour` (`tour_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
