-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: swedge
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `sw_att`
--

DROP TABLE IF EXISTS `sw_att`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sw_att` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dia` int(11) NOT NULL DEFAULT '0',
  `atacante` varchar(50) NOT NULL DEFAULT '',
  `defensor` varchar(50) NOT NULL DEFAULT '',
  `combate` text,
  `ganador` varchar(50) NOT NULL DEFAULT '',
  `ganancias` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sw_att`
--

LOCK TABLES `sw_att` WRITE;
/*!40000 ALTER TABLE `sw_att` DISABLE KEYS */;
/*!40000 ALTER TABLE `sw_att` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sw_board_clan`
--

DROP TABLE IF EXISTS `sw_board_clan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sw_board_clan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clan` varchar(50) NOT NULL DEFAULT '',
  `poster` varchar(50) NOT NULL DEFAULT '',
  `dia` int(11) NOT NULL DEFAULT '0',
  `mess` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sw_board_clan`
--

LOCK TABLES `sw_board_clan` WRITE;
/*!40000 ALTER TABLE `sw_board_clan` DISABLE KEYS */;
/*!40000 ALTER TABLE `sw_board_clan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sw_board_noticias`
--

DROP TABLE IF EXISTS `sw_board_noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sw_board_noticias` (
  `id` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `poster` varchar(50) NOT NULL DEFAULT '',
  `post` text NOT NULL,
  `tipo` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sw_board_noticias`
--

LOCK TABLES `sw_board_noticias` WRITE;
/*!40000 ALTER TABLE `sw_board_noticias` DISABLE KEYS */;
INSERT INTO `sw_board_noticias` VALUES ('2017-01-19 15:30:00','','Saludos, desarroll&#xE9; este juego de navegador a los 16 a&#xF1;os y estuvo on-line desde 2004 hasta 2006. Siempre lo he considerado mi primer proyecto serio y a pesar de que empec&#xE9; muchos otros, no llegu&#xE9; a terminar ninguno del que me sintiera tan orgulloso como de &#xE9;ste.\n<br/><br/>\nA pesar de que a nivel de c&#xF3;digo da verg&#xFC;enza, me ayud&#xF3; a aprender los conceptos b&#xE1;sicos y a adquirir cierta soltura y confianza desarrollando. Y sobretodo aprend&#xED; a gestionar una comunidad de jugadores, no siempre honesta, y a balancear y ajustar las reglas del juego para evitar descompensaciones. Me llevo, de aquellos tiempos, de los mejores recuerdos de mi vida y amigos que, aunque no haya conservado el contacto con ellos, recuerdo y recordar&#xE9; siempre.\n<br/><br/>\nSubo este c&#xF3;digo llevado por la nostalgia, dudo que haya nadie nunca pueda utilizar una s&#xF3;la l&#xED;nea de c&#xF3;digo de este repo (y tampoco lo recomiendo), pero quiero tenerlo en alg&#xFA;n sito donde pueda verse y apreciarse por lo que es.\n<br/><br/>\nEl c&#xF3;digo del primer commit corresponde a la versi&#xF3;n 2.5. S&#xE9; que existieron versiones posteriores, pero se han perdido y tengo los inicios de la versi&#xF3;n 3, que tal vez tambi&#xE9;n suba en una rama hu&#xE9;rfana. Intentar&#xE9; hacer los cambios justos para hacer el juego jugable, eliminar&#xE9; los mails de confirmaci&#xF3;n y probablemente lo suba a un servidor para tenerlo a mano, dej&#xE1;ndolo en modo visita.\n<br/><br/>\nEspero que si alguno de los muchos que jugaron en su d&#xED;a encuentran este c&#xF3;digo, este sea capaz de sacarles al menos una sonrisa nost&#xE1;lgica. Hasta siempre :)\n<br/><br/>\nZeros','Noticia');
/*!40000 ALTER TABLE `sw_board_noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sw_board_parlamento`
--

DROP TABLE IF EXISTS `sw_board_parlamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sw_board_parlamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poster` varchar(50) NOT NULL DEFAULT '',
  `dia` int(11) NOT NULL DEFAULT '0',
  `ciudad` varchar(50) NOT NULL DEFAULT '',
  `post` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sw_board_parlamento`
--

LOCK TABLES `sw_board_parlamento` WRITE;
/*!40000 ALTER TABLE `sw_board_parlamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `sw_board_parlamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sw_city`
--

DROP TABLE IF EXISTS `sw_city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sw_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `clan` text,
  `rey` varchar(50) NOT NULL DEFAULT '',
  `cura` set('S','N') NOT NULL DEFAULT 'N',
  `ayuda` set('S','N') NOT NULL DEFAULT 'N',
  `ley` set('S','N') NOT NULL DEFAULT 'N',
  `costec` int(11) NOT NULL DEFAULT '10',
  `puestos` int(11) NOT NULL DEFAULT '0',
  `armeria` set('S','N') NOT NULL DEFAULT 'N',
  `mina` set('S','N') NOT NULL DEFAULT 'N',
  `fabrica` set('S','N') NOT NULL DEFAULT 'N',
  `atacada` set('S','N') NOT NULL DEFAULT 'N',
  `burdel` set('S','N') NOT NULL DEFAULT 'N',
  `impuesto` decimal(2,0) NOT NULL DEFAULT '2',
  `planeta` varchar(50) NOT NULL DEFAULT 'Coruscant',
  `bar` set('S','N') NOT NULL DEFAULT 'N',
  `copas` int(11) NOT NULL DEFAULT '10',
  `leypre` int(11) NOT NULL DEFAULT '10',
  `mess` text NOT NULL,
  `sam` int(11) NOT NULL DEFAULT '0',
  `blaster` int(11) NOT NULL DEFAULT '0',
  `damascus` int(11) NOT NULL DEFAULT '0',
  `generador` int(11) NOT NULL DEFAULT '1',
  `central` int(11) NOT NULL DEFAULT '1',
  `habitable` tinyint(1) NOT NULL DEFAULT '1',
  UNIQUE KEY `nombre` (`nombre`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sw_city`
--

LOCK TABLES `sw_city` WRITE;
/*!40000 ALTER TABLE `sw_city` DISABLE KEYS */;
INSERT INTO `sw_city` VALUES (1,'Imperial City','','Zeros Mettallium','S','S','N',10,0,'S','S','S','N','S',0,'Coruscant','S',10,0,'Bienvenidos a la ciudad Imperial.',0,0,0,1,1,1);
/*!40000 ALTER TABLE `sw_city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sw_clan`
--

DROP TABLE IF EXISTS `sw_clan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sw_clan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `lider` varchar(50) NOT NULL DEFAULT '',
  `hermandad` set('Jedi','Sith') NOT NULL DEFAULT '',
  `puntos` int(11) NOT NULL DEFAULT '0',
  `fondos` int(15) NOT NULL DEFAULT '200000',
  `mineral` int(15) NOT NULL DEFAULT '0',
  `potencia` int(15) NOT NULL DEFAULT '0',
  `pago` int(11) NOT NULL DEFAULT '500',
  `atacado` set('S','N') NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sw_clan`
--

LOCK TABLES `sw_clan` WRITE;
/*!40000 ALTER TABLE `sw_clan` DISABLE KEYS */;
/*!40000 ALTER TABLE `sw_clan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sw_compa`
--

DROP TABLE IF EXISTS `sw_compa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sw_compa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL DEFAULT '',
  `tipo` varchar(250) NOT NULL DEFAULT '',
  `vigor` int(11) NOT NULL DEFAULT '0',
  `destreza` int(11) NOT NULL DEFAULT '0',
  `constitucion` int(11) NOT NULL DEFAULT '0',
  `inteligencia` int(11) NOT NULL DEFAULT '0',
  `dueno` varchar(250) NOT NULL DEFAULT '',
  `cuidado` int(11) NOT NULL DEFAULT '0',
  `venta` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sw_compa`
--

LOCK TABLES `sw_compa` WRITE;
/*!40000 ALTER TABLE `sw_compa` DISABLE KEYS */;
/*!40000 ALTER TABLE `sw_compa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sw_control`
--

DROP TABLE IF EXISTS `sw_control`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sw_control` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` varchar(10) NOT NULL DEFAULT '0',
  `log` text NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `log` (`log`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sw_control`
--

LOCK TABLES `sw_control` WRITE;
/*!40000 ALTER TABLE `sw_control` DISABLE KEYS */;
/*!40000 ALTER TABLE `sw_control` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sw_control_muerte`
--

DROP TABLE IF EXISTS `sw_control_muerte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sw_control_muerte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `mail` varchar(50) NOT NULL DEFAULT '',
  `dia` varchar(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sw_control_muerte`
--

LOCK TABLES `sw_control_muerte` WRITE;
/*!40000 ALTER TABLE `sw_control_muerte` DISABLE KEYS */;
/*!40000 ALTER TABLE `sw_control_muerte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sw_control_transferencias`
--

DROP TABLE IF EXISTS `sw_control_transferencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sw_control_transferencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dia` varchar(11) NOT NULL DEFAULT '0',
  `origen` varchar(50) NOT NULL DEFAULT '',
  `destino` varchar(50) NOT NULL DEFAULT '',
  `cantidad` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sw_control_transferencias`
--

LOCK TABLES `sw_control_transferencias` WRITE;
/*!40000 ALTER TABLE `sw_control_transferencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `sw_control_transferencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sw_diplomacia`
--

DROP TABLE IF EXISTS `sw_diplomacia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sw_diplomacia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origen` varchar(50) NOT NULL DEFAULT '',
  `destino` varchar(50) NOT NULL DEFAULT '',
  `estado` set('Aliado','Enemigo') NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sw_diplomacia`
--

LOCK TABLES `sw_diplomacia` WRITE;
/*!40000 ALTER TABLE `sw_diplomacia` DISABLE KEYS */;
/*!40000 ALTER TABLE `sw_diplomacia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sw_evoto`
--

DROP TABLE IF EXISTS `sw_evoto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sw_evoto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref` int(11) NOT NULL DEFAULT '0',
  `tipo` int(11) NOT NULL DEFAULT '0',
  `mess` varchar(255) NOT NULL DEFAULT '',
  `num` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sw_evoto`
--

LOCK TABLES `sw_evoto` WRITE;
/*!40000 ALTER TABLE `sw_evoto` DISABLE KEYS */;
/*!40000 ALTER TABLE `sw_evoto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sw_info`
--

DROP TABLE IF EXISTS `sw_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sw_info` (
  `id` varchar(255) NOT NULL DEFAULT '',
  `val` varchar(255) NOT NULL DEFAULT '',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sw_info`
--

LOCK TABLES `sw_info` WRITE;
/*!40000 ALTER TABLE `sw_info` DISABLE KEYS */;
INSERT INTO `sw_info` VALUES ('dia','1'),('par','Legacy'),('ver','2.7');
/*!40000 ALTER TABLE `sw_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sw_inventario`
--

DROP TABLE IF EXISTS `sw_inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sw_inventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jugador` varchar(50) NOT NULL DEFAULT '',
  `objeto` varchar(50) NOT NULL DEFAULT '',
  `tipo` varchar(250) NOT NULL DEFAULT '',
  `equipable` set('S','N') NOT NULL DEFAULT 'N',
  `equipado` set('S','N') NOT NULL DEFAULT 'N',
  `lugar` varchar(20) DEFAULT NULL,
  `mod` varchar(250) NOT NULL DEFAULT '',
  `quant` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sw_inventario`
--

LOCK TABLES `sw_inventario` WRITE;
/*!40000 ALTER TABLE `sw_inventario` DISABLE KEYS */;
/*!40000 ALTER TABLE `sw_inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sw_log`
--

DROP TABLE IF EXISTS `sw_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sw_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL DEFAULT '',
  `log` text NOT NULL,
  `tipo` int(11) DEFAULT '1',
  `dia` int(11) NOT NULL DEFAULT '0',
  `ref` text NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `log` (`log`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sw_log`
--

LOCK TABLES `sw_log` WRITE;
/*!40000 ALTER TABLE `sw_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `sw_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sw_mess`
--

DROP TABLE IF EXISTS `sw_mess`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sw_mess` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emisor` varchar(50) NOT NULL DEFAULT '',
  `receptor` varchar(50) NOT NULL DEFAULT '',
  `mess` text NOT NULL,
  `fecha` int(11) NOT NULL DEFAULT '1',
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sw_mess`
--

LOCK TABLES `sw_mess` WRITE;
/*!40000 ALTER TABLE `sw_mess` DISABLE KEYS */;
/*!40000 ALTER TABLE `sw_mess` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sw_plan`
--

DROP TABLE IF EXISTS `sw_plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sw_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL DEFAULT '',
  `x` int(11) NOT NULL DEFAULT '0',
  `y` int(11) NOT NULL DEFAULT '0',
  `mineral` int(11) NOT NULL DEFAULT '1000000',
  `habitable` tinyint(1) NOT NULL DEFAULT '1',
  UNIQUE KEY `id` (`id`,`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sw_plan`
--

LOCK TABLES `sw_plan` WRITE;
/*!40000 ALTER TABLE `sw_plan` DISABLE KEYS */;
INSERT INTO `sw_plan` VALUES (1,'Coruscant',0,0,100000,1),(2,'Tatooine',4,4,100000,1),(3,'Alderaan',1,1,100000,1),(4,'Corellia',1,3,100000,1),(5,'Yavin',3,-4,100000,1);
/*!40000 ALTER TABLE `sw_plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sw_staff`
--

DROP TABLE IF EXISTS `sw_staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sw_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `web` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `mes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sw_staff`
--

LOCK TABLES `sw_staff` WRITE;
/*!40000 ALTER TABLE `sw_staff` DISABLE KEYS */;
/*!40000 ALTER TABLE `sw_staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sw_users`
--

DROP TABLE IF EXISTS `sw_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sw_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `avatar_path` varchar(255) NOT NULL DEFAULT 'avatar/blank.gif',
  `origen` text NOT NULL,
  `clan` text,
  `creditos` int(11) NOT NULL DEFAULT '10000',
  `crecived` int(6) NOT NULL DEFAULT '0',
  `raza` set('Humano','Twilek','Caamasi','Bothan','Duro','Arkaniano','Falleen','Zabrak','Cathar','Keldor') DEFAULT NULL,
  `vigor` int(11) NOT NULL DEFAULT '0',
  `poder` int(11) NOT NULL DEFAULT '10',
  `destreza` int(11) NOT NULL DEFAULT '0',
  `inteligencia` int(11) NOT NULL DEFAULT '0',
  `constitucion` int(11) NOT NULL DEFAULT '0',
  `vig` int(11) NOT NULL DEFAULT '1',
  `con` int(11) NOT NULL DEFAULT '1',
  `des` int(11) NOT NULL DEFAULT '1',
  `inte` int(11) NOT NULL DEFAULT '1',
  `pod` int(11) NOT NULL DEFAULT '1',
  `vigb` int(11) NOT NULL DEFAULT '0',
  `conb` int(11) NOT NULL DEFAULT '0',
  `desb` int(11) NOT NULL DEFAULT '0',
  `intb` int(11) NOT NULL DEFAULT '0',
  `podb` int(11) NOT NULL DEFAULT '10',
  `lado` float NOT NULL DEFAULT '0',
  `nivel` varchar(20) NOT NULL DEFAULT 'Usuario de la Fuerza',
  `turnos` int(11) NOT NULL DEFAULT '200',
  `nv_sable` int(11) NOT NULL DEFAULT '0',
  `color_sable` set('amarillo','morado','rojo','naranja','azul','verde') DEFAULT NULL,
  `puntos` int(11) NOT NULL DEFAULT '1',
  `next` int(11) NOT NULL DEFAULT '100',
  `nv` int(11) NOT NULL DEFAULT '1',
  `pc` int(3) NOT NULL DEFAULT '0',
  `cl_trainer` int(3) NOT NULL DEFAULT '0',
  `cl_doctor` int(11) NOT NULL DEFAULT '0',
  `cl_artesano` int(11) NOT NULL DEFAULT '0',
  `cl_picaro` int(3) NOT NULL DEFAULT '0',
  `cl_guerrero` int(3) NOT NULL DEFAULT '0',
  `cl_tecnico` int(3) NOT NULL DEFAULT '0',
  `merito` int(11) NOT NULL DEFAULT '0',
  `titulo` text,
  `sexo` set('M','H') NOT NULL DEFAULT 'H',
  `mail` varchar(30) NOT NULL DEFAULT '',
  `ciudad` varchar(50) NOT NULL DEFAULT 'Coruscant',
  `planeta` varchar(50) NOT NULL DEFAULT 'Coruscant',
  `mess` set('S','N') NOT NULL DEFAULT 'N',
  `prefix` text,
  `hora` int(11) NOT NULL DEFAULT '0',
  `dia` int(11) NOT NULL DEFAULT '0',
  `hp` int(11) NOT NULL DEFAULT '100',
  `maxhp` int(11) NOT NULL DEFAULT '100',
  `pk` int(11) NOT NULL DEFAULT '0',
  `lpk` int(11) NOT NULL DEFAULT '0',
  `extrae` int(11) NOT NULL DEFAULT '0',
  `at` int(11) DEFAULT NULL,
  `cmess` set('S','N') NOT NULL DEFAULT 'N',
  `mmess` set('S','N') NOT NULL DEFAULT 'N',
  `attmess` set('S','N') NOT NULL DEFAULT 'N',
  `reg` set('S','N') NOT NULL DEFAULT 'N',
  `comf` int(11) NOT NULL DEFAULT '0',
  `cvoto` varchar(50) DEFAULT NULL,
  `evoto` varchar(20) DEFAULT NULL,
  `estilo_sable` set('+','11','2') NOT NULL DEFAULT '+',
  `fecha` int(14) DEFAULT NULL,
  `estres` int(6) NOT NULL DEFAULT '0',
  `admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sw_users`
--

LOCK TABLES `sw_users` WRITE;
/*!40000 ALTER TABLE `sw_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `sw_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sw_vehiculos`
--

DROP TABLE IF EXISTS `sw_vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sw_vehiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `tipo` varchar(50) NOT NULL DEFAULT '',
  `ciudad` varchar(50) DEFAULT NULL,
  `planeta` varchar(50) DEFAULT NULL,
  `tprop` set('Clan','Jugador','Hipotecado') NOT NULL DEFAULT '',
  `prop` varchar(50) NOT NULL DEFAULT '',
  `venta` set('S','N') NOT NULL DEFAULT '',
  `precio` int(11) NOT NULL DEFAULT '0',
  `espacio` set('S','N') NOT NULL DEFAULT 'N',
  `uso` set('S','N') NOT NULL DEFAULT 'N',
  `arma` varchar(255) DEFAULT NULL,
  `mineral` int(11) NOT NULL DEFAULT '0',
  `potencia` int(11) NOT NULL DEFAULT '0',
  `fabricante` varchar(250) NOT NULL DEFAULT '',
  `dia` int(11) NOT NULL DEFAULT '0',
  `dam` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sw_vehiculos`
--

LOCK TABLES `sw_vehiculos` WRITE;
/*!40000 ALTER TABLE `sw_vehiculos` DISABLE KEYS */;
/*!40000 ALTER TABLE `sw_vehiculos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sw_viaje`
--

DROP TABLE IF EXISTS `sw_viaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sw_viaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origen` varchar(50) NOT NULL DEFAULT '',
  `destino` varchar(50) NOT NULL DEFAULT '',
  `vehiculo` varchar(50) NOT NULL DEFAULT '',
  `clan` varchar(50) NOT NULL DEFAULT '',
  `precio` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sw_viaje`
--

LOCK TABLES `sw_viaje` WRITE;
/*!40000 ALTER TABLE `sw_viaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `sw_viaje` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-19 17:55:31
