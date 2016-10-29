<?php
/*
 * Created on 30.Eki.2006
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

 class sGenel extends sSayfa{

	/**
	 * sSayfa class �, taslaksite.com i�in olu��turulmu� genel class t�r.
	 *
	 * smarty, ve di�er ana ��eler bu class i�inde haz�rlan�r, ve tim di�er class lar sSayfa class'�ndan t�retilir.
	 */
	var $smarty;
	var $resim;
	var $stil;
	function sGenel(){

		$this->smarty=new Smarty();
		$this->smarty->compile_check = true;
		$this->smarty->debugging = false;
		$this->smarty->template_dir = TEMPLATES.sAYIRAC.TASLAK_TASARIM.sAYIRAC.'sayfa' ;

		/**
		 * template lerin derlenece�i dizin varm� kontrol� yap�l�r..
		 */
		if(!file_exists(TEMPLATES_C.sAYIRAC.TASLAK_TASARIM))
			mkdir(TEMPLATES_C.sAYIRAC.TASLAK_TASARIM);

		if(!file_exists(TEMPLATES_C.sAYIRAC.TASLAK_TASARIM.sAYIRAC.'sayfa'))
			mkdir(TEMPLATES_C.sAYIRAC.TASLAK_TASARIM.sAYIRAC.'sayfa');

		$this->smarty->compile_dir = TEMPLATES_C.sAYIRAC.TASLAK_TASARIM.sAYIRAC.'sayfa';
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
		$taslak_tasarim_url=sSABLON_URL.TASLAK_TASARIM.'/sayfa/';
		$this->smarty->assign("resim",$taslak_tasarim_url."resimler/");
		$this->smarty->assign("stil",$taslak_tasarim_url."stiller/genel.css");
		$this->smarty->assign("stiller",$taslak_tasarim_url."stiller/");
		$this->smarty->assign("tasarim_url",$taslak_tasarim_url);
		$this->smarty->assign("site_url",sURL);

		$this->resim=$taslak_tasarim_url."resimler/";
		$this->stil=$taslak_tasarim_url."stiller/genel.css";
		$this->stiller=$taslak_tasarim_url."stiller/";
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

	// --son:smarty setting

 	function alKullaniciId($db){
		require_once("sInc/uye.php");
		$sen=new Uye();
		$sen->login($db);
		return $sen->uye_id;
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
        $body = $this->smarty->fetch($veri["sTaslak"].".tpl");
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

	/**
	 * sayfalar�n i�eriklerini dizi olarak geri d�nd�r�r
	 *
	 * belirtilen id ye ili�ikin sayfa detay� ve bu sayfan�n alt�nda olu�turulan alt ba�l�klar� dizi olarak
	 * geri d�nd�r�r
	 *
	 * @param object $db
	 * @param int $id
	 * @return array
	 */
 	function alSayfaBilgi($db,$id){
 		return array("ICERIK"		=>$this->getIcerik($db,$id),
					 "ALT_BASLIKLAR"=>$this->getAltBasliklar($db,$id?$id:DEF_ID));
 	}

 	function getIcerik($db,$id){

 		$sql  = "select ID,BASLIK,KISA_OZET,THUMBNAIL,ICERIK";
 		$sql .= " from ".tSAYFALAR_ICERIK;
 		$sql .= " where durum='1' ";
 		if($id){
 			$sql .= " and id=".$db->Param("ID");
 			$set=array("ID"=>$id);
 		}else{
 			$sql .= " and parent=0 and sayfa_adi=".$db->Param("SAYFA_ADI");
 			$set=array("SAYFA_ADI"=>DEF_SAYFA_ADI);
 		}
 		$sql .= " ORDER BY sira asc,id desc";

		$rs=$db->Execute($sql,$set);

		$i=0;
		$detay=array();
		while(!$rs->EOF){
			$f=$rs->fields;
			$detay[$i]["ID"]=$f[ID];
			$detay[$i]["BASLIK"]=stripcslashes($f[BASLIK]);
			$detay[$i]["KISA_OZET"]=stripcslashes($f[KISA_OZET]);
			$detay[$i]["ICERIK"]=stripcslashes($f[ICERIK]);
			$detay[$i]["THUMBNAIL"]=$f[THUMBNAIL];
			if(!$id)
				$ref_id=$this->veriAl($db,tSAYFALAR,array("ID"),array("SAYFA_ADI"=>DEF_SAYFA_ADI,"DURUM"=>'1'));
			$detay[$i]["DOSYA"]=$this->veriAl($db,tFOTOLAR,array("ID","DOSYA_URL","BOYUT","AD","KISA_ACIKLAMA"),array("TIP"=>"FILE","REF_ID"=>$id?$f[ID]:$ref_id[0][ID],"DURUM"=>'1'),array("SIRA","ID"));
			$detay[$i][FOTO]=$this->veriAl($db,tFOTOLAR,array("ID","THUMBNAIL","FOTO","AD","KISA_ACIKLAMA","THUMB_GENISLIK","THUMB_YUKSEKLIK","FOTO_GENISLIK","FOTO_YUKSEKLIK"),array("TIP"=>"FOTO","REF_ID"=>$id?$f[ID]:$ref_id[0][ID],"DURUM"=>'1'),array("SIRA","ID"),0);

			$i++;
			$rs->MoveNext();
		}
		return $detay;
 	}

	/**
	 * alt ba�l�klar� listeme
	 */
 	function getAltBasliklar($db,$id){

 		$sql="select ID,BASLIK,KISA_OZET,THUMBNAIL,ICERIK from ".tSAYFALAR_ICERIK." where durum='1' ";
		$sql.=" and parent=".$db->Param("ID");
 		$sql.=" ORDER BY sira asc,id desc";

 		$rs=$db->Execute($sql,array("ID"=>$id));

		$i=0;
		$detay=array();
		while(!$rs->EOF){
			$f=$rs->fields;

			$detay[$i]["ID"]=$f[ID];
			$detay[$i]["BASLIK"]=stripcslashes($f[BASLIK]);
			$detay[$i]["KISA_OZET"]=stripcslashes($f[KISA_OZET]);
			$detay[$i]["THUMBNAIL"]=$f[THUMBNAIL];
			$i++;

			$rs->MoveNext();
		}
		return $detay;
 	}

	/**
	 * link kutulari
	 */
  	function alLinkKutulari($db,$array){

  		$b=$this->setBind($db,$array);

 		$sql  = "select ID,KUTU_ADI";
 		$sql .= " from ".tLINK_KUTULARI;
 		$sql .= " where durum='1' and ID in (".implode(",",$b['bind']).")";
 		$sql .= " ORDER BY sira asc,id desc";

		$rs=$db->Execute($sql,$b['value']);

		$i=0;
		$detay=array();
		while(!$rs->EOF){
			$f=$rs->fields;
			$detay[$i]["KUTU_ADI"]=$f[KUTU_ADI];
			$detay[$i]["LINK"]=$this->veriAl($db,tLINK_KUTULARI_ICERIK,array("ID","LINK_ADI","LINK_URL","LINK_TARGET","LINK_SOURCE"),array("PARENT"=>$f[ID],"DURUM"=>'1'),array("SIRA","ID"),0);

			$i++;
			$rs->MoveNext();
		}
		return $detay;
 	}

 	/**
	 * kategori listesini getir..
	 *
	 * @param object $db
	 * @param number $id
	 * @param array $v
	 * @param boolean $p
	 * @return array
	 */
 	var $a='';
	function alKategori($db,$id=0,&$v=array(),$p=0){
		$sql="select ID,PARENT,KATEGORI_ADI,SIRA,DURUM from ".tKATEGORI." where durum='1' and parent=".$db->Param("ID")." order by parent,sira";
		$veri=array("ID"=>$id);

		$rs=$db->Execute($sql,$veri);
		$this->a2.="&nbsp;&nbsp;";

		while(!$rs->EOF){
			$f=$rs->fields;
			$v[]=array("ID"=>$f[ID],"KATEGORI_ADI"=>$this->a.$this->a2.'&raquo; '.$f[KATEGORI_ADI],"SIRA"=>$f[SIRA],"DURUM"=>$f[DURUM]);
			$this->alKategori($db,$f[ID],$v,1);

			$rs->MoveNext();
		}
		$this->a2=substr($this->a2,12);

		if($p){
			return null;
		}else{
			return $v;
		}
	}
 }
?>
