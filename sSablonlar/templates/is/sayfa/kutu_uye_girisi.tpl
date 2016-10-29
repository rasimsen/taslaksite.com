{if !kontrolLogin()}
<div style="width:100%;float:left;">{assign var="veri" value=$veri_liste}
  {section name=i loop=$veri}
  {strip}{$veri[i].LINK_SOURCE}{/strip}
  {/section}</div>
{else}
<div style="width:100%;text-align:right;float:left;">Merhaba, üye çikisi için <a href="uye.php?uye_logout">tiklayiniz</a></div>
{/if}