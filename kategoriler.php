<?php
	require_once("sInc/sayfa_uygulama.php");
	$sen=new TaslakSayfa();
	
	$sayfa_bilgi=$sen->Hazirla($db,$_GET['id']);
	$sen->smarty->assign('sayfa_linki',DEF_SAYFA_LINKI);
	$sen->smarty->assign('sayfa_icerik',$sayfa_bilgi["ICERIK"]);
	$sen->smarty->assign('alt_basliklar',$sayfa_bilgi["ALT_BASLIKLAR"]);
	
	if($sen->alGet('kategori_id')){
		$where = array("DURUM"=>1,'PARENT'=>$sen->alGet('kategori_id'));
	}elseif($sen->alGet('etiket_adi')){
		$where = array("DURUM"=>1,'_LIKE_ETIKETLER'=>$sen->alGet('etiket_adi'));	
	}else{
		$where = array("DURUM"=>1);	
	}

	$select=array('ID','PARENT','BASLIK','THUMBNAIL','KISA_OZET','ETIKETLER','DEG_TARIHI','DEG_SAATI','SIZ','ADMIN_ID');
	if($sen->alGet('id')){
		$select=array_merge($select,array('ICERIK'));
		$where['ID']=$sen->alGet('id');
	}

	$p=$sen->alGet('p')?$sen->alGet('p'):0;
	$limit=array($p,LISTELENECEK_KAYIT_SAYISI);
	
	$guncel_veri=$sen->veriAlLimitli($db,tKATEGORI_ICERIK,$select,$where,array("SIZ DESC"),$limit,0);
	foreach($guncel_veri as $anahtar=>$deger){
		$guncel_veri[$anahtar][KULLANICI_ADI]=$deger[ADMIN_ID]?$sen->alKullaniciAdi($db,$deger[ADMIN_ID]):'yönetici';
		$guncel_veri[$anahtar][KATEGORI_ADI]=$sen->alKategoriAdi($db,$deger[PARENT]);
		$guncel_veri[$anahtar][ETIKET]=$sen->alEtiket($deger[ETIKETLER],'index.php?');		
	}
	
	$toplam_veri=$sen->veriSay($db,tKATEGORI_ICERIK,$where,"","",array("COUNT"=>"*"),0,true);
	
	//pre($toplam_veri);
	$sen->smarty->assign('guncel_veri',$guncel_veri);	
	$sen->smarty->assign('taslak_navigator_genel',$sen->taslakNavigatorGenel($p,sayfaAdresiNav(),LISTELENECEK_KAYIT_SAYISI,$toplam_veri[0][COUNT]));
	
	$sen->sYaz(DEF_SAYFA_TASLAGI);
?>