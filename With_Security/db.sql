CREATE DATABASE IF NOT EXISTS pokemon_center;
USE pokemon_center;

CREATE TABLE trainers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    trainer_name VARCHAR(100),
    region VARCHAR(50),
    pokemon VARCHAR(50),
    username VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);