{include file="admin_ust.tpl" title="Admin"}
    {literal}
    <script type="text/javascript" src="sAraclar/gelismisHTML/fckeditor.js"></script>
    <script type="text/javascript">
        var oFCKeditor = new FCKeditor( 'DETAY' ) ;
         var sBasePath = 'sAraclar/gelismisHTML/';//document.location.pathname.substring(0,document.location.pathname.lastIndexOf('wl.html'));
      window.onload = function()
      {
		 oFCKeditor.Height="450";
		 oFCKeditor.BasePath	= sBasePath;
        oFCKeditor.ReplaceTextarea() ;
      }
    </script>
    {/literal}

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
	<center>
	  <b>Referanlara Ýçerik Ekleme </b>
	</center>	
  <table width="800px" border="0" cellspacing="1" cellpadding="3" align="center">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="150">Referans Adý </td>
      <td>{$ref_adi}
      <input type="hidden" name="icerik_id" value="{$icerik_id}" /></td>
    </tr>
    <tr>
      <td width="150">Kýsa Özet</td>
      <td>{$kisa_ozet}</td>
    </tr>
    <tr valign=top>
      <td width="150">Küçük Resim</td>
      <td><img src="../foto/{$thumbnail}" border="1"></td>
    </tr>
    <tr height="30">
      <td width="150" colspan="2"><b>Detay</b></td>
    </tr>	
    <tr>
      <td width="150">Detay Özet</td>
      <td><input type="text" name="DETAY_OZET" size="80" value="{$detay_ozet}"/></td>
    </tr>
    <tr>
      <td colspan="2"><textarea name="DETAY" cols="85" rows="15" style="width:100%">{$detay}</textarea></td>
    </tr>
    <tr height="30">
      <td width="150" colspan="2"><b>Konu&nbsp;ile&nbsp;Ýlgili&nbsp;Fotoðraflar</b></td>
    </tr>	
    <tr>
      <td colspan="2" valign=top>

		{section name=foto loop=$fotolistesi}
		{strip}
		   <div style="border:1px solid #999999;padding:3px;width:150px;position:inherit;">
			  <img src="../foto/{$fotolistesi[foto].THUMBNAIL}" border="0">
			  <br>
			  <a href="referanslar.php?s=1&tekilAnahtar={$tekilAnahtar}&icerik_id={$icerik_id}&durum={$fotolistesi[foto].DURUM}&img_durum_id={$fotolistesi[foto].ID}"><img src="{$yp_resim}icons/{$fotolistesi[foto].DURUM}.gif" border="0" title="{$fotolistesi[foto].DURUM} etmek için týklayýnýz!"></a>
			  &nbsp;<a href="referanslar.php?s=1&tekilAnahtar={$tekilAnahtar}&icerik_id={$icerik_id}&img_sil_id={$fotolistesi[foto].ID}" OnClick="javascript:if(confirm('Silmek istediðinizden eminmisiniz?')) return true;else return false;"><img src="{$yp_resim}icons/delete_16.gif" border="0" title="Silmek için týklayýnýz!"></a>
			</div>
		{/strip}
		{/section}
      
		<br>
      </td>
    </tr>
    <tr><td>1.Foto</td><td><input type="file" name="THUMBNAIL[]" /></td></tr>
    <tr><td>2.Foto</td><td><input type="file" name="THUMBNAIL[]" /></td></tr>
    <tr><td>3.Foto</td><td><input type="file" name="THUMBNAIL[]" /></td></tr>
    <tr><td>4.Foto</td><td><input type="file" name="THUMBNAIL[]" /></td></tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="submit" name="icerikKaydet" value="Kaydet" /></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

<br />
	<center><b><u>DÝÐER ÝÇERÝKLER</u></b></center>	
	  <table width="800px" border="0" cellspacing="1" cellpadding="3" align="center">
	  	<tr><th>ID</th><th>DETAY OZET</th></tr>	
		{section name=mysec loop=$iceriklistesi}
		{strip}
		   <tr bgcolor="{cycle values="#f2f3f3,#ffffff"}">
			  <td>{$iceriklistesi[mysec].ID}</td>
			  <td><a href="referanslar.php?s=1&tekilAnahtar={$tekilAnahtar}&icerik_id={$iceriklistesi[mysec].ID}">{$iceriklistesi[mysec].DETAY_OZET}</a></td>

			  <td><a href="referanslar.php?s=1&tekilAnahtar={$tekilAnahtar}&durum={$iceriklistesi[mysec].DURUM}&durum_id={$iceriklistesi[mysec].ID}"><img src="{$yp_resim}icons/{$iceriklistesi[mysec].DURUM}.gif" border="0" title="{$iceriklistesi[mysec].DURUM} etmek için týklayýnýz!"></a></td>
			  <td><a href="referanslar.php?s=1&tekilAnahtar={$tekilAnahtar}&sil_id={$iceriklistesi[mysec].ID}" OnClick="javascript:if(confirm('Silmek istediðinizden eminmisiniz?')) return true;else return false;"><img src="{$yp_resim}icons/delete_16.gif" border="0" title="Silmek için týklayýnýz!"></a></td>
		   </tr>
		{/strip}
		{/section}
	</table>

{include file="admin_alt.tpl"}
