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
INSERT INTO `Drink list` VALUES ('1120801', 1, 101, '1');
INSERT INTO `Drink list` VALUES ('1125001', 1, 301, '2');
INSERT INTO `Drink list` VALUES ('1128101', 2, 301, '2');
INSERT INTO `Drink list` VALUES ('1129801', 2, 302, '2');
INSERT INTO `Drink list` VALUES ('1134103', 3, 301, '2');
INSERT INTO `Drink list` VALUES ('1144703', 3, 302, '2');
INSERT INTO `Drink list` VALUES ('1152803', 3, 401, '4');
INSERT INTO `Drink list` VALUES ('1159803', 4, 401, '2');
INSERT INTO `Drink list` VALUES ('1199403', 4, 601, '4');
INSERT INTO `Drink list` VALUES ('137901', 4, 701, '3');
INSERT INTO `Drink list` VALUES ('142003', 5, 701, '2');
INSERT INTO `Drink list` VALUES ('148001', 5, 301, '2');
INSERT INTO `Drink list` VALUES ('149003', 5, 101, '4');
INSERT INTO `Drink list` VALUES ('149803', 6, 102, '2');
INSERT INTO `Drink list` VALUES ('151503', 6, 302, '24');
INSERT INTO `Drink list` VALUES ('153803', 6, 401, '2');
INSERT INTO `Drink list` VALUES ('155701', 7, 601, '1');
INSERT INTO `Drink list` VALUES ('156103', 7, 701, '3');
INSERT INTO `Drink list` VALUES ('157701', 7, 801, '1');
INSERT INTO `Drink list` VALUES ('167903', 7, 401, '3');
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
