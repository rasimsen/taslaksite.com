{include file="sayfa_ustu.tpl"}		

			<h3>�ye Bilgileri Merkezi</h3>
			<br>Merhaba <b>{$kullanici_adi}</b>, 
			
<div style="text-align:center;width:100%">{$mesajTaslakSite}</div>
			<h4>�yelik Bilgileriniz</h4>
			<ul><li><a href="uye.php?s=3">�ye B�lgileri(G�ncelle)</a>
				<li><a href="uye.php?s=2">�ifre De�i�tir</a>
				<li><a href="uye.php?s=5">Email Adresi De�i�tir</a>
				<li><a href="uye.php?s=6">�yelik �ptal</a>
				<li><a href="#">Yorumlar�m</a>
				<li><a href="#">Favorilerim</a>
			</ul>	

{if count($alt_basliklar) gt 0 } {include file="taslak_sayfa_alt_basliklar.tpl"}{/if}
{if DEF_YORUM_ACIK } {include file="yorum.tpl"}{/if}

{include file="sayfa_alti.tpl"}	
