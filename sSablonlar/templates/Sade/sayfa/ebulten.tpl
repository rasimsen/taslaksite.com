{include file="sayfa_ustu.tpl"}<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td valign="top">{include file="sol_panel.tpl"}</td>
<td valign="top" width="100%" style="padding:5px;">
<div style="text-align:center;width:100%">{$mesajTaslakSite}</div>
<form id="form1" name="form1" method="post" action="ebulten.php">
<table border="0" cellspacing="0" cellpadding="3" align="center">
  <tr align="left"><td>Email Adresiniz:</td><td><input type="text" name="ebulten_email" size="40" maxlength="128" class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'"/></td></tr>
  <tr><td> </td><td><input type="submit" name="btnEbulten" value="e-Bülten için Kayýt Ol" /></td></tr>
</table>
</form>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  {section name=icerik loop=$sayfa_icerik}
  {strip}
  <tr>
    <td width="1px" valign="top">{include file="thumbnail.tpl"}</td>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="3">
        <tr>
          <td class="baslik">{$sayfa_icerik[icerik].BASLIK}</td>
        </tr>
        <tr>
          <td class="icerik">{$sayfa_icerik[icerik].KISA_OZET}</td>
        </tr>
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
      </table></td>
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