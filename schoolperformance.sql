-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 29, 2024 lúc 06:08 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `schoolperformance`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `datapoints`
--

CREATE TABLE `datapoints` (
  `id` int(11) NOT NULL,
  `datapoint` int(11) NOT NULL,
  `descriptionlabelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `datapoints`
--

INSERT INTO `datapoints` (`id`, `datapoint`, `descriptionlabelid`) VALUES
(1, 10, 1),
(2, 8, 1),
(3, 5, 1),
(4, 7, 1),
(5, 6, 1),
(6, 9, 1),
(7, 10, 1),
(8, 15, 1),
(9, 20, 1),
(10, 10, 1),
(11, 15, 1),
(12, 9, 1),
(13, 5, 2),
(14, 10, 2),
(15, 8, 2),
(16, 15, 2),
(17, 7, 2),
(18, 9, 2),
(19, 20, 2),
(20, 18, 2),
(21, 5, 2),
(22, 8, 2),
(23, 9, 2),
(24, 5, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `descriptionlabels`
--

CREATE TABLE `descriptionlabels` (
  `id` int(11) NOT NULL,
  `descriptionlabel` varchar(20) NOT NULL,
  `bgcolor` varchar(25) NOT NULL,
  `bordercolor` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `descriptionlabels`
--

INSERT INTO `descriptionlabels` (`id`, `descriptionlabel`, `bgcolor`, `bordercolor`) VALUES
(1, 'thisweek', 'rgba(214, 128, 172, 0.2)', 'rgba(214, 128, 172, 1)'),
(2, 'lastweek', 'rgba(122, 146, 255, 0.3)', 'rgba(122, 146, 255, 1)');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `datapoints`
--
ALTER TABLE `datapoints`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `descriptionlabels`
--
ALTER TABLE `descriptionlabels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `datapoints`
--
ALTER TABLE `datapoints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `descriptionlabels`
--
ALTER TABLE `descriptionlabels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
