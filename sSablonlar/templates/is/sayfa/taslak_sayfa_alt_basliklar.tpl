<table width="100%" border="0" cellspacing="0" cellpadding="3" style="padding:10px;">
  {section name=icerik loop=$alt_basliklar}
  {strip}
  <tr valign="top">
   <td>
   	<div>
    	{if strlen($alt_basliklar[icerik].THUMBNAIL) gt 0}<div style="float:left"><img src="dosya/foto/{$alt_basliklar[icerik].THUMBNAIL}" border=0 width="96" style="padding:5px;border:3px solid silver;"/></div>{/if}
            <div class="altbaslik" style="float:left; padding:5px;"><a  class="altbaslik" href="{$sayfa_linki}?id={$alt_basliklar[icerik].ID}">{$alt_basliklar[icerik].BASLIK}</a></div>        
            <div class="icerik" style=" padding:5px; float:none;"><br/><br />{$alt_basliklar[icerik].KISA_OZET}</div>        
        </div>    
   </td>
	</td>
  </tr>
  <tr>
     <td colspan="2" align="center" style="height:10px; font-size:14px;">&#8230;</td>
  </tr>
  {/strip}
  {/section}
</table>