{include file="sayfa_ustu.tpl"}		
<center>{$mesajTaslakSite}</center>
<table align="center" cellspacing="1" cellpadding="10" style="border:solid 1px silver;">
<tr>
<td valign="top" style="border-right:solid 0px silver;">
		<h2>Üye Giriþi</h2>
		<form id="form1" name="form1" method="post" action="">
		<table border="0" cellspacing="0" cellpadding="3" align="center">
		  <tr align="left">
		    <td class="label" width="100px">Kullanýcý&nbsp;Adý </td>
		    <td><input type="text" name="kullanici_adi" size="16"  maxlength="16" class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'"/></td>
		  </tr>
		  <tr align="left"> 
		    <td class="label">Þifre</td>
		    <td><input type="password" name="sifre" size="16"  maxlength="16" class="data"  onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'" /></td>
		  </tr>
		</table>
		<br /><center><input type="submit" name="btnUyeGirisi" value="Giriþ" /></center>
		</form>
</td>
<td valign="top" style="background-color:#E4E4E4">
		<h2>Üye Ol</h2><b>Üye deðilseniz, Üye olmak için <a href="uyeol.php">týklayýnýz</a></b>
</td>
	</tr>
</table>	
<br><br>
{if count($alt_basliklar) gt 0 } {include file="taslak_sayfa_alt_basliklar.tpl"}{/if}
{if DEF_YORUM_ACIK } {include file="yorum.tpl"}{/if}
	
{include file="sayfa_alti.tpl"}	
