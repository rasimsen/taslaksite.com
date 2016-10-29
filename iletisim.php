<?php
require_once("sInc/sayfa_uygulama.php");
$sen=new TaslakSayfa();

$sayfa_bilgi=$sen->Hazirla($db,$_GET['id']);
$sen->smarty->assign('sayfa_linki',DEF_SAYFA_LINKI);
$sen->smarty->assign('sayfa_icerik',$sayfa_bilgi["ICERIK"]);
$sen->smarty->assign('alt_basliklar',$sayfa_bilgi["ALT_BASLIKLAR"]);

//mesaj g�nderimi
if(isset($_REQUEST["Submit"])){

	$ad=addslashes(trim($_REQUEST["ad"]));
	$tel=addslashes($_REQUEST["tel"]);
	$email=addslashes($_REQUEST["email"]);
	$konu=addslashes($_REQUEST["konu"]);
	$mesaj=addslashes($_REQUEST["mesaj"]);
	$procesOK="";

	if(strlen($ad)==0) $procesOK.='<h2><font color="red">L�tfen Ad�n�z� girin</font></h2>';	
	if(strlen($konu)==0) $procesOK.='<h2><font color="red">L�tfen mesaj�n�z konusunu girin</font></h2>';	
	if(strpos($email,"@")===false || strpos($email,".")===false) $procesOK .='<h2><font color="red">L�tfen email adresinizi kontrol ediniz</font></h2>';	

	//db ye kaydet ve mail at	
	if(strlen($processOK)==0){


		$mesaj_veri=array(
						"MESAJ_TIPI"=>"CV",
						"GONDEREN_ADI"=>$ad,
						"TEL"=>$tel,
						"EMAIL"=>$email,
						"KONU"=>$konu,
						"MESAJ"=>$mesaj
					);
		if($sen->veriEkle($db,tILETISIM,$mesaj_veri,0)) 
			$sen->mesajBasarili("Mesaj�n�z �letilmi�tir","Ba�ar�l�..");

		$From = SAHIP_EMAIL;
		$FromName = SAHIP_ADI;
		$To=SAHIP_EMAIL;
		$ToName = SAHIP_ADI;
		
		$Subject = "B�LG� �STE��:".$konu;
		
		$mailicerik="";
		$mailicerik.="<br>G�nderen:".$ad;
		$mailicerik.="<br>Tel:".$tel;
		$mailicerik.="<br>Email:".$email;
		$mailicerik.="<br>Konu:".$konu;
		$mailicerik.="<br><p>Konu:".$mesaj."</p>";
		
		$bilgi  = SAHIP_ADI." ileti�im formundan g�ndermi� oldu�unuz mesaj al�nm��t�r. Mesaj�n�z m��teri hizmetlerimiz taraf�nda incelenip en k�sa zamanda size d�n�lecektir.'";
		$bilgi .='<br><br>G�ndermi� oldu�unuz Mesaj�n ��eri�i:<br><br><p style="font-size:11px">'.$mailicerik."<p>";
		$bilgi .="<br><br>";
		$bilgi .="<hr><u>�rtibat Bilgilerimiz:</u>";
		$bilgi .="<br>";
		$bilgi .="<br>".SAHIP_ADI; 
		$bilgi .="<br>"."Adres: ".SAHIP_ADRES; 
		$bilgi .="<br>"."Email: ".SAHIP_EMAIL; 
		$bilgi .="<br>"."Tel: ".SAHIP_TEL1;
		$bilgi .="<br>"."Fax: ".SAHIP_FAX;  
		$bilgi .="<br>"."Gsm: ".SAHIP_CEP;  
		
		//mesaj at
		
		phpmailer($From,$FromName,$To,$ToName,$Subject,SAHIP_ADI." sitesinden bilgi mesaj� g�nderildi.",$mailicerik,'','');

		phpmailer($From,$FromName,$email,$ad,$Subject,SAHIP_ADI." taraf�ndan mesaj�n�z al�nm��t�r.",$bilgi,'','');
	}
	$sen->smarty->assign('procesOK',$procesOK);		
	
}

$sen->sYaz(DEF_SAYFA_TASLAGI);

?>
