<?php
if (!$step) { header('Location: ./install.php'); die(); }

$file='../sInc/ayarlar.sen.php';

if(!isset($dbuser)){

	$siteurl = $_POST['SiteURL'];
	$sitename = $_POST['SiteName'];
	$siteroot = $_POST['SiteRootAddress'];

	$dbuser = $_POST['dbuser'];
  	$dbpass = $_POST['dbpass'];
  	$dbname = $_POST['dbname'];
  	$dbhost = $_POST['dbhost'];

}

if($conn = @mysql_connect($dbhost,$dbuser,$dbpass)) {
	$output.= "<p>" . $lang['ConnectionEstab'] . "</p>\n";

	//read file
	$settings_file_read = file_get_contents('ayarlar.sen.php');//print_r ($settings_file_read);die;

	if(mysql_select_db($dbname, $conn)) {
	$output.= "<p><strong>" . $lang['FoundDb'] . "</strong></p>\n";

		if($handle = fopen($file, 'w')) {

			$str = str_replace("{TASLAKSITE_DB_HOST}",$dbhost,$settings_file_read);
			$str = str_replace("{TASLAKSITE_DB_KULLANICI_ADI}",$dbuser,$str);
			$str = str_replace("{TASLAKSITE_DB_SIFRE}",$dbpass,$str);
			$str = str_replace("{TASLAKSITE_DB_VERITABANI}",$dbname,$str);
			$str = str_replace("{TASLAKSITE_DB_TABLO_ONEK}",$_POST['tableprefix'],$str);

			$str = str_replace("{TASLAKSITE_KOK_DIZIN}",$siteroot,$str);
			$str = str_replace("{TASLAKSITE_URL}",$siteurl,$str);

			if(fwrite($handle, $str)) {
				$output.= "<p>" . $lang['dbconnect'] . "</p>\n";
				fclose($handle);
			}
			else { $errors[] = $lang['Error2-1']; }
		}
		else { $errors[] = $lang['Error2-2']; }
	}
	else { $errors[] = $lang['Error2-3']; }
}
else { $errors[] = $lang['Error2-4']; }

if($check_errors !== false){
  if (!$errors) {
  	$output.='<div class="instructions"><p>' . $lang['NoErrors'] . '</p><p>' . $lang['DbTableCreate'] . '</p>
  	<form id="form2" name="form2" method="post">
  	  <input type="hidden" name="dbuser" value="'.$_POST['dbuser'].'" />
  	  <input type="hidden" name="dbpass" value="'.$_POST['dbpass'].'" />
  	  <input type="hidden" name="dbname" value="'.$_POST['dbname'].'" />
  	  <input type="hidden" name="dbhost" value="'.$_POST['dbhost'].'" />
  	  <input type="hidden" name="tableprefix" value="'.$_POST['tableprefix'].'" />
	  <input type="hidden" name="SiteName" value="' . $_REQUEST['SiteName'] . '">
	  <input type="hidden" name="language" value="' . $_REQUEST['language'] . '">
  	  <input type="hidden" name="step" value="4">
  	  <input type="submit" class="submitbutton" name="Submit" value="' . $lang['Next'] . '" />
  	  </form></div>';
  }
  else {
    $output=DisplayErrors($errors);
    $output.='<div class="instructions"><form id="thisform">
    <input class="submitbutton" type=button onclick="window.history.go(-1)" value="' . $lang['GoBack'] . '" />
    </form></div>';
  }
  echo $output;
} else {
  header("Location: $url_install3");
}
?>
