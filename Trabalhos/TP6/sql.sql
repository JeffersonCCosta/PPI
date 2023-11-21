create database meuBanco;

use meuBanco;

CREATE TABLE usuarios (
    cpf VARCHAR(11) NOT NULL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha CHAR(32) NOT NULL
);
