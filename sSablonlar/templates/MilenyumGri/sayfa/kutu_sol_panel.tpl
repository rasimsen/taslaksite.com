{if count($veri_link_kutulari) gt 0}

{section name=i loop=$veri_link_kutulari}
  {strip}
	<b>{$veri_link_kutulari[i].KUTU_ADI}</b>
<div class="box"> 
  <div class="inner"> 
  {assign var="Li" value=$veri_link_kutulari[i].LINK}

    <ul class="list1">
      {section name=j loop=$Li}
      {strip}
      {if strlen($Li[j].LINK_SOURCE) gt 0}{$Li[j].LINK_SOURCE}
      {else}
      <li><a href="{$Li[j].LINK_URL}" target="{$Li[j].LINK_TARGET}">{$Li[j].LINK_ADI}</a></li>
      {/if}
      {/strip}
      {/section}
    </ul>
  </div>
</div>

{/strip}
{/section}

{/if}