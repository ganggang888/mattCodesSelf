-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-09-14 11:52:31
-- 服务器版本： 10.0.16-MariaDB
-- PHP Version: 5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `group`
--

-- --------------------------------------------------------

--
-- 表的结构 `m_links`
--

CREATE TABLE IF NOT EXISTS `m_links` (
  `id` bigint(20) unsigned NOT NULL,
  `link_url` varchar(255) NOT NULL COMMENT '友情链接地址',
  `link_name` varchar(255) NOT NULL COMMENT '友情链接名称',
  `link_image` varchar(255) DEFAULT NULL COMMENT '友情链接图标',
  `link_target` varchar(25) NOT NULL DEFAULT '_blank' COMMENT '友情链接打开方式',
  `link_description` text NOT NULL COMMENT '友情链接描述',
  `link_status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1显示，0不显示',
  `link_rating` int(11) NOT NULL DEFAULT '0' COMMENT '友情链接评级',
  `link_rel` varchar(255) DEFAULT NULL COMMENT '链接与网站的关系',
  `listorder` int(10) NOT NULL DEFAULT '0' COMMENT '排序'
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='友情链接表';

--
-- 转存表中的数据 `m_links`
--

INSERT INTO `m_links` (`id`, `link_url`, `link_name`, `link_image`, `link_target`, `link_description`, `link_status`, `link_rating`, `link_rel`, `listorder`) VALUES
(1, 'http://www.thinkcmf.com', 'ThinkCMF', '', '_blank', '', 1, 0, '', 0),
(2, '123456', '456789', NULL, '_blank', '', 1, 0, NULL, 0),
(3, '123456', '456789', NULL, '_blank', '', 1, 0, NULL, 0),
(4, '123456', '456789', NULL, '_blank', '', 1, 0, NULL, 0),
(5, '123456', '456789', NULL, '_blank', '', 1, 0, NULL, 0),
(6, '123456', '456789', NULL, '_blank', '', 1, 0, NULL, 0),
(8, '嘻嘻嘻', '哇哈哈哈', NULL, '_blank', '', 1, 0, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_links`
--
ALTER TABLE `m_links`
  ADD PRIMARY KEY (`id`), ADD KEY `link_visible` (`link_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_links`
--
ALTER TABLE `m_links`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
