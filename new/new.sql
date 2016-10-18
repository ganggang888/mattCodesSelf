-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-10-10 16:34:13
-- 服务器版本： 10.0.16-MariaDB
-- PHP Version: 5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `new`
--

-- --------------------------------------------------------

--
-- 表的结构 `sp_ad`
--

CREATE TABLE IF NOT EXISTS `sp_ad` (
  `ad_id` bigint(20) NOT NULL COMMENT '广告id',
  `ad_name` varchar(255) NOT NULL,
  `ad_content` text,
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1显示，0不显示'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sp_aid`
--

CREATE TABLE IF NOT EXISTS `sp_aid` (
  `id` mediumint(9) NOT NULL,
  `parentid` mediumint(9) NOT NULL COMMENT '父',
  `name` varchar(150) NOT NULL COMMENT '名称',
  `term` tinyint(4) NOT NULL COMMENT '分类',
  `benefit` text NOT NULL COMMENT '好处',
  `img` varchar(200) NOT NULL COMMENT '缩略图',
  `gif` varchar(200) NOT NULL,
  `addtime` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_aid`
--

INSERT INTO `sp_aid` (`id`, `parentid`, `name`, `term`, `benefit`, `img`, `gif`, `addtime`) VALUES
(9, 0, '视觉处理系列', 3, '<p>视觉处理系列</p>', '', '', '2015-10-10 13:55:13'),
(10, 0, '大肢体系列', 2, '', '', '', '2015-10-10 13:55:32'),
(11, 0, '手眼协调系列', 1, '', '', '', '2015-10-10 13:55:45'),
(12, 0, '视觉系列', 1, '', '', '', '2015-10-10 13:55:56'),
(13, 0, '抓握系列', 1, '', '', '', '2015-10-10 13:56:06'),
(14, 0, '听觉系列', 1, '', '', '', '2015-10-10 13:56:14'),
(15, 9, '弯柄串珠', 3, '<p>fddgfdgfd</p>', '/new/data/upload/5618b0b9d8634.jpg', 'uploads/8.jpg', '2015-10-10 14:31:30'),
(16, 9, '彩带', 2, '<p>彩带</p>', '/new/data/upload/5618b4850d270.jpg', 'uploads/4.jpg', '2015-10-10 14:47:40');

-- --------------------------------------------------------

--
-- 表的结构 `sp_asset`
--

CREATE TABLE IF NOT EXISTS `sp_asset` (
  `aid` bigint(20) NOT NULL,
  `key` varchar(50) NOT NULL,
  `filename` varchar(50) DEFAULT NULL,
  `filesize` int(11) DEFAULT NULL,
  `filepath` varchar(200) NOT NULL,
  `uploadtime` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `meta` text,
  `suffix` varchar(50) DEFAULT NULL,
  `download_times` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sp_auth_access`
--

CREATE TABLE IF NOT EXISTS `sp_auth_access` (
  `role_id` mediumint(8) unsigned NOT NULL COMMENT '角色',
  `rule_name` varchar(255) NOT NULL COMMENT '规则唯一英文标识,全小写',
  `type` varchar(30) DEFAULT NULL COMMENT '权限规则分类，请加应用前缀,如admin_'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sp_auth_rule`
--

CREATE TABLE IF NOT EXISTS `sp_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL COMMENT '规则id,自增主键',
  `module` varchar(20) NOT NULL COMMENT '规则所属module',
  `type` varchar(30) NOT NULL DEFAULT '1' COMMENT '权限规则分类，请加应用前缀,如admin_',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '规则唯一英文标识,全小写',
  `param` varchar(255) DEFAULT NULL COMMENT '额外url参数',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '规则中文描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否有效(0:无效,1:有效)',
  `condition` varchar(300) NOT NULL DEFAULT '' COMMENT '规则附加条件'
) ENGINE=MyISAM AUTO_INCREMENT=168 DEFAULT CHARSET=utf8 COMMENT='权限规则表';

--
-- 转存表中的数据 `sp_auth_rule`
--

INSERT INTO `sp_auth_rule` (`id`, `module`, `type`, `name`, `param`, `title`, `status`, `condition`) VALUES
(1, 'Admin', 'admin_url', 'admin/content/default', NULL, '内容管理', 1, ''),
(2, 'Api', 'admin_url', 'api/guestbookadmin/index', NULL, '所有留言', 1, ''),
(3, 'Api', 'admin_url', 'api/guestbookadmin/delete', NULL, '删除网站留言', 1, ''),
(4, 'Comment', 'admin_url', 'comment/commentadmin/index', NULL, '评论管理', 1, ''),
(5, 'Comment', 'admin_url', 'comment/commentadmin/delete', NULL, '删除评论', 1, ''),
(6, 'Comment', 'admin_url', 'comment/commentadmin/check', NULL, '评论审核', 1, ''),
(7, 'Portal', 'admin_url', 'portal/adminpost/index', NULL, '文章管理', 1, ''),
(8, 'Portal', 'admin_url', 'portal/adminpost/listorders', NULL, '文章排序', 1, ''),
(9, 'Portal', 'admin_url', 'portal/adminpost/top', NULL, '文章置顶', 1, ''),
(10, 'Portal', 'admin_url', 'portal/adminpost/recommend', NULL, '文章推荐', 1, ''),
(11, 'Portal', 'admin_url', 'portal/adminpost/move', NULL, '批量移动', 1, ''),
(12, 'Portal', 'admin_url', 'portal/adminpost/check', NULL, '文章审核', 1, ''),
(13, 'Portal', 'admin_url', 'portal/adminpost/delete', NULL, '删除文章', 1, ''),
(14, 'Portal', 'admin_url', 'portal/adminpost/edit', NULL, '编辑文章', 1, ''),
(15, 'Portal', 'admin_url', 'portal/adminpost/edit_post', NULL, '提交编辑', 1, ''),
(16, 'Portal', 'admin_url', 'portal/adminpost/add', NULL, '添加文章', 1, ''),
(17, 'Portal', 'admin_url', 'portal/adminpost/add_post', NULL, '提交添加', 1, ''),
(18, 'Portal', 'admin_url', 'portal/adminterm/index', NULL, '分类管理', 1, ''),
(19, 'Portal', 'admin_url', 'portal/adminterm/listorders', NULL, '文章分类排序', 1, ''),
(20, 'Portal', 'admin_url', 'portal/adminterm/delete', NULL, '删除分类', 1, ''),
(21, 'Portal', 'admin_url', 'portal/adminterm/edit', NULL, '编辑分类', 1, ''),
(22, 'Portal', 'admin_url', 'portal/adminterm/edit_post', NULL, '提交编辑', 1, ''),
(23, 'Portal', 'admin_url', 'portal/adminterm/add', NULL, '添加分类', 1, ''),
(24, 'Portal', 'admin_url', 'portal/adminterm/add_post', NULL, '提交添加', 1, ''),
(25, 'Portal', 'admin_url', 'portal/adminpage/index', NULL, '页面管理', 1, ''),
(26, 'Portal', 'admin_url', 'portal/adminpage/listorders', NULL, '页面排序', 1, ''),
(27, 'Portal', 'admin_url', 'portal/adminpage/delete', NULL, '删除页面', 1, ''),
(28, 'Portal', 'admin_url', 'portal/adminpage/edit', NULL, '编辑页面', 1, ''),
(29, 'Portal', 'admin_url', 'portal/adminpage/edit_post', NULL, '提交编辑', 1, ''),
(30, 'Portal', 'admin_url', 'portal/adminpage/add', NULL, '添加页面', 1, ''),
(31, 'Portal', 'admin_url', 'portal/adminpage/add_post', NULL, '提交添加', 1, ''),
(32, 'Admin', 'admin_url', 'admin/recycle/default', NULL, '回收站', 1, ''),
(33, 'Portal', 'admin_url', 'portal/adminpost/recyclebin', NULL, '文章回收', 1, ''),
(34, 'Portal', 'admin_url', 'portal/adminpost/restore', NULL, '文章还原', 1, ''),
(35, 'Portal', 'admin_url', 'portal/adminpost/clean', NULL, '彻底删除', 1, ''),
(36, 'Portal', 'admin_url', 'portal/adminpage/recyclebin', NULL, '页面回收', 1, ''),
(37, 'Portal', 'admin_url', 'portal/adminpage/clean', NULL, '彻底删除', 1, ''),
(38, 'Portal', 'admin_url', 'portal/adminpage/restore', NULL, '页面还原', 1, ''),
(39, 'Admin', 'admin_url', 'admin/extension/default', NULL, '扩展工具', 1, ''),
(40, 'Admin', 'admin_url', 'admin/backup/default', NULL, '备份管理', 1, ''),
(41, 'Admin', 'admin_url', 'admin/backup/restore', NULL, '数据还原', 1, ''),
(42, 'Admin', 'admin_url', 'admin/backup/index', NULL, '数据备份', 1, ''),
(43, 'Admin', 'admin_url', 'admin/backup/index_post', NULL, '提交数据备份', 1, ''),
(44, 'Admin', 'admin_url', 'admin/backup/download', NULL, '下载备份', 1, ''),
(45, 'Admin', 'admin_url', 'admin/backup/del_backup', NULL, '删除备份', 1, ''),
(46, 'Admin', 'admin_url', 'admin/backup/import', NULL, '数据备份导入', 1, ''),
(47, 'Admin', 'admin_url', 'admin/plugin/index', NULL, '插件管理', 1, ''),
(48, 'Admin', 'admin_url', 'admin/plugin/toggle', NULL, '插件启用切换', 1, ''),
(49, 'Admin', 'admin_url', 'admin/plugin/setting', NULL, '插件设置', 1, ''),
(50, 'Admin', 'admin_url', 'admin/plugin/setting_post', NULL, '插件设置提交', 1, ''),
(51, 'Admin', 'admin_url', 'admin/plugin/install', NULL, '插件安装', 1, ''),
(52, 'Admin', 'admin_url', 'admin/plugin/uninstall', NULL, '插件卸载', 1, ''),
(53, 'Admin', 'admin_url', 'admin/slide/default', NULL, '幻灯片', 1, ''),
(54, 'Admin', 'admin_url', 'admin/slide/index', NULL, '幻灯片管理', 1, ''),
(55, 'Admin', 'admin_url', 'admin/slide/listorders', NULL, '幻灯片排序', 1, ''),
(56, 'Admin', 'admin_url', 'admin/slide/toggle', NULL, '幻灯片显示切换', 1, ''),
(57, 'Admin', 'admin_url', 'admin/slide/delete', NULL, '删除幻灯片', 1, ''),
(58, 'Admin', 'admin_url', 'admin/slide/edit', NULL, '编辑幻灯片', 1, ''),
(59, 'Admin', 'admin_url', 'admin/slide/edit_post', NULL, '提交编辑', 1, ''),
(60, 'Admin', 'admin_url', 'admin/slide/add', NULL, '添加幻灯片', 1, ''),
(61, 'Admin', 'admin_url', 'admin/slide/add_post', NULL, '提交添加', 1, ''),
(62, 'Admin', 'admin_url', 'admin/slidecat/index', NULL, '幻灯片分类', 1, ''),
(63, 'Admin', 'admin_url', 'admin/slidecat/delete', NULL, '删除分类', 1, ''),
(64, 'Admin', 'admin_url', 'admin/slidecat/edit', NULL, '编辑分类', 1, ''),
(65, 'Admin', 'admin_url', 'admin/slidecat/edit_post', NULL, '提交编辑', 1, ''),
(66, 'Admin', 'admin_url', 'admin/slidecat/add', NULL, '添加分类', 1, ''),
(67, 'Admin', 'admin_url', 'admin/slidecat/add_post', NULL, '提交添加', 1, ''),
(68, 'Admin', 'admin_url', 'admin/ad/index', NULL, '网站广告', 1, ''),
(69, 'Admin', 'admin_url', 'admin/ad/toggle', NULL, '广告显示切换', 1, ''),
(70, 'Admin', 'admin_url', 'admin/ad/delete', NULL, '删除广告', 1, ''),
(71, 'Admin', 'admin_url', 'admin/ad/edit', NULL, '编辑广告', 1, ''),
(72, 'Admin', 'admin_url', 'admin/ad/edit_post', NULL, '提交编辑', 1, ''),
(73, 'Admin', 'admin_url', 'admin/ad/add', NULL, '添加广告', 1, ''),
(74, 'Admin', 'admin_url', 'admin/ad/add_post', NULL, '提交添加', 1, ''),
(75, 'Admin', 'admin_url', 'admin/link/index', NULL, '友情链接', 1, ''),
(76, 'Admin', 'admin_url', 'admin/link/listorders', NULL, '友情链接排序', 1, ''),
(77, 'Admin', 'admin_url', 'admin/link/toggle', NULL, '友链显示切换', 1, ''),
(78, 'Admin', 'admin_url', 'admin/link/delete', NULL, '删除友情链接', 1, ''),
(79, 'Admin', 'admin_url', 'admin/link/edit', NULL, '编辑友情链接', 1, ''),
(80, 'Admin', 'admin_url', 'admin/link/edit_post', NULL, '提交编辑', 1, ''),
(81, 'Admin', 'admin_url', 'admin/link/add', NULL, '添加友情链接', 1, ''),
(82, 'Admin', 'admin_url', 'admin/link/add_post', NULL, '提交添加', 1, ''),
(83, 'Api', 'admin_url', 'api/oauthadmin/setting', NULL, '第三方登陆', 1, ''),
(84, 'Api', 'admin_url', 'api/oauthadmin/setting_post', NULL, '提交设置', 1, ''),
(85, 'Admin', 'admin_url', 'admin/menu/default', NULL, '菜单管理', 1, ''),
(86, 'Admin', 'admin_url', 'admin/navcat/default1', NULL, '前台菜单', 1, ''),
(87, 'Admin', 'admin_url', 'admin/nav/index', NULL, '菜单管理', 1, ''),
(88, 'Admin', 'admin_url', 'admin/nav/listorders', NULL, '前台导航排序', 1, ''),
(89, 'Admin', 'admin_url', 'admin/nav/delete', NULL, '删除菜单', 1, ''),
(90, 'Admin', 'admin_url', 'admin/nav/edit', NULL, '编辑菜单', 1, ''),
(91, 'Admin', 'admin_url', 'admin/nav/edit_post', NULL, '提交编辑', 1, ''),
(92, 'Admin', 'admin_url', 'admin/nav/add', NULL, '添加菜单', 1, ''),
(93, 'Admin', 'admin_url', 'admin/nav/add_post', NULL, '提交添加', 1, ''),
(94, 'Admin', 'admin_url', 'admin/navcat/index', NULL, '菜单分类', 1, ''),
(95, 'Admin', 'admin_url', 'admin/navcat/delete', NULL, '删除分类', 1, ''),
(96, 'Admin', 'admin_url', 'admin/navcat/edit', NULL, '编辑分类', 1, ''),
(97, 'Admin', 'admin_url', 'admin/navcat/edit_post', NULL, '提交编辑', 1, ''),
(98, 'Admin', 'admin_url', 'admin/navcat/add', NULL, '添加分类', 1, ''),
(99, 'Admin', 'admin_url', 'admin/navcat/add_post', NULL, '提交添加', 1, ''),
(100, 'Admin', 'admin_url', 'admin/menu/index', NULL, '后台菜单', 1, ''),
(101, 'Admin', 'admin_url', 'admin/menu/add', NULL, '添加菜单', 1, ''),
(102, 'Admin', 'admin_url', 'admin/menu/add_post', NULL, '提交添加', 1, ''),
(103, 'Admin', 'admin_url', 'admin/menu/listorders', NULL, '后台菜单排序', 1, ''),
(104, 'Admin', 'admin_url', 'admin/menu/export_menu', NULL, '菜单备份', 1, ''),
(105, 'Admin', 'admin_url', 'admin/menu/edit', NULL, '编辑菜单', 1, ''),
(106, 'Admin', 'admin_url', 'admin/menu/edit_post', NULL, '提交编辑', 1, ''),
(107, 'Admin', 'admin_url', 'admin/menu/delete', NULL, '删除菜单', 1, ''),
(108, 'Admin', 'admin_url', 'admin/menu/lists', NULL, '所有菜单', 1, ''),
(109, 'Admin', 'admin_url', 'admin/setting/default', NULL, '设置', 1, ''),
(110, 'Admin', 'admin_url', 'admin/setting/userdefault', NULL, '个人信息', 1, ''),
(111, 'Admin', 'admin_url', 'admin/user/userinfo', NULL, '修改信息', 1, ''),
(112, 'Admin', 'admin_url', 'admin/user/userinfo_post', NULL, '修改信息提交', 1, ''),
(113, 'Admin', 'admin_url', 'admin/setting/password', NULL, '修改密码', 1, ''),
(114, 'Admin', 'admin_url', 'admin/setting/password_post', NULL, '提交修改', 1, ''),
(115, 'Admin', 'admin_url', 'admin/setting/site', NULL, '网站信息', 1, ''),
(116, 'Admin', 'admin_url', 'admin/setting/site_post', NULL, '提交修改', 1, ''),
(117, 'Admin', 'admin_url', 'admin/route/index', NULL, '路由列表', 1, ''),
(118, 'Admin', 'admin_url', 'admin/route/add', NULL, '路由添加', 1, ''),
(119, 'Admin', 'admin_url', 'admin/route/add_post', NULL, '路由添加提交', 1, ''),
(120, 'Admin', 'admin_url', 'admin/route/edit', NULL, '路由编辑', 1, ''),
(121, 'Admin', 'admin_url', 'admin/route/edit_post', NULL, '路由编辑提交', 1, ''),
(122, 'Admin', 'admin_url', 'admin/route/delete', NULL, '路由删除', 1, ''),
(123, 'Admin', 'admin_url', 'admin/route/ban', NULL, '路由禁止', 1, ''),
(124, 'Admin', 'admin_url', 'admin/route/open', NULL, '路由启用', 1, ''),
(125, 'Admin', 'admin_url', 'admin/route/listorders', NULL, '路由排序', 1, ''),
(126, 'Admin', 'admin_url', 'admin/mailer/default', NULL, '邮箱配置', 1, ''),
(127, 'Admin', 'admin_url', 'admin/mailer/index', NULL, 'SMTP配置', 1, ''),
(128, 'Admin', 'admin_url', 'admin/mailer/index_post', NULL, '提交配置', 1, ''),
(129, 'Admin', 'admin_url', 'admin/mailer/active', NULL, '邮件模板', 1, ''),
(130, 'Admin', 'admin_url', 'admin/mailer/active_post', NULL, '提交模板', 1, ''),
(131, 'Admin', 'admin_url', 'admin/setting/clearcache', NULL, '清除缓存', 1, ''),
(132, 'User', 'admin_url', 'user/indexadmin/default', NULL, '用户管理', 1, ''),
(133, 'User', 'admin_url', 'user/indexadmin/default1', NULL, '用户组', 1, ''),
(134, 'User', 'admin_url', 'user/indexadmin/index', NULL, '本站用户', 1, ''),
(135, 'User', 'admin_url', 'user/indexadmin/ban', NULL, '拉黑会员', 1, ''),
(136, 'User', 'admin_url', 'user/indexadmin/cancelban', NULL, '启用会员', 1, ''),
(137, 'User', 'admin_url', 'user/oauthadmin/index', NULL, '第三方用户', 1, ''),
(138, 'User', 'admin_url', 'user/oauthadmin/delete', NULL, '第三方用户解绑', 1, ''),
(139, 'User', 'admin_url', 'user/indexadmin/default3', NULL, '管理组', 1, ''),
(140, 'Admin', 'admin_url', 'admin/rbac/index', NULL, '角色管理', 1, ''),
(141, 'Admin', 'admin_url', 'admin/rbac/member', NULL, '成员管理', 1, ''),
(142, 'Admin', 'admin_url', 'admin/rbac/authorize', NULL, '权限设置', 1, ''),
(143, 'Admin', 'admin_url', 'admin/rbac/authorize_post', NULL, '提交设置', 1, ''),
(144, 'Admin', 'admin_url', 'admin/rbac/roleedit', NULL, '编辑角色', 1, ''),
(145, 'Admin', 'admin_url', 'admin/rbac/roleedit_post', NULL, '提交编辑', 1, ''),
(146, 'Admin', 'admin_url', 'admin/rbac/roledelete', NULL, '删除角色', 1, ''),
(147, 'Admin', 'admin_url', 'admin/rbac/roleadd', NULL, '添加角色', 1, ''),
(148, 'Admin', 'admin_url', 'admin/rbac/roleadd_post', NULL, '提交添加', 1, ''),
(149, 'Admin', 'admin_url', 'admin/user/index', NULL, '管理员', 1, ''),
(150, 'Admin', 'admin_url', 'admin/user/delete', NULL, '删除管理员', 1, ''),
(151, 'Admin', 'admin_url', 'admin/user/edit', NULL, '管理员编辑', 1, ''),
(152, 'Admin', 'admin_url', 'admin/user/edit_post', NULL, '编辑提交', 1, ''),
(153, 'Admin', 'admin_url', 'admin/user/add', NULL, '管理员添加', 1, ''),
(154, 'Admin', 'admin_url', 'admin/user/add_post', NULL, '添加提交', 1, ''),
(155, 'Admin', 'admin_url', 'admin/plugin/update', NULL, '插件更新', 1, ''),
(156, 'Admin', 'admin_url', 'admin/storage/index', NULL, '文件存储', 1, ''),
(157, 'Admin', 'admin_url', 'admin/storage/setting_post', NULL, '文件存储设置提交', 1, ''),
(158, 'Admin', 'admin_url', 'admin/slide/ban', NULL, '禁用幻灯片', 1, ''),
(159, 'Admin', 'admin_url', 'admin/slide/cancelban', NULL, '启用幻灯片', 1, ''),
(160, 'Admin', 'admin_url', 'admin/user/ban', NULL, '禁用管理员', 1, ''),
(161, 'Admin', 'admin_url', 'admin/user/cancelban', NULL, '启用管理员', 1, ''),
(162, 'Admin', 'admin_url', 'admin/aid/index', NULL, '教具管理', 1, ''),
(163, 'Admin', 'admin_url', 'admin/aid/add', NULL, '添加教具', 1, ''),
(164, 'Admin', 'admin_url', 'admin/aid/add_post', NULL, '提交添加', 1, ''),
(165, 'Admin', 'admin_url', 'admin/aid/edit', NULL, '教具修改', 1, ''),
(166, 'Admin', 'admin_url', 'admin/aid/edit_post', NULL, '教具修改提交', 1, ''),
(167, 'Admin', 'admin_url', 'admin/aid/delete', NULL, '删除教具信息', 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `sp_comments`
--

CREATE TABLE IF NOT EXISTS `sp_comments` (
  `id` bigint(20) unsigned NOT NULL,
  `post_table` varchar(100) NOT NULL COMMENT '评论内容所在表，不带表前缀',
  `post_id` int(11) unsigned NOT NULL DEFAULT '0',
  `url` varchar(255) DEFAULT NULL COMMENT '原文地址',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '发表评论的用户id',
  `to_uid` int(11) NOT NULL DEFAULT '0' COMMENT '被评论的用户id',
  `full_name` varchar(50) DEFAULT NULL COMMENT '评论者昵称',
  `email` varchar(255) DEFAULT NULL COMMENT '评论者邮箱',
  `createtime` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `content` text NOT NULL COMMENT '评论内容',
  `type` smallint(1) NOT NULL DEFAULT '1' COMMENT '评论类型；1实名评论',
  `parentid` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '被回复的评论id',
  `path` varchar(500) DEFAULT NULL,
  `status` smallint(1) NOT NULL DEFAULT '1' COMMENT '状态，1已审核，0未审核'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sp_common_action_log`
--

CREATE TABLE IF NOT EXISTS `sp_common_action_log` (
  `id` int(11) NOT NULL,
  `user` bigint(20) DEFAULT '0' COMMENT '用户id',
  `object` varchar(100) DEFAULT NULL COMMENT '访问对象的id,格式：不带前缀的表名+id;如posts1表示xx_posts表里id为1的记录',
  `action` varchar(50) DEFAULT NULL COMMENT '操作名称；格式规定为：应用名+控制器+操作名；也可自己定义格式只要不发生冲突且惟一；',
  `count` int(11) DEFAULT '0' COMMENT '访问次数',
  `last_time` int(11) DEFAULT '0' COMMENT '最后访问的时间戳',
  `ip` varchar(15) DEFAULT NULL COMMENT '访问者最后访问ip'
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_common_action_log`
--

INSERT INTO `sp_common_action_log` (`id`, `user`, `object`, `action`, `count`, `last_time`, `ip`) VALUES
(1, 0, 'posts8', 'Portal-Article-index', 5, 1444395540, '0.0.0.0'),
(2, 0, 'posts12', 'Portal-Article-index', 89, 1444465154, '0.0.0.0'),
(3, 0, 'posts5', 'Portal-Article-index', 3, 1444438921, '0.0.0.0'),
(4, 0, 'posts6', 'Portal-Article-index', 4, 1444395584, '0.0.0.0'),
(5, 0, 'posts7', 'Portal-Article-index', 4, 1444395585, '0.0.0.0'),
(6, 0, 'posts14', 'Portal-Article-index', 4, 1444465150, '0.0.0.0'),
(7, 0, 'posts15', 'Portal-Article-index', 6, 1444465153, '0.0.0.0'),
(8, 0, 'posts17', 'Portal-Article-index', 9, 1444465227, '0.0.0.0'),
(9, 0, 'posts16', 'Portal-Article-index', 1, 1444465229, '0.0.0.0');

-- --------------------------------------------------------

--
-- 表的结构 `sp_guestbook`
--

CREATE TABLE IF NOT EXISTS `sp_guestbook` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL COMMENT '留言者姓名',
  `email` varchar(100) NOT NULL COMMENT '留言者邮箱',
  `title` varchar(255) DEFAULT NULL COMMENT '留言标题',
  `msg` text NOT NULL COMMENT '留言内容',
  `createtime` datetime NOT NULL,
  `status` smallint(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sp_links`
--

CREATE TABLE IF NOT EXISTS `sp_links` (
  `link_id` bigint(20) unsigned NOT NULL,
  `link_url` varchar(255) NOT NULL COMMENT '友情链接地址',
  `link_name` varchar(255) NOT NULL COMMENT '友情链接名称',
  `link_image` varchar(255) DEFAULT NULL COMMENT '友情链接图标',
  `link_target` varchar(25) NOT NULL DEFAULT '_blank' COMMENT '友情链接打开方式',
  `link_description` text NOT NULL COMMENT '友情链接描述',
  `link_status` int(2) NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0' COMMENT '友情链接评级',
  `link_rel` varchar(255) DEFAULT '',
  `listorder` int(10) NOT NULL DEFAULT '0' COMMENT '排序'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_links`
--

INSERT INTO `sp_links` (`link_id`, `link_url`, `link_name`, `link_image`, `link_target`, `link_description`, `link_status`, `link_rating`, `link_rel`, `listorder`) VALUES
(1, 'http://www.thinkcmf.com', 'ThinkCMF', '', '_blank', '', 1, 0, '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `sp_menu`
--

CREATE TABLE IF NOT EXISTS `sp_menu` (
  `id` smallint(6) unsigned NOT NULL,
  `parentid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `app` char(20) NOT NULL COMMENT '应用名称app',
  `model` char(20) NOT NULL COMMENT '控制器',
  `action` char(20) NOT NULL COMMENT '操作名称',
  `data` char(50) NOT NULL COMMENT '额外参数',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '菜单类型  1：权限认证+菜单；0：只作为菜单',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态，1显示，0不显示',
  `name` varchar(50) NOT NULL COMMENT '菜单名称',
  `icon` varchar(50) DEFAULT NULL COMMENT '菜单图标',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  `listorder` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序ID'
) ENGINE=MyISAM AUTO_INCREMENT=168 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_menu`
--

INSERT INTO `sp_menu` (`id`, `parentid`, `app`, `model`, `action`, `data`, `type`, `status`, `name`, `icon`, `remark`, `listorder`) VALUES
(1, 0, 'Admin', 'Content', 'default', '', 0, 1, '内容管理', 'th', '', 30),
(2, 1, 'Api', 'Guestbookadmin', 'index', '', 1, 1, '所有留言', '', '', 0),
(3, 2, 'Api', 'Guestbookadmin', 'delete', '', 1, 0, '删除网站留言', '', '', 0),
(4, 1, 'Comment', 'Commentadmin', 'index', '', 1, 1, '评论管理', '', '', 0),
(5, 4, 'Comment', 'Commentadmin', 'delete', '', 1, 0, '删除评论', '', '', 0),
(6, 4, 'Comment', 'Commentadmin', 'check', '', 1, 0, '评论审核', '', '', 0),
(7, 1, 'Portal', 'AdminPost', 'index', '', 1, 1, '文章管理', '', '', 1),
(8, 7, 'Portal', 'AdminPost', 'listorders', '', 1, 0, '文章排序', '', '', 0),
(9, 7, 'Portal', 'AdminPost', 'top', '', 1, 0, '文章置顶', '', '', 0),
(10, 7, 'Portal', 'AdminPost', 'recommend', '', 1, 0, '文章推荐', '', '', 0),
(11, 7, 'Portal', 'AdminPost', 'move', '', 1, 0, '批量移动', '', '', 1000),
(12, 7, 'Portal', 'AdminPost', 'check', '', 1, 0, '文章审核', '', '', 1000),
(13, 7, 'Portal', 'AdminPost', 'delete', '', 1, 0, '删除文章', '', '', 1000),
(14, 7, 'Portal', 'AdminPost', 'edit', '', 1, 0, '编辑文章', '', '', 1000),
(15, 14, 'Portal', 'AdminPost', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(16, 7, 'Portal', 'AdminPost', 'add', '', 1, 0, '添加文章', '', '', 1000),
(17, 16, 'Portal', 'AdminPost', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(18, 1, 'Portal', 'AdminTerm', 'index', '', 0, 1, '分类管理', '', '', 2),
(19, 18, 'Portal', 'AdminTerm', 'listorders', '', 1, 0, '文章分类排序', '', '', 0),
(20, 18, 'Portal', 'AdminTerm', 'delete', '', 1, 0, '删除分类', '', '', 1000),
(21, 18, 'Portal', 'AdminTerm', 'edit', '', 1, 0, '编辑分类', '', '', 1000),
(22, 21, 'Portal', 'AdminTerm', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(23, 18, 'Portal', 'AdminTerm', 'add', '', 1, 0, '添加分类', '', '', 1000),
(24, 23, 'Portal', 'AdminTerm', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(25, 1, 'Portal', 'AdminPage', 'index', '', 1, 1, '页面管理', '', '', 3),
(26, 25, 'Portal', 'AdminPage', 'listorders', '', 1, 0, '页面排序', '', '', 0),
(27, 25, 'Portal', 'AdminPage', 'delete', '', 1, 0, '删除页面', '', '', 1000),
(28, 25, 'Portal', 'AdminPage', 'edit', '', 1, 0, '编辑页面', '', '', 1000),
(29, 28, 'Portal', 'AdminPage', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(30, 25, 'Portal', 'AdminPage', 'add', '', 1, 0, '添加页面', '', '', 1000),
(31, 30, 'Portal', 'AdminPage', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(32, 1, 'Admin', 'Recycle', 'default', '', 1, 1, '回收站', '', '', 4),
(33, 32, 'Portal', 'AdminPost', 'recyclebin', '', 1, 1, '文章回收', '', '', 0),
(34, 33, 'Portal', 'AdminPost', 'restore', '', 1, 0, '文章还原', '', '', 1000),
(35, 33, 'Portal', 'AdminPost', 'clean', '', 1, 0, '彻底删除', '', '', 1000),
(36, 32, 'Portal', 'AdminPage', 'recyclebin', '', 1, 1, '页面回收', '', '', 1),
(37, 36, 'Portal', 'AdminPage', 'clean', '', 1, 0, '彻底删除', '', '', 1000),
(38, 36, 'Portal', 'AdminPage', 'restore', '', 1, 0, '页面还原', '', '', 1000),
(39, 0, 'Admin', 'Extension', 'default', '', 0, 1, '扩展工具', 'cloud', '', 40),
(40, 39, 'Admin', 'Backup', 'default', '', 1, 1, '备份管理', '', '', 0),
(41, 40, 'Admin', 'Backup', 'restore', '', 1, 1, '数据还原', '', '', 0),
(42, 40, 'Admin', 'Backup', 'index', '', 1, 1, '数据备份', '', '', 0),
(43, 42, 'Admin', 'Backup', 'index_post', '', 1, 0, '提交数据备份', '', '', 0),
(44, 40, 'Admin', 'Backup', 'download', '', 1, 0, '下载备份', '', '', 1000),
(45, 40, 'Admin', 'Backup', 'del_backup', '', 1, 0, '删除备份', '', '', 1000),
(46, 40, 'Admin', 'Backup', 'import', '', 1, 0, '数据备份导入', '', '', 1000),
(47, 39, 'Admin', 'Plugin', 'index', '', 1, 1, '插件管理', '', '', 0),
(48, 47, 'Admin', 'Plugin', 'toggle', '', 1, 0, '插件启用切换', '', '', 0),
(49, 47, 'Admin', 'Plugin', 'setting', '', 1, 0, '插件设置', '', '', 0),
(50, 49, 'Admin', 'Plugin', 'setting_post', '', 1, 0, '插件设置提交', '', '', 0),
(51, 47, 'Admin', 'Plugin', 'install', '', 1, 0, '插件安装', '', '', 0),
(52, 47, 'Admin', 'Plugin', 'uninstall', '', 1, 0, '插件卸载', '', '', 0),
(53, 39, 'Admin', 'Slide', 'default', '', 1, 1, '幻灯片', '', '', 1),
(54, 53, 'Admin', 'Slide', 'index', '', 1, 1, '幻灯片管理', '', '', 0),
(55, 54, 'Admin', 'Slide', 'listorders', '', 1, 0, '幻灯片排序', '', '', 0),
(56, 54, 'Admin', 'Slide', 'toggle', '', 1, 0, '幻灯片显示切换', '', '', 0),
(57, 54, 'Admin', 'Slide', 'delete', '', 1, 0, '删除幻灯片', '', '', 1000),
(58, 54, 'Admin', 'Slide', 'edit', '', 1, 0, '编辑幻灯片', '', '', 1000),
(59, 58, 'Admin', 'Slide', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(60, 54, 'Admin', 'Slide', 'add', '', 1, 0, '添加幻灯片', '', '', 1000),
(61, 60, 'Admin', 'Slide', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(62, 53, 'Admin', 'Slidecat', 'index', '', 1, 1, '幻灯片分类', '', '', 0),
(63, 62, 'Admin', 'Slidecat', 'delete', '', 1, 0, '删除分类', '', '', 1000),
(64, 62, 'Admin', 'Slidecat', 'edit', '', 1, 0, '编辑分类', '', '', 1000),
(65, 64, 'Admin', 'Slidecat', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(66, 62, 'Admin', 'Slidecat', 'add', '', 1, 0, '添加分类', '', '', 1000),
(67, 66, 'Admin', 'Slidecat', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(68, 39, 'Admin', 'Ad', 'index', '', 1, 1, '网站广告', '', '', 2),
(69, 68, 'Admin', 'Ad', 'toggle', '', 1, 0, '广告显示切换', '', '', 0),
(70, 68, 'Admin', 'Ad', 'delete', '', 1, 0, '删除广告', '', '', 1000),
(71, 68, 'Admin', 'Ad', 'edit', '', 1, 0, '编辑广告', '', '', 1000),
(72, 71, 'Admin', 'Ad', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(73, 68, 'Admin', 'Ad', 'add', '', 1, 0, '添加广告', '', '', 1000),
(74, 73, 'Admin', 'Ad', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(75, 39, 'Admin', 'Link', 'index', '', 0, 1, '友情链接', '', '', 3),
(76, 75, 'Admin', 'Link', 'listorders', '', 1, 0, '友情链接排序', '', '', 0),
(77, 75, 'Admin', 'Link', 'toggle', '', 1, 0, '友链显示切换', '', '', 0),
(78, 75, 'Admin', 'Link', 'delete', '', 1, 0, '删除友情链接', '', '', 1000),
(79, 75, 'Admin', 'Link', 'edit', '', 1, 0, '编辑友情链接', '', '', 1000),
(80, 79, 'Admin', 'Link', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(81, 75, 'Admin', 'Link', 'add', '', 1, 0, '添加友情链接', '', '', 1000),
(82, 81, 'Admin', 'Link', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(83, 39, 'Api', 'Oauthadmin', 'setting', '', 1, 1, '第三方登陆', 'leaf', '', 4),
(84, 83, 'Api', 'Oauthadmin', 'setting_post', '', 1, 0, '提交设置', '', '', 0),
(85, 0, 'Admin', 'Menu', 'default', '', 1, 1, '菜单管理', 'list', '', 20),
(86, 85, 'Admin', 'Navcat', 'default1', '', 1, 1, '前台菜单', '', '', 0),
(87, 86, 'Admin', 'Nav', 'index', '', 1, 1, '菜单管理', '', '', 0),
(88, 87, 'Admin', 'Nav', 'listorders', '', 1, 0, '前台导航排序', '', '', 0),
(89, 87, 'Admin', 'Nav', 'delete', '', 1, 0, '删除菜单', '', '', 1000),
(90, 87, 'Admin', 'Nav', 'edit', '', 1, 0, '编辑菜单', '', '', 1000),
(91, 90, 'Admin', 'Nav', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(92, 87, 'Admin', 'Nav', 'add', '', 1, 0, '添加菜单', '', '', 1000),
(93, 92, 'Admin', 'Nav', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(94, 86, 'Admin', 'Navcat', 'index', '', 1, 1, '菜单分类', '', '', 0),
(95, 94, 'Admin', 'Navcat', 'delete', '', 1, 0, '删除分类', '', '', 1000),
(96, 94, 'Admin', 'Navcat', 'edit', '', 1, 0, '编辑分类', '', '', 1000),
(97, 96, 'Admin', 'Navcat', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(98, 94, 'Admin', 'Navcat', 'add', '', 1, 0, '添加分类', '', '', 1000),
(99, 98, 'Admin', 'Navcat', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(100, 85, 'Admin', 'Menu', 'index', '', 1, 1, '后台菜单', '', '', 0),
(101, 100, 'Admin', 'Menu', 'add', '', 1, 0, '添加菜单', '', '', 0),
(102, 101, 'Admin', 'Menu', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(103, 100, 'Admin', 'Menu', 'listorders', '', 1, 0, '后台菜单排序', '', '', 0),
(104, 100, 'Admin', 'Menu', 'export_menu', '', 1, 0, '菜单备份', '', '', 1000),
(105, 100, 'Admin', 'Menu', 'edit', '', 1, 0, '编辑菜单', '', '', 1000),
(106, 105, 'Admin', 'Menu', 'edit_post', '', 1, 0, '提交编辑', '', '', 0),
(107, 100, 'Admin', 'Menu', 'delete', '', 1, 0, '删除菜单', '', '', 1000),
(108, 100, 'Admin', 'Menu', 'lists', '', 1, 0, '所有菜单', '', '', 1000),
(109, 0, 'Admin', 'Setting', 'default', '', 0, 1, '设置', 'cogs', '', 0),
(110, 109, 'Admin', 'Setting', 'userdefault', '', 0, 1, '个人信息', '', '', 0),
(111, 110, 'Admin', 'User', 'userinfo', '', 1, 1, '修改信息', '', '', 0),
(112, 111, 'Admin', 'User', 'userinfo_post', '', 1, 0, '修改信息提交', '', '', 0),
(113, 110, 'Admin', 'Setting', 'password', '', 1, 1, '修改密码', '', '', 0),
(114, 113, 'Admin', 'Setting', 'password_post', '', 1, 0, '提交修改', '', '', 0),
(115, 109, 'Admin', 'Setting', 'site', '', 1, 1, '网站信息', '', '', 0),
(116, 115, 'Admin', 'Setting', 'site_post', '', 1, 0, '提交修改', '', '', 0),
(117, 115, 'Admin', 'Route', 'index', '', 1, 0, '路由列表', '', '', 0),
(118, 115, 'Admin', 'Route', 'add', '', 1, 0, '路由添加', '', '', 0),
(119, 118, 'Admin', 'Route', 'add_post', '', 1, 0, '路由添加提交', '', '', 0),
(120, 115, 'Admin', 'Route', 'edit', '', 1, 0, '路由编辑', '', '', 0),
(121, 120, 'Admin', 'Route', 'edit_post', '', 1, 0, '路由编辑提交', '', '', 0),
(122, 115, 'Admin', 'Route', 'delete', '', 1, 0, '路由删除', '', '', 0),
(123, 115, 'Admin', 'Route', 'ban', '', 1, 0, '路由禁止', '', '', 0),
(124, 115, 'Admin', 'Route', 'open', '', 1, 0, '路由启用', '', '', 0),
(125, 115, 'Admin', 'Route', 'listorders', '', 1, 0, '路由排序', '', '', 0),
(126, 109, 'Admin', 'Mailer', 'default', '', 1, 1, '邮箱配置', '', '', 0),
(127, 126, 'Admin', 'Mailer', 'index', '', 1, 1, 'SMTP配置', '', '', 0),
(128, 127, 'Admin', 'Mailer', 'index_post', '', 1, 0, '提交配置', '', '', 0),
(129, 126, 'Admin', 'Mailer', 'active', '', 1, 1, '邮件模板', '', '', 0),
(130, 129, 'Admin', 'Mailer', 'active_post', '', 1, 0, '提交模板', '', '', 0),
(131, 109, 'Admin', 'Setting', 'clearcache', '', 1, 1, '清除缓存', '', '', 1),
(132, 0, 'User', 'Indexadmin', 'default', '', 1, 1, '用户管理', 'group', '', 10),
(133, 132, 'User', 'Indexadmin', 'default1', '', 1, 1, '用户组', '', '', 0),
(134, 133, 'User', 'Indexadmin', 'index', '', 1, 1, '本站用户', 'leaf', '', 0),
(135, 134, 'User', 'Indexadmin', 'ban', '', 1, 0, '拉黑会员', '', '', 0),
(136, 134, 'User', 'Indexadmin', 'cancelban', '', 1, 0, '启用会员', '', '', 0),
(137, 133, 'User', 'Oauthadmin', 'index', '', 1, 1, '第三方用户', 'leaf', '', 0),
(138, 137, 'User', 'Oauthadmin', 'delete', '', 1, 0, '第三方用户解绑', '', '', 0),
(139, 132, 'User', 'Indexadmin', 'default3', '', 1, 1, '管理组', '', '', 0),
(140, 139, 'Admin', 'Rbac', 'index', '', 1, 1, '角色管理', '', '', 0),
(141, 140, 'Admin', 'Rbac', 'member', '', 1, 0, '成员管理', '', '', 1000),
(142, 140, 'Admin', 'Rbac', 'authorize', '', 1, 0, '权限设置', '', '', 1000),
(143, 142, 'Admin', 'Rbac', 'authorize_post', '', 1, 0, '提交设置', '', '', 0),
(144, 140, 'Admin', 'Rbac', 'roleedit', '', 1, 0, '编辑角色', '', '', 1000),
(145, 144, 'Admin', 'Rbac', 'roleedit_post', '', 1, 0, '提交编辑', '', '', 0),
(146, 140, 'Admin', 'Rbac', 'roledelete', '', 1, 1, '删除角色', '', '', 1000),
(147, 140, 'Admin', 'Rbac', 'roleadd', '', 1, 1, '添加角色', '', '', 1000),
(148, 147, 'Admin', 'Rbac', 'roleadd_post', '', 1, 0, '提交添加', '', '', 0),
(149, 139, 'Admin', 'User', 'index', '', 1, 1, '管理员', '', '', 0),
(150, 149, 'Admin', 'User', 'delete', '', 1, 0, '删除管理员', '', '', 1000),
(151, 149, 'Admin', 'User', 'edit', '', 1, 0, '管理员编辑', '', '', 1000),
(152, 151, 'Admin', 'User', 'edit_post', '', 1, 0, '编辑提交', '', '', 0),
(153, 149, 'Admin', 'User', 'add', '', 1, 0, '管理员添加', '', '', 1000),
(154, 153, 'Admin', 'User', 'add_post', '', 1, 0, '添加提交', '', '', 0),
(155, 47, 'Admin', 'Plugin', 'update', '', 1, 0, '插件更新', '', '', 0),
(156, 39, 'Admin', 'Storage', 'index', '', 1, 1, '文件存储', '', '', 0),
(157, 156, 'Admin', 'Storage', 'setting_post', '', 1, 0, '文件存储设置提交', '', '', 0),
(158, 54, 'Admin', 'Slide', 'ban', '', 1, 0, '禁用幻灯片', '', '', 0),
(159, 54, 'Admin', 'Slide', 'cancelban', '', 1, 0, '启用幻灯片', '', '', 0),
(160, 149, 'Admin', 'User', 'ban', '', 1, 0, '禁用管理员', '', '', 0),
(161, 149, 'Admin', 'User', 'cancelban', '', 1, 0, '启用管理员', '', '', 0),
(162, 1, 'Admin', 'Aid', 'index', '', 1, 1, '教具管理', '', '', 0),
(163, 162, 'Admin', 'Aid', 'add', '', 1, 0, '添加教具', '', '', 0),
(164, 162, 'Admin', 'Aid', 'add_post', '', 1, 0, '提交添加', '', '', 0),
(165, 162, 'Admin', 'Aid', 'edit', '', 1, 0, '教具修改', '', '', 0),
(166, 162, 'Admin', 'Aid', 'edit_post', '', 1, 0, '教具修改提交', '', '', 0),
(167, 162, 'Admin', 'Aid', 'delete', '', 1, 0, '删除教具信息', '', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `sp_nav`
--

CREATE TABLE IF NOT EXISTS `sp_nav` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `target` varchar(50) DEFAULT NULL,
  `href` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `listorder` int(6) DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_nav`
--

INSERT INTO `sp_nav` (`id`, `cid`, `parentid`, `label`, `target`, `href`, `icon`, `status`, `listorder`, `path`) VALUES
(1, 1, 0, '首页', '', 'home', '', 1, 0, '0-1'),
(2, 1, 0, '我们', '', 'a:2:{s:6:"action";s:17:"Portal/List/index";s:5:"param";a:1:{s:2:"id";s:1:"3";}}', '', 1, 0, '0-2'),
(3, 1, 0, '瀑布流', '', 'a:2:{s:6:"action";s:17:"Portal/List/index";s:5:"param";a:1:{s:2:"id";s:1:"2";}}', '', 1, 0, '0-3');

-- --------------------------------------------------------

--
-- 表的结构 `sp_nav_cat`
--

CREATE TABLE IF NOT EXISTS `sp_nav_cat` (
  `navcid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `remark` text
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_nav_cat`
--

INSERT INTO `sp_nav_cat` (`navcid`, `name`, `active`, `remark`) VALUES
(1, '主导航', 1, '主导航');

-- --------------------------------------------------------

--
-- 表的结构 `sp_oauth_user`
--

CREATE TABLE IF NOT EXISTS `sp_oauth_user` (
  `id` int(20) NOT NULL,
  `from` varchar(20) NOT NULL COMMENT '用户来源key',
  `name` varchar(30) NOT NULL COMMENT '第三方昵称',
  `head_img` varchar(200) NOT NULL COMMENT '头像',
  `uid` int(20) NOT NULL COMMENT '关联的本站用户id',
  `create_time` datetime NOT NULL COMMENT '绑定时间',
  `last_login_time` datetime NOT NULL COMMENT '最后登录时间',
  `last_login_ip` varchar(16) NOT NULL COMMENT '最后登录ip',
  `login_times` int(6) NOT NULL COMMENT '登录次数',
  `status` tinyint(2) NOT NULL,
  `access_token` varchar(60) NOT NULL,
  `expires_date` int(12) NOT NULL COMMENT 'access_token过期时间',
  `openid` varchar(40) NOT NULL COMMENT '第三方用户id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sp_options`
--

CREATE TABLE IF NOT EXISTS `sp_options` (
  `option_id` bigint(20) unsigned NOT NULL,
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` int(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_options`
--

INSERT INTO `sp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'member_email_active', '{"title":"ThinkCMF\\u90ae\\u4ef6\\u6fc0\\u6d3b\\u901a\\u77e5.","template":"<p>\\u672c\\u90ae\\u4ef6\\u6765\\u81ea<a href=\\"http:\\/\\/www.thinkcmf.com\\">ThinkCMF<\\/a><br\\/><br\\/>&nbsp; &nbsp;<strong>---------------<\\/strong><br\\/>&nbsp; &nbsp;<strong>\\u5e10\\u53f7\\u6fc0\\u6d3b\\u8bf4\\u660e<\\/strong><br\\/>&nbsp; &nbsp;<strong>---------------<\\/strong><br\\/><br\\/>&nbsp; &nbsp; \\u5c0a\\u656c\\u7684<span style=\\"FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)\\">#username#\\uff0c\\u60a8\\u597d\\u3002<\\/span>\\u5982\\u679c\\u60a8\\u662fThinkCMF\\u7684\\u65b0\\u7528\\u6237\\uff0c\\u6216\\u5728\\u4fee\\u6539\\u60a8\\u7684\\u6ce8\\u518cEmail\\u65f6\\u4f7f\\u7528\\u4e86\\u672c\\u5730\\u5740\\uff0c\\u6211\\u4eec\\u9700\\u8981\\u5bf9\\u60a8\\u7684\\u5730\\u5740\\u6709\\u6548\\u6027\\u8fdb\\u884c\\u9a8c\\u8bc1\\u4ee5\\u907f\\u514d\\u5783\\u573e\\u90ae\\u4ef6\\u6216\\u5730\\u5740\\u88ab\\u6ee5\\u7528\\u3002<br\\/>&nbsp; &nbsp; \\u60a8\\u53ea\\u9700\\u70b9\\u51fb\\u4e0b\\u9762\\u7684\\u94fe\\u63a5\\u5373\\u53ef\\u6fc0\\u6d3b\\u60a8\\u7684\\u5e10\\u53f7\\uff1a<br\\/>&nbsp; &nbsp; <a title=\\"\\" href=\\"http:\\/\\/#link#\\" target=\\"_self\\">http:\\/\\/#link#<\\/a><br\\/>&nbsp; &nbsp; (\\u5982\\u679c\\u4e0a\\u9762\\u4e0d\\u662f\\u94fe\\u63a5\\u5f62\\u5f0f\\uff0c\\u8bf7\\u5c06\\u8be5\\u5730\\u5740\\u624b\\u5de5\\u7c98\\u8d34\\u5230\\u6d4f\\u89c8\\u5668\\u5730\\u5740\\u680f\\u518d\\u8bbf\\u95ee)<br\\/>&nbsp; &nbsp; \\u611f\\u8c22\\u60a8\\u7684\\u8bbf\\u95ee\\uff0c\\u795d\\u60a8\\u4f7f\\u7528\\u6109\\u5feb\\uff01<br\\/><br\\/>&nbsp; &nbsp; \\u6b64\\u81f4<br\\/>&nbsp; &nbsp; ThinkCMF \\u7ba1\\u7406\\u56e2\\u961f.<\\/p>"}', 1),
(2, 'site_options', '            {\n            		"site_name":"麦忒官网",\n            		"site_host":"http://localhost/new/",\n            		"site_root":"",\n            		"site_icp":"",\n            		"site_admin_email":"a526584713@qq.com",\n            		"site_tongji":"",\n            		"site_copyright":"",\n            		"site_seo_title":"麦忒官网",\n            		"site_seo_keywords":"",\n            		"site_seo_description":"麦忒官网"\n        }', 1);

-- --------------------------------------------------------

--
-- 表的结构 `sp_plugins`
--

CREATE TABLE IF NOT EXISTS `sp_plugins` (
  `id` int(11) unsigned NOT NULL COMMENT '自增id',
  `name` varchar(50) NOT NULL COMMENT '插件名，英文',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '插件名称',
  `description` text COMMENT '插件描述',
  `type` tinyint(2) DEFAULT '0' COMMENT '插件类型, 1:网站；8;微信',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态；1开启；',
  `config` text COMMENT '插件配置',
  `hooks` varchar(255) DEFAULT NULL COMMENT '实现的钩子;以“，”分隔',
  `has_admin` tinyint(2) DEFAULT '0' COMMENT '插件是否有后台管理界面',
  `author` varchar(50) DEFAULT '' COMMENT '插件作者',
  `version` varchar(20) DEFAULT '' COMMENT '插件版本号',
  `createtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '插件安装时间',
  `listorder` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='插件表';

-- --------------------------------------------------------

--
-- 表的结构 `sp_posts`
--

CREATE TABLE IF NOT EXISTS `sp_posts` (
  `id` bigint(20) unsigned NOT NULL,
  `post_author` bigint(20) unsigned DEFAULT '0' COMMENT '发表者id',
  `post_keywords` varchar(150) NOT NULL COMMENT 'seo keywords',
  `post_source` varchar(150) DEFAULT NULL COMMENT '转载文章的来源',
  `post_date` datetime DEFAULT '2000-01-01 00:00:00' COMMENT 'post创建日期，永久不变，一般不显示给用户',
  `post_content` longtext COMMENT 'post内容',
  `post_title` text COMMENT 'post标题',
  `post_excerpt` text COMMENT 'post摘要',
  `post_status` int(2) DEFAULT '1' COMMENT 'post状态，1已审核，0未审核',
  `comment_status` int(2) DEFAULT '1' COMMENT '评论状态，1允许，0不允许',
  `post_modified` datetime DEFAULT '2000-01-01 00:00:00' COMMENT 'post更新时间，可在前台修改，显示给用户',
  `post_content_filtered` longtext,
  `post_parent` bigint(20) unsigned DEFAULT '0' COMMENT 'post的父级post id,表示post层级关系',
  `post_type` int(2) DEFAULT NULL,
  `post_mime_type` varchar(100) DEFAULT '',
  `comment_count` bigint(20) DEFAULT '0',
  `smeta` text COMMENT 'post的扩展字段，保存相关扩展属性，如缩略图；格式为json',
  `post_hits` int(11) DEFAULT '0' COMMENT 'post点击数，查看数',
  `post_like` int(11) DEFAULT '0' COMMENT 'post赞数',
  `istop` tinyint(1) NOT NULL DEFAULT '0' COMMENT '置顶 1置顶； 0不置顶',
  `recommended` tinyint(1) NOT NULL DEFAULT '0' COMMENT '推荐 1推荐 0不推荐'
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_posts`
--

INSERT INTO `sp_posts` (`id`, `post_author`, `post_keywords`, `post_source`, `post_date`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `post_modified`, `post_content_filtered`, `post_parent`, `post_type`, `post_mime_type`, `comment_count`, `smeta`, `post_hits`, `post_like`, `istop`, `recommended`) VALUES
(1, 1, '我们是谁', NULL, '2015-09-14 13:52:58', '<p>我们是谁</p>', '我们是谁', '我们是谁', 0, 1, '2015-09-14 13:52:34', NULL, 0, 2, '', 0, '{"thumb":"","template":"page"}', 0, 0, 0, 0),
(2, 1, '我们的6大世界观', NULL, '2015-09-14 13:53:25', '<p>我们的6大世界观</p>', '我们的6大世界观', '我们的6大世界观', 0, 1, '2015-09-14 13:53:02', NULL, 0, 2, '', 0, '{"thumb":"","template":"page"}', 0, 0, 0, 0),
(3, 1, '我们的育儿神器', NULL, '2015-09-14 13:53:39', '<p>我们的育儿神器</p>', '我们的育儿神器', '我们的育儿神器', 0, 1, '2015-09-14 13:53:35', NULL, 0, 2, '', 0, '{"thumb":"","template":"page"}', 0, 0, 0, 0),
(4, 1, '我们的儿童之家', NULL, '2015-09-14 13:53:51', '<p>我们的儿童之家</p>', '我们的儿童之家', '我们的儿童之家', 0, 1, '2015-09-14 13:53:47', NULL, 0, 2, '', 0, '{"thumb":"","template":"page"}', 0, 0, 0, 0),
(5, 1, '我们是谁', '我们是谁', '2015-09-14 13:56:46', '<p>麦忒婴童之家是我公司的运行实体之一，是实现公司实际营利的主要场所 一个叫麦忒婴童之家的室内占地面积约300-500平方米，计划招收30-50名婴幼儿，有专业主管1人，教 师和保育员15-25人，平均3名婴幼儿配备一名教师和保育员。</p><p>麦忒婴童之家是我公司的运行实体之一，是实现公司实际营利的主要场所 一个叫麦忒婴童之家的室内占地面积约300-500平方米，计划招收30-50名婴幼儿，有专业主管1人，教 师和保育员15-25人，平均3名婴幼儿配备一名教师和保育员。</p><p>麦忒婴童之家是我公司的运行实体之一，是实现公司实际营利的主要场所 一个叫麦忒婴童之家的室内占地面积约300-500平方米，计划招收30-50名婴幼儿，有专业主管1人，教 师和保育员15-25人，平均3名婴幼儿配备一名教师和保育员。</p>', '我们是谁', '我们是谁', 1, 1, '2015-09-14 13:56:34', NULL, 0, NULL, '', 0, '{"thumb":"5617b0e7482d7.png"}', 1, 0, 0, 0),
(6, 1, '我们的6大世界观', '我们的6大世界观', '2015-09-14 13:57:01', '<p>我们的6大世界观</p>', '我们的6大世界观', '我们的6大世界观', 1, 1, '2015-09-14 13:56:49', NULL, 0, NULL, '', 0, '{"thumb":""}', 1, 0, 0, 0),
(7, 1, '我们的育儿神器', '我们的育儿神器', '2015-09-14 13:57:14', '<p>我们的育儿神器</p>', '我们的育儿神器', '我们的育儿神器', 1, 1, '2015-09-14 13:57:08', NULL, 0, NULL, '', 0, '{"thumb":""}', 1, 0, 0, 0),
(8, 1, '我们的儿童之家', '我们的儿童之家', '2015-09-14 13:57:27', '<p>我们的儿童之家</p>', '我们的儿童之家', '我们的儿童之家', 1, 1, '2015-09-14 13:57:21', NULL, 0, NULL, '', 0, '{"thumb":""}', 1, 0, 0, 0),
(9, 1, '张萌雨', '张萌雨', '2015-09-14 14:00:02', '<p>张萌雨</p>', '张萌雨', '张萌雨', 1, 1, '2015-09-14 13:59:48', NULL, 0, NULL, '', 0, '{"thumb":""}', 0, 0, 0, 0),
(10, 1, '我们的孩子', '我们的孩子', '2015-09-14 14:00:20', '<p>我们的孩子</p>', '我们的孩子', '我们的孩子', 1, 1, '2015-09-14 14:00:11', NULL, 0, NULL, '', 0, '{"thumb":""}', 0, 0, 0, 0),
(11, 1, '我们的团队', '我们的团队', '2015-09-14 14:00:35', '<p>我们的团队</p>', '我们的团队', '我们的团队', 1, 1, '2015-09-14 14:00:27', NULL, 0, NULL, '', 0, '{"thumb":""}', 0, 0, 0, 0),
(12, 1, '大事件1', '大事件1', '2015-10-09 13:09:34', '<p>大事件1</p>', '大事件1', '大事件1', 1, 1, '2015-10-09 13:07:33', NULL, 0, NULL, '', 0, '{"thumb":""}', 1, 0, 0, 0),
(13, 1, 'app', NULL, '2015-10-09 19:28:58', '<p>app</p>', 'app', 'app', 1, 1, '2015-10-09 19:28:39', NULL, 0, 2, '', 0, '{"thumb":"","template":"app"}', 0, 0, 0, 0),
(14, 1, '测试', '测试', '2015-10-10 09:26:03', '<p>测试</p>', '测试', '测试', 1, 1, '2014-10-10 09:25:54', NULL, 0, NULL, '', 0, '{"thumb":""}', 1, 0, 0, 0),
(15, 1, '大事件测试2', '大事件测试2', '2015-10-10 09:36:23', '<p>大事件测试2</p>', '大事件测试2', '大事件测试2', 1, 1, '2015-10-10 09:36:11', NULL, 0, NULL, '', 0, '{"thumb":""}', 1, 0, 0, 0),
(16, 1, '蒋微娜&amp;安妮', '妈妈和宝宝的分享', '2015-10-10 10:02:33', '<p>妈妈和宝宝的分享</p>', '妈妈和宝宝的分享', '妈妈和宝宝的分享', 1, 1, '2015-10-10 09:53:28', NULL, 0, NULL, '', 0, '{"thumb":"561871b7726ed.jpg"}', 1, 0, 0, 0),
(17, 1, '蒋微娜&amp;安妮', '测试妈妈和宝宝的分享', '2015-10-10 10:03:22', '<p>测试妈妈和宝宝的分享</p>', '测试妈妈和宝宝的分享', '测试妈妈和宝宝的分享', 1, 1, '2015-10-10 10:02:57', NULL, 0, NULL, '', 0, '{"thumb":""}', 1, 0, 0, 0),
(18, 1, '麦忒首席教育专家', '', '2015-10-10 11:01:54', '<p>麦忒育婴职业技术培训学校校长</p><p>麦忒首席教育专家</p><p>华东师范大学学前教育终身教授</p><p>国务院特殊津贴获得者</p><p>全国学前儿童教育专业委员会长</p><p>任委员环太平洋地区学前教育学会</p><p>中国地区负责人</p><p>任委员环太平洋地区学前教育学会</p>', '朱家雄', '麦忒首席教育专家', 1, 1, '2015-10-10 11:00:32', NULL, 0, NULL, '', 0, '{"thumb":"56187f99efc08.png"}', 0, 0, 0, 0),
(19, 1, '首席教育专家', '首席教育专家', '2015-10-10 11:10:45', '<p>麦忒育婴职业技术培训学校校长</p><p>麦忒首席教育专家</p><p>华东师范大学学前教育终身教授</p><p>国务院特殊津贴获得者</p><p>全国学前儿童教育专业委员会长</p><p>任委员环太平洋地区学前教育学会</p><p>中国地区负责人</p><p>任委员环太平洋地区学前教育学会</p>', '张静芬', '首席教育专家', 1, 1, '2015-10-10 11:09:56', NULL, 0, NULL, '', 0, '{"thumb":"5618819fbfce8.png"}', 0, 0, 0, 0),
(20, 1, '张萌雨', NULL, '2015-10-10 11:46:30', '<p><br style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: 方正细圆简体; font-size: 14px; white-space: normal; widows: auto; background-color: rgb(255, 255, 255);"/><br style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: 方正细圆简体; font-size: 14px; white-space: normal; widows: auto; background-color: rgb(255, 255, 255);"/></p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 15px; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; line-height: 24px; color: rgb(51, 51, 51); font-family: 方正细圆简体; white-space: normal; widows: auto; background-color: rgb(255, 255, 255);">麦忒婴童之家是我公司的运行实体之一，是实现公司实际营利的主要场所</p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 15px; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; line-height: 24px; color: rgb(51, 51, 51); font-family: 方正细圆简体; white-space: normal; widows: auto; background-color: rgb(255, 255, 255);">一个叫麦忒婴童之家的室内占地面积约300-500平方米，计划招收30-50名婴幼儿，有专业主管1人，教 师和保育员15-25人，平均3名婴幼儿配备一名教师和保育员。</p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 15px; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; line-height: 24px; color: rgb(51, 51, 51); font-family: 方正细圆简体; white-space: normal; widows: auto; background-color: rgb(255, 255, 255);">标准化：麦忒婴童之家在环境设计，课程设置，经营管理，人员配置等方面实现高度标准化，以实现在 全球乃至全球范围内的快速&quot;复制&quot; 个性化：高质量的教育，保育的高度个性化的服务，麦忒婴童之家提供的个性化服务依仗于高素质的教</p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 15px; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; line-height: 24px; color: rgb(51, 51, 51); font-family: 方正细圆简体; white-space: normal; widows: auto; background-color: rgb(255, 255, 255);">师，保育员。端化：麦忒婴童之家所提供服务走高端化路线，从设备，设施，材料到人员，全部以最 高标准配置。制度化：麦忒婴童之家实现以制度管理人以制度管理人，财，物以安全，卫生为首要关注</p><p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 15px; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; line-height: 24px; color: rgb(51, 51, 51); font-family: 方正细圆简体; white-space: normal; widows: auto; background-color: rgb(255, 255, 255);">信息化：以互联网和麦麦机器人为载体，以麦忒婴童之家为中心，在5公里辐射范围内实现对家长的帮 助和教育，并为高端客户提供个性入户早教教育，保育服务。</p><p><br style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: 方正细圆简体; font-size: 14px; white-space: normal; widows: auto; background-color: rgb(255, 255, 255);"/><br style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: 方正细圆简体; font-size: 14px; white-space: normal; widows: auto; background-color: rgb(255, 255, 255);"/><br style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: 方正细圆简体; font-size: 14px; white-space: normal; widows: auto; background-color: rgb(255, 255, 255);"/><br style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: 方正细圆简体; font-size: 14px; white-space: normal; widows: auto; background-color: rgb(255, 255, 255);"/><a class="xm9-move" style="box-sizing: border-box; margin: 0px 0px 0px 75%; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; color: rgb(51, 51, 51); font-family: 方正细圆简体; white-space: normal; widows: auto; background-color: rgb(255, 255, 255);"></a></p><h3 style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-size: 18px; vertical-align: baseline; color: rgb(51, 51, 51); font-family: 方正细圆简体; white-space: normal; widows: auto; background-color: rgb(255, 255, 255);"><a class="xm9-move" style="box-sizing: border-box; margin: 0px 0px 0px 75%; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; background-color: transparent;"></a><a class="button   bg-one " style="box-sizing: border-box; margin: 0px; padding: 6px 15px; border: 1px solid rgb(255, 255, 255); font-size: 14px; vertical-align: baseline; color: inherit; border-radius: 4px; display: inline-block; line-height: 20px; transition: all 1s cubic-bezier(0.175, 0.885, 0.32, 1) 0ms;">张蒙雨</a></h3><p><br/></p>', '张萌雨', '张萌雨', 1, 1, '2015-10-10 11:45:54', NULL, 0, 2, '', 0, '{"thumb":"","template":"meng"}', 0, 0, 0, 0),
(21, 1, 'mtoy', NULL, '2015-10-10 13:43:15', '<p>mtoy</p>', 'mtoy', 'mtoy', 1, 1, '2015-10-10 13:42:59', NULL, 0, 2, '', 0, '{"thumb":"","template":"mtoy"}', 0, 0, 0, 0),
(22, 1, 'mprogram', NULL, '2015-10-10 15:30:36', '<p>mprogram</p>', 'mprogram', 'mprogram', 1, 1, '2015-10-10 15:30:26', NULL, 0, 2, '', 0, '{"thumb":"","template":"mprogram"}', 0, 0, 0, 0),
(23, 1, 'mhome', NULL, '2015-10-10 15:39:13', '', 'mhome', 'mhome', 1, 1, '2015-10-10 15:38:59', NULL, 0, 2, '', 0, '{"thumb":"","template":"mhome"}', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `sp_role`
--

CREATE TABLE IF NOT EXISTS `sp_role` (
  `id` smallint(6) unsigned NOT NULL,
  `name` varchar(20) NOT NULL DEFAULT '角色名称',
  `pid` smallint(6) DEFAULT NULL COMMENT '父角色ID',
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT '状态',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `listorder` int(3) NOT NULL DEFAULT '0' COMMENT '排序字段'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_role`
--

INSERT INTO `sp_role` (`id`, `name`, `pid`, `status`, `remark`, `create_time`, `update_time`, `listorder`) VALUES
(1, '超级管理员', 0, 1, '拥有网站最高管理员权限！', 1329633709, 1329633709, 0);

-- --------------------------------------------------------

--
-- 表的结构 `sp_role_user`
--

CREATE TABLE IF NOT EXISTS `sp_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sp_route`
--

CREATE TABLE IF NOT EXISTS `sp_route` (
  `id` int(11) NOT NULL COMMENT '路由id',
  `full_url` varchar(255) DEFAULT NULL COMMENT '完整url， 如：portal/list/index?id=1',
  `url` varchar(255) DEFAULT NULL COMMENT '实际显示的url',
  `listorder` int(5) DEFAULT '0' COMMENT '排序，优先级，越小优先级越高',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态，1：启用 ;0：不启用'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sp_slide`
--

CREATE TABLE IF NOT EXISTS `sp_slide` (
  `slide_id` bigint(20) unsigned NOT NULL,
  `slide_cid` bigint(20) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_pic` varchar(255) DEFAULT NULL,
  `slide_url` varchar(255) DEFAULT NULL,
  `slide_des` varchar(255) DEFAULT NULL,
  `slide_content` text,
  `slide_status` int(2) NOT NULL DEFAULT '1',
  `listorder` int(10) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sp_slide_cat`
--

CREATE TABLE IF NOT EXISTS `sp_slide_cat` (
  `cid` bigint(20) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_idname` varchar(255) NOT NULL,
  `cat_remark` text,
  `cat_status` int(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sp_terms`
--

CREATE TABLE IF NOT EXISTS `sp_terms` (
  `term_id` bigint(20) unsigned NOT NULL COMMENT '分类id',
  `name` varchar(200) DEFAULT NULL COMMENT '分类名称',
  `slug` varchar(200) DEFAULT '',
  `taxonomy` varchar(32) DEFAULT NULL COMMENT '分类类型',
  `description` longtext COMMENT '分类描述',
  `parent` bigint(20) unsigned DEFAULT '0' COMMENT '分类父id',
  `count` bigint(20) DEFAULT '0' COMMENT '分类文章数',
  `path` varchar(500) DEFAULT NULL COMMENT '分类层级关系路径',
  `seo_title` varchar(500) DEFAULT NULL,
  `seo_keywords` varchar(500) DEFAULT NULL,
  `seo_description` varchar(500) DEFAULT NULL,
  `list_tpl` varchar(50) DEFAULT NULL COMMENT '分类列表模板',
  `one_tpl` varchar(50) DEFAULT NULL COMMENT '分类文章页模板',
  `listorder` int(5) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1发布，0不发布'
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_terms`
--

INSERT INTO `sp_terms` (`term_id`, `name`, `slug`, `taxonomy`, `description`, `parent`, `count`, `path`, `seo_title`, `seo_keywords`, `seo_description`, `list_tpl`, `one_tpl`, `listorder`, `status`) VALUES
(1, '新闻', '', 'article', '', 0, 0, '0-1', '', '', '', 'list', 'article', 0, 1),
(2, '大事件', '', 'article', '', 0, 0, '0-2', '', '', '', 'list', 'pageBigThing', 0, 1),
(3, '我们', '', 'article', '', 0, 0, '0-3', '我们', '我们', '我们', 'list', 'article', 0, 1),
(4, '人物', '', 'article', '', 0, 0, '0-4', '人物', '人物', '人物', 'list', 'article', 0, 1),
(5, '我们的专家', '', 'article', '', 4, 0, '0-4-5', '', '', '', 'term_list', 'term_page', 0, 1),
(6, '分享', '', 'article', '分享', 0, 0, '0-6', '分享', '分享', '分享', 'list', 'article', 0, 1),
(7, '妈妈和宝宝的分享', '', 'article', '妈妈和宝宝的分享', 6, 0, '0-6-7', '妈妈和宝宝的分享', '妈妈和宝宝的分享', '妈妈和宝宝的分享', 'news_list', 'news_page', 0, 1),
(8, '麦忒的分享', '', 'article', '麦忒的分享', 6, 0, '0-6-8', '麦忒的分享', '麦忒的分享', '麦忒的分享', 'news_list', 'news_page', 0, 1),
(9, '媒体专区', '', 'article', '媒体专区', 0, 0, '0-9', '媒体专区', '媒体专区', '媒体专区', 'list', 'article', 0, 1),
(10, '图文下载', '', 'article', '图文下载', 9, 0, '0-9-10', '', '', '', 'list', 'article', 0, 1),
(11, '视频下载', '', 'article', '视频下载', 9, 0, '0-9-11', '', '', '', 'list', 'article', 0, 1),
(12, '我们的孩子', '', 'article', '', 4, 0, '0-4-12', '', '', '', 'term_list', 'term_page', 0, 1),
(13, '我们的团队', '', 'article', '', 4, 0, '0-4-13', '', '', '', 'term_list', 'term_page', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `sp_term_relationships`
--

CREATE TABLE IF NOT EXISTS `sp_term_relationships` (
  `tid` bigint(20) NOT NULL,
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT 'posts表里文章id',
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
  `listorder` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1发布，0不发布'
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_term_relationships`
--

INSERT INTO `sp_term_relationships` (`tid`, `object_id`, `term_id`, `listorder`, `status`) VALUES
(1, 5, 3, 0, 1),
(2, 6, 3, 0, 1),
(3, 7, 3, 0, 1),
(4, 8, 3, 0, 1),
(5, 9, 4, 0, 1),
(6, 10, 4, 0, 1),
(7, 11, 4, 0, 1),
(8, 12, 2, 0, 1),
(9, 14, 2, 0, 1),
(10, 15, 2, 0, 1),
(11, 16, 7, 0, 1),
(12, 17, 7, 0, 1),
(13, 18, 5, 0, 1),
(14, 19, 5, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `sp_users`
--

CREATE TABLE IF NOT EXISTS `sp_users` (
  `id` bigint(20) unsigned NOT NULL,
  `user_login` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `user_pass` varchar(64) NOT NULL DEFAULT '' COMMENT '登录密码；sp_password加密',
  `user_nicename` varchar(50) NOT NULL DEFAULT '' COMMENT '用户美名',
  `user_email` varchar(100) NOT NULL DEFAULT '' COMMENT '登录邮箱',
  `user_url` varchar(100) NOT NULL DEFAULT '' COMMENT '用户个人网站',
  `avatar` varchar(255) DEFAULT NULL COMMENT '用户头像，相对于upload/avatar目录',
  `sex` smallint(1) DEFAULT '0' COMMENT '性别；0：保密，1：男；2：女',
  `birthday` date DEFAULT NULL COMMENT '生日',
  `signature` varchar(255) DEFAULT NULL COMMENT '个性签名',
  `last_login_ip` varchar(16) NOT NULL COMMENT '最后登录ip',
  `last_login_time` datetime NOT NULL DEFAULT '2000-01-01 00:00:00' COMMENT '最后登录时间',
  `create_time` datetime NOT NULL DEFAULT '2000-01-01 00:00:00' COMMENT '注册时间',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '' COMMENT '激活码',
  `user_status` int(11) NOT NULL DEFAULT '1' COMMENT '用户状态 0：禁用； 1：正常 ；2：未验证',
  `score` int(11) NOT NULL DEFAULT '0' COMMENT '用户积分',
  `user_type` smallint(1) DEFAULT '1' COMMENT '用户类型，1:admin ;2:会员'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_users`
--

INSERT INTO `sp_users` (`id`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `avatar`, `sex`, `birthday`, `signature`, `last_login_ip`, `last_login_time`, `create_time`, `user_activation_key`, `user_status`, `score`, `user_type`) VALUES
(1, 'admin', 'c535018ee946baa408736e9a56dc887e48a095e6858289af', 'admin', 'a526584713@qq.com', '', NULL, 0, NULL, NULL, '0.0.0.0', '2015-10-10 08:55:14', '2015-09-14 01:51:20', '', 1, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `sp_user_favorites`
--

CREATE TABLE IF NOT EXISTS `sp_user_favorites` (
  `id` int(11) NOT NULL,
  `uid` bigint(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT '收藏内容的标题',
  `url` varchar(255) DEFAULT NULL COMMENT '收藏内容的原文地址，不带域名',
  `description` varchar(500) DEFAULT NULL COMMENT '收藏内容的描述',
  `table` varchar(50) DEFAULT NULL COMMENT '收藏实体以前所在表，不带前缀',
  `object_id` int(11) DEFAULT NULL COMMENT '收藏内容原来的主键id',
  `createtime` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sp_ad`
--
ALTER TABLE `sp_ad`
  ADD PRIMARY KEY (`ad_id`), ADD KEY `ad_name` (`ad_name`);

--
-- Indexes for table `sp_aid`
--
ALTER TABLE `sp_aid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_asset`
--
ALTER TABLE `sp_asset`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `sp_auth_access`
--
ALTER TABLE `sp_auth_access`
  ADD KEY `role_id` (`role_id`), ADD KEY `rule_name` (`rule_name`) USING BTREE;

--
-- Indexes for table `sp_auth_rule`
--
ALTER TABLE `sp_auth_rule`
  ADD PRIMARY KEY (`id`), ADD KEY `module` (`module`,`status`,`type`);

--
-- Indexes for table `sp_comments`
--
ALTER TABLE `sp_comments`
  ADD PRIMARY KEY (`id`), ADD KEY `comment_post_ID` (`post_id`), ADD KEY `comment_approved_date_gmt` (`status`), ADD KEY `comment_parent` (`parentid`), ADD KEY `table_id_status` (`post_table`,`post_id`,`status`), ADD KEY `createtime` (`createtime`);

--
-- Indexes for table `sp_common_action_log`
--
ALTER TABLE `sp_common_action_log`
  ADD PRIMARY KEY (`id`), ADD KEY `user_object_action` (`user`,`object`,`action`), ADD KEY `user_object_action_ip` (`user`,`object`,`action`,`ip`);

--
-- Indexes for table `sp_guestbook`
--
ALTER TABLE `sp_guestbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_links`
--
ALTER TABLE `sp_links`
  ADD PRIMARY KEY (`link_id`), ADD KEY `link_visible` (`link_status`);

--
-- Indexes for table `sp_menu`
--
ALTER TABLE `sp_menu`
  ADD PRIMARY KEY (`id`), ADD KEY `status` (`status`), ADD KEY `parentid` (`parentid`), ADD KEY `model` (`model`);

--
-- Indexes for table `sp_nav`
--
ALTER TABLE `sp_nav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_nav_cat`
--
ALTER TABLE `sp_nav_cat`
  ADD PRIMARY KEY (`navcid`);

--
-- Indexes for table `sp_oauth_user`
--
ALTER TABLE `sp_oauth_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_options`
--
ALTER TABLE `sp_options`
  ADD PRIMARY KEY (`option_id`), ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indexes for table `sp_plugins`
--
ALTER TABLE `sp_plugins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_posts`
--
ALTER TABLE `sp_posts`
  ADD PRIMARY KEY (`id`), ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`id`), ADD KEY `post_parent` (`post_parent`), ADD KEY `post_author` (`post_author`), ADD KEY `post_date` (`post_date`) USING BTREE;

--
-- Indexes for table `sp_role`
--
ALTER TABLE `sp_role`
  ADD PRIMARY KEY (`id`), ADD KEY `parentId` (`pid`), ADD KEY `status` (`status`);

--
-- Indexes for table `sp_role_user`
--
ALTER TABLE `sp_role_user`
  ADD KEY `group_id` (`role_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sp_route`
--
ALTER TABLE `sp_route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_slide`
--
ALTER TABLE `sp_slide`
  ADD PRIMARY KEY (`slide_id`), ADD KEY `slide_cid` (`slide_cid`);

--
-- Indexes for table `sp_slide_cat`
--
ALTER TABLE `sp_slide_cat`
  ADD PRIMARY KEY (`cid`), ADD KEY `cat_idname` (`cat_idname`);

--
-- Indexes for table `sp_terms`
--
ALTER TABLE `sp_terms`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `sp_term_relationships`
--
ALTER TABLE `sp_term_relationships`
  ADD PRIMARY KEY (`tid`), ADD KEY `term_taxonomy_id` (`term_id`);

--
-- Indexes for table `sp_users`
--
ALTER TABLE `sp_users`
  ADD PRIMARY KEY (`id`), ADD KEY `user_login_key` (`user_login`), ADD KEY `user_nicename` (`user_nicename`);

--
-- Indexes for table `sp_user_favorites`
--
ALTER TABLE `sp_user_favorites`
  ADD PRIMARY KEY (`id`), ADD KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sp_ad`
--
ALTER TABLE `sp_ad`
  MODIFY `ad_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '广告id';
--
-- AUTO_INCREMENT for table `sp_aid`
--
ALTER TABLE `sp_aid`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `sp_asset`
--
ALTER TABLE `sp_asset`
  MODIFY `aid` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sp_auth_rule`
--
ALTER TABLE `sp_auth_rule`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '规则id,自增主键',AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT for table `sp_comments`
--
ALTER TABLE `sp_comments`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sp_common_action_log`
--
ALTER TABLE `sp_common_action_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sp_guestbook`
--
ALTER TABLE `sp_guestbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sp_links`
--
ALTER TABLE `sp_links`
  MODIFY `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sp_menu`
--
ALTER TABLE `sp_menu`
  MODIFY `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT for table `sp_nav`
--
ALTER TABLE `sp_nav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sp_nav_cat`
--
ALTER TABLE `sp_nav_cat`
  MODIFY `navcid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sp_oauth_user`
--
ALTER TABLE `sp_oauth_user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sp_options`
--
ALTER TABLE `sp_options`
  MODIFY `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sp_plugins`
--
ALTER TABLE `sp_plugins`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id';
--
-- AUTO_INCREMENT for table `sp_posts`
--
ALTER TABLE `sp_posts`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `sp_role`
--
ALTER TABLE `sp_role`
  MODIFY `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sp_route`
--
ALTER TABLE `sp_route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '路由id';
--
-- AUTO_INCREMENT for table `sp_slide`
--
ALTER TABLE `sp_slide`
  MODIFY `slide_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sp_slide_cat`
--
ALTER TABLE `sp_slide_cat`
  MODIFY `cid` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sp_terms`
--
ALTER TABLE `sp_terms`
  MODIFY `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sp_term_relationships`
--
ALTER TABLE `sp_term_relationships`
  MODIFY `tid` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sp_users`
--
ALTER TABLE `sp_users`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sp_user_favorites`
--
ALTER TABLE `sp_user_favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
