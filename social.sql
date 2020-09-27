/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : social

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2019-09-23 13:49:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for db_comment
-- ----------------------------
DROP TABLE IF EXISTS `db_comment`;
CREATE TABLE `db_comment` (
  `id` int(11) NOT NULL auto_increment COMMENT '评论表主键',
  `news_id` int(11) default NULL COMMENT '被评论新闻id',
  `user_id` int(11) default NULL COMMENT '评论用户id',
  `message` mediumtext COMMENT '评论内容',
  `addtime` varchar(255) default NULL COMMENT '评论发表时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_comment
-- ----------------------------
INSERT INTO `db_comment` VALUES ('68', '113', '11', '领导说的对', '1568987587');

-- ----------------------------
-- Table structure for db_friend
-- ----------------------------
DROP TABLE IF EXISTS `db_friend`;
CREATE TABLE `db_friend` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) default NULL,
  `friend_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_friend
-- ----------------------------
INSERT INTO `db_friend` VALUES ('4', '8', '2');
INSERT INTO `db_friend` VALUES ('5', '11', '8');

-- ----------------------------
-- Table structure for db_news
-- ----------------------------
DROP TABLE IF EXISTS `db_news`;
CREATE TABLE `db_news` (
  `id` int(11) NOT NULL auto_increment COMMENT '主键',
  `title` varchar(150) default NULL COMMENT '标题',
  `message` mediumtext COMMENT '内容',
  `addtime` varchar(50) default NULL COMMENT '发布时间',
  `type` varchar(50) default NULL COMMENT '新闻分类',
  `author` varchar(50) default NULL COMMENT '作者',
  `nums` varchar(50) default '0' COMMENT '点赞数',
  `pic` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_news
-- ----------------------------
INSERT INTO `db_news` VALUES ('107', '开学了', '开学愉快！', '1568970230', '0', null, '0', null);
INSERT INTO `db_news` VALUES ('110', '校园十大歌手比赛开始了！', '校园十大歌手比赛开始了，赶快来报名吧！！', '1568971791', '4', '7', '0', null);
INSERT INTO `db_news` VALUES ('112', '校园篮球赛开始了！', '快来报名吧！！', '1568972670', '1', '8', '2', null);
INSERT INTO `db_news` VALUES ('113', '下周开始进行卫生大扫除11', '下周个专业进行卫生大扫除11\r\n大一：东校区11\r\n大二：西校区11', '1568987318', '0', '1', '1', null);
INSERT INTO `db_news` VALUES ('115', '下周开始进行大扫除', '各位同学注意了，下周大扫除，学校领导会检查', '1568987412', '3', '11', '0', null);
INSERT INTO `db_news` VALUES ('117', '111', '111', '1569217130', '0', '1', '0', 'ad_1569217125.png');
INSERT INTO `db_news` VALUES ('118', '1', '', '1569217242', '0', '1', '0', 'pic_1569217224.png');
INSERT INTO `db_news` VALUES ('119', '11', '11', '1569217503', '1', '10', '0', null);
INSERT INTO `db_news` VALUES ('120', '22', '22', '1569217570', '1', '10', '0', 'pic_1569217569.png');
INSERT INTO `db_news` VALUES ('121', '2233', '3333', '1569217601', '1', '10', '0', 'pic_1569217595.png');

-- ----------------------------
-- Table structure for db_user
-- ----------------------------
DROP TABLE IF EXISTS `db_user`;
CREATE TABLE `db_user` (
  `id` int(11) NOT NULL auto_increment COMMENT '管理员表主键',
  `name` varchar(50) default NULL COMMENT '管理员名称',
  `password` varchar(50) default NULL COMMENT '管理员密码',
  `level` varchar(255) default '2',
  `label` varchar(255) default NULL COMMENT '1体育，2学习 3生活 4音乐',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_user
-- ----------------------------
INSERT INTO `db_user` VALUES ('1', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', '1', null);
INSERT INTO `db_user` VALUES ('2', 'test', '098f6bcd4621d373cade4e832627b4f6', '2', '1,2,4');
INSERT INTO `db_user` VALUES ('8', '李四', 'c4ca4238a0b923820dcc509a6f75849b', '2', '1,2,3,4');
INSERT INTO `db_user` VALUES ('7', '张三', 'c4ca4238a0b923820dcc509a6f75849b', '2', '2,3');
INSERT INTO `db_user` VALUES ('11', 'nec', 'c4ca4238a0b923820dcc509a6f75849b', '2', '1,2,3');
INSERT INTO `db_user` VALUES ('10', 'coco', 'c4ca4238a0b923820dcc509a6f75849b', '2', '1,2,3');
