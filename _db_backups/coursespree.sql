-- MySQL dump 10.11
--
-- Host: 50.63.236.41    Database: coursespree
-- ------------------------------------------------------
-- Server version	5.0.92-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cs_admin`
--

DROP TABLE IF EXISTS `cs_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_admin` (
  `id` int(12) NOT NULL auto_increment,
  `name` varchar(400) NOT NULL,
  `userName` varchar(400) NOT NULL,
  `password` varchar(400) NOT NULL,
  `email` varchar(400) NOT NULL,
  `paypalEmail` varchar(400) NOT NULL,
  `paypalApiCredentials` text NOT NULL,
  `dated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_admin`
--

LOCK TABLES `cs_admin` WRITE;
/*!40000 ALTER TABLE `cs_admin` DISABLE KEYS */;
INSERT INTO `cs_admin` VALUES (1,'Coursespree','admin','ddb756cb5b9d3c74d72f486d4e6adf7e','danishnadeem@gmail.com','danishnadeem@gmail.com','a:3:{s:17:\"paypalApiUsername\";s:27:\"danishnadeem_api1.gmail.com\";s:17:\"paypalApiPassword\";s:16:\"56GG4N9XD8N6XGRH\";s:18:\"paypalApiSignature\";s:56:\"AhrMi-Z-cO9vFmEKp.7XLvzRuExWAMGHxS0n9p.EhqPnzT-vLyfmTCH-\";}','2012-02-22 14:36:37');
/*!40000 ALTER TABLE `cs_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_comments`
--

DROP TABLE IF EXISTS `cs_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_comments` (
  `id` bigint(20) NOT NULL auto_increment,
  `fromUserID` bigint(20) NOT NULL,
  `toUserID` bigint(20) NOT NULL COMMENT 'if greater tha 0, means comment on user''s activity feed and not on user''s notice',
  `toNoticeID` int(12) NOT NULL COMMENT 'if greater tha 0, means comment on user''s notice and not on user''s activity wall means in this case toUserID=0',
  `comment` text NOT NULL,
  `dated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_comments`
--

LOCK TABLES `cs_comments` WRITE;
/*!40000 ALTER TABLE `cs_comments` DISABLE KEYS */;
INSERT INTO `cs_comments` VALUES (3,3,1,0,'my test comment on puneet\'s wall - test user','2012-03-12 15:10:43'),(4,1,1,0,'From Puneet first comment on his own\'s wall..:)','2012-03-12 15:17:42'),(7,1,0,4,'Testing comment section on notices','2012-03-12 16:09:44'),(8,17,0,0,'hi','2012-06-04 01:35:49'),(9,1,0,28,'Testing comments area','2012-06-06 00:20:07');
/*!40000 ALTER TABLE `cs_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_countries`
--

DROP TABLE IF EXISTS `cs_countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_countries` (
  `id` int(12) NOT NULL auto_increment,
  `name` varchar(400) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_countries`
--

LOCK TABLES `cs_countries` WRITE;
/*!40000 ALTER TABLE `cs_countries` DISABLE KEYS */;
INSERT INTO `cs_countries` VALUES (1,'United States');
/*!40000 ALTER TABLE `cs_countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_courses`
--

DROP TABLE IF EXISTS `cs_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_courses` (
  `id` int(12) NOT NULL auto_increment,
  `name` varchar(400) NOT NULL,
  `dated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_courses`
--

LOCK TABLES `cs_courses` WRITE;
/*!40000 ALTER TABLE `cs_courses` DISABLE KEYS */;
INSERT INTO `cs_courses` VALUES (1,'English','0000-00-00 00:00:00'),(2,'Hindi','0000-00-00 00:00:00'),(3,'Punjabi','0000-00-00 00:00:00'),(4,'Computer','0000-00-00 00:00:00'),(5,'test course','2012-06-11 00:07:17'),(7,'test course','2012-06-11 00:11:42');
/*!40000 ALTER TABLE `cs_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_departments`
--

DROP TABLE IF EXISTS `cs_departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_departments` (
  `id` int(12) NOT NULL auto_increment,
  `name` varchar(400) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_departments`
--

LOCK TABLES `cs_departments` WRITE;
/*!40000 ALTER TABLE `cs_departments` DISABLE KEYS */;
INSERT INTO `cs_departments` VALUES (1,'Graphic Arts'),(2,'Finance'),(3,'Fine Arts'),(4,'Fashion'),(5,'Classics'),(6,'Humanities & Fine Arts'),(7,'test dept'),(8,'test dept'),(9,'Information Management'),(10,'Coumpter Science');
/*!40000 ALTER TABLE `cs_departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_dept_course_rel`
--

DROP TABLE IF EXISTS `cs_dept_course_rel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_dept_course_rel` (
  `id` int(12) NOT NULL auto_increment,
  `schoolID` int(12) NOT NULL,
  `deptID` int(12) NOT NULL,
  `courseID` int(12) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_dept_course_rel`
--

LOCK TABLES `cs_dept_course_rel` WRITE;
/*!40000 ALTER TABLE `cs_dept_course_rel` DISABLE KEYS */;
INSERT INTO `cs_dept_course_rel` VALUES (1,1,1,1),(2,1,1,2),(3,6,5,3),(4,2,4,4),(5,6,5,1),(6,2,4,4),(7,1,2,1),(8,1,2,2),(9,10,7,5),(10,10,7,6),(11,10,8,7);
/*!40000 ALTER TABLE `cs_dept_course_rel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_docTypes`
--

DROP TABLE IF EXISTS `cs_docTypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_docTypes` (
  `id` int(12) NOT NULL auto_increment,
  `name` varchar(400) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_docTypes`
--

LOCK TABLES `cs_docTypes` WRITE;
/*!40000 ALTER TABLE `cs_docTypes` DISABLE KEYS */;
INSERT INTO `cs_docTypes` VALUES (1,'Outline'),(2,'Misc');
/*!40000 ALTER TABLE `cs_docTypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_notices`
--

DROP TABLE IF EXISTS `cs_notices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_notices` (
  `id` int(12) NOT NULL auto_increment,
  `userID` bigint(20) NOT NULL,
  `doc` varchar(400) NOT NULL,
  `coverImage` varchar(400) NOT NULL,
  `stateID` int(12) NOT NULL,
  `schoolID` int(12) NOT NULL,
  `deptID` int(12) NOT NULL,
  `courseID` int(12) NOT NULL,
  `term` varchar(400) NOT NULL,
  `professorID` int(12) NOT NULL,
  `docTypeID` int(12) NOT NULL,
  `docName` varchar(400) NOT NULL,
  `tips` text NOT NULL,
  `price` varchar(100) NOT NULL,
  `cp_fee_percentage` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL default '0' COMMENT '0=>unpublished, 1=>published',
  `dated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_notices`
--

LOCK TABLES `cs_notices` WRITE;
/*!40000 ALTER TABLE `cs_notices` DISABLE KEYS */;
INSERT INTO `cs_notices` VALUES (4,1,'test.txt','1331290474_ec_navigator.gif',1,1,1,2,'Fall 2008',4,2,'test','jhdb csd dsl dsvndslm vsdf12','111','','1','2012-03-07 21:18:40'),(5,1,'Assignment_#_6_-nadeem.docx','',1,1,2,1,'Summer 2008',1,1,'werwe','asdasd','10','','1','2012-03-08 01:28:08'),(8,1,'test1.txt','',1,1,1,2,'Fall 2011',4,1,'test1','test notices','123','','1','2012-03-09 11:20:49'),(9,1,'test2.txt','',1,1,1,1,'Fall 2011',1,1,'test2','fgc  lkn','140','','1','2012-03-09 11:36:59'),(10,1,'test.txt','1332149305_vaarcursus.jpg',1,1,1,1,'Winter 2010',1,1,'test notice','1231','12','','0','2012-03-19 14:57:45'),(11,1,'test.txt','1332149631_vaarcursus.jpg',1,1,1,1,'Winter 2008',1,1,'test 12','sdass','14','','1','2012-03-19 15:02:01'),(12,1,'testnew.txt','1332758536_warningVA.gif',1,1,2,2,'Fall 2012',3,1,'testnew','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','20','','1','2012-03-26 16:07:13'),(13,1,'week_11.docx','',1,1,1,1,'Fall 2008',0,0,'','','','','0','2012-04-09 22:40:51'),(14,4,'search_committe.pdf','',1,1,1,1,'Fall 2008',1,1,'search_committe','kgjhfjfhgf','20','','0','2012-04-24 13:05:19'),(15,4,'O_Connor_TAHG_Paper_For_Cause_and_Comrades_Book_Review.pdf','1337111914_Screen Shot 2012-05-15 at 3.58.17 PM.png',1,1,1,1,'Fall 2008',1,1,'O_Connor_TAHG_Paper_For_Cause_and_Comrades_Book_Review','lhkjg','40','','1','2012-05-15 12:57:22'),(16,10,'testfile.txt','',1,1,1,1,'Summer 2011',0,0,'','','','','0','2012-05-29 01:33:09'),(17,10,'testfile.txt','',3,6,5,1,'Summer 2011',0,0,'','','','','0','2012-05-29 01:35:27'),(18,10,'testfile.txt','',3,2,4,4,'Fall 2011',0,0,'','','','','0','2012-05-29 01:47:51'),(19,10,'testfile.txt','',3,2,4,4,'Fall 2011',0,0,'','','','','0','2012-05-29 01:48:26'),(20,10,'testfile.txt','',1,1,2,2,'Spring 2011',0,0,'','','','','0','2012-05-29 01:55:02'),(21,10,'testfile.txt','',1,1,2,1,'Fall 2008',0,0,'','','','','0','2012-05-29 01:56:14'),(22,10,'testfile.txt','',3,2,4,4,'Spring 2008',0,0,'','','','','0','2012-05-29 01:57:20'),(23,10,'testfile.txt','',3,2,4,4,'Spring 2008',0,0,'','','','','0','2012-05-29 02:32:39'),(24,10,'testfile.txt','',1,1,2,1,'Summer 2008',0,0,'','','','','0','2012-05-29 02:33:23'),(25,10,'testfile.txt','',1,1,1,1,'Fall 2011',0,0,'','','','','0','2012-05-29 02:34:14'),(26,10,'testfile.txt','',1,1,1,1,'Fall 2011',0,0,'','','','','0','2012-05-29 03:14:27'),(27,10,'testfile.txt','',1,1,1,1,'Fall 2011',0,0,'','','','','0','2012-05-29 03:14:32'),(28,1,'new.txt','1338966756_logo_emcinaambyachtbroker.jpg',1,1,1,1,'Fall 2008',1,1,'new','test tips','110','','1','2012-06-06 00:11:52'),(29,3,'test.rtf','1338967345_Screen Shot 2012-06-05 at 6.55.05 PM.png',1,1,1,1,'Summer 2008',1,1,'test','m','5','','1','2012-06-06 00:21:49'),(30,1,'new.txt','',1,1,1,2,'Summer 2008',0,0,'','','','','0','2012-06-06 00:23:51'),(31,1,'new.txt','1338967662_logo_sloeproeiver.gif',1,1,1,1,'Summer 2008',1,1,'new','testing','100','20','1','2012-06-06 00:27:14'),(32,13,'testfile.txt','',1,1,1,1,'Summer 2011',1,1,'testfile','cfsfsfs','5','','0','2012-06-07 05:40:29'),(33,20,'test.rtf','1339135409_logo.jpg',1,1,1,1,'Fall 2008',1,1,'test','test','10','','1','2012-06-07 23:01:46'),(34,1,'test.txt','1339135653_jachtlak3.jpg',1,1,2,1,'Summer 2008',1,1,'test','test notice lipsum data goes there','200','20','1','2012-06-07 23:07:06'),(35,21,'testtt.txt','1339388701_fileupload.html',1,1,1,1,'Spring 2012',1,1,'testtt','afasdfsfsdf','100','20','1','2012-06-10 21:22:56'),(36,21,'testtt.txt','1339388838_upload.php',1,1,1,1,'Spring 2012',1,1,'testttttt','testttttt','1','20','1','2012-06-10 21:26:30');
/*!40000 ALTER TABLE `cs_notices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_pages`
--

DROP TABLE IF EXISTS `cs_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_pages` (
  `id` int(12) NOT NULL auto_increment,
  `slug` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `meta_title` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `dated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_pages`
--

LOCK TABLES `cs_pages` WRITE;
/*!40000 ALTER TABLE `cs_pages` DISABLE KEYS */;
INSERT INTO `cs_pages` VALUES (1,'about-us','About Us','<div id=\"lipsum\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac  pharetra felis. Quisque semper tempus dictum. Phasellus sagittis elit  fringilla quam venenatis at aliquam libero elementum. Etiam neque elit,  malesuada vitae mattis in, ullamcorper sed velit. Suspendisse tincidunt,  lorem ut fermentum ornare, nisl tellus mattis quam, ut hendrerit nibh  libero ac ligula. Pellentesque hendrerit egestas enim et tempus.  Maecenas aliquet ultricies tellus, eget adipiscing ante tempor vel.  Mauris posuere suscipit euismod.</p>\r\n<p>Vestibulum molestie neque quis orci elementum placerat. Phasellus a  risus a tellus aliquet bibendum vel at mi. Fusce faucibus quam ac eros  congue posuere. Integer ornare, urna a aliquam convallis, ipsum elit  porta ante, dictum sollicitudin erat neque ut tellus. Suspendisse quis  libero vel orci faucibus sagittis. Sed mattis magna sed leo molestie  iaculis. Integer lacinia nibh at risus vehicula dapibus. Integer gravida  rutrum mi, quis bibendum orci sagittis sit amet.</p>\r\n<p>Sed eu magna lorem. Aliquam erat volutpat. Cras eleifend interdum orci  id commodo. Vivamus molestie adipiscing felis ut varius. Morbi turpis  dui, iaculis eu iaculis ut, adipiscing sit amet sapien. Sed nec est  augue, quis mattis velit. Suspendisse sit amet posuere metus.</p>\r\n<p>Duis fringilla varius eleifend. In in purus neque. In mollis sapien  suscipit orci aliquet et ornare sem tincidunt. Nam ut sa<strong>pien eros. Sed  fringilla adipiscing odio ullamcorper mattis. Sed vitae velit magna, nec  semper orci. Cum sociis natoque penatibus et magnis dis parturient  montes, nascetur ridiculus mus. Mauris sed enim et purus egestas  sodales. Nulla dapibus tortor cursus justo viverra non fermentum turpis  iaculis. Donec ut sem ac est dictum f</strong>aucibus.</p>\r\n<p>Phasellus enim massa, scelerisque sed ultrices ut, sodales eget orci.  Nulla aliquet mollis malesuada. Donec eu ligula nibh. Vivamus et erat  mauris. Class aptent taciti sociosqu ad litora torquent per conubia  nostra, per inceptos himenaeos. Suspendisse condimentum tincidunt risus,  id euismod nisi luctus quis. Vivamus enim sem, pellentesque vitae  hendrerit ut, elementum ac felis. Sed vel augue metus. Cras pretium  feugiat blandit. Cras sit amet est enim. Cras cursus tincidunt turpis  vitae feugiat. Maecenas dolor mi, cursus quis auctor id, porttitor  fringilla justo. Maecenas porta porttitor cursus. Phasellus felis ipsum,  commodo eu facilisis dictum, auctor at massa. Nullam scelerisque luctus  enim nec elementum. Nam tristique vestibulum turpis sit amet volutpat.</p>\r\n</div>','About Us','About Us - meta description goes here test','about, coursespree','2012-04-03 17:28:20'),(6,'test','test','<p>&nbsp;test</p>','','','','2012-06-07 23:00:45'),(7,'terms-conditions','Terms & Conditions','<p>test</p>','terms conditions','','','2012-06-10 23:09:44');
/*!40000 ALTER TABLE `cs_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_professors`
--

DROP TABLE IF EXISTS `cs_professors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_professors` (
  `id` int(12) NOT NULL auto_increment,
  `courseID` int(12) NOT NULL,
  `name` varchar(400) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_professors`
--

LOCK TABLES `cs_professors` WRITE;
/*!40000 ALTER TABLE `cs_professors` DISABLE KEYS */;
INSERT INTO `cs_professors` VALUES (1,1,'Professor 1'),(2,4,'Professor 2');
/*!40000 ALTER TABLE `cs_professors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_purchases`
--

DROP TABLE IF EXISTS `cs_purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_purchases` (
  `id` bigint(200) NOT NULL auto_increment,
  `userID` bigint(20) NOT NULL,
  `noticeID` bigint(20) NOT NULL,
  `price` varchar(100) NOT NULL,
  `paypal_charges` varchar(400) NOT NULL,
  `transaction` text NOT NULL,
  `active` enum('0','1') NOT NULL default '0',
  `dated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_purchases`
--

LOCK TABLES `cs_purchases` WRITE;
/*!40000 ALTER TABLE `cs_purchases` DISABLE KEYS */;
INSERT INTO `cs_purchases` VALUES (1,14,12,'20.00','0.88','a:38:{s:8:\"mc_gross\";s:5:\"20.00\";s:22:\"protection_eligibility\";s:10:\"Ineligible\";s:12:\"item_number1\";s:0:\"\";s:8:\"payer_id\";s:13:\"3L9CYV6AE884S\";s:3:\"tax\";s:4:\"0.00\";s:12:\"payment_date\";s:25:\"21:28:15 Jun 04, 2012 PDT\";s:14:\"payment_status\";s:9:\"Completed\";s:7:\"charset\";s:12:\"windows-1252\";s:11:\"mc_shipping\";s:4:\"0.00\";s:11:\"mc_handling\";s:4:\"0.00\";s:10:\"first_name\";s:6:\"Subodh\";s:6:\"mc_fee\";s:4:\"0.88\";s:14:\"notify_version\";s:3:\"3.4\";s:6:\"custom\";s:0:\"\";s:12:\"payer_status\";s:8:\"verified\";s:8:\"business\";s:42:\"subodh_1338802242_biz@jst-technologies.com\";s:14:\"num_cart_items\";s:1:\"1\";s:12:\"mc_handling1\";s:4:\"0.00\";s:11:\"payer_email\";s:42:\"subodh_1331706508_per@jst-technologies.com\";s:11:\"verify_sign\";s:56:\"AKDdEE-jQjDh7oaW1TrhpVkuqVijANVIiwVkiiDBXlQ3GLUWrY5iSO01\";s:12:\"mc_shipping1\";s:4:\"0.00\";s:4:\"tax1\";s:4:\"0.00\";s:6:\"txn_id\";s:17:\"44J99843B8171943X\";s:12:\"payment_type\";s:7:\"instant\";s:9:\"last_name\";s:6:\"Bansal\";s:10:\"item_name1\";s:7:\"testnew\";s:14:\"receiver_email\";s:42:\"subodh_1338802242_biz@jst-technologies.com\";s:11:\"payment_fee\";s:4:\"0.88\";s:9:\"quantity1\";s:1:\"1\";s:11:\"receiver_id\";s:13:\"KMGGU2WMMUM3W\";s:8:\"txn_type\";s:4:\"cart\";s:10:\"mc_gross_1\";s:5:\"20.00\";s:11:\"mc_currency\";s:3:\"USD\";s:17:\"residence_country\";s:2:\"US\";s:8:\"test_ipn\";s:1:\"1\";s:19:\"transaction_subject\";s:20:\"Shopping Carttestnew\";s:13:\"payment_gross\";s:5:\"20.00\";s:20:\"merchant_return_link\";s:10:\"click here\";}','1','2012-06-04 21:28:29'),(2,14,31,'120.00','3.78','a:38:{s:8:\"mc_gross\";s:6:\"120.00\";s:22:\"protection_eligibility\";s:10:\"Ineligible\";s:12:\"item_number1\";s:0:\"\";s:8:\"payer_id\";s:13:\"3L9CYV6AE884S\";s:3:\"tax\";s:4:\"0.00\";s:12:\"payment_date\";s:25:\"02:17:46 Jun 06, 2012 PDT\";s:14:\"payment_status\";s:9:\"Completed\";s:7:\"charset\";s:12:\"windows-1252\";s:11:\"mc_shipping\";s:4:\"0.00\";s:11:\"mc_handling\";s:4:\"0.00\";s:10:\"first_name\";s:6:\"Subodh\";s:6:\"mc_fee\";s:4:\"3.78\";s:14:\"notify_version\";s:3:\"3.4\";s:6:\"custom\";s:0:\"\";s:12:\"payer_status\";s:8:\"verified\";s:8:\"business\";s:42:\"subodh_1338802242_biz@jst-technologies.com\";s:14:\"num_cart_items\";s:1:\"1\";s:12:\"mc_handling1\";s:4:\"0.00\";s:11:\"payer_email\";s:42:\"subodh_1331706508_per@jst-technologies.com\";s:11:\"verify_sign\";s:56:\"AFcWxV21C7fd0v3bYYYRCpSSRl31AjfJf8qrsw2rdLYPtGZXLICfkkxr\";s:12:\"mc_shipping1\";s:4:\"0.00\";s:4:\"tax1\";s:4:\"0.00\";s:6:\"txn_id\";s:17:\"7TU89476TK268191W\";s:12:\"payment_type\";s:7:\"instant\";s:9:\"last_name\";s:6:\"Bansal\";s:10:\"item_name1\";s:3:\"new\";s:14:\"receiver_email\";s:42:\"subodh_1338802242_biz@jst-technologies.com\";s:11:\"payment_fee\";s:4:\"3.78\";s:9:\"quantity1\";s:1:\"1\";s:11:\"receiver_id\";s:13:\"KMGGU2WMMUM3W\";s:8:\"txn_type\";s:4:\"cart\";s:10:\"mc_gross_1\";s:6:\"120.00\";s:11:\"mc_currency\";s:3:\"USD\";s:17:\"residence_country\";s:2:\"US\";s:8:\"test_ipn\";s:1:\"1\";s:19:\"transaction_subject\";s:16:\"Shopping Cartnew\";s:13:\"payment_gross\";s:6:\"120.00\";s:20:\"merchant_return_link\";s:10:\"click here\";}','1','2012-06-06 02:17:59'),(3,14,31,'120.00','3.78','a:38:{s:8:\"mc_gross\";s:6:\"120.00\";s:22:\"protection_eligibility\";s:10:\"Ineligible\";s:12:\"item_number1\";s:0:\"\";s:8:\"payer_id\";s:13:\"3L9CYV6AE884S\";s:3:\"tax\";s:4:\"0.00\";s:12:\"payment_date\";s:25:\"02:48:00 Jun 06, 2012 PDT\";s:14:\"payment_status\";s:9:\"Completed\";s:7:\"charset\";s:12:\"windows-1252\";s:11:\"mc_shipping\";s:4:\"0.00\";s:11:\"mc_handling\";s:4:\"0.00\";s:10:\"first_name\";s:6:\"Subodh\";s:6:\"mc_fee\";s:4:\"3.78\";s:14:\"notify_version\";s:3:\"3.4\";s:6:\"custom\";s:0:\"\";s:12:\"payer_status\";s:8:\"verified\";s:8:\"business\";s:42:\"subodh_1338802242_biz@jst-technologies.com\";s:14:\"num_cart_items\";s:1:\"1\";s:12:\"mc_handling1\";s:4:\"0.00\";s:11:\"payer_email\";s:42:\"subodh_1331706508_per@jst-technologies.com\";s:11:\"verify_sign\";s:56:\"AFcWxV21C7fd0v3bYYYRCpSSRl31AQ76uBrrfZ4c0Gh3wRwUhsAc5AgQ\";s:12:\"mc_shipping1\";s:4:\"0.00\";s:4:\"tax1\";s:4:\"0.00\";s:6:\"txn_id\";s:17:\"2RK9084461692182E\";s:12:\"payment_type\";s:7:\"instant\";s:9:\"last_name\";s:6:\"Bansal\";s:10:\"item_name1\";s:3:\"new\";s:14:\"receiver_email\";s:42:\"subodh_1338802242_biz@jst-technologies.com\";s:11:\"payment_fee\";s:4:\"3.78\";s:9:\"quantity1\";s:1:\"1\";s:11:\"receiver_id\";s:13:\"KMGGU2WMMUM3W\";s:8:\"txn_type\";s:4:\"cart\";s:10:\"mc_gross_1\";s:6:\"120.00\";s:11:\"mc_currency\";s:3:\"USD\";s:17:\"residence_country\";s:2:\"US\";s:8:\"test_ipn\";s:1:\"1\";s:19:\"transaction_subject\";s:16:\"Shopping Cartnew\";s:13:\"payment_gross\";s:6:\"120.00\";s:20:\"merchant_return_link\";s:10:\"click here\";}','1','2012-06-06 02:48:17'),(4,14,31,'120.00','3.78','a:38:{s:8:\"mc_gross\";s:6:\"120.00\";s:22:\"protection_eligibility\";s:10:\"Ineligible\";s:12:\"item_number1\";s:0:\"\";s:8:\"payer_id\";s:13:\"3L9CYV6AE884S\";s:3:\"tax\";s:4:\"0.00\";s:12:\"payment_date\";s:25:\"02:58:44 Jun 06, 2012 PDT\";s:14:\"payment_status\";s:9:\"Completed\";s:7:\"charset\";s:12:\"windows-1252\";s:11:\"mc_shipping\";s:4:\"0.00\";s:11:\"mc_handling\";s:4:\"0.00\";s:10:\"first_name\";s:6:\"Subodh\";s:6:\"mc_fee\";s:4:\"3.78\";s:14:\"notify_version\";s:3:\"3.4\";s:6:\"custom\";s:0:\"\";s:12:\"payer_status\";s:8:\"verified\";s:8:\"business\";s:42:\"subodh_1338802242_biz@jst-technologies.com\";s:14:\"num_cart_items\";s:1:\"1\";s:12:\"mc_handling1\";s:4:\"0.00\";s:11:\"payer_email\";s:42:\"subodh_1331706508_per@jst-technologies.com\";s:11:\"verify_sign\";s:56:\"AnMW6jMQSSLoZKyHZYl6L.Vkv5E2AkDqYFw.OpOzZs3SorAhhwVEHCoS\";s:12:\"mc_shipping1\";s:4:\"0.00\";s:4:\"tax1\";s:4:\"0.00\";s:6:\"txn_id\";s:17:\"4UB79499K1835913C\";s:12:\"payment_type\";s:7:\"instant\";s:9:\"last_name\";s:6:\"Bansal\";s:10:\"item_name1\";s:3:\"new\";s:14:\"receiver_email\";s:42:\"subodh_1338802242_biz@jst-technologies.com\";s:11:\"payment_fee\";s:4:\"3.78\";s:9:\"quantity1\";s:1:\"1\";s:11:\"receiver_id\";s:13:\"KMGGU2WMMUM3W\";s:8:\"txn_type\";s:4:\"cart\";s:10:\"mc_gross_1\";s:6:\"120.00\";s:11:\"mc_currency\";s:3:\"USD\";s:17:\"residence_country\";s:2:\"US\";s:8:\"test_ipn\";s:1:\"1\";s:19:\"transaction_subject\";s:16:\"Shopping Cartnew\";s:13:\"payment_gross\";s:6:\"120.00\";s:20:\"merchant_return_link\";s:10:\"click here\";}','1','2012-06-06 02:58:57'),(5,1,31,'120.00','3.78','a:39:{s:8:\"mc_gross\";s:6:\"120.00\";s:22:\"protection_eligibility\";s:10:\"Ineligible\";s:12:\"item_number1\";s:0:\"\";s:8:\"payer_id\";s:13:\"9W6TWAGCGLR8C\";s:3:\"tax\";s:4:\"0.00\";s:12:\"payment_date\";s:25:\"22:03:22 Jun 07, 2012 PDT\";s:14:\"payment_status\";s:9:\"Completed\";s:7:\"charset\";s:12:\"windows-1252\";s:11:\"mc_shipping\";s:4:\"0.00\";s:11:\"mc_handling\";s:4:\"0.00\";s:10:\"first_name\";s:6:\"subodh\";s:6:\"mc_fee\";s:4:\"3.78\";s:14:\"notify_version\";s:3:\"3.4\";s:6:\"custom\";s:0:\"\";s:12:\"payer_status\";s:8:\"verified\";s:8:\"business\";s:42:\"subodh_1338802242_biz@jst-technologies.com\";s:14:\"num_cart_items\";s:1:\"1\";s:12:\"mc_handling1\";s:4:\"0.00\";s:11:\"payer_email\";s:42:\"subodh_1339068436_biz@jst-technologies.com\";s:11:\"verify_sign\";s:56:\"AyAfBaRmyjeK.jShmi1AqfVNkepcAFHJFwV.ha0Lc8oWPsRkiqGv5pJO\";s:12:\"mc_shipping1\";s:4:\"0.00\";s:4:\"tax1\";s:4:\"0.00\";s:6:\"txn_id\";s:17:\"1ST16783XA417725D\";s:12:\"payment_type\";s:7:\"instant\";s:19:\"payer_business_name\";s:27:\"subodh bansal\'s Test Store\";s:9:\"last_name\";s:6:\"bansal\";s:10:\"item_name1\";s:3:\"new\";s:14:\"receiver_email\";s:42:\"subodh_1338802242_biz@jst-technologies.com\";s:11:\"payment_fee\";s:4:\"3.78\";s:9:\"quantity1\";s:1:\"1\";s:11:\"receiver_id\";s:13:\"KMGGU2WMMUM3W\";s:8:\"txn_type\";s:4:\"cart\";s:10:\"mc_gross_1\";s:6:\"120.00\";s:11:\"mc_currency\";s:3:\"USD\";s:17:\"residence_country\";s:2:\"US\";s:8:\"test_ipn\";s:1:\"1\";s:19:\"transaction_subject\";s:16:\"Shopping Cartnew\";s:13:\"payment_gross\";s:6:\"120.00\";s:20:\"merchant_return_link\";s:10:\"click here\";}','1','2012-06-07 22:03:35');
/*!40000 ALTER TABLE `cs_purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_question_answer_comments`
--

DROP TABLE IF EXISTS `cs_question_answer_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_question_answer_comments` (
  `id` bigint(20) NOT NULL auto_increment,
  `userID` bigint(20) NOT NULL,
  `pID` bigint(20) NOT NULL,
  `pType` enum('ques','ans') NOT NULL default 'ques',
  `comment` text NOT NULL,
  `dated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_question_answer_comments`
--

LOCK TABLES `cs_question_answer_comments` WRITE;
/*!40000 ALTER TABLE `cs_question_answer_comments` DISABLE KEYS */;
INSERT INTO `cs_question_answer_comments` VALUES (4,1,2,'ans','<p>Phasellus dapibus, urna id cursus lacinia, ligula leo tristique metus, vel suscipit leo leo nec lectus. Curabitur sem est, Phasellus dapibus, urna id cursus lacinia, ligula leo tristique metus, vel <strong>suscipit leo leo nec lectus. Curabitur sem est,</strong></p>','2012-03-22 18:18:06'),(5,1,1,'ans','<p>vitae semper ipsum turpis id dui. Morbi non mi sed metus ultrices vitae semper ipsum turpis id dui. Morbi non mi sed metus ultrices</p>','2012-03-22 18:18:20'),(6,1,1,'ans','<p>Curabitur fermentum odio non nisl accumsan non aliquet erat tincidunt. Ut mollis risus ut purus porttitor dictum. Fusce pretium libero nec augue varius faucibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>','2012-03-22 18:18:43'),(7,1,3,'ans','<p>Maecenas leo metus, vestibulum nec ultricies imperdiet, faucibus in velit. Nam rutru</p>','2012-03-22 18:19:37'),(8,1,2,'ques','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mollis  metus vitae nulla tincidunt quis convallis ligula venenatis. Morbi eu  purus magna, <strong>sed ornare nulla. Praesent sed tortor dolor. Vestibulum  tincidunt iaculis enim, molestie faucibus lacus cursus </strong>eu. Mauris  aliquet urna</p>','2012-03-22 18:23:11'),(9,1,4,'ans','<p>test comment 22</p>','2012-03-22 18:24:29'),(10,1,2,'ques','<p>Test comment 1</p>','2012-03-26 15:36:16'),(11,20,16,'ans','<p>ad</p>','2012-06-05 15:45:51');
/*!40000 ALTER TABLE `cs_question_answer_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_question_answers`
--

DROP TABLE IF EXISTS `cs_question_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_question_answers` (
  `id` bigint(20) NOT NULL auto_increment,
  `questionID` bigint(20) NOT NULL,
  `userID` bigint(20) NOT NULL,
  `answer` text NOT NULL,
  `status` enum('pending','approved') NOT NULL default 'pending',
  `dated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_question_answers`
--

LOCK TABLES `cs_question_answers` WRITE;
/*!40000 ALTER TABLE `cs_question_answers` DISABLE KEYS */;
INSERT INTO `cs_question_answers` VALUES (5,2,1,'<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type spe<strong>cimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passag</strong>es, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>','approved','2012-03-26 15:07:29'),(2,2,1,'<p><strong>Sed at accumsan arcu. Donec nisi massa, imperdiet ac sagittis ac, mattis et dui. Vestibulum adipiscing, quam vel ullamco</strong><em>rper viverra, enim velit imperdiet nisl, sit amet tristique est sem vel nibh. Nunc suscipit porta leo et pharetra.</em><strong><em> Pellentesque rhoncus moll</em>is tellus, sed dictum dui convallis eu. Aenean velit erat, faucibus nec volutpat quis, eleifend id lacus. In ut consequat arcu. Phasellus vel sodales dolor.</strong></p>','approved','2012-03-22 18:16:02'),(6,5,8,'<p>mhjhfghfh</p>','approved','2012-05-15 13:24:36'),(12,7,1,'<p><span>ac diam eget velit semper sollicitudin sed vitae ipsum. Pellentesque lobortis ultricies lacus, nec sagittis erat hendrerit vitae. Vestib</span></p>','pending','2012-05-30 05:32:50'),(13,7,1,'<p><span>t mollis quis, dapibus id ante. Aliquam dapibus euismod tortor, et facilisis neque pulvinar ut. Fusce ut consectetur eros. Sed matti</span></p>','pending','2012-05-30 05:32:55'),(14,7,14,'<p>n volutpat interdum dolor a congue. Sed sodales nibh nisi. Quisque iaculis dictum odio sed ornare. Aliquam erat volutpat. Donec consequat sem id libero condimentum lobortis loborti<strong>s leo varius. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas blandit dignissim ips</strong> for 100$ .. :)</p>','pending','2012-06-04 22:10:01'),(15,7,3,'<p>a</p>','pending','2012-06-04 22:43:23'),(16,7,20,'<p>ads</p>','pending','2012-06-05 15:45:47'),(17,8,14,'<p><strong> gravida sed interdum auctor, lobortis sit amet neque. Integer ac mauris ac est volutpat ullamcorper.</strong></p>','approved','2012-06-06 03:20:20'),(18,8,14,'<p>dignissim et risus. Donec viverra ullamcorper mauris, sed porta tortor adipiscing in. Etiam vel</p>','approved','2012-06-06 03:20:32'),(19,9,14,'<p>Testing answer for price</p>','approved','2012-06-07 04:33:43'),(20,9,14,'<p>Testing ands 2</p>','approved','2012-06-07 04:42:02'),(21,10,21,'<p>hdsf</p>','pending','2012-06-07 23:59:14'),(22,11,14,'<p><strong>nly five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960</strong></p>','pending','2012-06-08 00:07:13'),(23,12,20,'<p>testsetetststs</p>','pending','2012-06-10 21:45:54'),(24,12,20,'<p>testes</p>','pending','2012-06-10 21:51:34');
/*!40000 ALTER TABLE `cs_question_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_question_categories`
--

DROP TABLE IF EXISTS `cs_question_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_question_categories` (
  `id` int(12) NOT NULL auto_increment,
  `name` varchar(400) NOT NULL,
  `dated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_question_categories`
--

LOCK TABLES `cs_question_categories` WRITE;
/*!40000 ALTER TABLE `cs_question_categories` DISABLE KEYS */;
INSERT INTO `cs_question_categories` VALUES (1,'Beauty','2012-03-01 00:00:00'),(2,'Style','2012-03-02 00:00:00'),(3,'Cars','2012-03-01 00:00:00'),(4,'Bikes','2012-03-01 00:00:00'),(6,'English','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `cs_question_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_questions`
--

DROP TABLE IF EXISTS `cs_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_questions` (
  `id` bigint(20) NOT NULL auto_increment,
  `userID` bigint(20) NOT NULL,
  `caption` text NOT NULL,
  `description` text NOT NULL,
  `catID` int(12) NOT NULL,
  `price` varchar(100) NOT NULL,
  `cp_fee_percentage` varchar(100) NOT NULL,
  `tags` text NOT NULL,
  `status` enum('open','closed') NOT NULL default 'open',
  `dated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_questions`
--

LOCK TABLES `cs_questions` WRITE;
/*!40000 ALTER TABLE `cs_questions` DISABLE KEYS */;
INSERT INTO `cs_questions` VALUES (5,1,'adsad','<p>asdasds</p>',6,'10','','','closed','2012-05-15 13:23:54'),(6,4,'test','<p>test</p>',6,'10','','test,','open','2012-05-24 21:17:25'),(7,1,'Testing Question for price','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi mollis urna vitae dolor adipiscing eget volutpat ligula faucibus. Integer quam lectus, porta eu porta a, volutpat eu elit. Sed tristique tempus nulla sit amet faucibus. In non nibh quis turpis dictum consequat id sit amet nisl. Nam semper molestie vestibulum. Donec vitae felis ut arcu volutpat scelerisque. Phasellus massa enim, volutpat eget mollis quis, dapibus id ante. Aliquam dapibus euismod tortor, et facilisis neque pulvinar ut. Fusce ut consectetur eros. Sed mattis metus ut velit mollis suscipit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras dapibus tellus eu enim pharetra at cursus velit semper.</p>\r\n<p>In volutpat interdum dolor a congue. Sed sodales nibh nisi. Quisque iaculis dictum odio sed ornare. Aliquam erat volutpat. Donec consequat sem id libero condimentum lobortis loborti<strong>s leo varius. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas blandit dignissim ipsum vitae blandit. Aenean eget mi a dui variu</strong>s vestibulum porttitor convallis felis. In ac diam eget velit semper sollicitudin sed vitae ipsum. Pellentesque lobortis ultricies lacus, nec sagittis erat hendrerit vitae. Vestibulum lorem sapien, luctus non rutrum nec, convallis a justo. Nam est velit, pharetra rutrum blandit non, ullamcorper eu metus. Duis aliquet aliquet quam in auctor. Praesent vel felis nisi, vitae ultrices ipsum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras scelerisque aliquam orci.</p>',4,'100','','test1,test2,','open','2012-05-30 04:23:18'),(2,1,'My First Question','<p><strong>Lorem Ipsum</strong>12 is simply dummy text e<strong>dit testing of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type speci<em>men book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining ess</em></strong><em>entially unchanged. It w</em>as popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum testdata will be here.</p>',3,'20','','odesk,wordpress,joomla,test,','closed','2012-03-19 12:58:51'),(8,1,'Test question for coursespree fee','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sollicitudin bibendum leo et congue. Donec sed nulla ut sapien commodo sodales. Fusce egestas ullamcorper elementum. Etiam elementum pellentesque elit in tempus. Etiam velit turpis, vehicula ut commodo sit amet, pretium eu urna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ornare, mi quis porta lacinia, sem mi cursus quam, ac aliquam felis neque ut mi. Suspendisse quis lectus elit. Quisque justo odio, gravida sed interdum auctor, lobortis sit amet neque. Integer ac mauris ac est volutpat ullamcorper.</p>\r\n<p>Duis massa ligula, consequat nec tempus ut, porta at massa. Phasellus ut erat a nisi gravida dignissim. Cras enim enim, iaculis et gravida sed, dignissim et risus. Donec viverra ullamcorper mauris, sed porta tortor adipiscing in. Etiam vel ante eget dui varius imperdiet. Duis vel massa sit amet lacus malesuada condimentum at a libero. In ultrices orci vitae quam aliquam ut euismod lorem pellentesque.</p>',1,'100','20','','closed','2012-06-06 03:10:30'),(9,1,'Question 1','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut magna velit, blandit a tempus quis, volutpat ac enim. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas nec sapien quis neque vulputate pulvinar eget feugiat lorem. Quisque eu libero nisl, at semper elit. Donec eget nisi ante. Quisque egestas aliquam sagittis. Cras non pellentesque ipsum. Praesent semper dui accumsan quam auctor in gravida odio rhoncus. Duis vel elit non odio dictum iaculis sit amet et felis. In velit magna, interdum at tempor et, ornare id nisi. Curabitur eu justo a quam vulputate euismod at fringilla nunc.</p>\r\n<p>Nam vitae magna odio, molestie sollicitudin tellus. Nullam viverra ornare venenatis. Curabitur et magna neque. Aliquam id arcu nec neque imperdiet dictum eu non erat. Praesent elementum, lorem ac posuere interdum, purus arcu molestie velit, sit amet gravida turpis magna vitae sem. Aenean a neque lectus, in imperdiet nulla. Maecenas mi nibh, congue eget porttitor sit amet, laoreet in metus. Mauris lobortis rutrum augue, sed semper est egestas imperdiet.</p>',1,'100','20','testing,','closed','2012-06-07 04:33:09'),(10,20,'testing','<p>ts</p>',6,'150','','','open','2012-06-07 23:58:45'),(11,1,'Testing new question','<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',1,'200','20','test1,','open','2012-06-08 00:03:55'),(12,21,'test','<p>testeststst</p>',6,'10','20','','open','2012-06-10 21:45:17');
/*!40000 ALTER TABLE `cs_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_school_dept_rel`
--

DROP TABLE IF EXISTS `cs_school_dept_rel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_school_dept_rel` (
  `id` int(12) NOT NULL auto_increment,
  `schoolID` int(12) NOT NULL,
  `deptID` int(12) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_school_dept_rel`
--

LOCK TABLES `cs_school_dept_rel` WRITE;
/*!40000 ALTER TABLE `cs_school_dept_rel` DISABLE KEYS */;
INSERT INTO `cs_school_dept_rel` VALUES (1,1,1),(2,1,2),(3,2,1),(4,2,4),(7,6,5),(6,3,6),(8,10,7),(9,10,8),(10,9,9),(11,11,10);
/*!40000 ALTER TABLE `cs_school_dept_rel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_schools`
--

DROP TABLE IF EXISTS `cs_schools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_schools` (
  `id` int(12) NOT NULL auto_increment,
  `stateID` int(12) NOT NULL,
  `name` varchar(400) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_schools`
--

LOCK TABLES `cs_schools` WRITE;
/*!40000 ALTER TABLE `cs_schools` DISABLE KEYS */;
INSERT INTO `cs_schools` VALUES (1,1,'Air University'),(2,3,'Auburn University'),(4,2,'Auburn University'),(5,3,'Prince Institute of Professional Studies'),(6,3,'Bishop State Community College'),(7,4,'George Fox University'),(10,12,'test school'),(9,7,'Syracuse University'),(11,14,'SSD Govt. school');
/*!40000 ALTER TABLE `cs_schools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_states`
--

DROP TABLE IF EXISTS `cs_states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_states` (
  `id` int(12) NOT NULL auto_increment,
  `countryID` int(12) NOT NULL,
  `name` varchar(400) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_states`
--

LOCK TABLES `cs_states` WRITE;
/*!40000 ALTER TABLE `cs_states` DISABLE KEYS */;
INSERT INTO `cs_states` VALUES (1,1,'Alabma'),(2,1,'Alaska'),(3,1,'Arizona'),(4,1,'Florida'),(7,1,'New York'),(8,1,'Test state'),(9,1,'New Jersey'),(10,1,'Chicago'),(11,1,'Sydney'),(12,1,'test12'),(14,1,'Chandigarh');
/*!40000 ALTER TABLE `cs_states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_subscription`
--

DROP TABLE IF EXISTS `cs_subscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_subscription` (
  `id` bigint(20) NOT NULL auto_increment,
  `subscribeBy` bigint(20) NOT NULL,
  `subscribeTo` bigint(20) NOT NULL,
  `dated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_subscription`
--

LOCK TABLES `cs_subscription` WRITE;
/*!40000 ALTER TABLE `cs_subscription` DISABLE KEYS */;
INSERT INTO `cs_subscription` VALUES (7,1,3,'2012-03-16 20:29:14');
/*!40000 ALTER TABLE `cs_subscription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_user_address`
--

DROP TABLE IF EXISTS `cs_user_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_user_address` (
  `id` bigint(20) NOT NULL auto_increment,
  `userID` bigint(20) NOT NULL,
  `fName` varchar(400) NOT NULL,
  `lName` varchar(400) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(400) NOT NULL,
  `state` int(12) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `country` int(12) NOT NULL,
  `dated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_user_address`
--

LOCK TABLES `cs_user_address` WRITE;
/*!40000 ALTER TABLE `cs_user_address` DISABLE KEYS */;
INSERT INTO `cs_user_address` VALUES (1,1,'test fname','testlname','test address','test city',1,'78691123',1,'0000-00-00 00:00:00'),(2,4,'','','','',0,'',0,'0000-00-00 00:00:00'),(3,3,'','','','',0,'',0,'0000-00-00 00:00:00'),(4,20,'','','','',0,'',0,'0000-00-00 00:00:00'),(5,21,'','','','',0,'',0,'0000-00-00 00:00:00'),(6,14,'','','','',0,'',0,'0000-00-00 00:00:00'),(7,23,'','','','',0,'',0,'0000-00-00 00:00:00'),(8,26,'','','','',0,'',0,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `cs_user_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_user_school`
--

DROP TABLE IF EXISTS `cs_user_school`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_user_school` (
  `id` bigint(20) NOT NULL auto_increment,
  `userID` bigint(20) NOT NULL,
  `stateID` int(12) NOT NULL,
  `schoolID` int(12) NOT NULL,
  `departmentID` int(12) NOT NULL,
  `dated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_user_school`
--

LOCK TABLES `cs_user_school` WRITE;
/*!40000 ALTER TABLE `cs_user_school` DISABLE KEYS */;
INSERT INTO `cs_user_school` VALUES (1,1,3,2,0,'2012-03-06 15:03:09'),(2,2,1,1,1,'2012-03-06 20:37:40'),(3,3,1,1,1,'2012-03-12 15:09:07'),(4,4,0,9,0,'2012-03-13 13:03:25'),(5,5,1,1,1,'2012-03-14 10:58:30'),(6,6,1,1,1,'2012-03-14 11:06:38'),(7,8,1,1,1,'2012-03-14 11:08:17'),(8,9,1,1,1,'2012-03-14 11:16:00'),(9,10,1,1,1,'2012-03-14 11:18:49'),(10,11,3,2,1,'2012-03-14 12:11:07'),(11,12,0,0,0,'2012-03-14 13:27:15'),(12,13,1,1,1,'2012-03-14 13:28:22'),(13,14,7,9,0,'2012-03-15 04:39:43'),(14,15,0,0,0,'2012-06-01 02:38:11'),(15,16,1,1,1,'2012-06-02 13:30:57'),(16,19,7,9,0,'2012-06-05 14:55:39'),(17,20,7,9,0,'2012-06-05 15:06:55'),(18,21,7,9,0,'2012-06-06 00:24:04'),(19,22,2,4,0,'2012-06-06 01:26:42'),(20,23,7,9,0,'2012-06-08 17:32:44'),(21,24,1,1,1,'2012-06-10 21:46:25'),(22,25,1,1,1,'2012-06-10 21:48:11'),(23,26,7,9,0,'2012-06-11 01:15:40');
/*!40000 ALTER TABLE `cs_user_school` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cs_users`
--

DROP TABLE IF EXISTS `cs_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cs_users` (
  `id` bigint(200) NOT NULL auto_increment,
  `fName` varchar(400) NOT NULL,
  `lName` varchar(400) NOT NULL,
  `email` varchar(400) NOT NULL,
  `userName` varchar(400) NOT NULL,
  `password` varchar(400) NOT NULL,
  `gender` enum('m','f') NOT NULL default 'm',
  `dob` date NOT NULL,
  `avatar` varchar(400) NOT NULL,
  `paypalEmail` varchar(400) NOT NULL,
  `rate` varchar(100) NOT NULL,
  `type` enum('user','fb') NOT NULL default 'user',
  `fb_ID` varchar(100) NOT NULL,
  `active` enum('0','1') NOT NULL default '0',
  `dated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cs_users`
--

LOCK TABLES `cs_users` WRITE;
/*!40000 ALTER TABLE `cs_users` DISABLE KEYS */;
INSERT INTO `cs_users` VALUES (1,'puneet','chopra','subodh@jst-technologies.com','admin','ddb756cb5b9d3c74d72f486d4e6adf7e','m','1947-03-15','1333972175_renovatie4.jpg','subodh_1339068436_biz@jst-technologies.com','','user','','1','2012-03-22 17:58:07'),(2,'Subodh','Bansal','fb_subodh.virk@gmail.com','fb_subodhvirk','','m','0000-00-00','','','','fb','1112887865','1','2012-04-12 11:10:22'),(3,'Danish','Nadeem','fb_danishnadeem@gmail.com','fb_danishnadeem','','m','0000-00-00','','danishnadeem@gmail.com','','fb','754255284','1','2012-04-13 07:49:42'),(4,'Danish','Nadeem','danishnadeem@gmail.com','danish','5b119a961fcb523c81c25e8f79de2380','m','0000-00-00','','danishnadeem@gmail.com','','user','','1','2012-04-24 13:03:33'),(5,'lolg','asd','opu_designer@yahoo.com','opu_designer','a619dace561af621c2e179c687e7c5fd','m','0000-00-00','','','','user','','1','2012-05-01 06:20:20'),(6,'sa','sa','simoneurilla@fbscripts.co.in','simoneurilla','81b192a2cbbc738e8a724735501c2014','m','0000-00-00','','','','user','','1','2012-05-03 01:05:30'),(7,'Sam','Smith','fb_smith.samtechexpert@gmail.com','fb_smith.samtechexpert','','m','0000-00-00','','','','fb','100001272118633','1','2012-05-10 11:00:17'),(8,'Danish','Nadeem','fb_danish_nadeem@hotmail.com','fb_','','m','0000-00-00','','','','fb','100003301178886','1','2012-05-15 13:24:21'),(16,'ahmad','rabbani','a@b.com','ahmad33','a2778d498f17b17d7b137d1074af09f5','m','0000-00-00','','','','user','','0','2012-06-02 13:30:57'),(11,'nomi','shah','nomi@shah.com','nomi','e99a18c428cb38d5f260853678922e03','m','0000-00-00','','','','user','','0','2012-05-30 05:33:00'),(12,'admin','admin','admin@admin.com','admin1','21232f297a57a5a743894a0e4a801fc3','m','0000-00-00','','','','user','','0','2012-05-30 05:41:15'),(13,'Numan','Aslam','fb_bscs0610@gmail.com','fb_aslamnuman','','m','0000-00-00','','hea@you.com','','fb','100002451499209','1','2012-05-30 05:47:50'),(14,'test1','test2','test@test.com','testtest','05a671c66aefea124cc08b76ea6d30bb','m','0000-00-00','','subodh_1338976460_biz@jst-technologies.com','','user','','1','2012-05-30 07:20:31'),(15,'admin2','admin','admin@admin3.com','adm2','8839ceb3b5502287b9112a1577d175c6','m','0000-00-00','','','','user','','0','2012-06-01 02:38:11'),(17,'Ahmad','Rabbani','fb_ahmad_rabbani@hotmail.com','fb_ahmad.rabbani','','m','0000-00-00','','','','fb','557724219','1','2012-06-04 01:30:26'),(18,'Numan','Aslam','fb_aslamnuman@yahoo.com','fb_numan.aslam','','m','0000-00-00','','','','fb','615907458','1','2012-06-04 06:42:49'),(26,'danish','nadeem','danish@coursespree.com','danishnadeem','5b119a961fcb523c81c25e8f79de2380','m','0000-00-00','','','','user','','1','2012-06-11 01:15:40'),(20,'test','test','test@test1.com','test3','8ad8757baa8564dc136c1e07507f4a98','m','0000-00-00','','dnadeem@syr.edu','','user','','1','2012-06-05 15:06:55'),(21,'dan','nad','dan@dan.com','dan5','d4a0c877bfbda25d7875e5f7fa737ad5','m','0000-00-00','','dnadeem@syr.edu','','user','','1','2012-06-06 00:24:04'),(22,'1','2','1@1.com','12345','827ccb0eea8a706c4c34a16891f84e7b','m','0000-00-00','','','','user','','0','2012-06-06 01:26:42'),(23,'chad','ehrlich','cdehrlic@syr.edu','cdehrlic','e8ec22101bd0d610dcd1ffcc1693ddcb','m','0000-00-00','','','','user','','1','2012-06-08 17:32:44'),(24,'Kirat','Partap','kp@jst-technologies.com','kirat','05a671c66aefea124cc08b76ea6d30bb','m','0000-00-00','','','','user','','1','2012-06-10 21:46:25'),(25,'test6','test6','tes6t@test6.com','test6','4cfad7076129962ee70c36839a1e3e15','m','0000-00-00','','','','user','','0','2012-06-10 21:48:11');
/*!40000 ALTER TABLE `cs_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `~cs_course_private`
--

DROP TABLE IF EXISTS `~cs_course_private`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `~cs_course_private` (
  `id` tinyint(4) NOT NULL auto_increment,
  `public_doc_id` int(10) NOT NULL,
  `owner_id` int(10) NOT NULL,
  `doc_id` int(20) NOT NULL,
  `access_key` varchar(50) NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `~cs_course_private`
--

LOCK TABLES `~cs_course_private` WRITE;
/*!40000 ALTER TABLE `~cs_course_private` DISABLE KEYS */;
INSERT INTO `~cs_course_private` VALUES (30,32,10,95575968,'key-2bwlcghhmsgfpa98mbi',1),(29,31,10,95575723,'key-zt2kqthp092c3heq8ub',1),(31,33,13,95646152,'key-b0xxfdwb7c2ools900j',1),(32,34,3,95684431,'key-1doyxq018s87ur4wxmyx',1),(33,33,13,95646128,'key-rzp7g6koocxxrbm8cd',1),(34,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(35,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(36,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(37,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(38,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(39,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(40,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(41,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(42,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(43,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(44,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(45,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(46,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(47,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(48,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(49,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(50,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(51,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(52,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(53,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(54,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(55,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(56,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(57,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(58,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(59,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(60,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(61,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(62,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(63,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(64,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(65,32,10,95575932,'key-7ie7cq3vkhm3jgitzu5',1),(66,33,13,95646128,'key-rzp7g6koocxxrbm8cd',1),(67,31,13,95575723,'key-zt2kqthp092c3heq8ub',1),(68,35,18,95859683,'key-1qt5edqvnig864ihs770',1),(69,31,18,95575723,'key-zt2kqthp092c3heq8ub',1),(70,31,18,95575723,'key-zt2kqthp092c3heq8ub',1),(71,36,3,95970809,'key-bv9ys1vahu2bqycgh41',1),(72,31,18,95575723,'key-zt2kqthp092c3heq8ub',1),(73,31,18,95575723,'key-zt2kqthp092c3heq8ub',1),(74,39,20,96081866,'key-1u72845fbhghjf9bz9k9',1);
/*!40000 ALTER TABLE `~cs_course_private` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `~cs_course_public`
--

DROP TABLE IF EXISTS `~cs_course_public`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `~cs_course_public` (
  `id` tinyint(4) NOT NULL auto_increment,
  `course` varchar(20) NOT NULL,
  `school` varchar(20) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `term` varchar(20) NOT NULL,
  `professor` varchar(20) NOT NULL,
  `basicinfo` varchar(200) NOT NULL,
  `name` varchar(20) NOT NULL,
  `owner_id` tinyint(10) NOT NULL,
  `tips` varchar(20) NOT NULL,
  `price` int(10) NOT NULL,
  `papalemail` varchar(100) NOT NULL,
  `coverphoto` varchar(20) NOT NULL,
  `doc_id` varchar(50) NOT NULL,
  `access_key` varchar(50) NOT NULL,
  `thum_url` varchar(500) NOT NULL,
  `state` varchar(20) NOT NULL,
  `filename` varchar(30) NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `~cs_course_public`
--

LOCK TABLES `~cs_course_public` WRITE;
/*!40000 ALTER TABLE `~cs_course_public` DISABLE KEYS */;
INSERT INTO `~cs_course_public` VALUES (39,'','','','','professor1','','',20,'',2,'','','96081850','key-kq6izu1bedzl6y0dfcp','http://imgv2-1.scribdassets.com/img/word_document/96081850/111x142/d487b00d05/1338934274','','test.rtf',1),(37,'English','Air University','Graphic Arts','Fall 2008','','','',1,'',0,'','','95988402','key-1fe2hu6sosb2hituodjw','','Alabma','test.txt',0),(38,'','','','','','','',20,'',0,'','','96081781','key-2ndkn3fqjdfrbfzl4wvq','','','test.rtf',0),(36,'','','','','','','',3,'',0,'','','95970795','key-jjvjba6h3rqfvbg5d9e','http://imgv2-3.scribdassets.com/img/word_document/95970795/111x142/31900312a0/1338874703','','test.rtf',1),(35,'English','Air University','Graphic Arts','Summer 2009','professor1','desc goes here.....','new user test',18,'',2,'','','95859615','key-s7tu3lxrh6is5vguy7z','http://imgv2-1.scribdassets.com/img/word_document/95859615/111x142/c65f6798f4/1338817470','Alabma','testfile.txt',1),(34,'','','','','professor1','jk','tft',3,'',10,'danishnadeem@gmail.com','','95684366','key-2b1ow8ud498f7vq1pfsk','http://imgv2-1.scribdassets.com/img/word_document/95684366/111x142/e408252422/1338660301','','test.rtf',1),(32,'English','Air University','Graphic Arts','Spring 2008','professor1','desctiption here','test 2',10,'',4,'bscs06_1338473343_per@gmail.com','','95575932','key-7ie7cq3vkhm3jgitzu5','http://imgv2-2.scribdassets.com/img/word_document/95575932/111x142/4d4a8931ec/1338570679','Alabma','testfile.txt',1),(31,'English','Air University','Graphic Arts','Fall 2008','professor1','test desd','test',10,'',4,'bscs05_1338473578_per@gmail.com','','95575677','key-1uhebd5q0dxp14jbbmmu','http://imgv2-4.scribdassets.com/img/word_document/95575677/111x142/8e6df04303/1338570542','Alabma','testfile.txt',1),(33,'Hindi','Air University','Finance','Fall 2010','professor1','desc here again and again','test fb',13,'',4,'bscs05_1338473578_per@gmail.com','','95646128','key-rzp7g6koocxxrbm8cd','http://imgv2-3.scribdassets.com/img/word_document/95646128/111x142/466612bbcd/1338624782','Alabma','testfile.txt',1);
/*!40000 ALTER TABLE `~cs_course_public` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-06-11 23:10:21
