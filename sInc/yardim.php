<?php
class Yardim extends sSayfa{
	function Yardim($db){

	}

	function yardimSolMenu($db){
		$sorgu = "select si.ID,si.PARENT, si.BASLIK, s.SAYFA_LINKI
				from ".tSAYFALAR." s,".tSAYFALAR_ICERIK." si
									where s.SAYFA_ADI=si.SAYFA_ADI
												and s.ID=si.PARENT
												and s.DURUM='1'
												and si.DURUM='1'
												and si.SAYFA_ADI = 'YARDIM'
												and parent=19
				   order by si.sira   ";

 		$rs=$db->Execute($sorgu);


		$i=0;
		$detay=array();
		while(!$rs->EOF){
			$f=$rs->fields;

			$detay[$i]["ID"]=$f[ID];
			$detay[$i]["PARENT"]=$f[PARENT];
			$detay[$i]["BASLIK"]=$f[BASLIK];
			$detay[$i]["SAYFA_LINKI"]=$f[SAYFA_LINKI];
			$detay[$i]["ALT_MENU"]=$this->yardimAltMenu($db,$f[ID]);

			$i++;

			$rs->MoveNext();
		}
		return $detay;
	}

	function yardimAltMenu($db,$parent,$max_alt_menu=0){
		$sorgu = "select si.ID,si.PARENT, si.BASLIK, s.SAYFA_LINKI
				from ".tSAYFALAR." s,".tSAYFALAR_ICERIK." si
									where s.SAYFA_ADI=si.SAYFA_ADI
												/*and s.ID=si.PARENT*/
												and s.DURUM='1'
												and si.DURUM='1'
												and si.SAYFA_ADI = 'YARDIM'
												and parent=".$db->Param("PARENT")."
				   order by si.sira   ";

 		$rs=$db->Execute($sorgu,array("PARENT"=>$parent));

		$i=0;
		$detay=array();
		while(!$rs->EOF){
			$f=$rs->fields;

			$detay[$i]["ID"]=$f[ID];
			$detay[$i]["PARENT"]=$f[PARENT];
			$detay[$i]["BASLIK"]=$f[BASLIK];
			$detay[$i]["SAYFA_LINKI"]=$f[SAYFA_LINKI];
			if($max_alt_menu<2)
				$detay[$i]["ALT_MENU"]=$this->yardimAltMenu($db,$f[ID],$max_alt_menu++);

			$i++;
			$rs->MoveNext();
		}

		return $detay;
	}


}


?>