/*
Navicat MySQL Data Transfer

Source Server         : localdatabases
Source Server Version : 50018
Source Host           : localhost:3306
Source Database       : ticketingsystem_db

Target Server Type    : MYSQL
Target Server Version : 50018
File Encoding         : 65001

Date: 2025-06-26 16:15:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for accounts
-- ----------------------------
DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL auto_increment,
  `account_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY  (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of accounts
-- ----------------------------
INSERT INTO `accounts` VALUES ('1', 'CMC', '1');

-- ----------------------------
-- Table structure for tickets
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL auto_increment,
  `ticket_date_created` datetime NOT NULL,
  `ticket_date_completed` datetime default NULL,
  `urgency_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `complainant_name` varchar(255) NOT NULL,
  `ticket_status_id` int(11) NOT NULL,
  `ticket_description` mediumtext,
  `ticket_remarks` mediumtext,
  `ticket_created_by` int(11) NOT NULL,
  `ticket_date_assigned` datetime default NULL,
  `ticket_date_inprogress` datetime default NULL,
  `ticket_assigned_to` int(11) default NULL,
  `ticket_date_validate` datetime default NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY  (`ticket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tickets
-- ----------------------------

-- ----------------------------
-- Table structure for ticket_status
-- ----------------------------
DROP TABLE IF EXISTS `ticket_status`;
CREATE TABLE `ticket_status` (
  `tickeit_status_id` int(11) NOT NULL auto_increment,
  `ticket_status` varchar(255) default NULL,
  PRIMARY KEY  (`tickeit_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ticket_status
-- ----------------------------
INSERT INTO `ticket_status` VALUES ('1', 'Unassigned');
INSERT INTO `ticket_status` VALUES ('2', 'Assigned');
INSERT INTO `ticket_status` VALUES ('3', 'In progress');
INSERT INTO `ticket_status` VALUES ('4', 'For Verification');
INSERT INTO `ticket_status` VALUES ('5', 'Closed');

-- ----------------------------
-- Table structure for urgency_status
-- ----------------------------
DROP TABLE IF EXISTS `urgency_status`;
CREATE TABLE `urgency_status` (
  `urgency_id` int(11) NOT NULL auto_increment,
  `urgency_lvl` varchar(255) NOT NULL,
  PRIMARY KEY  (`urgency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of urgency_status
-- ----------------------------
INSERT INTO `urgency_status` VALUES ('1', 'Low');
INSERT INTO `urgency_status` VALUES ('2', 'Medium');
INSERT INTO `urgency_status` VALUES ('3', 'High');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `created _at` datetime NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_mname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'infinit-dev', 'infinit-dev', '2025-06-20 11:24:17', '1', 'Dev', 'At', 'Infinit');
INSERT INTO `users` VALUES ('2', 'makdeb', 'makdeb', '2025-06-22 18:47:22', '2', 'makname', 'lname', 'maname');

-- ----------------------------
-- Table structure for user_roles
-- ----------------------------
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles` (
  `role_id` int(11) NOT NULL auto_increment,
  `role_name` varchar(255) default NULL,
  PRIMARY KEY  (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_roles
-- ----------------------------
INSERT INTO `user_roles` VALUES ('1', 'admin');
INSERT INTO `user_roles` VALUES ('2', 'programmer');
