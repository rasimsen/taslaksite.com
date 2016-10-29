<?php
//admin
define("AYARLAR","../sInc/ayarlar.sen.php");
require_once("../sInc/uygulama.php");
require_once("sInc/login.php");

$s=$_REQUEST['s'];
$sen=new sSayfa();

class Giris extends Login{
	/**
	 * sSayfa class ý, taslaksite.com için oluýþturulmuþ genel class týr. 
	 * 
	 * smarty, ve diðer ana öðeler bu class içinde hazýrlanýr, ve tim diðer class lar sSayfa class'ýndan türetilir.
	 */
	var $smarty;
	
	function Giris($db){

		$this->smarty=new Smarty();
		$this->smarty->compile_check = true;
		$this->smarty->debugging = false;
		$this->smarty->template_dir = TEMPLATES.sAYIRAC.'yonetimpanel' ;
		
		/**
		 * template lerin derleneceði dizin varmý kontrolü yapýlýr..
		 */
		if(!file_exists(TEMPLATES_C.sAYIRAC.'yonetimpanel'))
			mkdir(TEMPLATES_C.sAYIRAC.'yonetimpanel');			
			
		$this->smarty->compile_dir = TEMPLATES_C.sAYIRAC.'yonetimpanel';
		$this->smarty->config_dir = CONFIGS;
		$this->smarty->cache_dir = CACHE;
		
		/**
		 * site genellinde resim, css adrelerini normalde config dosyasýndan gösterme
		 * daha faydalý olabilirdi fakat kullanýcýnýn kendi özel tasarýmlarýný rahatça 
		 * taslaksite.com a uyarlayabilmesi için resim, css ve diðer config dosyasý deðiþkenlerini 
		 * dinamik ayarlýyacaðýz..
		 * 
		 * not: config dosyasý parametreleri .conf uzantýlý dosyalara yazýlýr. detaylý bilgi için 
		 * smarty dökümanlarýna bakýlabilir.
		 */
		$taslak_tasarim_url=sSABLON_URL.'/yonetimpanel/';
		$this->smarty->assign("yp_resim",$taslak_tasarim_url."resimler/");
		$this->smarty->assign("kp_stil",$taslak_tasarim_url."stiller/yp_genel.css");		

		parent::Login($db);
	}

	function sYaz($page){
		if(!$this->smarty) $this->smarty=new Smarty();

		$this->smarty->assign('mesajTaslakSite',$GLOBALS['mesajTaslakSite']);
		$this->smarty->display($page);
	}

	function yonlendir($sayfa){
		header("Location:".$sayfa);
		echo "<script>location.href='".$sayfa."';</script>";
	}		
}


$login=new Giris($db);

if($sen->alPost("yp_kullanici_adi") && $sen->alPost("yp_sifre")){
	$login->yetkiAta($db,$sen->alPost("yp_kullanici_adi"),$sen->alPost("yp_sifre"),"YONETICI");
}

if($login->admin_id){
			$login->yonlendir("index.php");
			//$sen->sYaz("admin_index.tpl");
}
else{
			//login kontrolü yap
			$login->sYaz("admin_login.tpl");
}
?>