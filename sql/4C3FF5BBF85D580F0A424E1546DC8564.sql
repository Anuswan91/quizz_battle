-- MySQL dump 10.13  Distrib 5.5.40, for Linux (x86_64)
--
-- Host: localhost    Database: heroku_9732ace84ff668b
-- ------------------------------------------------------
-- Server version	5.5.40-log

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
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `ans_id` int(11) NOT NULL AUTO_INCREMENT,
  `ans_text` varchar(100) NOT NULL,
  `ans_question_id` int(11) NOT NULL,
  `ans_correct` tinyint(1) NOT NULL,
  PRIMARY KEY (`ans_id`),
  KEY `fk_ans_question_id` (`ans_question_id`),
  CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`ans_question_id`) REFERENCES `question` (`qst_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2624 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (84,'Goscinny',34,0),(94,'Rousseau',34,0),(104,'Georges Rémi',34,1),(114,'Stephen King',34,0),(404,'rouge',74,0),(414,'bleu',74,0),(424,'rose bonbon',74,1),(434,'sale',74,0),(774,'toto',84,0),(834,'Sherlock Holmes',94,0),(844,'Docteur Watson',94,1),(854,'Tintin',94,0),(864,'Moriarty',94,0),(894,'George H. W. Bush',104,0),(994,'Hamilton',114,1),(1004,'Paris',114,0),(1014,'stockholm',114,0),(1024,'Jefferson City',114,0),(1034,'La vue',124,0),(1044,'Le toucher',124,0),(1054,'Le goût',124,0),(1234,'De poissons',184,0),(1244,'Des coquillages',184,1),(1254,'Des herbes',184,0),(1264,'Des lunettes',184,0),(1474,'Boris Karloff',214,1),(1484,'Jack Palence',214,0),(1494,'Christopher Lee',214,0),(1504,'Boris Vian',214,0),(1514,'Nostromo',224,1),(1524,'Entreprise',224,0),(1534,'X-Wing',224,0),(1544,'Boris Vian',224,0),(1554,'Le martien',234,1),(1564,'Spaceman',234,0),(1574,'E.T',234,0),(1584,'L\'inepuisable',234,0),(1594,'La nuit du loup-garou',244,1),(1604,'The Wolfman',244,0),(1614,'Wolfen',244,0),(1624,'Intouchable',244,0),(1634,'The ring',254,1),(1644,'Lord of the ring',254,0),(1654,'Wolfen',254,0),(1664,'Dark Water',254,0),(1674,'Hugh Jackman',264,1),(1684,'Richard Roxburgh',264,0),(1694,'Matt Damon',264,0),(1704,'Brad Pitt',264,0),(1714,'Mustache',274,1),(1724,'Mastuche',274,0),(1734,'Mistuchi',274,0),(1744,'Machi',274,0),(1754,'Moustache en guidon',284,1),(1764,'Moustache remontée',284,0),(1774,'Moustache en w',284,0),(1784,'Moustache cornue',284,0),(1794,'Blonde',294,1),(1804,'Rousse',294,0),(1814,'Brune',294,0),(1824,'Chatain',294,0),(1834,'Pour le chocolat Lanvin',304,1),(1844,'Pour Ferrari',304,0),(1854,'Pour Coca cola',304,0),(1864,'Pour Samsung',304,0),(1874,'La moustache en brosse',314,1),(1884,'La moustache riquiqui',304,0),(1894,'La moustache fluo',304,0),(1904,'La moustache pipeau',304,0),(1914,'Groucho Marx',324,1),(1924,'Chico Marx',324,0),(1934,'Harpo Marx',324,0),(1944,'Kafkan Marx',324,0),(1954,'Ned Flanders',334,1),(1964,'Gary',334,0),(1974,'Karl',334,0),(1984,'Smith',334,0),(1994,'Noir, rouge et jaune',344,1),(2004,'Bleu, rouge et blanc',344,0),(2014,'Noir, jaune et rouge',344,0),(2024,'Blanc, noir bleu',344,0),(2034,'1952',354,1),(2044,'1840',354,0),(2054,'1920',354,0),(2064,'1965',354,0),(2074,'Le néerlandais, le français et l\'allemand',364,1),(2084,'L\'autrichien, l\'anglais et le français ',364,0),(2094,'Le français, le néerlandais et l\'autrichien',364,0),(2104,'L\'anglais, le néerlandais et l\'allemand',364,0),(2114,'4',374,1),(2124,'3',374,0),(2134,'5',374,0),(2144,'6',374,0),(2154,'Sao Paulo',384,1),(2164,'Bresilia',384,0),(2174,'Rio de janeiro',384,0),(2184,'Porto Alegre',384,0),(2194,'Beijing',394,1),(2204,'Shangai',394,0),(2214,'Xi\'an',394,0),(2224,'Chengdu',394,0),(2234,'Felipe VI',404,1),(2244,'Juan Carlos 1er',404,0),(2254,'Alphonse II',404,0),(2264,'Henri III',404,0),(2274,'13',414,1),(2284,'12',414,0),(2294,'14',414,0),(2304,'24',414,0),(2314,'Bleu et blanc',424,1),(2324,'Rouge et vert',424,0),(2334,'Rouge et bleu',424,0),(2344,'Bleu et vert',424,0),(2354,'Ottawa',434,1),(2364,'Montréal',434,0),(2374,'Québec',434,0),(2384,'Vancouver',434,0),(2394,'Nippon ou Nihon',444,1),(2404,'Oyasuminasai',444,0),(2414,'Sayônara',444,0),(2424,'Mata ne',444,0),(2434,'Peso mexicain ',454,1),(2444,'Pekinois',454,0),(2454,'Pesos',454,0),(2464,'Yen',454,0),(2474,'Vladivostok',464,1),(2484,'Samara',464,0),(2494,'Barnaoul',464,0),(2504,'Tioumen',464,0),(2514,'La moustache riquiqui',314,0),(2524,'La moustache fluo',314,0),(2534,'La moustache pipeau',314,0),(2544,'Les félidés',474,1),(2554,'Les félinés',474,0),(2564,'Les féridés',474,0),(2574,'Les ferbride',474,0),(2584,'Les bovidés',484,1),(2594,'Les ovidés',484,0),(2604,'Les novidés',484,0),(2614,'Les ocnifère',484,0);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game` (
  `gme_id` int(11) NOT NULL AUTO_INCREMENT,
  `gme_date` datetime NOT NULL,
  `gme_nb_player` int(11) NOT NULL DEFAULT '0',
  `gme_state_id` int(11) NOT NULL,
  PRIMARY KEY (`gme_id`),
  KEY `fk_gme_state_id` (`gme_state_id`),
  CONSTRAINT `game_ibfk_1` FOREIGN KEY (`gme_state_id`) REFERENCES `state` (`ste_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=344 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game`
--

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` VALUES (144,'2017-05-24 15:57:07',2,3),(154,'2017-05-16 00:00:00',3,3),(164,'2017-05-25 09:58:09',1,3),(174,'2017-05-25 10:29:36',3,3),(184,'2017-05-25 12:04:16',2,3),(194,'2017-05-25 12:10:51',2,3),(204,'2017-05-25 12:14:28',1,3),(214,'2017-05-25 12:16:16',1,3),(224,'2017-05-25 12:20:56',1,3),(234,'2017-05-25 12:24:13',1,3),(244,'2017-05-25 12:26:32',2,3),(254,'2017-05-25 12:31:54',1,3),(264,'2017-05-25 15:13:30',1,3),(274,'2017-05-25 15:15:41',2,3),(284,'2017-05-25 15:17:11',1,3),(294,'2017-05-25 15:48:11',1,3),(304,'2017-05-25 15:53:46',2,3),(314,'2017-05-25 15:56:17',3,3),(324,'2017-05-25 16:01:37',3,3),(334,'2017-05-25 16:03:45',2,3);
/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_has_player`
--

DROP TABLE IF EXISTS `game_has_player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_has_player` (
  `ghp_game_id` int(11) NOT NULL,
  `ghp_player_id` int(11) NOT NULL,
  `ghp_alive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ghp_game_id`,`ghp_player_id`),
  KEY `fk_ghp_game_id` (`ghp_game_id`),
  KEY `fk_ghp_player_id` (`ghp_player_id`),
  CONSTRAINT `game_has_player_ibfk_1` FOREIGN KEY (`ghp_game_id`) REFERENCES `game` (`gme_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `game_has_player_ibfk_2` FOREIGN KEY (`ghp_player_id`) REFERENCES `player` (`plr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_has_player`
--

LOCK TABLES `game_has_player` WRITE;
/*!40000 ALTER TABLE `game_has_player` DISABLE KEYS */;
INSERT INTO `game_has_player` VALUES (144,584,1),(154,4,1),(154,24,1),(154,34,1),(164,594,1),(174,604,1),(174,624,1),(184,594,1),(184,634,1),(194,644,1),(194,654,1),(204,664,1),(214,674,1),(224,684,1),(234,694,1),(244,694,1),(244,704,1),(254,714,1),(264,624,1),(274,624,1),(274,724,1),(284,734,1),(294,564,0),(304,564,1),(304,744,1),(314,564,1),(314,764,1),(314,774,1),(324,774,1),(324,784,1),(324,794,1),(334,564,1),(334,784,1);
/*!40000 ALTER TABLE `game_has_player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_has_question`
--

DROP TABLE IF EXISTS `game_has_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_has_question` (
  `ghq_game_id` int(11) NOT NULL,
  `ghq_question_id` int(11) NOT NULL,
  `ghq_focus` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`ghq_game_id`,`ghq_question_id`),
  KEY `fk_ghq_game_id` (`ghq_game_id`),
  KEY `fk_ghq_question_id` (`ghq_question_id`),
  CONSTRAINT `game_has_question_ibfk_1` FOREIGN KEY (`ghq_game_id`) REFERENCES `game` (`gme_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `game_has_question_ibfk_2` FOREIGN KEY (`ghq_question_id`) REFERENCES `question` (`qst_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_has_question`
--

LOCK TABLES `game_has_question` WRITE;
/*!40000 ALTER TABLE `game_has_question` DISABLE KEYS */;
INSERT INTO `game_has_question` VALUES (154,74,0),(154,84,0),(154,94,0),(154,104,0),(154,114,0),(184,344,0),(184,354,0),(184,364,0),(184,384,0),(184,454,0),(194,384,0),(194,394,0),(194,424,0),(194,434,0),(194,454,0),(204,114,0),(204,354,0),(204,364,0),(204,374,0),(204,384,0),(204,394,0),(204,404,0),(204,414,0),(204,424,0),(204,434,0),(214,114,0),(214,354,0),(214,374,0),(214,384,0),(214,394,0),(214,404,0),(214,414,0),(214,424,0),(214,454,0),(214,464,0),(224,114,0),(224,344,0),(224,354,0),(224,364,0),(224,394,0),(224,404,0),(224,414,0),(224,424,0),(224,444,0),(224,454,0),(234,114,0),(234,344,0),(234,354,0),(234,364,0),(234,384,0),(234,404,0),(234,414,0),(234,434,0),(234,444,0),(234,454,0),(254,114,0),(254,344,0),(254,354,0),(254,364,0),(254,384,0),(254,394,0),(254,404,0),(254,424,0),(254,434,0),(254,464,0),(264,34,0),(264,94,0),(284,114,0),(284,344,0),(284,354,0),(284,384,0),(284,394,0),(284,404,0),(284,424,0),(284,434,0),(284,444,1),(284,454,0),(294,34,0),(294,94,0),(304,34,0),(304,94,0),(314,34,0),(314,94,0),(334,354,1),(334,384,0),(334,394,0),(334,414,0),(334,444,0);
/*!40000 ALTER TABLE `game_has_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player` (
  `plr_id` int(11) NOT NULL AUTO_INCREMENT,
  `plr_pseudo` varchar(46) NOT NULL,
  `plr_password` varchar(46) NOT NULL,
  `plr_guest` tinyint(1) NOT NULL DEFAULT '0',
  `plr_date_crea` date NOT NULL,
  `plr_status_id` int(11) NOT NULL,
  PRIMARY KEY (`plr_id`),
  KEY `fk_plr_status_id` (`plr_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=804 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player`
--

LOCK TABLES `player` WRITE;
/*!40000 ALTER TABLE `player` DISABLE KEYS */;
INSERT INTO `player` VALUES (4,'jean','jean',0,'2017-05-22',0),(14,'toto','',0,'0000-00-00',0),(24,'gataf','test',0,'0000-00-00',0),(34,'guest_052317120300','test',0,'0000-00-00',0),(44,'guest_052317120300','',0,'0000-00-00',0),(54,'. $psdPlr .','',0,'0000-00-00',0),(64,'guest_052317121737','',0,'0000-00-00',0),(74,'guest_052317121804','',0,'0000-00-00',0),(84,'guest_052317121823','',0,'0000-00-00',0),(94,'guest_052317121836','',0,'0000-00-00',0),(104,'guest_052317121850','',0,'0000-00-00',0),(114,'guest_052317122033','',0,'0000-00-00',0),(124,'guest_052317122049','',0,'0000-00-00',0),(134,'guest_052317122105','',0,'0000-00-00',0),(144,'guest_052317122246','',0,'0000-00-00',0),(154,'. $psdPlr .','',0,'0000-00-00',0),(164,'guest_052317122457','',0,'0000-00-00',0),(174,'guest_052317122530','',0,'0000-00-00',0),(184,'guest_052317122617','',0,'0000-00-00',0),(194,'guest_052317122634','',0,'0000-00-00',0),(204,'guest_052317123036','',0,'0000-00-00',0),(214,'guest_052317123127','',0,'0000-00-00',0),(224,'luc','lucaaa',0,'2017-05-23',1),(234,'guest_052317032110','',0,'0000-00-00',0),(244,'ddd','dddd',0,'2017-05-23',1),(254,'guest_052317045436','',0,'0000-00-00',0),(264,'guest_052317045500','',0,'0000-00-00',0),(274,'guest_052317045509','',0,'0000-00-00',0),(284,'guest_052317050121','',0,'0000-00-00',0),(294,'guest_052317050215','',0,'0000-00-00',0),(304,'guest_052317050234','',0,'0000-00-00',0),(314,'guest_052317050338','',0,'0000-00-00',0),(324,'guest_052317052307','',0,'0000-00-00',0),(334,'guest_052317052924','',0,'0000-00-00',0),(344,'Test1','test1',0,'2017-05-23',1),(354,'guest_052317083300','',0,'0000-00-00',0),(364,'guest_052417102744','',1,'0000-00-00',0),(374,'guest_052417102748','',1,'0000-00-00',0),(384,'guest_052417102837','',1,'0000-00-00',0),(394,'guest_052417102924','',1,'0000-00-00',0),(404,'guest_052417115939','',0,'0000-00-00',0),(414,'guest_052417120429','',1,'0000-00-00',0),(424,'guest_052417013337','',1,'0000-00-00',0),(434,'guest_052417013413','',1,'0000-00-00',0),(444,'guest_052417013447','',1,'0000-00-00',0),(454,'guest_052417013540','',1,'0000-00-00',0),(464,'guest_052417013857','',1,'0000-00-00',0),(474,'guest_052417014008','',1,'0000-00-00',0),(484,'guest_052417014013','',1,'0000-00-00',0),(494,'guest_052417030803','',1,'0000-00-00',0),(504,'guest_052417031245','',1,'0000-00-00',0),(514,'guest_052417031747','',1,'0000-00-00',0),(524,'guest_052417033023','',1,'0000-00-00',0),(534,'guest_052417033500','',1,'0000-00-00',0),(544,'guest_052417033729','',1,'0000-00-00',0),(554,'guest_052417034130','',1,'0000-00-00',0),(564,'vivien','vivien',0,'2017-05-24',1),(574,'guest_052417035535','',1,'0000-00-00',0),(584,'guest_052417035709','',1,'0000-00-00',0),(594,'guest_052517095808','',1,'0000-00-00',0),(604,'guest_052517102936','',1,'0000-00-00',0),(614,'Busquets','alexis',0,'2017-05-25',1),(624,'guest_052517015952','',1,'0000-00-00',0),(634,'guest_052517120819','',1,'0000-00-00',0),(644,'guest_052517121050','',1,'0000-00-00',0),(654,'guest_052517121337','',1,'0000-00-00',0),(664,'guest_052517121428','',1,'0000-00-00',0),(674,'guest_052517121615','',1,'0000-00-00',0),(684,'guest_052517122056','',1,'0000-00-00',0),(694,'guest_052517122412','',1,'0000-00-00',0),(704,'guest_052517123135','',1,'0000-00-00',0),(714,'guest_052517123153','',1,'0000-00-00',0),(724,'guest_052517031541','',1,'0000-00-00',0),(734,'guest_052517051712','',1,'0000-00-00',0),(744,'guest_052517035346','',1,'0000-00-00',0),(754,'a','aaaaa',0,'2017-05-25',1),(764,'guest_052517035617','',1,'0000-00-00',0),(774,'guest_052517035921','',1,'0000-00-00',0),(784,'guest_052517040137','',1,'0000-00-00',0),(794,'guest_052517060315','',1,'0000-00-00',0);
/*!40000 ALTER TABLE `player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player_has_answer`
--

DROP TABLE IF EXISTS `player_has_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player_has_answer` (
  `pha_game_id` int(11) NOT NULL,
  `pha_player_id` int(11) NOT NULL,
  `pha_answer_id` int(11) NOT NULL,
  PRIMARY KEY (`pha_game_id`,`pha_player_id`,`pha_answer_id`),
  KEY `fk_pha_game_id` (`pha_game_id`),
  KEY `fk_pha_player_id` (`pha_player_id`),
  KEY `fk_pha_answer_id` (`pha_answer_id`),
  CONSTRAINT `player_has_answer_ibfk_3` FOREIGN KEY (`pha_answer_id`) REFERENCES `answer` (`ans_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `player_has_answer_ibfk_1` FOREIGN KEY (`pha_game_id`) REFERENCES `game` (`gme_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `player_has_answer_ibfk_2` FOREIGN KEY (`pha_player_id`) REFERENCES `player` (`plr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player_has_answer`
--

LOCK TABLES `player_has_answer` WRITE;
/*!40000 ALTER TABLE `player_has_answer` DISABLE KEYS */;
INSERT INTO `player_has_answer` VALUES (154,4,424),(154,4,774),(154,4,834),(154,4,894),(154,4,994),(254,714,2244),(254,714,2314),(254,714,2354),(254,714,2474),(284,734,1024),(284,734,1994),(284,734,2064),(284,734,2174),(284,734,2194),(284,734,2244),(284,734,2314),(284,734,2364),(284,734,2394),(284,734,2434),(334,564,2034),(334,564,2174),(334,564,2184),(334,564,2194),(334,564,2214),(334,564,2274),(334,564,2304),(334,564,2394);
/*!40000 ALTER TABLE `player_has_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `qst_id` int(11) NOT NULL AUTO_INCREMENT,
  `qst_text` varchar(250) DEFAULT NULL,
  `qst_theme_id` int(11) NOT NULL,
  PRIMARY KEY (`qst_id`),
  KEY `fk_qst_theme_id` (`qst_theme_id`),
  CONSTRAINT `question_ibfk_1` FOREIGN KEY (`qst_theme_id`) REFERENCES `theme` (`thm_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=494 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (34,'Qui a écrit Tintin',24),(74,'Quelle est la couleur du caleçon de Maxime ?',94),(84,'Quelle est la couleur du cheval blanc ?',4),(94,'Qui raconte les aventures de Sherlock Holmes ?',24),(104,'Qui fut le quarantième président des USA ?',4),(114,'Quelle est la capitale des Bermudes ?',134),(124,'Lequel des cinq sens manque au serpent ?',84),(184,'Que collectionne un conchyophile ?',144),(214,'Lequel de ces acteurs n\'a jamais joué Dracula?',154),(224,'Comment s\'appelle le vaisseau spatial où se déroule l\'action d\'Alien 1?',154),(234,'Comment est surnommé l\'agent Fox Mulder par ses collègues dans la série X-Files?',154),(244,'Lequel de ces films se déroule en Espagne?',154),(254,'Dans quel film le sujet est-il une cassette vidéo qui tue tous ceux que la regarde?',154),(264,'Lequel de ces acteurs est la vedette de Van Helsing?',154),(274,'Comment dit-on moustache en anglais?',164),(284,'Comment s\'appelle le type de moustache dont les extrémités sont longues et recourbées entre les doigts afin de les faire remonter légèrement vers le haut?',164),(294,'De quelle couleur est la moustache d\'Asterix?',164),(304,'Pour quelle marque voit on la moustache de Dali faire des cabrioles en 1968?',164),(314,'Comment s\'appelle le type de moustache qu\'aborde entre autre Tom Selleck?',164),(324,' Lequel des Marx Brothers est célèbre pour sa moustache et son cigare?',164),(334,' Comment s\'appelle le voisin moustachu des Simpsons?\n',164),(344,'Quelles sont les trois couleurs du drapeau allemand de haut en bas?\n',134),(354,'En quelle année Elizabeth II est devenue reine?\n',134),(364,'Quelles sont les trois langues officielles en Belgique?\n',134),(374,'Combien de départements comptent la Bretagne?\n',134),(384,'Quelle est la plus grande ville du Brésil?\n',134),(394,'Quel est l\'autre nom de Pékin ?\n',134),(404,'Comment s\'appelle le roi d\'Espagne?\n',134),(414,'Le drapeau des Etats-Unis contient 50 étoiles mais combien a-t-il de bandes rouges et blanches?\n',134),(424,'Quelles sont les deux couleurs du drapeau grec?\n',134),(434,'Quelle est la capitale du Canada?\n',134),(444,'Comment dit-on Japon en japonais?\n',134),(454,'Quelle est la monnaie du Mexique?\n',134),(464,'Le transsibérien relie Moscou à quelle autre ville?\n',134),(474,'A quelle famille appartient le Puma?\n',144),(484,'A quelle famille appartient la Vache?\n',144);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `state` (
  `ste_id` int(11) NOT NULL AUTO_INCREMENT,
  `ste_name` varchar(46) NOT NULL,
  PRIMARY KEY (`ste_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` VALUES (1,'initialization'),(2,'end'),(3,'in game'),(4,'run');
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `stu_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_name` varchar(46) NOT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'initialization'),(4,'Disconnected'),(14,'Connected');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theme`
--

DROP TABLE IF EXISTS `theme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `theme` (
  `thm_id` int(11) NOT NULL AUTO_INCREMENT,
  `thm_name` varchar(46) NOT NULL,
  `thm_color` varchar(7) DEFAULT '#FFFFFF',
  PRIMARY KEY (`thm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theme`
--

LOCK TABLES `theme` WRITE;
/*!40000 ALTER TABLE `theme` DISABLE KEYS */;
INSERT INTO `theme` VALUES (4,'Histoire','#663300'),(24,'Littérature','#ff5050'),(84,'Sciences','#ec5913'),(94,'Nourriture','#ff0000'),(124,'Corps','#6f006f'),(134,'Géographie','#36e93a'),(144,'Animaux','#4646e1'),(154,'Cinéma','#ff80ff'),(164,'Moustache','#83e9e9');
/*!40000 ALTER TABLE `theme` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-25 16:09:12
