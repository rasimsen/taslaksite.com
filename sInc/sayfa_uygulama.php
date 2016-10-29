<?php
	/**
	 * sayfalar i�in kullan�lacak genel dosyad�r
	 *
	 * buradan b�t�n sayfalar�n ihtiya� duydu�u konfig�rasyonlar, fonksiyonlar, objeler sayfalara dahil edilir.
	 */
	define("AYARLAR","sInc/ayarlar.sen.php");
	require_once("sInc/uygulama.php");
	require_once("sInc/genel.php");

	/**
	 * ##################################### sayfalara ili�kin default i�lemler  #####################################
	 */
	function varsayilanSayfa($db){

		$arr=array('ID',
					'SAYFA_ADI',
					'SAYFA_BASLIGI',
					'SAYFA_LINKI',
					'SAYFA_TASLAGI',
					'SAYFA_IKONU',
					'SAYFA_TARGET',
					'MENUDE_GOSTER',
					'SAYFA_YERLESIMI',
					'SADECE_UYE',
					'YORUM_ACIK',
					'ARAMAYA_DAHIL'	,
					'AKTIF_LINK_KUTULARI');

		$sql="select ".implode(",",$arr)." from ".tSAYFALAR." where DURUM='1' and SAYFA_LINKI=".$db->Param("SAYFA_LINKI");

		$sayfa_link_arr=explode("/",$_SERVER['SCRIPT_NAME']);
		$sayfa_link=$sayfa_link_arr[count($sayfa_link_arr)-1];

		$sayfa_detay=$db->GetRow($sql,array("SAYFA_LINKI"=>$sayfa_link?$sayfa_link:'index.php'));

		foreach($arr as $v){
			define("DEF_".$v,$sayfa_detay[$v]);
		}
	}

	varsayilanSayfa($db);

	/**
	 * sitede bulunan kullan�c�n�n siteye �ye olup olmad���n�n kontrol�n�n yap�ld��� yerdir
	 */
	function kontrolLogin(){
		return $_COOKIE[UYE_COOKIE]?true:false;
	}

	/**
	 * �uan bulunulan sayfan�n de�i�kenleri ile beraber adresini d�nd�r�r.
	 *
	 * @return unknown
	 */
	function sayfaAdresi(){
		return $_SERVER[REQUEST_URI];
	}


	/**
	 * sayfa adresini serialize edilmi� �ekilde geri dond�r�r..
	 *
	 * @return string
	 */
	function sayfaAdresiSr(){
		return serialize(sayfaAdresi());
	}
	/**
	 * Serialize edilmi� bilgiyi eski orjinal haline d�nd�r�r.
	 *
	 * @return
	 */
	function sayfaAdresiUnSr($veri){
		return unserialize($veri);
	}

	/**
	 * sayfa adresini urlencode edilmi� �ekilde geri dond�r�r..
	 *
	 * @return string
	 */
	function sayfaAdresiEncode(){
		return urlencode(sayfaAdresi());
	}
	/**
	 * Serialize edilmi� bilgiyi eski orjinal haline d�nd�r�r.
	 *
	 * @return
	 */
	function sayfaAdresiDecode($veri){
		return urldecode($veri);
	}

	/**
	 * kullan�c�n�n �uan siteye �ye olup olmad���n�n kontrol� yap�l�r.
	 * �ye de�ilse �ye giri� sayfas�na y�nlendirilir. �ye giri�i yap�ld�ktan sonra tekrar
	 * bu sayfaya y�nlendirmesi yap�l�r..
	 *
	 * @return unknown
	 */
	function sadeceUye(){
		if(kontrolLogin()){
			return true;
		}else{
			$sen=new sGenel();
			$sen->yonlendir("uye.php?geridonus_url=".sayfaAdresiEncode());
		}

	}

	/**
	 * kullan�c� sistemin d���na ��kar�l�r.
	 *
	 * @param object $db
	 */
	function uyeCikisi($db,$yonlendirmede_yap=true){
			require_once("sInc/uye.php");
			$logout=new Uye($db);
			if($yonlendirmede_yap)
				$logout->logout();
			else
				$logout->logout2();
			return true;
	}
	$uye_cikisi=isset($_REQUEST['uye_logout'])?uyeCikisi($db):false;

	/**
	 * �ye giri�i
	 *
	 * @param object $db
	 * @param string $kullanici_adi
	 * @param string $sifre
	 * @return boolean
	 */
	function uyeGirisi($db,$kullanici_adi,$sifre){
		require_once("sInc/uye.php");
		$uye=new Uye();
		$lg=$uye->login($db);

		if($lg){//�ye ise direkt hi� giri� i�lemi yapma
			$uye->yonlendir("uye.php");
		}else{
			if($uye->yetkiAta($db,$kullanici_adi,$sifre)){
				//�ye giri�i ba�ar�l�
				NULL;
			}else{
				$uye->mesajUyari("�ye Giri�i Ba�ar�s�z","L�tfen kullan�c� ad� ve �ifrenizi tekrar g�zden ge�iriniz!");
				return false;
			}
		}
		return true;
	}
	$uye_girisi = ($_POST["kullanici_adi"] && $_POST["sifre"] && !isset($_POST["btnAdminLogin"]))?uyeGirisi($db,$_POST["kullanici_adi"],$_POST["sifre"]):false;

	/**
	 * ##################################### taslak sayfa #####################################
	 */
	class TaslakSayfa extends sGenel{
		function TaslakSayfa(){
			parent::sGenel();
			//$this->sSayfa();
		}
		function Hazirla($db,$sayfa_id){

			$this->genelKonfigurasyonAtama();
			$sayfa_bilgi=$this->alSayfaBilgi($db,$sayfa_id);

			if(DEF_YORUM_ACIK){
				$this->ekleYorumModulu($db,$sayfa_id);
			}

			if(DEF_SADECE_UYE)
				$this->kontrolUye($db);

			// �st men�leri y�kle..
			$this->ekleUstMenu($db);

			// alt men�leri y�kle..
			$this->ekleAltMenu($db);

			$this->ekleLinkKutulari($db);

			return $sayfa_bilgi;
		}

		/**
		 * TaslakSite.com Admin panelden tan�mlanan konfig�rasyonlar� �ablonlara atama i�lemleri yap�l�r.
		 *
		 * Title, Description, Keywords, adres, telefon, email,fax gibi .. bilgilerin atamas� yap�l�r
		 *
		 */
		function genelKonfigurasyonAtama(){

			$this->smarty->assign('tTITLE',TITLE."-".DEF_SAYFA_BASLIGI);
			$this->smarty->assign('tSAYFA_BASLIGI',DEF_SAYFA_BASLIGI);
			$this->smarty->assign('tSAHIP_ADI',SAHIP_ADI);
			$this->smarty->assign('tDESCRIPTION',DESCRIPTION);
			$this->smarty->assign('tKEYWORDS',KEYWORDS);

			$this->smarty->assign('tSAHIP_ADRES',SAHIP_ADRES);
			$this->smarty->assign('tSAHIP_TEL1',SAHIP_TEL1);
			$this->smarty->assign('tSAHIP_TEL2',SAHIP_TEL2);
			$this->smarty->assign('tSAHIP_FAX',SAHIP_FAX);
			$this->smarty->assign('tSAHIP_CEP',SAHIP_CEP);
			$this->smarty->assign('tSAHIP_EMAIL',SAHIP_EMAIL);

			$this->smarty->assign('tSITE_LOGO',SITE_LOGO);
			$this->smarty->assign('tSITE_ADI',SITE_ADI);
			$this->smarty->assign('tGOOGLE_ANALYTICS_KODU',GOOGLE_ANALYTICS_KODU);
			$this->smarty->assign('tKATEGORI_YENI_EKLENENLER',KATEGORI_YENI_EKLENENLER);

		}

		function Olustur(){

		}
		/**
		 * bu sayfa yoruma a��ksa yorum modul� sayfaya eklenecek
		 *
		 * bu mod�lde : SADECE_UYE_YORUMLASIN = 1(Admin -> konfig�rasyonlar k�sm�ndan ayarlan�r) ise kullan�c�
		 * siteye �ye de�ilse, sadece yap�lm�� olan yorumlar� g�rebilir.
		 * yorum yazmak istedi�inde ise kullan�c� �ye giri�i/de�ilse �ye olma sayfas�na y�nlendirilir.
		 * yorumlar admin onay�na d��meden sitede yay�nlanmazlar
		 *
		 * SADECE_UYE_YORUMLASIN =0 ise herkes yorumlayabilir
		 *
		 * di�er bir onay mekanizmasi ise YORUM_ADMIN_ONAYLI = 1(Admin -> konfig�rasyonlar k�sm�ndan ayarlan�r)
		 * olmas�dir. Bu durumda admin onaylamadan yorumla-
		 * r�n hi�biri sayfada g�r�nmez
		 *
		 * @param unknown_type $db
		 */
		function kaydetYorum($db,$yorum,$sayfa_id){

			if(SADECE_UYE_YORUMLASIN){
				sadeceUye();//�ye ise yoruma izin verilecek, de�ilse �ye sayfas�na y�nlendirilecek
			}
			$veri=array("YORUM"=>$yorum,"KULLANICI_ID"=>$this->alKullaniciId($db),"SAYFA_ID"=>$sayfa_id,"DURUM"=>YORUM_ADMIN_ONAYLI?'0':'1');
			$this->veriEkle($db,tYORUM,$veri,0);
		}
		function ekleYorumModulu($db,$sayfa_id){
			/**
			 * yorum eklendi ise db ye kaydedilir.
			 */
			if($this->alPost("btnYorumKaydet") && strlen($this->alPost(yorum_text))>0 && strlen($this->alPost(yorum_text))<768){
				$this->kaydetYorum($db,$this->alPost(yorum_text),$sayfa_id);
			}

			/**
			 * yorumlar� al
			 */
			$sql=" SELECT Y.ID,Y.YORUM,Y.OLUS_TARIHI,Y.OLUS_SAATI,K.KULLANICI_ADI,Y.SIZ
					 FROM ".tYORUM." Y, ".tKULLANICILAR." K
					WHERE Y.KULLANICI_ID=K.ID
					     AND Y.DURUM=1
					     AND K.DURUM=1
					     AND Y.SAYFA_ID=".$db->Param("SAYFA_ID")."
					ORDER BY Y.OLUS_TARIHI,Y.OLUS_SAATI";

			$yorum=$db->GetAll($sql,array("SAYFA_ID"=>$sayfa_id));

			$this->smarty->assign('yorumlar',$yorum);
			$this->smarty->assign('geridonus_url',sayfaAdresiEncode());
		}
		/**
		 * bu sayfay� sadece �ye olan kullan�c�lar�n g�rmesi isteniyorsa
		 * �ye kontrol� yap�l�r, login ise sayfay� g�rmesine izin verilir,
		 * de�ilse login ekran�na y�nlendirilir
		 *
		 * @param object $db
		 */
		function kontrolUye($db){
			sadeceUye();
		}
		/**
		 * sayfada g�sterilecek olan men� kutular� listelenir.
		 *
		 * 16-17-18-19-20 nolu link kutular� standart olarak kullan�lacak olan kutulard�r.
		 * 16 : Etiketler
		 * 17 : Kategoriler
		 * 18 : H�zl� Arama
		 * 19 : e-B�lten
		 * 20 : �ye Giri�i
		 *
		 * kutular�n� ifade etmektedir. bu �� link kutusu i�in ayr� ayr� taslak kutu yap�lmakta olup.
		 * kullan�m� daha esnek hale getirilecektir. yani copy - paste ile sayfan�n istenildi�i yerine konulabilmesi
		 * ama�lanmaktad�r..
		 *
		 * @param object $db
		 */
		function ekleLinkKutulari($db){
			$lk_list=explode("_",DEF_AKTIF_LINK_KUTULARI);

			if(UYELIK_SISTEMI_OLSUN && in_array(20,$lk_list))
				$this->ekleUyeGirisi($db,20);

			if(in_array(19,$lk_list))
				$this->ekleBulten($db,19);

			if(in_array(18,$lk_list))
				$this->ekleHizliArama($db,18);

			if(in_array(16,$lk_list))
				$this->ekleEtiketler($db,16);

			if(in_array(17,$lk_list))
				$this->ekleKategoriler($db,17);


			$lk=array();
			foreach($lk_list as $v){
				if(!in_array($v,array(16,17,18,19,20)))
					$lk[]=$v;
			}
			/**
			 * kullan�c�n�n kendisinin olu�turdu�u link kutular�
			 */
			$this->smarty->assign('sol_panel_kutulari',$lk);
			$this->ekleKullaniciLinkKutulari($db,$lk);
		}

		/**
		 * kullan�c�n�n olu�turdu�u link kutular�
		 */
		function ekleKullaniciLinkKutulari($db,$lk){
			$veri=$this->alLinkKutulari($db,$lk);
			$this->smarty->assign('veri_link_kutulari',$veri);
		}


		/**
		 * UyeGiri�i i�in
		 *
		 * @param object $db
		 */
		function ekleUyeGirisi($db,$kutu_id){
			$veri_kutu=$this->veriAl($db,tLINK_KUTULARI,array("KUTU_ADI"),array("ID"=>$kutu_id,"DURUM"=>1));
			$veri=$this->veriAl($db,tLINK_KUTULARI_ICERIK,array("LINK_ADI","LINK_SOURCE"),array("PARENT"=>$kutu_id,"DURUM"=>1),array("SIRA","ID"));

			$this->smarty->assign('kutu_adi',$veri_kutu[0]["KUTU_ADI"]);
			$this->smarty->assign('veri_liste',$veri);
		}

		/**
		 * site ile ilgili haber/duyuru gibi bilgileri almak isteyen kullan�c�
		 * email adresleri toplanmak isteniyorsa, sayfada b�lten kutusu g�sterilir
		 *
		 * @param object $db
		 */
		function ekleBulten($db,$kutu_id){
			$veri_kutu=$this->veriAl($db,tLINK_KUTULARI,array("KUTU_ADI"),array("ID"=>$kutu_id,"DURUM"=>1));
			$veri=$this->veriAl($db,tLINK_KUTULARI_ICERIK,array("LINK_ADI","LINK_SOURCE"),array("PARENT"=>$kutu_id,"DURUM"=>1),array("SIRA","ID"));

			$this->smarty->assign('ebulten_kutu_adi',$veri_kutu[0]["KUTU_ADI"]);
			$this->smarty->assign('ebulten_liste',$veri);
		}
		/**
		 * sayfada h�zl� arada opsiyonu olsun isteniyorsa eklenir.
		 *
		 * @param object $db
		 */
		function ekleHizliArama($db,$kutu_id){
			$veri_kutu=$this->veriAl($db,tLINK_KUTULARI,array("KUTU_ADI"),array("ID"=>$kutu_id,"DURUM"=>1));
			$veri=$this->veriAl($db,tLINK_KUTULARI_ICERIK,array("LINK_ADI","LINK_SOURCE"),array("PARENT"=>$kutu_id,"DURUM"=>1),array("SIRA","ID"));

			$this->smarty->assign('arama_kutu_adi',$veri_kutu[0]["KUTU_ADI"]);
			$this->smarty->assign('arama_liste',$veri);
		}

		/**
		 * etiketler
		 *
		 * @param object $db
		 */
		function ekleEtiketler($db,$kutu_id){

			$veri_kutu=$this->veriAl($db,tLINK_KUTULARI,array("KUTU_ADI"),array("ID"=>$kutu_id,"DURUM"=>1),null,0);

			$this->smarty->assign('etiket_kutu_adi',$veri_kutu[0]["KUTU_ADI"]);
			$this->smarty->assign('etiket_liste',$this->veriAlLimitli($db,tKATEGORI_ETIKETLERI,array('ID','ETIKET'),array('DURUM'=>1),array('SAYAC DESC'),LISTELENECEK_KAYIT_SAYISI,0));
		}

		/**
		 * kategorilre
		 *
		 * @param object $db
		 */
		function ekleKategoriler($db,$kutu_id){
			$veri_kutu=$this->veriAl($db,tLINK_KUTULARI,array("KUTU_ADI"),array("ID"=>$kutu_id,"DURUM"=>1));

			$this->smarty->assign('kategori_kutu_adi',$veri_kutu[0]["KUTU_ADI"]);
			$this->smarty->assign('lk_liste',$this->alKategori($db));
		}

		/**
		 * �stmen� dinamik olarak olu�turulur
		 *
		 * @param object $db
		 */
		function ekleUstMenu($db){

			$sql="SELECT ID, SAYFA_ADI,SAYFA_LINKI FROM ".tSAYFALAR." WHERE DURUM ='1' AND UST_MENUDE_GOSTER = '1' AND ID NOT IN (27,13,17,14) ORDER BY SIRA";
			$veri = $db->GetAll($sql);

			$this->smarty->assign('menu_ust',$veri);

			return;
		}

		/**
		 * Altmen� dinamik olarak olu�turulur
		 *
		 * @param object $db
		 */
		function ekleAltMenu($db){

			$sql="SELECT ID, SAYFA_ADI,SAYFA_LINKI FROM ".tSAYFALAR." WHERE DURUM ='1' AND ALT_MENUDE_GOSTER = '1' AND ID NOT IN (27/*,13,17,14*/) ORDER BY SIRA";
			$veri = $db->GetAll($sql);

			$this->smarty->assign('menu_alt',$veri);

			return;
		}
	}

?>