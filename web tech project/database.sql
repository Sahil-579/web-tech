CREATE DATABASE f078;

USE f078;

CREATE TABLE customer (
    Uname VARCHAR(50) PRIMARY KEY,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Uname VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    doctor VARCHAR(100) NOT NULL,
    FOREIGN KEY (Uname) REFERENCES customer(Uname)
);

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO admin (username, password) VALUES ('admin', 'admin123');
