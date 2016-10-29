
{section name=i loop=$menu_ust}
  {strip}<div id="ust_menu_baslik">{if kontrolLogin() and $menu_ust[i].SAYFA_LINKI eq "uyeol.php" }<a href="uye.php">Profilim</a>{else}<a href="{$menu_ust[i].SAYFA_LINKI}">{$menu_ust[i].SAYFA_ADI}</a>{/if}</div><div id="ust_menu_bosluk">&nbsp;</div>{/strip}
{/section}