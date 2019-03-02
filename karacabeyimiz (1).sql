-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 24 Nis 2017, 18:18:20
-- Sunucu sürümü: 5.7.17-0ubuntu0.16.04.2
-- PHP Sürümü: 5.6.30-10+deb.sury.org~xenial+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `karacabeyimiz`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `kullanici` int(11) NOT NULL,
  `baslik` text COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `blog`
--

INSERT INTO `blog` (`id`, `kullanici`, `baslik`, `icerik`, `tarih`) VALUES
(1, 1, 'Bir günlüğüne Karacabey’i yönettiler', 'Karacabey’de, 23 Nisan Ulusal Egemenlik ve Çocuk Bayramı dolayısıyla Kaymakamlık, Belediye, Cumhuriyet Başsavcılığı ve İlçe Milli Eğitim Müdürlüğü’nü ziyaret eden öğrenciler, bir günlüğüne temsilen ilçeyi yönetti, dilek ve isteklerini dile getirdi.\r\nKaracabey’de Kaymakamlık makamına Atatürk İlkokulu 4. Sınıf öğrencisi Zeynep Yaren Döndü oturdu. Arkadaşları Miray Acar ve Melih Adlığ ile birlikte Kaymakam Dr. Yusuf Gökhan Yolcu’nun konuğu olan minik Kaymakam Zeynep Yaren Döndü, okullarına bisiklet parkı yapılması talimatını verdi.\r\nDaha sonra öğrencilerle sohbet eden Kaymakam Dr. Yusuf Gökhan Yolcu, eğitimin önemine dikkat çekti. İyi insan olmanın önemli bir vasıf olduğunu belirten Yolcu, “Yarınlar zannettiğiniz gibi uzakta değil. Zaman çabuk geçiyor. Büyüdüğünüzde asıl zor görevler o zaman sizleri bekleyecek. Tüm bu zorluklara rağmen iyilikten ve iyi insan olmaktan asla vazgeçmeyin.” dedi.', '2017-04-12'),
(2, 2, 'Canbalı Mahallesi’ne yeni camii müjdesi', 'Karacabey Belediyesi tarafından Bursa’ya giriş ve çıkış güzergahında ilçeyi modern bir görünüme kavuşturmak adına başlatılan altyapı ve rekreasyon çalışmalarında sona gelinirken, söz konusu alanda yer alan Canbalı Mahallesi’ne de hayırsever işadamı Mücahit Çavdarlı tarafından yeni bir camii inşa edileceği açıklandı.\r\nGeçtiğimiz hafta Karacabey Belediye Başkanı Ali Özkan ile bir araya gelen işadamı Mücahit Çavdarlı, 100 yılı aşkın bir süredir hizmet veren Canbalı Camii’nin yerine, kent girişine bambaşka bir atmosfer katacak büyük ölçekli bir cami yapmaktan aile olarak gurur duyacaklarını kaydetti.\r\nKaracabey Belediye Başkanı Ali Özkan; ilçenin ekonomik, sosyal, kültürel ve sportif tüm yönlerden kalkınması adına, resmi ve özel kurumlar ile önemli diyaloglar geliştirildiğini belirterek, bu girişimlerin ilçeye gönül verenler ve hayırseverler tarafından da desteklenmesinden ayrı bir gurur duyduklarını ifade etti.\r\nBaşkan Özkan ayrıca, ekonomik zenginliği ile birlikte hayırseverlik ve yardımlaşma konusu bakımından da Karacabeylilerin her zaman örnek teşkil ettiğini söyleyerek, ilçe halkı adına Çavdarlı ailesine teşekkürlerini iletti.', '2017-04-05');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Uye`
--

CREATE TABLE `Uye` (
  `id` int(11) NOT NULL,
  `kullaniciAdi` text COLLATE utf8_turkish_ci NOT NULL,
  `sifre` text COLLATE utf8_turkish_ci NOT NULL,
  `mail` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `Uye`
--

INSERT INTO `Uye` (`id`, `kullaniciAdi`, `sifre`, `mail`) VALUES
(1, 'batuhan16', '123456', 'batuhanozkan23@gmail.com'),
(2, 'mc', '3456', 'mcyurga@gmail.com');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`,`kullanici`),
  ADD KEY `kullanici` (`kullanici`);

--
-- Tablo için indeksler `Uye`
--
ALTER TABLE `Uye`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `Uye`
--
ALTER TABLE `Uye`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`kullanici`) REFERENCES `Uye` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
