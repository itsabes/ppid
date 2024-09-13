/*
 Navicat Premium Data Transfer

 Source Server         : DINKES EIS DISKOM
 Source Server Type    : MySQL
 Source Server Version : 100121
 Source Host           : 10.15.34.199:3306
 Source Schema         : ppid-dinkes

 Target Server Type    : MySQL
 Target Server Version : 100121
 File Encoding         : 65001

 Date: 11/09/2024 17:30:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pejabat_struktural
-- ----------------------------
DROP TABLE IF EXISTS `pejabat_struktural`;
CREATE TABLE `pejabat_struktural`  (
  `id_pejabat_struktural` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pejabat_struktural` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan_pejabat_struktural` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ttl_pejabat_struktural` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto_pejabat_struktural` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lampiran_pejabat_struktural` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_urut` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pejabat_struktural`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pejabat_struktural
-- ----------------------------
INSERT INTO `pejabat_struktural` VALUES ('0b2a4c4c-2bc4-4348-b9d2-b030493aa1c0', 'drg. Ani Ruspitawati, M.M', 'Kepala Dinas Kesehatan', '\r\nLumajang, 08-05-1967', 'ibu-kepala.JPG', 'Biodata-Kadis.pdf', 1, '2024-09-11 15:37:01');
INSERT INTO `pejabat_struktural` VALUES ('362e9a68-168d-46da-8870-9c65487d5c3a', 'dr. Dwi Oktavia TLH, M.Epid', 'Wakil Kepala Dinas', '\r\nJakarta, 02-10-1973', 'ibu-waka.jpg', 'Biodata-Wakadis.pdf', 2, '2024-09-11 15:37:01');
INSERT INTO `pejabat_struktural` VALUES ('a58871b6-2a50-4d04-875d-e9160df56f17', 'drg. Nuniek Ria Sundari, MARS', 'Sekretaris Dinas Kesehatan', '\r\nJakarta, 26-07-1980', 'ibu-sekdis.jpg', 'Biodata-Sekdis.pdf', 3, '2024-09-11 15:37:01');

SET FOREIGN_KEY_CHECKS = 1;
