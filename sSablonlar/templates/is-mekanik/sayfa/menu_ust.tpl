<ul>
{section name=i loop=$menu_ust}
 	{strip}<li>{if kontrolLogin() and $menu_ust[i].SAYFA_LINKI eq "uyeol.php" }<a href="uye.php">Profilim</a>{else}<a href="{$menu_ust[i].SAYFA_LINKI}">{$menu_ust[i].SAYFA_ADI}</a>{/if}</li>{/strip}
{/section}
</ul>