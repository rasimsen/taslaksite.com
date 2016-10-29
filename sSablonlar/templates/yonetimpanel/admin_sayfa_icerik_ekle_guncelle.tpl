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
<a href="sayfalar.php?s=1&sayfa_adi={$sayfa_adi}&id={$parent}&parent={$geri_id}">Baþlýklarý Listele</a> | <a href="sayfalar.php?s=2&id=&parent={$parent}&geri_id={$geri_id}&sayfa_adi={$sayfa_adi}">Yeni Baþlýk Ekle</a>

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
	<center><b>Sayfalara Ýçerik Ekleme </b></center>	
  <table width="800px" border="0" cellspacing="1" cellpadding="3" align="center">
    <input type="hidden" name="islemTipi" value="{$islemTipi}"/> 
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="150">Sayfa Adý </td>
      <td><input type="text" name="SAYFA_ADI" readonly value="{$sayfa_adi}"/></td>
    </tr>
    <tr>
      <td>Baþlýk</td>
      <td><input type="text" name="BASLIK" value="{$baslik}"/></td>
    </tr>
    <tr>
      <td valign="top">Kýsa Özet(maks. 512 karakter)</td>
      <td><textarea name="KISA_OZET" cols="60" rows="10">{$kisa_ozet}</textarea></td>
    </tr>
    <tr>
      <td valign="top">Ýçerik(Maks. sýnýrsýz)</td>
      <td><textarea name="ICERIK" cols="60" rows="25">{$icerik}</textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr height="30">
      <td width="150" colspan="2"><b>Galeri Fotoðrafý</b></td>
    </tr>	
    <tr>
      <td colspan="2" valign=top>

		   <div style="border:1px solid #999999;padding:3px;width:150px;position:inherit;">
			  <img src="../dosya/foto/{$thumbnail}" border="0">
			  <br>
			  <a href="sayfalar.php?s=2&sayfa_adi={$sayfa_adi}&id={$id}&parent={$parent}&thumb_sil=ok" OnClick="javascript:if(confirm('Silmek istediðinizden eminmisiniz?')) return true;else return false;"><img src="{$yp_resim}icons/delete_16.gif" border="0" title="Silmek için týklayýnýz!"></a>
			</div>
      
		<br>
      </td>
    </tr>
    <tr><td>1.Foto</td><td><input type="file" name="THUMBNAIL[]" /></td></tr>
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

{include file="admin_alt.tpl"}
