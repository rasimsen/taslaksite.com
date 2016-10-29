# MySQL-Front 3.2  (Build 10.21)

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;

/*!40101 SET NAMES utf8 */;
/*!40103 SET TIME_ZONE='SYSTEM' */;

# Host: localhost    Database: rs_taslaksite
# ------------------------------------------------------
# Server version 5.0.67-community-nt

#
# Table structure for table taslak_anim
#

CREATE TABLE `taslak_anim` (
  `Id` int(11) NOT NULL auto_increment,
  `FOTO_ADI` varchar(128) default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=502 DEFAULT CHARSET=utf8;

#
# Dumping data for table taslak_anim
#


#
# Table structure for table taslak_conf
#

CREATE TABLE `taslak_conf` (
  `ID` int(11) NOT NULL auto_increment,
  `DEGISKEN` varchar(128) collate utf8_turkish_ci default NULL,
  `DEGER` varchar(255) collate utf8_turkish_ci default NULL,
  `ACIKLAMA` varchar(255) collate utf8_turkish_ci default NULL,
  `DURUM` enum('0','1') collate utf8_turkish_ci default '1',
  `ADMIN_ID` smallint(6) default NULL,
  `OLUS_TARIHI` date default NULL,
  `OLUS_SAATI` time default NULL,
  `DEG_TARIHI` date default NULL,
  `DEG_SAATI` time default NULL,
  `SIZ` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

#
# Dumping data for table taslak_conf
#

INSERT INTO `taslak_conf` VALUES (1,'TITLE','.:: Taslak Site - Hýzlý, güvenli, kaliteli web site oluþturma aracý ::. ','<br>Sitenin adý','1',NULL,NULL,NULL,'2009-03-04','1:19:59',1236122399);
INSERT INTO `taslak_conf` VALUES (2,'DESCRIPTION','Taslak Site - Hýzlý, güvenli, kaliteli web site oluþturma aracý','<br>Arama motorlarýnda sitenin listelenmesi için görünen açýklama','1',NULL,NULL,NULL,'2009-03-04','1:19:59',1236122399);
INSERT INTO `taslak_conf` VALUES (3,'KEYWORDS','rasim þen, e-business, e-ticaret,kurumsal site,web site, CMS, portal, open source, gpl, dinamik içerikli site','<br>Arama motorlarý için sitenin içeriði ile ilgili anahtar kelimeler','1',NULL,NULL,NULL,'2009-03-04','1:19:59',1236122399);
INSERT INTO `taslak_conf` VALUES (6,'MAIL_SMTP','mail.taslaksite.com',NULL,'1',NULL,NULL,NULL,'2009-03-04','1:19:59',1236122399);
INSERT INTO `taslak_conf` VALUES (7,'SAHIP_ADI','<a href=\"http://www.asisoft.biz\"><b>ASÝ SOFT</b></a>','<br>Sitenin ait olduðu þirket yada kiþi adý','1',NULL,NULL,NULL,'2009-03-04','1:20:41',1236122441);
INSERT INTO `taslak_conf` VALUES (8,'SAHIP_EMAIL','asi@asisoft.biz',NULL,'1',NULL,NULL,NULL,'2009-03-04','1:19:59',1236122399);
INSERT INTO `taslak_conf` VALUES (9,'SAHIP_TEL1','0212 635 0757',NULL,'1',NULL,NULL,NULL,'2009-03-04','1:19:59',1236122399);
INSERT INTO `taslak_conf` VALUES (10,'SAHIP_TEL2','',NULL,'1',NULL,NULL,NULL,'2009-03-04','1:19:59',1236122399);
INSERT INTO `taslak_conf` VALUES (11,'SAHIP_FAX','0212 635 0757',NULL,'1',NULL,NULL,NULL,'2009-03-04','1:19:59',1236122399);
INSERT INTO `taslak_conf` VALUES (12,'SAHIP_CEP','0544 567 1067',NULL,'1',NULL,NULL,NULL,'2009-03-04','1:19:59',1236122399);
INSERT INTO `taslak_conf` VALUES (13,'SAHIP_ADRES','Unkapaný Müzik Aletleri Çarþýsý Atatürk Bulvarý Ünlü Ýþ Merkezi A Blok No:23 Unkapaný - Fatih / Ýstanbul',NULL,'1',NULL,NULL,NULL,'2009-03-04','1:19:59',1236122399);
INSERT INTO `taslak_conf` VALUES (14,'GALERI_FOTO_W','96','<br>Galeri fotoðraflarýnýn görüntüleneceði boyut(px)','1',NULL,NULL,NULL,'2009-03-04','1:19:59',1236122399);
INSERT INTO `taslak_conf` VALUES (15,'GALERI_FOTO_H','',NULL,'1',NULL,NULL,NULL,'2009-03-04','1:19:59',1236122399);
INSERT INTO `taslak_conf` VALUES (16,'FOTO_W','512','<br>Büyük fotograflarýn boyutlarý(px)','1',NULL,NULL,NULL,'2009-03-04','1:19:59',1236122399);
INSERT INTO `taslak_conf` VALUES (17,'FOTO_H','',NULL,'1',NULL,NULL,NULL,'2009-03-04','1:19:59',1236122399);
INSERT INTO `taslak_conf` VALUES (36,'IK_CV_EXTENSION','doc,docx,pdf,rft',NULL,'1',NULL,NULL,NULL,'2009-03-04','1:19:59',1236122399);
INSERT INTO `taslak_conf` VALUES (38,'IK_CV_SAVE_PATH','ik_cv',NULL,'1',NULL,NULL,NULL,'2009-03-04','1:19:59',1236122399);
INSERT INTO `taslak_conf` VALUES (39,'UYELIK_SISTEMI_OLSUN','1',NULL,'1',NULL,NULL,NULL,'2009-03-04','1:19:59',1236122399);
INSERT INTO `taslak_conf` VALUES (40,'SADECE_UYE_YORUMLASIN','1',NULL,'1',NULL,NULL,NULL,'2009-03-04','1:19:59',1236122399);
INSERT INTO `taslak_conf` VALUES (41,'YORUM_ADMIN_ONAYLI','1',NULL,'1',NULL,NULL,NULL,'2009-03-04','1:19:59',1236122399);

#
# Table structure for table taslak_ebulten
#

CREATE TABLE `taslak_ebulten` (
  `ID` int(11) NOT NULL auto_increment,
  `BASLIK` varchar(256) collate utf8_turkish_ci default NULL,
  `HIZLI_BAKIS_ICERIK` varchar(255) collate utf8_turkish_ci default NULL,
  `ICERIK` mediumtext collate utf8_turkish_ci,
  `GONDERIM_DURUM` enum('0','1') collate utf8_turkish_ci default '0',
  `GONDERIM_TARIHI` date default NULL,
  `GONDERIM_SAATI` time default NULL,
  `DURUM` enum('0','1') collate utf8_turkish_ci default '1',
  `ADMIN_ID` smallint(6) default NULL,
  `OLUS_TARIHI` date default NULL,
  `OLUS_SAATI` time default NULL,
  `DEG_TARIHI` date default NULL,
  `DEG_SAATI` time default NULL,
  `SIZ` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

#
# Dumping data for table taslak_ebulten
#

INSERT INTO `taslak_ebulten` VALUES (18,'Hoþgeldiniz..','Deneme mesajý..\r\ngüncelleme','Taslaksite.com&nbsp; a hoþgeldiniz..','0',NULL,NULL,'0',6,'2008-12-20','10:05:15','2008-12-20','10:20:25',1229779225);

#
# Table structure for table taslak_ebulten_email
#

CREATE TABLE `taslak_ebulten_email` (
  `ID` int(11) NOT NULL auto_increment,
  `EMAIL` varchar(128) collate utf8_turkish_ci default NULL,
  `BGONDERIM_DURUM` enum('0','1') collate utf8_turkish_ci default '0',
  `DURUM` enum('0','1') collate utf8_turkish_ci default '1',
  `ADMIN_ID` smallint(6) default NULL,
  `OLUS_TARIHI` date default NULL,
  `OLUS_SAATI` time default NULL,
  `DEG_TARIHI` date default NULL,
  `DEG_SAATI` time default NULL,
  `SIZ` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

#
# Dumping data for table taslak_ebulten_email
#

INSERT INTO `taslak_ebulten_email` VALUES (18,'rasimsen@hotmail.com','0','1',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `taslak_ebulten_email` VALUES (19,'rasimsen@gmail.com','0','1',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `taslak_ebulten_email` VALUES (20,'rsen@rasimsen.com','0','1',NULL,NULL,NULL,NULL,NULL,NULL);

#
# Table structure for table taslak_fotolar
#

CREATE TABLE `taslak_fotolar` (
  `ID` int(11) NOT NULL auto_increment,
  `TIP` varchar(16) collate utf8_turkish_ci default 'REF',
  `REF_ID` int(11) default NULL,
  `AD` varchar(128) collate utf8_turkish_ci default NULL,
  `KISA_ACIKLAMA` varchar(255) collate utf8_turkish_ci default NULL,
  `THUMBNAIL` varchar(128) collate utf8_turkish_ci default NULL,
  `FOTO` varchar(128) collate utf8_turkish_ci default NULL,
  `DOSYA_URL` varchar(255) collate utf8_turkish_ci default NULL,
  `DOSYA_TIPI` varchar(255) collate utf8_turkish_ci default NULL,
  `BOYUT` int(11) default NULL,
  `THUMB_GENISLIK` int(11) default NULL,
  `THUMB_YUKSEKLIK` int(11) default NULL,
  `FOTO_GENISLIK` int(11) default NULL,
  `FOTO_YUKSEKLIK` int(11) default NULL,
  `SIRA` int(11) default '0',
  `ADMIN_ID` smallint(3) default NULL,
  `DURUM` enum('1','0') collate utf8_turkish_ci default NULL,
  `OLUS_TARIHI` datetime default NULL,
  `OLUS_SAATI` time default NULL,
  `DEG_TARIHI` date default NULL,
  `DEG_SAATI` time default NULL,
  `SIZ` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=193 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

#
# Dumping data for table taslak_fotolar
#

INSERT INTO `taslak_fotolar` VALUES (182,'FOTO',1,NULL,NULL,'sTh_4915dd6b4e8ff4.jpg','s_4915dd6b4e8ff4.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,'1',NULL,NULL,NULL,NULL,NULL);
INSERT INTO `taslak_fotolar` VALUES (183,'FOTO',85,NULL,NULL,'sTh_4915dd8cbe83f7.jpg','s_4915dd8cbe83f7.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,'0',NULL,NULL,NULL,NULL,NULL);
INSERT INTO `taslak_fotolar` VALUES (184,'FOTO',85,NULL,NULL,'sTh_4915dd8ce45396.jpg','s_4915dd8ce45396.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,'1',NULL,NULL,NULL,NULL,NULL);
INSERT INTO `taslak_fotolar` VALUES (185,'FOTO',2,NULL,NULL,'sTh_4956b3393a8627.jpg','s_4956b3393a8627.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,6,'1',NULL,NULL,NULL,NULL,NULL);
INSERT INTO `taslak_fotolar` VALUES (189,'FILE',24,NULL,NULL,NULL,NULL,'CV_4956c2f561b269.docx','application/vnd.openxmlformats-officedocument.wordprocessingml.document',NULL,NULL,NULL,NULL,NULL,0,NULL,'1','2008-12-28 00:00:00','2:06:13','2008-12-28','2:06:13',1230422773);
INSERT INTO `taslak_fotolar` VALUES (190,'FILE',25,NULL,NULL,NULL,NULL,'CV_4956c31ab03461.docx','application/vnd.openxmlformats-officedocument.wordprocessingml.document',NULL,NULL,NULL,NULL,NULL,0,NULL,'1','2008-12-28 00:00:00','2:06:50','2008-12-28','2:06:50',1230422810);
INSERT INTO `taslak_fotolar` VALUES (191,'FILE',26,NULL,NULL,NULL,NULL,'CV_4956c349bba3d5.doc','application/msword',NULL,NULL,NULL,NULL,NULL,0,NULL,'1','2008-12-28 00:00:00','2:07:37','2008-12-28','2:07:37',1230422857);
INSERT INTO `taslak_fotolar` VALUES (192,'FOTO',2,NULL,NULL,'sTh_49a32eb849d618.jpg','s_49a32eb849d618.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,6,'1','2009-02-24 00:00:00','1:18:16','2009-02-24','1:18:16',1235431096);

#
# Table structure for table taslak_iletisim
#

CREATE TABLE `taslak_iletisim` (
  `ID` int(11) NOT NULL auto_increment,
  `MESAJ_TIPI` varchar(16) collate utf8_turkish_ci default 'BILGI',
  `GONDEREN_ADI` varchar(64) collate utf8_turkish_ci default NULL,
  `TEL` varchar(11) collate utf8_turkish_ci default NULL,
  `EMAIL` varchar(64) collate utf8_turkish_ci default NULL,
  `KONU` varchar(128) collate utf8_turkish_ci default NULL,
  `MESAJ` text collate utf8_turkish_ci,
  `ADMIN_ID` int(11) default NULL,
  `OLUS_TARIHI` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `DEGISME_TARIHI` datetime NOT NULL default '0000-00-00 00:00:00',
  `DURUM` enum('1','0') collate utf8_turkish_ci default '1',
  `MESAJ_DURUMU` enum('OKUNMADI','OKUNDU') collate utf8_turkish_ci default 'OKUNMADI',
  `DEG_TARIHI` date default NULL,
  `DEG_SAATI` time default NULL,
  `OLUS_SAATI` time default NULL,
  `SIZ` int(11) default NULL,
  `DOSYA_EKI` enum('VAR','YOK') collate utf8_turkish_ci default 'YOK',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

#
# Dumping data for table taslak_iletisim
#

INSERT INTO `taslak_iletisim` VALUES (15,'BILGI','Rasim ÞEN','02123268554','rasimsen@gmail.com','test içerik..','ffdsaþfj sf\r\nsaf\r\ndsa\r\nfdsaf',NULL,'2008-12-28 00:00:00','0000-00-00 00:00:00','1','OKUNMADI','2008-12-28','1:48:17','1:48:17',1230421697,'VAR');
INSERT INTO `taslak_iletisim` VALUES (16,'BILGI','Rasim ÞEN','02123268554','rasimsen@hotmail.com','test içerik..','gggggggggggggggggggggggggggggg',NULL,'2008-12-28 00:00:00','0000-00-00 00:00:00','1','OKUNMADI','2008-12-28','1:50:05','1:50:05',1230421805,'VAR');
INSERT INTO `taslak_iletisim` VALUES (17,'BILGI','Rasim ÞEN','02123268554','rasimsen@hotmail.com','test içerik..','gggggggggggggggggggggggggggggg',NULL,'2008-12-28 02:28:55','2008-12-28 02:28:55','1','OKUNDU','2008-12-28','1:52:40','1:52:40',1230421960,'VAR');
INSERT INTO `taslak_iletisim` VALUES (18,'BILGI','Rasim ÞEN','02123268554','rasimsen@hotmail.com','test içerik..','gggggggggggggggggggggggggggggg',NULL,'2008-12-28 00:00:00','0000-00-00 00:00:00','1','OKUNMADI','2008-12-28','1:54:18','1:54:18',1230422058,'VAR');
INSERT INTO `taslak_iletisim` VALUES (19,'BILGI','Rasim ÞEN','02123268554','rasimsen@hotmail.com','test içerik..','gggggggggggggggggggggggggggggg',NULL,'2008-12-28 00:00:00','0000-00-00 00:00:00','1','OKUNMADI','2008-12-28','1:55:42','1:55:42',1230422142,'VAR');
INSERT INTO `taslak_iletisim` VALUES (20,'BILGI','Rasim ÞEN','02123268554','rasimsen@hotmail.com','test içerik..','gggggggggggggggggggggggggggggg',NULL,'2008-12-28 00:00:00','0000-00-00 00:00:00','1','OKUNMADI','2008-12-28','1:58:31','1:58:31',1230422311,'VAR');
INSERT INTO `taslak_iletisim` VALUES (21,'BILGI','Rasim ÞEN','02123268554','rasimsen@hotmail.com','test içerik..','gggggggggggggggggggggggggggggg',NULL,'2008-12-28 00:00:00','0000-00-00 00:00:00','1','OKUNMADI','2008-12-28','1:58:55','1:58:55',1230422335,'VAR');
INSERT INTO `taslak_iletisim` VALUES (22,'BILGI','Rasim ÞEN','02123268554','rasimsen@hotmail.com','test içerik..','gggggggggggggggggggggggggggggg',NULL,'2008-12-28 00:00:00','0000-00-00 00:00:00','1','OKUNMADI','2008-12-28','1:59:52','1:59:52',1230422392,'VAR');
INSERT INTO `taslak_iletisim` VALUES (23,'BILGI','Rasim ÞEN','02123268554','rasimsen@hotmail.com','test içerik..','gggggggggggggggggggggggggggggg',NULL,'2009-01-02 01:02:35','2009-01-02 01:02:35','1','OKUNDU','2008-12-28','2:05:28','2:05:28',1230422728,'VAR');
INSERT INTO `taslak_iletisim` VALUES (24,'BILGI','Rasim ÞEN','02123268554','rasimsen@hotmail.com','test içerik..','gggggggggggggggggggggggggggggg',NULL,'2008-12-28 00:00:00','0000-00-00 00:00:00','1','OKUNMADI','2008-12-28','2:06:13','2:06:13',1230422773,'VAR');
INSERT INTO `taslak_iletisim` VALUES (25,'BILGI','Rasim ÞEN','02123268554','rasimsen@hotmail.com','test içerik..','gggggggggggggggggggggggggggggg',NULL,'2008-12-28 00:00:00','0000-00-00 00:00:00','1','OKUNMADI','2008-12-28','2:06:50','2:06:50',1230422810,'VAR');
INSERT INTO `taslak_iletisim` VALUES (26,'BILGI','XXXXXXXX','','rasimsen@hotmail.com','GGGGGGGGGg','gdfsgdsfg gdfsgdfg',NULL,'2008-12-28 02:38:27','2008-12-28 02:38:27','1','OKUNDU','2008-12-28','2:07:37','2:07:37',1230422857,'VAR');
INSERT INTO `taslak_iletisim` VALUES (27,'BILGI','','','','','',NULL,'2009-01-10 20:07:03','0000-00-00 00:00:00','1','OKUNMADI',NULL,NULL,NULL,NULL,'YOK');
INSERT INTO `taslak_iletisim` VALUES (28,'BILGI','','','','','',NULL,'2009-01-10 20:07:10','0000-00-00 00:00:00','1','OKUNMADI',NULL,NULL,NULL,NULL,'YOK');
INSERT INTO `taslak_iletisim` VALUES (29,'BILGI','','','','','',NULL,'2009-01-10 20:07:22','0000-00-00 00:00:00','1','OKUNMADI',NULL,NULL,NULL,NULL,'YOK');
INSERT INTO `taslak_iletisim` VALUES (30,'BILGI','','','','','',NULL,'2009-01-10 20:16:30','0000-00-00 00:00:00','1','OKUNMADI',NULL,NULL,NULL,NULL,'YOK');
INSERT INTO `taslak_iletisim` VALUES (31,'BILGI','','','','','',NULL,'2009-01-10 20:18:38','0000-00-00 00:00:00','1','OKUNMADI',NULL,NULL,NULL,NULL,'YOK');
INSERT INTO `taslak_iletisim` VALUES (32,'BILGI','','','','','',NULL,'2009-01-10 20:21:33','0000-00-00 00:00:00','1','OKUNMADI',NULL,NULL,NULL,NULL,'YOK');
INSERT INTO `taslak_iletisim` VALUES (33,'BILGI','','','','','',NULL,'2009-01-10 20:22:41','0000-00-00 00:00:00','1','OKUNMADI',NULL,NULL,NULL,NULL,'YOK');
INSERT INTO `taslak_iletisim` VALUES (34,'BILGI','','','','','',NULL,'2009-01-10 20:24:25','0000-00-00 00:00:00','1','OKUNMADI',NULL,NULL,NULL,NULL,'YOK');
INSERT INTO `taslak_iletisim` VALUES (35,'BILGI','','','','','',NULL,'2009-01-10 20:27:51','0000-00-00 00:00:00','1','OKUNMADI',NULL,NULL,NULL,NULL,'YOK');

#
# Table structure for table taslak_kullanicilar
#

CREATE TABLE `taslak_kullanicilar` (
  `ID` int(11) NOT NULL auto_increment,
  `KULLANICI_ADI` varchar(24) collate utf8_turkish_ci default NULL,
  `SIFRE` varchar(64) collate utf8_turkish_ci default NULL,
  `DURUM` enum('1','0') collate utf8_turkish_ci default '1',
  `AKTIVASYON_KODU` varchar(16) collate utf8_turkish_ci default NULL,
  `AD` varchar(32) collate utf8_turkish_ci default NULL,
  `SOYAD` varchar(48) collate utf8_turkish_ci default NULL,
  `ADRES` varchar(128) collate utf8_turkish_ci default NULL,
  `TEL` varchar(11) collate utf8_turkish_ci default NULL,
  `EMAIL` varchar(48) collate utf8_turkish_ci default NULL,
  `EGITIM` varchar(64) collate utf8_turkish_ci default NULL,
  `CINSIYET` enum('ERKEK','BAYAN') collate utf8_turkish_ci default NULL,
  `DOGUM_TARIHI` date default NULL,
  `SEHIR` varchar(80) collate utf8_turkish_ci default NULL,
  `ULKE` varchar(80) collate utf8_turkish_ci default NULL,
  `TIP` enum('YONETICI','KULLANICI') collate utf8_turkish_ci default NULL,
  `SESSION_ID` varchar(128) collate utf8_turkish_ci default NULL,
  `IP` varchar(64) collate utf8_turkish_ci default NULL,
  `OLUS_TARIHI` date default NULL,
  `OLUS_SAATI` time default NULL,
  `DEG_TARIHI` date default NULL,
  `DEG_SAATI` time default NULL,
  `SIZ` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

#
# Dumping data for table taslak_kullanicilar
#

INSERT INTO `taslak_kullanicilar` VALUES (1,'super','96a3339ed323fd5d6bd3a08ef0f354fc','1',NULL,'Super','Admin',NULL,NULL,'rasimsen@hotmail.com',NULL,NULL,NULL,NULL,NULL,'YONETICI',NULL,NULL,NULL,NULL,'2008-11-16','12:24:33',1226849073);
INSERT INTO `taslak_kullanicilar` VALUES (6,'rasimsen','96a3339ed323fd5d6bd3a08ef0f354fc','1',NULL,'Rasim','ÞEN',NULL,NULL,'rasimsen@gmail.com',NULL,NULL,NULL,NULL,NULL,'YONETICI','ec7ocq06m6kf9qrgqu17d4prv4','127.0.0.1',NULL,NULL,'2008-11-16','12:24:20',1226849060);
INSERT INTO `taslak_kullanicilar` VALUES (8,'kazimsaygi','e10adc3949ba59abbe56e057f20f883e','1',NULL,'Kazým','Saygý',NULL,NULL,'kazimsaygi@hotmail.com',NULL,NULL,NULL,NULL,NULL,'YONETICI',NULL,NULL,'2008-11-16','12:06:02','2008-11-16','12:24:26',1226849066);
INSERT INTO `taslak_kullanicilar` VALUES (12,'rasim','96a3339ed323fd5d6bd3a08ef0f354fc','1',NULL,'rasim','þen','','','rsen@anadolubank.com.tr','Ýlköðretim','ERKEK','1979-01-01','5','TR','KULLANICI','e4n8aa6iov5nq6m8ca76bgrdq4','127.0.0.1','2009-01-11','20:04:06','2009-02-08','21:42:02',1234122122);

#
# Table structure for table taslak_link_kutulari
#

CREATE TABLE `taslak_link_kutulari` (
  `ID` int(11) NOT NULL auto_increment,
  `KUTU_ADI` varchar(128) collate utf8_turkish_ci default NULL,
  `SIRA` smallint(6) default '0',
  `DURUM` enum('1','0','2') collate utf8_turkish_ci default NULL,
  `ADMIN_ID` int(11) default NULL,
  `OLUS_TARIHI` date default NULL,
  `OLUS_SAATI` time default NULL,
  `DEG_TARIHI` date default NULL,
  `DEG_SAATI` time default NULL,
  `SIZ` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

#
# Dumping data for table taslak_link_kutulari
#

INSERT INTO `taslak_link_kutulari` VALUES (18,'Hýzlý Arama',2,'1',6,'2009-02-22','1:29:55','2009-02-23','1:03:58',1235343838);
INSERT INTO `taslak_link_kutulari` VALUES (19,'e-Bülten',3,'1',6,'2009-02-22','1:30:11','2009-02-23','1:03:59',1235343839);
INSERT INTO `taslak_link_kutulari` VALUES (20,'Üye Giriþi',1,'1',6,'2009-02-22','1:30:50','2009-02-23','1:03:58',1235343838);
INSERT INTO `taslak_link_kutulari` VALUES (21,'Alexa Top10',8,'1',6,'2009-02-23','0:41:42','2009-02-23','1:03:59',1235343839);
INSERT INTO `taslak_link_kutulari` VALUES (22,'Gazeteler',7,'1',6,'2009-02-23','0:41:52','2009-02-23','1:03:59',1235343839);
INSERT INTO `taslak_link_kutulari` VALUES (23,'BT Destekleri',4,'1',6,'2009-02-23','0:42:29','2009-02-23','1:03:59',1235343839);
INSERT INTO `taslak_link_kutulari` VALUES (24,'Türkiye Top 10',6,'1',6,'2009-02-23','0:42:55','2009-02-23','1:03:59',1235343839);
INSERT INTO `taslak_link_kutulari` VALUES (25,'Türkiye Açýk Kaynak',5,'1',6,'2009-02-23','0:43:11','2009-02-23','1:03:59',1235343839);

#
# Table structure for table taslak_link_kutulari_icerik
#

CREATE TABLE `taslak_link_kutulari_icerik` (
  `ID` int(11) NOT NULL auto_increment,
  `PARENT` int(11) default NULL,
  `LINK_ADI` varchar(128) collate utf8_turkish_ci default NULL,
  `LINK_URL` varchar(255) collate utf8_turkish_ci default NULL,
  `LINK_TARGET` enum('_SELF','_BLANK') collate utf8_turkish_ci default '_SELF',
  `LINK_SOURCE` mediumtext collate utf8_turkish_ci,
  `SIRA` smallint(6) default '0',
  `DURUM` enum('1','0','2') collate utf8_turkish_ci default NULL,
  `ADMIN_ID` int(11) default NULL,
  `OLUS_TARIHI` date default NULL,
  `OLUS_SAATI` time default NULL,
  `DEG_TARIHI` date default NULL,
  `DEG_SAATI` time default NULL,
  `SIZ` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

#
# Dumping data for table taslak_link_kutulari_icerik
#

INSERT INTO `taslak_link_kutulari_icerik` VALUES (22,18,'Hýzlý Arama (Ekranda Görünmez)','','_SELF','<form id=\"form1\" name=\"form1\" method=\"post\" action=\"arama.php\">\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\">\r\n  <tr align=\"left\">\r\n    <td><input type=\"text\" name=\"arama_text\" size=\"10\" maxlength=\"100\" class=\"data\" onfocus=\"javascript:this.className=\'data2\'\" onblur=\"javascript:this.className=\'data\'\"/></td>\r\n    <td><input type=\"submit\" name=\"btnHizliArama\" value=\"Ara\" /></td>\r\n  </tr>\r\n</table>\r\n</form>',0,'1',6,'2009-02-22','1:31:59','2009-02-22','21:34:16',1235331256);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (23,20,'Üye Giriþi(Ekranda Gözükmeyecek)','','_SELF','<form id=\"form1\" name=\"form1\" method=\"post\" action=\"\">\r\n		<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\">\r\n		  <tr align=\"left\">\r\n		    <td class=\"label\" width=\"100px\">Kullanýcý Adý </td>\r\n		    <td><input type=\"text\" name=\"kullanici_adi\" size=\"10\" class=\"data\" onfocus=\"javascript:this.className=\'data2\'\" onblur=\"javascript:this.className=\'data\'\"/></td>\r\n		  </tr>\r\n		  <tr align=\"left\"> \r\n		    <td class=\"label\">Þifre</td>\r\n		    <td><input type=\"password\" name=\"sifre\" size=\"10\" class=\"data\"  onfocus=\"javascript:this.className=\'data2\'\" onblur=\"javascript:this.className=\'data\'\" /></td>\r\n		  </tr>\r\n		</table>\r\n		<br /><center><input type=\"submit\" name=\"btnUyeGirisi\" value=\"Giriþ\" /></center>\r\n		</form>',0,'1',6,'2009-02-22','1:32:14','2009-02-22','21:19:37',1235330377);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (24,19,'E Bülten (Ekranda Görünmeyecektir)','','_SELF','<form id=\"form1\" name=\"form1\" method=\"post\" action=\"ebulten.php\">\r\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\">\r\n  <tr align=\"left\"><td>Email:</td><td><input type=\"text\" name=\"ebulten_text\" size=\"13\" maxlength=\"10\" class=\"data\" onfocus=\"javascript:this.className=\'data2\'\" onblur=\"javascript:this.className=\'data\'\"/></td></tr>\r\n  <tr><td>&nbsp;</td><td><input type=\"submit\" name=\"btnEbulten\" value=\"Kayýt Ol\" /></td></tr>\r\n</table>\r\n</form>',0,'1',6,'2009-02-22','1:32:29','2009-02-22','21:39:04',1235331544);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (25,21,'Yahoo.com','http://www.yahoo.com','_BLANK','',0,'1',6,'2009-02-23','0:44:37','2009-02-23','0:44:37',1235342677);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (26,21,'Google.com','http://www.google.com','_BLANK','',0,'1',6,'2009-02-23','0:45:14','2009-02-23','0:45:14',1235342714);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (27,21,'Youtube.com','http://www.youtube.com','_BLANK','',0,'1',6,'2009-02-23','0:45:35','2009-02-23','0:45:35',1235342735);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (28,21,'Live.com','http://www.live.com','_BLANK','',0,'1',6,'2009-02-23','0:46:01','2009-02-23','0:46:01',1235342761);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (29,21,'Msn.com','http://www.msn.com','_BLANK','',0,'1',6,'2009-02-23','0:46:23','2009-02-23','0:46:23',1235342783);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (30,21,'Myspace.com','http://www.myspace.com','_BLANK','',0,'1',6,'2009-02-23','0:46:47','2009-02-23','0:46:47',1235342807);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (31,21,'Wikipedia.org','http://www.wikipedia.org','_BLANK','',0,'1',6,'2009-02-23','0:47:07','2009-02-23','0:47:07',1235342827);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (32,21,'Facebook.com','http://www.facebook.com','_BLANK','',0,'1',6,'2009-02-23','0:47:32','2009-02-23','0:47:32',1235342852);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (33,21,'Blogger.com','http://www.blogger.com','_BLANK','',0,'1',6,'2009-02-23','0:47:57','2009-02-23','0:47:57',1235342877);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (34,21,'Orkut.com','http://www.orkut.com','_BLANK','',0,'1',6,'2009-02-23','0:48:19','2009-02-23','0:48:19',1235342899);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (35,23,'TÜBÝTAK','http://www.tubitak.gov.tr','_BLANK','',0,'1',6,'2009-02-23','1:00:11','2009-02-23','1:00:11',1235343611);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (36,23,'KOSGEB','http://www.kosgeb.gov.tr/','_BLANK','',0,'1',6,'2009-02-23','1:00:45','2009-02-23','1:00:45',1235343645);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (37,23,'e-Tohum','http://www.etohum.com','_BLANK','',0,'1',6,'2009-02-23','1:01:40','2009-02-23','1:01:40',1235343700);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (38,25,'PARDUS','http://www.pardus.org.tr/','_BLANK','',0,'1',6,'2009-02-23','1:04:14','2009-02-23','1:04:14',1235343854);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (39,25,'Pardus Kullanýcýlarý Derneði','http://www.pkd.org.tr/','_BLANK','',0,'1',6,'2009-02-23','1:07:25','2009-02-23','1:07:25',1235344045);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (40,25,'Ender UNIX','http://enderunix.org/','_SELF','',0,'1',6,'2009-02-23','1:07:46','2009-02-23','1:07:46',1235344066);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (41,25,'Belgeler.org','http://belgeler.org/','_BLANK','',0,'1',6,'2009-02-23','1:08:12','2009-02-23','1:08:12',1235344092);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (42,25,'AçýkKaynak.org','http://www.acikkaynak.org/','_BLANK','',0,'1',6,'2009-02-23','1:08:47','2009-02-23','1:08:47',1235344127);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (43,25,'PHP Türkiye Grubu','http://www.php.org.tr/','_BLANK','',0,'1',6,'2009-02-23','1:09:15','2009-02-23','1:09:15',1235344155);
INSERT INTO `taslak_link_kutulari_icerik` VALUES (44,25,'TBD-Türkiye Biliþim Derneði','http://www.tbd.org.tr/','_BLANK','',0,'1',6,'2009-02-23','1:09:50','2009-02-23','1:09:50',1235344190);

#
# Table structure for table taslak_sayfalar
#

CREATE TABLE `taslak_sayfalar` (
  `ID` int(11) NOT NULL auto_increment,
  `SAYFA_ADI` varchar(48) collate utf8_turkish_ci default NULL,
  `SAYFA_BASLIGI` varchar(128) collate utf8_turkish_ci default NULL,
  `SAYFA_LINKI` varchar(128) collate utf8_turkish_ci default NULL,
  `SAYFA_TASLAGI` varchar(128) collate utf8_turkish_ci default NULL,
  `SAYFA_IKONU` varchar(128) collate utf8_turkish_ci default NULL,
  `SAYFA_TARGET` varchar(16) collate utf8_turkish_ci default NULL,
  `MENUDE_GOSTER` smallint(6) default '0',
  `SAYFA_YERLESIMI` smallint(1) default '1',
  `SADECE_UYE` smallint(6) default '0',
  `YORUM_ACIK` smallint(6) default '0',
  `ARAMAYA_DAHIL` smallint(1) default '0',
  `AKTIF_LINK_KUTULARI` varchar(255) collate utf8_turkish_ci default NULL,
  `SIRA` int(11) default '0',
  `DURUM` enum('1','0','2') collate utf8_turkish_ci default NULL,
  `ADMIN_ID` int(11) default NULL,
  `OLUS_TARIHI` date default NULL,
  `OLUS_SAATI` time default NULL,
  `DEG_TARIHI` date default NULL,
  `DEG_SAATI` time default NULL,
  `SIZ` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

#
# Dumping data for table taslak_sayfalar
#

INSERT INTO `taslak_sayfalar` VALUES (1,'ANA_SAYFA','Anasayfa','index.php','anasayfa.tpl','','_SELF',1,2,0,0,0,NULL,1,'1',6,NULL,NULL,'2008-12-10','20:22:48',1228951368);
INSERT INTO `taslak_sayfalar` VALUES (2,'HAKKIMIZDA','HAKKIMIZDA','hakkimizda.php','taslak_sayfa.tpl','','_SELF',1,1,0,1,1,'21_23_19_18_25_20',2,'1',6,NULL,NULL,'2009-02-23','1:12:09',1235344329);
INSERT INTO `taslak_sayfalar` VALUES (3,'REFERANSLARIMIZ','TaslakSite.com Altyapýsýný Tercih Edenler','referanslarimiz.php','taslak_sayfa.tpl','','_SELF',1,1,0,0,1,'21_23_19_18_25_20',0,'1',6,NULL,NULL,'2009-03-04','1:26:29',1236122789);
INSERT INTO `taslak_sayfalar` VALUES (4,'ILETISIM','Ýletiþim','iletisim.php','iletisim.tpl','','_SELF',0,1,0,0,0,NULL,0,'1',6,NULL,NULL,'2009-03-04','0:49:11',1236120551);
INSERT INTO `taslak_sayfalar` VALUES (5,'HABERLER','HABERLER','haberler.php','taslak_sayfa.tpl','','_SELF',0,1,0,0,0,'21_23_19_18_25_20',0,'1',6,NULL,NULL,'2009-03-04','0:34:53',1236119693);
INSERT INTO `taslak_sayfalar` VALUES (11,'PROJELERIMIZ','Projelerimiz','projelerimiz.php','taslak_sayfa.tpl','','_SELF',0,1,0,1,1,'21_23_19_18_25_20',0,'1',6,NULL,NULL,'2009-03-04','1:32:39',1236123159);
INSERT INTO `taslak_sayfalar` VALUES (12,'INSAN KAYNAKLARI','Ýnsan Kaynaklarý','insankaynaklari.php','insan_kaynaklari.tpl','','_SELF',0,1,0,0,0,NULL,0,'1',6,NULL,NULL,'2009-03-04','1:16:45',1236122205);
INSERT INTO `taslak_sayfalar` VALUES (13,'GIZLILIK POLITIKASI','GIZLILIK POLITIKASI','gizlilik.php','taslak_sayfa.tpl','','_SELF',0,1,0,0,0,'21_23_19_18_25_20',0,'1',6,NULL,NULL,'2009-03-04','0:33:19',1236119599);
INSERT INTO `taslak_sayfalar` VALUES (14,'GENEL BILDIRIMLER','GENEL BILDIRIMLER','genelkullanim.php','taslak_sayfa.tpl','','_SELF',0,1,0,0,0,'21_23_19_22_18_25_24_20',0,'1',6,NULL,NULL,'2009-03-04','0:32:13',1236119533);
INSERT INTO `taslak_sayfalar` VALUES (16,'UYE_OL','Üye Ol','uyeol.php','uyeol.tpl','','_SELF',1,1,0,0,0,NULL,NULL,'1',6,'2009-01-10','16:26:20','2009-01-10','16:26:20',1231597580);
INSERT INTO `taslak_sayfalar` VALUES (17,'UYELIK_SOZLESMESI','Üyelik Sözleþmesi','uyelik_sozlesmesi.php','uyelik_sozlesmesi.tpl','','_SELF',0,1,0,0,0,NULL,NULL,'1',6,'2009-01-10','16:51:52','2009-01-10','16:51:52',1231599112);
INSERT INTO `taslak_sayfalar` VALUES (18,'LINKLER','Linkler','linkler.php','taslak_sayfa.tpl','','_SELF',1,NULL,0,1,0,'21_23_19_18_25_20',0,'1',6,'2009-03-04','1:23:25','2009-03-04','1:24:20',1236122660);
INSERT INTO `taslak_sayfalar` VALUES (19,'YARDIM','Yardým','yardim.php','taslak_sayfa.tpl','','_SELF',1,NULL,0,1,1,NULL,0,'1',6,'2009-03-04','1:29:15','2009-03-04','1:29:15',1236122955);
INSERT INTO `taslak_sayfalar` VALUES (20,'YAPILACAKLAR','Yapýlacaklar Listesi','yapilacaklar.php','taslak_sayfa.tpl','','_SELF',0,1,0,1,1,'21_23_19_18_25_24_20',0,'1',6,'2009-03-04','1:50:02','2009-03-04','1:50:02',1236124202);

#
# Table structure for table taslak_sayfalar_icerik
#

CREATE TABLE `taslak_sayfalar_icerik` (
  `ID` int(11) NOT NULL auto_increment,
  `PARENT` int(11) default NULL,
  `SAYFA_ADI` varchar(64) collate utf8_turkish_ci NOT NULL default '',
  `BASLIK` varchar(128) collate utf8_turkish_ci default NULL,
  `THUMBNAIL` varchar(128) collate utf8_turkish_ci default NULL,
  `KISA_OZET` mediumtext collate utf8_turkish_ci,
  `ICERIK` mediumtext collate utf8_turkish_ci,
  `ADMIN_ID` smallint(3) default NULL,
  `OLUS_TARIHI` datetime default NULL,
  `OLUS_SAATI` time default NULL,
  `DEGISME_TARIHI` datetime default NULL,
  `DURUM` enum('1','0') collate utf8_turkish_ci default '1',
  `SIRA` int(11) default '0',
  `DEG_TARIHI` date default NULL,
  `DEG_SAATI` time default NULL,
  `SIZ` int(11) default NULL,
  PRIMARY KEY  (`ID`),
  KEY `SAYFA_ADI` (`SAYFA_ADI`),
  FULLTEXT KEY `INDX_ARAMA` (`BASLIK`,`KISA_OZET`,`ICERIK`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

#
# Dumping data for table taslak_sayfalar_icerik
#

INSERT INTO `taslak_sayfalar_icerik` VALUES (84,0,'ANA_SAYFA','ANA SAYFA ÖNYAZI',NULL,'deneme jkhfsdahflksdahfljdshf \r\n\r\nfsdakljfþlsakdjfþkl jdþkfds','Firefox can\'t find the server at en-us.www.mozilla.com.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br /><br />The browser could not find the host server for the provided address.<br /><br />&nbsp;&nbsp;&nbsp; * Did you make a mistake when typing the domain? (e.g. &quot;ww.mozilla.org&quot; instead of &quot;www.mozilla.org&quot;)<br />&nbsp;&nbsp;&nbsp; * Are you certain this domain address exists?&nbsp; Its registration may have expired.<br />&nbsp;&nbsp;&nbsp; * Are you unable to browse other sites?&nbsp; Check your network connection and DNS server settings.<br />&nbsp;&nbsp;&nbsp; * Is your computer or network protected by a firewall or proxy?&nbsp; Incorrect settings can interfere with Web browsing.',1,'2008-11-02 00:00:00','12:08:44',NULL,'1',0,'2008-11-02','13:10:44',1225642244);
INSERT INTO `taslak_sayfalar_icerik` VALUES (85,1,'ANA_SAYFA','ALT BASLIK',NULL,'gdsfsfkjsdkf','fsadfsdaf',1,'2008-11-02 00:00:00','13:18:44',NULL,'1',0,'2008-11-02','13:18:44',1225642724);
INSERT INTO `taslak_sayfalar_icerik` VALUES (86,1,'ANA_SAYFA','ALT BASLIK 2',NULL,'fsdaf','fsadf',1,'2008-11-02 00:00:00','13:26:52',NULL,'1',0,'2008-11-02','13:26:52',1225643212);
INSERT INTO `taslak_sayfalar_icerik` VALUES (87,1,'ANA_SAYFA','ALT BASLIK 3',NULL,'fsdafsdafdsafsd ','fsadf',1,'2008-11-02 00:00:00','13:27:54',NULL,'1',0,'2008-11-02','13:27:54',1225643274);
INSERT INTO `taslak_sayfalar_icerik` VALUES (88,1,'ANA_SAYFA','ALT BASLIK 4',NULL,'fsdafsd','ffsdaf',1,'2008-11-02 00:00:00','13:28:38',NULL,'1',0,'2008-11-02','13:28:38',1225643318);
INSERT INTO `taslak_sayfalar_icerik` VALUES (89,1,'ANA_SAYFA','ALT BASLIK 4',NULL,'fsdafsd','ffsdaf',1,'2008-11-02 00:00:00','13:29:47',NULL,'1',0,'2008-11-02','13:29:47',1225643387);
INSERT INTO `taslak_sayfalar_icerik` VALUES (90,1,'ANA_SAYFA','ALT BASLIK 4',NULL,'fsdafsd','ffsdaf',1,'2008-11-02 00:00:00','13:34:08',NULL,'1',0,'2008-11-02','13:34:08',1225643648);
INSERT INTO `taslak_sayfalar_icerik` VALUES (91,1,'ANA_SAYFA','ALT BASLIK 5',NULL,'fsdafsdf','safdf',1,'2008-11-02 00:00:00','13:37:08',NULL,'1',0,'2008-11-02','13:37:08',1225643828);
INSERT INTO `taslak_sayfalar_icerik` VALUES (92,1,'ANA_SAYFA','ALT BASLIK',NULL,'bcvbcvb\r\ngbvcb','bvcxbcvb',1,'2008-11-02 00:00:00','13:38:46',NULL,'1',0,'2008-11-02','13:38:46',1225643926);
INSERT INTO `taslak_sayfalar_icerik` VALUES (93,0,'HAKKIMIZDA','TaslakSite.com Hakkýmýzda..',NULL,'TaslakSite.com ülkemizde türkçe olarak yeterli ölçüde kolay, kullanýþlý, türkçe dökümaný olan site hazýrlama aracý olmamasýndan dolayý bir ihtiyaç olarak geliþtirilmiþ olup tamemen Türkçe dir.','',6,'2008-11-08 00:00:00','17:37:26',NULL,'1',0,'2009-02-21','23:09:16',1235250556);
INSERT INTO `taslak_sayfalar_icerik` VALUES (95,94,'HAKKIMIZDA','alt alt 1','sTh_491605b35fa177.jpg','dfsaf dsf\r\nfdsf','',1,'2008-11-08 00:00:00','18:33:39',NULL,'1',0,'2008-11-08','18:33:39',1226180019);
INSERT INTO `taslak_sayfalar_icerik` VALUES (96,0,'HABERLER','TaslakSite.com çok yakýnda açýlýyor..',NULL,'TaslakSite.com çok yakýnda beta sürümünü sizlerle paylaþmaya hazýr olacak..\r\n\r\nbizi takip edin..','',6,'2009-02-22 00:00:00','1:04:18',NULL,'1',0,'2009-02-22','1:04:18',1235257458);
INSERT INTO `taslak_sayfalar_icerik` VALUES (97,0,'ILETISIM','Ýletiþim',NULL,'','',6,'2009-03-04 00:00:00','0:50:27',NULL,'1',0,'2009-03-04','1:06:41',1236121601);
INSERT INTO `taslak_sayfalar_icerik` VALUES (98,0,'YARDIM','Yardým',NULL,'','',6,'2009-03-04 00:00:00','1:29:53',NULL,'1',0,'2009-03-04','1:29:53',1236122993);
INSERT INTO `taslak_sayfalar_icerik` VALUES (99,0,'REFERANSLARIMIZ','TaslakSite.com Altyapýsýný Tercih Edenler',NULL,'','',6,'2009-03-04 00:00:00','1:30:49',NULL,'1',0,'2009-03-04','1:30:49',1236123049);
INSERT INTO `taslak_sayfalar_icerik` VALUES (100,0,'INSAN KAYNAKLARI','Ýnsan Kaynaklarý',NULL,'','',6,'2009-03-04 00:00:00','1:31:14',NULL,'1',0,'2009-03-04','1:31:14',1236123074);
INSERT INTO `taslak_sayfalar_icerik` VALUES (101,0,'PROJELERIMIZ','Projelerimiz',NULL,'','',6,'2009-03-04 00:00:00','1:32:56',NULL,'1',0,'2009-03-04','1:32:56',1236123176);

#
# Table structure for table taslak_yesa_obje_listesi
#

CREATE TABLE `taslak_yesa_obje_listesi` (
  `ID` int(11) NOT NULL auto_increment,
  `OBJE_ADI` varchar(24) character set utf8 collate utf8_turkish_ci NOT NULL,
  `OBJE_KODU` mediumtext character set utf8 collate utf8_turkish_ci NOT NULL,
  `DURUM` smallint(1) default '1',
  `SITE_ID` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

#
# Dumping data for table taslak_yesa_obje_listesi
#

INSERT INTO `taslak_yesa_obje_listesi` VALUES (1,'text','<input type=\"text\" name=\"{frm_name}\" id=\"{frm_id}\" maxlength=\"{frm_maxlength}\" size=\"{frm_size}\" class=\"{frm_class}\" title=\"{frm_title}\" tabindex=\"{frm_tabindex}\" {frm_readonly} {frm_disabled} onblur=\"{frm_onblur}\" onfocus=\"{frm_onfocus}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" onclick=\"{frm_onclick}\" value=\"{frm_value}\" />',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (2,'button','<input type=\"button\" name=\"{frm_name}\" id=\"{frm_id}\" maxlength=\"{frm_maxlength}\" size=\"{frm_size}\" class=\"{frm_class}\" title=\"{frm_title}\" tabindex=\"{frm_tabindex}\" {frm_readonly} {frm_disabled} onblur=\"{frm_onblur}\" onfocus=\"{frm_onfocus}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" onclick=\"{frm_onclick}\" value=\"{frm_value}\" />',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (3,'file','',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (4,'hidden','<input type=\"hidden\" name=\"{frm_name}\" id=\"{frm_id}\"  value=\"{frm_value}\" />',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (5,'image','',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (6,'password','<input type=\"password\" name=\"{frm_name}\" id=\"{frm_id}\" maxlength=\"{frm_maxlength}\" size=\"{frm_size}\" class=\"{frm_class}\" title=\"{frm_title}\" tabindex=\"{frm_tabindex}\" {frm_readonly} {frm_disabled} onblur=\"{frm_onblur}\" onfocus=\"{frm_onfocus}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" onclick=\"{frm_onclick}\" value=\"{frm_value}\" />',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (7,'radio','<table>\r\n<tr>\r\n  <td><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"{frm_table}\">\r\n      <tr>\r\n        <td><input type=\"radio\" name=\"{frm_name}\" id=\"{frm_id}_1\" class=\"{frm_class}\" title=\"{frm_title}\" tabindex=\"{frm_tabindex}\" {frm_readonly} {frm_disabled} onblur=\"{frm_onblur}\" onfocus=\"{frm_onfocus}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" onclick=\"{frm_onclick}\" value=\"{frm_value}\" {frm_checked}/></td>\r\n        <td>{frm_radio1}</td>\r\n        <td><input type=\"radio\" name=\"{frm_name}\" id=\"{frm_id}_2\" class=\"{frm_class}\" title=\"{frm_title}\" tabindex=\"{frm_tabindex}\" {frm_readonly} {frm_disabled} onblur=\"{frm_onblur}\" onfocus=\"{frm_onfocus}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" onclick=\"{frm_onclick}\" value=\"{frm_value}\" {frm_checked}/></td>\r\n        <td>{frm_radio2}</td>\r\n      </tr>\r\n    </table>',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (8,'reset','<input type=\"reset\" name=\"{frm_name}\" id=\"{frm_id}\" class=\"{frm_class}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onfocus=\"{frm_onfocus}\" onblur=\"{frm_onblur}\" onclick=\"{frm_onclick}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" value=\"{frm_value}\" size=\"{frm_size}\" maxlength=\"{frm_maxlength}\" {frm_readonly} {frm_disabled}/>',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (9,'submit','<input type=\"submit\" name=\"{frm_name}\" id=\"{frm_id}\" class=\"{frm_class}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onfocus=\"{frm_onfocus}\" onblur=\"{frm_onblur}\" onclick=\"{frm_onclick}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" value=\"{frm_value}\" size=\"{frm_size}\" maxlength=\"{frm_maxlength}\" {frm_readonly} {frm_disabled}/>',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (10,'rtarih','<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"{frm_table}\">\r\n<tr>\r\n  <td><select  name=\"{frm_name}_gun\" id=\"{frm_id}_gun\" class=\"{frm_class}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onfocus=\"{frm_onfocus}\" onblur=\"{frm_onblur}\" onclick=\"{frm_onclick}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" {frm_readonly} {frm_disabled}>\r\n                  	  	<option value=\"\">--</option>\r\n                  	  	<option value=\"01\">1</option>\r\n                  	  	<option value=\"02\">2</option>\r\n                  	  	<option value=\"03\">3</option>\r\n                  	  	<option value=\"04\">4</option>\r\n                  	  	<option value=\"05\">5</option>\r\n                  	  	<option value=\"06\">6</option>\r\n                  	  	<option value=\"07\">7</option>\r\n                  	  	<option value=\"08\">8</option>\r\n                  	  	<option value=\"09\">9</option>\r\n                  	  	<option value=\"10\">10</option>\r\n                  	  	<option value=\"11\">11</option>\r\n                  	  	<option value=\"12\">12</option>\r\n                  	  	<option value=\"13\">13</option>\r\n                  	  	<option value=\"14\">14</option>\r\n                  	  	<option value=\"15\">15</option>\r\n                  	  	<option value=\"16\">16</option>\r\n                  	  	<option value=\"17\">17</option>\r\n                  	  	<option value=\"18\">18</option>\r\n                  	  	<option value=\"19\">19</option>\r\n                  	  	<option value=\"20\">20</option>\r\n                  	  	<option value=\"21\">21</option>\r\n                  	  	<option value=\"22\">22</option>\r\n                  	  	<option value=\"23\">23</option>\r\n                  	  	<option value=\"24\">24</option>\r\n                  	  	<option value=\"25\">25</option>\r\n                  	  	<option value=\"26\">26</option>\r\n                  	  	<option value=\"27\">27</option>\r\n                  	  	<option value=\"28\">28</option>\r\n                  	  	<option value=\"29\">29</option>\r\n                  	  	<option value=\"30\">30</option>\r\n                  	  	<option value=\"31\">31</option>\r\n                  	  </select></td><td>/</td><td><select  name=\"{frm_name}_ay\" id=\"{frm_id}_ay\" class=\"{frm_class}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onfocus=\"{frm_onfocus}\" onblur=\"{frm_onblur}\" onclick=\"{frm_onclick}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" {frm_readonly} {frm_disabled}>\r\n                  	  	<option value=\"\">--</option>\r\n                  	  	<option value=\"01\">Ocak</option>\r\n                  	  	<option value=\"02\">Şubat</option>\r\n                  	  	<option value=\"03\">Mart</option>\r\n                  	  	<option value=\"04\">Nisan</option>\r\n                  	  	<option value=\"05\">Mayıs</option>\r\n                  	  	<option value=\"06\">Haziran</option>\r\n                  	  	<option value=\"07\">Temmuz</option>\r\n                  	  	<option value=\"08\">Ağustos</option>\r\n                  	  	<option value=\"09\">Eylül</option>\r\n                  	  	<option value=\"10\">Ekim</option>\r\n                  	  	<option value=\"11\">Kasım</option>\r\n                  	  	<option value=\"12\">Aralık</option>\r\n                  	  </select></td><td>/19</td><td><input type=\"text\" name=\"{frm_name}_yil\" id=\"{frm_id}_yil\" class=\"{frm_class}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onfocus=\"{frm_onfocus}\" onblur=\"{frm_onblur}\" onclick=\"{frm_onclick}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" value=\"{frm_value}\" size=\"2\" maxlength=\"2\" {frm_readonly} {frm_disabled}/></td><td>Ör:30/08/1983</td></tr></table>\r\n',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (11,'rsaat','<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"{frm_table}\">\r\n<tr>\r\n  <td><input type=\"text\" name=\"{frm_name}_saat\" id=\"{frm_id}_saat\" class=\"{frm_class}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onfocus=\"{frm_onfocus}\" onblur=\"{frm_onblur}\" onclick=\"{frm_onclick}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" value=\"{frm_value}\" size=\"2\" maxlength=\"2\" {frm_readonly} {frm_disabled}/></td>\r\n  <td>:</td>\r\n  <td><input type=\"text\" name=\"{frm_name}_dakika\" id=\"{frm_id}_dakika\" class=\"{frm_class}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onfocus=\"{frm_onfocus}\" onblur=\"{frm_onblur}\" onclick=\"{frm_onclick}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" value=\"{frm_value}\" size=\"2\" maxlength=\"2\" {frm_readonly} {frm_disabled}/></td>\r\n<td>Ör:14:56</td></tr></table>\r\n',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (12,'rtarihsaat','<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" >\r\n  <tr>\r\n    <td><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"{frm_table}\">\r\n        <tr>\r\n          <td><select  name=\"{frm_name}_gun\" id=\"{frm_id}_gun\" class=\"{frm_class}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onFocus=\"{frm_onfocus}\" onBlur=\"{frm_onblur}\" onclick=\"{frm_onclick}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" {frm_readonly} {frm_disabled}>\r\n              <option value=\"\">--</option>\r\n              <option value=\"01\">1</option>\r\n              <option value=\"02\">2</option>\r\n              <option value=\"03\">3</option>\r\n              <option value=\"04\">4</option>\r\n              <option value=\"05\">5</option>\r\n              <option value=\"06\">6</option>\r\n              <option value=\"07\">7</option>\r\n              <option value=\"08\">8</option>\r\n              <option value=\"09\">9</option>\r\n              <option value=\"10\">10</option>\r\n              <option value=\"11\">11</option>\r\n              <option value=\"12\">12</option>\r\n              <option value=\"13\">13</option>\r\n              <option value=\"14\">14</option>\r\n              <option value=\"15\">15</option>\r\n              <option value=\"16\">16</option>\r\n              <option value=\"17\">17</option>\r\n              <option value=\"18\">18</option>\r\n              <option value=\"19\">19</option>\r\n              <option value=\"20\">20</option>\r\n              <option value=\"21\">21</option>\r\n              <option value=\"22\">22</option>\r\n              <option value=\"23\">23</option>\r\n              <option value=\"24\">24</option>\r\n              <option value=\"25\">25</option>\r\n              <option value=\"26\">26</option>\r\n              <option value=\"27\">27</option>\r\n              <option value=\"28\">28</option>\r\n              <option value=\"29\">29</option>\r\n              <option value=\"30\">30</option>\r\n              <option value=\"31\">31</option>\r\n            </select></td>\r\n          <td>/</td>\r\n          <td><select  name=\"{frm_name}_ay\" id=\"{frm_id}_ay\" class=\"{frm_class}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onFocus=\"{frm_onfocus}\" onBlur=\"{frm_onblur}\" onclick=\"{frm_onclick}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" {frm_readonly} {frm_disabled}>\r\n              <option value=\"\">--</option>\r\n              <option value=\"01\">Ocak</option>\r\n              <option value=\"02\">Şubat</option>\r\n              <option value=\"03\">Mart</option>\r\n              <option value=\"04\">Nisan</option>\r\n              <option value=\"05\">Mayıs</option>\r\n              <option value=\"06\">Haziran</option>\r\n              <option value=\"07\">Temmuz</option>\r\n              <option value=\"08\">Ağustos</option>\r\n              <option value=\"09\">Eylül</option>\r\n              <option value=\"10\">Ekim</option>\r\n              <option value=\"11\">Kasım</option>\r\n              <option value=\"12\">Aralık</option>\r\n            </select></td>\r\n          <td>/19</td>\r\n          <td><input type=\"text\" name=\"{frm_name}_yil\" id=\"{frm_id}_yil\" class=\"{frm_class}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onFocus=\"{frm_onfocus}\" onBlur=\"{frm_onblur}\" onClick=\"{frm_onclick}\" onKeyPress=\"{frm_onkeypress}\" onKeyUp=\"{frm_onkeyup}\" value=\"{frm_value}\" size=\"2\" maxlength=\"2\" {frm_readonly} {frm_disabled}/></td>\r\n          <td>Ör:30/08/1983</td>\r\n        </tr>\r\n      </table></td>\r\n    <td><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"{frm_table}\">\r\n        <tr>\r\n          <td><input type=\"text\" name=\"{frm_name}_saat\" id=\"{frm_id}_saat\" class=\"{frm_class}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onFocus=\"{frm_onfocus}\" onBlur=\"{frm_onblur}\" onClick=\"{frm_onclick}\" onKeyPress=\"{frm_onkeypress}\" onKeyUp=\"{frm_onkeyup}\" value=\"{frm_value}\" size=\"2\" maxlength=\"2\" {frm_readonly} {frm_disabled}/></td>\r\n          <td>:</td>\r\n          <td><input type=\"text\" name=\"{frm_name}_dakika\" id=\"{frm_id}_dakika\" class=\"{frm_class}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onFocus=\"{frm_onfocus}\" onBlur=\"{frm_onblur}\" onClick=\"{frm_onclick}\" onKeyPress=\"{frm_onkeypress}\" onKeyUp=\"{frm_onkeyup}\" value=\"{frm_value}\" size=\"2\" maxlength=\"2\" {frm_readonly} {frm_disabled}/></td>\r\n          <td>Ör:14:56</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n</table>',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (13,'remail','<input type=\"text\" name=\"{frm_name}\" id=\"{frm_id}\" maxlength=\"{frm_maxlength}\" size=\"{frm_size}\" class=\"{frm_class}\" title=\"{frm_title}\" tabindex=\"{frm_tabindex}\" {frm_readonly} {frm_disabled} onblur=\"kontrol_email(this);\" onfocus=\"{frm_onfocus}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" onclick=\"{frm_onclick}\" value=\"{frm_value}\" />',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (14,'rpara','<input type=\"text\" name=\"{frm_name}\" id=\"{frm_id}\" maxlength=\"{frm_maxlength}\" size=\"{frm_size}\" class=\"{frm_class}\" title=\"{frm_title}\" tabindex=\"{frm_tabindex}\" {frm_readonly} {frm_disabled} onblur=\"kontrol_para(this);\" onfocus=\"{frm_onfocus}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" onclick=\"{frm_onclick}\" value=\"{frm_value}\" />',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (15,'rnumber','<input type=\"text\" name=\"{frm_name}\" id=\"{frm_id}\" maxlength=\"{frm_maxlength}\" size=\"{frm_size}\" class=\"{frm_class}\" title=\"{frm_title}\" tabindex=\"{frm_tabindex}\" {frm_readonly} {frm_disabled} onblur=\"kontrol_number(this);\" onfocus=\"{frm_onfocus}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" onclick=\"{frm_onclick}\" value=\"{frm_value}\" />',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (16,'rnumber_virgullu','<input type=\"text\" name=\"{frm_name}\" id=\"{frm_id}\" maxlength=\"{frm_maxlength}\" size=\"{frm_size}\" class=\"{frm_class}\" title=\"{frm_title}\" tabindex=\"{frm_tabindex}\" {frm_readonly} {frm_disabled} onblur=\"kontrol_number_virgullu(this);\" onfocus=\"{frm_onfocus}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" onclick=\"{frm_onclick}\" value=\"{frm_value}\" />',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (17,'rtext','<input type=\"text\" name=\"{frm_name}\" id=\"{frm_id}\" maxlength=\"{frm_maxlength}\" size=\"{frm_size}\" class=\"{frm_class}\" title=\"{frm_title}\" tabindex=\"{frm_tabindex}\" {frm_readonly} {frm_disabled} onblur=\"{frm_text}\" onfocus=\"{frm_onfocus}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" onclick=\"{frm_onclick}\" value=\"{frm_value}\" />',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (18,'rradio','{html_radios name=\"{frm_name}\"  options=${frm_name}_radios selected=${frm_name}_id separator=\"<br/>\"}',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (19,'rcheckbox','{html_checkboxes name=\"{frm_name}\"  options=${frm_name}_checkboxes selected=${frm_name}_id separator=\"<br/>\"}',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (20,'rtextarea','<textarea name=\"{frm_name}\" cols=\"{frm_size}\" class=\"{frm_class}\" id=\"{frm_id}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onfocus=\"{frm_onfocus}\" onblur=\"{frm_onblur}\" onclick=\"{frm_onclick}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" {frm_readonly}=\"{frm_readonly}\" {frm_disabled}=\"{frm_disabled}\">{frm_value}</textarea>',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (21,'rta_adres','<textarea name=\"{frm_name}\" cols=\"{frm_size}\" class=\"{frm_class}\" id=\"{frm_id}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onfocus=\"{frm_onfocus}\" onblur=\"{frm_onblur}\" onclick=\"{frm_onclick}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" {frm_readonly}=\"{frm_readonly}\" {frm_disabled}=\"{frm_disabled}\">{frm_value}</textarea>',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (22,'rta_255','<textarea name=\"{frm_name}\" cols=\"{frm_size}\" class=\"{frm_class}\" id=\"{frm_id}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onfocus=\"{frm_onfocus}\" onblur=\"{frm_onblur}\" onclick=\"{frm_onclick}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" {frm_readonly}=\"{frm_readonly}\" {frm_disabled}=\"{frm_disabled}\">{frm_value}</textarea>',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (23,'rta_fck','',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (24,'ril','<select name=\"{frm_name}\" class=\"{frm_class}\" id=\"{frm_id}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onfocus=\"{frm_onfocus}\" onblur=\"{frm_onblur}\" onclick=\"{frm_onclick}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\">\r\n	{html_options options=$option_listesi selected=$secili_obje}\r\n</select>',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (25,'rilce','<select name=\"{frm_name}\" class=\"{frm_class}\" id=\"{frm_id}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onfocus=\"{frm_onfocus}\" onblur=\"{frm_onblur}\" onclick=\"{frm_onclick}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\">\r\n	{html_options options=$option_listesi selected=$secili_obje}\r\n</select>',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (26,'rulke','<select name=\"{frm_name}\" class=\"{frm_class}\" id=\"{frm_id}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onfocus=\"{frm_onfocus}\" onblur=\"{frm_onblur}\" onclick=\"{frm_onclick}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\">\r\n	{html_options options=$option_listesi selected=$secili_obje}\r\n</select>',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (27,'rcinsiyet','<select name=\"{frm_name}\" class=\"{frm_class}\" id=\"{frm_id}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onfocus=\"{frm_onfocus}\" onblur=\"{frm_onblur}\" onclick=\"{frm_onclick}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\">\r\n	{html_options options=$option_listesi selected=$secili_obje}\r\n</select>',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (28,'rmeslek','<select name=\"{frm_name}\" class=\"{frm_class}\" id=\"{frm_id}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onfocus=\"{frm_onfocus}\" onblur=\"{frm_onblur}\" onclick=\"{frm_onclick}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\">\r\n	{html_options options=$option_listesi selected=$secili_obje}\r\n</select>',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (29,'regitim','<select name=\"{frm_name}\" class=\"{frm_class}\" id=\"{frm_id}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onfocus=\"{frm_onfocus}\" onblur=\"{frm_onblur}\" onclick=\"{frm_onclick}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\">\r\n	{html_options options=$option_listesi selected=$secili_obje}\r\n</select>',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (30,'checkbox','<table>\r\n<tr>\r\n  <td><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"{frm_table}\">\r\n      <tr>\r\n        <td><input type=\"checkbox\" name=\"{frm_name}\" id=\"{frm_id}_1\" class=\"{frm_class}\" title=\"{frm_title}\" tabindex=\"{frm_tabindex}\" {frm_readonly} {frm_disabled} onblur=\"{frm_onblur}\" onfocus=\"{frm_onfocus}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" onclick=\"{frm_onclick}\" value=\"{frm_value}\" {frm_checked}/></td>\r\n        <td>{frm_checkbox1}</td>\r\n        <td><input type=\"checkbox\" name=\"{frm_name}\" id=\"{frm_id}_2\" class=\"{frm_class}\" title=\"{frm_title}\" tabindex=\"{frm_tabindex}\" {frm_readonly} {frm_disabled} onblur=\"{frm_onblur}\" onfocus=\"{frm_onfocus}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" onclick=\"{frm_onclick}\" value=\"{frm_value}\" {frm_checked}/></td>\r\n        <td>{frm_checkbox2}</td>\r\n      </tr>\r\n    </table>\r\n',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (31,'textarea','<textarea name=\"{frm_name}\" cols=\"{frm_size}\" class=\"{frm_class}\" id=\"{frm_id}\" tabindex=\"{frm_tabindex}\" title=\"{frm_title}\" onfocus=\"{frm_onfocus}\" onblur=\"{frm_onblur}\" onclick=\"{frm_onclick}\" onkeypress=\"{frm_onkeypress}\" onkeyup=\"{frm_onkeyup}\" {frm_readonly}=\"{frm_readonly}\" {frm_disabled}=\"{frm_disabled}\">{frm_value}</textarea>',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (32,'combobox','',1,2);
INSERT INTO `taslak_yesa_obje_listesi` VALUES (33,'listbox','',1,2);

#
# Table structure for table taslak_yesa_site
#

CREATE TABLE `taslak_yesa_site` (
  `ID` int(11) NOT NULL auto_increment,
  `SITE` varchar(128) collate utf8_turkish_ci default NULL,
  `ACIKLAMA` varchar(255) collate utf8_turkish_ci default NULL,
  `DURUM` smallint(1) default '1',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

#
# Dumping data for table taslak_yesa_site
#

INSERT INTO `taslak_yesa_site` VALUES (1,'taslaksite.com',NULL,1);
INSERT INTO `taslak_yesa_site` VALUES (2,'oasis.asisoft.com',NULL,1);

#
# Table structure for table taslak_yesa_template
#

CREATE TABLE `taslak_yesa_template` (
  `ID` int(11) NOT NULL auto_increment,
  `TEMPLATE_ADI` varchar(128) collate utf8_turkish_ci default NULL,
  `TEMPLATE` mediumtext collate utf8_turkish_ci,
  `DURUM` smallint(1) default '1',
  `SITE_ID` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

#
# Dumping data for table taslak_yesa_template
#

INSERT INTO `taslak_yesa_template` VALUES (1,'TPL_LISTELEME',NULL,1,2);
INSERT INTO `taslak_yesa_template` VALUES (2,'TPL_VERI_EKLEME',NULL,1,2);
INSERT INTO `taslak_yesa_template` VALUES (3,'TPL_VERI_GUNCELLEME',NULL,1,2);
INSERT INTO `taslak_yesa_template` VALUES (4,'TPL_VERI_SILME',NULL,1,2);
INSERT INTO `taslak_yesa_template` VALUES (5,'TPL_VERI_EKLEME_GUNCELLEME',NULL,1,2);
INSERT INTO `taslak_yesa_template` VALUES (6,'PHP_LISTELEME',NULL,1,2);
INSERT INTO `taslak_yesa_template` VALUES (7,'PHP_VERI_EKLEME',NULL,1,2);
INSERT INTO `taslak_yesa_template` VALUES (8,'PHP_VERI_GUNCELLEME',NULL,1,2);
INSERT INTO `taslak_yesa_template` VALUES (9,'PHP_VERI_SILME',NULL,1,2);
INSERT INTO `taslak_yesa_template` VALUES (10,'PHP_VERI_EKLEME_GUNCELLEME',NULL,1,2);
INSERT INTO `taslak_yesa_template` VALUES (11,'PHP_VERI_SIRALAMA',NULL,1,2);
INSERT INTO `taslak_yesa_template` VALUES (12,'PHP_VERI_DURUM_DEGISTIRME',NULL,1,2);

#
# Table structure for table taslak_yorum
#

CREATE TABLE `taslak_yorum` (
  `ID` int(11) NOT NULL auto_increment,
  `YORUM` text collate utf8_turkish_ci,
  `SAYFA_ID` int(11) default NULL,
  `KULLANICI_ID` int(11) default NULL,
  `DURUM` enum('1','0') collate utf8_turkish_ci default '0',
  `OLUS_TARIHI` date default NULL,
  `OLUS_SAATI` time default NULL,
  `DEG_TARIHI` date default NULL,
  `DEG_SAATI` time default NULL,
  `SIZ` int(11) default NULL,
  `ADMIN_ID` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

#
# Dumping data for table taslak_yorum
#

INSERT INTO `taslak_yorum` VALUES (18,'site çok güzel olmuş, teşekkürler..',93,6,'1',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `taslak_yorum` VALUES (19,'evet katýlýyorum hakikaten çok güzel olmuþ..\r\n****',93,6,'1','2009-02-22','2:55:21','2009-02-22','2:55:21',1235264121,NULL);
INSERT INTO `taslak_yorum` VALUES (24,'yorum ekleme opsiyonu koymanýz ayrýca güzel olmuþ..',93,6,'0','2009-02-22','16:49:26','2009-02-22','16:49:26',1235314166,NULL);
INSERT INTO `taslak_yorum` VALUES (25,'ola la. hakkýmýzda hakkýnda da ilk defa yorum yapýyorum..\r\n\r\nnasýl bir þirket hakkýmýzda sayfasýnda yorum yapýlmasýna izin verirki ?',93,6,'1','2009-02-22','16:50:36','2009-02-22','16:50:36',1235314236,NULL);
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
