<?php
require_once("sInc/sayfa_uygulama.php");
require_once("sInc/uye.php");

$sen=new TaslakSayfa();

$sayfa_bilgi=$sen->Hazirla($db,$_GET['id']);
$sen->smarty->assign('sayfa_linki',DEF_SAYFA_LINKI);

$ana_tablo=tKULLANICILAR;

$uye=new Uye();

$s=$_GET["s"];

switch($s){
	
	case 1:
		$u=$uye->login($db);
		$sen->smarty->assign("kullanici_adi",$u['AD'].' '.$u['SOYAD'].'('.$u["KULLANICI_ADI"].')');
		//$sen->smarty->assign("kullanici_adi",$lg["KULLANICI_ADI"]);
		$sen->sYaz("uye_bilgi.tpl");
		break;
	case 2://þifre deðiþtir
		if($sen->alPost("btnSifreDegistirme")){
			// girilen eski þifre doðrumu kontrolü yapýlýr..
			$u=$uye->login($db);
			$eskiSifreKontrol=$sen->veriSay($db,$ana_tablo,array('ID'=>$u[ID],'DURUM'=>'1','SIFRE'=>md5($sen->alPost('eski_sifre'))),"","",array("COUNT"=>"*"));

			if($eskiSifreKontrol[0][COUNT]==1){
				$sifre=trim($sen->alPost("sifre"));
				$sifre2=trim($sen->alPost("sifre2"));
				
				$hata=array();
				
				if(strlen($sifre)<4 || $sifre<>$sifre2)
					$hata[]="Lütfen þifrenizi kontrol ediniz!!";	

				if(count($hata)>0 ){
					$sen->mesajUyari("Hata","Lütfen Dikkat! <br><br><ul><li>".implode("<li>",$hata)."</ul>");		
					$sen->sYaz("uye_sifre_degistirme.tpl");
					break;				
				}else{
					$veri=array(
								"uSIFRE"=>md5($sifre),
								"wID"=>$u[ID],
								"wDURUM"=>'1'
							);
					$db_islem=$sen->veriGuncelle($db,$ana_tablo,$veri,0);
					
					if($db_islem){
						emailGonder($u[EMAIL],"Þifreniz deðiþtirilmiþtir..","Sayýn ".$u[AD]." ".$u[SOYAD].", isteðiniz üzerine þifreniz deðiþtirilmiþtir..");
						uyeCikisi($db,false);
						$sen->mesajBasarili("Üye Bilgi Güncelleme Baþarýlý","Bilgileriniz baþarýyla güncellenmiþtir<br><br>Yeni þifreniz ile sisteme tekrar üye giriþi yapmanýz gerekmektedir!");			
						$sen->sYaz("islem_basarili.tpl");
						break;
					}else{
						$sen->mesajUyari("Hata","HATA OLUÞTU! <br><br> Lütfen tekrar deneyiniz<br><br> Hata devam ederse site yönetimini lütfen bilgilendiriniz..");
					}					
				}					
			}else{
				$sen->mesajUyari("Eski Þifrenizi Hatalý","Þuanki þifrenizi hatalý girdiniz. Lütfen þuan aktif olan þifrenizi gözden geçirip, tekrar giriniz!!");
				$sen->sYaz("uye_sifre_degistirme.tpl");								
			}
			//yeni þifre kaydedilir.
		}else{
			$sen->sYaz("uye_sifre_degistirme.tpl");				
		}
		break;
	case 3://üye bilgileri güncelleme	
		
			$u=$uye->login($db);
			
			if(isset($_POST["btnUyeOl"])){
				
				$hata=array();				
				
				$ad=trim($sen->alPost("ad"));
				$soyad=trim($sen->alPost("soyad"));
				
				$egitim=trim($sen->alPost("egitim"));
				$cinsiyet=trim($sen->alPost("cinsiyet"));

				if(trim($sen->alPost("dogum_tarihi_yil"))||trim($sen->alPost("dogum_tarihi_ay"))||trim($sen->alPost("dogum_tarihi_gun")))
				{
					if(trim($sen->alPost("dogum_tarihi_yil"))&&strlen(trim($sen->alPost("dogum_tarihi_yil")))==4)
						$dogum_tarihi=trim($sen->alPost("dogum_tarihi_yil"));
					else
						$hata[]="Lütfen Doðum Yýlýný kontrol ediniz!!";	
					
					if(trim($sen->alPost("dogum_tarihi_ay")))
						$dogum_tarihi.="-".trim($sen->alPost("dogum_tarihi_ay"));
					else
						$hata[]="Lütfen Doðum Ayýný boþ býrakmayýnýz!!";	
					
					if(trim($sen->alPost("dogum_tarihi_gun")))
						$dogum_tarihi.="-".trim($sen->alPost("dogum_tarihi_gun"));
					else
						$hata[]="Lütfen Doðum Gününü boþ býrakmayýnýz!!";	
				}else $dogum_tarihi="";
				
				$tel=trim($sen->alPost("tel"));
				$adres=trim($sen->alPost("adres"));

				$sehir_diger=trim($sen->alPost("sehir_diger"));
				$ulke_diger=trim($sen->alPost("ulke_diger"));
				
				if(!$sehir_diger&&!trim($sen->alPost("sehir")))
					$sehir="";
				else	
					$sehir=$sehir_diger?$sehir_diger:trim($sen->alPost("sehir"))."-".trim($sen->alPost("sehir_adi"));

				if(!$ulke_diger && !trim($sen->alPost("ulke")))
					$ulke="";
				else	
					$ulke=$ulke_diger?$ulke_diger:trim($sen->alPost("ulke"))."-".trim($sen->alPost("ulke_adi"));
							
				if(strlen($ad)<3)
					$hata[]="Lütfen adýnýzý kontrol ediniz!!";	
				if(strlen($soyad)<3)
					$hata[]="Lütfen soyadýnýzý kontrol ediniz!!";	
			
				// kullanýcý kontrol
				//pre($lgn->kontrolKullaniciAdi($db,$kullanici_adi));	
				//pre($hata);
				if(count($hata)>0 ){
					//hata varsa
						$sen->mesajUyari("Hata","Lütfen Dikkat! <br><br><ul><li>".implode("<li>",$hata)."</ul>");		
				}else{
				
					//db ye kayýt
					$veri=array(
						"uAD"=>$ad, 
						"uSOYAD"=>$soyad, 
						"uADRES"=>$adres, 
						"uTEL"=>$tel, 
						"uTIP"=>"KULLANICI"
					);

					if($egitim)$veri['uEGITIM']=$egitim;
					if($cinsiyet)$veri['uCINSIYET']=$cinsiyet;
					if($dogum_tarihi)$veri['uDOGUM_TARIHI']=$dogum_tarihi;
					if($sehir)$veri['uSEHIR']=$sehir;
					if($ulke)$veri['uULKE']=$ulke;
					
					$veri["wID"]=$u['ID'];
					$veri["wDURUM"]='1';

					$id=$sen->veriGuncelle($db,$ana_tablo,$veri,0);
					if($id){
						$konu="Üye Bilgi Güncelleme Baþarýlý";
						$icerik="Bilgileriniz baþarýyla güncellenmiþtir..";						
						emailGonder($u[EMAIL],$konu,$icerik,"",$ad." ".$soyad);						
						$sen->mesajBasarili($konu,$icerik);
						$sen->sYaz("islem_basarili.tpl");
						break;
					}else{
						$sen->mesajUyari("Hata","HATA OLUÞTU! <br><br> Lütfen tekrar deneyiniz<br><br> Hata devam ederse site yönetimini lütfen bilgilendiriniz..");
					}
			
				}		
					
			}		
			$select=array('ID','KULLANICI_ADI','AD','SOYAD','ADRES','TEL','EMAIL','EGITIM','CINSIYET','DOGUM_TARIHI','SEHIR','ULKE');
			$veri=$sen->veriAl($db,$ana_tablo,$select,array('DURUM'=>'1','ID'=>$u['ID']),"",0);
			//pre($veri);
			$sen->smarty->assign("r",$veri[0]);
			$sen->sYaz("uye_bilgi_guncelleme.tpl");
			break;
	case 4: // üyelik aktivasyon 
				
			$v=array(
					"KULLANICI_ADI"=>$sen->alGet('un'),
					"AKTIVASYON_KODU"=>$sen->alGet('aktivasyon_kodu'),
					"DURUM"=>'0'
					);
			$t=$sen->veriSay($db,$ana_tablo,$v,"","",array("COUNT"=>"*"));		
			if($t[0][COUNT]=1){
				$veri=array(
						"uDURUM"=>'1',
						"wKULLANICI_ADI"=>$sen->alGet('un'),
						"wAKTIVASYON_KODU"=>$sen->alGet('aktivasyon_kodu'),
						"wDURUM"=>'0'
						);
				$sen->veriGuncelle($db,$ana_tablo,$veri);
				$sen->mesajBasarili("Üyeliðiniz Aktif","Üyeliðiniz aktif hale gelmiþtir. Üye olduðunuz için teþekkürler..");
			}else{
				$sen->mesajUyari("Aktivasyon kodu hatalý","Lütfen size gelen aktivasyon emailindeki linki kontrol ediniz!!");
			}
			$sen->sYaz("uyelik_basarili.tpl");
			die;
			
			break;

	case 5://email deðiþtir
		$u=$uye->login($db);
		if($sen->alPost("btnEmailDegistirme")){

			$email1=trim($sen->alPost("email1"));
			$email2=trim($sen->alPost("email2"));
				
				
			$hata=array();
				
			if(!$sen->checkEmail($email1))
				$hata[]="Lütfen emailinizi kontrol ediniz!!";	
			if($email1<>$email2)
				$hata[]="Email tekrarýnýz birbiriyle uyuþmuyor!!";	
			
			$email_sahip_detay=$uye->kontrolEmail($db,$email1);
			//pre($email_sahip_detay);	
			if($email_sahip_detay[ID] && $email_sahip_detay[ID]!=$u[ID])
				$hata[]="Girmiþ olduðunuz email baþka bir üyemiz tarafýndan kullanýlmaktadir!!";	
				
			if(count($hata)>0 ){
				$sen->mesajUyari("Hata","Lütfen Dikkat! <br><br><ul><li>".implode("<li>",$hata)."</ul>");		
				$sen->smarty->assign('eski_email',$u[EMAIL]);
				$sen->sYaz("uye_email_degistirme.tpl");
				break;				
			}else{
				$veri=array(
							"uEMAIL"=>$email1,
							"wID"=>$u[ID],
							"wDURUM"=>'1'
						);
						
				$db_islem=$sen->veriGuncelle($db,$ana_tablo,$veri,1);
				
				if($db_islem){
					emailGonder($u[EMAIL],"Email bilgileriniz deðiþtirilmiþtir..","Sayýn ".$u[AD]." ".$u[SOYAD].", isteðiniz üzerine email adresiniz ".$email1." olarak deðiþtirilmiþtir. Bundan böyle iletiþim için ".$email1." adresi kullanýlacaktýr..");
					emailGonder($email1,"Email bilgileriniz deðiþtirilmiþtir..","Sayýn ".$u[AD]." ".$u[SOYAD].", isteðiniz üzerine email adresiniz ".$email1." olarak deðiþtirilmiþtir. Bundan böyle iletiþim için ".$email1." adresi kullanýlacaktýr..");
					$sen->mesajBasarili("Üye Bilgi Güncelleme Baþarýlý","Email adresiniz ".$email1." olarak deðiþtirilmiþtir!");			
					$sen->sYaz("islem_basarili.tpl");
					break;
				}else{
					$sen->mesajUyari("Hata","HATA OLUÞTU! <br><br> Lütfen tekrar deneyiniz<br><br> Hata devam ederse site yönetimini lütfen bilgilendiriniz..");
				}					
			}					
		}else{
			$sen->smarty->assign('eski_email',$u[EMAIL]);
			$sen->sYaz("uye_email_degistirme.tpl");				
		}
		break;			

	case 6:
		$u=$uye->login($db);
		if($sen->alPost("btnUyeIptal")){
			$db_islem=$sen->veriGuncelle($db,$ana_tablo,array('uDURUM'=>'0','wID'=>$u['ID'],'wDURUM'=>'1'),0);
			if($db_islem){
				emailGonder($u[EMAIL],"Üyeliðiniz iptal edilmiþtir..","Sayýn ".$u[AD]." ".$u[SOYAD].", isteðiniz üzerine üyeliðiniz iptal edilmiþtir..");
				$sen->mesajBasarili("Üyeliðiniz iptal edilmiþtir","Sayýn ".$u[AD]." ".$u[SOYAD].", isteðiniz üzerine üyeliðiniz iptal edilmiþtir..");			
				uyeCikisi($db,false);
				$sen->sYaz("islem_basarili.tpl");
				break;
			}else{
				$sen->mesajUyari("Hata","HATA OLUÞTU! <br><br> Lütfen tekrar deneyiniz<br><br> Hata devam ederse site yönetimini lütfen bilgilendiriniz..");
			}					
			
		}
		
		$select=array('ID','KULLANICI_ADI','AD','SOYAD','ADRES','TEL','EMAIL','EGITIM','CINSIYET','DOGUM_TARIHI','SEHIR','ULKE');
		$veri=$sen->veriAl($db,$ana_tablo,$select,array('DURUM'=>'1','ID'=>$u['ID']),"",0);
		//pre($veri);
		$sen->smarty->assign("r",$veri[0]);
		$sen->sYaz("uye_iptal.tpl");
		
		break;
		
	default:

		$u=$uye->login($db);
		
		/**
		 * uye giriþi yapýldý ise ve baþka bir sayfadan üye giriþi sayfasýna gelindi ise
		 * login baþarýlý olduktan sonra gelinen adrese yönlendirme yapýlýr.
		 */
		if($_REQUEST['geridonus_url'] && $u){
			$sen->yonlendir(sayfaAdresiDecode($_REQUEST['geridonus_url']));
		}
		
		if($u){
			$sen->smarty->assign("kullanici_adi",$u['AD'].' '.$u['SOYAD'].'('.$u["KULLANICI_ADI"].')');
			$sen->sYaz("uye_bilgi.tpl");
			//echo "<script>alert('Üye giriþi yapmýþ durumdasýnýz.');location.href='uye.php?s=1';</script>";
			//$sen->yonlendir("index.php");
		}else{		
			$sen->sYaz("uye_girisi.tpl");
		}
		break;
}

?>