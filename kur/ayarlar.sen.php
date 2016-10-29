<?php

	$host="{TASLAKSITE_DB_HOST}";
	$kullanici="{TASLAKSITE_DB_KULLANICI_ADI}";
	$sifre="{TASLAKSITE_DB_SIFRE}";
	$veritabani="{TASLAKSITE_DB_VERITABANI}";

	// tablo isimlerinin önüne eklenecek olan öntaký (prefix)
	$ontaki="{TASLAKSITE_DB_TABLO_ONEK}";
	
	define('DEBUG', false);
	define('WINDOWS', (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? 1 : 0);

	define('sAYIRAC',WINDOWS?'\\':'/');
	
	define("sKOK_DIZIN","{TASLAKSITE_KOK_DIZIN}");
	define("sURL","{TASLAKSITE_URL}");
	define("sGecici",sKOK_DIZIN."sSablonlar".sAYIRAC);
	

	$smarty_kok=sKOK_DIZIN."sAraclar".sAYIRAC."smarty".sAYIRAC;

	//adodb
	define("ADODB",sKOK_DIZIN.'sAraclar'.sAYIRAC.'adodb'.sAYIRAC.'adodb.inc.php');

	//smarty
	define("SMARTY",sKOK_DIZIN.'sAraclar'.sAYIRAC.'smarty'.sAYIRAC.'Smarty.class.php');

	//phpmail
	define("PHPMAIL",sKOK_DIZIN."sAraclar".sAYIRAC."phpmailer".sAYIRAC."class.phpmailer.php");


	define('YUKLENEN_DOSYA_EKLERI',sKOK_DIZIN.'dosya'.sAYIRAC);
	define("TEMPLATES",sGecici.'templates');
	define("sSABLON_URL",sURL."sSablonlar/templates/");
	define("TEMPLATES_C",sGecici.'templates_c');
	define("CONFIGS",sGecici.'configs');
	define("CACHE",sGecici.'cache');


	require(ADODB);
	require(SMARTY);
	require(PHPMAIL);

	//tablo tanýmlarý
	define("tFOTOLAR",$ontaki."dosyalar");
	define("tDOSYALAR",$ontaki."dosyalar");
	define("tILETISIM",$ontaki."iletisim");
	define("tKULLANICILAR",$ontaki."kullanicilar");
	define("tREFERANSLAR",$ontaki."referanslar");
	define("tREFERANSLAR_DETAY",$ontaki."referanslar_detay");
	define("tSAYFALAR",$ontaki."sayfalar");
	define("tSAYFALAR_ICERIK",$ontaki."sayfalar_icerik");
	define("tCONF",$ontaki."conf");
	define("tEBULTEN",$ontaki."ebulten");
	define("tEBULTEN_EMAIL",$ontaki."ebulten_email");
	define("tLINK_KUTULARI",$ontaki."link_kutulari");
	define("tLINK_KUTULARI_ICERIK",$ontaki."link_kutulari_icerik");
	define("tYORUM",$ontaki."yorum");
	define("tKATEGORI",$ontaki."kategori");
	define("tKATEGORI_ICERIK",$ontaki."kategori_icerik");
	define("tKATEGORI_ETIKETLERI",$ontaki."kategori_etiketler");
	define("tPARAM",$ontaki."param");
	define("tPARAM_ICERIK",$ontaki."param_icerik");
	

	/**
	 * mesaj gösterimleri
	 */
	$mesajTaslakSite;

	//email tanýmlarý
	function phpmailer($From=SAHIP_EMAIL,$FromName=SAHIP_ADI,$To,$ToName,$Subject,$Text,$Html,$AttmFiles,$bcc){

		$mail = new PHPMailer();
		$mail->SetLanguage("tr", "sAraclar/phpmailer/language/");

		//$mail->IsSMTP();                                      // set mailer to use SMTP
		$mail->IsMail();
		$mail->Host = MAIL_SMTP;//"mail.taslaksite.com";  // specify main and backup server
		$mail->SMTPAuth = false;     // turn on SMTP authentication
		$mail->Username = "Taslaksite";  // SMTP username
		$mail->Password = "secret"; // SMTP password

		$mail->From = $From;
		$mail->FromName = $FromName;
		$mail->AddAddress($To, $ToName);
		//$mail->AddAddress("ellen@example.com");                  // name is optional
		$mail->AddReplyTo($From, $FromName);

		$mail->WordWrap = 50;                                 // set word wrap to 50 characters
		//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
		//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
		$mail->IsHTML(true);                                  // set email format to HTML

		$mail->Subject = $Subject;
		$mail->Body    = $Html;
		$mail->AltBody = $Subject;//"Bu emaili almada sorun yaþýyorsunuz. Lütfen taslaksite.com ile irtibata geçiniz!";

		return $mail->Send();

	}	
	
?>