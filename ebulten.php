<?php
require_once("sInc/sayfa_uygulama.php");
require_once("sInc/ebulten.php");
$sen=new TaslakSayfa();

$sayfa_bilgi=$sen->Hazirla($db,$_GET['id']);
$sen->smarty->assign('sayfa_linki',DEF_SAYFA_LINKI);
$sen->smarty->assign('sayfa_icerik',$sayfa_bilgi["ICERIK"]);
$sen->smarty->assign('alt_basliklar',$sayfa_bilgi["ALT_BASLIKLAR"]);

$ebulten=new eBulten($db);

$email=$sen->alPost("ebulten_email");
if($email){
	if($sen->checkEmail($email)){//email adresi d�zg�n girilmi�mi kontrol edilir..
			if($ebulten->emailKontrol($db,$email)>0){//bu email adresi daha �nce sisteme girilmi�mi?
				$sen->mesajUyari("e-B�lten Bilgi",'"'.$email.'" adresi e-b�lten i�in daha �nceden sisteme kaydolmu�tur!');
			}else{		
				if($ebulten->emailEkle($db,$email)){
					$sen->mesajBasarili("eB�lten Kayd�n�z Yap�lm��t�r",'"'.$email.'" adresi veritaban�m�za kaydedilmi�tir.<br>Te�ekk�rler..');
				}else{
					$sen->mesajUyari("eB�lten Kayd�n�z Yap�lamam��t�r","L�tfen email adresini tekrar g�zden gte�irerek, tekrar deneyiniz. Sorunun devam etmesi halinde durumu l�tfen site y�netimine bildiriniz.");				
				}
			}
	}else{
		//email hatal�
		$sen->mesajUyari("L�tfen Dikkat","girmi� oldu�unuz email hatal�!!");
	}
}

$sen->sYaz(DEF_SAYFA_TASLAGI);


?>