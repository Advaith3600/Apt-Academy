# ************************************************************
# Sequel Pro SQL dump
# Version 5224
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 8.0.11)
# Database: apt
# Generation Time: 2018-08-04 15:04:49 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table standards
# ------------------------------------------------------------

LOCK TABLES `standards` WRITE;
/*!40000 ALTER TABLE `standards` DISABLE KEYS */;

INSERT INTO `standards` (`id`, `syllabus`, `subjects`, `class`, `created_at`, `updated_at`)
VALUES
	(1,'CBSE','a:1:{s:8:\"subjects\";a:2:{i:0;a:2:{i:0;s:5:\"Maths\";i:1;i:6000;}i:1;a:2:{i:0;s:7:\"Science\";i:1;i:6000;}}}','8','2018-08-04 13:25:06','2018-08-04 13:25:06'),
	(2,'CBSE','a:1:{s:8:\"subjects\";a:2:{i:0;a:2:{i:0;s:5:\"Maths\";i:1;i:6000;}i:1;a:2:{i:0;s:7:\"Science\";i:1;i:6000;}}}','9','2018-08-04 13:25:06','2018-08-04 13:25:06'),
	(3,'CBSE','a:1:{s:8:\"subjects\";a:2:{i:0;a:2:{i:0;s:5:\"Maths\";i:1;i:6000;}i:1;a:2:{i:0;s:7:\"Science\";i:1;i:6000;}}}','10','2018-08-04 13:25:06','2018-08-04 13:25:06'),
	(4,'CBSE','a:1:{s:8:\"subjects\";a:5:{i:0;a:2:{i:0;s:5:\"Maths\";i:1;i:6000;}i:1;a:2:{i:0;s:7:\"Biology\";i:1;i:6000;}i:2;a:2:{i:0;s:7:\"Physics\";i:1;i:6000;}i:3;a:2:{i:0;s:9:\"Chemistry\";i:1;i:6000;}i:4;a:2:{i:0;s:8:\"Computer\";i:1;i:6000;}}}','11 Science','2018-08-04 13:25:06','2018-08-04 13:25:06'),
	(5,'CBSE','a:1:{s:8:\"subjects\";a:1:{i:0;a:2:{i:0;s:5:\"Maths\";i:1;i:6000;}}}','11 Commerce','2018-08-04 13:25:06','2018-08-04 13:25:06'),
	(6,'CBSE','a:1:{s:8:\"subjects\";a:5:{i:0;a:2:{i:0;s:5:\"Maths\";i:1;i:6000;}i:1;a:2:{i:0;s:7:\"Biology\";i:1;i:6000;}i:2;a:2:{i:0;s:7:\"Physics\";i:1;i:6000;}i:3;a:2:{i:0;s:9:\"Chemistry\";i:1;i:6000;}i:4;a:2:{i:0;s:8:\"Computer\";i:1;i:6000;}}}','12 Science','2018-08-04 13:25:06','2018-08-04 13:25:06'),
	(7,'CBSE','a:1:{s:8:\"subjects\";a:1:{i:0;a:2:{i:0;s:5:\"Maths\";i:1;i:6000;}}}','12 Commerce','2018-08-04 13:25:06','2018-08-04 13:25:06'),
	(8,'State','a:1:{s:8:\"subjects\";a:1:{i:0;a:2:{i:0;s:11:\"All Subject\";i:1;i:6000;}}} ','8','2018-08-04 13:25:06','2018-08-04 13:25:06'),
	(9,'State','a:1:{s:8:\"subjects\";a:1:{i:0;a:2:{i:0;s:11:\"All Subject\";i:1;i:6000;}}} ','9','2018-08-04 13:25:06','2018-08-04 13:25:06'),
	(10,'State','a:1:{s:8:\"subjects\";a:1:{i:0;a:2:{i:0;s:11:\"All Subject\";i:1;i:6000;}}} ','10','2018-08-04 13:25:06','2018-08-04 13:25:06'),
	(11,'State','a:1:{s:8:\"subjects\";a:5:{i:0;a:2:{i:0;s:5:\"Maths\";i:1;i:6000;}i:1;a:2:{i:0;s:7:\"Biology\";i:1;i:6000;}i:2;a:2:{i:0;s:7:\"Physics\";i:1;i:6000;}i:3;a:2:{i:0;s:9:\"Chemistry\";i:1;i:6000;}i:4;a:2:{i:0;s:8:\"Computer\";i:1;i:6000;}}}','11 Science','2018-08-04 13:25:06','2018-08-04 13:25:06'),
	(12,'State','a:1:{s:8:\"subjects\";a:1:{i:0;a:2:{i:0;s:5:\"Maths\";i:1;i:6000;}}}','11 Commerce','2018-08-04 13:25:06','2018-08-04 13:25:06'),
	(13,'State','a:1:{s:8:\"subjects\";a:5:{i:0;a:2:{i:0;s:5:\"Maths\";i:1;i:6000;}i:1;a:2:{i:0;s:7:\"Biology\";i:1;i:6000;}i:2;a:2:{i:0;s:7:\"Physics\";i:1;i:6000;}i:3;a:2:{i:0;s:9:\"Chemistry\";i:1;i:6000;}i:4;a:2:{i:0;s:8:\"Computer\";i:1;i:6000;}}}','12 Science','2018-08-04 13:25:06','2018-08-04 13:25:06'),
	(14,'State','a:1:{s:8:\"subjects\";a:1:{i:0;a:2:{i:0;s:5:\"Maths\";i:1;i:6000;}}}','12 Commerce','2018-08-04 13:25:07','2018-08-04 13:25:07'),
	(15,NULL,'a:1:{s:8:\"subjects\";a:1:{i:0;a:3:{i:0;s:5:\"B.com\";i:1;i:10000;i:2;b:1;}}}','B.com','2018-08-04 13:25:07','2018-08-04 13:25:07'),
	(16,'Grammar','a:1:{s:8:\"subjects\";a:1:{i:0;a:3:{i:0;s:25:\"English Special (Grammar)\";i:1;i:10000;i:2;b:1;}}}','English Special','2018-08-04 13:25:07','2018-08-04 13:25:07');

/*!40000 ALTER TABLE `standards` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
