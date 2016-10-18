-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-11-25 21:07:47
-- 服务器版本： 10.0.16-MariaDB
-- PHP Version: 5.5.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zhongyi`
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

--
-- 转存表中的数据 `sp_auth_access`
--

INSERT INTO `sp_auth_access` (`role_id`, `rule_name`, `type`) VALUES
(2, 'admin/menu/default', 'admin_url'),
(2, 'admin/link/add_post', 'admin_url'),
(2, 'admin/link/add', 'admin_url'),
(2, 'admin/link/edit_post', 'admin_url'),
(2, 'admin/link/edit', 'admin_url'),
(2, 'admin/link/delete', 'admin_url'),
(2, 'admin/link/toggle', 'admin_url'),
(2, 'admin/link/listorders', 'admin_url'),
(2, 'admin/link/index', 'admin_url'),
(2, 'admin/extension/default', 'admin_url'),
(2, 'admin/tag/delete', 'admin_url'),
(2, 'admin/tag/edit_post', 'admin_url'),
(2, 'admin/tag/edit', 'admin_url'),
(2, 'admin/tag/add_post', 'admin_url'),
(2, 'admin/tag/add', 'admin_url'),
(2, 'admin/tag/index', 'admin_url'),
(2, 'portal/adminpage/add_post', 'admin_url'),
(2, 'portal/adminpage/add', 'admin_url'),
(2, 'portal/adminpage/edit_post', 'admin_url'),
(2, 'portal/adminpage/edit', 'admin_url'),
(2, 'portal/adminpage/delete', 'admin_url'),
(2, 'portal/adminpage/listorders', 'admin_url'),
(2, 'portal/adminpage/index', 'admin_url'),
(2, 'portal/adminterm/add_post', 'admin_url'),
(2, 'portal/adminterm/add', 'admin_url'),
(2, 'portal/adminterm/edit_post', 'admin_url'),
(2, 'portal/adminterm/edit', 'admin_url'),
(2, 'portal/adminterm/delete', 'admin_url'),
(2, 'portal/adminterm/listorders', 'admin_url'),
(2, 'portal/adminterm/index', 'admin_url'),
(2, 'portal/adminpost/add_post', 'admin_url'),
(2, 'portal/adminpost/add', 'admin_url'),
(2, 'portal/adminpost/edit_post', 'admin_url'),
(2, 'portal/adminpost/edit', 'admin_url'),
(2, 'portal/adminpost/delete', 'admin_url'),
(2, 'portal/adminpost/check', 'admin_url'),
(2, 'portal/adminpost/move', 'admin_url'),
(2, 'portal/adminpost/recommend', 'admin_url'),
(2, 'portal/adminpost/top', 'admin_url'),
(2, 'portal/adminpost/listorders', 'admin_url'),
(2, 'portal/adminpost/index', 'admin_url'),
(2, 'admin/content/default', 'admin_url'),
(2, 'admin/navcat/default1', 'admin_url'),
(2, 'admin/nav/index', 'admin_url'),
(2, 'admin/nav/listorders', 'admin_url'),
(2, 'admin/nav/delete', 'admin_url'),
(2, 'admin/nav/edit', 'admin_url'),
(2, 'admin/nav/edit_post', 'admin_url'),
(2, 'admin/nav/add', 'admin_url'),
(2, 'admin/nav/add_post', 'admin_url'),
(2, 'admin/setting/default', 'admin_url'),
(2, 'admin/setting/userdefault', 'admin_url'),
(2, 'admin/user/userinfo', 'admin_url'),
(2, 'admin/user/userinfo_post', 'admin_url'),
(2, 'admin/setting/password', 'admin_url'),
(2, 'admin/setting/password_post', 'admin_url'),
(2, 'admin/setting/clearcache', 'admin_url'),
(2, 'admin/skill/default', 'admin_url'),
(2, 'admin/skill/index', 'admin_url'),
(2, 'admin/skill/add', 'admin_url'),
(2, 'admin/skill/add_post', 'admin_url'),
(2, 'admin/skill/edit', 'admin_url'),
(2, 'admin/skill/edit_post', 'admin_url'),
(2, 'admin/skill/delete', 'admin_url'),
(2, 'admin/skill/xianji', 'admin_url'),
(2, 'admin/skill/delete_xianji', 'admin_url'),
(2, 'admin/skill/tuijian', 'admin_url'),
(2, 'admin/skill/delete_tuijian', 'admin_url');

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
) ENGINE=MyISAM AUTO_INCREMENT=179 DEFAULT CHARSET=utf8 COMMENT='权限规则表';

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
(162, 'Admin', 'admin_url', 'admin/skill/default', NULL, '我要献技', 1, ''),
(163, 'Admin', 'admin_url', 'admin/skill/index', NULL, '技术类型', 1, ''),
(164, 'Admin', 'admin_url', 'admin/skill/add', NULL, '添加技术类型', 1, ''),
(165, 'Admin', 'admin_url', 'admin/skill/add_post', NULL, '技术类型添加', 1, ''),
(166, 'Admin', 'admin_url', 'admin/skill/edit', NULL, '技术类型修改', 1, ''),
(167, 'Admin', 'admin_url', 'admin/skill/edit_post', NULL, '修改提交', 1, ''),
(168, 'Admin', 'admin_url', 'admin/skill/delete', NULL, '删除信息', 1, ''),
(169, 'Admin', 'admin_url', 'admin/skill/xianji', NULL, '献计列表', 1, ''),
(170, 'Admin', 'admin_url', 'admin/skill/tuijian', NULL, '推荐列表', 1, ''),
(171, 'Admin', 'admin_url', 'admin/skill/delete_xianji', NULL, '删除献计列表', 1, ''),
(172, 'Admin', 'admin_url', 'admin/skill/delete_tuijian', NULL, '删除推荐列表', 1, ''),
(173, 'Admin', 'admin_url', 'admin/tag/index', NULL, '标签管理', 1, ''),
(174, 'Admin', 'admin_url', 'admin/tag/add', NULL, '添加标签', 1, ''),
(175, 'Admin', 'admin_url', 'admin/tag/add_post', NULL, '添加标签post', 1, ''),
(176, 'Admin', 'admin_url', 'admin/tag/edit', NULL, '修改标签', 1, ''),
(177, 'Admin', 'admin_url', 'admin/tag/edit_post', NULL, '修改标签post', 1, ''),
(178, 'Admin', 'admin_url', 'admin/tag/delete', NULL, '删除标签', 1, '');

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
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_common_action_log`
--

INSERT INTO `sp_common_action_log` (`id`, `user`, `object`, `action`, `count`, `last_time`, `ip`) VALUES
(1, 0, 'posts2', 'Portal-Article-index', 29, 1445344775, '0.0.0.0'),
(2, 0, 'posts4', 'Portal-Article-index', 9, 1445516554, '0.0.0.0'),
(3, 0, 'posts5', 'Portal-Article-index', 7, 1445765558, '0.0.0.0'),
(4, 0, 'posts6', 'Portal-Article-index', 10, 1445771486, '0.0.0.0'),
(5, 0, 'posts7', 'Portal-Article-index', 47, 1445774167, '0.0.0.0'),
(6, 0, 'posts8', 'Portal-Article-index', 9, 1445768362, '0.0.0.0'),
(7, 0, 'posts9', 'Portal-Article-index', 25, 1445766279, '0.0.0.0'),
(8, 0, 'posts15', 'Portal-Article-index', 5, 1445766541, '0.0.0.0'),
(9, 0, 'posts13', 'Portal-Article-index', 38, 1445515371, '0.0.0.0'),
(10, 0, 'posts11', 'Portal-Article-index', 1, 1445524598, '0.0.0.0'),
(11, 0, 'posts10', 'Portal-Article-index', 1, 1445689054, '0.0.0.0'),
(12, 0, 'posts28', 'Portal-Article-index', 1, 1445765957, '0.0.0.0'),
(13, 0, 'posts12', 'Portal-Article-index', 4, 1445774002, '0.0.0.0'),
(14, 0, 'posts7', 'Portal-Article-index', 1, 1445775238, '116.216.0.26'),
(15, 0, 'posts31', 'Portal-Article-index', 1, 1445776870, '116.216.0.26'),
(16, 0, 'posts28', 'Portal-Article-index', 1, 1446024334, '210.22.154.194'),
(17, 0, 'posts32', 'Portal-Article-index', 2, 1446231448, '64.79.100.33'),
(18, 0, 'posts32', 'Portal-Article-index', 1, 1446589137, '38.99.82.191'),
(19, 0, 'posts32', 'Portal-Article-index', 4, 1446860289, '114.92.91.177'),
(20, 0, 'posts33', 'Portal-Article-index', 2, 1447894366, '64.79.100.29'),
(21, 0, 'posts32', 'Portal-Article-index', 2, 1447894366, '64.79.100.29'),
(22, 0, 'posts34', 'Portal-Article-index', 2, 1447894369, '64.79.100.29'),
(23, 0, 'posts35', 'Portal-Article-index', 2, 1447894377, '64.79.100.29'),
(24, 0, 'posts32', 'Portal-Article-index', 2, 1448403429, '64.79.100.20'),
(25, 0, 'posts33', 'Portal-Article-index', 2, 1448403431, '64.79.100.20'),
(26, 0, 'posts34', 'Portal-Article-index', 2, 1448403434, '64.79.100.20');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_links`
--

INSERT INTO `sp_links` (`link_id`, `link_url`, `link_name`, `link_image`, `link_target`, `link_description`, `link_status`, `link_rating`, `link_rel`, `listorder`) VALUES
(1, 'http://www.sgyy.cn', '上海中医药大学附属曙光医院', '/data/upload/563d8c1ddff02.jpg', '_blank', '', 1, 0, '', 0),
(2, 'http://www.sgjjh.com', '上海曙光中医药研究发展基金会', '/data/upload/563d8d1828d52.jpg', '_blank', '', 1, 0, '', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=179 DEFAULT CHARSET=utf8;

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
(162, 0, 'Admin', 'Skill', 'default', '', 1, 1, '我要献技', 'film', '', 0),
(163, 162, 'Admin', 'Skill', 'index', '', 1, 1, '技术类型', '', '', 0),
(164, 163, 'Admin', 'Skill', 'add', '', 1, 0, '添加技术类型', '', '', 0),
(165, 163, 'Admin', 'Skill', 'add_post', '', 1, 0, '技术类型添加', '', '', 0),
(166, 163, 'Admin', 'Skill', 'edit', '', 1, 0, '技术类型修改', '', '', 0),
(167, 163, 'Admin', 'Skill', 'edit_post', '', 1, 0, '修改提交', '', '', 0),
(168, 163, 'Admin', 'Skill', 'delete', '', 1, 0, '删除信息', '', '', 0),
(169, 162, 'Admin', 'Skill', 'xianji', '', 1, 1, '献计列表', '', '', 0),
(170, 162, 'Admin', 'Skill', 'tuijian', '', 1, 1, '推荐列表', '', '', 0),
(171, 169, 'Admin', 'Skill', 'delete_xianji', '', 1, 0, '删除献计列表', '', '', 0),
(172, 170, 'Admin', 'Skill', 'delete_tuijian', '', 1, 0, '删除推荐列表', '', '', 0),
(173, 1, 'Admin', 'Tag', 'index', '', 1, 1, '标签管理', '', '', 0),
(174, 173, 'Admin', 'Tag', 'add', '', 1, 0, '添加标签', '', '', 0),
(175, 173, 'Admin', 'Tag', 'add_post', '', 1, 0, '添加标签post', '', '', 0),
(176, 173, 'Admin', 'Tag', 'edit', '', 1, 0, '修改标签', '', '', 0),
(177, 173, 'Admin', 'Tag', 'edit_post', '', 1, 0, '修改标签post', '', '', 0),
(178, 173, 'Admin', 'Tag', 'delete', '', 1, 0, '删除标签', '', '', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_nav`
--

INSERT INTO `sp_nav` (`id`, `cid`, `parentid`, `label`, `target`, `href`, `icon`, `status`, `listorder`, `path`) VALUES
(1, 1, 0, '首页', '', 'home', '', 1, 0, '0-1'),
(2, 1, 0, '资讯中心', '', 'a:2:{s:6:"action";s:17:"Portal/List/index";s:5:"param";a:1:{s:2:"id";s:1:"3";}}', '', 1, 0, '0-2'),
(3, 1, 0, '技术验方', '', 'a:2:{s:6:"action";s:17:"Portal/Page/index";s:5:"param";a:1:{s:2:"id";s:2:"22";}}', '', 1, 0, '0-3'),
(4, 1, 2, '活动预告', '', 'a:2:{s:6:"action";s:17:"Portal/List/index";s:5:"param";a:1:{s:2:"id";s:1:"3";}}', '', 1, 0, '0-2-4'),
(5, 1, 2, '新闻动态', '', 'a:2:{s:6:"action";s:17:"Portal/List/index";s:5:"param";a:1:{s:2:"id";s:1:"4";}}', '', 1, 0, '0-2-5'),
(6, 1, 2, '通知公告', '', 'a:2:{s:6:"action";s:17:"Portal/List/index";s:5:"param";a:1:{s:2:"id";s:1:"5";}}', '', 1, 0, '0-2-6'),
(16, 1, 0, '我要献技', '', 'a:2:{s:6:"action";s:17:"Portal/Page/index";s:5:"param";a:1:{s:2:"id";s:2:"16";}}', '', 1, 0, '0-16'),
(17, 1, 0, '研究所', '', 'a:2:{s:6:"action";s:17:"Portal/Page/index";s:5:"param";a:1:{s:2:"id";s:2:"17";}}', '', 1, 0, '0-17'),
(18, 1, 0, '下载中心', '', 'a:2:{s:6:"action";s:17:"Portal/List/index";s:5:"param";a:1:{s:2:"id";s:2:"38";}}', '', 1, 0, '0-18'),
(19, 1, 0, '关于我们', '', 'a:2:{s:6:"action";s:17:"Portal/Page/index";s:5:"param";a:1:{s:2:"id";s:2:"24";}}', '', 1, 0, '0-19'),
(20, 1, 16, '我有线索', '', 'a:2:{s:6:"action";s:17:"Portal/Page/index";s:5:"param";a:1:{s:2:"id";s:2:"18";}}', '', 1, 0, '0-16-20');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_options`
--

INSERT INTO `sp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'member_email_active', '{"title":"ThinkCMF\\u90ae\\u4ef6\\u6fc0\\u6d3b\\u901a\\u77e5.","template":"<p>\\u672c\\u90ae\\u4ef6\\u6765\\u81ea<a href=\\"http:\\/\\/www.thinkcmf.com\\">ThinkCMF<\\/a><br\\/><br\\/>&nbsp; &nbsp;<strong>---------------<\\/strong><br\\/>&nbsp; &nbsp;<strong>\\u5e10\\u53f7\\u6fc0\\u6d3b\\u8bf4\\u660e<\\/strong><br\\/>&nbsp; &nbsp;<strong>---------------<\\/strong><br\\/><br\\/>&nbsp; &nbsp; \\u5c0a\\u656c\\u7684<span style=\\"FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)\\">#username#\\uff0c\\u60a8\\u597d\\u3002<\\/span>\\u5982\\u679c\\u60a8\\u662fThinkCMF\\u7684\\u65b0\\u7528\\u6237\\uff0c\\u6216\\u5728\\u4fee\\u6539\\u60a8\\u7684\\u6ce8\\u518cEmail\\u65f6\\u4f7f\\u7528\\u4e86\\u672c\\u5730\\u5740\\uff0c\\u6211\\u4eec\\u9700\\u8981\\u5bf9\\u60a8\\u7684\\u5730\\u5740\\u6709\\u6548\\u6027\\u8fdb\\u884c\\u9a8c\\u8bc1\\u4ee5\\u907f\\u514d\\u5783\\u573e\\u90ae\\u4ef6\\u6216\\u5730\\u5740\\u88ab\\u6ee5\\u7528\\u3002<br\\/>&nbsp; &nbsp; \\u60a8\\u53ea\\u9700\\u70b9\\u51fb\\u4e0b\\u9762\\u7684\\u94fe\\u63a5\\u5373\\u53ef\\u6fc0\\u6d3b\\u60a8\\u7684\\u5e10\\u53f7\\uff1a<br\\/>&nbsp; &nbsp; <a title=\\"\\" href=\\"http:\\/\\/#link#\\" target=\\"_self\\">http:\\/\\/#link#<\\/a><br\\/>&nbsp; &nbsp; (\\u5982\\u679c\\u4e0a\\u9762\\u4e0d\\u662f\\u94fe\\u63a5\\u5f62\\u5f0f\\uff0c\\u8bf7\\u5c06\\u8be5\\u5730\\u5740\\u624b\\u5de5\\u7c98\\u8d34\\u5230\\u6d4f\\u89c8\\u5668\\u5730\\u5740\\u680f\\u518d\\u8bbf\\u95ee)<br\\/>&nbsp; &nbsp; \\u611f\\u8c22\\u60a8\\u7684\\u8bbf\\u95ee\\uff0c\\u795d\\u60a8\\u4f7f\\u7528\\u6109\\u5feb\\uff01<br\\/><br\\/>&nbsp; &nbsp; \\u6b64\\u81f4<br\\/>&nbsp; &nbsp; ThinkCMF \\u7ba1\\u7406\\u56e2\\u961f.<\\/p>"}', 1),
(2, 'site_options', '{"site_name":"\\u4e0a\\u6d77\\u5e02\\u6c11\\u95f4\\u4e2d\\u533b","site_host":"http:\\/\\/www.shtszl.org\\/","site_tpl":"simplebootx","site_adminstyle":"bluesky","site_icp":"","site_admin_email":"a526584713@qq.com","site_tongji":"","site_copyright":"","site_seo_title":"\\u4e0a\\u6d77\\u5e02\\u6c11\\u95f4\\u4e2d\\u533b","site_seo_keywords":"","site_seo_description":"\\u4e0a\\u6d77\\u5e02\\u6c11\\u95f4\\u4e2d\\u533b","urlmode":"0","html_suffix":"","comment_time_interval":60}', 1),
(3, 'cmf_settings', '{"banned_usernames":""}', 1);

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
  `start` varchar(50) NOT NULL COMMENT '门诊时间',
  `close` varchar(50) NOT NULL COMMENT '结束时间',
  `tag` smallint(6) NOT NULL COMMENT '标签',
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
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_posts`
--

INSERT INTO `sp_posts` (`id`, `post_author`, `post_keywords`, `post_source`, `post_date`, `post_content`, `post_title`, `post_excerpt`, `start`, `close`, `tag`, `post_status`, `comment_status`, `post_modified`, `post_content_filtered`, `post_parent`, `post_type`, `post_mime_type`, `comment_count`, `smeta`, `post_hits`, `post_like`, `istop`, `recommended`) VALUES
(1, 1, 'UPCOMING EVENTS', NULL, '2015-10-18 18:24:25', '<p>关于我们</p>', '关于我们', '关于我们', '', '', 0, 0, 1, '2015-10-18 18:24:15', NULL, 0, 2, '', 0, '{"thumb":"","template":"about"}', 0, 0, 0, 0),
(2, 1, '活动预告', '活动预告', '2015-10-20 15:44:54', '<h4 style="margin: 0px; padding: 0px; font-size: 14px; vertical-align: baseline; font-weight: normal; color: rgb(87, 87, 87); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; line-height: 22.3999996185303px; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bold" style="font-size: 16px; color: rgb(157, 54, 44); font-weight: 600;">山东推出244线山东推出244线山东推出244线山东推出244线山东推出244线</span></h4><h4 style="margin: 0px; padding: 0px; font-size: 14px; vertical-align: baseline; font-weight: normal; color: rgb(87, 87, 87); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; line-height: 22.3999996185303px; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bold" style="font-size: 16px; color: rgb(157, 54, 44); font-weight: 600;">山东推出244线山东推出244线山东推出244线山东推出244线山东推出244线</span></h4><h4 style="margin: 0px; padding: 0px; font-size: 14px; vertical-align: baseline; font-weight: normal; color: rgb(87, 87, 87); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; line-height: 22.3999996185303px; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bold" style="font-size: 16px; color: rgb(157, 54, 44); font-weight: 600;">山东推出244线山东推出244线山东推出244线山东推出244线山东推出244线</span></h4><h4 style="margin: 0px; padding: 0px; font-size: 14px; vertical-align: baseline; font-weight: normal; color: rgb(87, 87, 87); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; line-height: 22.3999996185303px; white-space: normal; background-color: rgb(255, 255, 255);"><span class="bold" style="font-size: 16px; color: rgb(157, 54, 44); font-weight: 600;">山东推出244线山东推出244线山东推出244线山东推出244线山东推出244线</span></h4><h4 style="white-space: normal; margin: 0px; padding: 0px; font-size: 14px; vertical-align: baseline; font-weight: normal; color: rgb(87, 87, 87); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; line-height: 22.3999996185303px; background-color: rgb(255, 255, 255);"><span class="bold" style="font-size: 16px; color: rgb(157, 54, 44); font-weight: 600;">山东推出244线山东推出244线山东推出244线山东推出244线山东推出244线</span></h4><h4 style="white-space: normal; margin: 0px; padding: 0px; font-size: 14px; vertical-align: baseline; font-weight: normal; color: rgb(87, 87, 87); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; line-height: 22.3999996185303px; background-color: rgb(255, 255, 255);"><span class="bold" style="font-size: 16px; color: rgb(157, 54, 44); font-weight: 600;">山东推出244线山东推出244线山东推出244线山东推出244线山东推出244线</span></h4><h4 style="white-space: normal; margin: 0px; padding: 0px; font-size: 14px; vertical-align: baseline; font-weight: normal; color: rgb(87, 87, 87); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; line-height: 22.3999996185303px; background-color: rgb(255, 255, 255);"><span class="bold" style="font-size: 16px; color: rgb(157, 54, 44); font-weight: 600;">山东推出244线山东推出244线山东推出244线山东推出244线山东推出244线</span></h4><h4 style="white-space: normal; margin: 0px; padding: 0px; font-size: 14px; vertical-align: baseline; font-weight: normal; color: rgb(87, 87, 87); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; line-height: 22.3999996185303px; background-color: rgb(255, 255, 255);"><span class="bold" style="font-size: 16px; color: rgb(157, 54, 44); font-weight: 600;">山东推出244线山东推出244线山东推出244线山东推出244线山东推出244线</span></h4><p><span class="bold" style="font-size: 16px; color: rgb(157, 54, 44); font-weight: 600;"><br/></span></p><h4 style="white-space: normal; margin: 0px; padding: 0px; font-size: 14px; vertical-align: baseline; font-weight: normal; color: rgb(87, 87, 87); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; line-height: 22.3999996185303px; background-color: rgb(255, 255, 255);"><span class="bold" style="font-size: 16px; color: rgb(157, 54, 44); font-weight: 600;">山东推出244线山东推出244线山东推出244线山东推出244线山东推出244线</span></h4><h4 style="white-space: normal; margin: 0px; padding: 0px; font-size: 14px; vertical-align: baseline; font-weight: normal; color: rgb(87, 87, 87); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; line-height: 22.3999996185303px; background-color: rgb(255, 255, 255);"><span class="bold" style="font-size: 16px; color: rgb(157, 54, 44); font-weight: 600;">山东推出244线山东推出244线山东推出244线山东推出244线山东推出244线</span></h4><h4 style="white-space: normal; margin: 0px; padding: 0px; font-size: 14px; vertical-align: baseline; font-weight: normal; color: rgb(87, 87, 87); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; line-height: 22.3999996185303px; background-color: rgb(255, 255, 255);"><span class="bold" style="font-size: 16px; color: rgb(157, 54, 44); font-weight: 600;">山东推出244线山东推出244线山东推出244线山东推出244线山东推出244线</span></h4><h4 style="white-space: normal; margin: 0px; padding: 0px; font-size: 14px; vertical-align: baseline; font-weight: normal; color: rgb(87, 87, 87); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; line-height: 22.3999996185303px; background-color: rgb(255, 255, 255);"><span class="bold" style="font-size: 16px; color: rgb(157, 54, 44); font-weight: 600;">山东推出244线山东推出244线山东推出244线山东推出244线山东推出244线</span></h4><p><span class="bold" style="font-size: 16px; color: rgb(157, 54, 44); font-weight: 600;"><br/></span></p><p><br/></p>', '活动预告', '活动预告', '', '', 0, 1, 1, '2015-10-20 15:44:35', NULL, 0, NULL, '', 0, '{"thumb":"5626260151175.jpg"}', 1, 0, 0, 0),
(3, 1, '历史沿革', NULL, '2015-10-20 19:50:20', '<p>历史沿革</p>', '历史沿革', '历史沿革', '', '', 0, 1, 1, '2015-10-20 19:50:12', NULL, 0, 2, '', 0, '{"thumb":"","template":"about"}', 0, 0, 0, 0),
(4, 1, '哈哈哈', '哈哈哈', '2015-10-20 20:01:22', '<p>传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页</p><p><br/></p><p>传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页</p><p><br/></p><p>传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页</p><p><br/></p><p>传承人详情页传承人详情页传传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页</p><p style="white-space: normal;">传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;">传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;">传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页</p><p style="white-space: normal;"><br/></p><p style="white-space: normal;">传承人详情页传承人详情页传传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页承人详情页传承人详情页传承人详情页传承人详情页传承人详情页传承人详情页</p><p><br/></p>', '哈哈哈', '哈哈哈', '', '', 0, 1, 1, '2015-10-20 20:00:50', NULL, 0, NULL, '', 0, '{"thumb":"56262d4d8d9a7.jpeg"}', 1, 0, 0, 0),
(5, 1, '打死的撒', '打死的撒', '2015-10-20 20:17:03', '<p>打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒打死的撒</p>', '打死的撒', '打死的撒', '8：30', '15:30', 0, 1, 1, '2015-10-20 20:16:38', NULL, 0, NULL, '', 0, '{"thumb":"56263167f3eb0.jpeg"}', 1, 0, 0, 0),
(6, 1, 'hahhdasd', 'hahhdasd', '2015-10-20 20:39:29', '<p><br/><video class="edui-upload-video  vjs-default-skin  video-js" controls="" preload="none" width="420" height="280" src="http://localhost/zhongyi/data/upload/ueditor/20151020/562635ce29235.mp4" data-setup="{}"><source src="http://localhost/zhongyi/data/upload/ueditor/20151020/562635ce29235.mp4" type="video/mp4"/></video></p>', 'hahhdasd', 'hahhdasd', '', '', 0, 1, 1, '2015-10-20 20:26:18', NULL, 0, NULL, '', 0, '{"thumb":""}', 1, 0, 0, 0),
(7, 1, 'MEDIA INFO', '', '2015-10-20 20:55:26', '<p><embed type="application/x-shockwave-flash" class="edui-faked-video" pluginspage="http://www.macromedia.com/go/getflashplayer" src="http://player.youku.com/player.php/sid/XNzM0MTI2NDM2/v.swf" width="420" height="280" wmode="transparent" play="true" loop="false" menu="false" allowscriptaccess="never" allowfullscreen="true"/></p><p>这是媒体报道的一些相关和具体的东西啊你们来看看撒啊啊的户外</p>', '媒体报道测试', '1212', '', '', 0, 1, 1, '2015-10-20 20:54:33', NULL, 0, NULL, '', 0, '{"thumb":"562639a430426.jpg"}', 2, 0, 0, 0),
(8, 1, '媒体报道测试啊', '媒体报道测试啊', '2015-10-20 21:02:44', '<p>媒体报道测试啊</p>', '媒体报道测试啊', '媒体报道测试啊', '媒体报道测试啊', '', 0, 1, 1, '2015-10-20 21:02:31', NULL, 0, NULL, '', 0, '{"thumb":"562ca23b2acc7.jpg"}', 1, 0, 0, 0),
(9, 1, 'SHOW STYLE', '风采展示', '2015-10-20 21:53:23', '<p>风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示风采展示</p>', '风采展示', '风采展示', '', '', 0, 1, 1, '2015-10-20 21:49:51', NULL, 0, NULL, '', 0, '{"thumb":"56264750a1595.jpg","photo":[{"url":"562647390c17e.jpg","alt":"vd-fav"},{"url":"5626474059581.jpg","alt":"yan1"}]}', 1, 0, 0, 0),
(10, 1, 'VIDEO INFO', 'VIDEO INFO', '2015-10-20 22:18:35', '<p><embed type="application/x-shockwave-flash" class="edui-faked-video" pluginspage="http://www.macromedia.com/go/getflashplayer" src="http://player.youku.com/player.php/sid/XNzM0MTI2NDM2/v.swf" width="420" height="280" wmode="transparent" play="true" loop="false" menu="false" allowscriptaccess="never" allowfullscreen="true"/></p>', '视频库内容', '视频库内容', '', '', 0, 1, 1, '2015-10-20 22:17:51', NULL, 0, NULL, '', 0, '{"thumb":"56264d2aec39f.jpg"}', 1, 0, 0, 0),
(11, 1, '公告，是指政府团体对重大事件当众正式公户或者公开宣告', '公告，是指政府团体对重大事件当众正式公户或者公开宣告', '2015-10-20 22:26:38', '<p><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a></p>', '公告，是指政府团体对重大事件当众正式公户或者公开宣告', '公告，是指政府团体对重大事件当众正式公户或者公开宣告', '', '', 0, 1, 1, '2015-10-20 22:26:32', NULL, 0, NULL, '', 0, '{"thumb":""}', 1, 0, 0, 0),
(12, 1, '公告，是指政府团体对重大事件当众正式公户或者公开宣告', '公告，是指政府团体对重大事件当众正式公户或者公开宣告', '2015-10-20 22:26:49', '<p><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a><a href="http://localhost/zhongyi/#" style="text-decoration: none; color: rgb(225, 157, 53); font-family: 微软雅黑, 宋体, Arial, Helvetica, sans-serif; font-size: 14px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);">公告，是指政府团体对重大事件当众正式公户或者公开宣告</a></p>', '公告，是指政府团体对重大事件当众正式公户或者公开宣告', '公告，是指政府团体对重大事件当众正式公户或者公开宣告', '', '', 0, 1, 1, '2015-10-20 22:26:41', NULL, 0, NULL, '', 0, '{"thumb":""}', 1, 0, 0, 0),
(13, 1, '活动预告二', '活动预告二', '2015-10-20 22:34:32', '<p>活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二活动预告二</p>', '活动预告二', '活动预告二', '', '', 0, 1, 1, '2015-10-20 22:34:13', NULL, 0, NULL, '', 0, '{"thumb":"562650f019952.png"}', 1, 0, 0, 0),
(14, 1, 'INFOS', '新闻动态信息', '2015-10-21 20:09:12', '<p>新闻动态信息新闻动态信息新闻动态信息新闻动态信息新闻动态信息新闻动态信息新闻动态信息新闻动态信息新闻动态信息新闻动态信息新闻动态信息新闻动态信息新闻动态信息</p>', '新闻动态信息', '新闻动态信息', '', '', 0, 1, 1, '2015-10-21 20:08:33', NULL, 0, NULL, '', 0, '{"thumb":""}', 0, 0, 0, 0),
(15, 1, '教授', '', '2015-10-21 20:23:20', '<p>朱家雄教授是著名的某某某学院硕士级别的人物</p>', '朱家雄', '朱家雄教授', '', '', 0, 1, 1, '2015-10-21 20:16:14', NULL, 0, NULL, '', 0, '{"thumb":"562783b560d3a.jpg"}', 1, 0, 0, 0),
(16, 1, '我要献计', NULL, '2015-10-21 21:37:16', '<p>我要献计</p>', '我要献计', '我要献计', '', '', 0, 1, 1, '2015-10-21 21:37:04', NULL, 0, 2, '', 0, '{"thumb":"","template":"xian"}', 0, 0, 0, 0),
(17, 1, 'ABOUTS', NULL, '2015-10-21 22:25:46', '<p>关于研究所关于研究所关于研究所</p>', '关于研究所', '关于研究所关于研究所关于研究所', '', '', 0, 1, 1, '2015-10-21 22:25:35', NULL, 0, 2, '', 0, '{"thumb":"","template":"yanjiu"}', 0, 0, 0, 0),
(18, 1, 'XIANSUO', NULL, '2015-10-22 13:05:12', '<p>我有线索</p>', '我有线索', '我有线索', '', '', 0, 1, 1, '2015-10-22 13:05:02', NULL, 0, 2, '', 0, '{"thumb":"","template":"tuijian"}', 0, 0, 0, 0),
(19, 1, '新闻来看看', '新闻来看看', '2015-10-22 14:47:36', '<p>新闻来看看</p>', '新闻来看看', '新闻来看看', '', '', 0, 1, 1, '2015-10-22 14:47:22', NULL, 0, NULL, '', 0, '{"thumb":""}', 0, 0, 0, 0),
(20, 1, '', '测试大声地撒的', '2015-10-22 14:49:30', '<p>测试大声地撒的</p>', '测试大声地撒的', '测试大声地撒的', '', '', 0, 1, 1, '2015-10-22 14:48:50', NULL, 0, NULL, '', 0, '{"thumb":""}', 0, 0, 0, 0),
(21, 1, '', '通知公告', '2015-10-22 14:50:14', '<p>通知公告通知公告通知公告通知公告</p>', '通知公告', '通知公告通知公告', '', '', 3, 1, 1, '2015-10-22 14:50:02', NULL, 0, NULL, '', 0, '{"thumb":""}', 0, 0, 0, 0),
(22, 1, 'YAN FANG', NULL, '2015-10-22 14:55:13', '<p>技术验方技术验方</p>', '技术验方', '技术验方', '', '', 0, 1, 1, '2015-10-22 14:54:53', NULL, 0, 2, '', 0, '{"thumb":"","template":"yanfang"}', 0, 0, 0, 0),
(23, 1, '', NULL, '2015-10-22 15:32:46', '<p>guasha</p>', 'guasha', 'guasha', '', '', 0, 0, 1, '2015-10-22 15:32:34', NULL, 0, 2, '', 0, '{"thumb":"","template":"yiji"}', 0, 0, 0, 0),
(24, 1, 'UPCOMING EVENTS', NULL, '2015-10-22 20:01:54', '<p>关于我们</p>', '关于我们', '关于我们', '', '', 0, 1, 1, '2015-10-22 20:01:47', NULL, 0, 2, '', 0, '{"thumb":"","template":"about"}', 0, 0, 0, 0),
(25, 1, '分第三方斯蒂芬', '分第三方斯蒂芬', '2015-10-23 21:16:47', '<p>分第三方斯蒂芬</p>', '分第三方斯蒂芬', '分第三方斯蒂芬', '', '', 0, 1, 1, '2015-10-23 21:15:51', NULL, 0, NULL, '', 0, '{"thumb":""}', 0, 0, 0, 0),
(26, 1, '的撒的撒', '的撒的撒', '2015-10-24 18:53:28', '<p>的撒的撒</p>', '的撒的撒', '的撒的撒', '', '', 0, 1, 1, '2015-10-24 18:53:14', NULL, 0, NULL, '', 0, '{"thumb":""}', 0, 0, 0, 0),
(27, 1, '啊的撒', '', '2015-10-24 19:52:55', '<p>特色啊啊特色啊啊特色啊啊</p>', '特色啊啊', '特色啊啊', '', '', 0, 1, 1, '2015-10-24 19:52:25', NULL, 0, NULL, '', 0, '{"thumb":"562b71156f031.jpg"}', 0, 0, 0, 0),
(28, 1, '历史沿岸展示啊', '历史沿岸展示啊', '2015-10-25 17:38:26', '<p>历史沿岸展示啊</p>', '历史沿岸展示啊', '历史沿岸展示啊', '', '', 0, 1, 1, '2015-10-25 17:38:04', NULL, 0, NULL, '', 0, '{"thumb":"562ca3109be31.jpg"}', 2, 0, 0, 0),
(29, 1, '史料测试啊', '史料测试啊', '2015-10-25 17:49:44', '<p>史料测试啊史料测试啊我们来史料测试啊啊史料测试啊史料测试啊我们来史料测试啊啊史料测试啊史料测试啊我们来史料测试啊啊史料测试啊史料测试啊我们来史料测试啊啊史料测试啊史料测试啊我们来史料测试啊啊史料测试啊史料测试啊我们来史料测试啊啊史料测试啊史料测试啊我们来史料测试啊啊史料测试啊史料测试啊我们来史料测试啊啊史料测试啊史料测试啊我们来史料测试啊啊史料测试啊史料测试啊我们来史料测试啊啊史料测试啊史料测试啊我们来史料测试啊啊史料测试啊史料测试啊我们来史料测试啊啊</p>', '史料测试啊', '史料测试啊', '', '', 0, 1, 1, '2015-10-25 17:49:15', NULL, 0, NULL, '', 0, '{"thumb":"562ca5a98ef49.png"}', 0, 0, 0, 0),
(30, 1, '器具测试', '器具测试', '2015-10-25 17:50:20', '<p>我们都来器具测试啊啊是的撒的撒大我们都来器具测试啊啊是的撒的撒大我们都来器具测试啊啊是的撒的撒大我们都来器具测试啊啊是的撒的撒大我们都来器具测试啊啊是的撒的撒大我们都来器具测试啊啊是的撒的撒大我们都来器具测试啊啊是的撒的撒大我们都来器具测试啊啊是的撒的撒大我们都来器具测试啊啊是的撒的撒大我们都来器具测试啊啊是的撒的撒大我们都来器具测试啊啊是的撒的撒大我们都来器具测试啊啊是的撒的撒大我们都来器具测试啊啊是的撒的撒大我们都来器具测试啊啊是的撒的撒大</p>', '器具测试', '器具测试', '', '', 0, 1, 1, '2015-10-25 17:49:56', NULL, 0, NULL, '', 0, '{"thumb":"562ca5e6b5684.jpg"}', 0, 0, 0, 0),
(31, 1, '研究所工作动态信息', '', '2015-10-25 20:40:58', '<p>研究所工作动态信息研究所工作动态信息研究所工作动态信息研究所工作动态信息研究所工作动态信息研究所工作动态信息</p>', '研究所工作动态信息', '研究所工作动态信息', '', '', 2, 1, 1, '2015-10-25 20:40:28', NULL, 0, NULL, '', 0, '{"thumb":"562ccdd747868.jpg"}', 1, 0, 0, 0),
(32, 1, '', '', '2015-10-29 21:16:30', '<p style="text-align:center"><strong><span style="font-size:24px;font-family:黑体">会 议 议 程</span></strong></p><p><strong style="line-height: 150%;"><br/></strong></p><p style="text-align: center;"><strong style="line-height: 150%;">日期：</strong><span style="line-height: 150%;">2015</span><span style="line-height: 150%;">年</span><span style="line-height: 150%;">10</span><span style="line-height: 150%;">月</span><span style="line-height: 150%;">23</span><span style="line-height: 150%;">日</span><span style="line-height: 150%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><strong style="line-height: 150%;">地点：</strong><span style="line-height: 150%;">上海市浦东张衡路</span><span style="line-height: 150%;">528</span><span style="line-height: 150%;">号</span></p><p style="text-align: center;"><span style="line-height: 150%; text-indent: 296px;">（曙光医院住院部</span><span style="line-height: 150%; text-indent: 296px;">2</span><span style="line-height: 150%; text-indent: 296px;">楼学术报告厅）</span></p><p style="line-height:150%"><strong><span style="font-size:16px;line-height:150%">&nbsp;</span></strong></p><p style="line-height:150%"><strong><span style="font-size:16px;line-height:150%">I </span></strong><strong>开幕式（主持人陆嘉惠）</strong></p><p style="line-height:150%"><span style="font-size:16px;line-height:150%">09:00-09:05 </span><span style="font-size: 16px;line-height: 150%">曙光医院领导致欢迎辞（周华）</span></p><p style="line-height:150%"><span style="font-size:16px;line-height:150%">09:05-09:10 </span><span style="font-size: 16px;line-height: 150%">上海市中医药学会民间中医药分会主委讲话（余小萍）</span></p><p style="line-height:150%"><span style="font-size:16px;line-height:150%">09:10-09:15 </span><span style="font-size: 16px;line-height: 150%">上海市民间中医特色诊疗技术评价中心网站以及微信公众号</span></p><p style="text-indent:88px;line-height:150%"><span style="font-size: 16px;line-height: 150%">介绍（关鑫）</span></p><p style="line-height:150%"><span style="font-size:16px;line-height:150%">09:15-09:20 </span><span style="font-size: 16px;line-height: 150%">“上海市民间中医特色诊疗技术评价中心征集基地”颁牌</span></p><p style="line-height:150%"><span style="font-size:16px;line-height:150%">09:20-09:25 </span><span style="font-size: 16px;line-height: 150%">上海市中医药学会民间中医药分会增补委员证书颁发</span></p><p style="line-height:150%"><span style="font-size:16px;line-height:150%">09:25-09:30 </span><span style="font-size: 16px;line-height: 150%">上海市中医药学会领导讲话（沈远东）</span></p><p style="line-height:150%"><span style="font-size:16px;line-height:150%">09:30-09:35</span><span style="font-size: 16px;line-height: 150%">上海市卫计委领导讲话（管红叶）</span></p><p style="line-height:150%"><span style="font-size:16px;line-height:150%">&nbsp;</span></p><p style="line-height:150%"><strong><span style="font-size:16px;line-height:150%">09:35-09:50 </span></strong><strong>合影</strong></p><p style="line-height:150%"><strong><span style="font-size:16px;line-height:150%">&nbsp;</span></strong></p><p style="line-height:150%"><strong>Ⅱ</strong><strong> </strong><strong>上午论坛</strong><strong> </strong><strong>（主持人彭文</strong><strong><span style="font-size:16px;line-height:150%">&amp;</span></strong><strong>宋宝明）</strong></p><p style="line-height:150%"><span style="font-size: 16px;line-height:150%">&nbsp;</span></p><p style="line-height:150%"><span style="font-size: 16px;line-height:150%">09:50-10:00 </span><span style="font-size: 16px;line-height: 150%">民间诊疗技术评价工作的重要性及工作思路</span></p><p style="line-height:150%"><strong><span style="font-size:16px;line-height:150%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></strong><strong>严隽陶</strong><strong> </strong><strong><span style="font-size: 16px;line-height: 150%">上海中医药大学 终身教授</span></strong></p><p style="line-height:150%"><span style="font-size:16px;line-height:150%">10: 00-10:20 </span><span style="font-size: 16px;line-height: 150%">挖掘民间中医特色诊疗技术，提升中医药服务能力</span></p><p style="line-height:150%"><strong><span style="font-size: 16px;line-height: 150%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</span></strong><strong><span style="font-size: 16px;line-height: 150%">刘剑锋&nbsp; </span></strong><strong><span style="font-size: 16px;line-height: 150%">中国中医科学院 教授</span></strong></p><p style="line-height:150%"><span style="font-size: 16px;line-height:150%">10:20- 10:40 </span><span style="font-size: 16px;line-height: 150%">整合资源，多方协作，民间中医药“金矿”灿烂</span></p><p style="line-height:150%"><span style="font-size: 16px;line-height:150%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><strong>朱抗美</strong><strong> </strong><strong>上海曙光中医药研究发展基金会</strong><strong> </strong><strong>理事长</strong></p><p style="line-height:150%"><span style="font-size: 16px;line-height:150%">10:40-11:00 </span><span style="font-size: 16px;line-height: 150%">上海市民间中医特色技术评价中心建设工作进展及问题</span></p><p style="text-indent:87px;line-height:150%"><strong>艾静</strong><strong><span style="font-size:16px;line-height:150%">&nbsp; </span></strong><strong>上海市民间中医特色诊疗技术评价中心</strong><strong> </strong><strong>副主任</strong></p><p style="line-height:150%"><span style="font-size:16px;line-height:150%">11:00-11:20 </span><span style="font-size: 16px;line-height: 150%">严氏化脓灸技术临床验证工作体会</span></p><p style="text-indent:87px;line-height:150%"><strong>裴建</strong><strong> </strong><strong>上海中医药大学附属龙华医院针灸科</strong><strong> </strong><strong>主任</strong></p><p style="line-height:150%"><span style="font-size:16px;line-height:150%">11:20-11:40 </span><span style="font-size: 16px;line-height: 150%">粉玫瑰功能医学的民间中医元素</span></p><p style="text-indent:87px;line-height:150%"><strong>潘肖珏</strong><strong><span style="font-size:16px;line-height:150%">&nbsp; </span></strong><strong>“粉玫瑰关爱女性健康行动”公益平台创始人</strong></p><p style="line-height:150%"><strong><span style="font-size:16px;line-height:150%">&nbsp;</span></strong></p><p style="line-height:150%"><strong><span style="font-size:16px;line-height:150%">12:00-13:00&nbsp; </span></strong><strong>午餐</strong></p><p style="line-height:150%"><strong><span style="font-size:16px;line-height:150%">&nbsp;</span></strong></p><p style="line-height:150%"><strong>Ⅲ</strong><strong> </strong><strong>下午论坛（主持人许涛</strong><strong><span style="font-size:16px;line-height:150%">&amp;</span></strong><strong>陈昕琳）</strong></p><p style="line-height:150%"><span style="font-size:16px;line-height:150%">13:00-13:20 </span><span style="font-size: 16px;line-height: 150%">民间“老字号”的挖掘保护经验</span></p><p style="text-indent:87px;line-height:150%"><strong>杨会</strong><strong> </strong><strong>上海国医馆鸣鹤分馆</strong></p><p style="line-height:150%"><span style="font-size:16px;line-height:150%">13:20-13:40 </span><span style="font-size: 16px;line-height: 150%">古本易筋经功法演示</span></p><p style="text-indent:87px;line-height:150%"><strong>严蔚冰</strong><strong> &nbsp;</strong><strong>上海传承导引医学研究所</strong><strong> </strong><strong>所长</strong></p><p style="line-height:150%"><span style="font-size:16px;line-height:150%">13:40-14:00 </span><span style="font-size: 16px;line-height: 150%">悬灸养生技术</span></p><p style="text-indent:87px;line-height:150%"><strong>曹银燕</strong><strong> </strong><strong>上海银燕国际养生悬灸研究所</strong></p><p style="line-height:150%"><span style="font-size:16px;line-height:150%">14:00-14:20 </span><span style="font-size: 16px;line-height: 150%">柔性筋骨调衡术演示</span></p><p style="line-height:150%"><span style="font-size:16px;line-height:150%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><strong>喻兴军</strong><strong> &nbsp;</strong><strong>民间中医人士</strong></p><p style="line-height:150%"><span style="font-size:16px;line-height:150%">14:20-14:40 </span><span style="font-size: 16px;line-height: 150%">声颤法防治房颤技术演示</span></p><p style="text-indent:87px;line-height:150%"><strong>王珠山</strong><strong> &nbsp;</strong><strong>民间中医人士</strong></p><p style="line-height:150%"><span style="font-size:16px;line-height:150%">14:40-15:00 </span><span style="font-size: 16px;line-height: 150%">“民间中医诊疗资源信息平台”建设方案</span></p><p style="text-indent:87px;line-height:150%"><strong>徐燎宇</strong><strong><span style="font-size:16px;line-height:150%">&nbsp; </span></strong><strong>上海市中医文献馆</strong><strong> </strong><strong>副研究员</strong></p><p style="line-height:150%"><span style="font-size:16px;line-height:150%">15:00 -15:30</span> 现场交流</p><p style="line-height:150%"><strong><span style="font-size:16px;line-height:150%">&nbsp;</span></strong></p><p style="line-height:150%"><strong>具体议程以当日为准！</strong></p><p><br/></p>', '上海市中医药学会第四次民间传统诊疗技术与验方整理学术年会暨国家级继续教育项目“民间特色诊疗技术与验方研究与管理”学习班会议即将召开', '活动预告', '', '', 0, 1, 1, '2015-10-12 21:16:00', NULL, 0, NULL, '', 0, '{"thumb":"563d53be15c25.jpg"}', 5, 0, 0, 0),
(33, 2, '', '', '2015-11-07 09:35:42', '<p style="text-align:center;background:white"><img src="http://www.shtszl.org/data/upload/ueditor/20151107/563d551a8462a.png" title="LOGO_副本.png" alt="LOGO_副本.png"/></p><p style="text-align:center;background:white"><strong><span style="box-sizing: border-box !important;word-wrap: break-word !important;max-width: 100%"><span style="text-decoration:underline;"><span style="font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;;color:#3E3E3E">www.shtszl.org</span></span></span></strong></p><p style="text-align:center;background:white"></p><p style="text-align: center;"><section style="font-family: 微软雅黑;white-space: normal"><section style="box-sizing: border-box;border-top: 0px;border-right: 0px;border-bottom: 0px;padding-bottom: 0px;padding-top: 0px;padding-left: 0px;border-left: 0px;padding-right: 0px" data-id="3238"><section style="border-left-width: 0px;box-sizing: border-box;border-right-width: 0px;border-top-color: rgb(255,129,36);border-bottom-width: 0px;border-left-color: rgb(255,129,36);padding-bottom: 0px;border-bottom-color: rgb(255,129,36);padding-top: 0px;padding-left: 0px;margin: 2em auto 1em;border-right-color: rgb(255,129,36);padding-right: 0px;border-top-width: 0px"><section style="box-sizing: border-box;color: ;padding-bottom: 0px;padding-top: 0px;padding-left: 0px;line-height: 1.4;padding-right: 0px;margin-right: 10px"><section style="box-sizing: border-box; border: 28px solid rgb(255, 129, 36); color: rgb(255, 129, 36); padding: 0px; margin-top: 1em; line-height: 1.4; border-image-slice: 28; text-align: center;"><strong>上海市民间中医特色诊疗技术评价中心</strong><p><br/></p><p style="text-align:center;background:white"><strong><span style="font-size: 20px;color: black">章 程</span></strong> </p><p style="margin-top:15px;margin-right:0;margin-bottom:6px;margin-left:0;text-align:center;text-indent:32px;line-height:28px;background:white"></p></section></section></section></section></section><strong>第一章 总则</strong></p><p><br/></p><p style="margin-top:15px;margin-right:0;margin-bottom:6px;margin-left: 0;text-indent:32px;line-height:28px;background:white">第一条<span style=";color:#595959"> 根据《国务院关于扶持和促进中医药事业发展的若干意见》、《上海市人民政府关于进一步加快上海中医药事业发展的意见》宗旨与任务，为加强民间医药挖掘整理工作，在上海市卫生局、上海市中医药发展办公室领导下设立上海市民间中医特色技术评价中心（以下简称“评价中心”）。</span></p><p style="margin-top:15px;margin-right:0;margin-bottom:6px;margin-left: 0;text-indent:32px;line-height:28px;background:white">第二条<span style=";color:#595959"> 评价中心是根据上海市中医药发展规划的安排成立的民间医药领域的咨询机构、评价机构和研究机构。</span></p><p style="margin-top:15px;margin-right:0;margin-bottom:6px;margin-left:0;text-align:center;text-indent:32px;line-height:28px;background:white"><strong><span style="color: rgb(62, 62, 62)">第二章 组织机构</span></strong></p><p style="margin-top:15px;margin-right:0;margin-bottom:6px;margin-left: 0;text-indent:32px;line-height:28px;background:white">第三条<span style=";color:#595959"> 评价中心组织原则是以政府为主导，多方参与，科研先行，构建网络，延伸触角，注重实效，持续发展。</span></p><p style="margin-top:15px;margin-right:0;margin-bottom:6px;margin-left: 0;text-indent:32px;line-height:28px;background:white">第四条<span style=";color:#595959"> 评价中心由上海市中医药发展办公室直接领导，由上海中医药大学附属曙光医院具体管理，组织架构上实行市级中心和分中心两级管理，采用市、区县、社区的三级网络覆盖机制。中心主任由上海中医药大学附属曙光医院领导或知名专家学者担任，并切实承担中心业务的指导工作；中心研究人员应专兼职结合，根据学科优势、任务需要、课题导向，由上海中医药大学附属曙光医院确定具体人选。</span></p><p style="margin-top:15px;margin-right:0;margin-bottom:6px;margin-left: 0;text-indent:32px;line-height:28px;background:white">第五条<span style=";color:#595959"> 上海中医药大学附属曙光医院根据评价中心工作的实际需求，提供办公场所、办公经费、人员编制等保障，并参照上海市中医医疗质量控制中心进行管理。对中心承担的重大研究课题，由医院集中力量组织攻关，确保课题研究质量以及中心职责的履行。</span></p><p style="margin-top:15px;margin-right:0;margin-bottom:6px;margin-left: 0;text-indent:32px;line-height:28px;background:white"><span style=";color:#3E3E3E">第六条</span><span style=";color:#595959"> 评价中心实行专家指导委员会指导下的中心主任负责制。专家指导委员会为中心的指导机构，由上海市中医药发展办公室负责同志、上海中医药大学负责同志、评价中心负责同志、上海曙光中医药研究发展基金会负责同志、专家学者代表和特邀代表组成。</span></p><p style="margin-top:15px;margin-right:0;margin-bottom:6px;margin-left: 0;text-indent:32px;line-height:28px;background:white">第七条<span style=";color:#595959"> 专家指导委员会的职责是：制订和修改学术委员会章程；审议评价中心的中长期发展规划及职能方向；审议评价中心的重大活动、年度考核工作。</span></p><p style="margin-top:15px;margin-right:0;margin-bottom:6px;margin-left: 0;text-indent:32px;line-height:28px;background:white">第八条<span style=";color:#595959"> 评价中心设立主任一名，副主任兼办公室主任一名，办公室副主任一名，中心主任负责评价中心的规划建设，主持市中医药发展办公室交办的工作，以及与政府和社会组织的对接以及资金的筹集与使用，副主任兼办公室主任协助主任工作，并负责研究中心管理的具体事宜，办公室副主任协助办公室主任工作，处理日常事务。</span></p><p style="margin-top:15px;margin-right:0;margin-bottom:6px;margin-left: 0;text-indent:32px;line-height:28px;background:white">第九条<span style=";color:#595959"> 专家指导委员会全体会议每年召开两次，专家指导委员会主任委员可以提议临时召开专家指导委员会全体会议。</span></p><p style="margin-top:15px;margin-right:0;margin-bottom:6px;margin-left:0;text-align:center;text-indent:32px;line-height:28px;background:white"><strong><span style="color: rgb(62, 62, 62)">第三章 职责与权利</span></strong></p><p style="margin-top:15px;margin-right:0;margin-bottom:6px;margin-left: 0;text-indent:32px;line-height:28px;background:white">第十条<span style=";color:#595959"> 评价中心的主要职责是：</span></p><p style="margin-top:15px;text-indent:32px;line-height:28px;background: white"><span style=";color:#595959">（一）建立覆盖全市各区县的民间医药挖掘整理工作网络。</span></p><p style="margin-top:15px;text-indent:32px;line-height:28px;background: white"><span style=";color:#595959">（二）根据中心的职责和上海市中医药年度重点工作，拟定上海市民间中医药工作的计划和方案，开展民间中医药的政策研究，为上海市中医药工作的改革和发展提供科学决策依据。</span></p><p style="margin-top:15px;text-indent:32px;line-height:28px;background: white"><span style=";color:#595959">（三）开展民间特色诊疗技术的考察和征集，对征集的民间特色诊疗技术进行系统评价。</span></p><p style="margin-top:15px;text-indent:32px;line-height:28px;background: white"><span style=";color:#595959">（四）开展对安全并确有疗效的民间中医药诊疗技术的交流展示推广活动，探索民间医药挖掘整理的现代道路。</span></p><p style="margin-top:15px;text-indent:32px;line-height:28px;background: white"><span style=";color:#595959">（五）开展民间医药的管理研究，对社会来源的适宜技术进行评价鉴定。</span></p><p style="margin-top:15px;text-indent:32px;line-height:28px;background: white"><span style=";color:#595959">（六）开展民间医药文化的研究，大力传播中医药文化。开展覆盖全上海的调研，对全国有特色、有影响的区域开展有针对性的考察、调研活动。</span></p><p style="margin-top:15px;text-indent:32px;line-height:28px;background: white"><span style=";color:#595959">（七）加强与国家和外省市相关机构的交流与合作，借鉴有益经验；开展自然医学、民间传统医学的国际交流活动。</span></p><p style="margin-top:15px;text-indent:32px;line-height:28px;background: white"><span style=";color:#595959">（八）培养高素质的民间中医药特色技术筛选和评价人才，满足民间医药技术传承创新的要求。</span></p><p style="margin-top:15px;text-indent:32px;line-height:28px;background: white"><span style=";color:#595959">（九）承担上海市中医药发展办公室交办的其他任务。</span></p><p style="margin-top:15px;text-align:center;line-height:28px;background:white"><strong><span style="color: rgb(62, 62, 62)">第四章 经费管理</span></strong></p><p style="margin-top:15px;margin-right:0;margin-bottom:6px;margin-left: 0;text-indent:32px;line-height:28px;background:white"><span style=";color:#3E3E3E">第十一条</span><span style=";color:#595959"> 评价中心经费来源包括：</span></p><p style="margin-top:15px;text-indent:32px;line-height:28px;background: white"><span style=";color:#595959">（一）上海市卫生与计划生育委员会、上海市中医药发展办公室划拨的经费；</span></p><p style="margin-top:15px;text-indent:32px;line-height:28px;background: white"><span style=";color:#595959">（二）上海中医药大学附属曙光医院配套经费；</span></p><p style="margin-top:15px;text-indent:32px;line-height:28px;background: white"><span style=";color:#595959">（三）中心申请的各类课题、研究项目及咨询培训费用；</span></p><p style="margin-top:15px;text-indent:32px;line-height:28px;background: white"><span style=";color:#595959">（四）社会捐赠、资助；</span></p><p style="margin-top:15px;text-indent:32px;line-height:28px;background: white"><span style=";color:#595959">（五）其他合法收入。</span></p><p style="margin-top:15px;margin-right:0;margin-bottom:6px;margin-left: 0;text-indent:32px;line-height:28px;background:white"><span style=";color:#3E3E3E">第十二条</span><span style=";color:#595959"> 评价中心经费主要用于开展调查研究、挖掘与评价、开展学术交流与合作、建立与维护信息数据库、编印内部交流刊物、举办学术会议以及中心的运转等。</span></p><p style="margin-top:15px;margin-right:0;margin-bottom:6px;margin-left: 0;text-indent:32px;line-height:28px;background:white"><span style=";color:#3E3E3E">第十三条</span><span style=";color:#595959"> 评价中心应按照国家规定的财务管理制度和经费使用渠道严格经费管理，执行上海中医药大学附属曙光医院财务规章制度，努力提高经费使用效益。经费的使用和管理接受专家指导委员会会、财务审计部门以及捐助单位的监督。</span></p><p style="margin-top:15px;text-align:center;line-height:28px;background:white"><strong><span style="color: rgb(62, 62, 62)">第五章 人员考核</span></strong></p><p style="margin-top:15px;line-height:28px;background:white"><span style=";color:#3E3E3E">第十四条</span><span style=";color:#595959"> 对“中心”专职人员及评审专家的工作职责和考核规定，按</span><span style="font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;;color:#595959">“</span><span style=";color:#595959">上海市民间中医特色技术评价中心工作人员管理办法</span><span style="font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;;color:#595959">”</span><span style=";color:#595959">中的相关规定执行。</span></p><p style="margin-top:15px;line-height:28px;background:white">第十五条<span style=";color:#595959"> “中心”每年定期或不定期地组织对办公室工作人员以及已参加评价工作的专家的工作质量进行评审，对工作质量不符合要求，合作和沟通能力差的人员及时进行更换。</span></p><p style="margin-top:15px;text-align:center;line-height:28px;background:white"><strong><span style="color: rgb(62, 62, 62)">第六章 档案管理</span></strong></p><p style="margin-top:15px;line-height:28px;background:white"><span style=";color:#3E3E3E">第十六条</span><span style=";color:#595959"> “中心”应建立健全以下主要档案内容：</span></p><p style="margin-top:15px;line-height:28px;background:white"><span style="font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;;color:#595959">（一）</span><span style=";color:#595959">建立健全“中心”成立审批文件、管理制度、记录表格、相关国家法规、制度、标准和规范目录清单，以及文件文本和电子文档档案；</span></p><p style="margin-top:15px;line-height:28px;background:white"><span style="font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;;color:#595959">（二）</span><span style=";color:#595959">建立“中心”组织机构人员、专家库专家个人技术信息档案；</span></p><p style="margin-top:15px;line-height:28px;background:white"><span style="font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;;color:#595959">（三）</span><span style=";color:#595959">建立工作计划、总结、考察报告、评审报告档案。</span></p><p style="margin-top:15px;line-height:28px;background:white"><span style="font-family:&#39;微软雅黑&#39;,&#39;sans-serif&#39;;color:#595959">（四）</span><span style=";color:#595959">建立“中心”民间特色技术纸质、电子及实物档案，并建立相关数据库。</span></p><p style="margin-top:15px;margin-right:0;margin-bottom:6px;margin-left:0;text-align:center;line-height:28px;background:white"><strong><span style="color: rgb(62, 62, 62)">第七章 章程的修改与生效</span></strong></p><p style="margin-top:15px;line-height:28px;background:white">第十七条<span style=";color:#595959"> 本章程的修改，须经专家指导委员会会议通过后</span><span style="font-family:&#39;仿宋_GB2312&#39;,&#39;serif&#39;;color:#595959">15</span><span style=";color:#595959">日内，报上海市中医药发展办公室审查同意。</span></p><p style="margin-top:15px;line-height:28px;background:white">第十八条<span style=";color:#595959"> 本章程自上海市中医药发展办公室核准之日起生效。</span></p><p>&nbsp;</p><p><br/></p>', '上海市民间中医特色诊疗技术评价中心章程', '根据《国务院关于扶持和促进中医药事业发展的若干意见》、《上海市人民政府关于进一步加快上海中医药事业发展的意见》宗旨与任务，为加强民间医药挖掘整理工作，在上海市卫生局、上海市中医药发展办公室领导下设立上海市民间中医特色技术评价中心（以下简称“评价中心”）。', '', '', 0, 1, 1, '2015-11-07 09:29:40', NULL, 0, NULL, '', 0, '{"thumb":"563d55583be7f.png"}', 2, 0, 0, 0),
(34, 2, '', '', '2015-11-07 10:48:58', '<p style="text-indent: 2em; text-align: left;">10月23日，上海市中医药学会第四次民间传统诊疗技术与验方整理学术年会暨国家级继续教育项目“民间特色诊疗技术与验方研究与管理”培训班在上海中医药大学附属曙光医院东院隆重召开。此次会议由上海市中医药学会民间传统诊疗技术与验方整理研究分会、上海市民间中医特色诊疗技术评价中心、上海曙光中医药研究发展基金会联合主办，由上海中医药大学附属曙光医院、上海市中医药研究院特色诊疗技术研究所承办。国际标准化组织中医药标准化技术委员会秘书长、上海市中医药学会副会长沈远东，上海市中医药学会谈美蓉秘书、上海市卫计委、上海市中医药发展办公室中医药服务监督处副处长管红叶，上海曙光中医药研究发展基金会理事长朱抗美、上海中医药大学附属曙光医院院长周华等出席了会议，还特别邀请到中国中医科学院刘剑锋教授以及上海中医药大学终身教授严隽陶参会。</p><p style="text-align:center"><img src="http://www.shtszl.org/data/upload/ueditor/20151107/563d64df8fd45.jpg" title="image001.jpg" alt="image001.jpg"/></p><p style="text-align: center; text-indent: 2em;">合影留念</p><p><br style="text-indent: 2em; text-align: left;"/></p><p></p><p style="text-indent: 2em; text-align: left;">开幕式由上海市中医医院党委书记、上海市中医药学会民间中医药分会副主委陆嘉惠主持，曙光医院周华院长致欢迎辞，上海市中医药学会民间中医药分会主委余小萍对分会2015年的相关工作进行了回顾，上海曙光中医药研究发展基金会秘书长、上海市民间中医特色诊疗技术评价中心办公室副主任关鑫介绍了“中心”网站以及微信公众平台的建设情况，沈远东副会长就近几年上海市中医药在学术领域取得的成就发表了重要讲话，指出民间中医药研究对中医药事业发展的重要作用。上海市中医药发展办公室中医药服务监督处管红叶副处长介绍了上海市卫计委、上海市中医药发展办公室批准成立上海市民间中医特色诊疗技术评价中心的目的、意义、愿景等。</p><p style="text-indent: 2em; text-align: left;">开幕式上还宣布了上海市民间中医特色诊疗技术评价中心第一批征集基地，分别为上海市嘉定区中医医院、上海市松江方塔中医医院、上海市浦东新区光明中医医院、上海传承导引医学研究所、上海粉玫瑰功能医学研究中心、上海广德中医门诊部、慈溪高保滋堂中医门诊部、湖州德泰恒大药房连锁有限公司共八个，</p><p style="text-indent: 2em; text-align: left;">分别进行了现场授牌，征集基地的主要任务是协助“中心”，深入民间，征集中医特色诊疗技术及验方。会上，还宣读了上海市中医药学会民间中医药分会2015年新增补的20名委员名单并颁发证书，其中包括3名民间人士。目前，上海市中医药学会民间中医药分会共计委员77名，包括名誉主委2名、主委1名、副主委8名、秘书2名。</p><p style="text-indent: 2em; text-align: left;">此次大会共邀请到12位来自不同地区、不同领域、不同层次的专家作大会报告，分别由上海市中医药学会民间中医药分会副主委彭文、许涛、宋宝明等主持。上海市康复医学会副会长、上海中医药大学终身教授严隽陶作了一场关于民间特色诊疗技术评价工作重要性及工作思路的简短而精彩的演讲。中国中医科学院刘剑锋教授在会上与大家一起探讨了关于如何挖掘民间中医特色诊疗技术、提升中医药服务能力的问题。上海曙光中医药研究发展基金会朱抗美理事长介绍了基金会在民间中医药方面的相关工作，认为民间中医药“金矿”灿烂，应整合资源，多方协作，共同挖掘。上海市民间中医特色诊疗技术评价中心副主任艾静报告了“中心”建设工作进展、面临的相关问题以及下一步工作计划。上海中医药大学附属龙华医院针灸科主任裴建作为第一批民间特色技术临床验证研究者代表，分享了民间严氏化脓灸技术临床验证工作体会。上海市中医文献馆徐燎宇副研究员就“民间中医诊疗资源信息平台”建设方案进行了探讨。</p><p style="text-indent: 2em; text-align: left;">另有上海传承导引医学研究所严蔚冰所长为大家展示了古本易筋经功法，“粉玫瑰关爱女性健康行动”公益平台创始人潘肖珏女士向大家介绍了“粉玫瑰”民间中医元素，上海国医馆鸣鹤分馆杨会馆长重点阐述了民间“老字号”的挖掘保护经验，上海银燕国际养生悬灸研究所曹银燕女士介绍了其独特的悬灸养生技术。民间中医人士喻兴军先生现场讲解了其自创的柔性筋骨调衡术、王珠山先生进行了声颤法防治房颤的技术演示。大会最后还进行了互动交流，气氛热烈。</p><p style="text-align: left; text-indent: 2em;"><br style="text-indent: 2em; text-align: left;"/></p><p style="text-align:center"><img src="http://www.shtszl.org/data/upload/ueditor/20151107/563d653aaa884.jpg" title="image002.jpg" alt="image002.jpg"/></p><p style="text-align: center; text-indent: 2em;">上海市中医医院党委书记陆嘉惠主持开幕式</p><p><br style="text-indent: 2em; text-align: left;"/></p><p style="text-align:center"><img src="http://www.shtszl.org/data/upload/ueditor/20151107/563d6556c90cc.jpg" title="image003.jpg" alt="image003.jpg"/></p><p style="text-align: center; text-indent: 2em;">上海中医药大学附属曙光医院周华院长致欢迎辞</p><p><br style="text-indent: 2em; text-align: left;"/></p><p style="text-align:center"><img src="http://www.shtszl.org/data/upload/ueditor/20151107/563d657b4b2a3.jpg" title="image004.jpg" alt="image004.jpg"/></p><p style="text-align: center; text-indent: 2em;">上海市中医药研究院特色诊疗技术研究所所长、上海市民间中医特色诊疗技术评价中心主任、上海市中医药学会民间中医药分会主委余小萍讲话</p><p><br style="text-indent: 2em; text-align: left;"/></p><p style="text-align:center"><img src="http://www.shtszl.org/data/upload/ueditor/20151107/563d65ab8c03c.jpg" title="image005.jpg" alt="image005.jpg"/></p><p style="text-align: center; text-indent: 2em;">国际标准化组织中医药标准化技术委员会秘书长、上海市中医药学会副会长沈远东讲话</p><p><br style="text-indent: 2em; text-align: left;"/></p><p style="text-align:center"><img src="http://www.shtszl.org/data/upload/ueditor/20151107/563d65bf38176.jpg" title="image006.jpg"/></p><p style="text-align: center; text-indent: 2em;">上海市卫计委、上海市中医药发展办公室中医药服务监督处副处长管红叶讲话</p><p><br style="text-indent: 2em; text-align: left;"/></p><p style="text-align:center"><img src="http://www.shtszl.org/data/upload/ueditor/20151107/563d65bf28d52.jpg" title="image007.jpg"/></p><p style="text-align: center; text-indent: 2em;">上海市民间中医特色诊疗技术评价中心首批征集基地授牌</p><p><br style="text-indent: 2em; text-align: left;"/></p><p style="text-align:center"><img src="http://www.shtszl.org/data/upload/ueditor/20151107/563d65bf30764.jpg" title="image008.jpg" style="white-space: normal;"/></p><p style="text-align: center; text-indent: 2em;">上海市中医药学会民间中医药分会2015年新增委员证书颁发</p>', '上海市中医药学会第四次民间传统诊疗技术与验方整理学术年会暨国家级继续教育项目“民间特色诊疗技术与验方研究与管理”培训班顺利召开', '10月23日，上海市中医药学会第四次民间传统诊疗技术与验方整理学术年会暨国家级继续教育项目“民间特色诊疗技术与验方研究与管理”培训班在上海中医药大学附属曙光医院东院隆重召开。', '', '', 0, 1, 1, '2015-10-26 10:41:00', NULL, 0, NULL, '', 0, '{"thumb":"563d668a0a50a.jpg"}', 2, 0, 0, 0),
(35, 2, '', '', '2015-11-07 14:01:52', '<p>推拿技法推拿技法推拿技法</p>', '朱老', '推拿技法', '周一', '周五', 2, 1, 1, '2015-11-07 14:01:04', NULL, 0, NULL, '', 0, '{"thumb":""}', 1, 0, 0, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_role`
--

INSERT INTO `sp_role` (`id`, `name`, `pid`, `status`, `remark`, `create_time`, `update_time`, `listorder`) VALUES
(1, '超级管理员', 0, 1, '拥有网站最高管理员权限！', 1329633709, 1329633709, 0),
(2, '网站管理人员', NULL, 1, '', 1445517546, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `sp_role_user`
--

CREATE TABLE IF NOT EXISTS `sp_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_role_user`
--

INSERT INTO `sp_role_user` (`role_id`, `user_id`) VALUES
(2, '2');

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
-- 表的结构 `sp_skill`
--

CREATE TABLE IF NOT EXISTS `sp_skill` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `add_time` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='技术类型';

--
-- 转存表中的数据 `sp_skill`
--

INSERT INTO `sp_skill` (`id`, `name`, `add_time`) VALUES
(2, '诊疗技术', '2015-11-07 13:50:37'),
(3, '中医验方', '2015-11-07 13:50:56');

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
-- 表的结构 `sp_tag`
--

CREATE TABLE IF NOT EXISTS `sp_tag` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `add_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='标签';

--
-- 转存表中的数据 `sp_tag`
--

INSERT INTO `sp_tag` (`id`, `name`, `add_time`) VALUES
(2, '推拿', '2015-10-22 14:35:17'),
(3, '针刺', '2015-10-22 14:40:06'),
(4, '灸', '2015-11-07 13:59:08');

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
  `img` varchar(100) NOT NULL,
  `tag` smallint(6) NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_terms`
--

INSERT INTO `sp_terms` (`term_id`, `name`, `slug`, `taxonomy`, `description`, `img`, `tag`, `parent`, `count`, `path`, `seo_title`, `seo_keywords`, `seo_description`, `list_tpl`, `one_tpl`, `listorder`, `status`) VALUES
(1, '资讯中心', '', 'article', '', '', 0, 0, 0, '0-1', '', '', '', 'list', 'article', 0, 1),
(2, '民间技法', '', 'article', '', '', 0, 0, 0, '0-2', '', '', '', 'list', 'article', 0, 1),
(3, '活动预告', '', 'article', '', '', 0, 1, 0, '0-1-3', '', '', '', 'list_new', 'show_new', 0, 1),
(4, '新闻动态', '', 'article', '', '', 0, 1, 0, '0-1-4', '', '', '', 'list_new', 'search', 0, 1),
(5, '通知公告', '', 'article', '', '', 0, 1, 0, '0-1-5', '', '', '', 'list_new', 'show_new', 0, 1),
(7, '传承人', '', 'article', '', '', 0, 39, 0, '0-2-39-7', '', '', '', 'list_folk', 'show_folk', 0, 1),
(8, '活动预告', '', 'article', '', '', 0, 39, 0, '0-2-39-8', '', '', '', 'list_new', 'show_new', 0, 1),
(9, '媒体报道', '', 'article', '', '', 0, 39, 0, '0-2-39-9', '', '', '', 'list_media', 'show_media', 0, 1),
(10, '风采展示', '', 'article', '', '', 0, 39, 0, '0-2-39-10', '', '', '', 'list_style', 'show_style', 0, 1),
(11, '视频库', '', 'article', '', '', 0, 39, 0, '0-2-39-11', '', '', '', 'list_media', 'show_media', 0, 1),
(12, '史料', '', 'article', '', '', 0, 39, 0, '0-2-39-12', '', '', '', 'list_style', 'show_folk', 0, 1),
(13, '器具', '', 'article', '', '', 0, 39, 0, '0-2-39-13', '', '', '', 'list_style', 'show_style', 0, 1),
(14, '研究所', '', 'article', '', '', 0, 0, 0, '0-14', '', '', '', 'list', 'article', 0, 1),
(15, '最新报告', '', 'article', '', '', 0, 14, 0, '0-14-15', '', '', '', 'list_new', 'show_new', 0, 1),
(16, '治未病研究室', '', 'article', '', '', 0, 14, 0, '0-14-16', '', '', '', 'list_new', 'show_new', 0, 1),
(17, '针刺麻醉研究室', '', 'article', '', '', 0, 14, 0, '0-14-17', '', '', '', 'list_new', 'show_new', 0, 1),
(18, '名老中医经验研究室', '', 'article', '', '', 0, 14, 0, '0-14-18', '', '', '', 'list_new', 'show_new', 0, 1),
(19, '民间技术与验方研究室', '', 'article', '', '', 0, 14, 0, '0-14-19', '', '', '', 'list_new', 'show_new', 0, 1),
(20, '海派膏方研究室', '', 'article', '', '', 0, 14, 0, '0-14-20', '', '', '', 'list_new', 'show_new', 0, 1),
(21, '历史沿岸', '', 'article', '', '', 0, 39, 0, '0-2-39-21', '', '', '', 'list_folk', 'show_folk', 0, 1),
(23, '工作动态', '', 'article', '', '', 0, 16, 0, '0-14-16-23', '', '', '', 'list_new', 'show_new', 0, 1),
(24, '专家介绍', '', 'article', '', '', 0, 16, 0, '0-14-16-24', '', '', '', 'list_new', 'show_new', 0, 1),
(25, '成功荣誉', '', 'article', '', '', 0, 16, 0, '0-14-16-25', '', '', '', 'list_new', 'show_new', 0, 1),
(26, '工作动态', '', 'article', '', '', 0, 17, 0, '0-14-17-26', '', '', '', 'list_new', 'show_new', 0, 1),
(27, '专家介绍', '', 'article', '', '', 0, 17, 0, '0-14-17-27', '', '', '', 'list_new', 'show_new', 0, 1),
(28, '成果荣誉', '', 'article', '', '', 0, 17, 0, '0-14-17-28', '', '', '', 'list_new', 'show_new', 0, 1),
(29, '工作动态', '', 'article', '', '', 0, 18, 0, '0-14-18-29', '', '', '', 'list_new', 'show_new', 0, 1),
(30, '专家介绍', '', 'article', '', '', 0, 18, 0, '0-14-18-30', '', '', '', 'list_new', 'show_new', 0, 1),
(31, '成功荣誉', '', 'article', '', '', 0, 18, 0, '0-14-18-31', '', '', '', 'list_new', 'show_new', 0, 1),
(32, '工作动态', '', 'article', '', '', 0, 19, 0, '0-14-19-32', '', '', '', 'list_new', 'show_new', 0, 1),
(33, '专家介绍', '', 'article', '', '', 0, 19, 0, '0-14-19-33', '', '', '', 'list_new', 'show_new', 0, 1),
(34, '成果荣誉', '', 'article', '', '', 0, 19, 0, '0-14-19-34', '', '', '', 'list_new', 'show_new', 0, 1),
(35, '工作动态', '', 'article', '', '', 0, 20, 0, '0-14-20-35', '', '', '', 'list_new', 'show_new', 0, 1),
(36, '专家介绍', '', 'article', '', '', 0, 20, 0, '0-14-20-36', '', '', '', 'list_new', 'show_new', 0, 1),
(37, '成果荣誉', '', 'article', '', '', 0, 20, 0, '0-14-20-37', '', '', '', 'list_new', 'show_new', 0, 1),
(38, '下载中心', '', 'article', '', '', 0, 0, 0, '0-38', '', '', '', 'list_new', 'show_new', 0, 1),
(39, '双版刮痧技艺', '', 'article', '痔疮症状不太重，痔疮症状不太重痔疮症状不太重痔疮症状不太重，痔疮症状不太重，痔疮症状不太重痔疮症状不太重痔疮症状不太重状不太重痔疮症状不太重痔疮症状不太重', '/zhongyi/data/upload/562c6ae263958.jpg', 0, 2, 0, '0-2-39', '', '', '', 'list_folk', 'show_folk', 0, 1),
(42, '项目特色', '', 'article', '', '', 0, 39, 0, '0-2-39-42', '', '', '', 'list_folk', 'show_folk', 0, 1),
(46, '好技术', '', 'article', '', '', 0, 2, 0, '0-2-46', '', '', '', 'list', 'article', 0, 1),
(47, '传承人', '', 'article', '', '', 0, 46, 0, NULL, '', '', '', 'list_folk', 'show_folk', 0, 1),
(48, '活动预告', '', 'article', '', '', 0, 46, 0, NULL, '', '', '', 'list_new', 'show_new', 0, 1),
(49, '媒体报道', '', 'article', '', '', 0, 46, 0, NULL, '', '', '', 'list_media', 'show_media', 0, 1),
(50, '风采展示', '', 'article', '', '', 0, 46, 0, NULL, '', '', '', 'list_style', 'show_style', 0, 1),
(51, '视频库', '', 'article', '', '', 0, 46, 0, NULL, '', '', '', 'list_media', 'show_media', 0, 1),
(52, '史料', '', 'article', '', '', 0, 46, 0, '0-2-46-52', '', '', '', 'list_style', 'show_folk', 0, 1),
(53, '器具', '', 'article', '', '', 0, 46, 0, NULL, '', '', '', 'list_style', 'show_style', 0, 1),
(54, '历史沿岸', '', 'article', '', '', 0, 46, 0, NULL, '', '', '', 'list_folk', 'show_folk', 0, 1),
(55, '项目特色', '', 'article', '', '', 0, 46, 0, NULL, '', '', '', 'list_folk', 'show_folk', 0, 1),
(56, '好中医上海医院', '', 'article', '好中医上海医院测试的信息啊啊好中医上海医院测试的信息啊啊好中医上海医院测试的信息啊啊好中医上海医院测试的信息啊啊', '/zhongyi/data/upload/562ca8020075f.jpg', 3, 2, 0, '0-2-56', '', '', '', 'list', 'article', 0, 1),
(57, '传承人', '', 'article', '', '', 0, 56, 0, NULL, '', '', '', 'list_folk', 'show_folk', 0, 1),
(58, '活动预告', '', 'article', '', '', 0, 56, 0, NULL, '', '', '', 'list_new', 'show_new', 0, 1),
(59, '媒体报道', '', 'article', '', '', 0, 56, 0, NULL, '', '', '', 'list_media', 'show_media', 0, 1),
(60, '风采展示', '', 'article', '', '', 0, 56, 0, NULL, '', '', '', 'list_style', 'show_style', 0, 1),
(61, '视频库', '', 'article', '', '', 0, 56, 0, NULL, '', '', '', 'list_media', 'show_media', 0, 1),
(62, '史料', '', 'article', '', '', 0, 56, 0, NULL, '', '', '', 'list_style', 'show_folk', 0, 1),
(63, '器具', '', 'article', '', '', 0, 56, 0, NULL, '', '', '', 'list_style', 'show_style', 0, 1),
(64, '历史沿岸', '', 'article', '', '', 0, 56, 0, NULL, '', '', '', 'list_folk', 'show_folk', 0, 1),
(65, '项目特色', '', 'article', '', '', 0, 56, 0, NULL, '', '', '', 'list_folk', 'show_folk', 0, 1),
(66, '朱氏一指禅', '', 'article', '', '', 2, 2, 0, '0-2-66', '', '', '', 'list', 'article', 0, 1),
(67, '传承人', '', 'article', '', '', 0, 66, 0, NULL, '', '', '', 'list_folk', 'show_folk', 0, 1),
(68, '活动预告', '', 'article', '', '', 0, 66, 0, NULL, '', '', '', 'list_new', 'show_new', 0, 1),
(69, '媒体报道', '', 'article', '', '', 0, 66, 0, NULL, '', '', '', 'list_media', 'show_media', 0, 1),
(70, '风采展示', '', 'article', '', '', 0, 66, 0, NULL, '', '', '', 'list_style', 'show_style', 0, 1),
(71, '视频库', '', 'article', '', '', 0, 66, 0, NULL, '', '', '', 'list_media', 'show_media', 0, 1),
(72, '史料', '', 'article', '', '', 0, 66, 0, NULL, '', '', '', 'list_style', 'show_folk', 0, 1),
(73, '器具', '', 'article', '', '', 0, 66, 0, NULL, '', '', '', 'list_style', 'show_style', 0, 1),
(74, '历史沿岸', '', 'article', '', '', 0, 66, 0, NULL, '', '', '', 'list_folk', 'show_folk', 0, 1),
(75, '项目特色', '', 'article', '', '', 0, 66, 0, NULL, '', '', '', 'list_folk', 'show_folk', 0, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_term_relationships`
--

INSERT INTO `sp_term_relationships` (`tid`, `object_id`, `term_id`, `listorder`, `status`) VALUES
(28, 35, 67, 0, 1),
(2, 4, 6, 0, 0),
(3, 5, 7, 0, 0),
(4, 6, 8, 0, 0),
(5, 7, 9, 0, 0),
(6, 8, 9, 0, 0),
(7, 9, 10, 0, 0),
(8, 10, 11, 0, 0),
(9, 11, 5, 0, 0),
(10, 12, 5, 0, 0),
(27, 34, 4, 0, 1),
(12, 14, 4, 0, 0),
(13, 15, 7, 0, 0),
(14, 19, 4, 0, 0),
(26, 33, 5, 0, 1),
(16, 21, 5, 0, 0),
(17, 25, 41, 0, 0),
(19, 26, 47, 0, 0),
(20, 27, 42, 0, 0),
(21, 28, 21, 0, 0),
(22, 29, 12, 0, 0),
(23, 30, 13, 0, 0),
(24, 31, 23, 0, 0),
(25, 32, 3, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `sp_tuijian`
--

CREATE TABLE IF NOT EXISTS `sp_tuijian` (
  `id` int(11) NOT NULL,
  `man` varchar(50) NOT NULL COMMENT '推荐人',
  `isman` varchar(50) NOT NULL COMMENT '被推荐人',
  `content` varchar(200) NOT NULL COMMENT '推荐理由',
  `name` varchar(50) NOT NULL COMMENT '联系人',
  `phone` bigint(11) NOT NULL COMMENT '电话',
  `add_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='推荐';

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sp_users`
--

INSERT INTO `sp_users` (`id`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `avatar`, `sex`, `birthday`, `signature`, `last_login_ip`, `last_login_time`, `create_time`, `user_activation_key`, `user_status`, `score`, `user_type`) VALUES
(1, 'gang', 'c535018ee946baa408736e9a56dc887e48a095e6858289af', 'admin', 'a526584713@qq.com', '', NULL, 0, NULL, NULL, '116.216.0.26', '2015-10-30 19:05:46', '2015-10-17 06:00:49', '', 1, 0, 1),
(2, 'admin', 'c535018ee94646e74eb740f35a72cbe162e087cc7a4989af', '', '526584713@qq.com', '', NULL, 0, NULL, NULL, '211.144.200.210', '2015-11-07 13:27:29', '2000-01-01 00:00:00', '', 1, 0, 1);

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

-- --------------------------------------------------------

--
-- 表的结构 `sp_xianji`
--

CREATE TABLE IF NOT EXISTS `sp_xianji` (
  `id` mediumint(9) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT '技法名称',
  `address` varchar(100) NOT NULL COMMENT '地点',
  `username` varchar(100) NOT NULL COMMENT '申请人',
  `email` varchar(100) NOT NULL COMMENT '邮箱',
  `man` varchar(50) NOT NULL COMMENT '传承人',
  `phone` bigint(11) NOT NULL COMMENT '联系电话',
  `goods` varchar(50) NOT NULL COMMENT '技术特点',
  `term_info` varchar(100) NOT NULL,
  `add_time` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='我要献计提交';

--
-- 转存表中的数据 `sp_xianji`
--

INSERT INTO `sp_xianji` (`id`, `name`, `address`, `username`, `email`, `man`, `phone`, `goods`, `term_info`, `add_time`) VALUES
(1, '王三', '', '王三', '', '', 18816547854, '的撒的撒的撒', '家电齐全', '2015-10-21 22:21:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sp_ad`
--
ALTER TABLE `sp_ad`
  ADD PRIMARY KEY (`ad_id`), ADD KEY `ad_name` (`ad_name`);

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
-- Indexes for table `sp_skill`
--
ALTER TABLE `sp_skill`
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
-- Indexes for table `sp_tag`
--
ALTER TABLE `sp_tag`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sp_tuijian`
--
ALTER TABLE `sp_tuijian`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sp_xianji`
--
ALTER TABLE `sp_xianji`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sp_ad`
--
ALTER TABLE `sp_ad`
  MODIFY `ad_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '广告id';
--
-- AUTO_INCREMENT for table `sp_asset`
--
ALTER TABLE `sp_asset`
  MODIFY `aid` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sp_auth_rule`
--
ALTER TABLE `sp_auth_rule`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '规则id,自增主键',AUTO_INCREMENT=179;
--
-- AUTO_INCREMENT for table `sp_comments`
--
ALTER TABLE `sp_comments`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sp_common_action_log`
--
ALTER TABLE `sp_common_action_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `sp_guestbook`
--
ALTER TABLE `sp_guestbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sp_links`
--
ALTER TABLE `sp_links`
  MODIFY `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sp_menu`
--
ALTER TABLE `sp_menu`
  MODIFY `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=179;
--
-- AUTO_INCREMENT for table `sp_nav`
--
ALTER TABLE `sp_nav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
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
  MODIFY `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sp_plugins`
--
ALTER TABLE `sp_plugins`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id';
--
-- AUTO_INCREMENT for table `sp_posts`
--
ALTER TABLE `sp_posts`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `sp_role`
--
ALTER TABLE `sp_role`
  MODIFY `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sp_route`
--
ALTER TABLE `sp_route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '路由id';
--
-- AUTO_INCREMENT for table `sp_skill`
--
ALTER TABLE `sp_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
-- AUTO_INCREMENT for table `sp_tag`
--
ALTER TABLE `sp_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sp_terms`
--
ALTER TABLE `sp_terms`
  MODIFY `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `sp_term_relationships`
--
ALTER TABLE `sp_term_relationships`
  MODIFY `tid` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `sp_tuijian`
--
ALTER TABLE `sp_tuijian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sp_users`
--
ALTER TABLE `sp_users`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sp_user_favorites`
--
ALTER TABLE `sp_user_favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sp_xianji`
--
ALTER TABLE `sp_xianji`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
