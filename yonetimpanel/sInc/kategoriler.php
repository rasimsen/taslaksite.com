<?php
class Kategoriler extends sAdminSayfa{
	var $a='|_';
	var $a2='';
	function alKategoriListe($db,$id=0,&$v=array(),$p=0){
		$sql="select ID,PARENT,KATEGORI_ADI from ".tKATEGORI." where durum='1' and parent=".$db->Param("ID");
		$veri=array("ID"=>$id);

		$rs=$db->Execute($sql,$veri);
		$this->a2.='_';
		
		while(!$rs->EOF){
			$f=$rs->fields;
			$v[$f[ID]]=$this->a.$this->a2.$f[KATEGORI_ADI];
			$this->alKategoriListe($db,$f[ID],$v,1);
			
			$rs->MoveNext(); 
		}
		$this->a2=substr($this->a2,1);
		
		if($p){
			return null;
		}else{
			return $v;
		}
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
	function alKategori($db,$id=0,&$v=array(),$p=0){
		$sql="select ID,PARENT,KATEGORI_ADI,SIRA,DURUM from ".tKATEGORI." where /*durum='1' and*/ parent=".$db->Param("ID")." order by parent,sira";
		$veri=array("ID"=>$id);

		$rs=$db->Execute($sql,$veri);
		$this->a2.='_';
		
		while(!$rs->EOF){
			$f=$rs->fields;
			$v[]=array("ID"=>$f[ID],"KATEGORI_ADI"=>$this->a.$this->a2.$f[KATEGORI_ADI],"SIRA"=>$f[SIRA],"DURUM"=>$f[DURUM]);
			$this->alKategori($db,$f[ID],$v,1);
			
			$rs->MoveNext(); 
		}
		$this->a2=substr($this->a2,1);
		
		if($p){
			return null;
		}else{
			return $v;
		}
	}
	
}

?>