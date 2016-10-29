{include file="sayfa_ustu.tpl"}		
&nbsp;			

{if count($alt_basliklar) gt 0 } {include file="taslak_sayfa_alt_basliklar.tpl"}{/if}
{if DEF_YORUM_ACIK } {include file="yorum.tpl"}{/if}

{include file="sayfa_alti.tpl"}	
