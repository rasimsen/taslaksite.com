<?php 
class eBulten extends sSayfa{
	/**
	 * eb�lten ile ilgili i�lemler burada 
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
	 * eb�lten isteyen kullan�c�lar�n emaillerinin db ye kayd� yap�l�r
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