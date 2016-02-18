<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/operative';
	public $pageName="";
	public $onloadFunctions;
		
	public function actions(){
		 return array(
			   // captcha action renders the CAPTCHA image displayed on the user registration page
			   'captcha'=>array(
			     'class'=>'CCaptchaAction',
			     'backColor'=>0xFFFFFF,
		 		 'testLimit'=>0,
		 		 'transparent'=>true,
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
			array('allow',  // allow all users
				'actions'=>array('topFive', 'topFiveFast', 'view', 'verification', 'groups', 'createGroup', 'map',
					'updateMapSemp', 'showInfoUser'),
				'users'=>array('*'),
			),
			array('allow',  // allow authenticated
				'actions'=>array('ajaxSaveShoppingUserDefault', 'promotion', 'modify',
				'ajaxSaveModify', 'savePhotoProfile', 'join_group', 'leave_group','deletePhotoProfile',
				'modify_group', 'ajaxSaveModify_group', 'savePhotoGroup', 'ajaxCreateGroup','ajaxStatisticsSearch',
				'pilot', 'statistics', 'remove','AjaxConvertCredits','convertCredits'), 
				'users'=>array('@'),
			),
			array('allow',  // allow guest
				'actions'=>array('create','resetpwask','resetpwdo','fbCreate','resendVerification','captcha'), 
				'users'=>array('guest'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin', 'createFtpAccount', 'enableFtpAccount', 'createFtpConfig', 'updatePhotoUsers'),
				'expression'=>'$user->isAdministrator()',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('switchUser'),
				'expression'=>'$user->isRoleAdmin()',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionPilot($verCode){
		$criteria=new CDbCriteria;
		$criteria->condition="verCode='".$verCode."' and idUser is null";
		$modelUserPilot=UserPilot::model()->find($criteria);
		if(count($modelUserPilot)!=1)
			throw new CHttpException(404, 'your verification code may be incorrect.');
			
		$transaction = Yii::app()->db->beginTransaction();
		try{	
			$modelUserPilot->idUser=Yii::app()->user->id;
			if(!$modelUserPilot->save())
				throw new CHttpException(404, 'something went wrong while saving the pilot user information.');
				
			$modelUserPilot->idUser0->creditsBought=$modelUserPilot->freeCredits;
			if(!$modelUserPilot->idUser0->save())
				throw new CHttpException(404, 'something went wrong while saving the user information.');
				
			$modelTransaction=new Transaction();
			$modelTransaction->idTransactionType=3;
			$modelTransaction->idUser=Yii::app()->user->id;
			$modelTransaction->credits=$modelUserPilot->freeCredits;
			$modelTransaction->price=0;
			$modelTransaction->note="Free credits for Pilot User.";
			if(!$modelTransaction->save())
				throw new CHttpException(404, 'something went wrong while saving the transaction.');
			
			$transaction->commit();
		}catch(Exception $e){ // an exception is raised if a query fails
			$transaction->rollBack();
			throw new CHttpException(404,'Pilot User error: '.$e->getMessage());
		}
		
		$this->render('enablePilot',array(
			'freeCredits'=>$modelUserPilot->freeCredits,
		));
	}
	
	private function randomString($length) {
		$key="";
	    $keys = array_merge(range(0,9), range('a', 'z'), range('A','Z'), array('*', '#', '?', '!', '^', '-'));
	    for($i=0; $i < $length; $i++) {
	        $key .= $keys[array_rand($keys)];
	    }
	    return $key;
	}
	
	public function actionCreateFtpAccount($start=1, $end=10){
		$stringConf="";
		for($i=$start; $i<=$end; $i++){
			$criteria=new CDbCriteria;
			$criteria->condition="username='gspuser".$i."'";
			if(FtpAccount::model()->exists($criteria))
				throw new CHttpException(404, 'Create FTP: there is already an account with this username.');
				
			$modelFtpAccount = new FtpAccount;
			$modelFtpAccount->username='gspuser'.$i;
			$psw=$this->randomString(8);
			$modelFtpAccount->password=$psw;
			$modelFtpAccount->enable=0;
			if(!$modelFtpAccount->save())
				throw new CHttpException(404, 'Create FTP: something went wrong while saving the ftp account.');
				
			$stringConf=$stringConf."(gspuser".$i.":".$psw.")";
		}
		echo $stringConf."<br><br>";
		echo "<a href='".CController::createUrl('user/enableFtpAccount', array('start'=>$start, 'end'=>$end))."'>Enable FTP accounts</a> ";
	}
	
	public function actionCreateFtpConfig($start=1, $end=10){
		$stringConf="";
		for($i=$start; $i<=$end; $i++){
			$criteria=new CDbCriteria;
			$criteria->condition="username='gspuser".$i."'";
			$modelFtpAccount=FtpAccount::model()->find($criteria);
			if(isset($modelFtpAccount)){
				$psw=$modelFtpAccount->password;
				$stringConf=$stringConf."(gspuser".$i.":".$psw.")";
			}
		}
		echo $stringConf;
	}
	
	public function actionEnableFtpAccount($start=1, $end=10){
		for($i=$start; $i<=$end; $i++){
			$modelFtpAccount=FtpAccount::model()->findByPk('gspuser'.$i);
			$modelFtpAccount->enable=1;
			if(!$modelFtpAccount->save())
				throw new CHttpException(404, 'Create FTP: something went wrong while saving the ftp account.');
		}
		echo "Enabled Ftp accounts.";
	}
	
	private function verifyApiKey($apiKey){
		if(isset($apiKey)){
			$criteria=new CDbCriteria;
			$criteria->condition="apiKey='".$apiKey."'";
			if(ApiKey::model()->exists($criteria)){
				$modelApi = ApiKey::model()->findAll($criteria);
				$modelApi[0]->cntRequests++;
				$modelApi[0]->save();
				return true;
			}
		}
		return false;
	}

	public function actionMap($location=""){
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/utilAjaxDivUpdate.js', CClientScript::POS_HEAD);
		
		if(Yii::app()->controller->showMap($location))
			throw new CHttpException(404,'Internal error.');
	}
	
	private function showMap($location){
		$criteria=new CDbCriteria;
		$criteria->select='idUser, lat, lng';
		$criteria->condition="lat is not null and lng is not null and photoProfile=1";
		$criteria->with['products']['order']='products.insert_timestamp desc';
		$criteria->together=true;
		$criteria->limit=1;
		$data=User::model()->find($criteria);
		
		Yii::app()->controller->onloadFunctions="initializeMapUser($data->lat, $data->lng, '$location')";
		$this->render('map', array('idUser'=>$data->idUser));
	}

	public function actionShowInfoUser($id){
		$this->widget('application.components.widgets.UserInfo', array('idUser'=>$id, 'showOuter'=>false));
	}

	private function checkBorderMap(&$lngNE){
		if($lngNE>180){
			$lngNE=$lngNE-360;
			return true;
		}else
			return false;
	}

	private function createCriteriaTopMap($latSW, $lngSW, $latNE, $lngNE){
		if($lngNE<$lngSW)
			$condition =
				'lat>'.$latSW.' and lat<'.$latNE.
				' and lng>'.$lngSW.' or lng<'.$lngNE;
		else
			$condition =
				'lat>'.$latSW.' and lat<'.$latNE.
				' and lng>'.$lngSW.' and lng<'.$lngNE;
			
		$criteria=new CDbCriteria;
		$criteria->condition=$condition;
		return $criteria;
	}

	private function addCriteriaTop5($criteria){
		$criteria->select="t.idUser, t2.last_update";
		$criteria->condition=$criteria->condition." and photoProfile=1";
		$criteria->join="join (select idUser, max(insert_timestamp) as last_update from tbl_product group by idUser) t2 on t.idUser=t2.idUser";
		$criteria->order='t2.last_update desc';
	}
	
	public function actionUpdateMapSemp($apiKey, $latSW, $lngSW, $latNE, $lngNE, $orderBy="best"){
		header('Content-type: text/json');
    	header('Access-Control-Allow-Origin: *');
    	
		if($this->verifyApiKey($apiKey)){
			// TOP5
			$criteria=Yii::app()->controller->createCriteriaTopMap($latSW, $lngSW, $latNE, $lngNE);
			Yii::app()->controller->addCriteriaTop5(&$criteria);
			$data=User::model()->findAll($criteria);
			
			$totCounTop5=min(count($data), 5);
			$jsonTop5='';
			for($i=0; $i<$totCounTop5; $i++){
				if($i!=0)
					$jsonTop5 = $jsonTop5.",";
				$jsonTop5 = $jsonTop5."{\"id\":".$data[$i]->idUser."}";
			}
			if(isset($data[5]))
				$offsetNext=1;
			else 
				$offsetNext="null";
			// END TOP5
			
			$criteria=Yii::app()->controller->createCriteriaTopMap($latSW, $lngSW, $latNE, $lngNE);
			$criteria->limit=2;
			$data=User::model()->findAll($criteria);
	
			$json = "";
			$topPhotos = "";
			$countP=count($data);
			if($countP>1){
				$maxMarkers = intval(ConfParameters::model()->findByPk("MaxMarkers")->value);
				$maxMarkersInner = intval(ConfParameters::model()->findByPk("MaxMarkersInner")->value);
				$xGrid=intval(ConfParameters::model()->findByPk("xGrid")->value);
				$yGrid=intval(ConfParameters::model()->findByPk("yGrid")->value);
					
				$latSW_rad = deg2rad($latSW);
				$latNE_rad = deg2rad($latNE);
				$height = log((tan($latSW_rad)-1/cos($latSW_rad))/(tan($latNE_rad)-1/cos($latNE_rad)));
				$heightGrid = $height/$yGrid;
				$ySW=log((1+sin($latSW_rad))/cos($latSW_rad));
					
				if($lngNE >= $lngSW)
					$lngWidth = $lngNE - $lngSW;
				else{
					$lngWidth = ($lngNE+180) + (180-$lngSW);
				}
				$lngWidthGrid = $lngWidth/$xGrid;
					
				$latSW_inner = $latSW;
				$latNE_inner = rad2deg(atan(sinh($ySW+$heightGrid)));
				$lngSW_inner = $lngSW;
				$lngNE_inner = $lngSW_inner + $lngWidthGrid;
				$border=Yii::app()->controller->checkBorderMap($lngNE_inner);
				$totCount=0;
				$countTopPhotos=0;
				$photoTopArray;
				for($i=0; $i<$yGrid; $i++){
					for($k=0; $k<$xGrid; $k++){
						//$this->gspLog("info", "Start Elaboration cell ".$i."-".$k);
						$photoTopArray[$i][$k]['id']=null;
						$photoTopArray[$i][$k]['lat']=null;
						$photoTopArray[$i][$k]['lng']=null;
						$photoTopArray[$i][$k]['username']=null;
						$photoTopArray[$i][$k]['src']=null;
						
						if($border)
							$condition =
								'lat>'.$latSW_inner.' and lat<'.$latNE_inner.
								' and lng>'.$lngSW_inner.' or lng<'.$lngNE_inner;
						else
							$condition =
								'lat>'.$latSW_inner.' and lat<'.$latNE_inner.
								' and lng>'.$lngSW_inner.' and lng<'.$lngNE_inner;
						$criteria->condition=$condition;
						Yii::app()->controller->addCriteriaTop5(&$criteria);
						
						$nMarkers_inner=$maxMarkersInner;
						$criteria->limit=$nMarkers_inner;
						$productList=User::model()->findAll($criteria);
						$accept=1;
						$accepted=1; // NON FACCIO PIU' LA VERIFICA SULLA DISTANZA
						$photoProfile=0;
						
						//$this->gspLog("info", "Start Cycling nMarkers.");
						for($j=0; $j<count($productList); $j++){
							//Devo ricaricare il model perche' altrimenti non posso leggere il src del thumb
							//a causa della select che ho dovuto mettere nel criteria
							$productList[$j]=User::model()->findByPk($productList[$j]->idUser);
							if($productList[$j]->nPhotos>=1){
								if($accepted || !$photoProfile){
									if($photoTopArray[$i][$k]['id']!=null){
										if($totCount!=0)
											$json = $json.",";
										$json = $json."{\"id\":".$photoTopArray[$i][$k]['id'].
											",\"lng\":".(float)$photoTopArray[$i][$k]['lng'].
											",\"lat\":".(float)$photoTopArray[$i][$k]['lat'].
											",\"username\":\"".$photoTopArray[$i][$k]['username']."\"
											}";
										$totCount++;//=$totCount+$nMarkers_inner;
									}
									$photoTopArray[$i][$k]['id']=$productList[$j]->idUser;
									$photoTopArray[$i][$k]['lat']=$productList[$j]->lat;
									$photoTopArray[$i][$k]['lng']=$productList[$j]->lng;
									$photoTopArray[$i][$k]['username']=$productList[$j]->username;
									$photoTopArray[$i][$k]['src']=$productList[$j]->getPhotoUrl('circle');
									$accepted=0;
									$photoProfile=$productList[$j]->photoProfile;
								}else{
									if($totCount!=0)
										$json = $json.",";
									$json = $json."{\"id\":".$productList[$j]->idUser.
										",\"lng\":".(float)$productList[$j]->lng.
										",\"lat\":".(float)$productList[$j]->lat.
										",\"username\":\"".$productList[$j]->username."\"
										}";
									$totCount++;//=$totCount+$nMarkers_inner;
								}
							}
						}
						if($photoTopArray[$i][$k]['id']!=null){
							if($countTopPhotos!=0)
								$topPhotos = $topPhotos.",";
							$topPhotos=$topPhotos."{\"id\":".$photoTopArray[$i][$k]['id'].
								",\"lng\":".(float)$photoTopArray[$i][$k]['lng'].
								",\"lat\":".(float)$photoTopArray[$i][$k]['lat'].
								",\"username\":\"".$photoTopArray[$i][$k]['username']."\"".
								",\"src\":\"".$photoTopArray[$i][$k]['src']."\"
								}";
							$countTopPhotos++;
						}
						//$this->gspLog("info", "Stop Cycling nMarkers at j=".$j);
						//then update lng
						$lngSW_inner = $lngNE_inner;
						$lngNE_inner = $lngSW_inner + $lngWidthGrid;
						$border=Yii::app()->controller->checkBorderMap($lngNE_inner);
						
						//$this->gspLog("info", "End Elaboration cell ".$i."-".$k);
					}
					$latSW_inner = $latNE_inner;
					$latNE_inner = rad2deg(atan(sinh($ySW+($i+2)*$heightGrid)));
					$lngSW_inner = $lngSW;
					$lngNE_inner = $lngSW_inner + $lngWidthGrid;
					$border=Yii::app()->controller->checkBorderMap($lngNE_inner);
				}
			}else{
				if($countP==0){
					$totCount=0;
					$countTopPhotos=0;
				}else if($countP==1){
					$totCount=0;
					$countTopPhotos=1;
					$productList=User::model()->findAll($criteria);
					$topPhotos = "{\"id\":".$productList[0]->idUser.
						",\"lng\":".$productList[0]->lng.
						",\"lat\":".$productList[0]->lat.
						",\"src\":\"".$productList[0]->getPhotoUrl('circle')."\"".
						"}";
					$json='';
				}
			}
			$json = "{\"photos\":[".$json."],\"count\": ".$totCount.",
				\"topPhotos\":[".$topPhotos."],\"countTopPhotos\":".$countTopPhotos.
				", \"topFive\":[".$jsonTop5."],\"countTopFive\":".$totCounTop5.",\"offsetNext\":".$offsetNext.
			"}";
		}else{
			$json = "{\"errCode\":001}";
		}
		echo $json;
	}
	
	public function actionTopFive($latSW, $lngSW, $latNE, $lngNE, $orderBy="best", $offset=0){
		$criteria=Yii::app()->controller->createCriteriaTopMap($latSW, $lngSW, $latNE, $lngNE);
		Yii::app()->controller->addCriteriaTop5(&$criteria);
		$data=User::model()->findAll($criteria);
		
		$offset_pre=$offset-1;
		if(isset($data[$offset*5+5])){
			$offset_next=$offset+1;
		}else{
			$offset_next=null;
		}
		$data=array_slice($data, $offset*5, 5);
		for($i=0; $i<count($data); $i++){
			$data[$i]=User::model()->findByPk($data[$i]->idUser);
		}

		$this->renderPartial('topFive', array(
			'topten'=>$data,
			'offset_next'=>$offset_next,
			'offset_pre'=>$offset_pre,
			'orderBy'=>$orderBy
		), false, true);
	}

	public function actionTopFiveFast($id0=null, $id1=null, $id2=null, $id3=null, $id4=null, $offsetNext=0, $orderBy="best"){
		$arrayId=array($id0, $id1, $id2, $id3, $id4);
		for($i=0; $i<5; $i++){
			if($arrayId[$i]!=null){
				$data[$i]=User::model()->findByPk($arrayId[$i]);
			}
		}
		if($id0!=null){
			$this->renderPartial('topFive', array(
				'topten'=>$data,
				'offset_next'=>$offsetNext,
				'offset_pre'=>-1,
				'orderBy'=>$orderBy
			), false, true);
		}
	}

	/**
	 * Displays a particular model for Private View
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($username){
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/utility.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/utilAjaxDivUpdate.js', CClientScript::POS_HEAD);
		
		$criteria=new CDbCriteria;
		$criteria->condition="username='".$username."' and idUserStatus=2";
		$modelUser = User::model()->find($criteria);
		if($modelUser===null)
			throw new CHttpException(404,'User model does not exist #'.$username);
		//$modelUser=$this->loadModel($id);
		
		
		
		/*$this->gspLog("info", "START EQUIPMENTS");
		$equipments=array();
		for($i=0; $i<$nPhotos; $i++){
			foreach($modelUser->products[$i]->idProduct0->equipment as $eqpm)
				if(!in_array($eqpm->description, $equipments))
					array_push($equipments, $eqpm->description);
		}*/
		
		if($modelUser->idUser==Yii::app()->user->id){
			$viewhimself=true;
		}else{
			$viewhimself=false;
		}
		
		if(($modelUser->lat==null)||($modelUser->lng==null)){
			$lat="null";
			$lng="null";
		}else{
			$lat=$modelUser->lat;
			$lng=$modelUser->lng;
		}
		
		Yii::app()->controller->onloadFunctions="initializeMapSmallStatic($lat, $lng, 1, true); "
			.$modelUser->urlTopPhotosUser;
		
		$CVSummary_start="";
		$CVSummary_end="";
		if(isset($modelUser->photographer)){
			$maxCVstart=350;
			if(strlen($modelUser->photographer->CVSummary)>$maxCVstart){
				$CVSummary_start=substr($modelUser->photographer->CVSummary, 0, $maxCVstart);
				$CVSummary_end=substr($modelUser->photographer->CVSummary, $maxCVstart);
			}else{
				$CVSummary_start=$modelUser->photographer->CVSummary;
			}
		}
		
		$personalStatisticsThreshold = ConfParameters::model()->findByPk('PersonalStatisticsPhotoNumberThreshold')->value;
		$personalInfoThreshold = ConfParameters::model()->findByPk('PersonalInfoPhotoNumberThreshold')->value;
		$personalContactsThreshold = ConfParameters::model()->findByPk('PersonalContactsPhotoNumberThreshold')->value;


		$this->render('view',array(
			'modelUser'=>$modelUser,
			'viewhimself'=>$viewhimself,
			'CVSummary_start'=>$CVSummary_start,
			'CVSummary_end'=>$CVSummary_end,
			'personalStatisticsInfoThreshold'=>$personalStatisticsThreshold,
			'personalInfoThreshold'=>$personalInfoThreshold,
			'personalContactsThreshold'=>$personalContactsThreshold,
		));	
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($landing=false, $idRef=null, $codeRef=null, $coupon=null){
		if($landing)
			$this->layout='//layouts/deadEnd';
		
		$modelUser=new User('create');
		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($modelUser);
		if(isset($_POST['index_username'])){
			$modelUser->username=$_POST['index_username'];
		}elseif(isset($_POST['User'])){
			$transaction = Yii::app()->db->beginTransaction();
			try{				
				$util = new Util();
				$modelUser->attributes=$_POST['User'];
				//non so perché il seguente campo non viene preso tra tutti gli attributi
				if(isset($_POST['User']['idUserPanoramio']))
					$modelUser->idUserPanoramio=$_POST['User']['idUserPanoramio'];
				$modelUser->idUserStatus=1;//Pending
				$modelUser->idUserProfile=2;//User
				$modelUser->photoProfile=0;
				$modelUser->verificationCode = $util->getVerificationCode();
				//throw new CHttpException(404, $modelUser->idUserPanoramio."-".$modelUser->acceptTermsPanoramio);
			    if($modelUser->idUserPanoramio!=null && $modelUser->acceptTermsPanoramio){
				    if(isset(Yii::app()->request->cookies['code_ref'])){
						$codeRef=Yii::app()->request->cookies['code_ref']->value;
						if(md5("ref_user_".$modelUser->idUserPanoramio)==$codeRef){
							$modelUser->enablePanoramio=1;
						}
					}
			    }
				//$parameter = ConfParameters::model()->findByPk('DefaultFee');
				//$modelUser->fee =floatval($parameter->value);

				$parameter = ConfParameters::model()->findByPk('DefaultSubmitBonus');
				$modelUser->submitBonus=floatval($parameter->value);
				
				//TODO da cambiare non appena si sviluppa l'internazionalizzazione
				if(Yii::app()->language=='it_it' || Yii::app()->language=='it'){
					$modelUser->idLanguage='it';	
				}else{
					$modelUser->idLanguage='en';
				}
				
				if(!User::model()->exists('email=:email', array(':email'=>$modelUser->email))){
					if($modelUser->validate()){
						if(!$modelUser->save())
							throw new CHttpException(404,'User Save: something went wrong while saving user');
						if($modelUser->enablePanoramio){
							if($_POST['User']['acceptAddCategory']){
								$modelYDN = new YouDoNothing();
								$modelYDN->idUser=$modelUser->idUser;
								$modelYDN->nPhotos=500;
								$modelYDN->link1="Panoramio";
								$modelYDN->device="Panoramio";
								$modelYDN->acceptTerms=1;
								if(!$modelYDN->save())
									throw new CHttpException(404,'User Save: something went wrong while saving your approval condition.');
							}
						}
				
					    // Verify Coupon
						if(isset($_POST['Coupon'])){
							if($_POST['Coupon']!=''){
								$criteria=new CDbCriteria;
								$criteria->condition="code='".$_POST['Coupon']."'";
								$modelConfCoupon=ConfCoupon::model()->find($criteria);
								if(count($modelConfCoupon)==0)
									throw new CHttpException(404,'Sorry, your coupon is not valid.');
								$modelOwnCoupon = new OwnCoupon();
								$modelOwnCoupon->idUser=$modelUser->idUser;
								$modelOwnCoupon->idCoupon=$modelConfCoupon->idCoupon;
								if(!$modelOwnCoupon->save())
									throw new CHttpException(404,
										'Something went wrong while saving the coupon.');
							}
						}
							
						$message = new YiiMailMessage;
						$message->view = 'registrationFollowup';
						//userModel is passed to the view
						$message->setBody(array('modelUser'=>$modelUser), 'text/html');
						$message->addTo($modelUser->email);
						$message->setFrom(Yii::app()->params['no-replyEmail'],'GeoStockPhoto');
						$message->setSubject('GeoStockPhoto Account');
						//$message->name_from = "GeoStockPhoto";
					}else{
						$errors = $modelUser->getErrors();
						foreach($errors as $err){
							if($error_msg_int!="")
								$error_msg_int=$error_msg_int."<br>";
							$error_msg_int=$error_msg_int.$err[0];
						}
						$this->sendMail($error_msg_int);
						throw new CHttpException(404,'User Save: something went wrong while validating user');
					}
				}else{
					$this->render('createKO',array(
						'modelUser'=>$modelUser,
					));
					Yii::app()->end();
				}
				//$this->redirect(array('view','id'=>$modelUser->idUser));
			
				$transaction->commit();
				Yii::app()->mail->send($message);
				
				$this->render('createOK',array(
					'modelUser'=>$modelUser,
				));
				return;
			}
			catch(Exception $e){ // an exception is raised if a query fails
				$transaction->rollBack();
				throw new CHttpException(404,'Transaction error. '.$e->getMessage());
			}			
		}
			
		if($idRef!=null && $codeRef!=null){
			if(md5("ref_user_".$idRef)==$codeRef){
				$cookie = new CHttpCookie('id_ref', $idRef);
				$cookie->expire = time()+60*60*24*7; 
				Yii::app()->request->cookies['id_ref'] = $cookie;
				
				$cookie = new CHttpCookie('code_ref', $codeRef);
				$cookie->expire = time()+60*60*24*7; 
				Yii::app()->request->cookies['code_ref'] = $cookie;
				
				$modelUser->idUserPanoramio=$idRef;
			}
		}elseif(isset(Yii::app()->request->cookies['id_ref']) && isset(Yii::app()->request->cookies['code_ref'])){
			$idRef=Yii::app()->request->cookies['id_ref']->value;
			$codeRef=Yii::app()->request->cookies['code_ref']->value;
			if(md5("ref_user_".$idRef)==$codeRef){
				$modelUser->idUserPanoramio=$idRef;
			}
		}
		
		$modelOwnCoupon = new OwnCoupon();
		if($coupon!=null){
			$criteria=new CDbCriteria;
			$criteria->condition="code='".$coupon."'";
			if(!ConfCoupon::model()->exists($criteria))
				throw new CHttpException(404,'Sorry, your coupon is not valid.');
			$cookie = new CHttpCookie('coupon', $coupon);
			$cookie->expire = time()+60*60*24*7;
			Yii::app()->request->cookies['coupon'] = $cookie;
		}elseif(isset(Yii::app()->request->cookies['coupon'])){
			$coupon=Yii::app()->request->cookies['coupon']->value;
		}
		
		Yii::import('application.extensions.fbconnect.*'); 
		$appId = ConfParameters::model()->findByPk('FbAppId')->value;
		$secret = ConfParameters::model()->findByPk('FbSecret')->value;
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $secret,
		));
		
		Yii::app()->controller->onloadFunctions="js: $('#idCaptcha_button').click();";
		$this->render('create',array(
			'modelUser'=>$modelUser,
			'coupon'=>$coupon,
			'fbLoginUrl'=>$facebook->getLoginUrl(array('redirect_uri'=>Yii::app()->createAbsoluteUrl('/site/fbLogin'),'scope'=>'email')),
		));
	}

	/**
	 * Creates a new model providing data from FB.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionFbCreate(){ 		
		$modelUser=new User('fbCreate');
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($modelUser);
		
		Yii::import('application.extensions.fbconnect.*'); 
	
		$appId = ConfParameters::model()->findByPk('FbAppId')->value;
		$secret = ConfParameters::model()->findByPk('FbSecret')->value;
		
		$facebook = new Facebook(array(
		  'appId'  => $appId,
		  'secret' => $secret,
		));
		
		$user = $facebook->getUser();
		$user_profile = $facebook->api('/me');
		
		if(isset($_POST['User'])){
			//Salvere i dati 
			$modelUser=new User('fbCreate');
			$modelUser->attributes=$_POST['User'];
			//non so perché il seguente campo non viene preso tra tutti gli attributi
			if(isset($_POST['User']['idUserPanoramio']))
				$modelUser->idUserPanoramio=$_POST['User']['idUserPanoramio'];
		    $modelUser->password="fbpassword";
		    $modelUser->name=$user_profile['first_name'];
			$modelUser->surname=$user_profile['last_name'];
		    $modelUser->idUserStatus=2;//Actived
			$modelUser->idUserProfile=2;//User
			$modelUser->photoProfile=0;
		    $modelUser->verificationCode='fbUser';
		    if($modelUser->idUserPanoramio!=null && $modelUser->acceptTermsPanoramio)
		    	$modelUser->enablePanoramio=1;
   			//$parameter = ConfParameters::model()->findByPk('DefaultFee');
   			//$modelUser->fee =floatval($parameter->value);
			$parameter = ConfParameters::model()->findByPk('DefaultSubmitBonus');
			$modelUser->submitBonus =floatval($parameter->value);
			if($modelUser->idUserPanoramio!=null && $modelUser->acceptTermsPanoramio){
			    if(isset(Yii::app()->request->cookies['code_ref'])){
					$codeRef=Yii::app()->request->cookies['code_ref']->value;
					if(md5("ref_user_".$modelUser->idUserPanoramio)==$codeRef){
						$modelUser->enablePanoramio=1;
					}
				}
		    }
			
			$modelUser->fbUserId=$user_profile['id'];
			$sessionAccessToken = 'fb_'.$appId.'_access_token';
	   		$sessionCode= 'fb_'.$appId.'_code';
	   		$modelUser->fbAccessToken = $_SESSION[$sessionAccessToken];
	    	$modelUser->fbCode = $_SESSION[$sessionCode];
		       	
		    //TODO da cambiare non appena si sviluppa l'internazionalizzazione
			//Non sarebbe meglio prendere la lingua da Facebook piuttosto che dal browser? [Marco]
			if(Yii::app()->language=='it_it' || Yii::app()->language=='it'){
				$modelUser->idLanguage='it';	
			}else {
				$modelUser->idLanguage='en';
			}
			
			if($modelUser->save()){
				if($modelUser->enablePanoramio){
					if($_POST['User']['acceptAddCategory']){
						$modelYDN = new YouDoNothing();
						$modelYDN->idUser=$modelUser->idUser;
						$modelYDN->nPhotos=500;
						$modelYDN->link1="Panoramio";
						$modelYDN->device="Panoramio";
						$modelYDN->acceptTerms=1;
						if(!$modelYDN->save())
							throw new CHttpException(404,'User Save: something went wrong while saving your approval condition.');
					}
				}
				
				$message = new YiiMailMessage;
				$message->view = 'fbRegistrationConfirm';
				//userModel is passed to the view
				$message->setBody(array('modelUser'=>$modelUser), 'text/html');
				 
				$message->addTo($modelUser->email);
				$message->setFrom(Yii::app()->params['no-replyEmail'],'GeoStockPhoto');
				$message->setSubject('GeoStockPhoto Account');
				//$message->name_from = "GeoStockPhoto";
				Yii::app()->mail->send($message);
			}else{
				$this->sendMail(print_r($modelUser->getErrors()));
				throw new CHttpException(404,'User Save: something went wrong while saving user');
			}
			// $this->redirect(array('view','id'=>$modelUser->idUser));
			
			$identity = new UserIdentity(null,null,null,$modelUser->fbUserId);
			$identity->authenticateFbUser();
			$duration = 3600*24*30; // 30 days
			Yii::app()->user->login($identity,$duration);
			Yii::app()->user->setSecureSessionId();
			$this->redirect(Yii::app()->homeUrl);			
		}else{
			if($user){
			  	try{
				    // Proceed knowing you have a logged in user who's authenticated.
				    $modelUser=new User('fbCreate');
				    $modelUser->email=$user_profile['email'];
				    $modelUser->username=isset($user_profile['username'])? $user_profile['username'] : "";
			  	}catch (FacebookApiException $f) {
				    error_log($f);
				    $user = null;
			  	}catch(Exception $e){ // an exception is raised if a query fails
					throw new CHttpException(404,'Transaction error.'.$e);
		  		}
			  
 				$this->render('fbCreate',array(
					'modelUser'=>$modelUser,
				));
			}else{
				$user_profile=null;
				$this->redirect(Yii::app()->homeUrl);			
			}
		}
	}
	
	public function actionVerification($idUser, $vc)
	{
		$modelUser=$this->loadModel($idUser);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$result=false;
		$yetVerified=false;
		
		
		if ($modelUser->verificationCode==$vc && $modelUser->idUserStatus==1){
			$transaction = Yii::app()->db->beginTransaction();
			try{				
				$modelUser->idUserStatus=2;//Actived
				if($modelUser->save())
					$result=true;
				
				$transaction->commit();
			}
			catch(Exception $e){ // an exception is raised if a query fails
				$transaction->rollBack();
				throw new CHttpException(404,'Transaction error.');
			}
			
		}else{
			$yetVerified=true;
		}

		$this->render('verification',array(
			'model'=>$modelUser,
			'result'=>$result,
			'yetVerified'=>$yetVerified
		));
	}
	
	public function actionPromotion($promotion){
		$promotionExist=false;
		$promotionAlreadyActive=false;
		$promotionOwner=false;
		$countUsers=0;
		$countPhotos=0;
		
		$criteria=new CDbCriteria;
		$criteria->condition="name='".$promotion."'";
		$modelPromotion = ConfPromotions::model()->find($criteria);
		
		//Verify if promotion exist
		if(count($modelPromotion)!=0){
			$promotionExist=true;
			if(Yii::app()->user->id==$modelPromotion->idUserAdmin || Yii::app()->user->isAdministrator()){
				$promotionOwner=true;
				$countUsers=count($modelPromotion->tblUsers);
				for($i=0; $i<count($modelPromotion->tblUsers); $i++){
					$countPhotos=$countPhotos+count($modelPromotion->tblUsers[$i]->products);
				}
			}elseif(!$modelPromotion->isReserved){
				$criteria=new CDbCriteria;
				$criteria->condition="idUser='".Yii::app()->user->id."' and idPromotion='".$modelPromotion->idPromotion."'";
				if(OwnUserPromotions::model()->Exists($criteria)){
					$promotionAlreadyActive=true;
				}else{
					$transaction = Yii::app()->db->beginTransaction();
					try{
						$modelOwnUserPromotions = new OwnUserPromotions();
						$modelOwnUserPromotions->idUser = Yii::app()->user->id;
						$modelOwnUserPromotions->idPromotion=$modelPromotion->idPromotion;
						$startTimestamp=Yii::app()->dateFormatter->format('yyyy/MM/dd hh:mm:ss', time());
						$endTimestamp=Yii::app()->dateFormatter->format('yyyy/MM/dd hh:mm:ss', time()+ $modelPromotion->duration*86400);  //Espresso in giorni
						$modelOwnUserPromotions->start_timestamp = $startTimestamp.".000";
						$modelOwnUserPromotions->end_timestamp = $endTimestamp.".000";
						
						if(!$modelOwnUserPromotions->save()) // Save new promotion
							throw new CHttpException(404,'User Promotion : error while saving the OwnUserPromotion');
							
						$transaction->commit();
					}catch(Exception $e){
						$transaction->rollBack();
						throw $e;
					}
				}
			}else{
				throw new CHttpException(404,'User Promotion : the requested promotion is reserved.');
			}
			$this->render('promotion',array(
				'promotionExist'=>$promotionExist,
				'promotion'=>$promotion,
				'promotionAlreadyActive'=>$promotionAlreadyActive,
				'promotionOwner'=>$promotionOwner,
				'countUsers'=>$countUsers,
				'countPhotos'=>$countPhotos
			));
		}else{
			throw new CHttpException(404,'User Promotion : the requested promotion does not exist.');
		}
	}
	
	// START GROUP ACTIONS
	public function actionCreateGroup(){
		//$this->layout='//layouts/deadEnd';
	
		if(Yii::app()->user->isGuest){
			Yii::import('application.extensions.fbconnect.*'); 
	
			$appId = ConfParameters::model()->findByPk('FbAppId')->value;
			$secret = ConfParameters::model()->findByPk('FbSecret')->value;
			
			$facebook = new Facebook(array(
			  'appId'  => $appId,
			  'secret' => $secret,
			));
			
			$this->render('create_group',
				array('fbLoginUrl'=>$facebook->getLoginUrl(
					array('redirect_uri'=>Yii::app()->createAbsoluteUrl('/site/fbLogin'),'scope'=>'email'))
				)
			);
		}else{
			$cs=Yii::app()->clientScript;
			$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/multi_sel.js', CClientScript::POS_HEAD);
			$modelGroup = new ConfGroups();
			$this->render('create_group',array(
				'modelGroup'=>$modelGroup
			));
		}
	}
	
	public function actionAjaxCreateGroup(){
		if(!isset($_POST['ConfGroups']))
			throw new CHttpException(404, 'Create Group: something went wrong while retrieving the group informations.');
		$status=1;
		$error_msg="";
		
		$modelGroup = new ConfGroups();
		$modelGroup->name=$_POST['ConfGroups']['name'];
		$modelGroup->isReserved=$_POST['ConfGroups']['isReserved'];
		$modelGroup->acceptTerms=$_POST['ConfGroups']['acceptTerms'];
		$modelGroup->idUserAdmin=Yii::app()->user->id;
		$modelGroup->photoProfile=0;
		$modelGroup->commission=0;
		
		if($modelGroup->validate()){
			if(!$modelGroup->save())
				throw new CHttpException(404, 'Create Group: something went wrong while saving the group informations.');
		}else{
			$errors = $modelGroup->getErrors();
			foreach($errors as $err){
				if($error_msg!="")
					$error_msg=$error_msg."<br>";
				$error_msg=$error_msg.$err[0];
			}
			$status=0;
		}
		
		$arr = array(
			'status'=>$status,
			'error_msg'=>$error_msg
		);
		echo json_encode($arr);
	}
	
	public function actionGroups($group, $vc=null){
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/utilAjaxDivUpdate.js', CClientScript::POS_HEAD);
		
		$criteria=new CDbCriteria;
		$criteria->condition="name='".$group."'";
		$modelGroup = ConfGroups::model()->find($criteria);
		if($modelGroup===null)
			throw new CHttpException(404,'Group '.$group.' does not exist.');
			
		if($modelGroup->enable==0)
			throw new CHttpException(404,'Group '.$group.' has not been enable yet.');
		
		if($vc!=null){
			$cookie = new CHttpCookie('vc_group', $vc);
			$cookie->expire = time()+60*60*24*7; 
			Yii::app()->request->cookies['vc_group'] = $cookie;
		}else{
			if(isset(Yii::app()->request->cookies['vc_group']))
				$vc=Yii::app()->request->cookies['vc_group']->value;
		}
		if($modelGroup->verificationCode==$vc)
			$verified=true;
		else 
			$verified=false;
		
		$alreadyRegistered=false;
		if(!Yii::app()->user->isGuest){
			$criteria->condition="idUser=".Yii::app()->user->id." and idGroup=".$modelGroup->idGroup;
			if(UserGroups::model()->Exists($criteria))
				$alreadyRegistered=true;
		}
		
		if($modelGroup->idUserAdmin==Yii::app()->user->id){
			$isAdmin=true;
		}else{
			$isAdmin=false;
		}
		
		if(($modelGroup->lat==null)||($modelGroup->lng==null)){
			$lat="null";
			$lng="null";
		}else{
			$lat=$modelGroup->lat;
			$lng=$modelGroup->lng;
		}
				
		Yii::app()->controller->onloadFunctions="initializeMapSmallStatic($lat, $lng, 1, true)";
		
		$CVSummary_start="";
		$CVSummary_end="";
		/*if(isset($modelUser->photographer)){
			$maxCVstart=350;
			if(strlen($modelUser->photographer->CVSummary)>$maxCVstart){
				$CVSummary_start=substr($modelUser->photographer->CVSummary, 0, $maxCVstart);
				$CVSummary_end=substr($modelUser->photographer->CVSummary, $maxCVstart);
			}else{
				$CVSummary_start=$modelUser->photographer->CVSummary;
			}
		}*/
		
		$this->render('view_group',array(
			'modelGroup'=>$modelGroup,
			'isAdmin'=>$isAdmin,
			'alreadyRegistered'=>$alreadyRegistered,
			'CVSummary_start'=>$CVSummary_start,
			'CVSummary_end'=>$CVSummary_end,
			'verified'=>$verified
		));
	}

	public function actionJoin_group($idGroup){
		$criteria = new CDbCriteria;
		$criteria->condition="idUser=".Yii::app()->user->id." and idGroup=".$idGroup;
		if(UserGroups::model()->Exists($criteria))
			throw new CHttpException(404, 'Join Group: you are already registered in this group.');
			
		$criteria->condition="idGroup=".$idGroup;
		$modelGroup=ConfGroups::model()->find($criteria);
			
		if($modelGroup->enable==0)
			throw new CHttpException(404,'Group '.$group.' has not been enable yet.');
		
		$verified=false;
		if(isset(Yii::app()->request->cookies['vc_group'])){
			if(Yii::app()->request->cookies['vc_group']->value==$modelGroup->verificationCode)
				$verified=true;
		}
		
		if($modelGroup->idUserAdmin==Yii::app()->user->id)
			throw new CHttpException(404, 'Join Group: you cannot join this group because you are the administrator.');
		
		if($modelGroup->isReserved && !$verified)
			throw new CHttpException(404, 'Join Group: you cannot join this group because is reserved.');
			
		$modelUser=$this->loadModel(Yii::app()->user->id);
		$timeWindow = time() - floatval(60*60*24*7); // 7 days before
		$timeWindow = Yii::app()->dateFormatter->format('yyyy-MM-dd HH:mm:ss', $timeWindow).".000";
		//echo $timeWindow."<br>";
		//echo $modelUser->insert_timestamp;
		if($modelUser->insert_timestamp>=$timeWindow){
			$newUser=true;
		}else 
			$newUser=false;
		
		$criteria = new CDbCriteria;
		$criteria->condition="idUser=".Yii::app()->user->id;
		/* Le 3 condizioni per dare le commissioni agli amministratori sono
		 * 1) che non faccia già parte di un altro gruppo
		 * 2) che abbia ricevuto il codice di verifica
		 * 3) che sia un nuovo utente
		 */
		if(!UserGroups::model()->Exists($criteria) && $verified && $newUser)
			$flagGroupCommission=1;
		else 
			$flagGroupCommission=0;
		
		$modelUserGroups=new UserGroups();
		$modelUserGroups->idUser=Yii::app()->user->id;
		$modelUserGroups->idGroup=$idGroup;
		$modelUserGroups->flagGroupCommission=$flagGroupCommission;
		if(!$modelUserGroups->save())
			throw new CHttpException(404, 'Join Group: something went wrong while saving your request.');
			
		$this->redirect(array('user/groups', 'group'=>$modelGroup->name));
	}

	public function actionLeave_group($idGroup){
		$criteria = new CDbCriteria;
		$criteria->condition="idUser=".Yii::app()->user->id." and idGroup=".$idGroup;
		$modelUserGroups=UserGroups::model()->find($criteria);
		
		if($modelUserGroups==null)
			throw new CHttpException(404, 'Leave Group: you are not registered in this group.');
		
		if(!$modelUserGroups->delete())
			throw new CHttpException(404, 'Leave Group: something went wrong while deleting your record in this group.');
			
		$this->redirect(array('user/groups', 'group'=>$modelUserGroups->group->name));
	}
	
	public function actionModify_group($idGroup){
		$criteria = new CDbCriteria;
		$criteria->condition="idGroup=".$idGroup;
		$modelGroup=ConfGroups::model()->find($criteria);
			
		if($modelGroup->enable==0)
			throw new CHttpException(404,'Group '.$group.' has not been enable yet.');
		
		if($modelGroup->idUserAdmin!=Yii::app()->user->id)
			throw new CHttpException(404, 'Modify Group: you are not the administrator of this group.');
			
		$lat=$modelGroup->lat;
		$lng=$modelGroup->lng;
		if($lat=="" || $lng==""){
			$lat="null";
			$lng="null";
		}
		
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile('https://maps-api-ssl.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/utility.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/multi_sel.js', CClientScript::POS_HEAD);

		if((Yii::app()->controller->onloadFunctions="initializeMapSmallPhotographer($lat, $lng, 1)")!=0)
			throw new CHttpException(404,'Modify Group: something went wrong while loading the map.');
		
		$this->render('modify_group',array('modelGroup'=>$modelGroup));
	}

	public function actionAjaxSaveModify_group($idGroup){
		$modelUser=$this->loadModel(Yii::app()->user->id);
		if(!$modelUser->verifySessionIdSecure()){
			throw new CHttpException(404, 'AjaxSaveModify_group: you are not authorized to perform this action.');
		}
		
		if(!isset($_POST['ConfGroups']))
			throw new CHttpException(404, 'AjaxSaveModify_group: something went wrong while retrieving the group informations.');
		$status=1;
		$error_msg="";
		$transaction = Yii::app()->db->beginTransaction();
		try{
			Yii::app()->controller->saveGroup($idGroup);
			$transaction->commit();
		}catch(Exception $e){
			$transaction->rollBack();
			$status=0;
			$error_msg=$e->getMessage();
		}
			
		$arr = array(
			'status'=>$status,
			'error_msg'=>$error_msg
		);
		echo json_encode($arr);
	}
	
	private function saveGroup($idGroup){
		$criteria = new CDbCriteria;
		$criteria->condition="idGroup=".$idGroup;
		$modelGroup=ConfGroups::model()->find($criteria);
			
		if($modelGroup->enable==0)
			throw new CHttpException(404,'Group '.$group.' has not been enable yet.');
		
		if($modelGroup->idUserAdmin!=Yii::app()->user->id)
			throw new CHttpException(404, 'Modify Group: you are not the administrator of this group.');

		if($_POST['ConfGroups']['name']!="")
			$modelGroup->name=$_POST['ConfGroups']['name'];
		if($_POST['ConfGroups']['town']!="")
			$modelGroup->town=$_POST['ConfGroups']['town'];
		if($_POST['ConfGroups']['country']!="")
			$modelGroup->country=$_POST['ConfGroups']['country'];
		if($_POST['ConfGroups']['lat']!="")
			$modelGroup->lat=$_POST['ConfGroups']['lat'];
		if($_POST['ConfGroups']['lng']!="")
			$modelGroup->lng=$_POST['ConfGroups']['lng'];
		if($_POST['ConfGroups']['description']!="")
			$modelGroup->description=$_POST['ConfGroups']['description'];
		
		if($modelGroup->validate()){
			if(!$modelGroup->save())
				throw new CHttpException(404, 'Save group: something went wrong while saving the group info.');
		}else{
			$error_msg="";
			$errors = $modelGroup->getErrors();
			foreach($errors as $err){
				if($error_msg!="")
					$error_msg=$error_msg."<br>";
				$error_msg=$error_msg.$err[0];
			}
			throw new CHttpException(404, $error_msg);	
		}
	}
	
	public function actionSavePhotoGroup($idGroup){
		if(!isset($_POST['ConfGroups']))
			throw new CHttpException(404, 'Save Group Photo Profile: something went wrong while retrieving the group informations.');
			
		$transaction = Yii::app()->db->beginTransaction();
		try{
			Yii::app()->controller->savePhoto_group($idGroup);
			$transaction->commit();
		}catch(Exception $e){
			$transaction->rollBack();
			throw $e;
		}
		$this->redirect(array('user/modify_group', 'idGroup'=>$idGroup));
	}
	
	private function savePhoto_group($idGroup){
		$criteria = new CDbCriteria;
		$criteria->condition="idGroup=".$idGroup;
		$modelGroup=ConfGroups::model()->find($criteria);
			
		if($modelGroup->enable==0)
			throw new CHttpException(404,'Group '.$group.' has not been enable yet.');
		
		if($modelGroup->idUserAdmin!=Yii::app()->user->id)
			throw new CHttpException(404, 'Modify Group: you are not the administrator of this group.');
			
		$img = CUploadedFile::getInstanceByName('ConfGroups[imageProfile]');
		$file=$img->tempName;
		list($width, $height) = getimagesize($file, $info);
		
		if($width<300 || $height<300)
			throw new CHttpException(404,'Save Group: your photo is less than 300x300 pixel.');
		$tmb=Yii::app()->imagemod->load($file);
		if(!isset($tmb))
			throw new CHttpException(404,'Save Group: something went wrong while loading the group photo profile.');
		$tmb->image_ratio = true;
		$tmb->image_resize = true;
		$tmb->image_x = 300;
		$tmb->image_y = 300;
		$tmb->file_overwrite = true;
		$tmb->file_new_name_body = $idGroup;
		$tmb->file_new_name_ext = 'jpg';
		
		if(Yii::app()->params['useBlob'] && !Yii::app()->params['useStorageEmulator']){
		   	$content=$tmb->process();
		}else{
		   	$tmb->process('./images/groups');
		}
		if(!$tmb->processed)
			throw new CHttpException(404,'Save group: '.$tmb->error);
		if(Yii::app()->params['useBlob'] && !Yii::app()->params['useStorageEmulator']){
			$blobStorageClient=$this->createUserBlobClient();
		   	$blobStorageClient->putBlobData(
	        	'groups',
	        	$idGroup.'.jpg',
	        	$content
			);
			$tmb->clean();
		}
		
		$modelGroup->photoProfile=1;
		if(!$modelGroup->save())
			throw new CHttpException(404, 'Save Group: something went wrong while saving the group photo information.');
	}
	// END GROUP ACTIONS
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 
	 * TODO: AG in case of update, if the password is empty probably we do not want to override it!
	 * */
	public $user;
	public $idPhotoType;
	public function actionModify(){
		$this->pageName="User Modify";
		$modelUser=$this->loadModel(Yii::app()->user->id);
		if(!$modelUser->verifySessionIdSecure()){
			throw new CHttpException(404, 'User modify: you are not authorized to perform this action.');
		}
		
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/shoppingOpt_sel.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile('https://maps-api-ssl.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/utility.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/controller/photo/multi_sel.js', CClientScript::POS_HEAD);
		
		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($modelUser);
		//$oldPassword= $modelUser->password;
		
		$lat=$modelUser->lat;
		$lng=$modelUser->lng;
		if($lat=="" || $lng==""){
			$lat="null";
			$lng="null";
		}

		if((Yii::app()->controller->onloadFunctions="initializeMapSmallPhotographer($lat, $lng, 1)")!=0)
			throw new CHttpException(404,'Modify User: something went wrong while loading the map.');

		// *************************************************************
		// SHOPPING OPTIONS MANAGER
		if($modelUser->preferredLicenseType!=null){
			$shoppingOptMan=new ShoppingOptManager();
			$shoppingOptMan->setClass('ShoppingOptUserDefaultRf');
			if(isset($modelUser->shoppingOptUserDefaultRf)){
				for($i=0; $i<count($modelUser->shoppingOptUserDefaultRf); $i++){
					$shoppingOptMan->putItems($modelUser->shoppingOptUserDefaultRf[$i]);
				}
			}else{
				throw new CHttpException(404, 'Edit photo: something went wrong while retrieving the shopping options RF.');
			}
	
			$shoppingOptManRm=new ShoppingOptManager();
			$shoppingOptManRm->setClass('ShoppingOptUserDefaultRm');
			if(isset($modelUser->shoppingOptUserDefaultRm)){
				for($i=0; $i<count($modelUser->shoppingOptUserDefaultRm); $i++){
					$shoppingOptManRm->putItems($modelUser->shoppingOptUserDefaultRm[$i]);
				}
			}else{
				throw new CHttpException(404, 'Edit photo: something went wrong while retrieving the shopping options RM.');
			}
		}else{
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
			
			$modelUser->preferredLicenseType="RF";
		}
		// END SHOPPING OPTIONS MANAGER
		// *************************************************************


		// *************************************************************
		// PERSONAL CONTACTS MANAGER
			$personalContactsManager=new PersonalContactsManager();
			$personalContactsManager->setClass('PersonalContactsManager');

			if(isset($modelUser->ownUserContacts)){
				for($i=0; $i<count($modelUser->ownUserContacts); $i++){
					$personalContactsManager->putItems($modelUser->ownUserContacts[$i]);
				}
			}
	
		// END PERSONAL CONTACTS MANAGER
		// *************************************************************

		$modelProductPp->shoppingPhotoType->licenseType=$modelUser->preferredLicenseType;
		$modelProductPp->shoppingPhotoType->shoppingOptPhotos="";
		$modelProductPp->shoppingPhotoType->shoppingOptPhotosRm="";
		
		$personalStatisticsThreshold = ConfParameters::model()->findByPk('PersonalStatisticsPhotoNumberThreshold')->value;
		$personalInfoThreshold = ConfParameters::model()->findByPk('PersonalInfoPhotoNumberThreshold')->value;
		$personalContactsThreshold = ConfParameters::model()->findByPk('PersonalContactsPhotoNumberThreshold')->value;

		$this->render('modify',array(
			'modelUser'=>$modelUser,
			'modelProductPp'=>$modelProductPp,
            'shoppingOptMan'=>$shoppingOptMan,
            'shoppingOptManRm'=>$shoppingOptManRm,
            'personalContactsManager'=>$personalContactsManager,
            'personalStatisticsThreshold'=>$personalStatisticsThreshold,
			'personalInfoThreshold'=>$personalInfoThreshold,
			'personalContactsThreshold'=>$personalContactsThreshold,
		));
	}
	
	public function actionSavePhotoProfile(){
		if(!isset($_POST['User']))
			throw new CHttpException(404, 'Save User Photo Profile: something went wrong while retrieving the user informations.');
		//if(!isset($_POST['User[imageProfile]']))
			//throw new CHttpException(404, 'Save User: something went wrong while retrieving the user photo.');

		$img = CUploadedFile::getInstanceByName('User[imageProfile]');
		if(!isset($img))
			throw new CHttpException(404, 'Save User Photo Profile: something went wrong while retrieving the photo informations.');		

		$transaction = Yii::app()->db->beginTransaction();
		try{
			$modelUser=$this->loadModel(Yii::app()->user->id);
			$img = CUploadedFile::getInstanceByName('User[imageProfile]');
			$file=$img->tempName;
			$retSaveUser = $modelUser->saveUploadedPhoto($file);
			if($retSaveUser==0){
				if(!$modelUser->verifySessionIdSecure()){
					throw new CHttpException(404, 'Save User: you are not authorized to perform this action.');
				}
				$modelUser->photoProfile=1;
				if(!$modelUser->save())
					throw new CHttpException(404, 'Save User: something went wrong while saving the user photo information.');
				$transaction->commit();
			}else
				throw new CHttpException(404, 'Save User: something went wrong while saving the user #'.Yii::app()->user->id);
		}catch(Exception $e){
			$transaction->rollBack();
			throw $e;
		}
		$this->redirect(array('user/modify'));
	}

	public function actionDeletePhotoProfile(){
		//Cancellare il file della foto
		$modelUser=$this->loadModel(Yii::app()->user->id);
		if(!$modelUser->verifySessionIdSecure()){
			throw new CHttpException(404, 'Delete Photo Profile: you are not authorized to perform this action.');
		}

		$transaction = Yii::app()->db->beginTransaction();
		try{
			$modelUser->photoProfile=0;
			if(!$modelUser->save())
				throw new CHttpException(404, 'Delete Photo Profile: something went wrong while saving the user #'.$modelUser->idUser);

			if(Yii::app()->params['useBlob'] && !Yii::app()->params['useStorageEmulator']){
				$blobStorageClient=$this->createUserBlobClient();
			   	$blobStorageClient->deleteBlob(
		        	'users',
		        	Yii::app()->user->id.'.jpg',	        	
		        	null
				);			
			}else{
				unlink("./images/users/".Yii::app()->user->id.'.jpg');
			}
			$transaction->commit();
		}catch(Exception $e){
			$transaction->rollBack();
			throw $e;
		}

		$this->redirect(array('user/modify'));
	}

	public function actionAjaxSaveModify(){
		if(!isset($_POST['User']))
			throw new CHttpException(404, 'Save User: something went wrong while retrieving the user informations.');
		$status=1;
		$error_msg="";
		$transaction = Yii::app()->db->beginTransaction();
		try{
			if(Yii::app()->controller->saveShoppingOptUserDefault(Yii::app()->user->id)!=0)
				throw new CHttpException(404, 'Save Shopping Opt User Default: something went wrong while saving the user #'.Yii::app()->user->id);
			
			if(Yii::app()->controller->savePersonalContacts(Yii::app()->user->id)!=0)
				throw new CHttpException(404, 'Save Personal Contacts: something went wrong while saving the user #'.Yii::app()->user->id);
			

			$retSaveUser =  Yii::app()->controller->saveUser();
			
			if($retSaveUser==0){
				$transaction->commit();
			}
			else if(($retSaveUser==2)||($retSaveUser==3)||($retSaveUser==5)){
				$transaction->commit();
				
				$changeEmail=false;
				$changePassword=false;
				if($retSaveUser==2)
					$changeEmail=true;
				if($retSaveUser==3)
					$changePassword=true;
				if($retSaveUser==5){
					$changeEmail=true;
					$changePassword=true;
				}
					
				$modelUser=$this->loadModel(Yii::app()->user->id);
				if(!$modelUser->verifySessionIdSecure()){
					throw new CHttpException(404, 'Save User: you are not authorized to perform this action.');
				}
				$message = new YiiMailMessage;
				$message->view = 'changeModified';
				$message->setBody(array('modelUser'=>$modelUser, 'changeEmail'=>$changeEmail, 'changePassword'=>$changePassword), 'text/html');
				$message->addTo($modelUser->email);
				$message->setFrom(Yii::app()->params['no-replyEmail'],'GeoStockPhoto');
				$message->setSubject('GeoStockPhoto modify account');
				Yii::app()->mail->send($message);
			}else
				throw new CHttpException(404, 'Save User: something went wrong while saving the user #'.Yii::app()->user->id);
		}catch(Exception $e){
			$transaction->rollBack();
			$status=0;
			$error_msg=$e->getMessage();
		}
			
		$arr = array(
			'status'=>$status,
			'error_msg'=>$error_msg
		);
		echo json_encode($arr);
	}

	private function createUserBlobClient(){
		$blobStorageClient = new Microsoft_WindowsAzure_Storage_Blob(
			'blob.core.windows.net',
			STORAGE_ACCOUNT_NAME,
			STORAGE_ACCOUNT_KEY
		);
		return $blobStorageClient;
	}

	//Ricreare tutti i thumb circolari degli utenti
	public function actionUpdatePhotoUsers(){
		$criteria=new CDbCriteria;
		$criteria->condition='photoProfile=1';
		$data=User::model()->findAll($criteria);
		for($i=0; $i<count($data); $i++){
			$photoPath=$data[$i]->readBlobPath('users', $data[$i]->idUser.'.jpg');
			//$data[$i]->saveUserCircleThumb($photoPath, $data[$i]->idUser);
			$tmb=Yii::app()->imagemod->load($photoPath);
			if(!isset($tmb))
				throw new CHttpException(404,'Save user: something went wrong while loading the user photo profile.');
			$data[$i]->saveThumb($tmb, 120, $data[$i]->idUser);
		}
	}
	
	private function saveUser(){
		$idUser=Yii::app()->user->id;
		$ret=0;
		$modelUser=$this->loadModel($idUser);
		$modelUserPre=$this->loadModel($idUser);				
		
		$changeEmail=false;
		$changePassword=false;
		if($modelUser->idUser!=Yii::app()->user->id)
			throw new CHttpException(404, 'Save user: the user #'.$idUser.' is not present.');

		if(isset($_POST['User']['email']) && ($_POST['User']['email']!="")){
			$modelUser->email=$_POST['User']['email'];
			if(isset($_POST['User']['email_repeat']) && ($_POST['User']['email_repeat']!="")){
				$modelUser->email_repeat=$_POST['User']['email_repeat'];
				$changeEmail=true;				
			}
		}
		if($_POST['User']['name']!="")
			$modelUser->name=$_POST['User']['name'];
		if($_POST['User']['surname']!="")
			$modelUser->surname=$_POST['User']['surname'];
		if($_POST['User']['town']!="")
			$modelUser->town=$_POST['User']['town'];
		if($_POST['User']['country']!="")
			$modelUser->country=$_POST['User']['country'];
		if($_POST['User']['lat']!="")
			$modelUser->lat=$_POST['User']['lat'];
		else
			$modelUser->lat=null;
		if($_POST['User']['lng']!="")
			$modelUser->lng=$_POST['User']['lng'];
		else
			$modelUser->lng=null;
		if($_POST['User']['birthdate']!=""){
			$parse=CDateTimeParser::parse(
				$_POST['User']['birthdate'],
				'dd/MM/yyyy'
            );
			if($parse){
				$modelUser->birthdate=Yii::app()->dateFormatter->format(
					'yyyy-MM-dd',
					$parse
				);
			}else 
				throw new CHttpException(404, 'Save user: something went wrong while parsing your birthdate. It must be in the format dd/mm/yyyy.');
		}
		
		if($_POST['User']['oldclearpassword']!="")
			$modelUser->oldclearpassword=$_POST['User']['oldclearpassword'];
		if($_POST['User']['clearpassword']!="")
			$modelUser->clearpassword=$_POST['User']['clearpassword'];
		if($_POST['User']['clearpassword_repeat']!=""){
			$modelUser->clearpassword_repeat=$_POST['User']['clearpassword_repeat'];
			$changePassword=true;
		}
		
		//TODO
			if(isset($_POST['OwnUserContacts'])){
				$modelUser->photographer->CVSummary=$_POST['Photographer']['CVSummary'];
				if(!$modelUser->photographer->save())
					throw new CHttpException(404, 'Save photographer: something went wrong while saving the photographer #'.$modelUserNew->idUser);
			}


		if(isset($_POST['Photographer'])){
			$modelUser->photographer->CVSummary=$_POST['Photographer']['CVSummary'];
			if(!$modelUser->photographer->save())
				throw new CHttpException(404, 'Save photographer: something went wrong while saving the photographer #'.$modelUserNew->idUser);
		}
					
		if($changeEmail && $changePassword){
			$modelUser->setScenario('modify');	
		}else if($changeEmail){
			$modelUser->setScenario('modifyChangeEmail');
		}else if($changePassword){
			$modelUser->setScenario('modifyChangePassword');
		}
		
		if($modelUser->validate()){
			if($modelUser->email!=$modelUserPre->email){
				$ret+=2;
				$modelUser->idUserStatus=1; //Pending
				$util = new Util();
				$modelUser->verificationCode = $util->getVerificationCode();
			}
			if($modelUser->clearpassword_repeat!="")
				$ret+=3;
			if(!$modelUser->save())
				throw new CHttpException(404, 'Save user: something went wrong while saving the user #'.$modelUserNew->idUser);

			return $ret;
		}else{
			$error_msg="";
			$errors = $modelUser->getErrors();
			foreach($errors as $err){
				if($error_msg!="")
					$error_msg=$error_msg."<br>";
				$error_msg=$error_msg.$err[0];
			}

			throw new CHttpException(404, $error_msg);	
		}
	}
	
	/**
	 * Delete a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionRemove($id){
		$vect=array();
		
		if(Yii::app()->user->id==$id){
			$transaction = Yii::app()->db->beginTransaction();
			try{
				//Modifico lo userStatus a 'Deleted'
				$modelUser = $this->loadModel($id);
				if(!$modelUser->verifySessionIdSecure()){
					throw new CHttpException(404, 'Save User: you are not authorized to perform this action.');
				}
				$modelUser->idUserStatus=4;
			
				if($modelUser->remove()!=0)
					throw new CHttpException(404, 'Remove user: something went wrong during the process.');

				if(!$modelUser->save())
					throw new CHttpException(400,'Is not possible to remove the profile');
			
				$transaction->commit();
			}catch(Exception $e){
				$transaction->rollBack();
				throw $e;
			}
			
			Yii::app()->user->logout();		
			
			if($modelUser->save()){
				$this->render('remove',array(
				'modelUser'=>$modelUser,
				//'vect'=>$vect,
				));
			}	
		}else
			throw new CHttpException(404,'Delete user: This is not your profile. You cannot delete it.');
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionResetpwask(){
		$modelUser=new User('resetpwask');

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($modelUser);
		$modelUser->setScenario('');
		if(isset($_POST['User'])){
			$transaction = Yii::app()->db->beginTransaction();
			try{
				$util = new Util();
				
				$modelUser = User::model()->find('email=:email', array(':email'=>$_POST['User']['email']));
				/*if(!$modelUser->verifySessionIdSecure()){
					throw new CHttpException(404, 'Save User: you are not authorized to perform this action.');
				}*/
		    
			   	// if(User::model()->exists('fb_user_id=:fbUserId', array(':fbUserId'=>$fbUserId))){
			   	if($modelUser!=null){
				
					$modelUser->verificationCode = $util->getVerificationCode();
					if(!$modelUser->save())
						throw new CHttpException(400,'Is not possible to reset your password account');
					
					$message = new YiiMailMessage;
					$message->view = 'resetpw';
					 
					//userModel is passed to the view
					$message->setBody(array('modelUser'=>$modelUser), 'text/html');
					 
					$message->addTo($modelUser->email);
					$message->setFrom(Yii::app()->params['no-replyEmail'],'GeoStockPhoto');
					$message->setSubject('GeoStockPhoto Account Reset Password');
					//$message->name_from = "GeoStockPhoto";
					Yii::app()->mail->send($message);
				}
				//	$this->redirect(array('view','id'=>$modelUser->idUser));
			
				$transaction->commit();
				
				$this->render('resetPwEmailSent',array(
					'modelUser'=>$modelUser,
				));
				return;
			}
			catch(Exception $e){ // an exception is raised if a query fails
				$transaction->rollBack();
				throw new CHttpException(404,'Transaction error.');
			}
		}
		
		$this->render('resetpwask',array(
			'modelUser'=>$modelUser,
		));
	}

	public function actionResendVerification()
	{
		$modelUser=new User('resendVerification');

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($modelUser);
		$modelUser->setScenario('');
		if(isset($_POST['User']))
		{
			$transaction = Yii::app()->db->beginTransaction();
			try{
				$util = new Util();
				$modelUser = User::model()->find('email=:email', array(':email'=>$_POST['User']['email']));
		    
			   	// if(User::model()->exists('fb_user_id=:fbUserId', array(':fbUserId'=>$fbUserId))){
			   	if($modelUser!=null && $modelUser->idUserStatus==1){
					$modelUser->verificationCode = $util->getVerificationCode();
					if(!$modelUser->save())
						throw new CHttpException(400,'Is not possible to save your validate cose');
					
					$message = new YiiMailMessage;
					$message->view = 'resendVerification';
					 
					//userModel is passed to the view
					$message->setBody(array('modelUser'=>$modelUser), 'text/html');
					 
					$message->addTo($modelUser->email);
					$message->setFrom(Yii::app()->params['no-replyEmail'],'GeoStockPhoto');
					$message->setSubject('GeoStockPhoto Account Validation');
					//$message->name_from = "GeoStockPhoto";
									
				}else{
					$this->render('resendVerification',array(
						'modelUser'=>$modelUser,
						'post'=>true,						
						'validRequest'=> false,
					));
					return;
				}
			
				$transaction->commit();
				Yii::app()->mail->send($message);
				
				$this->render('resendVerification',array(
					'modelUser'=>$modelUser,
					'post'=> true,
					'validRequest'=> true,
				));
				return;
			}
			catch(Exception $e){ // an exception is raised if a query fails
				$transaction->rollBack();
				throw new CHttpException(404,'Transaction error.');
			}
		}
		Yii::app()->controller->onloadFunctions="js: $('#idCaptcha_button').click();";
		$this->render('resendVerification',array(
			'modelUser'=>$modelUser,
			'post'=> false,
			'validRequest'=> true,
		));
	}
		
	public function actionResetpwdo($idUser, $vc){
		$modelUser=$this->loadModel($idUser);
		$modelUser->setScenario('resetpwdo');
	
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($modelUser);
		if(isset($_POST['User']['clearpassword'])){
			$modelUser->attributes=$_POST['User'];
			if(!$modelUser->save())
				throw new CHttpException(400,'Is not possible to reset your password');
			
			$this->render('resetpwdoOk',array(
				'modelUser'=>$modelUser,
			));
		}else{
			if ($modelUser->verificationCode==$vc){
				$this->render('resetpwdo',array(
				'modelUser'=>$modelUser,
			));		
			}else{
				throw new CHttpException(404,'The requested page is not valid');
			}
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionConvertCredits(){
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/multi_sel.js', CClientScript::POS_HEAD);
		
		$modelUser=$this->loadModel(Yii::app()->user->id);
		$modelConvertCredits = new ConvertCreditsForm;
		$parameter = ConfParameters::model()->findByPk('PayoutThreshold');

		$this->render('convertCredits',array(
			'modelUser'=>$modelUser,
			'modelConvertCredits'=>$modelConvertCredits,
			'payoutThresholdValue'=> intval($parameter->value),
		));
	}

	public function actionAjaxConvertCredits(){
		$status=1;
		$error_msg='';

		if(!isset($_POST['ConvertCreditsForm']))
			throw new CHttpException(404, 'Convert credits: something went wrong while reading the credits information.');
		if(!isset($_POST['ConvertCreditsForm']['credits']))
			throw new CHttpException(404, 'Convert credits: something went wrong while reading the credits information.');

		$modelUser=$this->loadModel(Yii::app()->user->id);
		$modelConvertCredits = new ConvertCreditsForm();
		$modelConvertCredits->attributes = $_POST['ConvertCreditsForm'];
 		
	
		$transaction = Yii::app()->db->beginTransaction();
		try{
			if($modelConvertCredits->validate() && $modelUser->convertCredits($_POST['ConvertCreditsForm']['credits'])){
				if(!$modelUser->save())
					throw new CHttpException(400,'You can not request credits for the moment - User');
					
				$modelTransaction = new Transaction();
				$modelTransaction->idTransactionType=2; //Payout
				$modelTransaction->idUser=Yii::app()->user->id;
				$modelTransaction->credits=$_POST['ConvertCreditsForm']['credits'];
				$modelTransaction->price=$_POST['ConvertCreditsForm']['credits'];
				$modelTransaction->pending=1;
				$modelTransaction->insert_timestamp=date("Y-m-d H:i:s");
				
				if(!$modelTransaction->save())
					throw new CHttpException(400,'You can not request credits for the moment - Transaction');
				
				$transaction->commit();

				$messageUser = new YiiMailMessage;
				$messageUser->view = 'convertCreditsUser';				 
				//userModel is passed to the view
				$messageUser->setBody(array('modelUser'=>$modelUser,'modelTransaction'=>$modelTransaction), 'text/html');				 
				$messageUser->addTo($modelUser->email);
				$messageUser->setFrom(Yii::app()->params['no-replyEmail'],'GeoStockPhoto');
				$messageUser->setSubject('GeoStockPhoto Credits Payments');
				Yii::app()->mail->send($messageUser);

				$paymentAdminReceiver = ConfParameters::model()->findByPk('AdminConvertPaymentEmail')->value;
				$messageAdmin = new YiiMailMessage;
				$messageAdmin->view = 'convertCreditsAdministrator';				 
				$messageAdmin->setBody(array('modelUser'=>$modelUser,'modelTransaction'=>$modelTransaction), 'text/html');				 
				$messageAdmin->addTo($paymentAdminReceiver);
				$messageAdmin->setFrom(Yii::app()->params['no-replyEmail'],'GeoStockPhoto');
				$messageAdmin->setSubject('GSP Credits Payments Request user #'.$modelUser->idUser.' Transaction #'.$modelTransaction->idTransaction);
				Yii::app()->mail->send($messageAdmin);
			}else{
				if(!$modelConvertCredits->validate()){
					$error_msg_int='';
					
					foreach($modelConvertCredits->getErrors() as $err){
						if($error_msg_int!="")
						$error_msg_int=$error_msg_int."<br>";
						$error_msg_int=$error_msg_int.$err[0];
					}

					throw new CHttpException(404, $error_msg_int);
				} else { 
					throw new CHttpException(404,'The credit '.$_POST['ConvertCreditsForm']['credits'].' can not be converted');
				}
			}	
		}
		catch(Exception $e){
			$transaction->rollBack();
			$status=0;
			$error_msg=$e->getMessage();
		}

		$arr = array(
			'credits'=>$modelUser->creditsEarned,
			'status'=>$status,
			'error_msg'=>$error_msg
		);
		echo json_encode($arr);
	}

	public function actionStatistics(){
		$statisticsForm = new StatisticsForm();
		$modelConfTransactionType=ConfTransactionType::model()->findAll();
		
		$criteria=new CDbCriteria;
		$criteria->together=true;
		$condition='';
		
		// INCOME
		if(isset($_POST['StatisticsForm'])){
			if(isset($_POST['StatisticsForm']['fromData'])){
				if($_POST['StatisticsForm']['fromData']!=""){
					$parse=CDateTimeParser::parse(
						$_POST['StatisticsForm']['fromData'],
						'dd/M/yyyy'
					);
					if($parse){
						$minTime=Yii::app()->dateFormatter->format(
							'yyyy-MM-dd HH:mm:ss',
							$parse
						).'.000';
						$statisticsForm->fromData=$_POST['StatisticsForm']['fromData'];
					}
				}
			}
			if(isset($_POST['StatisticsForm']['toData'])){
				if($_POST['StatisticsForm']['toData']!=""){
					$parse=CDateTimeParser::parse(
						$_POST['StatisticsForm']['toData'],
						'dd/M/yyyy'
					);
					$parse=$parse+(86400);
					if($parse){
						$maxTime=Yii::app()->dateFormatter->format(
							'yyyy-MM-dd HH:mm:ss',
							$parse
						).'.000';
						$statisticsForm->toData=$_POST['StatisticsForm']['toData'];
					}
				}
			}
			if(isset($_POST['StatisticsForm']['selectInfo'])){
				$statisticsForm->selectInfo=$_POST['StatisticsForm']['selectInfo'];
				if($_POST['StatisticsForm']['selectInfo']==1){
					$criteria->with['idProduct0']['condition']='idUser='.Yii::app()->user->id;
					$tableName='TransactionPhoto';
				}elseif($_POST['StatisticsForm']['selectInfo']==2){
					$criteria->with['idTransaction0']['condition']='idUser='.Yii::app()->user->id;
					$tableName='TransactionPhoto';
				}elseif($_POST['StatisticsForm']['selectInfo']==3){
					$condition='idUser='.Yii::app()->user->id." and idTransactionType!=1 and ";
					$tableName='Transaction';
				}
			}
		}else{
			$criteria->with['idProduct0']['condition']='idUser='.Yii::app()->user->id;
			$tableName='TransactionPhoto';
			
			$minTime = time() - 2592000;
			$minTime=Yii::app()->dateFormatter->format(
				'yyyy-MM-dd HH:mm:ss',
				$minTime
			);
			$fromData=Yii::app()->dateFormatter->format(
				'dd/M/yyyy',
				$minTime
			);
			$statisticsForm->fromData=$fromData;
			
			$maxTime = time();
			$maxTime=Yii::app()->dateFormatter->format(
				'yyyy-MM-dd HH:mm:ss',
				$maxTime
			);
			$toData=Yii::app()->dateFormatter->format(
				'dd/M/yyyy',
				$maxTime
			);
			$statisticsForm->toData=$toData;
			
			$statisticsForm->selectInfo=1;
		}
		if(!isset($minTime)){ // TO BE TESTED
			$minTime = time() - 2592000;
			$minTime=Yii::app()->dateFormatter->format(
				'yyyy-MM-dd HH:mm:ss',
				$minTime
			);
		}
		$criteria->condition=$condition."t.insert_timestamp>='".$minTime."'";
		if(isset($maxTime)){
			$criteria->condition=$criteria->condition." and t.insert_timestamp<='".$maxTime."'";
		}
		$criteria->order='t.insert_timestamp desc';
		$dataTransactionPhoto = new CActiveDataProvider($tableName, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>50),
		));
		
		// Faccio un getData solo per vedere se ho almeno un risultato
		// Vedere di trovare un modo piu' efficiente
		$modelProductPp=null;
		if($tableName=='TransactionPhoto'){
			$modelTransactionPhoto=$dataTransactionPhoto->getData();
			if(count($modelTransactionPhoto)>0){
				$modelProductPp=ProductPrePost::model()->findByPk($modelTransactionPhoto[0]->idProduct);
				
				$cs=Yii::app()->clientScript;
				$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
				$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
				$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/utilAjaxDivUpdate.js', CClientScript::POS_HEAD);
				$lat=$modelProductPp->photoPrePost->lat;
				$lng=$modelProductPp->photoPrePost->lng;
				if((Yii::app()->controller->onloadFunctions="initializeMapSmallStatic(
					$lat, $lng, null, true)")!=0)
						throw new CHttpException(404,'Something went wrong while loading the map.');
			}
		}
		
		$this->render('statistics',array(
			'statisticsForm'=>$statisticsForm,
			'modelConfTransactionType'=>$modelConfTransactionType,
			'dataTransactionPhoto'=>$dataTransactionPhoto,
			'modelProductPp'=>$modelProductPp,
		));
	}

	// Non viene piu' utilizzata perche' non si fanno piu' chiamate ajax per aggiornare le statistiche
	// Ora viene utilizzata la stessa action statistics perche' occorre aggiornare anche il box dx
	public function actionAjaxStatisticsSearch(){
		$statisticsForm = new StatisticsForm();
		$modelConfTransactionType=ConfTransactionType::model()->findAll();
		
		// INCOME
		$criteria=new CDbCriteria;
		if($_POST['fromData']!=""){
			$parse=CDateTimeParser::parse(
				$_POST['fromData'],
				'dd/M/yyyy'
			);
			if($parse){
				$minTime=Yii::app()->dateFormatter->format(
					'yyyy-MM-dd HH:mm:ss',
					$parse
				).'.000';
			}
		}
		if($_POST['toData']!=""){
			$parse=CDateTimeParser::parse(
				$_POST['toData'],
				'dd/M/yyyy'
			);
			$parse=$parse+(86400);
			if($parse){
				$maxTime=Yii::app()->dateFormatter->format(
					'yyyy-MM-dd HH:mm:ss',
					$parse
				).'.000';
			}
		}
		$criteria->condition="t.insert_timestamp>='".$minTime."' and t.insert_timestamp<='".$maxTime."'";
		$criteria->with['idProduct0']['idUser']=Yii::app()->user->id;
		$criteria->order='t.insert_timestamp desc';
		$dataTransactionPhoto = new CActiveDataProvider('TransactionPhoto', array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>50),
		));
                
		$this->renderPartial('statisticsResult',array(
			'dataTransactionPhoto'=>$dataTransactionPhoto,
		));
	}

	// Funzione scritta da Gaspare non piu' utilizzata
	public function actionAjaxStatisticsSearch_pre()
	{
		$modelTransaction = new Transaction();
		$statisticsForm = new StatisticsForm();
		
		$result=true;
		
		if(($_POST['fromData']=="") || ($_POST['toData']=="") || ($_POST['groupBy']=="") || ($_POST['selectInfo']=="") )
		{
			$result = false;
			Yii::app()->end();
		}
		 
   		$select="SELECT ";
		
		if($_POST['groupBy']==1){  //day
			$select=$select."concat(day(b.insert_timestamp), ' - ', monthname(b.insert_timestamp),' - ', year(b.insert_timestamp)) as data, ";
		}elseif ($_POST['groupBy']==2){ //week
			$select=$select."concat(week(b.insert_timestamp), ' - ', year(b.insert_timestamp)) as data, ";
		}elseif ($_POST['groupBy']==3){ //month
			$select=$select."concat(monthname(b.insert_timestamp), ' - ', year(b.insert_timestamp)) as data, ";
		}elseif ($_POST['groupBy']==4){ //quarter
			$select=$select." concat(quarter(b.insert_timestamp), ' - ', year(b.insert_timestamp)) as data, ";
		}elseif ($_POST['groupBy']==5){ //year
			$select=$select."year(b.insert_timestamp) as data, ";
		}else{
			$result = false;
			Yii::app()->end();
		}
		
   		$select=$select."count(*) as nphoto, sum(b.price) as partialSum ";
   		$from ="FROM tbl_transaction a, tbl_transaction_product b ";
   		$condition="WHERE a.idTransaction=b.idTransaction and a.pending=0 ";
		$condition=$condition." and CAST( b.insert_timestamp AS DATE ) between STR_TO_DATE('". $_POST['fromData']."','%d/%m/%Y') and STR_TO_DATE('". $_POST['toData']."','%d/%m/%Y')";
		
		if($_POST['selectInfo']==1){ //Income
			$condition=$condition."and a.idTransactionType=1 " ;		
		    $condition=$condition."and b.idUserSeller=".Yii::app()->user->id." " ;
		}else if($_POST['selectInfo']==2){  //Expenditure
			$condition=$condition."and a.idTransactionType=1 " ;
			$condition=$condition."and a.idUser=".Yii::app()->user->id." " ;
		}else if($_POST['selectInfo']==3){  //Credits
			$condition=$condition."and a.idTransactionType in ( 2 , 3 ) " ;
			$condition=$condition."and a.idUser=".Yii::app()->user->id." " ;
		}else{
			$result = false;
			Yii::app()->end();
		}
		//$condition=$condition."idTransactionType=2 " ;
		
     	$group="GROUP BY data ";
     	$order="ORDER BY b.insert_timestamp DESC ";
		
		$sql= $select.$from.$condition.$group.$order;
	    $statisticsResultSetrows=Yii::app()->db->createCommand($sql)->queryAll();
                
		$this->renderpartial('statisticsSearch',array(
			'statisticsResultSetrows'=>$statisticsResultSetrows,		
			'result'=>$result,	
		));
	}

	public function actionAutoCompleteEquipment(){
		Util::processParamsJsonAutocomplete('Equipments', 'description');
	}

	public function actionAjaxSaveShoppingUserDefault(){
		$status=1;
		$error_msg="";
		
		$transaction = Yii::app()->db->beginTransaction();
		try{	
			if(Yii::app()->controller->saveShoppingOptUserDefault(Yii::app()->user->id)==0)
				$transaction->commit();
			else
				throw new CHttpException(404, 'Save Shopping Opt User Default: something went wrong while saving the photo #'.$img);
		}catch(Exception $e){
			$transaction->rollBack();
			$search = strpos($e->getMessage(),'Violation of PRIMARY KEY');
			if($search !== false){
				$error_msg='Saving failed! Check the selling option you can not save the same option for this product';
			}else
				$error_msg=$e->getMessage();
			$status=0;		
		}
	
		$arr = array(
			'status'=>$status,
			'error_msg'=>$error_msg
		);
		echo json_encode($arr);
	}
	
	public function actionSwitchUser($id){
		$modelUser=$this->loadModel(Yii::app()->user->id);
		if(!$modelUser->verifySessionIdSecure()){
			throw new CHttpException(404, 'Switch User: you are not authorized to perform this action.');
		}
		
		if(!Yii::app()->user->isRoleAdmin($id))
			throw new CHttpException(404, 'You do not have permission to switch to this user.');
			
		$model=new LoginForm;
		
		if($model->switchUser($id)){
			//echo "idUser ".Yii::app()->user->id;
			//echo " idUserMaster ". Yii::app()->session['idUserMaster'];
			$this->redirect(array('photo/submit'));
		}
	}

	private function savePersonalContacts($idUser){
		$modelUser=$this->loadModel($idUser);
		if(!$modelUser->verifySessionIdSecure()){
			throw new CHttpException(404, 'Save Personal Contacts: you are not authorized to perform this action.');
		}

		if(isset($_POST['OwnUserContacts']))
			$ownUserContacts=$_POST['OwnUserContacts'];
		else
			throw new CHttpException(404, 'Save Personal Contacts: you must select at least one option.');

		OwnUserContacts::model()->deleteAll('idUser='.$idUser);
		$notValidate=false;
		$error_msg="";
		foreach($ownUserContacts as $selectedItem){
			if(!isset($selectedItem['idUserContactType']))
				throw new CHttpException(404, 'Save Personal Contacts: something went wrong while reading the user contact type #'.$idUser);
			if(!isset($selectedItem['uri']))
				throw new CHttpException(404, 'Save Personal Contacts: something went wrong while reading the user contact uri #'.$idUser);

			$modelOwnUserContacts = new OwnUserContacts;
			$modelOwnUserContacts->idUser = $idUser;
			$modelOwnUserContacts->idUserContactType=$selectedItem['idUserContactType'];
			$modelOwnUserContacts->uri=$selectedItem['uri'];
			
			if($modelOwnUserContacts->validate()){
				if(!$modelOwnUserContacts->save())
					throw new CHttpException(404, 'Save Personal Contacts: something went wrong while user contact uri #'.$idUser);
			}else{
				$notValidate=true;
				$errors = $modelOwnUserContacts->getErrors();
				foreach($errors as $err){
					if($error_msg!="")
						$error_msg=$error_msg."<br>";
					$error_msg=$error_msg.$err[0];
				}				
			}
		}

		if ($notValidate) 
			throw new CHttpException(404, $error_msg);

	}
	
	private function saveShoppingOptUserDefault($idUser){
		$modelUser=$this->loadModel($idUser);
		if(!$modelUser->verifySessionIdSecure()){
			throw new CHttpException(404, 'Save User: you are not authorized to perform this action.');
		}
		
		if(isset($_POST['ShoppingPhotoType']['licenseType']))
			$modelUser->preferredLicenseType=$_POST['ShoppingPhotoType']['licenseType'];
		elseif(isset($_POST['User']['preferredLicenseType']))
			$modelUser->preferredLicenseType=$_POST['User']['preferredLicenseType'];
		else
			throw new CHttpException(404, 'Save Shopping Opt User Default: something went wrong while retrieving the license type.');
			
		if(!$modelUser->save())
			throw new CHttpException(404, 'Save User : something went wrong while saving the shopping options of the user #'.$idUser);

		if($modelUser->preferredLicenseType=='RF'){
			$err_msg=Yii::app()->controller->saveShoppingOptUserDefaultRf($idUser);
			if($err_msg!="")
				throw new CHttpException(404, $err_msg);
		}else if($modelUser->preferredLicenseType=='RM'){
			$err_msg=Yii::app()->controller->saveShoppingOptUserDefaultRm($idUser);
			if($err_msg!="")
				throw new CHttpException(404, $err_msg);
		}else{
			throw new CHttpException(404, 'Save Shopping Opt User Default : something went wrong while reading the license type of the photo #'.$idUser);
		}
	}
	
	private function saveShoppingOptUserDefaultRf($idUser){
		if(isset($_POST['ShoppingOptPhoto']))
			$shoppingOpt=$_POST['ShoppingOptPhoto'];
		elseif(isset($_POST['ShoppingOptUserDefaultRf']))
			$shoppingOpt=$_POST['ShoppingOptUserDefaultRf'];
		elseif(isset($_POST['ConfShoppingOptDefaultGsp']))
			$shoppingOpt=$_POST['ConfShoppingOptDefaultGsp'];
		else
			throw new CHttpException(404, 'Save Shopping Opt User Default : you must select at least one option.');
			
			
		ShoppingOptUserDefaultRf::model()->deleteAll('idUser='.$idUser);
		foreach($shoppingOpt as $selectedItem){
			if(!isset($selectedItem['idSize']))
				throw new CHttpException(404, 'Save Shopping Opt User Default : something went wrong while reading the shopping option size of the user #'.$idUser);
			if(!isset($selectedItem['idLicense']))
				throw new CHttpException(404, 'Save Shopping Opt User Default : something went wrong while reading the shopping option license of the user #'.$idUser);
			if(!isset($selectedItem['price2dec']))
				throw new CHttpException(404, 'Save Shopping Opt User Default : something went wrong while reading the shopping option price of the user #'.$idUser);
			
			$shoppingOptUserDefaultRf = new ShoppingOptUserDefaultRf;
			$shoppingOptUserDefaultRf->idUser = $idUser;
			$shoppingOptUserDefaultRf->idSize=$selectedItem['idSize'];
			$shoppingOptUserDefaultRf->idLicense=$selectedItem['idLicense'];
			$shoppingOptUserDefaultRf->price=(float)$selectedItem['price2dec'];
			if($shoppingOptUserDefaultRf->validate()){
				if(!$shoppingOptUserDefaultRf->save())
					throw new CHttpException(404, 'Save Shopping Opt User Default : something went wrong while saving the shopping options of the user #'.$idUser);
			}else{
				$error_msg="";
				$errors = $shoppingOptUserDefaultRf->getErrors();
				foreach($errors as $err){
					if($error_msg!="")
						$error_msg=$error_msg."<br>";
					$error_msg=$error_msg.$err[0];
				}
				return $error_msg;
			}
		}
	}

	private function saveShoppingOptUserDefaultRm($idUser){
		if(isset($_POST['ShoppingOptPhotoRm']))
			$shoppingOpt=$_POST['ShoppingOptPhotoRm'];
		elseif(isset($_POST['ShoppingOptUserDefaultRm']))
			$shoppingOpt=$_POST['ShoppingOptUserDefaultRm'];
		else 
			throw new CHttpException(404, 'Save Shopping Opt User Default : you must select at least one option.');
		
		ShoppingOptUserDefaultRm::model()->deleteAll('idUser='.$idUser);
		foreach($shoppingOpt as $key=>$selectedItem){
			//if(!isset($selectedItem['idSize']))
				//throw new CHttpException(404, 'Save Shopping Opt User Default : something went wrong while reading the shopping option size of the user #'.$idUser);
			//if(!isset($selectedItem['idDuration']))
				//throw new CHttpException(404, 'Save Shopping Opt User Default : something went wrong while reading the shopping option duration of the user #'.$idUser);
			if(!isset($selectedItem['price2dec']))
				throw new CHttpException(404, 'Save Shopping Opt User Default : something went wrong while reading the shopping option price of the user #'.$idUser);
			$shoppingOptUserDefaultRm = new ShoppingOptUserDefaultRm;
			$shoppingOptUserDefaultRm->idUser = $idUser;
			$shoppingOptUserDefaultRm->idSize=0;//$selectedItem['idSize'];
			foreach($_POST['ConfLicenseRmDetails'][$key] as $selectedDetails){
				if(!isset($selectedDetails['idRMdetails']))
					throw new CHttpException(404, 'Save Shopping Opt User Default : something went wrong while reading the shopping option details of the user #'.$idUser);
				if($selectedDetails['idRMdetails']!='')
					$shoppingOptUserDefaultRm->idRMdetails=$selectedDetails['idRMdetails'];
			}
			$shoppingOptUserDefaultRm->idDuration=1;//$selectedItem['idDuration'];
			$shoppingOptUserDefaultRm->price=(float)$selectedItem['price2dec'];
			if($shoppingOptUserDefaultRm->validate()){
				if(!$shoppingOptUserDefaultRm->save())
					throw new CHttpException(404, 'Save Shopping Opt User Default : something went wrong while saving the shopping options of the user #'.$img);
			}else{
				$error_msg="";
				$errors = $shoppingOptUserDefaultRm->getErrors();
				foreach($errors as $err){
					if($error_msg!="")
						$error_msg=$error_msg."<br>";
					$error_msg=$error_msg.$err[0];
				}
				return $error_msg;
			}
		}
	}	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);	
		if($model===null)
			throw new CHttpException(404,'User model does not exist #'.$id);
		return $model;
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
}

