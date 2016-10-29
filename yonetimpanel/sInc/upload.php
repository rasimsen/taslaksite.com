<?php
/*
  $Id: upload.php,v 1.2 2003/06/20 00:18:30 hpdl Exp $

  Rasim �EN taraf�ndan sunulmu� E-Commerce ��z�m�d�r
  rasim@aceleet.com
  http://www.aceleet.com

  Copyright (c) 2006 Aceleet.com
*/

class upload {
	var $arrFiles=array();
	var $thumbheight = 200;
	var $thumbwidth = 200;	
	var $newheight = 473;
	var $newwidth = 473;	

	var $prefixnew = 's_'; // fotograflar�n ba��na konulacak prefix 
	var $prefixthumb = 'sTh_'; // thumbnail lerin ba��na eklenecek 
	var $formats = array('image/gif','image/jpg','image/pjpeg','image/jpeg','image/png', 'image/x-png');
	var $maxfile = 3145728; //~3 mb
	var $mode = '0666'; 

	var $errors=array();
	var $deleteOriginal=true;

	/*
	 * dosya tipi kontrolu yap�l�yor
	 */
	function fileTypeControl($type){
		
		if (!in_array($type ,$this->formats) ){
				$this->error[]="Y�klemek istedi�iniz Foto�raf format� uygun de�il!(GIF,JPG veya PNG olmal�d�r)";
				return false;
		}else
			return true;
	}
	
	/*
	 * dosya boyutu kontrol edilir
	 * 
	 */
	function fileSizeControl($size){
		if (!$size >$this->maxfile) {
			$this->error[]="Foto�raf boyutuen fazla ".($this->maxfile/(1024*1024))." mb olabilir";
			return false;
		}else
			return true;
		
	}
	
	/*
	 * orant�l� dosya k���ltme
	 */
	 function resizeImage($aspect_ratio,$sizes,$newsizes){

		if(abs($newsizes["height"]/$aspect_ratio) >$newsizes["width"]) { //width height tan buyuk
			if ($sizes[0] <= $newsizes["width"]){ 
				$new_width = $sizes[0]; 
				$new_height = $sizes[1]; 
			}else{ 
				$new_width = $newsizes["width"]; 
				$new_height = abs($new_width*$aspect_ratio); 
			} 
		}else{
			if ($sizes[1] <= $newsizes["height"]){ 
				$new_width = $sizes[0]; 
				$new_height = $sizes[1]; 
			}else{ 
				$new_height = $newsizes["height"]; 
				$new_width = abs($new_height/$aspect_ratio); 
			} 
		}
	 	return array("width"=>$new_width,"height"=>$new_height);
	 }
	 
	/*
	 * $photo : upload edilecek foto bilgilerini tutan dizidir
	 * $destination : fotolar�n kaydedilece�i adres
	 * $thumb : foto�raflara ait thumbnail olu�turulacakm�. TR:Thumbnail and Resize, T:thjumbnail, R:Resize
	 */

	function photo_upload($photo,$destination,$thumb="TR"){//thumbnail and resize 

	$cp=count($photo['name']);
	for($i=0;$i<$cp;$i++){//start:for

			if($photo['name'][$i]=="") continue;
				$tt=explode(".",uniqid(null, true));
				$newname = $tt[0];
				$ext_tmp = explode(".",$photo['name'][$i]);
				$ext =$ext_tmp[count($ext_tmp )-1] ;
				$userfile_name = $newname.".".$ext;

				$userfile_tmp = $photo['tmp_name'][$i]; 
				$userfile_size = $photo['size'][$i]; 
				$userfile_type = $photo['type'][$i]; 

				if(!$this->fileTypeControl($userfile_type)) continue;//dosya format� uygun de�ilse hata y� diziye aktar ve sonrakine ge�

				if(!$this->fileSizeControl($userfile_size)) continue;//dosya boyutunu kontrol eder					

				## resime ad ver.
				$prod_img = $destination."/".$userfile_name; 
				$prod_img_new = $destination."/".$this->prefixnew.$userfile_name; 
				$prod_img_thumb = $destination."/".$this->prefixthumb.$userfile_name;
				
				$uploadedPhotos[$i][NAME]=$this->prefixnew.$userfile_name;
				$uploadedPhotos[$i][THUMBNAIL]=$this->prefixthumb.$userfile_name;
				$uploadedPhotos[$i][PHOTO_FOLDER]=$destination."/";
				
				## ana resmi kopyala
				move_uploaded_file($userfile_tmp, $prod_img);
				## modu degistir
				chmod ($prod_img, octdec($this->mode)); 

				## width height oranini al
				$sizes = getimagesize($prod_img); 
				$aspect_ratio = $sizes[1]/$sizes[0]; 
				

				
				//end:thumb image	
				$tip=$thumb=="T" || $thumb=="R"?1:2;

				for($j=0;$j<$tip;$j++){
					$ns=array();
					if(($thumb=="T" && $tip==1) || ($tip==2 && $j==0)){
							$file=$prod_img_thumb;
							$ns=$this->resizeImage($aspect_ratio,$sizes,array("width"=>$this->thumbwidth,"height"=>$this->thumbheight));
					}else{	
							$file=$prod_img_new;
							$ns=$this->resizeImage($aspect_ratio,$sizes,array("width"=>$this->newwidth,"height"=>$this->newheight));							
					}	
	
					//thumb olu�turuluyor
					$destimg=ImageCreateTrueColor($ns["width"],$ns["height"]) or $this->error[] ="Thumbnail olu�turma s�ras�nda hata ile kar��la��ld�.";
					
					if($userfile_type == 'image/jpg' || $userfile_type=='image/jpeg'|| $userfile_type=='image/pjpeg')
						$srcimg=ImageCreateFromJPEG($prod_img) or $this->error[]="Foto�raf acilmadi";
					elseif($userfile_type == 'image/png'|| $userfile_type == 'image/x-png')
						$srcimg=imagecreatefrompng($prod_img) or  $this->error[]="Foto�raf a��lamad�"; 
					elseif($userfile_type == 'image/gif')
						$srcimg=imagecreatefromgif($prod_img) or  $this->error[]="Foto�raf a��lamad�"; 
					
					ImageCopyResized($destimg,$srcimg,0,0,0,0,$ns["width"],$ns["height"], ImageSX($srcimg),ImageSY($srcimg)) or  $this->error[]="Boyutland�rma esnas�nda hata olu�tu"; 
	
					if($userfile_type == 'image/jpg' || $userfile_type=='image/jpeg'|| $userfile_type=='image/pjpeg')
						ImageJPEG($destimg,$file,90) or  $this->error[]="Thumbnail kaydetme esnas�nda hata ile kar��la��ld�"; 
					elseif($userfile_type == 'image/png'|| $userfile_type == 'image/x-png')
						imagepng($destimg,$file) or  $this->error[]="Thumbnail kaydetme esnas�nda hata ile kar��la��ld�"; 
					elseif($userfile_type == 'image/gif')
						imagegif($destimg,$file) or  $this->error[]="Thumbnail kaydetme esnas�nda hata ile kar��la��ld�";
	
					imagedestroy($destimg); 
				}//end:for

				$uploadedPhotos[$i][THUMB_GENISLIK]=$this->thumbwidth;
				$uploadedPhotos[$i][THUMB_YUKSEKLIK]=$this->thumbheight;
				$uploadedPhotos[$i][FOTO_GENISLIK]=$this->newwidth;
				$uploadedPhotos[$i][FOTO_YUKSEKLIK]=$this->newheight;
								
				if($this->deleteOriginal) unlink($prod_img );//orjinal photo yu sil
				
		}//end:for	

		if(count($this->error)>0){
			pre($this->error);
			return false;
		}else{//olu�an dosya isimleri
			return $uploadedPhotos;
		}	

	}//end:photo upload

   /***************************************/
	function izinVerilenDosyami($dosya_adi) {

		$izinli_uzantilar=explode(',',IK_CV_EXTENSION);
			
	  return in_array(end(explode(".", $dosya_adi)), $izinli_uzantilar);
	}



  function file_upload($dosya,$save_path,$prefix){

	/**
	 * �nce dosya uzant�s� kontrol edilir
	 */
  	if(!$this->izinVerilenDosyami($dosya["name"])){
  		return array("HATA"=>"Bu dosya tipinin y�klenmesine izin verilmemektedir. �zin verilen dosya tipleri:".IK_CV_EXTENSION);
  	}

   	$dosya_url=$prefix.$this->alYeniDosyaAdi($dosya["name"]);

   	if (move_uploaded_file($dosya['tmp_name'], $save_path.sAYIRAC.$dosya_url)) {
			return $dosya_url;
   		} else {
		    return array("HATA"=>"Dosya y�klenemedi");
		}   		
   }

  function alYeniDosyaAdi($dosya_adi){

  		$tt=explode(".",uniqid(null, true));
		$newname = $tt[0];
		$ext_tmp = explode(".",$dosya_adi);
		$ext =$ext_tmp[count($ext_tmp )-1] ;
  		
		return $newname.".".$ext;
  }
}
?>
