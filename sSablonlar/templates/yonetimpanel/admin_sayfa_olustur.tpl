{include file="admin_ust.tpl" title="Admin"}

<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr height="40px">
      <td>Tablo Ad&#305;</td><input name="s" type="hidden" value="1">
      <td><select name=tablo_ismi>{html_options options=$tablo_listesi selected=$tablo_secilen}</select></td>
      <td>&nbsp;</td>
    </tr>
    <tr height="40px">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr height="40px">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr height="40px">
      <td width="150">&nbsp;</td>
      <td><input type="submit" name="btn_sayfa_olustur" value="Sayfa Olustur" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr height="40px">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
{include file="admin_alt.tpl"}