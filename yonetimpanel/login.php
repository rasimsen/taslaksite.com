<?php
//admin
define("AYARLAR","../sInc/ayarlar.sen.php");
require_once("../sInc/uygulama.php");
require_once("sInc/login.php");

$s=$_REQUEST['s'];
$sen=new sSayfa();

class Giris extends Login{
	/**
	 * sSayfa class �, taslaksite.com i�in olu��turulmu� genel class t�r. 
	 * 
	 * smarty, ve di�er ana ��eler bu class i�inde haz�rlan�r, ve tim di�er class lar sSayfa class'�ndan t�retilir.
	 */
	var $smarty;
	
	function Giris($db){

		$this->smarty=new Smarty();
		$this->smarty->compile_check = true;
		$this->smarty->debugging = false;
		$this->smarty->template_dir = TEMPLATES.sAYIRAC.'yonetimpanel' ;
		
		/**
		 * template lerin derlenece�i dizin varm� kontrol� yap�l�r..
		 */
		if(!file_exists(TEMPLATES_C.sAYIRAC.'yonetimpanel'))
			mkdir(TEMPLATES_C.sAYIRAC.'yonetimpanel');			
			
		$this->smarty->compile_dir = TEMPLATES_C.sAYIRAC.'yonetimpanel';
		$this->smarty->config_dir = CONFIGS;
		$this->smarty->cache_dir = CACHE;
		
		/**
		 * site genellinde resim, css adrelerini normalde config dosyas�ndan g�sterme
		 * daha faydal� olabilirdi fakat kullan�c�n�n kendi �zel tasar�mlar�n� rahat�a 
		 * taslaksite.com a uyarlayabilmesi i�in resim, css ve di�er config dosyas� de�i�kenlerini 
		 * dinamik ayarl�yaca��z..
		 * 
		 * not: config dosyas� parametreleri .conf uzant�l� dosyalara yaz�l�r. detayl� bilgi i�in 
		 * smarty d�k�manlar�na bak�labilir.
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
			//login kontrol� yap
			$login->sYaz("admin_login.tpl");
}
?>