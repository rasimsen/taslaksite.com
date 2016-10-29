{include file="sayfa_ustu.tpl"}		

			<h3>Üye Bilgileri Merkezi</h3>
			<br>Merhaba <b>{$kullanici_adi}</b>, 
			
<div style="text-align:center;width:100%">{$mesajTaslakSite}</div>
			<h4>Üyelik Bilgileriniz</h4>
			<ul><li><a href="uye.php?s=3">Üye BÝlgileri(Güncelle)</a>
				<li><a href="uye.php?s=2">Þifre Deðiþtir</a>
				<li><a href="uye.php?s=5">Email Adresi Deðiþtir</a>
				<li><a href="uye.php?s=6">Üyelik Ýptal</a>
				<li><a href="#">Yorumlarým</a>
				<li><a href="#">Favorilerim</a>
			</ul>	

{if count($alt_basliklar) gt 0 } {include file="taslak_sayfa_alt_basliklar.tpl"}{/if}
{if DEF_YORUM_ACIK } {include file="yorum.tpl"}{/if}

{include file="sayfa_alti.tpl"}	
