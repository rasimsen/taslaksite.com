{include file="admin_ust.tpl" title="Admin"}
<br>
{literal}
<script>
	function formSayfaEkleGuncelle(frm){

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
		<td valign="middle" colspan="2" height="20px"><h2>SAYFA EKLE/GÜNCELLEME</h2></td>
	</tr>
	<tr><td  colspan="2" style="border-bottom:1px silver solid; height:10px;"></td></tr>
	<tr><td  colspan="2" style="height:10px"></td></tr>
<form id="sSayfaEkleGuncelle" name="sSayfaEkleGuncelle" method="post" action="" onsubmit="return formSayfaEkleGuncelle(this);">	
	<tr>
		<td valign="top">Sayfa Adý:</td>
	  <td><input name="SAYFA_ADI" type="text" class="inputtext" value="{$sayfa_adi}" size="48" maxlength="48" /></td>
	</tr>
	<tr>
		<td valign="top">Sayfa Title:<br>Browserdaki TITLE kýsmýnda görülecektir </td>
	  <td><input name="SAYFA_BASLIGI" type="text" class="inputtext" value="{$sayfa_basligi}" size="64" maxlength="128" /></td>
	</tr>
	<tr>
		<td valign="top">Sayfa Linki:</td>
	  <td><input class="inputtext" type="text" name="SAYFA_LINKI" value="{$sayfa_linki}" maxlength="128" size="64" /></td>
	</tr>
	<tr>
		<td valign="top">Sayfa Taslaðý:</td>
	  <td><input class="inputtext" type="text" name="SAYFA_TASLAGI" value="{$sayfa_taslagi}" maxlength="64" size="60"  /></td>
	</tr>
	<tr>
		<td valign="top">Sayfa Ýkonu:</td>
	  <td>{$yp_resim}icons/<input class="inputtext" type="text" name="SAYFA_IKONU" value="{$sayfa_ikonu}" maxlength="128" size="48" /></td>
	</tr>
	<tr>
		<td valign="top">Target:</td>
	    <td aling="left"><select class="inputtext"  name="SAYFA_TARGET" id="id_SAYFA_TARGET" >{html_options options=$st selected=$sayfa_target}</select></td>
	</tr>
	<!--<tr>
		<td valign="top">Ana Menüde Linki Göster:</td>
	    <td aling="left"><select class="inputtext"  name="MENUDE_GOSTER" id="id_MENUDE_GOSTER" >{html_options options=$yn selected=$menude_goster}</select></td>
	</tr>-->
	<tr>
		<td valign="top">Sayfa Yerleþimi:</td>
	  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td><input type="radio" name="SAYFA_YERLESIMI" id="SAYFA_YERLESIMI" value="1" {if $sayfa_yerlesimi eq 1}checked{/if}/></td>
    <td><input type="radio" name="SAYFA_YERLESIMI" id="SAYFA_YERLESIMI2" value="2" {if $sayfa_yerlesimi eq 2}checked{/if}/></td>
    <td><input type="radio" name="SAYFA_YERLESIMI" id="SAYFA_YERLESIMI3" value="3" {if $sayfa_yerlesimi eq 3}checked{/if}/></td>
  </tr>
</table>
</td>
	</tr>

	<tr><td valign="top"></td><td style="border-bottom:1px silver solid; height:10px;"></td></tr>
	<tr>
		<td valign="top">Sadece Üyeler Görsün:</td>
	    <td><select class="inputtext"  name="SADECE_UYE" id="id_SADECE_UYE" >{html_options options=$yn selected=$sadece_uye}</select></td>
	</tr>
	
	<tr>
		<td valign="top">Bu Sayfa Yoruma Açýk olsun:</td>
	    <td aling="left"><select class="inputtext"  name="YORUM_ACIK" id="id_YORUM_ACIK" >{html_options options=$yn selected=$yorum_acik}</select></td>
	</tr>
	<tr>
		<td valign="top">Aramaya Dahil Et:</td>
	    <td aling="left"><select class="inputtext"  name="ARAMAYA_DAHIL" id="id_ARAMAYA_DAHIL" >{html_options options=$yn selected=$aramaya_dahil}</select></td>
	</tr>
	<tr>
		<td valign="top">Sayfada Gösterilecek Olan Link Kutularý:</td>
	    <td aling="left">
			{html_checkboxes name="AKTIF_LINK_KUTULARI" options=$lk selected=$aktif_link_kutulari separator="<br />"}	    	
	    	</td>
	</tr>
	<tr><td valign="top"></td><td style="border-bottom:1px silver solid; height:10px;"></td></tr>
	<tr>
	  <td>&nbsp;</td>
	  <td><input type="submit" name="btnSayfaEkleGuncelle" value="Kaydet" /></td>
    </tr>
</form>
</table>

{include file="admin_alt.tpl"}
