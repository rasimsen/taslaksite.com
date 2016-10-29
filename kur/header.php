<?php
set_time_limit(120);

function pre($data){

	echo '<font style="font-family:tahoma;color:green"><br>==================<br>';
	print "<pre>";
	print_r($data);
	print "</pre>";
	echo '<br>==================<br></font>';
}

include_once('installer_lang.php');


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>

	<link rel="stylesheet" type="text/css" href="fraxi.css" media="screen" />

	<meta name="Robots" content="none" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<META HTTP-EQUIV="content-language" CONTENT="TR">
	
	<title>TaslakSite &#304;YS <?php print $lang['installer'] ?></title>
	<link rel="icon" href="../favicon.ico" type="image/x-icon"/>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="128"><img src="ts_logo.png" border="0" alt="TaslakSite iYS" title="TaslakSite.com Kurulum Sihirbaz&#305;"/></td>
    <td align="center"><h2 style="text-align:center">TaslakSite  &#304;YS Kurulum Sihirbaz&#305;</h2></td>
    <td width="128"><img src="ts_logo.png" border="0" alt="TaslakSite iYS" title="TaslakSite.com Kurulum Sihirbazi"/></td>
  </tr>
  <tr style="background-image:url(tap_um_bg.gif); background-repeat:repeat-x;">
    <td height="30"></td>
    <td alignh="center"></td>
    <td height="20"></td>
  </tr>
</table>

<?php 
//include("menu.php");
print '
<br style="clear:both;" />
<div id="body-contents">
	<div id="wrapper">
		<div class="main">
			<div class="bluernddbox">
				<div class="bluerndcontent">
					<div class="instructions">';

?>
<script>
function Set_Cookie( name, value, expires, path, domain, secure )
{
var today = new Date();
today.setTime( today.getTime() );

if ( expires )
    expires = expires * 1000 * 60 * 60 * 24;
var expires_date = new Date( today.getTime() + (expires) );

document.cookie = name + "=" +escape( value ) +
( ( expires ) ? ";expires=" + expires_date.toGMTString() : "" ) +
( ( path )    ? ";path=" + path : "" ) +
( ( domain )  ? ";domain=" + domain : "" ) +
( ( secure )  ? ";secure" : "" );
}
</script>
