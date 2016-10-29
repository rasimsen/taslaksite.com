<?php 
class eBulten extends sSayfa{
	/**
	 * ebülten ile ilgili iþlemler burada 
	 *
	 * @param object $db
	 * @return eBulten
	 */
	function eBulten($db){
			
	}
	
	function emailKontrol($db,$email){
		$rs=$this->selectData($db,tEBULTEN_EMAIL,array("DURUM"=>'1','EMAIL'=>$email),null,true,0);
		return $rs["COUNT"];
	}
	/**
	 * ebülten isteyen kullanýcýlarýn emaillerinin db ye kaydý yapýlýr
	 *
	 * @param object $db
	 * @param string $email
	 * @return boolean
	 */
	function emailEkle($db,$email){
		return $this->veriEkle($db,tEBULTEN_EMAIL,array("EMAIL"=>$email,'DURUM'=>'1'),0);
	}
	
}


?>