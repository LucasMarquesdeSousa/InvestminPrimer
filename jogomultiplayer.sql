DROP DATABASE jogomultiplayer;
CREATE DATABASE IF NOT EXISTS jogomultiplayer;
use jogomultiplayer;
#TABELA USUÁRIO
CREATE TABLE usuario(
	nome varchar(100),
    senha varchar(100),
    
    PRIMARY KEY(`nome`)
);

#TABELA SALA
CREATE TABLE sala(
	id_salas varchar(32),
    nome varchar(32),
    criador varchar(100),
    
    PRIMARY KEY(`id_salas`),
    CONSTRAINT `fk_sala_usuario_idx1` FOREIGN KEY(`criador`) REFERENCES usuario(`nome`) ON DELETE CASCADE ON UPDATE CASCADE
);

#TABELA JOGADAS
CREATE TABLE jogadas(
	id_jogada varchar(32),
    lugar_jogada varchar(2),
    id_sala varchar(32),
    
    PRIMARY KEY (`id_jogada`),
    CONSTRAINT `fk_jogadas_sala_idx1` FOREIGN KEY(`id_jogada`) REFERENCES sala(`id_salas`) ON DELETE CASCADE ON UPDATE CASCADE
);