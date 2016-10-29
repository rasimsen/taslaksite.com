{config_load file="genel.conf"}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{$tTITLE}</title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-9">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1254">
<META HTTP-EQUIV="content-language" CONTENT="TR">
<META HTTP-EQUIV="Copyright" CONTENT="Copyright © 2004-{$smarty.now|date_format:"%Y"} {$tSAHIP_ADI}">
<META NAME="Abstract" CONTENT="{$tDESCRIPTION}">
<META NAME="description" CONTENT="{$tDESCRIPTION}">
<META NAME="keywords" CONTENT="{$tKEYWORDS}">
<META content=Global name=distribution>
<META content="all, index, follow" name=robots>
<META content=General name=rating>
<META content="1 days" name=revisit-after>
<META content=top name="search engine">
<link href="{$stil}" rel="stylesheet" type="text/css" />
<script src="script.js"></script>
<link rel="stylesheet" type="text/css" href="sAraclar/Slideshow/css/slideshow.css" media="screen" />
<script type="text/javascript" src="sAraclar/Slideshow/js/mootools.js"></script>
<script type="text/javascript" src="sAraclar/Slideshow/js/slideshow.js"></script>
</head>
<body>
<div id="sayfa_ustu" style="width:100%;">
  <div style="text-align:right;">{if in_array(20,explode("_",DEF_AKTIF_LINK_KUTULARI)) } {include file="kutu_uye_girisi.tpl"}{/if}</div>
  <div>
    <h1 style="padding-left:10px;"><span  onclick="javascript:location.href='index.php';" style="cursor:pointer">{$tSITE_ADI}</span></h1>
  </div>
  <div id="ust_menu">
    <div style="width:10px; float:left;">&nbsp;</div>{include file="menu_ust.tpl"}<div id="ust_menu_alti">&nbsp;</div>
  </div>
  <br clear="all" /><br clear="all" />
  <div>{if in_array(18,explode("_",DEF_AKTIF_LINK_KUTULARI)) } {include file="kutu_hizli_arama.tpl"}{/if}</div>
</div>
