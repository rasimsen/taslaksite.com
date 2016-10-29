<?php
//admin
require_once("sInc/admin_uygulama.php");

$s=$_REQUEST['s'];

require_once("sInc/conf.php");
$sayfa=new sayfalar();


/**
 * conf kaydet butonuna týklandý
 */
if($_POST["btnSablonKaydet"]){
	$data=array("uDEGER"=>$_POST["TASLAK_TASARIM"],"wDEGISKEN"=>"TASLAK_TASARIM");
	$sayfa->veriGuncelle($db,tCONF,$data,0);	
	$sayfa->mesajBasarili("Þablon Deðiþtirme",'Sitenin þablonu "'.$_POST["TASLAK_TASARIM"].'" olarak deðiþtirilimiþtir.');
}


if($_POST && !$_POST["btnSablonKaydet"]){

	$data=array();
	$datai=array();
	foreach($_POST as $k=>$v){			
		$id=substr($k,5);
		if($_POST["btn_".$id]){
			//kaydet ve kes
			$data=array("uDEGER"=>$v,"wID"=>$id);
			$sayfa->veriGuncelle($db,tCONF,$data);
			break;
		}else{
			if($k=="conf_yeni_degisken" && trim($_POST["conf_yeni_degisken"])){
					$datai[]=array("DEGISKEN"=>$_POST["conf_yeni_degisken"],"DEGER"=>$_POST["conf_yeni_deger"],"DURUM"=>1);				
			}else{
				if($k<>"conf_yeni_degisken"){
					$data[]=array("uDEGER"=>$v,"wID"=>$id);
				}					
			}	
		}			
	}
	if($_POST["btn_tum_kaydet"] || $_POST["btn_yeni_ekle"]){
		if(count($datai)>0)	$sayfa->veriEkle($db,tCONF,$datai);
		
		for($i=0,$c=count($data);$i<$c;$i++){
			$sayfa->veriGuncelle($db,tCONF,$data[$i]);
		}
		$sayfa->mesajBasarili("Konfigürasyon Kaydetme","Konfigürasyon bilgileri baþarýyla kaydedilmiþtir.");
		
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

	/**
	 * klasör listesi
	* */
	$d = dir(TEMPLATES.sAYIRAC);
	//echo "Handle: ".$d->handle."<br>\n";
	//echo "Path: ".$d->path."<br>\n";
	while($entry=$d->read()) {
		if(substr($entry,0,1)=='.' || $entry == 'yonetimpanel')
			continue;
		else	
			$sablon_liste[$entry] = $entry;
		//echo $entry."<br>\n";
	}
	$d->close();	
	
	$secili_sablon=$sen->veriAlTekBoyut($db,tCONF,array("DEGER"),array("DEGISKEN"=>'TASLAK_TASARIM'),null,0);
	
	$sen->smarty->assign('secili_sablon',$secili_sablon[DEGER]);
	$sen->smarty->assign('sablon_liste',$sablon_liste);
	
	
	$liste=$sayfa->getListe($db);
	$sen->smarty->assign('conf',$liste);

	$sen->sYaz("admin_conf.tpl");

?>