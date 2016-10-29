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
<body><div style="display:table; width:100%;height:75%; position:#relative; /*overflow:hidden; */border:0px solid red; text-align:center;">
<table width="800" height="100%" border="0" cellspacing="0" cellpadding="0" style="vertical-align:bottom" align="center">
  <tr><td height="20px" style="text-align:center; vertical-align:top"><table  align="center" height="20px" width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid 1px #7A051D;filter:alpha(opacity=40);-moz-opacity:.50;opacity:.50; background-color:#011714">
  <tr>
    <td align="center" style="">{if in_array(20,explode("_",DEF_AKTIF_LINK_KUTULARI)) } {include file="kutu_uye_girisi.tpl"}{/if}</td>
    </tr>
</table>
</td></tr>
  <tr>
    <td height="82" valign="bottom" style="padding:0px; text-align:center; vertical-align:top;"><img src="{$resim}ts_logo.gif" alt="TaslakSite.com" height="82" /></td>
  </tr>
  <tr><td height="20px"></td></tr>
  <tr valign="top" height="38">
    <td><table width="800" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10" height="38"><img src="{$resim}ts_um_sol.gif" width="10" height="38" border="0"></td>
        <td style="background-image:url({$resim}ts_um_bg.gif); background-repeat:repeat-x; text-align:center; vertical-align:middle;"><div><a href="index.php">ANASAYFA</a>	
&nbsp;|&nbsp;<a href="arama.php">ARA</a>	
&nbsp;|&nbsp;<a href="indir.php">İNDİR</a>	
&nbsp;|&nbsp;<a href="forum.php">FORUM</a>	
&nbsp;|&nbsp;<a href="dokumantasyon.php">DÖKÜMANTASYON</a>	
&nbsp;|&nbsp;<a href="gonullu.php">GÖNÜLLÜ OL</a>	
{if !kontrolLogin()}
&nbsp;|&nbsp;<a href="uyeol.php">Üye Ol</a>
{else}
&nbsp;|&nbsp;<a href="uye.php">BİLGİLERİM</a>
{/if}
&nbsp;|&nbsp;<a href="iletisim.php">İLETİŞİM</a>	
&nbsp;|&nbsp;<a href="yardim.php">YARDIM</a></div></td>
        <td width="10" height="38"><img src="{$resim}ts_um_sag.gif" width="10" height="38"></td>
      </tr>
    </table></td>
  </tr>
  <tr><td height="25px" style="text-align:center"><table  align="center" height="25px" width="90%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:solid 1px #7A051D;border-left:solid 1px #7A051D;border-right:solid 1px #7A051D;filter:alpha(opacity=40);-moz-opacity:.50;opacity:.50; background-color:#011714">
  <tr>
    <td align="center" style=" vertical-align:middle">{if in_array(18,explode("_",DEF_AKTIF_LINK_KUTULARI)) } {include file="kutu_hizli_arama.tpl"}{/if}</td>
    </tr>
</table>
</td></tr>
  <tr><td height="10px"></td></tr>
  <tr>
    <td height="100%" style="border:solid 1px #7A051D;"><table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" style="filter:alpha(opacity=40);-moz-opacity:.50;opacity:.50; background-color:#000000"><tr><td>