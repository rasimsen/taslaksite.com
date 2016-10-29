{include file="sayfa_ustu.tpl"}<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td valign="top">{include file="sol_panel.tpl"}</td>
<td valign="top" width="100%" style="padding:5px;">
<div style="text-align:center;width:100%">{$mesajTaslakSite}</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  {section name=icerik loop=$sayfa_icerik}
  {strip}
        <tr>
            <td>
                <div>
                    {if strlen($sayfa_icerik[icerik].THUMBNAIL) gt 0}<div style="float:left">{include file="thumbnail.tpl"}</div>{/if}
                    <div class="baslik" style="float:left; padding:5px;">{$sayfa_icerik[icerik].BASLIK}</div>        
                    <div class="icerik" style=" padding:5px; float:none;"><br /><br/><br />{$sayfa_icerik[icerik].KISA_OZET}</div>        
                </div>    
            </td>
        <tr>
        <tr>
          <td class="icerik">{$sayfa_icerik[icerik].ICERIK}</td>
        </tr>
        <tr>
          <td height="20"></td>
        </tr>
		<tr><td valign="top">{include file="foto_listesi.tpl"}<br>{include file="dosya_listesi.tpl"}</td></tr>
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
{/strip}
{/section}
</table>

{if count($alt_basliklar) gt 0 } {include file="taslak_sayfa_alt_basliklar.tpl"}{/if}
{if DEF_YORUM_ACIK } {include file="yorum.tpl"}{/if}

</td>
<td valign="top">{include file="sag_panel.tpl"}</td>
</tr></table>

{include file="sayfa_alti.tpl"} 