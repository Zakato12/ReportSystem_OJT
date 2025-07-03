/*
Navicat MySQL Data Transfer

Source Server         : localdatabases
Source Server Version : 50018
Source Host           : localhost:3306
Source Database       : ticketingsystem_db

Target Server Type    : MYSQL
Target Server Version : 50018
File Encoding         : 65001

Date: 2025-07-03 15:15:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `accounts`
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
INSERT INTO `accounts` VALUES ('2', 'UM', '1');
INSERT INTO `accounts` VALUES ('3', 'red', '1');
INSERT INTO `accounts` VALUES ('4', 'HATDOG', '1');
INSERT INTO `accounts` VALUES ('5', 'nyeng', '1');
INSERT INTO `accounts` VALUES ('6', 'NESMU', '1');

-- ----------------------------
-- Table structure for `tickets`
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
INSERT INTO `tickets` VALUES ('1', '2025-06-27 09:50:46', null, '1', '1', 'kaniii po', '2', 'asdsadsa', null, '1', '2025-07-02 18:01:08', null, '2', null, '2');
INSERT INTO `tickets` VALUES ('2', '2025-06-27 09:50:47', null, '1', '2', 'makdeb', '2', 'asdsadsa', null, '1', null, null, '3', null, '1');
INSERT INTO `tickets` VALUES ('3', '2025-06-28 18:12:07', null, '1', '1', 'fffff', '3', 'asda', null, '1', '2025-07-01 08:21:35', '2025-07-01 16:29:38', '2', null, '2');
INSERT INTO `tickets` VALUES ('4', '2025-06-28 19:22:58', '2025-07-01 08:00:21', '1', '1', 'asdsadada', '5', 'fffffffffff', null, '1', '2025-06-29 03:23:15', '2025-07-01 07:58:18', '2', '2025-07-01 07:59:16', '2');
INSERT INTO `tickets` VALUES ('5', '2025-06-28 19:24:21', null, '2', '1', 'cccccccccc', '2', 'zxczxczxc', null, '1', '2025-06-28 19:24:21', null, '2', null, '1');
INSERT INTO `tickets` VALUES ('6', '2025-06-30 09:54:54', null, '1', '2', 'hello', '3', 'sad ni sya', null, '1', '2025-07-01 07:45:18', '2025-07-01 07:55:07', '2', null, '1');
INSERT INTO `tickets` VALUES ('7', '2025-06-30 10:26:28', null, '0', '0', 'complainant', '0', 'description', null, '1', null, null, '0', null, '1');
INSERT INTO `tickets` VALUES ('8', '2025-06-30 12:55:28', null, '2', '1', 'try', '2', 'ssaaaddd', null, '1', '2025-06-30 12:55:28', null, '2', null, '1');
INSERT INTO `tickets` VALUES ('9', '2025-06-30 12:56:38', null, '3', '1', 'sadadadada', '2', 'sssssssssssss', null, '1', '2025-06-30 12:56:38', null, '2', null, '2');
INSERT INTO `tickets` VALUES ('10', '2025-06-30 12:57:09', null, '3', '1', 'sadadadada', '2', 'ffffffffffffff', null, '1', '2025-06-30 12:57:09', null, '2', null, '1');
INSERT INTO `tickets` VALUES ('11', '2025-06-30 12:57:33', '2025-07-01 07:48:54', '1', '2', 'ccxzcxzc', '5', 'asda', null, '1', '2025-07-01 07:47:05', '2025-07-01 07:48:37', '2', '2025-07-01 07:48:46', '1');
INSERT INTO `tickets` VALUES ('12', '2025-06-30 12:58:55', null, '0', '0', 'complainant', '0', 'description', null, '1', null, null, '0', null, '1');
INSERT INTO `tickets` VALUES ('13', '2025-07-01 08:02:31', null, '1', '1', 'bbbbbbb', '1', 'baboy daw ka', null, '1', null, null, null, null, '1');
INSERT INTO `tickets` VALUES ('14', '2025-07-01 16:45:04', null, '3', '2', 'cjp', '1', 'aaaaaa', null, '1', null, null, null, null, '1');
INSERT INTO `tickets` VALUES ('15', '2025-07-02 19:28:06', '2025-07-02 19:29:36', '1', '2', 'cjp', '5', 'try', null, '1', '2025-07-02 19:28:53', '2025-07-02 19:29:15', '2', '2025-07-02 19:29:26', '1');

-- ----------------------------
-- Table structure for `ticket_status`
-- ----------------------------
DROP TABLE IF EXISTS `ticket_status`;
CREATE TABLE `ticket_status` (
  `ticket_status_id` int(11) NOT NULL auto_increment,
  `ticket_status` varchar(255) default NULL,
  PRIMARY KEY  (`ticket_status_id`)
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
-- Table structure for `urgency_status`
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
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
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
INSERT INTO `users` VALUES ('3', 'cristine', 'cristine', '2025-07-01 15:00:26', '2', 'cris', 't', 'ine');
INSERT INTO `users` VALUES ('4', 'uwu@gmail.com', '$2y$12$qkzhRgu7Hc53wp2PhJ5XH.dH9I.ngbUv//BNoxhiM1j4z3ylgDRq6', '2025-07-02 14:52:00', '2', 'haha', 'meh', 'uwu');
INSERT INTO `users` VALUES ('5', 'manatad@gmail.com', '$2y$12$BetIS2jUjPFKEYaPYpRniObMtaRgMLAwbIHcYuquVrLChJTusaaOi', '2025-07-02 15:07:46', '2', 'makdeb', 'labanon', 'manatad');
INSERT INTO `users` VALUES ('6', 'manatad@gmail.com', '$2y$12$0LuFQiTYhNtap4yrgSNNheCXKUyRzwRypklis8U8yAeV2kRCvNixq', '2025-07-02 15:25:16', '2', 'makdeb', 'labanon', 'manatad');
INSERT INTO `users` VALUES ('7', 'manatad@gmail.com', '$2y$12$JvS2A6DVlvjgC11Q3gtujupA1rY8ZhfWf8I7tbQjpZuybr6KK3z5C', '2025-07-02 15:25:40', '2', 'makdeb', 'labanon', 'manatad');
INSERT INTO `users` VALUES ('8', 'manatad@gmail.com', '$2y$12$Z3mtAYN7CrtCmtclZ1re3OPtzzlgqTNcKjw02Dmu/H7fKyOjA15oi', '2025-07-02 15:25:54', '2', 'makdeb', 'labanon', 'manatad');
INSERT INTO `users` VALUES ('9', 'manatad@gmail.com', 'adsd', '2025-07-02 15:49:03', '2', 'adad', 'labanon', 'manatad');
INSERT INTO `users` VALUES ('10', 'manatad@gmail.com', 'makdeb', '2025-07-02 16:08:01', '2', 'dasda', 'asd', 'manatad');
INSERT INTO `users` VALUES ('11', 'manatad@gmail.com', 'makdeb', '2025-07-02 16:08:16', '2', 'ad', 'asd', 'manatad');
INSERT INTO `users` VALUES ('12', 'uwu@gmail.com', 'sadasdasd', '2025-07-02 16:09:50', '2', 'haha', 'meh', 'uwu');
INSERT INTO `users` VALUES ('13', 'trynkao', '12345678', '2025-07-02 16:10:28', '2', 'sad', 'ni', 'sya');
INSERT INTO `users` VALUES ('14', 'kaniha', 'kaniha', '2025-07-02 16:13:31', '2', 'makdeb', 'makdeb', 'labanon');
INSERT INTO `users` VALUES ('15', 'c@gmail', 'sssss', '2025-07-02 17:25:29', '2', 'aaaa', 'nyeng', 'nye');

-- ----------------------------
-- Table structure for `user_roles`
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
