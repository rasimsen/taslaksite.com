{include file="sayfa_ustu.tpl"}

<div class="aside">
	{include file="yardim_sol_panel.tpl"}
</div>


<div class="mainContent">

<div style="text-align:center;width:100%">{$mesajTaslakSite}</div>
<form id="form1" name="form1" method="post" action="yardim.php">
<table border="0" cellspacing="0" cellpadding="3" align="center">
  <tr align="left">
    <td>Detayl� Arama:</td>
    <td><input type="text" name="arama_text"
    		value="{$arama_text}" 
    		size="40" 
    		maxlength="128" 
    		class="data" 
    		onfocus="javascript:this.className='data2'" 
    		onblur="javascript:this.className='data'"/></td>
    <td><input type="submit" name="btnArama" value="Ara" /></td>
  </tr>
  <tr align="left"><td>&nbsp;</td><td colspan=2><input type="radio" name="arama_turu" value="1"/> Kelimelerin Hepsi Ge�sin</td></tr>
  <tr align="left"><td>&nbsp;</td><td colspan=2><input type="radio" name="arama_turu" value="2"/> Aynen Yaz�ld��� Gibi Ara</td></tr>
  <tr align="left"><td>&nbsp;</td><td colspan=2><input type="radio" name="arama_turu" value="3" checked/> Bu Kelimelerden Herangi Biri Ge�sin</td></tr>

</table>
</form>

{if count($arama_sonuclari) gt 0 } <p><div class="arama_sonuc_baslik">{if strlen($arama_text) gt 0}<font color="red">"{$arama_text}"</font> i�in {/if} Arama Sonu�lari</div>{include file="arama_sonuclari.tpl"}{/if}

<!-- y�netim panelinden arama sayfas�na eklenen i�erik varsa g�sterilmesi amac�yla konumu�tur -->
{if count($arama_sonuclari) lt 1 }{include file="taslak_sayfa_standart_icerik_gosterme.tpl"}{/if}

</div>

{include file="sag_panel.tpl"}



{include file="sayfa_alti.tpl"} 