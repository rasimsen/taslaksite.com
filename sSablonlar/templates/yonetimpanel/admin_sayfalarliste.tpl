{include file="admin_ust.tpl" title="Admin"}

	<center><b>Sayfalar Liste</b></center>	

	  <table width="800px" border="0" cellspacing="1" cellpadding="3" align="center">
		<tr><td  colspan="3" style="border-bottom:0px silver solid; height:10px;"><a href="sayfalar.php?s=4">Yeni Sayfa Ekle</a></td></tr>
	  	<tr><th width="30">SIRA</th><th>SAYFA ADI</th><th>�ST MEN�DE G�STER</th><th>ALT MEN�DE G�STER</th><th>DURUM</th></tr>	
<form action="" method="post" name="form2" id="form2">
{literal}
	<script>
		function durumDegistir(durum){
			var mesaj='Durumu '+(durum==1?'Pasif':'Aktif')+' yapmak �zereseniz!';
			return confirm(mesaj)?true:false;
		}
	</script>
{/literal}
		{section name=mysec loop=$sayfalistesi}
		{strip}
		   <tr bgcolor="{cycle values="#f2f3f3,#ffffff"}">
			  <td><input type="text" name="sira_{$sayfalistesi[mysec].ID}" id="siraId" value="{$sayfalistesi[mysec].SIRA}" size="2" style="text-align:right"/></td>
			  <td><a href="sayfalar.php?s=1&id={$sayfalistesi[mysec].ID}&parent=0&sayfa_adi={$sayfalistesi[mysec].SAYFA_ADI}">{$sayfalistesi[mysec].SAYFA_ADI}</a>&nbsp;&nbsp;&nbsp;<a href="sayfalar.php?s=4&id={$sayfalistesi[mysec].ID}">G�ncelle</a></td>
			  <td><a href="sayfalar.php?ust_menude_goster={$sayfalistesi[mysec].UST_MENUDE_GOSTER}&durum_id={$sayfalistesi[mysec].SAYFA_ADI}" OnClick="return durumDegistir('{$sayfalistesi[mysec].UST_MENUDE_GOSTER}')"><img src="{$yp_resim}icons/{$sayfalistesi[mysec].UST_MENUDE_GOSTER}.gif" border="0"></a></td>
			  <td><a href="sayfalar.php?alt_menude_goster={$sayfalistesi[mysec].ALT_MENUDE_GOSTER}&durum_id={$sayfalistesi[mysec].SAYFA_ADI}" OnClick="return durumDegistir('{$sayfalistesi[mysec].ALT_MENUDE_GOSTER}')"><img src="{$yp_resim}icons/{$sayfalistesi[mysec].ALT_MENUDE_GOSTER}.gif" border="0"></a></td>
			  <td><a href="sayfalar.php?durum={$sayfalistesi[mysec].DURUM}&durum_id={$sayfalistesi[mysec].SAYFA_ADI}" OnClick="return durumDegistir('{$sayfalistesi[mysec].DURUM}')"><img src="{$yp_resim}icons/{$sayfalistesi[mysec].DURUM}.gif" border="0"></a></td>
		   </tr>
		{/strip}
		{/section}
		<tr><td class="veri_liste_alt" colspan=5><input type="submit" name="btnMenuSira" value="S�ralama Kaydet"/></td></tr>
</form>
	</table>
<p><u>Not</u>
<ul>
	<li>DURUM Pasif yap�l�rsa, sitede o sayfaya eri�im engellenir</li>
	<li>�ST MEN�DE G�STER pasif yap�l�rsa, sayfa �st�ndeki men� linklerinden ��kar�l�r</li>
	<li>ALT MEN�DE G�STER pasif yap�l�rsa, sayfa alt�nda men� linklerinden ��kar�l�r</li>
</ul>
{include file="admin_alt.tpl"}
