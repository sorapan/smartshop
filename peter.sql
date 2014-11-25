-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.16 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.aboutme_blog: ~-1 rows (approximately)
DELETE FROM `aboutme_blog`;
/*!40000 ALTER TABLE `aboutme_blog` DISABLE KEYS */;
INSERT INTO `aboutme_blog` (`id`, `header`, `content`, `author`, `date`) VALUES
	(1, 'เกี่ยวกับร้านค้า', '<span style="color: rgb(255, 255, 255); font-family: thaisans; font-size: 28px; line-height: 40px; text-indent: 22px; background-color: rgb(76, 172, 219);">เกี่ยวกับร้านค้า</span>\n        <div><span style="color: rgb(255, 255, 255); font-family: thaisans; font-size: 28px; line-height: 40px; text-indent: 22px; background-color: rgb(76, 172, 219);">เกี่ยวกับร้านค้า</span><span style="color: rgb(255, 255, 255); font-family: thaisans; font-size: 28px; line-height: 40px; text-indent: 22px; background-color: rgb(76, 172, 219);"><br></span></div><div><span style="color: rgb(255, 255, 255); font-family: thaisans; font-size: 28px; line-height: 40px; text-indent: 22px; background-color: rgb(76, 172, 219);">เกี่ยวกับร้านค้า</span><span style="color: rgb(255, 255, 255); font-family: thaisans; font-size: 28px; line-height: 40px; text-indent: 22px; background-color: rgb(76, 172, 219);"><br></span></div>', '1', '1412929976'),
	(2, 'rockman', '<a imageanchor="1" href="http://4.bp.blogspot.com/-7bKgF3tkUmM/TllE4lDsK2I/AAAAAAAAAKA/rDwaisTPW2A/s1600/Megaman_retro_3D_by_cezkid.gif" style="font-family: \'Times New Roman\'; font-size: medium; line-height: normal; text-align: center; margin-left: 1em; margin-right: 1em;"><img src="https://images-blogger-opensocial.googleusercontent.com/gadgets/proxy?url=http%3A%2F%2F4.bp.blogspot.com%2F-7bKgF3tkUmM%2FTllE4lDsK2I%2FAAAAAAAAAKA%2FrDwaisTPW2A%2Fs1600%2FMegaman_retro_3D_by_cezkid.gif&amp;container=blogger&amp;gadget=a&amp;rewriteMime=image%2F*" border="0" data-orig-src="http://4.bp.blogspot.com/-7bKgF3tkUmM/TllE4lDsK2I/AAAAAAAAAKA/rDwaisTPW2A/s1600/Megaman_retro_3D_by_cezkid.gif" style="cursor: move;"></a>\n        ', '1', '1413887757'),
	(3, 'etc', '<div style="text-align: center;"><img src="http://localhost/peter/blog_img/188anigif.gif"><br></div><div><br></div><div style="text-align: center;"><span style="font-size: 0.9em; line-height: 1.42857143;">mr bean</span></div><div style="text-align: center;"><span style="font-size: 0.9em; line-height: 1.42857143;"><br></span></div><div style="text-align: center;"><img src="http://localhost/peter/blog_img/6Dt0hjb.gif"><span style="font-size: 0.9em; line-height: 1.42857143;"><br></span></div><div style="text-align: center;"><span style="font-size: 0.9em; line-height: 1.42857143;"><br></span></div><div style="text-align: center;"><span style="font-size: 0.9em; line-height: 1.42857143;">yolo</span></div>', '1', '1413967851'),
	(4, 'gabe newell', '<img src="http://localhost/peter/blog_img/7Ff8XM2.jpg">\n        ', '1', '1413971822'),
	(5, 'YOLO', '<div style="text-align: center;"><font size="5">YOLOYOLOYOLOYOLOYOLOYOLOYOLOYOLOYOLO</font><br></div><div style="text-align: center;"><font size="5"><br></font></div><img src="http://localhost/peter/blog_img/6Dt0hjb.gif">\n        ', '1', '1413972206'),
	(6, 'wwwwwwww', '<img src="http://localhost/peter/blog_img/Four_Seasons_by_mariusp.jpg">\n        ', '1', '1413973061'),
	(7, 'ssssssssssssssssssssssss', 's<i>ssssss</i><a href="http://sss">sssssss</a>ss<b>sss</b>ssss<a href="http://google.com"><img src="http://localhost/peter/blog_img/2895_4cfc.gif"></a>', '1', '1413973693');
/*!40000 ALTER TABLE `aboutme_blog` ENABLE KEYS */;


-- Dumping structure for table smartshop.basket
CREATE TABLE IF NOT EXISTS `basket` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user` int(10) NOT NULL,
  `product_name` tinytext,
  `product` tinytext NOT NULL,
  `unit` tinytext,
  `price` tinytext,
  `date` tinytext NOT NULL,
  `bought` enum('Y','N') NOT NULL DEFAULT 'N',
  `cartID` tinytext,
  `promotion_id` tinytext,
  `promotion_unit` tinytext,
  `promotion_name` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.basket: ~-1 rows (approximately)
DELETE FROM `basket`;
/*!40000 ALTER TABLE `basket` DISABLE KEYS */;
INSERT INTO `basket` (`id`, `user`, `product_name`, `product`, `unit`, `price`, `date`, `bought`, `cartID`, `promotion_id`, `promotion_unit`, `promotion_name`) VALUES
	(1, 2, 'ดินสอสีเหลือง', '6', '2', '100', '1416825396', 'Y', '1416825486', NULL, NULL, NULL),
	(2, 2, 'บ้องตะลุยอวกาศ', '5', '1', '2000', '1416825414', 'Y', '1416825486', NULL, NULL, NULL),
	(3, 2, 'บ้องตะลุยอวกาศ', '5', '1', '2000', '1416826135', 'N', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `basket` ENABLE KEYS */;


-- Dumping structure for table smartshop.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `header` longtext,
  `content` longtext,
  `author` tinytext,
  `date` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.blog: ~-1 rows (approximately)
DELETE FROM `blog`;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` (`id`, `header`, `content`, `author`, `date`) VALUES
	(10, 'หกดหกดดดหหหหหกดหกดหหห', '\n            \n            หกหด<div><img src="http://localhost/peter/blog_img/6Dt0hjb.gif"><br><div>หหหหหหห</div><div>กหดกด</div>                </div>', '1', '1416128831');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;


-- Dumping structure for table smartshop.blog_img
CREATE TABLE IF NOT EXISTS `blog_img` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` tinytext,
  `type` tinytext,
  `date` tinytext,
  `user` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.blog_img: ~-1 rows (approximately)
DELETE FROM `blog_img`;
/*!40000 ALTER TABLE `blog_img` DISABLE KEYS */;
INSERT INTO `blog_img` (`id`, `name`, `type`, `date`, `user`) VALUES
	(1, '6Dt0hjb.gif', 'image/gif', '1413971289', '1'),
	(2, '188anigif.gif', 'image/gif', '1413971320', '1'),
	(4, '2895_4cfc.gif', 'image/gif', '1413971454', '1'),
	(5, 'Four_Seasons_by_mariusp.jpg', 'image/jpeg', '1413971460', '1');
/*!40000 ALTER TABLE `blog_img` ENABLE KEYS */;


-- Dumping structure for table smartshop.bought_list
CREATE TABLE IF NOT EXISTS `bought_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `price` tinytext NOT NULL,
  `user_realname` tinytext,
  `province` tinytext,
  `address` tinytext NOT NULL,
  `zipcode` tinytext,
  `tel` tinytext,
  `sendby` enum('none','ems') NOT NULL,
  `verified` enum('Y','N') NOT NULL DEFAULT 'N',
  `date` tinytext NOT NULL,
  `user` int(10) NOT NULL,
  `wait_list_id` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.bought_list: ~-1 rows (approximately)
DELETE FROM `bought_list`;
/*!40000 ALTER TABLE `bought_list` DISABLE KEYS */;
INSERT INTO `bought_list` (`id`, `price`, `user_realname`, `province`, `address`, `zipcode`, `tel`, `sendby`, `verified`, `date`, `user`, `wait_list_id`) VALUES
	(1, '2,200', 'จอร์จ  ดีนายด์', 'เลย', 'dsfsdf sdfdsf dfds dsfsdf', '90110', '0742223333', 'ems', 'N', '1416825486', 2, '1');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.howtobuy_blog: ~-1 rows (approximately)
DELETE FROM `howtobuy_blog`;
/*!40000 ALTER TABLE `howtobuy_blog` DISABLE KEYS */;
INSERT INTO `howtobuy_blog` (`id`, `header`, `content`, `author`, `date`) VALUES
	(1, 'วิธีการสั่งซื้อ', '<div style="text-align: center;"><span style="line-height: 1.42857143;"><font size="5">วิธีการสั่งซื้อ</font></span></div><div>วิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อวิธีการสั่งซื้อ<br></div>', '1', '1412676155'),
	(2, 'วิธีการสั่งซื้อครับ', '-&nbsp;วิธีการสั่งซื้อครับ<div><span style="line-height: 18.0000019073486px;">-&nbsp;วิธีการสั่งซื้อครับ</span><br></div><div><span style="line-height: 18.0000019073486px;">-&nbsp;วิธีการสั่งซื้อครับ</span><span style="line-height: 18.0000019073486px;"><br></span></div><div><span style="line-height: 18.0000019073486px;">-&nbsp;วิธีการสั่งซื้อครับ</span><span style="line-height: 18.0000019073486px;"><br></span></div><div><span style="line-height: 18.0000019073486px;">-&nbsp;วิธีการสั่งซื้อครับ</span><span style="line-height: 18.0000019073486px;"><br></span></div>', '1', '1412928828'),
	(3, 'ไไไไไไไไไไไไไไไไไไไไไไ', '\n            ผผผผผผผผผผผผ', '1', '1416129618');
/*!40000 ALTER TABLE `howtobuy_blog` ENABLE KEYS */;


-- Dumping structure for table smartshop.message
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `message` longtext,
  `user_name` tinytext,
  `user_id` tinytext,
  `date` tinytext,
  `class` enum('non-admin','admin') DEFAULT 'non-admin',
  `to` tinytext,
  `read` enum('readed','unread') DEFAULT 'unread',
  `reply` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.message: ~-1 rows (approximately)
DELETE FROM `message`;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` (`id`, `message`, `user_name`, `user_id`, `date`, `class`, `to`, `read`, `reply`) VALUES
	(1, 'สวัสดีครับ', 'user', '2', '1416822850', 'non-admin', NULL, 'unread', 'Y'),
	(2, '<div class="msgreply"><div class="replyheader">ข้อความที่ตอบกลับ</div><div class="replymsg">สวัสดีครับ</div><div class="content">ครับสวสัดีครับบบ</div></div>', 'admin', '1', '1416822876', 'admin', '2', 'readed', 'N'),
	(3, '<div class="msgreply"><div class="replyheader">ข้อความที่ตอบกลับ</div><div class="replymsg">สวัสดีครับ</div><div class="content">หวักดหกดหเาืกดา่ืกดทาเ</div></div>', 'admin', '1', '1416822907', 'admin', '2', 'readed', 'N'),
	(4, '<div class="msgreply"><div class="replyheader">ข้อความที่ตอบกลับ</div><div class="replymsg">สวัสดีครับ</div><div class="content">5555555555</div></div>', 'admin', '1', '1416824155', 'admin', '2', 'readed', 'N'),
	(5, '<div class="msgreply"><div class="replyheader">ข้อความที่ตอบกลับ</div><div class="replymsg">สวัสดีครับ</div><div class="content">ddd</div></div>', 'admin', '1', '1416905772', 'admin', '2', 'readed', 'N'),
	(6, 'ครับ', 'user', '2', '1416905971', 'non-admin', NULL, 'unread', 'Y'),
	(7, 'ถถถถถถถถถถถถถ', 'user', '2', '1416905977', 'non-admin', NULL, 'unread', 'N'),
	(8, '555555555555', 'user', '2', '1416905983', 'non-admin', NULL, 'unread', 'N'),
	(9, '<div class="msgreply"><div class="replyheader">ข้อความที่ตอบกลับ</div><div class="replymsg">ครับ</div><div class="content">มีไรครับ</div></div>', 'admin', '1', '1416906113', 'admin', '2', 'unread', 'N');
/*!40000 ALTER TABLE `message` ENABLE KEYS */;


-- Dumping structure for table smartshop.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `productid` tinytext,
  `img` tinytext,
  `name` tinytext NOT NULL,
  `maintype` int(10) NOT NULL,
  `subtype` int(10) NOT NULL,
  `price` int(20) DEFAULT NULL,
  `unit` int(10) NOT NULL,
  `unitnot` int(10) NOT NULL,
  `detail` longtext NOT NULL,
  `author` tinytext,
  `date` tinytext,
  `sell` enum('true','false') DEFAULT 'true',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.product: ~-1 rows (approximately)
DELETE FROM `product`;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `productid`, `img`, `name`, `maintype`, `subtype`, `price`, `unit`, `unitnot`, `detail`, `author`, `date`, `sell`) VALUES
	(2, '0000000002', '0000000002.gif', 'mj', 2, 9, 222, 2, 3, 'dkfmsdf<div>sdf</div><div>sdf</div><div>sd</div><div>f</div><div>sdfsdfsdfsdfsdf</div>', 'admin', '1415526058', 'true'),
	(4, '0000000004', '0000000004.jpg', 'ดินสอ', 1, 1, 111, 175, 10, 'ดินสอ สีแดง เทพๆ', 'admin', '1415184766', 'true'),
	(5, '0000000005', '0000000005.jpg', 'บ้องตะลุยอวกาศ', 1, 1, 2000, 182, 5, 'sadsad<div>asd</div><div>as</div><div>das</div><div>d</div><div>asdsadsad</div><div>sad</div>', 'admin', '1415183185', 'true'),
	(6, '0000000006', '0000000006.jpg', 'ดินสอสีเหลือง', 3, 7, 50, 982, 2, 'ดินสอสีเหลืองเมพๆ<div>ดินสอสีเหลืองเมพๆ<br></div><div>ดินสอสีเหลืองเมพๆ<br></div>', 'admin', '1415545385', 'true');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;


-- Dumping structure for table smartshop.promotion_list
CREATE TABLE IF NOT EXISTS `promotion_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `promotion_name` tinytext NOT NULL,
  `price` tinytext NOT NULL,
  `detail` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.promotion_list: ~-1 rows (approximately)
DELETE FROM `promotion_list`;
/*!40000 ALTER TABLE `promotion_list` DISABLE KEYS */;
INSERT INTO `promotion_list` (`id`, `promotion_name`, `price`, `detail`) VALUES
	(16, 'mj triple pack', '200', 'aaaaaaaaaaaaas<div>asdas</div><div>da</div><div>sd</div><div>deeee</div>'),
	(17, 'qwe', '200', 'qweqweqweqweqweqwe');
/*!40000 ALTER TABLE `promotion_list` ENABLE KEYS */;


-- Dumping structure for table smartshop.promotion_product
CREATE TABLE IF NOT EXISTS `promotion_product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `productid` tinytext NOT NULL,
  `promotionid` tinytext NOT NULL,
  `unit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.promotion_product: ~-1 rows (approximately)
DELETE FROM `promotion_product`;
/*!40000 ALTER TABLE `promotion_product` DISABLE KEYS */;
INSERT INTO `promotion_product` (`id`, `productid`, `promotionid`, `unit`) VALUES
	(10, '2', '16', 3),
	(11, '6', '17', 1),
	(12, '5', '17', 1);
/*!40000 ALTER TABLE `promotion_product` ENABLE KEYS */;


-- Dumping structure for table smartshop.subtype_product
CREATE TABLE IF NOT EXISTS `subtype_product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `maintype` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.subtype_product: ~-1 rows (approximately)
DELETE FROM `subtype_product`;
/*!40000 ALTER TABLE `subtype_product` DISABLE KEYS */;
INSERT INTO `subtype_product` (`id`, `name`, `maintype`) VALUES
	(1, 'qqqqqqqqqqqq', 1),
	(2, 'ไอโฟน', 2),
	(5, 'กล้องกาก', 1),
	(7, 'samsung', 3),
	(9, 'เคสกากๆ', 2);
/*!40000 ALTER TABLE `subtype_product` ENABLE KEYS */;


-- Dumping structure for table smartshop.type_product
CREATE TABLE IF NOT EXISTS `type_product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.type_product: ~-1 rows (approximately)
DELETE FROM `type_product`;
/*!40000 ALTER TABLE `type_product` DISABLE KEYS */;
INSERT INTO `type_product` (`id`, `name`) VALUES
	(1, 'กล้อง'),
	(2, 'เคสมือถือ'),
	(3, 'มือถือ');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.user: ~-1 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `realname`, `lastname`, `email`, `address`, `tel`, `province`, `zipcode`, `class`, `buy_status`) VALUES
	(1, 'admin', '1', 'แอด', 'มิน', 'admin@admin.com', '', '', '', '', 'admin', 'none'),
	(2, 'user', '1', 'จอร์จ', 'ดีนายด์', 'd9@gmail.com', 'dsfsdf sdfdsf dfds dsfsdf', '0742223333', 'เลย', '90110', 'user', 'none'),
	(3, 'rudeboy', '1', 'rudeboy', 'forplay', 'rudeboy@gmail.com', 'sdfdsf sdf sd sdfsd f', '074333222', 'กระบี่', '90110', 'user', 'none'),
	(4, 'cereal', '1', 'cereal', 'cereal', 'cereal@cereal.com', 'cereal', '0823333333', 'ตรัง', '90110', 'user', 'none'),
	(5, 'aa', '11', 'aa', 'aa', 'aa@aa.com', 'aa', '8799999999', 'นครนายก', '90000', 'user', 'none'),
	(6, 'soso', '1', 'soso', 'soso', 'soso@soso.com', 'sosososososo', '0303939393', 'ตราด', '90111', 'user', 'none');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table smartshop.wait_list: ~-1 rows (approximately)
DELETE FROM `wait_list`;
/*!40000 ALTER TABLE `wait_list` DISABLE KEYS */;
INSERT INTO `wait_list` (`id`, `money`, `date`, `time`, `bill_dir`, `user`, `cartID`, `verified`, `bought_list_id`) VALUES
	(1, '2200', '1416849638', '14.40 น', NULL, 2, '1416825486', 'N', '1');
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
	(2, '141233337300002', 'ราวตากผ้า', 'finished', 'ไไไไ', '1412844473', 'ตากผ้าไม่ได้');
/*!40000 ALTER TABLE `warranty` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
