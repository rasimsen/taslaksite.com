<?php 
//login yönetimi

class Arama extends sSayfa{
	function Arama($db){
			
	}
	
	/**
	 * aramada fulla text search kullanýlmýþtýr. bunun için gerekli olan index db ye eklenmiþtir
	 *
	 * @param string $arama_text
	 * @param string $arama_turu 
	 */
	var $where_full_text;
	var $order_full_text;
	var $arama_param=array();
	function aramaFullTextSearchHazirla($db,$arama_text,$arama_turu){
			
			if(!$arama_text)
				return true;
		
			$hazirlanan_text=$arama_text;
			$explodeWord=explode(" ",urldecode($arama_text));
			
			//fulltext search te i ve ý harflerinde sorun çýktýðýnda bu þekilde yapýlýyor
			$hazirlanan_text=str_replace("Ý","i",$hazirlanan_text);
			$hazirlanan_text=str_replace("I","ý",$hazirlanan_text);
			$hazirlanan_text=strtolower($hazirlanan_text);
			
			
				$reg="(\')|(\")|(\+)|(\-)|(/)|(<)|(>)|(~)|( and )|( or )|(\()|(\))";
				//and ve or gibi þeyler geçiyorsa onlarý fulltext search enginee standardýna getiriyoruz
				$r=0;
				if(eregi($reg,$this->search_criteria["search_text"]))
				{
					$r=1;//özel arama durumu var demektir
					$hazirlanan_text=str_replace(" and "," +",$hazirlanan_text);
					$hazirlanan_text=str_replace(" or "," ",$hazirlanan_text);
				}
				
				$where_full_text="";

				// Search Title
				if($r==1){//özel arama 			
					$where_full_text .= " and match (baslik,kisa_ozet,icerik) against (".$db->Param("WHERE_FULL_TEXT")."  in boolean mode) ";
					$order_full_text = " match (baslik,kisa_ozet,icerik) against (".$db->Param("ORDER_FULL_TEXT")."  in boolean mode) ";
					$this->arama_param[WHERE_FULL_TEXT]=$hazirlanan_text;
					$this->arama_param[ORDER_FULL_TEXT]=$hazirlanan_text;
					
				}elseif($arama_turu == 1)//kelimelerin hepsi geçsin
				{
					for($i=0;$i<count($explodeWord);$i++)
						$matchFormat.=" +(*".$explodeWord[$i]."*)";
					
					$where_full_text .= " and match (baslik,kisa_ozet,icerik) against (".$db->Param("WHERE_FULL_TEXT")."  in boolean mode) ";
					$order_full_text  = " match (baslik,kisa_ozet,icerik) against (".$db->Param("ORDER_FULL_TEXT")."  in boolean mode) ";
					
					$this->arama_param[WHERE_FULL_TEXT]=$matchFormat;
					$this->arama_param[ORDER_FULL_TEXT]=$matchFormat;
				}
				elseif($arama_turu == 2){//kalýp olarak yazdýðý gibi arama
					$where_full_text .= " and match (baslik,kisa_ozet,icerik) against (\"".$db->Param("WHERE_FULL_TEXT")."\" in boolean mode) ";
					$order_full_text  = " match (baslik,kisa_ozet,icerik) against (\"".$db->Param("ORDER_FULL_TEXT")."\" in boolean mode) ";

					$this->arama_param[WHERE_FULL_TEXT]=$hazirlanan_text;
					$this->arama_param[ORDER_FULL_TEXT]=$hazirlanan_text;					
				}else//herhangi biri
				{	//
					for($i=0;$i<count($explodeWord);$i++)
						$matchFormatAny.=" (*".$explodeWord[$i]."*)";
					$where_full_text .= " and match (baslik,kisa_ozet,icerik) against (".$db->Param("WHERE_FULL_TEXT")." in boolean mode) ";
					$order_full_text  = " match (baslik,kisa_ozet,icerik) against (".$db->Param("ORDER_FULL_TEXT")." in boolean mode) ";

					$this->arama_param[WHERE_FULL_TEXT]=$matchFormatAny;
					$this->arama_param[ORDER_FULL_TEXT]=$matchFormatAny;					
				}	
				$this->where_full_text=$where_full_text;
				$this->order_full_text=$order_full_text;
				
		return true;
	}
	
	/**
	 * kategorilerde arama iþlemi
	 */
	function aramaKategoriler($db,$arama_text=null,$arama_turu=3,$sayfa=null){
		
		$sorgu="select si.ID,si.PARENT, '' SAYFA_BASLIGI, si.BASLIK, si.KISA_OZET,'index.php' SAYFA_LINKI
				from ".tKATEGORI." s,".tKATEGORI_ICERIK." si 
				where s.ID=si.PARENT
							and s.DURUM='1'
							and si.DURUM='1'";
		
		//belirli spesifik bir sayfa da arama yapýlacaksa
		if($sayfa){
			$sorgu .= " and s.ID = ".$db->Param("SAYFA_ADI");
			$this->arama_param[SAYFA_ADI]=$sayfa;
		}
		$s = $this->aramaFullTextSearchHazirla($db,$arama_text,$arama_turu);
		$sorgu .= $this->where_full_text;
		$sorgu .= $this->order_full_text?" order by ".$this->order_full_text." desc":"";
		
		return $sorgu;		
		
	}
	
	/**
	 * sayfalarda arama iþlemi
	 */
	function aramaSayfalar($db,$arama_text=null,$arama_turu=3,$sayfa=null){
		
		$sorgu="select si.ID,si.PARENT, s.SAYFA_BASLIGI, si.BASLIK, si.KISA_OZET,s.SAYFA_LINKI
				from ".tSAYFALAR." s,".tSAYFALAR_ICERIK." si 
				where s.SAYFA_ADI=si.SAYFA_ADI
							and (s.ID=si.PARENT or si.parent='0')
							and s.ARAMAYA_DAHIL='1'
							and s.DURUM='1'
							and si.DURUM='1'";
		
		//belirli spesifik bir sayfa da arama yapýlacaksa
		if($sayfa){
			$sorgu .= " and s.SAYFA_ADI = ".$db->Param("SAYFA_ADI");
			$this->arama_param[SAYFA_ADI]=$sayfa;
		}
		$s = $this->aramaFullTextSearchHazirla($db,$arama_text,$arama_turu);
		$sorgu .= $this->where_full_text;
		$sorgu .= $this->order_full_text?" order by ".$this->order_full_text." desc":"";
		
		return $sorgu;		
	}
	
	/**
	 * arama sonuçlarý için sorgu hazýrlanýr
	 *
	 * @param object $db
	 * @param array $degisken
	 */
	/*function aramaSql($db,$arama_text=null,$arama_turu=3,$sayfa=null){
		
		$sorgu=$this->aramaSayfalar($db,$arama_text,$arama_turu,$sayfa);
		$sorgu=$this->aramaKategoriler($db,$arama_text,$arama_turu,$sayfa);		

		return $sorgu;
	}*/
	
	/**
	 * arama sonuclarý aramaSQL den gelen sorgu çalýþtýrýlarak üretilir
	 *
	 * @param object $db
	 * @param array $degisken
	 */
	function aramaSonuc($db,$arama_text=null,$arama_turu=3,$sayfa=null){
		
		//$sorgu=$this->aramaSql($db,$arama_text,$arama_turu,$sayfa);
		
		//kategorilerde arama
		$this->arama_param=array();
		$sorgu=$this->aramaKategoriler($db,$arama_text,$arama_turu,$sayfa);
		
		//pre($sorgu);pre($this->arama_param);
		$rs=$db->Execute($sorgu,$this->arama_param);
		
		$veri=array();
		$i=0;
		while(!$rs->EOF){
			$f=$rs->fields;
			$veri[$i]["ID"]=$f[ID];
			$veri[$i]["PARENT"]=$f[PARENT];
			$veri[$i]["SAYFA_BASLIGI"]=$f[SAYFA_BASLIGI];
			$veri[$i]["BASLIK"]=$f[BASLIK];
			$veri[$i]["KISA_OZET"]=substr(strip_tags($f[KISA_OZET]),0,128)."..";
			$veri[$i]["SAYFA_LINKI"]=$f[SAYFA_LINKI];

			$i++;
			$rs->MoveNext();
		}
		
		
		
		//sayfalarda arama
		$this->arama_param=array();		
		$sorgu=$this->aramaSayfalar($db,$arama_text,$arama_turu,$sayfa);
		
		//pre($sorgu);pre($this->arama_param);
		$rs=$db->Execute($sorgu,$this->arama_param);
		
		//$veri=array();
		//$i=0;
		while(!$rs->EOF){
			$f=$rs->fields;
			$veri[$i]["ID"]=$f[ID];
			$veri[$i]["PARENT"]=$f[PARENT];
			$veri[$i]["SAYFA_BASLIGI"]=$f[SAYFA_BASLIGI];
			$veri[$i]["BASLIK"]=$f[BASLIK];
			$veri[$i]["KISA_OZET"]=substr(strip_tags($f[KISA_OZET]),0,128)."..";
			$veri[$i]["SAYFA_LINKI"]=$f[SAYFA_LINKI];

			$i++;
			$rs->MoveNext();
		}

		return $veri;
	}
	
	/**
	 * aramaya dahil olan sayfalarý listeler
	 *
	 * @param object $db
	 * @return array
	 */
 	function alAramaSayfalar($db){
 		return array_merge(array("Tüm Sayfalar"),$this->veriAlTekBoyut($db,tSAYFALAR,array("SAYFA_ADI","SAYFA_BASLIGI"),array("ARAMAYA_DAHIL"=>'1',"DURUM"=>'1'),array("SAYFA_BASLIGI"),0));
 	}
	
}


?>