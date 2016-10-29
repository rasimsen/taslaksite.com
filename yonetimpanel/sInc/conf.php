<?php
class sayfalar extends sAdminSayfa{

	function getListe($db){
		
		$sql= "select ID,DEGISKEN,DEGER,";	
		$sql .= "if(DURUM='1','AKTIF','PASIF') DURUM, ACIKLAMA from ".tCONF;

		return $db->GetAll($sql);
	}


	function getIcerik($db,$icerik_id){
	
		$sql="select BASLIK,ICERIK from ".tSAYFALAR_ICERIK." where id=".$db->Param("icerik_id");
		
		return $db->GetRow($sql,array("icerik_id"=>$icerik_id));
	
	}
	
	function icerikGuncelle($db,$icerik_id){
	
		$array[DEGISME_TARIHI]=date("Y-m-d H:i:s");
		$array[ICERIK_ID]=$icerik_id;
		
		$sql="update ".tILETISIM." set 
							DEGISME_TARIHI=".$db->Param("DEGISME_TARIHI").",
							MESAJ_DURUMU='OKUNDU'
				where id=".$db->Param("ICERIK_ID");

		return $db->Execute($sql,$array);
	
	}

	function icerikSil($db,$sil_id){
		$sql="delete from ".tILETISIM." where ID=".$db->Param("ID");

		return $db->Execute($sql,array("ID"=>$sil_id));
	}

	function sayfaDurum($db,$array){
		$sql="update ".tILETISIM." set DURUM=".$db->Param("DURUM")." where SAYFA_ADI=".$db->Param("DURUM_ID");

		return $db->Execute($sql,$array);
	}

}

?>