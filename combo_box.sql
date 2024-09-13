/*
 Navicat Premium Data Transfer

 Source Server         : Local Mysql
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : ppid-dinkes

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 02/09/2024 11:24:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for combo_box
-- ----------------------------
DROP TABLE IF EXISTS `combo_box`;
CREATE TABLE `combo_box`  (
  `id_combobox` int NOT NULL AUTO_INCREMENT,
  `id_tipe` int NULL DEFAULT NULL,
  `kode` char(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` tinyint NULL DEFAULT 0,
  `CreateDate` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_combobox`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of combo_box
-- ----------------------------
INSERT INTO `combo_box` VALUES (1, 21, 'LHKPN1', '1. LHKPN Kepala Dinas Kesehatan', '-', '1-lhkpn-kepala-dinas-kesehatan', 1, '2024-09-02 10:31:08');
INSERT INTO `combo_box` VALUES (2, 21, 'LHKPN2', '2. LHKPN Wakil Kepala Dinas Kesehatan', '-', '2-lhkpn-wakil-kepala-dinas-kesehatan', 1, '2024-09-02 10:23:02');
INSERT INTO `combo_box` VALUES (3, 21, 'LHKPN3', '3. LHKPN Sekretaris Dinas Kesehatan', '-', '3-lhkpn-sekretaris-dinas-kesehatan', 1, '2024-09-02 10:23:58');
INSERT INTO `combo_box` VALUES (4, 21, 'LHKPN4', '4. Pejabat Struktural Dinas Kesehatan', '-', '4-pejabat-struktural-dinas-kesehatan', 1, '2024-09-02 10:40:45');
INSERT INTO `combo_box` VALUES (5, 23, 'REG1', '1. Undang-Undang', '-', '1-undang-undang', 1, '2024-09-02 10:44:00');
INSERT INTO `combo_box` VALUES (6, 23, 'REG2', '2. Peraturan Pemerintah', '-', '2-peraturan-pemerintah', 1, '2024-09-02 10:49:19');
INSERT INTO `combo_box` VALUES (7, 23, 'REG3', '3. Peraturan Presiden', '-', '3-peraturan-presiden', 1, '2024-09-02 10:49:47');
INSERT INTO `combo_box` VALUES (8, 23, 'REG4', '4. Keputusan Presiden', '-', '4-keputusan-presiden', 1, '2024-09-02 10:50:15');
INSERT INTO `combo_box` VALUES (9, 23, 'REG5', '5. Peraturan Menteri', '-', '5-peraturan-menteri', 1, '2024-09-02 10:51:13');
INSERT INTO `combo_box` VALUES (10, 23, 'REG6', '6. Keputusan Menteri', '-', '6-keputusan-menteri', 1, '2024-09-02 10:51:41');
INSERT INTO `combo_box` VALUES (11, 23, 'REG7', '7. Peraturan Daerah', '-', '7-peraturan-daerah', 1, '2024-09-02 10:52:06');
INSERT INTO `combo_box` VALUES (12, 23, 'REG8', '8. Peraturan Gubernur', '-', '8-peraturan-gubernur', 1, '2024-09-02 10:52:41');
INSERT INTO `combo_box` VALUES (13, 23, 'REG9', '9. Keputusan Gubernur', '-', '9-keputusan-gubernur', 1, '2024-09-02 10:53:05');
INSERT INTO `combo_box` VALUES (14, 23, 'REG10', '10. Instruksi Gubernur', '-', '10-instruksi-gubernur', 1, '2024-09-02 10:53:34');
INSERT INTO `combo_box` VALUES (15, 23, 'REG11', '11. Surat Keputusan (SK) Sekda', '-', '11-surat-keputusan-sk-sekda', 1, '2024-09-02 10:53:55');
INSERT INTO `combo_box` VALUES (16, 23, 'REG12', '12. Surat Edaran (SE) Sekda', '-', '12-surat-edaran-se-sekda', 1, '2024-09-02 10:54:16');
INSERT INTO `combo_box` VALUES (17, 23, 'REG13', '13. Instruksi Sekda', '-', '13-instruksi-sekda', 1, '2024-09-02 10:56:10');
INSERT INTO `combo_box` VALUES (18, 23, 'REG14', '14. Surat Keputusan (SK) Kepala Dinas', '-', '14-surat-keputusan-sk-kepala-dinas', 1, '2024-09-02 10:56:34');
INSERT INTO `combo_box` VALUES (19, 23, 'REG15', '15. Surat Edaran (SE) Kepala Dinas', '-', '15-surat-edaran-se-kepala-dinas', 1, '2024-09-02 10:57:01');
INSERT INTO `combo_box` VALUES (20, 23, 'REG16', '16. Instruksi Kepala Dinas', '-', '16-instruksi-kepala-dinas', 1, '2024-09-02 10:57:25');
INSERT INTO `combo_box` VALUES (21, 23, 'REG17', '17. Rancangan Program Pembentukan Peraturan Gubernur Urusan Kesehatan', '-', '17-rancangan-program-pembentukan-peraturan-gubernur-urusan-kesehatan', 1, '2024-09-02 10:57:57');
INSERT INTO `combo_box` VALUES (22, 23, 'REG18', '18. Rancangan Propem Perda', '-', '18-rancangan-propem-perda', 1, '2024-09-02 10:58:22');

SET FOREIGN_KEY_CHECKS = 1;
