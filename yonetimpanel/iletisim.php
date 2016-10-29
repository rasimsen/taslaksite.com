<?php
//admin
require_once("sInc/admin_uygulama.php");
require_once("sInc/iletisim.php");

$s=$_REQUEST['s'];

$sayfa=new sayfalar();

$sen->smarty->assign('yp_sayfa_adi','MESAJLAR');
$sen->smarty->assign('yp_sayfa_aciklama','Gelen mesajlar');


switch($s){

	case 1:
		
		$mesaj_id=$_REQUEST["mesaj_id"];

		$liste=$sayfa->getSayfaListesi($db,$mesaj_id);
		$mesaj=$liste[0];
		
		$sen->smarty->assign('gonderen',$mesaj["GONDEREN_ADI"].' <'.$mesaj["EMAIL"].'>');
		$sen->smarty->assign('konu',$mesaj["KONU"]." (".$mesaj["OLUS_TARIHI"]." tarihinde gönderilmiþtir.)");
		$sen->smarty->assign('mesaj',$mesaj["MESAJ"]);
		$sen->smarty->assign('mesaj_tipi',$mesaj["MESAJ_TIPI"]);
		$sen->smarty->assign('dosya_eki',$mesaj["DOSYA_EKI"]);
		$sen->smarty->assign('id',$mesaj["ID"]);
		
		$sayfa->icerikGuncelle($db,$mesaj_id);
		$sen->sYaz("admin_iletisim_detay.tpl");
		break;

	case 2:
		$md=$sayfa->getSayfaListesi($db,$_GET["id"]);
		$detay=$sen->selectData($db,tDOSYALAR,array("REF_ID"=>$_GET["id"]));

		header('Content-type:'.$detay[0][DOSYA_TIPI]);
		// It will be called downloaded.pdf
		header('Content-Disposition: attachment; filename="'.$md[0][GONDEREN_ADI]." ".$detay[0]["DOSYA_URL"].'"');
		readfile(YUKLENEN_DOSYA_EKLERI.IK_CV_SAVE_PATH."/".$detay[0]["DOSYA_URL"]);
		
		break;	
	default://login ekraný veya yönetim ekraný

		/**
		 * icerik silme
		 */
		$sil_id=$_REQUEST["sil_id"];
		if($sil_id){
			if(!$sayfa->icerikSil($db,$sil_id)){
				pre("HATA OLUÞTU!");
			}			
		}


		/**
		 * icerikleri aktif yada pasif etmek için
		 */
		$durum_id=$_REQUEST["durum_id"];
		if($durum_id){
			$durum=$_REQUEST["durum"]=="AKTIF"?"0":"1";
			if(!$sayfa->sayfaDurum($db,array("DURUM"=>$durum,"DURUM_ID"=>$durum_id))) pre("HATA OLUÞTU!");
		}

		$liste=$sayfa->getSayfaListesi($db);

		$sen->smarty->assign('sayfalistesi',$liste);

		$sen->sYaz("admin_iletisimliste.tpl");
		break;		
}

?>