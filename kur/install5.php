<?php
if (!$step) { header('Location: ./install.php'); die(); }
echo '<div class="instructions">';

if(strlen($_REQUEST["EMAIL"])<3 || strpos($_REQUEST["EMAIL"],"@")===false)
		$hata.="<br>Lütfen email adresinizi kontrol ediniz!";
		
// Check user input here
if (!$_POST['godlogin'] ||
    !$_POST['godpassword'] ||
    !$_POST['godemail'] ||
	strpos($_POST['godemail'],"@")===false)
    	$errors[] = $lang['Error5-1'];
elseif ($_POST['godpassword'] != $_POST['godpassword2'])
    	$errors[] = $lang['Error5-2'];

include_once '../sInc/ayarlar.sen.php';

	$dbuser = $kullanici;
	$dbpass = $sifre;
	$dbname = $veritabani;
	$dbhost = $host;

	if($conn = @mysql_connect($dbhost,$dbuser,$dbpass))
	 {
		$db_selected = mysql_select_db($dbname, $conn);
		if (!$db_selected) { die ('Hata: '.$dbname.' : '.mysql_error()); }
		define('table_prefix', $_POST['tableprefix']);

		echo "<p><strong>Y&ouml;netici hesab&#305; olu&#351;turuluyor...</strong></p>";
		$userip=$_SERVER['REMOTE_ADDR'];
		$saltedpass=md5($_POST['godpassword']);//generateHash($_POST['godpassword']);
	
		$sql = "delete from ".table_prefix."kullanicilar where EMAIL = '".$_POST['godemail']."'";
		mysql_query( $sql, $conn );

		$sql = "insert into ".table_prefix."kullanicilar(KULLANICI_ADI,SIFRE,DURUM,AD,EMAIL,TIP,IP) 
		values('".$_POST['godlogin']."','".$saltedpass."','1','YONETICI','".$_POST['godemail']."','YONETICI','".$userip."')";

		mysql_query( $sql, $conn );

		//done
		echo "<p><strong>Y&ouml;netici hesab&#305; olu&#351;turuldu...</strong></p><br />";
		
		$output='<table border=0><tr><td style="border:1px solid red;"><p><strong>L&uuml;tfen a&#351;a&#287;&#305;daki bilgileri not ediniz, eger hatal&#305; ise bir &ouml;nceki ad&#305;ma gidip yeniden olu&#351;turunuz:</strong></p>';
		$output='<p>Y&ouml;netici Kullan&#305;c&#305; ad&#305;:<b>'.$_POST['godlogin'].'</b><br>
			Y&ouml;netici &#350;ifre:<b>'.$_POST['godpassword'].'</b><br>
			Y&ouml;netici Email:<b>'.$_POST['godemail'].'</b>
		</p></td></tr></table>';

		
		$output.='<p><strong>' . $lang['InstallSuccess'] . '</strong></p>
		<br /><h2>' . $lang['WhatToDo'] . '</h2><br/>
		<div class="donext"><ol>
			' . $lang['WhatToDoList'] . '
		</ol></div>
		<br /><h2>' . $lang['FinalLinks'] . '</h2><br/>
		<div class="donext"><ol>
			' . $lang['FinalLinksList'] . '
		</ol></div>
		
		';
		
}

if (isset($errors)) {
	$output=DisplayErrors($errors);
	$output.='<p>' . $lang['Errors'] . '</p>';
}

echo $output;
echo '</div>';

?>
