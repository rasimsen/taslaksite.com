{include file="admin_ust.tpl" title="Admin"}

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
	<center><b>Referans Ekleme/G�ncelleme </b></center>	
  <table width="800px" border="0" cellspacing="1" cellpadding="3" align="center">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="150">Referans Ad� </td>
      <td><input type="text" name="REF_ADI" value="{$ref_adi}"/></td>
    </tr>
    <tr>
      <td valign="top">K�sa �zet</td>
      <td><textarea name="KISA_OZET" cols="60" rows="15">{$kisa_ozet}</textarea></td>
    </tr>
    <tr valign="top">
      <td>K���k Resim </td>
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

	<center><b>D��ER REFERANSLAR</b></center>	
	  <table width="800px" border="0" cellspacing="1" cellpadding="3" align="center">
	  	<tr><th>REFERANS ADI</th><th>DURUM</th></tr>	
		{section name=mysec loop=$sayfalistesi}
		{strip}
		   <tr bgcolor="{cycle values="#f2f3f3,#ffffff"}">
			  <td><a href="referanslar.php?s=1&tekilAnahtar={$sayfalistesi[mysec].ID}">{$sayfalistesi[mysec].REF_ADI}({$sayfalistesi[mysec].ID})</a>&nbsp;<a href="referanslar.php?s=2&tekilAnahtar={$sayfalistesi[mysec].ID}">G�ncelle</a>&nbsp;<a href="">Sil</a></td>
		      <td><a href="referanslar.php?tekilAnahtar={$sayfalistesi[mysec].ID}&durum={$sayfalistesi[mysec].DURUM}&durum_id={$sayfalistesi[mysec].ID}"><img src="{$yp_resim}icons/{$sayfalistesi[mysec].DURUM}.gif" border="0" title="{$sayfalistesi[mysec].DURUM} etmek i�in t�klay�n�z!"></a></td>
			  <td><a href="referanslar.php?tekilAnahtar={$sayfalistesi[mysec].ID}&sil_id={$sayfalistesi[mysec].ID}" OnClick="javascript:if(confirm('Silmek istedi�inizden eminmisiniz?')) return true;else return false;"><img src="{$yp_resim}icons/delete_16.gif" border="0" title="Silmek i�in t�klay�n�z!"></a></td>
		   </tr>
		{/strip}
		{/section}
	</table>
	<br />
	<a href="{$SayfaAdresi}&s=2">Yeni Referans Ekle</a>

{include file="admin_alt.tpl"}
