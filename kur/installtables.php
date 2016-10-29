<?php

if (!isset($dblang)) { $dblang='en'; }

function taslaksite_createtables($conn) {

global $dblang;

$sitename=strlen($_REQUEST['SiteName'])>0?$_REQUEST['SiteName']:'TaslakSite.com';

$sql = "DROP TABLE IF EXISTS `".table_prefix."conf`;";
mysql_query( $sql, $conn );

$sql = "CREATE TABLE IF NOT EXISTS `".table_prefix."conf` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DEGISKEN` varchar(128) COLLATE utf8_turkish_ci DEFAULT NULL,
  `DEGER` varchar(1024) CHARACTER SET utf8 DEFAULT NULL,
  `ACIKLAMA` varchar(1024) CHARACTER SET utf8 DEFAULT NULL,
  `DURUM` varchar(1) COLLATE utf8_turkish_ci DEFAULT '1',
  `ADMIN_ID` smallint(6) DEFAULT NULL,
  `OLUS_TARIHI` date DEFAULT NULL,
  `OLUS_SAATI` time DEFAULT NULL,
  `DEG_TARIHI` date DEFAULT NULL,
  `DEG_SAATI` time DEFAULT NULL,
  `SIZ` int(11) DEFAULT NULL,
  `DIL` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'TR',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=52 ;";

mysql_query( $sql, $conn );
echo '<font style="color:#A80812; ">'.table_prefix."conf</font> tablosu olusturuldu...<br />";

mysql_query("
INSERT INTO `".table_prefix."conf` (`ID`, `DEGISKEN`, `DEGER`, `ACIKLAMA`, `DURUM`, `ADMIN_ID`, `OLUS_TARIHI`, `OLUS_SAATI`, `DEG_TARIHI`, `DEG_SAATI`, `SIZ`, `DIL`) VALUES
(1, 'TITLE', '".(strlen($sitename)>0?$sitename:'.:: Taslak Site �YS - H�zl�, g�venli, kaliteli web site olu�turma arac�')."', '<br>Sitenin ad�', '1', NULL, NULL, NULL, '2010-08-08', '09:33:48', 1281267228, 'TR'),
(2, 'DESCRIPTION', '".(strlen($sitename)>0?$sitename:'Taslak Site ��erik Y�netim Sistemi - H�zl�, g�venli, kaliteli web site olu�turma arac�')."', '<br>Arama motorlar�nda sitenin listelenmesi i�in g�r�nen a��klama', '1', NULL, NULL, NULL, '2010-08-08', '09:33:49', 1281267229, 'TR'),
(3, 'KEYWORDS', 'rasim �en, e-business,b2b,b2c,e-ticaret,kurumsal site,web site, CMS, portal, open source, gpl, dinamik i�erikli site', '<br>Arama motorlar� i�in sitenin i�eri�i ile ilgili anahtar kelimeler', '1', NULL, NULL, NULL, '2010-08-08', '09:33:49', 1281267229, 'TR'),
(6, 'MAIL_SMTP', 'mail.taslaksite.com', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:49', 1281267229, 'TR'),
(7, 'SAHIP_ADI', 'AS� SOFT - http://www.asisoft.biz', '<br>Sitenin ait oldu�u �irket yada ki�i ad�', '1', NULL, NULL, NULL, '2010-08-08', '09:33:49', 1281267229, 'TR'),
(8, 'SAHIP_EMAIL', 'iletisim@taslaksite.com', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:49', 1281267229, 'TR'),
(9, 'SAHIP_TEL1', '0212 635 0757', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:50', 1281267230, 'TR'),
(10, 'SAHIP_TEL2', '', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:50', 1281267230, 'TR'),
(11, 'SAHIP_FAX', '0212 635 0757', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:50', 1281267230, 'TR'),
(12, 'SAHIP_CEP', '0543 567 1067', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:50', 1281267230, 'TR'),
(13, 'SAHIP_ADRES', 'Unkapan� M�zik Aletleri �ar��s� Atat�rk Bulvar� �nl� �� Merkezi A Blok No:23 Unkapan� - Fatih / �stanbul', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:51', 1281267231, 'TR'),
(14, 'GALERI_FOTO_W', '96', '<br>Galeri foto�raflar�n�n g�r�nt�lenece�i boyut(px)', '1', NULL, NULL, NULL, '2010-08-08', '09:33:51', 1281267231, 'TR'),
(15, 'GALERI_FOTO_H', '', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:51', 1281267231, 'TR'),
(16, 'FOTO_W', '512', '<br>B�y�k fotograflar�n boyutlar�(px)', '1', NULL, NULL, NULL, '2010-08-08', '09:33:51', 1281267231, 'TR'),
(17, 'FOTO_H', '', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:51', 1281267231, 'TR'),
(36, 'IK_CV_EXTENSION', 'doc,docx,pdf,rft', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:52', 1281267232, 'TR'),
(38, 'IK_CV_SAVE_PATH', 'ik_cv', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:52', 1281267232, 'TR'),
(39, 'UYELIK_SISTEMI_OLSUN', '1', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:52', 1281267232, 'TR'),
(40, 'SADECE_UYE_YORUMLASIN', '1', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:52', 1281267232, 'TR'),
(41, 'YORUM_ADMIN_ONAYLI', '1', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:52', 1281267232, 'TR'),
(42, 'DOSYA_KAYIT_ADRES', 'sayfa_ekleri', NULL, '1', NULL, '2009-04-02', '01:00:50', '2010-08-08', '09:33:53', 1281267233, 'TR'),
(43, 'FOTO_KAYIT_ADRES', 'foto', NULL, '1', NULL, '2009-04-02', '06:28:19', '2010-08-08', '09:33:53', 1281267233, 'TR'),
(44, 'TASLAK_TASARIM', 'varsayilan', NULL, '1', NULL, '2009-04-07', '23:25:47', '2010-08-08', '09:33:53', 1281267233, 'TR'),
(45, 'AKTIVASYON_KODU_GEREKLI', '1', NULL, '1', NULL, '2010-01-24', '21:03:06', '2010-08-08', '09:33:53', 1281267233, 'TR'),
(46, 'SITE_ADI', '".$sitename."', NULL, '1', NULL, '2010-03-27', '18:55:10', '2010-08-08', '09:33:53', 1281267233, 'TR'),
(47, 'SITE_LOGO', 'ts_logo.png', NULL, '1', NULL, '2010-03-27', '18:57:28', '2010-08-08', '09:33:54', 1281267234, 'TR'),
(48, 'GOOGLE_ANALYTICS_KODU', '<script>    var _gaq = _gaq || [];   _gaq.push([''_setAccount'', ''UA-16573354-1'']);   _gaq.push([''_trackPageview'']);    (function() {     var ga = document.createElement(''script''); ga.type = ''text/javascript''; ga.async = true;     ga.src = (''https:'' == document.location.protocol ? ''https://ssl'' : ''http://www'') + ''.google-analytics.com/ga.js'';     var s = document.getElementsByTagName(''script'')[0]; s.parentNode.insertBefore(ga, s);   })();  </script>', NULL, '1', NULL, '2010-05-23', '07:57:47', '2010-08-08', '09:33:54', 1281267234, 'TR'),
(49, 'ADMIN_COOKIE', 'admin_id', NULL, '1', NULL, '2010-08-08', '09:33:05', '2010-08-08', '09:33:54', 1281267234, 'TR'),
(50, 'UYE_COOKIE', 'uye_id', NULL, '1', NULL, '2010-08-08', '09:33:29', '2010-08-08', '09:33:54', 1281267234, 'TR'),
(51, 'LISTELENECEK_KAYIT_SAYISI', '15', NULL, '1', NULL, '2010-08-08', '09:33:48', '2010-08-08', '09:40:04', 1281267604, 'TR'),
(52, 'KATEGORI_YENI_EKLENENLER', 'Enson eklenen yaz�lar..', NULL, '1', NULL, '2010-08-08', '09:33:48', '2010-08-08', '09:40:04', 1281267604, 'TR')", $conn );

echo table_prefix."conf tablosuna konfig&uuml;rasyon verileri eklendi...<br />";

$sql = "DROP TABLE IF EXISTS `".table_prefix."dosyalar`;";
mysql_query( $sql, $conn );

$sql = "
CREATE TABLE IF NOT EXISTS `".table_prefix."dosyalar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TIP` varchar(16) COLLATE utf8_turkish_ci DEFAULT 'REF',
  `REF_ID` int(11) DEFAULT NULL,
  `AD` varchar(128) COLLATE utf8_turkish_ci DEFAULT NULL,
  `KISA_ACIKLAMA` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `THUMBNAIL` varchar(128) COLLATE utf8_turkish_ci DEFAULT NULL,
  `FOTO` varchar(128) COLLATE utf8_turkish_ci DEFAULT NULL,
  `DOSYA_URL` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `DOSYA_TIPI` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `BOYUT` int(11) DEFAULT NULL,
  `THUMB_GENISLIK` int(11) DEFAULT NULL,
  `THUMB_YUKSEKLIK` int(11) DEFAULT NULL,
  `FOTO_GENISLIK` int(11) DEFAULT NULL,
  `FOTO_YUKSEKLIK` int(11) DEFAULT NULL,
  `SIRA` int(11) DEFAULT '0',
  `ADMIN_ID` smallint(3) DEFAULT NULL,
  `DURUM` enum('1','0') COLLATE utf8_turkish_ci DEFAULT NULL,
  `OLUS_TARIHI` datetime DEFAULT NULL,
  `OLUS_SAATI` time DEFAULT NULL,
  `DEG_TARIHI` date DEFAULT NULL,
  `DEG_SAATI` time DEFAULT NULL,
  `SIZ` int(11) DEFAULT NULL,
  `DIL` varchar(2) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'TR',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=214 ;";
mysql_query( $sql, $conn );
echo '<font style="color:#A80812; ">'.table_prefix."dosyalar</font> tablosu olusturuldu...<br />";


$sql = "DROP TABLE IF EXISTS `".table_prefix."ebulten`;";
mysql_query( $sql, $conn );

$sql = "
CREATE TABLE IF NOT EXISTS `".table_prefix."ebulten` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BASLIK` varchar(256) COLLATE utf8_turkish_ci DEFAULT NULL,
  `HIZLI_BAKIS_ICERIK` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `ICERIK` mediumtext COLLATE utf8_turkish_ci,
  `GONDERIM_DURUM` enum('0','1') COLLATE utf8_turkish_ci DEFAULT '0',
  `GONDERIM_TARIHI` date DEFAULT NULL,
  `GONDERIM_SAATI` time DEFAULT NULL,
  `DURUM` enum('0','1') COLLATE utf8_turkish_ci DEFAULT '1',
  `ADMIN_ID` smallint(6) DEFAULT NULL,
  `OLUS_TARIHI` date DEFAULT NULL,
  `OLUS_SAATI` time DEFAULT NULL,
  `DEG_TARIHI` date DEFAULT NULL,
  `DEG_SAATI` time DEFAULT NULL,
  `SIZ` int(11) DEFAULT NULL,
  `DIL` varchar(2) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'TR',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=19 ;";
mysql_query( $sql, $conn );
echo '<font style="color:#A80812; ">'.table_prefix."ebulten</font> tablosu olusturuldu...<br />";



mysql_query( "INSERT INTO `".table_prefix."ebulten` (`ID`, `BASLIK`, `HIZLI_BAKIS_ICERIK`, `ICERIK`, `GONDERIM_DURUM`, `GONDERIM_TARIHI`, `GONDERIM_SAATI`, `DURUM`, `ADMIN_ID`, `OLUS_TARIHI`, `OLUS_SAATI`, `DEG_TARIHI`, `DEG_SAATI`, `SIZ`, `DIL`) VALUES
(18, 'Ho�geldiniz..', '".$sitename." sitemize ho�geldiniz..', '<p>".$sitename."&nbsp; a ho�geldiniz..</p>\r\n<p>�&ccedil;erik Y&ouml;netim Sistemi olan ".$sitename."  sizlerin internet ortam�na h�zl� ve g&uuml;venle ge&ccedil;i�inizi sa�lamak amac�yla geli�tirdik. Sitemiz hakk�nda g&ouml;r&uuml;� ve &ouml;nerilerinizi bizlere iletmenizi &ouml;nemle rica ederiz.</p>\r\n<p>Yerli bir �&ccedil;erik Y&ouml;netim Sistemi olan ".$sitename." bir &ccedil;ok yabanc� portalin sahip oldu�u T&uuml;rk&ccedil;e problemlerini i&ccedil;ermez. Ayr�ca &ouml;zellikle kobilerin, organizasyonlar�n, gruplar�n ihtiya&ccedil; duydu�u bir &ccedil;ok &ouml;zelli�i &uuml;cretsiz olarak kullan�c�lar�na sunmaktad�r.</p>\r\n<p>Biz portalimizi kurduk ve g&uuml;nden g&uuml;ne geli�tirmeye devam ediyoruz. Bizi takip edin ;)</p>\r\n<p>".$sitename." Geli�tirme Ekibi Ad�na<br />\r\nRasim �EN - Yaz�l�m M&uuml;h.<br />\r\nrsen@taslaksite.com</p>', '0', NULL, NULL, '0', 6, '2008-12-20', '10:05:15', '2009-10-31', '16:32:32', 1257031952, 'TR')",$conn);

echo table_prefix."ebulten tablosuna veri eklendi...<br />";


$sql = "DROP TABLE IF EXISTS `".table_prefix."ebulten_email`;";
mysql_query( $sql, $conn );
$sql = "CREATE TABLE IF NOT EXISTS `".table_prefix."ebulten_email` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(128) COLLATE utf8_turkish_ci DEFAULT NULL,
  `BGONDERIM_DURUM` enum('0','1') COLLATE utf8_turkish_ci DEFAULT '0',
  `DURUM` varchar2(1) COLLATE utf8_turkish_ci DEFAULT '1',
  `ADMIN_ID` smallint(6) DEFAULT NULL,
  `OLUS_TARIHI` date DEFAULT NULL,
  `OLUS_SAATI` time DEFAULT NULL,
  `DEG_TARIHI` date DEFAULT NULL,
  `DEG_SAATI` time DEFAULT NULL,
  `SIZ` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=31 ;";
mysql_query( $sql, $conn );
echo '<font style="color:#A80812; ">'.table_prefix."ebulten_email</font> tablosu olusturuldu...<br />";

mysql_query( "INSERT INTO `".table_prefix."ebulten_email` (`ID`, `EMAIL`, `BGONDERIM_DURUM`, `DURUM`, `ADMIN_ID`, `OLUS_TARIHI`, `OLUS_SAATI`, `DEG_TARIHI`, `DEG_SAATI`, `SIZ`) VALUES
(18, 'bilgi@taslaksite.com', '0', '1', NULL, NULL, NULL, NULL, NULL, NULL)",$conn);
echo table_prefix."ebulten_email tablosuna veri eklendi...<br />";

$sql = "DROP TABLE IF EXISTS `".table_prefix."iletisim`;";
mysql_query( $sql, $conn );

$sql = "
CREATE TABLE IF NOT EXISTS `".table_prefix."iletisim` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MESAJ_TIPI` varchar(16) COLLATE utf8_turkish_ci DEFAULT 'BILGI',
  `GONDEREN_ADI` varchar(64) COLLATE utf8_turkish_ci DEFAULT NULL,
  `TEL` varchar(11) COLLATE utf8_turkish_ci DEFAULT NULL,
  `EMAIL` varchar(64) COLLATE utf8_turkish_ci DEFAULT NULL,
  `KONU` varchar(128) COLLATE utf8_turkish_ci DEFAULT NULL,
  `MESAJ` text COLLATE utf8_turkish_ci,
  `ADMIN_ID` int(11) DEFAULT NULL,
  `OLUS_TARIHI` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `DEGISME_TARIHI` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DURUM` enum('1','0') COLLATE utf8_turkish_ci DEFAULT '1',
  `MESAJ_DURUMU` enum('OKUNMADI','OKUNDU') COLLATE utf8_turkish_ci DEFAULT 'OKUNMADI',
  `DEG_TARIHI` date DEFAULT NULL,
  `DEG_SAATI` time DEFAULT NULL,
  `OLUS_SAATI` time DEFAULT NULL,
  `SIZ` int(11) DEFAULT NULL,
  `DOSYA_EKI` enum('VAR','YOK') COLLATE utf8_turkish_ci DEFAULT 'YOK',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=8 ;";

mysql_query( $sql, $conn );
echo '<font style="color:#A80812; ">'.table_prefix."iletisim</font> tablosu olusturuldu...<br />";

$sql = "DROP TABLE IF EXISTS `".table_prefix."kategori`;";
mysql_query( $sql, $conn );
$sql = "CREATE TABLE IF NOT EXISTS `".table_prefix."kategori` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PARENT` int(11) DEFAULT '0',
  `KATEGORI_ADI` varchar(48) COLLATE utf8_turkish_ci DEFAULT NULL,
  `KATEGORI_IKONU` varchar(128) COLLATE utf8_turkish_ci DEFAULT NULL,
  `SADECE_UYE` smallint(6) DEFAULT '0',
  `YORUM_ACIK` smallint(6) DEFAULT '0',
  `ARAMAYA_DAHIL` smallint(1) DEFAULT '0',
  `AKTIF_LINK_KUTULARI` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `SIRA` int(11) DEFAULT '0',
  `DURUM` enum('1','0','2') COLLATE utf8_turkish_ci DEFAULT NULL,
  `ADMIN_ID` int(11) DEFAULT NULL,
  `OLUS_TARIHI` date DEFAULT NULL,
  `OLUS_SAATI` time DEFAULT NULL,
  `DEG_TARIHI` date DEFAULT NULL,
  `DEG_SAATI` time DEFAULT NULL,
  `SIZ` int(11) DEFAULT NULL,
  `DIL` varchar(2) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'TR',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=48 ;";
mysql_query( $sql, $conn );
echo '<font style="color:#A80812; ">'.table_prefix."kategori</font> tablosu olusturuldu...<br />";


mysql_query( "INSERT INTO `".table_prefix."kategori` (`ID`, `PARENT`, `KATEGORI_ADI`, `KATEGORI_IKONU`, `SADECE_UYE`, `YORUM_ACIK`, `ARAMAYA_DAHIL`, `AKTIF_LINK_KUTULARI`, `SIRA`, `DURUM`, `ADMIN_ID`, `OLUS_TARIHI`, `OLUS_SAATI`, `DEG_TARIHI`, `DEG_SAATI`, `SIZ`, `DIL`) VALUES
(0, NULL, 'Kategoriler', NULL, 0, 0, 0, NULL, 0, '1', NULL, NULL, NULL, NULL, NULL, NULL, 'TR')",$conn);

echo table_prefix."kategori tablosuna &ouml;rnek kategoriler eklendi...<br />";

$sql = "DROP TABLE IF EXISTS `".table_prefix."kategori_etiketler`;";
mysql_query( $sql, $conn );

$sql ="
CREATE TABLE IF NOT EXISTS `".table_prefix."kategori_etiketler` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ETIKET` varchar(128) COLLATE utf8_turkish_ci DEFAULT NULL,
  `SAYAC` int(11) DEFAULT '1',
  `SIRA` int(11) DEFAULT '0',
  `DURUM` enum('1','0','2') COLLATE utf8_turkish_ci DEFAULT NULL,
  `ADMIN_ID` int(11) DEFAULT NULL,
  `OLUS_TARIHI` date DEFAULT NULL,
  `OLUS_SAATI` time DEFAULT NULL,
  `DEG_TARIHI` date DEFAULT NULL,
  `DEG_SAATI` time DEFAULT NULL,
  `SIZ` int(11) DEFAULT NULL,
  `DIL` varchar(2) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'TR',
  PRIMARY KEY (`ID`),
  KEY `YeniIndeks` (`ETIKET`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=215 ;";
mysql_query( $sql, $conn );
echo '<font style="color:#A80812; ">'.table_prefix."kategori_etiketler</font> tablosu olusturuldu...<br />";

$sql = "DROP TABLE IF EXISTS `".table_prefix."kategori_icerik`;";
mysql_query( $sql, $conn );

$sql ="CREATE TABLE IF NOT EXISTS `".table_prefix."kategori_icerik` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PARENT` int(11) DEFAULT NULL,
  `BASLIK` varchar(128) COLLATE utf8_turkish_ci DEFAULT NULL,
  `THUMBNAIL` varchar(128) COLLATE utf8_turkish_ci DEFAULT NULL,
  `KISA_OZET` mediumtext COLLATE utf8_turkish_ci,
  `ICERIK` mediumtext COLLATE utf8_turkish_ci,
  `ETIKETLER` varchar(128) COLLATE utf8_turkish_ci DEFAULT NULL,
  `ADMIN_ID` smallint(3) DEFAULT NULL,
  `OLUS_TARIHI` datetime DEFAULT NULL,
  `OLUS_SAATI` time DEFAULT NULL,
  `DURUM` enum('1','0') COLLATE utf8_turkish_ci DEFAULT '1',
  `SIRA` int(11) DEFAULT '0',
  `DEG_TARIHI` date DEFAULT NULL,
  `DEG_SAATI` time DEFAULT NULL,
  `SIZ` int(11) DEFAULT NULL,
  `DIL` varchar(2) CHARACTER SET utf8 NOT NULL DEFAULT 'TR',
  PRIMARY KEY (`ID`),
  FULLTEXT KEY `YeniIndeks` (`BASLIK`,`ETIKETLER`,`KISA_OZET`,`ICERIK`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=481 ;";
mysql_query( $sql, $conn );
echo '<font style="color:#A80812; ">'.table_prefix."kategori_icerik</font> tablosu olusturuldu...<br />";

$sql = "DROP TABLE IF EXISTS `".table_prefix."kullanicilar`;";
mysql_query( $sql, $conn );

$sql = "
CREATE TABLE IF NOT EXISTS `".table_prefix."kullanicilar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `KULLANICI_ADI` varchar(24) COLLATE utf8_turkish_ci DEFAULT NULL,
  `SIFRE` varchar(64) COLLATE utf8_turkish_ci DEFAULT NULL,
  `DURUM` enum('1','0') COLLATE utf8_turkish_ci DEFAULT '1',
  `AKTIVASYON_KODU` varchar(16) COLLATE utf8_turkish_ci DEFAULT NULL,
  `AD` varchar(32) COLLATE utf8_turkish_ci DEFAULT NULL,
  `SOYAD` varchar(48) COLLATE utf8_turkish_ci DEFAULT NULL,
  `ADRES` varchar(128) COLLATE utf8_turkish_ci DEFAULT NULL,
  `TEL` varchar(11) COLLATE utf8_turkish_ci DEFAULT NULL,
  `EMAIL` varchar(48) COLLATE utf8_turkish_ci DEFAULT NULL,
  `EGITIM` varchar(64) COLLATE utf8_turkish_ci DEFAULT NULL,
  `CINSIYET` enum('ERKEK','BAYAN') COLLATE utf8_turkish_ci DEFAULT NULL,
  `DOGUM_TARIHI` date DEFAULT NULL,
  `SEHIR` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ULKE` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `TIP` enum('YONETICI','KULLANICI') COLLATE utf8_turkish_ci DEFAULT NULL,
  `SESSION_ID` varchar(128) COLLATE utf8_turkish_ci DEFAULT NULL,
  `IP` varchar(64) COLLATE utf8_turkish_ci DEFAULT NULL,
  `OLUS_TARIHI` date DEFAULT NULL,
  `OLUS_SAATI` time DEFAULT NULL,
  `DEG_TARIHI` date DEFAULT NULL,
  `DEG_SAATI` time DEFAULT NULL,
  `SIZ` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=27 ;";
mysql_query( $sql, $conn );
echo '<font style="color:#A80812; ">'.table_prefix."kullanicilar</font> tablosu olusturuldu...<br />";


$sql = "DROP TABLE IF EXISTS `".table_prefix."link_kutulari`;";
mysql_query( $sql, $conn );

$sql = "
CREATE TABLE IF NOT EXISTS `".table_prefix."link_kutulari` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `KUTU_ADI` varchar(128) COLLATE utf8_turkish_ci DEFAULT NULL,
  `SIRA` smallint(6) DEFAULT '0',
  `DURUM` enum('1','0','2') COLLATE utf8_turkish_ci DEFAULT NULL,
  `ADMIN_ID` int(11) DEFAULT NULL,
  `OLUS_TARIHI` date DEFAULT NULL,
  `OLUS_SAATI` time DEFAULT NULL,
  `DEG_TARIHI` date DEFAULT NULL,
  `DEG_SAATI` time DEFAULT NULL,
  `SIZ` int(11) DEFAULT NULL,
  `DIL` varchar(2) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'TR',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=32 ;";
mysql_query( $sql, $conn );
echo '<font style="color:#A80812; ">'.table_prefix.'link_kutulari</font> tablosu olusturuldu...<br />';


mysql_query( "INSERT INTO `".table_prefix."link_kutulari` (`ID`, `KUTU_ADI`, `SIRA`, `DURUM`, `ADMIN_ID`, `OLUS_TARIHI`, `OLUS_SAATI`, `DEG_TARIHI`, `DEG_SAATI`, `SIZ`, `DIL`) VALUES
(18, 'H�zl� Arama', 4, '1', 6, '2009-02-22', '01:29:55', '2010-05-24', '23:02:19', 1274767339, 'TR'),
(19, 'e-B�lten', 5, '1', 6, '2009-02-22', '01:30:11', '2010-05-24', '23:02:19', 1274767339, 'TR'),
(20, '�ye Giri�i', 3, '1', 6, '2009-02-22', '01:30:50', '2010-05-24', '23:02:19', 1274767339, 'TR'),
(21, 'Alexa Top10', 10, '1', 6, '2009-02-23', '00:41:42', '2010-05-24', '23:02:19', 1274767339, 'TR'),
(22, 'Gazeteler', 9, '1', 6, '2009-02-23', '00:41:52', '2010-05-24', '23:02:19', 1274767339, 'TR'),
(23, 'BT Destekleri', 6, '1', 6, '2009-02-23', '00:42:29', '2010-05-24', '23:02:19', 1274767339, 'TR'),
(24, 'T�rkiye Top 10', 8, '1', 6, '2009-02-23', '00:42:55', '2010-05-24', '23:02:19', 1274767339, 'TR'),
(25, 'T�rkiye A��k Kaynak', 7, '1', 6, '2009-02-23', '00:43:11', '2010-05-24', '23:02:19', 1274767339, 'TR'),
(26, 'DUYURULAR', 2, '1', 6, '2009-03-05', '04:22:08', '2010-05-24', '23:02:19', 1274767339, 'TR'),
(28, 'B�LG�', 1, '1', 6, '2009-04-01', '01:43:54', '2010-05-24', '23:02:19', 1274767339, 'TR'),
(16, 'Etiketler', 11, '1', 6, '2009-08-16', '00:12:51', '2010-05-24', '23:02:19', 1274767339, 'TR'),
(17, 'Kategoriler', 12, '1', 6, '2009-08-18', '00:28:09', '2010-05-24', '23:02:19', 1274767339, 'TR'),
(31, 'Google Arama', 13, '1', 6, '2010-05-24', '23:02:02', '2010-05-24', '23:02:19', 1274767339, 'TR')",$conn);

echo '<font style="color:#A80812; ">'.table_prefix."link_kutulari</font> tablosuna &ouml;rnek veriler eklendi...<br />";

$sql = "DROP TABLE IF EXISTS `".table_prefix."link_kutulari_icerik`;";
mysql_query( $sql, $conn );
$sql = "
CREATE TABLE IF NOT EXISTS `".table_prefix."link_kutulari_icerik` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PARENT` int(11) DEFAULT NULL,
  `LINK_ADI` varchar(128) COLLATE utf8_turkish_ci DEFAULT NULL,
  `LINK_URL` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `LINK_TARGET` enum('_SELF','_BLANK') COLLATE utf8_turkish_ci DEFAULT '_SELF',
  `LINK_SOURCE` mediumtext COLLATE utf8_turkish_ci,
  `SIRA` smallint(6) DEFAULT '0',
  `DURUM` enum('1','0','2') COLLATE utf8_turkish_ci DEFAULT NULL,
  `ADMIN_ID` int(11) DEFAULT NULL,
  `OLUS_TARIHI` date DEFAULT NULL,
  `OLUS_SAATI` time DEFAULT NULL,
  `DEG_TARIHI` date DEFAULT NULL,
  `DEG_SAATI` time DEFAULT NULL,
  `SIZ` int(11) DEFAULT NULL,
  `DIL` varchar(2) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'TR',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=53 ;";
mysql_query( $sql, $conn );
echo '<font style="color:#A80812; ">'.table_prefix."link_kutulari_icerik</font> tablosu olusturuldu...<br />";


mysql_query( "INSERT INTO `".table_prefix."link_kutulari_icerik` (`ID`, `PARENT`, `LINK_ADI`, `LINK_URL`, `LINK_TARGET`, `LINK_SOURCE`, `SIRA`, `DURUM`, `ADMIN_ID`, `OLUS_TARIHI`, `OLUS_SAATI`, `DEG_TARIHI`, `DEG_SAATI`, `SIZ`, `DIL`) VALUES
(22, 18, 'H�zl� Arama (Ekranda G�r�nmez)', '', '_SELF', '<form name=\"search\" action=\"arama.php\" method=\"link\" style=\"margin: 0px; padding: 0px;\">\r\n        <b>H�zl� Ara:</b> <input gtbfieldid=\"7\" name=\"arama_text\" size=\"45\" maxlength=\"100\" class=\"search_box\" onFocus=\"javascript:this.value=''''\" value=\"H�zl� ara..\" type=\"text\" style=\"border:#CCCCCC solid 1px;\">\r\n        <input  name=\"btnHizliArama\" value=\"Ara\" class=\"go_button\" type=\"submit\">\r\n      </form>', 0, '1', 6, '2009-02-22', '01:31:59', '2010-02-02', '01:53:51', 1265068431, 'TR'),
(52, 31, 'Google Arama', '', '_SELF', '<script type=\"text/javascript\" src=\"http://www.google.com/jsapi\"></script>\r\n<script type=\"text/javascript\">\r\n  google.load(''search'', ''1'');\r\n  google.setOnLoadCallback(function() {\r\n    google.search.CustomSearchControl.attachAutoCompletion(\r\n      ''004758565031320666870:rjcwcrl8eho'',\r\n      document.getElementById(''q''),\r\n      ''cse-search-box'');\r\n  });\r\n</script>\r\n<form action=\"http://www.google.com/cse\" id=\"cse-search-box\">\r\n  <div>\r\n    <input type=\"hidden\" name=\"cx\" value=\"004758565031320666870:rjcwcrl8eho\" />\r\n    <input type=\"hidden\" name=\"ie\" value=\"UTF-8\" />\r\n    <input type=\"text\" name=\"q\" id=\"q\" autocomplete=\"off\" size=\"31\" />\r\n    <input type=\"submit\" name=\"sa\" value=\"Ara\" />\r\n  </div>\r\n</form>\r\n<script type=\"text/javascript\" src=\"http://www.google.com/cse/brand?form=cse-search-box&lang=tr\"></script>', 0, '1', 6, '2010-05-24', '23:02:55', '2010-05-31', '06:32:21', 1275312741, 'TR'),
(23, 20, '�ye Giri�i(Ekranda G�z�kmeyecek)', '', '_SELF', '<form method=\"post\"  name=\"form1\" action=\"uye.php\" style=\"margin: 0px; padding: 0px;\">\r\n        <input type=\"text\" name=\"kullanici_adi\" size=\"20\" maxlength=\"48\" class=\"hizliuye_box\" onfocus=\"javascript:this.value='''';\" value=\"kullan�c� ad�n�z..\">\r\n        <input type=\"password\" name=\"sifre\" size=\"10\"  maxlength=\"24\"  class=\"hizliuye_box\" onfocus=\"javascript:this.value='''';\" value=\"�ifre\">\r\n        <input value=\"Giri�\" class=\"go_button\" type=\"submit\">\r\n      </form> ', 0, '1', 6, '2009-02-22', '01:32:14', '2010-07-10', '10:37:43', 1278765463, 'TR'),
(24, 19, 'E B�lten (Ekranda G�r�nmeyecektir)', '', '_SELF', '<form id=\"form1\" name=\"form1\" method=\"post\" action=\"ebulten.php\">\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\">\r\n  <tr align=\"left\"><td>Email:</td><td><input type=\"text\" name=\"ebulten_email\" size=\"13\" maxlength=\"128\"  class=\"inputtext\" style=\"border:#CCCCCC solid 1px;\"/></td></tr>\r\n  <tr><td> </td><td><input name=\"btnEbulten\" value=\"Kay�t Ol\" class=\"go_button\" type=\"submit\"/></td></tr>\r\n</table>\r\n</form>', 0, '1', 6, '2009-02-22', '01:32:29', '2010-02-02', '00:34:15', 1265099655, 'TR'),
(25, 21, 'Yahoo.com', 'http://www.yahoo.com', '_BLANK', '', 0, '1', 6, '2009-02-23', '00:44:37', '2009-02-23', '00:44:37', 1235342677, 'TR'),
(26, 21, 'Google.com', 'http://www.google.com', '_BLANK', '', 0, '1', 6, '2009-02-23', '00:45:14', '2009-02-23', '00:45:14', 1235342714, 'TR'),
(27, 21, 'Youtube.com', 'http://www.youtube.com', '_BLANK', '', 0, '1', 6, '2009-02-23', '00:45:35', '2009-02-23', '00:45:35', 1235342735, 'TR'),
(28, 21, 'Live.com', 'http://www.live.com', '_BLANK', '', 0, '1', 6, '2009-02-23', '00:46:01', '2009-02-23', '00:46:01', 1235342761, 'TR'),
(29, 21, 'Msn.com', 'http://www.msn.com', '_BLANK', '', 0, '1', 6, '2009-02-23', '00:46:23', '2009-02-23', '00:46:23', 1235342783, 'TR'),
(30, 21, 'Myspace.com', 'http://www.myspace.com', '_BLANK', '', 0, '1', 6, '2009-02-23', '00:46:47', '2009-02-23', '00:46:47', 1235342807, 'TR'),
(31, 21, 'Wikipedia.org', 'http://www.wikipedia.org', '_BLANK', '', 0, '1', 6, '2009-02-23', '00:47:07', '2009-02-23', '00:47:07', 1235342827, 'TR'),
(32, 21, 'Facebook.com', 'http://www.facebook.com', '_BLANK', '', 0, '1', 6, '2009-02-23', '00:47:32', '2009-02-23', '00:47:32', 1235342852, 'TR'),
(33, 21, 'Blogger.com', 'http://www.blogger.com', '_BLANK', '', 0, '1', 6, '2009-02-23', '00:47:57', '2009-02-23', '00:47:57', 1235342877, 'TR'),
(34, 21, 'Orkut.com', 'http://www.orkut.com', '_BLANK', '', 0, '1', 6, '2009-02-23', '00:48:19', '2009-02-23', '00:48:19', 1235342899, 'TR'),
(35, 23, 'T�B�TAK', 'http://www.tubitak.gov.tr', '_BLANK', '', 0, '1', 6, '2009-02-23', '01:00:11', '2009-02-23', '01:00:11', 1235343611, 'TR'),
(36, 23, 'KOSGEB', 'http://www.kosgeb.gov.tr/', '_BLANK', '', 0, '1', 6, '2009-02-23', '01:00:45', '2009-02-23', '01:00:45', 1235343645, 'TR'),
(37, 23, 'e-Tohum', 'http://www.etohum.com', '_BLANK', '', 0, '1', 6, '2009-02-23', '01:01:40', '2009-02-23', '01:01:40', 1235343700, 'TR'),
(38, 25, 'PARDUS', 'http://www.pardus.org.tr/', '_BLANK', '', 0, '1', 6, '2009-02-23', '01:04:14', '2009-02-23', '01:04:14', 1235343854, 'TR'),
(39, 25, 'Pardus Kullan�c�lar� Derne�i', 'http://www.pkd.org.tr/', '_BLANK', '', 0, '1', 6, '2009-02-23', '01:07:25', '2009-02-23', '01:07:25', 1235344045, 'TR'),
(40, 25, 'Ender UNIX', 'http://enderunix.org/', '_SELF', '', 0, '1', 6, '2009-02-23', '01:07:46', '2009-02-23', '01:07:46', 1235344066, 'TR'),
(41, 25, 'Belgeler.org', 'http://belgeler.org/', '_BLANK', '', 0, '1', 6, '2009-02-23', '01:08:12', '2009-02-23', '01:08:12', 1235344092, 'TR'),
(42, 25, 'A��kKaynak.org', 'http://www.acikkaynak.org/', '_BLANK', '', 0, '1', 6, '2009-02-23', '01:08:47', '2009-02-23', '01:08:47', 1235344127, 'TR'),
(43, 25, 'PHP T�rkiye Grubu', 'http://www.php.org.tr/', '_BLANK', '', 0, '1', 6, '2009-02-23', '01:09:15', '2009-02-23', '01:09:15', 1235344155, 'TR'),
(44, 25, 'TBD-T�rkiye Bili�im Derne�i', 'http://www.tbd.org.tr/', '_BLANK', '', 0, '1', 6, '2009-02-23', '01:09:50', '2009-02-23', '01:09:50', 1235344190, 'TR'),
(45, 26, 'Yap�lacaklar..', 'yapilacaklar.php', '_SELF', '', 0, '1', 6, '2009-03-05', '04:22:49', '2009-03-05', '04:22:49', 1236255769, 'TR'),
(47, 28, 'B�Z� TERC�H EDENLER', 'referanslarimiz.php', '_SELF', '', 1, '1', 6, '2009-04-01', '01:46:04', '2009-04-03', '00:15:43', 1238742943, 'TR'),
(48, 28, 'YAPILACAKLAR', 'yapilacaklar.php', '_SELF', '', 2, '1', 6, '2009-04-01', '01:47:45', '2009-04-03', '00:15:43', 1238742943, 'TR'),
(49, 28, 'BT HABER', 'haberler.php', '_SELF', '', 3, '1', 6, '2009-04-01', '01:48:30', '2009-04-03', '00:15:43', 1238742943, 'TR'),
(50, 28, 'CV G�NDER', 'insankaynaklari.php', '_SELF', '', 4, '1', 6, '2009-04-01', '01:49:33', '2009-04-03', '00:15:43', 1238742943, 'TR'),
(51, 22, 'H�rriyet', 'http://www.hurriyet.com.tr', '_BLANK', '', 0, '1', 6, '2009-08-22', '05:56:15', '2009-08-22', '05:56:40', 1250945800, 'TR')",$conn);

echo table_prefix."link_kutulari_icerik tablosuna &ouml;rnek veriler eklendi...<br />";


$sql = "DROP TABLE IF EXISTS `".table_prefix."param`;";
mysql_query( $sql, $conn );

$sql = "
CREATE TABLE IF NOT EXISTS `".table_prefix."param` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PARAMETRE_ADI` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `PARAMETRE_ACIKLAMA` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `SIRA` smallint(6) DEFAULT '0',
  `DURUM` smallint(6) DEFAULT '1',
  `ADMIN_ID` int(255) DEFAULT NULL,
  `OLUS_TARIHI` date DEFAULT NULL,
  `OLUS_SAATI` time DEFAULT NULL,
  `DEG_TARIHI` date DEFAULT NULL,
  `DEG_SAATI` time DEFAULT NULL,
  `SIZ` int(255) DEFAULT NULL,
  `DIL` varchar(255) COLLATE utf8_turkish_ci DEFAULT 'TR',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;";
mysql_query( $sql, $conn );
echo '<font style="color:#A80812; ">'.table_prefix."param</font> tablosu olusturuldu...<br />";


$sql = "DROP TABLE IF EXISTS `".table_prefix."param_detay`;";
mysql_query( $sql, $conn );

$sql = "
CREATE TABLE IF NOT EXISTS `".table_prefix."param_detay` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PARAM_TIP_ID` int(11) NOT NULL,
  `PARAM_ADI` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `PARAM_UZUN_ADI` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `PARAM_DEGER` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `PARAM_ACIKLAMA` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `SIRA` smallint(6) DEFAULT '0',
  `DURUM` smallint(6) DEFAULT '1',
  `ADMIN_ID` int(255) DEFAULT NULL,
  `OLUS_TARIHI` date DEFAULT NULL,
  `OLUS_SAATI` time DEFAULT NULL,
  `DEG_TARIHI` date DEFAULT NULL,
  `DEG_SAATI` time DEFAULT NULL,
  `SIZ` int(255) DEFAULT NULL,
  `DIL` varchar(255) COLLATE utf8_turkish_ci DEFAULT 'TR',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;";
mysql_query( $sql, $conn );
echo '<font style="color:#A80812; ">'.table_prefix."param_detay</font> tablosu olusturuldu...<br />";

$sql = "DROP TABLE IF EXISTS `".table_prefix."sayfalar`;";
mysql_query( $sql, $conn );

$sql = "
CREATE TABLE IF NOT EXISTS `".table_prefix."sayfalar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SAYFA_ADI` varchar(48) COLLATE utf8_turkish_ci DEFAULT NULL,
  `SAYFA_BASLIGI` varchar(128) COLLATE utf8_turkish_ci DEFAULT NULL,
  `SAYFA_LINKI` varchar(128) COLLATE utf8_turkish_ci DEFAULT NULL,
  `SAYFA_TASLAGI` varchar(128) COLLATE utf8_turkish_ci DEFAULT NULL,
  `SAYFA_IKONU` varchar(128) COLLATE utf8_turkish_ci DEFAULT NULL,
  `SAYFA_TARGET` varchar(16) COLLATE utf8_turkish_ci DEFAULT NULL,
  `MENUDE_GOSTER` smallint(6) DEFAULT '0',
  `SAYFA_YERLESIMI` smallint(1) DEFAULT '1',
  `SADECE_UYE` smallint(6) DEFAULT '0',
  `YORUM_ACIK` smallint(6) DEFAULT '0',
  `ARAMAYA_DAHIL` smallint(1) DEFAULT '0',
  `AKTIF_LINK_KUTULARI` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `SIRA` int(11) DEFAULT '0',
  `UST_MENUDE_GOSTER` varchar(1) COLLATE utf8_turkish_ci DEFAULT '0',
  `ALT_MENUDE_GOSTER` varchar(1) COLLATE utf8_turkish_ci DEFAULT '0',
  `DURUM` varchar(1) CHARACTER SET utf8 DEFAULT '0',
  `ADMIN_ID` int(11) DEFAULT NULL,
  `OLUS_TARIHI` date DEFAULT NULL,
  `OLUS_SAATI` time DEFAULT NULL,
  `DEG_TARIHI` date DEFAULT NULL,
  `DEG_SAATI` time DEFAULT NULL,
  `SIZ` int(11) DEFAULT NULL,
  `DIL` varchar(2) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'TR',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=30 ;";
mysql_query( $sql, $conn );
echo '<font style="color:#A80812; ">'.table_prefix."sayfalar</font> tablosu olusturuldu...<br />";


mysql_query("INSERT INTO `".table_prefix."sayfalar` (`ID`, `SAYFA_ADI`, `SAYFA_BASLIGI`, `SAYFA_LINKI`, `SAYFA_TASLAGI`, `SAYFA_IKONU`, `SAYFA_TARGET`, `MENUDE_GOSTER`, `SAYFA_YERLESIMI`, `SADECE_UYE`, `YORUM_ACIK`, `ARAMAYA_DAHIL`, `AKTIF_LINK_KUTULARI`, `SIRA`, `UST_MENUDE_GOSTER`, `ALT_MENUDE_GOSTER`, `DURUM`, `ADMIN_ID`, `OLUS_TARIHI`, `OLUS_SAATI`, `DEG_TARIHI`, `DEG_SAATI`, `SIZ`, `DIL`) VALUES
(1, 'Anasayfa', 'Anasayfa', 'index.php', 'anasayfa.tpl', '', '_SELF', NULL, 2, 0, 1, 1, '21_23_28_26_19_16_31_18_17_25_24_20', 1, '1', '1', '1', 6, NULL, NULL, '2010-08-08', '10:01:04', 1281268864, 'TR'),
(2, 'Hakk�m�zda', 'Hakk�m�zda', 'hakkimizda.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 1, 1, '21_23_19_25', 2, '0', '1', '1', 6, NULL, NULL, '2010-02-07', '23:39:33', 1265614773, 'TR'),
(3, 'Referanslar�m�z', '".$sitename." Altyap�s�n� Tercih Edenler', 'referanslarimiz.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 0, 1, '21_23_19_18_25_20', 3, '1', '1', '1', 6, NULL, NULL, '2009-10-25', '19:18:20', 1256491100, 'TR'),
(4, '�leti�im', '�leti�im', 'iletisim.php', 'iletisim.tpl', '', '_SELF', 1, 1, 0, 0, 1, '', 4, '1', '1', '1', 6, NULL, NULL, '2009-10-25', '19:54:35', 1256493275, 'TR'),
(5, 'Haberler', 'Haberler', 'haberler.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 0, 0, '21_23_19_18_25_20', 5, '0', '1', '1', 6, NULL, NULL, '2010-02-07', '23:28:21', 1265614101, 'TR'),
(11, 'Projelerimiz', 'Projelerimiz', 'projelerimiz.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 1, 1, '21_23_19_18_25_20', 6, '1', '1', '1', 6, NULL, NULL, '2009-10-25', '19:56:08', 1256493368, 'TR'),
(12, '�nsan Kaynaklar�', '�nsan Kaynaklar�', 'insankaynaklari.php', 'insan_kaynaklari.tpl', '', '_SELF', 1, 1, 0, 0, 0, '', 7, '1', '1', '1', 6, NULL, NULL, '2009-10-25', '19:57:19', 1256493439, 'TR'),
(13, 'Gizlilik Politikas�', 'Gizlilik Politikas�', 'gizlilik.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 0, 1, '21_23_28_19_18_25_24_20', 8, '0', '1', '1', 6, NULL, NULL, '2010-02-07', '23:28:57', 1265614137, 'TR'),
(14, 'Genel Bildirimler', 'Genel Bildirimler', 'genelkullanim.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 0, 1, '21_23_28_19_18_25_24_20', 9, '0', '1', '1', 6, NULL, NULL, '2010-02-07', '23:29:03', 1265614143, 'TR'),
(16, '�ye Ol', '�ye Ol', 'uyeol.php', 'uyeol.tpl', '', '_SELF', 1, 1, 0, 0, 0, '19_16_18_17_20', 10, '1', '1', '1', 6, '2009-01-10', '16:26:20', '2010-01-24', '21:38:07', 1264361887, 'TR'),
(17, '�yelik S�zle�mesi', '�yelik S�zle�mesi', 'uyelik_sozlesmesi.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 0, 0, '19_16_18_17_20', 9, '0', '1', '1', 6, '2009-01-10', '16:51:52', '2010-02-07', '23:27:53', 1265614073, 'TR'),
(18, 'Linkler', 'Linkler', 'linkler.php', 'taslak_sayfa.tpl', '', '_SELF', 1, NULL, 0, 1, 0, '21_23_19_18_25_20', 11, '0', '1', '1', 6, '2009-03-04', '01:23:25', '2010-02-07', '23:31:38', 1265614298, 'TR'),
(19, 'Yard�m', 'Yard�m', 'yardim.php', 'yardim.tpl', '', '_SELF', 1, NULL, 0, 1, 1, '', 21, '1', '1', '1', 6, '2009-03-04', '01:29:15', '2009-10-25', '20:02:15', 1256493735, 'TR'),
(20, 'Yap�lacaklar', 'Yap�lacaklar Listesi', 'yapilacaklar.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 1, 1, '21_23_19_18_25_24_20', 15, '0', '1', '1', 6, '2009-03-04', '01:50:02', '2010-02-07', '23:29:18', 1265614158, 'TR'),
(21, 'Arama', 'Arama', 'arama.php', 'arama.tpl', '', '_SELF', 1, NULL, 0, 0, 0, '', 13, '0', '1', '1', 6, '2009-03-07', '15:01:28', '2010-02-07', '23:31:30', 1265614290, 'TR'),
(22, 'e-B�lten', 'e-B�lten', 'ebulten.php', 'ebulten.tpl', '', '_SELF', 0, NULL, 0, 0, 0, NULL, 16, '0', '1', '1', 6, '2009-03-07', '23:57:30', '2010-02-07', '23:29:25', 1265614165, 'TR'),
(23, '�ndir', '�ndir', 'indir.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 1, 1, '21_23_28_19_18_25_24_20', 17, '1', '1', '1', 6, '2009-04-01', '02:02:42', '2009-10-25', '20:00:39', 1256493639, 'TR'),
(24, 'Forum', 'Forum', 'forum.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 1, 1, '21_23_28_19_18_25_24_20', 18, '0', '1', '1', 6, '2009-04-01', '02:04:35', '2010-02-07', '23:29:37', 1265614177, 'TR'),
(25, 'D�k�mantasyon', 'D�k�mantasyon', 'dokumantasyon.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 1, 1, '21_23_28_19_18_25_24_20', 19, '1', '1', '1', 6, '2009-04-01', '02:06:02', '2009-10-25', '20:01:26', 1256493686, 'TR'),
(26, 'G�n�ll�', 'G�n�ll� Ol', 'gonullu.php', 'taslak_sayfa.tpl', '', '_SELF', 1, NULL, 0, 1, 1, '21_23_28_19_18_25_24_20', 20, '0', '1', '1', 6, '2009-04-01', '02:07:31', '2010-02-07', '23:32:08', 1265614328, 'TR'),
(27, 'Kategoriler', 'Kategoriler', 'kategoriler.php', 'kategoriler.tpl', '', '_SELF', NULL, 1, 0, 1, 1, '21_23_28_26_19_18_25_24_20', 2, '0', '1', '1', 6, '2009-04-03', '05:13:11', '2010-03-28', '10:24:53', 1269779093, 'TR'),
(28, 'Foto Galeri', 'Foto Galeri', 'foto_galeri.php', 'taslak_foto_galeri.tpl', '', '_SELF', 0, 1, 0, 1, 1, '', 22, '0', '1', '0', 6, '2009-10-25', '20:05:53', '2010-02-07', '23:31:58', 1265614318, 'TR'),
(29, 'Servis', 'Servis/Destek', 'servis.php', 'taslak_sayfa.tpl', '', '_SELF', NULL, NULL, 0, 0, 1, '19_16_18_17_20', 23, '1', '0', '0', 6, '2010-02-14', '04:18:52', '2010-07-10', '10:07:52', 1278763672, 'TR')",$conn);

echo table_prefix."sayfalar tablosuna &ouml;rnek veriler eklendi...<br />";

$sql = "DROP TABLE IF EXISTS `".table_prefix."sayfalar_icerik`;";
mysql_query( $sql, $conn );

$sql = "
CREATE TABLE IF NOT EXISTS `".table_prefix."sayfalar_icerik` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PARENT` int(11) DEFAULT NULL,
  `SAYFA_ADI` varchar(64) COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
  `BASLIK` varchar(128) COLLATE utf8_turkish_ci DEFAULT NULL,
  `THUMBNAIL` varchar(128) COLLATE utf8_turkish_ci DEFAULT NULL,
  `KISA_OZET` mediumtext COLLATE utf8_turkish_ci,
  `ICERIK` mediumtext COLLATE utf8_turkish_ci,
  `ADMIN_ID` smallint(3) DEFAULT NULL,
  `OLUS_TARIHI` datetime DEFAULT NULL,
  `OLUS_SAATI` time DEFAULT NULL,
  `DEGISME_TARIHI` datetime DEFAULT NULL,
  `DURUM` enum('1','0') COLLATE utf8_turkish_ci DEFAULT '1',
  `SIRA` int(11) DEFAULT '0',
  `DEG_TARIHI` date DEFAULT NULL,
  `DEG_SAATI` time DEFAULT NULL,
  `SIZ` int(11) DEFAULT NULL,
  `DIL` varchar(2) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'TR',
  PRIMARY KEY (`ID`),
  KEY `SAYFA_ADI` (`SAYFA_ADI`),
  FULLTEXT KEY `INDX_ARAMA` (`BASLIK`,`KISA_OZET`,`ICERIK`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=358 ;";
mysql_query( $sql, $conn );
echo '<font style="color:#A80812; ">'.table_prefix."sayfalar_icerik</font> tablosu olusturuldu...<br />";


mysql_query("INSERT INTO `".table_prefix."sayfalar_icerik` (`ID`, `PARENT`, `SAYFA_ADI`, `BASLIK`, `THUMBNAIL`, `KISA_OZET`, `ICERIK`, `ADMIN_ID`, `OLUS_TARIHI`, `OLUS_SAATI`, `DEGISME_TARIHI`, `DURUM`, `SIRA`, `DEG_TARIHI`, `DEG_SAATI`, `SIZ`, `DIL`) VALUES
(114, 0, 'Gizlilik Politikas�', 'G�ZL�L�K POL�T�KASI', NULL, '', '<p>".$sitename." olarak, temel amac�m�z &uuml;lkemiz internet kullan�m�na &ldquo;daha fazla a&ccedil;�k kaynak kodlu proje&rdquo; felsefesi profesyonel ve kaliteli hizmetler sunakt�r. BU felsefemize ula��rken ki�isel hak ve &ouml;zg&uuml;rl&uuml;klere, insan onuruna yak���r bir �ekilde davranmak temel ilkemizdir. Bu y&uuml;zden&nbsp; kay�tl� kullan�c�lar�m�za daha g&uuml;venli bir internet ortam� sa�lamay� ilke edindik. Bu sebepten dolay�, &uuml;yelerimizin kendilerini daha rahat hissetmeleri i&ccedil;in onlara &ccedil;e�itli gizlilik haklar� tan�d�k. <br />\r\n<br />\r\n".$sitename." &uuml;yelerinin sahip olduklar� bu haklar, a�a��daki gibidir:</p>\r\n<ul>\r\n    <li>Elektronik posta adresiniz, Kullan�c� S&ouml;zle�mesi''nde tan�mlanan haller haricinde, hi&ccedil;bir gerek&ccedil;e ile ba�ka kurulu�lara da��t�lmayacak ve reklam, tan�t�m, pazarlama yapmak amac�yla kullan�lmayacakt�r.</li>\r\n    <li>".$sitename."&rsquo;a verdi�iniz &uuml;yelik bilgileri ve ki�isel bilgiler, onay�n�z d���nda, Kullan�c� S&ouml;zle�mesi''nde tan�mlanan haller haricinde, di�er &uuml;yelere ve &uuml;&ccedil;&uuml;nc&uuml; ki�ilere a&ccedil;�lmayacakt�r. Ancak bu bilgiler, ".$sitename." sitesinin kendi b&uuml;nyesinde, m&uuml;�teri profili belirlemek ve istatistiksel &ccedil;al��malar yapmak amac�yla kullan�labilecektir.</li>\r\n    <li>Sisteme girdi�iniz t&uuml;m bilgilere, ".$sitename." d���nda sadece siz ula�abilir ve bunlar� sadece siz de�i�tirebilirsiniz. Bir ba�ka &uuml;yenin veya Kullan�c�''n�n, sizinle ilgili bilgilere ula�mas� ve bunlar� de�i�tirmesi m&uuml;mk&uuml;n de�ildir.</li>\r\n    <li>Kay�t esnas�nda sizden istenen ki�isel bilgilerden, zorunlu olanlar hari&ccedil;, istediklerinizi kendi inisiyatifiniz dahilinde ".$sitename."&rsquo;a bildirebilirsiniz. ".$sitename."&rsquo;a vermeyi tercih etmeyece�iniz bilgiler varsa, bu alanlar� doldurmak veya i�aretlemek zorunda de�ilsiniz.</li>\r\n    <li>".$sitename." &uuml;yelerin sisteme giri� i&ccedil;in kulland�klar� bilgisayara &ccedil;erez b�rakabilir. &Ccedil;erez ve i&ccedil;ersindeki bilgiler yaln�zca &uuml;yenin ilerki geli�lerinde hat�rlanmas� ve ona uygun i&ccedil;erik sunulmas� i&ccedil;in kullan�l�r.<br />\r\n    &nbsp;</li>\r\n</ul>\r\n<p>&nbsp;</p>', 6, '2009-04-01 00:00:00', '23:49:26', NULL, '1', 0, '2009-10-25', '19:57:44', 1256493464, 'TR'),
(103, 0, 'Yap�lacaklar', 'Yap�lacaklar..', NULL, '0', '<ul>\r\n    <li>arama\r\n    <ul>\r\n        <li>h�zl� arama kutusu +</li>\r\n        <li>detayl� arama +</li>\r\n        <li>sonu&ccedil; +</li>\r\n    </ul>\r\n    </li>\r\n    <li>T&uuml;m sayfalarda kullan�labilinecek NAVIGATOR\r\n    <ul>\r\n        <li>adminden sayfada listelenecek olan ba�l�k adedi ayarlanabilinecek</li>\r\n        <li>adminden sayfada navigator kullan�p kullanmama iste�e ba�l� olacak</li>\r\n    </ul>\r\n    </li>\r\n    <li>e-B&uuml;lten sayfas� yap�lacak +</li>\r\n    <li>&Uuml;ye Sayfalar�\r\n    <ul>\r\n        <li>&uuml;ye olurken capcha konulacak</li>\r\n        <li>&uuml;ye bilgilerini g&uuml;ncelleme</li>\r\n        <li>�ifre g&uuml;ncelleme</li>\r\n        <li>aktivasyon kodu g&ouml;nderme/onaylama</li>\r\n    </ul>\r\n    </li>\r\n    <li>Yard�m Sayfas� +\r\n    <ul>\r\n        <li>Sol panel &ouml;zel olarak yap�lacak +</li>\r\n        <li>Arama yine &ouml;zel olacak +</li>\r\n    </ul>\r\n    </li>\r\n    <li>Anket\r\n    <ul>\r\n        <li>Anket olu�turma</li>\r\n        <li>Sonu&ccedil;lar</li>\r\n    </ul>\r\n    </li>\r\n    <li>Forum</li>\r\n    <li>Her sayfan�n i&ccedil;inde alt linklerini &ouml;zet olarak kutuda toplama</li>\r\n    <li>Admin den sayfalara dosya attach edebilme</li>\r\n</ul>', 6, '2009-03-05 00:00:00', '04:53:49', NULL, '1', 0, '2009-10-25', '20:00:10', 1256493610, 'TR'),
(357, 0, 'Anasayfa', ' ', NULL, ' ', '<p>".$sitename." un kurulu� amac� kendine yada �irketine web sitesi yapmak isteyen fakat bu konuda zorlanan kullan�c�lara basit ve ihtiya&ccedil;lar�n� t&uuml;m&uuml;yle kar��layabilecekleri tamamen t&uuml;rk&ccedil;e bir portal haz�rlamakt�r. Bu fikir ki�isel ihtiya&ccedil;tan da ortaya &ccedil;�km��t�r diyebiliriz. Ki�isel olarak bende kendime site yaparken ba�kalar�n�n yapt���, ki bunlar�n &ccedil;o�u yapanc� portallar(CMS), &uuml;cretsiz site yapma ara&ccedil;lar�n� denedim, fakat yaz�l�m d&uuml;nyas�n�n i&ccedil;inde olmama ra�men hi&ccedil; biri i&ccedil;ime sinmiyordu, hele baz�lar�n� anlamak i&ccedil;in, t&uuml;rk&ccedil;ele�tirmek i&ccedil;in &ccedil;ok fazla u�ra��yordum. Bunun bu kadar zor olmamas� gerekiyor.</p>\r\n<p>Talep: &quot;T&uuml;rk&ccedil;e site yapmak istiyorum, ama &uuml;cretsiz, ama problemsiz, ama h�zl�, ama anla��l�r, ama kullanmak i&ccedil;in alim olmaya gerek olmas�n, hatta bende yaz�l�mdan biraz anlar�m basit&ccedil;e kendi kodlar�m�da yaz�p siteyi geli�tirebileyim, tasar�mc�m var yaz�l�mdan &nbsp;anlamaz o bile yaps�n tasar�m�n� siteye giydirsin, hatta bayrama, y�lba��na &ouml;zel site tasar�m�m olsun kolayca tek t&uuml;�la sitenin g&ouml;r&uuml;n&uuml;m&uuml;n&uuml; de�i�tirebileyim ?&quot;</p>\r\n<p>Yukardaki talepleri kar��lamaya &ccedil;al��t�m, ad�nada&nbsp; ".$sitename." dedim..</p>\r\n<p>".$sitename." kullanmay� d&uuml;�&uuml;nen ki�i/�irketlere bir k&uuml;&ccedil;&uuml;k tavsiyemiz var: ".$sitename."''u indirin, kurun ve bir tasar�mc�ya gidin buna g&uuml;zel bir tasar�m istiyorum deyin. Bu �ekilde profesyonel bir web siteniz/portal�n�z olacakt�r. </p>\r\n<p>Ger&ccedil;ekten amac�m�z bi�eyler &uuml;reten, &uuml;retmek isteyen, katma de�er sa�layan, istihdam sa�layan ki�ilerin/�irketlerin i�lerini, fikirlerini geli�tirmelerine yard�mc� olmak, internette de varolmalar�na yard�mc� olabilmek.</p>\r\n<p>Bir di�er amac�m�z da T&uuml;rkiye''de internetin geli�mesine katk�da bulunmak, bunu yaparken de piyasaya bir standard�n yerle�mesine katk�da bulunabilirsek &ccedil;ok mutlu olaca��z.&nbsp;</p>\r\n<p>Rasim �EN<br />\r\n".$sitename."&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><br />\r\n&nbsp;</p>', 6, '2010-05-20 00:00:00', '22:41:41', NULL, '1', 0, '2010-07-11', '07:28:06', 1278858486, 'TR'),
(93, 0, 'Hakk�m�zda', '".$sitename." Hakk�m�zda..', NULL, '".$sitename." �lkemizde t�rk�e olarak yeterli �l��de kolay, kullan��l�, t�rk�e d�k�man� olan site haz�rlama arac� olmamas�ndan dolay� bir ihtiya� olarak geli�tirilmi� olup tamemen T�rk�e dir.', '<p><img height=\"365\" border=\"3\" width=\"350\" src=\"/taslaksite_mm_icerik/image034.jpg\" alt=\"\" /></p>', 6, '2008-11-08 00:00:00', '17:37:26', NULL, '1', 0, '2009-10-25', '19:17:38', 1256491058, 'TR'),
(95, 94, 'Hakk�m�zda', 'alt alt 1', 'sTh_491605b35fa177.jpg', 'dfsaf dsf\r\nfdsf', '', 1, '2008-11-08 00:00:00', '18:33:39', NULL, '1', 0, '2009-10-25', '19:17:38', 1256491058, 'TR'),
(96, 0, 'Haberler', '".$sitename." �ok yak�nda a��l�yor..', NULL, '".$sitename." �ok yak�nda beta s�r�m�n� sizlerle payla�maya haz�r olacak..\r\n\r\nbizi takip edin..', '', 6, '2009-02-22 00:00:00', '01:04:18', NULL, '1', 0, '2009-10-25', '19:55:14', 1256493314, 'TR'),
(97, 0, '�leti�im', '�leti�im', NULL, '', '', 6, '2009-03-04 00:00:00', '00:50:27', NULL, '1', 0, '2009-10-25', '19:54:36', 1256493276, 'TR'),
(98, 0, 'Yard�m', 'Yard�m', NULL, '', '', 6, '2009-03-04 00:00:00', '01:29:53', NULL, '1', 0, '2009-10-25', '20:02:15', 1256493735, 'TR'),
(99, 0, 'Referanslar�m�z', '".$sitename." Altyap�s�n� Tercih Edenler', NULL, '', '', 6, '2009-03-04 00:00:00', '01:30:49', NULL, '1', 0, '2009-10-25', '19:18:21', 1256491101, 'TR'),
(100, 0, '�nsan Kaynaklar�', '�nsan Kaynaklar�', NULL, '', '', 6, '2009-03-04 00:00:00', '01:31:14', NULL, '1', 0, '2009-10-25', '19:57:20', 1256493440, 'TR'),
(101, 0, 'Projelerimiz', 'Projelerimiz', NULL, '', '', 6, '2009-03-04 00:00:00', '01:32:56', NULL, '1', 0, '2009-10-25', '19:56:08', 1256493368, 'TR'),
(102, 20, 'Yap�lacaklar', 'Yap�lacaklar..', NULL, '0', '<ul>\r\n    <li>arama <br /></li>\r\n    <ul>\r\n        <li>h�zl� arama kutusu</li>\r\n        <li>detayl� arama</li>\r\n        <li>sonu&ccedil;</li>\r\n    </ul>\r\n    <li>T&uuml;m sayfalarda kullan�labilinecek NAVIGATOR</li>\r\n    <ul>\r\n        <li>adminden sayfada listelenecek olan ba�l�k adedi ayarlanabilinecek</li>\r\n        <li>adminden sayfada navigator kullan�p kullanmama iste�e ba�l� olacak</li>\r\n    </ul>\r\n    <li>e-B&uuml;lten sayfas� yap�lacak</li>\r\n    <li>&Uuml;ye Sayfalar�</li>\r\n    <ul>\r\n        <li>&uuml;ye olurken capcha konulacak</li>\r\n        <li>&uuml;ye bilgilerini g&uuml;ncelleme</li>\r\n        <li>�ifre g&uuml;ncelleme</li>\r\n        <li>aktivasyon kodu g&ouml;nderme/onaylama</li>\r\n    </ul>\r\n    <li>Yard�m Sayfas�</li>\r\n    <ul>\r\n        <li>Sol panel &ouml;zel olarak yap�lacak</li>\r\n        <li>Arama yine &ouml;zel olacak</li>\r\n    </ul>\r\n    <li>Anket</li>\r\n    <ul>\r\n        <li>Anket olu�turma</li>\r\n        <li>Sonu&ccedil;lar</li>\r\n    </ul>\r\n    <li>Forum</li>\r\n    <li>&nbsp;</li>\r\n</ul>', 6, '2009-03-05 00:00:00', '03:57:48', NULL, '0', 0, '2009-10-25', '20:00:10', 1256493610, 'TR'),
(104, 2, 'Hakk�m�zda', 'Vizyonumuz', NULL, '".$sitename." olarak vizyonumuz, �lkemizin internet d�nyas�na ilgi duyan t�m kesimleri(��renciler, ��retmenler, i� adamlar�, y�neticiler, i�ciler, memurlar, en han�mlar�, yetenekli, zanaatkar insanlar ..) i�in basit, kullan�m� kolay, dili t�rk�e, deste�i t�rk�e olan profesyonel bir web altyap�s�n� �cretsiz �lkemiz insan�n�n kullan�m�na sunmak.', '', 6, '2009-03-07 00:00:00', '15:45:51', '2007-03-09 04:02:55', '1', 0, '2009-10-25', '19:17:38', 1256491058, 'TR'),
(105, 2, 'Hakk�m�zda', 'Misyonumuz', NULL, '<ul>\r\n    <li>Basit ve kullan��l� bir site i&ccedil;in gereken altyap�y� kurmak</li>\r\n    <li>Geli�en ve de�i�ien web d&uuml;nyas� i&ccedil;in s&uuml;rekli g&uuml;ncel kalmak</li>\r\n    <li>&Uuml;lkemizin web d&uuml;nyas�n�n geli�mesine katk�da bulunmak amac�yla\r\n    <ul>\r\n        <li>Kodlar� a&ccedil;�k kaynak hale getirmek</li>\r\n        <li>".$sitename." ile bir portal nas�l yap�l�r ad� alt�nda seminer ve e�itimler vermek</li>\r\n        <li>�nteraktif tart��ma ortam� olu�turmak</li>\r\n    </ul>\r\n    ..', '<ul>\r\n    <li>Basit ve kullan��l� bir site i&ccedil;in gereken altyap�y� kurmak</li>\r\n    <li>Geli�en ve de�i�ien web d&uuml;nyas� i&ccedil;in s&uuml;rekli g&uuml;ncel kalmak</li>\r\n    <li>&Uuml;lkemizin web d&uuml;nyas�n�n geli�mesine katk�da bulunmak amac�yla\r\n    <ul>\r\n        <li>Kodlar� a&ccedil;�k kaynak hale getirmek</li>\r\n        <li>".$sitename." ile bir portal nas�l yap�l�r ad� alt�nda seminer ve e�itimler vermek</li>\r\n        <li>�nteraktif tart��ma ortam� olu�turmak</li>\r\n        <li>".$sitename." u ortak geli�tirmeye a&ccedil;mak ve bu sayade &uuml;lkemizin web yaz�l�mc�lar�n�n tecr&uuml;be ve deneyimlerini payla�malar�n� sa�lamak</li>\r\n    </ul>\r\n    </li>\r\n    <li>Olu�an site hatalar�n� en k�sa zamanda &ccedil;&ouml;zmek</li>\r\n</ul>\r\n<p>bunun i&ccedil;in sizlerden istedi�imiz tek �ey s&uuml;rekli destek ve geribildirimlerdir.</p>\r\n<p>Sayg�lar</p>\r\n<p>".$sitename." Tak�m�</p>', 6, '2009-03-07 00:00:00', '16:01:47', '2007-03-09 04:02:55', '1', 1, '2009-10-25', '19:17:38', 1256491058, 'TR'),
(106, 19, 'Yard�m', '".$sitename." Giri�', NULL, '', '', 6, '2009-03-08 00:00:00', '03:02:31', NULL, '1', 0, '2009-10-25', '20:02:15', 1256493735, 'TR'),
(107, 19, 'Yard�m', '".$sitename." Kurulum', NULL, '', '', 6, '2009-03-08 00:00:00', '03:04:57', NULL, '1', 0, '2009-10-25', '20:02:15', 1256493735, 'TR'),
(108, 19, 'Yard�m', '".$sitename." Y�netim', NULL, '', '', 6, '2009-03-08 00:00:00', '03:05:30', NULL, '1', 0, '2009-10-25', '20:02:15', 1256493735, 'TR'),
(109, 19, 'Yard�m', '".$sitename." G�ncelleme', NULL, '', '', 6, '2009-03-08 00:00:00', '03:06:15', NULL, '1', 0, '2009-10-25', '20:02:15', 1256493735, 'TR'),
(110, 19, 'Yard�m', '".$sitename." G�venlik Performans', NULL, '', '', 6, '2009-03-08 00:00:00', '03:06:45', NULL, '1', 0, '2009-10-25', '20:02:15', 1256493735, 'TR'),
(111, 19, 'Yard�m', '".$sitename." Kullan�m Klavuzu', NULL, '', '', 6, '2009-03-08 00:00:00', '03:08:22', NULL, '1', 0, '2009-10-25', '20:02:15', 1256493735, 'TR'),
(112, 106, 'Yard�m', 'Ama�', NULL, '', '', 6, '2009-03-08 00:00:00', '03:50:06', NULL, '1', 0, '2009-10-25', '20:02:15', 1256493735, 'TR'),
(113, 106, 'Yard�m', '".$sitename." Hakk�nda', NULL, '', '', 6, '2009-03-08 00:00:00', '03:50:50', NULL, '1', 0, '2009-10-25', '20:02:15', 1256493735, 'TR'),
(115, 0, 'Genel Bildirimler', 'GENEL B�LD�R�MLER', NULL, '', '<p>".$sitename." ticari ama&ccedil;l� bir yaz�l�m de�ildir. &Uuml;lkemiz internet ortam�n�n geli�mesine ve ki�i/�irket lerin ihtiya&ccedil; duydu�u internet &ccedil;&ouml;z&uuml;mlerine profesyonel ve &uuml;cretsiz olarak hizmet ve destek vermeyi ilke edinmi�tir. Bu y&uuml;zden portal�m�z�n kullan�c�lar�n�ndan temel olarak beklentimiz bencil olmamalar� ve m&uuml;mk&uuml;n oldu�unca payla��mc� olmalar�.</p>\r\n<p>Bunlar�n d���nda</p>\r\n<ul>\r\n    <li>Portal dahilinde &Uuml;lkemizin Kanunlar�na(T&uuml;rkiye Cumhuriyeti) ayk�r� hi&ccedil; bir tutumun sergilenmemesi ki tesbit edilen ki�i/kurum lar�n portal�m�z ile il�ikisi an�nda kesilecek olup, adli kurumlar�n bilgi iste�ine kar�� t&uuml;m veritaban� g&ouml;n&uuml;l rahatl��� ile a&ccedil;�lacakt�r. </li>\r\n    <li>�nternet ortam�n�n ad�n�n sanal olmas�na kapt�r�p ayaklar� yere basmayan hal ve hareketlerden uzak durulmas�n� kullan�c�lar�m�zdan &ouml;zellikle rica ediyoruz. Bu portal� yazanda, kullananda, geli�tirende, ele�tiren de sanal de�il kanl� canl� insand�r. Kafas�n� kuma g&ouml;men deve ku� lar� unutmamal�d�r ki g&ouml;r&uuml;nen k�sm�n�z g&ouml;r&uuml;nmeyen k�sm�n�zdan &ccedil;ok fazla. L&uuml;tfen buna g&ouml;re sorumlu davranal�m.</li>\r\n    <li>Genel olarak toplumsal ahlak kurallar�m�za ayk�r� davran��, tutum sergilemeyi ilke edinip hi&ccedil; bir ".$sitename." kullan�c�s�, geli�tiricisi, destekleyicine kar�� k�r�c�, k&uuml;&ccedil;&uuml;k d&uuml;�&uuml;r&uuml;c&uuml; hal ve hareketlerde bulunulmamal�d�r.</li>\r\n</ul>\r\n<p>".$sitename." olarak genel bildirimimizin &ouml;zeti �udur: bizler yola iyi niyetle &ccedil;�kt�k, iyi �eyler sunmay� ama&ccedil; edindik. Kar�� taraftan tek beklentimiz iyi niyetleridir. Ele�tirilerilerinize muhtac�z, ve bize y&ouml;n verecektir. </p>\r\n<p>Her t&uuml;rl&uuml; &ouml;neri/istek i&ccedil;in <a href=\"http://www.taslaksite.com/iletisim.php\">ileti�im sayfas�ndan l&uuml;tfen bize yaz�n</a>.</p>\r\n<p>Sayg�lar<br />\r\n".$sitename." Tak�m�</p>', 6, '2009-04-02 00:00:00', '00:10:51', NULL, '1', 0, '2009-10-25', '19:58:12', 1256493492, 'TR'),
(116, 0, '�ndir', '�ND�R', NULL, '".$sitename." taraf�ndan geli�tirilmi� olan programlar i�in yeni versiyonlar, buglar, g�ncellemeler, eklentiler, tasar�mlar indirmek i�in ', '', 6, '2009-04-03 00:00:00', '01:56:25', NULL, '1', 0, '2009-10-25', '20:00:40', 1256493640, 'TR'),
(117, 0, 'Kategoriler', 'Kategoriler', NULL, '', '', 6, '2009-04-03 00:00:00', '05:13:48', NULL, '1', 0, '2009-10-25', '19:53:49', 1256493229, 'TR'),
(118, 0, 'Forum', 'Forum', NULL, '".$sitename." hakk�nda tart��ma platformudur.', '', 6, '2009-04-03 00:00:00', '05:16:18', NULL, '1', 0, '2009-10-25', '20:01:02', 1256493662, 'TR'),
(119, 24, 'Forum', 'Genel', NULL, '".$sitename." hakk�nda hert�rl� sorunuzu bu alana yazabilirsiniz..', '', 6, '2009-04-03 00:00:00', '05:17:21', NULL, '1', 0, '2009-10-25', '20:01:02', 1256493662, 'TR'),
(120, 24, 'Forum', '�ablonlar', NULL, '".$sitename." sitesi i�in haz�rlanm�� �ablonlar', '', 6, '2009-04-03 00:00:00', '05:21:15', NULL, '1', 0, '2009-10-25', '20:01:02', 1256493662, 'TR'),
(121, 24, 'Forum', 'EKLENT�LER', NULL, '".$sitename." i�in geli�tirilmi� olan eklentiler', '', 6, '2009-04-03 00:00:00', '05:22:02', NULL, '1', 0, '2009-10-25', '20:01:02', 1256493662, 'TR'),
(122, 24, 'Forum', 'BUG ve G�NCELLEMELER', NULL, '".$sitename." i�in ortaya ��kan Bug lar ve g�ncellemeler..', '', 6, '2009-04-03 00:00:00', '05:24:14', NULL, '1', 0, '2009-10-25', '20:01:02', 1256493662, 'TR'),
(123, 0, 'D�k�mantasyon', 'D�k�mantasyon', NULL, '".$sitename." ile ilgili detayl� d�k�mantasyon', '', 6, '2009-04-03 00:00:00', '05:27:06', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(124, 25, 'D�k�mantasyon', 'Telif Hakk�', NULL, '', '<p>K�saca A&ccedil;�k Kaynak Kod felsefesine inanm�� herkes als�n kullans�n, geli�tirsin, para kazans�n, i�lerini kolayla�t�rs�n bize yeter <img src=\"http://www.taslaksite.com/sAdmin/sAraclar/gelismisHTML/editor/images/smiley/msn/wink_smile.gif\" alt=\"\" /></p>', 6, '2009-04-03 00:00:00', '05:33:41', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(125, 25, 'D�k�mantasyon', '�ns�z', NULL, '', '', 6, '2009-04-03 00:00:00', '05:34:29', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(126, 25, 'D�k�mantasyon', 'Ba�larken', NULL, '', '', 6, '2009-04-03 00:00:00', '05:37:00', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(127, 25, 'D�k�mantasyon', 'Asgari Gereksinimler', NULL, '', '', 6, '2009-04-03 00:00:00', '05:37:34', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(128, 25, 'D�k�mantasyon', 'Kurulum Rehberi', NULL, '', '', 6, '2009-04-03 00:00:00', '05:41:25', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(129, 25, 'D�k�mantasyon', 'Kullan�c� Kitapc���', NULL, '', '', 6, '2009-04-03 00:00:00', '05:42:03', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(130, 25, 'D�k�mantasyon', 'Y�netim Paneli Kitapc���', NULL, '', '', 6, '2009-04-03 00:00:00', '05:43:51', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(131, 25, 'D�k�mantasyon', '".$sitename." Kodlar�ndan De�i�tirmek �stiyorum', NULL, 'PHP ve HTML biliyorsan�z ve taslaksite.com un �uan var olan altyap�s� isteklerinize cevap vermiyorsa kendi kodlar�n�z� yazabilirsiniz. Bunun i�in �zellikle site taraf�nda altyap�s�n� basit ve mod�ler yapmaya �al��t�k ki en az kodla, h�zl� bir �ekilde geli�tirme yapabilesiniz.', '', 6, '2009-04-03 00:00:00', '05:48:47', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(132, 25, 'D�k�mantasyon', 'Resimlerle ".$sitename."', NULL, '', '', 6, '2009-04-03 00:00:00', '05:50:06', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(133, 25, 'D�k�mantasyon', 'Videolarla ".$sitename." Dersleri', NULL, '', '', 6, '2009-04-03 00:00:00', '05:50:40', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(134, 0, 'G�n�ll�', 'G�n�ll� Ol', NULL, '".$sitename." Tak�m�n�n bir �yesi olup hem bize destek olup hemde kariyerinize g�zel �eyler katmak istiyorsan�z sizleri aram�za bekliyoruz ;)\r\n\r\n�zellikle gen� arkada�lara bu konuda na�izane tavsiyemiz \"B�y�k adam olmak istiyorsan�z mutlaka bir OPEN SOURCE projede bulunun\". Bizimle yada bizsiz farketmez, a��n http://sourceforge.net i ordan ho�unuza giden bir projeye dahil olun arkada�lar.. \r\n\r\n', '', 6, '2009-04-03 00:00:00', '05:56:32', NULL, '1', 0, '2009-10-25', '20:01:52', 1256493712, 'TR'),
(135, 26, 'G�n�ll�', 'EKLENT� GEL��T�RME EK�B�', NULL, '', '', 6, '2009-04-03 00:00:00', '05:57:31', NULL, '1', 0, '2009-10-25', '20:01:52', 1256493712, 'TR'),
(136, 26, 'G�n�ll�', 'TASARIM GEL��T�RME EK�B�', NULL, '', '', 6, '2009-04-03 00:00:00', '05:57:56', NULL, '1', 0, '2009-10-25', '20:01:52', 1256493712, 'TR'),
(137, 26, 'G�n�ll�', 'PHP EK�B�', NULL, '', '', 6, '2009-04-03 00:00:00', '05:58:16', NULL, '1', 0, '2009-10-25', '20:01:52', 1256493712, 'TR'),
(138, 26, 'G�n�ll�', 'JAVASCRIPT - AJAX EK�B�', NULL, '', '', 6, '2009-04-03 00:00:00', '05:58:37', NULL, '1', 0, '2009-10-25', '20:01:52', 1256493712, 'TR'),
(139, 26, 'G�n�ll�', 'FLASH - ACTION SCRIPT EK�B�', NULL, '', '', 6, '2009-04-03 00:00:00', '05:59:07', NULL, '1', 0, '2009-10-25', '20:01:52', 1256493712, 'TR'),
(140, 26, 'G�n�ll�', '".$sitename." V�ZYON/M�SYON EK�B�', NULL, '', '', 6, '2009-04-03 00:00:00', '05:59:48', NULL, '1', 0, '2009-10-25', '20:01:52', 1256493712, 'TR'),
(356, 0, '�yelik S�zle�mesi', '', NULL, '', '<p>&Uuml;YEL�K S&Ouml;ZLE�MES�<br />\r\n<br />\r\n1. Taraflar<br />\r\n<br />\r\na) ".$sitename." internet sitesinin faaliyetlerini y&uuml;r&uuml;ten ".$sitename."&nbsp;<br />\r\n<br />\r\nb) ".$sitename." internet sitesine &uuml;ye olan internet kullan�c�s� (&quot;&Uuml;ye&quot;) <br />\r\n2. S&ouml;zle�menin Konusu<br />\r\n<br />\r\n��bu S&ouml;zle�me&rsquo;nin konusu ".$sitename." internet sitesinden ve  ".$sitename." taraf�ndan sunulan portal hizmetlerinden faydalanma �artlar�n�n belirlenmesidir. <br />\r\n&nbsp;</p>\r\n<p>3. Taraflar�n Hak ve Y&uuml;k&uuml;ml&uuml;l&uuml;kleri<br />\r\n<br />\r\n3.1. &Uuml;ye, ".$sitename." internet sitesine &uuml;ye olurken verdi�i ki�isel ve di�er sair bilgilerin kanunlar &ouml;n&uuml;nde do�ru oldu�unu, ".$sitename."''un bu bilgilerin ger&ccedil;e�e ayk�r�l��� nedeniyle u�rayaca�� t&uuml;m zararlar� aynen ve derhal tazmin edece�ini beyan ve taahh&uuml;t eder.<br />\r\n<br />\r\n3.2. &Uuml;ye,  ".$sitename." taraf�ndan kendisine verilmi� olan �ifreyi ba�ka ki�i ya da kurulu�lara veremez, &uuml;yenin s&ouml;zkonusu �ifreyi kullanma hakk� bizzat kendisine aittir. Bu sebeple do�abilecek t&uuml;m sorumluluk ile &uuml;&ccedil;&uuml;nc&uuml; ki�iler veya yetkili merciler taraf�ndan ".$sitename."''a kar�� ileri s&uuml;r&uuml;lebilecek t&uuml;m iddia ve taleplere kar��, ".$sitename."''�n s&ouml;zkonusu izinsiz kullan�mdan kaynaklanan her t&uuml;rl&uuml; tazminat ve sair talep hakk� sakl�d�r.<br />\r\n<br />\r\n&nbsp; 3.3. &Uuml;ye ".$sitename." internet sitesini ve  ".$sitename." taraf�ndan sunulan portal hizmetlerini kullan�rken yasal mevzuat h&uuml;k&uuml;mlerine riayet etmeyi ve bunlar� ihlal etmemeyi ba�tan kabul ve taahh&uuml;t eder. Aksi takdirde, do�acak t&uuml;m hukuki ve cezai y&uuml;k&uuml;ml&uuml;l&uuml;kler tamamen ve m&uuml;nhas�ran &uuml;yeyi ba�layacakt�r.<br />\r\n<br />\r\n3.4. &Uuml;ye, ".$sitename." internet sitesini ve portal hizmetlerini ve hi&ccedil;bir �ekilde kamu d&uuml;zenini bozucu, genel ahlaka ayk�r�, ba�kalar�n� rahats�z ve taciz edici �ekilde, yasalara ayk�r� bir ama&ccedil; i&ccedil;in, ba�kalar�n�n fikri ve telif haklar�na tecav&uuml;z edecek �ekilde kullanamaz. Ayr�ca, &uuml;ye ba�kalar�n�n hizmetleri kullanmas�n� &ouml;nleyici veya zorla�t�r�c� faaliyet (spam, virus, truva at�, vb.) ve i�lemlerde bulunamaz.<br />\r\n<br />\r\n3.5. ".$sitename." internet sitesinde &uuml;yeler taraf�ndan beyan edilen, yaz�lan, kullan�lan fikir ve d&uuml;�&uuml;nceler, tamamen &uuml;yelerin kendi ki�isel g&ouml;r&uuml;�leridir ve g&ouml;r&uuml;� sahibini ba�lar. Bu g&ouml;r&uuml;� ve d&uuml;�&uuml;ncelerin ".$sitename."''la hi&ccedil;bir ilgi ve ba�lant�s� yoktur. ".$sitename."''un &uuml;yenin beyan edece�i fikir ve g&ouml;r&uuml;�ler nedeniyle &uuml;&ccedil;&uuml;nc&uuml; ki�ilerin u�rayabilece�i zararlardan ve hizmetlerin kullan�m� esnas�nda M&uuml;�teri''nin u�rayabilece�i &uuml;&ccedil;&uuml;nc&uuml; ki�ilerin fiil ve hareketlerinden do�abilecek zararlardan dolay� herhangi bir sorumlulu�u bulunmamaktad�r.<br />\r\n<br />\r\n3.6. ".$sitename.", &uuml;ye verilerinin yetkisiz ki�ilerce okunmas�ndan ve &uuml;ye yaz�l�m ve verilerine gelebilecek zararlardan dolay� sorumlu olmayacakt�r. &Uuml;ye, ".$sitename." internet sitesinin ve portal hizmetlerinin kullan�lmas�ndan dolay� u�rayabilece�i herhangi bir zarar y&uuml;z&uuml;nden ".$sitename."''dan tazminat talep etmemeyi pe�inen kabul etmi�tir.<br />\r\n<br />\r\n3.7. &Uuml;ye, di�er internet kullan�c�lar�n�n yaz�l�mlar�na ve verilerine izinsiz olarak ula�mamay� veya bunlar� kullanmamay� kabul etmi�tir. Aksi takdirde, bundan do�acak hukuki ve cezai sorumluluklar tamamen &uuml;yeye aittir.<br />\r\n<br />\r\n3.8. ��bu &uuml;yelik s&ouml;zle�mesi i&ccedil;erisinde say�lan maddelerden bir ya da birka&ccedil;�n� ihlal eden &uuml;ye i�bu ihlal nedeniyle cezai ve hukuki olarak �ahsen sorumlu olup, ".$sitename."''u bu ihlallerin hukuki ve cezai sonu&ccedil;lar�ndan ari tutacakt�r. Ayr�ca; i�bu ihlal nedeniyle, olay�n hukuk alan�na intikal ettirilmesi halinde, ".$sitename."''�n &uuml;yeye kar�� &uuml;yelik s&ouml;zle�mesinee uyulmamas�ndan dolay� tazminat talebinde bulunma hakk� sakl�d�r.<br />\r\n<br />\r\n3.9.  ".$sitename."''un her zaman tek tarafl� olarak gerekti�inde &uuml;yenin &uuml;yeli�ini silme, m&uuml;�teriye ait dosya, belge ve bilgileri silme hakk� vard�r. &Uuml;ye i�bu tasarrufu &ouml;nceden kabul eder. Bu durumda, ".$sitename."''un hi&ccedil;bir sorumlulu�u yoktur.&nbsp;<br />\r\n<br />\r\n3.10. ".$sitename." internet sitesinde yer alan her t&uuml;rl&uuml; bilginin do�rulu�u, eksiksiz olmas�, yeterlili�i ve g&uuml;ncelli�i hi&ccedil;bir surette  ".$sitename." taraf�ndan garanti ve taahh&uuml;t edilmemektedir.Kullan�c� hi&ccedil;bir �ekilde web sitesi''nde yer alan bilgilerin ve/veya portal hizmetlerinin hatal� oldu�u yada bu bilgilere istinaden zarara u�rad��� iddias�nda bulunamaz.  ".$sitename." hi&ccedil;bir �ekil ve surette &ouml;n ihbara ve/veya ihtara gerek kalmaks�z�n her zaman s&ouml;z konusu bilgileri ve/veya portal hizmetlerini de�i�tirebilir, d&uuml;zeltebilir ve/veya &ccedil;�karabilir.  ".$sitename." web sitesi''nin ve portal hizmetlerinin hatas�z olmas� i&ccedil;in her t&uuml;rl&uuml; tedbiri alm��t�r. Bununla birlikte sitede mevcut yada olu�abilecek hatalar ile ilgili herhangi bir garanti verilmemektedir.<br />\r\n<br />\r\n3.11. Bu ".$sitename." internet sitesine eri�imden, sitede yer alan bilgilerin ve/veya portal hizmetlerinin gerek do�rudan gerekse dolayl� kullan�m�ndan kaynaklanan do�rudan ve/veya dolayl� maddi ve/veya manevi menfi ve/veya m&uuml;sbet, velhas�l her t&uuml;rl&uuml; zarardan her nam alt�nda olursa olsun ".$sitename.", y&ouml;netim kurulu &uuml;yeleri, y&ouml;neticileri, &ccedil;al��anlar�, bu sitede yer alan bilgileri ve/veya portal hizmetlerini haz�rlayan ki�iler sorumlu tutulamaz.&nbsp;<br />\r\n<br />\r\n3.12. ".$sitename." internet sitesinde yer alan, bunlar� i&ccedil;eren ama bunlarla s�n�rl� olmayan t&uuml;m malzeme ve d&ouml;k&uuml;manlar  ".$sitename." m&uuml;lkiyetinde olup, bu malzeme ve d&ouml;k&uuml;manlara ili�kin telif hakk� ve/veya di�er fikri m&uuml;lkiyet haklar� ilgili kanunlarca korunmakta olup, bu malzemeler ve d&ouml;k&uuml;manlar &uuml;ye taraf�ndan izinsiz kullan�lamaz, iktisap edilemez ve de�i�tirilemez. Bu web sitesinde ad� ge&ccedil;en ba�kaca �irketler ve &uuml;r&uuml;nleri sahiplerinin ticari markalar�d�r ve ayr�ca fikri m&uuml;lkiyet haklar� kapsam�nda korunmaktad�r. <br />\r\n<br />\r\n3.13. ".$sitename." internet sitesinde malzemeler ve d&ouml;k&uuml;manlar &uuml;ye taraf�ndan de�i�tirilebilir, kopyalanabilir, &ccedil;o�alt�labilir ve yeniden yay�nlanabilir fakat ".$sitename." bunlardan dolay� hi&ccedil; bir �ekilde sorulu tutulamaz.<br />\r\n<br />\r\n3.14.  ".$sitename." internet sitesinin iyile�tirilmesi, geli�tirilmesine y&ouml;nelik olarak ve/veya yasal mevzuat &ccedil;er&ccedil;evesinde siteye eri�mek i&ccedil;in kullan�lan Internet servis sa�lay�c�s�n�n ad� ve Internet Protokol (IP) adresi, Siteye eri�ilen tarih ve saat, sitede bulunulan s�rada eri�ilen sayfalar ve siteye do�rudan ba�lan�lmas�n� sa�layan Web sitesinin Internet adresi gibi birtak�m bilgiler toplanabilir.<br />\r\n<br />\r\n3.15.  ".$sitename." kullan�c�lar�na daha iyi hizmet sunmak, &uuml;r&uuml;nlerini ve hizmetlerini iyile�tirmek, sitenin kullan�m�n� kolayla�t�rmak i&ccedil;in kullan�m�n� kullan�c�lar�n�n &ouml;zel tercihlerine ve ilgi alanlar�na y&ouml;nelik &ccedil;al��malarda &uuml;yelerin ki�isel bilgilerini kullanabilir. ".$sitename.", &uuml;yenin portal hizmetlerini al�rken ".$sitename." internet sitesi &uuml;zerinde yapt��� hareketlerin kayd�n� bulundurma hakk�n� sakl� tutar.<br />\r\n<br />\r\n3.16. ".$sitename.", &uuml;yenin ki�isel bilgilerini yasal bir zorunluluk olarak istendi�inde veya (a) yasal gereklere uygun hareket etmek veya  ".$sitename." ya da  www.".$sitename." sitesine tebli� edilen yasal i�lemlere uymak; (b)  ".$sitename." ve  ".$sitename." web sitesi ailesinin haklar�n� ve m&uuml;lkiyetini korumak ve savunmak i&ccedil;in gerekli oldu�una iyi niyetle kanaat getirdi�i hallerde a&ccedil;�klayabilir. <br />\r\n<br />\r\n3.17.  ".$sitename." web sitesinin virus ve benzeri ama&ccedil;l� yaz�l�mlardan ar�nd�r�lm�� olmas� i&ccedil;in mevcut imkanlar dahilinde tedbir al�nm��t�r. Bunun yan�nda nihai g&uuml;venli�in sa�lanmas� i&ccedil;in kullan�c�n�n, kendi virus koruma sistemini tedarik etmesi ve gerekli korunmay� sa�lamas�� gerekmektedir. Bu ba�lamda &uuml;ye  ".$sitename." web sitesi''ne girmesiyle, kendi yaz�l�m ve i�letim sistemlerinde olu�abilecek t&uuml;m hata ve bunlar�n do�rudan yada dolayl� sonu&ccedil;lar�ndan kendisinin sorumlu oldu�unu kabul etmi� say�l�r.<br />\r\n<br />\r\n3.18. ".$sitename.", sitenin i&ccedil;eri�ini diledi�i zaman de�i�tirme, kullan�c�lara sa�lanan herhangi bir hizmeti de�i�tirme yada sona erdirme veya  ".$sitename." web sitesi''nde kay�tl� kullan�c� bilgi ve verilerini silme hakk�n� sakl� tutar. <br />\r\n<br />\r\n3.19. ".$sitename.", &uuml;yelik s&ouml;zle�mesinin ko�ullar�n� hi&ccedil;bir �ekil ve surette &ouml;n ihbara ve/veya ihtara gerek kalmaks�z�n her zaman de�i�tirebilir, g&uuml;ncelleyebilir veya iptal edebilir. De�i�tirilen, g&uuml;ncellenen yada y&uuml;r&uuml;rl&uuml;kten kald�r�lan her h&uuml;k&uuml;m , yay�n tarihinde t&uuml;m &uuml;yeler bak�m�ndan h&uuml;k&uuml;m ifade edecektir.<br />\r\n<br />\r\n3.20. Taraflar, ".$sitename."''a ait t&uuml;m bilgisayar kay�tlar�n�n tek ve ger&ccedil;ek m&uuml;nhas�r delil olarak, HUMK madde 287''ye uygun �ekilde esas al�naca��n� ve s&ouml;z konusu kay�tlar�n bir delil s&ouml;zle�mesi te�kil etti�i hususunu kabul ve beyan eder.<br />\r\n<br />\r\n4. S&ouml;zle�menin Feshi<br />\r\n<br />\r\n��bu s&ouml;zle�me &uuml;yenin &uuml;yeli�ini iptal etmesi veya  ".$sitename." taraf�ndan &uuml;yeli�inin iptal edilmesine kadar y&uuml;r&uuml;rl&uuml;kte kalacakt�r. ".$sitename." &uuml;yenin &uuml;yelik s&ouml;zle�mesinin herhangi bir h&uuml;km&uuml;n&uuml; ihlal etmesi durumunda &uuml;yenin &uuml;yeli�ini iptal ederek s&ouml;zle�meyi tek tarafl� olarak feshedebilecektir. <br />\r\n&nbsp;</p>\r\n<p>5. �htilaflerin Halli<br />\r\n<br />\r\n��bu s&ouml;zle�meye ili�kin ihtilaflerde �stanbul Mahkemeleri ve �cra Daireleri yetkilidir. <br />\r\n6. Y&uuml;r&uuml;rl&uuml;k<br />\r\n<br />\r\n&Uuml;yenin, &uuml;yelik kayd� yapmas� &uuml;yenin &uuml;yelik s&ouml;zle�mesinde yer alan t&uuml;m maddeleri okudu�u ve &uuml;yelik s&ouml;zle�mesinde yer alan maddeleri kabul etti�i anlam�na gelir. ��bu S&ouml;zle�me &uuml;yenin &uuml;ye olmas� an�nda akdedilmi� ve kar��l�kl� olarak y&uuml;r&uuml;rl&uuml;l&uuml;�e girmi�tir.<br />\r\n&nbsp;</p>', 6, '2010-01-24 00:00:00', '16:37:50', NULL, '1', 0, '2010-01-24', '16:44:52', 1264344292, 'TR')",$conn);

echo table_prefix."sayfalar_icerik tablosuna &ouml;rnek veriler eklendi...<br />";

$sql = "DROP TABLE IF EXISTS `".table_prefix."yorum`;";
mysql_query( $sql, $conn );

$sql = "
CREATE TABLE IF NOT EXISTS `".table_prefix."yorum` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `YORUM` text COLLATE utf8_turkish_ci,
  `SAYFA_ID` int(11) DEFAULT NULL,
  `KULLANICI_ID` int(11) DEFAULT NULL,
  `DURUM` enum('1','0') COLLATE utf8_turkish_ci DEFAULT '0',
  `OLUS_TARIHI` date DEFAULT NULL,
  `OLUS_SAATI` time DEFAULT NULL,
  `DEG_TARIHI` date DEFAULT NULL,
  `DEG_SAATI` time DEFAULT NULL,
  `SIZ` int(11) DEFAULT NULL,
  `ADMIN_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=11 ;";
mysql_query( $sql, $conn );

echo '<font style="color:#A80812; ">'.table_prefix."yorum</font> tablosu olusturuldu...<br />";



return 1;
}

?>
