<p>
<!--<div id="sag_panel">
<div id="sag_panel_kutu">-->
  <div class="title">{$ebulten_kutu_adi}</div>
  <div id="sag_panel_kutu_icerik">
    <ul>
      {assign var="veri" value=$ebulten_liste}
      {section name=i loop=$veri}
      {strip}{$veri[i].LINK_SOURCE}{/strip}
      {/section}
    </ul>
<!--   </div>
</div>-->
</p>
