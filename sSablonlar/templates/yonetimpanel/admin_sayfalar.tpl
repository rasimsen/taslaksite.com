{include file="admin_ust.tpl" title="Admin"} <br />

<p>
<table style="background-image:url({$yp_resim}tap_70.gif); background-repeat:repeat-x; height:27px; padding:5px;" width="100%" cellpadding="0" cellspacing="0">
 <tr><td style="font-weight:bold"><h5>{$yp_sayfa_aciklama}</h5></td><td align="right"><a href="sayfalar.php?s=2&id={$id}&parent={$parent}&sayfa_adi={$sayfa_adi}" ><img src="{$yp_resim}Modify.gif" border="0" title="{$baslik_adi} sayfas� i�erik ekle/g�ncelle" /></a>
	<a href="sayfalar.php?s=2&id=&parent={$id}&geri_id={$parent}&sayfa_adi={$sayfa_adi}"><img src="{$yp_resim}Add.gif" border="0" title="{$baslik_adi} sayfas�na alt ba�l�k ekle" /></a>
	<a href="sayfalar.php?s=3&id={$id}&parent={$parent}&sayfa_adi={$sayfa_adi}"><img src="{$yp_resim}Picture.gif" border="0" title="{$baslik_adi} sayfas�na Foto�raf ekle/g�ncelle" /></a>
	<a href="sayfalar.php?s=5&id={$id}&parent={$parent}&sayfa_adi={$sayfa_adi}"><img src="{$yp_resim}Load.gif" border="0" title="{$baslik_adi} sayfas�na Dosya ekle/g�ncelle" /></a>
	</td></tr></table>
</p>

<table width="800px" border="0" cellspacing="1" cellpadding="3" align="center" class="table_icerik">
  <tr>
    <td width="150">Sayfa Ad� </td>
    <td class="icerik">{$sayfa_adi}</td>
  </tr>
  <tr>
    <td>Ba�l�k</td>
    <td class="icerik">{$baslik}</td>
  </tr>
  <tr>
    <td valign="top">K�sa �zet(maks. 512 karakter)</td>
    <td class="icerik">{$kisa_ozet}</td>
  </tr>
  <tr>
    <td valign="top">��erik(Maks. s�n�rs�z)</td>
    <td class="icerik">{$icerik}</td>
  </tr>
  <tr>
    <td valign="top">Galeri Foto�raf�</td>
    <td class="icerik">{if strlen($thumbnail) gt 0}<div style="border:1px solid #999999;padding:3px;width:150px;position:inherit;"> <img src="../dosya/foto/{$thumbnail}" border="0"> <br>
        <a href="sayfalar.php?s=1&sayfa_adi={$sayfa_adi}&id={$id}&parent={$parent}&thumb_sil=ok" OnClick="javascript:if(confirm('Silmek istedi�inizden eminmisiniz?')) return true;else return false;"><img src="{$yp_resim}icons/delete_16.gif" border="0" title="Silmek i�in t�klay�n�z!"></a> </div>{else}<img src="{$yp_resim}foto_yok.gif" border="0" />{/if}</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr height="30">
    <td width="150" colspan="2"><b>Konu&nbsp;ile&nbsp;�lgili&nbsp;Foto�raflar</b></td>
  </tr>
  <tr>
    <td colspan="3" valign=top class="icerik"> {section name=d loop=$fotolistesi}
      {strip}
      <div style="border:1px solid #999999;padding:3px;width:150px;float:left; text-align:center">
       <img src="../dosya/foto/{$fotolistesi[d].THUMBNAIL}" width="144" border="0" title="{$fotolistesi[d].AD} - {$fotolistesi[d].KISA_ACIKLAMA}"><br><b>{$fotolistesi[d].AD}</b> <br> {$fotolistesi[d].KISA_ACIKLAMA}<br>
        <a href="sayfalar.php?s=1&sayfa_adi={$sayfa_adi}&id={$id}&parent={$parent}&durum={if $fotolistesi[d].DURUM}AKTIF{else}PASIF{/if}&img_durum_id={$fotolistesi[d].ID}"><img src="{$yp_resim}icons/{if $fotolistesi[d].DURUM}AKTIF{else}PASIF{/if}.gif" border="0" title="{if $fotolistesi[d].DURUM}PAS�F{else}AKT�F{/if} etmek i�in t�klay�n�z!"></a> 
        &nbsp;<a href="sayfalar.php?s=1&sayfa_adi={$sayfa_adi}&id={$id}&parent={$parent}&img_sil_id={$fotolistesi[d].ID}" OnClick="javascript:if(confirm('Silmek istedi�inizden eminmisiniz?')) return true;else return false;"><img src="{$yp_resim}icons/delete_16.gif" border="0" title="Silmek i�in t�klay�n�z!"></a> </div>
      {/strip}
      {/section} <br>
    </td>
  </tr>
  <tr height="30">
    <td width="150" colspan="2"><b>Konu ile �lgili Dosyalar</b></td>
  </tr>
  <tr>
    <td colspan="2" valign=top class="icerik"> {section name=d loop=$dosyalistesi}
      {strip}
      <div style="border:0px solid #999999;padding:3px;width:150px;float:left; text-align:center"><a  href="javascript://" onClick="acPopUp('sayfalar.php?s=6&id={$dosyalistesi[d].ID}')"><img src="{$yp_resim}Attachment.png" border="0" title="{$dosyalistesi[d].AD} - {$dosyalistesi[d].KISA_ACIKLAMA}"></a><br><b>{$dosyalistesi[d].AD}</b> <br> {$dosyalistesi[d].KISA_ACIKLAMA}<br>
        <a href="sayfalar.php?s=1&sayfa_adi={$sayfa_adi}&id={$id}&parent={$parent}&durum={if $dosyalistesi[d].DURUM}AKTIF{else}PASIF{/if}&img_durum_id={$dosyalistesi[d].ID}"><img src="{$yp_resim}icons/{if $dosyalistesi[d].DURUM}AKTIF{else}PASIF{/if}.gif" border="0" title="{if $dosyalistesi[d].DURUM}PAS�F{else}AKT�F{/if} etmek i�in t�klay�n�z!"></a> 
        &nbsp;<a href="sayfalar.php?s=1&sayfa_adi={$sayfa_adi}&id={$id}&parent={$parent}&img_sil_id={$dosyalistesi[d].ID}" OnClick="javascript:if(confirm('Silmek istedi�inizden eminmisiniz?')) return true;else return false;"><img src="{$yp_resim}icons/delete_16.gif" border="0" title="Silmek i�in t�klay�n�z!"></a> </div>
      {/strip}
      {/section} <br>
    </td>
  </tr>
</table>
<br>
<p><!---------- Alt ba�l�lar ---------->
<table style="background-image:url({$yp_resim}tap_70.gif); background-repeat:repeat-x; height:27px; padding:5px;" width="100%" cellpadding="0" cellspacing="0">
 <tr><td style="font-weight:bold">BU SAYFADA BULUNAN D��ER ��ER�KLER</td><td align="right">
	<a href="sayfalar.php?s=2&id=&parent={$id}&geri_id={$parent}&sayfa_adi={$sayfa_adi}"><img src="{$yp_resim}Add.gif" border="0" title="{$baslik_adi} sayfas�na alt ba�l�k ekle" /></a>
	<a href="sayfalar.php?s=3&id={$id}&parent={$parent}&sayfa_adi={$sayfa_adi}"><img src="{$yp_resim}Picture.gif" border="0" title="{$baslik_adi} sayfas�na Foto�raf ekle/g�ncelle" /></a>
	<a href="sayfalar.php?s=5&id={$id}&parent={$parent}&sayfa_adi={$sayfa_adi}"><img src="{$yp_resim}Load.gif" border="0" title="{$baslik_adi} sayfas�na Dosya ekle/g�ncelle" /></a>
	</td></tr></table>
</p>
<p>
<table width="800px" border="0" cellspacing="1" cellpadding="3" align="center">
  <tr>
    <th width="30">S�ra</th>
    <th width="20">Foto</th>
    <th>BA�LIK</th>
    <th width="100">&nbsp;</th>
  </tr>
  <form action="" method="post" name="form2" id="form2">
    {section name=mysec loop=$iceriklistesi}
    {strip}
    <tr bgcolor="{cycle values="#f2f3f3,#ffffff"}">
      <td><input type="text" name="sira_{$iceriklistesi[mysec].ID}" id="siraId" value="{$iceriklistesi[mysec].SIRA}" size="2" style="text-align:right"/></td>
      <td><a href="sayfalar.php?s=1&sayfa_adi={$sayfa_adi}&id={$iceriklistesi[mysec].ID}&parent={$iceriklistesi[mysec].PARENT}"><img src="../dosya/foto/{if strlen($iceriklistesi[mysec].THUMBNAIL)>0}{$iceriklistesi[mysec].THUMBNAIL}{else}spacer.gif{/if}" width="32" alt = "{$iceriklistesi[mysec].ID}" title = "{$iceriklistesi[mysec].ID}" /></a></td>
      <td><a href="sayfalar.php?s=1&sayfa_adi={$sayfa_adi}&id={$iceriklistesi[mysec].ID}&parent={$iceriklistesi[mysec].PARENT}">{$iceriklistesi[mysec].BASLIK}</a></td>
      <td><a href="sayfalar.php?s=1&sayfa_adi={$sayfa_adi}&id={$iceriklistesi[mysec].ID}&parent={$iceriklistesi[mysec].PARENT}"><img src="{$yp_resim}icons/preview.gif" border="0" title="�nizle" /></a>&nbsp; <a href="sayfalar.php?s=2&sayfa_adi={$sayfa_adi}&id={$iceriklistesi[mysec].ID}&parent={$iceriklistesi[mysec].PARENT}"><img src="{$yp_resim}icons/edit.png" border="0" title="G�ncelle" /></a>&nbsp; <a href="sayfalar.php?s=1&sayfa_adi={$sayfa_adi}&durum={$iceriklistesi[mysec].DURUM}&durum_id={$iceriklistesi[mysec].ID}"><img src="{$yp_resim}icons/{$iceriklistesi[mysec].DURUM}.gif" border="0" title="{$iceriklistesi[mysec].DURUM} etmek i�in t�klay�n�z!"></a>&nbsp; <a href="sayfalar.php?s=1&sayfa_adi={$sayfa_adi}&sil_id={$iceriklistesi[mysec].ID}" OnClick="javascript:if(confirm('Silmek istedi�inizden eminmisiniz?')) return true;else return false;"><img src="{$yp_resim}icons/delete_16.gif" border="0" title="Silmek i�in t�klay�n�z!"></a></td>
    </tr>
    {/strip}
    {/section}
    <tr>
      <td colspan=4><input type="submit" name="btnSira" value="S�ralama Kaydet"/></td>
    </tr>
  </form>
</table>
{include file="admin_alt.tpl"} 