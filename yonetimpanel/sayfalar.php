<?php
//admin
require_once("sInc/admin_uygulama.php");

$s=$_REQUEST['s'];

require_once("sInc/sayfalar.php");
require_once("../sInc/upload.php");

$sayfa_adi=$_GET["sayfa_adi"];
$id=$_GET["id"];
$parent=$_GET["parent"];
$geri_id=$_GET["geri_id"];

$sen->smarty->assign('id',$id);
$sen->smarty->assign('parent',$parent);
$sen->smarty->assign('geri_id',$geri_id);
$sen->smarty->assign('sayfa_adi',$sayfa_adi);

$sayfa=new sayfalar();

/**
 * foto�raf silme
 */
$sil_id=$_GET["img_sil_id"];
if($sil_id){
	if(!$sayfa->fotoDetaySil($db,$sil_id)){
		pre("HATA OLU�TU!");
	}			
}

if($_GET["thumb_sil"] && $id ){
	if(!$sayfa->fotoThumbSilme($db,$sayfa_adi,$id,$parent)){
		pre("HATA OLU�TU!");
	}else{
		$sayfa->yonlendir(str_replace('&thumb_sil=ok',"",$_SERVER[REQUEST_URI]));
	}
}

/**
 * foto�raflar� aktif yada pasif etmek i�in
 */
$durum_id=$_REQUEST["img_durum_id"];
if($durum_id){
	$durum=$_REQUEST["durum"]=="AKTIF"?"0":"1";
	if(!$sen->veriGuncelle($db,tDOSYALAR,array("uDURUM"=>$durum,"wID"=>$durum_id)))
		$sen->mesajUyari("G�ncelleme","G�ncellemede hata olu�tu. L�tfen tekrar deneyiniz..");
	
	//if(!$sayfa->fotoDetayDurum($db,array("DURUM"=>$durum,"DURUM_ID"=>$durum_id))) pre("HATA OLU�TU!");
}

/**
 * dosya y�kleme
 *
 * @param unknown_type $fl
 * @param unknown_type $adres
 * @param unknown_type $tip
 * @param unknown_type $id
 * @param unknown_type $fl_aciklama
 * @return unknown
 */
function yukleDosya($db,$sen,$fl,$adres,$tip,$id,$fl_aciklama){
	
		if(!is_array($fl)) 
			return true;
			
		$file_upload=new upload();
		/**
		 * foto y�kleme ise
		 */
		if($tip=='FOTO'){
					$fl_upload=$file_upload->photo_upload($fl,$adres);//default TR - thumb ve resized
					//pre($thumb);die;
					/*if(count($thumb)>0){
						$general=array("REF_ID"=>$id,"TIP"=>"FOTO","ADMIN_ID"=>$login->admin_id);
						$sayfa->fotoKaydet($db,$general,$thumb);
					}*/					
			//$fl_upload=$file_upload->file_upload($fl,$adres,$tip."_");			
		}else {
			$fl_upload=$file_upload->file_upload($fl,$adres,$tip."_");			
		}
		
		if(is_array($fl_upload) && $fl_upload["HATA"]){
			$sen->mesajUyari("Hata",$fl_upload["HATA"]);
			return false;
		}else{
			$general=array( "REF_ID"=>$id,
							"TIP"=>$tip,
							"DOSYA_URL"=>($tip=='FOTO'?$fl_upload[0][THUMBNAIL]:$fl_upload),
							"DOSYA_TIPI"=>($tip=='FOTO'?$fl["type"][0]:$fl["type"]),
							"KISA_ACIKLAMA"=>$fl_aciklama,
							"AD"=>($tip=='FOTO'?$fl["name"][0]:$fl["name"]),
							"BOYUT"=>($tip=='FOTO'?$fl["size"][0]:$fl["size"]),
							"THUMB_GENISLIK"=>$fl_upload[0]["THUMB_WIDTH"],
							"THUMB_YUKSEKLIK"=>$fl_upload[0]["THUMB_HEIGHT"],
							"FOTO_GENISLIK"=>$fl_upload[0]["WIDTH"],
							"FOTO_YUKSEKLIK"=>$fl_upload[0]["HEIGHT"],
							"THUMBNAIL"=>$fl_upload[0]["THUMBNAIL"],
							"FOTO"=>$fl_upload[0]["NAME"]	
						   );
			return $sen->veriEkle($db,tDOSYALAR,$general,0);
		}
	
}

switch($s){

	case 1:

		$sen->smarty->assign('yp_sayfa_adi','SAYFA I�ERIGI');
		$sen->smarty->assign('yp_sayfa_aciklama','Ilgili sayfa i�in sitede g�sterilecek olan i�erikler sayfasidir.');
		/**
		  * y�netim paneli toolbar ayarlari
		  */
		$yp_arac_cubugu=array(
			"EKLE_LINK"=>'',
			"EKLE_TITLE"=>'Yeni Alt Baslik Ekle',
			"EKLE_DURUM"=>'',/*aktif pasif button g�sterilecek*/
			"GUNCELLE_LINK"=>'',
			"GUNCELLE_TITLE"=>$sayfa_adi.' basligini g�ncelle',
			"GUNCELLE_DURUM"=>'',/*aktif pasif button g�sterilecek*/
			"KAYDET_LINK"=>'javascript:yp_form_submit(\'form2\');',
			"KAYDET_TITLE"=>'Siralama Kaydet',/*siralama kaydeder*/
			"KAYDET_DURUM"=>'',/*aktif pasif button g�sterilecek*/
			"SIL_LINK"=>'',
			"SIL_TITLE"=>'Se�ili Kayitlari Sil',
			"SIL_DURUM"=>'',/*aktif pasif button g�sterilecek*/
			"GERI_LINK"=>'javascript:yp_geri()',
			"GERI_TITLE"=>'�nceki Sayfaya Git',
			"GERI_DURUM"=>'',/*aktif pasif button g�sterilecek*/
			"ILERI_LINK"=>'javascript:yp_ileri()',
			"ILERI_TITLE"=>'Sonraki Sayfaya Git',
			"ILERI_DURUM"=>'',/*aktif pasif button g�sterilecek*/
			"ARA_LINK"=>'javascript://',
			"ARA_TITLE"=>'ARA',
			"ARA_DURUM"=>'_p',/*aktif pasif button g�sterilecek*/
			"BILGI_LINK"=>'javascript://',
			"BILGI_TITLE"=>'Bilgi',
			"BILGI_DURUM"=>'_p'
		);
		$sen->smarty->assign('yp_ac',$yp_arac_cubugu);
		
		
		/**
		 * i�erik s�ra kayd�
		 */
		$btnSira=$_POST["btnSira"];
		if($btnSira){
			$siraArray=array();
			foreach($_POST as $k=>$v){
				if(substr($k,0,5)=='sira_'){
					$siraArray[]=array( "ADMIN_ID"=>$login->admin_id,
										"DEGISME_TARIHI"=>date("d-m-y h:i:s"),
										"SIRA"=>$v,
										"ICERIK_ID"=>substr($k,5));								
				}
			}
			if($siraArray && !$sayfa->baslikSiraKaydet($db,$siraArray)){
				pre("HATA OLU�TU!");
			}			
		}
		
		
		/**
		 * icerik silme
		 */
		$sil_id=$_REQUEST["sil_id"];
		if($sil_id){
			if(!$sayfa->icerikSil($db,$sil_id)){
				pre("HATA OLU�TU!");
			}			
		}
		
		/**
		 * icerikleri aktif yada pasif etmek i�in
		 */
		$durum_id=$_REQUEST["durum_id"];
		if($durum_id){
			$durum=$_REQUEST["durum"]=="AKTIF"?"0":"1";
			if(!$sayfa->icerikDurum($db,array("DURUM"=>$durum,"DURUM_ID"=>$durum_id))) pre("HATA OLU�TU!");
		}

		$icerik_id=null;
		$baslik=null;
		$icerik=null;

		/**
		 * kategori alt�ndaki bilgi ekrana bas�l�r..
		 */
		if($parent==0){
			$icerikArray=$sayfa->getAnaIcerik($db,$sayfa_adi);
			$sen->smarty->assign('baslik_adi',$sayfa_adi);
		}else{
			$icerikArray=$sayfa->getIcerik($db,$id);
			$sen->smarty->assign('baslik_adi',$icerikArray["BASLIK"]);
		}	
		$sen->smarty->assign('islemTipi',$icerikArray?'guncelle':'ekle');
		
		$baslik=$icerikArray["BASLIK"];
		$icerik=stripslashes($icerikArray["ICERIK"]);
		$sen->smarty->assign('baslik',$baslik);
		$sen->smarty->assign('kisa_ozet',$icerikArray["KISA_OZET"]);
		$sen->smarty->assign('icerik',$icerik);
		$sen->smarty->assign('thumbnail',$icerikArray['THUMBNAIL']);
		
		
		
		
		//bu sayfadaki di�er i�erikler
		$liste=$sayfa->getSayfaIcerik($db,$sayfa_adi,null,$id);

		//bu sayfadaki fotolar
		//$foto=$sayfa->getFotolar($db,$id,"FOTO");
		$foto=$sen->veriAl($db,tDOSYALAR,array("ID","THUMBNAIL","REF_ID","AD","KISA_ACIKLAMA","BOYUT","DURUM"),array("REF_ID"=>$id,"TIP"=>"FOTO"),array("SIRA","AD"),0);
		$sen->smarty->assign('fotolistesi',$foto);

		$dosya=$sen->veriAl($db,tDOSYALAR,array("ID","REF_ID","AD","KISA_ACIKLAMA","BOYUT","DURUM"),array("REF_ID"=>$id,"TIP"=>"FILE"),array("SIRA","AD"),0);
		$sen->smarty->assign('dosyalistesi',$dosya);
		
		$sen->smarty->assign('iceriklistesi',$liste);

		$sen->sYaz("admin_sayfalar.tpl");
		break;
	
	/**
	 * Ba�l�k Detay� girme g�ncelleme alan�d�r..
	 */
	case 2:
		
		//$sayfa=new sayfalar();

		/**
		 * i�erik kaydet g�ncelle
		 */
		if($_REQUEST["icerikKaydet"]){				
			$islemTipi=$_REQUEST["islemTipi"];
			
			$img=$_FILES["THUMBNAIL"];
			if(isset($img)){					
				$image_upload=new upload();
				$thumb=$image_upload->photo_upload($img,YUKLENEN_DOSYA_EKLERI.FOTO_KAYIT_ADRES);//default TR - thumb ve resized
			}				
			
			
			if($islemTipi=='guncelle'){
				$veri_t=array();
				if(strlen($thumb[0][THUMBNAIL])>0 )
					$veri_t['uTHUMBNAIL']=$thumb[0][THUMBNAIL];

				if($parent==0){
					$veri=array(
								'uBASLIK'=>$_REQUEST['BASLIK'], 
								'uKISA_OZET'=>(string)substr($_REQUEST['KISA_OZET'],0,512), 
								'uICERIK'=>(string)$_REQUEST['ICERIK'], 
								'uADMIN_ID'=>$login->admin_id,								
								'wPARENT'=>0, 
								'wSAYFA_ADI'=>$sayfa_adi 
								);	
				}else{
					$veri=array(
								'uBASLIK'=>$_REQUEST['BASLIK'], 
								'uKISA_OZET'=>(string)substr($_REQUEST['KISA_OZET'],0,512), 
								'uICERIK'=>(string)$_REQUEST['ICERIK'], 
								'uADMIN_ID'=>$login->admin_id,
								'wID'=>$id, 
								'wSAYFA_ADI'=>$sayfa_adi 
								);						
				}

				if($sayfa->veriGuncelle($db,tSAYFALAR_ICERIK,array_merge($veri_t,$veri),0)){
					$sayfa->mesajBasarili($sayfa_adi,$_REQUEST['BASLIK']." ba�l�kl� i�erik g�ncellenmi�tir");
				}else{
					$sayfa->mesajBasarili($sayfa_adi,$_REQUEST['BASLIK']." sayfas�nda hata olu�tu. L�tfen Tekrar deneyiniz..");						
				}											
			}else{
				$veri=array(
							'PARENT'=>$parent, 
							'SAYFA_ADI'=>$sayfa_adi, 
							'BASLIK'=>$_REQUEST['BASLIK'], 
							'KISA_OZET'=>(string)substr($_REQUEST['KISA_OZET'],0,512), 
							'ICERIK'=>(string)$_REQUEST['ICERIK'], 
							'ADMIN_ID'=>$login->admin_id,
							'THUMBNAIL'=>$thumb[0][THUMBNAIL]);		
				$id=$sayfa->veriEkle($db,tSAYFALAR_ICERIK,$veri,0);	
				echo "<script>var hr=(location.href+'&ok').replace('&id=','&id=".$id."&ok');" .
						"location.href=hr;</script>";
				//pre($id);				
				if($id || $_GET["ok"]){
					$sayfa->mesajBasarili($sayfa_adi,$_REQUEST['BASLIK']." ba�l�kl� i�erik eklenmi�tir.");
				}else{
					$sayfa->mesajBasarili($sayfa_adi,$_REQUEST['BASLIK']." sayfas�nda hata olu�tu. L�tfen Tekrar deneyiniz..");						
				}											
			}
		}

		if($_GET["ok"]){
			$sayfa->mesajBasarili($sayfa_adi,$_REQUEST['BASLIK']." ba�l�kl� i�erik eklenmi�tir.");
		}											


		if($parent==0)
			$icerikArray=$sayfa->getAnaIcerik($db,$sayfa_adi);
		else
			$icerikArray=$sayfa->getIcerik($db,$id);
			
		$sen->smarty->assign('islemTipi',$icerikArray?'guncelle':'ekle');
		
		$baslik=$icerikArray["BASLIK"];
		$icerik=stripslashes($icerikArray["ICERIK"]);
		$sen->smarty->assign('baslik',$baslik);
		$sen->smarty->assign('kisa_ozet',$icerikArray["KISA_OZET"]);
		$sen->smarty->assign('icerik',$icerik);
		$sen->smarty->assign('thumbnail',$icerikArray['THUMBNAIL']);
	
		$sen->sYaz("admin_sayfa_icerik_ekle_guncelle.tpl");
		break;

	/**
	 * Foto�raf y�kleme alan�..
	 */
	case 3:
		
		//$sayfa=new sayfalar();			
		if($_REQUEST["fotoKaydet"]){

			if($id){				
				/**
				 * dosya eki
				 */
			if(isset($_FILES["DOSYA1"]) || isset($_FILES["DOSYA2"]) || isset($_FILES["DOSYA3"]) || isset($_FILES["DOSYA4"])){
					if($_FILES["DOSYA1"][error][0]===0 && !yukleDosya($db,$sen,$_FILES["DOSYA1"],YUKLENEN_DOSYA_EKLERI.FOTO_KAYIT_ADRES ,"FOTO",$id,$_POST["KISA_ACIKLAMA1"])){
						$sen->mesajUyari("Dosya Y�kleme",'Dosya Y�klenemedi l�tfen tekrar deneyiniz..');
					}elseif ($_FILES["DOSYA2"][error][0]===0 && !yukleDosya($db,$sen,$_FILES["DOSYA2"],YUKLENEN_DOSYA_EKLERI.FOTO_KAYIT_ADRES ,"FOTO",$id,$_POST["KISA_ACIKLAMA2"])) {
						$sen->mesajUyari("Dosya Y�kleme",'2.Dosya Y�klenemedi l�tfen tekrar deneyiniz..');
					}elseif ($_FILES["DOSYA3"][error][0]===0 && !yukleDosya($db,$sen,$_FILES["DOSYA3"],YUKLENEN_DOSYA_EKLERI.FOTO_KAYIT_ADRES ,"FOTO",$id,$_POST["KISA_ACIKLAMA3"])) {
						$sen->mesajUyari("Dosya Y�kleme",'3.Dosya Y�klenemedi l�tfen tekrar deneyiniz..');
					}elseif ($_FILES["DOSYA4"][error][0]===0 && !yukleDosya($db,$sen,$_FILES["DOSYA4"],YUKLENEN_DOSYA_EKLERI.FOTO_KAYIT_ADRES ,"FOTO",$id,$_POST["KISA_ACIKLAMA4"])) {
						$sen->mesajUyari("Dosya Y�kleme",'4.Dosya Y�klenemedi l�tfen tekrar deneyiniz..');
					}else {
						$sen->mesajBasarili("Dosya Y�kleme","Ba�ar�l�..");		
					}
				}				
				
			}	
			else{
				$sen->mesajUyari("Dosya Y�kleme","Hata olu�tu! L�tfen tekra deneyiniz..");
			}					
			
			/*
			if($id){				

				$img=$_FILES["THUMBNAIL"];
				if(isset($img)){					

					$image_upload=new upload();
					$thumb=$image_upload->photo_upload($img,"../foto");//default TR - thumb ve resized
					
					if(count($thumb)>0){
						$general=array("REF_ID"=>$id,"TIP"=>"FOTO","ADMIN_ID"=>$login->admin_id);
						$sayfa->fotoKaydet($db,$general,$thumb);
					}					
					
				}				

				$sen->mesajBasarili("Foto�raf Y�kleme","Ba�ar�l�..");
			}	
			else{
				$sen->mesajHata("Foto�raf Y�kleme","Hata olu�tu! L�tfen tekra deneyiniz..");
			}*/					
		}

		//bu sayfadaki fotolar
		$foto=$sayfa->getFotolar($db,$id,"FOTO");
		//pre($foto);
		$sen->smarty->assign('dosyalistesi',$foto);
		//$sen->smarty->assign('iceriklistesi',$liste);
					
		$sen->sYaz("admin_sayfa_foto_ekle.tpl");
		
		break;	
	/**
	 * sayfa detaylar� belirtilir
	 */
	case 4:
	
			if($_POST["btnSayfaEkleGuncelle"]){
				
				$hata="";
				if(strlen($_REQUEST["SAYFA_ADI"])<3)
					$hata.="<br><br>Sayfa Ad�n� bo� b�rakmay�n�z!";
				
				if(strlen($_REQUEST["SAYFA_BASLIGI"])<3)
					$hata.="<br><br>Sayfa Ba�l���n� bo� b�rakmay�n�z!";
				
				if(strlen($_REQUEST["SAYFA_TASLAGI"])<3)
					$hata.="<br><br>Sayfa Tasla��n� bo� b�rakmay�n�z!";
					
				if(strlen($_REQUEST["SAYFA_LINKI"])<3)
					$hata.="<br><br>Sayfa Linkini bo� b�rakmay�n�z!";
				
			
				/*if($_REQUEST["kullanim_kosullari"]<>1)
					$hata.="<br>Kullan�m ko�ullar�n� kabul etmeniz gerekmektedir!";
				*/
				if(strlen($hata)>0){
					$sen->mesajUyari("Uyar�","L�tfen Dikkat".$hata);
				}else{	

						// link kutular� d�zenleme
						$lk_text=$_POST["AKTIF_LINK_KUTULARI"]?implode('_',$_POST["AKTIF_LINK_KUTULARI"]):'';				
						
						if(!$id){//yeni ekle				
							$data=array("SAYFA_ADI"=>$_POST["SAYFA_ADI"],
										"SAYFA_BASLIGI"=>$_POST["SAYFA_BASLIGI"],
										"SAYFA_LINKI"=>$_POST["SAYFA_LINKI"],
										"SAYFA_TASLAGI"=>$_POST["SAYFA_TASLAGI"],
										"SAYFA_IKONU"=>$_POST["SAYFA_IKONU"],
										"SAYFA_TARGET"=>$_POST["SAYFA_TARGET"],
										"MENUDE_GOSTER"=>$_POST["MENUDE_GOSTER"],
										"SAYFA_YERLESIMI"=>$_POST["SAYFA_YERLESIMI"],
										"SADECE_UYE"=>$_POST["SADECE_UYE"],
										"YORUM_ACIK"=>$_POST["YORUM_ACIK"],							
										"ARAMAYA_DAHIL"=>$_POST["ARAMAYA_DAHIL"],							
										"AKTIF_LINK_KUTULARI"=>$lk_text,							
										"ADMIN_ID"=>$login->admin_id);
							if($sen->veriEkle($db,tSAYFALAR,$data)){
								$sen->mesajBasarili("Sayfa Ekle/G�ncelleme","Yeni sayfa eklenmi�tir..");
							}else{
								$sen->mesajUyari("Hata","HATA OLU�TU! <br><br> L�tfen tekrar deneyiniz..");
							}
						}else{//g�ncelleme
							
							$eski_sayfa_adi=$sen->veriAlTekBoyut($db,tSAYFALAR,array("SAYFA_ADI"),array("ID"=>$id),null,0);
							
							$data=array("uSAYFA_ADI"=>$_POST["SAYFA_ADI"],
										"uSAYFA_BASLIGI"=>$_POST["SAYFA_BASLIGI"],
										"uSAYFA_LINKI"=>$_POST["SAYFA_LINKI"],
										"uSAYFA_TASLAGI"=>$_POST["SAYFA_TASLAGI"],
										"uSAYFA_IKONU"=>$_POST["SAYFA_IKONU"],
										"uSAYFA_TARGET"=>$_POST["SAYFA_TARGET"],
										"uMENUDE_GOSTER"=>$_POST["MENUDE_GOSTER"],
										"uSAYFA_YERLESIMI"=>$_POST["SAYFA_YERLESIMI"],
										"uSADECE_UYE"=>$_POST["SADECE_UYE"],
										"uYORUM_ACIK"=>$_POST["YORUM_ACIK"],							
										"uARAMAYA_DAHIL"=>$_POST["ARAMAYA_DAHIL"],							
										"uAKTIF_LINK_KUTULARI"=>$lk_text,							
										"uADMIN_ID"=>$login->admin_id,
										"wID"=>$id);

							if($sen->veriGuncelle($db,tSAYFALAR,$data,0)){
								//alt ba�l�klar i�inde g�ncelleme yap�lacak..								
								if($eski_sayfa_adi[SAYFA_ADI]<>$_POST["SAYFA_ADI"]){
									$veri2=array(
													"uSAYFA_ADI"=>$_POST["SAYFA_ADI"],
													"wSAYFA_ADI"=>$eski_sayfa_adi[SAYFA_ADI]
												);
								
									$sen->veriGuncelle($db,tSAYFALAR_ICERIK,$veri2,0);
								}
								$sen->mesajBasarili("Sayfa Ekle/G�ncelleme","Sayfa g�ncellenmi�tir..");
							}else{
								$sen->mesajUyari("Hata","HATA OLU�TU! <br><br> L�tfen tekrar deneyiniz..");
							}				
						}
						//echo "<script>alert('Bilgiler Kaydedilmi�tir..');</script>";
						//$sen->yonlendir("sayfalar.php");
					}
				}

				$arr_yn=array(1=>"EVET",0=>"HAYIR");
				$arr_st=array("_SELF"=>"_SELF","_BLANK"=>"_BLANK");
				
				$arr_lk_rows=$sen->veriAl($db,tLINK_KUTULARI,array("ID","KUTU_ADI"),array("DURUM"=>1),array("KUTU_ADI"),0);
				foreach($arr_lk_rows as $v){
					$arr_lk[$v[ID]]=$v[KUTU_ADI];
				}
				//$arr_lk=array(0=>"Link Kutusu1",1=>"Link Kutusu2",2=>"Link Kutusu3");
				
				//$icerik=$sayfa->getSayfaDetay($db,$id);
				$icerik=$sen->veriAl($db,tSAYFALAR,null,array("ID"=>$id));
				$icerik=$icerik[0];
				$sen->smarty->assign('sayfa_adi',$icerik["SAYFA_ADI"]);
				$sen->smarty->assign('sayfa_basligi',$icerik["SAYFA_BASLIGI"]);
				$sen->smarty->assign('sayfa_linki',$icerik["SAYFA_LINKI"]);
				$sen->smarty->assign('sayfa_taslagi',$icerik["SAYFA_TASLAGI"]);
				$sen->smarty->assign('sayfa_ikonu',$icerik["SAYFA_IKONU"]);
				$sen->smarty->assign('menude_goster',$icerik["MENUDE_GOSTER"]);
				$sen->smarty->assign('sayfa_target',$icerik["SAYFA_TARGET"]);
				$sen->smarty->assign('sayfa_yerlesimi',$icerik["SAYFA_YERLESIMI"]);				
				$sen->smarty->assign('st',$arr_st);
				$sen->smarty->assign('yn',$arr_yn);
				$sen->smarty->assign('sadece_uye',$icerik["SADECE_UYE"]);
				$sen->smarty->assign('yorum_acik',$icerik["YORUM_ACIK"]);
				$sen->smarty->assign('aramaya_dahil',$icerik["ARAMAYA_DAHIL"]);
				
				$sen->smarty->assign('lk',$arr_lk);
				$selected_lk=explode('_',$icerik["AKTIF_LINK_KUTULARI"]);
				//pre($selected_lk);
				$sen->smarty->assign('aktif_link_kutulari',$selected_lk);
								
				$sen->sYaz("admin_sayfa_ekle_guncelle.tpl");
			
		break;		

	/**
	 * Foto�raf y�kleme alan�..
	 */
	case 5:
		
		if($_REQUEST["dosyaKaydet"]){
			if($id){				
				/**
				 * dosya eki
				 */
			if(isset($_FILES["DOSYA1"]) || isset($_FILES["DOSYA2"]) || isset($_FILES["DOSYA3"]) || isset($_FILES["DOSYA4"])){
					if($_FILES["DOSYA1"][error]===0 && !yukleDosya($db,$sen,$_FILES["DOSYA1"],YUKLENEN_DOSYA_EKLERI.DOSYA_KAYIT_ADRES,"FILE",$id,$_POST["KISA_ACIKLAMA1"])){
						$sen->mesajUyari("Dosya Y�kleme",'Dosya Y�klenemedi l�tfen tekrar deneyiniz..');
					}elseif ($_FILES["DOSYA2"][error]===0 && !yukleDosya($db,$sen,$_FILES["DOSYA2"],YUKLENEN_DOSYA_EKLERI.DOSYA_KAYIT_ADRES,"FILE",$id,$_POST["KISA_ACIKLAMA2"])) {
						$sen->mesajUyari("Dosya Y�kleme",'Dosya Y�klenemedi l�tfen tekrar deneyiniz..');
					}elseif ($_FILES["DOSYA3"][error]===0 && !yukleDosya($db,$sen,$_FILES["DOSYA3"],YUKLENEN_DOSYA_EKLERI.DOSYA_KAYIT_ADRES,"FILE",$id,$_POST["KISA_ACIKLAMA3"])) {
						$sen->mesajUyari("Dosya Y�kleme",'Dosya Y�klenemedi l�tfen tekrar deneyiniz..');
					}elseif ($_FILES["DOSYA4"][error]===0 && !yukleDosya($db,$sen,$_FILES["DOSYA4"],YUKLENEN_DOSYA_EKLERI.DOSYA_KAYIT_ADRES,"FILE",$id,$_POST["KISA_ACIKLAMA4"])) {
						$sen->mesajUyari("Dosya Y�kleme",'Dosya Y�klenemedi l�tfen tekrar deneyiniz..');
					}else {
						$sen->mesajBasarili("Dosya Y�kleme","Ba�ar�l�..");		
					}
				}				
				
			}	
			else{
				$sen->mesajUyari("Dosya Y�kleme","Hata olu�tu! L�tfen tekra deneyiniz..");
			}					
		}

		//bu sayfadaki fotolar
		$dosya=$sayfa->getFotolar($db,$id,"FILE");
		$sen->smarty->assign('dosyalistesi',$dosya);
		//$sen->smarty->assign('iceriklistesi',$liste);
					
		$sen->sYaz("admin_sayfa_dosya_ekle.tpl");
		
		break;			

	case 6:
		$detay=$sen->selectData($db,tDOSYALAR,array("ID"=>$_GET["id"]),null,null,0);
		header('Content-type:'.$detay[0][DOSYA_TIPI]);
		// It will be called downloaded.pdf
		header('Content-Disposition: attachment; filename="'.$detay[0][AD].'"');
		readfile(YUKLENEN_DOSYA_EKLERI.DOSYA_KAYIT_ADRES."/".$detay[0]["DOSYA_URL"]);
		
		break;	
		
		
	default://login ekran� veya y�netim ekran�

		/**
		 * menu s�ra kayd�
		 */
		$btnSira=$_POST["btnMenuSira"];
		if($btnSira){
			$siraArray=array();
			foreach($_POST as $k=>$v){
				if(substr($k,0,5)=='sira_'){
					$siraArray[]=array( "ADMIN_ID"=>$login->admin_id,
										"SIRA"=>$v?$v:0,
										"ID"=>substr($k,5));								
				}
			}
			if($siraArray && !$sayfa->menuSiraKaydet($db,$siraArray)){
				pre("HATA OLU�TU!");
			}			
		}

		/**
		 * icerikleri aktif yada pasif etmek i�in
		 */
		$durum_id=$sen->alGet('durum_id');
		$durum=$sen->alGet('durum');
		if($durum){
			$durum=$durum==1?"0":"1";
			$sonuc=$sen->veriGuncelle($db,tSAYFALAR,array('uDURUM'=>$durum,'wSAYFA_ADI'=>$durum_id),0);
			if($sonuc) $sen->mesajBasarili("Durum G�ncellendi","Se�mi� oldu�unuz sayfan�n durumu de�i�tirilmi�tir!");
			else $sen->mesajUyari("Hata Olu�tu","Se�mi� oldu�unun sayfan�n durumu g�ncellenemedi<br>L�tfen tekrar deneyiniz!");
		}

		if(isset($_REQUEST["ust_menude_goster"])){
			$durum=$sen->alGet("ust_menude_goster")==1?"0":"1";
			$sonuc=$sen->veriGuncelle($db,tSAYFALAR,array('uUST_MENUDE_GOSTER'=>$durum,'wSAYFA_ADI'=>$durum_id),0);
			if($sonuc) $sen->mesajBasarili("Durum G�ncellendi","Se�mi� oldu�unuz sayfan�n durumu de�i�tirilmi�tir!");
			else $sen->mesajUyari("Hata Olu�tu","Se�mi� oldu�unun sayfan�n durumu g�ncellenemedi<br>L�tfen tekrar deneyiniz!");
		}
		
		if(isset($_REQUEST["alt_menude_goster"])){
			$durum=$sen->alGet("alt_menude_goster")==1?"0":"1";
			$sonuc=$sen->veriGuncelle($db,tSAYFALAR,array('uALT_MENUDE_GOSTER'=>$durum,'wSAYFA_ADI'=>$durum_id),0);
			if($sonuc) $sen->mesajBasarili("Durum G�ncellendi","Se�mi� oldu�unuz sayfan�n durumu de�i�tirilmi�tir!");
			else $sen->mesajUyari("Hata Olu�tu","Se�mi� oldu�unun sayfan�n durumu g�ncellenemedi<br>L�tfen tekrar deneyiniz!");
		}
		
		$liste=$sayfa->getSayfaListesi($db);

		$sen->smarty->assign('sayfalistesi',$liste);


		$sen->sYaz("admin_sayfalarliste.tpl");
		break;		
}

?>