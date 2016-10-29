<?php

/**
 * Arama sayfas� hemde get ile hemde post ile g�nderilen sonuclara g�re �al��acak �ekilde olacakt�r.
 * 
 * �rne�in arama.php?arama_text=taslaksite �eklindeki bir arama da �al��acak �ekilde olmal�
 */

require_once("sInc/sayfa_uygulama.php");
require_once("sInc/arama.php");
$sen=new TaslakSayfa();

$sayfa_bilgi=$sen->Hazirla($db,$_GET['id']);
$sen->smarty->assign('sayfa_linki',DEF_SAYFA_LINKI);
$sen->smarty->assign('sayfa_icerik',$sayfa_bilgi["ICERIK"]);
$sen->smarty->assign('alt_basliklar',$sayfa_bilgi["ALT_BASLIKLAR"]);

$arama=new Arama($db);
$arama_text=trim($sen->alRequest("arama_text"));
$arama_turu=trim($sen->alRequest("arama_turu"));
$sayfa=trim($sen->alRequest("sayfa"));
$sayfalar=$arama->alAramaSayfalar($db);

$sen->smarty->assign('arama_text',$arama_text);
$sen->smarty->assign('sayfa_adi',$sayfa);
$sen->smarty->assign('sayfalar',$sayfalar);

/**
 * $arama_text varsa sonu� sayfas�n� �al��t�r
 */
if($arama_text || $sayfa){
	$veri=$arama->aramaSonuc($db,$arama_text,$arama_turu,$sayfa);
	$sen->smarty->assign('arama_sonuclari',$veri);
}


$sen->sYaz(DEF_SAYFA_TASLAGI);


?>