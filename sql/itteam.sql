/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : itteam

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-11-15 23:24:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for itteam_choose
-- ----------------------------
DROP TABLE IF EXISTS `itteam_choose`;
CREATE TABLE `itteam_choose` (
  `chooseId` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `courseId` mediumint(8) NOT NULL,
  `chooseMaxNum` int(16) DEFAULT NULL,
  `chooseDate` date DEFAULT NULL,
  `chooseStartTime` time DEFAULT NULL,
  `chooseEndTime` time DEFAULT NULL,
  `chooseText` varchar(255) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `type` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`chooseId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for itteam_class
-- ----------------------------
DROP TABLE IF EXISTS `itteam_class`;
CREATE TABLE `itteam_class` (
  `classId` mediumint(8) NOT NULL AUTO_INCREMENT,
  `className` varchar(255) NOT NULL,
  `status` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`classId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for itteam_course
-- ----------------------------
DROP TABLE IF EXISTS `itteam_course`;
CREATE TABLE `itteam_course` (
  `courseId` mediumint(8) NOT NULL AUTO_INCREMENT,
  `classId` mediumint(8) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `courseTeacher` varchar(255) NOT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `type` tinyint(2) DEFAULT NULL,
  `coursetext` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`courseId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for itteam_student
-- ----------------------------
DROP TABLE IF EXISTS `itteam_student`;
CREATE TABLE `itteam_student` (
  `learnId` mediumint(9) NOT NULL AUTO_INCREMENT,
  `studentId` int(9) NOT NULL,
  `time` datetime DEFAULT NULL,
  `chooseId` mediumint(8) DEFAULT NULL,
  PRIMARY KEY (`learnId`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for itteam_user
-- ----------------------------
DROP TABLE IF EXISTS `itteam_user`;
CREATE TABLE `itteam_user` (
  `studentId` int(9) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(2) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`studentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
