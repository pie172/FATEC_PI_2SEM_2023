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


DELIMITER $
CREATE PROCEDURE VerificarEmailUsuario(IN p_email VARCHAR(255), OUT p_email_em_uso INT)
BEGIN
    DECLARE email_usuario VARCHAR(255);
    
    SELECT email INTO email_usuario FROM usuarios WHERE email = p_email;
    
    IF email_usuario IS NOT NULL THEN
        SET p_email_em_uso := 1; 
    ELSE
        SET p_email_em_uso := 0; 
    END IF;
END $
DELIMITER ;

DELIMITER $

CREATE FUNCTION contarTranstornosUsuario(userId INT UNSIGNED) RETURNS INT
BEGIN
    DECLARE numTranstornos INT;
    
    SELECT COUNT(*) INTO numTranstornos
    FROM sofre
    WHERE ID = userId;
    
    RETURN numTranstornos;
END $

DELIMITER ;