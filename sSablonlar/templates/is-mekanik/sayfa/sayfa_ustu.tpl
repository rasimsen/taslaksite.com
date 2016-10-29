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
  <div id="wrapper">
    <div id="header"> </div>
    <div id="left">
      <div id="logo">
        <h1><span  onclick="javascript:location.href='index.php';" style="cursor:pointer">{$tSITE_ADI}</span></h1>
        <p>It's all possible</p>
      </div>
      <div id="nav">
			{include file="menu_ust.tpl"}
      </div>
      <div id="news">
		{if in_array(20,explode("_",DEF_AKTIF_LINK_KUTULARI)) } {include file="kutu_uye_girisi.tpl"}{/if}
        {if in_array(18,explode("_",DEF_AKTIF_LINK_KUTULARI)) } {include file="kutu_hizli_arama.tpl"}{/if}
	  </div>
      <div id="nav2">
        	{include file="sol_panel.tpl"}
        	{include file="sag_panel.tpl"}
      </div>
      <div id="news">       
        <h2>Latest News</h2>
        <h3>02/03/07</h3>
        <p>Even more websites all about website templates on <a href="http://www.justwebtemplates.com">Just Web Templates</a>.</p>
        <div class="hr-dots"> </div>
        <h3>01/03/07</h3>
        <p>If you're looking for beautiful and professionally made templates you can find them at <a href="http://www.templatebeauty.com">Template Beauty</a>.</p>
        <p class="more"><a href="http://www.freewebsitetemplates.com">more</a></p>
      </div>
      <div id="support">
        <p>Call: +3265-9856-789</p>
      </div>
    </div>
    <div id="right">