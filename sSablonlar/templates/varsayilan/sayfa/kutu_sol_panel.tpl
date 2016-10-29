{if count($veri_link_kutulari) gt 0}
<p>
<div style="text-align:left;width:206px;padding:3px;"> {section name=i loop=$veri_link_kutulari}
  {strip}
  <div style=" border:0px #7A051D solid; padding:1px;">
    <div style="float:left; width:5px; height:25px;"><img src="{$resim}ts_mk_sol.gif" width="5" height="25"></div><div style="float:left; width:193px;background-image:url({$resim}ts_mk_bg.gif); background-repeat:repeat-x; height:25px; vertical-align:bottom;padding-top:0px;padding-bottom:0px;"><span class="lk_baslik">{$veri_link_kutulari[i].KUTU_ADI}</span></div><div style=" width:6px; height:25px; float:left"><img src="{$resim}ts_mk_sag.gif" width="6" height="25"></div>
    <div style=" clear:both; border-left:1px #7A051D solid;border-right:1px #7A051D solid;border-bottom:1px #7A051D solid; background-color:#1F2D26;"> {assign var="Li" value=$veri_link_kutulari[i].LINK}
      {section name=j loop=$Li}
      {strip}
      {if strlen($Li[j].LINK_SOURCE) gt 0}{$Li[j].LINK_SOURCE}
      {else}<br />
      &nbsp;&raquo;<span style="padding-left:5px;"><a href="{$Li[j].LINK_URL}" target="{$Li[j].LINK_TARGET}">{$Li[j].LINK_ADI}</a></span>{/if}
      {/strip}
      {/section} <br />
      &nbsp; </div>
  </div>
  <div style="padding:5px; height:20px;">&nbsp;</div>
  {/strip}
  {/section} </div>
</p>
{/if}