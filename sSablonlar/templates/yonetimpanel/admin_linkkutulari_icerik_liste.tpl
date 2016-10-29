{include file="admin_ust.tpl" title="Admin"}
 
  <br />

  <table width="800px" border="0" cellspacing="1" cellpadding="3" align="center">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="150">Kutu Adý </td>
      <td>{$kutu_adi}</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>

<br/>


<a href="link_kutulari.php?s=2&id={$id}&parent={$parent}" >Yeni Link Ekle</b></a>
<br />

	<center><b>BU LINK KUTUSUNDA BULUNAN ÝÇERÝKLER</b></center>	
	  <table width="800px" border="0" cellspacing="1" cellpadding="3" align="center">
	  	<tr><th width="30">Sýra</th><th width="20">LINK ADI</th><th>LINK URL</th><th>LINK TARGET</th><th width="50">DURUM</th></tr>	
<form action="" method="post" name="form2" id="form2">
		{section name=mysec loop=$iceriklistesi}
		{strip}
		   <tr bgcolor="{cycle values="#f2f3f3,#ffffff"}">
			  <td><input type="text" name="sira_{$iceriklistesi[mysec].ID}" id="siraId" value="{$iceriklistesi[mysec].SIRA}" size="2" style="text-align:right"/></td>
			  <td><a href="link_kutulari.php?s=2&id={$iceriklistesi[mysec].ID}&parent={$iceriklistesi[mysec].PARENT}">{$iceriklistesi[mysec].LINK_ADI}</a></td>
			  <td><a href="{$iceriklistesi[mysec].LINK_URL}">{$iceriklistesi[mysec].LINK_URL}</a></td>
			  <td>{$iceriklistesi[mysec].LINK_TARGET}&nbsp;<a href="{$iceriklistesi[mysec].LINK_URL}">Önizle</a>&nbsp;|&nbsp;<a href="link_kutulari.php?s=2&id={$iceriklistesi[mysec].ID}&parent={$iceriklistesi[mysec].PARENT}">Güncelle</a></td>
			  <td><a href="link_kutulari.php?s=1&id={$parent}&durum={if $iceriklistesi[mysec].DURUM eq 1}0{else}1{/if}&durum_id={$iceriklistesi[mysec].ID}"><img src="{$yp_resim}icons/{if $iceriklistesi[mysec].DURUM eq 1}AKTIF{else}PASIF{/if}.gif" border="0" title="{if $iceriklistesi[mysec].DURUM eq 1}PASIF{else}AKTIF{/if} etmek için týklayýnýz!"></a></td>
			  <td><a href="link_kutulari.php?s=1&id={$parent}&sil_id={$iceriklistesi[mysec].ID}" OnClick="javascript:if(confirm('Silmek istediðinizden eminmisiniz?')) return true;else return false;"><img src="{$yp_resim}icons/delete_16.gif" border="0" title="Silmek için týklayýnýz!"></a></td>
		   </tr>
		{/strip}
		{/section}
		<tr><td colspan=5><input type="submit" name="btnSira" value="Sýralama Kaydet"/></td></tr>
</form>		
	</table>

{include file="admin_alt.tpl"}
