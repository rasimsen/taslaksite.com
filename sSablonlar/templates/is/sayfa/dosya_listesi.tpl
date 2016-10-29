        <!-- fotolar -->
<div style=" float:left; text-align:center"> 
        {assign var="fotolistesi" value=$sayfa_icerik[icerik].DOSYA}
        {section name=foto loop=$fotolistesi}
        {strip}
			{if strlen($fotolistesi[foto].FOTO) gt 0}<img src="foto/{$fotolistesi[foto].FOTO}" border=0 style="padding:5px;"/><br clear="all" />{/if}
        {/strip}
        {/section}
</div>        