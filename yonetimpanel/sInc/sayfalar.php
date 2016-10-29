<?php
class sayfalar extends sAdminSayfa{

	function getSayfaListesi($db){
		
		$sql="select ID,
					SAYFA_ADI,
					UST_MENUDE_GOSTER,
					ALT_MENUDE_GOSTER,
					DURUM,
					SIRA 
			  from ".tSAYFALAR." where DURUM in ('0','1') order by sira";
		$rs=$db->Execute($sql);
		$i=0;
		while(!$rs->EOF){
			$f=$rs->fields;
			$v[$i][ID]=$f[ID];
			$v[$i][SAYFA_ADI]=$f[SAYFA_ADI];
			$v[$i][UST_MENUDE_GOSTER]=$f[UST_MENUDE_GOSTER];
			$v[$i][ALT_MENUDE_GOSTER]=$f[ALT_MENUDE_GOSTER];
			$v[$i][DURUM]=$f[DURUM];
			$v[$i][SIRA]=$f[SIRA];
			$i++;
			$rs->MoveNext();
		}
		
		return $v;//$db->GetAll($sql);
	}

	function getSayfaDetay($db,$id){
	
		$sql="SELECT ID,SAYFA_ADI,SAYFA_BASLIGI,SAYFA_LINKI,SAYFA_TASLAGI,SAYFA_IKONU,SAYFA_TARGET,MENUDE_GOSTER,SAYFA_YERLESIMI from ".tSAYFALAR." where id=".$db->Param("id");
		
		return $db->GetRow($sql,array("id"=>$id));
	
	}

	function getSayfaIcerik($db,$sayfa_adi,$id=null,$parent=null){
		
		$sql="select ID,PARENT,BASLIK,DEGISME_TARIHI,SIRA,if(DURUM='1','AKTIF','PASIF') DURUM from ".tSAYFALAR_ICERIK." where sayfa_adi=".$db->Param("sayfa_adi");
		$array=array("sayfa_adi"=>$sayfa_adi);
		if($id){
			$sql.="and ID=".$db->Param("ID");
			$array["ID"]=$id;
		}
		
		if($parent){
			$sql.="and parent=".$db->Param("PARENT");
			$array["PARENT"]=$parent;
		}
		
		//pre($sql);pre($array);
		return $db->GetAll($sql,$array);
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
		$rs=$db->Execute($sql,$array);
		
		return $db->Insert_ID();
	}
	
	function getIcerik($db,$id){
	
		$sql="select BASLIK,KISA_OZET,ICERIK,THUMBNAIL,if(DURUM='1','AKTIF','PASIF') DURUM from ".tSAYFALAR_ICERIK." where id=".$db->Param("id");
		//pre($sql);pre($id);pre($tip);
		return $db->GetRow($sql,array("icerik_id"=>$id));			
		
	
	}

	function getAnaIcerik($db,$sayfa_adi){
	
		$sql="select BASLIK,KISA_OZET,THUMBNAIL,ICERIK,if(DURUM='1','AKTIF','PASIF') DURUM from ".tSAYFALAR_ICERIK." where parent=0 and sayfa_adi=".$db->Param("sayfa_adi");
		//pre($sql);pre($sayfa_adi);
		return $db->GetRow($sql,array("sayfa_adi"=>$sayfa_adi));			
		
	
	}
	

	function icerikGuncelle($db,$array,$icerik_id){
	
		$array[OLUS_TARIHI]=null;
		$array[DEGISME_TARIHI]=null;
		$array[DURUM]='1';
		$array[ICERIK_ID]=$icerik_id;
		
		$sql="update ".tSAYFALAR_ICERIK." set 
							BASLIK=".$db->Param("BASLIK").",
							ICERIK=".$db->Param("ICERIK").",
							ADMIN_ID=".$db->Param("ADMIN_ID").",
							OLUS_TARIHI=".$db->Param("OLUS_TARIHI").",
							DEGISME_TARIHI=".$db->Param("DEGISME_TARIHI").",
							DURUM=".$db->Param("DURUM")."
				where id=".$db->Param("ICERIK_ID");
		
		return $db->Execute($sql,$array);
	
	}

	function icerikDurum($db,$array){
		$sql="update ".tSAYFALAR_ICERIK." set DURUM=".$db->Param("DURUM")." where ID=".$db->Param("DURUM_ID");

		return $db->Execute($sql,$array);
	}

	function icerikSil($db,$sil_id){
		$sql="delete from ".tSAYFALAR_ICERIK." where ID=".$db->Param("ID");

		return $db->Execute($sql,array("ID"=>$sil_id));
	}

	function sayfaDurum($db,$array){
		$sql="update ".tSAYFALAR." set DURUM=".$db->Param("DURUM")." where SAYFA_ADI=".$db->Param("DURUM_ID");

		return $db->Execute($sql,$array);
	}

	function fotoKaydet($db,$general,$data){
		$c=count($data);
		$array_image=array();		
		for($i=0;$i<$c;$i++){
			$array_image[$i]=array(
									"REF_ID"=>$general[REF_ID],
									"TIP"=>$general[TIP],
									"THUMBNAIL"=>$data[$i][THUMBNAIL],
									"FOTO"=>$data[$i][NAME],
									"THUMB_GENISLIK"=>$data[$i][THUMB_GENISLIK],
									"THUMB_YUKSEKLIK"=>$data[$i][THUMB_YUKSEKLIK],
									"FOTO_GENISLIK"=>$data[$i][FOTO_GENISLIK],
									"FOTO_YUKSEKLIK"=>$data[$i][FOTO_YUKSEKLIK],																		
									"ADMIN_ID"=>$general[ADMIN_ID]
								);
		}

		return $this->veriEkle($db,tFOTOLAR,$array_image);
	}
	

	function getFotolar($db,$tekilAnahtar,$tip){
		
		$sql="select ID,THUMBNAIL,if(DURUM='1','AKTIF','PASIF') DURUM from ".tFOTOLAR." where ref_id=".$db->Param("tekilAnahtar")." and tip=".$db->Param("tip");
		
		return $db->GetAll($sql,array("tekilAnahtar"=>$tekilAnahtar,"tip"=>$tip));
	}

	/**
	 * foto - icerik siler
	 */
	function fotoDetaySil($db,$sil_id){
		$sql="delete from ".tFOTOLAR." where ID=".$db->Param("ID");

		return $db->Execute($sql,array("ID"=>$sil_id));
	}

	/**
	 * baslýk thumb silme
	 */
	function fotoThumbSilme($db,$sayfa_adi,$id,$parent){
		$sql="update ".tSAYFALAR_ICERIK." set THUMBNAIL='' where SAYFA_ADI=".$db->Param("SAYFA_ADI");
		$array=array("SAYFA_ADI"=>$sayfa_adi);
		if($parent==0){
			$sql.=" and parent=".$db->Param("PARENT");
			$array["PARENT"]=$parent;
		}else{
			$sql.=" and ID=".$db->Param("ID");
			$array["ID"]=$id;
		}

		return $db->Execute($sql,$array);
	}		

	/**
	 * sýra kaydet
	 */
	function baslikSiraKaydet($db,$array){

		$sql="update ".tSAYFALAR_ICERIK." set 
							ADMIN_ID=".$db->Param("ADMIN_ID").",
							DEGISME_TARIHI=".$db->Param("DEGISME_TARIHI").",
							SIRA=".$db->Param("SIRA")."
				where id=".$db->Param("ICERIK_ID");
		//pre($sql);pre($array);
		return $db->Execute($sql,$array);

	}		

	/**
	 * menu sýra kaydet
	 */
	function menuSiraKaydet($db,$array){

		$sql="update ".tSAYFALAR." set 
							ADMIN_ID=".$db->Param("ADMIN_ID").",
							SIRA=".$db->Param("SIRA")."
				where id=".$db->Param("ID");
		//pre($sql);pre($array);
		return $db->Execute($sql,$array);

	}		


}

?>