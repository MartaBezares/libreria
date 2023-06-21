CREATE DATABASE libreria;
USE libreria;
CREATE TABLE usuarios (
    id INT(20) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(80),
    mail VARCHAR (150),
    contrasenna VARCHAR(50),
    rol VARCHAR(20),
    avatar VARCHAR(200)
);
CREATE TABLE libros (
    id INT(20) AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT(20),
    titulo VARCHAR(150),
    autor VARCHAR(150),
    genero VARCHAR(50),
    subgenero VARCHAR(50),
    formato VARCHAR(50)
);