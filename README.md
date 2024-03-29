﻿# E-libary_project


===> Database Structure <===
++ Table ++
=>books
- bookId int(11) not null AUTO_INCREMENT
- bookTitle varchar(100) not null
- isbn varchar(20) not null
- authorsId varchar(60)
- catrgoryId int(11)
- languages varchar(40)
- releaseYear varchar(10)
- createdate date
- createBy
 
=> authors
- authorId
- firstName
- LastName
- book_qty
- contact
- description

=> category
- categoryid int(11) not null auto_increment
- categoryName varchar(60) not null
- createDate date
- createBy varchar(60)
- desciption

=> user
- id
- userTypes
- username
- password
- position
- createdate
- description

=>admin
- id
- firstName
- lastName
- gender
- dob
- address
- phone 
- email 
- username
- password


=>librarain
- id
- firstName
- lastName
- gender
- dob
- address
- phone 
- email
- joindate 
- position
- salary
- description
- username
- password

===> Query Structure
CREATE TABLE authors(
    authorsId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstName varchar(50) NOT NULL,
    lastName varchar(50) NOT NUll,
    bookQty int(10),
    contact varchar(100),
    description varchar(300)
    
);

CREATE TABLE category(
    categoryId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    categoryName varchar(60) NOT NULL,
    createDate date,
    createBy varchar(60),
    description varchar(300)
);

CREATE TABLE books(
    bookId int(11) NOT NULL AUTO_INCREMENT,
    bookTitle varchar(100) NOT NULL,
    isbn varchar(20) NOT NULL UNIQUE,
    authorsId int(11),
    categoryId int(11),
    languages varchar(40),
    releaseYear varchar(15),
    createDate date,
    createBy varchar(50),
    PRIMARY KEY (id),
    CONSTRAINT fk_category
    FOREIGN KEY (categoryId) REFERENCES category(categoryId)
);

CREATE TABLE book_author(
    bookId int NOT NULL,
    authorId int NOT NULL,
    PRIMARY KEY (bookId,authorId),
    CONSTRAINT fk_book
    FOREIGN KEY (bookId) REFERENCES books(bookId),
    CONSTRAINT fk_author
    FOREIGN KEY (authorId) REFERENCES authors(authorId)
);

CREATE TABLE users(
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userTypes varchar(50) NOT NULL,
    username varchar(50) NOT NULL UNIQUE,
    password varchar(50) NOT NULL,
    position varchar(50),
    createDate date,
    description varchar(300)
);

CREATE TABLE admins(
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstName varchar(50) NOT NULL,
    lastName varchar(50) NOT NULL,
    gender varchar(15),
    dob date,
    address varchar(50) NOT NULL,
    phone varchar(15) NOT NULL,
    email varchar(100) NOT NULL UNIQUE,
    username varchar(50)  NOT NULL UNIQUE,
    password varchar(50) NOT NULL,
	description varchar(300)
);

CREATE TABLE librarain(
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstName varchar(50) NOT NULL,
    lastName varchar(50) NOT NULL,
    gender varchar(15),
    dob date,
    address varchar(50) NOT NULL,
    phone varchar(15) NOT NULL,
    email varchar(100) NOT NULL UNIQUE,
    joinDate date,
    position varchar(50),
    salary decimal(10,2),
    username varchar(50)  NOT NULL UNIQUE,
    password varchar(50) NOT NULL,
 	description varchar(300)
);
