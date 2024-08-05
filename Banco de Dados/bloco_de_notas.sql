CREATE DATABASE bloco_de_notas;

USE bloco_de_notas;

CREATE TABLE notas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    conteudo TEXT NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
USE bloco_de_notas;

CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);

ALTER TABLE notas ADD categoria_id INT, ADD FOREIGN KEY (categoria_id) REFERENCES categorias(id);