<?php
class sayfalar extends sAdminSayfa{

	function getSayfaListesi($db,$id=null){
		
		$sql= "select ID,GONDEREN_ADI,KONU,EMAIL,TEL,OLUS_TARIHI," ;
		if($id)
				$sql .=" MESAJ,";	
		$sql .= "MESAJ_DURUMU,if(DURUM='1','AKTIF','PASIF')DURUM,DOSYA_EKI,MESAJ_TIPI from ".tILETISIM;
		if($id)
				$sql .=" where ID=".$db->Param("ID");			
		$sql .=" order by OLUS_TARIHI desc";

		if($id){
			return $db->GetAll($sql,array("ID"=>$id));
		}	
		else	
			return $db->GetAll($sql);
	}

	function getSayfaIcerik($db,$sayfa_adi){
		
		$sql="select ID,BASLIK,DEGISME_TARIHI,SIRA,if(DURUM='1','AKTIF','PASIF') DURUM from ".tSAYFALAR_ICERIK." where sayfa_adi=".$db->Param("sayfa_adi");
		
		return $db->GetAll($sql,array("sayfa_adi"=>$sayfa_adi));
	}

	function icerikKaydet($db,$array){
		$array[OLUS_TARIHI]=null;
		$array[DEGISME_TARIHI]=null;
		$array[DURUM]='1';
		
		$sql="insert into ".tSAYFALAR_ICERIK." set 
							SAYFA_ADI=".$db->Param("SAYFA_ADI").",
							BASLIK=".$db->Param("BASLIK").",
							ICERIK=".$db->Param("ICERIK").",
							ADMIN_ID=".$db->Param("ADMIN_ID").",
							OLUS_TARIHI=".$db->Param("OLUS_TARIHI").",
							DEGISME_TARIHI=".$db->Param("DEGISME_TARIHI").",
							DURUM=".$db->Param("DURUM")."
							";
		
		return $db->Execute($sql,$array);
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