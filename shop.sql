/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-07-13 17:23:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sf_admin
-- ----------------------------
DROP TABLE IF EXISTS `sf_admin`;
CREATE TABLE `sf_admin` (
  `admin_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `user_name` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `email` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login` int(11) NOT NULL DEFAULT '0',
  `last_ip` varchar(15) NOT NULL DEFAULT '',
  `role_id` smallint(5) DEFAULT NULL COMMENT '角色id',
  PRIMARY KEY (`admin_id`),
  KEY `user_name` (`user_name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sf_admin
-- ----------------------------
INSERT INTO `sf_admin` VALUES ('1', 'admin', '123', '581fe54b23414a83440114fb92c79794', '0000-00-00 00:00:00', '0', '', '1');

-- ----------------------------
-- Table structure for sf_admin_log
-- ----------------------------
DROP TABLE IF EXISTS `sf_admin_log`;
CREATE TABLE `sf_admin_log` (
  `log_id` bigint(16) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` int(10) DEFAULT NULL,
  `log_info` varchar(255) DEFAULT NULL,
  `log_ip` varchar(30) DEFAULT NULL,
  `log_url` varchar(50) DEFAULT NULL,
  `log_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sf_admin_log
-- ----------------------------
INSERT INTO `sf_admin_log` VALUES ('1', '1', '后台登录', '127.0.0.1', '/task/index.php/Admin/Admin/login', '1468394205');
INSERT INTO `sf_admin_log` VALUES ('2', '1', '后台登录', '127.0.0.1', '/task/index.php/Admin/Admin/login', '1468394400');
INSERT INTO `sf_admin_log` VALUES ('3', '1', '后台登录', '127.0.0.1', '/task/index.php/Admin/Admin/login', '1468394838');

-- ----------------------------
-- Table structure for sf_admin_node
-- ----------------------------
DROP TABLE IF EXISTS `sf_admin_node`;
CREATE TABLE `sf_admin_node` (
  `mod_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `module` enum('top','menu','module') DEFAULT 'module',
  `level` tinyint(1) DEFAULT '3',
  `ctl` varchar(20) DEFAULT '',
  `act` varchar(30) DEFAULT '',
  `title` varchar(20) DEFAULT '',
  `visible` tinyint(1) DEFAULT '1',
  `parent_id` smallint(6) DEFAULT '0',
  `orderby` smallint(6) DEFAULT '50',
  `icon` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`mod_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of sf_admin_node
-- ----------------------------

-- ----------------------------
-- Table structure for sf_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `sf_admin_role`;
CREATE TABLE `sf_admin_role` (
  `role_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色ID',
  `role_name` varchar(30) DEFAULT NULL COMMENT '角色名称',
  `act_list` text COMMENT '权限列表',
  `role_desc` varchar(255) DEFAULT NULL COMMENT '角色描述',
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of sf_admin_role
-- ----------------------------
