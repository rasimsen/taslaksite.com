<p>
<div id="sag_panel">
<div id="sag_panel_kutu">
  <div id="sag_panel_kutu_baslik">{$ebulten_kutu_adi}</span></div>
  <div id="sag_panel_kutu_icerik">
    <ul>
      {assign var="veri" value=$ebulten_liste}
      {section name=i loop=$veri}
      {strip}{$veri[i].LINK_SOURCE}{/strip}
      {/section}
    </ul>
  </div>
</div>
</div>
</p>
