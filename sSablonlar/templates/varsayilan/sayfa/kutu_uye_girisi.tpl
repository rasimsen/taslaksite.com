{if !kontrolLogin()}
<div style="text-align:center;">{assign var="veri" value=$veri_liste}
{section name=i loop=$veri}
{strip}{$veri[i].LINK_SOURCE}{/strip}
{/section}</div>
{else}
<div style="text-align:right;color:#FFFFFF;">Merhaba, üye çikisi için <a href="uye.php?uye_logout">tiklayiniz</a></div>
{/if}