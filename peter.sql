-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.16 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4835
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for smartshop
CREATE DATABASE IF NOT EXISTS `smartshop` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `smartshop`;


-- Dumping structure for table smartshop.aboutme_blog
CREATE TABLE IF NOT EXISTS `aboutme_blog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `header` tinytext,
  `content` longtext,
  `author` tinytext,
  `date` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.aboutme_blog: ~-1 rows (approximately)
DELETE FROM `aboutme_blog`;
/*!40000 ALTER TABLE `aboutme_blog` DISABLE KEYS */;
INSERT INTO `aboutme_blog` (`id`, `header`, `content`, `author`, `date`) VALUES
	(1, 'เกี่ยวกับร้านค้า', '<span style="color: rgb(255, 255, 255); font-family: thaisans; font-size: 28px; line-height: 40px; text-indent: 22px; background-color: rgb(76, 172, 219);">เกี่ยวกับร้านค้า</span>\n        <div><span style="color: rgb(255, 255, 255); font-family: thaisans; font-size: 28px; line-height: 40px; text-indent: 22px; background-color: rgb(76, 172, 219);">เกี่ยวกับร้านค้า</span><span style="color: rgb(255, 255, 255); font-family: thaisans; font-size: 28px; line-height: 40px; text-indent: 22px; background-color: rgb(76, 172, 219);"><br></span></div><div><span style="color: rgb(255, 255, 255); font-family: thaisans; font-size: 28px; line-height: 40px; text-indent: 22px; background-color: rgb(76, 172, 219);">เกี่ยวกับร้านค้า</span><span style="color: rgb(255, 255, 255); font-family: thaisans; font-size: 28px; line-height: 40px; text-indent: 22px; background-color: rgb(76, 172, 219);"><br></span></div>', '1', '1412929976');
/*!40000 ALTER TABLE `aboutme_blog` ENABLE KEYS */;


-- Dumping structure for table smartshop.basket
CREATE TABLE IF NOT EXISTS `basket` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user` int(10) NOT NULL,
  `product` tinytext NOT NULL,
  `unit` tinytext,
  `price` tinytext,
  `date` tinytext NOT NULL,
  `bought` enum('Y','N') NOT NULL DEFAULT 'N',
  `cartID` tinytext,
  `promotion_id` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.basket: ~-1 rows (approximately)
DELETE FROM `basket`;
/*!40000 ALTER TABLE `basket` DISABLE KEYS */;
INSERT INTO `basket` (`id`, `user`, `product`, `unit`, `price`, `date`, `bought`, `cartID`, `promotion_id`) VALUES
	(2, 2, '2', '4', '48', '1413705197', 'Y', '1413713238', NULL),
	(3, 2, '3', '5', '1110', '1412147429', 'Y', '1413713238', NULL),
	(4, 2, '3', '33', '7326', '1412148443', 'Y', '1413713238', NULL),
	(5, 2, '2', '4', '48', '1413705197', 'Y', '1413713238', NULL),
	(14, 2, '2', '4', '48', '1413705197', 'Y', '1413713238', '14'),
	(15, 2, '3', '2', '0', '1412157984', 'Y', '1413713238', '14'),
	(16, 2, '4', '1', '0', '1412157984', 'Y', '1413713238', '14'),
	(17, 2, '3', '2', '444', '1412247723', 'Y', '1413713238', NULL),
	(18, 2, '2', '4', '48', '1413705197', 'N', '1413713238', NULL),
	(19, 2, '3', '2', '444', '1413703367', 'N', '1413713238', NULL);
/*!40000 ALTER TABLE `basket` ENABLE KEYS */;


-- Dumping structure for table smartshop.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `header` longtext,
  `content` longtext,
  `author` tinytext,
  `date` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.blog: ~-1 rows (approximately)
DELETE FROM `blog`;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` (`id`, `header`, `content`, `author`, `date`) VALUES
	(1, 'ssssssssssssss', '<div style="text-align: center;"><b style="font-size: 0.9em; line-height: 1.42857143;"><font size="5">ssssssssssssssssssssssssssssssssssss</font></b></div><div style="text-align: left;"><span style="line-height: 1.42857143;"><font size="2">ssssssssssssssssssssssssssssssssssssssssssssssssssss</font></span></div><div style="text-align: left;"><span style="line-height: 1.42857143;"><font size="2">ssssssssssssssssssssssssssssssssss</font></span></div><div style="text-align: left;"><span style="line-height: 1.42857143;"><font size="2">sssssssssssssssssssssssssssssssssssss</font></span></div>', '1', '1412588178'),
	(2, 'สวัสดีครับ', '<div style="text-align: center;"><span style="line-height: 1.42857143;"><font size="5">สวัสดีครับ</font></span></div><div style="text-align: left;"><span style="line-height: 34.2857170104981px;"><font size="2">สวัสดี สวสัดี</font></span></div><div style="text-align: center;"><span style="line-height: 1.42857143;"><font size="5"><br></font></span></div>', '1', '1412592220'),
	(3, 'สวัสดีครับ', '<div style="text-align: center;"><font size="5"><span style="line-height: 34.2857170104981px;"><b>สวัสดีครับ</b></span></font></div><div style="text-align: left;"><span style="line-height: 34.2857170104981px;"><font size="2">กกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกก</font></span></div><div style="text-align: left;"><span style="line-height: 34.2857170104981px;"><font size="2">กกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกก</font></span></div><div style="text-align: left;"><span style="line-height: 34.2857170104981px;"><font size="2">กกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกก</font></span></div><div style="text-align: left;"><span style="line-height: 34.2857170104981px;"><font size="2">กกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกกก</font></span></div><div style="text-align: left;"><span style="line-height: 34.2857170104981px;"><font size="2">กกกกกกกกกกกกกกกกกกกกกกกกก</font></span></div><div style="text-align: left;"><span style="line-height: 34.2857170104981px;"><font size="2">กกกกกกกกกกกก</font></span></div><div style="text-align: left;"><span style="line-height: 34.2857170104981px;"><font size="2">กกกกกกก</font></span></div><div style="text-align: left;"><span style="line-height: 34.2857170104981px;"><font size="2">กกกก</font></span></div>', '1', '1412670947'),
	(4, 'สวัสดี ยินดีต้อนรับ', '<span style="line-height: 18.0000019073486px;"><b>เข้าไป</b> กูเกิ้ล&nbsp;</span><a href="http://google.com/" style="line-height: 18.0000019073486px; background-color: rgb(255, 255, 255);">คลิ๊ก</a><br style="line-height: 18.0000019073486px;"><span style="line-height: 18.0000019073486px;"><i>เข้าไป</i> ยูทูป&nbsp;</span><a href="http://youtube.com/" style="line-height: 18.0000019073486px; background-color: rgb(255, 255, 255);">คลิ๊ก</a><div style="line-height: 18.0000019073486px;">เข้าไป เฟซบุก&nbsp;<a href="http://facebook.com/" style="font-size: 0.9em; line-height: 1.42857143; background-color: white;">คลิ๊ก</a></div>\n        ', '1', '1412673702'),
	(7, 'ยืนดีต้อนครับ', '<a target="_blank" href="http://www.google.com">google</a>', '1', '1412928972');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;


-- Dumping structure for table smartshop.bought_list
CREATE TABLE IF NOT EXISTS `bought_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `price` tinytext NOT NULL,
  `address` tinytext NOT NULL,
  `sendby` enum('none','ems') NOT NULL,
  `verified` enum('Y','N') NOT NULL DEFAULT 'N',
  `date` tinytext NOT NULL,
  `user` int(10) NOT NULL,
  `wait_list_id` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.bought_list: ~-1 rows (approximately)
DELETE FROM `bought_list`;
/*!40000 ALTER TABLE `bought_list` DISABLE KEYS */;
INSERT INTO `bought_list` (`id`, `price`, `address`, `sendby`, `verified`, `date`, `user`, `wait_list_id`) VALUES
	(1, '64', 'dsfsdf', 'none', 'Y', '1409130118', 2, '1'),
	(7, '444', 'dsfsdf sdfdsf dfds dsfsdf', 'none', 'N', '1412263586', 2, '15'),
	(8, '492', 'dsfsdf sdfdsf dfds dsfsdf', 'none', 'N', '1412263586', 2, NULL);
/*!40000 ALTER TABLE `bought_list` ENABLE KEYS */;


-- Dumping structure for table smartshop.download
CREATE TABLE IF NOT EXISTS `download` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `file` tinytext,
  `detail` longtext,
  `user` tinytext,
  `date` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.download: ~-1 rows (approximately)
DELETE FROM `download`;
/*!40000 ALTER TABLE `download` DISABLE KEYS */;
INSERT INTO `download` (`id`, `file`, `detail`, `user`, `date`) VALUES
	(1, '6Dt0hjb.gif', 'wwwwwwwwwwwwwwwwwwwww', '1', '1413451835');
/*!40000 ALTER TABLE `download` ENABLE KEYS */;


-- Dumping structure for table smartshop.howtobuy_blog
CREATE TABLE IF NOT EXISTS `howtobuy_blog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `header` tinytext,
  `content` longtext,
  `author` tinytext,
  `date` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.howtobuy_blog: ~-1 rows (approximately)
DELETE FROM `howtobuy_blog`;
/*!40000 ALTER TABLE `howtobuy_blog` DISABLE KEYS */;
INSERT INTO `howtobuy_blog` (`id`, `header`, `content`, `author`, `date`) VALUES
	(1, 'วิธีการสั่งซื้อ', '<div style="text-align: center;"><span style="line-height: 1.42857143;"><font size="5">วิธีการสั่งซื้อ</font></span></div><div>วิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อ<br></div>', '1', '1412676155'),
	(2, 'วิธีการสั่งซื้อครับ', '-&nbsp;วิธีการสั่งซื้อครับ<div><span style="line-height: 18.0000019073486px;">-&nbsp;วิธีการสั่งซื้อครับ</span><br></div><div><span style="line-height: 18.0000019073486px;">-&nbsp;วิธีการสั่งซื้อครับ</span><span style="line-height: 18.0000019073486px;"><br></span></div><div><span style="line-height: 18.0000019073486px;">-&nbsp;วิธีการสั่งซื้อครับ</span><span style="line-height: 18.0000019073486px;"><br></span></div><div><span style="line-height: 18.0000019073486px;">-&nbsp;วิธีการสั่งซื้อครับ</span><span style="line-height: 18.0000019073486px;"><br></span></div>', '1', '1412928828');
/*!40000 ALTER TABLE `howtobuy_blog` ENABLE KEYS */;


-- Dumping structure for table smartshop.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `productid` tinytext,
  `img` tinytext,
  `name` tinytext NOT NULL,
  `maintype` int(10) NOT NULL,
  `subtype` int(10) NOT NULL,
  `price` tinytext,
  `unit` int(10) NOT NULL,
  `unitnot` tinytext NOT NULL,
  `detail` longtext NOT NULL,
  `author` tinytext,
  `date` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.product: ~-1 rows (approximately)
DELETE FROM `product`;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `productid`, `img`, `name`, `maintype`, `subtype`, `price`, `unit`, `unitnot`, `detail`, `author`, `date`) VALUES
	(2, '0000000002', '0000000002.jpg', 'mj', 2, 2, '12', 19, '2', 'dsccfgbhrgf;kenmvkjbkjf gnjkrng lknrgjnlkenkvfdblkvdfv', 'admin', '1406793114'),
	(3, '0000000003', '0000000003.gif', 'dsfsdfdfsdfsdff', 3, 7, '222', 22, '2', 'dfgbg.kmfdjnm;ldfmbjdnflkndsfkjnlknsdkjfgnlkdfng', 'admin', '1410428249'),
	(4, '0000000004', '0000000004.jpg', 'ดินสอ', 1, 1, '222', 200, '10', 'ดินสอ สีแดง เทพๆ', 'admin', '1410801960');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;


-- Dumping structure for table smartshop.promotion_list
CREATE TABLE IF NOT EXISTS `promotion_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `promotion_name` tinytext NOT NULL,
  `price` tinytext NOT NULL,
  `detail` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.promotion_list: ~-1 rows (approximately)
DELETE FROM `promotion_list`;
/*!40000 ALTER TABLE `promotion_list` DISABLE KEYS */;
INSERT INTO `promotion_list` (`id`, `promotion_name`, `price`, `detail`) VALUES
	(1, 'โปรโมชั่นแรก', '200', 'dsfgf sdf sdf sdfdsfgfghrterfcb dsfgdsf,mdasnfjnskjafnskjnfkljdsnkjasnfkj nkjn sdakjfnkjanfk ak nkjfk ljhdsafn snfdkl nsdfhdb skjnksdnf hsafjknkj'),
	(2, 'ปีใหม่ 2015', '400', '555555555555555555555555555555555555555555'),
	(3, '444', '444', '444'),
	(14, 'qwe', '222', 'qqweqwe'),
	(15, 'mj triple pack', '200', 'mj triple packmj triple packmj triple pack');
/*!40000 ALTER TABLE `promotion_list` ENABLE KEYS */;


-- Dumping structure for table smartshop.promotion_product
CREATE TABLE IF NOT EXISTS `promotion_product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `productid` tinytext NOT NULL,
  `promotionid` tinytext NOT NULL,
  `unit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.promotion_product: ~-1 rows (approximately)
DELETE FROM `promotion_product`;
/*!40000 ALTER TABLE `promotion_product` DISABLE KEYS */;
INSERT INTO `promotion_product` (`id`, `productid`, `promotionid`, `unit`) VALUES
	(1, '2', '1', 1),
	(2, '4', '1', 1),
	(3, '3', '1', 1),
	(4, '2', '2', 1),
	(5, '4', '2', 1),
	(6, '2', '14', 1),
	(7, '3', '14', 2),
	(8, '4', '14', 1),
	(9, '2', '15', 3);
/*!40000 ALTER TABLE `promotion_product` ENABLE KEYS */;


-- Dumping structure for table smartshop.subtype_product
CREATE TABLE IF NOT EXISTS `subtype_product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `maintype` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.subtype_product: ~-1 rows (approximately)
DELETE FROM `subtype_product`;
/*!40000 ALTER TABLE `subtype_product` DISABLE KEYS */;
INSERT INTO `subtype_product` (`id`, `name`, `maintype`) VALUES
	(1, 'qqqqqqqqqqqq', 1),
	(2, 'ไอโฟน', 2),
	(5, 'กล้องกาก', 1),
	(6, 'รถบรรทุก', 6),
	(7, 'samsung', 3);
/*!40000 ALTER TABLE `subtype_product` ENABLE KEYS */;


-- Dumping structure for table smartshop.type_product
CREATE TABLE IF NOT EXISTS `type_product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.type_product: ~-1 rows (approximately)
DELETE FROM `type_product`;
/*!40000 ALTER TABLE `type_product` DISABLE KEYS */;
INSERT INTO `type_product` (`id`, `name`) VALUES
	(1, 'กล้อง'),
	(2, 'เคสมือถือ'),
	(3, 'มือถือ'),
	(4, 'อุปกรณ์ต่างๆ'),
	(6, 'รถยนต์');
/*!40000 ALTER TABLE `type_product` ENABLE KEYS */;


-- Dumping structure for table smartshop.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `realname` tinytext NOT NULL,
  `lastname` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `address` tinytext NOT NULL,
  `tel` tinytext NOT NULL,
  `province` tinytext NOT NULL,
  `zipcode` tinytext NOT NULL,
  `class` enum('user','admin') DEFAULT 'user',
  `buy_status` enum('none','wait','verified') DEFAULT 'none',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.user: ~-1 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `realname`, `lastname`, `email`, `address`, `tel`, `province`, `zipcode`, `class`, `buy_status`) VALUES
	(1, 'admin', '1', 'แอด', 'มิน', 'admin@admin.com', '', '', '', '', 'admin', 'none'),
	(2, 'user', '1', 'จอร์จ', 'ดีนายด์', 'd9@gmail.com', 'dsfsdf sdfdsf dfds dsfsdf', '0742223333', 'เลย', '90110', 'user', 'wait'),
	(3, 'rudeboy', '1', 'rudeboy', 'forplay', 'rudeboy@gmail.com', 'sdfdsf sdf sd sdfsd f', '074333222', 'กระบี่', '90110', 'user', 'none'),
	(4, 'cereal', '1', 'cereal', 'cereal', 'cereal@cereal.com', 'cereal', '0823333333', 'ตรัง', '90110', 'user', 'none'),
	(5, 'aa', '11', 'aa', 'aa', 'aa@aa.com', 'aa', '8799999999', 'นครนายก', '90000', 'user', 'none');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table smartshop.wait_list
CREATE TABLE IF NOT EXISTS `wait_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `money` tinytext NOT NULL,
  `date` tinytext NOT NULL,
  `time` tinytext NOT NULL,
  `bill_dir` tinytext,
  `user` int(10) NOT NULL,
  `cartID` tinytext,
  `verified` enum('Y','N') DEFAULT 'N',
  `bought_list_id` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.wait_list: ~-1 rows (approximately)
DELETE FROM `wait_list`;
/*!40000 ALTER TABLE `wait_list` DISABLE KEYS */;
INSERT INTO `wait_list` (`id`, `money`, `date`, `time`, `bill_dir`, `user`, `cartID`, `verified`, `bought_list_id`) VALUES
	(1, '100', '1409156770', 'บ่ายโมง', '1.', 2, '1412148451', 'Y', '1'),
	(15, '500', '1412291324', '2.40 น', NULL, 2, '1412263586', 'N', '7');
/*!40000 ALTER TABLE `wait_list` ENABLE KEYS */;


-- Dumping structure for table smartshop.warranty
CREATE TABLE IF NOT EXISTS `warranty` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `crame_code` tinytext NOT NULL,
  `product_name` tinytext NOT NULL,
  `status` enum('waiting','inprogress','finished') NOT NULL DEFAULT 'waiting',
  `customer_name` tinytext NOT NULL,
  `date` tinytext NOT NULL,
  `detail` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.warranty: ~-1 rows (approximately)
DELETE FROM `warranty`;
/*!40000 ALTER TABLE `warranty` DISABLE KEYS */;
INSERT INTO `warranty` (`id`, `crame_code`, `product_name`, `status`, `customer_name`, `date`, `detail`) VALUES
	(1, '141284447300001', 'เครื่องซักผ้า', 'waiting', 'จอร์จ ดีนายด์', '1412844473', 'ซักผ้าไม่ได้'),
	(2, '141233337300002', 'ราวตากผ้า', 'inprogress', 'ไไไไ', '1412844473', 'ตากผ้าไม่ได้');
/*!40000 ALTER TABLE `warranty` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
