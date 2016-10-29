<div style="text-align:left"> 
        <div><h3>Yorumlar</h3></div>
        {if kontrolLogin()}
			<div style="text-align:center;width:100%">{$mesajTaslakSite}</div>
        	<div><form id="form1" name="form1" method="post" action=""><textarea name="yorum_text" cols=50 rows=3 style="width:100%"></textarea><br><input type="submit" name="btnYorumKaydet" value="Yorum Ekle"/></form></div>
		{else}
			<div><a href="uye.php?geridonus_url={$geridonus_url}">Yorum Ekle</a></div>
		{/if}
		<div>&nbsp;</div>
        {assign var="yorum" value=$yorumlar}
        {section name=i loop=$yorum}
        {strip}<table style = "border:1px solid silver;" cellspacing="0" cellpadding="3" width="100%">
	          	<tr><td colspan="3">{$yorum[i].YORUM|replace:"\n":"<br />"}</td></tr>
	          	<tr style="background-color:silver;">
	          		<td width="100"><img align="middle" src="{$resim}kullanici_16.png" border="0"> {$yorum[i].KULLANICI_ADI}</td>
	          		<td width="150"><img align="middle" src="{$resim}takvim_16.gif" border="0"> {$yorum[i].SIZ|date_format:"%d.%m.%Y %H:%M:%S"}</td>
	          		<td>&nbsp;</td>
	          	</tr>
	          </table><br>
        {/strip}
        {/section}
</div>        