{include file="admin_ust.tpl" title="Admin"}
<br>
<a href="yonetici.php?s=1&id=" ><b>Yeni Admin Kullanýcý Ekle</b></a>
<br>

<br />

	<center><b>YÖNETÝCÝ LÝSTESÝ</b></center>	
	  <table width="800px" border="0" cellspacing="1" cellpadding="3" align="center">
	  	<tr><th width="30">&nbsp;</th><th width="150">AD SOYAD</th><th>KULLANICI&nbsp;ADI</th><th>EMAIL</th><th>&nbsp;</th><th width="50">DURUM</th></tr>	
		{section name=mysec loop=$iceriklistesi}
		{strip}
		   <tr bgcolor="{cycle values="#f2f3f3,#ffffff"}">
			  <td>&nbsp;</td>
			  <td><a href="yonetici.php?s=1&id={$iceriklistesi[mysec].ID}">{$iceriklistesi[mysec].AD} &nbsp; {$iceriklistesi[mysec].SOYAD}</a></td>
			  <td><a href="yonetici.php?s=1&id={$iceriklistesi[mysec].ID}">{$iceriklistesi[mysec].KULLANICI_ADI}</a></td>
			  <td><a href="yonetici.php?s=1&id={$iceriklistesi[mysec].ID}">{$iceriklistesi[mysec].EMAIL}</a></td>
			  <td>&nbsp;</td>
			  <td><a href="yonetici.php?durum={$iceriklistesi[mysec].DURUM}&durum_id={$iceriklistesi[mysec].ID}"><img src="{$yp_resim}icons/{$iceriklistesi[mysec].DURUM}.gif" border="0" title="{$iceriklistesi[mysec].DURUM} etmek için týklayýnýz!"></a></td>
			  <td><a href="yonetici.php?sil_id={$iceriklistesi[mysec].ID}" OnClick="javascript:if(confirm('Silmek istediðinizden eminmisiniz?')) return true;else return false;"><img src="{$yp_resim}icons/delete_16.gif" border="0" title="Silmek için týklayýnýz!"></a></td>
		   </tr>
		{/strip}
		{/section}
	</table>

{include file="admin_alt.tpl"}
