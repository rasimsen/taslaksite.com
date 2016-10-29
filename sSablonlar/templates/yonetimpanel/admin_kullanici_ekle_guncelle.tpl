{include file="admin_ust.tpl" title="Admin"}
<br>
{literal}
<script>
	/**
	 * email adresini kontrol eder
	 * @param {Object} elem
	 */
	function checkEmail(elem) {
	    var str = elem.value;
	    var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
	    if (!str.match(re)) {
	        //alert("Verify the e-mail address format.");
	        //setTimeout("focusElement('" + elem.form.name + "', '" + elem.name + "')", 0);
	        return false;
	    } else {
	        return true;
	    }
	}

	function formUyeOl(frm){

		var hata=new Array();
		if(!checkEmail(frm.EMAIL))
			hata.push("Email adresinizi kontrol ediniz");

		if(frm.AD_SOYAD.value.length<3)
			hata.push("Ad Soyad bilginizi kontrol ediniz");

		if(frm.KULLANICI_ADI.value.length<3)
			hata.push("Kullanýcý adi bilginizi kontrol ediniz");
		
		if(frm.SIFRE.value==null || (frm.SIFRE.value!=frm.TEKRAR_SIFRE.value))
			hata.push("Þifre bilginizi kontrol ediniz");
		
		if(hata.length==0){
			return true;
		}else{
			alert("Lütfen \n"+hata.join(",\n"));
			return false;
		}
		
		return true;		
	}
</script>
{/literal}

<table border="0" cellspacing="5" cellpadding="0" align="left">
	<tr>
		<td valign="middle" colspan="2" height="30px"><h2>YÖNETÝCÝ EKLE/GÜNCELLEME</h2></td>
	</tr>
	<tr><td  colspan="2" style="border-bottom:1px silver solid; height:10px;"></td></tr>
	<tr><td  colspan="2" style="height:10px"></td></tr>
<form id="sHizliUyeOl" name="sHizliUyeOl" method="post" action="" onsubmit="return formUyeOl(this);">	
	<tr>
		<td valign="top">Ad Soyad:</td>
	  <td><input class="inputtext" type="text" name="AD_SOYAD" value="{$ad_soyad}"/></td>
	</tr>
	<tr>
		<td valign="top">Kullanýcý Adý:</td>
	  <td><input class="inputtext" type="text" name="KULLANICI_ADI" value="{$kullanici_adi}" /></td>
	</tr>
	<tr>
		<td valign="top">Email Adresi:</td>
	  <td><input class="inputtext" type="text" name="EMAIL" value="{$email}" /></td>
	</tr>
	<tr>
		<td valign="top">Þifre:</td>
	  <td><input class="inputtext" type="password" name="SIFRE" /></td>
	</tr>
	<tr>
		<td valign="top">Þifre Tekrarý:</td>
	    <td><input class="inputtext" type="password" name="TEKRAR_SIFRE" /></td>
	</tr>
	<tr><td valign="top"></td><td style="border-bottom:1px silver solid; height:10px;"></td></tr>
	<tr>
	  <td>&nbsp;</td>
	  <td><input type="submit" name="btnHizliUyeOl" value="Kaydet" /></td>
    </tr>
</form>
</table>

{include file="admin_alt.tpl"}
