-- MySQL dump 10.13  Distrib 5.5.38-35.2, for Linux (x86_64)
--
-- Host: localhost    Database: desideal_deals
-- ------------------------------------------------------
-- Server version	5.5.38-35.2

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
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `about` (
  `about_id` int(11) NOT NULL AUTO_INCREMENT,
  `about_content` longtext NOT NULL,
  PRIMARY KEY (`about_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about`
--

LOCK TABLES `about` WRITE;
/*!40000 ALTER TABLE `about` DISABLE KEYS */;
INSERT INTO `about` (`about_id`, `about_content`) VALUES (1,'On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.\r\nYou can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.\r\nTo change the overall look of your document, choose new Theme elements on the Page Layout tab. To change the looks available in the Quick Style gallery, use the Change Current Quick Style Set command. Both the Themes gallery and the Quick Styles gallery provide reset commands so that you can always restore the look of your document to the original contained in your current template.\r\n');
/*!40000 ALTER TABLE `about` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `last_visit` datetime NOT NULL,
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity`
--

LOCK TABLES `activity` WRITE;
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
INSERT INTO `activity` (`activity_id`, `user_id`, `type`, `deal_id`, `last_visit`) VALUES (1,20,'Share Deal',58,'2014-07-11 18:08:57'),(2,20,'Comment a Deal',58,'2014-07-11 18:17:03'),(3,89,'Share Deal',58,'2014-07-14 19:43:52'),(4,90,'Share Deal',59,'2014-07-14 19:45:16'),(5,90,'Share Deal',60,'2014-07-14 19:48:23'),(6,90,'Share Deal',61,'2014-07-14 19:49:32'),(7,90,'Share Deal',62,'2014-07-14 19:54:25'),(8,0,'Share Deal',63,'2014-07-14 20:00:40'),(9,20,'Share Deal',61,'2014-07-16 18:28:46'),(10,20,'Comment a Deal',61,'2014-07-16 18:31:15'),(11,20,'Comment a Deal',43,'2014-07-17 19:41:54'),(12,20,'Comment a Deal',43,'2014-07-17 19:42:43'),(13,39,'Share Deal',62,'2014-07-19 12:02:55'),(14,39,'Comment a Deal',62,'2014-07-19 12:07:24'),(15,39,'Comment a Deal',62,'2014-07-19 12:08:14'),(16,39,'Comment a Deal',62,'2014-07-19 12:08:37'),(17,20,'Comment a Deal',62,'2014-07-19 12:10:50'),(18,39,'Comment a Deal',62,'2014-07-19 12:15:29'),(19,39,'Comment a Deal',62,'2014-07-19 12:15:56'),(20,39,'Comment a Deal',62,'2014-07-19 12:16:54'),(21,39,'Share Deal',63,'2014-07-19 12:24:51'),(22,39,'Comment a Deal',63,'2014-07-19 12:25:56'),(23,39,'Comment a Deal',63,'2014-07-19 16:48:12'),(24,39,'Share Deal',64,'2014-07-19 16:51:17'),(25,68,'Comment a Deal',64,'2014-07-21 11:29:28'),(26,39,'Share Deal',65,'2014-07-21 12:11:55'),(27,39,'Comment a Deal',65,'2014-07-21 12:12:49'),(28,39,'Comment a Deal',44,'2014-07-21 12:15:40'),(29,74,'Share Deal',66,'2014-07-29 19:07:24'),(30,74,'Share Deal',67,'2014-07-29 19:19:40'),(31,79,'Comment a Deal',63,'2014-08-04 12:16:54'),(32,76,'Comment a Deal',66,'2014-09-16 16:23:48'),(33,88,'Comment a Deal',65,'2015-01-09 15:59:34'),(34,72,'Comment a Deal',66,'2015-01-09 20:16:29');
/*!40000 ALTER TABLE `activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comments` longtext NOT NULL,
  `commented_at` datetime NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` (`comment_id`, `deal_id`, `user_id`, `comments`, `commented_at`) VALUES (38,43,20,'nice Shoe :)','2014-07-17 19:42:43'),(39,62,39,'This is the best TV Deal','2014-07-19 12:07:24'),(40,62,39,'What a TV is this.','2014-07-19 12:08:14'),(41,62,39,'Replacement warranty 2 years.','2014-07-19 12:08:37'),(42,62,20,'coool','2014-07-19 12:10:50'),(43,62,39,':)\r\n','2014-07-19 12:15:29'),(44,62,39,'This is the best HD TV I ever seen in my entire life.','2014-07-19 12:15:56'),(45,62,39,'Walmart will Sold this product very soon.','2014-07-19 12:16:54'),(46,63,39,'Rapchik Phone','2014-07-19 12:25:56'),(47,63,39,'kya fantastic Phone.','2014-07-19 16:48:12'),(49,65,39,'What a deal it is?','2014-07-21 12:12:48'),(50,44,39,'What a Deal it is?','2014-07-21 12:15:40'),(51,63,79,'nice smart phone','2014-08-04 12:16:54'),(52,65,88,'nice','2015-01-09 15:59:34'),(53,66,72,'Very Nice','2015-01-09 20:16:29');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sub` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `contactdate` datetime NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` (`contact_id`, `name`, `email`, `sub`, `comment`, `contactdate`) VALUES (9,'sdfhsdfj','debabrata@codetechinfo.in','sdfjsdfj','sfjsdfgj','2014-07-14 20:15:20'),(10,'hdfgj','debabrata@codetechinfo.in','dfjkdfk','dfkdfkh','2014-07-14 20:15:59'),(11,'dfj','debabrata@codetechinfo.in','dfj','dfjfj','2014-07-14 20:16:22'),(12,'asdfhasdfh','debabrata@codetechinfo.in','deal enquery','sdfhdfsh','2014-07-14 20:17:24'),(13,'dfjhjghjhggh','debabrata@codetechinfo.in','ghsdfh','sdfjhsdfj','2014-07-14 20:18:23'),(14,'Debabrata Mondal','debabrata@codetechinfo.in','deal enquery','dfhsdfh','2014-07-14 20:19:05'),(15,'Debabrata Mondal','debabrata@codetechinfo.in','deal enquery','THIS KLJL','2014-07-14 20:21:01');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deal`
--

DROP TABLE IF EXISTS `deal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deal` (
  `deal_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `deal_status` int(11) NOT NULL,
  `deal_url` varchar(255) NOT NULL,
  `deal_title` varchar(255) NOT NULL,
  `deal_price` varchar(255) NOT NULL,
  `deal_topic` int(11) NOT NULL,
  `deal_desc` longtext NOT NULL,
  `deal_rcv_email_update` varchar(11) NOT NULL,
  `deal_email` varchar(255) NOT NULL,
  `deal_image` varchar(255) NOT NULL,
  `deal_image_url` varchar(255) NOT NULL,
  `deal_tag` varchar(255) NOT NULL,
  `deal_start_date` datetime NOT NULL,
  `deal_end_date` datetime NOT NULL,
  `deal_modify_date` datetime NOT NULL,
  `deal_hot_count` int(11) NOT NULL,
  `hot_cold_count` int(11) NOT NULL,
  `last_voted_at` datetime NOT NULL,
  `deal_view_count` int(11) NOT NULL,
  `deal_coment_count` int(255) NOT NULL,
  `deal_slug` varchar(255) NOT NULL,
  PRIMARY KEY (`deal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deal`
--

LOCK TABLES `deal` WRITE;
/*!40000 ALTER TABLE `deal` DISABLE KEYS */;
INSERT INTO `deal` (`deal_id`, `user_id`, `deal_status`, `deal_url`, `deal_title`, `deal_price`, `deal_topic`, `deal_desc`, `deal_rcv_email_update`, `deal_email`, `deal_image`, `deal_image_url`, `deal_tag`, `deal_start_date`, `deal_end_date`, `deal_modify_date`, `deal_hot_count`, `hot_cold_count`, `last_voted_at`, `deal_view_count`, `deal_coment_count`, `deal_slug`) VALUES (38,17,1,'http://www.flipkart.com/footwear/pr?sid=osp&icmpid=hp_dotd_2_DOTDOnPumaSportsShoes.&offer=DOTDOnPumaSportsShoes.','On the Insert tab, the galleries include items that are designed to coordinate','1234163',2,'You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab. You can also format text directly by using the other controls on the Home tab. Most controls offer a choice of using the look from the current theme or using a format that you specify directly.','yes','','140703054402d4.jpg','http://desihotdeals.com/images/deal/140703054402d4.jpg','testing tag','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-07 17:44:02',0,0,'0000-00-00 00:00:00',34,0,'on-the-insert-tab,-the-galleries-include-items-that-are-designed-to-coordinate'),(40,20,1,'http://www.amazon.in/gp/product/B001D0ROGO/ref=s9_pop_gw_g147_i3/277-5470196-9502313?pf_rd_m=A1VBAL9TL5WCBF&pf_rd_s=center-3&pf_rd_r=01KZKDRSQQCCY8HXGZ6D&pf_rd_t=101&pf_rd_p=510678707&pf_rd_i=1320006031','SanDisk 8GB Class 4 microSDHC Memory Card (SDSDQM-008G-B35)','220.00',6,'\r\n    8GB capacity stores approximately 2000 songs or 3,200 photos or 32 hours video\r\n    Seamless speed and performance with microSDHC compatible devices\r\n    Class 4 speed performance rating (based on SD 2.0 specification)\r\n    Organize and transfer your photos, videos and music with included SanDisk Media Manager software\r\n    5-year limited warranty\r\n','yes','','1407080414320061965904682_500X500.jpg','http://desihotdeals.com/images/deal/1407080414320061965904682_500X500.jpg','testing tag','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-08 16:14:32',0,0,'0000-00-00 00:00:00',35,0,'sandisk-8gb-class-4-microsdhc-memory-card-sdsdqm-008g-b35'),(41,20,1,'http://www.amazon.in/gp/product/1444757180/ref=s9_ri_gw_g14_i2?pf_rd_m=A1VBAL9TL5WCBF&pf_rd_s=center-6&pf_rd_r=0C1XTM1ZFZSRBJXG86DS&pf_rd_t=101&pf_rd_p=402518447&pf_rd_i=1320006031','Calico Joe','160',6,'On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.','yes','','1407080423275POINTZ_HOME_BANNER_1.jpg','http://desihotdeals.com/images/deal/1407080423275POINTZ_HOME_BANNER_1.jpg','testing tag','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-08 16:23:27',1,0,'2014-07-16 17:45:28',35,0,'calico-joe'),(42,20,1,'http://www.amazon.in/gp/product/B0080G4C4G/ref=s9_simh_gw_p241_d0_i4?pf_rd_m=A1VBAL9TL5WCBF&pf_rd_s=center-4&pf_rd_r=0C1XTM1ZFZSRBJXG86DS&pf_rd_t=101&pf_rd_p=402519107&pf_rd_i=1320006031','Helix Trigger Analog Black Dial Men\'s Watch - 07HG03','18552',8,'On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.','yes','','1407080424433327717-timex-analog-black-dial-men-watch.jpg','http://desihotdeals.com/images/deal/1407080424433327717-timex-analog-black-dial-men-watch.jpg','testing tag','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-08 16:24:43',0,0,'0000-00-00 00:00:00',31,0,'helix-trigger-analog-black-dial-mens-watch---07hg03'),(43,20,1,'http://www.amazon.in/Nike-Potential-White-Orange-Running/dp/B00CEQ2LAK/ref=lp_1983519031_1_1?s=shoes&ie=UTF8&qid=1404816964&sr=1-1','Nike Men\'s Nike Potential Running Shoes','1977',8,'On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.','yes','','140708042752shoe.jpg','http://desihotdeals.com/images/deal/140708042752shoe.jpg','fdgj','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-08 16:27:52',0,0,'0000-00-00 00:00:00',24,1,'nike-mens-nike-potential-running-shoes'),(44,20,1,'http://www.amazon.in/gp/product/B00J1WCANI/ref=s9_al_bw_g309_i4?pf_rd_m=A1VBAL9TL5WCBF&pf_rd_s=merchandised-search-7&pf_rd_r=1DT48K9PE63SNZANVH74&pf_rd_t=101&pf_rd_p=484988587&pf_rd_i=1983577031','Puma Men\'s 917 Mid 2.0 Canvas Sneakers','1379',8,'On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.','yes','','140708043121index.jpg','http://desihotdeals.com/images/deal/140708043121index.jpg','testing tag','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-08 16:31:21',2,0,'2014-07-19 12:13:29',71,1,'puma-mens-917-mid-20-canvas-sneakers'),(45,20,1,'http://www.homeshop18.com/inkovy-men-shirt-brown/clothing/men/product:31845941/cid:14985/?pos=1','Inkovy Men\'s T-shirt - Brown','399',8,'On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.','yes','','140708043350inkovy-mens-t-shirt-brown-300X420-5X7-2b2dff6ff1f54affab96d90ccb789d63.jpg','http://desihotdeals.com/images/deal/140708043350inkovy-mens-t-shirt-brown-300X420-5X7-2b2dff6ff1f54affab96d90ccb789d63.jpg','testing tag','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-08 16:33:50',-1,2,'2014-07-21 12:07:05',28,0,'inkovy-mens-t-shirt---brown'),(46,20,1,'http://www.homeshop18.com/20d-women-orange-jeans/clothing/women/product:30598853/cid:15005/?pos=3','20D Women\'s Orange Jeans','1095',8,'On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.','yes','','14070804380920d-womens-orange-jeans-300X420-5X7-b1e158920a1b4d52b9ee7fc04fee3dc1.jpg','http://desihotdeals.com/images/deal/14070804380920d-womens-orange-jeans-300X420-5X7-b1e158920a1b4d52b9ee7fc04fee3dc1.jpg','testing tag','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-08 16:38:09',-1,2,'2014-07-19 12:13:27',43,0,'20d-womens-orange-jeans'),(47,20,1,'http://www.homeshop18.com/yepme-women-top-black-pink/clothing/women/product:31787933/cid:15019/?pos=1','Yepme Women\'s Top - Black & Pink','599',8,'On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.','yes','','140708044013yepme-womens-top-black-pink-300X420-5X7-3a0ba6ba6e15464c926e91bb32be5e6e.jpg','http://desihotdeals.com/images/deal/140708044013yepme-womens-top-black-pink-300X420-5X7-3a0ba6ba6e15464c926e91bb32be5e6e.jpg','testing tag','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-08 16:40:13',0,1,'2014-07-19 12:13:25',27,0,'yepme-womens-top---black--pink'),(48,20,1,'http://www.homeshop18.com/miss-chase-women-top-black/clothing/women/product:32109329/cid:15019/?pos=2','Miss Chase Women\'s Top - Black','1099',8,'On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.','yes','','140708044141miss-chase-womens-top-black-300X420-5X7-8ef1dd81bb604197b1afad9cd148a45b.jpg','http://desihotdeals.com/images/deal/140708044141miss-chase-womens-top-black-300X420-5X7-8ef1dd81bb604197b1afad9cd148a45b.jpg','testing tag','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-08 16:41:41',0,1,'2014-07-19 12:13:24',41,0,'miss-chase-womens-top---black'),(49,20,1,'http://www.homeshop18.com/vanca-women-dress-green/clothing/women/product:31796077/cid:15001/?pos=10','The Vanca Women\'s Dress - Green','999',8,'On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.','yes','','140708044334the-vanca-womens-dress-green-300X420-5X7-6a3ebe0a6e4043539a07e4071a19a7e7.jpg','http://desihotdeals.com/images/deal/140708044334the-vanca-womens-dress-green-300X420-5X7-6a3ebe0a6e4043539a07e4071a19a7e7.jpg','testing tag','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-08 16:43:34',0,1,'2014-07-19 12:13:23',47,0,'the-vanca-womens-dress---green'),(50,20,1,'http://www.homeshop18.com/shree-women-leggings-purple/clothing/women/product:32069429/cid:16389/?pos=4','Shree Women\'s Leggings - Purple','299',8,'On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.','yes','','140708044623shree-womens-leggings-purple-300X420-5X7-f1a771d6a5e143a48be17f21833e5c2a.jpg','http://desihotdeals.com/images/deal/140708044623shree-womens-leggings-purple-300X420-5X7-f1a771d6a5e143a48be17f21833e5c2a.jpg','testing tag','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-08 16:46:23',3,0,'2014-07-19 12:13:22',44,0,'shree-womens-leggings---purple'),(51,20,1,'http://www.homeshop18.com/prettysecrets-women-bra-black-pink-white/clothing/women/product:32076953/cid:15311/?pos=1','PrettySecrets Women\'s Bra - Black, Pink & White','699',8,'On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.','yes','','140708044821prettysecrets-womens-bra-black-pink-white-300X420-5X7-e9054d183c094770aac5bb0d9d558a69.jpg','http://desihotdeals.com/images/deal/140708044821prettysecrets-womens-bra-black-pink-white-300X420-5X7-e9054d183c094770aac5bb0d9d558a69.jpg','testing tag','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-08 16:48:21',1,0,'2014-07-14 18:19:52',157,0,'prettysecrets-womens-bra---black-pink--white'),(52,20,1,'http://www.homeshop18.com/prettysecrets-women-bra-navy-blue/clothing/women/product:32076935/cid:15311/?pos=13','PrettySecrets Women\'s Bra - Navy Blue','399',8,'On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.','yes','','140708044936prettysecrets-womens-bra-navy-blue-300X420-5X7-eddd4897aa5f4968b281a62e0e307e8a.jpg','http://desihotdeals.com/images/deal/140708044936prettysecrets-womens-bra-navy-blue-300X420-5X7-eddd4897aa5f4968b281a62e0e307e8a.jpg','testing tag','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-08 16:49:36',2,0,'2014-07-19 12:13:20',68,0,'prettysecrets-womens-bra---navy-blue'),(53,20,1,'http://www.homeshop18.com/prestitia-women-black-bra/clothing/women/product:30790961/cid:15311/?pos=12','Prestitia Women\'s Black Bra','300',8,'On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.','yes','','140708045101prestitia-womens-black-bra-300X420-5X7-d56b79b1f4884760b70af90377ea94ac.jpg','http://desihotdeals.com/images/deal/140708045101prestitia-womens-black-bra-300X420-5X7-d56b79b1f4884760b70af90377ea94ac.jpg','testing tag','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-08 16:51:01',4,0,'2015-03-25 14:33:54',75,0,'prestitia-womens-black-bra'),(54,20,1,'http://www.homeshop18.com/cloe-women-nighty-maroon/clothing/women/product:31815625/cid:15315/?pos=5','Cloe Women\'s Nighty - Maroon','799',8,'On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.','yes','','140708045311cloe-womens-babydoll-black-blue-300X420-5X7-806ecd1c86ab472e9d1c74c7a5935579.jpg','http://desihotdeals.com/images/deal/140708045311cloe-womens-babydoll-black-blue-300X420-5X7-806ecd1c86ab472e9d1c74c7a5935579.jpg','testing tag','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-08 16:53:11',3,0,'2015-03-25 14:33:51',52,0,'cloe-womens-nighty---maroon'),(60,22,1,'http://www.flipkart.com/footwear/pr?sid=osp&icmpid=hp_dotd_2_DOTDOnPumaSportsShoes.&offer=DOTDOnPumaSportsShoes.','Cenizas Cotton Double Bed Sheet Set ttttttttttttttttt','2000',13,'this is for testing','yes','','140729071702Jellyfish.jpg','http://desihotdeals.com/images/deal/140729071702Jellyfish.jpg','testing tag','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-15 13:07:23',3,0,'2014-07-19 12:13:18',54,0,'cenizas-cotton-double-bed-sheet-set-ttttttttttttttttt'),(61,20,1,'http://www.flipkart.com/footwear/pr?sid=osp&icmpid=hp_dotd_2_DOTDOnPumaSportsShoes.&offer=DOTDOnPumaSportsShoes.','Puma Running Shoe','2000',3,'Cloe Women\'s Nighty - MaroonOn the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look.','yes','','1407160628463oysterbar.jpg','http://desihotdeals.com/images/deal/1407160628463oysterbar.jpg','testing tag','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-16 18:28:46',4,0,'2015-03-25 14:33:47',67,0,'puma-running-shoe'),(62,39,1,'http://i.ebayimg.com/00/s/NTE1WDY3MQ==/z/W0wAAOxyNo9SoLcY/$_1.JPG?set_id=880000500F','Sony Bravia LED TV 32 inch KLV-32R402 With One Year Seller Warranty for sale','26000.00 ',6,'Ending: 6d left\r\nCondition: New\r\nBrand: Sony\r\nWarranty: Seller Warranty\r\nShipping: Rs. 500.00','yes','','140719120255$_1.JPG','http://desihotdeals.com/images/deal/140719120255$_1.JPG','TV','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-19 12:02:55',4,0,'2015-03-25 14:33:42',89,7,'sony-bravia-led-tv-32-inch-klv-32r402-with-one-year-seller-warranty-for-sale'),(63,39,1,'http://i.ebayimg.com/00/s/MTA2NlgxNjAw/z/AvIAAMXQVT9Sw89r/$_1.JPG?set_id=880000500F','SAMSUNG GALAXY S DUOS 2 S7582 DUAL SIM ANDROID MOBILE + BILL + 1 YEAR WARRANT','5000',11,'asz','yes','','140719122450mRvNUhhZYil3pspX2R1MUDQ.jpg','http://desihotdeals.com/images/deal/140719122450mRvNUhhZYil3pspX2R1MUDQ.jpg','http://i.ebayimg.com/00/s/MTA2NlgxNjAw/z/AvIAAMXQVT9Sw89r/$_1.JPG?set_id=880000500F','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-19 12:24:50',4,0,'2014-08-04 12:16:21',83,3,'samsung-galaxy-s-duos-2-s7582-dual-sim-android-mobile--bill--1-year-warrant'),(64,39,1,'http://es.ebid.net/for-sale/kenya-1966-bat-eared-fox-1-5sh-scott-31-sg-31-mnh-topical-fauna-123955953.htm','Antique Postal Stamp from Keneya','10',11,'Kenya 1966 Bat-eared fox 1,5sh Scott 31 SG 31 MNH Topical: Fauna','yes','','1407190451161357979454-821-7.jpg','http://desihotdeals.com/images/deal/1407190451161357979454-821-7.jpg','','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-19 16:51:16',2,0,'2014-07-22 16:19:15',87,0,'antique-postal-stamp-from-keneya'),(65,39,1,'http://i.ebayimg.com/00/s/ODY4WDEwMDA=/z/gC0AAOxyzHxRVbeH/$T2eC16hHJHQE9nzEztUqBRVbeGc)hQ~~60_1.JPG?set_id=8800005007','Branded Famous Premium Vegetable & Fruit Cutter Chopper NICER DICER CHIPSER','6',11,'Ending: 2d left\r\nCondition: New\r\nType: Chopper\r\nColour: Whites\r\nShipping: Free Shipping','yes','','140721121155$T2eC16hHJHQE9nzEztUqBRVbeGc)hQ~~60_1.jpg','http://desihotdeals.com/images/deal/140721121155$T2eC16hHJHQE9nzEztUqBRVbeGc)hQ~~60_1.jpg','Rs. 399.00Buy It Now','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-21 12:11:55',2,0,'2014-07-22 16:19:17',91,2,'branded-famous-premium-vegetable--fruit-cutter-chopper-nicer-dicer-chipser'),(66,74,1,'http://www.flipkart.com/footwear/pr?sid=osp&icmpid=hp_dotd_2_DOTDOnPumaSportsShoes.&offer=DOTDOnPumaSportsShoes.','Puma Running Shoe','2000',3,'czxvhfgjdfgjfg','yes','','140729071635Tulips.jpg','http://desihotdeals.com/images/deal/140729071635Tulips.jpg','testing tag','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 19:07:24',1,0,'2015-01-09 20:15:45',86,1,'puma-running-shoe-1'),(67,74,1,'http://www.flipkart.com/footwear/pr?sid=osp&icmpid=hp_dotd_2_DOTDOnPumaSportsShoes.&offer=DOTDOnPumaSportsShohjes.','dfghdfgj','234',2,'dfjdfgj','','','noimage.png','http://desihotdeals.com/images/noimage.png','testing tag','0000-00-00 00:00:00','0000-00-00 00:00:00','2014-07-29 19:19:40',1,0,'2015-01-09 15:58:29',70,0,'dfghdfgj');
/*!40000 ALTER TABLE `deal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `help`
--

DROP TABLE IF EXISTS `help`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `help` (
  `help_id` int(11) NOT NULL AUTO_INCREMENT,
  `help_content` longtext NOT NULL,
  PRIMARY KEY (`help_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `help`
--

LOCK TABLES `help` WRITE;
/*!40000 ALTER TABLE `help` DISABLE KEYS */;
INSERT INTO `help` (`help_id`, `help_content`) VALUES (1,'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.sdgas\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.sdgas\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.sdgas\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.sdgas\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.sdgas\r\n');
/*!40000 ALTER TABLE `help` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hot_cold`
--

DROP TABLE IF EXISTS `hot_cold`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hot_cold` (
  `hot_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `vote` varchar(30) NOT NULL COMMENT 'h=hot,c=cold',
  `voted_at` datetime NOT NULL,
  PRIMARY KEY (`hot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hot_cold`
--

LOCK TABLES `hot_cold` WRITE;
/*!40000 ALTER TABLE `hot_cold` DISABLE KEYS */;
INSERT INTO `hot_cold` (`hot_id`, `user_id`, `deal_id`, `vote`, `voted_at`) VALUES (71,17,57,'h','2014-07-09 18:55:23'),(72,17,56,'h','2014-07-09 18:55:26'),(73,17,55,'h','2014-07-09 18:55:27'),(74,17,54,'c','2014-07-09 18:55:29'),(75,20,57,'h','2014-07-09 18:57:07'),(76,20,56,'h','2014-07-09 18:58:20'),(77,20,55,'h','2014-07-09 19:00:59'),(78,21,55,'h','2014-07-09 19:24:41'),(79,17,53,'h','2014-07-10 19:38:31'),(80,20,54,'h','2014-07-11 20:37:56'),(81,20,53,'h','2014-07-11 20:37:58'),(82,20,52,'h','2014-07-11 20:38:01'),(83,20,51,'h','2014-07-11 20:38:04'),(84,20,50,'h','2014-07-11 20:39:39'),(85,90,57,'h','2014-07-14 19:44:10'),(86,89,58,'h','2014-07-14 19:45:36'),(87,89,59,'h','2014-07-14 19:46:07'),(88,90,61,'h','2014-07-14 19:52:14'),(89,90,60,'h','2014-07-14 19:52:16'),(90,90,59,'h','2014-07-14 19:52:18'),(91,90,58,'h','2014-07-14 19:52:21'),(92,90,56,'c','2014-07-14 19:52:24'),(93,90,55,'c','2014-07-14 19:52:26'),(94,90,54,'c','2014-07-14 19:52:28'),(95,90,53,'c','2014-07-14 19:52:29'),(96,90,52,'c','2014-07-14 19:52:31'),(97,90,50,'h','2014-07-14 19:59:23'),(98,90,51,'h','2014-07-14 19:59:25'),(99,20,60,'h','2014-07-16 17:45:04'),(100,20,59,'h','2014-07-16 17:45:06'),(101,20,49,'h','2014-07-16 17:45:09'),(102,20,48,'h','2014-07-16 17:45:10'),(103,20,47,'h','2014-07-16 17:45:12'),(104,20,46,'c','2014-07-16 17:45:14'),(105,20,45,'c','2014-07-16 17:45:21'),(106,20,44,'h','2014-07-16 17:45:24'),(107,20,41,'h','2014-07-16 17:45:28'),(108,20,61,'h','2014-07-16 18:29:03'),(109,39,62,'h','2014-07-19 12:03:10'),(110,20,62,'h','2014-07-19 12:10:57'),(111,39,61,'h','2014-07-19 12:13:14'),(112,39,60,'h','2014-07-19 12:13:16'),(113,39,53,'h','2014-07-19 12:13:16'),(114,39,54,'h','2014-07-19 12:13:17'),(115,39,52,'h','2014-07-19 12:13:20'),(116,39,50,'h','2014-07-19 12:13:22'),(117,39,49,'c','2014-07-19 12:13:23'),(118,39,48,'c','2014-07-19 12:13:24'),(119,39,47,'c','2014-07-19 12:13:25'),(120,39,46,'c','2014-07-19 12:13:27'),(121,39,44,'h','2014-07-19 12:13:29'),(122,39,63,'h','2014-07-19 12:26:06'),(123,39,64,'h','2014-07-19 16:51:48'),(124,38,63,'h','2014-07-19 17:20:25'),(125,39,45,'c','2014-07-21 12:07:05'),(126,39,65,'h','2014-07-21 12:12:14'),(127,82,65,'h','2014-07-22 16:19:14'),(128,82,64,'h','2014-07-22 16:19:15'),(129,82,63,'h','2014-07-22 16:19:26'),(130,82,62,'h','2014-07-22 16:19:28'),(131,79,63,'h','2014-08-04 12:16:21'),(132,88,67,'h','2015-01-09 15:58:29'),(133,72,66,'h','2015-01-09 20:15:45'),(134,79,62,'h','2015-03-25 14:33:42'),(135,79,61,'h','2015-03-25 14:33:47'),(136,79,54,'h','2015-03-25 14:33:51'),(137,79,53,'h','2015-03-25 14:33:54');
/*!40000 ALTER TABLE `hot_cold` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newsletter` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_email` varchar(255) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsletter`
--

LOCK TABLES `newsletter` WRITE;
/*!40000 ALTER TABLE `newsletter` DISABLE KEYS */;
INSERT INTO `newsletter` (`news_id`, `news_email`) VALUES (1,'deb@gmail.com'),(4,'jack1@gmail.com'),(5,'tt@t.com'),(6,'rr@r.com'),(7,'aaa@a.com'),(8,'uuu@u.com'),(9,'eeee@e.com'),(10,'pp@p.com'),(11,'d@d.com'),(12,'raju.6609@gmail.com'),(13,'jack@codetechinfo.in'),(14,'sumit@codetechinfo.in'),(15,'d@d.com'),(16,'debabrata.mondal0@gmail.com'),(17,'debabrata.mondal0@gmail.com'),(18,'debabrata.mondal0@gmail.com'),(19,'debabrata.codetech@gmail.com'),(20,'debabrata.codetech@gmail.com'),(21,'debabrata.codetech@gmail.com'),(22,'debabrata.codetech@gmail.com'),(23,'debabrata.codetech@gmail.com'),(24,'debabrata.codetech@gmail.com'),(25,'debabrata.codetech@gmail.com'),(26,'debabrata.codetech@gmail.com'),(27,'debabrata@codetechinfo.in'),(28,'debabrata.codetech@gmail.com'),(29,'w4wwweb@gmail.com'),(30,'raju.6609@gmail.com'),(31,'zigzag@gmail.com'),(32,'w4wwweb@gmail.com');
/*!40000 ALTER TABLE `newsletter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postview`
--

DROP TABLE IF EXISTS `postview`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postview` (
  `view_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `deal_id` int(11) NOT NULL,
  PRIMARY KEY (`view_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postview`
--

LOCK TABLES `postview` WRITE;
/*!40000 ALTER TABLE `postview` DISABLE KEYS */;
INSERT INTO `postview` (`view_id`, `user_id`, `deal_id`) VALUES (1,17,57),(2,17,56),(3,17,57),(4,17,56),(5,17,58),(6,20,58),(7,20,58),(8,22,56),(9,20,60),(10,39,62),(11,39,62),(12,39,62),(13,39,62),(14,39,62),(15,39,65),(16,39,65);
/*!40000 ALTER TABLE `postview` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `privacy`
--

DROP TABLE IF EXISTS `privacy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `privacy` (
  `privacy_id` int(11) NOT NULL AUTO_INCREMENT,
  `privacy_content` longtext NOT NULL,
  PRIMARY KEY (`privacy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privacy`
--

LOCK TABLES `privacy` WRITE;
/*!40000 ALTER TABLE `privacy` DISABLE KEYS */;
INSERT INTO `privacy` (`privacy_id`, `privacy_content`) VALUES (1,'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\n\r\n');
/*!40000 ALTER TABLE `privacy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_adminlogin`
--

DROP TABLE IF EXISTS `tbl_adminlogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_adminlogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `last_login_date` varchar(255) NOT NULL,
  `last_login_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_adminlogin`
--

LOCK TABLES `tbl_adminlogin` WRITE;
/*!40000 ALTER TABLE `tbl_adminlogin` DISABLE KEYS */;
INSERT INTO `tbl_adminlogin` (`id`, `uname`, `pwd`, `last_login_date`, `last_login_time`) VALUES (1,'admin','bmltZGE=','Thursday, March 20th, 2014','02:16:00');
/*!40000 ALTER TABLE `tbl_adminlogin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  `serial` int(11) NOT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` (`topic_id`, `status`, `topic_name`, `serial`) VALUES (2,0,'Audiovisual',2),(3,0,'Mobiles',1),(4,0,'Gaming',5),(5,0,'Computers',8),(6,0,'Entertainment',4),(8,0,'Fashion',9),(9,0,'Kids',3),(10,0,'Groceries',7),(11,0,'Travel',6),(13,1,'Restaurants',10);
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `about_me` longtext NOT NULL,
  `location` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sex` varchar(25) NOT NULL COMMENT 'male or female',
  `profile_picture` varchar(255) NOT NULL,
  `profile_picture_url` varchar(255) NOT NULL,
  `newslater_subscriber` int(11) NOT NULL,
  `daily_email` int(11) NOT NULL,
  `joindate` datetime NOT NULL,
  `last_activicty` datetime NOT NULL,
  `log_type` varchar(10) NOT NULL COMMENT 'f=facebook.t=twitter,g=g+,w=website',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `status`, `name`, `user_name`, `about_me`, `location`, `pass`, `email`, `sex`, `profile_picture`, `profile_picture_url`, `newslater_subscriber`, `daily_email`, `joindate`, `last_activicty`, `log_type`) VALUES (17,0,'Madhab Chandra Ghosh','admin@bnbclone.com','hello,Every One','Mumbai','sub-admin','dipanjan.83@gmail.com','male','1407140403013oysterbar.jpg','http://desihotdeals.com/images/user/1407140403013oysterbar.jpg',0,0,'2014-07-01 00:00:00','0000-00-00 00:00:00',''),(38,0,'Raju','raju.6609','','','39london','raju.6609@gmail.com','male','male.png','http://desihotdeals.com/images/user/male.png',0,0,'2014-07-19 05:06:09','0000-00-00 00:00:00',''),(39,0,'Kashik Das','admin','','','admin','k@gmail.com','male','1407190447271357979454-821-7.jpg','http://desihotdeals.com/images/user/1407190447271357979454-821-7.jpg',0,0,'2014-07-19 11:57:44','0000-00-00 00:00:00',''),(72,0,'Debabrata Mondal','askme_deb@rediffmail.com','I am Deb.....','Delhi','','askme_deb@rediffmail.com','','705617816175684','https://graph.facebook.com/705617816175684/picture?type=large',0,0,'2015-01-09 20:15:34','0000-00-00 00:00:00','f'),(73,0,'Raju Biradar','desihotdeals@gmail.com','','','','desihotdeals@gmail.com','','https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg','https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg',0,0,'2014-07-29 16:08:01','0000-00-00 00:00:00','g'),(74,0,'Debabrata Mondal','debabrata.codetech@gmail.com','','kolkata','','debabrata.codetech@gmail.com','','https://lh5.googleusercontent.com/-wQLtpFaUlgo/AAAAAAAAAAI/AAAAAAAAABE/k9mX5lsRui8/photo.jpg','https://lh5.googleusercontent.com/-wQLtpFaUlgo/AAAAAAAAAAI/AAAAAAAAABE/k9mX5lsRui8/photo.jpg',0,0,'2014-07-29 20:00:53','0000-00-00 00:00:00','g'),(76,0,'','','','','','','','','https://graph.facebook.com//picture?type=large',0,0,'2015-04-21 22:00:44','0000-00-00 00:00:00','f'),(77,0,'','','','','','','','','https://graph.facebook.com//picture?type=large',0,0,'2015-04-21 22:00:44','0000-00-00 00:00:00','f'),(78,0,'','','','','','','','','https://graph.facebook.com//picture?type=large',0,0,'2015-04-21 22:00:44','0000-00-00 00:00:00','f'),(79,0,'Debabrata Mondal','debabrata.mondal0@gmail.com','Hiiiiiiiiiiiiiiiiiiiiiiiii','Kolkata','123456','debabrata.mondal0@gmail.com','','https://lh5.googleusercontent.com/-TxfHDGFKENs/AAAAAAAAAAI/AAAAAAAAAIs/j5TWIr2s8xI/photo.jpg','https://lh5.googleusercontent.com/-TxfHDGFKENs/AAAAAAAAAAI/AAAAAAAAAIs/j5TWIr2s8xI/photo.jpg',0,0,'2015-03-25 14:37:02','0000-00-00 00:00:00','g'),(80,0,'','','','','','','','','https://graph.facebook.com//picture?type=large',0,0,'2015-04-21 22:00:44','0000-00-00 00:00:00','f'),(81,0,'Kaushik Das','testing.kaushik2@gmail.com','','','','testing.kaushik2@gmail.com','','1446728818946645','https://graph.facebook.com/1446728818946645/picture?type=large',0,0,'2014-08-25 11:26:48','0000-00-00 00:00:00','f'),(82,0,'','','','','','','','','https://graph.facebook.com//picture?type=large',0,0,'2015-04-21 22:00:44','0000-00-00 00:00:00','f'),(83,0,'Soumadip Ghosh','soumadipghosh2@gmail.com','','','','soumadipghosh2@gmail.com','','693526950733174','https://graph.facebook.com/693526950733174/picture?type=large',0,0,'2014-07-25 14:26:50','0000-00-00 00:00:00','f'),(84,0,'','','','','','','','','https://graph.facebook.com//picture?type=large',0,0,'2015-04-21 22:00:44','0000-00-00 00:00:00','f'),(85,0,'Aakash Pal','w4wwweb@gmail.com','','','','w4wwweb@gmail.com','','303419833172272','https://graph.facebook.com/303419833172272/picture?type=large',0,0,'2014-10-28 12:16:47','0000-00-00 00:00:00','f'),(86,0,'Moumita Ghosh','moumitaghosh475@gmail.com','','','','moumitaghosh475@gmail.com','','539528926170317','https://graph.facebook.com/539528926170317/picture?type=large',0,0,'2014-07-29 16:49:53','0000-00-00 00:00:00','f'),(87,0,'Madhab Ghosh','madhabchandraghosh2010@gmail.com','','','','madhabchandraghosh2010@gmail.com','','https://lh3.googleusercontent.com/-C0yDTKxTWgc/AAAAAAAAAAI/AAAAAAAAAcU/oHauw96DTqc/photo.jpg','https://lh3.googleusercontent.com/-C0yDTKxTWgc/AAAAAAAAAAI/AAAAAAAAAcU/oHauw96DTqc/photo.jpg',0,0,'2014-09-19 12:42:01','0000-00-00 00:00:00','g'),(88,0,'Debanjan Sarkar','debanjan_sr@yahoo.com','','','','debanjan_sr@yahoo.com','','908143935882608','https://graph.facebook.com/908143935882608/picture?type=large',0,0,'2015-01-09 15:58:13','0000-00-00 00:00:00','f'),(89,0,'Debanjan Sarkar','debanjan.codetech@gmail.com','','','','debanjan.codetech@gmail.com','','1414393185539146','https://graph.facebook.com/1414393185539146/picture?type=large',0,0,'2015-03-12 16:44:31','0000-00-00 00:00:00','f');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'desideal_deals'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-28  7:35:26
