<?php

 /**
  * yönetici açma kapama
  * 
  * Oluþturulma tarihi : 16.Kas.2008
  * @link http://www.rasimsen.com
  * @copyright 2008 Rasim ÞEN
  * @author Rasim ÞEN<dev@rasimsen.com>
  * @version 1.0  
  */

require_once("sInc/admin_uygulama.php");

$s=$_REQUEST['s'];

$id=$_GET['id'];

require_once("sInc/ebulten.php");

$sayfa=new Ebulten();


/**
 * kullanýcý silme
 */
$sil_id=$_GET["sil_id"];
if($sil_id){
	if(!$sayfa->yoneticiSil($db,$sil_id)){
		pre("HATA OLUÞTU!");
	}			
}

/**
 * fotoðraflarý aktif yada pasif etmek için
 */
$durum_id=$_REQUEST["durum_id"];
if($durum_id){
	$durum=$_REQUEST["durum"]=="AKTIF"?"0":"1";
	if(!$sayfa->veriGuncelle($db,tKULLANICILAR,array("uDURUM"=>$durum,"wID"=>$durum_id))) $sen->mesajUyari("HATA","HATA OLUÞTU!");
}


/**
 * yeni üyelik varsa
 */
if($_REQUEST["btnHizliUyeOl"]){
	
	$hata="";
	if(strlen($_REQUEST["AD_SOYAD"])<3)
		$hata.="<br><br>Lütfen Adýnýzý Soyadýnýzý kontrol ediniz!";
	
	if(strlen($_REQUEST["EMAIL"])<3 || strpos($_REQUEST["EMAIL"],"@")===false)
		$hata.="<br>Lütfen email adresinizi kontrol ediniz!";
	
	if(strlen($_REQUEST["SIFRE"])<5)
		$hata.="<br>Þifre enaz 4 karakter olmalý!";

	/*if($_REQUEST["kullanim_kosullari"]<>1)
		$hata.="<br>Kullaným koþullarýný kabul etmeniz gerekmektedir!";
	*/
	if(strlen($hata)>0){
		$sen->mesajUyari("Uyarý","Lütfen Dikkat".$hata);
	}else{	
		
		/**
		 * bu email adresi ile daha önceden üye olunmuþmu? 
		 */
		if(!$id && $sayfa->uyeKontrol($db,$_REQUEST["EMAIL"])){
					$sen->mesajUyari("Uyarý","LÜTFEN DÝKKAT!<br><br>Bu email adresi þuan sistemde kayýtlý!");
		}else{
			if(!$id){				
				$x=explode(" ",$_REQUEST["AD_SOYAD"]);
				$data=array("AD"=>$x[0],"SOYAD"=>$x[1],"KULLANICI_ADI"=>$_REQUEST["KULLANICI_ADI"],"EMAIL"=>$_REQUEST["EMAIL"],"SIFRE"=>md5($_REQUEST["SIFRE"]),"TIP"=>"YONETICI");
				if($sen->veriEkle($db,tKULLANICILAR,$data)){
					$sen->mesajBasarili("Admin Kullanýcý Açma","Yeni yönetici hesabý açýlmýþtýr..");
				}else{
					$sen->mesajUyari("Hata","HATA OLUÞTU! <br><br> Lütfen tekrar deneyiniz..");
				}
			}else{//güncelleme
				$x=explode(" ",$_REQUEST["AD_SOYAD"]);
				$data=array("uAD"=>$x[0],"uSOYAD"=>$x[1],"uKULLANICI_ADI"=>$_REQUEST["KULLANICI_ADI"],"uEMAIL"=>$_REQUEST["EMAIL"],"uSIFRE"=>md5($_REQUEST["SIFRE"]),"wID"=>$id);
				if($sen->veriGuncelle($db,tKULLANICILAR,$data)){
					$sen->mesajBasarili("Admin Kullanýcý Güncellme","Yönetici bilgileri güncellenmiþtir..");
				}else{
					$sen->mesajUyari("Hata","HATA OLUÞTU! <br><br> Lütfen tekrar deneyiniz..");
				}				
			}
			echo "<script>alert('Bilgiler Kaydedilmiþtir..');</script>";
			$sen->yonlendir("yonetici.php");				
		}
	}
}


switch($s){

	case 1:

		$icerikArray=$sayfa->getIcerik($db,$id);

		/**
		 * e-bulten görderme
		 */
		if($_POST["ebultenGönder"]){					
			$liste=$sayfa->getEbultenMailListe($db);
			for($i=0,$c=count($liste);$i<$c;$i++){
				phpmailer(SAHIP_EMAIL,SAHIP_ADI,$liste[$i][EMAIL],$liste[$i][EMAIL],$icerikArray["BASLIK"],$icerikArray["HIZLI_BAKIS_ICERIK"],stripslashes($icerikArray["ICERIK"]),$AttmFiles,$bcc);
			}	
			if($i>0)
				$sen->mesajBasarili("e-Bülten Gönderme","Bülten baþarýlý bir þekilde $i++ tane email adresine gönderilmiþtir");
			else
				$sen->mesajUyari("Lütfen Dikkat!","e-Bülten gönderilecek kullanýcý bulunmamaktadýr!");	
		} 

		$sen->smarty->assign('baslik',$icerikArray["BASLIK"]);
		$icerik=stripslashes($icerikArray["ICERIK"]);
		$sen->smarty->assign('hizli_bakis_icerik',$icerikArray["HIZLI_BAKIS_ICERIK"]);
		$sen->smarty->assign('icerik',$icerik);

		$sen->sYaz("admin_ebulten_onizle_gonder.tpl");
		break;
	case 2:
		
		/**
		 * içerik kaydet güncelle
		 */
		if($_REQUEST["ebultenKaydet"]){				
			$islemTipi=$_REQUEST["islemTipi"];
			
			if($islemTipi=='guncelle'){
				$veri=array(
							'uBASLIK'=>$_REQUEST['BASLIK'], 
							'uHIZLI_BAKIS_ICERIK'=>substr($_REQUEST['HIZLI_BAKIS_ICERIK'],0,255), 
							'uICERIK'=>stripslashes($_REQUEST['ICERIK']), 
							'uADMIN_ID'=>$login->admin_id,
							'wID'=>$id 
							);						
				
				if($sayfa->veriGuncelle($db,tEBULTEN,$veri,0)){
					$sayfa->mesajBasarili($sayfa_adi,$_REQUEST['BASLIK']." baþlýklý e-bülten güncellenmiþtir");
				}else{
					$sayfa->mesajBasarili($sayfa_adi,$_REQUEST['BASLIK']." sayfasýnda hata oluþtu. Lütfen Tekrar deneyiniz..");						
				}											
			}else{
				$veri=array(
							'BASLIK'=>$_REQUEST['BASLIK'], 
							'HIZLI_BAKIS_ICERIK'=>substr($_REQUEST['HIZLI_BAKIS_ICERIK'],0,255), 
							'ICERIK'=>stripslashes($_REQUEST['ICERIK']), 
							'ADMIN_ID'=>$login->admin_id
							);
				$id=$sayfa->veriEkle($db,tEBULTEN,$veri,0);	
				echo "<script>var hr=(location.href+'&ok').replace('&id=','&id=".$id."&ok');" .
						"location.href=hr;</script>";
				//pre($id);				
				if($id || $_GET["ok"]){
					$sayfa->mesajBasarili($sayfa_adi,$_REQUEST['BASLIK']." baþlýklý e-bulten eklenmiþtir.");
				}else{
					$sayfa->mesajBasarili($sayfa_adi,$_REQUEST['BASLIK']." sayfasýnda hata oluþtu. Lütfen Tekrar deneyiniz..");						
				}											
			}
		}		
		
		$icerikArray=$sayfa->getIcerik($db,$id);
		$sen->smarty->assign('islemTipi',$icerikArray?'guncelle':'ekle');

		$sen->smarty->assign('baslik',$icerikArray["BASLIK"]);
		$icerik=stripslashes($icerikArray["ICERIK"]);
		$sen->smarty->assign('hizli_bakis_icerik',$icerikArray["HIZLI_BAKIS_ICERIK"]);
		$sen->smarty->assign('icerik',$icerik);
		
		
		$sen->sYaz("admin_ebulten_ekle_guncelle.tpl");
		break;

	case 4:		
		
		$liste=$sayfa->getEbultenMailListe($db);
		$sen->smarty->assign('sayfalistesi',$liste);
		$sen->sYaz("admin_ebulten_mail_liste.tpl");
		
		break;
	default://login ekraný veya yönetim ekraný

		$liste=$sayfa->getListe($db);
		$sen->smarty->assign('sayfalistesi',$liste);
		$sen->sYaz("admin_ebulten_liste.tpl");
		break;		
}
?>
