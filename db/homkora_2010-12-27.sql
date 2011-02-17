# Sequel Pro dump
# Version 1630
# http://code.google.com/p/sequel-pro
#
# Host: 127.0.0.1 (MySQL 5.1.49-1ubuntu8.1)
# Database: homkora
# Generation Time: 2010-12-27 16:52:18 -0700
# ************************************************************

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table acos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `acos`;

CREATE TABLE `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

LOCK TABLES `acos` WRITE;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` (`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`)
VALUES
	(1,NULL,NULL,NULL,'controllers',1,96),
	(2,1,NULL,NULL,'Pages',2,15),
	(3,2,NULL,NULL,'display',3,4),
	(4,2,NULL,NULL,'add',5,6),
	(5,2,NULL,NULL,'edit',7,8),
	(6,2,NULL,NULL,'index',9,10),
	(7,2,NULL,NULL,'view',11,12),
	(8,2,NULL,NULL,'delete',13,14),
	(9,1,NULL,NULL,'Users',16,33),
	(10,9,NULL,NULL,'login',17,18),
	(11,9,NULL,NULL,'logout',19,20),
	(12,9,NULL,NULL,'index',21,22),
	(13,9,NULL,NULL,'view',23,24),
	(14,9,NULL,NULL,'add',25,26),
	(15,9,NULL,NULL,'edit',27,28),
	(16,9,NULL,NULL,'delete',29,30),
	(17,1,NULL,NULL,'Projects',34,47),
	(18,17,NULL,NULL,'index',35,36),
	(19,17,NULL,NULL,'view',37,38),
	(20,17,NULL,NULL,'add',39,40),
	(21,17,NULL,NULL,'edit',41,42),
	(22,17,NULL,NULL,'delete',43,44),
	(23,1,NULL,NULL,'Timers',48,59),
	(24,23,NULL,NULL,'index',49,50),
	(25,23,NULL,NULL,'view',51,52),
	(26,23,NULL,NULL,'add',53,54),
	(27,23,NULL,NULL,'edit',55,56),
	(28,23,NULL,NULL,'delete',57,58),
	(29,1,NULL,NULL,'Widgets',60,71),
	(30,29,NULL,NULL,'index',61,62),
	(31,29,NULL,NULL,'view',63,64),
	(32,29,NULL,NULL,'add',65,66),
	(33,29,NULL,NULL,'edit',67,68),
	(34,29,NULL,NULL,'delete',69,70),
	(35,1,NULL,NULL,'Groups',72,83),
	(36,35,NULL,NULL,'index',73,74),
	(37,35,NULL,NULL,'view',75,76),
	(38,35,NULL,NULL,'add',77,78),
	(39,35,NULL,NULL,'edit',79,80),
	(40,35,NULL,NULL,'delete',81,82),
	(41,1,NULL,NULL,'Posts',84,95),
	(42,41,NULL,NULL,'index',85,86),
	(43,41,NULL,NULL,'view',87,88),
	(44,41,NULL,NULL,'add',89,90),
	(45,41,NULL,NULL,'edit',91,92),
	(46,41,NULL,NULL,'delete',93,94),
	(47,17,NULL,NULL,'addTime',45,46),
	(48,9,NULL,NULL,'publicAdd',31,32);

/*!40000 ALTER TABLE `acos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table aros
# ------------------------------------------------------------

DROP TABLE IF EXISTS `aros`;

CREATE TABLE `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

LOCK TABLES `aros` WRITE;
/*!40000 ALTER TABLE `aros` DISABLE KEYS */;
INSERT INTO `aros` (`id`,`parent_id`,`model`,`foreign_key`,`alias`,`lft`,`rght`)
VALUES
	(1,NULL,'Group',1,NULL,1,4),
	(2,NULL,'Group',2,NULL,5,8),
	(3,NULL,'Group',3,NULL,9,14),
	(4,1,'User',1,NULL,2,3),
	(5,2,'User',2,NULL,6,7),
	(6,3,'User',3,NULL,10,11),
	(7,3,'User',4,NULL,12,13);

/*!40000 ALTER TABLE `aros` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table aros_acos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `aros_acos`;

CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

LOCK TABLES `aros_acos` WRITE;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;
INSERT INTO `aros_acos` (`id`,`aro_id`,`aco_id`,`_create`,`_read`,`_update`,`_delete`)
VALUES
	(1,1,1,'1','1','1','1'),
	(2,2,1,'-1','-1','-1','-1'),
	(3,2,41,'1','1','1','1'),
	(4,2,29,'1','1','1','1'),
	(5,3,1,'-1','-1','-1','-1'),
	(6,3,44,'1','1','1','1'),
	(7,3,45,'1','1','1','1'),
	(8,3,32,'1','1','1','1'),
	(9,3,33,'1','1','1','1');

/*!40000 ALTER TABLE `aros_acos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`,`name`,`created`,`modified`)
VALUES
	(1,'Admin','2010-12-26 17:29:11','2010-12-26 17:29:11'),
	(2,'staff','2010-12-26 17:29:23','2010-12-26 17:29:23'),
	(3,'user','2010-12-26 17:29:29','2010-12-26 17:29:29');

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table projects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `total_time` varchar(500) NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` (`id`,`user_id`,`title`,`description`,`created`,`modified`,`total_time`)
VALUES
	(1,1,'Demo','This is a demo','2010-12-26 17:54:37','2010-12-27 15:22:22','00:20:24'),
	(2,1,'Demo2','This is a demo','2010-12-26 17:54:37','2010-12-27 15:06:14','00:03:48'),
	(11,1,'Demo3','demo','2010-12-27 12:49:57','2010-12-27 12:49:57','00:00:00'),
	(99,3,'Awesome','fuck yeah!','2010-12-27 16:42:04','2010-12-27 16:44:44','00:00:05'),
	(97,1,'UserProject','this is a \"user\" project','2010-12-27 16:30:17','2010-12-27 16:30:17','00:00:00'),
	(98,3,'Duh','i see whats going on there','2010-12-27 16:31:06','2010-12-27 16:31:06','00:00:00');

/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table timers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `timers`;

CREATE TABLE `timers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

LOCK TABLES `timers` WRITE;
/*!40000 ALTER TABLE `timers` DISABLE KEYS */;
INSERT INTO `timers` (`id`,`project_id`,`title`,`time`,`description`,`created`,`modified`,`user_id`)
VALUES
	(1,1,'test timer','00:00:06','test desc','2010-12-26 18:25:39','2010-12-26 18:25:39',1),
	(2,1,'test','00:00:08','desc','2010-12-26 18:26:50','2010-12-26 18:26:50',1),
	(3,1,'test','00:00:02','test','2010-12-26 19:07:12','2010-12-26 19:07:12',1),
	(4,1,'This is the title','00:00:06','this is the desc','2010-12-26 19:07:38','2010-12-26 19:07:38',1),
	(5,2,'Coding timer app','00:03:48','this is the first timer for Demo2','2010-12-26 20:08:02','2010-12-26 20:08:02',1),
	(6,1,'test non pause','00:09:33','test','2010-12-26 20:57:25','2010-12-26 20:57:25',1),
	(7,1,'Test','00:00:09','test','2010-12-27 12:14:46','2010-12-27 12:14:46',1),
	(8,1,'New Timer','00:10:20','yo yo','2010-12-27 15:17:33','2010-12-27 15:17:33',1),
	(9,99,'test timer for user','00:00:05','user timer 1','2010-12-27 16:43:42','2010-12-27 16:43:42',3);

/*!40000 ALTER TABLE `timers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`username`,`password`,`group_id`,`created`,`modified`)
VALUES
	(1,'Travis Berry','a24810a24c3f23d3546aaa678ad0d9ee52ad0241',1,'2010-12-26 17:29:53','2010-12-26 17:29:53'),
	(2,'test1','94761cde188ee84b7112b36df5e768b791e422f1',2,'2010-12-26 17:30:06','2010-12-26 17:30:06'),
	(3,'test2','94761cde188ee84b7112b36df5e768b791e422f1',3,'2010-12-26 17:30:14','2010-12-26 17:30:14'),
	(4,'testUser1','94761cde188ee84b7112b36df5e768b791e422f1',3,'2010-12-27 16:10:42','2010-12-27 16:10:42');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table widgets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `widgets`;

CREATE TABLE `widgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `part_no` varchar(12) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;






/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
