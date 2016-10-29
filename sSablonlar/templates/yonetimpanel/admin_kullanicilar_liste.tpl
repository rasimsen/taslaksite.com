{include file="admin_ust.tpl" title="Admin"}

	<center><b>KULLANICILAR</b></center>	

<form action="" method="post" name="form3" id="form3">
	<br>
	<center>
	<table><tr>
		<td>Arama</td>
		<td><input type="text" name="textAra" maxlength=64 size="30" value="{$textAra}"></td>
		<td><select class="inputtext"  name="DURUM" id="id_DURUM" >{html_options options=$kd selected=$durum}</select></td>
		<td><input type="submit" name="kullaniciArama" value="ARA"></td>
	</tr>
	<tr><td colspan="4">{$sonuc}</td></tr>
	</table>
	</center>
	<br>
</form>

	  <table width="800px" border="0" cellspacing="1" cellpadding="3" align="center">
	  	<tr>
	  	<th width="30">&nbsp;</th>	
	  	<th width="30">&nbsp;</th>	
	  	<th>KULLANICI ADI</th>
	  	<th>EMAIL</th>
	  	<th>AD</th>
	  	<th>EÐÝTÝM</th>
	  	<th>CINSIYET</th>
	  	<th>DOÐUM TARÝHÝ</th>
	  	<th>ÞEHÝR</th>
		<tr><td  colspan="9" style="border-bottom:1px silver solid; height:1px;"></td></tr>
<form action="" method="post" name="form2" id="form2">
		{section name=mysec loop=$iceriklistesi}
		{strip}
		   <tr bgcolor="{cycle values="#f2f3f3,#ffffff"}">
			  <td><a href="kullanicilar.php?durum={if $iceriklistesi[mysec].DURUM eq 1}0{else}1{/if}&durum_id={$iceriklistesi[mysec].ID}"><img src="{$yp_resim}icons/{if $iceriklistesi[mysec].DURUM eq 1}AKTIF{else}PASIF{/if}.gif" border="0" title="{if $iceriklistesi[mysec].DURUM eq 1}PASIF{else}AKTIF{/if} etmek için týklayýnýz!"></a></td>
			  <td><a href="kullanicilar.php?sil_id={$iceriklistesi[mysec].ID}" OnClick="javascript:if(confirm('Silmek istediðinizden eminmisiniz?')) return true;else return false;"><img src="{$yp_resim}icons/delete_16.gif" border="0" title="Silmek için týklayýnýz!"></a></td>
			  <td>{$iceriklistesi[mysec].KULLANICI_ADI}</td>
			  <td>{$iceriklistesi[mysec].EMAIL}</td>
			  <td>{$iceriklistesi[mysec].AD}{$iceriklistesi[mysec].SOYAD}</td>
			  <td>{$iceriklistesi[mysec].EGITIM}</td>
			  <td>{$iceriklistesi[mysec].CINSIYET}</td>
			  <td>{$iceriklistesi[mysec].DOGUM_TARIHI}</td>
			  <td>{$iceriklistesi[mysec].SEHIR}</td>
		   </tr>
		{/strip}
		{/section}
		<tr><td  colspan="9" style="border-bottom:1px silver solid; height:1px;"></td></tr>
		<tr><td colspan=9><input type="submit" name="btnMenuSira" value="Sýralama Kaydet"/></td></tr>
</form>
	</table>

{include file="admin_alt.tpl"}
