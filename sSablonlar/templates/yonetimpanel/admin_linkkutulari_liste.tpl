{include file="admin_ust.tpl" title="Admin"}

	<center><b>LINK KUTULARI LÝSTE</b></center>	

	  <table width="800px" border="0" cellspacing="1" cellpadding="3" align="center">
		<tr><td  colspan="3" style="border-bottom:0px silver solid; height:10px;"><a href="link_kutulari.php?s=4">Yeni Link Kutusu Ekle</a></td></tr>
	  	<tr><th width="30">SIRA</th><th>KUTU ADI</th><th>DURUM</th><th>&nbsp;</th></tr>	
		<tr><td  colspan="3" style="border-bottom:1px silver solid; height:1px;"></td></tr>
<form action="" method="post" name="form2" id="form2">
		{section name=mysec loop=$iceriklistesi}
		{strip}
		   <tr bgcolor="{cycle values="#f2f3f3,#ffffff"}">
			  <td><input type="text" name="sira_{$iceriklistesi[mysec].ID}" id="siraId" value="{$iceriklistesi[mysec].SIRA}" size="2" style="text-align:right"/></td>
			  <td><a href="link_kutulari.php?s=1&id={$iceriklistesi[mysec].ID}">{$iceriklistesi[mysec].KUTU_ADI}</a>&nbsp;&nbsp;&nbsp;<a href="link_kutulari.php?s=4&id={$iceriklistesi[mysec].ID}">Güncelle</a></td>
			  <td><a href="link_kutulari.php?durum={if $iceriklistesi[mysec].DURUM eq 1}0{else}1{/if}&durum_id={$iceriklistesi[mysec].ID}"><img src="{$yp_resim}icons/{if $iceriklistesi[mysec].DURUM eq 1}AKTIF{else}PASIF{/if}.gif" border="0" title="{if $iceriklistesi[mysec].DURUM eq 1}PASIF{else}AKTIF{/if} etmek için týklayýnýz!"></a></td>
			  <td><a href="link_kutulari.php?sil_id={$iceriklistesi[mysec].ID}" OnClick="javascript:if(confirm('Silmek istediðinizden eminmisiniz?')) return true;else return false;"><img src="{$yp_resim}icons/delete_16.gif" border="0" title="Silmek için týklayýnýz!"></a></td>
		   </tr>
		{/strip}
		{/section}
		<tr><td colspan=3><input type="submit" name="btnMenuSira" value="Sýralama Kaydet"/></td></tr>
</form>
	</table>

{include file="admin_alt.tpl"}
