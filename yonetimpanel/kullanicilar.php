<?php
//admin
require_once("sInc/admin_uygulama.php");

$s=$_REQUEST['s'];

require_once("sInc/kullanicilar.php");

$id=$_GET["id"];
$parent=$_GET["parent"];

$sen->smarty->assign('id',$id);
$sen->smarty->assign('parent',$parent);
$sen->smarty->assign('sayfa_adi',$sayfa_adi);

$sayfa=new Kullanicilar();

$ana_tablo=tKULLANICILAR;
$detay_tablo='';

switch($s){

	default://login ekran� veya y�netim ekran�

		/**
		 * menu s�ra kayd�
		 */
		$btnSira=$_POST["btnMenuSira"];
		if($btnSira){
			$siraArray=array();
			$durum=false;
			foreach($_POST as $k=>$v){
				if(substr($k,0,5)=='sira_'){
					$siraArray=array( "ADMIN_ID"=>$login->admin_id,
										"SIRA"=>$v?$v:0,
										"ID"=>substr($k,5));
					$durum=$sen->veriGuncelle($db,$ana_tablo,$siraArray);
				}
			}
			if($durum){
				$sen->mesajBasarili("S�ralama","S�ralamalar g�ncellenmi�tir..");
			}else{
				$sen->mesajUyari("Hata","HATA OLU�TU! <br><br> L�tfen tekrar deneyiniz..");
			}				
		}

		/**
		 * icerik sil
		 */	
	    if($_GET['sil_id']){
						$data=array("wID"=>$_GET['sil_id']);
						
						if($sen->veriSil($db,$ana_tablo,$data)){
							$sen->mesajBasarili("Kay�t Silme","Kay�t silinmi�tir..");
						}else{
							$sen->mesajUyari("Hata","HATA OLU�TU! <br><br> L�tfen tekrar deneyiniz..");
						}					    	
	    }
		
	    /**
	     * kay�t aktif / pasif etme
	     */
	    if($_GET['durum_id']){
						$data=array("uDURUM"=>$_GET["durum"],
									"wID"=>$_GET['durum_id']);
						
						if($sen->veriGuncelle($db,$ana_tablo,$data)){
							$sen->mesajBasarili("Kay�t Durumu","Kay�t durumu g�ncellenmi�tir..");
						}else{
							$sen->mesajUyari("Hata","HATA OLU�TU! <br><br> L�tfen tekrar deneyiniz..");
						}					    	
	    }
	
	    $kd=array(0=>"PAS�F",1=>"AKT�F",2=>"T�M�");
		$sen->smarty->assign('durum',2);				
	    
		$a=array("TIP"=>"KULLANICI");
		if($_POST["kullaniciArama"]){//arama yap�ld� ise
			if(strlen($_POST["textAra"])>0)
				$a["_LIKE_KULLANICI_ADI"]=$_POST["textAra"];

			if($_POST["DURUM"]<2){
				$a["DURUM"]=$_POST["DURUM"];
			}			

			$sen->smarty->assign('durum',$_POST["DURUM"]);				
			$sen->smarty->assign('textAra',$_POST["textAra"]);				
		}
		
		//$liste=$sen->veriAl($db,$ana_tablo,array(),$a,'',1);
		$liste=$sayfa->kullaniciListe($db,$a);
		$sen->smarty->assign('sonuc',"Toplam <b>".count($liste)."</b> adet kullan�c� listelenmektedir.");				
		
		
		$sen->smarty->assign('kd',$kd);
		$sen->smarty->assign('iceriklistesi',$liste);


		$sen->sYaz("admin_kullanicilar_liste.tpl");
		break;		
}

?>