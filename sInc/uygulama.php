<?php
	/**
	 * taslaksite.com ile ilgili ana fonksiyonlar, class lar burada toplanmýþtýr.
	 */
	require_once('sInc/kur_kontrol.php');	
	require_once(AYARLAR);

	
	$db = ADONewConnection("mysql");

	//$db->debug = true;
	$db->Connect($host, $kullanici, $sifre, $veritabani);
	
	/**
	 * taslaksite.com ile ilgili genel konfigürasyonlar burada define edilmiþ deðiþken haline getirilir.
	 */
	$conf=$db->GetAll("select DEGISKEN,DEGER from ".tCONF." where DURUM='1'");
	foreach($conf as $deger){
		define($deger["DEGISKEN"],$deger["DEGER"]);
	}	

	/**
	 * sayfalama için bulunulan sayfanýn adresini alýr, sayfa numarasýný tekrara karþý siler..
	 *
	 * @return string
	 */
	function sayfaAdresiNav(){		

		foreach($_GET as $a=>$d){
			if($a!=='p') $arr[] =$a.'='.$d;	
		}
		$mtn=count($arr)>0?implode('&',$arr):'';
		return $_SERVER[SCRIPT_NAME].'?'.$mtn;
	}		
	
class sSayfa{

	/**
	 * standart deðiþkenleri alma 
	 * 
	 * bu þekilde yapýlmasý deðiþkenleri kontrol altýna almak içindir. 
	 * özellikle siteye yapýlan saldýralarýn önüne geçilir.
	 *
	 * @param unknown_type $veri
	 * @return unknown
	 */
	
	function alGet($veri=null){		
		return strip_tags($veri?$_GET[$veri]:$_GET);
	} 

	function alPost($veri=null){		
		return strip_tags($veri?$_POST[$veri]:$_POST);
	} 

	function alRequest($veri=null){		
		return strip_tags($veri?$_REQUEST[$veri]:$_REQUEST);
	} 

	function alCookie($veri=null){		
		return ($veri?$_COOKIE[$veri]:$_COOKIE);
	} 

	function alServer($veri=null){		
		return ($veri?$_SERVER[$veri]:$_SERVER);
	} 

	function alSession($veri=null){		
		return ($veri?$_SESSION[$veri]:$_SESSION);
	} 	
	
	function alGUID($debug=0){
		//$token = md5(uniqid());
		$btoken = md5(uniqid(rand(), true));
		if($debug)
			pre($btoken);
		return $btoken;			
	}

	/**
	 * türkçe karakterleri deðiþtirme
	 *
	 * @param unknown_type $text
	 * @return unknown
	 */
	function replace_tr($text) {
		$text = trim($text);
		$search = array('Ç','ç','Ð','ð','ý','Ý','Ö','ö','Þ','þ','Ü','ü',' ');
		$replace = array('C','c','G','g','i','I','O','o','S','s','U','u','-');
		$new_text = str_replace($search,$replace,$text);
	return $new_text;
	}

	/**
	 * Label/etiket fonksiyonu oluþacak oto ekranlar için biçimlendirilir
	 *
	 * @param string $deg = 'ID' // field adý
	 * @param string $deger = 'ID' // etiket adi
	 */
	function IlkKarakterleriBuyut($deg,$deger){
		$deger_array = explode(" ",$deger);
		$ara = array('a','b','c','ç','d','e','f','g','ð','h','ý','i','j','k','l','m','n','o','ö','p','r','s','þ','t','u','ü','v','y','z');
		$degis = array('A','B','C','Ç','D','E','F','G','Ð','H','I','Ý','J','K','L','M','N','O','Ö','P','R','S','Þ','T','U','Ü','V','Y','Z');

		foreach($deger_array as $d){
			$yd[]=str_replace($d,$ara,$degis).substr($d,1);
		}

		return implode(" ",$yd);
	}
	
	
	/**
	 * database iþlemleri için hazýrlanmýþ genel fonksiyon kütübhaneleri burada toplanmýþtýr.
	 */
	
	/**
	 * binded variable deðiþken kullanýmý için genel fonksiyon
	 * 
	 * binded variable kullanýmý özellikle sitenin kullanýcý sayýsý arttýrkça duruma göre 
	 * 10 katlýk 100 katlýk performans etkisi saðlayabilir. Veritabanýn kaynaklarýnýn verimli 
	 * kullanýlmasýna büyük katký saðlar 
	 */
	function setBind($db,$array=null,$bindPrefix='BP'){

		$params=array();
		$values=array();
		$paramID="{$bindPrefix}0";

		if(!is_array($array)) {
			$params[]=$db->Param($paramID);
			$values[$paramID]=$array;
		} else {
			if (count($array)===0) {
				$params[]=$db->Param($paramID);
				$values[$paramID]=null;
			} else {
				foreach($array as $i=>$value){
					$paramID="{$bindPrefix}{$i}";
					$params[]=$db->Param($paramID);
					$values[$paramID]=$value;
				}
			}
		}

		return array('bind'=>$params,'value'=>$values);

	}

	/**
	 * default value atanacak kayýtlarý belirler
	 */
	function checkDeafultValues($row){
		$default_alanlar=array();
		foreach($row as $k=>$v){
			if($v==='default' && strpos($k,"u_")!==false){
				$tmp=explode("u_",$k);
				$default_alanlar[]=$tmp[1];
			}
		}

		return $default_alanlar;
	}

	/**
	 * standart insert fonksiyonu
	 *
	 *@param string $tablename tabloadý, þema ismini fonksiyonda otomatik olarak eklenir
	 *@return boolean iþlemin baþarýlý bir þekilde yapýlýp yapýlmadýðý
	 */
	function veriEkle($db,$tablename,$data,$debug=0){
		if(!is_array($data) || count($data)==0) return true;

		if(strpos($tablename,"GSV_")!==false){
			pre("HATA! View içinden insert etmeye çalýþmaktasýnýz!");
			return "false";
		}
		if(!is_array($data[0])){
			if($data["DEG_TARIHI"]===null) $data["DEG_TARIHI"]=date("Y-m-d");
			if($data["OLUS_TARIHI"]===null) $data["OLUS_TARIHI"]=date("Y-m-d");
			if($data["DEG_SAATI"]===null) $data["DEG_SAATI"]=date("H:i:s");
			if($data["OLUS_SAATI"]===null) $data["OLUS_SAATI"]=date("H:i:s");
			if($data["SIZ"]===null) $data["SIZ"]=time();
			if($data["DURUM"]===null) $data["DURUM"]=1;
		}else{
			$unix_time=time();
			$date=date("Y-m-d");
			$time=date("H:i:s");
			for($i=0,$c=count($data);$i<$c;$i++){				
				if($data[$i]["DEG_TARIHI"]===null) 	$data[$i]["DEG_TARIHI"]=$date;
				if($data[$i]["OLUS_TARIHI"]===null) $data[$i]["OLUS_TARIHI"]=$date;
				if($data[$i]["DEG_SAATI"]===null) 	$data[$i]["DEG_SAATI"]=$time;
				if($data[$i]["OLUS_SAATI"]===null) 	$data[$i]["OLUS_SAATI"]=$time;
				if($data[$i]["SIZ"]===null) 		$data[$i]["SIZ"]=$unix_time;
				if($data[$i]["DURUM"]===null) 		$data[$i]["DURUM"]=1;				
			}
		}

		$row=$data[0]?$data[0]:$data;
		foreach($row as $key=>$value){
			$Fields[]=$key;
			$Params[]=$db->Param($key);
		}

		$sql="insert into ".$tablename."(".implode(",",$Fields).") values(".implode(",",$Params).")";

		if($debug==1){pre($sql,"Inserted SQL");pre($data,"Inserted DATA");}//die;
		$r=$db->Execute($sql,$data);
		return $db->Insert_ID();
	}


	/**
	 * tablodan veri silme(ki bu kayýt durumunu sýfýr yapma) veya kayýrlarý update etme iþleminde kullanýlýr
	 *
	 * where den sonraki field isimleri ve deðerleri dizi olarak gönderilir ve kayit_durumu iþlem tipine göre 1,0  yapýlýr.
	 * <br>$fieldArray dizisi associative array de gönderilebilir
	 *
	 * @param string $tablename iþlemin yapýlacaðý tablo adý
	 * @return boolean iþlemin baþarýlý bir þekilde gerçekleþip gerçekleþmediðini döndürür
 	 */
	function updateData($db,$tablename,$updateField,$whereField,$data,$debug=0){

		if(!is_array($updateField) || count($updateField)==0 || !is_array($data) || count($data)==0) return true;

		$time=time();
		$default_alanlar=array();

		//default value kontrolü
		$row=$data[0]?$data[0]:$data;

		$default_alanlar=$this->checkDeafultValues($row);

		if(strpos($tablename,"GSV_")!==false){
			pre("HATA! View içinden veri güncellemeye çalýþmaktasýnýz!");
			return "false";
		}

		$sql="update  ".$tablename." set ";
		foreach($updateField as $key=>$value){
			$s=substr($value,0,1);
			$value=($s=="+" || $s=="-")?substr($value,1):$value;
			$c=($s=="+" || $s=="-")?$value.$s:"";

			$tmpArr[]=$value."=".$c.(in_array($value,$default_alanlar)?'default':$db->Param("u_".$value));
		}
		$update=implode(",",$tmpArr);

		$sql.=$update;

		$where=" where ";
		foreach($whereField as $key=>$value){

			$tmpWhere[]=$value."=".$db->Param("w_".$value);
		}
		$where.=implode(" and ",$tmpWhere);

		$sql .=$where;

		if($debug==1){pre($sql,10,"Updated SQL");pre($data,10,"Updated DATA");}
		return $db->Execute($sql,$data);
	}
	/**
	 *
	 * veri Alýnmadan önce sorgu ve parametreler hazýrlanýr
	 *
	 * @param object $db
	 * @param string $tablename
	 * @param array $where_field
	 * @param array $sorting
	 * @param boolean $debug
	 * @return multi dimentional array
	 */

	function veriAlSorguHazirla($db,$tablename,$return_field=array(),$where_field=array(),$sorting='',$debug=0,$limit=array()) {

		$sql ="";
		$sql_where="";
		$sql_order="";
		if(is_array($return_field) and count($return_field)>0)
			$sql="select ".implode(',',$return_field)." from ".$tablename;
		else
			$sql="select * from ".$tablename;

		if(is_array($where_field) and count($where_field)>0){
			$where =array();
			foreach($where_field as $k=>$v){
				if(substr($k,0,6)=='_LIKE_')
					$where[]=substr($k,6)." like concat('%',".$db->Param($k).",'%')";
				else
					$where[]=$k."=".$db->Param($k);
			}
			$sql_where = " where ".implode(" and ",$where);
		}

		if(is_array($sorting) and count($sorting)>0)
			$sql_order= " order by ".implode(",",$sorting);
		elseif($sorting)
			$sql_order= " order by $sorting";

		$sql .=$sql_where ." " .$sql_order;
		
		$sql_limit="";
		if(is_array($limit) and count($limit)>0){
			$sql_limit= " limit ".$db->Param($limit[0]).",".$db->Param($limit[1]);
			$l2=(int)($limit[1]?$limit[1]:LISTELENECEK_KAYIT_SAYISI);
			$l1=(int)($limit[0]?$limit[0]*$l2:0);
			$where_field[]=$l1;
			$where_field[]=$l2;
		}elseif($limit){
			$sql_limit= " limit ".$db->Param($limit);
			$where_field[]=(int)$limit;			
		}		

		$sql .=' '.$sql_limit;
			
		if($debug==1){pre($sql,10,"Select SQL");pre($return_field);pre($where_field);}

		return array("SQL"=>$sql,"WHERE"=>$where_field);
	}

	/**
	 * otomatik veri alma için kullanýlýr...
	 * 
	 * iki boyutlu dizi döndürür geri
	 *
	 * @param object $db
	 * @param string $tablename
	 * @param array $where_field
	 * @param array $sorting
	 * @param boolean $debug
	 * @return multi dimentional array
	 */
	function veriAl($db,$tablename,$return_field=array(),$where_field=array(),$sorting='',$debug=0) {

		$param=$this->veriAlSorguHazirla($db,$tablename,$return_field,$where_field,$sorting,$debug);

		return $db->GetAll($param["SQL"],$param["WHERE"]);
	}

	function veriAlLimitli($db,$tablename,$return_field=array(),$where_field=array(),$sorting='',$limit=array(),$debug=0) {

		$param=$this->veriAlSorguHazirla($db,$tablename,$return_field,$where_field,$sorting,$debug,$limit);
		return $db->GetAll($param["SQL"],$param["WHERE"]);
	}
	
	
	/**
	 * otomatik veri alma için kullanýlýr...
	 * 
	 * tek boyutlu dizi þeklinde veri alma için kullanýlýr.
	 * bu yüzden index si unique(tek) olmayan veriler için kullanýlmasý tavsiye edilmez..
	 * 
	 * where dizisi array("ID","NAME") gibi iki degerli olmalý
	 *
	 * @param object $db
	 * @param string $tablename
	 * @param array $where_field
	 * @param array $sorting
	 * @param boolean $debug
	 * @return one dimentional array
	 */
	function veriAlTekBoyut($db,$tablename,$return_field=array(),$where_field=array(),$sorting='',$debug=0) {

		$param=$this->veriAlSorguHazirla($db,$tablename,$return_field,$where_field,$sorting,$debug);
		$rs=$db->Execute($param[SQL],$param[WHERE]);
		while(!$rs->EOF){
			$f=$rs->fields;
			foreach($f as $k=>$v){
				if(!is_numeric($k))
					$veri[$k]=$v;
			}
			$rs->MoveNext(); 
		}

		if($debug==1){pre($param[SQL],10,"Select SQL");pre($param[WHERE],10,"Selected DATA");}
		
		return $veri;
	}

	function veriAlKeyValue($db,$tablename,$return_field=array(),$where_field=array(),$sorting='',$debug=0) {

		$param=$this->veriAlSorguHazirla($db,$tablename,$return_field,$where_field,$sorting,$debug);
		$rs=$db->Execute($param[SQL],$param[WHERE]);
		$veri=array();
		while(!$rs->EOF){
			$f=$rs->fields;
			$veri[$f[$return_field[KEY]]]=$f[$return_field[VALUE]];

			$rs->MoveNext(); 
		}

		if($debug==1){pre($param[SQL],10,"Select SQL");pre($param[WHERE],10,"Selected DATA");}
		
		return $veri;
	}	
	
	function veriSayCache($db,$tablename,$where_field="",$group_by="",$sorting="",$group_by_islem=array("COUNT"=>"*"),$cache=true,$debug=0) {
		return $this->veriSay($db,$tablename,$where_field,$group_by,$sorting,$group_by_islem,$debug,$cache);		
	}
	
	/**
	 * tablodan hýzlý bir þekilde count alma
	 * 
	 * toplam alma iþlemleri belli kriterlere göre olabileceði gibi tüm tabloda ne kadar kayýt olduðunun 
	 * bulunmasý içinde alýnabilir..
	 * 
	 * bu fonksiyon le 
	 *  <br> tüm tablo daki kayýt toplamý
	 *  <br> belli kriterlere göre kayýt sayýsý 
	 *  <br> group bazýnda kayýt toplamlarý alýnabilir..
	 * 
	 * @param $db
	 * @param $tablename
	 * @param $where_field
	 * @param $group_by
	 * @param $sorting
	 * @param $group_by_islem=array("COUNT"=>"*","SUM"=>"ALAN_1","MAX"=>"ALAN_1","MIN"=>"ALAN_2")
	 * @param $debug
	 * @return array
	 */
	function veriSay($db,$tablename,$where_field="",$group_by="",$sorting="",$group_by_islem=array("COUNT"=>"*"),$debug=0,$cache=false) {

		$sql ="";
		$sql_where="";
		$sql_group_by="";
		$aggregate_functions_array = array();
		foreach($group_by_islem as $d=>$deg){
			$aggregate_functions_array[]=$d.'('.$deg.') '.$d;
		}
		$aggregate_functions=implode(',',$aggregate_functions_array);
		
		if($sql_group_by=="" && !is_array($sql_group_by))
			$sql="select ".$aggregate_functions." from ".$tablename;
		else
			$sql="select ".implode(',',$sql_group_by).",".$aggregate_functions."  from ".$tablename;
		

		if(is_array($where_field) and count($where_field)>0){
			$where =array();
			foreach($where_field as $k=>$v){
				$where[]=$k."=".$db->Param($k);
			}
			$sql_where = " where ".implode(" and ",$where);
		}

		if(is_array($group_by) and count($group_by)>0)
			$sql_group_by= " group by ".implode(",",$group_by);

		if(is_array($sorting) and count($sorting)>0)
			$sql_order= " order by ".implode(",",$sorting);
		elseif($sorting)
			$sql_order= " order by $sorting";

		$sql .=$sql_where ." " .$group_by." " .$sql_order;
		
		if($debug==1){pre($sql,10,"Select SQL");pre($where_field,10,"Selected DATA");pre($group_by);}
		
		return $cache?$db->CacheGetAll(300,$sql,$where_field):$db->GetAll($sql,$where_field);
			
	}
	
	
	
	
	
	/**
	 * tablodan hýzlý bir þekilde count alma, yada belli kriterlere göre row çekme için kullnýlýr
	 *
	 * $tablename:DS_MALZEME,
	 * $where_field:array("ORG_TIP"=>'OYYS',"ORG_TIP_KODU"=>"0000740007")
	 * $sorting:sýralama yapýlacak alan, array(malzeme_kodu,org_tip)
	 * $return_count:geri count mu döndürsün yoksa, row mu?
	 */
	function selectData($db,$tablename,$where_field,$sorting='',$return_count=false,$debug=0) {

		$sql ="";
		$sql_where="";
		$sql_order="";
		if($return_count)
			$sql="select count(*) COUNT from ".$tablename;
		else
			$sql="select * from ".$tablename;

		if(is_array($where_field) and count($where_field)>0){
			$where =array();
			foreach($where_field as $k=>$v){
				$where[]=$k."=".$db->Param($k);
			}
			$sql_where = " where ".implode(" and ",$where);
		}

		if(is_array($sorting) and count($sorting)>0)
			$sql_order= " order by ".implode(",",$sorting);
		elseif($sorting)
			$sql_order= " order by $sorting";

		$sql .=$sql_where ." " .$sql_order;

		//pre($sql);pre($where_field);

		if($debug==1){pre($sql,10,"Select SQL");pre($where_field,10,"Selected DATA");}

		if($return_count){
			return $db->GetRow($sql,$where_field);
		}else{
			return $db->GetAll($sql,$where_field);
		}
	}

	/**
	 * genel güncelleme fonksiyonu
	 * 
	 * tek satýrlýk ve çok satýrlý veriler için kullanýlabilinir.
	 * 
	 * array("ufield1"=>data1,"ufield2"=>data2,"+udata"=>data3,"wfield3"=>data4)
	 */
	function veriGuncelle($db,$tablename,$veri,$debug=0){

		if(!is_array($veri) || count($veri)==0) return true;

		$veri0=array();
		if($veri0["uDEG_TARIHI"]===null) $veri0["uDEG_TARIHI"]=date("Y-m-d");
		if($veri0["uDEG_SAATI"]===null) $veri0["uDEG_SAATI"]=date("H:i:s");
		if($veri0["uSIZ"]===null) $veri0["uSIZ"]=time();
		
		if(is_array($veri[0])){
			for($i=0,$c=count($veri);$i<$c;$i++){
				$veri[$i]=array_merge($veri0,$veri[$i]);
			}
		}else{
				$veri=array_merge($veri0,$veri);			
		}
		$time=time();
		$default_alanlar=array();
		
		$default_alanlar=$this->checkDeafultValues(is_array($veri[0])?$veri[0]:$veri);

		if(strpos($tablename,"GSV_")!==false){
			pre("HATA! View içinden veri güncellemeye çalýþmaktasýnýz!");
			return "false";
		}

		$_veri = is_array($veri[0])?$veri[0]:$veri;

		$sql="update  ".$tablename." set ";
		$veri2=array();
		$tmpWhere=array();
		foreach($_veri as $key=>$value){
			$s=substr($key,0,1);
			if($s=="w"){
				$tmp_key=substr($key,1);
				$tmpWhere[]=$tmp_key."=".$db->Param($key);
			}else{
				$tmp_key=($s=="+" || $s=="-")?substr($key,2):substr($key,1);
				$c=($s=="+" || $s=="-")?$tmp_key.$s:"";

				$tmpArr[]=$tmp_key."=".$c.($value=='default'?'default':$db->Param($key));
			}				
		}
		$veri2=$veri;
		
		$update=implode(",",$tmpArr);

		$sql.=$update;
		if(count($tmpWhere)>0){
			$where=" where ";
			$where.=implode(" and ",$tmpWhere);
			$sql .=$where;
		}
		//pre($veri2);
		if($debug==1){pre($sql,"Updated SQL");pre($veri2,"Updated DATA");}//die;
		return $db->Execute($sql,$veri2);

	}

	/**
	 * veri silme
	 * array("wfield3"=>data4)
	 */
	function veriSil($db,$tablename,$veri,$debug=0){

		if(!is_array($veri) || count($veri)==0) return true;
		$veri0=array();

		if(strpos($tablename,"GSV_")!==false){
			pre("HATA! View içinden veri güncellemeye çalýþmaktasýnýz!");
			return "false";
		}

		$sql="delete from ".$tablename;
		$veri2=array();
		$tmpWhere=array();
		$row=$veri[0]?$veri[0]:$veri;
		foreach($row as $key=>$value){
			$s=substr($key,0,1);
			if($s=="w"){
				$key=substr($key,1);
				$tmpWhere[]=$key."=".$db->Param($key);
				//$veri2[$key]=$value;
			}
		}

		if(count($tmpWhere)>0){
			$where=" where ";
			$where.=implode(" and ",$tmpWhere);
			$sql .=$where;
		}else
			return false;//bütün tabloyu silme ihtimaline karþý önlem

		if($debug==1){pre($sql,"Delete SQL");pre($veri,"Deleted DATA");}//die;
		return $db->Execute($sql,$veri);
	}

	function alSayfaAdi(){
		$dizi=explode('/',$_SERVER[REQUEST_URI]);
		$dizi_dosyaadi=explode('.',$dizi[count($dizi)-1]);

		return strToUpper($dizi_dosyaadi[0]);
	}

	function checkEmail($email) {
	// checks proper syntax
	 if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/" , $email)) {
	 	if(WINDOWS) return true;//window ta bu fonksiyon çalýþmýyormuþ
	  // gets domain name
	  list($username,$domain)=split('@',$email);
	  // checks for if MX records in the DNS
	  if(!checkdnsrr($domain, 'MX')) {
	   return false;
	  }
	  return true;
	  // attempts a socket connection to mail server
	  if(!fsockopen($domain,25,$errno,$errstr,30)) {
	   return false;
	  }
	  return true;
	 }
	 return false;
	}
	
	/**
	 * Null kontrolü yapar
	 *
	 * @param string $text
	 * @return boolean
	 */
	function kontrol_not_null($veri){
		return strlen($veri)==0?0:1;
	}
	
	/**
	 * veri uzunluðunu kontrol eder
	 *
	 * @param string $veri
	 * @return boolean
	 */
	function kontrol_max_length($veri,$uzunluk){
		return strlen($veri)>$uzunluk?0:1;
	}
		
	/**
	 * tip kontolü
	 * 
	 *  ctype_digit() -- Check for numeric character(s)	 
		is_bool() 
		is_null() 
		is_float() --27.25
		is_int() 
		is_string() 
		is_object() 
		is_array() 
	 *
	 * @param string $veri
	 * @param string $tip
	 * @return boolean
	 */
	function veriTipiKontrol($veri,$tip){
		if($tip=="digit")
			return ctype_digit($veri);
		elseif($tip=="bool")
			return is_bool($veri);
		elseif($tip=="null")
			return is_null($veri);
		elseif($tip=="float")
			return is_float($veri);			
		elseif($tip=="int")
			return is_int($veri);
		elseif($tip=="string")
			return is_string($veri);			
		elseif($tip=="object")
			return is_object($veri);			
		elseif($tip=="array")
			return is_array($veri);				
		
		return "HATA";
	}
		
	function diskeKaydet($filename,$content,$path=''){			
		//pre($content);
		//$mypath="testdir\\subdir\\test";
		//mkdir($path,0777,TRUE);

		/*if($path){
			$filename = $path.'\\'.$filename;	
		}*/
		$filename=sYM.$filename;
		$handle = fopen($filename,"w");
		//$content = "\xEF\xBB\xBF".$content;
		fwrite($handle,$content);
		echo "$filename dosyasý kaydedildi..<br>";
		fclose($handle);
				 
	}

	/**
	 * sayfalama iþlemi yapar
	 *
	 * @param int $p - aktif sayfa
	 * @param string $url
	 * @param int $sayfada_gosterilecek_kayit
	 * @param int $toplam_kayit
	 * @return string
	 */
	function taslakNavigatorGenel($p=0,$url,$sayfada_gosterilecek_kayit=20,$toplam_kayit=0) {
	
		$t=$toplam_kayit;
		$pl=$sayfada_gosterilecek_kayit;
		
		if($toplam_kayit<=$sayfada_gosterilecek_kayit)
			return "";
		
		$toplam_sayfa=ceil($t/$pl);//yukari yuvarla
	
		//önceki kayit : (0+10-1)%10
		$onceki=($p+$toplam_sayfa-1)%$toplam_sayfa;
		//sonraki:(9+10+1)%10
		$sonraki=($p+$toplam_sayfa+1)%$toplam_sayfa;
	
		if($toplam_sayfa<10){//10 dan küçük ise 1 den 10 a kadar yaz, büyükse 5 öncesi 5 sonrasi geri kalan nokta nokta .. olsun
			$n='';
			for($i=0;$i<$toplam_sayfa;$i++){
				$n.='<div id="vli_nav_td"><a href="'.$url.'&p='.$i.'">'.($p==$i?'<b>'.($i+1).'</b>':($i+1)).'</a></div>';
			}
		}else{
			if($p<5) {$po=0;$n='';$l=15;$n_bas='';$n_son='<div id="vli_nav_td">...</div>';}
			else{$po=$p-5;$l=$po+15;$n_bas='<div id="vli_nav_td">...</div>';$n_son='<div id="vli_nav_td">...</div>';}
			for($po;$po<$l;$po++){
				$n.='<div id="vli_nav_td"><a href="'.$url.'&p='.$po.'">'.($p==$po?'<b>'.($po+1).'</b>':($po+1)).'</a></div>';		
			}
			$n=$n_bas.$n.$n_son;
		}
		$sonuc_text = 
			'<table width="100%" border="0" cellspacing="0" cellpadding="0" class="vli_nav_tbl"><tr><td align="center"><table border="0" cellspacing="0" cellpadding="0"><tr><td><div id="vli_nav">
					<div id="vli_nav_td"><a href="'.$url.'&p=0"><img src="'.$this->resim.'nav/ilk.png" border="0"/></a></div>
					<div id="vli_nav_td"><a href="'.$url.'&p='.$onceki.'"><img src="'.$this->resim.'nav/onceki.png" border="0"/></a></div>';
	
		$sonuc_text .= $n;
		
		$sonuc_text .= 
				'<div id="vli_nav_td"><a href="'.$url.'&p='.$sonraki.'"><img src="'.$this->resim.'nav/sonraki.png" border="0"/></a></div>
				<div id="vli_nav_td"><a href="'.$url.'&p='.($toplam_sayfa-1).'"><img src="'.$this->resim.'nav/son.png" border="0"/></a></div>
			</td></tr></table></td></tr></table></div>';				
		
		return $sonuc_text;
	}	

	function alKullaniciAdi($db,$kullanici_id){
		$veri=$this->veriAl($db,tKULLANICILAR,array('KULLANICI_ADI'),array('ID'=>$kullanici_id),'',0);
		return $veri[0][KULLANICI_ADI];
	}	

	function alKategoriAdi($db,$kategori_id){
		$veri=$this->veriAl($db,tKATEGORI,array('KATEGORI_ADI'),array('ID'=>$kategori_id),'',0);
		return $veri[0][KATEGORI_ADI];
	}	

	function alEtiket($etiketler,$url){
		$etArr=$etiketler?explode(',',$etiketler):null;
		$e=array();		
		for($i=0,$c=count($etArr);$i<$c;$i++)
			$e[]='<a href="'.$url.'&etiket_adi='.$etArr[$i].'">'.$etArr[$i].'</a>';
		
		return count($etArr)>0?implode(', ',$e):'-';
	}	
				
}


function emailGonder($kime,$konu,$icerik,$kimden="",$kime_adi=""){

	$From = $kimden?$kimden:SAHIP_EMAIL;
	$FromName = $kimden?$kimden:SAHIP_ADI;
	$To=$kime?$kime:SAHIP_EMAIL;
	$ToName = $kime_adi?$kime_adi:$kime;
	
	$Subject = $konu;
	
	$bilgi  = $icerik;
	
	$bilgi .="<br><br>";
	$bilgi .="<hr><u>Ýrtibat Bilgilerimiz:</u>";
	$bilgi .="<br>";
	$bilgi .="<br>".TITLE; 
	$bilgi .="<br>".SAHIP_ADI; 
	$bilgi .="<br>"."Adres: ".SAHIP_ADRES; 
	$bilgi .="<br>"."Email: ".SAHIP_EMAIL; 
	$bilgi .="<br>"."Tel: ".SAHIP_TEL1;
	$bilgi .="<br>"."Fax: ".SAHIP_FAX;  
	$bilgi .="<br>"."Gsm: ".SAHIP_CEP;  
				
	//mesaj at
	
	phpmailer($From,$FromName,$To,$ToName,$Subject,SAHIP_ADI." sitesinden bilgi mesajý gönderildi.",$bilgi,'','');
					
}

function pre($data,$title=""){

	echo '<font style="font-family:tahoma;color:green">'.($title?($title.'<br>'):'').'<br>==================<br>';
	print "<pre>";
	print_r($data);
	print "</pre>";
	echo '<br>==================<br></font>';
}
		



?>