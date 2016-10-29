<?php
require_once("sInc/sayfa_uygulama.php");
$sen=new TaslakSayfa();

$sayfa_bilgi=$sen->Hazirla($db,$_GET['id']);
$sen->smarty->assign('sayfa_linki',DEF_SAYFA_LINKI);
$sen->smarty->assign('sayfa_icerik',$sayfa_bilgi["ICERIK"]);
$sen->smarty->assign('alt_basliklar',$sayfa_bilgi["ALT_BASLIKLAR"]);

$sen->sYaz(DEF_SAYFA_TASLAGI);

?>