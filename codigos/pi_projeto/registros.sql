CREATE DATABASE registros;
USE registros;

CREATE TABLE usuarios 
( 
 ID INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
 nome VARCHAR(50) NOT NULL,  
 email VARCHAR(255) NOT NULL,  
 senha VARCHAR(255) NOT NULL 
); 

CREATE TABLE transtornos 
( 
ID_transtorno INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
nome_transtorno VARCHAR(50) NOT NULL
); 

CREATE TABLE sofre (
    ID INT UNSIGNED,
    ID_transtorno INT UNSIGNED,
    PRIMARY KEY (ID, ID_transtorno),
    FOREIGN KEY (ID) REFERENCES usuarios (ID),
    FOREIGN KEY (ID_transtorno) REFERENCES transtornos (ID_transtorno)
);

INSERT INTO transtornos (nome_transtorno) VALUES ('Estresse');
INSERT INTO transtornos (nome_transtorno) VALUES ('Insonia');
INSERT INTO transtornos (nome_transtorno) VALUES ('Ansiedade');
