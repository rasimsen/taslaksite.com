<p>
<!-- <div id="sag_panel"> -->
<div id="sag_panel_kutu">
  <div class="title">{$etiket_kutu_adi}</div>
  <div id="sag_panel_kutu_icerik">
    <ul>
      {assign var="veri" value=$etiket_liste}
      {section name=i loop=$veri}
      {strip} <a href="index.php?etiket_adi={$veri[i].ETIKET}">{$veri[i].ETIKET}</a>,
      {/strip}			  
      {/section}
    </ul>
  </div>
<!-- </div> -->
</p>
