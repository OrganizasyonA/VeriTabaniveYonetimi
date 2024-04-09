-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 10 Nis 2024, 01:47:53
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
-- Tablo için tablo yapısı `bolumler`
--

CREATE TABLE `bolumler` (
  `BolumID` int(11) NOT NULL,
  `BolumAdi` varchar(100) DEFAULT NULL,
  `BolumKodu` varchar(20) DEFAULT NULL,
  `BolumAciklamasi` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin5 COLLATE=latin5_turkish_ci;

--
-- Tablo döküm verisi `bolumler`
--

INSERT INTO `bolumler` (`BolumID`, `BolumAdi`, `BolumKodu`, `BolumAciklamasi`) VALUES
(1, 'Bilgisayar', '1', 'Bilgisayar programcilari'),
(2, 'Makina', '2', 'Makina');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dersler`
--

CREATE TABLE `dersler` (
  `DersID` int(11) NOT NULL,
  `DersAdi` varchar(100) DEFAULT NULL,
  `BolumID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin5 COLLATE=latin5_turkish_ci;

--
-- Tablo döküm verisi `dersler`
--

INSERT INTO `dersler` (`DersID`, `DersAdi`, `BolumID`) VALUES
(1, 'programlama', 1),
(2, 'Web Tasarim', 1),
(3, 'Grafik Animasyon', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenci`
--

CREATE TABLE `ogrenci` (
  `OgrenciID` int(11) NOT NULL,
  `Isim` varchar(50) DEFAULT NULL,
  `Soyisim` varchar(50) DEFAULT NULL,
  `tcNum` bigint(11) NOT NULL,
  `DogumTarihi` date DEFAULT NULL,
  `Cinsiyet` varchar(10) NOT NULL,
  `BolumID` int(2) DEFAULT NULL,
  `AnneAdi` varchar(20) NOT NULL,
  `BabaAdi` varchar(20) NOT NULL,
  `Adres` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin5 COLLATE=latin5_turkish_ci;

--
-- Tablo döküm verisi `ogrenci`
--

INSERT INTO `ogrenci` (`OgrenciID`, `Isim`, `Soyisim`, `tcNum`, `DogumTarihi`, `Cinsiyet`, `BolumID`, `AnneAdi`, `BabaAdi`, `Adres`) VALUES
(4, 'enes', 'demir', 20032002198, '1999-02-26', 'Erkek', 1, 'anne', 'baba', 'kocaeli'),
(5, 'bahattin', 'cinar', 88889999112, '2002-03-22', 'Erkek', 2, 'A', 'B', 'Adres'),
(6, 'A', 'B', 12345678911, '1999-02-22', 'Kadin', 1, 'B', 'A', 'DADRES');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenci_ders_notlari`
--

CREATE TABLE `ogrenci_ders_notlari` (
  `OgrenciID` int(11) NOT NULL,
  `DersID` int(11) NOT NULL,
  `Vize` decimal(4,0) DEFAULT 0,
  `Final` decimal(4,0) DEFAULT 0,
  `Odev` decimal(4,0) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin5 COLLATE=latin5_turkish_ci;

--
-- Tablo döküm verisi `ogrenci_ders_notlari`
--

INSERT INTO `ogrenci_ders_notlari` (`OgrenciID`, `DersID`, `Vize`, `Final`, `Odev`) VALUES
(4, 1, 90, 0, 0),
(4, 2, 0, 80, 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bolumler`
--
ALTER TABLE `bolumler`
  ADD PRIMARY KEY (`BolumID`);

--
-- Tablo için indeksler `dersler`
--
ALTER TABLE `dersler`
  ADD PRIMARY KEY (`DersID`),
  ADD KEY `BolumID` (`BolumID`);

--
-- Tablo için indeksler `ogrenci`
--
ALTER TABLE `ogrenci`
  ADD PRIMARY KEY (`OgrenciID`),
  ADD KEY `BolumID` (`BolumID`);

--
-- Tablo için indeksler `ogrenci_ders_notlari`
--
ALTER TABLE `ogrenci_ders_notlari`
  ADD PRIMARY KEY (`OgrenciID`,`DersID`),
  ADD KEY `DersID` (`DersID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bolumler`
--
ALTER TABLE `bolumler`
  MODIFY `BolumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `dersler`
--
ALTER TABLE `dersler`
  MODIFY `DersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `ogrenci`
--
ALTER TABLE `ogrenci`
  MODIFY `OgrenciID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
