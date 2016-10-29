<b>{$etiket_kutu_adi}</b>
<div class="box"> 
  <div class="inner"> 
    <ul class="list1">
      {assign var="veri" value=$etiket_liste}
      {section name=i loop=$veri}
      {strip} <a href="index.php?etiket_adi={$veri[i].ETIKET}">{$veri[i].ETIKET}</a>,
      {/strip}			  
      {/section}
    </ul>
  </div>
</div>
