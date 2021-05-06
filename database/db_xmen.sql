/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100418
 Source Host           : localhost:3306
 Source Schema         : db_xmen

 Target Server Type    : MySQL
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 07/05/2021 02:56:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ms_skill
-- ----------------------------
DROP TABLE IF EXISTS `ms_skill`;
CREATE TABLE `ms_skill`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_skill` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ms_skill
-- ----------------------------
INSERT INTO `ms_skill` VALUES (2, 'Bisa Membuat Hujan Badai', '2021-05-06 23:11:36', '2021-05-07 00:37:24');
INSERT INTO `ms_skill` VALUES (3, 'Bisa Membuat Petir', '2021-05-06 23:11:42', NULL);
INSERT INTO `ms_skill` VALUES (4, 'Bisa Mengendalikan Angin dan Badai', '2021-05-06 23:11:47', NULL);
INSERT INTO `ms_skill` VALUES (5, 'Bisa Sembuh Dengan Cepat', '2021-05-06 23:11:55', NULL);
INSERT INTO `ms_skill` VALUES (6, 'Mempunyai Cakar Yang Lebih Kuat Dari Baja', '2021-05-06 23:12:02', NULL);

-- ----------------------------
-- Table structure for ms_son
-- ----------------------------
DROP TABLE IF EXISTS `ms_son`;
CREATE TABLE `ms_son`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_papa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_mama` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ms_superhero
-- ----------------------------
DROP TABLE IF EXISTS `ms_superhero`;
CREATE TABLE `ms_superhero`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jk` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ms_superhero
-- ----------------------------
INSERT INTO `ms_superhero` VALUES (1, 'Proffesor B', 'L', '2021-05-06 19:23:31', '2021-05-07 00:47:51');
INSERT INTO `ms_superhero` VALUES (2, 'Wolverine', 'L', '2021-05-06 19:23:41', NULL);
INSERT INTO `ms_superhero` VALUES (3, 'Raven', 'P', '2021-05-06 19:23:55', NULL);
INSERT INTO `ms_superhero` VALUES (4, 'Beast', 'L', '2021-05-06 19:23:58', NULL);
INSERT INTO `ms_superhero` VALUES (5, 'Storm', 'p', '2021-05-06 19:24:02', '2021-05-07 00:37:56');

-- ----------------------------
-- Table structure for tr_skill
-- ----------------------------
DROP TABLE IF EXISTS `tr_skill`;
CREATE TABLE `tr_skill`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_superhero` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_skill` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tr_skill
-- ----------------------------
INSERT INTO `tr_skill` VALUES (1, '1', '1', '2021-05-06 23:19:11');
INSERT INTO `tr_skill` VALUES (6, '1', '6', '2021-05-07 00:07:26');
INSERT INTO `tr_skill` VALUES (7, '2', '6', '2021-05-07 00:33:48');
INSERT INTO `tr_skill` VALUES (8, '5', '6', '2021-05-07 00:34:20');
INSERT INTO `tr_skill` VALUES (11, '5', '2', '2021-05-07 00:37:38');
INSERT INTO `tr_skill` VALUES (12, '4', '5', '2021-05-07 01:22:55');
INSERT INTO `tr_skill` VALUES (13, '3', '4', '2021-05-07 01:23:22');
INSERT INTO `tr_skill` VALUES (14, '1', '5', '2021-05-07 01:23:53');

-- ----------------------------
-- View structure for v_skill_superhero
-- ----------------------------
DROP VIEW IF EXISTS `v_skill_superhero`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_skill_superhero` AS SELECT
tr_skill.id,
tr_skill.id_superhero,
tr_skill.id_skill,
tr_skill.created_at,
ms_skill.nama_skill,
ms_superhero.nama
FROM
tr_skill
INNER JOIN ms_skill ON tr_skill.id_skill = ms_skill.id
INNER JOIN ms_superhero ON tr_skill.id_superhero = ms_superhero.id ;

SET FOREIGN_KEY_CHECKS = 1;
