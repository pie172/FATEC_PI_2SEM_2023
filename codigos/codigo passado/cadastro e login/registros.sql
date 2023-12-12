CREATE DATABASE Registros;
USE Registros;

CREATE TABLE Usuarios 
( 
 ID INT PRIMARY KEY AUTO_INCREMENT,
 nome VARCHAR(50) NOT NULL,  
 email VARCHAR(50) NOT NULL,  
 senha VARCHAR(50) NOT NULL 
); 

CREATE TABLE Transtornos 
( 
ID_transtorno INT PRIMARY KEY AUTO_INCREMENT,
nome_transtorno VARCHAR(50) NOT NULL
); 

CREATE TABLE Sofre (
    ID INT,
    ID_transtorno INT,
    PRIMARY KEY (ID, ID_transtorno),
    FOREIGN KEY (ID) REFERENCES Usuarios (ID),
    FOREIGN KEY (ID_transtorno) REFERENCES Transtornos (ID_transtorno)
);