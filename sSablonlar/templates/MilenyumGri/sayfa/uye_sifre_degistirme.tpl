{include file="sayfa_ustu.tpl"}		

{literal}
<script>
	function formKontrol(frm){

		var hata=new Array();

		if(frm.sifre.value==null || frm.sifre.value=="" || (frm.sifre.value!=frm.sifre2.value)){
			hata.push("�ifre bilginizi kontrol ediniz");
		}


		if(hata.length==0){
				return true;
		}else{
			alert("L�tfen \n"+hata.join(",\n"));
			return false;
		}

		return true;		
	}
</script>
{/literal}

<div style="width:100%; text-align:left" class="DivBar">

<!-- �yelik -->
			<br>
			<!-- <h3>�ye Ol</h3>-->
            <table align="center" width="90%" border="0" cellspacing="0" cellpadding="3">
            <tr><td colspan="2" align="center">{$mesajTaslakSite}</td></tr>
              <form id="form1" name="form1" method="post" action=""  onsubmit="return formKontrol(this);">
                <tr>
                  <td width="120" class="label">Eski �ifreniz*</td>
                  <td><input type="password" name="eski_sifre"  maxlength="16" class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'"/></td>
                </tr>
                <tr>
                  <td width="120" class="label">�ifre*</td>
                  <td><input type="password" name="sifre"  maxlength="16" class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'"/></td>
                </tr>
                <tr>
                  <td width="120" class="label">�ifre Tekrar*</td>
                  <td><input type="password" name="sifre2" maxlength="16"  class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'"/></td>
                </tr>

                 <tr>
                  <td>&nbsp;</td>
                  <td><input type="submit" name="btnSifreDegistirme" value="  Kaydet  " />
                    <input type="submit" name="Submit2" value="Temizle" /></td>
                </tr>
              </form>
            </table>
			Not*: �ifreler 4-16 karakter uzunlu�unda olmal�d�r..			
{if count($alt_basliklar) gt 0 } {include file="taslak_sayfa_alt_basliklar.tpl"}{/if}
{if DEF_YORUM_ACIK } {include file="yorum.tpl"}{/if}
							
</div>	
{include file="sayfa_alti.tpl"}	
