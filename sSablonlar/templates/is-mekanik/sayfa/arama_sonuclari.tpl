<!-- basla:arama sonuçlarý -->
<div width="100%" style="padding:10px;">{$j++}
  {section name=i loop=$arama_sonuclari}
  {strip}
  <div class="arama_sonuclari">{$j++} - <a href="{$arama_sonuclari[i].SAYFA_LINKI}?id={$arama_sonuclari[i].ID}">{$arama_sonuclari[i].BASLIK}</a></div>
  <div class="arama_sonuclari">{$arama_sonuclari[i].KISA_OZET}</div>
  <div class="arama_sonuclari"><a href="{$arama_sonuclari[i].SAYFA_LINKI}?id={$arama_sonuclari[i].ID}">daha fazla</a></div>
  <div style="height:10px"></div>
  {/strip}
  {/section}
</div>
<!-- bit:arama sonuçlarý -->
