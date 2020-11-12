create database hackathon;
use hackathon;

create table `usuario`(
    `nome` varchar(100),
    `email` varchar(100),
    `senha` varchar(32),
    `perfil` int ,
    
    primary key(`email`),
    KEY `fk_usuario_perfil_idx` (`perfil`),
    CONSTRAINT `fk_usuario_perfil` FOREIGN KEY (`perfil`) REFERENCES `perfil` (`cod`) ON DELETE CASCADE ON UPDATE CASCADE,
)ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*dados da tabela usuário*/
LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES ('Lucas', 'marqueslukas66@gmail.com', '12345678', 2);
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

create table perfil(
   `cod` int(3),
   `perfil` varchar(4),
    
    primary key(`cod`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*dados da tabela perfil*/
LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'adm'),(2,'usu');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;