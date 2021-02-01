--Cria banco de dados MySQL
CREATE DATABASE tpotd;

--Define condificação
ALTER DATABASE tpotd CHARSET = UTF8 COLLATE = utf8_general_ci;

--Tabela de fichas de terrapleno(Cada linha corresponde a uma ficha)
CREATE TABLE acesso(
	id INT NOT NULL AUTO_INCREMENT,
    codFicha VARCHAR(30),
    nome VARCHAR(100),
    km VARCHAR(30),
    sentido VARCHAR(20),
    status INT,
    PRIMARY KEY(id)
);

CREATE TABLE ocupacao(
	id INT NOT NULL AUTO_INCREMENT,
    codFicha VARCHAR(30),
    nome VARCHAR(100),
    km VARCHAR(30),
    sentido VARCHAR(20),
    status INT,
    PRIMARY KEY(id)
);

CREATE TABLE fotos_acesso(
	id INT NOT NULL AUTO_INCREMENT,
	codFicha INT NOT NULL,
	nome VARCHAR(50),
    data VARCHAR(12),
    observacao VARCHAR(200),
	PRIMARY KEY(id),
	FOREIGN KEY(codFicha) REFERENCES acesso(id)	
);

CREATE TABLE fotos_ocupacao(
	id INT NOT NULL AUTO_INCREMENT,
	codFicha INT NOT NULL,
	nome VARCHAR(50),
    data VARCHAR(12),
    observacao VARCHAR(200),
	PRIMARY KEY(id),
	FOREIGN KEY(codFicha) REFERENCES ocupacao(id)	
);

--Comando para importar o xls
load data local infile '/var/www/html/tpotd/acesso.csv'
     into table acesso
     fields terminated by ';'
     enclosed by '"'
     lines terminated by '\n'
     ignore 1 rows;

--Comando para importar o xls
load data local infile '/var/www/html/tpotd/ocupacao.csv'
     into table ocupacao
     fields terminated by ';'
     enclosed by '"'
     lines terminated by '\n'
     ignore 1 rows;