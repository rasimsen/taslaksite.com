

<p>
<div id="sidebar">
<!-- <div id="sol_panel_kutu"> -->
  <div class="title">{$kategori_kutu_adi}</div>
  <div id="sol_panel_kutu_icerik">
   <ul>{assign var="veri" value=$lk_liste}
      {section name=i loop=$veri}
      {strip}
    <li>&nbsp;&nbsp;&nbsp;<a href="index.php?kategori_id={$veri[i].ID}" class="gallery_nav2">{$veri[i].KATEGORI_ADI}</a></li>
    {/strip}			  
    {/section}</ul>
  </div>
<!-- </div>-->
</div>
</p>
