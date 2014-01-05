-- phpMyAdmin SQL Dump
-- version 3.4.8
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 12 月 19 日 20:23
-- 服务器版本: 5.5.28
-- PHP 版本: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 关闭； 1 开启； 2 删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `activity`
--

INSERT INTO `activity` (`id`, `name`, `status`) VALUES
(1, '2013年第三届年终爆米花盛典', 0);

-- --------------------------------------------------------

--
-- 表的结构 `apply`
--

CREATE TABLE IF NOT EXISTS `apply` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `activity_id` int(10) NOT NULL,
  `code` char(10) NOT NULL COMMENT '验证码',
  `uid` int(10) NOT NULL COMMENT '论坛uid',
  `miid` int(10) NOT NULL COMMENT '米聊号',
  `nickname` char(20) NOT NULL,
  `phone` char(20) NOT NULL,
  `sign_dateline` int(10) NOT NULL DEFAULT '0' COMMENT '签到时间，0表示未签到',
  `sign_off_dateline` int(10) NOT NULL DEFAULT '0' COMMENT '签退时间，0表示未签退',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 未中间 1 中奖未领奖 2 已经领奖',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
