<?php
class Ebulten extends sAdminSayfa{

	function getListe($db){
		
		$sql= "SELECT ID, BASLIK,";	
		$sql .= "if(GONDERIM_DURUM='1','GONDERILDI','GONDERILMEDI') GDURUM,";
		$sql .= "concat(GONDERIM_TARIHI,GONDERIM_SAATI) GONDERIM_ZAMANI,";
		$sql .= "if(DURUM='1','AKTIF','PASIF') DURUM from ".tEBULTEN;
		//pre($sql);
		return $db->GetAll($sql);
	}

	function getEbultenMailListe($db){
		
		$sql= "SELECT ID, EMAIL from ".tEBULTEN_EMAIL." where durum='1' and BGONDERIM_DURUM<>'1'";
		//pre($sql);
		return $db->GetAll($sql);
	}


	function getIcerik($db,$id){
	
		$sql="SELECT ID, BASLIK,HIZLI_BAKIS_ICERIK,ICERIK,GONDERIM_DURUM,GONDERIM_TARIHI,GONDERIM_SAATI,DURUM from ".tEBULTEN." where id=".$db->Param("id");
		
		return $db->GetRow($sql,array("id"=>$id));
	
	}
	
	/*function yoneticiSil($db,$sil_id){
		$sql="delete from ".tKULLANICILAR." where ID=".$db->Param("ID");

		return $db->Execute($sql,array("ID"=>$sil_id));
	}*/

	function sayfaDurum($db,$array){
		$sql="update ".tKULLANICILAR." set DURUM=".$db->Param("DURUM")." where SAYFA_ADI=".$db->Param("DURUM_ID");

		return $db->Execute($sql,$array);
	}

}

?>