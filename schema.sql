CREATE DATABASE crud_php;
USE crud_php;

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255),
    penulis VARCHAR(255),
    tahun_terbit YEAR,
    kategori VARCHAR(50),
    cover VARCHAR(255)
);
