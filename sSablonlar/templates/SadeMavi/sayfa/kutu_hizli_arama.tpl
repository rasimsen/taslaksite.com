<div style="text-align:center;width:100%">
{assign var="veri" value=$arama_liste}
{section name=i loop=$veri}
{strip}<div style="padding:2px;">{$veri[i].LINK_SOURCE}</div>{/strip}
{/section}
</div>