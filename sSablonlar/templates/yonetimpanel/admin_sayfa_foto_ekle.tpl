{include file="admin_ust.tpl" title="Admin"}

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
	<br><br>
	<center>
	  <b>Foto�raf Ekleme</b>
	</center>	
  <table width="50%" border="0" cellspacing="1" cellpadding="3" align="center">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr><td>&nbsp;</td><td>&nbsp;</td><td>A��klama(maks 255 karakter.)</td></tr>
    <tr><td>1.Foto</td><td><input type="file" name="DOSYA1[]" /></td><td><input type="text" name="KISA_ACIKLAMA1" maxlength="255" size="60"/></td></tr>
    <tr><td>2.Foto</td><td><input type="file" name="DOSYA2[]" /></td><td><input type="text" name="KISA_ACIKLAMA2" maxlength="255" size="60"/></td></tr>
    <tr><td>3.Foto</td><td><input type="file" name="DOSYA3[]" /></td><td><input type="text" name="KISA_ACIKLAMA3" maxlength="255" size="60"/></td></tr>
    <tr><td>4.Foto</td><td><input type="file" name="DOSYA4[]" /></td><td><input type="text" name="KISA_ACIKLAMA4" maxlength="255" size="60"/></td></tr>
    <tr><td colspan="3">Not: Birkerede 4 dosya y�klenebilir. Performans a��s�ndan b�yle yap�lm��t�r. Bu sayfaya s�n�rs�z say�da dosya eklenebilir..</td></tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><input type="submit" name="fotoKaydet" value="Kaydet" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

  <tr height="30">
    <td width="150" colspan="3">&nbsp;</td>
  </tr>
  <tr height="30">
    <td width="150" colspan="3"><b>Konu ile �lgili Dosyalar</b></td>
  </tr>
  <tr>
    <td colspan="3" valign=top class="icerik"> {section name=d loop=$dosyalistesi}
      {strip}
      <div style="border:1px solid #999999;padding:3px;width:150px;float:left; text-align:center">
       <img src="../dosya/foto/{$dosyalistesi[d].THUMBNAIL}" width="144" border="0" title="{$dosyalistesi[d].AD} - {$dosyalistesi[d].KISA_ACIKLAMA}"><br><b>{$dosyalistesi[d].AD}</b> <br> {$dosyalistesi[d].KISA_ACIKLAMA}<br>
        <a href="sayfalar.php?s=1&sayfa_adi={$sayfa_adi}&id={$id}&parent={$parent}&durum={if $dosyalistesi[d].DURUM}AKTIF{else}PASIF{/if}&img_durum_id={$dosyalistesi[d].ID}"><img src="{$yp_resim}icons/{if $dosyalistesi[d].DURUM}AKTIF{else}PASIF{/if}.gif" border="0" title="{if $dosyalistesi[d].DURUM}PAS�F{else}AKT�F{/if} etmek i�in t�klay�n�z!"></a> 
        &nbsp;<a href="sayfalar.php?s=1&sayfa_adi={$sayfa_adi}&id={$id}&parent={$parent}&img_sil_id={$dosyalistesi[d].ID}" OnClick="javascript:if(confirm('Silmek istedi�inizden eminmisiniz?')) return true;else return false;"><img src="{$yp_resim}icons/delete_16.gif" border="0" title="Silmek i�in t�klay�n�z!"></a> </div>
      {/strip}
      {/section} <br>
    </td>
  </tr>
    
  </table>
</form>

{include file="admin_alt.tpl"}
