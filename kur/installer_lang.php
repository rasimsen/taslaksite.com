<?php
header('Content-type: text/html; charset=utf-8');
// header
	$lang['installer'] = 'Sihirbaz';
	$lang['Welcome'] = 'Ho&#351;geldiniz';
	$lang['Install'] = 'Kur';
	$lang['Upgrade'] = 'Y&uuml;kselt';
	$lang['Troubleshooter'] = 'Sorun &ccedil;&ouml;z&uuml;c&uuml;';
	$lang['Step'] = 'Ad&#305;m';
	$lang['Readme'] = 'BeniOku';
	$lang['Admin'] = 'Y&ouml;netim Panel';
	$lang['Home'] = 'Anasayfa';
	$lang['Install_instruct'] = 'L&uuml;tfen veritaban&#305;n&#305;z&#305;n g&uuml;ncel olup olmad&#305;&#287;&#305;n&#305; kontrol ediniz. Varolan bir siteniz varsa versiyon g&uuml;ncelleme yap&#305;n&#305;z!';
	$lang['Upgrade_instruct'] = 'G&uuml;ncelleme i&#351;lemi veritaban&#305;n&#305;zda g&uuml;ncelleme yapacakt&#305;r. Ba&#351;lamadan &ouml;nce l&uuml;tfen yedek al&#305;n&#305;z.';
	$lang['Troubleshooter_instruct'] = 'Sihirbaz &#351;uan s&#305;k&ccedil;a kar&#351;&#305;la&#351;&#305;lan problemlerden birini buldu. L&uuml;tfen dizin izinlerini kontrol ediniz.';

// intro / step 1
	$lang['WelcomeToInstaller'] = 'TaslakSite.com Kurulum Sihirbaz&#305;na Ho&#351;geldiniz!';
	$lang['Introduction'] = 'Ba&#351;lang&#305;&ccedil;';
	$lang['WelcomeToThe'] = '<a href="http://www.taslaksite.com" target="_blank">TaslakSite.com &#304;&ccedil;erik Y&ouml;netim Sistemine</a> ho&#351;geldiniz. TaslakSite &#304;YS yi kurmadan &ouml;nce l&uuml;tfen <a href="http://www.taslaksite.com/indir.php" target="_blank">resmi TaslakSite &#304;YS &#304;ndirme</a> sayfas&#305;ndan son versiyon olup olmad&#305;&#287;&#305;n&#305; kontrol edin.';
	$lang['Bugs'] = 'TaslakSite &#304;YS kurulum a&#351;amas&#305;nda kar&#351;&#305;la&#351;t&#305;r&#287;&#305;n&#305;z hatalar ve site ilgili di&#287;er sorunlar&#305; l&uuml;tfen <a href="http://www.taslaksite.com/hatalar.php" target="_blank">TaslakSite &#304;YS Hatalar</a> sayfas&#305;n&#305; kullanarak bize iletin.';
	$lang['Installation'] = 'Kurulum (L&uuml;tfen Dikkatlice Okuyunuz)';
	$lang['OnceFamiliar'] = '<p>E&#287;er ilk defa kurulum yap&#305;yorsan&#305;z a&#351;a&#287;&#305;daki d&uuml;zenlemeleri yapt&#305;ktan sonra kuruluma ba&#351;lanacakt&#305;r. &ouml;nceki versiyondan y&uuml;kseltme yapmak istiyorsan&#305;z, l&uuml;tfen yukardaki linklerden g&uuml;ncelleme butonuna t&#305;klayarak g&uuml;ncelleme script ini &ccedil;al&#305;&#351;t&#305;r&#305;n&#305;z. UYARI : TaslakSite &#304;YS Kurulum Sihirbaz&#305;n&#305; &ccedil;al&#305;&#351;t&#305;rd&#305;&#287;&#305;n&#305;z anda daha &ouml;nceden var olan TaslakSite &#304;YS veritaban&#305;nda bulunan t&uuml;m tablo ve ayarlar&#305;n &uuml;zerine yaz&#305;lacakt&#305;r, bu y&uuml;zden l&uuml;tfen devam etmeden &ouml;nce bu bilgileri g&ouml;z &ouml;n&uuml;ne al&#305;n&#305;z.</p><br />
	<h4>1. A&#351;a&#287;&#305;daki klas&ouml;r ve dosyalar&#305;n izinlerini CHMOD 755 yap&#305;n&#305;z.</h4>
	<ol>
	<li>/sInc/</li>
	<li>/sInc/ayarlar.sen.php</li>
	</ol><br />
	<h4>2. Kurulum tamamland&#305;ktan sonra yukar&#305;daki klas&ouml;r ve dosyalar&#305;n izinlerini CHMOD 666 yap&#305;n&#305;z</h4>
	<br />
	<h4>3. Kurulum tamamland&#305;ktan sonra <font color=red>kur</font> dizinini mutlaka siliniz!</h4>
	<br />
	Kuruluma ba&#351;lamadan &ouml;nce TaslakSite &#304;YS genel konsept ve tasar&#305;m hakk&#305;nda forumlarda g&ouml;nderilenlere g&ouml;z atman&#305;z&#305; tavsiye ederiz.

	<p>Bir sonraki ad&#305;ma ge&ccedil;ip, TaslakSite &#304;YS yi kurun</p>';

// step 2
	$lang['EnterSiteInfo'] = 'Site bilgilerinizi giriniz. ';
	$lang['SiteRootAddress'] = 'Site Adresi';
	$lang['SiteURL'] = 'Site URL';
	$lang['SiteName'] = 'Site Adi';

	$lang['EnterMySQL'] = 'MySQL veritaban&#305; ayarlar&#305;n&#305; a&#351;a&#287;&#305;ya giriniz. MySQL veritaban&#305; bilgilerini bilmiyorsan&#305;z, webhosting &#351;irketinizin d&ouml;k&uuml;manlar&#305;na bak&#305;n&#305;z veya onlarla temasa ge&ccedil;ip bilgileri isteyiniz.';
	$lang['DatabaseName'] = 'Veritaban&#305; Ad&#305;';
	$lang['DatabaseUsername'] = 'Veritaban&#305; Kullan&#305;c&#305; Ad&#305;';
	$lang['DatabasePassword'] = 'Veritaban&#305; &#351;ifresi';
	$lang['DatabaseServer'] = 'Veritaban&#305; Server Ad&#305;';
	$lang['TablePrefix'] = 'Tablo &ouml;nadlar&#305;(Table Prefix)';
	$lang['PrefixExample'] = '(&ouml;rne&#287;in: "taslak_" &ouml;ntak&#305;s&#305; kullanicilar tablosunu, taslak_kullanicilar yapar.)';
	$lang['CheckSettings'] = 'Ayarlar&#305; Kontrol Et ve Kaydet';
	$lang['Errors'] = 'L&uuml;tfen yukar&#305;daki hatalar&#305; d&uuml;zeltin, kurulum kesildi!';

// step 3
	$lang['ConnectionEstab'] = 'Veritaban&#305; ba&#287;lant&#305;s&#305; ba&#351;ar&#305;yla kuruldu...';
	$lang['FoundDb'] = 'Veritaban&#305; ba&#287;lant&#305;s&#305; test edildi. Ba&#351;ar&#305;l&#305;...';
	$lang['dbconnect'] = '\'/sInc/ayarlar.sen.php\' dosyas&#305;na veritaban&#305; konfig&uuml;rasyonlar&#305; ba&#351;ar&#305;yla eklendi.';
	$lang['DbTableCreate'] = '<font color="red">Sonraki ad&#305;mda veritaban&#305; tablolar&#305; olu&#351;turulacakt&#305;r..</font>';
	$lang['NoErrors'] = 'Sonraki ad&#305;m i&ccedil;in haz&#305;rs&#305;n&#305;z...';
	$lang['StartSetup'] = 'Kuruluma Ba&#351;la';
	$lang['Next'] = '&#304;lerle';
	$lang['GoBack'] = 'Geri';
	$lang['Error2-1'] = '\'/sInc/ayarlar.sen.php\' dosyas&#305;na yaz&#305;lamad&#305;';
	$lang['Error2-2'] = '';
	$lang['Error2-3'] = 'Veritaban&#305;na ba&#287;lant&#305; kuruldu fakat veritaban&#305; ad&#305; hatal&#305;.';
	$lang['Error2-4'] = 'Verilen bilgileri kullanarak Veritaban&#305; Sunucusuna ba&#287;lan&#305;lamad&#305;.';

// step 4
	$lang['CreatingTables'] = '<p><strong>Veritaban&#305; tablolar&#305; olu&#351;turuluyor...</strong></p>';
	$lang['TablesGood'] = '<p><strong>Tablolar ba&#351;ar&#305;yla olu&#351;turuldu!</strong></p><hr />';
	$lang['Error3-1'] = '<p>Tablolar&#305; olu&#351;tururken hata ile kar&#351;&#305;la&#351;&#305;ld&#305;.</p>';
	$lang['Error3-2'] = '<p>Veritaban&#305;na ba&#287;lan&#305;lamad&#305;.</p>';
	$lang['EnterGod'] = '<br><p><strong>Y&ouml;netim Paneli i&ccedil;in Y&ouml;netici Hesab&#305; Olu&#351;turma</strong><br /><br /><font color=red>Not:L&uuml;tfen bu bu bilgileri not ediniz, y&ouml;netim paneline girerken ve sitenizi d&uuml;zenlerken bu bilgiler gerekecektir.</font></p>';
	$lang['GodLogin'] = 'Y&ouml;netici Kullan&#305;c&#305; Ad&#305;';
	$lang['GodPassword'] = 'Y&ouml;netici &#351;ifre';
	$lang['ConfirmPassword'] = '&#350;ifre Do&#287;rula';
	$lang['GodEmail'] = 'Y&ouml;netici E-mail';
	$lang['CreateAdmin'] = 'Y&ouml;netici Hesab&#305; Olu&#351;tur';

// Step 5
	$lang['Error5-1'] = 'L&uuml;tfen y&ouml;netici hesab&#305; i&ccedil;in gerekli olan t&uuml;m alanlar&#305; doldurunuz.';
	$lang['Error5-2'] = '&#351;ifre alanlar&#305; birbiriyle e&#351;le&#351;miyor. L&uuml;tfen geri gidip &#351;ifre alanlar&#305;n&#305; tekrar doldurunuz.';
	$lang['AddingAdmin'] = 'Y&ouml;netici hesab&#305; olu&#351;turuluyor...';
	$lang['InstallSuccess'] = 'Tebrikler,<a href="../">TaslakSite &#304;YS</a> ba&#351;ar&#305;yla kurdunuz!';
	$lang['WhatToDo'] = 'L&uuml;tfen a&#351;a&#287;&#305;dakileri yapmadan sitenizi kullan&#305;ma a&ccedil;may&#305;n:';
	$lang['WhatToDoList'] = '		<li><p>chmod "/sInc/ayarlar.sen.php" dosyas&#305;n&#305;n yetkilerini CHMOD 644 yap&#305;n&#305;z, ve de&#287;i&#351;tirmeyiniz.</p></li>
		<li><p>TaslakSite &#304;YS yi ba&#351;ar&#305;l&#305; bir &#351;ekilde kurduysan&#305;z, <b><font color=red>"/kur"</font></b> klas&ouml;r&uuml;n&uuml; <strong>mutlaka Siliniz</strong>.</p></li>
		<li><p><a href="../yonetimpanel/index.php">Y&ouml;netim Panel</a> ine girmek i&ccedil;in &ouml;nceki ad&#305;mda girmi&#351; oldu&#287;unuz y&ouml;netici email ve &#351;ifresini kullan&#305;n&#305;z.</p></li>
		<li><p>Siteniz ile ilgili ayarlar&#305; yapmak i&ccedil;in y&ouml;netim panelinden <a href="../yonetimpanel/conf.php">KONF&#304;G&Uuml;RASYONLAR</a> linkine t&#305;klay&#305;n&#305;z.</p></li>
		<li><p>Yeni sitenizi ve sitenizle ilgili bilgi/problemi bize iletmek i&ccedil;in <a href="http://forums.taslaksite.com/">TaslakSite Forumlar&#305;</a> adresini kullanabilirsiniz.</p></li>';

	$lang['FinalLinks'] = 'Hizli Kisayollar';
	$lang['FinalLinksList'] = '<li><a href="../yonetimpanel/index.php" target="_blank">Y&ouml;netim Panel</a></li>
							   <li> <a href="../index.php" target="_blank">Siteye Git</a></li>
							   <li> <a href="../yonetimpanel/conf.php" target="_blank">KONF&#304;G&Uuml;RASYONLAR</a></li>
							   ';


	// Upgrade
	$lang['UpgradeHome'] = 'This will upgrade the database for TaslakSite versions Beta 9.0.0 and above. It will also upgrade the language files for versions above TaslakSite 1.0.0. You will still need to upload the new files and update your templates to be fully compatable with the latest version.<br /> We recommend that you back up your website and database to a local computer before proceeding because the upgrade process will make permanent changes to your MySQL database.';
	$lang['UpgradeAreYouSure'] = 'Are you sure you want to upgrade you database and language file?';
	$lang['UpgradeYes'] = 'Yes';
	$lang['UpgradeLanguage'] = 'Success, TaslakSite updated your language file. It now includes the latest language items.';
	$lang['UpgradingTables'] = '<strong>Upgrading Database...</strong>';
	$lang['LanguageUpdate'] = '<strong>Upgrading Language File...</strong>';
	$lang['IfNoError'] = 'If there were no errors displayed, upgrade is complete!';
	$lang['PleaseFix'] = 'Please fix the above error(s), upgrade halted!';

// Errors
	$lang['NotFound'] = 'bulunamad&#305;!';
	$lang['TemplatesCNotFound'] = 'bulunamad&#305;! ilgili klas&ouml;r&uuml; olu&#351;turunuz.';
	$lang['CacheNotFound'] = 'bulunamad&#305;! /cache.';
	$lang['DbconnectNotFound'] = 'bulunamad&#305;! dbconnect.php';
	$lang['SettingsNotFound'] = 'bulunamad&#305;! settings.php';
	$lang['ZeroBytes'] = ' 0 byte.';
	$lang['NotEditable'] = ' dosyas&#305; yaz&#305;labilir de&#287;il. L&uuml;tfen CHMOD 777 olarak haklar&#305;n&#305; d&uuml;zenleyin';

//çðýöüþ ÇÐÝÖÜÞ
//&ccedil;&#287;&#305;&ouml;&uuml;&#351; &Ccedil;&#286;&#304;&Ouml;&Uuml;&#350;

?>
