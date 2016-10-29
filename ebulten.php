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
	if($sen->checkEmail($email)){//email adresi düzgün girilmiþmi kontrol edilir..
			if($ebulten->emailKontrol($db,$email)>0){//bu email adresi daha önce sisteme girilmiþmi?
				$sen->mesajUyari("e-Bülten Bilgi",'"'.$email.'" adresi e-bülten için daha önceden sisteme kaydolmuþtur!');
			}else{		
				if($ebulten->emailEkle($db,$email)){
					$sen->mesajBasarili("eBülten Kaydýnýz Yapýlmýþtýr",'"'.$email.'" adresi veritabanýmýza kaydedilmiþtir.<br>Teþekkürler..');
				}else{
					$sen->mesajUyari("eBülten Kaydýnýz Yapýlamamýþtýr","Lütfen email adresini tekrar gözden gteçirerek, tekrar deneyiniz. Sorunun devam etmesi halinde durumu lütfen site yönetimine bildiriniz.");				
				}
			}
	}else{
		//email hatalý
		$sen->mesajUyari("Lütfen Dikkat","girmiþ olduðunuz email hatalý!!");
	}
}

$sen->sYaz(DEF_SAYFA_TASLAGI);


?>