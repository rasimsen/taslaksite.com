<?php
class sayfalar extends sAdminSayfa{

	function getListe($db){
		
		$sql= "SELECT ID, KULLANICI_ADI, AD, SOYAD, ADRES, TEL, EMAIL,";	
		$sql .= "if(DURUM='1','AKTIF','PASIF') DURUM from ".tKULLANICILAR;
		$sql .=" where TIP='YONETICI'";
		return $db->GetAll($sql);
	}


	/**
	 * üye ol
	 */
	function uyeOl($db,$data){
		$d=array("KULLANICI_ADI"=>"KULLANICI",
				 "SIFRE"=>$data["SIFRE"],
				 "EMAIL"=>$data["EMAIL"],
				 "AD"=>$data["AD"],
				 "SOYAD"=>$data["SOYAD"]);
		$sql="insert into ".tKULLANICILAR." set
		        KULLANICI_ADI=".$db->Param("KULLANICI_ADI").",
		        SIFRE=".$db->Param("SIFRE").",
		        EMAIL=".$db->Param("EMAIL").",
		        AD=".$db->Param("AD").",
		        SOYAD=".$db->Param("SOYAD").",
		        TIP='KULLANICI'";
		pre($sql);pre($d);
		return $db->Execute($sql,$d);        
	} 
	
	/**
	 * üye ol
	 */
	function uyeKontrol($db,$data){
		$sql="select * from ".tKULLANICILAR." where EMAIL=".$db->Param("EMAIL");		
		//pre($sql);pre($data);
		return $db->GetRow($sql,array("EMAIL"=>$data));
	} 	




	function getIcerik($db,$id){
	
		$sql="SELECT ID, KULLANICI_ADI, concat(AD,' ', SOYAD) AD_SOYAD, ADRES, TEL, EMAIL from ".tKULLANICILAR." where id=".$db->Param("id");
		
		return $db->GetRow($sql,array("id"=>$id));
	
	}
	
	function yoneticiSil($db,$sil_id){
		$sql="delete from ".tKULLANICILAR." where ID=".$db->Param("ID");

		return $db->Execute($sql,array("ID"=>$sil_id));
	}

	function sayfaDurum($db,$array){
		$sql="update ".tKULLANICILAR." set DURUM=".$db->Param("DURUM")." where SAYFA_ADI=".$db->Param("DURUM_ID");

		return $db->Execute($sql,$array);
	}

}

?>