{include file="admin_ust.tpl" title="Admin"}

	<center><b>B�lten Liste</b></center>	

	  <table width="800px" border="0" cellspacing="1" cellpadding="3" align="center">
		<tr><td  colspan="3" style="border-bottom:0px silver solid; height:10px;"><a href="ebulten.php?s=2&id=">Yeni e-B�lten Ekle</a></td></tr>
	  	<tr><th>B�LTEN BA�LIK</th><th>G�NDER�M DURUMU</th><th>G�NDER�M ZAMANI</th><th>DURUM</th></tr>	
		<tr><td  colspan="3" style="border-bottom:1px silver solid; height:1px;"></td></tr>
		{section name=mysec loop=$sayfalistesi}
		{strip}
		   <tr bgcolor="{cycle values="#f2f3f3,#ffffff"}">
			  <td><a href="ebulten.php?s=1&id={$sayfalistesi[mysec].ID}">{$sayfalistesi[mysec].BASLIK}</a>&nbsp;&nbsp;&nbsp;<a href="ebulten.php?s=1&id={$sayfalistesi[mysec].ID}">�nizle&G�nder</a>
			  &nbsp;&nbsp;
			  <a href="ebulten.php?s=2&id={$sayfalistesi[mysec].ID}">G�ncelle</a></td>
			  <td>{$sayfalistesi[mysec].GDURUM}</td>	
			  <td>{$sayfalistesi[mysec].GONDERIM_ZAMANI}</td>	
			  <td><a href="sayfalar.php?durum={$sayfalistesi[mysec].DURUM}&durum_id={$sayfalistesi[mysec].SAYFA_ADI}" OnClick="javascript:if(confirm('{$sayfalistesi[mysec].DURUM} yapmak istedi�inizden emin misiniz?')) return true;else return false;"><img src="{$yp_resim}icons/{$sayfalistesi[mysec].DURUM}.gif" border="0" title="{$sayfalistesi[mysec].DURUM} etmek i�in t�klay�n�z!"></a></td>
		   </tr>
		{/strip}
		{/section}
	</table>

{include file="admin_alt.tpl"}
