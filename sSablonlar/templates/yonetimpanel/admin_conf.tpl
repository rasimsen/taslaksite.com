{include file="admin_ust.tpl" title="Admin"}

<form action="" method="post"><table width="400" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="80">Sablon : </td>
    <td width="80"><select name="TASLAK_TASARIM" id="select">
	    {html_options options=$sablon_liste selected=$secili_sablon}
    </select>
    </td>
    <td><input type="submit" name="btnSablonKaydet" id="button" value="Kaydet" /></td>
  </tr>
</table>
</form>

<h1>Genel Konfigürasyonlar</h1>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
  {section name=index loop=$conf}
  		{strip}
    <tr>
      <td width="150">{$conf[index].DEGISKEN} </td>
      <td><input type="text" name="conf_{$conf[index].ID}" value="{$conf[index].DEGER}" maxlength="1024" size="100" />{$conf[index].ACIKLAMA}</td>
      <td><input type="submit" name="btn_{$conf[index].ID}" value="{$conf[index].DEGISKEN} Kaydet" /></td>
    </tr>
		{/strip}
	{/section}
    <tr>
      <td width="150"><input type="text" name="conf_yeni_degisken" value="" maxlength="255" size="25" /></td>
      <td><input type="text" name="conf_yeni_deger" value="" maxlength="1024" size="75" /></td>
      <td><input type="submit" name="btn_yeni_ekle" value="Yeni Konfigürasyon Ekle" /></td>
    </tr>
    <tr height="40px">
      <td width="150">&nbsp;</td>
      <td><input type="submit" name="btn_tum_kaydet" value="Tümünü Kaydet" /></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
{include file="admin_alt.tpl"}

