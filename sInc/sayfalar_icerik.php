<?php
/*
 * Created on 30.Eki.2006
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

 class Icerik extends sSayfa{

 	function alSayfaIcerik($db,$baslik,$id){
 		return array("ICERIK"		=>$this->getIcerik($db,$baslik,$id),
					 "ALT_BASLIKLAR"=>$this->getAltBasliklar($db,$id?$id:$this->alSayfaId($db,$baslik)));
 	}
 	
 	function alSayfaId($db,$baslik){
 		$sql="select ID from ".tSAYFALAR." where sayfa_adi=".$db->Param("SAYFA_ADI")." and durum='1' ";

		$rs=$db->GetRow($sql,array("SAYFA_ADI"=>$baslik));
		return $rs[ID];
 	} 	
 	
 	function getIcerik($db,$baslik,$id=null){
 		
 		$array=array("SAYFA_ADI"=>$baslik);
 		$sql="select ID,BASLIK,KISA_OZET,THUMBNAIL,ICERIK from ".tSAYFALAR_ICERIK." where sayfa_adi=".$db->Param("SAYFA_ADI")." and durum='1' ";
		
		if($id===0 || !$id)
			$sql.=" and parent=".$db->Param("ID");
		else
			$sql.=" and id=".$db->Param("ID");
			
 		$sql.=" ORDER BY sira asc";

		$array["ID"]=$id?$id:0;			

		$rs=$db->Execute($sql,$array);
		
		$i=0;
		$detay=array();
		while($s=$rs->FetchNextObject()){
			$detay[$i]["ID"]=$s->ID;
			$detay[$i]["BASLIK"]=$s->BASLIK;
			$detay[$i]["KISA_OZET"]=$s->KISA_OZET;
			$detay[$i]["ICERIK"]=$s->ICERIK;
			$detay[$i]["THUMBNAIL"]=$s->THUMBNAIL;

			$detay[$i]["FOTO"]=$this->getFotolar($db,$s->ID,"SAYFA");
			$i++;
		}
		return $detay;
 	}
	
	/**
	 * alt baþlýklarý listeme
	 */
 	function getAltBasliklar($db,$id){

 		$sql="select ID,BASLIK,KISA_OZET,THUMBNAIL,ICERIK from ".tSAYFALAR_ICERIK." where durum='1' ";		
		$sql.=" and parent=".$db->Param("ID");			
 		$sql.=" ORDER BY sira asc";

		$rs=$db->Execute($sql,array("ID"=>$id));
		
		$i=0;
		$detay=array();
		while($s=$rs->FetchNextObject()){
			$detay[$i]["ID"]=$s->ID;
			$detay[$i]["BASLIK"]=$s->BASLIK;
			$detay[$i]["KISA_OZET"]=$s->KISA_OZET;
			$detay[$i]["THUMBNAIL"]=$s->THUMBNAIL;
			$i++;
		}
		return $detay;
 	}

 	function getRefBasliklar($db){
 		$sql="select * from ".tREFERANSLAR." where durum='1' order by SIRA";

 		return $db->GetAll($sql);
 	}

	function getReferans($db,$ref_id){

		$sql="select * from ".tREFERANSLAR." where id=".$db->Param("ref_id");

		return $db->GetRow($sql,array("ref_id"=>$ref_id));

	}

	function getFotolar($db,$tekilAnahtar,$tip){

		$sql="select ID,THUMBNAIL,FOTO from ".tFOTOLAR." where durum='1' and  ref_id=".$db->Param("tekilAnahtar")." and tip=".$db->Param("tip")." order by sira";

		return $db->GetAll($sql,array("tekilAnahtar"=>$tekilAnahtar,"tip"=>$tip));
	}

	function insertMesaj($db,$array){

		//$array["OLUS_TARIHI"]=date("d/m/Y H:m:s");;
		//$array["DEGISME_TARIHI"]=date("d/m/Y H:m:s");
		$array["DURUM"]='1';
		$array["MESAJ_DURUMU"]='OKUNMADI';

		$sql="insert into ".tILETISIM." set MESAJ_TIPI=".$db->Param("MESAJ_TIPI").", GONDEREN_ADI=".$db->Param("GONDEREN_ADI").",TEL=".$db->Param("TEL").", EMAIL=".$db->Param("EMAIL").",KONU=".$db->Param("KONU").",MESAJ=".$db->Param("MESAJ").",DURUM=".$db->Param("DURUM").",MESAJ_DURUMU=".$db->Param("MESAJ_DURUMU");

		return $db->Execute($sql,$array);
	}

	function getRandomRef($db){
		return null;
		/*$sql="select ID,REF_ADI,KISA_OZET,THUMBNAIL from ".tREFERANSLAR." where THUMBNAIL is not null and durum=1 order by RAND() limit 0,5";

		$rs=$db->Execute($sql);
		$i=0;
		$detay=array();
		while($s=$rs->FetchNextObject()){
			$detay[$i]["ID"]=$i;
			$detay[$i]["REF_ADI"]=$s->REF_ADI;
			$detay[$i]["KISA_OZET"]=substr($s->KISA_OZET,0,40)."..";
			$detay[$i]["THUMBNAIL"]=$s->THUMBNAIL;
			$detay[$i]["REF_ID"]=$s->ID;
			$i++;
		}

		return $detay;*/
	}

	function getFotoDetail($db,$foto_id){
		$sql="select ID,THUMBNAIL,FOTO from ".tFOTOLAR." where durum='1' and id=".$db->Param("foto_id");

		return $db->GetRow($sql,array("foto_id"=>$foto_id));

	}

	function getHAnim($db){
		$sql="select FOTO_ADI from ".tANIM." order by rand() limit 25 ";

		$rs=$db->Execute($sql);
		$i=0;
		$detay=array();
		while($s=$rs->FetchNextObject()){
			$detay[$i]["ID"]=$i;
			$detay[$i]["FOTO_ADI"]=$s->FOTO_ADI;
			$i++;
		}

		return $detay;
	}
 }
?>
