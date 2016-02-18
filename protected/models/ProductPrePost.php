<?php
/**
 * This is the model class for table "tbl_product_pre_post".
 *
 * The followings are the available columns in table 'tbl_product_pre_post':
 * @property string $idProduct
 * @property string $idUser
 * @property string $idProductStatus
 * @property string $title
 * @property string $description
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property Dictionary[] $tblDictionaries
 * @property PhotoPrePost $photoPrePost
 * @property Product $product
 * @property ConfProductStatus $idProductStatus0
 * @property User $idUser0
 * @property User[] $tblUsers
 * @property ShoppingOptPhoto[] $shoppingOptPhotos
 */
class ProductPrePost extends CActiveRecord{
	
	public $termsAccepted;
	public $editKeywords='';
	
	public function getUrlTitle(){
		return preg_replace('/[^a-zA-Z0-9]+/', '-', $this->title);
	}
	
	public function getDownloadsNumber(){
		$criteria=new CDbCriteria;
		$criteria->condition='idProduct=:idProduct';
		$criteria->params=array(':idProduct'=>$this->idProduct);
		return TransactionPhoto::model()->count($criteria);
	}
	
	public function getKeywordsCSV(){
		if($this->editKeywords!='diff'){
			$keywordsCSV="";
			$criteria=new CDbCriteria;
			$criteria->condition='idProduct=:idProduct';
			$criteria->params=array(':idProduct'=>$this->idProduct);
			$dataKeywords=Keyword::model()->findAll($criteria);
			for($k=0; $k<count($dataKeywords); $k++){
				$keywordsCSV = $keywordsCSV.$dataKeywords[$k]->keyword.";";
			}
			return $keywordsCSV;
		}else 
			return "";
	}
	
	public function getEquipment($type){
		if(isset($this->equipment)){
			for($i=0; $i<count($this->equipment); $i++)
				if(isset($this->equipment[$i]->equipmentType))
					if($this->equipment[$i]->equipmentType==$type)
						return $this->equipment[$i]->description;
		}
		return "---";
	}
	
	private function createBlobClient(){
		if(Yii::app()->params['useStorageEmulator']){
			$blobStorageClient = new Microsoft_WindowsAzure_Storage_Blob();
		}else{
			$blobStorageClient = new Microsoft_WindowsAzure_Storage_Blob(
				'blob.core.windows.net',
				STORAGE_ACCOUNT_NAME,
				STORAGE_ACCOUNT_KEY
			);
		}
		return $blobStorageClient;
	}
	
	private function createBlobContainer($container){
		$blobStorageClient=$this->createBlobClient();
		$blobStorageClient->createContainerIfNotExists($container);
		//POSSIBILE OTTIMIZZAZIONE: setContainer solo se non esiste gi�
		if($container=='photos')
			$blobStorageClient->setContainerAcl(
				$container,
				Microsoft_WindowsAzure_Storage_Blob::ACL_PRIVATE
			);
		else
			$blobStorageClient->setContainerAcl(
				$container,
				Microsoft_WindowsAzure_Storage_Blob::ACL_PUBLIC
			);
		return $blobStorageClient;
	}

	public function addToBlob($src, $dest, $container){
		$blobStorageClient=$this->createBlobContainer($container);
		
		$blob = $blobStorageClient->putBlob(
        	$container,
        	$dest,
        	$src
		);
	}

	public function addDataToBlob($content, $dest, $container){
		$blobStorageClient=$this->createBlobContainer($container);
		
		$blob = $blobStorageClient->putBlobData(
        	$container,
        	$dest,
        	$content
		);
	}
	
	private function getPath($size){
    	if($size=='full'){
    		return 'photos';
    	}else{
    		return 'thumb'.$size;
    	}
	}
	
	public function getFileName($size=null){
		/*if($size==430)
			return 'geostockphoto_'.$this->idProduct.'_'.str_replace ( ' ', '_', $this->title);
		else*/if($size=='full')
			return $this->idProduct;
		else
			return 'geostockphoto_'.$this->idProduct.'_'.hash('md5', 'GSP_'.$this->idProduct.$this->insert_timestamp, false);
	}
	
	public function getUrl($size){
		if($size=='circle')
			$extension='.png';
		else
			$extension='.jpg';
    	if(Yii::app()->params['useBlob']){
    		//return $this->readBlobUrl($this->getPath($size), $this->getFileName($size).$extension);//".jpg");
    		if($size=='circle' || $size==120)
				return "http://az415831.vo.msecnd.net/".$this->getPath($size)."/".$this->getFileName($size).$extension;
			else
				return "http://geostockphoto1.blob.core.windows.net/".$this->getPath($size)."/".$this->getFileName($size).$extension;
    	}else
    		return Yii::app()->baseUrl."/".$this->getPath($size)."/".$this->getFileName($size).$extension;//".jpg";
	}
	
	public function getLocalPath($size){
		if($size=='circle')
			$extension='.png';
		else 
			$extension='.jpg';
    	if(Yii::app()->params['useBlob'])
    		return $this->readBlobPath($this->getPath($size), $this->getFileName($size).$extension);
    	else
    		return dirname(Yii::app()->request->scriptFile)."/".$this->getPath($size)."/".$this->getFileName($size).$extension;
	}
	
	public function readBlobUrl($container, $filename){
		$blobStorageClient=$this->createBlobClient();
		$blob=$blobStorageClient->getBlobInstance($container, $filename);
		return $blob->url;
	}
	
	public function readBlobPath($container, $filename){
		$blobStorageClient=$this->createBlobClient();
		if(Yii::app()->params['useStorageEmulator'])
			$file = dirname(Yii::app()->request->scriptFile).'/temp/'.$filename;
		else
			$file = azure_getlocalresourcepath('localStoreOne').$filename;
		$blobStorageClient->getBlob($container, $filename, $file);
		return $file;
	}
	
	private function saveThumb($tmb, $size){
		if($size==430){
			if($this->photoPrePost->ratio<2.6)
				$tmb->image_watermark = "./images/watermark_160.png";
			else
				$tmb->image_watermark = "./images/watermark_100.png";
		}

		$tmb->image_ratio = true;
		$tmb->image_resize = true;
		$tmb->image_watermark_no_zoom_out = true;
		$tmb->image_x = $size;
		$tmb->image_y = $size;
		$tmb->file_new_name_body = $this->getFileName($size);
	    
		if(Yii::app()->params['useBlob'])
		   	$content=$tmb->process();
		else
		   	$tmb->process('./thumb'.$size);
		if(!$tmb->processed)
			throw new CHttpException(404,'Photo upload: '.$tmb->error.' [#'.$this->idProduct.']');
		if(Yii::app()->params['useBlob'])
		   	$this->addDataToBlob($content, $this->getFileName($size).'.jpg', $this->getPath($size));
	}
	
	public function imagealphamask(&$picture, $mask ) {
	    // Get sizes and set up new picture
	    $xSize = 80;//130
	    $ySize = 80;//130
	    $newPicture = imagecreatetruecolor( $xSize, $ySize );
	    imagesavealpha( $newPicture, true );
	    imagefill( $newPicture, 0, 0, imagecolorallocatealpha( $newPicture, 0, 0, 0, 127 ) );
	    $xSize = 56;//94
	    $ySize = 56;//94
	    
	    $tempPic = imagecreatetruecolor($xSize, $ySize);
	    if(imagesx($picture)>imagesy($picture)){
	    	$ratio=imagesy($picture)/$ySize;
        	imagecopyresampled($tempPic, $picture, 0, 0, imagesx($picture)/2-$xSize/2*$ratio, 0, imagesx($picture)*$ySize/imagesy($picture), $ySize, imagesx($picture), imagesy($picture));
	    }else{
	    	$ratio=imagesx($picture)/$xSize;
	    	imagecopyresampled($tempPic, $picture, 0, 0, 0, imagesy($picture)/2-$ySize/2*$ratio, $xSize, imagesy($picture)*$xSize/imagesx($picture), imagesx($picture), imagesy($picture));
	    }
        //imagedestroy( $mask );
        $picture = $tempPic;
	
	    // Perform pixel-based alpha map application
	    for( $x = 0; $x < $xSize; $x++ ) {
	        for( $y = 0; $y < $ySize; $y++ ) {
	            $alpha = imagecolorsforindex( $mask, imagecolorat( $mask, $x, $y ) );
	            $alpha = 127 - floor( $alpha[ 'red' ] / 2 );
	            $color = imagecolorsforindex( $picture, imagecolorat( $picture, $x, $y ) );
	            imagesetpixel( $newPicture, $x, $y, imagecolorallocatealpha( $newPicture, $color[ 'red' ], $color[ 'green' ], $color[ 'blue' ], $alpha ) );
	        }
	    }
	
	    // Copy back to original picture
	    imagedestroy( $picture );
	    $picture = $newPicture;
	}
	
	public function deleteBlob($container, $file){
		$blobStorageClient=$this->createBlobContainer($container);
		if($blobStorageClient->blobExists($container, $file))
			$blobStorageClient->deleteBlob($container, $file);
	}
	
	public function deleteUploadedPhoto(){
		$this->deletePhoto('430');
		//$this->deletePhoto('120');
		$this->deletePhoto('circle');
		$this->deletePhoto('full');
	}

	public function deletePhoto($size){
		if(Yii::app()->params['useBlob']){
		   	$this->deleteBlob($this->getPath($size), $this->getFileName($size).'.jpg');
		}else{
		   	$fileName=$this->getLocalPath($size);
		   	if(file_exists($fileName))
		   		unlink($fileName);
		}
	}
	
	public function saveKeywords($keywordsArray){
		Keyword::model()->deleteAll('idProduct='.$this->idProduct);
		
		$count=count($keywordsArray);
		for($j=0; $j<$count; $j++){
			if($keywordsArray[$j]!=""){
				$keywordsInner=str_getcsv($keywordsArray[$j], ";");
				if(count($keywordsInner)>1){
					$keywordsArray = array_merge($keywordsArray, $keywordsInner);
				}
			}
		}
	
		$count=count($keywordsArray);
		for($j=0; $j<$count; $j++){
			if($keywordsArray[$j]!=""){
				$keywordsInner=str_getcsv($keywordsArray[$j], ",");
				if(count($keywordsInner)>1){
					unset($keywordsArray[$j]);
					$keywordsArray = array_merge($keywordsArray, $keywordsInner);
				}
			}
		}
		
		for($j=0; $j<count($keywordsArray); $j++){
			$keywordsArray2[$j]=trim($keywordsArray[$j]);
		}
		$keywordsArray=array_unique($keywordsArray2);
		
		for($j=0; $j<min(count($keywordsArray), 10); $j++){
			if(isset($keywordsArray[$j])){
				if($keywordsArray[$j]!="" && strlen($keywordsArray[$j])<=35){
					try{
						$modelDictionary=Dictionary::model()->findByPk($keywordsArray[$j]);
						if(!isset($modelDictionary)){
							$modelDictionary=new Dictionary;
							$modelDictionary->keyword=$keywordsArray[$j];
							$modelDictionary->fromUser='1';
							if(!$modelDictionary->save())
								throw new CHttpException(404, "Save photo: something went wrong while adding the keyword '".$keywordsArray[$j]."' of the photo #".$this->idProduct.' in the dictionary.');
						}
						$criteria=new CDbCriteria;
						$criteria->condition='keyword=\''.$keywordsArray[$j].'\' and idProduct='.$this->idProduct;
						if(!Keyword::model()->exists($criteria)){
							$modelKeyword = new Keyword;
							$modelKeyword->idProduct = $this->idProduct;
							$modelKeyword->keyword = $keywordsArray[$j];
							if(!$modelKeyword->save())
								throw new CHttpException(404, "Save photo: something went wrong while saving the keyword '".$keywordsArray[$j]."' of the photo #".$this->idProduct);
						}
					}catch(Exception $e){
						//In case of error while saving a keyword, do nothing
					}
				}
			}
		}
	}
	
	public function saveUploadedPhoto($file){
		$lastKey=$this->idProduct;
		list($width, $height) = getimagesize($file, $info);
		if(isset($info["APP13"])){
			if($iptc = iptcparse($info["APP13"])){
				if(isset($iptc["2#120"][0]))
					$this->title=utf8_encode(substr($iptc["2#120"][0], 0 , 63));
				if(isset($iptc["2#025"])){ //keywords
					$this->saveKeywords($iptc["2#025"]);
				}
			}
		}
		if(($width*$height)<4000000)
			throw new CHttpException(404,'Photo upload: your photo #'.$lastKey.' is less than 4MP.');
		if(!$this->save())
			throw new CHttpException(404,'Photo upload: something went wrong while saving the product #'.$lastKey.$this->title);
		$ratio=$width/$height;
		if(!$ratio)
			throw new CHttpException(404,'Photo upload: division by zero in ratio of photo #'.$lastKey);
		if($ratio>1)
			$maxSize=$width;
		else
			$maxSize=$height;
		$modelPhotoPp=new PhotoPrePost;
		$modelPhotoPp->idProduct=$lastKey;
		$modelPhotoPp->ratio=$ratio;
		$modelPhotoPp->maxSize=$maxSize;
		
		$exif = @exif_read_data($file, 0, true);
		$results = $this->readGPSinfoEXIF($exif);
		$modelPhotoPp->lat=$results[0];
		$modelPhotoPp->lng=$results[1];
		$modelPhotoPp->exposureTime=$this->exif_get_exposureTime($exif);
		//$modelPhotoPp->aperture=$this->exif_get_fstop($exif);
		if(isset($exif['COMPUTED']['ApertureFNumber']))
			$modelPhotoPp->aperture=str_replace('f/', '', $exif['COMPUTED']['ApertureFNumber']);
		if(isset($exif['EXIF']['ISOSpeedRatings']))
			$modelPhotoPp->iso=intval($exif['EXIF']['ISOSpeedRatings']);
		//if(isset($exif['IFD0']['Make'])) // Result: Canon
			//$modelPhotoPp->=$exif['IFD0']['Make'];
		if(isset($exif['IFD0']['Model'])){
			if(strlen($exif['IFD0']['Model'])>5){
				$modelEquipment=Equipments::model()->findByPk($exif['IFD0']['Model']);
				if(!isset($modelEquipment)){
					$modelEquipment=new Equipments;
					$modelEquipment->description=$exif['IFD0']['Model'];
					$modelEquipment->equipmentType='camera';
					$modelEquipment->fromUser='1';
					if(!$modelEquipment->save())
						throw new CHttpException(404, "Photo upload: something went wrong while adding the equipment '".$exif['IFD0']['Model']."' of the photo #".$lastKey);
				}
				$modelOwnPhotoEquipment = new OwnPhotoEquipment;
				$modelOwnPhotoEquipment->idProduct = $lastKey;
				$modelOwnPhotoEquipment->description = $exif['IFD0']['Model'];
				$modelOwnPhotoEquipment->equipmentType='camera';
				if(!$modelOwnPhotoEquipment->save())
					throw new CHttpException(404, "Photo upload: something went wrong while adding the equipment '".$exif['IFD0']['Model']."' of the photo #".$lastKey);
				
			}
		}
		if(isset($exif['MAKERNOTE']['UndefinedTag:0x0095'])){
			if(strlen($exif['MAKERNOTE']['UndefinedTag:0x0095'])>5){
				$modelEquipment=Equipments::model()->findByPk($exif['MAKERNOTE']['UndefinedTag:0x0095']);
				if(!isset($modelEquipment)){
					$modelEquipment=new Equipments;
					$modelEquipment->description=$exif['MAKERNOTE']['UndefinedTag:0x0095'];
					$modelEquipment->equipmentType='lens';
					$modelEquipment->fromUser='1';
					if(!$modelEquipment->save())
						throw new CHttpException(404, "Photo upload: something went wrong while adding the equipment '".$exif['MAKERNOTE']['UndefinedTag:0x0095']."' of the photo #".$lastKey);
				}
				$modelOwnPhotoEquipment = new OwnPhotoEquipment;
				$modelOwnPhotoEquipment->idProduct = $lastKey;
				$modelOwnPhotoEquipment->description = $exif['MAKERNOTE']['UndefinedTag:0x0095'];
				$modelOwnPhotoEquipment->equipmentType='lens';
				if(!$modelOwnPhotoEquipment->save())
					throw new CHttpException(404, "Photo upload: something went wrong while adding the equipment '".$exif['MAKERNOTE']['UndefinedTag:0x0095']."' of the photo #".$lastKey);
			}
		}
		if(isset($exif['EXIF']['DateTimeOriginal'])){
			if($exif['EXIF']['DateTimeOriginal']!="" && $exif['EXIF']['DateTimeOriginal']!=0){
				$shootingDate=Yii::app()->dateFormatter->format('yyyy/MM/dd HH:mm:ss', $exif['EXIF']['DateTimeOriginal']);
				$modelPhotoPp->shootingDate=$shootingDate.".000";
			}
		}
		if(isset($exif['EXIF']['FocalLength'])){
			$modelPhotoPp->focalLength=$exif['EXIF']['FocalLength'];
		}
		if(!$modelPhotoPp->save())
			throw new CHttpException(404,'Photo upload: something went wrong while saving the photo #'.$lastKey);

		$tmb=Yii::app()->imagemod->load($file);
		if(!isset($tmb))
			throw new CHttpException(404,'Photo upload: something went wrong while loading the file #'.$lastKey);
				
		$this->saveThumb($tmb, 430);
		$this->saveThumb($tmb, 120);
		   	
		// START ADDING CIRCLE MARKER
		$source = imagecreatefromjpeg($file);
		$mask = imagecreatefrompng('./images/mask3_rid.png');
		// Apply mask to source
		$this->imagealphamask($source, $mask);
		$x=100;//200
		$y=100;//200
		$final_img = imagecreatefrompng('./images/marker_rid.png');
		imagecopy($final_img, $source, 4, 4, 0, 0, $x, $y); // 7, 7
		
		imagealphablending($final_img, false);
		imagesavealpha($final_img, true);
		// END ADDING CIRCLE MARKER	
		
		// Output
		if(Yii::app()->params['useBlob']){
			if(Yii::app()->params['useStorageEmulator'])
				$file = dirname(Yii::app()->request->scriptFile).'/temp/'.$lastKey.'.jpg';
			else
				$file = azure_getlocalresourcepath('localStoreOne').$lastKey.'.jpg';
		   	$content=imagepng($final_img, $file);
		}else
			$content=imagepng($final_img, './thumbcircle/'.$this->getFileName('circle').'.png');
		if(!$content)
			throw new CHttpException(404,'Photo upload: '.$tmb->error.' [#'.$this->idProduct.']');
		if(Yii::app()->params['useBlob']){
		   	$this->addToBlob($file, $this->getFileName('circle').'.png', 'thumbcircle');
			//unlink($file);
		}
		
		$shoppingPhotoType= new ShoppingPhotoType;
		$shoppingPhotoType->idProduct = $lastKey;
		if($this->idUser0->preferredLicenseType!=null){
			$shoppingPhotoType->licenseType = $this->idUser0->preferredLicenseType;
			$userDefault=true;
		}else{
			$shoppingPhotoType->licenseType = 'RF';
			$userDefault=false;
		}
		if(!$shoppingPhotoType->save())
			throw new CHttpException(404,'Photo upload: something went wrong while saving the shopping type of the photo #'.$lastKey);
			
		if($userDefault){
			$shoppingOptDefaultUser=$this->idUser0->shoppingOptUserDefaultRf;
			for($i=0; $i<count($shoppingOptDefaultUser); $i++){
				if($shoppingOptDefaultUser[$i]->idSize0->maxSize <= $modelPhotoPp->maxSize){
					$shoppingOptPhoto = new ShoppingOptPhoto;
					$shoppingOptPhoto->idProduct = $lastKey;
					$shoppingOptPhoto->idSize=$shoppingOptDefaultUser[$i]->idSize;
					$shoppingOptPhoto->idLicense=$shoppingOptDefaultUser[$i]->idLicense;
					$shoppingOptPhoto->price=$shoppingOptDefaultUser[$i]->price;
					if(!$shoppingOptPhoto->save())
						throw new CHttpException(404,'Photo upload: something went wrong while saving the default shopping option '.$i.' of the photo #'.$lastKey);
				}
			}
		}else{
			$criteria=new CDbCriteria;
			$criteria->select='idSize, idLicense, price';
			$criteria->with=array('idSize0'=>array('condition'=>'idSize0.maxSize<='.$modelPhotoPp->maxSize.' or idSize0.maxSize is null'));
			$shoppingOptDefaultGsp=ConfShoppingOptDefaultGsp::model()->findAll($criteria);
			for($i=0; $i<count($shoppingOptDefaultGsp); $i++){
				$shoppingOptPhoto = new ShoppingOptPhoto;
				$shoppingOptPhoto->idProduct = $lastKey;
				$shoppingOptPhoto->idSize=$shoppingOptDefaultGsp[$i]->idSize;
				$shoppingOptPhoto->idLicense=$shoppingOptDefaultGsp[$i]->idLicense;
				$shoppingOptPhoto->price=$shoppingOptDefaultGsp[$i]->price;
				if(!$shoppingOptPhoto->save())
					throw new CHttpException(404,'Photo upload: something went wrong while saving the shopping option '.$i.' of the photo #'.$lastKey);
			}
		
			// Se l'ultima shopping option inserita non è una RFe
			// perchè di dimensione inferiore a XXL, allora l'aggiungo io
			if($shoppingOptDefaultGsp[count($shoppingOptDefaultGsp)-1]->idLicense!=2){
				$shoppingOptPhoto = new ShoppingOptPhoto;
				$shoppingOptPhoto->idProduct = $lastKey;
				$shoppingOptPhoto->idSize=$shoppingOptDefaultGsp[count($shoppingOptDefaultGsp)-1]->idSize;
				$shoppingOptPhoto->idLicense=2;
				$shoppingOptPhoto->price=10;
				if(!$shoppingOptPhoto->save())
					throw new CHttpException(404,'Photo upload: something went wrong while saving the extended shopping option of the photo #'.$lastKey);
			}
		}
		
		if(isset($this->idUser0->shoppingOptUserDefaultRm)){
			$shoppingOptDefaultUser=$this->idUser0->shoppingOptUserDefaultRm;
			$cntShoppingOptDefaultUser=count($shoppingOptDefaultUser);
			if($cntShoppingOptDefaultUser>0){
				for($i=0; $i<count($shoppingOptDefaultUser); $i++){
					if($shoppingOptDefaultUser[$i]->idSize0->maxSize <= $modelPhotoPp->maxSize){
						$shoppingOptPhoto = new ShoppingOptPhotoRm;
						$shoppingOptPhoto->idProduct = $lastKey;
						$shoppingOptPhoto->idSize=$shoppingOptDefaultUser[$i]->idSize;
						$shoppingOptPhoto->idRMdetails=$shoppingOptDefaultUser[$i]->idRMdetails;
						$shoppingOptPhoto->idDuration=$shoppingOptDefaultUser[$i]->idDuration;
						$shoppingOptPhoto->price=$shoppingOptDefaultUser[$i]->price;
						if(!$shoppingOptPhoto->save())
							throw new CHttpException(404,'Photo upload: something went wrong while saving the default shopping option '.$i.' of the photo #'.$lastKey);
					}
				}
			}else{
				$criteria=new CDbCriteria;
				//$criteria->select='idSize, idRMdetails, idDuration, price';
				$criteria->with=array('idSize0'=>array('condition'=>'idSize0.maxSize<='.$modelPhotoPp->maxSize.' or idSize0.maxSize is null'));
				$shoppingOptDefaultGsp=ConfShoppingOptDefaultGspRm::model()->findAll($criteria);
				for($i=0; $i<count($shoppingOptDefaultGsp); $i++){
					if($shoppingOptDefaultGsp[$i]->idSize0->maxSize <= $modelPhotoPp->maxSize){
						$shoppingOptPhoto = new ShoppingOptPhotoRm;
						$shoppingOptPhoto->idProduct = $lastKey;
						$shoppingOptPhoto->idSize=$shoppingOptDefaultGsp[$i]->idSize;
						$shoppingOptPhoto->idRMdetails=$shoppingOptDefaultGsp[$i]->idRMdetails;
						$shoppingOptPhoto->idDuration=$shoppingOptDefaultGsp[$i]->idDuration;
						$shoppingOptPhoto->price=$shoppingOptDefaultGsp[$i]->price;
						if(!$shoppingOptPhoto->save())
							throw new CHttpException(404,'Photo upload: something went wrong while saving the default shopping option '.$i.' of the photo #'.$lastKey);
					}
				}
			}
		}
	
		// Delete temp files
		if(Yii::app()->params['useBlob']){
			$tmb->clean(); //Mi elimina il $file originale
			if(file_exists($file))
				unlink($file);
		}
	}

	/* IF exif_read_data does not work, change the order of the following lines in php.ini
		extension=php_mbstring.dll
		extension=php_exif.dll
	*/
	private function readGPSinfoEXIF($exif){
		if(!$exif || !isset($exif['GPS']['GPSLatitude'][0]) || !isset($exif['GPS']['GPSLongitude'][0]) || !isset($exif['GPS']['GPSLatitudeRef']) || !isset($exif['GPS']['GPSLongitudeRef'])) {
			return false;
		} else {
			//get the Hemisphere multiplier
		    $LatM = 1; $LongM = 1;
		    if($exif['GPS']["GPSLatitudeRef"] == 'S'){
		    	$LatM = -1;
		    }
		    if($exif['GPS']["GPSLongitudeRef"] == 'W'){
		    	$LongM = -1;
		    }
			
			$lat = $exif['GPS']['GPSLatitude'];
			list($num, $dec) = explode('/', $lat[0]);
			$lat_s = $this->division($num, $dec);
			list($num, $dec) = explode('/', $lat[1]);
			$lat_m = $this->division($num, $dec);
			list($num, $dec) = explode('/', $lat[2]);
			$lat_v = $this->division($num, $dec);
			
			$lon = $exif['GPS']['GPSLongitude'];
			list($num, $dec) = explode('/', $lon[0]);
			$lon_s = $this->division($num, $dec);
			list($num, $dec) = explode('/', $lon[1]);
			$lon_m = $this->division($num, $dec);
			list($num, $dec) = explode('/', $lon[2]);
			$lon_v = $this->division($num, $dec);
			$gps_int = array($LatM*($lat_s + $lat_m / 60.0 + $lat_v / 3600.0), $LongM*($lon_s + $lon_m / 60.0 + $lon_v / 3600.0));
			return $gps_int;
		}
	}
	
	private function division($num, $dec){
		if($dec!=0)
			return $num/$dec;
		else 
			return 0;
	}

	private function exif_get_float($value) { 
		$pos = strpos($value, '/'); 
		if ($pos === false)
			return (float) $value; 
		$a = (float) substr($value, 0, $pos); 
		$b = (float) substr($value, $pos+1); 
		return ($b == 0) ? ($a) : ($a / $b);
	}
	
	private function exif_get_exposureTime($exif) { 
		if (!isset($exif['EXIF']['ExposureTime']))
			return 'false';
		//return $exif['EXIF']['ExposureTime'];
		$shutter = $this->exif_get_float($exif['EXIF']['ExposureTime']);
		//$shutter = pow(2, -$apex); //Needed for ShutterSpeedValue
		if ($shutter == 0)
			return false; 
		if ($shutter >= 1)
			return round($shutter,1);
		return '1/' . round(1/$shutter);
	}
	
	/*private function exif_get_fstop($exif) { 
		if (!isset($exif['EXIF']['ApertureValue']))
			return false; 
		$apex  = $this->exif_get_float($exif['EXIF']['ApertureValue']); 
		$fstop = pow(2, $apex/2); 
		if ($fstop == 0)
			return false;
		//$fstop_round=round($fstop,1);
		if($fstop>1.3 && $fstop<1.5)
			return '1.4';
		else if($fstop>2.7 && $fstop<2.9)
			return '2.8';
		else if($fstop>5.5 && $fstop<5.7)
			return '5.6';
		else
			return $fstop;
	}*/
	
	public function getLinkViewPage(){
		return Yii::app()->createUrl('photo/view').'/'.$this->idProduct.'/'.$this->urlTitle;
	}
	

	/**
	 * Returns the static model of the specified AR class.
	 * @return ProductPrePost the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_product_pre_post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required', 'on'=>'submit'),
			//array('termsAccepted', 'required', 'on'=>'submit', 'message'=>'You must accept the Terms and Conditions.'),
			array('idUser, idProductStatus', 'length', 'max'=>10),
			array('description,title', 'length', 'max'=>128),
			array('update_timestamp', 'safe'),
			array('termsAccepted', 'boolean'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idProduct, idUser, idProductStatus, title, description, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			//'tblDictionaries' => array(self::MANY_MANY, 'Dictionary', 'tbl_keyword(idProduct, idKeyword)'),
			'keyword0' => array(self::HAS_MANY, 'Keyword', 'idProduct'),
			'masterAction0' => array(self::HAS_MANY, 'MasterAction', 'idProduct'),
			'photoPrePost' => array(self::HAS_ONE, 'PhotoPrePost', 'idProduct'),
			'product' => array(self::HAS_ONE, 'Product', 'idProduct'),
			'idProductStatus0' => array(self::BELONGS_TO, 'ConfProductStatus', 'idProductStatus'),
			'idUser0' => array(self::BELONGS_TO, 'User', 'idUser'),
			'shoppingCart' => array(self::HAS_MANY, 'ShoppingCart', 'idProduct'),
			'reviews' => array(self::HAS_MANY, 'Reviews', 'idProduct'),
			'shoppingPhotoType' => array(self::HAS_ONE, 'ShoppingPhotoType', 'idProduct'),
			'transactionPhotos' => array(self::HAS_MANY, 'TransactionPhoto', 'idProduct'),
			'ticket' => array(self::HAS_MANY, 'Ticket', 'idProduct'),
			'equipment' => array(self::HAS_MANY, 'OwnPhotoEquipment', 'idProduct'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idProduct' => 'Id Product',
			'idUser' => 'Id User',
			'idProductStatus' => 'Id Product Status',
			'title' => 'Title',
			'description' => 'Description',
			'insert_timestamp' => 'Insert Timestamp',
			'update_timestamp' => 'Update Timestamp',
			'keywordsCSV' => 'Keywords',
			'termsAccepted' => ''
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idProduct',$this->idProduct);
		$criteria->compare('idUser',$this->idUser);
		$criteria->compare('idProductStatus',$this->idProductStatus);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('insert_timestamp',$this->insert_timestamp,true);
		$criteria->compare('update_timestamp',$this->update_timestamp,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function behaviors(){
		return array(
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' =>  'insert_timestamp',
				'updateAttribute' =>  'update_timestamp',
				'setUpdateOnCreate' => true,
			),
		);
	}
	
	public function cleanShoppingOptPhoto(){
		if($this->shoppingPhotoType->licenseType=='RF'){
			if($this->deleteShoppingOptPhotoRm()!=0)
				throw new CHttpException(404, 'Something went wrong while cleaning the shopping options of the photo #'.$this->idProduct);
		}elseif($this->shoppingPhotoType->licenseType=='RM'){
			if($this->deleteShoppingOptPhotoRf()!=0)
				throw new CHttpException(404, 'Something went wrong while cleaning the shopping options of the photo #'.$this->idProduct);
		}else
			throw new CHttpException(404, 'Something went wrong while cleaning the shopping options of the photo #'.$this->idProduct);
	}
	
	public function deleteShoppingOptPhotoRf(){
		if($this->idProductStatus!=6 && $n=count($this->shoppingPhotoType->shoppingOptPhotos)){
			for($k=0; $k<$n; $k++){
				if($this->shoppingPhotoType->shoppingOptPhotos[$k]->delete()!=1)
					throw new CHttpException(404, 'Something went wrong while deleting the shopping option #'.$k);
			}
		}
	}
	
	public function deleteShoppingOptPhotoRm(){
		if($this->idProductStatus!=6 && $n=count($this->shoppingPhotoType->shoppingOptPhotosRm)){
			for($k=0; $k<$n; $k++){
				if($this->shoppingPhotoType->shoppingOptPhotosRm[$k]->delete()!=1)
					throw new CHttpException(404, 'Something went wrong while deleting the shopping option #'.$k);
			}
		}
	}
	
	public function remove(){
		$id=$this->idProduct;
		//Verifico la proprietà della foto
		if($this->idUser!=Yii::app()->user->id && !Yii::app()->user->isRoleAdmin($this->idUser) && !Yii::app()->user->isAdministrator())
			throw new CHttpException(404, 'Delete photo: This is not one of your photos. You cannot delete it.');
		//Cancello Photo
		if(isset($this->product->photo))
			if($this->product->photo->delete()!=1)
				throw new CHttpException(404, 'Delete photo: something went wrong while deleting the photo.');
		//Cancello Product
		if(isset($this->product))
			if($this->product->delete()!=1)
				throw new CHttpException(404, 'Delete photo: something went wrong while deleting the product.');
		//Verifico e cancello ShoppingOptPhoto
		//if($this->shoppingPhotoType->licenseType=='RF'){
			$this->deleteShoppingOptPhotoRf();
		//}else if($this->shoppingPhotoType->licenseType=='RM'){
			$this->deleteShoppingOptPhotoRm();
		//}else
			//throw new CHttpException(404, 'Delete photo: something went wrong while retriving the shopping option photo type.');
		//Cancello ShoppingPhotoType
		if($this->shoppingPhotoType->delete()!=1)
			throw new CHttpException(404, 'Delete photo: something went wrong while deleting the shopping option photo type.');
		//Verifico e cancello ShoppingCart in cart di altri utenti
		if($n=count($this->shoppingCart))
			for($k=0; $k<$n; $k++){
				if($this->shoppingCart[$k]->delete()!=1)
					throw new CHttpException(404, 'Delete photo: something went wrong while deleting the shopping cart #'.$k);
			}	
		//Verifico e cancello Keyword
		if($n=count($this->keyword0))
			for($k=0; $k<$n; $k++){
				if($this->keyword0[$k]->delete()!=1)
					throw new CHttpException(404, 'Delete photo: something went wrong while deleting the keyword '.$this->keyword0[$k]->keyword);
			}
		//Salvo il nuovo stato del prodotto
		$this->idProductStatus=6;
		if($this->save()!=1)
			throw new CHttpException(404, 'Delete photo: something went wrong while saving the new status of the product.');

	}

	public function removeForReportAbuse(){
		$id=$this->idProduct;
		//Verifico la proprietà della foto
		if($this->idUser!=Yii::app()->user->id && !Yii::app()->user->isRoleAdmin($this->idUser) && !Yii::app()->user->isAdministrator())
			throw new CHttpException(404, 'Delete photo: This is not one of your photos. You cannot delete it.');
		//Cancello Photo
		if(isset($this->product->photo))
			if($this->product->photo->delete()!=1)
				throw new CHttpException(404, 'Delete photo: something went wrong while deleting the photo.');
		//Cancello Product
		if(isset($this->product))
			if($this->product->delete()!=1)
				throw new CHttpException(404, 'Delete photo: something went wrong while deleting the product.'. print_r($this->product->getErrors()));
		
		if($n=count($this->shoppingCart))
			for($k=0; $k<$n; $k++){
				if($this->shoppingCart[$k]->delete()!=1)
					throw new CHttpException(404, 'Delete photo: something went wrong while deleting the shopping cart #'.$k);
			}	
		
		//Salvo il nuovo stato del prodotto
		$this->idProductStatus=7;  // Abuse Reported
		if($this->save()!=1)
			throw new CHttpException(404, 'Delete photo: something went wrong while saving the new status of the product.');

		return true;
	}

	public function hasReportAbusedOpen(){
			if($n=count($this->ticket))
			for($k=0; $k<$n; $k++){
				$ticket = $this->ticket[$k];
				if($ticket->idTicketType==1 && $ticket->idTicketStatus!=3){ 
					return true;
				}
			}	

		return false;
	}
}
