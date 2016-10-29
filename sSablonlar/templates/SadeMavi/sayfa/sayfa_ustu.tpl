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
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td style="height:7px; background-image:url({$resim}sis_09.gif); background-repeat:repeat-x;"></td>
</tr>
<tr valign="top" style="height:29px;">
  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr style="background-image:url({$resim}sis_ut_bg.gif); background-repeat:repeat-x">
        <td style="width:196px; height:29px; background-image:url({$resim}sis_ut_sol.gif); background-repeat:no-repeat;"></td>
        <td style="background-image:url({$resim}sis_ut_bg.gif); background-repeat:repeat-x">&nbsp;</td>
        <td style="background-image:url({$resim}sis_ut_sag.gif); background-repeat:no-repeat; background-position:right; width:185px; text-align:right"></td>
      </tr>
    </table></td>
</tr>
<tr>
  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr style="vertical-align:top;">
      <td style="width:16px;"><img border="0" src="{$resim}sis_sol1.gif" /></td>
      <td rowspan="3" style="background-color:#FCFCFC; height:100%"><table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td style="background-image:url({$resim}sis_sol2.gif); background-repeat:no-repeat; width:4px; height:114px;">&nbsp;</td>
          <td style="background-image:url({$resim}sis_sol3.gif); background-repeat:repeat-x; vertical-align:bottom;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr style="height:56px; vertical-align:top;">
                      <td style="width:60px;">&nbsp;</td>
                      <td style="width:125px;"><a href="index.php"><span class="logo">{$tSITE_ADI}</span></a></td>
                      <td style="text-align:center;">{if in_array(18,explode("_",DEF_AKTIF_LINK_KUTULARI)) } {include file="kutu_hizli_arama.tpl"}{/if} </td>
                      <td style="width:250px;text-align:right;" align="right">{if in_array(20,explode("_",DEF_AKTIF_LINK_KUTULARI)) } {include file="kutu_uye_girisi.tpl"}{/if}</td>
                    </tr>
                  </table></td>
              </tr>
              <tr style="height:30px; text-align:left;">
                <td><table border="0" cellspacing="0" cellpadding="0">
                    <tr style="text-align:center;">
                      <td style="width:9px;"></td>
                      <td style="width:9px;"><img src="{$resim}sis_um_sol_a.gif" width="9" height="30"></td>
                      <td style="background-image:url({$resim}sis_um_bg_a.gif); background-repeat:repeat-x;" class="menu_ust_aktif"><a href="index.php">Anasayfa</a></td>
                      <td style="width:11px;"><img src="{$resim}sis_um_sag_a.gif" width="11" height="30" alt=""></td>
                      <td style="width:5px;">&nbsp;</td>
                      <td style="width:12px;"><img src="{$resim}sis_um_sol.gif" width="12"></td>
                      <td class="menu_ust_pasif"><a href="arama.php">Ara</a></td>
                      <td style="width:9px;"><img src="{$resim}sis_um_sag.gif" width="9"></td>
                      <td style="width:5px;">&nbsp;</td>
                      <td style="width:12px;"><img src="{$resim}sis_um_sol.gif" width="12"></td>
                      <td class="menu_ust_pasif"><a href="forum.php">Forum</a></td>
                      <td style="width:9px;"><img src="{$resim}sis_um_sag.gif" width="9"></td>
                      <td style="width:5px;">&nbsp;</td>
                      <td style="width:12px;"><img src="{$resim}sis_um_sol.gif" width="12"></td>
                      <td class="menu_ust_pasif"><a href="dokumantasyon.php">Dökümantasyon</a></td>
                      <td style="width:9px;"><img src="{$resim}sis_um_sag.gif" width="9"></td>
                      <td style="width:5px;">&nbsp;</td>
                      <td style="width:12px;"><img src="{$resim}sis_um_sol.gif" width="12"></td>
                      <td class="menu_ust_pasif"><a href="uye.php">Üye Girişi</a></td>
                      <td style="width:9px;"><img src="{$resim}sis_um_sag.gif" width="9"></td>
                      <td style="width:5px;">&nbsp;</td>
                      <td style="width:12px;"><img src="{$resim}sis_um_sol.gif" width="12"></td>
                      <td class="menu_ust_pasif"><a href="uyeol.php">Üye Ol</a></td>
                      <td style="width:9px;"><img src="{$resim}sis_um_sag.gif" width="9"></td>
                      <td style="width:5px;">&nbsp;</td>
                      <td style="width:12px;"><img src="{$resim}sis_um_sol.gif" width="12"></td>
                      <td class="menu_ust_pasif"><a href="iletisim.php">İletişim</a></td>
                      <td style="width:9px;"><img src="{$resim}sis_um_sag.gif" width="9"></td>
                      <td style="width:5px;">&nbsp;</td>
                      <td style="width:12px;"><img src="{$resim}sis_um_sol.gif" width="12"></td>
                      <td class="menu_ust_pasif"><a href="yardim.php">Yardım</a></td>
                      <td style="width:9px;"><img src="{$resim}sis_um_sag.gif" width="9"></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
          <td style="background-image:url({$resim}sis_sag1.gif); background-repeat:no-repeat; width:5px;"></td>
        </tr>
        <tr style="vertical-align:top;" height="600">
          <td style="background-image:url({$resim}sis_188.gif); background-repeat:repeat-y;"><img src="{$resim}sis_o1.gif" width="4" height="53" border="0"></td>
          <td style="background-image:url({$resim}sis_o2.gif); background-repeat:repeat-x;">
