-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: hatbazar
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `logintype`
--

DROP TABLE IF EXISTS `logintype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logintype` (
  `LoginTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `LoginName` varchar(20) NOT NULL,
  PRIMARY KEY (`LoginTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logintype`
--

LOCK TABLES `logintype` WRITE;
/*!40000 ALTER TABLE `logintype` DISABLE KEYS */;
INSERT INTO `logintype` VALUES (1,'Admin'),(2,'Normal');
/*!40000 ALTER TABLE `logintype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `version` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `phvp_view`
--

DROP TABLE IF EXISTS `phvp_view`;
/*!50001 DROP VIEW IF EXISTS `phvp_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `phvp_view` (
  `PHVID` tinyint NOT NULL,
  `VegPrice` tinyint NOT NULL,
  `PlaceId` tinyint NOT NULL,
  `VegId` tinyint NOT NULL,
  `StatusId` tinyint NOT NULL,
  `VegName` tinyint NOT NULL,
  `PlaceName` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `places`
--

DROP TABLE IF EXISTS `places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `places` (
  `PlaceId` int(11) NOT NULL AUTO_INCREMENT,
  `PlaceName` varchar(50) NOT NULL,
  `StatusId` int(11) NOT NULL,
  PRIMARY KEY (`PlaceId`),
  KEY `StatusId` (`StatusId`),
  CONSTRAINT `places_ibfk_1` FOREIGN KEY (`StatusId`) REFERENCES `status` (`StatusId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `places`
--

LOCK TABLES `places` WRITE;
/*!40000 ALTER TABLE `places` DISABLE KEYS */;
INSERT INTO `places` VALUES (1,'Dharan',1),(2,'Kathmandu',1);
/*!40000 ALTER TABLE `places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `placeshasvegprice`
--

DROP TABLE IF EXISTS `placeshasvegprice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `placeshasvegprice` (
  `PHVID` bigint(20) NOT NULL AUTO_INCREMENT,
  `VegPrice` varchar(30) NOT NULL,
  `PlaceId` int(11) NOT NULL,
  `VegId` int(11) NOT NULL,
  `StatusId` int(11) NOT NULL,
  PRIMARY KEY (`PHVID`),
  KEY `StatusId` (`StatusId`),
  KEY `PlaceId` (`PlaceId`),
  KEY `VegId` (`VegId`),
  CONSTRAINT `placeshasvegprice_ibfk_1` FOREIGN KEY (`StatusId`) REFERENCES `status` (`StatusId`),
  CONSTRAINT `placeshasvegprice_ibfk_2` FOREIGN KEY (`PlaceId`) REFERENCES `places` (`PlaceId`),
  CONSTRAINT `placeshasvegprice_ibfk_3` FOREIGN KEY (`VegId`) REFERENCES `vegitables` (`VegId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `placeshasvegprice`
--

LOCK TABLES `placeshasvegprice` WRITE;
/*!40000 ALTER TABLE `placeshasvegprice` DISABLE KEYS */;
INSERT INTO `placeshasvegprice` VALUES (1,'20-30',1,1,1);
/*!40000 ALTER TABLE `placeshasvegprice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `StatusId` int(11) NOT NULL AUTO_INCREMENT,
  `StatusName` varchar(20) NOT NULL,
  PRIMARY KEY (`StatusId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Active'),(2,'Deactive'),(3,'Not Assigned'),(4,'Assigned');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `studentid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(100) NOT NULL,
  `student_description` text,
  PRIMARY KEY (`studentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(30) NOT NULL,
  `UserName` varchar(60) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `LoginTypeId` int(11) NOT NULL,
  `StatusId` int(11) NOT NULL,
  PRIMARY KEY (`UserId`),
  KEY `StatusId` (`StatusId`),
  KEY `LoginTypeId` (`LoginTypeId`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`StatusId`) REFERENCES `status` (`StatusId`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`LoginTypeId`) REFERENCES `logintype` (`LoginTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin','d033e22ae348aeb5660fc2140aec35850c4da997',1,1),(8,'dipesh','dipbro','d033e22ae348aeb5660fc2140aec35850c4da997',2,1),(9,'ganesh','ganesh','d033e22ae348aeb5660fc2140aec35850c4da997',2,1),(10,'hari krishna','hari','d033e22ae348aeb5660fc2140aec35850c4da997',1,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `users_view`
--

DROP TABLE IF EXISTS `users_view`;
/*!50001 DROP VIEW IF EXISTS `users_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `users_view` (
  `UserId` tinyint NOT NULL,
  `FullName` tinyint NOT NULL,
  `UserName` tinyint NOT NULL,
  `Password` tinyint NOT NULL,
  `LoginTypeId` tinyint NOT NULL,
  `StatusId` tinyint NOT NULL,
  `LoginName` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `vegitables`
--

DROP TABLE IF EXISTS `vegitables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vegitables` (
  `VegId` int(11) NOT NULL AUTO_INCREMENT,
  `VegName` varchar(50) NOT NULL,
  `StatusId` int(11) NOT NULL,
  PRIMARY KEY (`VegId`),
  KEY `StatusId` (`StatusId`),
  CONSTRAINT `vegitables_ibfk_1` FOREIGN KEY (`StatusId`) REFERENCES `status` (`StatusId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vegitables`
--

LOCK TABLES `vegitables` WRITE;
/*!40000 ALTER TABLE `vegitables` DISABLE KEYS */;
INSERT INTO `vegitables` VALUES (1,'aalu',1);
/*!40000 ALTER TABLE `vegitables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `phvp_view`
--

/*!50001 DROP TABLE IF EXISTS `phvp_view`*/;
/*!50001 DROP VIEW IF EXISTS `phvp_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `phvp_view` AS select `placeshasvegprice`.`PHVID` AS `PHVID`,`placeshasvegprice`.`VegPrice` AS `VegPrice`,`placeshasvegprice`.`PlaceId` AS `PlaceId`,`placeshasvegprice`.`VegId` AS `VegId`,`placeshasvegprice`.`StatusId` AS `StatusId`,`vegitables`.`VegName` AS `VegName`,`places`.`PlaceName` AS `PlaceName` from ((`placeshasvegprice` join `places` on((`placeshasvegprice`.`PlaceId` = `places`.`PlaceId`))) join `vegitables` on((`placeshasvegprice`.`VegId` = `vegitables`.`VegId`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `users_view`
--

/*!50001 DROP TABLE IF EXISTS `users_view`*/;
/*!50001 DROP VIEW IF EXISTS `users_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `users_view` AS select `users`.`UserId` AS `UserId`,`users`.`FullName` AS `FullName`,`users`.`UserName` AS `UserName`,`users`.`Password` AS `Password`,`users`.`LoginTypeId` AS `LoginTypeId`,`users`.`StatusId` AS `StatusId`,`logintype`.`LoginName` AS `LoginName` from (`users` join `logintype` on((`users`.`LoginTypeId` = `logintype`.`LoginTypeId`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-24  0:13:15
