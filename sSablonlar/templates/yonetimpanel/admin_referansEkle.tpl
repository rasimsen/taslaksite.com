{include file="admin_ust.tpl" title="Admin"}

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
	<center><b>Referans Ekleme/Güncelleme </b></center>	
  <table width="800px" border="0" cellspacing="1" cellpadding="3" align="center">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="150">Referans Adý </td>
      <td><input type="text" name="REF_ADI" value="{$ref_adi}"/></td>
    </tr>
    <tr>
      <td valign="top">Kýsa Özet</td>
      <td><textarea name="KISA_OZET" cols="60" rows="15">{$kisa_ozet}</textarea></td>
    </tr>
    <tr valign="top">
      <td>Küçük Resim </td>
      <td><img src="../foto/{$thumbnail}" border="0" align="top">&nbsp;<input type="file" name="THUMBNAIL[]" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="icerikKaydet" value="Kaydet" /></td>
    </tr>

  </table>
</form>

<br />

	<center><b>DÝÐER REFERANSLAR</b></center>	
	  <table width="800px" border="0" cellspacing="1" cellpadding="3" align="center">
	  	<tr><th>REFERANS ADI</th><th>DURUM</th></tr>	
		{section name=mysec loop=$sayfalistesi}
		{strip}
		   <tr bgcolor="{cycle values="#f2f3f3,#ffffff"}">
			  <td><a href="referanslar.php?s=1&tekilAnahtar={$sayfalistesi[mysec].ID}">{$sayfalistesi[mysec].REF_ADI}({$sayfalistesi[mysec].ID})</a>&nbsp;<a href="referanslar.php?s=2&tekilAnahtar={$sayfalistesi[mysec].ID}">Güncelle</a>&nbsp;<a href="">Sil</a></td>
		      <td><a href="referanslar.php?tekilAnahtar={$sayfalistesi[mysec].ID}&durum={$sayfalistesi[mysec].DURUM}&durum_id={$sayfalistesi[mysec].ID}"><img src="{$yp_resim}icons/{$sayfalistesi[mysec].DURUM}.gif" border="0" title="{$sayfalistesi[mysec].DURUM} etmek için týklayýnýz!"></a></td>
			  <td><a href="referanslar.php?tekilAnahtar={$sayfalistesi[mysec].ID}&sil_id={$sayfalistesi[mysec].ID}" OnClick="javascript:if(confirm('Silmek istediðinizden eminmisiniz?')) return true;else return false;"><img src="{$yp_resim}icons/delete_16.gif" border="0" title="Silmek için týklayýnýz!"></a></td>
		   </tr>
		{/strip}
		{/section}
	</table>
	<br />
	<a href="{$SayfaAdresi}&s=2">Yeni Referans Ekle</a>

{include file="admin_alt.tpl"}
