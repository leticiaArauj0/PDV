CREATE DATABASE pdv;

USE pdv;

CREATE TABLE produtos (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	codigo decimal(5) NOT NULL,
    nome varchar(50) NOT NULL,
    valor decimal(10,2) NOT NULL,
    quantidade INT NOT NULL
);

CREATE TABLE vendidos (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	codigo decimal(5) NOT NULL,
    nome varchar(50) NOT NULL,
    valor decimal(10,2) NOT NULL,
    qtd_venda INT NOT NULL
);

DELETE FROM vendidos;
