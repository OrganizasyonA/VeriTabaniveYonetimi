-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 30 May 2024, 18:17:49
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ogrenciobs`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenci`
--

CREATE TABLE `ogrenci` (
  `Isim` varchar(50) DEFAULT NULL,
  `Soyisim` varchar(50) DEFAULT NULL,
  `tcNum` bigint(12) NOT NULL,
  `DogumTarihi` date DEFAULT NULL,
  `Cinsiyet` enum('Erkek','Kadın','Diğer') DEFAULT NULL,
  `BolumID` int(11) DEFAULT NULL,
  `AnneAdi` varchar(20) NOT NULL,
  `BabaAdi` varchar(20) NOT NULL,
  `Adres` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin5 COLLATE=latin5_turkish_ci;

--
-- Tablo döküm verisi `ogrenci`
--

INSERT INTO `ogrenci` (`Isim`, `Soyisim`, `tcNum`, `DogumTarihi`, `Cinsiyet`, `BolumID`, `AnneAdi`, `BabaAdi`, `Adres`) VALUES
('baho', 'cinar', 22304411290, '2002-03-22', 'Erkek', 1, 'anne', 'baba', 'karamursel'),
('enes', 'demir', 10203040109, '0000-00-00', 'Erkek', 1, 'anne', 'baba', 'kocaeli'),
('beto', 'kocdemir', 90204050920, NULL, 'Kadın', 1, 'anne', 'baba', 'bursa'),
('a', 'b', 12345678190, '2222-02-22', 'Erkek', 2, 'a', 'b', 'a');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ogrenci`
--
ALTER TABLE `ogrenci`
  ADD PRIMARY KEY (`tcNum`),
  ADD KEY `BolumID` (`BolumID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
