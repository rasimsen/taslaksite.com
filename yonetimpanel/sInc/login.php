<?php 
//login yönetimi

class Login extends sSayfa{
	var $admin_id;

	function yonlendir($sayfa){
		header("Location:".$sayfa);
		echo "<script>location.href='".$sayfa."';</script>";
	}		
	
	function Login($db){
		$si=$_COOKIE[ADMIN_COOKIE];
		$ip=getenv("REMOTE_ADDR");
		$sql="select * from ".tKULLANICILAR." where SESSION_ID=".$db->Param("SESSION_ID")." and IP=".$db->Param("IP")." and DURUM='1'";
		$r=$db->GetRow($sql,array("SESSION_ID"=>$si,"IP"=>$ip));
		if(count($r)){			
			$this->admin_id=$r["ID"];	
		}else{
			$this->admin_id=null;
		}
	}
	
	
	function logout(){
		setcookie(ADMIN_COOKIE,"",time()-86400);
		$this->yonlendir("index.php");
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
				$sql="update ".tKULLANICILAR." set SESSION_ID=".$db->Param("SESSION_ID").", IP=".$db->Param("IP")." where EMAIL=".$db->Param("KULLANICI_ADI")." and DURUM='1'";
				$db->Execute($sql,array("SESSION_ID"=>$si,"IP"=>$ip,"EMAIL"=>$kullanici_adi));
				
				setcookie(ADMIN_COOKIE,$si);
				$this->yonlendir($_SERVER[REQUEST_URI]);
			}
			else{
				return false;
			}	
		}
	}
	//admin kullanýcý bilgisiniatar
	function kullaniciKontrol($db,$kullanici_adi,$sifre,$tip="KULLANICI"){
	
		$sql="select * from ".tKULLANICILAR." where EMAIL=".$db->Param("KULLANICI_ADI")." and SIFRE=".$db->Param("SIFRE")." and DURUM='1' and tip=".$db->Param("TIP");

		return $db->GetRow($sql,array("KULLANICI_ADI"=>$kullanici_adi,"SIFRE"=>$sifre,"TIP"=>$tip));
	}
	
}


?>