<b>{$ebulten_kutu_adi}</b>
<div class="box"> 
  <div class="inner"> 
    <ul class="list1">
      {assign var="veri" value=$ebulten_liste}
      {section name=i loop=$veri}
      {strip}{$veri[i].LINK_SOURCE}{/strip}
      {/section}
    </ul>
  </div>
</div>
