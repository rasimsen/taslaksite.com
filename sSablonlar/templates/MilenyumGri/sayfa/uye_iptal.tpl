{include file="sayfa_ustu.tpl"}		

{literal}
<script>
	function formKontrol(frm){

		var hata=new Array();

		if(hata.length==0){

			if(frm.uyelik_iptal_onay.checked){
				return true;
			}else{
				alert("L�ten �yeli�inizi iptal etimek i�in '�yeli�imi �ptal Etmek �stiyorum' kutusunu i�aretleyiniz!");
				return false;
			}		

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
                  <td width="200" class="label" align="right">Kullan�c� Ad�*</td>
                  <td>{$r.KULLANICI_ADI}</td>
                </tr>
                <tr>
                  <td class="label" align="right">Email*</td>
                  <td>{$r.EMAIL}</td>
                </tr>
                <tr>
                  <td class="label">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td class="label" align="right">Ad*</td>
                  <td>{$r.AD}</td>
                </tr>
                <tr>
                  <td class="label" align="right">Soyad*</td>
                  <td>{$r.SOYAD}</td>
                </tr>

                <tr>
                  <td class="label">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>

                <tr>
                  <td class="label" align="right">E�itiminiz*</td>
                  <td>{$r.EGITIM}</td>
                </tr>

                <tr>
                  <td class="label" align="right">Cinsiyetiniz*</td>
                  <td>{$r.CINSIYET}</td>
                </tr>

                <tr>
                  <td class="label" align="right">Do�um Tarihi*</td>
                  <td>{$r.DOGUM_TARIHI}
                  </td>
                </tr>

                <tr>
                  <td class="label">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>

                <tr>
                  <td class="label" align=right>Telefon</td>
                  <td>{$r.TEL}</td>
                </tr>
                <tr>
                  <td class="label" align=right>Adres</td>
                  <td>{$r.ADRES}</td>
                </tr>
                <tr>
		  		  <td class="label" align=right>�ehir</td>
                  <td>{$r.SEHIR}</td>
                </tr>
                <tr>
                  <td class="label" align=right>�lke</td>
                  <td>{$r.ULKE}</td>
                </tr>

                <tr>
                  <td class="label">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>

                <tr>
                  <td width="120" class="label" align="right"><input type="checkbox" name="uyelik_iptal_onay" value="1"  class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'"/></td>
                  <td>�yeli�imi �ptal Etmek �stiyorum</td>
                </tr>

                <tr>
                  <td class="label">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                
                <tr>
                  <td>&nbsp;</td>
                  <td><input type="submit" name="btnUyeIptal" value="  �yeli�imi �ptal Et  " /></td>
                </tr>
                <tr>
                  <td class="label">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </form>
            </table>
			
{if count($alt_basliklar) gt 0 } {include file="taslak_sayfa_alt_basliklar.tpl"}{/if}
{if DEF_YORUM_ACIK } {include file="yorum.tpl"}{/if}
				
			
</div>	
{include file="sayfa_alti.tpl"}	
