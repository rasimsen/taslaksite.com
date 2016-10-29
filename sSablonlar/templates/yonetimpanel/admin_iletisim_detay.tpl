{include file="admin_ust.tpl" title="Admin"}

<form id="form1" name="form1" method="post" action="">
	<center><b>Mesajlarým </b></center>	
  <table width="75%" border="0" cellspacing="1" cellpadding="10" align="center">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td valign="top"><b>Mesaj Tipi:</b></td>
      <td bgcolor="#EFF0EB"><pre>{$mesaj_tipi}</pre></td>
    </tr>
    <tr>
      <td width="120"><b>Gönderen:</b></td>
      <td bgcolor="#EFF0EB">{$gonderen}</td>
    </tr>
    <tr>
      <td><b>Konu:</b></td>
      <td bgcolor="#EFF0EB">{$konu}</td>
    </tr>
    <tr>
      <td valign="top"><b>Mesaj:</b></td>
      <td bgcolor="#EFF0EB"><pre>{$mesaj}</pre></td>
    </tr>
    <tr>
      <td valign="top"><b>Mesaj Eki:</b></td>
      <td bgcolor="#EFF0EB"><pre><a href="javascript://" onClick="acPopUp('iletisim.php?s=2&id={$id}')">{$dosya_eki}</a></pre></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>mesajlar listesine <a href="javascript:history.back()">geridön</a></td>
    </tr>
   </table>
</form>


{include file="admin_alt.tpl"}
