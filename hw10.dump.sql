-- MySQL dump 10.13  Distrib 5.5.53, for Win64 (AMD64)
--
-- Host: localhost    Database: hw10
-- ------------------------------------------------------
-- Server version	5.5.53

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Action','Категория Action','2017-04-26 08:37:17','2017-04-27 10:31:18'),(2,'RPG','Описание RPG','2017-04-26 08:37:17','2017-04-27 07:03:56'),(3,'Квесты','Описание \"Квесты\"','2017-04-26 08:37:17','2017-04-27 07:04:37'),(4,'Онлайн-игры','Описание \"Онлайн-игры\"','2017-04-26 08:37:18','2017-04-27 07:05:11'),(5,'Стратегии','Описание \"Стратегии\"','2017-04-26 08:37:18','2017-04-27 07:05:32');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_04_26_104350_create_products_table',2),(4,'2017_04_26_104416_create_categories_table',2),(5,'2017_04_26_160606_add_admin_to_users',3),(6,'2017_04_29_061830_create_orders_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `closed` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (2,1,35,'Johnny','ekotvizky@gmail.com',0,NULL,'2017-04-29 11:15:01','2017-04-29 11:15:01'),(3,1,35,'Johnny','ekotvizky@gmail.com',1,NULL,'2017-04-29 11:16:22','2017-04-29 12:39:59'),(4,1,26,'Новое имя1','forcat1@gmail.com',0,NULL,'2017-04-29 11:57:23','2017-04-29 12:45:44'),(5,1,31,'Johnny','ekotvizky@gmail.com',0,NULL,'2017-04-29 14:06:47','2017-04-29 14:06:47'),(6,1,31,'Johnny','ekotvizky@gmail.com',0,NULL,'2017-04-29 14:12:03','2017-04-29 14:12:03');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `price` decimal(7,2) unsigned NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Et esse veniam vel.',2,67.81,'1.jpg','Hatter. He had been all the time they had a large one, but the Dodo solemnly presented the thimble, saying \'We beg your pardon!\'!','2017-04-24 06:03:47','2017-04-27 17:48:11'),(2,'Modi eos porro nihil suscipit consectetur.',1,73.92,'2.jpg','Hatter went on in a deep voice, \'are done with a sudden leap out of the bottle was a general chorus of voices asked. \'Why, SHE, of course,\' said the King, the Queen, who was talking. \'How CAN I have.','1977-09-08 06:57:19','2017-04-27 18:14:36'),(3,'Ut voluptatibus aperiam sint quia.',4,93.52,'3.jpg','What made you so awfully clever?\' \'I have answered three questions, and that is enough,\' Said his father; \'don\'t give yourself airs! Do you think, at your age, it is all the time he had come back.','2017-02-07 15:06:45','2017-04-27 18:14:48'),(4,'Repellendus nobis atque autem nihil.',4,19.47,NULL,'I should like to drop the jar for fear of killing somebody, so managed to swallow a morsel of the Gryphon, \'you first form into a doze; but, on being pinched by the time they had to pinch it to be a.','2013-11-23 20:12:11','2017-04-26 08:40:35'),(5,'Quas nihil quasi amet exercitationem expedita.',0,88.09,NULL,'Footman continued in the other. \'I beg your pardon,\' said Alice sadly. \'Hand it over here,\' said the Mouse with an anxious look at it!\' This speech caused a remarkable sensation among the distant.','2004-02-01 14:53:12','2017-04-26 08:40:35'),(6,'Voluptatem numquam repellat quis.',2,62.29,NULL,'Mock Turtle. \'Certainly not!\' said Alice sharply, for she was nine feet high. \'Whoever lives there,\' thought Alice, \'they\'re sure to kill it in her French lesson-book. The Mouse did not sneeze, were.','1991-06-14 19:54:42','2017-04-26 08:40:35'),(7,'Laborum nesciunt amet et nobis possimus.',1,97.94,NULL,'Bill\'s place for a minute or two, which gave the Pigeon had finished. \'As if I must, I must,\' the King said, turning to Alice to herself. (Alice had no pictures or conversations?\' So she went back.','1987-04-25 12:27:33','2017-04-26 08:40:35'),(8,'Alias rem non dicta dolor voluptatem.',4,26.02,NULL,'Alice said to the Mock Turtle to the Knave. The Knave did so, very carefully, nibbling first at one end to the rose-tree, she went in search of her skirt, upsetting all the time when I get it home?\'.','2006-06-16 05:53:42','2017-04-26 08:40:35'),(9,'Cupiditate voluptas ut molestiae.',1,20.96,NULL,'Queen was to twist it up into a line along the sea-shore--\' \'Two lines!\' cried the Gryphon, with a lobster as a lark, And will talk in contemptuous tones of the soldiers did. After these came the.','2002-09-23 01:10:38','2017-04-26 08:40:35'),(10,'Quis sint magnam qui maxime cumque quia.',3,80.83,NULL,'English,\' thought Alice; \'I daresay it\'s a set of verses.\' \'Are they in the distance, sitting sad and lonely on a branch of a well?\' \'Take some more tea,\' the March Hare: she thought it over here,\'.','1970-02-16 13:05:54','2017-04-26 08:40:35'),(11,'Sed enim consequatur ea minima iusto est.',3,2.58,NULL,'Alice whispered, \'that it\'s done by everybody minding their own business,\' the Duchess sneezed occasionally; and as he spoke. \'A cat may look at them--\'I wish they\'d get the trial one way up as the.','2013-05-23 02:25:04','2017-04-26 08:40:35'),(12,'Asperiores repellat voluptas eaque ab.',0,50.36,NULL,'Yet you finished the guinea-pigs!\' thought Alice. \'I\'ve so often read in the middle, wondering how she was quite out of THIS!\' (Sounds of more broken glass.) \'Now tell me, please, which way it was.','2005-07-05 12:08:34','2017-04-26 08:40:35'),(13,'Iste pariatur et aut officia.',1,39.70,NULL,'The first thing she heard the King was the King; and as Alice could not stand, and she ran off as hard as he wore his crown over the jury-box with the next moment she quite forgot you didn\'t sign.','2000-06-11 02:01:27','2017-04-26 08:40:35'),(14,'Corporis dolores temporibus ut aspernatur quo.',2,5.78,NULL,'I\'m sure I have none, Why, I wouldn\'t say anything about it, you may stand down,\' continued the King. \'It began with the bread-and-butter getting so far off). \'Oh, my poor hands, how is it I can\'t.','1977-06-16 12:41:22','2017-04-26 08:40:35'),(15,'Voluptatibus aut tempora soluta et atque.',1,79.72,NULL,'In another minute the whole pack rose up into the sky. Alice went on saying to her great disappointment it was addressed to the Knave of Hearts, and I shall see it quite plainly through the door,.','1972-05-06 21:18:39','2017-04-26 08:40:35'),(16,'Culpa omnis eum ratione expedita consequatur.',1,67.74,'16.jpg','Duchess, the Duchess! Oh! won\'t she be savage if I\'ve kept her eyes to see you again, you dear old thing!\' said the Mouse, frowning, but very politely: \'Did you speak?\' \'Not I!\' said the March Hare..','1988-07-21 11:59:57','2017-04-28 12:08:03'),(17,'Distinctio qui ea fugit.',2,20.53,'17.jpg','I\'ve tried banks, and I\'ve tried banks, and I\'ve tried hedges,\' the Pigeon in a sorrowful tone; \'at least there\'s no meaning in them, after all. \"--SAID I COULD NOT SWIM--\" you can\'t swim, can you?\'.','1971-10-26 08:17:20','2017-04-28 12:07:49'),(18,'Accusantium voluptas nobis qui unde debitis.',2,10.40,'18.jpg','Mock Turtle said: \'I\'m too stiff. And the moral of that is--\"Oh, \'tis love, that makes people hot-tempered,\' she went round the table, half hoping that the reason of that?\' \'In my youth,\' said the.','2007-03-12 21:59:31','2017-04-28 12:07:34'),(19,'Dolorem aliquid est in sint.',2,7.56,'19.jpg','Edwin and Morcar, the earls of Mercia and Northumbria--\"\' \'Ugh!\' said the Gryphon: and Alice guessed in a deep sigh, \'I was a long time together.\' \'Which is just the case with MINE,\' said the Mock.','2015-06-17 18:06:53','2017-04-28 12:07:18'),(20,'Est ipsum iure mollitia dolorem ullam.',3,53.41,'20.jpg','Beautiful, beauti--FUL SOUP!\' \'Chorus again!\' cried the Mock Turtle persisted. \'How COULD he turn them out with his head!\' or \'Off with her arms round it as she heard the King and Queen of Hearts,.','2008-10-23 13:55:23','2017-04-28 12:07:07'),(21,'Repudiandae hic quia molestiae sint nihil.',4,37.72,'21.jpg','BEST butter, you know.\' \'I don\'t think it\'s at all anxious to have no idea what Latitude or Longitude either, but thought they were all locked; and when she got up, and reduced the answer to.','1973-07-06 16:49:37','2017-04-28 12:06:56'),(22,'Quo dicta et laborum ut.',2,69.93,'22.jpg','I\'ve had such a subject! Our family always HATED cats: nasty, low, vulgar things! Don\'t let me hear the very tones of her going, though she felt unhappy. \'It was much pleasanter at home,\' thought.','2003-12-12 17:47:19','2017-04-28 12:06:44'),(23,'Sed ut aliquid quasi.',5,58.40,'23.jpg','HE went mad, you know--\' \'But, it goes on \"THEY ALL RETURNED FROM HIM TO YOU,\"\' said Alice. \'I\'ve read that in the last few minutes, and began whistling. \'Oh, there\'s no harm in trying.\' So she.','1979-09-29 10:04:48','2017-04-28 15:07:05'),(24,'Sit nihil molestias numquam veniam.',5,81.62,'24.jpg','She felt very curious sensation, which puzzled her too much, so she sat on, with closed eyes, and half believed herself in the pool of tears which she concluded that it was as much right,\' said the.','2000-11-09 10:10:32','2017-04-28 15:07:18'),(25,'Quia dolor quibusdam sed expedita veniam qui.',1,66.51,'25.jpg','I only wish people knew that: then they wouldn\'t be so proud as all that.\' \'With extras?\' asked the Gryphon, and the soldiers did. After these came the royal children, and everybody laughed, \'Let.','1992-03-03 20:59:07','2017-04-28 12:06:09'),(26,'Batman',1,60.63,'26.jpg','Fainting in Coils.\' \'What was that?\' inquired Alice. \'Reeling and Writhing, of course, to begin again, it was good manners for her neck would bend about easily in any direction, like a frog; and.','1977-10-12 19:29:22','2017-04-28 10:40:48'),(27,'Call of Duty: Black ops II',1,9.45,'27.jpg','Hatter, and he went on so long since she had this fit) An obstacle that came between Him, and ourselves, and it. Don\'t let me hear the Rabbit angrily. \'Here! Come and help me out of his shrill.','1983-12-11 03:15:54','2017-04-28 10:40:28'),(31,'World of WarCraft',1,10.00,'31.jpg','Описание','2017-04-27 15:09:35','2017-04-28 10:10:34'),(34,'Deus Ex: Mankind Divided',2,10.00,'34.jpg','Описание','2017-04-27 16:25:02','2017-04-28 10:11:02'),(35,'Deus Ex: Mankind Divided',2,450.00,'35.jpg','Описание1','2017-04-27 16:25:49','2017-04-28 10:08:47'),(36,'The Witcher 3: Wild Hunt',1,400.00,'36.jpg','Описание стратегии','2017-04-27 16:49:29','2017-04-28 10:11:59');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Johnny','ekotvizky@gmail.com','$2y$10$vB/8odpg7tuIp89Uvt1LOuxZH.sN0pVEZ27i3K6ve3TESoUVX0eR.','mYCIWP0dSZbYAyyI4Pge8TS8JKWcMPsc0YJXuHjFAXDDASKB2dLVyxzXCjk8',0,'2017-04-26 04:38:36','2017-04-26 04:38:36'),(2,'Shayna Schneider','davin12@gmail.com','GRW9LV&!`oQM(8ko$br=',NULL,0,'2017-04-26 08:37:17','2017-04-26 08:37:17'),(3,'Mrs. Vickie Balistreri II','angeline.cartwright@kunde.org','tn0+F+;?+S`\'+VgBOv\'s',NULL,0,'2017-04-26 08:37:17','2017-04-26 08:37:17'),(4,'Ena Kuhn','jacynthe52@yahoo.com','zv=0mGFmocul$|:x>\"5F',NULL,0,'2017-04-26 08:37:17','2017-04-26 08:37:17'),(5,'Lindsey Frami','pdach@gmail.com','3VS$y\'j!hC4[,:1gqlJ(',NULL,0,'2017-04-26 08:37:17','2017-04-26 08:37:17'),(6,'Zola Leuschke','sterling85@yahoo.com','<e-P]Y+^r<O</]Su)U4:',NULL,0,'2017-04-26 08:37:17','2017-04-26 08:37:17'),(7,'Mr. Jerad Beatty','durgan.javonte@gmail.com','Ta\'VWn~f>=agcV4XaEI#',NULL,0,'2017-04-26 08:39:16','2017-04-26 08:39:16'),(8,'Electa Schultz II','ablick@collins.org',']BWj-P%CdI\")HGio)mR2',NULL,0,'2017-04-26 08:39:16','2017-04-26 08:39:16'),(9,'Katlynn Torphy','emmett61@yahoo.com','=8F9d_-GWrW7bH*IMEWA',NULL,0,'2017-04-26 08:39:16','2017-04-26 08:39:16'),(10,'Lukas Weimann','pasquale58@gmail.com','~&l.@qq,=oT{m_9M0]We',NULL,0,'2017-04-26 08:39:16','2017-04-26 08:39:16'),(11,'Manuel Feest','hilpert.marietta@heller.com','vCVo<AM2h)|}@wY^0R?l',NULL,0,'2017-04-26 08:39:16','2017-04-26 08:39:16'),(12,'Prof. Israel Schimmel MD','cleve.reinger@kovacek.com','6Izt9jfO\"PK))?Y2O@TR',NULL,0,'2017-04-26 08:40:35','2017-04-26 08:40:35'),(13,'Bertrand Kuhlman','nmckenzie@gmail.com','%fc>/*a@0?zs-\\uh++V-',NULL,0,'2017-04-26 08:40:35','2017-04-26 08:40:35'),(14,'Bradford Dooley','vwhite@keebler.net','7_[q\\]{o}\\<(bSp{qiK/',NULL,0,'2017-04-26 08:40:35','2017-04-26 08:40:35'),(15,'Blaze Reynolds','gia.langworth@lemke.biz','eo/rTpSm5PAByMC/zT\">',NULL,0,'2017-04-26 08:40:35','2017-04-26 08:40:35'),(16,'Mrs. Malinda Volkman MD','dietrich.alan@marvin.com','0W4SJQ\"T9fa?5sR1W1:.',NULL,0,'2017-04-26 08:40:35','2017-04-26 08:40:35'),(28,'Евгений Викторович Котвицкий','123@gmail.com','$2y$10$eiNjDH6doEpO.NGz8q2kt.X1Zb99UZdMG7Bt.mtUEbSnAzrgKwK2m',NULL,0,'2017-04-26 16:34:26','2017-04-26 16:34:26'),(29,'Админ','forcat@gmail.com','$2y$10$LsHR8sq5SoKJXUXcaKKnxea.kojzgPIi66n/xbyz6zS4jov6ybI1K',NULL,1,'2017-04-29 14:30:36','2017-04-29 14:30:36'),(30,'Admin','forcat@ukr.net','$2y$10$4qpMKrP0qzagQoJPmoPWnOJVF3y5XBr6VcKQiGm1H2nUkjkYB6Psu','upft5f5ha0ju9XHR4PaOmjY5ORg8awMAduBqSXkqQ3MFnuRNBmSEWMhyVb56',1,'2017-04-29 14:32:01','2017-04-29 14:32:01'),(31,'Admin','forcat0@ukr.ner','$2y$10$gjpLnYB6gI/4h/IoumZYTO5HKN.2qtMQE6iMNernCMNVdoAETySzK',NULL,1,'2017-04-29 14:35:06','2017-04-29 14:35:06'),(32,'admin0','ekotvizky0@gmail.com','$2y$10$TRp62PaUktSdJY8eokoKC.Py9YtuIF4GBdFmBmVZ7Njyu5rApkfAW',NULL,0,'2017-04-29 14:35:51','2017-04-29 14:35:51'),(33,'new','new@mail.ru','$2y$10$Emvk7zwMgbrJFTXIBvkK2.ShY3egDS0FDkLasP89ZX//B5eB3kvZq',NULL,1,'2017-04-29 14:46:27','2017-04-29 14:46:27'),(34,'Вася','1@mail.ru','$2y$10$GOfnaRAgiGlvEXteZDfCIuGoFj12Nvwn1.GXSwhab9N7wRDgzci3e','oZ8J6WOZ9vTaOaMVvP8ADpkoC0edybo8kcOjU0v2I4Qnl9m8hbT0ybXeDOXV',0,'2017-04-29 16:02:58','2017-04-29 16:02:58'),(35,'Петя','2@mail.ru','$2y$10$yUTSUpXa10IW.C50jXxUKOWvUA0foRRtLa0bR9GHTUPF0essPU0Hm',NULL,0,'2017-04-29 16:05:44','2017-04-29 16:05:44'),(36,'piter','3@mail.ru','$2y$10$ehiq5KmRgKYZp56ymYcNMepj0uPOySJcNbPToOI9Nj6OreJQ.I6Ay','G8Di6VPmGToZcAZLGr6ZHoekoJN3Phb7Msl4VL7OTxSajHqXHcGD19JbjMYJ',0,'2017-04-29 16:08:33','2017-04-29 16:08:33'),(37,'4@mail.ru','4@mail.ru','$2y$10$g.iH7VQHoJ/W/fvPcsPSu.8Zb.kYCwboA6rnJdGIuC/l4X5jQ8gPm','18sTq3YRAZpcUsWq8chRXWhc9oUBfzRXEalq8DAGx2bRgFKcIynPetkAILOe',0,'2017-04-29 16:11:31','2017-04-29 16:11:31'),(38,'5@mail.ru','5@mail.ru','$2y$10$sC9uFzRPu/ZSELXb4pBYSOgImiZ3RjGEo5Hz.1xXlTfo8e8jK8iv2','TDvPDuu2subqy3sbMIfQ8l07HC9Ct2T2X641hQdqXYyddqw3DKQo4py2ghfi',1,'2017-04-29 16:21:24','2017-04-29 16:21:24'),(39,'6@mail.ru','6@mail.ru','$2y$10$WYII3AYLsoz08aa9uxo1kuBwzIYrJEaJIDBmkgnSh9VkBTmS/lm9m','thnUUEDVYJotWuJSi8PSJDMhDQ66iKwORXH7lysM15rt4ge8vuREnPA1l3TF',0,'2017-04-29 16:22:03','2017-04-29 16:22:03'),(40,'8@mail.ru','8@mail.ru','$2y$10$EnkJ.9aNYGxEatzerDkBe.FHe0bcWcK1rR/1cqffpwZsT1Q.EX2SK',NULL,1,'2017-04-29 16:23:48','2017-04-29 16:23:48');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-29 22:39:15
