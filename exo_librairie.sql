DROP DATABASE exo_librairie

CREATE DATABASE `exo_librairie`
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
USE `exo_librairie`;

CREATE TABLE `author` 
 ( 
	auth_id BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	auth_firstname VARCHAR(30) NOT NULL, 
	auth_lastname varchar(255) NOT NULL
 ) ENGINE=InnoDB ;
 
  CREATE TABLE `category` 
 ( 
	ctg_id BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    ctg_name VARCHAR(255) NOT NULL  
 ) ENGINE=InnoDB ;
 
 CREATE TABLE `user`
 (
	usr_id BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	usr_name VARCHAR(255) NOT NULL,
	usr_email VARCHAR(80) NOT NULL UNIQUE,
	usr_passwd VARCHAR(32) NOT NULL,
	usr_created_at TIMESTAMP NOT NULL
 ) ENGINE=InnoDB
 
 CREATE TABLE `book` 
 ( 
	bk_isbn VARCHAR(13) PRIMARY KEY NOT NULL,
	bk_name VARCHAR(60) NOT NULL, 
	bk_author_id BIGINT NOT NULL REFERENCES author(auth_id),
	bk_original_name VARCHAR(255) DEFAULT NULL,
	bk_translater VARCHAR(255) DEFAULT NULL,
	bk_format ENUM('pocket', 'digital', 'classic' ) NOT NULL,
    bk_category_id BIGINT NOT NULL REFERENCES category(ctg_id),
	bk_of_month TINYINT(1) NOT NULL DEFAULT 0,
	bk_cover VARCHAR(255) DEFAULT NULL
 ) ENGINE=InnoDB ;
 

 INSERT INTO `author`(`auth_firstname`, `auth_lastname`) VALUES ('Victor','Hugo'), ('Emile', 'Zola'), ('Gustave','Flaubert'), ('Frank','Herbert');

 INSERT INTO `category`(`ctg_name`) VALUES ('Science Fiction'),('Roman'),('essai');

INSERT INTO `book`(`bk_isbn`, `bk_name`, `bk_author_id`, `bk_original_name`, `bk_translater`, `bk_format`, `bk_category_id`, `bk_of_month`) VALUES 
('9780441013593','Dune tome - 1','4','Dune tome - 1','PENGUIN','pocket','1', '1');

INSERT INTO `book`(`bk_isbn`, `bk_name`, `bk_author_id`, `bk_format`, `bk_category_id`) VALUES
("9781508832386","l'Assommoir","2","classic","2"),("9798631822542","Les contemplations","1","pocket","3"),("9782352360391","Dictionnaire politique des idées reçues","3","digital","2");

