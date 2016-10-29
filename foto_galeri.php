<?php

require_once("sInc/uygulama.php");
/**
 * sayfa içerik
 */
require_once("sInc/sayfalar_icerik.php");


//smarty ayarlarýný yap
$sen=new sSayfa();

$sayfa=new Icerik();
$iceriklistesi=$sayfa->getIcerik($db,"MAKINA PARKIMIZ");
//$haberlistesi=$sayfa->getIcerik($db,"HABERLER");
//$ref=$sayfa->getFotolar($db,34,"SAYFA");
//pre($iceriklistesi);
$hAnim=$sayfa->getHAnim($db);
$sen->smarty->assign('animlist',$hAnim);

$sen->smarty->assign('page',1);
$sen->smarty->assign('reflistesi',$iceriklistesi);
//$sen->smarty->assign('haberlistesi',$haberlistesi);
//$sen->smarty->assign('fotolistesi',$ref);


$sen->sYaz("makinaparkimiz.tpl");

//ekrana yaz

?>