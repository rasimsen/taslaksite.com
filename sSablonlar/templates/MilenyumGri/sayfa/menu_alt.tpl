<ul class="nav">
{section name=i loop=$menu_alt}
  {strip}<li><a href="{$menu_alt[i].SAYFA_LINKI}">{$menu_alt[i].SAYFA_ADI}</a></li>{/strip}
{/section}
</ul>