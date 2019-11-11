CREATE DATABASE php_crud;

USE php_crud;

CREATE TABLE IF NOT EXISTS `Dice` (
	Id INT PRIMARY KEY AUTO_INCREMENT,
	Nome VARCHAR(60) NOT NULL,
	Duracao INT NOT NULL,
	Integridade INT NOT NULL,
	CGerencia INT NOT NULL,
    CFuncionarios INT NOT NULL,
    Esforco INT NOT NULL,
    Score INT NOT NULL
);
