-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： mysql
-- 生成日期： 2019-03-03 05:09:12
-- 服务器版本： 5.7.23
-- PHP 版本： 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `DNMP`
--

-- --------------------------------------------------------

--
-- 表的结构 `servers`
--

CREATE TABLE `servers` (
  `id` int(11) NOT NULL,
  `hostname` text CHARACTER SET utf8mb4 NOT NULL,
  `ipv4` text CHARACTER SET utf8mb4 NOT NULL,
  `ipv6` text CHARACTER SET utf8mb4,
  `nginx` varchar(3) CHARACTER SET utf8mb4 NOT NULL DEFAULT '0' COMMENT '0/1',
  `phpfpm` varchar(3) CHARACTER SET utf8mb4 NOT NULL DEFAULT '0' COMMENT '0/1',
  `mysql` varchar(3) CHARACTER SET utf8mb4 NOT NULL DEFAULT '0' COMMENT '0/1',
  `proxy` varchar(3) CHARACTER SET utf8mb4 NOT NULL DEFAULT '0' COMMENT '0/1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 表的结构 `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `settings`
--

INSERT INTO `settings` (`id`, `name`, `data`) VALUES
(1, 'usercookie', ''),
(2, 'dom', ''),
(3, 'secret', '');

-- --------------------------------------------------------

--
-- 表的结构 `status`
--

CREATE TABLE `status` (
  `username` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `type` varchar(20) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'UNKOWN',
  `host` varchar(30) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'UNKOWN',
  `location` varchar(20) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'UNKOWN',
  `password` varchar(20) CHARACTER SET utf8mb4 NOT NULL DEFAULT '1234'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转储表的索引
--

--
-- 表的索引 `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `servers`
--
ALTER TABLE `servers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
