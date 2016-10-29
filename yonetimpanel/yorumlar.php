<?php

 /**
  * yorum
  * 
  * kullan�c�lar taraf�ndan siteye eklenen yorumlar�n y�netildi�i ekrand�r..
  * 
  * Olu�turulma tarihi : 16.Kas.2008
  * @link http://www.rasimsen.com
  * @copyright 2008 Rasim �EN
  * @author Rasim �EN<dev@rasimsen.com>
  * @version 1.0  
  */

require_once("sInc/admin_uygulama.php");
require_once("sInc/yorumlar.php");

$sayfa=new Yorum();

$sayfa_adi=$_GET["sayfa_adi"];
$id=$_GET["id"];
$parent=$_GET["parent"];
$geri_id=$_GET["geri_id"];

$sen->smarty->assign('id',$id);
$sen->smarty->assign('parent',$parent);
$sen->smarty->assign('geri_id',$geri_id);
$sen->smarty->assign('sayfa_adi',$sayfa_adi);

$ana_tablo=tYORUM;
$detay_tablo=null;

$sen->smarty->assign('yp_sayfa_adi','YORUMLAR');
$sen->smarty->assign('yp_sayfa_aciklama','Yoruma a��k olan sayfalara eklenmi� olan yorumlar�n y�netildi�i ekran.');

$sil_id=$_GET["sil_id"];
if($sil_id){
	if(!$sen->veriSil($db,$ana_tablo,array("wID"=>$sil_id),1)){
		$sen->mesajUyari("Yorum Silme","Yorum silinemedi. L�tfen tekrar deneyiniz..");
	}			
}

$durum_id=$_REQUEST["durum_id"];
if($durum_id){
	$durum=$_REQUEST["durum"]=="AKTIF"?"0":"1";
	if(!$sayfa->veriGuncelle($db,$ana_tablo,array("uDURUM"=>$durum,"wID"=>$durum_id))) $sen->mesajUyari("HATA","HATA OLU�TU!");
}

switch($s){

	case 1:

		break;
		
	default:

		//$liste=$sen->veriAl($db,$ana_tablo,null,array("DURUM"=>($sen->alGet("DURUM")?$sen->alGet("DURUM"):'0')),array("OLUS_TARIHI","OLUS_SAATI"),1);
		$lo=new Yorum();
		$liste=$lo->alYorumListe($db,
			(string)$sen->alRequest("DURUM"),
			$sen->alRequest("sayfa_id"),
			$sen->alRequest("kullanici_id"),
			$sen->alGet("admin_id"),
			0);
		
		$say=$lo->alYorumVeriSay($db,
			(string)$sen->alRequest("DURUM"),
			$sen->alRequest("sayfa_id"),
			$sen->alRequest("kullanici_id"),
			$sen->alGet("admin_id"),
			0);

		$sen->smarty->assign('iceriklistesi',$liste);
		$sen->smarty->assign('taslak_navigator_genel',$sen->taslakNavigatorGenel($p,sayfaAdresiNav(),LISTELENECEK_KAYIT_SAYISI,$say[0][SAY]));
		

		$sen->sYaz("admin_yorumlar_liste.tpl");
		break;		

}
?>
