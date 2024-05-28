
CREATE DATABASE IF NOT EXISTS if0_36633270_resimkulup;

--tabloları oluşturdum 

CREATE TABLE uyeler(
    id INT AUTO_INCREMENT PRIMARY KEY,
    kullaniciadi VARCHAR(255) NOT NULL,
    sifre VARCHAR(255) NOT NULL,
    isim VARCHAR(255) NOT NULL,
    soyisim VARCHAR(255) NOT NULL,
    telefon VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    adres VARCHAR(250) NOT NULL,
    UNIQUE (kullaniciadi)
);


CREATE TABLE etkinlikler(
    id INT AUTO_INCREMENT PRIMARY KEY,
    etkinlik_adi VARCHAR(255) NOT NULL,
    tarih DATE ,
    yer VARCHAR(255) NOT NULL ,
    konu VARCHAR(255) NOT NULL 

);

CREATE TABLE malzemeler(
    id INT AUTO_INCREMENT PRIMARY KEY,
    malzemeadi VARCHAR(255) NOT NULL ,
    tur VARCHAR(255) NOT NULL ,
    sayi VARCHAR(255) NOT NULL 
);




