-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 07 Haz 2024, 00:13:37
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
(1, 'Bilgisayar', NULL, 'Bilgisayar programcilari');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `calisanlar`
--

CREATE TABLE `calisanlar` (
  `staff_name` varchar(255) NOT NULL,
  `staff_surname` varchar(255) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `staff_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `calisanlar`
--

INSERT INTO `calisanlar` (`staff_name`, `staff_surname`, `staff_id`, `staff_pass`) VALUES
('Ali', 'Kara', 1, 'test123'),
('Ayse', 'Lafta', 2, 'deneme123');

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
(2, 'makina', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenci`
--

CREATE TABLE `ogrenci` (
  `Isim` varchar(50) DEFAULT NULL,
  `Soyisim` varchar(50) DEFAULT NULL,
  `sifre` varchar(255) NOT NULL,
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

INSERT INTO `ogrenci` (`Isim`, `Soyisim`, `sifre`, `tcNum`, `DogumTarihi`, `Cinsiyet`, `BolumID`, `AnneAdi`, `BabaAdi`, `Adres`) VALUES
('baho', 'cinar', 'test1', 22304411290, '2002-03-22', 'Erkek', 1, 'anne', 'baba', 'karamursel'),
('enes', 'demir', 'test2', 10203040109, '0000-00-00', 'Erkek', 1, 'anne', 'baba', 'kocaeli'),
('beto', 'kocdemir', 'test3', 90204050920, NULL, 'Kadın', 1, 'anne', 'baba', 'bursa'),
('a', 'b', 'test3', 12345678190, '2222-02-22', 'Erkek', 1, 'a', 'b', 'a');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenci_ders_notlari`
--

CREATE TABLE `ogrenci_ders_notlari` (
  `Isim` varchar(50) DEFAULT NULL,
  `Soyisim` varchar(50) DEFAULT NULL,
  `sifre` varchar(50) NOT NULL,
  `tcNum` bigint(20) NOT NULL,
  `DersID` int(11) NOT NULL,
  `Notu` decimal(5,2) DEFAULT NULL,
  `VizeNotu` int(11) NOT NULL,
  `FinalNotu` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin5 COLLATE=latin5_turkish_ci;

--
-- Tablo döküm verisi `ogrenci_ders_notlari`
--

INSERT INTO `ogrenci_ders_notlari` (`Isim`, `Soyisim`, `sifre`, `tcNum`, `DersID`, `Notu`, `VizeNotu`, `FinalNotu`) VALUES
('baho', 'cinar', '', 22304411290, 1, 75.00, 50, 37),
('beto', 'kocdemir', '', 90204050920, 1, NULL, 32, 67),
('enes', 'demir', '', 10203040109, 1, NULL, 98, 32);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yoklama`
--

CREATE TABLE `yoklama` (
  `tcNum` bigint(20) NOT NULL,
  `ders` int(11) NOT NULL,
  `yoklama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bolumler`
--
ALTER TABLE `bolumler`
  ADD PRIMARY KEY (`BolumID`);

--
-- Tablo için indeksler `calisanlar`
--
ALTER TABLE `calisanlar`
  ADD UNIQUE KEY `staff_id` (`staff_id`);

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
  ADD PRIMARY KEY (`tcNum`),
  ADD UNIQUE KEY `Isim` (`Isim`,`Soyisim`),
  ADD UNIQUE KEY `Isim_2` (`Isim`,`Soyisim`),
  ADD KEY `BolumID` (`BolumID`);

--
-- Tablo için indeksler `ogrenci_ders_notlari`
--
ALTER TABLE `ogrenci_ders_notlari`
  ADD PRIMARY KEY (`tcNum`),
  ADD UNIQUE KEY `Isim` (`Isim`,`Soyisim`),
  ADD KEY `DersID` (`DersID`);

--
-- Tablo için indeksler `yoklama`
--
ALTER TABLE `yoklama`
  ADD PRIMARY KEY (`tcNum`),
  ADD UNIQUE KEY `tcNum` (`tcNum`);

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
  MODIFY `DersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
