-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 15, 2022 lúc 04:22 PM
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
CREATE DATABASE IF NOT EXISTS `tour` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `tour`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_order`
--

DROP TABLE IF EXISTS `db_order`;
CREATE TABLE `db_order` (
  `order_id` int(11) NOT NULL,
  `tour_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `status` int(1) DEFAULT 0,
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
(3, 4, '3927223.00', NULL, 0, 'Terrel', 'Glinde', '4532485118', 'tglinde2@bloomberg.com', '547 Dixon Terrace');

--
-- Bẫy `db_order`
--
DROP TRIGGER IF EXISTS `delete_order`;
DELIMITER $$
CREATE TRIGGER `delete_order` BEFORE DELETE ON `db_order` FOR EACH ROW DELETE FROM db_passenger
    WHERE db_passenger.order_id = old.order_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_passenger`
--

DROP TABLE IF EXISTS `db_passenger`;
CREATE TABLE `db_passenger` (
  `passenger_id` int(11) NOT NULL,
  `type` int(1) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` int(1) DEFAULT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_service`
--

DROP TABLE IF EXISTS `db_service`;
CREATE TABLE `db_service` (
  `service_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `tour_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_tour`
--

DROP TABLE IF EXISTS `db_tour`;
CREATE TABLE `db_tour` (
  `tour_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_long` int(11) DEFAULT NULL,
  `starttime` date DEFAULT NULL,
  `endtime` date DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rules` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `installment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `man_price` decimal(10,2) DEFAULT 0.00,
  `kid_price` decimal(10,2) DEFAULT 0.00,
  `child_price` decimal(10,2) DEFAULT 0.00,
  `country` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(85) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT 0,
  `is_installment` bit(1) DEFAULT b'0',
  `promotion` decimal(5,2) DEFAULT 0.00,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_tour`
--

INSERT INTO `db_tour` (`tour_id`, `name`, `tour_long`, `starttime`, `endtime`, `description`, `rules`, `policy`, `installment`, `man_price`, `kid_price`, `child_price`, `country`, `city`, `district`, `address`, `status`, `is_installment`, `promotion`, `category_id`) VALUES
(3, 'Lizard, desert spiny', 6, '2021-02-03', '2022-01-25', 'Maternal care for other isoimmunization, unspecified trimester, fetus 1', 'nisi volutpat eleifend donec ut dolor morbi vel lectus in quam fringilla rhoncus mauris enim leo rhoncus sed vestibulum sit', 'sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus', 'neque vestibulum eget vulputate ut ultrices vel augue vestibulum ante', '6788603.00', '492189.00', '46130.00', NULL, NULL, NULL, NULL, 1, b'0', '0.00', 7),
(4, 'Bear, black', 2, '2022-01-13', '2022-02-05', 'Motorcycle passenger injured in collision with heavy transport vehicle or bus in nontraffic accident, initial encounter', 'nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer tincidunt ante', 'sapien arcu sed augue aliquam erat volutpat in congue etiam justo etiam pretium iaculis justo in', 'posuere cubilia curae mauris viverra diam vitae quam suspendisse potenti nullam porttitor', '9445455.00', '317164.00', '78108.00', NULL, NULL, NULL, NULL, 1, b'0', '0.00', 7),
(15, 'Indian tree pie', 6, '2021-01-20', '2020-04-07', 'Sprain of metacarpophalangeal joint of unspecified finger, subsequent encounter', 'amet nulla quisque arcu libero rutrum ac lobortis vel dapibus at', 'tempus semper est quam pharetra magna ac consequat metus sapien ut nunc vestibulum', 'et tempus semper est quam pharetra magna ac consequat metus sapien ut nunc vestibulum ante ipsum primis', '4763343.00', '380204.00', '46445.00', NULL, NULL, NULL, NULL, 1, b'0', '0.00', 7),
(16, 'ds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', NULL, NULL, NULL, NULL, 0, b'0', '0.00', 16);

--
-- Bẫy `db_tour`
--
DROP TRIGGER IF EXISTS `delete_tour_order`;
DELIMITER $$
CREATE TRIGGER `delete_tour_order` BEFORE DELETE ON `db_tour` FOR EACH ROW DELETE FROM db_order
    WHERE db_order.tour_id = old.tour_id
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `delete_tour_part`;
DELIMITER $$
CREATE TRIGGER `delete_tour_part` BEFORE DELETE ON `db_tour` FOR EACH ROW DELETE FROM db_tourpart
        WHERE db_tourpart.tour_id = old.tour_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_tourcategory`
--

DROP TABLE IF EXISTS `db_tourcategory`;
CREATE TABLE `db_tourcategory` (
  `category_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host_id` int(11) DEFAULT NULL,
  `type` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_tourcategory`
--

INSERT INTO `db_tourcategory` (`category_id`, `name`, `host_id`, `type`) VALUES
(3, 'Marlite Panels (FED)', 6, b'0'),
(7, 'Ornamental Railings', 9, b'1'),
(13, 'Structural & Misc Steel Erection', 6, b'0'),
(15, 'Fire Sprinkler System', 9, b'0'),
(16, 'asd', 7, b'0');

--
-- Bẫy `db_tourcategory`
--
DROP TRIGGER IF EXISTS `delete_tourcategory`;
DELIMITER $$
CREATE TRIGGER `delete_tourcategory` BEFORE DELETE ON `db_tourcategory` FOR EACH ROW DELETE FROM db_tour
    WHERE db_tour.category_id = old.category_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_tourhost`
--

DROP TABLE IF EXISTS `db_tourhost`;
CREATE TABLE `db_tourhost` (
  `host_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_tourhost`
--

INSERT INTO `db_tourhost` (`host_id`, `name`, `address`, `website`) VALUES
(6, 'Geba', '6917 Columbus Hill', 'http://huffingtonpost.com'),
(7, 'Meevee', '442 Sloan Circle', 'http://census.gov'),
(9, 'Jetpulse', '8 North Road', 'https://usda.gov');

--
-- Bẫy `db_tourhost`
--
DROP TRIGGER IF EXISTS `delete_tourhost`;
DELIMITER $$
CREATE TRIGGER `delete_tourhost` BEFORE DELETE ON `db_tourhost` FOR EACH ROW DELETE FROM db_tourcategory
    WHERE db_tourcategory.host_id = old.host_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_tourimg`
--

DROP TABLE IF EXISTS `db_tourimg`;
CREATE TABLE `db_tourimg` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_tourpart`
--

DROP TABLE IF EXISTS `db_tourpart`;
CREATE TABLE `db_tourpart` (
  `part_id` int(11) NOT NULL,
  `start_time` time DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(85) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_user`
--

DROP TABLE IF EXISTS `db_user`;
CREATE TABLE `db_user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenum` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` int(1) DEFAULT 2,
  `status` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_user`
--

INSERT INTO `db_user` (`user_id`, `email`, `phonenum`, `password`, `first_name`, `last_name`, `permission`, `status`) VALUES
(6, 'zbenterman5@chronoengine.com', '7871475428', 'JPdjQCreUGWY', 'Zonnya', 'Benterman', 0, NULL),
(7, 'gmaud6@flavors.me', '4619935410', '3R08PON', 'Gracie', 'Maud', 1, NULL),
(9, 'lgritland8@behance.net', '1895156515', 'xgRK2mOEUMw', 'Lavinie', 'Gritland', 1, NULL),
(11, 'ibottinia@ow.ly', '5445393405', 'xi6HYO', 'Ira', 'Bottini', 1, NULL),
(12, 'hshrimptoneb@china.com.cn', '3367659875', 'JPMdlTmpX1r', 'Harald', 'Shrimptone', 0, NULL),
(13, 'gpontenc@desdev.cn', '1015026468', 'Zcr4hfMtW', 'Grantley', 'Ponten', 0, NULL),
(14, 'jmatyd@sciencedirect.com', '4357367644', 'ygkBlb8cvX', 'Joell', 'Maty', 0, NULL),
(15, 'hmorade@weibo.com', '3071371093', 'EUmTxvGwG', 'Hermy', 'Morad', 0, NULL),
(16, 'pniesingf@usa.gov', '1225037212', 'fFj82gp', 'Porty', 'Niesing', 1, NULL),
(17, 'sgilhooleyg@tinypic.com', '8546032162', 'oWy7kJq', 'Sheffield', 'Gilhooley', 0, NULL),
(18, 'mscutcheonh@who.int', '8413153538', 'l8I0R6WmWyJ', 'Marja', 'Scutcheon', 1, NULL),
(19, 'nblazejewskii@google.co.uk', '3122542164', 'gczNt8x', 'Nicko', 'Blazejewski', 0, NULL),
(20, 'sbaloghj@google.co.jp', '1716987634', 'xxIApm851', 'Sue', 'Balogh', 1, NULL),
(21, 'hjeandelk@salon.com', '1387078441', 'nARTVzLsSw', 'Hildegarde', 'Jeandel', 1, NULL),
(22, 'tgillyattl@rediff.com', '7137844328', 'pmYUEdOzJ', 'Teddy', 'Gillyatt', 1, NULL),
(24, 'dmacgarrityn@rambler.ru', '3371410306', '7s9MNlM', 'Danika', 'MacGarrity', 0, NULL),
(46, 'huynamnn1@gmail.com', NULL, '$2y$10$7CKE5Uwl0bfw2Q3thxSqGeSVssOLfMstbNlMQWSYC1Rn9z8KHn0rO', 'Nam', 'Trần', 0, b'1'),
(47, 'tienmp3@gmail.com', NULL, '$2y$10$5dRkv68rIQhVQpw6CcF/oecUAwZ0NDs2vVxnZzZ1iEotqK1GNUjzm', 'asd', 'asd', 0, b'1');

--
-- Bẫy `db_user`
--
DROP TRIGGER IF EXISTS `delete_user`;
DELIMITER $$
CREATE TRIGGER `delete_user` BEFORE DELETE ON `db_user` FOR EACH ROW DELETE FROM db_tourhost
    WHERE db_tourhost.host_id = OLD.user_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `view_tour`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_tour`;
CREATE TABLE `view_tour` (
`tour_id` int(11)
,`tour_name` varchar(255)
,`category_name` varchar(50)
,`host_name` varchar(255)
,`tour_long` int(11)
,`starttime` date
,`endtime` date
,`man_price` decimal(10,2)
,`district` varchar(50)
,`country` varchar(60)
,`city` varchar(85)
,`description` varchar(400)
,`address` varchar(150)
,`type` bit(1)
,`is_installment` bit(1)
,`promotion` decimal(5,2)
);

-- --------------------------------------------------------

--
-- Cấu trúc cho view `view_tour`
--
DROP TABLE IF EXISTS `view_tour`;

DROP VIEW IF EXISTS `view_tour`;
CREATE OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tour`  AS SELECT `db_tour`.`tour_id` AS `tour_id`, `db_tour`.`name` AS `tour_name`, `db_tourcategory`.`name` AS `category_name`, `db_tourhost`.`name` AS `host_name`, `db_tour`.`tour_long` AS `tour_long`, `db_tour`.`starttime` AS `starttime`, `db_tour`.`endtime` AS `endtime`, `db_tour`.`man_price` AS `man_price`, `db_tour`.`district` AS `district`, `db_tour`.`country` AS `country`, `db_tour`.`city` AS `city`, `db_tour`.`description` AS `description`, `db_tour`.`address` AS `address`, `db_tourcategory`.`type` AS `type`, `db_tour`.`is_installment` AS `is_installment`, `db_tour`.`promotion` AS `promotion` FROM ((`db_tour` join `db_tourcategory` on(`db_tour`.`category_id` = `db_tourcategory`.`category_id`)) join `db_tourhost` on(`db_tourcategory`.`host_id` = `db_tourhost`.`host_id`)) WHERE `db_tour`.`endtime` >= curdate() AND `db_tour`.`starttime` <= curdate() AND `db_tour`.`status` = 1 ;

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
-- Chỉ mục cho bảng `db_passenger`
--
ALTER TABLE `db_passenger`
  ADD PRIMARY KEY (`passenger_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `db_service`
--
ALTER TABLE `db_service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `tour_id` (`tour_id`);

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
-- Chỉ mục cho bảng `db_tourimg`
--
ALTER TABLE `db_tourimg`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- Chỉ mục cho bảng `db_tourpart`
--
ALTER TABLE `db_tourpart`
  ADD PRIMARY KEY (`part_id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- Chỉ mục cho bảng `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `phonenum` (`phonenum`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `db_order`
--
ALTER TABLE `db_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `db_passenger`
--
ALTER TABLE `db_passenger`
  MODIFY `passenger_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_service`
--
ALTER TABLE `db_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_tour`
--
ALTER TABLE `db_tour`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `db_tourcategory`
--
ALTER TABLE `db_tourcategory`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `db_tourimg`
--
ALTER TABLE `db_tourimg`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `db_tourpart`
--
ALTER TABLE `db_tourpart`
  MODIFY `part_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `db_user`
--
ALTER TABLE `db_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `db_order`
--
ALTER TABLE `db_order`
  ADD CONSTRAINT `db_order_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `db_tour` (`tour_id`);

--
-- Các ràng buộc cho bảng `db_passenger`
--
ALTER TABLE `db_passenger`
  ADD CONSTRAINT `db_passenger_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `db_order` (`order_id`),
  ADD CONSTRAINT `db_passenger_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `db_order` (`order_id`);

--
-- Các ràng buộc cho bảng `db_service`
--
ALTER TABLE `db_service`
  ADD CONSTRAINT `db_service_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `db_tour` (`tour_id`),
  ADD CONSTRAINT `db_service_ibfk_2` FOREIGN KEY (`tour_id`) REFERENCES `db_tour` (`tour_id`);

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
  ADD CONSTRAINT `db_tourhost_ibfk_1` FOREIGN KEY (`host_id`) REFERENCES `db_user` (`user_id`);

--
-- Các ràng buộc cho bảng `db_tourimg`
--
ALTER TABLE `db_tourimg`
  ADD CONSTRAINT `db_tourimg_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `db_tour` (`tour_id`);

--
-- Các ràng buộc cho bảng `db_tourpart`
--
ALTER TABLE `db_tourpart`
  ADD CONSTRAINT `db_tourpart_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `db_tour` (`tour_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
