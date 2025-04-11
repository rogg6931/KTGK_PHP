-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: quan_ly_sach
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `publication_date` date DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`book_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'Vật lý đại cương','Nguyễn Văn A','2020-01-01',100000.00,10,1),(2,'Toán cao cấp','Trần Thị B','2019-05-15',120000.00,5,1),(3,'Truyện Kiều','Nguyễn Du','1820-01-01',80000.00,20,2),(4,'Số đỏ','Vũ Trọng Phụng','1936-01-01',90000.00,15,2),(5,'Kinh tế vi mô','Lê Văn C','2021-03-10',150000.00,8,3),(6,'Tài chính doanh nghiệp','Phạm Thị D','2022-02-20',180000.00,3,3),(7,'Lịch sử Việt Nam','Hoàng Văn E','2018-11-05',110000.00,12,4),(8,'Lịch sử thế giới','Đỗ Thị F','2017-09-25',130000.00,7,4),(9,'Tiếng Anh giao tiếp','Nguyễn Văn G','2023-04-01',160000.00,6,5),(10,'Tiếng Nhật sơ cấp','Trần Thị H','2022-12-15',190000.00,2,5),(11,'Giải tích 1','Nguyễn Văn K','2021-06-30',115000.00,9,1),(12,'Văn học Việt Nam hiện đại','Lê Thị L','2020-08-20',125000.00,14,2),(13,'Đầu tư chứng khoán','Phạm Văn M','2023-01-10',170000.00,4,3),(14,'Chiến tranh thế giới thứ hai','Đỗ Văn N','2019-10-01',135000.00,11,4),(15,'Tiếng Pháp cơ bản','Trần Thị O','2022-05-05',200000.00,1,5),(16,'kjhkljlkplk','kl','2025-04-02',20000.00,44,1),(19,'uuu','kl','2025-04-07',20000.00,44,3),(20,'jjjj','kl','2025-04-07',20000.00,22,4),(21,'jjjj','kl','2025-04-07',20000.00,22,4),(22,'jjjj','kl','2025-04-07',20000.00,22,4),(27,'mmm','kl','2025-04-07',20000.00,22,4),(28,'nnn','ppp','2025-04-07',20000.00,22,3),(29,'hhh','ppp','2025-04-07',20000.00,22,5),(30,'lll','ppp','2025-04-07',20000.00,22,1),(31,'lll','ppp','2025-04-07',20000.00,22,1),(32,'jjjj','ppp','2025-04-07',20000.00,22,3),(33,'abc','ppp','2025-04-07',20000.00,22,3),(34,'abc','ppp','2025-04-07',20000.00,22,4),(35,'abc','ppp','2025-04-07',20000.00,22,4),(36,'abc','ppp','2025-04-07',20000.00,22,1),(37,'abc','ppp','2025-04-07',20000.00,44,3),(38,'uuu','kl','2025-04-07',20000.00,22,5),(39,'abc','ppp','2025-04-27',20000.00,22,1),(40,'abc','ppp','2025-04-27',20000.00,22,1),(41,'abc','ppp','2025-04-27',20000.00,22,1),(42,'uuu','ppp','2025-04-26',20000.00,22,1),(43,'uuu','ppp','2025-04-26',20000.00,22,1),(44,'abc','ppp','2025-04-06',20000.00,22,4),(45,'uuu','ppp','2025-04-16',20000.00,44,2),(46,'lll','kl','2025-04-03',20000.00,22,2),(49,'mmm','kl','2025-04-04',20000.00,44,4),(51,'abc','kl','2025-04-24',20000.00,22,3),(52,'abc','ppp','2025-04-03',20000.00,44,2),(57,'abc','ppp','2025-04-09',20000.00,44,1),(58,'uuu','ppp','2025-04-03',1000.00,44,3),(66,'aaaa bb vccc bv  b b b  b  bbb b bbbbb bbbbb bbbb bbbbbb bbbbb bbbbbb bbbb bbbbbb ','fsdfsdfsdf jkljlkj kjlkj iuiu jnkj hbjhg nbn ftf jjhuy dsf','2025-04-10',20000.00,44,2);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Khoa học','Sách về các lĩnh vực khoa học tự nhiên và xã hội'),(2,'Văn học','Sách về các tác phẩm văn học trong và ngoài nước'),(3,'Kinh tế','Sách về kinh tế, tài chính, ngân hàng'),(4,'Lịch sử','Sách về lịch sử Việt Nam và thế giới'),(5,'Ngoại ngữ','Sách về các ngôn ngữ nước ngoài');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'quan_ly_sach'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-11 20:34:22
