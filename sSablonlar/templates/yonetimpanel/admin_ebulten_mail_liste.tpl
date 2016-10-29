{include file="admin_ust_popup.tpl" title="Admin"}
	<p><center><b>Bülten Email Liste</b></center>	
	  <table width="200" border="0" cellspacing="1" cellpadding="3" align="center">
	  	<tr><th>ID</th><th>EMail</th></tr>	
		<tr><td  colspan="3" style="border-bottom:1px silver solid; height:1px;"></td></tr>
		{$i++}
		{section name=mysec loop=$sayfalistesi}
		{strip}
		   <tr bgcolor="{cycle values="#f2f3f3,#ffffff"}">
			  <td>{$i++}</td>	
			  <td>{$sayfalistesi[mysec].EMAIL}</a></td>
		   </tr>
		{/strip}
		{/section}
	</table>
	<br>
	{literal}<center><a href="javascript:window.close()">Kapat</a></center>{/literal}
{include file="admin_alt_popup.tpl"}
