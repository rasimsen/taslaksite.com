<table width="100%" border="0" cellspacing="0" cellpadding="3" style="padding:10px;">
  {section name=icerik loop=$alt_basliklar}
  {strip}
  <tr>
   <td width="1px">{if strlen($alt_basliklar[icerik].THUMBNAIL) gt 0}<img src="foto/{$alt_basliklar[icerik].THUMBNAIL}" border=0 style="padding:5px;"/>{/if}</td>
   <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="3">
    	<tr><td class="altbaslik"><a href="{$sayfa_linki}?id={$alt_basliklar[icerik].ID}">{$alt_basliklar[icerik].BASLIK}</a></td></tr>
	  	<tr><td class="icerik">{$alt_basliklar[icerik].KISA_OZET}</td></tr>
	  	</table></td>
  </tr>
  <tr>
     <td colspan="2" align="center" height="30px"><img src="{$resim}p.gif" border="0"></td>
  </tr>
  {/strip}
  {/section}
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="3" style="padding:10px;">
  {section name=icerik loop=$alt_basliklar}
  {strip}
  <tr valign="top">
   <td><div>{if strlen($alt_basliklar[icerik].THUMBNAIL) gt 0}<div><img src="foto/{$alt_basliklar[icerik].THUMBNAIL}" border=0 style="padding:5px;"/></div>{/if}</td>
   <div 
   		style="padding:3px;background-color:#8D8F8B; border:1px solid blue;"><div 
   				class="altbaslik" style="clear:right; border:1px solid green;"><a href="{$sayfa_linki}?id={$alt_basliklar[icerik].ID}">{$alt_basliklar[icerik].BASLIK}</a></div><div 
   				class="icerik" style="clear:both;">{$alt_basliklar[icerik].KISA_OZET}</div></div>
       </div>         
	</td>
  </tr>
  <tr>
     <td colspan="2" align="center" style="height:10px;">xxxxxx</td>
  </tr>
  {/strip}
  {/section}
</table>