      <p><div style="text-align:left;width:150px; padding:3px;">
      <div style="padding:1px;">
       <div style="float:left; width:5px; height:25px;"><img src="{$resim}ts_mk_sol.gif" width="5" height="25"></div><div style="float:left; width:137px;background-image:url({$resim}ts_mk_bg.gif); background-repeat:repeat-x; height:25px; vertical-align:bottom;padding-top:0px;padding-bottom:0px;"><span class="lk_baslik">{$ebulten_kutu_adi}</span></div><div style=" width:6px; height:25px; float:left"><img src="{$resim}ts_mk_sag.gif" width="6" height="25"></div>
       <div style=" clear:both; border-left:1px #7A051D solid;border-right:1px #7A051D solid;border-bottom:1px #7A051D solid; background-color:#1F2D26;">
      {assign var="veri" value=$ebulten_liste}
      {section name=i loop=$veri}
      {strip}{$veri[i].LINK_SOURCE}{/strip}
      {/section}</div>
      </div></p>
