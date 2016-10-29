{literal}
<script language="JavaScript">
    function durRandRef(){
        document.getElementById("randRef").stop();
    }
    function baslaRandRef(){
        document.getElementById("randRef").start();
    }
</script>
{/literal}
		<marquee align="left" id="randRef" direction="up" scrolldelay="100" scrollamount="2" onmouseover="durRandRef()" onmouseout="baslaRandRef()" class="kyHaber"  style="background-color:#2B2B2B; border:solid 1px silver;padding:5px;width:267px">
					{section name=icerik loop=$reflistesi}
					{strip}
						<table width="100%" border="0" cellspacing="0" cellpadding="3" style="padding:5px;">
						  <tr>
						    <td class="habericerik" align="center"><a href="referanslarimiz.php?s=1&ref_id={$reflistesi[icerik].REF_ID}"><img src="foto/{$reflistesi[icerik].THUMBNAIL}" border=0></a></td>
						  </tr>
						  <tr>
						    <td class="haberbaslik" style="width:100%; height:100%; background:url({$resim}b_back2.gif) no-repeat left top; padding:5px;"><a href="referanslarimiz.php?s=1&ref_id={$reflistesi[icerik].REF_ID}">{$reflistesi[icerik].KISA_OZET}</a></td>
						  </tr>
						</table>
						<br style="line-height:15px;">
					{/strip}
					{/section}
		</marquee>
