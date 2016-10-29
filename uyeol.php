<?php

require_once("sInc/sayfa_uygulama.php");
require_once("sInc/uye.php");

$sen=new TaslakSayfa();

$sayfa_bilgi=$sen->Hazirla($db,$_GET['id']);
$sen->smarty->assign('sayfa_linki',DEF_SAYFA_LINKI);


$ana_tablo=tKULLANICILAR;

$uye=new Uye();
if($uye->login($db)){
	echo "<script>alert('�ye giri�i yapm�� durumdas�n�z.');location.href='uye.php';</script>";
	//$sen->yonlendir("index.php");
}

//mesaj g�nderimi
if(isset($_POST["btnUyeOl"])){
	
	$hata=array();				
	
	$kullanici_adi=trim($sen->alPost("kullanici_adi"));
	$sifre=trim($sen->alPost("sifre"));
	$sifre2=trim($sen->alPost("sifre2"));

	$ad=trim($sen->alPost("ad"));
	$soyad=trim($sen->alPost("soyad"));
	
	$email1=trim($sen->alPost("email1"));
	$email2=trim($sen->alPost("email2"));
	$egitim=trim($sen->alPost("egitim"));
	$cinsiyet=trim($sen->alPost("cinsiyet"));

	if(trim($sen->alPost("dogum_tarihi_yil"))&&strlen(trim($sen->alPost("dogum_tarihi_yil")))==4)
		$dogum_tarihi=trim($sen->alPost("dogum_tarihi_yil"));
	else
		$hata[]="L�tfen Do�um Y�l�n� kontrol ediniz!!";	
	
	if(trim($sen->alPost("dogum_tarihi_ay")))
		$dogum_tarihi.="-".trim($sen->alPost("dogum_tarihi_ay"));
	else
		$hata[]="L�tfen Do�um Ay�n� bo� b�rakmay�n�z!!";	
	
	if(trim($sen->alPost("dogum_tarihi_gun")))
		$dogum_tarihi.="-".trim($sen->alPost("dogum_tarihi_gun"));
	else
		$hata[]="L�tfen Do�um G�n�n� bo� b�rakmay�n�z!!";	
		

	$tel=trim($sen->alPost("tel"));
	$adres=trim($sen->alPost("adres"));
	
	$sehir_diger=trim($sen->alPost("sehir_diger"));
	$ulke_diger=trim($sen->alPost("ulke_diger"));
	
	$sehir=$sehir_diger?$sehir_diger:trim($sen->alPost("sehir"))."-".trim($sen->alPost("sehir_adi"));
	$ulke=$ulke_diger?$ulke_diger:trim($sen->alPost("ulke"))."-".trim($sen->alPost("ulke_adi"));
	
	if(strlen($ad)<3)
		$hata[]="L�tfen ad�n�z� kontrol ediniz!!";	
	if(strlen($soyad)<3)
		$hata[]="L�tfen soyad�n�z� kontrol ediniz!!";	
	if(strlen($kullanici_adi)<4)
		$hata[]="L�tfen kullan�c� ad�n�z� kontrol ediniz!!";	
	if(strlen($sifre)<4 || $sifre<>$sifre2)
		$hata[]="L�tfen �ifrenizi kontrol ediniz!!";	
	if(!$sen->checkEmail($email1))
		$hata[]="L�tfen emailinizi kontrol ediniz!!";	
	if($email1<>$email2)
		$hata[]="Email tekrar�n�z birbiriyle uyu�muyor!!";	
		
	// kullan�c� kontrol
	$lgn=new Uye();
	if($lgn->kontrolKullaniciAdi($db,$kullanici_adi))
		$hata[]="Se�mi� oldu�unuz kullan�c� ad� ba�ka bir kullan�c� taraf�ndan kullan�lmaktad�r!!";	
	if($lgn->kontrolEmail($db,$email1))
		$hata[]="Girmi� oldu�unuz email daha �nce girilmi�, �ifrenizi hat�rlam�yorsan�z �ifre hat�rlatma k�sm�ndan tekrar �ifre alabilirsiniz!!";	
	//pre($lgn->kontrolKullaniciAdi($db,$kullanici_adi));	
	//pre($hata);
	if(count($hata)>0 ){
		//hata varsa
			$sen->mesajUyari("Hata","L�tfen Dikkat! <br><br><ul><li>".implode("<li>",$hata)."</ul>");		
	}else{
	
		//db ye kay�t
		$aktivasyon_kodu=mt_rand();
		$veri=array(
			"KULLANICI_ADI"=>$kullanici_adi, 
			"SIFRE"=>md5($sifre), 
			"AD"=>$ad, 
			"SOYAD"=>$soyad, 
			"ADRES"=>$adres, 
			"TEL"=>$tel, 
			"EMAIL"=>$email1, 
			"EGITIM"=>$egitim, 
			"CINSIYET"=>$cinsiyet, 
			"DOGUM_TARIHI"=>$dogum_tarihi, 
			"SEHIR"=>$sehir, 
			"ULKE"=>$ulke, 
			"TIP"=>"KULLANICI",
			"AKTIVASYON_KODU"=>$aktivasyon_kodu,
			"DURUM"=>(AKTIVASYON_KODU_GEREKLI==1?'0':'1')
		);
		
		$id=$sen->veriEkle($db,$ana_tablo,$veri,0);
		if($id){
			//�yeye aktivasyon maili g�nderiliyor..
			if(AKTIVASYON_KODU_GEREKLI==1){
				
				$Subject = '�yeli�iniz tamamlanmas� i�in aktivasyon kodu bilgileri..';
				
				$icerik  = " �yeli�inizin tamamlanabilmesi i�in size g�nderilmi� olan aktivasyon kodunu i�eren linke t�klaman�z gerekmektedir. Link �al��mazsa a�a��daki linki kopyalay�p taray�c�n�n adres �ubu�una yap��t�rman�z yeterli olmaktad�r..";
				$icerik .='<br><br>Aktivasyon linki: <a href="'.sURL.'uye.php?s=4&aktivasyon_kodu='.$aktivasyon_kodu.'&un='.$kullanici_adi.'">'.sURL.'uye.php?s=4&aktivasyon_kodu='.$aktivasyon_kodu.'&un='.$kullanici_adi.'</a>';

				emailGonder($email1,$Subject,$icerik,"",$ad." ".$soyad);
				
				$sen->mesajBasarili("�yelik Ba�ar�l�","Aktivasyon linki ".$email1." adresine g�nderilmi�tir. <br>L�tfen dikkat:Baz� durumlarda mailler spam/junk mail k�sm�na d��mektedir. Kontrol etmeyi unutmay�n�z ..");
			}else{					
				$sen->mesajBasarili("�yelik Ba�ar�l�"," �ye oldu�unuz i�in te�ekk�rler. Sitemizi kullanmaya ba�layabilirsiniz..");
			}
			$sen->sYaz("islem_basarili.tpl");
			die;
		}else{
			$sen->mesajUyari("Hata","HATA OLU�TU! <br><br> L�tfen tekrar deneyiniz<br><br> Hata devam ederse site y�netimini l�tfen bilgilendiriniz..");
		}

	}		
		
}

$sen->sYaz("uyeol.tpl");

//ekrana yaz

//phpmailer

?>