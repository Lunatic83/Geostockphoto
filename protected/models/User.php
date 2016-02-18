<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property string $idUser
 * @property string $idUserStatus
 * @property string $idUserProfile
 * @property string $username
 * @property string $password
 * @property string $challenge
 * @property string $email
 * @property string $name
 * @property string $surname
 * @property double $credits
 * @property double $submitBonus
 * @property string $photoProfile
 * @property double $lat
 * @property double $lng
 * @property string $town
 * @property string $country
 * @property string $mobilePhone
 * @property string $verificationCode
 * @property string $mailingList
 * @property string $acceptTerms
 * @property string $fbUserId
 * @property string $fbCode
 * @property string $fbAccessToken
 * @property string $insert_timestamp
 * @property string $update_timestamp
 * @property string $lastLogin_timestamp
 * @property string $nextBonusUpdate_timestamp
 * @property string $preferredLicenseType
 * @property string $birthdate;
 * @property string $voteWeight;
 * The followings are the available model relations:
 * @property Photographer $photographer
 * @property Product[] $products
 * @property ProductPrePost[] $productPrePosts
 * @property ReviewMotivations[] $reviewMotivations
 * @property ProductPrePost[] $tblProductPrePosts
 * @property Ticket[] $tickets
 * @property Transaction[] $transactions
 * @property ConfUserStatus $idUserStatus0
 * @property ConfUserProfile $idUserProfile0
 */
class User extends CActiveRecord{
	/**
	 * Virtual attribute for password
	 */
	public $clearpassword;
	public $clearpassword_repeat;
	public $email_repeat;
	public $imageProfile;
	public $oldclearpassword;
	public $verifyCodeCaptcha;
	public $acceptTermsPanoramio=0;
	public $acceptAddCategory=0;
	
	public function enableSales(){
		if(isset($this->userPilot))
			return true;
		else 
			return false;
	}
	
	public function verifySessionIdSecure(){
		if(!isset(Yii::app()->request->cookies['PHPSESSID_SECURE'])){
			return false;
		}
		return $this->verifySessionIdSecureByValue(Yii::app()->request->cookies['PHPSESSID_SECURE']->value, 0);
	}
	
	public function verifySessionIdSecureByValue($SECURE_SESSION_ID, $reset=1){
		if($SECURE_SESSION_ID!=$this->sessionIdSecure){
			return false;
		}else{
			if($reset){
				$this->sessionIdSecure=NULL;
				if(!$this->save())
					return false;
				else 
					return true;
			}
			return true;
		}
	}
	
	public function getGpsAccuracy(){
		$criteria=new CDbCriteria;
		$criteria->condition="t.idUser=".$this->idUser;
		$criteria->with['reviews']['with']['reviewMotivations']['condition']="idMotivation=7";
		$cntWrongPosition = ProductPrePost::model()->count($criteria);
		if($this->nPhotosSubmitted!=0)
			return round((1-($cntWrongPosition/$this->nPhotosSubmitted))*100, 0);
		else
			return "---";
	}
	
	public function getRealFee(){
		// Prendo la fee personale dell'utente oppure quella di default per il tipo di utente
		if(isset($this->fee))
			$userFee = $this->fee;
		else
			$userFee=$this->idUserProfile0->fee;
			
		// Verifico se l'utente dovrebbe avere una fee più alta per le sue promozioni attive
		$idPromotion=null;
		if(isset($this->ownUserPromotions)){
			for($i=0; $i<count($this->ownUserPromotions); $i++){
				if(isset($this->ownUserPromotions[$i]->promotion)){
					$actualTime = Yii::app()->dateFormatter->format('yyyy-MM-dd hh:mm:ss', time());
					if($this->ownUserPromotions[$i]->start_timestamp<$actualTime
							&& $this->ownUserPromotions[$i]->end_timestamp>$actualTime){
						//throw new CHttpException(404, $this->ownUserPromotions[$i]->end_timestamp." ".$actualTime);
						$promFee=$this->ownUserPromotions[$i]->promotion->feePromotion;
						if($promFee>$userFee){
							$userFee=$promFee;
							$idPromotion=$this->ownUserPromotions[$i]->idPromotion;
						}
					}
				}
			}
		}
		
		return array('userFee'=>$userFee, 'idPromotion'=>$idPromotion);
	}
	
	public function getCredits(){
		return $this->creditsBought+$this->creditsEarned;
	}
	
	public function getVoteWeight(){
		if($this->vote_weight!=null)
			return $this->vote_weight;
		else
			return $this->idUserProfile0->weight_review;
	}
	
	public function pay($credits){
		if($this->credits>=$credits){
			if($this->creditsEarned>=$credits){
				$this->creditsEarned -= $credits;
				return true;
			}else{
				$credits -= $this->creditsEarned;
				$this->creditsEarned=0;
				$this->creditsBought -= $credits;
				return true;
			}
		}
		return false;
	}
	
	public function putMoneyFromGroup($amount){
		$this->creditsEarned+=$amount;
		if(!$this->save())
			throw new CHttpException(404,'Buy photos: something went wrong while saving the credits to your group.');
	}
	
	// Cerca il primo gruppo di cui fa parte l'utente e
	// richiama la funzione per effettuare il pagamento all'amministratore
	public function payToGroup($amount){
		if(isset($this->userGroups)){
			for($i=0; $i<count($this->userGroups); $i++){
				if($this->userGroups[$i]->flagGroupCommission){
					$this->userGroups[$i]->group->idUserAdmin0->putMoneyFromGroup($amount*0.1);
					return array('idGroup'=>$this->userGroups[$i]->group->idGroup, 'earnedByGroup'=>$amount*0.1);
				}
			}
		}
		return null;
	}

	private function createUserBlobClient(){
		$blobStorageClient = new Microsoft_WindowsAzure_Storage_Blob(
			'blob.core.windows.net',
			STORAGE_ACCOUNT_NAME,
			STORAGE_ACCOUNT_KEY
		);
		return $blobStorageClient;
	}

	public function readBlobUrl($container, $filename){
		$blobStorageClient=$this->createUserBlobClient();
		$blob=$blobStorageClient->getBlobInstance($container, $filename);
		return $blob->url;
	}
	
	public function getUrlTopPhotosUser($offset=0, $orderBy="best"){
		$url = Yii::app()->createUrl('photo/topten/apiKey/w365zru2').'/user/'.$this->username.'/offset/'.$offset.'/orderBy/'.$orderBy.'/showPage/1';
		return "ajaxFuncGenFade('".$url."', 'photo-line')";
	}

	public function getPhotoUrl($size="full"){
		$path = $this->getPath($size);
		if($size=='circle')
			$extension='.png';
		else
			$extension='.jpg';

		if($this->photoProfile==1){
	    	if(Yii::app()->params['useBlob'])
	    		return $this->readBlobUrl($path, $this->idUser.$extension);
	    	else
	    		return Yii::app()->baseUrl."/images/".$path."/".$this->idUser.$extension;
		}else{
			if($size=="full")
				return Yii::app()->baseUrl."/images/photo_profile".$extension;
			elseif($size=="circle")
				return Yii::app()->baseUrl."/images/photo_profile_circle".$extension;
			elseif($size==120)
				return Yii::app()->baseUrl."/images/photo_profile_120".$extension;
		}
	}
	
	public function getNPhotos(){
		return count($this->products);
	}
	
	public function getNPhotosSubmitted(){
		$criteria=new CDbCriteria;
		$criteria->condition="idUser=".$this->idUser." and (idProductStatus=3 or idProductStatus=4)";
		return ProductPrePost::model()->count($criteria);
	}
	
	public function getRate(){
		$nPhotos=$this->nPhotos;
		if($nPhotos==0)
			return 0;
		
		for($i=1; $i<=5; $i++){
			$criteria=new CDbCriteria;
			$criteria->condition="idUser=".$this->idUser;
			$criteria->with['photo']['condition']="rate=".$i;
			$rate[$i] = Product::model()->count($criteria);
		}
		
		return ceil(($rate[1]+$rate[2]*2+$rate[3]*3+$rate[4]*4+$rate[5]*5)/$nPhotos);
	}
	
	public function getCategories(){
		$nPhotos=$this->nPhotos;
		if($nPhotos==0)
			return 0;
			
		$criteria=new CDbCriteria;
		$criteria->condition='idPhotoType=1';
		$categories=ConfCategory::model()->findAll($criteria);
		
		for($i=0; $i<count($categories); $i++){
			$criteria=new CDbCriteria;
			$criteria->condition="idUser=".$this->idUser;
			$criteria->with['photo']['condition']="idCategory1=".$categories[$i]->idCategory;
			$totCategories[$categories[$i]->name] = Product::model()->count($criteria);
		}
		arsort($totCategories);
		
		return array_keys($totCategories);
	}
	
	public function getEquipments(){
		$nPhotos=$this->nPhotos;
		if($nPhotos==0)
			return 0;
		
		$criteria=new CDbCriteria;
		$criteria->select="t.description";
		$criteria->group="t.description, t.idProduct";
		$criteria->having="idProduct in (SELECT idProduct FROM tbl_product where idUser=".$this->idUser.")";
		$criteria->distinct=true;
		$dataOwnPhotoEquipment = OwnPhotoEquipment::model()->findAll($criteria);
		return $dataOwnPhotoEquipment;
	}
	
	public function readBlobPath($container, $filename){
		$blobStorageClient=$this->createUserBlobClient();
		if(Yii::app()->params['useStorageEmulator'])
			$file = dirname(Yii::app()->request->scriptFile).'/temp/'.$filename;
		else
			$file = azure_getlocalresourcepath('localStoreOne').$filename;
		$blobStorageClient->getBlob($container, $filename, $file);
		return $file;
	}
	
	private function saveUserCircleThumb($file, $idUser=null){
		if($idUser==null) {
			$idUser=Yii::app()->user->id;
		}
		//echo "Start Thumb creation for idUser=".$idUser."<br>";

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
		
		// Output
		if(Yii::app()->params['useBlob']){
			if(Yii::app()->params['useStorageEmulator'])
				$dirname = dirname(Yii::app()->request->scriptFile).'/temp/'.$idUser.'.jpg';
			else
				$dirname = azure_getlocalresourcepath('localStoreOne')."user_".$idUser.'.jpg';
		   	$content=imagepng($final_img, $dirname);
		}else
			$content=imagepng($final_img, './images/usersthumbcircle/'.$idUser.'.png');
		if(!$content)
			throw new CHttpException(404,'User image upload: '.$tmb->error.' [#'.$idUser.']');
		if(Yii::app()->params['useBlob'] && !Yii::app()->params['useStorageEmulator']){
			$blobStorageClient=$this->createUserBlobClient();
		   	$blobStorageClient->putBlob(
	        	'usersthumbcircle',
	        	$idUser.'.png',
	        	$dirname
			);
		}
	}

	public function saveUploadedPhoto($file){
		list($width, $height) = getimagesize($file, $info);
		if($width<300 || $height<300)
			throw new CHttpException(404,'Save user: your photo is less than 300x300 pixel.');
			
		$tmb=Yii::app()->imagemod->load($file);
		if(!isset($tmb))
			throw new CHttpException(404,'Save user: something went wrong while loading the user photo profile.');
		$this->saveThumb($tmb, 300);
		$this->saveThumb($tmb, 120);
		$this->saveUserCircleThumb($file);
		$tmb->clean();
	}
	
	private function getPath($size){
		if($size=="full" || $size==300)
			return "users";
		elseif($size==120)
			return "users120";
		elseif($size=="circle")
			return "usersthumbcircle";
		else 
			throw new CHttpException(404, 'Get Path Photo User of size='.$size);
	}

	public function saveThumb($tmb, $size, $idUser=null){
		if($idUser==null) {
			$idUser=Yii::app()->user->id;
		}
		
		$tmb->image_ratio = true;
		$tmb->image_resize = true;
		$tmb->image_x = $size;
		$tmb->image_y = $size;
		$tmb->file_overwrite = true;
		$tmb->file_new_name_body = $idUser;
		$tmb->file_new_name_ext = 'jpg';
		
		if(Yii::app()->params['useBlob'] && !Yii::app()->params['useStorageEmulator']){
		   	$content=$tmb->process();
		}else{
		   	$tmb->process('./images/'.$this->getPath($size));
		}
		if(!$tmb->processed)
			throw new CHttpException(404, 'Save user: '.$tmb->error);
		if(Yii::app()->params['useBlob'] && !Yii::app()->params['useStorageEmulator']){
			$blobStorageClient=$this->createUserBlobClient();
		   	$blobStorageClient->putBlobData(
	        	$this->getPath($size),
	        	$idUser.'.jpg',
	        	$content
			);
			//$tmb->clean();
		}
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
	
	public function verifyApiKey($apiKey, $verifyPartner=0){
		if($this->apiKey->apiKey==$apiKey && $this->apiKey->isPartner==$verifyPartner){
			$this->apiKey->cntRequests++;
			if($this->apiKey->save())
				return 1;
		}
		return 0;
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
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
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, clearpassword, clearpassword_repeat, email, email_repeat, acceptTerms', 'required', 'on'=>'create'),
			array('verifyCodeCaptcha', 'captcha', 'on'=>'create'),
			//array('username', 'match', 'not'=>true, 'pattern'=>'/[\s]/', 'message'=>'Username must be alfanumeric.'),
			array('username', 'match', 'pattern'=>'/^([a-zA-Z0-9.-]{3,32})$/', 'message'=>'Username must be alfanumeric with a min legth of 3 chars'),
			array('username, acceptTerms', 'required', 'on'=>'fbCreate'),
			array('clearpassword_repeat', 'compare', 'compareAttribute'=>'clearpassword', 'on'=>'create'),
			array('email_repeat', 'compare', 'compareAttribute'=>'email', 'on'=>'create'),
			array('acceptTerms', 'boolean', 'falseValue'=>'true', 'message'=>'You must accept the Terms and Conditions'),
			array('acceptTermsPanoramio', 'boolean', 'falseValue'=>'true', 'message'=>'You must accept this condition'),
			//array('acceptTerms', 'boolean', 'falseValue'=>'true', 'on'=>'fbCreate', 'message'=>'You must accept the Terms and Conditions'),
			array('username, email', 'unique', 'on'=>'create'),
			array('clearpassword, acceptTerms', 'required','on'=>'insert'),
			array('submitBonus, creditsBought, creditsEarned, fee, lat, lng', 'numerical'),
			array('idUserStatus, idUserProfile, verificationCode', 'length', 'max'=>10),
			array('username, name, surname, mobilePhone', 'length', 'max'=>32),
			array('password, challenge, clearpassword, clearpassword_repeat', 'length', 'max'=>512),
			array('email, email_repeat', 'length', 'max'=>255),
			array('email, email_repeat', 'email'),
			array('photoProfile, acceptTerms, mailingList', 'length', 'max'=>1),
			array('town, country', 'length', 'max'=>30),
			array('update_timestamp, lastLogin_timestamp, nextBonusUpdate_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idUser, idUserStatus, idUserProfile, username, password, email, name, surname, credits, photoProfile, lat, lng, town, country,mobilePhone, verificationCode, mailingList, insert_timestamp, update_timestamp, lastLogin_timestamp, nextBonusUpdate_timestamp,preferredLicenseType, birthdate, voteWeight', 'safe', 'on'=>'search'),
			array('username', 'unique', 'on'=>'fbCreate', 'message'=>'You cannot register this username'),
			array('email', 'unique', 'on'=>'fbCreate', 'message'=>'You cannot register this email'),

			array('email', 'unique', 'on'=>'modify'),
			array('email_repeat', 'compare', 'compareAttribute'=>'email', 'on'=>'modify'),
			array('clearpassword_repeat', 'compare', 'compareAttribute'=>'clearpassword', 'on'=>'modify'),
			array('oldclearpassword', 'verifyCurrentPassword', 'on'=>'modify'),
			
			array('email', 'unique', 'on'=>'modifyChangeEmail'),
			array('email_repeat', 'compare', 'compareAttribute'=>'email', 'on'=>'modifyChangeEmail'),
			array('clearpassword_repeat', 'compare', 'compareAttribute'=>'clearpassword', 'on'=>'modifyChangePassword'),
			array('oldclearpassword', 'verifyCurrentPassword', 'on'=>'modifyChangePassword'),
			array('mobilePhone', 'match', 'pattern'=>'/^([+]?[0-9 ]+)$/'),
			//array('birthdate', 'date', 'format'=>'dd/MM/yyyy'),
			
			//
			array('email', 'exist', 'attributeName'=>'email', 'className'=>'User', 'on'=>'resetpwask', 'message'=>'This email is not stored in GSP'),
			array('email', 'exist', 'attributeName'=>'email', 'className'=>'User', 'on'=>'resendVerification', 'message'=>'This email is not stored in GSP'),
			array('email', 'required', 'on'=>'resendVerification'),
			array('verifyCodeCaptcha', 'captcha', 'on'=>'resendVerification'),
			array('clearpassword_repeat', 'compare', 'compareAttribute'=>'clearpassword', 'on'=>'resetpwdo'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations(){
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'photographer' => array(self::HAS_ONE, 'Photographer', 'idUser'),
			'products' => array(self::HAS_MANY, 'Product', 'idUser'),
			'productPrePosts' => array(self::HAS_MANY, 'ProductPrePost', 'idUser'),
			'reviewMotivations' => array(self::HAS_MANY, 'ReviewMotivations', 'idUser'),
			'tblProductPrePosts' => array(self::MANY_MANY, 'ProductPrePost', 'tbl_shopping_cart(idUser, idProduct)'),
			'tickets' => array(self::HAS_MANY, 'Ticket', 'idUser'),
			'transactions' => array(self::HAS_MANY, 'Transaction', 'idUser'),
			'idUserStatus0' => array(self::BELONGS_TO, 'ConfUserStatus', 'idUserStatus'),
			'idUserProfile0' => array(self::BELONGS_TO, 'ConfUserProfile', 'idUserProfile'),
			'shoppingCart' => array(self::HAS_MANY, 'ShoppingCart', 'idUser'),
			'sessions' => array(self::HAS_MANY, 'Session', 'idUser'),
			'shoppingOptUserDefaultRf' => array(self::HAS_MANY, 'ShoppingOptUserDefaultRf', 'idUser'),
			'shoppingOptUserDefaultRm' => array(self::HAS_MANY, 'ShoppingOptUserDefaultRm', 'idUser'),
			'ownSwitchUserMaster' => array(self::HAS_MANY, 'OwnSwitchUser', 'idUserMaster'),
			'ownSwitchUserSlave' => array(self::HAS_MANY, 'OwnSwitchUser', 'idUserSlave'),
			'ownUserPromotions' => array(self::HAS_MANY, 'OwnUserPromotions', 'idUser'),
			//'masterAction0' => array(self::HAS_MANY, 'MasterAction', 'idUserMaster'),
			'tblProductPrePosts' => array(self::MANY_MANY, 'ProductPrePost', 'tbl_master_action(idUserMaster, idProduct)'),
			'apiKey' => array(self::HAS_ONE, 'ApiKey', 'idUser'),
			'reviewer' => array(self::HAS_ONE, 'ConfGroups', 'idUser'),
			'youDoNothing' => array(self::HAS_ONE, 'YouDoNothing', 'idUser'),
			'userPilot' => array(self::HAS_ONE, 'UserPilot', 'idUser'),
			'userGroups' => array(self::MANY_MANY, 'UserGroups', 'tbl_user_groups(idUser, idGroup)'),
			'ownCoupon' => array(self::HAS_ONE, 'OwnCoupon', 'idUser'),
			'ownUserContacts' => array(self::HAS_MANY, 'ownUserContacts', 'idUser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUser' => 'Id User',
			'idUserStatus' => 'Id User Status',
			'idUserProfile' => 'Id User Profile',
			'username' => 'Username',
			'clearpassword' => 'Password',
			'clearpassword_repeat' => 'Confirm Password',
			'password' => 'Password',
			'challenge' => 'Challenge',
			'email' => 'Email',
			'email_repeat' => 'Confirm Email',
			'name' => 'First Name',
			'surname' => 'Second Name',
			'credits' => 'Credits',
			'submitBonus' => 'Submit Bonus',
			'photoProfile' => 'Photo Profile',
			'lat' => 'Lat',
			'lng' => 'Lng',			
			'town' => 'Town',
			'country' => 'Country',
			'mobilePhone' => 'Mobile Phone',
			'verificationCode' => 'Verification Code',
			'mailingList' => 'Mailing List',
			'acceptTerms' => 'Accept Terms',
			'fbUserId' => 'Fb User Id',
			'fbCode' => 'Fb Code',
			'fbAccessToken' => 'Fb Access Token',
			'insert_timestamp' => 'Insert Timestamp',
			'update_timestamp' => 'Update Timestamp',
			'lastLogin_timestamp' => 'Last Login Timestamp',
			'nextBonusUpdate_timestamp' => 'Next Bonus Update',
			'preferredLicenseType' => 'License Type',
			'birthdate' => 'Birthdate',
			'voteWeight' => 'Vote Weight',
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

		$criteria->compare('idUser',$this->idUser);
		$criteria->compare('idUserStatus',$this->idUserStatus);
		$criteria->compare('idUserProfile',$this->idUserProfile);
		$criteria->compare('idUserPanoramio',$this->idUserPanoramio);
		$criteria->compare('username',$this->username);
		$criteria->compare('password',$this->password);
		$criteria->compare('challenge',$this->challenge);
		$criteria->compare('email',$this->email);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('credits',$this->credits);
		$criteria->compare('submitBonus',$this->submitBonus);
		$criteria->compare('photoProfile',$this->photoProfile);
		$criteria->compare('lat',$this->lat);
		$criteria->compare('lng',$this->lng);		
		$criteria->compare('town',$this->town,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('mobilePhone',$this->mobilePhone,true);
		$criteria->compare('verificationCode',$this->verificationCode);
		$criteria->compare('mailingList',$this->mailingList);
		$criteria->compare('acceptTerms',$this->acceptTerms);
		$criteria->compare('fbUserId',$this->fbUserId);
		$criteria->compare('fbCode',$this->fbCode);
		$criteria->compare('fbAccessToken',$this->fbAccessToken);
		$criteria->compare('insert_timestamp',$this->insert_timestamp,true);
		$criteria->compare('update_timestamp',$this->update_timestamp,true);
		$criteria->compare('lastLogin_timestamp',$this->lastLogin_timestamp,true);
		$criteria->compare('nextBonusUpdate_timestamp',$this->nextBonusUpdate_timestamp,true);
		$criteria->compare('preferredLicenseType',$this->preferredLicenseType,true);
		$criteria->compare('birthdate',$this->birthdate,true);
		$criteria->compare('voteWeight',$this->voteWeight,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	public function cleanShoppingOptUserDefault(){
		if($n=count($this->shoppingOptUserDefaultRf)){
			if($this->deleteShoppingOptUserDefaultRf()!=0)
				throw new CHttpException(404, 'Something went wrong while cleaning the shopping options rf of the user #'.$this->idProduct);
		}elseif($n=count($this->shoppingOptUserDefaultRm)){
			if($this->deleteShoppingOptUserDefaultRm()!=0)
				throw new CHttpException(404, 'Something went wrong while cleaning the shopping options rm of the user #'.$this->idProduct);
		}else
			throw new CHttpException(404, 'Something went wrong while cleaning the shopping options of the user #'.$this->idProduct);
	}
	
	public function deleteShoppingOptUserDefaultRf(){
		if($n=count($this->shoppingOptUserDefaultRf)){
			for($k=0; $k<$n; $k++){
				if($this->shoppingOptUserDefaultRf[$k]->delete()!=1)
					throw new CHttpException(404, 'Something went wrong while deleting the shopping option user #'.$k);
			}
		}
	}
	
	public function deleteShoppingOptUserDefaultRm(){
		if($n=count($this->shoppingOptUserDefaultRm)){
			for($k=0; $k<$n; $k++){
				if($this->shoppingOptUserDefaultRm[$k]->delete()!=1)
					throw new CHttpException(404, 'Something went wrong while deleting the shopping option user #'.$k);
			}
		}
	}


	public function convertCredits($creditsToConvert){
		if($this->creditsEarned-$creditsToConvert>=0){
			$this->creditsEarned -= $creditsToConvert;
			return true;
		}else 
			return fals;
	}
	/**
	 * @return boolean validate user
	 */
	public function validatePassword($password_form){
		return hash('sha512', $this->challenge.$this->password) === $password_form;		
	}
	
	/**
	 * @return boolean validate user for modify
	 */
	public function validatePasswordModify($password_form){
		return $this->hashPassword($password_form, $this->username) === $this->password;
	}

	public function hashPassword($phrase, $salt){
	    return hash('sha512', $phrase.$salt);
	}
	
	public function beforeSave() {
		if (!empty($this->clearpassword))
	    	$this->password = $this->hashPassword($this->clearpassword, $this->username);
	    return true;
 	}
	
	/**
	 * check if the user password inserted is the actual password
	 * This is the 'verifyCurrentPassword' validator as declared in rules().
	 */
	public function verifyCurrentPassword($attribute,$params)
	{ 
		if(($_POST['User'][$attribute]!="") && !$this->validatePasswordModify($_POST['User'][$attribute], $this->username))
			$this->addError($attribute, 'This is not your current password!');
	}
	
	/**
	 * Stampa il link che ridirige alla pagina dell'utente.
	 */
	public function printLink(){ 
		$util = new Util();
		return CHtml::link($util->shortlabel($this->username,15), Yii::app()->createUrl('user/view/'.$this->username));
	}
	
	/**
	 * Stampa il numero di SB.
	 */
	public function printSB(){ 
		if($this->submitBonus>=0){
			return $this->submitBonus;
		}else{
			return "<span style='font-size:150%'>&#8734</span>";
		}
	}
	
	public function remove(){
		$id=$this->idUser;
		
		//Verifico la proprietà  dell'utente
		if($this->idUser!=Yii::app()->user->id)
			throw new CHttpException(404, 'Delete user: This is not your profile. You cannot delete it.');

		//Cancello i Prodotti
		$n=count($this->productPrePosts);
		if($n!=0){
			for($k=0; $k<$n; $k++){
				if($this->productPrePosts[$k]->idProductStatus!=6)
					if($this->productPrePosts[$k]->remove()!=0)
						throw new CHttpException(404, 'Delete user: something went wrong while deleting the productPrePosts #'.$k);
			}			
		}

		//Cancello photographer
		if(isset($this->photographer))
			if($this->photographer->delete()!=1)
				throw new CHttpException(404, 'Delete user: something went wrong while deleting the photographer.');
		
		//Cancello le shoppingOptRf					
		if(($n=count($this->shoppingOptUserDefaultRf))!=0){
			for($k=0; $k<$n; $k++){
				if($this->shoppingOptUserDefaultRf[$k]->delete()!=1)
					throw new CHttpException(404, 'Delete user: something went wrong while deleting the ShoppingOptUserDefaultRf #'.$k);
			}			
		}
		
		//Cancello le shoppingOptRm					
		if(($n=count($this->shoppingOptUserDefaultRm))!=0){
			for($k=0; $k<$n; $k++){
				if($this->shoppingOptUserDefaultRm[$k]->delete()!=1)
					throw new CHttpException(404, 'Delete user: something went wrong while deleting the ShoppingOptUserDefaultRm #'.$k);
			}			
		}
					
		//Cancello le ownSwitchUserMaster					
		if(($n=count($this->ownSwitchUserMaster))!=0){
			for($k=0; $k<$n; $k++){
				if($this->ownSwitchUserMaster[$k]->delete()!=1)
					throw new CHttpException(404, 'Delete user: something went wrong while deleting the ownSwitchUserMaster #'.$k);
			}			
		}

		//Cancello le ownSwitchUserSlave					
		if(($n=count($this->ownSwitchUserSlave))!=0){
			for($k=0; $k<$n; $k++){
				if($this->ownSwitchUserSlave[$k]->delete()!=1)
					throw new CHttpException(404, 'Delete user: something went wrong while deleting the ownSwitchUserSlave #'.$k);
			}			
		}


		//Cancello le ownUserPromotions					
		if(($n=count($this->ownUserPromotions))!=0){
			for($k=0; $k<$n; $k++){
				if($this->ownUserPromotions[$k]->delete()!=1)
					throw new CHttpException(404, 'Delete user: something went wrong while deleting the ownUserPromotions #'.$k);
			}			
		}

		//Cancello apiKey
		if(isset($this->apiKey))
			if($this->apiKey->delete()!=1)
				throw new CHttpException(404, 'Delete user: something went wrong while deleting the apiKey.');
		
		//Cancello youDoNothing
		if(isset($this->youDoNothing))
			if($this->youDoNothing->delete()!=1)
				throw new CHttpException(404, 'Delete user: something went wrong while deleting the youDoNothing.');
		

		//Cancello le userGroups					
		if(($n=count($this->userGroups))!=0){
			for($k=0; $k<$n; $k++){
				if($this->userGroups[$k]->delete()!=1)
					throw new CHttpException(404, 'Delete user: something went wrong while deleting the userGroups #'.$k);
			}			
		}

			/*
			--'photographer' => array(self::HAS_ONE, 'Photographer', 'idUser'),
			--'products' => array(self::HAS_MANY, 'Product', 'idUser'),
			--'productPrePosts' => array(self::HAS_MANY, 'ProductPrePost', 'idUser'),
			--NON LE CANCELLO 'reviewMotivations' => array(self::HAS_MANY, 'ReviewMotivations', 'idUser'),
			'tblProductPrePosts' => array(self::MANY_MANY, 'ProductPrePost', 'tbl_shopping_cart(idUser, idProduct)'),
			'tickets' => array(self::HAS_MANY, 'Ticket', 'idUser'),
			'transactions' => array(self::HAS_MANY, 'Transaction', 'idUser'),
			--'shoppingOptUserDefaultRf' => array(self::HAS_MANY, 'ShoppingOptUserDefaultRf', 'idUser'),
			--'shoppingOptUserDefaultRm' => array(self::HAS_MANY, 'ShoppingOptUserDefaultRm', 'idUser'),
			--'ownSwitchUserMaster' => array(self::HAS_MANY, 'OwnSwitchUser', 'idUser'),
			--'ownSwitchUserSlave' => array(self::HAS_MANY, 'OwnSwitchUser', 'idUser'),
			--'ownUserPromotions' => array(self::HAS_MANY, 'OwnUserPromotions', 'idUser'),
			//'masterAction0' => array(self::HAS_MANY, 'MasterAction', 'idUserMaster'),
			--'tblProductPrePosts' => array(self::MANY_MANY, 'ProductPrePost', 'tbl_master_action(idUserMaster, idProduct)'),
			--'apiKey' => array(self::HAS_ONE, 'ApiKey', 'idUser'),
			'reviewer' => array(self::HAS_ONE, 'ConfGroups', 'idUser'),
			--'youDoNothing' => array(self::HAS_ONE, 'YouDoNothing', 'idUser'),
			--'userGroups' => array(self::MANY_MANY, 'UserGroups', 'tbl_user_groups(idUser, idGroup)'),
			*/

 
		/* TODO Nuova lista elementi interessati da tbl_user da eliminare
		 * idUser DIRETTAMENTE	
		 * ProductPrePost		LO FA IL MODEL DI MARCO
		 * Product				LO FA IL MODEL DI MARCO
		 * Reviews				DA NON ELIMINARE
		 * ReviewMotivation 	DA NON ELIMINARE
		 * Photographer
		 * ShoppingCart			LO FA IL MODEL DI MARCO
		 * Transaction			DA NON ELIMINARE
		 * Session				DA NON ELIMINARE
		 * Ticket				DA NON ELIMINARE
		 * GspProfit			DA NON ELIMINARE
		 * 
		 * Tramire idProduct INDIRETTAMENTE
		 * richiamare cancel di marco
		 * 
		 * */
		
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
}
