/*
SQLyog Enterprise - MySQL GUI v5.2 Beta 5
Host - 5.0.15-nt : Database - sw_edges
*********************************************************************
Server version : 5.0.15-nt
*/


SET NAMES utf8;

SET SQL_MODE='';
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

/*Table structure for table `chars` */

chars   CREATE TABLE `chars` (                                                                                     
	`id` int(11) NOT NULL auto_increment,                                                                    
	`nombre` varchar(50) collate latin1_general_ci NOT NULL,                                                 
	`avatar` varchar(255) collate latin1_general_ci NOT NULL default '../images/avatar/blank.gif',           
	`sexo` varchar(1) collate latin1_general_ci NOT NULL default 'M',                                        
	`slogan` varchar(255) collate latin1_general_ci NOT NULL default 'Que la fuerza gu&iacute;e mi sable!',  
	`owner` int(11) NOT NULL,                                                                                
	`vigor` int(3) unsigned NOT NULL default '1',                                                            
	`constitucion` int(3) unsigned NOT NULL default '1',                                                     
	`destreza` int(3) unsigned NOT NULL default '1',                                                         
	`agilidad` int(3) unsigned NOT NULL default '1',                                                         
	`inteligencia` int(3) unsigned NOT NULL default '1',                                                     
	`poder` int(3) unsigned NOT NULL default '1',                                                            
	`raza` int(2) NOT NULL default '0',                                                                      
	`planeta` int(11) default '1',                                                                           
	`ciudad` int(11) NOT NULL default '0',                                                                   
	`px` int(6) unsigned NOT NULL default '0',                                                               
	`pxnext` int(6) unsigned NOT NULL default '100',                                                         
	`entrenamientos` int(6) default '1',                                                                     
	`clases` char(15) collate latin1_general_ci default '0,0,0,0',                                           
	`nivel` int(11) NOT NULL default '1',                                                                    
	`rango` int(11) unsigned default '1',                                                                    
	`clan` int(11) default NULL,                                                                             
	`turnos` int(4) unsigned NOT NULL default '100',                                                         
	`merito` int(11) NOT NULL default '0',                                                                   
	`gloria` int(11) NOT NULL default '0',                                                                   
	`creditos` int(11) unsigned NOT NULL default '10000',                                                    
	`estres` int(3) unsigned NOT NULL default '0',                                                           
	`pv` int(5) unsigned NOT NULL default '25',                                                              
	`pvmax` int(5) unsigned NOT NULL default '25',                                                           
	`newmsg` int(1) NOT NULL default '0',                                                                    
	`alineamiento` int(4) default '0',                                                                       
	`color` int(1) default '0',                                                                              
	PRIMARY KEY  (`id`)                                                                                      
	) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci                          


/*Table structure for table `ciudades` */

CREATE TABLE `ciudades` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(50) collate latin1_general_ci NOT NULL default '',
  `clan` int(11) default NULL,
  `planeta` int(11) default NULL,
  `nacimiento` int(1) default '0',
  `impuestos` int(2) default '2',
  `influencia` int(7) default '10000',
  `crimen` int(4) default '1000',
  `hospital` tinyint(1) default '1',
  UNIQUE KEY `nombre` (`nombre`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Table structure for table `clanes` */

CREATE TABLE `clanes` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` char(50) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Table structure for table `info` */

CREATE TABLE `info` (
  `id` varchar(255) NOT NULL default '',
  `val` varchar(255) NOT NULL default '',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


/*RELLENAR TABLA INFO*/
insert  into `info`(`id`,`val`) values ('nombre','Server 1');
insert  into `info`(`id`,`val`) values ('version','3.1');
insert  into `info`(`id`,`val`) values ('partida','DEVELOP');
insert  into `info`(`id`,`val`) values ('estado','2');
insert  into `info`(`id`,`val`) values ('minx','-10');
insert  into `info`(`id`,`val`) values ('maxx','10');
insert  into `info`(`id`,`val`) values ('maxy','10');
insert  into `info`(`id`,`val`) values ('miny','-10');
insert  into `info`(`id`,`val`) values ('energy','5');
insert  into `info`(`id`,`val`) values ('bloqueo','0');
insert  into `info`(`id`,`val`) values ('precioHospital','15');


/*Table structure for table `mensajes` */

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL auto_increment,
  `emisor` int(11) NOT NULL,
  `receptor` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `asunto` varchar(20) NOT NULL,
  `nuevo` int(1) NOT NULL default '1',
  `fecha` varchar(11) NOT NULL default '0000-00-00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=0;

/*Table structure for table `noticias` */

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL auto_increment,
  `titulo` varchar(50) NOT NULL default '',
  `autor` varchar(50) NOT NULL default '',
  `noticia` text NOT NULL,
  `data` date NOT NULL default '0000-00-00',
  `tipo` tinyint(2) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Table structure for table `planetas` */

CREATE TABLE `planetas` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(20) collate latin1_general_ci NOT NULL default '',
  `x` int(11) NOT NULL default '0',
  `y` int(11) NOT NULL default '0',
  `mineral` int(11) NOT NULL default '1000000',
  `tipo` int(11) default '1',
  UNIQUE KEY `id` (`id`,`nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Table structure for table `rangos` */

CREATE TABLE `rangos` (
  `id` int(11) NOT NULL auto_increment,
  `nombre_jedi` char(50) collate latin1_general_ci default NULL,
  `nombre_sith` char(50) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `rangos` */

insert  into `rangos`(`id`,`nombre_jedi`,`nombre_sith`) values (1,'Usuario','Usuario');
insert  into `rangos`(`id`,`nombre_jedi`,`nombre_sith`) values (2,'Younglin','Iniciado');
insert  into `rangos`(`id`,`nombre_jedi`,`nombre_sith`) values (3,'Padawan','Aprendiz');
insert  into `rangos`(`id`,`nombre_jedi`,`nombre_sith`) values (4,'Caballero','Guerrero');
insert  into `rangos`(`id`,`nombre_jedi`,`nombre_sith`) values (5,'Gran Caballero','Gran Guerrero');
insert  into `rangos`(`id`,`nombre_jedi`,`nombre_sith`) values (6,'Maestro','Lord');
insert  into `rangos`(`id`,`nombre_jedi`,`nombre_sith`) values (7,'Gran Maestro','Gran Lord');


/*Table structure for table `razas` */

CREATE TABLE `razas` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` char(50) collate latin1_general_ci default NULL,
  `vigor` int(11) default NULL,
  `constitucion` int(11) default NULL,
  `destreza` int(11) default NULL,
  `agilidad` int(11) default NULL,
  `inteligencia` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `razas` */

insert  into `razas`(`id`,`nombre`,`vigor`,`constitucion`,`destreza`,`agilidad`,`inteligencia`) values (1,'Humano',0,0,0,0,0);
insert  into `razas`(`id`,`nombre`,`vigor`,`constitucion`,`destreza`,`agilidad`,`inteligencia`) values (2,'Twilek',-1,2,1,0,-1);
insert  into `razas`(`id`,`nombre`,`vigor`,`constitucion`,`destreza`,`agilidad`,`inteligencia`) values (3,'Kel Dor',-1,-3,2,1,1);
insert  into `razas`(`id`,`nombre`,`vigor`,`constitucion`,`destreza`,`agilidad`,`inteligencia`) values (4,'Zabrak',0,0,0,1,-1);
insert  into `razas`(`id`,`nombre`,`vigor`,`constitucion`,`destreza`,`agilidad`,`inteligencia`) values (5,'Cathar',1,1,1,1,-4);
insert  into `razas`(`id`,`nombre`,`vigor`,`constitucion`,`destreza`,`agilidad`,`inteligencia`) values (6,'Bothan',1,-2,1,1,-1);


/*Table structure for table `ref_habilidades` */

CREATE TABLE `ref_habilidades` (
  `id` int(11) NOT NULL auto_increment,
  `referencia` char(10) collate latin1_general_ci NOT NULL,
  `nombre` char(100) collate latin1_general_ci default NULL,
  `tipo` int(2) default '0',
  `lado` int(1) default '0',
  `rango` int(2) default '3',
  `clase` int(1) default '0',
  `descripcion` text collate latin1_general_ci NOT NULL,
  `req` int(11) default NULL,
  `condiciones` text collate latin1_general_ci,
  `efecto` text collate latin1_general_ci,
  PRIMARY KEY  (`id`,`referencia`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Table structure for table `sedes` */

CREATE TABLE `sedes` (
  `id` int(11) NOT NULL auto_increment,
  `ciudad` int(11) default NULL,
  `planeta` int(11) default NULL,
  `clan` int(11) default NULL,
  `influencia` int(11) default NULL,
  `hospital` int(11) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Table structure for table `tipo_planeta` */

CREATE TABLE `tipo_planeta` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` char(50) collate latin1_general_ci default NULL,
  `img` char(255) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `tipo_planeta` */

insert  into `tipo_planeta`(`id`,`nombre`,`img`) values (1,'Planeta Masificado','../images/mapa/planeta5.gif');
insert  into `tipo_planeta`(`id`,`nombre`,`img`) values (2,'Planeta Oceánico','../images/mapa/planeta0.gif');


/*Table structure for table `usuarios` */

usuarios  CREATE TABLE `usuarios` (          
	`id` int(11) NOT NULL auto_increment,
	`nombre` varchar(50) collate latin1_general_ci NOT NULL,
	`mail` varchar(75) collate latin1_general_ci NOT NULL,
	`pass` varchar(45) collate latin1_general_ci NOT NULL,
	`valid` int(5) NOT NULL,
	`mainchar` int(11) NOT NULL default '0',
	PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci



SET SQL_MODE=@OLD_SQL_MODE;