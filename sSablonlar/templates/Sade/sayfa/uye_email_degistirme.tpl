{include file="sayfa_ustu.tpl"}		

{literal}
<script>
	function formKontrol(frm){

		var hata=new Array();

		if(!checkEmail(frm.email1) || frm.email1.value!=frm.email2.value)
			hata.push("Email adresinizi kontrol ediniz");

		if(hata.length==0){
				return true;
		}else{
			alert("Lütfen \n"+hata.join(",\n"));
			return false;
		}

		return true;		
	}
</script>
{/literal}

<div style="width:100%; text-align:left" class="DivBar">

<!-- üyelik -->
			<br>
			<!-- <h3>Üye Ol</h3>-->
            <table align="center" width="90%" border="0" cellspacing="0" cellpadding="3">
            <tr><td colspan="2" align="center">{$mesajTaslakSite}</td></tr>
              <form id="form1" name="form1" method="post" action=""  onsubmit="return formKontrol(this);">
                <tr>
                  <td width="120" class="label">Eski Email*</td>
                  <td><input type="text" name="eski_email" maxlength="128" class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'" value="{$eski_email}" disabled="true"/></td>
                </tr>

                <tr>
                  <td width="120" class="label">Email*</td>
                  <td><input type="text" name="email1" maxlength="128" class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'" value=""/></td>
                </tr>
                <tr>
                  <td width="120" class="label">Email Tekrar*</td>
                  <td><input type="text" name="email2"  maxlength="128" class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'" value=""/></td>
                </tr>


                 <tr>
                  <td>&nbsp;</td>
                  <td><input type="submit" name="btnEmailDegistirme" value="  Kaydet  " />
                    <input type="submit" name="Submit2" value="Temizle" /></td>
                </tr>
              </form>
            </table>
			<br>			
{if count($alt_basliklar) gt 0 } {include file="taslak_sayfa_alt_basliklar.tpl"}{/if}
{if DEF_YORUM_ACIK } {include file="yorum.tpl"}{/if}
							
</div>	
{include file="sayfa_alti.tpl"}	
