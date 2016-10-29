<p>
<div id="sag_panel">
<div id="sag_panel_kutu">
  <div id="sag_panel_kutu_baslik">{$etiket_kutu_adi}</span></div>
  <div id="sag_panel_kutu_icerik">
    <ul>
      {assign var="veri" value=$etiket_liste}
      {section name=i loop=$veri}
      {strip} <a href="index.php?etiket_adi={$veri[i].ETIKET}">{$veri[i].ETIKET}</a>,
      {/strip}			  
      {/section}
    </ul>
  </div>
</div>
</p>
