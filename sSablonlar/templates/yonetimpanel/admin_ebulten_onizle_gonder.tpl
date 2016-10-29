{include file="admin_ust.tpl" title="Admin"}

{literal}
<script type="text/javascript">
function MM_openBrWindow(theURL) {
  window.open(theURL,'EBULTENEMAIL','status=yes,scrollbars=yes,resizable=yes,width=450,height=500');
}

function formBultenGonder(obj){
	if(confirm("Bülten gönderilmek üzere?")){
		return true;
	}else{
		return false;
	}
}

</script>
{/literal}

<form action="" method="post" name="form1" id="form1">
	<center><h2>e-Bülten Önizleme & Gönderme</h2></center>	
  <table width="800px" border="0" cellspacing="1" cellpadding="3" align="center">
    <tr>
      <td width="150px">Bülten Konu</td>
      <td>{$baslik}</td>
    </tr>
    <tr>
      <td valign="top">Kýsa Özet(maks. 255 karakter)</td>
      <td>{$hizli_bakis_icerik}</td>
    </tr>
    <tr>
      <td valign="top">Ýçerik(Maks. sýnýrsýz)</td>
      <td>{$icerik}</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><a href="#" onClick="MM_openBrWindow('ebulten.php?s=4')">Bülten Gönderilecekler Listesi</a></td>
    </tr>
<form id="sBultenGonder" name="sSayfaEkleGuncelle" method="post" action="" onsubmit="return formBultenGonder(this);">	
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="ebultenGönder" value="E-Bülten Gönder" /></td>
    </tr>
    </form>
  </table>
</form>
