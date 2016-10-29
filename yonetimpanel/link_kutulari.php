<?php
//admin
require_once("sInc/admin_uygulama.php");

$s=$_REQUEST['s'];

require_once("sInc/link_kutulari.php");

$id=$_GET["id"];
$parent=$_GET["parent"];

$sen->smarty->assign('id',$id);
$sen->smarty->assign('parent',$parent);
$sen->smarty->assign('sayfa_adi',$sayfa_adi);

$sayfa=new LinkKutulari();

$ana_tablo=tLINK_KUTULARI;
$detay_tablo=tLINK_KUTULARI_ICERIK;

switch($s){

	case 1:

		/**
		 * icerik sil
		 */	
	    if($_GET['sil_id']){
						$data=array("wID"=>$_GET['sil_id']);
						
						if($sen->veriSil($db,$detay_tablo,$data,0)){
							$sen->mesajBasarili("Kayýt Silme","Kayýt silinmiþtir..");
						}else{
							$sen->mesajUyari("Hata","HATA OLUÞTU! <br><br> Lütfen tekrar deneyiniz..");
						}					    	
	    }
		
	    /**
	     * kayýt aktif / pasif etme
	     */
	    if($_GET['durum_id']){
						$data=array("uDURUM"=>$_GET["durum"],
									"wID"=>$_GET['durum_id']);
						
						if($sen->veriGuncelle($db,$detay_tablo,$data,0)){
							$sen->mesajBasarili("Kayýt Durumu","Kayýt durumu güncellenmiþtir..");
						}else{
							$sen->mesajUyari("Hata","HATA OLUÞTU! <br><br> Lütfen tekrar deneyiniz..");
						}					    	
	    }
	    
		$sen->smarty->assign('id',null);
		$sen->smarty->assign('parent',$id);
		
		$btnSira=$_POST["btnSira"];
		if($btnSira){
			$siraArray=array();
			$durum=false;
			foreach($_POST as $k=>$v){
				if(substr($k,0,5)=='sira_'){
					$siraArray=array( "uADMIN_ID"=>$login->admin_id,
										"uSIRA"=>$v?$v:0,
										"wID"=>substr($k,5));
					$durum=$sen->veriGuncelle($db,$detay_tablo,$siraArray,0);
				}
			}

			if($durum){
				$sen->mesajBasarili("Sýralama","Sýralamalar güncellenmiþtir..");
			}else{
				$sen->mesajUyari("Hata","HATA OLUÞTU! <br><br> Lütfen tekrar deneyiniz..");
			}				
		}

		$kd=$sen->selectData($db,$ana_tablo,array('ID'=>$id));		
		$sen->smarty->assign('kutu_adi',$kd[0]["KUTU_ADI"]);

		//bu sayfadaki diðer içerikler
		$liste=$sen->selectData($db,$detay_tablo,array('PARENT'=>$id),'','',0);
		$sen->smarty->assign('iceriklistesi',$liste);

		$sen->sYaz("admin_linkkutulari_icerik_liste.tpl");
		break;
	
	case 2:

			if($_POST["btnSayfaEkleGuncelle"]){
				
				$hata="";
				if(strlen($_POST["LINK_ADI"])<3)
					$hata.="<br><br>Link Adýný boþ býrakmayýnýz!";								
/*
				if(strlen($_POST["LINK_URL"])<3)
					$hata.="<br><br>Link URL i boþ býrakmayýnýz!";
*/					
				if(strlen($hata)>0){
					$sen->mesajUyari("Uyarý","Lütfen Dikkat".$hata);
				}else{	
						$id=$_POST["ID"];
						if(!$id){//yeni ekle				
							$data=array("LINK_ADI"=>$_POST["LINK_ADI"],
										"LINK_URL"=>$_POST["LINK_URL"],
										"PARENT"=>$_POST["PARENT"],
										"LINK_TARGET"=>$_POST["LINK_TARGET"],
										"LINK_SOURCE"=>$_POST["LINK_SOURCE"],
										"ADMIN_ID"=>$login->admin_id);
							$id=$sen->veriEkle($db,$detay_tablo,$data,0);
							if($id){
								$sen->mesajBasarili("Link Ekle/Güncelleme","Yeni link eklenmiþtir..");
							}else{
								$sen->mesajUyari("Hata","HATA OLUÞTU! <br><br> Lütfen tekrar deneyiniz..");
							}
						}else{//güncelleme

							$data=array("uLINK_ADI"=>$_POST["LINK_ADI"],
										"uLINK_URL"=>$_POST["LINK_URL"],
										"uLINK_TARGET"=>$_POST["LINK_TARGET"],
										"uLINK_SOURCE"=>$_POST["LINK_SOURCE"],
										"uADMIN_ID"=>$login->admin_id,
										"wID"=>$id);
							
							if($sen->veriGuncelle($db,$detay_tablo,$data,0)){
								$sen->mesajBasarili("Link Ekle/Güncelleme","Link güncellenmiþtir..");
							}else{
								$sen->mesajUyari("Hata","HATA OLUÞTU! <br><br> Lütfen tekrar deneyiniz..");
							}				
						}
						//echo "<script>alert('Bilgiler Kaydedilmiþtir..');</script>";
						//$sen->yonlendir("sayfalar.php");
					}
				}
				$ana=$sen->selectData($db,$ana_tablo,array('ID'=>$parent));
				$sen->smarty->assign('kutu_adi',$ana[0]["KUTU_ADI"]);
				
				$icerik=$sen->selectData($db,$detay_tablo,array('ID'=>$id));
				
				$sen->smarty->assign('id',$icerik[0]["ID"]);
				$sen->smarty->assign('parent',$parent);
				$sen->smarty->assign('link_adi',$icerik[0]["LINK_ADI"]);
				$sen->smarty->assign('link_url',$icerik[0]["LINK_URL"]);
				$sen->smarty->assign('link_target',$icerik[0]["LINK_TARGET"]);
				$sen->smarty->assign('link_source',$icerik[0]["LINK_SOURCE"]);
				
				$sen->sYaz("admin_linkkutulari_icerik_ekle_guncelle.tpl");		
		
		
		break;		

	case 3:
		break;		
	
	/**
	 * sayfa detaylarý belirtilir
	 */
	case 4:
	
			if($_POST["btnSayfaEkleGuncelle"]){
				
				$hata="";
				if(strlen($_REQUEST["KUTU_ADI"])<3)
					$hata.="<br><br>Kutu Adýný boþ býrakmayýnýz!";								
			
				if(strlen($hata)>0){
					$sen->mesajUyari("Uyarý","Lütfen Dikkat".$hata);
				}else{	
					
						if(!$id){//yeni ekle				
							$data=array("KUTU_ADI"=>$_POST["KUTU_ADI"],
										"ADMIN_ID"=>$login->admin_id);
							if($sen->veriEkle($db,$ana_tablo,$data)){
								$sen->mesajBasarili("Lýnk Kutularý Ekle/Güncelleme","Yeni link kutusu eklenmiþtir..");
							}else{
								$sen->mesajUyari("Hata","HATA OLUÞTU! <br><br> Lütfen tekrar deneyiniz..");
							}
						}else{//güncelleme
							$data=array("uKUTU_ADI"=>$_POST["KUTU_ADI"],
										"uADMIN_ID"=>$login->admin_id,
										"wID"=>$id);

							if($sen->veriGuncelle($db,$ana_tablo,$data)){
								$sen->mesajBasarili("Link Kutusu Ekle/Güncelleme","Link kutusu güncellenmiþtir..");
							}else{
								$sen->mesajUyari("Hata","HATA OLUÞTU! <br><br> Lütfen tekrar deneyiniz..");
							}				
						}
						//echo "<script>alert('Bilgiler Kaydedilmiþtir..');</script>";
						//$sen->yonlendir("sayfalar.php");
					}
				}

				$icerik=$sen->selectData($db,$ana_tablo,array('ID'=>$id));
				
				$sen->smarty->assign('id',$icerik[0]["ID"]);
				$sen->smarty->assign('kutu_adi',$icerik[0]["KUTU_ADI"]);

				$sen->sYaz("admin_linkkutulari_ekle_guncelle.tpl");
			
		break;		
			
	default://login ekraný veya yönetim ekraný

		/**
		 * menu sýra kaydý
		 */
		$btnSira=$_POST["btnMenuSira"];
		if($btnSira){
			$siraArray=array();
			$durum=false;
			foreach($_POST as $k=>$v){
				if(substr($k,0,5)=='sira_'){
					$siraArray=array( "uADMIN_ID"=>$login->admin_id,
										"uSIRA"=>$v?$v:0,
										"wID"=>substr($k,5));
					$durum=$sen->veriGuncelle($db,$ana_tablo,$siraArray,0);
				}
			}
			if($durum){
				$sen->mesajBasarili("Sýralama","Sýralamalar güncellenmiþtir..");
			}else{
				$sen->mesajUyari("Hata","HATA OLUÞTU! <br><br> Lütfen tekrar deneyiniz..");
			}				
		}

		/**
		 * icerik sil
		 */	
	    if($_GET['sil_id']){
						$data=array("wID"=>$_GET['sil_id']);
						
						if($sen->veriSil($db,$ana_tablo,$data)){
							$sen->mesajBasarili("Kayýt Silme","Kayýt silinmiþtir..");
						}else{
							$sen->mesajUyari("Hata","HATA OLUÞTU! <br><br> Lütfen tekrar deneyiniz..");
						}					    	
	    }
		
	    /**
	     * kayýt aktif / pasif etme
	     */
	    if($_GET['durum_id']){
						$data=array("uDURUM"=>$_GET["durum"],
									"wID"=>$_GET['durum_id']);
						
						if($sen->veriGuncelle($db,$ana_tablo,$data)){
							$sen->mesajBasarili("Kayýt Durumu","Kayýt durumu güncellenmiþtir..");
						}else{
							$sen->mesajUyari("Hata","HATA OLUÞTU! <br><br> Lütfen tekrar deneyiniz..");
						}					    	
	    }
	


		
		//$liste=$sayfa->getListe($db);
		$liste=$sen->veriAl($db,$ana_tablo,null,null,array("SIRA","ID"));
		
		$sen->smarty->assign('iceriklistesi',$liste);


		$sen->sYaz("admin_linkkutulari_liste.tpl");
		break;		
}

?>