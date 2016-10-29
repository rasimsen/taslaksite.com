{config_load file="genel.conf"}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<title>{$title|default:"Login"}</title>
<link href="{$kp_stil}" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="padding-top:110px;">
<table width="390px" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td class="dust_sol"></td>
    <td class="dust_bg"></td>
    <td class="dust_sag"></td>
  </tr>
  <tr>
    <td class="dorta_sol_bg"></td>
    <td class="dorta_bg" align="center"><img src="{$yp_resim}tap0_45.gif" width="361" height="77" alt="">
    	<table border="0" cellspacing="0" cellpadding="3">
          <form id="form1" name="form1" method="post" action="">
          <tr>
            <td colspan="2"><div style="text-align:center;width:100%">{$mesajTaslakSite}</div></td>
          </tr>
          <tr>
            <td align="right">Email:</td>
            <td align="left">
              <input type="text" name="yp_kullanici_adi" id="textfield" maxlength="32" />            </td>
          </tr>
          <tr>
            <td align="right">Şifre:</td>
            <td align="left"><input type="password" name="yp_sifre" id="textfield2" maxlength="16" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="left"><input style="border:none; background-color:white;" name="btnAdminLogin" type="image" src="{$yp_resim}tap0_74.gif" width="128" height="33" alt="Giriş" onclick="javascript:this.submit();"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          </form>
        </table>
    </td>
    <td class="dorta_sag_bg"></td>
  </tr>
  <tr>
    <td class="dalt_sol"></td>
    <td class="dalt_bg"></td>
    <td class="dalt_sag"></td>
  </tr>
</table>

</body>
</html>
