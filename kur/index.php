<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>TaslakSite.com Kurulum Sihirbaz�</title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-9">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1254">
<META HTTP-EQUIV="content-language" CONTENT="TR">
</head>
<?php
$settings = '../sInc/ayarlar.sen.php';
if (file_exists($settings)) {
	echo 'Dosya "ayarlar.sen.php" bulundu, kurulum i�in bir soraki ad�ma ge�ilebilir<br />';
	echo '<p>Kuruluma  devam etmek i�in <a href="./install.php">Kurulum Sayfas�</a> linkine t�klay�n�z..';
} else {
	echo '"ayarlar.sen.php" dosyas� bulunamad�. ��leme devam edilemez!<br />';	
}


?>
