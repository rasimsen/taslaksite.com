<?php

 /**
  * admin sayfalarý için genel fonksiyonlar buraya eklenmiþtir..
  * 
  * <açýklama>
  *   
  * Oluþturulma tarihi : 16.Kas.2008
  * @link http://www.rasimsen.com
  * @copyright 2008 Rasim ÞEN
  * @author Rasim ÞEN<dev@rasimsen.com>
  * @version 1.0  
  */

	define("AYARLAR","../sInc/ayarlar.sen.php");
	require_once("../sInc/uygulama.php");
	require_once("sInc/login.php");
	
	$login=new Login($db);
	if($_REQUEST['logout']){
		$login->logout();
	}
	
	if(!$login->admin_id){
		$login->yonlendir("login.php");
	}
	
	class sAdminSayfa extends sSayfa {
		
			/**
			 * sSayfa class ý, taslaksite.com için oluýþturulmuþ genel class týr. 
			 * 
			 * smarty, ve diðer ana öðeler bu class içinde hazýrlanýr, ve tim diðer class lar sSayfa class'ýndan türetilir.
			 */
			var $smarty;
			var $resim;
			var $stil;
			
			/**
			 * smarty de yönetim panelin þablonlarýnýn alýnacaðý adres tanýmlamasý yapýlýr
			 *
			 * @return sAdminSayfa
			 */
			function sAdminSayfa(){
		
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
				$taslak_tasarim_url=sSABLON_URL.'yonetimpanel/';
				$this->smarty->assign("yp_resim",$taslak_tasarim_url."resimler/");
				$this->smarty->assign("kp_stil",$taslak_tasarim_url."stiller/yp_genel.css");
						
				$this->resim=$taslak_tasarim_url."resimler/";
				$this->stil=$taslak_tasarim_url."stiller/genel.css";		
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
		
			/**
			 * bütün yönetim sayfalarýnýn kapsadýðý verileri düzenlemek için kullanýlmýþtýr.
			 * 
			 * yeni gelen yorum, mesaj gibi 
			 * 
			 * @param $db veritabaný nesnesi
			 * @return null
			 */
			/*function sAdminSayfa(){
				//$this->alSayfaUstuBilgiler($db);	
			}*/	
		
			function alSayfaUstuBilgiler($db){
				
				$yorum=$this->veriSay($db,tYORUM,array("DURUM"=>0));				
				$this->smarty->assign("yorum_onaylanmamis",$yorum[0][COUNT]);//yorum
				
				$email=$this->veriSay($db,tILETISIM,array("DURUM"=>1,"MESAJ_DURUMU"=>"OKUNMADI"));				
				$this->smarty->assign("email_okunmamis",$email[0][COUNT]);//yorum

				$yeni_kullanicilar=$this->veriSay($db,tKULLANICILAR,array("DURUM"=>1,"TIP"=>"KULLANICI"));				
				$this->smarty->assign("kullanici_yeni",$yeni_kullanicilar[0][COUNT]);//yorum
				
			}
			
		  	/**
		  	 * diskten taslaði alýr ve deðiþken olarak bize döndürür
		  	 *
		  	 * @param array $veri
		  	 * @return string
		  	 */
			function alTaslak($veri){
		        $this->smarty->assign('mesaj', $veri);
		        //$this->sYaz($veri["sTaslak"]);
		        $body = $this->smarty->fetch("admin_".$veri["sTaslak"].".tpl");
		        return $body;	
		  	}  	
			
			/**
			 * sayfa taslaklarýndaki mesaj için ayrýlan alana basilmasý gereken mesajý basar.
			 * 
			 * bunun için diskten önce mesaj turune göre taslaðý alýr ve mesaj deðiþkenlerini set eder 
			 * ve ekrana basar
			 * 
			 * Not: {$mesajTaslakSite} parametresi mutlaka sayfa taslaklarýnda bulunmasý gerekmektedir.
			 * bunun silinmesi yada olmamasý halinde mesajlar ekranda görünmeyecektir.
			 * 
			 * Not2: $GLOBALS['mesajTaslakSite'] parametresinin kullanýlma sebebi, taslaklara heryerden mesaj atamasý
			 * yapabilmek içindir. class lardan türetilen yeni objeler içinden atamasý yapýlan smarty parametreleri
			 * boþ olarak geliyor aksi takdirde.
			 * 
			 * $body deðiþkeni genel olarak stringtir fakat bazý durumlarda dizi olarakta gönderilebilir.
			 * bu durumda bu dizi ekrana <li></li> taglarý arasýnda listeli biçimde getirilir.
			 * yani array deðiþkeni de desteklemektedir. 
			 *
			 * @param string $title
			 * @param string $body
			 */
			function mesajBilgi($title='',$body=''){
				/*pre($title);
				pre($body);*/
				
				if(is_array($body)){
					$body="<ul>".implode("<li>",$body)."</ul>";
				}
				$veri=array("title"=>$title,"body"=>$body,"sTaslak"=>"mesajBilgi");
				$GLOBALS['mesajTaslakSite']=$this->alTaslak($veri);		
			}
			function mesajBasarili($title=null,$body=null){
				/*pre($title);
				pre($body);*/
				
				if(is_array($body)){
					$body="<ul>".implode("<li>",$body)."</ul>";
				}
				$veri=array("title"=>$title,"body"=>$body,"sTaslak"=>"mesajBasarili");
				$GLOBALS['mesajTaslakSite']=$this->alTaslak($veri);		
			}
			function mesajHata($title=null,$body=null){
				/*pre($title);
				pre($body);*/
		
				if(is_array($body)){
					$body="<ul>".implode("<li>",$body)."</ul>";
				}
				$veri=array("title"=>$title,"body"=>$body,"sTaslak"=>"mesajHata");
				$GLOBALS['mesajTaslakSite']=$this->alTaslak($veri);		
			}
			
			function mesajUyari($title=null,$body=null){
		/*
				pre($title);
				pre($body);
		*/
				if(is_array($body)){
					$body="<ul>".implode("<li>",$body)."</ul>";
				}
		
				$veri=array("title"=>$title,"body"=>$body,"sTaslak"=>"mesajUyari");
				$GLOBALS['mesajTaslakSite']=$this->alTaslak($veri);
		        
			}
				
		
	}

	$sen=new sAdminSayfa();
	$sen->alSayfaUstuBilgiler($db);

	
	
?>
