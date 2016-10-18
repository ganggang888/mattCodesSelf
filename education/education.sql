/*
Navicat MySQL Data Transfer

Source Server         : myself
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : education

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2015-05-09 16:33:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `matt_ad`
-- ----------------------------
DROP TABLE IF EXISTS `matt_ad`;
CREATE TABLE `matt_ad` (
  `ad_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '广告id',
  `ad_name` varchar(255) NOT NULL,
  `ad_content` text,
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1显示，0不显示',
  PRIMARY KEY (`ad_id`),
  KEY `ad_name` (`ad_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_ad
-- ----------------------------

-- ----------------------------
-- Table structure for `matt_asset`
-- ----------------------------
DROP TABLE IF EXISTS `matt_asset`;
CREATE TABLE `matt_asset` (
  `aid` bigint(20) NOT NULL AUTO_INCREMENT,
  `key` varchar(50) NOT NULL,
  `filename` varchar(50) DEFAULT NULL,
  `filesize` int(11) DEFAULT NULL,
  `filepath` varchar(200) NOT NULL,
  `uploadtime` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `meta` text,
  `suffix` varchar(50) DEFAULT NULL,
  `download_times` int(6) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_asset
-- ----------------------------

-- ----------------------------
-- Table structure for `matt_auth_access`
-- ----------------------------
DROP TABLE IF EXISTS `matt_auth_access`;
CREATE TABLE `matt_auth_access` (
  `role_id` mediumint(8) unsigned NOT NULL COMMENT '角色',
  `rule_name` varchar(255) NOT NULL COMMENT '规则唯一英文标识,全小写',
  `type` varchar(30) DEFAULT NULL COMMENT '权限规则分类，请加应用前缀,如admin_',
  KEY `role_id` (`role_id`),
  KEY `rule_name` (`rule_name`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_auth_access
-- ----------------------------

-- ----------------------------
-- Table structure for `matt_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `matt_auth_rule`;
CREATE TABLE `matt_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '规则id,自增主键',
  `module` varchar(20) NOT NULL COMMENT '规则所属module',
  `type` varchar(30) NOT NULL DEFAULT '1' COMMENT '权限规则分类，请加应用前缀,如admin_',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '规则唯一英文标识,全小写',
  `param` varchar(255) DEFAULT NULL COMMENT '额外url参数',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '规则中文描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否有效(0:无效,1:有效)',
  `condition` varchar(300) NOT NULL DEFAULT '' COMMENT '规则附加条件',
  PRIMARY KEY (`id`),
  KEY `module` (`module`,`status`,`type`)
) ENGINE=MyISAM AUTO_INCREMENT=182 DEFAULT CHARSET=utf8 COMMENT='权限规则表';

-- ----------------------------
-- Records of matt_auth_rule
-- ----------------------------
INSERT INTO `matt_auth_rule` VALUES ('1', 'Admin', 'admin_url', 'admin/content/default', null, '内容管理', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('2', 'Api', 'admin_url', 'api/guestbookadmin/index', null, '所有留言', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('3', 'Api', 'admin_url', 'api/guestbookadmin/delete', null, '删除网站留言', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('4', 'Comment', 'admin_url', 'comment/commentadmin/index', null, '评论管理', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('5', 'Comment', 'admin_url', 'comment/commentadmin/delete', null, '删除评论', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('6', 'Comment', 'admin_url', 'comment/commentadmin/check', null, '评论审核', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('7', 'Portal', 'admin_url', 'portal/adminpost/index', null, '文章管理', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('8', 'Portal', 'admin_url', 'portal/adminpost/listorders', null, '文章排序', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('9', 'Portal', 'admin_url', 'portal/adminpost/top', null, '文章置顶', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('10', 'Portal', 'admin_url', 'portal/adminpost/recommend', null, '文章推荐', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('11', 'Portal', 'admin_url', 'portal/adminpost/move', null, '批量移动', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('12', 'Portal', 'admin_url', 'portal/adminpost/check', null, '文章审核', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('13', 'Portal', 'admin_url', 'portal/adminpost/delete', null, '删除文章', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('14', 'Portal', 'admin_url', 'portal/adminpost/edit', null, '编辑文章', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('15', 'Portal', 'admin_url', 'portal/adminpost/edit_post', null, '提交编辑', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('16', 'Portal', 'admin_url', 'portal/adminpost/add', null, '添加文章', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('17', 'Portal', 'admin_url', 'portal/adminpost/add_post', null, '提交添加', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('18', 'Portal', 'admin_url', 'portal/adminterm/index', null, '分类管理', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('19', 'Portal', 'admin_url', 'portal/adminterm/listorders', null, '文章分类排序', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('20', 'Portal', 'admin_url', 'portal/adminterm/delete', null, '删除分类', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('21', 'Portal', 'admin_url', 'portal/adminterm/edit', null, '编辑分类', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('22', 'Portal', 'admin_url', 'portal/adminterm/edit_post', null, '提交编辑', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('23', 'Portal', 'admin_url', 'portal/adminterm/add', null, '添加分类', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('24', 'Portal', 'admin_url', 'portal/adminterm/add_post', null, '提交添加', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('25', 'Portal', 'admin_url', 'portal/adminpage/index', null, '页面管理', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('26', 'Portal', 'admin_url', 'portal/adminpage/listorders', null, '页面排序', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('27', 'Portal', 'admin_url', 'portal/adminpage/delete', null, '删除页面', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('28', 'Portal', 'admin_url', 'portal/adminpage/edit', null, '编辑页面', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('29', 'Portal', 'admin_url', 'portal/adminpage/edit_post', null, '提交编辑', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('30', 'Portal', 'admin_url', 'portal/adminpage/add', null, '添加页面', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('31', 'Portal', 'admin_url', 'portal/adminpage/add_post', null, '提交添加', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('32', 'Admin', 'admin_url', 'admin/recycle/default', null, '回收站', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('33', 'Portal', 'admin_url', 'portal/adminpost/recyclebin', null, '文章回收', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('34', 'Portal', 'admin_url', 'portal/adminpost/restore', null, '文章还原', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('35', 'Portal', 'admin_url', 'portal/adminpost/clean', null, '彻底删除', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('36', 'Portal', 'admin_url', 'portal/adminpage/recyclebin', null, '页面回收', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('37', 'Portal', 'admin_url', 'portal/adminpage/clean', null, '彻底删除', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('38', 'Portal', 'admin_url', 'portal/adminpage/restore', null, '页面还原', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('39', 'Admin', 'admin_url', 'admin/extension/default', null, '扩展工具', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('40', 'Admin', 'admin_url', 'admin/backup/default', null, '备份管理', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('41', 'Admin', 'admin_url', 'admin/backup/restore', null, '数据还原', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('42', 'Admin', 'admin_url', 'admin/backup/index', null, '数据备份', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('43', 'Admin', 'admin_url', 'admin/backup/index_post', null, '提交数据备份', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('44', 'Admin', 'admin_url', 'admin/backup/download', null, '下载备份', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('45', 'Admin', 'admin_url', 'admin/backup/del_backup', null, '删除备份', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('46', 'Admin', 'admin_url', 'admin/backup/import', null, '数据备份导入', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('47', 'Admin', 'admin_url', 'admin/plugin/index', null, '插件管理', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('48', 'Admin', 'admin_url', 'admin/plugin/toggle', null, '插件启用切换', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('49', 'Admin', 'admin_url', 'admin/plugin/setting', null, '插件设置', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('50', 'Admin', 'admin_url', 'admin/plugin/setting_post', null, '插件设置提交', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('51', 'Admin', 'admin_url', 'admin/plugin/install', null, '插件安装', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('52', 'Admin', 'admin_url', 'admin/plugin/uninstall', null, '插件卸载', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('53', 'Admin', 'admin_url', 'admin/slide/default', null, '幻灯片', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('54', 'Admin', 'admin_url', 'admin/slide/index', null, '幻灯片管理', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('55', 'Admin', 'admin_url', 'admin/slide/listorders', null, '幻灯片排序', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('56', 'Admin', 'admin_url', 'admin/slide/toggle', null, '幻灯片显示切换', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('57', 'Admin', 'admin_url', 'admin/slide/delete', null, '删除幻灯片', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('58', 'Admin', 'admin_url', 'admin/slide/edit', null, '编辑幻灯片', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('59', 'Admin', 'admin_url', 'admin/slide/edit_post', null, '提交编辑', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('60', 'Admin', 'admin_url', 'admin/slide/add', null, '添加幻灯片', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('61', 'Admin', 'admin_url', 'admin/slide/add_post', null, '提交添加', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('62', 'Admin', 'admin_url', 'admin/slidecat/index', null, '幻灯片分类', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('63', 'Admin', 'admin_url', 'admin/slidecat/delete', null, '删除分类', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('64', 'Admin', 'admin_url', 'admin/slidecat/edit', null, '编辑分类', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('65', 'Admin', 'admin_url', 'admin/slidecat/edit_post', null, '提交编辑', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('66', 'Admin', 'admin_url', 'admin/slidecat/add', null, '添加分类', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('67', 'Admin', 'admin_url', 'admin/slidecat/add_post', null, '提交添加', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('68', 'Admin', 'admin_url', 'admin/ad/index', null, '网站广告', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('69', 'Admin', 'admin_url', 'admin/ad/toggle', null, '广告显示切换', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('70', 'Admin', 'admin_url', 'admin/ad/delete', null, '删除广告', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('71', 'Admin', 'admin_url', 'admin/ad/edit', null, '编辑广告', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('72', 'Admin', 'admin_url', 'admin/ad/edit_post', null, '提交编辑', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('73', 'Admin', 'admin_url', 'admin/ad/add', null, '添加广告', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('74', 'Admin', 'admin_url', 'admin/ad/add_post', null, '提交添加', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('75', 'Admin', 'admin_url', 'admin/link/index', null, '友情链接', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('76', 'Admin', 'admin_url', 'admin/link/listorders', null, '友情链接排序', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('77', 'Admin', 'admin_url', 'admin/link/toggle', null, '友链显示切换', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('78', 'Admin', 'admin_url', 'admin/link/delete', null, '删除友情链接', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('79', 'Admin', 'admin_url', 'admin/link/edit', null, '编辑友情链接', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('80', 'Admin', 'admin_url', 'admin/link/edit_post', null, '提交编辑', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('81', 'Admin', 'admin_url', 'admin/link/add', null, '添加友情链接', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('82', 'Admin', 'admin_url', 'admin/link/add_post', null, '提交添加', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('83', 'Api', 'admin_url', 'api/oauthadmin/setting', null, '第三方登陆', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('84', 'Api', 'admin_url', 'api/oauthadmin/setting_post', null, '提交设置', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('85', 'Admin', 'admin_url', 'admin/menu/default', null, '菜单管理', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('86', 'Admin', 'admin_url', 'admin/navcat/default1', null, '前台菜单', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('87', 'Admin', 'admin_url', 'admin/nav/index', null, '菜单管理', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('88', 'Admin', 'admin_url', 'admin/nav/listorders', null, '前台导航排序', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('89', 'Admin', 'admin_url', 'admin/nav/delete', null, '删除菜单', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('90', 'Admin', 'admin_url', 'admin/nav/edit', null, '编辑菜单', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('91', 'Admin', 'admin_url', 'admin/nav/edit_post', null, '提交编辑', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('92', 'Admin', 'admin_url', 'admin/nav/add', null, '添加菜单', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('93', 'Admin', 'admin_url', 'admin/nav/add_post', null, '提交添加', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('94', 'Admin', 'admin_url', 'admin/navcat/index', null, '菜单分类', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('95', 'Admin', 'admin_url', 'admin/navcat/delete', null, '删除分类', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('96', 'Admin', 'admin_url', 'admin/navcat/edit', null, '编辑分类', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('97', 'Admin', 'admin_url', 'admin/navcat/edit_post', null, '提交编辑', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('98', 'Admin', 'admin_url', 'admin/navcat/add', null, '添加分类', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('99', 'Admin', 'admin_url', 'admin/navcat/add_post', null, '提交添加', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('100', 'Admin', 'admin_url', 'admin/menu/index', null, '后台菜单', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('101', 'Admin', 'admin_url', 'admin/menu/add', null, '添加菜单', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('102', 'Admin', 'admin_url', 'admin/menu/add_post', null, '提交添加', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('103', 'Admin', 'admin_url', 'admin/menu/listorders', null, '后台菜单排序', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('104', 'Admin', 'admin_url', 'admin/menu/export_menu', null, '菜单备份', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('105', 'Admin', 'admin_url', 'admin/menu/edit', null, '编辑菜单', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('106', 'Admin', 'admin_url', 'admin/menu/edit_post', null, '提交编辑', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('107', 'Admin', 'admin_url', 'admin/menu/delete', null, '删除菜单', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('108', 'Admin', 'admin_url', 'admin/menu/lists', null, '所有菜单', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('109', 'Admin', 'admin_url', 'admin/setting/default', null, '设置', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('110', 'Admin', 'admin_url', 'admin/setting/userdefault', null, '个人信息', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('111', 'Admin', 'admin_url', 'admin/user/userinfo', null, '修改信息', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('112', 'Admin', 'admin_url', 'admin/user/userinfo_post', null, '修改信息提交', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('113', 'Admin', 'admin_url', 'admin/setting/password', null, '修改密码', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('114', 'Admin', 'admin_url', 'admin/setting/password_post', null, '提交修改', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('115', 'Admin', 'admin_url', 'admin/setting/site', null, '网站信息', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('116', 'Admin', 'admin_url', 'admin/setting/site_post', null, '提交修改', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('117', 'Admin', 'admin_url', 'admin/route/index', null, '路由列表', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('118', 'Admin', 'admin_url', 'admin/route/add', null, '路由添加', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('119', 'Admin', 'admin_url', 'admin/route/add_post', null, '路由添加提交', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('120', 'Admin', 'admin_url', 'admin/route/edit', null, '路由编辑', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('121', 'Admin', 'admin_url', 'admin/route/edit_post', null, '路由编辑提交', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('122', 'Admin', 'admin_url', 'admin/route/delete', null, '路由删除', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('123', 'Admin', 'admin_url', 'admin/route/ban', null, '路由禁止', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('124', 'Admin', 'admin_url', 'admin/route/open', null, '路由启用', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('125', 'Admin', 'admin_url', 'admin/route/listorders', null, '路由排序', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('126', 'Admin', 'admin_url', 'admin/mailer/default', null, '邮箱配置', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('127', 'Admin', 'admin_url', 'admin/mailer/index', null, 'SMTP配置', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('128', 'Admin', 'admin_url', 'admin/mailer/index_post', null, '提交配置', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('129', 'Admin', 'admin_url', 'admin/mailer/active', null, '邮件模板', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('130', 'Admin', 'admin_url', 'admin/mailer/active_post', null, '提交模板', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('131', 'Admin', 'admin_url', 'admin/setting/clearcache', null, '清除缓存', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('132', 'User', 'admin_url', 'user/indexadmin/default', null, '用户管理', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('133', 'User', 'admin_url', 'user/indexadmin/default1', null, '用户组', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('134', 'User', 'admin_url', 'user/indexadmin/index', null, '本站用户', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('135', 'User', 'admin_url', 'user/indexadmin/ban', null, '拉黑会员', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('136', 'User', 'admin_url', 'user/indexadmin/cancelban', null, '启用会员', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('137', 'User', 'admin_url', 'user/oauthadmin/index', null, '第三方用户', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('138', 'User', 'admin_url', 'user/oauthadmin/delete', null, '第三方用户解绑', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('139', 'User', 'admin_url', 'user/indexadmin/default3', null, '管理组', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('140', 'Admin', 'admin_url', 'admin/rbac/index', null, '角色管理', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('141', 'Admin', 'admin_url', 'admin/rbac/member', null, '成员管理', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('142', 'Admin', 'admin_url', 'admin/rbac/authorize', null, '权限设置', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('143', 'Admin', 'admin_url', 'admin/rbac/authorize_post', null, '提交设置', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('144', 'Admin', 'admin_url', 'admin/rbac/roleedit', null, '编辑角色', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('145', 'Admin', 'admin_url', 'admin/rbac/roleedit_post', null, '提交编辑', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('146', 'Admin', 'admin_url', 'admin/rbac/roledelete', null, '删除角色', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('147', 'Admin', 'admin_url', 'admin/rbac/roleadd', null, '添加角色', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('148', 'Admin', 'admin_url', 'admin/rbac/roleadd_post', null, '提交添加', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('149', 'Admin', 'admin_url', 'admin/user/index', null, '管理员', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('150', 'Admin', 'admin_url', 'admin/user/delete', null, '删除管理员', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('151', 'Admin', 'admin_url', 'admin/user/edit', null, '管理员编辑', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('152', 'Admin', 'admin_url', 'admin/user/edit_post', null, '编辑提交', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('153', 'Admin', 'admin_url', 'admin/user/add', null, '管理员添加', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('154', 'Admin', 'admin_url', 'admin/user/add_post', null, '添加提交', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('155', 'Admin', 'admin_url', 'admin/plugin/update', null, '插件更新', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('156', 'Admin', 'admin_url', 'admin/storage/index', null, '文件存储', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('157', 'Admin', 'admin_url', 'admin/storage/setting_post', null, '文件存储设置提交', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('158', 'Admin', 'admin_url', 'admin/slide/ban', null, '禁用幻灯片', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('159', 'Admin', 'admin_url', 'admin/slide/cancelban', null, '启用幻灯片', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('160', 'Admin', 'admin_url', 'admin/user/ban', null, '禁用管理员', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('161', 'Admin', 'admin_url', 'admin/user/cancelban', null, '启用管理员', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('162', 'Admin', 'admin_url', 'admin/teacher/default', null, '教师管理', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('163', 'Admin', 'admin_url', 'admin/teacher/index', null, '教师管理', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('164', 'Admin', 'admin_url', 'admin/teacher/add', null, '教师添加', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('165', 'Admin', 'admin_url', 'admin/teacher/add_post', null, '教师添加post', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('166', 'Admin', 'admin_url', 'admin/teacher/edit', null, '修改', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('167', 'Admin', 'admin_url', 'admin/teacher/edit_post', null, '修改post', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('168', 'Admin', 'admin_url', 'admin/teacher/delete', null, '删除教师', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('169', 'Admin', 'admin_url', 'admin/student/index', null, '学员管理', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('170', 'Admin', 'admin_url', 'admin/vcr/default', null, 'VCR管理', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('171', 'Admin', 'admin_url', 'admin/vcr/index', null, 'VCR管理', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('172', 'Admin', 'admin_url', 'admin/vcr/add', null, '添加VCR', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('173', 'Admin', 'admin_url', 'admin/vcr/add_post', null, '添加vcr-post', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('174', 'Admin', 'admin_url', 'admin/vcr/edit', null, '修改vcr', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('175', 'Admin', 'admin_url', 'admin/vcr/edit_post', null, '修改post', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('176', 'Admin', 'admin_url', 'admin/vcr/delete', null, '删除vcr', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('177', 'Admin', 'admin_url', 'admin/student/add', null, '添加学员', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('178', 'Admin', 'admin_url', 'admin/student/add_post', null, '添加学员post', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('179', 'Admin', 'admin_url', 'admin/student/edit', null, '学员修改', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('180', 'Admin', 'admin_url', 'admin/student/edit_post', null, '学员修改post', '1', '');
INSERT INTO `matt_auth_rule` VALUES ('181', 'Admin', 'admin_url', 'admin/student/delete', null, '删除学员信息', '1', '');

-- ----------------------------
-- Table structure for `matt_comments`
-- ----------------------------
DROP TABLE IF EXISTS `matt_comments`;
CREATE TABLE `matt_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `status` smallint(1) NOT NULL DEFAULT '1' COMMENT '状态，1已审核，0未审核',
  PRIMARY KEY (`id`),
  KEY `comment_post_ID` (`post_id`),
  KEY `comment_approved_date_gmt` (`status`),
  KEY `comment_parent` (`parentid`),
  KEY `table_id_status` (`post_table`,`post_id`,`status`),
  KEY `createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_comments
-- ----------------------------

-- ----------------------------
-- Table structure for `matt_common_action_log`
-- ----------------------------
DROP TABLE IF EXISTS `matt_common_action_log`;
CREATE TABLE `matt_common_action_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` bigint(20) DEFAULT '0' COMMENT '用户id',
  `object` varchar(100) DEFAULT NULL COMMENT '访问对象的id,格式：不带前缀的表名+id;如posts1表示xx_posts表里id为1的记录',
  `action` varchar(50) DEFAULT NULL COMMENT '操作名称；格式规定为：应用名+控制器+操作名；也可自己定义格式只要不发生冲突且惟一；',
  `count` int(11) DEFAULT '0' COMMENT '访问次数',
  `last_time` int(11) DEFAULT '0' COMMENT '最后访问的时间戳',
  `ip` varchar(15) DEFAULT NULL COMMENT '访问者最后访问ip',
  PRIMARY KEY (`id`),
  KEY `user_object_action` (`user`,`object`,`action`),
  KEY `user_object_action_ip` (`user`,`object`,`action`,`ip`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_common_action_log
-- ----------------------------
INSERT INTO `matt_common_action_log` VALUES ('1', '0', 'posts5', 'Portal-Article-index', '9', '1431152242', '127.0.0.1');
INSERT INTO `matt_common_action_log` VALUES ('2', '0', 'posts6', 'Portal-Article-index', '1', '1430804879', '127.0.0.1');
INSERT INTO `matt_common_action_log` VALUES ('3', '0', 'posts7', 'Portal-Article-index', '8', '1430804983', '127.0.0.1');
INSERT INTO `matt_common_action_log` VALUES ('4', '0', 'posts8', 'Portal-Article-index', '2', '1430883248', '127.0.0.1');
INSERT INTO `matt_common_action_log` VALUES ('5', '0', 'posts9', 'Portal-Article-index', '10', '1430808019', '127.0.0.1');

-- ----------------------------
-- Table structure for `matt_guestbook`
-- ----------------------------
DROP TABLE IF EXISTS `matt_guestbook`;
CREATE TABLE `matt_guestbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL COMMENT '留言者姓名',
  `email` varchar(100) NOT NULL COMMENT '留言者邮箱',
  `title` varchar(255) DEFAULT NULL COMMENT '留言标题',
  `msg` text NOT NULL COMMENT '留言内容',
  `createtime` datetime NOT NULL,
  `status` smallint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_guestbook
-- ----------------------------

-- ----------------------------
-- Table structure for `matt_links`
-- ----------------------------
DROP TABLE IF EXISTS `matt_links`;
CREATE TABLE `matt_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL COMMENT '友情链接地址',
  `link_name` varchar(255) NOT NULL COMMENT '友情链接名称',
  `link_image` varchar(255) DEFAULT NULL COMMENT '友情链接图标',
  `link_target` varchar(25) NOT NULL DEFAULT '_blank' COMMENT '友情链接打开方式',
  `link_description` text NOT NULL COMMENT '友情链接描述',
  `link_status` int(2) NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0' COMMENT '友情链接评级',
  `link_rel` varchar(255) DEFAULT '',
  `listorder` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_status`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_links
-- ----------------------------
INSERT INTO `matt_links` VALUES ('1', 'http://www.matteducation.com/', '麦忒学校', '', '_blank', '', '1', '0', '', '0');

-- ----------------------------
-- Table structure for `matt_menu`
-- ----------------------------
DROP TABLE IF EXISTS `matt_menu`;
CREATE TABLE `matt_menu` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
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
  `listorder` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序ID',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `parentid` (`parentid`),
  KEY `model` (`model`)
) ENGINE=MyISAM AUTO_INCREMENT=180 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_menu
-- ----------------------------
INSERT INTO `matt_menu` VALUES ('1', '0', 'Admin', 'Content', 'default', '', '0', '1', '内容管理', 'th', '', '30');
INSERT INTO `matt_menu` VALUES ('2', '1', 'Api', 'Guestbookadmin', 'index', '', '1', '1', '所有留言', '', '', '0');
INSERT INTO `matt_menu` VALUES ('3', '2', 'Api', 'Guestbookadmin', 'delete', '', '1', '0', '删除网站留言', '', '', '0');
INSERT INTO `matt_menu` VALUES ('4', '1', 'Comment', 'Commentadmin', 'index', '', '1', '1', '评论管理', '', '', '0');
INSERT INTO `matt_menu` VALUES ('5', '4', 'Comment', 'Commentadmin', 'delete', '', '1', '0', '删除评论', '', '', '0');
INSERT INTO `matt_menu` VALUES ('6', '4', 'Comment', 'Commentadmin', 'check', '', '1', '0', '评论审核', '', '', '0');
INSERT INTO `matt_menu` VALUES ('7', '1', 'Portal', 'AdminPost', 'index', '', '1', '1', '文章管理', '', '', '1');
INSERT INTO `matt_menu` VALUES ('8', '7', 'Portal', 'AdminPost', 'listorders', '', '1', '0', '文章排序', '', '', '0');
INSERT INTO `matt_menu` VALUES ('9', '7', 'Portal', 'AdminPost', 'top', '', '1', '0', '文章置顶', '', '', '0');
INSERT INTO `matt_menu` VALUES ('10', '7', 'Portal', 'AdminPost', 'recommend', '', '1', '0', '文章推荐', '', '', '0');
INSERT INTO `matt_menu` VALUES ('11', '7', 'Portal', 'AdminPost', 'move', '', '1', '0', '批量移动', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('12', '7', 'Portal', 'AdminPost', 'check', '', '1', '0', '文章审核', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('13', '7', 'Portal', 'AdminPost', 'delete', '', '1', '0', '删除文章', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('14', '7', 'Portal', 'AdminPost', 'edit', '', '1', '0', '编辑文章', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('15', '14', 'Portal', 'AdminPost', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `matt_menu` VALUES ('16', '7', 'Portal', 'AdminPost', 'add', '', '1', '0', '添加文章', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('17', '16', 'Portal', 'AdminPost', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `matt_menu` VALUES ('18', '1', 'Portal', 'AdminTerm', 'index', '', '0', '1', '分类管理', '', '', '2');
INSERT INTO `matt_menu` VALUES ('19', '18', 'Portal', 'AdminTerm', 'listorders', '', '1', '0', '文章分类排序', '', '', '0');
INSERT INTO `matt_menu` VALUES ('20', '18', 'Portal', 'AdminTerm', 'delete', '', '1', '0', '删除分类', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('21', '18', 'Portal', 'AdminTerm', 'edit', '', '1', '0', '编辑分类', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('22', '21', 'Portal', 'AdminTerm', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `matt_menu` VALUES ('23', '18', 'Portal', 'AdminTerm', 'add', '', '1', '0', '添加分类', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('24', '23', 'Portal', 'AdminTerm', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `matt_menu` VALUES ('25', '1', 'Portal', 'AdminPage', 'index', '', '1', '1', '页面管理', '', '', '3');
INSERT INTO `matt_menu` VALUES ('26', '25', 'Portal', 'AdminPage', 'listorders', '', '1', '0', '页面排序', '', '', '0');
INSERT INTO `matt_menu` VALUES ('27', '25', 'Portal', 'AdminPage', 'delete', '', '1', '0', '删除页面', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('28', '25', 'Portal', 'AdminPage', 'edit', '', '1', '0', '编辑页面', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('29', '28', 'Portal', 'AdminPage', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `matt_menu` VALUES ('30', '25', 'Portal', 'AdminPage', 'add', '', '1', '0', '添加页面', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('31', '30', 'Portal', 'AdminPage', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `matt_menu` VALUES ('32', '1', 'Admin', 'Recycle', 'default', '', '1', '1', '回收站', '', '', '4');
INSERT INTO `matt_menu` VALUES ('33', '32', 'Portal', 'AdminPost', 'recyclebin', '', '1', '1', '文章回收', '', '', '0');
INSERT INTO `matt_menu` VALUES ('34', '33', 'Portal', 'AdminPost', 'restore', '', '1', '0', '文章还原', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('35', '33', 'Portal', 'AdminPost', 'clean', '', '1', '0', '彻底删除', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('36', '32', 'Portal', 'AdminPage', 'recyclebin', '', '1', '1', '页面回收', '', '', '1');
INSERT INTO `matt_menu` VALUES ('37', '36', 'Portal', 'AdminPage', 'clean', '', '1', '0', '彻底删除', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('38', '36', 'Portal', 'AdminPage', 'restore', '', '1', '0', '页面还原', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('39', '0', 'Admin', 'Extension', 'default', '', '0', '1', '扩展工具', 'cloud', '', '40');
INSERT INTO `matt_menu` VALUES ('40', '39', 'Admin', 'Backup', 'default', '', '1', '1', '备份管理', '', '', '0');
INSERT INTO `matt_menu` VALUES ('41', '40', 'Admin', 'Backup', 'restore', '', '1', '1', '数据还原', '', '', '0');
INSERT INTO `matt_menu` VALUES ('42', '40', 'Admin', 'Backup', 'index', '', '1', '1', '数据备份', '', '', '0');
INSERT INTO `matt_menu` VALUES ('43', '42', 'Admin', 'Backup', 'index_post', '', '1', '0', '提交数据备份', '', '', '0');
INSERT INTO `matt_menu` VALUES ('44', '40', 'Admin', 'Backup', 'download', '', '1', '0', '下载备份', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('45', '40', 'Admin', 'Backup', 'del_backup', '', '1', '0', '删除备份', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('46', '40', 'Admin', 'Backup', 'import', '', '1', '0', '数据备份导入', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('47', '39', 'Admin', 'Plugin', 'index', '', '1', '1', '插件管理', '', '', '0');
INSERT INTO `matt_menu` VALUES ('48', '47', 'Admin', 'Plugin', 'toggle', '', '1', '0', '插件启用切换', '', '', '0');
INSERT INTO `matt_menu` VALUES ('49', '47', 'Admin', 'Plugin', 'setting', '', '1', '0', '插件设置', '', '', '0');
INSERT INTO `matt_menu` VALUES ('50', '49', 'Admin', 'Plugin', 'setting_post', '', '1', '0', '插件设置提交', '', '', '0');
INSERT INTO `matt_menu` VALUES ('51', '47', 'Admin', 'Plugin', 'install', '', '1', '0', '插件安装', '', '', '0');
INSERT INTO `matt_menu` VALUES ('52', '47', 'Admin', 'Plugin', 'uninstall', '', '1', '0', '插件卸载', '', '', '0');
INSERT INTO `matt_menu` VALUES ('53', '39', 'Admin', 'Slide', 'default', '', '1', '1', '幻灯片', '', '', '1');
INSERT INTO `matt_menu` VALUES ('54', '53', 'Admin', 'Slide', 'index', '', '1', '1', '幻灯片管理', '', '', '0');
INSERT INTO `matt_menu` VALUES ('55', '54', 'Admin', 'Slide', 'listorders', '', '1', '0', '幻灯片排序', '', '', '0');
INSERT INTO `matt_menu` VALUES ('56', '54', 'Admin', 'Slide', 'toggle', '', '1', '0', '幻灯片显示切换', '', '', '0');
INSERT INTO `matt_menu` VALUES ('57', '54', 'Admin', 'Slide', 'delete', '', '1', '0', '删除幻灯片', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('58', '54', 'Admin', 'Slide', 'edit', '', '1', '0', '编辑幻灯片', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('59', '58', 'Admin', 'Slide', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `matt_menu` VALUES ('60', '54', 'Admin', 'Slide', 'add', '', '1', '0', '添加幻灯片', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('61', '60', 'Admin', 'Slide', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `matt_menu` VALUES ('62', '53', 'Admin', 'Slidecat', 'index', '', '1', '1', '幻灯片分类', '', '', '0');
INSERT INTO `matt_menu` VALUES ('63', '62', 'Admin', 'Slidecat', 'delete', '', '1', '0', '删除分类', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('64', '62', 'Admin', 'Slidecat', 'edit', '', '1', '0', '编辑分类', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('65', '64', 'Admin', 'Slidecat', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `matt_menu` VALUES ('66', '62', 'Admin', 'Slidecat', 'add', '', '1', '0', '添加分类', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('67', '66', 'Admin', 'Slidecat', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `matt_menu` VALUES ('68', '39', 'Admin', 'Ad', 'index', '', '1', '1', '网站广告', '', '', '2');
INSERT INTO `matt_menu` VALUES ('69', '68', 'Admin', 'Ad', 'toggle', '', '1', '0', '广告显示切换', '', '', '0');
INSERT INTO `matt_menu` VALUES ('70', '68', 'Admin', 'Ad', 'delete', '', '1', '0', '删除广告', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('71', '68', 'Admin', 'Ad', 'edit', '', '1', '0', '编辑广告', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('72', '71', 'Admin', 'Ad', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `matt_menu` VALUES ('73', '68', 'Admin', 'Ad', 'add', '', '1', '0', '添加广告', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('74', '73', 'Admin', 'Ad', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `matt_menu` VALUES ('75', '39', 'Admin', 'Link', 'index', '', '0', '1', '友情链接', '', '', '3');
INSERT INTO `matt_menu` VALUES ('76', '75', 'Admin', 'Link', 'listorders', '', '1', '0', '友情链接排序', '', '', '0');
INSERT INTO `matt_menu` VALUES ('77', '75', 'Admin', 'Link', 'toggle', '', '1', '0', '友链显示切换', '', '', '0');
INSERT INTO `matt_menu` VALUES ('78', '75', 'Admin', 'Link', 'delete', '', '1', '0', '删除友情链接', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('79', '75', 'Admin', 'Link', 'edit', '', '1', '0', '编辑友情链接', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('80', '79', 'Admin', 'Link', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `matt_menu` VALUES ('81', '75', 'Admin', 'Link', 'add', '', '1', '0', '添加友情链接', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('82', '81', 'Admin', 'Link', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `matt_menu` VALUES ('83', '39', 'Api', 'Oauthadmin', 'setting', '', '1', '1', '第三方登陆', 'leaf', '', '4');
INSERT INTO `matt_menu` VALUES ('84', '83', 'Api', 'Oauthadmin', 'setting_post', '', '1', '0', '提交设置', '', '', '0');
INSERT INTO `matt_menu` VALUES ('85', '0', 'Admin', 'Menu', 'default', '', '1', '1', '菜单管理', 'list', '', '20');
INSERT INTO `matt_menu` VALUES ('86', '85', 'Admin', 'Navcat', 'default1', '', '1', '1', '前台菜单', '', '', '0');
INSERT INTO `matt_menu` VALUES ('87', '86', 'Admin', 'Nav', 'index', '', '1', '1', '菜单管理', '', '', '0');
INSERT INTO `matt_menu` VALUES ('88', '87', 'Admin', 'Nav', 'listorders', '', '1', '0', '前台导航排序', '', '', '0');
INSERT INTO `matt_menu` VALUES ('89', '87', 'Admin', 'Nav', 'delete', '', '1', '0', '删除菜单', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('90', '87', 'Admin', 'Nav', 'edit', '', '1', '0', '编辑菜单', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('91', '90', 'Admin', 'Nav', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `matt_menu` VALUES ('92', '87', 'Admin', 'Nav', 'add', '', '1', '0', '添加菜单', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('93', '92', 'Admin', 'Nav', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `matt_menu` VALUES ('94', '86', 'Admin', 'Navcat', 'index', '', '1', '1', '菜单分类', '', '', '0');
INSERT INTO `matt_menu` VALUES ('95', '94', 'Admin', 'Navcat', 'delete', '', '1', '0', '删除分类', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('96', '94', 'Admin', 'Navcat', 'edit', '', '1', '0', '编辑分类', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('97', '96', 'Admin', 'Navcat', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `matt_menu` VALUES ('98', '94', 'Admin', 'Navcat', 'add', '', '1', '0', '添加分类', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('99', '98', 'Admin', 'Navcat', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `matt_menu` VALUES ('100', '85', 'Admin', 'Menu', 'index', '', '1', '1', '后台菜单', '', '', '0');
INSERT INTO `matt_menu` VALUES ('101', '100', 'Admin', 'Menu', 'add', '', '1', '0', '添加菜单', '', '', '0');
INSERT INTO `matt_menu` VALUES ('102', '101', 'Admin', 'Menu', 'add_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `matt_menu` VALUES ('103', '100', 'Admin', 'Menu', 'listorders', '', '1', '0', '后台菜单排序', '', '', '0');
INSERT INTO `matt_menu` VALUES ('104', '100', 'Admin', 'Menu', 'export_menu', '', '1', '0', '菜单备份', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('105', '100', 'Admin', 'Menu', 'edit', '', '1', '0', '编辑菜单', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('106', '105', 'Admin', 'Menu', 'edit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `matt_menu` VALUES ('107', '100', 'Admin', 'Menu', 'delete', '', '1', '0', '删除菜单', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('108', '100', 'Admin', 'Menu', 'lists', '', '1', '0', '所有菜单', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('109', '0', 'Admin', 'Setting', 'default', '', '0', '1', '设置', 'cogs', '', '0');
INSERT INTO `matt_menu` VALUES ('110', '109', 'Admin', 'Setting', 'userdefault', '', '0', '1', '个人信息', '', '', '0');
INSERT INTO `matt_menu` VALUES ('111', '110', 'Admin', 'User', 'userinfo', '', '1', '1', '修改信息', '', '', '0');
INSERT INTO `matt_menu` VALUES ('112', '111', 'Admin', 'User', 'userinfo_post', '', '1', '0', '修改信息提交', '', '', '0');
INSERT INTO `matt_menu` VALUES ('113', '110', 'Admin', 'Setting', 'password', '', '1', '1', '修改密码', '', '', '0');
INSERT INTO `matt_menu` VALUES ('114', '113', 'Admin', 'Setting', 'password_post', '', '1', '0', '提交修改', '', '', '0');
INSERT INTO `matt_menu` VALUES ('115', '109', 'Admin', 'Setting', 'site', '', '1', '1', '网站信息', '', '', '0');
INSERT INTO `matt_menu` VALUES ('116', '115', 'Admin', 'Setting', 'site_post', '', '1', '0', '提交修改', '', '', '0');
INSERT INTO `matt_menu` VALUES ('117', '115', 'Admin', 'Route', 'index', '', '1', '0', '路由列表', '', '', '0');
INSERT INTO `matt_menu` VALUES ('118', '115', 'Admin', 'Route', 'add', '', '1', '0', '路由添加', '', '', '0');
INSERT INTO `matt_menu` VALUES ('119', '118', 'Admin', 'Route', 'add_post', '', '1', '0', '路由添加提交', '', '', '0');
INSERT INTO `matt_menu` VALUES ('120', '115', 'Admin', 'Route', 'edit', '', '1', '0', '路由编辑', '', '', '0');
INSERT INTO `matt_menu` VALUES ('121', '120', 'Admin', 'Route', 'edit_post', '', '1', '0', '路由编辑提交', '', '', '0');
INSERT INTO `matt_menu` VALUES ('122', '115', 'Admin', 'Route', 'delete', '', '1', '0', '路由删除', '', '', '0');
INSERT INTO `matt_menu` VALUES ('123', '115', 'Admin', 'Route', 'ban', '', '1', '0', '路由禁止', '', '', '0');
INSERT INTO `matt_menu` VALUES ('124', '115', 'Admin', 'Route', 'open', '', '1', '0', '路由启用', '', '', '0');
INSERT INTO `matt_menu` VALUES ('125', '115', 'Admin', 'Route', 'listorders', '', '1', '0', '路由排序', '', '', '0');
INSERT INTO `matt_menu` VALUES ('126', '109', 'Admin', 'Mailer', 'default', '', '1', '1', '邮箱配置', '', '', '0');
INSERT INTO `matt_menu` VALUES ('127', '126', 'Admin', 'Mailer', 'index', '', '1', '1', 'SMTP配置', '', '', '0');
INSERT INTO `matt_menu` VALUES ('128', '127', 'Admin', 'Mailer', 'index_post', '', '1', '0', '提交配置', '', '', '0');
INSERT INTO `matt_menu` VALUES ('129', '126', 'Admin', 'Mailer', 'active', '', '1', '1', '邮件模板', '', '', '0');
INSERT INTO `matt_menu` VALUES ('130', '129', 'Admin', 'Mailer', 'active_post', '', '1', '0', '提交模板', '', '', '0');
INSERT INTO `matt_menu` VALUES ('131', '109', 'Admin', 'Setting', 'clearcache', '', '1', '1', '清除缓存', '', '', '1');
INSERT INTO `matt_menu` VALUES ('132', '0', 'User', 'Indexadmin', 'default', '', '1', '1', '用户管理', 'group', '', '10');
INSERT INTO `matt_menu` VALUES ('133', '132', 'User', 'Indexadmin', 'default1', '', '1', '1', '用户组', '', '', '0');
INSERT INTO `matt_menu` VALUES ('134', '133', 'User', 'Indexadmin', 'index', '', '1', '1', '本站用户', 'leaf', '', '0');
INSERT INTO `matt_menu` VALUES ('135', '134', 'User', 'Indexadmin', 'ban', '', '1', '0', '拉黑会员', '', '', '0');
INSERT INTO `matt_menu` VALUES ('136', '134', 'User', 'Indexadmin', 'cancelban', '', '1', '0', '启用会员', '', '', '0');
INSERT INTO `matt_menu` VALUES ('137', '133', 'User', 'Oauthadmin', 'index', '', '1', '1', '第三方用户', 'leaf', '', '0');
INSERT INTO `matt_menu` VALUES ('138', '137', 'User', 'Oauthadmin', 'delete', '', '1', '0', '第三方用户解绑', '', '', '0');
INSERT INTO `matt_menu` VALUES ('139', '132', 'User', 'Indexadmin', 'default3', '', '1', '1', '管理组', '', '', '0');
INSERT INTO `matt_menu` VALUES ('140', '139', 'Admin', 'Rbac', 'index', '', '1', '1', '角色管理', '', '', '0');
INSERT INTO `matt_menu` VALUES ('141', '140', 'Admin', 'Rbac', 'member', '', '1', '0', '成员管理', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('142', '140', 'Admin', 'Rbac', 'authorize', '', '1', '0', '权限设置', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('143', '142', 'Admin', 'Rbac', 'authorize_post', '', '1', '0', '提交设置', '', '', '0');
INSERT INTO `matt_menu` VALUES ('144', '140', 'Admin', 'Rbac', 'roleedit', '', '1', '0', '编辑角色', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('145', '144', 'Admin', 'Rbac', 'roleedit_post', '', '1', '0', '提交编辑', '', '', '0');
INSERT INTO `matt_menu` VALUES ('146', '140', 'Admin', 'Rbac', 'roledelete', '', '1', '1', '删除角色', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('147', '140', 'Admin', 'Rbac', 'roleadd', '', '1', '1', '添加角色', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('148', '147', 'Admin', 'Rbac', 'roleadd_post', '', '1', '0', '提交添加', '', '', '0');
INSERT INTO `matt_menu` VALUES ('149', '139', 'Admin', 'User', 'index', '', '1', '1', '管理员', '', '', '0');
INSERT INTO `matt_menu` VALUES ('150', '149', 'Admin', 'User', 'delete', '', '1', '0', '删除管理员', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('151', '149', 'Admin', 'User', 'edit', '', '1', '0', '管理员编辑', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('152', '151', 'Admin', 'User', 'edit_post', '', '1', '0', '编辑提交', '', '', '0');
INSERT INTO `matt_menu` VALUES ('153', '149', 'Admin', 'User', 'add', '', '1', '0', '管理员添加', '', '', '1000');
INSERT INTO `matt_menu` VALUES ('154', '153', 'Admin', 'User', 'add_post', '', '1', '0', '添加提交', '', '', '0');
INSERT INTO `matt_menu` VALUES ('155', '47', 'Admin', 'Plugin', 'update', '', '1', '0', '插件更新', '', '', '0');
INSERT INTO `matt_menu` VALUES ('156', '39', 'Admin', 'Storage', 'index', '', '1', '1', '文件存储', '', '', '0');
INSERT INTO `matt_menu` VALUES ('157', '156', 'Admin', 'Storage', 'setting_post', '', '1', '0', '文件存储设置提交', '', '', '0');
INSERT INTO `matt_menu` VALUES ('158', '54', 'Admin', 'Slide', 'ban', '', '1', '0', '禁用幻灯片', '', '', '0');
INSERT INTO `matt_menu` VALUES ('159', '54', 'Admin', 'Slide', 'cancelban', '', '1', '0', '启用幻灯片', '', '', '0');
INSERT INTO `matt_menu` VALUES ('160', '149', 'Admin', 'User', 'ban', '', '1', '0', '禁用管理员', '', '', '0');
INSERT INTO `matt_menu` VALUES ('161', '149', 'Admin', 'User', 'cancelban', '', '1', '0', '启用管理员', '', '', '0');
INSERT INTO `matt_menu` VALUES ('162', '0', 'Admin', 'teacher', 'index', '', '1', '1', '教师管理', 'group', '', '0');
INSERT INTO `matt_menu` VALUES ('163', '162', 'Admin', 'teacher', 'add', '', '1', '0', '教师添加', '', '', '0');
INSERT INTO `matt_menu` VALUES ('164', '162', 'Admin', 'teacher', 'add_post', '', '1', '0', '教师添加post', '', '', '0');
INSERT INTO `matt_menu` VALUES ('165', '162', 'Admin', 'teacher', 'edit', '', '1', '0', '修改', '', '', '0');
INSERT INTO `matt_menu` VALUES ('166', '162', 'Admin', 'teacher', 'edit_post', '', '1', '0', '修改post', '', '', '0');
INSERT INTO `matt_menu` VALUES ('167', '162', 'Admin', 'teacher', 'delete', '', '1', '0', '删除教师', '', '', '0');
INSERT INTO `matt_menu` VALUES ('168', '0', 'Admin', 'student', 'index', '', '1', '1', '学员管理', 'group', '', '0');
INSERT INTO `matt_menu` VALUES ('169', '0', 'Admin', 'vcr', 'index', '', '1', '1', 'VCR管理', 'camera', '', '0');
INSERT INTO `matt_menu` VALUES ('170', '169', 'Admin', 'vcr', 'add', '', '1', '0', '添加VCR', '', '', '0');
INSERT INTO `matt_menu` VALUES ('171', '169', 'Admin', 'vcr', 'add_post', '', '1', '0', '添加vcr-post', '', '', '0');
INSERT INTO `matt_menu` VALUES ('172', '169', 'Admin', 'vcr', 'edit', '', '1', '0', '修改vcr', '', '', '0');
INSERT INTO `matt_menu` VALUES ('173', '169', 'Admin', 'vcr', 'edit_post', '', '1', '0', '修改post', '', '', '0');
INSERT INTO `matt_menu` VALUES ('174', '169', 'Admin', 'vcr', 'delete', '', '1', '0', '删除vcr', '', '', '0');
INSERT INTO `matt_menu` VALUES ('175', '168', 'Admin', 'student', 'add', '', '1', '0', '添加学员', '', '', '0');
INSERT INTO `matt_menu` VALUES ('176', '168', 'Admin', 'student', 'add_post', '', '1', '0', '添加学员post', '', '', '0');
INSERT INTO `matt_menu` VALUES ('177', '168', 'Admin', 'student', 'edit', '', '1', '0', '学员修改', '', '', '0');
INSERT INTO `matt_menu` VALUES ('178', '168', 'Admin', 'student', 'edit_post', '', '1', '0', '学员修改post', '', '', '0');
INSERT INTO `matt_menu` VALUES ('179', '168', 'Admin', 'student', 'delete', '', '1', '0', '删除学员信息', '', '', '0');

-- ----------------------------
-- Table structure for `matt_nav`
-- ----------------------------
DROP TABLE IF EXISTS `matt_nav`;
CREATE TABLE `matt_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `target` varchar(50) DEFAULT NULL,
  `href` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `listorder` int(6) DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_nav
-- ----------------------------
INSERT INTO `matt_nav` VALUES ('1', '1', '0', '首页', '', 'home', '', '1', '0', '0-1');
INSERT INTO `matt_nav` VALUES ('2', '1', '0', '列表演示', '', 'a:2:{s:6:\"action\";s:17:\"Portal/List/index\";s:5:\"param\";a:1:{s:2:\"id\";s:1:\"1\";}}', '', '1', '0', '0-2');
INSERT INTO `matt_nav` VALUES ('3', '1', '0', '瀑布流', '', 'a:2:{s:6:\"action\";s:17:\"Portal/List/index\";s:5:\"param\";a:1:{s:2:\"id\";s:1:\"2\";}}', '', '1', '0', '0-3');

-- ----------------------------
-- Table structure for `matt_nav_cat`
-- ----------------------------
DROP TABLE IF EXISTS `matt_nav_cat`;
CREATE TABLE `matt_nav_cat` (
  `navcid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `remark` text,
  PRIMARY KEY (`navcid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_nav_cat
-- ----------------------------
INSERT INTO `matt_nav_cat` VALUES ('1', '主导航', '1', '主导航');

-- ----------------------------
-- Table structure for `matt_oauth_user`
-- ----------------------------
DROP TABLE IF EXISTS `matt_oauth_user`;
CREATE TABLE `matt_oauth_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
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
  `openid` varchar(40) NOT NULL COMMENT '第三方用户id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_oauth_user
-- ----------------------------

-- ----------------------------
-- Table structure for `matt_options`
-- ----------------------------
DROP TABLE IF EXISTS `matt_options`;
CREATE TABLE `matt_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_options
-- ----------------------------
INSERT INTO `matt_options` VALUES ('1', 'member_email_active', '{\"title\":\"ThinkCMF\\u90ae\\u4ef6\\u6fc0\\u6d3b\\u901a\\u77e5.\",\"template\":\"<p>\\u672c\\u90ae\\u4ef6\\u6765\\u81ea<a href=\\\"http:\\/\\/www.thinkcmf.com\\\">ThinkCMF<\\/a><br\\/><br\\/>&nbsp; &nbsp;<strong>---------------<\\/strong><br\\/>&nbsp; &nbsp;<strong>\\u5e10\\u53f7\\u6fc0\\u6d3b\\u8bf4\\u660e<\\/strong><br\\/>&nbsp; &nbsp;<strong>---------------<\\/strong><br\\/><br\\/>&nbsp; &nbsp; \\u5c0a\\u656c\\u7684<span style=\\\"FONT-SIZE: 16px; FONT-FAMILY: Arial; COLOR: rgb(51,51,51); LINE-HEIGHT: 18px; BACKGROUND-COLOR: rgb(255,255,255)\\\">#username#\\uff0c\\u60a8\\u597d\\u3002<\\/span>\\u5982\\u679c\\u60a8\\u662fThinkCMF\\u7684\\u65b0\\u7528\\u6237\\uff0c\\u6216\\u5728\\u4fee\\u6539\\u60a8\\u7684\\u6ce8\\u518cEmail\\u65f6\\u4f7f\\u7528\\u4e86\\u672c\\u5730\\u5740\\uff0c\\u6211\\u4eec\\u9700\\u8981\\u5bf9\\u60a8\\u7684\\u5730\\u5740\\u6709\\u6548\\u6027\\u8fdb\\u884c\\u9a8c\\u8bc1\\u4ee5\\u907f\\u514d\\u5783\\u573e\\u90ae\\u4ef6\\u6216\\u5730\\u5740\\u88ab\\u6ee5\\u7528\\u3002<br\\/>&nbsp; &nbsp; \\u60a8\\u53ea\\u9700\\u70b9\\u51fb\\u4e0b\\u9762\\u7684\\u94fe\\u63a5\\u5373\\u53ef\\u6fc0\\u6d3b\\u60a8\\u7684\\u5e10\\u53f7\\uff1a<br\\/>&nbsp; &nbsp; <a title=\\\"\\\" href=\\\"http:\\/\\/#link#\\\" target=\\\"_self\\\">http:\\/\\/#link#<\\/a><br\\/>&nbsp; &nbsp; (\\u5982\\u679c\\u4e0a\\u9762\\u4e0d\\u662f\\u94fe\\u63a5\\u5f62\\u5f0f\\uff0c\\u8bf7\\u5c06\\u8be5\\u5730\\u5740\\u624b\\u5de5\\u7c98\\u8d34\\u5230\\u6d4f\\u89c8\\u5668\\u5730\\u5740\\u680f\\u518d\\u8bbf\\u95ee)<br\\/>&nbsp; &nbsp; \\u611f\\u8c22\\u60a8\\u7684\\u8bbf\\u95ee\\uff0c\\u795d\\u60a8\\u4f7f\\u7528\\u6109\\u5feb\\uff01<br\\/><br\\/>&nbsp; &nbsp; \\u6b64\\u81f4<br\\/>&nbsp; &nbsp; ThinkCMF \\u7ba1\\u7406\\u56e2\\u961f.<\\/p>\"}', '1');
INSERT INTO `matt_options` VALUES ('2', 'site_options', '{\"site_name\":\"\\u9ea6\\u5fd2\",\"site_host\":\"http:\\/\\/localhost\\/education\\/\",\"site_tpl\":\"simplebootx\",\"site_adminstyle\":\"flat\",\"site_icp\":\"\",\"site_admin_email\":\"a526584713@qq.com\",\"site_tongji\":\"\",\"site_copyright\":\"\",\"site_seo_title\":\"\\u9ea6\\u5fd2\",\"site_seo_keywords\":\"\",\"site_seo_description\":\"\\u9ea6\\u5fd2\",\"urlmode\":\"0\",\"html_suffix\":\"\",\"comment_time_interval\":60}', '1');
INSERT INTO `matt_options` VALUES ('3', 'cmf_settings', '{\"banned_usernames\":\"\"}', '1');

-- ----------------------------
-- Table structure for `matt_plugins`
-- ----------------------------
DROP TABLE IF EXISTS `matt_plugins`;
CREATE TABLE `matt_plugins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
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
  `listorder` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='插件表';

-- ----------------------------
-- Records of matt_plugins
-- ----------------------------

-- ----------------------------
-- Table structure for `matt_posts`
-- ----------------------------
DROP TABLE IF EXISTS `matt_posts`;
CREATE TABLE `matt_posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `recommended` tinyint(1) NOT NULL DEFAULT '0' COMMENT '推荐 1推荐 0不推荐',
  PRIMARY KEY (`id`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`id`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`),
  KEY `post_date` (`post_date`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_posts
-- ----------------------------
INSERT INTO `matt_posts` VALUES ('1', '1', '', null, '2015-05-05 11:44:45', '<p><img title=\"育婴师课程\" border=\"0\" alt=\"育婴师课程\" src=\"http://www.matteducation.com/maite1/upload/2012120/20121201151496899081.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img border=\"0\" alt=\"\" src=\"http://www.matteducation.com/maite1/upload/201212011292981394.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; color: rgb(102, 102, 102);\"><strong>麦忒育婴职业技术培训学校<span style=\"margin: 0px; padding: 0px; color: rgb(0, 153, 0); font-size: 18px;\">育婴师</span>课程：&nbsp;</strong></span><br style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><strong style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"></strong><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; color: rgb(102, 102, 102);\">随着我国社区护理深入发展，社区家庭育婴的职业教育给护理保健工作赋予了新的内涵。社区家庭育婴师的角色向多元化延伸并持续发展。育婴师是社区护理保健工作中的专门人才，其主要的工作任务是协助家庭人员促进宝宝身心的健康成长。育婴师须学习的内容是：职业道德、宝宝的生活照料、宝宝日常保健与护理、教育及家庭指导等。其中，生活照料内容包括宝宝的饮食与营养、睡眠习惯培养、良好大小便习惯培养与护理、体格锻炼（空气浴、日光浴、水浴、主被动操等）、穿脱衣服和怀抱孩子、环境与日常用具清洁卫生等。日常保健与护理内容包括小儿生长发育基本知识、计划免疫、常见疾病的发现与护理、意外伤害的预防和处理等。小儿教育的内容包括安排婴幼儿生活作息、动作与运动、语言感知与认知、情感和社会性等。学生通过学习育婴师课程，能掌握家庭育婴的基本知识、保健护理操作技能，能为社区家庭育婴保健提供优质服务，能在社区早教中心开展指导工作，并与家长一起交流分享宝宝健康成长过程中遇到的困惑及经验，其最终目标是使宝宝在人生最初路途中挖掘智慧潜能，达到身心的健康发展。&nbsp;</span><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\">&nbsp;</span><br style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img border=\"0\" alt=\"\" src=\"http://www.matteducation.com/maite1/upload/201212011292981394.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\">&nbsp; &nbsp;</span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img title=\"早期教育课程\" border=\"0\" alt=\"早期教育课程\" src=\"http://www.matteducation.com/maite1/upload/2012131/2012131457136234546.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img border=\"0\" alt=\"\" src=\"http://www.matteducation.com/maite1/upload/201212011292981394.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><strong style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102);\"><span style=\"margin: 0px; padding: 0px;\">麦忒育婴职业技术培训学校</span><span style=\"margin: 0px; padding: 0px; color: rgb(0, 153, 0); font-size: 18px;\">早期教育</span>课程：&nbsp;</span><br/></strong><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; color: rgb(102, 102, 102);\">麦忒育婴师课程是立足于打造专业的家庭服务师，提供完美的家庭服务体系，陪伴孩子的健康成长而推行的一套保教结合全面系统化课程。</span><br style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; color: rgb(102, 102, 102);\">课程以蒙台梭利的幼儿敏感期理论为依托，结合目前中国颇具权威的0-3岁婴幼儿营养、教育、护理专家的潜心研讨，制定出符合婴幼儿生长发育规律的系统化课程。从情感认知、社会交往、表现表达等几大领域着手，让孩子们快乐地在游戏中获得语言智能、数逻辑智能、视觉空间智能、身体运动智能、艺术表现智能、社会常识智能等各方面全面均衡的发展。</span><br style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; color: rgb(102, 102, 102);\">新时代的育婴师不再是单纯的“阿姨”“保姆”，她们将通过专业培训获得教育、护理、烹饪、礼仪等全方位的塑造与提升。“育婴师”带给孩子的将是“专业的指导”与“细致的服务”，孩子所获得的将是一位：专业老师+细致护理员+耐心玩伴+家庭护士+美餐厨师……</span><br style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; color: rgb(102, 102, 102);\">麦忒课程将开创家庭服务师的新纪元，带给您和孩子们前所未有的完美体验，您还不心动吗？！</span><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img border=\"0\" alt=\"\" src=\"http://www.matteducation.com/maite1/upload/201212011292981394.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\">&nbsp;&nbsp;</span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img title=\"营养烹饪课程\" border=\"0\" alt=\"营养烹饪课程\" src=\"http://www.matteducation.com/maite1/upload/2012131/201213151543854083.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img border=\"0\" alt=\"\" src=\"http://www.matteducation.com/maite1/upload/201212011292981394.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><strong style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102);\"><span style=\"margin: 0px; padding: 0px;\">麦忒育婴职业技术培训学校</span><span style=\"margin: 0px; padding: 0px; color: rgb(0, 153, 0); font-size: 18px;\">营养烹饪</span>课程：&nbsp;</span><br/></strong><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; color: rgb(102, 102, 102);\">我们麦忒育婴职业技术培训学校推出的0-3岁婴幼儿营养课程，根据婴幼儿在不同阶段的发育特点，相应的给出科学的营养建议及合理的饮食安排。从宝宝第一天呱呱落地，就为他每一天量身定制了食谱。宝宝从母乳喂养到添加辅食期到不以奶为主食，而是能够像大人一样吃饭，我们在课程中不仅对宝宝每个阶段的饮食特点发育状况进行了分析，而且对宝宝每一天的食谱进行了详尽的安排。宝宝的营养需求是多方面的，食物是多样化的，更重要的是要让宝宝均衡营养。在膳食的成分中，做到米面搭配、荤蔬搭配、粗粮细粮搭配、浅色蔬菜及深色蔬菜搭配、动植物蛋白质搭配的关系，使膳食模式趋优化。该食谱不仅在营养方面作了精心安排，而且对菜肴的备料和制作的方法描述详尽，在编制的过程中将科学性、合理性、季节性的特点有机的结合起来。我们还考虑到婴幼儿抵抗能力差，容易生病，还特别对婴幼儿常见疾病的饮食调理提出建议和方案。</span><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img border=\"0\" alt=\"\" src=\"http://www.matteducation.com/maite1/upload/201212011292981394.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\">&nbsp;</span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img title=\"小儿急救课程课程\" border=\"0\" alt=\"小儿急救课程课程\" src=\"http://www.matteducation.com/maite1/upload/2012120/20121201146526418292.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img border=\"0\" alt=\"\" src=\"http://www.matteducation.com/maite1/upload/201212011292981394.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><strong style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102);\">麦忒育婴职业技术培训学校<span style=\"margin: 0px; padding: 0px; color: rgb(0, 153, 0); font-size: 18px;\">小儿急救</span>课程：&nbsp;</span><br/></strong><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; color: rgb(102, 102, 102);\">随着宝宝慢慢地长大，活动范围日渐扩大，对外界一切事物充满了好奇和新鲜，什么都想摸摸和玩玩，因此很容易发生一些意外事故。我们开设的《小儿急救课程》，针对小儿生长发育过程中的特点，结合救护的最新资料和教师丰富的临床经验，从实际出发，结合现代救护的特点、小儿创伤、骨折、烧烫伤、动物咬伤如蜂蛰伤、眼外伤、气管异物、鼻出血、溺水、触电的预防和初步急救方法，并通过现场模拟训练和情境演练使学员学会小儿心肺复苏的操作，以及当意外发生时，如何对小儿实施有效的初步紧急措施，从而使小儿意外伤害的机率和伤害的程度降低，以减轻伤残和痛苦。&nbsp;</span><br style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img border=\"0\" alt=\"\" src=\"http://www.matteducation.com/maite1/upload/201212011292981394.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\">&nbsp;</span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img title=\"母婴护理课程\" border=\"0\" alt=\"母婴护理课程\" src=\"http://www.matteducation.com/maite1/upload/2012120/20121201144458166766.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img border=\"0\" alt=\"\" src=\"http://www.matteducation.com/maite1/upload/201212011292981394.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; color: rgb(102, 102, 102);\"><strong>麦忒育婴职业技术培训学校<span style=\"margin: 0px; padding: 0px; color: rgb(0, 153, 0); font-size: 18px;\">母婴护理</span>课程：</strong>&nbsp;</span><br style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; color: rgb(102, 102, 102);\">时代的发展、卫生保健事业的日益完善，以及人们对孕妇和婴儿健康观念的转变，使得社区育龄妇女及其家人愈来愈重视新生命的创造，并对如何顺利完成一个完整而又科学的怀孕、分娩、哺育及养育过程非常关注。同时，由于人们生活、工作节奏的加快，社会对专业化的母婴护理服务需求日益增长。母婴护理员是社区护理保健工作中的专门人才，其主要工作任务是协助家庭人员为孕妇及新生婴儿提供优质护理，以维护并促进母婴身心健康。母婴护理员需学习的内容是：女性基本医学护理知识、孕产妇护理、婴儿护理、常见疾病预防、护理及急救知识等。母婴护理员通过学习能了解新婚夫妇及其家人如何应对从准备怀孕到怀孕后期、产褥期的护理，饮食的调理和营养，学会初生婴儿的喂养与护理，母婴疾病的发现与保健，以及产妇的健身运动等。</span><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img border=\"0\" alt=\"\" src=\"http://www.matteducation.com/maite1/upload/201212011292981394.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\">&nbsp;</span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img title=\"幼儿运动课程\" border=\"0\" alt=\"幼儿运动课程\" src=\"http://www.matteducation.com/maite1/upload/201212011272232631.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img border=\"0\" alt=\"\" src=\"http://www.matteducation.com/maite1/upload/201212011292981394.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><strong style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102);\"><span style=\"margin: 0px; padding: 0px;\">麦忒</span></span><span style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102);\">育婴职业技术培训学校</span><span style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102);\"><span style=\"margin: 0px; padding: 0px; color: rgb(0, 153, 0); font-size: 18px;\">新生儿早期运动</span>课程的简介：&nbsp;</span><br/></strong><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; color: rgb(102, 102, 102);\">教育从零岁开始已经成为世界范围内一场静悄悄的革命，而心理学和脑科学的研究成果告诉我们，0~3岁是婴幼儿身体运动发展的关键期。我们麦忒婴幼儿早期运动课程通过探索系统化的、新型的健康教育理念，已成为促进0~3岁婴幼儿运动发展的有效途径。为促进婴幼儿的运动发展，我们逐步渗透“运动健康”的理念，根据不同月龄、年龄的婴幼儿发展特点和关键期，制订了不同年龄段的运动发展目标，使运动内容和方法适合婴幼儿的发展水平。同时还注意抓住每一个教育契机，做到有计划的教育与随机教育相结合，关注运动活动的时效性。课程中运用趣味性较强的音乐律动小游戏、主被动操、运动小游戏、智能游泳、亲子互动运动游戏、户外运动游戏等运动形式来激发婴幼儿对运动的兴趣，运动不仅是肌肉和筋骨的活动，而且是整个身体都在活动。科学性系统性的运动不但能能使孩子身高增加还能锻炼孩子的四肢，增加肌肉力量同时促进心肺功能，使血液循环加快，新陈代谢加强，可使孩子胃肠蠕动增加，胃肠消化能力增强，食欲增加，能促进神经系统的发育，促进智力发育。体育锻炼中的各种动作直接受神经系统的支配和调节。运动对新生儿、婴幼儿是十分有利的，加拿大斯图尔特•豪斯顿博士的一句话：“每天进行运动比每天喝牛奶对健康更为重要”。因此，让婴幼儿早期进行适当的运动是必不可少的。</span><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img border=\"0\" alt=\"\" src=\"http://www.matteducation.com/maite1/upload/201212011292981394.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\">&nbsp;</span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img title=\"礼仪课程\" border=\"0\" alt=\"礼仪课程\" src=\"http://www.matteducation.com/maite1/upload/201212011333611989.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img border=\"0\" alt=\"\" src=\"http://www.matteducation.com/maite1/upload/201212011292981394.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><strong style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102);\"><span style=\"margin: 0px; padding: 0px;\">麦忒育婴职业技术培训学校</span><span style=\"margin: 0px; padding: 0px; color: rgb(0, 153, 0); font-size: 18px;\">礼仪</span>课程介绍：&nbsp;</span><br/></strong><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; color: rgb(102, 102, 102);\">麦忒育婴职业技术培训学校的《礼仪》课程，是麦忒为向高端家庭提供绿色育婴整合服务而特别设置的。通过育婴师仪容仪表、服务意识和沟通技巧、个人修养和形体训练等课程的学习，在短期内将学员打造成内强个人素质、外塑贤淑形象的高级育婴师。在任何岗位上，优雅得体、赏心悦目的形象总是机会的青睐者。当你变得魅力十足、气宇不凡时，他人赞许的眼神会让你的生活充满幸福和自信。</span><a style=\"color: rgb(2, 17, 1); font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\" name=\"OLE_LINK6\"></a><a style=\"color: rgb(2, 17, 1); font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\" name=\"OLE_LINK5\"></a><span style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102);\">那些不经意地站没站相、耸肩、驼背、塌腰、挺肚等陋习，真的是白白糟蹋了上帝赐予我们女性所特有的身材曲线</span><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; color: rgb(102, 102, 102);\">。35天，让我们把你打造成一个完美的淑女！我们礼仪课程的设置实用和生活化，通过迷人的微笑、修长挺拔的站姿、优雅高贵的坐姿、婀娜多姿的步态等训练，让你能在短期内塑造完美的体态，拥有优雅的气质，举手投足彰显女性魅力。</span><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img border=\"0\" alt=\"\" src=\"http://www.matteducation.com/maite1/upload/201212011292981394.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\">&nbsp;</span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img title=\"心理学课程\" border=\"0\" alt=\"心理学课程\" src=\"http://www.matteducation.com/maite1/upload/2012120/20121201141223466678.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img border=\"0\" alt=\"\" src=\"http://www.matteducation.com/maite1/upload/201212011292981394.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><strong style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102);\">麦忒<span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px;\">育婴职业技术培训学校</span></span><span style=\"margin: 0px; padding: 0px; color: rgb(0, 153, 0); font-size: 18px;\">心理学</span>课程：&nbsp;</span><br/></strong><span style=\"margin: 0px; padding: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; color: rgb(102, 102, 102);\">上海麦忒家庭服务发展有限公司是一家专注于为0-3岁婴幼儿提供家庭式的绿色育婴整合方案服务的公司。为提高我们服务师的服务水平，特引入了心理学课程。该课程由四部分来组成，第一部分中，介绍了心理学与麦忒服务的结合以及帮助我们的服务师做了很好的职业生涯规划；第二部分，介绍了孕妇心理学方面的知识，特别强调了良好情绪对于孕妇与婴儿的重要性，从实践操作角度，教授服务师一些帮助孕妇心理调试方案，课程中，让服务师亲身体验情绪调节的重要性以及教授部分好的方法；第三部分，从认知和社会性等角度介绍了0-3岁婴儿心理发展的特点，又用专题的形式具体讲解婴幼儿反射、婴儿习惯培养、依恋等等心理学现象，让服务师更加深入的了解婴儿成长过程中的心理发展特点及各种现象后的心理特点与发展阶段；第四部分，回顾前面的学习，使得我们的服务师掌握心理学部分知识，介绍了积极心理学在心理学界目前的趋向，使服务师懂得积极心理对人生和工作的价值，通过体验释放积极情绪的团体辅导活动，学会将所学融入自己的生活、融入平时的工作中。</span><span style=\"font-family: 宋体; font-size: 12px; line-height: 18px;\"></span></p><p style=\"font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"><br/></p><p><img border=\"0\" alt=\"\" src=\"http://www.matteducation.com/maite1/upload/201212011292981394.jpg\" style=\"border: 0px; font-family: 宋体; font-size: 12px; line-height: 18px; white-space: normal;\"/></p><p><br/></p>', '0-3岁研究中心', '0-3岁研究中心', '1', '1', '2015-05-05 11:44:34', null, '0', '2', '', '0', '{\"thumb\":\"\",\"template\":\"page\"}', '0', '0', '0', '0');
INSERT INTO `matt_posts` VALUES ('2', '1', '麦忒教育', null, '2015-05-05 11:45:36', '<p><img border=\"0\" alt=\"\" src=\"http://www.matteducation.com/maite1/upload/2012120/2012120102573486590.jpg\"/> </p><p><br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color:#666666;\">&nbsp; 每个人心里都有一个梦、一亩田，看你用它来种什么？种桃、种李，或是种春风和雨露？当理想的七彩翅膀翱翔于现实的长空，我们期待在这片梦田里，开尽梨花，春又来。</span><br/><span style=\"color:#666666;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 上海麦忒育婴职业技术培训学校，是所有育婴师肥沃的绿色梦田，而这片梦的田野也因有了我们杰出的育婴师才变得万紫千红，百花齐放。</span> </p><p><br/></p><p><span style=\"color:#666666;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 上海麦忒育婴职业技术培训学校地处虹口区大连西路550号，坐拥百年华东知名学府—上海外国语大学。“麦忒”是针对培养高端育婴师的专业技术培训基地，在上海外国语大学校园内拥有4000多平方米的教学场地，包括十间主题技能培训教室，还拥有十四间多媒体景观教室，推窗望去，满眼的苏河美景和上外的桃李芬芳，尽享书香翰墨的熏陶。麦忒学校选址于此正是看中了上海外国语大学这种历史人文色彩，这与“麦忒”的学校气质不谋而合。</span> </p><p><br/></p><p><span style=\"color:#666666;\">&nbsp;&nbsp;&nbsp; &nbsp; “麦忒”拥有国际专业化的师资团队，“育儿界泰斗”朱家雄先生和“儿科专家”张静芬女士，作为学前教育的权威鼻祖和行业标准的制定者，他们不仅带领“麦忒”学校成为育婴界的航母，更亲身执教每一位“麦忒”的学员，立志将他们培养成最专业的育婴师。</span> </p><p><br/></p><p><span style=\"color:#666666;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;上海麦忒育婴职业技术培训学校的课程以市场需求为准绳，注重理论和实际操作能力的双重培养。理论课程包括育婴基础培训、礼仪培训、人文教育、蒙氏早教、宗教文化等。实际操作课程提供产妇纤体课、专业营养餐烹饪课、早教运动课，蒙氏游戏课，婴幼儿生活护理课等。因为“麦忒”的培训课程迎合了高端市场，许多名人、政界客户都以丰厚的薪资提前预定我们优秀的毕业育婴师。同时，“麦忒”的育婴师之所以受到市场的强烈追捧还因为学校颁发的业界含金量最高的资格证书，当然，要获得“麦忒”认证，必须先通过国家专业资格考核。</span> </p><p><br/></p><p><span style=\"color:#666666;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 上海麦忒育婴职业技术培训学校培养的学员既填补了市场稀缺的资源，同时学校也保障学员的生活，学校的签约公司为每一位育婴师提供了高薪就业的途径，并确保即使在没有上单的情况下，依然享有每月不菲的收入，每年都能有固定年薪，另外我们的签约公司还为每一位育婴师完善社会保险。</span> </p><p><br/></p><p><span style=\"color:#666666;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 上海麦忒育婴职业技术培训学校除提供全日制合格培训，对于每一位“麦忒”毕业的育婴师，我们专门配备一对一的服务人员，提供24小时专业指导及咨询服务，还配备了强大的律师团可以提供有力的法律支持。</span><br/><span style=\"color:#666666;\">在“麦忒”，让我们共同用爱去浇灌这片沃土，用心去孕育出每个人心中最璀璨的花园。</span> </p><p><br/></p><p><span style=\"color:#666666;\">电话：021-51022333</span><br/><span style=\"color:#666666;\">地址：上海市虹口区东体育会路390号上海外国语大学贤达学院10-14F</span><br/><span style=\"color:#666666;\">学校网址：</span><a href=\"http://www.matteducation.com\" target=\"_blank\"><span style=\"color:#666666;\">www.matteducation.com</span></a><br/><span style=\"color:#666666;\">公司网址：</span><a href=\"http://www.mattservice.com\" target=\"_blank\"><span style=\"color:#666666;\">www.mattservice.com</span></a></p>', '麦忒教育', '麦忒教育', '1', '1', '2015-05-05 11:45:27', null, '0', '2', '', '0', '{\"thumb\":\"\",\"template\":\"page\"}', '0', '0', '0', '0');
INSERT INTO `matt_posts` VALUES ('3', '1', '校长寄语', null, '2015-05-05 11:45:56', '<p>\r\n    <img border=\"0\" alt=\"\" src=\"http://www.matteducation.com/maite1/upload/2012217/2012217130101252109.jpg\"/> \r\n</p>\r\n<p>\r\n    <br/>\r\n</p>\r\n<p>\r\n    <span style=\"color:#666666;\">&nbsp;&nbsp;&nbsp;&nbsp;上海麦忒育婴职业培训学校成立了，作为受聘于这所学校的校长，我感受到的是责任和挑战。<br/>责任，主要来自社会，来自接受育婴服务的每个家庭。作为专业的育婴职业培训学校，就是要培养能承担一定社会义务和责任的合格的育婴人员，高质量地服务于社会、家庭。这是一负不轻的担子。<br/><span style=\"color:#666666;\">&nbsp;&nbsp;&nbsp;&nbsp;</span>挑战，主要来自这个职业本身。育婴服务这项工作是一项“人对人”的工作，是一项高度“个性化”的工作，其复杂性、情景性和不确定性比任何工作都突出，对从事这项工作的从业人员实施培训，不仅涉及职业知识和技能，而且涉及人品、心态和素养等方面。培训充满了挑战。<br/><span style=\"color:#666666;\">&nbsp;&nbsp;&nbsp;&nbsp;</span>上海麦忒育婴职业培训学校作为一所定位于培养为家庭提供专业、高效、安心、满意的家政服务专业人员的机构，我期望学校中的每个工作人员都要敢于面对挑战，敢于承担责任，精诚团结，齐心协力，共同打造一所与国际接轨的、在国内具有行业引领作用的学校。<br/><span style=\"color:#666666;\">&nbsp;&nbsp;&nbsp;&nbsp;</span>我们要牢记我们的校训：“孝爱谨信”（孝顺、有爱、严谨、信任）；<br/><span style=\"color:#666666;\">&nbsp;&nbsp;&nbsp;&nbsp;</span>我们要构建完善的培训体系，打造一流的课程；<br/><span style=\"color:#666666;\">&nbsp;&nbsp;&nbsp;&nbsp;</span>我们要结集和形成一支与育婴服务有关联的、高质量的专业化师资队伍；<br/><span style=\"color:#666666;\">&nbsp;&nbsp;&nbsp;&nbsp;</span>我们要积累经验，为形成丰富的儿童成长方案以及建立家庭育婴的行业标准而努力。<br/><span style=\"color:#666666;\">&nbsp;&nbsp;&nbsp;&nbsp;</span>任重而道远，让我们一起共同努力！</span> <img border=\"0\" alt=\"\" src=\"http://www.matteducation.com/maite1/upload/2012217/2012217130265225863.jpg\"/>\r\n</p>', '校长寄语', '校长寄语', '0', '1', '2015-05-05 11:45:45', null, '0', '2', '', '0', '{\"thumb\":\"\",\"template\":\"page\"}', '0', '0', '0', '0');
INSERT INTO `matt_posts` VALUES ('4', '1', '专利教具', null, '2015-05-05 11:52:06', '<p>专利教具</p>', '专利教具', '专利教具', '1', '1', '2015-05-05 11:51:57', null, '0', '2', '', '0', '{\"thumb\":\"\",\"template\":\"aid\"}', '0', '0', '0', '0');
INSERT INTO `matt_posts` VALUES ('5', '1', '', '', '2015-05-05 13:19:39', '<p>第一篇新闻</p>', '第一篇新闻', '第一篇新闻', '1', '1', '2015-05-05 13:19:21', null, '0', null, '', '0', '{\"thumb\":\"\"}', '1', '0', '0', '0');
INSERT INTO `matt_posts` VALUES ('6', '1', '师生心得测试', '师生心得测试', '2015-05-05 13:47:53', '<p>师生心得测试</p>', '师生心得测试', '师生心得测试', '1', '1', '2015-05-05 13:47:37', null, '0', null, '', '0', '{\"thumb\":\"\"}', '1', '0', '0', '0');
INSERT INTO `matt_posts` VALUES ('7', '1', '育婴知识测试', '育婴知识测试', '2015-05-05 13:49:20', '<p>育婴知识测试育婴知识测试</p>', '育婴知识测试', '育婴知识测试', '1', '1', '2015-05-05 13:49:01', null, '0', null, '', '0', '{\"thumb\":\"\"}', '1', '0', '0', '0');
INSERT INTO `matt_posts` VALUES ('8', '1', '', '', '2015-05-05 13:54:42', '<p><span style=\"color: rgb(51, 51, 51); font-family: 宋体; font-size: 12px; line-height: 22px;\">5月13日是伟大的母亲节&nbsp;&nbsp;麦忒特意感谢多年来顾客的支持，一并慰问我们所有亲爱的妈妈们。在上海外国语大学内——麦忒育婴职业技术培训学校将举办“夏日幼儿疾病预防和护理”公益免费讲座。无论您是不是我们的客户，只要您拥有或即将拥有健康、可爱的宝宝，并渴望科学、专业照料宝宝，和众多爱心妈妈共同交流成长，给宝宝完美的呵护，让宝宝健康快乐成长，就致电并报名吧！和多位麦忒育婴专家、医院知名专家近距离接触，现场互动交流。欢迎大家来参加哦，还有奖品哦，来者有份！报名致电60350333。环球金融中心71层。您也可以在百度搜索“麦忒”，了解详情。&nbsp;</span></p>', '母亲节快到啦！麦忒百份感恩大礼免费送！', '母亲节快到啦！麦忒百份感恩大礼免费送！', '1', '1', '2015-05-05 13:53:46', null, '0', null, '', '0', '{\"thumb\":\"55485b093ef5c.jpg\"}', '1', '0', '0', '0');
INSERT INTO `matt_posts` VALUES ('9', '1', '定向培训，毕业对口分配，就业高枕勿忧！7000 元', '', '2015-05-05 14:19:58', '<p style=\"text-align:center;\"><strong>上海麦忒育婴职业技术培训学校</strong> </p><hr/><p style=\"text-align:center;\">\r\n	招生简章</p><p style=\"text-align:left;\">\r\n	一、 学校介绍<br/>&nbsp; &nbsp;&nbsp;上海麦忒育婴职业技术培训学校是由虹口区人力资源和社会保障局批准设立的（办学许可证：3101094120539）一所新型的、高规格的职业技术培训学校。目前承担的培训项目有：中级育婴师（四级）、初级育婴师（五级）、母婴护理（专项职业能力）、养老护理员（四级）、养老护理员（五级）、家政服务（专项职业能力）。学校有一支专业化的教师队伍，保证培训质量，考证合格率达95%以上。<span id=\"__kindeditor_bookmark_end_96__\"></span><br/>&nbsp; &nbsp;&nbsp;学校设有就业指导办公室，为学员免费提供就业服务，就业率为98%。<br/>二、 招生要求: 年龄不限，初中文化水平及以上，身体健康，有爱心、耐心、诚心和责任心，会讲普通话。<br/>三、 办班形式及就业去向：</p><table cellspacing=\"0\" cellpadding=\"0\" align=\"center\" border=\"1\" bordercolor=\"#83d3c8\"><tbody><tr class=\"firstRow\"><td height=\"19\" width=\"113\" style=\"text-align:center;\">享受政府补贴班			</td><td width=\"200\" style=\"text-align:center;\">课程内容			</td><td width=\"94\" style=\"text-align:center;\">获得证书			</td><td width=\"251\" colspan=\"2\" style=\"text-align:center;\">收费标准			</td></tr><tr><td height=\"57\" rowspan=\"3\" width=\"113\"><p><span style=\"line-height:1.5;\"><strong>母婴护理</strong></span> \r\n				</p><p><strong>【专项职业能力】</strong> \r\n				</p><p>（全日制班、双休日班）				</p></td><td width=\"200\">1、孕产妇保健与护理；			</td><td rowspan=\"3\" width=\"94\"><strong>母婴护理资格证</strong> \r\n			</td><td rowspan=\"3\" width=\"251\" colspan=\"2\">上海户籍失业、协保、农村富余劳动力支付<span style=\"color:#E53333;\">680</span>元培训费，考试通过可获全额政府补贴；非本市户籍人员仅收<span style=\"color:#E53333;\">350</span>元；本市在职人员收费<span style=\"color:#E53333;\">1360</span>元			</td></tr><tr><td height=\"20\" width=\"200\">2、婴儿生长发育及早期促进，婴儿常见病的预防与护理。			</td></tr><tr><td height=\"19\" width=\"200\">3、营养与喂养。			</td></tr><tr><td height=\"73\" rowspan=\"4\" width=\"113\"><strong>育婴师【四级】</strong>（双休日班）			</td><td width=\"200\">1、婴幼儿生活照料			</td><td rowspan=\"4\" width=\"94\"><strong>中级育婴师资格证</strong> \r\n			</td><td rowspan=\"4\" width=\"251\" colspan=\"2\"><span style=\"color:#E53333;\">170</span><span style=\"color:#E53333;\">0</span>元。外地人或者在本校参加过补贴培训课程，学费<span style=\"color:#E53333;\">1</span><span style=\"color:#E53333;\">250</span>元。			</td></tr><tr><td height=\"18\" width=\"200\">2、婴幼儿日常生活保健与护理			</td></tr><tr><td height=\"18\" width=\"200\">3、婴幼儿早期教育与指导；			</td></tr><tr><td height=\"19\" width=\"200\"><br/></td></tr><tr><td height=\"55\" rowspan=\"3\" width=\"113\"><strong>育婴师【五级】</strong>（全日制版、<span id=\"__kindeditor_bookmark_start_95__\"></span>双休日班）			</td><td width=\"200\">1、婴幼儿生活照料			</td><td rowspan=\"3\" width=\"94\"><strong>初级育婴师</strong><strong>资格证</strong> &nbsp;\r\n			</td><td rowspan=\"3\" width=\"251\" colspan=\"2\">上海户籍失业、协保、农村富余劳动力、外来媳妇支付<span style=\"color:#E53333;\">82</span><span style=\"color:#E53333;\">0</span>元培训费，考试通过可获全额政府补贴；在职和自费人员收<span style=\"color:#E53333;\">1640</span>元			</td></tr><tr><td height=\"18\" width=\"200\">2、婴幼儿日常生活保健与护理			</td></tr><tr><td height=\"19\" width=\"200\">3、婴幼儿早期教育			</td></tr><tr><td height=\"18\" width=\"658\" colspan=\"5\">就业去向：家庭、家政服务公司、社区早教中心，月子会所；就业率高达98%（年收入5-8万元，缴纳三金）			</td></tr><tr><td height=\"31\" width=\"658\" colspan=\"5\"><br/></td></tr><tr><td height=\"19\" width=\"113\" style=\"text-align:center;\">非政府补贴班			</td><td width=\"200\" style=\"text-align:center;\">课程内容			</td><td width=\"176\" colspan=\"2\" style=\"text-align:center;\">获得证书			</td><td width=\"169\" style=\"text-align:center;\">收费标准			</td></tr><tr><td height=\"163\" rowspan=\"6\" width=\"113\"><strong>幼儿家庭成长导师</strong>（3个阶段30天课程）			</td><td width=\"200\">1、职业道德与服务意识；			</td><td rowspan=\"6\" width=\"176\" colspan=\"2\" style=\"text-align:center;\"><strong>幼儿家庭成长导师证</strong><br/> \r\n			</td><td width=\"169\" rowspan=\"6\" style=\"text-align:center;\"><span style=\"color:#E53333;\">2200</span>元/每个阶段			</td></tr><tr><td height=\"18\" width=\"200\">2、婴幼儿保健儿、护理、急救、疾病的处理和预防			</td></tr><tr><td height=\"32\" width=\"200\">3、婴幼儿营养与烹调；			</td></tr><tr><td height=\"32\" width=\"200\">4、婴幼儿早期运动、语言、游戏、认知、情感教育			</td></tr><tr><td height=\"31\" width=\"200\">5、孕产妇保健、护理、纤体护理、月子餐的制作；			</td></tr><tr><td height=\"32\" width=\"200\">6、家庭保洁，衣服熨烫。玩具教具消毒。			</td></tr><tr><td height=\"178\" rowspan=\"7\" width=\"113\" style=\"background-color:#f3fff3;\"><p style=\"text-align:center;\"><br/></p><p><span style=\"line-height:1.5;\"><strong>金牌幼儿家庭成长导师</strong></span> \r\n				</p><p><strong>【高级专业全项能力】</strong>（全日制15天课程）				</p> &nbsp;\r\n				<p><br/></p></td><td width=\"200\">1、职业道德与服务意识；			</td><td rowspan=\"7\" width=\"176\" colspan=\"2\"><p style=\"text-align:center;\"><span style=\"line-height:1.5;\"><strong>高级幼儿家</strong><strong>庭成长导师证</strong></span><strong>就业定向培训</strong> \r\n				</p></td><td width=\"169\" rowspan=\"7\" style=\"text-align:center;\"><span style=\"color:#E53333;\">7000</span>元			</td></tr><tr><td height=\"15\" width=\"200\">2、高级婴幼儿保健儿、护理、急救、疾病的处理和预防			</td></tr><tr><td height=\"36\" width=\"200\">3、高级婴幼儿营养与烹调；			</td></tr><tr><td height=\"31\" width=\"200\">4、专家级婴幼儿早期运动、语言、游戏、认知、情感教育			</td></tr><tr><td height=\"35\" width=\"200\">5、高级孕产妇保健、护理、纤体护理、月子餐的制作；			</td></tr><tr><td height=\"35\" width=\"200\">6、专业家庭保洁，衣服熨烫。玩具教具消毒。			</td></tr><tr><td height=\"43\" width=\"200\">7、蒙特梭利课程。			</td></tr><tr><td height=\"49\" width=\"658\" colspan=\"5\">就业去向：学校签约公司—上海麦忒家庭服务发展有限公司、社区早教中心、月子会所、、家政服务公司，就业率高达98%（年收入6-10万，缴纳三金）			</td></tr><tr><td height=\"55\" width=\"658\" colspan=\"5\"><br/></td></tr><tr><td height=\"18\" width=\"658\" colspan=\"5\">学校地址:上海虹口区东体育会路390号上海外国语大学贤达学院行政楼11-14楼			</td></tr><tr><td height=\"18\" width=\"658\" colspan=\"5\">报名电话:&nbsp;021-51022333&nbsp;(张老师&nbsp;,顾老师)			</td></tr><tr><td height=\"18\" width=\"658\" colspan=\"5\">网上报名:<a href=\"http://www.matteducation.com\" target=\"_blank\">www.matteducation.com</a>&nbsp;<a href=\"http://www.mattservice.com\" target=\"_blank\">www.mattservice.com</a> &nbsp;\r\n			</td></tr></tbody></table>', '金牌幼儿成长导师班【高级专业全项能力 全日】', '毕业获得证书：高级幼儿家庭成长导师证（也可参加国家育婴师和母婴护理证书考试，考试费用自理）', '1', '1', '2015-05-05 14:16:18', null, '0', null, '', '0', '{\"thumb\":\"554860cd0c477.png\"}', '1', '0', '0', '0');
INSERT INTO `matt_posts` VALUES ('10', '1', '入户早教', null, '2015-05-09 11:01:08', '<p><img src=\"http://localhost/education/data/upload/ueditor/20150509/554d7863a0165.jpg\" title=\"入户早教.jpg\" alt=\"入户早教.jpg\" style=\"float: left;\"/></p>', '入户早教', '入户早教', '1', '1', '2015-05-09 11:00:27', null, '0', '2', '', '0', '{\"thumb\":\"\",\"template\":\"page\"}', '0', '0', '0', '0');
INSERT INTO `matt_posts` VALUES ('11', '1', '麦麦育儿机器人', null, '2015-05-09 14:13:06', '<p>\r\n    <img src=\"http://localhost/education/data/upload/ueditor/20150509/554dc479e5ef3.jpg\" width=\"670\" title=\"入户早教.jpg\" alt=\"入户早教.jpg\"/>\r\n</p>', '麦麦育儿机器人', '麦麦育儿机器人', '1', '1', '2015-05-09 11:00:27', null, '0', '2', '', '0', '{\"thumb\":\"\",\"template\":\"page\"}', '0', '0', '0', '0');
INSERT INTO `matt_posts` VALUES ('12', '1', '联系我们', null, '2015-05-09 16:26:25', '<p>联系我们</p>', '联系我们', '联系我们', '1', '1', '2015-05-09 11:00:27', null, '0', '2', '', '0', '{\"thumb\":\"\",\"template\":\"page\"}', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `matt_role`
-- ----------------------------
DROP TABLE IF EXISTS `matt_role`;
CREATE TABLE `matt_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '角色名称',
  `pid` smallint(6) DEFAULT NULL COMMENT '父角色ID',
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT '状态',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `listorder` int(3) NOT NULL DEFAULT '0' COMMENT '排序字段',
  PRIMARY KEY (`id`),
  KEY `parentId` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_role
-- ----------------------------
INSERT INTO `matt_role` VALUES ('1', '超级管理员', '0', '1', '拥有网站最高管理员权限！', '1329633709', '1329633709', '0');

-- ----------------------------
-- Table structure for `matt_role_user`
-- ----------------------------
DROP TABLE IF EXISTS `matt_role_user`;
CREATE TABLE `matt_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_role_user
-- ----------------------------

-- ----------------------------
-- Table structure for `matt_route`
-- ----------------------------
DROP TABLE IF EXISTS `matt_route`;
CREATE TABLE `matt_route` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '路由id',
  `full_url` varchar(255) DEFAULT NULL COMMENT '完整url， 如：portal/list/index?id=1',
  `url` varchar(255) DEFAULT NULL COMMENT '实际显示的url',
  `listorder` int(5) DEFAULT '0' COMMENT '排序，优先级，越小优先级越高',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态，1：启用 ;0：不启用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_route
-- ----------------------------

-- ----------------------------
-- Table structure for `matt_slide`
-- ----------------------------
DROP TABLE IF EXISTS `matt_slide`;
CREATE TABLE `matt_slide` (
  `slide_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slide_cid` bigint(20) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_pic` varchar(255) DEFAULT NULL,
  `slide_url` varchar(255) DEFAULT NULL,
  `slide_des` varchar(255) DEFAULT NULL,
  `slide_content` text,
  `slide_status` int(2) NOT NULL DEFAULT '1',
  `listorder` int(10) DEFAULT '0',
  PRIMARY KEY (`slide_id`),
  KEY `slide_cid` (`slide_cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_slide
-- ----------------------------

-- ----------------------------
-- Table structure for `matt_slide_cat`
-- ----------------------------
DROP TABLE IF EXISTS `matt_slide_cat`;
CREATE TABLE `matt_slide_cat` (
  `cid` bigint(20) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_idname` varchar(255) NOT NULL,
  `cat_remark` text,
  `cat_status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cid`),
  KEY `cat_idname` (`cat_idname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_slide_cat
-- ----------------------------

-- ----------------------------
-- Table structure for `matt_student`
-- ----------------------------
DROP TABLE IF EXISTS `matt_student`;
CREATE TABLE `matt_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL COMMENT '籍贯',
  `age` varchar(100) DEFAULT NULL COMMENT '年龄',
  `education` varchar(100) DEFAULT NULL COMMENT '学历',
  `book` varchar(200) DEFAULT NULL,
  `experience` varchar(300) DEFAULT NULL COMMENT '工作经历',
  `add_time` datetime DEFAULT NULL,
  `img` varchar(700) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_student
-- ----------------------------
INSERT INTO `matt_student` VALUES ('1', '10000001', '安徽', '43岁', '高中', '1', '1', '2015-05-06 10:18:55', '/education/data/upload/55497a085b0a1.jpg');

-- ----------------------------
-- Table structure for `matt_teacher`
-- ----------------------------
DROP TABLE IF EXISTS `matt_teacher`;
CREATE TABLE `matt_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `background` varchar(200) DEFAULT NULL,
  `honour` varchar(200) DEFAULT NULL,
  `had_do` varchar(200) DEFAULT NULL,
  `book` varchar(200) DEFAULT NULL,
  `territory` varchar(300) DEFAULT NULL COMMENT '领域',
  `talk` varchar(300) DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  `img` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_teacher
-- ----------------------------
INSERT INTO `matt_teacher` VALUES ('1', '朱家雄', '美国麻省大学教育硕士学位', '华东师范大学学前教育终身教授，获国务院特殊津贴', '学前教育研究所所长', '《幼儿园课程》《巧虎乐智天地》等', '学前教育基本理论，幼儿园课程，早期儿童保育教育等方面', '', '2015-05-05 15:42:35', '/education/data/upload/554877b57cb03.jpg');
INSERT INTO `matt_teacher` VALUES ('2', '张静芬', '上海医药高等专科学校', '获得市卫生局颁发的30年教龄证书，是学校临床护理专业的资深骨干', '上海交通大学医学院附属卫生学校高级教授', '编写《育婴师》（初级、中级、高级）教材等论著30余本', '临床护理学', '', '2015-05-05 15:48:48', '/education/data/upload/554875ddb9f8c.jpg');

-- ----------------------------
-- Table structure for `matt_terms`
-- ----------------------------
DROP TABLE IF EXISTS `matt_terms`;
CREATE TABLE `matt_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
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
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1发布，0不发布',
  PRIMARY KEY (`term_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_terms
-- ----------------------------
INSERT INTO `matt_terms` VALUES ('1', '校园动态', '', 'article', '', '0', '0', '0-1', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `matt_terms` VALUES ('2', '开班详情', '', 'article', '', '0', '0', '0-2', '', '', '', 'list_class', 'school_show', '0', '1');
INSERT INTO `matt_terms` VALUES ('3', '育儿直通车', '', 'article', '', '1', '0', '0-1-3', '', '', '', 'school_list', 'school_show', '0', '1');
INSERT INTO `matt_terms` VALUES ('4', '师生心得', '', 'article', '', '1', '0', '0-1-4', '', '', '', 'school_list', 'school_show', '0', '1');
INSERT INTO `matt_terms` VALUES ('5', '育婴知识', '', 'article', '', '0', '0', '0-5', '', '', '', 'school_list', 'school_show', '0', '1');
INSERT INTO `matt_terms` VALUES ('6', '最新活动', '', 'article', '', '1', '0', '0-1-6', '', '', '', 'list_active', 'school_show', '0', '1');
INSERT INTO `matt_terms` VALUES ('7', '麦忒校园', '', 'article', '', '0', '0', '0-7', '', '', '', 'list', 'article', '0', '1');
INSERT INTO `matt_terms` VALUES ('8', '早教专家', '', 'article', '', '7', '0', '0-7-8', '', '', '', 'list_teacher', 'show_teacher', '0', '1');
INSERT INTO `matt_terms` VALUES ('10', '教授证书展示', '', 'article', '', '7', '0', '0-7-10', '', '', '', 'list_shu', 'article', '0', '1');
INSERT INTO `matt_terms` VALUES ('11', '客户分享', '', 'article', '', '1', '0', '0-1-11', '', '', '', 'school_list', 'school_show', '0', '1');

-- ----------------------------
-- Table structure for `matt_term_relationships`
-- ----------------------------
DROP TABLE IF EXISTS `matt_term_relationships`;
CREATE TABLE `matt_term_relationships` (
  `tid` bigint(20) NOT NULL AUTO_INCREMENT,
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT 'posts表里文章id',
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
  `listorder` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1发布，0不发布',
  PRIMARY KEY (`tid`),
  KEY `term_taxonomy_id` (`term_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_term_relationships
-- ----------------------------
INSERT INTO `matt_term_relationships` VALUES ('1', '5', '3', '0', '1');
INSERT INTO `matt_term_relationships` VALUES ('2', '6', '4', '0', '1');
INSERT INTO `matt_term_relationships` VALUES ('3', '7', '11', '0', '1');
INSERT INTO `matt_term_relationships` VALUES ('4', '8', '6', '0', '1');
INSERT INTO `matt_term_relationships` VALUES ('5', '9', '2', '0', '1');

-- ----------------------------
-- Table structure for `matt_users`
-- ----------------------------
DROP TABLE IF EXISTS `matt_users`;
CREATE TABLE `matt_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `user_pass` varchar(64) NOT NULL DEFAULT '' COMMENT '登录密码；matt_password加密',
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
  `user_type` smallint(1) DEFAULT '1' COMMENT '用户类型，1:admin ;2:会员',
  PRIMARY KEY (`id`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_users
-- ----------------------------
INSERT INTO `matt_users` VALUES ('1', 'admin', '420e878fb142baa408736e9a56dc887e48a095e685820685', 'admin', 'a526584713@qq.com', '', null, '0', null, null, '127.0.0.1', '2015-05-09 14:59:02', '2015-05-05 11:06:56', '', '1', '0', '1');

-- ----------------------------
-- Table structure for `matt_user_favorites`
-- ----------------------------
DROP TABLE IF EXISTS `matt_user_favorites`;
CREATE TABLE `matt_user_favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` bigint(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT '收藏内容的标题',
  `url` varchar(255) DEFAULT NULL COMMENT '收藏内容的原文地址，不带域名',
  `description` varchar(500) DEFAULT NULL COMMENT '收藏内容的描述',
  `table` varchar(50) DEFAULT NULL COMMENT '收藏实体以前所在表，不带前缀',
  `object_id` int(11) DEFAULT NULL COMMENT '收藏内容原来的主键id',
  `createtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_user_favorites
-- ----------------------------

-- ----------------------------
-- Table structure for `matt_vcr`
-- ----------------------------
DROP TABLE IF EXISTS `matt_vcr`;
CREATE TABLE `matt_vcr` (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `type` int(10) DEFAULT NULL COMMENT '1为专家视频   2为学员视频',
  `about` varchar(200) DEFAULT NULL,
  `img` varchar(300) NOT NULL,
  `media` varchar(200) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`vid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of matt_vcr
-- ----------------------------
INSERT INTO `matt_vcr` VALUES ('2', '测试第一个vcr', '1', '<p>发生大幅度双方的首发第三方的身份的所得税</p>', '/education/data/upload/554db7a4d3293.gif', 'http://www.matteducation.com/upload/201281014443023357.flv', '2015-05-09 15:31:33');
