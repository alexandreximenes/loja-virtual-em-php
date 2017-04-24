-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: sistemavendas
-- ------------------------------------------------------
-- Server version	5.7.17

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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(300) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `senha` varchar(10) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT 'img/nao-disponivel.jpg',
  PRIMARY KEY (`codigo`),
  KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (3,'Alexandre Ximenes','1993-05-05','Rua Nova Aurora',1689,'81920650','Curitiba','','xyymenes@gmail.com','tipmuch','img/cliente/mini.jpg'),(4,'Dayane Correa de Barros ','1983-03-05','Rua Nova Aurora',1689,'81920650','Curitiba','','daay.ximenes@gmail.com','tipmuch','img/cliente/10574415_544052089033704_207872072555606321_n.jpg'),(5,'Arthur Ximenes','2015-03-29','Rua nova aurora',1689,'81920650','Curitiba','','arthur@gmail.com','tipmuch','img/cliente/20151016_204611.jpg');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dados_site`
--

DROP TABLE IF EXISTS `dados_site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dados_site` (
  `nome` varchar(300) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `jogo` varchar(300) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `codigo` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dados_site`
--

LOCK TABLES `dados_site` WRITE;
/*!40000 ALTER TABLE `dados_site` DISABLE KEYS */;
INSERT INTO `dados_site` VALUES ('Alexandre Ximenes','xyymenes@gmail.com','Fifa 2017',215.00,20),('Alexandre Ximenes','xyymenes@gmail.com','Conduit',99.00,20),('Dayane Correa de Barros ','daay.ximenes@gmail.com','Super Mario',49.00,21),('Dayane Correa de Barros ','daay.ximenes@gmail.com','Super Mario',49.00,22),('Dayane Correa de Barros ','daay.ximenes@gmail.com','Conduit',99.00,22),('Dayane Correa de Barros ','daay.ximenes@gmail.com','Conduit',99.00,23),('Dayane Correa de Barros ','daay.ximenes@gmail.com','Conduit',99.00,24),('Dayane Correa de Barros ','daay.ximenes@gmail.com','Conduit',99.00,25),('Dayane Correa de Barros ','daay.ximenes@gmail.com','Fifa 2016',199.00,25),('Dayane Correa de Barros ','daay.ximenes@gmail.com','God of war 2',100.00,26),('Alexandre Ximenes','xyymenes@gmail.com','Conduit',99.00,27),('Alexandre Ximenes','xyymenes@gmail.com','Call of dutty',110.00,27),('Alexandre Ximenes','xyymenes@gmail.com','Conduit',99.00,28),('Alexandre Ximenes','xyymenes@gmail.com','Pes 2017',200.00,30),('Alexandre Ximenes','xyymenes@gmail.com','Pes 2017',200.00,31),('Alexandre Ximenes','xyymenes@gmail.com','UFC',186.00,31),('Alexandre Ximenes','xyymenes@gmail.com','Super Mario',49.00,32),('Alexandre Ximenes','xyymenes@gmail.com','Asphalt 7',89.00,34),('Dayane Correa de Barros ','daay.ximenes@gmail.com','Call of dutty',110.00,36),('Dayane Correa de Barros ','daay.ximenes@gmail.com','Asphalt 7',89.00,37),('Dayane Correa de Barros ','daay.ximenes@gmail.com','Battlefield ',112.00,37),('Dayane Correa de Barros ','daay.ximenes@gmail.com','Conduit',99.00,38),('Dayane Correa de Barros ','daay.ximenes@gmail.com','Conduit',99.00,38),('Dayane Correa de Barros ','daay.ximenes@gmail.com','Minecraft',2015.00,39),('Dayane Correa de Barros ','daay.ximenes@gmail.com','Murdered',2016.00,39),('Alexandre Ximenes','xyymenes@gmail.com','Call of dutty',110.00,40),('Alexandre Ximenes','xyymenes@gmail.com','UFC',186.00,40),('Alexandre Ximenes','xyymenes@gmail.com','Super Mario',49.00,41),('Alexandre Ximenes','xyymenes@gmail.com','Asphalt 7',89.00,42),('Alexandre Ximenes','xyymenes@gmail.com','Call of dutty',110.00,42),('Dayane Correa de Barros ','daay.ximenes@gmail.com','Super Mario',49.00,43),('Dayane Correa de Barros ','daay.ximenes@gmail.com','Murdered',2016.00,43),('Dayane Correa de Barros ','daay.ximenes@gmail.com','Street Fight',49.00,43);
/*!40000 ALTER TABLE `dados_site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_pedido`
--

DROP TABLE IF EXISTS `item_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_pedido` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `jogo_codigo` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `pedido_codigo` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_pedido`
--

LOCK TABLES `item_pedido` WRITE;
/*!40000 ALTER TABLE `item_pedido` DISABLE KEYS */;
INSERT INTO `item_pedido` VALUES (1,21,1,215.00,20),(2,12,1,99.00,20),(3,1,1,150.00,21),(4,14,1,49.00,21),(5,1,1,150.00,22),(6,14,1,49.00,22),(7,12,1,99.00,22),(8,12,1,99.00,23),(9,12,1,99.00,24),(10,12,1,99.00,25),(11,20,1,199.00,25),(12,28,1,100.00,26),(13,1,1,150.00,27),(14,12,1,99.00,27),(15,11,1,110.00,27),(16,12,1,99.00,28),(17,27,1,200.00,30),(18,27,1,200.00,31),(19,16,1,186.00,31),(20,14,1,49.00,32),(21,18,1,89.00,34),(22,11,1,110.00,36),(23,18,1,89.00,37),(24,17,1,112.00,37),(25,12,1,99.00,38),(26,12,1,99.00,38),(27,24,1,2015.00,39),(28,25,1,2016.00,39),(29,11,1,110.00,40),(30,16,1,186.00,40),(31,14,1,49.00,41),(32,18,1,89.00,42),(33,11,1,110.00,42),(34,14,1,49.00,43),(35,25,1,2016.00,43),(36,15,1,49.00,43),(37,31,1,159.00,44),(38,25,1,2016.00,45),(39,19,1,185.00,45),(40,33,1,99.00,46),(41,19,1,185.00,47),(42,18,1,89.00,48),(43,14,1,49.00,49),(44,23,1,220.00,50),(45,11,1,110.00,51),(46,25,1,2016.00,52),(47,24,1,2015.00,53),(48,33,1,99.00,54),(49,26,1,200.00,55),(50,25,1,2016.00,56),(51,12,1,99.00,57),(52,18,1,89.00,57),(53,18,1,89.00,58),(54,32,1,120.00,59);
/*!40000 ALTER TABLE `item_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jogo`
--

DROP TABLE IF EXISTS `jogo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jogo` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(300) DEFAULT NULL,
  `empresa` varchar(300) DEFAULT NULL,
  `ano` year(4) DEFAULT NULL,
  `modalidade` varchar(300) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `detalhes` text,
  `imagem` varchar(100) DEFAULT 'img/nao-disponivel.jpg',
  PRIMARY KEY (`codigo`),
  KEY `nome` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jogo`
--

LOCK TABLES `jogo` WRITE;
/*!40000 ALTER TABLE `jogo` DISABLE KEYS */;
INSERT INTO `jogo` VALUES (11,'Call of dutty','Activision',2008,'Guerra',110.00,'Call of dutty alterado																																																																																																																																																								','img/capa-callofduty-infinite.jpg'),(12,'Conduit','sega',2001,'Acao',99.00,'Conduit 1							','img/capa-conduit.jpg'),(13,'Mad Max','Activision',2013,'Acao',186.00,'Maqd Max 1							','img/capa-madmax.jpg'),(14,'Super Mario','Nintendo',1995,'Comedia',49.00,'Super Mario 							','img/capa-mario.jpg'),(15,'Street Fight','Capcom',1998,'Aventura',49.00,'Street fight, briga de rua																					','img/capa-street.jpg'),(16,'UFC','EA',2016,'Acao',186.00,'UCF 3							','img/capa-ufc3.jpg'),(17,'Battlefield ','EA',2006,'Guerra',112.00,'Battlefield 2							','img/battlefild.jpg'),(18,'Asphalt 7','Activision',2014,'Acao',89.00,'Alphalt 7 							','img/capa-asphalt7.png'),(19,'Fifa 2015','EA',2015,'Acao',185.00,'Fifa 2015							','img/capa-fifa2015.jpg'),(20,'Fifa 2016','EA',2016,'Acao',199.00,'Fifa 2016							','img/capa-fifa2016.jpg'),(21,'Fifa 2017','EA',2017,'Acao',215.00,'Fifa 2017							','img/capa-fifa2017.jpg'),(22,'Final Fantasy','Squarq Cnic',2014,'Acao',191.00,'Final Fantasy							','img/capa-finalfantasy.jpg'),(23,'God of war','Capcom',2015,'Acao',220.00,'God of war the saga							','img/capa-god-of-war-saga.jpg'),(24,'Minecraft','Minecraft',2015,'Acao',2015.00,'Minecraft							','img/capa-minecraft.png'),(25,'Murdered','Squarq Cnic',2016,'Aventura',2016.00,'Fabricante n\'ao esta mais no mercado																		','img/capa-murdered.jpg'),(26,'Need for Speed','EA',2014,'Acao',200.00,'Need for speed							','img/capa-needforspeed.jpg'),(27,'Pes 2017','EA',2017,'Acao',200.00,'Pes 2017 futebol							','img/capa-pes2017.jpg'),(28,'God of war 2','Squarq Cnic',2008,'Aventura',100.00,'God of war 2																											','img/capa-god-of-war-saga.jpg'),(29,'Medhal of Honor','EA',2005,'Guerra',120.00,'Medal of Honor Ã© um nome de uma sÃ©rie de jogos eletrÃ´nicos idealizados pelo realizador Steven Spielberg, do estilo \"first-person shooter\", cuja aÃ§Ã£o ocorre no perÃ­odo da Segunda Guerra Mundial.																					','img/jogo-medal-of-honor-frontline.jpg'),(31,'Tron','Desconhecido ',2014,'Aventura',159.00,'Tron 1							','img/capa-tron.jpg'),(32,'Assassin creed','Desconhecido ',2014,'Aventura',120.00,'Assassin creed														','img/capa-assassincreed.jpg'),(33,'Need for Speed','EA',2006,'Aventura',99.00,'Corrida 														','img/semimagem.jpg');
/*!40000 ALTER TABLE `jogo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_codigo` int(11) NOT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (1,3,15.50),(2,3,2450.00),(3,3,3042.00),(4,3,3241.00),(5,3,3290.00),(6,3,3290.00),(7,3,49.00),(8,3,235.00),(9,3,235.00),(10,3,645.00),(11,3,186.00),(12,3,401.00),(13,3,500.00),(14,3,620.00),(15,3,620.00),(16,3,314.00),(17,3,314.00),(18,3,314.00),(19,3,314.00),(20,3,314.00),(21,4,199.00),(22,4,298.00),(23,4,99.00),(24,4,99.00),(25,4,298.00),(26,4,100.00),(27,3,359.00),(28,3,99.00),(29,3,99.00),(30,3,200.00),(31,3,386.00),(32,3,49.00),(33,3,49.00),(34,3,89.00),(35,3,89.00),(36,4,110.00),(37,4,201.00),(38,4,198.00),(39,4,4031.00),(40,3,296.00),(41,3,49.00),(42,3,199.00),(43,4,2114.00),(44,3,159.00),(45,3,2201.00),(46,3,99.00),(47,3,185.00),(48,3,89.00),(49,3,49.00),(50,3,220.00),(51,3,110.00),(52,3,2016.00),(53,3,2015.00),(54,3,99.00),(55,3,200.00),(56,3,2016.00),(57,3,188.00),(58,3,89.00),(59,3,120.00);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-23 23:18:10
