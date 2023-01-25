-- MariaDB dump 10.19  Distrib 10.6.7-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: aristosg_mih
-- ------------------------------------------------------
-- Server version	10.6.7-MariaDB

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
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `page` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `descrition` varchar(500) NOT NULL,
  `last_mod` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page` (`page`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (1,'index','\n    \n    \n    \n    \n    test','Дизайн экстерьера домов, котеджей, интерьера в Чебоксарах','дизайн','Дизайн экстерьера домов, котеджей, интерьера в Чебоксарах',1614874010),(3,'kupe','<section class=\"mebel-text\"><h2 class=\"header_shadow center-text\">Шкафы купе в Чебоксарах от компактных до массивных</h2><p>\nДля большого количества владельцев небольших жилых помещений и не только,\nгде проблемой остается малая площадь комнат,\nвсе острее стоит вопрос максимально эргономичного и оптимального использования каждого жилого метра квартиры.\nЧастый и рекомендуемый вариант – купить шкаф-купе. Он даст возможность самым оптимальным образом использовать каждую единицу объема Вашего жилья для хранения чего бы то ни было.\n</p><h3 class=\"header_shadow center-text\">Купить шкаф купе от <i>Aristo_SGA</i>, значит довериться бескомпромиссному качеству</h3><p>\nОдин из обязательных определяющих элементов для шкафа-купе — фурнитура.\nДаже самый \"дизайнерский\" шкаф вызовет раздражение, если со временем двери начнут шуметь или вовсе заклинят.\nКомпания Aristo-SGA имеет партнерские отношения только с длительное время известными производителями мебельной фурнитуры как отечественной так и европейской.\n</p><p>\nНаличие у нас разнообразных материалов разных производителей и фурнитуры не помешает смонтировать шкаф купе\nхоть в совсем небольшую прихожую хоть и в вполне просторную гостиную или же спальню.\n</p></section>','Дизайн шкафоф купе в Чебоксарах','дизайн','Частый и рекомендуемый вариант – купить шкаф-купе. Он даст возможность самым оптимальным образом использовать каждую единицу объема Вашего жилья для хранения чего бы то ни было.',1614873853),(4,'kitchen','<h2>Кухни от <i>Design21</i></h2>','Дизайн кухонной мебели в Чебоксарах','Кухни','Кухни в Чебоксарах',1614873647),(5,'racks','<section>\r\n<h1 class=\"header_shadow center-text\">Гардеробная от <i>Aristo-SGA</i></h1>\r\n<p>\r\nВсякая хозяйка, пожалуй, мечтает о вместительной и удобной гардеробной \r\nс достаточным количеством вешалок, стеллажей, \r\nполок и ящиков где все вещи доступны на расстоянии вытянутой руки.\r\n</p>\r\n<p>\r\nВ большинстве своем гардеробная классифицируется как открытая или закрытая.\r\nВ каталоге компании Aristo-SGA представлены оба вида.С применяемыми нами профилями\r\nи фурнитурой Ваша гардеробная комната примет тот практичный вид , какой Вы задумали.\r\nМы поможем Вам воплотить объемную изнутри систему при минимальных площадях помещения.\r\n</p>\r\n</section>','Дизайн гардеробной в Чебоксарах','Гардеробная прихожая','В большинстве своем гардеробная классифицируется как открытая или закрытая.В каталоге компании Aristo-SGA представлены оба вида',1614873860),(6,'exterieur','<p>Дизайн экстерьера</p>','Дизайн экстерьера','экстерьер дизайн','Дизайн экстерьера',1614873781),(7,'interieur','<p>Дизайн интерьера</p>','Дизайн интерьера','интерьер дизайн','Дизайн интерьера',1614873837);
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galery`
--

DROP TABLE IF EXISTS `galery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  `timestamp` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `full_text` text NOT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `price` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galery`
--

LOCK TABLES `galery` WRITE;
/*!40000 ALTER TABLE `galery` DISABLE KEYS */;
INSERT INTO `galery` VALUES (1,'exterieur',1614875733,'','','','',''),(2,'exterieur',1614873710,'','','','',NULL),(3,'exterieur',1614873697,'','','','',NULL),(4,'exterieur',1614873716,'','','','',NULL),(5,'exterieur',1614873664,'','','','',NULL),(6,'exterieur',1614873725,'','','','',NULL),(7,'exterieur',1614873658,'','','','',NULL),(8,'exterieur',1614873867,'','','','',NULL),(9,'exterieur',1614873881,'','','','',NULL),(10,'exterieur',1614873836,'','','','',NULL),(11,'exterieur',1614873853,'','','','',NULL),(12,'exterieur',1614873728,'','','','',NULL),(13,'exterieur',1614873685,'','','','',NULL),(14,'exterieur',1614873828,'','','','',NULL),(15,'exterieur',1614873827,'','','','',NULL),(16,'exterieur',1614873745,'','','','',NULL),(17,'exterieur',1614873683,'','','','',NULL),(18,'exterieur',1614873851,'','','','',NULL),(19,'exterieur',1614873864,'','','','',NULL),(20,'exterieur',1614873863,'','','','',NULL),(21,'exterieur',1614873831,'','','','',NULL),(22,'interieur',1614873876,'Спальня','Спальня','','Спальня',NULL),(23,'interieur',1614873688,'Спальня с гардеробной','Спальня с гардеробной','','Спальня с гардеробной',NULL),(24,'interieur',1614873813,'кухня студия','кухня студия','','кухня студия',NULL),(25,'interieur',1614873869,'рабочий кабинет','рабочий кабинет','','рабочий кабинет',NULL),(26,'interieur',1614873668,'дизайн кухни','дизайн кухни','','дизайн кухни',NULL),(27,'interieur',1614873661,'кухня','кухня','','кухня',NULL),(28,'interieur',1614873694,'кухня-прихожая','кухня-прихожая','','кухня-прихожая',NULL),(29,'interieur',1614873778,'каминный зал','каминный зал','','каминный зал',NULL),(30,'interieur',1614873874,'Гостиная','Гостиная','','Гостиная',NULL),(31,'interieur',1614873817,'Столовая','Столовая','','Столовая',NULL),(32,'interieur',1614873677,'Детская','Детская','','Детская',NULL),(33,'interieur',1614873775,'Вариант кухни','Вариант кухни','','Вариант кухни',NULL),(34,'interieur',1614873691,'Комната для отдыха и работы','Комната для отдыха и работы','','Комната для отдыха и работы',NULL),(35,'interieur',1614873685,'Ванная комната','Ванная комната','','Ванная комната',NULL),(36,'interieur',1614873766,'Комната отдыха','Комната отдыха','','Комната отдыха',NULL),(37,'interieur',1614873814,'Комната со шкафом купе','Комната со шкафом купе','','Комната со шкафом купе',NULL),(38,'interieur',1614873809,'Домашний кинотеатр','Домашний кинотеатр','','Домашний кинотеатр',NULL),(39,'interieur',1614873854,'Ресепшн','Ресепшн','','Ресепшн',NULL),(40,'interieur',1614873883,'Большая гостиная с камином','Большая гостиная с камином','','Большая гостиная с камином',NULL),(41,'interieur',1614873775,'Гостиная','Гостиная','','Гостиная',NULL),(42,'interieur',1614873657,'Прихожая с гардеробной комнатой','Прихожая с гардеробной комнатой','','Прихожая с гардеробной комнатой',NULL),(43,'interieur',1614873864,'Спальная комната с \"французскими\" окнами','Спальная комната с \"французскими\" окнами','','Спальная комната с \"французскими\" окнами',NULL),(44,'interieur',1614873887,'Гостиная','Гостиная','','Гостиная',NULL),(45,'interieur',1614873730,'Спальня с фотопечатью','Спальня с фотопечатью','','Спальня с фотопечатью',NULL),(46,'interieur',1614873681,'Большой зал','Большой зал','','Большой зал',NULL),(47,'interieur',1614873799,'Вариант ресепшн','Вариант ресепшн','','Вариант ресепшн',NULL),(48,'interieur',1614873716,'Ванная комната','Ванная комната','','Ванная комната',NULL),(49,'racks',1614873789,'Гардеробная в классическом стиле. Фасады МДФ эмаль –Краска с фрезеровкой.','Гардеробная в классическом стиле. Фасады МДФ эмаль –Краска с фрезеровкой.','','Гардеробная в классическом стиле. Фасады МДФ эмаль –Краска с фрезеровкой.',NULL),(50,'racks',1614873752,'Гардеробная ARISTO полки, ящики и шкафы из ЛДСП.','Гардеробная ARISTO полки, ящики и шкафы из ЛДСП.','','Гардеробная ARISTO. Полки, ящики и шкафы из ЛДСП.',NULL),(51,'racks',1614873764,'Гардеробная Каркас из ЛДСП. Фасады МДФ с фрезеровкой, стекло.','Гардеробная Каркас из ЛДСП. Фасады МДФ с фрезеровкой, стекло.','','Гардеробная Каркас из ЛДСП. Фасады МДФ с фрезеровкой, стекло.',NULL),(52,'racks',1614873774,'Гардеробная ARISTO полки и ящики  выполнены из ЛДСП.','Гардеробная ARISTO полки и ящики  выполнены из ЛДСП.','','Гардеробная ARISTO полки и ящики  выполнены из ЛДСП.',NULL),(53,'racks',1614873799,'Гардеробная. Каркас выполнен из ЛДСП. Фасады МДФ рамка, вставка стекло.','Гардеробная. Каркас выполнен из ЛДСП. Фасады МДФ рамка, вставка стекло.','','Гардеробная. Каркас выполнен из ЛДСП. Фасады МДФ рамка, вставка стекло.',NULL),(54,'racks',1614873665,'Гардеробная ARISTO.  Полки и ящики выполнены из ЛДСП.','Гардеробная ARISTO.  Полки и ящики выполнены из ЛДСП.','','Гардеробная ARISTO.  Полки и ящики выполнены из ЛДСП.',NULL),(55,'racks',1614873670,'Гардеробная ARISTO. Полки и ящики выполнены из МДФ эмаль – Краска.','Гардеробная ARISTO. Полки и ящики выполнены из МДФ эмаль – Краска.','','Гардеробная ARISTO. Полки и ящики выполнены из МДФ эмаль – Краска.',NULL),(56,'racks',1614873682,'Гардеробная ARISTO. Каркас выполнен из ЛДСП. Фасады из МДФ пленка, стекло','Гардеробная ARISTO. Каркас выполнен из ЛДСП. Фасады из МДФ пленка, стекло','','Гардеробная ARISTO. Каркас выполнен из ЛДСП. Фасады из МДФ пленка, стекло',NULL),(57,'racks',1614873856,'Гардеробная ARISTO. Каркас выполнен из ЛДСП.  Фасады пластик ARPA','Гардеробная ARISTO. Каркас выполнен из ЛДСП.  Фасады пластик ARPA','','Гардеробная ARISTO. Каркас выполнен из ЛДСП.  Фасады пластик ARPA',NULL),(58,'racks',1614873656,'Гардеробная. Каркас выполнен из ЛДСП. Фасады - ЛДСП.','Гардеробная. Каркас выполнен из ЛДСП. Фасады - ЛДСП.','','Гардеробная. Каркас выполнен из ЛДСП. Фасады - ЛДСП.',NULL),(59,'kupe',1614873868,'Шкаф купе встроенный. Профиль ARISTO . Вставка Зеркало с пленкой ORACAL.','Шкаф купе встроенный. Профиль ARISTO . Вставка Зеркало с пленкой ORACAL.','','Шкаф купе встроенный. Профиль ARISTO . Вставка Зеркало с пленкой ORACAL.',NULL),(60,'kupe',1614873779,'Шкаф купе встроенный. Профиль ARISTO. Вставка Стекло в пленке ORACAL.','Шкаф купе встроенный. Профиль ARISTO. Вставка Стекло в пленке ORACAL.','','Шкаф купе встроенный. Профиль ARISTO. Вставка Стекло в пленке ORACAL.',NULL),(61,'kupe',1614873734,'Шкаф купе встроенный. Профиль ARISTO. Стекло в пленке ORACAL.','Шкаф купе встроенный. Профиль ARISTO. Стекло в пленке ORACAL.','','Шкаф купе встроенный. Профиль ARISTO. Стекло в пленке ORACAL.',NULL),(62,'kupe',1614873742,'Шкаф купе встроенный.Профиль ARISTO. Вставка стекло – LAKOBEL.','Шкаф купе встроенный.Профиль ARISTO. Вставка стекло – LAKOBEL.','','Шкаф купе встроенный.Профиль ARISTO. Вставка стекло – LAKOBEL.',NULL),(63,'kupe',1614873665,'Шкаф купе встроенный. Вставка зеркало с пескоструйным  рисунком.','Шкаф купе встроенный. Вставка зеркало с пескоструйным  рисунком.','','Шкаф купе встроенный. Вставка зеркало с пескоструйным  рисунком.',NULL),(64,'kupe',1614873879,'   Шкаф купе. Профиль ARISTO. Вставка ЛДСП глянец.','   Шкаф купе. Профиль ARISTO. Вставка ЛДСП глянец.','','   Шкаф купе. Профиль ARISTO. Вставка ЛДСП глянец.',NULL),(65,'kupe',1614873869,'Шкаф купе. Профиль ARISTO. Вставка комбинация ЛДСП и зеркало.','Шкаф купе. Профиль ARISTO. Вставка комбинация ЛДСП и зеркало.','','Шкаф купе. Профиль ARISTO. Вставка комбинация ЛДСП и зеркало.',NULL),(66,'kupe',1614873723,'Шкаф купе. Профиль ARISTO. Вставка стекло LAKOBEL - черный с белоснежным рисунком.','Шкаф купе. Профиль ARISTO. Вставка стекло LAKOBEL - черный с белоснежным рисунком.','','Шкаф купе. Профиль ARISTO. Вставка стекло LAKOBEL - черный с белоснежным рисунком.',NULL),(67,'kupe',1614873881,'Двери купе. Профиль ARISTO. Вставка стекло LAKOBEL -  черный и МДФ пленка «Шкура».','Двери купе. Профиль ARISTO. Вставка стекло LAKOBEL -  черный и МДФ пленка «Шкура».','','Двери купе. Профиль ARISTO. Вставка стекло LAKOBEL -  черный и МДФ пленка «Шкура».',NULL),(68,'kupe',1614873787,'Шкаф купе встроенный. Профиль ARISTO. Вставка стекло LAKOBEL –  черный и матированные линии.','Шкаф купе встроенный. Профиль ARISTO. Вставка стекло LAKOBEL –  черный и матированные линии.','','Шкаф купе встроенный. Профиль ARISTO. Вставка стекло LAKOBEL –  черный и матированные линии.',NULL),(69,'kitchen',1614873794,'Кухонный гарнитур. Фасады Пластик ARPA, AL профиль с матированным стеклом','Кухонный гарнитур. Фасады Пластик ARPA, AL профиль с матированным стеклом','','Кухонный гарнитур. Фасады Пластик ARPA, AL профиль с матированным стеклом',NULL),(70,'kitchen',1614873878,'Кухонный гарнитур. Фасады из МДФ пленки.','Кухонный гарнитур. Фасады из МДФ пленки.','','Кухонный гарнитур. Фасады из МДФ пленки.',NULL),(71,'kitchen',1614873774,'Кухонный гарнитур. Фасады МДФ эмаль – краска','Кухонный гарнитур. Фасады МДФ эмаль – краска','','Кухонный гарнитур. Фасады МДФ эмаль – краска',NULL),(72,'kitchen',1614873809,'Кухонный гарнитур. Фасады МДФ пленка глянец','Кухонный гарнитур. Фасады МДФ пленка глянец','','Кухонный гарнитур. Фасады МДФ пленка глянец',NULL),(73,'kitchen',1614873874,'Кухонный гарнитур. Фасады МДФ эмаль – краска.','Кухонный гарнитур. Фасады МДФ эмаль – краска.','','Кухонный гарнитур. Фасады МДФ эмаль – краска.',NULL),(74,'kitchen',1614873758,'Кухонный гарнитур. Фасады пластик ARPA в ПВХ кромке.','Кухонный гарнитур. Фасады пластик ARPA в ПВХ кромке.','','Кухонный гарнитур. Фасады пластик ARPA в ПВХ кромке.',NULL),(75,'kitchen',1614873699,'Кухонный гарнитур. Фасады массив березы шпон дуба под покраску.','Кухонный гарнитур. Фасады массив березы шпон дуба под покраску.','','Кухонный гарнитур. Фасады массив березы шпон дуба под покраску.',NULL),(76,'kitchen',1614873863,'Кухонный гарнитур. Фасады МДФ эмаль – краска.','Кухонный гарнитур. Фасады МДФ эмаль – краска.','','Кухонный гарнитур. Фасады МДФ эмаль – краска.',NULL),(77,'kitchen',1614873815,'Кухонный гарнитур. Фасады МДФ эмаль – краска.','Кухонный гарнитур. Фасады МДФ эмаль – краска.','','Кухонный гарнитур. Фасады МДФ эмаль – краска.',NULL),(78,'kitchen',1614873718,'Кухонный гарнитур. Фасады пластик ARPA в ПВХ кромке. ','Кухонный гарнитур. Фасады пластик ARPA в ПВХ кромке. ','','Кухонный гарнитур. Фасады пластик ARPA в ПВХ кромке. ',NULL);
/*!40000 ALTER TABLE `galery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (1,'Galeries/Galery1/91c166.jpg',1,1,'Galery','f73ba2ff60-1',''),(2,'Galeries/Galery2/9228a0.jpg',2,1,'Galery','55db68747d-1',''),(3,'Galeries/Galery3/efebfe.jpg',3,1,'Galery','833e81eeb9-1',''),(4,'Galeries/Galery4/f5e795.jpg',4,1,'Galery','ebdb075b31-1',''),(5,'Galeries/Galery5/9d6a1e.jpg',5,1,'Galery','b5f99e02b9-1',''),(6,'Galeries/Galery6/e9cb84.jpg',6,1,'Galery','26baf98a0d-1',''),(7,'Galeries/Galery7/49b0e3.jpg',7,1,'Galery','de49695069-1',''),(8,'Galeries/Galery8/da1e29.jpg',8,1,'Galery','ca075bc4b7-1',''),(9,'Galeries/Galery9/3bfa82.jpg',9,1,'Galery','73ae5592c4-1',''),(10,'Galeries/Galery10/e9fb44.jpg',10,1,'Galery','cc66e74b87-1',''),(11,'Galeries/Galery11/901ce0.jpg',11,1,'Galery','254d468d62-1',''),(12,'Galeries/Galery12/2d0e34.jpg',12,1,'Galery','4f8cde3807-1',''),(13,'Galeries/Galery13/b550da.jpg',13,1,'Galery','d53df4cc5a-1',''),(14,'Galeries/Galery14/02e0ed.jpg',14,1,'Galery','9d7406f81d-1',''),(15,'Galeries/Galery15/0a356e.jpg',15,1,'Galery','69dd121b13-1',''),(16,'Galeries/Galery16/bd5c4f.jpg',16,1,'Galery','6b1d93e245-1',''),(17,'Galeries/Galery17/32b194.jpg',17,1,'Galery','ede7561da8-1',''),(18,'Galeries/Galery18/c91ac2.jpg',18,1,'Galery','be1adf5056-1',''),(19,'Galeries/Galery19/935be4.jpg',19,1,'Galery','36335a8a16-1',''),(20,'Galeries/Galery20/548000.jpg',20,1,'Galery','36adf1a113-1',''),(21,'Galeries/Galery21/844752.jpg',21,1,'Galery','fcdd21ce6d-1',''),(22,'Galeries/Galery22/9d7173.jpg',22,1,'Galery','99630d9dbe-1',''),(23,'Galeries/Galery23/020848.jpg',23,1,'Galery','2e259e6871-1',''),(24,'Galeries/Galery24/e022b5.jpg',24,1,'Galery','86da071492-1',''),(25,'Galeries/Galery25/a67d39.jpg',25,1,'Galery','781be92300-1',''),(26,'Galeries/Galery26/2aa4c1.jpg',26,1,'Galery','d36137cf88-1',''),(27,'Galeries/Galery27/6a231d.jpg',27,1,'Galery','1c5b4fb7a6-1',''),(28,'Galeries/Galery28/a7f94d.jpg',28,1,'Galery','e52161b765-1',''),(29,'Galeries/Galery29/38b183.jpg',29,1,'Galery','16d8e32baa-1',''),(30,'Galeries/Galery30/e21b02.jpg',30,1,'Galery','fd976bb383-1',''),(31,'Galeries/Galery31/f6ac60.jpg',31,1,'Galery','7a8935b19f-1',''),(32,'Galeries/Galery32/6d20f4.jpg',32,1,'Galery','4f6406db36-1',''),(33,'Galeries/Galery33/e9cf91.jpg',33,1,'Galery','9c86d4fa96-1',''),(34,'Galeries/Galery34/a15e51.jpg',34,1,'Galery','e6992a0cfd-1',''),(35,'Galeries/Galery35/6ee873.jpg',35,1,'Galery','2e93bcd74d-1',''),(36,'Galeries/Galery36/b38a0b.jpg',36,1,'Galery','2191bb4845-1',''),(37,'Galeries/Galery37/e89999.jpg',37,1,'Galery','6583b1b5eb-1',''),(38,'Galeries/Galery38/13fc43.jpg',38,1,'Galery','95cc386045-1',''),(39,'Galeries/Galery39/c6b02f.jpg',39,1,'Galery','1535be4319-1',''),(40,'Galeries/Galery40/e7ff6c.jpg',40,1,'Galery','058c147f0a-1',''),(41,'Galeries/Galery41/bbd8cb.jpg',41,1,'Galery','3e31df58d2-1',''),(42,'Galeries/Galery42/88a864.jpg',42,1,'Galery','fc8f357a89-1',''),(43,'Galeries/Galery43/19d20c.jpg',43,1,'Galery','45c898b04f-1',''),(44,'Galeries/Galery44/e631c1.jpg',44,1,'Galery','40037cd2eb-1',''),(45,'Galeries/Galery45/a81800.jpg',45,1,'Galery','2cb52edaf9-1',''),(46,'Galeries/Galery46/e4f644.jpg',46,1,'Galery','1820d59aba-1',''),(47,'Galeries/Galery47/2194e0.jpg',47,1,'Galery','4b38390717-1',''),(48,'Galeries/Galery48/b5324c.jpg',48,1,'Galery','7036d4c52b-1',''),(49,'Galeries/Galery49/a72552.jpg',49,1,'Galery','f7cfab7a60-1',''),(50,'Galeries/Galery50/c3b45c.jpg',50,1,'Galery','27acb4613c-1',''),(51,'Galeries/Galery51/4656a0.jpg',51,1,'Galery','65c6f92d77-1',''),(52,'Galeries/Galery52/7dea2d.jpg',52,1,'Galery','94569b609e-1',''),(53,'Galeries/Galery53/de8c5f.jpg',53,1,'Galery','030178ab2a-1',''),(54,'Galeries/Galery54/05b6ac.jpg',54,1,'Galery','3f57058b9e-1',''),(55,'Galeries/Galery55/0cf208.jpg',55,1,'Galery','c3993b953f-1',''),(56,'Galeries/Galery56/f5cd7e.jpg',56,1,'Galery','2c2ca8c2ab-1',''),(57,'Galeries/Galery57/c9c9fe.jpg',57,1,'Galery','074befd282-1',''),(58,'Galeries/Galery58/10df68.jpg',58,1,'Galery','a8217d327e-1',''),(59,'Galeries/Galery59/b17d1f.jpg',59,1,'Galery','2c31885e4a-1',''),(60,'Galeries/Galery60/17c484.jpg',60,1,'Galery','f0cba739e7-1',''),(61,'Galeries/Galery61/d28bbe.jpg',61,1,'Galery','6466433e7b-1',''),(62,'Galeries/Galery62/4aae81.jpg',62,1,'Galery','333385a932-1',''),(63,'Galeries/Galery63/b83151.jpg',63,1,'Galery','f180a431f6-1',''),(64,'Galeries/Galery64/873773.jpg',64,1,'Galery','2b8adb14f7-1',''),(65,'Galeries/Galery65/1a3b91.jpg',65,1,'Galery','7cc965875d-1',''),(66,'Galeries/Galery66/89db17.jpg',66,1,'Galery','bd41aa3dab-1',''),(67,'Galeries/Galery67/2af5cb.jpg',67,1,'Galery','df68ed0346-1',''),(68,'Galeries/Galery68/907868.jpg',68,1,'Galery','a62c93ac9b-1',''),(69,'Galeries/Galery69/0170b9.jpg',69,1,'Galery','15adda270d-1',''),(70,'Galeries/Galery70/ce19dc.jpg',70,1,'Galery','86a58679c7-1',''),(71,'Galeries/Galery71/9536c7.jpg',71,1,'Galery','7634437acf-1',''),(72,'Galeries/Galery72/77ef55.jpg',72,1,'Galery','e024030449-1',''),(73,'Galeries/Galery73/a3c15b.jpg',73,1,'Galery','13aafbf96f-1',''),(74,'Galeries/Galery74/b117a0.jpg',74,1,'Galery','722bf18ef3-1',''),(75,'Galeries/Galery75/cd9fb4.jpg',75,1,'Galery','decf435bc7-1',''),(76,'Galeries/Galery76/6a1c2c.jpg',76,1,'Galery','0e7646d38f-1',''),(77,'Galeries/Galery77/e046c2.jpg',77,1,'Galery','ef72a33d71-1',''),(78,'Galeries/Galery78/1a18ed.jpg',78,1,'Galery','c3d83b3fd3-1','');
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1488634107),('m140622_111540_create_image_table',1488634111),('m140622_111545_add_name_to_image_table',1488634111);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'mihan','','');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'aristosg_mih'
--
/*!50003 DROP PROCEDURE IF EXISTS `getAllImg` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`aristosg_mih`@`localhost` PROCEDURE `getAllImg`(IN `offs` INT(3), IN `lim` INT(3))
    NO SQL
SELECT galery.id, galery.title, galery.price, galery.description, image.filePath, image.urlAlias, image.isMain, image.itemId FROM galery 

                INNER JOIN image

        ON (galery.id = image.itemId) AND isMain=1 LIMIT lim OFFSET offs ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getContent` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`aristosg_mih`@`localhost` PROCEDURE `getContent`(IN `act` VARCHAR(256) CHARSET utf8)
    NO SQL
SELECT * FROM content WHERE page = act ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getExterieur` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`aristosg_mih`@`localhost` PROCEDURE `getExterieur`(IN `offs` INT(3), IN `lim` INT(3))
    NO SQL
SELECT galery.id, galery.category, galery.title, galery.price, galery.description, image.filePath, image.urlAlias, image.isMain, image.itemId FROM galery

                INNER JOIN image

        ON (galery.id = image.itemId) AND isMain=1 WHERE galery.category = 'exterieur' LIMIT lim OFFSET offs ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getImgById` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`aristosg_mih`@`localhost` PROCEDURE `getImgById`(IN `id` INT(3))
    NO SQL
SELECT galery.id, galery.title, galery.price, galery.description, galery.full_text, galery.timestamp, image.filePath, image.isMain, image.itemId FROM galery

                INNER JOIN image

                ON (galery.id = id AND image.itemId = id) AND isMain=1 ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getInterieur` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`aristosg_mih`@`localhost` PROCEDURE `getInterieur`(IN `offs` INT(3), IN `lim` INT(3))
    NO SQL
SELECT galery.id, galery.category, galery.title, galery.price, galery.description, image.filePath, image.urlAlias, image.isMain, image.itemId FROM galery

                INNER JOIN image

        ON (galery.id = image.itemId) AND isMain=1 WHERE galery.category = 'interieur' LIMIT lim OFFSET offs ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getKitchen` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`aristosg_mih`@`localhost` PROCEDURE `getKitchen`(IN `offs` INT(3), IN `lim` INT(3))
    NO SQL
SELECT galery.id, galery.category, galery.title, galery.price, galery.description, image.filePath, image.urlAlias, image.isMain, image.itemId FROM galery

                INNER JOIN image

        ON (galery.id = image.itemId) AND isMain=1 WHERE galery.category = 'kitchen' LIMIT lim OFFSET offs ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getKupe` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`aristosg_mih`@`localhost` PROCEDURE `getKupe`(IN `offs` INT(3), IN `lim` INT(3))
    NO SQL
SELECT galery.id, galery.category, galery.title, galery.price, galery.description, image.filePath, image.urlAlias, image.isMain, image.itemId FROM galery

                INNER JOIN image

        ON (galery.id = image.itemId) AND isMain=1 WHERE galery.category = 'kupe' LIMIT lim OFFSET offs ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getLastFromContent` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`aristosg_mih`@`localhost` PROCEDURE `getLastFromContent`(IN `act` VARCHAR(255) CHARSET utf8)
    NO SQL
SELECT last_mod FROM content WHERE page = act ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getLastFromImg` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`aristosg_mih`@`localhost` PROCEDURE `getLastFromImg`(IN `idn` INT(3))
    NO SQL
SELECT timestamp FROM `galery` WHERE `id`=idn ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getRacks` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`aristosg_mih`@`localhost` PROCEDURE `getRacks`(IN `offs` INT(3), IN `lim` INT(3))
    NO SQL
SELECT galery.id, galery.category, galery.title, galery.price, galery.description, image.filePath, image.urlAlias, image.isMain, image.itemId FROM galery

                INNER JOIN image

        ON (galery.id = image.itemId) AND isMain=1 WHERE galery.category = 'racks' LIMIT lim OFFSET offs ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-25 17:57:14
