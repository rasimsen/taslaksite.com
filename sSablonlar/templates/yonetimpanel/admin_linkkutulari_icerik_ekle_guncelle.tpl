{include file="admin_ust.tpl" title="Admin"}
<br>
{literal}
<script>
	function formEkleGuncelle(frm){

		var hata=new Array();

		if(frm.SAYFA_ADI.value.length<3)
			hata.push("Sayfa Adýný boþ býrakmayýnýz!");

		if(frm.SAYFA_BASLIGI.value.length<3)
			hata.push("Sayfa Baþlýðýný boþ býrakmayýnýz!");
		
		if(frm.SAYFA_LINKI.value.length<3)
			hata.push("Sayfa Linkini boþ býrakmayýnýz!");
		
		
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
		<td valign="middle" colspan="2" height="20px"><h2>LINK EKLE/GÜNCELLEME</h2></td>
	</tr>
	<tr><td  colspan="2" style="border-bottom:1px silver solid; height:10px;"></td></tr>
	<tr><td  colspan="2" style="height:10px"></td></tr>
<form id="sEkleGuncelle" name="sEkleGuncelle" method="post" action="" onsubmit="return formEkleGuncelle(this);">	
	<tr><input type="hidden" name="ID" value="{$id}"/><input type="hidden" name="PARENT" value="{$parent}"/>
		<td valign="top">Kutu Adý:</td>
	  <td>{$kutu_adi}</td>
	</tr>
	<tr>
		<td valign="top">Link Adý:</td>
	  <td><input name="LINK_ADI" type="text" class="inputtext" value="{$link_adi}" size="48" maxlength="128" /></td>
	</tr>
	<tr>
		<td valign="top">Link URL:</td>
	  <td><input name="LINK_URL" type="text" class="inputtext" value="{$link_url}" size="48" maxlength="255" /></td>
	</tr>
	<tr>
		<td valign="top">Link Target:</td>
	  <td><select name="LINK_TARGET" size="1" class="inputtext">
	    <option value="_SELF" selected="selected">_SELF</option>
	    <option value="_BLANK">_BLANK</option>
	  </select><font color=red>{$link_target}</font></td>
	</tr>
	<tr>
		<td valign="top">Link Kaynak:</td>
	  <td><textarea name="LINK_SOURCE" class="inputtext" rows="10" cols="45">{$link_source}</textarea></td>
	</tr>
	<tr><td valign="top"></td><td style="border-bottom:1px silver solid; height:10px;"></td></tr>
	<tr>
	  <td>&nbsp;</td>
	  <td><input type="submit" name="btnSayfaEkleGuncelle" value="Kaydet" /></td>
    </tr>
</form>
</table>

{include file="admin_alt.tpl"}
