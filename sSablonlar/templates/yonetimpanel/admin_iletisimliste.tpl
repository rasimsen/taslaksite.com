{include file="admin_ust.tpl" title="Admin"}

<br />
<p>
<table style="background-image:url({$yp_resim}tap_70.gif); background-repeat:repeat-x; height:27px; padding:5px;" width="100%" cellpadding="0" cellspacing="0">
 <tr><td style="font-weight:bold"><h5>{$yp_sayfa_aciklama}</h5></td><td align="right">
 	<a href="iletisim.php?DURUM=0&TIP=BILGI">Okunmam��</a> 
 	| <a href="iletisim.php?DURUM=1&TIP=BILGI">Okunmu�</a> 
 	| <a href="iletisim.php?DURUM=&TIP=BILGI">T�m�</a> 
 </td><td width="100px" align="right"><b>CV:</b></td><td>	
 	 <a href="iletisim.php?DURUM=0&TIP=CV">Okunmam��</a> 
 	| <a href="iletisim.php?DURUM=1&TIP=CV">Okunmu�</a> 
 	| <a href="iletisim.php?DURUM=&TIP=CV">T�m�</a> 
 </td></tr></table>
</p>
<p>
	  <table width="800px" border="0" cellspacing="1" cellpadding="3" align="center">
	  	<tr><th>&nbsp;</th><th>G�NDEREN</th><th>KONU</th><th>DOSYA EK�</th><th>EMAIL</th><th>TEL</th><th>TAR�H</th><th>MESAJ T�P�</th><th>DURUM</th></tr>	
		{section name=mysec loop=$sayfalistesi}
		{strip}
		   <tr bgcolor="{cycle values="#f2f3f3,#ffffff"}">
			  <td>{ if $sayfalistesi[mysec].MESAJ_DURUMU eq 'OKUNDU' }<img src="{$yp_resim}okundu.png" border="0" Alt="Okunmu� mesaj">{else}<img src="{$yp_resim}okunmadi.png" border="0" alt="Okunmam�� mesaj">{/if}</td>
			  <td>{$sayfalistesi[mysec].GONDEREN_ADI}</td>
			  <td><a href="iletisim.php?s=1&mesaj_id={$sayfalistesi[mysec].ID}">{$sayfalistesi[mysec].KONU}</a></td>
			  <td>{$sayfalistesi[mysec].DOSYA_EKI}</td>
			  <td><a href="iletisim.php?s=1&mesaj_id={$sayfalistesi[mysec].ID}">{$sayfalistesi[mysec].EMAIL}</a></td>
			  <td>{$sayfalistesi[mysec].TEL}</td>
			  <td>{$sayfalistesi[mysec].OLUS_TARIHI}</td>
			  <td>{$sayfalistesi[mysec].MESAJ_TIPI}</td>
			  <td><a href="iletisim.php?sil_id={$sayfalistesi[mysec].ID}" OnClick="javascript:if(confirm('Silmek istedi�inizden eminmisiniz?')) return true;else return false;"><img src="{$yp_resim}icons/delete_16.gif" border="0" title="Silmek i�in t�klay�n�z!"></a></td>
		   </tr>
		{/strip}
		{/section}
	</table>

{include file="admin_alt.tpl"}
