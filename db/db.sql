CREATE DATABASE Docker;
USE Docker;
CREATE TABLE Users 
(   ID int,
    Username VARCHAR(20),
    Email VARCHAR(40),
    password VARCHAR(100));
INSERT INTO Users VALUES 
(   1, 
    'brasko', 
    'brasko_93@gmail.com', 
    'ici-cest-la-cite');
