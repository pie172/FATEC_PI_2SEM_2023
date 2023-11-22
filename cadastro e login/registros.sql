CREATE DATABASE Registros;
USE Registros;

CREATE TABLE Usuarios 
( 
 ID INT PRIMARY KEY AUTO_INCREMENT,
 nome VARCHAR(255) NOT NULL,  
 e-mail VARCHAR(255) NOT NULL,  
 senha VARCHAR(255) NOT NULL,  
); 

CREATE TABLE Transtornos 
( 
ID_transtorno INT PRIMARY KEY AUTO_INCREMENT,
nome_transtorno VARCHAR(255) NOT NULL,  
); 

CREATE TABLE Sofre 
( 
 ID INT PRIMARY KEY,
 ID_transtorno INT PRIMARY KEY, 
); 

ALTER TABLE Sofre ADD FOREIGN KEY(ID) REFERENCES Usuarios (ID)
ALTER TABLE Sofre ADD FOREIGN KEY(ID_transtorno) REFERENCES Transtornos (ID_transtorno)