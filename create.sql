-- -----------------------
-- Bookstore Project
-- Lukasz Formela
-- lukaszformela.com
-- -----------------------


-- -----------------------
-- DROP BOOKSTORE DATABASE
-- (COMMENT OUT IF UNWANTED)
-- -----------------------

DROP DATABASE IF EXISTS bookstore;


-- -----------------------
-- CREATE BOOKSTORE DATABASE
-- -----------------------

CREATE DATABASE IF NOT EXISTS bookstore;


-- -----------------------
-- CREATE BOOKS TABLE
-- -----------------------

CREATE TABLE IF NOT EXISTS bookstore.books (
    book_id           int          NOT NULL AUTO_INCREMENT,
    book_title        varchar(255) NOT NULL,
    book_genre        char(64)     NOT NULL,
    book_author_fname varchar(255) NOT NULL,
    book_author_sname varchar(255) NOT NULL,
    book_price        varchar(255) NOT NULL,
    book_amount       int(32)      NOT NULL,
    book_isbn         int(13)      NOT NULL,
    PRIMARY KEY (book_id)
)