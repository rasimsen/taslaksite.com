{include file="sayfa_ustu.tpl"}<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td valign="top">{include file="yardim_sol_panel.tpl"}</td>
<td valign="top" width="100%" style="padding:5px;">
<div style="text-align:center;width:100%">{$mesajTaslakSite}</div>
<form id="form1" name="form1" method="post" action="yardim.php">
<table border="0" cellspacing="0" cellpadding="3" align="center">
  <tr align="left">
    <td>Detaylý Arama:</td>
    <td><input type="text" name="arama_text"
    		value="{$arama_text}" 
    		size="40" 
    		maxlength="128" 
    		class="data" 
    		onfocus="javascript:this.className='data2'" 
    		onblur="javascript:this.className='data'"/></td>
    <td><input type="submit" name="btnArama" value="Ara" /></td>
  </tr>
  <tr align="left"><td>&nbsp;</td><td colspan=2><input type="radio" name="arama_turu" value="1"/> Kelimelerin Hepsi Geçsin</td></tr>
  <tr align="left"><td>&nbsp;</td><td colspan=2><input type="radio" name="arama_turu" value="2"/> Aynen Yazýldýðý Gibi Ara</td></tr>
  <tr align="left"><td>&nbsp;</td><td colspan=2><input type="radio" name="arama_turu" value="3" checked/> Bu Kelimelerden Herangi Biri Geçsin</td></tr>

</table>
</form>

{if count($arama_sonuclari) gt 0 } <p><div class="arama_sonuc_baslik">{if strlen($arama_text) gt 0}<font color="red">"{$arama_text}"</font> için {/if} Arama Sonuçlari</div>{include file="arama_sonuclari.tpl"}{/if}

<!-- yönetim panelinden arama sayfasýna eklenen içerik varsa gösterilmesi amacýyla konumuþtur -->
{if count($arama_sonuclari) lt 1 }{include file="taslak_sayfa_standart_icerik_gosterme.tpl"}{/if}

</td>
<td valign="top">{include file="sag_panel.tpl"}</td>
</tr></table>

{include file="sayfa_alti.tpl"} 