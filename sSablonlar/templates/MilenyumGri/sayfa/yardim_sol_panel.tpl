<p>
<div id="sol_panel">
  <div id="sol_panel_kutu">
  <div id="sol_panel_kutu_baslik">YARDIM</div>
  <div id="sol_panel_kutu_icerik">
  <ul>
    {section name=y loop=$yardim_sol_menu}
    {strip}
    <li><a href="{$yardim_sol_menu[y].SAYFA_LINKI}?id={$yardim_sol_menu[y].ID}">{$yardim_sol_menu[y].BASLIK}</a> {assign var="yy" value=$yardim_sol_menu[y].ALT_MENU}
      {section name=yyy loop=$yy}
      <ul>
        {strip}
        <li>&nbsp;&nbsp;<a href="{$yy[yyy].SAYFA_LINKI}?id={$yy[yyy].ID}">{$yy[yyy].BASLIK}</a> {assign var="y2" value=$yy[yyy].ALT_MENU}
          {section name=y3 loop=$y2}
          <ul>
            {strip}
            <li>&nbsp;&nbsp;<a href="{$y2[y3].SAYFA_LINKI}?id={$y2[y3].ID}">{$y2[y3].BASLIK}</a></li>
            {/strip}
          </ul>
          {/section} </li>
        {/strip}
      </ul>
      {/section} </li>
    {/strip}
    {/section}
    </p>
    </div>
    </div>
  </ul>
</div>
</div>
</p>
{if count($sol_panel_kutulari) gt 0 } {include file="kutu_sol_panel.tpl"}{/if} 