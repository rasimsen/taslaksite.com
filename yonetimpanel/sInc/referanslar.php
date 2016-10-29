<?php
class referanslar extends sAdminSayfa{

	function getReferansListesi($db,$tekilAnahtar=null){
		
		$sql="select ID,REF_ADI,KISA_OZET,THUMBNAIL,if(DURUM='1','AKTIF','PASIF') DURUM,SIRA from ".tREFERANSLAR."";

		if($tekilAnahtar){
			$sql.=" where id=".$db->Param("tekilAnahtar");
			
			$rs=$db->Execute($sql,array("tekilAnahtar"=>$tekilAnahtar));
		}else{		
			$rs=$db->Execute($sql);
		}
		$i=0;
		while($s=$rs->FetchNextObject()){
			$ref[$i][ID]=$s->ID;
			$ref[$i][REF_ADI]=urldecode($s->REF_ADI);
			$ref[$i][KISA_OZET]=urldecode($s->KISA_OZET);
			$ref[$i][THUMBNAIL]=$s->THUMBNAIL;
			$ref[$i][DURUM]=$s->DURUM;
			$ref[$i][SIRA]=$s->SIRA;
			
			$i++;
		}
		return $ref;
	}

	function getReferansDetay($db,$tekilAnahtar){
		
		$sql="select ID, REF_ID,DETAY_OZET,DETAY,if(DURUM='1','AKTIF','PASIF') DURUM from ".tREFERANSLAR_DETAY." where ref_id=".$db->Param("tekilAnahtar");
		
		return $db->GetAll($sql,array("tekilAnahtar"=>$tekilAnahtar));
	}

	function getFotolar($db,$tekilAnahtar,$tip){
		
		$sql="select ID,THUMBNAIL,if(DURUM='1','AKTIF','PASIF') DURUM from ".tFOTOLAR." where ref_id=".$db->Param("tekilAnahtar")." and tip=".$db->Param("tip");
		
		return $db->GetAll($sql,array("tekilAnahtar"=>$tekilAnahtar,"tip"=>$tip));
	}


	function fotoKaydet($db,$general,$data){
		$general[OLUS_TARIHI]=null;
		$general[DEGISME_TARIHI]=null;
		$general[DURUM]='1';
		$c=count($data);
		for($i=0;$i<$c;$i++){
			$array_image[$i]=array(
									"REF_ID"=>$general[REF_ID],
									"TIP"=>$general[TIP],
									"THUMBNAIL"=>$data[$i][THUMBNAIL],
									"FOTO"=>$data[$i][NAME],
									"ADMIN_ID"=>$general[ADMIN_ID],
									"OLUS_TARIHI"=>$general[OLUS_TARIHI],
									"DEGISME_TARIHI"=>$general[DEGISME_TARIHI],
									"DURUM"=>$general[DURUM]
								);
		}
		
		$sql="insert into ".tFOTOLAR." set 
							REF_ID=".$db->Param("REF_ID").",
							TIP=".$db->Param("TIP").",
							THUMBNAIL=".$db->Param("THUMBNAIL").",
							FOTO=".$db->Param("FOTO").",
							ADMIN_ID=".$db->Param("ADMIN_ID").",
							OLUS_TARIHI=".$db->Param("OLUS_TARIHI").",
							DEGISME_TARIHI=".$db->Param("DEGISME_TARIHI").",
							DURUM=".$db->Param("DURUM")."
							";
		
		return $db->Execute($sql,$array_image);
	}
	
	function icerikKaydet($db,$array){
		$array[OLUS_TARIHI]=null;
		$array[DEGISME_TARIHI]=null;
		$array[DURUM]='1';
		
		$sql="insert into ".tREFERANSLAR_DETAY." set 
							REF_ID=".$db->Param("REF_ID").",
							DETAY_OZET=".$db->Param("DETAY_OZET").",
							DETAY=".$db->Param("DETAY").",
							ADMIN_ID=".$db->Param("ADMIN_ID").",
							OLUS_TARIHI=".$db->Param("OLUS_TARIHI").",
							DEGISME_TARIHI=".$db->Param("DEGISME_TARIHI").",
							DURUM=".$db->Param("DURUM")."
							";
		
		if($db->Execute($sql,$array)){
			$sql_InsertedID="select ID from ".tREFERANSLAR_DETAY." where REF_ID=".$db->Param("REF_ID")." order by ID desc limit 1";
			
			$rs=$db->GetRow($sql_InsertedID,array("REF_ID"=>$array[REF_ID]));
			return $rs[ID];
		}else return false;		
	}
	
	function getIcerik($db,$icerik_id){
	
		$sql="select DETAY_OZET,DETAY from ".tREFERANSLAR_DETAY." where id=".$db->Param("icerik_id");
		
		return $db->GetRow($sql,array("icerik_id"=>$icerik_id));
	
	}
	
	function icerikGuncelle($db,$array,$icerik_id){
	
		$array[OLUS_TARIHI]=null;
		$array[DEGISME_TARIHI]=null;
		$array[DURUM]='1';
		$array[ICERIK_ID]=$icerik_id;


		$sql="update ".tREFERANSLAR_DETAY." set 
							DETAY_OZET=".$db->Param("DETAY_OZET").",
							DETAY=".$db->Param("DETAY").",
							ADMIN_ID=".$db->Param("ADMIN_ID").",
							OLUS_TARIHI=".$db->Param("OLUS_TARIHI").",
							DEGISME_TARIHI=".$db->Param("DEGISME_TARIHI").",
							DURUM=".$db->Param("DURUM")."
				where id=".$db->Param("ICERIK_ID");

		return $db->Execute($sql,$array);
	
	}
	
	//güncelleme için içerik alma
	function getReferansIcerik($db,$icerik_id){
	
		$sql="select * from ".tREFERANSLAR." where id=".$db->Param("icerik_id");
		
		return $db->GetRow($sql,array("icerik_id"=>$icerik_id));
	
	}
		

	//referans ekleme
	function referansEkle($db,$array){
		$array[OLUS_TARIHI]=null;
		$array[DEGISME_TARIHI]=null;
		$array[DURUM]='1';
		
		$sql="insert into ".tREFERANSLAR." set 
							REF_ADI=".$db->Param("REF_ADI").",
							KISA_OZET=".$db->Param("KISA_OZET").",
							THUMBNAIL=".$db->Param("THUMBNAIL").",
							ADMIN_ID=".$db->Param("ADMIN_ID").",
							OLUS_TARIHI=".$db->Param("OLUS_TARIHI").",
							DEGISME_TARIHI=".$db->Param("DEGISME_TARIHI").",
							DURUM=".$db->Param("DURUM")."
							";
		
		return $db->Execute($sql,$array);
	}	
	
	//referans güncelle
	function referansGuncelle($db,$array,$icerik_id){
	
		$array[DEGISME_TARIHI]=null;
		$array[DURUM]='1';
		$array[ICERIK_ID]=$icerik_id;


		$sql="update ".tREFERANSLAR." set 
							REF_ADI=".$db->Param("REF_ADI").",
							KISA_OZET=".$db->Param("KISA_OZET").",
							THUMBNAIL=".$db->Param("THUMBNAIL").",
							ADMIN_ID=".$db->Param("ADMIN_ID").",
							DEGISME_TARIHI=".$db->Param("DEGISME_TARIHI").",
							DURUM=".$db->Param("DURUM")."
				where id=".$db->Param("ICERIK_ID");

		return $db->Execute($sql,$array);
	
	}	
	
	//referans silme
	function delReferans($db,$id){
		$sql="delete from ".tREFERANSLAR." where id=".$db->Param($id);
		
		return $db->Execute($sql,array("ID"=>$id));
	}

	//referans detay silme
	function delReferansDetay($db,$id){
		$sql="delete from ".tREFERANSLAR_DETAY." where id=".$db->Param($id);
		
		return $db->Execute($sql,array("ID"=>$id));		
	}
	
	/**
	 * icerik siler
	 */
	function icerikDetaySil($db,$sil_id){
		$sql="delete from ".tREFERANSLAR_DETAY." where ID=".$db->Param("ID");

		return $db->Execute($sql,array("ID"=>$sil_id));
	}
	
	/**
	 * Ýçeriði aktif/pasif yapar
	 */
	function icerikDetayDurum($db,$array){
		$sql="update ".tREFERANSLAR_DETAY." set DURUM=".$db->Param("DURUM")." where ID=".$db->Param("DURUM_ID");

		return $db->Execute($sql,$array);
	}

	/**
	 * referans - icerik siler
	 */
	function icerikSil($db,$sil_id){
		$sql="delete from ".tREFERANSLAR." where ID=".$db->Param("ID");

		return $db->Execute($sql,array("ID"=>$sil_id));
	}
	
	/**
	 * referans - Ýçeriði aktif/pasif yapar
	 */
	function icerikDurum($db,$array){
		$sql="update ".tREFERANSLAR." set DURUM=".$db->Param("DURUM")." where ID=".$db->Param("DURUM_ID");

		return $db->Execute($sql,$array);
	}
	
	/**
	 * foto - icerik siler
	 */
	function fotoDetaySil($db,$sil_id){
		$sql="delete from ".tFOTOLAR." where ID=".$db->Param("ID");

		return $db->Execute($sql,array("ID"=>$sil_id));
	}
	
	/**
	 * foto - Ýçeriði aktif/pasif yapar
	 */
	function fotoDetayDurum($db,$array){
		$sql="update ".tFOTOLAR." set DURUM=".$db->Param("DURUM")." where ID=".$db->Param("DURUM_ID");

		return $db->Execute($sql,$array);
	}
}

?>