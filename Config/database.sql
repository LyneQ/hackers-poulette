-- 1) creating database if hes not exist
CREATE DATABASE IF NOT EXISTS poulette;
-- 2) use the correct database for this project
USE poulette;
-- 3) create the tickets table to store essentials information about tickets sent by user
CREATE TABLE IF NOT EXISTS tickets
(
    name        TINYTEXT      NOT NULL,
    firstname   TINYTEXT      NOT NULL,
    email       TINYTEXT      NOT NULL,
    file        TINYTEXT,
    description VARCHAR(1000) NOT NULL
)