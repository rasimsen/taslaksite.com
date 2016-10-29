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
(1, 'TITLE', '".(strlen($sitename)>0?$sitename:'.:: Taslak Site ÝYS - Hýzlý, güvenli, kaliteli web site oluþturma aracý')."', '<br>Sitenin adý', '1', NULL, NULL, NULL, '2010-08-08', '09:33:48', 1281267228, 'TR'),
(2, 'DESCRIPTION', '".(strlen($sitename)>0?$sitename:'Taslak Site Ýçerik Yönetim Sistemi - Hýzlý, güvenli, kaliteli web site oluþturma aracý')."', '<br>Arama motorlarýnda sitenin listelenmesi için görünen açýklama', '1', NULL, NULL, NULL, '2010-08-08', '09:33:49', 1281267229, 'TR'),
(3, 'KEYWORDS', 'rasim þen, e-business,b2b,b2c,e-ticaret,kurumsal site,web site, CMS, portal, open source, gpl, dinamik içerikli site', '<br>Arama motorlarý için sitenin içeriði ile ilgili anahtar kelimeler', '1', NULL, NULL, NULL, '2010-08-08', '09:33:49', 1281267229, 'TR'),
(6, 'MAIL_SMTP', 'mail.taslaksite.com', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:49', 1281267229, 'TR'),
(7, 'SAHIP_ADI', 'ASÝ SOFT - http://www.asisoft.biz', '<br>Sitenin ait olduðu þirket yada kiþi adý', '1', NULL, NULL, NULL, '2010-08-08', '09:33:49', 1281267229, 'TR'),
(8, 'SAHIP_EMAIL', 'iletisim@taslaksite.com', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:49', 1281267229, 'TR'),
(9, 'SAHIP_TEL1', '0212 635 0757', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:50', 1281267230, 'TR'),
(10, 'SAHIP_TEL2', '', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:50', 1281267230, 'TR'),
(11, 'SAHIP_FAX', '0212 635 0757', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:50', 1281267230, 'TR'),
(12, 'SAHIP_CEP', '0543 567 1067', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:50', 1281267230, 'TR'),
(13, 'SAHIP_ADRES', 'Unkapaný Müzik Aletleri Çarþýsý Atatürk Bulvarý Ünlü Ýþ Merkezi A Blok No:23 Unkapaný - Fatih / Ýstanbul', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:51', 1281267231, 'TR'),
(14, 'GALERI_FOTO_W', '96', '<br>Galeri fotoðraflarýnýn görüntüleneceði boyut(px)', '1', NULL, NULL, NULL, '2010-08-08', '09:33:51', 1281267231, 'TR'),
(15, 'GALERI_FOTO_H', '', NULL, '1', NULL, NULL, NULL, '2010-08-08', '09:33:51', 1281267231, 'TR'),
(16, 'FOTO_W', '512', '<br>Büyük fotograflarýn boyutlarý(px)', '1', NULL, NULL, NULL, '2010-08-08', '09:33:51', 1281267231, 'TR'),
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
(52, 'KATEGORI_YENI_EKLENENLER', 'Enson eklenen yazýlar..', NULL, '1', NULL, '2010-08-08', '09:33:48', '2010-08-08', '09:40:04', 1281267604, 'TR')", $conn );

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
(18, 'Hoþgeldiniz..', '".$sitename." sitemize hoþgeldiniz..', '<p>".$sitename."&nbsp; a hoþgeldiniz..</p>\r\n<p>Ý&ccedil;erik Y&ouml;netim Sistemi olan ".$sitename."  sizlerin internet ortamýna hýzlý ve g&uuml;venle ge&ccedil;iþinizi saðlamak amacýyla geliþtirdik. Sitemiz hakkýnda g&ouml;r&uuml;þ ve &ouml;nerilerinizi bizlere iletmenizi &ouml;nemle rica ederiz.</p>\r\n<p>Yerli bir Ý&ccedil;erik Y&ouml;netim Sistemi olan ".$sitename." bir &ccedil;ok yabancý portalin sahip olduðu T&uuml;rk&ccedil;e problemlerini i&ccedil;ermez. Ayrýca &ouml;zellikle kobilerin, organizasyonlarýn, gruplarýn ihtiya&ccedil; duyduðu bir &ccedil;ok &ouml;zelliði &uuml;cretsiz olarak kullanýcýlarýna sunmaktadýr.</p>\r\n<p>Biz portalimizi kurduk ve g&uuml;nden g&uuml;ne geliþtirmeye devam ediyoruz. Bizi takip edin ;)</p>\r\n<p>".$sitename." Geliþtirme Ekibi Adýna<br />\r\nRasim ÞEN - Yazýlým M&uuml;h.<br />\r\nrsen@taslaksite.com</p>', '0', NULL, NULL, '0', 6, '2008-12-20', '10:05:15', '2009-10-31', '16:32:32', 1257031952, 'TR')",$conn);

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
(18, 'Hýzlý Arama', 4, '1', 6, '2009-02-22', '01:29:55', '2010-05-24', '23:02:19', 1274767339, 'TR'),
(19, 'e-Bülten', 5, '1', 6, '2009-02-22', '01:30:11', '2010-05-24', '23:02:19', 1274767339, 'TR'),
(20, 'Üye Giriþi', 3, '1', 6, '2009-02-22', '01:30:50', '2010-05-24', '23:02:19', 1274767339, 'TR'),
(21, 'Alexa Top10', 10, '1', 6, '2009-02-23', '00:41:42', '2010-05-24', '23:02:19', 1274767339, 'TR'),
(22, 'Gazeteler', 9, '1', 6, '2009-02-23', '00:41:52', '2010-05-24', '23:02:19', 1274767339, 'TR'),
(23, 'BT Destekleri', 6, '1', 6, '2009-02-23', '00:42:29', '2010-05-24', '23:02:19', 1274767339, 'TR'),
(24, 'Türkiye Top 10', 8, '1', 6, '2009-02-23', '00:42:55', '2010-05-24', '23:02:19', 1274767339, 'TR'),
(25, 'Türkiye Açýk Kaynak', 7, '1', 6, '2009-02-23', '00:43:11', '2010-05-24', '23:02:19', 1274767339, 'TR'),
(26, 'DUYURULAR', 2, '1', 6, '2009-03-05', '04:22:08', '2010-05-24', '23:02:19', 1274767339, 'TR'),
(28, 'BÝLGÝ', 1, '1', 6, '2009-04-01', '01:43:54', '2010-05-24', '23:02:19', 1274767339, 'TR'),
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
(22, 18, 'Hýzlý Arama (Ekranda Görünmez)', '', '_SELF', '<form name=\"search\" action=\"arama.php\" method=\"link\" style=\"margin: 0px; padding: 0px;\">\r\n        <b>Hýzlý Ara:</b> <input gtbfieldid=\"7\" name=\"arama_text\" size=\"45\" maxlength=\"100\" class=\"search_box\" onFocus=\"javascript:this.value=''''\" value=\"Hýzlý ara..\" type=\"text\" style=\"border:#CCCCCC solid 1px;\">\r\n        <input  name=\"btnHizliArama\" value=\"Ara\" class=\"go_button\" type=\"submit\">\r\n      </form>', 0, '1', 6, '2009-02-22', '01:31:59', '2010-02-02', '01:53:51', 1265068431, 'TR'),
(52, 31, 'Google Arama', '', '_SELF', '<script type=\"text/javascript\" src=\"http://www.google.com/jsapi\"></script>\r\n<script type=\"text/javascript\">\r\n  google.load(''search'', ''1'');\r\n  google.setOnLoadCallback(function() {\r\n    google.search.CustomSearchControl.attachAutoCompletion(\r\n      ''004758565031320666870:rjcwcrl8eho'',\r\n      document.getElementById(''q''),\r\n      ''cse-search-box'');\r\n  });\r\n</script>\r\n<form action=\"http://www.google.com/cse\" id=\"cse-search-box\">\r\n  <div>\r\n    <input type=\"hidden\" name=\"cx\" value=\"004758565031320666870:rjcwcrl8eho\" />\r\n    <input type=\"hidden\" name=\"ie\" value=\"UTF-8\" />\r\n    <input type=\"text\" name=\"q\" id=\"q\" autocomplete=\"off\" size=\"31\" />\r\n    <input type=\"submit\" name=\"sa\" value=\"Ara\" />\r\n  </div>\r\n</form>\r\n<script type=\"text/javascript\" src=\"http://www.google.com/cse/brand?form=cse-search-box&lang=tr\"></script>', 0, '1', 6, '2010-05-24', '23:02:55', '2010-05-31', '06:32:21', 1275312741, 'TR'),
(23, 20, 'Üye Giriþi(Ekranda Gözükmeyecek)', '', '_SELF', '<form method=\"post\"  name=\"form1\" action=\"uye.php\" style=\"margin: 0px; padding: 0px;\">\r\n        <input type=\"text\" name=\"kullanici_adi\" size=\"20\" maxlength=\"48\" class=\"hizliuye_box\" onfocus=\"javascript:this.value='''';\" value=\"kullanýcý adýnýz..\">\r\n        <input type=\"password\" name=\"sifre\" size=\"10\"  maxlength=\"24\"  class=\"hizliuye_box\" onfocus=\"javascript:this.value='''';\" value=\"Þifre\">\r\n        <input value=\"Giriþ\" class=\"go_button\" type=\"submit\">\r\n      </form> ', 0, '1', 6, '2009-02-22', '01:32:14', '2010-07-10', '10:37:43', 1278765463, 'TR'),
(24, 19, 'E Bülten (Ekranda Görünmeyecektir)', '', '_SELF', '<form id=\"form1\" name=\"form1\" method=\"post\" action=\"ebulten.php\">\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\">\r\n  <tr align=\"left\"><td>Email:</td><td><input type=\"text\" name=\"ebulten_email\" size=\"13\" maxlength=\"128\"  class=\"inputtext\" style=\"border:#CCCCCC solid 1px;\"/></td></tr>\r\n  <tr><td> </td><td><input name=\"btnEbulten\" value=\"Kayýt Ol\" class=\"go_button\" type=\"submit\"/></td></tr>\r\n</table>\r\n</form>', 0, '1', 6, '2009-02-22', '01:32:29', '2010-02-02', '00:34:15', 1265099655, 'TR'),
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
(35, 23, 'TÜBÝTAK', 'http://www.tubitak.gov.tr', '_BLANK', '', 0, '1', 6, '2009-02-23', '01:00:11', '2009-02-23', '01:00:11', 1235343611, 'TR'),
(36, 23, 'KOSGEB', 'http://www.kosgeb.gov.tr/', '_BLANK', '', 0, '1', 6, '2009-02-23', '01:00:45', '2009-02-23', '01:00:45', 1235343645, 'TR'),
(37, 23, 'e-Tohum', 'http://www.etohum.com', '_BLANK', '', 0, '1', 6, '2009-02-23', '01:01:40', '2009-02-23', '01:01:40', 1235343700, 'TR'),
(38, 25, 'PARDUS', 'http://www.pardus.org.tr/', '_BLANK', '', 0, '1', 6, '2009-02-23', '01:04:14', '2009-02-23', '01:04:14', 1235343854, 'TR'),
(39, 25, 'Pardus Kullanýcýlarý Derneði', 'http://www.pkd.org.tr/', '_BLANK', '', 0, '1', 6, '2009-02-23', '01:07:25', '2009-02-23', '01:07:25', 1235344045, 'TR'),
(40, 25, 'Ender UNIX', 'http://enderunix.org/', '_SELF', '', 0, '1', 6, '2009-02-23', '01:07:46', '2009-02-23', '01:07:46', 1235344066, 'TR'),
(41, 25, 'Belgeler.org', 'http://belgeler.org/', '_BLANK', '', 0, '1', 6, '2009-02-23', '01:08:12', '2009-02-23', '01:08:12', 1235344092, 'TR'),
(42, 25, 'AçýkKaynak.org', 'http://www.acikkaynak.org/', '_BLANK', '', 0, '1', 6, '2009-02-23', '01:08:47', '2009-02-23', '01:08:47', 1235344127, 'TR'),
(43, 25, 'PHP Türkiye Grubu', 'http://www.php.org.tr/', '_BLANK', '', 0, '1', 6, '2009-02-23', '01:09:15', '2009-02-23', '01:09:15', 1235344155, 'TR'),
(44, 25, 'TBD-Türkiye Biliþim Derneði', 'http://www.tbd.org.tr/', '_BLANK', '', 0, '1', 6, '2009-02-23', '01:09:50', '2009-02-23', '01:09:50', 1235344190, 'TR'),
(45, 26, 'Yapýlacaklar..', 'yapilacaklar.php', '_SELF', '', 0, '1', 6, '2009-03-05', '04:22:49', '2009-03-05', '04:22:49', 1236255769, 'TR'),
(47, 28, 'BÝZÝ TERCÝH EDENLER', 'referanslarimiz.php', '_SELF', '', 1, '1', 6, '2009-04-01', '01:46:04', '2009-04-03', '00:15:43', 1238742943, 'TR'),
(48, 28, 'YAPILACAKLAR', 'yapilacaklar.php', '_SELF', '', 2, '1', 6, '2009-04-01', '01:47:45', '2009-04-03', '00:15:43', 1238742943, 'TR'),
(49, 28, 'BT HABER', 'haberler.php', '_SELF', '', 3, '1', 6, '2009-04-01', '01:48:30', '2009-04-03', '00:15:43', 1238742943, 'TR'),
(50, 28, 'CV GÖNDER', 'insankaynaklari.php', '_SELF', '', 4, '1', 6, '2009-04-01', '01:49:33', '2009-04-03', '00:15:43', 1238742943, 'TR'),
(51, 22, 'Hürriyet', 'http://www.hurriyet.com.tr', '_BLANK', '', 0, '1', 6, '2009-08-22', '05:56:15', '2009-08-22', '05:56:40', 1250945800, 'TR')",$conn);

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
(2, 'Hakkýmýzda', 'Hakkýmýzda', 'hakkimizda.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 1, 1, '21_23_19_25', 2, '0', '1', '1', 6, NULL, NULL, '2010-02-07', '23:39:33', 1265614773, 'TR'),
(3, 'Referanslarýmýz', '".$sitename." Altyapýsýný Tercih Edenler', 'referanslarimiz.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 0, 1, '21_23_19_18_25_20', 3, '1', '1', '1', 6, NULL, NULL, '2009-10-25', '19:18:20', 1256491100, 'TR'),
(4, 'Ýletiþim', 'Ýletiþim', 'iletisim.php', 'iletisim.tpl', '', '_SELF', 1, 1, 0, 0, 1, '', 4, '1', '1', '1', 6, NULL, NULL, '2009-10-25', '19:54:35', 1256493275, 'TR'),
(5, 'Haberler', 'Haberler', 'haberler.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 0, 0, '21_23_19_18_25_20', 5, '0', '1', '1', 6, NULL, NULL, '2010-02-07', '23:28:21', 1265614101, 'TR'),
(11, 'Projelerimiz', 'Projelerimiz', 'projelerimiz.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 1, 1, '21_23_19_18_25_20', 6, '1', '1', '1', 6, NULL, NULL, '2009-10-25', '19:56:08', 1256493368, 'TR'),
(12, 'Ýnsan Kaynaklarý', 'Ýnsan Kaynaklarý', 'insankaynaklari.php', 'insan_kaynaklari.tpl', '', '_SELF', 1, 1, 0, 0, 0, '', 7, '1', '1', '1', 6, NULL, NULL, '2009-10-25', '19:57:19', 1256493439, 'TR'),
(13, 'Gizlilik Politikasý', 'Gizlilik Politikasý', 'gizlilik.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 0, 1, '21_23_28_19_18_25_24_20', 8, '0', '1', '1', 6, NULL, NULL, '2010-02-07', '23:28:57', 1265614137, 'TR'),
(14, 'Genel Bildirimler', 'Genel Bildirimler', 'genelkullanim.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 0, 1, '21_23_28_19_18_25_24_20', 9, '0', '1', '1', 6, NULL, NULL, '2010-02-07', '23:29:03', 1265614143, 'TR'),
(16, 'Üye Ol', 'Üye Ol', 'uyeol.php', 'uyeol.tpl', '', '_SELF', 1, 1, 0, 0, 0, '19_16_18_17_20', 10, '1', '1', '1', 6, '2009-01-10', '16:26:20', '2010-01-24', '21:38:07', 1264361887, 'TR'),
(17, 'Üyelik Sözleþmesi', 'Üyelik Sözleþmesi', 'uyelik_sozlesmesi.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 0, 0, '19_16_18_17_20', 9, '0', '1', '1', 6, '2009-01-10', '16:51:52', '2010-02-07', '23:27:53', 1265614073, 'TR'),
(18, 'Linkler', 'Linkler', 'linkler.php', 'taslak_sayfa.tpl', '', '_SELF', 1, NULL, 0, 1, 0, '21_23_19_18_25_20', 11, '0', '1', '1', 6, '2009-03-04', '01:23:25', '2010-02-07', '23:31:38', 1265614298, 'TR'),
(19, 'Yardým', 'Yardým', 'yardim.php', 'yardim.tpl', '', '_SELF', 1, NULL, 0, 1, 1, '', 21, '1', '1', '1', 6, '2009-03-04', '01:29:15', '2009-10-25', '20:02:15', 1256493735, 'TR'),
(20, 'Yapýlacaklar', 'Yapýlacaklar Listesi', 'yapilacaklar.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 1, 1, '21_23_19_18_25_24_20', 15, '0', '1', '1', 6, '2009-03-04', '01:50:02', '2010-02-07', '23:29:18', 1265614158, 'TR'),
(21, 'Arama', 'Arama', 'arama.php', 'arama.tpl', '', '_SELF', 1, NULL, 0, 0, 0, '', 13, '0', '1', '1', 6, '2009-03-07', '15:01:28', '2010-02-07', '23:31:30', 1265614290, 'TR'),
(22, 'e-Bülten', 'e-Bülten', 'ebulten.php', 'ebulten.tpl', '', '_SELF', 0, NULL, 0, 0, 0, NULL, 16, '0', '1', '1', 6, '2009-03-07', '23:57:30', '2010-02-07', '23:29:25', 1265614165, 'TR'),
(23, 'Ýndir', 'Ýndir', 'indir.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 1, 1, '21_23_28_19_18_25_24_20', 17, '1', '1', '1', 6, '2009-04-01', '02:02:42', '2009-10-25', '20:00:39', 1256493639, 'TR'),
(24, 'Forum', 'Forum', 'forum.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 1, 1, '21_23_28_19_18_25_24_20', 18, '0', '1', '1', 6, '2009-04-01', '02:04:35', '2010-02-07', '23:29:37', 1265614177, 'TR'),
(25, 'Dökümantasyon', 'Dökümantasyon', 'dokumantasyon.php', 'taslak_sayfa.tpl', '', '_SELF', 1, 1, 0, 1, 1, '21_23_28_19_18_25_24_20', 19, '1', '1', '1', 6, '2009-04-01', '02:06:02', '2009-10-25', '20:01:26', 1256493686, 'TR'),
(26, 'Gönüllü', 'Gönüllü Ol', 'gonullu.php', 'taslak_sayfa.tpl', '', '_SELF', 1, NULL, 0, 1, 1, '21_23_28_19_18_25_24_20', 20, '0', '1', '1', 6, '2009-04-01', '02:07:31', '2010-02-07', '23:32:08', 1265614328, 'TR'),
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
(114, 0, 'Gizlilik Politikasý', 'GÝZLÝLÝK POLÝTÝKASI', NULL, '', '<p>".$sitename." olarak, temel amacýmýz &uuml;lkemiz internet kullanýmýna &ldquo;daha fazla a&ccedil;ýk kaynak kodlu proje&rdquo; felsefesi profesyonel ve kaliteli hizmetler sunaktýr. BU felsefemize ulaþýrken kiþisel hak ve &ouml;zg&uuml;rl&uuml;klere, insan onuruna yakýþýr bir þekilde davranmak temel ilkemizdir. Bu y&uuml;zden&nbsp; kayýtlý kullanýcýlarýmýza daha g&uuml;venli bir internet ortamý saðlamayý ilke edindik. Bu sebepten dolayý, &uuml;yelerimizin kendilerini daha rahat hissetmeleri i&ccedil;in onlara &ccedil;eþitli gizlilik haklarý tanýdýk. <br />\r\n<br />\r\n".$sitename." &uuml;yelerinin sahip olduklarý bu haklar, aþaðýdaki gibidir:</p>\r\n<ul>\r\n    <li>Elektronik posta adresiniz, Kullanýcý S&ouml;zleþmesi''nde tanýmlanan haller haricinde, hi&ccedil;bir gerek&ccedil;e ile baþka kuruluþlara daðýtýlmayacak ve reklam, tanýtým, pazarlama yapmak amacýyla kullanýlmayacaktýr.</li>\r\n    <li>".$sitename."&rsquo;a verdiðiniz &uuml;yelik bilgileri ve kiþisel bilgiler, onayýnýz dýþýnda, Kullanýcý S&ouml;zleþmesi''nde tanýmlanan haller haricinde, diðer &uuml;yelere ve &uuml;&ccedil;&uuml;nc&uuml; kiþilere a&ccedil;ýlmayacaktýr. Ancak bu bilgiler, ".$sitename." sitesinin kendi b&uuml;nyesinde, m&uuml;þteri profili belirlemek ve istatistiksel &ccedil;alýþmalar yapmak amacýyla kullanýlabilecektir.</li>\r\n    <li>Sisteme girdiðiniz t&uuml;m bilgilere, ".$sitename." dýþýnda sadece siz ulaþabilir ve bunlarý sadece siz deðiþtirebilirsiniz. Bir baþka &uuml;yenin veya Kullanýcý''nýn, sizinle ilgili bilgilere ulaþmasý ve bunlarý deðiþtirmesi m&uuml;mk&uuml;n deðildir.</li>\r\n    <li>Kayýt esnasýnda sizden istenen kiþisel bilgilerden, zorunlu olanlar hari&ccedil;, istediklerinizi kendi inisiyatifiniz dahilinde ".$sitename."&rsquo;a bildirebilirsiniz. ".$sitename."&rsquo;a vermeyi tercih etmeyeceðiniz bilgiler varsa, bu alanlarý doldurmak veya iþaretlemek zorunda deðilsiniz.</li>\r\n    <li>".$sitename." &uuml;yelerin sisteme giriþ i&ccedil;in kullandýklarý bilgisayara &ccedil;erez býrakabilir. &Ccedil;erez ve i&ccedil;ersindeki bilgiler yalnýzca &uuml;yenin ilerki geliþlerinde hatýrlanmasý ve ona uygun i&ccedil;erik sunulmasý i&ccedil;in kullanýlýr.<br />\r\n    &nbsp;</li>\r\n</ul>\r\n<p>&nbsp;</p>', 6, '2009-04-01 00:00:00', '23:49:26', NULL, '1', 0, '2009-10-25', '19:57:44', 1256493464, 'TR'),
(103, 0, 'Yapýlacaklar', 'Yapýlacaklar..', NULL, '0', '<ul>\r\n    <li>arama\r\n    <ul>\r\n        <li>hýzlý arama kutusu +</li>\r\n        <li>detaylý arama +</li>\r\n        <li>sonu&ccedil; +</li>\r\n    </ul>\r\n    </li>\r\n    <li>T&uuml;m sayfalarda kullanýlabilinecek NAVIGATOR\r\n    <ul>\r\n        <li>adminden sayfada listelenecek olan baþlýk adedi ayarlanabilinecek</li>\r\n        <li>adminden sayfada navigator kullanýp kullanmama isteðe baðlý olacak</li>\r\n    </ul>\r\n    </li>\r\n    <li>e-B&uuml;lten sayfasý yapýlacak +</li>\r\n    <li>&Uuml;ye Sayfalarý\r\n    <ul>\r\n        <li>&uuml;ye olurken capcha konulacak</li>\r\n        <li>&uuml;ye bilgilerini g&uuml;ncelleme</li>\r\n        <li>þifre g&uuml;ncelleme</li>\r\n        <li>aktivasyon kodu g&ouml;nderme/onaylama</li>\r\n    </ul>\r\n    </li>\r\n    <li>Yardým Sayfasý +\r\n    <ul>\r\n        <li>Sol panel &ouml;zel olarak yapýlacak +</li>\r\n        <li>Arama yine &ouml;zel olacak +</li>\r\n    </ul>\r\n    </li>\r\n    <li>Anket\r\n    <ul>\r\n        <li>Anket oluþturma</li>\r\n        <li>Sonu&ccedil;lar</li>\r\n    </ul>\r\n    </li>\r\n    <li>Forum</li>\r\n    <li>Her sayfanýn i&ccedil;inde alt linklerini &ouml;zet olarak kutuda toplama</li>\r\n    <li>Admin den sayfalara dosya attach edebilme</li>\r\n</ul>', 6, '2009-03-05 00:00:00', '04:53:49', NULL, '1', 0, '2009-10-25', '20:00:10', 1256493610, 'TR'),
(357, 0, 'Anasayfa', ' ', NULL, ' ', '<p>".$sitename." un kuruluþ amacý kendine yada þirketine web sitesi yapmak isteyen fakat bu konuda zorlanan kullanýcýlara basit ve ihtiya&ccedil;larýný t&uuml;m&uuml;yle karþýlayabilecekleri tamamen t&uuml;rk&ccedil;e bir portal hazýrlamaktýr. Bu fikir kiþisel ihtiya&ccedil;tan da ortaya &ccedil;ýkmýþtýr diyebiliriz. Kiþisel olarak bende kendime site yaparken baþkalarýnýn yaptýðý, ki bunlarýn &ccedil;oðu yapancý portallar(CMS), &uuml;cretsiz site yapma ara&ccedil;larýný denedim, fakat yazýlým d&uuml;nyasýnýn i&ccedil;inde olmama raðmen hi&ccedil; biri i&ccedil;ime sinmiyordu, hele bazýlarýný anlamak i&ccedil;in, t&uuml;rk&ccedil;eleþtirmek i&ccedil;in &ccedil;ok fazla uðraþýyordum. Bunun bu kadar zor olmamasý gerekiyor.</p>\r\n<p>Talep: &quot;T&uuml;rk&ccedil;e site yapmak istiyorum, ama &uuml;cretsiz, ama problemsiz, ama hýzlý, ama anlaþýlýr, ama kullanmak i&ccedil;in alim olmaya gerek olmasýn, hatta bende yazýlýmdan biraz anlarým basit&ccedil;e kendi kodlarýmýda yazýp siteyi geliþtirebileyim, tasarýmcým var yazýlýmdan &nbsp;anlamaz o bile yapsýn tasarýmýný siteye giydirsin, hatta bayrama, yýlbaþýna &ouml;zel site tasarýmým olsun kolayca tek t&uuml;þla sitenin g&ouml;r&uuml;n&uuml;m&uuml;n&uuml; deðiþtirebileyim ?&quot;</p>\r\n<p>Yukardaki talepleri karþýlamaya &ccedil;alýþtým, adýnada&nbsp; ".$sitename." dedim..</p>\r\n<p>".$sitename." kullanmayý d&uuml;þ&uuml;nen kiþi/þirketlere bir k&uuml;&ccedil;&uuml;k tavsiyemiz var: ".$sitename."''u indirin, kurun ve bir tasarýmcýya gidin buna g&uuml;zel bir tasarým istiyorum deyin. Bu þekilde profesyonel bir web siteniz/portalýnýz olacaktýr. </p>\r\n<p>Ger&ccedil;ekten amacýmýz biþeyler &uuml;reten, &uuml;retmek isteyen, katma deðer saðlayan, istihdam saðlayan kiþilerin/þirketlerin iþlerini, fikirlerini geliþtirmelerine yardýmcý olmak, internette de varolmalarýna yardýmcý olabilmek.</p>\r\n<p>Bir diðer amacýmýz da T&uuml;rkiye''de internetin geliþmesine katkýda bulunmak, bunu yaparken de piyasaya bir standardýn yerleþmesine katkýda bulunabilirsek &ccedil;ok mutlu olacaðýz.&nbsp;</p>\r\n<p>Rasim ÞEN<br />\r\n".$sitename."&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><br />\r\n&nbsp;</p>', 6, '2010-05-20 00:00:00', '22:41:41', NULL, '1', 0, '2010-07-11', '07:28:06', 1278858486, 'TR'),
(93, 0, 'Hakkýmýzda', '".$sitename." Hakkýmýzda..', NULL, '".$sitename." ülkemizde türkçe olarak yeterli ölçüde kolay, kullanýþlý, türkçe dökümaný olan site hazýrlama aracý olmamasýndan dolayý bir ihtiyaç olarak geliþtirilmiþ olup tamemen Türkçe dir.', '<p><img height=\"365\" border=\"3\" width=\"350\" src=\"/taslaksite_mm_icerik/image034.jpg\" alt=\"\" /></p>', 6, '2008-11-08 00:00:00', '17:37:26', NULL, '1', 0, '2009-10-25', '19:17:38', 1256491058, 'TR'),
(95, 94, 'Hakkýmýzda', 'alt alt 1', 'sTh_491605b35fa177.jpg', 'dfsaf dsf\r\nfdsf', '', 1, '2008-11-08 00:00:00', '18:33:39', NULL, '1', 0, '2009-10-25', '19:17:38', 1256491058, 'TR'),
(96, 0, 'Haberler', '".$sitename." çok yakýnda açýlýyor..', NULL, '".$sitename." çok yakýnda beta sürümünü sizlerle paylaþmaya hazýr olacak..\r\n\r\nbizi takip edin..', '', 6, '2009-02-22 00:00:00', '01:04:18', NULL, '1', 0, '2009-10-25', '19:55:14', 1256493314, 'TR'),
(97, 0, 'Ýletiþim', 'Ýletiþim', NULL, '', '', 6, '2009-03-04 00:00:00', '00:50:27', NULL, '1', 0, '2009-10-25', '19:54:36', 1256493276, 'TR'),
(98, 0, 'Yardým', 'Yardým', NULL, '', '', 6, '2009-03-04 00:00:00', '01:29:53', NULL, '1', 0, '2009-10-25', '20:02:15', 1256493735, 'TR'),
(99, 0, 'Referanslarýmýz', '".$sitename." Altyapýsýný Tercih Edenler', NULL, '', '', 6, '2009-03-04 00:00:00', '01:30:49', NULL, '1', 0, '2009-10-25', '19:18:21', 1256491101, 'TR'),
(100, 0, 'Ýnsan Kaynaklarý', 'Ýnsan Kaynaklarý', NULL, '', '', 6, '2009-03-04 00:00:00', '01:31:14', NULL, '1', 0, '2009-10-25', '19:57:20', 1256493440, 'TR'),
(101, 0, 'Projelerimiz', 'Projelerimiz', NULL, '', '', 6, '2009-03-04 00:00:00', '01:32:56', NULL, '1', 0, '2009-10-25', '19:56:08', 1256493368, 'TR'),
(102, 20, 'Yapýlacaklar', 'Yapýlacaklar..', NULL, '0', '<ul>\r\n    <li>arama <br /></li>\r\n    <ul>\r\n        <li>hýzlý arama kutusu</li>\r\n        <li>detaylý arama</li>\r\n        <li>sonu&ccedil;</li>\r\n    </ul>\r\n    <li>T&uuml;m sayfalarda kullanýlabilinecek NAVIGATOR</li>\r\n    <ul>\r\n        <li>adminden sayfada listelenecek olan baþlýk adedi ayarlanabilinecek</li>\r\n        <li>adminden sayfada navigator kullanýp kullanmama isteðe baðlý olacak</li>\r\n    </ul>\r\n    <li>e-B&uuml;lten sayfasý yapýlacak</li>\r\n    <li>&Uuml;ye Sayfalarý</li>\r\n    <ul>\r\n        <li>&uuml;ye olurken capcha konulacak</li>\r\n        <li>&uuml;ye bilgilerini g&uuml;ncelleme</li>\r\n        <li>þifre g&uuml;ncelleme</li>\r\n        <li>aktivasyon kodu g&ouml;nderme/onaylama</li>\r\n    </ul>\r\n    <li>Yardým Sayfasý</li>\r\n    <ul>\r\n        <li>Sol panel &ouml;zel olarak yapýlacak</li>\r\n        <li>Arama yine &ouml;zel olacak</li>\r\n    </ul>\r\n    <li>Anket</li>\r\n    <ul>\r\n        <li>Anket oluþturma</li>\r\n        <li>Sonu&ccedil;lar</li>\r\n    </ul>\r\n    <li>Forum</li>\r\n    <li>&nbsp;</li>\r\n</ul>', 6, '2009-03-05 00:00:00', '03:57:48', NULL, '0', 0, '2009-10-25', '20:00:10', 1256493610, 'TR'),
(104, 2, 'Hakkýmýzda', 'Vizyonumuz', NULL, '".$sitename." olarak vizyonumuz, ülkemizin internet dünyasýna ilgi duyan tüm kesimleri(öðrenciler, öðretmenler, iþ adamlarý, yöneticiler, iþciler, memurlar, en hanýmlarý, yetenekli, zanaatkar insanlar ..) için basit, kullanýmý kolay, dili türkçe, desteði türkçe olan profesyonel bir web altyapýsýný ücretsiz ülkemiz insanýnýn kullanýmýna sunmak.', '', 6, '2009-03-07 00:00:00', '15:45:51', '2007-03-09 04:02:55', '1', 0, '2009-10-25', '19:17:38', 1256491058, 'TR'),
(105, 2, 'Hakkýmýzda', 'Misyonumuz', NULL, '<ul>\r\n    <li>Basit ve kullanýþlý bir site i&ccedil;in gereken altyapýyý kurmak</li>\r\n    <li>Geliþen ve deðiþien web d&uuml;nyasý i&ccedil;in s&uuml;rekli g&uuml;ncel kalmak</li>\r\n    <li>&Uuml;lkemizin web d&uuml;nyasýnýn geliþmesine katkýda bulunmak amacýyla\r\n    <ul>\r\n        <li>Kodlarý a&ccedil;ýk kaynak hale getirmek</li>\r\n        <li>".$sitename." ile bir portal nasýl yapýlýr adý altýnda seminer ve eðitimler vermek</li>\r\n        <li>Ýnteraktif tartýþma ortamý oluþturmak</li>\r\n    </ul>\r\n    ..', '<ul>\r\n    <li>Basit ve kullanýþlý bir site i&ccedil;in gereken altyapýyý kurmak</li>\r\n    <li>Geliþen ve deðiþien web d&uuml;nyasý i&ccedil;in s&uuml;rekli g&uuml;ncel kalmak</li>\r\n    <li>&Uuml;lkemizin web d&uuml;nyasýnýn geliþmesine katkýda bulunmak amacýyla\r\n    <ul>\r\n        <li>Kodlarý a&ccedil;ýk kaynak hale getirmek</li>\r\n        <li>".$sitename." ile bir portal nasýl yapýlýr adý altýnda seminer ve eðitimler vermek</li>\r\n        <li>Ýnteraktif tartýþma ortamý oluþturmak</li>\r\n        <li>".$sitename." u ortak geliþtirmeye a&ccedil;mak ve bu sayade &uuml;lkemizin web yazýlýmcýlarýnýn tecr&uuml;be ve deneyimlerini paylaþmalarýný saðlamak</li>\r\n    </ul>\r\n    </li>\r\n    <li>Oluþan site hatalarýný en kýsa zamanda &ccedil;&ouml;zmek</li>\r\n</ul>\r\n<p>bunun i&ccedil;in sizlerden istediðimiz tek þey s&uuml;rekli destek ve geribildirimlerdir.</p>\r\n<p>Saygýlar</p>\r\n<p>".$sitename." Takýmý</p>', 6, '2009-03-07 00:00:00', '16:01:47', '2007-03-09 04:02:55', '1', 1, '2009-10-25', '19:17:38', 1256491058, 'TR'),
(106, 19, 'Yardým', '".$sitename." Giriþ', NULL, '', '', 6, '2009-03-08 00:00:00', '03:02:31', NULL, '1', 0, '2009-10-25', '20:02:15', 1256493735, 'TR'),
(107, 19, 'Yardým', '".$sitename." Kurulum', NULL, '', '', 6, '2009-03-08 00:00:00', '03:04:57', NULL, '1', 0, '2009-10-25', '20:02:15', 1256493735, 'TR'),
(108, 19, 'Yardým', '".$sitename." Yönetim', NULL, '', '', 6, '2009-03-08 00:00:00', '03:05:30', NULL, '1', 0, '2009-10-25', '20:02:15', 1256493735, 'TR'),
(109, 19, 'Yardým', '".$sitename." Güncelleme', NULL, '', '', 6, '2009-03-08 00:00:00', '03:06:15', NULL, '1', 0, '2009-10-25', '20:02:15', 1256493735, 'TR'),
(110, 19, 'Yardým', '".$sitename." Güvenlik Performans', NULL, '', '', 6, '2009-03-08 00:00:00', '03:06:45', NULL, '1', 0, '2009-10-25', '20:02:15', 1256493735, 'TR'),
(111, 19, 'Yardým', '".$sitename." Kullaným Klavuzu', NULL, '', '', 6, '2009-03-08 00:00:00', '03:08:22', NULL, '1', 0, '2009-10-25', '20:02:15', 1256493735, 'TR'),
(112, 106, 'Yardým', 'Amaç', NULL, '', '', 6, '2009-03-08 00:00:00', '03:50:06', NULL, '1', 0, '2009-10-25', '20:02:15', 1256493735, 'TR'),
(113, 106, 'Yardým', '".$sitename." Hakkýnda', NULL, '', '', 6, '2009-03-08 00:00:00', '03:50:50', NULL, '1', 0, '2009-10-25', '20:02:15', 1256493735, 'TR'),
(115, 0, 'Genel Bildirimler', 'GENEL BÝLDÝRÝMLER', NULL, '', '<p>".$sitename." ticari ama&ccedil;lý bir yazýlým deðildir. &Uuml;lkemiz internet ortamýnýn geliþmesine ve kiþi/þirket lerin ihtiya&ccedil; duyduðu internet &ccedil;&ouml;z&uuml;mlerine profesyonel ve &uuml;cretsiz olarak hizmet ve destek vermeyi ilke edinmiþtir. Bu y&uuml;zden portalýmýzýn kullanýcýlarýnýndan temel olarak beklentimiz bencil olmamalarý ve m&uuml;mk&uuml;n olduðunca paylaþýmcý olmalarý.</p>\r\n<p>Bunlarýn dýþýnda</p>\r\n<ul>\r\n    <li>Portal dahilinde &Uuml;lkemizin Kanunlarýna(T&uuml;rkiye Cumhuriyeti) aykýrý hi&ccedil; bir tutumun sergilenmemesi ki tesbit edilen kiþi/kurum larýn portalýmýz ile ilþikisi anýnda kesilecek olup, adli kurumlarýn bilgi isteðine karþý t&uuml;m veritabaný g&ouml;n&uuml;l rahatlýðý ile a&ccedil;ýlacaktýr. </li>\r\n    <li>Ýnternet ortamýnýn adýnýn sanal olmasýna kaptýrýp ayaklarý yere basmayan hal ve hareketlerden uzak durulmasýný kullanýcýlarýmýzdan &ouml;zellikle rica ediyoruz. Bu portalý yazanda, kullananda, geliþtirende, eleþtiren de sanal deðil kanlý canlý insandýr. Kafasýný kuma g&ouml;men deve kuþ larý unutmamalýdýr ki g&ouml;r&uuml;nen kýsmýnýz g&ouml;r&uuml;nmeyen kýsmýnýzdan &ccedil;ok fazla. L&uuml;tfen buna g&ouml;re sorumlu davranalým.</li>\r\n    <li>Genel olarak toplumsal ahlak kurallarýmýza aykýrý davranýþ, tutum sergilemeyi ilke edinip hi&ccedil; bir ".$sitename." kullanýcýsý, geliþtiricisi, destekleyicine karþý kýrýcý, k&uuml;&ccedil;&uuml;k d&uuml;þ&uuml;r&uuml;c&uuml; hal ve hareketlerde bulunulmamalýdýr.</li>\r\n</ul>\r\n<p>".$sitename." olarak genel bildirimimizin &ouml;zeti þudur: bizler yola iyi niyetle &ccedil;ýktýk, iyi þeyler sunmayý ama&ccedil; edindik. Karþý taraftan tek beklentimiz iyi niyetleridir. Eleþtirilerilerinize muhtacýz, ve bize y&ouml;n verecektir. </p>\r\n<p>Her t&uuml;rl&uuml; &ouml;neri/istek i&ccedil;in <a href=\"http://www.taslaksite.com/iletisim.php\">iletiþim sayfasýndan l&uuml;tfen bize yazýn</a>.</p>\r\n<p>Saygýlar<br />\r\n".$sitename." Takýmý</p>', 6, '2009-04-02 00:00:00', '00:10:51', NULL, '1', 0, '2009-10-25', '19:58:12', 1256493492, 'TR'),
(116, 0, 'Ýndir', 'ÝNDÝR', NULL, '".$sitename." tarafýndan geliþtirilmiþ olan programlar için yeni versiyonlar, buglar, güncellemeler, eklentiler, tasarýmlar indirmek için ', '', 6, '2009-04-03 00:00:00', '01:56:25', NULL, '1', 0, '2009-10-25', '20:00:40', 1256493640, 'TR'),
(117, 0, 'Kategoriler', 'Kategoriler', NULL, '', '', 6, '2009-04-03 00:00:00', '05:13:48', NULL, '1', 0, '2009-10-25', '19:53:49', 1256493229, 'TR'),
(118, 0, 'Forum', 'Forum', NULL, '".$sitename." hakkýnda tartýþma platformudur.', '', 6, '2009-04-03 00:00:00', '05:16:18', NULL, '1', 0, '2009-10-25', '20:01:02', 1256493662, 'TR'),
(119, 24, 'Forum', 'Genel', NULL, '".$sitename." hakkýnda hertürlü sorunuzu bu alana yazabilirsiniz..', '', 6, '2009-04-03 00:00:00', '05:17:21', NULL, '1', 0, '2009-10-25', '20:01:02', 1256493662, 'TR'),
(120, 24, 'Forum', 'Þablonlar', NULL, '".$sitename." sitesi için hazýrlanmýþ þablonlar', '', 6, '2009-04-03 00:00:00', '05:21:15', NULL, '1', 0, '2009-10-25', '20:01:02', 1256493662, 'TR'),
(121, 24, 'Forum', 'EKLENTÝLER', NULL, '".$sitename." için geliþtirilmiþ olan eklentiler', '', 6, '2009-04-03 00:00:00', '05:22:02', NULL, '1', 0, '2009-10-25', '20:01:02', 1256493662, 'TR'),
(122, 24, 'Forum', 'BUG ve GÜNCELLEMELER', NULL, '".$sitename." için ortaya çýkan Bug lar ve güncellemeler..', '', 6, '2009-04-03 00:00:00', '05:24:14', NULL, '1', 0, '2009-10-25', '20:01:02', 1256493662, 'TR'),
(123, 0, 'Dökümantasyon', 'Dökümantasyon', NULL, '".$sitename." ile ilgili detaylý dökümantasyon', '', 6, '2009-04-03 00:00:00', '05:27:06', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(124, 25, 'Dökümantasyon', 'Telif Hakký', NULL, '', '<p>Kýsaca A&ccedil;ýk Kaynak Kod felsefesine inanmýþ herkes alsýn kullansýn, geliþtirsin, para kazansýn, iþlerini kolaylaþtýrsýn bize yeter <img src=\"http://www.taslaksite.com/sAdmin/sAraclar/gelismisHTML/editor/images/smiley/msn/wink_smile.gif\" alt=\"\" /></p>', 6, '2009-04-03 00:00:00', '05:33:41', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(125, 25, 'Dökümantasyon', 'Önsöz', NULL, '', '', 6, '2009-04-03 00:00:00', '05:34:29', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(126, 25, 'Dökümantasyon', 'Baþlarken', NULL, '', '', 6, '2009-04-03 00:00:00', '05:37:00', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(127, 25, 'Dökümantasyon', 'Asgari Gereksinimler', NULL, '', '', 6, '2009-04-03 00:00:00', '05:37:34', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(128, 25, 'Dökümantasyon', 'Kurulum Rehberi', NULL, '', '', 6, '2009-04-03 00:00:00', '05:41:25', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(129, 25, 'Dökümantasyon', 'Kullanýcý Kitapcýðý', NULL, '', '', 6, '2009-04-03 00:00:00', '05:42:03', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(130, 25, 'Dökümantasyon', 'Yönetim Paneli Kitapcýðý', NULL, '', '', 6, '2009-04-03 00:00:00', '05:43:51', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(131, 25, 'Dökümantasyon', '".$sitename." Kodlarýndan Deðiþtirmek Ýstiyorum', NULL, 'PHP ve HTML biliyorsanýz ve taslaksite.com un þuan var olan altyapýsý isteklerinize cevap vermiyorsa kendi kodlarýnýzý yazabilirsiniz. Bunun için özellikle site tarafýnda altyapýsýný basit ve modüler yapmaya çalýþtýk ki en az kodla, hýzlý bir þekilde geliþtirme yapabilesiniz.', '', 6, '2009-04-03 00:00:00', '05:48:47', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(132, 25, 'Dökümantasyon', 'Resimlerle ".$sitename."', NULL, '', '', 6, '2009-04-03 00:00:00', '05:50:06', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(133, 25, 'Dökümantasyon', 'Videolarla ".$sitename." Dersleri', NULL, '', '', 6, '2009-04-03 00:00:00', '05:50:40', NULL, '1', 0, '2009-10-25', '20:01:27', 1256493687, 'TR'),
(134, 0, 'Gönüllü', 'Gönüllü Ol', NULL, '".$sitename." Takýmýnýn bir üyesi olup hem bize destek olup hemde kariyerinize gözel þeyler katmak istiyorsanýz sizleri aramýza bekliyoruz ;)\r\n\r\nÖzellikle genç arkadaþlara bu konuda naçizane tavsiyemiz \"Büyük adam olmak istiyorsanýz mutlaka bir OPEN SOURCE projede bulunun\". Bizimle yada bizsiz farketmez, açýn http://sourceforge.net i ordan hoþunuza giden bir projeye dahil olun arkadaþlar.. \r\n\r\n', '', 6, '2009-04-03 00:00:00', '05:56:32', NULL, '1', 0, '2009-10-25', '20:01:52', 1256493712, 'TR'),
(135, 26, 'Gönüllü', 'EKLENTÝ GELÝÞTÝRME EKÝBÝ', NULL, '', '', 6, '2009-04-03 00:00:00', '05:57:31', NULL, '1', 0, '2009-10-25', '20:01:52', 1256493712, 'TR'),
(136, 26, 'Gönüllü', 'TASARIM GELÝÞTÝRME EKÝBÝ', NULL, '', '', 6, '2009-04-03 00:00:00', '05:57:56', NULL, '1', 0, '2009-10-25', '20:01:52', 1256493712, 'TR'),
(137, 26, 'Gönüllü', 'PHP EKÝBÝ', NULL, '', '', 6, '2009-04-03 00:00:00', '05:58:16', NULL, '1', 0, '2009-10-25', '20:01:52', 1256493712, 'TR'),
(138, 26, 'Gönüllü', 'JAVASCRIPT - AJAX EKÝBÝ', NULL, '', '', 6, '2009-04-03 00:00:00', '05:58:37', NULL, '1', 0, '2009-10-25', '20:01:52', 1256493712, 'TR'),
(139, 26, 'Gönüllü', 'FLASH - ACTION SCRIPT EKÝBÝ', NULL, '', '', 6, '2009-04-03 00:00:00', '05:59:07', NULL, '1', 0, '2009-10-25', '20:01:52', 1256493712, 'TR'),
(140, 26, 'Gönüllü', '".$sitename." VÝZYON/MÝSYON EKÝBÝ', NULL, '', '', 6, '2009-04-03 00:00:00', '05:59:48', NULL, '1', 0, '2009-10-25', '20:01:52', 1256493712, 'TR'),
(356, 0, 'Üyelik Sözleþmesi', '', NULL, '', '<p>&Uuml;YELÝK S&Ouml;ZLEÞMESÝ<br />\r\n<br />\r\n1. Taraflar<br />\r\n<br />\r\na) ".$sitename." internet sitesinin faaliyetlerini y&uuml;r&uuml;ten ".$sitename."&nbsp;<br />\r\n<br />\r\nb) ".$sitename." internet sitesine &uuml;ye olan internet kullanýcýsý (&quot;&Uuml;ye&quot;) <br />\r\n2. S&ouml;zleþmenin Konusu<br />\r\n<br />\r\nÝþbu S&ouml;zleþme&rsquo;nin konusu ".$sitename." internet sitesinden ve  ".$sitename." tarafýndan sunulan portal hizmetlerinden faydalanma þartlarýnýn belirlenmesidir. <br />\r\n&nbsp;</p>\r\n<p>3. Taraflarýn Hak ve Y&uuml;k&uuml;ml&uuml;l&uuml;kleri<br />\r\n<br />\r\n3.1. &Uuml;ye, ".$sitename." internet sitesine &uuml;ye olurken verdiði kiþisel ve diðer sair bilgilerin kanunlar &ouml;n&uuml;nde doðru olduðunu, ".$sitename."''un bu bilgilerin ger&ccedil;eðe aykýrýlýðý nedeniyle uðrayacaðý t&uuml;m zararlarý aynen ve derhal tazmin edeceðini beyan ve taahh&uuml;t eder.<br />\r\n<br />\r\n3.2. &Uuml;ye,  ".$sitename." tarafýndan kendisine verilmiþ olan þifreyi baþka kiþi ya da kuruluþlara veremez, &uuml;yenin s&ouml;zkonusu þifreyi kullanma hakký bizzat kendisine aittir. Bu sebeple doðabilecek t&uuml;m sorumluluk ile &uuml;&ccedil;&uuml;nc&uuml; kiþiler veya yetkili merciler tarafýndan ".$sitename."''a karþý ileri s&uuml;r&uuml;lebilecek t&uuml;m iddia ve taleplere karþý, ".$sitename."''ýn s&ouml;zkonusu izinsiz kullanýmdan kaynaklanan her t&uuml;rl&uuml; tazminat ve sair talep hakký saklýdýr.<br />\r\n<br />\r\n&nbsp; 3.3. &Uuml;ye ".$sitename." internet sitesini ve  ".$sitename." tarafýndan sunulan portal hizmetlerini kullanýrken yasal mevzuat h&uuml;k&uuml;mlerine riayet etmeyi ve bunlarý ihlal etmemeyi baþtan kabul ve taahh&uuml;t eder. Aksi takdirde, doðacak t&uuml;m hukuki ve cezai y&uuml;k&uuml;ml&uuml;l&uuml;kler tamamen ve m&uuml;nhasýran &uuml;yeyi baðlayacaktýr.<br />\r\n<br />\r\n3.4. &Uuml;ye, ".$sitename." internet sitesini ve portal hizmetlerini ve hi&ccedil;bir þekilde kamu d&uuml;zenini bozucu, genel ahlaka aykýrý, baþkalarýný rahatsýz ve taciz edici þekilde, yasalara aykýrý bir ama&ccedil; i&ccedil;in, baþkalarýnýn fikri ve telif haklarýna tecav&uuml;z edecek þekilde kullanamaz. Ayrýca, &uuml;ye baþkalarýnýn hizmetleri kullanmasýný &ouml;nleyici veya zorlaþtýrýcý faaliyet (spam, virus, truva atý, vb.) ve iþlemlerde bulunamaz.<br />\r\n<br />\r\n3.5. ".$sitename." internet sitesinde &uuml;yeler tarafýndan beyan edilen, yazýlan, kullanýlan fikir ve d&uuml;þ&uuml;nceler, tamamen &uuml;yelerin kendi kiþisel g&ouml;r&uuml;þleridir ve g&ouml;r&uuml;þ sahibini baðlar. Bu g&ouml;r&uuml;þ ve d&uuml;þ&uuml;ncelerin ".$sitename."''la hi&ccedil;bir ilgi ve baðlantýsý yoktur. ".$sitename."''un &uuml;yenin beyan edeceði fikir ve g&ouml;r&uuml;þler nedeniyle &uuml;&ccedil;&uuml;nc&uuml; kiþilerin uðrayabileceði zararlardan ve hizmetlerin kullanýmý esnasýnda M&uuml;þteri''nin uðrayabileceði &uuml;&ccedil;&uuml;nc&uuml; kiþilerin fiil ve hareketlerinden doðabilecek zararlardan dolayý herhangi bir sorumluluðu bulunmamaktadýr.<br />\r\n<br />\r\n3.6. ".$sitename.", &uuml;ye verilerinin yetkisiz kiþilerce okunmasýndan ve &uuml;ye yazýlým ve verilerine gelebilecek zararlardan dolayý sorumlu olmayacaktýr. &Uuml;ye, ".$sitename." internet sitesinin ve portal hizmetlerinin kullanýlmasýndan dolayý uðrayabileceði herhangi bir zarar y&uuml;z&uuml;nden ".$sitename."''dan tazminat talep etmemeyi peþinen kabul etmiþtir.<br />\r\n<br />\r\n3.7. &Uuml;ye, diðer internet kullanýcýlarýnýn yazýlýmlarýna ve verilerine izinsiz olarak ulaþmamayý veya bunlarý kullanmamayý kabul etmiþtir. Aksi takdirde, bundan doðacak hukuki ve cezai sorumluluklar tamamen &uuml;yeye aittir.<br />\r\n<br />\r\n3.8. Ýþbu &uuml;yelik s&ouml;zleþmesi i&ccedil;erisinde sayýlan maddelerden bir ya da birka&ccedil;ýný ihlal eden &uuml;ye iþbu ihlal nedeniyle cezai ve hukuki olarak þahsen sorumlu olup, ".$sitename."''u bu ihlallerin hukuki ve cezai sonu&ccedil;larýndan ari tutacaktýr. Ayrýca; iþbu ihlal nedeniyle, olayýn hukuk alanýna intikal ettirilmesi halinde, ".$sitename."''ýn &uuml;yeye karþý &uuml;yelik s&ouml;zleþmesinee uyulmamasýndan dolayý tazminat talebinde bulunma hakký saklýdýr.<br />\r\n<br />\r\n3.9.  ".$sitename."''un her zaman tek taraflý olarak gerektiðinde &uuml;yenin &uuml;yeliðini silme, m&uuml;þteriye ait dosya, belge ve bilgileri silme hakký vardýr. &Uuml;ye iþbu tasarrufu &ouml;nceden kabul eder. Bu durumda, ".$sitename."''un hi&ccedil;bir sorumluluðu yoktur.&nbsp;<br />\r\n<br />\r\n3.10. ".$sitename." internet sitesinde yer alan her t&uuml;rl&uuml; bilginin doðruluðu, eksiksiz olmasý, yeterliliði ve g&uuml;ncelliði hi&ccedil;bir surette  ".$sitename." tarafýndan garanti ve taahh&uuml;t edilmemektedir.Kullanýcý hi&ccedil;bir þekilde web sitesi''nde yer alan bilgilerin ve/veya portal hizmetlerinin hatalý olduðu yada bu bilgilere istinaden zarara uðradýðý iddiasýnda bulunamaz.  ".$sitename." hi&ccedil;bir þekil ve surette &ouml;n ihbara ve/veya ihtara gerek kalmaksýzýn her zaman s&ouml;z konusu bilgileri ve/veya portal hizmetlerini deðiþtirebilir, d&uuml;zeltebilir ve/veya &ccedil;ýkarabilir.  ".$sitename." web sitesi''nin ve portal hizmetlerinin hatasýz olmasý i&ccedil;in her t&uuml;rl&uuml; tedbiri almýþtýr. Bununla birlikte sitede mevcut yada oluþabilecek hatalar ile ilgili herhangi bir garanti verilmemektedir.<br />\r\n<br />\r\n3.11. Bu ".$sitename." internet sitesine eriþimden, sitede yer alan bilgilerin ve/veya portal hizmetlerinin gerek doðrudan gerekse dolaylý kullanýmýndan kaynaklanan doðrudan ve/veya dolaylý maddi ve/veya manevi menfi ve/veya m&uuml;sbet, velhasýl her t&uuml;rl&uuml; zarardan her nam altýnda olursa olsun ".$sitename.", y&ouml;netim kurulu &uuml;yeleri, y&ouml;neticileri, &ccedil;alýþanlarý, bu sitede yer alan bilgileri ve/veya portal hizmetlerini hazýrlayan kiþiler sorumlu tutulamaz.&nbsp;<br />\r\n<br />\r\n3.12. ".$sitename." internet sitesinde yer alan, bunlarý i&ccedil;eren ama bunlarla sýnýrlý olmayan t&uuml;m malzeme ve d&ouml;k&uuml;manlar  ".$sitename." m&uuml;lkiyetinde olup, bu malzeme ve d&ouml;k&uuml;manlara iliþkin telif hakký ve/veya diðer fikri m&uuml;lkiyet haklarý ilgili kanunlarca korunmakta olup, bu malzemeler ve d&ouml;k&uuml;manlar &uuml;ye tarafýndan izinsiz kullanýlamaz, iktisap edilemez ve deðiþtirilemez. Bu web sitesinde adý ge&ccedil;en baþkaca þirketler ve &uuml;r&uuml;nleri sahiplerinin ticari markalarýdýr ve ayrýca fikri m&uuml;lkiyet haklarý kapsamýnda korunmaktadýr. <br />\r\n<br />\r\n3.13. ".$sitename." internet sitesinde malzemeler ve d&ouml;k&uuml;manlar &uuml;ye tarafýndan deðiþtirilebilir, kopyalanabilir, &ccedil;oðaltýlabilir ve yeniden yayýnlanabilir fakat ".$sitename." bunlardan dolayý hi&ccedil; bir þekilde sorulu tutulamaz.<br />\r\n<br />\r\n3.14.  ".$sitename." internet sitesinin iyileþtirilmesi, geliþtirilmesine y&ouml;nelik olarak ve/veya yasal mevzuat &ccedil;er&ccedil;evesinde siteye eriþmek i&ccedil;in kullanýlan Internet servis saðlayýcýsýnýn adý ve Internet Protokol (IP) adresi, Siteye eriþilen tarih ve saat, sitede bulunulan sýrada eriþilen sayfalar ve siteye doðrudan baðlanýlmasýný saðlayan Web sitesinin Internet adresi gibi birtakým bilgiler toplanabilir.<br />\r\n<br />\r\n3.15.  ".$sitename." kullanýcýlarýna daha iyi hizmet sunmak, &uuml;r&uuml;nlerini ve hizmetlerini iyileþtirmek, sitenin kullanýmýný kolaylaþtýrmak i&ccedil;in kullanýmýný kullanýcýlarýnýn &ouml;zel tercihlerine ve ilgi alanlarýna y&ouml;nelik &ccedil;alýþmalarda &uuml;yelerin kiþisel bilgilerini kullanabilir. ".$sitename.", &uuml;yenin portal hizmetlerini alýrken ".$sitename." internet sitesi &uuml;zerinde yaptýðý hareketlerin kaydýný bulundurma hakkýný saklý tutar.<br />\r\n<br />\r\n3.16. ".$sitename.", &uuml;yenin kiþisel bilgilerini yasal bir zorunluluk olarak istendiðinde veya (a) yasal gereklere uygun hareket etmek veya  ".$sitename." ya da  www.".$sitename." sitesine teblið edilen yasal iþlemlere uymak; (b)  ".$sitename." ve  ".$sitename." web sitesi ailesinin haklarýný ve m&uuml;lkiyetini korumak ve savunmak i&ccedil;in gerekli olduðuna iyi niyetle kanaat getirdiði hallerde a&ccedil;ýklayabilir. <br />\r\n<br />\r\n3.17.  ".$sitename." web sitesinin virus ve benzeri ama&ccedil;lý yazýlýmlardan arýndýrýlmýþ olmasý i&ccedil;in mevcut imkanlar dahilinde tedbir alýnmýþtýr. Bunun yanýnda nihai g&uuml;venliðin saðlanmasý i&ccedil;in kullanýcýnýn, kendi virus koruma sistemini tedarik etmesi ve gerekli korunmayý saðlamasýý gerekmektedir. Bu baðlamda &uuml;ye  ".$sitename." web sitesi''ne girmesiyle, kendi yazýlým ve iþletim sistemlerinde oluþabilecek t&uuml;m hata ve bunlarýn doðrudan yada dolaylý sonu&ccedil;larýndan kendisinin sorumlu olduðunu kabul etmiþ sayýlýr.<br />\r\n<br />\r\n3.18. ".$sitename.", sitenin i&ccedil;eriðini dilediði zaman deðiþtirme, kullanýcýlara saðlanan herhangi bir hizmeti deðiþtirme yada sona erdirme veya  ".$sitename." web sitesi''nde kayýtlý kullanýcý bilgi ve verilerini silme hakkýný saklý tutar. <br />\r\n<br />\r\n3.19. ".$sitename.", &uuml;yelik s&ouml;zleþmesinin koþullarýný hi&ccedil;bir þekil ve surette &ouml;n ihbara ve/veya ihtara gerek kalmaksýzýn her zaman deðiþtirebilir, g&uuml;ncelleyebilir veya iptal edebilir. Deðiþtirilen, g&uuml;ncellenen yada y&uuml;r&uuml;rl&uuml;kten kaldýrýlan her h&uuml;k&uuml;m , yayýn tarihinde t&uuml;m &uuml;yeler bakýmýndan h&uuml;k&uuml;m ifade edecektir.<br />\r\n<br />\r\n3.20. Taraflar, ".$sitename."''a ait t&uuml;m bilgisayar kayýtlarýnýn tek ve ger&ccedil;ek m&uuml;nhasýr delil olarak, HUMK madde 287''ye uygun þekilde esas alýnacaðýný ve s&ouml;z konusu kayýtlarýn bir delil s&ouml;zleþmesi teþkil ettiði hususunu kabul ve beyan eder.<br />\r\n<br />\r\n4. S&ouml;zleþmenin Feshi<br />\r\n<br />\r\nÝþbu s&ouml;zleþme &uuml;yenin &uuml;yeliðini iptal etmesi veya  ".$sitename." tarafýndan &uuml;yeliðinin iptal edilmesine kadar y&uuml;r&uuml;rl&uuml;kte kalacaktýr. ".$sitename." &uuml;yenin &uuml;yelik s&ouml;zleþmesinin herhangi bir h&uuml;km&uuml;n&uuml; ihlal etmesi durumunda &uuml;yenin &uuml;yeliðini iptal ederek s&ouml;zleþmeyi tek taraflý olarak feshedebilecektir. <br />\r\n&nbsp;</p>\r\n<p>5. Ýhtilaflerin Halli<br />\r\n<br />\r\nÝþbu s&ouml;zleþmeye iliþkin ihtilaflerde Ýstanbul Mahkemeleri ve Ýcra Daireleri yetkilidir. <br />\r\n6. Y&uuml;r&uuml;rl&uuml;k<br />\r\n<br />\r\n&Uuml;yenin, &uuml;yelik kaydý yapmasý &uuml;yenin &uuml;yelik s&ouml;zleþmesinde yer alan t&uuml;m maddeleri okuduðu ve &uuml;yelik s&ouml;zleþmesinde yer alan maddeleri kabul ettiði anlamýna gelir. Ýþbu S&ouml;zleþme &uuml;yenin &uuml;ye olmasý anýnda akdedilmiþ ve karþýlýklý olarak y&uuml;r&uuml;rl&uuml;l&uuml;ðe girmiþtir.<br />\r\n&nbsp;</p>', 6, '2010-01-24 00:00:00', '16:37:50', NULL, '1', 0, '2010-01-24', '16:44:52', 1264344292, 'TR')",$conn);

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
