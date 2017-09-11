# SQL-Front 5.1  (Build 4.16)

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;


# Host: 127.0.0.1    Database: tycinema
# ------------------------------------------------------
# Server version 5.1.36-community-log

#
# Source for table categories
#

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(100) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Dumping data for table categories
#

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (2,'Hi-Fi');
INSERT INTO `categories` VALUES (3,'Action');
INSERT INTO `categories` VALUES (4,'Romantic');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table movies
#

DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `movie_cate_id` int(11) NOT NULL,
  `movie_title` varchar(100) NOT NULL,
  `movie_image` varchar(100) NOT NULL,
  `movie_description` text NOT NULL,
  `movie_date` date NOT NULL,
  `movie_tags` varchar(255) NOT NULL,
  `movie_trailer` varchar(255) NOT NULL,
  `movie_full` varchar(255) NOT NULL,
  `movie_resolution` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Dumping data for table movies
#

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table slider
#

DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_title` varchar(100) NOT NULL,
  `slider_image` varchar(100) NOT NULL,
  `slider_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Dumping data for table slider
#

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table users
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `user_image` varchar(100) NOT NULL,
  `user_role` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Dumping data for table users
#

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'hong','ZHLOqIcte3uEs39NIq/hjnE5j1qGlI3jxlRFUSBnVRw=','Heng Kimhong','a2-2.jpg','Subscriber','2017-09-07 16:03:07');
INSERT INTO `users` VALUES (7,'admin','QrUgcNdRjaE74hfEIeThKa/RaqA9N/KpBI+X7VeiyfE=','Admin','user8-128x128.jpg','Admin','2017-09-08 07:55:08');
INSERT INTO `users` VALUES (8,'admin','ZHLOqIcte3uEs39NIq/hjnE5j1qGlI3jxlRFUSBnVRw=','admin test','avatar2.png','Subscriber','2017-09-08 10:23:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
