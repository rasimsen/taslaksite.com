<div style="text-align:center;padding:10px; color:#FFFFFF;">{$tSAHIP_ADI}
{if strlen(SAHIP_ADRES) gt 0}<br>Adres : {$tSAHIP_ADRES }{/if}
{if strlen(SAHIP_TEL1) gt 0}<br>Tel : {$tSAHIP_TEL1 }{/if}
{if strlen(SAHIP_TEL2) gt 0} - {$tSAHIP_TEL2 }{/if}
{if strlen(SAHIP_FAX) gt 0}<br>Fax : {$tSAHIP_FAX}{/if}
{if strlen(SAHIP_CEP) gt 0}<br>Cep : {$tSAHIP_CEP}{/if}
{if strlen(SAHIP_EMAIL) gt 0}<br>email : <a href="mailto:{$tSAHIP_EMAIL}">{$tSAHIP_EMAIL}</a>{/if}
</div>
