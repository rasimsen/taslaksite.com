{include file="admin_ust.tpl" title="Admin"}
<br />
<p>
<table style="background-image:url({$yp_resim}tap_70.gif); background-repeat:repeat-x; height:27px; padding:5px;" width="100%" cellpadding="0" cellspacing="0">
 <tr><td style="font-weight:bold"><h5>{$yp_sayfa_aciklama}</h5></td><td align="right">
 	<a href="yorumlar.php?DURUM=0">Onaylanmamýþ</a> 
 	| <a href="yorumlar.php?DURUM=1">Onaylanmýþ</a> 
 	| <a href="yorumlar.php?DURUM=">Tümü</a> 
 </td></tr></table>
</p>
<p>
		
	  <table width="95%" border="0" cellspacing="1" cellpadding="3" align="center">
	  	<tr>
	  		<th width="*">YORUM</th>
	  		<th width="80">SAYFA</th>
	  		<th width="80">KULLANICI</th>
	  		<th width="80">TARÝH</th>
	  		<th width="60">ONAYLAYAN</th>
	  		<th width="25">&nbsp;</th>
	  		<th width="25">&nbsp;</th>
	  	</tr>	
		{section name=mysec loop=$iceriklistesi}
		{strip}
		   <tr bgcolor="{cycle values="#f2f3f3,#ffffff"}">			  
			  <td>{$iceriklistesi[mysec].YORUM}</td>
			  <td>{$iceriklistesi[mysec].SAYFA_ADI}</td>
			  <td>{$iceriklistesi[mysec].KULLANICI_ADI}-{$iceriklistesi[mysec].EMAIL}</td>
			  <td>{$iceriklistesi[mysec].TARIH}</td>
			  <td>{$iceriklistesi[mysec].ADMIN}</td>
			  <td><a href="yorumlar.php?durum={if $iceriklistesi[mysec].DURUM}AKTIF{else}PASIF{/if}&durum_id={$iceriklistesi[mysec].ID}"><img src="{$yp_resim}icons/{if $iceriklistesi[mysec].DURUM}AKTIF{else}PASIF{/if}.gif" border="0" title="{if $iceriklistesi[mysec].DURUM}PASÝF{else}AKTÝF{/if} etmek için týklayýnýz!"></a></td>
			  <td><a href="yorumlar.php?sil_id={$iceriklistesi[mysec].ID}" OnClick="javascript:if(confirm('Silmek istediðinizden eminmisiniz?')) return true;else return false;"><img src="{$yp_resim}icons/delete_16.gif" border="0" title="Silmek için týklayýnýz!"></a></td>
		   </tr>
		{/strip}
		{/section}

        <tr>
          <td class="icerik" colspan="7">{$taslak_navigator_genel}</td>
        </tr>		
		
	</table>
<p>
<table style="background-image:url({$yp_resim}tap_70.gif); background-repeat:repeat-x; height:27px; padding:5px;" width="100%" cellpadding="0" cellspacing="0">
 <tr><td style="font-weight:bold"><h5>{$yp_sayfa_aciklama}</h5></td><td align="right">
 	<a href="yorumlar.php?DURUM=0">Onaylanmamýþ</a> 
 	| <a href="yorumlar.php?DURUM=1">Onaylanmýþ</a> 
 	| <a href="yorumlar.php?DURUM=">Tümü</a> 
 </td></tr></table>
</p>

{include file="admin_alt.tpl"}
