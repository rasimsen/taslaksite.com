{include file="sayfa_ustu.tpl"}		

{literal}
<script>
	function formKontrol(frm){

		var hata=new Array();

		if(frm.kullanici_adi.value.length<4)
			hata.push("Kullanýcý Adýný boþ býrakmayýnýz!");

		if(frm.sifre.value==null || frm.sifre.value=="" || (frm.sifre.value!=frm.sifre2.value)){
			hata.push("Þifre bilginizi kontrol ediniz");
		}

		if(frm.ad.value.length<3)
			hata.push("Adýnýzý boþ býrakmayýnýz!");
		
		if(frm.soyad.value.length<3)
			hata.push("Soyadýnýzý boþ býrakmayýnýz!");

		if(!checkEmail(frm.email1) || frm.email1.value!=frm.email2.value)
			hata.push("Email adresinizi kontrol ediniz");


		if(hata.length==0){
			if(frm.uyelik_onay.checked){
				return true;
			}else{
				alert("Lütfen kullaným koþullarýný okuyonuz!");
				return false;
			}		
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
                  <td width="120" class="label">Kullanýcý Adý*</td>
                  <td><input type="text" name="kullanici_adi" maxlength="16"  class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'" value="{$r.KULLANICI_ADI}"/>(*En az 4 karakter)</td>
                </tr>
                <tr>
                  <td width="120" class="label">Þifre*</td>
                  <td><input type="password" name="sifre"  maxlength="16" class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'"/></td>
                </tr>
                <tr>
                  <td width="120" class="label">Þifre Tekrar*</td>
                  <td><input type="password" name="sifre2" maxlength="16"  class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'"/></td>
                </tr>

                <tr>
                  <td width="120" class="label">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                
                <tr>
                  <td width="120" class="label">Ad*</td>
                  <td><input type="text" name="ad"  maxlength="48" class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'" value="{$r.AD}"/></td>
                </tr>
                <tr>
                  <td width="120" class="label">Soyad*</td>
                  <td><input type="text" name="soyad"  maxlength="48" class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'" value="{$r.SOYAD}"/></td>
                </tr>

                <tr>
                  <td width="120" class="label">Email*</td>
                  <td><input type="text" name="email1" maxlength="128" class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'" value="{$r.EMAIL}"/></td>
                </tr>
                <tr>
                  <td width="120" class="label">Email Tekrar*</td>
                  <td><input type="text" name="email2"  maxlength="128" class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'" value="{$r.EMAIL}"/></td>
                </tr>

                <tr>
                  <td width="120" class="label">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>

                <tr>
                  <td width="120" class="label">Eðitiminiz*</td>
                  <td><select name="egitim">
                  	  	<option value="">--</option>
                  	  	<option value="Ýlköðretim">Ýlköðretim</option>
                  	  	<option value="Lise">Lise</option>
                  	  	<option value="Üniversite">Üniversite</option>
                  	  	<option value="Yüksek Lisans+">Yüksek Lisans+</option>
                  	  </select></td>
                </tr>

                <tr>
                  <td width="120" class="label">Cinsiyetiniz*</td>
                  <td><select name="cinsiyet">
                  	  	<option value="">--</option>
                  	  	<option value="BAYAN">BAYAN</option>
                  	  	<option value="ERKEK">ERKEK</option>
                  	  </select></td>
                </tr>

                <tr>
                  <td width="120" class="label">Doðum Tarihi*</td>
                  <td><select name="dogum_tarihi_gun">
                  	  	<option value="">--</option>
                  	  	<option value="01">1</option>
                  	  	<option value="02">2</option>
                  	  	<option value="03">3</option>
                  	  	<option value="04">4</option>
                  	  	<option value="05">5</option>
                  	  	<option value="06">6</option>
                  	  	<option value="07">7</option>
                  	  	<option value="08">8</option>
                  	  	<option value="09">9</option>
                  	  	<option value="10">10</option>
                  	  	<option value="11">11</option>
                  	  	<option value="12">12</option>
                  	  	<option value="13">13</option>
                  	  	<option value="14">14</option>
                  	  	<option value="15">15</option>
                  	  	<option value="16">16</option>
                  	  	<option value="17">17</option>
                  	  	<option value="18">18</option>
                  	  	<option value="19">19</option>
                  	  	<option value="20">20</option>
                  	  	<option value="21">21</option>
                  	  	<option value="22">22</option>
                  	  	<option value="23">23</option>
                  	  	<option value="24">24</option>
                  	  	<option value="25">25</option>
                  	  	<option value="26">26</option>
                  	  	<option value="27">27</option>
                  	  	<option value="28">28</option>
                  	  	<option value="29">29</option>
                  	  	<option value="30">30</option>
                  	  	<option value="31">31</option>
                  	  </select>
                  	/<select name="dogum_tarihi_ay">
                  	  	<option value="">--</option>
                  	  	<option value="01">Ocak</option>
                  	  	<option value="02">Þubat</option>
                  	  	<option value="03">Mart</option>
                  	  	<option value="04">Nisan</option>
                  	  	<option value="05">Mayýs</option>
                  	  	<option value="06">Haziran</option>
                  	  	<option value="07">Temmuz</option>
                  	  	<option value="08">Aðustos</option>
                  	  	<option value="09">Eylül</option>
                  	  	<option value="10">Ekim</option>
                  	  	<option value="11">Kasým</option>
                  	  	<option value="12">Aralýk</option>
                  	  </select>
                  	/<input type="text" name="dogum_tarihi_yil" size="4" maxlength="4"  class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'"/>
                  	Ör:30/08/1983
                  </td>
                </tr>

                <tr>
                  <td width="120" class="label">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>

                <tr>
                  <td class="label">Telefon</td>
                  <td><input type="text" name="tel" maxlength="15"    class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'" value="{$r.TEL}"/></td>
                </tr>
                <tr>
                  <td class="label">Adres</td>
                  <td><input type="text" name="adres" maxlength="512"   class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'" value="{$r.ADRES}"/></td>
                </tr>
                <tr>
{literal}
<script>
	function objeTextDegeri(obj,hedef_obj_id){
		obje_degeri = obj.options[obj.selectedIndex].text;
		document.getElementById(hedef_obj_id).value=obje_degeri;
	}
</script>
{/literal}		  <td width="120" class="label">Þehir</td>
                  <td><select size="1" name="sehir" onchange="objeTextDegeri(this,'sehir_adi');">
		                <option label="-Seçiniz-" value="">-Seçiniz-</option>
		
		                <option label="Ýstanbul" value="34">Ýstanbul</option>
						<option label="Ankara" value="6">Ankara</option>
						<option label="Ýzmir" value="35">Ýzmir</option>
						<option label="Adana" value="1">Adana</option>
						<option label="Adýyaman" value="2">Adýyaman</option>
						<option label="Afyon" value="3">Afyon</option>
						<option label="Aðrý" value="4">Aðrý</option>
						<option label="Amasya" value="5">Amasya</option>
						
						<option label="Antalya" value="7">Antalya</option>
						<option label="Artvin" value="8">Artvin</option>
						<option label="Aydýn" value="9">Aydýn</option>
						<option label="Balýkesir" value="10">Balýkesir</option>
						<option label="Bilecik" value="11">Bilecik</option>
						<option label="Bingöl" value="12">Bingöl</option>
						<option label="Bitlis" value="13">Bitlis</option>
						<option label="Bolu" value="14">Bolu</option>
						<option label="Burdur" value="15">Burdur</option>
						
						<option label="Bursa" value="16">Bursa</option>
						<option label="Çanakkale" value="17">Çanakkale</option>
						<option label="Çankýrý" value="18">Çankýrý</option>
						<option label="Çorum" value="19">Çorum</option>
						<option label="Denizli" value="20">Denizli</option>
						<option label="Diyarbakýr" value="21">Diyarbakýr</option>
						<option label="Edirne" value="22">Edirne</option>
						<option label="Elazýð" value="23">Elazýð</option>
						<option label="Erzincan" value="24">Erzincan</option>
						
						<option label="Erzurum" value="25">Erzurum</option>
						<option label="Eskiþehir" value="26">Eskiþehir</option>
						<option label="Gaziantep" value="27">Gaziantep</option>
						<option label="Giresun" value="28">Giresun</option>
						<option label="Gümüþhane" value="29">Gümüþhane</option>
						<option label="Hakkari" value="30">Hakkari</option>
						<option label="Hatay" value="31">Hatay</option>
						<option label="Isparta" value="32">Isparta</option>
						<option label="Mersin" value="33">Mersin</option>
						
						<option label="Kars" value="36">Kars</option>
						<option label="Kastamonu" value="37">Kastamonu</option>
						<option label="Kayseri" value="38">Kayseri</option>
						<option label="Kýrklareli" value="39">Kýrklareli</option>
						<option label="Kýrþehir" value="40">Kýrþehir</option>
						<option label="Kocaeli" value="41">Kocaeli</option>
						<option label="Konya" value="42">Konya</option>
						<option label="Kütahya" value="43">Kütahya</option>
						<option label="Malatya" value="44">Malatya</option>
						
						<option label="Manisa" value="45">Manisa</option>
						<option label="K.Maraþ" value="46">K.Maraþ</option>
						<option label="Mardin" value="47">Mardin</option>
						<option label="Muðla" value="48">Muðla</option>
						<option label="Muþ" value="49">Muþ</option>
						<option label="Nevþehir" value="50">Nevþehir</option>
						<option label="Niðde" value="51">Niðde</option>
						<option label="Ordu" value="52">Ordu</option>
						<option label="Rize" value="53">Rize</option>
						
						<option label="Sakarya" value="54">Sakarya</option>
						<option label="Samsun" value="55">Samsun</option>
						<option label="Siirt" value="56">Siirt</option>
						<option label="Sinop" value="57">Sinop</option>
						<option label="Sivas" value="58">Sivas</option>
						<option label="Tekirdað" value="59">Tekirdað</option>
						<option label="Tokat" value="60">Tokat</option>
						<option label="Trabzon" value="61">Trabzon</option>
						<option label="Tunceli" value="62">Tunceli</option>
						
						<option label="Þanlýurfa" value="63">Þanlýurfa</option>
						<option label="Uþak" value="64">Uþak</option>
						<option label="Van" value="65">Van</option>
						<option label="Yozgat" value="66">Yozgat</option>
						<option label="Zonguldak" value="67">Zonguldak</option>
						<option label="Aksaray" value="68">Aksaray</option>
						<option label="Bayburt" value="69">Bayburt</option>
						<option label="Karaman" value="70">Karaman</option>
						<option label="Kýrýkkale" value="71">Kýrýkkale</option>
						
						<option label="Batman" value="72">Batman</option>
						<option label="Þýrnak" value="73">Þýrnak</option>
						<option label="Bartýn" value="74">Bartýn</option>
						<option label="Ardahan" value="75">Ardahan</option>
						<option label="Iðdýr" value="76">Iðdýr</option>
						<option label="Yalova" value="77">Yalova</option>
						<option label="Karabük" value="78">Karabük</option>
						<option label="Kilis" value="79">Kilis</option>
						<option label="Osmaniye" value="80">Osmaniye</option>
						
						<option label="Düzce" value="82">Düzce</option>
						<option label="K.K.T.C." value="85">K.K.T.C.</option>
				      </select> <input type="hidden" name="sehir_adi" id="sehir_adi" value=""/>
				      Diðer:<input type="text" name="sehir_diger" maxlength="128" class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'" value=""/>
			      
                  </td>
                </tr>
                <tr>
                  <td width="120" class="label">Ülke</td>
                  <td><select name="ulke" onchange="objeTextDegeri(this,'ulke_adi')">
                  	  	<option value="">-Seçiniz-</option>
                  	  	<option value="TR" selected>Türkiye</option>
                  	  	<option value="">Diðer</option>
                  	  </select> <input type="hidden" name="ulke_adi" id="ulke_adi" value="Türkiye"/>
                  	  Diðer:<input type="text" name="ulke_diger" maxlength="128" class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'" value=""/>
                  	  </td>
                </tr>


                <tr>
                  <td width="120" class="label">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>

                <tr>
                  <td width="120" class="label"><input type="checkbox" name="uyelik_onay" value="1"  class="data" onfocus="javascript:this.className='data2'" onblur="javascript:this.className='data'"/></td>
                  <td><a href="javascript://" onclick="acPopUp('uyelik_sozlesmesi.php');">Üyelik sözleþmesini okudum ve onaylýyorum</a></td>
                </tr>

                <tr>
                  <td width="120" class="label">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                
                <tr>
                  <td>&nbsp;</td>
                  <td><input type="submit" name="btnUyeOl" value="  Kaydet  " />
                    <input type="submit" name="Submit2" value="Temizle" /></td>
                </tr>
              </form>
            </table>
			
{if count($alt_basliklar) gt 0 } {include file="taslak_sayfa_alt_basliklar.tpl"}{/if}
{if DEF_YORUM_ACIK } {include file="yorum.tpl"}{/if}
				
			
</div>	
{include file="sayfa_alti.tpl"}	
