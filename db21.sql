-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2025 年 09 月 09 日 07:05
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db21`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `level` int(1) UNSIGNED NOT NULL,
  `length` int(10) UNSIGNED NOT NULL,
  `ondate` date NOT NULL,
  `publish` text NOT NULL,
  `director` text NOT NULL,
  `trailer` text NOT NULL,
  `poster` text NOT NULL,
  `intro` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `trailer`, `poster`, `intro`, `sh`, `rank`) VALUES
(1, '院線片01', 1, 120, '2025-09-10', '院線片01的發行商', '院線片01的導演', '03B01v.mp4', '03B01.png', '院線片01的劇情介紹院線片01的劇情介紹院線片01的劇情介紹', 1, 1),
(2, '院線片02', 2, 125, '2025-09-11', '院線片02的發行商', '院線片02的導演', '03B02v.mp4', '03B02.png', '院線片02的劇情介紹院線片02的劇情介紹院線片02的劇情介紹', 1, 2),
(3, '院線片03', 3, 130, '2025-09-10', '院線片03的發行商', '院線片03的導演', '03B03v.mp4', '03B03.png', '院線片03的劇情介紹院線片03的劇情介紹院線片03的劇情介紹', 1, 3),
(4, '院線片04', 1, 120, '2025-09-11', '院線片04的發行商', '院線片04的導演', '03B04v.mp4', '03B04.png', '院線片04的劇情介紹院線片04的劇情介紹院線片04的劇情介紹', 1, 4),
(5, '院線片05', 1, 120, '2025-09-10', '院線片05的發行商', '院線片05的導演', '03B05v.mp4', '03B05.png', '院線片05的劇情介紹院線片05的劇情介紹院線片05的劇情介紹', 1, 5),
(6, '院線片06', 2, 125, '2025-09-11', '院線片06的發行商', '院線片06的導演', '03B06v.mp4', '03B06.png', '院線片06的劇情介紹院線片06的劇情介紹院線片06的劇情介紹', 1, 6),
(7, '院線片07', 1, 130, '2025-09-12', '院線片07的發行商', '院線片07的導演', '03B07v.mp4', '03B07.png', '院線片07的劇情介紹院線片07的劇情介紹院線片07的劇情介紹', 1, 7),
(8, '院線片08', 2, 120, '2025-09-13', '院線片08的發行商', '院線片08的導演', '03B08v.mp4', '03B08.png', '院線片08的劇情介紹院線片08的劇情介紹院線片08的劇情介紹', 1, 8),
(9, '院線片09', 3, 125, '2025-09-12', '院線片09的發行商', '院線片09的導演', '03B09v.mp4', '03B09.png', '院線片09的劇情介紹院線片09的劇情介紹院線片09的劇情介紹', 1, 9),
(10, '院線片10', 1, 130, '2025-09-10', '院線片10的發行商', '院線片10的導演', '03B10v.mp4', '03B10.png', '院線片10的劇情介紹院線片10的劇情介紹院線片10的劇情介紹', 1, 10);

-- --------------------------------------------------------

--
-- 資料表結構 `posters`
--

CREATE TABLE `posters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL,
  `ani` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `posters`
--

INSERT INTO `posters` (`id`, `name`, `img`, `sh`, `rank`, `ani`) VALUES
(1, '預告片01', '03A01.jpg', 1, 1, 2),
(2, '預告片02', '03A02.jpg', 1, 2, 3),
(3, '預告片03', '03A03.jpg', 1, 3, 2),
(4, '預告片04', '03A04.jpg', 1, 4, 1),
(6, '預告片05', '03A05.jpg', 1, 5, 1),
(7, '預告片06', '03A06.jpg', 1, 7, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `posters`
--
ALTER TABLE `posters`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `posters`
--
ALTER TABLE `posters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
