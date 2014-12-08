CREATE DATABASE proyectophp;

USE proyectophp;

CREATE TABLE usuario (
    login VARCHAR(30) NOT NULL PRIMARY KEY,
    clave VARCHAR(40) NOT NULL,
    nombre VARCHAR(30) NOT NULL,
    apellidos VARCHAR(60) NOT NULL,
    email VARCHAR(40) NOT NULL,
    fechaalta DATE NOT NULL,
    isactivo TINYINT(1) NOT NULL default 0,
    isroot TINYINT(1) NOT NULL default 0,
    rol ENUM('administrador','usuario') NOT NULL default 'usuario',
    fechalogin DATETIME
)engine=innodb charset=utf8 collate=utf8_unicode_ci;

CREATE TABLE anuncio (
    idanuncio INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(30) NOT NULL,
    precio INT NOT NULL,
    tipo ENUM('alquiler','venta') NOT NULL,
    extras VARCHAR(60) NOT NULL,    
    descripcion VARCHAR(200) NOT NULL,
    fechaalta DATE NOT NULL,
    ciudad VARCHAR(20) NOT NULL,
    localizacion VARCHAR(100) NOT NULL,
    habitaciones INT NOT NULL,
    servicios INT NOT NULL,
    metros VARCHAR(30) NOT NULL
)engine=innodb charset=utf8 collate=utf8_unicode_ci;

CREATE TABLE fotos (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idanuncio INT NOT NULL,
    urlfoto VARCHAR(200) NOT NULL,  
    destacada TINYINT(1) NOT NULL default 0,
    FOREIGN KEY (idanuncio) REFERENCES anuncio(idanuncio)
)engine=innodb charset=utf8 collate=utf8_unicode_ci;