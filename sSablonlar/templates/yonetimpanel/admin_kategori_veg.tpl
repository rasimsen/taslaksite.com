{literal}
<script>
	function formEkleGuncelle(frm){

		var hata=new Array();

		if(frm.SAYFA_ADI.value.length<3)
			hata.push("Sayfa Ad�n� bo� b�rakmay�n�z!");

		if(frm.SAYFA_BASLIGI.value.length<3)
			hata.push("Sayfa Ba�l���n� bo� b�rakmay�n�z!");
		
		if(frm.SAYFA_LINKI.value.length<3)
			hata.push("Sayfa Linkini bo� b�rakmay�n�z!");
		
		
		if(hata.length==0){
			return true;
		}else{
			alert("L�tfen \n"+hata.join(",\n"));
			return false;
		}
		
		return true;		
	}
</script>
{/literal}

<p><table border="0" cellspacing="5" cellpadding="0" align="center">
<form id="sEkleGuncelle" name="sEkleGuncelle" method="post" action="" onsubmit="return formEkleGuncelle(this);">	
	<input type="hidden" name="ID" value="{$id}"/>
	<tr><td valign="top">KATEGOR� ADI:</td></tr>
	<tr><td><input name="KATEGORI_ADI" type="text" class="inputtext" value="{$kategori_adi}" size="48" maxlength="48" /></td></tr>
	<tr><td><select name=kategori>
			<option value="0" selected>Ana Kategori</option>
			{html_options options=$kat_liste}
	  </select>&nbsp;<input type="submit" name="btnEkleGuncelle" value="Yeni Kategori Ekle" /></td></tr>
</form>
</table>
	  
	  <hr>
	  
	  <table width="100%" border="0" cellspacing="1" cellpadding="3" align="left">
<form action="" method="post" name="form2" id="form2">
		{section name=i loop=$veri}
		{strip}
		   <tr bgcolor="{cycle values="#f2f3f3,#ffffff"}">
			  <td width="10px"><input type="text" name="sira_{$veri[i].ID}" id="siraId" value="{$veri[i].SIRA}" size="1" style="text-align:right"/></td>
			  <td><a href="kategoriler.php?s=1&kategori_id={$veri[i].ID}">{$veri[i].KATEGORI_ADI}</a>
			  		&nbsp;<a href="kategoriler.php?islem=kategori&s=4&id={$veri[i].ID}"><img src="{$yp_resim}icons/update.gif" border="0" title="G�ncelle"></a>
			  		&nbsp;<a href="kategoriler.php?islem=kategori&durum={$veri[i].DURUM}&durum_id={$veri[i].ID}" OnClick="javascript:if(confirm('{if $veri[i].DURUM eq 1}Pasif{else}Aktif{/if} yapmak istedi�inizden emin misiniz?')) return true;else return false;"><img src="{$yp_resim}icons/{$veri[i].DURUM}.gif" border="0" title="{if $veri[i].DURUM eq 1}Pasif{else}Aktif{/if} etmek i�in t�klay�n�z!"></a>
				  	&nbsp;<a href="kategoriler.php?islem=kategori&sil_id={$veri[i].ID}" OnClick="javascript:if(confirm('Silmek istedi�inizden eminmisiniz?')) return true;else return false;"><img src="{$yp_resim}icons/delete_16.gif" border="0" title="Silmek i�in t�klay�n�z!"></a></td>
		   </tr>
		{/strip}
		{/section}
		<tr><td colspan=2><input type="submit" name="btnMenuSira" value="S�ralama Kaydet"/></td></tr>
</form>
	</table>

