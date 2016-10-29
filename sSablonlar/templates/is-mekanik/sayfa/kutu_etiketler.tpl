  <h3 align="center">{$etiket_kutu_adi}</h3>
    <div id="kutu">
      {assign var="veri" value=$etiket_liste}
      {section name=i loop=$veri}
      {strip} <a href="index.php?etiket_adi={$veri[i].ETIKET}">{$veri[i].ETIKET}</a>,
      {/strip}			  
      {/section}
    </div>
