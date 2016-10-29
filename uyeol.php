<?php

require_once("sInc/sayfa_uygulama.php");
require_once("sInc/uye.php");

$sen=new TaslakSayfa();

$sayfa_bilgi=$sen->Hazirla($db,$_GET['id']);
$sen->smarty->assign('sayfa_linki',DEF_SAYFA_LINKI);


$ana_tablo=tKULLANICILAR;

$uye=new Uye();
if($uye->login($db)){
	echo "<script>alert('Üye giriþi yapmýþ durumdasýnýz.');location.href='uye.php';</script>";
	//$sen->yonlendir("index.php");
}

//mesaj gönderimi
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
		$hata[]="Lütfen Doðum Yýlýný kontrol ediniz!!";	
	
	if(trim($sen->alPost("dogum_tarihi_ay")))
		$dogum_tarihi.="-".trim($sen->alPost("dogum_tarihi_ay"));
	else
		$hata[]="Lütfen Doðum Ayýný boþ býrakmayýnýz!!";	
	
	if(trim($sen->alPost("dogum_tarihi_gun")))
		$dogum_tarihi.="-".trim($sen->alPost("dogum_tarihi_gun"));
	else
		$hata[]="Lütfen Doðum Gününü boþ býrakmayýnýz!!";	
		

	$tel=trim($sen->alPost("tel"));
	$adres=trim($sen->alPost("adres"));
	
	$sehir_diger=trim($sen->alPost("sehir_diger"));
	$ulke_diger=trim($sen->alPost("ulke_diger"));
	
	$sehir=$sehir_diger?$sehir_diger:trim($sen->alPost("sehir"))."-".trim($sen->alPost("sehir_adi"));
	$ulke=$ulke_diger?$ulke_diger:trim($sen->alPost("ulke"))."-".trim($sen->alPost("ulke_adi"));
	
	if(strlen($ad)<3)
		$hata[]="Lütfen adýnýzý kontrol ediniz!!";	
	if(strlen($soyad)<3)
		$hata[]="Lütfen soyadýnýzý kontrol ediniz!!";	
	if(strlen($kullanici_adi)<4)
		$hata[]="Lütfen kullanýcý adýnýzý kontrol ediniz!!";	
	if(strlen($sifre)<4 || $sifre<>$sifre2)
		$hata[]="Lütfen þifrenizi kontrol ediniz!!";	
	if(!$sen->checkEmail($email1))
		$hata[]="Lütfen emailinizi kontrol ediniz!!";	
	if($email1<>$email2)
		$hata[]="Email tekrarýnýz birbiriyle uyuþmuyor!!";	
		
	// kullanýcý kontrol
	$lgn=new Uye();
	if($lgn->kontrolKullaniciAdi($db,$kullanici_adi))
		$hata[]="Seçmiþ olduðunuz kullanýcý adý baþka bir kullanýcý tarafýndan kullanýlmaktadýr!!";	
	if($lgn->kontrolEmail($db,$email1))
		$hata[]="Girmiþ olduðunuz email daha önce girilmiþ, Þifrenizi hatýrlamýyorsanýz þifre hatýrlatma kýsmýndan tekrar þifre alabilirsiniz!!";	
	//pre($lgn->kontrolKullaniciAdi($db,$kullanici_adi));	
	//pre($hata);
	if(count($hata)>0 ){
		//hata varsa
			$sen->mesajUyari("Hata","Lütfen Dikkat! <br><br><ul><li>".implode("<li>",$hata)."</ul>");		
	}else{
	
		//db ye kayýt
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
			//üyeye aktivasyon maili gönderiliyor..
			if(AKTIVASYON_KODU_GEREKLI==1){
				
				$Subject = 'Üyeliðiniz tamamlanmasý için aktivasyon kodu bilgileri..';
				
				$icerik  = " Üyeliðinizin tamamlanabilmesi için size gönderilmiþ olan aktivasyon kodunu içeren linke týklamanýz gerekmektedir. Link çalýþmazsa aþaðýdaki linki kopyalayýp tarayýcýnýn adres çubuðuna yapýþtýrmanýz yeterli olmaktadýr..";
				$icerik .='<br><br>Aktivasyon linki: <a href="'.sURL.'uye.php?s=4&aktivasyon_kodu='.$aktivasyon_kodu.'&un='.$kullanici_adi.'">'.sURL.'uye.php?s=4&aktivasyon_kodu='.$aktivasyon_kodu.'&un='.$kullanici_adi.'</a>';

				emailGonder($email1,$Subject,$icerik,"",$ad." ".$soyad);
				
				$sen->mesajBasarili("Üyelik Baþarýlý","Aktivasyon linki ".$email1." adresine gönderilmiþtir. <br>Lütfen dikkat:Bazý durumlarda mailler spam/junk mail kýsmýna düþmektedir. Kontrol etmeyi unutmayýnýz ..");
			}else{					
				$sen->mesajBasarili("Üyelik Baþarýlý"," Üye olduðunuz için teþekkürler. Sitemizi kullanmaya baþlayabilirsiniz..");
			}
			$sen->sYaz("islem_basarili.tpl");
			die;
		}else{
			$sen->mesajUyari("Hata","HATA OLUÞTU! <br><br> Lütfen tekrar deneyiniz<br><br> Hata devam ederse site yönetimini lütfen bilgilendiriniz..");
		}

	}		
		
}

$sen->sYaz("uyeol.tpl");

//ekrana yaz

//phpmailer

?>