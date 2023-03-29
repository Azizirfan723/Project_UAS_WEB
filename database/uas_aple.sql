-- MariaDB dump 10.19  Distrib 10.4.25-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: uas_aple
-- ------------------------------------------------------
-- Server version	10.4.25-MariaDB

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
-- Table structure for table `akun`
--

DROP TABLE IF EXISTS `akun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `akun` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `jabatan` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `akun`
--

LOCK TABLES `akun` WRITE;
/*!40000 ALTER TABLE `akun` DISABLE KEYS */;
INSERT INTO `akun` VALUES (1,'Reka Zahra','admin','0192023a7bbd73250516f069df18b500','admin'),(2,'moskov','user','a3b1427fc6eb05dde4883180e7284322','karyawan'),(4,'reyna','user2','6ad14ba9986e3615423dfca256d04e3f','karyawan'),(5,'Yusril Arzaqi','yusril','f486144d6ec1952bcc438fae0bb8ba4a','karyawan'),(8,'Adam Saputra','adam3303','813a54f8b0a580d59fcfb0b505b94614','karyawan'),(9,'Bimo Alam syah','bimo112','6bece2d84c54e0b7fbc3d56ffc94aff7','karyawan'),(10,'Irfan Aziz','admin2','0192023a7bbd73250516f069df18b500','admin'),(11,'Fairuz','admin3','0192023a7bbd73250516f069df18b500','karyawan'),(12,'Ranu','user5','6ad14ba9986e3615423dfca256d04e3f','karyawan');
/*!40000 ALTER TABLE `akun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produk_dikirim`
--

DROP TABLE IF EXISTS `produk_dikirim`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produk_dikirim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(45) NOT NULL,
  `tanggal_kirim` varchar(45) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `akun_id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`,`akun_id_user`),
  KEY `fk_selesai_produksi_akun1_idx` (`akun_id_user`),
  CONSTRAINT `fk_selesai_produksi_akun1` FOREIGN KEY (`akun_id_user`) REFERENCES `akun` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produk_dikirim`
--

LOCK TABLES `produk_dikirim` WRITE;
/*!40000 ALTER TABLE `produk_dikirim` DISABLE KEYS */;
INSERT INTO `produk_dikirim` VALUES (9,'IP12','Iphone 12','2022-11-02',200,4),(12,'IPAD02','Ipad Mac Pro','2024-01-02',14,2),(13,'IP12','Iphone 12','2022-11-24',20,2),(14,'IPAD01','Ipad Air Pro','2022-11-24',14,5),(15,'IP13','Iphone 13','2022-11-24',20,4),(16,'IP20','Iphone 20 Pro Max','2022-11-22',112,2),(17,'IP12','Iphone 12 Mini','2022-11-20',200,9),(18,'IP22','Iphone 22','2022-11-25',20,2),(20,'IP12','Iphone 12 Pro Max','2022-11-25',130,4),(21,'IP20','Iphone 20 Pro Max','2022-11-25',21,5),(23,'MB20','Mac Book Air Pro 20','2022-11-27',69,2);
/*!40000 ALTER TABLE `produk_dikirim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produk_selesai`
--

DROP TABLE IF EXISTS `produk_selesai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produk_selesai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(45) NOT NULL,
  `tanggal_selesai` varchar(45) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `akun_id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`,`akun_id_user`),
  KEY `fk_produk_dikrim_akun_idx` (`akun_id_user`),
  CONSTRAINT `fk_produk_dikrim_akun` FOREIGN KEY (`akun_id_user`) REFERENCES `akun` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produk_selesai`
--

LOCK TABLES `produk_selesai` WRITE;
/*!40000 ALTER TABLE `produk_selesai` DISABLE KEYS */;
INSERT INTO `produk_selesai` VALUES (28,'IP13','Iphone 13 Pro Max','2022-11-23',30,8),(29,'IPAD07','Ipad Mac Pro 6','2022-11-02',100,4),(30,'IPAD08','Ipad Mac Pro 7','2022-11-05',120,4),(31,'IPAD09','Ipad Mac Pro 9','2022-11-10',180,4),(32,'IP09','Iphone Mac Pro 9','2022-11-10',200,4),(33,'IP11','Iphone Mac Pro 11','2022-01-10',200,4),(34,'IP12','Iphone Mac Pro 12','2022-02-10',200,4),(35,'IP13','Iphone Mac Pro 13','2022-03-10',200,4),(36,'IP10','Iphone Mac Pro 14','2022-04-10',200,4),(37,'IP10','Iphone Mac Pro 10','2022-12-10',200,4),(38,'IP11','Iphone Mac Pro 11','2022-12-11',200,4),(39,'IP12','Iphone Mac Pro 12','2022-12-13',200,4),(40,'IP13','Iphone Mac Pro 13','2022-12-14',200,4),(41,'IP10','Iphone Mac Pro 14','2022-12-15',200,4);
/*!40000 ALTER TABLE `produk_selesai` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-29 11:28:19
