{config_load file="genel.conf"}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{$tTITLE}</title>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1254">
<meta http-equiv="content-language" content="TR">
<meta http-equiv="Copyright" content="Copyright © 2004-{$smarty.now|date_format:"%Y"} {$tSAHIP_ADI}">

<meta name="keywords" content="{$tKEYWORDS}">
<meta name="description" content="{$tDESCRIPTION}">
<meta name="Abstract" content="{$tDESCRIPTION}">
<meta name="coverage" content="Worldwide">
<meta name="revisit-after" content="5 days">
<meta name="robots" content="all, index, follow">
<meta name="author" content="Rasim ŞEN">
<meta name="rating" content="General">
<meta name="search enginee" content="top">

<link href="{$stil}" rel="stylesheet" type="text/css" />
<script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="sAraclar/Slideshow/css/slideshow.css" media="screen" />
<script type="text/javascript" src="sAraclar/Slideshow/js/mootools.js"></script>
<script type="text/javascript" src="sAraclar/Slideshow/js/slideshow.js"></script>
</head>
<body><div id="masterconbin"><div id="topmenu">
      <div class="searchbin">{if in_array(20,explode("_",DEF_AKTIF_LINK_KUTULARI)) } {include file="kutu_uye_girisi.tpl"}{/if}</div>
      <ul>
        <li class="user">Üye: <a href="uye.php">Üye Girişi</a> / <a href="uyeol.php">Üye Ol</a></li>
      </ul>
    </div>
<div id="headerbin">
    <div id="logo"><a href="index.php"><img src="{$resim}ts_logo.png" alt="{$tTITLE}"></a></div>
    <div id="navbin">
      <ul class="topnav">
        {include file="menu_ust.tpl"}
      </ul>
    </div>
  </div>
<div id="conbinshadow">
	<div id="conbin">
  		<div>{if in_array(18,explode("_",DEF_AKTIF_LINK_KUTULARI)) } <p><br />{include file="kutu_hizli_arama.tpl"}</p>{/if}</div>
    