<?php
class Kullanicilar extends sAdminSayfa{

	public function kullaniciListe($db,$array){
		$sql="select * from ".tKULLANICILAR." where TIP='KULLANICI'";
		$a=array();
		if($array[DURUM]){
			$sql .="and DURUM=".$db->Param("DURUM");
			$a[DURUM]=$array[DURUM];
		}	
		if($array[_LIKE_KULLANICI_ADI]){
			$sql .= "and (KULLANICI_ADI like concat('%',".$db->Param("1").",'%') 
							or AD like concat('%',".$db->Param("2").",'%') 
							or SOYAD like concat('%',".$db->Param("3").",'%') 
							or EMAIL like concat('%',".$db->Param("4").",'%'))";
			$a[1]=$array[_LIKE_KULLANICI_ADI];
			$a[2]=$array[_LIKE_KULLANICI_ADI];
			$a[3]=$array[_LIKE_KULLANICI_ADI];
			$a[4]=$array[_LIKE_KULLANICI_ADI];
		}
		$sql .= " order by KULLANICI_ADI";
		
		//pre($sql);pre($a);
		
		return $db->GetAll($sql,$a);
	}

}

?>