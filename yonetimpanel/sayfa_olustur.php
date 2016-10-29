<?php
//admin
require_once("sInc/admin_uygulama.php");

$s=$_REQUEST['s'];

//login ise buraya gir, deÃ°ilse login e git
$sen=new sSayfa();

require_once("sInc/link_kutulari.php");


/**
* #####################################
* ########### tablo listesini al ######
* #####################################
*/
$conn = mysql_connect($host, $kullanici, $sifre);
if (!$conn) {
	die('Could not connect: ' . mysql_error());
}


$sql = "SHOW TABLES FROM $veritabani";
$result = mysql_query($sql);

if (!$result) {
	echo "DB Error, could not list tables\n";
	echo 'MySQL Error: ' . mysql_error();
	exit;
}

$tablolar=array();
while ($row = mysql_fetch_row($result)) {
	$tablolar[$row[0]]=$row[0];
}


//######################
class MySqlFields{
	/*
					$alan[]=array(
								 	"blob"=>$yn,
									"blob_value"=>$meta->blob,
								 	"max_length"=>$meta->max_length,
									"multiple_key"=>$meta->multiple_key,
								 	"name"=>$meta->name,
									"not_null"=>$meta->not_null,
									"numeric"=>$meta->numeric,
									"primary_key"=>$meta->primary_key,
								 	"table"=>$meta->table,
								 	"field_type"=>$meta->type,
								 	"type"=>$field2form[$meta->type],
								 	"def"=>$meta->def,
									"unique_key"=>$meta->unique_key,
									"unsigned"=>$meta->unsigned,
									"zerofill"=>$meta->zerofill,
									"yn"=>$yn,
									"ftype"=>$form_tipi,
									"sira"=>$i,
									"frm_class"=>"tdata",
									"frm_readonly"=>0,
									"frm_disabled"=>0,
									"frm_onblur"=>($meta->primary_key||$meta->not_null||$meta->unique_key)?"frm_onblur(this)":'',
									"frm_onfocus"=>'',
									"frm_onkeypress"=>'',
									"frm_onkeyup"=>'',
									"frm_show_hide"=>1
								 );
	
	*/
	function getBlob($deger){
		if($deger==0)
			return false;
		else 
			return true;	
	}

}





switch($s){

case 1://tablo Ã¶zellikleri ekrana getirilir..
		// tablo seÃ§ildi ise
		if($_POST["tablo_ismi"]){
			mysql_select_db($veritabani);
			$result = mysql_query('select * from '.$_POST["tablo_ismi"].' ');
		
			if (!$result) {
				die('Sorguda Hata: ' . mysql_error());
			}
		
			/* get column metadata */
			$i = 0;
			$alan=array();
			//field tiplerinin forma yansÄ±tÄ±lmasÄ±
			$field_type=array(
							  "varchar"=>"varchar",
							  "tinyint"=>"tinyint",
							  "text"=>"text",
							  "date"=>"date",
							  "smallint"=>"smallint",
							  "mediumint"=>"mediumint",
							  "int"=>"int",
							  "bigint"=>"bigint",
							  "float"=>"float",
							  "double"=>"double",
							  "decimal"=>"decimal",
							  "datetime"=>"datetime",
							  "timestamp"=>"timestamp",
							  "time"=>"time",
							  "year"=>"year",
							  "char"=>"char",
							  "tinyblob"=>"tinyblob",
							  "tinytext"=>"tinytext",
							  "blob"=>"blob",
							  "mediumblob"=>"mediumblob",
							  "mediumtext"=>"mediumtext",
							  "longblob"=>"longblob",
							  "longtext"=>"longtext",
							  "enum"=>"enum",
							  "set"=>"set",
							  "bool"=>"bool",
							  "binary"=>"binary",
							  "varbinary"=>"varbinary"
							  );
			// field to form
			$field2form=array(
							  "varchar"=>"rtext",
							  "tinyint"=>"rnumber",
							  "text"=>"rtext",
							  "string"=>"rtext",
							  "date"=>"rtarih",
							  "smallint"=>"rnumber",
							  "mediumint"=>"rnumber",
							  "int"=>"rnumber",
							  "bigint"=>"rnumber",
							  "float"=>"rnumber_virgullu",
							  "double"=>"rnumber_virgullu",
							  "decimal"=>"rnumber_virgullu",
							  "datetime"=>"rtarihsaat",
							  "timestamp"=>"rtarihsaat",
							  "time"=>"rsaat",
							  "year"=>"rtext",
							  "char"=>"rtext",
							  "tinyblob"=>"rtextarea",
							  "tinytext"=>"rtext",
							  "blob"=>"rtextarea",
							  "mediumblob"=>"rtextarea",
							  "mediumtext"=>"rtextarea",
							  "longblob"=>"rtextarea",
							  "longtext"=>"rtextarea",
							  "enum"=>"rradio",
							  "set"=>"rset",
							  "bool"=>"bool",
							  "binary"=>"binary",
							  "varbinary"=>"varbinary"
							  );
							  
			//form tipi
			$form_tipi=array(
							"text"=>"text",
							"button"=>"button",
							"checkbox"=>"checkbox",
							"file"=>"file",
							"hidden"=>"hidden",
							"image"=>"image",
							"combobox"=>"combobox",
							"listbox"=>"listbox",
							"textarea"=>"textarea",
							"password"=>"password",
							"radio"=>"radio",
							"reset"=>"reset",
							"submit"=>"submit",
							"rtarih"=>"Tarih Objesi",
							"rsaat"=>"Saat Objesi",
							"rtarihsaat"=>"Tarih Saat Objesi",
							"remail"=>"Email Objesi",
							"rpara"=>"Para Birimi Objesi",
							"rnumber"=>"Sayý Kontrolü",
							"rnumber_virgullu"=>"Virgüllü Sayý",
							"rtext"=>"Text Objesi",
							"rradio"=>"Radio(Tekli Seçim)",
							"rcheckbox"=>"CheckBox(Çoklu Seçim)",
							"rtextarea"=>"Textarea Objesi",
							"rta_adres"=>"Adres Objesi",
							"rta_255"=>"Text Area 255 kar.",
							"rta_fck"=>"FCK Editor",
							"ril"=>"Ýller Objesi",
							"rilce"=>"Ýlçeler Objesi",
							"rulke"=>"Ülkeler Objesi",
							"rcinsiyet"=>"Cinsiyet Objesi",
							"rmeslek"=>"Meslek Objesi",
							"regitim"=>"Eðitim Objesi"
							);				  
			// yes/no alanlar
			$yn=array(0=>"HAYIR",1=>"EVET");
			
			while ($i < mysql_num_fields($result)) {
					$meta = mysql_fetch_field($result, $i);
					if (!$meta) {
						echo "No information available<br />\n";
					}
					$i++;
					$alan[]=array(
								 	"blob"=>$yn,
									"blob_value"=>$meta->blob,
								 	"max_length"=>$meta->max_length,
									"multiple_key"=>$meta->multiple_key,
								 	"name"=>$meta->name,
									"not_null"=>$meta->not_null,
									"numeric"=>$meta->numeric,
									"primary_key"=>$meta->primary_key,
								 	"table"=>$meta->table,
								 	"field_type"=>$meta->type,
								 	"type"=>$field2form[$meta->type],
								 	"def"=>$meta->def,
									"unique_key"=>$meta->unique_key,
									"unsigned"=>$meta->unsigned,
									"zerofill"=>$meta->zerofill,
									"yn"=>$yn,
									"ftype"=>$form_tipi,
									"sira"=>$i,
									"frm_class"=>"tdata",
									"frm_readonly"=>0,
									"frm_disabled"=>0,
									"frm_onblur"=>($meta->primary_key||$meta->not_null||$meta->unique_key)?"frm_onblur(this)":'',
									"frm_onfocus"=>'',
									"frm_onkeypress"=>'',
									"frm_onkeyup"=>'',
									"frm_show_hide"=>1
								 );
			}//end:while
			//pre($alan);		    
			$sen->smarty->assign('s',2);
			$sen->smarty->assign('il',$alan);
			$sen->smarty->assign('tablo_ismi',$tablo_ismi);
			
			$sen->sYaz("admin_sayfa_olusturma_tablo_ozellikleri.tpl");
			break;
		}
		pre("HATA");
		break;

//sayfalar oluÅŸturulur..
case 2:
	if($_POST["btnSayfaOlustur"]){
		//pre($_POST);
		pre("==================================================");
		foreach($_POST as $key=>$value){
			pre($key."==>".$value);		
		}
		
		die("kaydetme scripti");
	}

	break;
case 3:
	break;
case 4:
	break;

default://login ekranÃ½ veya yÃ¶netim ekranÃ½

	//pre($tablolar);
	$sen->smarty->assign('tablo_listesi',$tablolar);

	$sen->sYaz("admin_sayfa_olustur.tpl");
	break;

mysql_free_result($result);

}

?>
