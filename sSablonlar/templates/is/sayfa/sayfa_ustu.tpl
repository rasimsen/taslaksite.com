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
<body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0 ><center><div id="sayfa">
<table cellpadding="0" cellspacing="0" class="sayfa">
	<tr><td><h1 style="padding-left:10px;"><span  onclick="javascript:location.href='index.php';" style="cursor:pointer">{$tSITE_ADI}</span></h1></td></tr>
    <tr><td><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="780" height="258">
                <param name=movie value="{$resim}lsa.swf">
                <param name=quality value=high>
                <embed src="{$resim}lsa.swf" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="780" height="258">
                </embed> 
    </object></td></tr>
    <tr><td height="5px"></td></tr>
    <tr><td height=31 background="{$resim}03.jpg" style="background-repeat:no-repeat; background-position:center"><div>{if in_array(18,explode("_",DEF_AKTIF_LINK_KUTULARI)) } {include file="kutu_hizli_arama.tpl"}{/if}</div></td></tr>
<tr><td><table cellpadding="0" cellspacing="10" width="100%"><tr><td valign="top"class="sayfa_ortasi">