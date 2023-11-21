CREATE DATABASE nome_do_banco_de_dados;

USE nome_do_banco_de_dados;

CREATE TABLE moeda (
  idmoeda INT DEFAULT NULL,
  nome VARCHAR(45) DEFAULT NULL,
  simbolo CHAR(3) DEFAULT NULL,
);

CREATE TABLE cotacao (
  idcotacao INT DEFAULT NULL,
  moeda_idmoeda1 INT DEFAULT NULL,
  moeda_idmoeda2 INT DEFAULT NULL,
  valor DECIMAL(10,2) DEFAULT NULL,
);

INSERT INTO moeda (idmoeda, nome, simbolo) VALUES 
(1, 'Real', 'R$'),
(2, 'Dolar Americano', 'US$')

INSERT INTO cotacao(idcotacao,moeda_idmoeda1,moeda_idmoeda2,valor) VALUES
(1,1,2,0.2),
(2,2,1,4.91);


