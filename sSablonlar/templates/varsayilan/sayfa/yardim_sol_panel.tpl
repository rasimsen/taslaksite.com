      <p><div style="text-align:left;width:225px;padding:3px;">
      <div style="padding:1px;">
       <div style="float:left; width:5px; height:25px;"><img src="{$resim}ts_mk_sol.gif" width="5" height="25"></div><div style="float:left; width:137px;background-image:url({$resim}ts_mk_bg.gif); background-repeat:repeat-x; height:25px; vertical-align:bottom;padding-top:0px;padding-bottom:0px;"><span class="lk_baslik">YARDIM</span></div><div style=" width:6px; height:25px; float:left"><img src="{$resim}ts_mk_sag.gif" width="6" height="25"></div>
       <div style=" clear:both; border-left:1px #7A051D solid;border-right:1px #7A051D solid;border-bottom:1px #7A051D solid; background-color:#1F2D26;">
      <p style="padding:3px;">
  {section name=y loop=$yardim_sol_menu}
  {strip}
		<div style="height:25px;background-image:url({$resim}ts_mk_bg.gif); background-repeat:repeat-x;"><a href="{$yardim_sol_menu[y].SAYFA_LINKI}?id={$yardim_sol_menu[y].ID}">{$yardim_sol_menu[y].BASLIK}</a></div>
		<div style="/* float:left; */text-align:left"> 
		        {assign var="yy" value=$yardim_sol_menu[y].ALT_MENU}
		        {section name=yyy loop=$yy}
		        {strip}
					<div style="height:20px;">&nbsp;&nbsp;&nbsp; - <a href="{$yy[yyy].SAYFA_LINKI}?id={$yy[yyy].ID}">{$yy[yyy].BASLIK}</a></div>
					<div style="/* float:left; */text-align:left;"> 
					        {assign var="y2" value=$yy[yyy].ALT_MENU}
					        {section name=y3 loop=$y2}
					        {strip}
								<div style="height:15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - <a href="{$y2[y3].SAYFA_LINKI}?id={$y2[y3].ID}">{$y2[y3].BASLIK}</a></div>
					        {/strip}
					        {/section}
					</div>     
		        {/strip}
		        {/section}
		</div>     
	{/strip}
	{/section}
		</p>
		</div>
      </div></p>

{if count($sol_panel_kutulari) gt 0 } {include file="kutu_sol_panel.tpl"}{/if}
