  <h3 align="center">{$ebulten_kutu_adi}</h3>
    <div id="kutu">
      {assign var="veri" value=$ebulten_liste}
      {section name=i loop=$veri}
      {strip}{$veri[i].LINK_SOURCE}{/strip}
      {/section}
    </div>
