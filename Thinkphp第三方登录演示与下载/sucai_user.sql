-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 07 月 07 日 00:45
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `sdk`
--

-- --------------------------------------------------------

--
-- 表的结构 `sucai_user`
--

CREATE TABLE IF NOT EXISTS `sucai_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `nickname` varchar(30) DEFAULT NULL,
  `pwd` varchar(50) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `avatar` varchar(200) DEFAULT '',
  `logintime` int(10) NOT NULL,
  `loginip` varchar(30) DEFAULT NULL,
  `qq` varchar(250) DEFAULT NULL,
  `sina` varchar(250) DEFAULT NULL,
  `renren` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=349 ;

--
-- 转存表中的数据 `sucai_user`
--

INSERT INTO `sucai_user` (`id`, `name`, `nickname`, `pwd`, `email`, `avatar`, `logintime`, `loginip`, `qq`, `sina`, `renren`) VALUES
(1, 'sucai', '二当家的', '96e79218965eb72c92a549dd5a330112', '826096331@qq.com', '1.jpg', 1435729777, '180.169.91.183', '', '', NULL),
(2, '111111', '111111', '96e79218965eb72c92a549dd5a330112', '111111@qq.com', '', 1435323259, '222.71.199.141', '2F80831413E7EAF34617BE1CF288EA36', '3994190176', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
