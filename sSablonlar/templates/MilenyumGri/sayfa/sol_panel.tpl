<div class="aside">
	{if in_array(17,explode("_",DEF_AKTIF_LINK_KUTULARI)) } {include file="kutu_kategoriler.tpl"}{/if}

	{if in_array(16,explode("_",DEF_AKTIF_LINK_KUTULARI)) }<p> {include file="kutu_etiketler.tpl"}{/if}
	{if in_array(19,explode("_",DEF_AKTIF_LINK_KUTULARI)) }<p> {include file="kutu_ebulten.tpl"}{/if}

	{if count($sol_panel_kutulari) gt 0 } {include file="kutu_sol_panel.tpl"}{/if}
    
</div>