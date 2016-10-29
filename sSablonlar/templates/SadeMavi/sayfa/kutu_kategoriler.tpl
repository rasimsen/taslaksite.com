<p>
<div id="sol_panel">
<div id="sol_panel_kutu">
  <div id="sol_panel_kutu_baslik">{$kategori_kutu_adi}</div>
  <div id="sol_panel_kutu_icerik">
   <ul>{assign var="veri" value=$lk_liste}
      {section name=i loop=$veri}
      {strip}
    <div style="float:none">&nbsp;&nbsp;&nbsp;<a href="index.php?kategori_id={$veri[i].ID}">{$veri[i].KATEGORI_ADI}</a></div>
    {/strip}			  
    {/section}</ul>
  </div>
</div>
</p>
