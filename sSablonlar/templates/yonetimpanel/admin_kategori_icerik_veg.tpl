    {literal}
    <script type="text/javascript" src="sAraclar/gelismisHTML/fckeditor.js"></script>
    <script type="text/javascript">
        var oFCKeditor = new FCKeditor( 'ICERIK' ) ;
         var sBasePath = 'sAraclar/gelismisHTML/';//document.location.pathname.substring(0,document.location.pathname.lastIndexOf('wl.html'));
      window.onload = function()
      {
		 oFCKeditor.Height="500";
		 oFCKeditor.BasePath	= sBasePath;
        oFCKeditor.ReplaceTextarea() ;
      }
      
    </script>
    {/literal}

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="0" cellspacing="1" cellpadding="3" align="center">
    <input type="hidden" name="islemTipi" value="{$islemTipi}"/> 
    <tr><td width="150">Baþlýk (<a href="kategoriler.php">Yeni Konu Ekle</a>)</td></tr>
    <tr><td><input type="text" name="BASLIK" value="{$veri_detay.BASLIK}"  size="78" maxlength="128" style="font-size:16px; font-weight:bold;" /></td></tr>
    <tr><td valign="top">Kýsa Özet(maks. 512 karakter)</td></tr>
     <tr><td><textarea name="KISA_OZET" cols="125" rows="5">{$veri_detay.KISA_OZET}</textarea></td></tr>
    <tr><td valign="top">Ýçerik(Maks. sýnýrsýz)</td></tr>
    <tr><td><textarea name="ICERIK" cols="60" rows="25">{$veri_detay.ICERIK}</textarea></td></tr>
    <tr><td width="150">Etiketler</td></tr>
    <tr><td><input type="text" name="ETIKETLER" value="{$veri_detay.ETIKETLER}"  size="128" maxlength="128" /></td></tr>

    <tr><td width="150">Kategori</td></tr>
    <tr><td><select name=kategori>
			{html_options options=$kat_liste selected=$secili_kategori}
	  </select>
	</td></tr>

    <tr height="30"><td><b>Galeri Fotoðrafý</b></td></tr>	
    <tr><td><input type="file" name="THUMBNAIL[]" /></td></tr>
    <tr>
      <td valign=top>

		   <div style="border:1px solid #999999;padding:3px;width:150px;position:inherit;">
			  <img src="../dosya/foto/{$veri_detay.THUMBNAIL}" border="0">
			  <br>
			  <a href="sayfalar.php?s=2&sayfa_adi={$sayfa_adi}&id={$id}&parent={$parent}&thumb_sil=ok" OnClick="javascript:if(confirm('Silmek istediðinizden eminmisiniz?')) return true;else return false;"><img src="{$yp_resim}icons/delete_16.gif" border="0" title="Silmek için týklayýnýz!"></a>
			</div>
      
		<br>
      </td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
    </tr>	
    <tr>
      <td><input type="submit" name="kategoriBaslikKaydet" value="Kaydet" /></td>
    </tr>
  </table>
</form>
