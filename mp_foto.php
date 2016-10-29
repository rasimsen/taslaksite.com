<?php

require_once("sInc/uygulama.php");
/**
 * sayfa içerik
 */
require_once("sInc/sayfalar_icerik.php");


//smarty ayarlarýný yap
$sen=new sSayfa();

$sayfa=new Icerik();
$foto_id=$_REQUEST["foto_id"];
$iceriklistesi=$sayfa->getFotoDetail($db,$foto_id);

//pre($iceriklistesi);

//$haberlistesi=$sayfa->getIcerik($db,"HABERLER");
//$ref=$sayfa->getFotolar($db,34,"SAYFA");
//pre($iceriklistesi);

$sen->smarty->assign('foto_id',$iceriklistesi["FOTO"]);
//$sen->smarty->assign('haberlistesi',$haberlistesi);
//$sen->smarty->assign('fotolistesi',$ref);


$sen->sYaz("makinaparkimiz_foto.tpl");

?>