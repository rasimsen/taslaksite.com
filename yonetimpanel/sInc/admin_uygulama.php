<?php

 /**
  * admin sayfalar� i�in genel fonksiyonlar buraya eklenmi�tir..
  * 
  * <a��klama>
  *   
  * Olu�turulma tarihi : 16.Kas.2008
  * @link http://www.rasimsen.com
  * @copyright 2008 Rasim �EN
  * @author Rasim �EN<dev@rasimsen.com>
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
			 * sSayfa class �, taslaksite.com i�in olu��turulmu� genel class t�r. 
			 * 
			 * smarty, ve di�er ana ��eler bu class i�inde haz�rlan�r, ve tim di�er class lar sSayfa class'�ndan t�retilir.
			 */
			var $smarty;
			var $resim;
			var $stil;
			
			/**
			 * smarty de y�netim panelin �ablonlar�n�n al�naca�� adres tan�mlamas� yap�l�r
			 *
			 * @return sAdminSayfa
			 */
			function sAdminSayfa(){
		
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
			 * b�t�n y�netim sayfalar�n�n kapsad��� verileri d�zenlemek i�in kullan�lm��t�r.
			 * 
			 * yeni gelen yorum, mesaj gibi 
			 * 
			 * @param $db veritaban� nesnesi
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
		  	 * diskten tasla�i al�r ve de�i�ken olarak bize d�nd�r�r
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
			 * sayfa taslaklar�ndaki mesaj i�in ayr�lan alana basilmas� gereken mesaj� basar.
			 * 
			 * bunun i�in diskten �nce mesaj turune g�re tasla�� al�r ve mesaj de�i�kenlerini set eder 
			 * ve ekrana basar
			 * 
			 * Not: {$mesajTaslakSite} parametresi mutlaka sayfa taslaklar�nda bulunmas� gerekmektedir.
			 * bunun silinmesi yada olmamas� halinde mesajlar ekranda g�r�nmeyecektir.
			 * 
			 * Not2: $GLOBALS['mesajTaslakSite'] parametresinin kullan�lma sebebi, taslaklara heryerden mesaj atamas�
			 * yapabilmek i�indir. class lardan t�retilen yeni objeler i�inden atamas� yap�lan smarty parametreleri
			 * bo� olarak geliyor aksi takdirde.
			 * 
			 * $body de�i�keni genel olarak stringtir fakat baz� durumlarda dizi olarakta g�nderilebilir.
			 * bu durumda bu dizi ekrana <li></li> taglar� aras�nda listeli bi�imde getirilir.
			 * yani array de�i�keni de desteklemektedir. 
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
