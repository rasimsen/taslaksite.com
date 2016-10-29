<?php
require_once("sInc/sayfa_uygulama.php");
$sen=new TaslakSayfa();


if(isset($_REQUEST["ikCVgonder"])){

	$ad=addslashes(trim($_REQUEST["ad"]));
	$tel=addslashes($_REQUEST["tel"]);
	$email=addslashes($_REQUEST["email"]);
	$konu=addslashes($_REQUEST["konu"]);
	$mesaj=addslashes($_REQUEST["mesaj"]);
	$procesOK="";

	if(strlen($tel)>0 && strlen($tel)<7) $procesOK.='<font color="red">Telefon nuramasýný kontrol edin!</font><br>';	
	
	if(strlen($ad)==0) $procesOK.='<font color="red">Lütfen Adýnýzý girin</font><br>';	
	if(strlen($konu)==0) $procesOK.='<font color="red">Lütfen mesajýnýz konusunu girin</font><br>';	
	if(strpos($email,"@")===false || strpos($email,".")===false) $procesOK .='<font color="red">Lütfen email adresinizi kontrol ediniz</font><br>';	

	
	//mesaj at
	$fl=$_FILES["ik_cv"];
	if(strlen($procesOK)==0 && isset($fl)){					
		require_once("sInc/upload.php");

		$file_upload=new upload();
		$fl_upload=$file_upload->file_upload($fl,YUKLENEN_DOSYA_EKLERI.IK_CV_SAVE_PATH,"CV_");//default TR - thumb ve resized

		if(is_array($fl_upload) && $fl_upload["HATA"]){
			$procesOK .=$fl_upload["HATA"]."<br>";
		}					
	}				

	//db ye kaydet ve mail at	
	if(strlen($procesOK)==0){

		$mesaj_veri=array(
						"MESAJ_TIPI"=>"CV",
						"GONDEREN_ADI"=>$ad,
						"TEL"=>$tel,
						"EMAIL"=>$email,
						"KONU"=>$konu,
						"MESAJ"=>$mesaj,
						"DOSYA_EKI"=>(isset($fl) && !is_array($fl_upload)?1:0)
					);
		$idx=$sen->veriEkle($db,tILETISIM,$mesaj_veri,0);	
		if(!is_array($fl_upload)){
			$general=array( "REF_ID"=>$idx,
							"TIP"=>"FILE",
							"DOSYA_URL"=>$fl_upload,
							"DOSYA_TIPI"=>$fl["type"]
						   );
			$rs=$sen->veriEkle($db,tDOSYALAR,$general,0);
		}

		$From = SAHIP_EMAIL;
		$FromName = SAHIP_ADI;
		$To=SAHIP_EMAIL;
		$ToName = SAHIP_ADI;
		
		$Subject = "BÝLGÝ ÝSTEÐÝ:".$konu;
		
		$mailicerik="";
		$mailicerik.="<br>Gönderen:".$ad;
		$mailicerik.="<br>Tel:".$tel;
		$mailicerik.="<br>Email:".$email;
		$mailicerik.="<br>Konu:".$konu;
		$mailicerik.="<br><p>Konu:".$mesaj."</p>";
		
		$bilgi  = SAHIP_ADI." iletiþim formundan göndermiþ olduðunuz mesaj alýnmýþtýr. Mesajýnýz müþteri hizmetlerimiz tarafýnda incelenip en kýsa zamanda size dönülecektir.'";
		$bilgi .='<br><br>Göndermiþ olduðunuz Mesajýn Ýçeriði:<br><br><p style="font-size:11px">'.$mailicerik."<p>";
		$bilgi .="<br><br>";
		$bilgi .="<hr><u>Ýrtibat Bilgilerimiz:</u>";
		$bilgi .="<br>";
		$bilgi .="<br>".SAHIP_ADI; 
		$bilgi .="<br>"."Adres: ".SAHIP_ADRES; 
		$bilgi .="<br>"."Email: ".SAHIP_EMAIL; 
		$bilgi .="<br>"."Tel: ".SAHIP_TEL1;
		$bilgi .="<br>"."Fax: ".SAHIP_FAX;  
		$bilgi .="<br>"."Gsm: ".SAHIP_CEP;  
		
		$sen->mesajBasarili("CV gönderme","Baþarýlý..");


		
		phpmailer($From,$FromName,$To,$ToName,$Subject,SAHIP_ADI." sitesinden bilgi mesajý gönderildi.",$mailicerik,'','');

		phpmailer($From,$FromName,$email,$ad,$Subject,SAHIP_ADI." tarafýndan mesajýnýz alýnmýþtýr.",$bilgi,'','');
	}else{
		$sen->mesajUyari("Lütfen Dikkat!",$procesOK);	
		
		$sen->smarty->assign('ad',$ad);
		$sen->smarty->assign('tel',$tel);
		$sen->smarty->assign('email',$email);
		$sen->smarty->assign('konu',$konu);
		$sen->smarty->assign('mesaj',$mesaj);
				
				
	}
	
}


$sayfa_bilgi=$sen->Hazirla($db,$_GET['id']);
$sen->smarty->assign('sayfa_linki',DEF_SAYFA_LINKI);
$sen->smarty->assign('sayfa_icerik',$sayfa_bilgi["ICERIK"]);
$sen->smarty->assign('alt_basliklar',$sayfa_bilgi["ALT_BASLIKLAR"]);

$sen->sYaz(DEF_SAYFA_TASLAGI);

?>