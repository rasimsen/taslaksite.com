{include file="admin_ust.tpl" title="Admin"}

	<table border="0" align="center"><tr valign="top"><td>
		{include file="admin_kategori_icerik_veg.tpl" title="Admin"}	
	</td><td style="background-color:#F1F0EF">
		{include file="admin_kategori_veg.tpl" title="Admin"}	
	</td></table>

	<br><br>
	
	<center><b>Son Eklenen Ba�l�klar</b></center>	

	  <table width="95%" border="0" cellspacing="1" cellpadding="3" align="center">
	  	<tr><th>Ba�l�k</th><th width="120">Eklenme Tarihi</th></tr>	
		{section name=i loop=$baslik_veri}
		{strip}
		   <tr bgcolor="{cycle values="#f2f3f3,#ffffff"}">
			  <td>
			  	<a href="kategoriler.php?islem=baslik&id={$baslik_veri[i].ID}">{$baslik_veri[i].BASLIK}</a>
			  	&nbsp;<a href="kategoriler.php?islem=baslik&id={$baslik_veri[i].ID}"><img src="{$yp_resim}icons/update.gif" border="0" title="G�ncelle"></a>
		  		&nbsp;<a href="kategoriler.php?islem=baslik&durum={$baslik_veri[i].DURUM}&durum_id={$baslik_veri[i].ID}" OnClick="javascript:if(confirm('{if $baslik_veri[i].DURUM eq 1}Pasif{else}Aktif{/if} yapmak istedi�inizden emin misiniz?')) return true;else return false;"><img src="{$yp_resim}icons/{$veri[i].DURUM}.gif" border="0" title="{if $veri[i].DURUM eq 1}Pasif{else}Aktif{/if} etmek i�in t�klay�n�z!"></a>
			  	&nbsp;<a href="kategoriler.php?islem=baslik&sil_id={$baslik_veri[i].ID}" OnClick="javascript:if(confirm('Silmek istedi�inizden eminmisiniz?')) return true;else return false;"><img src="{$yp_resim}icons/delete_16.gif" border="0" title="Silmek i�in t�klay�n�z!"></a></td>
			  </td>
			  <td align=center>{$baslik_veri[i].DEG_TARIHI} {$baslik_veri[i].DEG_SAATI}</td>
		   </tr>
		{/strip}
		{/section}
        <tr>
          <td class="icerik" colspan="2">{$taslak_navigator_genel}</td>
        </tr>		
	</table>

{include file="admin_alt.tpl"}
