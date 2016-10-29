{include file="admin_ust.tpl" title="Admin"}
    {literal}
    <script type="text/javascript" src="sAraclar/gelismisHTML/fckeditor.js"></script>
    <script type="text/javascript">
        var oFCKeditor = new FCKeditor( 'ICERIK' ) ;
         var sBasePath = 'sAraclar/gelismisHTML/';//document.location.pathname.substring(0,document.location.pathname.lastIndexOf('wl.html'));
      window.onload = function()
      {
		 oFCKeditor.Height="450";
		 oFCKeditor.BasePath	= sBasePath;
        oFCKeditor.ReplaceTextarea() ;
      }
      
    </script>
    {/literal}

<form action="" method="post" name="form1" id="form1">
	<center><b>e-Bülten Ekleme</b></center>	
  <table width="800px" border="0" cellspacing="1" cellpadding="3" align="center">
    <input type="hidden" name="islemTipi" value="{$islemTipi}"/> 
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Bülten Konu</td>
      <td><input type="text" name="BASLIK" value="{$baslik}"/></td>
    </tr>
    <tr>
      <td valign="top">Kýsa Özet(maks. 255 karakter)</td>
      <td><textarea name="HIZLI_BAKIS_ICERIK" cols="60" rows="10">{$hizli_bakis_icerik}</textarea></td>
    </tr>
    <tr>
      <td valign="top">Ýçerik(Maks. sýnýrsýz)</td>
      <td><textarea name="ICERIK" cols="60" rows="25">{$icerik}</textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="ebultenKaydet" value="Kaydet" /></td>
    </tr>
  </table>
</form>
