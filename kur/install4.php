<?php
if (!$step) { header('Location: ./install.php'); die(); }
echo '<div class="instructions">';

include_once '../sInc/ayarlar.sen.php';

if (!$errors) {

	$dbuser = $kullanici;
	$dbpass = $sifre;
	$dbname = $veritabani;
	$dbhost = $host;

	if($conn = @mysql_connect($dbhost,$dbuser,$dbpass))
	 {
		$db_selected = mysql_select_db($dbname, $conn);
		if (!$db_selected) { die ('Hata: '.$dbname.' : '.mysql_error()); }
		define('table_prefix', $_POST['tableprefix']);

		echo '<p>' . $lang['CreatingTables'] . '</p>';

		include_once("installtables.php");
		if (taslaksite_createtables($conn) == 1) { echo "<p>" . $lang['TablesGood'] . "</p>"; }
		else { $errors[] = $lang['Error3-1']; }
	}
	else { $errors[] = $lang['Error3-2']; }
}


if (!$errors) {

	$output='<div class="instructions"><p>' . $lang['EnterGod'] . '</p>
	<table>
	<form id="form1" name="form1" action="install.php" method="post">
	<tr>
	<td><label>' . $lang['GodLogin'] . '</label></td>
	<td><input name="godlogin" type="text" value="" /></td>
	</tr>

        <tr>
	<td><label>' . $lang['GodPassword'] . '</label></td>
	<td><input name="godpassword" type="password" value="" /></td>
        </tr>

	<tr>
        <td><label>' . $lang['ConfirmPassword'] . '</label></td>
	<td><input name="godpassword2" type="password" value="" /></td>
	</tr>

	<tr>
	<td><label>' . $lang['GodEmail'] . '</label></td>
        <td><input name="godemail" type="text" value="" /></td>
	</tr>

	<tr>
        <td><label></label></td>
	<td><input type="submit" class="submitbutton" name="Submit" value="' . $lang['CreateAdmin'] . '" /></td>
	</tr>
        <input type="hidden" name="language" value="' . $_REQUEST['language'] . '">
        <input type="hidden" name="tableprefix" value="' . $_REQUEST['tableprefix'] . '">
	  <input type="hidden" name="SiteName" value="' . $_REQUEST['SiteName'] . '">
	<input type="hidden" name="step" value="5">
	</form>
        </table>
	</div>
	';
}

if (isset($errors)) {
	$output=DisplayErrors($errors);
	$output.='<p>' . $lang['Errors'] . '</p>';
}
/*
if(function_exists("gd_info")) {}
else {
$config = new pliggconfig;
$config->var_id = 60;
$config->var_value = "false";
$config->store();
$config->var_id = 69;
$config->var_value = "false";
$config->store();
}
*/

echo $output;
echo '</div>';

?>
