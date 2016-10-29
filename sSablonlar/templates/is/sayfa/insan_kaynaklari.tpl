{include file="sayfa_ustu.tpl"}<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td valign="top">{include file="sol_panel.tpl"}</td>
<td valign="top" width="100%" style="padding:5px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  {section name=icerik loop=$sayfa_icerik}
  {strip}
  <tr>
    <td width="1px" valign="top">{include file="thumbnail.tpl"}</td>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="3">
        <tr>
          <td class="baslik">{$sayfa_icerik[icerik].BASLIK}</td>
        </tr>
        <tr>
          <td class="icerik">{$sayfa_icerik[icerik].KISA_OZET}</td>
        </tr>
        <tr>
          <td class="icerik">{$sayfa_icerik[icerik].ICERIK}</td>
        </tr>
        <tr>
          <td height="20"></td>
        </tr>
		<tr><td valign="top">{include file="foto_listesi.tpl"}{include file="dosya_listesi.tpl"}</td></tr>
      </table></td>
  </tr>
{/strip}
{/section}
</table>

{if count($alt_basliklar) gt 0 } {include file="taslak_sayfa_alt_basliklar.tpl"}{/if}

			<center>{$procesOK}</center>
			<div style="text-align:center;width:100%">{$mesajTaslakSite}</div>
			<table align="center" width="90%" border="0" cellspacing="3" cellpadding="3">
				<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <tr>
                  <td width="120" class="label">Ad Soyad</td>
                  <td><input type="text" name="ad" value="{$ad}"  class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'"/></td>
                </tr>
                <tr>
                  <td class="label">Telefon</td>
                  <td><input type="text" name="tel" value="{$tel}"  class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'"/></td>
                </tr>
                <tr>
                  <td class="label">Email</td>
                  <td><input type="text" name="email" value="{$email}"  class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'"/></td>
                </tr>
                <tr>
                  <td class="label">Konu</td>
                  <td><input type="text" name="konu" value="{$konu}"  class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'"/></td>
                </tr>
                <tr valign="top">
                  <td class="label">Mesaj</td>
                  <td><textarea name="mesaj" cols="55" rows="9" class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'">{$mesaj}</textarea></td>
                </tr>
			    <tr><td>CV(Word veya PDF formatýnda)</td><td><input type="file" name="ik_cv" /></td></tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><input type="submit" name="ikCVgonder" value="Gönder" />
                    <input type="submit" name="Submit2" value="Temizle" /></td>
                </tr>
              </form>
            </table>            
            
{if DEF_YORUM_ACIK } {include file="yorum.tpl"}{/if}

</td>
<td valign="top">{include file="sag_panel.tpl"}</td>
</tr></table>

{include file="sayfa_alti.tpl"}