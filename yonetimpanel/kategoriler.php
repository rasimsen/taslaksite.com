<?php
//admin
require_once("sInc/admin_uygulama.php");

$s=$_REQUEST['s'];

require_once("sInc/kategoriler.php");
require_once("../sInc/upload.php");

$id=$_GET["id"];
$parent=$_GET["parent"];

$sen->smarty->assign('id',$id);
$sen->smarty->assign('parent',$parent);

$ana_tablo=tKATEGORI;
$detay_tablo=tKATEGORI_ICERIK;


$sayfa=new Kategoriler();



/**
 * dosya yükleme
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
		 * foto yükleme ise
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
							"FOTO"=>$fl_upload[0]["NAME"],	
							'ADMIN_ID'=>$login->admin_id							
						 );
			return $sen->veriEkle($db,tDOSYALAR,$general,0);
		}
	
}

switch($s){
/*
	case 1://baþlýðý önizle..
		

		break;
	*/
	/**
	 * Baþlýk Detayý girme güncelleme alanýdýr..
	 */
	case 2:
		
		break;

	/**
	 * Fotoðraf yükleme alaný..
	 */
	case 3:
		
		break;	
	/**
	 * sayfa detaylarý belirtilir
	 */
	case 4:
			
		break;		

	/**
	 * Fotoðraf yükleme alaný..
	 */
	case 5:

		break;			

	//dosyalarý kaydetme alaný
	case 6:
		
		break;	
		
		
	default:

		$secili_kategori = $sen->alGet('kategori_id');
//pre($_POST);die;		
		/**
		 * menu sýra kaydý
		 */
		$btnSira=$_POST["btnMenuSira"];
		if($btnSira){
			$siraArray=array();
			foreach($_POST as $k=>$v){
				if(substr($k,0,5)=='sira_'){
					$siraArray[]=array( "uADMIN_ID"=>$login->admin_id,
										"uSIRA"=>$v?$v:0,
										"wID"=>substr($k,5));								
				}
			}
			if($siraArray && !$sayfa->veriGuncelle($db, $ana_tablo, $siraArray)){
				pre("HATA OLUÞTU!");
			}			
		}
		
		if($sen->alGet('islem')=='baslik'){
				/**
				 * icerik sil
				 */	
			    if($_GET['sil_id']){
								$data=array("wID"=>$_GET['sil_id']);
								
								if($sen->veriSil($db,$detay_tablo,$data)){
									$sen->mesajBasarili("Kayýt Silme","Kayýt silinmiþtir..");
								}else{
									$sen->mesajUyari("Hata","HATA OLUÞTU! <br><br> Lütfen tekrar deneyiniz..");
								}					    	
			    }
				
			    /**
			     * kayýt aktif / pasif etme
			     */
			    if($_GET['durum_id']){
								$data=array("uDURUM"=>($_GET["durum"]==1?'0':'1'),
											"wID"=>$_GET['durum_id']);
								
								if($sen->veriGuncelle($db,$detay_tablo,$data,0)){
									$sen->mesajBasarili("Kayýt Durumu","Kayýt durumu güncellenmiþtir..");
								}else{
									$sen->mesajUyari("Hata","HATA OLUÞTU! <br><br> Lütfen tekrar deneyiniz..");
								}					    	
			    }
		}elseif($sen->alGet('islem')=='kategori'){
			
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
								$data=array("uDURUM"=>($_GET["durum"]==1?'0':'1'),
											"wID"=>$_GET['durum_id']);
								
								if($sen->veriGuncelle($db,$ana_tablo,$data,0)){
									$sen->mesajBasarili("Kayýt Durumu","Kayýt durumu güncellenmiþtir..");
								}else{
									$sen->mesajUyari("Hata","HATA OLUÞTU! <br><br> Lütfen tekrar deneyiniz..");
								}					    	
			    }
			
			
		}
		
		/**
		 * yeni kategori ekle
		 */
		if($sen->alPost("btnEkleGuncelle")){
			$c=$sen->veriSay($db,$ana_tablo,array("KATEGORI_ADI"=>$sen->alPost("KATEGORI_ADI")));
			if(!$c[0][COUNT]){//kategori daha önceden açýlmýþmý??
				$sen->veriEkle($db,$ana_tablo,array("KATEGORI_ADI"=>$sen->alPost("KATEGORI_ADI"),"PARENT"=>$sen->alPost("kategori")),0);
			}else{
				$sen->mesajUyari("Hata","Bu kategori daha önce açýlmýþ!!");			
			}
		}
		
		/**
		 * yeni baþlýk ekle
		 */
		if($sen->alPost("kategoriBaslikKaydet")){
			if(strlen($sen->alPost('BASLIK'))>2){

				
				/**
				 * thumbnail i yükle
				 */
				$img=$_FILES["THUMBNAIL"];
				if(isset($img)){					
					$image_upload=new upload();
					$thumb=$image_upload->photo_upload($img,YUKLENEN_DOSYA_EKLERI.FOTO_KAYIT_ADRES);//default TR - thumb ve resized
				}				
				
				/**
				 * yeni baþlýðý ekle
				 */	
				$etiketler=trim($sen->alPost('ETIKETLER'));
				$baslik_id=$sen->alGet("id");
				if(!$baslik_id){				
					$veri=array(
										'BASLIK'=>$sen->alPost('BASLIK'),
										'KISA_OZET'=>$sen->alPost('KISA_OZET'),
										'ICERIK'=>$_POST['ICERIK'],
										'ETIKETLER'=>$etiketler,
										'PARENT'=>$sen->alPost('kategori'),
										'THUMBNAIL'=>$thumb[0][THUMBNAIL],
										'ADMIN_ID'=>$login->admin_id				
									);
					$sen->veriEkle($db,$detay_tablo,$veri,0);
				}else{
					$veri=array(
										'uBASLIK'=>$sen->alPost('BASLIK'),
										'uKISA_OZET'=>$sen->alPost('KISA_OZET'),
										'uICERIK'=>$_POST['ICERIK'],
										'uETIKETLER'=>$etiketler,
										'uPARENT'=>$sen->alPost('kategori'),
										'uADMIN_ID'=>$login->admin_id					
									);
						if($thumb[0][THUMBNAIL])
							$veri=array_merge($veri,array('uTHUMBNAIL'=>$thumb[0][THUMBNAIL]));

						$veri=array_merge($veri,array('wID'=>$baslik_id));
						$sen->veriGuncelle($db,$detay_tablo,$veri,0);
				}
				/**
				 * etiketleri ekle
				 */
				$etArr=$etiketler?explode(',',$etiketler):null;

				if(count($etArr)>0){
					for($i=0;$i<count($etArr);$i++){
						$c=$sen->veriSay($db,tKATEGORI_ETIKETLERI,array("ETIKET"=>trim($etArr[$i]),"DURUM"=>1));
						if($c[0][COUNT]==0){
							$veri=array(
											'ETIKET'=>trim($etArr[$i]),
											'ADMIN_ID'=>$login->admin_id							
										);
							$sen->veriEkle($db,tKATEGORI_ETIKETLERI,$veri,0);
						}else{
							$veri=array(
											'+uSAYAC'=>1,
											'uADMIN_ID'=>$login->admin_id,							
											'wETIKET'=>trim($etArr[$i]),
											'wDURUM'=>1
										);
							$sen->veriGuncelle($db,tKATEGORI_ETIKETLERI,$veri,0);
							
						}				
					}							
				}
				$sen->mesajBasarili("Ýþlem Kaydedildi","Veriler kaydedilmiþtir..");				
			}else{
				$sen->mesajUyari("Hata","Lütfen baþlýk belirtiniz(en az 3 karakter uzunluðunda!!");				
			}			
		}
				
		if($sen->alGet("id")){
			$veri=$sen->veriAlTekBoyut($db,$detay_tablo,array('ID','PARENT','BASLIK','THUMBNAIL','KISA_OZET','ICERIK','ETIKETLER','DEG_TARIHI','DEG_SAATI'),array("DURUM"=>1,"ID"=>$sen->alGet("id")));
			$secili_kategori = $veri[PARENT];
			$sen->smarty->assign('veri_detay',$veri);
		}
		$sen->smarty->assign('secili_kategori',$secili_kategori);			
		
		// kategori listesini doldur..
		//$kat_liste=$sen->veriAlTekBoyut($db,$ana_tablo,array('ID','KATEGORI_ADI','KATEGORI_IKONU','SADECE_UYE','YORUM_ACIK','SIRA','DURUM'),null,null,1);
		//$kat_liste=$sen->veriAlKeyValue($db,$ana_tablo,array('KEY'=>'ID','VALUE'=>'KATEGORI_ADI'),array("DURUM"=>1),array('SIRA','KATEGORI_ADI'),0);
		$kat_liste=$sayfa->alKategoriListe($db);
		$sen->smarty->assign('kat_liste',$kat_liste);
		
		$liste=$sayfa->alKategori($db);//$sen->veriAl($db,$ana_tablo,array('ID','KATEGORI_ADI','KATEGORI_IKONU','SADECE_UYE','YORUM_ACIK','SIRA','DURUM')/*,array("PARENT"=>0)*/);

		$sen->smarty->assign('veri',$liste);

		$p=$sen->alGet('p')?$sen->alGet('p'):0;
		$limit=array($p,LISTELENECEK_KAYIT_SAYISI);		
		$kategoriVerileri=($sen->alGet("s")==1?array("PARENT"=>$secili_kategori):null);
		
		$baslik_liste=$sen->veriAlLimitli($db,$detay_tablo,array('ID','PARENT','BASLIK','THUMBNAIL','KISA_OZET','DURUM','DEG_TARIHI','DEG_SAATI'),$kategoriVerileri,array("SIZ DESC"),$limit,0);

		$toplam_veri=$sen->veriSay($db,tKATEGORI_ICERIK,$kategoriVerileri,"","",array("COUNT"=>"*"),0,true);
		$sen->smarty->assign('baslik_veri',$baslik_liste);
		$sen->smarty->assign('taslak_navigator_genel',$sen->taslakNavigatorGenel($p,sayfaAdresiNav(),LISTELENECEK_KAYIT_SAYISI,$toplam_veri[0][COUNT]));
		
		$sen->sYaz("admin_kategori_liste.tpl");
		break;		
}

?>