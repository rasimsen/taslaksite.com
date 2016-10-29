  <h3 align="center">{$kategori_kutu_adi}</h3>
   <ul>{assign var="veri" value=$lk_liste}
      {section name=i loop=$veri}
      {strip}
    	<li><a href="index.php?kategori_id={$veri[i].ID}">{$veri[i].KATEGORI_ADI}</a></li>
    {/strip}			  
    {/section}</ul>
