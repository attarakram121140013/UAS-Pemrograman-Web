CREATE DATABASE IF NOT EXISTS seri_animasi;
USE seri_animasi;

CREATE TABLE IF NOT EXISTS responden (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50) NOT NULL,
    judul_animasi VARCHAR(255) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    tahun_tayang INT(4) NOT NULL,
    karakter_favorit VARCHAR(50) NOT NULL,
    browser VARCHAR(255),
    alamat_ip VARCHAR(15)
);
