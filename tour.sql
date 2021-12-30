-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 29, 2021 lúc 05:49 PM
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
CREATE TABLE IF NOT EXISTS `db_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `tour_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `customer_fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_phonenum` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `tour_id` (`tour_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
CREATE TABLE IF NOT EXISTS `db_passenger` (
  `passenger_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `type` int(1) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` int(1) DEFAULT NULL,
  PRIMARY KEY (`passenger_id`,`order_id`),
  KEY `oder_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_passenger`
--

INSERT INTO `db_passenger` (`passenger_id`, `order_id`, `type`, `name`, `birthday`, `sex`) VALUES
(2, 5, 2, 'Cyril Saltman', '2021-09-15', 0),
(3, 2, 2, 'Deanne Gurry', '2021-07-08', 0),
(4, 6, 3, 'Ryley Foulsham', '2021-06-05', 0),
(5, 4, 3, 'Bordy Turle', '2021-07-31', 1),
(6, 5, 3, 'Maddy Blois', '2021-04-12', 1),
(7, 2, 1, 'Jamie Capineer', '2021-01-30', 1),
(8, 3, 2, 'Grady Batchley', '2021-07-01', 0),
(9, 3, 2, 'Alleen Holligan', '2021-01-14', 1),
(10, 2, 2, 'Marion Duesberry', '2021-09-06', 0),
(12, 6, 2, 'Fania Piff', '2021-02-15', 0),
(13, 4, 3, 'Ibrahim Sabater', '2021-11-20', 0),
(14, 3, 3, 'Onfroi Cookes', '2021-08-15', 1),
(15, 5, 3, 'Papageno Marsham', '2021-05-08', 1),
(17, 5, 3, 'Briant Testo', '2021-11-28', 1),
(18, 2, 3, 'Eward Nizet', '2021-04-04', 0),
(19, 3, 1, 'Brice Cathcart', '2021-04-11', 1),
(20, 3, 2, 'Katinka Boeter', '2021-08-29', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_tour`
--

DROP TABLE IF EXISTS `db_tour`;
CREATE TABLE IF NOT EXISTS `db_tour` (
  `tour_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_long` int(11) DEFAULT NULL,
  `tour_loc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starttime` date DEFAULT NULL,
  `endtime` date DEFAULT NULL,
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rules` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `installment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `man_price` decimal(10,2) DEFAULT 0.00,
  `kid_price` decimal(10,2) DEFAULT 0.00,
  `child_price` decimal(10,2) DEFAULT 0.00,
  PRIMARY KEY (`tour_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_tour`
--

INSERT INTO `db_tour` (`tour_id`, `name`, `tour_long`, `tour_loc`, `starttime`, `endtime`, `description`, `rules`, `policy`, `installment`, `category_id`, `man_price`, `kid_price`, `child_price`) VALUES
(1, 'Carpet python', 6, '2 Heffernan Road', '2021-01-30', '2021-04-05', 'Contact with hot toaster, subsequent encounter', 'quis orci nullam molestie nibh in lectus pellentesque at nulla suspendisse potenti cras in purus eu magna vulputate luctus', 'quis justo maecenas rhoncus aliquam lacus morbi quis tortor id nulla ultrices aliquet maecenas leo odio', 'potenti in eleifend quam a odio in hac habitasse platea dictumst', 10, '2923104.00', '378456.00', '35463.00'),
(3, 'Lizard, desert spiny', 6, '8968 Montana Court', '2021-02-03', '2021-01-25', 'Maternal care for other isoimmunization, unspecified trimester, fetus 1', 'nisi volutpat eleifend donec ut dolor morbi vel lectus in quam fringilla rhoncus mauris enim leo rhoncus sed vestibulum sit', 'sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus', 'neque vestibulum eget vulputate ut ultrices vel augue vestibulum ante', 7, '6788603.00', '492189.00', '46130.00'),
(4, 'Bear, black', 2, '14 Myrtle Center', '2021-01-14', '2021-02-05', 'Motorcycle passenger injured in collision with heavy transport vehicle or bus in nontraffic accident, initial encounter', 'nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer tincidunt ante', 'sapien arcu sed augue aliquam erat volutpat in congue etiam justo etiam pretium iaculis justo in', 'posuere cubilia curae mauris viverra diam vitae quam suspendisse potenti nullam porttitor', 7, '9445455.00', '317164.00', '78108.00'),
(5, 'Baleen whale', 3, '20 Monica Hill', '2021-01-04', '2021-03-07', 'Deformity of orbit due to trauma or surgery', 'libero nullam sit amet turpis elementum ligula vehicula consequat morbi a ipsum integer a nibh', 'suscipit ligula in lacus curabitur at ipsum ac tellus semper interdum mauris ullamcorper purus', 'dapibus dolor vel est donec odio justo sollicitudin ut suscipit', 9, '4900305.00', '421349.00', '82086.00'),
(6, 'Numbat', 1, '2 Larry Way', '2021-02-02', '2021-02-14', 'Unspecified injury of unspecified part of colon', 'sapien cursus vestibulum proin eu mi nulla ac enim in tempor turpis nec euismod scelerisque quam turpis adipiscing', 'platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum at lorem integer tincidunt ante vel ipsum', 'dui nec nisi volutpat eleifend donec ut dolor morbi vel lectus in quam', 8, '9214292.00', '127903.00', '92159.00'),
(7, 'African polecat', 1, '1 Bashford Plaza', '2021-01-19', '2021-02-06', 'Injury of right internal carotid artery, intracranial portion, not elsewhere classified with loss of consciousness of 1 hour to 5 hours 59 minutes', 'lorem ipsum dolor sit amet consectetuer adipiscing elit proin interdum', 'ipsum ac tellus semper interdum mauris ullamcorper purus sit amet nulla quisque arcu libero rutrum', 'luctus ultricies eu nibh quisque id justo sit amet sapien dignissim vestibulum vestibulum ante ipsum primis', 4, '3055753.00', '165747.00', '28250.00'),
(8, 'Devil, tasmanian', 3, '61377 Thackeray Terrace', '2021-01-01', '2021-02-02', 'War operations involving direct blast effect of nuclear weapon, civilian, initial encounter', 'penatibus et magnis dis parturient montes nascetur ridiculus mus etiam vel augue vestibulum rutrum rutrum neque aenean auctor gravida sem', 'quam sapien varius ut blandit non interdum in ante vestibulum ante ipsum primis in faucibus orci luctus et ultrices', 'potenti cras in purus eu magna vulputate luctus cum sociis natoque penatibus et magnis dis parturient montes', 8, '2713526.00', '413669.00', '40774.00'),
(9, 'Tammar wallaby', 5, '524 Forest Dale Place', '2021-02-07', '2021-02-18', 'Other nondisplaced fracture of base of first metacarpal bone, unspecified hand, subsequent encounter for fracture with nonunion', 'in faucibus orci luctus et ultrices posuere cubilia curae duis faucibus accumsan odio curabitur', 'id consequat in consequat ut nulla sed accumsan felis ut at dolor quis odio consequat varius integer ac leo pellentesque', 'donec ut mauris eget massa tempor convallis nulla neque libero convallis eget eleifend luctus ultricies', 10, '652407.00', '351646.00', '75322.00'),
(10, 'Grey phalarope', 5, '16184 Chinook Plaza', '2021-01-13', '2021-02-17', 'Corrosion of third degree of right shoulder, subsequent encounter', 'placerat praesent blandit nam nulla integer pede justo lacinia eget tincidunt eget tempus vel pede morbi porttitor lorem id ligula', 'at nulla suspendisse potenti cras in purus eu magna vulputate luctus cum', 'lacus morbi sem mauris laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui', 9, '6980668.00', '426052.00', '37677.00'),
(11, 'Red-knobbed coot', 6, '7900 Boyd Terrace', '2021-01-09', '2021-02-14', 'Poisoning by unspecified hormone antagonists, intentional self-harm, initial encounter', 'viverra dapibus nulla suscipit ligula in lacus curabitur at ipsum ac', 'rutrum nulla nunc purus phasellus in felis donec semper sapien a libero nam dui proin leo odio porttitor id consequat', 'amet lobortis sapien sapien non mi integer ac neque duis bibendum morbi non quam nec dui luctus rutrum', 5, '5310612.00', '136356.00', '26719.00'),
(12, 'White rhinoceros', 6, '69 Columbus Parkway', '2021-01-15', '2021-02-26', 'Unspecified injury of flexor muscle, fascia and tendon of left ring finger at wrist and hand level, sequela', 'proin at turpis a pede posuere nonummy integer non velit', 'a suscipit nulla elit ac nulla sed vel enim sit amet nunc viverra', 'justo sollicitudin ut suscipit a feugiat et eros vestibulum ac', 9, '7117673.00', '115027.00', '96719.00'),
(13, 'Green-winged trumpeter', 7, '6766 Schiller Drive', '2020-12-29', '2021-03-07', 'Lead-induced chronic gout, left knee, without tophus (tophi)', 'fermentum donec ut mauris eget massa tempor convallis nulla neque libero convallis', 'at lorem integer tincidunt ante vel ipsum praesent blandit lacinia erat vestibulum sed magna at', 'nunc rhoncus dui vel sem sed sagittis nam congue risus semper porta volutpat quam pede', 9, '4094514.00', '423944.00', '93871.00'),
(14, 'Stork, black-necked', 5, '4331 Independence Terrace', '2021-01-05', '2021-02-11', 'Burn of cornea and conjunctival sac, right eye, subsequent encounter', 'nisl ut volutpat sapien arcu sed augue aliquam erat volutpat in congue etiam justo', 'nam nulla integer pede justo lacinia eget tincidunt eget tempus vel', 'in purus eu magna vulputate luctus cum sociis natoque penatibus', 2, '3488749.00', '194957.00', '96736.00'),
(15, 'Indian tree pie', 6, '751 Washington Terrace', '2021-01-20', '2021-04-02', 'Sprain of metacarpophalangeal joint of unspecified finger, subsequent encounter', 'amet nulla quisque arcu libero rutrum ac lobortis vel dapibus at', 'tempus semper est quam pharetra magna ac consequat metus sapien ut nunc vestibulum', 'et tempus semper est quam pharetra magna ac consequat metus sapien ut nunc vestibulum ante ipsum primis', 7, '4763343.00', '380204.00', '46445.00');

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
CREATE TABLE IF NOT EXISTS `db_tourcategory` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  KEY `host_id` (`host_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_tourcategory`
--

INSERT INTO `db_tourcategory` (`category_id`, `name`, `host_id`) VALUES
(2, 'Epoxy Flooring', 5),
(3, 'Marlite Panels (FED)', 6),
(4, 'Retaining Wall and Brick Pavers', 7),
(5, 'Landscaping & Irrigation', 7),
(6, 'Soft Flooring and Base', 7),
(7, 'Ornamental Railings', 9),
(8, 'Overhead Doors', 2),
(9, 'Ornamental Railings', 4),
(10, 'Hard Tile & Stone', 7),
(12, 'Plumbing & Medical Gas', 4),
(13, 'Structural & Misc Steel Erection', 6),
(14, 'Electrical and Fire Alarm', 7),
(15, 'Fire Sprinkler System', 9);

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
CREATE TABLE IF NOT EXISTS `db_tourhost` (
  `host_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`host_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_tourhost`
--

INSERT INTO `db_tourhost` (`host_id`, `name`, `address`, `website`) VALUES
(1, 'Fivespan', '2 Hayes Lane', 'http://t-online.de'),
(2, 'Skipfire', '8465 Birchwood Parkway', 'https://blogspot.com'),
(3, 'Aivee', '9 Farragut Road', 'https://telegraph.co.uk'),
(4, 'Edgepulse', '5101 Warrior Court', 'http://archive.org'),
(5, 'Agivu', '2 Delaware Pass', 'http://imageshack.us'),
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
-- Cấu trúc bảng cho bảng `db_tourpart`
--

DROP TABLE IF EXISTS `db_tourpart`;
CREATE TABLE IF NOT EXISTS `db_tourpart` (
  `tour_id` int(11) NOT NULL,
  `part_num` int(11) NOT NULL,
  `start_time` time DEFAULT NULL,
  `loc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`tour_id`,`part_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_tourpart`
--

INSERT INTO `db_tourpart` (`tour_id`, `part_num`, `start_time`, `loc`, `info`) VALUES
(1, 1, '01:02:00', '5157 Carberry Plaza', 'a ipsum integer a nibh in quis justo maecenas rhoncus aliquam lacus morbi quis tortor id nulla ultrices aliquet maecenas'),
(1, 2, '07:13:00', '00 Corry Alley', 'nunc donec quis orci eget orci vehicula condimentum curabitur in libero'),
(1, 3, '11:11:00', '779 Dayton Point', 'morbi sem mauris laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel sem sed sagittis nam congue'),
(5, 1, '04:10:00', '1516 Ryan Plaza', 'at dolor quis odio consequat varius integer ac leo pellentesque ultrices mattis odio donec vitae nisi nam'),
(6, 1, '04:38:00', '38760 Parkside Alley', 'cras non velit nec nisi vulputate nonummy maecenas tincidunt lacus at velit vivamus'),
(6, 2, '05:27:00', '0316 Mallory Junction', 'at nulla suspendisse potenti cras in purus eu magna vulputate luctus cum sociis'),
(7, 1, '03:34:00', '11871 Dottie Plaza', 'varius ut blandit non interdum in ante vestibulum ante ipsum primis'),
(8, 3, '11:36:00', '59 Di Loreto Terrace', 'gravida sem praesent id massa id nisl venenatis lacinia aenean sit amet justo morbi ut odio cras mi'),
(9, 2, '09:09:00', '507 Paget Plaza', 'iaculis diam erat fermentum justo nec condimentum neque sapien placerat ante nulla'),
(9, 3, '05:51:00', '2660 Hooker Pass', 'blandit non interdum in ante vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae duis'),
(11, 2, '05:38:00', '554 Eagan Road', 'sagittis nam congue risus semper porta volutpat quam pede lobortis ligula'),
(13, 1, '08:09:00', '0 Dahle Junction', 'vivamus tortor duis mattis egestas metus aenean fermentum donec ut'),
(13, 2, '09:33:00', '48 Darwin Hill', 'convallis morbi odio odio elementum eu interdum eu tincidunt in leo maecenas pulvinar lobortis est phasellus sit amet erat'),
(15, 1, '00:32:00', '9790 Schiller Way', 'accumsan odio curabitur convallis duis consequat dui nec nisi volutpat eleifend donec ut dolor morbi vel lectus in');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_user`
--

DROP TABLE IF EXISTS `db_user`;
CREATE TABLE IF NOT EXISTS `db_user` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenum` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` int(1) DEFAULT 0,
  PRIMARY KEY (`account_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_user`
--

INSERT INTO `db_user` (`account_id`, `email`, `phonenum`, `password`, `first_name`, `last_name`, `permission`) VALUES
(1, 'irozec0@mysql.com', '4469780212', '4Rtx7OBiB', 'Iolanthe', 'Rozec', 1),
(2, 'fmccullough1@chron.com', '4455350334', 'fXA3VxLA', 'Felike', 'McCullough', 1),
(3, 'battrie2@wix.com', '3525459553', 'ePrjrcDOGpRr', 'Betsey', 'Attrie', 0),
(4, 'belwel3@time.com', '5623488144', 'JqkLbPB', 'Blair', 'Elwel', 0),
(5, 'mwormleighton4@bandcamp.com', '1827560335', 'mbu0JfkLS', 'Maxy', 'Wormleighton', 0),
(6, 'zbenterman5@chronoengine.com', '7871475428', 'JPdjQCreUGWY', 'Zonnya', 'Benterman', 0),
(7, 'gmaud6@flavors.me', '4619935410', '3R08PON', 'Gracie', 'Maud', 1),
(9, 'lgritland8@behance.net', '1895156515', 'xgRK2mOEUMw', 'Lavinie', 'Gritland', 1),
(11, 'ibottinia@ow.ly', '5445393405', 'xi6HYO', 'Ira', 'Bottini', 1),
(12, 'hshrimptoneb@china.com.cn', '3367659875', 'JPMdlTmpX1r', 'Harald', 'Shrimptone', 0),
(13, 'gpontenc@desdev.cn', '1015026468', 'Zcr4hfMtW', 'Grantley', 'Ponten', 0),
(14, 'jmatyd@sciencedirect.com', '4357367644', 'ygkBlb8cvX', 'Joell', 'Maty', 0),
(15, 'hmorade@weibo.com', '3071371093', 'EUmTxvGwG', 'Hermy', 'Morad', 0),
(16, 'pniesingf@usa.gov', '1225037212', 'fFj82gp', 'Porty', 'Niesing', 1),
(17, 'sgilhooleyg@tinypic.com', '8546032162', 'oWy7kJq', 'Sheffield', 'Gilhooley', 0),
(18, 'mscutcheonh@who.int', '8413153538', 'l8I0R6WmWyJ', 'Marja', 'Scutcheon', 1),
(19, 'nblazejewskii@google.co.uk', '3122542164', 'gczNt8x', 'Nicko', 'Blazejewski', 0),
(20, 'sbaloghj@google.co.jp', '1716987634', 'xxIApm851', 'Sue', 'Balogh', 1),
(21, 'hjeandelk@salon.com', '1387078441', 'nARTVzLsSw', 'Hildegarde', 'Jeandel', 1),
(22, 'tgillyattl@rediff.com', '7137844328', 'pmYUEdOzJ', 'Teddy', 'Gillyatt', 1),
(23, 'aghidinim@artisteer.com', '2958813480', 'ELfF2S8N1HdV', 'Ansel', 'Ghidini', 1),
(24, 'dmacgarrityn@rambler.ru', '3371410306', '7s9MNlM', 'Danika', 'MacGarrity', 0),
(25, 'xpuddeno@admin.ch', '8533537442', 'CenhDOb', 'Xenos', 'Pudden', 1);

--
-- Bẫy `db_user`
--
DROP TRIGGER IF EXISTS `delete_user`;
DELIMITER $$
CREATE TRIGGER `delete_user` BEFORE DELETE ON `db_user` FOR EACH ROW DELETE FROM db_tourhost
    WHERE db_tourhost.host_id = OLD.account_id
$$
DELIMITER ;

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
  ADD CONSTRAINT `db_passenger_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `db_order` (`order_id`);

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
  ADD CONSTRAINT `db_tourhost_ibfk_1` FOREIGN KEY (`host_id`) REFERENCES `db_user` (`account_id`);

--
-- Các ràng buộc cho bảng `db_tourpart`
--
ALTER TABLE `db_tourpart`
  ADD CONSTRAINT `db_tourpart_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `db_tour` (`tour_id`);


--
-- Siêu dữ liệu
--
USE `phpmyadmin`;

--
-- Siêu dữ liệu cho bảng db_order
--

--
-- Siêu dữ liệu cho bảng db_passenger
--

--
-- Siêu dữ liệu cho bảng db_tour
--

--
-- Siêu dữ liệu cho bảng db_tourcategory
--

--
-- Siêu dữ liệu cho bảng db_tourhost
--

--
-- Siêu dữ liệu cho bảng db_tourpart
--

--
-- Siêu dữ liệu cho bảng db_user
--

--
-- Siêu dữ liệu cho cơ sở dữ liệu tour
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
