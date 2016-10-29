{include file="admin_ust.tpl" title="Admin"}

	<center><b>Referanslar Liste</b></center>	
		<a href="{$SayfaAdresi}&s=2">Yeni Referans Ekle</a>
	  <table width="800px" border="0" cellspacing="1" cellpadding="3" align="center">
	  	<tr><th>REFERANS ADI</th><th>DURUM</th></tr>	
		{section name=mysec loop=$sayfalistesi}
		{strip}
		   <tr bgcolor="{cycle values="#f2f3f3,#ffffff"}">
			  <td colspan="2">
			  	<table width="100%">
				  <tr>	<td width="30"><input type="text" size="1" name="sira_{$sayfalistesi[mysec].ID}" value="{$sayfalistesi[mysec].SIRA}"/></td>
				  		<td rowspan="2" width="150"><img src="../foto/{$sayfalistesi[mysec].THUMBNAIL}" border="1"></td>
					  	<td><a href="referanslar.php?s=1&tekilAnahtar={$sayfalistesi[mysec].ID}">{$sayfalistesi[mysec].REF_ADI}({$sayfalistesi[mysec].ID})</a>&nbsp;<a href="referanslar.php?s=2&tekilAnahtar={$sayfalistesi[mysec].ID}">Güncelle</a>&nbsp;<a href="">Sil</a></td>
					    
					    <td><a href="referanslar.php?tekilAnahtar={$sayfalistesi[mysec].ID}&durum={$sayfalistesi[mysec].DURUM}&durum_id={$sayfalistesi[mysec].ID}"><img src="{$yp_resim}icons/{$sayfalistesi[mysec].DURUM}.gif" border="0" title="{$sayfalistesi[mysec].DURUM} etmek için týklayýnýz!"></a></td>
					    <td><a href="referanslar.php?tekilAnahtar={$sayfalistesi[mysec].ID}&sil_id={$sayfalistesi[mysec].ID}" OnClick="javascript:if(confirm('Silmek istediðinizden eminmisiniz?')) return true;else return false;"><img src="{$yp_resim}icons/delete_16.gif" border="0" title="Silmek için týklayýnýz!"></a></td>
					</tr>
					<tr><td>&nbsp;</td><td colspan="3">{$sayfalistesi[mysec].KISA_OZET}</td></tr>
				</table>
			  </td>
		   </tr>
		{/strip}
		{/section}
	</table>
{include file="admin_alt.tpl"}
