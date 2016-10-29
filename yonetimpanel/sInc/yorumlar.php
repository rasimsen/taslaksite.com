<?php
class Yorum extends sAdminSayfa{

	function alYorumSorgu($db,$durum='0',$sayfa_id=null,$kullanici_id='',$admin_id='',$veri_say=false,$debug=0){
		$sorgu="SELECT ".($veri_say?"COUNT(*) SAY ":"y.YORUM, 
					   y.ID,
					   concat(y.OLUS_TARIHI,' ',y.OLUS_SAATI) TARIH,
					   s.SAYFA_ADI,
					   k.KULLANICI_ADI,
					   k.EMAIL,
					   ky.KULLANICI_ADI ADMIN,
					   y.DURUM")."
				FROM ".tYORUM." as y 
						    INNER JOIN ".tKULLANICILAR." as k ON y.KULLANICI_ID=k.ID AND k.DURUM='1' AND k.TIP='KULLANICI'
						    LEFT JOIN ".tSAYFALAR_ICERIK." as s ON y.SAYFA_ID=s.ID AND s.DURUM='1'
						    LEFT JOIN ".tKULLANICILAR." as ky ON y.ADMIN_ID=ky.ID AND ky.DURUM='1' AND ky.TIP='YONETICI'";
		$veri=array();
		$where_dizi=array();

		if($durum=='0' || $durum=='1'){
			$where_dizi[] = " y.DURUM=".$db->Param("DURUM");
			$veri["DURUM"]=$durum;
		}				    
		if($sayfa_id){
			$where_dizi[] = " y.SAYFA_ID=".$db->Param("SAYFA_ID");
			$veri["SAYFA_ID"]=$sayfa_id;
		}				    
		if($kullanici_id){
			$where_dizi[] = " y.KULLANICI_ID=".$db->Param("KULLANICI_ID");
			$veri["KULLANICI_ID"]=$kullanici_id;
		}				    
		if($admin_id){
			$where_dizi[] = " y.ADMIN_ID=".$db->Param("ADMIN_ID");
			$veri["ADMIN_ID"]=$admin_id;
		}				   
		if(count($where_dizi)>0)
			$sorgu .= " where ".implode(" and ",$where_dizi); 
		$sorgu .= " ORDER BY y.OLUS_TARIHI,y.OLUS_SAATI";
		
		if($debug){
			pre($sorgu);pre($veri);
		}
		
		return array('VERI'=>$veri,'SORGU'=>$sorgu);
		/*
		if(count($veri)>0)
			return $db->GetAll($sorgu,$veri);
		else{
			return $db->GetAll($sorgu);
		}*/
		
	}
	
	/**
	 * yorumlarý getir
	 *
	 * @param object $db
	 * @param unknown_type $durum
	 * @param unknown_type $sayfa_id
	 * @param unknown_type $kullanici_id
	 * @param unknown_type $admin_id
	 * @param unknown_type $debug
	 */
	function alYorumListe($db,$durum='0',$sayfa_id=null,$kullanici_id='',$admin_id='',$debug=0){
		$v=$this->alYorumSorgu($db,$durum,$sayfa_id,$kullanici_id,$admin_id,$debug);
		$veri=$v[VERI];
		$sorgu=$v[SORGU];
		//pre($sorgu);pre($veri);		
		if(count($veri)>0)
			return $db->GetAll($sorgu,$veri);
		else{
			return $db->GetAll($sorgu);
		}		
	}
	
	function alYorumVeriSay($db,$durum='0',$sayfa_id=null,$kullanici_id='',$admin_id='',$debug=0){
		$v=$this->alYorumSorgu($db,$durum,$sayfa_id,$kullanici_id,$admin_id,true);
		$veri=$v[VERI];
		$sorgu=$v[SORGU];
		
		if(count($veri)>0)
			return $db->GetAll($sorgu,$veri);
		else{
			return $db->GetAll($sorgu);
		}		
	}
	
}

?>