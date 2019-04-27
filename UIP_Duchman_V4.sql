/*
 Navicat MySQL Data Transfer

 Source Server         : UIP_Duchman
 Source Server Type    : MySQL
 Source Server Version : 50719
 Source Host           : localhost:3306
 Source Schema         : UIP_Duchman

 Target Server Type    : MySQL
 Target Server Version : 50719
 File Encoding         : 65001

 Date: 24/02/2019 22:29:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for Bartender
-- ----------------------------
DROP TABLE IF EXISTS `Bartender`;
CREATE TABLE `Bartender` (
  `Bar_id` int(11) NOT NULL,
  `Bar_username` varchar(255) DEFAULT NULL,
  `Bar_pwd` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Bar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of Bartender
-- ----------------------------
BEGIN;
INSERT INTO `Bartender` VALUES (1, 'Tired001', '1331');
INSERT INTO `Bartender` VALUES (2, '484Ford', '4884');
COMMIT;

-- ----------------------------
-- Table structure for Beverage
-- ----------------------------
DROP TABLE IF EXISTS `Beverage`;
CREATE TABLE `Beverage` (
  `B_id` int(255) NOT NULL,
  `C_id` int(11) DEFAULT NULL,
  `b_name` varchar(255) DEFAULT NULL,
  `storage` varchar(255) DEFAULT NULL,
  `price(sell)` int(255) DEFAULT NULL,
  `cost` int(10) DEFAULT NULL,
  `Alcohol level` varchar(255) DEFAULT NULL,
  `ingredient` varchar(255) DEFAULT NULL,
  `package` varchar(255) DEFAULT NULL,
  `producer` varchar(255) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `kosher` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`B_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of Beverage
-- ----------------------------
BEGIN;
INSERT INTO `Beverage` VALUES (101, 1, 'Renat', 100, 203, NULL, '37.5%', NULL, 'Flaska', 'Pernod Ricard', 'Pernod Ricard Sweden AB', '0');
INSERT INTO `Beverage` VALUES (102, 2, 'Renat', 20, 110, NULL, '37.5%', NULL, 'Flaska', 'Pernod Ricard', 'Pernod Ricard Sweden AB', '0');
INSERT INTO `Beverage` VALUES (301, 7, 'Explorer Vodka', 30, 188, NULL, '37.5%', NULL, 'Flaska', 'Altia Sweden AB', 'Altia Sweden AB', '0');
INSERT INTO `Beverage` VALUES (302, 8, 'Explorer Vodka', 100, 104, NULL, '37.5%', NULL, 'Flaska', 'Altia Sweden AB', 'Altia Sweden AB', '0');
INSERT INTO `Beverage` VALUES (401, 6, 'Kronvodka', 50, 219, NULL, '40%', NULL, 'Flaska', 'Altia', 'Altia Sweden AB', '0');
INSERT INTO `Beverage` VALUES (402, 5, 'Kronvodka', 50, 119, NULL, '40%', NULL, 'Flaska', 'Altia', 'Altia Sweden AB', '0');
INSERT INTO `Beverage` VALUES (601, 7, 'Svedka', 33, 229, NULL, '37.5%', NULL, 'Flaska', 'L.O. Smith AB', 'Cask Sweden AB', '0');
INSERT INTO `Beverage` VALUES (701, 8, 'Hallands FlÃ¤der', 0, 239, NULL, '38%', NULL, 'Flaska', 'Altia', 'Altia Sweden AB', '0');
INSERT INTO `Beverage` VALUES (702, 4, 'Hallands FlÃ¤der', 2, 130, NULL, '38%', NULL, 'Flaska', 'Altia', 'Altia Sweden AB', '0');
INSERT INTO `Beverage` VALUES (801, 7, 'Nils Oscar', 90, 260, NULL, '41.5%', NULL, 'Flaska', 'Nils Oscar Company', 'The Nils Oscar Company AB', '0');
COMMIT;

-- ----------------------------
-- Table structure for Category
-- ----------------------------
DROP TABLE IF EXISTS `Category`;
CREATE TABLE `Category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`c_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of Category
-- ----------------------------
BEGIN;
INSERT INTO `Category` VALUES (1, 'Grappa och Marc, Grappa');
INSERT INTO `Category` VALUES (2, 'Kryddad sprit');
INSERT INTO `Category` VALUES (3, 'Okryddad sprit');
INSERT INTO `Category` VALUES (4, 'Sprit');
INSERT INTO `Category` VALUES (5, 'Cognac');
INSERT INTO `Category` VALUES (6, 'Whisky, Malt');
INSERT INTO `Category` VALUES (7, 'Beer');
INSERT INTO `Category` VALUES (8, 'Wine');
COMMIT;

-- ----------------------------
-- Table structure for Drink list
-- ----------------------------
DROP TABLE IF EXISTS `Drink list`;
CREATE TABLE `Drink list` (
  `No.` varchar(255) NOT NULL,
  `O_id` int(11) DEFAULT NULL,
  `B_id` int(11) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`No.`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of Drink list
-- ----------------------------
BEGIN;
INSERT INTO `Drink list` VALUES ('1120801', 334, 101, '1');
INSERT INTO `Drink list` VALUES ('1125001', 330, 101, '2');
INSERT INTO `Drink list` VALUES ('1128101', 329, 301, '2');
INSERT INTO `Drink list` VALUES ('1129801', 332, 302, '2');
INSERT INTO `Drink list` VALUES ('1134103', 339, 301, '2');
INSERT INTO `Drink list` VALUES ('1144703', 327, 302, '2');
INSERT INTO `Drink list` VALUES ('1152803', 328, 401, '4');
INSERT INTO `Drink list` VALUES ('1159803', 326, 401, '2');
INSERT INTO `Drink list` VALUES ('1199403', 304, 601, '4');
INSERT INTO `Drink list` VALUES ('137901', 338, 701, '3');
INSERT INTO `Drink list` VALUES ('142003', 319, 701, '2');
INSERT INTO `Drink list` VALUES ('148001', 337, 301, '2');
INSERT INTO `Drink list` VALUES ('149003', 317, 101, '4');
INSERT INTO `Drink list` VALUES ('149803', 321, 102, '2');
INSERT INTO `Drink list` VALUES ('151503', 333, 302, '24');
INSERT INTO `Drink list` VALUES ('153803', 325, 401, '2');
INSERT INTO `Drink list` VALUES ('155701', 335, 601, '1');
INSERT INTO `Drink list` VALUES ('156103', 302, 701, '3');
INSERT INTO `Drink list` VALUES ('157701', 331, 801, '1');
INSERT INTO `Drink list` VALUES ('167903', 340, 401, '3');
COMMIT;

-- ----------------------------
-- Table structure for Order list
-- ----------------------------
DROP TABLE IF EXISTS `Order list`;
CREATE TABLE `Order list` (
  `O_id` int(11) NOT NULL,
  `customer_number` int(11) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `VIP_id` int(11) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `served` varchar(255) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `Bar_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`O_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of Order list
-- ----------------------------
BEGIN;
INSERT INTO `Order list` VALUES (1, NULL, '30', 16, NULL, NULL, '1900-12-20 17:48:25', 2);
INSERT INTO `Order list` VALUES (2, NULL, '-325', 17, NULL, NULL, '1900-12-20 17:51:07', 17);
INSERT INTO `Order list` VALUES (3, NULL, '20', 22, NULL, NULL, '1900-12-20 18:02:29', 16);
INSERT INTO `Order list` VALUES (4, NULL, '-225', 2, NULL, NULL, '1900-12-20 18:07:03', 2);
INSERT INTO `Order list` VALUES (5, NULL, '450', 2, NULL, NULL, '1900-12-20 18:07:59', 2);
INSERT INTO `Order list` VALUES (6, NULL, '60', 18, NULL, NULL, '1900-12-20 18:22:01', 16);
INSERT INTO `Order list` VALUES (7, NULL, '20', 22, NULL, NULL, '1900-12-20 18:36:58', 16);
INSERT INTO `Order list` VALUES (8, NULL, '50', 20, NULL, NULL, '1900-12-20 19:30:25', 16);
INSERT INTO `Order list` VALUES (9, NULL, '20', 23, NULL, NULL, '1900-12-20 19:42:01', 16);
INSERT INTO `Order list` VALUES (10, NULL, '400', 17, NULL, NULL, '1900-12-20 17:36:07', 16);
INSERT INTO `Order list` VALUES (11, NULL, '-75', 20, NULL, NULL, '1900-12-20 19:48:20', 17);
INSERT INTO `Order list` VALUES (12, NULL, '75', 19, NULL, NULL, '1900-12-20 19:48:40', 17);
INSERT INTO `Order list` VALUES (13, NULL, '200', 24, NULL, NULL, '1900-12-20 21:37:15', 17);
INSERT INTO `Order list` VALUES (14, NULL, '70', 29, NULL, NULL, '1900-12-20 12:05:12', 17);
INSERT INTO `Order list` VALUES (15, NULL, '-70', 17, NULL, NULL, '1900-12-20 12:05:33', 17);
INSERT INTO `Order list` VALUES (16, NULL, '85', 19, NULL, NULL, '1900-12-20 11:22:55', 2);
INSERT INTO `Order list` VALUES (17, NULL, '200', 17, NULL, NULL, '1900-12-20 11:23:10', 2);
INSERT INTO `Order list` VALUES (18, NULL, '1645', 2, NULL, NULL, '1900-12-20 16:04:38', 2);
INSERT INTO `Order list` VALUES (19, NULL, '800', 17, NULL, NULL, '1900-12-20 16:43:48', 17);
INSERT INTO `Order list` VALUES (20, NULL, '100', 30, NULL, NULL, '1900-12-20 17:50:02', 17);
INSERT INTO `Order list` VALUES (21, NULL, '-40', 17, NULL, NULL, '1900-12-20 20:49:22', 17);
INSERT INTO `Order list` VALUES (22, NULL, '40', 25, NULL, NULL, '1900-12-20 20:50:29', 17);
INSERT INTO `Order list` VALUES (23, NULL, '1000', 16, NULL, NULL, '1900-12-20 12:22:29', 17);
INSERT INTO `Order list` VALUES (24, NULL, '-1000', 17, NULL, NULL, '1900-12-20 12:22:38', 17);
INSERT INTO `Order list` VALUES (25, NULL, '100', 31, NULL, NULL, '1900-12-20 17:23:05', 17);
INSERT INTO `Order list` VALUES (26, NULL, '30', 29, NULL, NULL, '1900-12-20 17:31:25', 17);
INSERT INTO `Order list` VALUES (27, NULL, '8', 26, NULL, NULL, '1900-12-20 17:33:59', 17);
INSERT INTO `Order list` VALUES (28, NULL, '20', 33, NULL, NULL, '1900-12-20 18:24:15', 17);
INSERT INTO `Order list` VALUES (29, NULL, '20', 34, NULL, NULL, '1900-12-20 18:27:28', 17);
INSERT INTO `Order list` VALUES (30, NULL, '20', 33, NULL, NULL, '1900-12-20 18:58:28', 17);
INSERT INTO `Order list` VALUES (31, NULL, '1000', 25, NULL, NULL, '1900-12-20 14:20:07', 2);
INSERT INTO `Order list` VALUES (32, NULL, '50', 29, NULL, NULL, '1900-12-20 15:35:49', 2);
INSERT INTO `Order list` VALUES (33, NULL, '-25', 26, NULL, NULL, '1900-12-20 17:46:44', 2);
INSERT INTO `Order list` VALUES (34, NULL, '-110', 29, NULL, NULL, '1900-12-20 17:47:44', 2);
INSERT INTO `Order list` VALUES (35, NULL, '20', 35, NULL, NULL, '1900-12-20 17:53:19', 2);
INSERT INTO `Order list` VALUES (36, NULL, '30', 35, NULL, NULL, '1900-12-20 18:56:14', 2);
INSERT INTO `Order list` VALUES (37, NULL, '-305', 17, NULL, NULL, '1900-12-20 23:51:50', 17);
INSERT INTO `Order list` VALUES (38, NULL, '305', 16, NULL, NULL, '1900-12-20 23:51:59', 17);
INSERT INTO `Order list` VALUES (39, NULL, '130', 25, NULL, NULL, '1900-12-20 15:28:38', 2);
INSERT INTO `Order list` VALUES (40, NULL, '175', 25, NULL, NULL, '1900-12-20 15:29:01', 2);
INSERT INTO `Order list` VALUES (41, NULL, '30', 37, NULL, NULL, '1900-12-20 17:21:46', 17);
INSERT INTO `Order list` VALUES (42, NULL, '120', 38, NULL, NULL, '1900-12-20 17:28:43', 17);
INSERT INTO `Order list` VALUES (43, NULL, '15', 40, NULL, NULL, '1900-12-20 17:39:23', 17);
INSERT INTO `Order list` VALUES (46, NULL, '155', 39, NULL, NULL, '1900-12-20 20:14:33', 25);
INSERT INTO `Order list` VALUES (47, NULL, '500', 17, NULL, NULL, '1900-12-20 15:49:24', 17);
INSERT INTO `Order list` VALUES (48, NULL, '-500', 2, NULL, NULL, '1900-12-20 15:49:34', 17);
INSERT INTO `Order list` VALUES (49, NULL, '50', 41, NULL, NULL, '1900-12-20 17:32:41', 17);
INSERT INTO `Order list` VALUES (50, NULL, '15', 40, NULL, NULL, '1900-12-20 17:55:40', 17);
INSERT INTO `Order list` VALUES (51, NULL, '20', 44, NULL, NULL, '1900-12-20 17:56:14', 17);
INSERT INTO `Order list` VALUES (52, NULL, '200', 24, NULL, NULL, '1900-12-20 18:21:00', 17);
INSERT INTO `Order list` VALUES (53, NULL, '20', 41, NULL, NULL, '1900-12-20 18:23:54', 25);
INSERT INTO `Order list` VALUES (54, NULL, '80', 39, NULL, NULL, '1900-12-20 19:51:59', 17);
INSERT INTO `Order list` VALUES (55, NULL, '25', 39, NULL, NULL, '1900-12-20 20:13:26', 17);
INSERT INTO `Order list` VALUES (56, NULL, '-160', 17, NULL, NULL, '1900-12-20 22:43:22', 17);
INSERT INTO `Order list` VALUES (57, NULL, '160', 39, NULL, NULL, '1900-12-20 22:43:42', 17);
INSERT INTO `Order list` VALUES (58, NULL, '-500', 2, NULL, NULL, '1900-01-20 10:27:39', 2);
INSERT INTO `Order list` VALUES (59, NULL, '-20', 46, NULL, NULL, '1900-01-20 18:02:50', 2);
INSERT INTO `Order list` VALUES (60, NULL, '-20', 47, NULL, NULL, '1900-01-20 18:32:07', 2);
INSERT INTO `Order list` VALUES (61, NULL, '694', 20, NULL, NULL, '1900-01-20 11:50:03', 2);
INSERT INTO `Order list` VALUES (62, NULL, '20', 24, NULL, NULL, '1900-01-20 19:06:44', 2);
INSERT INTO `Order list` VALUES (63, NULL, '25', 47, NULL, NULL, '1900-01-20 19:51:52', 2);
INSERT INTO `Order list` VALUES (64, NULL, '-10', 17, NULL, NULL, '1900-01-20 21:25:45', 17);
INSERT INTO `Order list` VALUES (65, NULL, '40', 44, NULL, NULL, '1900-01-20 21:33:23', 17);
INSERT INTO `Order list` VALUES (66, NULL, '70', 31, NULL, NULL, '1900-01-20 22:35:09', 17);
INSERT INTO `Order list` VALUES (67, NULL, '300', 39, NULL, NULL, '1900-01-20 23:15:38', 17);
INSERT INTO `Order list` VALUES (68, NULL, '-200', 17, NULL, NULL, '1900-01-20 14:29:32', 17);
INSERT INTO `Order list` VALUES (69, NULL, '-100', 2, NULL, NULL, '1900-01-20 17:50:13', 2);
INSERT INTO `Order list` VALUES (70, NULL, '1851', 25, NULL, NULL, '1900-01-20 14:55:21', 25);
INSERT INTO `Order list` VALUES (71, NULL, '159', 25, NULL, NULL, '1900-01-20 12:57:39', 2);
INSERT INTO `Order list` VALUES (72, NULL, '500', 31, NULL, NULL, '1900-01-20 18:36:07', 25);
INSERT INTO `Order list` VALUES (73, NULL, '25', 21, NULL, NULL, '1900-01-20 18:43:20', 25);
INSERT INTO `Order list` VALUES (74, NULL, '30', 51, NULL, NULL, '1900-01-20 18:49:26', 25);
INSERT INTO `Order list` VALUES (75, NULL, '35', 41, NULL, NULL, '1900-01-20 18:52:44', 25);
INSERT INTO `Order list` VALUES (76, NULL, '30', 52, NULL, NULL, '1900-01-20 19:00:12', 25);
INSERT INTO `Order list` VALUES (77, NULL, '100', 24, NULL, NULL, '1900-01-20 19:00:54', 25);
INSERT INTO `Order list` VALUES (78, NULL, '200', 50, NULL, NULL, '1900-01-20 19:05:06', 25);
INSERT INTO `Order list` VALUES (79, NULL, '50', 53, NULL, NULL, '1900-01-20 19:05:37', 25);
INSERT INTO `Order list` VALUES (80, NULL, '300', 49, NULL, NULL, '1900-01-20 19:06:51', 25);
INSERT INTO `Order list` VALUES (81, NULL, '300', 48, NULL, NULL, '1900-01-20 19:07:02', 25);
INSERT INTO `Order list` VALUES (82, NULL, '20', 21, NULL, NULL, '1900-01-20 20:00:04', 25);
INSERT INTO `Order list` VALUES (83, NULL, '15', 21, NULL, NULL, '1900-01-20 20:28:37', 25);
INSERT INTO `Order list` VALUES (84, NULL, '75', 52, NULL, NULL, '1900-01-20 20:29:32', 25);
INSERT INTO `Order list` VALUES (86, NULL, '2000', 17, NULL, NULL, '1900-01-20 17:39:29', 17);
INSERT INTO `Order list` VALUES (87, NULL, '-2000', 25, NULL, NULL, '1900-01-20 17:39:39', 17);
INSERT INTO `Order list` VALUES (88, NULL, '-80', 45, NULL, NULL, '1900-01-20 21:48:52', 17);
INSERT INTO `Order list` VALUES (89, NULL, '80', 17, NULL, NULL, '1900-01-20 21:49:06', 17);
INSERT INTO `Order list` VALUES (90, NULL, '160', 45, NULL, NULL, '1900-01-20 21:49:55', 17);
INSERT INTO `Order list` VALUES (91, NULL, '-160', 17, NULL, NULL, '1900-01-20 21:50:11', 17);
INSERT INTO `Order list` VALUES (92, NULL, '120', 42, NULL, NULL, '1900-01-20 20:19:50', 17);
INSERT INTO `Order list` VALUES (94, NULL, '100', 30, NULL, NULL, '1900-01-20 17:51:57', 17);
INSERT INTO `Order list` VALUES (95, NULL, '300', 33, NULL, NULL, '1900-01-20 17:52:27', 17);
INSERT INTO `Order list` VALUES (96, NULL, '100', 53, NULL, NULL, '1900-01-20 17:53:50', 17);
INSERT INTO `Order list` VALUES (97, NULL, '80', 37, NULL, NULL, '1900-01-20 18:18:53', 17);
INSERT INTO `Order list` VALUES (98, NULL, '85', 52, NULL, NULL, '1900-01-20 20:02:33', 17);
INSERT INTO `Order list` VALUES (99, NULL, '-7', 17, NULL, NULL, '1900-01-20 20:27:33', 17);
INSERT INTO `Order list` VALUES (100, NULL, '-7', 17, NULL, NULL, '1900-01-20 21:25:22', 17);
INSERT INTO `Order list` VALUES (101, NULL, '40', 52, NULL, NULL, '1900-01-20 23:07:18', 17);
INSERT INTO `Order list` VALUES (102, NULL, '100', 37, NULL, NULL, '1900-01-20 18:11:17', 25);
INSERT INTO `Order list` VALUES (103, NULL, '90', 36, NULL, NULL, '1900-01-20 14:01:54', 25);
INSERT INTO `Order list` VALUES (104, NULL, '195', 25, NULL, NULL, '1900-01-20 16:34:26', 25);
INSERT INTO `Order list` VALUES (105, NULL, '75', 45, NULL, NULL, '1900-01-20 18:53:30', 25);
INSERT INTO `Order list` VALUES (106, NULL, '-28', 17, NULL, NULL, '1900-01-20 22:45:22', 17);
INSERT INTO `Order list` VALUES (107, NULL, '28', 20, NULL, NULL, '1900-01-20 22:45:50', 17);
INSERT INTO `Order list` VALUES (108, NULL, '5', 20, NULL, NULL, '1900-01-20 22:46:02', 17);
INSERT INTO `Order list` VALUES (109, NULL, '200', 57, NULL, NULL, '1900-01-20 17:18:09', 25);
INSERT INTO `Order list` VALUES (110, NULL, '100', 30, NULL, NULL, '1900-01-20 17:23:49', 17);
INSERT INTO `Order list` VALUES (111, NULL, '200', 24, NULL, NULL, '1900-01-20 17:29:17', 17);
INSERT INTO `Order list` VALUES (112, NULL, '100', 62, NULL, NULL, '1900-01-20 19:10:34', 20);
INSERT INTO `Order list` VALUES (113, NULL, '-70', 17, NULL, NULL, '1900-01-20 19:11:20', 17);
INSERT INTO `Order list` VALUES (114, NULL, '70', 53, NULL, NULL, '1900-01-20 19:11:40', 17);
INSERT INTO `Order list` VALUES (115, NULL, '100', 55, NULL, NULL, '1900-01-20 19:28:47', 17);
INSERT INTO `Order list` VALUES (116, NULL, '666', 17, NULL, NULL, '1900-01-20 11:48:46', 17);
INSERT INTO `Order list` VALUES (117, NULL, '-666', 25, NULL, NULL, '1900-01-20 11:49:03', 17);
INSERT INTO `Order list` VALUES (118, NULL, '20', 36, NULL, NULL, '1900-01-20 16:01:23', 25);
INSERT INTO `Order list` VALUES (119, NULL, '1462', 25, NULL, NULL, '1900-01-20 16:02:05', 25);
INSERT INTO `Order list` VALUES (120, NULL, '25', 36, NULL, NULL, '1900-01-20 16:02:36', 25);
INSERT INTO `Order list` VALUES (121, NULL, '100', 57, NULL, NULL, '1900-01-20 17:29:31', 20);
INSERT INTO `Order list` VALUES (122, NULL, '550', 17, NULL, NULL, '1900-01-20 17:31:51', 17);
INSERT INTO `Order list` VALUES (123, NULL, '-120', 24, NULL, NULL, '1900-01-20 01:12:37', 17);
INSERT INTO `Order list` VALUES (124, NULL, '-120', 57, NULL, NULL, '1900-01-20 01:12:53', 17);
INSERT INTO `Order list` VALUES (125, NULL, '-130', 20, NULL, NULL, '1900-01-20 01:13:34', 17);
INSERT INTO `Order list` VALUES (126, NULL, '370', 17, NULL, NULL, '1900-01-20 01:13:52', 17);
INSERT INTO `Order list` VALUES (127, NULL, '-200', 17, NULL, NULL, '1900-01-20 16:37:28', 17);
INSERT INTO `Order list` VALUES (128, NULL, '-150', 17, NULL, NULL, '1900-01-20 18:13:09', 17);
INSERT INTO `Order list` VALUES (129, NULL, '150', 57, NULL, NULL, '1900-01-20 18:13:32', 17);
INSERT INTO `Order list` VALUES (130, NULL, '70', 46, NULL, NULL, '1900-01-20 17:50:13', 2);
INSERT INTO `Order list` VALUES (131, NULL, '200', 53, NULL, NULL, '1900-01-20 18:07:52', 25);
INSERT INTO `Order list` VALUES (132, NULL, '-150', 24, NULL, NULL, '1900-01-20 18:08:11', 25);
INSERT INTO `Order list` VALUES (133, NULL, '150', 25, NULL, NULL, '1900-01-20 18:08:26', 25);
INSERT INTO `Order list` VALUES (134, NULL, '70', 62, NULL, NULL, '1900-01-20 18:45:39', 25);
INSERT INTO `Order list` VALUES (135, NULL, '100', 24, NULL, NULL, '1900-01-20 18:46:24', 25);
INSERT INTO `Order list` VALUES (136, NULL, '-500', 25, NULL, NULL, '1900-01-20 11:00:48', 25);
INSERT INTO `Order list` VALUES (137, NULL, '1158', 20, NULL, NULL, '1900-01-20 11:06:31', 20);
INSERT INTO `Order list` VALUES (138, NULL, '100', 30, NULL, NULL, '1900-01-20 17:42:59', 2);
INSERT INTO `Order list` VALUES (139, NULL, '25', 67, NULL, NULL, '1900-01-20 17:47:07', 2);
INSERT INTO `Order list` VALUES (140, NULL, '20', 69, NULL, NULL, '1900-01-20 18:04:26', 2);
INSERT INTO `Order list` VALUES (141, NULL, '-20', 47, NULL, NULL, '1900-01-20 18:05:56', 2);
INSERT INTO `Order list` VALUES (142, NULL, '400', 52, NULL, NULL, '1900-01-20 18:35:04', 2);
INSERT INTO `Order list` VALUES (143, NULL, '20', 52, NULL, NULL, '1900-01-20 20:33:04', 20);
INSERT INTO `Order list` VALUES (144, NULL, '60', 36, NULL, NULL, '1900-01-20 14:14:50', 25);
INSERT INTO `Order list` VALUES (145, NULL, '129', 25, NULL, NULL, '1900-01-20 14:28:35', 25);
INSERT INTO `Order list` VALUES (146, NULL, '3321', 17, NULL, NULL, '1900-01-20 17:44:26', 25);
INSERT INTO `Order list` VALUES (147, NULL, '245', 27, NULL, NULL, '1900-01-20 17:55:28', 25);
INSERT INTO `Order list` VALUES (148, NULL, '0', 27, NULL, NULL, '1900-01-20 17:55:31', 25);
INSERT INTO `Order list` VALUES (149, NULL, '200', 70, NULL, NULL, '1900-01-20 17:55:49', 25);
INSERT INTO `Order list` VALUES (150, NULL, '-95', 70, NULL, NULL, '1900-01-20 17:56:53', 25);
INSERT INTO `Order list` VALUES (151, NULL, '100', 72, NULL, NULL, '1900-01-20 18:16:59', 25);
INSERT INTO `Order list` VALUES (152, NULL, '200', 29, NULL, NULL, '1900-01-20 18:34:31', 25);
INSERT INTO `Order list` VALUES (153, NULL, '-2000', 17, NULL, NULL, '1900-01-20 20:40:58', 17);
INSERT INTO `Order list` VALUES (154, NULL, '-1000', 17, NULL, NULL, '1900-01-20 22:06:02', 17);
INSERT INTO `Order list` VALUES (155, NULL, '125', 19, NULL, NULL, '1900-01-20 14:32:53', 17);
INSERT INTO `Order list` VALUES (156, NULL, '-125', 17, NULL, NULL, '1900-01-20 14:33:13', 17);
INSERT INTO `Order list` VALUES (157, NULL, '2131', 17, NULL, NULL, '1900-01-20 16:23:18', 17);
INSERT INTO `Order list` VALUES (158, NULL, '-395', 17, NULL, NULL, '1900-01-20 16:23:51', 17);
INSERT INTO `Order list` VALUES (159, NULL, '425', 17, NULL, NULL, '1900-01-20 16:27:59', 17);
INSERT INTO `Order list` VALUES (160, NULL, '200', 33, NULL, NULL, '1900-01-20 15:31:39', 20);
INSERT INTO `Order list` VALUES (161, NULL, '500', 57, NULL, NULL, '1900-01-20 16:19:06', 17);
INSERT INTO `Order list` VALUES (162, NULL, '-500', 17, NULL, NULL, '1900-01-20 16:19:23', 17);
INSERT INTO `Order list` VALUES (163, NULL, '100', 30, NULL, NULL, '1900-01-20 17:32:20', 20);
INSERT INTO `Order list` VALUES (164, NULL, '40', 30, NULL, NULL, '1900-01-20 18:01:20', 20);
INSERT INTO `Order list` VALUES (165, NULL, '150', 74, NULL, NULL, '1900-01-20 18:29:01', 20);
INSERT INTO `Order list` VALUES (166, NULL, '800', 24, NULL, NULL, '1900-01-20 18:35:02', 20);
INSERT INTO `Order list` VALUES (167, NULL, '-500', 17, NULL, NULL, '1900-01-20 21:14:21', 17);
INSERT INTO `Order list` VALUES (168, NULL, '500', 57, NULL, NULL, '1900-01-20 21:14:23', 17);
INSERT INTO `Order list` VALUES (169, NULL, '-500', 57, NULL, NULL, '1900-01-20 21:15:44', 17);
INSERT INTO `Order list` VALUES (170, NULL, '500', 17, NULL, NULL, '1900-01-20 21:16:03', 17);
INSERT INTO `Order list` VALUES (171, NULL, '-1000', 17, NULL, NULL, '1900-01-20 17:13:36', 25);
INSERT INTO `Order list` VALUES (172, NULL, '200', 52, NULL, NULL, '1900-01-20 20:25:54', 25);
INSERT INTO `Order list` VALUES (173, NULL, '50', 26, NULL, NULL, '1900-01-20 17:39:19', 25);
INSERT INTO `Order list` VALUES (174, NULL, '60', 50, NULL, NULL, '1900-01-20 19:23:21', 25);
INSERT INTO `Order list` VALUES (175, NULL, '100', 26, NULL, NULL, '1900-01-20 17:24:41', 2);
INSERT INTO `Order list` VALUES (176, NULL, '20', 76, NULL, NULL, '1900-01-20 17:31:32', 2);
INSERT INTO `Order list` VALUES (177, NULL, '100', 77, NULL, NULL, '1900-01-20 17:39:14', 17);
INSERT INTO `Order list` VALUES (178, NULL, '5', 76, NULL, NULL, '1900-01-20 17:43:14', 2);
INSERT INTO `Order list` VALUES (179, NULL, '100', 30, NULL, NULL, '1900-01-20 17:43:44', 2);
INSERT INTO `Order list` VALUES (180, NULL, '50', 50, NULL, NULL, '1900-01-20 17:45:49', 2);
INSERT INTO `Order list` VALUES (181, NULL, '100', 75, NULL, NULL, '1900-01-20 17:47:58', 25);
INSERT INTO `Order list` VALUES (182, NULL, '30', 73, NULL, NULL, '1900-01-20 18:14:30', 2);
INSERT INTO `Order list` VALUES (183, NULL, '500', 2, NULL, NULL, '1900-01-20 18:28:36', 2);
INSERT INTO `Order list` VALUES (184, NULL, '100', 2, NULL, NULL, '1900-01-20 18:59:34', 2);
INSERT INTO `Order list` VALUES (185, NULL, '100', 52, NULL, NULL, '1900-01-20 21:12:42', 25);
INSERT INTO `Order list` VALUES (186, NULL, '0', 66, NULL, NULL, '1900-01-20 22:22:38', 25);
INSERT INTO `Order list` VALUES (187, NULL, '1085', 25, NULL, NULL, '1900-01-20 15:55:27', 25);
INSERT INTO `Order list` VALUES (188, NULL, '93', 36, NULL, NULL, '1900-01-20 15:56:04', 25);
INSERT INTO `Order list` VALUES (189, NULL, '400', 20, NULL, NULL, '1900-01-20 17:32:29', 25);
INSERT INTO `Order list` VALUES (190, NULL, '10', 36, NULL, NULL, '1900-01-20 17:47:37', 25);
INSERT INTO `Order list` VALUES (191, NULL, '500', 24, NULL, NULL, '1900-01-20 17:47:48', 25);
INSERT INTO `Order list` VALUES (192, NULL, '35', 59, NULL, NULL, '1900-01-20 17:48:45', 25);
INSERT INTO `Order list` VALUES (193, NULL, '120', 77, NULL, NULL, '1900-01-20 18:26:47', 25);
INSERT INTO `Order list` VALUES (194, NULL, '100', 47, NULL, NULL, '1900-01-20 18:32:40', 25);
INSERT INTO `Order list` VALUES (195, NULL, '100', 81, NULL, NULL, '1900-01-20 18:36:19', 25);
INSERT INTO `Order list` VALUES (196, NULL, '40', 50, NULL, NULL, '1900-01-20 18:44:14', 25);
INSERT INTO `Order list` VALUES (197, NULL, '30', 82, NULL, NULL, '1900-01-20 22:44:42', 20);
INSERT INTO `Order list` VALUES (198, NULL, '80', 71, NULL, NULL, '1900-01-20 17:39:34', 25);
INSERT INTO `Order list` VALUES (199, NULL, '400', 81, NULL, NULL, '1900-01-20 17:55:48', 2);
INSERT INTO `Order list` VALUES (200, NULL, '25', 82, NULL, NULL, '1900-01-20 18:10:23', 2);
INSERT INTO `Order list` VALUES (201, NULL, '-65', 25, NULL, NULL, '1900-01-20 23:50:17', 25);
INSERT INTO `Order list` VALUES (202, NULL, '65', 81, NULL, NULL, '1900-01-20 23:50:26', 25);
COMMIT;

-- ----------------------------
-- Table structure for VIP
-- ----------------------------
DROP TABLE IF EXISTS `VIP`;
CREATE TABLE `VIP` (
  `VIP_id` int(11) NOT NULL,
  `VIP_name` varchar(255) DEFAULT NULL,
  `email` text,
  `VIP_pwd` varchar(255) DEFAULT NULL,
  `credits` varchar(255) DEFAULT NULL,
  `VIP_username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`VIP_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of VIP
-- ----------------------------
BEGIN;
INSERT INTO `VIP` VALUES (2, 'Jory', 'jory.assies@it.uu.se', 'b690bc2447d40ea8a6f78345eb979a28', '0', 'jorass');
INSERT INTO `VIP` VALUES (16, 'Pompeius', 'pompeius.graner@it.uu.se', '75f589d96b212b65298b31717a2641c9', '3', 'pomgra');
INSERT INTO `VIP` VALUES (17, 'Svetlana', 'svetlana.torres@it.uu.se', 'f3e3fbabe1b745defda645e5d85a6ac7', '0', 'svetor');
INSERT INTO `VIP` VALUES (18, 'Jancsi', 'jancsi.heiman@it.uu.se', '1db930e727e73c027fc58b5554935be8', '3', 'janhei');
INSERT INTO `VIP` VALUES (19, 'Lara', 'lara.schenck@it.uu.se', '7e3f6af9d6c2385a79b49b03e87234e5', '3', 'larsch');
INSERT INTO `VIP` VALUES (20, 'Hiram', 'hiram.christopherson@it.uu.se', '739d0d428ff99dc043e8955b5a4885bc', '0', 'hirchr');
INSERT INTO `VIP` VALUES (21, 'Maiken', 'maiken.honda@it.uu.se', '849d51ea793c93194952478aa85694af', '3', 'maihon');
INSERT INTO `VIP` VALUES (22, 'Lasse', 'lasse.nicholson@it.uu.se', 'fc4fd22287923f3b47b91fc5f0a85af5', '3', 'lasnic');
INSERT INTO `VIP` VALUES (23, 'Aquilina', 'aquilina.lyndon@it.uu.se', '743444f0ff666f1f90580e7bc3af5099', '3', 'aqulyn');
INSERT INTO `VIP` VALUES (24, 'Ervin', 'ervin.todd@it.uu.se', '2a3db2cc165057da53ef13a348e9787f', '0', 'ervtod');
INSERT INTO `VIP` VALUES (25, 'Saa', 'sasa.kruger@it.uu.se', '971299fa95fe467db26e8bf01864d48d', '0', 'saskru');
INSERT INTO `VIP` VALUES (26, 'Kenan', 'kenan.olguin@it.uu.se', '4ec434994decffa3005b477cc7f992e6', '3', 'kenolg');
INSERT INTO `VIP` VALUES (27, 'Orabela', 'orabela.panders@it.uu.se', 'c0d9251f9af5e7410c6a3932f696c449', '3', 'orapan');
INSERT INTO `VIP` VALUES (28, 'Sulayman', 'sulayman.street@it.uu.se', 'b612f428e4a53386fdb98f6c2164c16c', '3', 'sulstr');
INSERT INTO `VIP` VALUES (29, 'Valeria', 'valeria.pagani@it.uu.se', '9e44cc19b9f726583ccc93fa7908f7fd', '3', 'valpag');
INSERT INTO `VIP` VALUES (30, 'Domen', 'domen.olhouser@it.uu.se', '0f1903b5119eadb705ddba7f2750792f', '3', 'domolh');
INSERT INTO `VIP` VALUES (31, 'Golnar', 'golnar.langley@it.uu.se', '3fb65e8d64eb23e63c71a86ea97951e0', '3', 'gollan');
INSERT INTO `VIP` VALUES (32, 'Hyram', 'hyram.lapointe@it.uu.se', '3c244190040aedd134913562509a5ea0', '3', 'hyrlap');
INSERT INTO `VIP` VALUES (33, 'Katrien', 'katrien.fabre@it.uu.se', '84db5f68a5f2ad3f25bb4445148f434c', '3', 'katfab');
INSERT INTO `VIP` VALUES (34, 'Sulisaw', 'sulisaw.pender@it.uu.se', 'edc2623f10cd4d069e710653f3fc630c', '3', 'sulpen');
INSERT INTO `VIP` VALUES (35, 'Danna', 'danna.schermer@it.uu.se', '9b0c08c58fdeb1b25525ac0cb8187eda', '3', 'dansch');
INSERT INTO `VIP` VALUES (36, 'Jove', 'jove.sitz@it.uu.se', '1fcb15df01a8ca6a442058aca336b324', '3', 'jovsit');
INSERT INTO `VIP` VALUES (37, 'Elektra', 'elektra.pickle@it.uu.se', '27e4426409fa9a5b2917721e3aa636f2', '3', 'elepic');
INSERT INTO `VIP` VALUES (38, 'Muhammed', 'muhammed.toft@it.uu.se', 'c8a458e5af7d03a2477b9d886ac98a77', '3', 'muhtof');
INSERT INTO `VIP` VALUES (39, 'Zuleika', 'zuleika.gorecki@it.uu.se', '94996b177550f4db4fe24ea556cbe75c', '3', 'zulgor');
INSERT INTO `VIP` VALUES (40, 'Ferdinnd', 'ferdinand.crncevic@it.uu.se', '304d1e4306a536c84be6a37fb1b9465e', '3', 'fercrn');
INSERT INTO `VIP` VALUES (41, 'Krystyna', 'krystyna.santiago@it.uu.se', '08ca6afe619c702c9d41f9e14e3ac0a2', '3', 'krysan');
INSERT INTO `VIP` VALUES (42, 'Felix', 'felix.bartos@it.uu.se', '49c0ac6a74af820de877ceb7e9a7161c', '3', 'felbar');
INSERT INTO `VIP` VALUES (43, 'Aamu', 'aamu.stankic@it.uu.se', 'b2a0690e7d39f3bc66874c9ad173e0b6', '3', 'aamsta');
INSERT INTO `VIP` VALUES (44, 'Cezar', 'cezar.newman@it.uu.se', '16676db4c6703f129736d71ce6ee6fef', '3', 'ceznew');
INSERT INTO `VIP` VALUES (45, 'Andrea', 'andrea.darzi@it.uu.se', 'cf1472476c7334d03e3575319a05171b', '3', 'anddar');
INSERT INTO `VIP` VALUES (46, 'Jerry', 'jerry.shizuka@it.uu.se', '018463e83b1b7b0e4487bf59bc3bbbdf', '3', 'jershi');
INSERT INTO `VIP` VALUES (47, 'Molle', 'molle.babic@it.uu.se', '23408e7480c9946f0b892fd6eb9996fd', '3', 'molbab');
INSERT INTO `VIP` VALUES (48, 'Prabhakar', 'prabhakar.bartos@it.uu.se', '58f2545fa1f5b2a3b34930d577b4a1f9', '3', 'prabar');
INSERT INTO `VIP` VALUES (49, 'Paula', 'paula.aafjes@it.uu.se', '40a02527dd429cca287df0db12369121', '3', 'pauaaf');
INSERT INTO `VIP` VALUES (50, 'Jacob', 'jacob.abbatelli@it.uu.se', '3f75e394566d65454db1c2c27202fc87', '3', 'jacabb');
INSERT INTO `VIP` VALUES (51, 'u00c2ngela', 'angela.kovar@it.uu.se', 'c39b27bdc3ff3d42fc2779a6c4021719', '3', 'ankov');
INSERT INTO `VIP` VALUES (52, 'Eustachius', 'eustachius.gorski@it.uu.se', 'd7ee44c338a75d434530cc1270402866', '3', 'eusgor');
INSERT INTO `VIP` VALUES (53, 'Mariana', 'mariana.pugliese@it.uu.se', '85fbeb059144561ee0d81dc9c56cee93', '3', 'marpug');
INSERT INTO `VIP` VALUES (54, 'Symeonu', 'symeonu.zimmermann@it.uu.se', '64d321b8cdf1fd72f6ec24ede9fe6ba0', '3', 'symzim');
INSERT INTO `VIP` VALUES (55, 'Dido', 'dido.waters@it.uu.se', 'ff16d73a2ac035286a195dad2160f97b', '3', 'didwat');
INSERT INTO `VIP` VALUES (56, 'Branko', 'branko.tamas@it.uu.se', 'acf2362736d77f22796322665cda3087', '3', 'bratam');
INSERT INTO `VIP` VALUES (57, 'Kaye', 'kaye.wang@it.uu.se', '4c2baf7b0768cc8056697caaf849bb2f', '3', 'kaywan');
INSERT INTO `VIP` VALUES (58, 'Einarr', 'einarr.yamauchi@it.uu.se', '6ed82b07f586ae44301ac29e68f36205', '3', 'einyam');
INSERT INTO `VIP` VALUES (59, 'Teodora', 'teodora.jensen@it.uu.se', 'd7c597334ed3e7a7c91a6b53679dce54', '3', 'teojen');
INSERT INTO `VIP` VALUES (62, 'Rgulo', 'regulo.westerberg@it.uu.se', '3a647a3b3279c7e78443be09749a38d6', '3', 'rewes');
INSERT INTO `VIP` VALUES (63, 'Karme', 'karme.blythe@it.uu.se', 'da9738013fd96a552236e2386fc2977c', '3', 'karbly');
INSERT INTO `VIP` VALUES (64, 'Stefan', 'stefan.bernard@it.uu.se', '4df75219ca8b924daa4be5a2523c46e5', '3', 'steber');
INSERT INTO `VIP` VALUES (65, 'Ta', 'tofa.heinrich@it.uu.se', '9e3da848ba28b28314decfc8a237c882', '3', 'tohei');
INSERT INTO `VIP` VALUES (66, 'Liam', 'liam.traverso@it.uu.se', '6705dac81f21912bbcc1ae3b8d95c3bd', '3', 'liatra');
INSERT INTO `VIP` VALUES (67, 'Oluwakanyinsola', 'oluwakanyinsola.braun@it.uu.se', '394e615db7a9dc7adb20629f47f180ad', '3', 'olubra');
INSERT INTO `VIP` VALUES (68, 'Sharma', 'sharma.petofi@it.uu.se', 'd7b8f69457042b200e175928223c5849', '3', 'shapet');
INSERT INTO `VIP` VALUES (69, 'Oluwatoyin', 'oluwatoyin.drake@it.uu.se', '53396fdba19b184bbed3d2b777613d3e', '3', 'oludra');
INSERT INTO `VIP` VALUES (70, 'Marin', 'marin.stieber@it.uu.se', 'bccbb6c05483bb2dea21794064996cc8', '3', 'marsti');
INSERT INTO `VIP` VALUES (71, 'Felicia', 'felicia.franklin@it.uu.se', '6100621e7f88e68aab1e055900802af4', '3', 'felfra');
INSERT INTO `VIP` VALUES (72, 'Oliver', 'oliver.slusarski@it.uu.se', '4d23b838b2b375f48dc12e53a08012f3', '3', 'olislu');
INSERT INTO `VIP` VALUES (73, 'Jeanne', 'jeanne.atses@it.uu.se', '8545505522afe03641a6aef77f7a517a', '3', 'jeaats');
INSERT INTO `VIP` VALUES (74, 'Aubrey', 'aubrey.blackwood@it.uu.se', 'e021a63d81c45c1aa7bcc5b46f04da89', '3', 'aubbla');
INSERT INTO `VIP` VALUES (75, 'Yevpraksiya', 'yevpraksiya.owens@it.uu.se', '46498c0233091c446a9e20000634c46f', '3', 'yevowe');
INSERT INTO `VIP` VALUES (76, 'Bento', 'bento.faucher@it.uu.se', 'c4f800d9565826475c9f81a16acc3397', '3', 'benfau');
INSERT INTO `VIP` VALUES (77, 'Schwanhild', 'schwanhild.joubert@it.uu.se', 'ffc2364a0f7bedd01fd49f0eda069906', '3', 'schjou');
INSERT INTO `VIP` VALUES (78, 'Livianus', 'livianus.zhao@it.uu.se', '237a09cf1964424441b0a07635029f10', '3', 'livzha');
INSERT INTO `VIP` VALUES (79, 'Eullia', 'eulalia.coughlan@it.uu.se', '64b5a690561214c1ca40f8b906a47365', '3', 'eulcou');
INSERT INTO `VIP` VALUES (80, 'Edric', 'edric.augustin@it.uu.se', '6cbd7446fdb1803d62dd8d56277a736c', '3', 'edraug');
INSERT INTO `VIP` VALUES (81, 'Ska', 'sidika.van@it.uu.se', '694ba22ce8113e54e857a9712c753b6f', '3', 'sivan');
INSERT INTO `VIP` VALUES (82, 'Nika', 'nika.proulx@it.uu.se', '88ab1f4dac9422a7ee3cb34eca3793b7', '3', 'nikpro');
INSERT INTO `VIP` VALUES (83, 'Giacinta', 'giacinta.mikkelsen@it.uu.se', '83ceffee5f8939502d411b895d37d6d9', '3', 'giamik');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
