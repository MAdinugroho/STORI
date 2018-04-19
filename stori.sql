/*
 Navicat Premium Data Transfer

 Source Server         : xampp
 Source Server Type    : MySQL
 Source Server Version : 100129
 Source Host           : localhost:3306
 Source Schema         : stori

 Target Server Type    : MySQL
 Target Server Version : 100129
 File Encoding         : 65001

 Date: 21/03/2018 21:37:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account`  (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fullname` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `previlleges` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of account
-- ----------------------------
INSERT INTO `account` VALUES (11, 'adi', '21232f297a57a5a743894a0e4a801fc3', 'adinugroho', 'gondang', 'admin', 'adi.jpg');
INSERT INTO `account` VALUES (14, 'adikasir', 'c7911af3adbd12a035b289556d96470a', 'adikasir', 'gondang timur 2', 'user', 'adi2.jpg');

-- ----------------------------
-- Table structure for beli
-- ----------------------------
DROP TABLE IF EXISTS `beli`;
CREATE TABLE `beli`  (
  `id_beli` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `nama_pelanggan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_beli`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 64 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of beli
-- ----------------------------
INSERT INTO `beli` VALUES (63, 'adikasir', '2018-03-21 18:15:33', 'pertama');

-- ----------------------------
-- Table structure for detailbeli
-- ----------------------------
DROP TABLE IF EXISTS `detailbeli`;
CREATE TABLE `detailbeli`  (
  `id_detail` int(6) NOT NULL AUTO_INCREMENT,
  `id_beli` int(4) NULL DEFAULT NULL,
  `id_kue` int(2) NULL DEFAULT NULL,
  `jumlah_pesan` int(3) NULL DEFAULT NULL,
  PRIMARY KEY (`id_detail`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of detailbeli
-- ----------------------------
INSERT INTO `detailbeli` VALUES (14, 63, 9, 0);
INSERT INTO `detailbeli` VALUES (15, 63, 10, 0);
INSERT INTO `detailbeli` VALUES (16, 63, 11, 0);
INSERT INTO `detailbeli` VALUES (17, 63, 12, 0);

-- ----------------------------
-- Table structure for kue
-- ----------------------------
DROP TABLE IF EXISTS `kue`;
CREATE TABLE `kue`  (
  `id_kue` int(2) NOT NULL AUTO_INCREMENT,
  `nama_kue` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga` int(7) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kue`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kue
-- ----------------------------
INSERT INTO `kue` VALUES (9, 'Tiramisu', 100000);
INSERT INTO `kue` VALUES (10, 'Cupcake', 90000);
INSERT INTO `kue` VALUES (11, 'Red Velvet', 120000);
INSERT INTO `kue` VALUES (12, 'Cheesecake', 150000);

-- ----------------------------
-- Table structure for query
-- ----------------------------
DROP TABLE IF EXISTS `query`;
CREATE TABLE `query`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `query` varchar(1024) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for stok
-- ----------------------------
DROP TABLE IF EXISTS `stok`;
CREATE TABLE `stok`  (
  `id_kue` int(2) NOT NULL AUTO_INCREMENT,
  `stok_awal` int(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kue`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of stok
-- ----------------------------
INSERT INTO `stok` VALUES (9, 900);
INSERT INTO `stok` VALUES (10, 900);
INSERT INTO `stok` VALUES (11, 1100);
INSERT INTO `stok` VALUES (12, 500);

-- ----------------------------
-- View structure for detail_beli
-- ----------------------------
DROP VIEW IF EXISTS `detail_beli`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `detail_beli` AS SELECT 
a.id_beli,
a.id_detail,
b.nama_kue,
b.harga,
a.jumlah_pesan,
(a.jumlah_pesan*b.harga) as total

FROM
detailbeli as a,
kue as b
where 
a.id_kue=b.id_kue ;

-- ----------------------------
-- View structure for view_detailbeli
-- ----------------------------
DROP VIEW IF EXISTS `view_detailbeli`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `view_detailbeli` AS SELECT 
a.id_beli,
a.id_detail,
b.nama_kue,
b.harga,
a.jumlah_pesan,
(a.jumlah_pesan*b.harga) as total

FROM
detailbeli as a,
kue as b
where 
a.id_kue=b.id_kue ;

-- ----------------------------
-- View structure for view_laporan
-- ----------------------------
DROP VIEW IF EXISTS `view_laporan`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `view_laporan` AS SELECT
	a.tanggal,
	a.username,
	d.fullname,
	count( a.id_beli ) AS jumlah_transaksi
	#sum( ( b.jumlah_pesan * c.harga ) ) AS subtotal 
FROM
	beli AS a,
	detailbeli AS b,
	kue AS c,
	account AS d 
WHERE
	a.id_beli = b.id_beli 
	AND b.id_kue = c.id_kue 
	AND a.username= d.username
GROUP BY
	a.username ,
	DATE( a.tanggal ) ;

-- ----------------------------
-- View structure for view_reportt
-- ----------------------------
DROP VIEW IF EXISTS `view_reportt`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `view_reportt` AS SELECT
	a.username,
	a.tanggal,
	count( id_beli ) AS jumlah_transaksi
FROM
	beli AS a

GROUP BY
	username ;

-- ----------------------------
-- View structure for view_stok
-- ----------------------------
DROP VIEW IF EXISTS `view_stok`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `view_stok` AS SELECT 
a.*,
b.stok_awal
from 
kue as a,
stok as b
WHERE
a.id_kue = b.id_kue ;

-- ----------------------------
-- View structure for view_stok_baru
-- ----------------------------
DROP VIEW IF EXISTS `view_stok_baru`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `view_stok_baru` AS SELECT
	a.id_kue,
	c.nama_kue,
	c.harga,
	b.stok_awal,
	sum(a.jumlah_pesan) as dibeli,
	(b.stok_awal-sum(a.jumlah_pesan)) as sisa
FROM
	detailbeli AS a,
	stok as b,
	kue as c
where
a.id_kue=b.id_kue
and
a.id_kue=c.id_kue
GROUP BY
	a.id_kue ;

SET FOREIGN_KEY_CHECKS = 1;
