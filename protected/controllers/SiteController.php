<?php

class SiteController extends Controller
{
	public $pageName="";
	public $user='';
	public $idPhotoType=1;
	public $layout='//layouts/operative';
	public $onloadFunctions;
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
		 		 'testLimit'=>0,
		 		 'transparent'=>true,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	
		/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules(){
		return array(
			array('allow',  // allow all users to perform
				'actions'=>array('ajaxLoginChallenge', 'fbLogin', 'redirectToLogin', 'verification', 'error',
					'index', 'index2', 'index3', 'index4', 'page', 'howitworks', 'start', 'youdonothing', 'sentYoudonothing', 'howitworkspartial',
					'startCustomer', 'startPhotographer', 'testApiMap', 'api', 'sentApiRequest', 'getLoginChallenge', 'loginAPI', 'about'
				), 
				'users'=>array('*'),
			),
			array('allow',  // allow authenticated users to perform 
				'actions'=>array('logout'), 
				'users'=>array('@'),
			),
			array('allow',  // allow admin users to perform 
				'actions'=>array('deleteTicket', 'report'), 
				'expression'=>'$user->isAdministrator()',
				//'users'=>array('*'),
			),
			array('allow',  // allow guests to perform 
				'actions'=>array('login', 'captcha', 'loginNew'), 
				'users'=>array('guest'),
			),
			
			array('deny',  // deny all users
				//'actions'=>array('landing'), 
				'users'=>array('*'),
			),
		);
	}
	
	public function actionReport(){
		$nPhotosApproved=Product::model()->count();
		$nPhotosUploaded=ProductPrePost::model()->count();
		$criteria=new CDbCriteria;
		$criteria->condition='idProductStatus=1';
		$nPhotosPending=ProductPrePost::model()->count($criteria);
		$criteria->condition='idProductStatus=2';
		$nPhotosWaitReview=ProductPrePost::model()->count($criteria);
		$criteria->condition='idProductStatus=4';
		$nPhotosRejected=ProductPrePost::model()->count($criteria);
		$criteria->condition='idProductStatus=6';
		$nPhotosDeleted=ProductPrePost::model()->count($criteria);
		
		$nUsers=User::model()->count();
		$criteria->condition='idUserProfile=3';
		$modelNewbie=User::model()->findAll($criteria);
		$nNewbie=count($modelNewbie);
		$nPhotosNewbie=0;
		for($i=0; $i<$nNewbie; $i++){
			$nPhotosNewbie+=$modelNewbie[$i]->nPhotos;
		}
		$criteria->condition='idUserProfile=4';
		$modelPros=User::model()->findAll($criteria);
		$nPros=count($modelPros);
		$nPhotosPros=0;
		for($i=0; $i<$nPros; $i++){
			$nPhotosPros+=$modelPros[$i]->nPhotos;
		}
		$criteria->condition='idUserProfile=5';
		$modelPower=User::model()->findAll($criteria);
		$nPower=count($modelPower);
		$nPhotosPower=0;
		for($i=0; $i<$nPower; $i++){
			$nPhotosPower+=$modelPower[$i]->nPhotos;
		}
		$criteria=new CDbCriteria;
		$criteria->select="idUser";
		$criteria->distinct=true;
		$modelPhotographers=Product::model()->findAll($criteria);
		$nPhotographers=count($modelPhotographers);
		$nTopPhotographers=0;
		$nTopUsersPhotosCnt=0;
		for($i=0; $i<$nPhotographers; $i++){
			$modelUser=User::model()->findByPk($modelPhotographers[$i]->idUser);
			if($modelUser->nPhotos>=100){
				$nTopPhotographers++;
				$nTopUsersPhotosCnt+=$modelUser->nPhotos;
				//echo $modelPhotographers[$i]->idUser." ".$modelPhotographers[$i]->idUser0->username."<br>";
			}
		}
		$criteria->select="idUser";
		$criteria->condition='idTransactionType=1';
		$criteria->distinct=true;
		$nBuyers=Transaction::model()->findAll($criteria);
		$nBuyers=count($nBuyers);
		
		$criteria->condition='idTransactionType=1';
		$nTransactions=Transaction::model()->count($criteria);
		$nTransactionsPhoto=TransactionPhoto::model()->count();
		
		$this->render('report', array(
			'nPhotosApproved'=>$nPhotosApproved,
			'nPhotosUploaded'=>$nPhotosUploaded,
			'nPhotosPending'=>$nPhotosPending,
			'nPhotosWaitReview'=>$nPhotosWaitReview,
			'nPhotosRejected'=>$nPhotosRejected,
			'nPhotosDeleted'=>$nPhotosDeleted,
			'nUsers'=>$nUsers,
			'nNewbie'=>$nNewbie,
			'nPros'=>$nPros,
			'nPower'=>$nPower,
			'nPhotographers'=>$nPhotographers,
			'nBuyers'=>$nBuyers,
			'nTransactions'=>$nTransactions,
			'nTransactionsPhoto'=>$nTransactionsPhoto,
			'nTopPhotographers'=>$nTopPhotographers,
			'nTopUsersPhotosCnt'=>$nTopUsersPhotosCnt,
			'nPhotosNewbie'=>$nPhotosNewbie,
			'nPhotosPros'=>$nPhotosPros,
			'nPhotosPower'=>$nPhotosPower,
		));
	}
	
	public function actionAbout(){
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
		
		Yii::app()->controller->onloadFunctions=
			"initializeMapSmall_inPage(45.065227, 7.6577, 11, 'map_canvas_small');
			initializeMapSmall_inPage(40.753196, -73.989232, 11, 'map_canvas_small_2');";
		
		$this->render('about');
	}
	
	public function actionApi(){
		$this->layout='//layouts/operative';
		
		if(!Yii::app()->user->isGuest){
			if(Yii::app()->user->apiKey){
				$modelApiKey=null;
			}else{
				$cs=Yii::app()->clientScript;
				$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/multi_sel.js', CClientScript::POS_HEAD);
				
				$modelApiKey = new ApiKey();
			}
		}else{
			$modelApiKey=null;
		}
		
		$this->render('api', array('modelApiKey'=>$modelApiKey));
	}
	
	private function randomString($length) {
		$key="";
	    $keys = array_merge(range(0,9), range('a', 'z'), range('A','Z'));
	    for($i=0; $i < $length; $i++) {
	        $key .= $keys[array_rand($keys)];
	    }
	    return $key;
	}
	
	public function actionSentApiRequest(){
		if(!isset($_POST['ApiKey']))
			throw new CHttpException(404, 'Api Key Request: something went wrong while reading the form.');
		if(!isset($_POST['ApiKey']['link1']))
			throw new CHttpException(404, 'Api Key Request: something went wrong while reading the link #1.');
		//if(!isset($_POST['ApiKey']['acceptTerms']))
			//throw new CHttpException(404, 'Api Key Request: something went wrong while reading the acceptance of the terms and conditions.');
			
		$modelApiKey = new ApiKey();
		$modelApiKey->idUser=Yii::app()->user->id;
		$modelApiKey->link1=$_POST['ApiKey']['link1'];
		//$modelApiKey->acceptTerms=$_POST['ApiKey']['acceptTerms'];
		$modelApiKey->acceptTerms=1;
		$modelApiKey->isPartner=0;
		$modelApiKey->apiKey=$this->randomString(8);
		
		$status=1;
		$error_msg="";
		if($modelApiKey->validate()){
			if(!$modelApiKey->save())
				throw new CHttpException(404, 'Api Key Request: something went wrong while saving the form.');
		}else{
			$error_msg="";
			$errors = $modelApiKey->getErrors();
			foreach($errors as $err){
				$status=0;
				if($error_msg!="")
					$error_msg=$error_msg."<br>";
				$error_msg=$error_msg.$err[0];
			}
		}
			
		$arr = array(
			'status'=>$status,
			'error_msg'=>$error_msg
		);
		echo json_encode($arr);
	}

	public function actionTestApiGsp(){
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/utilAjaxDivUpdate.js', CClientScript::POS_HEAD);
		$this->render('testApiGsp');
	}

	public function actionTestApiMap(){
		$this->layout='//layouts/white_page';
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
		$cs->registerScriptFile('http://geostockphoto.com/js/api/crossDomainReq.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile('http://geostockphoto.com/js/api/mapEdit.js', CClientScript::POS_HEAD);
		//$cs->registerScriptFile(Yii::app()->baseUrl.'/js/api/mapEdit.js', CClientScript::POS_HEAD);
		
		Yii::app()->controller->onloadFunctions="initializeGeoStockPhotoMap('w365zru2', null, null, null, 'marco', 'menfi')";
		
		$this->render('testApiMap');
	}
	
	public function actionIndex(){
		$this->layout='//layouts/homepage';
		Yii::import('application.extensions.fbconnect.*'); 

		$appId = ConfParameters::model()->findByPk('FbAppId')->value;
		$secret = ConfParameters::model()->findByPk('FbSecret')->value;
		
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $secret,
		));
		$this->render('start', array('fbLoginUrl'=>$facebook->getLoginUrl(array('redirect_uri'=>Yii::app()->createAbsoluteUrl('/site/fbLogin'),'scope'=>'email'))));
	}

	public function actionIndex2(){
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/utilAjaxDivUpdate.js', CClientScript::POS_HEAD);
		
		$this->layout='//layouts/operative2';
		Yii::import('application.extensions.fbconnect.*'); 

		$appId = ConfParameters::model()->findByPk('FbAppId')->value;
		$secret = ConfParameters::model()->findByPk('FbSecret')->value;
		
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $secret,
		));
		
		$criteria=new CDbCriteria;
		$criteria->with['photo']['condition']='rate=5 and ratio>=1';
		$dataProducts=Product::model()->findAll($criteria);
		$rand = rand(0, count($dataProducts));
		$modelProduct = $dataProducts[$rand];
		
		Yii::app()->controller->onloadFunctions=
			"initializeMapSmallStatic(".$modelProduct->photo->lat.", ".$modelProduct->photo->lng.", null, null, null);
			$('#idCaptcha_button').click();";
		
		$modelUser=new User('create');
		$this->performAjaxValidation($modelUser);
		
		$this->render('index2',
			array(
				'fbLoginUrl'=>$facebook->getLoginUrl(array('redirect_uri'=>Yii::app()->createAbsoluteUrl('/site/fbLogin'),'scope'=>'email')),
				'modelProduct'=>$modelProduct,
				'modelUser'=>$modelUser,
			)
		);
	}

	public function actionIndex3(){
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/utilAjaxDivUpdate.js', CClientScript::POS_HEAD);
		
		$this->layout='//layouts/operative2';
		Yii::import('application.extensions.fbconnect.*'); 

		$appId = ConfParameters::model()->findByPk('FbAppId')->value;
		$secret = ConfParameters::model()->findByPk('FbSecret')->value;
		
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $secret,
		));
		
		$criteria=new CDbCriteria;
		$criteria->with['photo']['condition']='rate=5 and ratio>=1';
		$dataProducts=Product::model()->findAll($criteria);
		$rand = rand(0, count($dataProducts));
		$modelProduct = $dataProducts[$rand];
		
		Yii::app()->controller->onloadFunctions=
			"initializeMapSmallStatic(".$modelProduct->photo->lat.", ".$modelProduct->photo->lng.", null, null, null);
			$('#idCaptcha_button').click();";
		
		$modelUser=new User('create');
		$this->performAjaxValidation($modelUser);
		
		$this->render('index3',
			array(
				'fbLoginUrl'=>$facebook->getLoginUrl(array('redirect_uri'=>Yii::app()->createAbsoluteUrl('/site/fbLogin'),'scope'=>'email')),
				'modelProduct'=>$modelProduct,
				'modelUser'=>$modelUser,
			)
		);
	}

	public function actionIndex4(){
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/utilAjaxDivUpdate.js', CClientScript::POS_HEAD);
		
		$this->layout='//layouts/operative2';
		Yii::import('application.extensions.fbconnect.*'); 

		$appId = ConfParameters::model()->findByPk('FbAppId')->value;
		$secret = ConfParameters::model()->findByPk('FbSecret')->value;
		
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $secret,
		));
		
		$criteria=new CDbCriteria;
		$criteria->with['photo']['condition']='rate=5 and ratio>=1';
		$dataProducts=Product::model()->findAll($criteria);
		$rand = rand(0, count($dataProducts));
		$modelProduct = $dataProducts[$rand];
		
		Yii::app()->controller->onloadFunctions=
			"initializeMapSmallStatic(".$modelProduct->photo->lat.", ".$modelProduct->photo->lng.", null, null, null);
			$('#idCaptcha_button').click();";
		
		$modelUser=new User('create');
		$this->performAjaxValidation($modelUser);
		
		$this->render('index4',
			array(
				'fbLoginUrl'=>$facebook->getLoginUrl(array('redirect_uri'=>Yii::app()->createAbsoluteUrl('/site/fbLogin'),'scope'=>'email')),
				'modelProduct'=>$modelProduct,
				'modelUser'=>$modelUser,
			)
		);
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{	 
		if(isset($_POST['ajax']) && ($_POST['ajax']==='user-form' || $_POST['ajax']==='resetpwdo-form' || $_POST['ajax']==='resetpwask-form'))
		{ 
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionStartPhotographer(){
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/utilAjaxDivUpdate.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/shoppingOpt_sel.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/rating.js', CClientScript::POS_HEAD);
		
		Yii::app()->controller->onloadFunctions="initializeMapHome(null, null, '', null, 1)";
		
		$this->layout='//layouts/homepage2';
		Yii::import('application.extensions.fbconnect.*'); 

		$appId = ConfParameters::model()->findByPk('FbAppId')->value;
		$secret = ConfParameters::model()->findByPk('FbSecret')->value;
		
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $secret,
		));
		
		$criteria=new CDbCriteria;
		$criteria->select='idSize, idLicense, price';
		$shoppingOptDefaultGsp=ConfShoppingOptDefaultGsp::model()->findAll($criteria);
		
		$shoppingOptMan=new ShoppingOptManager();
		$shoppingOptMan->setClass('ShoppingOptUserDefaultRf');
		if(isset($shoppingOptDefaultGsp)){
			for($i=0; $i<count($shoppingOptDefaultGsp); $i++){
				$shoppingOptMan->putItems($shoppingOptDefaultGsp[$i]);
			}
		}else{
			throw new CHttpException(404, 'Edit photo: something went wrong while retrieving the shopping options RF.');
		}
		
		$shoppingOptManRm=new ShoppingOptManager();
		$shoppingOptManRm->setClass('ShoppingOptUserDefaultRm');
		
		$modelUser = new User();
		$modelUser->preferredLicenseType="RF";
		
		$this->render('start_photographer',
			array(
				'fbLoginUrl'=>$facebook->getLoginUrl(array('redirect_uri'=>Yii::app()->createAbsoluteUrl('/site/fbLogin'),'scope'=>'email')),
				'shoppingOptManRm'=>$shoppingOptManRm,
				'shoppingOptMan'=>$shoppingOptMan,
				'modelUser'=>$modelUser
			)
		);
	}

	public function actionStartCustomer(){
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/utilAjaxDivUpdate.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/shoppingOpt_sel.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/rating.js', CClientScript::POS_HEAD);
		
		Yii::app()->controller->onloadFunctions="initializeMapHome(null, null, '', null, 1)";
		
		$this->layout='//layouts/homepage2';
		Yii::import('application.extensions.fbconnect.*'); 

		$appId = ConfParameters::model()->findByPk('FbAppId')->value;
		$secret = ConfParameters::model()->findByPk('FbSecret')->value;
		
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $secret,
		));
		
		$criteria=new CDbCriteria;
		$criteria->select='idSize, idLicense, price';
		$shoppingOptDefaultGsp=ConfShoppingOptDefaultGsp::model()->findAll($criteria);
		
		$shoppingOptMan=new ShoppingOptManager();
		$shoppingOptMan->setClass('ShoppingOptUserDefaultRf');
		if(isset($shoppingOptDefaultGsp)){
			for($i=0; $i<count($shoppingOptDefaultGsp); $i++){
				$shoppingOptMan->putItems($shoppingOptDefaultGsp[$i]);
			}
		}else{
			throw new CHttpException(404, 'Edit photo: something went wrong while retrieving the shopping options RF.');
		}
		
		$shoppingOptManRm=new ShoppingOptManager();
		$shoppingOptManRm->setClass('ShoppingOptUserDefaultRm');
		
		$modelUser = new User();
		$modelUser->preferredLicenseType="RF";
		
		$this->render('start_buyer',
			array(
				'fbLoginUrl'=>$facebook->getLoginUrl(array('redirect_uri'=>Yii::app()->createAbsoluteUrl('/site/fbLogin'),'scope'=>'email')),
				'shoppingOptManRm'=>$shoppingOptManRm,
				'shoppingOptMan'=>$shoppingOptMan,
				'modelUser'=>$modelUser
			)
		);
	}
	
	public function actionSentYoudonothing(){
		if(!isset($_POST['YouDoNothing']))
			throw new CHttpException(404, 'You Do Nothing: something went wrong while reading the form.');
		if(!isset($_POST['YouDoNothing']['nPhotos']))
			throw new CHttpException(404, 'You Do Nothing: something went wrong while reading the number of photos.');
		if(!isset($_POST['YouDoNothing']['link1']))
			throw new CHttpException(404, 'You Do Nothing: something went wrong while reading the link #1.');
		if(!isset($_POST['YouDoNothing']['link2']))
			throw new CHttpException(404, 'You Do Nothing: something went wrong while reading the link #2.');
		if(!isset($_POST['YouDoNothing']['flagCategory']))
			throw new CHttpException(404, 'You Do Nothing: something went wrong while reading the flag of the category.');
		if(!isset($_POST['YouDoNothing']['flagPosition']))
			throw new CHttpException(404, 'You Do Nothing: something went wrong while reading the flag of the position.');
		if(!isset($_POST['YouDoNothing']['upperBound']))
			throw new CHttpException(404, 'You Do Nothing: something went wrong while reading the upper bound.');
		if(!isset($_POST['YouDoNothing']['device']))
			throw new CHttpException(404, 'You Do Nothing: something went wrong while reading the device.');
		if(!isset($_POST['YouDoNothing']['acceptTerms']))
			throw new CHttpException(404, 'You Do Nothing: something went wrong while reading the acceptance of the terms and conditions.');
		if(!isset($_POST['YouDoNothing']['flagSendBackDevice']))
			throw new CHttpException(404, 'You Do Nothing: something went wrong while reading the form.');
			
		$modelYoudonothing = new YouDoNothing();
		$modelYoudonothing->idUser=Yii::app()->user->id;
		$modelYoudonothing->nPhotos=$_POST['YouDoNothing']['nPhotos'];
		$modelYoudonothing->link1=$_POST['YouDoNothing']['link1'];
		$modelYoudonothing->link2=$_POST['YouDoNothing']['link2'];
		$modelYoudonothing->flagCategory=$_POST['YouDoNothing']['flagCategory'];
		$modelYoudonothing->flagPosition=$_POST['YouDoNothing']['flagPosition'];
		$modelYoudonothing->upperBound=$_POST['YouDoNothing']['upperBound'];
		$modelYoudonothing->device=$_POST['YouDoNothing']['device'];
		$modelYoudonothing->flagSendBackDevice=$_POST['YouDoNothing']['flagSendBackDevice'];
		$modelYoudonothing->acceptTerms=$_POST['YouDoNothing']['acceptTerms'];
		
		$status=1;
		$error_msg="";
		if($modelYoudonothing->validate()){
			if(!$modelYoudonothing->save())
				throw new CHttpException(404, 'You Do Nothing: something went wrong while saving the form.');
		}else{
			$error_msg="";
			$errors = $modelYoudonothing->getErrors();
			foreach($errors as $err){
				$status=0;
				if($error_msg!="")
					$error_msg=$error_msg."<br>";
				$error_msg=$error_msg.$err[0];
			}
		}
			
		$arr = array(
			'status'=>$status,
			'error_msg'=>$error_msg
		);
		echo json_encode($arr);
	}
	
	public function actionYoudonothing(){
		//$this->layout='//layouts/deadEnd';
		
		if(Yii::app()->user->isGuest){
			Yii::import('application.extensions.fbconnect.*'); 
	
			$appId = ConfParameters::model()->findByPk('FbAppId')->value;
			$secret = ConfParameters::model()->findByPk('FbSecret')->value;
			
			$facebook = new Facebook(array(
			  'appId'  => $appId,
			  'secret' => $secret,
			));
			
			$this->render('youdonothing',
				array('fbLoginUrl'=>$facebook->getLoginUrl(
					array('redirect_uri'=>Yii::app()->createAbsoluteUrl('/site/fbLogin'),'scope'=>'email'))
				)
			);
		}else{
			$modelYoudonothing = YouDoNothing::model()->findByPk(Yii::app()->user->id);
			if(!isset($modelYoudonothing)){
				$cs=Yii::app()->clientScript;
				$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/multi_sel.js', CClientScript::POS_HEAD);
				$modelYoudonothing=new YouDoNothing;
			}
			$this->render('youdonothing', array('modelYoudonothing'=>$modelYoudonothing));
		}
	}
	
	public function actionStart(){
		$this->layout='//layouts/homepage';
		Yii::import('application.extensions.fbconnect.*'); 

		$appId = ConfParameters::model()->findByPk('FbAppId')->value;
		$secret = ConfParameters::model()->findByPk('FbSecret')->value;
		
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $secret,
		));
		$this->render('index', array('fbLoginUrl'=>$facebook->getLoginUrl(array('redirect_uri'=>Yii::app()->createAbsoluteUrl('/site/fbLogin'),'scope'=>'email'))));
	}
	
	public function actionRedirectToLogin(){
		
		if ($this->getIsMobile()){
			$this->redirect(array('mobile/home'));
		}else {
			$this->redirect(array('site/login'));
		}		
		/*echo "<script type='text/javascript'>";
		echo "window.location = '".Yii::app()->createUrl('site/login')."'";
		echo "</script>";*/
	}
		
	public function actionHowitworks($section=null){
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile(Yii::app()->baseUrl.'/jsSuapa/starter.js', CClientScript::POS_HEAD);
		
		$depth=0;
		$level1=0;
		$level2=0;
		$level3=0;

		switch ($section) {
		    case "Upload":
		        $depth=3;	$level1=1;	$level2=3;	$level3=12;
		        break;
		    case "Edit":
		        $depth=3;	$level1=1;	$level2=3;	$level3=13;
		        break;
		    case "Submit":
		        $depth=3;	$level1=1;	$level2=3;	$level3=14;
		        break;
		    case "Photo":
		        $depth=3;	$level1=1;	$level2=4;	$level3=16;
		        break;
			case "Photographer":
		        $depth=3;	$level1=1;	$level2=4;	$level3=17;
		        break;		        
		    case "Rewards":
		        $depth=3;	$level1=1;	$level2=5;	$level3=18;
		        break;	
		    case "Convert":
		        $depth=3;	$level1=1;	$level2=5;	$level3=19;
		        break;		        
			case "Show":
		        $depth=2;	$level1=1;	$level2=27;
		        break;		        		        
		    case "Buy":
		        $depth=2;	$level1=2;	$level2=23;
		        break;
			case "SearchPhoto":
		        $depth=2;	$level1=2;	$level2=24;
		        break;		        
			case "Download":
		        $depth=2;	$level1=2;	$level2=25;
		        break;		        		        
		    default:
		       $section=null;
		}


		if($section==null)
			$this->render('howitworks', array('depth'=>0));
		else
			echo $this->render('howitworks', array('depth'=>$depth,'level1'=>$level1,'level2'=>$level2,'level3'=>$level3));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{	
		//TODO Inserire qui l'inserimento in tbl_ticket con con ticket_type = 4 /Error
		// aggiungere le informazioni restituire nel vettore $error descritte nella pagina
		// generare una pagina formale di errore da presentare all'utente nel caso in cui il sito non sia in versione DEBUG

		//TODO mandare un email una volta messo in produzione 
		if($error=Yii::app()->errorHandler->error)
	    {
	    	//$this->getTicketException($error['message']);
	    	$modelTicketException = $this->getTicketException($error['message']);

	    	if(!$modelTicketException || ($modelTicketException->avoidTicketError!=1)){
	    		$transaction = Yii::app()->db->beginTransaction();
				try{
					$this->gspLog("error","ERROR rise - ".(isset($error['file']) ? $error['file'] : 'null')." - line:".(isset($error['line']) ? $error['line'] : 'null'));
					$modelTicket = new Ticket();
					$modelTicket->idUser= (isset(Yii::app()->user->id) ? Yii::app()->user->id : null);
					$modelTicket->idTicketType=4; //Error
					$modelTicket->idTicketStatus=1; //Pending
					$modelTicket->sourceActor='APPLICATION';
					$modelTicket->subject='['.(isset($error['code']) ? $error['code'] : null).'] Error ';
					$modelTicket->message=(isset($error['message']) ? $error['message'] : null);
					
					if(!$modelTicket->save())
							$this->gspLog("error","modelTicket->save() - ".$this->route." -- ". print_r($modelTicket->getErrors())); 
						//throw new CHttpException(400,'Is not possible save the ticket');
					
					$modelError = new Error();
					$modelError->idTicket = $modelTicket->idTicket;
					//utilizzo il code della httpException per passare l'idSession corretto della sessione che ha generato l'eccezione
					$modelError->idSession = Yii::app()->session['idSession'];//(isset($error['code']) ? $error['code'] : null);  				
					$modelError->type = (isset($error['type']) ? $error['type'] : null);
					$modelError->message = (isset($error['message']) ? $error['message'] : null);
					$modelError->filepath = (isset($error['file']) ? $error['file'] : null);
					$modelError->line = (isset($error['line']) ? $error['line'] : null);
					$modelError->trace = (isset($error['trace']) ? $error['trace'] : null);
					$modelError->source = (isset($error['source']) ? $error['source'] : null);
					if(Yii::app()->request->isAjaxRequest)
						$modelError->isAjaxRequest = Yii::app()->request->isAjaxRequest;
					
					if(!$modelError->save())
						$this->gspLog("error","modelError->save() - ".$this->route." -- ".  print_r($modelError->getErrors()));
					
					$transaction->commit();
					
					if(Yii::app()->request->isAjaxRequest){
			    		echo $error['message'];
					}
		    		else{
		    			$this->render('error', array(
							'idTicket'=>$modelTicket->idTicket,
							'message'=>$error['message'],
						));
		    		}
				}
				catch(Exception $e){ // an exception is raised if a query fails
					$this->gspLog("error","transaction->rollBack() -- ".$this->route." -- ". $e);
					$transaction->rollBack();
				}
			}
			else{
				if(Yii::app()->request->isAjaxRequest){
			    		echo $error['message'];
				}else{
	    			$this->render('error', array(
						'idTicket'=>'no ticket',
						'message'=>$error['message'],
					));
	    		}
			}


			//Gestire l'invio email
			if(strcmp(strtoupper(Yii::app()->getParams()->environment), 'PRODUCTION')==0 && (!$modelTicketException || ($modelTicketException->avoidEmail!=1))){
				$message = new YiiMailMessage;
				$message->view = 'exceptionAdmin';
				//userModel is passed to the view
				/*$message->setBody(array('error'=>$error,
								  'idUser'=> isset(Yii::app()->user->id) ? Yii::app()->user->id : null),
								  'idTicket'=>isset($modelTicket) ? $modelTicket->idTicket : null), 
								  'idError' =>isset($modelError) ? $modelError->idError : null), 
								'text/html');*/
				$message->setBody(array('error'=>$error,'idUser'=> Yii::app()->user->id, 'idTicket'=>$modelTicket->idTicket, 'idError'=>$modelError->idError,'returnUrl'=> Yii::app()->user->returnUrl ), 'text/html');
				 
				$message->addTo(ConfParameters::model()->findByPk('System-exception')->value);
				$message->setFrom(Yii::app()->params['no-replyEmail'],'GeoStockPhoto');
				$message->setSubject('GSP System Exception - '.$error['message']);
				Yii::app()->mail->send($message);
			}
	    }

	    /*
		if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }*/
	}

	public function actionDeleteTicket($idTicket){
		$transaction = Yii::app()->db->beginTransaction();
		try{
			$criteria=new CDbCriteria;
			$criteria->condition='idTicket=:idTicket';
			$criteria->params=array(':idTicket'=>$idTicket);
			$modelError = Error::model()->findAll($criteria);

			
			//TblError
			$criteria=new CDbCriteria;
			$criteria->condition='idTicket=:idTicket';
			$criteria->params=array(':idTicket'=>$idTicket);
			echo "Error deleted ". Error::model()->deleteAll($criteria)."<br>";


			for($i=0; $i<count($modelError); $i++){
				$idSession = $modelError[$i]->idSession;

				//TblLog
				$criteria=new CDbCriteria;
				$criteria->condition='idSession=:idSession';
				$criteria->params=array(':idSession'=>$idSession);
				echo "Log deleted ".Log::model()->DeleteAll($criteria)."<br>";;

				////TblSession
				$criteria=new CDbCriteria;
				$criteria->condition='idSession=:idSession';
				$criteria->params=array(':idSession'=>$idSession);
				echo "Session deleted ".Session::model()->DeleteAll($criteria)."<br>";;
			}
			
			//TblTicket
			$criteria=new CDbCriteria;
			$criteria->condition='idTicket=:idTicket';
			$criteria->params=array(':idTicket'=>$idTicket);
			echo "Ticket deleted ". Ticket::model()->deleteAll($criteria)."<br>";;

			$transaction->commit();
		}
		catch(Exception $e){ // an exception is raised if a query fails
			$this->gspLog("error","transaction->rollBack() -- ".$this->route." -- ". $e);
			$transaction->rollBack();
		}

	}

	public function getTicketException($message=''){
		$criteria = new CDbCriteria;
		$criteria->order = 'idTicketException desc';
		$collectionTicketException=ConfTicketException::model()->findAll($criteria);
		for($i=0; $i<count($collectionTicketException); $i++){
			$messageLikeArray=explode("%", $collectionTicketException[$i]->likeCondition);
			$match=false;
			$countMatch=0;

			foreach ($messageLikeArray as &$part) {
				if($part!=''){
					$pattern='*'.$part.'*';				
					if (preg_match($pattern, $message))
						$countMatch++;						
				}else{
					$countMatch++;
				}
			}			
			if($countMatch==count($messageLikeArray))
				return  $collectionTicketException[$i];				
		}
		return false;
	}

	public function actionAjaxLoginChallenge($username){

		if($username!=""){
			$criteria=new CDbCriteria;
			$criteria->condition='username=\''.$username.'\' OR email=\''.$username.'\'';
			$model=User::model()->findAll($criteria);
		
				if(count($model)==1){
					$util = new Util();
					
					$model[0]->challenge = $util->getChallengeWord();
					if(!$model[0]->save())
						throw new CHttpException(400,'AjaxLoginChallenge User: Is not possible save User data');
				}else{
					if(count($model)>1)
						throw new CHttpException(400,'AjaxLoginChallenge more than 1 user fetched for [username= '.$username.' OR email='.$username.']');
				}
				
				echo $model[0]->challenge."#".$model[0]->username;
		}
	}
	
	//API
	public function actionGetLoginChallenge($apiKey=null, $username=""){
    	header('Content-type: text/json');
    	header('Access-Control-Allow-Origin: *');
		$json = "{\"errCode\":002}";
		
		$criteria=new CDbCriteria;
		$criteria->condition='username=\''.$username.'\' OR email=\''.$username.'\'';
		$model=User::model()->find($criteria);
				
		if(count($model)==1){
			if($model->verifyApiKey($apiKey , 1)){
				$util = new Util();						
				$model->challenge = $util->getChallengeWord();
				if($model->save())
					$json = "{\"username\":\"".$model->username."\",\"challenge\": \"".$model->challenge."\"}";	
	    	}else
				$json = "{\"errCode\":001}";
		}
		
		echo $json;
	}
	
	/**
	 * Displays the login page
	 */
	public function actionLogin(){
		Yii::import('application.extensions.fbconnect.*'); 

		$appId = ConfParameters::model()->findByPk('FbAppId')->value;
		$secret = ConfParameters::model()->findByPk('FbSecret')->value;
		
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $secret,
		));
		
		
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile('https://crypto-js.googlecode.com/svn/tags/3.0.2/build/rollups/sha512.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/site/challenge-login.js', CClientScript::POS_HEAD);

		
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm'])){
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->loginGSP()){
				Yii::app()->user->setSecureSessionId();
				$returnUrl=Yii::app()->user->returnUrl;
				if(substr($returnUrl, strlen($returnUrl)-4, 4)!='.php')
					$this->redirect(Yii::app()->user->returnUrl);
				else
		    		$this->redirect(array('photo/submit'));
		    		//$this->redirect(Yii::app()->homeUrl);
			}
		}
		// display the login form
		$this->render('login', array('model'=>$model, 'fbLoginUrl'=>$facebook->getLoginUrl(array('redirect_uri'=>Yii::app()->createAbsoluteUrl('/site/fbLogin'),'scope'=>'email'))));
	}
	public function actionLoginNew(){
		$this->layout='//layouts/osama2';
		Yii::import('application.extensions.fbconnect.*'); 

		$appId = ConfParameters::model()->findByPk('FbAppId')->value;
		$secret = ConfParameters::model()->findByPk('FbSecret')->value;
		
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $secret,
		));
		
		
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile('https://crypto-js.googlecode.com/svn/tags/3.0.2/build/rollups/sha512.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/site/challenge-login.js', CClientScript::POS_HEAD);

		
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm'])){
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->loginGSP()){
				Yii::app()->user->setSecureSessionId();
				$returnUrl=Yii::app()->user->returnUrl;
				if(substr($returnUrl, strlen($returnUrl)-4, 4)!='.php')
					$this->redirect(Yii::app()->user->returnUrl);
				else
		    		$this->redirect(array('photo/submit'));
		    		//$this->redirect(Yii::app()->homeUrl);
			}
		}
		// display the login form
		$this->render('login', array('model'=>$model, 'fbLoginUrl'=>$facebook->getLoginUrl(array('redirect_uri'=>Yii::app()->createAbsoluteUrl('/site/fbLogin'),'scope'=>'email'))));
	}
	
	//API
	public function actionLoginAPI(){
		header('Content-type: text/json');
    	header('Access-Control-Allow-Origin: *');
		$json = "{\"errCode\":002}";
    		
		$criteria=new CDbCriteria;
		$criteria->condition="username='".$_POST['username']."'";
		$modelUser=User::model()->find($criteria);
		
		if(count($modelUser)==1){
			if($modelUser->verifyApiKey($_POST['apiKey'], 1)){
				$model=new LoginForm;
				// collect user input data
				if(isset($_POST['username']) && isset($_POST['cryptedpassword']) && isset($_POST['challenge'])){
					$model->username=$_POST['username'];
					$model->hiddenpassword=$_POST['cryptedpassword'];
					$model->password=$_POST['cryptedpassword'];
					$model->challenge=$_POST['challenge'];
					$model->usernamereal=$_POST['username'];
					
					// validate user input and redirect to the previous page if valid
					if($model->validate() && $model->loginGSP()){
						Yii::app()->user->setSecureSessionId();
						$json = "{ // \"SESSION_ID\": \"".Yii::app()->session->sessionID."\",
							\"SECURE_SESSION_ID\": \"".$modelUser->sessionIdSecure."\"}";
					}else
						$json = "{\"errCode\":003}";
				}
			}else
				$json = "{\"errCode\":001}";
		}
		
		echo $json;
	}

		/**
	 * Displays the login page
	 */
	public function actionFbLogin()
	{
		Yii::import('application.extensions.fbconnect.*'); 

		$appId = ConfParameters::model()->findByPk('FbAppId')->value;
		$secret = ConfParameters::model()->findByPk('FbSecret')->value;
		
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $secret,
		));
		
		$user = $facebook->getUser();
	
		// We may or may not have this data based on whether the user is logged in.
		// If we have a $user id here, it means we know the user is logged into
		// Facebook, but we don't know if the access token is valid. An access
		// token is invalid if the user logged out of Facebook.

		if ($user) {	
		  try {
		    // Proceed knowing you have a logged in user who's authenticated.
		    $user_profile = $facebook->api('/me');		    
		    $fbUserId = $user_profile['id'];		
		    $modelUser = User::model()->find('fbUserId=:fbUserId', array(':fbUserId'=>$fbUserId));
		    
		   // if(User::model()->exists('fb_user_id=:fbUserId', array(':fbUserId'=>$fbUserId))){
		   if($modelUser!=null){
		   		$sessionAccessToken = 'fb_'.$appId.'_access_token';
		   		$sessionCode= 'fb_'.$appId.'_code';
		   		$modelUser->fbAccessToken = $_SESSION[$sessionAccessToken];
		    	$modelUser->fbCode = $_SESSION[$sessionCode];
		    	
		    	if(!$modelUser->save())
					throw new CHttpException(400,'Is not possible to save user fb data');

				$identity = new UserIdentity(null,null,null,$fbUserId);
				$identity->authenticateFbUser();
				$duration = 3600*24*30; // 30 days
				Yii::app()->user->login($identity,$duration);				

				Yii::app()->user->setSecureSessionId();
				$returnUrl=Yii::app()->user->returnUrl;
				if(substr($returnUrl, strlen($returnUrl)-4, 4)!='.php')
					$this->redirect(Yii::app()->user->returnUrl);
				else
		    		$this->redirect(array('photo/submit'));
		    		//$this->redirect(Yii::app()->homeUrl);
		    }else{
		    	$this->redirect(array('user/fbCreate'));
		    }
		    
		  } catch (FacebookApiException $e) {
		    error_log($e);
		    throw $e;
		  }
		}else{
			$this->redirect(array('site/index'));
			//throw new CHttpException(404,'Facebook connect has encountered problem fetching data');
		}
	}
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout(){
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionLanding($lang=null){
		$this->redirect(array('photo/index'));
				
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/site/slides.min.jquery.js', CClientScript::POS_HEAD);
		//$cs->registerScriptFile(Yii::app()->baseUrl.'/jsSuapa/script.js', CClientScript::POS_HEAD);
				
		if($lang=='it'){
			Yii::app()->language='it_it';
		}else if($lang=='en'){
			Yii::app()->language='en_en';
		}else
			Yii::app()->language=Yii::app()->getRequest()->getPreferredLanguage();
		
		if(Yii::app()->language=='it_it')
			$this->layout='//layouts/mainLanding_ita';
		else
			$this->layout='//layouts/mainLanding';
		
		if ($this->getIsMobile()){
			//$this->layout='//layouts/mobile';
			$this->redirect(array('mobile/home'));
	       /* echo "<script type='text/javascript'>";
			echo "window.location = '".Yii::app()->createUrl('mobile/home')."'";
			echo "</script>";*/
		}else{
			$userLanded= new LandingPage;
			$this->render('index',array('model'=>$userLanded));
		}
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($email)
	{
		$model=LandingPage::model()->findByPk($email);	
		if($model===null)
			throw new CHttpException(404,'The requested user does not exist.');
		return $model;
	}
}