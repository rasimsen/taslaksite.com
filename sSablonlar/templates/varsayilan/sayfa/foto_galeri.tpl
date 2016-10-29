{include file="sayfa_ustu.tpl"}		

{literal}
<script language="JavaScript">
    function durHaber(){
        document.getElementById("haber").stop();
    }
    function baslaHaber(){
        document.getElementById("haber").start();
    }
	function MM_openBrWindow(theURL,winName,features) { //v2.0
	  window.open(theURL,winName,features);
	}
</script>
{/literal}
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td style="width:100%; border-bottom:1px solid black;"> <br style="line-height:40px;"><img src="{$resim}makinaparkimiz.gif" alt=""></td></tr>
	<tr><td align="center"><br /><img src="{$resim}mk.jpg" /></td></tr>
</table>
<br>
<div style="width:100%; text-align:left" class="DivBar">


				<!-- detaylar-->	
				<table width="90%" border="0" cellspacing="0" cellpadding="3">
				{section name=icerik loop=$reflistesi}
				{strip}
				  <tr>
					<td class="baslik">{$reflistesi[icerik].BASLIK}</td>
				  </tr>
				  <tr>
					<td class="icerik">{$reflistesi[icerik].ICERIK}</td>
				  </tr>
				  <tr>
				    <td align="center">&nbsp;</td>
				  </tr>
				  </tr>
					<td class="icerik">{$reflistesi[icerik].DETAY}</td>
				  </tr>
				  <tr>
				    <td class="icerik" align="center"><a href="#"><img src="foto/{$reflistesi[icerik].FOTO[0].FOTO}" border=0  style="padding:5px;border:solid 1px silver;"></a></td>
				  </tr>
				  
				  <tr>
					<td align="center" style="padding:5px;">
						<br clear="all"/>
						<div style=" float:left; text-align:center"> 
						<!-- <marquee align="left" id="haber" scrolldelay="100" scrollamount="2" onmouseover="durHaber()" onmouseout="baslaHaber()" class="kyHaber"  style="background-color:#2B2B2B; border:solid 0px silver;padding:5px"> -->
						<!-- fotolar -->
						   {assign var="fotolistesi" value=$reflistesi[icerik].FOTO}
							{section name=foto loop=$fotolistesi}
								{strip}
													{if strlen($fotolistesi[foto].FOTO) gt 0}<a href="javascript://" onClick="MM_openBrWindow('mp_foto.php?foto_id={$fotolistesi[foto].ID}','MakinaParkimiz','width=500,height=370')"><img src="foto/{$fotolistesi[foto].FOTO}" border=0  style="padding:5px;border:solid 1px silver;" height="100px" alt="Kýzýlyar Hafriyat Ýþ Makinalarý"/></a>&nbsp;&nbsp;&nbsp;{/if}
								{/strip}
							{/section}
						</div>	
						<!-- </marquee>-->
					</td>
				  </tr>
				  <tr>
				    <td align="center">&nbsp;</td>
				  </tr>
				  <tr>
				    <td align="center" height="30px"><img src="{$resim}p.gif" border="0"></td>
				  </tr>
				{/strip}
				{/section}
				</table>	
</div>
{include file="sayfa_alti.tpl"}	
