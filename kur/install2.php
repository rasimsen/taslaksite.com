<?php
if (!$step) { header('Location: ./install.php'); die(); }

$file='../sInc/ayarlar.sen.php';
if (!file_exists($file)) { $errors[]="$file " . $lang['NotFound'] ; }
elseif (filesize($file) <= 0) { $errors[]="$file " . $lang['ZeroBytes'] ; }

if (!$errors) {

	$siteRootAddressArr = explode("kur",$_SERVER["SCRIPT_FILENAME"]);
	$siteRootAddress = $siteRootAddressArr[0];

	if (empty($_SERVER['SCRIPT_URI'])) {
   		$_SERVER['SCRIPT_URI'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	}

	$siteURLArr = explode("kur",$_SERVER["SCRIPT_URI"]);
	$siteURL = $siteURLArr[0];


$output='


<script>
	function beforeSubmitControl(){

		obj=document.getElementById("form1");
		HATA="";
		if(obj.SiteRootAddress.value==null || obj.SiteRootAddress.value == "")
			HATA="\nSite Kok Adres";

		if(obj.SiteURL.value==null || obj.SiteURL.value == "")
			HATA+="\nSite URL";

		if(obj.dbhost.value==null || obj.dbhost.value == "")
			HATA+="\nVeritabani Server Adi";

		if(obj.dbname.value==null || obj.dbname.value == "")
			HATA+="\nVeritabani adi";

		if(obj.dbuser.value==null || obj.dbuser.value == "")
			HATA+="\nVeritabani Kullanici Adi";

		if(HATA != ""){
			alert("Lutfen Dikkat\n"+"================================"+HATA+"\n================================"+"\nbilgilerini bos birakmayiniz!");
			return false;
		}else{
			return true;
		}
	}
</script>

<div class="instructions"><p>' . $lang['EnterSiteInfo'] . '</p>
<form id="form1" name="form1" action="install.php" method="post" OnSubmit="javascript:return beforeSubmitControl();">

<table>

<tr>
<td width="200"><label>' . $lang['SiteRootAddress'] . '</label></td>
<td><input name="SiteRootAddress" type="text" value="'.$siteRootAddress.'" size="36" maxlength="64" /></td>
</tr>

<tr>
<td><label>' . $lang['SiteURL'] . '</label></td>
<td><input name="SiteURL" type="text" value="'.$siteURL.'" size="36" maxlength="64" 	 /></td>
</tr>

<tr>
<td><label>' . $lang['SiteName'] . '</label></td>
<td><input name="SiteName" type="text" value="'.$SiteName.'" size="36" maxlength="64" 	 /></td>
</tr>

</table>

<p>' . $lang['EnterMySQL'] . '</p>

<table>

<tr>
<td width="200"><label>' . $lang['DatabaseServer'] . '</label></td>
<td><input name="dbhost" type="text" value="localhost" /></td>
</tr>

<tr>
<td><label>' . $lang['DatabaseName'] . '</label></td>
<td><input name="dbname" type="text" value="" /></td>
</tr>

<tr>
<td><label>' . $lang['DatabaseUsername'] . '</label></td>
<td><input name="dbuser" type="text" value="" /></td>
</tr>

<tr>
<td><label>' . $lang['DatabasePassword'] . '</label></td>
<td><input name="dbpass" type="password" value="" /></td>
</tr>

<tr>
<td><label>' . $lang['TablePrefix'] . '</label></td>
<td><input name="tableprefix" type="text" value="taslak_" />
</tr>

<tr>
<td colspan=2>' . $lang['PrefixExample'] . '</td>
</tr>

<tr>
<td><label></label></td>
<td><input type="submit" class="submitbutton" name="Submit" value="' . $lang['CheckSettings'] . '" /></td>
</tr>
<input type="hidden" name="language" value="' . $_REQUEST['language'] . '">
<input type="hidden" name="step" value="3">
</form>
</table>
</div>
';

}
else {
	$output=DisplayErrors($errors);
	$output.='<p>' . $lang['Errors'] . '</p>';
}

echo $output;

?>
