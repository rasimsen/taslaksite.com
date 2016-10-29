{if count($veri_link_kutulari) gt 0}
<p>
<div id="sol_panel"> {section name=i loop=$veri_link_kutulari}
  {strip}
  <div id="sol_panel_kutu">
    <div id="sol_panel_kutu_baslik">{$veri_link_kutulari[i].KUTU_ADI}</div>
    <div id="sol_panel_kutu_icerik">{assign var="Li" value=$veri_link_kutulari[i].LINK}
      <ul>
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
  <div style="padding:5px; height:20px;">&nbsp;</div>
  {/strip}
  {/section} </div>
</p>
{/if}