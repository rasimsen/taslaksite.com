<?php
//admin
require_once("sInc/admin_uygulama.php");

$s=$_REQUEST['s'];

switch($s){

	case 1:
		break;
		
	default://login ekran� veya y�netim ekran�

		//login kontrol� yap
		$sen->sYaz("admin_index.tpl");
		break;		
}

?>