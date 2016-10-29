<?php 
//login yönetimi

class Uye extends sGenel{
	var $uye_id;

	function login($db){

		$si=$_COOKIE[UYE_COOKIE];
		$ip=getenv("REMOTE_ADDR");
		$sql="select ID,KULLANICI_ADI,AD,SOYAD,EMAIL from ".tKULLANICILAR." where SESSION_ID=".$db->Param("SESSION_ID")." and IP=".$db->Param("IP")." and DURUM='1'";
		$r=$db->GetRow($sql,array("SESSION_ID"=>$si,"IP"=>$ip));
		if(count($r)){			
			$this->uye_id=$r["ID"];	
		}else{
			$this->uye_id=null;
		}
		return $r;
	}
	
	
	function logout(){
		setcookie(UYE_COOKIE,"",time()-86400);
		echo "<script>alert('Üye çýkýþý gerçekleþtirilmiþtir.');location.href='index.php';</script>";
		$this->yonlendir("index.php");
	}
	
	function logout2(){
		setcookie(UYE_COOKIE,"",time()-86400);
	}
	
	function yetkiAta($db,$kullanici_adi=null,$sifre=null,$tip="KULLANICI"){
		if(!$kullanici_adi && !$sifre){
			$kullanici_adi=$_POST['kullanici_adi'];
			$sifre=$_POST['sifre'];
		}
		
		if($kullanici_adi && $sifre){
			if($rs=$this->kullaniciKontrol($db,$kullanici_adi,md5($sifre),$tip)){
				$ip=getenv("REMOTE_ADDR");
				
				//session_start();				
				$si=$this->alGUID();//session_id();

				$sql="update ".tKULLANICILAR." set SESSION_ID=".$db->Param("SESSION_ID").", IP=".$db->Param("IP")." where ( KULLANICI_ADI=".$db->Param("KULLANICI_ADI")." or EMAIL=".$db->Param("EMAIL").") and DURUM='1'";
				$db->Execute($sql,array("SESSION_ID"=>$si,"IP"=>$ip,"KULLANICI_ADI"=>$kullanici_adi,"EMAIL"=>$kullanici_adi));
				
				setcookie(UYE_COOKIE,$si);
				$this->yonlendir($_SERVER[REQUEST_URI]);
			}
			else{
				return false;
			}	
		}
	}
	//uye kullanýcý bilgisiniatar
	function kullaniciKontrol($db,$kullanici_adi,$sifre,$tip="KULLANICI"){
		
		$sql="select * from ".tKULLANICILAR." where (KULLANICI_ADI=".$db->Param("KULLANICI_ADI")." or EMAIL=".$db->Param("EMAIL")." ) and SIFRE=".$db->Param("SIFRE")." and DURUM='1' and tip=".$db->Param("TIP");

		return $db->GetRow($sql,array("KULLANICI_ADI"=>$kullanici_adi, "EMAIL"=>$kullanici_adi,"SIFRE"=>$sifre,"TIP"=>$tip));
	}
	
	//kullanýcý adý kontrol
	function kontrolKullaniciAdi($db,$kullanici_adi){
	
		$sql="select * from ".tKULLANICILAR." where kullanici_adi=".$db->Param("KULLANICI_ADI")." and DURUM='1'";

		return $db->GetRow($sql,array("KULLANICI_ADI"=>$kullanici_adi));
	}
	
	//email kontrol
	function kontrolEmail($db,$email){
	
		$sql="select * from ".tKULLANICILAR." where email=".$db->Param("EMAIL")." and DURUM='1'";

		return $db->GetRow($sql,array("EMAIL"=>$email));
	}
	
	
}


?>