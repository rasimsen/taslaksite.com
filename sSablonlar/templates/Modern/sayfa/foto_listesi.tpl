        <!-- fotolar -->
<div style=" float:left; text-align:center"> 
{literal}
	<script type="text/javascript">
	//<![CDATA[
	  window.addEvent('domready', function(){
	    var data = {
{/literal}
        {assign var="fotolistesi" value=$sayfa_icerik[icerik].FOTO}
        {section name=foto loop=$fotolistesi}
        {strip}
			{if strlen($fotolistesi[foto].FOTO) gt 0}
	      		'{$fotolistesi[foto].FOTO}': {literal}{{/literal} caption: '{$fotolistesi[foto].KISA_ACIKLAMA}' {literal}}{/literal},
			{/if}
        {/strip}
        {/section}

{literal}
		};{/literal}
	    {if count($sayfa_icerik[icerik].FOTO) lt 0 }//{/if}{literal}var myShow = new Slideshow('show', data, {controller: true, height: 300, hu: 'dosya/foto/', thumbnails: true, width: 400});
	  });
	//]]>
	</script>
{/literal}
</div>        
{if count($sayfa_icerik[icerik].FOTO) lt 0 }
<div id="show" class="slideshow" style=" ">
    <img src="dosya/foto/spacer.gif" alt="" />
</div>
{/if}

