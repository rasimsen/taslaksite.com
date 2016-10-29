{include file="sayfa_ustu.tpl"}<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td valign="top">{include file="sol_panel.tpl"}</td>
<td valign="top" width="100%" style="padding:5px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  {section name=icerik loop=$sayfa_icerik}
  {strip}
  <tr>
    <td width="1px" valign="top">{include file="thumbnail.tpl"}</td>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="3">
        <tr>
          <td class="baslik">{$sayfa_icerik[icerik].BASLIK}</td>
        </tr>
        <tr>
          <td class="icerik">{$sayfa_icerik[icerik].KISA_OZET}</td>
        </tr>
        <tr>
          <td class="icerik">{$sayfa_icerik[icerik].ICERIK}</td>
        </tr>
        <tr>
          <td height="20"></td>
        </tr>
		<tr><td valign="top">{include file="foto_listesi.tpl"}<br>{include file="dosya_listesi.tpl"}</td></tr>
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
{/strip}
{/section}
</table>

{if count($alt_basliklar) gt 0 } {include file="taslak_sayfa_alt_basliklar.tpl"}{/if}

<h2>En son eklenenler..</h2>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  {section name=i loop=$guncel_veri}
  {strip}
	    <tr><td valign="top"><table>
		<tr>
	      <td rowspan="2">{if strlen($guncel_veri[i].THUMBNAIL) gt 0}<div style="float:left">{include file="thumbnail2.tpl"}</div>{/if}</td>
		  <td class="baslik" align="left"><a href="index.php?id={$guncel_veri[i].ID}">{$guncel_veri[i].BASLIK}</a></td>
	        </tr>
	        <tr>
	          <td class="icerik" align="left">{$guncel_veri[i].KISA_OZET} <a href="index.php?id={$guncel_veri[i].ID}">( <img src="{$resim}kitap_16.png" border="0" align="middle"> devamý için týklayýnýz..)</a></td>
	        </tr>
		</table>
		</td></tr>        
        <tr>
          <td class="icerik">
	          <table style = "border:1px solid silver;" cellspacing="0" cellpadding="3" width="100%">
	          	<tr style="background-color:silver;"><td colspan="4"><b>Etiketler:</b> {$guncel_veri[i].ETIKET}</td></tr>
	          	<tr><td><b>Kategori:</b> <a href="index.php?kategori_id={$guncel_veri[i].PARENT}">{$guncel_veri[i].KATEGORI_ADI}</a></td>
	          		<td><!--Yorum:32 ****-->&nbsp;</td>
	          		<td width="100"><img src="{$resim}kullanici_16.png" border="0"> {$guncel_veri[i].KULLANICI_ADI}</td>
	          		<td width="150"><img src="{$resim}takvim_16.gif" border="0"> {$guncel_veri[i].SIZ|date_format:"%d.%m.%Y %H:%M:%S"}</td>
	          	</tr>
	          </table>
			</td>
        </tr>
        <tr>
          <td class="icerik">{$guncel_veri[i].ICERIK}</td>
        </tr>
        <tr><td class="icerik">&nbsp;</td></tr>
{/strip}
{/section}
        <tr>
          <td class="icerik">{$taslak_navigator_genel}</td>
        </tr>
</table>

{if DEF_YORUM_ACIK } {include file="yorum.tpl"}{/if}

</td>
<td valign="top">{include file="sag_panel.tpl"}</td>
</tr></table>

{include file="sayfa_alti.tpl"} 