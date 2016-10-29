<?php

 /**
  * y�netici a�ma kapama
  * 
  * Olu�turulma tarihi : 16.Kas.2008
  * @link http://www.rasimsen.com
  * @copyright 2008 Rasim �EN
  * @author Rasim �EN<dev@rasimsen.com>
  * @version 1.0  
  */

require_once("sInc/admin_uygulama.php");

$s=$_REQUEST['s'];

$id=$_GET['id'];

require_once("sInc/ebulten.php");

$sayfa=new Ebulten();


/**
 * kullan�c� silme
 */
$sil_id=$_GET["sil_id"];
if($sil_id){
	if(!$sayfa->yoneticiSil($db,$sil_id)){
		pre("HATA OLU�TU!");
	}			
}

/**
 * foto�raflar� aktif yada pasif etmek i�in
 */
$durum_id=$_REQUEST["durum_id"];
if($durum_id){
	$durum=$_REQUEST["durum"]=="AKTIF"?"0":"1";
	if(!$sayfa->veriGuncelle($db,tKULLANICILAR,array("uDURUM"=>$durum,"wID"=>$durum_id))) $sen->mesajUyari("HATA","HATA OLU�TU!");
}


/**
 * yeni �yelik varsa
 */
if($_REQUEST["btnHizliUyeOl"]){
	
	$hata="";
	if(strlen($_REQUEST["AD_SOYAD"])<3)
		$hata.="<br><br>L�tfen Ad�n�z� Soyad�n�z� kontrol ediniz!";
	
	if(strlen($_REQUEST["EMAIL"])<3 || strpos($_REQUEST["EMAIL"],"@")===false)
		$hata.="<br>L�tfen email adresinizi kontrol ediniz!";
	
	if(strlen($_REQUEST["SIFRE"])<5)
		$hata.="<br>�ifre enaz 4 karakter olmal�!";

	/*if($_REQUEST["kullanim_kosullari"]<>1)
		$hata.="<br>Kullan�m ko�ullar�n� kabul etmeniz gerekmektedir!";
	*/
	if(strlen($hata)>0){
		$sen->mesajUyari("Uyar�","L�tfen Dikkat".$hata);
	}else{	
		
		/**
		 * bu email adresi ile daha �nceden �ye olunmu�mu? 
		 */
		if(!$id && $sayfa->uyeKontrol($db,$_REQUEST["EMAIL"])){
					$sen->mesajUyari("Uyar�","L�TFEN D�KKAT!<br><br>Bu email adresi �uan sistemde kay�tl�!");
		}else{
			if(!$id){				
				$x=explode(" ",$_REQUEST["AD_SOYAD"]);
				$data=array("AD"=>$x[0],"SOYAD"=>$x[1],"KULLANICI_ADI"=>$_REQUEST["KULLANICI_ADI"],"EMAIL"=>$_REQUEST["EMAIL"],"SIFRE"=>md5($_REQUEST["SIFRE"]),"TIP"=>"YONETICI");
				if($sen->veriEkle($db,tKULLANICILAR,$data)){
					$sen->mesajBasarili("Admin Kullan�c� A�ma","Yeni y�netici hesab� a��lm��t�r..");
				}else{
					$sen->mesajUyari("Hata","HATA OLU�TU! <br><br> L�tfen tekrar deneyiniz..");
				}
			}else{//g�ncelleme
				$x=explode(" ",$_REQUEST["AD_SOYAD"]);
				$data=array("uAD"=>$x[0],"uSOYAD"=>$x[1],"uKULLANICI_ADI"=>$_REQUEST["KULLANICI_ADI"],"uEMAIL"=>$_REQUEST["EMAIL"],"uSIFRE"=>md5($_REQUEST["SIFRE"]),"wID"=>$id);
				if($sen->veriGuncelle($db,tKULLANICILAR,$data)){
					$sen->mesajBasarili("Admin Kullan�c� G�ncellme","Y�netici bilgileri g�ncellenmi�tir..");
				}else{
					$sen->mesajUyari("Hata","HATA OLU�TU! <br><br> L�tfen tekrar deneyiniz..");
				}				
			}
			echo "<script>alert('Bilgiler Kaydedilmi�tir..');</script>";
			$sen->yonlendir("yonetici.php");				
		}
	}
}


switch($s){

	case 1:

		$icerikArray=$sayfa->getIcerik($db,$id);

		/**
		 * e-bulten g�rderme
		 */
		if($_POST["ebultenG�nder"]){					
			$liste=$sayfa->getEbultenMailListe($db);
			for($i=0,$c=count($liste);$i<$c;$i++){
				phpmailer(SAHIP_EMAIL,SAHIP_ADI,$liste[$i][EMAIL],$liste[$i][EMAIL],$icerikArray["BASLIK"],$icerikArray["HIZLI_BAKIS_ICERIK"],stripslashes($icerikArray["ICERIK"]),$AttmFiles,$bcc);
			}	
			if($i>0)
				$sen->mesajBasarili("e-B�lten G�nderme","B�lten ba�ar�l� bir �ekilde $i++ tane email adresine g�nderilmi�tir");
			else
				$sen->mesajUyari("L�tfen Dikkat!","e-B�lten g�nderilecek kullan�c� bulunmamaktad�r!");	
		} 

		$sen->smarty->assign('baslik',$icerikArray["BASLIK"]);
		$icerik=stripslashes($icerikArray["ICERIK"]);
		$sen->smarty->assign('hizli_bakis_icerik',$icerikArray["HIZLI_BAKIS_ICERIK"]);
		$sen->smarty->assign('icerik',$icerik);

		$sen->sYaz("admin_ebulten_onizle_gonder.tpl");
		break;
	case 2:
		
		/**
		 * i�erik kaydet g�ncelle
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
					$sayfa->mesajBasarili($sayfa_adi,$_REQUEST['BASLIK']." ba�l�kl� e-b�lten g�ncellenmi�tir");
				}else{
					$sayfa->mesajBasarili($sayfa_adi,$_REQUEST['BASLIK']." sayfas�nda hata olu�tu. L�tfen Tekrar deneyiniz..");						
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
					$sayfa->mesajBasarili($sayfa_adi,$_REQUEST['BASLIK']." ba�l�kl� e-bulten eklenmi�tir.");
				}else{
					$sayfa->mesajBasarili($sayfa_adi,$_REQUEST['BASLIK']." sayfas�nda hata olu�tu. L�tfen Tekrar deneyiniz..");						
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
	default://login ekran� veya y�netim ekran�

		$liste=$sayfa->getListe($db);
		$sen->smarty->assign('sayfalistesi',$liste);
		$sen->sYaz("admin_ebulten_liste.tpl");
		break;		
}
?>
